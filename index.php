<?php

/**
 * Template: All Posts
 *
 * @package chess_store
 */

get_header();
?>

<!-- Sticky Posts -->
<section class="main-blog-header pt-5">
	<div class="container container-xxl">
		<div class="row">
			<?php
			$sticky_posts = get_sticky_posts();
			foreach ($sticky_posts as $post) :
			?>
				<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 col-xxxl-4">
					<a href="<?php echo get_the_permalink($post->ID) ?>">
						<div class="blog-card">
							<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
							<img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title($post->ID) ?>" class="w-100 mb-2 blog-post-image">
							<p class="fs-3 mb-1 blog-card-text">
								<?php echo get_the_title($post->ID) ?>
							</p>
							<p class="mb-1 blog-card-text">
								<?php echo wp_trim_words(get_the_excerpt($post), 30) ?>
							</p>
							<p class="blog-card-text">
								<?php
								$post_date = get_the_date('M d Y');
								echo $post_date;
								?>
							</p>
						</div>
					</a>
				</div>
			<?php endforeach; ?>

		</div>
		<hr class="w-100">
	</div>
</section>

<!-- Main Posts Container -->
<section class="main-blog-showcase">
	<div class="container container-xxl">
		<div class="row">

			<!-- All Posts -->
			<div class="col-12 col-sm-12 col-md-12 col-xl-8 col-xxl-8 col-xxxl-8 mt-4">
				<?php
				if (have_posts()) :

					/* Start the Loop */
					while (have_posts()) :
						the_post(); ?>

						<a href="<?php echo get_the_permalink($post->ID) ?>">
							<div class="blog-card d-flex align-items-center justify-content-center mb-25">
								<div class="main-blog-recent-post d-inline-block">
									<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
									<img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title($post->ID) ?>" class="w-100 mb-2 blog-post-image">
								</div>
								<div class="d-inline-block content-width-card">
									<p class="fs-3 mb-1 blog-card-text">
										<?php echo get_the_title($post->ID) ?>
									</p>
									<p class="mb-1 blog-card-text">
										<?php echo wp_trim_words(get_the_excerpt($post), 30) ?>
									</p>
									<p class="blog-card-text">
										<?php
										$post_date = get_the_date('M d Y');
										echo $post_date;
										?>
									</p>
								</div>
							</div>
						</a>

				<?php endwhile;

					the_posts_navigation();

				else :

					get_template_part('template-parts/content', 'none');

				endif;
				?>
			</div>

			<!-- Sidebar -->
			<div class="col-12 col-sm-12 col-md-12 col-xl-4 col-xxl-4 col-xxxl-4 mt-4">
				<?php get_sidebar(); ?>
			</div>

		</div>
	</div>
</section>

<?php
get_footer();
