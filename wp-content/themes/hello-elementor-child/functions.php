<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'hello-elementor','hello-elementor-theme-style','hello-elementor-header-footer' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );


// Register menu location
function register_memberarea_menu() {
    register_nav_menu('memberarea', __('Member Area Navigation', 'yourtheme'));
}
add_action('after_setup_theme', 'register_memberarea_menu');

// Enable logo support
add_theme_support('custom-logo');

// Load custom nav template in child theme (optional)
function load_member_nav_template() {
    get_template_part('template-parts/member-nav');
}

// END ENQUEUE PARENT ACTION


// function register_theme_menus() {
//     register_nav_menus([
//         'primary' => __('Primary Menu'),
//     ]);
// }
// add_action('after_setup_theme', 'register_theme_menus');
