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
									<img src="<?php echo $image; ?>" alt="<?php echo $cat->name; ?>" width="100%">
									<p class="mb-0 blog-description">
										<?php echo $cat->name ?>
									</p>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
	</section>

</article><!-- #post-<?php the_ID(); ?> -->