<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 */

get_header();

defined('ABSPATH') || exit;

// Sanitized Description
$archive_description = substr(get_the_archive_description(), 3);
$archive_description = substr($archive_description, 0, -5);

$current_cat_id = get_queried_object_id();
$terms = get_terms([
	'taxonomy'		=> 'product_cat',
	'hide_empty'	=> false,
	'parent'		=> $current_cat_id
]);

$thumbnail_id = get_term_meta($current_cat_id, 'thumbnail_id', true);
$image = wp_get_attachment_url($thumbnail_id);

$cat_header_subtitle = get_term_meta($current_cat_id, 'header_subtitle', true);

?>

<!-- Category Header -->
<section class="category-hero container-fluid position-relative overflow-hidden" style="background: url(<?php echo $image ?>) no-repeat center center; object-fit: cover">
	<h1 class="h1 d-flex justify-content-center align-items-center category-hero-title mb-0">
		<?php woocommerce_page_title(); ?>

		<?php if ($cat_header_subtitle) : ?>
			<span class="d-block fs-5 category-hero-span">
				<?php echo __($cat_header_subtitle, 'chess-store'); ?>
			</span>
		<?php endif; ?>
	</h1>

	<!-- WooCommerce Breadcrumbs -->
	<?php woocommerce_breadcrumb(array(
		'delimiter' => '<span class="white-links breadcrumbs-arrow"> > </span>',
		'wrap_before' => '<p class="chess-breadcrumbs position-absolute w-100 bottom-0 category-hero-desc mb-0 ps-4 pb-3">',
		'wrap_after' => '</p>',
	)); ?>
</section>

<!-- Category Menu for Mobile -->
<section class="hide-on-desktop mb-2">

	<!-- WooCommerce Breadcrumbs -->
	<?php woocommerce_breadcrumb(array(
		'delimiter' => '<span class="black-links breadcrumbs-arrow"> > </span>',
		'wrap_before' => '<div class="chess-breadcrumbs text-center py-2 lh-base current-page mb-2">',
		'wrap_after' => '</div>',
	)); ?>

	<!-- Hamburger Menu for Mobile -->
	<div class="category-mbl-hamburger d-flex justify-content-between align-items-center px-4 py-3">
		<a class="hamburger-list" href="#">
			<img src="<?php echo wp_get_attachment_image_src(118)[0] ?>" alt="Category Menu">
		</a>
		<p class="mb-0 fs-5">
			<?php woocommerce_page_title(); ?>
		</p>
	</div>
</section>


<!-- Categories Grid -->
<section class="chess-materials container-fluid mb-4">
	<div class="container-lg chess-material-container">
		<div class="row">
			<div class="col-12">
				<div class="chess-pieces-wrapper d-flex text-center justify-content-center flex-wrap">

					<?php if (get_term($current_cat_id)->parent) : ?>
						<div class="chess-pieces mx-2 my-2">
							<a href="<?php echo get_term_link($current_cat_id); ?>">
								<div class="cat-child-chess-active chess-pieces-title d-flex justify-content-center align-items-center">
									<?php woocommerce_page_title(); ?>
								</div>
							</a>
						</div>
						<?php
						$term = get_term($current_cat_id, 'product_cat');
						$termParent = ($term->parent == 0) ? $term : get_term($term->parent, 'product_cat');

						$cat = get_terms([
							'taxonomy'		=> 'product_cat',
							'hide_empty'	=> false,
							'parent'		=> $termParent->term_id,
							'exclude'		=> $current_cat_id
						]);
						?>

						<?php foreach ($cat as $term) : ?>
							<div class="chess-pieces mx-2 my-2">
								<a href="<?php echo get_term_link($term) ?>">
									<div class="chess-pieces-title d-flex justify-content-center align-items-center">
										<?php echo $term->name ?>
									</div>
								</a>
							</div>
						<?php endforeach;
					else : ?>
						<?php foreach ($terms as $term) : ?>
							<div class="chess-pieces mx-2 my-2">
								<a href="<?php echo get_term_link($term) ?>">
									<div class="chess-pieces-title d-flex justify-content-center align-items-center">
										<?php echo $term->name ?>
									</div>
								</a>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Page Content -->
<section class="chess-price mt-4">
	<div class="container-sm">
		<div class="row">
			<div class="col-12 pb-3 text-center product-title mbl-padding">
				<h1 class="h1 chess-item-title">
					<?php echo woocommerce_page_title() . " " . __('Products', 'chess-store'); ?>
				</h1>
			</div>
		</div>
	</div>

	<?php
	if (woocommerce_product_loop()) {

		woocommerce_product_loop_start();

		if (wc_get_loop_prop('total')) { ?>

			<!-- Category Products -->
			<section class="chess-price">
				<div class="container-sm">
					<div class="row">

						<?php while (have_posts()) {
							the_post();
							/**
							 * Hook: woocommerce_shop_loop.
							 */
							do_action('woocommerce_shop_loop');

							global $product;
							$product_data = wc_get_product($product->id);
							$product_meta = get_post_meta($product->id);
						?>
							<div class="col-6 col-xxxl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-6 category-chess-products">
								<div class="chess-items">
									<a href="<?php echo get_permalink($product->id) ?>" class="text-decoration-none">
										<img class="mb-3 img-fluid chess-item-img" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($product->id), 'single-post-thumbnail')[0]; ?>" alt="<?php echo $product->name; ?>">
										<p class="mb-2 item-desc-1 black-links"><?php echo $product->name; ?></p>
									</a>
									<p class="mb-2 item-price"><?php echo get_woocommerce_currency_symbol() . $product_data->get_price(); ?></p>
									<p class="mb-5 item-desc-2 mbl-none-products"><?php echo wp_trim_words($product_data->get_description(), 15) ?></p>
									<div class="text-center">
										<a href="/?add-to-cart=<?php echo $product->id ?>" class="chess-item-btn ajax_add_to_cart text-decoration-none" data-product_id="<?php echo $product->id ?>">
											Buy
										</a>
									</div>
								</div>
							</div>

						<?php
						} ?>
					</div>
				</div>
			</section>
	<?php }

		woocommerce_product_loop_end();
		/**
		 * Hook: woocommerce_after_shop_loop.
		 *
		 * @hooked woocommerce_pagination - 10
		 */
		do_action('woocommerce_after_shop_loop');
	} else {
		/**
		 * Hook: woocommerce_no_products_found.
		 *
		 * @hooked wc_no_products_found - 10
		 */
		do_action('woocommerce_no_products_found');
	} ?>

</section>

<?php if (get_the_archive_description()) : ?>
	<!-- Category Long Description -->
	<section>
		<div class="container-sm mb-4">
			<div class="row">
				<div class="col-12 ">
					<h1 class="h1 mb-2">
						<?php echo __('Description', 'chess-store'); ?>
					</h1>
					<p class="lh-base"><?php echo get_the_archive_description(); ?></p>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php get_footer(); ?>