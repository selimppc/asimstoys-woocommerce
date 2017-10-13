<?php
   $product_type = 'recent';
   $columns = 4;
   $per_page = 8;
   $product_cats = $ids = $title = $el_class = '';
   $carousel_row = 1;
   $carousel_nav = true;
   $style = 'grid';
   $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
   extract( $atts );
   
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
  'touch_drag'          => $ca_touch_drag
);

   $args = array(
      'post_type'          => 'product',
      'post_status'          => 'publish',
      'ignore_sticky_posts'  => 1,
      'posts_per_page'       => $per_page,
      'orderby'           => 'date',
      'order'             => 'desc',
      'meta_query' => array(
        array(
          'taxonomy' => 'product_visibility',
          'field'    => 'name',
          'terms'    => 'exclude-from-catalog',
          'operator' => 'NOT IN',
        )
      )
   );       
  global $woocommerce;
   $product_visibility_term_ids = wc_get_product_visibility_term_ids();
   switch( $product_type ){
      case 'sale':
        $product_ids_on_sale    = wc_get_product_ids_on_sale();
        $product_ids_on_sale[]  = 0;
        $args['post__in'] = $product_ids_on_sale;
      break;
      case 'featured':
        $args['tax_query'][] = array(
          'taxonomy' => 'product_visibility',
          'field'    => 'term_taxonomy_id',
          'terms'    => $product_visibility_term_ids['featured'],
        );
      break;
      case 'best_selling':
        $args['meta_key']= 'total_sales';
        $args['orderby']='meta_value_num';
        $args['ignore_sticky_posts'] = 1;
        $args['meta_query'] = array();
        $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
        $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
      break;
      case 'top_rated':   
        add_filter( 'posts_clauses',  array( $woocommerce->query, 'order_by_rating_post_clauses' ) );
        $args['meta_query'] = array();
        $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
        $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
        break;    
      break;
      default: /* Recent */
         $args['orderby']  = 'date';
         $args['order']       = 'desc';
      break;
   }

   $product_cats = str_replace(' ', '', $product_cats);
   if( strlen($product_cats) > 0 ){
      $product_cats = explode(',', $product_cats);
   }
   if( is_array($product_cats) && count($product_cats) > 0 ){
      $field_name = is_numeric($product_cats[0])?'term_id':'slug';
      $args['tax_query'] = array(
         array(
            'taxonomy' => 'product_cat'
            ,'terms' => $product_cats
            ,'field' => $field_name
            ,'include_children' => false
         )
      );
   }
   
   $ids = str_replace(' ', '', $ids);
   if( strlen($ids) > 0 ){
      $ids = explode(',', $ids);
      if( is_array($ids) && count($ids) > 0 ){
         $args['post__in'] = $ids;
         if( count($ids) == 1 ){
            $columns = 1;
         }
      }
   }
   
   global $woocommerce_loop;
   if( (int)$columns <= 0 ){
      $columns = 5;
   }
   $old_woocommerce_loop_columns = $woocommerce_loop['columns'];
   $woocommerce_loop['columns'] = $columns;  

   if( $product_type == 'top_rated' ){
      add_filter('posts_clauses', array(WC()->query, 'order_by_rating_post_clauses')); 
   }

   if( $product_type == 'top_rated' ){
      remove_filter('posts_clauses', array(WC()->query, 'order_by_rating_post_clauses'));
   }
   $products = new WP_Query( $args );  

   if( $products->have_posts() ): 
   ?>
      <div class="widget gva-products <?php echo esc_attr($el_class) ?>">
      <div class="widget-heading">
         <?php if( strlen($title) > 0 ): ?>
            <h3 class="widget-title"><span><?php echo esc_html($title); ?></span></h3>
         <?php endif; ?>
         </div>
         <div class="content-widget">     
            <?php wc_get_template( 'display/'.$style.'.php' , array( 'query'=>$products,  'attrs' => $attrs ) ); ?>                   
         </div>
      </div>
   <?php
   endif;
   wp_reset_postdata();