<?php if(get_post_meta(get_the_ID(), "thumbnail_video_url", true) !== ""){ ?>
	<div class="blog-souncloud-holder">
		<?php
		$videolink = get_post_meta(get_the_ID(), "thumbnail_video_url", true);
		$embed = wp_oembed_get( $videolink );
		print $embed;
		?>
	</div>
<?php } ?>