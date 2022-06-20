<?php

/**
 * Template: Single Product
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

get_header();

/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */

while (have_posts()) :
	the_post();

	wc_get_template_part('content', 'single-product');

endwhile; // end of the loop.


get_footer();
