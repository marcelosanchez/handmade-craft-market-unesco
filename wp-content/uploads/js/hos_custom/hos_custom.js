console.log("Custom Flaga");

jQuery(".menu-button").click(function () {
        jQuery(this).parents(".wrapper").toggleClass("show-menu");
    });


$(document).ready(function(){
	// Code Here
	console.log("Global Script");

	$( "#menu-menu li a:contains('Login'), #menu-menu li a:contains('Entrar')" ).addClass("sign-in-btn");
	$( "#menu-menu li a:contains('Login'), #menu-menu li a:contains('Entrar')" ).parent().removeClass("current-menu-item");
	$( "#menu-menu li a:contains('Register'), #menu-menu li a:contains('Registro'), #menu-menu li a:contains('Registo')" ).parent().removeClass("current-menu-item");
	$( "#menu-menu li a:contains('Logout'), #menu-menu li a:contains('Salir'), #menu-menu li a:contains('Sair')" ).addClass("custom-loginout");
	$( "#menu-item-359" ).removeClass("current-menu-item");
});