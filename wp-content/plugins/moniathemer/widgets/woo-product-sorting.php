<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class GVA_Widget_Product_Sorting extends WC_Widget {
   public function __construct() {
      $this->widget_cssclass     = 'gva-widget-product-sorting woocommerce';
      $this->widget_description  = __( 'Display a product sorting list.', 'gaviasthemer' );
      $this->widget_id           = 'gav-widget-product-sorting';
      $this->widget_name         = __( 'WooCommerce Product Sorting', 'gaviasthemer' );
      $this->settings            = array(
         'title'  => array(
            'type'  => 'text',
            'std'   => __( 'Sort By', 'gaviasthemer' ),
            'label'  => __( 'Title', 'gaviasthemer' )
         )
      );
      
      parent::__construct();
   }

   /**
    * Widget function
    *
    */
   public function widget( $args, $instance ) {
      global $wp_query;
      
      extract( $args );
      
      $title = ( ! empty( $instance['title'] ) ) ? $before_title . $instance['title'] . $after_title : '';
      
      $output = '';
      
      if ( 1 != $wp_query->found_posts || woocommerce_products_will_display() ) {
         $output .= '<ul id="gva-product-sorting" class="gva-product-sorting">';
         
         $orderby = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
         $orderby == ( $orderby ===  'title' ) ? 'menu_order' : $orderby; 
         
         $catalog_orderby_options = apply_filters( 'woocommerce_catalog_orderby', array(
            'menu_order'   => __( 'Default', 'gaviasthemer' ),
            'popularity'   => __( 'Popularity', 'gaviasthemer' ),
            'rating'       => __( 'Average rating', 'gaviasthemer' ),
            'date'         => __( 'Newness', 'gaviasthemer' ),
            'price'        => __( 'Price: Low to High', 'gaviasthemer' ),
            'price-desc'   => __( 'Price: High to Low', 'gaviasthemer' )
         ) );
   
         if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
            unset( $catalog_orderby_options['rating'] );
         }
         
         global $wp;
         $link = home_url( $wp->request ); // Base page URL
               
         unset( $_GET['shop_load'] );
         unset( $_GET['_'] );
         
         $get_count = count( $_GET );
   
         if ( $get_count > 0 ) {
            $i = 0;
            $link .= '?';
            foreach ( $_GET as $key => $value ) {
               $i++;
               $link .= $key . '=' . $value;
               if ( $i != $get_count ) {
                  $link .= '&';
               }
            }
         }
         
      foreach ( $catalog_orderby_options as $id => $name ) {
         if ( $orderby == $id ) {
            $output .= '<li class="active">' . esc_attr( $name ) . '</li>';
         } else {
            $link = add_query_arg( 'orderby', $id, $link );
            $output .= '<li><a href="' . esc_url( $link ) . '">' . esc_attr( $name ) . '</a></li>';
         }
      }
                
         $output .= '</ul>';
      }
      
      echo $before_widget . $title . $output . $after_widget;
   }
   
}
