<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- ==================== MÉTADONNÉES HTML5 ==================== -->
    <meta charset="UTF-8">
    <!-- LIGNE 5: Encodage UTF-8 pour caractères français et spéciaux -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LIGNE 8: Configuration responsive pour tous appareils -->
    
    <title>Formulaire d'Inscription - Tailwind CSS</title>
    <!-- LIGNE 11: Titre affiché dans l'onglet du navigateur -->
    
    <!-- ==================== TAILWIND CSS CDN ==================== -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- LIGNE 15: Inclusion de Tailwind CSS via CDN Play -->
    <!-- UTILITÉ: Framework utility-first pour styling rapide -->
    <!-- AVANTAGE: Pas de build process, classes directes dans HTML -->
    
    <!-- ==================== CONFIGURATION TAILWIND PERSONNALISÉE ==================== -->
    <script>
        // LIGNE 20: Configuration custom de Tailwind
        tailwind.config = {
            theme: {
                extend: {
                    // LIGNE 24: Extension du thème par défaut
                    colors: {
                        // LIGNE 26: Couleurs personnalisées pour le design
                        'primary': {
                            50: '#eff6ff',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- ==================== STYLES CUSTOM ADDITIONNELS ==================== -->
    <style>
        /* LIGNE 39: Styles custom pour animations et effets spéciaux */
        .form-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        /* LIGNE 44: Animation pour les champs de formulaire */
        .focus-ring:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        /* LIGNE 49: Animation hover pour boutons */
        .btn-hover:hover {
            transform: translateY(-1px);
            transition: all 0.2s ease-in-out;
        }
        
        /* LIGNE 54: Style pour checkboxes personnalisées */
        .checkbox-custom:checked {
            background-color: #3b82f6;
            border-color: #3b82f6;
        }
    </style>
</head>

<!-- ==================== CORPS DU DOCUMENT ==================== -->
<body class="min-h-screen bg-gray-50">
    <!-- LIGNE 64: Classes Tailwind appliquées au body -->
    <!-- min-h-screen: hauteur minimum de l'écran -->
    <!-- bg-gray-50: fond gris très clair -->

    <!-- ==================== HEADER AVEC NAVIGATION ==================== -->
    <header class="form-gradient shadow-lg">
        <!-- LIGNE 69: Header avec dégradé personnalisé et ombre -->
        <!-- form-gradient: classe custom définie dans <style> -->
        <!-- shadow-lg: ombre portée large -->
        
        <nav class="container mx-auto px-4 py-6">
            <!-- LIGNE 74: Navigation responsive centrée -->
            <!-- container: largeur max avec marges auto -->
            <!-- mx-auto: centrage horizontal -->
            <!-- px-4: padding horizontal 1rem -->
            <!-- py-6: padding vertical 1.5rem -->
            
            <div class="flex flex-col md:flex-row justify-between items-center">
                <!-- LIGNE 80: Disposition flexible responsive -->
                <!-- flex: affichage flexbox -->
                <!-- flex-col: colonne sur mobile -->
                <!-- md:flex-row: ligne sur écrans moyens et plus -->
                <!-- justify-between: espacement entre éléments -->
                <!-- items-center: alignement vertical centré -->
                
                <div class="mb-4 md:mb-0">
                    <!-- LIGNE 87: Container du logo/titre -->
                    <!-- mb-4: marge bottom 1rem sur mobile -->
                    <!-- md:mb-0: pas de marge bottom sur desktop -->
                    
                    <h1 class="text-3xl font-bold text-white">
                        <!-- LIGNE 92: Titre principal -->
                        <!-- text-3xl: taille police 1.875rem -->
                        <!-- font-bold: police en gras -->
                        <!-- text-white: couleur blanche -->
                        Mon Site Web
                    </h1>
                </div>
                
                <ul class="flex space-x-6 text-white">
                    <!-- LIGNE 100: Liste de navigation -->
                    <!-- flex: affichage flexbox -->
                    <!-- space-x-6: espacement horizontal 1.5rem entre enfants -->
                    <!-- text-white: couleur du texte blanche -->
                    
                    <li>
                        <a href="index.php" class="hover:text-blue-200 transition duration-300 font-medium">
                            <!-- LIGNE 106: Lien de navigation -->
                            <!-- hover:text-blue-200: couleur au survol -->
                            <!-- transition: animation de transition -->
                            <!-- duration-300: durée 300ms -->
                            <!-- font-medium: police moyenne -->
                            Accueil
                        </a>
                    </li>
                    <li>
                        <a href="index.php" class="hover:text-blue-200 transition duration-300 font-medium">
                            Inscription
                        </a>
                    </li>
                    <li>
                        <a href="index.php" class="hover:text-blue-200 transition duration-300 font-medium">
                            Connexion
                        </a>
                    </li>
                    <li>
                        <a href="index.php" class="hover:text-blue-200 transition duration-300 font-medium">
                            Rechercher
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- ==================== SECTION PRINCIPALE AVEC FORMULAIRE ==================== -->
    <section class="container mx-auto px-4 py-12">
        <!-- LIGNE 129: Section principale du formulaire -->
        <!-- container mx-auto: conteneur centré -->
        <!-- px-4: padding horizontal 1rem -->
        <!-- py-12: padding vertical 3rem -->
        
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-xl p-8">
            <!-- LIGNE 135: Container du formulaire -->
            <!-- max-w-2xl: largeur maximum 42rem -->
            <!-- mx-auto: centrage horizontal -->
            <!-- bg-white: fond blanc -->
            <!-- rounded-lg: coins arrondis -->
            <!-- shadow-xl: ombre extra large -->
            <!-- p-8: padding 2rem sur tous côtés -->
            
            <div class="text-center mb-8">
                <!-- LIGNE 144: En-tête du formulaire -->
                <!-- text-center: texte centré -->
                <!-- mb-8: marge bottom 2rem -->
                
                <h2 class="text-3xl font-bold text-gray-800 mb-2">
                    <!-- LIGNE 149: Titre du formulaire -->
                    <!-- text-3xl: taille 1.875rem -->
                    <!-- font-bold: police en gras -->
                    <!-- text-gray-800: couleur gris foncé -->
                    <!-- mb-2: marge bottom 0.5rem -->
                    Création de Compte
                </h2>
                <p class="text-gray-600">
                    <!-- LIGNE 156: Sous-titre descriptif -->
                    <!-- text-gray-600: couleur gris moyen -->
                    Rejoignez notre communauté en quelques clics
                </p>
            </div>

            <!-- ==================== FORMULAIRE D'INSCRIPTION ==================== -->
            <form action="index.php" method="POST" class="space-y-6">
                <!-- LIGNE 163: Formulaire avec espacement vertical -->
                <!-- action: envoi vers index.php -->
                <!-- method: POST pour sécurité -->
                <!-- space-y-6: espacement 1.5rem entre enfants -->
                
                <!-- ==================== SECTION CIVILITÉ ==================== -->
                <div class="space-y-3">
                    <!-- LIGNE 169: Container pour civilité -->
                    <!-- space-y-3: espacement 0.75rem entre enfants -->
                    
                    <label class="text-sm font-medium text-gray-700 block">
                        <!-- LIGNE 173: Label pour civilité -->
                        <!-- text-sm: taille 0.875rem -->
                        <!-- font-medium: police moyenne -->
                        <!-- text-gray-700: couleur gris -->
                        <!-- block: affichage bloc -->
                        Civilité <span class="text-red-500">*</span>
                        <!-- span: astérisque rouge pour champ requis -->
                        <!-- text-red-500: couleur rouge -->
                    </label>
                    
                    <div class="flex flex-wrap gap-4">
                        <!-- LIGNE 182: Container pour radios civilité -->
                        <!-- flex: affichage flexbox -->
                        <!-- flex-wrap: retour ligne si nécessaire -->
                        <!-- gap-4: espacement 1rem entre éléments -->
                        
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <!-- LIGNE 188: Label pour radio Monsieur -->
                            <!-- flex items-center: alignement vertical centré -->
                            <!-- space-x-2: espacement horizontal 0.5rem -->
                            <!-- cursor-pointer: curseur main au survol -->
                            
                            <input type="radio" name="civilite" value="monsieur" 
                                   class="w-4 h-4 text-blue-600 focus:ring-blue-500 focus:ring-2">
                            <!-- LIGNE 194: Input radio Monsieur -->
                            <!-- type="radio": bouton radio HTML -->
                            <!-- name: groupe "civilite" -->
                            <!-- value: valeur envoyée -->
                            <!-- w-4 h-4: dimensions 1rem × 1rem -->
                            <!-- text-blue-600: couleur sélection -->
                            <!-- focus:ring-blue-500: anneau focus bleu -->
                            <!-- focus:ring-2: épaisseur anneau 2px -->
                            
                            <span class="text-gray-700 font-medium">Monsieur</span>
                            <!-- LIGNE 203: Texte du label -->
                            <!-- text-gray-700: couleur gris -->
                            <!-- font-medium: police moyenne -->
                        </label>
                        
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" name="civilite" value="madame" 
                                   class="w-4 h-4 text-blue-600 focus:ring-blue-500 focus:ring-2">
                            <span class="text-gray-700 font-medium">Madame</span>
                        </label>
                        
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" name="civilite" value="autre" 
                                   class="w-4 h-4 text-blue-600 focus:ring-blue-500 focus:ring-2">
                            <span class="text-gray-700 font-medium">Autre</span>
                        </label>
                    </div>
                </div>

                <!-- ==================== SECTION INFORMATIONS PERSONNELLES ==================== -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- LIGNE 220: Grille responsive pour prénom/nom -->
                    <!-- grid: système de grille CSS -->
                    <!-- grid-cols-1: 1 colonne sur mobile -->
                    <!-- md:grid-cols-2: 2 colonnes sur écrans moyens+ -->
                    <!-- gap-6: espacement 1.5rem entre cellules -->
                    
                    <!-- Champ Prénom -->
                    <div class="space-y-2">
                        <!-- LIGNE 227: Container prénom -->
                        <!-- space-y-2: espacement 0.5rem vertical -->
                        
                        <label for="prenom" class="text-sm font-medium text-gray-700 block">
                            <!-- LIGNE 231: Label prénom -->
                            <!-- for: association avec input id="prenom" -->
                            Prénom <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="prenom" name="prenom" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                                      focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                                      hover:border-gray-400 transition duration-200"
                               placeholder="Votre prénom">
                        <!-- LIGNE 237: Input prénom avec styles Tailwind -->
                        <!-- type="text": champ texte -->
                        <!-- required: validation HTML5 -->
                        <!-- w-full: largeur 100% -->
                        <!-- px-3 py-2: padding horizontal 0.75rem, vertical 0.5rem -->
                        <!-- border border-gray-300: bordure gris clair -->
                        <!-- rounded-md: coins arrondis moyens -->
                        <!-- shadow-sm: petite ombre -->
                        <!-- focus:outline-none: supprime outline par défaut -->
                        <!-- focus:ring-2: anneau focus 2px -->
                        <!-- focus:ring-blue-500: couleur anneau bleu -->
                        <!-- focus:border-blue-500: bordure bleue au focus -->
                        <!-- hover:border-gray-400: bordure plus foncée au survol -->
                        <!-- transition duration-200: animation 200ms -->
                        <!-- placeholder: texte d'aide -->
                    </div>
                    
                    <!-- Champ Nom -->
                    <div class="space-y-2">
                        <label for="nom" class="text-sm font-medium text-gray-700 block">
                            Nom <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="nom" name="nom" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                                      focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                                      hover:border-gray-400 transition duration-200"
                               placeholder="Votre nom de famille">
                    </div>
                </div>

                <!-- ==================== SECTION ADRESSE ==================== -->
                <div class="space-y-2">
                    <!-- LIGNE 264: Container pour adresse complète -->
                    
                    <label for="adresse" class="text-sm font-medium text-gray-700 block">
                        Adresse <span class="text-red-500">*</span>
                    </label>
                    <textarea id="adresse" name="adresse" required rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                                     focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                                     hover:border-gray-400 transition duration-200 resize-vertical"
                              placeholder="Votre adresse complète (rue, ville, code postal)"></textarea>
                    <!-- LIGNE 272: Textarea pour adresse -->
                    <!-- textarea: champ texte multiligne -->
                    <!-- rows="3": 3 lignes visibles par défaut -->
                    <!-- resize-vertical: redimensionnement vertical seulement -->
                </div>

                <!-- ==================== SECTION EMAIL ==================== -->
                <div class="space-y-2">
                    <label for="email" class="text-sm font-medium text-gray-700 block">
                        Adresse Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" id="email" name="email" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                                  focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                                  hover:border-gray-400 transition duration-200"
                           placeholder="exemple@email.com">
                    <!-- LIGNE 287: Input email avec validation HTML5 -->
                    <!-- type="email": validation format email automatique -->
                </div>

                <!-- ==================== SECTION MOTS DE PASSE ==================== -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- LIGNE 292: Grille pour password et confirmation -->
                    
                    <!-- Champ Password -->
                    <div class="space-y-2">
                        <label for="password" class="text-sm font-medium text-gray-700 block">
                            Mot de passe <span class="text-red-500">*</span>
                        </label>
                        <input type="password" id="password" name="password" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                                      focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                                      hover:border-gray-400 transition duration-200"
                               placeholder="Votre mot de passe">
                        <!-- LIGNE 303: Input password -->
                        <!-- type="password": masque la saisie -->
                    </div>
                    
                    <!-- Champ Confirmation Password -->
                    <div class="space-y-2">
                        <label for="password_confirm" class="text-sm font-medium text-gray-700 block">
                            Confirmer le mot de passe <span class="text-red-500">*</span>
                        </label>
                        <input type="password" id="password_confirm" name="password_confirm" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                                      focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                                      hover:border-gray-400 transition duration-200"
                               placeholder="Confirmez votre mot de passe">
                    </div>
                </div>

                <!-- ==================== SECTION PASSIONS (CHECKBOXES) ==================== -->
                <div class="space-y-3">
                    <!-- LIGNE 321: Container pour passions -->
                    
                    <label class="text-sm font-medium text-gray-700 block">
                        Centres d'intérêt
                    </label>
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <!-- LIGNE 328: Grille responsive pour checkboxes -->
                        <!-- grid-cols-2: 2 colonnes sur mobile -->
                        <!-- md:grid-cols-4: 4 colonnes sur écrans moyens+ -->
                        
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <!-- LIGNE 333: Label pour checkbox informatique -->
                            
                            <input type="checkbox" name="passions[]" value="informatique"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded 
                                          focus:ring-blue-500 focus:ring-2 checkbox-custom">
                            <!-- LIGNE 337: Checkbox informatique -->
                            <!-- type="checkbox": case à cocher -->
                            <!-- name="passions[]": tableau PHP pour multiples valeurs -->
                            <!-- value: valeur envoyée si cochée -->
                            <!-- bg-gray-100: fond gris clair -->
                            <!-- border-gray-300: bordure gris -->
                            <!-- rounded: coins arrondis -->
                            <!-- checkbox-custom: classe personnalisée -->
                            
                            <span class="text-gray-700 text-sm">Informatique</span>
                            <!-- LIGNE 346: Label texte -->
                            <!-- text-sm: taille petite -->
                        </label>
                        
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="checkbox" name="passions[]" value="voyages"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded 
                                          focus:ring-blue-500 focus:ring-2 checkbox-custom">
                            <span class="text-gray-700 text-sm">Voyages</span>
                        </label>
                        
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="checkbox" name="passions[]" value="sport"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded 
                                          focus:ring-blue-500 focus:ring-2 checkbox-custom">
                            <span class="text-gray-700 text-sm">Sport</span>
                        </label>
                        
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="checkbox" name="passions[]" value="lecture"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded 
                                          focus:ring-blue-500 focus:ring-2 checkbox-custom">
                            <span class="text-gray-700 text-sm">Lecture</span>
                        </label>
                    </div>
                </div>

                <!-- ==================== BOUTON DE VALIDATION ==================== -->
                <div class="pt-6">
                    <!-- LIGNE 371: Container pour bouton avec padding top -->
                    <!-- pt-6: padding top 1.5rem -->
                    
                    <button type="submit" 
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 
                                   rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 
                                   transition duration-300 ease-in-out btn-hover focus:outline-none 
                                   focus:ring-4 focus:ring-blue-300">
                        <!-- LIGNE 376: Bouton submit avec effets avancés -->
                        <!-- type="submit": soumission du formulaire -->
                        <!-- w-full: largeur 100% -->
                        <!-- bg-blue-600: fond bleu -->
                        <!-- hover:bg-blue-700: fond plus foncé au survol -->
                        <!-- text-white: texte blanc -->
                        <!-- font-bold: police grasse -->
                        <!-- py-3 px-6: padding vertical 0.75rem, horizontal 1.5rem -->
                        <!-- rounded-lg: coins arrondis large -->
                        <!-- shadow-lg: ombre large -->
                        <!-- hover:shadow-xl: ombre plus grande au survol -->
                        <!-- transform hover:-translate-y-0.5: déplacement vertical au survol -->
                        <!-- transition duration-300: animation 300ms -->
                        <!-- ease-in-out: courbe d'animation -->
                        <!-- btn-hover: classe custom -->
                        <!-- focus:outline-none: supprime outline -->
                        <!-- focus:ring-4: anneau focus 4px -->
                        <!-- focus:ring-blue-300: couleur anneau bleu clair -->
                        
                         Créer mon compte
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- ==================== FOOTER ==================== -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <!-- LIGNE 399: Footer avec fond sombre -->
        <!-- bg-gray-800: fond gris très foncé -->
        <!-- text-white: texte blanc -->
        <!-- py-8: padding vertical 2rem -->
        <!-- mt-12: marge top 3rem -->
        
        <div class="container mx-auto px-4">
            <!-- LIGNE 406: Container footer centré -->
            
            <div class="flex flex-col md:flex-row justify-between items-center">
                <!-- LIGNE 409: Layout flexible responsive -->
                
                <div class="mb-4 md:mb-0">
                    <!-- LIGNE 412: Container copyright -->
                    
                    <p class="text-gray-300">
                        <!-- LIGNE 415: Texte copyright -->
                        <!-- text-gray-300: couleur gris clair -->
                        &copy; 2025 Mon Site Web. Tous droits réservés.
                    </p>
                </div>
                
                <nav>
                    <!-- LIGNE 422: Navigation footer -->
                    
                    <ul class="flex space-x-6">
                        <!-- LIGNE 425: Liste liens footer -->
                        <!-- flex: affichage horizontal -->
                        <!-- space-x-6: espacement 1.5rem entre liens -->
                        
                        <li>
                            <a href="index.php" class="text-gray-300 hover:text-white transition duration-300">
                                <!-- LIGNE 431: Lien footer avec transition -->
                                <!-- text-gray-300: couleur gris clair -->
                                <!-- hover:text-white: blanc au survol -->
                                <!-- transition duration-300: animation 300ms -->
                                Accueil
                            </a>
                        </li>
                        <li>
                            <a href="index.php" class="text-gray-300 hover:text-white transition duration-300">
                                Inscription
                            </a>
                        </li>
                        <li>
                            <a href="index.php" class="text-gray-300 hover:text-white transition duration-300">
                                Connexion
                            </a>
                        </li>
                        <li>
                            <a href="index.php" class="text-gray-300 hover:text-white transition duration-300">
                                Rechercher
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </footer>

    <!-- ==================== JAVASCRIPT POUR INTERACTIVITÉ ==================== -->
    <script>
        // LIGNE 453: Script pour améliorations UX
        
        document.addEventListener('DOMContentLoaded', function() {
            // LIGNE 456: Attendre que le DOM soit chargé
            
            // ==================== VALIDATION MOTS DE PASSE ==================== //
            const password = document.getElementById('password');
            const passwordConfirm = document.getElementById('password_confirm');
            
            function validatePasswords() {
                // LIGNE 463: Fonction validation passwords
                
                if (password.value !== passwordConfirm.value) {
                    // LIGNE 466: Vérification concordance passwords
                    
                    passwordConfirm.setCustomValidity('Les mots de passe ne correspondent pas');
                    // LIGNE 469: Message d'erreur HTML5
                    passwordConfirm.classList.add('border-red-500', 'focus:border-red-500', 'focus:ring-red-500');
                    // LIGNE 471: Classes Tailwind pour erreur (bordure rouge)
                    passwordConfirm.classList.remove('border-gray-300', 'focus:border-blue-500', 'focus:ring-blue-500');
                    // LIGNE 473: Supprime classes normales
                } else {
                    passwordConfirm.setCustomValidity('');
                    // LIGNE 476: Pas d'erreur
                    passwordConfirm.classList.remove('border-red-500', 'focus:border-red-500', 'focus:ring-red-500');
                    // LIGNE 478: Supprime classes erreur
                    passwordConfirm.classList.add('border-gray-300', 'focus:border-blue-500', 'focus:ring-blue-500');
                    // LIGNE 480: Remet classes normales
                }
            }
            
            // LIGNE 484: Event listeners pour validation temps réel
            password.addEventListener('input', validatePasswords);
            passwordConfirm.addEventListener('input', validatePasswords);
            
            // ==================== ANIMATION SMOOTH SCROLL ==================== //
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                // LIGNE 491: Animation à la soumission
                
                // Validation basique avant soumission
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;
                
                requiredFields.forEach(field => {
                    // LIGNE 498: Vérification champs requis
                    
                    if (!field.value.trim()) {
                        // LIGNE 501: Si champ vide
                        isValid = false;
                        field.classList.add('border-red-500');
                        // LIGNE 504: Bordure rouge pour champs vides
                    } else {
                        field.classList.remove('border-red-500');
                        // LIGNE 507: Supprime bordure rouge si valide
                    }
                });
                
                if (!isValid) {
                    // LIGNE 512: Si erreurs trouvées
                    e.preventDefault();
                    // LIGNE 514: Empêche soumission
                    
                    // Scroll vers premier champ avec erreur
                    const firstError = form.querySelector('.border-red-500');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        // LIGNE 520: Scroll smooth vers erreur
                        firstError.focus();
                        // LIGNE 522: Focus sur champ erreur
                    }
                }
            });
        });
    </script>
</body>
</html>