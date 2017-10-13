<?php
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
   $items = (array) vc_param_group_parse_atts( $items );
   $datas = array();
   foreach ( $items as $data ) {
     $new_line = $data;
     $new_line['title'] = isset( $data['title'] ) ? $data['title'] : '';
     $new_line['icon'] = isset( $data['icon'] ) ? $data['icon'] : '';
     $new_line['image'] = isset( $data['image'] ) ? $data['image'] : '';
     $new_line['color'] = isset( $data['color'] ) ? $data['color'] : '';
     $new_line['link'] = isset( $data['link'] ) ? $data['link'] : '';
     $datas[] = $new_line;

   }
   $_id = decorpi_random_id();
?>

<div class="gva-feature-services">
  <div class="init-carousel-owl owl-carousel" <?php echo decorpi_set_carousel_attrs($carousel_attrs) ?>>
      <?php foreach ($datas as $data) { ?>
         <?php  $photo = wp_get_attachment_image_src($data['image'], 'full'); ?>  
         <div class="feature-category feature-category-v1 has-image" style="background-color: <?php echo esc_url($data['color']) ?>">
            <?php if(isset($photo[0]) && $photo[0]){ ?>
               <div class="image-bg">
                  <a href="<?php echo esc_url($data['link']) ?>">
                     <img src="<?php echo esc_url($photo[0]) ?>" alt="" class="img-responsive">
                  </a>
               </div>
            <?php } ?>
            <div class="content-feature">
               <div class="image">
                  <a href="<?php echo esc_url($data['link']) ?>">
                     <i class="<?php echo esc_attr($data['icon']) ?>"></i>
                  </a>
               </div>
               <div class="caption">
                  <h4 class="heading"><a href="<?php echo esc_url($data['link']) ?>"><?php echo esc_html($data['title']) ?></a></h4>
               </div>   
            </div>   
         </div>
      <?php } ?>
      
  </div>
</div>