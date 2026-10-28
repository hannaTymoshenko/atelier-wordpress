document.addEventListener('DOMContentLoaded', () => {
    const filters = document.querySelector('.projects-filters');
    const grid = document.querySelector('.projects-archive__grid');

    if (!filters || !grid) {
        return;
    }

    const links = [...filters.querySelectorAll('.projects-filters__link')];

    let controller = null;

    const setActiveFilter = (activeLink) => {
        links.forEach((link) => {
            const isActive = link === activeLink;

            link.classList.toggle('projects-filters__link--active', isActive);

            if (isActive) {
                link.setAttribute('aria-current', 'page');
            } else {
                link.removeAttribute('aria-current');
            }
        });
    };

    const loadProjects = async (link, updateHistory = true) => {
        if (controller) {
            controller.abort();
        }

        controller = new AbortController();

        const url = new URL(link.href);
        const segments = url.pathname.split('/').filter(Boolean);
        const type = link.dataset.type || (link === links[0] ? 'all' : segments.at(-1));

        const apiUrl = new URL(window.atelierProjects.apiUrl);
        apiUrl.searchParams.set('type', type);

        grid.setAttribute('aria-busy', 'true');

        try {
            const response = await fetch(apiUrl, {
                signal: controller.signal,
            });

            if (!response.ok) {
                throw new Error('Failed to load projects');
            }

            const data = await response.json();

            grid.innerHTML = data.html;
            setActiveFilter(link);

            if (updateHistory) {
                window.history.pushState({ type }, '', link.href);
            }
        } catch (error) {
            if (error.name !== 'AbortError') {
                window.location.href = link.href;
            }
        } finally {
            if (!controller.signal.aborted) {
                grid.removeAttribute('aria-busy');
            }
        }
    };

    filters.addEventListener('click', (event) => {
        const link = event.target.closest('.projects-filters__link');

        if (!link || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) {
            return;
        }

        event.preventDefault();
        loadProjects(link);
    });

    window.addEventListener('popstate', () => {
        const currentUrl = window.location.pathname;

        const activeLink = links.find((link) => {
            return new URL(link.href).pathname === currentUrl;
        });

        if (activeLink) {
            loadProjects(activeLink, false);
        }
    });
});