<?php

/**
 *  Template: Product Grids
 * @customized
 */

defined( 'ABSPATH' ) || exit;
global $product;
$product_data = wc_get_product( $product->id );
$product_meta = get_post_meta( $product->id );

// Ensure visibility.
if ( empty( $product ) || !$product->is_visible() ) {
	return;
}
?>

<!-- Desktop Grid -->
<div class="col-6 col-xxxl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-6 chess-prdct mb-5 hide-on-mobile">

    <div class="chess-items">

        <a href="<?php echo get_permalink( $product->id ) ?>" class="text-decoration-none">
            <img class="mb-3 img-fluid chess-item-img"
                 src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $product->id ), 'single-post-thumbnail' )[ 0 ]; ?>"
                 alt="<?php echo $product->name; ?>">
        </a>

        <a href="<?php echo get_permalink( $product->id ) ?>" class="text-decoration-none">
            <div class="product-content-wrapper">
                <p class="mb-2 item-desc-1 black-links product-cards-title">
					<?php echo $product->name; ?>
                </p>

                <?php if ( $product_data->get_price() ) : ?>
                    <p class="mb-2 item-price">
                        <?php echo get_woocommerce_currency_symbol() . $product_data->get_price(); ?>
                    </p>
                <?php endif; ?>
            </div>
        </a>

		<?php $custom_product_excerpt = get_post_meta( $product->id, '_chess-store_custom_product_excerpt_wysiwyg', true ); ?>

		<?php if ( $custom_product_excerpt ) : ?>
            <a href="<?php echo get_permalink( $product->id ) ?>" class="text-decoration-none black-links">
                <p class="mb-5 item-desc-2 mbl-none-products">
					<?php echo $custom_product_excerpt; ?>
                </p>
            </a>
		<?php else : ?>
            <a href="<?php echo get_permalink( $product->id ) ?>" class="text-decoration-none black-links">
                <p class="mb-5 item-desc-2 mbl-none-products">
					<?php echo wp_trim_words( $product_data->get_description(), 15 ) ?>
                </p>
            </a>
		<?php endif; ?>

        <div class="text-center">
            <button onclick="window.location='<?php echo get_permalink( $product->get_id() ); ?>'"
                    class="black-links chess-item-btn ajax_add_to_cart text-decoration-none">
				<?php echo __( 'Buy', 'chess-store' ); ?>
            </button>
        </div>

    </div>
</div>

<!-- Mobile Slider -->
<div class="mobile-slider hide-on-desktop">
    <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="chess-items">
                    <!-- Product Image -->
                    <a href="<?php echo get_permalink( $product->id ) ?>" class="text-decoration-none">
                        <img class="mb-3 img-fluid chess-item-img"
                        src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $product->id ), 'single-post-thumbnail' )[ 0 ]; ?>"
                        alt="<?php echo $product->name; ?>">
                    </a>

                    <!-- Product Title -->
                    <p class="mb-2 item-desc-1">
                        <?php echo $product->name; ?>
                    </p>

                    <!-- Product Price -->
                    <?php if ( $product_data->get_price() ) : ?>
                        <p class="mb-2 item-price">
                            <?php echo get_woocommerce_currency_symbol() . $product_data->get_price(); ?>
                        </p>
                    <?php endif; ?>

                    <!-- Add to cart button -->
                    <div class="text-center">
                        <button onclick="window.location='<?php echo get_permalink( $product->get_id() ); ?>'"
                                class="black-links chess-item-btn ajax_add_to_cart text-decoration-none">
                            <?php echo __( 'Buy', 'chess-store' ); ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Navigation -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>