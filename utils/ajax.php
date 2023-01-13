<?php

add_action('wp_enqueue_scripts', 'ajax_enqueues');
add_action('wp_ajax_picture_pagination_filters', 'picture_pagination_filters');
add_action('wp_ajax_nopriv_picture_pagination_filters', 'picture_pagination_filters');

/**
 * Filter and paginate images.
 */
function picture_pagination_filters() {
    $query = get_picture_pagination_query(
        $_GET['category'] ?? null,
        $_GET['format'] ?? null,
        $_GET['sort'] ?? null
    );

    $paged = $_GET['paged'] ?? 1;
    $has_next_page = $query->max_num_pages > $paged;

    ob_start();

    get_template_part('parts/carousel-items', null, [
        'items' => $query->get_posts(),
    ]);

    $html = ob_get_clean();

    wp_send_json_success([
        'html' => $html,
        'next' => $has_next_page,
    ]);
}

/**
 * Add Styles, Scripts.
 */
function ajax_enqueues() {
    // Select2
    wp_enqueue_style('select2-style', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css');
    wp_register_script('select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js');

    // Ajax
	wp_enqueue_script('ajax-script', get_template_directory_uri() . '/assets/js/ajax.js', ['jquery', 'select2']);
    wp_localize_script('ajax-script', 'adminAjax', admin_url('admin-ajax.php'));
}
