<?php get_header(); ?>

    <main class="main">
        <section class="not-found">
            <div class="container">
                <div class="not-found__inner">
                    <span class="not-found__number">404</span>

                    <h1 class="not-found__title">
                        Page not found.
                    </h1>

                    <p class="not-found__description">
                        The page you're looking for doesn't exist or may have been moved.
                    </p>

                    <a class="button button--primary" href="<?php echo esc_url(home_url('/')); ?>">
                        Back to homepage <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>