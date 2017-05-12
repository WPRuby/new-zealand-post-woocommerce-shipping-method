<?php        
/**
 * Mediquip Plus functions and definitions
 *
 * @package Mediquip Plus
 */

function mediquip_plus_custom_excerpt_length( $length ) {
	return 30;   
}
add_filter( 'excerpt_length', 'mediquip_plus_custom_excerpt_length', 999 );
 

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'mediquip_plus_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function mediquip_plus_setup() {
	global $content_width;   
	if ( ! isset( $content_width ) )
		$content_width = 680; /* pixels */

	load_theme_textdomain( 'mediquip-plus', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );	
	add_theme_support( 'custom-header', array( 
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );
	
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'mediquip-plus' ),
		'footer' => __( 'Footer Menu', 'mediquip-plus' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // mediquip_plus_setup
add_action( 'after_setup_theme', 'mediquip_plus_setup' );


function mediquip_plus_widgets_init() { 	
	
	register_sidebar( array( 
		'name'          => __( 'Blog Sidebar', 'mediquip-plus' ),
		'description'   => __( 'Appears on blog page sidebar', 'mediquip-plus' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Header Widget', 'mediquip-plus' ),
		'description'   => __( 'Appears on header', 'mediquip-plus' ),
		'id'            => 'header-1',
		'before_widget' => '<aside id="%1$s" class="headerInfo %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'mediquip-plus' ),
		'description'   => __( 'Appears on footer', 'mediquip-plus' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-1 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'mediquip-plus' ),
		'description'   => __( 'Appears on footer', 'mediquip-plus' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-2 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'mediquip-plus' ),
		'description'   => __( 'Appears on footer', 'mediquip-plus' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'mediquip-plus' ),
		'description'   => __( 'Appears on footer', 'mediquip-plus' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-4 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );		
	
}
add_action( 'widgets_init', 'mediquip_plus_widgets_init' );


function mediquip_plus_font_url(){
		$font_url = '';			
		/* Translators: If there are any character that are not
		* supported by Roboto, trsnalate this to off, do not
		* translate into your own language.
		*/
		$roboto = _x('on','roboto:on or off','mediquip-plus');		
		if('off' !== $roboto ){
			$font_family = array();			
			if('off' !== $roboto){
				$font_family[] = 'Roboto:300,400,600,700,800,900';
			}						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}		
	return $font_url;
	}

function mediquip_plus_scripts() {
	wp_enqueue_style('mediquip-plus-font', mediquip_plus_font_url(), array());
	wp_enqueue_style( 'mediquip-plus-basic-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'mediquip-plus-responsive', get_template_directory_uri()."/css/responsive.css" );		
	wp_enqueue_style( 'mediquip-plus-default', get_template_directory_uri()."/css/default.css" );
	wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'mediquip-plus-custom', get_template_directory_uri() . '/js/custom.js' );	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri()."/css/font-awesome.css" );
		

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mediquip_plus_scripts' );

function mediquip_plus_ie_stylesheet(){		
	/** Load our IE-only stylesheet for all versions of IE.
	*   <!--[if lt IE 9]> ... <![endif]-->
	*
	*  Note: It is also possible to just check and see if the $is_IE global in WordPress is set to true before
	*  calling the wp_enqueue_style() function. If you are trying to load a stylesheet for all browsers
	*  EXCEPT for IE, then you would HAVE to check the $is_IE global since WordPress doesn't have a way to
	*  properly handle non-IE conditional comments.
	*/
	wp_enqueue_style('mediquip-plus_ie', get_template_directory_uri().'/css/ie.css', array('mediquip-plus-style'), '20161202');
	wp_style_add_data('mediquip-plus-ie','conditional','IE');
	}
add_action('wp_enqueue_scripts','mediquip_plus_ie_stylesheet');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
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

if ( ! function_exists( 'mediquip_plus_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function mediquip_plus_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;