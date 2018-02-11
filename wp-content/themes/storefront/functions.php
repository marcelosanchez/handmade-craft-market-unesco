<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version' => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce = require 'inc/woocommerce/class-storefront-woocommerce.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}



/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';

	if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
		require 'inc/nux/class-storefront-nux-starter-content.php';
	}
}


/* Add bootstrap support to the Wordpress theme*/
 
function theme_add_bootstrap() {
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css' );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.0.0', true );
}
 
add_action( 'wp_enqueue_scripts', 'theme_add_bootstrap' );

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */




// Place this in your themes functions.php 
// This will put the menu item in your primary menu. Change the theme location if you want to change which menu this goes in. 
// Use the Free code for WC Vendors Free, use the Pro code for WC Vendors Pro

/* BEGIN WC Vendors Free */
add_filter( 'wp_nav_menu_items', 'wcv_vendors_menu', 10, 2 );
function wcv_vendors_menu ( $items, $args ) {
    if ($args->theme_location == 'primary') {
        $vendors  = get_users( array( 'role' => 'vendor' ) ); 
        $items .= '<li><a href="#">Vendors</a>'; 
        $items .= '<ul class="sub-menu">'; 
        foreach( $vendors as $vendor ) { 
            $vendor_shop_link = site_url( WC_Vendors::$pv_options->get_option( 'vendor_shop_permalink' ) .$vendor->pv_shop_slug ); 
            $items .= '<li><a href="'.$vendor_shop_link.'">'.$vendor->pv_shop_name.'</a></li>';
        }
        $items .= '</ul></li>'; 
    }
    return $items;
}
/* END WC Vendors Free */

/**
 * Load a custom template for vendor taxonomy
 */
function load_custom_vendor_template( $located, $template_name ) {
    if( is_tax( WC_PRODUCT_VENDORS_TAXONOMY ) && 'archive-product.php' == $template_name ) {
        return get_stylesheet_directory() . '/woocommerce/taxonomy-shop_vendor.php';
    }
    
    return $located;
}
add_filter( 'wc_get_template', 'load_custom_vendor_template', 10, 2 );






//hides the personal options
function hide_personal_options(){
echo "\n" . '<script type="text/javascript">jQuery(document).ready(function($) {
$(\'form#your-profile > h3:first\').hide();
$(\'form#your-profile > table:first\').hide();
$(\'form#your-profile\').show();

$(\'label[for=url], input#url\').hide();
});

</script>' . "\n";
}
//add_action('admin_head','hide_personal_options');



//remove default fields
function hide_profile_fields( $contactmethods ) {
unset($contactmethods['aim']);
unset($contactmethods['jabber']);
unset($contactmethods['yim']);
return $contactmethods;
}
add_filter('user_contactmethods','hide_profile_fields',10,1);






// *****************************************
//      ADDITIONAL PROFILE INFORMATION
// *****************************************




/* Adding Image Upload Fields */
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) 
{ 
?>

    <h3>Profile Images</h3>

    <style type="text/css">
        .fh-profile-upload-options th,
        .fh-profile-upload-options td,
        .fh-profile-upload-options input {
            vertical-align: top;
        }

        .user-preview-image {
            display: block;
            height: auto;
            width: 300px;
        }

    </style>

    <table class="form-table fh-profile-upload-options">
        <tr>
            <th>
                <label for="image">Header User Profile Image</label>
            </th>

            <td>
                <img class="user-preview-image" src="<?php echo esc_attr( get_the_author_meta( 'header_user_image', $user->ID ) ); ?>">

                <input type="text" name="header_user_image" id="header_user_image" value="<?php echo esc_attr( get_the_author_meta( 'header_user_image', $user->ID ) ); ?>" class="regular-text" />
                <input type='button' class="button-primary" value="Upload Image" id="uploadimage"/><br />

                <span class="description">Please upload an image for your profile.</span>
            </td>
        </tr>

        <tr>
            <th>
                <label for="image">Craft User Profile Image</label>
            </th>

            <td>
                <img class="user-preview-image" src="<?php echo esc_attr( get_the_author_meta( 'craft_artisan_image', $user->ID ) ); ?>">

                <input type="text" name="craft_artisan_image" id="craft_artisan_image" value="<?php echo esc_attr( get_the_author_meta( 'craft_artisan_image', $user->ID ) ); ?>" class="regular-text" />
                <input type='button' class="button-primary" value="Upload Image" id="sidebarUploadimage"/><br />

                <span class="description">Please upload an image for the sidebar.</span>
            </td>
        </tr>


        <tr>
            <th>
                <label for="image">Craft User Elaboration Text:</label>
            </th>
            <td>
                <input type="text" name="user_craft_elaboration_text" id="user_craft_elaboration_text" value="<?php echo esc_attr ( get_the_author_meta( 'user_craft_elaboration_text', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter crafts elaboration text.</span>
            </td>
        </tr>
    </table>

    <script type="text/javascript">
        var image_field,
            store_send_to_editor = null,
            new_send_to_editor = null;

        jQuery( function( $ ) {
            store_send_to_editor = window.send_to_editor;
            new_send_to_editor = function(html) {
                imgurl = $( 'img', $( html ) ).attr( 'src' );
                image_field.val( imgurl );
                tb_remove();
                window.send_to_editor = store_send_to_editor;
            };
            $( document ).on( 'click', 'input.select-img', function( evt ) {
                image_field = $( this ).siblings( '.img' );
                check_flag  = 1;
                tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
                window.sent_to_editor = new_send_to_editor;
                return false;
            } );
        } );


        (function( $ ) {
            $( 'input#uploadimage' ).on( 'click', function() {
                image_field = $( this ).siblings( '.img' );
                check_flag  = 1;

                tb_show( 'test', 'media-upload.php?type=image&amp;TB_iframe=true' );

                window.send_to_editor = function( html ) {
                    imgurl = $( 'img', html ).attr( 'src' );
                    image_field.val( imgurl );
                    tb_remove();
                }

                return false;
            });

            $( 'input#sidebarUploadimage' ).on('click', function() {
                tb_show('', 'media-upload.php?type=image&TB_iframe=true');

                window.send_to_editor = function( html ) 
                {
                    imgurl = $( 'img', $( html ) ).attr( 'src' );
                    $( '#craft_artisan_image' ).val(imgurl);
                    tb_remove();
                }

                return false;
            });
        })(jQuery);
    </script>

<?php 
}




add_action( 'admin_enqueue_scripts', 'enqueue_admin' );

function enqueue_admin()
{
    wp_enqueue_script( 'thickbox' );
    wp_enqueue_style('thickbox');

    wp_enqueue_script('media-upload');
}




add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
    {
        return false;
    }

    update_usermeta( $user_id, 'header_user_image', $_POST[ 'header_user_image' ] );
    update_usermeta( $user_id, 'craft_artisan_image', $_POST[ 'craft_artisan_image' ] );
    update_usermeta( $user_id, 'user_craft_elaboration_text', $_POST[ 'user_craft_elaboration_text' ] );
}









// *****************************************
//      ADDITIONAL PROFILE INFORMATION
// *****************************************







/****************************  LOGIN  ****************************/
// add_filter('wp_nav_menu_items', 'add_login_logout_link', 10, 2);
// function add_login_logout_link($items, $args) {
//         ob_start();
//         wp_loginout('index.php');
//         $loginoutlink = ob_get_contents();
//         ob_end_clean();
//         $items .= '<li>'. $loginoutlink .'</li>';
//     return $items;
// }
/*****************************************************************/


/**
 * GET PATHS
 */
function get_uploads_path () {
    $upload_direct = content_url() . '/uploads' ;
    return $upload_direct;
}

function get_styles_path () {
    $upload_direct = content_url() . '/uploads/css' ;
    return $upload_direct;
}

function get_scripts_path () {
    $upload_direct = content_url() . '/uploads/js' ;
    return $upload_direct;
}

function get_images_path () {
    $upload_direct = content_url() . '/uploads/img' ;
    return $upload_direct;
}

function get_videos_path () {
    $upload_direct = content_url() . '/uploads/video' ;
    return $upload_direct;
}

function get_fonts_path () {
    $upload_direct = content_url() . '/uploads/font' ;
    return $upload_direct;
}


/**
 * Add Custom Scripts
 */


function wpb_adding_scripts() {
    wp_register_script('global_script', get_scripts_path() . '/hos_custom/hos_custom.js', array('jquery'),'1.1', true);
    wp_enqueue_script('global_script');


    if ( is_page( 'login' ) || is_page( 'register' ) || is_page( 'password-reset' ) ) {
        wp_register_script( 'loginout_script', get_scripts_path() . '/page_loginout/loginout_page.js', array('jquery'),'1.1', true);
        wp_enqueue_script('loginout_script');
    }

    // HOME - SCRIPT
    if ( is_page_template( 'page_home-custom.php' ) ) {
        wp_register_script( 'home_script', get_scripts_path() . '/page_home/home_page.js', array('jquery'),'1.1', true);
        wp_enqueue_script('home_script');
    }

    // ----------------------------------------------------------------
    // HOME - SCRIPT
    if ( is_page_template( 'page_home-custom.php' ) ) {
        wp_register_script( 'home_script', get_scripts_path() . '/page_home/home_page.js', array('jquery'),'1.1', true);
        wp_enqueue_script('home_script');
    }

    // ----------------------------------------------------------------
    // SHOP - SCRIPT
    if ( is_shop() ) {
    }

    // PRODUCT SINGLE - SCRIPT
    if ( is_product() ) {
        wp_register_script( 'single_product_script', get_scripts_path() . '/page_wc_product_single/product_single_page.js', array('jquery'),'1.1', true);
        wp_enqueue_script( 'single_product_script' );
    }

    // ----------------------------------------------------------------
    // ARTISAN

    if ( is_page( 'artisan_dashboard' ) ) {
        wp_register_script( 'artisan_dashboard_script', get_scripts_path() . '/page_artisan_dashboard/artisan_dashboard_page.js', array('jquery'),'1.1', true);
        wp_enqueue_script( 'artisan_dashboard_script' );
    }

    // if ( is_page( 'artisan_dashboard/shop_settings' ) ) {
    //     wp_register_script( 'artisan_shopsettings_script', get_scripts_path() . '/page_artisan_shopsettings/artisan_shopsettings_page.js', array('jquery'),'1.1', true);
    //     wp_enqueue_script( 'artisan_shopsettings_script' );
    // }


    // CART - SCRIPT
    if ( is_cart() ) {
    }

    // CHECKOUT - SCRIPT
    if ( is_checkout() ) {
    }
    // ----------------------------------------------------------------
    

    // CITY SINGLE - SCRIPT
        if ( is_page_template( 'page_city_single-custom.php' ) ) {
            wp_register_script( 'cities_script', get_scripts_path() . '/page_city_single/city_single_page.js', array('jquery'),'1.1', true);
            wp_enqueue_script( 'cities_script' );
        }


    // ABOUT US - CSS
    if ( is_page_template( 'page_about-custom.php' ) ) {
        wp_register_script( 'about_script', get_scripts_path() . '/page_aboutus/aboutus_page.js' );
        wp_register_script( 'about_script' );
    }

}
add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );  


/**
 * Add Custom STYLE CSS
 */

function wpb_adding_styles() {
    // GENERAL - CSS
    wp_enqueue_style( 'global_stylesheet', get_styles_path() . '/hos_custom/hos_custom.css' );
    wp_enqueue_style( 'global_stylesheet' );

    // FOOTER - CSS
    wp_enqueue_style( 'footer_stylesheet', get_styles_path() . '/page_g_footer/footer_g_page.css' );
    wp_enqueue_style( 'footer_stylesheet' );


    if ( is_page( 'login' ) || is_page( 'register' ) || is_page( 'password-reset' ) ) {
        wp_enqueue_style( 'loginout_stylesheet', get_styles_path() . '/page_loginout/loginout_page.css' );
        wp_enqueue_style( 'loginout_stylesheet' );
    }


    // HOME - CSS
    if ( is_page_template( 'page_home-custom.php' ) ) {
        wp_enqueue_style( 'home_stylesheet', get_styles_path() . '/page_home/home_page.css' );
        wp_enqueue_style( 'home_stylesheet' );
    }

    // ----------------------------------------------------------------

    // SHOP - CSS
    if ( is_shop() ) {
        wp_enqueue_style( 'shop_wc_stylesheet', get_styles_path() . '/page_wc_shop/shop_page.css' );
        wp_enqueue_style( 'shop_wc_stylesheet' );
    }

    // PRODUCT SINGLE - CSS
    if ( is_product() ) {
        wp_enqueue_style( 'product_single_wc_stylesheet', get_styles_path() . '/page_wc_product_single/product_single_page.css' );
        wp_enqueue_style( 'product_single_wc_stylesheet' );
    }

    // CART - CSS
    if ( is_cart() ) {
        wp_enqueue_style( 'cart_wc_stylesheet', get_styles_path() . '/page_wc_cart/cart_page.css' );
        wp_enqueue_style( 'cart_wc_stylesheet' );
    }

    // CHECKOUT - CSS
    if ( is_checkout() ) {
        wp_enqueue_style( 'checkout_wc_stylesheet', get_styles_path() . '/page_wc_checkout/checkout_page.css' );
        wp_enqueue_style( 'checkout_wc_stylesheet' );
    }

    // ----------------------------------------------------------------


    if ( is_page( 'artisan_dashboard' ) ) {
        wp_enqueue_style( 'artisan_dashboard_stylesheet', get_styles_path() . '/page_artisan_dashboard/artisan_dashboard_page.css' );
        wp_enqueue_style( 'artisan_dashboard_stylesheet' );
    }

    if ( is_page( 'shop_settings' ) ) {
        wp_enqueue_style( 'artisan_shopsettings_stylesheet', get_styles_path() . '/page_artisan_shopsettings/artisan_shopsettings_page.css' );
        wp_enqueue_style( 'artisan_shopsettings_stylesheet' );
    }

    // ARTISANS - CSS
    if ( is_page_template( 'page_artisans-custom.php' ) ) {
        wp_enqueue_style( 'artisans_stylesheet', get_styles_path() . '/page_artisans/artisans_page.css' );
        wp_enqueue_style( 'artisans_stylesheet' );
    }
        // ARTISAN SINGLE - CSS
        if ( is_page_template( 'page_artisan_single-custom.php' ) ) {
            wp_enqueue_style( 'artisans_stylesheet', get_styles_path() . '/page_artisan_single/artisan_single_page.css' );
            wp_enqueue_style( 'artisans_stylesheet' );
        }

    // HANDICRAFT - CSS
    if ( is_page_template( 'page_handicraft-custom.php' ) ) {
        wp_enqueue_style( 'handicrafts_stylesheet', get_styles_path() . '/page_handicraft/handicrafts_page.css' );
        wp_enqueue_style( 'handicrafts_stylesheet' );
    }

    // CITIES - CSS
    if ( is_page_template( 'page_cities-custom.php' ) ) {
        wp_enqueue_style( 'cities_stylesheet', get_styles_path() . '/page_cities/cities_page.css' );
        wp_enqueue_style( 'cities_stylesheet' );
    }

        // CITY SINGLE - CSS
        if ( is_page_template( 'page_city_single-custom.php' ) ) {
            wp_enqueue_style( 'cities_stylesheet', get_styles_path() . '/page_city_single/city_single_page.css' );
            wp_enqueue_style( 'cities_stylesheet' );
        }

    // ABOUT US - CSS
    if ( is_page_template( 'page_about-custom.php' ) ) {
        wp_enqueue_style( 'about_stylesheet', get_styles_path() . '/page_aboutus/aboutus_page.css' );
        wp_enqueue_style( 'about_stylesheet' );
    }
}
add_action( 'wp_enqueue_scripts', 'wpb_adding_styles' );
