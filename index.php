<?php

get_header();

// Get all
$posts = get_posts([
    'posts_per_page' => 12,
    'meta_key' => 'dates',
    'orderby' => 'meta_value',
    'post_type' => 'photos',
]);

// Get random
$random = $posts[array_rand($posts)];
?>

<!-- Hero -->
<section id="hero" class="hero">
    <h1 class="hero__title">Photographe event</h1>
    <img src="<?= get_esc_field('image.url', $random) ?>" alt="<?= get_esc_field('image.alt', $random) ?>" class="hero__img">
</section>

<?php get_footer() ?>
