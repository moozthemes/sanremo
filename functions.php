<?php
/**
 *
 * @package sanremo
 */

global $sanremo_site_layout;
$sanremo_site_layout = array(
					'ot-sidebar-left' =>  esc_html__('Left Sidebar','sanremo'),
					'ot-sidebar-right' => esc_html__('Right Sidebar','sanremo'),
					'no-sidebar' => esc_html__('No Sidebar','sanremo'),
					'ot-full-width' => esc_html__('Full Width', 'sanremo')
					);

if ( ! function_exists( 'sanremo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sanremo_setup() {

	/*
	* Make theme available for translation.
	* Translations can be filed in the /languages/ directory.
	*/
	load_theme_textdomain( 'sanremo', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Set the content width based on the theme's design and stylesheet.
	global $content_width;
	if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
	} 

	/**
	* Enable support for Post Thumbnails on posts and pages.
	*
	* @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	*/
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'sanremo-slider', 1140, 550, true );
	add_image_size( 'sanremo-thumbnail', 750, 500, true );
	add_image_size( 'sanremo-author-thumbnail', 170, 170, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
	'top-menu' => esc_html__( 'Top Menu', 'sanremo' ),
	'footer-menu' => esc_html__( 'Footer Menu', 'sanremo' ) // secondary nav in footer
	) );

	/*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
	add_theme_support( 'html5', array(
	'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'audio', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sanremo_custom_background_args', array(
	'default-color' => 'F5F5F5',
	'default-image' => '',
	) ) );

	add_theme_support( 'custom-logo', array(
		'height'      => 140,
		'width'       => 320,
		'flex-height' => true,
	) );

	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );

}
endif; // sanremo_setup
add_action( 'after_setup_theme', 'sanremo_setup' );

/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
if ( ! function_exists( 'sanremo_the_custom_logo' ) ) :
function sanremo_the_custom_logo() {
	// Try to retrieve the Custom Logo
	$output = '';
	if ((function_exists('get_custom_logo'))&&(has_custom_logo()))
		$output = get_custom_logo();

		// Nothing in the output: Custom Logo is not supported, or there is no selected logo
		// In both cases we display the site's name
	if (empty($output))
		$output = '<hgroup><h1><a href="' . esc_url(home_url('/')) . '" rel="home">' . esc_attr(get_bloginfo('name')) . '</a></h1><div class="description">'.esc_attr(get_bloginfo('description')).'</div></hgroup>';

	echo $output;
}
endif; // sanremo_custom_logo

/*
 * Add Bootstrap classes to the main-content-area wrapper.
 */
if ( ! function_exists( 'sanremo_content_bootstrap_classes' ) ) :
function sanremo_content_bootstrap_classes() {
	if ( is_page_template( 'page-fullwidth.php' ) ) {
		return 'col-md-12';
	}
	return 'col-md-8';
}
endif; // sanremo_content_bootstrap_classes


/*
 * Generate categories for slider customizer
 */
function sanremo_cats() {
	$cats = array();
	$cats[0] = "All";
	
	foreach ( get_categories() as $categories => $category ) {
		$cats[$category->term_id] = $category->name;
	}

	return $cats;
}



/*
 * generate navigation from default bootstrap classes
 */
require_once('inc/wp_bootstrap_navwalker.php');

if ( ! function_exists( 'sanremo_header_menu' ) ) :
/*
 * Header menu (should you choose to use one)
 */
function sanremo_header_menu() {
	/* display the WordPress Custom Menu if available */
	wp_nav_menu(array(
		'menu'              => 'top-menu',
		'theme_location'    => 'top-menu',
		'depth'             => 2,
		'container'         => 'div',
		'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
		'menu_class'        => 'nav navbar-nav',
		'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		'walker'            => new wp_bootstrap_navwalker()
	));
} /* end header menu */
endif;

/*
 * load css/js
 */
function sanremo_scripts() {

	// Add Bootstrap default CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri().'/css/slick.css' );
	//  wp_enqueue_style( 'sanremo-slick-theme', get_template_directory_uri().'/css/slick-theme.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.css' );

	// Add Google Fonts
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lora:400,400italic|Open+Sans:400,700|Merriweather:300,400,500,700');

	// Add main theme stylesheet
	wp_enqueue_style( 'sanremo-style', get_stylesheet_uri() );

	// Add JS Files
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery') );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery') );
	wp_enqueue_script( 'sanremo-js', get_template_directory_uri() . '/js/sanremo.min.js', array('jquery') );

	// Threaded comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'sanremo_scripts' );

/*
 * Customizer additions.
 */
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/template_tags.php';

if ( ! function_exists( 'sanremo_woo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function sanremo_woo_setup() {
	/*
	 * Enable support for WooCemmerce.
	*/
	add_theme_support( 'woocommerce' );
}
endif; // barletta_woo_setup
add_action( 'after_setup_theme', 'sanremo_woo_setup' );

/*
 * Register widget areas.
 */

// if no title then add widget content wrapper to before widget
add_filter( 'dynamic_sidebar_params', 'sanremo_sidebar_params' );
function sanremo_sidebar_params( $params ) {
	global $wp_registered_widgets;

	$settings_getter = $wp_registered_widgets[ $params[0]['widget_id'] ]['callback'][0];
	$settings = $settings_getter->get_settings();
	$settings = $settings[ $params[1]['number'] ];

	if ( $params[0][ 'after_widget' ] == '</div></div>' && isset( $settings[ 'title' ] ) && empty( $settings[ 'title' ] ) )
		$params[0][ 'before_widget' ] .= '<div class="content">';

	return $params;
}

function sanremo_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'sanremo' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', 'sanremo' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="sidebar-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Content Sidebar', 'sanremo' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Additional sidebar that appears on the right.', 'sanremo' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="sidebar-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'sanremo' ),
		'id'            => 'footer-widget-1',
		'description'   => __( 'Appears in the footer section of the site.', 'sanremo' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'sanremo' ),
		'id'            => 'footer-widget-2',
		'description'   => __( 'Appears in the footer section of the site.', 'sanremo' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'sanremo' ),
		'id'            => 'footer-widget-3',
		'description'   => __( 'Appears in the footer section of the site.', 'sanremo' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Full Width Footer Wide Widget', 'sanremo' ),
		'id'            => 'footer-wide-widget',
		'description'   => __( 'Full width footer area for Instagram, etc. Appears in the footer section after widgets.', 'sanremo' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_widget( 'sanremo_recent_posts' );
	register_widget( 'sanremo_social_widget' );
}
add_action( 'widgets_init', 'sanremo_widgets_init' );

function sanremo_widget_content_wrap($content) {
	$content = '<div class="block-content">'.$content.'</div>';
	return $content;
}
add_filter('widget_calendar', 'sanremo_widget_content_wrap');

/*
 * Theme Widgets
 */
require_once(get_template_directory() . '/inc/widgets/widget-sanremo-posts.php');
require_once(get_template_directory() . '/inc/widgets/widget-sanremo-social.php');

/*
 * Misc. functions
 */

/**
 * Footer credits
 */
function sanremo_footer_credits() {
	?>
	<div class="site-info">
	&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?><?php esc_html_e('. All rights reserved.', 'sanremo'); ?>
	</div><!-- .site-info -->

	<?php
	$nofollow="";
	if (!is_home()) { $nofollow="rel=\"nofollow\""; }
	printf( esc_html__( 'Theme by %1$s Powered by %2$s', 'sanremo' ) , '<a href="http://moozthemes.com/" target="_blank" '.$nofollow.'>MOOZ Themes</a>', '<a href="http://wordpress.org/" target="_blank">WordPress</a>');
}
add_action( 'sanremo_footer', 'sanremo_footer_credits' );

/* Wrap Post count in a span */
add_filter('wp_list_categories', 'sanremo_cat_count_span');
function sanremo_cat_count_span($links) {
	$links = str_replace('</a> (', '</a> <span>', $links);
	$links = str_replace(')', '</span>', $links);
	return $links;
}

// Remove search text from search widget
add_filter('get_search_form', 'sanremo_search_form');
 
function sanremo_search_form($text) {
	$text = str_replace('value="Search"', 'value=""', $text);
	return $text;
}