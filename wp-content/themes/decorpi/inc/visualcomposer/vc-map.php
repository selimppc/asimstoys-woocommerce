<?php 

class decorpi_Visualcomposer_Map implements Vc_Vendor_Interface {
	public function load(){ 
      //------------------ Element products ----------------------------------
      //-----------------------------------------------------------------------
      $cats = array();
      $categories = get_terms( 'product_cat' );
      $cats['Choose Category'] = '';
      if( !is_wp_error($categories)){
         if($categories){
            foreach ($categories as $category) {
               $cats[html_entity_decode($category->name, ENT_COMPAT, 'UTF-8')] = $category->slug;
            }
         }
      }

      /*** GVA Products ***/
      //---------------------------------------
      $gva_products = array(
         'name'      => esc_html__( 'GVA Products', 'decorpi' ),
         'base'      => 'gva_products',
         'class'  => '',
         'category'  => 'Gavias Element',
         'params'    => array(
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Block title', 'decorpi' ),
               'param_name'  => 'title',
               'admin_label'    => true,
               'value'       => '',
               'description'    => '',
            ),
            array(
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Product type', 'decorpi' ),
               'param_name'  => 'product_type',
               'admin_label'    => true,
               'value'       => array(
                     'Recent'    => 'recent',
                     'Sale'        => 'sale',
                     'Featured'    => 'featured',
                     'Best Selling'   => 'best_selling',
                     'Top Rated'   => 'top_rated',
                  ),
               'description'    => esc_html__( 'Select type of product', 'decorpi' ),
            ),
            
            array(
               'type' => 'dropdown',
               'heading' => esc_html__('Style','decorpi'),
               'param_name' => 'style',
               'value' => array(
                  esc_html__('Gird Display', 'decorpi') => 'grid',
                  esc_html__('Carousel Display', 'decorpi') => 'carousel'
               ),
            ),
           
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Limit', 'decorpi' ),
               'param_name'  => 'per_page',
               'admin_label'    => true,
               'value'       => 5,
               'description'    => esc_html__( 'Number of Products', 'decorpi' ),
            ),
            array(
               'type'         => 'autocomplete',
               'heading'     => esc_html__( 'Product Categories', 'decorpi' ),
               'param_name'  => 'product_cats',
               'admin_label'    => true,
               'value'       => '',
               'settings' => array(
                  'multiple'        => true,
                  'sortable'       => true,
                  'unique_values'  => true,
               ),
               'description'    => '',
            ),
            array(
               'type'         => 'autocomplete',
               'heading'     => esc_html__( 'Product IDs', 'decorpi' ),
               'param_name'  => 'ids',
               'admin_label'    => true,
               'value'       => '',
               'settings' => array(
                  'multiple'        => true,
                  'sortable'       => true,
                  'unique_values'  => true,
               ),
               'description'    => esc_html__('Enter product name or slug to search', 'decorpi'),
            ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','decorpi'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','decorpi')
            ),
         )
      ) ;
      foreach (decorpi_responsive_settings() as $key => $setting) {
         $gva_products['params'][] = $setting;
      }
      foreach (decorpi_carousel_settings() as $key => $setting) {
         $gva_products['params'][] = $setting;
      }
      vc_map($gva_products);

      /*** GVA Products List ***/
      //---------------------------------------
      vc_map( array(
         'name'      => esc_html__( 'GVA Products List', 'decorpi' ),
         'base'      => 'gva_products_list',
         'class'  => '',
         'category'  => 'Gavias Element',
         'params'    => array(
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Block title', 'decorpi' ),
               'param_name'  => 'title',
               'admin_label'    => true,
               'value'       => '',
               'description'    => '',
            ),
            array(
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Product type', 'decorpi' ),
               'param_name'  => 'product_type',
               'admin_label'    => true,
               'value'       => array(
                     'Recent'    => 'recent',
                     'Sale'        => 'sale',
                     'Featured'    => 'featured',
                     'Best Selling'   => 'best_selling',
                     'Top Rated'   => 'top_rated',
                  ),
               'description'    => esc_html__( 'Select type of product', 'decorpi' ),
            ),
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Limit', 'decorpi' ),
               'param_name'  => 'per_page',
               'value'       => 5,
               'description'    => esc_html__( 'Number of Products', 'decorpi' ),
            ),
            array(
               'type'         => 'autocomplete',
               'heading'     => esc_html__( 'Product Categories', 'decorpi' ),
               'param_name'  => 'product_cats',
               'value'       => '',
               'settings' => array(
                  'multiple'        => true,
                  'sortable'       => true,
                  'unique_values'  => true,
               ),
               'description'    => '',
            ),
            array(
               'type'         => 'autocomplete',
               'heading'     => esc_html__( 'Product IDs', 'decorpi' ),
               'param_name'  => 'ids',
               'value'       => '',
               'settings' => array(
                  'multiple'        => true,
                  'sortable'       => true,
                  'unique_values'  => true,
               ),
               'description'    => esc_html__('Enter product name or slug to search', 'decorpi'),
            ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','decorpi'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','decorpi')
            ),
         )
      ) );

      /*** GVA Products Tabs ***/
      //---------------------------------------
      $gva_tabs_products = array(
         'name' => esc_html__('GVA Products Tabs','decorpi'),
         'base' => 'gva_tabs_products',
         'description' => esc_html__( 'Display BestSeller, TopRated ... Products In tabs', 'decorpi' ),
         'class' => '',
         'category' => esc_html__('Gavias Element','decorpi'),
         'params' => array(
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Title','decorpi'),
               'param_name' => 'title',
               'value' => '',
               'admin_label' => true
            ),
            array(
               'type' => 'param_group',
               'heading' => esc_html__('Items', 'decorpi' ),
               'param_name' => 'items',
               'description' => '',
               'value' => urlencode( json_encode( array(
                  
               ) ) ),

               'params' => array(
                  array(
                     'type' => 'textfield',
                     'heading' => esc_html__('Name','decorpi'),
                     'param_name' => 'name',
                  ),
                  array(
                     'type' => 'dropdown',
                     'heading' => esc_html__('Product Type', 'decorpi'),
                     'param_name' => 'product_type',
                     'value' => array(
                        array('recent', esc_html__('Latest Products', 'decorpi')),
                        array( 'featured_product', esc_html__('Featured Products', 'decorpi' )),
                        array('best_selling', esc_html__('BestSeller Products', 'decorpi' )),
                        array('top_rate', esc_html__('TopRated Products', 'decorpi' )),
                        array('on_sale', esc_html__('Special Products', 'decorpi' ))
                     )
                  ),
                  array(
                     'type'            => 'dropdown',
                     'heading'         => esc_html__( 'Product Categories', 'decorpi' ),
                     'param_name'      => 'product_cats',
                     'admin_label'     => true,
                     'value'           => $cats,
                     'description'     => '',
                  ),
               ),
            ),
            array(
               'type' => 'dropdown',
               'heading' => esc_html__('Style','decorpi'),
               'param_name' => 'style',
               'value' => array(
                  esc_html__('Gird Display', 'decorpi') => 'grid',
                  esc_html__('Carousel Display', 'decorpi') => 'carousel'
               ),
            ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Number of products to show','decorpi'),
               'param_name' => 'number',
               'value' => '4'
            ),
           
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','decorpi'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','decorpi')
            )
         )
      );
   
   foreach (decorpi_responsive_settings() as $key => $setting) {
      $gva_tabs_products['params'][] = $setting;
   }
   foreach (decorpi_carousel_settings() as $key => $setting) {
      $gva_tabs_products['params'][] = $setting;
   }
   vc_map($gva_tabs_products);

      /*** GVA Products Tabs Ajax ***/
      //---------------------------------------
      $gva_tabs_products_ajax = array(
         'name' => esc_html__('GVA Products Tabs Ajax','decorpi'),
         'base' => 'gva_tabs_products_ajax',
         'description' => esc_html__( 'Display BestSeller, TopRated ... Products In tabs', 'decorpi' ),
         'class' => '',
         'category' => esc_html__('Gavias Element','decorpi'),
         'params' => array(
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Title','decorpi'),
               'param_name' => 'title',
               'value' => '',
               'admin_label' => true
            ),
            array(
               'type' => 'param_group',
               'heading' => esc_html__('Items', 'decorpi' ),
               'param_name' => 'items',
               'description' => '',
               'value' => urlencode( json_encode( array(
                  
               ) ) ),

               'params' => array(
                  array(
                     'type' => 'textfield',
                     'heading' => esc_html__('Name','decorpi'),
                     'param_name' => 'name',
                  ),
                  array(
                     'type' => 'dropdown',
                     'heading' => esc_html__('Product Type', 'decorpi'),
                     'param_name' => 'product_type',
                     'value' => array(
                        array('recent', esc_html__('Latest Products', 'decorpi')),
                        array( 'featured_product', esc_html__('Featured Products', 'decorpi' )),
                        array('best_selling', esc_html__('BestSeller Products', 'decorpi' )),
                        array('top_rate', esc_html__('TopRated Products', 'decorpi' )),
                        array('on_sale', esc_html__('Special Products', 'decorpi' ))
                     )
                  ),
                  array(
                     'type'            => 'dropdown',
                     'heading'         => esc_html__( 'Product Categories', 'decorpi' ),
                     'param_name'      => 'product_cats',
                     'admin_label'     => true,
                     'value'           => $cats,
                     'description'     => '',
                  ),
                  array(
                     'type' => 'dropdown',
                     'heading' => esc_html__('Style','decorpi'),
                     'param_name' => 'style',
                     'value' => array(
                        esc_html__('Gird Display', 'decorpi') => 'grid',
                        esc_html__('Carousel Display', 'decorpi') => 'carousel'
                     ),
                  ),
               ),
            ),
           
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Number of products to show','decorpi'),
               'param_name' => 'number',
               'value' => '4'
            ),
           
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','decorpi'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','decorpi')
            )
         )
      );
   
   foreach (decorpi_responsive_settings() as $key => $setting) {
      $gva_tabs_products_ajax['params'][] = $setting;
   }
   foreach (decorpi_carousel_settings() as $key => $setting) {
      $gva_tabs_products_ajax['params'][] = $setting;
   }
   vc_map($gva_tabs_products_ajax);
   
   /*** Category List ***/
   //---------------------------------------
   vc_map( array(
         "name"     => esc_html__("GVA WooCommerce Categories List",'decorpi'),
         "base"     => "gva_woo_category_list",
         "class"    => "",
         "category" => esc_html__('Gavias Element', 'decorpi'),
         "params"   => array(
         array(
            "type"        => "textfield",
            "heading"     => esc_html__("Title",'decorpi'),
            "param_name"  => "title",
            "admin_label" => true,
         ),
         array(
            "type" => "dropdown",
            "class" => "",
            "heading" => esc_html__('Category', 'decorpi'),
            "param_name" => "term_id",
            "value" =>$cats,
            "admin_label" => true
         ),
         array(
            "type"        => "textfield",
            "heading"     => esc_html__("Extra class name",'decorpi'),
            "param_name"  => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'decorpi')
         )
      )
   ));
 
   /*** GVA Deals ***/
   //-----------------------------------
   $gva_deals = array(
      "name"     => esc_html__("GVA Deals",'decorpi'),
      "base"     => "gva_deals",
      "class"    => "",
      "category" => esc_html__('Gavias Element', 'decorpi'),
      "params"   => array(     
         array(
            'type'         => 'textfield',
            'heading'     => esc_html__( 'Block title', 'decorpi' ),
            'param_name'  => 'title',
            'admin_label'    => true,
            'value'       => '',
            'description'    => '',
         ),
         array(
            'type'         => 'autocomplete',
            'heading'     => esc_html__( 'Product Categories', 'decorpi' ),
            'param_name'  => 'product_cats',
            'admin_label'    => true,
            'value'       => '',
            'settings' => array(
               'multiple'        => true,
               'sortable'       => true,
               'unique_values'  => true,
            ),
            'description'    => '',
         ), 
         array(
            "type"       => "textfield",
            "heading"    => esc_html__("Number of categories to show", 'decorpi'),
            "param_name" => "number",
            "value"      => '5'
         ),
         
         array(
            'type' => 'dropdown',
            'heading' => esc_html__('Show Description','decorpi'),
            'param_name' => 'show_desc',
            "value" =>array(
               esc_html__('Off', 'decorpi')=>'off',
               esc_html__('On', 'decorpi')=>'on'
            ),
         ),
         array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style','decorpi'),
            'param_name' => 'style',
            'value' => array(
               esc_html__('Gird Display', 'decorpi') => 'grid',
               esc_html__('Carousel Display', 'decorpi') => 'carousel'
            ),
         ),
         array(
               'type'         => 'dropdown',
               'heading'      => esc_html__('Style View', 'decorpi' ),
               'param_name'   => 'style_view',
               'value'        => array(
                  esc_html__('Style v1', 'decorpi')=> 'style-v1',
                  esc_html__('Style v2', 'decorpi')=> 'style-v2',
               ),
            ),
         array(
            "type"        => "textfield",
            "heading"     => esc_html__("Extra class name",'decorpi'),
            "param_name"  => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'decorpi')
         )
      )
   );

   foreach (decorpi_responsive_settings() as $key => $setting) {
      $gva_deals['params'][] = $setting;
   }
   foreach (decorpi_carousel_settings() as $key => $setting) {
      $gva_deals['params'][] = $setting;
   }
   vc_map($gva_deals);

   if( class_exists('Vc_Vendor_Woocommerce') ){
         $vc_woo_vendor = new Vc_Vendor_Woocommerce();

         /* autocomplete callback */
         add_filter( 'vc_autocomplete_gva_products_ids_callback', array($vc_woo_vendor, 'productIdAutocompleteSuggester') );
         add_filter( 'vc_autocomplete_gva_products_ids_render', array($vc_woo_vendor, 'productIdAutocompleteRender') );
         
         $shortcode_field_cats = array();
         $shortcode_field_cats[] = array('gva_products', 'product_cats');
         $shortcode_field_cats[] = array('gva_deals', 'product_cats');
         foreach( $shortcode_field_cats as $shortcode_field ){
            add_filter( 'vc_autocomplete_'.$shortcode_field[0].'_'.$shortcode_field[1].'_callback', array($vc_woo_vendor, 'productCategoryCategoryAutocompleteSuggester') );
            add_filter( 'vc_autocomplete_'.$shortcode_field[0].'_'.$shortcode_field[1].'_render', array($vc_woo_vendor, 'productCategoryCategoryRenderByIdExact') );
         }
      }
	}
}

