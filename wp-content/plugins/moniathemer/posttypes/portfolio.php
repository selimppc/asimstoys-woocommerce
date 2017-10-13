<?php
if(!function_exists('gavias_post_type_portfolio')  ){
    function gavias_post_type_portfolio(){
      $labels = array(
          'name'               => __( 'Portfolios', "gaviasthemer" ),
          'singular_name'      => __( 'Portfolio', "gaviasthemer" ),
          'add_new'            => __( 'Add New Portfolio', "gaviasthemer" ),
          'add_new_item'       => __( 'Add New Portfolio', "gaviasthemer" ),
          'edit_item'          => __( 'Edit Portfolio', "gaviasthemer" ),
          'new_item'           => __( 'New Portfolio', "gaviasthemer" ),
          'view_item'          => __( 'View Portfolio', "gaviasthemer" ),
          'search_items'       => __( 'Search Portfolios', "gaviasthemer" ),
          'not_found'          => __( 'No Portfolios found', "gaviasthemer" ),
          'not_found_in_trash' => __( 'No Portfolios found in Trash', "gaviasthemer" ),
          'parent_item_colon'  => __( 'Parent Portfolio:', "gaviasthemer" ),
          'menu_name'          => __( 'Portfolios', "gaviasthemer" ),
      );

      $args = array(
          'labels'              => $labels,
          'hierarchical'        => true,
          'description'         => 'List Portfolio',
          'supports'            => array( 'title', 'editor', 'author', 'thumbnail','excerpt', 'post-formats'  ), 
          'taxonomies'          => array( 'portfolio_category','post_tag' ),
          'post-formats'      => array( 'aside', 'image', 'gallery', 'quote' ) ,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'menu_position'       => 5,
          'show_in_nav_menus'   => false,
          'publicly_queryable'  => true,
          'exclude_from_search' => false,
          'has_archive'         => true,
          'query_var'           => true,
          'can_export'          => true,
          'rewrite'             => true,
          'capability_type'     => 'post'
      );
      register_post_type( 'portfolio', $args );

    
      $labels = array(
        'name'              => __( 'Categories', "gaviasthemer" ),
        'singular_name'     => __( 'Category', "gaviasthemer" ),
        'search_items'      => __( 'Search Category', "gaviasthemer" ),
        'all_items'         => __( 'All Categories', "gaviasthemer" ),
        'parent_item'       => __( 'Parent Category', "gaviasthemer" ),
        'parent_item_colon' => __( 'Parent Category:', "gaviasthemer" ),
        'edit_item'         => __( 'Edit Category', "gaviasthemer" ),
        'update_item'       => __( 'Update Category', "gaviasthemer" ),
        'add_new_item'      => __( 'Add New Category', "gaviasthemer" ),
        'new_item_name'     => __( 'New Category Name', "gaviasthemer" ),
        'menu_name'         => __( 'Categories', "gaviasthemer" ),
      );
      // Now register the taxonomy
      register_taxonomy('category_portfolio',array('portfolio'),
          array(
              'hierarchical'      => true,
              'labels'            => $labels,
              'show_ui'           => true,
              'show_admin_column' => true,
              'query_var'         => true,
              'show_in_nav_menus' =>false,
              'rewrite'           => array( 'slug' => 'category-portfolio'
          ),
      ));

  }
  add_action( 'init','gavias_post_type_portfolio' );
}


  function moniathemer_portfolio_query( $args ){
    $ds = array(
      'post_type'   => 'portfolio',
      'posts_per_page'  =>  12
    );

    $args = array_merge( $ds , $args );
    $loop = new WP_Query($args);

    return $loop;
  }

 
  function moniathemer_profolio_terms(){
    return get_terms( 'category_portfolio',array('orderby'=>'id') );
  }


  function moniathemer_portfolio_terms_related( $postId ){
    $output = array();
    
    $item_cats = get_the_terms( $postId, 'category_portfolio' );

    foreach((array)$item_cats as $item_cat){
      if( !empty($item_cats) && !is_wp_error($item_cats) ){
        $output[] = $item_cat->slug;
      }
    }
      
    return $output;
  }

  if(!function_exists('moniathemer_related_portfolio')){
    function moniathemer_related_portfolio($per_page){
      $terms = get_the_terms( get_the_ID(),  'category_portfolio' );
      $termids =array();
     
      if(!empty($terms) && !is_wp_error($terms)){
          foreach($terms as $term){
              if( is_object($term) ){
                 $termids[] = $term->term_id;
              }
          }
      }

      $args = array(
          'post_type' => 'portfolio',
          'posts_per_page' => $per_page,
          'post__not_in' => array( get_the_ID() ),
          'tax_query' => array(
              'relation' => 'AND',
              array(
                  'taxonomy' => 'category_portfolio',
                  'field' => 'id',
                  'terms' => $termids,
                  'operator' => 'IN'
              )
          )
      );
      $results = new WP_Query( $args );
      return $results;
    }
  }
