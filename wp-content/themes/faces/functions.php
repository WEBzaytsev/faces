<?php
/**
 * faces functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package faces
 */

if ( ! defined( '_FACES_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_FACES_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function faces_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on faces, use a find and replace
		* to change 'faces' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'faces', get_template_directory() . '/languages' );

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
			'footer-menu' => esc_html__( 'footer', 'faces' ),
            'header-menu' => esc_html__('header', 'faces'),
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
			'faces_custom_background_args',
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
add_action( 'after_setup_theme', 'faces_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function faces_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'faces_content_width', 640 );
}
add_action( 'after_setup_theme', 'faces_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function faces_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'faces' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'faces' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'faces_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function faces_scripts() {
	wp_enqueue_style( 'faces-style', get_stylesheet_uri(), array(), _FACES_VERSION );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/dist/css/main.css', array(), _FACES_VERSION );
    wp_enqueue_style( 'font-manrope', 'https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap', array(), _FACES_VERSION );
    wp_enqueue_style( 'font-tenor', 'https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap', array(), _FACES_VERSION );
	wp_style_add_data( 'faces-style', 'rtl', 'replace' );

	wp_enqueue_script( 'faces-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _FACES_VERSION, true );
	wp_enqueue_script( 'slick-slider', get_template_directory_uri() . '/dist/libs/js/slick.min.js', array('jquery'), _FACES_VERSION, true );
	wp_enqueue_script( 'select2', get_template_directory_uri() . '/dist/libs/js/select2.min.js', array('jquery'), _FACES_VERSION, true );
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/dist/js/main.js', array('slick-slider', 'select2'), _FACES_VERSION, true );
    wp_localize_script('main-script', 'js_settings', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'home_url' => get_home_url(),
        'current_page' => getPage(),
    ));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'faces_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Set options panel
 */
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title'	=> 'General Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));
}

/**
 * Create custom post types
 */
require get_template_directory() . '/includes/custom-post-type.php';

add_action( 'init', 'bloggers_create_post_type');
add_action( 'init', 'cases_create_post_type');

/**
 * Create custom taxonomies
 */

require get_template_directory() . '/includes/custom-taxonomy.php';

add_action( 'init', 'bloggers_register_taxonomy');
add_action( 'init', 'cases_register_taxonomy');

/**
 * Set ACF JSON
 */
require get_template_directory() . '/includes/acf-json-settings.php';

/**
 * Get current page
 */
function getPage() {
    $page_id = get_the_ID();

    if (is_front_page()) {
        return 'home';
    } elseif ($page_id == 47 || $page_id == 427) {
        return  'cases';
    } elseif ($page_id == 43 || $page_id == 430) {
        return  'bloggers';
    } elseif ($page_id == 45 || $page_id == 432) {
        return  'about';
    }

    return false;
}

/**
 * Ajax queries
 */

add_action( 'wp_ajax_ajax_cases', 'ajax_cases_function' );
add_action( 'wp_ajax_nopriv_ajax_cases', 'ajax_cases_function' );
require get_template_directory() . '/includes/ajax-cases-function.php';

add_action( 'wp_ajax_ajax_bloggers', 'ajax_bloggers_function' );
add_action( 'wp_ajax_nopriv_ajax_bloggers', 'ajax_bloggers_function' );
require get_template_directory() . '/includes/ajax-bloggers-function.php';

// modal windows
add_action( 'wp_ajax_ajax_modal', 'ajax_modal' );
add_action( 'wp_ajax_nopriv_ajax_modal', 'ajax_modal' );
require get_template_directory() . '/includes/modal-window.php';