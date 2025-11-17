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
<!-- Elles configurent comment la page doit être traitée et affichée -->
<head>
    <!-- ==================== ENCODAGE DES CARACTÈRES ==================== -->
    <!-- charset="UTF-8" définit l'encodage pour afficher correctement les caractères -->
    <!-- UTF-8 permet d'afficher les accents français, emojis, caractères spéciaux, etc. -->
    <!-- TOUJOURS mettre cette balise en premier dans <head> -->
    <meta charset="UTF-8">
    
    <!-- ==================== CONFIGURATION RESPONSIVE ==================== -->
    <!-- viewport contrôle l'affichage sur les appareils mobiles -->
    <!-- width=device-width : la largeur s'adapte à l'écran de l'appareil -->
    <!-- initial-scale=1.0 : pas de zoom initial, taille normale -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ==================== TITRE DE L'ONGLET ==================== -->
    <!-- <title> définit le texte qui apparaît dans l'onglet du navigateur -->
    <!-- Ce titre est aussi utilisé par les moteurs de recherche -->
    <!-- Il n'apparaît PAS dans le contenu visible de la page -->
    <title>Job01 - Citation Console</title>
    
<!-- ==================== FIN DES MÉTADONNÉES ==================== -->
</head>

<!-- ==================== SECTION BODY (CONTENU VISIBLE) ==================== -->
<!-- <body> contient TOUT le contenu visible de la page web -->
<!-- Tout ce qui est dans <body> sera affiché à l'utilisateur -->
<body>
    <!-- ==================== TITRE PRINCIPAL ==================== -->
    <!-- <h1> définit un titre de niveau 1 (le plus important hiérarchiquement) -->
    <!-- Il devrait y avoir un seul <h1> par page pour le référencement -->
    <!-- Les navigateurs affichent <h1> en gros et en gras par défaut -->
    <h1>Citation dans la Console</h1>
    
    <!-- ==================== ARTICLE SÉMANTIQUE ==================== -->
    <!-- <article> est une balise sémantique HTML5 pour du contenu autonome -->
    <!-- id="citation" donne un identifiant UNIQUE à cet élément -->
    <!-- L'id permet à JavaScript de cibler précisément cet élément -->
    <!-- Le contenu "La vie a beaucoup plus d'imagination que nous" est le texte de base -->
    <article id="citation">La vie a beaucoup plus d'imagination que nous</article>
    
    <!-- ==================== ESPACEMENT VISUEL ==================== -->
    <!-- <br> crée un saut de ligne (line break) -->
    <!-- <br><br> crée deux sauts de ligne pour espacer les éléments -->
    <!-- C'est une méthode simple mais pas la plus élégante (CSS serait mieux) -->
    <br><br>
    
    <!-- ==================== BOUTON INTERACTIF ==================== -->
    <!-- <button> crée un bouton cliquable -->
    <!-- id="button" donne un identifiant unique pour JavaScript -->
    <!-- Le texte entre <button> et </button> s'affiche sur le bouton -->
    <!-- IMPORTANT : aucun attribut onclick ici, on utilise JavaScript externe -->
    <button id="button">Afficher la citation</button>
    
    <!-- ==================== AUTRE ESPACEMENT ==================== -->
    <br><br>
    
    <!-- ==================== ZONE D'AFFICHAGE DYNAMIQUE ==================== -->
    <!-- Commentaire HTML : visible dans le code source mais pas sur la page -->
    <!-- Zone où la citation sera affichée -->
    
    <!-- <div> est un conteneur générique sans signification sémantique -->
    <!-- id="affichage-citation" permet à JavaScript de cibler cet élément -->
    <!-- style= contient du CSS inline (dans le HTML) pour styler l'élément -->
    <!-- font-style: italic = texte en italique -->
    <!-- font-size: 18px = taille de police de 18 pixels -->
    <!-- color: #333 = couleur gris foncé (notation hexadécimale) -->
    <!-- padding: 10px = espacement intérieur de 10 pixels -->
    <!-- border: 1px solid #ddd = bordure fine gris clair -->
    <!-- background-color: #f9f9f9 = fond gris très clair -->
    <!-- display: none = élément CACHÉ par défaut (invisible) -->
    <div id="affichage-citation" style="font-style: italic; font-size: 18px; color: #333; padding: 10px; border: 1px solid #ddd; background-color: #f9f9f9; display: none;"></div>
    
    <!-- ==================== INCLUSION DU JAVASCRIPT ==================== -->
    <!-- <script src="script.js"> inclut un fichier JavaScript externe -->
    <!-- src= indique le chemin vers le fichier (ici dans le même dossier) -->
    <!-- Cette balise doit être placée à la FIN de <body> -->
    <!-- Pourquoi à la fin ? Pour que tous les éléments HTML existent -->
    <!-- avant que JavaScript essaie de les manipuler -->
    <script src="script.js"></script>
    
<!-- ==================== FIN DU CONTENU VISIBLE ==================== -->
</body>

<!-- ==================== FIN DU DOCUMENT HTML ==================== -->
</html>
