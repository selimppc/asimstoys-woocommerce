<?php 
	$title = $subtitle = $price = $attach_image = $textarea_html = $el_class = '';
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );
?>

<div class="clearfix">	
	<div class="gva-banner-slide">
		<div class="banner-content-inner">
			<div class="content pull-left">
				<div class="content-inner">
					<?php if($subtitle){ ?>
						<div class="subtitle"><?php echo esc_html( $subtitle ); ?></div>
					<?php } ?>
					<?php if($title){ ?>
						<div class="title"><?php echo esc_html( $title ); ?></div>
					<?php } ?>
					<?php if( isset($content) && $content ) : ?>
						<div class="desc"><?php echo trim($content); ?></div>
					<?php endif; ?>
					<?php if($price){ ?>
						<div class="price"><?php echo esc_html( $price ); ?></div>
					<?php } ?>	
				</div>	
			</div>
			<?php if( $image ): ?>
				<?php $img = wp_get_attachment_image_src( $image,'full' ); ?>
				 <div class="image pull-right">
				    <img src="<?php echo esc_url_raw( $img[0] ); ?>" title="" alt="">
				</div>
			<?php endif; ?>
		</div>
	</div>	
	
</div>

