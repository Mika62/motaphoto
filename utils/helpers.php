<?php

/**
 * Retrieves a custom field by
 * escaping Html tags.
 */
function get_esc_field($selector, $id = false) {
    $selectors = explode('.', $selector);
    $field = get_field($selectors[0], $id);

    foreach ($selectors as $k => $value) {
        if ($k !== 0) $field = $field[$value];
    }

    return esc_attr($field ?: '');
}

/**
 * Retrieves previous posts indefinitely.
 */
function get_infinity_prev_post($current_id, $posts) {
    $index = array_search($current_id, array_column($posts, 'ID'));

    return $index == 0 ? end($posts) : $posts[($index - 1)];
}

/**
 * Retrieves next posts indefinitely.
 */
function get_infinity_next_post($current_id, $posts) {
    $index = array_search($current_id, array_column($posts, 'ID'));
    $index++;

    return $index === count($posts) ? reset($posts) : $posts[$index];
}

/**
 * Prints information about a
 * variable and die.
 */
function dd($var) {
    echo '<pre>';
    print_r($var);
    echo '</pre>';
    die;
}
