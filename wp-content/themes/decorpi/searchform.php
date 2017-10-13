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
<form method="get" class="searchform gva-main-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="gva-search">
		<input name="s" maxlength="40" class="form-control input-large input-search" type="text" size="20" placeholder="<?php echo esc_html__('Search...', 'decorpi') ?>">
		<span class="input-group-addon input-large btn-search">
			<input type="submit" class="fa" value="&#xf002;" />
		</span>
	</div>
</form>


