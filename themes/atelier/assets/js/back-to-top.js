document.addEventListener('DOMContentLoaded', () => {
    const backToTop = document.querySelector('.js-back-to-top');

    if (!backToTop) return;

    backToTop.addEventListener('click', (event) => {
        event.preventDefault();

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});