<?php
$title = $icon = $image = $icon_background = $icon_radius = $icon_border = $description = $link = $el_class = '';
$skin_text = 'text-dark';
$icon_position = 'top-center';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$xclass = array();
$xclass[] = esc_attr($skin_text);
$xclass[] = esc_attr($icon_position);
$xclass[] = esc_attr($el_class);
if($icon_border) $xclass[] = 'icon-border';
if($icon_background) $xclass[] = 'icon-background';
$icon_class = "{$icon_width} {$icon_radius} {$icon_border} {$icon_color} {$icon_background}";
if($image){
  $image = wp_get_attachment_image_src($image, 'full');
  if(isset($image[0]) && $image[0]){ $image = $image[0]; }
}
?>

  <?php if($icon_position=='top-center' || $icon_position=='top-left' || $icon_position=='top-right' || $icon_position=='right' || $icon_position=='left' || $icon_position=='left-center'){ ?>
    <div class="widget gsc-icon-box <?php echo esc_attr($box_border) ?> <?php if( count($xclass) > 0) echo implode($xclass, ' ') ?>">
      <?php if(($icon || $image) && $icon_position != 'right'){ ?>
        <div class="highlight-icon">
          <span class="icon-container <?php echo esc_attr($icon_class) ?> <?php if($icon_background){ echo 'fa-stack';} ?>">
            <?php if($icon){ ?><span class="icon <?php echo esc_attr($icon) ?>"></span> <?php } ?>
            <?php if($image){ ?><span class="icon"><img src="<?php echo esc_url($image) ?>"/> </span> <?php } ?>
          </span>
        </div>
      <?php } ?>

      <div class="highlight_content">
        <div class="title">
          <?php if($link){ ?><a href="<?php echo esc_url($link) ?>"> <?php } ?>
            <?php echo esc_html($title); ?>
          <?php if($link){ ?> </a> <?php } ?>
        </div>
        <?php if($description){ ?>
          <div class="desc"><?php echo esc_html($description); ?></div>
        <?php } ?>   
      </div>

      <?php if(($icon || $image) && $icon_position == 'right'){ ?>
        <div class="highlight-icon">
          <span class="icon-container <?php echo esc_attr($icon_class) ?> fa-stack">
            <?php if($icon){ ?><span class="icon <?php echo esc_attr($icon) ?>"></span> <?php } ?>
            <?php if($image){ ?><span class="icon"><img src="<?php echo esc_url($image) ?>"/> </span> <?php } ?>
          </span>
        </div>
      <?php } ?>

    </div> 
  <?php } ?>   

  <?php if($icon_position == 'top-left-title' || $icon_position == 'top-right-title'){ ?>
    <div class="widget gsc-icon-box <?php if(count($xclass)>0) echo implode($xclass, ' ') ?>">
       
       <div class="highlight_content">
          <div class="title-inner">
             
             <?php if(($icon || $image) && $icon_position=='top-left-title'){ ?>
                <div class="highlight-icon">
                   <span class="icon-container fa-stack <?php echo esc_attr($icon_class) ?>">
                      <?php if($icon){ ?><span class="icon <?php echo esc_attr($icon) ?>"></span> <?php } ?>
                      <?php if($image){ ?><span class="icon"><img src="<?php echo esc_url($image) ?>"/> </span> <?php } ?>
                   </span>
                </div>
             <?php } ?>
             
             <div class="title">
                <?php if($link){ ?><a href="<?php echo esc_url($link) ?>"> <?php } ?><?php echo esc_html($title); ?><?php if($link){ ?> </a> <?php } ?>
             </div>

             <?php if(($icon || $image) && $icon_position=='top-right-title'){ ?>
                <div class="highlight-icon">
                   <span class="icon-container fa-stack <?php echo esc_attr($icon_class) ?>">
                      <?php if($icon){ ?><span class="icon <?php echo esc_attr($icon) ?>"></span> <?php } ?>
                      <?php if($image){ ?><span class="icon"><img src="<?php echo esc_url($image) ?>"/> </span> <?php } ?>
                   </span>
                </div>
             <?php } ?>

          </div>
          <?php if($description){ ?>
             <div class="desc"><?php echo esc_html($description); ?></div>
          <?php } ?>   
       </div>

    </div> 
  <?php } ?>