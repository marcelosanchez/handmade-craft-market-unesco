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

<!-- ABOUT US PAGE -->
<link rel="stylesheet" type="text/css" href="/integ.handicrafts.unesco/wp-content/uploads/css/page_aboutus/aboutus_page.css" />

<script type="text/javascript" src="/integ.handicrafts.unesco/wp-content/uploads/js/page_aboutus/aboutus_page.js"></script>
<!-- EO / ABOUT US PAGE -->


<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="col-md-12 gPage_hCont parallax">
			<?php echo get_the_title(); ?>
		</div>

		<div class="content-main-div row col-md-12">
			<?php while ( have_posts() ) : the_post();
				get_template_part( 'content', 'page' );
			endwhile; ?>
		</div>

		<div class="content-main-div row col-md-12">
			<?php the_field( 'about_paragraph' ); ?>
		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
