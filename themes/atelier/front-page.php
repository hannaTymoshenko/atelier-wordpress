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
                            class="hero__link"
                            href="<?php echo esc_url($hero_link['url']); ?>"
                            target="<?php echo esc_attr($hero_link['target'] ?: '_self'); ?>"
                    >
                        <?php echo esc_html($hero_link['title']); ?>
                        <span aria-hidden="true">→</span>
                    </a>
                <?php endif; ?>
            </div>
        </section>
    </main>

<?php get_footer(); ?>