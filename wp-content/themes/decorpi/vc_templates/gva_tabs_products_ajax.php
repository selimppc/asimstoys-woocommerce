<?php
$title = $icon = $product_cats = $el_class = $items ='';
$show_desc = 'off';
$show_tabs = 'recent, featured_product, best_selling';
$style = 'grid';
$columns_count = 3;
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$_id = decorpi_random_id();

$line_data = array();
$items = (array) vc_param_group_parse_atts( $items );

foreach ( $items as $data ) {
  $new_line = $data;
  $new_line['type'] = isset( $data['product_type'] ) ? $data['product_type'] : '';
  $new_line['category'] = isset( $data['product_cats'] ) ? $data['product_cats'] : '';
  $new_line['style'] = isset( $data['style'] ) ? $data['style'] : '';

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

<div class="widget gva-tabs-products-ajax">
  <?php if($title){ ?>
    <div class="widget-heading">
      <div class="widget-title">
        <span><?php echo esc_html( $title ); ?></span>
      </div>
    </div>  
  <?php } ?>  

   <div class="clearfix widget-content">
      <div class="tabs-list clearfix">
        <ul data-load="ajax" class="nav nav-tabs col-xs-12">
           <?php $i = 0; ?>
           <?php foreach ($line_data as $key => $value): $i++; ?>
                <li <?php if($i==1) echo 'class="active"'; ?>>
                  <a href="#<?php echo esc_attr($key.'-'.$_id); ?>" data-toggle="tab" ><?php echo esc_attr($value['name']) ?></a>
                </li>
           <?php endforeach; ?>
        </ul>
      </div>

      <div class="tabs-container clearfix">
         <div class="tab-content">
             <?php $i = 0; ?>
             <?php foreach ($line_data as $key => $value): $i++; ?>
              <?php
                $attrs['style'] = esc_attr($value['style']);
                $attrs['type'] = esc_attr($value['type']);
                $attrs['categories'] = esc_attr($value['category']);
              ?>
                <div class="tab-pane <?php if($i==1) echo 'active'; ?>" id="<?php echo esc_attr($key).'-'.$_id; ?>" data-loaded="false">
                  <textarea class="hidden data-attrs"><?php echo urlencode(json_encode( array( $attrs ) ) ) ?></textarea>
                  <div class="shop-products">
                    <div class="tab-content-products">
                      <?php if($i==1){ 
                        $loop = decorpi_woocommerce_query($value['type'], $number, $value['category']);
                        if($loop->have_posts()){
                           wc_get_template( 'display/'.$value['style'].'.php' , array( 'query' => $loop, 'attrs' => $attrs ) );
                        }
                       }else{ ?>
                        <div class="ajax-loading"></div>
                      <?php } ?>  
                    </div>
                  </div>
                </div> 
             <?php endforeach; ?> 
             <?php wp_reset_postdata(); ?>
         </div>
      </div>
   </div>
</div>
