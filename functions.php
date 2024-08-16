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

add_filter('show_admin_bar', '__return_false');
function custom_excerpt_length($length)
{
	return 30; // Замените 20 на нужное вам количество слов
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);


function my_theme_enqueue_assets()
{
	wp_enqueue_style('main-style', get_stylesheet_uri());

	wp_enqueue_style('custom-style', get_template_directory_uri() . '/public/css/tailwind.css');

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


//  



//Additional classes for BODY (for pseudoelements)
function add_custom_body_class($classes)
{
	if (is_page('about-us')) {
		$classes[] = 'about-page';
	} elseif (is_home() || is_archive()) {
		$classes[] = 'blog-page';
	}
	return $classes;
}
add_filter('body_class', 'add_custom_body_class');



function custom_scroll_script()
{
	?>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			window.addEventListener('scroll', function () {
				if (window.scrollY > 100) {
					document.body.classList.add('scroll');
				} else {
					document.body.classList.remove('scroll');
				}
			});
		});
	</script>
	<?php
}
add_action('wp_footer', 'custom_scroll_script');


function blog_theme_customizer($wp_customize)
{

	//PANEL  MAIN PAGE
	//PANEL  MAIN PAGE
	$wp_customize->add_panel(
		'front_page_panel',
		array(
			'title' => __('Front Page', 'blog-theme'),
			'description' => __('Settings for the front page of the theme.', 'blog-theme'),
			'priority' => 10, // panel priority
		)
	);

	//PANEL BLOG PAGE
	//PANEL BLOG PAGE

	$wp_customize->add_panel(
		'blog_page_panel',
		array(
			'title' => __('BLog  Page', 'blog-theme'),
			'description' => __('Settings for the blog  page of the theme.', 'blog-theme'),
			'priority' => 12, // panel priority
		)
	);

	//ABOUT US PAGE
	//ABOUT US PAGE

	$wp_customize->add_panel(
		'about_page_panel',
		array(
			'title' => __('About us page', 'blog-theme'),
			'description' => __('Settings for the ABOUT US page of the theme.', 'blog-theme'),
			'priority' => 13, // panel priority
		)
	);


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
			'default' => __('FOR DIGITAL NERDS!!!', 'blog-theme'),
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



	// SLOGAN SECTION
	// SLOGAN SECTION
	// SLOGAN SECTION
	// SLOGAN SECTION
	// SLOGAN SECTION



	$wp_customize->add_section(
		'slogan_section',
		array(
			'title' => __('Slogan Section', 'blog-theme'),
			'panel' => 'front_page_panel',
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
			'section' => 'slogan_section',
			'type' => 'textarea',
		)
	);


	//FRONT PAGE COLORS SECTION
	$wp_customize->add_section(
		'front_page_main_colors',
		array(
			'title' => __('FRONT PAGE colors', 'blog-theme'),
			'panel' => 'front_page_panel',
			'priority' => 20,
		)
	);
	//BLOG COLOR
	$wp_customize->add_setting(
		'main_color_1',
		array(
			'default' => '#ffe005',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'main_color_1',
			array(
				'label' => __('Main color 1 (Blog color)', 'blog-theme'),
				'section' => 'front_page_main_colors',
			)
		)
	);

	//About Us COLOR
	$wp_customize->add_setting(
		'main_color_2',
		array(
			'default' => '#5f369c',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'main_color_2',
			array(
				'label' => __('Main color 2 (About us color)', 'blog-theme'),
				'section' => 'front_page_main_colors',
			)
		)
	);

	//Tech Stack COLOR
	$wp_customize->add_setting(
		'main_color_3',
		array(
			'default' => '#d63798',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'main_color_3',
			array(
				'label' => __('Main color 3 (Tech Stack color)', 'blog-theme'),
				'section' => 'front_page_main_colors',
			)
		)
	);



	// Three color cards section
	// Three color cards section
	// Three color cards section
	// Three color cards section
	// Three color cards section


	$wp_customize->add_section(
		'color_cards_section',
		array(
			'title' => __('Three color cards', 'blog-theme'),
			'panel' => 'front_page_panel',
			'priority' => 20,
		)
	);

	// First card
	$wp_customize->add_setting(
		'card_1_title',
		array(
			'default' => 'Blog',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'card_1_title',
		array(
			'label' => __('Card 1 Title', 'blog-theme'),
			'section' => 'color_cards_section',
			'type' => 'text',
		)
	);



	// Second card
	$wp_customize->add_setting(
		'card_2_title',
		array(
			'default' => 'About Us',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'card_2_title',
		array(
			'label' => __('Card 2 Title', 'blog-theme'),
			'section' => 'color_cards_section',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'card_2_count',
		array(
			'default' => '122',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'card_2_count',
		array(
			'label' => __('Count of Digital Nerds', 'blog-theme'),
			'section' => 'color_cards_section',
			'type' => 'number',
		)
	);




	// Third card
	$wp_customize->add_setting(
		'card_3_title',
		array(
			'default' => 'About Us',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'card_3_title',
		array(
			'label' => __('Card 3 Title', 'blog-theme'),
			'section' => 'color_cards_section',
			'type' => 'text',
		)
	);






	// Adding big-text-area section
	$wp_customize->add_section(
		'moto_section',
		array(
			'title' => __('Moto-section', 'blog-theme'),
			'panel' => 'front_page_panel',
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


	//BLOG SECTION //
	//BLOG SECTION //
	//BLOG SECTION //
	//BLOG SECTION //

	$wp_customize->add_section(
		'blog_section',
		array(
			'title' => __('Blog Section', 'blog-theme'),
			'panel' => 'front_page_panel',
			'priority' => 30,
		)
	);

	// Blog-section title
	$wp_customize->add_setting(
		'blog_section_title',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'blog_section_title',
		array(
			'label' => __('Section Title', 'blog-theme'),
			'section' => 'blog_section',
			'type' => 'text',
		)
	);

	// Blog description
	$wp_customize->add_setting(
		'blog_section_description',
		array(
			'default' => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		'blog_section_description',
		array(
			'label' => __('Section Description', 'blog-theme'),
			'section' => 'blog_section',
			'type' => 'textarea',
		)
	);

	//Posts count
	$wp_customize->add_setting(
		'blog_section_post_count',
		array(
			'default' => 4,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'blog_section_post_count',
		array(
			'label' => __('Number of Posts', 'blog-theme'),
			'section' => 'blog_section',
			'type' => 'number',
		)
	);

	// Button's text
	$wp_customize->add_setting(
		'blog_section_button_text',
		array(
			'default' => __('Explore all posts', 'blog-theme'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'blog_section_button_text',
		array(
			'label' => __('Button Text', 'blog-theme'),
			'section' => 'blog_section',
			'type' => 'text',
		)
	);

	// Button's url
	$wp_customize->add_setting(
		'blog_section_button_url',
		array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'blog_section_button_url',
		array(
			'label' => __('Button URL', 'blog-theme'),
			'section' => 'blog_section',
			'type' => 'url',
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
			'panel' => 'front_page_panel',
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


	// ADDING Tech Stack SECTION //
	// ADDING Tech Stack SECTION //
	// ADDING Tech Stack SECTION //
	// ADDING Tech Stack SECTION //
	$wp_customize->add_section(
		'tech_stack_section',
		array(
			'title' => __('Tech Stack Section', 'blog-theme'),
			'panel' => 'front_page_panel',
			'priority' => 30,
		)
	);

	// SETUP FOR HEADER
	$wp_customize->add_setting(
		'tech_stack_title',
		array(
			'default' => __('Tech Stack', 'blog-theme'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'tech_stack_title',
		array(
			'label' => __('Title', 'blog-theme'),
			'section' => 'tech_stack_section',
			'type' => 'text',
		)
	);

	// SETUP FOR DESCRIPTION
	$wp_customize->add_setting(
		'tech_stack_description',
		array(
			'default' => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		'tech_stack_description',
		array(
			'label' => __('Description', 'blog-theme'),
			'section' => 'tech_stack_section',
			'type' => 'textarea',
		)
	);



	// SETUP BUTTON TEXT
	$wp_customize->add_setting(
		'tech_stack_button_text',
		array(
			'default' => __('How we code', 'blog-theme'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'tech_stack_button_text',
		array(
			'label' => __('Button Text', 'blog-theme'),
			'section' => 'tech_stack_section',
			'type' => 'text',
		)
	);

	// SETUP BUTTON LINK
	$wp_customize->add_setting(
		'tech_stack_button_url',
		array(
			'default' => '/about',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'tech_stack_button_url',
		array(
			'label' => __('Button URL', 'blog-theme'),
			'section' => 'tech_stack_section',
			'type' => 'url',
		)
	);




	//BLOG PAGE 

	// Blog page title section
	$wp_customize->add_section(
		'blog_page_title_section',
		array(
			'title' => __('Blog page title', 'blog-theme'),
			'panel' => 'blog_page_panel',
			'priority' => 30,
		)
	);

	// Blog page CONTENT section
	$wp_customize->add_section(
		'blog_page_content_section',
		array(
			'title' => __('Blog page content', 'blog-theme'),
			'panel' => 'blog_page_panel',
			'priority' => 30,
		)
	);

	// Settings for text in title
	$wp_customize->add_setting(
		'blog_page_title',
		array(
			'default' => __('Want to stay up to date with our latest topics?', 'blog-theme'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'blog_page_title',
		array(
			'label' => __('Header Text', 'blog-theme'),
			'section' => 'blog_page_title_section',
			'type' => 'text',
		)
	);

	// Settings for posts count on the page by default
	$wp_customize->add_setting(
		'blog_page_count',
		array(
			'default' => __('8', 'blog-theme'),
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'blog_page_count',
		array(
			'label' => __('Number of posts by default', 'blog-theme'),
			'section' => 'blog_page_content_section',
			'type' => 'number',
		)
	);



	$wp_customize->add_section(
		'big_text_section',
		array(
			'title' => __('Big text section', 'blog-theme'),
			'panel' => 'about_page_panel',
			'priority' => 30,
		)
	);

	// Settings for number 
	$wp_customize->add_setting(
		'about_number',
		array(
			'default' => __('122', 'blog-theme'),
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'about_number',
		array(
			'label' => __('Number', 'blog-theme'),
			'section' => 'big_text_section',
			'type' => 'number',
			'priority' => 10,
		)
	);

	// Settings for text1
	$wp_customize->add_setting(
		'about_text_1',
		array(
			'default' => __('We are', 'blog-theme'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'about_text_1',
		array(
			'label' => __('We are', 'blog-theme'),
			'section' => 'big_text_section',
			'type' => 'text',
			'priority' => 9,
		)
	);

	// Settings for DIGITAL
	$wp_customize->add_setting(
		'about_text_2',
		array(
			'default' => __('Digital', 'blog-theme'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'about_text_2',
		array(
			'label' => __('Digital', 'blog-theme'),
			'section' => 'big_text_section',
			'type' => 'text',
			'priority' => 11,
		)
	);
	// Settings for NERDS
	$wp_customize->add_setting(
		'about_text_3',
		array(
			'default' => __('Nerds', 'blog-theme'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'about_text_3',
		array(
			'label' => __('Nerds', 'blog-theme'),
			'section' => 'big_text_section',
			'type' => 'text',
			'priority' => 12,
		)
	);

	//SECTION WITH CARDS
	$wp_customize->add_section(
		'about_cards',
		array(
			'title' => __('Role Cards', 'blog-theme'),
			'panel' => 'about_page_panel',
			'priority' => 30,
		)
	);

	// SETTINGS FOR ROLE CARDS
	for ($i = 1; $i <= 4; $i++) {



		// Card title
		$wp_customize->add_setting(
			"about_page_card_{$i}_title",
			array(
				'default' => '',
				'sanitize_callback' => 'wp_kses_post',
			)
		);

		$wp_customize->add_control(
			"about_page_card_{$i}_title",
			array(
				'label' => __("Card {$i} Title", 'blog-theme'),
				'section' => 'about_cards',
				'type' => 'textarea',
			)
		);



		// Card Image
		$wp_customize->add_setting("about_page_card_{$i}_image");

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				"about_page_card_{$i}_image",
				array(
					'label' => __("Card {$i} Image", 'blog-theme'),
					'section' => 'about_cards',
				)
			)
		);


		// Cards order
		$wp_customize->add_setting(
			"about_page_card_{$i}_order",
			array(
				'default' => $i,
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			"about_page_card_{$i}_order",
			array(
				'label' => __("Card {$i} Order", 'blog-theme'),
				'section' => 'about_cards',
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

function create_tech_stack_cards_post_type()
{
	register_post_type(
		'tech_stack_card',
		array(
			'labels' => array(
				'name' => __('Tech Stack Cards'),
				'singular_name' => __('Tech Stack Card')
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array('title', 'editor', 'thumbnail'),
		)
	);
}
add_action('init', 'create_tech_stack_cards_post_type');

function register_about_post_type()
{
	$labels = array(
		'name' => 'About Posts',
		'singular_name' => 'About Post',
		'menu_name' => 'About Posts',
		'name_admin_bar' => 'About Post',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New About Post',
		'new_item' => 'New About Post',
		'edit_item' => 'Edit About Post',
		'view_item' => 'View About Post',
		'all_items' => 'All About Posts',
		'search_items' => 'Search About Posts',
		'parent_item_colon' => 'Parent About Posts:',
		'not_found' => 'No about posts found.',
		'not_found_in_trash' => 'No about posts found in Trash.'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'about'),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields'),
		'show_in_rest' => true,
	);

	register_post_type('about', $args);
}
add_action('init', 'register_about_post_type');



//EMPLOYEE CARDS POST TYPE

function create_employee_post_type()
{
	register_post_type(
		'employee_card',
		array(
			'labels' => array(
				'name' => __('Employee Cards'),
				'singular_name' => __('Employee Card')
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array('title', 'editor', 'thumbnail'),
			'menu_icon' => 'dashicons-id', // Иконка в меню админки
			'rewrite' => array('slug' => 'employees'),
		)
	);
}
add_action('init', 'create_employee_post_type');



function custom_blocks_enqueue_assets()
{
	// Подключение JS файла блока
	wp_enqueue_script(
		'custom-blocks',
		get_template_directory_uri() . '/js/custom-blocks.js',
		array('wp-blocks', 'wp-element', 'wp-editor', 'wp-components'),
		filemtime(get_template_directory() . '/js/custom-blocks.js')
	);

	// Подключение CSS файла блока
	wp_enqueue_style(
		'custom-blocks-style',
		get_template_directory_uri() . '/css/custom-blocks-editor.css',
		array(),
		filemtime(get_template_directory() . '/css/custom-blocks-editor.css')
	);
}

add_action('enqueue_block_editor_assets', 'custom_blocks_enqueue_assets');




//TEALIUM SCRIPT

function enqueue_tealium_script()
{

	wp_enqueue_script(
		'tealium-consent-script', // Uniq id
		get_template_directory_uri() . '/js/tealium-consent.js', // Path
		array(), // dependences
		null, // Version
		true // Used in footer (true) or in Header (false)
	);
}
add_action('wp_enqueue_scripts', 'enqueue_tealium_script');





function load_wp_media_files()
{
	wp_enqueue_media();
	wp_enqueue_script('meta-box-image', get_template_directory_uri() . '/js/meta-box-image.js', array('jquery'));
}
add_action('admin_enqueue_scripts', 'load_wp_media_files');




function add_custom_message_above_editor()
{
	global $post_type;

	// post type - only "about"
	if ($post_type == 'about') {
		echo '<div class="custom-editor-message" style="font-size: 2rem; margin-bottom: 10px; padding: 10px; background-color: #f1f1f1; border-left: 4px solid #0073aa;">
                <p style="font-size: 1.5rem;"><strong>Note:</strong> Use main field to enter the short content for the post. This text will appear on the "About us" page.</p>
              </div>';
	}
}
add_action('edit_form_after_title', 'add_custom_message_above_editor');














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
