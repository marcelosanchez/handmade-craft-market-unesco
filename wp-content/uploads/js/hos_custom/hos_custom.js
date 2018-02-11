$(document).ready(function(){
	// Code Here
	console.log("Global Script");

	$( "#menu-menu li a:contains('Sign In')" ).addClass("sign-in-btn");
	$( "#menu-menu li a:contains('Sign In')" ).parent().removeClass("current-menu-item");
	$( "#menu-menu li a:contains('Register')" ).parent().removeClass("current-menu-item");
	$( "#menu-menu li a:contains('Logout')" ).addClass("custom-loginout");
	$( "#menu-item-359" ).removeClass("current-menu-item");
});