<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- ==================== MÉTADONNÉES HTML5 ==================== -->
    <meta charset="UTF-8">
    <!-- LIGNE 5: Encodage UTF-8 pour caractères français et spéciaux -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LIGNE 8: Configuration responsive pour tous appareils -->
    
    <title>Header Stylé avec Tailwind CSS</title>
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
                        // LIGNE 27: Couleurs personnalisées pour le header
                        'custom': {
                            'blue': '#1e3a8a',
                            'purple': '#7c3aed',
                            'gradient-start': '#3b82f6',
                            'gradient-end': '#8b5cf6',
                        }
                    },
                    // LIGNE 35: Animation personnalisée
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-in-out',
                        'slide-down': 'slideDown 0.6s ease-out',
                    },
                    // LIGNE 40: Keyframes pour animations
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideDown: {
                            '0%': { transform: 'translateY(-20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>
</head>

<!-- ==================== CORPS DU DOCUMENT ==================== -->
<body class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50">
    <!-- LIGNE 56: Classes Tailwind appliquées au body -->
    <!-- min-h-screen: hauteur minimum de l'écran -->
    <!-- bg-gradient-to-br: dégradé diagonal bottom-right -->
    <!-- from-gray-50 to-blue-50: dégradé gris vers bleu clair -->

    <!-- ==================== HEADER PRINCIPAL AVEC STYLING TAILWIND ==================== -->
    <header class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-700 shadow-2xl border-b-4 border-white/20">
        <!-- LIGNE 62: Header avec dégradé horizontal uniquement Tailwind -->
        <!-- bg-gradient-to-r: dégradé linéaire de gauche à droite -->
        <!-- from-blue-600: couleur de départ bleu -->
        <!-- via-purple-600: couleur intermédiaire violet -->
        <!-- to-indigo-700: couleur de fin indigo foncé -->
        <!-- shadow-2xl: ombre portée extra large -->
        <!-- border-b-4: bordure bottom 4px -->
        <!-- border-white/20: bordure blanche avec opacité 20% -->
        
        <div class="container mx-auto px-6 py-8 lg:px-8 relative z-10">
            <!-- LIGNE 71: Container responsive avec padding adaptatif -->
            <!-- container: largeur max avec marges auto -->
            <!-- mx-auto: centrage horizontal -->
            <!-- px-6: padding horizontal 1.5rem -->
            <!-- py-8: padding vertical 2rem -->
            <!-- lg:px-8: padding horizontal 2rem sur large écrans -->
            
            <nav class="flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                <!-- LIGNE 78: Navigation avec layout flexible responsive -->
                <!-- flex: affichage flexbox -->
                <!-- flex-col: disposition en colonne sur mobile -->
                <!-- lg:flex-row: disposition en ligne sur large écrans -->
                <!-- justify-between: espacement maximal entre éléments -->
                <!-- items-center: alignement vertical centré -->
                <!-- space-y-4: espacement vertical 1rem entre enfants sur mobile -->
                <!-- lg:space-y-0: supprime espacement vertical sur desktop -->
                
                <!-- ==================== SECTION LOGO/TITRE ==================== -->
                <div class="flex items-center space-x-4 animate-fade-in">
                    <!-- LIGNE 87: Container logo avec animation -->
                    <!-- flex items-center: alignement horizontal centré -->
                    <!-- space-x-4: espacement horizontal 1rem entre enfants -->
                    <!-- animate-fade-in: animation custom définie dans config -->
                    
                    <div class="bg-white/10 p-3 rounded-full backdrop-blur-sm border border-white/30">
                        <!-- LIGNE 93: Container icône avec effet glassmorphism -->
                        <!-- bg-white/10: fond blanc avec opacité 10% -->
                        <!-- p-3: padding 0.75rem -->
                        <!-- rounded-full: forme circulaire parfaite -->
                        <!-- backdrop-blur-sm: effet de flou d'arrière-plan -->
                        <!-- border border-white/30: bordure blanche opacité 30% -->
                        
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <!-- LIGNE 100: Icône SVG avec Tailwind -->
                            <!-- w-8 h-8: dimensions 2rem × 2rem -->
                            <!-- text-white: couleur blanche -->
                            <!-- fill="currentColor": remplit avec couleur du texte -->
                            
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                            <!-- LIGNE 106: Chemin SVG pour icône de site web -->
                        </svg>
                    </div>
                    
                    <div class="text-left">
                        <!-- LIGNE 111: Container texte titre -->
                        <!-- text-left: alignement texte à gauche -->
                        
                        <h1 class="text-3xl lg:text-4xl xl:text-5xl font-black text-white leading-tight tracking-tight">
                            <!-- LIGNE 115: Titre principal responsive -->
                            <!-- text-3xl: taille 1.875rem sur mobile -->
                            <!-- lg:text-4xl: taille 2.25rem sur large écrans -->
                            <!-- xl:text-5xl: taille 3rem sur extra large écrans -->
                            <!-- font-black: poids police extra gras (900) -->
                            <!-- text-white: couleur blanche -->
                            <!-- leading-tight: interligne serré -->
                            <!-- tracking-tight: espacement lettres serré -->
                            
                            <span class="bg-gradient-to-r from-yellow-300 to-orange-400 bg-clip-text text-transparent">
                                <!-- LIGNE 124: Span avec texte dégradé -->
                                <!-- bg-gradient-to-r: dégradé horizontal -->
                                <!-- from-yellow-300 to-orange-400: jaune vers orange -->
                                <!-- bg-clip-text: applique dégradé au texte -->
                                <!-- text-transparent: rend texte transparent pour voir dégradé -->
                                Mon Site
                            </span>
                            <br>
                            <span class="text-blue-100">Web Moderne</span>
                            <!-- LIGNE 131: Deuxième ligne avec couleur différente -->
                            <!-- text-blue-100: bleu très clair -->
                        </h1>
                        
                        <p class="text-lg text-blue-100/80 mt-2 font-medium">
                            <!-- LIGNE 136: Sous-titre descriptif -->
                            <!-- text-lg: taille 1.125rem -->
                            <!-- text-blue-100/80: bleu clair avec opacité 80% -->
                            <!-- mt-2: marge top 0.5rem -->
                            <!-- font-medium: poids police moyen -->
                            Plateforme digitale innovante
                        </p>
                    </div>
                </div>
                
                <!-- ==================== SECTION NAVIGATION ==================== -->
                <div class="flex flex-col lg:flex-row items-center space-y-3 lg:space-y-0 lg:space-x-8 animate-slide-down">
                    <!-- LIGNE 147: Container navigation avec animation -->
                    <!-- flex flex-col: colonne sur mobile -->
                    <!-- lg:flex-row: ligne sur large écrans -->
                    <!-- items-center: centrage vertical -->
                    <!-- space-y-3: espacement vertical 0.75rem sur mobile -->
                    <!-- lg:space-y-0: supprime espacement vertical desktop -->
                    <!-- lg:space-x-8: espacement horizontal 2rem desktop -->
                    <!-- animate-slide-down: animation custom slide -->
                    
                    <ul class="flex flex-col lg:flex-row items-center space-y-2 lg:space-y-0 lg:space-x-6">
                        <!-- LIGNE 156: Liste des liens navigation -->
                        <!-- flex flex-col: colonne sur mobile -->
                        <!-- lg:flex-row: ligne sur desktop -->
                        <!-- items-center: centrage des éléments -->
                        <!-- space-y-2: espacement vertical 0.5rem mobile -->
                        <!-- lg:space-y-0: supprime espacement vertical desktop -->
                        <!-- lg:space-x-6: espacement horizontal 1.5rem desktop -->
                        
                        <li>
                            <a href="index.php" 
                               class="relative px-4 py-2 text-lg font-semibold text-white hover:text-yellow-300 
                                      transition-all duration-300 ease-in-out transform hover:scale-105 
                                      hover:drop-shadow-lg group">
                                <!-- LIGNE 166: Lien Accueil avec effets avancés -->
                                <!-- relative: positionnement relatif pour pseudo-éléments -->
                                <!-- px-4 py-2: padding horizontal 1rem, vertical 0.5rem -->
                                <!-- text-lg: taille 1.125rem -->
                                <!-- font-semibold: poids police semi-gras -->
                                <!-- text-white: couleur blanche -->
                                <!-- hover:text-yellow-300: jaune au survol -->
                                <!-- transition-all duration-300: transition toutes propriétés 300ms -->
                                <!-- ease-in-out: courbe d'animation -->
                                <!-- transform hover:scale-105: agrandissement 5% au survol -->
                                <!-- hover:drop-shadow-lg: ombre portée au survol -->
                                <!-- group: classe pour effets de groupe -->
                                
                                <span class="relative z-10">Accueil</span>
                                <!-- LIGNE 179: Texte avec z-index -->
                                <!-- relative z-10: positionnement au-dessus des autres éléments -->
                                
                                <div class="absolute inset-0 bg-white/10 rounded-lg scale-0 group-hover:scale-100 
                                           transition-transform duration-300 ease-out backdrop-blur-sm"></div>
                                <!-- LIGNE 184: Arrière-plan animé au survol -->
                                <!-- absolute inset-0: positionnement absolu sur tout l'élément -->
                                <!-- bg-white/10: fond blanc opacité 10% -->
                                <!-- rounded-lg: coins arrondis -->
                                <!-- scale-0: échelle 0 par défaut (invisible) -->
                                <!-- group-hover:scale-100: échelle normale au survol groupe -->
                                <!-- transition-transform: animation transformation -->
                                <!-- duration-300 ease-out: durée et courbe -->
                                <!-- backdrop-blur-sm: effet flou arrière-plan -->
                            </a>
                        </li>
                        
                        <li>
                            <a href="index.php" 
                               class="relative px-4 py-2 text-lg font-semibold text-white hover:text-yellow-300 
                                      transition-all duration-300 ease-in-out transform hover:scale-105 
                                      hover:drop-shadow-lg group">
                                <span class="relative z-10">Inscription</span>
                                <div class="absolute inset-0 bg-white/10 rounded-lg scale-0 group-hover:scale-100 
                                           transition-transform duration-300 ease-out backdrop-blur-sm"></div>
                            </a>
                        </li>
                        
                        <li>
                            <a href="index.php" 
                               class="relative px-4 py-2 text-lg font-semibold text-white hover:text-yellow-300 
                                      transition-all duration-300 ease-in-out transform hover:scale-105 
                                      hover:drop-shadow-lg group">
                                <span class="relative z-10">Connexion</span>
                                <div class="absolute inset-0 bg-white/10 rounded-lg scale-0 group-hover:scale-100 
                                           transition-transform duration-300 ease-out backdrop-blur-sm"></div>
                            </a>
                        </li>
                        
                        <li>
                            <a href="index.php" 
                               class="relative px-4 py-2 text-lg font-semibold text-white hover:text-yellow-300 
                                      transition-all duration-300 ease-in-out transform hover:scale-105 
                                      hover:drop-shadow-lg group">
                                <span class="relative z-10">Rechercher</span>
                                <div class="absolute inset-0 bg-white/10 rounded-lg scale-0 group-hover:scale-100 
                                           transition-transform duration-300 ease-out backdrop-blur-sm"></div>
                            </a>
                        </li>
                    </ul>
                    
                    <!-- ==================== BOUTON CTA ==================== -->
                    <div class="flex items-center space-x-4 mt-4 lg:mt-0">
                        <!-- LIGNE 222: Container pour bouton call-to-action -->
                        <!-- flex items-center: alignement centré -->
                        <!-- space-x-4: espacement horizontal 1rem -->
                        <!-- mt-4: marge top 1rem mobile -->
                        <!-- lg:mt-0: pas de marge top desktop -->
                        
                        <a href="index.php" 
                           class="bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 
                                  text-white font-bold py-3 px-6 rounded-full shadow-xl hover:shadow-2xl 
                                  transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 
                                  ease-out border-2 border-white/20 hover:border-white/40">
                            <!-- LIGNE 230: Bouton CTA avec effets complets -->
                            <!-- bg-gradient-to-r: dégradé horizontal -->
                            <!-- from-yellow-400 to-orange-500: jaune vers orange -->
                            <!-- hover:from-yellow-500 hover:to-orange-600: couleurs plus foncées au survol -->
                            <!-- text-white: texte blanc -->
                            <!-- font-bold: police grasse -->
                            <!-- py-3 px-6: padding vertical 0.75rem, horizontal 1.5rem -->
                            <!-- rounded-full: coins complètement arrondis */
                            <!-- shadow-xl: ombre extra large -->
                            <!-- hover:shadow-2xl: ombre encore plus large au survol -->
                            <!-- transform: active transformations -->
                            <!-- hover:-translate-y-1: déplacement vers haut au survol -->
                            <!-- hover:scale-105: agrandissement 5% au survol -->
                            <!-- transition-all duration-300: animation toutes propriétés 300ms -->
                            <!-- ease-out: courbe d'animation */
                            <!-- border-2: bordure 2px -->
                            <!-- border-white/20: bordure blanche opacité 20% */
                            <!-- hover:border-white/40: bordure plus visible au survol */
                            
                            <span class="flex items-center space-x-2">
                                <!-- LIGNE 249: Container contenu bouton -->
                                <!-- flex items-center: alignement centré */
                                <!-- space-x-2: espacement 0.5rem entre éléments */
                                
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <!-- LIGNE 254: Icône SVG dans bouton -->
                                    <!-- w-5 h-5: dimensions 1.25rem × 1.25rem -->
                                    <!-- fill="none": pas de remplissage */
                                    <!-- stroke="currentColor": contour avec couleur du texte */
                                    
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    <!-- LIGNE 259: Chemin SVG pour icône éclair */
                                    <!-- stroke-linecap="round": extrémités arrondies */
                                    <!-- stroke-linejoin="round": jointures arrondies */
                                    <!-- stroke-width="2": épaisseur trait 2px */
                                </svg>
                                
                                <span>Commencer</span>
                                <!-- LIGNE 266: Texte du bouton -->
                            </span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        
        <!-- ==================== BARRE DE RECHERCHE INTÉGRÉE ==================== -->
        <div class="relative bg-gradient-to-r from-slate-800/50 via-gray-800/50 to-slate-800/50 backdrop-blur-sm border-t border-white/10">
            <div class="container mx-auto px-6 py-4">
                <div class="max-w-2xl mx-auto">
                    <form class="relative group">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-cyan-400 transition-colors duration-300" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            
                            <input type="text" 
                                   placeholder="Rechercher sur le site..." 
                                   class="w-full pl-12 pr-20 py-3 bg-white/10 border border-white/20 rounded-full 
                                          text-white placeholder-gray-300 focus:outline-none focus:ring-2 
                                          focus:ring-cyan-400 focus:border-transparent backdrop-blur-sm
                                          transition-all duration-300 hover:bg-white/15">
                            
                            <div class="absolute inset-y-0 right-0 flex items-center pr-2">
                                <button type="submit" 
                                        class="bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 
                                               text-white p-2 rounded-full transition-all duration-300 transform 
                                               hover:scale-105 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

            <!-- LIGNE 275: Container pour éléments décoratifs -->
            <!-- absolute: positionnement absolu -->
            <!-- top-0 left-0: coin supérieur gauche -->
            <!-- w-full h-full: dimensions pleines */
            <!-- overflow-hidden: masque débordements */
            <!-- pointer-events-none: ignore événements souris */
            

            <!-- LIGNE 282: Cercle décoratif 1 -->
            <!-- absolute top-10 right-10: position 2.5rem du haut et droite -->
            <!-- w-20 h-20: dimensions 5rem × 5rem */
            <!-- bg-white/5: fond blanc opacité 5% */
            <!-- rounded-full: forme circulaire */
            <!-- animate-pulse: animation pulsation */
            

            <!-- LIGNE 289: Cercle décoratif 2 -->
            <!-- bottom-10 left-10: position 2.5rem du bas et gauche */
            <!-- w-16 h-16: dimensions 4rem × 4rem */
            <!-- bg-yellow-300/10: fond jaune opacité 10% */
            <!-- animate-bounce: animation rebond */
            <!-- delay-300: délai 300ms avant animation */
            

            <!-- LIGNE 296: Carré décoratif rotatif -->
            <!-- top-1/2 left-1/4: position centre vertical, quart horizontal */
            <!-- w-12 h-12: dimensions 3rem × 3rem */
            <!-- bg-purple-300/10: fond violet opacité 10% */
            <!-- rounded-lg: coins légèrement arrondis */
            <!-- rotate-45: rotation 45 degrés */
            <!-- animate-spin: animation rotation continue -->

    </header>

    <!-- ==================== CONTENU PRINCIPAL SIMPLIFIÉ ==================== -->
    <main class="container mx-auto px-6 py-12">
        <!-- LIGNE 307: Section principale avec padding -->
        <!-- container mx-auto: conteneur centré */
        <!-- px-6: padding horizontal 1.5rem */
        <!-- py-12: padding vertical 3rem */
        
        <div class="max-w-4xl mx-auto text-center">
            <!-- LIGNE 313: Container contenu centré -->
            <!-- max-w-4xl: largeur max 56rem */
            <!-- mx-auto: centrage horizontal */
            <!-- text-center: texte centré */
            
            <h2 class="text-4xl lg:text-6xl font-black text-gray-800 mb-6 leading-tight">
                <!-- LIGNE 319: Titre principal de section -->
                <!-- text-4xl: taille 2.25rem mobile */
                <!-- lg:text-6xl: taille 3.75rem desktop */
                <!-- font-black: police extra grasse */
                <!-- text-gray-800: couleur gris foncé */
                <!-- mb-6: marge bottom 1.5rem */
                <!-- leading-tight: interligne serré */
                
                Header Stylé avec
                <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    <!-- LIGNE 327: Span avec texte dégradé */
                    <!-- bg-gradient-to-r: dégradé horizontal */
                    <!-- from-blue-600 to-purple-600: bleu vers violet */
                    <!-- bg-clip-text: applique dégradé au texte */
                    <!-- text-transparent: texte transparent pour voir dégradé */
                    Tailwind CSS
                </span>
            </h2>
            
            <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                <!-- LIGNE 335: Description avec typography responsive -->
                <!-- text-xl: taille 1.25rem */
                <!-- text-gray-600: couleur gris moyen */
                <!-- mb-8: marge bottom 2rem */
                <!-- leading-relaxed: interligne détendu */
                
                Ce header a été entièrement stylé avec les classes utilitaires Tailwind CSS,
                sans aucun fichier CSS externe. Toutes les couleurs, animations et effets 
                sont appliqués directement via les classes Tailwind.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                <!-- LIGNE 345: Grille de fonctionnalités -->
                <!-- grid: système grille */
                <!-- grid-cols-1: 1 colonne mobile */
                <!-- md:grid-cols-3: 3 colonnes écrans moyens+ */
                <!-- gap-8: espacement 2rem entre cellules */
                <!-- mt-12: marge top 3rem */
                
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <!-- LIGNE 352: Carte fonctionnalité 1 */
                    <!-- bg-white: fond blanc */
                    <!-- p-6: padding 1.5rem */
                    <!-- rounded-xl: coins très arrondis */
                    <!-- shadow-lg: ombre large */
                    <!-- hover:shadow-xl: ombre plus large au survol */
                    <!-- transition-shadow duration-300: animation ombre 300ms */
                    
                    <div class="text-3xl mb-4">🎨</div>
                    <!-- LIGNE 360: Icône emoji grande taille */
                    <!-- text-3xl: taille 1.875rem */
                    <!-- mb-4: marge bottom 1rem */
                    
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Design Moderne</h3>
                    <!-- LIGNE 365: Titre carte */
                    <!-- text-xl: taille 1.25rem */
                    <!-- font-bold: police grasse */
                    <!-- text-gray-800: couleur gris foncé */
                    <!-- mb-2: marge bottom 0.5rem */
                    
                    <p class="text-gray-600">Dégradés, animations et effets visuels avancés</p>
                    <!-- LIGNE 371: Description carte */
                    <!-- text-gray-600: couleur gris moyen */
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="text-3xl mb-4">⚡</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Performance</h3>
                    <p class="text-gray-600">CSS optimisé et classes utilitaires efficaces</p>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="text-3xl mb-4">📱</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Responsive</h3>
                    <p class="text-gray-600">S'adapte parfaitement à tous les écrans</p>
                </div>
            </div>
        </div>
    </main>

    <!-- ==================== FOOTER SIMPLIFIÉ ==================== -->
    <!-- <footer class="bg-gray-800 text-white py-8 mt-16"> -->
        <!-- LIGNE 389: Footer avec styling Tailwind -->
        <!-- bg-gray-800: fond gris très foncé */
        <!-- text-white: texte blanc */
        <!-- py-8: padding vertical 2rem */
        <!-- mt-16: marge top 4rem */
        
        <div class="container mx-auto px-6 text-center">
            <!-- LIGNE 396: Container footer centré */
            <!-- container mx-auto: conteneur centré */
            <!-- px-6: padding horizontal 1.5rem */
            <!-- text-center: texte centré */
            
            <p class="text-gray-300">
                <!-- LIGNE 401: Texte copyright */
                <!-- text-gray-300: couleur gris clair */
                &copy; 2025 Mon Site Web. Header stylé exclusivement avec Tailwind CSS.
            </p>
            
            <div class="flex justify-center space-x-6 mt-4">
                <!-- LIGNE 407: Container liens footer */
                <!-- flex: affichage flexbox */
                <!-- justify-center: centrage horizontal */
                <!-- space-x-6: espacement 1.5rem entre éléments */
                <!-- mt-4: marge top 1rem */
                
                <a href="index.php" class="text-gray-400 hover:text-white transition-colors duration-300">Accueil</a>
                <a href="index.php" class="text-gray-400 hover:text-white transition-colors duration-300">Inscription</a>
                <a href="index.php" class="text-gray-400 hover:text-white transition-colors duration-300">Connexion</a>
                <a href="index.php" class="text-gray-400 hover:text-white transition-colors duration-300">Rechercher</a>
                <!-- LIGNE 412-415: Liens footer avec transitions */
                <!-- text-gray-400: couleur gris moyen par défaut */
                <!-- hover:text-white: blanc au survol */
                <!-- transition-colors duration-300: animation couleur 300ms */
            </div>
        </div>
    </footer>
</body>
</html>