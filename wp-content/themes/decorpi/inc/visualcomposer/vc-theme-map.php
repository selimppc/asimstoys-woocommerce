<?php 
class decorpi_Visualcomposer_Theme_Map implements Vc_Vendor_Interface {
	public function load(){ 
      
      //GVA Testimonial------------------------
      $testimonial_cats = array();
      $terms = get_terms('testimonial_cat', array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => true));   
      if( !is_wp_error($terms)){
         foreach ($terms as $term) {
            $testimonial_cats[$term->name] = $term->term_id;
         }
      }

      vc_map( array(
         'name'      => esc_html__( 'GVA Vertical Menu', 'decorpi' ),
         'base'      => 'gva_vertical_menu',
         'class'  => '',
         'category'  => 'Gavias Element',
         'params'    => array(
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Title', 'decorpi' ),
               'param_name'  => 'title',
               'admin_label'    => true,
               'value'       => '',
               'description'    => esc_html__('Title of element', 'decorpi')
            ),
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Extra Class', 'decorpi' ),
               'param_name'  => 'el_class',
               'value'       => ''
            )
         )
      ));

      $gva_testimonial = array(
         'name'      => esc_html__( 'GVA Testimonial', 'decorpi' ),
         'base'      => 'gva_testimonial',
         'class'  => '',
         'category'  => 'Gavias Element',
         'params'    => array(
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Title', 'decorpi' ),
               'param_name'  => 'title',
               'admin_label'    => true,
               'value'       => '',
               'description'    => esc_html__('Title of element', 'decorpi')
            ),
            array(
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Show Avatar', 'decorpi' ),
               'param_name'  => 'show_avatar',
               'value'       => array(
                        esc_html__('Show', 'decorpi') => 'show',
                        esc_html__('Hide', 'decorpi') => 'hide'
                     ),
               'description'    => ''
            ),
          
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Limit', 'decorpi' ),
               'param_name'  => 'per_page',
               'value'       => '4',
               'description'    => esc_html__('Number of Posts', 'decorpi')
            ),
            array(
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Style display', 'decorpi' ),
               'param_name'  => 'style_display',
               'value'       => array(
                        esc_html__('Default', 'decorpi')   => 'default',
                        esc_html__('Style 2', 'decorpi') => 'style-v2',
               ),
            ),
            array(
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Text Color Style', 'decorpi' ),
               'param_name'  => 'text_color_style',
               'value'       => array(
                        esc_html__('Default', 'decorpi')  => 'text-default',
                        esc_html__('Light', 'decorpi')=> 'text-light',
               ),
            ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','decorpi'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','decorpi')
            ),
         )
      );
      foreach (decorpi_responsive_settings() as $key => $setting) {
         $gva_testimonial['params'][] = $setting;
      }
      foreach (decorpi_carousel_settings() as $key => $setting) {
         $gva_testimonial['params'][] = $setting;
      }
      vc_map($gva_testimonial);

      $gva_brands = array(
         'name'      => esc_html__( 'GVA Brands', 'decorpi' ),
         'base'      => 'gva_brands',
         'class'  => '',
         'category'  => 'Gavias Element',
         'params'    => array(
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Title', 'decorpi' ),
               'param_name'  => 'title',
               'admin_label'    => true,
               'value'       => '',
               'description'    => esc_html__('Title of element', 'decorpi')
            ),
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Limit', 'decorpi' ),
               'param_name'  => 'per_page',
               'admin_label'    => false,
               'value'       => '6',
               'description'    => esc_html__('Number of Brands', 'decorpi')
            ),
            
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','decorpi'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','decorpi')
            ),
         )
      );
      foreach (decorpi_responsive_settings() as $key => $setting) {
         $gva_brands['params'][] = $setting;
      }
      foreach (decorpi_carousel_settings() as $key => $setting) {
         $gva_brands['params'][] = $setting;
      }
      vc_map($gva_brands);

      vc_map( array(
         'name'      => esc_html__( 'GVA Team', 'decorpi' ),
         'base'      => 'gva_team',
         'class'  => '',
         'category'  => 'Gavias Element',
         'params'    => array(
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Team name', 'decorpi' ),
               'param_name'  => 'name',
               'admin_label'    => true,
               'value'       => ''
            ),
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Team job', 'decorpi' ),
               'param_name'  => 'job',
               'admin_label'    => true,
               'value'       => ''
            ),
            array(
               'type'         => 'attach_image',
               'heading'     => esc_html__( 'Team Photo', 'decorpi' ),
               'param_name'  => 'photo',
               'value'       => ''
            ),
            array(
            "type" => "textfield",
            "heading" => esc_html__("Google Plus", 'decorpi'),
            "param_name" => "google",
            "value" => '',
         ),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Facebook", 'decorpi'),
            "param_name" => "facebook",
            "value" => '',
         ),

         array(
            "type" => "textfield",
            "heading" => esc_html__("Twitter", 'decorpi'),
            "param_name" => "twitter",
            "value" => '',
         ),

         array(
            "type" => "textfield",
            "heading" => esc_html__("Pinterest", 'decorpi'),
            "param_name" => "pinterest",
            "value" => '',
         ),

         array(
            "type" => "textfield",
            "heading" => esc_html__("Linked In", 'decorpi'),
            "param_name" => "linkedin",
            "value" => '',
         ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','decorpi'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','decorpi')
            ),
         )
      ));

      vc_map( array(
         'name'      => esc_html__( 'GVA Contact info', 'decorpi' ),
         'base'      => 'gva_contact_info',
         'class'  => '',
         'category'  => 'Gavias Element',
         'params'    => array(
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Title', 'decorpi' ),
               'param_name'  => 'title',
               'admin_label'    => true,
               'value'       => ''
            ),
            array(
               'type'         => 'textarea',
               'heading'     => esc_html__( 'Description', 'decorpi' ),
               'param_name'  => 'description',
               'value'       => ''
            ),
            array(
               'type'         => 'attach_image',
               'heading'     => esc_html__( 'Contact Photo', 'decorpi' ),
               'param_name'  => 'photo',
               'value'       => ''
            ),
            array(
               "type" => "textfield",
               "heading" => esc_html__("Address", 'decorpi'),
               "param_name" => "address",
               "value" => '',
            ),
            array(
               "type" => "textfield",
               "heading" => esc_html__("Phone", 'decorpi'),
               "param_name" => "phone",
               "value" => '',
            ),

            array(
               "type" => "textfield",
               "heading" => esc_html__("Email", 'decorpi'),
               "param_name" => "email",
               "value" => '',
            ),

            array(
               "type" => "textfield",
               "heading" => esc_html__("website", 'decorpi'),
               "param_name" => "website",
               "value" => '',
            ),

            array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','decorpi'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','decorpi')
            ),
         )
      ));

      vc_map( array(
         'name'      => esc_html__( 'GVA Icon Box', 'decorpi' ),
         'base'      => 'gva_icon_box',
         'class'  => '',
         'category'  => 'Gavias Element',
         'params'    => array(
            array(
               'type'           => 'textfield',
               'heading'        => esc_html__( 'Title', 'decorpi' ),
               'param_name'     => 'title',
               'admin_label'    => true,
               'value'          => '',
               'description'    => esc_html__('Title of element', 'decorpi')
            ),
            array(
               'type'         => 'textfield',
               'heading'      => esc_html__( 'Icon', 'decorpi' ),
               'param_name'   => 'icon',
               'admin_label'  => false,
               'value'        => '',
            ),
            array(
                  'param_name'   => 'image',
                  'type'         => 'attach_image',
                  'heading'      => esc_html__('Image Icon', 'decorpi' ),
               ),
            array(
               'type'         => 'textarea',
               'heading'      => esc_html__( 'Description', 'decorpi' ),
               'param_name'   => 'description',
               'admin_label'  => false,
               'value'        => '',
            ),
           
            array(
               'type'         => 'dropdown',
               'heading'      => esc_html__('Icon Position', 'decorpi' ),
               'param_name'   => 'icon_position',
               'value'        => array(
                  esc_html__('Top Center','decorpi') => 'top-center',
                  esc_html__('Top Left','decorpi')   => 'top-left',
                  esc_html__('Top Right','decorpi')  => 'top-right',
                  esc_html__('Right','decorpi')      => 'right',
                  esc_html__('Left','decorpi')       => 'left',
                  esc_html__('Left Center','decorpi')       => 'left-center',
                  esc_html__('Top Left Title','decorpi')   => 'top-left-title',
                  esc_html__('Top Right Title','decorpi')  => 'top-right-title'
               ),
            ),
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Link', 'decorpi' ),
               'param_name'  => 'link',
               'admin_label'    => false,
               'value'       => '',
            ),
            array(
               'type'         => 'dropdown',
               'heading'      => esc_html__('Background icon', 'decorpi' ),
               'param_name'   => 'icon_background',
               'value'        => array(
                  esc_html__('--None--','decorpi') => '',
                  esc_html__('Background of theme','decorpi')=> 'bg-theme',
                  esc_html__('Background White','decorpi')=> 'bg-white',
                  esc_html__('Background Black','decorpi')=> 'bg-black',
                  esc_html__('Background Dark','decorpi')=> 'bg-dark'
               ),
            ),
            array(
               'type'         => 'dropdown',
               'heading'      => esc_html__('Border box', 'decorpi' ),
               'param_name'   => 'box_border',
               'value'        => array(
                  esc_html__('-- None --','decorpi') => '',
                  esc_html__('Border 1px','decorpi') => 'border-1',
                  esc_html__('Border 2px','decorpi') => 'border-2',
                  esc_html__('Border 3px','decorpi') => 'border-3',
                  esc_html__('Border 4px','decorpi') => 'border-4',
                  esc_html__('Border 5px','decorpi') => 'border-5'
               ),
            ),
            array(
               'type'         => 'dropdown',
               'heading'      => esc_html__('Icon Color', 'decorpi' ),
               'param_name'   => 'icon_color',
               'value'        => array(
                  esc_html__('Text theme','decorpi') => 'text-theme',
                  esc_html__('Text white','decorpi')=> 'text-white',
                  esc_html__('Text black','decorpi')=> 'text-black'
               ),
            ),
            array(
               'type'         => 'dropdown',
               'heading'      => esc_html__('Icon Width', 'decorpi' ),
               'param_name'   => 'icon_width',
               'value'        => array(
                  esc_html__('Fa 1x small','decorpi') => 'fa-1x',
                  esc_html__('Fa 2x','decorpi')=> 'fa-2x',
                  esc_html__('Fa 3x','decorpi')=> 'fa-3x',
                  esc_html__('Fa 4x','decorpi')=> 'fa-4x'
               )
            ),
            array(
               'type'         => 'dropdown',
               'heading'      => esc_html__('Icon Border', 'decorpi' ),
               'param_name'   => 'icon_border',
               'value'        => array(
                  esc_html__('-- None --','decorpi') => '',
                  esc_html__('Border 1px','decorpi') => 'border-1',
                  esc_html__('Border 2px','decorpi') => 'border-2',
                  esc_html__('Border 3px','decorpi') => 'border-3',
                  esc_html__('Border 4px','decorpi') => 'border-4',
                  esc_html__('Border 5px','decorpi') => 'border-5'
               ),
            ),
             array(
               'type'         => 'dropdown',
               'heading'      => esc_html__('Icon Radius', 'decorpi' ),
               'param_name'   => 'icon_radius',
               'value'        => array(
                  esc_html__('-- None --','decorpi') => '',
                  esc_html__('Radius 1x','decorpi') => 'radius-1x',
                  esc_html__('Radius 2x','decorpi') => 'radius-2x',
                  esc_html__('Radius 5x','decorpi') => 'radius-5x',
               ),
            ),
            array(
               'type'         => 'dropdown',
               'heading'      => esc_html__('Skin Text for box', 'decorpi' ),
               'param_name'   => 'skin_text',
               'value'        => array(
                  esc_html__('Text Dark','decorpi') => 'text-dark',
                  esc_html__('Text Light','decorpi') => 'text-light' 
               )
            ),
            array(
               'param_name'   => 'target',
               'type'         => 'checkbox',
               'heading'      => esc_html__('Open in new window', 'decorpi' )
            ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','decorpi'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','decorpi')
            ),
         )
      ));

      vc_map( array(
         'name'      => esc_html__( 'GVA Banner', 'decorpi' ),
         'base'      => 'gva_banner',
         'class'  => '',
         'category'  => 'Gavias Element',
         'params'    => array(
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Title', 'decorpi' ),
               'param_name'  => 'title',
               'admin_label'    => true,
               'value'       => '',
               'description'    => esc_html__('Title of element', 'decorpi')
            ),
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Sub title', 'decorpi' ),
               'param_name'  => 'sub_title',
               'value'       => '',
               'description'    => esc_html__('Sub Title', 'decorpi')
            ),
            array(
               'type'         => 'attach_image',
               'heading'     => esc_html__( 'Image', 'decorpi' ),
               'param_name'  => 'photo',
               'admin_label'    => true,
               'value'       => '',
            ),
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Text button', 'decorpi' ),
               'param_name'  => 'text_button',
               'value'       => '',
               'description'    => esc_html__('Text button', 'decorpi')
            ),
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Link', 'decorpi' ),
               'param_name'  => 'link',
               'admin_label'    => false,
               'value'       => '',
            ),
            array(
               'type'         => 'dropdown',
               'heading'      => esc_html__('Content position', 'decorpi' ),
               'param_name'   => 'position',
               'value'        => array(
                  esc_html__('Top Left', 'decorpi')=> 'top left',
                  esc_html__('Top Right', 'decorpi')=>'top right',
                  esc_html__('Top Center','decorpi')=>'top center',
                  esc_html__('Bottom Left', 'decorpi')=> 'bottom left',
                  esc_html__('Bottom Right', 'decorpi')=>'bottom right',
                  esc_html__('Bottom Center','decorpi')=>'bottom center',
                  esc_html__('Center Left','decorpi')=>'center left',
                  esc_html__('Center Right','decorpi')=>'center right',
                  esc_html__('Center Center','decorpi')=>'center center'
               ),
            ),
             array(
               'type'         => 'dropdown',
               'heading'      => esc_html__('Style', 'decorpi' ),
               'param_name'   => 'style',
               'value'        => array(
                  esc_html__('Style v1', 'decorpi')=> 'style-v1',
                  esc_html__('Style v2', 'decorpi')=> 'style-v2',
               ),
            ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','decorpi'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','decorpi')
            ),
         )
      ));

      vc_map( array(
         'name'      => esc_html__( 'GVA Block Heading', 'decorpi' ),
         'base'      => 'gva_block_heading',
         'class'  => '',
         'category'  => 'Gavias Element',
         'params'    => array(
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Title', 'decorpi' ),
               'param_name'  => 'title',
               'admin_label'    => true,
               'value'       => '',
               'description'    => esc_html__('Title of element', 'decorpi')
            ),
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Sub Title', 'decorpi' ),
               'param_name'  => 'subtitle',
            ),
            array(
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Style', 'decorpi' ),
               'param_name'  => 'style',
               'value'     => array(
                  esc_html__( 'Style v1', 'decorpi' )    =>  'style-v1',
                  esc_html__( 'Style v2', 'decorpi' )    =>  'style-v2',
                  esc_html__( 'Style v3', 'decorpi' )    =>  'style-v3',
               ),
            ),
            array(
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Align', 'decorpi' ),
               'param_name'  => 'align',
               'value'     => array(
                  esc_html__( 'Center', 'decorpi' )     =>  'text-center',
                  esc_html__( 'Left', 'decorpi' )       =>  'text-left',
                  esc_html__( 'Right', 'decorpi' )      =>  'text-right',
               ),
            ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','decorpi'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','decorpi')
            ),
         )
      ));

      //GVA_Social_Links
      vc_map(array(
         'name'      => esc_html__( 'GVA Social Links', 'decorpi' ),
         'base'      => 'gva_social_links',
         'category'  => 'Gavias Element',
         'params'    => array(
            array(
               'type'         => 'textfield',
               'heading'      => esc_html__( 'Title', 'decorpi' ),
               'param_name'   => 'title',
               'value'        => '',
               'description'  => esc_html__('This element display link socials media for theme setting', 'decorpi'),
            ),
            array(
               'type'         => 'textarea',
               'heading'      => esc_html__( 'Content', 'decorpi' ),
               'param_name'   => 'desc',
               'value'        => '',
            ),
            array(
               'type'         => 'dropdown',
               'heading'      => esc_html__( 'Style display', 'decorpi' ),
               'param_name'   => 'style',
               'value'     => array(
                     esc_html__( 'Default - Align right', 'decorpi' )    =>  'default',
                     esc_html__( 'Version 2 - Color White, Align center', 'decorpi' )  => 'style-v2',
                     esc_html__( 'Version 3 - Align center', 'decorpi' )  => 'style-v3',
                     esc_html__( 'Version 4 - Align right', 'decorpi' )  => 'style-v4',
               ),
            ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','decorpi'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','decorpi')
            ),
         ),   
      ));

      //GVA Blogs Carousel
      $gva_blogs_carousel = array(
         'name'      => esc_html__( 'GVA Blogs Carousel', 'decorpi' ),
         'base'      => 'gva_blogs_carousel',
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
               'type' => 'loop',
               'heading' =>esc_html__( 'Grids content', 'decorpi' ),
               'param_name' => 'loop',
               'settings' => array(
                  'size' => array( 'hidden' => false, 'value' => 4 ),
                  'order_by' => array( 'value' => 'date' ),
               ),
               'description' =>esc_html__( 'Create WordPress loop, to populate content from your site.', 'decorpi' )
            ),
            array(
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Columns', 'decorpi' ),
               'param_name'  => 'columns',
               'admin_label'    => true,
               'value'       => array(6, 4, 3, 2, 1),
               'description'    => esc_html__( 'Number of Columns', 'decorpi' ),
            ),
            array(
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Show post excerpt', 'decorpi' ),
               'param_name'  => 'show_excerpt',
               'admin_label'    => false,
               'value'       => array(
                        'Yes' => 1,
                        'No' => 0,
                        ),
               'description'    => '',
            ),
            array(
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Number of words in excerpt', 'decorpi' ),
               'param_name'  => 'excerpt_words',
               'admin_label'    => false,
               'value'       => '16',
               'description'    => '',
            ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','decorpi'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','decorpi')
            ),
         )
      );
       foreach (decorpi_responsive_settings() as $key => $setting) {
         $gva_blogs_carousel['params'][] = $setting;
      }
      foreach (decorpi_carousel_settings() as $key => $setting) {
         $gva_blogs_carousel['params'][] = $setting;
      }
      vc_map($gva_blogs_carousel);
      
      //GVA Blogs Masonry
      vc_map( array(
         'name'      => esc_html__( 'GVA Blogs Masonry', 'decorpi' ),
         'base'      => 'gva_blogs_masonry',
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
               'type' => 'loop',
               'heading' =>esc_html__( 'Grids content', 'decorpi' ),
               'param_name' => 'loop',
               'settings' => array(
                  'size' => array( 'hidden' => false, 'value' => 4 ),
                  'order_by' => array( 'value' => 'date' ),
               ),
               'description' =>esc_html__( 'Create WordPress loop, to populate content from your site.', 'decorpi' )
            ),
            array(
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Columns', 'decorpi' ),
               'param_name'  => 'columns',
               'admin_label'    => true,
               'value'       => array(1, 2, 3, 4, 5, 6),
               'description'    => esc_html__( 'Number of Columns', 'decorpi' ),
            ),
            array(
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Show Pagination', 'decorpi' ),
               'param_name'  => 'pagination',
               'admin_label'    => true,
               'value'       => array(
                     esc_html__('Off', 'decorpi')  => 'off',
                     esc_html__('On', 'decorpi')        => 'on',
                  ),
               'description'    => esc_html__( 'Show pagination on bottom element', 'decorpi' ),
            ),
             array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','decorpi'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','decorpi')
            ),
         )
      ));

      
      //GVA Blogs Grid
      vc_map( array(
         'name'      => esc_html__( 'GVA Blogs Grid', 'decorpi' ),
         'base'      => 'gva_blogs_grid',
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
               'type'         => 'textfield',
               'heading'     => esc_html__( 'Sub title', 'decorpi' ),
               'param_name'  => 'sub_title',
               'admin_label'    => true,
               'value'       => '',
               'description'    => '',
            ),
            array(
               'type' => 'loop',
               'heading' =>esc_html__( 'Grids content', 'decorpi' ),
               'param_name' => 'loop',
               'settings' => array(
                  'size' => array( 'hidden' => false, 'value' => 4 ),
                  'order_by' => array( 'value' => 'date' ),
               ),
               'description' =>esc_html__( 'Create WordPress loop, to populate content from your site.', 'decorpi' )
            ),
            array(
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Columns', 'decorpi' ),
               'param_name'  => 'columns',
               'admin_label'    => true,
               'value'       => array(1, 2, 3, 4, 5, 6),
               'description'    => esc_html__( 'Number of Columns', 'decorpi' ),
            ),
            array(
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Show Pagination', 'decorpi' ),
               'param_name'  => 'pagination',
               'admin_label'    => true,
               'value'       => array(
                     esc_html__('Off', 'decorpi')  => 'off',
                     esc_html__('On', 'decorpi')        => 'on',
                  ),
               'description'    => esc_html__( 'Show pagination on bottom element', 'decorpi' ),
            ),
            array(
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Sticky style', 'decorpi' ),
               'param_name'  => 'sticky',
               'admin_label'    => true,
               'value'       => array(
                     esc_html__('Off', 'decorpi')  => 'off',
                     esc_html__('On', 'decorpi')        => 'on',
                  ),
               'description'    => esc_html__( 'Sticky One post on top', 'decorpi' ),
            ),
             array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','decorpi'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','decorpi')
            ),
             array(
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Style display', 'decorpi' ),
               'param_name'  => 'style_display',
               'value'       => array(
                        esc_html__('Style 1', 'decorpi')   => 'style_1',
                        esc_html__('Style 2', 'decorpi') => 'style_2',
               ),
            ),
         )
      ));

      //GVA Blogs List
      vc_map( array(
         'name'      => esc_html__( 'GVA Blogs List', 'decorpi' ),
         'base'      => 'gva_blogs_list',
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
               'type' => 'loop',
               'heading' =>esc_html__( 'Grids content', 'decorpi' ),
               'param_name' => 'loop',
               'settings' => array(
                  'size' => array( 'hidden' => false, 'value' => 4 ),
                  'order_by' => array( 'value' => 'date' ),
               ),
               'description' =>esc_html__( 'Create WordPress loop, to populate content from your site.', 'decorpi' )
            ),
            
            array(
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Show Pagination', 'decorpi' ),
               'param_name'  => 'pagination',
               'admin_label'    => true,
               'value'       => array(
                     esc_html__('Off', 'decorpi')  => 'off',
                     esc_html__('On', 'decorpi')        => 'on',
                  ),
               'description'    => esc_html__( 'Show pagination on bottom element', 'decorpi' ),
            ),
             array(
               'type' => 'textfield',
               'heading' => esc_html__('Extra class name','decorpi'),
               'param_name' => 'el_class',
               'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','decorpi')
            ),
             array(
               'type'         => 'dropdown',
               'heading'     => esc_html__( 'Style display', 'decorpi' ),
               'param_name'  => 'style_display',
               'value'       => array(
                        esc_html__('Style Dark', 'decorpi')   => 'style_dark',
                        esc_html__('Style light', 'decorpi') => 'style_light',
               ),
            ),
         )
      ));

      vc_map( array(
         'name'        => esc_html__( 'Gva Banner Slide', 'decorpi' ),
         'base'        => 'gva_banner_slide',
         "class"       => "",
         "category" => esc_html__('Gavias Element', 'decorpi'),
         "params"      => array(          
            array(
               "type" => "attach_image",
               "description" => esc_html__("If you upload an image, icon will not show.", 'decorpi'),
               "param_name" => "image",
               "value" => '',
               'heading'   => esc_html__('Image', 'decorpi' )
            ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Title', 'decorpi' ),
               'param_name' => 'title',
            ),  
            array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Sub Title', 'decorpi' ),
               'param_name' => 'subtitle',
            ),         
            array(
               "type" => "textarea_html",
               'heading' => esc_html__( 'Description', 'decorpi' ),
               "param_name" => "content",
               "value" => '',
               'description' => esc_html__( 'Enter description for title.', 'decorpi' )
             ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Price', 'decorpi' ),
               'param_name' => 'price',
            ), 
            array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Extra class name', 'decorpi' ),
               'param_name' => 'el_class',
               'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'decorpi' )
            )
         ),
      ));

      vc_map( array(
         'name'        => esc_html__( 'Gva Counter', 'decorpi' ),
         'base'        => 'gva_counter',
         "class"       => "",
         "category" => esc_html__('Gavias Element', 'decorpi'),
         "params"      => array(          
         
            array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Title', 'decorpi' ),
               'param_name' => 'title',
            ),  
            array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Number', 'decorpi' ),
               'param_name' => 'number',
            ),         
            array(
               "type" => "textfield",
               'heading' => esc_html__( 'Icon', 'decorpi' ),
               "param_name" => "icon",
               "value" => '',
             ),
            array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Extra class name', 'decorpi' ),
               'param_name' => 'el_class',
               'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'decorpi' )
            )
         ),
      ));

      $gva_feature_services =  array(
         'name'        => esc_html__( 'GVA features services', 'decorpi' ),
         'base'        => 'gva_feature_services',
         "class"       => "",
         "category" => esc_html__('Gavias Element', 'decorpi'),
         "params"      => array(  
            array(
               'type' => 'param_group',
               'heading' => esc_html__('Item', 'decorpi'),
               'param_name' => 'items',
               'description' => '',
               'params' => array(        
                  array(
                     'type' => 'textfield',
                     'heading' => esc_html__( 'Title', 'decorpi' ),
                     'param_name' => 'title'
                  ),
                  array(
                     'type' => 'textfield',
                     'heading' => esc_html__( 'Icon', 'decorpi' ),
                     'param_name' => 'icon',
                     'admin_label'    => true
                  ), 
                   array(
                     'type' => 'attach_image',
                     'heading' => esc_html__( 'Image', 'decorpi' ),
                     'param_name' => 'image'
                  ),
                  array(
                     "type" => "textfield",
                     'heading' => esc_html__( 'Background Color', 'decorpi' ),
                     "param_name" => "color",
                     "value" => ''
                   ),
                  array(
                     "type" => "textfield",
                     'heading' => esc_html__( 'Link', 'decorpi' ),
                     "param_name" => "link",
                     "value" => ''
                   ),
               )
            ),
             
            array(
               'type' => 'textfield',
               'heading' => esc_html__( 'Extra class name', 'decorpi' ),
               'param_name' => 'el_class',
               'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'decorpi' )
            )
         ),
      );

      foreach (decorpi_responsive_settings() as $key => $setting) {
         $gva_feature_services['params'][] = $setting;
      }
      foreach (decorpi_carousel_settings() as $key => $setting) {
         $gva_feature_services['params'][] = $setting;
      }
      vc_map($gva_feature_services);
	}
}

