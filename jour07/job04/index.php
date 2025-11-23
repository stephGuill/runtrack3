<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- ==================== MÉTADONNÉES HTML5 ==================== -->
    <meta charset="UTF-8">
    <!-- LIGNE 5: Encodage UTF-8 pour caractères français et spéciaux -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LIGNE 8: Configuration responsive pour tous appareils -->
    
    <title>Formulaire Moderne avec Tailwind CSS</title>
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
                        // LIGNE 27: Couleurs personnalisées pour le formulaire
                        'form': {
                            'primary': '#3b82f6',
                            'secondary': '#8b5cf6',
                            'accent': '#06b6d4',
                            'success': '#10b981',
                            'warning': '#f59e0b',
                            'error': '#ef4444',
                        }
                    },
                    // LIGNE 37: Animations personnalisées
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'bounce-in': 'bounceIn 0.8s ease-out',
                        'shake': 'shake 0.5s ease-in-out',
                        'pulse-glow': 'pulseGlow 2s ease-in-out infinite',
                    },
                    // LIGNE 45: Keyframes pour animations
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(50px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        bounceIn: {
                            '0%': { transform: 'scale(0.3)', opacity: '0' },
                            '50%': { transform: 'scale(1.05)', opacity: '0.8' },
                            '100%': { transform: 'scale(1)', opacity: '1' },
                        },
                        shake: {
                            '0%, 100%': { transform: 'translateX(0)' },
                            '10%, 30%, 50%, 70%, 90%': { transform: 'translateX(-2px)' },
                            '20%, 40%, 60%, 80%': { transform: 'translateX(2px)' },
                        },
                        pulseGlow: {
                            '0%, 100%': { boxShadow: '0 0 20px rgba(59, 130, 246, 0.3)' },
                            '50%': { boxShadow: '0 0 30px rgba(59, 130, 246, 0.6)' },
                        }
                    }
                }
            }
        }
    </script>
</head>

<!-- ==================== CORPS DU DOCUMENT ==================== -->
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-800 relative overflow-x-hidden">
    <!-- LIGNE 70: Body avec dégradé sombre moderne -->
    <!-- min-h-screen: hauteur minimum écran -->
    <!-- bg-gradient-to-br: dégradé diagonal bottom-right -->
    <!-- from-slate-900 via-purple-900 to-slate-800: dégradé sombre élégant -->
    <!-- relative: positionnement relatif -->
    <!-- overflow-x-hidden: masque débordement horizontal -->

    <!-- ==================== ÉLÉMENTS DÉCORATIFS D'ARRIÈRE-PLAN ==================== -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.02"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <!-- LIGNE 79: Pattern décoratif en arrière-plan -->
    <!-- absolute inset-0: couvre toute la zone */
    <!-- bg-[url(...)]: pattern SVG en base64 */
    <!-- opacity-50: opacité 50% */
    
    <div class="absolute top-0 left-0 w-full h-full">
        <!-- LIGNE 84: Container pour éléments flottants -->
        
        <div class="absolute top-20 left-10 w-32 h-32 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
        <!-- LIGNE 87: Cercle décoratif 1 -->
        <!-- absolute top-20 left-10: position */
        <!-- w-32 h-32: dimensions 8rem × 8rem */
        <!-- bg-blue-500/10: bleu avec opacité 10% */
        <!-- rounded-full: forme circulaire */
        <!-- blur-3xl: flou très important */
        <!-- animate-pulse: animation pulsation */
        
        <div class="absolute bottom-32 right-16 w-40 h-40 bg-purple-500/10 rounded-full blur-2xl animate-bounce"></div>
        <!-- LIGNE 95: Cercle décoratif 2 */
        <!-- bottom-32 right-16: position bas droite */
        <!-- w-40 h-40: dimensions 10rem × 10rem */
        <!-- bg-purple-500/10: violet avec opacité 10% */
        <!-- blur-2xl: flou important */
        <!-- animate-bounce: animation rebond */
        
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-cyan-500/5 rounded-full blur-3xl"></div>
        <!-- LIGNE 103: Cercle décoratif central -->
        <!-- top-1/2 left-1/2: position centre */
        <!-- transform -translate-x-1/2 -translate-y-1/2: centrage parfait */
        <!-- w-64 h-64: dimensions 16rem × 16rem */
        <!-- bg-cyan-500/5: cyan avec opacité 5% */
    </div>

    <!-- ==================== HEADER SIMPLIFIÉ ==================== -->
    <header class="relative z-10 py-8">
        <!-- LIGNE 111: Header simple avec z-index -->
        <!-- relative z-10: au-dessus des éléments décoratifs */
        <!-- py-8: padding vertical 2rem */
        
        <div class="container mx-auto px-6 text-center">
            <!-- LIGNE 116: Container centré -->
            <!-- container mx-auto: conteneur centré */
            <!-- px-6: padding horizontal 1.5rem */
            <!-- text-center: texte centré */
            
            <h1 class="text-4xl lg:text-6xl font-black text-white mb-4 animate-fade-in">
                <!-- LIGNE 122: Titre principal -->
                <!-- text-4xl lg:text-6xl: tailles responsive */
                <!-- font-black: police extra grasse */
                <!-- text-white: couleur blanche */
                <!-- mb-4: marge bottom 1rem */
                <!-- animate-fade-in: animation personnalisée */
                
                Formulaire 
                <span class="bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">
                    <!-- LIGNE 130: Span avec texte dégradé */
                    <!-- bg-gradient-to-r: dégradé horizontal */
                    <!-- from-cyan-400 to-blue-500: cyan vers bleu */
                    <!-- bg-clip-text text-transparent: applique dégradé au texte */
                    Moderne
                </span>
            </h1>
            
            <p class="text-xl text-slate-300 animate-slide-up">
                <!-- LIGNE 138: Sous-titre descriptif -->
                <!-- text-xl: taille 1.25rem */
                <!-- text-slate-300: couleur gris clair */
                <!-- animate-slide-up: animation personnalisée */
                Créé avec Tailwind CSS - Ombres, opacités et design moderne
            </p>
        </div>
    </header>

    <!-- ==================== FORMULAIRE PRINCIPAL ==================== -->
    <main class="relative z-10 container mx-auto px-6 py-12">
        <!-- LIGNE 148: Section principale -->
        <!-- relative z-10: au-dessus des éléments décoratifs */
        <!-- container mx-auto: conteneur centré */
        <!-- px-6: padding horizontal 1.5rem */
        <!-- py-12: padding vertical 3rem */
        
        <div class="max-w-4xl mx-auto">
            <!-- LIGNE 155: Container largeur limitée */
            <!-- max-w-4xl: largeur max 56rem */
            <!-- mx-auto: centrage horizontal */
            
            <form class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 lg:p-12 shadow-2xl border border-white/20 animate-bounce-in">
                <!-- LIGNE 160: Formulaire avec glassmorphism -->
                <!-- bg-white/10: fond blanc avec opacité 10% */
                <!-- backdrop-blur-lg: effet de flou d'arrière-plan */
                <!-- rounded-3xl: coins très arrondis */
                <!-- p-8 lg:p-12: padding responsive */
                <!-- shadow-2xl: ombre extra large */
                <!-- border border-white/20: bordure blanche avec opacité */
                <!-- animate-bounce-in: animation personnalisée */
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- LIGNE 170: Grille responsive pour les champs -->
                    <!-- grid grid-cols-1: 1 colonne mobile */
                    <!-- lg:grid-cols-2: 2 colonnes desktop */
                    <!-- gap-8: espacement 2rem entre cellules */
                    
                    <!-- ==================== CHAMP PRÉNOM ==================== -->
                    <div class="space-y-2">
                        <!-- LIGNE 176: Container champ prénom -->
                        <!-- space-y-2: espacement vertical 0.5rem */
                        
                        <label for="prenom" class="block text-sm font-semibold text-white/90 mb-2 flex items-center space-x-2">
                            <!-- LIGNE 180: Label avec icône -->
                            <!-- block: affichage bloc */
                            <!-- text-sm: taille petite */
                            <!-- font-semibold: police semi-grasse */
                            <!-- text-white/90: blanc avec opacité 90% */
                            <!-- mb-2: marge bottom 0.5rem */
                            <!-- flex items-center space-x-2: alignement avec espacement */
                            
                            <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <!-- LIGNE 189: Icône utilisateur -->
                                <!-- w-5 h-5: dimensions 1.25rem × 1.25rem */
                                <!-- text-cyan-400: couleur cyan */
                                
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                <!-- LIGNE 194: Chemin SVG pour icône personne -->
                            </svg>
                            <span>Prénom</span>
                        </label>
                        
                        <div class="relative group">
                            <!-- LIGNE 201: Container input avec groupe pour animations -->
                            <!-- relative: positionnement relatif */
                            <!-- group: classe pour effets de groupe */
                            
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <!-- LIGNE 206: Container icône input -->
                                <!-- absolute inset-y-0 left-0: position absolue à gauche */
                                <!-- pl-4: padding left 1rem */
                                <!-- flex items-center: centrage vertical */
                                <!-- pointer-events-none: ignore les clics */
                                
                                <svg class="w-5 h-5 text-slate-400 group-focus-within:text-cyan-400 transition-colors duration-300" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <!-- LIGNE 213: Icône avec animation couleur */
                                    <!-- w-5 h-5: dimensions */
                                    <!-- text-slate-400: couleur gris par défaut */
                                    <!-- group-focus-within:text-cyan-400: cyan au focus */
                                    <!-- transition-colors duration-300: animation couleur */
                                    
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            
                            <input type="text" 
                                   id="prenom" 
                                   name="prenom" 
                                   placeholder="Entrez votre prénom..."
                                   class="w-full pl-12 pr-4 py-4 bg-white/5 border-2 border-white/20 rounded-2xl 
                                          text-white placeholder-slate-400 backdrop-blur-sm
                                          focus:outline-none focus:ring-4 focus:ring-cyan-400/50 
                                          focus:border-cyan-400 focus:bg-white/10
                                          hover:bg-white/10 hover:border-white/30
                                          transition-all duration-300 ease-in-out
                                          shadow-lg hover:shadow-xl focus:shadow-2xl">
                            <!-- LIGNE 226: Input avec styling complet -->
                            <!-- w-full: largeur pleine */
                            <!-- pl-12: padding left 3rem (pour icône) */
                            <!-- pr-4: padding right 1rem */
                            <!-- py-4: padding vertical 1rem */
                            <!-- bg-white/5: fond blanc opacité 5% */
                            <!-- border-2 border-white/20: bordure blanche opacité 20% */
                            <!-- rounded-2xl: coins très arrondis */
                            <!-- text-white: texte blanc */
                            <!-- placeholder-slate-400: placeholder gris */
                            <!-- backdrop-blur-sm: effet flou */
                            <!-- focus:outline-none: supprime outline */
                            <!-- focus:ring-4: anneau focus 4px */
                            <!-- focus:ring-cyan-400/50: couleur anneau avec opacité */
                            <!-- focus:border-cyan-400: bordure cyan au focus */
                            <!-- focus:bg-white/10: fond plus clair au focus */
                            <!-- hover:bg-white/10: fond plus clair au survol */
                            <!-- hover:border-white/30: bordure plus visible au survol */
                            <!-- transition-all duration-300: animation complète */
                            <!-- ease-in-out: courbe d'animation */
                            <!-- shadow-lg: ombre large */
                            <!-- hover:shadow-xl: ombre plus large au survol */
                            <!-- focus:shadow-2xl: ombre très large au focus */
                        </div>
                    </div>

                    <!-- ==================== CHAMP NOM ==================== -->
                    <div class="space-y-2">
                        <label for="nom" class="block text-sm font-semibold text-white/90 mb-2 flex items-center space-x-2">
                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>Nom</span>
                        </label>
                        
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400 group-focus-within:text-purple-400 transition-colors duration-300" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            
                            <input type="text" 
                                   id="nom" 
                                   name="nom" 
                                   placeholder="Entrez votre nom..."
                                   class="w-full pl-12 pr-4 py-4 bg-white/5 border-2 border-white/20 rounded-2xl 
                                          text-white placeholder-slate-400 backdrop-blur-sm
                                          focus:outline-none focus:ring-4 focus:ring-purple-400/50 
                                          focus:border-purple-400 focus:bg-white/10
                                          hover:bg-white/10 hover:border-white/30
                                          transition-all duration-300 ease-in-out
                                          shadow-lg hover:shadow-xl focus:shadow-2xl">
                        </div>
                    </div>

                    <!-- ==================== CHAMP EMAIL ==================== -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold text-white/90 mb-2 flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <!-- LIGNE 282: Icône email -->
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>Adresse Email</span>
                        </label>
                        
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400 group-focus-within:text-green-400 transition-colors duration-300" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </div>
                            
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   placeholder="votre.email@exemple.com"
                                   class="w-full pl-12 pr-4 py-4 bg-white/5 border-2 border-white/20 rounded-2xl 
                                          text-white placeholder-slate-400 backdrop-blur-sm
                                          focus:outline-none focus:ring-4 focus:ring-green-400/50 
                                          focus:border-green-400 focus:bg-white/10
                                          hover:bg-white/10 hover:border-white/30
                                          transition-all duration-300 ease-in-out
                                          shadow-lg hover:shadow-xl focus:shadow-2xl">
                        </div>
                    </div>

                    <!-- ==================== CHAMP TÉLÉPHONE ==================== -->
                    <div class="space-y-2">
                        <label for="telephone" class="block text-sm font-semibold text-white/90 mb-2 flex items-center space-x-2">
                            <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <!-- LIGNE 318: Icône téléphone -->
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span>Téléphone</span>
                        </label>
                        
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400 group-focus-within:text-orange-400 transition-colors duration-300" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            
                            <input type="tel" 
                                   id="telephone" 
                                   name="telephone" 
                                   placeholder="+33 1 23 45 67 89"
                                   class="w-full pl-12 pr-4 py-4 bg-white/5 border-2 border-white/20 rounded-2xl 
                                          text-white placeholder-slate-400 backdrop-blur-sm
                                          focus:outline-none focus:ring-4 focus:ring-orange-400/50 
                                          focus:border-orange-400 focus:bg-white/10
                                          hover:bg-white/10 hover:border-white/30
                                          transition-all duration-300 ease-in-out
                                          shadow-lg hover:shadow-xl focus:shadow-2xl">
                        </div>
                    </div>

                    <!-- ==================== CHAMP MOT DE PASSE ==================== -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-semibold text-white/90 mb-2 flex items-center space-x-2">
                            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <!-- LIGNE 354: Icône cadenas -->
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            <span>Mot de passe</span>
                        </label>
                        
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400 group-focus-within:text-red-400 transition-colors duration-300" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   placeholder="••••••••••••"
                                   class="w-full pl-12 pr-4 py-4 bg-white/5 border-2 border-white/20 rounded-2xl 
                                          text-white placeholder-slate-400 backdrop-blur-sm
                                          focus:outline-none focus:ring-4 focus:ring-red-400/50 
                                          focus:border-red-400 focus:bg-white/10
                                          hover:bg-white/10 hover:border-white/30
                                          transition-all duration-300 ease-in-out
                                          shadow-lg hover:shadow-xl focus:shadow-2xl">
                        </div>
                    </div>

                    <!-- ==================== CHAMP DATE DE NAISSANCE ==================== -->
                    <div class="space-y-2">
                        <label for="birthdate" class="block text-sm font-semibold text-white/90 mb-2 flex items-center space-x-2">
                            <svg class="w-5 h-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <!-- LIGNE 385: Icône calendrier -->
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>Date de naissance</span>
                        </label>
                        
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400 group-focus-within:text-pink-400 transition-colors duration-300" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            
                            <input type="date" 
                                   id="birthdate" 
                                   name="birthdate"
                                   class="w-full pl-12 pr-4 py-4 bg-white/5 border-2 border-white/20 rounded-2xl 
                                          text-white placeholder-slate-400 backdrop-blur-sm
                                          focus:outline-none focus:ring-4 focus:ring-pink-400/50 
                                          focus:border-pink-400 focus:bg-white/10
                                          hover:bg-white/10 hover:border-white/30
                                          transition-all duration-300 ease-in-out
                                          shadow-lg hover:shadow-xl focus:shadow-2xl">
                        </div>
                    </div>
                </div>

                <!-- ==================== SECTION GENRE ET PRÉFÉRENCES ==================== -->
                <div class="mt-8 space-y-6">
                    <!-- LIGNE 414: Section supplémentaire -->
                    <!-- mt-8: marge top 2rem */
                    <!-- space-y-6: espacement vertical 1.5rem */
                    
                    <!-- ==================== SÉLECTION GENRE ==================== -->
                    <div class="space-y-4">
                        <label class="block text-sm font-semibold text-white/90 mb-4 flex items-center space-x-2">
                            <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <!-- LIGNE 422: Icône genre -->
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <span>Genre</span>
                        </label>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- LIGNE 432: Grille pour boutons radio -->
                            <!-- grid grid-cols-1 md:grid-cols-3: 1 colonne mobile, 3 desktop */
                            <!-- gap-4: espacement 1rem */
                            
                            <label class="relative cursor-pointer group">
                                <!-- LIGNE 437: Label radio masculin -->
                                <!-- relative: positionnement relatif */
                                <!-- cursor-pointer: curseur pointeur */
                                <!-- group: classe pour effets de groupe */
                                
                                <input type="radio" name="genre" value="masculin" 
                                       class="sr-only peer">
                                <!-- LIGNE 443: Input radio caché -->
                                <!-- sr-only: masqué mais accessible */
                                <!-- peer: classe pour états peer -->
                                
                                <div class="bg-white/5 border-2 border-white/20 rounded-2xl p-4 text-center
                                           peer-checked:bg-blue-500/20 peer-checked:border-blue-400 
                                           peer-checked:shadow-lg peer-checked:shadow-blue-500/25
                                           hover:bg-white/10 hover:border-white/30
                                           transition-all duration-300 backdrop-blur-sm
                                           group-hover:scale-105 transform">
                                    <!-- LIGNE 450: Container radio stylé -->
                                    <!-- bg-white/5: fond blanc opacité 5% */
                                    <!-- border-2 border-white/20: bordure blanche */
                                    <!-- rounded-2xl: coins très arrondis */
                                    <!-- p-4: padding 1rem */
                                    <!-- text-center: texte centré */
                                    <!-- peer-checked:bg-blue-500/20: fond bleu si sélectionné */
                                    <!-- peer-checked:border-blue-400: bordure bleue si sélectionné */
                                    <!-- peer-checked:shadow-lg: ombre si sélectionné */
                                    <!-- peer-checked:shadow-blue-500/25: couleur ombre bleue */
                                    <!-- hover:bg-white/10: fond plus clair au survol */
                                    <!-- hover:border-white/30: bordure plus visible au survol */
                                    <!-- transition-all duration-300: animation complète */
                                    <!-- backdrop-blur-sm: effet flou */
                                    <!-- group-hover:scale-105: agrandissement au survol */
                                    <!-- transform: active transformations */
                                    
                                    <div class="flex items-center justify-center mb-2">
                                        <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <span class="text-white font-medium">Masculin</span>
                                </div>
                            </label>
                            
                            <label class="relative cursor-pointer group">
                                <input type="radio" name="genre" value="feminin" 
                                       class="sr-only peer">
                                
                                <div class="bg-white/5 border-2 border-white/20 rounded-2xl p-4 text-center
                                           peer-checked:bg-pink-500/20 peer-checked:border-pink-400 
                                           peer-checked:shadow-lg peer-checked:shadow-pink-500/25
                                           hover:bg-white/10 hover:border-white/30
                                           transition-all duration-300 backdrop-blur-sm
                                           group-hover:scale-105 transform">
                                    
                                    <div class="flex items-center justify-center mb-2">
                                        <svg class="w-8 h-8 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <span class="text-white font-medium">Féminin</span>
                                </div>
                            </label>
                            
                            <label class="relative cursor-pointer group">
                                <input type="radio" name="genre" value="autre" 
                                       class="sr-only peer">
                                
                                <div class="bg-white/5 border-2 border-white/20 rounded-2xl p-4 text-center
                                           peer-checked:bg-purple-500/20 peer-checked:border-purple-400 
                                           peer-checked:shadow-lg peer-checked:shadow-purple-500/25
                                           hover:bg-white/10 hover:border-white/30
                                           transition-all duration-300 backdrop-blur-sm
                                           group-hover:scale-105 transform">
                                    
                                    <div class="flex items-center justify-center mb-2">
                                        <svg class="w-8 h-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <span class="text-white font-medium">Autre</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- ==================== CHECKBOXES PRÉFÉRENCES ==================== -->
                    <div class="space-y-4">
                        <label class="block text-sm font-semibold text-white/90 mb-4 flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <!-- LIGNE 515: Icône préférences -->
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                            <span>Préférences</span>
                        </label>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- LIGNE 524: Grille pour checkboxes -->
                            
                            <label class="relative cursor-pointer group flex items-center space-x-3">
                                <!-- LIGNE 527: Checkbox newsletter -->
                                
                                <input type="checkbox" name="newsletter" value="1" 
                                       class="sr-only peer">
                                <!-- LIGNE 531: Input checkbox caché -->
                                
                                <div class="w-6 h-6 bg-white/5 border-2 border-white/20 rounded-lg
                                           peer-checked:bg-cyan-500 peer-checked:border-cyan-400
                                           peer-checked:shadow-lg peer-checked:shadow-cyan-500/25
                                           transition-all duration-300 backdrop-blur-sm
                                           flex items-center justify-center">
                                    <!-- LIGNE 537: Container checkbox visuel -->
                                    <!-- w-6 h-6: dimensions 1.5rem × 1.5rem */
                                    <!-- bg-white/5: fond blanc opacité 5% */
                                    <!-- border-2 border-white/20: bordure blanche */
                                    <!-- rounded-lg: coins arrondis */
                                    <!-- peer-checked:bg-cyan-500: fond cyan si coché */
                                    <!-- peer-checked:border-cyan-400: bordure cyan si coché */
                                    <!-- peer-checked:shadow-lg: ombre si coché */
                                    <!-- peer-checked:shadow-cyan-500/25: couleur ombre cyan */
                                    <!-- transition-all duration-300: animation complète */
                                    <!-- backdrop-blur-sm: effet flou */
                                    <!-- flex items-center justify-center: centrage contenu */
                                    
                                    <svg class="w-4 h-4 text-white opacity-0 peer-checked:opacity-100 transition-opacity duration-300" 
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <!-- LIGNE 551: Icône checkmark -->
                                        <!-- w-4 h-4: dimensions 1rem × 1rem */
                                        <!-- text-white: couleur blanche */
                                        <!-- opacity-0: invisible par défaut */
                                        <!-- peer-checked:opacity-100: visible si coché */
                                        <!-- transition-opacity duration-300: animation opacité */
                                        
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        <!-- LIGNE 559: Chemin SVG pour coche */
                                    </svg>
                                </div>
                                
                                <span class="text-white/90 font-medium">Recevoir la newsletter</span>
                                <!-- LIGNE 564: Texte checkbox */
                                <!-- text-white/90: blanc avec opacité 90% */
                                <!-- font-medium: police moyenne */
                            </label>
                            
                            <label class="relative cursor-pointer group flex items-center space-x-3">
                                <input type="checkbox" name="notifications" value="1" 
                                       class="sr-only peer">
                                
                                <div class="w-6 h-6 bg-white/5 border-2 border-white/20 rounded-lg
                                           peer-checked:bg-green-500 peer-checked:border-green-400
                                           peer-checked:shadow-lg peer-checked:shadow-green-500/25
                                           transition-all duration-300 backdrop-blur-sm
                                           flex items-center justify-center">
                                    
                                    <svg class="w-4 h-4 text-white opacity-0 peer-checked:opacity-100 transition-opacity duration-300" 
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                
                                <span class="text-white/90 font-medium">Notifications push</span>
                            </label>
                            
                            <label class="relative cursor-pointer group flex items-center space-x-3">
                                <input type="checkbox" name="terms" value="1" required
                                       class="sr-only peer">
                                
                                <div class="w-6 h-6 bg-white/5 border-2 border-white/20 rounded-lg
                                           peer-checked:bg-orange-500 peer-checked:border-orange-400
                                           peer-checked:shadow-lg peer-checked:shadow-orange-500/25
                                           transition-all duration-300 backdrop-blur-sm
                                           flex items-center justify-center">
                                    
                                    <svg class="w-4 h-4 text-white opacity-0 peer-checked:opacity-100 transition-opacity duration-300" 
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                
                                <span class="text-white/90 font-medium">J'accepte les conditions d'utilisation</span>
                            </label>
                            
                            <label class="relative cursor-pointer group flex items-center space-x-3">
                                <input type="checkbox" name="privacy" value="1" required
                                       class="sr-only peer">
                                
                                <div class="w-6 h-6 bg-white/5 border-2 border-white/20 rounded-lg
                                           peer-checked:bg-red-500 peer-checked:border-red-400
                                           peer-checked:shadow-lg peer-checked:shadow-red-500/25
                                           transition-all duration-300 backdrop-blur-sm
                                           flex items-center justify-center">
                                    
                                    <svg class="w-4 h-4 text-white opacity-0 peer-checked:opacity-100 transition-opacity duration-300" 
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                
                                <span class="text-white/90 font-medium">J'accepte la politique de confidentialité</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- ==================== BOUTONS D'ACTION ==================== -->
                <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                    <!-- LIGNE 631: Container boutons -->
                    <!-- mt-10: marge top 2.5rem */
                    <!-- flex flex-col sm:flex-row: colonne mobile, ligne desktop */
                    <!-- gap-4: espacement 1rem */
                    <!-- justify-center: centrage */
                    
                    <button type="submit" 
                            class="bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 
                                   text-white font-bold py-4 px-8 rounded-2xl shadow-2xl hover:shadow-cyan-500/25 
                                   transform hover:scale-105 hover:-translate-y-1 
                                   transition-all duration-300 ease-out
                                   border-2 border-cyan-400/50 hover:border-cyan-300
                                   backdrop-blur-sm animate-pulse-glow">
                        <!-- LIGNE 642: Bouton submit principal -->
                        <!-- bg-gradient-to-r: dégradé horizontal */
                        <!-- from-cyan-500 to-blue-600: cyan vers bleu */
                        <!-- hover:from-cyan-600 hover:to-blue-700: couleurs plus foncées au survol */
                        <!-- text-white: texte blanc */
                        <!-- font-bold: police grasse */
                        <!-- py-4 px-8: padding vertical 1rem, horizontal 2rem */
                        <!-- rounded-2xl: coins très arrondis */
                        <!-- shadow-2xl: ombre très large */
                        <!-- hover:shadow-cyan-500/25: ombre cyan au survol */
                        <!-- transform: active transformations */
                        <!-- hover:scale-105: agrandissement au survol */
                        <!-- hover:-translate-y-1: déplacement vers le haut au survol */
                        <!-- transition-all duration-300: animation complète */
                        <!-- ease-out: courbe d'animation */
                        <!-- border-2 border-cyan-400/50: bordure cyan avec opacité */
                        <!-- hover:border-cyan-300: bordure plus claire au survol */
                        <!-- backdrop-blur-sm: effet flou */
                        <!-- animate-pulse-glow: animation personnalisée */
                        
                        <span class="flex items-center justify-center space-x-2">
                            <!-- LIGNE 661: Container contenu bouton */
                            <!-- flex items-center justify-center: centrage */
                            <!-- space-x-2: espacement 0.5rem */
                            
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <!-- LIGNE 666: Icône bouton submit -->
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                <!-- LIGNE 669: Chemin SVG pour icône validation */
                            </svg>
                            <span>Créer mon compte</span>
                            <!-- LIGNE 672: Texte bouton */
                        </span>
                    </button>
                    
                    <button type="reset" 
                            class="bg-gradient-to-r from-slate-600 to-slate-700 hover:from-slate-700 hover:to-slate-800 
                                   text-white font-bold py-4 px-8 rounded-2xl shadow-xl hover:shadow-slate-500/25 
                                   transform hover:scale-105 hover:-translate-y-1 
                                   transition-all duration-300 ease-out
                                   border-2 border-slate-500/50 hover:border-slate-400
                                   backdrop-blur-sm">
                        <!-- LIGNE 681: Bouton reset secondaire -->
                        <!-- bg-gradient-to-r: dégradé horizontal */
                        <!-- from-slate-600 to-slate-700: gris foncé vers plus foncé */
                        <!-- hover:from-slate-700 hover:to-slate-800: couleurs plus foncées au survol */
                        <!-- text-white: texte blanc */
                        <!-- font-bold: police grasse */
                        <!-- py-4 px-8: padding vertical 1rem, horizontal 2rem */
                        <!-- rounded-2xl: coins très arrondis */
                        <!-- shadow-xl: ombre large */
                        <!-- hover:shadow-slate-500/25: ombre grise au survol */
                        <!-- transform: active transformations */
                        <!-- hover:scale-105: agrandissement au survol */
                        <!-- hover:-translate-y-1: déplacement vers le haut au survol */
                        <!-- transition-all duration-300: animation complète */
                        <!-- ease-out: courbe d'animation */
                        <!-- border-2 border-slate-500/50: bordure grise avec opacité */
                        <!-- hover:border-slate-400: bordure plus claire au survol */
                        <!-- backdrop-blur-sm: effet flou */
                        
                        <span class="flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <!-- LIGNE 700: Icône bouton reset -->
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                <!-- LIGNE 703: Chemin SVG pour icône refresh/reset */
                            </svg>
                            <span>Réinitialiser</span>
                            <!-- LIGNE 706: Texte bouton */
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- ==================== FOOTER SIMPLIFIÉ ==================== -->
    <footer class="relative z-10 py-8 text-center">
        <!-- LIGNE 715: Footer simple -->
        <!-- relative z-10: au-dessus des éléments décoratifs */
        <!-- py-8: padding vertical 2rem */
        <!-- text-center: texte centré */
        
        <p class="text-slate-400">
            <!-- LIGNE 721: Texte copyright */
            <!-- text-slate-400: couleur gris moyen */
            &copy; 2025 Formulaire Moderne. Entièrement stylé avec 
            <span class="bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent font-bold">
                <!-- LIGNE 725: Span avec texte dégradé */
                <!-- bg-gradient-to-r: dégradé horizontal */
                <!-- from-cyan-400 to-blue-500: cyan vers bleu */
                <!-- bg-clip-text text-transparent: applique dégradé au texte */
                <!-- font-bold: police grasse */
                Tailwind CSS
            </span>
        </p>
    </footer>
</body>
</html>