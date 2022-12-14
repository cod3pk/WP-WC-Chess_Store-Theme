<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package chess_store
 */

?>

<!-- Footer-Star -->
<footer class="footer container-fluid">
    <div class="footer-content container-xxl container-sm d-flex justify-content-between m-auto">

        <!-- Footer Social Icons -->
        <div class="footer-social-links desktop-social-links d-flex align-self-end">
			<?php if ( get_theme_mod( 'topbar_options_insta' ) ) : ?>
                <a href="<?php echo get_theme_mod( 'topbar_options_insta' ); ?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/instagram.svg ?>" alt="<?php echo __( 'Instagram', 'chess-store' ) ?>">
                </a>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'topbar_options_facebook' ) ) : ?>
                <a href="<?php echo get_theme_mod( 'topbar_options_facebook' ); ?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/facebook.svg ?>" alt="<?php echo __( 'Facebook', 'chess-store' ) ?>">
                </a>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'topbar_options_whatsapp' ) ) : ?>
                <a href="https://wa.me/<?php echo get_theme_mod( 'topbar_options_whatsapp' ); ?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/whatsapp.svg ?>" alt="<?php echo __( 'Whatsapp', 'chess-store' ) ?>">
                </a>
			<?php endif; ?>
        </div>

        <!-- Footer Contact INFO -->
        <div class="footer-contect-num d-flex justify-content-between align-self-end">
			<?php if ( get_theme_mod( 'footer_options_phone_one' ) ) : ?>
                <a href="tel:<?php echo get_theme_mod( 'footer_options_phone_one' ); ?>"
                   class="text-decoration-none white-links" target="_blank">
                    <p class="phone-numbers"><?php echo get_theme_mod( 'footer_options_phone_one' ); ?></p>
                </a>
			<?php endif; ?>

			<?php if ( get_theme_mod( 'footer_options_phone_two' ) ) : ?>
                <a href="tel:<?php echo get_theme_mod( 'footer_options_phone_two' ); ?>"
                   class="text-decoration-none white-links" target="_blank">
                    <p class="phone-numbers"><?php echo get_theme_mod( 'footer_options_phone_two' ); ?></p>
                </a>
			<?php endif; ?>
        </div>

        <!-- Footer Navigation -->
        <div class="footer-info-text d-flex align-self-end">
			<?php
			wp_nav_menu( array(
				'theme_location'    => 'footer',
				'menu_id'           => 'footer',
                'menu_class'        => 'd-flex align-items-center',
                'depth' => 1,
                'container' => 'div',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                'walker' => new WP_Bootstrap_Navwalker(),
			) );
			?>
        </div>

        <!-- Footer Logo -->
        <div class="footer-logo">
			<?php if ( get_theme_mod( 'footer_logo_image' ) ) : ?>
                <a href="<?php echo site_url(); ?>">
                    <img class="footer-logo-img" src="<?php echo get_theme_mod( 'footer_logo_image' ); ?>" alt="Logo">
                </a>
			<?php endif; ?>
        </div>

    </div>
</footer>
<!-- Footer-END -->

<!-- Bottom Bar -->
<section class="footer-bottom-link d-flex justify-content-center m-auto">
	<?php if ( get_theme_mod( 'footer_options_credit' ) ) : ?>
        <p class="footer-btm-desc"> <?php echo get_theme_mod( 'footer_options_credit' ); ?> </p>
	<?php endif; ?>
</section>

<?php wp_footer(); ?>

</body>

</html>