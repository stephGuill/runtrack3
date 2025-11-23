// ==================== VARIABLES GLOBALES ====================

// LIGNE 3: Déclaration d'une CONSTANTE (const) contenant un TABLEAU (Array)
// TYPE: Array<string> - tableau de chaînes de caractères
// CONTENU: Noms des fichiers images dans l'ordre correct de l'arc-en-ciel
// CONTRAINTE: const = immutable, ce tableau ne peut pas être réassigné
// UTILITÉ: Référence pour vérifier si le joueur a reconstruit correctement l'arc-en-ciel
const correctOrder = ['arc1.png', 'arc2.png', 'arc3.png', 'arc4.png', 'arc5.png', 'arc6.png'];

// LIGNE 9: Déclaration d'une VARIABLE (let) contenant un tableau dynamique
// TYPE: Array<string|null> - tableau pouvant contenir des chaînes ou null
// CRÉATION: new Array(6) crée un tableau de 6 éléments
// MÉTHODE: .fill(null) remplit tous les éléments avec la valeur null
// CONTRAINTE: let = mutable, ce tableau peut être modifié pendant le jeu
// UTILITÉ: Stocke l'ordre actuel des pièces placées par le joueur
let currentOrder = new Array(6).fill(null);

// LIGNE 15: Sélection d'élément DOM par ID
// MÉTHODE: document.getElementById() - accès au DOM (Document Object Model)
// PARAMÈTRE: 'shuffleButton' - ID du bouton de mélange dans le HTML
// TYPE: HTMLElement - référence vers un élément HTML
// CONTRAINTE: L'ID doit exister dans le HTML, sinon retourne null
const shuffleButton = document.getElementById('shuffleButton');

// LIGNE 18: Sélection du conteneur des pièces disponibles
// ÉLÉMENT: Conteneur où sont affichées les pièces à glisser
// UTILITÉ: Zone source pour le drag & drop
const piecesContainer = document.getElementById('piecesContainer');

// LIGNE 21: Sélection du conteneur de reconstruction
// ÉLÉMENT: Conteneur avec les zones de dépôt pour reconstituer l'arc-en-ciel
// UTILITÉ: Zone cible pour le drag & drop
const rainbowContainer = document.getElementById('rainbowContainer');

// LIGNE 24: Sélection de l'élément d'affichage des messages
// ÉLÉMENT: Zone d'affichage des messages de victoire/défaite
// UTILITÉ: Feedback visuel pour l'utilisateur
const message = document.getElementById('message');

// ==================== FONCTION D'INITIALISATION ====================

// LIGNE 28: Déclaration d'une FONCTION nommée initializeGame
// MOT-CLÉ: function - déclare une fonction réutilisable
// PARAMÈTRES: () vide - cette fonction ne prend aucun paramètre
// RÔLE: Fonction principale d'initialisation du jeu, appelée au chargement
function initializeGame() {
    // LIGNE 34: MÉTHODE console.log() avec émoji pour le debug visuel
    // PARAMÈTRE: Chaîne de caractères avec séquence d'échappement \'
    // UTILITÉ: Affichage dans la console du développeur pour tracer l'exécution
    console.log('🎮 Initialisation du jeu d\'arc-en-ciel...');
    
    // LIGNE 38: APPEL DE FONCTION createRainbowPieces()
    // EFFET: Crée et affiche les 6 pièces de l'arc-en-ciel
    // DÉPENDANCE: Nécessite que piecesContainer soit défini
    createRainbowPieces();
    
    // LIGNE 42: APPEL DE FONCTION setupDropZones()
    // EFFET: Configure les événements drag & drop sur les zones de dépôt
    // DÉPENDANCE: Nécessite que les zones existent dans le DOM
    setupDropZones();
    
    // LIGNE 46: AJOUT D'ÉCOUTEUR D'ÉVÉNEMENT
    // OBJET: shuffleButton - le bouton de mélange sélectionné précédemment
    // ÉVÉNEMENT: 'click' - détecte les clics de souris
    // CALLBACK: shufflePieces - fonction à exécuter lors du clic (référence, pas appel)
    shuffleButton.addEventListener('click', shufflePieces);
    
    // LIGNE 50: Message de confirmation d'initialisation
    console.log('Jeu initialisé avec succès !');
}

// ==================== CRÉATION DES PIÈCES D'ARC-EN-CIEL ====================

// LIGNE 54: Déclaration de fonction pour créer les éléments visuels des pièces
function createRainbowPieces() {
    // LIGNE 57: PROPRIÉTÉ innerHTML - modifie le contenu HTML d'un élément
    // VALEUR: '' (chaîne vide) - supprime tout le contenu existant
    // EFFET: Vide complètement le conteneur des pièces
    piecesContainer.innerHTML = '';
    
    // LIGNE 61: MÉTHODE forEach() - BOUCLE sur chaque élément du tableau
    // TABLEAU: correctOrder - le tableau des noms de fichiers images
    // PARAMÈTRES: (imageName, index) - callback avec élément et position
    // TYPE DE BOUCLE: Fonctionnelle (plus moderne que for classique)
    correctOrder.forEach((imageName, index) => {
        // LIGNE 64: CRÉATION D'ÉLÉMENT DOM
        // MÉTHODE: document.createElement() - crée un nouvel élément HTML
        // PARAMÈTRE: 'img' - type d'élément à créer (balise image)
        // RÉSULTAT: Nouvel objet HTMLImageElement
        const piece = document.createElement('img');
        
        // LIGNE 68: ASSIGNATION DE PROPRIÉTÉ src (source de l'image)
        // TEMPLATE LITERAL: `arc.png/${imageName}` - interpolation de variable
        // RÉSULTAT: Chemin comme "arc.png/arc1.png", "arc.png/arc2.png", etc.
        piece.src = `arc.png/${imageName}`;
        
        // LIGNE 71: PROPRIÉTÉ alt - texte alternatif pour l'accessibilité
        // EXPRESSION: `Pièce d'arc-en-ciel ${index + 1}` - interpolation avec calcul
        // RÉSULTAT: "Pièce d'arc-en-ciel 1", "Pièce d'arc-en-ciel 2", etc.
        piece.alt = `Pièce d'arc-en-ciel ${index + 1}`;
        
        // LIGNE 74: PROPRIÉTÉ className - définit la classe CSS
        // VALEUR: 'rainbow-piece' - applique les styles CSS correspondants
        piece.className = 'rainbow-piece';
        
        // LIGNE 77: PROPRIÉTÉ draggable - active le drag & drop
        // VALEUR: true (booléen) - permet de glisser cet élément
        // API: HTML5 Drag and Drop API
        piece.draggable = true;
        
        // LIGNE 81: PROPRIÉTÉ dataset - attributs data-* personnalisés
        // SYNTAXE: dataset.piece équivaut à data-piece="..." en HTML
        // VALEUR: imageName - stocke l'identifiant de la pièce
        // UTILITÉ: Récupération facile de l'identifiant lors du drag & drop
        piece.dataset.piece = imageName;
        
        // LIGNE 85: AJOUT D'ÉCOUTEUR D'ÉVÉNEMENT pour le début de glissement
        // ÉVÉNEMENT: 'dragstart' - déclenché quand l'utilisateur commence à glisser
        // CALLBACK: handleDragStart - fonction gestionnaire à exécuter
        piece.addEventListener('dragstart', handleDragStart);
        // LIGNE 88: AJOUT D'ÉCOUTEUR pour la fin de glissement
        // ÉVÉNEMENT: 'dragend' - déclenché quand le glissement se termine
        // CALLBACK: handleDragEnd - fonction pour nettoyer les états visuels
        piece.addEventListener('dragend', handleDragEnd);
        
        // LIGNE 92: MÉTHODE appendChild() - ajoute un élément enfant
        // PARENT: piecesContainer - le conteneur des pièces
        // ENFANT: piece - l'élément image créé précédemment
        // EFFET: Insère la pièce dans le DOM, la rendant visible
        piecesContainer.appendChild(piece);
    });
    
    // LIGNE 97: Message de confirmation de création
    // CONTENU: Émoji + texte avec séquence d'échappement \' pour l'apostrophe
    console.log(' 6 pièces d\'arc-en-ciel créées');
}

// ==================== CONFIGURATION DES ZONES DE DÉPÔT ====================

// LIGNE 102: Fonction pour configurer les événements drag & drop sur les zones
function setupDropZones() {
    // LIGNE 105: SÉLECTION MULTIPLE d'éléments DOM
    // MÉTHODE: document.querySelectorAll() - sélectionne TOUS les éléments correspondants
    // SÉLECTEUR: '.drop-zone' - sélecteur CSS de classe
    // RÉSULTAT: NodeList (collection d'éléments, similaire à un tableau)
    const dropZones = document.querySelectorAll('.drop-zone');
    
    // LIGNE 110: BOUCLE forEach() sur la collection d'éléments
    // COLLECTION: dropZones - toutes les zones de dépôt trouvées
    // PARAMÈTRE: zone - chaque zone de dépôt individuellement
    dropZones.forEach(zone => {
        // LIGNE 113: ÉVÉNEMENT 'dragover' - survol pendant le glissement
        // NÉCESSITÉ: Obligatoire pour autoriser le drop
        // CALLBACK: handleDragOver - fonction qui autorise le dépôt
        zone.addEventListener('dragover', handleDragOver);
        
        // LIGNE 117: ÉVÉNEMENT 'drop' - relâchement de l'élément glissé
        // DÉCLENCHEUR: Quand l'utilisateur lâche la pièce sur la zone
        // CALLBACK: handleDrop - fonction principale de gestion du dépôt
        zone.addEventListener('drop', handleDrop);
        
        // LIGNE 121: ÉVÉNEMENT 'dragenter' - entrée dans la zone
        // DÉCLENCHEUR: Quand l'élément glissé entre dans la zone
        // CALLBACK: handleDragEnter - ajoute un feedback visuel
        zone.addEventListener('dragenter', handleDragEnter);
        
        // LIGNE 125: ÉVÉNEMENT 'dragleave' - sortie de la zone
        // DÉCLENCHEUR: Quand l'élément glissé quitte la zone
        // CALLBACK: handleDragLeave - retire le feedback visuel
        zone.addEventListener('dragleave', handleDragLeave);
    });
    
    // LIGNE 130: Message de confirmation de configuration
    console.log(' 6 zones de dépôt configurées');
}

// ==================== GESTION DU DÉBUT DE GLISSER ====================

// LIGNE 134: Fonction gestionnaire pour le début du drag & drop
// PARAMÈTRE: event - objet Event contenant les informations sur l'événement
function handleDragStart(event) {
    // LIGNE 138: MÉTHODE setData() de l'API DataTransfer
    // OBJET: event.dataTransfer - interface de transfert de données du drag & drop
    // PARAMÈTRE 1: 'text/plain' - type MIME des données transférées
    // PARAMÈTRE 2: event.target.dataset.piece - identifiant de la pièce glissée
    // EFFET: Stocke l'identifiant pour récupération lors du drop
    event.dataTransfer.setData('text/plain', event.target.dataset.piece);
    
    // LIGNE 143: MODIFICATION de classe CSS pour feedback visuel
    // MÉTHODE: classList.add() - ajoute une classe CSS
    // CLASSE: 'dragging' - applique des styles visuels pendant le glissement
    // EFFET: Change l'apparence de l'élément glissé (souvent transparence)
    event.target.classList.add('dragging');
    
    // LIGNE 147: Message de debug avec l'identifiant de la pièce
    console.log(' Début du glissement:', event.target.dataset.piece);
}

// ==================== GESTION DE LA FIN DE GLISSER ====================

// LIGNE 151: Fonction gestionnaire pour la fin du drag & drop
function handleDragEnd(event) {
    // LIGNE 154: SUPPRESSION de classe CSS
    // MÉTHODE: classList.remove() - retire une classe CSS
    // CLASSE: 'dragging' - supprime les styles visuels de glissement
    // EFFET: Restore l'apparence normale de l'élément
    event.target.classList.remove('dragging');
    
    // LIGNE 158: Message de debug pour tracer la fin du glissement
    console.log(' Fin du glissement');
}

// ==================== AUTORISATION DU SURVOL ====================

// LIGNE 162: Fonction OBLIGATOIRE pour autoriser le drop
function handleDragOver(event) {
    // LIGNE 165: MÉTHODE preventDefault() - annule le comportement par défaut
    // COMPORTEMENT PAR DÉFAUT: Le navigateur refuse le drop par défaut
    // EFFET: Autorise le dépôt d'éléments sur cette zone
    // CONTRAINTE: OBLIGATOIRE pour que l'événement 'drop' se déclenche
    event.preventDefault();
}

// ==================== GESTION DE L'ENTRÉE DANS UNE ZONE ====================

// LIGNE 170: Fonction pour feedback visuel lors de l'entrée dans une zone
function handleDragEnter(event) {
    // LIGNE 173: AJOUT de classe CSS pour feedback visuel
    // MÉTHODE: classList.add() - ajoute une classe CSS
    // CLASSE: 'drag-over' - applique des styles visuels (souvent surbrillance)
    // EFFET: Indique visuellement que la zone peut recevoir la pièce
    event.target.classList.add('drag-over');
}

// ==================== GESTION DE LA SORTIE D'UNE ZONE ====================

// LIGNE 177: Fonction pour retirer le feedback visuel lors de la sortie
function handleDragLeave(event) {
    // LIGNE 180: SUPPRESSION de classe CSS
    // MÉTHODE: classList.remove() - retire une classe CSS
    // CLASSE: 'drag-over' - supprime les styles de surbrillance
    // EFFET: Restore l'apparence normale de la zone
    event.target.classList.remove('drag-over');
}

// ==================== GESTION DU DÉPÔT ====================

// LIGNE 185: Fonction principale de gestion du dépôt (drop)
function handleDrop(event) {
    // LIGNE 188: ANNULATION du comportement par défaut du navigateur
    // COMPORTEMENT PAR DÉFAUT: Peut ouvrir le fichier ou faire autre chose
    // EFFET: Empêche les actions non désirées
    event.preventDefault();
    
    // LIGNE 192: NETTOYAGE du feedback visuel
    // SUPPRESSION: Classe 'drag-over' ajoutée lors du dragenter
    event.target.classList.remove('drag-over');
    
    // LIGNE 196: RÉCUPÉRATION des données transférées
    // MÉTHODE: getData() - récupère les données stockées lors du dragstart
    // PARAMÈTRE: 'text/plain' - même type MIME que celui utilisé dans setData()
    // RÉSULTAT: Identifiant de la pièce glissée (ex: 'arc1.png')
    const pieceData = event.dataTransfer.getData('text/plain');
    
    // LIGNE 200: CONVERSION et RÉCUPÉRATION de la position
    // PROPRIÉTÉ: dataset.position - attribut data-position de la zone HTML
    // FONCTION: parseInt() - convertit une chaîne en nombre entier
    // RÉSULTAT: Position numérique de la zone (0, 1, 2, 3, 4, 5)
    const position = parseInt(event.target.dataset.position);
    
    // LIGNE 204: Message de debug avec template literal
    console.log(` Dépôt de ${pieceData} en position ${position}`);
    
    // LIGNE 207: STRUCTURE CONDITIONNELLE if
    // CONDITION: event.target.classList.contains('drop-zone')
    // MÉTHODE: contains() - vérifie si l'élément a une classe spécifique
    // BUT: S'assurer que le dépôt se fait bien sur une zone valide
    if (event.target.classList.contains('drop-zone')) {
        // LIGNE 210: APPEL DE FONCTION avec paramètres
        // FONCTION: placePieceInZone() - gère le placement effectif
        // PARAMÈTRES: zone (élément DOM), pieceData (identifiant), position (index)
        placePieceInZone(event.target, pieceData, position);
    }
}

// ==================== PLACEMENT D'UNE PIÈCE DANS UNE ZONE ====================

// LIGNE 214: Fonction complexe de placement avec gestion des conflits
// PARAMÈTRES: zone (HTMLElement), pieceData (string), position (number)
function placePieceInZone(zone, pieceData, position) {
    // LIGNE 218: STRUCTURE CONDITIONNELLE pour gérer les remplacements
    // CONDITION: currentOrder[position] !== null
    // OPÉRATEUR: !== (différent strict) - vérifie valeur ET type
    // LOGIQUE: Si la position contient déjà une pièce (pas null)
    if (currentOrder[position] !== null) {
        // LIGNE 221: APPEL DE FONCTION de retour
        // FONCTION: returnPieceToContainer() - remet la pièce existante dans le conteneur
        // PARAMÈTRE: currentOrder[position] - identifiant de la pièce à retourner
        returnPieceToContainer(currentOrder[position]);
    }
    
    // LIGNE 226: MISE À JOUR du tableau d'état du jeu
    // ASSIGNATION: currentOrder[position] = pieceData
    // EFFET: Stocke l'identifiant de la nouvelle pièce à cette position
    currentOrder[position] = pieceData;
    
    // LIGNE 230: CRÉATION d'un nouvel élément image pour la zone
    const newPiece = document.createElement('img');
    
    // LIGNE 233: CONFIGURATION des propriétés de l'image
    newPiece.src = `arc.png/${pieceData}`;
    newPiece.alt = `Pièce ${position + 1}`;
    newPiece.className = 'rainbow-piece';
    newPiece.draggable = true;
    newPiece.dataset.piece = pieceData;
    
    // LIGNE 240: AJOUT d'événements drag & drop à la nouvelle pièce
    // ÉVÉNEMENT: 'dragstart' - permet de re-glisser la pièce placée
    newPiece.addEventListener('dragstart', handleDragStart);
    // ÉVÉNEMENT: 'dragend' - gestion de la fin de glissement
    newPiece.addEventListener('dragend', handleDragEnd);
    
    // LIGNE 246: ÉVÉNEMENT de double-clic avec FONCTION FLÉCHÉE
    // ÉVÉNEMENT: 'dblclick' - détecte un double-clic sur la pièce
    // CALLBACK: () => {...} - fonction anonyme (arrow function)
    // UTILITÉ: Permet de renvoyer rapidement une pièce au conteneur
    newPiece.addEventListener('dblclick', () => {
        // LIGNE 250: Appel de fonction pour retourner la pièce
        returnPieceToContainer(pieceData);
        
        // LIGNE 252: RÉINITIALISATION de l'état du tableau
        // ASSIGNATION: null - indique que cette position est maintenant vide
        currentOrder[position] = null;
        
        // LIGNE 255: RESTAURATION du contenu original de la zone
        // PROPRIÉTÉ: innerHTML - contenu HTML de l'élément
        // TEMPLATE LITERAL: `Zone ${position + 1}` - texte par défaut
        zone.innerHTML = `Zone ${position + 1}`;
        
        // LIGNE 258: RESTAURATION de la classe CSS originale
        zone.className = 'drop-zone';
        
        // LIGNE 261: VÉRIFICATION de la condition de victoire après modification
        checkWinCondition();
    });
    
    // LIGNE 265: REMPLACEMENT du contenu de la zone
    // ÉTAPE 1: Vider le contenu existant
    zone.innerHTML = '';
    // ÉTAPE 2: Ajouter la nouvelle pièce
    zone.appendChild(newPiece);
    // ÉTAPE 3: Modifier les classes CSS
    zone.className = 'drop-zone occupied';
    
    // LIGNE 272: SUPPRESSION de la pièce originale du conteneur source
    // FONCTION: removePieceFromContainer() - évite les doublons
    removePieceFromContainer(pieceData);
    
    // LIGNE 276: VÉRIFICATION automatique de la victoire
    // FONCTION: checkWinCondition() - vérifie si le joueur a gagné
    checkWinCondition();
    
    // LIGNE 279: Message de confirmation
    console.log(' Pièce placée avec succès');
}

// ==================== RETOUR D'UNE PIÈCE AU CONTENEUR ====================
function returnPieceToContainer(pieceData) {
    // Crée une nouvelle image pour le conteneur des pièces
    const piece = document.createElement('img');
    piece.src = `arc.png/${pieceData}`;
    piece.alt = `Pièce d'arc-en-ciel`;
    piece.className = 'rainbow-piece';
    piece.draggable = true;
    piece.dataset.piece = pieceData;
    
    // Ajoute les événements de drag & drop
    piece.addEventListener('dragstart', handleDragStart);
    piece.addEventListener('dragend', handleDragEnd);
    
    // Ajoute la pièce au conteneur
    piecesContainer.appendChild(piece);
    
    console.log(' Pièce retournée au conteneur:', pieceData);
}

// ==================== SUPPRESSION D'UNE PIÈCE DU CONTENEUR ====================
function removePieceFromContainer(pieceData) {
    // Trouve et supprime la pièce du conteneur des pièces
    const pieces = piecesContainer.querySelectorAll('.rainbow-piece');
    pieces.forEach(piece => {
        if (piece.dataset.piece === pieceData) {
            piece.remove();
        }
    });
}

// ==================== FONCTION DE MÉLANGE AVEC ALGORITHME ====================

// LIGNE 301: Fonction de mélange utilisant l'algorithme Fisher-Yates
function shufflePieces() {
    console.log(' Mélange des pièces...');
    
    // LIGNE 305: APPEL de fonction de réinitialisation
    resetGame();
    
    // LIGNE 308: CRÉATION d'une COPIE du tableau avec OPÉRATEUR SPREAD
    // SYNTAXE: [...correctOrder] - décompose le tableau et crée une nouvelle instance
    // AVANTAGE: Évite de modifier le tableau original correctOrder
    // RÉSULTAT: Nouveau tableau identique mais indépendant
    const shuffledOrder = [...correctOrder];
    
    // LIGNE 313: ALGORITHME DE MÉLANGE FISHER-YATES (Knuth shuffle)
    // BOUCLE FOR: for (initialisation; condition; incrément)
    // VARIABLE: let i - compteur mutable qui diminue
    // CONDITION: i > 0 - continue tant qu'il reste des éléments à mélanger
    // DÉCRÉMENT: i-- - réduit le compteur à chaque itération
    for (let i = shuffledOrder.length - 1; i > 0; i--) {
        // LIGNE 316: GÉNÉRATION d'un NOMBRE ALÉATOIRE
        // Math.random(): génère un nombre entre 0 (inclus) et 1 (exclus)
        // (i + 1): multiplie par la taille de la section non mélangée
        // Math.floor(): arrondit vers le bas pour obtenir un entier
        // RÉSULTAT: Index aléatoire entre 0 et i (inclus)
        const j = Math.floor(Math.random() * (i + 1));
        
        // LIGNE 319: ÉCHANGE (SWAP) utilisant la DÉSTRUCTURATION
        // SYNTAXE: [a, b] = [b, a] - échange simultané de deux variables
        // EFFET: Échange les éléments aux positions i et j
        // AVANTAGE: Plus lisible qu'une variable temporaire
        [shuffledOrder[i], shuffledOrder[j]] = [shuffledOrder[j], shuffledOrder[i]];
    }
    
    // LIGNE 323: VIDAGE du conteneur avant reconstruction
    piecesContainer.innerHTML = '';
    
    // LIGNE 326: BOUCLE forEach() sur le tableau mélangé
    shuffledOrder.forEach((imageName, index) => {
        // LIGNE 328-336: CRÉATION d'éléments identique à createRainbowPieces()
        const piece = document.createElement('img');
        piece.src = `arc.png/${imageName}`;
        piece.alt = `Pièce d'arc-en-ciel ${index + 1}`;
        piece.className = 'rainbow-piece';
        piece.draggable = true;
        piece.dataset.piece = imageName;
        
        // LIGNE 337-339: AJOUT des événements drag & drop
        piece.addEventListener('dragstart', handleDragStart);
        piece.addEventListener('dragend', handleDragEnd);
        
        // LIGNE 341: INSERTION dans le DOM
        piecesContainer.appendChild(piece);
    });
    
    // LIGNE 345: Masquage du message de victoire/défaite
    hideMessage();
    
    // LIGNE 348: EFFET VISUEL sur le bouton (animation de clic)
    // PROPRIÉTÉ: transform - applique une transformation CSS
    // VALEUR: 'scale(0.95)' - réduit la taille à 95% (effet d'enfoncement)
    shuffleButton.style.transform = 'scale(0.95)';
    
    // LIGNE 351: FONCTION ASYNCHRONE setTimeout() pour restaurer l'apparence
    // DÉLAI: 150ms - durée de l'effet visuel
    setTimeout(() => {
        // LIGNE 353: RESTAURATION de la taille normale
        shuffleButton.style.transform = '';
    }, 150);
    
    console.log(' Pièces mélangées avec succès');
}

// ==================== REMISE À ZÉRO DU JEU ====================
function resetGame() {
    // Remet à zéro l'ordre actuel
    currentOrder.fill(null);
    
    // Remet les zones de dépôt à leur état initial
    const dropZones = document.querySelectorAll('.drop-zone');
    dropZones.forEach((zone, index) => {
        zone.innerHTML = `Zone ${index + 1}`;
        zone.className = 'drop-zone';
    });
    
    console.log(' Jeu remis à zéro');
}

// ==================== VÉRIFICATION DE LA CONDITION DE VICTOIRE ====================

// LIGNE 369: Fonction complexe de vérification avec LOGIQUE CONDITIONNELLE IMBRIQUÉE
function checkWinCondition() {
    // LIGNE 372: MÉTHODE every() - TESTE si TOUS les éléments satisfont une condition
    // SYNTAXE: array.every(callback) - retourne true si tous les tests passent
    // CALLBACK: piece => piece !== null - fonction fléchée de test
    // CONDITION: Vérifie que chaque position contient une pièce (pas null)
    // RÉSULTAT: Boolean - true si toutes les positions sont remplies
    const allFilled = currentOrder.every(piece => piece !== null);
    
    // LIGNE 378: STRUCTURE CONDITIONNELLE IF-ELSE IMBRIQUÉE
    // CONDITION PRINCIPALE: allFilled - toutes les positions sont remplies
    if (allFilled) {
        // LIGNE 381: DEUXIÈME VÉRIFICATION avec every() et comparaison d'index
        // MÉTHODE: every((element, index) => ...) - teste avec index
        // CONDITION: piece === correctOrder[index] - compare chaque position
        // LOGIQUE: Vérifie que chaque pièce est à sa position correcte
        const isCorrect = currentOrder.every((piece, index) => piece === correctOrder[index]);
        
        // LIGNE 385: CONDITION IMBRIQUÉE de type IF-ELSE
        if (isCorrect) {
            // LIGNE 387: CAS DE VICTOIRE - ordre correct
            showWinMessage();
        } else {
            // LIGNE 389: CAS DE DÉFAITE - toutes placées mais ordre incorrect
            showLoseMessage();
        }
    } else {
        // LIGNE 392: CAS INTERMÉDIAIRE - pas toutes les pièces placées
        // FONCTION: hideMessage() - cache les messages précédents
        hideMessage();
    }
}

// ==================== AFFICHAGE DU MESSAGE DE VICTOIRE ====================
function showWinMessage() {
    message.textContent = 'Vous avez gagné';
    message.className = 'message win';
    message.classList.remove('hidden');
    
    // Effet de célébration
    rainbowContainer.classList.add('celebration');
    setTimeout(() => {
        rainbowContainer.classList.remove('celebration');
    }, 600);
    
    console.log(' VICTOIRE ! Arc-en-ciel correctement reconstitué');
}

// ==================== AFFICHAGE DU MESSAGE DE DÉFAITE ====================
function showLoseMessage() {
    message.textContent = 'Vous avez perdu';
    message.className = 'message lose';
    message.classList.remove('hidden');
    
    console.log(' Défaite - Arc-en-ciel mal reconstitué');
}

// ==================== MASQUAGE DU MESSAGE ====================
function hideMessage() {
    message.classList.add('hidden');
}

// ==================== FONCTIONS DE DEBUG ====================
function debugCurrentOrder() {
    console.log(' Ordre actuel:', currentOrder);
    console.log(' Ordre correct:', correctOrder);
}

function forceWin() {
    console.log(' CHEAT: Placement automatique des pièces...');
    resetGame();
    
    correctOrder.forEach((piece, index) => {
        const zone = document.querySelector(`[data-position="${index}"]`);
        placePieceInZone(zone, piece, index);
    });
}

// ==================== FONCTION D'AIDE ====================
function showHint() {
    console.log(' AIDE: L\'ordre correct est Rouge → Orange → Jaune → Vert → Bleu → Violet');
    console.log(' Fichiers: arc1.png → arc2.png → arc3.png → arc4.png → arc5.png → arc6.png');
}

// ==================== INITIALISATION AU CHARGEMENT DE LA PAGE ====================

// LIGNE 434: ÉCOUTEUR D'ÉVÉNEMENT GLOBAL sur le document
// ÉVÉNEMENT: 'DOMContentLoaded' - déclenché quand le DOM est complètement chargé
// IMPORTANCE: S'assure que tous les éléments HTML existent avant l'exécution JavaScript
// CALLBACK: function() - fonction anonyme d'initialisation
document.addEventListener('DOMContentLoaded', function() {
    // LIGNE 439: Message de debug pour tracer le chargement
    console.log(' Page chargée - Initialisation du jeu...');
    
    // LIGNE 441: APPEL de la fonction principale d'initialisation
    initializeGame();
    
    // LIGNE 444: EXPOSITION de fonctions de debug dans l'objet global window
    // UTILITÉ: Permet d'appeler ces fonctions depuis la console du navigateur
    // SYNTAXE: window.nomFonction = référenceFonction
    window.debugCurrentOrder = debugCurrentOrder;
    window.forceWin = forceWin;
    window.showHint = showHint;
    
    // LIGNE 449: Messages d'information pour l'utilisateur développeur
    console.log(' Jeu d\'arc-en-ciel prêt !');
    console.log(' Tapez showHint() dans la console pour de l\'aide');
    console.log(' Tapez forceWin() dans la console pour placer automatiquement les pièces');
});

// ==================== GESTION GLOBALE DES ERREURS ====================

// LIGNE 456: GESTIONNAIRE D'ERREUR GLOBAL pour le débogage
// ÉVÉNEMENT: 'error' - capture toutes les erreurs JavaScript non gérées
// PORTÉE: window - niveau global de la fenêtre
// UTILITÉ: Debug et monitoring des erreurs en production
window.addEventListener('error', function(event) {
    // LIGNE 461: AFFICHAGE d'erreur avec console.error()
    // MÉTHODE: console.error() - affichage en rouge dans la console
    // PROPRIÉTÉ: event.error - objet d'erreur contenant les détails
    console.error(' Erreur dans le jeu:', event.error);
});

// ==================== ACCESSIBILITÉ CLAVIER (BONUS) ====================

// LIGNE 467: GESTIONNAIRE D'ÉVÉNEMENT clavier global
// ÉVÉNEMENT: 'keydown' - détecte les touches pressées
// PORTÉE: document - tout le document
document.addEventListener('keydown', function(event) {
    // LIGNE 471: CONDITION MULTIPLE avec OPÉRATEUR LOGIQUE ||
    // PROPRIÉTÉ: event.key - caractère de la touche pressée
    // CONDITIONS: 'r' (minuscule) OU 'R' (majuscule)
    // BUT: Insensible à la casse pour l'utilisabilité
    if (event.key === 'r' || event.key === 'R') {
        // LIGNE 474: APPEL de fonction de mélange via raccourci clavier
        shufflePieces();
    }
    
    // LIGNE 478: DEUXIÈME CONDITION pour la touche d'aide
    if (event.key === 'h' || event.key === 'H') {
        // LIGNE 480: APPEL de fonction d'aide via raccourci clavier
        showHint();
    }
});

// LIGNE 484: Messages finaux d'information
console.log(' Script d\'arc-en-ciel chargé avec succès !');
console.log(' Raccourcis: R = Mélanger, H = Aide');