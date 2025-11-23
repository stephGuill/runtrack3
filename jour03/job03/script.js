// ==================== VARIABLES GLOBALES ====================

// LIGNE 3: Déclaration d'une CONSTANTE pour la taille de la grille
// TYPE: Number - entier représentant les dimensions
// VALEUR: 3 - crée une grille 3x3 (taquin classique)
// CONTRAINTE: const = immutable, cette valeur ne peut pas changer
// UTILITÉ: Facilite l'adaptation pour des grilles 4x4, 5x5, etc.
const GRID_SIZE = 3; // Grille 3x3

// LIGNE 7: CALCUL AUTOMATIQUE du nombre total de cases
// OPÉRATION: GRID_SIZE * GRID_SIZE (3 * 3 = 9)
// AVANTAGE: Évite les "magic numbers" et maintient la cohérence
// RÉSULTAT: 9 cases au total dans la grille
const TOTAL_PIECES = GRID_SIZE * GRID_SIZE; // 9 cases au total

// LIGNE 10: CONSTANTE représentant la case vide
// LOGIQUE: Dans un taquin 3x3, les pièces vont de 1 à 8, la 9ème case est vide
// REPRÉSENTATION: Le nombre 9 symbolise l'absence de pièce
// UTILITÉ: Facilite les comparaisons et évite les erreurs de logique
const EMPTY_PIECE = 9; // La 9ème case est vide (représentée par 9)

// ==================== VARIABLES D'ÉTAT DU JEU ====================

// LIGNE 14: TABLEAU DYNAMIQUE représentant l'état actuel du puzzle
// TYPE: Array<number> - tableau de nombres de 1 à 9
// STRUCTURE: [position0, position1, ..., position8] où chaque valeur = numéro de pièce
// EXEMPLE: [1,2,3,4,5,6,7,8,9] = état résolu, [1,2,3,4,5,6,8,9,7] = pièce 7 et 8 échangées
// MUTABILITÉ: let = peut être modifié pendant le jeu
let currentState = []; // État actuel des pièces [1,2,3,4,5,6,7,8,9] où 9 = case vide

// LIGNE 17: VARIABLE pour traquer la position de la case vide
// TYPE: Number - index de 0 à 8 dans le tableau currentState
// LOGIQUE: Si emptyPosition = 5, alors currentState[5] === 9
// UTILITÉ: Évite de rechercher la case vide à chaque mouvement (optimisation)
let emptyPosition = 8; // Position de la case vide (index 8 = dernière case)

// LIGNE 20: COMPTEUR de mouvements pour les statistiques
// TYPE: Number - entier positif
// INCRÉMENT: +1 à chaque mouvement valide de pièce
// UTILITÉ: Score et feedback pour l'utilisateur
let moveCount = 0; // Compteur de mouvements

// LIGNE 23: BOOLÉEN d'état de victoire
// TYPE: Boolean - true/false
// LOGIQUE: false = jeu en cours, true = jeu terminé et gagné
// UTILITÉ: Empêche les mouvements après victoire
let gameWon = false; // État de victoire

// LIGNE 26: TIMESTAMP de début de partie
// TYPE: Date|null - objet Date ou null si pas commencé
// UTILISATION: Calcul de la durée de partie
let gameStartTime = null; // Temps de début

// LIGNE 29: RÉFÉRENCE au timer d'affichage
// TYPE: setInterval ID - identifiant pour clearInterval()
// UTILITÉ: Mise à jour automatique de l'affichage du temps
let gameTimer = null; // Timer du jeu

// ==================== SÉLECTIONS D'ÉLÉMENTS DOM ====================

// LIGNE 33: Sélection de l'élément conteneur de la grille de jeu
// MÉTHODE: document.getElementById() - accès DOM par ID unique
// ÉLÉMENT: Conteneur où seront insérées les 9 cases du taquin
const puzzleGrid = document.getElementById('puzzleGrid');

// LIGNE 36: Sélection de l'affichage du compteur de mouvements
// UTILITÉ: Mise à jour dynamique du nombre de coups joués
const movesCount = document.getElementById('movesCount');

// LIGNE 39: Sélection de l'affichage du chronomètre
// UTILITÉ: Affichage du temps écoulé depuis le début de la partie
const timeCount = document.getElementById('timeCount');

// LIGNE 42: Sélection de la zone d'affichage des messages
// UTILITÉ: Messages de victoire, défaite, informations
const message = document.getElementById('message');

// LIGNE 45: Sélection du bouton "Nouvelle Partie"
const newGameBtn = document.getElementById('newGameBtn');

// LIGNE 48: Sélection du bouton "Mélanger"
const shuffleBtn = document.getElementById('shuffleBtn');

// LIGNE 51: Sélection du bouton "Résoudre" (aide automatique)
const solveBtn = document.getElementById('solveBtn');

// LIGNE 54: Sélection du sélecteur de difficulté
// UTILITÉ: Permet de choisir le nombre de mélanges (facile/moyen/difficile)
const difficultySelect = document.getElementById('difficulty');

// LIGNE 57: Sélection de l'affichage du meilleur score
// UTILITÉ: Statistiques persistantes (localStorage)
const bestScore = document.getElementById('bestScore');

// LIGNE 60: Sélection de l'affichage du nombre de parties jouées
const gamesPlayed = document.getElementById('gamesPlayed');

// ==================== ÉTAT DE RÉFÉRENCE (OBJECTIF) ====================

// LIGNE 64: TABLEAU CONSTANT représentant la solution du puzzle
// STRUCTURE: [1,2,3,4,5,6,7,8,9] - ordre correct des pièces
// UTILITÉ: Comparaison avec currentState pour détecter la victoire
// LOGIQUE: Pièces 1-8 dans l'ordre + case vide (9) en dernière position
const SOLVED_STATE = [1, 2, 3, 4, 5, 6, 7, 8, 9];

// ==================== FONCTION D'INITIALISATION PRINCIPALE ====================

// LIGNE 69: Déclaration de la fonction principale d'initialisation
// RÔLE: Point d'entrée principal qui configure tout le jeu
// PARAMÈTRES: Aucun - fonction autonome
function initializeGame() {
    // LIGNE 73: Message de debug pour tracer l'exécution
    console.log(' Initialisation du jeu du taquin...');
    
    // LIGNE 76: COPIE du tableau de référence avec OPÉRATEUR SPREAD
    // SYNTAXE: [...SOLVED_STATE] - crée une nouvelle instance du tableau
    // AVANTAGE: Évite de modifier directement SOLVED_STATE (protection)
    // RÉSULTAT: currentState = [1,2,3,4,5,6,7,8,9] (état résolu initial)
    currentState = [...SOLVED_STATE];
    
    // LIGNE 79: INITIALISATION de la position de la case vide
    // VALEUR: 8 - correspond à l'index de la dernière case (position 9)
    // LOGIQUE: Dans SOLVED_STATE[8] = 9 (case vide)
    emptyPosition = 8; // Case 9 vide (index 8)
    
    // LIGNE 82: APPEL de fonction de remise à zéro des compteurs
    resetCounters();
    
    // LIGNE 85: APPEL de fonction de création de l'interface visuelle
    createPuzzleGrid();
    
    // LIGNE 88: APPEL de fonction d'ajout des gestionnaires d'événements
    addEventListeners();
    
    // LIGNE 91: APPEL de fonction de chargement des statistiques sauvegardées
    loadStats();
    
    console.log(' Jeu initialisé avec succès');
}

// ==================== CRÉATION DE LA GRILLE VISUELLE ====================

// LIGNE 97: Fonction pour générer l'interface utilisateur du puzzle
function createPuzzleGrid() {
    // LIGNE 100: VIDAGE du contenu HTML existant
    // PROPRIÉTÉ: innerHTML - contenu HTML interne de l'élément
    // VALEUR: '' (chaîne vide) - supprime tous les éléments enfants
    // EFFET: Repart d'une grille vierge à chaque reconstruction
    puzzleGrid.innerHTML = '';
    
    // LIGNE 104: BOUCLE FOR classique pour créer les 9 cases
    // INITIALISATION: let i = 0 - compteur commençant à 0
    // CONDITION: i < TOTAL_PIECES - continue tant qu'on n'a pas fait les 9 cases
    // INCRÉMENT: i++ - augmente le compteur après chaque itération
    for (let i = 0; i < TOTAL_PIECES; i++) {
        // LIGNE 107: CRÉATION d'un élément DOM div
        // MÉTHODE: document.createElement() - fabrique un nouvel élément HTML
        // TYPE: 'div' - élément de type division (conteneur)
        const piece = document.createElement('div');
        
        // LIGNE 110: ASSIGNATION d'attribut data-position
        // PROPRIÉTÉ: dataset.position - équivaut à data-position="..." en HTML
        // VALEUR: i - position dans la grille (0, 1, 2, ..., 8)
        // UTILITÉ: Permet de retrouver la position lors des clics
        piece.dataset.position = i; // Position dans la grille (0-8)
        
        // LIGNE 114: STRUCTURE CONDITIONNELLE IF-ELSE
        // CONDITION: currentState[i] === EMPTY_PIECE
        // LOGIQUE: Si la valeur à la position i est 9 (case vide)
        if (currentState[i] === EMPTY_PIECE) {
            // LIGNE 117: BRANCHE IF - configuration de la case vide
            // CLASSE CSS: 'empty-space' - apparence différente (souvent invisible)
            piece.className = 'empty-space';
            
            // LIGNE 119: ATTRIBUT data-piece pour identifier le type
            piece.dataset.piece = EMPTY_PIECE;
        } else {
            // LIGNE 121: BRANCHE ELSE - configuration des pièces normales (1-8)
            // CLASSE CSS: 'puzzle-piece' - style des pièces avec image
            piece.className = 'puzzle-piece';
            
            // LIGNE 124: STOCKAGE de l'identifiant de la pièce
            piece.dataset.piece = currentState[i];
            
            // LIGNE 127: RÉCUPÉRATION du numéro de pièce pour l'image
            // VARIABLE: pieceNumber - numéro de 1 à 8 correspondant au fichier image
            const pieceNumber = currentState[i];
            
            // LIGNE 130: APPLICATION d'image de fond avec CSS
            // PROPRIÉTÉ: style.backgroundImage - définit l'image de fond via JavaScript
            // TEMPLATE LITERAL: `url('img/${pieceNumber}.PNG')` - chemin dynamique
            // RÉSULTAT: url('img/1.PNG'), url('img/2.PNG'), etc.
            piece.style.backgroundImage = `url('img/${pieceNumber}.PNG')`;
            
            // LIGNE 133: CONFIGURATION du dimensionnement de l'image
            // PROPRIÉTÉ: backgroundSize - comment l'image remplit l'espace
            // VALEUR: 'cover' - image couvre tout l'espace en gardant proportions
            piece.style.backgroundSize = 'cover';
            
            // LIGNE 136: CONFIGURATION du positionnement de l'image
            // PROPRIÉTÉ: backgroundPosition - position de l'image dans l'élément
            // VALEUR: 'center' - centre l'image horizontalement et verticalement
            piece.style.backgroundPosition = 'center';
            
            // LIGNE 140: AJOUT d'ÉCOUTEUR D'ÉVÉNEMENT avec FONCTION FLÉCHÉE
            // ÉVÉNEMENT: 'click' - détecte les clics de souris
            // CALLBACK: () => handlePieceClick(i) - fonction anonyme qui appelle handlePieceClick
            // CLOSURE: La variable i est "capturée" dans la fonction fléchée
            piece.addEventListener('click', () => handlePieceClick(i));
        }
        
        // LIGNE 144: INSERTION de l'élément dans le DOM
        // MÉTHODE: appendChild() - ajoute l'élément comme enfant
        // PARENT: puzzleGrid - le conteneur principal de la grille
        // ENFANT: piece - la case créée (vide ou avec image)
        puzzleGrid.appendChild(piece);
    }
    
    // LIGNE 148: APPEL de fonction pour mettre à jour l'interactivité
    updateClickablePieces();
}

// ==================== GESTION DU CLIC SUR UNE PIÈCE ====================

// LIGNE 152: Fonction gestionnaire des clics utilisateur sur les pièces
// PARAMÈTRE: position (number) - index de la case cliquée (0-8)
function handlePieceClick(position) {
    // LIGNE 156: GARDE - vérification de l'état de jeu
    // CONDITION: gameWon - booléen indiquant si le jeu est terminé
    // STRUCTURE: Early return pattern - sortie anticipée si condition non respectée
    if (gameWon) {
        console.log(' Jeu terminé - clic ignoré');
        // LIGNE 159: INSTRUCTION return - arrête l'exécution de la fonction
        // EFFET: Empêche tout mouvement après la victoire
        return;
    }
    
    // LIGNE 163: VÉRIFICATION de la validité du mouvement
    // FONCTION: canMovePiece(position) - retourne true/false
    // OPÉRATEUR: ! (NOT logique) - inverse le résultat booléen
    // LOGIQUE: Si la pièce NE PEUT PAS bouger, alors sortir
    if (!canMovePiece(position)) {
        console.log(' Pièce non déplaçable');
        return;
    }
    
    // LIGNE 168: DÉMARRAGE CONDITIONNEL du chronomètre
    // CONDITION: moveCount === 0 - vérifie si c'est le premier mouvement
    // LOGIQUE: Le timer ne démarre qu'au premier coup joué
    if (moveCount === 0) {
        // LIGNE 171: APPEL de fonction pour activer le chronométrage
        startTimer();
    }
    
    // LIGNE 175: EXÉCUTION du mouvement de pièce
    // FONCTION: movePiece(position) - effectue l'échange pièce/case vide
    movePiece(position);
    
    // LIGNE 178: INCRÉMENTATION du compteur de mouvements
    // OPÉRATEUR: ++ (pré-incrémentation) - augmente la valeur de 1
    moveCount++;
    
    // LIGNE 181: MISE À JOUR de l'affichage du compteur
    updateMoveCounter();
    
    // LIGNE 184: VÉRIFICATION automatique de la condition de victoire
    checkWinCondition();
    
    // LIGNE 187: MESSAGE de debug avec TEMPLATE LITERAL
    // INTERPOLATION: ${moveCount} et ${currentState[position]} - injection de variables
    // EFFET: Affiche "Mouvement 5 - Pièce 3 déplacée" par exemple
    console.log(` Mouvement ${moveCount} - Pièce ${currentState[position]} déplacée`);
}

// ==================== VÉRIFICATION DE MOUVEMENT POSSIBLE ====================

// LIGNE 191: Fonction de validation géométrique des mouvements
// PARAMÈTRE: position (number) - index de la pièce à tester (0-8)
// RETOUR: Boolean - true si la pièce peut bouger, false sinon
function canMovePiece(position) {
    // LIGNE 196: CALCUL de la ligne (rangée) de la pièce
    // MÉTHODE: Math.floor() - arrondit vers le bas (division entière)
    // FORMULE: position ÷ GRID_SIZE - convertit index linéaire en coordonnée 2D
    // EXEMPLE: position 5 → Math.floor(5/3) = 1 (deuxième ligne)
    const row = Math.floor(position / GRID_SIZE);
    
    // LIGNE 200: CALCUL de la colonne de la pièce
    // OPÉRATEUR: % (modulo) - reste de la division entière
    // FORMULE: position % GRID_SIZE - colonne dans la grille
    // EXEMPLE: position 5 → 5 % 3 = 2 (troisième colonne)
    const col = position % GRID_SIZE;
    
    // LIGNE 204: CALCUL de la ligne de la case vide (même logique)
    const emptyRow = Math.floor(emptyPosition / GRID_SIZE);
    
    // LIGNE 206: CALCUL de la colonne de la case vide
    const emptyCol = emptyPosition % GRID_SIZE;
    
    // LIGNE 209: CALCUL COMPLEXE d'adjacence avec CONDITIONS COMPOSÉES
    // STRUCTURE: Expression booléenne avec OPÉRATEURS LOGIQUES
    // PARTIE 1: (Math.abs(row - emptyRow) === 1 && col === emptyCol)
    //   - Math.abs() : valeur absolue de la différence
    //   - === 1 : exactement une ligne d'écart
    //   - && col === emptyCol : ET même colonne
    //   - RÉSULTAT: vrai si verticalement adjacent
    // PARTIE 2: (Math.abs(col - emptyCol) === 1 && row === emptyRow)
    //   - === 1 : exactement une colonne d'écart
    //   - && row === emptyRow : ET même ligne
    //   - RÉSULTAT: vrai si horizontalement adjacent
    // OPÉRATEUR ||: OU logique - vrai si AU MOINS une condition est vraie
    const isAdjacent = (
        (Math.abs(row - emptyRow) === 1 && col === emptyCol) || // Même colonne, rangée adjacente
        (Math.abs(col - emptyCol) === 1 && row === emptyRow)    // Même rangée, colonne adjacente
    );
    
    // LIGNE 217: RETOUR du résultat booléen
    return isAdjacent;
}

// ==================== DÉPLACEMENT EFFECTIF D'UNE PIÈCE ====================

// LIGNE 221: Fonction pour échanger une pièce avec la case vide
// PARAMÈTRE: position (number) - index de la pièce à déplacer
function movePiece(position) {
    // LIGNE 225: ALGORITHME D'ÉCHANGE avec VARIABLE TEMPORAIRE
    // ÉTAPE 1: Sauvegarde de la valeur à échanger dans une variable temporaire
    // VARIABLE: temp - stockage temporaire pour éviter la perte de données
    const temp = currentState[position];
    
    // LIGNE 228: ÉTAPE 2 - Copie de la case vide vers la position de la pièce
    // EFFET: currentState[position] devient 9 (case vide)
    currentState[position] = currentState[emptyPosition];
    
    // LIGNE 230: ÉTAPE 3 - Copie de la pièce vers l'ancienne case vide
    // EFFET: currentState[emptyPosition] devient la valeur de la pièce (1-8)
    currentState[emptyPosition] = temp;
    
    // LIGNE 233: MISE À JOUR de la variable de tracking de la case vide
    // NOUVELLE POSITION: La case vide est maintenant à l'ancienne position de la pièce
    emptyPosition = position;
    
    // LIGNE 236: SÉLECTION DOM pour l'animation visuelle
    // SÉLECTEUR: `[data-position="${position}"]` - sélecteur d'attribut CSS
    // MÉTHODE: querySelector() - trouve le premier élément correspondant
    // RÉSULTAT: Élément HTML de la pièce qui vient de bouger
    const movingPiece = document.querySelector(`[data-position="${position}"]`);
    
    // LIGNE 240: AJOUT de classe CSS pour animation
    // MÉTHODE: classList.add() - ajoute une classe CSS
    // CLASSE: 'moving' - déclenche probablement une animation CSS
    // EFFET: Feedback visuel du mouvement pour l'utilisateur
    movingPiece.classList.add('moving');
    
    // LIGNE 244: FONCTION ASYNCHRONE pour reconstruire la grille après animation
    // MÉTHODE: setTimeout() - exécute une fonction après un délai
    // DÉLAI: 200ms - laisse le temps à l'animation CSS de s'exécuter
    // CALLBACK: () => createPuzzleGrid() - fonction fléchée qui reconstruit la grille
    // UTILITÉ: Synchronise l'animation visuelle avec la mise à jour du DOM
    setTimeout(() => {
        createPuzzleGrid();
    }, 200);
}

// ==================== MISE À JOUR DES PIÈCES CLIQUABLES ====================

// LIGNE 252: Fonction pour gérer l'interactivité visuelle des pièces
// UTILITÉ: Indique visuellement quelles pièces peuvent être déplacées
function updateClickablePieces() {
    // LIGNE 256: SUPPRESSION des classes CSS existantes
    // SÉLECTEUR: '.puzzle-piece' - toutes les pièces normales (pas la case vide)
    // MÉTHODE: querySelectorAll() - sélection multiple d'éléments
    // BOUCLE: forEach() - itération sur chaque pièce trouvée
    document.querySelectorAll('.puzzle-piece').forEach(piece => {
        // LIGNE 259: SUPPRESSION de la classe d'interactivité
        // MÉTHODE: classList.remove() - retire une classe CSS
        // CLASSE: 'clickable' - style visuel des pièces déplaçables (ex: surbrillance)
        piece.classList.remove('clickable');
    });
    
    // LIGNE 263: BOUCLE FOR pour tester chaque position de la grille
    // ITÉRATION: de 0 à 8 (toutes les cases de la grille)
    for (let i = 0; i < TOTAL_PIECES; i++) {
        // LIGNE 266: CONDITION COMPOSÉE avec OPÉRATEUR LOGIQUE &&
        // PARTIE 1: currentState[i] !== EMPTY_PIECE - vérifie que ce n'est pas la case vide
        // PARTIE 2: canMovePiece(i) - vérifie que la pièce peut bouger
        // LOGIQUE: Si c'est une vraie pièce ET qu'elle peut bouger
        if (currentState[i] !== EMPTY_PIECE && canMovePiece(i)) {
            // LIGNE 269: SÉLECTION de l'élément DOM correspondant
            // SÉLECTEUR: `[data-position="${i}"]` - attribut data-position spécifique
            const piece = document.querySelector(`[data-position="${i}"]`);
            
            // LIGNE 272: VÉRIFICATION d'existence (defensive programming)
            // CONDITION: if (piece) - vérifie que l'élément existe avant manipulation
            if (piece) {
                // LIGNE 275: AJOUT de la classe d'interactivité
                // EFFET: Applique les styles CSS pour indiquer que c'est cliquable
                piece.classList.add('clickable');
            }
        }
    }
}

// ==================== VÉRIFICATION DE LA CONDITION DE VICTOIRE ====================

// LIGNE 281: Fonction critique de détection de victoire
// RÔLE: Compare l'état actuel avec l'état cible pour détecter la réussite
function checkWinCondition() {
    // LIGNE 285: COMPARAISON COMPLÈTE des tableaux avec MÉTHODE every()
    // MÉTHODE: array.every() - teste si TOUS les éléments satisfont une condition
    // CALLBACK: (piece, index) => piece === SOLVED_STATE[index]
    //   - piece: valeur à la position courante dans currentState
    //   - index: position dans le tableau (0 à 8)
    //   - piece === SOLVED_STATE[index]: compare pièce par pièce
    // RÉSULTAT: true si toutes les pièces sont à leur place correcte
    const isWon = currentState.every((piece, index) => piece === SOLVED_STATE[index]);
    
    // LIGNE 293: CONDITION COMPOSÉE pour éviter les victoires multiples
    // PARTIE 1: isWon - le puzzle est résolu
    // PARTIE 2: !gameWon - le jeu n'était pas encore gagné (évite double exécution)
    // OPÉRATEUR: && (ET logique) - les deux conditions doivent être vraies
    if (isWon && !gameWon) {
        // LIGNE 297: MARQUAGE de l'état de victoire
        // EFFET: Empêche les mouvements futurs et évite les double-déclenchements
        gameWon = true;
        
        // LIGNE 300: ARRÊT du chronomètre
        stopTimer();
        
        // LIGNE 303: AFFICHAGE du message de victoire
        showWinMessage();
        
        // LIGNE 306: SAUVEGARDE des statistiques dans localStorage
        saveStats();
        
        // LIGNE 309: Message de debug pour confirmer la victoire
        console.log(' VICTOIRE ! Puzzle résolu !');
    }
}

// ==================== AFFICHAGE DU MESSAGE DE VICTOIRE ====================
function showWinMessage() {
    const finalTime = formatTime(Math.floor((Date.now() - gameStartTime) / 1000));
    
    message.textContent = `Vous avez gagné`;
    message.className = 'message win';
    message.classList.remove('hidden');
    
    // Affiche le bouton "Recommencer" de façon plus visible
    newGameBtn.textContent = ' Recommencer';
    newGameBtn.style.background = 'linear-gradient(45deg, #28a745, #1e7e34)';
    newGameBtn.style.fontSize = '18px';
    newGameBtn.style.animation = 'pulse 2s infinite';
    
    // Ajoute l'animation pulse si elle n'existe pas
    if (!document.getElementById('pulse-animation')) {
        const style = document.createElement('style');
        style.id = 'pulse-animation';
        style.textContent = `
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.05); }
                100% { transform: scale(1); }
            }
        `;
        document.head.appendChild(style);
    }
    
    // Bloque toutes les pièces
    document.querySelectorAll('.puzzle-piece').forEach(piece => {
        piece.style.pointerEvents = 'none';
        piece.classList.remove('clickable');
    });
    
    console.log(' VICTOIRE ! Le logo de La Plateforme_ est reconstitué !');
}

// ==================== MÉLANGE INTELLIGENT DU PUZZLE ====================

// LIGNE 474: Fonction de mélange garantissant la résolubilité
// ALGORITHME: Utilise des mouvements valides au lieu d'un mélange aléatoire
// AVANTAGE: Évite les configurations impossibles à résoudre
function shufflePuzzle() {
    console.log(' Mélange du puzzle...');
    
    // LIGNE 480: RÉCUPÉRATION de la difficulté sélectionnée
    // PROPRIÉTÉ: value - valeur de l'élément select HTML
    // RÉSULTAT: String parmi 'easy', 'medium', 'hard', 'expert'
    const difficulty = difficultySelect.value;
    
    // LIGNE 484: VARIABLE pour le nombre de mouvements de mélange
    // VALEUR PAR DÉFAUT: 25 - niveau moyen
    let shuffleMoves = 25; // Défaut moyen
    
    // LIGNE 487: STRUCTURE SWITCH pour adapter la difficulté
    // EXPRESSION: difficulty - variable à tester
    // AVANTAGE: Plus lisible qu'une série de if-else pour plusieurs cas
    switch (difficulty) {
        // LIGNE 490: CAS 'easy' - niveau facile
        case 'easy': shuffleMoves = 10; break;
        // LIGNE 491: CAS 'medium' - niveau moyen  
        case 'medium': shuffleMoves = 25; break;
        // LIGNE 492: CAS 'hard' - niveau difficile
        case 'hard': shuffleMoves = 50; break;
        // LIGNE 493: CAS 'expert' - niveau expert
        case 'expert': shuffleMoves = 100; break;
        // NOTE: Le break empêche l'exécution des cas suivants
    }
    
    // LIGNE 496: BOUCLE FOR pour effectuer le nombre de mouvements déterminé
    // CONDITION: i < shuffleMoves - répète selon la difficulté choisie
    for (let i = 0; i < shuffleMoves; i++) {
        // LIGNE 499: TABLEAU DYNAMIQUE pour stocker les positions mobiles
        // INITIALISATION: [] - tableau vide qui sera rempli
        const movablePieces = [];
        
        // LIGNE 502: BOUCLE FOR pour identifier toutes les pièces déplaçables
        // PARCOURS: Toutes les positions de la grille (0 à 8)
        for (let j = 0; j < TOTAL_PIECES; j++) {
            // LIGNE 505: CONDITION COMPOSÉE pour filtrer les pièces mobiles
            // PARTIE 1: currentState[j] !== EMPTY_PIECE - pas la case vide
            // PARTIE 2: canMovePiece(j) - peut effectivement bouger
            // LOGIQUE: Seules les vraies pièces adjacentes à la case vide
            if (currentState[j] !== EMPTY_PIECE && canMovePiece(j)) {
                // LIGNE 508: AJOUT de la position dans le tableau des candidats
                // MÉTHODE: push() - ajoute un élément à la fin du tableau
                movablePieces.push(j);
            }
        }
        
        // LIGNE 512: SÉLECTION ALÉATOIRE d'une pièce mobile
        // CONDITION: movablePieces.length > 0 - s'assure qu'il y a au moins une pièce mobile
        // SÉCURITÉ: Évite les erreurs si aucune pièce ne peut bouger (cas impossible normalement)
        if (movablePieces.length > 0) {
            // LIGNE 516: CALCUL d'INDEX ALÉATOIRE
            // Math.random(): génère nombre entre 0 (inclus) et 1 (exclus)
            // * movablePieces.length: multiplie par le nombre de pièces mobiles
            // Math.floor(): arrondit vers le bas pour obtenir un index entier
            // RÉSULTAT: Index aléatoire valide dans le tableau movablePieces
            const randomPiece = movablePieces[Math.floor(Math.random() * movablePieces.length)];
            
            // LIGNE 521: DÉPLACEMENT SILENCIEUX (sans incrémenter moveCount)
            // ALGORITHME: Même échange que movePiece() mais sans effets de bord
            // COMMENTAIRE: "sans incrémenter le compteur" car c'est du mélange, pas du jeu
            const temp = currentState[randomPiece];
            currentState[randomPiece] = currentState[emptyPosition];
            currentState[emptyPosition] = temp;
            emptyPosition = randomPiece;
        }
    }
    
    // LIGNE 529: VÉRIFICATION ANTI-COÏNCIDENCE
    // PROBLÈME: Le mélange pourrait par hasard donner l'état résolu
    // MÉTHODE: every() pour comparer avec SOLVED_STATE
    // SOLUTION: Remélange récursivement si déjà résolu
    if (currentState.every((piece, index) => piece === SOLVED_STATE[index])) {
        console.log(' Puzzle déjà résolu après mélange, remélange...');
        // LIGNE 535: APPEL RÉCURSIF - la fonction s'appelle elle-même
        // RISQUE: Récursion infinie théorique (très improbable)
        // ALTERNATIVE: Boucle while serait plus sûre
        shufflePuzzle(); // Remélange récursivement
        return;
    }
    
    // LIGNE 540: RECONSTRUCTION de l'interface avec le nouvel état
    createPuzzleGrid();
    
    console.log(` Puzzle mélangé avec ${shuffleMoves} mouvements valides`);
    console.log(' État après mélange:', currentState);
}

// ==================== NOUVELLE PARTIE ====================
function startNewGame() {
    console.log(' Nouvelle partie...');
    
    // Remet à l'état résolu
    currentState = [...SOLVED_STATE];
    emptyPosition = 8;
    gameWon = false;
    
    // Remet les compteurs à zéro
    resetCounters();
    
    // Cache le message
    hideMessage();
    
    // Remet le bouton à son état normal
    newGameBtn.textContent = ' Nouvelle Partie';
    newGameBtn.style.background = 'linear-gradient(45deg, #28a745, #1e7e34)';
    newGameBtn.style.fontSize = '16px';
    newGameBtn.style.animation = '';
    
    // Recrée la grille
    createPuzzleGrid();
    
    // Mélange automatiquement après un délai
    setTimeout(() => {
        shufflePuzzle();
    }, 500);
    
    console.log(' Nouvelle partie démarrée - Puzzle mélangé');
}

// ==================== RÉSOLUTION AUTOMATIQUE ====================
function solvePuzzle() {
    console.log(' Résolution automatique...');
    
    // Place toutes les pièces dans l'ordre correct
    currentState = [...SOLVED_STATE];
    emptyPosition = 8;
    
    // Arrête le timer
    stopTimer();
    
    // Recrée la grille
    createPuzzleGrid();
    
    // Déclenche la victoire
    gameWon = true;
    showWinMessage();
    
    console.log(' Puzzle résolu automatiquement');
}

// ==================== GESTION DU TIMER ====================
function startTimer() {
    gameStartTime = Date.now();
    gameTimer = setInterval(updateTimer, 1000);
}

function updateTimer() {
    if (gameStartTime) {
        const elapsed = Math.floor((Date.now() - gameStartTime) / 1000);
        timeCount.textContent = formatTime(elapsed);
    }
}

function stopTimer() {
    if (gameTimer) {
        clearInterval(gameTimer);
        gameTimer = null;
    }
}

function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = seconds % 60;
    return `${minutes.toString().padStart(2, '0')}:${remainingSeconds.toString().padStart(2, '0')}`;
}

// ==================== GESTION DES COMPTEURS ====================
function resetCounters() {
    moveCount = 0;
    updateMoveCounter();
    
    if (gameTimer) {
        clearInterval(gameTimer);
        gameTimer = null;
    }
    
    gameStartTime = null;
    timeCount.textContent = '00:00';
}

function updateMoveCounter() {
    movesCount.textContent = moveCount;
}

// ==================== GESTION DES MESSAGES ====================
function hideMessage() {
    message.classList.add('hidden');
    
    // Réactive les pièces
    document.querySelectorAll('.puzzle-piece').forEach(piece => {
        piece.style.pointerEvents = 'auto';
    });
}

// ==================== STATISTIQUES ====================
function saveStats() {
    try {
        // Charge les stats existantes
        let stats = JSON.parse(localStorage.getItem('taquinStats')) || {
            bestScore: Infinity,
            gamesPlayed: 0
        };
        
        // Met à jour les stats
        stats.gamesPlayed++;
        if (moveCount < stats.bestScore) {
            stats.bestScore = moveCount;
        }
        
        // Sauvegarde
        localStorage.setItem('taquinStats', JSON.stringify(stats));
        
        // Met à jour l'affichage
        updateStatsDisplay(stats);
        
    } catch (e) {
        console.log('Erreur sauvegarde stats:', e);
    }
}

function loadStats() {
    try {
        const stats = JSON.parse(localStorage.getItem('taquinStats')) || {
            bestScore: Infinity,
            gamesPlayed: 0
        };
        
        updateStatsDisplay(stats);
        
    } catch (e) {
        console.log('Erreur chargement stats:', e);
    }
}

function updateStatsDisplay(stats) {
    bestScore.textContent = stats.bestScore === Infinity ? '--' : stats.bestScore;
    gamesPlayed.textContent = stats.gamesPlayed;
}

// ==================== AJOUT DES ÉVÉNEMENTS ====================
function addEventListeners() {
    // Boutons de contrôle
    newGameBtn.addEventListener('click', startNewGame);
    shuffleBtn.addEventListener('click', shufflePuzzle);
    solveBtn.addEventListener('click', solvePuzzle);
    
    // Sélecteur de difficulté
    difficultySelect.addEventListener('change', () => {
        console.log(' Difficulté changée:', difficultySelect.value);
    });
    
    // Raccourcis clavier
    document.addEventListener('keydown', (e) => {
        switch (e.key) {
            case 'n':
            case 'N':
                startNewGame();
                break;
            case 's':
            case 'S':
                shufflePuzzle();
                break;
            case 'r':
            case 'R':
                solvePuzzle();
                break;
        }
    });
}

// ==================== FONCTIONS DE DEBUG ====================
function debugState() {
    console.log(' État actuel:', currentState);
    console.log(' État objectif:', SOLVED_STATE);
    console.log(' Position case vide:', emptyPosition);
    console.log(' Mouvements:', moveCount);
    console.log(' Jeu gagné:', gameWon);
}

function forceWin() {
    console.log(' CHEAT: Force la victoire');
    currentState = [...SOLVED_STATE];
    emptyPosition = 8;
    createPuzzleGrid();
    checkWinCondition();
}

function testTaquin() {
    console.log(' Test du taquin - État presque gagné...');
    // Place le puzzle dans un état presque résolu pour tester facilement
    currentState = [1, 2, 3, 4, 5, 6, 7, 9, 8];
    emptyPosition = 7; // Case vide en position 7 (avant-dernière)
    createPuzzleGrid();
    console.log(' Il suffit de cliquer sur la pièce 8 pour gagner !');
}

// ==================== DÉTECTION MATHÉMATIQUE DE SOLVABILITÉ ====================

// LIGNE 783: Fonction pour vérifier si un état de puzzle est résoluble
// ALGORITHME: Calcule le nombre d'inversions pour déterminer la solvabilité
// THÉORIE: Un taquin 3x3 est solvable si le nombre d'inversions est pair
function isPuzzleSolvable(state) {
    // LIGNE 788: COMPTEUR d'inversions (paires dans le mauvais ordre)
    let inversions = 0;
    
    // LIGNE 791: FILTRAGE pour supprimer la case vide du calcul
    // MÉTHODE: filter() - crée un nouveau tableau sans les éléments filtrés
    // CONDITION: piece !== EMPTY_PIECE - garde seulement les vraies pièces (1-8)
    // RÉSULTAT: Tableau de 8 éléments sans la case vide
    const flatState = state.filter(piece => piece !== EMPTY_PIECE);
    
    // LIGNE 794: DOUBLE BOUCLE FOR pour comparer toutes les paires
    // BOUCLE EXTERNE: i de 0 à length-1 (première pièce de chaque paire)
    for (let i = 0; i < flatState.length - 1; i++) {
        // LIGNE 796: BOUCLE INTERNE: j de i+1 à length (deuxième pièce de chaque paire)
        // LOGIQUE: Compare chaque pièce avec toutes celles qui la suivent
        for (let j = i + 1; j < flatState.length; j++) {
            // LIGNE 798: CONDITION d'inversion
            // INVERSION: Une pièce plus grande précède une pièce plus petite
            // EXEMPLE: Si pièce 5 est avant pièce 2, c'est une inversion
            if (flatState[i] > flatState[j]) {
                // LIGNE 801: INCRÉMENTATION du compteur d'inversions
                inversions++;
            }
        }
    }
    
    // LIGNE 806: CALCUL DE SOLVABILITÉ avec MODULO
    // FORMULE: inversions % 2 === 0 - teste si le nombre est pair
    // THÉORIE MATHÉMATIQUE: Taquin 3x3 solvable ⟺ nombre d'inversions pair
    // RETOUR: Boolean - true si solvable, false sinon
    return inversions % 2 === 0;
}

// ==================== INITIALISATION AU CHARGEMENT DE LA PAGE ====================

// LIGNE 812: ÉVÉNEMENT GLOBAL de chargement complet du DOM
// ÉVÉNEMENT: 'DOMContentLoaded' - déclenché quand le HTML est entièrement parsé
// AVANTAGE: Plus rapide que 'load' qui attend images, CSS, etc.
// CALLBACK: () => {...} - fonction fléchée d'initialisation
document.addEventListener('DOMContentLoaded', () => {
    console.log(' Page chargée - Démarrage du jeu du taquin...');
    
    // LIGNE 818: APPEL de la fonction principale d'initialisation
    initializeGame();
    
    // LIGNE 821: DÉMARRAGE AUTOMATIQUE avec délai
    // FONCTION: setTimeout() - exécution différée
    // DÉLAI: 1000ms (1 seconde) - laisse le temps à l'interface de se stabiliser
    // CALLBACK: () => startNewGame() - démarre une nouvelle partie automatiquement
    setTimeout(() => {
        startNewGame();
    }, 1000);
    
    // LIGNE 827: EXPOSITION de fonctions dans l'espace global pour le debug
    // OBJET: window - objet global du navigateur
    // UTILITÉ: Permet d'appeler ces fonctions depuis la console du développeur
    window.debugState = debugState;
    window.forceWin = forceWin;
    window.testTaquin = testTaquin;
    
    // LIGNE 832: Messages d'information pour le développeur
    console.log(' Jeu du taquin prêt !');
    console.log(' Raccourcis: N = Nouvelle partie, S = Mélanger, R = Résoudre');
    console.log(' Debug: debugState(), forceWin(), testTaquin()');
});

// ==================== GESTIONNAIRE D'ERREUR GLOBAL ====================

// LIGNE 838: GESTION GLOBALE des erreurs JavaScript non capturées
// ÉVÉNEMENT: 'error' - toute erreur non gérée dans le script
// PORTÉE: window - niveau global de la fenêtre
// UTILITÉ: Debug et monitoring des erreurs en production
window.addEventListener('error', (e) => {
    // LIGNE 843: AFFICHAGE d'erreur structuré
    // MÉTHODE: console.error() - affichage en rouge avec stack trace
    // PROPRIÉTÉ: e.error - objet d'erreur avec détails techniques
    console.error(' Erreur dans le jeu:', e.error);
});

// LIGNE 846: MESSAGE FINAL de confirmation du chargement du script
console.log(' Script du jeu du taquin chargé avec succès !');