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

		<div class="col-md-12 gPage_hCont parallax">
			<?php echo get_the_title(); ?>
		</div>

		<div class="row centered_content p_img_cont cities_head">
			<img class="p_img" src="<?php the_field( 'header_img' ); ?>" alt="City image">
			
		</div>

		<div class="row centered_content spaced_f">
			<div class="col-md-6">
				<p class="p_tex"><?php the_field( 'left_pharagraph' ); ?></p>
			</div>
			<div class="col-md-6">
				<p class="p_tex"><?php the_field( 'right_pharagraph' ); ?></p>
			</div>
		</div>

		<div class="row centered_content">
			<div class="col-md-6 col-unspaced squaredImg">
				<img src="<?php the_field( 'left_image_c1' ); ?>" alt="image">
			</div>
			<div class="col-md-6 col-unspaced col2-text">
				<h1><?php the_field( 'right_title_img_c2' ); ?></h1>
				<p class="p_tex elipsis-6l"><?php the_field( 'right_image_pharagrap_img_c2' ); ?></p>
			</div>
		</div>

		<div class="row centered_content spacer_f30_b">
			<div class="col-md-6 col-unspaced col2-text">
				<h1><?php the_field( 'left_title_image_col1' ); ?></h1>
				<p class="p_tex elipsis-6l"><?php the_field( 'left_image_pharagrap_image_col1' ); ?></p>
			</div>
			<div class="col-md-6 col-unspaced squaredImg">
				<img src="<?php the_field( 'right_image_col2' ); ?>" alt="image">
			</div>
		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
