<?php
/* SIDEBAR CONFIG OUTPUT
================================================== */
if ( ! function_exists( 'decorpi_base_sidebar' ) ) {
     function decorpi_base_sidebar() {
        // VARIABLES
        global $post;

        // DEFAULT SIDEBAR CONFIG
        $default_sidebar_config = decorpi_get_option('default_sidebar_config', ''); 
        $default_left_sidebar   = decorpi_get_option('default_left_sidebar', ''); 
        $default_right_sidebar  = decorpi_get_option('default_right_sidebar', '');
        $sidebar_config         = $left_sidebar = $right_sidebar = "";

        // ARCHIVE / CATEGORY SIDEBAR CONFIG
        if ( is_search() || is_archive() || is_author() || is_category() || is_home() ) {
          $default_sidebar_config = decorpi_get_option('archive_sidebar_config', ''); 
          $default_left_sidebar   = decorpi_get_option('archive_sidebar_left', '');
          $default_right_sidebar  = decorpi_get_option('archive_sidebar_right', ''); 
        }

         // DIRECTORY ARCHIVE
        if ( is_post_type_archive( 'directory' ) ) {
          $sidebar_config = "no-sidebars";
        }

        // CURRENT POST/PAGE SIDEBAR CONFIG

        if ( $post && is_singular() ) {
          $sidebar_config = get_post_meta( $post->ID, 'decorpi_sidebar_config', true );
          $left_sidebar   = get_post_meta( $post->ID, 'decorpi_left_sidebar', true );
          $right_sidebar  = get_post_meta( $post->ID, 'decorpi_right_sidebar', true );
        }

         // DEFAULTS
        if ( $sidebar_config == "" ) {
             $sidebar_config = $default_sidebar_config;
        }
        if ( $left_sidebar == "" ) {
             $left_sidebar = $default_left_sidebar;
        }
        if ( $right_sidebar == "" ) {
             $right_sidebar = $default_right_sidebar;
        }

         // PAGE WRAP CLASS
         $page_wrap_class = '';
         if ( $sidebar_config == "left-sidebar" ) {
             $page_wrap_class = 'has-sidebar has-left-sidebar has-one-sidebar row';
         } else if ( $sidebar_config == "right-sidebar" ) {
             $page_wrap_class = 'has-sidebar has-right-sidebar has-one-sidebar row';
         } else if ( $sidebar_config == "both-sidebars" ) {
             $page_wrap_class = 'has-sidebar has-both-sidebars row';
         } else {
             $page_wrap_class = 'has-no-sidebar';
         }

         if ( is_singular( 'post' ) || is_singular( 'portfolio' ) || is_singular( 'team' ) ) {
             $sidebar_config = "no-sidebar";
         }

         // RETURN
         $sidebar_var                    = array();
         $sidebar_var['config']          = $sidebar_config;
         $sidebar_var['left']            = $left_sidebar;
         $sidebar_var['right']           = $right_sidebar;
         $sidebar_var['page_wrap_class'] = $page_wrap_class;
         return $sidebar_var;
     }
 }

function decorpi_sidebar_global($sidebar_layout_config, $sidebar_left_config, $sidebar_right_config){

   $left_sidebar          = array('active' => false);
   $right_sidebar         = array('active' => false);
   $main_content          = array('class' => 'col-lg-12 col-xs-12');
  
   if ( $sidebar_layout_config == "left-sidebar" ) {
      $left_sidebar = array('name'=>$sidebar_left_config, 'active'=>true, 'class' => 'col-lg-3 col-md-3 col-xs-12 pull-left');
      $main_content = array('class'=>'col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-right');
   }else if($sidebar_layout_config == "right-sidebar"){
      $right_sidebar = array('name'=>$sidebar_right_config, 'active'=>true, 'class' => 'col-lg-3 col-md-3 col-xs-12 pull-right');
      $main_content = array('class'=>'col-lg-9 col-md-9 col-sm-12 col-xs-12');
   }else if($sidebar_layout_config == "both-sidebars"){
      $right_sidebar = array('name'=>$sidebar_right_config, 'active'=>true, 'class' => 'col-lg-3 col-md-3 col-xs-12 pull-right');
      $left_sidebar = array('name'=>$sidebar_left_config, 'active'=>true, 'class' => 'col-lg-3 col-md-3 col-xs-12 pull-left col-lg-pull-6 col-md-pull-6');
      $main_content = array('class'=>'col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-push-3 col-md-push-3');
   }else{
      $main_content = array('class'=>'col-lg-12 col-md-12 col-sm-12 col-xs-12');
   }
  return array(
    'left_sidebar_config'  => $left_sidebar,
    'right_sidebar_config' => $right_sidebar,
    'main_content_config'  => $main_content 
  );
}

function decorpi_base_layout($template){
  $post_id = decorpi_id();
  $sidebar_var           = decorpi_base_sidebar();
  //$sidebar_config        = $sidebar_var['config'];
  $left_sidebar          = array('active' => false);
  $right_sidebar         = array('active' => false);
  $main_content          = array('class' => 'col-lg-12 col-xs-12');
  $page_wrap_class       = $sidebar_var['page_wrap_class'];
   
  $sidebar_config = decorpi_sidebar_global($sidebar_var['config'], $sidebar_var['left'], $sidebar_var['right']);
  extract($sidebar_config);
  
  $page_title_style = get_post_meta($post_id, 'decorpi_page_title_style', true );
  $page_full_width = get_post_meta($post_id, 'decorpi_page_full_width', true);
  if(empty($page_title_style)){
    $page_title_style = 'standard';
  }
  ?>

  <div id="wp-main-content" class="clearfix main-page title-layout-<?php echo esc_attr($page_title_style); ?>">
  <?php do_action( 'decorpi_before_page_content' ); ?>
    <div class="<?php echo ($page_full_width ? 'container-full' : 'container'); ?>">
    <div class="content-page-wrap">
      <?php do_action( 'decorpi_before_main_content' ); ?>
       <div class="main-page-content base-layout row <?php echo esc_attr($page_wrap_class); ?>">
          
            <div class="content-page <?php echo esc_attr($main_content_config['class']); ?>">
              <div class="content-page-inner">   
                  <?php decorpi_get_template($template) ?>
              </div>    
            </div>      

            <!-- Left sidebar -->
            <?php if($left_sidebar_config['active']): ?>
            <div class="sidebar wp-sidebar sidebar-left <?php echo esc_attr($left_sidebar_config['class']); ?>">
               <?php do_action( 'decorpi_before_sidebar' ); ?>
               <div class="sidebar-inner">
                  <?php dynamic_sidebar($left_sidebar_config['name'] ); ?>
               </div>
               <?php do_action( 'decorpi_after_sidebar' ); ?>
            </div>
            <?php endif ?>

            <!-- Right Sidebar -->
            <?php if($right_sidebar_config['active']): ?>
            <div class="sidebar wp-sidebar sidebar-right <?php echo esc_attr($right_sidebar_config['class']); ?>">
               <?php do_action( 'decorpi_before_sidebar' ); ?>
                  <div class="sidebar-inner">
                     <?php dynamic_sidebar($right_sidebar_config['name'] ); ?>
                  </div>
               <?php do_action( 'decorpi_after_sidebar' ); ?>
            </div>
         <?php endif ?>

        </div> 
        <?php do_action( 'decorpi_after_main_content' ); ?>
      </div>
    </div>
    <?php do_action( 'decorpi_after_page_content' ); ?> 
  </div>    
     <?php
}

if ( ! function_exists( 'decorpi_get_template' ) ) {
    function decorpi_get_template( $template ) {
        get_template_part( 'templates/layout/' . $template);
    }
}