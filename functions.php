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


function blog_theme_load_more_posts()
{
	// Получаем номер следующей страницы из POST-запроса
	$paged = $_POST['paged'] + 1;

	// Настройка параметров запроса
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => 4, // Количество постов на одной странице
		'paged' => $paged
	);

	// Выполнение запроса
	$query = new WP_Query($args);

	// Если есть посты, выводим их
	if ($query->have_posts()):
		while ($query->have_posts()):
			$query->the_post(); ?>
			<div class="card">
				<?php if (has_post_thumbnail()): ?>
					<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
				<?php else: ?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/post_picture_fallback.png" alt="<?php the_title(); ?>">
				<?php endif; ?>
				<div class="card-body">
					<div class="card-top">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php the_excerpt(); ?>
					</div>
					<div class="author-info flex">
						<div class="author-left">
							<div class="font-bold"><span><?php the_author(); ?></span> •</div>
							<div><span><?php echo get_the_date(); ?></span> • &bull; <span><?php comments_number(); ?></span></div>
						</div>
						<a href="<?php the_permalink(); ?>">
							<div class="author-right flex w-[2rem] hover:scale-[1.3] transition-all cursor-pointer">
								<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
									<g>
										<path d="M0 0h24v24H0z" fill="none" />
										<path
											d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 9H8v2h4v3l4-4-4-4v3z" />
									</g>
								</svg>
							</div>
						</a>
					</div>
				</div>
			</div>
		<?php endwhile;
		wp_reset_postdata();
	else:
		echo 'no_more_posts';
	endif;

	wp_die(); // Завершение выполнения скрипта
}

// Регистрация AJAX-действий для авторизованных и неавторизованных пользователей
add_action('wp_ajax_load_more_posts', 'blog_theme_load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'blog_theme_load_more_posts');




function blog_theme_enqueue_scripts()
{
	wp_enqueue_script('load-more', get_template_directory_uri() . '/js/load-more.js', array(), null, true);

	wp_localize_script(
		'load-more',
		'load_more_params',
		array(
			'ajaxurl' => admin_url('admin-ajax.php'),
			'paged' => 1
		)
	);
}
add_action('wp_enqueue_scripts', 'blog_theme_enqueue_scripts');












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
