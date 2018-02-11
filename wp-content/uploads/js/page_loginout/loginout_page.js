$(document).ready(function(){
	// Code Here
	console.log("Login");

	// $("html").css("background", "url('<?php echo get_images_path(); ?>/home/home-sec01.png') no-repeat center center fixed")

	$("div.tml").addClass("col-md-4");
	$("div.tml").addClass("login-maincont");
	$("div.tml").parents('.entry-content').addClass('col-md-12');

	$("#wp-submit").addClass("goto-btn");

	$("footer").remove();

	updateRegistrationForm();
	updateLoginForm();
	updateRecoverPasswordForm();
});


function updateRegistrationForm() {
	$("div.um-register").addClass("col-md-12 um-register-custom");

	$(".um-register-custom .um-form").addClass("centered_content top-space col-md-6");

	$(".um-register-custom .um-field").addClass("centered_content custom-field-cont col-md-5");

	$(".um-col-alt input[type=submit], .um-col-alt a").addClass("goto-btn");
}


function updateLoginForm() {
	$("div.um-login").addClass("col-md-12 um-login-custom");
	$(".um-login-custom .um-form").addClass("centered_content top-space col-md-8");
}


function updateRecoverPasswordForm() {
	$("div.um-password").addClass("col-md-12 um-password-custom");
	$(".um-password-custom .um-form").addClass("centered_content top-space col-md-8");

	$(".um-col-alt input[type=submit], .um-col-alt a").addClass("goto-btn");
}