<?php
/**
 * $Desc
 *
 *
 * @package    basetheme
 * @author     moniathemes Team    
 * @copyright  Copyright (C) 2016 Moniathemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */

define( 'DECORPI_THEMER_DIR', get_template_directory() );
define( 'DECORPI_THEME_URL', get_template_directory_uri() );

/*
 * Include list of files from Gavias Framework.
 */
require_once(DECORPI_THEMER_DIR . '/inc/theme-functions.php'); 
require_once(DECORPI_THEMER_DIR . '/inc/template.php'); 
require_once(DECORPI_THEMER_DIR . '/inc/theme-hook.php'); 
require_once(DECORPI_THEMER_DIR . '/inc/theme-layout.php'); 
require_once(DECORPI_THEMER_DIR . '/inc/metaboxes.php'); 
require_once(DECORPI_THEMER_DIR . '/inc/custom-styles.php'); 
require_once(DECORPI_THEMER_DIR . '/inc/menu/megamenu.php'); 
require_once(DECORPI_THEMER_DIR . '/inc/sample/init.php'); 

// Load visual composer
if( in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && class_exists( 'Vc_Manager' ) ){ 
   require_once(DECORPI_THEMER_DIR . '/inc/visualcomposer/vc-register.php'); 
   require_once(DECORPI_THEMER_DIR . '/inc/visualcomposer/vc-override.php'); 
   require_once(DECORPI_THEMER_DIR . '/inc/visualcomposer/vc-map.php'); 
   require_once(DECORPI_THEMER_DIR . '/inc/visualcomposer/vc-theme-map.php'); 
}

//Load Woocommerce
if( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){
  add_theme_support( "woocommerce" );
  require_once(DECORPI_THEMER_DIR . '/inc/woocommerce/functions.php'); 
  require_once(DECORPI_THEMER_DIR . '/inc/woocommerce/hooks.php'); 
}

// Load Redux - Theme options framework
if( class_exists( 'Redux' ) ){
  require( DECORPI_THEMER_DIR . '/inc/options/options-config.php' ); 
}

// TGM plugin activation
if ( is_admin() ) {
   require( DECORPI_THEMER_DIR . '/inc/tgmpa/config.php' );
}

load_theme_textdomain( 'decorpi', get_template_directory() . '/languages' );


//-------- Register sidebar default in theme -----------
//------------------------------------------------------
function decorpi_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Default Sidebar', 'decorpi' ),
        'id' => 'default_sidebar',
        'description' => esc_html__( 'Appears in the Default Sidebar section of the site.', 'decorpi' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Newsletter Sidebar', 'decorpi' ),
        'id' => 'newsletter_sidebar',
        'description' => esc_html__( 'Appears in the Newsletter Sidebar section of the site.', 'decorpi' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
    register_sidebar( array(
        'name' => esc_html__( 'Instagram Sidebar', 'decorpi' ),
        'id' => 'instagram_sidebar',
        'description' => esc_html__( 'Appears in the Newsletter Sidebar section of the site.', 'decorpi' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
 
    register_sidebar( array(
        'name' => esc_html__( 'Plugin| WooCommerce', 'decorpi' ),
        'id' => 'woocommerce_sidebar',
        'description' => esc_html__( 'Appears in the Plugin WooCommerce section of the site.', 'decorpi' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Filter Hidden For WooCommerce', 'decorpi' ),
        'id' => 'filter_sidebar',
        'description' => esc_html__( 'Appears in the Filter Hidden for WooCommerce section of the site.', 'decorpi' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'After Offcanvas Mobile', 'decorpi' ),
        'id' => 'offcanvas_sidebar_mobile',
        'description' => esc_html__( 'Appears in the Offcanvas section of the site.', 'decorpi' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Offcanvas Sidebar', 'decorpi' ),
        'id' => 'offcanvas_sidebar',
        'description' => esc_html__( 'Appears in the Offcanvas section of the site.', 'decorpi' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Blog Sidebar', 'decorpi' ),
        'id' => 'blog_sidebar',
        'description' => esc_html__( 'Appears in the Blog sidebar section of the site.', 'decorpi' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Footer first', 'decorpi' ),
        'id' => 'footer-sidebar-1',
        'description' => esc_html__( 'Appears in the Footer first section of the site.', 'decorpi' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Footer second', 'decorpi' ),
        'id' => 'footer-sidebar-2',
        'description' => esc_html__( 'Appears in the Footer second section of the site.', 'decorpi' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Footer third', 'decorpi' ),
        'id' => 'footer-sidebar-3',
        'description' => esc_html__( 'Appears in the Footer third section of the site.', 'decorpi' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );

    register_sidebar( array(
        'name' => esc_html__( 'Footer four', 'decorpi' ),
        'id' => 'footer-sidebar-4',
        'description' => esc_html__( 'Appears in the Footer four section of the site.', 'decorpi' ),
        'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ) );
}
add_action( 'widgets_init', 'decorpi_widgets_init' );


if ( ! function_exists( 'decorpi_fonts_url' ) ) :
/**
 *
 * @return string Google fonts URL for the theme.
 */
function decorpi_fonts_url() {
  $fonts_url = '';
  $fonts     = array();
  $subsets   = '';

  /*
   * Translators: If there are characters in your language that are not supported
   * by Noto Sans, translate this to 'off'. Do not translate into your own language.
   */
  if ( 'off' !== _x( 'on', 'Karla font: on or off', 'decorpi' ) ) {
    $fonts[] = 'Karla:400,700';
  }

  /*
   * Translators: If there are characters in your language that are not supported
   * by Noto Serif, translate this to 'off'. Do not translate into your own language.
   */
  if ( 'off' !== _x( 'on', 'Vidaloka font: on or off', 'decorpi' ) ) {
    $fonts[] = 'Vidaloka:400';
  }

  /*
   * Translators: To add an additional character subset specific to your language,
   * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
   */
  $subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'decorpi' );

  if ( 'cyrillic' == $subset ) {
    $subsets .= ',cyrillic,cyrillic-ext';
  } elseif ( 'greek' == $subset ) {
    $subsets .= ',greek,greek-ext';
  } elseif ( 'devanagari' == $subset ) {
    $subsets .= ',devanagari';
  } elseif ( 'vietnamese' == $subset ) {
    $subsets .= ',vietnamese';
  }

  if ( $fonts ) {
    $fonts_url = add_query_arg( array(
      'family' => urlencode( implode( '|', $fonts ) ),
      'subset' => urlencode( $subsets ),
    ), 'http://fonts.googleapis.com/css' );
  }

  return $fonts_url;
}
endif;

function decorpi_custom_styles() {
  $custom_css = get_option( 'decorpi_theme_custom_styles' );
  wp_enqueue_style(
      'gva-custom-style',
      get_template_directory_uri() . '/css/custom_script.css'
  );
  wp_add_inline_style( 'gva-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'decorpi_custom_styles' );

function decorpi_init_scripts(){
    $protocol = is_ssl() ? 'https' : 'http';
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
      wp_enqueue_script( 'comment-reply' );
    }
    wp_enqueue_style( 'decorpi-fonts', decorpi_fonts_url(), array(), null );
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js', array('jquery') );
    wp_enqueue_script('countdown', get_template_directory_uri() . '/js/countdown.js', '', '', true );
    wp_enqueue_script('scrollbar', get_template_directory_uri() . '/js/perfect-scrollbar.jquery.min.js', '', '', true);
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.min.js', '', '', true);
    wp_enqueue_script('magnific', get_template_directory_uri() .'/js/magnific/jquery.magnific-popup.min.js', '', '', true);
    wp_enqueue_script('scroll-to', get_template_directory_uri() . '/js/scroll/jquery.scrollto.js', '', '', true );
    wp_enqueue_script('waypoint', get_template_directory_uri() . '/js/waypoint.js', '', '', true );
    wp_enqueue_script('masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', '', '', true );
    wp_enqueue_script('scrollable', get_template_directory_uri() . '/js/scrollable/jquery.scrollable.js', '', '', true);
    wp_enqueue_style('scrollable', get_template_directory_uri() . '/js/scrollable/jquery.scrollable.css');

    wp_enqueue_script('decorpi-main', get_template_directory_uri() . '/js/main.js', '', '', true);
    wp_enqueue_script('woocommerce-theme', get_template_directory_uri() . '/js/woocommerce.js' );

    if(decorpi_woocommerce_activated() ){
      wp_enqueue_script('decorpi-single-product', get_template_directory_uri() . '/js/shop-single-product.js' );
    }

    wp_enqueue_style('magnific', get_template_directory_uri() .'/js/magnific/magnific-popup.css');
    wp_enqueue_style('owl-carousel', get_template_directory_uri() .'/js/owl-carousel/assets/owl.carousel.css');
    wp_enqueue_style('icon-custom', get_template_directory_uri() . '/css/icon-custom.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css');

    $skin = decorpi_get_option('skin_color', '');
    if(isset($_GET['gskin']) && $_GET['gskin']){
        $skin = $_GET['gskin'];
    }
    if(!empty($skin)){
        $skin = 'skins/' . $skin . '/'; 
    }
    wp_enqueue_style('base-bootstrap', get_template_directory_uri(). '/css/' . $skin . 'bootstrap.css' ); 
    wp_enqueue_style('base-woocoomerce', get_template_directory_uri(). '/css/' . $skin . 'woocommerce.css' ); 
    wp_enqueue_style('base-template', get_template_directory_uri().'/css/' . $skin . 'template.css' );
}
add_action('wp_enqueue_scripts', 'decorpi_init_scripts', 999);

