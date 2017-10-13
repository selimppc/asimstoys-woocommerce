<div class="hidden-lg hidden-md">
   <div class="canvas-menu gva-offcanvas">
     <a class="dropdown-toggle" data-canvas=".mobile" href="#"><i class="mn-icon-103"></i></a>
   </div>
   <div class="gva-offcanvas-content mobile">
      <div class="close-canvas"><a><i class="mn-icon-08"></i></a></div>
      <div class="wp-sidebar sidebar">
         <?php do_action('decorpi_mobile_menu'); ?>
         <div class="after-offcanvas">
            <?php
               if(is_active_sidebar( 'offcanvas_sidebar_mobile' )){ 
                  dynamic_sidebar( 'offcanvas_sidebar_mobile' );
               }
            ?>
         </div>    
     </div>
   </div>
</div>