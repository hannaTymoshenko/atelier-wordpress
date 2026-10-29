<?php
$title = $args['title'] ?? 'Selected Works';
$label = $args['label'] ?? '';
$projects = $args['projects'] ?? null;
$link = $args['link'] ?? null;
?>

<?php if ($projects instanceof WP_Query && $projects->have_posts()) : ?>
    <section class="projects-slider">
        <div class="container">
            <div class="projects-slider__header">
                <div class="projects-slider__heading">
                    <?php if ($label) : ?>
                        <span class="projects-slider__label"><?php echo esc_html($label); ?></span>
                    <?php endif; ?>

                    <h2 class="projects-slider__title"><?php echo esc_html($title); ?></h2>
                </div>

                <?php if ($link) : ?>
                    <a class="arrow-link" href="<?php echo esc_url($link['url']); ?>">
                        <?php echo esc_html($link['title']); ?>
                        <span aria-hidden="true">→</span>
                    </a>
                <?php endif; ?>
            </div>

            <div class="projects-slider__swiper swiper">
                <div class="swiper-wrapper">
                    <?php while ($projects->have_posts()) : $projects->the_post(); ?>
                        <div class="swiper-slide">
                            <?php get_template_part('template-parts/project-card'); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

            <div class="projects-slider__navigation">
                <button class="projects-slider__arrow projects-slider__arrow--prev" type="button" aria-label="Previous projects">←</button>
                <button class="projects-slider__arrow projects-slider__arrow--next" type="button" aria-label="Next projects">→</button>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php wp_reset_postdata(); ?>