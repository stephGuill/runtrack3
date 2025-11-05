// fonction pour afficher les jours dela semaine
// fonction qui ne prend aucun paramètre (les parenthèses sont vides)
function afficherjourssemaines() {
    // création d'un tableau contenant les jours de la semaine du lundi au dimanche
    // var déclare une variable locale à la fonction
    // les crochets [] créent un tableau (array) en JavaScript
    // chaque élément du tableau est une chaîne de caractères (string) entre guillemets
    // les éléments sont séparés par des virgules
    var jourssemaines = ["lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"];

    // affichage dans la console du navigateur
    // console.log() affiche un message dans la console de développement
    console.log("=== Affichage des jours de la semaine ===");

    // boucle for pour parcourir et afficher chaque jour du tableau
    // var i = 0 : initialisation de la variable de boucle (compteur) à 0
    // i < jourssemaines.lenght : condition de continuation de la boucle
    //   - jourssemaine.lenght retourne le nombre d'éléments dans le tableau (ici 7)
    //   -la boucle continue tant que i de 1 est strictement inférieur à la taille du tableau
    // i++ : incrémentation (augmente i de 1 à chaque tour de boucle)
    for (var i = 0; i < jourssemaines.length; i++) {
        // afficher le jour actuel dans la console
        // jourssemaines[i] accède à l'élément du tableau à l'index i
        // index 0 = "lundi", index 1 = "mardi", etc.
        console.log(jourssemaines[i]);

        // affichage sur la page web
        // document.body fait référence à l'élément <body> de la page HTML
        // innerHTML += ajoute du contenu HTML à la fin du contenu existant
        // "<p>" + jourssemaines[i] + "<p>" crée une balise paragraphe contenant le jour
        // l'opérateur + permet de concaténer (joindre) des chaînes de caractères
        document.body.innerHTML += "<p>" + jourssemaines[i] + "<p>";
    }

    // afficher un message de fin dans la console
    console .log("=== Fin de l'affichage ===");
}

// attendre que la page soit chargée avant d'exécuter la fonction
// window.onload est un événement JavaScript qui se déclenche automatiquement
// quand tous les éléments de la page HTML sont complètement chargés et affichés
window.onload = function() {
    // cette fonction anonyme (fonction sans nom) s'exécute quand l'événement onload se produit
    // function() sans nom entre les accolades définit une fonction anonyme
    // appelde la fonction afficherjourssemaines() pour lancer l'affichage des jours
    // cela garantit que le DOM (Document Object Model) est prêt avant d'essayer
    // de modifier le contenu de la page avec document.body.innerHTML
    afficherjourssemaines();
}