<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	get_header(apply_filters('decorpi_get_header_layout', null ));

  $page_title_style = 'standard';
  $page_id = decorpi_id();
  if(get_post_meta( $page_id, 'decorpi_page_title_style', true )){
    $page_title_style = get_post_meta( $page_id, 'decorpi_page_title_style', true );
  }
  if(is_product_tag() || is_product_category() ){
    $page_title_style = decorpi_get_option('woo_page_heading_style', 'standard');
  }
  if(isset($_GET['hst']) && $_GET['hst']){
    $page_title_style = $_GET['hst'];
  } 

  $sidebar_layout_config = decorpi_get_option('woo_sidebar_config', '');
  $left_sidebar = decorpi_get_option('woo_left_sidebar', '');
  $right_sidebar = decorpi_get_option('woo_right_sidebar', '');

  if(is_shop()){
    $sidebar_layout_config = get_post_meta( $page_id, 'decorpi_sidebar_config', true);
    $left_sidebar = get_post_meta($page_id, 'decorpi_left_sidebar', true);
    $right_sidebar = get_post_meta($page_id, 'decorpi_right_sidebar', true);
     if ($sidebar_layout_config == "") {
      $sidebar_layout_config = decorpi_get_option('woo_sidebar_config', ''); 
    }
    if ($left_sidebar == "") {
      $left_sidebar = decorpi_get_option('woo_left_sidebar', '');  
    }
    if ($right_sidebar == "") {
      $right_sidebar = decorpi_get_option('woo_right_sidebar', ''); 
    }
  }

	$left_sidebar_config  = array('active' => false);
  $right_sidebar_config = array('active' => false);
  $main_content_config  = array('class' => 'col-lg-12 col-xs-12');

  if(isset($_GET['sb']) && $_GET['sb']){
    $sidebar_layout_config = $_GET['sb'];
  }

	$sidebar_config = decorpi_sidebar_global($sidebar_layout_config, $left_sidebar, $right_sidebar);
   
	extract($sidebar_config);

  $woo_display = decorpi_display_modes_value();
 ?>

<section id="wp-main-content" class="clearfix main-page title-layout-<?php echo esc_attr($page_title_style); ?>">
    <?php
      /**
       * woocommerce_before_main_content hook
       *
       * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
       * @hooked woocommerce_breadcrumb - 20
       */
      do_action( 'woocommerce_before_main_content' );
    ?>
    
   <div class="container">	
   	  <div class="main-page-content row">
         <div class="content-page <?php echo esc_attr($main_content_config['class']); ?>">      
           
     			  <div id="wp-content" class="wp-content">	

  						<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

  							<h1 class="page-title hidden"><?php woocommerce_page_title(); ?></h1>

  						<?php endif; ?>

  						<?php do_action( 'woocommerce_archive_description' ); ?>
              <?php woocommerce_product_subcategories(); ?>  
     						<?php if ( have_posts() ) : ?>
                  <div class="shop-loop-container">
                    <div class="gvawooaf-before-products layout-<?php echo esc_attr($woo_display) ?>">
       								<div class="woocommerce-filter clearfix">
                        <?php
         									/**
         									 * woocommerce_before_shop_loop hook
         									 *
         									 * @hooked woocommerce_result_count - 20
         									 * @hooked woocommerce_catalog_ordering - 30
         									 */
         									do_action( 'woocommerce_before_shop_loop' );
         								?>
                      </div> 

                      <?php do_action('decorpi_woocommerce_active_filter' );  ?>
     							      
                      <?php get_sidebar('filter'); ?>
                        
                      <?php woocommerce_product_loop_start(); ?>
     										
                      <?php while ( have_posts() ) : the_post(); ?>

     									<?php wc_get_template_part( 'content', 'product' ); ?>

     									<?php endwhile; // end of the loop. ?>
     							      
                      <?php woocommerce_product_loop_end(); ?>

     							<?php
     								/**
     								 * woocommerce_after_shop_loop hook
     								 *
     								 * @hooked woocommerce_pagination - 10
     								 */
     								do_action( 'woocommerce_after_shop_loop' );
     							?> 
                  </div>
                </div>
  						<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

  							<?php wc_get_template( 'loop/no-products-found.php' ); ?>

  						<?php endif; ?>

  				 </div>
   				
         </div>      

         <!-- Left sidebar -->
         <?php if($left_sidebar_config['active']): ?>
         <div class="sidebar wp-sidebar sidebar-left <?php echo esc_attr($left_sidebar_config['class']); ?>">
            <?php do_action( 'decorpi_before_sidebar' ); ?>
            <div class="sidebar-inner">
               <?php dynamic_sidebar($left_sidebar_config['name'] ); ?>
            </div>
            <?php do_action( 'decorpi_after_sidebar' ); ?>
         </div>
         <?php endif ?>

         <!-- Right Sidebar -->
         <?php if($right_sidebar_config['active']): ?>
         <div class="sidebar wp-sidebar sidebar-right <?php echo esc_attr($right_sidebar_config['class']); ?>">
            <?php do_action( 'decorpi_before_sidebar' ); ?>
               <div class="sidebar-inner">
                  <?php dynamic_sidebar($right_sidebar_config['name'] ); ?>
               </div>
            <?php do_action( 'decorpi_after_sidebar' ); ?>
         </div>
         <?php endif ?>
      </div>   
   </div>

    <?php
      /**
       * woocommerce_after_main_content hook
       *
       * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
       */
      do_action( 'woocommerce_after_main_content' );
   ?>
</section>

<?php get_footer(); ?>
