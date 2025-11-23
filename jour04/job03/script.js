// ==================== VARIABLES GLOBALES ET CONFIGURATION ====================

// LIGNE 3: DÉCLARATION des VARIABLES GLOBALES de stockage
// VARIABLE: pokemonData - array pour stocker les données JSON chargées
// INITIALISATION: [] - tableau vide en attente du chargement
// PORTÉE: Globale pour accès depuis toutes les fonctions
let pokemonData = []; // Stockage des données Pokémon

// LIGNE 8: STRUCTURE de DONNÉES SET pour types uniques
// TYPE: Set() - collection de valeurs uniques (pas de doublons)
// UTILITÉ: Collecte automatiquement tous les types Pokémon sans répétition
let allTypes = new Set(); // Set de tous les types disponibles

// LIGNE 12: VARIABLE de RÉSULTATS filtrés
// FONCTION: Stocke les résultats après application des filtres
// CYCLE: Mise à jour à chaque filtrage, affichée dans l'UI
let filteredResults = []; // Résultats filtrés

// ==================== SÉLECTION D'ÉLÉMENTS DOM ====================

// LIGNE 17-26: RÉCUPÉRATION des éléments d'interface par ID
// MÉTHODE: document.getElementById() - sélection précise par identifiant
// PATTERN: Const pour références DOM (ne changent jamais)
// UTILITÉ: Cache les références pour éviter re-sélections multiples

// Éléments DOM - FILTRES
const idFilter = document.getElementById('idFilter');         // Input numérique pour ID
const nameFilter = document.getElementById('nameFilter');     // Input texte pour nom
const typeFilter = document.getElementById('typeFilter');     // Select pour types
const filterButton = document.getElementById('filterButton'); // Bouton d'application
const clearButton = document.getElementById('clearButton');   // Bouton de reset

// Éléments DOM - INTERFACE D'ÉTAT
const loadingMessage = document.getElementById('loadingMessage');   // Message de chargement
const errorMessage = document.getElementById('errorMessage');       // Message d'erreur
const resultsContainer = document.getElementById('resultsContainer'); // Container principal
const noResults = document.getElementById('noResults');             // Message aucun résultat
const resultsTitle = document.getElementById('resultsTitle');       // Titre des résultats

// LIGNE 29-31: Éléments de STATISTIQUES
const totalPokemon = document.getElementById('totalPokemon');   // Compteur total
const filteredCount = document.getElementById('filteredCount'); // Compteur filtré
const typesCount = document.getElementById('typesCount');       // Compteur types

// ==================== FONCTION PRINCIPALE DE CHARGEMENT ====================

/**
 * LIGNE 36: FONCTION ASYNCHRONE de chargement des données
 * MODIFIER: async - permet l'utilisation d'await pour opérations asynchrones
 * UTILITÉ: Charge le fichier JSON Pokémon avec gestion d'erreur complète
 * PATTERN: Try-catch pour robustesse
 */
/**
 * Charge les données Pokémon depuis le fichier JSON avec Fetch
 */
async function loadPokemonData() {
    // LIGNE 45: BLOC TRY pour gestion d'erreur structurée
    try {
        // LIGNE 47: LOGGING de début d'opération pour debug
        console.log(' Début du chargement des données Pokémon...');
        
        // LIGNE 49-50: GESTION de l'état de l'interface utilisateur
        // FONCTIONS: Affiche loading, cache les erreurs précédentes
        showLoading(true);  // Active l'indicateur de chargement
        hideError();        // Masque les erreurs précédentes
        
        // ==================== UTILISATION DE FETCH API ====================
        
        // LIGNE 55: APPEL FETCH avec AWAIT
        // API: fetch() - fonction native pour requêtes HTTP
        // AWAIT: Suspend l'exécution jusqu'à réception de la réponse
        // FICHIER: 'pokemon.json' - relatif au répertoire courant
        const response = await fetch('pokemon.json');
        
        // LIGNE 60: VÉRIFICATION de la validité de la réponse HTTP
        // PROPRIÉTÉ: response.ok - booléen (true si status 200-299)
        // CONDITION: Négation pour détecter les erreurs
        if (!response.ok) {
            // LIGNE 63: LANCEMENT d'erreur personnalisée avec détails HTTP
            // TEMPLATE LITERAL: Interpolation des propriétés de réponse
            // STATUS: Code numérique (404, 500, etc.)
            // STATUSTEXT: Description textuelle de l'erreur
            throw new Error(`Erreur HTTP: ${response.status} - ${response.statusText}`);
        }
        
        // LIGNE 68: PARSING JSON de la réponse
        // MÉTHODE: response.json() - convertit le contenu en objet JavaScript
        // AWAIT: Opération asynchrone car parsing peut être long
        // ASSIGNATION: Stockage dans la variable globale
        pokemonData = await response.json();
        
        // LIGNE 72: LOGGING de succès avec statistiques
        // PROPRIÉTÉ: .length - nombre d'éléments dans le tableau
        console.log(` ${pokemonData.length} Pokémon chargés avec succès !`);
        
        // LIGNE 75: TRAITEMENT post-chargement des données
        // FONCTION: Analyse et prépare les données pour filtrage
        processPokemonData();
        
        // LIGNE 78: AFFICHAGE initial de tous les Pokémon
        // FONCTION: Rend visible l'ensemble des données chargées
        displayPokemon(pokemonData);
        
        // LIGNE 82: MISE À JOUR des statistiques d'interface
        // FONCTION: Calcule et affiche compteurs (total, filtré, types)
        updateStats();
        
        // LIGNE 85: MASQUAGE du loading après succès
        showLoading(false);
        
    } catch (error) {
        // LIGNE 88: BLOC CATCH pour gestion d'erreur
        // PARAMETER: error - objet Error capturé automatiquement
        // LOGGING: Affichage dans console avec icône d'erreur
        console.error(' Erreur lors du chargement:', error);
        
        // LIGNE 92: AFFICHAGE d'erreur à l'utilisateur
        // TEMPLATE LITERAL: Message user-friendly avec détail technique
        // PROPRIÉTÉ: error.message - description de l'erreur
        showError(`Erreur lors du chargement des données: ${error.message}`);
        
        // LIGNE 95: MASQUAGE du loading même en cas d'erreur
        showLoading(false);
    }
}

// ==================== TRAITEMENT DES DONNÉES ====================

/**
 * LIGNE 102: FONCTION de PRÉ-TRAITEMENT des données chargées
 * UTILITÉ: Extrait et organise les types Pokémon pour le filtrage
 * PATTERN: Data processing pipeline
 */
/**
 * Traite les données pour extraire tous les types disponibles
 */
function processPokemonData() {
    // LIGNE 110: LOGGING de début de traitement
    console.log(' Traitement des données Pokémon...');
    
    // LIGNE 113: RÉINITIALISATION du Set des types
    // MÉTHODE: .clear() - vide complètement le Set
    // UTILITÉ: Évite les doublons lors d'un rechargement
    allTypes.clear();
    
    // LIGNE 118: BOUCLE forEach pour PARCOURS de tous les Pokémon
    // MÉTHODE: Array.forEach() - itération sur chaque élément
    // PARAMETER: pokemon - objet Pokémon courant
    pokemonData.forEach(pokemon => {
        // LIGNE 122: VALIDATION de la propriété 'type'
        // CONDITIONS: Existence ET type Array pour robustesse
        // LOGIQUE: Évite erreurs sur données malformées
        if (pokemon.type && Array.isArray(pokemon.type)) {
            // LIGNE 126: BOUCLE IMBRIQUÉE sur les types du Pokémon
            // PROPRIÉTÉ: pokemon.type - array des types (ex: ["Electric"])
            // MÉTHODE: forEach sur array de types
            pokemon.type.forEach(type => {
                // LIGNE 130: AJOUT au Set (dédoublonnage automatique)
                // MÉTHODE: Set.add() - ajoute si pas déjà présent
                allTypes.add(type);
            });
        }
    });
    
    // LIGNE 135: REMPLISSAGE de l'interface de sélection
    // FONCTION: Met à jour le select HTML avec les types trouvés
    populateTypeSelect();
    
    // LIGNE 138: LOGGING des statistiques de traitement
    // PROPRIÉTÉ: allTypes.size - nombre d'éléments uniques
    // CONVERSION: Array.from(allTypes) - Set vers Array pour .sort()
    // MÉTHODE: .sort() - tri alphabétique pour affichage ordonné
    console.log(` ${allTypes.size} types différents trouvés:`, Array.from(allTypes).sort());
}

// ==================== REMPLISSAGE DU SELECT DES TYPES ====================

/**
 * LIGNE 146: FONCTION de CONSTRUCTION du select de types
 * UTILITÉ: Génère dynamiquement les options HTML depuis les données
 * PATTERN: Dynamic UI generation
 */
/**
 * Remplit la liste déroulante des types
 */
function populateTypeSelect() {
    // LIGNE 154: RÉINITIALISATION du select HTML
    // PROPRIÉTÉ: innerHTML - contenu HTML interne
    // VALEUR: Option par défaut pour "tous les types"
    typeFilter.innerHTML = '<option value="">-- Tous les types --</option>';
    
    // LIGNE 158: CONVERSION et TRI des types
    // CONVERSION: Set → Array pour utiliser .sort()
    // MÉTHODE: Array.from() - création d'array depuis itérable
    // TRI: .sort() - ordre alphabétique (défaut lexicographique)
    const sortedTypes = Array.from(allTypes).sort();
    
    // LIGNE 164: BOUCLE forEach pour CRÉATION des options HTML
    // ITÉRATION: Sur chaque type trié pour construction du DOM
    sortedTypes.forEach(type => {
        // LIGNE 167: CRÉATION d'un élément option HTML
        // MÉTHODE: document.createElement() - création d'élément DOM
        // TYPE: 'option' - élément pour select HTML
        const option = document.createElement('option');
        
        // LIGNE 172: ASSIGNATION de la valeur de l'option
        // PROPRIÉTÉ: .value - valeur soumise lors de la sélection
        option.value = type;
        
        // LIGNE 177: ASSIGNATION du texte affiché
        // PROPRIÉTÉ: .textContent - texte visible dans l'option
        // VALEUR: Même que value pour cohérence
        option.textContent = type;
        
        // LIGNE 182: AJOUT de l'option au select
        // MÉTHODE: .appendChild() - insertion dans le DOM
        // PARENT: typeFilter (select) reçoit l'option créée
        typeFilter.appendChild(option);
    });
    
    // LIGNE 187: LOGGING de confirmation de mise à jour
    console.log(' Liste déroulante des types mise à jour');
}

// ==================== FONCTION DE FILTRAGE ====================

/**
 * LIGNE 193: FONCTION PRINCIPALE de FILTRAGE des Pokémon
 * UTILITÉ: Applique les critères sélectionnés pour filtrer les résultats
 * LOGIQUE: Combinaison de filtres ID, nom et type
 */
/**
 * Filtre les Pokémon selon les critères sélectionnés
 */
function filterPokemon() {
    // LIGNE 227: LOGGING de début d'opération de filtrage
    console.log(' Début du filtrage...');
    
    // LIGNE 230-232: RÉCUPÉRATION des valeurs des champs de filtre
    // PROPRIÉTÉ: .value - contenu des champs input/select
    // MÉTHODE: .trim() - supprime espaces début/fin pour ID et nom
    // TRANSFORMATION: .toLowerCase() - normalise le nom pour recherche insensible casse
    const idValue = idFilter.value.trim();           // ID numérique nettoyé
    const nameValue = nameFilter.value.trim().toLowerCase(); // Nom en minuscules
    const typeValue = typeFilter.value;              // Type exact (pas de transformation)
    
    // LIGNE 237: LOGGING des critères pour debug et traçabilité
    // OBJET LITERAL: Regroupement des critères pour affichage structuré
    console.log(' Critères de filtrage:', {
        id: idValue,
        name: nameValue,
        type: typeValue
    });
    
    // LIGNE 244: OPÉRATION de FILTRAGE avec Array.filter()
    // MÉTHODE: .filter() - retourne nouveau array avec éléments validés
    // CALLBACK: Fonction qui retourne boolean pour chaque élément
    // ASSIGNATION: Stockage du résultat dans variable globale
    filteredResults = pokemonData.filter(pokemon => {
        // LIGNE 250: VARIABLE de VALIDATION - flag booléen
        // INITIALISATION: true - présume que le Pokémon correspond
        // LOGIQUE: Devient false si un critère n'est pas respecté
        let matches = true;
        
        // ==================== FILTRE PAR ID ====================
        
        // LIGNE 256: CONDITION pour application du filtre ID
        // TEST: idValue !== '' - vérifie si un ID a été saisi
        // LOGIQUE: Skip ce filtre si champ vide (tous les IDs acceptés)
        if (idValue !== '') {
            // LIGNE 260: CONVERSION string → number
            // FONCTION: parseInt() - conversion en entier
            // GESTION: Retourne NaN si conversion impossible
            const idNum = parseInt(idValue);
            
            // LIGNE 264: DOUBLE VALIDATION pour robustesse
            // CONDITION 1: isNaN(idNum) - vérifie validité conversion
            // CONDITION 2: pokemon.id !== idNum - comparaison exacte
            // OPÉRATEUR: || - OU logique (échec si l'une des conditions vraie)
            if (isNaN(idNum) || pokemon.id !== idNum) {
                matches = false;  // Exclusion du Pokémon
            }
        }
        
        // ==================== FILTRE PAR NOM ====================
        
        // LIGNE 273: CONDITION COMPOSÉE pour filtre nom
        // CONDITION 1: nameValue !== '' - nom saisi
        // CONDITION 2: matches - encore candidat valide
        // OPÉRATEUR: && - ET logique (les deux doivent être vrais)
        if (nameValue !== '' && matches) {
            // LIGNE 278: EXTRACTION et NORMALISATION des noms
            // PROPRIÉTÉ: pokemon.name.english - nom anglais (obligatoire)
            // MÉTHODE: .toLowerCase() - normalisation pour comparaison
            const pokemonName = pokemon.name.english.toLowerCase();
            
            // LIGNE 282: GESTION du nom français (optionnel)
            // OPÉRATEUR TERNAIRE: condition ? valeur_si_vrai : valeur_si_faux
            // FALLBACK: '' si nom français absent
            const pokemonNameFrench = pokemon.name.french ? pokemon.name.french.toLowerCase() : '';
            
            // LIGNE 286: RECHERCHE dans MULTIPLE LANGUES
            // MÉTHODE: .includes() - teste la présence de substring
            // LOGIQUE: Recherche dans nom anglais ET français
            // CONDITION: Négation → échec si aucun nom ne contient la recherche
            if (!pokemonName.includes(nameValue) && !pokemonNameFrench.includes(nameValue)) {
                matches = false;
            }
        }
        
        // ==================== FILTRE PAR TYPE ====================
        
        // LIGNE 296: CONDITION pour filtre de type
        // MÊME PATTERN: Vérification saisie ET candidat toujours valide
        if (typeValue !== '' && matches) {
            // LIGNE 299: VALIDATION de l'existence et recherche dans array
            // CONDITION 1: !pokemon.type - vérification existence propriété
            // CONDITION 2: !pokemon.type.includes(typeValue) - recherche dans array types
            // MÉTHODE: .includes() sur array - teste présence élément
            if (!pokemon.type || !pokemon.type.includes(typeValue)) {
                matches = false;
            }
        }
        
        // LIGNE 306: RETOUR du résultat de validation
        // VALEUR: Boolean indiquant si le Pokémon respecte tous les critères
        return matches;
    });
    
    // LIGNE 310: LOGGING des résultats de filtrage
    // PROPRIÉTÉ: .length - nombre d'éléments dans le tableau filtré
    console.log(` ${filteredResults.length} Pokémon trouvés après filtrage`);
    
    // LIGNE 313-314: MISE À JOUR de l'interface utilisateur
    // FONCTIONS: Affichage résultats et actualisation statistiques
    displayPokemon(filteredResults);  // Rendu visuel des Pokémon filtrés
    updateStats();                    // Compteurs mis à jour
    
    // LIGNE 317: MISE À JOUR du titre contextuel
    // FONCTION: Change le titre selon les résultats (ex: "Résultats: 5 Pokémon")
    updateResultsTitle();
}

// ==================== AFFICHAGE DES POKÉMON ====================

/**
 * LIGNE 350: FONCTION D'AFFICHAGE des Pokémon dans l'interface
 * PARAMETER: pokemonList - Array des Pokémon à rendre visuellement
 * UTILITÉ: Génère le HTML dynamique pour chaque Pokémon
 * PATTERN: DOM generation loop
 */
/**
 * Affiche la liste des Pokémon dans l'interface
 * @param {Array} pokemonList - Liste des Pokémon à afficher
 */
function displayPokemon(pokemonList) {
    // LIGNE 361: NETTOYAGE du conteneur avant nouvel affichage
    // PROPRIÉTÉ: innerHTML - contenu HTML interne
    // VALEUR: '' - efface tout pour éviter accumulation
    // LIGNE 361: NETTOYAGE du conteneur avant nouvel affichage
    // PROPRIÉTÉ: innerHTML - contenu HTML interne
    // VALEUR: '' - efface tout pour éviter accumulation
    resultsContainer.innerHTML = '';
    
    // LIGNE 366: GESTION du CAS "aucun résultat"
    // CONDITION: .length === 0 - teste si tableau vide
    if (pokemonList.length === 0) {
        // LIGNE 369: AFFICHAGE du message "pas de résultats"
        // PROPRIÉTÉ: style.display - contrôle visibilité CSS
        // VALEUR: 'block' - rend l'élément visible
        noResults.style.display = 'block';
        
        // LIGNE 372: SORTIE ANTICIPÉE - pas de cartes à créer
        return;
    } else {
        // LIGNE 374: MASQUAGE du message si résultats présents
        // VALEUR: 'none' - cache complètement l'élément
        noResults.style.display = 'none';
    }
    
    // ==================== CRÉATION DES CARTES POKÉMON ====================
    
    // LIGNE 380: BOUCLE de GÉNÉRATION des cartes
    // MÉTHODE: forEach() - itération sur chaque Pokémon à afficher
    pokemonList.forEach(pokemon => {
        // LIGNE 383: CRÉATION d'une carte individuelle
        // FONCTION: createPokemonCard() - génère HTML pour un Pokémon
        // RETOUR: Élément DOM prêt à insérer
        const card = createPokemonCard(pokemon);
        
        // LIGNE 387: INSERTION dans le container
        // MÉTHODE: appendChild() - ajout en fin de conteneur
        resultsContainer.appendChild(card);
    });
    
    // LIGNE 391: LOGGING de confirmation d'affichage
    console.log(` ${pokemonList.length} cartes Pokémon affichées`);
}

// ==================== CRÉATION D'UNE CARTE POKÉMON ====================

/**
 * LIGNE 397: FONCTION de CRÉATION d'une carte Pokémon individuelle
 * PARAMETER: pokemon - Objet avec données complètes du Pokémon
 * RETURN: HTMLElement - Élément DOM prêt à afficher
 * UTILITÉ: Génère structure HTML complexe pour un Pokémon
 */
/**
 * Crée une carte HTML pour un Pokémon
 * @param {Object} pokemon - Objet Pokémon
 * @returns {HTMLElement} Élément carte
 */
function createPokemonCard(pokemon) {
    // LIGNE 407: CRÉATION de l'élément container principal
    // ÉLÉMENT: div - conteneur générique
    const card = document.createElement('div');
    
    // LIGNE 410: ASSIGNATION de la classe CSS pour styling
    // PROPRIÉTÉ: className - contrôle des styles appliqués
    // VALEUR: 'pokemon-card' - classe CSS pour apparence carte
    card.className = 'pokemon-card';
    
    // LIGNE 414: DÉBUT de construction du contenu HTML
    
    // ==================== SECTION EN-TÊTE ====================
    
    // LIGNE 418: CRÉATION du header de la carte
    // En-tête avec nom et ID
    const header = document.createElement('div');
    header.className = 'pokemon-header';
    
    // LIGNE 423: ÉLÉMENT pour le nom du Pokémon
    const name = document.createElement('div');
    name.className = 'pokemon-name';
    // PROPRIÉTÉ: pokemon.name.english - nom en anglais (principal)
    name.textContent = pokemon.name.english;
    
    // LIGNE 429: ÉLÉMENT pour l'ID formaté
    const id = document.createElement('div');
    id.className = 'pokemon-id';
    
    // LIGNE 433: FORMATAGE de l'ID avec padding
    // MÉTHODE: .toString() - conversion number → string
    // MÉTHODE: .padStart(3, '0') - complète avec zéros (ex: 001, 025, 150)
    // TEMPLATE LITERAL: Préfixe # pour format "#001"
    id.textContent = `#${pokemon.id.toString().padStart(3, '0')}`;
    
    // LIGNE 439: ASSEMBLAGE du header
    header.appendChild(name);
    header.appendChild(id);
    
    // ==================== SECTION TYPES ====================
    
    // LIGNE 444: CONTAINER pour les badges de type
    const typesContainer = document.createElement('div');
    typesContainer.className = 'pokemon-types';
    
    // LIGNE 448: VALIDATION et TRAITEMENT des types
    // CONDITION: Vérification existence ET type Array
    if (pokemon.type && Array.isArray(pokemon.type)) {
        // LIGNE 451: BOUCLE de création des badges
        pokemon.type.forEach(type => {
            // LIGNE 453: CRÉATION d'un badge individuel
            const typeBadge = document.createElement('span');
            
            // LIGNE 456: CLASSES CSS dynamiques pour styling par type
            // CLASSE STATIQUE: 'type-badge' - style de base
            // CLASSE DYNAMIQUE: 'type-${type.toLowerCase()}' - couleur spécifique
            // MÉTHODE: .toLowerCase() - normalisation pour CSS
            typeBadge.className = `type-badge type-${type.toLowerCase()}`;
            
            // LIGNE 461: CONTENU textuel du badge
            typeBadge.textContent = type;
            
            // LIGNE 464: AJOUT au container
            typesContainer.appendChild(typeBadge);
        });
    }
    
    // ==================== SECTION STATISTIQUES ====================
    
    // LIGNE 470: CONTAINER pour les statistiques principales
    // Statistiques
    const statsContainer = document.createElement('div');
    statsContainer.className = 'pokemon-stats';
    
    // LIGNE 475: VALIDATION de l'existence des stats de base
    // PROPRIÉTÉ: pokemon.base - objet contenant HP, Attack, Defense, etc.
    if (pokemon.base) {
        // LIGNE 478: DÉFINITION des stats à afficher (sélection)
        // ARRAY: Liste des statistiques importantes à montrer
        // CHOIX: HP, Attack, Defense - stats principales pour aperçu
        const statsToShow = ['HP', 'Attack', 'Defense'];
        
        // LIGNE 482: BOUCLE de création des éléments de stats
        statsToShow.forEach(statName => {
            // LIGNE 484: VÉRIFICATION de l'existence de la stat
            // PROPRIÉTÉ: pokemon.base[statName] - accès dynamique propriété
            // CONDITION: !== undefined - s'assure que la valeur existe
            if (pokemon.base[statName] !== undefined) {
                // LIGNE 488: CRÉATION du container stat individuelle
                const stat = document.createElement('div');
                stat.className = 'stat';
                
                // LIGNE 492: ÉLÉMENT pour le nom de la statistique
                const statNameEl = document.createElement('div');
                statNameEl.className = 'stat-name';
                statNameEl.textContent = statName;  // "HP", "Attack", etc.
                
                // LIGNE 497: ÉLÉMENT pour la valeur numérique
                const statValueEl = document.createElement('div');
                statValueEl.className = 'stat-value';
                
                // LIGNE 501: ASSIGNATION de la valeur depuis les données
                // ACCÈS: pokemon.base[statName] - valeur numérique de la stat
                statValueEl.textContent = pokemon.base[statName];
                
                // LIGNE 505: ASSEMBLAGE des éléments stat
                stat.appendChild(statNameEl);
                stat.appendChild(statValueEl);
                
                // LIGNE 509: AJOUT de la stat au container principal
                statsContainer.appendChild(stat);
            }
        });
    }
    
    // ==================== ASSEMBLAGE FINAL DE LA CARTE ====================
    
    // LIGNE 517: CONSTRUCTION hiérarchique de la carte complète
    // ORDRE: Header → Types → Stats (structure logique)
    card.appendChild(header);      // En-tête avec nom et ID
    card.appendChild(typesContainer); // Badges de types
    card.appendChild(statsContainer); // Statistiques principales
    
    // LIGNE 523: RETOUR de l'élément DOM complet
    // VALEUR: Carte HTML prête à insérer dans le container
    return card;
}

// ==================== MISE À JOUR DES STATISTIQUES ====================

/**
 * LIGNE 530: FONCTION de MISE À JOUR des compteurs d'interface
 * UTILITÉ: Actualise les statistiques affichées (total, filtré, types)
 * CONTEXTE: Appelée après chargement et filtrage
 */
/**
 * Met à jour les statistiques affichées
 */
function updateStats() {
    // LIGNE 538: MISE À JOUR du compteur total
    // PROPRIÉTÉ: .textContent - texte affiché dans l'élément
    // VALEUR: pokemonData.length - nombre total chargé
    totalPokemon.textContent = pokemonData.length;
    
    // LIGNE 543: MISE À JOUR du compteur filtré avec fallback
    // LOGIQUE: filteredResults.length OU pokemonData.length si pas de filtrage
    // OPÉRATEUR: || - utilise la valeur de droite si gauche falsy (0, undefined)
    filteredCount.textContent = filteredResults.length || pokemonData.length;
    
    // LIGNE 548: MISE À JOUR du compteur de types
    // PROPRIÉTÉ: allTypes.size - nombre d'éléments uniques dans le Set
    typesCount.textContent = allTypes.size;
}

// ==================== MISE À JOUR DU TITRE DES RÉSULTATS ====================

/**
 * LIGNE 555: FONCTION de MISE À JOUR du titre contextuel
 * UTILITÉ: Change l'affichage selon l'état du filtrage
 * LOGIQUE: Titre différent si filtres actifs ou vue complète
 */
/**
 * Met à jour le titre de la section résultats
 */
function updateResultsTitle() {
    // LIGNE 563: RÉCUPÉRATION du nombre de résultats actuels
    const count = filteredResults.length;
    
    // LIGNE 566: DÉTECTION de l'état de filtrage
    // FONCTION: hasActiveFilters() - booléen indiquant si filtres appliqués
    const isFiltered = hasActiveFilters();
    
    // LIGNE 570: BRANCHEMENT conditionnel pour le titre
    if (isFiltered) {
        // LIGNE 572: TITRE pour résultats filtrés
        // TEMPLATE LITERAL: Inclusion du nombre avec icône contextuelle
        resultsTitle.textContent = ` Résultats filtrés (${count})`;
    } else {
        // LIGNE 575: TITRE pour vue complète
        // CONTEXTE: Aucun filtre actif, affichage total
        resultsTitle.textContent = ` Tous les Pokémon (${count})`;
    }
}

// ==================== VÉRIFICATION DES FILTRES ACTIFS ====================

/**
 * LIGNE 582: FONCTION de DÉTECTION des filtres actifs
 * UTILITÉ: Détermine si l'utilisateur a appliqué des critères de recherche
 * RETOUR: Boolean indiquant l'état de filtrage
 * LOGIQUE: Teste si au moins un champ de filtre contient une valeur
 */
/**
 * Vérifie si des filtres sont actifs
 * @returns {boolean} True si des filtres sont appliqués
 */
function hasActiveFilters() {
    // LIGNE 606: ÉVALUATION COMBINÉE des champs de filtre
    // LOGIQUE: OU logique (||) - vrai si AU MOINS UN filtre actif
    // TESTS: Vérification que chaque champ contient une valeur
    
    // TEST 1: ID Filter - .trim() supprime espaces, !== '' teste contenu
    // TEST 2: Name Filter - même logique pour le nom
    // TEST 3: Type Filter - pas de trim car select (valeur exacte)
    return idFilter.value.trim() !== '' || 
           nameFilter.value.trim() !== '' || 
           typeFilter.value !== '';
}

// ==================== FONCTION D'EFFACEMENT ====================

/**
 * LIGNE 619: FONCTION de RESET des filtres
 * UTILITÉ: Remet l'interface à l'état initial (tous Pokémon visibles)
 * PATTERN: Reset to default state
 */
/**
 * Efface tous les filtres et affiche tous les Pokémon
 */
function clearFilters() {
    // LIGNE 627: LOGGING de l'opération de reset
    console.log(' Effacement des filtres...');
    
    // LIGNE 631-633: RÉINITIALISATION des valeurs de tous les champs
    // PROPRIÉTÉ: .value - contenu des éléments de formulaire
    // VALEUR: '' - chaîne vide pour reset complet
    idFilter.value = '';      // Reset champ ID
    nameFilter.value = '';    // Reset champ nom
    typeFilter.value = '';    // Reset select type (revient à "tous")
    
    // LIGNE 637-640: REMISE À L'ÉTAT INITIAL de l'affichage
    // VARIABLE: filteredResults = [] - vide pour indiquer "pas de filtrage"
    // AFFICHAGE: pokemonData complet (tous les Pokémon)
    filteredResults = [];               // Reset des résultats filtrés
    displayPokemon(pokemonData);        // Affiche la collection complète
    updateStats();                      // Met à jour les compteurs
    updateResultsTitle();               // Ajuste le titre ("Tous les Pokémon")
    
    // LIGNE 642: LOGGING de confirmation
    console.log(' Filtres effacés');
}

// ==================== FONCTIONS D'INTERFACE ====================

/**
 * LIGNE 648: FONCTION de CONTRÔLE de l'indicateur de chargement
 * PARAMETER: show - Boolean pour afficher/masquer
 * UTILITÉ: Gère l'état visuel pendant les opérations asynchrones
 */
/**
 * Affiche/cache le message de chargement
 * @param {boolean} show - True pour afficher
 */
function showLoading(show) {
    // LIGNE 657: CONTRÔLE CONDITIONNEL de la visibilité
    // OPÉRATEUR TERNAIRE: condition ? valeur_si_vrai : valeur_si_faux
    // LOGIQUE: Inverse la visibilité entre loading et results
    loadingMessage.style.display = show ? 'block' : 'none';      // Message loading
    resultsContainer.style.display = show ? 'none' : 'grid';     // Container résultats
}

/**
 * LIGNE 663: FONCTION d'AFFICHAGE des erreurs
 * PARAMETER: message - String décrivant l'erreur
 * UTILITÉ: Communique les problèmes à l'utilisateur
 */
/**
 * Affiche un message d'erreur
 * @param {string} message - Message d'erreur
 */
function showError(message) {
    // LIGNE 672: ASSIGNATION du message d'erreur
    // PROPRIÉTÉ: .textContent - texte affiché à l'utilisateur
    errorMessage.textContent = message;
    
    // LIGNE 675-676: BASCULEMENT de l'affichage vers l'erreur
    // VISIBILITÉ: Montre l'erreur, cache les résultats
    errorMessage.style.display = 'block';       // Affiche l'erreur
    resultsContainer.style.display = 'none';    // Masque les résultats
}

/**
 * LIGNE 681: FONCTION de MASQUAGE des erreurs
 * UTILITÉ: Cache les messages d'erreur précédents
 * CONTEXTE: Appelée avant nouvelles opérations
 */
/**
 * Cache le message d'erreur
 */
function hideError() {
    // LIGNE 699: MASQUAGE simple du message d'erreur
    // PROPRIÉTÉ: style.display = 'none' - rend invisible
    errorMessage.style.display = 'none';
}

// ==================== RECHERCHE EN TEMPS RÉEL ====================

/**
 * LIGNE 706: FONCTION de CONFIGURATION de la recherche en temps réel
 * UTILITÉ: Active le filtrage automatique pendant la saisie
 * PATTERN: Debouncing pour optimiser les performances
 */
/**
 * Effectue une recherche automatique lors de la saisie
 */
function setupLiveSearch() {
    // LIGNE 714: VARIABLE de TEMPORISATION pour debouncing
    // UTILITÉ: Stocke l'ID du timeout pour pouvoir l'annuler
    let searchTimeout;
    
    // LIGNE 718: FONCTION INTERNE de recherche différée
    // PATTERN: Debouncing - évite recherches trop fréquentes
    // UTILITÉ: Améliore performance en groupant les frappes clavier
    const delayedSearch = () => {
        // LIGNE 723: ANNULATION du timeout précédent
        // FONCTION: clearTimeout() - annule timer si en cours
        // UTILITÉ: Reset le délai à chaque nouvelle frappe
        clearTimeout(searchTimeout);
        
        // LIGNE 727: CRÉATION d'un nouveau délai
        // FONCTION: setTimeout() - exécution différée
        // DÉLAI: 500ms - pause avant déclenchement recherche
        searchTimeout = setTimeout(() => {
            // LIGNE 730: CONDITION pour déclencher le filtrage
            // LOGIQUE: Filtre seulement si critères présents
            if (hasActiveFilters()) {
                filterPokemon();  // Exécute le filtrage
            }
        }, 500); // Délai de 500ms
    };
    
    // LIGNE 744: AJOUT des ÉVÉNEMENTS sur les champs de saisie
    // ÉVÉNEMENT: 'input' - déclenché à chaque modification
    // CALLBACK: delayedSearch - fonction de recherche différée
    
    // EVENT LISTENER pour champ ID
    idFilter.addEventListener('input', delayedSearch);
    
    // EVENT LISTENER pour champ nom
    nameFilter.addEventListener('input', delayedSearch);
    
    // LIGNE 752: GESTION SPÉCIALE pour le select de type
    // ÉVÉNEMENT: 'change' - déclenché sur changement de sélection
    // LOGIQUE: Pas de délai pour select (changement moins fréquent)
    typeFilter.addEventListener('change', () => {
        // LIGNE 756: FILTRAGE IMMÉDIAT pour select
        if (hasActiveFilters()) {
            filterPokemon();
        }
    });
}

// ==================== GESTION DES ÉVÉNEMENTS ====================

/**
 * LIGNE 763: FONCTION d'INITIALISATION des event listeners
 * UTILITÉ: Configure tous les gestionnaires d'événements de l'interface
 * PATTERN: Event delegation et handler setup
 */
/**
 * Ajoute les écouteurs d'événements
 */
function addEventListeners() {
    // LIGNE 771: ÉVÉNEMENT pour bouton de filtrage manuel
    // ÉVÉNEMENT: 'click' - clic utilisateur
    // CALLBACK: filterPokemon - fonction de filtrage principal
    filterButton.addEventListener('click', filterPokemon);
    
    // LIGNE 775: ÉVÉNEMENT pour bouton d'effacement
    // CALLBACK: clearFilters - remet à zéro tous les filtres
    clearButton.addEventListener('click', clearFilters);
    
    // LIGNE 778: ACTIVATION de la recherche temps réel
    // FONCTION: setupLiveSearch() - configure debouncing et events
    setupLiveSearch();
    
    // LIGNE 781: GESTION de la touche ENTRÉE pour validation rapide
    // ÉVÉNEMENT: 'keypress' - frappe de touche
    // UTILITÉ: Permet filtrage direct avec Entrée
    idFilter.addEventListener('keypress', (e) => {
        // LIGNE 785: TEST de la touche pressée
        // PROPRIÉTÉ: e.key - identifiant de la touche
        // CONDITION: 'Enter' - touche de validation
        if (e.key === 'Enter') {
            // LIGNE 789: EXÉCUTION immédiate du filtrage
            // FONCTION: filterPokemon() - lance recherche sans délai
            filterPokemon();
        }
    });
    
    // LIGNE 794: MÊME LOGIQUE pour le champ nom
    // ÉVÉNEMENT: Validation par Entrée sur champ nom
    nameFilter.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            filterPokemon();
        }
    });
    
    // LIGNE 801: VALIDATION des CARACTÈRES dans champ ID
    // ÉVÉNEMENT: 'input' - intercepte chaque saisie
    // UTILITÉ: Limite aux nombres uniquement pour cohérence
    idFilter.addEventListener('input', (e) => {
        // LIGNE 805: NETTOYAGE automatique avec REGEX
        // MÉTHODE: .replace(/[^0-9]/g, '') - supprime tous non-chiffres
        // REGEX: [^0-9] - classe négative (tout sauf 0-9)
        // FLAG: g - global (toutes occurrences)
        // PROPRIÉTÉ: e.target.value - valeur du champ modifié
        e.target.value = e.target.value.replace(/[^0-9]/g, '');
    });
    
    // LIGNE 821: LOGGING de confirmation d'initialisation
    console.log(' Événements ajoutés');
}

// ==================== FONCTIONS DE DEBUG ====================

/**
 * LIGNE 827: FONCTION de DEBUG pour diagnostic
 * UTILITÉ: Affiche l'état actuel de l'application pour dépannage
 * CONTEXTE: Disponible depuis la console du navigateur
 */
/**
 * Affiche des informations de debug
 */
function debugInfo() {
    // LIGNE 835: LOGGING des statistiques principales
    console.log(' Informations de debug:');
    
    // LIGNE 837-840: AFFICHAGE des métriques clés
    // COMPTEURS: Nombres d'éléments pour diagnostic
    console.log('- Pokémon chargés:', pokemonData.length);
    console.log('- Types disponibles:', Array.from(allTypes).sort());  // Set → Array
    console.log('- Résultats filtrés:', filteredResults.length);
    console.log('- Filtres actifs:', hasActiveFilters());              // Boolean
}

/**
 * LIGNE 844: FONCTION de RECHERCHE programmatique
 * PARAMETER: name - Nom à rechercher (string)
 * UTILITÉ: Permet recherche depuis console pour tests
 * RETOUR: Array des Pokémon correspondants
 */
/**
 * Recherche un Pokémon par nom
 * @param {string} name - Nom du Pokémon
 */
function searchPokemon(name) {
    // LIGNE 854: FILTRAGE avec recherche insensible à la casse
    // MÉTHODE: .filter() sur données complètes
    // LOGIQUE: .includes() sur nom anglais normalisé
    const results = pokemonData.filter(p => 
        p.name.english.toLowerCase().includes(name.toLowerCase())
    );
    
    // LIGNE 859: LOGGING des résultats pour debug
    // TEMPLATE LITERAL: Affichage terme recherché et résultats
    console.log(` Recherche "${name}":`, results);
    
    // LIGNE 862: RETOUR des résultats pour usage programmatique
    return results;
}

/**
 * LIGNE 866: FONCTION d'EXPOSITION des types disponibles
 * UTILITÉ: Permet accès facile aux types depuis console
 * RETOUR: Array trié des types uniques
 */
/**
 * Affiche les statistiques détaillées d'un type
 * @param {string} type - Type de Pokémon
 */
function analyzeType(type) {
    // LIGNE 882: FILTRAGE par type spécifique
    // LOGIQUE: Recherche Pokémon ayant ce type dans leur array
    // MÉTHODE: .includes() sur array de types
    const pokemonOfType = pokemonData.filter(p => 
        p.type && p.type.includes(type)
    );
    
    // LIGNE 888: AFFICHAGE des statistiques du type
    // OBJET: Regroupe métadonnées pour affichage structuré
    console.log(` Analyse du type "${type}":`, {
        count: pokemonOfType.length,                              // Nombre total
        pokemon: pokemonOfType.map(p => p.name.english)          // Liste des noms
    });
    
    // LIGNE 894: RETOUR de la liste filtrée
    return pokemonOfType;
}

// ==================== INITIALISATION ====================

/**
 * LIGNE 899: FONCTION PRINCIPALE d'INITIALISATION
 * UTILITÉ: Point d'entrée principal de l'application
 * PATTERN: Initialization sequence
 */
/**
 * Initialise l'application
 */
function initializeApp() {
    // LIGNE 915: LOGGING de début d'initialisation
    console.log(' Initialisation du Pokédex Filtre...');
    
    // LIGNE 918: CONFIGURATION des gestionnaires d'événements
    // FONCTION: addEventListeners() - configure tous les events UI
    addEventListeners();
    
    // LIGNE 921: CHARGEMENT des données depuis le fichier JSON
    // FONCTION: loadPokemonData() - fetch et traitement asynchrone
    loadPokemonData();
    
    // LIGNE 924-927: EXPOSITION des fonctions dans l'objet window global
    // UTILITÉ: Permet utilisation depuis console navigateur pour debug
    // PATTERN: Global namespace exposure pour développement
    window.debugInfo = debugInfo;           // Fonction diagnostic
    window.searchPokemon = searchPokemon;   // Recherche programmatique
    window.analyzeType = analyzeType;       // Analyse de type
    window.pokemonData = pokemonData;       // Accès direct aux données
    
    // LIGNE 930-931: LOGGING de confirmation et aide
    console.log(' Application initialisée');
    console.log(' Fonctions de debug: debugInfo(), searchPokemon(name), analyzeType(type)');
}

// ==================== CHARGEMENT DE LA PAGE ====================

// LIGNE 936: EVENT LISTENER pour démarrage automatique
// ÉVÉNEMENT: 'DOMContentLoaded' - DOM construit, prêt pour manipulation
// UTILITÉ: Garantit que éléments HTML existent avant initialisation
// CALLBACK: initializeApp - fonction principale d'initialisation
document.addEventListener('DOMContentLoaded', initializeApp);

/**
 * ==================== RÉSUMÉ TECHNIQUE DU FICHIER ====================
 * 
 * APPLICATION: Pokédex avec système de filtrage avancé
 * TECHNOLOGIE: Vanilla JavaScript ES6+ avec Fetch API
 * 
 * ARCHITECTURE:
 * - Variables globales pour stockage des données
 * - Fonctions modulaires pour chaque fonctionnalité
 * - Gestion d'événements avec debouncing
 * - Interface reactive avec mise à jour temps réel
 * 
 * FONCTIONNALITÉS PRINCIPALES:
 * 1. Chargement JSON asynchrone avec Fetch API
 * 2. Filtrage multi-critères (ID, nom, type)
 * 3. Recherche en temps réel avec debouncing
 * 4. Génération dynamique d'interface (cartes Pokémon)
 * 5. Statistiques temps réel et debug avancé
 * 
 * GESTION D'ERREURS:
 * - Try-catch pour requêtes HTTP
 * - Validation des données JSON
 * - États d'interface (loading, error, success)
 * - Feedback utilisateur contextuel
 * 
 * PERFORMANCE:
 * - Debouncing (500ms) pour optimiser recherche
 * - Réutilisation des références DOM
 * - Filtrage efficient avec Array.filter()
 * - Set() pour dédoublonnage types
 * 
 * PATTERNS:
 * - Module pattern avec fonctions pures
 * - Event delegation et binding
 * - State management avec variables globales
 * - Separation of concerns (data/UI/events)
 */

// ==================== GESTION DES ERREURS GLOBALES ====================
window.addEventListener('error', (e) => {
    console.error(' Erreur globale:', e.error);
    showError('Une erreur inattendue s\'est produite. Consultez la console pour plus de détails.');
});

window.addEventListener('unhandledrejection', (e) => {
    console.error(' Promise rejetée:', e.reason);
});

console.log(' Script Pokédex Filtre chargé avec succès !');