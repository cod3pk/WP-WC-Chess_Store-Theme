<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package chess_store
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(  ); ?>>

	<!-- Featured Image for Page -->
	<?php if ( has_post_thumbnail( $post->ID) ) : ?>
		<header class="blog-page-header mb-4">
				<div class="container container-xxl blog-page-header">
					<div class="blog-banner pt-4">
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
						<img src="<?php echo $image[ 0 ]; ?>" class="w-100" alt="<?php echo get_the_title( $post->ID ) ?>" >
					</div>
				</div>
			</div>
		</header>
	<?php endif; ?>

	<div class="row">
		<!-- Page Content -->
		<div class="col-12 col-sm-12 col-md-12 col-xl-8 col-xxl-8 col-xxxl-8 mt-4">

			<!-- Page Title -->
			<section class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</section>

			<div class="entry-content">
				<?php the_content(  ); ?>
			</div>

		</div>

		<!-- Sidebar -->
		<div class="col-12 col-sm-12 col-md-12 col-xl-4 col-xxl-4 col-xxxl-4 mt-4">
			<?php get_sidebar(  ); ?>
		</div>
	</div>



</article>