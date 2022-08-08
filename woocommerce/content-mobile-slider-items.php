<?php
defined('ABSPATH') || exit;
global $product;
$product_data = wc_get_product($product->id);
$product_meta = get_post_meta($product->id);

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>

<div class="swiper-slide">
    <div class="chess-items">
        <!-- Product Image -->
        <a href="<?php echo get_permalink($product->id) ?>" class="text-decoration-none">
            <img class="mb-3 img-fluid chess-item-img" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($product->id), 'single-post-thumbnail')[0]; ?>" alt="<?php echo $product->name; ?>">
        </a>

        <div class="product-description-wrapper">
            <!-- Product Title -->
            <p class="mb-2 item-desc-1">
                <?php echo $product->name; ?>
            </p>

            <!-- Product Price -->
            <?php if ($product_data->get_price()) : ?>
                <p class="mb-2 item-price">
                    <?php echo get_woocommerce_currency_symbol() . $product_data->get_price(); ?>
                </p>
            <?php endif; ?>

            <!-- Add to cart button -->
            <div class="text-center">
                <button onclick="window.location='<?php echo get_permalink($product->get_id()); ?>'" class="black-links chess-item-btn ajax_add_to_cart text-decoration-none">
                    <?php echo __('Buy', 'chess-store'); ?>
                </button>
            </div>
        </div>
    </div>
</div>