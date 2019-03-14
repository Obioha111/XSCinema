<?php
/*This file is part of autoshop child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

function autoshop_enqueue_child_styles() {
    $min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    $parent_style = 'storecommerce-style';

    $fonts_url = 'https://fonts.googleapis.com/css?family=Cabin:400,400italic,500,600,700';
    wp_enqueue_style('autoshop-google-fonts', $fonts_url, array(), null);
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap' . $min . '.css');
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/owl-carousel-v2/assets/owl.carousel' . $min . '.css');
    wp_enqueue_style('owl-theme-default', get_template_directory_uri() . '/assets/owl-carousel-v2/assets/owl.theme.default.css');
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css' );
    
    $deps = array( 'bootstrap', $parent_style);
    if (class_exists('WooCommerce')) {
        wp_enqueue_style('storecommerce-woocommerce-style', get_template_directory_uri() . '/woocommerce.css');
        $deps[] = 'storecommerce-woocommerce-style';
    }    

    wp_enqueue_style(
        'autoshop-style',
        get_stylesheet_directory_uri() . '/style.css',
        $deps,
        wp_get_theme()->get('Version') );


}
add_action( 'wp_enqueue_scripts', 'autoshop_enqueue_child_styles' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function autoshop_customize_register($wp_customize) {
     $wp_customize->get_setting( 'header_textcolor' )->default = '#ffffff';     
}
add_action('customize_register', 'autoshop_customize_register', 99999);


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function autoshop_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Above Footer Section', 'autoshop'),
        'id' => 'above-footer-section',
        'description' => esc_html__('Add widgets to above footer section.', 'autoshop'),
        'before_widget' => '<div id="%1$s" class="widget autoshop-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span>',
        'after_title' => '</span></h2>',
    ));
}
add_action('widgets_init', 'autoshop_widgets_init', 11);

/*Add the demo file*/
function autoshop_add_demo_files($demos) {
    $demos[] = array(
        'import_file_name'             => esc_html__( 'Child - Autoshop', 'autoshop' ),
        'local_import_file'            => trailingslashit( get_stylesheet_directory() ) . 'demo-content/autoshop/storecommerce.xml',
        'local_import_widget_file'     => trailingslashit( get_stylesheet_directory() ) . 'demo-content/autoshop/storecommerce.wie',
        'local_import_customizer_file' => trailingslashit( get_stylesheet_directory() ) . 'demo-content/autoshop/storecommerce.dat',
        'import_preview_image_url'     => trailingslashit( get_stylesheet_directory_uri() ) . 'demo-content/assets/storecommerce-autoshop.jpg',
        'preview_url'                  => 'https://demo.afthemes.com/storecommerce/autoshop',
    );
    return $demos;
}
add_filter( 'aft_demo_import_files', 'autoshop_add_demo_files');
