<?php
function decorpi_register_meta_boxes(){

   $prefix = 'decorpi_';
   global $meta_boxes, $wp_registered_sidebars;;
   $sidebar = array();
   $sidebar[""] = ' --Default-- ';
   foreach($wp_registered_sidebars as $key => $value){
      $sidebar[$value['id']] = $value['name'];
   }
   $default_options = get_option('decorpi_options');
   $taxonomies_list = array( '' => 'Select' );
   $taxonomies = get_taxonomies(); 
   foreach ( $taxonomies as $taxonomy ) {
      $taxonomies_list[$taxonomy] = $taxonomy;
   }
   $meta_boxes = array();

   /* Thumbnail Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id' => 'gavias_metaboxes_post_thumbnail',
      'title' => esc_html__('Thumbnail', 'decorpi'),
      'pages' => array( 'post' ),
      'context' => 'normal',
      'fields' => array(
         
         // THUMBNAIL IMAGE
         array(
            'name'  => esc_html__('Thumbnail image', 'decorpi'),
            'desc'  => esc_html__('The image that will be used as the thumbnail image.', 'decorpi'),
            'id'    => "{$prefix}thumbnail_image",
            'type'  => 'image_advanced',
            'max_file_uploads' => 1
         ),

         // THUMBNAIL VIDEO
         array(
            'name' => esc_html__('Thumbnail video URL', 'decorpi'),
            'id' => $prefix . 'thumbnail_video_url',
            'desc' => esc_html__('Enter the video url for the thumbnail. Only links from Vimeo & YouTube are supported.', 'decorpi'),
            'clone' => false,
            'type'  => 'oembed',
            'std' => '',
         ),

         // THUMBNAIL AUDIO
         array(
            'name' => esc_html__('Thumbnail audio URL', 'decorpi'),
            'id' => "{$prefix}thumbnail_audio_url",
            'desc' => esc_html__('Enter the audio url for the thumbnail.', 'decorpi'),
            'clone' => false,
            'type'  => 'oembed',
            'std' => '',
         ),

         // THUMBNAIL GALLERY
         array(
            'name'             => esc_html__('Thumbnail gallery', 'decorpi'),
            'desc'             => esc_html__('The images that will be used in the thumbnail gallery.', 'decorpi'),
            'id'               => "{$prefix}thumbnail_gallery",
            'type'             => 'image_advanced',
            'max_file_uploads' => 50,
         ),

         // THUMBNAIL LINK TYPE
         array(
            'name' => esc_html__('Thumbnail link type', 'decorpi'),
            'id'   => "{$prefix}thumbnail_link_type",
            'type' => 'select',
            'options' => array(
               'link_to_post'    => esc_html__('Link to item', 'decorpi'),
               'link_to_url'     => esc_html__('Link to URL', 'decorpi'),
               'link_to_url_nw'  => esc_html__('Link to URL (New Window)', 'decorpi'),
               'lightbox_thumb'  => esc_html__('Lightbox to the thumbnail image', 'decorpi'),
               'lightbox_image'  => esc_html__('Lightbox to image (select below)', 'decorpi'),
               'lightbox_video'  => esc_html__('Fullscreen Video Overlay (input below)', 'decorpi')
            ),
            'multiple' => false,
            'std'  => 'link-to-post',
            'desc' => esc_html__('Choose what link will be used for the image(s) and title of the item.', 'decorpi')
         ),

         // THUMBNAIL LINK URL
         array(
            'name' => esc_html__('Thumbnail link URL', 'decorpi'),
            'id' => $prefix . 'thumbnail_link_url',
            'desc' => esc_html__('Enter the url for the thumbnail link.', 'decorpi'),
            'clone' => false,
            'type'  => 'text',
            'std' => '',
         ),

         // THUMBNAIL LINK LIGHTBOX IMAGE
         array(
            'name'  => esc_html__('Thumbnail link lightbox image', 'decorpi'),
            'desc'  => esc_html__('The image that will be used as the lightbox image.', 'decorpi'),
            'id'    => "{$prefix}thumbnail_link_image",
            'type'  => 'thickbox_image'
         ),
      )
   );

   /* Page Title Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id' => 'gavias_metaboxes_page_heading',
      'title' => esc_html__('Page Title', 'decorpi'),
      'pages' => array( 'post', 'page', 'product'),
      'context' => 'normal',
      'fields' => array(

         // SHOW PAGE TITLE
         array(
            'name' => esc_html__('Show page title', 'decorpi'),   
            'id'   => "{$prefix}page_title",
            'type' => 'checkbox',
            'desc' => esc_html__('Show the page title at the top of the page.', 'decorpi'),
            'std'  => 1,
         ),

         // PAGE TITLE STYLE
         array(
            'name' => esc_html__('Page Title Style', 'decorpi'),
            'id'   => "{$prefix}page_title_style",
            'type' => 'select',
            'options' => array(
               'standard'           => esc_html__('Standard', 'decorpi'),
               'hero'               => esc_html__('Hero', 'decorpi'),
               'background'         => esc_html__('Background', 'decorpi'),
            ),
            'multiple' => false,
            'std'  => 'standard',
            'desc' => esc_html__('Choose the heading style.', 'decorpi')
         ),

         // PAGE TITLE LINE 1
         array(
            'name' => esc_html__('Page Title', 'decorpi'),
            'id' => $prefix . 'page_title_one',
            'desc' => esc_html__("Enter a custom page title if you'd like.", 'decorpi'),
            'type'  => 'text',
            'std' => '',
         ),

         // PAGE TITLE BACKGROUND COLOR
            array(
                'name' => esc_html__( 'Hero Overlay Color', 'decorpi' ),
                'id'   => "{$prefix}bg_color_title",
                'desc' => esc_html__( "Set an overlay color for hero heading image.", 'decorpi' ),
                'type' => 'color',
                'std'  => '',
            ),
            
            // Overlay Opacity Value
            array(
                'name'       => esc_html__( 'Overlay Opacity', 'decorpi' ),
                'id'         => "{$prefix}bg_opacity_title",
                'desc'       => esc_html__( 'Set the opacity level of the overlay. This will lighten or darken the image depening on the color selected.', 'decorpi' ),
                'clone'      => false,
                'type'       => 'slider',
                'prefix'     => '',
                'js_options' => array(
                    'min'  => 0,
                    'max'  => 100,
                    'step' => 1,
                ),
                'std'   => '50'
            ),

         // HERO HEADING IMAGE UPLOAD
         array(
            'name'  => esc_html__('Hero Heading Background Image', 'decorpi'),
            'desc'  => esc_html__('The image that will be used as the background for the hero header.', 'decorpi'),
            'id'    => "{$prefix}page_title_image",
            'type'  => 'image_advanced',
            'max_file_uploads' => 1
         ),

         // HERO HEADING TEXT STYLE
         array(
            'name' => esc_html__('Hero Heading Text Style', 'decorpi'),
            'id'   => "{$prefix}page_title_text_style",
            'type' => 'select',
            'options' => array(
               'text-light'     => esc_html__('Light', 'decorpi'),
               'text-dark'      => esc_html__('Dark', 'decorpi')
            ),
            'multiple' => false,
            'std'  => 'text-light',
            'desc' => esc_html__('If you uploaded an image in the option above, choose light/dark styling for the text heading text here.', 'decorpi')
         ),

         // HERO HEADING TEXT ALIGN
         array(
            'name' => esc_html__('Hero Heading Text Align', 'decorpi'),
            'id'   => "{$prefix}page_title_text_align",
            'type' => 'select',
            'options' => array(
               'text-left'      => esc_html__('Left', 'decorpi'),
               'text-center'    => esc_html__('Center', 'decorpi'),
               'text-right'     => esc_html__('Right', 'decorpi')
            ),
            'multiple' => false,
            'std'  => 'text-center',
            'desc' => esc_html__('Choose the text alignment for the hero heading.', 'decorpi')
         ),

         // REMOVE BREADCRUMBS
         array(
            'name' => esc_html__('Remove breadcrumbs', 'decorpi'),
            'id'   => "{$prefix}no_breadcrumbs",
            'type' => 'checkbox',
            'desc' => esc_html__('Remove the breadcrumbs from under the page title on this page.', 'decorpi'),
            'std' => 0,
         ),
      )
   );

   /* Testimonials Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'gavias_metaboxes_testimonials',
      'title' => esc_html__('Testimonial Meta', 'decorpi'),
      'pages' => array( 'testimonials' ),
      'fields' => array(
         array(
            'name' => esc_html__('Testimonial Job', 'decorpi'),
            'id' => $prefix . 'testimonial_job',
            'desc' => esc_html__("Enter the job for the testimonial.", 'decorpi'),
            'clone' => false,
            'type'  => 'text',
            'std' => ''
         ),
      )
   );

   /* Page Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'gavias_metaboxes_page',
      'title' => esc_html__('Page Meta', 'decorpi'),
      'pages' => array( 'page' ),
      'fields' => array(
         // Extra Page Class
         array(
            'name' => esc_html__('Header', 'decorpi'),
            'id' => $prefix . 'page_header',
            'desc' => esc_html__("You can change header for page if you like's.", 'decorpi'),
            'type'  => 'select',
            'options'   => decorpi_get_headers(),
            'std' => 'default-option-theme',
         ),
         array(
            'name'      => esc_html__('Footer', 'decorpi'),
            'id'        => $prefix . 'page_footer',
            'desc'      => esc_html__("You can change footer for page if you like's",'decorpi'),
            'type'      => 'select',
            'options'   =>  decorpi_get_footer(),
            'std'       => 'default-option-theme'
         ),
         // Extra Page Class
         array(
            'name' => esc_html__('Extra page class', 'decorpi'),
            'id' => $prefix . 'extra_page_class',
            'desc' => esc_html__("If you wish to add extra classes to the body class of the page (for custom css use), then please add the class(es) here.", 'decorpi'),
            'clone' => false,
            'type'  => 'text',
            'std' => '',
         ),
         // Full width
         array(
            'name' => esc_html__('Full Width', 'decorpi'),
            'id'   => "{$prefix}page_full_width",
            'type' => 'checkbox',
            'desc' => esc_html__('Remove class container wrapper for page.', 'decorpi'),
            'std' => 0,
         ),   
      )
   );

   /* Brands Meta Box
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'gavias_metaboxes_brands_options',
      'title' => esc_html__('Brands Options', 'decorpi'),
      'pages' => array( 'brands'),
      'priority' => 'low',
      'fields' => array(
         // LEFT SIDEBAR
         array (
            'name'   => esc_html__('Url Link', 'decorpi'),
             'id'    => "{$prefix}url_link",
             'type' => 'text',
             'std'   => ''
         ),
      )
   );

   /* Sidebar Meta Box Page
   ================================================== */
   $meta_boxes[] = array(
      'id'    => 'gavias_metaboxes_sidebar_page',
      'title' => esc_html__('Sidebar Options', 'decorpi'),
      'pages' => array( 'post', 'page', 'product' ),
      'priority' => 'low',
      'fields' => array(

         // SIDEBAR CONFIG
         array(
            'name' => esc_html__('Sidebar configuration', 'decorpi'),
            'id'   => "{$prefix}sidebar_config",
            'type' => 'select',
            'options' => array(
               ''                   => esc_html__('--Default--', 'decorpi'),
               'no-sidebars'        => esc_html__('No Sidebars', 'decorpi'),
               'left-sidebar'       => esc_html__('Left Sidebar', 'decorpi'),
               'right-sidebar'      => esc_html__('Right Sidebar', 'decorpi'),
               'both-sidebars'      => esc_html__('Both Sidebars', 'decorpi')
            ),
            'multiple' => false,
            'std'  => '',
            'desc' => esc_html__('Choose the sidebar configuration for the detail page of this page.', 'decorpi'),
         ),

         // LEFT SIDEBAR
         array (
            'name'   => esc_html__('Left Sidebar', 'decorpi'),
             'id'    => "{$prefix}left_sidebar",
             'type' => 'select',
             'options'  => $sidebar,
             'std'   => ''
         ),

         // RIGHT SIDEBAR
         array (
            'name'   => esc_html__('Right Sidebar', 'decorpi'),
            'id'    => "{$prefix}right_sidebar",
            'type' => 'select',
            'options'  => $sidebar,
            'std'   => ''
         ),
      )
   );

    return $meta_boxes;
 }  

   /********************* META BOX REGISTERING ***********************/
   add_filter( 'rwmb_meta_boxes', 'decorpi_register_meta_boxes' , 99 );
