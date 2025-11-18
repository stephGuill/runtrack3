<!-- ==================== DÉCLARATION DE TYPE DE DOCUMENT ==================== -->
<!DOCTYPE html>
<!-- LIGNE 2: DOCTYPE html informe le navigateur qu'il s'agit d'un document HTML5 -->
<!-- UTILITÉ: Cette déclaration doit TOUJOURS être la première ligne d'un fichier HTML -->
<!-- FONCTION: Elle active le mode standard du navigateur et assure une interprétation correcte -->

<!-- ==================== ÉLÉMENT RACINE HTML ==================== -->
<html lang="fr">
<!-- LIGNE 7: <html> est l'élément racine qui contient TOUT le contenu de la page -->
<!-- ATTRIBUT: lang="fr" indique au navigateur que le contenu principal est en français -->
<!-- UTILITÉ: Cet attribut aide les moteurs de recherche et les lecteurs d'écran -->

<!-- ==================== SECTION HEAD (MÉTADONNÉES) ==================== -->
<head>
<!-- LIGNE 12: <head> contient les métadonnées : informations POUR le navigateur -->
<!-- CONTENU: Ces informations ne sont PAS affichées directement à l'utilisateur -->

    <!-- ==================== ENCODAGE DES CARACTÈRES ==================== -->
    <meta charset="UTF-8">
    <!-- LIGNE 16: charset="UTF-8" définit l'encodage pour afficher correctement les caractères -->
    <!-- UTILITÉ: UTF-8 permet d'afficher les accents français, emojis, caractères spéciaux, etc. -->

    <!-- ==================== CONFIGURATION RESPONSIVE ==================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LIGNE 20: viewport contrôle l'affichage sur les appareils mobiles -->
    <!-- PARAMÈTRES: width=device-width : la largeur s'adapte à l'écran de l'appareil -->
    <!-- PARAMÈTRES: initial-scale=1.0 : pas de zoom initial, taille normale -->

    <!-- ==================== TITRE DE L'ONGLET ==================== -->
    <title>Job03 - Afficher/Masquer Article</title>
    <!-- LIGNE 25: <title> définit le texte qui apparaît dans l'onglet du navigateur -->
    <!-- UTILITÉ: Ce titre est aussi utilisé par les moteurs de recherche -->

    <!-- ==================== STYLES CSS INTERNES ==================== -->
    <style>
    <!-- LIGNE 29: <style> permet d'inclure du CSS directement dans le HTML -->
    <!-- ALTERNATIVE: Pourrait être dans un fichier .css externe -->

        /* ==================== STYLES DU CORPS DE PAGE ==================== */
        body {
        /* LIGNE 33: Sélecteur CSS pour l'élément <body> */
        /* FONCTION: Définit l'apparence globale de la page */
            font-family: Arial, sans-serif;
            /* LIGNE 35: Police de caractères avec fallback (si Arial indisponible) */
            max-width: 600px;
            /* LIGNE 36: Largeur maximum de 600 pixels pour la lisibilité */
            margin: 50px auto;
            /* LIGNE 37: margin: 50px (haut/bas) auto (gauche/droite centré) */
            padding: 20px;
            /* LIGNE 38: Espacement interne de 20px sur tous les côtés */
            background-color: #f5f5f5;
            /* LIGNE 39: Couleur de fond gris très clair */
            text-align: center;
            /* LIGNE 40: Centrage du texte */
        }

        
        /* ==================== STYLES DU CONTENEUR PRINCIPAL ==================== */
        .container {
        /* LIGNE 43: Sélecteur de classe CSS pour les éléments avec class="container" */
        /* FONCTION: Crée une boîte blanche centrée avec ombre */
            background-color: white;
            /* LIGNE 46: Fond blanc pour contraster avec le fond gris de body */
            padding: 40px;
            /* LIGNE 47: Espacement interne de 40px pour aérer le contenu */
            border-radius: 10px;
            /* LIGNE 48: Coins arrondis de 10px pour un design moderne */
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            /* LIGNE 49: Ombre portée : 0px horizontal, 2px vertical, 10px flou, opacité 10% */
        }

        /* ==================== STYLES DU TITRE PRINCIPAL ==================== */
        h1 {
        /* LIGNE 53: Sélecteur pour tous les éléments <h1> */
            color: #333;
            /* LIGNE 55: Couleur gris foncé (#333 = RGB(51,51,51)) */
            margin-bottom: 30px;
            /* LIGNE 56: Marge inférieure de 30px pour espacer du contenu suivant */
        }

        /* ==================== STYLES DU BOUTON PRINCIPAL ==================== */
        #button {
        /* LIGNE 60: Sélecteur d'ID CSS pour l'élément avec id="button" */
        /* IMPORTANTE: # indique un ID (unique), . indique une classe (réutilisable) */
            background-color: #4CAF50;
            /* LIGNE 63: Couleur de fond verte (#4CAF50 = vert Material Design) */
            color: white;
            /* LIGNE 64: Couleur du texte en blanc pour contraster avec le fond vert */
            padding: 15px 30px;
            /* LIGNE 65: padding: 15px (haut/bas) 30px (gauche/droite) */
            font-size: 18px;
            /* LIGNE 66: Taille de police de 18 pixels */
            border: none;
            /* LIGNE 67: Supprime la bordure par défaut des boutons */
            border-radius: 5px;
            /* LIGNE 68: Coins arrondis de 5px */
            cursor: pointer;
            /* LIGNE 69: Change le curseur en main pointée au survol */
            margin: 20px;
            /* LIGNE 70: Marge de 20px sur tous les côtés */
            transition: background-color 0.3s;
            /* LIGNE 71: Animation de transition sur la couleur de fond (0.3 secondes) */
        }

        /* ==================== EFFET SURVOL DU BOUTON ==================== */
        #button:hover {
        /* LIGNE 75: Pseudo-classe :hover activée quand la souris survole l'élément */
            background-color: #45a049;
            /* LIGNE 77: Couleur plus foncée au survol pour feedback visuel */
        }

        /* ==================== EFFET CLIC DU BOUTON ==================== */
        #button:active {
        /* LIGNE 81: Pseudo-classe :active activée pendant que le bouton est pressé */
            transform: scale(0.98);
            /* LIGNE 83: Réduit légèrement la taille (98%) pour effet de "pression" */
        }

        /* ==================== STYLES DU COMPTEUR (PLACEHOLDER) ==================== */
        #compteur {
        /* LIGNE 86: Styles pour l'affichage du compteur (non utilisé dans cet exercice) */
        /* NOTE: Ce code semble être un résidu d'un autre exercice */
            font-size: 48px;
            /* LIGNE 89: Taille de police très grande pour visibilité */
            font-weight: bold;
            /* LIGNE 90: Texte en gras */
            color: #2196F3;
            /* LIGNE 91: Couleur bleue */
            margin: 30px 0;
            /* LIGNE 92: Marge verticale de 30px */
            padding: 20px;
            /* LIGNE 93: Espacement interne de 20px */
            background-color: #e7f3ff;
            /* LIGNE 94: Fond bleu très clair */
            border-radius: 10px;
            /* LIGNE 95: Coins arrondis */
            border: 2px solid #2196F3;
            /* LIGNE 96: Bordure bleue de 2px */
        }

        /* ==================== STYLES DE LA DESCRIPTION ==================== */
        .description {
        /* LIGNE 100: Styles pour la boîte de description */
            background-color: #fff3cd;
            /* LIGNE 102: Fond jaune clair pour attirer l'attention */
            border-left: 4px solid #ffc107;
            /* LIGNE 103: Bordure gauche jaune de 4px */
            padding: 15px;
            /* LIGNE 104: Espacement interne de 15px */
            margin-bottom: 30px;
            /* LIGNE 105: Marge inférieure de 30px */
            border-radius: 5px;
            /* LIGNE 106: Coins légèrement arrondis */
            text-align: left;
            /* LIGNE 107: Alignement du texte à gauche */
        }

    </style>
    <!-- LIGNE 110: Fin de la section styles CSS internes -->

<!-- ==================== FIN DES MÉTADONNÉES ==================== -->
</head>
<!-- LIGNE 113: Fermeture de la section <head> -->

<!-- ==================== SECTION BODY (CONTENU VISIBLE) ==================== -->
<body>
<!-- LIGNE 116: <body> contient TOUT le contenu visible de la page web -->
<!-- FONCTION: Tout ce qui est dans <body> sera affiché à l'utilisateur -->

    <!-- ==================== CONTENEUR PRINCIPAL ==================== -->
    <div class="container">
    <!-- LIGNE 120: <div> avec classe "container" pour le style CSS défini plus haut -->
    <!-- FONCTION: Crée la boîte blanche centrée avec ombre -->

        <!-- ==================== TITRE PRINCIPAL ==================== -->
        <h1>Afficher/Masquer Article</h1>
        <!-- LIGNE 124: <h1> définit un titre de niveau 1 (le plus important hiérarchiquement) -->
        <!-- BONNE PRATIQUE: Il devrait y avoir un seul <h1> par page pour le référencement -->

        <!-- ==================== DESCRIPTION DE L'EXERCICE ==================== -->
        <div class="description">
        <!-- LIGNE 128: Boîte de description avec le style jaune défini dans CSS -->
            <strong>Objectif :</strong> Créer un bouton qui affiche/masque alternativement un article.
            <!-- LIGNE 130: <strong> met le texte en gras pour l'importance -->
            <br><strong>Contrainte :</strong> Utiliser addEventListener() au lieu de onclick dans le HTML.
            <!-- LIGNE 131: <br> crée un saut de ligne -->
            <br><strong>Fonction :</strong> Manipulation du DOM avec innerHTML pour ajouter/supprimer contenu.
            <!-- LIGNE 132: Documentation des contraintes techniques -->
        </div>

        <!-- ==================== BOUTON INTERACTIF ==================== -->
        <button id="button">Afficher/Masquer</button>
        <!-- LIGNE 136: <button> crée un bouton cliquable -->
        <!-- ATTRIBUT: id="button" donne un identifiant UNIQUE à cet élément -->
        <!-- UTILITÉ: L'id permet à JavaScript de cibler précisément cet élément -->
        <!-- TEXTE: Le texte "Afficher/Masquer" s'affiche sur le bouton -->
        <!-- IMPORTANT: aucun attribut onclick ici, on utilise JavaScript externe -->
        <!-- BONNE PRATIQUE: Séparation HTML/JavaScript pour code maintenable -->

        <!-- ==================== ESPACEMENT VISUEL ==================== -->
        <br><br>
        <!-- LIGNE 144: <br><br> crée deux sauts de ligne pour espacer les éléments -->
        <!-- NOTE: C'est une méthode simple mais pas la plus élégante (CSS serait mieux) -->

        <!-- ==================== COMMENTAIRE HTML DOCUMENTAIRE ==================== -->
        <!-- Ceci est un commentaire HTML, visible dans le code source mais pas sur la page -->
        <!-- Les commentaires aident à documenter le code pour les développeurs -->
        <!-- Conteneur où l'article sera ajouté/supprimé dynamiquement -->

        <!-- ==================== CONTENEUR POUR CONTENU DYNAMIQUE ==================== -->
        <div id="container"></div>
        <!-- LIGNE 152: <div> est un conteneur générique sans signification sémantique particulière -->
        <!-- ATTRIBUT: id="container" donne un identifiant unique pour JavaScript -->
        <!-- ÉTAT INITIAL: Ce div est initialement VIDE (pas de contenu entre <div> et </div>) -->
        <!-- FONCTION: JavaScript va dynamiquement ajouter ou supprimer du contenu dans ce conteneur -->
        <!-- UTILITÉ: C'est ici que l'article avec la citation apparaîtra et disparaîtra -->
        <!-- RÔLE: Le conteneur sert de "zone d'affichage" contrôlée par JavaScript -->

    <!-- ==================== FERMETURE DU CONTENEUR PRINCIPAL ==================== -->
    </div>
    <!-- LIGNE 156: Fermeture de la <div class="container"> -->
    <!-- STRUCTURE: Chaque balise ouvrante doit avoir sa balise fermante correspondante -->

    <!-- ==================== INCLUSION DU JAVASCRIPT ==================== -->
    <script src="script.js"></script>
    <!-- LIGNE 160: <script src="script.js"> inclut un fichier JavaScript externe -->
    <!-- ATTRIBUT: src= indique le chemin vers le fichier (ici dans le même dossier) -->
    <!-- PLACEMENT: Cette balise doit être placée à la FIN de <body> -->
    <!-- RAISON: Pour que tous les éléments HTML existent avant que JavaScript essaie de les manipuler -->
    <!-- TECHNIQUE: Si le script était dans <head>, les éléments n'existeraient pas encore -->
    <!-- MÉTHODE: JavaScript utilise getElementById() qui nécessite que l'élément existe -->

<!-- ==================== FIN DU CONTENU VISIBLE ==================== -->
</body>
<!-- LIGNE 168: Fermeture de la section <body> -->

<!-- ==================== FIN DU DOCUMENT HTML ==================== -->
</html>
<!-- LIGNE 171: Fermeture de l'élément racine <html> -->
<!-- STRUCTURE COMPLÈTE: DOCTYPE → html → head → body → /body → /html -->
<!-- ==================== DOCUMENTATION COMPLÈTE DE L'EXERCICE ==================== -->
<!-- 
    ANALYSE LIGNE PAR LIGNE DU FICHIER JOB03 :
    
    🎯 OBJECTIF DE L'EXERCICE :
    Créer un bouton qui affiche/masque un article alternativement
    
    📋 ÉLÉMENTS HTML CLÉS ANALYSÉS :
    
    LIGNE 1-2 : DOCTYPE et déclaration HTML5
    LIGNE 7 : Élément racine avec langue française
    LIGNE 12-111 : Section <head> avec métadonnées et styles CSS
    LIGNE 16 : Encodage UTF-8 pour caractères spéciaux
    LIGNE 20 : Configuration responsive pour mobiles
    LIGNE 25 : Titre de l'onglet navigateur
    LIGNE 29-110 : Styles CSS internes pour l'apparence
    LIGNE 116-168 : Section <body> avec contenu visible
    LIGNE 120 : Conteneur principal avec classe CSS
    LIGNE 124 : Titre H1 principal de la page
    LIGNE 128-133 : Description de l'exercice avec contraintes
    LIGNE 136 : Bouton avec ID unique pour JavaScript
    LIGNE 152 : Conteneur vide pour contenu dynamique
    LIGNE 160 : Inclusion du script JavaScript externe
    
    🔧 COMPORTEMENT ATTENDU :
    - Premier clic sur bouton : article apparaît dans le conteneur
    - Deuxième clic : article disparaît du conteneur  
    - Troisième clic : article réapparaît
    - Et ainsi de suite (système de toggle/basculement)
    
    📜 CONTENU DE L'ARTICLE À AFFICHER :
    "L'important n'est pas la chute, mais l'atterrissage."
    
    🛠️ TECHNIQUES UTILISÉES :
    - Structure HTML5 sémantique et accessible
    - CSS interne pour styles et animations
    - Manipulation DOM dynamique avec innerHTML
    - Gestion d'état avec variable booléenne
    - Événements de clic avec addEventListener()
    - Structure conditionnelle if/else en JavaScript
    - Séparation des responsabilités (HTML/CSS/JS)
    
    🏗️ ARCHITECTURE LOGIQUE :
    État initial : conteneur vide, variable JavaScript = false
    Clic utilisateur → Vérifier état variable → Action appropriée → Changer état
    
    🎨 DESIGN ET UX :
    - Design moderne avec coins arrondis et ombres
    - Couleurs contrastées pour accessibilité
    - Feedback visuel sur bouton (hover, active)
    - Layout responsive et centré
    - Typographie claire et hiérarchisée
    
    ✅ BONNES PRATIQUES RESPECTÉES :
    - DOCTYPE HTML5 en première ligne
    - Métadonnées complètes (charset, viewport, title)
    - Un seul H1 par page pour SEO
    - IDs uniques pour éléments JavaScript
    - Script placé en fin de body
    - Séparation HTML/CSS/JavaScript
    - Commentaires explicatifs détaillés
    - Structure sémantique et accessible
-->
