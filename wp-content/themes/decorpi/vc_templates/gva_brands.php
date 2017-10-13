<?php
$title = $el_class = '';
$per_page = $columns = '6';
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
  'post_type'          => 'brands',
  'post_status'       => 'publish',
  'posts_per_page'       => $per_page,
  'orderby'           => 'date',
  'order'             => 'desc'
);

$loop = new WP_Query($args);

?>

<section aria-label="brands" class="widget gva-brands no-bg <?php echo (($el_class!='')?' '.$el_class:''); ?>">
    <?php if( $title ) { ?>
        <h3 class="widget-title visual-title">
           <span><?php echo esc_html($title); ?></span>
        </h3>
    <?php } ?>

    <div class="widget-content">
      <div class="count-row">
        <div class="init-carousel-owl owl-carousel" <?php echo decorpi_set_carousel_attrs($carousel_attrs) ?>>
             <?php while ( $loop->have_posts() ) : $loop->the_post(); 
              $url_link = get_post_meta( get_the_ID(), 'gva_url_link', true );
              ?>
                <div class="item-brand text-center">
                  <a href="<?php echo esc_url_raw($url_link ); ?>"><?php the_post_thumbnail('full' ); ?></a>     
                </div>
             <?php endwhile; 
             wp_reset_postdata();
             ?>
          </div>
       </div>
    </div>
</section>
