<?php
$title = $desc = $el_class = '';
$style = 'default';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>

<div class="widget gva-social-links <?php echo esc_attr($el_class) ?> <?php echo esc_attr($style) ?>">
    <?php if( $title ) { ?>
        <h3 class="widget-title visual-title">
           <span><?php echo esc_html($title); ?></span>
        </h3>
    <?php } ?>
    <div class="widget-content">
      <?php if($desc){ ?>
        <div class="content"><?php echo esc_html($desc) ?> </div>
      <?php } ?>  
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
    </div>
</div>
