<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechFlow - Développement Web Moderne</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            900: '#1e3a8a'
                        },
                        'accent': {
                            400: '#34d399',
                            500: '#10b981',
                            600: '#059669'
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-out',
                        'slide-up': 'slideUp 0.8s ease-out',
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s ease-in-out infinite'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(50px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' }
                        }
                    }
                }
            }
        }
    </script>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-white text-gray-900 antialiased overflow-x-hidden">
    
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-sm shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-gray-900">TechFlow</span>
                </div>

                <!-- Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#accueil" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Accueil</a>
                    <a href="#services" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Services</a>
                    <a href="#projets" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Projets</a>
                    <a href="#contact" class="text-gray-600 hover:text-primary-600 font-medium transition-colors">Contact</a>
                </div>

                <!-- CTA -->
                <button class="bg-primary-500 hover:bg-primary-600 text-white px-6 py-2 rounded-lg font-medium transition-colors shadow-lg">
                    Commencer
                </button>
            </div>
        </div>
    </nav>
        <!-- LIGNE 166: Navigation ultra-moderne avec glassmorphism avancé -->
        <!-- fixed top-0 left-0 right-0: position fixe pleine largeur -->
        <!-- z-50: z-index élevé -->
        <!-- bg-neo-glass: fond transparent personnalisé -->
        <!-- backdrop-blur-xl: flou d'arrière-plan intense -->
        <!-- border-b border-neo-electric/20: bordure cyan subtile -->
        
        <div class="container mx-auto px-6 lg:px-8 max-w-7xl">
            <!-- LIGNE 124: Container navigation centré -->
            <!-- container mx-auto: conteneur centré responsive -->
            <!-- px-6 lg:px-8: padding horizontal adaptatif -->
            
            <div class="flex items-center justify-between h-16">
                <!-- LIGNE 129: Layout horizontal de la navigation -->
                <!-- flex items-center justify-between: distribution équilibrée */
                <!-- h-16: hauteur fixe 4rem */
                
                <!-- ==================== LOGO MODERNE ==================== -->
                <div class="flex items-center space-x-3 animate-fade-in">
                    <!-- LIGNE 135: Container logo avec animation -->
                    <!-- flex items-center: alignement centré */
                    <!-- space-x-3: espacement 0.75rem entre éléments */
                    <!-- animate-fade-in: animation d'apparition */
                    
                    <div class="w-10 h-10 bg-gradient-to-br from-brand-primary to-brand-secondary rounded-xl shadow-lg flex items-center justify-center">
                        <!-- LIGNE 141: Icône logo moderne -->
                        <!-- w-10 h-10: dimensions 2.5rem × 2.5rem */
                        <!-- bg-gradient-to-br: dégradé diagonal */
                        <!-- from-brand-primary to-brand-secondary: couleurs personnalisées */
                        <!-- rounded-xl: coins arrondis */
                        <!-- shadow-lg: ombre moderne */
                        <!-- flex items-center justify-center: centrage contenu */
                        
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <!-- LIGNE 150: Icône SVG moderne -->
                            <!-- w-6 h-6: dimensions 1.5rem × 1.5rem */
                            <!-- text-white: couleur blanche */
                            
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            <!-- LIGNE 155: Chemin SVG pour icône code/développement -->
                        </svg>
                    </div>
                    
                    <div class="flex flex-col">
                        <!-- LIGNE 161: Container texte logo -->
                        
                        <span class="text-xl font-bold text-slate-900">DevTools</span>
                        <!-- LIGNE 164: Nom principal -->
                        <!-- text-xl: taille 1.25rem */
                        <!-- font-bold: police grasse */
                        <!-- text-slate-900: couleur sombre */
                        
                        <span class="text-xs text-brand-primary font-medium">Pro Platform</span>
                        <!-- LIGNE 170: Sous-titre */
                        <!-- text-xs: petite taille */
                        <!-- text-brand-primary: couleur de marque */
                        <!-- font-medium: police moyenne */
                    </div>
                </div>

                <!-- ==================== MENU NAVIGATION ==================== -->
                <div class="hidden md:flex items-center space-x-8">
                    <!-- LIGNE 178: Menu desktop -->
                    <!-- hidden md:flex: caché mobile, visible desktop */
                    <!-- items-center: alignement centré */
                    <!-- space-x-8: espacement 2rem */
                    
                    <a href="#features" class="text-slate-600 hover:text-brand-primary font-medium transition-all duration-300 hover:scale-105">
                        <!-- LIGNE 184: Lien navigation */
                        <!-- text-slate-600: couleur gris moyen */
                        <!-- hover:text-brand-primary: couleur marque au survol */
                        <!-- font-medium: police moyenne */
                        <!-- transition-all duration-300: animation fluide */
                        <!-- hover:scale-105: léger agrandissement au survol */
                        Fonctionnalités
                    </a>
                    <a href="#pricing" class="text-slate-600 hover:text-brand-primary font-medium transition-all duration-300 hover:scale-105">
                        Tarifs
                    </a>
                    <a href="#docs" class="text-slate-600 hover:text-brand-primary font-medium transition-all duration-300 hover:scale-105">
                        Documentation
                    </a>
                    <a href="#about" class="text-slate-600 hover:text-brand-primary font-medium transition-all duration-300 hover:scale-105">
                        À propos
                    </a>
                </div>

                <!-- ==================== BOUTONS CTA ==================== -->
                <div class="flex items-center space-x-4">
                    <!-- LIGNE 202: Container boutons d'action -->
                    <!-- flex items-center: alignement centré */
                    <!-- space-x-4: espacement 1rem */
                    
                    <button class="hidden sm:block text-slate-600 hover:text-slate-900 font-medium transition-colors duration-300">
                        <!-- LIGNE 207: Bouton connexion */
                        <!-- hidden sm:block: caché mobile, visible tablette+ */
                        <!-- text-slate-600: couleur gris */
                        <!-- hover:text-slate-900: plus foncé au survol */
                        <!-- font-medium: police moyenne */
                        <!-- transition-colors duration-300: animation couleur */
                        Se connecter
                    </button>
                    
                    <button class="bg-gradient-to-r from-brand-primary to-brand-secondary text-white px-6 py-2.5 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 animate-glow">
                        <!-- LIGNE 216: Bouton principal CTA */
                        <!-- bg-gradient-to-r: dégradé horizontal */
                        <!-- from-brand-primary to-brand-secondary: couleurs marque */
                        <!-- text-white: texte blanc */
                        <!-- px-6 py-2.5: padding horizontal 1.5rem, vertical adapté */
                        <!-- rounded-xl: coins arrondis */
                        <!-- font-semibold: police semi-grasse */
                        <!-- shadow-lg hover:shadow-xl: ombre qui s'agrandit au survol */
                        <!-- transform hover:scale-105: agrandissement au survol */
                        <!-- transition-all duration-300: animation complète */
                        <!-- animate-glow: animation de lueur personnalisée */
                        Commencer gratuitement
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- ==================== HERO SECTION MODERNE ==================== -->
    <section class="relative pt-20 pb-32 bg-gradient-to-br from-slate-50 via-white to-slate-100 overflow-hidden">
        <!-- LIGNE 232: Section hero avec dégradé subtil */
        <!-- relative: positionnement relatif pour éléments décoratifs */
        <!-- pt-20: padding top pour compenser navigation fixe */
        <!-- pb-32: padding bottom généreux */
        <!-- bg-gradient-to-br: dégradé diagonal */
        <!-- from-slate-50 via-white to-slate-100: dégradé gris très subtil */
        <!-- overflow-hidden: masque débordements décoratifs */
        
        <!-- ==================== ÉLÉMENTS DÉCORATIFS ==================== -->
        <div class="absolute inset-0 -z-10">
            <!-- LIGNE 241: Container éléments décoratifs */
            <!-- absolute inset-0: couvre toute la section */
            <!-- -z-10: z-index négatif (arrière-plan) */
            
            <div class="absolute top-20 left-10 w-72 h-72 bg-brand-primary/5 rounded-full blur-3xl animate-float"></div>
            <!-- LIGNE 246: Cercle décoratif 1 */
            <!-- absolute top-20 left-10: position */
            <!-- w-72 h-72: dimensions 18rem × 18rem */
            <!-- bg-brand-primary/5: couleur marque avec opacité 5% */
            <!-- rounded-full: forme circulaire */
            <!-- blur-3xl: flou très important */
            <!-- animate-float: animation flottement */
            
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-brand-secondary/5 rounded-full blur-3xl animate-float" style="animation-delay: 1s;"></div>
            <!-- LIGNE 255: Cercle décoratif 2 avec délai */
            <!-- bottom-20 right-10: position bas droite */
            <!-- w-96 h-96: dimensions 24rem × 24rem */
            <!-- bg-brand-secondary/5: couleur secondaire avec opacité */
            <!-- animation-delay: délai CSS 1 seconde */
            
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-128 h-128 bg-brand-accent/3 rounded-full blur-3xl"></div>
            <!-- LIGNE 263: Cercle décoratif central */
            <!-- top-1/2 left-1/2: position centre */
            <!-- transform -translate-x-1/2 -translate-y-1/2: centrage parfait */
            <!-- w-128 h-128: très grandes dimensions (32rem × 32rem) */
            <!-- bg-brand-accent/3: couleur accent avec opacité 3% */
        </div>

        <div class="container mx-auto px-6 lg:px-8 relative z-10">
            <!-- LIGNE 270: Container contenu hero */
            <!-- container mx-auto: conteneur centré responsive */
            <!-- px-6 lg:px-8: padding horizontal adaptatif */
            <!-- relative z-10: au-dessus des éléments décoratifs */
            
            <div class="text-center max-w-5xl mx-auto">
                <!-- LIGNE 276: Container texte centré avec largeur limitée */
                <!-- text-center: texte centré */
                <!-- max-w-5xl: largeur max 64rem */
                <!-- mx-auto: centrage horizontal */
                
                <!-- ==================== BADGE ANNONCE ==================== -->
                <div class="inline-flex items-center space-x-2 bg-white/60 backdrop-blur-sm border border-slate-200/50 rounded-full px-4 py-2 mb-8 animate-slide-down">
                    <!-- LIGNE 283: Badge d'annonce moderne */
                    <!-- inline-flex: affichage flex inline */
                    <!-- items-center space-x-2: alignement et espacement */
                    <!-- bg-white/60: fond blanc avec opacité 60% */
                    <!-- backdrop-blur-sm: effet de flou */
                    <!-- border border-slate-200/50: bordure subtile */
                    <!-- rounded-full: forme pilule */
                    <!-- px-4 py-2: padding adapté */
                    <!-- mb-8: marge bottom 2rem */
                    <!-- animate-slide-down: animation depuis le haut */
                    
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-bounce-gentle"></span>
                    <!-- LIGNE 295: Indicateur de statut */
                    <!-- w-2 h-2: petites dimensions */
                    <!-- bg-green-500: couleur verte */
                    <!-- rounded-full: forme circulaire */
                    <!-- animate-bounce-gentle: animation rebond doux */
                    
                    <span class="text-sm font-medium text-slate-700">Nouveau : Version 2.0 disponible</span>
                    <!-- LIGNE 302: Texte du badge */
                    <!-- text-sm: petite taille */
                    <!-- font-medium: police moyenne */
                    <!-- text-slate-700: couleur gris foncé */
                </div>

                <!-- ==================== TITRE PRINCIPAL ==================== -->
                <h1 class="text-5xl lg:text-7xl font-black text-slate-900 mb-6 leading-tight animate-slide-up">
                    <!-- LIGNE 310: Titre hero impressionnant */
                    <!-- text-5xl lg:text-7xl: tailles très grandes responsive */
                    <!-- font-black: police extra grasse */
                    <!-- text-slate-900: couleur très sombre */
                    <!-- mb-6: marge bottom 1.5rem */
                    <!-- leading-tight: interligne serré */
                    <!-- animate-slide-up: animation depuis le bas */
                    
                    Développez plus 
                    <span class="bg-gradient-to-r from-brand-primary via-brand-secondary to-brand-accent bg-clip-text text-transparent">
                        <!-- LIGNE 318: Span avec texte dégradé */
                        <!-- bg-gradient-to-r: dégradé horizontal */
                        <!-- from-brand-primary via-brand-secondary to-brand-accent: 3 couleurs */
                        <!-- bg-clip-text text-transparent: applique dégradé au texte */
                        rapidement
                    </span>
                    <br>avec nos outils modernes
                </h1>

                <!-- ==================== SOUS-TITRE ==================== -->
                <p class="text-xl lg:text-2xl text-slate-600 mb-12 max-w-3xl mx-auto leading-relaxed animate-slide-up" style="animation-delay: 0.2s;">
                    <!-- LIGNE 329: Description hero */
                    <!-- text-xl lg:text-2xl: tailles grandes responsive */
                    <!-- text-slate-600: couleur gris moyen */
                    <!-- mb-12: marge bottom 3rem */
                    <!-- max-w-3xl mx-auto: largeur limitée centrée */
                    <!-- leading-relaxed: interligne détendu */
                    <!-- animate-slide-up: animation avec délai CSS */
                    
                    Une suite complète d'outils de développement modernes pour créer, 
                    déployer et maintenir vos applications web avec une efficacité maximale.
                </p>

                <!-- ==================== BOUTONS CTA HERO ==================== -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16 animate-slide-up" style="animation-delay: 0.4s;">
                    <!-- LIGNE 341: Container boutons hero */
                    <!-- flex flex-col sm:flex-row: colonne mobile, ligne desktop */
                    <!-- items-center justify-center: centrage */
                    <!-- gap-4: espacement 1rem */
                    <!-- mb-16: marge bottom 4rem */
                    <!-- animate-slide-up: animation avec délai */
                    
                    <button class="bg-gradient-to-r from-brand-primary to-brand-secondary text-white px-8 py-4 rounded-2xl font-bold text-lg shadow-2xl hover:shadow-brand-primary/25 transform hover:scale-105 transition-all duration-300 min-w-[200px]">
                        <!-- LIGNE 350: Bouton principal hero */
                        <!-- bg-gradient-to-r: dégradé horizontal */
                        <!-- from-brand-primary to-brand-secondary: couleurs marque */
                        <!-- text-white: texte blanc */
                        <!-- px-8 py-4: padding généreux */
                        <!-- rounded-2xl: coins très arrondis */
                        <!-- font-bold: police grasse */
                        <!-- text-lg: taille grande */
                        <!-- shadow-2xl: ombre très large */
                        <!-- hover:shadow-brand-primary/25: ombre colorée au survol */
                        <!-- transform hover:scale-105: agrandissement au survol */
                        <!-- transition-all duration-300: animation complète */
                        <!-- min-w-[200px]: largeur minimum */
                        
                        <span class="flex items-center justify-center space-x-2">
                            <!-- LIGNE 364: Container contenu bouton */
                            <!-- flex items-center justify-center: centrage */
                            <!-- space-x-2: espacement 0.5rem */
                            
                            <span>Commencer gratuitement</span>
                            <!-- LIGNE 369: Texte bouton */
                            
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <!-- LIGNE 372: Icône flèche */
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                <!-- LIGNE 374: Chemin SVG flèche droite */
                            </svg>
                        </span>
                    </button>
                    
                    <button class="bg-white/60 backdrop-blur-sm border border-slate-200/50 text-slate-700 px-8 py-4 rounded-2xl font-semibold text-lg hover:bg-white/80 hover:border-slate-300/50 transform hover:scale-105 transition-all duration-300 min-w-[200px]">
                        <!-- LIGNE 381: Bouton secondaire hero */
                        <!-- bg-white/60: fond blanc avec opacité */
                        <!-- backdrop-blur-sm: effet de flou */
                        <!-- border border-slate-200/50: bordure subtile */
                        <!-- text-slate-700: couleur gris foncé */
                        <!-- px-8 py-4: padding généreux */
                        <!-- rounded-2xl: coins très arrondis */
                        <!-- font-semibold: police semi-grasse */
                        <!-- text-lg: taille grande */
                        <!-- hover:bg-white/80: fond plus opaque au survol */
                        <!-- hover:border-slate-300/50: bordure plus visible au survol */
                        <!-- transform hover:scale-105: agrandissement au survol */
                        <!-- transition-all duration-300: animation complète */
                        <!-- min-w-[200px]: largeur minimum */
                        
                        <span class="flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <!-- LIGNE 396: Icône play */
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                <!-- LIGNE 398: Chemin SVG pour icône demo */
                            </svg>
                            <span>Voir la démo</span>
                        </span>
                    </button>
                </div>

                <!-- ==================== BADGES CONFIANCE ==================== -->
                <div class="flex flex-wrap items-center justify-center gap-8 text-sm text-slate-500 animate-fade-in" style="animation-delay: 0.6s;">
                    <!-- LIGNE 407: Container badges de confiance */
                    <!-- flex flex-wrap: affichage flex avec retour ligne */
                    <!-- items-center justify-center: centrage */
                    <!-- gap-8: espacement 2rem */
                    <!-- text-sm: petite taille */
                    <!-- text-slate-500: couleur gris clair */
                    <!-- animate-fade-in: animation avec délai */
                    
                    <div class="flex items-center space-x-2">
                        <!-- LIGNE 416: Badge utilisateurs */
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                            <!-- LIGNE 418: Icône utilisateurs */
                            <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span>Utilisé par 10,000+ développeurs</span>
                    </div>
                    
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
                            <!-- LIGNE 427: Icône étoile -->
                            <path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                        <span>4.9/5 étoiles</span>
                    </div>
                    
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <!-- LIGNE 435: Icône sécurité -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        <span>Sécurisé & Conforme</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== SECTION FONCTIONNALITÉS ==================== -->
    <section id="features" class="py-24 bg-white">
        <!-- LIGNE 446: Section fonctionnalités */
        <!-- py-24: padding vertical 6rem */
        <!-- bg-white: fond blanc */
        
        <div class="container mx-auto px-6 lg:px-8">
            <!-- LIGNE 451: Container centré */
            
            <div class="text-center mb-16">
                <!-- LIGNE 454: Header section centré */
                <!-- text-center: texte centré */
                <!-- mb-16: marge bottom 4rem */
                
                <h2 class="text-4xl lg:text-5xl font-black text-slate-900 mb-6 animate-slide-up">
                    <!-- LIGNE 459: Titre section */
                    <!-- text-4xl lg:text-5xl: tailles grandes responsive */
                    <!-- font-black: police extra grasse */
                    <!-- text-slate-900: couleur très sombre */
                    <!-- mb-6: marge bottom 1.5rem */
                    <!-- animate-slide-up: animation */
                    
                    Fonctionnalités 
                    <span class="bg-gradient-to-r from-brand-primary to-brand-secondary bg-clip-text text-transparent">
                        <!-- LIGNE 467: Span avec dégradé */
                        avancées
                    </span>
                </h2>
                
                <p class="text-xl text-slate-600 max-w-3xl mx-auto animate-slide-up" style="animation-delay: 0.2s;">
                    <!-- LIGNE 473: Description section */
                    <!-- text-xl: taille grande */
                    <!-- text-slate-600: couleur gris moyen */
                    <!-- max-w-3xl mx-auto: largeur limitée centrée */
                    <!-- animate-slide-up: animation avec délai */
                    
                    Découvrez les outils qui révolutionnent le développement moderne
                </p>
            </div>

            <!-- ==================== GRILLE FONCTIONNALITÉS ==================== -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- LIGNE 483: Grille responsive pour fonctionnalités */
                <!-- grid grid-cols-1: 1 colonne mobile */
                <!-- md:grid-cols-2: 2 colonnes tablette */
                <!-- lg:grid-cols-3: 3 colonnes desktop */
                <!-- gap-8: espacement 2rem */
                
                <!-- ==================== CARTE FONCTIONNALITÉ 1 ==================== -->
                <div class="group bg-gradient-to-br from-white to-slate-50 rounded-3xl p-8 shadow-lg hover:shadow-2xl border border-slate-100 hover:border-brand-primary/20 transition-all duration-500 transform hover:-translate-y-2 animate-scale-in">
                    <!-- LIGNE 491: Carte fonctionnalité avec effets avancés */
                    <!-- group: classe pour effets de groupe */
                    <!-- bg-gradient-to-br: dégradé diagonal */
                    <!-- from-white to-slate-50: blanc vers gris très clair */
                    <!-- rounded-3xl: coins très arrondis */
                    <!-- p-8: padding 2rem */
                    <!-- shadow-lg hover:shadow-2xl: ombre qui s'agrandit au survol */
                    <!-- border border-slate-100: bordure gris clair */
                    <!-- hover:border-brand-primary/20: bordure colorée au survol */
                    <!-- transition-all duration-500: animation longue */
                    <!-- transform hover:-translate-y-2: déplacement vers le haut au survol */
                    <!-- animate-scale-in: animation d'apparition */
                    
                    <div class="w-16 h-16 bg-gradient-to-br from-brand-primary to-brand-secondary rounded-2xl shadow-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <!-- LIGNE 504: Icône fonctionnalité */
                        <!-- w-16 h-16: dimensions 4rem × 4rem */
                        <!-- bg-gradient-to-br: dégradé diagonal */
                        <!-- from-brand-primary to-brand-secondary: couleurs marque */
                        <!-- rounded-2xl: coins arrondis */
                        <!-- shadow-lg: ombre */
                        <!-- flex items-center justify-center: centrage contenu */
                        <!-- mb-6: marge bottom 1.5rem */
                        <!-- group-hover:scale-110: agrandissement au survol groupe */
                        <!-- transition-transform duration-300: animation transformation */
                        
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <!-- LIGNE 515: Icône SVG */
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            <!-- LIGNE 518: Chemin SVG pour icône éclair/performance */
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Performance Optimale</h3>
                    <!-- LIGNE 523: Titre fonctionnalité */
                    <!-- text-2xl: taille 1.5rem */
                    <!-- font-bold: police grasse */
                    <!-- text-slate-900: couleur sombre */
                    <!-- mb-4: marge bottom 1rem */
                    
                    <p class="text-slate-600 leading-relaxed">
                        <!-- LIGNE 530: Description fonctionnalité */
                        <!-- text-slate-600: couleur gris moyen */
                        <!-- leading-relaxed: interligne détendu */
                        
                        Optimisation automatique de votre code pour des performances exceptionnelles, 
                        avec un bundling intelligent et une compression avancée.
                    </p>
                </div>

                <!-- ==================== CARTE FONCTIONNALITÉ 2 ==================== -->
                <div class="group bg-gradient-to-br from-white to-slate-50 rounded-3xl p-8 shadow-lg hover:shadow-2xl border border-slate-100 hover:border-brand-primary/20 transition-all duration-500 transform hover:-translate-y-2 animate-scale-in" style="animation-delay: 0.1s;">
                    <div class="w-16 h-16 bg-gradient-to-br from-brand-secondary to-brand-accent rounded-2xl shadow-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"/>
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Base de Données Intégrée</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Gestion complète de vos données avec une base de données moderne, 
                        des migrations automatiques et une interface d'administration intuitive.
                    </p>
                </div>

                <!-- ==================== CARTE FONCTIONNALITÉ 3 ==================== -->
                <div class="group bg-gradient-to-br from-white to-slate-50 rounded-3xl p-8 shadow-lg hover:shadow-2xl border border-slate-100 hover:border-brand-primary/20 transition-all duration-500 transform hover:-translate-y-2 animate-scale-in" style="animation-delay: 0.2s;">
                    <div class="w-16 h-16 bg-gradient-to-br from-brand-accent to-brand-primary rounded-2xl shadow-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Sécurité Avancée</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Protection multi-niveaux avec chiffrement, authentification avancée 
                        et surveillance en temps réel des menaces de sécurité.
                    </p>
                </div>

                <!-- ==================== CARTE FONCTIONNALITÉ 4 ==================== -->
                <div class="group bg-gradient-to-br from-white to-slate-50 rounded-3xl p-8 shadow-lg hover:shadow-2xl border border-slate-100 hover:border-brand-primary/20 transition-all duration-500 transform hover:-translate-y-2 animate-scale-in" style="animation-delay: 0.3s;">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl shadow-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Déploiement Simplifié</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Déployez en un clic vers le cloud avec notre système de CI/CD intégré 
                        et une gestion automatique de l'infrastructure.
                    </p>
                </div>

                <!-- ==================== CARTE FONCTIONNALITÉ 5 ==================== -->
                <div class="group bg-gradient-to-br from-white to-slate-50 rounded-3xl p-8 shadow-lg hover:shadow-2xl border border-slate-100 hover:border-brand-primary/20 transition-all duration-500 transform hover:-translate-y-2 animate-scale-in" style="animation-delay: 0.4s;">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl shadow-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">IA Intégrée</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Assistant intelligent pour générer du code, détecter les bugs 
                        et optimiser automatiquement vos applications.
                    </p>
                </div>

                <!-- ==================== CARTE FONCTIONNALITÉ 6 ==================== -->
                <div class="group bg-gradient-to-br from-white to-slate-50 rounded-3xl p-8 shadow-lg hover:shadow-2xl border border-slate-100 hover:border-brand-primary/20 transition-all duration-500 transform hover:-translate-y-2 animate-scale-in" style="animation-delay: 0.5s;">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl shadow-lg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Analytics Avancés</h3>
                    <p class="text-slate-600 leading-relaxed">
                        Tableaux de bord en temps réel avec métriques détaillées, 
                        rapports personnalisés et insights automatiques.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== FOOTER MODERNE ==================== -->
    <footer class="bg-slate-900 text-white py-16">
        <!-- LIGNE 609: Footer avec fond sombre */
        <!-- bg-slate-900: fond gris très foncé */
        <!-- text-white: texte blanc */
        <!-- py-16: padding vertical 4rem */
        
        <div class="container mx-auto px-6 lg:px-8">
            <!-- LIGNE 615: Container footer centré */
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- LIGNE 618: Grille responsive footer */
                <!-- grid grid-cols-1: 1 colonne mobile */
                <!-- md:grid-cols-2: 2 colonnes tablette */
                <!-- lg:grid-cols-4: 4 colonnes desktop */
                <!-- gap-8: espacement 2rem */
                <!-- mb-12: marge bottom 3rem */
                
                <!-- ==================== COLONNE ENTREPRISE ==================== -->
                <div class="lg:col-span-2">
                    <!-- LIGNE 626: Colonne étendue pour info entreprise */
                    <!-- lg:col-span-2: occupe 2 colonnes sur desktop */
                    
                    <div class="flex items-center space-x-3 mb-6">
                        <!-- LIGNE 630: Container logo footer */
                        <!-- flex items-center: alignement centré */
                        <!-- space-x-3: espacement 0.75rem */
                        <!-- mb-6: marge bottom 1.5rem */
                        
                        <div class="w-12 h-12 bg-gradient-to-br from-brand-primary to-brand-secondary rounded-2xl shadow-lg flex items-center justify-center">
                            <!-- LIGNE 636: Icône logo footer */
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                        </div>
                        
                        <div>
                            <h3 class="text-2xl font-bold">DevTools Pro</h3>
                            <!-- LIGNE 647: Nom entreprise */
                            <!-- text-2xl: taille 1.5rem */
                            <!-- font-bold: police grasse */
                            
                            <p class="text-slate-400">Plateforme de Développement</p>
                            <!-- LIGNE 652: Tagline */
                            <!-- text-slate-400: couleur gris clair */
                        </div>
                    </div>
                    
                    <p class="text-slate-300 mb-6 max-w-md leading-relaxed">
                        <!-- LIGNE 658: Description entreprise */
                        <!-- text-slate-300: couleur gris moyen */
                        <!-- mb-6: marge bottom 1.5rem */
                        <!-- max-w-md: largeur max 28rem */
                        <!-- leading-relaxed: interligne détendu */
                        
                        Nous révolutionnons le développement web avec des outils modernes, 
                        une interface intuitive et des performances exceptionnelles.
                    </p>
                    
                    <!-- ==================== RÉSEAUX SOCIAUX ==================== -->
                    <div class="flex space-x-4">
                        <!-- LIGNE 668: Container réseaux sociaux */
                        <!-- flex: affichage horizontal */
                        <!-- space-x-4: espacement 1rem */
                        
                        <a href="#" class="w-10 h-10 bg-slate-800 hover:bg-brand-primary rounded-lg flex items-center justify-center transition-colors duration-300">
                            <!-- LIGNE 673: Bouton réseau social */
                            <!-- w-10 h-10: dimensions 2.5rem × 2.5rem */
                            <!-- bg-slate-800: fond gris foncé */
                            <!-- hover:bg-brand-primary: couleur marque au survol */
                            <!-- rounded-lg: coins arrondis */
                            <!-- flex items-center justify-center: centrage contenu */
                            <!-- transition-colors duration-300: animation couleur */
                            
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <!-- LIGNE 682: Icône GitHub */
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                        
                        <a href="#" class="w-10 h-10 bg-slate-800 hover:bg-brand-primary rounded-lg flex items-center justify-center transition-colors duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <!-- LIGNE 689: Icône Twitter/X -->
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        
                        <a href="#" class="w-10 h-10 bg-slate-800 hover:bg-brand-primary rounded-lg flex items-center justify-center transition-colors duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <!-- LIGNE 696: Icône LinkedIn -->
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- ==================== COLONNE LIENS RAPIDES ==================== -->
                <div>
                    <!-- LIGNE 705: Colonne liens navigation */
                    
                    <h4 class="text-lg font-semibold mb-6">Liens Rapides</h4>
                    <!-- LIGNE 708: Titre colonne */
                    <!-- text-lg: taille 1.125rem */
                    <!-- font-semibold: police semi-grasse */
                    <!-- mb-6: marge bottom 1.5rem */
                    
                    <ul class="space-y-3">
                        <!-- LIGNE 714: Liste liens */
                        <!-- space-y-3: espacement vertical 0.75rem */
                        
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300">Fonctionnalités</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300">Tarifs</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300">Documentation</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300">API</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300">Support</a></li>
                        <!-- LIGNE 719-723: Liens avec animation couleur */
                        <!-- text-slate-300: couleur gris clair */
                        <!-- hover:text-white: blanc au survol */
                        <!-- transition-colors duration-300: animation couleur */
                    </ul>
                </div>

                <!-- ==================== COLONNE LÉGAL ==================== -->
                <div>
                    <h4 class="text-lg font-semibold mb-6">Légal</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300">Confidentialité</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300">Conditions</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300">Cookies</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300">Mentions légales</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300">Contact</a></li>
                    </ul>
                </div>
            </div>

            <!-- ==================== COPYRIGHT ==================== -->
            <div class="border-t border-slate-800 pt-8 text-center">
                <!-- LIGNE 742: Section copyright */
                <!-- border-t border-slate-800: bordure top gris foncé */
                <!-- pt-8: padding top 2rem */
                <!-- text-center: texte centré */
                
                <p class="text-slate-400">
                    <!-- LIGNE 748: Texte copyright */
                    <!-- text-slate-400: couleur gris clair */
                    
                    &copy; 2025 DevTools Pro. Tous droits réservés. 
                    Site créé avec 
                    <span class="bg-gradient-to-r from-brand-primary to-brand-secondary bg-clip-text text-transparent font-semibold">
                        <!-- LIGNE 754: Span Tailwind avec dégradé */
                        <!-- bg-gradient-to-r: dégradé horizontal */
                        <!-- from-brand-primary to-brand-secondary: couleurs marque */
                        <!-- bg-clip-text text-transparent: applique dégradé au texte */
                        <!-- font-semibold: police semi-grasse */
                        Tailwind CSS
                    </span>
                </p>
            </div>
        </div>
    </footer>
</body>
</html>