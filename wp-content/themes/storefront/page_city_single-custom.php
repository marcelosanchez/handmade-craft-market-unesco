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



global $wpdb;

  $table_name = $wpdb->prefix . "city";
  //FROM TEMPLATE
  $current_city = get_field( 'city_name' ); 

  $city_cid = $wpdb->get_var( "SELECT DISTINCT city_id FROM $table_name WHERE UPPER(name) LIKE UPPER('%$current_city%')" );





get_header(); ?>


<style type="text/css">
/*.cityPage_header {
	background: linear-gradient(rgba(0, 0, 0, .8), rgba(0, 0, 0, .7)), url(<?php the_field( 'city_header_image' ); ?>)no-repeat center center fixed; 
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}*/
</style>


<div id="primary" class="content-area">
	<main id="main" class="site-main city_main_cont" role="main">

		<div class="col-md-12 cityPage_header parallax">
			<h1><?php the_field( 'city_name' ); ?></h1>
			<h2><?php the_field( 'country_name' ); ?></h2>
		</div>

		<!-- META INFO -->
		<!-- <p><?php echo $table_name ?></p>
		<p><?php echo $current_city ?></p>
		<p><?php echo $city_cid ?></p> -->


		<div id="city_carousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#city_carousel" data-slide-to="0" class="active"></li>
				<li data-target="#city_carousel" data-slide-to="1"></li>
				<li data-target="#city_carousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active">
					<img class="d-block img-fluid" src="<?php the_field( 'slider_image_1' ); ?>" alt="First slide">
					
					<!-- <div class="carousel-caption d-none d-md-block">
						<h3> Image H3 Text</h3>
						<p> Image p desc </p>
					</div> -->
				</div>
				<div class="carousel-item">
					<img class="d-block img-fluid" src="<?php the_field( 'slider_image_2' ); ?>" alt="Second slide">
				</div>
				<div class="carousel-item">
					<img class="d-block img-fluid" src="<?php the_field( 'slider_image_3' ); ?>" alt="Third slide">
				</div>
			</div>
			<a class="carousel-control-prev" href="#city_carousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#city_carousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

		<div class="row centered_content city_desc_main_text" style="padding-top: 60px;">
			<span>
				<?php the_field( 'city_short_description' ); ?>
			</span>
		</div>

		<div class="row" style="padding-top: 60px;">
			<div class="col-md-6 half-city-desc-img">
				<img class="img-artisan-div" src="<?php the_field( 'city_representative_image' ); ?>" alt="">
			</div>
			<div class="col-md-6 half-city-desc-text">
				<span>
					<?php the_field( 'city_representative_description' ); ?>
				</span>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4 left-city-menu">
				
				<ul class="nav flex-column" id="city_navbar">
					<li class="nav-item">
						<a class="nav-link active" onclick="selectCityNav(this,'1');"><?php echo __('[:en]When to go to[:es]Cuando visitar[:pb]Quando ir para'); ?> <?php the_field( 'city_name' ); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" onclick="selectCityNav(this,'2');"><?php echo __('[:en]Transport[:es]Transporte[:pb]Transporte'); ?></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" onclick="selectCityNav(this,'3');"><?php echo __('[:en]Tourist Attractions[:es]Atracciones Turísticas[:pb]Atrações Turísticas'); ?></a>
					</li>
				</ul>

			</div>
			<div class="col-md-8 right-city-images">
				<div class="image_1 img_cont">
					<img class="img-full-div" src="<?php the_field( 'weather_image' ); ?>" alt="">
					<div class="hidden-pos-div">
						<div class="image_description">
							<span>
								<?php the_field( 'weather_description' ); ?>
							</span>
						</div>
					</div>
				</div>
				<div class="image_2 img_cont" style="display: none;">
					<img class="img-full-div" src="<?php the_field( 'transport_image' ); ?>" alt="">
					<div class="hidden-pos-div">
						<div class="image_description">
							<span>
								<?php the_field( 'transport_description' ); ?>
							</span>
						</div>
					</div>
				</div>
				<div class="image_3 img_cont" style="display: none;">
					<img class="img-full-div" src="<?php the_field( 'tourist_attractions_image' ); ?>" alt="">
					<div class="hidden-pos-div">
						<div class="image_description">
							<span>
								<?php the_field( 'tourist_attractions_description' ); ?>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>


	</main><!-- #main -->
</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
