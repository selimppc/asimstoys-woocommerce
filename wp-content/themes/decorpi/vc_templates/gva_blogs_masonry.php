<?php
$el_class = $title = '';
$layout = 'grid';
$columns = '1';
$pagination = 'off';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
if(empty($loop)) return;
$this->getLoop($loop);
$args = $this->loop_args;
if(is_front_page()){
  $paged = (get_query_var('page')) ? get_query_var('page') : 1;
}
else{
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
}
$args['paged'] = $paged; 
$xcol = floor(12/$columns);
?>
<section class="widget gva-grid-posts section-blog  <?php echo (($el_class!='')?' '.$el_class:''); ?>">
  <?php if( $title ) { ?>
    <div class="widget-heading">
      <h3 class="widget-title visual-title">
        <span><?php echo esc_html($title); ?></span>
      </h3>
    </div>
  <?php } ?>

  <div class="widget-content">
    <?php 
      $query = new WP_Query($args);
      if($query->have_posts()){ 
    ?>
      <div class="posts-grids post-items row post-masonry-style">
         <?php $i=0; while ( $query->have_posts() ) : $query->the_post(); $i++; ?>

            <div class="item-masory col-md-<?php echo esc_attr($xcol);?> col-sm-<?php echo ($columns%2==0 ? $xcol*2 : $xcol); ?> col-xs-12">
              <?php get_template_part( 'content', get_post_format() ); ?>
            </div>

         <?php endwhile; 
         wp_reset_postdata();
         ?>
      </div>
    <?php } ?>   
    
    <?php if($pagination == 'on'){ ?>
      <div class="pagination">
        <?php echo decorpi_pagination($query); ?>
      </div>
    <?php } ?>  
  </div>
</section>
