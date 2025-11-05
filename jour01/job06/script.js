// Fonction FizzBuzz qui ne prend pas de paramètre
// FizzBuzz est un jeu de programmation classique
function fizzbuzz() {
    // Afficher un message de début dans la console du navigateur
    console.log("=== Jeu FizzBuzz de 1 à 151 ===");
    
    // Boucle for pour parcourir les nombres de 1 à 151 inclus
    // var i = 1 : initialisation de la variable de boucle à 1
    // i <= 151 : condition de continuation (tant que i est inférieur ou égal à 151)
    // i++ : incrémentation (augmente i de 1 à chaque tour de boucle)
    for (var i = 1; i <= 151; i++) {
        // Déclaration d'une variable pour stocker le résultat à afficher
        var resultat = "";
        
        // Vérifier si le nombre est multiple de 3 ET de 5 (donc multiple de 15)
        // L'opérateur % (modulo) retourne le reste de la division
        // Si i % 3 === 0, cela signifie que i est divisible par 3 (reste = 0)
        // L'opérateur && signifie "ET logique" : les deux conditions doivent être vraies
        if (i % 3 === 0 && i % 5 === 0) {
            // Si le nombre est divisible par 3 ET par 5, afficher "FizzBuzz"
            resultat = "FizzBuzz";
        }
        // Condition else if : vérifier si le nombre est multiple de 3 uniquement
        // Cette condition ne s'exécute que si la condition précédente était fausse
        else if (i % 3 === 0) {
            // Si le nombre est divisible par 3 seulement, afficher "Fizz"
            resultat = "Fizz";
        }
        // Condition else if : vérifier si le nombre est multiple de 5 uniquement
        else if (i % 5 === 0) {
            // Si le nombre est divisible par 5 seulement, afficher "Buzz"
            resultat = "Buzz";
        }
        // Condition else : si aucune des conditions précédentes n'est vraie
        else {
            // Si le nombre n'est divisible ni par 3 ni par 5, afficher le nombre lui-même
            resultat = i;
        }
        
        // Afficher le résultat dans la console ET sur la page web
        // console.log() affiche dans la console de développement du navigateur
        console.log(resultat);
        
        // document.body fait référence à l'élément <body> de la page HTML
        // innerHTML += ajoute du contenu HTML à la fin du contenu existant
        // On encapsule le résultat dans une balise <p> pour créer un paragraphe
        document.body.innerHTML += "<p>" + resultat + "</p>";
    }
    
    // Afficher un message de fin dans la console
    console.log("=== Fin du jeu FizzBuzz ===");
}

// Attendre que la page soit chargée avant d'exécuter la fonction
// window.onload est un événement JavaScript qui se déclenche automatiquement
// quand tous les éléments de la page HTML sont complètement chargés
window.onload = function() {
    // Cette fonction anonyme (sans nom) s'exécute quand l'événement onload se produit
    // Appel de la fonction fizzbuzz() pour lancer le jeu
    // Cela garantit que le DOM (Document Object Model) est prêt avant d'essayer
    // de modifier le contenu de la page avec document.body.innerHTML
    fizzbuzz();
};