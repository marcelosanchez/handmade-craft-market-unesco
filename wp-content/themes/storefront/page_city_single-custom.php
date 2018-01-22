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
	background: linear-gradient(rgba(0, 0, 0, .8), rgba(0, 0, 0, .8)), url(<?php the_field( 'city_header_image' ); ?>)no-repeat center center fixed; 
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}
</style>


<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="col-md-12 cityPage_header parallax">
			<h1><?php the_field( 'city_name' ); ?></h1>
			<h2><i class="fa fa-map-marker" aria-hidden="true"></i> <?php the_field( 'country_name' ); ?></h2>
		</div>

		<div class="row centered_content p_img_cont cities_head">
			Chordeleg
			
		</div>


	</main><!-- #main -->
</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
