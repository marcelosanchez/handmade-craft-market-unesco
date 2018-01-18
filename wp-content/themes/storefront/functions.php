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








// Add custom Slider ID field to 'Edit Page'
add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add() {
    add_meta_box( 'my-meta-box-id', 'Campo 1', 'cd_meta_box_cb', 'page', 'normal', 'high' );
    add_meta_box( 'my-meta-box-id2', 'Campo 2', 'cd_meta_box_cb', 'page', 'normal', 'high' );
}
function cd_meta_box_cb( $post ) {
    $values = get_post_custom( $post->ID );
    $text = isset( $values['my_meta_box_text'] ) ? esc_attr( $values['my_meta_box_text'][0] ) : '';
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <p>
        <!-- <label for="my_meta_box_text">Add City Info</label> -->
        <textarea name="my_meta_box_text" id="my_meta_box_text" style="width:100%; resize: none;" cols="30" rows="10" value="<?php echo $text; ?>"></textarea>
        <!-- <input type="text" name="my_meta_box_text" id="my_meta_box_text" value="<?php echo $text; ?>" /> -->
    </p>
    <?php   
}
add_action( 'save_post', 'cd_meta_box_save' );
function cd_meta_box_save( $post_id ) {
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post', $post_id ) ) return;
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchords can only have href attribute
        )
    );
    // Probably a good idea to make sure your data is set
    if( isset( $_POST['my_meta_box_text'] ) )
        update_post_meta( $post_id, 'my_meta_box_text', wp_kses( $_POST['my_meta_box_text'], $allowed ) );
}

/**
 * Add Custom Scripts
 */


function wpb_adding_scripts() {
    wp_register_script('global_script', get_template_directory_uri() . '../../../uploads/js/hos_custom/hos_custom.js', array('jquery'),'1.1', true);
    wp_enqueue_script('global_script');

    // HOME - CSS
    if ( is_page_template( 'page_home-custom.php' ) ) {
        wp_register_script( 'home_script', get_template_directory_uri() . '../../../uploads/js/page_home/home_page.js', array('jquery'),'1.1', true);
        wp_enqueue_script('home_script');
    }

}
add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );  




/**
 * Add Custom STYLE CSS
 */

function wpb_adding_styles() {
    // GENERAL - CSS
    wp_enqueue_style( 'global_stylesheet', get_stylesheet_directory_uri() . '../../../uploads/css/hos_custom/hos_custom.css' );
    wp_enqueue_style( 'global_stylesheet' );

    // FOOTER - CSS
    wp_enqueue_style( 'footer_stylesheet', get_stylesheet_directory_uri() . '../../../uploads/css/page_g_footer/footer_g_page.css' );
    wp_enqueue_style( 'footer_stylesheet' );

    // HOME - CSS
    if ( is_page_template( 'page_home-custom.php' ) ) {
        wp_enqueue_style( 'home_stylesheet', get_stylesheet_directory_uri() . '../../../uploads/css/page_home/home_page.css' );
        wp_enqueue_style( 'home_stylesheet' );
    }

    // ----------------------------------------------------------------

    // SHOP - CSS
    if ( is_shop() ) {
        wp_enqueue_style( 'shop_wc_stylesheet', get_stylesheet_directory_uri() . '../../../uploads/css/page_wc_shop/shop_page.css' );
        wp_enqueue_style( 'shop_wc_stylesheet' );
    }

    // PRODUCT SINGLE - CSS
    if ( is_product() ) {
        wp_enqueue_style( 'product_single_wc_stylesheet', get_stylesheet_directory_uri() . '../../../uploads/css/page_wc_product_single/product_single_page.css' );
        wp_enqueue_style( 'product_single_wc_stylesheet' );
    }

    // PRODUCT SINGLE - CSS
    if ( is_cart() ) {
        wp_enqueue_style( 'cart_wc_stylesheet', get_stylesheet_directory_uri() . '../../../uploads/css/page_wc_cart/cart_page.css' );
        wp_enqueue_style( 'cart_wc_stylesheet' );
    }

    // CHECKOUT - CSS
    if ( is_checkout() ) {
        wp_enqueue_style( 'checkout_wc_stylesheet', get_stylesheet_directory_uri() . '../../../uploads/css/page_wc_checkout/checkout_page.css' );
        wp_enqueue_style( 'checkout_wc_stylesheet' );
    }

    // ----------------------------------------------------------------

    // ARTISANS - CSS
    if ( is_page_template( 'page_artisans-custom.php' ) ) {
        wp_enqueue_style( 'artisans_stylesheet', get_stylesheet_directory_uri() . '../../../uploads/css/page_artisans/artisans_page.css' );
        wp_enqueue_style( 'artisans_stylesheet' );
    }

    // HANDICRAFT - CSS
    if ( is_page_template( 'page_handicraft-custom.php' ) ) {
        wp_enqueue_style( 'handicrafts_stylesheet', get_stylesheet_directory_uri() . '../../../uploads/css/page_handicraft/handicrafts_page.css' );
        wp_enqueue_style( 'handicrafts_stylesheet' );
    }

    // CITIES - CSS
    if ( is_page_template( 'page_cities-custom.php' ) ) {
        wp_enqueue_style( 'cities_stylesheet', get_stylesheet_directory_uri() . '../../../uploads/css/page_cities/cities_page.css' );
        wp_enqueue_style( 'cities_stylesheet' );
    }

    // ABOUT US - CSS
    if ( is_page_template( 'page_about-custom.php' ) ) {
        wp_enqueue_style( 'about_stylesheet', get_stylesheet_directory_uri() . '../../../uploads/css/page_aboutus/aboutus_page.css' );
        wp_enqueue_style( 'about_stylesheet' );
    }
}
add_action( 'wp_enqueue_scripts', 'wpb_adding_styles' );
