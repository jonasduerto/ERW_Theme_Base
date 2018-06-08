<?php
/**
 * erw-builder functions and definitions
 *
 * @package erw-builder
 */

define('ERW_THEME_DIR', get_template_directory());
define('ERW_THEME_INC', ERW_THEME_DIR . '/inc');
define('ERW_THEME_ASSETS', ERW_THEME_DIR . '/assets');
define('ERW_THEME_JS', ERW_THEME_ASSETS . '/js');
define('ERW_THEME_CSS', ERW_THEME_ASSETS . '/css');
define('ERW_THEME_IMG', ERW_THEME_ASSETS . '/img');
define('ERW_THEME_BUILDER', ERW_THEME_DIR . '/builder');

define('ERW_THEME_URI', get_template_directory_uri());
define('ERW_THEME_ASSETS_URI', ERW_THEME_URI . '/assets');
define('ERW_THEME_JS_URI', ERW_THEME_ASSETS_URI . '/js/');
define('ERW_THEME_CSS_URI', ERW_THEME_ASSETS_URI . '/css/');
define('ERW_THEME_IMAGES_URI', ERW_THEME_ASSETS_URI . '/img');
define('ERW_THEME_FAVICON_URI', ERW_THEME_IMAGES_URI . '/favicon');

// define('ERW_BUILDER_URI', get_template_directory_uri() . '/builder');
// define('ERW_BUILDER_ASSETS_URI', ERW_BUILDER_URI . '/assets');
// define('ERW_BUILDER_JS_URI', ERW_BUILDER_ASSETS_URI . '/js/');
// define('ERW_BUILDER_CSS_URI', ERW_BUILDER_ASSETS_URI . '/css/');




//-> =Custom functions that act independently of the erw-builder templates. 
require_once ERW_THEME_INC . '/init.php';
//-> =Load Custom Navigation Walker 
require_once ERW_THEME_INC . '/wp_bootstrap_navwalker.php';
//-> =Load Custom Breadcrumbs 
require_once ERW_THEME_INC . '/wp_breadcrumbs.php';
//-> =Load Custom Shortcode 
require_once ERW_THEME_INC . '/shortcode.php';
//-> =Customizer additions. 
require_once ERW_THEME_INC . '/customizer.php';


// Register favicon //-> Function location: /inc/init.php
add_action( 'wp_head', 'add_favicon', 0 );
add_action( 'admin_head', 'add_favicon', 0 );

//-> =Add Theme Support.
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

// register_nav_menus. //-> This theme uses wp_nav_menu() in one location.
register_nav_menus(array(
	'navbar_left'  => __('Navbar Left Menu', 'erw-builder'),
	'navbar_right' => __('Navbar Right Menu', 'erw-builder'),
	'footer'       => __('Navbar Footer Menu', 'erw-builder'),
	'header'       => __('Navbar header Menu', 'erw-builder'),
));

// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');

//-> =Register new image size.
add_theme_support( 'post-thumbnails' );
add_image_size( 'erwc-thumbnail', 52, 67, true );
add_image_size( 'pheader_img', 1300, 580, true );
add_image_size( 'thumbnails_294_195', 294, 195, true );
add_image_size( 'thumbnails_370_296', 370, 276, true );
add_image_size( 'thumbnails_250_200', 250, 200, true );
add_image_size( 'thumbnails_archive_406_276', 406, 276, true );

// add_nav_menu_items_icl_get_languages WPML
// Function location: /inc/init.php
// if (function_exists('icl_get_languages')) {
//   add_filter('wp_nav_menu_items','add_nav_menu_items_icl_get_languages', 10, 2);
// }

// Clean up the head
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', '_admin_bar_bump_cb');
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

// Remove Dashboard Meta Boxes //-> Function location: /inc/init.php
add_action( 'wp_dashboard_setup', 'mb_remove_dashboard_widgets' );

// Remove Query Strings From Static Resources // Function location: /inc/init.php
add_filter( 'script_loader_src', 'mb_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'mb_remove_script_version', 15, 1 );

// Remove Read More Jump //-> Function location: /inc/init.php
add_filter( 'the_content_more_link', 'mb_remove_more_jump_link' );
//Remover Ver
function remove_wp_ver() { return ''; }
add_filter('the_generator', 'remove_wp_ver');

add_filter( 'style_loader_src', 'remove_wp_ver_par', 9999 );
add_filter( 'script_loader_src', 'remove_wp_ver_par', 9999 );