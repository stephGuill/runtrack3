<!-- ==================== DÉCLARATION DE TYPE DE DOCUMENT ==================== -->
<!-- DOCTYPE html informe le navigateur qu'il s'agit d'un document HTML5 -->
<!-- Cette déclaration doit TOUJOURS être la première ligne d'un fichier HTML -->
<!-- Elle active le mode standard du navigateur et assure une interprétation correcte -->
<!DOCTYPE html>

<!-- ==================== ÉLÉMENT RACINE HTML ==================== -->
<!-- <html> est l'élément racine qui contient TOUT le contenu de la page -->
<!-- lang="fr" indique au navigateur que le contenu principal est en français -->
<!-- Cet attribut aide les moteurs de recherche et les lecteurs d'écran -->
<html lang="fr">

<!-- ==================== SECTION HEAD (MÉTADONNÉES) ==================== -->
<!-- <head> contient les métadonnées : informations POUR le navigateur -->
<!-- Ces informations ne sont PAS affichées directement à l'utilisateur -->
<head>
    <!-- ==================== ENCODAGE DES CARACTÈRES ==================== -->
    <!-- charset="UTF-8" définit l'encodage pour afficher correctement les caractères -->
    <!-- UTF-8 permet d'afficher les accents français, emojis, caractères spéciaux, etc. -->
    <meta charset="UTF-8">
    
    <!-- ==================== CONFIGURATION RESPONSIVE ==================== -->
    <!-- viewport contrôle l'affichage sur les appareils mobiles -->
    <!-- width=device-width : la largeur s'adapte à l'écran de l'appareil -->
    <!-- initial-scale=1.0 : pas de zoom initial, taille normale -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ==================== TITRE DE L'ONGLET ==================== -->
    <!-- <title> définit le texte qui apparaît dans l'onglet du navigateur -->
    <!-- Ce titre est aussi utilisé par les moteurs de recherche -->
    <title>Job02 - Afficher/Masquer Article</title>
    
<!-- ==================== FIN DES MÉTADONNÉES ==================== -->
</head>

<!-- ==================== SECTION BODY (CONTENU VISIBLE) ==================== -->
<!-- <body> contient TOUT le contenu visible de la page web -->
<body>
    <!-- ==================== TITRE PRINCIPAL ==================== -->
    <!-- <h1> définit un titre de niveau 1 (le plus important hiérarchiquement) -->
    <!-- Il devrait y avoir un seul <h1> par page pour le référencement -->
    <h1>Afficher/Masquer Article</h1>
    
    <!-- ==================== BOUTON INTERACTIF ==================== -->
    <!-- <button> crée un bouton cliquable -->
    <!-- id="button" donne un identifiant UNIQUE à cet élément -->
    <!-- L'id permet à JavaScript de cibler précisément cet élément -->
    <!-- Le texte "Afficher/Masquer" s'affiche sur le bouton -->
    <!-- IMPORTANT : aucun attribut onclick ici, on utilise JavaScript externe -->
    <button id="button">Afficher/Masquer</button>
    
    <!-- ==================== ESPACEMENT VISUEL ==================== -->
    <!-- <br> crée un saut de ligne (line break) -->
    <!-- <br><br> crée deux sauts de ligne pour espacer les éléments -->
    <br><br>
    
    <!-- ==================== COMMENTAIRE HTML ==================== -->
    <!-- Ceci est un commentaire HTML, visible dans le code source mais pas sur la page -->
    <!-- Les commentaires aident à documenter le code pour les développeurs -->
    <!-- Conteneur où l'article sera ajouté/supprimé dynamiquement -->
    
    <!-- ==================== CONTENEUR POUR CONTENU DYNAMIQUE ==================== -->
    <!-- <div> est un conteneur générique sans signification sémantique particulière -->
    <!-- id="container" donne un identifiant unique pour JavaScript -->
    <!-- Ce div est initialement VIDE (pas de contenu entre <div> et </div>) -->
    <!-- JavaScript va dynamiquement ajouter ou supprimer du contenu dans ce conteneur -->
    <!-- C'est ici que l'article apparaîtra et disparaîtra selon les clics -->
    <div id="container"></div>
    
    <!-- ==================== INCLUSION DU JAVASCRIPT ==================== -->
    <!-- <script src="script.js"> inclut un fichier JavaScript externe -->
    <!-- src= indique le chemin vers le fichier (ici dans le même dossier) -->
    <!-- Cette balise doit être placée à la FIN de <body> -->
    <!-- Pourquoi à la fin ? Pour que tous les éléments HTML existent -->
    <!-- avant que JavaScript essaie de les manipuler avec getElementById() -->
    <script src="script.js"></script>
    
<!-- ==================== FIN DU CONTENU VISIBLE ==================== -->
</body>

<!-- ==================== FIN DU DOCUMENT HTML ==================== -->
</html>

<!-- ==================== STRUCTURE ET RÔLES DES ÉLÉMENTS ==================== -->
<!-- 
    HIÉRARCHIE DU DOCUMENT :
    html (racine)
    ├── head (métadonnées)
    │   ├── meta charset (encodage)
    │   ├── meta viewport (responsive)
    │   └── title (titre onglet)
    └── body (contenu visible)
        ├── h1 (titre principal)
        ├── button#button (bouton interactif)
        ├── br (espacement)
        ├── div#container (conteneur dynamique)
        └── script (JavaScript)

    ÉLÉMENTS CIBLÉS PAR JAVASCRIPT :
    - button#button : récupéré pour attacher l'événement onclick
    - div#container : récupéré pour ajouter/supprimer l'article

    FLUX D'INTERACTION :
    1. L'utilisateur voit le bouton "Afficher/Masquer"
    2. Le conteneur est vide au chargement
    3. Premier clic → l'article apparaît dans le conteneur
    4. Deuxième clic → l'article disparaît du conteneur
    5. Le cycle se répète indéfiniment
-->
