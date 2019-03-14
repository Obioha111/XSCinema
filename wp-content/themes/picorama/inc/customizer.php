<?php
/**
 * Picorama Theme Customizer.
 *
 * @package Picorama
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function picorama_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	
	
	//Blog Post option
	$wp_customize->add_panel( 'blog_post_option_panel', array(
		'priority'       => 11,
		'capability'     => 'edit_theme_options',
		'title'          => __( 'Blog Post option', 'picorama' ),
		'description'    => __( 'Change How Feaured Image View on Single Post', 'picorama' ),
	) );
	
	//Blog Post Image
	$wp_customize->add_section( 'single_post_image_section' , array(
		'title'       => __( 'Single Post Image', 'picorama' ),
		'priority'    => 20,
		'description' => __( 'Change How Image View on your Single Post/Page', 'picorama' ),
		'panel'  => 'blog_post_option_panel',
	) );

	$wp_customize->add_setting('image_size_setting', array(
		'default'        => 0,
		'sanitize_callback' => 'picorama_sanitize_checkbox',
	));

	$wp_customize->add_control('image_size_control', array(
		'settings' => 'image_size_setting',
		'label'    => __('Make Image Full Screen', 'picorama'),
		'section'  => 'single_post_image_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));	
	
	/* color option */
	$wp_customize->add_setting( 'primary_color_setting', array (
		'default'     => '00bcd4',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
			'label'    => __( 'Theme Primary ColorTheme Primary Color', 'picorama' ),
			'section'  => 'colors',
			'settings' => 'primary_color_setting',
	) ) );
	
	$wp_customize->add_setting( 'secondary_color_setting', array (
		'default'     => '434a54',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color', array(
			'label'    => __( 'Theme Secondary Color', 'picorama' ),
			'section'  => 'colors',
			'settings' => 'secondary_color_setting',
	) ) );
}
add_action( 'customize_register', 'picorama_customize_register' );

function picorama_customize_register_front( $wp_customize ) {
	$wp_customize->add_panel( 'home_featured_panel', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'          => __( 'Home Page Features', 'picorama' ),
		'description'    => __( 'Features to show Using Alt Homepage Template', 'picorama' ),
	) );
	
	//slider
	$wp_customize->add_section( 'slider_section' , array(
		'title'       => __( 'Slider', 'picorama' ),
		'priority'    => 20,
		'description' => __( 'Slider option', 'picorama' ),
		'panel'  => 'home_featured_panel',
	) );

	$wp_customize->add_setting('display_slider_setting', array(
		'default'        => 1,
		'sanitize_callback' => 'picorama_sanitize_checkbox',
	));

	$wp_customize->add_control('display_slider_control', array(
		'settings' => 'display_slider_setting',
		'label'    => __('Display Slider', 'picorama'),
		'section'  => 'slider_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));

			
	$categories = get_categories();
			$cats = array();
			$i = 0;
			foreach($categories as $category){
				if($i==0){
					$default = $category->slug;
					$i++;
				}
				$cats[$category->slug] = $category->name;
			}
	
	//  =============================
	//  Select Box               
	//  =============================
	$wp_customize->add_setting('category_setting', array(
		'sanitize_callback' => 'picorama_sanitize_category',
	));

	$wp_customize->add_control('category_control', array(
		'settings' => 'category_setting',
		'type' => 'select',
		'label' => __( 'Select Category:', 'picorama' ),
		'section' => 'slider_section',
		'active_callback' =>'picorama_slider_active_callback',
		'choices' => $cats,
		'priority'	=> 24
	));
		
	//  Set Speed
	$wp_customize->add_setting( 'slider_speed_setting', array (
		'default' => '6000',
		'sanitize_callback' => 'picorama_sanitize_integer',
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'slider_speed', array(
		'label'    => __( 'Slider Speed (milliseconds)', 'picorama' ),
		'section'  => 'slider_section',
		'settings' => 'slider_speed_setting',
		'active_callback' =>'picorama_slider_active_callback',
		'priority'	=> 24
	) ) );
	// optional_pages
	$wp_customize->add_section( 'optional_pages_section' , array(
		'title'       => __( 'Optional Pages', 'picorama' ),
		'priority'    => 20,
		'description' => __( 'Homepage optional pages display', 'picorama' ),
		'panel'  => 'home_featured_panel',
	) );
	$wp_customize->add_setting('display_optional_pages_setting', array(
		'default'        => 1,
		'sanitize_callback' => 'picorama_sanitize_checkbox',
	));

	$wp_customize->add_control('display_optional_pages', array(
		'settings' => 'display_optional_pages_setting',
		'label'    => __('Display Optional Pages', 'picorama'),
		'section'  => 'optional_pages_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));
	// optional_pages 1
	$wp_customize->add_setting( 'optional_first_page_setting', array (
			'sanitize_callback' => 'picorama_sanitize_text_field'
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'optional_first_page', array(
		   'label'      => __( 'Select first page', 'picorama' ),
		   'section'    => 'optional_pages_section',
		   'settings'   => 'optional_first_page_setting',
		   'type'   	=> 'dropdown-pages',
		   'priority'	=> 24,
		   'active_callback' => 'picorama_active_callback'
		)
	) );
	// optional_pages 2
	$wp_customize->add_setting( 'optional_second_page_setting', array (
			'sanitize_callback' => 'picorama_sanitize_text_field'
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'optional_second_page', array(
		   'label'      => __( 'Select second page', 'picorama' ),
		   'section'    => 'optional_pages_section',
		   'settings'   => 'optional_second_page_setting',
		   'type'   	=> 'dropdown-pages',
		   'priority'	=> 24,
		   'active_callback' => 'picorama_active_callback'
		)
	) );
	
	// optional_pages 3
	$wp_customize->add_setting( 'optional_third_page_setting', array (
			'sanitize_callback' => 'picorama_sanitize_text_field'
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'optional_third_page', array(
		   'label'      => __( 'Select Third page', 'picorama' ),
		   'section'    => 'optional_pages_section',
		   'settings'   => 'optional_third_page_setting',
		   'type'   	=> 'dropdown-pages',
		   'priority'	=> 24,
		   'active_callback' => 'picorama_active_callback'
		)
	) );
}
if(get_option('page_on_front') > 0){
add_action( 'customize_register', 'picorama_customize_register_front' );
}

function picorama_slider_active_callback() {
	if ( get_theme_mod( 'display_slider_setting', 0 ) ) {
		return true;
	}
	return false;
}

function picorama_active_callback() {
	if ( get_theme_mod( 'display_optional_pages_setting', 0 ) ) {
		return true;
	}
	return false;
}

function picorama_sanitize_text_field( $str ) {
	return sanitize_text_field( $str );
}

/**
 * Sanitize integer input
 */
if ( ! function_exists( 'picorama_sanitize_integer' ) ) :
	function picorama_sanitize_integer( $input ) {		
		return absint($input);
	}
endif;

/**
 * Sanitize checkbox
 */

if (!function_exists( 'picorama_sanitize_checkbox' ) ) :
	function picorama_sanitize_checkbox( $input ) {
		if ( $input != 1 ) {
			return 0;
		} else {
			return 1;
		}
	}
endif;

if ( ! function_exists( 'picorama_sanitize_category' ) ){
	function picorama_sanitize_category( $input ) {
		$categories = get_categories();
		$cats = array();
		$i = 0;
		foreach($categories as $category){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cats[$category->slug] = $category->name;
		}
		$valid = $cats;

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';

		}
	}
}
	
/**
* Apply Color Scheme
*/
if ( ! function_exists( 'picorama_apply_color' ) ) :
  function picorama_apply_color() {
	?>
	<style id="color-settings">
	<?php if (esc_html(get_theme_mod('primary_color_setting') )) { ?>
		.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, .main-navigation .current-menu-ancestor > a, .main-navigation a:hover, .entry-meta a:hover, .site-footer a, .social-icons li a:hover .fa, .entry-title a, .sidebar-wrapper a:hover, .pagination, .site-title a:hover, .featured-container h2:hover, #menu-social li a:hover, a, .featured-container h2:hover, .entry-title{color:<?php echo esc_html(get_theme_mod('primary_color_setting')); ?>}
		.read_more, .sidebar-wrapper .widget-title, button, html input[type="button"], input[type="reset"], input[type="submit"], .slide-desc:before, .fa-chevron-right, .fa-chevron-left{background:<?php echo esc_html(get_theme_mod('primary_color_setting')); ?>;}.site-footer{ border-top: solid 3px <?php echo esc_html(get_theme_mod('primary_color_setting')); ?>;}.site-header{border-bottom: solid 3px <?php echo esc_html(get_theme_mod('primary_color_setting')); ?>;} .gallery-item:hover .gallery-icon a:before, .search-box .fa-search, .hentry:hover .archived-image-wrapper:after{background:<?php echo esc_html(get_theme_mod('primary_color_setting')); ?>}
	<?php } ?>
	
	<?php if (esc_html(get_theme_mod('secondary_color_setting')) ) { ?>
		.top-head, .site-footer, .featured-image-wrapper .entry-meta, .read_more:hover{background:<?php echo esc_html(get_theme_mod('secondary_color_setting')); ?>;}
		.entry-title a:hover{color:<?php echo get_theme_mod('secondary_color_setting'); ?>;}
	<?php } ?>
	
	<?php if( esc_html(get_theme_mod( 'image_size_setting')) == 1 ){?>
			.single-post-thumbnail {
				width: 100%;
			}
	<?php } ?>
	</style>
	<?php
  }
endif;
add_action( 'wp_head', 'picorama_apply_color' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function picorama_customize_preview_js() {
	wp_enqueue_script( 'picorama_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'picorama_customize_preview_js' );
