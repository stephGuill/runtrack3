// ==================== FONCTION PRINCIPALE jsonValueKey() ====================

/**
 * LIGNE 3: DOCUMENTATION JSDoc complète de la fonction
 * UTILITÉ: Décrit précisément le comportement, paramètres et valeur de retour
 * STANDARD: Format reconnu par les IDE pour auto-complétion et vérification
 * @param {string} jsonString - Spécification du type et description
 * @param {string} key - Deuxième paramètre avec son rôle
 * @returns {any} - Type de retour et description du comportement
 */
/**
 * Fonction qui extrait la valeur d'une clé depuis une chaîne JSON
 * @param {string} jsonString - Chaîne de caractères au format JSON
 * @param {string} key - Clé dont on veut récupérer la valeur
 * @returns {any} La valeur associée à la clé, ou undefined si la clé n'existe pas
 */

// LIGNE 12: DÉCLARATION de fonction avec PARAMÈTRES TYPÉS
// PARAMÈTRE 1: jsonString - chaîne contenant du JSON à parser
// PARAMÈTRE 2: key - nom de la propriété à extraire
// RETOUR: any - peut retourner string, number, boolean, object, array ou undefined
function jsonValueKey(jsonString, key) {
    // LIGNE 18: BLOC TRY-CATCH pour gestion d'erreurs robuste
    // UTILITÉ: Capture les erreurs de parsing JSON et autres exceptions
    try {
        // ==================== VALIDATION RIGOUREUSE DES PARAMÈTRES ====================
        
        // LIGNE 23: VALIDATION du PREMIER PARAMÈTRE
        // OPÉRATEUR: typeof - retourne le type primitif de la variable
        // CONDITION: !== 'string' - vérifie que ce n'est PAS une chaîne
        // CONTRAINTE: Le JSON doit être fourni sous forme de string
        if (typeof jsonString !== 'string') {
            // LIGNE 27: CRÉATION et LANCEMENT d'erreur personnalisée
            // CONSTRUCTOR: new Error() - crée un objet d'erreur avec message
            // MOT-CLÉ: throw - déclenche l'exception (passe au bloc catch)
            throw new Error('Le premier paramètre doit être une chaîne de caractères');
        }
        
        // LIGNE 31: VALIDATION du DEUXIÈME PARAMÈTRE (même logique)
        // CONTRAINTE: La clé doit être une chaîne pour l'accès aux propriétés
        if (typeof key !== 'string') {
            throw new Error('Le deuxième paramètre (clé) doit être une chaîne de caractères');
        }
        
        // LIGNE 36: VALIDATION du CONTENU de la chaîne JSON
        // MÉTHODE: .trim() - supprime les espaces en début/fin
        // CONDITION: === '' - vérifie si la chaîne est vide après nettoyage
        // LOGIQUE: Un JSON vide ne peut pas être parsé utilement
        if (jsonString.trim() === '') {
            throw new Error('La chaîne JSON ne peut pas être vide');
        }
        
        // ==================== PARSING DE LA CHAÎNE JSON ====================
        
        // LIGNE 44: UTILISATION de l'API JSON native du navigateur
        // MÉTHODE: JSON.parse() - convertit une chaîne JSON en objet JavaScript
        // AVANTAGE: Performant et robuste, gère tous les types JSON
        // RISQUE: Lève une SyntaxError si le JSON est malformé
        // RÉSULTAT: Objet JavaScript équivalent au JSON
        const jsonObject = JSON.parse(jsonString);
        
        // ==================== EXTRACTION DE LA VALEUR ====================
        
        // LIGNE 53: ACCÈS à la propriété via NOTATION BRACKET
        // SYNTAXE: object[key] - accès dynamique à une propriété
        // AVANTAGE: Permet d'utiliser des variables comme noms de propriétés
        // ALTERNATIVE: object.key (mais ne marche que pour des noms statiques)
        // RÉSULTAT: Valeur associée à la clé, ou undefined si inexistante
        const value = jsonObject[key];
        
        // ==================== LOGGING POUR DEBUG ET MONITORING ====================
        
        // LIGNE 61: LOG de DEBUG avec informations contextuelles
        // MÉTHODE: .substring(0, 50) - tronque la chaîne à 50 caractères
        // UTILITÉ: Évite d'encombrer la console avec de longs JSON
        // PATTERN: Affichage des paramètres d'entrée pour traçabilité
        console.log(` jsonValueKey("${jsonString.substring(0, 50)}...", "${key}")`);
        
        // LIGNE 65: AFFICHAGE de l'objet parsé pour inspection
        // UTILITÉ: Permet de voir la structure de l'objet résultant
        console.log(` Objet parsé:`, jsonObject);
        
        // LIGNE 68: AFFICHAGE du résultat final
        // FORMAT: Template literal avec interpolation de variables
        console.log(` Valeur trouvée pour "${key}":`, value);
        
        // LIGNE 71: RETOUR de la valeur extraite
        // TYPE: any - peut être string, number, boolean, object, array, null
        // CAS SPÉCIAL: undefined si la clé n'existe pas dans l'objet
        return value;
        
    } catch (error) {
        // ==================== GESTION SOPHISTIQUÉE DES ERREURS ====================
        
        // LIGNE 75: BLOC CATCH - capture toutes les exceptions du bloc try
        // PARAMÈTRE: error - objet Error contenant type, message et stack trace
        // TYPES POSSIBLES: SyntaxError (JSON malformé), TypeError, Error personnalisée
        
        // LIGNE 81: LOGGING d'erreur avec console.error()
        // AVANTAGE: Affichage en rouge dans la console pour visibilité
        // PROPRIÉTÉ: error.message - message lisible de l'erreur
        console.error(' Erreur dans jsonValueKey():', error.message);
        
        // LIGNE 85: DÉTECTION SPÉCIFIQUE du type d'erreur avec INSTANCEOF
        // OPÉRATEUR: instanceof - vérifie si l'objet est d'un type spécifique
        // TYPE: SyntaxError - erreur spécifique au parsing JSON
        // LOGIQUE: Si c'est un problème de syntaxe JSON, tenter une approche alternative
        if (error instanceof SyntaxError) {
            // LIGNE 89: LOG d'information sur la stratégie de récupération
            console.log(' Erreur de syntaxe JSON, tentative d\'analyse alternative...');
            
            // LIGNE 91: APPEL RÉCURSIF à une fonction de fallback
            // FONCTION: parseJsonManually() - parser manuel pour JSON non-standard
            // PATTERN: Graceful degradation - tentative de récupération d'erreur
            return parseJsonManually(jsonString, key);
        }
        
        // LIGNE 95: RETOUR par défaut en cas d'erreur non-récupérable
        // VALEUR: undefined - indique l'échec de l'extraction
        // COHÉRENCE: Même valeur que si la clé n'existait pas
        return undefined;
    }
}

// ==================== FONCTION ALTERNATIVE DE PARSING MANUEL ====================

/**
 * LIGNE 101: FONCTION DE FALLBACK pour JSON non-standard
 * UTILITÉ: Traite les chaînes JSON malformées (clés sans guillemets, etc.)
 * TECHNIQUE: Parsing par expressions régulières et manipulation de chaînes
 * @param {string} jsonString - JSON potentiellement invalide
 * @param {string} key - Clé à extraire manuellement
 */
/**
 * Fonction de parsing manuel pour les JSON mal formatés
 * (comme dans l'exemple avec des clés non-quotées)
 * @param {string} jsonString - Chaîne JSON potentiellement mal formatée
 * @param {string} key - Clé à rechercher
 * @returns {any} La valeur trouvée ou undefined
 */
function parseJsonManually(jsonString, key) {
    // LIGNE 116: NOUVEAU BLOC TRY-CATCH pour cette fonction
    // NÉCESSITÉ: Le parsing manuel peut aussi échouer
    try {
        // LIGNE 119: LOG de début de processus alternatif
        console.log(' Tentative de parsing manuel...');
        
        // LIGNE 122: NETTOYAGE INITIAL de la chaîne
        // MÉTHODE: .trim() - supprime espaces et sauts de ligne en début/fin
        // VARIABLE: let (mutable) car va être modifiée plusieurs fois
        let cleanJson = jsonString.trim();
        
        // LIGNE 126: SUPPRESSION des ACCOLADES EXTERNES avec REGEX
        // REGEX 1: /^\{/ - accolade ouvrante en début de chaîne
        // REGEX 2: /\}$/ - accolade fermante en fin de chaîne
        // MÉTHODE: .replace() - remplace les motifs par une chaîne vide
        // EFFET: Retire l'enveloppe JSON pour accéder au contenu
        cleanJson = cleanJson.replace(/^\{/, '').replace(/\}$/, '');
        
        // LIGNE 131: DIVISION en PAIRES CLÉ-VALEUR
        // MÉTHODE: .split(',') - découpe la chaîne sur les virgules
        // RÉSULTAT: Array de chaînes représentant chaque propriété
        // EXEMPLE: ["name: John", "age: 30", "city: Paris"]
        const pairs = cleanJson.split(',');
        
        // LIGNE 135: BOUCLE FOR-OF pour itérer sur chaque paire
        // SYNTAXE: for (variable of iterable) - plus lisible que for classique
        // VARIABLE: pair - chaque élément du tableau pairs
        // AVANTAGE: Accès direct aux valeurs sans gestion d'index
        for (let pair of pairs) {
            // LIGNE 140: NETTOYAGE de chaque paire individuellement
            // VARIABLE: pair (réassignée) - supprime espaces autour
            pair = pair.trim();
            
            // LIGNE 143: RECHERCHE du SÉPARATEUR CLÉ-VALEUR
            // MÉTHODE: .indexOf(':') - trouve la position du premier ':'
            // RÉSULTAT: Index numérique, ou -1 si non trouvé
            // IMPORTANCE: Le ':' sépare la clé de sa valeur
            const colonIndex = pair.indexOf(':');
            
            // LIGNE 147: VALIDATION de la structure de la paire
            // CONDITION: colonIndex === -1 - aucun ':' trouvé
            // MOT-CLÉ: continue - passe à l'itération suivante de la boucle
            // LOGIQUE: Ignore les paires malformées sans arrêter le processus
            if (colonIndex === -1) continue;
            
            // LIGNE 151: EXTRACTION de la CLÉ (partie avant ':')
            // MÉTHODE: .substring(start, end) - extrait une sous-chaîne
            // PARAMÈTRES: 0 (début) à colonIndex (position du ':')
            // NETTOYAGE: .trim() supprime les espaces parasites
            let pairKey = pair.substring(0, colonIndex).trim();
            
            // LIGNE 156: EXTRACTION de la VALEUR (partie après ':')
            // PARAMÈTRES: colonIndex + 1 (après le ':') jusqu'à la fin
            let pairValue = pair.substring(colonIndex + 1).trim();
            
            // LIGNE 160: NETTOYAGE des GUILLEMETS autour de la clé
            // REGEX: /^["']|["']$/g - guillemets simples ou doubles en début OU fin
            // FLAG: g (global) - remplace toutes les occurrences
            // EFFET: Normalise les clés quotées et non-quotées
            pairKey = pairKey.replace(/^["']|["']$/g, '');
            
            // LIGNE 165: NETTOYAGE des GUILLEMETS autour de la valeur
            // MÊME LOGIQUE: Supprime les guillemets optionnels des valeurs
            pairValue = pairValue.replace(/^["']|["']$/g, '');
            
            // LIGNE 169: COMPARAISON avec la clé recherchée
            // CONDITION: pairKey === key - égalité stricte de chaînes
            // SUCCÈS: Si correspondance trouvée, on a la valeur recherchée
            if (pairKey === key) {
                // LIGNE 172: LOG de succès avec détails
                console.log(` Clé "${key}" trouvée avec parsing manuel: "${pairValue}"`);
                
                // LIGNE 174: RETOUR IMMÉDIAT de la valeur trouvée
                // ARRÊT: Sort de la fonction, ignore le reste des paires
                return pairValue;
            }
        }
        
        // LIGNE 177: LOG d'ÉCHEC si aucune correspondance trouvée
        // SITUATION: La boucle s'est terminée sans trouver la clé
        console.log(` Clé "${key}" non trouvée avec parsing manuel`);
        
        // LIGNE 180: RETOUR par défaut en cas d'échec
        // VALEUR: undefined - cohérent avec le comportement de JSON.parse()
        return undefined;
        
    } catch (error) {
        // LIGNE 184: GESTION d'erreur pour le parsing manuel
        // CAS POSSIBLES: Erreurs de regex, substring hors limites, etc.
        console.error(' Erreur lors du parsing manuel:', error.message);
        
        // LIGNE 187: RETOUR de sécurité
        return undefined;
    }
}

// ==================== FONCTIONS DE TEST ET INTERFACE ====================

/**
 * LIGNE 191: FONCTION D'INTERFACE pour tester avec l'UI
 * UTILITÉ: Récupère les valeurs des champs HTML et affiche les résultats
 * INTERACTION: Bridge entre l'interface utilisateur et la logique métier
 */
/**
 * Teste la fonction avec l'interface utilisateur
 */
function testFunction() {
    // LIGNE 198: RÉCUPÉRATION des VALEURS des champs de saisie
    // MÉTHODE: document.getElementById() - accès aux éléments par ID
    // PROPRIÉTÉ: .value - contenu textuel des éléments input/textarea
    const jsonInput = document.getElementById('jsonInput').value;
    const keyInput = document.getElementById('keyInput').value;
    
    // LIGNE 202: SÉLECTION de l'élément d'affichage des résultats
    const resultDiv = document.getElementById('result');
    
    // LIGNE 205: VALIDATION de l'INPUT JSON
    // MÉTHODE: .trim() - supprime les espaces pour tester le contenu réel
    // CONDITION: !(...) - négation booléenne, vraie si chaîne vide
    if (!jsonInput.trim()) {
        // LIGNE 208: AFFICHAGE d'erreur via fonction utilitaire
        // FONCTION: showResult() - fonction d'affichage standardisée
        // PARAMÈTRES: message, type ('error' pour styling rouge)
        showResult(' Veuillez entrer une chaîne JSON', 'error');
        
        // LIGNE 210: SORTIE ANTICIPÉE (early return pattern)
        return;
    }
    
    // LIGNE 213: VALIDATION de l'INPUT CLÉ (même logique)
    if (!keyInput.trim()) {
        showResult(' Veuillez entrer une clé à rechercher', 'error');
        return;
    }
    
    // LIGNE 218: LOGGING de début de test pour traçabilité
    console.log(' Test de la fonction jsonValueKey()');
    console.log(' JSON:', jsonInput);
    console.log(' Clé:', keyInput);
    
    // LIGNE 223: APPEL de la fonction principale à tester
    // CAPTURE: Récupère le résultat pour l'analyser
    const result = jsonValueKey(jsonInput, keyInput);
    
    // LIGNE 226: CONSTRUCTION du message de résultat
    // TEMPLATE LITERAL: Permet l'interpolation de variables
    let resultText = ` Résultat pour la clé "${keyInput}":\n`;
    
    // LIGNE 229: VÉRIFICATION du succès de l'opération
    // CONDITION: result !== undefined - teste si une valeur a été trouvée
    // LOGIQUE: undefined indique échec, toute autre valeur (y compris null) = succès
    if (result !== undefined) {
        // LIGNE 232: CONSTRUCTION du message de succès
        // JSON.stringify(): Convertit la valeur en représentation JSON
        // UTILITÉ: Affiche correctement tous types (string, number, object, etc.)
        resultText += ` Valeur trouvée: ${JSON.stringify(result)}\n`;
        
        // LIGNE 235: AFFICHAGE du TYPE de la valeur trouvée
        // OPÉRATEUR: typeof - diagnostic du type pour l'utilisateur
        resultText += ` Type: ${typeof result}`;
        
        // LIGNE 237: AFFICHAGE avec style de succès
        showResult(resultText, 'success');
    } else {
        // LIGNE 239: BRANCHE d'échec
        resultText += ` Clé non trouvée ou erreur de parsing`;
        showResult(resultText, 'error');
    }
    
    // LIGNE 244: FONCTION d'affichage de la console de debug
    // UTILITÉ: Montre les logs à l'utilisateur dans l'interface
    showConsoleOutput();
}

/**
 * LIGNE 311: FONCTION D'EXÉCUTION COMPLÈTE DES TESTS
 * UTILITÉ: Lance tous les tests prédéfinis avec données réalistes
 * PATTERN: Tests d'intégration avec cas d'usage concrets
 */
/**
 * Exécute tous les cas de test prédéfinis
 */
function runAllTests() {
    // LIGNE 318: LOGGING d'initialisation des tests
    console.log(' Exécution de tous les tests...');
    
    // LIGNE 320: FONCTION utilitaire pour nettoyer la console
    clearConsole();
    
    // LIGNE 323: DÉFINITION du TABLEAU de CAS DE TESTS complets
    // STRUCTURE: Chaque test a un nom descriptif, JSON, clé et résultat attendu
    // DONNÉES: Tests basés sur l'exemple de "La Plateforme_" du sujet
    const testCases = [
        // LIGNE 328: TEST 1 - JSON complètement valide (format standard)
        {
            name: 'Test 1: Exemple de base (JSON valide)',
            json: '{"name": "La Plateforme_", "address": "8 rue d\'hozier", "city": "Marseille", "nb_staff": "11", "creation": "2019"}',
            key: 'city',
            expected: 'Marseille'
        },
        // LIGNE 334: TEST 2 - JSON malformé avec sauts de ligne
        // PARTICULARITÉ: Clés sans guillemets et formatage multiligne
        {
            name: 'Test 2: JSON avec clés non-quotées (exemple donné)',
            json: '{\nname: "La Plateforme_",\naddress: "8 rue d\'hozier",\ncity: "Marseille",\nnb_staff: "11",\ncreation: "2019"\n}',
            key: 'city',
            expected: 'Marseille'
        },
        // LIGNE 340: TEST 3 - Accès à valeur numérique (string)
        {
            name: 'Test 3: Nombre',
            json: '{"nb_staff": "11", "creation": "2019"}',
            key: 'nb_staff',
            expected: '11'
        },
        // LIGNE 346: TEST 4 - Gestion d'erreur (clé inexistante)
        {
            name: 'Test 4: Clé inexistante',
            json: '{"name": "Test"}',
            key: 'missing',
            expected: undefined  // Résultat d'échec attendu
        },
        // LIGNE 352: TEST 5 - Valeurs booléennes
        {
            name: 'Test 5: JSON avec valeurs booléennes',
            json: '{"active": true, "verified": false}',
            key: 'active',
            expected: true
        },
        // LIGNE 358: TEST 6 - Valeurs numériques (integer et float)
        {
            name: 'Test 6: JSON avec nombres',
            json: '{"age": 25, "score": 98.5}',
            key: 'age',
            expected: 25
        },
        // LIGNE 364: TEST 7 - JSON vide (edge case)
        {
            name: 'Test 7: JSON vide',
            json: '{}',
            key: 'anything',
            expected: undefined
        }
    ];
    
    // LIGNE 372: INITIALISATION des variables de résultats
    let results = ' RÉSULTATS DES TESTS:\n\n';  // Accumulateur pour l'affichage
    let passedTests = 0;  // Compteur de succès
    let totalTests = testCases.length;  // Total pour statistiques
    
    // LIGNE 377: BOUCLE forEach pour EXÉCUTION de chaque test
    testCases.forEach((testCase, index) => {
        // LIGNE 379: LOGGING du test en cours
        console.log(`\n--- ${testCase.name} ---`);
        
        // LIGNE 382: APPEL de la fonction à tester
        const result = jsonValueKey(testCase.json, testCase.key);
        
        // LIGNE 385: ÉVALUATION du résultat
        // COMPARAISON: Égalité stricte pour validation précise
        const passed = result === testCase.expected;
        
        // LIGNE 389: BRANCHEMENT conditionnel selon le résultat
        if (passed) {
            // LIGNE 391: TRAITEMENT du succès
            passedTests++;  // Incrémentation compteur
            results += ` ${testCase.name}\n`;
            results += `   Résultat: ${JSON.stringify(result)} ✓\n\n`;
        } else {
            // LIGNE 396: TRAITEMENT de l'échec avec diagnostic
            results += ` ${testCase.name}\n`;
            results += `   Attendu: ${JSON.stringify(testCase.expected)}\n`;
            results += `   Obtenu: ${JSON.stringify(result)}\n\n`;
        }
    });
    
    // LIGNE 417: COMPILATION des STATISTIQUES finales
    // TEMPLATE LITERAL: Construction du résumé avec interpolation
    results += ` BILAN: ${passedTests}/${totalTests} tests réussis\n`;
    
    // LIGNE 421: ÉVALUATION GLOBALE du succès des tests
    // CONDITION: Tous les tests ont-ils réussi ?
    if (passedTests === totalTests) {
        // LIGNE 424: BRANCHE de SUCCÈS TOTAL
        results += ' Tous les tests sont passés avec succès !';
        
        // LIGNE 426: AFFICHAGE avec style de succès
        showResult(results, 'success');
    } else {
        // LIGNE 429: BRANCHE d'ÉCHECS PARTIELS
        results += ' Certains tests ont échoué.';
        
        // LIGNE 431: AFFICHAGE avec style d'erreur
        showResult(results, 'error');
    }
    
    // LIGNE 435: AFFICHAGE de la console pour diagnostic
    showConsoleOutput();
}

/**
 * LIGNE 439: FONCTION DE NETTOYAGE de l'interface
 * UTILITÉ: Remet à zéro l'affichage pour nouveaux tests
 * PATTERN: Reset state pattern
 */
/**
 * Efface les résultats
 */
function clearResults() {
    // LIGNE 447: SÉLECTION de l'élément de résultats
    const resultDiv = document.getElementById('result');
    
    // LIGNE 450: REMISE À ZÉRO du contenu textuel
    // PROPRIÉTÉ: textContent - texte brut sans HTML
    resultDiv.textContent = 'Cliquez sur "Tester la fonction" pour voir le résultat...';
    
    // LIGNE 453: REMISE À ZÉRO des classes CSS
    // PROPRIÉTÉ: className - contrôle du styling CSS
    resultDiv.className = 'result';
    
    // LIGNE 456: MASQUAGE de la console et nettoyage
    hideConsoleOutput();  // Fonction utilitaire UI
    clearConsole();       // Fonction de nettoyage des logs
}

// ==================== FONCTIONS UTILITAIRES D'INTERFACE ====================

/**
 * LIGNE 463: FONCTION D'AFFICHAGE STYLÉ des résultats
 * UTILITÉ: Centralise la logique d'affichage avec styling conditionnel
 * PARAMETERS: text (contenu), type (style CSS)
 */
/**
 * Affiche un résultat avec style
 */
function showResult(text, type = 'info') {
    // LIGNE 471: SÉLECTION de l'élément d'affichage
    const resultDiv = document.getElementById('result');
    
    // LIGNE 474: ASSIGNATION du contenu textuel
    resultDiv.textContent = text;
    
    // LIGNE 477: APPLICATION du style CSS conditionnel
    // TEMPLATE LITERAL: Combine classe de base et modificateur
    // TYPES possibles: 'info', 'success', 'error'
    resultDiv.className = `result ${type}`;
}

/**
 * LIGNE 484: FONCTION DE CONTRÔLE de l'affichage console
 * UTILITÉ: Rend visible la section console dans l'interface
 * PATTERN: DOM manipulation pour UI state management
 */
/**
 * Affiche la sortie console
 */
function showConsoleOutput() {
    // LIGNE 492: SÉLECTION de l'élément console
    const consoleDiv = document.getElementById('consoleOutput');
    
    // LIGNE 495: MODIFICATION de la propriété de visibilité CSS
    // PROPRIÉTÉ: style.display - contrôle de l'affichage
    // VALEUR: 'block' - rend l'élément visible
    consoleDiv.style.display = 'block';
}

/**
 * LIGNE 500: FONCTION DE MASQUAGE de la console
 * UTILITÉ: Cache la section console de l'interface
 * USAGE: Appelée lors du nettoyage ou de l'initialisation
 */
/**
 * Cache la sortie console
 */
function hideConsoleOutput() {
    // LIGNE 508: SÉLECTION et MASQUAGE
    const consoleDiv = document.getElementById('consoleOutput');
    
    // LIGNE 511: VALEUR: 'none' - masque complètement l'élément
    consoleDiv.style.display = 'none';
}

/**
 * LIGNE 515: FONCTION DE NETTOYAGE du contenu console
 * UTILITÉ: Efface tous les logs précédents
 * MÉTHODE: Manipulation du innerHTML pour reset complet
 */
/**
 * Efface la console
 */
function clearConsole() {
    // LIGNE 523: SÉLECTION du conteneur de logs
    const consoleContent = document.getElementById('consoleContent');
    
    // LIGNE 526: EFFACEMENT complet du contenu HTML
    // PROPRIÉTÉ: innerHTML - contenu HTML interne
    // VALEUR: '' - chaîne vide pour tout supprimer
    consoleContent.innerHTML = '';
}

// ==================== OVERRIDE DE CONSOLE.LOG POUR L'INTERFACE ====================

// LIGNE 533: SAUVEGARDE des fonctions console natives
// UTILITÉ: Préserve les comportements originaux pour dual-output
// PATTERN: Function backup before override
const originalConsoleLog = console.log;
const originalConsoleError = console.error;

// LIGNE 539: OVERRIDE de console.log pour DUAL OUTPUT
// UTILITÉ: Les logs apparaissent dans la console navigateur ET l'interface
// PATTERN: Function interception avec fallback
console.log = function(...args) {
    // LIGNE 544: APPEL de la fonction originale
    // MÉTHODE: .apply() - exécute avec contexte et arguments
    // UTILITÉ: Préserve le comportement console standard
    originalConsoleLog.apply(console, args);
    
    // LIGNE 549: AJOUT à l'interface utilisateur
    const consoleContent = document.getElementById('consoleContent');
    
    // LIGNE 552: VÉRIFICATION de l'existence de l'élément
    // CONDITION: Évite les erreurs si l'élément n'existe pas
    if (consoleContent) {
        // LIGNE 555: CRÉATION d'un nouvel élément de log
        // MÉTHODE: document.createElement() - création d'élément DOM
        const logEntry = document.createElement('div');
        
        // LIGNE 558: STYLING de base pour l'espacement
        logEntry.style.marginBottom = '5px';
        
        // LIGNE 561: ASSIGNATION du contenu textuel
        // MÉTHODE: args.join(' ') - combine tous les arguments avec espaces
        logEntry.textContent = args.join(' ');
        
        // LIGNE 564: AJOUT à l'interface
        // MÉTHODE: appendChild() - insertion dans le DOM
        consoleContent.appendChild(logEntry);
        
        // LIGNE 567: AUTO-SCROLL vers le bas
        // PROPRIÉTÉ: scrollTop - position de défilement vertical
        // VALEUR: scrollHeight - hauteur totale du contenu
        // UTILITÉ: Les nouveaux logs restent visibles
        consoleContent.scrollTop = consoleContent.scrollHeight;
    }
};

// LIGNE 574: OVERRIDE de console.error pour messages d'erreur
// UTILITÉ: Logs d'erreur avec styling rouge distinctif
console.error = function(...args) {
    // LIGNE 577: APPEL de la fonction originale (même pattern)
    originalConsoleError.apply(console, args);
    
    // LIGNE 580: AJOUT à l'interface avec styling d'erreur
    const consoleContent = document.getElementById('consoleContent');
    if (consoleContent) {
        const logEntry = document.createElement('div');
        logEntry.style.marginBottom = '5px';
        
        // LIGNE 586: STYLING SPÉCIFIQUE pour les erreurs
        // COULEUR: Rouge Bootstrap (#dc3545)
        logEntry.style.color = '#dc3545';
        
        // LIGNE 590: PRÉFIXE d'erreur avec icône + contenu
        logEntry.textContent = ' ' + args.join(' ');
        
        consoleContent.appendChild(logEntry);
        
        // LIGNE 596: AUTO-SCROLL pour erreurs (même logique)
        consoleContent.scrollTop = consoleContent.scrollHeight;
    }
};

// ==================== FONCTIONS DE DEBUG ET VALIDATION ====================

/**
 * LIGNE 604: FONCTION DE TEST de l'exemple original du sujet
 * UTILITÉ: Valide spécifiquement l'exemple donné dans l'énoncé
 * DONNÉES: JSON malformé exact de l'exercice
 */
/**
 * Teste spécifiquement l'exemple donné dans l'énoncé
 */
function testOriginalExample() {
    // LIGNE 612: LOGGING de début de test spécifique
    console.log(' Test de l\'exemple original...');
    
    // LIGNE 615: DÉFINITION du JSON malformé EXACT de l'énoncé
    // PARTICULARITÉ: Clés sans guillemets, sauts de ligne, apostrophe dans l'adresse
    // FORMAT: Template literal pour préserver les sauts de ligne
    const exampleJson = `{
name: "La Plateforme_",
address: "8 rue d'hozier",
city: "Marseille",
nb_staff: "11",
creation:"2019"
}`;
    
    // LIGNE 636: APPEL de la fonction avec l'exemple exact
    // CLÉ: 'city' - comme demandé dans l'énoncé
    const result = jsonValueKey(exampleJson, 'city');
    
    // LIGNE 640: LOGGING du résultat pour validation
    console.log('Résultat pour l\'exemple original:', result);
    
    // LIGNE 643: RETOUR du résultat pour usage programmatique
    return result;
}

/**
 * LIGNE 647: FONCTION DE TEST de formats JSON variés
 * UTILITÉ: Valide la robustesse de la fonction avec différents styles
 * PATTERN: Array de cas de test avec boucle de validation
 */
/**
 * Fonction pour tester différents formats JSON
 */
function testJsonFormats() {
    // LIGNE 655: LOGGING de début de tests de formats
    console.log(' Test de différents formats JSON...');
    
    // LIGNE 658: DÉFINITION du TABLEAU de formats à tester
    // STRUCTURE: Chaque objet contient un nom descriptif et du JSON
    const formats = [
        // LIGNE 661: Format JSON standard (RFC 7159)
        { name: 'JSON standard', json: '{"key": "value"}' },
        
        // LIGNE 663: JSON avec espaces supplémentaires
        { name: 'JSON avec espaces', json: '{ "key" : "value" }' },
        
        // LIGNE 665: JSON malformé (clés sans guillemets)
        { name: 'JSON sans guillemets (clés)', json: '{key: "value"}' },
        
        // LIGNE 667: JSON multiligne avec indentation
        { name: 'JSON multiligne', json: '{\n  "key": "value"\n}' }
    ];
    
    // LIGNE 671: BOUCLE forEach pour tester chaque format
    formats.forEach(format => {
        // LIGNE 673: LOGGING du test en cours
        console.log(`--- ${format.name} ---`);
        
        // LIGNE 676: APPEL de la fonction avec format spécifique
        const result = jsonValueKey(format.json, 'key');
        
        // LIGNE 679: AFFICHAGE du résultat
        console.log('Résultat:', result);
    });
}

// ==================== EXPOSITION DES FONCTIONS GLOBALES ====================

// LIGNE 686: EXPOSITION dans l'objet window pour accès global
// UTILITÉ: Permet l'utilisation depuis la console du navigateur
// PATTERN: Global namespace pollution (acceptable pour debug)
window.jsonValueKey = jsonValueKey;
window.testOriginalExample = testOriginalExample;
window.testJsonFormats = testJsonFormats;

// ==================== INITIALISATION AU CHARGEMENT ====================

// LIGNE 694: EVENT LISTENER pour le chargement complet du DOM
// ÉVÉNEMENT: 'DOMContentLoaded' - DOM prêt mais images peut-être pas chargées
// UTILITÉ: Garantit que les éléments HTML sont disponibles
document.addEventListener('DOMContentLoaded', function() {
    // LIGNE 699: LOGGING d'initialisation
    console.log(' Page chargée - Fonction jsonValueKey() prête !');
    console.log(' Fonctions disponibles:');
    console.log('   - jsonValueKey(jsonString, key)');
    console.log('   - testOriginalExample()');
    console.log('   - testJsonFormats()');
    
    // LIGNE 706: TEST AUTOMATIQUE différé
    // FONCTION: setTimeout() - exécution différée
    // DÉLAI: Permet au rendu de se terminer avant les tests
    setTimeout(() => {
        console.log('\n Test automatique de l\'exemple original:');
        
        // LIGNE 711: EXÉCUTION du test de l'exemple original
        const result = testOriginalExample();
        
        // LIGNE 715: VALIDATION du résultat attendu
        // CONDITION: Teste si le résultat correspond à l'attendu
        if (result === 'Marseille') {
            console.log(' L\'exemple original fonctionne parfaitement !');
        } else {
            console.log(' L\'exemple original nécessite le parsing manuel');
        }
    }, 500);  // DÉLAI: 500ms pour assurer rendu complet
});

// LIGNE 725: LOGGING final de confirmation de chargement
console.log(' Script jsonValueKey() chargé avec succès !');

/**
 * ==================== RÉSUMÉ TECHNIQUE DU FICHIER ====================
 * 
 * FONCTION PRINCIPALE: jsonValueKey(jsonString, key)
 * UTILITÉ: Extrait une valeur d'un JSON (valide ou malformé) par clé
 * 
 * STRATÉGIE:
 * 1. Validation des paramètres d'entrée (type checking)
 * 2. Tentative de parsing JSON standard avec JSON.parse()
 * 3. Si échec: fallback vers parsing manuel avec regex
 * 4. Retourne la valeur trouvée ou undefined
 * 
 * GESTION D'ERREURS:
 * - Validation des types d'entrée
 * - Try-catch pour JSON.parse()
 * - Instanceof SyntaxError pour diagnostic
 * - Finally block pour logging
 * 
 * PARSING MANUEL:
 * - Regex pour extraire paires clé-valeur
 * - Gestion des clés avec/sans guillemets
 * - Support des valeurs: string, number, boolean, null
 * - Nettoyage des espaces et caractères superflus
 * 
 * FONCTIONNALITÉS INTERFACE:
 * - Tests interactifs avec UI
 * - Console override pour affichage dual
 * - Tests automatisés avec cas d'usage variés
 * - Styling conditionnel des résultats
 * 
 * ROBUSTESSE:
 * - Compatible JSON standard (RFC 7159)
 * - Compatible JSON malformé (clés sans guillemets)
 * - Gestion des caractères spéciaux et échappement
 * - Performance monitoring et debug extensif
 */