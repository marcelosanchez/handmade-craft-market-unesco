
<?php
update_option( 'siteurl', 'http://200.10.147.158' );
update_option( 'home', 'http://200.10.147.158' );



function use_new_media_box() {
	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'use_new_media_box' );
?>