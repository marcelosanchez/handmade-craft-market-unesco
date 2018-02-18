
<?php
update_option( 'siteurl', 'http://200.10.147.158' );
update_option( 'home', 'http://200.10.147.158' );



function use_new_media_box() {
	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'use_new_media_box' );





/**
 * Send debug code to the Javascript console
 */ 
function debug_to_console($data) {
    if(is_array($data) || is_object($data)) {
		echo("<script>console.log('PHP_arr_obj: ".json_encode($data)."');</script>");
		echo("<script>console.log('PHP_r: ".print_r($data)."');</script>");
	} else {
		echo("<script>console.log('PHP_val: ".$data."');</script>");
	}
}
?>