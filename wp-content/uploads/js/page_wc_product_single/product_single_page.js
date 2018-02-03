function addReadMore () {
	$(".woocommerce-product-details__short-description").prepend("" +
		"<div class='readMoreCont'>" +
			"<div>" +
				"<a href='#'>Read More...</a>" +
			"</div>" +
		"</div>");
}

function updateAddToCart_btn() {
	$(".single_add_to_cart_button").addClass("button-main-color");
}


$(document).ready(function(){
	// Code Here
	console.log('Single Product');
	// addReadMore();
	updateAddToCart_btn();
	 
	// $('.woocommerce-product-details__short-description').addClass('collapse_short_desc');
});