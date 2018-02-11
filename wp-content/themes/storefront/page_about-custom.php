<?php
/**
 *
 * Template Name: AboutUs Custom
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



<!-- <link rel="stylesheet" href="https://raw.githubusercontent.com/twbs/bootstrap-sass/master/assets/stylesheets/bootstrap/_carousel.scss"> -->


<!-- <script type="text/javascript" src="components/bootstrap/dist/js/bootstrap.js"></script> -->
<!-- <script src="https://gist.githubusercontent.com/barryvdh/6155151/raw/04ba31f92150372daf003139c1704cdcee286566/carousel.js"></script> -->

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<!-- <?php // echo get_the_title(); ?> -->

		<div class="row col-md-12 centered_content page_title">
			<h1>About Handmade</h1>
		</div>
		
		<div class="row centered_content aboutUs_shortDesc" style="padding-top: 60px;">
			<p class="desc_text">
				<?php the_field( 'about_us_main_text' ); ?>
			</p>
		</div>

		<div class="row" style="padding-top: 60px;">
			<div class="col-md-6 half-aboutus-desc-img">
				<img class="img-full-div" src="<?php the_field( 'creation_image' ); ?>" alt="">
			</div>
			<div class="col-md-6 half-aboutus-desc-text">
				<h3>Creation</h3>
				<p class="desc_text">
					<?php the_field( 'creation_text' ); ?>			
				</p>
			</div>
		</div>

		<div class="row" style="padding-top: 60px;">
			<div class="col-md-6 half-branding-desc-text">
				<h3>Branding</h3>
				<p class="desc_text">
					<?php the_field( 'branding_text' ); ?>			
				</p>
			</div>
			<div class="col-md-6 half-branding-desc-img">
				<img class="img-full-div" src="<?php the_field( 'branding_image' ); ?>" alt="">
			</div>
		</div>

		<div class="row" style="padding-top: 60px;height: 82vh;">
			<div class="col-md-12 fullw-video-desc">
				<div class="aboutus_video_cont">
					<video controls muted width="16" height="9" x-webkit-airplay="allow" loop="loop" autoplay="autoplay">
						<source src="<?php echo get_videos_path () ?>/Handmade_ESPOL.mp4" type="video/mp4">
						<source src="<?php echo get_videos_path () ?>/Handmade_ESPOL.mp4" type="video/ogg">
						<source src="<?php echo get_videos_path () ?>/Handmade_ESPOL.mp4" type="video/webm">
					</video>
				</div>
			</div>

			<div class="col-md-6 half-video-desc-img">
			</div>
			<div class="col-md-6 half-video-desc-text">
				<h3>About the project</h3>
				<p class="desc_text">
					<?php the_field( 'about_project_description' ); ?>
				</p>
			</div>
		</div>

		<div class="row" style="padding-top: 60px;">
			<h3 class="aboutus_h3">Gallery</h3>

			<div class="col-md-12">
				
				<!-- **************************************** -->

				    <!-- main slider carousel -->
				    <div class="row">
				        <div class="col-lg-8 offset-lg-2" id="slider">
				                <div id="galleryCarousel" class="carousel slide">
				                    <!-- main slider carousel items -->
				                    <div class="carousel-inner">
				                        <div class="active item carousel-item" data-slide-number="0">
				                            <img src="<?php the_field( 'gallery_image_1' ); ?>" class="img-fluid">
				                        </div>
				                        <div class="item carousel-item" data-slide-number="1">
				                            <img src="<?php the_field( 'gallery_image_2' ); ?>" class="img-fluid">
				                        </div>
				                        <div class="item carousel-item" data-slide-number="2">
				                            <img src="<?php the_field( 'gallery_image_3' ); ?>" class="img-fluid">
				                        </div>
				                        <div class="item carousel-item" data-slide-number="3">
				                            <img src="<?php the_field( 'gallery_image_4' ); ?>" class="img-fluid">
				                        </div>
				                        <div class="item carousel-item" data-slide-number="4">
				                            <img src="<?php the_field( 'gallery_image_5' ); ?>" class="img-fluid">
				                        </div>
				                        <!-- <div class="item carousel-item" data-slide-number="5">
				                            <img src="http://placehold.it/1200x480&amp;text=six" class="img-fluid">
				                        </div>
				                        <div class="item carousel-item" data-slide-number="6">
				                            <img src="http://placehold.it/1200x480&amp;text=seven" class="img-fluid">
				                        </div>
				                        <div class="item carousel-item" data-slide-number="7">
				                            <img src="http://placehold.it/1200x480&amp;text=eight" class="img-fluid">
				                        </div> -->
										
										<!-- NAVIGATORS -->
				                        <a class="carousel-control left pt-3" href="#galleryCarousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
				                        <a class="carousel-control right pt-3" href="#galleryCarousel" data-slide="next"><i class="fa fa-chevron-right"></i></a>

				                    </div>
				                    <!-- main slider carousel nav controls -->


				                    <ul class="carousel-indicators list-inline">
				                        <li class="list-inline-item active">
				                            <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#galleryCarousel">
				                                <img src="<?php the_field( 'gallery_image_1' ); ?>" class="img-fluid">
				                            </a>
				                        </li>
				                        <li class="list-inline-item">
				                            <a id="carousel-selector-1" data-slide-to="1" data-target="#galleryCarousel">
				                                <img src="<?php the_field( 'gallery_image_2' ); ?>" class="img-fluid">
				                            </a>
				                        </li>
				                        <li class="list-inline-item">
				                            <a id="carousel-selector-2" data-slide-to="2" data-target="#galleryCarousel">
				                                <img src="<?php the_field( 'gallery_image_3' ); ?>" class="img-fluid">
				                            </a>
				                        </li>
				                        <li class="list-inline-item">
				                            <a id="carousel-selector-3" data-slide-to="3" data-target="#galleryCarousel">
				                                <img src="<?php the_field( 'gallery_image_4' ); ?>" class="img-fluid">
				                            </a>
				                        </li>
				                        <li class="list-inline-item">
				                            <a id="carousel-selector-4" data-slide-to="4" data-target="#galleryCarousel">
				                                <img src="<?php the_field( 'gallery_image_5' ); ?>" class="img-fluid">
				                            </a>
				                        </li>
				                        <!-- <li class="list-inline-item">
				                            <a id="carousel-selector-5" data-slide-to="5" data-target="#galleryCarousel">
				                                <img src="http://placehold.it/80x60&amp;text=six" class="img-fluid">
				                            </a>
				                        </li>
				                        <li class="list-inline-item">
				                            <a id="carousel-selector-6" data-slide-to="6" data-target="#galleryCarousel">
				                                <img src="http://placehold.it/80x60&amp;text=seven" class="img-fluid">
				                            </a>
				                        </li>
				                        <li class="list-inline-item">
				                            <a id="carousel-selector-7" data-slide-to="7" data-target="#galleryCarousel">
				                                <img src="http://placehold.it/80x60&amp;text=eight" class="img-fluid">
				                            </a>
				                        </li> -->
				                    </ul>
				            </div>
				        </div>

				    </div>
				    <!--/main slider carousel-->

				<!-- **************************************** -->

			</div>
		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
