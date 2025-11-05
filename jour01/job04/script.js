// fonction pour déterminer si une année est bisextille
// paramètre : année (number) - l'année à tester (ex: 2024, 2023, etc.)
function bisextille(annee) {
    // elle est divisible par 4 ET
    // si elle est divisible par 100, elle doit aussi être divisible par 400

    // première condition : verifier si l'année n'est pas divisible par 4
    // l'opérateur % (modulo) retourne le reste de la division
    // si l'année % 4 !== 0, cela signifie que le reste n'est pas 0
    // donc l'année n'est pas divisible par 4
    if ((annee % 4 === 0 && annee % 100 !==0) || (annee % 400 === 0)) {
        // si l'année n'est pas divisible par 4, elle n'est bisextille
        // return arrête l'exécution de la fonction et retourne la valeur
        return true;
    } else {
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
console.log("2024", bisextille(2024)); // true (divisible par 4, pas par 100)

// 2000 est divisible par 4, par 100 ET par 400, donc bisextile
console.log("2000", bisextille(2000)); // true (divisible par 400)

// 1600 est aussi divisible par 400, donc bisextile
console.log("1600", bisextille(1600)); // true (divisible par 400)

// Test avec des années non bisextiles (qui doivent retourner false)
// 2023 n'est pas divisible par 4, donc pas bisextile
console.log("2023", bisextille(2023)); // false (pas divisible par 4)

// 1900 est divisible par 4 et 100, mais pas par 400, donc pas bisextile
console.log("1900", bisextille(1900)); // false (divisible par 100 mais pas par 400)

// 2100 est aussi divisible par 100 mais pas par 400, donc pas bisextile
console.log("2100", bisextille(2100)); // false (divisible par 100 mais pas par 400)

// Afficher un message de fin des tests
console.log("=== Fin des tests ===");