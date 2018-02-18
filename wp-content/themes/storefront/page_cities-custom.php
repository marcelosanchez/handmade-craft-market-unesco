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


global $wpdb;

$table_name = $wpdb->prefix . "city";
$sql = "SELECT * FROM $table_name";
$result = $wpdb->get_results($sql) or die(mysql_error());



// Values


$city_name = get_field('city_name');




function updateCityDB() {
    global $wpdb;
    global $table_name;

    $cname = get_field('city_name');
    $city_name_up = strtoupper ( $cname );
    $city_name_lw = strtolower ( $cname );
    $cshort_desc = get_field('city_short_description');
    $city_img_url = get_field('slider_image_1');
    $country_id = $_POST['country_cid'];

    $data = array(
        'name'                      => $city_name_up,
        'nicename'                  => $city_name_lw,
        'city_short_description'    => $cshort_desc,
        'city_header_img_url'       => $city_img_url ?: 'https://www.hsjaa.com/images/joomlart/demo/default.jpg',
        'page_url'                  => 'http://200.10.147.158/cities/',
        'country_fid'               => 1
    );
    $format = array(
        '%s',
        '%s',
        '%s',
        '%s',
        '%s',
        '%d'
    );
    $success=$wpdb->insert( $table_city, $data, $format );
    if($success){
        echo '<script language="javascript">alert("juas");</script>'; ; 
    }

}



get_header(); ?>



<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="col-md-12 parallax cities_header" style="background-image: linear-gradient(rgba(0, 0, 0, .6), rgba(0, 0, 0, .6)), url(<?php the_field( 'header_image' ); ?>);">
			<div>
				<?php echo get_the_title(); ?>
				
			</div>
		</div>

		<div class="row centered_content text_cities" style="margin-top: 82px;">
			<h2><?php echo __('[:en]Creative Cities[:es]Ciudades Creativas[:pb]Cidades Criativas'); ?></h2>
		</div>

		<div class="row centered_content spacer_f30_b" style="margin-top: 68px;">
			<div class="col-md-6 col-unspaced col-city-text">
				<p class="p_tex"><?php the_field( 'cities_representative_text' ); ?></p>
			</div>
			<div class="col-md-6 col-unspaced squaredImg">
				<img class="p_img" src="<?php the_field( 'cities_image' ); ?>" alt="City image">
			</div>
		</div>

		<div class="centered_cards_content main_cities_cont">
			<h2><?php the_field( 'cities_title' ); ?></h2>

		

		  <?php
			global $result; 
			foreach ( $result as $city ) { 
		  	?>

			<div class="cards_cont">
				<div class="card col-md-3 col-md-offset-1 hoverable flex-center city_card">
					<div class="city_card_img" style="background-image: url(<?php echo $city->city_header_img_url; ?>);">
						<img src="" alt="">
					</div>
					<div class="city_card_body">
						<h1><?php echo $city->nicename; ?></h1>
						<p class="elipsis-3l"><?php echo $city->city_short_description; ?></p>
						<a href="<?php echo $city->page_url; ?>"><?php echo __('[:en]Read More[:es]Leer más[:pb]Leia mais'); ?>...</a>
					</div>
				</div>
			</div>

		  <?php } ?>


			<!-- <div class="cards_cont">
				<div class="card col-md-3 col-md-offset-1 hoverable flex-center city_card">
					<div class="city_card_img" style="background-image: url(<?php the_field( 'header_image' ); ?>);">
						<img src="" alt="">
					</div>
					<div class="city_card_body">
						<h1>Duran</h1>
						<p class="elipsis-3l">Lorem Ipsum etc etc dolot, texto usuado usualmente para llenar texto y ver como se veria en el caso de que el texto fuera real en un diseño o una pagina web en desarrollo</p>
						<a href=""><?php echo __('[:en]Read More[:es]Leer más[:pb]Leia mais'); ?>...</a>
					</div>
				</div>
			</div>


			<div class="cards_cont">
				<div class="card col-md-3 col-md-offset-1 hoverable flex-center city_card">
					<div class="city_card_img" style="background-image: url(<?php the_field( 'header_image' ); ?>);">
						<img src="" alt="">
					</div>
					<div class="city_card_body">
						<h1>Paducah</h1>
						<p class="elipsis-3l">Lorem Ipsum etc etc dolot, texto usuado usualmente para llenar texto y ver como se veria en el caso de que el texto fuera real en un diseño o una pagina web en desarrollo</p>
						<a href=""><?php echo __('[:en]Read More[:es]Leer más[:pb]Leia mais'); ?>...</a>
					</div>
				</div>
			</div>


			<div class="cards_cont">
				<div class="card col-md-3 col-md-offset-1 hoverable flex-center city_card">
					<div class="city_card_img" style="background-image: url(<?php the_field( 'header_image' ); ?>);">
						<img src="" alt="">
					</div>
					<div class="city_card_body">
						<h1>San Cristobal</h1>
						<p class="elipsis-3l">Lorem Ipsum etc etc dolot, texto usuado usualmente para llenar texto y ver como se veria en el caso de que el texto fuera real en un diseño o una pagina web en desarrollo</p>
						<a href=""><?php echo __('[:en]Read More[:es]Leer más[:pb]Leia mais'); ?>...</a>
					</div>
				</div>
			</div>


			<div class="cards_cont">
				<div class="card col-md-3 col-md-offset-1 hoverable flex-center city_card">
					<div class="city_card_img" style="background-image: url(<?php the_field( 'header_image' ); ?>);">
						<img src="" alt="">
					</div>
					<div class="city_card_body">
						<h1>Santos</h1>
						<p class="elipsis-3l">Lorem Ipsum etc etc dolot, texto usuado usualmente para llenar texto y ver como se veria en el caso de que el texto fuera real en un diseño o una pagina web en desarrollo</p>
						<a href=""><?php echo __('[:en]Read More[:es]Leer más[:pb]Leia mais'); ?>...</a>
					</div>
				</div>
			</div> -->
		</div>


		<?php the_field( 'demo_field' ); ?>


	</main><!-- #main -->
</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
