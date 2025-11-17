<!DOCTYPE html> 
<html> 
<head> 
    <!-- Titre affiché dans l'onglet du navigateur -->
    <title>Somme des nombres premiers</title>
    <!-- Inclusion du fichier JavaScript externe -->
    <!-- L'attribut src spécifie le chemin vers le fichier script.js -->
    <!-- Ce fichier sera chargé et exécuté par le navigateur -->
    <script src="script.js"></script>
</head>
<body> 
    <!-- Titre principal de niveau 1 affiché en haut de la page -->
    <h1>Test de la fonction sommenombrespremiers</h1>
    <!-- Paragraphe informatif pour expliquer à l'utilisateur ce qui va se passer -->
    <p>Les résultats des tests s'affichent ci-dessous :</p>
    <!-- Le reste du contenu sera ajouté dynamiquement par JavaScript -->
    <!-- via document.body.innerHTML dans la fonction executerTests() -->

    <form id="prime-form">
        <label for="a">Nombre a :</label>
        <input id="a" name="a" type="number" required />
        <label for="b">Nombre b :</label>
        <input id="b" name="b" type="number" required />
        <button type="submit">Calculer</button>
    </form>

    <div id="result" aria-live="polite" style="margin-top:1em;font-weight:600;"></div>
</body>
</html>  