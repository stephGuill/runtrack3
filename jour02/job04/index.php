<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job04 - Keylogger Textarea</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .description {
            background-color: #e7f3ff;
            border-left: 4px solid #2196F3;
            padding: 15px;
            margin-bottom: 30px;
            border-radius: 5px;
        }
        #keylogger {
            width: 100%;
            height: 200px;
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            font-family: monospace;
            resize: vertical;
            box-sizing: border-box;
        }
        #keylogger:focus {
            border-color: #4CAF50;
            outline: none;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
        }
        .info {
            margin-top: 20px;
            padding: 15px;
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 5px;
            font-size: 14px;
        }
        .test-input {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔤 Exercice Keylogger</h1>
        
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