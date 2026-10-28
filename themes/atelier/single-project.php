<?php get_header(); ?>

    <main class="project-single">
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

                    <h1 class="project-single__title">
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
    </main>

<?php get_footer(); ?>