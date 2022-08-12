<?php

/**
 * Related Products
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

if ( count( $related_products ) == 4 ) : ?>

	<section class="related products">

		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Similar Products', 'chess-store' ) );

		if ( $heading ) :
		?>
			<h2><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>

		<section class="chess-price">
			<div class="row">
				<?php foreach ( $related_products as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id(  ) );

					setup_postdata( $GLOBALS[ 'post' ] = &$post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

					wc_get_template_part( 'content', 'product' );
					?>

				<?php endforeach; ?>
			</div>
		</section>

	</section>
<?php

else:

global $product;
$product_cat_id = $product->category_ids[ 0 ];
$child_term = get_term( $product_cat_id, 'product_cat' );

if ( $child_term->parent > 0 ){
	$parent_term = get_term( $child_term->parent, 'product_cat' );

	$parent_products = new WP_Query( [
		'post_type'			=> 'product',
		'posts_per_page'	=> 4,
		'term_id'			=> $child_term->parent
	] );

	$related_products = $parent_products->posts;
	?>

	<section class="related products">

	<?php
	$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Similar Products', 'chess-store' ) );

	if ( $heading ) :
	?>
		<h2><?php echo esc_html( $heading ); ?></h2>
	<?php endif; ?>

	<section class="chess-price">
		<div class="row">
			<?php foreach ( $related_products as $related_product ) : ?>

				<?php

				$post_object = get_post( $related_product->ID );

				setup_postdata( $GLOBALS[ 'post' ] = &$post_object ); 

				wc_get_template_part( 'content', 'product' );
				?>

			<?php endforeach; ?>
		</div>
	</section>

	</section>

	<?php
	wp_reset_postdata(  );

}

endif;