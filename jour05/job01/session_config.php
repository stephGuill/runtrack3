<?php
// ==================== FICHIER DE CONFIGURATION ====================
// LIGNE 3: Configuration globale pour le système d'authentification
// UTILITÉ: Centralise paramètres partagés entre pages

// LIGNE 6: Configuration base de données
// ARRAY: Paramètres connexion réutilisables
$db_config = [
    'host' => 'localhost',
    'dbname' => 'utilisateurs',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4'
];

// LIGNE 15: Configuration sessions
// PARAMÈTRES: Sécurité et durée de vie sessions
$session_config = [
    'timeout' => 3600,        // 1 heure en secondes
    'regenerate_interval' => 300, // Régénération toutes les 5 minutes
    'secure' => false,        // true en HTTPS uniquement
    'httponly' => true,       // Empêche accès JavaScript aux cookies
    'samesite' => 'Lax'       // Protection CSRF
];

// LIGNE 23: Application configuration session
// session_set_cookie_params(): Configure cookies de session
session_set_cookie_params([
    'lifetime' => $session_config['timeout'],
    'path' => '/',
    'domain' => '',
    'secure' => $session_config['secure'],
    'httponly' => $session_config['httponly'],
    'samesite' => $session_config['samesite']
]);

/**
 * LIGNE 33: Fonction de vérification session active
 * FUNCTION: isUserLoggedIn - vérifie si utilisateur connecté
 * RETURN: boolean - true si connecté, false sinon
 * UTILITÉ: Centralise logique de vérification connexion
 */
function isUserLoggedIn() {
    // LIGNE 38: Démarrage session si nécessaire
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // LIGNE 42: Vérification existence données utilisateur
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['login_time'])) {
        return false;
    }
    
    // LIGNE 46: Vérification timeout de session
    // TIME(): Timestamp actuel
    // CALCUL: Différence avec heure de connexion
    global $session_config;
    if (time() - $_SESSION['login_time'] > $session_config['timeout']) {
        // LIGNE 50: Session expirée - nettoyage
        session_destroy();
        return false;
    }
    
    // LIGNE 54: Régénération périodique ID session
    if (!isset($_SESSION['last_regeneration'])) {
        $_SESSION['last_regeneration'] = time();
    }
    
    if (time() - $_SESSION['last_regeneration'] > $session_config['regenerate_interval']) {
        session_regenerate_id(true);
        $_SESSION['last_regeneration'] = time();
    }
    
    return true;
}

/**
 * LIGNE 65: Fonction de redirection si non connecté
 * FUNCTION: requireLogin - force connexion ou redirige
 * PARAMETER: $redirect_url - URL de redirection (défaut: connexion.php)
 * UTILITÉ: Protection pages privées
 */
function requireLogin($redirect_url = 'connexion.php') {
    if (!isUserLoggedIn()) {
        // LIGNE 71: Redirection avec header HTTP
        // Location: En-tête pour redirection 302
        header('Location: ' . $redirect_url);
        exit();
    }
}

/**
 * LIGNE 77: Fonction de redirection si déjà connecté
 * FUNCTION: redirectIfLoggedIn - évite double connexion
 * PARAMETER: $redirect_url - URL de redirection (défaut: index.php)
 * UTILITÉ: Évite accès formulaires connexion si déjà connecté
 */
function redirectIfLoggedIn($redirect_url = 'index.php') {
    if (isUserLoggedIn()) {
        header('Location: ' . $redirect_url);
        exit();
    }
}

/**
 * LIGNE 87: Fonction d'obtention données utilisateur
 * FUNCTION: getCurrentUser - récupère informations utilisateur connecté
 * RETURN: array|null - données utilisateur ou null si non connecté
 * UTILITÉ: Accès sécurisé aux données de session
 */
function getCurrentUser() {
    if (!isUserLoggedIn()) {
        return null;
    }
    
    return [
        'id' => $_SESSION['user_id'],
        'prenom' => $_SESSION['user_prenom'],
        'nom' => $_SESSION['user_nom'],
        'email' => $_SESSION['user_email'],
        'login_time' => $_SESSION['login_time']
    ];
}

/**
 * LIGNE 102: Fonction de logout sécurisé
 * FUNCTION: secureLogout - déconnexion complète
 * UTILITÉ: Nettoyage total session et cookies
 */
function secureLogout() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // LIGNE 109: Suppression toutes variables session
    $_SESSION = array();
    
    // LIGNE 112: Suppression cookie session
    if (isset($_COOKIE[session_name()])) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    // LIGNE 120: Destruction session serveur
    session_destroy();
}

/**
 * LIGNE 124: Fonction de validation CSRF
 * FUNCTION: generateCSRFToken - génère token anti-CSRF
 * RETURN: string - token sécurisé
 * UTILITÉ: Protection contre attaques cross-site
 */
function generateCSRFToken() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if (!isset($_SESSION['csrf_token'])) {
        // LIGNE 133: Génération token aléatoire
        // bin2hex(): Conversion binaire vers hexadécimal
        // random_bytes(): Générateur cryptographiquement sécurisé
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    
    return $_SESSION['csrf_token'];
}

/**
 * LIGNE 141: Fonction de vérification CSRF
 * FUNCTION: verifyCSRFToken - vérifie token CSRF
 * PARAMETER: $token - token à vérifier
 * RETURN: boolean - true si valide, false sinon
 */
function verifyCSRFToken($token) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    return isset($_SESSION['csrf_token']) && 
           hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * LIGNE 152: Fonction de formatage sécurisé sortie
 * FUNCTION: escape - échappement HTML pour affichage
 * PARAMETER: $string - chaîne à échapper
 * RETURN: string - chaîne sécurisée
 * UTILITÉ: Protection XSS
 */
function escape($string) {
    // htmlspecialchars(): Conversion caractères spéciaux HTML
    // ENT_QUOTES: Échappe guillemets simples et doubles
    // UTF-8: Encodage pour caractères internationaux
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

/**
 * LIGNE 163: Fonction de validation format email
 * FUNCTION: isValidEmail - validation email côté serveur
 * PARAMETER: $email - adresse à valider
 * RETURN: boolean - true si valide
 */
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * LIGNE 170: Fonction de validation force mot de passe
 * FUNCTION: isStrongPassword - vérifie complexité mot de passe
 * PARAMETER: $password - mot de passe à tester
 * RETURN: boolean - true si suffisamment fort
 */
function isStrongPassword($password) {
    // LIGNE 175: Critères de force
    // strlen(): Longueur minimum 8 caractères
    // preg_match(): Expressions régulières pour validation
    return strlen($password) >= 8 &&
           preg_match('/[a-z]/', $password) &&    // Au moins 1 minuscule
           preg_match('/[A-Z]/', $password) &&    // Au moins 1 majuscule
           preg_match('/\d/', $password);         // Au moins 1 chiffre
}

/**
 * LIGNE 183: Fonction de logging sécurisé
 * FUNCTION: logSecurityEvent - enregistre événements sécurité
 * PARAMETER: $event - type d'événement
 * PARAMETER: $details - détails supplémentaires
 * UTILITÉ: Audit et surveillance sécurité
 */
function logSecurityEvent($event, $details = '') {
    // LIGNE 189: Construction message log
    $timestamp = date('Y-m-d H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
    
    // LIGNE 193: Format log structuré
    $log_message = sprintf(
        "[%s] SECURITY: %s | IP: %s | UserAgent: %s | Details: %s",
        $timestamp, $event, $ip, $user_agent, $details
    );
    
    // LIGNE 198: Écriture dans log (en production, utiliser système log dédié)
    error_log($log_message);
}

// ==================== CONSTANTES GLOBALES ====================
// LIGNE 202: Constantes pour l'application

// LIGNE 204: Codes d'erreur standardisés
define('ERROR_INVALID_CREDENTIALS', 'CRED_001');
define('ERROR_EMAIL_EXISTS', 'EMAIL_001');
define('ERROR_WEAK_PASSWORD', 'PASS_001');
define('ERROR_SESSION_EXPIRED', 'SESS_001');
define('ERROR_CSRF_INVALID', 'CSRF_001');

// LIGNE 210: Messages d'erreur utilisateur
define('MSG_LOGIN_FAILED', 'Email ou mot de passe incorrect');
define('MSG_EMAIL_EXISTS', 'Cette adresse email est déjà utilisée');
define('MSG_WEAK_PASSWORD', 'Le mot de passe ne respecte pas les critères de sécurité');
define('MSG_SESSION_EXPIRED', 'Votre session a expiré, veuillez vous reconnecter');
define('MSG_ACCESS_DENIED', 'Accès non autorisé');

// LIGNE 216: Paramètres application
define('MAX_LOGIN_ATTEMPTS', 3);         // Tentatives max avant blocage
define('LOGIN_BLOCK_DURATION', 300);     // Durée blocage en secondes (5 min)
define('PASSWORD_MIN_LENGTH', 8);        // Longueur minimale mot de passe
define('SESSION_MAX_DURATION', 3600);    // Durée max session (1 heure)

// ==================== EXEMPLE D'UTILISATION ====================
/*
UTILISATION DANS LES PAGES :

// Page protégée nécessitant connexion
require_once 'session_config.php';
requireLogin(); // Redirige si non connecté

// Page d'inscription/connexion
require_once 'session_config.php';
redirectIfLoggedIn(); // Redirige si déjà connecté

// Affichage données utilisateur
$user = getCurrentUser();
if ($user) {
    echo "Bonjour " . escape($user['prenom']);
}

// Protection CSRF dans formulaire
$csrf_token = generateCSRFToken();
echo '<input type="hidden" name="csrf_token" value="' . $csrf_token . '">';

// Vérification CSRF lors soumission
if (!verifyCSRFToken($_POST['csrf_token'])) {
    die('Token CSRF invalide');
}
*/

// ==================== NOTES DE DÉPLOIEMENT ====================
/*
CONFIGURATION PRODUCTION :

1. HTTPS OBLIGATOIRE :
   - $session_config['secure'] = true;
   - Redirection automatique HTTP → HTTPS

2. BASE DE DONNÉES :
   - Utilisateur dédié avec privilèges limités
   - Mot de passe fort pour utilisateur DB
   - Connexion chiffrée (SSL/TLS)

3. SESSIONS :
   - Stockage sessions en base ou Redis
   - Nettoyage automatique sessions expirées
   - Rotation clés de chiffrement

4. LOGS :
   - Système de logs centralisé
   - Alertes automatiques sur événements suspects
   - Rotation et archivage logs

5. SÉCURITÉ :
   - WAF (Web Application Firewall)
   - Rate limiting au niveau serveur
   - Monitoring temps réel
   - Sauvegardes chiffrées
*/
?>