<?php
/**
 *
 * Template Name: Artisan Sinlge Custom
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */


global $wpdb;

$artisan_email = get_field( 'artisan_email' );

$table_name = $wpdb->prefix . "users";
$user_id = $wpdb->get_var( "SELECT id FROM $table_name WHERE user_email='$artisan_email'" );
$display_name = $wpdb->get_var( "SELECT display_name FROM $table_name WHERE user_email='$artisan_email'" );



get_header(); ?>

<link rel="stylesheet" type="text/css" href="<?php echo get_styles_path() ?>/page_wc_product_card/product_card_page.css">

<!-- ARTISANS PAGE -->

<!-- EO / ARTISANS PAGE -->


<div id="primary" class="content-area">
	<main id="main" class="site-main city_main_cont" role="main">

		
		<!-- ********************************** -->

		<div class="row" style="padding-top: 0px;">
			<div class="col-md-12 artisan_header" style="background: linear-gradient(rgba(0, 0, 0, .3), rgba(0, 0, 0, .3)),  url(<?php the_field( 'profile_banner_img' ); ?>);">
				<div class="profile_img_cont col-md-12">
					<img class="col-md-2" src="<?php the_field( 'profile_img' ); ?>" alt="">
					<h1 data-id="<?php echo $user_id ?>"><?php echo $display_name ?></h1>
					<h3><?php the_field( 'artisan_city' ); ?></h3>
				</div>
			</div>
		</div>

		<!-- ********************************** -->

		<div class="row centered_content artisan_desc_main_text col-md-6" style="padding-top: 60px;">
			<h5>My History</h5>
			<p class="">
				<?php the_field( 'my_history_text' ); ?>
			</p>
		</div>

		<!-- ********************************** -->

		<div class="row" style="padding-top: 60px;">
			<div class="col-md-6 half-artisan-desc-text">
				<h5>Craft's Elaboration</h5>
				<p>
					<?php the_field( 'crafts_elaboration' ); ?>
				</p>
			</div>
			<div class="col-md-6 half-artisan-desc-img" style="background: linear-gradient(rgba(0, 0, 0, .3), rgba(0, 0, 0, .3)),  url(<?php the_field( 'crafts_elaboration_image' ); ?>);">
				<!-- <img class="img-full-div" src="<?php the_field( 'crafts_elaboration_image' ); ?>" alt=""> -->
			</div>
		</div>
		
		<!-- ********************************** -->

		<div class="row centered_content handicrafts_section" style="padding-top: 60px;">
			
			<h3>Handicrafts</h3>

			<div class="row">
				<?php 
					$args = apply_filters('woocommerce_related_products_args', array(
					        'post_type'                             => 'product',
					        'ignore_sticky_posts'   => 1,
					        'no_found_rows'                 => 1,
					        'posts_per_page'                => $posts_per_page,
					        'orderby'                               => $orderby,
					        'author'                                => $user_id,
					        'post__not_in'                  => array($product->id)
					) );
					$products = new WP_Query( $args );
					$woocommerce_loop['columns']    = $columns;
					if ( $products->have_posts() ) : ?>

			        <div class="columns-3">
		                <?php woocommerce_product_loop_start(); ?>
	                        <?php while ( $products->have_posts() ) : $products->the_post(); ?>
	                            <?php woocommerce_get_template_part( 'content', 'product' ); ?>
	                        <?php endwhile; // end of the loop. ?>
		                <?php woocommerce_product_loop_end(); ?>
			        </div>

				<?php endif;
				wp_reset_postdata();
				?>
			</div>
		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
