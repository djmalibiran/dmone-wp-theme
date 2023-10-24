<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class('container'); ?>>
        <a class="screen-reader-text skip-link" href="#content">Skip to content</a>
        
        <div class="off-canvas">
            <!-- off-screen toggle button -->
            <a class="off-canvas-toggle btn btn-primary btn-action" href="#off-canvas-menu">
                <i class="icon icon-menu"></i>
            </a>

            <div id="off-canvas-menu" class="off-canvas-sidebar">
                <!-- off-screen sidebar -->
                <?php wp_nav_menu( array(
                    'container' => 'nav',
                    'menu_class' => 'nav',
                    'theme_location' => 'header-menu',

                )); ?>
            </div>

            <a class="off-canvas-overlay" href="#close"></a>
        </div>