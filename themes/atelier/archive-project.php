<?php get_header(); ?>

    <main class="projects-archive">
        <div class="container">
            <header class="projects-archive__header">
                <h1 class="projects-archive__title">Selected Projects</h1>
                <p class="projects-archive__description">
                    A collection of spaces shaped by thoughtful design.
                </p>
            </header>

            <div class="projects-archive__grid">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/project-card'); ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </main>

<?php get_footer(); ?>