<?php
$terms = get_terms([
    'taxonomy' => 'project_type',
    'hide_empty' => false,
]);

$is_all_active = is_post_type_archive('project');
?>

<nav class="projects-filters" aria-label="Filter projects by type">
    <a
        class="projects-filters__link <?php echo $is_all_active ? 'projects-filters__link--active' : ''; ?>"
        href="<?php echo esc_url(get_post_type_archive_link('project')); ?>"
        data-type="all"
        <?php echo $is_all_active ? 'aria-current="page"' : ''; ?>
    >
        All Projects
    </a>

    <?php if (!is_wp_error($terms)) : ?>
        <?php foreach ($terms as $term) : ?>
            <?php $is_active = is_tax('project_type', $term->term_id); ?>

            <a
                class="projects-filters__link <?php echo $is_active ? 'projects-filters__link--active' : ''; ?>"
                href="<?php echo esc_url(get_term_link($term)); ?>"
                data-type="<?php echo esc_attr($term->slug); ?>"
                <?php echo $is_active ? 'aria-current="page"' : ''; ?>
            >
                <?php echo esc_html($term->name); ?>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</nav>