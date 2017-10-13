<?php
$title = $sub_title = $el_class = $link = '';
$style = 'style-v1';
$position = 'top left';
$photo = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$xclass = array();
$xclass[] = esc_attr($position);
$xclass[] = esc_attr($style);
$xclass[] = esc_attr($el_class);
$image = wp_get_attachment_image_src($photo, 'full');
?>

<div class="widget gva-banner <?php echo implode($xclass, ' '); ?>">
    <div class="widget-content">
      <?php if(isset($image[0]) && $image[0]){ ?>
        <div class="image">
          <?php if($link){ ?><a href="<?php echo esc_url_raw($link) ?>"><?php } ?>
            <img src="<?php echo esc_url_raw($image[0]) ?>" alt="<?php echo esc_html( $title ); ?>" />
          <?php if($link){ ?></a><?php } ?>
        </div>
      <?php } ?> 

      <?php if($title){ ?>
        <div class="content">
          <div class="title">
            <a <?php echo ($link ? 'href="' . $link . '"' : '') ?>>
            <?php echo esc_html( $title ) ?>
            </a>
          </div>
          <div class="sub-title"><?php echo esc_html( $sub_title ) ?></div>
          <div class="btn btn-banner">
            <a <?php echo ($link ? 'href="' . $link . '"' : '') ?>>
            <?php echo esc_html( $text_button ) ?>
            </a>
          </div>
        </div>
      <?php } ?>   
    </div>
</div>
