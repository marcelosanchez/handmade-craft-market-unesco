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

  $table_country = $wpdb->prefix . "country";
  $current_country = get_field( 'country_name' ); 
  $country_cid = $wpdb->get_var( "SELECT DISTINCT country_id FROM $table_country WHERE UPPER(name) LIKE UPPER('%$current_country%')" );

  $table_city = $wpdb->prefix . "city";
  $current_city = get_field( 'city_name' );
  $city_cid = $wpdb->get_results( "SELECT DISTINCT name FROM $table_city WHERE UPPER(name) LIKE UPPER('%$current_city%')" ); 
  $city_array = $wpdb->get_results( "SELECT * FROM $table_city WHERE UPPER(name) LIKE UPPER('%$current_city%')" ); 

  // debug_PHP_console( $city_cid );
  // debug_PHP_console( $city_array );


	if($city_cid !== NULL) {
		// do other stuff...
		debug_PHP_console( "City Found on DB" );
		updateCity();
	} else {
		// row not found, do stuff...
		debug_PHP_console( "City Not Found on DB. Creating new" );
		createNewCity();
	}

function createNewCity() {
    global $wpdb;
    global $url;
    global $country_cid;

    $cname = get_field( 'city_name' );
    $city_name_up = strtoupper ( $cname );
    $city_name_lw = strtolower ( $cname );
    $cshort_desc = get_field( 'city_short_description' );

    $city_img_url = get_field( 'slider_image_1' );
    $current_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $count_id = $country_cid;

    $data = array(
        'name'                      => $city_name_up,
        'nicename'                  => $city_name_lw,
        'city_short_description'    => $cshort_desc,
        'city_header_img_url'       => $city_img_url ?: 'https://www.hsjaa.com/images/joomlart/demo/default.jpg',
        'page_url'                  => $current_url ?: '#',
        'country_fid'               => $count_id
    );
    $format = array(
        '%s',
        '%s',
        '%s',
        '%s',
        '%s',
        '%d'
    );
    $success=$wpdb->insert( 'hos_city', $data, $format );
}

function updateCity() {
	global $wpdb;
	global $table_city;
	global $city_array;

	$cname = get_field( 'city_name' );
	$city_name_up = strtoupper ( $cname );
	$cshort_desc = get_field( 'city_short_description' );
	$city_img_url = get_field( 'slider_image_1' );

	$updated = $wpdb->query( $wpdb->prepare("
		UPDATE $table_city 
        SET city_short_description = %s, city_header_img_url = %s 
        WHERE name = %s
    ", $cshort_desc, $city_img_url, $city_name_up) );
	 
	if ( false === $updated ) {
		// There was an error.
		debug_PHP_console( "ERROR. Cant update" );
	} else {
		// No error. You can check updated to see how many rows were changed.
		debug_PHP_console( "UPDATED. No fails." );
	}
}







// require wp-load.php to use built-in WordPress functions
// require_once("../wp-load.php");

/*******************************************************
** POST VARIABLES
*******************************************************/

$postType = 'page'; // set to post or page
$userID = 1; // set to user id
$categoryID = '2'; // set to category id.
$postStatus = 'publish';  // set to future, draft, or publish

$leadTitle = 'Test Page: '.date("n/d/Y");

$leadContent = '<h1>Vacations</h1><p>Vacations are the best thing in this life.</p>';
$leadContent .= ' <!--more--> <p>Expensive they are, but they are totally worth it.</p>';

/*******************************************************
** TIME VARIABLES / CALCULATIONS
*******************************************************/
// VARIABLES
$timeStamp = $minuteCounter = 0;  // set all timers to 0;
$iCounter = 1; // number use to multiply by minute increment;
$minuteIncrement = 1; // increment which to increase each post time for future schedule
$adjustClockMinutes = 0; // add 1 hour or 60 minutes - daylight savings

// CALCULATIONS
$minuteCounter = $iCounter * $minuteIncrement; // setting how far out in time to post if future.
$minuteCounter = $minuteCounter + $adjustClockMinutes; // adjusting for server timezone

$timeStamp = date('Y-m-d H:i:s', strtotime("+$minuteCounter min")); // format needed for WordPress

/*******************************************************
** WordPress Array and Variables for posting
*******************************************************/

$new_post = array(
	'post_title' => $leadTitle,
	'post_content' => $leadContent,
	'post_status' => $postStatus,
	'post_date' => $timeStamp,
	'post_author' => $userID,
	'post_type' => $postType,
	'post_category' => array($categoryID)
	);

/*******************************************************
** WordPress Post Function
*******************************************************/

// $post_id = wp_insert_post($new_post);

/*******************************************************
** SIMPLE ERROR CHECKING
*******************************************************/

$finaltext = '';

if($post_id){

	$finaltext .= 'Yay, I made a new post.<br>';

} else{

	$finaltext .= 'Something went wrong and I didn\'t insert a new post.<br>';

}

echo $finaltext;

get_header(); ?>


<div id="primary" class="content-area">
	<main id="main" class="site-main city_main_cont" role="main">

		<div class="col-md-12 cityPage_header parallax">
			<h1><?php the_field( 'city_name' ); ?></h1>
			<h2><?php the_field( 'country_name' ); ?></h2>
		</div>



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
