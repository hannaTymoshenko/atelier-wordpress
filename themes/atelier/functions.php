<?php

function atelier_enqueue_assets() {
    wp_enqueue_style(
        'atelier-style',
        get_theme_file_uri('assets/css/main.css'),
        [],
        wp_get_theme()->get('Version')
    );
}

add_action('wp_enqueue_scripts', 'atelier_enqueue_assets');

function atelier_setup() {
    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    register_nav_menus([
        'primary' => 'Primary Menu',
    ]);
}

add_action('after_setup_theme', 'atelier_setup');

wp_enqueue_script(
    'atelier-header',
    get_theme_file_uri('assets/js/header.js'),
    [],
    wp_get_theme()->get('Version'),
    true
);