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
    global $wpdb;

    $table_country = $wpdb->prefix . "country";

    $sql = "SELECT * FROM $table_country";
    $countries = $wpdb->get_results($sql) or die(mysql_error());


    $table_city = $wpdb->prefix . "city";
 ?>


<?php 
    // Get Prev Image
    // if ( !empty( $_POST['image'] ) ) {
    //   $image_url = $_POST['image'];
    //   $wpdb->insert( 'images', array( 'image_url' => $image_url ), array( '%s' ) ); 
    // }
 ?>






<?php
// ----------------------- PLUGIN MENU -----------------------
add_action('admin_menu', 'test_plugin_setup_menu');
 
function test_plugin_setup_menu(){
    add_menu_page( 'Cities', 'Cities', 'manage_options', 'myplugin/myplugin-admin-page.php', 'show_cities_page', 'dashicons-admin-site', 72  );
    add_submenu_page( 'myplugin/myplugin-admin-page.php', 'My Sub Level Menu Example', 'Add New', 'manage_options', 'myplugin/myplugin-admin-sub-page.php', 'add_new_city_page' );
} ?>

<?php
// ----------------------- CITIES LIST -----------------------
function show_cities_page() { ?>
        <h1>Cities</h1>
        <h3>Cooming Soon</h3>
<?php } ?>



<?php


/**
 * Load Translations.
 */
function city_load_plugin_textdomain() {
    load_plugin_textdomain( 'cities-creator', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

add_action( 'init', 'city_load_plugin_textdomain' );

/**
 * Enqueue scripts and styles
 */
function city_enqueue_scripts_styles() {
    // Register.
    wp_register_style( 'city_admin_css', plugins_url( 'cities-creator/css/styles.css' ), false, '1.0.0', 'all' );
    wp_register_script( 'city_admin_js', plugins_url( 'cities-creator/js/scripts.js' ), array( 'jquery' ), '1.0.0', true );

    // Enqueue.
    wp_enqueue_style( 'city_admin_css' );
    wp_enqueue_script( 'city_admin_js' );
}

add_action( 'admin_enqueue_scripts', 'city_enqueue_scripts_styles' );


// ----------------------- ADD NEW CITY -----------------------
function add_new_city_page( $user ) {
    global $countries;


    if ( ! current_user_can( 'upload_files' ) ) {
        return;
    }

    // vars
    $url             = get_the_author_meta( 'city_meta', $user->ID );
    $upload_url      = get_the_author_meta( 'city_upload_meta', $user->ID );
    $upload_edit_url = get_the_author_meta( 'city_upload_edit_meta', $user->ID );
    $button_text     = $upload_url ? 'Change Current Image' : 'Upload New Image';

    if ( $upload_url ) {
        $upload_edit_url = get_site_url() . $upload_edit_url;
    }

   
?>
    <h1>Add New City</h1>
    
    <table class="form-table_t">
        <tbody>
            <form method="post">
            <!-- <form method="post" enctype="multipart/form-data"> -->
                <tr class="user-user-login-wrap">
                    <th>
                        <label for="city_name">Name <span class="description">(required)</span></label>
                    </th>
                    <td>
                        <input type="text" name="city_name" id="city_name" value="" class="regular-text" placeholder="City Name">
                        <!-- <span class="description">Usernames cannot be changed.</span> -->
                    </td>
                </tr>

                <tr class="user-display-name-wrap">
                    <th>
                        <label for="country_cid">Country</label>
                    </th>
                    <td>
                        <select name="country_cid" id="country_cid" style="width: 350px;">
                        <?php foreach ( $countries as $country_r ) { ?>
                            <option value="<?php echo $country_r->country_id; ?>"><?php echo $country_r->name; ?></option>
                        <?php } ?>
                        </select>
                    </td>
                </tr>
                
                <tr class="user-first-name-wrap">
                    <th>
                        <label for="short_description"><?php _e( 'Short Description', 'cities-creator' ); ?></label>
                    </th>
                    <td>
                        <textarea rows="5" cols="53" name="short_description" id="short_description" style="resize: none;"></textarea>
                    </td>
                </tr>

                <tr class="user-first-name-wrap">
                    <th>
                        <label for="cupp_meta"><?php _e( 'City Main Photo', 'cities-creator' ); ?></label>
                    </th>
                    <td>
                        <!-- Outputs the image after save -->
                        <div id="current_img">
                            <?php //if ( $upload_url ): ?>
                                <!-- <img class="cupp-current-img" src="<?php echo esc_url( $upload_url ); ?>"/>

                                <div class="edit_options uploaded">
                                    <a class="remove_img">
                                        <span><?php _e( 'Remove', 'cities-creator' ); ?></span>
                                    </a>

                                    <a class="edit_img" href="<?php echo esc_url( $upload_edit_url ); ?>" target="_blank">
                                        <span><?php _e( 'Edit', 'cities-creator' ); ?></span>
                                    </a>
                                </div> -->
                            <?php //elseif ( $url ) : ?>
                                <!-- <img class="cupp-current-img" src="<?php echo esc_url( $url ); ?>"/> -->
                                <!-- <div class="edit_options single">
                                    <a class="remove_img">
                                        <span><?php _e( 'Remove', 'cities-creator' ); ?></span>
                                    </a>
                                </div> -->
                            <?php //else : ?>
                                <img class="cupp-current-img placeholder"
                                     src="<?php echo esc_url( plugins_url( 'cities-creator/img/placeholder.gif' ) ); ?>"/>

                                <input type="hidden" id="city_image_s" name="city_image_s" value="<?php echo esc_url( plugins_url( 'cities-creator/img/placeholder.gif' ) ); ?>">
                            <?php //endif; ?>
                        </div>

                        <!-- Select an option: Upload to WPMU or External URL -->
                        <!-- <div id="cupp_options">
                            <input type="radio" id="upload_option" name="img_option" value="upload" class="tog" checked>
                            <label
                                    for="upload_option"><?php _e( 'Upload New Image', 'cities-creator' ); ?></label><br>

                            <input type="radio" id="external_option" name="img_option" value="external" class="tog">
                            <label
                                    for="external_option"><?php _e( 'Use External URL', 'cities-creator' ); ?></label><br>
                        </div> -->

                        <!-- Hold the value here if this is a WPMU image -->
                        <div id="cupp_upload">
                            <input class="hidden" type="hidden" name="cupp_placeholder_meta" id="cupp_placeholder_meta"
                                   value="<?php echo esc_url( plugins_url( 'cities-creator/img/placeholder.gif' ) ); ?>"/>
                            <input class="hidden" type="hidden" name="cupp_upload_meta" id="cupp_upload_meta"
                                   value="<?php echo esc_url_raw( $upload_url ); ?>"/>
                            <input class="hidden" type="hidden" name="cupp_upload_edit_meta" id="cupp_upload_edit_meta"
                                   value="<?php echo esc_url_raw( $upload_edit_url ); ?>"/>
                            <input id="uploadimage" type='button' class="cupp_wpmu_button button-primary"
                                   value="<?php _e( esc_attr( $button_text ), 'cities-creator' ); ?>"/>
                            <br/>
                            
                        </div>

                        <!-- Outputs the text field and displays the URL of the image retrieved by the media uploader -->
                        <div id="cupp_external">
                            <input class="regular-text" type="text" name="cupp_meta" id="cupp_meta"
                                   value="<?php echo esc_url_raw( $url ); ?>"/>
                        </div>

                        <!-- Outputs the save button -->
                        <!-- <span class="description"> -->
                            <?php
                            // _e(
                            //     'Upload a custom photo for your user profile or use a URL to a pre-existing photo.',
                            //     'cities-creator'
                            // );
                            ?>
                        <!-- </span>  -->
                        <p class="description">
                            <?php _e( 'Update to save your changes.', 'cities-creator' ); ?>
                        </p>
                    </td>
                </tr>

                <input type="submit" value="click" name="submit">

            </form>
        </tbody>
    </table>



            <?php 
            function display() {
                echo "hello ".$_POST["studentname"];

                global $url;

                $cname = $_POST['city_name'];
                $city_name_up = strtoupper ( $cname );
                $city_name_lw = strtolower ( $cname );
                $cshort_desc = $_POST['short_description'];
                $country_id = $_POST['country_cid'];
                $city_img_url = esc_url( get_the_author_meta( 'city_upload_meta', $user_id ) );


                $data = array(
                    'name'                      => $city_name_up,
                    'nicename'                  => $city_name_lw,
                    'city_short_description'    => $cshort_desc,
                    'city_header_img_url'       => $city_img_url,
                    'page_url'                  => '#',
                    'country_fid'               => $_POST['country_cid']
                );

                echo print_r($data);

            }
            if(isset($_POST['submit']))
            {
               display();
            } 
             ?>



    <p id="studentname" name="studentname">Data: </p>

    
    <?php 
    // Enqueue the WordPress Media Uploader.
    wp_enqueue_media();

    } ?>




<?php 
/**
 * Save the new user CUPP url.
 *
 * @param int $user_id ID of the user's profile being saved.
 */
function city_save_img_meta( $user_id ) {
    if ( ! current_user_can( 'upload_files', $user_id ) ) {
        return;
    }

    $values = array(
        // String value. Empty in this case.
        'city_meta'             => filter_input( INPUT_POST, 'city_meta', FILTER_SANITIZE_STRING ),

        // File path, e.g., http://3five.dev/wp-content/plugins/cities-creator/img/placeholder.gif.
        'city_upload_meta'      => filter_input( INPUT_POST, 'city_upload_meta', FILTER_SANITIZE_URL ),

        // Edit path, e.g., /wp-admin/post.php?post=32&action=edit&image-editor.
        'city_upload_edit_meta' => filter_input( INPUT_POST, 'city_upload_edit_meta', FILTER_SANITIZE_URL ),
    );

    foreach ( $values as $key => $value ) {
        update_user_meta( $user_id, $key, $value );
    }
}

add_action( 'personal_options_update', 'city_save_img_meta' );
add_action( 'edit_user_profile_update', 'city_save_img_meta' );

/**
 * Retrieve the appropriate image size
 *
 * @param int    $user_id      Default: $post->post_author. Will accept any valid user ID passed into this parameter.
 * @param string $size         Default: 'thumbnail'. Accepts all default WordPress sizes and any custom sizes made by
 *                             the add_image_size() function.
 *
 * @return string      (Url) Use this inside the src attribute of an image tag or where you need to call the image url.
 */
function get_city_meta( $user_id, $size = 'thumbnail' ) {
    global $post;

    if ( ! $user_id || ! is_numeric( $user_id ) ) {
        /*
         * Here we're assuming that the avatar being called is the author of the post.
         * The theory is that when a number is not supplied, this function is being used to
         * get the avatar of a post author using get_avatar() and an email address is supplied
         * for the $id_or_email parameter. We need an integer to get the custom image so we force that here.
         * Also, many themes use get_avatar on the single post pages and pass it the author email address so this
         * acts as a fall back.
         */
        $user_id = $post->post_author;
    }

    // Check first for a custom uploaded image.
    $attachment_upload_url = esc_url( get_the_author_meta( 'city_upload_meta', $user_id ) );

    if ( $attachment_upload_url ) {
        // Grabs the id from the URL using the WordPress function attachment_url_to_postid @since 4.0.0.
        $attachment_id = attachment_url_to_postid( $attachment_upload_url );

        // Retrieve the thumbnail size of our image. Should return an array with first index value containing the URL.
        $image_thumb = wp_get_attachment_image_src( $attachment_id, $size );

        return isset( $image_thumb[0] ) ? $image_thumb[0] : '';
    }

    // Finally, check for image from an external URL. If none exists, return an empty string.
    $attachment_ext_url = esc_url( get_the_author_meta( 'city_meta', $user_id ) );

    return $attachment_ext_url ? $attachment_ext_url : '';
}


/**
 * WordPress Avatar Filter
 *
 * Replaces the WordPress avatar with your custom photo using the get_avatar hook.
 *
 * @param string            $avatar     Image tag for the user's avatar.
 * @param int|object|string $identifier User object, UD or email address.
 * @param string            $size       Image size.
 * @param string            $alt        Alt text for the image tag.
 *
 * @return string
 */
function city_avatar( $avatar, $identifier, $size, $alt ) {
    if ( $user = city_get_user_by_id_or_email( $identifier ) ) {
        if ( $custom_avatar = get_city_meta( $user->ID, 'thumbnail' ) ) {
            return "<img alt='{$alt}' src='{$custom_avatar}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
        }
    }

    return $avatar;
}

add_filter( 'get_avatar', 'city_avatar', 1, 5 );

/**
 * Get a WordPress User by ID or email
 *
 * @param int|object|string $identifier User object, ID or email address.
 *
 * @return WP_User
 */
function city_get_user_by_id_or_email( $identifier ) {
    // If an integer is passed.
    if ( is_numeric( $identifier ) ) {
        return get_user_by( 'id', (int) $identifier );
    }

    // If the WP_User object is passed.
    if ( is_object( $identifier ) && property_exists( $identifier, 'ID' ) ) {
        return get_user_by( 'id', (int) $identifier->ID );
    }

    // If the WP_Comment object is passed.
    if ( is_object( $identifier ) && property_exists( $identifier, 'user_id' ) ) {
        return get_user_by( 'id', (int) $identifier->user_id );
    }

    return get_user_by( 'email', $identifier );
}


 ?>

