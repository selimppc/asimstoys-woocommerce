<?php
$title = $el_class = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>

<div class="widget gva-vertical-menu <?php echo esc_attr($el_class); ?>">
    <?php if( $title ) { ?>
        <h3 class="widget-title">
           <span><?php echo esc_html($title); ?></span>
        </h3>
    <?php } ?>

    <div class="widget-content">
        <?php echo do_action( 'decorpi_vertical_megamenu' ); ?>
    </div>
</div>
