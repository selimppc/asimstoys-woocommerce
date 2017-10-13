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
    get_header(apply_filters('decorpi_get_header_layout', null )); 

    $page_id = decorpi_id();
    $page_title_style = 'standard';
    $page_title_style = get_post_meta($page_id, 'decorpi_page_title_style', true );

    $default_sidebar_config = decorpi_get_option('single_post_sidebar', 'right-sidebar'); 
    $default_left_sidebar = decorpi_get_option('single_post_left_sidebar', 'default_sidebar');
    $default_right_sidebar = decorpi_get_option('single_post_right_sidebar', 'default_sidebar');

    $sidebar_layout_config = get_post_meta($page_id, 'decorpi_sidebar_config', true);
    $left_sidebar = get_post_meta($page_id, 'decorpi_left_sidebar', true);
    $right_sidebar = get_post_meta($page_id, 'decorpi_right_sidebar', true);

    if ($sidebar_layout_config == "") {
        $sidebar_layout_config = $default_sidebar_config;
    }
    if ($left_sidebar == "") {
        $left_sidebar = $default_left_sidebar;
    }
    if ($right_sidebar == "") {
        $right_sidebar = $default_right_sidebar;
    }

   $left_sidebar_config  = array('active' => false);
   $right_sidebar_config = array('active' => false);
   $main_content_config  = array('class' => 'col-lg-12 col-xs-12');

    $sidebar_config = decorpi_sidebar_global($sidebar_layout_config, $left_sidebar, $right_sidebar);
   
    extract($sidebar_config);

 ?>

<section id="wp-main-content" class="clearfix main-page title-layout-<?php echo esc_attr($page_title_style); ?>">
    <?php do_action( 'decorpi_before_page_content' ); ?>
    
   <div class="container">  
    <div class="main-page-content row">
         <div class="content-page <?php echo esc_attr($main_content_config['class']); ?>">      
            <div id="wp-content" class="wp-content clearfix">
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', get_post_format() ); ?>

                <?php endwhile; // end of the loop. ?>

                <?php 
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                ?>

                <?php decorpi_post_nav(); ?>
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
    </div>
    <?php do_action( 'decorpi_after_page_content' ); ?>
</section>

<?php get_footer(); ?>
