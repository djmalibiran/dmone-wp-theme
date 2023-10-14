<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- <title><?php the_title(); ?></title> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="icon" href="path/to/favicon.ico" type="image/x-icon"> -->
        <!-- <meta name="description" content="A description of your page here."> -->
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <a class="screen-reader-text skip-link" href="#content">Skip to content</a>
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>