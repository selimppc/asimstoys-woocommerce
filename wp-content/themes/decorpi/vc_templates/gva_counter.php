<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>
<div class="widget-counter milestone-block counter_box ">
   <div class="panel-body">
      <?php if($icon){ ?><div class="icon"><i class="<?php echo esc_attr($icon) ?>"></i></div><?php } ?>
      <span class="counterup milestone-number"><?php echo esc_attr($number) ?></span>
      <h4><?php echo esc_html($title) ?></h4> 
   </div>
</div>
