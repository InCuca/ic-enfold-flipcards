<?php
/**
 * Plugin Name:     Enfold Flipcards
 * Plugin URI:      https://incuca.net
 * Description:     Enfold Plugin
 * Author:          INCUCA
 * Author URI:      https://incuca.net
 * Text Domain:     ic-enfold-flipcard
 * Version:         0.1.1
 *
 * @package         Ic_Enfold
 */

// Add shortcodes to Enfold
add_filter('avia_load_shortcodes', 'ic_flipcards_plugin', 12, 1);

function ic_flipcards_plugin($paths)
{
	$plugin_dir = plugin_dir_path(__FILE__);
	array_push($paths, $plugin_dir.'/shortcodes/');
	return $paths;
}
