<?php

$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$image = $args['image'] ?? null;
$link = $args['link'] ?? null;
$reverse = $args['reverse'] ?? false;

?>

<?php if ($title || $description || $image) : ?>
    <section class="image-text<?php echo $reverse ? ' image-text--reverse' : ''; ?>">
        <div class="container">
            <div class="image-text__inner">
                <div class="image-text__media">
                    <?php if (!empty($image['ID'])) : ?>
                        <?php echo wp_get_attachment_image($image['ID'], 'large'); ?>
                    <?php endif; ?>
                </div>

                <div class="image-text__content">
                    <?php if ($title) : ?>
                        <h2 class="image-text__title h2"><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>

                    <?php if ($description) : ?>
                        <div class="image-text__description">
                            <?php echo wp_kses_post(wpautop($description)); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($link['url'])) : ?>
                        <a class="arrow-link" href="<?php echo esc_url($link['url']); ?>">
                            <?php echo esc_html($link['title'] ?? 'Learn more'); ?>
                            <span aria-hidden="true">→</span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>