<!-- ==================== DÉCLARATION HTML5 ==================== -->
<!DOCTYPE html>
<!-- Déclaration du type de document HTML5 - indique au navigateur qu'il s'agit d'un document HTML moderne -->

<html lang="fr" class="scroll-smooth">
<!-- Balise HTML racine avec attributs :
     - lang="fr" : définit la langue du document (français) pour l'accessibilité et le SEO
     - class="scroll-smooth" : active le défilement fluide pour les ancres (comportement smooth au lieu de saut brutal) -->

<head>
    <!-- ==================== EN-TÊTE DU DOCUMENT ==================== -->
    <!-- La section <head> contient les métadonnées et liens vers ressources externes -->
    
    <meta charset="UTF-8">
    <!-- Définit l'encodage des caractères en UTF-8 (supporte tous les caractères internationaux) -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Configure le viewport pour le responsive design :
         - width=device-width : la largeur correspond à l'écran de l'appareil
         - initial-scale=1.0 : zoom initial à 100% (pas de zoom par défaut) -->
    
    <title>NeoCode Studio - L'Avenir du Développement</title>
    <!-- Titre affiché dans l'onglet du navigateur -->
    
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Chargement de Tailwind CSS depuis le CDN (Content Delivery Network)
         Cette version permet d'utiliser Tailwind sans installation locale -->
    
    <script>
        <!-- ==================== CONFIGURATION TAILWIND CSS ==================== -->
        // Configuration JavaScript pour personnaliser Tailwind
        tailwind.config = {
            // Objet de configuration principal
            theme: {
                // Configuration du thème visuel
                extend: {
                    // "extend" permet d'ajouter des valeurs sans écraser celles par défaut
                    
                    colors: {
                        // Définition d'une palette de couleurs personnalisée "neo"
                        'neo': {
                            // Chaque couleur a un nom et une valeur hexadécimale
                            'electric': '#00f5ff',    // Cyan électrique brillant
                            'neon': '#ff0080',        // Rose néon vif
                            'plasma': '#8000ff',      // Violet plasma intense
                            'laser': '#00ff41',       // Vert laser fluo
                            'dark': '#0a0a0f',        // Bleu-noir très foncé (arrière-plan principal)
                            'surface': '#1a1a2e',     // Bleu foncé (surfaces secondaires)
                            'glass': '#ffffff08',     // Blanc ultra-transparent (effet verre)
                        }
                    },
                    
                    animation: {
                        // Définition d'animations personnalisées (nom, durée, timing, répétition)
                        'float-slow': 'float 6s ease-in-out infinite',
                        // Animation flottante lente : durée 6s, mouvement fluide, boucle infinie
                        
                        'glow-pulse': 'glowPulse 3s ease-in-out infinite',
                        // Pulsation lumineuse : 3s de cycle, mouvement fluide, boucle infinie
                        
                        'slide-in-left': 'slideInLeft 0.8s ease-out',
                        // Glissement depuis la gauche : 0.8s, ralentissement à la fin
                        
                        'slide-in-right': 'slideInRight 0.8s ease-out',
                        // Glissement depuis la droite : 0.8s, ralentissement à la fin
                        
                        'slide-in-up': 'slideInUp 0.8s ease-out',
                        // Glissement depuis le bas : 0.8s, ralentissement à la fin
                        
                        'neon-glow': 'neonGlow 2s ease-in-out infinite alternate',
                        // Effet néon pulsant : 2s, mouvement fluide, alterne entre début et fin
                        
                        'shimmer': 'shimmer 2s linear infinite',
                        // Effet brillant qui traverse : 2s, vitesse constante, boucle infinie
                    },
                    
                    keyframes: {
                        // Définition des étapes d'animation (keyframes CSS)
                        
                        float: {
                            // Animation de flottement (monte et descend avec légère rotation)
                            '0%, 100%': { 
                                transform: 'translateY(0px) rotate(0deg)' 
                                // Position de départ et fin : position normale, pas de rotation
                            },
                            '50%': { 
                                transform: 'translateY(-20px) rotate(1deg)' 
                                // Au milieu : monte de 20px, rotation de 1 degré
                            },
                        },
                        
                        glowPulse: {
                            // Animation de pulsation lumineuse avec ombre et agrandissement
                            '0%, 100%': { 
                                boxShadow: '0 0 20px rgba(0, 245, 255, 0.3), 0 0 40px rgba(0, 245, 255, 0.1)',
                                // Ombre faible : deux couches d'ombre cyan avec opacité 30% et 10%
                                transform: 'scale(1)'
                                // Taille normale (100%)
                            },
                            '50%': { 
                                boxShadow: '0 0 40px rgba(0, 245, 255, 0.6), 0 0 80px rgba(0, 245, 255, 0.3)',
                                // Ombre forte : deux couches plus larges avec opacité 60% et 30%
                                transform: 'scale(1.05)'
                                // Agrandissement de 5%
                            },
                        },
                        
                        slideInLeft: {
                            // Glissement depuis la gauche avec apparition progressive
                            '0%': { 
                                opacity: '0',                    // Invisible au départ
                                transform: 'translateX(-100px)'  // Décalé de 100px vers la gauche
                            },
                            '100%': { 
                                opacity: '1',           // Complètement visible
                                transform: 'translateX(0)' // Position normale
                            },
                        },
                        
                        slideInRight: {
                            // Glissement depuis la droite avec apparition progressive
                            '0%': { 
                                opacity: '0',                   // Invisible au départ
                                transform: 'translateX(100px)'  // Décalé de 100px vers la droite
                            },
                            '100%': { 
                                opacity: '1',           // Complètement visible
                                transform: 'translateX(0)' // Position normale
                            },
                        },
                        
                        slideInUp: {
                            // Glissement depuis le bas avec apparition progressive
                            '0%': { 
                                opacity: '0',                  // Invisible au départ
                                transform: 'translateY(50px)'  // Décalé de 50px vers le bas
                            },
                            '100%': { 
                                opacity: '1',          // Complètement visible
                                transform: 'translateY(0)' // Position normale
                            },
                        },
                        
                        neonGlow: {
                            // Effet de texte néon qui change de couleur (cyan vers rose)
                            '0%': { 
                                textShadow: '0 0 10px rgba(0, 245, 255, 0.8), 0 0 20px rgba(0, 245, 255, 0.6)'
                                // Ombre de texte cyan : deux couches avec flou de 10px et 20px
                            },
                            '100%': { 
                                textShadow: '0 0 20px rgba(255, 0, 128, 0.8), 0 0 30px rgba(255, 0, 128, 0.6)'
                                // Ombre de texte rose : deux couches avec flou de 20px et 30px
                            },
                        },
                        
                        shimmer: {
                            // Effet de brillance qui traverse l'élément
                            '0%': { 
                                transform: 'translateX(-100%)' 
                                // Position de départ : complètement à gauche (hors de l'élément)
                            },
                            '100%': { 
                                transform: 'translateX(100%)' 
                                // Position finale : complètement à droite (hors de l'élément)
                            },
                        }
                    },
                    
                    fontFamily: {
                        // Définition de familles de polices personnalisées
                        'display': ['Orbitron', 'monospace'],
                        // Police d'affichage pour les titres : Orbitron (futuriste), fallback sur monospace
                        
                        'body': ['Space Grotesk', 'sans-serif'],
                        // Police pour le corps de texte : Space Grotesk (moderne), fallback sur sans-serif
                    },
                    
                    boxShadow: {
                        // Définition d'ombres personnalisées pour effets néon
                        'neon': '0 0 20px rgba(0, 245, 255, 0.6)',
                        // Ombre néon moyenne : flou de 20px, couleur cyan, opacité 60%
                        
                        'glow': '0 0 40px rgba(0, 245, 255, 0.3)',
                        // Ombre lueur normale : flou de 40px, couleur cyan, opacité 30%
                        
                        'glow-lg': '0 0 60px rgba(0, 245, 255, 0.4)',
                        // Ombre lueur large : flou de 60px, couleur cyan, opacité 40%
                    }
                }
            }
        }
    </script>
    
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Chargement des polices Google Fonts :
         - Orbitron : poids 400 (normal), 700 (bold), 900 (black)
         - Space Grotesk : poids 300 (light), 400 (normal), 500 (medium), 600 (semi-bold), 700 (bold)
         - display=swap : affiche le texte avec police système en attendant le chargement -->
</head>

<body class="font-body antialiased bg-gradient-to-br from-neo-dark via-neo-surface to-neo-dark text-white overflow-x-hidden selection:bg-neo-electric selection:text-neo-dark">
    <!-- ==================== CORPS DU DOCUMENT ==================== -->
    <!-- Classes Tailwind appliquées au body :
         - font-body : utilise la police Space Grotesk définie dans la config
         - antialiased : lissage des polices pour un meilleur rendu
         - bg-gradient-to-br : dégradé de couleur du haut-gauche vers bas-droite
         - from-neo-dark : couleur de départ du dégradé (bleu-noir)
         - via-neo-surface : couleur intermédiaire (bleu foncé)
         - to-neo-dark : couleur finale (retour au bleu-noir)
         - text-white : texte blanc par défaut
         - overflow-x-hidden : cache le débordement horizontal (empêche scroll horizontal)
         - selection:bg-neo-electric : couleur de fond cyan lors de la sélection de texte
         - selection:text-neo-dark : couleur de texte sombre lors de la sélection -->
    
    <!-- ==================== PARTICULES ANIMÉES D'ARRIÈRE-PLAN ==================== -->
    <div class="fixed inset-0 z-0 pointer-events-none">
        <!-- Container des particules décoratives :
             - fixed : position fixe (ne bouge pas au scroll)
             - inset-0 : top, right, bottom, left à 0 (couvre tout l'écran)
             - z-0 : z-index de 0 (tout en arrière-plan)
             - pointer-events-none : ignore les événements souris (clics traversent) -->
        
        <div class="absolute top-10 left-10 w-2 h-2 bg-neo-electric rounded-full animate-float-slow opacity-60"></div>
        <!-- Particule 1 :
             - absolute : positionnement absolu dans le container
             - top-10 : 2.5rem du haut (40px)
             - left-10 : 2.5rem de la gauche (40px)
             - w-2 : largeur de 0.5rem (8px)
             - h-2 : hauteur de 0.5rem (8px)
             - bg-neo-electric : couleur cyan électrique
             - rounded-full : bordure complètement arrondie (cercle)
             - animate-float-slow : animation de flottement définie plus haut
             - opacity-60 : opacité à 60% (semi-transparente) -->
        
        <div class="absolute top-20 right-20 w-1 h-1 bg-neo-neon rounded-full animate-float-slow opacity-40"></div>
        <!-- Particule 2 : petite (4px), rose néon, en haut à droite, opacité 40% -->
        
        <div class="absolute bottom-32 left-20 w-3 h-3 bg-neo-laser rounded-full animate-float-slow opacity-80"></div>
        <!-- Particule 3 : moyenne (12px), vert laser, en bas à gauche, opacité 80% -->
        
        <div class="absolute bottom-20 right-32 w-2 h-2 bg-neo-plasma rounded-full animate-float-slow opacity-50"></div>
        <!-- Particule 4 : petite (8px), violet plasma, en bas à droite, opacité 50% -->
    </div>

    <!-- ==================== NAVIGATION PRINCIPALE ==================== -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-neo-glass backdrop-blur-xl border-b border-neo-electric/20">
        <!-- Barre de navigation fixe en haut de page :
             - fixed : reste en haut lors du scroll
             - top-0, left-0, right-0 : positionnée en haut, étendue sur toute la largeur
             - z-50 : z-index élevé (au-dessus des autres éléments)
             - bg-neo-glass : fond ultra-transparent (#ffffff08)
             - backdrop-blur-xl : flou d'arrière-plan intense (effet verre dépoli)
             - border-b : bordure en bas
             - border-neo-electric/20 : bordure cyan avec 20% d'opacité -->
        
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl">
            <!-- Container centré avec padding responsive :
                 - container : largeur adaptée au breakpoint
                 - mx-auto : centrage horizontal
                 - px-4 : padding horizontal de 1rem (16px) par défaut
                 - sm:px-6 : 1.5rem (24px) sur écrans small et plus
                 - lg:px-8 : 2rem (32px) sur écrans large et plus
                 - max-w-7xl : largeur maximale de 80rem (1280px) -->
            
            <div class="flex items-center justify-between h-16 lg:h-20">
                <!-- Container flex pour aligner logo et menu :
                     - flex : affichage flexbox
                     - items-center : alignement vertical centré
                     - justify-between : espace maximal entre les éléments
                     - h-16 : hauteur de 4rem (64px) par défaut
                     - lg:h-20 : hauteur de 5rem (80px) sur grands écrans -->
                
                <!-- ==================== SECTION LOGO ==================== -->
                <div class="flex items-center space-x-2 sm:space-x-4 animate-slide-in-left">
                    <!-- Container du logo avec animation :
                         - flex items-center : alignement horizontal et vertical
                         - space-x-2 : espacement de 0.5rem (8px) entre enfants
                         - sm:space-x-4 : espacement de 1rem (16px) sur small+
                         - animate-slide-in-left : animation d'entrée depuis la gauche -->
                    
                    <div class="relative group">
                        <!-- Container relatif pour superposition d'effets :
                             - relative : positionnement relatif pour enfants absolus
                             - group : permet de cibler les enfants au hover du parent -->
                        
                        <div class="w-8 h-8 sm:w-10 sm:h-10 lg:w-12 lg:h-12 bg-gradient-to-br from-neo-electric via-neo-neon to-neo-plasma rounded-xl lg:rounded-2xl shadow-neon flex items-center justify-center group-hover:animate-glow-pulse">
                            <!-- Boîte du logo avec dégradé et effets :
                                 - w-8 h-8 : 2rem (32px) carré par défaut
                                 - sm:w-10 sm:h-10 : 2.5rem (40px) sur small
                                 - lg:w-12 lg:h-12 : 3rem (48px) sur large
                                 - bg-gradient-to-br : dégradé diagonal (top-left vers bottom-right)
                                 - from-neo-electric : départ cyan
                                 - via-neo-neon : milieu rose
                                 - to-neo-plasma : arrivée violet
                                 - rounded-xl : coins arrondis 0.75rem par défaut
                                 - lg:rounded-2xl : 1rem sur large
                                 - shadow-neon : ombre néon personnalisée
                                 - flex items-center justify-center : centrage de l'icône
                                 - group-hover:animate-glow-pulse : animation au survol du parent -->
                            
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-7 lg:h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <!-- Icône SVG éclair (responsive) :
                                     - w-4 h-4 : 1rem (16px) par défaut
                                     - sm:w-5 sm:h-5 : 1.25rem (20px) sur small
                                     - lg:w-7 lg:h-7 : 1.75rem (28px) sur large
                                     - text-white : couleur blanche
                                     - fill="none" : pas de remplissage
                                     - stroke="currentColor" : utilise la couleur du texte
                                     - viewBox="0 0 24 24" : système de coordonnées SVG -->
                                
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                <!-- Chemin SVG formant un éclair :
                                     - stroke-linecap="round" : extrémités arrondies
                                     - stroke-linejoin="round" : jointures arrondies
                                     - stroke-width="2.5" : épaisseur du trait
                                     - d="..." : données du chemin (coordonnées) -->
                            </svg>
                        </div>
                        
                        <div class="absolute inset-0 bg-gradient-to-br from-neo-electric via-neo-neon to-neo-plasma rounded-xl lg:rounded-2xl opacity-20 group-hover:opacity-40 transition-opacity duration-500 blur-lg"></div>
                        <!-- Effet de lueur derrière le logo :
                             - absolute : superposé au logo
                             - inset-0 : même taille et position que le parent
                             - bg-gradient-to-br from-neo-electric via-neo-neon to-neo-plasma : même dégradé
                             - rounded-xl lg:rounded-2xl : mêmes coins arrondis
                             - opacity-20 : très transparent (20%)
                             - group-hover:opacity-40 : plus visible (40%) au survol
                             - transition-opacity : animation fluide de l'opacité
                             - duration-500 : transition de 0.5s
                             - blur-lg : flou important pour effet de lueur -->
                    
                    <div class="flex flex-col">
                        <span class="text-lg sm:text-xl lg:text-2xl font-display font-bold bg-gradient-to-r from-neo-electric to-neo-neon bg-clip-text text-transparent animate-neon-glow">
                            NeoCode
                        </span>
                        <span class="text-xs lg:text-sm text-neo-electric font-mono tracking-widest opacity-80">
                            STUDIO
                        </span>
                    </div>
                </div>

                <!-- Menu Navigation Desktop -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="#features" class="relative group text-white/80 hover:text-neo-electric font-medium transition-all duration-300 py-2">
                        <span class="relative z-10">Fonctionnalités</span>
                        <div class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r from-neo-electric to-neo-neon transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </a>
                    <a href="#showcase" class="relative group text-white/80 hover:text-neo-electric font-medium transition-all duration-300 py-2">
                        <span class="relative z-10">Vitrine</span>
                        <div class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r from-neo-electric to-neo-neon transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </a>
                    <a href="#pricing" class="relative group text-white/80 hover:text-neo-electric font-medium transition-all duration-300 py-2">
                        <span class="relative z-10">Tarifs</span>
                        <div class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r from-neo-electric to-neo-neon transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </a>
                    <a href="#contact" class="relative group text-white/80 hover:text-neo-electric font-medium transition-all duration-300 py-2">
                        <span class="relative z-10">Contact</span>
                        <div class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r from-neo-electric to-neo-neon transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </a>
                </div>

                <!-- Boutons CTA -->
                <div class="flex items-center space-x-2 sm:space-x-4 animate-slide-in-right">
                    <button class="hidden md:block relative overflow-hidden text-white/80 hover:text-white font-medium px-3 lg:px-4 py-2 rounded-xl transition-all duration-300 group">
                        <span class="relative z-10 text-sm lg:text-base">Connexion</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-neo-electric/20 to-neo-neon/20 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left rounded-xl"></div>
                    </button>
                    
                    <button class="relative overflow-hidden bg-gradient-to-r from-neo-electric via-neo-neon to-neo-plasma text-white px-3 sm:px-4 lg:px-6 py-2 lg:py-3 rounded-xl lg:rounded-2xl font-semibold shadow-glow hover:shadow-glow-lg transform hover:scale-105 transition-all duration-300 group">
                        <span class="relative z-10 flex items-center space-x-1 lg:space-x-2 text-sm lg:text-base">
                            <span>Commencer</span>
                            <svg class="w-4 h-4 lg:w-5 lg:h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                    </button>

                    <!-- Menu Burger pour Mobile -->
                    <button class="lg:hidden relative w-8 h-8 flex items-center justify-center" onclick="toggleMobileMenu()">
                        <div id="burger-line-1" class="w-5 h-0.5 bg-neo-electric transition-all duration-300"></div>
                        <div id="burger-line-2" class="w-5 h-0.5 bg-neo-electric transition-all duration-300 absolute transform translate-y-1.5"></div>
                        <div id="burger-line-3" class="w-5 h-0.5 bg-neo-electric transition-all duration-300 absolute transform -translate-y-1.5"></div>
                    </button>
                </div>
            </div>
            
            <!-- Menu Mobile -->
            <div id="mobile-menu" class="lg:hidden absolute top-full left-0 right-0 bg-neo-glass backdrop-blur-xl border-b border-neo-electric/20 transform -translate-y-full opacity-0 transition-all duration-300">
                <div class="container mx-auto px-4 sm:px-6 py-6">
                    <div class="flex flex-col space-y-4">
                        <a href="#features" class="text-white/80 hover:text-neo-electric font-medium transition-colors py-2">Fonctionnalités</a>
                        <a href="#showcase" class="text-white/80 hover:text-neo-electric font-medium transition-colors py-2">Vitrine</a>
                        <a href="#pricing" class="text-white/80 hover:text-neo-electric font-medium transition-colors py-2">Tarifs</a>
                        <a href="#contact" class="text-white/80 hover:text-neo-electric font-medium transition-colors py-2">Contact</a>
                        <div class="pt-4 border-t border-neo-electric/20">
                            <button class="w-full bg-gradient-to-r from-neo-electric via-neo-neon to-neo-plasma text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300">
                                Commencer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const line1 = document.getElementById('burger-line-1');
            const line2 = document.getElementById('burger-line-2');
            const line3 = document.getElementById('burger-line-3');
            
            if (menu.classList.contains('opacity-0')) {
                menu.classList.remove('opacity-0', '-translate-y-full');
                menu.classList.add('opacity-100', 'translate-y-0');
                
                line1.style.transform = 'rotate(45deg) translate(4px, 4px)';
                line2.style.opacity = '0';
                line3.style.transform = 'rotate(-45deg) translate(4px, -4px)';
            } else {
                menu.classList.add('opacity-0', '-translate-y-full');
                menu.classList.remove('opacity-100', 'translate-y-0');
                
                line1.style.transform = '';
                line2.style.opacity = '1';
                line3.style.transform = '';
            }
        }
    </script>

    <!-- Hero Section Ultra-Moderne -->
    <section class="relative min-h-screen flex items-center justify-center pt-16 lg:pt-20 pb-20 lg:pb-32 overflow-hidden">
        
        <!-- Éléments décoratifs animés -->
        <div class="absolute inset-0 z-10">
            <div class="absolute top-1/4 left-1/4 w-48 sm:w-72 lg:w-96 h-48 sm:h-72 lg:h-96 bg-neo-electric/10 rounded-full blur-3xl animate-float-slow"></div>
            <div class="absolute bottom-1/4 right-1/4 w-64 sm:w-96 lg:w-128 h-64 sm:h-96 lg:h-128 bg-neo-neon/10 rounded-full blur-3xl animate-float-slow" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 sm:w-128 lg:w-144 h-80 sm:h-128 lg:h-144 bg-neo-plasma/5 rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-20 max-w-7xl">
            <div class="text-center">
                
                <!-- Badge Status -->
                <div class="inline-flex items-center space-x-2 lg:space-x-3 bg-neo-glass backdrop-blur-sm border border-neo-electric/30 rounded-full px-4 sm:px-6 py-2 lg:py-3 mb-6 lg:mb-8 animate-slide-in-up">
                    <div class="w-2 lg:w-3 h-2 lg:h-3 bg-neo-laser rounded-full animate-pulse"></div>
                    <span class="text-xs sm:text-sm font-medium text-neo-electric">🚀 Nouvelle version 3.0 disponible</span>
                </div>

                <!-- Titre Principal -->
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-8xl font-display font-black mb-6 lg:mb-8 leading-tight animate-slide-in-up" style="animation-delay: 0.2s;">
                    <span class="block text-white">L'avenir du</span>
                    <span class="block bg-gradient-to-r from-neo-electric via-neo-neon to-neo-plasma bg-clip-text text-transparent animate-neon-glow">
                        développement
                    </span>
                    <span class="block text-white">commence ici</span>
                </h1>

                <!-- Sous-titre -->
                <p class="text-base sm:text-lg lg:text-xl xl:text-2xl text-white/80 mb-8 lg:mb-12 max-w-2xl lg:max-w-4xl mx-auto leading-relaxed animate-slide-in-up px-4" style="animation-delay: 0.4s;">
                    Créez des applications web révolutionnaires avec notre suite d'outils IA-powered, 
                    conçue pour les développeurs qui repoussent les limites du possible.
                </p>

                <!-- Boutons CTA Hero -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 lg:gap-6 mb-12 lg:mb-16 animate-slide-in-up px-4" style="animation-delay: 0.6s;">
                    <button class="group relative overflow-hidden bg-gradient-to-r from-neo-electric via-neo-neon to-neo-plasma text-white px-6 sm:px-8 py-3 lg:py-4 rounded-2xl font-bold text-base lg:text-lg shadow-glow hover:shadow-glow-lg transform hover:scale-105 transition-all duration-300 w-full sm:w-auto min-w-[200px] lg:min-w-[250px]">
                        <span class="relative z-10 flex items-center justify-center space-x-2 lg:space-x-3">
                            <span>Démarrer maintenant</span>
                            <svg class="w-5 h-5 lg:w-6 lg:h-6 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                    </button>
                    
                    <button class="relative overflow-hidden bg-neo-glass backdrop-blur-sm border border-neo-electric/30 text-white px-6 sm:px-8 py-3 lg:py-4 rounded-2xl font-semibold text-base lg:text-lg hover:bg-neo-electric/10 hover:border-neo-electric/50 transform hover:scale-105 transition-all duration-300 w-full sm:w-auto min-w-[200px] lg:min-w-[250px] group">
                        <span class="flex items-center justify-center space-x-2 lg:space-x-3">
                            <svg class="w-5 h-5 lg:w-6 lg:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Voir la démo</span>
                        </span>
                    </button>
                </div>

                <!-- Stats impressionnantes -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto animate-slide-in-up" style="animation-delay: 0.8s;">
                    <div class="text-center group">
                        <div class="text-4xl lg:text-5xl font-bold bg-gradient-to-r from-neo-electric to-neo-neon bg-clip-text text-transparent mb-2">
                            50K+
                        </div>
                        <p class="text-white/70 font-medium">Développeurs actifs</p>
                    </div>
                    <div class="text-center group">
                        <div class="text-4xl lg:text-5xl font-bold bg-gradient-to-r from-neo-neon to-neo-plasma bg-clip-text text-transparent mb-2">
                            99.9%
                        </div>
                        <p class="text-white/70 font-medium">Temps de disponibilité</p>
                    </div>
                    <div class="text-center group">
                        <div class="text-4xl lg:text-5xl font-bold bg-gradient-to-r from-neo-plasma to-neo-laser bg-clip-text text-transparent mb-2">
                            10x
                        </div>
                        <p class="text-white/70 font-medium">Plus rapide</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Fonctionnalités Révolutionnaires -->
    <section id="features" class="py-20 lg:py-32 relative">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-7xl relative z-10">
            
            <!-- Header Section -->
            <div class="text-center mb-16 lg:mb-20">
                <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-display font-black text-white mb-4 lg:mb-6 animate-slide-in-up">
                    Fonctionnalités 
                    <span class="bg-gradient-to-r from-neo-electric to-neo-neon bg-clip-text text-transparent">
                        révolutionnaires
                    </span>
                </h2>
                <p class="text-base sm:text-lg lg:text-xl text-white/80 max-w-3xl mx-auto animate-slide-in-up px-4" style="animation-delay: 0.2s;">
                    Découvrez les technologies qui transforment la façon dont nous construisons le web
                </p>
            </div>

            <!-- Grille de fonctionnalités -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">
                
                <!-- Fonctionnalité 1 -->
                <div class="group relative bg-neo-glass backdrop-blur-xl rounded-3xl p-8 border border-neo-electric/20 hover:border-neo-electric/40 transition-all duration-500 transform hover:-translate-y-2 animate-slide-in-up" style="animation-delay: 0.1s;">
                    <div class="flex items-start space-x-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-neo-electric to-neo-neon rounded-2xl shadow-neon flex items-center justify-center group-hover:animate-glow-pulse">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-white mb-4">Performance Extrême</h3>
                            <p class="text-white/70 leading-relaxed">
                                Optimisation automatique avec compilation just-in-time, 
                                bundling intelligent et cache adaptatif pour des performances sans précédent.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Fonctionnalité 2 -->
                <div class="group relative bg-neo-glass backdrop-blur-xl rounded-3xl p-8 border border-neo-neon/20 hover:border-neo-neon/40 transition-all duration-500 transform hover:-translate-y-2 animate-slide-in-up" style="animation-delay: 0.2s;">
                    <div class="flex items-start space-x-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-neo-neon to-neo-plasma rounded-2xl shadow-neon flex items-center justify-center group-hover:animate-glow-pulse">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-white mb-4">IA Intégrée</h3>
                            <p class="text-white/70 leading-relaxed">
                                Assistant IA avancé pour génération de code, détection de bugs, 
                                optimisation automatique et suggestions intelligentes en temps réel.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Fonctionnalité 3 -->
                <div class="group relative bg-neo-glass backdrop-blur-xl rounded-3xl p-8 border border-neo-plasma/20 hover:border-neo-plasma/40 transition-all duration-500 transform hover:-translate-y-2 animate-slide-in-up" style="animation-delay: 0.3s;">
                    <div class="flex items-start space-x-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-neo-plasma to-neo-laser rounded-2xl shadow-neon flex items-center justify-center group-hover:animate-glow-pulse">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-white mb-4">Déploiement Instantané</h3>
                            <p class="text-white/70 leading-relaxed">
                                Déployez en une commande vers 50+ clouds avec notre infrastructure 
                                edge computing et CDN global ultra-rapide.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Fonctionnalité 4 -->
                <div class="group relative bg-neo-glass backdrop-blur-xl rounded-3xl p-8 border border-neo-laser/20 hover:border-neo-laser/40 transition-all duration-500 transform hover:-translate-y-2 animate-slide-in-up" style="animation-delay: 0.4s;">
                    <div class="flex items-start space-x-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-neo-laser to-neo-electric rounded-2xl shadow-neon flex items-center justify-center group-hover:animate-glow-pulse">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-white mb-4">Sécurité Quantique</h3>
                            <p class="text-white/70 leading-relaxed">
                                Protection de niveau militaire avec chiffrement quantique, 
                                authentification biométrique et surveillance IA des menaces.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Ultra-Moderne -->
    <footer class="bg-neo-surface/50 backdrop-blur-xl border-t border-neo-electric/20 py-16">
        <div class="container mx-auto px-6 lg:px-8 max-w-7xl">
            
            <!-- Footer Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                
                <!-- Company Info -->
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-neo-electric via-neo-neon to-neo-plasma rounded-2xl shadow-neon flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-display font-bold text-white">NeoCode Studio</h3>
                            <p class="text-neo-electric font-mono text-sm">L'AVENIR DU CODE</p>
                        </div>
                    </div>
                    
                    <p class="text-white/70 mb-6 max-w-md leading-relaxed">
                        Révolutionnons ensemble l'industrie du développement web avec des technologies 
                        d'avant-garde et une approche centrée sur l'innovation.
                    </p>
                    
                    <!-- Social Links -->
                    <div class="flex space-x-4">
                        <a href="#" class="w-12 h-12 bg-neo-glass backdrop-blur-sm border border-neo-electric/30 hover:bg-neo-electric/20 hover:border-neo-electric/50 rounded-xl flex items-center justify-center transition-all duration-300 group">
                            <svg class="w-5 h-5 text-neo-electric group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-neo-glass backdrop-blur-sm border border-neo-electric/30 hover:bg-neo-electric/20 hover:border-neo-electric/50 rounded-xl flex items-center justify-center transition-all duration-300 group">
                            <svg class="w-5 h-5 text-neo-electric group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-neo-glass backdrop-blur-sm border border-neo-electric/30 hover:bg-neo-electric/20 hover:border-neo-electric/50 rounded-xl flex items-center justify-center transition-all duration-300 group">
                            <svg class="w-5 h-5 text-neo-electric group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold text-white mb-6">Navigation</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-white/70 hover:text-neo-electric transition-colors duration-300">Fonctionnalités</a></li>
                        <li><a href="#" class="text-white/70 hover:text-neo-electric transition-colors duration-300">Vitrine</a></li>
                        <li><a href="#" class="text-white/70 hover:text-neo-electric transition-colors duration-300">Tarifs</a></li>
                        <li><a href="#" class="text-white/70 hover:text-neo-electric transition-colors duration-300">Documentation</a></li>
                        <li><a href="#" class="text-white/70 hover:text-neo-electric transition-colors duration-300">Support</a></li>
                    </ul>
                </div>

                <!-- Legal -->
                <div>
                    <h4 class="text-lg font-semibold text-white mb-6">Légal</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-white/70 hover:text-neo-electric transition-colors duration-300">Confidentialité</a></li>
                        <li><a href="#" class="text-white/70 hover:text-neo-electric transition-colors duration-300">Conditions</a></li>
                        <li><a href="#" class="text-white/70 hover:text-neo-electric transition-colors duration-300">Cookies</a></li>
                        <li><a href="#" class="text-white/70 hover:text-neo-electric transition-colors duration-300">Sécurité</a></li>
                        <li><a href="#" class="text-white/70 hover:text-neo-electric transition-colors duration-300">Contact</a></li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-neo-electric/20 pt-8 text-center">
                <p class="text-white/70">
                    &copy; 2025 NeoCode Studio. Tous droits réservés. 
                    Propulsé par 
                    <span class="bg-gradient-to-r from-neo-electric to-neo-neon bg-clip-text text-transparent font-semibold">
                        Tailwind CSS
                    </span>
                </p>
            </div>
        </div>
    </footer>

</body>
</html>