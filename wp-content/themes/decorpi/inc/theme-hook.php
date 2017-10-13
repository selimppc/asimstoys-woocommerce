<?php
/**
 * Hook to before breadcrumb
 */
function decorpi_style_breadcrumb(){
  global $post;
  $post_id = decorpi_id();
  $result['page_title_style'] = '';
  $result['title'] = '';
  $result['styles'] = '';
  $result['styles_overlay'] = '';
  $result['classes'] = '';

  $show_no_breadcrumbs = get_post_meta($post_id, 'decorpi_no_breadcrumbs', true);
  $show_page_title = get_post_meta($post_id, 'decorpi_page_title', true);
  $page_title_style = get_post_meta($post_id, 'decorpi_page_title_style', true );
  $page_title_one = get_post_meta($post_id, 'decorpi_page_title_one', true);
  $bg_color_title = get_post_meta($post_id, 'decorpi_bg_color_title', true);
  $bg_opacity_title = get_post_meta($post_id, 'decorpi_bg_opacity_title', true);
  $page_title_image = get_post_meta( $post_id, 'decorpi_page_title_image', true );
  $page_title_text_style = get_post_meta($post_id, 'decorpi_page_title_text_style', true );
  $page_title_text_align = get_post_meta($post_id, 'decorpi_page_title_text_align', true);

  if(is_page() || is_single()){
    $show_page_title = true;
  }
  
  //Breadcrumb category and tag products
  if(decorpi_woocommerce_activated() && (is_product_tag() || is_product_category()) ){
    $show_page_title = decorpi_get_option('woo_show_page_heading', true);
    $page_title_style = decorpi_get_option('woo_page_heading_style', 'standard' ); 
    $bg_color_title = decorpi_get_option('woo_page_heading_background_color', ''); 
    $bg_opacity_title = decorpi_get_option('woo_page_heading_bg_opacity_title', 0);
    $page_title_image = decorpi_get_option('woo_page_heading_image', array('id'=> 0));
    $page_title_text_style = decorpi_get_option('woo_page_heading_text_style', 'text-light');
    $page_title_text_align = decorpi_get_option('woo_page_heading_text_align', 'text-center');
    if(isset($page_title_image['id']) && $page_title_image['id']){
      $page_title_image = $page_title_image['id'];
    }else{
      $page_title_image = '';
    }
  }

  if(isset($_GET['hst']) && $_GET['hst']){
    $page_title_style = $_GET['hst'];
  } 

  if(!$page_title_style){
    $page_title_style = "standard";
  }

  $result = array();
  $styles = array();
  $styles_overlay = '';
  $classes = array();
  $title = '';
  if($show_no_breadcrumbs){
    $result['no_breadcrumbs'] = true;
  }

  if(isset($show_page_title) || $show_page_title){
    $title = get_the_title();
    if(decorpi_woocommerce_activated() && is_shop()){
      $title = woocommerce_page_title(false);
    }
    if($page_title_one){
       $title = $page_title_one;
    }   
  }

  if($page_title_style == 'hero' || $page_title_style == 'background'){  //Style when title style hero
      if($bg_color_title){
         $rgba_color = decorpi_convert_hextorgb($bg_color_title);
         $styles_overlay = 'background-color: rgba(' . esc_attr($rgba_color['r']) . ',' . esc_attr($rgba_color['g']) . ',' . esc_attr($rgba_color['b']) . ', ' . ($bg_opacity_title/100) . ')';
      }
      //Classes
      $classes[] = $page_title_style;
      $classes[] = $page_title_text_style;
      $classes[] = $page_title_text_align;
      if($page_title_image){
         $image = wp_get_attachment_image_src( $page_title_image, 'full');
         if(isset($image[0]) && $image[0]){
            $styles[] = 'background-image: url(\''.esc_url($image[0]).'\')';
         }
      }
      else{
         $styles[] = 'background-image: url(\'' . get_template_directory_uri() . '/images/bg-header.jpg\')';
      }
   } 
   $result['page_title_style'] = $page_title_style;
   $result['title'] = $title;
   $result['styles'] = $styles;
   $result['styles_overlay'] = $styles_overlay;
   $result['classes'] = $classes;
   $result['show_page_title'] = $show_page_title;
   return $result;

}

function decorpi_breadcrumb(){
   $result = decorpi_style_breadcrumb();
   extract($result);
   if(isset($no_breadcrumbs) && $no_breadcrumbs == true){
    return false;
   }
   ?>
   
   <div class="custom-breadcrumb <?php echo implode(' ', $classes); ?>" <?php echo(count($styles) > 0 ? 'style="' . implode(';', $styles) . '"' : ''); ?>>
      <?php if($styles_overlay){ ?>
         <div class="breadcrumb-overlay" style="<?php echo esc_attr($styles_overlay); ?>"></div>
      <?php } ?>
      <div class="container">
          <?php if($title && $show_page_title){ 
            echo '<h2 class="heading-title">' . esc_html( $title ) . '</h2>';
         } ?>
         <?php decorpi_general_breadcrumbs(); ?>
      </div>   
   </div>
   <?php
}

add_action( 'decorpi_before_page_content', 'decorpi_breadcrumb', '10' );


/**
 * Hook to select header of page
 */
function decorpi_get_header_layouts( $header='' ){

  $pid = decorpi_id();
  $header = (get_post_meta( $pid, 'decorpi_page_header', true )) ? get_post_meta( $pid, 'decorpi_page_header', true ) : '';
  
  if ( $header == 'default-option-theme' || empty($header)){
    $header = decorpi_get_option('header_layout', '');
  }else{
    return trim( $header );
  }

  if($header=='v__'){
    $header ='';
  }

  return $header;
} 
add_filter( 'decorpi_get_header_layout', 'decorpi_get_header_layouts' );
add_filter('decorpi_packet', function(){ return 'decorpi'; });
/**
 * Hook to select footer of page
 */
function decorpi_get_footer_layout( $footer = '' ){
  $post = get_post();

  $footer = ($post && get_post_meta( $post->ID, 'decorpi_page_footer', true )) ? get_post_meta( $post->ID, 'decorpi_page_footer', true ) : '';

  if ( $footer == 'default-option-theme' || empty($footer) ){
    $footer = decorpi_get_option('footer_layout', '');
  }else{
    return trim( $footer );
  }

  return $footer;
} 
add_filter( 'decorpi_get_footer_layout', 'decorpi_get_footer_layout' );

function decorpi_main_menu(){
  if(has_nav_menu( 'primary' )){
    $decorpi_menu = array(
      'theme_location'    => 'primary',
      'container'         => 'div',
      'container_class'   => 'navbar-collapse',
      'container_id'      => 'gva-main-menu',
      'menu_class'        => 'nav navbar-nav gva-nav-menu gva-main-menu',
      'walker'            => new decorpi_Walker()
    );
    wp_nav_menu($decorpi_menu);
  }  
}
add_action( 'decorpi_main_menu', 'decorpi_main_menu', 10 );
 
function decorpi_vertical_megamenu(){
  echo '<div class="gva_vertical_megamenu">';
    if(has_nav_menu( 'vertical' )){
      $decorpi_menu = array(
        'theme_location'    => 'vertical',
        'container'         => 'div',
        'container_class'   => 'navbar-collapse',
        'container_id'      => 'gva-main-vertical-menu',
        'menu_class'        => 'nav navbar-nav gva-nav-menu gva-main-menu',
        'fallback_cb'       => '',
        'walker'            => new decorpi_Walker()
      );
      wp_nav_menu($decorpi_menu);
    }
  echo '</div>';
}
add_action('decorpi_vertical_megamenu', 'decorpi_vertical_megamenu', 1);

function decorpi_mobile_menu(){
  if(has_nav_menu( 'primary' )){
    $decorpi_menu = array(
      'theme_location'    => 'primary',
      'container'         => 'div',
      'container_class'   => 'navbar-collapse',
      'container_id'      => 'gva-mobile-menu',
      'menu_class'        => 'nav navbar-nav gva-nav-menu gva-mobile-menu',
      'walker'            => new decorpi_Walker()
    );
    wp_nav_menu($decorpi_menu);
  }  
}
add_action( 'decorpi_mobile_menu', 'decorpi_mobile_menu', 10 );

function decorpi_check_vertical_megamenu(){
  return has_nav_menu( 'vertical' );
}

function decorpi_header_mobile(){
  get_template_part('templates/parts/header', 'mobile');
}

add_action('decorpi_before_header', 'decorpi_header_mobile', 10);


if ( !function_exists( 'decorpi_style_footer' ) ) {
  function decorpi_style_footer(){
    $footer = decorpi_get_footer_layout(''); 
    
    if($footer!='default'){
      $shortcodes_custom_css = get_post_meta( $footer, '_wpb_shortcodes_custom_css', true );
      if ( ! empty( $shortcodes_custom_css ) ) {
        echo '<style>
          '.$shortcodes_custom_css.'
          </style>';
      }
    }
  }
  add_action('wp_head','decorpi_style_footer', 18);
}

function decorpi_setup_admin_setting(){
  global $pagenow; 
  if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
    $types = array( 'megamenu');
    $options = array(); 
    foreach( $types as $key ){
      $options['active_' . $key] = 'active'; 
    }
    update_option( 'moniathemer_posttypes', $options );

    $catalog = array(
      'width'   => '550', 
      'height'  => '615',
      'crop'    => 1   
    );
    $single = array(
      'width'   => '895',
      'height'  => '1000',
      'crop'    => 1   
    );
    $thumbnail = array(
      'width'   => '180',
      'height'  => '200', 
      'crop'    => 1    
    );
    update_option( 'shop_catalog_image_size', $catalog );  
    update_option( 'shop_single_image_size', $single );   
    update_option( 'shop_thumbnail_image_size', $thumbnail ); 

    update_option( 'thumbnail_size_w', 180 );  
    update_option( 'thumbnail_size_h', 180 );  
    update_option( 'thumbnail_crop', 1 );  
    update_option( 'medium_size_w', 750 );  
    update_option( 'medium_size_h', 480 );  
    update_option( 'large_size_w', 0 );  
    update_option( 'large_size_h', 0 );
  }
}
add_action( 'init', 'decorpi_setup_admin_setting'  );

if ( !function_exists( 'decorpi_page_class_names' ) ) {
  function decorpi_page_class_names( $classes ) {
    $class_el = get_post_meta( decorpi_id(), 'decorpi_extra_page_class', true  );
    $classes[] = $class_el;
    return $classes;
  }
}
add_filter( 'body_class', 'decorpi_page_class_names' );