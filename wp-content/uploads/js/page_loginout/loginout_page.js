$(document).ready(function(){
	// Code Here
	console.log("Login");

	// $("html").css("background", "url('<?php echo get_images_path(); ?>/home/home-sec01.png') no-repeat center center fixed")

	$("div.tml").addClass("col-md-4");
	$("div.tml").addClass("login-maincont");
	$("div.tml").parents('.entry-content').addClass('col-md-12');

	$("#wp-submit").addClass("goto-btn");

	$("footer").remove();
});
