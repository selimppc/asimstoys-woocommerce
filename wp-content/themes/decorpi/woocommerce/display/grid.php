<?php 
   global $woocommerce_loop; 
?>
<?php $_count = 1; $_total = $query->post_count; ?>
<div class="products grid-view">
   <div class="lg-block-grid-<?php echo esc_attr($attrs['items_lg']) ?> md-block-grid-<?php echo esc_attr($attrs['items_md']) ?> sm-block-grid-<?php echo esc_attr($attrs['items_sm']) ?> xs-block-grid-<?php echo esc_attr($attrs['items_xs']) ?>">
      <?php while ( $query->have_posts() ) : $query->the_post(); global $product; ?>
            <div class="item-columns"><?php wc_get_template_part( 'content', 'product' ); ?></div>
      <?php endwhile; ?>
   </div>
</div>
