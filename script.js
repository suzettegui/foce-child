document.addEventListener('DOMContentLoaded', function () {
    // Sélectionne tous les titres h2 et h3
    const titles = document.querySelectorAll('h2, h3');
    console.log('Titres sélectionnés :', titles); // Vérification de la sélection des titres

    // Créer un observateur pour détecter l'entrée dans la vue
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                console.log('Titre visible :', entry.target); // Log lorsque le titre devient visible
                entry.target.classList.add('visible'); // Ajouter la classe .visible pour déclencher l'animation
                observer.unobserve(entry.target); // Arrête d'observer cet élément après l'apparition
            }
        });
    }, { threshold: 0.1 }); // Déclenche lorsque 10% du titre est visible

    // Observer chaque titre
    titles.forEach(title => {
        observer.observe(title);
        console.log('Observation démarrée pour :', title); // Log pour chaque titre observé
    });
});

