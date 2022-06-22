<?php
/**
 * Plugin Name: GTranslate Elementor Widget
 * Description: GTranslate Elementor Widget Plugin.
 * Plugin URI: https://profiles.wordpress.org/codersaiful/#content-plugins
 * Version: 1.0
 * Author: Saiful Islam
 * Author URI: https://codeastrology.com
 * Text Domain: gtew
 */
 
 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function elementor_gt_addon() {

	// Load plugin file
	require_once( __DIR__ . '/includes/plugin.php' );

	// Run the plugin
	\Elementor_GT_Addon\Plugin::instance();

}
add_action( 'plugins_loaded', 'elementor_gt_addon' );