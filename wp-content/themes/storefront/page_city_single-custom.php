<?php
/**
 *
 * Template Name: City Single Custom
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */

get_header(); ?>


<style type="text/css">
.cityPage_header {
	background: linear-gradient(rgba(0, 0, 0, .8), rgba(0, 0, 0, .7)), url(<?php the_field( 'city_header_image' ); ?>)no-repeat center center fixed; 
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}
</style>


<div id="primary" class="content-area">
	<main id="main" class="site-main city_main_cont" role="main">

		<div class="col-md-12 cityPage_header parallax">
			<h1><?php the_field( 'city_name' ); ?></h1>
			<h2><i class="fa fa-map-marker" aria-hidden="true"></i> <?php the_field( 'country_name' ); ?></h2>
		</div>

		<div class="row centered_content" style="padding-top: 60px;">
			<div class="col-md-6 col-unspaced squaredImg">
				<img  style="padding: 10%;" src="<?php the_field( 'city_first_image' ); ?>" alt="image">
				
				<div class="city_logo_main_cont">
					<div class="squaredImg">
						<img src="<?php the_field( 'city_logo' ); ?>" alt="City Logo">
					</div>
				</div>
			</div>
			<div class="col-md-6 col-unspaced col2-text">
				<!-- <h1>First Custom Title</h1> -->
				<p class="p_tex elipsis-6l"><?php the_field( 'first_city_description' ); ?></p>
			</div>
		</div>

		<div class="row centered_content" style="padding-top: 60px;">
			<div class="col-md-6 col-unspaced col2-text">
				<!-- <h1>First Custom Title</h1> -->
				<p class="p_tex elipsis-6l"><?php the_field( 'second_city_description' ); ?></p>
			</div>
			<div class="col-md-6 col-unspaced squaredImg">
				<img src="<?php the_field( 'city_second_image' ); ?>" alt="image">
			</div>
		</div>


		<div class="row centered_content" style="padding-top: 120px;">
			<div class="col-md-3 col-unspaced col3-desc card">
				<div class="section_icon">
					<div class="circle_cont">
						<img src="<?php echo get_images_path(); ?>/city/weather_icon.png" alt="ico">
					</div>
				</div>
				<h4>Weather</h4>
				<span><?php the_field( 'weather_info' ); ?></span>
			</div>
			<div class="col-md-3 col-unspaced col3-desc card">
				<div class="section_icon">
					<div class="circle_cont">
						<img src="<?php echo get_images_path(); ?>/city/transport_icon.png" alt="ico">
					</div>
				</div>
				<h4>Transport</h4>
				<span><?php the_field( 'transport_info' ); ?></span>
			</div>
			<div class="col-md-3 col-unspaced col3-desc card">
				<div class="section_icon">
					<div class="circle_cont">
						<img src="<?php echo get_images_path(); ?>/city/tourist_icon.png" alt="ico">
					</div>
				</div>
				<h4>Tourist Attractions</h4>
				<span><?php the_field( 'tourist_attractions_info' ); ?></span>
			</div>
		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
