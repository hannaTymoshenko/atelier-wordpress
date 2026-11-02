<?php
get_header();

$hero_title = get_field('hero_title');
$hero_description = get_field('hero_description');
$hero_image = get_field('hero_image');
$hero_link = get_field('hero_link');
?>

    <main>
        <section class="hero">
            <?php if ($hero_image) : ?>
                <div class="hero__background">
                    <?php
                    echo wp_get_attachment_image(
                            $hero_image['ID'],
                            'full',
                            false,
                            ['class' => 'hero__image']
                    );
                    ?>
                </div>
            <?php endif; ?>

            <div class="container hero__container">
                <div class="hero__content">
                    <?php if ($hero_title) : ?>
                        <h1 class="hero__title">
                            <?php echo esc_html($hero_title); ?>
                        </h1>
                    <?php endif; ?>

                    <?php if ($hero_description) : ?>
                        <p class="hero__description">
                            <?php echo esc_html($hero_description); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <?php if ($hero_link) : ?>
                    <a
                            class="arrow-link"
                            href="<?php echo esc_url($hero_link['url']); ?>"
                            target="<?php echo esc_attr($hero_link['target'] ?: '_self'); ?>"
                    >
                        <?php echo esc_html($hero_link['title']); ?>
                        <span aria-hidden="true">→</span>
                    </a>
                <?php endif; ?>
            </div>
        </section>
        <?php
        $featured_projects = new WP_Query([
                'post_type' => 'project',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'meta_query' => [
                        [
                                'key' => 'featured_project',
                                'value' => '1',
                        ],
                ],
        ]);
        ?>

        <?php
        get_template_part('template-parts/projects-slider', null, [
                'title' => 'Selected Works',
                'label' => 'Our Portfolio',
                'projects' => $featured_projects,
                'link' => [
                        'url' => get_post_type_archive_link('project'),
                        'title' => 'View All Projects',
                ],
        ]);
        ?>

        <?php
        get_template_part('template-parts/image-text-section', null, [
                'title' => get_field('about_title'),
                'description' => get_field('about_description'),
                'image' => get_field('about_image'),
                'link' => get_field('about_link'),
        ]);
        ?>

        <?php
        $stats = [
                [
                        'number' => get_field('stat_1_number'),
                        'label'  => get_field('stat_1_label'),
                ],
                [
                        'number' => get_field('stat_2_number'),
                        'label'  => get_field('stat_2_label'),
                ],
                [
                        'number' => get_field('stat_3_number'),
                        'label'  => get_field('stat_3_label'),
                ],
        ];

        $stats = array_filter($stats, static function ($stat) {
            return !empty($stat['number']) && !empty($stat['label']);
        });
        ?>

        <?php if ($stats) : ?>
            <section class="stats">
                <div class="container">
                    <div class="stats__grid">
                        <?php foreach ($stats as $stat) : ?>
                            <div class="stats__item">
                                <span class="stats__number">
                                    <?php echo esc_html($stat['number']); ?>
                                </span>
                                <span class="stats__label">
                                    <?php echo esc_html($stat['label']); ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

    </main>

<?php get_footer(); ?>