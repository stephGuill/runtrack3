<?php
// ==================== GESTION DES SESSIONS ====================
// LIGNE 3: Démarrage de la session PHP
// session_start(): Initialise ou reprend session existante
// UTILITÉ: Maintient l'état de connexion entre pages
session_start();

// LIGNE 7: Vérification si utilisateur connecté
// $_SESSION: Tableau superglobal PHP pour données de session
// CONDITION: Teste existence de l'ID utilisateur en session
$isLoggedIn = isset($_SESSION['user_id']);
$userName = $isLoggedIn ? $_SESSION['user_prenom'] : null;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Système d'authentification</title>
    <style>
        /* ==================== STYLES CSS ==================== */
        * {
            /* LIGNE 20: Reset CSS pour uniformité navigateurs */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            /* LIGNE 26: Styles de base du body */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            /* LIGNE 36: Conteneur principal centré */
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
        
        .welcome-title {
            /* LIGNE 46: Titre principal */
            color: #333;
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 300;
        }
        
        .user-greeting {
            /* LIGNE 53: Message de bienvenue personnalisé */
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            font-size: 1.2rem;
        }
        
        .auth-links {
            /* LIGNE 62: Container pour liens d'authentification */
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .auth-link {
            /* LIGNE 69: Styles des liens d'authentification */
            display: inline-block;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            min-width: 160px;
        }
        
        .login-link {
            /* LIGNE 80: Lien de connexion */
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }
        
        .register-link {
            /* LIGNE 85: Lien d'inscription */
            background: linear-gradient(135deg, #f093fb, #f5576c);
            color: white;
        }
        
        .auth-link:hover {
            /* LIGNE 91: Effet hover sur les liens */
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        .logout-btn {
            /* LIGNE 97: Bouton de déconnexion */
            background: linear-gradient(135deg, #ff6b6b, #ee5a52);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }
        
        .logout-btn:hover {
            /* LIGNE 109: Effet hover sur déconnexion */
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255,107,107,0.3);
        }
        
        .description {
            /* LIGNE 115: Description du système */
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        /* LIGNE 121: Responsive design pour mobiles */
        @media (max-width: 600px) {
            .container {
                padding: 30px 20px;
            }
            
            .welcome-title {
                font-size: 2rem;
            }
            
            .auth-links {
                flex-direction: column;
                align-items: center;
            }
            
            .auth-link {
                width: 100%;
                max-width: 250px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- LIGNE 143: Titre principal de la page -->
        <h1 class="welcome-title"> Accueil</h1>
        
        <?php if ($isLoggedIn): ?>
            <!-- LIGNE 146: Section pour utilisateur connecté -->
            <!-- CONDITION PHP: Affichage conditionnel si connecté -->
            <div class="user-greeting">
                <!-- LIGNE 149: Message personnalisé avec prénom -->
                <!-- VARIABLE PHP: $userName contient le prénom de session -->
                <h2> Bonjour <?php echo htmlspecialchars($userName); ?> !</h2>
                <p>Vous êtes connecté avec succès.</p>
            </div>
            
            <!-- LIGNE 154: Informations utilisateur connecté -->
            <div class="description">
                <p><strong>Email :</strong> <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
                <p><strong>Connecté depuis :</strong> <?php echo date('H:i', $_SESSION['login_time']); ?></p>
            </div>
            
            <!-- LIGNE 160: Bouton de déconnexion -->
            <button class="logout-btn" onclick="logout()">
                 Se déconnecter
            </button>
            
        <?php else: ?>
            <!-- LIGNE 165: Section pour utilisateur non connecté -->
            <!-- BRANCHE ELSE: Affichage si pas connecté -->
            <div class="description">
                <p>Bienvenue dans notre système d'authentification sécurisé.</p>
                <p>Veuillez vous connecter ou créer un compte pour accéder à votre espace personnel.</p>
            </div>
            
            <!-- LIGNE 172: Liens vers pages d'authentification -->
            <div class="auth-links">
                <!-- LIGNE 174: Lien vers page de connexion -->
                <a href="connexion.php" class="auth-link login-link">
                     Se connecter
                </a>
                
                <!-- LIGNE 178: Lien vers page d'inscription -->
                <a href="inscription.php" class="auth-link register-link">
                     S'inscrire
                </a>
            </div>
        <?php endif; ?>
    </div>

    <script>
        // ==================== JAVASCRIPT ====================
        
        /**
         * LIGNE 189: Fonction de déconnexion
         * UTILITÉ: Envoie requête de déconnexion au serveur
         * MÉTHODE: Fetch API pour appel asynchrone
         */
        async function logout() {
            try {
                // LIGNE 194: Confirmation avant déconnexion
                // confirm(): Boîte de dialogue native du navigateur
                // RETURN BOOLEAN: true si utilisateur confirme
                if (!confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
                    return;
                }
                
                // LIGNE 200: Appel API de déconnexion
                // fetch(): Fonction moderne pour requêtes HTTP
                // METHOD POST: Pour actions qui modifient l'état
                const response = await fetch('api.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        action: 'logout'
                    })
                });
                
                // LIGNE 211: Traitement de la réponse
                // response.json(): Parse la réponse JSON
                const data = await response.json();
                
                if (data.success) {
                    // LIGNE 215: Redirection vers page actuelle rafraîchie
                    // window.location.reload(): Rafraîchit la page
                    window.location.reload();
                } else {
                    // LIGNE 218: Affichage erreur si échec
                    alert('Erreur lors de la déconnexion: ' + data.error);
                }
                
            } catch (error) {
                // LIGNE 222: Gestion des erreurs réseau
                console.error('Erreur de déconnexion:', error);
                alert('Erreur de connexion au serveur');
            }
        }
        
        // LIGNE 227: Animation d'entrée au chargement
        // DOMContentLoaded: Événement déclenché quand HTML est chargé
        document.addEventListener('DOMContentLoaded', function() {
            // LIGNE 230: Animation CSS pour effet d'apparition
            const container = document.querySelector('.container');
            container.style.opacity = '0';
            container.style.transform = 'translateY(20px)';
            
            // LIGNE 234: setTimeout pour animation progressive
            setTimeout(() => {
                container.style.transition = 'all 0.5s ease';
                container.style.opacity = '1';
                container.style.transform = 'translateY(0)';
            }, 100);
        });
    </script>
</body>
</html>