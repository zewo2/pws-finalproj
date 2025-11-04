document.addEventListener('DOMContentLoaded', function() {
    const genreTabs = document.querySelectorAll('.genre-tab');
    const genreCarousels = document.querySelectorAll('.genre-carousel');

    genreTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Update active tab
            genreTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            // Get the selected genre
            const genre = this.getAttribute('data-genre');

            // Hide all genre carousels
            genreCarousels.forEach(carousel => {
                carousel.classList.add('d-none');
            });

            // Show the selected genre carousel
            const targetCarousel = document.querySelector(`.genre-carousel[data-genre="${genre}"]`);
            if (targetCarousel) {
                targetCarousel.classList.remove('d-none');

                // Reset carousel to first slide
                const carouselInstance = bootstrap.Carousel.getInstance(targetCarousel) || new bootstrap.Carousel(targetCarousel);
                carouselInstance.to(0);
            }
        });
    });
});
