<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><span class="title"><?php echo esc_html__('SKU:', 'decorpi') ?></span> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'n/a', 'decorpi' ); ?></span>.</span>

	<?php endif; ?>

	<?php echo wp_kses(wc_get_product_category_list($product->get_id(), ', ', '<span class="posted_in">' . _n( '<span class="title">Category:</span>', '<span class="title">Categories:</span>', $cat_count, 'decorpi' ) . ' ', '.</span>' ), true); ?>

	<?php echo wp_kses(wc_get_product_category_list($product->get_id(), ', ', '<span class="tagged_as">' . _n( '<span class="title">Tag:</span>', '<span class="title">Tags:</span>', $tag_count, 'decorpi' ) . ' ', '.</span>' ), true); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>