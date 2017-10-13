<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$_id = decorpi_random_id();

$line_data = array();
$items = (array) vc_param_group_parse_atts( $items );

foreach ( $items as $data ) {
  $new_line = $data;
  $new_line['type'] = isset( $data['product_type'] ) ? $data['product_type'] : '';
  $new_line['category'] = isset( $data['product_cats'] ) ? $data['product_cats'] : '';

  $term = get_term_by( 'slug', $new_line['category'], 'product_cat' );
  if($term && isset($term->name) && $term->name){
      $new_line['name'] = $term->name;
  }else{
    $new_line['name'] = isset( $data['name'] ) ? $data['name'] : '';
  }
  $line_data[] = $new_line;
}

$attrs = array(
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
  'touch_drag'          => $ca_touch_drag,
  'number'              => $number
);

?>

<div class="widget gva-tabs-products <?php echo esc_attr($el_class) ?>">
  <?php if($title){ ?>
    <div class="widget-heading">
      <div class="widget-title">
        <?php echo esc_html( $title ); ?>
      </div>
    </div>  
  <?php } ?>  

   <div class="clearfix widget-content">
      <div class="tabs-list clearfix">
        <ul class="nav nav-tabs col-xs-12 col-second">
           <?php $i = 0; ?>
           <?php foreach ($line_data as $key => $value): $i++; ?>
              <li <?php if($i==1) echo 'class="active"'; ?>><a href="#<?php echo esc_attr($key.'-'.$_id); ?>" data-toggle="tab"><?php echo esc_attr($value['name']) ?></a></li>
           <?php endforeach; ?>
        </ul>
      </div>

      <div class="tabs-container clearfix">
         <div class="tab-content">
               <?php $i = 0; ?>
               <?php foreach ($line_data as $key => $value): $i++; ?>
                  <div class="tab-pane <?php if($i==1) echo 'active'; ?>" id="<?php echo esc_attr($key).'-'.$_id; ?>">
                    <div class="shop-products same-height">
                     <?php 
                        $loop = decorpi_woocommerce_query($value['type'], $number, $value['category']);
                        if($loop->have_posts()){
                           wc_get_template( 'display/'.$style.'.php' , array( 'query'=> $loop, 'attrs' => $attrs ));
                        }
                     ?>
                    </div>
                  </div> 
               <?php endforeach; ?> 
               <?php wp_reset_postdata(); ?>
         </div>
      </div>
   </div>
</div>
