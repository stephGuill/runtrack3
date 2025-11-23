<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs - Jour04 Job04</title>
    
    <!-- ==================== STYLES CSS ==================== -->
    <style>
        /* Reset et styles de base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        
        /* En-tête */
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .header p {
            font-size: 1.1em;
            opacity: 0.9;
        }
        
        /* Section des contrôles */
        .controls {
            padding: 30px;
            background: #f8f9fa;
            border-bottom: 1px solid #e9ecef;
        }
        
        .controls-grid {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }
        
        .status {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .status-badge {
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.9em;
        }
        
        .status-badge.loading {
            background: #fff3cd;
            color: #856404;
        }
        
        .status-badge.success {
            background: #d4edda;
            color: #155724;
        }
        
        .status-badge.error {
            background: #f8d7da;
            color: #721c24;
        }
        
        /* Bouton de mise à jour */
        .update-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        
        .update-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }
        
        .update-btn:active {
            transform: translateY(0);
        }
        
        .update-btn:disabled {
            background: #6c757d;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        /* Section du tableau */
        .table-section {
            padding: 30px;
        }
        
        .table-container {
            overflow-x: auto;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        /* Styles du tableau */
        .users-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 1em;
            background: white;
        }
        
        .users-table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .users-table th {
            padding: 15px 20px;
            text-align: left;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9em;
        }
        
        .users-table td {
            padding: 15px 20px;
            border-bottom: 1px solid #e9ecef;
            transition: background-color 0.2s ease;
        }
        
        .users-table tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        .users-table tbody tr:nth-child(even) {
            background-color: #fafafa;
        }
        
        .users-table tbody tr:nth-child(even):hover {
            background-color: #f0f0f0;
        }
        
        /* Styles pour les cellules spécifiques */
        .id-cell {
            font-weight: bold;
            color: #667eea;
            text-align: center;
            width: 80px;
        }
        
        .email-cell {
            color: #0066cc;
            font-family: 'Courier New', monospace;
        }
        
        .date-cell {
            color: #6c757d;
            font-size: 0.9em;
            width: 180px;
        }
        
        /* Message d'état vide */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
        }
        
        .empty-state h3 {
            margin-bottom: 10px;
            color: #495057;
        }
        
        /* Loader animé */
        .loader {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }
            
            .header h1 {
                font-size: 2em;
            }
            
            .controls-grid {
                flex-direction: column;
                align-items: stretch;
            }
            
            .users-table th,
            .users-table td {
                padding: 10px 15px;
            }
            
            .date-cell {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- ==================== STRUCTURE HTML ==================== -->
    <div class="container">
        <!-- En-tête -->
        <div class="header">
            <h1> Gestion des Utilisateurs</h1>
            <p>Interface de consultation des utilisateurs avec mise à jour en temps réel</p>
        </div>
        
        <!-- Section des contrôles -->
        <div class="controls">
            <div class="controls-grid">
                <!-- Statut de l'application -->
                <div class="status">
                    <span id="statusBadge" class="status-badge loading">
                        <span class="loader"></span> Chargement...
                    </span>
                    <span id="userCount">0 utilisateur(s)</span>
                </div>
                
                <!-- Bouton de mise à jour -->
                <button id="updateBtn" class="update-btn" onclick="updateUserTable()">
                     Mettre à jour
                </button>
            </div>
        </div>
        
        <!-- Section du tableau -->
        <div class="table-section">
            <div class="table-container">
                <table class="users-table" id="usersTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Date de création</th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody">
                        <!-- Les données seront insérées ici par JavaScript -->
                    </tbody>
                </table>
                
                <!-- Message d'état vide -->
                <div id="emptyState" class="empty-state" style="display: none;">
                    <h3>📭 Aucun utilisateur trouvé</h3>
                    <p>La base de données ne contient aucun utilisateur.<br>
                    Ajoutez des utilisateurs via phpMyAdmin et cliquez sur "Mettre à jour".</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== JAVASCRIPT ==================== -->
    <script>
        // LIGNE 304: BALISE script pour code JavaScript côté client
        // LIGNE 305: COMMENTAIRE de section pour organisation
        
        // ==================== VARIABLES GLOBALES D'ÉTAT ====================
        
        // LIGNE 309-311: DÉCLARATION des variables de gestion d'état application
        // let: Déclaration de variable modifiable (ES6)
        // UTILITÉ: Stockage de l'état global de l'application
        
        // Variables globales pour la gestion de l'état
        let isLoading = false;      // LIGNE 312: FLAG booléen - true pendant les requêtes AJAX
        let usersData = [];         // LIGNE 313: ARRAY - stockage des données utilisateurs reçues
        let lastUpdate = null;      // LIGNE 314: VARIABLE - timestamp de dernière mise à jour
        
        // ==================== RÉFÉRENCES DOM CACHÉES ====================
        
        // LIGNE 317-322: SÉLECTION et MISE EN CACHE des éléments DOM
        // const: Déclaration constante (références ne changeront pas)
        // getElementById(): Sélection par ID unique
        // UTILITÉ: Évite re-sélections multiples, améliore performance
        
        // Références aux éléments DOM
        const statusBadge = document.getElementById('statusBadge');        // Badge de statut
        const userCount = document.getElementById('userCount');            // Compteur utilisateurs
        const updateBtn = document.getElementById('updateBtn');            // Bouton mise à jour
        const usersTableBody = document.getElementById('usersTableBody');  // Corps du tableau
        const emptyState = document.getElementById('emptyState');          // Message "aucun résultat"
        
        /**
         * LIGNE 325: DÉFINITION de fonction de mise à jour du statut UI
         * FONCTION: updateStatus - change l'affichage du badge de statut
         * PARAMETERS: type (string), message (string)
         * UTILITÉ: Centralise la logique d'affichage des états
         */
        /**
         * Met à jour le statut de l'interface
         * @param {string} type - Type de statut: 'loading', 'success', 'error'
         * @param {string} message - Message à afficher
         */
        function updateStatus(type, message) {
            // LIGNE 344: MODIFICATION de la classe CSS du badge
            // className: Propriété pour changer les classes CSS appliquées
            // TEMPLATE LITERAL: `status-badge ${type}` combine classe de base + modificateur
            // UTILITÉ: Styling conditionnel (couleurs différentes par type)
            statusBadge.className = `status-badge ${type}`;
            
            // LIGNE 349-355: STRUCTURE CONDITIONNELLE pour contenu du badge
            // if/else if: Branchement selon le type de statut
            // innerHTML: Propriété pour injecter HTML dans l'élément
            
            if (type === 'loading') {
                // LIGNE 352: CONTENU pour état de chargement
                // CONCATÉNATION: HTML du loader + message textuel
                statusBadge.innerHTML = '<span class="loader"></span> ' + message;
            } else if (type === 'success') {
                // LIGNE 354: CONTENU pour état de succès avec emoji
                statusBadge.innerHTML = ' ' + message;
            } else if (type === 'error') {
                // LIGNE 356: CONTENU pour état d'erreur avec emoji
                statusBadge.innerHTML = ' ' + message;
            }
        }
        
        /**
         * LIGNE 360: FONCTION de mise à jour du compteur d'utilisateurs
         * PARAMETER: count (number) - nombre à afficher
         * UTILITÉ: Centralise l'affichage du nombre d'utilisateurs
         */
        /**
         * Met à jour le compteur d'utilisateurs
         * @param {number} count - Nombre d'utilisateurs
         */
        function updateUserCount(count) {
            // LIGNE 368: MODIFICATION du contenu textuel
            // textContent: Propriété pour texte brut (sécurisé vs innerHTML)
            // TEMPLATE LITERAL: Interpolation du nombre avec texte
            userCount.textContent = `${count} utilisateur(s)`;
        }
        
        /**
         * LIGNE 372: FONCTION de formatage de date pour affichage
         * PARAMETER: dateString (string) - date au format ISO/MySQL
         * RETURN: string - date formatée pour l'utilisateur français
         * UTILITÉ: Conversion format base → format lisible
         */
        /**
         * Formate une date pour l'affichage
         * @param {string} dateString - Date au format ISO
         * @returns {string} Date formatée
         */
        function formatDate(dateString) {
            // LIGNE 381: VALIDATION de l'existence de la date
            // CONDITION: !dateString teste null, undefined, chaîne vide
            // RETURN ANTICIPÉ: 'N/A' si pas de date valide
            if (!dateString) return 'N/A';
            
            // LIGNE 384: CRÉATION d'objet Date JavaScript
            // new Date(): Constructeur avec string de date en paramètre
            // PARSING: Convertit string ISO → objet Date manipulable
            const date = new Date(dateString);
            
            // LIGNE 386-392: FORMATAGE selon localisation française
            // toLocaleDateString(): Méthode de formatage localisé
            // 'fr-FR': Code locale pour format français
            // OPTIONS: Objet de configuration du formatage
            return date.toLocaleDateString('fr-FR', {
                day: '2-digit',      // Jour sur 2 chiffres (01, 15, 31)
                month: '2-digit',    // Mois sur 2 chiffres (01, 12)
                year: 'numeric',     // Année complète (2025)
                hour: '2-digit',     // Heure sur 2 chiffres (09, 14)
                minute: '2-digit'    // Minutes sur 2 chiffres (05, 30)
            });
        }
        
        /**
         * Génère le HTML pour une ligne d'utilisateur
         * @param {Object} user - Objet utilisateur
         * @returns {string} HTML de la ligne
         */
        function generateUserRow(user) {
            // LIGNE 408-418: TEMPLATE LITERAL pour génération HTML
            // RETURN: Chaîne HTML formatée avec données utilisateur
            // TEMPLATE STRING: `backticks` permettent multi-lignes et interpolation
            return `
                <tr>
                    <td class="id-cell">${user.id}</td>
                    <td>${user.nom}</td>
                    <td>${user.prenom}</td>
                    <td class="email-cell">${user.email}</td>
                    <td class="date-cell">${formatDate(user.date_creation)}</td>
                </tr>
            `;
            // EXPLICATION template literal:
            // ${variable}: Interpolation pour injecter valeur
            // user.propriété: Accès aux propriétés de l'objet
            // formatDate(): Appel de fonction pour transformation
            // Classes CSS: Styles appliqués selon colonnes
        }
        
        /**
         * Met à jour l'affichage du tableau
         * @param {Array} users - Tableau des utilisateurs
         */
        function displayUsers(users) {
            // LIGNE 429: CONDITION pour tableau vide
            // PROPRIÉTÉ length: Nombre d'éléments dans array
            // COMPARAISON: === 0 teste absence d'utilisateurs
            if (users.length === 0) {
                // LIGNE 430-432: AFFICHAGE état vide
                // innerHTML = '': Vide le contenu du tbody
                // style.display: Modification du style CSS en JavaScript
                // 'block'/'none': Valeurs pour montrer/cacher élément
                usersTableBody.innerHTML = '';
                emptyState.style.display = 'block';
                document.querySelector('.table-container table').style.display = 'none';
            } else {
                // LIGNE 433-437: AFFICHAGE avec données
                // BRANCHE else: Exécutée si users.length > 0
                // querySelector(): Sélection d'élément par sélecteur CSS
                // display = 'table': Affichage spécifique aux tableaux HTML
                emptyState.style.display = 'none';
                document.querySelector('.table-container table').style.display = 'table';
                
                // LIGNE 458: GÉNÉRATION du HTML pour toutes les lignes
                // MAP: Transforme chaque user en HTML via generateUserRow()
                // JOIN: Concatène toutes les chaînes avec séparateur vide
                // MÉTHODE CHAÎNÉE: .map().join() pour transformation + assemblage
                const htmlRows = users.map(generateUserRow).join('');
                // LIGNE 459: INSERTION du HTML dans le DOM
                // innerHTML: Remplace tout le contenu du tbody
                usersTableBody.innerHTML = htmlRows;
            }
            
            // LIGNE 463: MISE À JOUR du compteur
            // APPEL FONCTION: updateUserCount() avec nombre d'utilisateurs
            // users.length: Propriété length pour taille du tableau
            updateUserCount(users.length);
        }
        
        /**
         * Fonction principale de mise à jour du tableau
         * Récupère les données depuis users.php via fetch
         */
        async function updateUserTable() {
            // LIGNE 472-475: PROTECTION contre appels simultanés
            // CONDITION: Vérifie si une mise à jour est en cours
            // GUARD CLAUSE: return anticipé pour éviter doublons
            // CONSOLE.LOG: Debug pour tracer l'exécution
            if (isLoading) {
                console.log('Mise à jour déjà en cours...');
                return;
            }
            
            // LIGNE 477-479: INITIALISATION de l'état loading
            // VARIABLE D'ÉTAT: isLoading = true pour marquer début
            // PROPRIÉTÉ disabled: Désactive le bouton pendant traitement
            // APPEL FONCTION: updateStatus() pour feedback utilisateur
            isLoading = true;
            updateBtn.disabled = true;
            updateStatus('loading', 'Récupération des données...');
            
            // LIGNE 481-488: BLOC TRY pour gestion d'erreurs
            // TRY-CATCH: Structure pour capturer les exceptions
            // ASYNC/AWAIT: Gestion asynchrone des promesses
            try {
                console.log(' Début de la mise à jour des utilisateurs...');
                
                // LIGNE 485-489: APPEL API avec fetch()
                // FETCH: Fonction moderne pour requêtes HTTP
                // AWAIT: Attend la résolution de la promesse
                // CONFIGURATION: Objet options pour la requête
                const response = await fetch('users.php', {
                    method: 'GET',                    // MÉTHODE HTTP: GET pour lecture
                    headers: {                        // EN-TÊTES: Configuration de la requête
                        'Accept': 'application/json', // ACCEPTE: Format JSON attendu
                        'Content-Type': 'application/json'  // TYPE: Format envoyé
                    }
                });
                
                // LIGNE 518-521: VÉRIFICATION de la réponse HTTP
                // PROPRIÉTÉ ok: Boolean true si status 200-299
                // OPÉRATEUR !: Négation logique (NOT)
                // THROW: Lancement d'exception personnalisée
                // TEMPLATE LITERAL: Construction du message d'erreur
                if (!response.ok) {
                    throw new Error(`Erreur HTTP: ${response.status} - ${response.statusText}`);
                }
                
                // LIGNE 523-525: PARSING du JSON
                // response.json(): Méthode pour décoder le JSON
                // AWAIT: Attente de la promesse de décodage
                // CONST: Stockage du résultat dans variable
                const result = await response.json();
                console.log(' Réponse reçue:', result);
                
                // LIGNE 527-530: VÉRIFICATION de la structure réponse
                // PROPRIÉTÉ success: Indicateur de réussite côté serveur
                // OPÉRATEUR ||: OU logique pour valeur par défaut
                // ERROR HANDLING: Gestion des erreurs métier
                if (!result.success) {
                    throw new Error(result.error || 'Erreur inconnue du serveur');
                }
                
                // LIGNE 532-534: MISE À JOUR des données globales
                // ASSIGNMENT: usersData stocke les nouvelles données
                // new Date(): Timestamp de la dernière mise à jour
                // PROPRIÉTÉ data: Tableau des utilisateurs depuis l'API
                usersData = result.data || [];
                lastUpdate = new Date();
                
                // LIGNE 536-539: MISE À JOUR de l'affichage
                // APPEL FONCTION: displayUsers() pour refresh UI
                // TEMPLATE LITERAL: Message dynamique avec compteur
                // SUCCESS STATUS: Feedback visuel positif
                displayUsers(usersData);
                updateStatus('success', `Mis à jour (${result.count} utilisateurs)`);
                
                console.log(` Mise à jour réussie: ${usersData.length} utilisateurs affichés`);
                
            } catch (error) {
                // LIGNE 561-567: BLOC CATCH pour gestion d'erreurs
                // PARAMETER error: Exception capturée automatiquement
                // console.error(): Log d'erreur avec style dans DevTools
                // FALLBACK: Affichage tableau vide si pas de données cache
                console.error(' Erreur lors de la mise à jour:', error);
                updateStatus('error', 'Erreur de récupération');
                
                // LIGNE 565-567: GESTION données cache en cas d'erreur
                // CONDITION: Vérifie si pas de données sauvegardées
                // FALLBACK GRACEFUL: Affiche tableau vide plutôt que crash
                if (usersData.length === 0) {
                    displayUsers([]);
                }
            } finally {
                // LIGNE 569-571: BLOC FINALLY (toujours exécuté)
                // CLEANUP: Remet l'état initial même en cas d'erreur
                // PROPRIÉTÉ disabled: Réactive le bouton
                // VARIABLE D'ÉTAT: Marque fin du processus loading
                isLoading = false;
                updateBtn.disabled = false;
            }
        }
        
        /**
         * Initialisation de l'application
         */
        function initializeApp() {
            // LIGNE 576: LOG de démarrage pour debug
            // console.log(): Affichage dans DevTools pour suivre exécution
            // EMOJI:  pour identifier visuellement le démarrage
            console.log(' Initialisation de l\'application...');
            
            // LIGNE 579: CHARGEMENT initial des données
            // APPEL FONCTION: updateUserTable() au démarrage
            // ASYNC: Fonction asynchrone lancée immédiatement
            updateUserTable();
            
            // LIGNE 582: EVENT LISTENER pour interaction utilisateur
            // addEventListener(): Méthode DOM pour événements
            // 'click': Type d'événement à écouter
            // updateUserTable: Fonction callback (sans parenthèses!)
            updateBtn.addEventListener('click', updateUserTable);
            
            // LIGNE 584: CONFIRMATION d'initialisation
            console.log(' Application initialisée');
        }
        
        // LIGNE 587: DÉMARRAGE automatique après chargement DOM
        // DOMContentLoaded: Événement déclenché quand HTML est parsé
        // ALTERNATIVE à window.onload (plus rapide)
        // PATTERN MODERNE: Attendre DOM avant manipulation
        document.addEventListener('DOMContentLoaded', initializeApp);
        
        // LIGNE 614-624: FONCTION GLOBALE de debug
        // window.debugUsers: Attachée à l'objet global window
        // UTILITÉ: Accessible depuis console DevTools pour debug
        // FONCTION ANONYME: function() sans nom, assignée à propriété
        window.debugUsers = function() {
            // LIGNE 620-626: LOG d'informations de debug
            // console.log(): Affichage structuré des variables d'état
            // OBJET LITERAL: {} pour grouper les données
            // PROPRIÉTÉS: Variables globales importantes de l'app
            console.log(' Debug - Données actuelles:', {
                usersData,                    // DONNÉES: Tableau des utilisateurs
                lastUpdate,                   // TIMESTAMP: Dernière mise à jour
                isLoading,                    // ÉTAT: Boolean de chargement
                count: usersData.length       // COMPTEUR: Nombre d'utilisateurs
            });
        };
    </script>
</body>
</html>