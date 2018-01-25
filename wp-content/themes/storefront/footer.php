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
		<div class="custom_footer_maincont row">
			<div class="discount_code_cont col-md-12">
				<p>Ingrese Codigo de Descuento</p>
			</div>
			<div class="quick_access_footer row col-md-9">
				<div class="col-md-3">
					<p class="sect-h">Company</p>
					<p><a href="<?php echo WP_HOME ?>">Home</a></p>
					<p><a href="#">About Us</a></p>
					<p><a href="#">Shop</a></p>
					<p><a href="#">Blog</a></p>
					<p><a href="#">Contact Us</a></p>
				</div>
				<div class="col-md-3">
					<p class="sect-h">Service</p>
					<p><a href="#">Support</a></p>
					<p><a href="#">Faq</a></p>
					<p><a href="#">Warranty</a></p>
					<p><a href="#">Live Chat</a></p>
					<p><a href="#">Privacy Policy</a></p>
				</div>
				<div class="col-md-3">
					<p class="sect-h">Order & Returns</p>
					<p><a href="#">Order</a></p>
					<p><a href="#">Status</a></p>
					<p><a href="#">Shipping</a></p>
					<p><a href="#">Policy & Service</a></p>
					<p><a href="#">Cart</a></p>
				</div>
				<div class="col-md-3">
					<p class="sect-h">Payment Accept</p>
					<p>
						<img src="<?php echo WP_HOME ?>/wp-content/uploads/img/credit-cards.png" alt="credit card logos">
					</p>
					<br>
					<p class="color-copyright-f">Powered by ESPOL</p>
					<p class="color-copyright-f">Copyright © 2017 All Rights Reserved</p>
				</div>
			</div>
		</div> <!-- EO / FOOTER -->


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
