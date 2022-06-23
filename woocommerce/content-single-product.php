<?php

/**
 * Template: Content Single
 */

defined('ABSPATH') || exit;

global $product;

// var_dump($product);
// die();
// WooCommerce Breadcrumbs
woocommerce_breadcrumb(array(
	'delimiter'		=> ' > ',
	'wrap_before'	=> '<section class="product-top-heading pt-3 ps-3">',
	'wrap_after'	=> '</section>',
));

$attachment_ids = $product->get_gallery_image_ids();
?>

<section class="product-showcase container-lg container-md d-flex justify-content-between mb-5">
	<!-- Product Gallery -->
	<div class="product-left-side">
		<div class="product-img-row d-flex">
			<div class="thumb-img">
				<?php foreach ($attachment_ids as $attachment_id) {
					$image_link = wp_get_attachment_image_src($attachment_id);
				?>
					<div class="box-slider active-slider">
						<img class="box-slider-img" src="<?php echo $image_link[0] ?>" onclick="window.open(this.src, '_blank');" alt="thumb" / />
					</div>
				<?php } ?>
			</div>
			<?php
			$prod_image = wp_get_attachment_image_src(get_post_thumbnail_id($product->id), 'single-post-thumbnail');
			?>
			<div class="product-main-img">
				<img src="<?php echo $prod_image[0]; ?>" onclick="window.open(this.src, '_blank');" data-id="<?php echo $loop->post->id; ?>" class="pro-img" alt="Product Image" />
			</div>
		</div>
	</div>

	<!-- Product Information -->
	<div class="product-right-side col-12">

		<!-- Product Title -->
		<div class="product-right-heading">
			<h1 class="product-right-main-heading">
				<?php woocommerce_template_single_title(); ?>
			</h1>
		</div>

		<!-- Marketing Message -->
		<?php if ($product->sale_price) : ?>
			<div class="product-sub-heading">
				<h2 class="p-sub-heading">
					<?php echo __('On Sale', 'chess-store'); ?>
				</h2>
			</div>
		<?php endif; ?>

		<!-- Sale Price & Regular Price -->
		<?php if ($product->sale_price) : ?>
			<div class="product-info-price">
				<div class="product-price d-flex">
					<span class="old-price position-relative">
						<?php echo get_woocommerce_currency_symbol() . $product->regular_price; ?>
					</span>
					<span class="new-price">
						<?php echo get_woocommerce_currency_symbol() . $product->sale_price; ?>
					</span>
				</div>
			</div>
		<?php else : ?>
			<div class="product-info-price">
				<span class="new-price">
					<?php echo get_woocommerce_currency_symbol() . $product->regular_price; ?>
				</span>
			</div>
		<?php endif; ?>

		<!-- Product Short Description -->
		<?php $short_description = get_post_meta($product->id, 'product_excerpt', true); ?>

		<?php if ($short_description) : ?>
			<div class="product-right-para">
				<p>
					<?php echo $short_description; ?>
				</p>
			</div>
		<?php endif; ?>

		<!-- Stock Check -->
		<?php if ($product->stock_status == 'instock') : ?>
			<div class="stock-options-heading">
				<h2><?php __('In Stock', 'chess-store') ?> </h2>
			</div>
		<?php else : ?>
			<div class="stock-options-heading">
				<h2><?php __('Out of Stock', 'chess-store') ?> </h2>
			</div>
		<?php endif; ?>

		<!-- Add to Cart Button -->
		<div class="choose-product-quantity">
			<?php
			echo wc_get_stock_html($product); // WPCS: XSS ok.

			if ($product->is_in_stock()) : ?>

				<?php do_action('woocommerce_before_add_to_cart_form'); ?>

				<form class="cart d-flex align-items-center" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
					<?php do_action('woocommerce_before_add_to_cart_button'); ?>

					<?php
					do_action('woocommerce_before_add_to_cart_quantity');

					woocommerce_quantity_input(
						array(
							'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
							'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
							'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
						)
					);

					do_action('woocommerce_after_add_to_cart_quantity');
					?>

					<a type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="ms-2 text-decoration-none btn btn-primary add-to-cart-btn">
						<?php echo esc_html($product->single_add_to_cart_text()); ?>
					</a>

					<?php do_action('woocommerce_after_add_to_cart_button'); ?>
				</form>

				<?php do_action('woocommerce_after_add_to_cart_form'); ?>

			<?php endif; ?>
		</div>

		<!-- Additional Info -->
		<div class="product-icons d-flex flex-direction flex-column">
			<a class="text-decoration-none" href="#">
				<div class="product-shipping d-flex align-items-center">
					<img src="<?php echo wp_get_attachment_image_src(96)[0]; ?>">
					<p>Shipping</p><span> > </span>
				</div>
			</a>
			<a class="text-decoration-none" href="#">
				<div class="product-lock d-flex align-items-center">
					<img src="<?php echo wp_get_attachment_image_src(95)[0]; ?>">
					<p>Secure</p>
				</div>
			</a>
		</div>

	</div>
</section>


<hr class="hr-line container-lg container-md">

<section class="sub-category-detail container-lg container-md">
	<div class="detail-heading">
		<h3><?php echo __('Details', 'chess-store'); ?></h3>
	</div>

	<div class="detail-content">
		<div class="detail-content-info d-flex">
			<?php echo $product->short_description ?>
		</div>
	</div>

</section>

<section class="more-details container-lg container-md">
	<div class="more-details-heading">
		<h3><?php echo __('More Details', 'chess-store') ?></h3>
	</div>
	<div class="more-detail-info">
		<p><?php echo $product->description; ?></p>
	</div>
</section>

<hr class="hr-line hr-line-mb-109 container-lg container-md">

<section class="chess-price">
	<div class="container-sm">
		<div class="row">
			<!-- Related Products -->
			<?php woocommerce_output_related_products(); ?>

			<?php if (woocommerce_upsell_display()) : ?>

				<!-- Horizontal Line -->
				<hr class="hr-line hr-line-mb-109 container-lg container-md mb-5">

				<!-- Upsell Products -->
				<?php woocommerce_upsell_display(); ?>

			<?php endif; ?>
		</div>
	</div>
</section>