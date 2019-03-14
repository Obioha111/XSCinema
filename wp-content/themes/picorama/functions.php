<?php
/**
 * Picorama functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Picorama
 */

if ( ! function_exists( 'picorama_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function picorama_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Picorama, use a find and replace
	 * to change 'picorama' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'picorama', get_template_directory() . '/languages' );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_editor_style();
	add_image_size( 'picorama_widget-post-thumb',  70, 70, true );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'picorama' ),
		'top-menu'	=> esc_html__( 'Top Menu', 'picorama' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'picorama_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'picorama_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if( ! function_exists('picorama_content_width') ) {
	function picorama_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'picorama_content_width', 640 );
	}
}
add_action( 'after_setup_theme', 'picorama_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if( ! function_exists('picorama_widgets_init') ) {
	function picorama_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'picorama' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Default sidebar', 'picorama' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		
		register_sidebar( array(
			'name' => __( 'Footer One', 'picorama' ),
			'id' => 'footer-one-widget',
			'before_widget' => '<div id="footer-one" class="widget footer-widget">',
			'after_widget' => "</div>",
			'before_title' => '<h1 class="widget-title">',
			'after_title' => '</h1>',
		) );
		
		register_sidebar( array(
			'name' => __( 'Footer Two', 'picorama' ),
			'id' => 'footer-two-widget',
			'before_widget' => '<div id="footer-two" class="widget footer-widget">',
			'after_widget' => "</div>",
			'before_title' => '<h1 class="widget-title">',
			'after_title' => '</h1>',
		) );
		
		register_sidebar( array(
			'name' => __( 'Footer Three', 'picorama' ),
			'id' => 'footer-three-widget',
			'before_widget' => '<div id="footer-three" class="widget footer-widget">',
			'after_widget' => "</div>",
			'before_title' => '<h1 class="widget-title">',
			'after_title' => '</h1>',
		) );
	}
}
add_action( 'widgets_init', 'picorama_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
if( ! function_exists('picorama_scripts') ) {
	function picorama_scripts() {
		
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css', array(), false ,'screen' );
		wp_enqueue_style( 'flexslider-design', get_template_directory_uri() .'/assets/flexslider/css/flexslider.css' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/font-awesome/css/font-awesome.min.css' );
		wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() .'/assets/css/prettyPhoto.css' );
		wp_enqueue_style( 'picorama-googleFonts', '//fonts.googleapis.com/css?family=Lato:400,100,300,700,900');
		wp_enqueue_style( 'picorama-ie-style', get_stylesheet_directory_uri() . "/assets/css/ie.css", array()  );
		wp_style_add_data( 'picorama-ie-style', 'conditional', 'IE' );
		wp_enqueue_style( 'picorama-style', get_stylesheet_uri() );
	
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery') );
		wp_enqueue_script( 'flexslider-js', get_template_directory_uri() . '/js/jquery.flexslider.js', array() );
		wp_enqueue_script( 'picorama-custom-js', get_template_directory_uri() . '/js/custom.js', array() );
		wp_enqueue_script( 'prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.min.js', array('jquery'));		
		wp_enqueue_script( 'picorama-ie-responsive-js', get_template_directory_uri() . '/js/ie-responsive.min.js', array() );
		wp_script_add_data( 'picorama-ie-responsive-js', 'conditional', 'lt IE 9' );
		wp_enqueue_script( 'picorama-ie-shiv', get_template_directory_uri() . "/js/html5shiv.min.js");
		wp_script_add_data( 'picorama-ie-shiv', 'conditional', 'lt IE 9' );
		wp_enqueue_script( 'picorama-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
		wp_enqueue_script( 'picorama-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
		
		$picorama_slider_speed = 6000;
		if ( get_theme_mod( 'slider_speed_setting' ) ) {
			$picorama_slider_speed = get_theme_mod( 'slider_speed_setting' ) ;
		}
		wp_localize_script( "picorama-custom-js", "picorama_slider_speed", array('vars' => $picorama_slider_speed) );
	
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'picorama_scripts' );

if( ! function_exists('picorama_custom_title') ) {
	function picorama_custom_title($before = '', $after = '', $echo = true, $length = false) { $title = get_the_title();
	
		if ( $length && is_numeric($length) ) {
			$title = substr( $title, 0, $length );
		}
	
		if ( strlen($title)> 0 ) {
			$title = apply_filters('the_titlesmall', $before . $title . $after, $before, $after);
			if ( $echo )
				echo esc_html($title);
			else
				return $title;
		}
	}
}

add_filter( 'post_class', 'picorama_sticky_classes', 10, 3 ); 
function picorama_sticky_classes( $classes, $class, $post_id ) {

    // Bail if this is not a sticky post.
    if ( ! is_sticky() ) {
        return $classes;
	}
    $classes[] = 'sticky';

    return $classes;
}

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'picorama_register_required_plugins' );

if( ! function_exists('picorama_register_required_plugins') ) {
	function picorama_register_required_plugins() {
		
		$plugins = array(
	
			// This is an example of how to include a plugin bundled with a theme.
			array(
				'name'               => 'Social Share WordPress Plugin - AccessPress Social Share', // The plugin name.
				'slug'               => 'accesspress-social-share', // The plugin slug (typically the folder name).
				'source'             => 'https://wordpress.org/plugins/accesspress-social-share/', // The plugin source.
				'required'           => false, // If false, the plugin is only 'recommended' instead of required.
				'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
				'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			),
		);
	
		$config = array(
			'id'           => 'picorama',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);
	
		tgmpa( $plugins, $config );
	}
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

 /**
 * Custom template tags for this theme.
 */
 require get_template_directory() . '/inc/widget.php';
 
 /**
 * pagination.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

