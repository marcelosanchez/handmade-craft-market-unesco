<?php
/**
 *
 * Template Name: Cities Custom
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



<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="col-md-12 parallax cities_header" style="background-image: linear-gradient(rgba(0, 0, 0, .6), rgba(0, 0, 0, .6)), url(<?php the_field( 'header_image' ); ?>);">
			<div>
				<?php echo get_the_title(); ?>
				<?php wpmudev_cta(); ?>
			</div>
		</div>

		<div class="row centered_content text_cities" style="margin-top: 82px;">
			<h2><?php echo __('[:en]Creative Cities[:es]Ciudades Creativas[:pb]Cidades Criativas'); ?></h2>
		</div>

		<div class="row centered_content spacer_f30_b" style="margin-top: 68px;">
			<div class="col-md-6 col-unspaced col-city-text">
				<p class="p_tex elipsis-6l"><?php the_field( 'cities_representative_text' ); ?></p>
			</div>
			<div class="col-md-6 col-unspaced squaredImg">
				<img class="p_img" src="<?php the_field( 'cities_image' ); ?>" alt="City image">
			</div>
		</div>

		<div class="centered_cards_content main_cities_cont">
			<h2><?php echo __('[:en]Creative Cities for crafts and folk art[:es]Ciudades creativas para artesanías y arte popular[:pb]Cidades criativas para artesanatos e arte popular'); ?></h2>


			<div class="cards_cont">
				<div class="card col-md-3 col-md-offset-1 hoverable flex-center city_card">
					<div class="city_card_img" style="background-image: url(<?php the_field( 'header_image' ); ?>);">
						<img src="" alt="">
					</div>
					<div class="city_card_body">
						<h1>City Name</h1>
						<p class="elipsis-3l">Lorem Ipsum etc etc dolot, texto usuado usualmente para llenar texto y ver como se veria en el caso de que el texto fuera real en un diseño o una pagina web en desarrollo</p>
						<a href=""><?php echo __('[:en]Read More[:es]Leer más[:pb]Leia mais'); ?>...</a>
					</div>
				</div>
			</div>
		</div>





	</main><!-- #main -->
</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
