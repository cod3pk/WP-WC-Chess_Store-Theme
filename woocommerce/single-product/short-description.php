<?php

/**
 * Single product short description
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

global $post;
$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

if (!$short_description) {
	return;
}

?>
<div class="detail-content-info">
	<?php echo nl2br($short_description); ?>
</div>