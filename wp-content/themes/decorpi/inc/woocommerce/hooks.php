<?php
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 10 );
add_action('woocommerce_after_single_product_summary', 'decorpi_woocommerce_output_product_data', 10);

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'woocommerce_before_main_content', 'decorpi_woocommerce_breadcrumb', 20 );

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

add_filter( 'loop_shop_per_page', 'decorpi_woocommerce_shop_pre_page', 20 );

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title',  'decorpi_swap_images', 10);

// Add save percent next to sale item prices.
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'decorpi_woocommerce_custom_sales_price', 10 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

if(!function_exists('decorpi_woocommerce_shop_pre_page')){
  function decorpi_woocommerce_custom_sales_price() {
    global $product;
    if($product->get_sale_price()){
      $percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
      echo ( '<span class="onsale">-' . $percentage . '%</span>' );
    }
  }
}

if(!function_exists('decorpi_woocommerce_shop_pre_page')){
   function decorpi_woocommerce_shop_pre_page(){
      return decorpi_get_option('products_per_page', 16);
   }
}

if(!function_exists('decorpi_woocommerce_breadcrumb')){
   function decorpi_woocommerce_breadcrumb(){
      $result = decorpi_style_breadcrumb();
      extract($result);
      ?>
      
      <div class="custom-breadcrumb <?php echo implode(' ', $classes); ?>" <?php echo(count($styles) > 0 ? 'style="' . implode(';', $styles) . '"' : ''); ?>>
         <?php if($styles_overlay){ ?>
            <div class="breadcrumb-overlay" style="<?php echo esc_attr($styles_overlay); ?>"></div>
         <?php } ?>
         <div class="container">
            <?php if($title && $show_page_title){ 
               echo '<h2 class="heading-title">' . esc_html( $title ) . '</h2>';
            } ?>
            <?php woocommerce_breadcrumb(); ?>
         </div>   
      </div>
      <?php
   }
}

if ( ! function_exists( 'decorpi_woocommerce_output_product_data_accordions' ) ) {
   function decorpi_woocommerce_output_product_data_accordions() {
      wc_get_template( 'single-product/tabs/accordions.php' );
   }
}

if(!function_exists('decorpi_woocommerce_output_product_data')){
   function decorpi_woocommerce_output_product_data(){
      global $post;
      $tab_style = get_post_meta($post->ID, 'decorpi_product_tab_style', true);
      $tab_style = 'tabs';
      if($tab_style == 'accordion'){
         decorpi_woocommerce_output_product_data_accordions();
      }else{
         woocommerce_output_product_data_tabs();
      }
   }
}      

if(! function_exists('decorpi_display_modes_value')){
   function decorpi_display_modes_value(){
      $woo_display = 'grid';
      if ( isset($_COOKIE['decorpi_woo_display']) && $_COOKIE['decorpi_woo_display'] == 'list' ) {
         $woo_display = $_COOKIE['decorpi_woo_display'];
      }
      return $woo_display;
   }
}

if ( ! function_exists('decorpi_display_modes_link')){
   function decorpi_display_modes_link(){
      
      $woo_display = decorpi_display_modes_value();

      $current_url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
      $current_url = preg_replace('/([?&])display=[^&]+(&|$)/','$2',$current_url);
      if(strpos($current_url, '?')){
         $current_url .= '&';
      }
      else{
         $current_url .= '?';
      }

      $layout_filter = decorpi_get_option('shop_filter_hidden', 'off');
      if($layout_filter=='off' || empty($layout_filter)){
         if ( isset($_COOKIE['decorpi_woo_filter']) && $_COOKIE['decorpi_woo_filter'] ) {
            $layout_filter = $_COOKIE['decorpi_woo_filter'];
         }
      }

      echo '<div class="woo-display-mode">';
         if($layout_filter != 'off'){
            echo '<a class="btn btn-shop-filter '. esc_attr($layout_filter) .'" href="javascript:void(0)"><i class="mn-icon-64"></i></a>'; 
         }
        echo '<a href="'.esc_url( $current_url . 'display=grid' ).'" title="'.esc_html__('Grid', 'decorpi' ).'" class="btn grid '.($woo_display == 'grid' ? 'active' : '').'"><i class="mn-icon-99"></i></a>';  
        echo '<a href="'.esc_url( $current_url . 'display=list' ).'" title="'.esc_html__( 'List', 'decorpi' ).'" class="btn list '.($woo_display == 'list' ? 'active' : '').'"><i class="mn-icon-105"></i></a>';
      echo '</div>';
   }
}   
add_action( 'woocommerce_before_shop_loop', 'decorpi_display_modes_link' , 19 );

if ( ! function_exists('decorpi_set_woo_display_mode')){
   function decorpi_set_woo_display_mode(){
      if( isset($_GET['display']) && ($_GET['display']=='list' || $_GET['display']=='grid') ){  
         setcookie( 'decorpi_woo_display', trim($_GET['display']) , time()+3600*24*100,'/' );
         $_COOKIE['decorpi_woo_display'] = trim($_GET['display']);
      }
   }
}   
add_action( 'init', 'decorpi_set_woo_display_mode' );

if ( ! function_exists('decorpi_set_woo_filter_mode')){
   function decorpi_set_woo_filter_mode(){
      if( isset($_GET['sf']) && $_GET['sf']){  
         setcookie( 'decorpi_woo_filter', trim($_GET['sf']) , time()+3600*24*100,'/' );
         $_COOKIE['decorpi_woo_filter'] = trim($_GET['sf']);
      }
   }
}
add_action( 'init', 'decorpi_set_woo_filter_mode' );

if ( ! function_exists('decorpi_woo_active_filter')){
   function decorpi_woo_active_filter(){
      echo '<div class="full-width wc-nav-filters clearfix">';
         the_widget('WC_Widget_Layered_Nav_Filters');
      echo '</div>';
   }
}   
add_action( 'decorpi_woocommerce_active_filter', 'decorpi_woo_active_filter' );

function decorpi_woocommerce_share_box() {
   get_template_part( 'templates/other/sharebox' );
}
add_filter( 'woocommerce_single_product_summary', 'decorpi_woocommerce_share_box', 99 );

function decorpi_swap_images(){
  global $post, $product, $woocommerce;
  $image_size = get_option('shop_catalog_image_size');
  $_width = $image_size['width'];
  $_height = $image_size['height'];
  $output = '';
  $class = 'image';
  if(has_post_thumbnail()){
      $attachment_ids = $product->get_gallery_image_ids();
      if($attachment_ids && isset($attachment_ids[0])) {
        $output .= '<div class="swap-thumbnail">';
        $output .= '<a href="' . get_the_permalink() . '">';
        $class = 'image-second';
        $output .= wp_get_attachment_image($attachment_ids[0],'shop_catalog', false, array('class'=>$class));
      }

      $output .= '<span class="attachment-shop_catalog">' . get_the_post_thumbnail( $post->ID,'shop_catalog', array('class'=>'') ) . '</span>';

      if($attachment_ids && isset($attachment_ids[0])) {
         $output .= '</a>';
         $output .= '</div>';
          
      }
  }else{
      $output .= '<img src="'.woocommerce_placeholder_img_src().'" alt="'. $post->title .'" class="'.$class.'" width="'.$_width.'" height="'.$_height.'" />';
  }
 
  echo trim($output);
}

/*
 * Load product ajax (Quick view)
*/
if ( ! function_exists('decorpi_ajax_load_product')){
   function decorpi_ajax_load_product() {
      global $woocommerce, $product, $post;
      $product = get_product( $_POST['product_id'] );
      $post = $product->post;
      $output = '';
      
      setup_postdata( $post );
         
      ob_start();
      wc_get_template_part( 'quickview/content', 'quickview' );
      $output = ob_get_clean();
      
      wp_reset_postdata();
            
      echo trim($output);
            
      exit;
  }
}   

add_action( 'wp_ajax_decorpi_ajax_load_product' , 'decorpi_ajax_load_product' );
add_action( 'wp_ajax_nopriv_decorpi_ajax_load_product', 'decorpi_ajax_load_product' );
add_action( 'wc_ajax_decorpi_ajax_load_product', 'decorpi_ajax_load_product' );

/* Load product ajax (Quick view) */
if ( ! function_exists('decorpi_ajax_load_product_tab')){
  function decorpi_ajax_load_product_tab() {
    global $woocommerce, $product, $post;
    $output = '';
    $attrs_post = $_POST['attrs'];
    $attrs = (array)json_decode((urldecode($attrs_post) ), true );
    if(isset($attrs[0])){
      $attrs = $attrs[0];
    }
    
    $loop = decorpi_woocommerce_query($attrs['type'], $attrs['number'], $attrs['product_cat']);
    ob_start();
    if($loop->have_posts()){
      wc_get_template( 'display/'.$attrs['style'].'.php' , array( 'query'=> $loop, 'attrs' => $attrs ) );
    }
    $output = ob_get_clean();
    wp_reset_postdata();

    echo trim($output);
    exit;
  }
}   

add_action( 'wp_ajax_decorpi_ajax_load_product_tab' , 'decorpi_ajax_load_product_tab' );
add_action( 'wp_ajax_nopriv_decorpi_ajax_load_product_tab', 'decorpi_ajax_load_product_tab' );
add_action( 'wc_ajax_decorpi_ajax_load_product_tab', 'decorpi_ajax_load_product_tab' );