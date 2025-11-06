// fonction qui vérifie si une date est un jour travaillé
// paramètre : date (objet Date JavaScript) - la date à analyser
function jourtravaille(date) {
    // extraire le jour, mois et année de la date
    // getDate() retourne le jour du mois (1-31)
    var jour = date.getDate();

    // getMonth() retourne le mois (0-11), donc on ajoute 1 pour avoir (1-12)
    // Janvier = 0, Février = 1, ..., Décembre = 11 en JavaScript
    var mois = date.getMonth() + 1;  
    // les mois commencent à 0 en JavaScript

    // getFullYear() retourne l'année complète (ex: 2020)
    var annee = date.getFullYear();

    // tableau des jours fériés de 2020 (format: "jour/mois")
    // ce tableau contient tous les jours fériés officiels français pour l'année 2020
    // chaque élément est une chaîne de caractère au format "jour/mois"
    var joursFeries2020 = [
        "1/1",
        "13/4",
        "1/5",
        "8/5",
        "21/5",
        "1/6",
        "14/7",
        "15/8",
        "1/11",
        "11/11",
        "25/12"
     ];

    //  créer la chaîne de date au format "jour/mois" pour comparaison
    //  on concatène le jour=14 et mois=7, dateStr sera "14/7"
    var dateStr =jour + "/" + mois;
    var message = "";

    // vérifier si c'est un jour férié de l'année 2020
    // première condition : l'année doit être exactement 2020
    // deuxième condition : la date (format "jour/mois") doit être dans le tableau
    // indexOf() retourne l'index de l'élément s'il existe, ou -1 s'il n'existe pas
    // !== -1 signifie "différent de -1", donc "trouvé dans le tableau"
    if (annee === 2020 && joursFeries2020.indexOf(dateStr) !== -1) {
        // construction du message pour jour férié
        // concaténation de chaînes avec l'opérateur +
        message = "Le" + jour + " " + mois + " " + annee + " est un jour férié";
    }

    // Condition else if pour vérifier si c'est un week-end
    // getDay() retourne le jour de la semaine : 0=dimanche, 1=lundi, ..., 6=samedi
    // L'opérateur || signifie "OU logique"
    else if (date.getDay() === 0 || date.getDay() === 6) {
        // construction du message pour week-end
        message = "Nom" + jour + " " + mois + " " + annee + "est un week-end";
    }
    // condition else : si ce n'est ni un jur férié ni un week-end
    else {
        // construction du message pour jour travaillé
        message = "Oui" + jour + " "+ mois + " " + annee + " est un jour travaillé";
    }

    // afficher dans la console et sur la page
    // console.log() affiche le message dans la console de développement du navigateur
    console.log(message);

     // document.body fait référence à l'élément <body> de la page HTML
    // innerHTML += ajoute du contenu HTML à la fin du contenu existant
    // On encapsule le message dans une balise <p> pour créer un paragraphe
    document.body.innerHTML += "<p>" + message + "</p>";    
} 

// fonction pour exécuter les tests de la fonction jourtravaille
// cette fonction ne prend aucun paramètre
function executerTests() {
    // affiche un message de début dans la console
    console.log(" === Tests de la fonction jourtravaille ===");

    // ajouter un titre de niveau 2 sur la page web
    // document.body.innerHTML += ajoute du contenu HTML à la page
    document.body.innerHTML += "<h2>Tests de la fonction jourtravaille :</h2>";

    // Test avec des jours fériés de 2020
    // new Date(année, mois-1, jour) crée un objet Date
    // ATTENTION : les mois dans le constructeur Date commencent à 0
    // Donc new Date(2020, 0, 1) = 1er janvier 2020
    jourtravaille(new Date(2020, 0, 1)); 
    // 1er janvier 2020 (Jour de l'An)

    // new Date(2020, 4, 1) = 1er mai 2020 (mois 4 = mai car janvier=0)
    jourtravaille(new Date(2020, 4, 1));   
    // 1er mai 2020 (Fête du Travail)
    
    // new Date(2020, 6, 14) = 14 juillet 2020 (mois 6 = juillet)
    jourtravaille(new Date(2020, 6, 14));  
    // 14 juillet 2020 (Fête nationale)

     // new Date(2020, 11, 25) = 25 décembre 2020 (mois 11 = décembre)
    jourtravaille(new Date(2020, 11, 25)); 
    // 25 décembre 2020 (Noël)
    // Test avec des week-ends
    // new Date(2020, 5, 6) = 6 juin 2020 (mois 5 = juin)
    // Cette date tombe un samedi (jour 6 de la semaine)
    jourtravaille(new Date(2020, 5, 6));   
    // 6 juin 2020 (samedi)

     // new Date(2020, 5, 7) = 7 juin 2020 
    // Cette date tombe un dimanche (jour 0 de la semaine)
    jourtravaille(new Date(2020, 5, 7));   
    // 7 juin 2020 (dimanche)

    // Test avec des jours travaillés
    // new Date(2020, 5, 8) = 8 juin 2020
    // Cette date tombe un lundi (jour 1 de la semaine)
    jourtravaille(new Date(2020, 5, 8));   
    // 8 juin 2020 (lundi)

    // new Date(2020, 5, 9) = 9 juin 2020
    // Cette date tombe un mardi (jour 2 de la semaine)
    jourtravaille(new Date(2020, 5, 9));   
    // 9 juin 2020 (mardi)

     // Test avec une autre année
    // new Date(2021, 0, 1) = 1er janvier 2021
    // Même si c'est le 1er janvier, ce n'est pas 2020 donc pas dans notre liste
    jourtravaille(new Date(2021, 0, 1));   
    // 1er janvier 2021 (pas dans la liste 2020)

    // Afficher un message de fin des tests dans la console
    console.log("=== Fin des tests ===");
}

// Attendre que la page soit chargée avant d'exécuter les tests
// window.onload est un événement JavaScript qui se déclenche automatiquement
// quand tous les éléments de la page HTML sont complètement chargés et affichés
window.onload = function() {
    // Cette fonction anonyme (sans nom) s'exécute quand l'événement onload se produit
    // Appel de la fonction executerTests() pour lancer tous les tests
    // Cela garantit que le DOM (Document Object Model) est prêt avant d'essayer
    // de modifier le contenu de la page avec document.body.innerHTML
    executerTests();
};
