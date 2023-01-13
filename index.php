<?php

get_header();

// Get random
$random = get_posts([
    'post_type' => 'photos',
    'orderby' => 'rand',
    'numberposts' => 1,
    'posts_per_page' => -1,
]);
?>

<!-- Hero -->
<section id="hero" class="hero">
    <h1 class="hero__title">Photographe event</h1>
    <img src="<?= get_esc_field('image.url', $random[0]) ?>" alt="<?= get_esc_field('image.alt', $random[0]) ?>" class="hero__img">
</section>

<!-- Carousel -->
<section id="carousel" class="carousel container">
    <!-- Form -->
    <form id="form-carousel" class="carousel__form form form--flex">
        <div class="form__group">
            <div>
                <label for="carousel-category" class="form__label">Catégories</label>
                <select name="category" id="carousel-category" class="form__select">
                    <option value="">--</option>
                    <?php foreach (get_terms('categories') as $category): ?>
                        <option><?= $category->name ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <label for="carousel-format" class="form__label">Formats</label>
                <select name="format" id="carousel-format" class="form__select">
                    <option value="">--</option>
                    <?php foreach (get_terms('formats') as $format): ?>
                        <option><?= $format->name ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div>
            <label for="carousel-sort" class="form__label">Trier par</label>
            <select name="sort" id="carousel-sort" class="form__select">
                <option value="">--</option>
                <option value="newest">Les plus récentes</option>
                <option value="oldest">Les plus anciennes</option>
            </select>
        </div>
    </form>

    <?php
    // Get posts
    $query = get_picture_pagination_query(
        $_GET['category'] ?? null,
        $_GET['format'] ?? null,
        $_GET['sort'] ?? null
    );

    $paged = get_query_var('paged') ?: 1;
    $has_next_page = $query->max_num_pages > $paged; ?>

    <!-- Container -->
    <div id="carousel-container" class="carousel__container">
        <?php get_template_part('parts/carousel-items', null, [
            'items' => $query->get_posts(),
        ]) ?>
    </div>

    <!-- Action -->
    <div class="carousel__action">
        <button
            type="button" id="load-more-btn" class="btn btn-secondary"
            <?= !$has_next_page ? 'disabled' : '' ?>
        >
            Charger plus
        </button>
    </div>

    <!-- Lightbox -->
    <?php get_template_part('parts/lightbox') ?>
</section>

<?php get_footer() ?>
