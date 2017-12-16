$(document).ready(function(){
	$("#demosMenu").change(function(){
	  window.location.href = $(this).find("option:selected").attr("id") + '.html';
	});
});

$(document).ready(function() {
	$('#fullpage').fullpage({
		anchors: ['Home', 'Artisans', 'Handicraft', 'Cities'],
		sectionsColor: ['transpart', 'transpart', 'transpart', 'transpart'],
		navigation: true,
		navigationPosition: 'right',
		navigationTooltips: ['Home', 'Artisans', 'Handicraft', 'Cities']
	});
});