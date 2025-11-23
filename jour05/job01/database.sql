-- ==================== CRÉATION DE LA BASE DE DONNÉES ====================
-- LIGNE 3: Création de la base de données 'utilisateurs'
-- COMMANDE: CREATE DATABASE pour nouvelle base
-- IF NOT EXISTS: Évite erreur si base existe déjà
-- CHARACTER SET: Encodage UTF-8 pour caractères internationaux
-- COLLATE: Règles de tri insensibles à la casse
CREATE DATABASE IF NOT EXISTS utilisateurs 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

-- LIGNE 10: Sélection de la base pour les commandes suivantes
-- USE: Active la base de données pour les requêtes
USE utilisateurs;

-- ==================== CRÉATION DE LA TABLE UTILISATEURS ====================
-- LIGNE 14: Suppression de la table si elle existe (réinitialisation)
-- DROP TABLE: Supprime complètement la structure et les données
-- IF EXISTS: Évite erreur si table n'existe pas
DROP TABLE IF EXISTS utilisateurs;

-- LIGNE 18-30: Création de la table avec contraintes
-- CREATE TABLE: Définit la structure de la table
-- CHAMPS: Définition de chaque colonne avec types et contraintes
CREATE TABLE utilisateurs (
    -- LIGNE 21: Clé primaire auto-incrémentée
    -- INT: Type entier pour identifiant
    -- AUTO_INCREMENT: Valeur automatique croissante
    -- PRIMARY KEY: Identifiant unique obligatoire
    id INT AUTO_INCREMENT PRIMARY KEY,
    
    -- LIGNE 26: Nom de famille (obligatoire)
    -- VARCHAR(100): Chaîne variable max 100 caractères
    -- NOT NULL: Champ obligatoire
    nom VARCHAR(100) NOT NULL,
    
    -- LIGNE 30: Prénom (obligatoire)
    prenom VARCHAR(100) NOT NULL,
    
    -- LIGNE 33: Adresse email (unique et obligatoire)
    -- UNIQUE: Empêche les doublons d'email
    -- INDEX automatique créé pour performances
    email VARCHAR(255) NOT NULL UNIQUE,
    
    -- LIGNE 37: Mot de passe hashé (obligatoire)
    -- VARCHAR(255): Taille suffisante pour hash bcrypt/argon2
    -- Jamais stocker mots de passe en clair !
    password VARCHAR(255) NOT NULL,
    
    -- LIGNE 42: Timestamp de création automatique
    -- TIMESTAMP: Type date/heure précis
    -- DEFAULT CURRENT_TIMESTAMP: Valeur automatique à l'insertion
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ==================== CRÉATION D'INDEX POUR PERFORMANCES ====================
-- LIGNE 47: Index sur l'email pour recherches rapides
-- CREATE INDEX: Optimise les requêtes de recherche
-- UTILITÉ: Accélère les vérifications d'existence email
CREATE INDEX idx_email ON utilisateurs(email);

-- LIGNE 51: Index sur nom+prénom pour tri/recherche
-- INDEX COMPOSÉ: Optimise tri alphabétique
CREATE INDEX idx_nom_prenom ON utilisateurs(nom, prenom);

-- ==================== DONNÉES DE TEST (OPTIONNEL) ====================
-- LIGNE 55-69: Insertion d'utilisateurs de test
-- INSERT INTO: Ajout de données dans la table
-- password(): Fonction MySQL pour hasher (DÉPRÉCIÉ - utiliser PHP password_hash())
-- ATTENTION: En production, utiliser password_hash() côté PHP

INSERT INTO utilisateurs (nom, prenom, email, password) VALUES
-- LIGNE 59: Utilisateur test avec mot de passe 'admin123'
-- Hash généré avec password_hash('admin123', PASSWORD_DEFAULT) en PHP
('Admin', 'Test', 'admin@test.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),

-- LIGNE 62: Utilisateur test avec mot de passe 'user123'
('Dupont', 'Jean', 'jean.dupont@email.com', '$2y$10$YourHashedPasswordHere'),

-- LIGNE 65: Utilisatrice test avec mot de passe 'marie456'
('Martin', 'Marie', 'marie.martin@email.com', '$2y$10$AnotherHashedPasswordHere');

-- ==================== REQUÊTES DE VÉRIFICATION ====================
-- LIGNE 69: Commandes pour vérifier la création

-- Vérification de la structure de la table
DESCRIBE utilisateurs;

-- Comptage des utilisateurs insérés
SELECT COUNT(*) as total_utilisateurs FROM utilisateurs;

-- Affichage des utilisateurs (sans mots de passe)
SELECT id, nom, prenom, email, date_creation 
FROM utilisateurs 
ORDER BY date_creation DESC;

-- ==================== EXEMPLES DE REQUÊTES UTILES ====================
/*
-- VÉRIFICATION d'existence d'un email
SELECT COUNT(*) FROM utilisateurs WHERE email = 'test@example.com';

-- RÉCUPÉRATION pour connexion (avec mot de passe)
SELECT id, nom, prenom, email, password 
FROM utilisateurs 
WHERE email = 'admin@test.com';

-- MISE À JOUR du mot de passe
UPDATE utilisateurs 
SET password = '$2y$10$newHashedPassword' 
WHERE id = 1;

-- SUPPRESSION d'un utilisateur
DELETE FROM utilisateurs WHERE id = 1;
*/

-- ==================== NOTES DE SÉCURITÉ ====================
/*
IMPORTANTES CONSIDÉRATIONS DE SÉCURITÉ :

1. MOTS DE PASSE :
   - Toujours utiliser password_hash() côté PHP
   - Jamais stocker en clair dans la base
   - Utiliser password_verify() pour vérification

2. VALIDATION :
   - Vérifier format email côté serveur
   - Imposer complexité mot de passe
   - Échapper les entrées utilisateur

3. SESSIONS :
   - Utiliser sessions PHP sécurisées
   - Régénérer ID session après connexion
   - Implémenter timeout de session

4. PROTECTION :
   - Utiliser HTTPS en production
   - Implémenter protection CSRF
   - Limiter tentatives de connexion
   - Logs de sécurité pour audits
*/