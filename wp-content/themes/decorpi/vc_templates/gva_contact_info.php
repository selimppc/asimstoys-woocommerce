<?php
$title = $description = $photo = $address = $email = $website = $el_class = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$image = wp_get_attachment_image_src($photo, 'full');
?>

<div class="widget gva-contact-info <?php echo esc_attr($el_class); ?>">
   <?php if( $title ) { ?>
      <h3 class="widget-title">
         <span><?php echo esc_html($title); ?></span>
      </h3>
   <?php } ?>
   <div class="widget-content">
      <?php if(!empty($description)){ ?>
         <div class="description"><?php echo esc_html( $description) ?></div>
      <?php } ?>
      <?php if(isset($image[0]) && $image){?>
         <div class="image">
            <img src="<?php echo esc_url_raw( $image[0] ) ?>" alt="<?php echo esc_attr($title); ?>" />
         </div>    
      <?php } ?>
      <div class="content">
         <?php if( $address ) { ?>
            <div class="address"><i class="mn-icon-1142"></i><?php echo esc_html( $address ); ?></div>
         <?php } ?>  
         <?php if( $phone ) { ?>
            <div class="phone"><i class=" mn-icon-250"></i><?php echo esc_html( $phone ); ?></div>
         <?php } ?> 
         <?php if( $email ) { ?>
            <div class="email"><i class="mn-icon-220"></i><?php echo esc_html($email ); ?></div>
         <?php } ?>   
         <?php if( $website ) { ?>
            <div class="website"><i class="mn-icon-815"></i><a href="<?php echo esc_html( $website ); ?>"><?php echo esc_html( $website ); ?></a></div>
         <?php } ?> 
      </div>
   </div>
</div>
