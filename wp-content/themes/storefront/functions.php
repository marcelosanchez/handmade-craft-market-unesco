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








//////////////////////////////////////////////////////////////////////////////////////////////


/**
 * Send debug code to the Javascript console
 */ 
function debug_PHP_console($data) {
    if(is_array($data) || is_object($data)) {
        echo("<script>console.log('PHP_arr_obj: ".json_encode($data)."');</script>");
        echo("<script>console.log('PHP_r: ".print_r($data)."');</script>");
    } else {
        echo("<script>console.log('PHP_val: ".$data."');</script>");
    }
}

//////////////////////////////////////////////////////////////////////////////////////////////



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


