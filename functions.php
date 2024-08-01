<?php
/**
 * blog_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blog_theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

add_filter('show_admin_bar', '__return_true');


function my_theme_enqueue_assets()
{
	wp_enqueue_style('main-style', get_stylesheet_uri());

	wp_enqueue_style('custom-style', get_template_directory_uri() . '/public/css/tailwind.css');

	wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/custom.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_assets');


function my_theme_setup()
{
	// Регистрация меню
	register_nav_menus(
		array(
			'primary' => __('Primary Menu', 'blog-theme')
		)
	);
}
add_action('after_setup_theme', 'my_theme_setup');



function blog_theme_customizer($wp_customize)
{
	// header section
	$wp_customize->add_section(
		'header_section',
		array(
			'title' => __('Header Settings', 'blog-theme'),
			'priority' => 30,
		)
	);

	// Settings for text in Header
	$wp_customize->add_setting(
		'header_text',
		array(
			'default' => __('FOR DIGITAL NERDS', 'blog-theme'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'header_text',
		array(
			'label' => __('Header Text', 'blog-theme'),
			'section' => 'header_section',
			'type' => 'text',
		)
	);

	// Settings for logo in header
	$wp_customize->add_setting(
		'header_logo',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_control(
			$wp_customize,
			'header_logo',
			array(
				'label' => __('Header Logo', 'blog-theme'),
				'section' => 'header_section',
				'settings' => 'header_logo',
				'mime_type' => 'image/svg+xml',
			)
		)
	);

	// Adding slogan section
	$wp_customize->add_section(
		'hero_section',
		array(
			'title' => __('Hero Section', 'blog-theme'),
			'priority' => 30,
		)
	);

	// Setting slogan text
	$wp_customize->add_setting(
		'slogan_text',
		array(
			'default' => __('Our space for technology 👾, design 🎨 and innovation 🚀.', 'blog-theme'),
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		'slogan_text',
		array(
			'label' => __('Slogan Text', 'blog-theme'),
			'section' => 'hero_section',
			'type' => 'textarea',
		)
	);


	// Adding big-text-area section
	$wp_customize->add_section(
		'moto_section',
		array(
			'title' => __('Moto-section', 'blog-theme'),
			'priority' => 30,
		)
	);

	// Setting slogan text
	$wp_customize->add_setting(
		'moto_text',
		array(
			'default' => __('Say something'),
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		'moto_text',
		array(
			'label' => __('Moto Text', 'blog-theme'),
			'section' => 'moto_section',
			'type' => 'textarea',
		)
	);

	// ADDING ABOUT US SECTION //
	// ADDING ABOUT US SECTION //
	// ADDING ABOUT US SECTION //
	// ADDING ABOUT US SECTION //
	$wp_customize->add_section(
		'about_us_section',
		array(
			'title' => __('About Us Section', 'blog-theme'),
			'priority' => 30,
		)
	);

	// SETUP FOR HEADER
	$wp_customize->add_setting(
		'about_us_title',
		array(
			'default' => __('About Us', 'blog-theme'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'about_us_title',
		array(
			'label' => __('Title', 'blog-theme'),
			'section' => 'about_us_section',
			'type' => 'text',
		)
	);

	// SETUP FOR DESCRIPTION
	$wp_customize->add_setting(
		'about_us_description',
		array(
			'default' => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		'about_us_description',
		array(
			'label' => __('Description', 'blog-theme'),
			'section' => 'about_us_section',
			'type' => 'textarea',
		)
	);



	// SETUP BUTTON TEXT
	$wp_customize->add_setting(
		'about_us_button_text',
		array(
			'default' => __('More about us', 'blog-theme'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'about_us_button_text',
		array(
			'label' => __('Button Text', 'blog-theme'),
			'section' => 'about_us_section',
			'type' => 'text',
		)
	);

	// SETUP BUTTON LINK
	$wp_customize->add_setting(
		'about_us_button_url',
		array(
			'default' => '#',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'about_us_button_url',
		array(
			'label' => __('Button URL', 'blog-theme'),
			'section' => 'about_us_section',
			'type' => 'url',
		)
	);

	// SETTINGS FOR CARDS
	for ($i = 1; $i <= 4; $i++) {

		// Turn the card on/off
		$wp_customize->add_setting(
			"about_us_card_{$i}_enabled",
			array(
				'default' => true,
				'sanitize_callback' => 'wp_validate_boolean',
			)
		);

		$wp_customize->add_control(
			"about_us_card_{$i}_enabled",
			array(
				'label' => __("Enable Card {$i}", 'blog-theme'),
				'section' => 'about_us_section',
				'type' => 'checkbox',
			)
		);

		// Card title
		$wp_customize->add_setting(
			"about_us_card_{$i}_title",
			array(
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			)
		);

		$wp_customize->add_control(
			"about_us_card_{$i}_title",
			array(
				'label' => __("Card {$i} Title", 'blog-theme'),
				'section' => 'about_us_section',
				'type' => 'textarea',
			)
		);

		// Card title
		$wp_customize->add_setting(
			"about_us_card_{$i}_text",
			array(
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			)
		);

		$wp_customize->add_control(
			"about_us_card_{$i}_text",
			array(
				'label' => __("Card {$i} Text", 'blog-theme'),
				'section' => 'about_us_section',
				'type' => 'textarea',
			)
		);

		// Card Image
		$wp_customize->add_setting("about_us_card_{$i}_image");

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				"about_us_card_{$i}_image",
				array(
					'label' => __("Card {$i} Image", 'blog-theme'),
					'section' => 'about_us_section',
				)
			)
		);


		// Cards order
		$wp_customize->add_setting(
			"about_us_card_{$i}_order",
			array(
				'default' => $i,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			"about_us_card_{$i}_order",
			array(
				'label' => __("Card {$i} Order", 'blog-theme'),
				'section' => 'about_us_section',
				'type' => 'select',
				'choices' => array(
					1 => __('1', 'blog-theme'),
					2 => __('2', 'blog-theme'),
					3 => __('3', 'blog-theme'),
					4 => __('4', 'blog-theme'),
				),
			)
		);
	}
}

add_action('customize_register', 'blog_theme_customizer');


function blog_theme_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'blog_theme_mime_types');

// Safety SVG Loading
function blog_theme_fix_svg()
{
	echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
    </style>';
}
add_action('admin_head', 'blog_theme_fix_svg');


//CREATING CUSTOM TYPE OF POST

function create_about_us_cards_post_type()
{
	register_post_type(
		'about_us_card',
		array(
			'labels' => array(
				'name' => __('About Us Cards'),
				'singular_name' => __('About Us Card')
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array('title', 'editor', 'thumbnail'),
		)
	);
}
add_action('init', 'create_about_us_cards_post_type');





















/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function blog_theme_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on blog_theme, use a find and replace
	 * to change 'blog_theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('blog_theme', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => __('Primary Menu', 'blog-theme')
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
			'blog_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'blog_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blog_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('blog_theme_content_width', 640);
}
add_action('after_setup_theme', 'blog_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blog_theme_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'blog_theme'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'blog_theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'blog_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function blog_theme_scripts()
{
	wp_enqueue_style('blog_theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('blog_theme-style', 'rtl', 'replace');

	wp_enqueue_script('blog_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'blog_theme_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}
