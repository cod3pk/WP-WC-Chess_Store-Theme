<?php

/**
 * Section: Header
 *
 * @package chess_store
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<section class="nav-top-section nav-top-desktop container-fluid">

    <!-- Topbar -->
    <div class="nav-top-content d-flex justify-content-between">
        <div class="nav-top-left-side d-flex justify-content-between">
            <div class="nav-top-social-links d-flex justify-content-between">

				<?php if ( get_theme_mod( 'topbar_options_insta' ) ) : ?>
                    <a href="<?php echo get_theme_mod( 'topbar_options_insta' ); ?>" target="_blank">
                        <img src="<?php echo wp_get_attachment_image_src( 81 )[ 0 ] ?>" alt="Instagram">
                    </a>
				<?php endif; ?>

				<?php if ( get_theme_mod( 'topbar_options_facebook' ) ) : ?>
                    <a href="<?php echo get_theme_mod( 'topbar_options_facebook' ); ?>" target="_blank">
                        <img src="<?php echo wp_get_attachment_image_src( 78 )[ 0 ] ?>" alt="Facebook">
                    </a>
				<?php endif; ?>

				<?php if ( get_theme_mod( 'topbar_options_whatsapp' ) ) : ?>
                    <a href="https://wa.me/<?php echo get_theme_mod( 'topbar_options_whatsapp' ); ?>" target="_blank">
                        <img src="<?php echo wp_get_attachment_image_src( 102 )[ 0 ] ?>" alt="Whatsapp">
                    </a>
				<?php endif; ?>

            </div>
            <div class="nav-top-num d-flex justify-content-between">
				<?php if ( get_theme_mod( 'topbar_options_phone_one' ) ) : ?>
                    <a href="tel:<?php echo get_theme_mod( 'topbar_options_phone_one' ); ?>"
                       class="white-links text-decoration-none white-links phone-numbers" target="_blank">
                        <p class="mb-0 phone-numbers"><?php echo get_theme_mod( 'topbar_options_phone_one' ); ?></p>
                    </a>
				<?php endif; ?>

				<?php if ( get_theme_mod( 'topbar_options_phone_two' ) ) : ?>
                    <a href="tel:<?php echo get_theme_mod( 'topbar_options_phone_two' ); ?>"
                       class="white-links text-decoration-none white-links" target="_blank">
                        <p class="mb-0 phone-numbers" ><?php echo get_theme_mod( 'topbar_options_phone_two' ); ?></p>
                    </a>
				<?php endif; ?>
            </div>
        </div>
        <div class="nav-flag">
            <?php get_sidebar( 'topbar' ); ?>
        </div>
    </div>
    <!-- End Topbar -->

    <!-- Header -->
    <div class="nav-top-section-mobile nav-top-mobile container-fluid">
        <div class="nav-top-mobile-content d-flex justify-content-between">
            <div class="nav-mobile-cart d-flex align-items-center">
                <!-- <img src="./assets/imgs/united-kingdom.svg"> -->
            </div>
            <!-- <span class="top-nav-ver-line"></span> -->
            <div class="nav-mobile-social-links d-flex align-items-center">

				<?php if ( get_theme_mod( 'topbar_options_insta' ) ) : ?>
                    <a href="<?php echo get_theme_mod( 'topbar_options_insta' ); ?>" target="_blank">
                        <img src="<?php echo wp_get_attachment_image_src( 81 )[ 0 ] ?>" alt="Instagram">
                    </a>
				<?php endif; ?>

				<?php if ( get_theme_mod( 'topbar_options_facebook' ) ) : ?>
                    <a href="<?php echo get_theme_mod( 'topbar_options_facebook' ); ?>" target="_blank">
                        <img src="<?php echo wp_get_attachment_image_src( 78 )[ 0 ] ?>" alt="Facebook">
                    </a>
				<?php endif; ?>

				<?php if ( get_theme_mod( 'topbar_options_whatsapp' ) ) : ?>
                    <a href="https://wa.me/<?php echo get_theme_mod( 'topbar_options_whatsapp' ); ?>" target="_blank" class ="header-whatsapp-link">
                        <img src="<?php echo wp_get_attachment_image_src( 102 )[ 0 ] ?>" alt="Whatsapp">
                    </a>
				<?php endif; ?>

                <div class="top-nav-line"></div>
				<?php if ( get_theme_mod( 'topbar_options_phone_one' ) ) : ?>
                    <a class="telephone-img" href="tel:<?php echo get_theme_mod( 'topbar_options_phone_one' ); ?>">
                        <img src="<?php echo wp_get_attachment_image_src( 84 )[ 0 ] ?>" alt="Phone">
                    </a>
				<?php endif; ?>
            </div>
        </div>
    </div>
    <!-- End Header -->

</section>


<!-- Header -->
<!-- Desktop -->
<nav class="nav desktop-nav">
    <div class="container-fluid nav justify-content-between align-items-center py-2">
        <ul class="ul flx-order-2 nav-logo-wrapper ms-0">
			<?php the_custom_logo(); ?>
        </ul>
		<?php

		wp_nav_menu( array(
			'theme_location'    => 'header',
			'depth'             => 3,
			'container'         => 'div',
			'menu_class'        => 'menu',
			'menu_id'           => 'header',
			'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
			'walker'            => new WP_Bootstrap_Navwalker(),
		) );
		?>

        <ul class="hamburger mb-0 ms-0 ps-0">
            <button class="hamburger-btn"><img src="<?php echo wp_get_attachment_image_src( 100 )[ 0 ] ?>" alt="Menu">
            </button>
        </ul>

        <ul class="ils-wrapper ul pe-3 flx-order-3 d-flex align-items-center mb-0 ms-0 ps-0">

			<?php if ( WC()->cart->get_cart_contents_count() != 0 ) : ?>
                <a class=" text-decoration-none " href="<?php echo wc_get_cart_url(); ?>">
                    <img class="shopping-cart pe-3 align-bottom"
                         src="<?php echo wp_get_attachment_image_src( 75 )[ 0 ] ?>" alt="Cart">
                </a>
                <a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>"
                   title="<?php _e( 'View your shopping cart' ); ?>">
					<?php echo sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
                    –
					<?php echo WC()->cart->get_cart_total(); ?>
                </a>
                <span class="vertical-line ms-2">|</span>
                <span class="nav-ils-text fs-4">ILS</span>
			<?php else: ?>
                <a class=" text-decoration-none " href="<?php echo wc_get_cart_url(); ?>">
                    <img class="shopping-cart align-bottom"
                         src="<?php echo wp_get_attachment_image_src( 75 )[ 0 ] ?>" alt="Cart">
                </a>
                <span class="vertical-line ps-3">|</span>
                <span class="nav-ils-text fs-4">ILS</span>
			<?php endif; ?>

        </ul>
    </div>
</nav>