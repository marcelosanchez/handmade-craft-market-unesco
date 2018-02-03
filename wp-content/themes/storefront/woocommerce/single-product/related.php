<?php
/**
 * Related Products By Same Author
 * THIS FILE GOES IN /themes/YOURTHEME/woocommerce/single-product/related.php
 * @author              WooThemes
 * @package     WooCommerce/Templates
 * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $product, $woocommerce_loop;
$artist = get_the_author_meta('ID');
//Get url to put in related products title
$sold_by = WCV_Vendors::is_vendor( $artist )
                        ? sprintf( '<a href="%s" class="wcvendors_cart_more_work_by">%s</a>', WCV_Vendors::get_vendor_shop_page( $artist ), WCV_Vendors::get_vendor_sold_by( $artist ) )
                        : get_bloginfo( 'name' );

if ( class_exists( 'WCVendors_Pro' ) ) { 
        $store_url = WCVendors_Pro_Vendor_Controller::get_vendor_store_url( get_the_author_id() );
        $sold_by  = '<a href="'.$store_url.'" class="wcvendors_cart_more_work_by">'.WCV_Vendors::get_vendor_sold_by( $artist ).'</a>';
}

$args = apply_filters('woocommerce_related_products_args', array(
        'post_type'                             => 'product',
        'ignore_sticky_posts'   => 1,
        'no_found_rows'                 => 1,
        'posts_per_page'                => $posts_per_page,
        'orderby'                               => $orderby,
        'author'                                => $artist,
        'post__not_in'                  => array($product->id)
) );
$products = new WP_Query( $args );
$woocommerce_loop['columns']    = $columns;
if ( $products->have_posts() ) : ?>

        <section class="related products">

<?php echo apply_filters('wcvendors_cart_more_work_by', __( 'More work by: ', 'wcvendors' )) . $sold_by . '<br/>'; ?>

                <?php woocommerce_product_loop_start(); ?>

                        <?php while ( $products->have_posts() ) : $products->the_post(); ?>

                                <?php woocommerce_get_template_part( 'content', 'product' ); ?>

                        <?php endwhile; // end of the loop. ?>

                <?php woocommerce_product_loop_end(); ?>

        </section>

<?php endif;
wp_reset_postdata();