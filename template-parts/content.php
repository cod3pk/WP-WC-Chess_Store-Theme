<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package chess_store
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="blog-page-header">
		<div class="container container-xxl blog-page-header">
			<div class="blog-banner pt-4">
				<?php if (has_post_thumbnail($post->ID)) : ?>
					<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
					<img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title($post->ID) ?>" class="w-100">
			</div>
		<?php endif; ?>
		</div>
		</div>
	</header>

	<section class="blog-page-showcase">
		<div class="container container-xxl">
			<div class="row">

				<!-- Post Content -->
				<div class="col-12">
					<p class="text-center pt-3 mb-4">
						<?php
						$post_date = get_the_date('M d Y');
						echo $post_date;
						?>
					</p>
					<h1 class="mb-0 blog-page-title">
						<?php echo get_the_title($post->ID) ?>
					</h1>
					<hr class="border-line">
				</div>

				<div class="col-12 col-sm-12 col-md-12 col-xl-8 col-xxl-8 col-xxxl-8 mt-4">
					<?php
					the_content();
					?>
				</div>

				<!-- Sidebar -->
				<div class="col-12 col-sm-12 col-md-12 col-xl-4 col-xxl-4 col-xxxl-4 mt-4">
					<?php get_sidebar(  ); ?>
				</div>
			</div>
	</section>

</article><!-- #post-<?php the_ID(); ?> -->