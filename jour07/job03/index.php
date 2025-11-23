<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- ==================== MÉTADONNÉES HTML5 ==================== -->
    <meta charset="UTF-8">
    <!-- LIGNE 5: Encodage UTF-8 pour caractères français et spéciaux -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LIGNE 8: Configuration responsive pour tous appareils -->
    
    <title>Footer Stylé avec Tailwind CSS</title>
    <!-- LIGNE 11: Titre affiché dans l'onglet du navigateur -->
    
    <!-- ==================== TAILWIND CSS CDN ==================== -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- LIGNE 15: Inclusion de Tailwind CSS via CDN Play -->
    <!-- UTILITÉ: Framework utility-first pour styling rapide -->
    <!-- AVANTAGE: Pas de build process, pas de fichier CSS externe -->
    <!-- APPROCHE: Classes Tailwind uniquement pour le styling -->
    
    <!-- ==================== CONFIGURATION TAILWIND PERSONNALISÉE ==================== -->
    <script>
        // LIGNE 21: Configuration custom de Tailwind
        tailwind.config = {
            theme: {
                extend: {
                    // LIGNE 25: Extension du thème par défaut
                    colors: {
                        // LIGNE 27: Couleurs personnalisées pour le footer
                        'footer': {
                            'dark': '#0f172a',
                            'darker': '#020617',
                            'accent': '#06b6d4',
                            'accent-light': '#67e8f9',
                        }
                    },
                    // LIGNE 35: Animation personnalisée
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'float': 'float 3s ease-in-out infinite',
                    },
                    // LIGNE 41: Keyframes pour animations
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>
</head>

<!-- ==================== CORPS DU DOCUMENT ==================== -->
<body class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50">
    <!-- LIGNE 58: Classes Tailwind appliquées au body -->
    <!-- min-h-screen: hauteur minimum de l'écran -->
    <!-- bg-gradient-to-br: dégradé diagonal bottom-right -->
    <!-- from-gray-50 to-blue-50: dégradé gris vers bleu clair -->

    <!-- ==================== HEADER PRINCIPAL AVEC STYLING TAILWIND ==================== -->
    <header class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-700 shadow-2xl border-b-4 border-white/20">
        <div class="container mx-auto px-6 py-8 lg:px-8">
            <nav class="flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                <div class="flex items-center space-x-4 animate-fade-in">
                    <div class="bg-white/10 p-3 rounded-full backdrop-blur-sm border border-white/30">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <div class="text-left">
                        <h1 class="text-3xl lg:text-4xl xl:text-5xl font-black text-white leading-tight tracking-tight">
                            <span class="bg-gradient-to-r from-yellow-300 to-orange-400 bg-clip-text text-transparent">Mon Site</span>
                            <br>
                            <span class="text-blue-100">Web Moderne</span>
                        </h1>
                        <p class="text-lg text-blue-100/80 mt-2 font-medium">Plateforme digitale innovante</p>
                    </div>
                </div>
                
                <div class="flex flex-col lg:flex-row items-center space-y-3 lg:space-y-0 lg:space-x-8">
                    <ul class="flex flex-col lg:flex-row items-center space-y-2 lg:space-y-0 lg:space-x-6">
                        <li>
                            <a href="index.php" class="relative px-4 py-2 text-lg font-semibold text-white hover:text-yellow-300 
                                      transition-all duration-300 ease-in-out transform hover:scale-105 group">
                                <span class="relative z-10">Accueil</span>
                                <div class="absolute inset-0 bg-white/10 rounded-lg scale-0 group-hover:scale-100 
                                           transition-transform duration-300 ease-out backdrop-blur-sm"></div>
                            </a>
                        </li>
                        <li>
                            <a href="index.php" class="relative px-4 py-2 text-lg font-semibold text-white hover:text-yellow-300 
                                      transition-all duration-300 ease-in-out transform hover:scale-105 group">
                                <span class="relative z-10">Inscription</span>
                                <div class="absolute inset-0 bg-white/10 rounded-lg scale-0 group-hover:scale-100 
                                           transition-transform duration-300 ease-out backdrop-blur-sm"></div>
                            </a>
                        </li>
                        <li>
                            <a href="index.php" class="relative px-4 py-2 text-lg font-semibold text-white hover:text-yellow-300 
                                      transition-all duration-300 ease-in-out transform hover:scale-105 group">
                                <span class="relative z-10">Connexion</span>
                                <div class="absolute inset-0 bg-white/10 rounded-lg scale-0 group-hover:scale-100 
                                           transition-transform duration-300 ease-out backdrop-blur-sm"></div>
                            </a>
                        </li>
                        <li>
                            <a href="index.php" class="relative px-4 py-2 text-lg font-semibold text-white hover:text-yellow-300 
                                      transition-all duration-300 ease-in-out transform hover:scale-105 group">
                                <span class="relative z-10">Rechercher</span>
                                <div class="absolute inset-0 bg-white/10 rounded-lg scale-0 group-hover:scale-100 
                                           transition-transform duration-300 ease-out backdrop-blur-sm"></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!-- ==================== CONTENU PRINCIPAL SIMPLIFIÉ ==================== -->
    <main class="container mx-auto px-6 py-12">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl lg:text-6xl font-black text-gray-800 mb-6 leading-tight">
                Footer Stylé avec
                <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    Tailwind CSS
                </span>
            </h2>
            
            <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                Ce footer a été entièrement stylé avec les classes utilitaires Tailwind CSS,
                sans aucun fichier CSS externe. Focus sur les couleurs, l'alignement et 
                les effets visuels avancés.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12 mb-16">
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="text-3xl mb-4">🎨</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Design Coloré</h3>
                    <p class="text-gray-600">Footer avec dégradés et palette de couleurs harmonieuse</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="text-3xl mb-4">📐</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Alignement Parfait</h3>
                    <p class="text-gray-600">Layout responsive avec grilles et flexbox</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="text-3xl mb-4">⚡</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Animations</h3>
                    <p class="text-gray-600">Effets visuels et micro-interactions</p>
                </div>
            </div>
        </div>
    </main>

    <!-- ==================== FOOTER STYLÉ AVEC TAILWIND CSS ==================== -->
    <footer class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-purple-900 to-slate-800 text-white">
        <!-- LIGNE 152: Footer principal avec dégradé diagonal complexe -->
        <!-- relative: positionnement relatif pour éléments décoratifs -->
        <!-- overflow-hidden: masque les éléments qui dépassent -->
        <!-- bg-gradient-to-br: dégradé diagonal vers bottom-right -->
        <!-- from-slate-900: couleur départ gris-bleu très foncé -->
        <!-- via-purple-900: couleur intermédiaire violet foncé -->
        <!-- to-slate-800: couleur fin gris-bleu foncé -->
        <!-- text-white: texte blanc par défaut -->
        
        <!-- ==================== ÉLÉMENTS DÉCORATIFS D'ARRIÈRE-PLAN ==================== -->
        <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 to-blue-600/10"></div>
        <!-- LIGNE 162: Overlay dégradé pour profondeur -->
        <!-- absolute inset-0: couvre toute la superficie du footer -->
        <!-- bg-gradient-to-r: dégradé horizontal -->
        <!-- from-cyan-500/10: cyan avec opacité 10% -->
        <!-- to-blue-600/10: bleu avec opacité 10% -->
        
        <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-cyan-400 to-transparent"></div>
        <!-- LIGNE 168: Ligne décorative en haut -->
        <!-- top-0 left-0: position coin supérieur gauche -->
        <!-- w-full h-px: largeur pleine, hauteur 1 pixel -->
        <!-- bg-gradient-to-r: dégradé horizontal pour effet lumineux -->
        <!-- from-transparent via-cyan-400 to-transparent: transparent → cyan → transparent -->
        
        <!-- ==================== SECTION PRINCIPALE DU FOOTER ==================== -->
        <div class="relative z-10 container mx-auto px-6 pt-16 pb-8">
            <!-- LIGNE 175: Container principal avec z-index pour superposition -->
            <!-- relative z-10: assure que le contenu est au-dessus des éléments décoratifs -->
            <!-- container mx-auto: conteneur centré avec largeur max -->
            <!-- px-6: padding horizontal 1.5rem -->
            <!-- pt-16: padding top 4rem -->
            <!-- pb-8: padding bottom 2rem -->
            
            <!-- ==================== GRILLE PRINCIPALE DU CONTENU ==================== -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
                <!-- LIGNE 184: Grille responsive pour sections du footer -->
                <!-- grid grid-cols-1: 1 colonne sur mobile -->
                <!-- md:grid-cols-2: 2 colonnes sur écrans moyens -->
                <!-- lg:grid-cols-4: 4 colonnes sur grands écrans -->
                <!-- gap-8: espacement 2rem entre cellules -->
                <!-- lg:gap-12: espacement 3rem sur grands écrans -->
                
                <!-- ==================== SECTION ENTREPRISE / LOGO ==================== -->
                <div class="lg:col-span-2 space-y-6 animate-slide-up">
                    <!-- LIGNE 192: Section logo/entreprise étendue sur 2 colonnes -->
                    <!-- lg:col-span-2: occupe 2 colonnes sur grands écrans -->
                    <!-- space-y-6: espacement vertical 1.5rem entre enfants -->
                    <!-- animate-slide-up: animation personnalisée slide vers le haut -->
                    
                    <div class="flex items-center space-x-4">
                        <!-- LIGNE 198: Container logo avec icône -->
                        <!-- flex items-center: alignement horizontal centré -->
                        <!-- space-x-4: espacement horizontal 1rem entre éléments -->
                        
                        <div class="bg-gradient-to-br from-cyan-400 to-blue-500 p-3 rounded-2xl shadow-xl">
                            <!-- LIGNE 203: Container icône avec dégradé coloré -->
                            <!-- bg-gradient-to-br: dégradé diagonal -->
                            <!-- from-cyan-400 to-blue-500: cyan vers bleu -->
                            <!-- p-3: padding 0.75rem -->
                            <!-- rounded-2xl: coins très arrondis -->
                            <!-- shadow-xl: ombre extra large -->
                            
                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <!-- LIGNE 210: Icône SVG avec dimensions et couleur -->
                                <!-- w-8 h-8: dimensions 2rem × 2rem -->
                                <!-- text-white: couleur blanche -->
                                <!-- fill="currentColor": remplissage avec couleur du texte -->
                                
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                                <!-- LIGNE 216: Chemin SVG pour icône de site web/layers -->
                            </svg>
                        </div>
                        
                        <div>
                            <!-- LIGNE 221: Container texte logo -->
                            
                            <h3 class="text-2xl lg:text-3xl font-black bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
                                <!-- LIGNE 224: Titre avec texte dégradé -->
                                <!-- text-2xl: taille 1.5rem mobile -->
                                <!-- lg:text-3xl: taille 1.875rem desktop -->
                                <!-- font-black: poids police extra gras -->
                                <!-- bg-gradient-to-r: dégradé horizontal -->
                                <!-- from-cyan-400 to-blue-400: cyan vers bleu */
                                <!-- bg-clip-text: applique dégradé au texte -->
                                <!-- text-transparent: texte transparent pour voir dégradé -->
                                Mon Site Web
                            </h3>
                            
                            <p class="text-slate-400 font-medium">Plateforme digitale innovante</p>
                            <!-- LIGNE 235: Sous-titre descriptif -->
                            <!-- text-slate-400: couleur gris-bleu clair -->
                            <!-- font-medium: poids police moyen -->
                        </div>
                    </div>
                    
                    <p class="text-slate-300 leading-relaxed max-w-md">
                        <!-- LIGNE 241: Description entreprise -->
                        <!-- text-slate-300: couleur gris-bleu plus clair -->
                        <!-- leading-relaxed: interligne détendu pour lisibilité -->
                        <!-- max-w-md: largeur maximum 28rem -->
                        
                        Découvrez notre plateforme révolutionnaire qui transforme votre expérience 
                        digitale avec des technologies de pointe et un design exceptionnel.
                    </p>
                    
                    <!-- ==================== RÉSEAUX SOCIAUX ==================== -->
                    <div class="space-y-4">
                        <!-- LIGNE 251: Container réseaux sociaux -->
                        <!-- space-y-4: espacement vertical 1rem entre enfants -->
                        
                        <h4 class="text-lg font-bold text-cyan-400 flex items-center space-x-2">
                            <!-- LIGNE 255: Titre section réseaux -->
                            <!-- text-lg: taille 1.125rem -->
                            <!-- font-bold: police grasse -->
                            <!-- text-cyan-400: couleur cyan vif */
                            <!-- flex items-center: alignement horizontal centré */
                            <!-- space-x-2: espacement horizontal 0.5rem */
                            
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <!-- LIGNE 262: Icône réseaux sociaux -->
                                <!-- w-5 h-5: dimensions 1.25rem × 1.25rem -->
                                <!-- fill="none": pas de remplissage -->
                                <!-- stroke="currentColor": contour avec couleur du texte -->
                                
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2m-2-4H9m0 0L7 16l2-2zm0 0l2-2"/>
                                <!-- LIGNE 268: Chemin SVG pour icône partage/connexion -->
                            </svg>
                            <span>Suivez-nous</span>
                            <!-- LIGNE 272: Texte du titre -->
                        </h4>
                        
                        <div class="flex space-x-4">
                            <!-- LIGNE 276: Container boutons réseaux sociaux -->
                            <!-- flex: affichage horizontal -->
                            <!-- space-x-4: espacement 1rem entre boutons -->
                            
                            <a href="#" class="group bg-slate-800 hover:bg-gradient-to-br hover:from-blue-600 hover:to-cyan-500 
                                         p-3 rounded-full transition-all duration-300 transform hover:scale-110 hover:-translate-y-1">
                                <!-- LIGNE 281: Bouton réseau social avec effets avancés -->
                                <!-- group: classe pour effets de groupe -->
                                <!-- bg-slate-800: fond gris foncé par défaut -->
                                <!-- hover:bg-gradient-to-br: dégradé au survol -->
                                <!-- hover:from-blue-600 hover:to-cyan-500: couleurs dégradé survol -->
                                <!-- p-3: padding 0.75rem -->
                                <!-- rounded-full: forme circulaire -->
                                <!-- transition-all duration-300: animation toutes propriétés 300ms -->
                                <!-- transform: active les transformations */
                                <!-- hover:scale-110: agrandissement 10% au survol */
                                <!-- hover:-translate-y-1: déplacement vers haut au survol */
                                
                                <svg class="w-6 h-6 text-slate-400 group-hover:text-white transition-colors duration-300" 
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <!-- LIGNE 295: Icône Facebook avec animation couleur -->
                                    <!-- w-6 h-6: dimensions 1.5rem × 1.5rem -->
                                    <!-- text-slate-400: couleur grise par défaut */
                                    <!-- group-hover:text-white: blanc au survol du groupe */
                                    <!-- transition-colors duration-300: animation couleur 300ms */
                                    
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    <!-- LIGNE 302: Chemin SVG pour logo Facebook -->
                                </svg>
                            </a>
                            
                            <a href="#" class="group bg-slate-800 hover:bg-gradient-to-br hover:from-pink-600 hover:to-purple-500 
                                         p-3 rounded-full transition-all duration-300 transform hover:scale-110 hover:-translate-y-1">
                                <svg class="w-6 h-6 text-slate-400 group-hover:text-white transition-colors duration-300" 
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.024-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.347-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.017z"/>
                                    <!-- LIGNE 313: Chemin SVG pour logo Pinterest -->
                                </svg>
                            </a>
                            
                            <a href="#" class="group bg-slate-800 hover:bg-gradient-to-br hover:from-blue-500 hover:to-blue-600 
                                         p-3 rounded-full transition-all duration-300 transform hover:scale-110 hover:-translate-y-1">
                                <svg class="w-6 h-6 text-slate-400 group-hover:text-white transition-colors duration-300" 
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    <!-- LIGNE 324: Chemin SVG pour logo Twitter -->
                                </svg>
                            </a>
                            
                            <a href="#" class="group bg-slate-800 hover:bg-gradient-to-br hover:from-purple-600 hover:to-pink-500 
                                         p-3 rounded-full transition-all duration-300 transform hover:scale-110 hover:-translate-y-1">
                                <svg class="w-6 h-6 text-slate-400 group-hover:text-white transition-colors duration-300" 
                                     fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.026 2c-5.509 0-9.974 4.465-9.974 9.974 0 4.406 2.857 8.145 6.821 9.465.499-.09.679-.217.679-.481 0-.237-.008-.865-.013-1.698-2.782.602-3.369-1.342-3.369-1.342-.454-1.155-1.11-1.462-1.11-1.462-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112.026 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 11.974C22 6.465 17.535 2 12.026 2z"/>
                                    <!-- LIGNE 335: Chemin SVG pour logo GitHub -->
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- ==================== SECTION LIENS RAPIDES ==================== -->
                <div class="space-y-6 animate-slide-up" style="animation-delay: 0.2s;">
                    <!-- LIGNE 343: Section liens navigation -->
                    <!-- space-y-6: espacement vertical 1.5rem -->
                    <!-- animate-slide-up: animation slide avec délai CSS -->
                    
                    <h4 class="text-lg font-bold text-cyan-400 border-b-2 border-cyan-400/30 pb-2 flex items-center space-x-2">
                        <!-- LIGNE 348: Titre section avec bordure décorative -->
                        <!-- text-lg font-bold: taille et poids */
                        <!-- text-cyan-400: couleur cyan vif */
                        <!-- border-b-2: bordure bottom 2px */
                        <!-- border-cyan-400/30: bordure cyan avec opacité 30% */
                        <!-- pb-2: padding bottom 0.5rem */
                        <!-- flex items-center space-x-2: alignement et espacement */
                        
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <!-- LIGNE 356: Icône navigation -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                            <!-- LIGNE 359: Chemin SVG pour icône lien -->
                        </svg>
                        <span>Navigation</span>
                        <!-- LIGNE 363: Texte du titre -->
                    </h4>
                    
                    <ul class="space-y-3">
                        <!-- LIGNE 367: Liste des liens avec espacement -->
                        <!-- space-y-3: espacement vertical 0.75rem entre éléments -->
                        
                        <li>
                            <a href="index.php" 
                               class="group text-slate-300 hover:text-cyan-400 transition-all duration-300 
                                      flex items-center space-x-2 hover:translate-x-2">
                                <!-- LIGNE 373: Lien avec animation de déplacement -->
                                <!-- group: classe pour effets de groupe */
                                <!-- text-slate-300: couleur gris clair par défaut */
                                <!-- hover:text-cyan-400: cyan au survol */
                                <!-- transition-all duration-300: animation toutes propriétés 300ms */
                                <!-- flex items-center: alignement horizontal centré */
                                <!-- space-x-2: espacement horizontal 0.5rem */
                                <!-- hover:translate-x-2: déplacement horizontal au survol */
                                
                                <svg class="w-4 h-4 text-cyan-400/50 group-hover:text-cyan-400 transition-colors duration-300" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <!-- LIGNE 383: Icône flèche avec animation couleur -->
                                    <!-- w-4 h-4: petites dimensions 1rem × 1rem */
                                    <!-- text-cyan-400/50: cyan avec opacité 50% par défaut */
                                    <!-- group-hover:text-cyan-400: cyan plein au survol */
                                    <!-- transition-colors duration-300: animation couleur */
                                    
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    <!-- LIGNE 390: Chemin SVG pour flèche droite -->
                                </svg>
                                <span>Accueil</span>
                                <!-- LIGNE 393: Texte du lien -->
                            </a>
                        </li>
                        
                        <li>
                            <a href="index.php" 
                               class="group text-slate-300 hover:text-cyan-400 transition-all duration-300 
                                      flex items-center space-x-2 hover:translate-x-2">
                                <svg class="w-4 h-4 text-cyan-400/50 group-hover:text-cyan-400 transition-colors duration-300" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                <span>Inscription</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="index.php" 
                               class="group text-slate-300 hover:text-cyan-400 transition-all duration-300 
                                      flex items-center space-x-2 hover:translate-x-2">
                                <svg class="w-4 h-4 text-cyan-400/50 group-hover:text-cyan-400 transition-colors duration-300" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                <span>Connexion</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="index.php" 
                               class="group text-slate-300 hover:text-cyan-400 transition-all duration-300 
                                      flex items-center space-x-2 hover:translate-x-2">
                                <svg class="w-4 h-4 text-cyan-400/50 group-hover:text-cyan-400 transition-colors duration-300" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                                <span>Rechercher</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- ==================== SECTION CONTACT ==================== -->
                <div class="space-y-6 animate-slide-up" style="animation-delay: 0.4s;">
                    <!-- LIGNE 434: Section contact avec délai d'animation plus long -->
                    
                    <h4 class="text-lg font-bold text-cyan-400 border-b-2 border-cyan-400/30 pb-2 flex items-center space-x-2">
                        <!-- LIGNE 437: Titre section contact -->
                        
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <!-- LIGNE 440: Icône contact -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            <!-- LIGNE 443: Chemin SVG pour icône email -->
                        </svg>
                        <span>Contact</span>
                        <!-- LIGNE 447: Texte du titre -->
                    </h4>
                    
                    <div class="space-y-4">
                        <!-- LIGNE 451: Container informations contact -->
                        <!-- space-y-4: espacement vertical 1rem */
                        
                        <div class="flex items-start space-x-3 group">
                            <!-- LIGNE 455: Item contact email -->
                            <!-- flex items-start: alignement haut avec flex */
                            <!-- space-x-3: espacement horizontal 0.75rem */
                            <!-- group: classe pour effets de groupe */
                            
                            <div class="bg-cyan-500/20 p-2 rounded-lg group-hover:bg-cyan-500/30 transition-colors duration-300">
                                <!-- LIGNE 461: Container icône avec arrière-plan coloré -->
                                <!-- bg-cyan-500/20: fond cyan avec opacité 20% */
                                <!-- p-2: padding 0.5rem */
                                <!-- rounded-lg: coins arrondis */
                                <!-- group-hover:bg-cyan-500/30: fond plus intense au survol */
                                <!-- transition-colors duration-300: animation couleur */
                                
                                <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <!-- LIGNE 469: Icône email avec couleur cyan -->
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                    <!-- LIGNE 472: Chemin SVG pour arobase @ -->
                                </svg>
                            </div>
                            
                            <div>
                                <!-- LIGNE 477: Container texte contact -->
                                
                                <h5 class="text-white font-semibold">Email</h5>
                                <!-- LIGNE 480: Label contact -->
                                <!-- text-white: texte blanc */
                                <!-- font-semibold: police semi-grasse */
                                
                                <p class="text-slate-400 text-sm">contact@monsite.com</p>
                                <!-- LIGNE 485: Information contact -->
                                <!-- text-slate-400: couleur gris clair */
                                <!-- text-sm: taille petite */
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3 group">
                            <!-- LIGNE 491: Item contact téléphone -->
                            
                            <div class="bg-cyan-500/20 p-2 rounded-lg group-hover:bg-cyan-500/30 transition-colors duration-300">
                                <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    <!-- LIGNE 497: Chemin SVG pour icône téléphone -->
                                </svg>
                            </div>
                            
                            <div>
                                <h5 class="text-white font-semibold">Téléphone</h5>
                                <p class="text-slate-400 text-sm">+33 1 23 45 67 89</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-3 group">
                            <!-- LIGNE 507: Item contact adresse -->
                            
                            <div class="bg-cyan-500/20 p-2 rounded-lg group-hover:bg-cyan-500/30 transition-colors duration-300">
                                <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <!-- LIGNE 515: Chemins SVG pour icône localisation -->
                                </svg>
                            </div>
                            
                            <div>
                                <h5 class="text-white font-semibold">Adresse</h5>
                                <p class="text-slate-400 text-sm">123 Rue de la Paix<br>75001 Paris, France</p>
                                <!-- LIGNE 522: Adresse avec saut de ligne HTML -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ==================== SECTION NEWSLETTER ==================== -->
            <div class="mt-12 pt-8 border-t border-slate-700/50">
                <!-- LIGNE 530: Section newsletter séparée par bordure -->
                <!-- mt-12: marge top 3rem */
                <!-- pt-8: padding top 2rem */
                <!-- border-t: bordure top */
                <!-- border-slate-700/50: bordure gris foncé avec opacité 50% */
                
                <div class="max-w-md mx-auto text-center space-y-4">
                    <!-- LIGNE 537: Container newsletter centré -->
                    <!-- max-w-md: largeur max 28rem */
                    <!-- mx-auto: centrage horizontal */
                    <!-- text-center: texte centré */
                    <!-- space-y-4: espacement vertical 1rem */
                    
                    <h4 class="text-xl font-bold bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">
                        <!-- LIGNE 544: Titre newsletter avec texte dégradé -->
                        <!-- text-xl: taille 1.25rem */
                        <!-- font-bold: police grasse */
                        <!-- bg-gradient-to-r: dégradé horizontal */
                        <!-- from-cyan-400 to-blue-400: cyan vers bleu */
                        <!-- bg-clip-text text-transparent: applique dégradé au texte */
                        Restez informé
                    </h4>
                    
                    <p class="text-slate-400 text-sm">
                        <!-- LIGNE 553: Description newsletter -->
                        <!-- text-slate-400: couleur gris clair */
                        <!-- text-sm: taille petite */
                        Recevez les dernières actualités et offres exclusives
                    </p>
                    
                    <form class="flex flex-col sm:flex-row gap-3">
                        <!-- LIGNE 559: Formulaire newsletter responsive -->
                        <!-- flex: affichage flex */
                        <!-- flex-col: colonne sur mobile */
                        <!-- sm:flex-row: ligne sur petits écrans et plus */
                        <!-- gap-3: espacement 0.75rem entre éléments */
                        
                        <input type="email" placeholder="Votre email" 
                               class="flex-1 bg-slate-800/50 border border-slate-600 text-white placeholder-slate-400 
                                      px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 
                                      focus:border-transparent transition-all duration-300">
                        <!-- LIGNE 567: Input email avec styling complet -->
                        <!-- flex-1: prend l'espace disponible */
                        <!-- bg-slate-800/50: fond gris foncé avec opacité 50% */
                        <!-- border border-slate-600: bordure gris moyen */
                        <!-- text-white: texte blanc */
                        <!-- placeholder-slate-400: placeholder gris clair */
                        <!-- px-4 py-2: padding horizontal 1rem, vertical 0.5rem */
                        <!-- rounded-lg: coins arrondis */
                        <!-- focus:outline-none: supprime outline par défaut */
                        <!-- focus:ring-2: anneau focus 2px */
                        <!-- focus:ring-cyan-400: couleur anneau cyan */
                        <!-- focus:border-transparent: bordure transparente au focus */
                        <!-- transition-all duration-300: animation toutes propriétés */
                        
                        <button type="submit" 
                                class="bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 
                                       text-white font-bold px-6 py-2 rounded-lg transition-all duration-300 
                                       transform hover:scale-105 hover:shadow-lg hover:shadow-cyan-500/25">
                            <!-- LIGNE 583: Bouton submit avec dégradé et effets -->
                            <!-- bg-gradient-to-r: dégradé horizontal */
                            <!-- from-cyan-500 to-blue-600: cyan vers bleu */
                            <!-- hover:from-cyan-600 hover:to-blue-700: couleurs plus foncées au survol */
                            <!-- text-white font-bold: texte blanc et gras */
                            <!-- px-6 py-2: padding horizontal 1.5rem, vertical 0.5rem */
                            <!-- rounded-lg: coins arrondis */
                            <!-- transition-all duration-300: animation complète */
                            <!-- transform hover:scale-105: agrandissement au survol */
                            <!-- hover:shadow-lg: ombre large au survol */
                            <!-- hover:shadow-cyan-500/25: ombre cyan avec opacité 25% */
                            S'inscrire
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- ==================== SECTION COPYRIGHT ==================== -->
        <div class="relative z-10 border-t border-slate-700/50 mt-12 pt-8">
            <!-- LIGNE 598: Section copyright séparée -->
            <!-- relative z-10: au-dessus des éléments décoratifs */
            <!-- border-t border-slate-700/50: bordure top grise */
            <!-- mt-12 pt-8: marge et padding top */
            
            <div class="container mx-auto px-6">
                <!-- LIGNE 604: Container copyright -->
                
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <!-- LIGNE 607: Layout flexible responsive pour copyright -->
                    <!-- flex flex-col: colonne sur mobile */
                    <!-- md:flex-row: ligne sur écrans moyens+ */
                    <!-- justify-between: espacement maximal entre éléments */
                    <!-- items-center: alignement vertical centré */
                    <!-- space-y-4: espacement vertical mobile */
                    <!-- md:space-y-0: supprime espacement vertical desktop */
                    
                    <div class="flex items-center space-x-2">
                        <!-- LIGNE 616: Container copyright avec icône -->
                        <!-- flex items-center: alignement horizontal */
                        <!-- space-x-2: espacement horizontal 0.5rem */
                        
                        <svg class="w-5 h-5 text-cyan-400 animate-float" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <!-- LIGNE 621: Icône copyright avec animation flottante -->
                            <!-- w-5 h-5: dimensions 1.25rem × 1.25rem */
                            <!-- text-cyan-400: couleur cyan */
                            <!-- animate-float: animation personnalisée flottement */
                            
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            <!-- LIGNE 627: Chemin SVG pour icône ampoule/créativité */
                        </svg>
                        
                        <p class="text-slate-400">
                            <!-- LIGNE 631: Texte copyright -->
                            <!-- text-slate-400: couleur gris clair */
                            &copy; 2025 <span class="text-cyan-400 font-semibold">Mon Site Web</span>. 
                            Footer entièrement stylé avec 
                            <span class="bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent font-bold">Tailwind CSS</span>.
                            <!-- LIGNE 635: Spans avec couleurs et effets spéciaux -->
                            <!-- text-cyan-400 font-semibold: nom site en cyan semi-gras */
                            <!-- bg-gradient-to-r bg-clip-text text-transparent: texte dégradé pour "Tailwind CSS" */
                        </p>
                    </div>
                    
                    <div class="flex items-center space-x-6 text-sm">
                        <!-- LIGNE 641: Container liens légaux -->
                        <!-- flex items-center: alignement horizontal */
                        <!-- space-x-6: espacement 1.5rem entre liens */
                        <!-- text-sm: taille petite */
                        
                        <a href="#" class="text-slate-400 hover:text-cyan-400 transition-colors duration-300 hover:underline">
                            <!-- LIGNE 647: Lien conditions -->
                            <!-- text-slate-400: couleur gris par défaut */
                            <!-- hover:text-cyan-400: cyan au survol */
                            <!-- transition-colors duration-300: animation couleur */
                            <!-- hover:underline: soulignement au survol */
                            Conditions d'utilisation
                        </a>
                        
                        <a href="#" class="text-slate-400 hover:text-cyan-400 transition-colors duration-300 hover:underline">
                            Politique de confidentialité
                        </a>
                        
                        <a href="#" class="text-slate-400 hover:text-cyan-400 transition-colors duration-300 hover:underline">
                            Mentions légales
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- ==================== ÉLÉMENTS DÉCORATIFS FLOTTANTS ==================== -->
        <div class="absolute top-10 right-10 w-32 h-32 bg-gradient-to-br from-cyan-400/5 to-blue-500/5 rounded-full blur-xl animate-float"></div>
        <!-- LIGNE 663: Cercle décoratif flottant 1 -->
        <!-- absolute top-10 right-10: position coin supérieur droit */
        <!-- w-32 h-32: dimensions 8rem × 8rem */
        <!-- bg-gradient-to-br: dégradé diagonal */
        <!-- from-cyan-400/5 to-blue-500/5: couleurs avec opacité très faible 5% */
        <!-- rounded-full: forme circulaire */
        <!-- blur-xl: effet de flou extra large */
        <!-- animate-float: animation flottement */
        
        <div class="absolute bottom-20 left-10 w-24 h-24 bg-gradient-to-tr from-purple-400/10 to-pink-400/10 rounded-full blur-lg animate-float" style="animation-delay: 1s;"></div>
        <!-- LIGNE 672: Cercle décoratif flottant 2 avec délai */
        <!-- bottom-20 left-10: position bas gauche */
        <!-- w-24 h-24: dimensions 6rem × 6rem */
        <!-- bg-gradient-to-tr: dégradé vers top-right */
        <!-- from-purple-400/10 to-pink-400/10: violet vers rose opacité 10% */
        <!-- blur-lg: effet de flou large */
        <!-- animation-delay: 1s: délai CSS d'1 seconde */
        
        <div class="absolute top-1/2 left-1/3 w-16 h-16 bg-gradient-to-r from-yellow-400/8 to-orange-400/8 rounded-lg rotate-45 blur-md animate-float" style="animation-delay: 2s;"></div>
        <!-- LIGNE 680: Carré décoratif rotatif flottant -->
        <!-- top-1/2 left-1/3: position centre vertical, tiers horizontal */
        <!-- w-16 h-16: dimensions 4rem × 4rem */
        <!-- bg-gradient-to-r: dégradé horizontal */
        <!-- from-yellow-400/8 to-orange-400/8: jaune vers orange opacité 8% */
        <!-- rounded-lg: coins légèrement arrondis */
        <!-- rotate-45: rotation 45 degrés */
        <!-- blur-md: effet de flou moyen */
        <!-- animation-delay: 2s: délai CSS de 2 secondes */
    </footer>
</body>
</html>