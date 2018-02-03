<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form role="search" method="get" class="woocommerce-product-search search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
	<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field form-control" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<input type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>" />
	<input type="hidden" name="post_type" value="product" />


	<!-- <div class="form-group has-feedback">
		<label for="search" class="sr-only">Search</label>
		<input type="text" class="form-control" name="search" id="search" placeholder="search">
		<span class="fa fa-search form-control-feedback"></span>
	</div> -->
</form>

<style type="text/css">
.search-form {
  float: right !important;
  transition: all 0.35s, border-radius 0s;
  width: 32px;
  height: 32px;
  background-color: #fff;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
  border-radius: 25px;
  border: 1px solid #ccc;
}
.search-form input.form-control {
  padding-right: 20px;
  border: 0 none;
  background: transparent;
  box-shadow: none;
  display:block;
}
.search-form input.form-control::-webkit-input-placeholder {
  display: none;
}
.search-form input.form-control:-moz-placeholder {
  /* Firefox 18- */
  display: none;
}
.search-form input.form-control::-moz-placeholder {
  /* Firefox 19+ */
  display: none;
}
.search-form input.form-control:-ms-input-placeholder {
  display: none;
}
.search-form:hover,
.search-form.hover {
  width: 100%;
  /*border-radius: 4px 25px 25px 4px;*/
  border-radius: 25px;
}
.search-form span.form-control-feedback {
  position: absolute;
  top: -1px;
  right: -2px;
  z-index: 2;
  display: block;
  width: 34px;
  height: 34px;
  line-height: 34px;
  text-align: center;
  color: #3596e0;
  left: initial;
  font-size: 14px;
}


.site-search .widget_product_search form:before {
    top: 0.6em;
    left: 0.6em;
}
.site-search .widget_product_search form input[type=search] {
    padding-top: 0.3rem;
}

.woocommerce-active .site-header .site-search {
    margin-top: 4px;
}


#site-header-cart {
	display: none;
}

/*HEADER*/
.site-content {
	padding: 0;
	margin: 0;
    /*margin-top: 76px;*/
}
.custom-site-content {
	padding: 0;
	margin: 0;
	max-width: inherit;
}
</style>