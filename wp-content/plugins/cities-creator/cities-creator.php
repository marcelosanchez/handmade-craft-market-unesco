<?php
/*
Plugin Name: Cities Creator
Plugin URI: #
Description: Plugin para crear ciudades en la tienda.
Version: 0.1
Author: Marcelo Sanchez
Author URI: #
License: GPL2
*/
?>

<?php
/*  Copyright 2018 MARCELOSANCHEZ  (email : mdsv14@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>

<?php 

// function awepop_add_view() {
//    if(is_single()) {
//       global $post;
//       $current_views = get_post_meta($post->ID, "awepop_views", true);
//       if(!isset($current_views) OR empty($current_views) OR !is_numeric($current_views) ) {
//          $current_views = 0;
//       }
//       $new_views = $current_views + 1;
//       update_post_meta($post->ID, "awepop_views", $new_views);
//       return $new_views;
//    }
// }

// add_action("wp_head", "awepop_add_view");



/**
 * Retrieve the number of views for a post
 *
 * Finds the current views for a post, returning 0 if there are none
 *
 * @global object $post The post object
 * @return integer $current_views The number of views the post has
 *
 */
// function awepop_get_view_count() {
//    global $post;
//    $current_views = get_post_meta($post->ID, "awepop_views", true);
//    if(!isset($current_views) OR empty($current_views) OR !is_numeric($current_views) ) {
//       $current_views = 0;
//    }

//    return $current_views;
// }



function wpmudev_cta() {

  echo '<div class="cta">';
    echo '<p>Call us on 000-0000 or email <a href="mailto:sales@example.com">sales@example.com</a></p>';
  echo '</div>';

}

add_action( 'admin_menu', 'my_admin_menu' );

// function my_admin_menu() {
//     add_menu_page( 'My Top Level Menu Example', 'Top Level Menu', 'manage_options', 'myplugin/myplugin-admin-page.php', 'myplguin_admin_page', 'dashicons-tickets', 6  );
// }




//////////////////////////////////////////



function myplguin_admin_page(){
    ?>
    <div class="wrap">
        <h2>Welcome To My Plugin</h2>
    </div>
    <?php
}




add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_menu() {
    add_menu_page( 'My Top Level Menu Example', 'Top Level Menu', 'manage_options', 'myplugin/myplugin-admin-page.php', 'myplguin_admin_page', 'dashicons-tickets', 6  );
    add_submenu_page( 'myplugin/myplugin-admin-page.php', 'My Sub Level Menu Example', 'Sub Level Menu', 'manage_options', 'myplugin/myplugin-admin-sub-page.php', 'myplguin_admin_sub_page' ); 
}



 ?>