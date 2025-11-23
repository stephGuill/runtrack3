<?php
// ==================== CONFIGURATION DE LA RÉPONSE ====================
// LIGNE 3: BALISE d'ouverture PHP - début du code serveur
// LIGNE 4: HEADER pour type de contenu JSON avec encodage UTF-8
// UTILITÉ: Indique au navigateur que la réponse est du JSON
// Content-Type: Type MIME pour JSON
// charset=utf-8: Encodage des caractères (émojis, accents supportés)
header('Content-Type: application/json; charset=utf-8');

// LIGNE 10: HEADER CORS pour autoriser requêtes cross-origin
// Access-Control-Allow-Origin: * = autorise toutes les origines
// UTILITÉ: Permet requêtes AJAX depuis autres domaines/ports
// SÉCURITÉ: En production, remplacer * par domaine spécifique
header('Access-Control-Allow-Origin: *');

// LIGNE 15: HEADER CORS pour méthodes HTTP autorisées
// Access-Control-Allow-Methods: Liste des verbes HTTP acceptés
// GET: Lecture de données (notre cas d'usage)
header('Access-Control-Allow-Methods: GET');

// LIGNE 19: HEADER CORS pour en-têtes autorisés dans les requêtes
// Access-Control-Allow-Headers: Headers que le client peut envoyer
// Content-Type: Autorise l'envoi du type de contenu
header('Access-Control-Allow-Headers: Content-Type');

// ==================== CONFIGURATION DE LA BASE DE DONNÉES ====================
// LIGNE 23: COMMENTAIRE de section pour organisation du code
// Configuration de connexion MySQL (adaptez selon votre configuration WAMP)

// LIGNE 26: DÉFINITION d'un tableau associatif de configuration
// VARIABLE: $db_config - array contenant paramètres de connexion
// STRUCTURE: clé => valeur pour chaque paramètre de connexion
$db_config = [
    // LIGNE 30: PARAMÈTRE d'hôte de base de données
    // 'host': Adresse du serveur MySQL (localhost = même machine)
    'host' => 'localhost',
    
    // LIGNE 33: NOM de la base de données cible
    // 'dbname': Nom exact de la base créée précédemment
    'dbname' => 'utilisateurs',
    
    // LIGNE 36: UTILISATEUR MySQL pour connexion
    // 'username': 'root' = utilisateur admin par défaut WAMP
    'username' => 'root',        // Utilisateur par défaut WAMP
    
    // LIGNE 39: MOT DE PASSE MySQL (vide par défaut WAMP)
    // 'password': Chaîne vide car WAMP n'a pas de mot de passe par défaut
    'password' => '',            // Mot de passe vide par défaut WAMP
    
    // LIGNE 42: JEU de caractères pour la connexion
    // 'charset': utf8mb4 pour support Unicode complet
    'charset' => 'utf8mb4'
];

/**
 * LIGNE 46: DÉFINITION de fonction avec documentation PHPDoc
 * FONCTION: connectToDatabase - établit connexion à la base de données
 * PARAMETER: $config - array des paramètres de connexion
 * RETURN: PDO|null - objet PDO si succès, null si échec
 * UTILITÉ: Centralise la logique de connexion avec gestion d'erreur
 */
/**
 * Fonction de connexion à la base de données avec gestion d'erreur
 * @return PDO|null Objet PDO ou null en cas d'erreur
 */
function connectToDatabase($config) {
    // LIGNE 57: BLOC TRY pour gestion d'exception structurée
    // UTILITÉ: Capture les erreurs PDO et les gère proprement
    try {
        // LIGNE 60: CONSTRUCTION du DSN (Data Source Name)
        // DSN: Chaîne de connexion au format mysql:host=...;dbname=...
        // INTERPOLATION: Utilise les valeurs du tableau $config
        // DSN (Data Source Name) pour PDO
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        
        // LIGNE 65-71: DÉFINITION des options PDO pour sécurité et performance
        // ARRAY: Tableau associatif d'options de configuration PDO
        // Options PDO pour optimisation et sécurité
        $options = [
            // LIGNE 68: MODE d'erreur par exception
            // PDO::ATTR_ERRMODE: Définit comment PDO gère les erreurs
            // PDO::ERRMODE_EXCEPTION: Lance des exceptions (plus facile à gérer)
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,    // Exceptions en cas d'erreur
            
            // LIGNE 72: MODE de récupération par défaut
            // PDO::ATTR_DEFAULT_FETCH_MODE: Format de retour des données
            // PDO::FETCH_ASSOC: Tableau associatif (nom_colonne => valeur)
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Fetch associatif par défaut
            
            // LIGNE 75: DÉSACTIVATION de l'émulation des requêtes préparées
            // PDO::ATTR_EMULATE_PREPARES: false = vraies requêtes préparées
            // SÉCURITÉ: Protection optimale contre injection SQL
            PDO::ATTR_EMULATE_PREPARES => false,            // Vraies requêtes préparées
            
            // LIGNE 78: COMMANDE d'initialisation MySQL
            // PDO::MYSQL_ATTR_INIT_COMMAND: Commande exécutée à chaque connexion
            // SET NAMES: Définit le charset pour la session MySQL
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
        ];
        
        // LIGNE 82: INSTANCIATION de l'objet PDO
        // new PDO(): Constructeur avec DSN, utilisateur, mot de passe, options
        // VARIABLES: Utilise les paramètres passés en argument
        // Création de la connexion PDO
        $pdo = new PDO($dsn, $config['username'], $config['password'], $options);
        
        // LIGNE 86: RETOUR de l'objet PDO en cas de succès
        
        return $pdo;
        
    } catch (PDOException $e) {
        // LIGNE 90: BLOC CATCH pour capturer les exceptions PDO
        // PDOException: Type spécifique d'exception pour erreurs de base de données
        // $e: Variable contenant l'objet exception avec détails de l'erreur
        
        // LIGNE 94: LOGGING de l'erreur dans les logs système
        // error_log(): Fonction PHP pour écrire dans les logs
        // $e->getMessage(): Méthode pour récupérer le message d'erreur
        // UTILITÉ: Traçabilité pour débogage sans exposer l'erreur à l'utilisateur
        // LIGNE 120: LOG de l'erreur (en production, utiliser un vrai système de log)
        // FONCTION error_log(): Système de logging PHP natif
        // CONCATENATION: . pour joindre chaînes en PHP
        // getMessage(): Méthode d'Exception pour récupérer message
        error_log("Erreur de connexion à la base de données: " . $e->getMessage());
        
        // LIGNE 125: RETOUR null en cas d'échec
        // VALEUR: null indique l'échec de la connexion
        // UTILITÉ: Permet au code appelant de tester le succès/échec
        return null;
    }
}

/**
 * LIGNE 131: DÉFINITION de fonction de récupération des utilisateurs
 * FONCTION: getAllUsers - récupère tous les utilisateurs de la base
 * PARAMETER: $pdo - objet PDO pour connexion base de données
 * RETURN: array - tableau avec données utilisateurs ou message d'erreur
 * UTILITÉ: Encapsule la logique de récupération avec formatage JSON
 */
/**
 * Récupère tous les utilisateurs de la base de données
 * @param PDO $pdo Connexion à la base de données
 * @return array Tableau des utilisateurs ou erreur
 */
function getAllUsers($pdo) {
    // LIGNE 142: NOUVEAU bloc TRY pour gestion d'erreur de requête
    try {
        // LIGNE 144-150: DÉFINITION de la requête SQL de sélection
        // REQUÊTE: SELECT avec liste explicite des champs (sécurité)
        // LIGNE 151-158: DÉFINITION de la requête SQL de sélection
        // REQUÊTE: SELECT avec liste explicite des champs (sécurité)
        // MULTI-LIGNES: Formatage lisible avec indentation
        // FROM: Table source 'utilisateurs'
        // ORDER BY: Tri alphabétique par nom puis prénom (ASC = ascendant)
        $sql = "SELECT 
                    id, 
                    nom,
                    prenom, 
                    email, 
                    date_creation 
                FROM utilisateurs 
                ORDER BY nom ASC, prenom ASC";
        
        // LIGNE 165-168: PRÉPARATION et EXÉCUTION de la requête
        // prepare(): Prépare la requête (protection injection SQL)
        // execute(): Exécute la requête préparée sans paramètres
        // $stmt: Variable pour l'objet PDOStatement
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        // LIGNE 171: RÉCUPÉRATION de tous les résultats
        // fetchAll(): Retourne array de tous les enregistrements
        // MODE: FETCH_ASSOC défini dans les options PDO (clés = noms colonnes)
        $users = $stmt->fetchAll();
        
        // LIGNE 175-185: BOUCLE de post-traitement des données
        // foreach: Itération sur chaque utilisateur du tableau
        // &$user: Référence (&) pour modification directe (pas de copie)
        // UTILITÉ: Formatage des données pour compatibilité JSON/JavaScript
        foreach ($users as &$user) {
            // LIGNE 177-183: FORMATAGE de la date si elle existe
            // CONDITION: if ($user['date_creation']) teste existence/non-null
            // PROTECTION: Évite erreur sur dates NULL
            if ($user['date_creation']) {
                // LIGNE 179: CRÉATION d'objet DateTime depuis string MySQL
                // new DateTime(): Constructeur avec string de date en paramètre
                // CONVERSION: String MySQL → Objet manipulable
                $date = new DateTime($user['date_creation']);
                
                // LIGNE 182: FORMATAGE en format ISO pour JavaScript
                // format(): Méthode pour convertir au format souhaité
                // 'Y-m-d H:i:s': Format YYYY-MM-DD HH:MM:SS (standard ISO)
                $user['date_creation'] = $date->format('Y-m-d H:i:s');
            }
            
            // LIGNE 187: CONVERSION de l'ID en entier
            // (int): Cast explicite string → integer
            // RAISON: PDO retourne tout en string, JSON attend des numbers
            $user['id'] = (int)$user['id'];
        
        // LIGNE 191-205: CONSTRUCTION de la réponse de succès
        // ARRAY: Tableau associatif structuré pour réponse JSON standardisée
        // CHAMPS: success, data, count, timestamp pour API REST cohérente
        // RETURN: Structure uniforme pour traitement côté client
        return [
            // LIGNE 196: FLAG de succès pour le client
            // BOOLEAN: true indique succès de l'opération
            'success' => true,
            
            // LIGNE 199: DONNÉES utilisateurs formatées
            // ARRAY: Tableau des utilisateurs avec formatage approprié
            'data' => $users,
            
            // LIGNE 202: MÉTADONNÉE - nombre d'utilisateurs
            // count(): Fonction PHP pour compter éléments d'un array
            // UTILITÉ: Information pratique pour pagination, affichage
            'count' => count($users),
            
            // LIGNE 206: TIMESTAMP de la réponse pour cache/debug
            // date(): Fonction PHP pour date/heure actuelle formatée
            // FORMAT: ISO standard pour compatibilité internationale
            'timestamp' => date('Y-m-d H:i:s')
        ];
        
    } catch (PDOException $e) {
        // LIGNE 211: BLOC CATCH pour erreurs de requête SQL
        // PDOException: Classe spécialisée pour capturer erreurs SQL
        // TYPES D'ERREURS: Syntaxe SQL, connexion perdue, contraintes, etc.
        
        // LIGNE 215: LOGGING de l'erreur SQL pour administration
        // error_log(): Enregistre dans log serveur (pas exposé à l'utilisateur)
        // SÉCURITÉ: Détails techniques cachés, message générique exposé
        error_log("Erreur lors de la récupération des utilisateurs: " . $e->getMessage());
        
        // LIGNE 218-226: RÉPONSE d'erreur structurée
        // ARRAY: Même structure que succès mais avec flag d'échec
        // COHÉRENCE: API uniforme pour toutes les réponses
        return [
            // LIGNE 221: FLAG d'échec
            // BOOLEAN: false indique échec de l'opération
            'success' => false,
            
            // LIGNE 224: MESSAGE d'erreur générique (sécurité)
            // PRINCIPE: Ne pas exposer détails techniques à l'utilisateur
            // PROTECTION: Évite divulgation d'informations système
            'error' => 'Erreur lors de la récupération des données',
            
            // LIGNE 227: TIMESTAMP pour traçabilité et debug
            'timestamp' => date('Y-m-d H:i:s')
        ];
    }
}
/**
 * LIGNE 232: FONCTION utilitaire pour réponses d'erreur HTTP
 * FONCTION: sendErrorResponse - envoie erreur JSON avec code HTTP
 * PARAMETER: $message - message d'erreur à afficher
 * PARAMETER: $code - code de statut HTTP (défaut 500)
 * UTILITÉ: Centralise gestion erreurs avec en-têtes HTTP appropriés
 */
/**
 * Envoie une réponse d'erreur JSON
 * @param string $message Message d'erreur
 * @param int $code Code de statut HTTP
 */
function sendErrorResponse($message, $code = 500) {
    // LIGNE 244: DÉFINITION du code de statut HTTP de la réponse
    // http_response_code(): Fonction PHP pour définir le code de retour
    // CODES: 500 = erreur serveur, 405 = méthode non autorisée, etc.
    http_response_code($code);
    
    // LIGNE 248-254: GÉNÉRATION et ENVOI de la réponse JSON d'erreur
    // echo: Sortie directe vers le client HTTP
    // json_encode(): Conversion array PHP → string JSON
    // STRUCTURE: Array avec champs cohérents avec getAllUsers()
    echo json_encode([
        'success' => false,          // FLAG d'échec
        'error' => $message,         // MESSAGE d'erreur pour l'utilisateur
        'timestamp' => date('Y-m-d H:i:s')  // TIMESTAMP de l'erreur
    // LIGNE 255: OPTIONS de json_encode pour formatage
    // JSON_PRETTY_PRINT: Indentation pour lisibilité (debug)
    // JSON_UNESCAPED_UNICODE: Caractères Unicode non échappés (émojis, accents)
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    
    // LIGNE 258: TERMINAISON immédiate du script
    // exit: Arrête l'exécution PHP, empêche code supplémentaire
    // UTILITÉ: Évite que du HTML/code suive la réponse JSON
    exit;
}

// ==================== TRAITEMENT DE LA REQUÊTE ====================
// LIGNE 262: SECTION de logique principale d'exécution du script

// LIGNE 264-267: VALIDATION de la méthode HTTP reçue
// $_SERVER['REQUEST_METHOD']: Variable superglobale PHP avec méthode HTTP
// CONDITION: Teste si différent de GET (POST, PUT, DELETE rejetés)
// API REST: Cette endpoint n'accepte que les lectures (GET)
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    // LIGNE 270: APPEL de fonction d'erreur avec code 405
    // CODE 405: "Method Not Allowed" - méthode HTTP non supportée
    // MESSAGE: Indication claire de la méthode attendue
    // TERMINAISON: sendErrorResponse() termine le script avec exit
    sendErrorResponse('Méthode non autorisée. Utilisez GET.', 405);
}

// LIGNE 276-278: ÉTABLISSEMENT de la connexion à la base
// APPEL: fonction connectToDatabase() définie précédemment
// VARIABLE: $pdo stocke l'objet PDO ou null en cas d'échec
// PARAMÈTRE: $db_config array avec informations de connexion
$pdo = connectToDatabase($db_config);

// LIGNE 281-285: VALIDATION de la connexion
// CONDITION: Test si connexion a échoué (null retourné)
// OPÉRATEUR ===: Comparaison stricte (type et valeur)
if ($pdo === null) {
    // LIGNE 284: ERREUR si connexion impossible
    // CODE 500: Internal Server Error (erreur côté serveur)
    // TERMINAISON: Script s'arrête ici si pas de connexion
    sendErrorResponse('Impossible de se connecter à la base de données', 500);
}

// LIGNE 289-291: APPEL de la fonction de récupération des données
// VARIABLE: $result contient array avec success/data ou success/error
// FUNCTION CALL: getAllUsers() avec objet PDO en paramètre
$result = getAllUsers($pdo);

// LIGNE 294-301: DÉFINITION du code de statut selon le résultat
// CONDITION: Test du flag success dans la réponse
// LOGIQUE: 200 si succès, 500 si erreur de données
// CODE HTTP: Informe le client du résultat de l'opération
if ($result['success']) {
    // LIGNE 298: CODE 200 = OK (succès)
    // STATUS: Opération réussie, données valides
    http_response_code(200);
} else {
    // LIGNE 301: CODE 500 = erreur serveur
    // STATUS: Erreur interne, données indisponibles
    http_response_code(500);
}

// LIGNE 304-306: ENVOI de la réponse JSON finale
// json_encode(): Conversion array PHP → JSON string
// OPTIONS: Pretty print et Unicode pour lisibilité
// OUTPUT: Envoi direct au client via echo
echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

// ==================== EXEMPLE DE RÉPONSE JSON ====================
/*
LIGNE 308-329: DOCUMENTATION de la structure de réponse JSON
FORMAT: Commentaire multi-lignes avec exemple réel
UTILITÉ: Guide pour développeurs frontend consommant l'API

EXEMPLE DE RÉPONSE EN CAS DE SUCCÈS:
{
    "success": true,                          // FLAG: Boolean de succès
    "data": [                                 // ARRAY: Liste des utilisateurs
        {
            "id": 1,                          // INTEGER: Identifiant unique
            "nom": "Dupont",                  // STRING: Nom de famille
            "prenom": "Jean",                 // STRING: Prénom
            "email": "jean.dupont@example.com", // STRING: Adresse email
            "date_creation": "2025-11-04 10:30:15" // STRING: Date ISO
        },
        {
            "id": 2,
            "nom": "Martin",
            "prenom": "Marie",
            "email": "marie.martin@example.com",
            "date_creation": "2025-11-04 10:30:15"
        }
    ],
    "count": 2,                               // INTEGER: Nombre total
    "timestamp": "2025-11-04 15:45:30"        // STRING: Timestamp de réponse
}
*/

// ==================== NOTES DE SÉCURITÉ ====================
/*
LIGNE 335-346: DOCUMENTATION de sécurité pour production
RECOMMANDATIONS: Améliorations importantes pour environnement réel
SÉCURITÉ: Mesures à implémenter avant mise en production

En production, considérez l'ajout de :
- Authentification/autorisation: JWT tokens, sessions, OAuth
- Limitation du taux de requêtes: Rate limiting pour éviter abus
- Validation des paramètres: Filtrage et sanitization des inputs
- Chiffrement HTTPS: SSL/TLS obligatoire pour données sensibles
- Configuration CORS restrictive: Limitation des domaines autorisés
- Logs de sécurité: Traçabilité des accès et tentatives d'intrusion
- Validation CSRF: Protection contre attaques cross-site
- Sanitization XSS: Échappement des données d'affichage
*/
?>