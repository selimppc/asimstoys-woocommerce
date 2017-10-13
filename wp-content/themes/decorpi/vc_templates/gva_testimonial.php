<?php 
$title = $categories = $el_class = '';
$per_page = 4;
$columns = 1;
$show_avatar = 1;
$text_color_style = 'text-default';
$style_display = 'default';

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
$args = array(
   'post_type'          => 'testimonials',
   'post_status'       => 'publish',
   'ignore_sticky_posts'  => true,
   'posts_per_page'       => $per_page,
   'orderby'           => 'date',
   'order'             => 'desc'
);
if( is_array($categories) && is_numeric($categories) ){
   $args['tax_query'] = array(
      array(
         'taxonomy' => 'testimonial_cat',
         'terms' => $categories,
         'field' => 'term_id',
         'include_children' => false
      )
   );
}
$loop = new WP_Query($args);
?>
<div class="widget vc-widget gva-testimonials container avata-<?php echo esc_attr($show_avatar) ?> <?php echo esc_attr($style_display) ?> <?php echo esc_attr($el_class) ?>">
   <?php if($title){ ?>
   <div class="widget-heading">
      <h3 class="widget-title">
        <span>
          <?php echo esc_html($title); ?>
        </span> 
      </h3>
    </div>
   <?php } ?>
   <div class="products carousel-view">
      <div class="init-carousel-owl owl-carousel" <?php echo decorpi_set_carousel_attrs($carousel_attrs) ?>>
         <?php $i=0; while ( $loop->have_posts() ) : $loop->the_post(); $i++; ?>
               <div class="item-testimonial">
                  <div class="blockquote">
                     <?php the_content(); ?>
                  </div>
                  <div class="meta">
                     <div class="left">
                        <div class="avata">
                           <?php the_post_thumbnail('full' ); ?>
                        </div>   
                     </div>
                     <div class="right">
                        <div class="name"><?php the_title(); ?></div>
                        <div class="job"><?php the_title(); ?></div>
                     </div>
                  </div>
               </div>
         <?php endwhile; 
         wp_reset_postdata();
         ?>
      </div>
   </div>
</div>