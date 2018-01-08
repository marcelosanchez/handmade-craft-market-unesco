<?php 
/**
* My Theme Custom Meta
* http://docs.layerswp.com/how-to-add-custom-fields-to-posts-and-pages/
**/
 
/**
* Add The Meta Box
**/
function layers_child_add_meta_box() {
 
  $screens = array('post');
  foreach ( $screens as $screen ) {
 
	  add_meta_box(
		'layers_child_meta_sectionid',
		__( 'My Theme Options', 'layerswp' ),
		'layers_child_meta_box_callback',
		$screen,
			'normal',
			'high'
	   );
  	}
}
 
//Add The Callback
   //Build the form with Layers_Form_Elements
 
//Save The Meta