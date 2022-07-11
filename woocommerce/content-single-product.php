<?php

/**
 * Template: Content Single
 */

defined('ABSPATH') || exit;

global $product;

do_action('woocommerce_before_single_product');

woocommerce_breadcrumb(array(
	'delimiter'     => ' > ',
	'wrap_before'   => '<section class="product-top-heading pt-3 ps-3">',
	'wrap_after'    => '</section>',
));

$attachment_ids = $product->get_gallery_image_ids();
?>

<section class="product-showcase container-lg container-md d-flex justify-content-between mb-5">

	<!-- Product Gallery -->
	<div class="product-left-side">
		<div class="product-img-row d-flex">
			<div class="thumb-img">
				<?php foreach ($attachment_ids as $attachment_id) {
					$image_link = wp_get_attachment_image_src(($attachment_id), 'single-post-thumbnail');
				?>
					<div class="box-slider">
						<img class="box-slider-img" id="single-product-gallery-img" src="<?php echo $image_link[0]; ?>" onclick="changeImage(this)" alt="thumb" />
					</div>
				<?php } ?>
			</div>

			<?php $prod_image = wp_get_attachment_image_src(get_post_thumbnail_id($product->id), 'single-post-thumbnail'); ?>

			<div class="product-main-img">
				<img src="<?php echo $prod_image[0]; ?>" id="single-product-image" class="pro-img" alt="Product Image" />
			</div>
		</div>
	</div>

	<!-- Product Information -->
	<div class="product-right-side col-12">

		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action('woocommerce_single_product_summary');
		?>

		<!-- Additional Info -->
		<div class="product-icons d-flex flex-direction flex-column">
			<a class="text-decoration-none" href="#">
				<div class="product-shipping d-flex align-items-center">
					<img src="<?php echo wp_get_attachment_image_src(96)[0]; ?>">
					<p>
						<?php echo __( 'Shipping', 'chess-store' ); ?>
					</p><span> > </span>
				</div>
			</a>
			<a class="text-decoration-none" href="#">
				<div class="product-lock d-flex align-items-center">
					<img src="<?php echo wp_get_attachment_image_src(95)[0]; ?>">
					<p>
						<?php echo __( 'Secure', 'chess-store' ) ?>
					</p>
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
			<?php echo $product->short_description; ?>

		</div>
	</div>

</section>

<hr class="hr-line container-lg container-md">

<section class="more-details container-lg container-md">
	<div class="more-details-heading">
		<h3><?php echo __('More Details', 'chess-store') ?></h3>
	</div>
	<div class="more-detail-info">
		<p><?php echo $product->description; ?></p>
	</div>
</section>

<hr class="hr-line hr-line-mb-109 container-lg container-md">

<!-- Related Products -->
<section class="chess-price">
	<div class="container-sm">
		<div class="row">
			<?php woocommerce_output_related_products(); ?>
		</div>
	</div>
</section>

<hr class="hr-line hr-line-mb-109 container-lg container-md mb-5">
<!-- Promoted Products -->
<section class="chess-price">
	<div class="container-sm">
		<div class="row">
			<div class="col-12 pb-5 product-title">
				<h1 class="h1">
					<?php echo __('Promoted Products', 'chess-store') ?>
				</h1>
			</div>
			<?php get_promoted_products(); ?>
		</div>
	</div>
</section>