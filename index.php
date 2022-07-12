<?php

/**
 * Template: All Posts
 *
 * @package chess_store
 */

get_header();

get_template_part( 'template-parts/blog/sticky', 'posts' );
?>


    <!-- Main Posts Container -->
    <section class="main-blog-showcase">
        <div class="container container-xxl">
            <div class="row">

                <!-- Posts Listing -->
				<?php get_template_part( 'template-parts/blog/posts', 'list' ); ?>

                <!-- Sidebar -->
                <div class="col-12 col-sm-12 col-md-12 col-xl-4 col-xxl-4 col-xxxl-4 mt-4">
					<?php get_sidebar(); ?>
                </div>

            </div>
        </div>
    </section>

<?php
get_footer();
