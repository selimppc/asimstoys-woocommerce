<?php 
   global $woocommerce_loop; 
?>
<?php $_count = 1; $_total = $query->post_count; ?>
<div class="products carousel-view">
   <div class="init-carousel-owl owl-carousel" <?php echo decorpi_set_carousel_attrs($attrs) ?>>
      <?php while ( $query->have_posts() ) : $query->the_post(); global $product;  ?>
            <?php wc_get_template_part( 'content', 'product' ); ?>
      <?php endwhile; ?>
   </div>
</div>
<?php wp_reset_postdata(); ?>