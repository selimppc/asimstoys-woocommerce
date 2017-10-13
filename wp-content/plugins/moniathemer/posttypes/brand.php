<?php

if(!function_exists('gavias_post_type_brands')  ){ 
  function gavias_post_type_brands(){
    $labels = array(
      'name' => __( 'Brand Logos', "gaviasthemer" ),
      'singular_name' => __( 'Brand', "gaviasthemer" ),
      'add_new' => __( 'Add New Brand', "gaviasthemer" ),
      'add_new_item' => __( 'Add New Brand', "gaviasthemer" ),
      'edit_item' => __( 'Edit Brand', "gaviasthemer" ),
      'new_item' => __( 'New Brand', "gaviasthemer" ),
      'view_item' => __( 'View Brand', "gaviasthemer" ),
      'search_items' => __( 'Search Brands', "gaviasthemer" ),
      'not_found' => __( 'No Brands found', "gaviasthemer" ),
      'not_found_in_trash' => __( 'No Brands found in Trash', "gaviasthemer" ),
      'parent_item_colon' => __( 'Parent Brand:', "gaviasthemer" ),
      'menu_name' => __( 'Brands', "gaviasthemer" ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'List Brand',
        'supports' => array( 'title', 'thumbnail'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'brands', $args );
  }

  add_action('init','gavias_post_type_brands');
}