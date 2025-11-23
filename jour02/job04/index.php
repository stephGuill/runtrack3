<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job04 - Keylogger Textarea</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1> Exercice Keylogger</h1>
        
        <div class="description">
            <strong>Objectif :</strong> Créer un textarea qui capture toutes les lettres (a-z) tapées au clavier, 
            même quand le focus n'est pas sur le textarea. Si le focus EST sur le textarea, 
            la lettre est ajoutée deux fois.
        </div>

        <label for="keylogger"><strong>Textarea Keylogger :</strong></label>
        <textarea id="keylogger" placeholder="Les lettres tapées apparaîtront ici automatiquement..."></textarea>

        <div class="info">
            <strong>Instructions de test :</strong><br>
            • Tapez des lettres (a-z) n'importe où sur la page → elles apparaissent une fois dans le textarea<br>
            • Cliquez dans le textarea puis tapez → les lettres apparaissent deux fois<br>
            • Cliquez en dehors du textarea puis tapez → retour au mode une fois
        </div>

        <input type="text" class="test-input" placeholder="Zone de test : tapez ici pour tester le focus externe">
    </div>

    <script src="script.js"></script>
</body>
</html>