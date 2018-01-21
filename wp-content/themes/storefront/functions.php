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
    // SHOP - CSS
    if ( is_shop() ) {
    }

    // PRODUCT SINGLE - CSS
    if ( is_product() ) {
        wp_register_script( 'single_product_script', get_scripts_path() . '/page_wc_product_single/product_single_page.js', array('jquery'),'1.1', true);
        wp_enqueue_script( 'single_product_script' );
    }

    // CART - CSS
    if ( is_cart() ) {
    }

    // CHECKOUT - CSS
    if ( is_checkout() ) {
    }
    // ----------------------------------------------------------------

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

    // ARTISANS - CSS
    if ( is_page_template( 'page_artisans-custom.php' ) ) {
        wp_enqueue_style( 'artisans_stylesheet', get_styles_path() . '/page_artisans/artisans_page.css' );
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

    // ABOUT US - CSS
    if ( is_page_template( 'page_about-custom.php' ) ) {
        wp_enqueue_style( 'about_stylesheet', get_styles_path() . '/page_aboutus/aboutus_page.css' );
        wp_enqueue_style( 'about_stylesheet' );
    }
}
add_action( 'wp_enqueue_scripts', 'wpb_adding_styles' );
