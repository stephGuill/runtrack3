<!-- Déclaration HTML5 : indique au navigateur d'utiliser le standard HTML5 -->
<!DOCTYPE html>

<!-- Élément racine HTML avec langue française -->
<!-- lang="fr" : définit la langue (français) pour l'accessibilité, les lecteurs d'écran et le SEO -->
<!-- Note : pas de classe "scroll-smooth" ici (défilement normal, pas animé) -->
<html lang="fr">

<head>
    <!-- Encodage des caractères en UTF-8 pour supporter tous les caractères français et internationaux -->
    <meta charset="UTF-8">
    
    <!-- Configuration du viewport pour le responsive design (mobile-first) -->
    <!-- width=device-width : la largeur de la page s'adapte à la largeur de l'écran -->
    <!-- initial-scale=1.0 : zoom initial à 100% (pas de zoom automatique sur mobile) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Titre de la page affiché dans l'onglet du navigateur et dans les résultats de recherche -->
    <title>TechFlow - Studio de Développement Moderne</title>
    
    <!-- Chargement de Tailwind CSS depuis un CDN (Content Delivery Network) -->
    <!-- CDN = serveur distant qui héberge la bibliothèque, pas besoin d'installation locale -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Configuration JavaScript personnalisée de Tailwind CSS -->
    <script>
        // Objet de configuration pour personnaliser Tailwind
        tailwind.config = {
            // theme : configuration du thème visuel
            theme: {
                // extend : permet d'AJOUTER des styles personnalisés sans écraser les styles par défaut de Tailwind
                extend: {
                    // Définition d'une palette de couleurs personnalisée nommée 'primary' (bleu)
                    colors: {
                        // Palette 'primary' avec 4 nuances de bleu
                        // Format : 'nom': { numéro: 'couleur_hex' }
                        // Le numéro indique l'intensité (50 = très clair, 700 = très foncé)
                        'primary': {
                            // Bleu très clair (#eff6ff) - pour arrière-plans subtils, badges
                            50: '#eff6ff',
                            
                            // Bleu vif moyen (#3b82f6) - COULEUR PRINCIPALE (boutons, liens, accents)
                            500: '#3b82f6',
                            
                            // Bleu plus foncé (#2563eb) - pour états hover (survol de la souris)
                            600: '#2563eb',
                            
                            // Bleu foncé (#1d4ed8) - pour textes sur fond clair ou effets de dégradé
                            700: '#1d4ed8'
                        }
                    },
                    // Définition de 2 animations personnalisées simples
                    animation: {
                        // Animation 'fade-in' : apparition en fondu depuis le bas
                        // fadeIn : nom de l'animation (définie dans keyframes ci-dessous)
                        // 0.6s : durée de 0.6 secondes (assez rapide)
                        // ease-out : fonction de timing (démarre vite puis ralentit = décélération)
                        'fade-in': 'fadeIn 0.6s ease-out',
                        
                        // Animation 'slide-up' : glissement depuis le bas (plus prononcé que fade-in)
                        // 0.8s : durée de 0.8 secondes (un peu plus lent)
                        'slide-up': 'slideUp 0.8s ease-out'
                    },
                    // Keyframes : définition des étapes (frames) de chaque animation
                    // Chaque animation a un état initial (0%) et un état final (100%)
                    keyframes: {
                        // Animation fadeIn : apparition progressive avec léger mouvement
                        fadeIn: {
                            // État initial (0% = début de l'animation, temps 0)
                            '0%': { 
                                opacity: '0',                      // Élément invisible (0 = transparent)
                                transform: 'translateY(20px)'      // Décalé de 20px vers le bas
                            },
                            // État final (100% = fin de l'animation)
                            '100%': { 
                                opacity: '1',                      // Élément complètement visible (1 = opaque)
                                transform: 'translateY(0)'         // Position normale (pas de décalage)
                            }
                            // Le navigateur calcule automatiquement les états intermédiaires (interpolation)
                        },
                        // Animation slideUp : glissement plus important depuis le bas
                        slideUp: {
                            // État initial
                            '0%': { 
                                opacity: '0',                      // Invisible
                                transform: 'translateY(40px)'      // Plus bas que fadeIn (40px au lieu de 20px)
                            },
                            // État final
                            '100%': { 
                                opacity: '1',                      // Visible
                                transform: 'translateY(0)'         // Position normale
                            }
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Chargement de la police Inter depuis Google Fonts -->
    <!-- wght@300;400;500;600;700;800 : différents poids (épaisseurs) disponibles -->
    <!-- 300=Light, 400=Regular, 500=Medium, 600=Semi-bold, 700=Bold, 800=Extra-bold -->
    <!-- display=swap : affiche une police de secours pendant le chargement pour éviter FOIT (Flash Of Invisible Text) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Styles CSS personnalisés (inline dans une balise <style>) -->
    <style>
        /* Applique la police Inter à tout le body */
        /* 'Inter', sans-serif : utilise Inter en priorité, sinon une police sans-serif par défaut */
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<!-- Corps du document HTML -->
<!-- bg-slate-50 : fond gris très clair (#f8fafc) de la palette slate -->
<!-- text-slate-900 : texte gris très foncé (#0f172a) pour bon contraste sur fond clair -->
<!-- Note : Utilise la palette "slate" (gris avec une nuance bleue subtile) au lieu de "gray" classique -->
<body class="bg-slate-50 text-slate-900">
    
    <!-- Barre de Navigation principale -->
    <!-- fixed : position fixe (reste collée en haut lors du scroll) -->
    <!-- top-0 left-0 right-0 : positionnée en haut et étirée sur toute la largeur (équivalent à width: 100%) -->
    <!-- z-50 : z-index élevé (50) pour être au-dessus du contenu de la page -->
    <!-- bg-white/95 : fond blanc avec 95% d'opacité (5% transparent pour effet glassmorphism) -->
    <!-- backdrop-blur-sm : flou léger (4px) sur le contenu derrière (effet verre dépoli) -->
    <!-- shadow-sm : petite ombre portée pour séparer visuellement la nav du contenu -->
    <!-- border-b : bordure uniquement en bas (pas de couleur spécifiée = couleur par défaut grise) -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-sm shadow-sm border-b">
        
        <!-- Container principal de la navigation -->
        <!-- max-w-6xl : largeur maximale de 72rem (1152px) - plus étroit que max-w-7xl pour design compact -->
        <!-- mx-auto : centre horizontalement le container (margin-left et margin-right auto) -->
        <!-- px-4 : padding horizontal de 1rem (16px) par défaut (mobile) -->
        <!-- sm:px-6 : padding de 1.5rem (24px) sur écrans ≥640px (tablettes+) -->
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            
            <!-- Container flex pour disposition horizontale des éléments de navigation -->
            <!-- flex : active flexbox (disposition flexible horizontale) -->
            <!-- items-center : alignement vertical centré (tous les éléments à la même hauteur) -->
            <!-- justify-between : espace maximum entre éléments (logo à gauche, menu au centre, CTA à droite) -->
            <!-- h-16 : hauteur de 4rem (64px) -->
            <div class="flex items-center justify-between h-16">
                
                <!-- Section Logo (gauche) -->
                <!-- flex : disposition flexbox horizontale -->
                <!-- items-center : alignement vertical centré -->
                <!-- space-x-3 : espace horizontal de 0.75rem (12px) entre l'icône et le texte -->
                <div class="flex items-center space-x-3">
                    
                    <!-- Icône du logo (carré bleu avec éclair) -->
                    <!-- w-8 h-8 : largeur et hauteur de 2rem (32px) = carré -->
                    <!-- bg-primary-500 : fond bleu vif (#3b82f6) de notre palette personnalisée -->
                    <!-- rounded-lg : coins arrondis (border-radius: 0.5rem = 8px) -->
                    <!-- flex items-center justify-center : centre le SVG horizontalement et verticalement -->
                    <div class="w-8 h-8 bg-primary-500 rounded-lg flex items-center justify-center">
                        
                        <!-- Icône SVG (éclair/lightning) -->
                        <!-- w-5 h-5 : largeur et hauteur de 1.25rem (20px) -->
                        <!-- text-white : couleur blanche (appliquée via currentColor dans stroke) -->
                        <!-- fill="none" : pas de remplissage intérieur, seulement le contour -->
                        <!-- stroke="currentColor" : le contour utilise la couleur du texte parent (white) -->
                        <!-- viewBox="0 0 24 24" : système de coordonnées de 24×24 unités -->
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <!-- path : définit la forme de l'éclair -->
                            <!-- stroke-linecap="round" : extrémités des lignes arrondies (au lieu de carrées) -->
                            <!-- stroke-linejoin="round" : jointures des lignes arrondies -->
                            <!-- stroke-width="2" : épaisseur du trait = 2px -->
                            <!-- d : commandes de dessin (M=moveTo, L=lineTo, V=verticalLineTo, H=horizontalLineTo) -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    
                    <!-- Texte du logo "TechFlow" -->
                    <!-- text-xl : taille de police 1.25rem (20px) -->
                    <!-- font-bold : poids de police gras (700) -->
                    <span class="text-xl font-bold">TechFlow</span>
                </div>

                <!-- Menu de navigation principal (centre) -->
                <!-- hidden : caché par défaut sur mobile (pour un menu responsive, il faudrait un burger menu) -->
                <!-- md:flex : s'affiche en flexbox sur écrans ≥768px (tablettes et desktop) = responsive -->
                <!-- items-center : alignement vertical centré -->
                <!-- space-x-6 : espace horizontal de 1.5rem (24px) entre chaque lien -->
                <div class="hidden md:flex items-center space-x-6">
                    
                    <!-- Lien vers section Accueil -->
                    <!-- href="#accueil" : ancre qui scroll vers l'élément avec id="accueil" (navigation interne) -->
                    <!-- text-slate-600 : couleur grise moyenne (#475569) par défaut -->
                    <!-- hover:text-primary-600 : devient bleu (#2563eb) au survol de la souris -->
                    <!-- font-medium : poids de police moyen (500) -->
                    <!-- transition-colors : animation fluide du changement de couleur (durée: 150ms par défaut) -->
                    <a href="#accueil" class="text-slate-600 hover:text-primary-600 font-medium transition-colors">Accueil</a>
                    
                    <!-- Lien vers section Services -->
                    <a href="#services" class="text-slate-600 hover:text-primary-600 font-medium transition-colors">Services</a>
                    
                    <!-- Lien vers section Projets -->
                    <a href="#projets" class="text-slate-600 hover:text-primary-600 font-medium transition-colors">Projets</a>
                    
                    <!-- Lien vers section Contact -->
                    <a href="#contact" class="text-slate-600 hover:text-primary-600 font-medium transition-colors">Contact</a>
                </div>

                <!-- Bouton CTA (Call To Action) principal (droite) -->
                <!-- bg-primary-500 : fond bleu vif (#3b82f6) -->
                <!-- hover:bg-primary-600 : fond bleu plus foncé au survol (#2563eb) -->
                <!-- text-white : texte blanc pour contraster avec le fond bleu -->
                <!-- px-6 : padding horizontal de 1.5rem (24px) -->
                <!-- py-2 : padding vertical de 0.5rem (8px) -->
                <!-- rounded-lg : coins arrondis (border-radius: 0.5rem = 8px) -->
                <!-- font-medium : poids de police moyen (500) -->
                <!-- transition-colors : animation fluide du changement de couleur de fond -->
                <button class="bg-primary-500 hover:bg-primary-600 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                    Commencer
                </button>
            </div>
        </div>
    </nav>

    <!-- Section Hero (section principale d'accueil) -->
    <!-- id="accueil" : ancre pour navigation interne (permet d'accéder à cette section via #accueil) -->
    <!-- pt-16 : padding-top de 4rem (64px) pour compenser la hauteur de la nav fixe -->
    <!-- min-h-screen : hauteur minimale = 100vh (100% de la hauteur de la fenêtre du navigateur) -->
    <!-- flex : active flexbox pour centrer le contenu verticalement -->
    <!-- items-center : centre verticalement le contenu -->
    <!-- bg-gradient-to-br : dégradé linéaire du haut-gauche vers bas-droite (bottom-right) -->
    <!-- from-slate-50 : couleur de départ du dégradé = gris très clair (#f8fafc) -->
    <!-- to-white : couleur d'arrivée = blanc (#ffffff) -->
    <!-- Résultat : dégradé subtil gris clair → blanc pour un arrière-plan élégant -->
    <section id="accueil" class="pt-16 min-h-screen flex items-center bg-gradient-to-br from-slate-50 to-white">
        
        <!-- Container principal du contenu Hero -->
        <!-- max-w-6xl : largeur max de 72rem (1152px) pour éviter que le contenu soit trop large -->
        <!-- mx-auto : centrage horizontal automatique -->
        <!-- px-4 sm:px-6 : padding horizontal responsive (16px → 24px) -->
        <!-- py-12 : padding vertical de 3rem (48px) en haut et en bas -->
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-12">
            
            <!-- Container pour centrer tout le contenu avec une largeur limitée -->
            <!-- text-center : aligne tout le texte au centre -->
            <!-- max-w-4xl : largeur max de 56rem (896px) pour une meilleure lisibilité -->
            <!-- mx-auto : centrage horizontal -->
            <div class="text-center max-w-4xl mx-auto">
                
                <!-- Badge d'annonce (petit encadré avec indicateur) -->
                <!-- inline-flex : flexbox inline (s'adapte à la largeur du contenu au lieu de prendre toute la largeur) -->
                <!-- items-center : alignement vertical centré -->
                <!-- space-x-2 : espace de 0.5rem (8px) entre le point et le texte -->
                <!-- bg-primary-50 : fond bleu très clair (#eff6ff) -->
                <!-- text-primary-700 : texte bleu foncé (#1d4ed8) -->
                <!-- px-4 py-2 : padding de 1rem horizontal et 0.5rem vertical -->
                <!-- rounded-full : coins complètement arrondis (border-radius: 9999px = forme de pilule) -->
                <!-- text-sm : petite taille de texte 0.875rem (14px) -->
                <!-- font-medium : poids de police moyen (500) -->
                <!-- mb-6 : margin-bottom de 1.5rem (24px) -->
                <!-- animate-fade-in : applique l'animation fadeIn personnalisée (apparition en fondu) -->
                <div class="inline-flex items-center space-x-2 bg-primary-50 text-primary-700 px-4 py-2 rounded-full text-sm font-medium mb-6 animate-fade-in">
                    
                    <!-- Point indicateur (cercle coloré) -->
                    <!-- w-2 h-2 : largeur et hauteur de 0.5rem (8px) = petit cercle -->
                    <!-- bg-primary-500 : fond bleu vif (#3b82f6) -->
                    <!-- rounded-full : cercle parfait -->
                    <!-- Note : pas d'animation pulse ici (contrairement aux autres fichiers), point fixe -->
                    <span class="w-2 h-2 bg-primary-500 rounded-full"></span>
                    
                    <!-- Texte de l'annonce -->
                    <span>Nouveau : Version 2.0 disponible</span>
                </div>

                <!-- Titre principal Hero (h1 = titre le plus important pour le SEO) -->
                <!-- text-4xl : taille 2.25rem (36px) par défaut (mobile) -->
                <!-- md:text-6xl : taille 3.75rem (60px) sur écrans ≥768px (tablettes+) = responsive -->
                <!-- font-bold : poids de police gras (700) pour impact visuel -->
                <!-- text-slate-900 : couleur gris très foncé (#0f172a) -->
                <!-- mb-6 : margin-bottom de 1.5rem (24px) -->
                <!-- animate-slide-up : applique l'animation slideUp personnalisée (glissement depuis le bas) -->
                <h1 class="text-4xl md:text-6xl font-bold text-slate-900 mb-6 animate-slide-up">
                    Développez vos projets web
                    
                    <!-- Partie du titre en couleur (mise en valeur) -->
                    <!-- text-primary-500 : couleur bleue (#3b82f6) -->
                    <!-- block : transforme le span en élément bloc (passe à la ligne automatiquement) -->
                    <span class="text-primary-500 block">avec style et performance</span>
                </h1>

                <!-- Sous-titre / Description Hero (paragraphe explicatif) -->
                <!-- text-lg : taille 1.125rem (18px) par défaut -->
                <!-- md:text-xl : taille 1.25rem (20px) sur tablettes+ = responsive -->
                <!-- text-slate-600 : couleur grise moyenne (#475569) pour texte secondaire -->
                <!-- mb-8 : margin-bottom de 2rem (32px) -->
                <!-- leading-relaxed : line-height espacé (1.625) pour meilleure lisibilité du paragraphe -->
                <!-- animate-slide-up : animation de glissement -->
                <!-- style="animation-delay: 0.2s;" : CSS inline pour délai de 0.2s avant démarrage de l'animation -->
                <!-- Résultat : le paragraphe apparaît 0.2s après le titre (effet de cascade) -->
                <p class="text-lg md:text-xl text-slate-600 mb-8 leading-relaxed animate-slide-up" style="animation-delay: 0.2s;">
                    Nous créons des applications web modernes et performantes avec les dernières technologies. 
                    Une approche simple, efficace et adaptée à vos besoins.
                </p>

                <!-- Container des boutons CTA (Call To Action) -->
                <!-- flex : disposition flexbox -->
                <!-- flex-col : direction verticale par défaut (mobile = boutons empilés) -->
                <!-- sm:flex-row : direction horizontale sur écrans ≥640px (tablettes+ = boutons côte à côte) -->
                <!-- items-center : alignement vertical centré (important en mode row) -->
                <!-- justify-center : alignement horizontal centré -->
                <!-- gap-4 : espace de 1rem (16px) entre les boutons (fonctionne en column ET row) -->
                <!-- mb-12 : margin-bottom de 3rem (48px) -->
                <!-- animate-slide-up : animation de glissement -->
                <!-- style="animation-delay: 0.4s;" : délai de 0.4s (apparaît après la description) -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-12 animate-slide-up" style="animation-delay: 0.4s;">
                    
                    <!-- Bouton principal (bleu avec effets) -->
                    <!-- bg-primary-500 : fond bleu vif (#3b82f6) -->
                    <!-- hover:bg-primary-600 : fond bleu plus foncé au survol (#2563eb) -->
                    <!-- text-white : texte blanc -->
                    <!-- px-8 : padding horizontal de 2rem (32px) -->
                    <!-- py-3 : padding vertical de 0.75rem (12px) -->
                    <!-- rounded-lg : coins arrondis (8px) -->
                    <!-- font-semibold : poids semi-gras (600) -->
                    <!-- text-lg : grande taille de texte 1.125rem (18px) -->
                    <!-- shadow-lg : grande ombre portée -->
                    <!-- hover:shadow-xl : ombre encore plus grande au survol (effet de profondeur) -->
                    <!-- transform : active les transformations CSS -->
                    <!-- hover:scale-105 : agrandit de 5% au survol (effet zoom subtil) -->
                    <!-- transition-all : anime TOUTES les propriétés modifiées (couleur, ombre, scale...) -->
                    <!-- w-full : largeur 100% sur mobile (pleine largeur) -->
                    <!-- sm:w-auto : largeur automatique sur tablettes+ (adapté au contenu) -->
                    <!-- max-w-xs : largeur maximale de 20rem (320px) pour éviter boutons trop larges -->
                    <button class="bg-primary-500 hover:bg-primary-600 text-white px-8 py-3 rounded-lg font-semibold text-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all w-full sm:w-auto max-w-xs">
                        Découvrir nos services
                    </button>
                    
                    <!-- Bouton secondaire (style outline/contour) -->
                    <!-- border : ajoute une bordure (1px par défaut) -->
                    <!-- border-slate-300 : couleur de bordure gris clair (#cbd5e1) par défaut -->
                    <!-- hover:border-slate-400 : bordure gris moyen au survol (#94a3b8) -->
                    <!-- text-slate-700 : texte gris foncé (#334155) -->
                    <!-- hover:bg-slate-50 : fond gris très clair au survol (#f8fafc) - effet subtil -->
                    <!-- transition-all : anime tous les changements (bordure, fond) -->
                    <button class="border border-slate-300 hover:border-slate-400 text-slate-700 px-8 py-3 rounded-lg font-semibold text-lg hover:bg-slate-50 transition-all w-full sm:w-auto max-w-xs">
                        Voir nos projets
                    </button>
                </div>

                <!-- Grille de statistiques (3 colonnes) -->
                <!-- grid : active CSS Grid (système de grille) -->
                <!-- grid-cols-3 : 3 colonnes de même largeur (même sur mobile) -->
                <!-- gap-8 : espace de 2rem (32px) entre les cellules de la grille -->
                <!-- max-w-lg : largeur max de 32rem (512px) -->
                <!-- mx-auto : centrage horizontal -->
                <!-- animate-slide-up : animation de glissement -->
                <!-- style="animation-delay: 0.6s;" : délai de 0.6s (apparaît en dernier) -->
                <div class="grid grid-cols-3 gap-8 max-w-lg mx-auto animate-slide-up" style="animation-delay: 0.6s;">
                    
                    <!-- Statistique 1 : Nombre de projets -->
                    <!-- text-center : texte centré dans la cellule -->
                    <div class="text-center">
                        <!-- Chiffre en grand et en couleur -->
                        <!-- text-2xl : 1.5rem (24px) par défaut -->
                        <!-- md:text-3xl : 1.875rem (30px) sur tablettes+ -->
                        <!-- font-bold : poids gras (700) -->
                        <!-- text-primary-500 : couleur bleue (#3b82f6) -->
                        <!-- mb-1 : margin-bottom de 0.25rem (4px) - petit espace -->
                        <div class="text-2xl md:text-3xl font-bold text-primary-500 mb-1">50+</div>
                        
                        <!-- Label descriptif en petit -->
                        <!-- text-sm : petite taille 0.875rem (14px) -->
                        <!-- text-slate-600 : gris moyen (#475569) -->
                        <div class="text-sm text-slate-600">Projets</div>
                    </div>
                    
                    <!-- Statistique 2 : Satisfaction client -->
                    <div class="text-center">
                        <div class="text-2xl md:text-3xl font-bold text-primary-500 mb-1">100%</div>
                        <div class="text-sm text-slate-600">Satisfaction</div>
                    </div>
                    
                    <!-- Statistique 3 : Support technique -->
                    <div class="text-center">
                        <div class="text-2xl md:text-3xl font-bold text-primary-500 mb-1">24/7</div>
                        <div class="text-sm text-slate-600">Support</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Services -->
    <section id="services" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Nos Services</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                    Nous proposons une gamme complète de services pour réussir vos projets web
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <div class="bg-slate-50 hover:bg-white p-8 rounded-xl border border-slate-200 hover:border-primary-200 hover:shadow-lg transition-all duration-300 group">
                    <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-6 group-hover:bg-primary-500 transition-colors">
                        <svg class="w-6 h-6 text-primary-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Développement Web</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Applications web modernes et responsives avec les dernières technologies et frameworks
                    </p>
                </div>

                <div class="bg-slate-50 hover:bg-white p-8 rounded-xl border border-slate-200 hover:border-primary-200 hover:shadow-lg transition-all duration-300 group">
                    <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-6 group-hover:bg-primary-500 transition-colors">
                        <svg class="w-6 h-6 text-primary-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Applications Mobile</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Applications mobiles natives et hybrides pour iOS et Android avec performances optimales
                    </p>
                </div>

                <div class="bg-slate-50 hover:bg-white p-8 rounded-xl border border-slate-200 hover:border-primary-200 hover:shadow-lg transition-all duration-300 group">
                    <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-6 group-hover:bg-primary-500 transition-colors">
                        <svg class="w-6 h-6 text-primary-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Cloud & DevOps</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Déploiement cloud, intégration continue et maintenance de vos applications
                    </p>
                </div>

                <div class="bg-slate-50 hover:bg-white p-8 rounded-xl border border-slate-200 hover:border-primary-200 hover:shadow-lg transition-all duration-300 group">
                    <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-6 group-hover:bg-primary-500 transition-colors">
                        <svg class="w-6 h-6 text-primary-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Tests & Qualité</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Tests automatisés, audit de code et optimisation des performances
                    </p>
                </div>

                <div class="bg-slate-50 hover:bg-white p-8 rounded-xl border border-slate-200 hover:border-primary-200 hover:shadow-lg transition-all duration-300 group">
                    <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-6 group-hover:bg-primary-500 transition-colors">
                        <svg class="w-6 h-6 text-primary-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">UX/UI Design</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Design d'interfaces utilisateur modernes et expérience utilisateur optimisée
                    </p>
                </div>

                <div class="bg-slate-50 hover:bg-white p-8 rounded-xl border border-slate-200 hover:border-primary-200 hover:shadow-lg transition-all duration-300 group">
                    <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-6 group-hover:bg-primary-500 transition-colors">
                        <svg class="w-6 h-6 text-primary-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-900 mb-3">Consulting</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Conseil en architecture technique et stratégie digitale pour vos projets
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Projets -->
    <section id="projets" class="py-20 bg-slate-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Nos Réalisations</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">
                    Découvrez quelques-uns de nos projets récents et nos réussites
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow border">
                    <div class="h-48 bg-gradient-to-br from-primary-500 to-blue-600"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-slate-900 mb-3">E-commerce Platform</h3>
                        <p class="text-slate-600 mb-4 leading-relaxed">
                            Plateforme e-commerce complète avec gestion des stocks et paiements sécurisés
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-primary-100 text-primary-700 text-xs rounded-full font-medium">React</span>
                            <span class="px-3 py-1 bg-primary-100 text-primary-700 text-xs rounded-full font-medium">Node.js</span>
                            <span class="px-3 py-1 bg-primary-100 text-primary-700 text-xs rounded-full font-medium">MongoDB</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow border">
                    <div class="h-48 bg-gradient-to-br from-blue-500 to-purple-600"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-slate-900 mb-3">Dashboard Analytics</h3>
                        <p class="text-slate-600 mb-4 leading-relaxed">
                            Tableau de bord analytique avec visualisation de données en temps réel
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-primary-100 text-primary-700 text-xs rounded-full font-medium">Vue.js</span>
                            <span class="px-3 py-1 bg-primary-100 text-primary-700 text-xs rounded-full font-medium">Python</span>
                            <span class="px-3 py-1 bg-primary-100 text-primary-700 text-xs rounded-full font-medium">PostgreSQL</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow border">
                    <div class="h-48 bg-gradient-to-br from-green-500 to-blue-600"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-slate-900 mb-3">Mobile Banking</h3>
                        <p class="text-slate-600 mb-4 leading-relaxed">
                            Application bancaire mobile sécurisée avec authentification biométrique
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-primary-100 text-primary-700 text-xs rounded-full font-medium">React Native</span>
                            <span class="px-3 py-1 bg-primary-100 text-primary-700 text-xs rounded-full font-medium">Firebase</span>
                            <span class="px-3 py-1 bg-primary-100 text-primary-700 text-xs rounded-full font-medium">AWS</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <button class="border border-primary-500 text-primary-500 hover:bg-primary-500 hover:text-white px-8 py-3 rounded-lg font-semibold transition-all">
                    Voir tous nos projets
                </button>
            </div>
        </div>
    </section>

    <!-- Section Contact -->
    <section id="contact" class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Contactez-nous</h2>
                <p class="text-lg text-slate-600">
                    Prêt à démarrer votre projet ? Parlons-en ensemble !
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                
                <div class="space-y-8">
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900 mb-1">Email</h3>
                            <p class="text-slate-600">contact@techflow.dev</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900 mb-1">Téléphone</h3>
                            <p class="text-slate-600">+33 1 23 45 67 89</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900 mb-1">Adresse</h3>
                            <p class="text-slate-600">123 Avenue de la République<br>75011 Paris, France</p>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50 p-8 rounded-xl">
                    <form class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Nom complet</label>
                            <input type="text" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                            <input type="email" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Message</label>
                            <textarea rows="4" class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent resize-none transition-all"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-primary-500 hover:bg-primary-600 text-white py-3 rounded-lg font-semibold transition-colors">
                            Envoyer le message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white py-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-8 h-8 bg-primary-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold">TechFlow</span>
                    </div>
                    <p class="text-slate-400 mb-6 max-w-md leading-relaxed">
                        Studio de développement spécialisé dans la création d'applications web et mobiles modernes.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-slate-800 hover:bg-primary-500 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 hover:bg-primary-500 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="font-semibold mb-4">Navigation</h4>
                    <ul class="space-y-2">
                        <li><a href="#accueil" class="text-slate-400 hover:text-white transition-colors">Accueil</a></li>
                        <li><a href="#services" class="text-slate-400 hover:text-white transition-colors">Services</a></li>
                        <li><a href="#projets" class="text-slate-400 hover:text-white transition-colors">Projets</a></li>
                        <li><a href="#contact" class="text-slate-400 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold mb-4">Services</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Développement Web</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Applications Mobile</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Cloud & DevOps</a></li>
                        <li><a href="#" class="text-slate-400 hover:text-white transition-colors">Consulting</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-800 pt-8 text-center">
                <p class="text-slate-400">
                    &copy; 2025 TechFlow. Tous droits réservés. Créé avec 
                    <span class="text-primary-400 font-semibold">Tailwind CSS</span>
                </p>
            </div>
        </div>
    </footer>

</body>
</html>