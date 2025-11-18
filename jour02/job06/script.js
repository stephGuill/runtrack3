// ==================== SÉQUENCE DU CODE KONAMI ====================
// Le code Konami classique : ↑ ↑ ↓ ↓ ← → ← → B A
// Représenté par les codes de touches clavier correspondants
var konamiCode = [
    'ArrowUp',      // ↑ Flèche haut
    'ArrowUp',      // ↑ Flèche haut (répétée)
    'ArrowDown',    // ↓ Flèche bas
    'ArrowDown',    // ↓ Flèche bas (répétée)
    'ArrowLeft',    // ← Flèche gauche
    'ArrowRight',   // → Flèche droite
    'ArrowLeft',    // ← Flèche gauche (répétée)
    'ArrowRight',   // → Flèche droite (répétée)
    'KeyB',         // B (touche B)
    'KeyA'          // A (touche A)
];

// ==================== VARIABLES DE GESTION DE L'ÉTAT ====================
// Tableau pour stocker la séquence de touches tapées par l'utilisateur
var userSequence = [];

// Index pour suivre la progression dans le code Konami
var currentIndex = 0;

// Booléen pour savoir si le code a déjà été activé
var konamiActivated = false;

// ==================== FONCTION DE DÉTECTION DES TOUCHES ====================
// Cette fonction est appelée à chaque frappe de touche
function handleKeyPress(event) {
    // ==================== VÉRIFICATION DE L'ÉTAT D'ACTIVATION ====================
    // Si le code Konami est déjà activé, on arrête la détection
    if (konamiActivated) {
        return;
    }
    
    // ==================== EXTRACTION DE LA TOUCHE PRESSÉE ====================
    // event.code donne le code physique de la touche (indépendant de la langue)
    // Plus fiable que event.key pour les touches directionnelles
    var pressedKey = event.code;
    
    // ==================== VÉRIFICATION DE LA SÉQUENCE ====================
    // On vérifie si la touche pressée correspond à l'étape actuelle du code
    if (pressedKey === konamiCode[currentIndex]) {
        // ==================== PROGRESSION DANS LA SÉQUENCE ====================
        // La touche est correcte, on avance dans la séquence
        currentIndex++;
        
        // Ajouter la touche à la séquence utilisateur pour le debug
        userSequence.push(pressedKey);
        
        // ==================== FEEDBACK VISUEL OPTIONNEL ====================
        // Affichage dans la console pour le debug (optionnel)
        console.log('Progression Konami: ' + currentIndex + '/' + konamiCode.length + 
                   ' - Touche: ' + pressedKey);
        
        // ==================== VÉRIFICATION DE LA SÉQUENCE COMPLÈTE ====================
        // Si toutes les touches ont été pressées dans le bon ordre
        if (currentIndex === konamiCode.length) {
            // ==================== ACTIVATION DU CODE KONAMI ====================
            activateKonami();
        }
    } else {
        // ==================== REMISE À ZÉRO EN CAS D'ERREUR ====================
        // La touche ne correspond pas, on remet tout à zéro
        
        // Vérifier si la touche pressée est le début d'une nouvelle séquence
        if (pressedKey === konamiCode[0]) {
            // La touche est la première du code, on recommence à partir de là
            currentIndex = 1;
            userSequence = [pressedKey];
            console.log('Nouveau début de séquence Konami');
        } else {
            // Remise à zéro complète
            currentIndex = 0;
            userSequence = [];
            console.log('Séquence Konami réinitialisée');
        }
    }
}

// ==================== FONCTION D'ACTIVATION DU THÈME LA PLATEFORME_ ====================
function activateKonami() {
    // ==================== MARQUAGE DE L'ACTIVATION ====================
    // Empêcher les activations multiples
    konamiActivated = true;
    
    // ==================== TRANSFORMATION VISUELLE DE LA PAGE ====================
    // Ajout de la classe CSS qui active tous les styles La Plateforme_
    document.body.classList.add('konami-activated');
    
    // ==================== SUPPRESSION DE L'INDICE ====================
    // Cacher l'indice une fois le code découvert
    var hint = document.querySelector('.konami-hint');
    if (hint) {
        hint.style.display = 'none';
    }
    
    // ==================== FEEDBACK SONORE OPTIONNEL ====================
    // Création d'un effet sonore basique (optionnel)
    try {
        // Tentative de création d'un bip sonore avec l'API Audio
        var audioContext = new (window.AudioContext || window.webkitAudioContext)();
        var oscillator = audioContext.createOscillator();
        var gainNode = audioContext.createGain();
        
        oscillator.connect(gainNode);
        gainNode.connect(audioContext.destination);
        
        oscillator.frequency.value = 800; // Fréquence en Hz
        gainNode.gain.setValueAtTime(0.1, audioContext.currentTime);
        gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.5);
        
        oscillator.start();
        oscillator.stop(audioContext.currentTime + 0.5);
    } catch (e) {
        // En cas d'erreur avec l'audio, on continue sans son
        console.log('Audio non disponible');
    }
    
    // ==================== MESSAGES DE FÉLICITATIONS ====================
    console.log('🎉 CODE KONAMI ACTIVÉ ! 🎉');
    console.log('Bienvenue dans l\'univers de La Plateforme_ !');
    console.log('Séquence complète :', userSequence.join(' → '));
    
    // ==================== ANIMATION SPÉCIALE OPTIONNELLE ====================
    // Déclenchement d'effets visuels supplémentaires
    createConfetti();
}

// ==================== FONCTION D'EFFETS CONFETTI ====================
function createConfetti() {
    // Création d'éléments confetti animés pour célébrer l'activation
    for (let i = 0; i < 50; i++) {
        setTimeout(() => {
            var confetti = document.createElement('div');
            confetti.style.position = 'fixed';
            confetti.style.left = Math.random() * 100 + 'vw';
            confetti.style.top = '-10px';
            confetti.style.width = '10px';
            confetti.style.height = '10px';
            confetti.style.background = getRandomColor();
            confetti.style.borderRadius = '50%';
            confetti.style.pointerEvents = 'none';
            confetti.style.zIndex = '9999';
            confetti.style.animation = 'fall 3s linear forwards';
            
            // Ajout de l'animation CSS dynamiquement
            if (!document.getElementById('confetti-style')) {
                var style = document.createElement('style');
                style.id = 'confetti-style';
                style.textContent = `
                    @keyframes fall {
                        0% { transform: translateY(-10px) rotate(0deg); opacity: 1; }
                        100% { transform: translateY(100vh) rotate(360deg); opacity: 0; }
                    }
                `;
                document.head.appendChild(style);
            }
            
            document.body.appendChild(confetti);
            
            // Suppression automatique après l'animation
            setTimeout(() => {
                if (confetti.parentNode) {
                    confetti.parentNode.removeChild(confetti);
                }
            }, 3000);
        }, i * 50);
    }
}

// ==================== FONCTION DE COULEUR ALÉATOIRE ====================
function getRandomColor() {
    var colors = ['#667eea', '#764ba2', '#f093fb', '#f5576c', '#4facfe', '#00f2fe'];
    return colors[Math.floor(Math.random() * colors.length)];
}

// ==================== FONCTION DE RÉINITIALISATION ====================
function resetKonami() {
    // Fonction pour réinitialiser l'état (utile pour le debug)
    currentIndex = 0;
    userSequence = [];
    konamiActivated = false;
    document.body.classList.remove('konami-activated');
    
    var hint = document.querySelector('.konami-hint');
    if (hint) {
        hint.style.display = 'block';
    }
    
    console.log('Code Konami réinitialisé');
}

// ==================== INITIALISATION DES ÉCOUTEURS D'ÉVÉNEMENTS ====================
function initKonamiDetection() {
    // ==================== ÉCOUTEUR PRINCIPAL POUR LES TOUCHES ====================
    // keydown est préférable à keypress pour les touches directionnelles
    document.addEventListener('keydown', handleKeyPress);
    
    // ==================== ÉCOUTEUR POUR LA RÉINITIALISATION (DEBUG) ====================
    // Combinaison Ctrl+R pour réinitialiser (utile pendant le développement)
    document.addEventListener('keydown', function(event) {
        if (event.ctrlKey && event.code === 'KeyR' && konamiActivated) {
            event.preventDefault();
            resetKonami();
        }
    });
    
    // ==================== MESSAGE D'INITIALISATION ====================
    console.log('🎮 Détection du code Konami initialisée');
    console.log('Code attendu :', konamiCode.join(' → '));
    console.log('Essayez : ↑ ↑ ↓ ↓ ← → ← → B A');
}

// ==================== GESTION DU CHARGEMENT DE LA PAGE ====================
// Attendre que la page soit complètement chargée avant d'initialiser
window.onload = function() {
    // Initialisation de la détection du code Konami
    initKonamiDetection();
    
    // Message de bienvenue dans la console
    console.log('📄 Page chargée - Prêt pour le code Konami !');
    console.log('💡 Indice : Utilisez les flèches directionnelles, puis B et A');
};

// ==================== ANALYSE TECHNIQUE DÉTAILLÉE ====================
// 
// GESTION DE LA SÉQUENCE :
// • Utilisation d'un tableau pour stocker la séquence exacte
// • Index pour suivre la progression de l'utilisateur
// • Remise à zéro intelligente qui détecte un nouveau début
//
// DÉTECTION DES TOUCHES :
// • event.code au lieu de event.key pour la fiabilité
// • keydown au lieu de keypress pour les touches directionnelles
// • Gestion des erreurs avec reset automatique
//
// ACTIVATION PROGRESSIVE :
// • Vérification étape par étape de la séquence
// • Feedback dans la console pour le debug
// • Activation unique avec protection contre les répétitions
//
// EFFETS VISUELS :
// • Transformation CSS avec classes dynamiques
// • Animations et transitions fluides
// • Effets confetti créés dynamiquement
//
// BONNES PRATIQUES :
// • Code modulaire avec fonctions séparées
// • Gestion d'erreurs pour l'audio
// • Nettoyage automatique des éléments temporaires
// • Messages de debug informatifs