<?php

define('THEME_ROOT', get_theme_root() . '/motaphoto/');

require THEME_ROOT . 'utils/helpers.php';
require THEME_ROOT . 'utils/queries.php';
require THEME_ROOT . 'utils/ajax.php';
require THEME_ROOT . 'classes/walkers/class-walker-button-menu.php';
require THEME_ROOT . 'classes/walkers/class-walker-copyright-menu.php';

add_action('wp_enqueue_scripts', 'theme_enqueues');
add_action('after_setup_theme', 'theme_supports');
add_action('save_post', 'add_taxonomies_field_meta');
add_filter('get_custom_logo', 'change_logo_classes');
add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * Add Styles, Scripts and Fonts.
 */
function theme_enqueues() {
    // Fonts
    wp_enqueue_style('poppins-font', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap');

    // Styles
    wp_enqueue_style('reset-style', 'https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css');
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.css');

    // Scripts
    wp_enqueue_script('theme-script', get_stylesheet_directory_uri() . '/assets/js/script.js', ['jquery'], false, true);
}

/**
 * Adds the configuration used by the theme.
 */
function theme_supports() {
    // Menu
    register_nav_menu('Menu header', 'Navigation principale');
    register_nav_menu('Menu footer', 'Navigation secondaire');

    // Logo
    add_theme_support('custom-logo', [
        'height' => 14,
		'width' => 216,
    ]);
}

/**
 * Change the default classes of the logo.
 */
function change_logo_classes($html) {
    $html = str_replace('custom-logo-link', 'header__logo', $html);
    $html = str_replace('custom-logo', 'logo', $html);

    return $html;
}

/**
 * Add a meta field to facilitate
 * sorting with taxonomies.
 */
function add_taxonomies_field_meta($id) {
    $post = get_post($id);
    $taxonomies = get_object_taxonomies($post);

    foreach ($taxonomies as $taxonomy) {
        $terms = get_the_terms($id, $taxonomy);
        add_post_meta($id, $taxonomy,  $terms[0]->name, true);
    }
}
