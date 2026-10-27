<?php

function atelier_enqueue_assets() {
    wp_enqueue_style(
        'atelier-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );
}

add_action('wp_enqueue_scripts', 'atelier_enqueue_assets');