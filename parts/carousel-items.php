<?php

// Options
$h = $args['item_title'] ?? 'h2';

foreach ($args['items'] as $item): ?>
    <!-- Item -->
    <article class="carousel__item">
        <button
            type="button" class="carousel__preview-btn js-preview-btn"
            data-img="<?= get_esc_field('image.url', $item) ?>"
            aria-label="Afficher la photo en grand"
        >
            <span class="icon icon-full-screen" aria-hidden="true"></span>
        </button>
        <img
            src="<?= get_esc_field('image.sizes.large', $item) ?>"
            alt="<?= get_esc_field('image.alt', $item) ?>"
            class="carousel__img"
        >
        <a href="<?= the_permalink($item) ?>" class="carousel__caption">
            <span class="icon icon-eye" aria-hidden="true"></span>
            <<?= $h ?> class="carousel__item-title"><?= get_the_title($item) ?></<?= $h ?>>
            <span class="carousel__item-subtitle"><?= get_esc_field('categories', $item) ?></span>
        </a>
    </article>
<?php endforeach ?>
