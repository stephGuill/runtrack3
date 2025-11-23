// ==================== SÉLECTION DES ÉLÉMENTS DOM ====================

// LIGNE 3: Déclaration d'une CONSTANTE (const) - une variable qui ne peut pas être réassignée
// MÉTHODE: document.getElementById() - recherche un élément HTML par son attribut ID
// PARAMÈTRE: 'showButton' - l'ID de l'élément à trouver dans le HTML
// RÉSULTAT: Stocke la référence de l'élément bouton dans la variable showButton
const showButton = document.getElementById('showButton');

// LIGNE 7: Même principe que ligne 3 - déclaration d'une constante
// MÉTHODE: document.getElementById() - accès au DOM (Document Object Model)
// PARAMÈTRE: 'hideButton' - ID du bouton "Cacher" dans le HTML
// CONTRAINTE: const = immutable, on ne peut pas faire showButton = autreElement plus tard
const hideButton = document.getElementById('hideButton');

// LIGNE 11: Troisième constante pour le conteneur du texte
// MÉTHODE: document.getElementById() - même méthode de sélection DOM
// PARAMÈTRE: 'textContainer' - ID du div qui contient le texte à afficher/cacher
// UTILITÉ: Cette référence permet de manipuler l'élément (style, contenu, etc.)
const textContainer = document.getElementById('textContainer');

// ==================== FONCTION POUR AFFICHER LE TEXTE ====================

// LIGNE 19: Déclaration d'une FONCTION nommée showText
// MOT-CLÉ: function - déclare une fonction réutilisable
// PARAMÈTRES: () vide - cette fonction ne prend aucun paramètre en entrée
// PORTÉE: Fonction globale, accessible depuis n'importe où dans le script
function showText() {
    // LIGNE 22: Modification du style CSS de l'élément textContainer
    // PROPRIÉTÉ: style.display - contrôle la visibilité et l'affichage de l'élément
    // VALEUR: 'block' - fait apparaître l'élément comme un bloc (visible)
    // OPÉRATEUR: = (assignation) - assigne la valeur à la propriété
    textContainer.style.display = 'block';
    
    // LIGNE 27: Préparation de l'animation - opacity à 0 (transparent)
    // PROPRIÉTÉ: style.opacity - contrôle la transparence (0 = invisible, 1 = opaque)
    // VALEUR: '0' - rend l'élément complètement transparent
    // BUT: Préparer l'animation de fade-in qui va suivre
    textContainer.style.opacity = '0';
    
    // LIGNE 30: Configuration de la transition CSS
    // PROPRIÉTÉ: style.transition - définit comment les changements de style sont animés
    // VALEUR: 'opacity 0.3s ease-in-out' - anime l'opacity pendant 0.3 secondes avec courbe d'accélération
    // DÉCOMPOSITION: propriété (opacity) + durée (0.3s) + fonction d'accélération (ease-in-out)
    textContainer.style.transition = 'opacity 0.3s ease-in-out';
    
    // LIGNE 34: FONCTION ASYNCHRONE setTimeout()
    // PARAMÈTRE 1: () => {...} - fonction fléchée (arrow function) à exécuter
    // PARAMÈTRE 2: 10 - délai en millisecondes avant exécution
    // BUT: Permet au navigateur de traiter le changement display avant l'animation
    setTimeout(() => {
        // LIGNE 36: Fin de l'animation - opacity à 1 (opaque)
        // EFFET: Crée un effet de fade-in grâce à la transition définie ligne 30
        textContainer.style.opacity = '1';
    }, 10);
    
    // LIGNE 40: MÉTHODE console.log() - affiche un message dans la console du navigateur
    // PARAMÈTRE: 'Texte affiché !' - chaîne de caractères (string) à afficher
    // UTILITÉ: Debug et confirmation que la fonction s'est exécutée
    console.log('Texte affiché !');
}

// ==================== FONCTION POUR CACHER LE TEXTE ====================

// LIGNE 45: Déclaration d'une deuxième FONCTION nommée hideText
// MOT-CLÉ: function - même principe que showText()
// PARAMÈTRES: () vide - aucun paramètre requis
// RÔLE: Fonction inverse de showText(), cache l'élément avec animation
function hideText() {
    // LIGNE 48: Configuration de la transition CSS (même principe que showText)
    // PROPRIÉTÉ: style.transition - définit l'animation
    // VALEUR: 'opacity 0.3s ease-in-out' - même durée et courbe que l'affichage
    textContainer.style.transition = 'opacity 0.3s ease-in-out';
    
    // LIGNE 51: Début de l'animation de disparition
    // PROPRIÉTÉ: style.opacity - contrôle la transparence
    // VALEUR: '0' - rend l'élément transparent (fade-out)
    // EFFET: Déclenche l'animation définie à la ligne précédente
    textContainer.style.opacity = '0';
    
    // LIGNE 56: FONCTION ASYNCHRONE setTimeout() avec délai plus long
    // PARAMÈTRE 1: () => {...} - fonction fléchée à exécuter après le délai
    // PARAMÈTRE 2: 300 - délai en millisecondes (300ms = durée de l'animation)
    // BUT: Attendre la fin de l'animation avant de cacher complètement l'élément
    setTimeout(() => {
        // LIGNE 58: Suppression complète de l'affichage
        // PROPRIÉTÉ: style.display - contrôle l'affichage dans le DOM
        // VALEUR: 'none' - retire l'élément du flux d'affichage (économise les ressources)
        textContainer.style.display = 'none';
    }, 300);
    
    // LIGNE 62: Message de debug dans la console
    // MÉTHODE: console.log() - affichage de confirmation
    // PARAMÈTRE: 'Texte caché !' - message confirmant l'exécution de la fonction
    console.log('Texte caché !');
}

// ==================== AJOUT DES ÉCOUTEURS D'ÉVÉNEMENTS ====================

// LIGNE 68: MÉTHODE addEventListener() - attache un gestionnaire d'événement
// OBJET: showButton - le bouton "Afficher" sélectionné précédemment
// PARAMÈTRE 1: 'click' - TYPE D'ÉVÉNEMENT à écouter (clic de souris)
// PARAMÈTRE 2: showText - RÉFÉRENCE à la fonction à exécuter (pas d'appel avec ())
// FONCTIONNEMENT: Quand l'utilisateur clique sur showButton, showText() est automatiquement appelée
showButton.addEventListener('click', showText);

// LIGNE 74: Même principe pour le bouton "Cacher"
// OBJET: hideButton - le bouton "Cacher" sélectionné précédemment  
// PARAMÈTRE 1: 'click' - même type d'événement (clic de souris)
// PARAMÈTRE 2: hideText - référence à la fonction hideText (pas d'appel direct)
// RÉSULTAT: Association click → hideText(), le navigateur gère automatiquement l'appel
hideButton.addEventListener('click', hideText);

// ==================== INITIALISATION ====================

// LIGNE 79: Message de confirmation du chargement du script
// MÉTHODE: console.log() - affichage dans la console du développeur
// PARAMÈTRE: 'Script chargé ! Les boutons sont prêts à être utilisés.' - message informatif
// UTILITÉ: Confirme que le script JavaScript s'est bien chargé et exécuté
console.log('Script chargé ! Les boutons sont prêts à être utilisés.');

// ==================== FONCTIONS ALTERNATIVES (BONUS) ====================

// LIGNE 84: Déclaration d'une FONCTION ALTERNATIVE toggleText
// MOT-CLÉ: function - déclaration de fonction
// NOM: toggleText - fonction qui "bascule" entre afficher et cacher
// PARAMÈTRES: () vide - aucun paramètre requis
function toggleText() {
    // LIGNE 89: STRUCTURE CONDITIONNELLE if-else
    // CONDITION: Expression booléenne complexe avec OPÉRATEUR LOGIQUE ||
    // PARTIE 1: textContainer.style.display === 'none' - test d'égalité stricte
    // OPÉRATEUR: === (égalité stricte) - compare valeur ET type
    // PARTIE 2: || (OU logique) - si l'une des conditions est vraie
    // PARTIE 3: textContainer.style.display === '' - test si propriété vide
    // LOGIQUE: Si l'élément est caché (none) OU non défini (''), alors...
    if (textContainer.style.display === 'none' || textContainer.style.display === '') {
        // LIGNE 92: APPEL DE FONCTION showText()
        // EXÉCUTION: Si condition vraie, appelle la fonction showText
        // EFFET: Affiche l'élément avec animation
        showText();
    } else {
        // LIGNE 95: CLAUSE ELSE - exécutée si condition if est fausse
        // APPEL DE FONCTION: hideText()
        // LOGIQUE: Si l'élément est visible, alors le cacher
        hideText();
    }
}

// ==================== EXEMPLE D'ALTERNATIVE COMMENTÉE ====================

// LIGNES 102-109: CODE COMMENTÉ (désactivé avec //)
// ALTERNATIVE 2: Utilisation de FONCTIONS ANONYMES directement dans addEventListener
// AVANTAGE: Code plus concis, pas besoin de déclarer des fonctions séparées
// INCONVÉNIENT: Moins réutilisable, plus difficile à maintenir

// EXEMPLE 1: Fonction anonyme pour affichage
// showButton.addEventListener('click', function() {
//     // FONCTION ANONYME: function() sans nom
//     // ACCÈS DOM DIRECT: document.getElementById() dans le gestionnaire
//     document.getElementById('textContainer').style.display = 'block';
// });

// EXEMPLE 2: Fonction anonyme pour masquage  
// hideButton.addEventListener('click', function() {
//     // MÊME PRINCIPE: fonction anonyme exécutée au clic
//     // MODIFICATION DIRECTE: changement de style sans animation
//     document.getElementById('textContainer').style.display = 'none';
// });

// ==================== GESTION AVANCÉE (OPTIONNEL) ====================

// LIGNE 119: STRUCTURE CONDITIONNELLE de VÉRIFICATION D'EXISTENCE
// CONDITION COMPLEXE: Expression avec OPÉRATEURS LOGIQUES &&
// VARIABLE 1: showButton - vérification si la constante contient un élément valide
// OPÉRATEUR: && (ET logique) - toutes les conditions doivent être vraies
// VARIABLE 2: hideButton - vérification de l'existence du deuxième bouton
// VARIABLE 3: textContainer - vérification de l'existence du conteneur
// BUT: S'assurer que tous les éléments DOM nécessaires existent avant utilisation
if (showButton && hideButton && textContainer) {
    // LIGNE 126: BRANCHE if - exécutée si TOUS les éléments sont trouvés
    // MÉTHODE: console.log() - affichage de confirmation
    // MESSAGE: Indique que la configuration est correcte
    console.log('Tous les éléments DOM sont trouvés et configurés.');
} else {
    // LIGNE 129: BRANCHE else - exécutée si UN OU PLUSIEURS éléments manquent
    // MÉTHODE: console.error() - affichage d'erreur (en rouge dans la console)
    // MESSAGE: Alerte de problème de configuration
    // SÉQUENCE D'ÉCHAPPEMENT: \' permet d'utiliser une apostrophe dans une chaîne délimitée par '
    console.error('Erreur: Un ou plusieurs éléments DOM n\'ont pas été trouvés !');
}