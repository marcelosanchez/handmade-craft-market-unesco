<?php
/**
 *
 * Template Name: Home Custom
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

<!-- HOME PAGE -->
<!-- EO / HOME PAGE -->

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div id="fullpage">
			<div class="section main-home-section" style="" id="section0">
				<div class="intro">

					<div class="home_logo_cont col-md-12">
						<img alt="logo_white" src="<?php echo get_images_path(); ?>/HOS_Logo.png">
					</div>
					<h1>Find what you want</h1>
					<h2>in our variety of crafts</h2>
					<div class="gobtn_cont">
						<button class="goto-btn" onclick="javascript:location.href='<?php echo WP_HOME ?>/shop/'">Go to Shop</button>
					</div>

				</div>
			</div>
			<div class="section artisans-home-section sub-section" id="section1">
				<div class="intro">

					<div class="home_logo_cont col-md-12">
						<img class="logo_iso" alt="logo_white" src="<?php echo get_images_path(); ?>/logo_iso_white.png">
					</div>
					
					<div class="row txtDesc_home">
						<div class="col-md-3 offset-md-1">
							<h1 class="">Artisans</h1>
							<p class=""><?php the_field( 'atrisans_section' ); ?></p>
							<button class="goto-btn" onclick="javascript:location.href='<?php echo WP_HOME ?>/artisans/'">Read More</button>
						</div>
					</div>
				</div>	
			</div>
			<div class="section handicraft-home-section sub-section" id="section2">
				<div class="intro">

					<div class="home_logo_cont col-md-12">
						<img class="logo_iso" alt="logo_white" src="<?php echo get_images_path(); ?>/logo_iso_white.png">
					</div>
					
					<div class="row txtDesc_home" style="text-align: right;">
						<div class="col-md-3 offset-md-8" style="text-align: left;">
							<h1 class="">Handicrafts</h1>
							<p class="" ><?php the_field( 'handicraft_section' ); ?></p>
							<button class="goto-btn" style="background-color: var(--main-theme-color4);" onclick="javascript:location.href='<?php echo WP_HOME ?>/handicraft/'">Read More</button>
						</div>
					</div>

				</div>
			</div>
			<div class="section cities-home-section sub-section" id="section3">
				<div class="intro">

					<div class="home_logo_cont col-md-12">
						<img class="logo_iso" alt="logo_white" src="<?php echo get_images_path(); ?>/logo_iso_white.png">
					</div>
					
					<div class="row txtDesc_home">
						<div class="col-md-3 offset-md-1">
							<h1 class="">Cities</h1>
							<p class=""><?php the_field( 'cities_section' ); ?></p>
							<button class="goto-btn" onclick="javascript:location.href='<?php echo WP_HOME ?>/artisans/'">Read More</button>
						</div>
					</div>
				</div>

				<!-- <div class="intro">

					<div class="home_logo_cont col-md-12">
						<img class="logo_iso" alt="logo_white" src="<?php echo get_images_path(); ?>/logo_iso_white.png">
					</div>
					
					<div class="row txtDesc_home">
						<div class="col-md-3 offset-md-1">
							<h1 class="">Cities</h1>
							<p class="">Donec a gravida ipsum. Nunc magna nibh, pulvinar vehicula velit at, convallis volutpat augue. Etiam iaculis mauris quis nulla tincidunt egestas tempor consectetur mi. Nullam ullamcorper posuere nisl, quis commodo purus fringilla in. Mauris ultricies massa nisl, id mollis turpis gravida ut. Aliquam erat volutpat. Aliquam id metus ultrices, eleifend ipsum id.</p>
							<button class="goto-btn" onclick="javascript:location.href='<?php echo WP_HOME ?>/cities/'">Read More</button>
						</div>
					</div>

				</div> -->
			</div>

			<!-- <div class="section artisans-home-section" id="section4">
				<div class="slide" id="slide4">
					<h1>Slide 2</h1>
				</div>
				<div class="slide" id="slide5">
					<h1>Slide 2</h1>
				</div>
			</div> -->
		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
