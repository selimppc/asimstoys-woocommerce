<?php
$title = $product_cats = $el_class = '';
$show_desc = 'off';
$number = 4;
$style = 'carousel';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
 $carousel_attrs = array(
    'items'               => $items_lg,
    'items_lg'            => $items_lg,
    'items_md'            => $items_md,
    'items_sm'            => $items_sm,
    'items_xs'            => $items_xs,
    'loop'                => $ca_loop,
    'speed'               => $ca_speed,
    'auto_play'           => $ca_auto_play,
    'auto_play_speed'     => $ca_auto_play_speed,
    'auto_play_timeout'   => $ca_auto_play_timeout,
    'auto_play_hover'     => $ca_play_hover,
    'navigation'          => $ca_navigation,
    'rewind_nav'          => $ca_rewind_nav,
    'pagination'          => $ca_pagination,
    'mouse_drag'          => $ca_mouse_drag,
    'touch_drag'          => $ca_touch_drag
  );
$deals_loop = decorpi_woocommerce_query('deals', $number, $product_cats);
?>
<div class="widget gva-deals <?php echo esc_attr($style_view) ?> <?php echo esc_attr($el_class) ?>">
   <?php if($title){ ?>
      <div class="widget-heading">
        <div class="widget-title">
            <?php echo esc_html( $title ); ?>
         </div>   
      </div>   
   <?php } ?>   
   <div class="products-deals carousel-view widget-content">
      <?php if($style == 'carousel'){ ?>
        <div class="init-carousel-owl owl-carousel" <?php echo decorpi_set_carousel_attrs($carousel_attrs) ?>>
      <?php } else { ?>
        <div class="lg-block-grid-<?php echo esc_attr($items_lg) ?> md-block-grid-<?php echo esc_attr($items_md) ?> sm-block-grid-<?php echo esc_attr($items_sm) ?> xs-block-grid-<?php echo esc_attr($items_xs) ?>">
      <?php } ?>
         <?php if($deals_loop->have_posts()){ 
             while ( $deals_loop->have_posts() ) : $deals_loop->the_post(); global $product; 
              if($style == 'grid'){ echo '<div class="item-columns">'; }
                  wc_get_template( 'content-product-deals.php', array('product'=>$product, 'show_desc' => $show_desc));
              if($style == 'grid'){ echo '</div>';}
            endwhile;      
         } ?>
         <?php  wp_reset_postdata(); ?>
      </div>  
   </div>   
</div>    