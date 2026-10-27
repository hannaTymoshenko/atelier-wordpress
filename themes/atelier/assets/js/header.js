document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('.site-header__toggle');
    const navigation = document.querySelector('.site-header__nav');

    if (!toggle || !navigation) {
        return;
    }

    const closeMenu = () => {
        navigation.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', 'Open navigation');
    };

    toggle.addEventListener('click', () => {
        const isOpen = toggle.getAttribute('aria-expanded') === 'true';

        navigation.classList.toggle('is-open', !isOpen);
        toggle.setAttribute('aria-expanded', String(!isOpen));
        toggle.setAttribute('aria-label', isOpen ? 'Open navigation' : 'Close navigation');
    });

    navigation.addEventListener('click', (event) => {
        if (event.target.closest('a')) {
            closeMenu();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeMenu();
        }
    });

    document.addEventListener('click', (event) => {
        if (!event.target.closest('.site-header')) {
            closeMenu();
        }
    });

    window.matchMedia('(min-width: 768px)').addEventListener('change', closeMenu);
});