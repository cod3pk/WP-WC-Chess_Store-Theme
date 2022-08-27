<?php
/**
 * Single Product title
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;

$product_subtitle = get_post_meta( $product->id, '_chess_store_product_subtitle' )[ 0 ];

?>

<!-- Product Title -->
<div class="product-right-heading">
	<?php the_title( '<h1 class="product-title entry-title">', '</h1>' ); ?>
</div>

<!-- Product Subtitle -->
<?php if ( $product_subtitle ) : ?>
	<div class="product-sub-heading">
		<h2 class="p-sub-heading">
			<?php echo $product_subtitle; ?>
		</h2>
	</div>
<?php endif; ?>