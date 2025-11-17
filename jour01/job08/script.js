// Fonction pour vérifier si un nombre est premier
// Paramètre : nombre (number) - le nombre à tester
function estPremier(nombre) {
    // Un nombre premier doit être supérieur à 1
    // Les nombres 0, 1 et les nombres négatifs ne sont pas premiers
    if (nombre <= 1) {
        return false; // Retourner false si le nombre est <= 1
    }
    
    // 2 est le seul nombre premier pair
    // C'est un cas spécial car tous les autres nombres pairs sont divisibles par 2
    if (nombre === 2) {
        return true; // 2 est premier
    }
    
    // Les nombres pairs ne peuvent pas être premiers (sauf 2)
    // Si nombre % 2 === 0, cela signifie que le nombre est divisible par 2
    if (nombre % 2 === 0) {
        return false; // Le nombre est pair et différent de 2, donc pas premier
    }
    
    // Vérifier les diviseurs impairs jusqu'à la racine carrée du nombre
    // Math.sqrt() calcule la racine carrée du nombre
    // On teste seulement jusqu'à √nombre car si un nombre a un diviseur > √nombre,
    // il doit aussi avoir un diviseur correspondant < √nombre
    for (var i = 3; i <= Math.sqrt(nombre); i += 2) {
        // i += 2 permet de tester seulement les nombres impairs (3, 5, 7, 9, ...)
        // L'opérateur % retourne le reste de la division
        if (nombre % i === 0) {
            return false; // Le nombre a un diviseur, donc il n'est pas premier
        }
    }
    
    return true; // Le nombre est premier (aucun diviseur trouvé)
}

// Fonction qui calcule la somme de deux nombres s'ils sont tous les deux premiers
// Paramètres : nombre1 (number) et nombre2 (number) - les deux nombres à vérifier
function sommenombrespremiers(nombre1, nombre2) {
    // Vérifier si les deux nombres sont premiers
    // L'opérateur && (ET logique) : les deux conditions doivent être vraies
    // estPremier(nombre1) retourne true/false, même chose pour estPremier(nombre2)
    if (estPremier(nombre1) && estPremier(nombre2)) {
        // Si les deux nombres sont premiers, retourner leur somme
        // L'opérateur + additionne les deux nombres
        return nombre1 + nombre2; // Retourner la somme
    } else {
        // Si au moins un des nombres n'est pas premier
        // La condition else s'exécute quand le if est faux
        return false; // Au moins un des nombres n'est pas premier
    }
}

// Fonction pour exécuter les tests de la fonction sommenombrespremiers
// Cette fonction ne prend aucun paramètre
function executerTests() {
    // Afficher un message de début dans la console du navigateur
    console.log("=== Tests de la fonction sommenombrespremiers ===");
    
    // Ajouter un titre de niveau 2 sur la page web
    // document.body fait référence à l'élément <body> de la page HTML
    // innerHTML += ajoute du contenu HTML à la fin du body existant
    document.body.innerHTML += "<h2>Tests de la fonction sommenombrespremiers :</h2>";
    
    // Tests avec des nombres premiers
    // Déclaration d'une variable pour stocker le résultat du test
    // Appel de la fonction sommenombrespremiers avec les paramètres 3 et 5
    var resultat1 = sommenombrespremiers(3, 5);
    
    // Créer une chaîne de caractères pour afficher le résultat
    // L'opérateur + permet de concaténer (joindre) des chaînes de caractères
    var message1 = "sommenombrespremiers(3, 5) = " + resultat1 + " (3 et 5 sont premiers)";
    
    // Afficher le message dans la console
    console.log(message1);
    
    // Afficher le message sur la page web dans un paragraphe <p>
    document.body.innerHTML += "<p>" + message1 + "</p>";
    
    // Deuxième test avec d'autres nombres premiers
    var resultat2 = sommenombrespremiers(7, 11);
    var message2 = "sommenombrespremiers(7, 11) = " + resultat2 + " (7 et 11 sont premiers)";
    console.log(message2);
    document.body.innerHTML += "<p>" + message2 + "</p>";
    
    // Troisième test avec 2 et 13 (2 est le seul nombre premier pair)
    var resultat3 = sommenombrespremiers(2, 13);
    var message3 = "sommenombrespremiers(2, 13) = " + resultat3 + " (2 et 13 sont premiers)";
    console.log(message3);
    document.body.innerHTML += "<p>" + message3 + "</p>";
    
    // Tests avec des nombres non premiers
    // Premier test : 4 n'est pas premier (divisible par 2), mais 7 est premier
    var resultat4 = sommenombrespremiers(4, 7);
    var message4 = "sommenombrespremiers(4, 7) = " + resultat4 + " (4 n'est pas premier)";
    console.log(message4);
    document.body.innerHTML += "<p>" + message4 + "</p>";
    
    // Deuxième test : 3 est premier, mais 8 n'est pas premier (divisible par 2 et 4)
    var resultat5 = sommenombrespremiers(3, 8);
    var message5 = "sommenombrespremiers(3, 8) = " + resultat5 + " (8 n'est pas premier)";
    console.log(message5);
    document.body.innerHTML += "<p>" + message5 + "</p>";
    
    // Troisième test : ni 6 ni 9 ne sont premiers
    // 6 est divisible par 2 et 3, 9 est divisible par 3
    var resultat6 = sommenombrespremiers(6, 9);
    var message6 = "sommenombrespremiers(6, 9) = " + resultat6 + " (ni 6 ni 9 ne sont premiers)";
    console.log(message6);
    document.body.innerHTML += "<p>" + message6 + "</p>";
    
    // Tests avec des cas particuliers
    // Test avec le nombre 1 qui n'est pas considéré comme premier par définition
    var resultat7 = sommenombrespremiers(1, 2);
    var message7 = "sommenombrespremiers(1, 2) = " + resultat7 + " (1 n'est pas considéré comme premier)";
    console.log(message7);
    document.body.innerHTML += "<p>" + message7 + "</p>";
    
    // Afficher un message de fin des tests dans la console
    console.log("=== Fin des tests ===");
}

// Attendre que la page soit chargée avant d'exécuter les tests
// window.onload est un événement qui se déclenche automatiquement
// quand tous les éléments de la page HTML sont complètement chargés
window.onload = function() {
    // Cette fonction anonyme (sans nom) s'exécute quand l'événement se produit
    // Appel de la fonction executerTests() pour lancer tous les tests
    // Cela garantit que le DOM (structure HTML) est prêt avant manipulation
    executerTests();
};