<?php

/**
*	Remove parameters for vc
*/
vc_remove_param('vc_tta_accordion', 'style');
vc_remove_param('vc_tta_accordion', 'shape');
vc_remove_param('vc_tta_accordion', 'color');
vc_remove_param('vc_tta_accordion', 'no_fill');
vc_remove_param('vc_tta_accordion', 'spacing');
vc_remove_param('vc_tta_accordion', 'gap');
vc_remove_param('vc_tta_accordion', 'c_align');
vc_remove_param('vc_tta_accordion', 'c_position');

vc_remove_param('vc_tta_tour', 'style');
vc_remove_param('vc_tta_tour', 'shape');
vc_remove_param('vc_tta_tour', 'color');
vc_remove_param('vc_tta_tour', 'spacing');
vc_remove_param('vc_tta_tour', 'gap');
vc_remove_param('vc_tta_tour', 'no_fill_content_area');
vc_remove_param('vc_tta_tour', 'controls_size');
vc_remove_param('vc_tta_tour', 'pagination_style');
vc_remove_param('vc_tta_tour', 'pagination_color');
vc_remove_param('vc_tta_tour', 'alignment');

vc_remove_param('vc_tta_tabs', 'shape');
vc_remove_param('vc_tta_tabs', 'style');
vc_remove_param('vc_tta_tabs', 'color');
vc_remove_param('vc_tta_tabs', 'alignment');
vc_remove_param('vc_tta_tabs', 'no_fill_content_area');
vc_remove_param('vc_tta_tabs', 'spacing');
vc_remove_param('vc_tta_tabs', 'gap');
vc_remove_param('vc_tta_tabs', 'pagination_style');
vc_remove_param('vc_tta_tabs', 'pagination_color');

function decorpi_init_vc_register(){
	if(decorpi_woocommerce_activated()){
		$vendor = new decorpi_Visualcomposer_Map();
		add_action( 'vc_after_set_mode', array( $vendor, 'load' ), 90 );
	}
	
	$vendor = new decorpi_Visualcomposer_Theme_Map();
	add_action( 'vc_after_set_mode', array( $vendor, 'load' ), 90 );
}
add_action( 'after_setup_theme', 'decorpi_init_vc_register' , 90 );   



/**
 * Add parameters for row
 */
if(!function_exists('decorpi_add_params_vc')){
	function decorpi_add_params_vc(){
		vc_add_param( 'vc_row', array(
		   "type" => "dropdown",
		   "heading" => esc_html__("Layout Setting", 'decorpi'),
		   "param_name" => "fullwidth",
		   "value" => array(
				__('Boxed', 'decorpi') => '1',
				__('Wide - Full Width', 'decorpi') => '0'
			)
		));

		vc_add_param( 'vc_row', array(
		   "type" => "dropdown",
		   "heading" => esc_html__("Custom Background", 'decorpi'),
		   "param_name" => "custom_background",
		   "value" => array(
		   	__('-- None --', 'decorpi') => '',
				__('Background of theme', 'decorpi') => 'bg-theme',
				__('Background dark', 'decorpi') => 'bg-dark',
				__('Background position left', 'decorpi') => 'bg-left',
				__('Background position right', 'decorpi') => 'bg-right',
			)
		));
	}
}
add_action( 'after_setup_theme', 'decorpi_add_params_vc', 99 );
 

if(!function_exists('decorpi_override_vc_bootstrap')){
	function decorpi_override_vc_bootstrap( $class_string,$tag ){
		if ($tag=='vc_column' || $tag=='vc_column_inner') {
			$class_string = preg_replace('/vc_span(\d{1,2})/', 'col-md-$1', $class_string);
			$class_string = preg_replace('/vc_hidden-(\w)/', 'hidden-$1', $class_string);
		}
		return $class_string;
	}
}
add_filter( 'vc_shortcodes_css_class', 'decorpi_override_vc_bootstrap', 10, 2);


