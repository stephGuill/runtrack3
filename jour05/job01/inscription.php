<?php
// ==================== GESTION DES SESSIONS ====================
// LIGNE 3: Démarrage de session pour vérifier état connexion
session_start();

// LIGNE 6: Redirection si déjà connecté
// LOGIQUE: Évite l'inscription multiple pour utilisateur connecté
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
    <title>Inscription - Créer un compte</title>
    <style>
        /* ==================== STYLES CSS ==================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
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
            max-width: 500px;
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
            border-color: #f5576c;
            background: white;
            box-shadow: 0 0 0 3px rgba(245, 87, 108, 0.1);
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
            background: linear-gradient(135deg, #f093fb, #f5576c);
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
            box-shadow: 0 8px 25px rgba(245, 87, 108, 0.3);
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
        
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: none;
        }
        
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        
        .back-link a {
            color: #f5576c;
            text-decoration: none;
            font-weight: 600;
        }
        
        .back-link a:hover {
            text-decoration: underline;
        }
        
        .password-strength {
            margin-top: 5px;
            font-size: 0.85rem;
        }
        
        .strength-weak { color: #e74c3c; }
        .strength-medium { color: #f39c12; }
        .strength-strong { color: #27ae60; }
        
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
        <!-- LIGNE 159: Titre du formulaire -->
        <h1 class="form-title"> Inscription</h1>
        <p class="form-subtitle">Créez votre compte en quelques étapes</p>
        
        <!-- LIGNE 163: Message de succès (masqué par défaut) -->
        <div class="success-message" id="successMessage">
             Inscription réussie ! Redirection vers la page de connexion...
        </div>
        
        <!-- LIGNE 167: Formulaire d'inscription -->
        <!-- FORM: Pas d'action, traitement en JavaScript -->
        <form id="registrationForm" novalidate>
            <!-- LIGNE 170: Champ prénom -->
            <div class="form-group">
                <label for="prenom" class="form-label">Prénom *</label>
                <input 
                    type="text" 
                    id="prenom" 
                    name="prenom" 
                    class="form-input" 
                    placeholder="Votre prénom"
                    required
                >
                <!-- LIGNE 179: Message d'erreur pour prénom -->
                <div class="error-message" id="prenomError"></div>
            </div>
            
            <!-- LIGNE 183: Champ nom -->
            <div class="form-group">
                <label for="nom" class="form-label">Nom *</label>
                <input 
                    type="text" 
                    id="nom" 
                    name="nom" 
                    class="form-input" 
                    placeholder="Votre nom de famille"
                    required
                >
                <div class="error-message" id="nomError"></div>
            </div>
            
            <!-- LIGNE 196: Champ email -->
            <div class="form-group">
                <label for="email" class="form-label">Email *</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-input" 
                    placeholder="votre.email@exemple.com"
                    required
                >
                <div class="error-message" id="emailError"></div>
            </div>
            
            <!-- LIGNE 209: Champ mot de passe -->
            <div class="form-group">
                <label for="password" class="form-label">Mot de passe *</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="form-input" 
                    placeholder="Mot de passe sécurisé"
                    required
                >
                <div class="error-message" id="passwordError"></div>
                <!-- LIGNE 220: Indicateur de force du mot de passe -->
                <div class="password-strength" id="passwordStrength"></div>
            </div>
            
            <!-- LIGNE 224: Champ confirmation mot de passe -->
            <div class="form-group">
                <label for="confirmPassword" class="form-label">Confirmer le mot de passe *</label>
                <input 
                    type="password" 
                    id="confirmPassword" 
                    name="confirmPassword" 
                    class="form-input" 
                    placeholder="Confirmez votre mot de passe"
                    required
                >
                <div class="error-message" id="confirmPasswordError"></div>
            </div>
            
            <!-- LIGNE 237: Bouton de soumission -->
            <button type="submit" class="submit-btn" id="submitBtn">
                Créer mon compte
            </button>
            
            <!-- LIGNE 242: Indicateur de chargement -->
            <div class="loading" id="loadingIndicator">
                Création du compte en cours...
            </div>
        </form>
        
        <!-- LIGNE 248: Lien retour -->
        <div class="back-link">
            <a href="index.php">← Retour à l'accueil</a> | 
            <a href="connexion.php">Déjà un compte ? Se connecter</a>
        </div>
    </div>

    <script>
        // ==================== JAVASCRIPT DE VALIDATION ====================
        
        /**
         * LIGNE 257: Variables globales pour éléments DOM
         * CACHE: Stockage des références pour performance
         */
        const form = document.getElementById('registrationForm');
        const prenomInput = document.getElementById('prenom');
        const nomInput = document.getElementById('nom');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const submitBtn = document.getElementById('submitBtn');
        const loadingIndicator = document.getElementById('loadingIndicator');
        const successMessage = document.getElementById('successMessage');
        
        /**
         * LIGNE 269: Patterns de validation RegEx
         * CONSTANTES: Expressions régulières pour validation
         */
        const PATTERNS = {
            // REGEX: Au moins 2 caractères, lettres, espaces, tirets, apostrophes
            name: /^[a-zA-ZÀ-ÿ\s\-']{2,50}$/,
            // REGEX: Format email standard RFC
            email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
            // REGEX: 8+ caractères, au moins 1 maj, 1 min, 1 chiffre
            password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/
        };
        
        /**
         * LIGNE 281: Fonction de validation d'un champ
         * @param {HTMLElement} input - Élément input à valider
         * @param {string} pattern - Nom du pattern dans PATTERNS
         * @param {string} errorMessage - Message d'erreur personnalisé
         */
        function validateField(input, pattern, errorMessage) {
            // LIGNE 286: Récupération valeur et élément erreur
            const value = input.value.trim();
            const errorElement = document.getElementById(input.id + 'Error');
            
            // LIGNE 289: Test de validation
            // CONDITION: Valeur vide OU pattern invalide
            if (!value || !PATTERNS[pattern].test(value)) {
                // LIGNE 291: Affichage erreur
                showError(input, errorElement, errorMessage);
                return false;
            } else {
                // LIGNE 294: Suppression erreur si valide
                clearError(input, errorElement);
                return true;
            }
        }
        
        /**
         * LIGNE 300: Validation spéciale pour email (vérification unicité)
         */
        async function validateEmail() {
            const email = emailInput.value.trim();
            const errorElement = document.getElementById('emailError');
            
            // LIGNE 305: Validation format d'abord
            if (!email) {
                showError(emailInput, errorElement, 'L\'email est obligatoire');
                return false;
            }
            
            if (!PATTERNS.email.test(email)) {
                showError(emailInput, errorElement, 'Format d\'email invalide');
                return false;
            }
            
            try {
                // LIGNE 315: Vérification unicité côté serveur
                // FETCH: Appel API pour vérifier si email existe
                const response = await fetch('api.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        action: 'check_email',
                        email: email
                    })
                });
                
                const data = await response.json();
                
                if (data.exists) {
                    showError(emailInput, errorElement, 'Cet email est déjà utilisé');
                    return false;
                } else {
                    clearError(emailInput, errorElement);
                    return true;
                }
                
            } catch (error) {
                // LIGNE 334: Gestion erreur réseau
                console.error('Erreur vérification email:', error);
                showError(emailInput, errorElement, 'Erreur de vérification');
                return false;
            }
        }
        
        /**
         * LIGNE 341: Validation et évaluation force mot de passe
         */
        function validatePassword() {
            const password = passwordInput.value;
            const errorElement = document.getElementById('passwordError');
            const strengthElement = document.getElementById('passwordStrength');
            
            // LIGNE 347: Validation présence
            if (!password) {
                showError(passwordInput, errorElement, 'Le mot de passe est obligatoire');
                strengthElement.textContent = '';
                return false;
            }
            
            // LIGNE 353: Évaluation de la force
            let strength = 0;
            let strengthText = '';
            let strengthClass = '';
            
            // LIGNE 357: Critères de force du mot de passe
            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/\d/.test(password)) strength++;
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength++;
            
            // LIGNE 364: Classification force
            switch (strength) {
                case 0:
                case 1:
                case 2:
                    strengthText = ' Faible - Ajoutez majuscules, chiffres et symboles';
                    strengthClass = 'strength-weak';
                    break;
                case 3:
                case 4:
                    strengthText = ' Moyen - Bon mot de passe';
                    strengthClass = 'strength-medium';
                    break;
                case 5:
                    strengthText = ' Fort - Excellent mot de passe !';
                    strengthClass = 'strength-strong';
                    break;
            }
            
            // LIGNE 379: Affichage indicateur force
            strengthElement.textContent = strengthText;
            strengthElement.className = 'password-strength ' + strengthClass;
            
            // LIGNE 383: Validation minimale requise
            if (strength < 3) {
                showError(passwordInput, errorElement, 'Mot de passe trop faible (minimum 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre)');
                return false;
            } else {
                clearError(passwordInput, errorElement);
                return true;
            }
        }
        
        /**
         * LIGNE 392: Validation confirmation mot de passe
         */
        function validateConfirmPassword() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            const errorElement = document.getElementById('confirmPasswordError');
            
            // LIGNE 398: Vérification correspondance
            if (!confirmPassword) {
                showError(confirmPasswordInput, errorElement, 'Veuillez confirmer votre mot de passe');
                return false;
            }
            
            if (password !== confirmPassword) {
                showError(confirmPasswordInput, errorElement, 'Les mots de passe ne correspondent pas');
                return false;
            }
            
            clearError(confirmPasswordInput, errorElement);
            return true;
        }
        
        /**
         * LIGNE 411: Fonction d'affichage d'erreur
         */
        function showError(input, errorElement, message) {
            input.classList.add('error');
            input.classList.remove('success');
            errorElement.textContent = message;
            errorElement.classList.add('show');
        }
        
        /**
         * LIGNE 419: Fonction de suppression d'erreur
         */
        function clearError(input, errorElement) {
            input.classList.remove('error');
            input.classList.add('success');
            errorElement.textContent = '';
            errorElement.classList.remove('show');
        }
        
        // ==================== ÉVÉNEMENTS DE VALIDATION TEMPS RÉEL ====================
        
        // LIGNE 428: Validation prénom en temps réel
        prenomInput.addEventListener('blur', () => {
            validateField(prenomInput, 'name', 'Le prénom doit contenir au moins 2 caractères et uniquement des lettres');
        });
        
        // LIGNE 432: Validation nom en temps réel
        nomInput.addEventListener('blur', () => {
            validateField(nomInput, 'name', 'Le nom doit contenir au moins 2 caractères et uniquement des lettres');
        });
        
        // LIGNE 436: Validation email en temps réel (avec debounce)
        let emailTimeout;
        emailInput.addEventListener('input', () => {
            clearTimeout(emailTimeout);
            emailTimeout = setTimeout(validateEmail, 500); // Debounce 500ms
        });
        
        // LIGNE 442: Validation mot de passe en temps réel
        passwordInput.addEventListener('input', validatePassword);
        
        // LIGNE 445: Validation confirmation en temps réel
        confirmPasswordInput.addEventListener('input', validateConfirmPassword);
        
        // ==================== SOUMISSION DU FORMULAIRE ====================
        
        /**
         * LIGNE 450: Gestionnaire de soumission formulaire
         */
        form.addEventListener('submit', async (e) => {
            // LIGNE 452: Empêcher soumission par défaut
            e.preventDefault();
            
            // LIGNE 455: Validation complète avant envoi
            const isValidPrenom = validateField(prenomInput, 'name', 'Le prénom doit contenir au moins 2 caractères et uniquement des lettres');
            const isValidNom = validateField(nomInput, 'name', 'Le nom doit contenir au moins 2 caractères et uniquement des lettres');
            const isValidEmail = await validateEmail();
            const isValidPassword = validatePassword();
            const isValidConfirm = validateConfirmPassword();
            
            // LIGNE 462: Vérification toutes validations passées
            if (!isValidPrenom || !isValidNom || !isValidEmail || !isValidPassword || !isValidConfirm) {
                return;
            }
            
            // LIGNE 466: Affichage état chargement
            submitBtn.disabled = true;
            loadingIndicator.style.display = 'block';
            
            try {
                // LIGNE 470: Envoi données inscription
                const response = await fetch('api.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        action: 'register',
                        prenom: prenomInput.value.trim(),
                        nom: nomInput.value.trim(),
                        email: emailInput.value.trim(),
                        password: passwordInput.value
                    })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    // LIGNE 485: Succès - affichage message et redirection
                    successMessage.style.display = 'block';
                    form.style.display = 'none';
                    
                    // LIGNE 489: Redirection après 2 secondes
                    setTimeout(() => {
                        window.location.href = 'connexion.php';
                    }, 2000);
                } else {
                    // LIGNE 493: Gestion erreurs serveur
                    alert('Erreur lors de l\'inscription: ' + data.error);
                }
                
            } catch (error) {
                // LIGNE 497: Gestion erreurs réseau
                console.error('Erreur inscription:', error);
                alert('Erreur de connexion au serveur');
            } finally {
                // LIGNE 501: Restauration état interface
                submitBtn.disabled = false;
                loadingIndicator.style.display = 'none';
            }
        });
        
        // LIGNE 506: Animation d'entrée
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.container');
            container.style.opacity = '0';
            container.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                container.style.transition = 'all 0.5s ease';
                container.style.opacity = '1';
                container.style.transform = 'translateY(0)';
            }, 100);
        });
    </script>
</body>
</html>