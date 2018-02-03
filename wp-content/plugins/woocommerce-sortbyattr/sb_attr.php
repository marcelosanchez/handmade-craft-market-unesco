<?php
/**
 * Plugin Name: WooCommerce - List Products by Attributes
 * Plugin URI: http://www.remicorson.com/list-woocommerce-products-by-attributes/
 * Description: List WooCommerce products by attributes using a shortcode, ex: [woo_products_by_attributes attribute="colour" values="red,black" per_page="5"]
 * Version: 1.0
 * Author: Remi Corson
 * Author URI: http://remicorson.com
 * Requires at least: 3.5
 * Tested up to: 3.5
 *
 * Text Domain: -
 * Domain Path: -
 *
 */
 
/*
 * List WooCommerce Products by attributes
 *
 * ex: [woo_products_by_attributes attribute="colour" values="red,black" per_page="5"]
 */
function woo_products_by_attributes_shortcode( $atts, $content = null ) {

  global $woocommerce, $woocommerce_loop;

	// Get attribuets
	extract(shortcode_atts(array(
		'attribute' => '',
		'values'     => '',
		'per_page'  => '12',
		'columns'   => '4',
	  	'orderby'   => 'title',
	  	'order'     => 'desc',
	), $atts));
	
	if ( ! $attribute ) return;
	
	// Default ordering args
	$ordering_args = $woocommerce->query->get_catalog_ordering_args( $orderby, $order );
	
	// Define Query Arguments
	$args = array( 
				'post_type'				=> 'product',
				'post_status' 			=> 'publish',
				'ignore_sticky_posts'	=> 1,
				'orderby' 				=> $ordering_args['orderby'],
				'order' 				=> $ordering_args['order'],
				'posts_per_page' 		=> $per_page,
				'meta_query' 			=> array(
					array(
						'key' 			=> '_visibility',
						'value' 		=> array('catalog', 'visible'),
						'compare' 		=> 'IN'
					)
				),
				'tax_query' 			=> array(
			    	array(
				    	'taxonomy' 		=> 'pa_' . $attribute,
						'terms' 		=> explode(",",$values),
						'field' 		=> 'slug',
						'operator' 		=> 'IN'
					)
			    )
			);
	
	ob_start();
	
	$products = new WP_Query( $args );

	$woocommerce_loop['columns'] = $columns;

	if ( $products->have_posts() ) : ?>

		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php woocommerce_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>

	<?php endif;

	wp_reset_postdata();

	return '<div class="woocommerce">' . ob_get_clean() . '</div>';
 
}
 
add_shortcode("woo_products_by_attributes", "woo_products_by_attributes_shortcode");



