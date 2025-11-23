<?php
// ==================== API BACKEND POUR AUTHENTIFICATION ====================
// LIGNE 3: Configuration des en-têtes de réponse
// header(): Fonction PHP pour définir en-têtes HTTP
// Content-Type: Indique format JSON pour réponses
header('Content-Type: application/json; charset=utf-8');

// LIGNE 7-11: Configuration CORS pour développement
// CORS: Cross-Origin Resource Sharing pour requêtes cross-domain
// Access-Control-Allow-Origin: Autorise toutes origines (dev seulement)
// Access-Control-Allow-Methods: Méthodes HTTP autorisées
// Access-Control-Allow-Headers: En-têtes autorisés
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// LIGNE 13: Gestion requête OPTIONS (preflight CORS)
// OPTIONS: Requête préliminaire du navigateur pour vérifier CORS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// ==================== CONFIGURATION BASE DE DONNÉES ====================
// LIGNE 20: Configuration de connexion à la base de données
// ARRAY: Paramètres de connexion MySQL/MariaDB
$db_config = [
    'host' => 'localhost',        // SERVEUR: localhost pour WAMP/XAMPP
    'dbname' => 'utilisateurs',   // BASE: Nom de la base créée dans database.sql
    'username' => 'root',         // UTILISATEUR: root par défaut WAMP
    'password' => '',             // MOT DE PASSE: vide par défaut WAMP
    'charset' => 'utf8mb4'        // ENCODAGE: UTF-8 complet avec émojis
];

/**
 * LIGNE 30: Fonction de connexion à la base de données
 * FUNCTION: connectToDatabase - établit connexion PDO sécurisée
 * PARAMETER: $config - array avec paramètres de connexion
 * RETURN: PDO object ou null en cas d'échec
 * UTILITÉ: Centralise la logique de connexion avec gestion d'erreurs
 */
function connectToDatabase($config) {
    try {
        // LIGNE 37: Construction du DSN (Data Source Name)
        // DSN: Chaîne de connexion MySQL avec encodage
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        
        // LIGNE 40-47: Options PDO pour sécurité et performance
        // ARRAY: Configuration avancée PDO
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,    // ERREURS: Exceptions pour debug
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // FETCH: Tableaux associatifs
            PDO::ATTR_EMULATE_PREPARES => false,            // PREPARE: Vraies requêtes préparées
            PDO::MYSQL_ATTR_FOUND_ROWS => true,             // MYSQL: Lignes trouvées vs modifiées
        ];
        
        // LIGNE 48: Création de l'objet PDO
        // new PDO(): Constructeur avec DSN, utilisateur, mot de passe, options
        $pdo = new PDO($dsn, $config['username'], $config['password'], $options);
        
        return $pdo;
        
    } catch (PDOException $e) {
        // LIGNE 53: Gestion d'erreur de connexion
        // error_log(): Log serveur pour administration
        // SÉCURITÉ: Détails techniques non exposés à l'utilisateur
        error_log("Erreur de connexion à la base de données: " . $e->getMessage());
        return null;
    }
}

/**
 * LIGNE 60: Fonction de vérification d'existence email
 * FUNCTION: checkEmailExists - vérifie si email déjà utilisé
 * PARAMETER: $pdo - objet PDO pour base de données
 * PARAMETER: $email - adresse email à vérifier
 * RETURN: boolean - true si email existe, false sinon
 */
function checkEmailExists($pdo, $email) {
    try {
        // LIGNE 67: Requête de comptage d'emails
        // SELECT COUNT(*): Compte occurrences (0 ou 1 avec UNIQUE)
        // WHERE: Filtre sur email exact
        $sql = "SELECT COUNT(*) FROM utilisateurs WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        
        // LIGNE 73: Récupération du résultat
        // fetchColumn(): Récupère première colonne (le COUNT)
        // RETURN: true si count > 0, false sinon
        return $stmt->fetchColumn() > 0;
        
    } catch (PDOException $e) {
        // LIGNE 78: Gestion d'erreur - considère email existant par sécurité
        error_log("Erreur vérification email: " . $e->getMessage());
        return true; // Sécurité: bloque en cas d'erreur
    }
}

/**
 * LIGNE 84: Fonction d'inscription d'utilisateur
 * FUNCTION: registerUser - crée nouveau compte utilisateur
 * PARAMETER: $pdo - objet PDO
 * PARAMETER: $data - array avec données utilisateur (prenom, nom, email, password)
 * RETURN: array - résultat avec success/error
 */
function registerUser($pdo, $data) {
    try {
        // LIGNE 92: Validation des données reçues
        // ARRAY_KEYS: Vérifie présence de tous champs obligatoires
        $required_fields = ['prenom', 'nom', 'email', 'password'];
        foreach ($required_fields as $field) {
            if (!isset($data[$field]) || trim($data[$field]) === '') {
                return ['success' => false, 'error' => "Le champ $field est obligatoire"];
            }
        }
        
        // LIGNE 100: Nettoyage des données
        // trim(): Supprime espaces début/fin
        // SÉCURITÉ: Nettoyage avant validation et stockage
        $prenom = trim($data['prenom']);
        $nom = trim($data['nom']);
        $email = trim(strtolower($data['email'])); // Email en minuscules
        $password = $data['password'];
        
        // LIGNE 107: Validation format email côté serveur
        // filter_var(): Validation PHP native avec filtre EMAIL
        // DOUBLE VALIDATION: Client JavaScript + Serveur PHP
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['success' => false, 'error' => 'Format d\'email invalide'];
        }
        
        // LIGNE 112: Vérification unicité email
        if (checkEmailExists($pdo, $email)) {
            return ['success' => false, 'error' => 'Cet email est déjà utilisé'];
        }
        
        // LIGNE 116: Validation force mot de passe
        // REGEX: Minimum 8 caractères, au moins 1 majuscule, 1 minuscule, 1 chiffre
        if (strlen($password) < 8 || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/', $password)) {
            return ['success' => false, 'error' => 'Mot de passe trop faible (minimum 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre)'];
        }
        
        // LIGNE 121: Hashage sécurisé du mot de passe
        // password_hash(): Fonction PHP pour hashage bcrypt
        // PASSWORD_DEFAULT: Algorithme recommandé (actuellement bcrypt)
        // SÉCURITÉ: Jamais stocker mots de passe en clair
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // LIGNE 126: Insertion en base de données
        // INSERT INTO: Ajout nouvel utilisateur
        // PREPARED STATEMENT: Protection injection SQL
        $sql = "INSERT INTO utilisateurs (prenom, nom, email, password) VALUES (:prenom, :nom, :email, :password)";
        $stmt = $pdo->prepare($sql);
        
        // LIGNE 130: Liaison des paramètres
        // bindParam(): Association paramètres nommés avec valeurs
        // PDO::PARAM_STR: Type chaîne de caractères
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
        
        // LIGNE 136: Exécution de l'insertion
        $stmt->execute();
        
        // LIGNE 138: Récupération ID du nouvel utilisateur
        // lastInsertId(): Dernier ID auto-généré
        $user_id = $pdo->lastInsertId();
        
        return [
            'success' => true,
            'message' => 'Inscription réussie',
            'user_id' => $user_id
        ];
        
    } catch (PDOException $e) {
        // LIGNE 147: Gestion erreurs base de données
        error_log("Erreur inscription: " . $e->getMessage());
        return ['success' => false, 'error' => 'Erreur lors de l\'inscription'];
    }
}

/**
 * LIGNE 153: Fonction de connexion utilisateur
 * FUNCTION: loginUser - authentifie utilisateur et crée session
 * PARAMETER: $pdo - objet PDO
 * PARAMETER: $email - adresse email
 * PARAMETER: $password - mot de passe en clair
 * RETURN: array - résultat avec success/error et données utilisateur
 */
function loginUser($pdo, $email, $password) {
    try {
        // LIGNE 161: Recherche utilisateur par email
        // SELECT: Récupération données utilisateur avec mot de passe hashé
        $sql = "SELECT id, prenom, nom, email, password FROM utilisateurs WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        
        // LIGNE 167: Récupération résultat
        // fetch(): Récupère première ligne ou false si aucun résultat
        $user = $stmt->fetch();
        
        if (!$user) {
            // LIGNE 171: Email non trouvé
            return ['success' => false, 'error' => 'Email ou mot de passe incorrect'];
        }
        
        // LIGNE 174: Vérification mot de passe
        // password_verify(): Compare mot de passe clair avec hash
        // SÉCURITÉ: Fonction sécurisée résistante aux attaques timing
        if (!password_verify($password, $user['password'])) {
            return ['success' => false, 'error' => 'Email ou mot de passe incorrect'];
        }
        
        // LIGNE 179: Démarrage session PHP
        // session_start(): Initialise système de session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // LIGNE 184: Régénération ID session pour sécurité
        // session_regenerate_id(): Nouveau ID pour éviter fixation session
        session_regenerate_id(true);
        
        // LIGNE 187: Stockage données utilisateur en session
        // $_SESSION: Tableau superglobal persistant entre requêtes
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_prenom'] = $user['prenom'];
        $_SESSION['user_nom'] = $user['nom'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['login_time'] = time(); // Timestamp connexion
        
        return [
            'success' => true,
            'message' => 'Connexion réussie',
            'user' => [
                'id' => $user['id'],
                'prenom' => $user['prenom'],
                'nom' => $user['nom'],
                'email' => $user['email']
            ]
        ];
        
    } catch (PDOException $e) {
        // LIGNE 203: Gestion erreurs base de données
        error_log("Erreur connexion: " . $e->getMessage());
        return ['success' => false, 'error' => 'Erreur lors de la connexion'];
    }
}

/**
 * LIGNE 209: Fonction de déconnexion
 * FUNCTION: logoutUser - détruit session et déconnecte utilisateur
 * RETURN: array - résultat de déconnexion
 */
function logoutUser() {
    // LIGNE 214: Démarrage session si pas déjà fait
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // LIGNE 218: Destruction complète de la session
    // unset(): Supprime variables de session
    // session_destroy(): Détruit session côté serveur
    // setcookie(): Supprime cookie de session côté client
    unset($_SESSION['user_id']);
    unset($_SESSION['user_prenom']);
    unset($_SESSION['user_nom']);
    unset($_SESSION['user_email']);
    unset($_SESSION['login_time']);
    
    session_destroy();
    
    // LIGNE 227: Suppression cookie session
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600, '/');
    }
    
    return ['success' => true, 'message' => 'Déconnexion réussie'];
}

/**
 * LIGNE 234: Fonction de réponse d'erreur
 * FUNCTION: sendErrorResponse - envoie erreur JSON avec code HTTP
 * PARAMETER: $message - message d'erreur
 * PARAMETER: $code - code de statut HTTP
 */
function sendErrorResponse($message, $code = 400) {
    http_response_code($code);
    echo json_encode([
        'success' => false,
        'error' => $message,
        'timestamp' => date('Y-m-d H:i:s')
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit();
}

// ==================== TRAITEMENT DES REQUÊTES ====================
// LIGNE 247: Section principale de traitement

// LIGNE 249: Validation méthode HTTP
// REQUEST_METHOD: Méthode HTTP de la requête (GET, POST, etc.)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendErrorResponse('Méthode non autorisée. Utilisez POST.', 405);
}

// LIGNE 253: Lecture du corps de la requête JSON
// php://input: Stream pour lire données brutes POST
// json_decode(): Conversion JSON → array PHP
$json_input = file_get_contents('php://input');
$data = json_decode($json_input, true);

// LIGNE 258: Validation format JSON
if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    sendErrorResponse('Format JSON invalide', 400);
}

// LIGNE 262: Validation présence action
if (!isset($data['action'])) {
    sendErrorResponse('Action non spécifiée', 400);
}

// LIGNE 266: Connexion à la base de données
$pdo = connectToDatabase($db_config);
if ($pdo === null) {
    sendErrorResponse('Erreur de connexion à la base de données', 500);
}

// LIGNE 271: Routage selon l'action demandée
// SWITCH: Structure de contrôle pour différentes actions API
switch ($data['action']) {
    
    // LIGNE 274: Action de vérification d'email
    case 'check_email':
        if (!isset($data['email'])) {
            sendErrorResponse('Email non fourni', 400);
        }
        
        $exists = checkEmailExists($pdo, trim(strtolower($data['email'])));
        echo json_encode([
            'success' => true,
            'exists' => $exists
        ], JSON_PRETTY_PRINT);
        break;
    
    // LIGNE 285: Action d'inscription
    case 'register':
        $result = registerUser($pdo, $data);
        
        if ($result['success']) {
            http_response_code(201); // Created
        } else {
            http_response_code(400); // Bad Request
        }
        
        echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        break;
    
    // LIGNE 296: Action de connexion
    case 'login':
        if (!isset($data['email']) || !isset($data['password'])) {
            sendErrorResponse('Email et mot de passe requis', 400);
        }
        
        $result = loginUser($pdo, trim(strtolower($data['email'])), $data['password']);
        
        if ($result['success']) {
            http_response_code(200); // OK
        } else {
            http_response_code(401); // Unauthorized
        }
        
        echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        break;
    
    // LIGNE 310: Action de déconnexion
    case 'logout':
        $result = logoutUser();
        echo json_encode($result, JSON_PRETTY_PRINT);
        break;
    
    // LIGNE 315: Action non reconnue
    default:
        sendErrorResponse('Action non reconnue', 400);
        break;
}

// ==================== EXEMPLE D'UTILISATION ====================
/*
EXEMPLES DE REQUÊTES AJAX/FETCH :

1. VÉRIFICATION EMAIL :
POST /api.php
{
    "action": "check_email",
    "email": "test@example.com"
}

2. INSCRIPTION :
POST /api.php
{
    "action": "register",
    "prenom": "Jean",
    "nom": "Dupont",
    "email": "jean.dupont@example.com",
    "password": "MonMotDePasse123!"
}

3. CONNEXION :
POST /api.php
{
    "action": "login",
    "email": "jean.dupont@example.com",
    "password": "MonMotDePasse123!"
}

4. DÉCONNEXION :
POST /api.php
{
    "action": "logout"
}
*/

// ==================== NOTES DE SÉCURITÉ ====================
/*
MESURES DE SÉCURITÉ IMPLÉMENTÉES :

1. MOTS DE PASSE :
   - Hashage avec password_hash() (bcrypt)
   - Validation force (8+ caractères, complexité)
   - Jamais stockés en clair

2. SESSIONS :
   - Régénération ID après connexion
   - Destruction complète à la déconnexion
   - Timeout automatique possible

3. BASE DE DONNÉES :
   - Requêtes préparées (injection SQL)
   - Validation côté serveur
   - Logs d'erreurs sécurisés

4. VALIDATION :
   - Double validation client/serveur
   - Nettoyage des données (trim)
   - Vérification types et formats

AMÉLIORATIONS POSSIBLES PRODUCTION :
- Rate limiting (limitation tentatives)
- CSRF protection
- HTTPS obligatoire
- Logs d'audit détaillés
- 2FA (authentification à deux facteurs)
- Politique mots de passe avancée
*/
?>