<?php

/*
*
* Template Name: Page with Sidebar
*
* The template for displaying all pages
* @package: chess_store
*
*/

get_header();
?>


    <main id="primary" class="site-main header about-container mt-5">

		<?php
		while ( have_posts() ) :
			the_post( );

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>

    </main><!-- #main -->

<?php
get_footer();
