<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	'/cpt.php',                             // Load CPTs.
    '/custom-functions.php',
    '/blocks.php'
);

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}

/**
 * Enqueue Google Fonts
 */
add_action( 'wp_enqueue_scripts', 'cbtu_enqueue_google_fonts' );
function cbtu_enqueue_google_fonts() {

 $query_args = array(
   'family' => 'Lato:400,700|Oswald:400,700|Roboto:400'
 );

 wp_register_style( 
   'google-fonts', 
   add_query_arg( $query_args, '//fonts.googleapis.com/css' ), 
   array(), 
   null 
 );
 wp_enqueue_style( 'google-fonts' );
}

/**
 * Remove code comments on build
 */
function callback($buffer) {
    $buffer = preg_replace('/<!--(.|s)*?-->/', '', $buffer);
    return $buffer;
}
function buffer_start() {
    ob_start("callback");
}
function buffer_end() {
    ob_end_flush();
}
add_action('get_header', 'buffer_start');
add_action('wp_footer', 'buffer_end');

function footer_nav() {
  register_nav_menu('footer-nav',__( 'Footer Nav' ));
}
add_action( 'init', 'footer_nav' );

/*
* Theme Options Page
*/
if( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( array(
        'page_title' 	=> 'Theme Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ) );
}

function register_my_menu() {
    register_nav_menu('top-menu',__( 'Top Menu' ));
    register_nav_menu('top-menu-v2',__( 'Top Menu V2' ));
    register_nav_menu('main-menu-v2',__( 'Main Menu V2' ));
}
add_action( 'init', 'register_my_menu' );

 function lazy_embed_oembed_html($html, $url, $attr){
    $html = str_replace('<iframe ','<iframe loading="lazy" ',$html);
    return $html;
 }

 add_filter('embed_oembed_html', 'lazy_embed_oembed_html',10, 3);

//  function acf_wysiwyg_remove_wpautop() {
//     remove_filter('acf_the_content', 'wpautop' );
// }
// add_action('acf/init', 'acf_wysiwyg_remove_wpautop');

/**
 * Add featured image to category.
 */
function tutsplus_add_attachments_to_categories() {
 
    register_taxonomy_for_object_type( 'category', 'attachment' );
 
}
 
add_action( 'init' , 'tutsplus_add_attachments_to_categories' );

// Adding excerpt for page
add_post_type_support( 'page', 'excerpt' );

//* Add Custom Script.js & Responsive.css Files
add_action( 'wp_enqueue_scripts', 'spark_custom_scripts', 999999 );
function spark_custom_scripts() {
    wp_enqueue_style( 'map-skilled-trade', get_stylesheet_directory_uri() . '/map-skilled-trade.css',array(),rand());
    wp_enqueue_script('jsmaps-libs',get_stylesheet_directory_uri() . '/js/jsmaps/jsmaps-libs.js',array( 'jquery' ),rand());
    wp_enqueue_script('jsmaps-panzoom',get_stylesheet_directory_uri() . '/js/jsmaps/jsmaps-panzoom.js',array( 'jquery' ),rand());
    wp_enqueue_script('jsmaps-min',get_stylesheet_directory_uri() . '/js/jsmaps/jsmaps.min.js',array( 'jquery' ),rand());
    wp_enqueue_script('jsmaps-canada',get_stylesheet_directory_uri() . '/js/jsmaps/canada.js',array( 'jquery' ),rand());
    wp_enqueue_script('jsmaps-init',get_stylesheet_directory_uri() . '/js/jsmaps/jsmaps-init.js',array( 'jquery' ),rand());
    
    wp_enqueue_script('carousel-init',get_stylesheet_directory_uri() . '/js/carousel-slick.js',array( 'jquery' ),rand());
    wp_enqueue_style('slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css',array(),rand());
    wp_enqueue_style('slick-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css',array(),rand());
    wp_enqueue_script('slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',array( 'jquery' ),rand());
}

include 'map-skilled-trade.php';