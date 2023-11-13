<?php
// Remove generator
remove_action( 'wp_head', 'wp_generator' );

// Remove RSD Link
remove_action( 'wp_head', 'rsd_link' );

// Remove REST API link tag
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
 
// Remove oEmbed links
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
 
// Remove REST API in HTTP Headers
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );

// Remove WLW Manifest
remove_action( 'wp_head', 'wlwmanifest_link' );

// Remove shortlink
remove_action( 'wp_head', 'wp_shortlink_wp_head');

// Remove unnecessary files
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);

// Title
add_theme_support( 'title-tag' );

// Register Menus
function register_my_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' ),
        'header-menu-right' => __( 'Header Menu Right' ),
        'footer-menu-one' => __( 'Footer Menu One' ),
        'footer-menu-two' => __( 'Footer Menu Two' ),
        'footer-menu-three' => __( 'Footer Menu Three' ),
        'footer-menu-four' => __( 'Footer Menu Four' )
	  )
    );
}
add_action( 'init', 'register_my_menus' );

// Add class to Menu Li
function custom_nav_class($classes, $item){
    $classes[] = 'btn btn-link';
    return $classes;
}
add_filter('nav_menu_css_class' , 'custom_nav_class' , 10 , 2);


// Enqueue Spectre Stylesheet
function spectre_scripts() {
	wp_enqueue_style('spectre-styles', 'https://unpkg.com/spectre.css/dist/spectre.min.css', array(), array(), false, 'screen');
	wp_enqueue_style('spectre-exp-styles', 'https://unpkg.com/spectre.css/dist/spectre-exp.min.css', array(), array(), false, 'screen');
	wp_enqueue_style('spectre-icons', 'https://unpkg.com/spectre.css/dist/spectre-icons.min.css', array(), array(), false, 'screen');
}
add_action( 'wp_enqueue_scripts', 'spectre_scripts' );

// Enqueue Stylesheet and Script
function dmone_scripts() {
	wp_enqueue_style('main-styles', get_template_directory_uri() . '/assets/style.css', array(), filemtime(get_template_directory() . '/assets/style.css'), false, 'screen');
	wp_enqueue_script(
		'main-scripts',
		get_template_directory_uri() . '/assets/above-the-fold-scripts.js',
		array(),
		get_template_directory_uri() . '/assets/above-the-fold-scripts.js',
		array('strategy' => 'async')
	);
}
add_action( 'wp_enqueue_scripts', 'dmone_scripts' );

// Enqueue Swiper Stylesheet and Scripts
function swiper_scripts() {
	wp_enqueue_style('swiper-styles', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', array(), array(), false, 'screen');
	wp_enqueue_script(
		'swiper-scripts',
		'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js',
		array(),
		array(),
		array('strategy'  => 'defer')
	);
}
add_action( 'wp_enqueue_scripts', 'swiper_scripts' );

// Enable Post Featured Images
add_theme_support( 'post-thumbnails' );

// TMG
require_once get_template_directory() . '/assets/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'dmone_register_required_plugins' );

function dmone_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
    array(
			'name'      => 'Advanced Custom Fields (ACF)',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
		)
  );
  $config = array(
		'id'           => 'dmone',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
  );

	tgmpa( $plugins, $config );
}


