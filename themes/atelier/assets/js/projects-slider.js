document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.projects-slider').forEach((slider) => {
        const swiperElement = slider.querySelector('.projects-slider__swiper');
        const prevButton = slider.querySelector('.projects-slider__arrow--prev');
        const nextButton = slider.querySelector('.projects-slider__arrow--next');

        if (!swiperElement) {
            return;
        }

        new Swiper(swiperElement, {
            slidesPerView: 1,
            spaceBetween: 20,
            speed: 600,
            navigation: {
                prevEl: prevButton,
                nextEl: nextButton,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },
        });
    });
});