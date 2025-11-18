// Variable globale pour stocker la valeur du compteur
var compteur = 0;

// Fonction addone qui incrémente le compteur et met à jour l'affichage
function addone() {
    // Incrémenter la valeur du compteur
    compteur++;
    
    // Récupérer l'élément HTML avec l'id "compteur"
    var elementCompteur = document.getElementById("compteur");
    
    // Mettre à jour le contenu texte de l'élément
    elementCompteur.textContent = compteur;
}

// Attendre que la page soit chargée avant d'ajouter l'événement
window.onload = function() {
    // Récupérer l'élément bouton avec l'id "button"
    var bouton = document.getElementById("button");
    
    // Ajouter un événement de clic au bouton avec addEventListener
    // IMPORTANT : on n'utilise PAS onclick dans le HTML
    bouton.addEventListener("click", addone);
};
