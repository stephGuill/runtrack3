// ==================== DOCUMENTATION COMPLÈTE DU CODE JOB05 ====================
// 
// OBJECTIF : Créer un footer fixe qui change de couleur selon le pourcentage de scroll
// CONCEPTS : Événements scroll, calcul de pourcentages, manipulation du DOM, colors HSL
//
// ==================== VARIABLES UTILISÉES ====================
// scrollTop : Position verticale actuelle du scroll (nombre en pixels)
// documentHeight : Hauteur totale du document HTML (nombre en pixels)  
// windowHeight : Hauteur visible de la fenêtre (nombre en pixels)
// scrollableHeight : Hauteur qu'on peut réellement scroller (calculée)
// scrollPercent : Pourcentage de progression du scroll (0 à 100)
// hue : Teinte de couleur HSL (0° rouge à 120° vert)
// saturation : Saturation de la couleur HSL (70% fixe)
// lightness : Luminosité de la couleur HSL (50% fixe)

// Message de confirmation du chargement du script
console.log("✅ Script de scroll progressif chargé avec succès !");

// ==================== FONCTION PRINCIPALE DE GESTION DU SCROLL ==================== 
// Cette fonction calcule le pourcentage de scroll et met à jour la couleur du footer
function updateScrollProgress() {
    console.log("📊 Fonction updateScrollProgress() appelée");
    // ==================== ÉTAPE 1 : CALCUL DU POURCENTAGE DE SCROLL ====================
    
    // VARIABLE scrollTop : Récupère la position verticale actuelle du scroll
    // window.scrollY donne la distance en pixels depuis le haut de la page
    // Valeur : 0 quand on est tout en haut, augmente quand on descend
    var scrollTop = window.scrollY;
    
    // VARIABLE documentHeight : Récupère la hauteur totale du document
    // document.documentElement.scrollHeight donne la hauteur complète de la page
    // Inclut tout le contenu, même celui qui n'est pas visible à l'écran
    var documentHeight = document.documentElement.scrollHeight;
    
    // VARIABLE windowHeight : Récupère la hauteur visible de la fenêtre
    // window.innerHeight donne la hauteur de la zone d'affichage du navigateur
    // C'est ce que l'utilisateur voit sans scroller
    var windowHeight = window.innerHeight;
    
    // VARIABLE scrollableHeight : Calcule la hauteur qu'on peut réellement scroller
    // CALCUL : hauteur totale - hauteur visible = distance scrollable
    // Exemple : si la page fait 4096px et la fenêtre 800px, on peut scroller 3296px
    var scrollableHeight = documentHeight - windowHeight;
    
    console.log("📏 Mesures de scroll:");
    console.log("  - scrollTop:", scrollTop, "px");
    console.log("  - documentHeight:", documentHeight, "px");
    console.log("  - windowHeight:", windowHeight, "px");
    console.log("  - scrollableHeight:", scrollableHeight, "px");
    
    // VARIABLE scrollPercent : Calcule le pourcentage de progression
    // FORMULE : (position actuelle / distance scrollable) * 100
    // Math.max(0, ...) : évite les valeurs négatives si scrollTop < 0
    // Math.min(100, ...) : évite les valeurs > 100% si scrollTop > scrollableHeight
    var scrollPercent = Math.min(100, Math.max(0, (scrollTop / scrollableHeight) * 100));
    
    console.log("📊 Pourcentage calculé:", scrollPercent.toFixed(2), "%");
    
    // ==================== ÉTAPE 2 : RÉCUPÉRATION DES ÉLÉMENTS DOM ====================
    
    // SÉLECTION D'ÉLÉMENT : Récupère le footer par son ID
    // document.getElementById() recherche un élément avec l'attribut id="scrollFooter"
    // Retourne l'élément HTML ou null si non trouvé
    var footer = document.getElementById('scrollFooter');
    
    // SÉLECTION D'ÉLÉMENT : Récupère l'élément qui affiche le pourcentage
    // Cet élément contiendra le texte "X%" qui s'affiche dans le footer
    var percentElement = document.getElementById('scrollPercent');
    
    // Vérification que les éléments existent
    if (!footer) {
        console.error("❌ ERREUR : Footer avec id='scrollFooter' introuvable !");
        return;
    }
    if (!percentElement) {
        console.error("❌ ERREUR : Élément avec id='scrollPercent' introuvable !");
        return;
    }
    
    // ==================== ÉTAPE 3 : MISE À JOUR DE L'AFFICHAGE ====================
    
    // MANIPULATION DOM : Met à jour le texte affiché
    // Math.round() : arrondit le pourcentage à l'entier le plus proche
    // textContent : propriété qui modifie le texte à l'intérieur de l'élément
    // Exemple : si scrollPercent = 47.8, affiche "48%"
    var roundedPercent = Math.round(scrollPercent);
    percentElement.textContent = roundedPercent + '%';
    console.log("📝 Affichage mis à jour:", roundedPercent + "%");
    
    // ==================== ÉTAPE 4 : CALCUL DE LA COULEUR PROGRESSIVE ====================
    
    // VARIABLE hue : Calcule la teinte de couleur HSL
    // CONVERSION : pourcentage (0-100) vers degrés de teinte (0-120)
    // FORMULE : (pourcentage / 100) * 120 degrés
    // RÉSULTAT : 0% = 0° (rouge), 50% = 60° (jaune), 100% = 120° (vert)
    var hue = (scrollPercent / 100) * 120;
    
    // CONSTANTE saturation : Saturation fixe de la couleur
    // 70% donne des couleurs vives mais pas trop saturées
    // Valeur entre 0% (gris) et 100% (couleur pure)
    var saturation = 70;
    
    // CONSTANTE lightness : Luminosité fixe de la couleur  
    // 50% donne un bon équilibre entre sombre et clair
    // Valeur entre 0% (noir) et 100% (blanc)
    var lightness = 50;
    
    // ==================== ÉTAPE 5 : APPLICATION DE LA COULEUR ====================
    
    // MANIPULATION CSS : Change la couleur de fond du footer
    // Construit une couleur HSL : hsl(teinte, saturation%, luminosité%)
    // Exemple : hsl(60, 70%, 50%) = jaune à 50% de scroll
    // footer.style.backgroundColor modifie directement le CSS de l'élément
    var hslColor = 'hsl(' + hue + ', ' + saturation + '%, ' + lightness + '%)';
    footer.style.backgroundColor = hslColor;
    console.log("🎨 Couleur appliquée:", hslColor);
    console.log("---");
}

// ==================== FONCTION D'INITIALISATION ====================
// Cette fonction configure tous les écouteurs d'événements
function initScrollProgress() {
    console.log("🔧 Initialisation du système de scroll progressif...");
    
    // ==================== MISE À JOUR INITIALE ====================
    // APPEL DE FONCTION : Exécute updateScrollProgress() une première fois
    // Important en cas de rechargement de page en milieu de scroll
    // Sans cela, le footer resterait rouge même si on est à 50% de la page
    console.log("🔄 Mise à jour initiale...");
    updateScrollProgress();
    
    // ==================== ÉCOUTEUR D'ÉVÉNEMENT SCROLL ====================
    // ÉVÉNEMENT 'scroll' : Se déclenche quand l'utilisateur fait défiler la page
    // window.addEventListener() : attache une fonction à un événement
    // SYNTAXE : addEventListener(typeEvenement, fonctionAAppeler)
    // Chaque fois que l'utilisateur scroll, updateScrollProgress() s'exécute
    window.addEventListener('scroll', updateScrollProgress);
    console.log("🔗 Événement 'scroll' attaché");
    
    // ==================== ÉCOUTEUR D'ÉVÉNEMENT RESIZE ====================
    // ÉVÉNEMENT 'resize' : Se déclenche quand la fenêtre change de taille
    // Important car le redimensionnement modifie windowHeight
    // Si windowHeight change, scrollableHeight change aussi
    // Le pourcentage doit être recalculé pour rester correct
    window.addEventListener('resize', updateScrollProgress);
    console.log("🔗 Événement 'resize' attaché");
    
    console.log("✅ Initialisation terminée avec succès !");
    console.log("📜 Scrollez la page pour voir les changements de couleur !");
}

// ==================== GESTION DU CHARGEMENT DE LA PAGE ====================
// ÉVÉNEMENT 'onload' : Se déclenche quand la page est complètement chargée
// window.onload s'assure que tous les éléments HTML existent avant le JavaScript
// Évite les erreurs getElementById() si les éléments ne sont pas encore créés
window.onload = function() {
    console.log("📄 Page chargée complètement !");
    
    // APPEL DE FONCTION : Lance l'initialisation une fois que tout est prêt
    initScrollProgress();
};

// ==================== ANALYSE TECHNIQUE COMPLÈTE ====================
//
//  BOUCLES UTILISÉES :
// Aucune boucle explicite (for, while) dans ce code
// Mais une "boucle implicite" via les événements qui se répètent
//
//  CONDITIONS UTILISÉES :
// Math.max(0, ...) = condition implicite : "si < 0 alors 0"
// Math.min(100, ...) = condition implicite : "si > 100 alors 100"
//
//  VARIABLES ET LEURS TYPES :
// scrollTop (number) : position en pixels
// documentHeight (number) : hauteur en pixels  
// windowHeight (number) : hauteur en pixels
// scrollableHeight (number) : hauteur calculée en pixels
// scrollPercent (number) : pourcentage de 0 à 100
// hue (number) : degrés de 0 à 120
// saturation (number) : pourcentage fixe à 70
// lightness (number) : pourcentage fixe à 50
// footer (HTMLElement) : référence à l'élément DOM
// percentElement (HTMLElement) : référence à l'élément DOM
//
//  FONCTIONS ET LEUR RÔLE :
// updateScrollProgress() : fonction principale, calcule et applique
// initScrollProgress() : fonction d'initialisation, configure les événements  
// Math.min() : fonction mathématique, retourne la plus petite valeur
// Math.max() : fonction mathématique, retourne la plus grande valeur
// Math.round() : fonction mathématique, arrondit à l'entier
// document.getElementById() : fonction DOM, récupère un élément
// addEventListener() : fonction DOM, attache un événement
//
//  CALCUL DES COULEURS HSL :
// HSL = Hue (teinte), Saturation, Lightness (luminosité)
// Plus intuitive que RGB pour les transitions
// Hue : 0°=rouge, 60°=jaune, 120°=vert, 240°=bleu, 360°=rouge
// Transition fluide en changeant seulement la teinte
//
//  OPTIMISATIONS IMPORTANTES :
// transition CSS (0.1s) évite les changements brusques
// Math.min/max évitent les valeurs aberrantes
// resize listener recalcule si la fenêtre change
// onload évite les erreurs de timing