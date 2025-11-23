# 🔐 Système d'Authentification - Guide d'Installation et d'Utilisation

## 📋 Description du Projet

Système complet d'authentification développé en **PHP**, **JavaScript** et **MySQL** avec validation côté client sans rafraîchissement de page. Comprend inscription, connexion, gestion de sessions et sécurité avancée.

## 🏗️ Structure du Projet

```
jour05/job01/
├── database.sql         # 🗄️ Schéma de base de données
├── index.php           # 🏠 Page d'accueil
├── inscription.php     # 📝 Formulaire d'inscription
├── connexion.php       # 🔑 Formulaire de connexion
├── api.php            # 🔧 API backend (CRUD utilisateurs)
├── session_config.php # ⚙️ Configuration sessions et sécurité
└── README.md          # 📖 Documentation
```

## 🚀 Installation

### 1. Prérequis
- **WAMP/XAMPP** ou serveur Apache + PHP 7.4+ + MySQL 5.7+
- Extension PHP **PDO** activée
- Navigateur moderne supportant ES6+

### 2. Configuration Base de Données

```sql
-- Exécuter dans phpMyAdmin ou ligne de commande MySQL
mysql -u root -p < database.sql
```

OU manuellement :
1. Ouvrir **phpMyAdmin**
2. Créer nouvelle base `utilisateurs`
3. Importer le fichier `database.sql`

### 3. Configuration Serveur

```php
// Modifier dans session_config.php si nécessaire
$db_config = [
    'host' => 'localhost',        // Serveur MySQL
    'dbname' => 'utilisateurs',   // Nom de la base
    'username' => 'root',         // Utilisateur MySQL
    'password' => '',             // Mot de passe (vide pour WAMP)
    'charset' => 'utf8mb4'
];
```

### 4. Test Installation
- Placer les fichiers dans `www/` (WAMP) ou `htdocs/` (XAMPP)
- Accéder à `http://localhost/jour05/job01/`
- Vérifier fonctionnement inscription/connexion

## 🔧 Fonctionnalités

### 🎯 Authentification
- ✅ **Inscription** avec validation temps réel
- ✅ **Connexion** sécurisée avec sessions
- ✅ **Déconnexion** complète
- ✅ **Protection CSRF** et **XSS**

### 📊 Validation Côté Client (JavaScript)
- ✅ **Format email** (RegEx)
- ✅ **Force mot de passe** (8+ caractères, majuscule, minuscule, chiffre)
- ✅ **Confirmation mot de passe**
- ✅ **Noms/prénoms** (lettres uniquement)
- ✅ **Unicité email** (vérification serveur temps réel)

### 🛡️ Sécurité
- ✅ **Hashage bcrypt** des mots de passe
- ✅ **Requêtes préparées** (protection injection SQL)
- ✅ **Limitation tentatives** de connexion
- ✅ **Expiration sessions** automatique
- ✅ **Logs de sécurité**

### 🎨 Interface Utilisateur
- ✅ **Design responsive** (mobile-friendly)
- ✅ **Animations CSS** fluides
- ✅ **Messages d'erreur** contextuels
- ✅ **Indicateurs de chargement**
- ✅ **Feedback visuel** temps réel

## 📱 Utilisation

### Page d'Accueil (`index.php`)
- **Non connecté** : Liens vers inscription/connexion
- **Connecté** : Message personnalisé + bouton déconnexion

### Inscription (`inscription.php`)
1. Saisir **prénom, nom, email, mot de passe**
2. **Validation automatique** sans rafraîchissement
3. **Redirection** vers connexion si succès

### Connexion (`connexion.php`)
1. Saisir **email et mot de passe**
2. **Validation** + protection anti-brute force
3. **Redirection** vers accueil si succès

## 🔍 Validation Détaillée

### Côté Client (JavaScript)
```javascript
// Prénom/Nom : 2-50 caractères, lettres uniquement
/^[a-zA-ZÀ-ÿ\s\-']{2,50}$/

// Email : Format RFC standard
/^[^\s@]+@[^\s@]+\.[^\s@]+$/

// Mot de passe : 8+ caractères, complexité
/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/
```

### Côté Serveur (PHP)
```php
// Validation email native PHP
filter_var($email, FILTER_VALIDATE_EMAIL)

// Hashage sécurisé mot de passe
password_hash($password, PASSWORD_DEFAULT)

// Vérification mot de passe
password_verify($password, $hash)
```

## 🔐 Sécurité Avancée

### Gestion Sessions
```php
// Configuration sécurisée
session_set_cookie_params([
    'lifetime' => 3600,      // 1 heure
    'httponly' => true,      // Pas d'accès JavaScript
    'secure' => false,       // true en HTTPS
    'samesite' => 'Lax'      // Protection CSRF
]);
```

### Protection Brute Force
- **3 tentatives max** par session
- **Blocage 5 minutes** après échecs
- **Compteur localStorage** persistant

### Logs Sécurité
```php
// Enregistrement événements
logSecurityEvent('LOGIN_FAILED', 'IP: ' . $ip);
logSecurityEvent('ACCOUNT_CREATED', 'User: ' . $email);
```

## 🧪 Tests

### Test Inscription
1. **Champs vides** → Messages d'erreur
2. **Email invalide** → Validation format
3. **Email existant** → Vérification unicité
4. **Mot de passe faible** → Critères sécurité
5. **Confirmation différente** → Correspondance

### Test Connexion
1. **Email inexistant** → Erreur générique
2. **Mot de passe incorrect** → Erreur générique
3. **Trop de tentatives** → Blocage temporaire
4. **Connexion valide** → Redirection + session

## 🚨 Résolution Problèmes

### Erreur "Cannot connect to database"
```bash
# Vérifier service MySQL démarré
# Dans WAMP : Clic gauche → MySQL → Service → Start/Resume Service
```

### Erreur 404 sur api.php
```bash
# Vérifier mod_rewrite activé
# Dans httpd.conf : LoadModule rewrite_module modules/mod_rewrite.so
```

### Sessions ne persistent pas
```php
// Vérifier configuration PHP
session.save_path = "/tmp"
session.gc_maxlifetime = 3600
```

## 📈 Améliorations Production

### Sécurité Renforcée
```php
// HTTPS obligatoire
if (!isset($_SERVER['HTTPS'])) {
    $redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("Location: $redirectURL");
    exit();
}

// Rate limiting avancé
$redis = new Redis();
$key = 'rate_limit:' . $_SERVER['REMOTE_ADDR'];
if ($redis->incr($key) > 10) {
    http_response_code(429); // Too Many Requests
    exit('Rate limit exceeded');
}
$redis->expire($key, 3600);
```

### Monitoring
```php
// Métriques application
$statsd = new \Domnikl\Statsd\Client();
$statsd->increment('auth.login.success');
$statsd->increment('auth.login.failed');
$statsd->gauge('auth.sessions.active', count($_SESSION));
```

## 📄 Licences et Crédits

- **Développé par** : [Votre Nom]
- **Framework CSS** : Styles personnalisés
- **Base de données** : MySQL 5.7+
- **Sécurité** : PHP password_hash(), PDO prepared statements

## 🤝 Contribution

1. **Fork** le projet
2. **Créer branche** feature (`git checkout -b feature/AmazingFeature`)
3. **Commit** changements (`git commit -m 'Add AmazingFeature'`)
4. **Push** branche (`git push origin feature/AmazingFeature`)
5. **Ouvrir Pull Request**

---

*🔒 Système d'authentification sécurisé avec validation JavaScript temps réel - Jour 05 Job 01*