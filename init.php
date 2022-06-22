<?php
/**
 * Plugin Name: GTranslate Elementor Widget
 * Description: GTranslate Elementor Widget Plugin.
 * Plugin URI: https://wordpress.org/plugins/
 * Version: 2.1
 * Author: B.M. Rafiul Alam
 * Author URI: https://themesbyte.com
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