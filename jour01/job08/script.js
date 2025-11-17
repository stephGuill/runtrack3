/**
 * Teste si n est un nombre premier.
 * @param {number} n
 * @returns {boolean}
 */
function isPrime(n) {
    const num = Number(n);
    if (!Number.isFinite(num) || !Number.isInteger(num) || num < 2) return false;
    if (num === 2) return true;
    if (num % 2 === 0) return false;
    const limit = Math.floor(Math.sqrt(num));
    for (let i = 3; i <= limit; i += 2) {
        if (num % i === 0) return false;
    }
    return true;
}

/**
 * Retourne la somme de a et b si les deux sont des nombres premiers entiers >= 2.
 * Sinon retourne false.
 * Ne fait aucun affichage dans la console.
 * @param {number} a
 * @param {number} b
 * @returns {number|boolean}
 */
function sommenombrespremiers(a, b) {
    if (!isPrime(a) || !isPrime(b)) return false;
    return Number(a) + Number(b);
}

// Exposer la fonction pour tests interactifs si nécessaire (ne génère pas d'affichage)
window.sommenombrespremiers = sommenombrespremiers;

// Gestion du formulaire (affichage sur la page, pas dans la console)
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('prime-form');
    const resultEl = document.getElementById('result');
    if (!form || !resultEl) return; // nothing to do if elements missing

    form.addEventListener('submit', function (ev) {
        ev.preventDefault();
        const aValue = form.elements['a'].value;
        const bValue = form.elements['b'].value;

        // Convertir en nombres
        const aNum = Number(aValue);
        const bNum = Number(bValue);

        const res = sommenombrespremiers(aNum, bNum);
        if (res === false) {
            resultEl.textContent = 'false (au moins un des nombres n\u0027est pas premier)';
            resultEl.style.color = 'crimson';
        } else {
            resultEl.textContent = String(res);
            resultEl.style.color = 'green';
        }
    });
});