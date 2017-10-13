<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	get_header(apply_filters('decorpi_get_header_layout', null )); 
  
	$page_id = decorpi_id();

  $page_title_style = get_post_meta($page_id, 'decorpi_page_title_style', true );
  if(!$page_title_style)  $page_title_style = 'standard';
	$default_sidebar_config = decorpi_get_option('product_sidebar_config', ''); 
	$default_left_sidebar = decorpi_get_option('product_left_sidebar', ''); 
	$default_right_sidebar = decorpi_get_option('product_right_sidebar', ''); 

	$sidebar_layout_config = get_post_meta($page_id, 'decorpi_sidebar_config', true);
	$left_sidebar = get_post_meta($page_id, 'decorpi_left_sidebar', true);
	$right_sidebar = get_post_meta($page_id, 'decorpi_right_sidebar', true);

	if ($sidebar_layout_config == "") {
		$sidebar_layout_config = $default_sidebar_config;
	}
	if ($left_sidebar == "") {
		$left_sidebar = $default_left_sidebar;
	}
	if ($right_sidebar == "") {
		$right_sidebar = $default_right_sidebar;
	}

	$left_sidebar_config  = array('active' => false);
   $right_sidebar_config = array('active' => false);
   $main_content_config  = array('class' => 'col-lg-12 col-xs-12');

	$sidebar_config = decorpi_sidebar_global($sidebar_layout_config, $left_sidebar, $right_sidebar);
   
	extract($sidebar_config);

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
           
     			<?php while ( have_posts() ) : the_post(); ?>

     				<?php wc_get_template_part( 'content', 'single-product' ); ?>

     			<?php endwhile; // end of the loop. ?>
     				
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

    <div class="related-section">
      <div class="container">
        <?php woocommerce_output_related_products() ?>
      </div>
    </div>
</section>

<!-- PhotoSwipe -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="pswp__bg"></div>

  <div class="pswp__scroll-wrap">

    <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
    </div>

    <div class="pswp__ui pswp__ui--hidden">
      <div class="pswp__top-bar">
          <div class="pswp__counter"></div>
          <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
          <button class="pswp__button pswp__button--share" title="Share"></button>
          <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
          <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
          <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
          </div>
      </div>
      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
          <div class="pswp__share-tooltip"></div>
      </div>
      <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
      <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
      <div class="pswp__caption">
        <div class="pswp__caption__center">
        </div>
      </div>
    </div>

  </div>
</div>
<?php get_footer(); ?>