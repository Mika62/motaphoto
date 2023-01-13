<?php

/**
 * Query to retrieve filtered images.
 */
function get_picture_pagination_query($category = false, $format = false, $sort = false) {
    // Default
    $args = [
        'per_page' => get_option('posts_per_page'),
        'paged' => $_GET['paged'] ?? 1,
        'meta_key' => 'dates',
        'orderby' => 'meta_value',
        'post_type' => 'photos',
        'meta_query' => ['relation' => 'AND']
    ];

    // By category
    if ($category) {
        $args['meta_query'][] = ['key' => 'categories', 'value' => $category];
    }

    // By format
    if ($format) {
        $args['meta_query'][] = ['key' => 'formats', 'value' => $format];
    }

    // By sort
    if ($sort && $sort === 'oldest') {
        $args['order'] = 'ASC';
    }

    return new WP_Query($args);
}
