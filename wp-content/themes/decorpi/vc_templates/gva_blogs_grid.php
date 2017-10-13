<?php
$el_class = $title = '';
$layout = 'grid';
$columns = '1';
$pagination = $sticky = 'off';

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

<section class="widget gva-grid-posts section-blog <?php echo esc_attr($style_display) ?>  <?php echo (($el_class!='')?' '.$el_class:''); ?>">
    <div class="widget-heading">
      <?php if( $title ) { ?>
          <div class="widget-title visual-title">
             <span><?php echo esc_html($title); ?></span>
             <p class="sub_title"><?php echo esc_html($sub_title); ?></p>
          </div>
          
      <?php } ?>
    </div>
    <div class="widget-content">
        <?php
            $query = new WP_Query($args);
            if($query->have_posts()){ 
        ?>
          <div class="posts-grids post-items layout-sticky-<?php echo esc_attr($sticky ); ?>">
             <?php $i=0; while ( $query->have_posts() ) : $query->the_post();  ?>
               
                <?php if($sticky == 'off'){ $i++; ?>
                
                  <?php if(($i % $columns == 1 && $columns > 1 ) || $columns == 1){echo '<div class="row">'; } ?>
                    
                    <div class="col-md-<?php echo esc_attr($xcol);?> col-sm-<?php echo ($columns%2==0 ? $xcol*2 : $xcol); ?> col-xs-12">
                      <?php get_template_part( 'content', get_post_format() ); ?>
                    </div>

                  <?php if((($i % $columns==0 || $i == $query->found_posts) && $columns > 1) || $columns == 1){echo '</div>';} ?>

                <?php }else{ ?>  

                  <?php if($i==0){ ?>
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sticky-post">
                        <?php get_template_part( 'content', get_post_format() ); ?>
                      </div>
                    </div>
                  <?php }else{ ?>
                   
                    <?php if(($i % $columns == 1 && $columns > 1 ) || $columns == 1){echo '<div class="row">'; } ?>
                    
                      <div class="posts-child col-md-<?php echo esc_attr($xcol);?> col-sm-<?php echo ($columns%2==0 ? $xcol*2 : $xcol); ?> col-xs-12">
                        <?php get_template_part( 'content', get_post_format() ); ?>
                      </div>

                    <?php if((($i % $columns==0 || $i == $query->found_posts) && $columns > 1) || $columns == 1){echo '</div>';} ?>

                  <?php }
                    $i++; 
                }

                ?>

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
