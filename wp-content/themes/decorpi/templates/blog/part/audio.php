<?php if(get_post_meta(get_the_ID(), "thumbnail_audio_url", true) !== ""){ ?>
   <div class="blog-souncloud-holder">
      <?php
      $audiolink = get_post_meta(get_the_ID(), "thumbnail_audio_url", true);
      $embed = wp_oembed_get( $audiolink );
      print $embed;
      ?>
   </div>
<?php } ?>