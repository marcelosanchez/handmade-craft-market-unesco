<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- SCROLL PAGE -->
<link rel="stylesheet" type="text/css" href="/integ.handicrafts.unesco/wp-content/uploads/css/fullPage-scroll/jquery.fullPage.css" />
<link rel="stylesheet" type="text/css" href="/integ.handicrafts.unesco/wp-content/uploads/css/fullPage-scroll/fullpage_custom.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="/integ.handicrafts.unesco/wp-content/uploads/js/fullPage-scroll/scrolloverflow.js"></script>
<script type="text/javascript" src="/integ.handicrafts.unesco/wp-content/uploads/js/fullPage-scroll/jquery.fullPage.js"></script>
<script type="text/javascript" src="/integ.handicrafts.unesco/wp-content/uploads/js/fullPage-scroll/fullpage_custom.js"></script>
<!-- EO / SCROLL PAGE -->

<!-- GENERAL PAGE -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<!-- GENERAL PAGE -->

<!-- GENERAL CUSTOMIZATION -->
<link rel="stylesheet" type="text/css" href="/integ.handicrafts.unesco/wp-content/uploads/css/hos_custom/hos_custom.css" />

<script type="text/javascript" src="/integ.handicrafts.unesco/wp-content/uploads/js/hos_custom/hos_custom.js"></script>
<!-- EO / GENERAL CUSTOMIZATION -->

<!-- HOME PAGE -->
<!-- <link rel="stylesheet" type="text/css" href="/integ.handicrafts.unesco/wp-content/uploads/css/page_home/home_page.css" />

<script type="text/javascript" src="/integ.handicrafts.unesco/wp-content/uploads/js/page_home/home_page.js"></script> -->
<!-- EO / HOME PAGE -->

<!-- ARTISANS PAGE -->
<!-- <link rel="stylesheet" type="text/css" href="/integ.handicrafts.unesco/wp-content/uploads/css/page_artisans/artisans_page.css" />

<script type="text/javascript" src="/integ.handicrafts.unesco/wp-content/uploads/js/page_artisans/artisans_page.js"></script> -->
<!-- EO / ARTISANS PAGE -->



<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<?php 

function notld_link( ) {
    $notld = get_permalink();
    return str_replace( home_url(), "", $notld );
} 

?>

<input type="hidden" class="flaga" name="get_post_permalink" value="<? echo get_post_permalink( ) ?>">
<input type="hidden" class="flaga" name="home_url" value="<? echo home_url( $wp->request ) ?>">
<input type="hidden" class="flaga" name="segment" value="<?php echo notld_link(); ?>">

<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'storefront_before_header' ); ?>

	<header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">
		<div class="col-full">

			<?php
			/**
			 * Functions hooked into storefront_header action
			 *
			 * @hooked storefront_skip_links                       - 0
			 * @hooked storefront_social_icons                     - 10
			 * @hooked storefront_site_branding                    - 20
			 * @hooked storefront_secondary_navigation             - 30
			 * @hooked storefront_product_search                   - 40
			 * @hooked storefront_primary_navigation_wrapper       - 42
			 * @hooked storefront_primary_navigation               - 50
			 * @hooked storefront_header_cart                      - 60
			 * @hooked storefront_primary_navigation_wrapper_close - 68
			 */
			do_action( 'storefront_header' ); ?>

		</div>
	</header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 */
	do_action( 'storefront_before_content' ); ?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full col-lg-12 col-md-12 col-sm-12 col-xs-12 custom-site-content">
		<!-- <div class="col-full col-lg-12 col-md-12 col-sm-12 col-xs-12"> -->

		<?php
		/**
		 * Functions hooked in to storefront_content_top
		 *
		 * @hooked woocommerce_breadcrumb - 10
		 */
		do_action( 'storefront_content_top' );
