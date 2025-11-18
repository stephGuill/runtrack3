<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job05 - Footer Scroll Progress</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>📊 Exercice Footer Scroll Progress</h1>
        
        <div class="description">
            <strong>Objectif :</strong> Créer un footer fixe en bas de page qui change de couleur 
            selon le pourcentage de scroll, comme une barre de progression.
        </div>

        <div class="content">
            <h2>🎯 Fonctionnalités</h2>
            <p>• Body avec hauteur minimale de 4096px</p>
            <p>• Footer fixé en bas de la fenêtre</p>
            <p>• Couleur du footer qui évolue avec le scroll (0% → 100%)</p>
            <p>• Indicateur visuel du pourcentage de progression</p>

            <h2>📝 Instructions de test</h2>
            <p>Faites défiler la page vers le bas et observez :</p>
            <ul>
                <li>Le footer reste fixe en bas de la fenêtre</li>
                <li>Sa couleur change progressivement du rouge (0%) au vert (100%)</li>
                <li>Le pourcentage de scroll s'affiche en temps réel</li>
            </ul>

            <h2>🔧 Concepts techniques</h2>
            <p><strong>CSS :</strong> position: fixed, min-height, transition</p>
            <p><strong>JavaScript :</strong> événement scroll, calcul de pourcentage, manipulation de styles</p>
            <p><strong>DOM :</strong> window.scrollY, document.documentElement.scrollHeight</p>

            <div class="section">
                <h3>📐 Section 1 - Début du contenu</h3>
                <p>Cette page a une hauteur minimale de 4096px pour permettre un long scroll.</p>
                <p>Le footer en bas change de couleur en fonction de votre position de scroll.</p>
                <p>Continuez à faire défiler pour voir l'évolution de la couleur...</p>
            </div>

            <div class="section">
                <h3>🎨 Section 2 - Progression des couleurs</h3>
                <p>• 0% de scroll = Rouge (#ff4444)</p>
                <p>• 25% de scroll = Orange (#ff8844)</p>
                <p>• 50% de scroll = Jaune (#ffcc44)</p>
                <p>• 75% de scroll = Vert clair (#88ff44)</p>
                <p>• 100% de scroll = Vert (#44ff44)</p>
            </div>

            <div class="section">
                <h3>💻 Section 3 - Code technique</h3>
                <p>Le calcul du pourcentage de scroll utilise :</p>
                <code>
                    scrollPercent = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100
                </code>
                <p>La couleur est interpolée en HSL pour une transition fluide.</p>
            </div>

            <div class="section">
                <h3>🌈 Section 4 - Animation fluide</h3>
                <p>La transition CSS permet un changement de couleur en douceur :</p>
                <code>transition: background-color 0.1s ease;</code>
                <p>L'événement scroll met à jour la couleur en temps réel.</p>
            </div>

            <div class="section">
                <h3>📱 Section 5 - Responsive design</h3>
                <p>Le footer s'adapte à toutes les tailles d'écran.</p>
                <p>Le design fonctionne sur desktop, tablette et mobile.</p>
                <p>La position fixed garantit que le footer reste visible.</p>
            </div>

            <div class="section">
                <h3>🎯 Section 6 - Milieu du parcours</h3>
                <p>Vous devriez maintenant voir une couleur jaune/orange dans le footer.</p>
                <p>Continuez à descendre pour atteindre les couleurs vertes.</p>
                <p>L'indicateur de pourcentage vous montre votre progression exacte.</p>
            </div>

            <div class="section">
                <h3>🏃‍♂️ Section 7 - Vers la fin</h3>
                <p>Plus vous vous rapprochez de la fin, plus le footer devient vert.</p>
                <p>Cette technique est utilisée dans de nombreux sites web modernes.</p>
                <p>Elle donne un feedback visuel à l'utilisateur sur sa progression.</p>
            </div>

            <div class="section">
                <h3>🎉 Section 8 - Presque fini</h3>
                <p>Le footer devrait maintenant être d'un beau vert clair.</p>
                <p>Quelques pixels de plus et vous atteindrez 100% !</p>
                <p>L'expérience utilisateur est améliorée par ce feedback visuel.</p>
            </div>

            <div class="section">
                <h3>🏁 Section 9 - Ligne d'arrivée</h3>
                <p>Félicitations ! Vous avez atteint la fin du contenu.</p>
                <p>Le footer devrait maintenant être complètement vert (100%).</p>
                <p>Vous pouvez remonter pour voir la progression en sens inverse.</p>
            </div>

            <div class="final-section">
                <h2>✅ Exercice terminé</h2>
                <p>Vous avez testé avec succès le footer scroll progress !</p>
                <p>Remontez en haut pour voir la couleur revenir au rouge.</p>
            </div>
        </div>
    </div>

    <footer id="scrollFooter">
        <div class="footer-content">
            <span id="scrollPercent">0%</span>
            <span class="footer-text">Progress de scroll</span>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>