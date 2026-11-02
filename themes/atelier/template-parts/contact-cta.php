<?php
$title = $args['title'] ?? 'Have a project in mind?';
$description = $args['description'] ?? "Let's create something meaningful together.";
$button = $args['button'] ?? [];

$button_title = $button['title'] ?? 'Get in touch';
$button_url = $button['url'] ?? home_url('/contact/');
$button_target = $button['target'] ?? '_self';
?>

<section class="contact-cta">
    <div class="container">
        <div class="contact-cta__header">
            <span class="contact-cta__eyebrow">Let's collaborate</span>
        </div>

        <div class="contact-cta__inner">
            <h2 class="title contact-cta__title">
                <?php echo esc_html($title); ?>
            </h2>

            <div class="contact-cta__content">
                <p class="contact-cta__description">
                    <?php echo esc_html($description); ?>
                </p>

                <a
                    class="contact-cta__button"
                    href="<?php echo esc_url($button_url); ?>"
                    target="<?php echo esc_attr($button_target); ?>"
                >
                    <span class="contact-cta__button-icon" aria-hidden="true">↗</span>
                    <span class="contact-cta__button-text">
                        <?php echo esc_html($button_title); ?>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>