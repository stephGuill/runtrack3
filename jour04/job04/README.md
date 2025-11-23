# 🗄️ Gestion des Utilisateurs - Jour04 Job04

## 📋 Description du Projet

Application web complète permettant de gérer une base de données d'utilisateurs avec mise à jour en temps réel. Le système comprend :

- **Base de données MySQL** avec table `utilisateurs`
- **API PHP** pour récupérer les données en format JSON
- **Interface web** avec tableau HTML et bouton de mise à jour
- **JavaScript** pour communication asynchrone avec la base de données

## 🚀 Installation et Configuration

### 1. Prérequis
- **WAMP Server** (Windows Apache MySQL PHP) installé et démarré
- **phpMyAdmin** accessible via l'interface WAMP
- Navigateur web moderne

### 2. Configuration de la Base de Données

#### Étape 1 : Créer la base de données
1. Ouvrez **phpMyAdmin** (généralement http://localhost/phpmyadmin)
2. Cliquez sur l'onglet **"SQL"**
3. Copiez-collez le contenu du fichier `database.sql`
4. Cliquez sur **"Exécuter"**

#### Étape 2 : Vérifier la création
```sql
-- Vérifiez que la base existe
SHOW DATABASES LIKE 'utilisateurs';

-- Vérifiez la structure de la table
USE utilisateurs;
DESCRIBE utilisateurs;

-- Vérifiez les données de test
SELECT * FROM utilisateurs;
```

### 3. Configuration des Fichiers

#### Structure des fichiers
```
jour04/job04/
├── database.sql        # Script de création de la base
├── users.php          # API PHP pour récupérer les utilisateurs
├── index.php          # Interface utilisateur
└── README.md          # Ce fichier
```

#### Configuration PHP (users.php)
Si votre configuration WAMP diffère, modifiez les paramètres de connexion :

```php
$db_config = [
    'host' => 'localhost',
    'dbname' => 'utilisateurs',
    'username' => 'root',        // Modifiez si nécessaire
    'password' => '',            // Ajoutez votre mot de passe si configuré
    'charset' => 'utf8mb4'
];
```

## 🎯 Utilisation

### 1. Accès à l'Application
- Ouvrez votre navigateur
- Allez à : `http://localhost/runtrack3/jour04/job04/index.php`
- L'application se charge automatiquement avec les données de la base

### 2. Fonctionnalités

#### Interface Utilisateur
- **Tableau des utilisateurs** : Affiche ID, nom, prénom, email, date de création
- **Bouton "Mettre à jour"** : Recharge les données depuis la base
- **Compteur d'utilisateurs** : Nombre total d'utilisateurs
- **Indicateur de statut** : État des opérations (chargement, succès, erreur)

#### API JSON (users.php)
L'API retourne les données au format JSON :
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "nom": "Dupont",
            "prenom": "Jean",
            "email": "jean.dupont@example.com",
            "date_creation": "2025-11-04 10:30:15"
        }
    ],
    "count": 1,
    "timestamp": "2025-11-04 15:45:30"
}
```

### 3. Test de la Mise à Jour Dynamique

#### Ajouter un utilisateur via phpMyAdmin
```sql
INSERT INTO utilisateurs (nom, prenom, email) 
VALUES ('Nouveau', 'Utilisateur', 'nouveau.user@example.com');
```

#### Supprimer un utilisateur
```sql
DELETE FROM utilisateurs WHERE id = 1;
```

#### Modifier un utilisateur
```sql
UPDATE utilisateurs 
SET email = 'nouvel.email@example.com' 
WHERE id = 2;
```

Après chaque modification, cliquez sur **"Mettre à jour"** dans l'interface pour voir les changements.

## 🔧 Fonctionnalités Techniques

### Architecture
- **Frontend** : HTML5, CSS3, Vanilla JavaScript (ES6+)
- **Backend** : PHP 7.4+ avec PDO
- **Base de données** : MySQL 5.7+
- **API** : REST JSON avec gestion d'erreurs

### Sécurité Implémentée
- **Requêtes préparées PDO** contre l'injection SQL
- **Headers CORS** configurés
- **Gestion d'erreurs** sans exposition d'informations sensibles
- **Validation des données** côté serveur

### Optimisations
- **Cache des références DOM** en JavaScript
- **Debouncing** pour éviter les requêtes multiples
- **Affichage responsive** mobile-friendly
- **Loading states** pour l'UX

## 🐛 Debug et Dépannage

### Console JavaScript
```javascript
// Fonction de debug disponible dans la console
debugUsers(); // Affiche l'état actuel des données
```

### Logs PHP
Les erreurs PHP sont loggées. Vérifiez :
- Console du navigateur (Network tab)
- Logs Apache (dans WAMP)

### Problèmes Courants

#### "Erreur de connexion à la base de données"
- Vérifiez que WAMP est démarré
- Vérifiez que MySQL est actif (icône verte)
- Contrôlez les paramètres de connexion dans `users.php`

#### "Base de données non trouvée"
- Exécutez le script `database.sql` dans phpMyAdmin
- Vérifiez le nom de la base : `utilisateurs`

#### "Aucun utilisateur affiché"
- Vérifiez que la table contient des données :
  ```sql
  SELECT COUNT(*) FROM utilisateurs;
  ```

#### Tableau ne se met pas à jour
- Ouvrez la console du navigateur (F12)
- Vérifiez les erreurs JavaScript
- Testez l'API directement : `http://localhost/runtrack3/jour04/job04/users.php`

## 📈 Extensions Possibles

### Fonctionnalités supplémentaires
- **Recherche/filtrage** des utilisateurs
- **Pagination** pour grandes listes
- **Ajout/modification/suppression** via interface
- **Validation des emails** côté client
- **Authentification** utilisateur
- **Export CSV/Excel** des données

### Améliorations techniques
- **Cache Redis** pour les performances
- **Websockets** pour updates temps réel
- **Framework JS** (Vue.js, React)
- **API REST complète** (CRUD)
- **Tests unitaires** PHP et JavaScript

## 📞 Support

En cas de problème :
1. Vérifiez les logs dans la console navigateur
2. Testez l'API directement dans le navigateur
3. Contrôlez la base de données via phpMyAdmin
4. Vérifiez que tous les services WAMP sont actifs

---

**Développé pour La Plateforme - Formation Développement Web**  
*Exercice jour04/job04 - Gestion de base de données avec PHP et JavaScript*