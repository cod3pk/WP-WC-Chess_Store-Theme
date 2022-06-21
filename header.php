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
	<meta charset="<?php bloginfo('charset'); ?>">
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

					<?php if (get_theme_mod('topbar_options_insta')) : ?>
						<a href="<?php echo get_theme_mod('topbar_options_insta'); ?>" target="_blank">
							<img src="<?php echo wp_get_attachment_image_src(81)[0] ?>" alt="Instagram">
						</a>
					<?php endif; ?>

					<?php if (get_theme_mod('topbar_options_facebook')) : ?>
						<a href="<?php echo get_theme_mod('topbar_options_facebook'); ?>" target="_blank">
							<img src="<?php echo wp_get_attachment_image_src(78)[0] ?>" alt="Facebook">
						</a>
					<?php endif; ?>

					<?php if (get_theme_mod('topbar_options_whatsapp')) : ?>
						<a href="https://wa.me/<?php echo get_theme_mod('topbar_options_whatsapp'); ?>" target="_blank">
							<img src="<?php echo wp_get_attachment_image_src(102)[0] ?>" alt="Whatsapp">
						</a>
					<?php endif; ?>

				</div>
				<div class="nav-top-num d-flex justify-content-between">
					<?php if (get_theme_mod('topbar_options_phone_one')) : ?>
						<a href="tel:<?php echo get_theme_mod('topbar_options_phone_one'); ?>" class="white-links text-decoration-none white-links" target="_blank">
							<p class="mb-0"><?php echo get_theme_mod('topbar_options_phone_one'); ?></p>
						</a>
					<?php endif; ?>

					<?php if (get_theme_mod('topbar_options_phone_two')) : ?>
						<a href="tel:<?php echo get_theme_mod('topbar_options_phone_two'); ?>" class="white-links text-decoration-none white-links" target="_blank">
							<p class="mb-0"><?php echo get_theme_mod('topbar_options_phone_two'); ?></p>
						</a>
					<?php endif; ?>
				</div>
			</div>
			<div class="nav-flag">
				<!-- <img src="./assets/imgs/united-kingdom.svg"> -->
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

					<?php if (get_theme_mod('topbar_options_insta')) : ?>
						<a href="<?php echo get_theme_mod('topbar_options_insta'); ?>" target="_blank">
							<img src="<?php echo wp_get_attachment_image_src(81)[0] ?>" alt="Instagram">
						</a>
					<?php endif; ?>

					<?php if (get_theme_mod('topbar_options_facebook')) : ?>
						<a href="<?php echo get_theme_mod('topbar_options_facebook'); ?>" target="_blank">
							<img src="<?php echo wp_get_attachment_image_src(78)[0] ?>" alt="Facebook">
						</a>
					<?php endif; ?>

					<?php if (get_theme_mod('topbar_options_whatsapp')) : ?>
						<a href="https://wa.me/<?php echo get_theme_mod('topbar_options_whatsapp'); ?>" target="_blank">
							<img src="<?php echo wp_get_attachment_image_src(102)[0] ?>" alt="Whatsapp">
						</a>
					<?php endif; ?>

					<div class="top-nav-line"></div>
					<?php if (get_theme_mod('topbar_options_phone_one')) : ?>
						<a class="telephone-img" href="tel:<?php echo get_theme_mod('topbar_options_phone_one'); ?>">
							<img src="<?php echo wp_get_attachment_image_src(84)[0] ?>" alt="Phone">
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
				// wp_nav_menu(array(
				// 	'theme_location' => 'header',
				// 	'menu_id' => 'header'
				// ));

				wp_nav_menu( array(
					'theme_location'  => 'header',
					'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
					'container'       => 'div',
					'menu_class'      => 'menu',
					'menu_id'		=> 'header',
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker(),
				) );
			?>

			<ul class="hamburger mb-0 ms-0 ps-0">
				<button class="hamburger-btn"><img src="<?php echo wp_get_attachment_image_src(100)[0] ?>" alt="Menu"></button>
			</ul>

			<ul class="ul pe-3 flx-order-3 d-flex align-items-center mb-0 ms-0 ps-0">
				<a class=" text-decoration-none " href="<?php echo site_url('/cart'); ?>">
					<img class="shopping-cart pe-3 align-bottom" src="<?php echo wp_get_attachment_image_src(75)[0] ?>" alt="Cart">
				</a>
				<span class="vertical-line">|</span>
				<span class="nav-ils-text fs-4">ILS</span>
			</ul>
		</div>
	</nav>

	<!-- Mobile Menu -->
	<ul class="navbar-nav page_items-wrapper-2 hidden">
		<div class="sidenav">
			<?php
			wp_nav_menu(
				array(
					'theme_location'	=> 'Header',
					'menu_id'			=> 'header'
				)
			);
			?>
		</div>
	</ul>

	<!-- Mobile Menu -->
	<!-- <ul class="navbar-nav page_items-wrapper-2 hidden">
		<div class="sidenav">
			<a href="#about">Home</a>
			<button class="dropdown-btn">Sets
				<img class="fa-caret-down" src="./assets/imgs/arrow-down.png" alt="arrow-down">
			</button>
			<div class="dropdown-container">
				<a href="#">Link 1</a>
				<a href="#">Link 2</a>
				<a href="#">Link 3</a>
			</div>

			<button class="dropdown-btn">Gear
				<img class="fa-caret-down" src="./assets/imgs/arrow-down.png" alt="arrow-down">
			</button>
			<div class="dropdown-container">
				<a href="#">Chess clocks</a>
				<a href="#">Chess boxes, bags and suitcases</a>
				<a href="#">Chess books</a>
				<a href="#">Chess tables</a>
				<a href="#">Street Chess</a>
				<a href="#">Chess software</a>
				<a href="#">Chess equipment for classes, clubs and competitions</a>
			</div>
			<button class="dropdown-btn">Specials
				<img class="fa-caret-down" src="./assets/imgs/arrow-down.png" alt="arrow-down">
			</button>
			<div class="dropdown-container">
				<a href="#">Link 1</a>
				<a href="#">Link 2</a>
				<a href="#">Link 3</a>
			</div>
			<a href="#">Blog</a>
			<a href="#clients">About</a>
			<a href="#contact">Company</a>
		</div>
	</ul> -->
	<!-- End Header -->