-- ==================== CRÉATION DE LA BASE DE DONNÉES ====================
-- LIGNE 1-2: COMMENTAIRES d'en-tête pour organisation du code
-- UTILITÉ: Documentation et séparation visuelle des sections
-- LIGNE 3: Script SQL pour créer la base de données "utilisateurs"
-- LIGNE 4: À exécuter dans phpMyAdmin

-- LIGNE 6: INSTRUCTION SQL de création de base de données
-- COMMANDE: CREATE DATABASE - crée une nouvelle base de données
-- CLAUSE: IF NOT EXISTS - évite erreur si base déjà existante
-- NOM: utilisateurs - identifiant de la base de données
-- Création de la base de données
CREATE DATABASE IF NOT EXISTS utilisateurs 
-- LIGNE 10: PARAMÈTRE de jeu de caractères
-- CHARACTER SET: utf8mb4 - support Unicode complet (émojis, caractères spéciaux)
-- AVANTAGE: utf8mb4 vs utf8 = support 4 bytes (caractères rares)
CHARACTER SET utf8mb4 
-- LIGNE 14: PARAMÈTRE de collation (règles de tri/comparaison)
-- COLLATE: utf8mb4_unicode_ci - tri Unicode case-insensitive
-- ci = case insensitive (A = a), unicode = règles internationales
COLLATE utf8mb4_unicode_ci;

-- LIGNE 18: INSTRUCTION USE pour sélectionner la base active
-- UTILITÉ: Toutes les commandes suivantes s'appliquent à cette base
-- Utilisation de la base de données
USE utilisateurs;

-- ==================== CRÉATION DE LA TABLE UTILISATEURS ====================
-- LIGNE 22: INSTRUCTION de création de table avec sécurité
-- CREATE TABLE: Commande de définition de structure
-- IF NOT EXISTS: Clause de sécurité - pas d'erreur si table existe
-- utilisateurs: Nom de la table (même nom que la base par convention)
CREATE TABLE IF NOT EXISTS utilisateurs (
    -- LIGNE 27: DÉFINITION de la clé primaire
    -- id: Nom du champ (identifiant unique)
    -- INT: Type de données entier (4 bytes, -2B à +2B)
    -- AUTO_INCREMENT: Incrémentation automatique (1, 2, 3...)
    -- PRIMARY KEY: Clé primaire (unique, non null, indexée)
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Identifiant unique de l\'utilisateur',
    
    -- LIGNE 33: DÉFINITION du champ nom
    -- VARCHAR(100): Chaîne variable jusqu'à 100 caractères
    -- NOT NULL: Contrainte d'obligation (champ requis)
    -- COMMENT: Documentation du champ pour maintenance
    nom VARCHAR(100) NOT NULL COMMENT 'Nom de famille',
    
    -- LIGNE 38: DÉFINITION du champ prénom (même structure que nom)
    prenom VARCHAR(100) NOT NULL COMMENT 'Prénom',
    
    -- LIGNE 41: DÉFINITION du champ email avec contrainte d'unicité
    -- VARCHAR(255): Taille email standard (320 max théorique)
    -- UNIQUE: Contrainte d'unicité - pas de doublons d'email
    -- COMBINAISON: NOT NULL + UNIQUE = valeur obligatoire et unique
    email VARCHAR(255) NOT NULL UNIQUE COMMENT 'Adresse email (unique)',
    
    -- LIGNE 47: CHAMP de métadonnées avec valeur par défaut
    -- TIMESTAMP: Type date/heure précise (YYYY-MM-DD HH:MM:SS)
    -- DEFAULT CURRENT_TIMESTAMP: Valeur auto = moment de l'insertion
    -- UTILITÉ: Audit et traçabilité des créations
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Date de création du compte',
    
    -- LIGNE 52-53: DÉFINITION d'INDEX pour optimisation des requêtes
    -- INDEX: Structure de données pour accélération des recherches
    -- idx_email: Nom de l'index (convention: idx_nomchamp)
    -- UTILITÉ: Recherches par email très rapides (O(log n) vs O(n))
    INDEX idx_email (email),
    
    -- LIGNE 56: INDEX COMPOSÉ sur plusieurs champs
    -- idx_nom_prenom: Index sur combinaison nom+prénom
    -- UTILITÉ: Tri alphabétique et recherche par nom complet rapides
    INDEX idx_nom_prenom (nom, prenom)
    
-- LIGNE 60-61: PARAMÈTRES de stockage et documentation de table
-- ENGINE=InnoDB: Moteur de stockage avec transactions et clés étrangères
-- COMMENT: Documentation globale de la table
) ENGINE=InnoDB 
COMMENT='Table des utilisateurs du système';

-- ==================== INSERTION DE DONNÉES DE TEST ====================
-- LIGNE 65: COMMENTAIRE de section pour données d'exemple
-- UTILITÉ: Peupler la table avec des données réalistes pour tests
-- Utilisateurs de démonstration

-- LIGNE 69: INSTRUCTION d'insertion multiple de données
-- INSERT INTO: Commande d'ajout de données
-- utilisateurs: Table cible
-- (nom, prenom, email): Liste des champs à remplir (ordre important)
-- VALUES: Clause de définition des valeurs
-- STRUCTURE: Chaque ligne VALUES() = un enregistrement
INSERT INTO utilisateurs (nom, prenom, email) VALUES
-- LIGNE 76-83: TUPLES de données pour insertion multiple
-- SYNTAXE: ('valeur1', 'valeur2', 'valeur3') - correspondance avec (nom, prenom, email)
-- VIRGULES: Séparent les enregistrements (sauf le dernier)
-- QUOTES: Apostrophes pour délimiter les chaînes de caractères
('Dupont', 'Jean', 'jean.dupont@example.com'),        -- Enregistrement 1
('Martin', 'Marie', 'marie.martin@example.com'),      -- Enregistrement 2
('Durand', 'Pierre', 'pierre.durand@example.com'),    -- Enregistrement 3
('Moreau', 'Sophie', 'sophie.moreau@example.com'),    -- Enregistrement 4
('Leroy', 'Antoine', 'antoine.leroy@example.com'),    -- Enregistrement 5
('Garcia', 'Elena', 'elena.garcia@example.com'),      -- Enregistrement 6
('Roux', 'Thomas', 'thomas.roux@example.com'),        -- Enregistrement 7
-- LIGNE 84: DERNIER enregistrement sans virgule finale
('Blanc', 'Camille', 'camille.blanc@example.com');    -- Enregistrement 8

-- LIGNE 87: REQUÊTE de vérification des données insérées
-- SELECT: Commande de lecture/consultation
-- *: Sélecteur universel (tous les champs)
-- FROM: Clause de source de données
-- ORDER BY: Clause de tri par champ id croissant
-- UTILITÉ: Contrôle visuel que l'insertion a fonctionné
-- Vérification des données insérées
SELECT * FROM utilisateurs ORDER BY id;

-- ==================== REQUÊTES UTILES POUR PHPMDADMIN ====================
-- LIGNE 92: SECTION de requêtes d'exemple pour administration

-- LIGNE 94-95: EXEMPLE d'ajout d'un nouvel utilisateur
-- COMMENTAIRE: -- en début de ligne = requête désactivée
-- SYNTAXE: Même structure que l'insertion multiple mais pour 1 seul
-- UTILITÉ: Template pour ajouter manuellement des utilisateurs
-- Ajouter un nouvel utilisateur (exemple)
-- INSERT INTO utilisateurs (nom, prenom, email) VALUES ('Nouveau', 'Utilisateur', 'nouveau@example.com');

-- LIGNE 98-99: EXEMPLE de suppression d'utilisateur
-- DELETE FROM: Commande de suppression de données
-- WHERE: Clause de condition (OBLIGATOIRE pour éviter suppression totale)
-- id = 1: Condition de sélection sur clé primaire
-- SÉCURITÉ: Toujours utiliser WHERE avec DELETE
-- Supprimer un utilisateur (exemple)
-- DELETE FROM utilisateurs WHERE id = 1;

-- LIGNE 102-103: EXEMPLE de modification d'utilisateur
-- UPDATE: Commande de modification de données existantes
-- SET: Clause de définition des nouvelles valeurs
-- email = 'nouveau.email@example.com': Assignation nouvelle valeur
-- WHERE: Condition pour cibler l'enregistrement à modifier
-- Modifier un utilisateur (exemple)
-- UPDATE utilisateurs SET email = 'nouveau.email@example.com' WHERE id = 1;

-- LIGNE 106-107: REQUÊTE de comptage d'enregistrements
-- COUNT(*): Fonction d'agrégation pour compter les lignes
-- as count: Alias pour nommer la colonne de résultat
-- UTILITÉ: Statistiques rapides sur le nombre d'utilisateurs
-- Voir le nombre total d'utilisateurs
-- SELECT COUNT(*) as total_utilisateurs FROM utilisateurs;

-- LIGNE 110-111: REQUÊTE des derniers utilisateurs ajoutés
-- ORDER BY date_creation DESC: Tri par date décroissante (plus récent d'abord)
-- LIMIT 5: Limitation à 5 résultats maximum
-- UTILITÉ: Voir les nouveaux comptes créés récemment
-- Voir les derniers utilisateurs ajoutés
-- SELECT * FROM utilisateurs ORDER BY date_creation DESC LIMIT 5;