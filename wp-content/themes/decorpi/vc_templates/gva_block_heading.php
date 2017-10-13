<?php
$title = $background = $el_class = '';
$style = 'style-v1'; $align = 'text-center';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>

<div class="widget gva-block-heading <?php echo esc_attr($align) ?> <?php echo esc_attr($style) ?> <?php echo esc_attr($el_class) ?>">
   <?php if($title){ ?>

      <div class="widget-title title <?php echo esc_attr($align) ?> ">
        <?php echo esc_html( $title ); ?>
      </div>
      <?php if($subtitle){ ?>
         <div class="subtitle <?php echo esc_attr($align) ?> ">
            <?php echo esc_html($subtitle) ?>
         </div>
      <?php } ?>
   <?php } ?>   
</div>    