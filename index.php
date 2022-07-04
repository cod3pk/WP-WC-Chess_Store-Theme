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

				<!-- Subscription Form -->
				<div class="subscription p-3">
					<img src="<?php echo get_template_directory_uri() . '/images/email-message.jpeg' ?>" alt="email" class="mb-4" width="50px">
					<p>
						<?php echo __('Subscribe to our Newsletter', 'chess-store'); ?>
					</p>
					<form action="#" class="pb-3">
						<input class="bg-white p-2 w-100 fs-5 mb-3 subscription-input" type="email" name="email" id="email" placeholder="<?php echo __('Enter your Email', 'chess-store'); ?>">
						<button class="p-2 px-5 subscription-btn">
							<?php echo __('Subscribe', 'chess-store') ?>
						</button>
					</form>
				</div>

				<!-- Categories -->
				<h2 class="m-0 recent-blog-title fs-5 pt-4"><?php echo __('Categories', 'chess-store') ?></h2>
				<hr class="border-line border-line-2">

				<div class="row">
					<?php
					$cats = get_post_sidebar_categories();

					foreach ($cats as $cat) :
						// get the thumbnail id using the queried category term_id
						$thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);

						// get the image URL
						$image = wp_get_attachment_url($thumbnail_id);
					?>
						<div class="col-4 position-relative">
							<a href="<?php echo get_term_link($cat->term_id, 'product_cat') ?>">
								<img src="<?php echo $image; ?>" alt="<?php echo $cat->name; ?>" class="sidebar-cat-img">
								<p class="mb-0 blog-description">
									<?php echo $cat->name ?>
								</p>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

		</div>
	</div>
</section>

<?php
get_footer();
