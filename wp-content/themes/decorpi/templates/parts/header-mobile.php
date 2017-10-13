<?php $decorpi_options = decorpi_get_options(); ?>

<div class="gv-sticky-mobile header-mobile hidden-lg hidden-md">
  <div class="container">
    <div class="row"> 
     
      

      <div class="center text-center col-xs-4">
        <div class="logo-menu">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo ((isset($decorpi_options['header_logo_mobile']['url']) && $decorpi_options['header_logo_mobile']['url']) ? $decorpi_options['header_logo_mobile']['url'] : get_template_directory_uri().'/images/logo.png'); ?>" alt="<?php bloginfo( 'name' ); ?>" />
          </a>
        </div>
      </div>
    

        <div class="right col-xs-6">
          <?php if(decorpi_woocommerce_activated()){ ?>
            <div class="mini-cart-header">
              <?php if(decorpi_woocommerce_activated()){ ?>
                <?php  decorpi_get_cart_contents(); ?>
              <?php } ?>  
            </div>
          <?php } ?>
          <div class="main-search gva-search">
            <a><i class="mn-icon-52"></i></a>
          </div>
        </div> 
         <div class="left col-xs-2">
         <?php get_template_part('templates/parts/canvas-mobile'); ?>
      </div>
    </div>  
  </div>  
</div>