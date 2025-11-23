// Variable globale pour stocker la valeur du compteur
var compteur = 0;

// Message de confirmation du chargement du script
console.log("✅ Script chargé avec succès !");
console.log("Valeur initiale du compteur:", compteur);

// Fonction addone qui incrémente le compteur et met à jour l'affichage
function addone() {
    console.log("🔄 Fonction addone() appelée");
    console.log("Valeur du compteur AVANT incrémentation:", compteur);
    
    // Incrémenter la valeur du compteur
    compteur++;
    
    console.log("Valeur du compteur APRÈS incrémentation:", compteur);
    
    // Récupérer l'élément HTML avec l'id "compteur"
    var elementCompteur = document.getElementById("compteur");
    
    // Vérifier que l'élément existe
    if (elementCompteur) {
        console.log("✅ Élément #compteur trouvé");
        // Mettre à jour le contenu texte de l'élément
        elementCompteur.textContent = compteur;
        console.log("✅ Affichage mis à jour avec la valeur:", compteur);
    } else {
        console.error("❌ ERREUR : Élément avec id='compteur' introuvable !");
    }
}

// Attendre que la page soit chargée avant d'ajouter l'événement
window.onload = function() {
    console.log("📄 Page chargée complètement ! Initialisation...");
    
    // Récupérer l'élément bouton avec l'id "button"
    var bouton = document.getElementById("button");
    
    // Vérifier que le bouton existe
    if (bouton) {
        console.log("✅ Bouton trouvé avec succès !");
        // Ajouter un événement de clic au bouton avec addEventListener
        // IMPORTANT : on n'utilise PAS onclick dans le HTML
        bouton.addEventListener("click", addone);
        console.log("🔗 Événement click attaché au bouton");
        console.log("👆 Cliquez sur le bouton pour incrémenter le compteur !");
    } else {
        console.error("❌ ERREUR : Bouton avec id='button' introuvable !");
    }
};
