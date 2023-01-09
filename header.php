<!DOCTYPE html>
<html <?php language_attributes() ?>
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('title') ?></title>

    <?php wp_head() ?>
</head>
<body id="body" class="body">
    <!-- Header -->
    <header id="header" class="header <?= is_front_page() ? 'header' : 'header header--margin' ?>">
        <!-- Container -->
        <div class="header__container container">
            <!-- Logo -->
            <?= the_custom_logo() ?>

            <!-- Menu -->
            <?php

            $style = current_user_can('administrator') ? 'header__menu header__menu--admin' : 'header__menu';
            $wrap = '<nav id="menu" class="' . $style . '" aria-label="Menu principal">%3$s</nav>';
            
            wp_nav_menu([
                'menu' => 'Menu header',
                'container' => false,
                'items_wrap' => $wrap,
                'walker' => new WalkerButtonMenu,
            ]) ?>

            <!-- Btn -->
            <button id="menu-btn" type="button" class="header__menu-btn" aria-label="Basculer le menu principal">
                <span id="menu-open-icon" class="icon icon-menu" aria-hidden="true"></span>
                <span id="menu-close-icon" class="icon icon-menu-close" aria-hidden="true"></span>
            </button>
        </div>
    </header>
    <!-- /Header -->

    <!-- Main -->
    <main id="main" class="main">
        