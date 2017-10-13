<?php
// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

function gaviasthemer_import_slider() {
     gaviasthemer_import_slider_process();
}

add_action('wp_ajax_gva_import_slider',  'gaviasthemer_import_slider');
add_action( 'wp_ajax_nopriv_gva_import_slider', 'gaviasthemer_import_slider');

function gavias_themer_download_packet(){
   $folder = get_template_directory() . '/inc/sample/revs/';
   $link = apply_filters( 'gaviasthemer_slide_link_packet', array() );
   
   if(apply_filters( 'kazan_packet', array() )){
      $link = 'http://moniathemes.com/sample/kazan/revs.zip';
   }
   if(apply_filters( 'julia_packet', array() )){
      $link = 'http://moniathemes.com/sample/julia/revs.zip';
   }
   if(apply_filters( 'tico_packet', array() )){
      $link = 'http://moniathemes.com/sample/tico/revs.zip';
   }

   $tmp = $folder . 'tmp.zip';   
   $data = file_get_contents( $link );
   $file = fopen($tmp, "w+");
   fputs($file, $data);
   fclose($file);

   if( file_exists($tmp) ){
      WP_Filesystem();
      unzip_file( $tmp , $folder );  
   }
   @unlink( $tmp );
}

function moniathemer_download_slider($theme){
   $folder = get_template_directory() . '/inc/sample/demo-data/main/';
   $link = 'http://moniathemes.com/sample/'.$theme.'/revs.zip';
   $tmp = $folder . 'tmp.zip';   
   $data = file_get_contents( $link );
   $file = fopen($tmp, "w+");
   fputs($file, $data);
   fclose($file);
   if( file_exists($tmp) ){
      WP_Filesystem();
      unzip_file( $tmp , $folder );  
   }
   @unlink( $tmp );
}

function gaviasthemer_import_slider_process() {

   if(!function_exists('unzip_file')){
      $result = array(
         'data' => 'Please enable extension Zip for your server'
      );
      print json_encode($result);
      exit(0);
   }

   if ( ! class_exists( 'RevSliderAdmin' ) ) {
      require( RS_PLUGIN_PATH . '/admin/revslider-admin.class.php' );         
   }
   
   $sliders = glob( get_template_directory() . '/inc/sample/revs/*.zip' );
 
   if (is_array($sliders) && count($sliders) < 1) {
      gavias_themer_download_packet();
   }

   $sliders = glob( get_template_directory() . '/inc/sample/revs/*.zip' );
   if (!empty($sliders)) {
      foreach ($sliders as $slider) {
         $_FILES['import_file']['error'] = UPLOAD_ERR_OK;
         $_FILES['import_file']['tmp_name']= $slider;

         $xslider = new RevSlider();
         $xslider->importSliderFromPost( true, 'none' );
      }
   }else{
      $result = array(
         'data' => 'No have packet'
      );
      print json_encode($result);
      exit(0);
   }

   $result = array(
      'data' => 'Import success'
   );
   print json_encode($result);
   exit(0);
}
