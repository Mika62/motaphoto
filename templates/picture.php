<?php

/**
 * Template Name: Page photo
 * Template Post Type: photos
 */

get_header();

while (have_posts()):
    the_post();

    // Get all
    $posts = get_posts([
        'posts_per_page' => -1,
        'meta_key' => 'dates',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'post_type' => 'photos',
    ]);

    // Get Prev & Next
    $prev = get_infinity_prev_post($post->ID, $posts);
    $next = get_infinity_next_post($post->ID, $posts);
?>

<!-- Heading -->
<section id="heading" class="heading">
    <!-- Container -->
    <div class="heading__container">
        <!-- Column -->
        <div class="heading__column">
            <h1 class="heading__title"><?= get_the_title() ?></h1>
            <ul class="heading__info">
                <li>Référence : <?= get_field('reference') ?></li>
                <li>Catégorie : <?= get_esc_field('categories') ?></li>
                <li>Format : <?= get_esc_field('formats') ?></li>
                <li>Type : <?= get_esc_field('type') ?></li>
                <li>Année : <?= get_esc_field('dates') ?></li>
            </ul>
        </div>

        <!-- Column -->
        <div class="heading__column">
            <img src="<?= get_esc_field('image.sizes.large') ?>" alt="<?= get_esc_field('image.alt') ?>" class="heading__img">
        </div>
    </div>

    <!-- Footer -->
    <div class="heading__footer">
        <!-- CTA -->
        <div class="heading__cta cta">
            <h2 class="cta__title">Cette photo vous intéresse ?</h2>
            <a href="#modal" data-entries='{"contact-ref": "<?= get_esc_field('reference') ?>"}' class="cta__btn btn btn-flag">Contact</a>
        </div>

        <!-- Preview -->
        <div id="preview" class="heading__preview preview">
            <div class="preview__container">
                <img
                    src="<?= get_esc_field('image.sizes.thumbnail', $prev) ?>"
                    alt="<?= get_esc_field('image.alt', $prev) ?>"
                    id="preview-prev-img" class="preview__img"
                >
                <img
                    src="<?= get_esc_field('image.sizes.thumbnail', $next) ?>"
                    alt="<?= get_esc_field('image.alt', $next) ?>"
                    id="preview-next-img" class="preview__img"
                >
            </div>
            <div class="preview__links">
                <a href="<?= the_permalink($prev) ?>" aria-label="Voir la photo précédente" id="preview-prev-btn">
                    <span class="icon icon-left-arrow" aria-hidden="true"></span>
                </a>
                <a href="<?= the_permalink($next) ?>" aria-label="Voir la photo suivante" id="preview-next-btn">
                    <span class="icon icon-right-arrow" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Carousel -->
<section id="carousel" class="carousel">
    <?php
    
    // Get suggestions
    $suggestions = array_filter($posts, function ($v) use ($post, $prev, $next) {
        if (!in_array($v->ID, [$post->ID, $prev->ID, $next->ID])) {
            return get_field('categories') === get_field('categories', $v);
        }
    });
    
    if (!empty($suggestions)): ?>
        <h2 class="carousel__title">Vous aimerez aussi</h2>

        <!-- Container -->
        <div id="carousel-container" class="carousel__container">
            <?php get_template_part('parts/carousel-items', null, [
                'items' => array_slice($suggestions, 0, 2),
                'item_title' => 'h3',
            ]) ?>
        </div>
    <?php endif ?>

    <!-- Action -->
    <div class="carousel__action">
        <a href="<?= get_home_url() ?>" class="btn btn-flag">Toutes les photos</a>
    </div>

    <!-- Lightbox -->
    <?php get_template_part('parts/lightbox') ?>
</section>

<?php
endwhile;
wp_reset_postdata();

get_footer();
