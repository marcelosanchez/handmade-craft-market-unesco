<?php
/**
 * Plugin Name: Frontend Gallery Slider For Advanced Custom Field
 * Plugin URI: http://www.wponlinesupport.com/
 * Description: Display Advanced Custom Field Gallery on frontend of your website with shorcode.
 * Author: WP Online Support 
 * Text Domain: frontend-gallery-slider-for-advanced-custom-field
 * Domain Path: /languages/
 * Version: 1.2
 * Author URI: http://www.wponlinesupport.com/
 *
 * @package WordPress
 * @author SP Technolab
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if( !defined( 'FAGSFACF_VERSION' ) ) {
	define( 'FAGSFACF_VERSION', '1.2' ); // Version of plugin
}
if( !defined( 'FAGSFACF_VERSION_DIR' ) ) {
    define( 'FAGSFACF_VERSION_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( !defined( 'FAGSFACF_VERSION_URL' ) ) {
    define( 'FAGSFACF_VERSION_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( !defined( 'FAGSFACF_POST_TYPE' ) ) {
    define( 'FAGSFACF_POST_TYPE', 'acf' ); // plugin post type
}

add_action('plugins_loaded', 'fagsfacf_load_textdomain');
function fagsfacf_load_textdomain() {
	load_plugin_textdomain( 'frontend-gallery-slider-for-advanced-custom-field', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @package Frontend Gallery Slider For Advanced Custom Field
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'fagsfacf_install' );

/**
 * Plugin Setup (On Activation)
 * 
 * Does the initial setup,
 * set default values for the plugin options.
 * 
 * @package Frontend Gallery Slider For Advanced Custom Field
 * @since 1.0.0
 */
function fagsfacf_install() {

    if( is_plugin_active('frontend-gallery-slider-for-advanced-custom-field/frontend-gallery-slider.php') ) {
        add_action('update_option_active_plugins', 'fagsfacf_deactivate_pro_version');
    }
}

/**
 * Deactivate free plugin
 * 
 * @package Frontend Gallery Slider For Advanced Custom Field
 * @since 1.0.0
 */
function fagsfacf_deactivate_pro_version() {
    deactivate_plugins('frontend-gallery-slider-for-acf-pro/frontend-gallery-slider-for-acf-pro.php', true);
}

/**
 * Check ACF plugin is active
 *
 * @package Frontend Gallery Slider For Advanced Custom Field
 * @since 1.0.0
 */
function fagsfacf_check_activation() {

    if ( !class_exists('acf') ) {
        // is this plugin active?
        if ( is_plugin_active( plugin_basename( __FILE__ ) ) ) {
            // deactivate the plugin
            deactivate_plugins( plugin_basename( __FILE__ ) );
            // unset activation notice
            unset( $_GET[ 'activate' ] );
            // display notice
            add_action( 'admin_notices', 'fagsfacf_admin_notices' );
        }
    }
}

// Check required plugin is activated or not
add_action( 'admin_init', 'fagsfacf_check_activation' );

/**
 * Admin notices
 * 
 * @package Frontend Gallery Slider For Advanced Custom Field Pro
 * @since 1.0.0
 */
function fagsfacf_admin_notices() {

    if ( !class_exists('acf') ) {
        echo '<div class="error notice is-dismissible">';
        echo sprintf( __('<p><strong>%s</strong> recommends the following plugin to use.</p>', 'frontend-gallery-slider-for-advanced-custom-field'), 'Frontend Gallery Slider For Advanced Custom Field' );
        echo sprintf( __('<p><strong><a href="%s" target="_blank">%s</a>, %s</strong></p>', 'frontend-gallery-slider-for-advanced-custom-field'), 'https://wordpress.org/plugins/advanced-custom-fields', 'Advanced Custom Fields', 'Advanced Custom Fields: Gallery Field' );
        echo '</div>';
    }
}

/**
 * Function to display admin notice of activated plugin.
 * 
 * @package Frontend Gallery Slider For Advanced Custom Field Pro
 * @since 1.0.0
 */
function fagsfacf_front_gallery_admin_notice() {

    $dir = WP_PLUGIN_DIR . '/frontend-gallery-slider-for-acf-pro/frontend-gallery-slider-for-acf-pro.php';
    
    // If free plugin exist
    if( file_exists($dir) ) {
        
        global $pagenow;
        
        if ( $pagenow == 'plugins.php' && current_user_can( 'install_plugins' ) ) {
            echo '<div id="message" class="updated notice is-dismissible"><p><strong>Thank you for activating Frontend Gallery Slider For Advanced Custom Field</strong>.<br /> It looks like you had PRO version <strong>(<em>Frontend Gallery Slider For Advanced Custom Field Pro</em>)</strong> of this plugin activated. To avoid conflicts the extra version has been deactivated and we recommend you delete it. </p></div>';
        }
    }
}

// Action to display notice
add_action( 'admin_notices', 'fagsfacf_front_gallery_admin_notice');

/**
 * Function to unique number value
 * 
 */
function fagsfacf_get_unique() {
    static $unique = 0;
    $unique++;

    return $unique;
}

// Script
require_once( FAGSFACF_VERSION_DIR . '/includes/class-fagsfacf-script.php' );	

// Shortcodes
require_once( FAGSFACF_VERSION_DIR . '/includes/shortcodes/fagsfacf-slider.php' );
require_once( FAGSFACF_VERSION_DIR . '/includes/shortcodes/fagsfacf-carousel.php' );


// How it work file, Load admin files
if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
    require_once( FAGSFACF_VERSION_DIR . '/includes/admin/fagsfacf-how-it-work.php' );
}	