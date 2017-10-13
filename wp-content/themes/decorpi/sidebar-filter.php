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
$layout_filter = decorpi_get_option('shop_filter_hidden', 'off');
if($layout_filter=='off' || empty($layout_filter)){
   if ( isset($_COOKIE['decorpi_woo_filter']) && $_COOKIE['decorpi_woo_filter'] ) {
      $layout_filter = $_COOKIE['decorpi_woo_filter'];
   }
}
?>

<?php if (is_active_sidebar('filter_sidebar') && $layout_filter !== 'off' ){ ?>
<div class="filter-sidebar">
   <div class="wp-sidebar filter-sidebar-inner sidebar clearfix layout-<?php echo esc_attr($layout_filter); ?>">
      <div class="filter-close"><a><i class="fa fa-times"></i></a></div>
      <?php dynamic_sidebar('filter_sidebar'); ?>
   </div>
   <div id="gva-filter-overlay"></div>
</div>
<?php } ?>
