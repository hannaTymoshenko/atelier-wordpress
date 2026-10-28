<?php get_header(); ?>

    <main class="project-single">
        <div class="container">

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <?php
                    $location = get_field('location');
                    $year = get_field('year');
                    $area = get_field('area');
                    ?>

                    <h1 class="project-single__title">
                        <?php the_title(); ?>
                    </h1>

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

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="project-single__image">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="project-single__content">
                        <?php the_content(); ?>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </main>

<?php get_footer(); ?>