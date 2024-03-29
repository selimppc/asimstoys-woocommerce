<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<?php

	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
	 
	 // prev & next post -------------------
	 $post_prev = get_adjacent_post(false, '', true);
	 $post_next = get_adjacent_post(false, '', false);
	 $shop_page_id = wc_get_page_id( 'shop' );
	 
	 // post classes -----------------------
	 $classes = array();
	 $classes[] = 'product-single-main';
	 
?>

<div itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<div class="product-wrapper clearfix">
		
		<div class="product-single-inner row">
			<div class="column col-md-6 col-sm-12 col-xs-12 product_image_wrapper">
				<div class="column-inner">
					<div class="image_frame scale-with-grid">
						<?php
							/**
		 * woocommerce_before_single_product_summary hook.
							 *
							 * @hooked woocommerce_show_product_sale_flash - 10
							 * @hooked woocommerce_show_product_images - 20
							 */
							do_action( 'woocommerce_before_single_product_summary' );	
						?>
					</div>
					<?php do_action( 'woocommerce_product_thumbnails' ); ?>
				</div>	
			</div>

			<div class="column col-md-6 col-sm-12 col-xs-12 summary entry-summary">
				<div class="column-inner clearfix">
					<div class="menu-single-product">
						<?php
							next_post_link( '%link',  '<i class="mn-icon-158"></i>' , true, array(), 'product_cat' );
							previous_post_link( '%link',  '<i class="mn-icon-159"></i>', true, array(), 'product_cat' );
						?>
					</div>
					<?php
						/**
						 * woocommerce_single_product_summary hook
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
			 			 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */
						
						do_action( 'woocommerce_single_product_summary' );
					?>
					
				</div>
			</div>	
		</div>
	</div>
	<div class="single-product-meta">
		<?php woocommerce_template_single_meta() ?>
	</div>	
	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
