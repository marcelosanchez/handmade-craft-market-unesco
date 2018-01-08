<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
Plugin Name: WooCommerce Western Union Gateway
Plugin URI: http://www.alexspataru.com/
Description: Adds Western Union Gateway to WooCommerce e-commerce plugin
Version: 1.0
Author: Alex Spataru
Author URI: http://www.alexspataru.com/
*/

// Include our Gateway Class and register Payment Gateway with WooCommerce
add_action( 'plugins_loaded', 'woo_wu_init', 0 );
function woo_wu_init() {
	// If the parent WC_Payment_Gateway class doesn't exist
	// it means WooCommerce is not installed on the site
	// so do nothing
	if ( ! class_exists( 'WC_Payment_Gateway' ) ) return;
	
	// If we made it this far, then include our Gateway Class
	include_once( 'westerm-union.php' );

	// Now that we have successfully included our class,
	// Lets add it too WooCommerce
	add_filter( 'woocommerce_payment_gateways', 'woo_add_wu_gateway' );
	function woo_add_wu_gateway( $methods ) {
		$methods[] = 'WC_Gateway_Western_Union';
		return $methods;
	}
}

// Add custom action links
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'spyr_authorizenet_aim_action_links' );
function spyr_authorizenet_aim_action_links( $links ) {
	$plugin_links = array(
		'<a href="' . admin_url( 'admin.php?page=wc-settings&tab=checkout' ) . '">' . __( 'Settings', 'woocommerce' ) . '</a>',
	);

	// Merge our new link with the default ones
	return array_merge( $plugin_links, $links );	
}

?>