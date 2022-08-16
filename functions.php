<?php

/**
 * chess store functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package chess_store
 */

if ( !defined( '_CHESS_STORE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_CHESS_STORE_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features,Ï such
 * as indicating support for post thumbnails.
 */
function chess_store_setup ()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on chess store, use a find and replace
		* to change 'chess-store' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'chess-store', get_template_directory() . '/languages' );

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
			'header' => esc_html__( 'Header Menu', 'chess-store' ),
			'footer' => esc_html__( 'Footer Menu', 'chess-store' ),
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
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' 		=> 250,
			'width'			=> 250,
			'flex-width'	=> true,
			'flex-height'	=> true,
		)
	);

	add_image_size( 'cat-background', '336', '257', true );
}

add_action( 'after_setup_theme', 'chess_store_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chess_store_content_width ()
{
	$GLOBALS[ 'content_width' ] = apply_filters( 'chess_store_content_width', 640 );
}

add_action( 'after_setup_theme', 'chess_store_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function chess_store_widgets_init ()
{
	register_sidebar( array(
		'name'			=> __( 'Blog Sidebar', 'chess-store' ),
		'id'			=> 'sidebar-1',
		'description'	=> __( 'This widget area holds the elements for all posts as well as the single blog post.', 'chess-store' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );

	// Register Sidebar for Topbar
	register_sidebar( array(
		'name'			=> __( 'Top Right bar', 'chess-store' ),
		'id'			=> 'sidebar-2',
		'description'	=> __( 'This widget holds the elements for the topbar right area.', 'chess-store' ),
		'before_widget'	=> '<aside id="%1$s" class="nav-flag %2$s">',
		'after_widget'	=> '</aside>'
	) );

	// Register Sidebar for Pages
	register_sidebar( array(
		'name'			=> __( 'Page Sidebar', 'chess-store' ),
		'id'			=> 'sidebar-3',
		'description'	=> __( 'This sidebar holds the elements for the single page sidebar.', 'chess-store' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	) );
}

add_action( 'widgets_init', 'chess_store_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function chess_store_scripts ()
{
	wp_enqueue_style( 'chess-store-style', get_stylesheet_uri(), array(), '1.1' );
	wp_enqueue_style( 'chess-store-main-style-extend', get_template_directory_uri() . '/css/style.css', '1.0' );
	wp_style_add_data( 'chess-store-main-style-extend', 'rtl', get_template_directory_uri() . '/style-rtl.css' );
	wp_enqueue_style( 'chess-store-main-style', get_template_directory_uri() . '/css/main.css', '1.0.1' );

	wp_enqueue_script( 'chess-store-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true );
	wp_enqueue_script( 'chess-store-loadmore', get_template_directory_uri() . '/js/loadmore.js', array( 'jquery' ) );
	wp_enqueue_script( 'chess-store-slider', get_template_directory_uri() . '/js/slider.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'chess-store-swiper-js', 'https://unpkg.com/swiper@8/swiper-bundle.min.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'chess-store-swiper-css', 'https://unpkg.com/swiper@8/swiper-bundle.min.css', '1.0' );
	wp_enqueue_script( 'chess-store-product-swiper', get_template_directory_uri() . '/js/swiper.js', array( 'jquery' ), '', true );

	/**
	 * Localizing AJAX for Load more
	 */
	wp_localize_script( 'chess-store-loadmore', 'ajax_posts', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'noPosts' => __( 'No Categories found', 'chess-store' ),
	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'chess_store_scripts' );

/**
 * Add Custom Font
 */
function register_custom_font ()
{
	wp_register_style( 'Heebo', 'https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;600;700&display=swap' );
	wp_enqueue_style( 'Heebo' );
	wp_register_style( 'Inter', 'https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700&display=swap' );
	wp_enqueue_style( 'Inter' );
}

add_action( 'wp_enqueue_scripts', 'register_custom_font' );


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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Declaring Woocommerce Support
 */
add_theme_support( 'woocommerce' );

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment ( $fragments )
{
	global $woocommerce;

	ob_start();

	?>
    <a class="cart-customlocation" href="<?php echo esc_url( wc_get_cart_url() ); ?>"
       title="<?php _e( 'View your shopping cart', 'woothemes' ); ?>">
		<?php echo sprintf( _n( '%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes' ), $woocommerce->cart->cart_contents_count ); ?>
        – <?php echo $woocommerce->cart->get_cart_total(); ?>
    </a>
	<?php
	$fragments[ 'a.cart-customlocation' ] = ob_get_clean();
	return $fragments;
}

/**
 * Return list of products
 * in current category for  category archive
 *
 * @return Array
 */
function get_products_in_category ()
{
	$id = get_queried_object_id();

	$args = array(
		'post_type'				=> 'product',
		'post_status'			=> 'publish',
		'ignore_sticky_posts'	=> 1,
		'posts_per_page'		=> '8',
		'tax_query' => array(
			array(
				'taxonomy'	=> 'product_cat',
				'field' 	=> 'term_id',
				'terms' 	=> $id,
				'operator' 	=> 'IN'
			),
			array(
				'taxonomy'	=> 'product_visibility',
				'field'		=> 'slug',
				'terms'		=> 'exclude-from-catalog',
				'operator'	=> 'NOT IN'
			)
		),
	);
	$products = new WP_Query( $args );

	wp_reset_query();
	return $products->posts;
}

/**
 * Get Homepage Product Categories
 */
function get_homepage_categories ()
{
	$terms = get_terms( [
		'taxonomy'		=> 'product_cat',
		'hide_empty'	=> false,
		'parent'		=> 0,
		'number'		=> 8,
	] );

	return $terms;
}

/**
 * Get total number of Product Cat
 */
function get_total_categories_num ()
{
	$terms = get_terms( [
		'taxonomy'		=> 'product_cat',
		'hide_empty' 	=> true,
		'parent'		=> 0,
	] );

	return count( $terms );
}

/**
 * Load More Categories with AJAX
 */
function load_more_categories ()
{
	header( "Content-Type: text/html" );

	$offset = ( isset( $_POST[ 'offset' ] ) ) ? $_POST[ 'offset' ] : 8;

	$categories = get_terms( [
		'taxonomy' 		=> 'product_cat',
		'hide_empty' 	=> false,
		'parent' 		=> 0,
		'number' 		=> 8,
		'offset'		=> $offset
	] );

	$more_cat = '';

	if ( $categories ) :
		foreach ( $categories as $cat ) :
			// get the thumbnail id using the queried category term_id
			$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );

			// get the image URL
			$image = wp_get_attachment_url( $thumbnail_id );
			$more_cat .= '<div class="col-6 col-xxxl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-6 mb-4">
                    <a href="' . get_term_link( $cat->term_id, 'product_cat' ) . '" class="text-decoration-none">
                        <div class="Chess-wrapper Chess-wrapper-2 position-relative text-center"
						style="background: url(' . $image . ') no-repeat;border-radius: 20px; background-size: cover; background-position: center;height: auto;">
                            <h1 class="w-100 align-items-center d-flex justify-content-center flex-wrap chess-title px-2">' .
				__( $cat->name, 'chess-store' ) .
				'</h1>
                        </div>
                    </a>
                </div>';

		endforeach;
	endif;

	wp_die( $more_cat );
}

add_action( 'wp_ajax_nopriv_load_more_categories', 'load_more_categories' );
add_action( 'wp_ajax_load_more_categories', 'load_more_categories' );

/**
 * Promoted Featured Products
 */
function get_promoted_products ()
{
	$meta_query = WC()->query->get_meta_query();

	$tax_query[] = array(
		'taxonomy' => 'product_visibility',
		'field' => 'name',
		'terms' => 'featured',
		'operator' => 'IN',
	);

	$args = array(
		'post_type' => 'product',
		'post_status' => 'publish',
		'orderby' => 'rand',
		'posts_per_page' => 4,
		'meta_query' => $meta_query,
		'tax_query' => $tax_query,
	);

	$products = new WP_Query( $args );
	?>

	<!-- Desktop -->
    <section class="chess-price product-chess-price">
        <div class="row">

			<?php foreach ( $products->posts as $product ) : ?>

				<?php
				$post_object = get_post( $product->ID );

				setup_postdata( $GLOBALS[ 'post' ] = &$post_object );

				wc_get_template_part( 'content', 'product' );

				?>
			<?php endforeach; ?>
        </div>
    </section>

	<!-- Mobile Slider -->
	<div class="mobile-slider hide-on-desktop">
		<div class="swiper">
			<div class="swiper-wrapper">

				<?php foreach ( $products->posts as $product ) : ?>

					<?php
					$post_object = get_post( $product->ID );

					setup_postdata( $GLOBALS[ 'post' ] = &$post_object );

					wc_get_template_part( 'content', 'mobile-slider-items' );

					?>
				<?php endforeach; ?>

			</div>
			<!-- Add Pagination -->
				<div class="swiper-pagination"></div>
				<!-- Add Navigation -->
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
		</div>

	<?php
	wp_reset_postdata();
}

/**
 * Custom Field in Terms
 *
 * @param Category $term
 * @return void
 */
function custom_category_fields ( $term )
{
	if ( current_filter() == 'product_cat_edit_form_fields' ) {
		$header_subtitle = get_term_meta( $term->term_id, 'header_subtitle', true );
		?>
        <tr class="form-field">
            <th valign="top" scope="row">
                <label for="term_fields[header_subtitle]">
					<?php echo __( 'Header Subtitle', 'chess-store' ); ?>
                </label>
            </th>
            <td>
                <input type="text" size="40" value="<?php echo esc_attr( $header_subtitle ); ?>"
                       id="term_fields[header_subtitle]" name="term_fields[header_subtitle]"><br/>
                <span class="description">
					<?php echo __( 'This comes under the page title in Cat Archive', 'chess-store' ); ?>
				</span>
            </td>
        </tr>
	<?php } elseif ( current_filter() == 'product_cat_add_form_fields' ) {
		?>
        <div class="form-field">
            <label for="term_fields[header_subtitle]">
				<?php echo __( 'Please enter the Header Subtitle', 'chess-store' ); ?>
            </label>
            <input type="text" size="40" value="" id="term_fields[header_subtitle]" name="term_fields[header_subtitle]">
            <p class="description">
				<?php echo __( 'This comes under the page title in Cat Archive', 'chess-store' ); ?>
            </p>
        </div>
		<?php
	}
}

add_action( 'product_cat_add_form_fields', 'custom_category_fields', 10, 2 );
add_action( 'product_cat_edit_form_fields', 'custom_category_fields', 10, 2 );


function custom_save_category_fields ( $term_id )
{
	if ( !isset( $_POST[ 'term_fields' ] ) ) {
		return;
	}

	foreach ( $_POST[ 'term_fields' ] as $key => $value ) {
		update_term_meta( $term_id, $key, sanitize_text_field( $value ) );
	}
}

add_action( 'edited_product_cat', 'custom_save_category_fields', 10, 2 );
add_action( 'create_product_cat', 'custom_save_category_fields', 10, 2 );


/**
 * Adding custom Short description for Single Product
 */
function woocommerce_template_single_excerpt ()
{
	global $post;
	$custom_product_excerpt = get_post_meta( $post->ID, '_chess_store_custom_product_excerpt_wysiwyg', true ); ?>

    <div class="product-right-para mb-4">
		<?php echo $custom_product_excerpt; // WPCS: XSS ok.
		?>
    </div>
<?php }

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

/**
 * Adding a custom Meta container to admin products pages
 */
add_action( 'add_meta_boxes', 'create_custom_meta_box' );

if ( !function_exists( 'create_custom_meta_box' ) ) {
	function create_custom_meta_box ()
	{
		add_meta_box(
			'custom_product_meta_box',
			__( 'Product Excerpt', 'cmb' ),
			'add_custom_content_meta_box',
			'product',
			'normal',
			'default'
		);
	}
}

/**
 * Custom metabox content in admin product pages
 */
if ( !function_exists( 'add_custom_content_meta_box' ) ) {
	function add_custom_content_meta_box ( $post )
	{
		$prefix = '_chess-store_'; // global $prefix;
		$custom_product_excerpt = get_post_meta( $post->ID, $prefix . 'custom_product_excerpt_wysiwyg', true ) ? get_post_meta( $post->ID, $prefix . 'custom_product_excerpt_wysiwyg', true ) : '';
		$args[ 'textarea_rows' ] = 2;

		wp_editor( $custom_product_excerpt, 'custom_product_excerpt_wysiwyg', $args );
		echo '<input type="hidden" name="custom_product_field_nonce" value="' . wp_create_nonce() . '">';
	}
}

/**
 * Save the data of the Meta field
 */
add_action( 'save_post', 'save_custom_content_meta_box', 10, 1 );

if ( !function_exists( 'save_custom_content_meta_box' ) ) {
	function save_custom_content_meta_box ( $post_id )
	{
		$prefix = '_chess_store_';

		// Check if our nonce is set.
		if ( !isset( $_POST[ 'custom_product_field_nonce' ] ) ) {
			return $post_id;
		}
		$nonce = $_REQUEST[ 'custom_product_field_nonce' ];

		// Verify that the nonce is valid.
		if ( !wp_verify_nonce( $nonce ) ) {
			return $post_id;
		}
		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}
		// Check the user's permissions.
		if ( 'product' == $_POST[ 'post_type' ] ) {
			if ( !current_user_can( 'edit_product', $post_id ) )
				return $post_id;
		} else {
			if ( !current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}
		// Sanitize user input and update the meta field in the database.
		update_post_meta( $post_id, $prefix . 'custom_product_excerpt_wysiwyg', wp_kses_post( $_POST[ 'custom_product_excerpt_wysiwyg' ] ) );
	}
}

/**
 * Create custom tabs in product single pages
 */
add_filter( 'woocommerce_product_tabs', 'custom_product_tabs' );

function custom_product_tabs ( $tabs )
{
	global $post;
	$custom_product_excerpt = get_post_meta( $post->ID, '_chess_store_custom_product_excerpt_wysiwyg', true );

	if ( !empty( $custom_product_excerpt ) )
		$tabs[ 'custom_product_excerpt_tab' ] = array(
			'title' 	=> __( 'Custom Product Excerpt', 'woocommerce' ),
			'priority'	=> 45,
			'callback'	=> 'custom_product_excerpt_product_tab_content'
		);

	return $tabs;
}

/**
 * Add content to custom tab in product single pages
 *
 * @return void
 */
function custom_product_excerpt_product_tab_content ()
{
	global $post;
	$custom_product_excerpt = get_post_meta( $post->ID, '_chess_store_custom_product_excerpt_wysiwyg', true );

	if ( !empty( $custom_product_excerpt ) ) {
		echo '<h2>' . __( 'Custom Product Excerpt', 'woocommerce' ) . '</h2>';
		echo apply_filters( 'the_content', $custom_product_excerpt );
	}
}

// -----------------------------------------------------------------------//

/**
 * Adding a custom Meta container to admin products pages
 */
add_action( 'add_meta_boxes', 'register_product_subtitle' );

if ( !function_exists( 'register_product_subtitle' ) ) {
	function register_product_subtitle ()
	{
		add_meta_box(
			'custom_product_subttitle',
			__( 'Product Subtitle', 'cmb' ),
			'add_product_subtitle_meta_box',
			'product',
			'normal',
			'default'
		);
	}
}

/**
 * Custom metabox content in admin product pages
 */
if ( !function_exists( 'add_product_subtitle_meta_box' ) ) {
	function add_product_subtitle_meta_box ( $post )
	{
		$prefix = '_chess_store_';
		$custom_product_excerpt = get_post_meta( $post->ID, $prefix . 'product_subtitle', true ) ? get_post_meta( $post->ID, $prefix . 'product_subtitle', true ) : '';
		?>

		<div class="row">
			<div class="fields">
				<input type="text" style="width: 100%" name="product_subtitle" value="<?php echo $custom_product_excerpt; ?>">
			</div>
		</div>

		<?php
		echo '<input type="hidden" name="product_subtitle_nonce" value="' . wp_create_nonce() . '">';
	}
}

/**
 * Save the data of the Meta field
 */
add_action( 'save_post', 'save_product_subtitle', 10, 1 );

if ( !function_exists( 'save_product_subtitle' ) ) {
	function save_product_subtitle ( $post_id )
	{
		$prefix = '_chess_store_';

		// Check if our nonce is set.
		if ( !isset( $_POST[ 'product_subtitle_nonce' ] ) ) {
			return $post_id;
		}
		$nonce = $_REQUEST[ 'product_subtitle_nonce' ];

		// Verify that the nonce is valid.
		if ( !wp_verify_nonce( $nonce ) ) {
			return $post_id;
		}
		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}
		// Check the user's permissions.
		if ( 'product' == $_POST[ 'post_type' ] ) {
			if ( !current_user_can( 'edit_product', $post_id ) )
				return $post_id;
		} else {
			if ( !current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}
		// Sanitize user input and update the meta field in the database.
		update_post_meta( $post_id, $prefix . 'product_subtitle', wp_kses_post( $_POST[ 'product_subtitle' ] ) );
	}
}

/**
 * Create custom tabs in product single pages
 */
add_filter( 'woocommerce_product_tabs', 'product_subtitle_tab' );

function product_subtitle_tab ( $tabs )
{
	global $post;
	$product_subtitle = get_post_meta( $post->ID, '_chess_store_product_subtitle', true );

	if ( !empty( $product_subtitle ) )
		$tabs[ 'product_subtitle_tab' ] = array(
			'title' 	=> __( 'Product Subtitle', 'woocommerce' ),
			'priority'	=> 45,
			'callback'	=> 'product_subtitle_tab_content'
		);

	return $tabs;
}

/**
 * Add content to Product Subtitle Tabs
 * in product single pages
 *
 * @return void
 */
function product_subtitle_tab_content ()
{
	global $post;
	$product_subtitle = get_post_meta( $post->ID, '_chess_store_product_subtitle', true );

	if ( !empty( $product_subtitle ) ) {
		echo '<h2>' . __( 'Product Subtitle', 'woocommerce' ) . '</h2>';
		echo apply_filters( 'the_content', $product_subtitle );
	}
}

/**
 * Change Stock Message
 * @param string $text
 * @param WC_Product $product
 * @return string
 */
function chess_get_woocommerce_get_availability_text ( $text, $product )
{
	if ( !$product->is_in_stock() ) {
		$text = __( 'Out of Stock', 'chess-store' );
	} else {
		$text = __( 'In Stock', 'chess-store' );
	}
	return $text;
}

add_filter( 'woocommerce_get_availability_text', 'chess_get_woocommerce_get_availability_text', 999, 2 );

/**
 * Get Post Sidebar Categories
 */
function get_post_sidebar_categories ()
{
	$terms = get_terms( [
		'taxonomy'		=> 'product_cat',
		'hide_empty' 	=> true,
		'parent' 		=> 0,
		'number' 		=> 9,
	] );

	return $terms;
}

/**
 * Get Sticky Posts
 */
function get_sticky_posts ()
{
	$args = array(
		'posts_per_page'	=> 3,
		'post__in'			=> get_option( 'sticky_posts' ),
	);
	$query = new WP_Query( $args );

	return $query->posts;
}

/**
 * Sidebar Newsletter Form Widget Code
 */
add_shortcode( 'chess_newsletter_form', 'get_sidebar_newsletter_form' );

function get_sidebar_newsletter_form ()
{
	get_template_part( 'template-parts/sidebar/subscription', 'form' );
}

/**
 * Sidebar Categories Widget ShortCode
 */
add_shortcode( 'chess_sidebar_categories', 'get_sidebar_categories' );

function get_sidebar_categories ()
{
	get_template_part( 'template-parts/sidebar/categories', 'list' );
}

/*
 * Langugae Detector
 */
function chess_language_detector() {
	if ( get_locale() == 'en_US' ) :
		echo __( 'USD', 'chess-store' );
	else :
		echo __( 'ILS', 'chess-store' );
	endif;
}

/**
 * Returns the total number of products in the current category
 *
 * @param int $cat_id
 * @return void
 */
function get_archive_product_count( $cat_id ) {
	$get_products_num_in_cat = new WP_Query( [
		'post_type' => 'product',
		'tax_query'             => array(
			array(
				'taxonomy'      => 'product_cat',
				'field' => 'term_id',
				'terms'         => $cat_id,
				'operator'      => 'IN'
			),
			array(
				'taxonomy'      => 'product_visibility',
				'field'         => 'slug',
				'terms'         => 'exclude-from-catalog',
				'operator'      => 'NOT IN'
			)
		)
	] );

	return ( count( $get_products_num_in_cat->posts ) );
}