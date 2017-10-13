<?php  
/* Twitter Shortcode */
if( !function_exists('gva_twitter_shortcode') ){
	function gva_twitter_shortcode($atts){
		extract(shortcode_atts(array(
			'username'				=> '',
			'limit'					=> 4,
			'exclude_replies'		=> 'false',
			'text_color'	=> 'text-default',
			'cache_time'			=> 1,
			'consumer_key'			=> 'tX4whV4R54o6hQxN9IB6w',
			'consumer_secret'		=> 'IioHcE47vKpIFmwPFxY9BW6L6NP0IhMPxF15HiBblI',
			'access_token'			=> '256872626-1ZSZZXDGdlLXALzaot3a7RiJdsqRwtaHtlBEnx8o',
			'access_token_secret'	=> 'eJF9BWQOPJB2SgTSvI3OqQq6OIFz51HNegxoHmw5TY'

		), $atts));
		
		if( $username == '' || !class_exists('TwitterOAuth') ){
			return;
		}

		$atts['exclude_replies'] = ($exclude_replies == 'false') ? 1 : 2;

		$transient_key = 'twitter_'.implode('', $atts);
		$cache = get_transient($transient_key);
		$cache = false;
		if( $cache !== false ){
			return $cache;
		}
		else{
			$connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
			$tweets = $connection->get('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$username.'&count='.$limit.'&exclude_replies='.$exclude_replies);
			
			if( !isset($tweets->errors) && is_array($tweets) ){
				ob_start();
				$extra_class = $text_color;
				echo '<div class="gva-widget-twitter loading '.$extra_class.'">';
				foreach( $tweets as $tweet ){
					$tweet_link = 'http://twitter.com/'.$tweet->user->screen_name.'/statuses/'.$tweet->id;
					$user_link = 'http://twitter.com/'.$tweet->user->screen_name;
					?>
					<div class="item">
						<div class="twitter-content">
							<div class="icon">
								<i class="fa fa-clock-o"></i><span class="date-time"><?php echo gvathemer_twitter_time($tweet->created_at);  ?></span>
							</div>
							<div class="content">
								<?php echo esc_html($tweet->text); ?>
							</div>
						</div>
					</div>
					<?php
				}
				echo '</div>';
				
				$output = ob_get_clean();
				//set_transient($transient_key, $output, $cache_time * HOUR_IN_SECONDS);
				return $output;
			}
		}
		
	}
}
add_shortcode('gva_twitter_shortcode', 'gva_twitter_shortcode');

if( !function_exists('gvathemer_twitter_time') ){
	function gvathemer_twitter_time( $time = '' ){
		if( empty($time) ){
			return '';
		}
		
		$second = 1;
		$minute = 60 * $second;
		$hour = 60 * $minute;
		$day = 24 * $hour;
		$month = 30 * $day;

		$delta = strtotime('+0 hours') - strtotime($time);
		if ($delta < 2 * $minute) {
			return esc_html__('1 min ago', 'gaviasthemer');
		}
		if ($delta < 45 * $minute) {
			return floor($delta / $minute) . esc_html__(' min ago', 'gaviasthemer');
		}
		if ($delta < 90 * $minute) {
			return esc_html__('1 hour ago', 'gaviasthemer');
		}
		if ($delta < 24 * $hour) {
			return floor($delta / $hour) . esc_html__(' hours ago', 'gaviasthemer');
		}
		if ($delta < 48 * $hour) {
			return esc_html__('yesterday', 'gaviasthemer');
		}
		if ($delta < 30 * $day) {
			return floor($delta / $day) . esc_html__(' days ago', 'gaviasthemer');
		}
		if ($delta < 12 * $month) {
			$months = floor($delta / $day / 30);
			return $months <= 1 ? esc_html__('1 month ago', 'gaviasthemer') : $months . esc_html__(' months ago', 'gaviasthemer');
		} else {
			$years = floor($delta / $day / 365);
			return $years <= 1 ? esc_html__('1 year ago', 'gaviasthemer') : $years . esc_html__(' years ago', 'gaviasthemer');
		}
	}
}