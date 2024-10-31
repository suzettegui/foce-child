document.addEventListener('DOMContentLoaded', function () {
    // Partie 1 : Observer les titres et appliquer l'animation d'apparition
    const titles = document.querySelectorAll('h2 span, h3 span');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('title-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    titles.forEach(title => {
        observer.observe(title);
    });

    // Partie 2 : Effet de parallaxe pour le logo flottant et la vidéo
    const floatingLogo = document.querySelector('.floating-logo');
    const videoContainer = document.querySelector('.video-container');
    const video = document.querySelector('.video-container video'); // La vidéo elle-même

    // Vérification de l'autoplay de la vidéo
    video.play().catch(error => {
        console.log('Autoplay bloqué par le navigateur, tentative de relancer la vidéo.');
        video.setAttribute('muted', 'true'); // Assurez-vous que la vidéo est en sourdine
        video.play();
    });

    window.addEventListener('scroll', function () {
        const scrollY = window.scrollY;

        // Appliquer l'effet de parallaxe au logo flottant
        if (floatingLogo) {
            floatingLogo.style.transform = `translate(-50%, calc(-50% + ${scrollY * 0.5}px))`;
        }

        // Appliquer l'effet de parallaxe à la vidéo (plus lent pour ne pas perturber la boucle)
        if (videoContainer) {
            videoContainer.style.transform = `translateY(${scrollY * 0.1}px)`; // Réduire l'intensité de la parallaxe
        }
    });
});
