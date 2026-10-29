<?php get_header(); ?>

    <main class="project-single main">
        <div class="container">

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <?php
                    $location = get_field('location');
                    $year = get_field('year');
                    $area = get_field('area');

                    $blocks = parse_blocks(get_the_content());

                    $story_blocks = [];
                    $gallery_blocks = [];

                    foreach ($blocks as $block) {
                        if ($block['blockName'] === 'core/gallery') {
                            $gallery_blocks[] = $block;
                        } else {
                            $story_blocks[] = $block;
                        }
                    }

                    $story = implode('', array_map('render_block', $story_blocks));
                    $gallery = implode('', array_map('render_block', $gallery_blocks));
                    ?>

                    <h1 class="title project-single__title">
                        <?php the_title(); ?>
                    </h1>

                    <?php if ($location || $year || $area) : ?>
                        <dl class="project-single__details">
                            <?php if ($location) : ?>
                                <div class="project-single__detail">
                                    <dt class="project-single__detail-label">Location</dt>
                                    <dd class="project-single__detail-value">
                                        <?php echo esc_html($location); ?>
                                    </dd>
                                </div>
                            <?php endif; ?>

                            <?php if ($year) : ?>
                                <div class="project-single__detail">
                                    <dt class="project-single__detail-label">Year</dt>
                                    <dd class="project-single__detail-value">
                                        <?php echo esc_html($year); ?>
                                    </dd>
                                </div>
                            <?php endif; ?>

                            <?php if ($area) : ?>
                                <div class="project-single__detail">
                                    <dt class="project-single__detail-label">Area</dt>
                                    <dd class="project-single__detail-value">
                                        <?php echo esc_html($area); ?> m²
                                    </dd>
                                </div>
                            <?php endif; ?>
                        </dl>
                    <?php endif; ?>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="project-single__image">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (trim($story) !== '') : ?>
                        <section class="project-single__story">
                            <h2 class="project-single__story-title">
                                Project Story
                            </h2>

                            <div class="project-single__story-content">
                                <?php echo $story; ?>
                            </div>
                        </section>
                    <?php endif; ?>

                    <?php if (trim($gallery) !== '') : ?>
                        <div class="project-single__gallery">
                            <?php echo $gallery; ?>
                        </div>
                    <?php endif; ?>

                <?php endwhile; ?>
            <?php endif; ?>

        </div>

        <?php
        $previous_project = get_previous_post();
        $next_project = get_next_post();
        $projects_url = get_post_type_archive_link('project');
        ?>

        <nav class="project-navigation" aria-label="Project navigation">
            <div class="container">
                <div class="project-navigation__inner">
                    <div class="project-navigation__item project-navigation__item--prev">
                        <?php if ($previous_project) : ?>
                            <a href="<?php echo esc_url(get_permalink($previous_project)); ?>">
                                <span class="project-navigation__label">← Previous Project</span>
                                <span class="project-navigation__title"><?php echo esc_html(get_the_title($previous_project)); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>

                    <a class="project-navigation__all" href="<?php echo esc_url($projects_url); ?>">
                        <span class="project-navigation__label">All Projects</span>
                        <span class="project-navigation__title">View All</span>
                    </a>

                    <div class="project-navigation__item project-navigation__item--next">
                        <?php if ($next_project) : ?>
                            <a href="<?php echo esc_url(get_permalink($next_project)); ?>">
                                <span class="project-navigation__label">Next Project →</span>
                                <span class="project-navigation__title"><?php echo esc_html(get_the_title($next_project)); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
    </main>

<?php get_footer(); ?>