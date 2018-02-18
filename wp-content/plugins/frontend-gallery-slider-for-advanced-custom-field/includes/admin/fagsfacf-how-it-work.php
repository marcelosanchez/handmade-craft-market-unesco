<?php
/**
 * Pro Designs and Plugins Feed
 *
 * @package Frontend Gallery Slider For Advanced Custom Field
 * @since 1.1
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Action to add menu
add_action('admin_menu', 'fagsfacf_register_design_page',105);

/**
 * Register plugin design page in admin menu
 * 
 * @package Frontend Gallery Slider For Advanced Custom Field
 * @since 1.1
 */
function fagsfacf_register_design_page() {
	add_submenu_page( 'edit.php?post_type='.FAGSFACF_POST_TYPE, __('How it works, our plugins and offers', 'frontend-gallery-slider-for-advanced-custom-field'), __('Frontend Gallery - How It Works', 'frontend-gallery-slider-for-advanced-custom-field'), 'manage_options', 'fagsfacf-designs', 'fagsfacf_designs_page' );
}

/**
 * Function to display plugin design HTML
 * 
 * @package Frontend Gallery Slider For Advanced Custom Field
 * @since 1.1
 */
function fagsfacf_designs_page() {

	$wpos_feed_tabs = fagsfacf_help_tabs();
	$active_tab 	= isset($_GET['tab']) ? $_GET['tab'] : 'how-it-work';
?>
		
	<div class="wrap fagsfacf-wrap">

		<h2 class="nav-tab-wrapper">
			<?php
			foreach ($wpos_feed_tabs as $tab_key => $tab_val) {
				$tab_name	= $tab_val['name'];
				$active_cls = ($tab_key == $active_tab) ? 'nav-tab-active' : '';
				$tab_link 	= add_query_arg( array( 'post_type' => FAGSFACF_POST_TYPE, 'page' => 'fagsfacf-designs', 'tab' => $tab_key), admin_url('edit.php') );
			?>

			<a class="nav-tab <?php echo $active_cls; ?>" href="<?php echo $tab_link; ?>"><?php echo $tab_name; ?></a>

			<?php } ?>
		</h2>
		
		<div class="fagsfacf-tab-cnt-wrp">
		<?php
			if( isset($active_tab) && $active_tab == 'how-it-work' ) {
				fagsfacf_howitwork_page();
			}
			else if( isset($active_tab) && $active_tab == 'plugins-feed' ) {
				echo fagsfacf_get_plugin_design( 'plugins-feed' );
			} else {
				echo fagsfacf_get_plugin_design( 'offers-feed' );
			}
		?>
		</div><!-- end .fagsfacf-tab-cnt-wrp -->

	</div><!-- end .fagsfacf-wrap -->

<?php
}

/**
 * Gets the plugin design part feed
 *
 * @package Frontend Gallery Slider For Advanced Custom Field
 * @since 1.1
 */
function fagsfacf_get_plugin_design( $feed_type = '' ) {
	
	$active_tab = isset($_GET['tab']) ? $_GET['tab'] : '';
	
	// If tab is not set then return
	if( empty($active_tab) ) {
		return false;
	}

	// Taking some variables
	$wpos_feed_tabs = fagsfacf_help_tabs();
	$transient_key 	= isset($wpos_feed_tabs[$active_tab]['transient_key']) 	? $wpos_feed_tabs[$active_tab]['transient_key'] 	: 'fagsfacf_' . $active_tab;
	$url 			= isset($wpos_feed_tabs[$active_tab]['url']) 			? $wpos_feed_tabs[$active_tab]['url'] 				: '';
	$transient_time = isset($wpos_feed_tabs[$active_tab]['transient_time']) ? $wpos_feed_tabs[$active_tab]['transient_time'] 	: 172800;
	$cache 			= get_transient( $transient_key );
	
	if ( false === $cache ) {
		
		$feed 			= wp_remote_get( esc_url_raw( $url ), array( 'timeout' => 120, 'sslverify' => false ) );
		$response_code 	= wp_remote_retrieve_response_code( $feed );
		
		if ( ! is_wp_error( $feed ) && $response_code == 200 ) {
			if ( isset( $feed['body'] ) && strlen( $feed['body'] ) > 0 ) {
				$cache = wp_remote_retrieve_body( $feed );
				set_transient( $transient_key, $cache, $transient_time );
			}
		} else {
			$cache = '<div class="error"><p>' . __( 'There was an error retrieving the data from the server. Please try again later.', 'frontend-gallery-slider-for-advanced-custom-field' ) . '</div>';
		}
	}
	return $cache;	
}

/**
 * Function to get plugin feed tabs
 *
 * @package Frontend Gallery Slider For Advanced Custom Field
 * @since 1.1
 */
function fagsfacf_help_tabs() {
	$wpos_feed_tabs = array(
						'how-it-work' 	=> array(
													'name' => __('How It Works', 'frontend-gallery-slider-for-advanced-custom-field'),
												),
						'plugins-feed' 	=> array(
													'name' 				=> __('Our Plugins', 'frontend-gallery-slider-for-advanced-custom-field'),
													'url'				=> 'http://wponlinesupport.com/plugin-data-api/plugins-data.php',
													'transient_key'		=> 'wpos_plugins_feed',
													'transient_time'	=> 172800
												),
						'offers-feed' 	=> array(
													'name'				=> __('WPOS Offers', 'frontend-gallery-slider-for-advanced-custom-field'),
													'url'				=> 'http://wponlinesupport.com/plugin-data-api/wpos-offers.php',
													'transient_key'		=> 'wpos_offers_feed',
													'transient_time'	=> 86400,
												)
					);
	return $wpos_feed_tabs;
}

/**
 * Function to get 'How It Works' HTML
 *
 * @package Frontend Gallery Slider For Advanced Custom Field
 * @since 1.1
 */
function fagsfacf_howitwork_page() { ?>
	
	<style type="text/css">
		.wpos-pro-box .hndle{background-color:#0073AA; color:#fff;}
		.wpos-pro-box .postbox{background:#dbf0fa none repeat scroll 0 0; border:1px solid #0073aa; color:#191e23;}
		.postbox-container .wpos-list li:before{font-family: dashicons; content: "\f139"; font-size:20px; color: #0073aa; vertical-align: middle;}
		.fagsfacf-wrap .wpos-button-full{display:block; text-align:center; box-shadow:none; border-radius:0;}
		.fagsfacf-shortcode-preview{background-color: #e7e7e7; font-weight: bold; padding: 2px 5px; display: inline-block; margin:0 0 2px 0;}
	</style>

	<div class="post-box-container">
		<div id="poststuff">
			<div id="post-body" class="metabox-holder columns-2">
			
				<!--How it workd HTML -->
				<div id="post-body-content">
					<div class="metabox-holder">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox">
								
								<h3 class="hndle">
									<span><?php _e( 'How It Works - Display and shortcode', 'frontend-gallery-slider-for-advanced-custom-field' ); ?></span>
								</h3>
								
								<div class="inside">
									<table class="form-table">
										<tbody>
											<tr>
												<th>
													<label><?php _e('Getting Started with Frontend Gallery Slider for ACF', 'frontend-gallery-slider-for-advanced-custom-field'); ?>:</label>
												</th>
												<td>
													<ul>
														<li style="color: red;"><strong><?php _e('Note:', 'frontend-gallery-slider-for-advanced-custom-field'); ?></strong> <?php _e('You must have ACF gallery field Addon to work with this plugins.', 'frontend-gallery-slider-for-advanced-custom-field'); ?></li>
														<li><?php _e('Step-1: This plugin works with Gallery field of Advance Custom Field.".', 'frontend-gallery-slider-for-advanced-custom-field'); ?></li>
														<li><?php _e('Step-2: Go to "Custom Fields --> Add new".', 'frontend-gallery-slider-for-advanced-custom-field'); ?></li>
														<li><?php _e('Step-3: Select Field Type Gallery', 'frontend-gallery-slider-for-advanced-custom-field'); ?></li>
													</ul>
												</td>
											</tr>

											<tr>
												<th>
													<label><?php _e('How Shortcode Works', 'frontend-gallery-slider-for-advanced-custom-field'); ?>:</label>
												</th>
												<td>
													<ul>
														<li><?php _e('Step-1. Create a page Gallery.', 'frontend-gallery-slider-for-advanced-custom-field'); ?></li>
														<li><?php _e('Step-2. Put below shortcode as per your need.', 'frontend-gallery-slider-for-advanced-custom-field'); ?></li>
													</ul>
												</td>
											</tr>

											<tr>
												<th>
													<label><?php _e('All Shortcodes', 'frontend-gallery-slider-for-advanced-custom-field'); ?>:</label>
												</th>
												<td>
													<span class="fagsfacf-shortcode-preview">[acf_gallery_carousel]</span> – <?php _e('ACF Gallery Carousel Slider', 'frontend-gallery-slider-for-advanced-custom-field'); ?> <br />
													<span class="fagsfacf-shortcode-preview">[acf_gallery_slider]</span> – <?php _e('ACF Gallery Slider', 'frontend-gallery-slider-for-advanced-custom-field'); ?> <br />
												</td>
											</tr>

											<tr>
												<th>
													<label><?php _e('Need Support?', 'frontend-gallery-slider-for-advanced-custom-field'); ?></label>
												</th>
												<td>
													<p><?php _e('Check plugin document for shortcode parameters and demo for designs.', 'frontend-gallery-slider-for-advanced-custom-field'); ?></p> <br/>
													<a class="button button-primary" href="http://docs.wponlinesupport.com/frontend-gallery-slider-for-acf/" target="_blank"><?php _e('Documentation', 'frontend-gallery-slider-for-advanced-custom-field'); ?></a>									
													<a class="button button-primary" href="http://demo.wponlinesupport.com/frontend-gallery-slider-for-acf-demo/?utm_source=hp&event=demo" target="_blank"><?php _e('Demo for Designs', 'frontend-gallery-slider-for-advanced-custom-field'); ?></a>
												</td>
											</tr>
										</tbody>
									</table>
								</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->
				</div><!-- #post-body-content -->
				
				<!--Upgrad to Pro HTML -->
				<div id="postbox-container-1" class="postbox-container">
					<div class="metabox-holder wpos-pro-box">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox" style="">
									
								<h3 class="hndle">
									<span><?php _e( 'Upgrate to Pro', 'frontend-gallery-slider-for-advanced-custom-field' ); ?></span>
								</h3>
								<div class="inside">										
									<ul class="wpos-list">
										<li>15+ designs</li>
										<li>Gallery Slider with Lightbox</li>
										<li>Gallery Carousel with Lightbox</li>
										<li>Variable width slider with Lightbox</li>
										<li>Custom CSS</li>
										<li>Strong Shortcode Parameters</li>
										<li>Slider Center Mode Effect</li>
										<li>Slider RTL support</li>
										<li>Light weight, Fast & Powerful</li>
										<li>Unlimited slider anywhere</li>
										<li>Awesome Touch-Swipe Enabled</li>
										<li>Fully responsive</li>
										<li>100% Multi language</li>
									</ul>
									<a class="button button-primary wpos-button-full" href="https://www.wponlinesupport.com/wordpress-plugin-addon/frontend-gallery-slider-acf/?utm_source=hp&event=go_premium" target="_blank"><?php _e('Go Premium ', 'frontend-gallery-slider-for-advanced-custom-field'); ?></a>	
									<p><a class="button button-primary wpos-button-full" href="http://demo.wponlinesupport.com/prodemo/frontend-gallery-slider-for-advanced-custom-field/?utm_source=hp&event=pro_demo" target="_blank"><?php _e('View PRO Demo ', 'frontend-gallery-slider-for-advanced-custom-field'); ?></a>			</p>								
								</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->

					<!-- Help to improve this plugin! -->
					<div class="metabox-holder">
						<div class="meta-box-sortables ui-sortable">
							<div class="postbox">
									<h3 class="hndle">
										<span><?php _e( 'Help to improve this plugin!', 'frontend-gallery-slider-for-advanced-custom-field' ); ?></span>
									</h3>
									<div class="inside">
										<p><?php _e('Enjoyed this plugin? You can help by rate this plugin', 'frontend-gallery-slider-for-advanced-custom-field'); ?> <a href="https://wordpress.org/support/plugin/frontend-gallery-slider-for-advanced-custom-field/reviews/?filter=5" target="_blank">5 stars!</a></p>
									</div><!-- .inside -->
							</div><!-- #general -->
						</div><!-- .meta-box-sortables ui-sortable -->
					</div><!-- .metabox-holder -->
				</div><!-- #post-container-1 -->

			</div><!-- #post-body -->
		</div><!-- #poststuff -->
	</div><!-- #post-box-container -->
<?php }