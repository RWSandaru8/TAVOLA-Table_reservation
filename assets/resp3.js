

let slideIndex = 0;
    const slides = document.querySelectorAll('.carousel-slide');

    function showSlide(index) {
        if (index >= slides.length) {
            slideIndex = 0;
        } else if (index < 0) {
            slideIndex = slides.length - 1;
        } else {
            slideIndex = index;
        }

        const offset = -slideIndex * 100;
        slides.forEach(slide => {
            slide.style.transform = `translateX(${offset}%)`;
        });
    }

    function moveSlide(direction) {
        showSlide(slideIndex + direction);
    }

    showSlide(slideIndex);

    
  