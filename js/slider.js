document.addEventListener("DOMContentLoaded", function() {
    var sliderItems = document.querySelectorAll(".slider-item");
    var currentSlide = 0;

    function showSlide(slideIndex) {
        // Ocultar todas las imágenes
        for (var i = 0; i < sliderItems.length; i++) {
            sliderItems[i].style.display = "none";
        }

        // Mostrar la imagen actual
        sliderItems[slideIndex].style.display = "block";
    }

    function nextSlide() {
        currentSlide++;
        if (currentSlide >= sliderItems.length) {
            currentSlide = 0;
        }
        showSlide(currentSlide);
    }

    // Mostrar la primera imagen
    showSlide(currentSlide);

    // Cambiar de imagen cada 7 segundos
    setInterval(nextSlide, 3000);
});