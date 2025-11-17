// Fonction de tri qui prend un tableau de nombres et un ordre de tri
function tri(numbers, order) {
    // Créer une copie du tableau pour ne pas modifier l'original
    // slice() crée une copie superficielle du tableau 'numbers'
    var tableauCopie = numbers.slice();
    
    // Utiliser la méthode sort() avec une fonction de comparaison personnalisée
    // Condition if pour vérifier si l'ordre demandé est "asc" (ascendant)
    if (order === "asc") {
        // Tri ascendant (croissant) : du plus petit au plus grand
        // sort() prend une fonction de comparaison en paramètre
        tableauCopie.sort(function(a, b) {
            // Si a - b < 0, alors a < b, donc a sera placé avant b
            // Si a - b > 0, alors a > b, donc b sera placé avant a
            // Si a - b = 0, alors a = b, l'ordre reste inchangé
            return a - b; // Si a < b, retourne un nombre négatif (a avant b)
        });
    } 
    // Condition else if pour vérifier si l'ordre demandé est "desc" (descendant)
    else if (order === "desc") {
        // Tri descendant (décroissant) : du plus grand au plus petit
        tableauCopie.sort(function(a, b) {
            // b - a inverse la logique : si b > a, retourne positif (b avant a)
            return b - a; // Si b > a, retourne un nombre positif (b avant a)
        });
    } 
    // Condition else : si l'ordre n'est ni "asc" ni "desc"
    else {
        // Afficher un message d'erreur dans la console
        console.log("Ordre non reconnu. Utilisez 'asc' ou 'desc'.");
        // Retourner le tableau sans modification
        return tableauCopie;
    }
    
    // Retourner le tableau trié
    return tableauCopie;
}

// Fonction pour afficher un tableau de manière lisible
// Paramètres : tableau (array) et nom (string pour identifier le tableau)
function afficherTableau(tableau, nom) {
    // Créer une chaîne de caractères formatée pour l'affichage
    // join(", ") transforme le tableau en string avec virgules comme séparateurs
    // Exemple : [1, 2, 3] devient "1, 2, 3"
    var chaine = nom + " = [" + tableau.join(", ") + "]";
    
    // Afficher la chaîne dans la console du navigateur
    console.log(chaine);
    
    // Ajouter la chaîne sur la page web dans un paragraphe <p>
    // innerHTML += ajoute du contenu HTML à la fin du body
    document.body.innerHTML += "<p>" + chaine + "</p>";
}

// Fonction pour exécuter les tests de la fonction tri
// Cette fonction ne prend aucun paramètre
function executerTests() {
    // Afficher un message de début dans la console
    console.log("=== Tests de la fonction tri ===");
    
    // Ajouter un titre de niveau 2 sur la page web
    document.body.innerHTML += "<h2>Tests de la fonction tri :</h2>";
    
    // Déclaration et initialisation d'un tableau de nombres pour les tests
    // Ce tableau contient des nombres dans le désordre
    var tableauOriginal = [64, 34, 25, 12, 22, 11, 90, 5];
    
    // Appel de la fonction afficherTableau pour montrer le tableau initial
    afficherTableau(tableauOriginal, "Tableau original");
    
    // Ajouter un saut de ligne sur la page web pour séparer visuellement
    document.body.innerHTML += "<br>";
    
    // Test du tri ascendant
    // Appel de la fonction tri avec le tableau et l'ordre "asc"
    // Le résultat est stocké dans la variable tableauAsc
    var tableauAsc = tri(tableauOriginal, "asc");
    
    // Afficher le résultat du tri ascendant
    afficherTableau(tableauAsc, "Tri ascendant (asc)");
    
    // Test du tri descendant
    // Appel de la fonction tri avec le tableau et l'ordre "desc"
    var tableauDesc = tri(tableauOriginal, "desc");
    
    // Afficher le résultat du tri descendant
    afficherTableau(tableauDesc, "Tri descendant (desc)");
    
    // Ajouter un autre saut de ligne pour séparer
    document.body.innerHTML += "<br>";
    
    // Vérifier que le tableau original n'a pas été modifié
    // Cela prouve que notre fonction tri() ne modifie pas le tableau d'origine
    afficherTableau(tableauOriginal, "Tableau original (inchangé)");
    
    document.body.innerHTML += "<br>";
    
    // Tests avec d'autres tableaux pour être plus complet
    // Déclaration d'un deuxième tableau de test avec des doublons
    var tableau2 = [3, 1, 4, 1, 5, 9, 2, 6];
    
    // Afficher le tableau 2 original
    afficherTableau(tableau2, "Tableau 2 original");
    
    // Tester le tri ascendant sur tableau2 et afficher directement
    // Ici on n'utilise pas de variable intermédiaire
    afficherTableau(tri(tableau2, "asc"), "Tableau 2 trié (asc)");
    
    // Tester le tri descendant sur tableau2
    afficherTableau(tri(tableau2, "desc"), "Tableau 2 trié (desc)");
    
    document.body.innerHTML += "<br>";
    
    // Test avec des nombres négatifs pour vérifier la robustesse
    // Ce tableau contient des nombres positifs, négatifs et zéro
    var tableau3 = [-5, 3, -1, 8, -10, 0];
    
    afficherTableau(tableau3, "Tableau 3 original (avec négatifs)");
    afficherTableau(tri(tableau3, "asc"), "Tableau 3 trié (asc)");
    afficherTableau(tri(tableau3, "desc"), "Tableau 3 trié (desc)");
    
    document.body.innerHTML += "<br>";
    
    // Test avec un ordre invalide pour vérifier la gestion d'erreur
    // On passe "invalide" au lieu de "asc" ou "desc"
    var tableauInvalide = tri([5, 2, 8], "invalide");
    
    // Afficher le résultat (devrait être le tableau non modifié)
    afficherTableau(tableauInvalide, "Test ordre invalide");
    
    // Message de fin des tests
    console.log("=== Fin des tests ===");
}

// Attendre que la page soit chargée avant d'exécuter les tests
// window.onload est un événement qui se déclenche quand la page est complètement chargée
window.onload = function() {
    // Cette fonction anonyme s'exécute automatiquement après le chargement
    // Appel de la fonction executerTests() pour lancer tous les tests
    executerTests();
};