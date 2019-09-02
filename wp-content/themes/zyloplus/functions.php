<?php  
/**
 *zyloplus functions and definitions
 *
 * @package Zyloplus
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'zyloplus_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails. 
 */
function zyloplus_setup() { 
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 670; /* pixels */
	load_theme_textdomain( 'zyloplus', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );	
	add_theme_support( 'title-tag' );	
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'zyloplus' ),		
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // zyloplus_setup
add_action( 'after_setup_theme', 'zyloplus_setup' );

function zyloplus_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'zyloplus' ),
		'description'   => __( 'Appears on blog page sidebar', 'zyloplus' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Header Widget', 'zyloplus' ),
		'description'   => __( 'Appears on header of site', 'zyloplus' ),
		'id'            => 'headerwidget',
		'before_widget' => '<div class="headerwidget">',	
		'after_widget'  => '</div>',	
		'before_title'  => '<h4 style="display:none">',
		'after_title'   => '</h4>',		
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget', 'zyloplus' ),
		'description'   => __( 'Appears on footer of site', 'zyloplus' ),
		'id'            => 'sidebar-footer',
		'before_widget' => '<div class="footerinfo">',	
		'after_widget'  => '</div>',	
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',		
	) );
	
}
add_action( 'widgets_init', 'zyloplus_widgets_init' );
function zyloplus_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Montserrat, trsnalate this to off, do not
		* translate into your own language.
		*/
		$montserrat = _x('on','montserrat:on or off','zyloplus');			
		if('off' !== $montserrat ){
			$font_family = array();			
			if('off' !== $montserrat){
				$font_family[] = 'Montserrat:300,400,600,700,800,900';
			}						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}		
	return $font_url;
	}
function zyloplus_scripts() {
	wp_enqueue_style('zyloplus-font', zyloplus_font_url(), array());
	wp_enqueue_style( 'zyloplus-basic-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'zyloplus-responsive', get_template_directory_uri()."/css/responsive.css" );		
	wp_enqueue_style( 'zyloplus-default', get_template_directory_uri()."/css/default.css" );
	wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'zyloplus-custom', get_template_directory_uri() . '/js/custom.js' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri()."/css/font-awesome.css" );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'zyloplus_scripts' );

function zyloplus_ie_stylesheet(){
	
	/** Load our IE-only stylesheet for all versions of IE.
	*   <!--[if lt IE 9]> ... <![endif]-->
	*
	*  Note: It is also possible to just check and see if the $is_IE global in WordPress is set to true before
	*  calling the wp_enqueue_style() function. If you are trying to load a stylesheet for all browsers
	*  EXCEPT for IE, then you would HAVE to check the $is_IE global since WordPress doesn't have a way to
	*  properly handle non-IE conditional comments.
	*/
	wp_enqueue_style('zyloplus-ie', get_template_directory_uri().'/css/ie.css', array('zyloplus-style'));
	wp_style_add_data('zyloplus-ie','conditional','IE');
	}
add_action('wp_enqueue_scripts','zyloplus_ie_stylesheet');

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

if ( ! function_exists( 'zyloplus_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function zyloplus_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;