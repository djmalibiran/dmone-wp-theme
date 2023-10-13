<?php
add_theme_support( 'post-thumbnails' );

function register_my_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' ),
        'extra-menu' => __( 'Extra Menu' )
       )
    );
}
add_action( 'init', 'register_my_menus' );

//Remove generator
remove_action( 'wp_head', 'wp_generator' );

//Remove RSD Link
remove_action( 'wp_head', 'rsd_link' );

//Remove REST API link tag
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
 
//Remove oEmbed links
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
 
//Remove REST API in HTTP Headers
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );

//Remove WLW Manifest
remove_action( 'wp_head', 'wlwmanifest_link' );

//Remove shortlink
remove_action( 'wp_head', 'wp_shortlink_wp_head');


remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);