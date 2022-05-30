<?php
/**
 * Nepal News Australia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nepal_News_Australia
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nepal_news_australia_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Nepal News Australia, use a find and replace
		* to change 'nepal-news-australia' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'nepal-news-australia', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1'			 => esc_html__( 'Primary', 'nepal-news-australia' ),
			'footer-widget-menu' => esc_html__( 'Footer Widget', 'nepal-news-australia' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'nepal_news_australia_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'nepal_news_australia_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nepal_news_australia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nepal_news_australia_content_width', 640 );
}
add_action( 'after_setup_theme', 'nepal_news_australia_content_width', 0 );

// Hide Login Errors in WordPress
function remove_default_login_errors(){
	return 'Error: Username or Password is Incorrect.';
}
add_filter( 'login_errors', 'remove_default_login_errors' );

// Change the Footer in WordPress Admin Panel
add_filter('admin_footer_text', function() {
echo '<i><b>Developed By <a href="https://webtechnepal.com/" target="_blank">Webtech Nepal</a></b></i>';
});

## Remove Howdy Text
function replace_howdy ( $wp_admin_bar ) {
    $avatar = get_avatar( get_current_user_id(), 16 );
    if ( ! $wp_admin_bar->get_node( 'my-account' ) )
        return;
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => sprintf( 'Logged In :  %s', wp_get_current_user()->display_name ) . $avatar,
    ) );
}
add_action( 'admin_bar_menu', 'replace_howdy' );

// Change the login logo with yours
function my_custom_login_logo() {
 echo '<style type="text/css">
.login h1 a { 
    background-image:url('.get_bloginfo('template_directory').'/images/logo.svg) !important;
    background-size: 200px !important;
    width: 100% !important;
    height: 55px !important;
    }
 </style>';
}
add_action('login_head', 'my_custom_login_logo');

// change logo url
add_filter('login_headerurl', 'custom_loginlogo_url');
function custom_loginlogo_url($url) {
     return home_url('/');
}