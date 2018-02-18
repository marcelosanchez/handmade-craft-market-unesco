<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package Frontend Gallery Slider For Advanced Custom Field
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Fagsfacf_Script {
	
	function __construct() {
		
		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array($this, 'fagsfacf_front_style') );
		
		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array($this, 'fagsfacf_front_script') );	
		
	}

	/**
	 * Function to add style at front side
	 * 
	 * @package FFrontend Gallery Slider For Advanced Custom Field
	 * @since 1.0.0
	 */
	function fagsfacf_front_style() {
		
		// Registring and enqueing slick slider css
		if( !wp_style_is( 'wpos-slick-style', 'registered' ) ) {
			wp_register_style( 'wpos-slick-style', FAGSFACF_VERSION_URL.'assets/css/slick.css', array(), FAGSFACF_VERSION );
			wp_enqueue_style( 'wpos-slick-style' );
		}
		
		// Registring and enqueing public css
		wp_register_style( 'fagsfacf-public-style', FAGSFACF_VERSION_URL.'assets/css/fagsfacf-public-css.css', array(), FAGSFACF_VERSION );
		wp_enqueue_style( 'fagsfacf-public-style' );
	}
	
	/**
	 * Function to add script at front side
	 * 
	 * @package FFrontend Gallery Slider For Advanced Custom Field
	 * @since 1.0.0
	 */
	function fagsfacf_front_script() {
		
		// Registring slick slider script
		if( !wp_script_is( 'wpos-slick-jquery', 'registered' ) ) {
			wp_register_script( 'wpos-slick-jquery', FAGSFACF_VERSION_URL.'assets/js/slick.min.js', array('jquery'), FAGSFACF_VERSION, true );
		}
		
		// Registring and enqueing public script
		wp_register_script( 'fagsfacf-public-script', FAGSFACF_VERSION_URL.'assets/js/fagsfacf-public.js', array('jquery'), FAGSFACF_VERSION, true );
		wp_localize_script( 'fagsfacf-public-script', 'Fagsfacf', array(
																	'is_mobile' => (wp_is_mobile()) ? 1 : 0																	
																	));
	}
	
}

$fagsfacf_script = new Fagsfacf_Script();