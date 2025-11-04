// fonction pour déterminer si une année est bisextille
// paramètre : année (number) - l'année à tester (ex: 2024, 2023, etc.)
function bisextille(annee) {
    // elle est divisible par 4 ET
    // si elle est divisible par 100, elle doit aussi être divisible par 400

    // première condition : verifier si l'année n'est pas divisible par 4
    // l'opérateur % (modulo) retourne le reste de la division
    // si l'année % 4 !== 0, cela signifie que le reste n'est pas 0
    // donc l'année n'est pas divisible par 4
    if (annee % 4 !== 0) {
        // si l'année n'est pas divisible par 4, elle n'est bisextille
        // return arrête l'exécution de la fonctionet retourne la valeur
        return false;
    }
    // condition else if : si l'année est divisible par 4, vérifier si elle n'est pas divisible par 100
    else if (annee % 100 !== 0) {
        // si l'année est divisible par 4 mais pas par 100, elle est bisextille
        //  exemples : 2024, 2020, 2016 (divisibles par 4 mais pas par 100)
        return true;
    } 
    // condition else if : vérifie si l'année est divisible par 400
    else if (annee % 400 === 0) {
        // si l'année est divisible par 100 et par 400, elle est bisextille
        // exemples : 2000, 1600, 2400 (divisibles par 400)
        return true;
    }
    // condition else : dernière possibilité
    else {
        // si l'année est divisible par 100 mais pas par 400, elle n'est pas bisextille
        // exemples :1900, 1800, 2100, (divisibles par 100 mais pas par 400)
        return false;
    }
}
// Tests de la fonction bisextile pour vérifier son bon fonctionnement
// Afficher un message de début dans la console du navigateur
console.log("=== Tests de la fonction bisextile ===");

// Test avec des années bisextiles (qui doivent retourner true)
// console.log() affiche un message dans la console de développement
// L'opérateur + permet de concaténer (joindre) des chaînes de caractères
// bisextile(2024) appelle la fonction avec le paramètre 2024
console.log("2024 est bisextile :", bisextile(2024)); // true (divisible par 4, pas par 100)

// 2000 est divisible par 4, par 100 ET par 400, donc bisextile
console.log("2000 est bisextile :", bisextile(2000)); // true (divisible par 400)

// 1600 est aussi divisible par 400, donc bisextile
console.log("1600 est bisextile :", bisextile(1600)); // true (divisible par 400)

// Test avec des années non bisextiles (qui doivent retourner false)
// 2023 n'est pas divisible par 4, donc pas bisextile
console.log("2023 est bisextile :", bisextile(2023)); // false (pas divisible par 4)

// 1900 est divisible par 4 et 100, mais pas par 400, donc pas bisextile
console.log("1900 est bisextile :", bisextile(1900)); // false (divisible par 100 mais pas par 400)

// 2100 est aussi divisible par 100 mais pas par 400, donc pas bisextile
console.log("2100 est bisextile :", bisextile(2100)); // false (divisible par 100 mais pas par 400)

// Afficher un message de fin des tests
console.log("=== Fin des tests ===");