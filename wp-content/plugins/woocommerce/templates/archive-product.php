<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

	$vendor_shop = urldecode( get_query_var( 'vendor_shop' ) );
	$vendor_id   = WCV_Vendors::get_vendor_id( $vendor_shop );


	$artisan_info = get_userdata($vendor_id);

	$crafts_elaboration_text = get_the_author_meta('user_craft_elaboration_text', $vendor_id);

      


get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

    <header class="woocommerce-products-header" style="display: none;">

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>

		<?php endif; ?>

		
		
    </header>

    <?php 
    	if ( $vendor_id ) {	
	    	wp_enqueue_style( 'artisans_stylesheet', get_styles_path() . '/page_artisan_single/artisan_single_page.css' );
	        wp_enqueue_style( 'artisans_stylesheet' );
    	} else {
     ?>

    <div class="col-md-12 gPage_hCont parallax">
    	Shop
    </div>

	<?php } ?>
	

    <?php 
      if ( $vendor_id ) {
    ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main city_main_cont" role="main">

			
			<!-- ********************************** -->
			
			<?php $authorImage = get_the_author_meta('header_user_image', $vendor_id); ?>

			<div class="row" style="padding-top: 0px;">
				<!-- <div class="col-md-12 artisan_header" style="background: linear-gradient(rgba(0, 0, 0, .3), rgba(0, 0, 0, .3)),  url(<?php echo get_uploads_path (); ?>/ultimatemember/<?php echo $vendor_id ?>/cover_photo-600.jpg?1517819883);"> -->
				<div class="col-md-12 artisan_header" style="background: linear-gradient(rgba(0, 0, 0, .3), rgba(0, 0, 0, .3)),  url(http://200.10.147.158/wp-content/uploads/2018/02/IMG_9083.jpg);">
					<div class="profile_img_cont col-md-12">
						<img class="col-md-2" src="<?php echo get_uploads_path (); ?>/ultimatemember/<?php echo $vendor_id ?>/profile_photo-190.jpg?1517819883" alt="">
						
						<h1 data-id="<?php echo $vendor_id ?>"> <?php echo $artisan_info->first_name .  " " . $artisan_info->last_name ; ?>  </h1>
						<h3><?php echo the_author_meta( 'billing_city', $vendor_id ); ?></h3>
					</div>
				</div>
			</div>

			<!-- ********************************** -->

			<div class="row centered_content artisan_desc_main_text col-md-6" style="padding-top: 60px;">
				<h5>My History</h5>
				<p class="">
					<?php echo the_author_meta( 'description', $vendor_id ); ?>
				</p>
			</div>

			<!-- ********************************** -->

			<div class="row" style="padding-top: 60px;">
				<div class="col-md-6 half-artisan-desc-text">
					<h5>Craft's Elaboration</h5>
					<p>
						<?php 
							echo $crafts_elaboration_text;
						?>

					</p>
				</div>
				<!-- <div class="col-md-6 half-artisan-desc-img" style="background: linear-gradient(rgba(0, 0, 0, .3), rgba(0, 0, 0, .3)),  url(<?php the_field( 'crafts_elaboration_image' ); ?>);"> -->
				<div class="col-md-6 half-artisan-desc-img" style="background: linear-gradient(rgba(0, 0, 0, .3), rgba(0, 0, 0, .3)),  url(http://200.10.147.158/wp-content/uploads/2018/02/IMG_9077.jpg);">
					<!-- <img class="img-full-div" src="<?php the_field( 'crafts_elaboration_image' ); ?>" alt=""> -->
				</div>
			</div>
			
			<!-- ********************************** -->

	<div class="row centered_content handicrafts_section" style="padding-top: 60px;">
			
			<h3>Handicrafts</h3>
	</div>

	<?php
    } else {
    	//echo 'This is a regular shop page, and not a vendor store';
    }

     ?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked wc_print_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/**
						 * woocommerce_shop_loop hook.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );
					?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php
				/**
				 * woocommerce_no_products_found hook.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer(); ?>
<?php //get_footer( 'shop' ); ?>
