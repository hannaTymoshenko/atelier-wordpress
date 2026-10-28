<?php

function atelier_enqueue_assets() {
    $version = wp_get_theme()->get('Version');

    wp_enqueue_style(
        'atelier-style',
        get_theme_file_uri('assets/css/main.css'),
        [],
        $version
    );

    wp_enqueue_script(
        'atelier-header',
        get_theme_file_uri('assets/js/header.js'),
        [],
        $version,
        true
    );

    if (is_singular('project')) {
        wp_enqueue_style(
            'atelier-project-single',
            get_theme_file_uri('assets/css/project-single.css'),
            ['atelier-style'],
            $version
        );
    }

    if (is_post_type_archive('project') || is_tax('project_type')) {
        wp_enqueue_style(
            'atelier-projects-archive',
            get_theme_file_uri('assets/css/projects-archive.css'),
            ['atelier-style'],
            $version
        );

        wp_enqueue_script(
            'atelier-projects-filter',
            get_theme_file_uri('assets/js/projects-filter.js'),
            [],
            $version,
            true

        );

        wp_add_inline_script(
            'atelier-projects-filter',
            'window.atelierProjects = ' . wp_json_encode([
                'apiUrl' => esc_url_raw(rest_url('atelier/v1/projects')),
            ]) . ';',
            'before'
        );
    }
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

require_once get_theme_file_path('inc/projects-api.php');