<?php
$name = $job = $photo = $el_class = '';
$google = $facebook = $twitter = $pinterest = $linkedin = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$avata = wp_get_attachment_image_src($photo, 'full');
?>

<div class="widget gva-team <?php echo esc_attr($el_class); ?>">
   <div class="widget-content">
      <div class="avata">
      <?php if(isset($avata[0]) && $avata){?>
         <img src="<?php echo esc_url_raw( $avata[0] ) ?>" alt="<?php echo esc_attr($name); ?>" />
      <?php } ?>
         <div class="socials">
            <div class="socials-inner">
               <?php if($google){ ?>
                  <a href="<?php echo esc_url_raw( $google ); ?>"><i class="mn-icon-1409"></i></a>
               <?php } ?>
               <?php if($facebook){ ?>
                  <a href="<?php echo esc_url_raw( $facebook ); ?>"><i class="mn-icon-1405"></i></a>
               <?php } ?>
               <?php if($twitter){ ?>
                  <a href="<?php echo esc_url_raw( $twitter ); ?>"><i class="mn-icon-1406"></i></a>
               <?php } ?>
               <?php if($pinterest){ ?>
                  <a href="<?php echo esc_url_raw( $pinterest ); ?>"><i class=" mn-icon-1416"></i></a>
               <?php } ?>
               <?php if($linkedin){ ?>
                  <a href="<?php echo esc_url_raw( $linkedin ); ?>"><i class="mn-icon-1408"></i></a>
               <?php } ?>
            </div>   
         </div>
      </div>
      <div class="description">
         <?php if($name){ ?>
            <div class="name"><?php echo esc_attr($name) ?></div>
         <?php } ?>
         <?php if($job){ ?>
            <div class="job"><?php echo esc_attr($job) ?></div>
         <?php } ?>
      </div>
   </div>
</div>
