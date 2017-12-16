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

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div id="fullpage">
			<div class="section main-home-section" id="section0">
				<div class="intro">
					<p style="text-align: center;">
						<img alt="background" src="/integ.handicrafts.unesco/wp-content/uploads/img/demo_logo.png">
					</p>
					<p style="text-align: center; font-size: 30px;">Find what you want in our variety of crafts</p>
					<p style="text-align: center;"><button onclick="javascript:location.href='http://localhost/integ.handicrafts.unesco/shop/'">Go to Shop</button></p>
				</div>
			</div>
			<div class="section artisans-home-section" id="section1">
				<div class="slide" id="slide1">
					<div class="intro">
						<div class="dummy-space" style="height: 76px; width: 100%;"></div>
						<p style="text-align: center;">
							<img alt="background" src="/integ.handicrafts.unesco/wp-content/uploads/img/demo_logo.png">
						</p>
						&nbsp;
						<p style="text-align: left; font-size: 24px;">Artisans</p>
						Donec a gravida ipsum. Nunc magna nibh, pulvinar vehicula velit at, convallis volutpat augue. Etiam iaculis mauris quis nulla tincidunt egestas tempor consectetur mi. Nullam ullamcorper posuere nisl, quis commodo purus fringilla in. Mauris ultricies massa nisl, id mollis turpis gravida ut. Aliquam erat volutpat. Aliquam id metus ultrices, eleifend ipsum id, egestas nulla. Ut a elit ut ipsum posuere tincidunt. Donec vitae sem id quam congue mattis non non dui.
						<button style="margin: 0 auto;">Read More</button>
					</div>
				</div>
				<div class="slide" id="slide2">
					<h1>Slide 2</h1>
				</div>
			</div>
			<div class="section handicraft-home-section" id="section2">
				<div class="intro">
					<div class="dummy-space" style="height: 76px; width: 100%;"></div>
					<p style="text-align: center;">
						<img alt="background" src="/integ.handicrafts.unesco/wp-content/uploads/img/demo_logo.png">
					</p>
					&nbsp;
					<p style="text-align: left; font-size: 24px;">Handcraft</p>
					Donec a gravida ipsum. Nunc magna nibh, pulvinar vehicula velit at, convallis volutpat augue. Etiam iaculis mauris quis nulla tincidunt egestas tempor consectetur mi. Nullam ullamcorper posuere nisl, quis commodo purus fringilla in. Mauris ultricies massa nisl, id mollis turpis gravida ut. Aliquam erat volutpat. Aliquam id metus ultrices, eleifend ipsum id, egestas nulla. Ut a elit ut ipsum posuere tincidunt. Donec vitae sem id quam congue mattis non non dui.
					<button style="margin: 0 auto;">Read More</button>
				</div>
			</div>
			<div class="section cities-home-section" id="section3">
				<div class="intro">
					<div class="dummy-space" style="height: 76px; width: 100%;"></div>
					<p style="text-align: center;">
						<img alt="background" src="/integ.handicrafts.unesco/wp-content/uploads/img/demo_logo.png">
					</p>
					&nbsp;
					<p style="text-align: left; font-size: 24px;">Cities</p>
					Donec a gravida ipsum. Nunc magna nibh, pulvinar vehicula velit at, convallis volutpat augue. Etiam iaculis mauris quis nulla tincidunt egestas tempor consectetur mi. Nullam ullamcorper posuere nisl, quis commodo purus fringilla in. Mauris ultricies massa nisl, id mollis turpis gravida ut. Aliquam erat volutpat. Aliquam id metus ultrices, eleifend ipsum id, egestas nulla. Ut a elit ut ipsum posuere tincidunt. Donec vitae sem id quam congue mattis non non dui.
					<button style="margin: 0 auto;">Read More</button>
				</div>
			</div>
		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
