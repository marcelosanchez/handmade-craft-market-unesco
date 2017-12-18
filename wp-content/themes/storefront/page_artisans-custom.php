<?php
/**
 *
 * Template Name: Artisans Custom
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

<!-- ARTISANS PAGE -->
<link rel="stylesheet" type="text/css" href="/integ.handicrafts.unesco/wp-content/uploads/css/page_artisans/artisans_page.css" />

<script type="text/javascript" src="/integ.handicrafts.unesco/wp-content/uploads/js/page_artisans/artisans_page.js"></script>
<!-- EO / ARTISANS PAGE -->

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="col-md-12 gPage_hCont parallax">
			Artisans
		</div>

		<div class="row txtDesc_general">
			<div class="col-md-6">
				<img style="" src="/integ.handicrafts.unesco/wp-content/uploads/img/artisans/artisans_general.jpg">
			</div>
			<div class="col-md-4">
				<p class="text-left">Donec a gravida ipsum. Nunc magna nibh, pulvinar vehicula velit at, convallis volutpat augue. Etiam iaculis mauris quis nulla tincidunt. Nullam ullamcorper posuere nisl, quis commodo purus fringilla in. Mauris ultricies massa nisl, id mollis turpis gravida ut. Aliquam erat volutpat. Aliquam id metus ultrices, eleifend ipsum id. Nunc magna nibh, pulvinar vehicula velit at, convallis volutpat augue.</p> 
				<p>Donec a gravida ipsum. Nunc magna nibh, pulvinar vehicula velit at, convallis volutpat augue. Etiam iaculis mauris quis nulla tincidunt. Nullam ullamcorper posuere nisl, quis commodo purus fringilla in. Mauris ultricies massa nisl, id mollis turpis gravida ut. Aliquam erat volutpat. Aliquam id metus ultrices, eleifend ipsum id. Nunc magna nibh, pulvinar vehicula velit at, convallis volutpat augue.</p>
			</div>
		</div>
		<div class="artisans_h_cont">
			<h1 class="text-center">Meet our artisans</h1>
			<h2 class="text-center">Excellent artisans from different countries</h2>
		</div>

		<div class="artisans_main_cont row">
			
			<div class="card col-md-3 col-md-offset-1">
				<div class="card-header row">
					<div class="user_cont col-md-12">
						<img class="avatar-idArtisan" src="/integ.handicrafts.unesco/wp-content/uploads/img/artisans/artisan_id_img/artisan-id01.jpg" alt="Avatar">
						<div class="user_data col-md-8">
							<span class="row" title="Full Name" href="#">
								<b>Artisan Name</b>
							</span>
							<span class="row">Artisan Country</span>
						</div>
					</div>
				</div>
				<div class="card-avatar-img row">
				</div>
				<div class="card-body row">
					<p>Aliquam erat volutpat. Aliquam id metus ultrices, eleifend ipsum id. Nunc magna nibh, pulvinar vehicula velit at, convallis volutpat augue.</p>
					<button class="goto-btn">Read More</button>
				</div>
			</div>

			<div class="card col-md-3 col-md-offset-1">
				<div class="card-header row">
					<div class="user_cont col-md-12">
						<img class="avatar-idArtisan" src="/integ.handicrafts.unesco/wp-content/uploads/img/artisans/artisan_id_img/artisan-id01.jpg" alt="Avatar">
						<div class="user_data col-md-8">
							<span class="row" title="Full Name" href="#">
								<b>Artisan Name</b>
							</span>
							<span class="row">Artisan Country</span>
						</div>
					</div>
				</div>
				<div class="card-avatar-img row">
				</div>
				<div class="card-body row">
					<p>Aliquam erat volutpat. Aliquam id metus ultrices, eleifend ipsum id. Nunc magna nibh, pulvinar vehicula velit at, convallis volutpat augue.</p>
					<button class="goto-btn">Read More</button>
				</div>
			</div>

			<div class="card col-md-3 col-md-offset-1">
				<div class="card-header row">
					<div class="user_cont col-md-12">
						<img class="avatar-idArtisan" src="/integ.handicrafts.unesco/wp-content/uploads/img/artisans/artisan_id_img/artisan-id01.jpg" alt="Avatar">
						<div class="user_data col-md-8">
							<span class="row" title="Full Name" href="#">
								<b>Artisan Name</b>
							</span>
							<span class="row">Artisan Country</span>
						</div>
					</div>
				</div>
				<div class="card-avatar-img row">
				</div>
				<div class="card-body row">
					<p>Aliquam erat volutpat. Aliquam id metus ultrices, eleifend ipsum id. Nunc magna nibh, pulvinar vehicula velit at, convallis volutpat augue.</p>
					<button class="goto-btn">Read More</button>
				</div>
			</div>

		</div>

		<div class="view_more_artisans row text-center">
			<button class="goto-btn" style="margin: 0 auto;">View More</button>
		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );

