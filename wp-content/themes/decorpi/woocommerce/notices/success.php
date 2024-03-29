<?php
/**
 * Show messages
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! $messages ) return;
?>

<?php foreach ( $messages as $message ) : ?>
	<div class="alert alert_success">
		<div class="alert_icon"><i class="icon icon-check"></i></div>
		<div class="alert_wrapper"><?php echo wp_kses_post( $message ); ?></div>
		<a class="close" href="#"><i class="icon icon-update"></i></a>
	</div>
<?php endforeach; ?>