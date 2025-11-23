// ==================== VARIABLES GLOBALES ====================

// LIGNE 3: Déclaration d'une CONSTANTE pour sélectionner le bouton
// MÉTHODE: document.getElementById() - accès au DOM par ID unique
// TYPE: HTMLElement - référence vers l'élément bouton HTML
// CONTRAINTE: L'ID 'button' doit exister dans le HTML
const button = document.getElementById('button');

// LIGNE 7: Sélection du conteneur d'affichage de l'expression
// UTILITÉ: Zone où sera inséré le paragraphe <p> avec le contenu du fichier
const expressionContainer = document.getElementById('expressionContainer');

// LIGNE 10: Sélection de l'élément d'affichage du compteur de clics
// UTILITÉ: Statistiques d'usage pour l'utilisateur
const clickCountElement = document.getElementById('clickCount');

// LIGNE 13: Sélection de l'élément d'affichage du temps de chargement
// UTILITÉ: Métriques de performance pour l'utilisateur
const loadTimeElement = document.getElementById('loadTime');

// LIGNE 16: Sélection de l'élément d'affichage de la taille du fichier
// UTILITÉ: Informations sur le fichier chargé
const fileSizeElement = document.getElementById('fileSize');

// ==================== VARIABLES D'ÉTAT GLOBAL ====================

// LIGNE 20: COMPTEUR de clics sur le bouton (statistics)
// TYPE: Number - entier positif incrémenté à chaque clic
// MUTABILITÉ: let = peut être modifié pendant l'exécution
let clickCount = 0;

// LIGNE 23: FLAG BOOLÉEN pour éviter les requêtes simultanées
// TYPE: Boolean - true pendant le chargement, false sinon
// UTILITÉ: Prévention des appels multiples (debouncing manuel)
// CONTRAINTE: Doit être remis à false dans le bloc finally
let isLoading = false;

// ==================== FONCTION PRINCIPALE AVEC FETCH API ====================

/**
 * LIGNE 28: DOCUMENTATION JSDoc - commentaire structuré pour la fonction
 * UTILITÉ: Décrit le rôle, paramètres et comportement de la fonction
 * STANDARD: Format reconnu par les IDE et outils de documentation
 */
/**
 * Fonction qui utilise Fetch pour récupérer le contenu du fichier expression.txt
 * et l'affiche dans un paragraphe <p> dans le corps de la page
 */

// LIGNE 34: Déclaration d'une FONCTION ASYNCHRONE
// MOT-CLÉ: async - permet l'utilisation d'await dans la fonction
// AVANTAGE: Syntaxe plus lisible que les Promises chaînées
// RETOUR: Promise<void> - retourne automatiquement une Promise
async function loadExpression() {
    // LIGNE 39: GARDE DE PROTECTION (Guard Clause)
    // CONDITION: isLoading - vérifie si une requête est déjà en cours
    // PATTERN: Early return - sortie anticipée pour éviter l'exécution
    // UTILITÉ: Prévention des requêtes multiples simultanées (race conditions)
    if (isLoading) {
        console.log(' Chargement déjà en cours...');
        // LIGNE 42: INSTRUCTION return - arrête l'exécution de la fonction
        // EFFET: Ignore le clic si une requête est déjà en cours
        return;
    }
    
    // LIGNE 46: INCRÉMENTATION du compteur de statistiques
    // OPÉRATEUR: ++ (post-incrémentation) - augmente la valeur de 1
    // TIMING: Compte chaque tentative, même en cas d'erreur
    clickCount++;
    
    // LIGNE 49: APPEL de fonction de mise à jour de l'affichage
    updateClickCounter();
    
    // LIGNE 52: CAPTURE du TIMESTAMP de début pour mesurer les performances
    // API: performance.now() - temps haute précision en millisecondes
    // AVANTAGE: Plus précis que Date.now() pour mesurer des durées courtes
    // TYPE: DOMHighResTimeStamp - nombre à virgule flottante
    const startTime = performance.now();
    
    // LIGNE 56: ACTIVATION du mode chargement (UI feedback)
    // PARAMÈTRE: true - active l'état de chargement
    // EFFET: Modifie l'apparence du bouton et définit isLoading = true
    setLoadingState(true);
    
    // LIGNE 59: MESSAGE de debug pour tracer l'exécution
    console.log(' Début du chargement de expression.txt...');
    
    // LIGNE 62: STRUCTURE TRY-CATCH-FINALLY pour la gestion d'erreurs
    // BLOC TRY: Code susceptible de générer des erreurs
    // AVANTAGE: Gestion propre des erreurs asynchrones
    try {
        // ==================== UTILISATION DE FETCH API ====================
        
        // LIGNE 68: APPEL DE L'API FETCH avec AWAIT
        // API: fetch() - API moderne pour les requêtes HTTP
        // PARAMÈTRE: 'expression.txt' - URL relative du fichier à charger
        // MOT-CLÉ: await - attend la résolution de la Promise
        // TYPE: Response - objet représentant la réponse HTTP
        // CONTRAINTE: Le fichier doit exister et être accessible
        const response = await fetch('expression.txt');
        
        // LIGNE 75: VÉRIFICATION du STATUT de la réponse HTTP
        // PROPRIÉTÉ: response.ok - booléen (true si status 200-299)
        // OPÉRATEUR: ! (NOT logique) - inverse le booléen
        // CONDITION: Si la réponse N'EST PAS ok (erreur 404, 500, etc.)
        if (!response.ok) {
            // LIGNE 79: CRÉATION et LANCEMENT d'une erreur personnalisée
            // MOT-CLÉ: throw - déclenche une exception
            // CONSTRUCTOR: new Error() - crée un objet Error
            // TEMPLATE LITERAL: `${response.status}` - interpolation du code d'erreur
            // EFFET: Passe automatiquement dans le bloc catch
            throw new Error(`Erreur HTTP: ${response.status} - ${response.statusText}`);
        }
        
        // LIGNE 84: EXTRACTION du CONTENU TEXTE avec AWAIT
        // MÉTHODE: response.text() - lit le body de la réponse comme texte
        // ALTERNATIVE: response.json() pour du JSON, response.blob() pour binaire
        // RETOUR: Promise<string> - contenu textuel du fichier
        const expressionText = await response.text();
        
        // LIGNE 88: CALCUL du TEMPS DE CHARGEMENT
        // ÉTAPE 1: Nouveau timestamp de fin
        const endTime = performance.now();
        // ÉTAPE 2: Calcul de la différence en millisecondes
        // MÉTHODE: Math.round() - arrondit à l'entier le plus proche
        // RÉSULTAT: Durée en millisecondes entières
        const loadTime = Math.round(endTime - startTime);
        
        // LIGNE 95: CALCUL APPROXIMATIF de la taille du fichier
        // CONSTRUCTOR: new Blob() - crée un objet Binary Large Object
        // PARAMÈTRE: [expressionText] - tableau contenant le texte
        // PROPRIÉTÉ: .size - taille en octets du Blob
        // APPROXIMATION: Peut différer légèrement de la taille réelle du fichier
        // UTILITÉ: Donne une idée de la taille sans requête HEAD supplémentaire
        const fileSize = new Blob([expressionText]).size;
        
        // LIGNE 102: APPEL de fonction d'affichage du contenu
        // FONCTION: displayExpression() - crée et insère un paragraphe <p>
        // PARAMÈTRE: expressionText - le contenu du fichier à afficher
        displayExpression(expressionText);
        
        // LIGNE 106: MISE À JOUR des statistiques d'interface
        // FONCTION: updateStats() - met à jour temps et taille affichés
        // PARAMÈTRES: loadTime (ms), fileSize (octets)
        updateStats(loadTime, fileSize);
        
        // LIGNE 110: MESSAGES de CONFIRMATION dans la console
        // UTILITÉ: Debug et monitoring du succès de l'opération
        console.log(' Expression chargée avec succès !');
        console.log(' Contenu:', expressionText);
        console.log(' Temps de chargement:', loadTime + 'ms');
        console.log(' Taille du fichier:', fileSize + ' octets');
        
    } catch (error) {
        // ==================== GESTION COMPLÈTE DES ERREURS ====================
        
        // LIGNE 118: BLOC CATCH - capture toutes les erreurs du bloc try
        // PARAMÈTRE: error - objet Error contenant les détails de l'erreur
        // TYPES POSSIBLES: NetworkError, TypeError, ReferenceError, Error personnalisée
        
        // LIGNE 124: AFFICHAGE d'erreur avec console.error()
        // MÉTHODE: console.error() - affichage en rouge dans la console
        // AVANTAGE: Distingue les erreurs des logs normaux
        console.error(' Erreur lors du chargement:', error);
        
        // LIGNE 128: AFFICHAGE d'un message d'erreur à l'utilisateur
        // FONCTION: displayError() - crée un paragraphe d'erreur stylisé
        // PARAMÈTRE: error.message - message lisible de l'erreur
        // UTILITÉ: Feedback visuel pour l'utilisateur final
        displayError(error.message);
        
        // LIGNE 133: CALCUL du temps même en cas d'erreur
        // UTILITÉ: Statistiques complètes, même pour les échecs
        const endTime = performance.now();
        const loadTime = Math.round(endTime - startTime);
        
        // LIGNE 137: MISE À JOUR des stats avec indication d'erreur
        // PARAMÈTRE 2: 'Erreur' - chaîne au lieu de nombre pour la taille
        updateStats(loadTime, 'Erreur');
        
    } finally {
        // ==================== BLOC FINALLY - NETTOYAGE OBLIGATOIRE ====================
        
        // LIGNE 142: BLOC FINALLY - exécuté dans TOUS les cas
        // EXÉCUTION: Toujours exécuté, que le try réussisse ou que catch attrape une erreur
        // UTILITÉ: Nettoyage et remise en état garantis
        
        // LIGNE 147: REMISE À ZÉRO de l'état de chargement
        // PARAMÈTRE: false - désactive le mode chargement
        // EFFET: Restaure l'apparence normale du bouton et remet isLoading = false
        // IMPORTANCE: CRITIQUE pour éviter de bloquer définitivement l'interface
        setLoadingState(false);
    }
}

// ==================== FONCTION D'AFFICHAGE DE L'EXPRESSION ====================

/**
 * LIGNE 153: DOCUMENTATION JSDoc avec paramètre typé
 * @param {string} text - Spécification du type et description du paramètre
 * UTILITÉ: Auto-complétion IDE et vérification de type
 */
/**
 * Crée un paragraphe <p> et l'insère dans le corps de la page
 * @param {string} text - Le texte de l'expression à afficher
 */
function displayExpression(text) {
    // LIGNE 161: APPEL de fonction de nettoyage préventif
    // UTILITÉ: Évite l'accumulation de paragraphes à chaque clic
    clearPreviousContent();
    
    // LIGNE 165: CRÉATION DYNAMIQUE d'élément DOM
    // MÉTHODE: document.createElement() - fabrique un nouvel élément HTML
    // PARAMÈTRE: 'p' - type de balise à créer (paragraph)
    // RÉSULTAT: HTMLParagraphElement - nouvel élément <p> non inséré
    const paragraph = document.createElement('p');
    
    // LIGNE 170: ASSIGNATION de classe CSS
    // PROPRIÉTÉ: className - définit la ou les classes CSS
    // VALEUR: 'expression' - applique les styles correspondants
    // ALTERNATIVE: paragraph.classList.add('expression')
    paragraph.className = 'expression';
    
    // LIGNE 175: ASSIGNATION du CONTENU TEXTUEL
    // PROPRIÉTÉ: textContent - contenu texte de l'élément (sans HTML)
    // SÉCURITÉ: Échappe automatiquement les caractères HTML
    // ALTERNATIVE: innerHTML (mais moins sécurisé pour du contenu utilisateur)
    paragraph.textContent = text;
    
    // LIGNE 180: AJOUT d'attribut d'ACCESSIBILITÉ ARIA
    // MÉTHODE: setAttribute() - ajoute ou modifie un attribut HTML
    // ATTRIBUT: 'role' - définit le rôle sémantique pour les lecteurs d'écran
    // VALEUR: 'article' - indique que c'est un contenu autonome
    paragraph.setAttribute('role', 'article');
    // LIGNE 184: DEUXIÈME attribut d'accessibilité ARIA
    // ATTRIBUT: 'aria-label' - fournit une description textuelle
    // UTILITÉ: Aide les lecteurs d'écran à contextualiser le contenu
    // STANDARD: Conformité WCAG (Web Content Accessibility Guidelines)
    paragraph.setAttribute('aria-label', 'Expression favorite chargée depuis le fichier');
    
    // LIGNE 190: INSERTION de l'élément dans le DOM
    // MÉTHODE: appendChild() - ajoute un élément comme dernier enfant
    // PARENT: expressionContainer - le conteneur sélectionné précédemment
    // ENFANT: paragraph - l'élément <p> créé et configuré
    // EFFET: Rend l'élément visible dans la page web
    expressionContainer.appendChild(paragraph);
    
    // LIGNE 196: MESSAGE de confirmation pour le debug
    console.log(' Paragraphe <p> créé et inséré dans le DOM');
}

// ==================== FONCTION D'AFFICHAGE D'ERREUR ====================

/**
 * LIGNE 201: DOCUMENTATION de fonction d'erreur
 * @param {string} errorMessage - Message d'erreur à afficher à l'utilisateur
 */
/**
 * Affiche un message d'erreur stylisé
 * @param {string} errorMessage - Le message d'erreur à afficher
 */
function displayError(errorMessage) {
    // LIGNE 209: NETTOYAGE préalable identique à displayExpression()
    // UTILITÉ: Évite la coexistence de contenu normal et d'erreur
    clearPreviousContent();
    
    // LIGNE 213: CRÉATION d'élément paragraphe pour l'erreur
    const errorParagraph = document.createElement('p');
    
    // LIGNE 216: ASSIGNATION de CLASSES CSS MULTIPLES
    // CLASSES: 'expression error' - hérite du style expression + style erreur
    // EFFET: Style de base + couleur rouge, icône, etc.
    errorParagraph.className = 'expression error';
    
    // LIGNE 220: CRÉATION du MESSAGE d'erreur avec TEMPLATE LITERAL
    // PRÉFIXE:  - émoji pour feedback visuel immédiat
    // INTERPOLATION: ${errorMessage} - insertion du message d'erreur
    // RÉSULTAT: " Erreur: Fichier non trouvé" par exemple
    errorParagraph.textContent = ` Erreur: ${errorMessage}`;
    
    // LIGNE 225: ATTRIBUT ARIA pour les ALERTES
    // ROLE: 'alert' - signale aux lecteurs d'écran qu'c'est une alerte urgente
    // COMPORTEMENT: Annonce immédiatement le contenu même si focus ailleurs
    errorParagraph.setAttribute('role', 'alert');
    
    // LIGNE 229: LABEL ARIA descriptif pour l'erreur
    errorParagraph.setAttribute('aria-label', 'Erreur de chargement');
    
    // LIGNE 232: INSERTION dans le DOM (même processus que displayExpression)
    expressionContainer.appendChild(errorParagraph);
    
    // LIGNE 235: LOG de confirmation
    console.log(' Message d\'erreur affiché');
}

// ==================== FONCTION DE NETTOYAGE DOM ====================

/**
 * LIGNE 239: FONCTION UTILITAIRE simple sans paramètres
 * UTILITÉ: Réinitialise l'état d'affichage entre les chargements
 */
/**
 * Supprime le contenu précédent du conteneur
 */
function clearPreviousContent() {
    // LIGNE 246: VIDAGE COMPLET du conteneur
    // PROPRIÉTÉ: innerHTML - contenu HTML interne de l'élément
    // VALEUR: '' (chaîne vide) - supprime tout le contenu HTML
    // EFFET: Retire tous les éléments enfants (paragraphes précédents)
    // ALTERNATIVE: while(container.firstChild) container.removeChild(container.firstChild)
    expressionContainer.innerHTML = '';
}

// ==================== GESTION DE L'ÉTAT DE CHARGEMENT ====================

/**
 * LIGNE 252: FONCTION de gestion d'état avec paramètre booléen
 * @param {boolean} loading - Indicateur d'état de chargement
 * UTILITÉ: Centralise la gestion de l'interface pendant les requêtes
 */
/**
 * Gère l'état visuel du bouton pendant le chargement
 * @param {boolean} loading - True si en cours de chargement
 */
function setLoadingState(loading) {
    // LIGNE 260: SYNCHRONISATION de la variable globale d'état
    // ASSIGNATION: isLoading = loading - met à jour le flag global
    // IMPORTANCE: Cohérence entre l'état interne et l'interface
    isLoading = loading;
    
    // LIGNE 265: STRUCTURE CONDITIONNELLE pour l'état de chargement
    if (loading) {
        // ==================== BRANCHE IF - ÉTAT DE CHARGEMENT ACTIF ====================
        
        // LIGNE 269: AJOUT de classe CSS pour styling visuel
        // MÉTHODE: classList.add() - ajoute une classe à l'élément
        // CLASSE: 'loading' - applique styles de chargement (animation, couleur, etc.)
        button.classList.add('loading');
        
        // LIGNE 273: MODIFICATION du texte du bouton
        // PROPRIÉTÉ: textContent - change le texte affiché
        // VALEUR: 'Chargement...' - indique l'action en cours
        button.textContent = 'Chargement...';
        
        // LIGNE 277: DÉSACTIVATION du bouton pendant chargement
        // PROPRIÉTÉ: disabled - booléen qui rend le bouton non-cliquable
        // VALEUR: true - empêche les clics multiples
        // EFFET: Bouton grisé et non-interactif
        button.disabled = true;
    } else {
        // ==================== BRANCHE ELSE - ÉTAT NORMAL (REPOS) ====================
        
        // LIGNE 284: SUPPRESSION de la classe de chargement
        // MÉTHODE: classList.remove() - retire une classe CSS
        // EFFET: Restaure l'apparence normale du bouton
        button.classList.remove('loading');
        
        // LIGNE 288: RESTAURATION du texte original
        // TEXTE: Inclut un émoji  pour l'attractivité visuelle
        button.textContent = ' Charger l\'expression favorite';
        
        // LIGNE 292: RÉACTIVATION du bouton
        // VALEUR: false - rend le bouton à nouveau cliquable
        // IMPORTANCE: Permet les interactions futures
        button.disabled = false;
    }
}

// ==================== MISE À JOUR DES STATISTIQUES ====================

/**
 * LIGNE 298: FONCTION SIMPLE de mise à jour du compteur
 * UTILITÉ: Synchronise l'affichage avec la variable clickCount
 */
/**
 * Met à jour le compteur de clics
 */
function updateClickCounter() {
    // LIGNE 305: MISE À JOUR de l'affichage du compteur
    // PROPRIÉTÉ: textContent - contenu textuel de l'élément
    // VALEUR: clickCount - variable globale incrémentée à chaque clic
    // EFFET: Affiche "1", "2", "3"... dans l'interface
    clickCountElement.textContent = clickCount;
}

/**
 * LIGNE 311: FONCTION COMPLEXE de mise à jour des métriques
 * @param {number} loadTime - Temps de chargement en millisecondes
 * @param {number|string} fileSize - Taille du fichier en octets OU "Erreur"
 * COMPLEXITÉ: Gère différents types pour fileSize (polymorphisme)
 */
/**
 * Met à jour les statistiques de chargement
 * @param {number} loadTime - Temps de chargement en ms
 * @param {number|string} fileSize - Taille du fichier
 */
function updateStats(loadTime, fileSize) {
    // LIGNE 321: MISE À JOUR du temps d'affichage
    // SIMPLE ASSIGNATION: Convertit le nombre en chaîne automatiquement
    loadTimeElement.textContent = loadTime;
    
    // LIGNE 325: VÉRIFICATION du TYPE avec typeof
    // OPÉRATEUR: typeof - retourne le type primitif de la variable
    // CONDITION: fileSize est-il un nombre (pas une chaîne "Erreur") ?
    if (typeof fileSize === 'number') {
        // ==================== FORMATAGE INTELLIGENT de la taille ====================
        
        // LIGNE 330: CONDITION pour les petits fichiers (< 1 KB)
        // SEUIL: 1024 octets = 1 kilo-octet
        if (fileSize < 1024) {
            // LIGNE 332: AFFICHAGE en octets (B = bytes)
            fileSizeElement.textContent = fileSize + ' B';
        } else {
            // LIGNE 334: CONVERSION et ARRONDI pour les gros fichiers
            // CALCUL: fileSize / 1024 = taille en KB
            // Math.round(x * 100) / 100 = arrondi à 2 décimales
            // EXEMPLE: 2560 octets → 2.50 KB
            fileSizeElement.textContent = Math.round(fileSize / 1024 * 100) / 100 + ' KB';
        }
    } else {
        // ==================== BRANCHE ELSE - GESTION des erreurs ====================
        
        // LIGNE 340: AFFICHAGE DIRECT pour les non-nombres
        // CAS: fileSize = "Erreur" (chaîne passée depuis le catch)
        // EFFET: Affiche "Erreur" au lieu d'une taille
        fileSizeElement.textContent = fileSize;
    }
}

// ==================== FONCTION DE RESET ====================
/**
 * Remet l'interface à zéro
 */
function resetInterface() {
    clearPreviousContent();
    clickCount = 0;
    updateClickCounter();
    loadTimeElement.textContent = '--';
    fileSizeElement.textContent = '--';
    console.log(' Interface remise à zéro');
}

// ==================== FONCTIONS DE DEBUG ====================
/**
 * Teste la fonction Fetch avec différents fichiers
 */
function testFetch() {
    console.log(' Test de la fonction Fetch...');
    loadExpression();
}

/**
 * Simule une erreur de réseau
 */
function simulateError() {
    console.log(' Simulation d\'une erreur...');
    displayError('Fichier introuvable ou inaccessible');
}

/**
 * Affiche des informations de debug
 */
function debugInfo() {
    console.log(' Informations de debug:');
    console.log('- Bouton trouvé:', !!button);
    console.log('- Conteneur trouvé:', !!expressionContainer);
    console.log('- Nombre de clics:', clickCount);
    console.log('- État de chargement:', isLoading);
    console.log('- Support Fetch:', 'fetch' in window);
}

// ==================== VÉRIFICATION DU SUPPORT FETCH ====================
/**
 * Vérifie si l'API Fetch est supportée par le navigateur
 */
function checkFetchSupport() {
    if (!('fetch' in window)) {
        console.error(' L\'API Fetch n\'est pas supportée par ce navigateur');
        displayError('Votre navigateur ne supporte pas l\'API Fetch');
        button.disabled = true;
        return false;
    }
    
    console.log(' API Fetch supportée');
    return true;
}

// ==================== GESTION DES ÉVÉNEMENTS ====================
/**
 * Ajoute les écouteurs d'événements
 */
function addEventListeners() {
    // Événement principal du bouton
    button.addEventListener('click', loadExpression);
    
    // Raccourcis clavier
    document.addEventListener('keydown', (event) => {
        switch (event.key) {
            case 'Enter':
            case ' ': // Barre d'espace
                if (event.target === button) {
                    event.preventDefault();
                    loadExpression();
                }
                break;
            case 'r':
            case 'R':
                if (event.ctrlKey) {
                    event.preventDefault();
                    resetInterface();
                }
                break;
        }
    });
    
    // Gestion du focus pour l'accessibilité
    button.addEventListener('focus', () => {
        console.log(' Bouton en focus');
    });
    
    console.log(' Écouteurs d\'événements ajoutés');
}

// ==================== INITIALISATION PRINCIPALE ====================

/**
 * LIGNE 528: FONCTION MAÎTRE d'initialisation de l'application
 * RÔLE: Point d'entrée principal qui configure tout l'environnement
 */
/**
 * Initialise l'application
 */
function initializeApp() {
    console.log(' Initialisation de l\'application Fetch...');
    
    // LIGNE 536: VÉRIFICATION de compatibilité navigateur
    // FONCTION: checkFetchSupport() - teste si Fetch API est disponible
    // PATTERN: Early return si incompatibilité détectée
    if (!checkFetchSupport()) {
        return;
    }
    
    // LIGNE 542: VÉRIFICATION de l'EXISTENCE des éléments DOM critiques
    // CONDITION: !button || !expressionContainer - OU logique avec NOT
    // LOGIQUE: Si l'un des éléments manque, arrêter l'initialisation
    // SÉCURITÉ: Évite les erreurs "Cannot read property of null"
    if (!button || !expressionContainer) {
        console.error(' Éléments DOM requis non trouvés');
        return;
    }
    
    // LIGNE 548: CONFIGURATION des gestionnaires d'événements
    addEventListeners();
    
    // LIGNE 551: EXPOSITION GLOBALE des fonctions de debug
    // UTILITÉ: Permet l'accès depuis la console du développeur
    // SYNTAXE: window.nomFonction = référenceFonction
    window.testFetch = testFetch;
    window.simulateError = simulateError;
    window.debugInfo = debugInfo;
    window.resetInterface = resetInterface;
    
    // LIGNE 557: MESSAGES de confirmation et aide
    console.log(' Application initialisée avec succès !');
    console.log(' Fonctions de debug disponibles: testFetch(), simulateError(), debugInfo(), resetInterface()');
    console.log(' Raccourcis: Ctrl+R = Reset');
}

// ==================== ÉVÉNEMENTS DE CHARGEMENT DE LA PAGE ====================

// LIGNE 563: ÉCOUTEUR D'ÉVÉNEMENT PRINCIPAL pour l'initialisation
// ÉVÉNEMENT: 'DOMContentLoaded' - déclenché quand le DOM est complètement construit
// DIFFÉRENCE avec 'load': Plus rapide car n'attend pas images/CSS
// CALLBACK: initializeApp - fonction d'initialisation principale
// IMPORTANCE: Garantit que tous les éléments HTML existent avant manipulation
document.addEventListener('DOMContentLoaded', initializeApp);

// LIGNE 570: ÉCOUTEUR ALTERNATIF pour chargement complet
// ÉVÉNEMENT: 'load' - déclenché quand TOUT est chargé (images, CSS, scripts)
// UTILITÉ: Confirmation que l'environnement est entièrement prêt
// PATTERN: Double sécurité d'initialisation
window.addEventListener('load', () => {
    console.log(' Page complètement chargée');
    console.log(' Prêt pour utiliser Fetch API !');
});

// ==================== GESTION GLOBALE DES ERREURS ====================

// LIGNE 578: GESTIONNAIRE D'ERREUR GLOBAL pour monitoring
// ÉVÉNEMENT: 'error' - capture toutes les erreurs JavaScript non gérées
// PORTÉE: window - niveau global de l'application
// UTILITÉ: Filet de sécurité pour les erreurs imprévues
// CALLBACK: (event) => {...} - fonction fléchée recevant l'événement d'erreur
window.addEventListener('error', (event) => {
    // LIGNE 584: AFFICHAGE d'erreur avec console.error()
    // PROPRIÉTÉ: event.error - objet Error contenant les détails
    // UTILITÉ: Debug en production et monitoring des erreurs
    console.error(' Erreur globale:', event.error);
});

// MESSAGE FINAL de confirmation du chargement du script
console.log(' Script Fetch chargé avec succès !');

window.addEventListener('unhandledrejection', (event) => {
    console.error(' Promise rejetée non gérée:', event.reason);
});

console.log(' Script Fetch chargé avec succès !');