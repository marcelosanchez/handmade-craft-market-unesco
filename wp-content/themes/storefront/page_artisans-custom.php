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

		<h1 class="text-center"><b>Meet our artisans</b></h1>
		<h2 class="text-center">Excellent artisans from different countries</h2>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );

