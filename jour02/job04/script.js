// Message de confirmation du chargement du script
console.log("✅ Script keylogger chargé avec succès !");

// ==================== DÉCLARATION DE FONCTION PRINCIPALE ====================
// Le mot-clé "function" déclare une fonction nommée en JavaScript
// "setupKeylogger" est le nom choisi pour cette fonction d'initialisation
// Cette fonction encapsule toute la logique de capture des touches clavier
// Elle sera appelée une seule fois au chargement de la page pour configurer le système
// L'organisation en fonction permet de garder le code propre et réutilisable
function setupKeylogger() {
    console.log("🔧 Initialisation du keylogger...");
    
    // ==================== RÉCUPÉRATION DE L'ÉLÉMENT TEXTAREA ====================
    // "var" déclare une variable locale à cette fonction
    // "textarea" est le nom de la variable (choisi pour sa clarté)
    // "document" est l'objet global représentant le document HTML chargé
    // "getElementById()" est une méthode DOM pour chercher un élément par son attribut id
    // "keylogger" est l'id exact du textarea défini dans le HTML
    // Cette ligne stocke une référence vers l'élément <textarea id="keylogger">
    // Cette référence sera utilisée plus tard pour vérifier le focus et modifier le contenu
    var textarea = document.getElementById("keylogger");
    
    // Vérifier que l'élément existe
    if (!textarea) {
        console.error("❌ ERREUR : Textarea avec id='keylogger' introuvable !");
        return;
    }
    console.log("✅ Textarea trouvé avec succès !");
    
    // ==================== AJOUT D'UN ÉCOUTEUR D'ÉVÉNEMENT GLOBAL ====================
    // "document" représente TOUT le document HTML (capture globale)
    // ".addEventListener()" est la méthode moderne pour attacher des événements
    // "keypress" est le type d'événement à écouter (quand une touche est pressée)
    // Différence importante avec onclick : keypress capture TOUTES les touches du clavier
    // "function(event)" est une fonction anonyme qui recevra l'objet événement
    // "event" contient toutes les informations sur la touche pressée
    // L'événement sur "document" signifie que peu importe où est le focus, on capturera les touches
    // Cette approche permet de surveiller le clavier même si l'utilisateur tape ailleurs
    document.addEventListener("keypress", function(event) {
        // ==================== EXTRACTION DU CARACTÈRE TAPÉ ====================
        // "event" est l'objet événement passé automatiquement par le navigateur
        // ".key" est une propriété moderne qui contient le caractère exact tapé
        // Par exemple : si l'utilisateur tape "a", event.key vaudra "a"
        // Si l'utilisateur tape "A" (avec Shift), event.key vaudra "A"
        // Cette propriété est plus fiable que les anciennes méthodes (keyCode, charCode)
        // "var char" stocke le caractère pour pouvoir le manipuler ensuite
        var char = event.key;
        
        console.log("⌨️ Touche pressée:", char);
        
        // ==================== VALIDATION : FILTRAGE DES LETTRES UNIQUEMENT ====================
        // ".match()" est une méthode des chaînes de caractères pour tester des motifs
        // "/[a-zA-Z]/" est une expression régulière (regex) qui signifie :
        //   - Les / délimitent le début et la fin de la regex
        //   - Les [ ] définissent un ensemble de caractères autorisés
        //   - a-z signifie toutes les lettres minuscules de a à z
        //   - A-Z signifie toutes les lettres majuscules de A à Z
        // Cette condition filtre UNIQUEMENT les lettres, excluant :
        //   - Les chiffres (0-9)
        //   - Les symboles (!, @, #, etc.)
        //   - Les touches spéciales (Entrée, Espace, Flèches, etc.)
        // Le "if" n'exécute le bloc suivant QUE si c'est une lettre
        if (char.match(/[a-zA-Z]/)) {
            console.log("✅ C'est une lettre valide !");
            
            // ==================== NORMALISATION : CONVERSION EN MINUSCULE ====================
            // ".toLowerCase()" est une méthode qui convertit une chaîne en minuscules
            // Cette normalisation uniformise le traitement : "A" devient "a", "B" devient "b"
            // Cela simplifie la logique et assure une cohérence visuelle dans le textarea
            // Peu importe si l'utilisateur tape en majuscule ou minuscule, le résultat sera en minuscule
            // "char = char.toLowerCase()" réassigne la version minuscule à la variable char
            char = char.toLowerCase();
            console.log("🔄 Conversion en minuscule:", char);
            
            // ==================== DÉTECTION DU FOCUS : ÉLÉMENT ACTUELLEMENT ACTIF ====================
            // "document.activeElement" est une propriété qui retourne l'élément ayant le focus
            // Le focus détermine quel élément reçoit les événements clavier par défaut
            // Par exemple : si l'utilisateur clique dans un input, cet input aura le focus
            // "=== textarea" compare l'élément actif avec notre textarea spécifique
            // L'opérateur === est une comparaison stricte (même objet en mémoire)
            // "var isTextareaFocused" stocke le résultat booléen (true/false)
            // Cette variable nous indique si l'utilisateur tape "dans" le textarea ou "ailleurs"
            var isTextareaFocused = (document.activeElement === textarea);
            console.log("📍 Focus sur le textarea ?", isTextareaFocused);
            
            // ==================== LOGIQUE CONDITIONNELLE : COMPORTEMENT DIFFÉRENTIEL ====================
            // Structure if/else pour implémenter le comportement différent selon le focus
            // Cette condition teste la valeur booléenne calculée juste au-dessus
            if (isTextareaFocused) {
                // ==================== CAS 1 : FOCUS SUR LE TEXTAREA (DOUBLE AJOUT) ====================
                // Ce bloc s'exécute quand l'utilisateur tape directement dans le textarea
                // "textarea.value" est la propriété qui contient tout le texte du textarea
                // "+=" est l'opérateur de concaténation/addition qui ajoute à la fin
                // "char + char" concatène le caractère avec lui-même (duplication)
                // Exemple : si char = "a", alors char + char = "aa"
                // Cette ligne ajoute donc la lettre DEUX FOIS au contenu existant
                // Résultat : si l'utilisateur tape "hello" dans le textarea, il obtiendra "hheelllloo"
                textarea.value += char + char;
                console.log("➕➕ Ajout DOUBLE de la lettre (focus dans textarea):", char + char);
            } else {
                // ==================== CAS 2 : FOCUS AILLEURS (AJOUT SIMPLE) ====================
                // Ce bloc s'exécute quand l'utilisateur tape n'importe où SAUF dans le textarea
                // Même principe que ci-dessus mais avec un seul caractère
                // "textarea.value += char" ajoute la lettre une seule fois
                // Cela permet de "capturer" les lettres même quand l'utilisateur tape ailleurs
                // Exemple : si l'utilisateur tape dans un autre input, les lettres apparaissent quand même
                // dans le textarea, mais une seule fois chacune
                textarea.value += char;
                console.log("➕ Ajout SIMPLE de la lettre (focus ailleurs):", char);
            }
            console.log("📝 Contenu actuel du textarea:", textarea.value);
        } else {
            console.log("❌ Caractère ignoré (pas une lettre)");
        }
        // ==================== FIN DU FILTRAGE DES LETTRES ====================
        // Si le caractère tapé n'est pas une lettre (chiffre, symbole, etc.), 
        // il est simplement ignoré et rien ne se passe
        
    }); // ==================== FIN DE LA FONCTION ANONYME DE L'ÉVÉNEMENT ====================
    
    console.log("🔗 Écouteur d'événement 'keypress' attaché au document");
    console.log("⌨️ Le keylogger est maintenant actif ! Tapez des lettres pour tester.");
    
} // ==================== FIN DE LA FONCTION setupKeylogger ====================

// ==================== GESTION DU CHARGEMENT DE LA PAGE ====================
// "window" est l'objet global représentant la fenêtre du navigateur
// ".onload" est un événement qui se déclenche quand TOUTE la page est complètement chargée
// "= function()" assigne une fonction anonyme à cet événement
// Cette technique garantit que tous les éléments HTML existent avant qu'on essaie de les manipuler
// POURQUOI C'EST CRUCIAL : si on appelait getElementById("keylogger") avant le chargement,
// l'élément n'existerait pas encore et on obtiendrait null, causant une erreur
window.onload = function() {
    console.log("📄 Page chargée complètement ! Initialisation du keylogger...");
    
    // ==================== APPEL DE LA FONCTION D'INITIALISATION ====================
    // Une fois que la page est chargée, on peut maintenant configurer le keylogger
    // "setupKeylogger()" appelle la fonction définie plus haut
    // Les parenthèses () indiquent qu'on exécute la fonction (sans paramètres)
    // Cette fonction va configurer l'écouteur d'événement sur le document
    // Après cet appel, le système de capture des touches sera opérationnel
    setupKeylogger();
    
    console.log("✅ Initialisation terminée avec succès !");
    
}; // ==================== FIN DE LA FONCTION ANONYME window.onload ====================