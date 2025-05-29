document.addEventListener('DOMContentLoaded', function() {
    const genreTabs = document.querySelectorAll('.genre-tab');
    const carouselItems = document.querySelectorAll('#genreMoviesCarousel .carousel-item');

    genreTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Update active tab
            genreTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            // Find corresponding carousel item
            const genre = this.getAttribute('data-genre');
            const targetItem = document.querySelector(`#genreMoviesCarousel .carousel-item[data-genre="${genre}"]`);

            // Activate the carousel item
            const carousel = new bootstrap.Carousel(document.getElementById('genreMoviesCarousel'));
            const itemIndex = Array.from(carouselItems).indexOf(targetItem);
            carousel.to(itemIndex);
        });
    });
});
