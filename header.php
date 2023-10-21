<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <a class="screen-reader-text skip-link" href="#content">Skip to content</a>
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>