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
<?php get_header(); ?>
<div id="content">
	<div class="page-wrapper">
		<div class="not-found-wrapper text-center">
			<div class="not-found-title"><h1><span><?php echo esc_html__('404', 'decorpi') ?></span></h1></div>
			<div class="not-found-subtitle"><?php echo esc_html__('PAGE NOT FOUND', 'decorpi') ?></div>
			<div class="not-found-desc"><?php echo esc_html__('The page requested couldn\'t be found. This could be a spelling error in the URL or a removed page.','decorpi' )?></div> 

			<div class="not-found-home text-center">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="mn-icon-200"></i><?php echo esc_html__('Back Homepage', 'decorpi') ?></a>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>