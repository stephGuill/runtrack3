// ==================== DOCUMENTATION COMPLÈTE DU CODE JOB07 ====================
//
// OBJECTIF : Créer un système de détection du code Konami avec activation d'un thème La Plateforme_
// CONCEPTS : Détection de séquence de touches, manipulation DOM, événements, animations, audio
//
// ==================== VARIABLES GLOBALES PRINCIPALES ====================
// konamiSequence : Tableau contenant les codes de touches de la séquence Konami
// userSequence : Tableau qui stocke les touches pressées par l'utilisateur
// isKonamiActivated : Booléen qui indique si le code Konami a été activé

// ==================== CONFIGURATION SIMPLE DU CODE KONAMI ====================
// VARIABLE konamiSequence : Tableau de nombres représentant les codes de touches
// Contient la séquence classique : ↑ ↑ ↓ ↓ ← → ← → B A
// Les nombres correspondent aux propriétés keyCode des événements clavier :
// 38 = Flèche haut, 40 = Flèche bas, 37 = Flèche gauche, 39 = Flèche droite
// 66 = Lettre B, 65 = Lettre A
var konamiSequence = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65]; // ↑↑↓↓←→←→BA

// VARIABLE userSequence : Tableau vide au départ qui va stocker la progression de l'utilisateur
// À chaque bonne touche, on ajoute le keyCode dans ce tableau
// Exemple : si l'utilisateur tape ↑ ↑ ↓, userSequence = [38, 38, 40]
var userSequence = [];

// VARIABLE isKonamiActivated : Booléen pour éviter les activations multiples
// false = le code n'a pas encore été activé
// true = le code a été activé, on ignore les nouvelles tentatives
var isKonamiActivated = false;

// ==================== FONCTION DE DÉTECTION SIMPLE ====================
// FONCTION detectKeyInput : Fonction principale qui analyse chaque touche pressée
// PARAMÈTRE event : Objet événement contenant les informations sur la touche pressée
function detectKeyInput(event) {
    // ==================== CONDITION DE PROTECTION ====================
    // STRUCTURE if : Vérifie si le code est déjà activé
    // isKonamiActivated == true → on sort de la fonction avec return
    // Cela empêche le traitement de nouvelles touches après activation
    if (isKonamiActivated) {
        return; // INSTRUCTION return : Sort immédiatement de la fonction
    }

    // ==================== EXTRACTION DU CODE DE TOUCHE ====================
    // VARIABLE keyCode : Récupère le code numérique de la touche pressée
    // event.keyCode || event.which : Utilise keyCode en priorité, sinon which (compatibilité)
    // Exemple : si l'utilisateur appuie sur ↑, keyCode = 38
    var keyCode = event.keyCode || event.which;
    
    // ==================== AFFICHAGE DE DEBUG ====================
    // console.log() : Affiche des informations dans la console du navigateur
    // userSequence.length : Donne la position actuelle dans la séquence
    // konamiSequence[userSequence.length] : Donne la touche attendue à cette position
    console.log('🔍 Touche pressée:', keyCode, 'Attendu:', konamiSequence[userSequence.length]);
    
    // ==================== CONDITION PRINCIPALE DE VALIDATION ====================
    // STRUCTURE if-else : Compare la touche pressée avec la touche attendue
    // konamiSequence[userSequence.length] : Prend la touche attendue à la position actuelle
    // Exemple : si userSequence.length = 2, on vérifie konamiSequence[2] (3ème élément)
    if (keyCode === konamiSequence[userSequence.length]) {
        // ==================== BLOC : TOUCHE CORRECTE ====================
        
        // MÉTHODE push() : Ajoute la touche correcte à la fin du tableau userSequence
        // Cela fait avancer la progression dans la séquence
        userSequence.push(keyCode);
        
        // AFFICHAGE : Montre la progression actuelle/totale
        // userSequence.length : Nombre de touches correctes tapées
        // konamiSequence.length : Nombre total de touches nécessaires (10)
        console.log('✅ Correct! Progression:', userSequence.length + '/' + konamiSequence.length);
        
        // APPEL DE FONCTION : Affiche un feedback visuel à l'utilisateur
        // PARAMÈTRES : nombre actuel, nombre total
        showProgress(userSequence.length, konamiSequence.length);
        
        // ==================== CONDITION DE SÉQUENCE COMPLÈTE ====================
        // STRUCTURE if : Vérifie si toutes les touches ont été tapées correctement
        // userSequence.length === konamiSequence.length : Compare les longueurs
        // Si égales, cela signifie que la séquence est complète (10/10)
        if (userSequence.length === konamiSequence.length) {
            console.log('🎉 SÉQUENCE COMPLÈTE! ACTIVATION KONAMI!');
            // APPEL DE FONCTION : Lance l'activation du mode Konami
            activateKonamiMode();
        }
    } else {
        // ==================== BLOC : TOUCHE INCORRECTE ====================
        
        // ==================== CONDITION DE NOUVEAU DÉBUT ====================
        // STRUCTURE if-else imbriquée : Gère les erreurs de séquence
        // keyCode === konamiSequence[0] : Vérifie si la touche incorrecte est le début (↑)
        // Cela permet de recommencer une nouvelle séquence sans tout perdre
        if (keyCode === konamiSequence[0]) {
            // NOUVEAU DÉBUT : L'utilisateur a tapé ↑, on recommence depuis cette touche
            // userSequence = [keyCode] : Remet le tableau avec juste cette première touche
            userSequence = [keyCode];
            console.log('🔄 Nouveau début détecté');
        } else {
            // RESET COMPLET : La touche ne correspond à rien, on remet tout à zéro
            // userSequence = [] : Vide complètement le tableau
            userSequence = [];
            console.log('❌ Reset - Recommencez: ↑↑↓↓←→←→BA');
        }
    }
}

// ==================== AFFICHAGE DE PROGRESSION ====================
// FONCTION showProgress : Affiche la progression visuellement à l'utilisateur
// PARAMÈTRES : current (nombre de touches correctes), total (nombre total nécessaire)
function showProgress(current, total) {
    // ==================== NETTOYAGE DES ANCIENS ÉLÉMENTS ====================
    // SÉLECTION DOM : Recherche un élément avec l'ID 'konami-progress'
    // document.getElementById() : Retourne l'élément ou null si non trouvé
    var oldIndicator = document.getElementById('konami-progress');
    
    // CONDITION if : Vérifie si un ancien indicateur existe
    if (oldIndicator) {
        // MÉTHODE remove() : Supprime l'élément du DOM
        oldIndicator.remove();
    }
    
    // ==================== MISE À JOUR DE L'INDICATEUR PERMANENT ====================
    // SÉLECTION DOM : Recherche l'indicateur permanent sur la page
    var visualProgress = document.getElementById('konami-visual-progress');
    
    // CONDITION if : Vérifie si l'indicateur permanent existe
    if (visualProgress) {
        // MANIPULATION DOM : Met à jour le contenu HTML de l'indicateur
        // TEMPLATE LITERALS : Utilise les backticks ` pour créer des chaînes multilignes
        // ${variable} : Syntaxe d'interpolation pour insérer des variables
        visualProgress.innerHTML = `
            <strong>Progression: ${current}/${total}</strong><br>
            <div style="font-size: 0.8em; color: #999;">↑↑↓↓←→←→BA</div>
            <div style="font-size: 0.9em; color: #0062ff; margin-top: 5px;">
                ${'✓'.repeat(current)}${'○'.repeat(total - current)}
            </div>
        `;
        // MÉTHODE repeat() : Répète une chaîne un nombre donné de fois
        // '✓'.repeat(current) : Crée une chaîne avec current fois le symbole ✓
        // '○'.repeat(total - current) : Crée une chaîne avec les cercles restants
    }
    
    // ==================== CRÉATION D'UN INDICATEUR FLOTTANT ====================
    // CRÉATION DOM : Crée un nouvel élément div
    var indicator = document.createElement('div');
    
    // ATTRIBUTION ID : Donne un identifiant à l'élément
    indicator.id = 'konami-progress';
    
    // STYLE CSS INLINE : Applique des styles directement via JavaScript
    // cssText : Propriété qui permet de définir plusieurs styles en une fois
    indicator.style.cssText = `
        position: fixed;        /* Position fixe par rapport à la fenêtre */
        top: 50px;             /* 50 pixels depuis le haut */
        left: 50%;             /* 50% depuis la gauche */
        transform: translateX(-50%);  /* Centre horizontalement */
        background: #0062ff;    /* Couleur de fond bleue La Plateforme_ */
        color: white;          /* Texte blanc */
        padding: 20px 40px;    /* Espacement interne */
        border-radius: 25px;   /* Coins arrondis */
        font-size: 2em;        /* Taille de police grande */
        font-weight: bold;     /* Texte en gras */
        z-index: 10000;        /* Au-dessus de tous les autres éléments */
        border: 3px solid #ffffff;  /* Bordure blanche */
        box-shadow: 0 10px 30px rgba(0,98,255,0.5);  /* Ombre bleue */
    `;
    
    // CONTENU TEXTUEL : Définit le texte à afficher
    // Template literals avec interpolation de variables
    indicator.textContent = `KONAMI: ${current}/${total} ✓`;
    
    // AJOUT AU DOM : Ajoute l'élément au body de la page
    // document.body.appendChild() : Ajoute un élément enfant au body
    document.body.appendChild(indicator);
    
    // ==================== SUPPRESSION AUTOMATIQUE ====================
    // FONCTION setTimeout() : Exécute une fonction après un délai
    // PARAMÈTRES : fonction à exécuter, délai en millisecondes (2000ms = 2 secondes)
    setTimeout(() => {
        // FONCTION FLÉCHÉE : Syntaxe moderne pour définir une fonction
        // CONDITION if : Vérifie si l'élément a encore un parent (n'a pas été supprimé)
        if (indicator.parentNode) {
            // SUPPRESSION DOM : Retire l'élément de son parent
            indicator.parentNode.removeChild(indicator);
        }
    }, 2000);
}

// ==================== FONCTION D'ACTIVATION DU MODE KONAMI ====================
// FONCTION activateKonamiMode : Fonction principale qui active le thème La Plateforme_
function activateKonamiMode() {
    console.log('🚀 DÉBUT ACTIVATION KONAMI MODE...');
    
    // ==================== PRÉVENTION DES ACTIVATIONS MULTIPLES ====================
    // CONDITION if : Vérifie si le mode est déjà activé
    if (isKonamiActivated) {
        console.log('🎮 Code Konami déjà activé !');
        return; // SORTIE : Empêche l'exécution du reste de la fonction
    }
    
    // CHANGEMENT D'ÉTAT : Marque le mode comme activé
    isKonamiActivated = true;
    console.log('✅ État isKonamiActivated mis à true');

    // ==================== TRANSFORMATION VISUELLE DE LA PAGE ====================
    // MANIPULATION CSS : Ajoute une classe CSS au body
    // classList.add() : Méthode pour ajouter une classe à un élément
    // Cette classe déclenche tous les styles CSS du thème La Plateforme_
    document.body.classList.add('konami-activated');
    console.log('✅ Classe konami-activated ajoutée au body');

    // ==================== MASQUAGE DU CONTENU INITIAL ====================
    // SÉLECTION DOM : Trouve l'élément avec la classe 'initial-content'
    // querySelector() : Retourne le premier élément correspondant au sélecteur CSS
    var initialContent = document.querySelector('.initial-content');
    
    // CONDITION if : Vérifie si l'élément existe
    if (initialContent) {
        // STYLE CSS : Change la propriété display pour cacher l'élément
        initialContent.style.display = 'none';
        console.log('✅ Contenu initial masqué');
    }

    // ==================== AFFICHAGE DU CONTENU CACHÉ ====================
    // SÉLECTION DOM : Trouve l'élément avec la classe 'hidden-content'
    var hiddenContent = document.querySelector('.hidden-content');
    
    // CONDITION if : Vérifie si l'élément existe
    if (hiddenContent) {
        // STYLE CSS : Change display pour afficher l'élément
        hiddenContent.style.display = 'block';
        console.log('✅ Contenu caché affiché');
    }

    // ==================== MASQUAGE DE L'INDICE ====================
    // SÉLECTION DOM : Trouve l'élément avec la classe 'konami-hint'
    var hintElement = document.querySelector('.konami-hint');
    
    // CONDITION if : Vérifie si l'élément existe
    if (hintElement) {
        // STYLE CSS : Cache l'indice Konami
        hintElement.style.display = 'none';
        console.log('✅ Indice Konami masqué');
    }

    // ==================== FEEDBACK SONORE AVANCÉ ====================
    // STRUCTURE try-catch : Gestion d'erreurs pour l'audio
    try {
        // APPEL DE FONCTION : Joue un son de victoire
        playVictorySound();
        console.log('✅ Son de victoire joué');
    } catch (e) {
        // GESTION D'ERREUR : Si l'audio échoue, continue sans planter
        console.log('⚠️ Erreur son:', e.message);
    }

    // ==================== EFFETS VISUELS SPECTACULAIRES ====================
    // STRUCTURE try-catch : Gestion d'erreurs pour les effets visuels
    try {
        // APPEL DE FONCTION : Lance les effets de confetti
        launchCelebrationEffects();
        console.log('✅ Effets de célébration lancés');
    } catch (e) {
        // GESTION D'ERREUR : Continue même si les effets échouent
        console.log('⚠️ Erreur effets:', e.message);
    }

    // ==================== MESSAGES DE CÉLÉBRATION ====================
    // SÉRIE DE console.log() : Affiche des messages de succès
    console.log('🎉🎉🎉 CODE KONAMI ACTIVÉ AVEC SUCCÈS ! 🎉🎉🎉');
    console.log('🔵 Thème La Plateforme_ (bleu #0062ff) activé !');
    console.log('✨ Activation réussie !');
    console.log('🏆 Félicitations pour votre persévérance !');

    // ==================== STOCKAGE LOCAL OPTIONNEL ====================
    // STRUCTURE try-catch : Gestion d'erreurs pour localStorage
    try {
        // STOCKAGE LOCAL : Sauvegarde l'état dans le navigateur
        // localStorage.setItem() : Stocke une paire clé/valeur
        localStorage.setItem('konami_activated', 'true');
        localStorage.setItem('konami_completion_time', new Date().toISOString());
        console.log('✅ État sauvegardé localement');
    } catch (e) {
        // GESTION D'ERREUR : localStorage peut être indisponible (navigation privée)
        console.log('💾 Sauvegarde locale non disponible:', e.message);
    }

    // ==================== INITIALISATION DES BOUTONS INTERACTIFS ====================
    // STRUCTURE try-catch : Gestion d'erreurs pour l'initialisation des boutons
    try {
        // FONCTION setTimeout() : Délai avant l'initialisation des boutons
        // Permet de s'assurer que les éléments DOM sont créés avant de les configurer
        setTimeout(function() {
            // APPEL DE FONCTION : Configure les événements des boutons
            initializeButtons();
            console.log('✅ Boutons interactifs initialisés');
        }, 500); // DÉLAI : 500 millisecondes = 0.5 seconde
    } catch (e) {
        // GESTION D'ERREUR : Continue même si l'initialisation des boutons échoue
        console.log('⚠️ Erreur initialisation boutons:', e.message);
    }

    console.log('🎯 ACTIVATION KONAMI TERMINÉE !');
}

// ==================== FONCTION DE RESET SIMPLE ====================
// FONCTION resetSequence : Remet la séquence utilisateur à zéro
function resetSequence() {
    // RÉINITIALISATION : Vide le tableau des touches utilisateur
    userSequence = [];
    console.log('🔄 Séquence réinitialisée - Tapez: ↑↑↓↓←→←→BA');
}

// ==================== FONCTION DE RÉINITIALISATION COMPLÈTE ====================
// FONCTION fullReset : Remet tout le système à l'état initial
function fullReset() {
    // RÉINITIALISATION DES VARIABLES : Remet les variables globales à zéro
    userSequence = [];
    isKonamiActivated = false;
    
    // SUPPRESSION DE CLASSE CSS : Retire la classe qui active le thème
    document.body.classList.remove('konami-activated');
    
    // RÉAFFICHAGE DE L'INDICE : Remet l'indice Konami visible
    var hint = document.querySelector('.konami-hint');
    if (hint) {
        hint.style.display = 'block';
    }
    
    // ==================== NETTOYAGE DU STOCKAGE LOCAL ====================
    // STRUCTURE try-catch : Gestion d'erreurs pour localStorage
    try {
        // SUPPRESSION : Efface les données sauvegardées
        localStorage.removeItem('konami_activated');
        localStorage.removeItem('konami_completion_time');
    } catch (e) {
        // GESTION D'ERREUR : Ignore les erreurs de localStorage
    }
    
    console.log('🔄 Reset complet effectué');
}

// ==================== FEEDBACK VISUEL SIMPLE ====================
// FONCTION createProgressFeedback : Fonction simplifiée, remplacée par showProgress()
function createProgressFeedback() {
    // Cette fonction n'est plus nécessaire avec la nouvelle version
    // La fonction showProgress() la remplace
}

// ==================== FONCTION DE SON DE VICTOIRE ====================
// FONCTION playVictorySound : Joue une mélodie de victoire avec l'API Web Audio
function playVictorySound() {
    // STRUCTURE try-catch : Gestion d'erreurs pour l'API Audio
    try {
        // CRÉATION CONTEXTE AUDIO : Interface pour générer du son
        // AudioContext : API moderne pour l'audio dans le navigateur
        // window.AudioContext || window.webkitAudioContext : Compatibilité navigateurs
        var audioContext = new (window.AudioContext || window.webkitAudioContext)();
        
        // ==================== DÉFINITION DES NOTES MUSICALES ====================
        // TABLEAU notes : Fréquences en Hertz des notes à jouer
        // 523.25 = Do, 659.25 = Mi, 783.99 = Sol, 1046.50 = Do aigu
        var notes = [523.25, 659.25, 783.99, 1046.50]; // Do, Mi, Sol, Do aigu
        
        // VARIABLE noteDuration : Durée de chaque note en secondes
        var noteDuration = 0.2;
        
        // ==================== BOUCLE forEach POUR JOUER LES NOTES ====================
        // MÉTHODE forEach() : Exécute une fonction pour chaque élément du tableau
        // PARAMÈTRES : (élément, index) => fonction
        notes.forEach((frequency, index) => {
            // FONCTION setTimeout() : Délai avant de jouer chaque note
            // index * noteDuration * 1000 : Calcule le délai pour créer une mélodie
            setTimeout(() => {
                // ==================== CRÉATION DES NŒUDS AUDIO ====================
                // OSCILLATEUR : Générateur de fréquences sonores
                var oscillator = audioContext.createOscillator();
                
                // NŒUD DE GAIN : Contrôle du volume
                var gainNode = audioContext.createGain();
                
                // ==================== CONNEXION DES NŒUDS AUDIO ====================
                // CHAÎNE AUDIO : oscillator → gainNode → destination (haut-parleurs)
                oscillator.connect(gainNode);
                gainNode.connect(audioContext.destination);
                
                // ==================== CONFIGURATION DE L'OSCILLATEUR ====================
                // FRÉQUENCE : Définit la hauteur de la note
                oscillator.frequency.setValueAtTime(frequency, audioContext.currentTime);
                
                // TYPE D'ONDE : 'triangle' produit un son plus doux que 'square' ou 'sawtooth'
                oscillator.type = 'triangle';
                
                // ==================== CONFIGURATION DU VOLUME ====================
                // VOLUME INITIAL : 0.1 (10% du volume maximum)
                gainNode.gain.setValueAtTime(0.1, audioContext.currentTime);
                
                // FADE OUT : Diminution progressive du volume pour éviter les clics
                gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + noteDuration);
                
                // ==================== LECTURE DE LA NOTE ====================
                // DÉMARRAGE : Lance la lecture de l'oscillateur
                oscillator.start();
                
                // ARRÊT : Arrête l'oscillateur après la durée définie
                oscillator.stop(audioContext.currentTime + noteDuration);
            }, index * noteDuration * 1000);
        });
    } catch (error) {
        // GESTION D'ERREUR : L'API Audio peut ne pas être supportée
        console.log('🔇 Audio non disponible:', error.message);
    }
}

// ==================== FONCTION D'EFFETS DE CÉLÉBRATION ====================
// FONCTION launchCelebrationEffects : Lance les effets visuels de confetti
function launchCelebrationEffects() {
    // ==================== BOUCLE for POUR CRÉER PLUSIEURS CONFETTI ====================
    // BOUCLE for : Répète 100 fois la création de confetti
    // let i = 0 : Initialisation du compteur
    // i < 100 : Condition de continuation
    // i++ : Incrémentation du compteur à chaque tour
    for (let i = 0; i < 100; i++) {
        // FONCTION setTimeout() : Délai progressif pour étaler les confetti
        // i * 30 : Chaque confetti apparaît 30ms après le précédent
        setTimeout(() => {
            // APPEL DE FONCTION : Crée un confetti individuel
            createBlueConfetti();
        }, i * 30);
    }
}

// FONCTION createBlueConfetti : Crée un élément confetti individuel
function createBlueConfetti() {
    // ==================== CRÉATION DE L'ÉLÉMENT CONFETTI ====================
    // CRÉATION DOM : Crée un nouvel élément div
    var confetti = document.createElement('div');
    
    // ==================== STYLE CSS DYNAMIQUE ====================
    // STYLE CSS : Définit l'apparence et l'animation du confetti
    confetti.style.cssText = `
        position: fixed;                              /* Position fixe par rapport à la fenêtre */
        left: ${Math.random() * 100}vw;              /* Position horizontale aléatoire */
        top: -10px;                                  /* Démarre au-dessus de l'écran */
        width: ${Math.random() * 10 + 5}px;         /* Largeur aléatoire entre 5 et 15px */
        height: ${Math.random() * 10 + 5}px;        /* Hauteur aléatoire entre 5 et 15px */
        background: ${getRandomBlueColor()};          /* Couleur aléatoire parmi les bleus */
        border-radius: 50%;                          /* Forme circulaire */
        pointer-events: none;                        /* N'interfère pas avec les clics */
        z-index: 9999;                              /* Au-dessus des autres éléments */
        animation: confettiFall ${Math.random() * 2 + 3}s linear forwards;  /* Animation de chute */
    `;
    
    // FONCTION Math.random() : Génère un nombre aléatoire entre 0 et 1
    // Math.random() * 100 : Nombre entre 0 et 100
    // Math.random() * 10 + 5 : Nombre entre 5 et 15

    // ==================== CRÉATION DE L'ANIMATION CSS ====================
    // CONDITION if : Vérifie si l'animation n'existe pas déjà
    if (!document.getElementById('confetti-animation')) {
        // CRÉATION DE STYLE : Crée un élément style pour l'animation
        var style = document.createElement('style');
        style.id = 'confetti-animation';
        
        // DÉFINITION KEYFRAMES : Définit l'animation de chute
        style.textContent = `
            @keyframes confettiFall {
                0% { 
                    transform: translateY(-10px) rotate(0deg);   /* Position initiale */
                    opacity: 1;                                  /* Complètement visible */
                }
                100% { 
                    transform: translateY(100vh) rotate(360deg); /* Tombe en bas en tournant */
                    opacity: 0;                                  /* Devient transparent */
                }
            }
        `;
        
        // AJOUT AU DOM : Ajoute le style au head de la page
        document.head.appendChild(style);
    }

    // AJOUT AU DOM : Ajoute le confetti au body
    document.body.appendChild(confetti);

    // ==================== NETTOYAGE AUTOMATIQUE ====================
    // FONCTION setTimeout() : Supprime le confetti après 5 secondes
    setTimeout(() => {
        // CONDITION if : Vérifie si l'élément existe encore
        if (confetti.parentNode) {
            // SUPPRESSION DOM : Retire l'élément pour éviter l'accumulation
            confetti.parentNode.removeChild(confetti);
        }
    }, 5000);
}

// ==================== GÉNÉRATEUR DE COULEURS BLEUES ====================
// FONCTION getRandomBlueColor : Retourne une couleur bleue aléatoire
function getRandomBlueColor() {
    // TABLEAU blueColors : Liste des couleurs aux tons de La Plateforme_
    var blueColors = [
        '#0062ff',  // Bleu principal La Plateforme_
        '#004bb8',  // Bleu foncé
        '#0070ff',  // Bleu clair
        '#3388ff',  // Bleu moyen
        '#ffffff'   // Blanc pour contraste
    ];
    
    // SÉLECTION ALÉATOIRE : Choisit un index aléatoire dans le tableau
    // Math.floor() : Arrondit vers le bas pour obtenir un entier
    // Math.random() * blueColors.length : Nombre entre 0 et la longueur du tableau
    return blueColors[Math.floor(Math.random() * blueColors.length)];
}

// ==================== INITIALISATION SIMPLE ====================
// FONCTION initializeKonamiDetection : Configure les écouteurs d'événements
function initializeKonamiDetection() {
    // ==================== ÉCOUTEUR D'ÉVÉNEMENT PRINCIPAL ====================
    // ÉVÉNEMENT 'keydown' : Se déclenche quand une touche est pressée
    // document.addEventListener() : Attache un écouteur au document entier
    // detectKeyInput : Fonction à appeler à chaque événement keydown
    document.addEventListener('keydown', detectKeyInput);
    
    // ==================== ÉCOUTEUR DE RESET (DEBUG) ====================
    // ÉVÉNEMENT 'keydown' : Écouteur spécial pour la combinaison Ctrl+Shift+R
    document.addEventListener('keydown', function(event) {
        // CONDITION if : Vérifie si Ctrl+Shift+R est pressé
        // event.ctrlKey : True si la touche Ctrl est enfoncée
        // event.shiftKey : True si la touche Shift est enfoncée
        // event.keyCode === 82 : 82 est le code de la touche R
        if (event.ctrlKey && event.shiftKey && (event.keyCode === 82 || event.code === 'KeyR')) {
            // PRÉVENTION : Empêche l'action par défaut du navigateur
            event.preventDefault();
            
            // APPEL DE FONCTION : Lance un reset complet
            fullReset();
        }
    });

    // ==================== MESSAGES D'INITIALISATION ====================
    // SÉRIE DE console.log() : Affiche des informations de démarrage
    console.log('🎮 KONAMI CODE DETECTOR READY!');
    console.log('📋 Séquence: ↑↑↓↓←→←→BA (keyCodes: 38,38,40,40,37,39,37,39,66,65)');
    console.log('🔍 Regardez la console pour voir la progression!');
    console.log('🛠️ Ctrl+Shift+R pour reset');
}

// ==================== FONCTIONS POUR LES BOUTONS INTERACTIFS ====================
// FONCTION initializeButtons : Configure les événements des boutons après activation Konami
function initializeButtons() {
    // FONCTION setTimeout() : Délai pour s'assurer que les boutons existent
    setTimeout(function() {
        // SÉLECTION DOM : Trouve tous les boutons avec la classe 'plateforme-button'
        // querySelectorAll() : Retourne une NodeList de tous les éléments correspondants
        var buttons = document.querySelectorAll('.plateforme-button');
        
        // ==================== BOUCLE forEach POUR CHAQUE BOUTON ====================
        // MÉTHODE forEach() : Exécute une fonction pour chaque bouton trouvé
        buttons.forEach(function(button, index) {
            // ÉVÉNEMENT 'click' : Se déclenche quand on clique sur le bouton
            // addEventListener() : Attache un écouteur d'événement
            button.addEventListener('click', function() {
                // APPEL DE FONCTION : Gère le clic avec les paramètres du bouton
                handleButtonClick(button, index);
            });
        });
        
        // CONDITION if : Affiche le nombre de boutons configurés
        if (buttons.length > 0) {
            console.log('🔘 ' + buttons.length + ' boutons interactifs initialisés');
        }
    }, 100); // DÉLAI : 100 millisecondes
}

// FONCTION handleButtonClick : Gère les clics sur les boutons interactifs
// PARAMÈTRES : button (élément DOM), index (position du bouton)
function handleButtonClick(button, index) {
    // PROPRIÉTÉ textContent : Récupère le texte à l'intérieur du bouton
    var buttonText = button.textContent;
    
    // ==================== EFFETS VISUELS AU CLIC ====================
    // ANIMATION : Effet de réduction temporaire pour feedback visuel
    button.style.transform = 'scale(0.95)'; // Réduit à 95% de la taille
    
    // FONCTION setTimeout() : Remet la taille normale après 150ms
    setTimeout(function() {
        button.style.transform = ''; // Remet le style par défaut
    }, 150);
    
    // ==================== ACTIONS SELON LE BOUTON ====================
    // STRUCTURE switch : Exécute différentes actions selon le texte du bouton
    // toUpperCase() : Convertit en majuscules pour éviter les problèmes de casse
    switch(buttonText.toUpperCase()) {
        // CAS 'DÉCOUVRIR' : Premier type de bouton
        case 'DÉCOUVRIR':
            // APPEL DE FONCTION : Affiche un message spécifique
            showButtonMessage('🎓 Découvrez nos formations innovantes !', '#0062ff');
            console.log('📚 Formation Tech sélectionnée');
            break; // INSTRUCTION break : Sort du switch
            
        // CAS 'EXPLORER' : Deuxième type de bouton
        case 'EXPLORER':
            showButtonMessage('🚀 Explorez l\'innovation technologique !', '#0070ff');
            console.log('🔬 Innovation sélectionnée');
            break;
            
        // CAS 'REJOINDRE' : Troisième type de bouton
        case 'REJOINDRE':
            showButtonMessage('🌟 Rejoignez notre communauté !', '#004bb8');
            console.log('👥 Communauté sélectionnée');
            break;
            
        // CAS default : Pour tous les autres boutons
        default:
            showButtonMessage('✨ Merci pour votre intérêt !', '#0062ff');
            console.log('🔘 Bouton cliqué:', buttonText);
    }
}

// FONCTION showButtonMessage : Affiche un message temporaire stylisé
// PARAMÈTRES : message (texte à afficher), color (couleur de fond)
function showButtonMessage(message, color) {
    // ==================== CRÉATION DE L'ÉLÉMENT MESSAGE ====================
    // CRÉATION DOM : Crée un div pour le message
    var messageDiv = document.createElement('div');
    
    // ==================== STYLE CSS COMPLEXE ====================
    // STYLE CSS : Définit l'apparence du message pop-up
    messageDiv.style.cssText = `
        position: fixed;                                    /* Position fixe */
        top: 50%;                                          /* Centre vertical */
        left: 50%;                                         /* Centre horizontal */
        transform: translate(-50%, -50%);                  /* Centrage parfait */
        background: linear-gradient(45deg, ${color}, rgba(255,255,255,0.9));  /* Dégradé */
        color: white;                                      /* Texte blanc */
        padding: 30px 50px;                               /* Espacement généreux */
        border-radius: 25px;                              /* Coins très arrondis */
        font-size: 1.5em;                                 /* Texte large */
        font-weight: bold;                                /* Texte gras */
        text-align: center;                               /* Texte centré */
        z-index: 10001;                                   /* Au-dessus de tout */
        box-shadow: 0 20px 40px rgba(0, 98, 255, 0.3);   /* Ombre bleue */
        animation: buttonMessageAnim 3s ease-out forwards; /* Animation */
        border: 2px solid rgba(255, 255, 255, 0.3);      /* Bordure semi-transparente */
        backdrop-filter: blur(10px);                       /* Effet de flou arrière */
    `;
    
    // CONTENU : Définit le texte du message
    messageDiv.textContent = message;

    // ==================== CRÉATION DE L'ANIMATION CSS ====================
    // CONDITION if : Vérifie si l'animation n'existe pas déjà
    if (!document.getElementById('button-message-animation')) {
        // CRÉATION DE STYLE : Crée l'animation CSS
        var style = document.createElement('style');
        style.id = 'button-message-animation';
        
        // DÉFINITION KEYFRAMES : Animation d'apparition/disparition
        style.textContent = `
            @keyframes buttonMessageAnim {
                0% { 
                    opacity: 0;                                        /* Invisible */
                    transform: translate(-50%, -50%) scale(0.5);      /* Petit */
                }
                20% { 
                    opacity: 1;                                        /* Visible */
                    transform: translate(-50%, -50%) scale(1.1);      /* Légèrement agrandi */
                }
                80% { 
                    opacity: 1;                                        /* Reste visible */
                    transform: translate(-50%, -50%) scale(1);        /* Taille normale */
                }
                100% { 
                    opacity: 0;                                        /* Disparaît */
                    transform: translate(-50%, -50%) scale(0.8);      /* Légèrement réduit */
                }
            }
        `;
        
        // AJOUT AU DOM : Ajoute l'animation au head
        document.head.appendChild(style);
    }

    // AJOUT AU DOM : Ajoute le message au body
    document.body.appendChild(messageDiv);

    // ==================== SUPPRESSION AUTOMATIQUE ====================
    // FONCTION setTimeout() : Supprime le message après 3 secondes
    setTimeout(function() {
        // CONDITION if : Vérifie si l'élément existe encore
        if (messageDiv.parentNode) {
            // SUPPRESSION DOM : Retire le message
            messageDiv.parentNode.removeChild(messageDiv);
        }
    }, 3000);
}

// ==================== CHARGEMENT DE LA PAGE ====================
// ÉVÉNEMENT 'load' : Se déclenche quand la page est complètement chargée
// window.addEventListener() : Attache l'écouteur à l'objet window
window.addEventListener('load', function() {
    // APPEL DE FONCTION : Lance l'initialisation du système Konami
    initializeKonamiDetection();
    console.log('📄 Page chargée - Détection Konami active !');
    console.log('🎯 Objectif: Découvrir le contenu secret de La Plateforme_');
});

// ==================== FONCTION DE TEST CSS ====================
// FONCTION testCSS : Fonction de debug pour tester l'activation CSS
function testCSS() {
    console.log('🧪 TEST CSS DÉMARRÉ');
    
    // RÉFÉRENCE : Obtient une référence au body
    var body = document.body;
    console.log('Classes actuelles du body:', body.className);
    
    // CONDITION if-else : Toggle de la classe konami-activated
    if (body.classList.contains('konami-activated')) {
        console.log('❌ Classe konami-activated déjà présente - suppression');
        body.classList.remove('konami-activated');
    } else {
        console.log('✅ Ajout de la classe konami-activated');
        body.classList.add('konami-activated');
    }
    
    console.log('Nouvelles classes du body:', body.className);
}

// ==================== FONCTION D'ACTIVATION FORCÉE (DEBUG) ====================
// FONCTION forceActivation : Force l'activation pour les tests
function forceActivation() {
    console.log('🆘 ACTIVATION FORCÉE DÉCLENCHÉE !');
    
    // RÉINITIALISATION : Remet l'état à false pour permettre l'activation
    isKonamiActivated = false;
    
    // APPEL DE FONCTION : Force l'activation du mode Konami
    activateKonamiMode();
}

// ==================== FONCTION DE SIMULATION DE TOUCHE ====================
// FONCTION simulateKey : Simule l'appui d'une touche pour les tests
// PARAMÈTRE keyCode : Code numérique de la touche à simuler
function simulateKey(keyCode) {
    console.log('🔧 Simulation de la touche:', keyCode);
    
    // ==================== CRÉATION D'UN FAUX ÉVÉNEMENT ====================
    // OBJET fakeEvent : Simule un événement keydown
    var fakeEvent = {
        keyCode: keyCode,           // Code de la touche
        which: keyCode,             // Alternative pour la compatibilité
        target: { tagName: 'BODY' } // Simule que l'événement vient du body
    };
    
    // APPEL DE FONCTION : Traite l'événement simulé
    detectKeyInput(fakeEvent);
}

// ==================== RENDRE LES FONCTIONS GLOBALES ====================
// EXPOSITION GLOBALE : Rend les fonctions accessibles depuis le HTML
// window.nomFonction : Attache la fonction à l'objet window global
window.simulateKey = simulateKey;
window.resetSequence = resetSequence;
window.activateKonamiMode = activateKonamiMode;
window.forceActivation = forceActivation;
window.testCSS = testCSS;

// ==================== GESTION DE LA VISIBILITÉ DE LA PAGE ====================
// ÉVÉNEMENT 'visibilitychange' : Se déclenche quand l'onglet change de visibilité
document.addEventListener('visibilitychange', function() {
    // CONDITION if-else : Gère la mise en pause/reprise
    if (document.hidden) {
        // PAGE CACHÉE : L'utilisateur a changé d'onglet
        // clearTimeout() : Annule le timer de reset s'il existe
        clearTimeout(resetTimer);
        console.log('⏸️ Détection mise en pause (page cachée)');
    } else {
        // PAGE VISIBLE : L'utilisateur est revenu sur l'onglet
        // CONDITIONS : Vérifie s'il faut reprendre le timer
        if (sequencePosition > 0 && !isKonamiActivated) {
            // REDÉMARRAGE DU TIMER : Remet le timer de reset
            resetTimer = setTimeout(resetSequence, 5000);
            console.log('▶️ Détection reprise (page visible)');
        }
    }
});

// ==================== RÉSUMÉ DES CONCEPTS UTILISÉS ====================
//
// 🔄 BOUCLES :
// - for (let i = 0; i < 100; i++) : Boucle de création des confetti
// - forEach() : Boucle sur les tableaux (notes musicales, boutons)
//
// 🔀 CONDITIONS :
// - if/else : Validation des touches, gestion d'erreurs, vérifications
// - switch/case : Actions différentes selon le bouton cliqué
// - Opérateur ternaire implicite dans Math.random() * X + Y
//
// 📊 VARIABLES ET TYPES :
// - konamiSequence (Array) : Séquence de codes de touches
// - userSequence (Array) : Progression de l'utilisateur
// - isKonamiActivated (Boolean) : État d'activation
// - keyCode (Number) : Code numérique des touches
// - Éléments DOM (HTMLElement) : Références aux éléments de la page
//
// 🎯 FONCTIONS :
// - detectKeyInput() : Fonction principale de détection
// - activateKonamiMode() : Activation du thème
// - showProgress() : Affichage de progression
// - playVictorySound() : Génération de son
// - launchCelebrationEffects() : Effets visuels
// - Fonctions utilitaires : reset, simulation, debug
//
// 🎨 MANIPULATION DOM :
// - createElement() : Création d'éléments
// - getElementById() / querySelector() : Sélection d'éléments
// - appendChild() / removeChild() : Ajout/suppression d'éléments
// - classList.add/remove() : Gestion des classes CSS
// - style.cssText / style.propriété : Modification des styles
//
// ⚡ ÉVÉNEMENTS :
// - keydown : Détection des touches
// - click : Clics sur les boutons
// - load : Chargement de la page
// - visibilitychange : Changement de visibilité d'onglet
// - addEventListener() : Attachement d'écouteurs
//
// 🎵 API WEB AVANCÉES :
// - Web Audio API : Génération de sons
// - localStorage : Stockage local
// - setTimeout() : Délais et animations
// - Math.random() : Génération aléatoire
//
// 🎯 ARCHITECTURE DU CODE :
// - Séparation des responsabilités (détection, affichage, son, effets)
// - Gestion d'erreurs avec try/catch
// - Fonctions pures et modulaires
// - Variables globales minimales
// - Nettoyage automatique des éléments temporaires

// ==================== FONCTION DE DÉTECTION SIMPLE ====================
function detectKeyInput(event) {
    // Empêcher le traitement si déjà activé
    if (isKonamiActivated) {
        return;
    }

    var keyCode = event.keyCode || event.which;
    
    console.log('🔍 Touche pressée:', keyCode, 'Attendu:', konamiSequence[userSequence.length]);
    
    // Vérifier si c'est la bonne touche
    if (keyCode === konamiSequence[userSequence.length]) {
        userSequence.push(keyCode);
        console.log('✅ Correct! Progression:', userSequence.length + '/' + konamiSequence.length);
        
        // Afficher un feedback visuel
        showProgress(userSequence.length, konamiSequence.length);
        
        // Vérifier si la séquence est complète
        if (userSequence.length === konamiSequence.length) {
            console.log('🎉 SÉQUENCE COMPLÈTE! ACTIVATION KONAMI!');
            activateKonamiMode();
        }
    } else {
        // Mauvaise touche - reset
        if (keyCode === konamiSequence[0]) {
            // Si c'est le début, recommencer
            userSequence = [keyCode];
            console.log('� Nouveau début détecté');
        } else {
            // Sinon reset complet
            userSequence = [];
            console.log('❌ Reset - Recommencez: ↑↑↓↓←→←→BA');
        }
    }
}

// ==================== AFFICHAGE DE PROGRESSION ====================
function showProgress(current, total) {
    // Retirer l'ancien indicateur s'il existe
    var oldIndicator = document.getElementById('konami-progress');
    if (oldIndicator) {
        oldIndicator.remove();
    }
    
    // Mettre à jour l'indicateur permanent sur la page
    var visualProgress = document.getElementById('konami-visual-progress');
    if (visualProgress) {
        visualProgress.innerHTML = `
            <strong>Progression: ${current}/${total}</strong><br>
            <div style="font-size: 0.8em; color: #999;">↑↑↓↓←→←→BA</div>
            <div style="font-size: 0.9em; color: #0062ff; margin-top: 5px;">
                ${'✓'.repeat(current)}${'○'.repeat(total - current)}
            </div>
        `;
    }
    
    // Créer le nouvel indicateur flottant
    var indicator = document.createElement('div');
    indicator.id = 'konami-progress';
    indicator.style.cssText = `
        position: fixed;
        top: 50px;
        left: 50%;
        transform: translateX(-50%);
        background: #0062ff;
        color: white;
        padding: 20px 40px;
        border-radius: 25px;
        font-size: 2em;
        font-weight: bold;
        z-index: 10000;
        border: 3px solid #ffffff;
        box-shadow: 0 10px 30px rgba(0,98,255,0.5);
    `;
    
    indicator.textContent = `KONAMI: ${current}/${total} ✓`;
    document.body.appendChild(indicator);
    
    // Retirer après 2 secondes
    setTimeout(() => {
        if (indicator.parentNode) {
            indicator.parentNode.removeChild(indicator);
        }
    }, 2000);
}

// ==================== FONCTION D'ACTIVATION DU MODE KONAMI ====================
function activateKonamiMode() {
    console.log('🚀 DÉBUT ACTIVATION KONAMI MODE...');
    
    // ==================== PRÉVENTION DES ACTIVATIONS MULTIPLES ====================
    if (isKonamiActivated) {
        console.log('🎮 Code Konami déjà activé !');
        return;
    }
    
    isKonamiActivated = true;
    console.log('✅ État isKonamiActivated mis à true');

    // ==================== TRANSFORMATION VISUELLE DE LA PAGE ====================
    // Ajouter la classe CSS qui déclenche tous les styles La Plateforme_
    document.body.classList.add('konami-activated');
    console.log('✅ Classe konami-activated ajoutée au body');

    // ==================== MASQUAGE DU CONTENU INITIAL ====================
    var initialContent = document.querySelector('.initial-content');
    if (initialContent) {
        initialContent.style.display = 'none';
        console.log('✅ Contenu initial masqué');
    }

    // ==================== AFFICHAGE DU CONTENU CACHÉ ====================
    var hiddenContent = document.querySelector('.hidden-content');
    if (hiddenContent) {
        hiddenContent.style.display = 'block';
        console.log('✅ Contenu caché affiché');
    }

    // ==================== MASQUAGE DE L'INDICE ====================
    var hintElement = document.querySelector('.konami-hint');
    if (hintElement) {
        hintElement.style.display = 'none';
        console.log('✅ Indice Konami masqué');
    }

    // ==================== FEEDBACK SONORE AVANCÉ ====================
    try {
        playVictorySound();
        console.log('✅ Son de victoire joué');
    } catch (e) {
        console.log('⚠️ Erreur son:', e.message);
    }

    // ==================== EFFETS VISUELS SPECTACULAIRES ====================
    try {
        launchCelebrationEffects();
        console.log('✅ Effets de célébration lancés');
    } catch (e) {
        console.log('⚠️ Erreur effets:', e.message);
    }

    // ==================== MESSAGES DE CÉLÉBRATION ====================
    console.log('🎉🎉🎉 CODE KONAMI ACTIVÉ AVEC SUCCÈS ! 🎉🎉🎉');
    console.log('🔵 Thème La Plateforme_ (bleu #0062ff) activé !');
    console.log('✨ Activation réussie !');
    console.log('🏆 Félicitations pour votre persévérance !');

    // ==================== STOCKAGE LOCAL OPTIONNEL ====================
    try {
        localStorage.setItem('konami_activated', 'true');
        localStorage.setItem('konami_completion_time', new Date().toISOString());
        console.log('✅ État sauvegardé localement');
    } catch (e) {
        console.log('💾 Sauvegarde locale non disponible:', e.message);
    }

    // ==================== INITIALISATION DES BOUTONS INTERACTIFS ====================
    try {
        setTimeout(function() {
            initializeButtons();
            console.log('✅ Boutons interactifs initialisés');
        }, 500);
    } catch (e) {
        console.log('⚠️ Erreur initialisation boutons:', e.message);
    }

    console.log('🎯 ACTIVATION KONAMI TERMINÉE !');
}

// ==================== FONCTION DE RESET SIMPLE ====================
function resetSequence() {
    userSequence = [];
    console.log('🔄 Séquence réinitialisée - Tapez: ↑↑↓↓←→←→BA');
}

// ==================== FONCTION DE RÉINITIALISATION COMPLÈTE ====================
function fullReset() {
    userSequence = [];
    isKonamiActivated = false;
    
    document.body.classList.remove('konami-activated');
    
    var hint = document.querySelector('.konami-hint');
    if (hint) {
        hint.style.display = 'block';
    }
    
    // Nettoyer le localStorage
    try {
        localStorage.removeItem('konami_activated');
        localStorage.removeItem('konami_completion_time');
    } catch (e) {
        // Ignorer les erreurs
    }
    
    console.log('� Reset complet effectué');
}

// ==================== FEEDBACK VISUEL SIMPLE ====================
function createProgressFeedback() {
    // Cette fonction n'est plus nécessaire avec la nouvelle version
    // La fonction showProgress() la remplace
}

// ==================== FONCTION DE SON DE VICTOIRE ====================
function playVictorySound() {
    try {
        // Créer un contexte audio pour jouer une mélodie de victoire
        var audioContext = new (window.AudioContext || window.webkitAudioContext)();
        
        // Séquence de notes pour une mélodie de victoire
        var notes = [523.25, 659.25, 783.99, 1046.50]; // Do, Mi, Sol, Do aigu
        var noteDuration = 0.2;
        
        notes.forEach((frequency, index) => {
            setTimeout(() => {
                var oscillator = audioContext.createOscillator();
                var gainNode = audioContext.createGain();
                
                oscillator.connect(gainNode);
                gainNode.connect(audioContext.destination);
                
                oscillator.frequency.setValueAtTime(frequency, audioContext.currentTime);
                oscillator.type = 'triangle'; // Son plus doux
                
                gainNode.gain.setValueAtTime(0.1, audioContext.currentTime);
                gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + noteDuration);
                
                oscillator.start();
                oscillator.stop(audioContext.currentTime + noteDuration);
            }, index * noteDuration * 1000);
        });
    } catch (error) {
        // En cas d'erreur avec l'API Audio, continuer sans son
        console.log('🔇 Audio non disponible:', error.message);
    }
}

// ==================== FONCTION D'EFFETS DE CÉLÉBRATION ====================
function launchCelebrationEffects() {
    // Créer des confetti bleus aux couleurs de La Plateforme_
    for (let i = 0; i < 100; i++) {
        setTimeout(() => {
            createBlueConfetti();
        }, i * 30);
    }
}

function createBlueConfetti() {
    var confetti = document.createElement('div');
    confetti.style.cssText = `
        position: fixed;
        left: ${Math.random() * 100}vw;
        top: -10px;
        width: ${Math.random() * 10 + 5}px;
        height: ${Math.random() * 10 + 5}px;
        background: ${getRandomBlueColor()};
        border-radius: 50%;
        pointer-events: none;
        z-index: 9999;
        animation: confettiFall ${Math.random() * 2 + 3}s linear forwards;
    `;

    // Ajouter l'animation de chute si elle n'existe pas
    if (!document.getElementById('confetti-animation')) {
        var style = document.createElement('style');
        style.id = 'confetti-animation';
        style.textContent = `
            @keyframes confettiFall {
                0% { 
                    transform: translateY(-10px) rotate(0deg); 
                    opacity: 1; 
                }
                100% { 
                    transform: translateY(100vh) rotate(360deg); 
                    opacity: 0; 
                }
            }
        `;
        document.head.appendChild(style);
    }

    document.body.appendChild(confetti);

    // Nettoyage automatique
    setTimeout(() => {
        if (confetti.parentNode) {
            confetti.parentNode.removeChild(confetti);
        }
    }, 5000);
}

// ==================== GÉNÉRATEUR DE COULEURS BLEUES ====================
function getRandomBlueColor() {
    var blueColors = [
        '#0062ff',  // Bleu principal La Plateforme_
        '#004bb8',  // Bleu foncé
        '#0070ff',  // Bleu clair
        '#3388ff',  // Bleu moyen
        '#ffffff'   // Blanc pour contraste
    ];
    return blueColors[Math.floor(Math.random() * blueColors.length)];
}

// ==================== FONCTION DE RÉINITIALISATION COMPLÈTE ====================
function fullReset() {
    // Fonction utile pour le debug ou le redémarrage
    sequencePosition = 0;
    userInputSequence = [];
    isKonamiActivated = false;
    clearTimeout(resetTimer);
    
    document.body.classList.remove('konami-activated');
    
    var hint = document.querySelector('.konami-hint');
    if (hint) {
        hint.style.display = 'block';
    }
    
    // Nettoyer le localStorage
    try {
        localStorage.removeItem('konami_activated');
        localStorage.removeItem('konami_completion_time');
    } catch (e) {
        // Ignorer les erreurs
    }
    
    console.log('🔄 Reset complet effectué');
}

// ==================== INITIALISATION SIMPLE ====================
function initializeKonamiDetection() {
    // Écouter seulement keydown avec keyCode
    document.addEventListener('keydown', detectKeyInput);
    
    // Reset avec Ctrl+Shift+R
    document.addEventListener('keydown', function(event) {
        if (event.ctrlKey && event.shiftKey && (event.keyCode === 82 || event.code === 'KeyR')) {
            event.preventDefault();
            fullReset();
        }
    });

    // Messages d'initialisation
    console.log('🎮 KONAMI CODE DETECTOR READY!');
    console.log('� Séquence: ↑↑↓↓←→←→BA (keyCodes: 38,38,40,40,37,39,37,39,66,65)');
    console.log('� Regardez la console pour voir la progression!');
    console.log('🛠️ Ctrl+Shift+R pour reset');
}

// ==================== FONCTIONS POUR LES BOUTONS INTERACTIFS ====================
function initializeButtons() {
    // Attendre que les boutons soient créés (après activation Konami)
    setTimeout(function() {
        var buttons = document.querySelectorAll('.plateforme-button');
        
        buttons.forEach(function(button, index) {
            button.addEventListener('click', function() {
                handleButtonClick(button, index);
            });
        });
        
        if (buttons.length > 0) {
            console.log('🔘 ' + buttons.length + ' boutons interactifs initialisés');
        }
    }, 100);
}

function handleButtonClick(button, index) {
    var buttonText = button.textContent;
    
    // ==================== EFFETS VISUELS AU CLIC ====================
    button.style.transform = 'scale(0.95)';
    setTimeout(function() {
        button.style.transform = '';
    }, 150);
    
    // ==================== ACTIONS SELON LE BOUTON ====================
    switch(buttonText.toUpperCase()) {
        case 'DÉCOUVRIR':
            showButtonMessage('🎓 Découvrez nos formations innovantes !', '#0062ff');
            console.log('📚 Formation Tech sélectionnée');
            break;
            
        case 'EXPLORER':
            showButtonMessage('🚀 Explorez l\'innovation technologique !', '#0070ff');
            console.log('🔬 Innovation sélectionnée');
            break;
            
        case 'REJOINDRE':
            showButtonMessage('🌟 Rejoignez notre communauté !', '#004bb8');
            console.log('👥 Communauté sélectionnée');
            break;
            
        default:
            showButtonMessage('✨ Merci pour votre intérêt !', '#0062ff');
            console.log('🔘 Bouton cliqué:', buttonText);
    }
}

function showButtonMessage(message, color) {
    // Créer un message temporaire stylisé
    var messageDiv = document.createElement('div');
    messageDiv.style.cssText = `
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: linear-gradient(45deg, ${color}, rgba(255,255,255,0.9));
        color: white;
        padding: 30px 50px;
        border-radius: 25px;
        font-size: 1.5em;
        font-weight: bold;
        text-align: center;
        z-index: 10001;
        box-shadow: 0 20px 40px rgba(0, 98, 255, 0.3);
        animation: buttonMessageAnim 3s ease-out forwards;
        border: 2px solid rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(10px);
    `;
    
    messageDiv.textContent = message;

    // Ajouter l'animation si elle n'existe pas
    if (!document.getElementById('button-message-animation')) {
        var style = document.createElement('style');
        style.id = 'button-message-animation';
        style.textContent = `
            @keyframes buttonMessageAnim {
                0% { 
                    opacity: 0; 
                    transform: translate(-50%, -50%) scale(0.5); 
                }
                20% { 
                    opacity: 1; 
                    transform: translate(-50%, -50%) scale(1.1); 
                }
                80% { 
                    opacity: 1; 
                    transform: translate(-50%, -50%) scale(1); 
                }
                100% { 
                    opacity: 0; 
                    transform: translate(-50%, -50%) scale(0.8); 
                }
            }
        `;
        document.head.appendChild(style);
    }

    document.body.appendChild(messageDiv);

    // Supprimer le message après l'animation
    setTimeout(function() {
        if (messageDiv.parentNode) {
            messageDiv.parentNode.removeChild(messageDiv);
        }
    }, 3000);
}

// ==================== CHARGEMENT DE LA PAGE ====================
// Attendre le chargement complet avant d'initialiser
window.addEventListener('load', function() {
    initializeKonamiDetection();
    console.log('📄 Page chargée - Détection Konami active !');
    console.log('🎯 Objectif: Découvrir le contenu secret de La Plateforme_');
});

// ==================== FONCTION DE TEST CSS ====================
function testCSS() {
    console.log('🧪 TEST CSS DÉMARRÉ');
    
    var body = document.body;
    console.log('Classes actuelles du body:', body.className);
    
    if (body.classList.contains('konami-activated')) {
        console.log('❌ Classe konami-activated déjà présente - suppression');
        body.classList.remove('konami-activated');
    } else {
        console.log('✅ Ajout de la classe konami-activated');
        body.classList.add('konami-activated');
    }
    
    console.log('Nouvelles classes du body:', body.className);
}

// ==================== FONCTION D'ACTIVATION FORCÉE (DEBUG) ====================
function forceActivation() {
    console.log('🆘 ACTIVATION FORCÉE DÉCLENCHÉE !');
    
    // Reset de l'état
    isKonamiActivated = false;
    
    // Forcer l'activation
    activateKonamiMode();
}

// ==================== FONCTION DE SIMULATION DE TOUCHE ====================
function simulateKey(keyCode) {
    console.log('🔧 Simulation de la touche:', keyCode);
    
    // Créer un faux événement
    var fakeEvent = {
        keyCode: keyCode,
        which: keyCode,
        target: { tagName: 'BODY' }
    };
    
    // Appeler directement la fonction de détection
    detectKeyInput(fakeEvent);
}

// ==================== RENDRE LES FONCTIONS GLOBALES ====================
window.simulateKey = simulateKey;
window.resetSequence = resetSequence;
window.activateKonamiMode = activateKonamiMode;
window.forceActivation = forceActivation;
window.testCSS = testCSS;

// ==================== GESTION DE LA VISIBILITÉ DE LA PAGE ====================
// Mettre en pause/reprendre selon la visibilité de la page
document.addEventListener('visibilitychange', function() {
    if (document.hidden) {
        // Page cachée, mettre en pause
        clearTimeout(resetTimer);
        console.log('⏸️ Détection mise en pause (page cachée)');
    } else {
        // Page visible, reprendre
        if (sequencePosition > 0 && !isKonamiActivated) {
            resetTimer = setTimeout(resetSequence, 5000);
            console.log('▶️ Détection reprise (page visible)');
        }
    }
});