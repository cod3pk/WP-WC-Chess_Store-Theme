<?php

/**
 * Single Product Price
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

global $product;
$product_data = wc_get_product($product->id);


if ($product_data->get_type() == 'variable') :

	$price = $product->get_price_html();
	$price_arr = explode(" ", html_entity_decode($price));
	$length = count($price_arr);

	for ($i = 0; $i < 3; $i++) {
		$even[] = $price_arr[$i];
	}

	for ($i = 3; $i < 9; $i++) {
		$odd[] = $price_arr[$i];
	}

	$even = str_replace('woocommerce-Price-amount', 'old-price position-relative', $even);
	$odd = str_replace('woocommerce-Price-amount', 'new-price', $odd);

	$new_price = implode(" ", array_merge($even, $odd));
?>
	<p class="<?php echo esc_attr(apply_filters('woocommerce_product_price_class', 'price')); ?>"><?php echo $new_price; ?></p>
<?php
else :

	$price = str_replace('woocommerce-Price-amount', 'new-price', $product->get_price_html());
?>
	<p class="<?php echo esc_attr(apply_filters('woocommerce_product_price_class', 'price')); ?>"><?php echo $price ?></p>
<?php

endif;
