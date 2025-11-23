// ==================== DÉCLARATION DE VARIABLE GLOBALE BOOLÉENNE ====================
// Le mot-clé "var" déclare une variable en JavaScript
// "articleVisible" est le nom de la variable (identifiant choisi par le développeur)
// Cette variable est déclarée en DEHORS de toute fonction = VARIABLE GLOBALE
// Les variables globales sont accessibles partout dans le script
// "= false" initialise la variable avec la valeur booléenne false
// Les booléens ne peuvent avoir que deux valeurs : true (vrai) ou false (faux)
// Cette variable sert à suivre l'état de l'article : affiché (true) ou masqué (false)
// Au début, l'article n'est pas affiché, donc la valeur est false
var articleVisible = false;

// ==================== MESSAGE DE CONFIRMATION DU CHARGEMENT ====================
// console.log() affiche un message dans la console du navigateur (F12)
// Cela confirme que le fichier JavaScript a bien été chargé
console.log("✅ Script chargé avec succès !");
console.log("État initial de articleVisible:", articleVisible);

// ==================== DÉCLARATION DE FONCTION ====================
// Le mot-clé "function" permet de déclarer une fonction en JavaScript
// "showhide" est le nom (identifiant) que nous donnons à cette fonction
// Le nom "showhide" signifie "montrer/cacher" en anglais
// Les parenthèses () indiquent que cette fonction ne prend aucun paramètre
// Une fonction est un bloc de code réutilisable qui peut être appelé plusieurs fois
function showhide() {
    // ==================== DÉBUT DU CORPS DE LA FONCTION ====================
    // Tout le code entre les accolades { } constitue le corps de la fonction
    // Ce code s'exécute uniquement quand la fonction est appelée
    
    // Message dans la console pour confirmer que la fonction est appelée
    console.log("🔄 Fonction showhide() appelée");
    console.log("État actuel de articleVisible:", articleVisible);
    
    // ==================== MANIPULATION DU DOM - RÉCUPÉRATION D'ÉLÉMENT ====================
    // "var" déclare une nouvelle variable locale à cette fonction
    // "container" est le nom de la variable (portée locale = existe seulement dans cette fonction)
    // "document" est un objet global qui représente toute la page HTML chargée
    // "getElementById()" est une méthode du DOM pour chercher un élément par son attribut id
    // "container" est le paramètre passé à la méthode (l'id à rechercher dans le HTML)
    // Cette ligne stocke une référence vers l'élément HTML <div id="container">
    // Ce div servira de conteneur où on va ajouter ou supprimer l'article
    var container = document.getElementById("container");
    
    // ==================== STRUCTURE CONDITIONNELLE IF/ELSE ====================
    // Le mot-clé "if" créée une condition en JavaScript
    // "articleVisible" est la variable booléenne déclarée plus haut
    // Cette condition teste la valeur de la variable :
    // - Si articleVisible est true, le bloc dans les { } après if s'exécute
    // - Si articleVisible est false, le bloc dans les { } après else s'exécute
    // Cette structure permet de faire deux actions différentes selon l'état
    if (articleVisible) {
        // ==================== BLOC IF : SUPPRIMER L'ARTICLE ====================
        // Ce bloc s'exécute si articleVisible est true (l'article est actuellement affiché)
        // Objectif : supprimer l'article et mettre à jour l'état
        
        console.log("❌ Article actuellement VISIBLE → On va le CACHER");
        
        // "container" fait référence à l'élément <div id="container"> trouvé plus haut
        // ".innerHTML" est une propriété qui permet de lire ou modifier le contenu HTML
        // "= ''" assigne une chaîne vide (rien) au contenu du conteneur
        // Cette ligne vide complètement le conteneur, supprimant l'article s'il existe
        container.innerHTML = "";
        
        // Mettre à jour l'état de la variable globale
        // "articleVisible = false" change la valeur booléenne
        // Maintenant la variable indique que l'article n'est plus affiché
        // Cette information sera utilisée lors du prochain clic sur le bouton
        articleVisible = false;
        
        console.log("✅ Article supprimé ! Nouvel état:", articleVisible);
        
    } else {
        // ==================== BLOC ELSE : CRÉER ET AFFICHER L'ARTICLE ====================
        // Ce bloc s'exécute si articleVisible est false (l'article n'est pas affiché)
        // Objectif : créer l'article et l'ajouter à la page
        
        console.log("✅ Article actuellement CACHÉ → On va l'AFFICHER");
        
        // "container.innerHTML" accède au contenu HTML du conteneur
        // "= '<article>...'" assigne du code HTML au conteneur
        // "<article>" est une balise sémantique HTML5 pour du contenu autonome
        // Le texte entre <article> et </article> est le contenu à afficher
        // Cette ligne crée dynamiquement un élément article avec le texte demandé
        container.innerHTML = "<article>L'important n'est pas la chute, mais l'atterrissage.</article>";
        
        // Mettre à jour l'état de la variable globale
        // "articleVisible = true" change la valeur booléenne
        // Maintenant la variable indique que l'article est affiché
        // Cette information sera utilisée lors du prochain clic sur le bouton
        articleVisible = true;
        
        console.log("✅ Article créé et affiché ! Nouvel état:", articleVisible);
    }
    // ==================== FIN DE LA STRUCTURE CONDITIONNELLE ====================
    
} // ==================== FIN DE LA FONCTION showhide ====================

// ==================== GESTION DU CHARGEMENT DE LA PAGE ====================
// "window" est un objet global représentant la fenêtre du navigateur
// ".onload" est un événement qui se déclenche quand TOUTE la page est chargée
// "= function()" assigne une fonction anonyme (sans nom) à cet événement
// Cette technique garantit que le DOM est prêt avant d'essayer de le manipuler
window.onload = function() {
    // ==================== FONCTION ANONYME POUR L'INITIALISATION ====================
    // Cette fonction s'exécute automatiquement une seule fois au chargement
    // Elle sert à configurer les événements après que tous les éléments HTML existent
    
    console.log("📄 Page chargée complètement ! Initialisation...");
    
    // ==================== RÉCUPÉRATION DU BOUTON ====================
    // Même principe que précédemment : récupération d'un élément par son id
    // "button" est l'id de l'élément <button id="button"> dans le HTML
    // "var bouton" stocke une référence vers ce bouton pour pouvoir le manipuler
    var bouton = document.getElementById("button");
    
    // Vérification que le bouton existe bien
    if (bouton) {
        console.log("✅ Bouton trouvé avec succès !");
    } else {
        console.error("❌ ERREUR : Bouton avec id='button' introuvable !");
        return; // Arrête l'exécution si le bouton n'existe pas
    }
    
    // ==================== ASSIGNATION D'UN GESTIONNAIRE D'ÉVÉNEMENT ====================
    // "bouton" fait référence à l'élément <button> récupéré juste au-dessus
    // ".onclick" est une propriété pour définir ce qui se passe lors d'un clic
    // "= showhide" assigne la fonction "showhide" à l'événement de clic
    // ATTENTION : pas de parenthèses après "showhide" car on assigne la fonction,
    // on ne l'appelle pas immédiatement (showhide() l'appellerait tout de suite)
    // Maintenant, chaque clic sur le bouton exécutera la fonction showhide()
    bouton.onclick = showhide;
    
    console.log("🔗 Événement onclick attaché au bouton");
    console.log("👆 Cliquez sur le bouton pour afficher/cacher l'article !");
    
}; // ==================== FIN DE LA FONCTION ANONYME window.onload ====================

// ==================== RÉSUMÉ DU FLUX D'EXÉCUTION ====================
// 1. Le navigateur charge la page HTML
// 2. Le script JavaScript est lu et analysé
// 3. La variable "articleVisible" est créée et initialisée à false
// 4. La fonction showhide() est définie (mais pas exécutée)
// 5. Quand la page est complètement chargée, window.onload se déclenche
// 6. La fonction anonyme s'exécute et attache l'événement au bouton
// 7. Quand l'utilisateur clique sur le bouton, showhide() s'exécute :
//    Premier clic : articleVisible = false → ELSE → article créé → articleVisible = true
//    Deuxième clic : articleVisible = true → IF → article supprimé → articleVisible = false
//    Troisième clic : articleVisible = false → ELSE → article créé → articleVisible = true
//    Et ainsi de suite...

// ==================== CONCEPTS JAVASCRIPT UTILISÉS ====================
// - VARIABLES GLOBALES : var articleVisible (accessible partout)
// - VARIABLES LOCALES : var container, var bouton (dans leurs fonctions)
// - TYPES BOOLÉENS : true/false pour représenter un état
// - FONCTIONS : function showhide() pour organiser le code
// - STRUCTURES CONDITIONNELLES : if/else pour prendre des décisions
// - OBJETS : document, window sont des objets avec des méthodes
// - MÉTHODES : getElementById() pour chercher des éléments
// - PROPRIÉTÉS : innerHTML, onclick pour modifier ou configurer
// - ÉVÉNEMENTS : onload, onclick pour réagir aux actions
// - DOM : manipulation des éléments HTML depuis JavaScript
// - LOGIQUE BOOLÉENNE : test de conditions et changement d'état

// ==================== ALGORITHME DE TOGGLE (BASCULEMENT) ====================
// Cette fonction implémente un "toggle" : basculement entre deux états
// État 1 : Article masqué (articleVisible = false)
// État 2 : Article affiché (articleVisible = true)
// À chaque clic, on bascule d'un état à l'autre
// C'est un pattern très courant en programmation pour les interfaces utilisateur

// ==================== POURQUOI CETTE STRUCTURE ? ====================
// - Variable booléenne globale : pour mémoriser l'état entre les clics
// - Fonction séparée : pour organiser le code et le rendre réutilisable
// - Structure if/else : pour gérer les deux comportements possibles
// - window.onload : pour s'assurer que HTML est prêt
// - innerHTML : pour créer/supprimer du contenu dynamiquement
