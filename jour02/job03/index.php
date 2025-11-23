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
    <!-- LIEN VERS CSS -->
    <link rel="stylesheet" href="style.css">
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
        <!-- LIEN VERS CSS -->
        <link rel="stylesheet" href="style.css">
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
    
     OBJECTIF DE L'EXERCICE :
    Créer un bouton qui affiche/masque un article alternativement
    
     ÉLÉMENTS HTML CLÉS ANALYSÉS :
    
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
    
     COMPORTEMENT ATTENDU :
    - Premier clic sur bouton : article apparaît dans le conteneur
    - Deuxième clic : article disparaît du conteneur  
    - Troisième clic : article réapparaît
    - Et ainsi de suite (système de toggle/basculement)
    
     CONTENU DE L'ARTICLE À AFFICHER :
    "L'important n'est pas la chute, mais l'atterrissage."
    
     TECHNIQUES UTILISÉES :
    - Structure HTML5 sémantique et accessible
    - CSS interne pour styles et animations
    - Manipulation DOM dynamique avec innerHTML
    - Gestion d'état avec variable booléenne
    - Événements de clic avec addEventListener()
    - Structure conditionnelle if/else en JavaScript
    - Séparation des responsabilités (HTML/CSS/JS)
    
     ARCHITECTURE LOGIQUE :
    État initial : conteneur vide, variable JavaScript = false
    Clic utilisateur → Vérifier état variable → Action appropriée → Changer état
    
     DESIGN ET UX :
    - Design moderne avec coins arrondis et ombres
    - Couleurs contrastées pour accessibilité
    - Feedback visuel sur bouton (hover, active)
    - Layout responsive et centré
    - Typographie claire et hiérarchisée
    
     BONNES PRATIQUES RESPECTÉES :
    - DOCTYPE HTML5 en première ligne
    - Métadonnées complètes (charset, viewport, title)
    - Un seul H1 par page pour SEO
    - IDs uniques pour éléments JavaScript
    - Script placé en fin de body
    - Séparation HTML/CSS/JavaScript
    - Commentaires explicatifs détaillés
    - Structure sémantique et accessible
-->
