<?php
/**
 * This file is used to create tables.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/lib
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
if ( ! is_user_logged_in() ) {
	return;
} else {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	} else {

		if ( ! class_exists( 'DbHelper_Install_Script_Coming_Soon_Booster' ) ) {
			/**
			 * This class is used to perform operations.
			 *
			 * @package    wp-coming-soon-booster
			 * @subpackage lib
			 *
			 * @author  Tech Banker
			 */
			class DbHelper_Install_Script_Coming_Soon_Booster {
				/**
				 * This Function is used for Insert data in database.
				 *
				 * @param string $table_name passes parameter as tablename.
				 * @param string $data passes parameter as data.
				 */
				public function insert_command( $table_name, $data ) {
					global $wpdb;
					$wpdb->insert( $table_name, $data );// WPCS: db call ok.
					return $wpdb->insert_id;
				}
				/**
				 * This function is used for Update data in database.
				 *
				 * @param string $table_name passes parameter as table name.
				 * @param string $data passes parameter as data.
				 * @param string $where passes parameter as where.
				 */
				public function update_command( $table_name, $data, $where ) {
					global $wpdb;
					$wpdb->update( $table_name, $data, $where );// WPCS: db call ok, cache ok.
				}
			}
		}

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		$coming_soon_booster_versions_number = get_option( 'coming_soon_booster_versions_number' );
		if ( ! function_exists( 'coming_soon_booster_parent_table' ) ) {
			/**
			 * Function Name: coming_soon_booster_parent_table
			 * Parameters: No
			 * Description: This function is used for creating a parent table in database.
			 * Created On: 2015-07-11 4:56
			 * Created By: Tech Banker Team
			 */
			function coming_soon_booster_parent_table() {
				global $wpdb;
				$collate = $wpdb->get_charset_collate();
				$sql     = 'CREATE TABLE IF NOT EXISTS ' . coming_soon_booster() . '
				(
					`id` int(10) NOT NULL AUTO_INCREMENT,
					`type` longtext NOT NULL,
					`parent_id` int(10) NOT NULL,
					PRIMARY KEY (`id`)
				)' . $collate;
				dbDelta( $sql );

				$var = 'INSERT INTO ' . coming_soon_booster() . " (`type`, `parent_id`) VALUES
				('theme',0),
				('layout_settings', 0),
				('social_media_settings', 0),
				('subscription', 0),
				('contact_form', 0),
				('collation_type', 0),
				('roles_and_capabilities', 0),
				('plugin_mode', 0),
				('other_settings', 0);";

				dbDelta( $var );

				$parent_table                     = $wpdb->get_results(
					'SELECT * FROM ' . $wpdb->prefix . 'coming_soon_booster'
				);// WPCS: db call ok, cache ok.
				$obj_dbhelper_coming_soon_booster = new DbHelper_Install_Script_Coming_Soon_Booster();
				if ( isset( $parent_table ) && count( $parent_table ) > 0 ) {
					foreach ( $parent_table as $parent ) {
						switch ( $parent->type ) {
							case 'theme':
								$insert_theme_parent_value        = array();
								$insert_parent_value['type']      = 'theme_1';
								$insert_parent_value['parent_id'] = $parent->id;
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster(), $insert_parent_value );
								break;

							case 'layout_settings':
								$insert_into_parent                     = array();
								$insert_into_parent['seo_settings']     = $parent->id;
								$insert_into_parent['favicon_settings'] = $parent->id;
								foreach ( $insert_into_parent as $keys => $value ) {
									$insert_parent_value              = array();
									$insert_parent_value['type']      = $keys;
									$insert_parent_value['parent_id'] = $value;
									$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster(), $insert_parent_value );
								}
								break;

							case 'contact_form':
								$insert_into_parent                                 = array();
								$insert_into_parent['contact_background_settings']  = $parent->id;
								$insert_into_parent['contact_heading_settings']     = $parent->id;
								$insert_into_parent['contact_description_settings'] = $parent->id;
								$insert_into_parent['label_settings']               = $parent->id;
								$insert_into_parent['contact_textbox_settings']     = $parent->id;
								$insert_into_parent['button_settings']              = $parent->id;
								$insert_into_parent['success_message_settings']     = $parent->id;
								$insert_into_parent['footer_settings']              = $parent->id;
								$insert_into_parent['email_templates']              = $parent->id;
								foreach ( $insert_into_parent as $keys => $value ) {
									$insert_parent_value              = array();
									$insert_parent_value['type']      = $keys;
									$insert_parent_value['parent_id'] = $value;
									$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster(), $insert_parent_value );
								}
								break;

							case 'subscription':
								$insert_into_parent                                      = array();
								$insert_into_parent['background_settings_subscription']  = $parent->id;
								$insert_into_parent['heading_settings_subscription']     = $parent->id;
								$insert_into_parent['description_settings_subscription'] = $parent->id;
								$insert_into_parent['textbox_settings_subscription']     = $parent->id;
								$insert_into_parent['button_settings_subscription']      = $parent->id;
								$insert_into_parent['success_settings']                  = $parent->id;
								$insert_into_parent['error_settings']                    = $parent->id;
								$insert_into_parent['email_templates_subscription']      = $parent->id;
								foreach ( $insert_into_parent as $keys => $value ) {
									$insert_parent_value              = array();
									$insert_parent_value['type']      = $keys;
									$insert_parent_value['parent_id'] = $value;
									$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster(), $insert_parent_value );
								}
								break;
						}
					}
				}
			}
		}
		if ( ! function_exists( 'coming_soon_booster_meta_table' ) ) {
			/**
			 * Function Name: coming_soon_booster_meta_table
			 * Parameter: No
			 * Description: This function is used for creating a meta table in database.
			 * Created On: 2015-07-11 4:56
			 * Created By: Tech Banker Team
			 */
			function coming_soon_booster_meta_table() {
				global $wpdb;
				$collate                          = $wpdb->get_charset_collate();
				$obj_dbhelper_coming_soon_booster = new DbHelper_Install_Script_Coming_Soon_Booster();
				$sql                              = 'CREATE TABLE IF NOT EXISTS ' . coming_soon_booster_meta() . '
				(
					`id` int(10) NOT NULL AUTO_INCREMENT,
					`meta_id` int(10) NOT NULL,
					`meta_key` varchar(200) NOT NULL,
					`meta_value` longtext NOT NULL,
					PRIMARY KEY (`id`)
				)' . $collate;
				dbDelta( $sql );

				$url            = site_url();
				$date_timestamp = strtotime( '+30 day' );
				$launch_date    = date( 'm/d/Y', $date_timestamp );
				$admin_email    = get_option( 'admin_email' );

				$parent_table_data = $wpdb->get_results(
					'SELECT id,type FROM ' . $wpdb->prefix . 'coming_soon_booster'
				);// WPCS: db call ok, cache ok.
				if ( count( $parent_table_data ) > 0 ) {
					foreach ( $parent_table_data as $row ) {
						switch ( $row->type ) {
							case 'plugin_mode':
								$plugin_mode_settings_data['default_mode'] = 'coming_soon_mode';

								$plugin_mode_settings_data_serialize               = array();
								$plugin_mode_settings_data_serialize['meta_id']    = $row->id;
								$plugin_mode_settings_data_serialize['meta_key']   = 'plugin_mode_setting_data';// WPCS: slow query ok.
								$plugin_mode_settings_data_serialize['meta_value'] = maybe_serialize( $plugin_mode_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $plugin_mode_settings_data_serialize );
								break;

							case 'theme_1':
								$background_settings_data['slideshow_images']                      = null;
								$background_settings_data['selected_save_slideshow']               = null;
								$background_settings_data['choose_slideshow']                      = '';
								$background_settings_data['selected_slideshow_ids']                = null;
								$background_settings_data['select_slideshow']                      = array( 1, 2, 3 );
								$background_settings_data['background_type']                       = 'color';
								$background_settings_data['background_color']                      = '#d61c38';
								$background_settings_data['animation']                             = 'enable';
								$background_settings_data['background_upload_img_thumb']           = '';
								$background_settings_data['background_upload_img_url']             = null;
								$background_settings_data['selected_background_upload_img']        = '';
								$background_settings_data['bg_image']                              = '';
								$background_settings_data['animation_type_background']             = 'particles';
								$background_settings_data['animation_shooting_stars_color']        = '#000000';
								$background_settings_data['animation_shooting_stars_border_color'] = '#000000';
								$background_settings_data['choose_background']                     = '2';
								$background_settings_data['image_position_background']             = 'no-repeat,center,center';
								$background_settings_data['animation_image']                       = 'enable';
								$background_settings_data['animation_type_image']                  = 'winter';
								$background_settings_data['video_url']                             = 'http://youtu.be/Scxs7L0vhZ4';
								$background_settings_data['video_sound']                           = '0';
								$background_settings_data['player_controls']                       = 'show';
								$background_settings_data['player_control_color']                  = '#d61c38';
								$background_settings_data['player_control_hover_color']            = '#282931';
								$background_settings_data['slideshow_effect']                      = 'zoomOut';
								$background_settings_data['duration']                              = '2';
								$background_settings_data['animation_slideshow']                   = 'enable';
								$background_settings_data['animation_type_slideshow']              = 'bubbles';
								$background_settings_data['overlay']                               = 'show';
								$background_settings_data['overlay_color']                         = '#282931';
								$background_settings_data['overlay_color_opacity']                 = '100';
								$background_settings_data['local_video_url']                       = '';
								$background_settings_data['animation_smooth_bubbles_first_color']  = '#000000';
								$background_settings_data['animation_smooth_bubbles_second_color'] = '#000000';

								$background_settings_data_serialize               = array();
								$background_settings_data_serialize['meta_id']    = $row->id;
								$background_settings_data_serialize['meta_key']   = 'background_settings_data';// WPCS: slow query ok.
								$background_settings_data_serialize['meta_value'] = maybe_serialize( $background_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $background_settings_data_serialize );

								$countdown_settings_data['countdown_timer']       = 'show';
								$countdown_settings_data['launch_date']           = $launch_date;
								$countdown_settings_data['launch_time']           = '0,0,0';
								$countdown_settings_data['time_zone']             = 'UTC';
								$countdown_settings_data['countdown_text']        = 'Launching in :';
								$countdown_settings_data['font_style_countdown']  = '30px,#ffffff';
								$countdown_settings_data['font_family_countdown'] = 'Poppins';
								$countdown_settings_data['margin_countdown']      = '0,0,15,0';
								$countdown_settings_data['padding_countdown']     = '0,0,15,0';

								$countdown_settings_data_serialize               = array();
								$countdown_settings_data_serialize['meta_id']    = $row->id;
								$countdown_settings_data_serialize['meta_key']   = 'countdown_settings_data';// WPCS: slow query ok.
								$countdown_settings_data_serialize['meta_value'] = maybe_serialize( $countdown_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $countdown_settings_data_serialize );

								$loader_settings_data                            = array();
								$loader_settings_data['loader_color']            = '#d61c38';
								$loader_settings_data['loader_background_color'] = '#282931';
								$loader_settings_data['loader_text']             = 'show';
								$loader_settings_data['loader_text_title']       = 'Loading. Please Wait...';
								$loader_settings_data['loader_text_font_size']   = '12px';
								$loader_settings_data['loader_text_font_family'] = 'Poppins';
								$loader_settings_data['loader_text_font_color']  = '#ffffff';

								$loader_settings_data_serialize               = array();
								$loader_settings_data_serialize['meta_id']    = $row->id;
								$loader_settings_data_serialize['meta_key']   = 'loader_settings_data';// WPCS: slow query ok.
								$loader_settings_data_serialize['meta_value'] = maybe_serialize( $loader_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $loader_settings_data_serialize );

								$logo_settings_data                          = array();
								$logo_settings_data['logo']                  = 'show';
								$logo_settings_data['logo_type']             = 'image';
								$logo_settings_data['logo_text']             = 'Coming Soon Booster';
								$logo_settings_data['font_style_layout']     = '55px';
								$logo_settings_data['font_family_layout']    = 'Poppins';
								$logo_settings_data['font_color_layout']     = '#ffffff';
								$logo_settings_data['html_tag_property']     = 'h1';
								$logo_settings_data['text_logo_link']        = 'hide';
								$logo_settings_data['text_logo_link_path']   = $url;
								$logo_settings_data['margin_layout']         = '20,10,0,35';
								$logo_settings_data['padding_layout']        = '15,10,0,35';
								$logo_settings_data['logo_image']            = '';
								$logo_settings_data['logo_link']             = 'hide';
								$logo_settings_data['logo_link_text']        = $url;
								$logo_settings_data['img_logo_link_target']  = '_blank';
								$logo_settings_data['text_logo_link_target'] = '_blank';
								$logo_settings_data['logo_size']             = 'default';
								$logo_settings_data['max_height']            = '150';
								$logo_settings_data['max_width']             = '300';

								$logo_settings_data_serialize               = array();
								$logo_settings_data_serialize['meta_id']    = $row->id;
								$logo_settings_data_serialize['meta_key']   = 'logo_settings_data';// WPCS: slow query ok.
								$logo_settings_data_serialize['meta_value'] = maybe_serialize( $logo_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $logo_settings_data_serialize );

								$heading_settings_data                        = array();
								$heading_settings_data['heading_settings']    = 'show';
								$heading_settings_data['heading_text']        = "<p>Hey Guys!</br>We're Coming Soon...</p>";
								$heading_settings_data['font_style_heading']  = '34px,#d61c38';
								$heading_settings_data['font_family_heading'] = 'Poppins';
								$heading_settings_data['margin_heading']      = '15,0,0,0';
								$heading_settings_data['padding_heading']     = '15,0,0,0';

								$header_settings_data_serialize               = array();
								$header_settings_data_serialize['meta_id']    = $row->id;
								$header_settings_data_serialize['meta_key']   = 'heading_settings_data';// WPCS: slow query ok.
								$header_settings_data_serialize['meta_value'] = maybe_serialize( $heading_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $header_settings_data_serialize );

								$description_settings_data                            = array();
								$description_settings_data['description_settings']    = 'show';
								$description_settings_data['description_text']        = '<p>Perfect and awesome Coming Soon plugin to present your future agency or business.<br /> Hooking audience attention is all in the opener.</p>';
								$description_settings_data['font_style_description']  = '18px,#ffffff';
								$description_settings_data['font_family_description'] = 'Poppins:300';
								$description_settings_data['margin_description']      = '10,0,15,0';
								$description_settings_data['padding_description']     = '10,0,10,0';

								$description_settings_data_serialize               = array();
								$description_settings_data_serialize['meta_id']    = $row->id;
								$description_settings_data_serialize['meta_key']   = 'description_settings_data';// WPCS: slow query ok.
								$description_settings_data_serialize['meta_value'] = maybe_serialize( $description_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $description_settings_data_serialize );

								$layout_button_settings_data                                        = array();
								$layout_button_settings_data['layout_subscriber_button_label']      = 'subscriber_button';
								$layout_button_settings_data['layout_subscriber_button_name']       = 'Notify Me!';
								$layout_button_settings_data['layout_subscriber_button_visibility'] = 'show';
								$layout_button_settings_data['layout_subscriber_button_color']      = '#d61c38';
								$layout_button_settings_data['layout_subscriber_hover_color']       = '#ffffff';
								$layout_button_settings_data['layout_subscriber_text_hover_color']  = '#d61c38';
								$layout_button_settings_data['layout_subscriber_border_color']      = '#d61c38';
								$layout_button_settings_data['layout_subscriber_border_hover_color'] = '#ffffff';
								$layout_button_settings_data['layout_subscriber_font_style_button']  = '18px,#ffffff';
								$layout_button_settings_data['layout_subscriber_font_family_button'] = 'Poppins';
								$layout_button_settings_data['layout_subscriber_label_alignment']    = 'center';
								$layout_button_settings_data['layout_subscriber_margin_button']      = '10,10,0,10';
								$layout_button_settings_data['layout_subscriber_padding_button']     = '12,30,11,30';
								$layout_button_settings_data['layout_contact_button_label']          = 'contact_button';
								$layout_button_settings_data['layout_contact_button_name']           = 'More Information';
								$layout_button_settings_data['layout_contact_button_visibility']     = 'show';
								$layout_button_settings_data['layout_contact_button_color']          = '#ffffff';
								$layout_button_settings_data['layout_contact_hover_color']           = '#d61c38';
								$layout_button_settings_data['layout_contact_text_hover_color']      = '#ffffff';
								$layout_button_settings_data['layout_contact_border_color']          = '#ffffff';
								$layout_button_settings_data['layout_contact_border_hover_color']    = '#d61c38';
								$layout_button_settings_data['layout_contact_font_style_button']     = '18px,#d61c38';
								$layout_button_settings_data['layout_contact_font_family_button']    = 'Poppins';
								$layout_button_settings_data['layout_contact_label_alignment']       = 'center';
								$layout_button_settings_data['layout_contact_margin_button']         = '10,10,0,0';
								$layout_button_settings_data['layout_contact_padding_button']        = '12,40,12,40';

								$layout_button_settings_data_serialize               = array();
								$layout_button_settings_data_serialize['meta_id']    = $row->id;
								$layout_button_settings_data_serialize['meta_key']   = 'layout_button_settings_data';// WPCS: slow query ok.
								$layout_button_settings_data_serialize['meta_value'] = maybe_serialize( $layout_button_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $layout_button_settings_data_serialize );

								$insert_custom_css_data               = array();
								$insert_custom_css_data['custom_css'] = '';

								$insert_custom_css_serialized_data               = array();
								$insert_custom_css_serialized_data['meta_id']    = $row->id;
								$insert_custom_css_serialized_data['meta_key']   = 'custom_css_settings';// WPCS: slow query ok.
								$insert_custom_css_serialized_data['meta_value'] = maybe_serialize( $insert_custom_css_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $insert_custom_css_serialized_data );
								break;

							case 'theme':
								$insert_theme_meta_data['theme_type'] = 'theme_1';
								$insert_theme_array                   = array();
								$insert_theme_array['meta_id']        = $row->id;
								$insert_theme_array['meta_key']       = 'theme';// WPCS: slow query ok.
								$insert_theme_array['meta_value']     = maybe_serialize( $insert_theme_meta_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $insert_theme_array );
								break;

							case 'seo_settings':
								$seo_settings_data                      = array();
								$seo_settings_data['seo_title']         = 'Coming Soon Booster | Coming Soon Booster Landing Page | Coming Soon Booster WordPress Plugin';
								$seo_settings_data['meta_description']  = 'Coming Soon Booster gives you an attractive and professional coming soon page with various customization options.';
								$seo_settings_data['meta_keyword']      = 'coming soon booster, coming soon page, construction, countdown, custom maintenance mode, landing page, launch, launch page, maintenance, coming soon, maintenance page';
								$seo_settings_data['meta_robot_follow'] = 'follow';
								$seo_settings_data['canonical_url']     = $url;
								$seo_settings_data['tracking_code']     = '';

								$seo_settings_data_serialize               = array();
								$seo_settings_data_serialize['meta_id']    = $row->id;
								$seo_settings_data_serialize['meta_key']   = 'seo_settings_data';// WPCS: slow query ok.
								$seo_settings_data_serialize['meta_value'] = maybe_serialize( $seo_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $seo_settings_data_serialize );
								break;

							case 'favicon_settings':
								$favicon_settings_data                     = array();
								$favicon_settings_data['favicon_settings'] = 'show';
								$favicon_settings_data['upload_favicon']   = plugins_url( 'assets/global/img/icon.png', dirname( __FILE__ ) );

								$favicon_settings_data_serialize               = array();
								$favicon_settings_data_serialize['meta_id']    = $row->id;
								$favicon_settings_data_serialize['meta_key']   = 'favicon_settings_data';// WPCS: slow query ok.
								$favicon_settings_data_serialize['meta_value'] = maybe_serialize( $favicon_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $favicon_settings_data_serialize );
								break;

							case 'social_media_settings':
								$social_media_settings_data['email']       = $admin_email;
								$social_media_settings_data['website_url'] = $url;
								$social_media_settings_data['google']      = '';
								$social_media_settings_data['youtube']     = '';
								$social_media_settings_data['instagram']   = '';
								$social_media_settings_data['pinterest']   = '';
								$social_media_settings_data['flickr']      = '';
								$social_media_settings_data['google_plus'] = '';
								$social_media_settings_data['vimeo']       = '';
								$social_media_settings_data['linkedin']    = 'https://www.linkedin.com';
								$social_media_settings_data['skype']       = 'https://www.skype.com';
								$social_media_settings_data['tumblr']      = '';
								$social_media_settings_data['dribble']     = '';
								$social_media_settings_data['github']      = '';
								$social_media_settings_data['rss']         = '';
								$social_media_settings_data['facebook']    = 'https://www.facebook.com';
								$social_media_settings_data['yahoo']       = '';
								$social_media_settings_data['blogger']     = '';
								$social_media_settings_data['wordpress']   = '';
								$social_media_settings_data['myspace']     = '';
								$social_media_settings_data['foursquare']  = '';
								$social_media_settings_data['livejournal'] = '';
								$social_media_settings_data['twitter']     = '';
								$social_media_settings_data['deviantart']  = '';

								$social_media_settings_data_serialize               = array();
								$social_media_settings_data_serialize['meta_id']    = $row->id;
								$social_media_settings_data_serialize['meta_key']   = 'social_media_settings_data';// WPCS: slow query ok.
								$social_media_settings_data_serialize['meta_value'] = maybe_serialize( $social_media_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $social_media_settings_data_serialize );
								break;

							case 'contact_background_settings':
								$contact_form_background_settings_data                                       = array();
								$contact_form_background_settings_data['contact_background_color']           = '#282931';
								$contact_form_background_settings_data['contact_background_color_opacity']   = '100';
								$contact_form_background_settings_data['contact_background_scrollbar_color'] = '#d61c38';
								$contact_form_background_settings_data['contact_cross_icon_color']           = '#ffffff';

								$contact_form_background_settings_data_serialize               = array();
								$contact_form_background_settings_data_serialize['meta_id']    = $row->id;
								$contact_form_background_settings_data_serialize['meta_key']   = 'contact_form_background_settings_data';// WPCS: slow query ok.
								$contact_form_background_settings_data_serialize['meta_value'] = maybe_serialize( $contact_form_background_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $contact_form_background_settings_data_serialize );
								break;

							case 'contact_heading_settings':
								$contact_heading_settings_data                                = array();
								$contact_heading_settings_data['contact_heading_settings']    = 'show';
								$contact_heading_settings_data['contact_heading_text']        = '<p>GET IN TOUCH WITH US.</p>';
								$contact_heading_settings_data['contact_font_style_heading']  = '25px,#d61c38';
								$contact_heading_settings_data['contact_font_family_heading'] = 'Poppins';
								$contact_heading_settings_data['contact_margin_heading']      = '0,0,0,0';
								$contact_heading_settings_data['contact_padding_heading']     = '0,0,0,0';

								$contact_heading_settings_data_serialize               = array();
								$contact_heading_settings_data_serialize['meta_id']    = $row->id;
								$contact_heading_settings_data_serialize['meta_key']   = 'contact_form_heading_data';// WPCS: slow query ok.
								$contact_heading_settings_data_serialize['meta_value'] = maybe_serialize( $contact_heading_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $contact_heading_settings_data_serialize );
								break;

							case 'contact_description_settings':
								$contact_description_settings_data                                    = array();
								$contact_description_settings_data['contact_description_settings']    = 'show';
								$contact_description_settings_data['contact_description_text']        = "<p>Have a question, inquiry or feedback? Just use the form below if you have any questions about our Products and we'll get back with you very soon.</p>";
								$contact_description_settings_data['contact_font_style_description']  = '18px,#ffffff';
								$contact_description_settings_data['contact_font_family_description'] = 'Poppins:300';
								$contact_description_settings_data['contact_margin_description']      = '10,0,20,0';
								$contact_description_settings_data['contact_padding_description']     = '10,0,10,0';

								$contact_description_settings_data_serialize               = array();
								$contact_description_settings_data_serialize['meta_id']    = $row->id;
								$contact_description_settings_data_serialize['meta_key']   = 'contact_form_description_data';// WPCS: slow query ok.
								$contact_description_settings_data_serialize['meta_value'] = maybe_serialize( $contact_description_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $contact_description_settings_data_serialize );
								break;

							case 'label_settings':
								$contact_form_label_settings_data                           = array();
								$contact_form_label_settings_data['label_settings_contact'] = 'show';
								$contact_form_label_settings_data['name_label']             = 'This is your Name field';
								$contact_form_label_settings_data['email_label']            = 'This is your Email field';
								$contact_form_label_settings_data['subject_label']          = 'This is your Subject field';
								$contact_form_label_settings_data['message_label']          = 'This is your Message field';
								$contact_form_label_settings_data['font_style_label']       = '14px,#ffffff';
								$contact_form_label_settings_data['font_family_label']      = 'Poppins:300';

								$contact_form_label_settings_data_serialize               = array();
								$contact_form_label_settings_data_serialize['meta_id']    = $row->id;
								$contact_form_label_settings_data_serialize['meta_key']   = 'contact_form_label_settings_data';// WPCS: slow query ok.
								$contact_form_label_settings_data_serialize['meta_value'] = maybe_serialize( $contact_form_label_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $contact_form_label_settings_data_serialize );
								break;

							case 'contact_textbox_settings':
								$contact_form_textbox_settings_data                                     = array();
								$contact_form_textbox_settings_data['name_textbox_contact_form']        = 'Your Name';
								$contact_form_textbox_settings_data['email_textbox_contact_form']       = 'Your Email';
								$contact_form_textbox_settings_data['subject_textbox_contact_form']     = 'Write the Subject';
								$contact_form_textbox_settings_data['message_textbox_contact_form']     = 'Your message here... 20 characters Min.';
								$contact_form_textbox_settings_data['font_style_textbox_contact_form']  = '12px,#282931';
								$contact_form_textbox_settings_data['font_family_textbox_contact_form'] = 'Poppins:300';
								$contact_form_textbox_settings_data['textbox_color_contact_form']       = '#ffffff';
								$contact_form_textbox_settings_data['placeholder_alignment_textbox_contact_form'] = 'left';
								$contact_form_textbox_settings_data['margin_textbox_contact_form']                = '5,0,0,0';
								$contact_form_textbox_settings_data['padding_textbox_contact_form']               = '2,0,0,10';

								$contact_form_textbox_settings_data_serialize               = array();
								$contact_form_textbox_settings_data_serialize['meta_id']    = $row->id;
								$contact_form_textbox_settings_data_serialize['meta_key']   = 'contact_form_textbox_settings_data';// WPCS: slow query ok.
								$contact_form_textbox_settings_data_serialize['meta_value'] = maybe_serialize( $contact_form_textbox_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $contact_form_textbox_settings_data_serialize );
								break;

							case 'button_settings':
								$contact_form_button_settings_data                                    = array();
								$contact_form_button_settings_data['button_label_contact_form']       = 'Submit';
								$contact_form_button_settings_data['button_color_contact_form']       = '#d61c38';
								$contact_form_button_settings_data['border_color_contact_form']       = '#d61c38';
								$contact_form_button_settings_data['hover_color_contact_form']        = '#ffffff';
								$contact_form_button_settings_data['text_hover_color_contact_form']   = '#d61c38';
								$contact_form_button_settings_data['border_hover_color_contact_form'] = '#ffffff';
								$contact_form_button_settings_data['font_style_button_contact_form']  = '18px,#ffffff';
								$contact_form_button_settings_data['font_family_button_contact_form'] = 'Poppins:300';
								$contact_form_button_settings_data['label_alignment_contact_form']    = 'center';
								$contact_form_button_settings_data['margin_button_contact_form']      = '0,0,0,0';
								$contact_form_button_settings_data['padding_button_contact_form']     = '18,0,18,0';

								$contact_form_button_settings_data_serialize               = array();
								$contact_form_button_settings_data_serialize['meta_id']    = $row->id;
								$contact_form_button_settings_data_serialize['meta_key']   = 'contact_form_button_settings_data';// WPCS: slow query ok.
								$contact_form_button_settings_data_serialize['meta_value'] = maybe_serialize( $contact_form_button_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $contact_form_button_settings_data_serialize );
								break;

							case 'success_message_settings':
								$success_message_settings_data = array();
								$success_message_settings_data['success_message_settings_contact_form']             = 'show';
								$success_message_settings_data['success_message_text_contact_form']                 = '<p>Hello, Your message has been sent, we will get back to you asap !</p>';
								$success_message_settings_data['font_style_success_message_settings_contact_form']  = '18px,#ffffff';
								$success_message_settings_data['font_family_success_message_settings_contact_form'] = 'Poppins:300';

								$success_message_settings_data_serialize               = array();
								$success_message_settings_data_serialize['meta_id']    = $row->id;
								$success_message_settings_data_serialize['meta_key']   = 'success_message_settings_data';// WPCS: slow query ok.
								$success_message_settings_data_serialize['meta_value'] = maybe_serialize( $success_message_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $success_message_settings_data_serialize );
								break;

							case 'footer_settings':
								$footer_settings_data                       = array();
								$footer_settings_data['footer_settings']    = 'show';
								$footer_settings_data['footer_text']        = '<p>Copyright © Tech Banker.All Rights Reserved</p>';
								$footer_settings_data['font_style_footer']  = '10px,#ffffff';
								$footer_settings_data['font_family_footer'] = 'Poppins:300';
								$footer_settings_data['margin_footer']      = '0,10,10,10';
								$footer_settings_data['padding_footer']     = '0,10,10,10';

								$footer_settings_data_serialize               = array();
								$footer_settings_data_serialize['meta_id']    = $row->id;
								$footer_settings_data_serialize['meta_key']   = 'footer_settings_data';// WPCS: slow query ok.
								$footer_settings_data_serialize['meta_value'] = maybe_serialize( $footer_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $footer_settings_data_serialize );
								break;

							case 'email_templates':
								$email_templates_admin_data                                     = array();
								$email_templates_admin_data['template_for_admin_notification']  = 'Client Notification';
								$email_templates_admin_data['template_for_client_notification'] = 'Thank you for Contacting us!';

								$email_template_messages = array( '<p>Hello Admin,</p><p>A new user visited our website [website_url] at [date_time] from [ip_address].</p><p>Here is the detailed footprint of the Request:-</p><p>UserName : [username]</p><p>Email : [email]</p><p>Date/Time : [date_time]</p><p>Country : [country]</p><p>Site : [site_url]</p><p>IP Address : [ip_address]</p><p>Comments : [comments]</p><p>Resource : [resource]</p><p>Thanks & Regards</p><p>Technical Support Team</p>', '<p>Hi,</p><p>Thanks for visiting our website. We will be contacting you shortly.</p><p>Thanks.</p>' );
								$count_message           = 0;
								foreach ( $email_templates_admin_data as $key => $value ) {
									$email_templates_admin                  = array();
									$email_templates_admin['email_send_to'] = $admin_email;
									$email_templates_admin['email_cc']      = '';
									$email_templates_admin['email_bcc']     = '';
									if ( 'template_for_client_notification' === $key ) {
										$email_templates_admin['email_subject'] = $value;
									}
									$email_templates_admin['email_message'] = $email_template_messages[ $count_message ];
									$count_message++;

									$email_templates_admin_data_serialize               = array();
									$email_templates_admin_data_serialize['meta_id']    = $row->id;
									$email_templates_admin_data_serialize['meta_key']   = $key;// WPCS: slow query ok.
									$email_templates_admin_data_serialize['meta_value'] = maybe_serialize( $email_templates_admin );// WPCS: slow query ok.
									$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $email_templates_admin_data_serialize );
								}
								break;

							case 'background_settings_subscription':
								$background_settings_subscription_data                                  = array();
								$background_settings_subscription_data['background_color_subscription'] = '#282931';
								$background_settings_subscription_data['background_color_opacity_subscription']    = '75';
								$background_settings_subscription_data['background_font_size_subscription']        = '5px';
								$background_settings_subscription_data['background_border_color_subscription']     = '#d61c38';
								$background_settings_subscription_data['background_cross_icon_color_subscription'] = '#ffffff';

								$description_subscription_settings_data_serialize               = array();
								$description_subscription_settings_data_serialize['meta_id']    = $row->id;
								$description_subscription_settings_data_serialize['meta_key']   = 'subscription_background_settings_data';// WPCS: slow query ok.
								$description_subscription_settings_data_serialize['meta_value'] = maybe_serialize( $background_settings_subscription_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $description_subscription_settings_data_serialize );
								break;

							case 'heading_settings_subscription':
								$heading_settings_subscription_data                                     = array();
								$heading_settings_subscription_data['heading_settings_subscription']    = 'show';
								$heading_settings_subscription_data['heading_text_subscription']        = '<p>SUBSCRIBE TO RECEIVE UPDATES</p>';
								$heading_settings_subscription_data['font_style_heading_subscription']  = '25px,#d61c38';
								$heading_settings_subscription_data['font_family_heading_subscription'] = 'Poppins';
								$heading_settings_subscription_data['margin_heading_subscription']      = '0,0,0,0';
								$heading_settings_subscription_data['padding_heading_subscription']     = '0,0,0,0';

								$heading_subscription_settings_data_serialize               = array();
								$heading_subscription_settings_data_serialize['meta_id']    = $row->id;
								$heading_subscription_settings_data_serialize['meta_key']   = 'subscription_heading_settings_data';// WPCS: slow query ok.
								$heading_subscription_settings_data_serialize['meta_value'] = maybe_serialize( $heading_settings_subscription_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $heading_subscription_settings_data_serialize );
								break;

							case 'description_settings_subscription':
								$description_settings_subscription_data                                        = array();
								$description_settings_subscription_data['description_settings_subscription']   = 'show';
								$description_settings_subscription_data['description_text_subscription']       = "<p style='text-align: center;'>Welcome to our Newsletter Subscription.<br /> Sign up in the form below to receive the latest news and updates from us.</p>";
								$description_settings_subscription_data['font_style_description_subscription'] = '18px,#ffffff';
								$description_settings_subscription_data['font_family_description_subscription'] = 'Poppins:300';
								$description_settings_subscription_data['margin_description_subscription']      = '10,0,10,0';
								$description_settings_subscription_data['padding_description_subscription']     = '10,0,10,0';

								$description_subscription_settings_data_serialize               = array();
								$description_subscription_settings_data_serialize['meta_id']    = $row->id;
								$description_subscription_settings_data_serialize['meta_key']   = 'subscription_description_settings_data';// WPCS: slow query ok.
								$description_subscription_settings_data_serialize['meta_value'] = maybe_serialize( $description_settings_subscription_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $description_subscription_settings_data_serialize );
								break;

							case 'textbox_settings_subscription':
								$textbox_settings_subscription_data                                     = array();
								$textbox_settings_subscription_data['textbox_placeholder_subscription'] = 'Your email';
								$textbox_settings_subscription_data['textbox_font_style_subscription']  = '15px,#282931';
								$textbox_settings_subscription_data['textbox_font_family_subscription'] = 'Poppins:300';
								$textbox_settings_subscription_data['textbox_color_subscription']       = '#ffffff';
								$textbox_settings_subscription_data['textbox_placeholder_alignment_subscription'] = 'center';
								$textbox_settings_subscription_data['textbox_margin_subscription']                = '0,0,0,0';
								$textbox_settings_subscription_data['textbox_padding_subscription']               = '0,0,0,0';

								$textbox_settings_subscription_data_serialize               = array();
								$textbox_settings_subscription_data_serialize['meta_id']    = $row->id;
								$textbox_settings_subscription_data_serialize['meta_key']   = 'subscription_textbox_settings_data';// WPCS: slow query ok.
								$textbox_settings_subscription_data_serialize['meta_value'] = maybe_serialize( $textbox_settings_subscription_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $textbox_settings_subscription_data_serialize );
								break;

							case 'button_settings_subscription':
								$button_settings_subscription_data                                    = array();
								$button_settings_subscription_data['button_label_subscription']       = 'SUBSCRIBE';
								$button_settings_subscription_data['font_style_button_subscription']  = '20px,#ffffff';
								$button_settings_subscription_data['font_family_button_subscription'] = 'Poppins';
								$button_settings_subscription_data['button_color_subscription']       = '#d61c38';
								$button_settings_subscription_data['border_color_subscription']       = '#d61c38';
								$button_settings_subscription_data['hover_color_button_subscription'] = '#ffffff';
								$button_settings_subscription_data['text_hover_color_button_subscription'] = '#d61c38';
								$button_settings_subscription_data['border_hover_color_subscription']      = '#ffffff';
								$button_settings_subscription_data['label_alignment_button_subscription']  = 'center';
								$button_settings_subscription_data['margin_button_subscription']           = '20,0,0,0';
								$button_settings_subscription_data['padding_button_subscription']          = '0,0,0,0';

								$button_settings_subscription_data_serialize               = array();
								$button_settings_subscription_data_serialize['meta_id']    = $row->id;
								$button_settings_subscription_data_serialize['meta_key']   = 'subscription_button_settings_data';// WPCS: slow query ok.
								$button_settings_subscription_data_serialize['meta_value'] = maybe_serialize( $button_settings_subscription_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $button_settings_subscription_data_serialize );
								break;

							case 'success_settings':
								$success_settings_data                                     = array();
								$success_settings_data['success_settings_subscription']    = 'show';
								$success_settings_data['success_text_subscription']        = '<p>Congrats! You are in list.<br>We will inform you as soon as we finish.</p>';
								$success_settings_data['font_style_success_subscription']  = '16px,#ffffff';
								$success_settings_data['font_family_success_subscription'] = 'Poppins:300';
								$success_settings_data['backgroud_color_success_subscription'] = '#282931';
								$success_settings_data['color_opacity_success_subscription']   = '100';
								$success_settings_data['margin_success_subscription']          = '0,0,0,0';
								$success_settings_data['padding_success_subscription']         = '0,0,0,0';

								$success_settings_data_serialize               = array();
								$success_settings_data_serialize['meta_id']    = $row->id;
								$success_settings_data_serialize['meta_key']   = 'success_settings_data';// WPCS: slow query ok.
								$success_settings_data_serialize['meta_value'] = maybe_serialize( $success_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $success_settings_data_serialize );
								break;

							case 'error_settings':
								$error_settings_data                                       = array();
								$error_settings_data['error_settings_subscription']        = 'show';
								$error_settings_data['error_text_subscription']            = '<p>Your e-mail address is incorrect.<br>Please check it and try again.</p>';
								$error_settings_data['font_style_error_subscription']      = '16px,#ffffff';
								$error_settings_data['font_family_error_subscription']     = 'Poppins:300';
								$error_settings_data['backgroud_color_error_subscription'] = '#282931';
								$error_settings_data['color_opacity_error_subscription']   = '100';
								$error_settings_data['margin_error_subscription']          = '0,0,0,0';
								$error_settings_data['padding_error_subscription']         = '0,0,0,0';

								$error_settings_data_serialize               = array();
								$error_settings_data_serialize['meta_id']    = $row->id;
								$error_settings_data_serialize['meta_key']   = 'error_settings_data';// WPCS: slow query ok.
								$error_settings_data_serialize['meta_value'] = maybe_serialize( $error_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $error_settings_data_serialize );
								break;

							case 'email_templates_subscription':
								$email_templates_admin_data = array();
								$email_templates_admin_data['template_for_admin_notification_subscription']  = 'A new user subscribed in our website.';
								$email_templates_admin_data['template_for_client_notification_subscription'] = 'Thank you for Subscribing with us!';

								$email_template_messages = array( '<p>Hello Admin,</p><p>A new user subscribe to our website</p><p>Here is the detailed footprint of the Request:-</p><p>User Email : [useremail]</p><p>Date/Time : [date_time]</p><p>Country : [country]</p><p>Site : [site_url]</p><p>IP Address : [ip_address]</p><p>Resource : [resource]</p><p>Thanks & Regards</p><p>Technical Support Team</p>', '<p>Hi,</p><p>Thanks for visiting our website. We will be contacting you shortly.</p><p>Thanks.</p>' );
								$count_message           = 0;
								foreach ( $email_templates_admin_data as $key => $value ) {
									$email_templates_admin                               = array();
									$email_templates_admin['subscription_email_send_to'] = $admin_email;
									$email_templates_admin['subscription_email_cc']      = '';
									$email_templates_admin['subscription_email_bcc']     = '';
									$email_templates_admin['subscription_email_subject'] = $value;
									$email_templates_admin['subscription_email_message'] = $email_template_messages[ $count_message ];
									$count_message++;

									$email_templates_admin_data_serialize               = array();
									$email_templates_admin_data_serialize['meta_id']    = $row->id;
									$email_templates_admin_data_serialize['meta_key']   = $key;// WPCS: slow query ok.
									$email_templates_admin_data_serialize['meta_value'] = maybe_serialize( $email_templates_admin );// WPCS: slow query ok.
									$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $email_templates_admin_data_serialize );
								}
								break;

							case 'other_settings':
								$other_settings_data['remove_tables_at_uninstall'] = 'disable';
								$other_settings_data['ip_address_fetching_method'] = '';
								$other_settings_data['gdpr_compliance']            = 'enable';
								$other_settings_data['gdpr_compliance_text']       = 'By using this form you agree with the storage and handling of your data by this website';

								$other_settings_data_serialize               = array();
								$other_settings_data_serialize['meta_id']    = $row->id;
								$other_settings_data_serialize['meta_key']   = 'other_settings_data';// WPCS: slow query ok.
								$other_settings_data_serialize['meta_value'] = maybe_serialize( $other_settings_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $other_settings_data_serialize );
								break;

							case 'roles_and_capabilities':
								$roles_and_capabilities_data['roles_and_capabilities']                = '1,1,1,0,0,0';
								$roles_and_capabilities_data['administrator_privileges']              = '1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1';
								$roles_and_capabilities_data['author_privileges']                     = '0,0,0,0,0,1,1,0,0,1,1,0,0,0,0,0';
								$roles_and_capabilities_data['editor_privileges']                     = '0,0,0,0,0,1,1,1,0,1,1,0,0,0,0,0';
								$roles_and_capabilities_data['contributor_privileges']                = '0,0,0,0,0,0,1,0,0,0,1,0,0,0,0,0';
								$roles_and_capabilities_data['subscriber_privileges']                 = '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0';
								$roles_and_capabilities_data['show_coming_soon_booster_top_bar_menu'] = 'enable';
								$roles_and_capabilities_data['others_full_control_capability']        = '0';
								$roles_and_capabilities_data['other_privileges']                      = '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0';

								$user_capabilities        = get_others_capabilities_coming_soon_booster();
								$other_roles_array        = array();
								$other_roles_access_array = array(
									'manage_options',
									'edit_plugins',
									'edit_posts',
									'publish_posts',
									'publish_pages',
									'edit_pages',
									'read',
								);
								foreach ( $other_roles_access_array as $role ) {
									if ( in_array( $role, $user_capabilities, true ) ) {
										array_push( $other_roles_array, $role );
									}
								}
								$roles_and_capabilities_data['capabilities'] = $other_roles_array;

								$roles_and_capabilities_data_serialize               = array();
								$roles_and_capabilities_data_serialize['meta_id']    = $row->id;
								$roles_and_capabilities_data_serialize['meta_key']   = 'roles_and_capabilities_data';// WPCS: slow query ok.
								$roles_and_capabilities_data_serialize['meta_value'] = maybe_serialize( $roles_and_capabilities_data );// WPCS: slow query ok.
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $roles_and_capabilities_data_serialize );
								break;
						}
					}
				}
			}
		}

		if ( ! function_exists( 'coming_soon_booster_locations_table' ) ) {
			/**
			 * This Function is used to create ip locations table.
			 */
			function coming_soon_booster_locations_table() {
				global $wpdb;
				$collate = $wpdb->get_charset_collate();
				$sql     = 'CREATE TABLE IF NOT EXISTS ' . coming_soon_booster_ip_locations() . '
				(
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`ip` varchar(100) NOT NULL,
					`country_code` varchar(5),
					`country_name` varchar(100),
					`region_code` varchar(5),
					`region_name` varchar(100),
					`city` varchar(100),
					`latitude` varchar(100),
					`longitude` varchar(100),
					PRIMARY KEY (`id`)
				) ENGINE = MyISAM ' . $collate;
				dbDelta( $sql );
			}
		}
		$obj_dbhelper_coming_soon_booster = new DbHelper_Install_Script_Coming_Soon_Booster();
		switch ( $coming_soon_booster_versions_number ) {
			case '':
				$coming_soon_booster_admin_notices_array = array();
				$csb_start_date                          = date( 'm/d/Y' );
				$csb_start_date                          = strtotime( $csb_start_date );
				$csb_start_date                          = strtotime( '+7 day', $csb_start_date );
				$csb_start_date                          = date( 'm/d/Y', $csb_start_date );
				$coming_soon_booster_admin_notices_array['two_week_review'] = array( 'start' => $csb_start_date, 'int' => 7, 'dismissed' => 0 ); // @codingStandardsIgnoreLine.
				update_option( 'csb_admin_notice', $coming_soon_booster_admin_notices_array );

				coming_soon_booster_parent_table();
				coming_soon_booster_meta_table();
				coming_soon_booster_locations_table();
				$insert_custom_key = array();

				$insert_custom_key['type']      = 'custom_data';
				$insert_custom_key['parent_id'] = '0';
				$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster(), $insert_custom_key );
				break;

			default:
				global $wpdb;
				if ( $wpdb->query( "SHOW TABLES LIKE '" . $wpdb->prefix . 'coming_soon_booster_ip_locations' . "'" ) === 0 ) {
					coming_soon_booster_locations_table();// WPCS: db call ok, no-cache ok.
				}
				if ( $coming_soon_booster_versions_number < '2.0.1' ) {
					$wpdb->query( 'DROP TABLE IF EXISTS ' . $wpdb->prefix . 'coming_soon_booster' );// @codingStandardsIgnoreLine
					$wpdb->query( 'DROP TABLE IF EXISTS ' . $wpdb->prefix . 'coming_soon_booster_meta' );// @codingStandardsIgnoreLine
				}
				if ( $coming_soon_booster_versions_number < '3.1.1' ) {
					if ( $wpdb->query( "SHOW TABLES LIKE '" . $wpdb->prefix . 'coming_soon_booster' . "'" ) === 0 ) {// WPCS: db call ok, no-cache ok.
						coming_soon_booster_parent_table();// WPCS: db call ok, no-cache ok.
						$insert_custom_key = array();

						$insert_custom_key['type']      = 'custom_data';
						$insert_custom_key['parent_id'] = '0';
						$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster(), $insert_custom_key );
					}
					if ( $wpdb->query( "SHOW TABLES LIKE '" . $wpdb->prefix . 'coming_soon_booster_meta' . "'" ) === 0 ) {
						coming_soon_booster_meta_table();// WPCS: db call ok, no-cache ok.
					} else {
						$get_other_settings_meta_value              = $wpdb->get_var(
							$wpdb->prepare(
								'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s', 'other_settings_data'
							)
						);// WPCS: db call ok, cache ok.
						$get_other_settings_unserialized_meta_value = maybe_unserialize( $get_other_settings_meta_value );
						if ( ! isset( $get_other_settings_unserialized_meta_value['automatic_plugin_updates'] ) ) {
							$get_other_settings_unserialized_meta_value['automatic_plugin_updates'] = 'disable';
						}
						if ( ! isset( $get_other_settings_unserialized_meta_value['gdpr_coompliance'] ) ) {
							$get_other_settings_unserialized_meta_value['gdpr_compliance']      = 'enable';
							$get_other_settings_unserialized_meta_value['gdpr_compliance_text'] = 'By using this form you agree with the storage and handling of your data by this website';
						}
						$update_other_settings_data               = array();
						$where                                    = array();
						$where['meta_key']                        = 'other_settings_data';// WPCS: slow query ok.
						$update_other_settings_data['meta_value'] = maybe_serialize( $get_other_settings_unserialized_meta_value );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_other_settings_data, $where );// WPCS: slow query ok.

						$check_custom_type = $wpdb->get_results(
							$wpdb->prepare(
								'SELECT type FROM ' . $wpdb->prefix . 'coming_soon_booster WHERE type=%s', 'custom_data'
							)
						);// WPCS: db call ok, cache ok.
						$parent_table      = $wpdb->get_results(
							'SELECT * FROM ' . $wpdb->prefix . 'coming_soon_booster'
						);// WPCS: db call ok, cache ok.
						if ( count( $check_custom_type ) === 0 ) {

							if ( ! function_exists( 'coming_soon_booster_theme_meta_value' ) ) {
								/**
								 * This Function is used for getting hostname.
								 *
								 * @param string $meta_key passes parameter as meta key.
								 * @param string $theme_type passes parameter as theme type.
								 */
								function coming_soon_booster_theme_meta_value( $meta_key, $theme_type ) {
									global $wpdb;
									$get_theme_id                       = $wpdb->get_var(
										$wpdb->prepare(
											'SELECT id FROM ' . $wpdb->prefix . 'coming_soon_booster WHERE type=%s', $theme_type
										)
									);// WPCS: db call ok, cache ok.
									$get_coming_soon_booster_meta_value = $wpdb->get_var(
										$wpdb->prepare(
											'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta	WHERE meta_key = %s and meta_id = %d', $meta_key, $get_theme_id
										)
									);// WPCS: db call ok, cache ok.
									return maybe_unserialize( $get_coming_soon_booster_meta_value );
								}
							}
							if ( isset( $parent_table ) && count( $parent_table ) > 0 ) {
								foreach ( $parent_table as $parent ) {
									switch ( $parent->type ) {
										case 'theme_1':
											$background_settings_data_unserialize    = coming_soon_booster_theme_meta_value( 'background_settings_data', 'theme_1' );
											$loader_data_unserialize                 = coming_soon_booster_theme_meta_value( 'loader_settings_data', 'theme_1' );
											$logo_data_unserialize                   = coming_soon_booster_theme_meta_value( 'logo_settings_data', 'theme_1' );
											$layout_heading_data_unserialize         = coming_soon_booster_theme_meta_value( 'heading_settings_data', 'theme_1' );
											$layout_description_data_unserialize     = coming_soon_booster_theme_meta_value( 'description_settings_data', 'theme_1' );
											$layout_button_settings_data_unserialize = coming_soon_booster_theme_meta_value( 'layout_button_settings_data', 'theme_1' );
											$countdown_data_unserialize              = coming_soon_booster_theme_meta_value( 'countdown_settings_data', 'theme_1' );
											$custom_css_array                        = esc_html( $background_settings_data_unserialize['custom_css_background_settings'] );
											$custom_css_array                       .= esc_html( $countdown_data_unserialize['custom_css_countdown'] );
											$custom_css_array                       .= esc_html( $loader_data_unserialize['loader_custom_css_layout'] );
											$custom_css_array                       .= esc_html( $logo_data_unserialize['custom_css_logo_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_heading_data_unserialize['custom_css_heading_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_description_data_unserialize['custom_css_description_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_button_settings_data_unserialize['layout_button_custom_css'] );
											$insert_custom_css_data                  = array();
											$insert_custom_css_data['custom_css']    = $custom_css_array;

											$insert_custom_css_serialized_data               = array();
											$insert_custom_css_serialized_data['meta_id']    = $parent->id;
											$insert_custom_css_serialized_data['meta_key']   = 'custom_css_settings';// WPCS: slow query ok.
											$insert_custom_css_serialized_data['meta_value'] = maybe_serialize( $insert_custom_css_data );// WPCS: slow query ok.
											$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $insert_custom_css_serialized_data );
											break;

										case 'theme_2':
											$background_settings_data_unserialize    = coming_soon_booster_theme_meta_value( 'background_settings_data', 'theme_2' );
											$loader_data_unserialize                 = coming_soon_booster_theme_meta_value( 'loader_settings_data', 'theme_2' );
											$logo_data_unserialize                   = coming_soon_booster_theme_meta_value( 'logo_settings_data', 'theme_2' );
											$layout_heading_data_unserialize         = coming_soon_booster_theme_meta_value( 'heading_settings_data', 'theme_2' );
											$layout_description_data_unserialize     = coming_soon_booster_theme_meta_value( 'description_settings_data', 'theme_2' );
											$layout_button_settings_data_unserialize = coming_soon_booster_theme_meta_value( 'layout_button_settings_data', 'theme_2' );
											$countdown_data_unserialize              = coming_soon_booster_theme_meta_value( 'countdown_settings_data', 'theme_2' );
											$custom_css_array                        = esc_html( $background_settings_data_unserialize['custom_css_background_settings'] );
											$custom_css_array                       .= esc_html( $countdown_data_unserialize['custom_css_countdown'] );
											$custom_css_array                       .= esc_html( $loader_data_unserialize['loader_custom_css_layout'] );
											$custom_css_array                       .= esc_html( $logo_data_unserialize['custom_css_logo_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_heading_data_unserialize['custom_css_logo_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_description_data_unserialize['custom_css_description_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_button_settings_data_unserialize['layout_button_custom_css'] );
											$insert_custom_css_data                  = array();
											$insert_custom_css_data['custom_css']    = $custom_css_array;

											$insert_custom_css_serialized_data               = array();
											$insert_custom_css_serialized_data['meta_id']    = $parent->id;
											$insert_custom_css_serialized_data['meta_key']   = 'custom_css_settings';// WPCS: slow query ok.
											$insert_custom_css_serialized_data['meta_value'] = maybe_serialize( $insert_custom_css_data );// WPCS: slow query ok.
											$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $insert_custom_css_serialized_data );
											break;

										case 'theme_3':
											$background_settings_data_unserialize    = coming_soon_booster_theme_meta_value( 'background_settings_data', 'theme_3' );
											$loader_data_unserialize                 = coming_soon_booster_theme_meta_value( 'loader_settings_data', 'theme_3' );
											$logo_data_unserialize                   = coming_soon_booster_theme_meta_value( 'logo_settings_data', 'theme_3' );
											$layout_heading_data_unserialize         = coming_soon_booster_theme_meta_value( 'heading_settings_data', 'theme_3' );
											$layout_description_data_unserialize     = coming_soon_booster_theme_meta_value( 'description_settings_data', 'theme_3' );
											$layout_button_settings_data_unserialize = coming_soon_booster_theme_meta_value( 'layout_button_settings_data', 'theme_3' );
											$countdown_data_unserialize              = coming_soon_booster_theme_meta_value( 'countdown_settings_data', 'theme_3' );
											$custom_css_array                        = esc_html( $background_settings_data_unserialize['custom_css_background_settings'] );
											$custom_css_array                       .= esc_html( $countdown_data_unserialize['custom_css_countdown'] );
											$custom_css_array                       .= esc_html( $loader_data_unserialize['loader_custom_css_layout'] );
											$custom_css_array                       .= esc_html( $logo_data_unserialize['custom_css_logo_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_heading_data_unserialize['custom_css_logo_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_description_data_unserialize['custom_css_description_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_button_settings_data_unserialize['layout_button_custom_css'] );
											$insert_custom_css_data                  = array();
											$insert_custom_css_data['custom_css']    = $custom_css_array;

											$insert_custom_css_serialized_data               = array();
											$insert_custom_css_serialized_data['meta_id']    = $parent->id;
											$insert_custom_css_serialized_data['meta_key']   = 'custom_css_settings';// WPCS: slow query ok.
											$insert_custom_css_serialized_data['meta_value'] = maybe_serialize( $insert_custom_css_data );// WPCS: slow query ok.
											$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $insert_custom_css_serialized_data );
											break;

										case 'theme_4':
											$background_settings_data_unserialize    = coming_soon_booster_theme_meta_value( 'background_settings_data', 'theme_4' );
											$loader_data_unserialize                 = coming_soon_booster_theme_meta_value( 'loader_settings_data', 'theme_4' );
											$logo_data_unserialize                   = coming_soon_booster_theme_meta_value( 'logo_settings_data', 'theme_4' );
											$layout_heading_data_unserialize         = coming_soon_booster_theme_meta_value( 'heading_settings_data', 'theme_4' );
											$layout_description_data_unserialize     = coming_soon_booster_theme_meta_value( 'description_settings_data', 'theme_4' );
											$layout_button_settings_data_unserialize = coming_soon_booster_theme_meta_value( 'layout_button_settings_data', 'theme_4' );
											$countdown_data_unserialize              = coming_soon_booster_theme_meta_value( 'countdown_settings_data', 'theme_4' );
											$custom_css_array                        = esc_html( $background_settings_data_unserialize['custom_css_background_settings'] );
											$custom_css_array                       .= esc_html( $countdown_data_unserialize['custom_css_countdown'] );
											$custom_css_array                       .= esc_html( $loader_data_unserialize['loader_custom_css_layout'] );
											$custom_css_array                       .= esc_html( $logo_data_unserialize['custom_css_logo_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_heading_data_unserialize['custom_css_logo_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_description_data_unserialize['custom_css_description_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_button_settings_data_unserialize['layout_button_custom_css'] );
											$insert_custom_css_data                  = array();
											$insert_custom_css_data['custom_css']    = $custom_css_array;

											$insert_custom_css_serialized_data               = array();
											$insert_custom_css_serialized_data['meta_id']    = $parent->id;
											$insert_custom_css_serialized_data['meta_key']   = 'custom_css_settings';// WPCS: slow query ok.
											$insert_custom_css_serialized_data['meta_value'] = maybe_serialize( $insert_custom_css_data );// WPCS: slow query ok.
											$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $insert_custom_css_serialized_data );
											break;

										case 'theme_5':
											$background_settings_data_unserialize    = coming_soon_booster_theme_meta_value( 'background_settings_data', 'theme_5' );
											$loader_data_unserialize                 = coming_soon_booster_theme_meta_value( 'loader_settings_data', 'theme_5' );
											$logo_data_unserialize                   = coming_soon_booster_theme_meta_value( 'logo_settings_data', 'theme_5' );
											$layout_heading_data_unserialize         = coming_soon_booster_theme_meta_value( 'heading_settings_data', 'theme_5' );
											$layout_description_data_unserialize     = coming_soon_booster_theme_meta_value( 'description_settings_data', 'theme_5' );
											$layout_button_settings_data_unserialize = coming_soon_booster_theme_meta_value( 'layout_button_settings_data', 'theme_5' );
											$countdown_data_unserialize              = coming_soon_booster_theme_meta_value( 'countdown_settings_data', 'theme_5' );
											$custom_css_array                        = esc_html( $background_settings_data_unserialize['custom_css_background_settings'] );
											$custom_css_array                       .= esc_html( $countdown_data_unserialize['custom_css_countdown'] );
											$custom_css_array                       .= esc_html( $loader_data_unserialize['loader_custom_css_layout'] );
											$custom_css_array                       .= esc_html( $logo_data_unserialize['custom_css_logo_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_heading_data_unserialize['custom_css_logo_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_description_data_unserialize['custom_css_description_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_button_settings_data_unserialize['layout_button_custom_css'] );
											$insert_custom_css_data                  = array();
											$insert_custom_css_data['custom_css']    = $custom_css_array;

											$insert_custom_css_serialized_data               = array();
											$insert_custom_css_serialized_data['meta_id']    = $parent->id;
											$insert_custom_css_serialized_data['meta_key']   = 'custom_css_settings';// WPCS: slow query ok.
											$insert_custom_css_serialized_data['meta_value'] = maybe_serialize( $insert_custom_css_data );// WPCS: slow query ok.
											$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $insert_custom_css_serialized_data );
											break;

										case 'theme_6':
											$background_settings_data_unserialize    = coming_soon_booster_theme_meta_value( 'background_settings_data', 'theme_6' );
											$loader_data_unserialize                 = coming_soon_booster_theme_meta_value( 'loader_settings_data', 'theme_6' );
											$logo_data_unserialize                   = coming_soon_booster_theme_meta_value( 'logo_settings_data', 'theme_6' );
											$layout_heading_data_unserialize         = coming_soon_booster_theme_meta_value( 'heading_settings_data', 'theme_6' );
											$layout_description_data_unserialize     = coming_soon_booster_theme_meta_value( 'description_settings_data', 'theme_6' );
											$layout_button_settings_data_unserialize = coming_soon_booster_theme_meta_value( 'layout_button_settings_data', 'theme_6' );
											$countdown_data_unserialize              = coming_soon_booster_theme_meta_value( 'countdown_settings_data', 'theme_6' );
											$custom_css_array                        = esc_html( $background_settings_data_unserialize['custom_css_background_settings'] );
											$custom_css_array                       .= esc_html( $countdown_data_unserialize['custom_css_countdown'] );
											$custom_css_array                       .= esc_html( $loader_data_unserialize['loader_custom_css_layout'] );
											$custom_css_array                       .= esc_html( $logo_data_unserialize['custom_css_logo_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_heading_data_unserialize['custom_css_logo_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_description_data_unserialize['custom_css_description_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_button_settings_data_unserialize['layout_button_custom_css'] );
											$insert_custom_css_data                  = array();
											$insert_custom_css_data['custom_css']    = $custom_css_array;

											$insert_custom_css_serialized_data               = array();
											$insert_custom_css_serialized_data['meta_id']    = $parent->id;
											$insert_custom_css_serialized_data['meta_key']   = 'custom_css_settings';// WPCS: slow query ok.
											$insert_custom_css_serialized_data['meta_value'] = maybe_serialize( $insert_custom_css_data );// WPCS: slow query ok.
											$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $insert_custom_css_serialized_data );
											break;

										case 'theme_7':
											$background_settings_data_unserialize    = coming_soon_booster_theme_meta_value( 'background_settings_data', 'theme_7' );
											$loader_data_unserialize                 = coming_soon_booster_theme_meta_value( 'loader_settings_data', 'theme_7' );
											$logo_data_unserialize                   = coming_soon_booster_theme_meta_value( 'logo_settings_data', 'theme_7' );
											$layout_heading_data_unserialize         = coming_soon_booster_theme_meta_value( 'heading_settings_data', 'theme_7' );
											$layout_description_data_unserialize     = coming_soon_booster_theme_meta_value( 'description_settings_data', 'theme_7' );
											$layout_button_settings_data_unserialize = coming_soon_booster_theme_meta_value( 'layout_button_settings_data', 'theme_7' );
											$countdown_data_unserialize              = coming_soon_booster_theme_meta_value( 'countdown_settings_data', 'theme_7' );
											$custom_css_array                        = esc_html( $background_settings_data_unserialize['custom_css_background_settings'] );
											$custom_css_array                       .= esc_html( $countdown_data_unserialize['custom_css_countdown'] );
											$custom_css_array                       .= esc_html( $loader_data_unserialize['loader_custom_css_layout'] );
											$custom_css_array                       .= esc_html( $logo_data_unserialize['custom_css_logo_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_heading_data_unserialize['custom_css_logo_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_description_data_unserialize['custom_css_description_settings_layout'] );
											$custom_css_array                       .= esc_html( $layout_button_settings_data_unserialize['layout_button_custom_css'] );
											$insert_custom_css_data                  = array();
											$insert_custom_css_data['custom_css']    = $custom_css_array;

											$insert_custom_css_serialized_data               = array();
											$insert_custom_css_serialized_data['meta_id']    = $parent->id;
											$insert_custom_css_serialized_data['meta_key']   = 'custom_css_settings';// WPCS: slow query ok.
											$insert_custom_css_serialized_data['meta_value'] = maybe_serialize( $insert_custom_css_data );// WPCS: slow query ok.
											$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster_meta(), $insert_custom_css_serialized_data );
											break;
									}
								}
								$insert_custom_key              = array();
								$insert_custom_key['type']      = 'custom_data';
								$insert_custom_key['parent_id'] = '0';
								$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster(), $insert_custom_key );
							}
						}
						if ( ! function_exists( 'coming_soon_booster_button_visibility' ) ) {
							/**
							 * This Function is used for button visibility.
							 *
							 * @param string $id .
							 */
							function coming_soon_booster_button_visibility( $id ) {
								global $wpdb;
								$obj_dbhelper_coming_soon_booster                 = new DbHelper_Install_Script_Coming_Soon_Booster();
								$get_coming_soon_booster_layout_button_meta_value = $wpdb->get_var(
									$wpdb->prepare(
										'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s and meta_id=%d', 'layout_button_settings_data', $id
									)
								);// WPCS: db call ok, cache ok.
								$layout_button_settings_data                      = maybe_unserialize( $get_coming_soon_booster_layout_button_meta_value );
								if ( ! array_key_exists( 'layout_subscriber_button_visibility', $layout_button_settings_data ) ) {
									$layout_button_settings_data['layout_subscriber_button_visibility'] = 'show';
									$layout_button_settings_data['layout_contact_button_visibility']    = 'show';
									$layout_button_settings_data_serialize                              = array();
									$where             = array();
									$where['meta_key'] = 'layout_button_settings_data';// WPCS: slow query ok.
									$where['meta_id']  = $id;
									$layout_button_settings_data_serialize['meta_value'] = maybe_serialize( $layout_button_settings_data );// WPCS: slow query ok.
									$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $layout_button_settings_data_serialize, $where );
								}
							}
						}
						if ( isset( $parent_table ) && count( $parent_table ) > 0 ) {
							foreach ( $parent_table as $parent ) {
								switch ( $parent->type ) {
									case 'theme_1':
										coming_soon_booster_button_visibility( $parent->id );
										break;
									case 'theme_2':
										coming_soon_booster_button_visibility( $parent->id );
										break;
									case 'theme_3':
										coming_soon_booster_button_visibility( $parent->id );
										break;
									case 'theme_4':
										coming_soon_booster_button_visibility( $parent->id );
										break;
									case 'theme_5':
										coming_soon_booster_button_visibility( $parent->id );
										break;
									case 'theme_6':
										coming_soon_booster_button_visibility( $parent->id );
										break;
									case 'theme_7':
										coming_soon_booster_button_visibility( $parent->id );
										break;
								}
							}
						}
					}
				}
				$get_collate_status_data = $wpdb->query(
					$wpdb->prepare(
						'SELECT type FROM ' . $wpdb->prefix . 'coming_soon_booster WHERE type=%s', 'collation_type'
					)
				);// db call ok; no-cache ok.
				if ( 0 === $get_collate_status_data ) {
					$charset_collate = '';
					if ( ! empty( $wpdb->charset ) ) {
						$charset_collate .= 'CONVERT TO CHARACTER SET ' . $wpdb->charset;
					}
					if ( ! empty( $wpdb->collate ) ) {
						$charset_collate .= ' COLLATE ' . $wpdb->collate;
					}
					if ( ! empty( $charset_collate ) ) {
						$change_collate_main_table = $wpdb->query(
							'ALTER TABLE ' . $wpdb->prefix . 'coming_soon_booster ' . $charset_collate // @codingStandardsIgnoreLine.
						);// WPCS: db call ok, no-cache ok.
						$change_collate_meta_table = $wpdb->query(
							'ALTER TABLE ' . $wpdb->prefix . 'coming_soon_booster_meta ' . $charset_collate // @codingStandardsIgnoreLine.
						);// WPCS: db call ok, no-cache ok.

						$collation_data_array              = array();
						$collation_data_array['type']      = 'collation_type';
						$collation_data_array['parent_id'] = '0';
						$obj_dbhelper_coming_soon_booster->insert_command( coming_soon_booster(), $collation_data_array );
					}
				}
				break;
		}
		update_option( 'coming_soon_booster_versions_number', '3.0.4' );
	}
}
