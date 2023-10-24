<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class('container'); ?>>
        <header class="columns">
            <div class="navbar column col-8 col-mx-auto">
                <a class="screen-reader-text skip-link" href="#content">Skip to content</a>
                <?php wp_nav_menu( array(
                    'container' => '',
                    'container_class' => 'navbar',
                    'menu_class' => 'navbar-section',
                    'theme_location' => 'header-menu',
                    
                )); ?>
                <a href="/" class="navbar-center"><img src="<?php site_icon_url(32); ?>" alt="<?php echo get_bloginfo('name'); ?> logo"> </a>
                <?php wp_nav_menu( array(
                    'container' => '',
                    'container_class' => 'navbar',
                    'menu_class' => 'navbar-section',
                    'theme_location' => 'header-menu',

                )); ?>
            </div>
        </header>