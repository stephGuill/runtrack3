<?php
// ==================== GESTION DES SESSIONS ====================
// LIGNE 3: Démarrage de session pour vérifier état connexion
session_start();

// LIGNE 6: Redirection si déjà connecté
// LOGIQUE: Évite la connexion multiple pour utilisateur déjà connecté
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Se connecter</title>
    <style>
        /* ==================== STYLES CSS ==================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            max-width: 450px;
            width: 100%;
        }
        
        .form-title {
            text-align: center;
            color: #333;
            font-size: 2.2rem;
            margin-bottom: 10px;
            font-weight: 300;
        }
        
        .form-subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            font-size: 1rem;
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 0.95rem;
        }
        
        .form-input {
            width: 100%;
            padding: 15px;
            border: 2px solid #e1e1e1;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fafafa;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .form-input.error {
            border-color: #e74c3c;
            background: #ffeaea;
        }
        
        .form-input.success {
            border-color: #27ae60;
            background: #eafaf1;
        }
        
        .error-message {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
            min-height: 20px;
        }
        
        .error-message.show {
            display: block;
        }
        
        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }
        
        .submit-btn:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }
        
        .submit-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
        
        .loading {
            display: none;
            text-align: center;
            margin-top: 15px;
            color: #666;
        }
        
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        
        .back-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }
        
        .back-link a:hover {
            text-decoration: underline;
        }
        
        .forgot-password {
            text-align: center;
            margin-top: 15px;
        }
        
        .forgot-password a {
            color: #999;
            text-decoration: none;
            font-size: 0.9rem;
        }
        
        .forgot-password a:hover {
            color: #667eea;
            text-decoration: underline;
        }
        
        .login-attempts {
            background: #fff3cd;
            color: #856404;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: none;
            font-size: 0.9rem;
        }
        
        /* Responsive */
        @media (max-width: 600px) {
            .container {
                padding: 30px 20px;
            }
            
            .form-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- LIGNE 170: Titre du formulaire -->
        <h1 class="form-title"> Connexion</h1>
        <p class="form-subtitle">Accédez à votre compte personnel</p>
        
        <!-- LIGNE 174: Avertissement tentatives de connexion -->
        <div class="login-attempts" id="loginAttempts">
             Attention: Plusieurs tentatives de connexion détectées. Veuillez patienter.
        </div>
        
        <!-- LIGNE 178: Formulaire de connexion -->
        <form id="loginForm" novalidate>
            <!-- LIGNE 180: Champ email -->
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-input" 
                    placeholder="votre.email@exemple.com"
                    required
                    autocomplete="email"
                >
                <div class="error-message" id="emailError"></div>
            </div>
            
            <!-- LIGNE 193: Champ mot de passe -->
            <div class="form-group">
                <label for="password" class="form-label">Mot de passe</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="form-input" 
                    placeholder="Votre mot de passe"
                    required
                    autocomplete="current-password"
                >
                <div class="error-message" id="passwordError"></div>
            </div>
            
            <!-- LIGNE 207: Bouton de soumission -->
            <button type="submit" class="submit-btn" id="submitBtn">
                Se connecter
            </button>
            
            <!-- LIGNE 212: Indicateur de chargement -->
            <div class="loading" id="loadingIndicator">
                 Connexion en cours...
            </div>
        </form>
        
        <!-- LIGNE 218: Lien mot de passe oublié -->
        <div class="forgot-password">
            <a href="#" onclick="alert('Fonctionnalité à implémenter')">Mot de passe oublié ?</a>
        </div>
        
        <!-- LIGNE 223: Liens de navigation -->
        <div class="back-link">
            <a href="index.php">← Retour à l'accueil</a> | 
            <a href="inscription.php">Pas de compte ? S'inscrire</a>
        </div>
    </div>

    <script>
        // ==================== JAVASCRIPT DE VALIDATION ====================
        
        /**
         * LIGNE 232: Variables globales pour éléments DOM
         */
        const form = document.getElementById('loginForm');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const submitBtn = document.getElementById('submitBtn');
        const loadingIndicator = document.getElementById('loadingIndicator');
        const loginAttempts = document.getElementById('loginAttempts');
        
        /**
         * LIGNE 241: Patterns de validation
         */
        const PATTERNS = {
            email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/
        };
        
        /**
         * LIGNE 246: Variables de gestion des tentatives
         */
        let attemptCount = 0;
        let isBlocked = false;
        let blockEndTime = null;
        
        /**
         * LIGNE 252: Fonction de validation email
         */
        function validateEmail() {
            const email = emailInput.value.trim();
            const errorElement = document.getElementById('emailError');
            
            if (!email) {
                showError(emailInput, errorElement, 'L\'email est obligatoire');
                return false;
            }
            
            if (!PATTERNS.email.test(email)) {
                showError(emailInput, errorElement, 'Format d\'email invalide');
                return false;
            }
            
            clearError(emailInput, errorElement);
            return true;
        }
        
        /**
         * LIGNE 269: Fonction de validation mot de passe
         */
        function validatePassword() {
            const password = passwordInput.value;
            const errorElement = document.getElementById('passwordError');
            
            if (!password) {
                showError(passwordInput, errorElement, 'Le mot de passe est obligatoire');
                return false;
            }
            
            if (password.length < 3) {
                showError(passwordInput, errorElement, 'Le mot de passe est trop court');
                return false;
            }
            
            clearError(passwordInput, errorElement);
            return true;
        }
        
        /**
         * LIGNE 286: Fonction d'affichage d'erreur
         */
        function showError(input, errorElement, message) {
            input.classList.add('error');
            input.classList.remove('success');
            errorElement.textContent = message;
            errorElement.classList.add('show');
        }
        
        /**
         * LIGNE 294: Fonction de suppression d'erreur
         */
        function clearError(input, errorElement) {
            input.classList.remove('error');
            input.classList.add('success');
            errorElement.textContent = '';
            errorElement.classList.remove('show');
        }
        
        /**
         * LIGNE 302: Gestion du blocage temporaire
         */
        function checkBlocking() {
            const now = Date.now();
            
            // LIGNE 305: Vérification si blocage expiré
            if (blockEndTime && now >= blockEndTime) {
                isBlocked = false;
                blockEndTime = null;
                attemptCount = 0;
                loginAttempts.style.display = 'none';
                localStorage.removeItem('loginAttempts');
                localStorage.removeItem('blockEndTime');
            }
            
            return isBlocked;
        }
        
        /**
         * LIGNE 316: Fonction de blocage après échecs
         */
        function handleFailedAttempt() {
            attemptCount++;
            localStorage.setItem('loginAttempts', attemptCount.toString());
            
            // LIGNE 321: Blocage après 3 tentatives
            if (attemptCount >= 3) {
                isBlocked = true;
                blockEndTime = Date.now() + (5 * 60 * 1000); // 5 minutes
                localStorage.setItem('blockEndTime', blockEndTime.toString());
                loginAttempts.style.display = 'block';
                submitBtn.disabled = true;
                
                // LIGNE 328: Countdown du blocage
                const countdownInterval = setInterval(() => {
                    const remaining = Math.ceil((blockEndTime - Date.now()) / 1000);
                    if (remaining <= 0) {
                        clearInterval(countdownInterval);
                        checkBlocking();
                        submitBtn.disabled = false;
                    } else {
                        loginAttempts.innerHTML = ` Trop de tentatives. Réessayez dans ${Math.ceil(remaining / 60)} minute(s) ${remaining % 60} seconde(s).`;
                    }
                }, 1000);
            }
        }
        
        /**
         * LIGNE 340: Réinitialisation après succès
         */
        function resetAttempts() {
            attemptCount = 0;
            isBlocked = false;
            blockEndTime = null;
            localStorage.removeItem('loginAttempts');
            localStorage.removeItem('blockEndTime');
            loginAttempts.style.display = 'none';
        }
        
        // ==================== ÉVÉNEMENTS DE VALIDATION ====================
        
        // LIGNE 351: Validation en temps réel
        emailInput.addEventListener('blur', validateEmail);
        passwordInput.addEventListener('blur', validatePassword);
        
        // LIGNE 354: Soumission avec Enter
        passwordInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter' && !submitBtn.disabled) {
                form.dispatchEvent(new Event('submit'));
            }
        });
        
        // ==================== SOUMISSION DU FORMULAIRE ====================
        
        /**
         * LIGNE 362: Gestionnaire de soumission
         */
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            // LIGNE 366: Vérification blocage
            if (checkBlocking()) {
                return;
            }
            
            // LIGNE 370: Validation des champs
            const isValidEmail = validateEmail();
            const isValidPassword = validatePassword();
            
            if (!isValidEmail || !isValidPassword) {
                return;
            }
            
            // LIGNE 377: État de chargement
            submitBtn.disabled = true;
            loadingIndicator.style.display = 'block';
            
            try {
                // LIGNE 381: Envoi requête de connexion
                const response = await fetch('api.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        action: 'login',
                        email: emailInput.value.trim(),
                        password: passwordInput.value
                    })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    // LIGNE 395: Succès - réinitialisation et redirection
                    resetAttempts();
                    
                    // LIGNE 398: Message de succès temporaire
                    submitBtn.textContent = ' Connexion réussie !';
                    submitBtn.style.background = 'linear-gradient(135deg, #27ae60, #2ecc71)';
                    
                    // LIGNE 402: Redirection après délai
                    setTimeout(() => {
                        window.location.href = 'index.php';
                    }, 1500);
                    
                } else {
                    // LIGNE 407: Échec - gestion tentatives
                    handleFailedAttempt();
                    
                    // LIGNE 410: Affichage erreur spécifique
                    if (data.error.includes('email')) {
                        showError(emailInput, document.getElementById('emailError'), data.error);
                    } else if (data.error.includes('mot de passe')) {
                        showError(passwordInput, document.getElementById('passwordError'), data.error);
                    } else {
                        alert('Erreur de connexion: ' + data.error);
                    }
                }
                
            } catch (error) {
                // LIGNE 420: Gestion erreurs réseau
                console.error('Erreur connexion:', error);
                alert('Erreur de connexion au serveur');
            } finally {
                // LIGNE 424: Restauration interface
                if (!isBlocked) {
                    submitBtn.disabled = false;
                }
                loadingIndicator.style.display = 'none';
                
                // LIGNE 429: Restauration bouton après succès
                setTimeout(() => {
                    submitBtn.textContent = 'Se connecter';
                    submitBtn.style.background = 'linear-gradient(135deg, #667eea, #764ba2)';
                }, 2000);
            }
        });
        
        // ==================== INITIALISATION ====================
        
        /**
         * LIGNE 437: Chargement état depuis localStorage
         */
        document.addEventListener('DOMContentLoaded', function() {
            // LIGNE 440: Récupération tentatives précédentes
            const savedAttempts = localStorage.getItem('loginAttempts');
            const savedBlockTime = localStorage.getItem('blockEndTime');
            
            if (savedAttempts) {
                attemptCount = parseInt(savedAttempts);
            }
            
            if (savedBlockTime) {
                blockEndTime = parseInt(savedBlockTime);
                isBlocked = true;
                checkBlocking();
            }
            
            // LIGNE 452: Animation d'entrée
            const container = document.querySelector('.container');
            container.style.opacity = '0';
            container.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                container.style.transition = 'all 0.5s ease';
                container.style.opacity = '1';
                container.style.transform = 'translateY(0)';
            }, 100);
            
            // LIGNE 461: Focus automatique sur email
            emailInput.focus();
        });
        
        // LIGNE 465: Nettoyage au déchargement de page
        window.addEventListener('beforeunload', () => {
            // Sauvegarde état si nécessaire
            if (attemptCount > 0) {
                localStorage.setItem('loginAttempts', attemptCount.toString());
            }
            if (blockEndTime) {
                localStorage.setItem('blockEndTime', blockEndTime.toString());
            }
        });
    </script>
</body>
</html>