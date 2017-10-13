<?php
/**
 * $Desc
 *
 *
 * @package    basetheme
 * @author     moniathemes Team    
 * @copyright  Copyright (C) 2016 Moniathemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */

	?>
	</div><!--end page content-->
	
</div><!-- End page -->

	<footer id="wp-footer" class="clearfix">
		<?php $footer = apply_filters('decorpi_get_footer_layout', null );  ?>
		<?php if(!empty($footer) && $footer !='default' && $post = get_post( $footer )){
			echo do_shortcode( $post->post_content ); 
		}else{
			$sidebars_count = 0;
			for( $i = 1; $i <= 4; $i++ ){
				if ( is_active_sidebar( 'footer-sidebar-'. $i ) ) $sidebars_count++;
			}
			
			if( $sidebars_count > 0 ){
				echo '<div class="widgets_wrapper">';
					echo '<div class="container">';
					
						$sidebar_class = '';
						switch( $sidebars_count ){
							case 2: $sidebar_class = 'footer-second col-lg-6 col-md-6 col-md-6 col-xs-12'; break;
							case 3: $sidebar_class = 'footer-third col-lg-4 col-md-4 col-md-1 col-xs-12'; break;
							case 4: $sidebar_class = 'footer-fourth col-lg-3 col-md-3 col-md-6 col-xs-12'; break;
							default: $sidebar_class = 'footer-one col-xs-12';break;
						}
						
						for( $i = 1; $i <= 4; $i++ ){
							if ( is_active_sidebar( 'footer-sidebar-'. $i ) ){
								echo '<div class="'. $sidebar_class .' column">';
									dynamic_sidebar( 'footer-sidebar-'. $i );
								echo '</div>';
							}
						}
					
					echo '</div>';
				echo '</div>';
			}

			?>
			<div class="copyright">
				<div class="container">
					<?php echo decorpi_get_option('copyright_text', esc_html__('Copyright', 'decorpi') . date('Y') . ' - ' . esc_html__('decorpi Responsive Theme - All rights reserved.', 'decorpi') . '<br>' . esc_html__('Powered by WordPress.', 'decorpi')); ?>
				</div>
			</div>
		<?php } ?>

		<div id="gva-overlay"></div>
		<div id="gva-quickview" class="clearfix"></div>

		<?php if(decorpi_get_option('enable_backtotop', 0)){ ?>
			<div class="return-top default"><i class="mn-icon-194"></i></div>
		<?php } ?>	
	</footer>
<?php wp_footer(); ?>
</div>
</body>
</html>