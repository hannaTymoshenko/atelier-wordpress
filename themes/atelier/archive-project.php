<?php get_header(); ?>

    <main class="projects-archive">
        <div class="container">
            <div class="projects-archive__header">
                <h1 class="projects-archive__title">Selected Projects</h1>
                <p class="projects-archive__description">
                    A collection of spaces shaped by thoughtful design.
                </p>
            </div>

            <?php get_template_part('template-parts/projects-filters'); ?>

            <?php get_template_part('template-parts/projects-grid'); ?>
        </div>
    </main>

<?php get_footer(); ?>