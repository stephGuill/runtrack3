<!-- ==================== DÉCLARATION DU TYPE DE DOCUMENT ==================== -->
<!-- FR: Déclare que ce fichier est un document HTML5 -->
<!-- EN: Declares that this file is an HTML5 document -->
<!DOCTYPE html>

<!-- ==================== BALISE HTML PRINCIPALE ==================== -->
<!-- FR: Balise racine du document avec l'attribut lang="fr" pour indiquer que le contenu est en français -->
<!-- EN: Root HTML tag with lang="fr" attribute to indicate French content -->
<html lang="fr">

<!-- ==================== EN-TÊTE DU DOCUMENT (HEAD) ==================== -->
<!-- FR: Contient les métadonnées et les liens vers les ressources (CSS, scripts) -->
<!-- EN: Contains metadata and links to resources (CSS, scripts) -->
<head>
    <!-- FR: Définit l'encodage des caractères en UTF-8 pour supporter les caractères spéciaux -->
    <!-- EN: Sets character encoding to UTF-8 to support special characters -->
    <meta charset="UTF-8">
    
    <!-- FR: Configure la responsive design - la largeur correspond à la largeur de l'appareil -->
    <!-- EN: Configures responsive design - width matches device width -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- FR: Titre de la page affiché dans l'onglet du navigateur -->
    <!-- EN: Page title displayed in browser tab -->
    <title>Job07 - Code Konami Bleu</title>
    
    <!-- FR: Lien vers la première feuille de style CSS pour les boutons -->
    <!-- EN: Link to first CSS stylesheet for buttons -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- FR: Lien vers la seconde feuille de style CSS pour l'effet Konami -->
    <!-- EN: Link to second CSS stylesheet for Konami effect -->
    <link rel="stylesheet" href="assets/css/konami.css">
</head>

<!-- ==================== CORPS DU DOCUMENT (BODY) ==================== -->
<!-- FR: Contient tout le contenu visible de la page -->
<!-- EN: Contains all visible page content -->
<body>
    <!-- ==================== CONTENU INITIAL VISIBLE ==================== -->
    <!-- FR: Ce contenu est visible dès le chargement de la page -->
    <!-- EN: This content is visible on page load -->
    
    <!-- FR: Conteneur principal pour le contenu initial avec la classe "initial-content" -->
    <!-- EN: Main container for initial content with "initial-content" class -->
    <div class="initial-content">
        <!-- ==================== INSTRUCTIONS DU CODE KONAMI ==================== -->
        <!-- FR: Conteneur avec les instructions pour activer le code Konami -->
        <!-- EN: Container with instructions to activate Konami code -->
        <div class="konami-instructions">
            <!-- FR: Titre principal de niveau 1 pour le challenge Konami -->
            <!-- EN: Level 1 main heading for Konami challenge -->
            <h1> CODE KONAMI CHALLENGE </h1>
            
            <!-- FR: Paragraphe avec texte en gras via la balise <strong> -->
            <!-- EN: Paragraph with bold text using <strong> tag -->
            <p><strong>Tapez la séquence :</strong></p>
            
            <!-- FR: Paragraphe avec style inline - taille 2em et couleur jaune (#ffff00) pour les flèches -->
            <!-- EN: Paragraph with inline style - 2em size and yellow color (#ffff00) for arrows -->
            <p style="font-size: 2em; color: #ffff00;">↑ ↑ ↓ ↓ ← → ← → B A</p>
            
            <!-- FR: Paragraphe expliquant l'alternative au clavier -->
            <!-- EN: Paragraph explaining keyboard alternative -->
            <p>OU cliquez sur le bouton ci-dessous !</p>
        </div>
        
        <!-- ==================== BOUTON PRINCIPAL KONAMI ==================== -->
        <!-- FR: Bouton avec classe CSS et événement onclick qui appelle la fonction JavaScript activateKonamiMode() -->
        <!-- EN: Button with CSS class and onclick event calling activateKonamiMode() JavaScript function -->
        <!-- FR: <br> crée un saut de ligne dans le texte du bouton -->
        <!-- EN: <br> creates a line break in button text -->
        <button class="konami-trigger-button" onclick="activateKonamiMode()">
            ACTIVER<br>LA PLATEFORME_
        </button>
        
        <!-- ==================== BOUTON DE TEST DIRECT ==================== -->
        <!-- FR: Bouton de débogage rouge pour activer directement le mode Konami sans taper la séquence -->
        <!-- EN: Red debug button to directly activate Konami mode without typing sequence -->
        <!-- FR: Style inline avec fond rouge, texte blanc, padding, taille de police, sans bordure, coins arrondis, marge et curseur pointer -->
        <!-- EN: Inline style with red background, white text, padding, font size, no border, rounded corners, margin and pointer cursor -->
        <button onclick="forceActivation()" style="background: #ff0000; color: white; padding: 20px 40px; font-size: 1.5em; border: none; border-radius: 15px; margin: 20px; cursor: pointer;">
             ACTIVATION FORCE
        </button>
        
        <!-- ==================== BOUTON DE TEST CSS ==================== -->
        <!-- FR: Bouton de débogage vert pour tester les styles CSS -->
        <!-- EN: Green debug button to test CSS styles -->
        <!-- FR: Style inline avec fond vert, texte noir, autres propriétés similaires au bouton précédent -->
        <!-- EN: Inline style with green background, black text, other properties similar to previous button -->
        <button onclick="testCSS()" style="background: #00ff00; color: black; padding: 15px 30px; font-size: 1.2em; border: none; border-radius: 10px; margin: 10px; cursor: pointer;">
             TEST CSS
        </button>
        
        <!-- ==================== ZONE DE TEST - BOUTONS D'URGENCE ==================== -->
        <!-- FR: Section de débogage avec fond rouge transparent pour tester chaque touche individuellement -->
        <!-- EN: Debug section with transparent red background to test each key individually -->
        <!-- FR: Style inline : marges verticales 30px, padding 20px, fond rouge transparent (rgba), coins arrondis 15px -->
        <!-- EN: Inline style: 30px vertical margins, 20px padding, transparent red background (rgba), 15px rounded corners -->
        <div style="margin: 30px 0; padding: 20px; background: rgba(255,0,0,0.1); border-radius: 15px;">
            <!-- FR: Titre de niveau 3 en rouge pour indiquer le mode test -->
            <!-- EN: Level 3 heading in red to indicate test mode -->
            <h3 style="color: #ff0000; margin-bottom: 15px;"> MODE TEST - Cliquez les boutons dans l'ordre :</h3>
            
            <!-- FR: Conteneur flex pour aligner les boutons horizontalement avec retour à la ligne (flex-wrap) -->
            <!-- EN: Flex container to align buttons horizontally with wrapping (flex-wrap) -->
            <!-- FR: gap: 10px crée un espacement de 10px entre les boutons -->
            <!-- EN: gap: 10px creates 10px spacing between buttons -->
            <div style="display: flex; flex-wrap: wrap; gap: 10px; justify-content: center;">
                <!-- FR: Bouton flèche HAUT - appelle simulateKey(38) où 38 est le code de la touche ↑ -->
                <!-- EN: UP arrow button - calls simulateKey(38) where 38 is the ↑ key code -->
                <button onclick="simulateKey(38)" style="padding: 10px; font-size: 1.2em; background: #0062ff; color: white; border: none; border-radius: 8px;">↑</button>
                
                <!-- FR: Second bouton flèche HAUT (la séquence nécessite deux fois ↑) -->
                <!-- EN: Second UP arrow button (sequence requires ↑ twice) -->
                <button onclick="simulateKey(38)" style="padding: 10px; font-size: 1.2em; background: #0062ff; color: white; border: none; border-radius: 8px;">↑</button>
                
                <!-- FR: Bouton flèche BAS - code 40 pour la touche ↓ -->
                <!-- EN: DOWN arrow button - code 40 for ↓ key -->
                <button onclick="simulateKey(40)" style="padding: 10px; font-size: 1.2em; background: #0062ff; color: white; border: none; border-radius: 8px;">↓</button>
                
                <!-- FR: Second bouton flèche BAS -->
                <!-- EN: Second DOWN arrow button -->
                <button onclick="simulateKey(40)" style="padding: 10px; font-size: 1.2em; background: #0062ff; color: white; border: none; border-radius: 8px;">↓</button>
                
                <!-- FR: Bouton flèche GAUCHE - code 37 pour la touche ← -->
                <!-- EN: LEFT arrow button - code 37 for ← key -->
                <button onclick="simulateKey(37)" style="padding: 10px; font-size: 1.2em; background: #0062ff; color: white; border: none; border-radius: 8px;">←</button>
                
                <!-- FR: Bouton flèche DROITE - code 39 pour la touche → -->
                <!-- EN: RIGHT arrow button - code 39 for → key -->
                <button onclick="simulateKey(39)" style="padding: 10px; font-size: 1.2em; background: #0062ff; color: white; border: none; border-radius: 8px;">→</button>
                
                <!-- FR: Second bouton flèche GAUCHE -->
                <!-- EN: Second LEFT arrow button -->
                <button onclick="simulateKey(37)" style="padding: 10px; font-size: 1.2em; background: #0062ff; color: white; border: none; border-radius: 8px;">←</button>
                
                <!-- FR: Second bouton flèche DROITE -->
                <!-- EN: Second RIGHT arrow button -->
                <button onclick="simulateKey(39)" style="padding: 10px; font-size: 1.2em; background: #0062ff; color: white; border: none; border-radius: 8px;">→</button>
                
                <!-- FR: Bouton B en rouge - code 66 pour la touche B (avant-dernière touche) -->
                <!-- EN: B button in red - code 66 for B key (second to last key) -->
                <button onclick="simulateKey(66)" style="padding: 10px; font-size: 1.2em; background: #ff0000; color: white; border: none; border-radius: 8px;">B</button>
                
                <!-- FR: Bouton A en rouge - code 65 pour la touche A (dernière touche de la séquence) -->
                <!-- EN: A button in red - code 65 for A key (last key in sequence) -->
                <button onclick="simulateKey(65)" style="padding: 10px; font-size: 1.2em; background: #ff0000; color: white; border: none; border-radius: 8px;">A</button>
            </div>
            
            <!-- FR: Bouton RESET gris pour réinitialiser la séquence Konami -->
            <!-- EN: Gray RESET button to reset Konami sequence -->
            <button onclick="resetSequence()" style="margin-top: 15px; padding: 10px 20px; background: #999; color: white; border: none; border-radius: 8px;">RESET</button>
        </div>
        
        <!-- ==================== ZONE D'INFORMATIONS ET PROGRESSION ==================== -->
        <!-- FR: Boîte d'information avec fond blanc transparent (90% d'opacité), texte bleu et gras -->
        <!-- EN: Information box with transparent white background (90% opacity), blue and bold text -->
        <div style="margin-top: 30px; padding: 20px; background: rgba(255,255,255,0.9); border-radius: 15px; color: #0062ff; font-weight: bold;">
            <!-- FR: Paragraphe expliquant l'objectif du jeu -->
            <!-- EN: Paragraph explaining the game objective -->
            <p> Objectif : Découvrir le contenu secret bleu #0062ff</p>
            
            <!-- FR: Paragraphe de conseil avec taille de police réduite (0.9em) et couleur grise -->
            <!-- EN: Hint paragraph with reduced font size (0.9em) and gray color -->
            <p style="font-size: 0.9em; color: #666;"> Conseil : Ouvrez la console (F12) pour voir la progression !</p>
            
            <!-- FR: Div avec ID unique "konami-visual-progress" pour afficher la progression en temps réel -->
            <!-- EN: Div with unique ID "konami-visual-progress" to display real-time progress -->
            <!-- FR: Cet ID permet de cibler cet élément en JavaScript pour le mettre à jour -->
            <!-- EN: This ID allows targeting this element in JavaScript for updates -->
            <div id="konami-visual-progress" style="margin-top: 15px; font-size: 1.2em; color: #0062ff;">
                <!-- FR: Texte en gras affichant la progression (0/10 au départ) -->
                <!-- EN: Bold text displaying progress (0/10 at start) -->
                <strong>Progression: 0/10</strong><br>
                
                <!-- FR: Div interne montrant visuellement la séquence Konami complète -->
                <!-- EN: Inner div visually showing complete Konami sequence -->
                <!-- FR: Taille réduite (0.8em) et couleur grise (#999) -->
                <!-- EN: Reduced size (0.8em) and gray color (#999) -->
                <div style="font-size: 0.8em; color: #999;">↑↑↓↓←→←→BA</div>
            </div>
        </div>
    </div>
    <!-- FR: Fin du conteneur initial-content -->
    </div>

    <!-- ==================== CONTENU CACHÉ (RÉVÉLÉ PAR LE CODE KONAMI) ==================== -->
    <!-- FR: Ce contenu est masqué par défaut (display: none en CSS) -->
    <!-- EN: This content is hidden by default (display: none in CSS) -->
    <!-- FR: La classe "hidden-content" le cache jusqu'à ce que le code Konami soit activé -->
    <!-- EN: The "hidden-content" class hides it until Konami code is activated -->
    <div class="hidden-content">
        <!-- FR: Conteneur principal avec la classe "plateforme-container" pour le contenu secret -->
        <!-- EN: Main container with "plateforme-container" class for secret content -->
        <div class="plateforme-container">
            <!-- FR: Titre principal de niveau 1 - Nom de La Plateforme_ -->
            <!-- EN: Level 1 main heading - La Plateforme_ name -->
            <h1 class="plateforme-title">LA PLATEFORME_</h1>
            
            <!-- FR: Sous-titre confirmant l'activation avec emoji manette de jeu 🎮 -->
            <!-- EN: Subtitle confirming activation with game controller emoji 🎮 -->
            <p class="plateforme-subtitle"> Code Konami Activé avec Succès ! 🎮</p>
            
            <!-- ==================== SECTION FÉLICITATIONS ==================== -->
            <!-- FR: Première section avec message de félicitations -->
            <!-- EN: First section with congratulations message -->
            <div class="plateforme-section">
                <!-- FR: Titre de section de niveau 2 -->
                <!-- EN: Level 2 section heading -->
                <h2 class="section-title"> Félicitations !</h2>
                
                <!-- FR: Paragraphe expliquant la réussite avec la séquence en gras -->
                <!-- EN: Paragraph explaining success with sequence in bold -->
                <p class="plateforme-text">
                    Vous avez découvert le secret de cette page en utilisant le légendaire code Konami : 
                    <strong>↑ ↑ ↓ ↓ ← → ← → B A</strong>
                </p>
                
                <!-- FR: Second paragraphe de bienvenue -->
                <!-- EN: Second welcome paragraph -->
                <p class="plateforme-text">
                    Bienvenue dans l'univers de La Plateforme_, où l'innovation rencontre l'excellence 
                    dans la formation tech !
                </p>
            </div>

            <!-- ==================== GRILLE DE CARTES ==================== -->
            <!-- FR: Conteneur Grid (grille CSS) pour afficher 3 cartes côte à côte -->
            <!-- EN: Grid container (CSS Grid) to display 3 cards side by side -->
            <!-- FR: La classe "plateforme-grid" utilise display: grid en CSS -->
            <!-- EN: The "plateforme-grid" class uses display: grid in CSS -->
            <div class="plateforme-grid">
                <!-- ==================== CARTE 1 : FORMATION TECH ==================== -->
                <!-- FR: Première carte avec informations sur la formation -->
                <!-- EN: First card with training information -->
                <div class="plateforme-card">
                    <!-- FR: Titre de niveau 3 pour la carte -->
                    <!-- EN: Level 3 heading for the card -->
                    <h3 class="card-title"> Formation Tech</h3>
                    
                    <!-- FR: Texte descriptif de la carte -->
                    <!-- EN: Card descriptive text -->
                    <p class="card-text">
                        Développement web, mobile et logiciel avec les technologies les plus récentes 
                        et les méthodes pédagogiques innovantes.
                    </p>
                    
                    <!-- FR: Bouton d'action avec la classe "plateforme-button" -->
                    <!-- EN: Action button with "plateforme-button" class -->
                    <button class="plateforme-button">Découvrir</button>
                </div>
                
                <!-- ==================== CARTE 2 : INNOVATION ==================== -->
                <!-- FR: Deuxième carte sur l'innovation -->
                <!-- EN: Second card about innovation -->
                <div class="plateforme-card">
                    <h3 class="card-title"> Innovation</h3>
                    <p class="card-text">
                        Projets avant-gardistes et accompagnement personnalisé vers l'entrepreneuriat 
                        dans l'écosystème technologique.
                    </p>
                    <button class="plateforme-button">Explorer</button>
                </div>
                
                <!-- ==================== CARTE 3 : COMMUNAUTÉ ==================== -->
                <!-- FR: Troisième carte sur la communauté -->
                <!-- EN: Third card about community -->
                <div class="plateforme-card">
                    <h3 class="card-title"> Communauté</h3>
                    <p class="card-text">
                        Rejoignez un réseau de développeurs passionnés, bienveillants et 
                        toujours prêts à partager leurs connaissances.
                    </p>
                    <button class="plateforme-button">Rejoindre</button>
                </div>
            </div>
            <!-- FR: Fin de la grille de cartes -->
            <!-- EN: End of cards grid -->

            <!-- ==================== SECTION NOTRE MISSION ==================== -->
            <!-- FR: Section décrivant la mission de La Plateforme_ -->
            <!-- EN: Section describing La Plateforme_'s mission -->
            <div class="plateforme-section">
                <h2 class="section-title"> Notre Mission</h2>
                
                <!-- FR: Paragraphe avec le texte de la mission -->
                <!-- EN: Paragraph with mission text -->
                <p class="plateforme-text">
                    La Plateforme_ forme les développeurs de demain en combinant excellence technique, 
                    créativité débordante et esprit collaboratif. Nous privilégions l'apprentissage 
                    par la pratique, l'innovation constante et l'accompagnement personnalisé de chaque apprenant.
                </p>
            </div>

            <!-- ==================== SECTION STACK TECHNOLOGIQUE ==================== -->
            <!-- FR: Section listant toutes les technologies enseignées -->
            <!-- EN: Section listing all technologies taught -->
            <div class="plateforme-section">
                <h2 class="section-title"> Stack Technologique</h2>
                
                <!-- FR: Paragraphe avec liste des technologies organisée par catégorie -->
                <!-- EN: Paragraph with technology list organized by category -->
                <!-- FR: <strong> met en gras les noms de catégories -->
                <!-- EN: <strong> makes category names bold -->
                <!-- FR: <br> crée un saut de ligne entre chaque catégorie -->
                <!-- EN: <br> creates line break between each category -->
                <p class="plateforme-text">
                    <strong>Frontend :</strong> HTML5, CSS3, JavaScript (ES6+), React, Vue.js, Angular<br>
                    <strong>Backend :</strong> PHP, Python, Node.js, Java, C#<br>
                    <strong>Bases de données :</strong> MySQL, PostgreSQL, MongoDB<br>
                    <strong>DevOps :</strong> Git, Docker, CI/CD, Cloud (AWS, Azure)<br>
                    <strong>Mobile :</strong> React Native, Flutter, Swift, Kotlin
                </p>
            </div>

            <!-- ==================== FOOTER (PIED DE PAGE) ==================== -->
            <!-- FR: Section de pied de page avec message de remerciement -->
            <!-- EN: Footer section with thank you message -->
            <div class="plateforme-footer">
                <!-- FR: Titre de niveau 3 pour le footer -->
                <!-- EN: Level 3 heading for footer -->
                <h3 class="footer-title"> Merci d'avoir découvert notre secret ! </h3>
                
                <!-- FR: Paragraphe de remerciement avec <br> pour saut de ligne -->
                <!-- EN: Thank you paragraph with <br> for line break -->
                <p class="footer-text">
                    Vous venez de vivre une expérience unique avec le code Konami.<br>
                    Rechargez la page pour recommencer l'aventure depuis le début !
                </p>
            </div>
        </div>
        <!-- FR: Fin du conteneur plateforme-container -->
        <!-- EN: End of plateforme-container -->
    </div>
    <!-- FR: Fin du conteneur hidden-content -->
    <!-- EN: End of hidden-content container -->

    <!-- ==================== INDICE DISCRET POUR LE CODE KONAMI ==================== -->
    <!-- FR: Petit indice fixé en bas à droite de la page (position: fixed en CSS) -->
    <!-- EN: Small hint fixed at bottom right of page (position: fixed in CSS) -->
    <!-- FR: Affiche discrètement la séquence Konami complète -->
    <!-- EN: Discreetly displays complete Konami sequence -->
    <div class="konami-hint">
        ↑↑↓↓←→←→BA
    </div>

    <!-- ==================== SCRIPT JAVASCRIPT ==================== -->
    <!-- FR: Balise <script> qui charge le fichier JavaScript externe "script.js" -->
    <!-- EN: <script> tag that loads external JavaScript file "script.js" -->
    <!-- FR: Ce fichier contient toute la logique du code Konami -->
    <!-- EN: This file contains all Konami code logic -->
    <!-- FR: src="script.js" indique le chemin relatif vers le fichier -->
    <!-- EN: src="script.js" indicates relative path to the file -->
    <script src="script.js"></script>
</body>
<!-- FR: Fin du corps du document -->
<!-- EN: End of document body -->
</html>
<!-- FR: Fin du document HTML -->
<!-- EN: End of HTML document -->