<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container site-header__inner">
        <a class="site-header__logo" href="<?php echo esc_url(home_url('/')); ?>">
            ATELIER
        </a>

        <nav class="site-header__nav" id="primary-navigation" aria-label="Primary navigation">
            <?php
            wp_nav_menu([
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'site-header__menu',
                    'fallback_cb' => false,
            ]);
            ?>
        </nav>

        <a class="button button--primary site-header__cta" href="<?php echo esc_url(home_url('/contact/')); ?>">
            Let's talk
        </a>

        <button
                class="site-header__toggle"
                type="button"
                aria-label="Open navigation"
                aria-controls="primary-navigation"
                aria-expanded="false"
        >
            <span class="site-header__toggle-line"></span>
            <span class="site-header__toggle-line"></span>
            <span class="site-header__toggle-line"></span>
        </button>
    </div>
</header>
