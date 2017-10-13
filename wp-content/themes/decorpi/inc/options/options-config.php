<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
      return;
	 }

    // This is your option name where all the Redux data is stored.
    $opt_name = 'decorpi_theme_options';

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */
    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // NM: Disable tracking
		'disable_tracking' => true,
		// TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
		    'menu_title'			=> esc_html__( 'Theme Settings', 'decorpi' ),
		    'page_title'			=> esc_html__( 'Theme Settings', 'decorpi' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        
        'forced_dev_mode_off'   => true,

        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        'footer_credit'     => '&nbsp;',
		// Footer credit text

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
		'system_info'          => false,
        // REMOVE

        //'compiler'             => true,
		
        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                )
            )
        )
    );
	
    Redux::setArgs( $opt_name, $args );

	
    /*
     *
     * ---> START SECTIONS
     *
     */
	
	Redux::setSection( $opt_name, array(
		'title' => esc_html__('General Options', 'decorpi'),
      'desc' => '',
      'icon' => 'el-icon-wrench',
      // 'submenu' => false,
      'fields' => array(
         array(
            'id' => 'skin_color',
            'type' => 'select',
            'title' => esc_html__('Skin Color', 'decorpi'),
            'desc' => '',
            'options' => array(
                '' => 'Default',
                'blue'          => 'Blue',
                'brown'         => 'Brown',
                'green'         => 'Green',
                'lilac'         => 'Lilac',
                'lime-green'    => 'Lime Green',
                'orange'        => 'Orange',
                'pink'          => 'Pink',
                'purple'        => 'Purple',
                'red'           => 'Red',
                'turquoise'     => 'Turquoise',
                'turquoise2'    => 'Turquoise2',
                'violet-red'    => 'Violet Red',
                'yellow'        => 'Yellow'
              ),
            'default' => ''
         ),
         array(
            'id' => 'page_layout',
            'type' => 'button_set',
            'title' => esc_html__('Page Layout', 'decorpi'),
            'subtitle' => esc_html__('Select the page layout type', 'decorpi'),
            'desc' => '',
            'options' => array('boxed' => 'Boxed','fullwidth' => 'Fullwidth'),
            'default' => 'fullwidth'
          ),
         array(
            'id' => 'enable_backtotop',
            'type' => 'button_set',
            'title' => esc_html__('Enable Back To Top', 'decorpi'),
            'subtitle' => esc_html__('Enable the back to top button that appears in the bottom right corner of the screen.', 'decorpi'),
            'desc' => '',
            'options' => array('1' => 'On','0' => 'Off'),
            'default' => '1'
            ),
      ),
	));
	
   //Header
	Redux::setSection( $opt_name, array(
		'title' => esc_html__('Header Options', 'decorpi'),
      'desc' => '',
      'icon' => 'el-icon-compass',
       // 'submenu' => false, 
      'fields' => array(
         array(
            'id' => 'header_layout',
            'type' => 'select',
            'title' => esc_html__('Header Layout', 'decorpi'),
            'subtitle' => esc_html__('Select a header layout option from the examples.', 'decorpi'),
            'desc' => '',
            'options' => array(
              ''   => 'Default',
              'header-v2' => 'Header v2',
            ),
            'default' => ''
          ),

        array(
          'id' => 'stick_menu',
          'type' => 'button_set',
          'title' => esc_html__('Sticky Menu', 'decorpi'),
          'subtitle' => esc_html__('Enable style menu when scoll page.', 'decorpi'),
          'desc' => '',
          'options' => array('no-sticky' => 'Disable', 'gv-sticky-menu' => 'Enable'),
          'default' => 'gv-sticky-menu'
        ),

       
         array(
          'id' => 'phone_header',
          'type' => 'text',
          'title' => esc_html__('Enter store phone in header', 'decorpi'),
          'desc' => 'ex: +1234 567 890, used in some header',
          'default' => ''
        ),
         array(
          'id' => 'email_header',
          'type' => 'text',
          'title' => esc_html__('Enter store Email in header', 'decorpi'),
          'desc' => 'ex: support@decorpi.com, used in some header',
          'default' => ''
        ),

        array(
          'id' => 'header_logo', 
          'type' => 'media',
          'url' => true,
          'title' => esc_html__('Logo in header', 'decorpi'), 
          'default' => ''
        ),  
         array(
          'id' => 'header_logo_mobile',
          'type' => 'media',
          'url' => true,
          'title' => esc_html__('Logo in header mobile', 'decorpi'),
          'default' => ''
        ), 
        
      ),
	) );

  //Footer
  Redux::setSection( $opt_name, array(
    'title' => esc_html__('Footer Options', 'decorpi'),
      'desc' => '',
      'icon' => 'el-icon-compass',
       // 'submenu' => false, 
      'fields' => array(
        array(
          'id' => 'footer_layout',
          'type' => 'select',
          'options' => decorpi_get_footer(),
          'default' => 'default-option-theme'
        ),
        array(
          'id' => 'copyright_text',
          'type' => 'editor',
          'title' => esc_html__('Footer Copyright Text', 'decorpi'),
          'desc' => '',
          'default' => "decorpi &middot; Built with love by <a href='https://themeforest.net/user/moniathemes/portfolio'>Moniathemes</a>."
        ),
      ),
  ) );
  
	
	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Styling', 'decorpi' ),
		'icon'		=> 'el-icon-pencil',
		'fields'	=> array(
			array(
				'id'	=> 'colors_info_styling',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . esc_html__( 'Colors', 'decorpi' ) . '</h3>'
			),
 
			array(
				'id'			=> 'main_color',
				'type'			=> 'color',
				'title'			=> esc_html__( 'Main Text Color', 'decorpi' ),
				'desc'			=> esc_html__( 'Used for the body text.', 'decorpi' ),
				'default'		=> '',
				'transparent'	=> false,
				'validate'		=> 'color'
			),

      array(
        'id'    => 'widget_color',
        'type'    => 'color',
        'title'   => esc_html__( 'Widget Title Color', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),
			array(
				'id'	=> 'info_background',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . esc_html__( 'Background', 'decorpi' ) . '</h3>'
			),
			array(
				'id'			=> 'main_background_color',
				'type'			=> 'color',
				'title'			=> esc_html__( 'Background Color', 'decorpi' ),
				'desc'			=> esc_html__( 'Used for the main site background.', 'decorpi' ),
				'default'		=> '',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'main_background_image',
				'type'	=> 'media', 
				'url'	=> true,
				'title'	=> esc_html__( 'Background Image', 'decorpi' ),
				'desc'	=> esc_html__( 'Upload a background image or specify a URL (boxed layout).', 'decorpi' )
			),
			array(
				'id'		=> 'main_background_image_type',
				'type'		=> 'select',
				'title'		=> esc_html__( 'Background Type', 'decorpi' ),
				'desc'		=> esc_html__( 'Select the background-image type (fixed image or repeat pattern/texture).', 'decorpi' ),
				'options'	=> array( 'fixed' => 'Fixed (Full)', 'repeat' => 'Repeat (Pattern)' ),
				'default'	=> 'fixed'
			),
			array(
				'id'	=> 'top_bar_info_styling',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . esc_html__( 'Top Bar', 'decorpi' ) . '</h3>'
			),
			array(
				'id'			=> 'top_bar_font_color',
				'type'			=> 'color',
				'title'			=> esc_html__( 'Font Color', 'decorpi' ),
				'desc'			=> esc_html__( 'Used for the top bar text.', 'decorpi' ),
				'default'		=> '',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'			=> 'top_bar_background_color',
				'type'			=> 'color',
				'title'			=> esc_html__( 'Background Color', 'decorpi' ),
				'desc'			=> esc_html__( 'Used for the top bar background.', 'decorpi' ),
				'default'		=> '',
				'transparent'	=> false,
				'validate'		=> 'color'
			),
			array(
				'id'	=> 'header_info_styling',
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . esc_html__( 'Header', 'decorpi' ) . '</h3>'
			),
			array(
				'id'		=> 'header_background_color',
				'type'		=> 'color',
				'title'		=> esc_html__( 'Background Color', 'decorpi' ),
				'default'	=> '',
				'validate'	=> 'color'
			),
      array(
        'id'    => 'header_font_color',
        'type'    => 'color',
        'title'   => esc_html__( 'Text Color', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),
      array(
        'id'    => 'header_font_color_link',
        'type'    => 'color',
        'title'   => esc_html__( 'Link Color', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),
       array(
        'id'    => 'header_font_color_link_hover',
        'type'    => 'color',
        'title'   => esc_html__( 'Color Hover Link', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),

       array(
        'id'  => 'menu_info_styling',
        'type'  => 'info',
        'raw' => '<h3 style="margin: 0;">' . esc_html__( 'Menu', 'decorpi' ) . '</h3>'
      ),
      array(
        'id'    => 'menu_background_color',
        'type'    => 'color',
        'title'   => esc_html__( 'Menu | Background Color', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),
      array(
        'id'    => 'menu_font_color',
        'type'    => 'color',
        'title'   => esc_html__( 'Menu | Menu Text Color', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),
      array(
        'id'    => 'menu_font_color_link',
        'type'    => 'color',
        'title'   => esc_html__( 'Menu | Menu Link Color', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),
       array(
        'id'    => 'menu_font_color_link_hover',
        'type'    => 'color',
        'title'   => esc_html__( 'Menu | Link Hover Color ', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),

       array(
        'id'    => 'menu_sub_background_color',
        'type'    => 'color',
        'title'   => esc_html__( 'Submenu | Background Color', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),
      array(
        'id'    => 'menu_sub_font_color',
        'type'    => 'color',
        'title'   => esc_html__( 'Submenu | Color Text', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),
      array(
        'id'    => 'menu_sub_font_color_link',
        'type'    => 'color',
        'title'   => esc_html__( 'Submenu | Link Color', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),
       array(
        'id'    => 'menu_sub_font_color_link_hover',
        'type'    => 'color',
        'title'   => esc_html__( 'Submenu | Link Hover Color', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),

       array(
        'id'  => 'main_content_info_styling',
        'type'  => 'info',
        'raw' => '<h3 style="margin: 0;">' . esc_html__( 'Main Content', 'decorpi' ) . '</h3>'
      ),
      array(
        'id'    => 'content_background_color',
        'type'    => 'color',
        'title'   => esc_html__( 'Background Color', 'decorpi' ),
        'desc'    => esc_html__( 'Used for the header background.', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),
      array(
        'id'    => 'content_font_color',
        'type'    => 'color',
        'title'   => esc_html__( 'Text Color', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),
      array(
        'id'    => 'content_font_color_link',
        'type'    => 'color',
        'title'   => esc_html__( 'Link Color', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),
       array(
        'id'    => 'content_font_color_link_hover',
        'type'    => 'color',
        'title'   => esc_html__( 'Link Hover Color', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),

       array(
        'id'  => 'footer_info_styling',
        'type'  => 'info',
        'raw' => '<h3 style="margin: 0;">' . esc_html__( 'Footer', 'decorpi' ) . '</h3>'
      ),
      array(
        'id'    => 'footer_background_color',
        'type'    => 'color',
        'title'   => esc_html__( 'Background Color', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),
      array(
        'id'    => 'footer_font_color',
        'type'    => 'color',
        'title'   => esc_html__( 'Text Color', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),
      array(
        'id'    => 'footer_font_color_title',
        'type'    => 'color',
        'title'   => esc_html__( 'Link Color Title', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),
      array(
        'id'    => 'footer_font_color_link',
        'type'    => 'color',
        'title'   => esc_html__( 'Link Color', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),
       array(
        'id'    => 'footer_font_color_link_hover',
        'type'    => 'color',
        'title'   => esc_html__( 'Link Hover Color', 'decorpi' ),
        'default' => '',
        'validate'  => 'color'
      ),
		)
	) );
	
	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Typography', 'decorpi' ),
		'icon'		=> 'el-icon-font',
		'fields'	=> array(
			// Main font
			array (
				'id'	=> 'main_font_info',
				'type'	=> 'info',
				'icon'	=> true,
				'raw'	=> '<h3 style="margin: 0;">' . esc_html__( 'Main Font', 'decorpi' ) . '</h3>',
			),
			array(
				'id'		=> 'main_font_source',
				'type'		=> 'radio',
				'title'		=> esc_html__( 'Font Source', 'decorpi' ),
				'options'	=> array(
          '0' => '(none)',
					'1'	=> 'Standard + Google Webfonts', 
				),
				'default'	=> '1'
			),
			// Main font: Standard + Google Webfonts
			array (
				'id'			=> 'main_font',
				'type'			=> 'typography',
				'title'			=> esc_html__( 'Font Face', 'decorpi' ),
				'line-height'	=> false,
				'text-align'	=> false,
				'font-style'	=> false,
				'font-weight'	=> false,
				'font-size'		=> false,
				'color'			=> false,
				'default'		=> array (
				'font-family'	=> 'Poppins',
				'subsets'		=> '',
				),
				'required'		=> array( 'main_font_source', '=', '1' )
			),
		
			// Secondary font
			array (
				'id'	=> 'secondary_font_info',
				'icon'	=> true,
				'type'	=> 'info',
				'raw'	=> '<h3 style="margin: 0;">' . esc_html__( 'Secondary Font', 'decorpi' ) . '</h3>',
			),
			array(
				'id'		=> 'secondary_font_source',
				'type'		=> 'radio',
				'title'		=> esc_html__('Font Source', 'decorpi'),
				'options'	=> array(
					'0' => '(none)',
					'1'	=> 'Standard + Google Webfonts', 
				),
				'default'	=> '0'
			),
			// Secondary font: Standard + Google Webfonts
			array (
				'id'			=> 'secondary_font',
				'type'			=> 'typography',
				'title'			=> esc_html__( 'Font Face', 'decorpi' ),
				'line-height'	=> false,
				'text-align'	=> false,
				'font-style'	=> false,
				'font-weight'	=> false,
				'font-size'		=> false,
				'color'			=> false,
				'default'		=> array (
					'font-family'	=> 'Poppins',
					'subsets'		=> '',
				),
				'required'		=> array( 'secondary_font_source', '=', '1' )
			),
		)
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Blog', 'decorpi' ),
		'icon'		=> 'el-icon-website',
		'fields'	=> array(
			array (
				'id'	=> 'blog_archive_info',
				'type'	=> 'info',
				'icon'	=> true,
				'raw'	=> '<h3 style="margin: 0;">' . esc_html__( 'Archive/Listing', 'decorpi' ) . '</h3>',
			),
			array(
				'id'		=> 'blog_categories_layout',
				'type'		=> 'select',
				'title'		=> esc_html__( 'Categories Layout', 'decorpi' ),
				'desc'		=> esc_html__( 'Select categories menu layout.', 'decorpi' ),
				'options'	=> array( 'list' => 'List', 'grid' => 'Grid' ),
				'default'	=> 'list'
			),

			array(
				'id'			=> 'blog_categories_columns',
				'type'			=> 'slider',
				'title'			=> esc_html__( 'Category Columns', 'decorpi' ),
				'desc'			=> esc_html__( 'Select the number of category columns to display.', 'decorpi' ),
				'default'		=> 4,
				'min'			=> 2,
				'max'			=> 5,
				'step'			=> 1,
				'display_value'	=> 'text',
				'required'	=> array( 'blog_categories_layout', '=', 'grid' )
			),

      array(
          'id' => 'archive_post_sidebar',
          'type' => 'select',
          'title' => esc_html__('Default Archive Page Blog Sidebar Config', 'decorpi'),
          'subtitle' => "Choose single post layout.",
          'options' => array(
             'no-sidebars'     => 'No Sidebars',
             'left-sidebar'    => 'Left Sidebar',
             'right-sidebar'      => 'Right Sidebar',
             'both-sidebars'      => 'Both Sidebars'
          ),
          'desc' => '',
          'default' => 'no-sidebars'
          ),
      array(
          'id' => 'archive_post_left_sidebar',
          'type' => 'select',
          'title' => esc_html__('Default Archive Page Blog Left Sidebar', 'decorpi'),
          'subtitle' => "Choose the default left sidebar for Single Post.",
          'data'      => 'sidebars',
          'desc' => '',
          'default' => 'blog_sidebar'
          ),
       array(
          'id' => 'archive_post_right_sidebar',
          'type' => 'select',
          'title' => esc_html__('Default Archive Page Blog Right Sidebar', 'decorpi'),
          'subtitle' => "Choose the default right sidebar for Single Post.",
          'data'      => 'sidebars',
          'desc' => '',
          'default' => 'blog_sidebar'
          ),

			array (
        'id'    => 'blog_excerpt_limit',
        'type'    => 'text',
        'title'   => esc_html__( 'Blog Excerpt Limit', 'decorpi' ),
        'default' => '30',
      ),
			
			array (
				'id'	=> 'blog_single_post_info',
				'type'	=> 'info',
				'icon'	=> true,
				'raw'	=> '<h3 style="margin: 0;">' . esc_html__( 'Single Post', 'decorpi' ) . '</h3>',
			),
			
      array(
          'id' => 'single_post_sidebar',
          'type' => 'select',
          'title' => esc_html__('Default Single Sidebar Config', 'decorpi'),
          'subtitle' => "Choose single post layout.",
          'options' => array(
             'no-sidebars'     => 'No Sidebars',
             'left-sidebar'    => 'Left Sidebar',
             'right-sidebar'      => 'Right Sidebar',
             'both-sidebars'      => 'Both Sidebars'
          ),
          'desc' => '',
          'default' => 'no-sidebars'
          ),
      array(
          'id' => 'single_post_left_sidebar',
          'type' => 'select',
          'title' => esc_html__('Default Single Left Sidebar', 'decorpi'),
          'subtitle' => "Choose the default left sidebar for Single Post.",
          'data'      => 'sidebars',
          'desc' => '',
          'default' => 'blog_sidebar'
          ),
       array(
          'id' => 'single_post_right_sidebar',
          'type' => 'select',
          'title' => esc_html__('Default Single Right Sidebar', 'decorpi'),
          'subtitle' => "Choose the default right sidebar for Single Post.",
          'data'      => 'sidebars',
          'desc' => '',
          'default' => 'blog_sidebar'
      ),

		)
	) );
	

   Redux::setSection($opt_name, array(
      'icon' => 'el-icon-th-list',
      'title' => esc_html__('Page Meta Options', 'decorpi'),
      'fields' => array(
         array(
            'id' => 'default_show_page_heading',
            'type' => 'button_set',
            'title' => esc_html__('Default Show Page Heading', 'decorpi'),
            'subtitle' => esc_html__('Choose the default state for the page heading, shown/hidden.', 'decorpi'),
            'desc' => '',
            'options' => array('1' => 'On','0' => 'Off'),
            'default' => '1'
            ),
         array(
            'id' => 'default_sidebar_config',
            'type' => 'select',
            'title' => esc_html__('Default Page Sidebar Config', 'decorpi'),
            'subtitle' => "Choose the default sidebar config for pages",
            'options' => array(
               'no-sidebars'     => 'No Sidebars',
               'left-sidebar'    => 'Left Sidebar',
               'right-sidebar'      => 'Right Sidebar',
               'both-sidebars'      => 'Both Sidebars'
            ),
            'desc' => '',
            'default' => 'no-sidebars'
            ),
         array(
            'id' => 'default_left_sidebar',
            'type' => 'select',
            'title' => esc_html__('Default Page Left Sidebar', 'decorpi'),
            'subtitle' => "Choose the default left sidebar for pages",
            'data'      => 'sidebars',
            'desc' => '',
            'default' => 'sidebar-1'
            ),
         array(
            'id' => 'default_right_sidebar',
            'type' => 'select',
            'title' => esc_html__('Default Page Right Sidebar', 'decorpi'),
            'subtitle' => "Choose the default right sidebar for pages",
            'data'      => 'sidebars',
            'desc' => '',
            'default' => 'sidebar-1'
            ),
      ),
   ));   

	Redux::setSection( $opt_name, array(
      'icon' => 'el-icon-shopping-cart',
      'title' => esc_html__('WooCommerce Options', 'decorpi'),
      'fields' => array(
         array(
             'id'        => 'products_per_page',
             'type'      => 'text',
             'title'     => esc_html__('Products Per Page', 'decorpi'),
             'subtitle'  => esc_html__('Number value.', 'decorpi'),
             'desc'      => esc_html__('The amount of products you would like to show per page on shop/category pages.', 'decorpi'),
             'validate'  => 'numeric',
             'default'   => '24',
         ),       
      ),
   ));

   Redux::setSection( $opt_name, array(
      'icon' => 'el-icon-shopping-cart',
      'title' => esc_html__('Shop Options', 'decorpi'),
      'subsection' => true,
      'fields' => array(
         array(
            'id' => 'product_display_layout',
               'type' => 'select',
               'title' => esc_html__('Default Product Display Layout', 'decorpi'),
               'subtitle' => "Choose the default product display layout for WooCommerce shop/category pages.",
               'options' => array(
                  'grid'      => 'Grid',
                  'list'   => 'List',
               ),
               'desc' => '',
               'default' => 'standard'
            ),

         array(
            'id' => 'product_display_columns',
            'type' => 'select',
            'title' => esc_html__('Product Display Columns', 'decorpi'),
            'subtitle' => "Choose the number of columns to display on shop/category pages.",
            'options' => array(
               '1'      => '1',
               '2'      => '2',
               '3'      => '3',
               '4'      => '4',
               '5'      => '5',
               '6'      => '6',
            ),
            'desc' => '',
            'default' => '4'
          ),
         array(
            'id' => 'shop_filter_hidden',
            'type' => 'select',
            'title' => esc_html__('Style display area filter', 'decorpi'),
            'subtitle' => esc_html__('Choose style display area filter for shop, category...', 'decorpi'),
            'options' => array('off' => 'Hidden', 'fullwidth' => 'Full width'),
            'default' => 'off'
          ),

         array(
            'id' => 'woo_sidebar_config',
            'type' => 'select',
            'title' => esc_html__('WooCommerce Sidebar Config', 'decorpi'),
            'subtitle' => "Choose the sidebar config for WooCommerce shop/category pages.",
            'options' => array(
               'no-sidebars'     => 'No Sidebars',
               'left-sidebar'    => 'Left Sidebar',
               'right-sidebar'      => 'Right Sidebar',
               'both-sidebars'      => 'Both Sidebars'
            ),
            'desc' => '',
            'default' => 'no-sidebars'
            ),
         array(
            'id' => 'woo_left_sidebar',
            'type' => 'select',
            'title' => esc_html__('WooCommerce Left Sidebar', 'decorpi'),
            'subtitle' => "Choose the left sidebar for WooCommerce shop/category pages.",
            'data'      => 'sidebars',
            'desc' => '',
            'default' => 'woocommerce_sidebar'
            ),
         array(
            'id' => 'woo_right_sidebar',
            'type' => 'select',
            'title' => esc_html__('WooCommerce Right Sidebar', 'decorpi'),
            'subtitle' => "Choose the right sidebar for WooCommerce shop/category pages.",
            'data'      => 'sidebars',
            'desc' => '',
            'default' => 'woocommerce_sidebar'
            ),
         array(
            'id' => 'woo_shop_divide_0',
            'type' => 'divide'
            ),
        
          array(
            'id' => 'woo_show_page_heading',
            'type' => 'button_set',
            'title' => esc_html__('Shop Category / Page Heading', 'decorpi'),
            'subtitle' => esc_html__('Show page title on shop/category WooCommerce page.', 'decorpi'),
            'desc' => '',
            'options' => array('1' => 'On', '0' => 'Off'),
            'default' => '1'
          ),

         array(
            'id' => 'woo_page_heading_style',
            'type' => 'select',
            'title' => esc_html__('WooCommerce Page Heading Style', 'decorpi'),
            'subtitle' => "Choose the page heading style for the shop/category WooCommerce pages.",
            'options' => array(
              'standard'           => esc_html__('Standard', 'decorpi'),
              'hero'               => esc_html__('Hero', 'decorpi'),
              'background'         => esc_html__('Background', 'decorpi'),
            ),
            'desc' => '',
            'default' => 'standard'
          ),
         array(
            'id' => 'woo_page_heading_text_align',
            'type' => 'select',
            'title' => esc_html__('WooCommerce Page Heading Text Align', 'decorpi'),
            'subtitle' => "Choose the page heading align for the shop/category WooCommerce pages (Standard/Fancy only).",
            'options' => array(
               'text-left'       => 'Left',
               'text-center'     => 'Center',
               'text-right'      => 'Right'
               ),
            'desc' => '',
            'default' => 'text-center',
            'required'  => array( 'woo_page_heading_style', '=', 'hero' )
          ),

         array(
            'id' => 'woo_page_heading_background_color',
            'type' => 'color',
            'title' => esc_html__('Hero Heading Overlay Color', 'decorpi'),
            'desc' => '',
            'default' => '',
            'required'  => array( 'woo_page_heading_style', '=', 'hero' )
          ),

         array(
          'id'     => 'woo_page_heading_bg_opacity_title',
          'type'      => 'slider',
          'title'     => esc_html__( 'Overlay Opacity', 'decorpi' ),
          'default'   => 50,
          'min'     => 1,
          'max'     => 100,
          'step'      => 1,
          'display_value' => 'text',
          'required'  => array( 'woo_page_heading_style', '=', 'hero' )
          ),

         array(
            'id' => 'woo_page_heading_image',
            'type' => 'media',
            'title' => esc_html__('WooCommerce Hero Heading Background Image', 'decorpi'),
            'subtitle' => esc_html__('Upload the hero heading background image for WooCommerce page heading (Hero Heading Only).', 'decorpi'),
            'desc' => '',
            'required'  => array( 'woo_page_heading_style', '=', 'hero' )
            ),

         array(
            'id' => 'woo_page_heading_text_style',
            'type' => 'select',
            'title' => esc_html__('WooCommerce Hero Heading Text Style', 'decorpi'),
            'subtitle' => "Choose the text style for the WooCommerce page heading (Hero Heading Only).",
            'options' => array(
               'text-light'     => esc_html__('Light', 'decorpi'),
               'text-dark'      => esc_html__('Dark', 'decorpi')
               ),
            'desc' => '',
            'default' => 'text-light',
            'required'  => array( 'woo_page_heading_style', '=', 'hero' )
         ),
      ),
   ));

   Redux::setSection( $opt_name, array(
      'icon' => 'el-icon-shopping-cart',
      'title' => esc_html__('Product Options', 'decorpi'),
      'subsection' => true,
      'fields' => array(
        array(
          'id' => 'product_sidebar_config',
          'type' => 'select',
          'title' => esc_html__('Default Product Sidebar Config', 'decorpi'),
          'subtitle' => "Choose the sidebar config for WooCommerce shop/category pages.",
          'options' => array(
            'no-sidebars'     => 'No Sidebars',
            'left-sidebar'    => 'Left Sidebar',
            'right-sidebar'      => 'Right Sidebar',
            'both-sidebars'      => 'Both Sidebars'
          ),
          'desc' => '',
          'default' => 'no-sidebars'
        ),
        array(
          'id' => 'product_left_sidebar',
          'type' => 'select',
          'title' => esc_html__('Default Product Left Sidebar', 'decorpi'),
          'subtitle' => "Choose the default left sidebar for WooCommerce product pages.",
          'data'      => 'sidebars',
          'desc' => '',
          'default' => 'woocommerce-sidebar'
        ),
        array(
          'id' => 'product_right_sidebar',
          'type' => 'select',
          'title' => esc_html__('Default Product Right Sidebar', 'decorpi'),
          'subtitle' => "Choose the default right sidebar for WooCommerce product pages.",
          'data'      => 'sidebars',
          'desc' => '',
          'default' => 'woocommerce-sidebar'
        ),

        array(
          'id' => 'woo_product_divide_0',
          'type' => 'divide'
        ),

        array(
          'id' => 'product_sharing_facebook',
          'type' => 'button_set',
          'title' => esc_html__('Share Facebook', 'decorpi'),
          'subtitle' => esc_html__('Enable share facebook for single product.', 'decorpi'),
          'desc' => '',
          'options' => array('0' => 'Disabled','1' => 'Enabled'),
          'default' => '1'
        ),
        array(
          'id' => 'product_sharing_twitter',
          'type' => 'button_set',
          'title' => esc_html__('Share Twitter', 'decorpi'),
          'subtitle' => esc_html__('Enable share twitter for single product.', 'decorpi'),
          'desc' => '',
          'options' => array('0' => 'Disabled','1' => 'Enabled'),
          'default' => '1'
        ),
        array(
          'id' => 'product_sharing_linkedin',
          'type' => 'button_set',
          'title' => esc_html__('Share Linkedin', 'decorpi'),
          'subtitle' => esc_html__('Enable share linkedin for single product.', 'decorpi'),
          'desc' => '',
          'options' => array('0' => 'Disabled','1' => 'Enabled'),
          'default' => '1'
        ),
        array(
          'id' => 'product_sharing_tumblr',
          'type' => 'button_set',
          'title' => esc_html__('Share Tumblr', 'decorpi'),
          'subtitle' => esc_html__('Enable share tumblr for single product.', 'decorpi'),
          'desc' => '',
          'options' => array('0' => 'Disabled','1' => 'Enabled'),
          'default' => '1'
        ),
        array(
          'id' => 'product_sharing_google',
          'type' => 'button_set',
          'title' => esc_html__('Share Google', 'decorpi'),
          'subtitle' => esc_html__('Enable share google for single product.', 'decorpi'),
          'desc' => '',
          'options' => array('0' => 'Disabled','1' => 'Enabled'),
          'default' => '1'
        ),
        array(
          'id' => 'product_sharing_pinterest',
          'type' => 'button_set',
          'title' => esc_html__('Share Pinterest', 'decorpi'),
          'subtitle' => esc_html__('Enable share pinterest for single product.', 'decorpi'),
          'desc' => '',
          'options' => array('0' => 'Disabled','1' => 'Enabled'),
          'default' => '1'
        ),
        array(
          'id' => 'product_sharing_email',
          'type' => 'button_set',
          'title' => esc_html__('Share Email', 'decorpi'),
          'subtitle' => esc_html__('Enable share email for single product.', 'decorpi'),
          'desc' => '',
          'options' => array('0' => 'Disabled','1' => 'Enabled'),
          'default' => '1'
        ),
        array(
          'id' => 'upsell_heading_text',
          'type' => 'text',
          'title' => esc_html__('Upsell Heading Text', 'decorpi'),
          'subtitle' => "Heading text for the upsell products on the product page.",
          'desc' => '',
          'default' => 'Complete the look'
        ),
        array(
          'id' => 'related_heading_text',
          'type' => 'text',
          'title' => esc_html__('Related Heading Text', 'decorpi'),
          'subtitle' => "Heading text for the related products on the product page.",
          'desc' => '',
          'default' => 'Related products'
          ),
        ),
   ));
	
	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Social Profiles', 'decorpi' ),
		'icon'		=> 'el-icon-share',
		'fields'	=> array(
			array(
				'id'		=> 'social_facebook',
				'type' 		=> 'text',
				'title' 	=> esc_html__( 'Facebook', 'decorpi' ),
				'desc'		=> esc_html__( 'Enter your Facebook profile URL.', 'decorpi' ),
				'default'	=> ''
			),
			array(
				'id'		=> 'social_instagram',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Instagram', 'decorpi' ),
				'desc'		=> esc_html__( 'Enter your Instagram profile URL.', 'decorpi' ),
				'default'	=> ''
			),
			array(
				'id'		=> 'social_twitter',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Twitter', 'decorpi' ),
				'desc'		=> esc_html__( 'Enter your Twitter profile URL.', 'decorpi' ),
				'default'	=> ''
			),
			array(
				'id'		=> 'social_googleplus',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Google+', 'decorpi' ),
				'desc'		=> esc_html__( 'Enter your Google+ profile URL.', 'decorpi' ),
				'default'	=> ''
			),
			array(
				'id'		=> 'social_linkedin',
				'type'		=> 'text',
				'title'		=> esc_html__( 'LinedIn', 'decorpi' ),
				'desc'		=> esc_html__( 'Enter your LinkedIn profile URL.', 'decorpi' ),
				'default'	=> ''
			),
			array(
				'id'		=> 'social_pinterest',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Pinterest', 'decorpi' ),
				'desc'		=> esc_html__( 'Enter your Pinterest profile URL.', 'decorpi' ),
				'default'	=> ''
			),
			array(
				'id'		=> 'social_rss',
				'type'		=> 'text',
				'title'		=> esc_html__( 'RSS', 'decorpi' ),
				'desc'		=> esc_html__( 'Enter your RSS feed URL.', 'decorpi' ),
				'default'	=> ''
			),
			array(
				'id'		=> 'social_tumblr',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Tumblr', 'decorpi' ),
				'desc'		=> esc_html__( 'Enter your Tumblr profile URL.', 'decorpi' ),
				'default'	=> ''
			),
			array(
				'id'		=> 'social_vimeo',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Vimeo', 'decorpi' ),
				'desc'		=> esc_html__( 'Enter your Vimeo profile URL.', 'decorpi' ),
				'default'	=> ''
			),
			array(
				'id'		=> 'social_youtube',
				'type'		=> 'text',
				'title'		=> esc_html__( 'YouTube', 'decorpi' ),
				'desc'		=> esc_html__( 'Enter your YouTube profile URL.', 'decorpi' ),
				'default'	=> ''
			)
		)
	) );
	
	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Custom Code', 'decorpi' ),
		'icon'		=> 'el-icon-lines',
		'fields'	=> array(
			array(
				'id'		=> 'custom_css',
				'type'		=> 'ace_editor',
				'title'		=> esc_html__( 'Custom CSS', 'decorpi' ),
				'desc'		=> esc_html__( "Add custom CSS to the head/top of your site.", 'decorpi' ),
				'mode'		=> 'css',
				'theme'		=> 'monokai',
				'default'	=> ''
			)
		)
	) );