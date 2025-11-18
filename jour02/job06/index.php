<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job06 - Code Konami</title>
    <style>
        /* ==================== STYLES PAR DÉFAUT : PAGE VIDE ==================== */
        /* Par défaut, la page apparaît complètement vide */
        body {
            margin: 0;
            padding: 0;
            background-color: #fff;
            font-family: Arial, sans-serif;
            overflow: hidden; /* Cache les barres de défilement */
        }

        /* Le contenu est caché par défaut */
        .hidden-content {
            display: none;
        }

        /* ==================== STYLES LA PLATEFORME_ (ACTIVÉS PAR KONAMI) ==================== */
        /* Ces styles s'appliquent quand le code Konami est activé */
        .konami-activated {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: white;
            animation: konami-entrance 2s ease-in-out;
        }

        .konami-activated .hidden-content {
            display: block;
        }

        /* Animation d'entrée spectaculaire */
        @keyframes konami-entrance {
            0% {
                opacity: 0;
                transform: scale(0.1) rotate(180deg);
            }
            50% {
                opacity: 0.7;
                transform: scale(1.1) rotate(0deg);
            }
            100% {
                opacity: 1;
                transform: scale(1) rotate(0deg);
            }
        }

        /* Conteneur principal avec les couleurs La Plateforme_ */
        .plateforme-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* Titre principal avec effet néon */
        .plateforme-title {
            text-align: center;
            font-size: 4em;
            font-weight: bold;
            text-shadow: 0 0 20px #fff, 0 0 40px #667eea, 0 0 60px #764ba2;
            margin-bottom: 30px;
            animation: neon-pulse 2s infinite alternate;
        }

        @keyframes neon-pulse {
            0% {
                text-shadow: 0 0 20px #fff, 0 0 40px #667eea, 0 0 60px #764ba2;
            }
            100% {
                text-shadow: 0 0 30px #fff, 0 0 60px #667eea, 0 0 90px #764ba2;
            }
        }

        /* Sections avec design moderne */
        .plateforme-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            margin: 30px 0;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
        }

        .plateforme-section:hover {
            transform: translateY(-10px);
        }

        /* Texte avec style moderne */
        .plateforme-text {
            font-size: 1.2em;
            line-height: 1.8;
            text-align: justify;
            color: rgba(255, 255, 255, 0.9);
        }

        /* Boutons avec style La Plateforme_ */
        .plateforme-button {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            border-radius: 25px;
            padding: 15px 30px;
            color: white;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            margin: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .plateforme-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        }

        /* Grille de cartes */
        .plateforme-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin: 40px 0;
        }

        .plateforme-card {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .plateforme-card:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: scale(1.05);
        }

        /* Footer avec style */
        .plateforme-footer {
            text-align: center;
            margin-top: 50px;
            padding: 30px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px;
        }

        /* Indicateur de code Konami */
        .konami-hint {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 10px 15px;
            border-radius: 10px;
            font-size: 0.9em;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .konami-hint:hover {
            opacity: 1;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .plateforme-title {
                font-size: 2.5em;
            }
            
            .plateforme-container {
                padding: 20px 10px;
            }
            
            .plateforme-section {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Contenu caché par défaut, révélé par le code Konami -->
    <div class="hidden-content">
        <div class="plateforme-container">
            <h1 class="plateforme-title">🎮 LA PLATEFORME_ 🎮</h1>
            
            <div class="plateforme-section">
                <h2>🎉 Code Konami Activé !</h2>
                <p class="plateforme-text">
                    Félicitations ! Vous avez découvert le secret de cette page en utilisant le légendaire 
                    code Konami : ↑ ↑ ↓ ↓ ← → ← → B A
                </p>
                <p class="plateforme-text">
                    Bienvenue dans l'univers de La Plateforme_, où la technologie rencontre la créativité !
                </p>
            </div>

            <div class="plateforme-grid">
                <div class="plateforme-card">
                    <h3>💻 Développement</h3>
                    <p>Formation complète en développement web, mobile et logiciel avec les dernières technologies.</p>
                    <button class="plateforme-button">En savoir plus</button>
                </div>
                
                <div class="plateforme-card">
                    <h3>🚀 Innovation</h3>
                    <p>Projets innovants et accompagnement vers l'entrepreneuriat dans le secteur tech.</p>
                    <button class="plateforme-button">Découvrir</button>
                </div>
                
                <div class="plateforme-card">
                    <h3>🌟 Communauté</h3>
                    <p>Rejoignez une communauté dynamique de développeurs passionnés et bienveillants.</p>
                    <button class="plateforme-button">Rejoindre</button>
                </div>
            </div>

            <div class="plateforme-section">
                <h2>🎯 Notre Mission</h2>
                <p class="plateforme-text">
                    La Plateforme_ forme les développeurs de demain en alliant excellence technique, 
                    créativité et esprit d'équipe. Nous croyons en l'apprentissage par la pratique 
                    et l'innovation constante.
                </p>
            </div>

            <div class="plateforme-section">
                <h2>🛠️ Technologies Enseignées</h2>
                <p class="plateforme-text">
                    HTML5, CSS3, JavaScript, PHP, Python, React, Node.js, MySQL, Git, et bien plus encore !
                    Notre curriculum évolue constamment pour rester à la pointe de la technologie.
                </p>
            </div>

            <div class="plateforme-footer">
                <p>✨ Merci d'avoir découvert notre secret ! ✨</p>
                <p>Rechargez la page pour recommencer l'expérience</p>
            </div>
        </div>
    </div>

    <!-- Indice discret pour le code Konami -->
    <div class="konami-hint">
        💡 Essayez le code Konami classique...
    </div>

    <script src="script.js"></script>
</body>
</html>