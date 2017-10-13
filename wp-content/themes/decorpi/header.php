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
$decorpi_options = decorpi_get_options();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta http-equiv="content-type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">

  <meta name="apple-touch-fullscreen" content="yes"/>
  <meta name="MobileOptimized" content="320"/>
  <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php wp_head(); ?>

</head>

<body <?php body_class() ?>>
  <div class="wrapper-page"> <!--page-->
    <header class="header-default">
      <?php do_action( 'decorpi_before_header' );  ?>
      
      <?php get_template_part('templates/parts/topbar'); ?>
      
      <div class="header-main hidden-xs hidden-sm">
        <div class="header-inner sticky-second clearfix">
        <div class="normal prelative <?php echo decorpi_get_option('stick_menu', '') ?>">
          <div class="inner-top">
            <div class="container">

              <div class="row">
                <div class="col-md-5 col-md-4 col-sm-12 left-header">
                  <?php if(decorpi_get_option('phone_header', '')){ ?>
                    <div class="header-meta item">
                      <i class="mn-icon-250"></i><?php echo esc_html(decorpi_get_option('phone_header', '')); ?>
                    </div>
                  <?php } ?> 

                  <?php if(decorpi_get_option('email_header', '')){ ?>
                    <div class="header-meta item">
                      <i class="mn-icon-220"></i><?php echo esc_html(decorpi_get_option('email_header', '')); ?>
                    </div>
                  <?php } ?>
                </div>
                <div class="logo col-lg-2 col-md-2 col-sm-12 text-center">
                 <a class="logo-theme" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo ((isset($decorpi_options['header_logo']['url']) && $decorpi_options['header_logo']['url']) ? $decorpi_options['header_logo']['url'] : get_template_directory_uri().'/images/logo.png'); ?>" alt="<?php bloginfo( 'name' ); ?>" />
                  </a>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 right-header">
                    <div class="main-search gva-search">
                      <a><i class="mn-icon-52"></i></a>
                    </div>  
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="main-menu-wrapper">
                    <div class="pstatic">
                       <?php do_action('decorpi_main_menu'); ?>
                    </div> 
              </div> 
            </div>
          </div>
          </div>
        </div> 
      </div> 
    <?php do_action( 'decorpi_after_header' );  ?>
    </header>
    
    <div id="page-content"> <!--page content-->
      <div class="gva-search-content search-content">
        <a class="close-search"><i class="mn-icon-04"></i></a>
        <div class="search-content-inner">
          <div class="content-inner">
            <?php decorpi_categories_searchform(); ?>
          </div>  
        </div>  
      </div>