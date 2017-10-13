<?php  

//-- Extends Woocommerce --//
if(decorpi_woocommerce_activated()){
   class WPBakeryShortCode_GVA_Products extends WPBakeryShortCode{}

   class WPBakeryShortCode_GVA_Products_List extends WPBakeryShortCode{}

   class WPBakeryShortCode_GVA_Productscategory_Navigation extends WPBakeryShortCode{}

   class WPBakeryShortCode_GVA_Woo_Category_List extends WPBakeryShortCode{}

   class WPBakeryShortCode_GVA_Deals extends WPBakeryShortCode{}

   class WPBakeryShortCode_GVA_Tabs_Products_Ajax extends WPBakeryShortCode{}

   class WPBakeryShortCode_GVA_Tabs_Products extends WPBakeryShortCode{}
}   

//-- Extends Element Theme, Blog --//
if(is_file(vc_path_dir('SHORTCODES_DIR', 'vc-posts-grid.php'))){
   require_once(vc_path_dir('SHORTCODES_DIR', 'vc-posts-grid.php'));
}

class WPBakeryShortCode_GVA_Blogs_Carousel extends WPBakeryShortCode_VC_Posts_Grid {}

class WPBakeryShortCode_GVA_Blogs_Masonry extends WPBakeryShortCode_VC_Posts_Grid {}

class WPBakeryShortCode_GVA_Blogs_Grid extends WPBakeryShortCode_VC_Posts_Grid {}

class WPBakeryShortCode_GVA_Blogs_List extends WPBakeryShortCode_VC_Posts_Grid {}

class WPBakeryShortCode_GVA_Testimonial extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Brands extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Social_Links extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Icon_Box extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Team extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Contact_Info extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Block_Heading extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Banner extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Banner_Slide extends WPBakeryShortCode{}

class WPBakeryShortCode_gva_feature_services extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Counter extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Vertical_Menu extends WPBakeryShortCode{}

