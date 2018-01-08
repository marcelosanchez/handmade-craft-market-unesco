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

<!-- MATERIAL DESING -->
<!-- <link rel="stylesheet" type="text/css" href="/integ.handicrafts.unesco/wp-content/uploads/css/extra_css/bst_md.css" />
<link rel="stylesheet" type="text/css" href="/integ.handicrafts.unesco/wp-content/uploads/js/extra_js/mdb.js" /> -->
<!-- EO / MATERIAL DESING -->


<style>
.btn-waves-ef {
  border: none;
  background-color: #3498db;
  border-radius: 4px;
  box-shadow: 0 4px 5px 0px rgba(0, 0, 0, 0.2), 0 1px 10px 0px rgba(0, 0, 0, 0.16), 0 2px 4px -1px rgba(0, 0, 0, 0.14);
  display: block;
  padding: 1em 4em;
  margin: 1em;
  position: relative;
  color: white;
  cursor: pointer;
  text-size: 2em;
  top: 50%;
  left: 50%;
  overflow: hidden;
  user-select: none;
  -moz-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
.btn-waves-ef:hover {
  background-color: #5faee3;
  box-shadow: 0 0 8px rgba(0, 0, 0, .18), 0 8px 16px rgba(0, 0, 0, .36);
  -moz-transition: all 0.5s 0s linear;
  -o-transition: all 0.5s 0s linear;
  -ms-transition: all 0.5s 0s linear;
  -webkit-transition: all 0.5s 0s linear;
  transition: all 0.5s 0s linear;
}
.btn-waves-ef:focus {
  border: none;
  outline: none;
}
.btn-waves-ef:nth-of-type(2) {
  background-color: #2ecc71;
}
.btn-waves-ef:nth-of-type(2):hover {
  background-color: #54d98c;
}
.btn-waves-ef:nth-of-type(3) {
  background-color: #f1c40f;
}
.btn-waves-ef:nth-of-type(3):hover {
  background-color: #f4d03f;
}
.btn-waves-ef:nth-of-type(4) {
  background-color: #e74c3c;
}
.btn-waves-ef:nth-of-type(4):hover {
  background-color: #ed7669;
}
@keyframes wave {
  from {
    background-color: rgba(0, 0, 0, 0.3);
    transform: scale(0);
  }
  to {
    transform: scale(2);
    opacity: 0;
  }
}
.wave {
  position: absolute;
  border-radius: 100%;
}
.anim {
  animation: wave 0.75s ease-out;
}

</style>


<script>
	var myBtn = document.getElementsByClassName('btn-waves-ef');

	for(var i = 0; i < myBtn.length; i++) {
		var btn = myBtn[i];
		btn.addEventListener('click', function (event) {
			var self = this;
			var rect = this.getBoundingClientRect();
			var diameter = Math.max(rect.width, rect.height);

			var span = this.querySelector('.wave');
			if (!span) {
				span = document.createElement('span');
				span.className = 'wave';
				span.style.height = diameter + 'px';
				span.style.width = diameter + 'px';
				this.appendChild(span);
			}
			span.classList.remove('anim');
			span.style.left = event.clientX - rect.left - diameter / 2 + 'px';
			span.style.top = event.clientY - rect.top - diameter / 2 + 'px';
			// span.classList.add('anim');
			setTimeout(function () {
				span.classList.add('anim');
			}, 0);
		});
	}	
</script>



<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="col-md-12 gPage_hCont parallax">
			<?php echo get_the_title(); ?>
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
		<div id="meet_ur_artisans" class="artisans_h_cont">
			<h1 class="text-center">Meet our artisans</h1>
			<h2 class="text-center">Excellent artisans from different countries</h2>
		</div>

		<div class="artisans_main_cont row">
			
			<div class="card col-md-3 col-md-offset-1 hoverable flex-center">
				<div class="card-header row">
					<div class="user_cont col-md-12">
						<img class="centered-and-cropped" width="50" height="50" src="/integ.handicrafts.unesco/wp-content/uploads/img/artisans/artisan_id_img/artisan-id01.jpg" alt="avatar">
						<div class="user_data col-md-8">
							<span class="art-name row" title="Name" href="#">
								<b>Artisan Name</b>
							</span>
							<span class="art-country row">Artisan Country</span>
						</div>
					</div>
				</div>
				<div class="card-avatar-img row" style="background-image: url(/integ.handicrafts.unesco/wp-content/uploads/img/artisans/artisan_avatar_img/avatar-id01.jpg);">
				</div>
				<div class="card-body row">
					<p>Aliquam erat volutpat. Aliquam id metus ultrices, eleifend ipsum id. Nunc magna nibh, pulvinar vehicula velit at, convallis volutpat augue.</p>
					<button class="goto-btn">Read More</button>
				</div>
			</div>

			<div class="card col-md-3 col-md-offset-1 hoverable flex-center">
				<div class="card-header row">
					<div class="user_cont col-md-12">
						<img class="centered-and-cropped" width="50" height="50" src="/integ.handicrafts.unesco/wp-content/uploads/img/artisans/artisan_id_img/artisan-id02.jpg" alt="avatar">
						<div class="user_data col-md-8">
							<span class="art-name row" title="Name" href="#">
								<b>Artisan Name</b>
							</span>
							<span class="art-country row">Artisan Country</span>
						</div>
					</div>
				</div>
				<div class="card-avatar-img row" style="background-image: url(/integ.handicrafts.unesco/wp-content/uploads/img/artisans/artisan_avatar_img/avatar-id02.jpg);">
				</div>
				<div class="card-body row">
					<p>Aliquam erat volutpat. Aliquam id metus ultrices, eleifend ipsum id. Nunc magna nibh, pulvinar vehicula velit at, convallis volutpat augue.</p>
					<button class="goto-btn">Read More</button>
				</div>
			</div>

			<div class="card col-md-3 col-md-offset-1">
				<div class="card-header row">
					<div class="user_cont col-md-12">
						<img class="centered-and-cropped" width="50" height="50" src="/integ.handicrafts.unesco/wp-content/uploads/img/artisans/artisan_id_img/artisan-id03.jpg" alt="avatar">
						<div class="user_data col-md-8">
							<span class="art-name row" title="Name" href="#">
								<b>Artisan Name</b>
							</span>
							<span class="art-country row">Artisan Country</span>
						</div>
					</div>
				</div>
				<div class="card-avatar-img row" style="background-image: url(/integ.handicrafts.unesco/wp-content/uploads/img/artisans/artisan_avatar_img/avatar-id03.jpg);">
				</div>
				<div class="card-body row">
					<p>Aliquam erat volutpat. Aliquam id metus ultrices, eleifend ipsum id. Nunc magna nibh, pulvinar vehicula velit at, convallis volutpat augue.</p>
					<button class="btn-waves-ef">Read More</button>
				</div>
			</div>

		</div>

		<div class="view_more_artisans row text-center">
			<button class="goto-btn waves-effect waves-light" style="margin: 0 auto;">View More</button>
		</div>



		<!-- FOOTER -->
		<!-- <div class="custom_footer_maincont row">
			<div class="discount_code_cont col-md-12">
				<p>Ingrese Codigo de Descuento</p>
			</div>
			<div class="quick_access_footer row col-md-9">
				<div class="col-md-3">
					<p class="sect-h">Company</p>
					<p><a href="http://localhost/integ.handicrafts.unesco/">Home</a></p>
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
						<img src="/integ.handicrafts.unesco/wp-content/uploads/img/credit-cards.png" alt="credit card logos">
					</p>
					<br>
					<p class="color-copyright-f">Powered by ESPOL</p>
					<p class="color-copyright-f">Copyright © 2017 All Rights Reserved</p>
				</div>
			</div>
		</div> --> <!-- EO / FOOTER -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
