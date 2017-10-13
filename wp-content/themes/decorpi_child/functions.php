<?php
/**
 *
 * @package [Parent Theme]
 * @author  moniathemes <moniathemes@gmail.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 * 
 */

function decorpi_child_scripts() {
    wp_enqueue_style( 'decorpi-parent-style', get_template_directory_uri(). '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'decorpi_child_scripts' );