<?php

/**
 * chess store functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package chess_store
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function chess_store_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on chess store, use a find and replace
		* to change 'chess-store' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('chess-store', get_template_directory() . '/languages');

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
			'header' => esc_html__('Header Menu', 'chess-store'),
			'footer' => esc_html__('Footer Menu', 'chess-store'),
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
			'chess_store_custom_background_args',
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
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_image_size('cat-background', '336', '257', true);
}
add_action('after_setup_theme', 'chess_store_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chess_store_content_width()
{
	$GLOBALS['content_width'] = apply_filters('chess_store_content_width', 640);
}
add_action('after_setup_theme', 'chess_store_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function chess_store_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'chess-store'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'chess-store'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'chess_store_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function chess_store_scripts()
{
	wp_enqueue_style('chess-store-style', get_stylesheet_uri(), array());
	wp_enqueue_style('chess-store-main-style', get_template_directory_uri() . '/css/main.css');
	wp_enqueue_style('chess-store-main-style-extend', get_template_directory_uri() . '/css/style.css');

	wp_style_add_data('chess-store-style', 'rtl', get_template_directory_uri() . 'style.rtl.css');

	wp_enqueue_script('chess-store-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true);


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'chess_store_scripts');

/**
 * Add Custom Font
 */
function register_custom_font()
{
	wp_register_style('Heebo', 'https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;600;700&display=swap');
	wp_enqueue_style('Heebo');
	wp_register_style('Inter', 'https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700&display=swap');
	wp_enqueue_style('Inter');
}
add_action('wp_enqueue_scripts', 'register_custom_font');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Nav Walker into WordPress.
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

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
 * Declaring Woocommerce Support
 */
add_theme_support('woocommerce');

/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments)
{
	global $woocommerce;

	ob_start();

?>
	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
		<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?> – <?php echo $woocommerce->cart->get_cart_total(); ?>
	</a>
<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}

/**
 * Return list of products
 * in current category for  category archive
 *
 * @return Array
 */
function get_products_in_category()
{
	$id = get_queried_object_id();

	$args = array(
		'post_type'             => 'product',
		'post_status'           => 'publish',
		'ignore_sticky_posts'   => 1,
		'posts_per_page'        => '8',
		'tax_query'             => array(
			array(
				'taxonomy'      => 'product_cat',
				'field' 		=> 'term_id',
				'terms'         => $id,
				'operator'      => 'IN'
			),
			array(
				'taxonomy'      => 'product_visibility',
				'field'         => 'slug',
				'terms'         => 'exclude-from-catalog',
				'operator'      => 'NOT IN'
			)
		),
	);
	$products = new WP_Query($args);

	wp_reset_query();
	return $products->posts;
}

/**
 * Get Homepage Product Categories
 */
function get_homepage_categories()
{

	$terms = get_terms([
		'taxonomy'		=> 'product_cat',
		'hide_empty'	=> false,
		'parent'		=> 0,
		// 'number'		=> 8,
	]);

	return $terms;
}

/**
 * Promoted Featured Products
 */
function get_promoted_products()
{
	$meta_query  = WC()->query->get_meta_query();

	$tax_query[] = array(
		'taxonomy' => 'product_visibility',
		'field'    => 'name',
		'terms'    => 'featured',
		'operator' => 'IN',
	);

	$args = array(
		'post_type'           => 'product',
		'post_status'         => 'publish',
		'posts_per_page'      => 4,
		'meta_query'          => $meta_query,
		'tax_query'           => $tax_query,
	);

	$products = new WP_Query($args);
?>
	<section class="chess-price">
		<div class="row">

			<?php foreach ($products->posts as $product) : ?>

				<?php
				$post_object = get_post($product->ID);

				setup_postdata($GLOBALS['post'] = &$post_object);

				wc_get_template_part('content', 'product');
				?>

			<?php endforeach; ?>
		</div>
	</section>

	<?php
	wp_reset_postdata();
}

/**
 * Custom Field in Terms
 *
 * @param Category $term
 * @return void
 */
function custom_category_fields($term)
{

	if (current_filter() == 'product_cat_edit_form_fields') {
		$header_subtitle = get_term_meta($term->term_id, 'header_subtitle', true);
	?>
		<tr class="form-field">
			<th valign="top" scope="row">
				<label for="term_fields[header_subtitle]">
					<?php echo __('Header Subtitle', 'chess-store'); ?>
				</label>
			</th>
			<td>
				<input type="text" size="40" value="<?php echo esc_attr($header_subtitle); ?>" id="term_fields[header_subtitle]" name="term_fields[header_subtitle]"><br />
				<span class="description">
					<?php echo __('This comes under the page title in Cat Archive', 'chess-store'); ?>
				</span>
			</td>
		</tr>
	<?php } elseif (current_filter() == 'product_cat_add_form_fields') {
	?>
		<div class="form-field">
			<label for="term_fields[header_subtitle]">
				<?php echo __('Please enter the Header Subtitle', 'chess-store'); ?>
			</label>
			<input type="text" size="40" value="" id="term_fields[header_subtitle]" name="term_fields[header_subtitle]">
			<p class="description">
				<?php echo __('This comes under the page title in Cat Archive', 'chess-store'); ?>
			</p>
		</div>
<?php
	}
}

add_action('product_cat_add_form_fields', 'custom_category_fields', 10, 2);
add_action('product_cat_edit_form_fields', 'custom_category_fields', 10, 2);


function custom_save_category_fields($term_id)
{
	if (!isset($_POST['term_fields'])) {
		return;
	}

	foreach ($_POST['term_fields'] as $key => $value) {
		update_term_meta($term_id, $key, sanitize_text_field($value));
	}
}

add_action('edited_product_cat', 'custom_save_category_fields', 10, 2);
add_action('create_product_cat', 'custom_save_category_fields', 10, 2);
