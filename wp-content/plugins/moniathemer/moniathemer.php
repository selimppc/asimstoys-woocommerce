<?php 
/**
 * Plugin Name: Moniathemer
 * Description: Open Setting, Post Type, Shortcode ... for theme 
 * Version: 1.0.0
 * Author: Gaviasthemes Team
 */

define( 'GAVIAS_THEMER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'GAVIAS_THEMER_PLUGIN_DIR', plugin_dir_path( __FILE__ )  );

class Gavias_Themer{

	function __construct(){
		$this->load_language_file();
		$this->include_files();
		add_action('wp_enqueue_scripts', array($this, 'register_scripts'));
      add_action( 'widgets_init', array($this, 'register_woo_widget'));
      add_action('wp_head', array($this, 'gaviasthemer_ajax_url'));
		$this->load_posttypes(); 
	}
	
	function gaviasthemer_ajax_url(){
	    echo '<script> var ajaxurl = "' . admin_url('admin-ajax.php') . '";</script>';
	}
	function load_language_file(){
		load_plugin_textdomain('moniathemer', false, basename( dirname( __FILE__ ) ) . '/languages' );
	}
	
	function include_files(){
      include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		require_once('posttypes/brand.php');
		require_once('posttypes/testimonials.php');
		require_once('posttypes/footer.php');
		require_once('redux/admin-init.php');

		require_once('import/import-widget.php');
		require_once('import/import-slider.php');
		require_once('import/import.php');

      if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
         include_once(dirname(dirname(__FILE__)). "/woocommerce/includes/abstracts/abstract-wc-widget.php");
         include_once('widgets/woo-product-sorting.php');
      }
	}

	function load_posttypes(){
		$opts = apply_filters( 'moniathemer_load_posttypes', get_option( 'moniathemer_posttypes' ) );
      if( !empty($opts) ){
         foreach( $opts as $opt => $key ){
            $file = str_replace( 'active_', '', $opt );
            $filepath = GAVIAS_THEMER_PLUGIN_DIR.'posttypes/'.$file.'.php'; 
            if( file_exists($filepath) ){
               require_once( $filepath );
            }
         }  
      }
	} 

	function register_woo_widget(){
		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			register_widget('GVA_Widget_Product_Sorting');
		}
	}

	function register_scripts(){
		$js_dir = plugin_dir_url( __FILE__ ).'js';
		$css_dir = plugin_dir_url( __FILE__ ).'css';

		wp_register_style( 'gavias.themer', $css_dir . '/gavias.themer.css' );
		wp_enqueue_style( 'gavias.themer' );
		
		wp_register_script('gavias.themer', $js_dir.'/gavias.themer.js', array('jquery'), null, true);
		wp_enqueue_script('gavias.themer');
	}
}

new Gavias_Themer();