<!-- Déclaration HTML5 : indique au navigateur d'utiliser le standard HTML5 -->
<!DOCTYPE html>

<!-- Élément racine HTML avec langue française et défilement fluide -->
<!-- lang="fr" : définit la langue (français) pour l'accessibilité et le SEO -->
<!-- scroll-smooth : active le défilement fluide lors du clic sur les ancres (#section) -->
<html lang="fr" class="scroll-smooth">

<head>
    <!-- Encodage des caractères en UTF-8 (supporte tous les caractères français et internationaux) -->
    <meta charset="UTF-8">
    
    <!-- Configuration du viewport pour le responsive design -->
    <!-- width=device-width : la largeur de la page = largeur de l'écran de l'appareil -->
    <!-- initial-scale=1.0 : zoom initial à 100% (pas de zoom automatique) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Titre de la page affiché dans l'onglet du navigateur -->
    <title>TechFlow - Développement Web Moderne</title>
    
    <!-- Chargement de Tailwind CSS depuis un CDN (Content Delivery Network) -->
    <!-- CDN = serveur distant qui héberge la bibliothèque -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Configuration JavaScript personnalisée de Tailwind CSS -->
    <script>
        // Objet de configuration pour personnaliser Tailwind
        tailwind.config = {
            // theme : configuration du thème visuel
            theme: {
                // extend : permet d'ajouter des styles personnalisés sans écraser les styles par défaut
                extend: {
                    // Définition de palettes de couleurs personnalisées
                    colors: {
                        // Palette 'primary' (bleu) avec différentes nuances
                        // Chaque nombre représente l'intensité (50 = très clair, 900 = très foncé)
                        'primary': {
                            // Bleu très clair (presque blanc) - pour arrière-plans subtils
                            50: '#eff6ff',
                            
                            // Bleu clair - pour arrière-plans de cartes, badges
                            100: '#dbeafe',
                            
                            // Bleu vif moyen - COULEUR PRINCIPALE (boutons, liens, accents)
                            500: '#3b82f6',
                            
                            // Bleu plus foncé - pour états hover (survol)
                            600: '#2563eb',
                            
                            // Bleu foncé - pour effets de dégradé
                            700: '#1d4ed8',
                            
                            // Bleu très foncé - pour textes ou éléments sombres
                            900: '#1e3a8a'
                        },
                        // Palette 'accent' (vert) pour éléments secondaires
                        'accent': {
                            // Vert clair - pour badges, indicateurs de succès
                            400: '#34d399',
                            
                            // Vert moyen - couleur d'accent principale
                            500: '#10b981',
                            
                            // Vert foncé - pour états hover
                            600: '#059669'
                        }
                    },
                    // Définition des animations personnalisées
                    animation: {
                        // Animation d'apparition en fondu (fade-in)
                        // fadeIn : nom de l'animation (définie dans keyframes ci-dessous)
                        // 0.6s : durée de 0.6 secondes
                        // ease-out : fonction de timing (démarre vite puis ralentit)
                        'fade-in': 'fadeIn 0.6s ease-out',
                        
                        // Animation de glissement depuis le bas (slide-up)
                        // 0.8s : durée de 0.8 secondes (plus lent que fade-in)
                        'slide-up': 'slideUp 0.8s ease-out',
                        
                        // Animation de flottement (va-et-vient vertical)
                        // 6s : durée de 6 secondes pour un cycle complet
                        // ease-in-out : accélération puis décélération
                        // infinite : se répète à l'infini
                        'float': 'float 6s ease-in-out infinite',
                        
                        // Animation de pulsation lente (utilise keyframe 'pulse' prédéfini de Tailwind)
                        // 3s : durée de 3 secondes
                        'pulse-slow': 'pulse 3s ease-in-out infinite'
                    },
                    // Keyframes : définition des étapes de chaque animation
                    keyframes: {
                        // Animation fadeIn : apparition en fondu depuis le bas
                        fadeIn: {
                            // État initial (0% = début de l'animation)
                            '0%': { 
                                opacity: '0',                      // Élément invisible (opacité 0)
                                transform: 'translateY(30px)'      // Décalé de 30px vers le bas
                            },
                            // État final (100% = fin de l'animation)
                            '100%': { 
                                opacity: '1',                      // Élément complètement visible
                                transform: 'translateY(0)'         // Position normale (pas de décalage)
                            }
                        },
                        // Animation slideUp : glissement plus prononcé depuis le bas
                        slideUp: {
                            // État initial
                            '0%': { 
                                opacity: '0',                      // Invisible
                                transform: 'translateY(50px)'      // Plus bas que fadeIn (50px au lieu de 30px)
                            },
                            // État final
                            '100%': { 
                                opacity: '1',                      // Visible
                                transform: 'translateY(0)'         // Position normale
                            }
                        },
                        // Animation float : mouvement de flottement (haut-bas)
                        float: {
                            // État initial ET final (0% et 100%)
                            // Cette notation signifie que l'animation commence et finit au même endroit
                            '0%, 100%': { 
                                transform: 'translateY(0px)'       // Position de départ/arrivée
                            },
                            // État au milieu de l'animation (50%)
                            '50%': { 
                                transform: 'translateY(-20px)'     // Monte de 20px
                            }
                            // Résultat : l'élément monte puis redescend en boucle
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Chargement de la police Inter depuis Google Fonts -->
    <!-- wght@300;400;500;600;700;800;900 : différents poids (épaisseurs) disponibles -->
    <!-- 300 = Light, 400 = Regular, 500 = Medium, 600 = Semi-bold, 700 = Bold, 800 = Extra-bold, 900 = Black -->
    <!-- display=swap : affiche une police de secours pendant le chargement pour éviter le texte invisible (FOIT) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Styles CSS personnalisés (inline) -->
    <style>
        /* Applique la police Inter à tout le body (élément racine du contenu) */
        /* sans-serif : police de secours si Inter ne charge pas */
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<!-- Corps du document HTML -->
<!-- bg-white : fond blanc (#ffffff) -->
<!-- text-gray-900 : texte gris très foncé (presque noir) pour bon contraste -->
<!-- antialiased : lissage des polices (anti-aliasing) pour un rendu plus net -->
<!-- overflow-x-hidden : empêche le scroll horizontal (cache tout débordement horizontal) -->
<body class="bg-white text-gray-900 antialiased overflow-x-hidden">
    
    <!-- Barre de Navigation principale -->
    <!-- fixed : position fixe (reste collée en haut lors du scroll) -->
    <!-- top-0 left-0 right-0 : positionnée en haut et étirée sur toute la largeur -->
    <!-- z-50 : z-index élevé (50) pour être au-dessus des autres éléments -->
    <!-- bg-white/90 : fond blanc avec 90% d'opacité (10% transparent pour effet glassmorphism) -->
    <!-- backdrop-blur-sm : flou léger sur le contenu derrière (effet verre dépoli) -->
    <!-- shadow-sm : petite ombre portée pour séparer la nav du contenu -->
    <!-- border-b : bordure uniquement en bas -->
    <!-- border-gray-100 : couleur de bordure gris très clair -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-sm shadow-sm border-b border-gray-100">
        
        <!-- Container principal de la navigation -->
        <!-- max-w-7xl : largeur maximale de 80rem (1280px) -->
        <!-- mx-auto : centre horizontalement le container (margin-left et margin-right auto) -->
        <!-- px-4 : padding horizontal de 1rem (16px) par défaut (mobile) -->
        <!-- sm:px-6 : padding de 1.5rem (24px) sur écrans ≥640px -->
        <!-- lg:px-8 : padding de 2rem (32px) sur écrans ≥1024px -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Container flex pour disposition horizontale -->
            <!-- flex : active flexbox (disposition flexible) -->
            <!-- items-center : alignement vertical centré -->
            <!-- justify-between : espace maximum entre les éléments (logo à gauche, menu au centre, CTA à droite) -->
            <!-- h-16 : hauteur de 4rem (64px) -->
            <div class="flex items-center justify-between h-16">
                
                <!-- Section Logo -->
                <!-- flex : disposition flexbox horizontale -->
                <!-- items-center : alignement vertical centré -->
                <!-- space-x-3 : espace horizontal de 0.75rem (12px) entre les enfants -->
                <div class="flex items-center space-x-3">
                    
                    <!-- Icône du logo (carré avec dégradé bleu) -->
                    <!-- w-10 h-10 : largeur et hauteur de 2.5rem (40px) = carré -->
                    <!-- bg-gradient-to-br : dégradé du haut-gauche vers bas-droite (bottom-right) -->
                    <!-- from-primary-500 : couleur de départ du dégradé = bleu vif (#3b82f6) -->
                    <!-- to-primary-700 : couleur d'arrivée = bleu foncé (#1d4ed8) -->
                    <!-- rounded-xl : coins très arrondis (border-radius: 0.75rem = 12px) -->
                    <!-- flex items-center justify-center : centre le SVG horizontalement et verticalement -->
                    <!-- shadow-lg : grande ombre portée pour effet de profondeur -->
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-xl flex items-center justify-center shadow-lg">
                        
                        <!-- Icône SVG (éclair/lightning) -->
                        <!-- w-6 h-6 : largeur et hauteur de 1.5rem (24px) -->
                        <!-- text-white : couleur blanche (appliquée via currentColor dans stroke) -->
                        <!-- fill="none" : pas de remplissage, seulement le contour -->
                        <!-- stroke="currentColor" : le contour utilise la couleur du texte parent (white) -->
                        <!-- viewBox="0 0 24 24" : zone de dessin de 24×24 unités -->
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <!-- path : forme de l'éclair -->
                            <!-- stroke-linecap="round" : extrémités arrondies -->
                            <!-- stroke-linejoin="round" : jointures arrondies -->
                            <!-- stroke-width="2" : épaisseur du trait = 2px -->
                            <!-- d : commandes de dessin (M=move, L=line, V=vertical, H=horizontal, z=close) -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    
                    <!-- Texte du logo "TechFlow" -->
                    <!-- text-xl : taille de police 1.25rem (20px) -->
                    <!-- font-bold : poids gras (700) -->
                    <!-- text-gray-900 : couleur gris très foncé (presque noir) -->
                    <span class="text-xl font-bold text-gray-900">TechFlow</span>
                </div>

                <!-- Menu de navigation (liens principaux) -->
                <!-- hidden : caché par défaut sur mobile (menu burger serait nécessaire pour mobile) -->
                <!-- md:flex : s'affiche en flexbox sur écrans ≥768px (tablettes et desktop) = responsive -->
                <!-- items-center : alignement vertical centré -->
                <!-- space-x-8 : espace horizontal de 2rem (32px) entre chaque lien -->
                <div class="hidden md:flex items-center space-x-8">
                    
                    <!-- Lien vers section Accueil -->
                    <!-- href="#accueil" : ancre qui scroll vers l'élément avec id="accueil" -->
                    <!-- text-gray-600 : couleur grise moyenne par défaut -->
                    <!-- hover:text-primary-600 : devient bleu au survol de la souris -->
                    <!-- font-medium : poids de police moyen (500) -->
                    <!-- transition-colors : animation fluide du changement de couleur (durée par défaut: 150ms) -->
                    <a href="#accueil" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Accueil</a>
                    
                    <!-- Lien vers section Services -->
                    <a href="#services" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Services</a>
                    
                    <!-- Lien vers section Projets -->
                    <a href="#projets" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Projets</a>
                    
                    <!-- Lien vers section Contact -->
                    <a href="#contact" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Contact</a>
                </div>

                <!-- Bouton CTA (Call To Action) principal -->
                <!-- bg-primary-500 : fond bleu vif (#3b82f6) -->
                <!-- hover:bg-primary-600 : fond bleu plus foncé au survol (#2563eb) -->
                <!-- text-white : texte blanc pour contraster avec le fond bleu -->
                <!-- px-6 : padding horizontal de 1.5rem (24px) -->
                <!-- py-2 : padding vertical de 0.5rem (8px) -->
                <!-- rounded-lg : coins arrondis (border-radius: 0.5rem = 8px) -->
                <!-- font-medium : poids de police moyen (500) -->
                <!-- transition-colors : animation fluide du changement de couleur de fond -->
                <!-- shadow-lg : grande ombre portée pour effet de profondeur -->
                <button class="bg-primary-500 hover:bg-primary-600 text-white px-6 py-2 rounded-lg font-medium transition-colors shadow-lg">
                    Commencer
                </button>
            </div>
        </div>
    </nav>

    <!-- Section Hero (section principale d'accueil) -->
    <!-- id="accueil" : ancre pour navigation (permet de scroller vers cette section avec #accueil) -->
    <!-- pt-16 : padding-top de 4rem (64px) pour compenser la hauteur de la nav fixe -->
    <!-- min-h-screen : hauteur minimale = 100vh (100% de la hauteur de la fenêtre) -->
    <!-- flex : active flexbox pour centrer le contenu -->
    <!-- items-center : centre verticalement le contenu -->
    <!-- bg-gradient-to-br : dégradé du haut-gauche vers bas-droite -->
    <!-- from-gray-50 via-white to-blue-50 : dégradé gris clair → blanc → bleu très clair -->
    <!-- relative : position relative (référence pour les enfants absolus) -->
    <!-- overflow-hidden : cache ce qui dépasse (pour les effets de flou) -->
    <section id="accueil" class="pt-16 min-h-screen flex items-center bg-gradient-to-br from-gray-50 via-white to-blue-50 relative overflow-hidden">
        
        <!-- Éléments décoratifs d'arrière-plan (cercles floutés) -->
        <!-- absolute : position absolue (par rapport au parent relative) -->
        <!-- inset-0 : top/right/bottom/left = 0 (remplit tout le parent) -->
        <!-- -z-10 : z-index négatif (-10) pour être DERRIÈRE le contenu -->
        <div class="absolute inset-0 -z-10">
            
            <!-- Premier cercle flou (bleu, en haut à gauche) -->
            <!-- absolute : position absolue -->
            <!-- top-20 : 5rem (80px) depuis le haut -->
            <!-- left-10 : 2.5rem (40px) depuis la gauche -->
            <!-- w-72 h-72 : largeur et hauteur de 18rem (288px) = cercle -->
            <!-- bg-primary-100/50 : fond bleu clair avec 50% d'opacité -->
            <!-- rounded-full : border-radius 9999px (cercle parfait) -->
            <!-- blur-3xl : flou très intense (64px) pour effet de lumière diffuse -->
            <!-- animate-float : animation de flottement (monte et descend) -->
            <div class="absolute top-20 left-10 w-72 h-72 bg-primary-100/50 rounded-full blur-3xl animate-float"></div>
            
            <!-- Deuxième cercle flou (vert, en bas à droite) -->
            <!-- bottom-20 : 5rem depuis le bas -->
            <!-- right-10 : 2.5rem depuis la droite -->
            <!-- w-96 h-96 : largeur et hauteur de 24rem (384px) = plus grand cercle -->
            <!-- bg-accent-100/30 : fond vert clair avec 30% d'opacité (plus transparent) -->
            <!-- style="animation-delay: 1s;" : CSS inline pour délai de 1 seconde avant le démarrage de l'animation -->
            <!-- Résultat : les deux cercles flottent de manière désynchronisée (effet élégant) -->
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-accent-100/30 rounded-full blur-3xl animate-float" style="animation-delay: 1s;"></div>
        </div>

        <!-- Container principal du contenu Hero -->
        <!-- max-w-7xl : largeur max de 80rem (1280px) pour ne pas être trop large sur grands écrans -->
        <!-- mx-auto : centrage horizontal automatique -->
        <!-- px-4 sm:px-6 lg:px-8 : padding horizontal responsive (16px → 24px → 32px) -->
        <!-- w-full : largeur 100% du parent -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            
            <!-- Container pour centrer tout le contenu -->
            <!-- text-center : aligne le texte au centre -->
            <div class="text-center">
                
                <!-- Badge d'annonce (avec point vert clignotant) -->
                <!-- inline-flex : flexbox inline (s'adapte à la largeur du contenu au lieu de prendre toute la largeur) -->
                <!-- items-center : alignement vertical centré -->
                <!-- space-x-2 : espace de 0.5rem (8px) entre le point et le texte -->
                <!-- bg-primary-50 : fond bleu très clair (#eff6ff) -->
                <!-- text-primary-700 : texte bleu foncé (#1d4ed8) -->
                <!-- px-4 py-2 : padding de 1rem horizontal et 0.5rem vertical -->
                <!-- rounded-full : coins complètement arrondis (forme de pilule) -->
                <!-- text-sm : petite taille de texte 0.875rem (14px) -->
                <!-- font-medium : poids moyen (500) -->
                <!-- mb-8 : margin-bottom de 2rem (32px) -->
                <!-- animate-fade-in : animation d'apparition en fondu -->
                <div class="inline-flex items-center space-x-2 bg-primary-50 text-primary-700 px-4 py-2 rounded-full text-sm font-medium mb-8 animate-fade-in">
                    
                    <!-- Point vert clignotant (indicateur "nouveau") -->
                    <!-- w-2 h-2 : largeur et hauteur de 0.5rem (8px) = petit cercle -->
                    <!-- bg-accent-500 : fond vert (#10b981) -->
                    <!-- rounded-full : cercle parfait -->
                    <!-- animate-pulse : animation de pulsation prédéfinie de Tailwind (opacité 0-100%) -->
                    <span class="w-2 h-2 bg-accent-500 rounded-full animate-pulse"></span>
                    
                    <!-- Texte de l'annonce -->
                    <span>Nouveau : Tailwind CSS v3.4 disponible</span>
                </div>

                <!-- Titre principal Hero (h1 = titre le plus important pour le SEO) -->
                <!-- text-4xl : taille 2.25rem (36px) par défaut (mobile) -->
                <!-- sm:text-5xl : taille 3rem (48px) sur écrans ≥640px -->
                <!-- lg:text-7xl : taille 4.5rem (72px) sur écrans ≥1024px = responsive progressif -->
                <!-- font-black : poids ultra-gras (900) pour impact visuel maximal -->
                <!-- text-gray-900 : couleur gris très foncé (presque noir) -->
                <!-- mb-6 : margin-bottom de 1.5rem (24px) -->
                <!-- leading-tight : line-height serré (1.25) pour titres compacts -->
                <!-- animate-slide-up : animation de glissement depuis le bas -->
                <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black text-gray-900 mb-6 leading-tight animate-slide-up">
                    Développez des projets
                    
                    <!-- Mot avec dégradé de couleurs (effet accrocheur) -->
                    <!-- bg-gradient-to-r : dégradé linéaire de gauche à droite -->
                    <!-- from-primary-600 : bleu foncé (#2563eb) au début -->
                    <!-- via-primary-500 : bleu vif (#3b82f6) au milieu -->
                    <!-- to-accent-500 : vert (#10b981) à la fin -->
                    <!-- bg-clip-text : le dégradé s'applique uniquement au texte (propriété CSS expérimentale) -->
                    <!-- text-transparent : rend le texte transparent pour voir le dégradé en arrière-plan -->
                    <span class="bg-gradient-to-r from-primary-600 via-primary-500 to-accent-500 bg-clip-text text-transparent">
                        exceptionnels
                    </span>
                    
                    <!-- br : saut de ligne pour meilleure lisibilité -->
                    <br>avec style et performance
                </h1>

                <!-- Sous-titre / Description Hero -->
                <!-- text-lg : taille 1.125rem (18px) par défaut -->
                <!-- sm:text-xl : taille 1.25rem (20px) sur tablettes -->
                <!-- lg:text-2xl : taille 1.5rem (24px) sur desktop = responsive progressif -->
                <!-- text-gray-600 : couleur grise moyenne pour texte secondaire -->
                <!-- mb-12 : margin-bottom de 3rem (48px) pour espacer des boutons -->
                <!-- max-w-4xl : largeur max de 56rem (896px) pour lisibilité optimale -->
                <!-- mx-auto : centrage horizontal -->
                <!-- leading-relaxed : line-height espacé (1.625) pour meilleure lisibilité -->
                <!-- animate-slide-up : animation de glissement -->
                <!-- style="animation-delay: 0.2s;" : délai de 0.2s (apparaît après le titre) -->
                <p class="text-lg sm:text-xl lg:text-2xl text-gray-600 mb-12 max-w-4xl mx-auto leading-relaxed animate-slide-up" style="animation-delay: 0.2s;">
                    Créez des applications web modernes et performantes avec les dernières technologies. 
                    Une approche simple, efficace et adaptée à vos besoins.
                </p>

                <!-- Boutons CTA (Call To Action) -->
                <!-- flex : flexbox -->
                <!-- flex-col : direction verticale par défaut (mobile = boutons empilés) -->
                <!-- sm:flex-row : direction horizontale sur écrans ≥640px (tablettes+ = boutons côte à côte) -->
                <!-- items-center : alignement vertical centré -->
                <!-- justify-center : alignement horizontal centré -->
                <!-- gap-4 : espace de 1rem (16px) entre les boutons (fonctionne en column et row) -->
                <!-- mb-16 : margin-bottom de 4rem (64px) -->
                <!-- animate-slide-up : animation de glissement -->
                <!-- style="animation-delay: 0.4s;" : délai de 0.4s (apparaît après la description) -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16 animate-slide-up" style="animation-delay: 0.4s;">
                    
                    <!-- Bouton principal (avec dégradé et effets avancés) -->
                    <!-- bg-gradient-to-r : dégradé horizontal de gauche à droite -->
                    <!-- from-primary-500 to-primary-600 : bleu vif → bleu foncé -->
                    <!-- hover:from-primary-600 hover:to-primary-700 : dégradé plus foncé au survol -->
                    <!-- text-white : texte blanc -->
                    <!-- px-8 py-4 : padding de 2rem horizontal et 1rem vertical (gros bouton) -->
                    <!-- rounded-xl : coins très arrondis (12px) -->
                    <!-- font-semibold : poids semi-gras (600) -->
                    <!-- text-lg : grande taille de texte 1.125rem (18px) -->
                    <!-- shadow-xl : ombre très grande -->
                    <!-- hover:shadow-2xl : ombre encore plus grande au survol -->
                    <!-- transform : active les transformations CSS -->
                    <!-- hover:scale-105 : agrandit de 5% au survol (effet zoom) -->
                    <!-- transition-all duration-300 : anime TOUTES les propriétés pendant 300ms -->
                    <!-- w-full : largeur 100% sur mobile -->
                    <!-- sm:w-auto : largeur automatique (adaptée au contenu) sur tablettes+ -->
                    <!-- min-w-[200px] : largeur minimale de 200px (notation arbitraire Tailwind) -->
                    <button class="bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white px-8 py-4 rounded-xl font-semibold text-lg shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 w-full sm:w-auto min-w-[200px]">
                        Découvrir nos services
                    </button>
                    
                    <!-- Bouton secondaire (style outline/contour) -->
                    <!-- border-2 : bordure de 2px d'épaisseur -->
                    <!-- border-gray-200 : couleur de bordure gris clair par défaut -->
                    <!-- hover:border-primary-300 : bordure bleu clair au survol -->
                    <!-- text-gray-700 : texte gris foncé par défaut -->
                    <!-- hover:text-primary-600 : texte bleu au survol -->
                    <!-- hover:bg-gray-50 : fond gris très clair au survol (effet subtil) -->
                    <!-- transition-all duration-300 : anime tous les changements pendant 300ms -->
                    <button class="border-2 border-gray-200 hover:border-primary-300 text-gray-700 hover:text-primary-600 px-8 py-4 rounded-xl font-semibold text-lg hover:bg-gray-50 transition-all duration-300 w-full sm:w-auto min-w-[200px]">
                        Voir nos projets
                    </button>
                </div>

                <!-- Statistiques (3 colonnes) -->
                <!-- grid : active CSS Grid -->
                <!-- grid-cols-3 : 3 colonnes de même largeur (même sur mobile) -->
                <!-- gap-8 : espace de 2rem (32px) entre les cellules -->
                <!-- max-w-lg : largeur max de 32rem (512px) -->
                <!-- mx-auto : centrage horizontal -->
                <!-- animate-slide-up : animation de glissement -->
                <!-- style="animation-delay: 0.6s;" : délai de 0.6s (apparaît après les boutons) -->
                <div class="grid grid-cols-3 gap-8 max-w-lg mx-auto animate-slide-up" style="animation-delay: 0.6s;">
                    
                    <!-- Stat 1 : Projets réalisés -->
                    <!-- text-center : texte centré -->
                    <div class="text-center">
                        <!-- Nombre en grand et en couleur -->
                        <!-- text-2xl : 1.5rem (24px) par défaut -->
                        <!-- sm:text-3xl : 1.875rem (30px) sur tablettes -->
                        <!-- lg:text-4xl : 2.25rem (36px) sur desktop -->
                        <!-- font-bold : poids gras (700) -->
                        <!-- text-primary-600 : couleur bleue -->
                        <!-- mb-2 : margin-bottom de 0.5rem (8px) -->
                        <div class="text-2xl sm:text-3xl lg:text-4xl font-bold text-primary-600 mb-2">150+</div>
                        
                        <!-- Label descriptif -->
                        <!-- text-sm : petite taille 0.875rem (14px) -->
                        <!-- text-gray-600 : gris moyen -->
                        <div class="text-sm text-gray-600">Projets réalisés</div>
                    </div>
                    
                    <!-- Stat 2 : Satisfaction client -->
                    <div class="text-center">
                        <div class="text-2xl sm:text-3xl lg:text-4xl font-bold text-primary-600 mb-2">100%</div>
                        <div class="text-sm text-gray-600">Satisfaction client</div>
                    </div>
                    
                    <!-- Stat 3 : Support technique -->
                    <div class="text-center">
                        <div class="text-2xl sm:text-3xl lg:text-4xl font-bold text-primary-600 mb-2">24/7</div>
                        <div class="text-sm text-gray-600">Support technique</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 lg:py-32 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Nos services
                    <span class="text-primary-600">sur mesure</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Des solutions complètes pour tous vos besoins en développement web
                </p>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Service 1 -->
                <div class="bg-gradient-to-br from-primary-50 to-blue-50 p-8 rounded-2xl border border-primary-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="w-12 h-12 bg-primary-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Développement Frontend</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Interfaces modernes et responsive avec React, Vue.js et les dernières technologies CSS.
                    </p>
                </div>

                <!-- Service 2 -->
                <div class="bg-gradient-to-br from-accent-50 to-green-50 p-8 rounded-2xl border border-accent-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="w-12 h-12 bg-accent-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">API & Backend</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Architectures robustes avec Node.js, Python et bases de données optimisées.
                    </p>
                </div>

                <!-- Service 3 -->
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-8 rounded-2xl border border-purple-100 hover:shadow-xl transition-all duration-300 group">
                    <div class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">UX/UI Design</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Expériences utilisateur intuitives et designs modernes qui convertissent.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projets" class="py-20 lg:py-32 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Projets
                    <span class="text-primary-600">récents</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Découvrez quelques-unes de nos réalisations les plus innovantes
                </p>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                
                <!-- Project 1 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300">
                    <div class="h-64 bg-gradient-to-br from-primary-400 to-primary-600 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <h3 class="text-white font-semibold">Application E-commerce</h3>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Plateforme E-commerce Moderne</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Application complète avec panier, paiements sécurisés et interface d'administration avancée.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span class="px-3 py-1 bg-primary-100 text-primary-700 text-sm rounded-full">React</span>
                            <span class="px-3 py-1 bg-accent-100 text-accent-700 text-sm rounded-full">Node.js</span>
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 text-sm rounded-full">MongoDB</span>
                        </div>
                        <button class="text-primary-600 hover:text-primary-700 font-semibold">
                            Voir le projet →
                        </button>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300">
                    <div class="h-64 bg-gradient-to-br from-accent-400 to-accent-600 relative">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                </div>
                                <h3 class="text-white font-semibold">Dashboard Analytics</h3>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Dashboard Analytics Avancé</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Interface de visualisation de données en temps réel avec graphiques interactifs et KPIs.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span class="px-3 py-1 bg-primary-100 text-primary-700 text-sm rounded-full">Vue.js</span>
                            <span class="px-3 py-1 bg-accent-100 text-accent-700 text-sm rounded-full">D3.js</span>
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 text-sm rounded-full">Express</span>
                        </div>
                        <button class="text-primary-600 hover:text-primary-700 font-semibold">
                            Voir le projet →
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 lg:py-32 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Prêt à commencer
                    <span class="text-primary-600">votre projet ?</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Contactez-nous pour discuter de vos besoins et obtenir un devis personnalisé
                </p>
            </div>

            <!-- Contact Form -->
            <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-2xl p-8 lg:p-12 border border-gray-100">
                <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nom complet</label>
                        <input type="text" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors" placeholder="John Doe">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors" placeholder="john@example.com">
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Type de projet</label>
                        <select class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors">
                            <option>Site vitrine</option>
                            <option>Application web</option>
                            <option>E-commerce</option>
                            <option>API & Backend</option>
                            <option>Autre</option>
                        </select>
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                        <textarea rows="4" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-colors" placeholder="Décrivez votre projet..."></textarea>
                    </div>
                    
                    <div class="md:col-span-2">
                        <button type="submit" class="w-full bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white py-4 rounded-lg font-semibold text-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                            Envoyer le message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                
                <!-- Company Info -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold">TechFlow</span>
                    </div>
                    <p class="text-gray-400 mb-6 max-w-md">
                        Nous créons des applications web modernes et performantes avec les dernières technologies.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-primary-600 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-primary-600 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-primary-600 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Services Links -->
                <div>
                    <h4 class="font-semibold mb-4">Services</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Développement Frontend</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">API & Backend</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">UX/UI Design</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Consulting</a></li>
                    </ul>
                </div>

                <!-- Company Links -->
                <div>
                    <h4 class="font-semibold mb-4">Entreprise</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">À propos</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Carrières</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-800 pt-8 text-center">
                <p class="text-gray-400">
                    © 2025 TechFlow. Tous droits réservés.
                </p>
            </div>
        </div>
    </footer>

</body>
</html>