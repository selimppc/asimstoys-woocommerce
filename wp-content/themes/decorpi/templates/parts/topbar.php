<div class="topbar hidden-sm hidden-xs">
   <div class="container">
      <div class="content-inner">
        <div class="left pull-left">
          <ul class="socials">
            <?php if(decorpi_get_option('social_facebook', '')){ ?>
              <li><a href="<?php echo esc_url(decorpi_get_option('social_facebook', '')); ?>"><i class="mn-icon-1405"></i></a></li>
            <?php } ?> 

            <?php if(decorpi_get_option('social_instagram', '')){ ?>
              <li><a href="<?php echo esc_url(decorpi_get_option('social_instagram', '')); ?>"><i class="mn-icon-1411"></i></a></li>
            <?php } ?>  

            <?php if(decorpi_get_option('social_twitter', '')){ ?>
              <li><a href="<?php echo esc_url(decorpi_get_option('social_twitter', '')); ?>"><i class="mn-icon-1406"></i></a></li>
            <?php } ?>  

            <?php if(decorpi_get_option('social_googleplus', '')){ ?>
              <li><a href="<?php echo esc_url(decorpi_get_option('social_googleplus', '')); ?>"><i class="mn-icon-1409"></i></a></li>
            <?php } ?>  

            <?php if(decorpi_get_option('social_linkedin', '')){ ?>
              <li><a href="<?php echo esc_url(decorpi_get_option('social_linkedin', '')); ?>"><i class="mn-icon-1408"></i></a></li>
            <?php } ?> 

            <?php if(decorpi_get_option('social_pinterest', '')){ ?>
              <li><a href="<?php echo esc_url(decorpi_get_option('social_pinterest', '')); ?>"><i class=" mn-icon-1416"></i></a></li>
            <?php } ?> 
            
            <?php if(decorpi_get_option('social_rss', '')){ ?>
              <li><a href="<?php echo esc_url(decorpi_get_option('social_rss', '')); ?>"><i class="fa fa-rss"></i></a></li>
            <?php } ?>

            <?php if(decorpi_get_option('social_tumblr', '')){ ?>
              <li><a href="<?php echo esc_url(decorpi_get_option('social_tumblr', '')); ?>"><i class="mn-icon-1417"></i></a></li>
            <?php } ?>

            <?php if(decorpi_get_option('social_vimeo', '')){ ?>
              <li><a href="<?php echo esc_url(decorpi_get_option('social_vimeo', '')); ?>"><i class="mn-icon-1446"></i></a></li>
            <?php } ?>

             <?php if(decorpi_get_option('social_youtube', '')){ ?>
              <li><a href="<?php echo esc_url(decorpi_get_option('social_youtube', '')); ?>"><i class="mn-icon-1407"></i></a></li>
            <?php } ?>
          </ul>
<!-- 
              <div class="left-header">
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
              </div> -->
        </div>  

         <div class="right pull-right">
            <div class="topbar-meta">
              <?php if(class_exists('YITH_WCWL')) { ?>
                <?php
                  $wishlist_page_id = get_option( 'yith_wcwl_wishlist_page_id' );
                  if( function_exists( 'icl_object_id' ) ){
                    $wishlist_page_id = icl_object_id( $wishlist_page_id, 'page', true );
                  }
                  $wishlist_page = get_permalink( $wishlist_page_id );
                  
                  $count = yith_wcwl_count_products();
                ?>

                <a title="<?php esc_html_e('Wishlist', 'decorpi'); ?>" href="<?php echo esc_url($wishlist_page); ?>">
                  <?php esc_html_e('Wishlist','decorpi'); ?><?php echo '('.($count > 0 ? zeroise($count, 2):'0').')'; ?>
                </a>
              <?php } ?> 

              <?php if ( is_user_logged_in() ) { ?>
                <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php esc_html_e('My Account','decorpi'); ?>"><?php esc_html_e('My Account','decorpi'); ?></a>
              <?php }else { ?>
                <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php esc_html_e('Login / Register','decorpi'); ?>"><?php esc_html_e('Login / Register','decorpi'); ?></a>
             <?php } ?>

             <!-- <div class="main-search gva-search">
                  <a><i class="mn-icon-52"></i></a>
                </div>  -->
                
             <?php if(decorpi_woocommerce_activated()){ ?>
                  <div class="mini-cart-header cart-v1 skin-black">
                    <?php  decorpi_get_cart_contents(); ?>
                  </div> 
                <?php } ?> 
                
            </div>
            <div class="right-header">
                 
              </div> 
         </div>   
      </div>   
   </div>   
</div>