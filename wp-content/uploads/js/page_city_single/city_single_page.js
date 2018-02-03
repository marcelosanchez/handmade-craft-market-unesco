$(document).ready(function(){
	// Code Here

});


function selectCityNav(li_Obj,section) {
	$(".right-city-images .img_cont").hide();
	$(".right-city-images .image_" + section).show();

	$(".nav-link").removeClass("active");
	$(li_Obj).addClass("active");
}
