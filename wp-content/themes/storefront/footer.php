<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<!-- FOOTER -->
		<div class="custom_footer_maincont">
			<!-- <div class="discount_code_cont col-md-12">
				<p>Ingrese Codigo de Descuento</p>
			</div>
			<div class="quick_access_footer row col-md-9"> -->
			
			<div class="subscribe_cardsInfo row">
				<div class="footer_subscribe col-md-8">
					<p class="h1_text">Subscribe your email</p>
					<p class="h2_text">and get best news and know latest products added</p>
					<br>
					<input type="email" placeholder="ENTER YOUR EMAIL ADDRESS">
					<button class="goto-btn subscribe_btn">Subscribe</button>
				</div>
				<div class="footer_cards col-md-4">
					<p>Payment Accept</p>
					<img src="<?php echo get_images_path() ?>/credit_cards.png" alt="">
				</div>
			</div>
			<div class="rights_main_cont">
				<p class="color-copyright-f">Powered by ESPOL</p>
				<p class="color-copyright-f">© All Rights Reserved - 2018</p>
			</div>
				
		</div> <!-- EO / FOOTER -->


		<!-- <p class="color-copyright-f">Powered by ESPOL</p>
		<p class="color-copyright-f">Copyright © 2017 All Rights Reserved</p> -->

		<!-- <div class="col-full"> -->

			<?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			//do_action( 'storefront_footer' ); ?>

		<!-- </div> --><!-- .col-full -->
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
