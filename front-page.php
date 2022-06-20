<?php get_header(); ?>

<!-- Hero Section -->
<section class="header container-fluid mb-5" style="background: url(<?php echo wp_get_attachment_image_src(79, 'full')[0] ?>) no-repeat;">
    <div class="header-content d-flex flex-column align-items-center">
        <div class="header-top-img">
            <img class="header-bg-img-top" src="<?php echo wp_get_attachment_image_src(98, 'full')[0] ?>">
        </div>
        <div class="header-text">
            <p class="header-title-text"><?php echo __('Lorem ipsum dolor sit amet', 'chess-store'); ?></p>
        </div>
        <div class="header-img-bottom">
            <img class="header-bg-img-bm" src="<?php echo wp_get_attachment_image_src(101, 'full')[0] ?>">
        </div>
    </div>
</section>

<!-- Categories Grid -->
<section class="chess-showcase">
    <div class="container-sm">
        <div class="row">
            <div class="col-12 pb-4 text-center">
                <h1 class="h1"><?php echo __('Popular Categories', 'chess-store'); ?></h1>
            </div>

            <?php
            $categories = get_homepage_categories();
            foreach ($categories as $cat) :
                // get the thumbnail id using the queried category term_id
                $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);

                // get the image URL
                $image = wp_get_attachment_url($thumbnail_id);
            ?>

                <div class="col-6 col-xxxl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-6 mb-4">
                    <a href="<?php echo get_term_link($cat->term_id, 'product_cat') ?>" class="text-decoration-none">
                        <div class="Chess-wrapper Chess-wrapper-2 position-relative text-center" style="background: url(<?php echo $image; ?>) no-repeat center center;border-radius: 20px;">
                            <h1 class="w-100 align-items-center d-flex justify-content-center flex-wrap chess-title px-2">
                                <?php echo __($cat->name, 'chess-store'); ?>
                            </h1>
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Promoted Products -->
<section class="chess-price">
    <div class="container-sm">
        <div class="row">
            <div class="col-12 pb-5 text-center product-title">
                <h1 class="h1">
                    <?php echo __('Promoted Products', 'chess-store') ?>
                </h1>
            </div>

            <?php
            $products = get_promoted_products();
            foreach ($products as $product) :
                $product_data = wc_get_product($product->ID);
                $product_meta = get_post_meta($product->ID);
            ?>

                <div class="col-6 col-xxxl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-6 chess-prdct">
                    <div class="chess-items">
                        <a href="<?php echo get_permalink($product->ID) ?>" class="text-decoration-none">

                            <img class="mb-3 img-fluid chess-item-img" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($product->ID), 'single-post-thumbnail')[0]; ?>" alt="<?php echo $product->post_title; ?>">

                            <p class="mb-2 item-desc-1 black-links"><?php echo $product->post_title; ?></p>
                        </a>
                        <p class="mb-2 item-price"><?php echo get_woocommerce_currency_symbol() . $product_data->get_price(); ?></p>
                        <p class="mb-5 item-desc-2 mbl-none-products"><?php echo wp_trim_words($product_data->get_description(), 15) ?></p>
                        <div class="text-center">
                            <a href="/?add-to-cart=<?php echo $product->ID ?>" class="chess-item-btn ajax_add_to_cart text-decoration-none" data-product_id="<?php echo $product->ID ?>">
                                Buy
                            </a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>