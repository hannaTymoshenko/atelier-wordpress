<?php
/**
 * Plugin Name: Atelier Core
 * Description: Custom content types and functionality for Atelier.
 * Version: 1.0.0
 * Text Domain: atelier-core
 */

function atelier_register_project_post_type() {
    register_post_type('project', [
        'labels' => [
            'name' => 'Projects',
            'singular_name' => 'Project',
            'add_new_item' => 'Add New Project',
            'edit_item' => 'Edit Project',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'projects',
        ],
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-building',
        'supports' => [
            'title',
            'editor',
            'thumbnail',
            'excerpt',
        ],
    ]);
}

add_action('init', 'atelier_register_project_post_type');

function atelier_register_project_taxonomy() {
    register_taxonomy('project_type', ['project'], [
        'labels' => [
            'name' => 'Project Types',
            'singular_name' => 'Project Type',
        ],
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite' => [
            'slug' => 'project-type',
        ],
    ]);
}

add_action('init', 'atelier_register_project_taxonomy');