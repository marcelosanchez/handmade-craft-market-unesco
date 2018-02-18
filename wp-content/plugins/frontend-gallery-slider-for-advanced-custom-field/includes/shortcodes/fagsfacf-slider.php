<?php 
/**
 * shortcode [acf_gallery_slider]
 * 
 */

add_shortcode( 'acf_gallery_slider', 'fagsfacf_products_slider' );
function fagsfacf_products_slider($atts){	
 
	extract(shortcode_atts(array(
		'acf_field' 		 => '',	
		'autoplay' 			 => 'true',
		'autoplay_speed' 	 => '3000',
		'speed'				 => '300',
		'arrows' 			 => 'true',
		'dots'				 => 'true',
		'show_caption' 		 => 'true',
		'rtl'            	 => '',	
	), $atts));
	
		
	if( $show_caption ) { 
		$show_caption_value = $show_caption; 
	} else {
		$show_caption_value = 'false';
	}
	
	if( $acf_field ) { 
		$acf_field_value = $acf_field; 
	} else {
		$acf_field_value = '';
	}
	
	
	$dots 				= ( $dots == 'false' ) 				? 'false' 						: 'true';
	$arrows 			= ( $arrows == 'false' ) 			? 'false' 						: 'true';
	$autoplay 			= ( $autoplay == 'false' ) 			? 'false' 						: 'true';
	$autoplay_speed 	= (!empty($autoplay_speed)) 		? $autoplay_speed 			: 3000;
	$speed 				= (!empty($speed)) 					? $speed 						: 300;	
	
	// For RTL
	if( empty($rtl) && is_rtl() ) {
		$rtl = 'true';
	} elseif ( $rtl == 'true' ) {
		$rtl = 'true';
	} else {
		$rtl = 'false';
	}
	
	$unique = fagsfacf_get_unique();	
	wp_enqueue_script( 'wpos-slick-jquery' );
	wp_enqueue_script( 'fagsfacf-public-script' );
	// Slider configuration
	$slider_conf = compact('autoplay', 'autoplay_speed', 'speed', 'arrows','dots','rtl');	
		ob_start();	 
				$images = get_field($acf_field_value);

				if( $images ): ?>
				<div class="fagsfacf-slider-wrap">
					<div id="fagsfacf-slider-<?php echo $unique; ?>" class="fagsfacf-slider">
						<div class="fagsfacf-gallery-slider">
							<?php foreach( $images as $image ): ?>
								<div class="fagsfacf-gallery-slide">
									<div class="fagsfacf-gallery-slide-inner">
										<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
										<?php if($show_caption_value == 'true' ) { ?>
											<div class="fagsfacf-gallery-caption"><?php echo $image['caption']; ?></div>
										<?php } ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
						<div class="fagsfacf-slider-conf"><?php echo json_encode( $slider_conf ); ?></div><!-- end of-slider-conf -->
					</div>	
				</div>		
				<?php endif;
				return ob_get_clean(); 
		}	