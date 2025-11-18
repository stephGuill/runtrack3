<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job07 - Code Konami Bleu</title>
    <style>
        /* ==================== STYLES PAR DÉFAUT : BOUTON KONAMI VISIBLE ==================== */
        body {
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow: hidden;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        /* BOUTON KONAMI VISIBLE DÈS LE DÉBUT */
        .konami-trigger-button {
            background: linear-gradient(45deg, #0062ff, #004bb8);
            border: 5px solid #ffff00;
            border-radius: 50px;
            padding: 50px 100px;
            color: white;
            font-size: 3em;
            font-weight: 900;
            cursor: pointer;
            margin: 20px;
            box-shadow: 0 50px 100px rgba(0, 98, 255, 0.8);
            text-transform: uppercase;
            letter-spacing: 0.2em;
            position: relative;
            min-width: 400px;
            min-height: 150px;
            display: block;
            text-align: center;
            line-height: 1.2;
            animation: konamiButtonPulse 2s infinite;
            transition: all 0.3s ease;
        }

        @keyframes konamiButtonPulse {
            0% { 
                transform: scale(1);
                box-shadow: 0 50px 100px rgba(0, 98, 255, 0.8);
                border-color: #ffff00;
            }
            50% { 
                transform: scale(1.1);
                box-shadow: 0 60px 120px rgba(255, 255, 0, 1);
                border-color: #ff0000;
            }
            100% { 
                transform: scale(1);
                box-shadow: 0 50px 100px rgba(0, 98, 255, 0.8);
                border-color: #ffff00;
            }
        }

        .konami-trigger-button::before {
            content: '🎮 CLIQUEZ ICI POUR KONAMI 🎮';
            position: absolute;
            top: -60px;
            left: 50%;
            transform: translateX(-50%);
            background: #ff0000;
            color: #ffffff;
            padding: 15px 30px;
            border-radius: 30px;
            font-size: 0.4em;
            font-weight: 900;
            animation: indicatorBlink 1s infinite;
            z-index: 10;
            border: 3px solid #ffffff;
        }

        @keyframes indicatorBlink {
            0% { opacity: 1; background: #ff0000; }
            50% { opacity: 0.3; background: #00ff00; }
            100% { opacity: 1; background: #ff0000; }
        }

        .konami-trigger-button:hover {
            transform: scale(1.2);
            background: linear-gradient(45deg, #00ff00, #0062ff);
            border-color: #ffffff;
        }

        .konami-instructions {
            background: rgba(0, 98, 255, 0.9);
            color: white;
            padding: 30px;
            border-radius: 25px;
            font-size: 1.5em;
            text-align: center;
            margin: 30px;
            border: 3px solid #ffff00;
            max-width: 600px;
            animation: instructionsPulse 3s infinite;
        }

        @keyframes instructionsPulse {
            0% { border-color: #ffff00; }
            33% { border-color: #ff0000; }
            66% { border-color: #00ff00; }
            100% { border-color: #ffff00; }
        }

        /* Contenu caché par défaut - la page apparaît vide */
        .hidden-content {
            display: none;
        }

        /* CONTENU INITIAL VISIBLE */
        .initial-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        /* Indicateur discret du code Konami */
        .konami-hint {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.1);
            color: #666;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 0.8em;
            opacity: 0.3;
            transition: opacity 0.3s ease;
            font-family: 'Courier New', monospace;
        }

        .konami-hint:hover {
            opacity: 0.8;
        }

        /* ==================== STYLES LA PLATEFORME_ AVEC BLEU #0062ff ==================== */
        .konami-activated {
            background: linear-gradient(135deg, #0062ff 0%, #004bb8 50%, #0062ff 100%);
            min-height: 100vh;
            color: white;
            animation: konami-reveal 2.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            overflow-y: auto;
        }

        .konami-activated .hidden-content {
            display: block;
        }

        .konami-activated .initial-content {
            display: none;
        }

        /* Animation d'apparition majestueuse */
        @keyframes konami-reveal {
            0% {
                opacity: 0;
                transform: scale(0) rotate(180deg);
                filter: blur(20px);
            }
            30% {
                opacity: 0.3;
                transform: scale(0.5) rotate(90deg);
                filter: blur(10px);
            }
            70% {
                opacity: 0.8;
                transform: scale(1.1) rotate(0deg);
                filter: blur(2px);
            }
            100% {
                opacity: 1;
                transform: scale(1) rotate(0deg);
                filter: blur(0px);
            }
        }

        /* Conteneur principal */
        .plateforme-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
            position: relative;
        }

        /* Titre principal avec effet lumineux bleu */
        .plateforme-title {
            text-align: center;
            font-size: 4.5em;
            font-weight: 900;
            margin-bottom: 40px;
            text-shadow: 
                0 0 20px #0062ff,
                0 0 40px #0062ff,
                0 0 60px #ffffff,
                0 0 80px #0062ff;
            animation: blue-glow 3s infinite alternate;
            letter-spacing: 0.1em;
        }

        @keyframes blue-glow {
            0% {
                text-shadow: 
                    0 0 20px #0062ff,
                    0 0 40px #0062ff,
                    0 0 60px #ffffff;
            }
            100% {
                text-shadow: 
                    0 0 30px #0062ff,
                    0 0 60px #0062ff,
                    0 0 90px #ffffff,
                    0 0 120px #0062ff;
            }
        }

        /* Sous-titre avec animation */
        .plateforme-subtitle {
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 50px;
            opacity: 0.9;
            animation: subtitle-fade 1s ease-in 1s both;
        }

        @keyframes subtitle-fade {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 0.9; transform: translateY(0); }
        }

        /* Sections avec design glassmorphism bleu */
        .plateforme-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 2px solid rgba(0, 98, 255, 0.3);
            border-radius: 25px;
            padding: 40px;
            margin: 40px 0;
            box-shadow: 
                0 25px 50px rgba(0, 98, 255, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
        }

        .plateforme-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0, 98, 255, 0.1), transparent);
            transition: left 0.6s;
        }

        .plateforme-section:hover::before {
            left: 100%;
        }

        .plateforme-section:hover {
            transform: translateY(-10px);
            box-shadow: 
                0 35px 70px rgba(0, 98, 255, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
            border-color: rgba(0, 98, 255, 0.5);
        }

        /* Titres de sections */
        .section-title {
            font-size: 2.2em;
            margin-bottom: 20px;
            color: #ffffff;
            text-shadow: 0 2px 10px rgba(0, 98, 255, 0.5);
        }

        /* Texte des sections */
        .plateforme-text {
            font-size: 1.3em;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.95);
            text-align: justify;
        }

        /* Grille de cartes - BOUTONS PLUS VISIBLES */
        .plateforme-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 50px;
            margin: 50px 0;
            align-items: center;
            justify-items: center;
        }

        .plateforme-card {
            background: linear-gradient(145deg, rgba(0, 98, 255, 0.3), rgba(0, 75, 184, 0.2));
            border: 3px solid rgba(0, 98, 255, 0.6);
            border-radius: 30px;
            padding: 50px;
            text-align: center;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            width: 90%;
            max-width: 600px;
        }

        .plateforme-card::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: radial-gradient(circle, rgba(0, 98, 255, 0.2), transparent);
            transition: all 0.6s ease;
            transform: translate(-50%, -50%);
            border-radius: 50%;
        }

        .plateforme-card:hover::after {
            width: 300px;
            height: 300px;
        }

        .plateforme-card:hover {
            transform: scale(1.05) rotateY(5deg);
            box-shadow: 0 30px 60px rgba(0, 98, 255, 0.4);
            border-color: rgba(0, 98, 255, 0.8);
        }

        .card-title {
            font-size: 2.5em;
            margin-bottom: 25px;
            color: #ffffff;
            position: relative;
            z-index: 2;
            text-shadow: 0 0 10px #0062ff;
        }

        .card-text {
            color: rgba(255, 255, 255, 0.95);
            line-height: 1.8;
            position: relative;
            z-index: 2;
            font-size: 1.3em;
            margin-bottom: 40px;
        }

        /* BOUTONS EXTRA LARGES - MAXIMUM VISIBILITÉ */
        .plateforme-button {
            background: linear-gradient(45deg, #0062ff, #004bb8);
            border: 3px solid #ffffff;
            border-radius: 50px;
            padding: 40px 80px;
            color: white;
            font-size: 2.5em;
            font-weight: 900;
            cursor: pointer;
            margin: 30px auto;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            box-shadow: 0 30px 60px rgba(0, 98, 255, 0.6);
            text-transform: uppercase;
            letter-spacing: 0.2em;
            position: relative;
            overflow: visible;
            min-width: 350px;
            min-height: 120px;
            display: block;
            text-align: center;
            line-height: 1.2;
            width: 80%;
            max-width: 500px;
            animation: buttonBlink 3s infinite;
        }

        /* Animation clignotante pour attirer l'attention */
        @keyframes buttonBlink {
            0% { 
                box-shadow: 0 30px 60px rgba(0, 98, 255, 0.6);
                border-color: #ffffff;
            }
            25% { 
                box-shadow: 0 40px 80px rgba(255, 255, 0, 0.8);
                border-color: #ffff00;
            }
            50% { 
                box-shadow: 0 50px 100px rgba(0, 255, 0, 0.8);
                border-color: #00ff00;
            }
            75% { 
                box-shadow: 0 40px 80px rgba(255, 0, 255, 0.8);
                border-color: #ff00ff;
            }
            100% { 
                box-shadow: 0 30px 60px rgba(0, 98, 255, 0.6);
                border-color: #ffffff;
            }
        }

        .plateforme-button::before {
            content: '👆 CLIQUEZ ICI 👆';
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            background: #ffff00;
            color: #000000;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.4em;
            font-weight: 900;
            animation: buttonPulse 2s infinite;
            z-index: 10;
        }

        .plateforme-button:hover::before {
            content: '✨ MERCI ! ✨';
            background: #00ff00;
            animation: none;
        }

        /* Animation de pulsation pour attirer l'attention */
        @keyframes buttonPulse {
            0% { transform: translateX(-50%) scale(1); opacity: 1; }
            50% { transform: translateX(-50%) scale(1.2); opacity: 0.7; }
            100% { transform: translateX(-50%) scale(1); opacity: 1; }
        }

        .plateforme-button:hover {
            transform: translateY(-15px) scale(1.1);
            box-shadow: 0 50px 100px rgba(0, 98, 255, 0.8);
            background: linear-gradient(45deg, #0070ff, #0055cc);
            letter-spacing: 0.3em;
            border-color: #ffff00;
            text-shadow: 0 0 20px #ffffff;
        }

        /* Footer stylisé */
        .plateforme-footer {
            text-align: center;
            margin-top: 80px;
            padding: 40px;
            background: rgba(0, 98, 255, 0.1);
            border-radius: 20px;
            border: 1px solid rgba(0, 98, 255, 0.3);
        }

        .footer-title {
            font-size: 2em;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .footer-text {
            font-size: 1.1em;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .plateforme-title {
                font-size: 3em;
            }
            
            .plateforme-container {
                padding: 30px 15px;
            }
            
            .plateforme-section {
                padding: 25px;
                margin: 25px 0;
            }
            
            .plateforme-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .konami-trigger-button {
                padding: 40px 80px;
                font-size: 2.5em;
                min-width: 350px;
                min-height: 120px;
            }
            
            .konami-instructions {
                font-size: 1.3em;
                padding: 25px;
                margin: 20px;
            }
            
            /* Boutons responsive - TOUJOURS TRÈS VISIBLES */
            .plateforme-button {
                padding: 35px 70px;
                font-size: 2.2em;
                min-width: 300px;
                min-height: 100px;
                margin: 25px auto;
                width: 85%;
            }
            
            .plateforme-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            
            .plateforme-card {
                width: 95%;
                padding: 40px;
            }
        }

        @media (max-width: 480px) {
            .plateforme-title {
                font-size: 2.2em;
            }
            
            .section-title {
                font-size: 1.8em;
            }
            
            .plateforme-text {
                font-size: 1.1em;
            }
            
            .konami-trigger-button {
                padding: 30px 60px;
                font-size: 2em;
                min-width: 280px;
                min-height: 100px;
            }
            
            .konami-instructions {
                font-size: 1.1em;
                padding: 20px;
                margin: 15px;
            }
            
            /* Boutons mobile - ÉNORMES pour être vus */
            .plateforme-button {
                padding: 30px 50px;
                font-size: 1.8em;
                min-width: 280px;
                min-height: 90px;
                margin: 20px auto;
                width: 95%;
                max-width: 400px;
                border-width: 2px;
            }
            
            .card-title {
                font-size: 2em;
            }
            
            .card-text {
                font-size: 1.1em;
            }
        }
    </style>
</head>
<body>
    <!-- CONTENU VISIBLE DÈS LE DÉBUT -->
    <div class="initial-content">
        <div class="konami-instructions">
            <h1>🎮 CODE KONAMI CHALLENGE 🎮</h1>
            <p><strong>Tapez la séquence :</strong></p>
            <p style="font-size: 2em; color: #ffff00;">↑ ↑ ↓ ↓ ← → ← → B A</p>
            <p>OU cliquez sur le bouton ci-dessous !</p>
        </div>
        
        <button class="konami-trigger-button" onclick="activateKonamiMode()">
            ACTIVER<br>LA PLATEFORME_
        </button>
        
        <!-- BOUTON DE TEST DIRECT -->
        <button onclick="forceActivation()" style="background: #ff0000; color: white; padding: 20px 40px; font-size: 1.5em; border: none; border-radius: 15px; margin: 20px; cursor: pointer;">
            🆘 ACTIVATION FORCE
        </button>
        
        <!-- BOUTON DE TEST CSS -->
        <button onclick="testCSS()" style="background: #00ff00; color: black; padding: 15px 30px; font-size: 1.2em; border: none; border-radius: 10px; margin: 10px; cursor: pointer;">
            🧪 TEST CSS
        </button>
        
        <!-- BOUTONS D'EMERGENCY POUR TESTER CHAQUE TOUCHE -->
        <div style="margin: 30px 0; padding: 20px; background: rgba(255,0,0,0.1); border-radius: 15px;">
            <h3 style="color: #ff0000; margin-bottom: 15px;">🆘 MODE TEST - Cliquez les boutons dans l'ordre :</h3>
            <div style="display: flex; flex-wrap: wrap; gap: 10px; justify-content: center;">
                <button onclick="simulateKey(38)" style="padding: 10px; font-size: 1.2em; background: #0062ff; color: white; border: none; border-radius: 8px;">↑</button>
                <button onclick="simulateKey(38)" style="padding: 10px; font-size: 1.2em; background: #0062ff; color: white; border: none; border-radius: 8px;">↑</button>
                <button onclick="simulateKey(40)" style="padding: 10px; font-size: 1.2em; background: #0062ff; color: white; border: none; border-radius: 8px;">↓</button>
                <button onclick="simulateKey(40)" style="padding: 10px; font-size: 1.2em; background: #0062ff; color: white; border: none; border-radius: 8px;">↓</button>
                <button onclick="simulateKey(37)" style="padding: 10px; font-size: 1.2em; background: #0062ff; color: white; border: none; border-radius: 8px;">←</button>
                <button onclick="simulateKey(39)" style="padding: 10px; font-size: 1.2em; background: #0062ff; color: white; border: none; border-radius: 8px;">→</button>
                <button onclick="simulateKey(37)" style="padding: 10px; font-size: 1.2em; background: #0062ff; color: white; border: none; border-radius: 8px;">←</button>
                <button onclick="simulateKey(39)" style="padding: 10px; font-size: 1.2em; background: #0062ff; color: white; border: none; border-radius: 8px;">→</button>
                <button onclick="simulateKey(66)" style="padding: 10px; font-size: 1.2em; background: #ff0000; color: white; border: none; border-radius: 8px;">B</button>
                <button onclick="simulateKey(65)" style="padding: 10px; font-size: 1.2em; background: #ff0000; color: white; border: none; border-radius: 8px;">A</button>
            </div>
            <button onclick="resetSequence()" style="margin-top: 15px; padding: 10px 20px; background: #999; color: white; border: none; border-radius: 8px;">RESET</button>
        </div>
        
        <div style="margin-top: 30px; padding: 20px; background: rgba(255,255,255,0.9); border-radius: 15px; color: #0062ff; font-weight: bold;">
            <p>🎯 Objectif : Découvrir le contenu secret bleu #0062ff</p>
            <p style="font-size: 0.9em; color: #666;">💡 Conseil : Ouvrez la console (F12) pour voir la progression !</p>
            <div id="konami-visual-progress" style="margin-top: 15px; font-size: 1.2em; color: #0062ff;">
                <strong>Progression: 0/10</strong><br>
                <div style="font-size: 0.8em; color: #999;">↑↑↓↓←→←→BA</div>
            </div>
        </div>
    </div>

    <!-- Contenu caché par défaut -->
    <div class="hidden-content">
        <div class="plateforme-container">
            <h1 class="plateforme-title">LA PLATEFORME_</h1>
            <p class="plateforme-subtitle">🎮 Code Konami Activé avec Succès ! 🎮</p>
            
            <div class="plateforme-section">
                <h2 class="section-title">🎉 Félicitations !</h2>
                <p class="plateforme-text">
                    Vous avez découvert le secret de cette page en utilisant le légendaire code Konami : 
                    <strong>↑ ↑ ↓ ↓ ← → ← → B A</strong>
                </p>
                <p class="plateforme-text">
                    Bienvenue dans l'univers de La Plateforme_, où l'innovation rencontre l'excellence 
                    dans la formation tech !
                </p>
            </div>

            <div class="plateforme-grid">
                <div class="plateforme-card">
                    <h3 class="card-title">💻 Formation Tech</h3>
                    <p class="card-text">
                        Développement web, mobile et logiciel avec les technologies les plus récentes 
                        et les méthodes pédagogiques innovantes.
                    </p>
                    <button class="plateforme-button">Découvrir</button>
                </div>
                
                <div class="plateforme-card">
                    <h3 class="card-title">🚀 Innovation</h3>
                    <p class="card-text">
                        Projets avant-gardistes et accompagnement personnalisé vers l'entrepreneuriat 
                        dans l'écosystème technologique.
                    </p>
                    <button class="plateforme-button">Explorer</button>
                </div>
                
                <div class="plateforme-card">
                    <h3 class="card-title">🌟 Communauté</h3>
                    <p class="card-text">
                        Rejoignez un réseau de développeurs passionnés, bienveillants et 
                        toujours prêts à partager leurs connaissances.
                    </p>
                    <button class="plateforme-button">Rejoindre</button>
                </div>
            </div>

            <div class="plateforme-section">
                <h2 class="section-title">🎯 Notre Mission</h2>
                <p class="plateforme-text">
                    La Plateforme_ forme les développeurs de demain en combinant excellence technique, 
                    créativité débordante et esprit collaboratif. Nous privilégions l'apprentissage 
                    par la pratique, l'innovation constante et l'accompagnement personnalisé de chaque apprenant.
                </p>
            </div>

            <div class="plateforme-section">
                <h2 class="section-title">🛠️ Stack Technologique</h2>
                <p class="plateforme-text">
                    <strong>Frontend :</strong> HTML5, CSS3, JavaScript (ES6+), React, Vue.js, Angular<br>
                    <strong>Backend :</strong> PHP, Python, Node.js, Java, C#<br>
                    <strong>Bases de données :</strong> MySQL, PostgreSQL, MongoDB<br>
                    <strong>DevOps :</strong> Git, Docker, CI/CD, Cloud (AWS, Azure)<br>
                    <strong>Mobile :</strong> React Native, Flutter, Swift, Kotlin
                </p>
            </div>

            <div class="plateforme-footer">
                <h3 class="footer-title">✨ Merci d'avoir découvert notre secret ! ✨</h3>
                <p class="footer-text">
                    Vous venez de vivre une expérience unique avec le code Konami.<br>
                    Rechargez la page pour recommencer l'aventure depuis le début !
                </p>
            </div>
        </div>
    </div>

    <!-- Indice très discret pour le code Konami -->
    <div class="konami-hint">
        ↑↑↓↓←→←→BA
    </div>

    <script src="script.js"></script>
</body>
</html>