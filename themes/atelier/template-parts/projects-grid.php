<div class="projects-archive__grid">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/project-card'); ?>
        <?php endwhile; ?>
    <?php else : ?>
        <p class="projects-archive__empty">No projects found.</p>
    <?php endif; ?>
</div>