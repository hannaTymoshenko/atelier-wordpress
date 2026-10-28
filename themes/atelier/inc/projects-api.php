<?php

function atelier_register_projects_routes() {
    register_rest_route('atelier/v1', '/projects', [
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'atelier_get_filtered_projects',
        'permission_callback' => '__return_true',
        'args' => [
            'type' => [
                'default' => 'all',
                'sanitize_callback' => 'sanitize_key',
            ],
        ],
    ]);
}

add_action('rest_api_init', 'atelier_register_projects_routes');

function atelier_get_filtered_projects(WP_REST_Request $request) {
    $type = $request->get_param('type');

    $args = [
        'post_type' => 'project',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
    ];

    if ($type !== 'all') {
        $term = get_term_by('slug', $type, 'project_type');

        if (!$term) {
            return new WP_Error(
                'invalid_project_type',
                'Invalid project type.',
                ['status' => 400]
            );
        }

        $args['tax_query'] = [
            [
                'taxonomy' => 'project_type',
                'field' => 'slug',
                'terms' => $type,
            ],
        ];
    }

    $projects = new WP_Query($args);

    ob_start();

    if ($projects->have_posts()) {
        while ($projects->have_posts()) {
            $projects->the_post();
            get_template_part('template-parts/project-card');
        }
    } else {
        echo '<p class="projects-archive__empty">No projects found.</p>';
    }

    $html = ob_get_clean();

    wp_reset_postdata();

    return rest_ensure_response([
        'html' => $html,
    ]);
}