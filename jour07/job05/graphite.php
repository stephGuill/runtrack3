<!-- Déclaration HTML5 : indique au navigateur qu'il s'agit d'un document HTML5 -->
<!DOCTYPE html>

<!-- Élément racine HTML -->
<!-- lang="fr" : définit la langue du document (français) pour l'accessibilité et le SEO -->
<!-- scroll-smooth : active le défilement fluide lors du clic sur les ancres (liens #section) -->
<html lang="fr" class="scroll-smooth">

<head>
    <!-- Encodage des caractères : UTF-8 supporte tous les caractères français et internationaux -->
    <meta charset="UTF-8">
    
    <!-- Configuration du viewport pour le responsive design -->
    <!-- width=device-width : la largeur de la page s'adapte à la largeur de l'écran -->
    <!-- initial-scale=1.0 : zoom initial à 100% (pas de zoom automatique) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Titre de la page qui s'affiche dans l'onglet du navigateur -->
    <title>Graphite - La nouvelle génération de code review</title>
    
    <!-- Chargement de Tailwind CSS depuis un CDN (Content Delivery Network) -->
    <!-- CDN = serveur distant qui héberge la bibliothèque Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Configuration JavaScript personnalisée de Tailwind -->
    <script>
        // Objet de configuration Tailwind pour personnaliser les styles
        tailwind.config = {
            theme: {
                // extend : permet d'ajouter des styles personnalisés sans écraser les styles par défaut
                extend: {
                    // Définition de couleurs personnalisées pour le thème Graphite
                    colors: {
                        // Palette de couleurs "graphite" avec des nuances de noir/gris et vert
                        'graphite': {
                            // Noir très foncé pour l'arrière-plan principal (10, 10, 10 en RGB)
                            'dark': '#0a0a0a',
                            
                            // Noir légèrement plus clair pour les surfaces/cartes (17, 17, 17 en RGB)
                            'surface': '#111111',
                            
                            // Gris très foncé pour les bordures (26, 26, 26 en RGB)
                            'border': '#1a1a1a',
                            
                            // Vert vif signature de Graphite (0, 255, 136 en RGB) - couleur principale
                            'green': '#00ff88',
                            
                            // Vert plus foncé pour les états hover (0, 204, 106 en RGB)
                            'green-dark': '#00cc6a',
                            
                            // Blanc cassé pour le texte principal (229, 229, 229 en RGB)
                            'text': '#e5e5e5',
                            
                            // Gris moyen pour le texte secondaire/atténué (161, 161, 161 en RGB)
                            'text-muted': '#a1a1a1'
                        }
                    },
                    // Définition des animations personnalisées
                    animation: {
                        // Animation d'apparition en fondu
                        // fadeIn : nom de l'animation (définie dans keyframes)
                        // 0.8s : durée de l'animation (0.8 secondes)
                        // ease-out : l'animation démarre vite puis ralentit progressivement
                        'fade-in': 'fadeIn 0.8s ease-out',
                        
                        // Animation de glissement depuis le bas vers le haut
                        // slideUp : nom de l'animation
                        // 0.8s : durée
                        // ease-out : décélération progressive
                        'slide-up': 'slideUp 0.8s ease-out',
                        
                        // Animation de lueur pulsante
                        // glow : nom de l'animation
                        // 2s : durée de 2 secondes
                        // ease-in-out : démarre lentement, accélère, puis ralentit
                        // infinite : se répète à l'infini
                        // alternate : alterne entre début et fin (aller-retour)
                        'glow': 'glow 2s ease-in-out infinite alternate'
                    },
                    // Keyframes : définition des étapes de chaque animation (0% = début, 100% = fin)
                    keyframes: {
                        // Animation fadeIn : apparition en fondu depuis le bas
                        fadeIn: {
                            // État initial (0% = début de l'animation)
                            '0%': { 
                                opacity: '0',                      // Élément invisible (0 = transparent)
                                transform: 'translateY(20px)'      // Décalé de 20px vers le bas
                            },
                            // État final (100% = fin de l'animation)
                            '100%': { 
                                opacity: '1',                      // Élément complètement visible (1 = opaque)
                                transform: 'translateY(0)'         // Position normale (pas de décalage)
                            }
                        },
                        // Animation slideUp : glissement plus prononcé depuis le bas
                        slideUp: {
                            // État initial
                            '0%': { 
                                opacity: '0',                      // Invisible
                                transform: 'translateY(40px)'      // Plus bas (40px au lieu de 20px)
                            },
                            // État final
                            '100%': { 
                                opacity: '1',                      // Visible
                                transform: 'translateY(0)'         // Position normale
                            }
                        },
                        // Animation glow : effet de lueur qui pulse
                        glow: {
                            // État initial (lueur faible)
                            '0%': { 
                                // boxShadow : ombre autour de l'élément
                                // 0 0 : position horizontale et verticale (centrée)
                                // 20px : rayon de flou
                                // rgba(0, 255, 136, 0.3) : couleur verte avec 30% d'opacité
                                boxShadow: '0 0 20px rgba(0, 255, 136, 0.3)' 
                            },
                            // État final (lueur intense) - l'animation alterne entre les deux
                            '100%': { 
                                // Flou plus large (40px) et opacité plus forte (60%)
                                boxShadow: '0 0 40px rgba(0, 255, 136, 0.6)' 
                            }
                        }
                    },
                    // Définition des polices de caractères personnalisées
                    fontFamily: {
                        // Police pour les titres/display (grands textes)
                        // 'Inter' : police moderne et lisible de Google Fonts
                        // 'sans-serif' : police de secours si Inter ne charge pas
                        'display': ['Inter', 'sans-serif'],
                        
                        // Police pour le corps de texte (texte normal)
                        // Utilise aussi Inter pour une cohérence visuelle
                        'body': ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
    
    <!-- Chargement de la police Inter depuis Google Fonts -->
    <!-- wght@300;400;500;600;700;800;900 : différents poids (épaisseurs) de la police -->
    <!-- 300 = Light, 400 = Regular, 500 = Medium, 600 = Semi-bold, 700 = Bold, 800 = Extra-bold, 900 = Black -->
    <!-- display=swap : affiche une police de secours pendant le chargement pour éviter le texte invisible -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<!-- Corps du document HTML -->
<!-- bg-graphite-dark : fond noir très foncé (#0a0a0a) -->
<!-- text-graphite-text : couleur de texte blanc cassé (#e5e5e5) -->
<!-- font-body : utilise la police Inter définie dans fontFamily.body -->
<!-- overflow-x-hidden : empêche le scroll horizontal (cache tout débordement horizontal) -->
<body class="bg-graphite-dark text-graphite-text font-body overflow-x-hidden">
    
    <!-- Navigation principale - Style Graphite -->
    <!-- fixed : position fixe (reste collée lors du scroll) -->
    <!-- top-0 left-0 right-0 : positionnée en haut et étirée sur toute la largeur -->
    <!-- z-50 : z-index élevé (50) pour être au-dessus des autres éléments -->
    <!-- bg-graphite-dark/80 : fond noir avec 80% d'opacité (20% transparent) -->
    <!-- backdrop-blur-xl : effet de flou sur le contenu derrière (effet verre dépoli) -->
    <!-- border-b : bordure uniquement en bas -->
    <!-- border-graphite-border : couleur de bordure gris foncé (#1a1a1a) -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-graphite-dark/80 backdrop-blur-xl border-b border-graphite-border">
        <!-- Container principal de la navigation -->
        <!-- max-w-7xl : largeur maximale de 80rem (1280px) pour éviter que le contenu soit trop large -->
        <!-- mx-auto : centre horizontalement le container (margin-left et margin-right auto) -->
        <!-- px-6 : padding horizontal de 1.5rem (24px) par défaut -->
        <!-- lg:px-8 : sur grands écrans (≥1024px), padding horizontal de 2rem (32px) -->
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <!-- Container flex pour aligner les éléments de la nav -->
            <!-- flex : active flexbox (disposition flexible horizontale) -->
            <!-- items-center : aligne verticalement au centre -->
            <!-- justify-between : espace maximum entre les éléments (logo à gauche, boutons à droite) -->
            <!-- h-16 : hauteur de 4rem (64px) -->
            <div class="flex items-center justify-between h-16">
                
                <!-- Section Logo Graphite -->
                <!-- flex : flexbox horizontale -->
                <!-- items-center : alignement vertical centré -->
                <!-- space-x-3 : espace horizontal de 0.75rem (12px) entre les enfants -->
                <!-- animate-fade-in : applique l'animation fadeIn (apparition en fondu) -->
                <div class="flex items-center space-x-3 animate-fade-in">
                    
                    <!-- Icône du logo (carré vert avec symbole) -->
                    <!-- w-8 h-8 : largeur et hauteur de 2rem (32px) = carré -->
                    <!-- bg-graphite-green : fond vert vif (#00ff88) -->
                    <!-- rounded-lg : coins arrondis (border-radius: 0.5rem = 8px) -->
                    <!-- flex items-center justify-center : centre le contenu horizontalement et verticalement -->
                    <div class="w-8 h-8 bg-graphite-green rounded-lg flex items-center justify-center">
                        
                        <!-- Icône SVG (Scalable Vector Graphics = graphique vectoriel) -->
                        <!-- w-5 h-5 : largeur et hauteur de 1.25rem (20px) -->
                        <!-- text-graphite-dark : couleur noir (#0a0a0a) appliquée via currentColor -->
                        <!-- fill="currentColor" : remplit le SVG avec la couleur du texte parent -->
                        <!-- viewBox="0 0 24 24" : zone de dessin de 24×24 unités (système de coordonnées) -->
                        <svg class="w-5 h-5 text-graphite-dark" fill="currentColor" viewBox="0 0 24 24">
                            <!-- path : définit la forme du dessin (trois couches empilées) -->
                            <!-- d : attribut contenant les commandes de dessin (M=move, L=line) -->
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    
                    <!-- Texte du logo "Graphite" -->
                    <!-- text-xl : taille de police 1.25rem (20px) -->
                    <!-- font-bold : poids de police gras (700) -->
                    <!-- text-white : couleur blanche (#ffffff) -->
                    <span class="text-xl font-bold text-white">Graphite</span>
                </div>

                <!-- Menu de Navigation (liens principaux) -->
                <!-- hidden : caché par défaut sur mobile -->
                <!-- lg:flex : s'affiche en flexbox sur grands écrans (≥1024px) = responsive -->
                <!-- items-center : alignement vertical centré -->
                <!-- space-x-8 : espace horizontal de 2rem (32px) entre chaque lien -->
                <div class="hidden lg:flex items-center space-x-8">
                    
                    <!-- Lien vers section Fonctionnalités -->
                    <!-- href="#features" : ancre qui scroll vers l'élément avec id="features" -->
                    <!-- text-graphite-text-muted : couleur grise par défaut (#a1a1a1) -->
                    <!-- hover:text-white : devient blanc au survol de la souris -->
                    <!-- font-medium : poids de police moyen (500) -->
                    <!-- transition-colors : animation fluide du changement de couleur -->
                    <a href="#features" class="text-graphite-text-muted hover:text-white font-medium transition-colors">Fonctionnalités</a>
                    
                    <!-- Lien vers section Tarifs -->
                    <a href="#pricing" class="text-graphite-text-muted hover:text-white font-medium transition-colors">Tarifs</a>
                    
                    <!-- Lien vers section Clients -->
                    <a href="#customers" class="text-graphite-text-muted hover:text-white font-medium transition-colors">Clients</a>
                    
                    <!-- Lien vers Documentation -->
                    <a href="#docs" class="text-graphite-text-muted hover:text-white font-medium transition-colors">Documentation</a>
                    
                    <!-- Lien vers Blog -->
                    <a href="#blog" class="text-graphite-text-muted hover:text-white font-medium transition-colors">Blog</a>
                </div>

                <!-- Boutons CTA (Call To Action = Appel à l'action) -->
                <!-- flex : disposition flexbox horizontale -->
                <!-- items-center : alignement vertical centré -->
                <!-- space-x-4 : espace horizontal de 1rem (16px) entre les boutons -->
                <div class="flex items-center space-x-4">
                    
                    <!-- Bouton "Se connecter" (secondaire) -->
                    <!-- hidden : caché par défaut sur très petits écrans -->
                    <!-- sm:block : visible sur écrans ≥640px (tablettes et +) -->
                    <!-- text-graphite-text-muted : texte gris (#a1a1a1) -->
                    <!-- hover:text-white : devient blanc au survol -->
                    <!-- font-medium : poids moyen (500) -->
                    <!-- transition-colors : animation fluide du changement de couleur -->
                    <button class="hidden sm:block text-graphite-text-muted hover:text-white font-medium transition-colors">
                        Se connecter
                    </button>
                    
                    <!-- Bouton "Commencer gratuitement" (principal) -->
                    <!-- bg-graphite-green : fond vert vif (#00ff88) -->
                    <!-- hover:bg-graphite-green-dark : fond vert plus foncé au survol (#00cc6a) -->
                    <!-- text-graphite-dark : texte noir (#0a0a0a) pour contraster avec le fond vert -->
                    <!-- px-6 : padding horizontal de 1.5rem (24px) -->
                    <!-- py-2 : padding vertical de 0.5rem (8px) -->
                    <!-- rounded-lg : coins arrondis (8px) -->
                    <!-- font-semibold : poids semi-gras (600) -->
                    <!-- transition-colors : animation fluide du changement de couleur de fond -->
                    <button class="bg-graphite-green hover:bg-graphite-green-dark text-graphite-dark px-6 py-2 rounded-lg font-semibold transition-colors">
                        Commencer gratuitement
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Section Hero (section principale d'accueil) - Style Graphite -->
    <!-- pt-16 : padding-top de 4rem (64px) pour compenser la nav fixe -->
    <!-- pb-32 : padding-bottom de 8rem (128px) pour espacement -->
    <!-- bg-graphite-dark : fond noir très foncé (#0a0a0a) -->
    <!-- relative : position relative (sert de référence pour les enfants absolus) -->
    <!-- overflow-hidden : cache tout ce qui dépasse des limites (pour les effets de flou) -->
    <section class="pt-16 pb-32 bg-graphite-dark relative overflow-hidden">
        
        <!-- Effets d'arrière-plan avec dégradés lumineux -->
        <!-- absolute : position absolue (par rapport au parent relative) -->
        <!-- inset-0 : top/right/bottom/left = 0 (remplit tout le parent) -->
        <div class="absolute inset-0">
            
            <!-- Container pour centrer les effets lumineux -->
            <!-- absolute : position absolue -->
            <!-- top-0 : positionné en haut -->
            <!-- left-1/2 : positionné à 50% de la gauche -->
            <!-- transform -translate-x-1/2 : décale de -50% pour centrer parfaitement -->
            <!-- w-full h-full : largeur et hauteur 100% -->
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-full h-full">
                
                <!-- Premier cercle de lumière verte (en haut à gauche) -->
                <!-- absolute : position absolue -->
                <!-- top-20 : 5rem (80px) depuis le haut -->
                <!-- left-1/4 : positionné à 25% de la gauche -->
                <!-- w-96 h-96 : largeur et hauteur de 24rem (384px) = cercle -->
                <!-- bg-graphite-green/5 : fond vert avec 5% d'opacité (très transparent) -->
                <!-- rounded-full : border-radius 9999px (cercle parfait) -->
                <!-- blur-3xl : flou très intense (64px) pour effet de lumière diffuse -->
                <div class="absolute top-20 left-1/4 w-96 h-96 bg-graphite-green/5 rounded-full blur-3xl"></div>
                
                <!-- Deuxième cercle de lumière verte (en bas à droite) -->
                <!-- bottom-20 : 5rem depuis le bas -->
                <!-- right-1/4 : positionné à 25% de la droite -->
                <!-- w-128 h-128 : largeur et hauteur de 32rem (512px) = plus grand cercle -->
                <!-- bg-graphite-green/3 : fond vert avec 3% d'opacité (encore plus transparent) -->
                <div class="absolute bottom-20 right-1/4 w-128 h-128 bg-graphite-green/3 rounded-full blur-3xl"></div>
            </div>
        </div>

        <!-- Container principal du contenu Hero -->
        <!-- max-w-7xl : largeur max de 80rem (1280px) -->
        <!-- mx-auto : centre horizontalement -->
        <!-- px-6 : padding horizontal de 1.5rem (24px) -->
        <!-- lg:px-8 : padding horizontal de 2rem (32px) sur grands écrans -->
        <!-- relative : position relative -->
        <!-- z-10 : z-index 10 pour être au-dessus des effets d'arrière-plan (z-0) -->
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            
            <!-- Container du contenu centré -->
            <!-- text-center : texte centré -->
            <!-- pt-20 : padding-top de 5rem (80px) -->
            <!-- pb-16 : padding-bottom de 4rem (64px) -->
            <div class="text-center pt-20 pb-16">
                
                <!-- Badge d'annonce (petit encadré avec point vert) -->
                <!-- inline-flex : flexbox inline (s'adapte à la largeur du contenu) -->
                <!-- items-center : alignement vertical centré -->
                <!-- space-x-2 : espace horizontal de 0.5rem (8px) entre les enfants -->
                <!-- bg-graphite-surface : fond gris foncé (#111111) -->
                <!-- border border-graphite-border : bordure gris très foncé (#1a1a1a) -->
                <!-- rounded-full : coins complètement arrondis (pilule) -->
                <!-- px-4 : padding horizontal de 1rem (16px) -->
                <!-- py-2 : padding vertical de 0.5rem (8px) -->
                <!-- mb-8 : margin-bottom de 2rem (32px) -->
                <!-- animate-fade-in : animation d'apparition en fondu -->
                <div class="inline-flex items-center space-x-2 bg-graphite-surface border border-graphite-border rounded-full px-4 py-2 mb-8 animate-fade-in">
                    
                    <!-- Point vert clignotant -->
                    <!-- w-2 h-2 : largeur et hauteur de 0.5rem (8px) = petit cercle -->
                    <!-- bg-graphite-green : fond vert (#00ff88) -->
                    <!-- rounded-full : cercle parfait -->
                    <!-- animate-pulse : animation de pulsation (opacité 0-100% en boucle) -->
                    <span class="w-2 h-2 bg-graphite-green rounded-full animate-pulse"></span>
                    
                    <!-- Texte de l'annonce -->
                    <!-- text-sm : taille de police 0.875rem (14px) -->
                    <!-- text-graphite-text-muted : couleur grise (#a1a1a1) -->
                    <span class="text-sm text-graphite-text-muted">
                        Découvrez Graphite Agent — votre réviseur IA collaboratif
                    </span>
                </div>

                <!-- Titre principal Hero (h1 = titre le plus important pour le SEO) -->
                <!-- text-5xl : taille de police 3rem (48px) par défaut -->
                <!-- lg:text-7xl : sur grands écrans, taille de 4.5rem (72px) = responsive -->
                <!-- font-black : poids de police ultra-gras (900) -->
                <!-- text-white : couleur blanche -->
                <!-- mb-8 : margin-bottom de 2rem (32px) -->
                <!-- leading-tight : line-height serré (1.25) pour un titre compact -->
                <!-- animate-slide-up : animation de glissement depuis le bas -->
                <h1 class="text-5xl lg:text-7xl font-black text-white mb-8 leading-tight animate-slide-up">
                    La nouvelle génération
                    
                    <!-- br : saut de ligne -->
                    <br>
                    
                    <!-- Texte avec dégradé de couleur -->
                    <!-- bg-gradient-to-r : dégradé linéaire de gauche à droite (to-right) -->
                    <!-- from-graphite-green : couleur de départ du dégradé = vert vif (#00ff88) -->
                    <!-- to-green-400 : couleur d'arrivée = vert Tailwind 400 (#4ade80) -->
                    <!-- bg-clip-text : le dégradé s'applique uniquement au texte (propriété expérimentale CSS) -->
                    <!-- text-transparent : rend le texte transparent pour voir le dégradé en arrière-plan -->
                    <span class="bg-gradient-to-r from-graphite-green to-green-400 bg-clip-text text-transparent">
                        de code review
                    </span>
                </h1>

                <!-- Description Hero (paragraphe explicatif) -->
                <!-- text-xl : taille 1.25rem (20px) par défaut -->
                <!-- lg:text-2xl : taille 1.5rem (24px) sur grands écrans -->
                <!-- text-graphite-text-muted : couleur grise (#a1a1a1) -->
                <!-- mb-12 : margin-bottom de 3rem (48px) -->
                <!-- max-w-4xl : largeur max de 56rem (896px) -->
                <!-- mx-auto : centre horizontalement -->
                <!-- leading-relaxed : line-height espacé (1.625) pour une meilleure lisibilité -->
                <!-- animate-slide-up : animation de glissement -->
                <!-- style="animation-delay: 0.2s;" : délai de 0.2s avant le démarrage (CSS inline) -->
                <p class="text-xl lg:text-2xl text-graphite-text-muted mb-12 max-w-4xl mx-auto leading-relaxed animate-slide-up" style="animation-delay: 0.2s;">
                    Graphite est la plateforme de review de code IA où les équipes livrent 
                    du code de meilleure qualité, plus rapidement.
                </p>

                <!-- Boutons CTA (Call To Action) -->
                <!-- flex : flexbox -->
                <!-- flex-col : direction verticale par défaut (mobile) -->
                <!-- sm:flex-row : direction horizontale sur écrans ≥640px (tablettes+) -->
                <!-- items-center : alignement vertical centré -->
                <!-- justify-center : alignement horizontal centré -->
                <!-- gap-4 : espace de 1rem (16px) entre les boutons (fonctionne en column et row) -->
                <!-- mb-16 : margin-bottom de 4rem (64px) -->
                <!-- animate-slide-up : animation de glissement -->
                <!-- style="animation-delay: 0.4s;" : délai de 0.4s (apparaît après la description) -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16 animate-slide-up" style="animation-delay: 0.4s;">
                    
                    <!-- Bouton principal "Commencer gratuitement" -->
                    <!-- bg-graphite-green : fond vert vif (#00ff88) -->
                    <!-- hover:bg-graphite-green-dark : fond vert foncé au survol (#00cc6a) -->
                    <!-- text-graphite-dark : texte noir (#0a0a0a) -->
                    <!-- px-8 : padding horizontal de 2rem (32px) -->
                    <!-- py-4 : padding vertical de 1rem (16px) -->
                    <!-- rounded-lg : coins arrondis (8px) -->
                    <!-- font-bold : poids gras (700) -->
                    <!-- text-lg : taille 1.125rem (18px) -->
                    <!-- transition-all : anime TOUTES les propriétés modifiées -->
                    <!-- transform : active les transformations CSS -->
                    <!-- hover:scale-105 : agrandit de 5% au survol (effet zoom) -->
                    <!-- min-w-[240px] : largeur minimale de 240px (notation arbitraire Tailwind) -->
                    <!-- animate-glow : animation de lueur pulsante -->
                    <button class="bg-graphite-green hover:bg-graphite-green-dark text-graphite-dark px-8 py-4 rounded-lg font-bold text-lg transition-all transform hover:scale-105 min-w-[240px] animate-glow">
                        Commencer gratuitement
                    </button>
                    
                    <!-- Bouton secondaire "Demander une démo" -->
                    <!-- border : ajoute une bordure -->
                    <!-- border-graphite-border : couleur de bordure gris foncé (#1a1a1a) -->
                    <!-- hover:border-graphite-green : bordure verte au survol -->
                    <!-- text-white : texte blanc -->
                    <!-- hover:bg-graphite-surface : fond gris foncé au survol (#111111) -->
                    <!-- transition-all : anime tous les changements -->
                    <button class="border border-graphite-border hover:border-graphite-green text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-graphite-surface transition-all min-w-[240px]">
                        Demander une démo
                    </button>
                </div>

                <!-- Badge de confiance (Trust Badge) - Rassure l'utilisateur -->
                <!-- text-sm : petite taille de texte 0.875rem (14px) -->
                <!-- text-graphite-text-muted : couleur grise (#a1a1a1) -->
                <!-- mb-12 : margin-bottom de 3rem (48px) -->
                <!-- animate-slide-up : animation de glissement -->
                <!-- style="animation-delay: 0.6s;" : délai de 0.6s (apparaît après les boutons) -->
                <p class="text-sm text-graphite-text-muted mb-12 animate-slide-up" style="animation-delay: 0.6s;">
                    Gratuit pendant 30 jours. Aucune carte de crédit requise. 
                    Synchronisé avec votre compte GitHub.
                </p>

                <!-- Section "Trusted By" (Utilisé par) - Logos des clients -->
                <!-- animate-slide-up : animation de glissement -->
                <!-- style="animation-delay: 0.8s;" : délai de 0.8s (dernier élément à apparaître) -->
                <div class="animate-slide-up" style="animation-delay: 0.8s;">
                    
                    <!-- Titre de la section "Trusted By" -->
                    <!-- text-sm : petite taille 14px -->
                    <!-- text-graphite-text-muted : gris (#a1a1a1) -->
                    <!-- mb-8 : margin-bottom de 2rem (32px) -->
                    <p class="text-sm text-graphite-text-muted mb-8">
                        Utilisé par les meilleures équipes d'ingénierie
                    </p>
                    
                    <!-- Container des logos clients -->
                    <!-- flex : flexbox horizontale -->
                    <!-- items-center : alignement vertical centré -->
                    <!-- justify-center : alignement horizontal centré -->
                    <!-- space-x-8 : espace de 2rem (32px) entre chaque logo -->
                    <!-- opacity-50 : opacité de 50% (logos en transparence pour effet subtil) -->
                    <div class="flex items-center justify-center space-x-8 opacity-50">
                        
                        <!-- Logo Shopify (placeholder) -->
                        <!-- w-20 : largeur de 5rem (80px) -->
                        <!-- h-8 : hauteur de 2rem (32px) -->
                        <!-- bg-graphite-surface : fond gris foncé (#111111) -->
                        <!-- rounded : coins légèrement arrondis (4px) -->
                        <!-- border border-graphite-border : bordure grise (#1a1a1a) -->
                        <!-- flex items-center justify-center : centre le texte -->
                        <div class="w-20 h-8 bg-graphite-surface rounded border border-graphite-border flex items-center justify-center">
                            <!-- text-xs : très petite taille 0.75rem (12px) -->
                            <span class="text-xs text-graphite-text-muted">Shopify</span>
                        </div>
                        
                        <!-- Logo Asana -->
                        <div class="w-20 h-8 bg-graphite-surface rounded border border-graphite-border flex items-center justify-center">
                            <span class="text-xs text-graphite-text-muted">Asana</span>
                        </div>
                        
                        <!-- Logo Ramp -->
                        <div class="w-20 h-8 bg-graphite-surface rounded border border-graphite-border flex items-center justify-center">
                            <span class="text-xs text-graphite-text-muted">Ramp</span>
                        </div>
                        
                        <!-- Logo Semgrep -->
                        <div class="w-20 h-8 bg-graphite-surface rounded border border-graphite-border flex items-center justify-center">
                            <span class="text-xs text-graphite-text-muted">Semgrep</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Fonctionnalités (Features Section) -->
    <!-- id="features" : ancre pour navigation (lien #features) -->
    <!-- py-32 : padding vertical de 8rem (128px) en haut et en bas -->
    <!-- bg-graphite-surface : fond gris foncé (#111111) différent du noir pour contraste -->
    <section id="features" class="py-32 bg-graphite-surface">
        
        <!-- Container principal -->
        <!-- max-w-7xl : largeur max de 1280px -->
        <!-- mx-auto : centrage horizontal -->
        <!-- px-6 lg:px-8 : padding horizontal responsive (24px → 32px) -->
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <!-- En-tête de la section -->
            <!-- text-center : texte centré -->
            <!-- mb-20 : margin-bottom de 5rem (80px) pour espacer du contenu -->
            <div class="text-center mb-20">
                
                <!-- Titre h2 (deuxième niveau de titre) -->
                <!-- text-4xl : taille 2.25rem (36px) par défaut -->
                <!-- lg:text-5xl : taille 3rem (48px) sur grands écrans -->
                <!-- font-black : poids ultra-gras (900) -->
                <!-- text-white : couleur blanche -->
                <!-- mb-6 : margin-bottom de 1.5rem (24px) -->
                <h2 class="text-4xl lg:text-5xl font-black text-white mb-6">
                    Tout ce dont vous avez besoin
                    
                    <!-- span avec saut de ligne -->
                    <!-- block : transforme le span en élément bloc (passe à la ligne) -->
                    <!-- text-graphite-green : couleur verte (#00ff88) pour mise en valeur -->
                    <span class="block text-graphite-green">pour livrer plus vite</span>
                </h2>
                
                <!-- Sous-titre descriptif -->
                <!-- text-xl : taille 1.25rem (20px) -->
                <!-- text-graphite-text-muted : couleur grise (#a1a1a1) -->
                <!-- max-w-3xl : largeur max de 48rem (768px) -->
                <!-- mx-auto : centrage horizontal -->
                <p class="text-xl text-graphite-text-muted max-w-3xl mx-auto">
                    Un outil end-to-end pour simplifier et accélérer votre workflow
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                <!-- Feature 1 -->
                <div class="space-y-6">
                    <div class="w-12 h-12 bg-graphite-green/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-graphite-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Le réviseur IA avec qui vous pouvez collaborer</h3>
                    <p class="text-lg text-graphite-text-muted leading-relaxed">
                        Avec Graphite Agent, obtenez un contexte instantané sur les changements de code, 
                        corrigez les échecs CI et améliorez vos PRs instantanément directement depuis votre page PR.
                    </p>
                    <div class="flex space-x-4">
                        <button class="text-graphite-green hover:text-white font-semibold transition-colors">
                            Commencer à discuter →
                        </button>
                    </div>
                </div>

                <!-- Feature Image Placeholder -->
                <div class="bg-graphite-border rounded-2xl h-80 flex items-center justify-center">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-graphite-green/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-graphite-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </div>
                        <p class="text-graphite-text-muted">Interface IA Graphite Agent</p>
                    </div>
                </div>

                <!-- Feature Image Placeholder -->
                <div class="bg-graphite-border rounded-2xl h-80 flex items-center justify-center lg:order-first">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-graphite-green/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-graphite-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <p class="text-graphite-text-muted">Reviews AI plus rapides</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="space-y-6">
                    <div class="w-12 h-12 bg-graphite-green/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-graphite-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Reviewez plus vite, livrez plus tôt</h3>
                    <p class="text-lg text-graphite-text-muted leading-relaxed">
                        Obtenez des reviews IA de haute qualité sur chaque PR pour détecter les bugs critiques 
                        et obtenir des corrections suggérées, avant le merge.
                    </p>
                    <div class="flex space-x-4">
                        <button class="text-graphite-green hover:text-white font-semibold transition-colors">
                            En savoir plus sur les reviews IA →
                        </button>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="space-y-6">
                    <div class="w-12 h-12 bg-graphite-green/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-graphite-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Mergez sans conflits ni retards</h3>
                    <p class="text-lg text-graphite-text-muted leading-relaxed">
                        Notre merge queue consciente des stacks fait atterrir les PRs dans l'ordre et garde 
                        les branches vertes, vous aidant à prendre de l'élan.
                    </p>
                    <div class="flex space-x-4">
                        <button class="text-graphite-green hover:text-white font-semibold transition-colors">
                            En savoir plus sur les merge queues →
                        </button>
                    </div>
                </div>

                <!-- Feature Image Placeholder -->
                <div class="bg-graphite-border rounded-2xl h-80 flex items-center justify-center">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-graphite-green/20 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-graphite-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v6a2 2 0 002 2h2m0 0h2m-2 0v6a2 2 0 002 2h6a2 2 0 002-2v-6a2 2 0 00-2-2h-2m-2 0V9a2 2 0 00-2-2H9z"/>
                            </svg>
                        </div>
                        <p class="text-graphite-text-muted">Merge Queue Interface</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-32 bg-graphite-dark">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center mb-20">
                <h2 class="text-4xl lg:text-5xl font-black text-white mb-6">
                    Ce que disent nos clients
                </h2>
                <p class="text-xl text-graphite-text-muted max-w-3xl mx-auto">
                    Des milliers d'équipes nous font confiance pour améliorer leur workflow
                </p>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Testimonial 1 -->
                <div class="bg-graphite-surface border border-graphite-border rounded-2xl p-8">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-12 h-12 bg-graphite-green/20 rounded-full flex items-center justify-center">
                            <span class="text-graphite-green font-bold">S</span>
                        </div>
                        <div>
                            <div class="font-semibold text-white">Semgrep</div>
                            <div class="text-sm text-graphite-text-muted">Sécurité du code</div>
                        </div>
                    </div>
                    <p class="text-graphite-text leading-relaxed">
                        "Graphite nous a permis d'améliorer significativement notre process de review. 
                        L'IA détecte des problèmes que nous aurions pu manquer."
                    </p>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-graphite-surface border border-graphite-border rounded-2xl p-8">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-12 h-12 bg-graphite-green/20 rounded-full flex items-center justify-center">
                            <span class="text-graphite-green font-bold">A</span>
                        </div>
                        <div>
                            <div class="font-semibold text-white">Asana</div>
                            <div class="text-sm text-graphite-text-muted">Gestion de projets</div>
                        </div>
                    </div>
                    <p class="text-graphite-text leading-relaxed">
                        "Grâce aux merge queues, nous livrons plus rapidement sans compromettre 
                        la qualité. C'est un game changer pour notre équipe."
                    </p>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-graphite-surface border border-graphite-border rounded-2xl p-8">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-12 h-12 bg-graphite-green/20 rounded-full flex items-center justify-center">
                            <span class="text-graphite-green font-bold">R</span>
                        </div>
                        <div>
                            <div class="font-semibold text-white">Ramp</div>
                            <div class="text-sm text-graphite-text-muted">Fintech</div>
                        </div>
                    </div>
                    <p class="text-graphite-text leading-relaxed">
                        "L'intégration avec GitHub est parfaite. Graphite s'intègre naturellement 
                        dans notre workflow existant."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-32 bg-graphite-surface relative overflow-hidden">
        
        <!-- Background Effects -->
        <div class="absolute inset-0">
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full h-full">
                <div class="absolute w-96 h-96 bg-graphite-green/10 rounded-full blur-3xl"></div>
            </div>
        </div>

        <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-4xl lg:text-5xl font-black text-white mb-6">
                Construit pour les équipes d'ingénierie les plus rapides du monde,
                <span class="block text-graphite-green">maintenant disponible pour tous</span>
            </h2>
            
            <p class="text-xl text-graphite-text-muted mb-12 max-w-2xl mx-auto">
                Rejoignez des milliers d'équipes qui livrent du code plus rapidement avec Graphite
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <button class="bg-graphite-green hover:bg-graphite-green-dark text-graphite-dark px-8 py-4 rounded-lg font-bold text-lg transition-all transform hover:scale-105 min-w-[240px] animate-glow">
                    Commencer l'essai gratuit
                </button>
                <button class="border border-graphite-border hover:border-graphite-green text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-graphite-surface transition-all min-w-[240px]">
                    Demander une démo
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-graphite-dark border-t border-graphite-border py-16">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                
                <!-- Company Info -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-8 h-8 bg-graphite-green rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-graphite-dark" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-white">Graphite</span>
                    </div>
                    <p class="text-graphite-text-muted mb-6 max-w-md">
                        La plateforme de code review IA où les équipes livrent du code de meilleure qualité, plus rapidement.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-graphite-border hover:bg-graphite-green hover:text-graphite-dark rounded-lg flex items-center justify-center transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-graphite-border hover:bg-graphite-green hover:text-graphite-dark rounded-lg flex items-center justify-center transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-graphite-border hover:bg-graphite-green hover:text-graphite-dark rounded-lg flex items-center justify-center transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Product Links -->
                <div>
                    <h4 class="font-semibold text-white mb-4">Produit</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-graphite-text-muted hover:text-white transition-colors">Fonctionnalités</a></li>
                        <li><a href="#" class="text-graphite-text-muted hover:text-white transition-colors">CLI</a></li>
                        <li><a href="#" class="text-graphite-text-muted hover:text-white transition-colors">Merge queue</a></li>
                        <li><a href="#" class="text-graphite-text-muted hover:text-white transition-colors">Reviews IA</a></li>
                        <li><a href="#" class="text-graphite-text-muted hover:text-white transition-colors">Agent IA</a></li>
                    </ul>
                </div>

                <!-- Company Links -->
                <div>
                    <h4 class="font-semibold text-white mb-4">Entreprise</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-graphite-text-muted hover:text-white transition-colors">À propos</a></li>
                        <li><a href="#" class="text-graphite-text-muted hover:text-white transition-colors">Blog</a></li>
                        <li><a href="#" class="text-graphite-text-muted hover:text-white transition-colors">Clients</a></li>
                        <li><a href="#" class="text-graphite-text-muted hover:text-white transition-colors">Carrières</a></li>
                        <li><a href="#" class="text-graphite-text-muted hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-graphite-border pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-graphite-text-muted text-sm">
                    © 2025 Graphite. Tous droits réservés.
                </p>
                <div class="flex items-center space-x-4 mt-4 md:mt-0">
                    <a href="#" class="text-graphite-text-muted hover:text-white text-sm transition-colors">Confidentialité</a>
                    <a href="#" class="text-graphite-text-muted hover:text-white text-sm transition-colors">Conditions</a>
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-graphite-green rounded-full"></div>
                        <span class="text-sm text-graphite-text-muted">Tous les systèmes opérationnels</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>