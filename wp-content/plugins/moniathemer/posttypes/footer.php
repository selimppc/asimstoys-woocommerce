<?php
class Gavias_Footer{
  public static $post_type = 'footer';
  function __construct(){ 
    add_action('init', array($this, 'gavias_post_type_footer'), 10);
    //add_action('wp_head', array($this, 'add_custom_css'));
  }

  function gavias_post_type_footer(){
    $labels = array(
      'name' => __( 'Footers', "gaviasthemer" ),
      'singular_name' => __( 'Footer', "gaviasthemer" ),
      'add_new' => __( 'Add Profile Footer', "gaviasthemer" ),
      'add_new_item' => __( 'Add Profile Footer', "gaviasthemer" ),
      'edit_item' => __( 'Edit Footer', "gaviasthemer" ),
      'new_item' => __( 'New Profile', "gaviasthemer" ),
      'view_item' => __( 'View Footer Profile', "gaviasthemer" ),
      'search_items' => __( 'Search Footer Profiles', "gaviasthemer" ),
      'not_found' => __( 'No Footer Profiles found', "gaviasthemer" ),
      'not_found_in_trash' => __( 'No Footer Profiles found in Trash', "gaviasthemer" ),
      'parent_item_colon' => __( 'Parent Footer:', "gaviasthemer" ),
      'menu_name' => __( 'Footers', "gaviasthemer" ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'List Footer',
        'supports' => array( 'title', 'editor' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_nav_menus' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => false
    );
    register_post_type( self::$post_type, $args );

    if($options = get_option('wpb_js_content_types')){
      $check = true;
      foreach ($options as $key => $value) {
        if($value=='footer') $check=false;
      }
      if($check)
        $options[] = 'footer';
      update_option( 'wpb_js_content_types',$options );
    }else{
      $options = array('page','footer');
    }
  }

  function add_custom_css(){
      global $post;
      $args = array(
        'post_type'     => self::$post_type,
        'posts_per_page'   => -1,
        'post_status'    => 'publish',
      );
      $posts = new WP_Query($args);
      if( $posts->have_posts() ){
        $custom_css = '';
        while( $posts->have_posts() ){
          $posts->the_post();
          $custom_css .= get_post_meta( $post->ID, '_wpb_shortcodes_custom_css', true );
        }
        if( !empty($custom_css) ){
          echo '<style type="text/css" data-type="vc_shortcodes-custom-css">';
          echo $custom_css;
          echo '</style>';
        }
      }
      wp_reset_postdata();
    }

  public static function get_footers(){
    $args = array(
      'post_type'     => 'footer',
      'posts_per_page'   => -1,
      'post_status'    => 'publish',
    );
    $posts = new WP_Query($args);
    $footers = array('default' => __('Default Widget Footer', 'gaviasthemer') );
    if( $posts->have_posts() ){
      while( $posts->have_posts() ){
        $posts->the_post();
        $footers[get_the_ID()] = get_the_title();
      }
    }
    wp_reset_postdata();
    return apply_filters('gaviasthemes_list_footer', $footers );
  }
}

new Gavias_Footer();