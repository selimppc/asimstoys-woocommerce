<div class="hidden-xs hidden-sm">
   <div class="canvas-menu gva-offcanvas">
     <a class="dropdown-toggle" data-canvas=".default" href="#"><i class="mn-icon-103"></i></a>
   </div>
   <div class="gva-offcanvas-content default">
      <div class="close-canvas"><a><i class="mn-icon-08"></i></a></div>
      <div class="wp-sidebar sidebar">
         <?php
            if(is_active_sidebar( 'offcanvas_sidebar' )){ 
               dynamic_sidebar( 'offcanvas_sidebar' );
            }
         ?>  
     </div>
   </div>
</div>