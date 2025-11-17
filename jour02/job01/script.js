// ==================== DÉCLARATION DE FONCTION ====================
// Le mot-clé "function" permet de déclarer une fonction en JavaScript
// "citation" est le nom (identifiant) que nous donnons à cette fonction
// Les parenthèses () indiquent que cette fonction ne prend aucun paramètre
// Une fonction est un bloc de code réutilisable qui peut être appelé plusieurs fois
function citation() {
    // ==================== DÉBUT DU CORPS DE LA FONCTION ====================
    // Tout le code entre les accolades { } constitue le corps de la fonction
    // Ce code s'exécute uniquement quand la fonction est appelée
    
    // ==================== MANIPULATION DU DOM - RÉCUPÉRATION D'ÉLÉMENT ====================
    // "var" est un mot-clé pour déclarer une variable en JavaScript
    // "elementCitation" est le nom de la variable (peut être n'importe quel nom valide)
    // "document" est un objet global qui représente toute la page HTML chargée
    // "getElementById()" est une méthode du DOM pour chercher un élément par son attribut id
    // "citation" est le paramètre passé à la méthode (l'id à rechercher)
    // Cette ligne stocke une référence vers l'élément HTML <article id="citation">
    var elementCitation = document.getElementById("citation");
    
    // ==================== RÉCUPÉRATION DE CONTENU TEXTUEL ====================
    // "elementCitation" fait référence à l'élément trouvé à la ligne précédente
    // ".textContent" est une propriété qui retourne tout le texte contenu dans un élément
    // Cette propriété ignore les balises HTML et ne retourne que le texte pur
    // "var contenuCitation" déclare une nouvelle variable pour stocker ce texte
    // Le résultat sera : "La vie a beaucoup plus d'imagination que nous"
    var contenuCitation = elementCitation.textContent;
    
    // ==================== RÉCUPÉRATION DE LA ZONE D'AFFICHAGE ====================
    // Même principe que plus haut : on récupère un élément par son id
    // "affichage-citation" est l'id de l'élément <div> où on va afficher la citation
    // Cette variable stocke une référence vers la zone d'affichage sur la page
    var zoneAffichage = document.getElementById("affichage-citation");
    
    // ==================== MODIFICATION DU CONTENU DE LA PAGE ====================
    // "zoneAffichage" fait référence à l'élément <div id="affichage-citation">
    // ".textContent" ici est utilisé pour MODIFIER (pas lire) le contenu de l'élément
    // "= contenuCitation" assigne le texte de la citation à la zone d'affichage
    // Cette ligne fait apparaître le texte dans l'élément sur la page web
    zoneAffichage.textContent = contenuCitation;
    
    // ==================== MODIFICATION DU STYLE CSS ====================
    // "zoneAffichage.style" accède aux propriétés de style CSS de l'élément
    // ".display" correspond à la propriété CSS "display"
    // "= 'block'" change la valeur pour rendre l'élément visible
    // Avant cette ligne, l'élément était caché avec "display: none"
    zoneAffichage.style.display = "block";
    
    // ==================== DÉBOGAGE DANS LA CONSOLE ====================
    // "console" est un objet global pour interagir avec la console de développement
    // ".log()" est une méthode pour afficher des messages dans la console du navigateur
    // Ceci est utile pour le débogage et vérifier que le code fonctionne
    // Les deux paramètres seront affichés côte à côte dans la console
    console.log("Citation affichée :", contenuCitation);
    
} // ==================== FIN DE LA FONCTION ====================

// ==================== GESTION DU CHARGEMENT DE LA PAGE ====================
// "window" est un objet global représentant la fenêtre du navigateur
// ".onload" est un événement qui se déclenche quand TOUTE la page est chargée
// "= function()" assigne une fonction anonyme (sans nom) à cet événement
// Cette technique garantit que le DOM est prêt avant d'essayer de le manipuler
window.onload = function() {
    // ==================== FONCTION ANONYME POUR L'INITIALISATION ====================
    // Cette fonction s'exécute automatiquement une seule fois au chargement
    // Elle sert à configurer les événements après que tous les éléments HTML existent
    
    // ==================== RÉCUPÉRATION DU BOUTON ====================
    // Même principe que précédemment : récupération d'un élément par son id
    // "button" est l'id de l'élément <button id="button"> dans le HTML
    // "var bouton" stocke une référence vers ce bouton pour pouvoir le manipuler
    var bouton = document.getElementById("button");
    
    // ==================== ASSIGNATION D'UN GESTIONNAIRE D'ÉVÉNEMENT ====================
    // "bouton" fait référence à l'élément <button> récupéré juste au-dessus
    // ".onclick" est une propriété pour définir ce qui se passe lors d'un clic
    // "= citation" assigne la fonction "citation" à l'événement de clic
    // ATTENTION : pas de parenthèses après "citation" car on assigne la fonction,
    // on ne l'appelle pas immédiatement (citation() l'appellerait tout de suite)
    // Maintenant, chaque clic sur le bouton exécutera la fonction citation()
    bouton.onclick = citation;
    
}; // ==================== FIN DE LA FONCTION ANONYME window.onload ====================

// ==================== RÉSUMÉ DU FLUX D'EXÉCUTION ====================
// 1. Le navigateur charge la page HTML
// 2. Le script JavaScript est lu et analysé
// 3. La fonction citation() est définie (mais pas exécutée)
// 4. Quand la page est complètement chargée, window.onload se déclenche
// 5. La fonction anonyme s'exécute et attache l'événement au bouton
// 6. Quand l'utilisateur clique sur le bouton, citation() s'exécute
// 7. La citation est récupérée et affichée sur la page

// ==================== CONCEPTS JAVASCRIPT UTILISÉS ====================
// - VARIABLES : var pour déclarer des variables locales
// - FONCTIONS : function pour créer des blocs de code réutilisables
// - OBJETS : document, window, console sont des objets avec des méthodes
// - MÉTHODES : getElementById(), log() sont des méthodes d'objets
// - PROPRIÉTÉS : textContent, style, display, onclick sont des propriétés
// - ÉVÉNEMENTS : onload, onclick pour réagir aux actions utilisateur
// - DOM : manipulation des éléments HTML depuis JavaScript
// - ASSIGNATION : = pour donner des valeurs aux variables et propriétés
