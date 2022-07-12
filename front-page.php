<?php get_header(); ?>

    <!-- Hero Section -->
    <section class="header container-fluid mb-5"
             style="background: url(<?php echo wp_get_attachment_image_src( 79, 'full' )[ 0 ] ?>) no-repeat;">
        <div class="header-content d-flex flex-column align-items-center">
            <div class="header-top-img">
                <img class="header-bg-img-top" src="<?php echo wp_get_attachment_image_src( 98, 'full' )[ 0 ] ?>">
            </div>
            <div class="header-text">
                <p class="header-title-text"><?php echo __( 'Lorem ipsum dolor sit amet', 'chess-store' ); ?></p>
            </div>
            <div class="header-img-bottom">
                <img class="header-bg-img-bm" src="<?php echo wp_get_attachment_image_src( 101, 'full' )[ 0 ] ?>">
            </div>
        </div>
    </section>

    <!-- Categories Grid -->
    <section class="chess-showcase">
        <div class="container-sm">
            <div class="row">
                <div class="col-12 pb-4 text-center">
                    <h1 class="h1"><?php echo __( 'Popular Categories', 'chess-store' ); ?></h1>
                </div>

                <div class="row" id="loadmore-categories">
					<?php
					$categories = get_homepage_categories();

					foreach ( $categories as $cat ) :
						// get the thumbnail id using the queried category term_id
						$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );

						// get the image URL
						$image = wp_get_attachment_url( $thumbnail_id );
						?>

                        <div class="col-6 col-xxxl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-6 mb-4">
                            <a href="<?php echo get_term_link( $cat->term_id, 'product_cat' ) ?>"
                               class="text-decoration-none">
                                <div class="Chess-wrapper Chess-wrapper-2 position-relative text-center"
                                     style="background: url(<?php echo $image; ?>) no-repeat;border-radius: 20px; background-size: cover; background-position: center;height: auto;">
                                    <h1 class="w-100 align-items-center d-flex justify-content-center flex-wrap chess-title px-2">
										<?php echo __( $cat->name, 'chess-store' ); ?>
                                    </h1>
                                </div>
                            </a>
                        </div>

					<?php endforeach; ?>
                </div>
            </div>

			<?php if ( get_total_categories_num() > 8 ) : ?>
                <div class="slider text-center">
                    <div id="cat_load_more_btn">
                        <img class="pe-3" src="<?php echo get_template_directory_uri() . "/images/load-more.png" ?>"
                             alt="Load">
                        <span>
                        <?php echo __( 'Load More', 'chess-store' ); ?>
                    </span>
                    </div>
                </div>
			<?php endif; ?>
        </div>
    </section>

    <!-- Promoted Products -->
    <section class="chess-price">
        <div class="container-sm">
            <div class="row">
                <div class="col-12 pb-5 text-center product-title">
                    <h1 class="h1">
						<?php echo __( 'Promoted Products', 'chess-store' ) ?>
                    </h1>
                </div>
				<?php get_promoted_products(); ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>