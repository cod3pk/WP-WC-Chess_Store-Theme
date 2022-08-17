<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 */

get_header();

defined( 'ABSPATH' ) || exit;

// Sanitized Description
$archive_description = substr( get_the_archive_description(), 3 );
$archive_description = substr( $archive_description, 0, -5 );

$current_cat_id = get_queried_object_id();
$terms = get_terms( [
	'taxonomy' => 'product_cat',
	'hide_empty' => false,
	'parent' => $current_cat_id,
] );

$products_count = get_archive_product_count( $current_cat_id );

$thumbnail_id = get_term_meta( $current_cat_id, 'thumbnail_id', true );
$image = wp_get_attachment_url( $thumbnail_id );

$cat_header_subtitle = get_term_meta( $current_cat_id, 'header_subtitle', true );
?>

    <!-- Category Header -->
    <section class="category-hero container-fluid position-relative overflow-hidden"
             style="background: url(<?php echo $image ?>) no-repeat center center; object-fit: cover">
        <h1 class="h1 d-flex justify-content-center align-items-center category-hero-title mb-0">
			<?php woocommerce_page_title(); ?>

			<?php if ( $cat_header_subtitle ) : ?>
                <span class="d-block fs-5 category-hero-span">
				<?php echo __( $cat_header_subtitle, 'chess-store' ); ?>
			</span>
			<?php endif; ?>
        </h1>

        <!-- WooCommerce Breadcrumbs -->
		<?php woocommerce_breadcrumb( array(
			'delimiter' => '<span class="white-links breadcrumbs-arrow"> > </span>',
			'wrap_before' => '<p class="chess-breadcrumbs position-absolute w-100 bottom-0 category-hero-desc mb-0 ps-4 pb-3">',
			'wrap_after' => '</p>',
		) ); ?>
    </section>

    <!-- Category Menu for Mobile -->
    <section class="hide-on-desktop mb-2">

        <!-- WooCommerce Breadcrumbs -->
		<?php woocommerce_breadcrumb( array(
			'delimiter' => '<span class="black-links breadcrumbs-arrow"> > </span>',
			'wrap_before' => '<div class="chess-breadcrumbs text-center py-2 lh-base current-page mb-2">',
			'wrap_after' => '</div>',
		) ); ?>

        <!-- Hamburger Menu for Mobile -->
        <div class="category-mbl-hamburger d-flex justify-content-between align-items-center px-4 py-3">
            <a class="hamburger-list" href="#">
                <img src="<?php echo wp_get_attachment_image_src( 118 )[ 0 ] ?>" alt="Category Menu">
            </a>
            <p class="mb-0 fs-5">
				<?php woocommerce_page_title(); ?>
            </p>
        </div>
    </section>

    <!-- Categories Grid -->
    <section class="chess-materials container-fluid mb-4 main-chess-section">
        <div class="container-lg chess-material-container">
            <div class="row">
                <div class="col-12">
                    <div class="chess-pieces-wrapper d-flex text-center justify-content-center flex-wrap list-hidden">

						<?php if ( get_term( $current_cat_id )->parent ) : ?>

							<?php
							$term = get_term( $current_cat_id, 'product_cat' );
							$termParent = ( $term->parent == 0 ) ? $term : get_term( $term->parent, 'product_cat' );

							$cat = get_terms( [
								'taxonomy' => 'product_cat',
								'hide_empty' => false,
								'parent' => $termParent->term_id,
							] );
							?>

							<?php foreach ( $cat as $term ) : ?>
                                <div class="chess-pieces mx-2 my-2">
                                    <a href="<?php echo get_term_link( $term ) ?>">
										<?php if ( get_queried_object_id() == $term->term_id ) : ?>
                                            <div class="cat-child-chess-active chess-pieces-title d-flex justify-content-center align-items-center">
												<?php echo $term->name ?>
                                            </div>
										<?php else : ?>
                                            <div class="chess-pieces-title d-flex justify-content-center align-items-center">
												<?php echo $term->name ?>
                                            </div>
										<?php endif; ?>
                                    </a>
                                </div>
							<?php endforeach;

                        elseif ( $terms ) :

							foreach ( $terms as $term ) : ?>
                                <div class="chess-pieces mx-2 my-2">
                                    <a href="<?php echo get_term_link( $term ) ?>">
                                        <div class="chess-pieces-title d-flex justify-content-center align-items-center">
											<?php echo $term->name ?>
                                        </div>
                                    </a>
                                </div>
							<?php endforeach;

						else:
							echo '<script>
							document.querySelector(".main-chess-section").style.display = "none";
							</script>';
						endif; ?>

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
						<?php echo woocommerce_page_title() . " " . __( 'Products', 'woocommerce' ); ?>
                    </h1>
                </div>
            </div>
        </div>

		<?php
		if ( woocommerce_product_loop() ) {

			woocommerce_product_loop_start();

			if ( wc_get_loop_prop( 'total' ) ) { ?>

                <!-- Desktop Products -->
                <section class="chess-price hide-on-mobile">
                    <div class="container-sm">
                        <div class="row">

							<?php while ( have_posts() ) :

								the_post();

								do_action( 'woocommerce_shop_loop' );

								global $product;

								$post_object = get_post( $product->ID );

								setup_postdata( $GLOBALS[ 'post' ] = &$post_object );

								wc_get_template_part( 'content', 'product' );

							endwhile; ?>
                        </div>
                    </div>
                </section>

                <?php if ( $products_count > 2 ) : ?>
                <!-- Mobile Mobile -->
                <div class="mobile-slider hide-on-desktop archive-page-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper">

                            <?php
                            while ( have_posts() ) :

								the_post();

								do_action( 'woocommerce_shop_loop' );

								global $product;

								$post_object = get_post( $product->ID );

								setup_postdata( $GLOBALS[ 'post' ] = &$post_object );

                                wc_get_template_part( 'content', 'mobile-slider-items' );

							endwhile;
                            ?>

                        </div>
                        <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                            <!-- Add Navigation -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>

                <?php elseif ( $products_count < 3 ) : ?>

                 <!-- Desktop Products -->
                <section class="chess-price hide-on-desktop">
                    <div class="container-sm">
                        <div class="row">

							<?php while ( have_posts() ) :

								the_post();

								do_action( 'woocommerce_shop_loop' );

								global $product;

								$post_object = get_post( $product->ID );

								setup_postdata( $GLOBALS[ 'post' ] = &$post_object );

								wc_get_template_part( 'content', 'single-product-archive' );

							endwhile; ?>
                        </div>
                    </div>
                </section>

                <?php endif; ?>


			<?php }

			woocommerce_product_loop_end();
			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action( 'woocommerce_after_shop_loop' );
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action( 'woocommerce_no_products_found' );
		} ?>

    </section>

    <!-- Archive Description -->
    <?php if ( get_the_archive_description() ) : ?>
        <!-- Category Long Description -->
        <section>
            <div class="container-sm mb-4">
                <div class="row">
                    <div class="col-12 ">
                        <h1 class="h1 mb-2">
                            <?php echo __( 'Description', 'chess-store' ); ?>
                        </h1>
                        <p class="lh-base"><?php echo get_the_archive_description(); ?></p>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

<?php get_footer(); ?>