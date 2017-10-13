<?php global $product; $time_sale = get_post_meta( $product->get_id(), '_sale_price_dates_to', true ); ?>
<div class="item-product-deals clearfix">
    <div class="product-block">
        <div class="product-block-inner">
             <figure class="product-thumbnail image text-center">
                 <?php echo trim($product->get_image('shop_catalog')); ?>
                

                 <div class="shop-loop-actions ">   
                          <?php
                                /**
                                 * woocommerce_after_shop_loop_item hook
                                 *
                                 * @hooked woocommerce_template_loop_add_to_cart - 10
                                 */
                                do_action( 'woocommerce_after_shop_loop_item' );
                              ?>

                        <?php
                            if( class_exists( 'YITH_WCWL' ) ) {
                                echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
                            }
                        ?>   
                        <div class="quickview">
                            <a href="javascript:void(0);" data-product_id="<?php echo esc_attr( $product->get_id() ) ?>" class="btn-quickview"><span class="mn-icon-41"></span></a>
                        </div>
                    </div>
             </figure>
            <div class="product-meta">
        
              <h3 class="shop-loop-title"><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h3>
              
                    <div class="shop-loop-description">
                       <?php woocommerce_template_single_excerpt() ?>
                    </div>

              <div class="shop-loop-after-title"> 

                    <div class="shop-loop-price">
                  <?php woocommerce_template_loop_price(); ?>
                </div>
                <div class="rating clearfix">
                    <?php if ( $rating_html = wc_get_rating_html( $product->get_average_rating() )) { ?>
                        <div><?php echo wp_kses($rating_html, true); ?></div>
                    <?php }else{ ?>
                        <div class="star-rating"></div>
                    <?php } ?>
                </div>
                <div class="add-to-cart">
                  <i class="fa fa-shopping-cart"></i>
                   <?php woocommerce_template_loop_add_to_cart(); ?>
                </div> 
                
              </div>
              <div class="time">
                    <div class="gva-countdown clearfix" data-countdown="countdown"
                          data-date="<?php echo date('m',$time_sale).'-'.date('d',$time_sale).'-'.date('Y',$time_sale).'-'. date('H',$time_sale) . '-' . date('i',$time_sale) . '-' .  date('s',$time_sale) ; ?>">
                    </div> 
                </div>
            </div>
        </div>     
    </div>
</div>
