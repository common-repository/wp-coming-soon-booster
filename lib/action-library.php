<?php
/**
 * This file is used to update data.
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
	$access_granted = false;
	if ( isset( $user_role_permission ) && count( $user_role_permission ) > 0 ) {
		foreach ( $user_role_permission as $permission ) {
			if ( current_user_can( $permission ) ) {
				$access_granted = true;
				break;
			}
		}
	}
	if ( ! $access_granted ) {
		return;
	} else {
		/**
		 * This function is used to get meta value.
		 *
		 * @param string $meta_key passes parameter as meta_key.
		 */
		function get_coming_soon_booster_meta_value( $meta_key ) {
			global $wpdb;
			$get_coming_soon_booster_meta_value = $wpdb->get_var(
				$wpdb->prepare(
					'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s', $meta_key
				)
			);// WPCS: db call ok; no-cache ok.
			return maybe_unserialize( $get_coming_soon_booster_meta_value );
		}
		if ( ! function_exists( 'get_coming_soon_booster_details_date' ) ) {
			/**
			 * This function is used to get details.
			 *
			 * @param string $meta_key passes parameter as meta_key.
			 * @param string $date1 passes parameter as date1.
			 * @param string $date2 passes parameter as date2.
			 */
			function get_coming_soon_booster_details_date( $meta_key, $date1, $date2 ) {
				global $wpdb;
				$coming_soon_manage  = $wpdb->get_results(
					$wpdb->prepare(
						'SELECT * FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s', $meta_key
					)
				);// WPCS: db call ok, cache ok.
				$coming_soon_details = array();
				if ( count( $coming_soon_manage ) > 0 ) {
					foreach ( $coming_soon_manage as $raw_row ) {
						$row            = maybe_unserialize( $raw_row->meta_value );
						$row['meta_id'] = $raw_row->meta_id;
						if ( $row['date_time'] >= $date1 && $row['date_time'] <= $date2 ) {
							array_push( $coming_soon_details, $row );
						}
					}
				}
				return $coming_soon_details;
			}
		}

		if ( ! function_exists( 'get_coming_soon_booster_unserialize_data' ) ) {
			/**
			 * This function is used to get data.
			 *
			 * @param string $manage_data passes parameter as manage_data.
			 */
			function get_coming_soon_booster_unserialize_data( $manage_data ) {
				$unserialize_complete_data = array();

				if ( count( $manage_data ) > 0 ) {
					foreach ( $manage_data as $value ) {
						$unserialize_data = maybe_unserialize( $value->meta_value );

						$unserialize_data['meta_id'] = $value->meta_id;
						array_push( $unserialize_complete_data, $unserialize_data );
					}
				}
				return $unserialize_complete_data;
			}
		}
		if ( ! function_exists( 'coming_soon_booster_meta_value' ) ) {
			/**
			 * This function is used to get data.
			 */
			function coming_soon_booster_meta_value() {
				global $wpdb;
				$meta_value = $wpdb->get_var(
					$wpdb->prepare(
						'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s', 'theme'
					)
				);// WPCS: db call ok, cache ok.
				$meta_type  = maybe_unserialize( $meta_value );
				$theme_type = $meta_type['theme_type'];
				return $theme_type;
			}
		}
		if ( ! function_exists( 'coming_soon_booster_theme_id' ) ) {
			/**
			 * This function is used to get id.
			 */
			function coming_soon_booster_theme_id() {
				global $wpdb;
				$theme_type   = coming_soon_booster_meta_value();
				$get_theme_id = $wpdb->get_var(
					$wpdb->prepare(
						'SELECT id FROM ' . $wpdb->prefix . 'coming_soon_booster WHERE type=%s', $theme_type
					)
				);// WPCS: db call ok, cache ok.
				return $get_theme_id;
			}
		}
		if ( ! function_exists( 'get_settings_id_coming_soon_booster' ) ) {
			/**
			 * This function is used to get settings id.
			 *
			 * @param string $meta_key passes parameter as meta_key.
			 */
			function get_settings_id_coming_soon_booster( $meta_key ) {
				global $wpdb;
				$get_theme_id = coming_soon_booster_theme_id();
				$get_id       = $wpdb->get_var(
					$wpdb->prepare(
						'SELECT id FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_id = %d and meta_key = %s', $get_theme_id, $meta_key
					)
				);// WPCS: db call ok, cache ok.
				return $get_id;
			}
		}
		if ( isset( $_REQUEST['param'] ) ) {// WPCS: input var ok.
			$obj_dbhelper_coming_soon_booster = new DbHelper_Coming_Soon_Booster();
			switch ( sanitize_text_field( wp_unslash( $_REQUEST['param'] ) ) ) {// WPCS: CSRF ok, input var ok.
				case 'wizard_coming_soon_booster':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_check_status' ) ) {// WPCS: input var ok.
						$plugin_info_coming_soon_booster = new Plugin_Info_Coming_Soon_Booster();

						global $wp_version;

						$url              = TECH_BANKER_STATS_URL . '/wp-admin/admin-ajax.php';
						$type             = isset( $_REQUEST['type'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['type'] ) ) : '';// WPCS: input var ok.
						$user_admin_email = isset( $_REQUEST['id'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['id'] ) ) : '';// WPCS: input var ok.
						if ( '' === $user_admin_email ) {
							$user_admin_email = get_option( 'admin_email' );
						}
						update_option( 'coming-soon-booster-admin_email', $user_admin_email );

						update_option( 'coming-soon-booster-welcome-page', $type );
						if ( 'opt_in' === $type ) {
							$theme_details = array();
							if ( $wp_version >= 3.4 ) {
								$active_theme                   = wp_get_theme();
								$theme_details['theme_name']    = strip_tags( $active_theme->name );
								$theme_details['theme_version'] = strip_tags( $active_theme->version );
								$theme_details['author_url']    = strip_tags( $active_theme->{'Author URI'} );
							}

							$plugin_stat_data                   = array();
							$plugin_stat_data['plugin_slug']    = 'wp-coming-soon-booster';
							$plugin_stat_data['type']           = 'standard_edition';
							$plugin_stat_data['version_number'] = COMING_SOON_BOOSTER_VERSION_NUMBER;
							$plugin_stat_data['status']         = $type;
							$plugin_stat_data['event']          = 'activate';
							$plugin_stat_data['domain_url']     = site_url();
							$plugin_stat_data['wp_language']    = defined( 'WPLANG' ) && WPLANG ? WPLANG : get_locale();

							$plugin_stat_data['email']            = $user_admin_email;
							$plugin_stat_data['wp_version']       = $wp_version;
							$plugin_stat_data['php_version']      = esc_html( phpversion() );
							$plugin_stat_data['mysql_version']    = $wpdb->db_version();
							$plugin_stat_data['max_input_vars']   = ini_get( 'max_input_vars' );
							$plugin_stat_data['operating_system'] = PHP_OS . '  (' . PHP_INT_SIZE * 8 . ') BIT';
							$plugin_stat_data['php_memory_limit'] = ini_get( 'memory_limit' ) ? ini_get( 'memory_limit' ) : 'N/A';
							$plugin_stat_data['extensions']       = get_loaded_extensions();
							$plugin_stat_data['plugins']          = $plugin_info_coming_soon_booster->get_plugin_info_coming_soon_booster();
							$plugin_stat_data['themes']           = $theme_details;

							$response = wp_safe_remote_post(
								$url, array(
									'method'      => 'POST',
									'timeout'     => 45,
									'redirection' => 5,
									'httpversion' => '1.0',
									'blocking'    => true,
									'headers'     => array(),
									'body'        => array(
										'data'    => maybe_serialize( $plugin_stat_data ),
										'site_id' => false !== get_option( 'csb_tech_banker_site_id' ) ? get_option( 'csb_tech_banker_site_id' ) : '',
										'action'  => 'plugin_analysis_data',
									),
								)
							);

							if ( ! is_wp_error( $response ) ) {
								false !== $response['body'] ? update_option( 'csb_tech_banker_site_id', $response['body'] ) : '';
							}
						}
					}
					break;

				case 'coming_soon_booster_plugin_mode':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_plugin_mode' ) ) {// WPCS: input var ok.
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
						$update_plugin_mode                 = array();
						$where                              = array();
						$update_plugin_mode['default_mode'] = sanitize_text_field( $form_data['ux_ddl_plugin_mode'] );

						$plugin_mode_settings_data_serialize               = array();
						$where['meta_key']                                 = 'plugin_mode_setting_data';// WPCS: slow query ok.
						$plugin_mode_settings_data_serialize['meta_value'] = maybe_serialize( $update_plugin_mode );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $plugin_mode_settings_data_serialize, $where );
					}
					break;
				case 'coming_soon_booster_background_settings_module':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_background_settings' ) ) {// WPCS: input var ok.
							parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( $_REQUEST['data'] ) ) : '', $form_data );// WPCS: input var ok, sanitization ok.
							$update_background_settings = array();
							$where                      = array();

							$update_background_settings['selected_save_slideshow']        = null;
							$update_background_settings['background_upload_img_thumb']    = '';
							$update_background_settings['background_upload_img_url']      = null;
							$update_background_settings['selected_background_upload_img'] = 'coming-soon-image-2.jpg';
							$update_background_settings['bg_image']                       = '';
							$update_background_settings['background_type']                = 'color';
							$update_background_settings['background_color']               = '#d61c38';
							$update_background_settings['animation']                      = sanitize_text_field( $form_data['ux_ddl_animation'] );
							$update_background_settings['animation_type_background']      = sanitize_text_field( $form_data['ux_ddl_animation_type'] );
							$update_background_settings['choose_background']              = '2';
							$update_background_settings['image_position_background']      = 'no-repeat,center,center';
							$update_background_settings['animation_image']                = 'enable';
							$update_background_settings['animation_type_image']           = 'winter';
							$update_background_settings['video_url']                      = 'http://youtu.be/Scxs7L0vhZ4';
							$update_background_settings['video_sound']                    = '0';
							$update_background_settings['player_controls']                = 'show';
							$update_background_settings['player_control_color']           = '#d61c38';
							$update_background_settings['player_control_hover_color']     = '#282931';
							$update_background_settings['duration']                       = '2';
							$update_background_settings['slideshow_effect']               = 'zoomOut';
							$update_background_settings['animation_slideshow']            = 'enable';
							$update_background_settings['animation_type_slideshow']       = 'bubbles';
							$update_background_settings['choose_slideshow']               = null;
							$update_background_settings['select_slideshow']               = array( 1, 2, 3 );
							$update_background_settings['selected_slideshow_ids']         = null;
							$update_background_settings['slideshow_images']               = null;
							$update_background_settings['overlay']                        = sanitize_text_field( $form_data['ux_ddl_overlay'] );
							$update_background_settings['overlay_color']                  = '#282931';
							$update_background_settings['overlay_color_opacity']          = '100';
							$update_background_settings['local_video_url']                = '';

							$get_id                               = get_settings_id_coming_soon_booster( 'background_settings_data' );
							$update_background_settings_serialize = array();
							$where['id']                          = $get_id;
							$update_background_settings_serialize['meta_value'] = maybe_serialize( $update_background_settings );// WPCS: slow query ok.
							$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_background_settings_serialize, $where );
					}
					break;

				case 'coming_soon_booster_loader_settings_module':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_loader_settings' ) ) {// WPCS: input var ok.
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
						$update_loader_settings = array();
						$where                  = array();

						$update_loader_settings['loader_color']            = '#d61c38';
						$update_loader_settings['loader_background_color'] = '#282931';
						$update_loader_settings['loader_text']             = sanitize_text_field( $form_data['ux_ddl_loader_text'] );
						$update_loader_settings['loader_text_title']       = sanitize_text_field( $form_data['ux_txt_loader_text_title'] );
						$update_loader_settings['loader_text_font_color']  = '#ffffff';
						$update_loader_settings['loader_text_font_size']   = '12px';
						$update_loader_settings['loader_text_font_family'] = 'Poppins';

						$update_loader_value_serialize               = array();
						$get_id                                      = get_settings_id_coming_soon_booster( 'loader_settings_data' );
						$where['id']                                 = $get_id;
						$update_loader_value_serialize['meta_value'] = maybe_serialize( $update_loader_settings );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_loader_value_serialize, $where );
					}
					break;

				case 'coming_soon_booster_logo_settings_module':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? ( $_REQUEST['_wp_nonce'] ) : '', 'coming_soon_booster_logo_settings' ) ) {// WPCS: input var ok.
							parse_str( isset( $_REQUEST['data'] ) ? base64_decode( $_REQUEST['data'] ) : '', $form_data );// WPCS: input var ok, sanitization ok.
							$update_logo_settings = array();
							$where                = array();

							$update_logo_settings['logo']                  = sanitize_text_field( $form_data['ux_ddl_font_logo'] );
							$update_logo_settings['logo_type']             = sanitize_text_field( $form_data['ux_rdl_font_logo_type'] );
							$update_logo_settings['text_logo_link_path']   = sanitize_text_field( $form_data['ux_txt_text_logo_link'] );
							$update_logo_settings['margin_layout']         = '20,10,0,35';
							$update_logo_settings['padding_layout']        = '15,10,0,35';
							$update_logo_settings['font_color_layout']     = '#ffffff';
							$update_logo_settings['font_family_layout']    = 'Poppins';
							$update_logo_settings['font_style_layout']     = '40px';
							$update_logo_settings['logo_image']            = sanitize_text_field( $form_data['ux_txt_logo_text'] );
							$update_logo_settings['logo_link']             = sanitize_text_field( $form_data['ux_ddl_logo_link'] );
							$update_logo_settings['logo_link_text']        = sanitize_text_field( $form_data['ux_txt_logo_link'] );
							$update_logo_settings['img_logo_link_target']  = sanitize_text_field( $form_data['ux_ddl_img_logo_link_target'] );
							$update_logo_settings['text_logo_link_target'] = sanitize_text_field( $form_data['ux_ddl_text_logo_link_target'] );
							$update_logo_settings['logo_size']             = sanitize_text_field( $form_data['ux_ddl_logo_size'] );
							$update_logo_settings['max_width']             = sanitize_text_field( $form_data['ux_txt_width'] );
							$update_logo_settings['max_height']            = sanitize_text_field( $form_data['ux_txt_height'] );

							$update_logo_value_serialize               = array();
							$get_id                                    = get_settings_id_coming_soon_booster( 'logo_settings_data' );
							$where['id']                               = $get_id;
							$update_logo_value_serialize['meta_value'] = maybe_serialize( $update_logo_settings );// WPCS: slow query ok.
							$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_logo_value_serialize, $where );
					}
					break;

				case 'coming_soon_booster_seo_settings_module':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_seo_settings' ) ) {
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS input var ok.
						$update_seo_settings = array();
						$where               = array();

						$update_seo_settings['seo_title']         = sanitize_text_field( $form_data['ux_txt_seo_title'] );
						$update_seo_settings['meta_description']  = esc_html( $form_data['ux_txtarea_meta_description'] );
						$update_seo_settings['meta_keyword']      = esc_html( $form_data['ux_txtarea_meta_keywords'] );
						$update_seo_settings['meta_robot_follow'] = 'follow';
						$update_seo_settings['canonical_url']     = site_url();
						$update_seo_settings['tracking_code']     = '';

						$update_seo_value_serialize               = array();
						$where['meta_key']                        = 'seo_settings_data';// WPCS: slow query ok.
						$update_seo_value_serialize['meta_value'] = maybe_serialize( $update_seo_settings );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_seo_value_serialize, $where );
					}
					break;

				case 'coming_soon_booster_heading_settings_module':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_heading_settings' ) ) {// WPCS: input var ok.
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
						$update_heading_settings = array();
						$where                   = array();

						$update_heading_settings['heading_settings']    = sanitize_text_field( $form_data['ux_ddl_heading_settings'] );
						$update_heading_settings['heading_text']        = esc_html( $form_data['ux_txtarea_heading_content'] );
						$update_heading_settings['font_style_heading']  = '34px,#d61c38';
						$update_heading_settings['font_family_heading'] = 'Poppins';
						$update_heading_settings['margin_heading']      = '15,0,0,0';
						$update_heading_settings['padding_heading']     = '15,0,0,0';

						$update_heading_value_serialize               = array();
						$get_id                                       = get_settings_id_coming_soon_booster( 'heading_settings_data' );
						$where['id']                                  = $get_id;
						$update_heading_value_serialize['meta_value'] = maybe_serialize( $update_heading_settings );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_heading_value_serialize, $where );
					}
					break;

				case 'coming_soon_booster_description_settings_module':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_description_settings' ) ) {
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
						$update_description_settings = array();
						$where                       = array();

						$update_description_settings['description_settings']    = sanitize_text_field( $form_data['ux_ddl_description_settings'] );
						$update_description_settings['description_text']        = esc_html( $form_data['ux_txtarea_description_content'] );
						$update_description_settings['font_style_description']  = '18px,#ffffff';
						$update_description_settings['font_family_description'] = 'Poppins:300';
						$update_description_settings['margin_description']      = '10,0,15,0';
						$update_description_settings['padding_description']     = '10,0,10,0';

						$update_description_value_serialize = array();
						$get_id                             = get_settings_id_coming_soon_booster( 'description_settings_data' );
						$where['id']                        = $get_id;
						$update_description_value_serialize['meta_value'] = maybe_serialize( $update_description_settings );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_description_value_serialize, $where );
					}
					break;

				case 'coming_soon_booster_layout_button_settings_module':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_layout_button_settings' ) ) {
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
						$update_layout_button_settings = array();
						$where                         = array();

						$update_layout_button_settings['layout_subscriber_button_label']       = sanitize_text_field( $form_data['ux_ddl_layout_button_type'] );
						$update_layout_button_settings['layout_subscriber_button_name']        = sanitize_text_field( $form_data['ux_txt_sub_button_label'] );
						$update_layout_button_settings['layout_subscriber_button_visibility']  = 'show';
						$update_layout_button_settings['layout_subscriber_button_color']       = '#d61c38';
						$update_layout_button_settings['layout_subscriber_hover_color']        = '#ffffff';
						$update_layout_button_settings['layout_subscriber_text_hover_color']   = '#d61c38';
						$update_layout_button_settings['layout_subscriber_border_color']       = '#d61c38';
						$update_layout_button_settings['layout_subscriber_border_hover_color'] = '#ffffff';
						$update_layout_button_settings['layout_subscriber_font_style_button']  = '18px,#ffffff';
						$update_layout_button_settings['layout_subscriber_font_family_button'] = 'Poppins';
						$update_layout_button_settings['layout_subscriber_label_alignment']    = 'center';
						$update_layout_button_settings['layout_subscriber_margin_button']      = '10,10,0,0';
						$update_layout_button_settings['layout_subscriber_padding_button']     = '12,30,11,30';

						$update_layout_button_settings['layout_contact_button_label']       = sanitize_text_field( $form_data['ux_ddl_layout_button_type'] );
						$update_layout_button_settings['layout_contact_button_name']        = sanitize_text_field( $form_data['ux_txt_contact_button_label'] );
						$update_layout_button_settings['layout_contact_button_visibility']  = 'show';
						$update_layout_button_settings['layout_contact_button_color']       = '#ffffff';
						$update_layout_button_settings['layout_contact_hover_color']        = '#d61c38';
						$update_layout_button_settings['layout_contact_text_hover_color']   = '#ffffff';
						$update_layout_button_settings['layout_contact_border_color']       = '#ffffff';
						$update_layout_button_settings['layout_contact_border_hover_color'] = '#d61c38';
						$update_layout_button_settings['layout_contact_font_style_button']  = '18px,#d61c38';
						$update_layout_button_settings['layout_contact_font_family_button'] = 'Poppins';
						$update_layout_button_settings['layout_contact_label_alignment']    = 'center';
						$update_layout_button_settings['layout_contact_margin_button']      = '10,10,0,0';
						$update_layout_button_settings['layout_contact_padding_button']     = '12,40,12,40';

						$update_layout_button_settings_values_serialize = array();
						$get_id      = get_settings_id_coming_soon_booster( 'layout_button_settings_data' );
						$where['id'] = $get_id;
						$update_layout_button_settings_values_serialize['meta_value'] = maybe_serialize( $update_layout_button_settings );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_layout_button_settings_values_serialize, $where );
					}
					break;

				case 'coming_soon_booster_countdown_module':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_countdown' ) ) {// WPCS: input var ok.
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
						$update_countdown = array();
						$where            = array();

						$update_countdown['countdown_timer']       = sanitize_text_field( $form_data['ux_ddl_countdown_timer'] );
						$update_countdown['launch_date']           = sanitize_text_field( $form_data['ux_txt_start_date'] );
						$update_countdown['launch_time']           = sanitize_text_field( implode( ',', $form_data['ux_ddl_hr_min_sec'] ) );
						$update_countdown['time_zone']             = '';
						$update_countdown['countdown_text']        = esc_html( $form_data['ux_txt_countdown_text'] );
						$update_countdown['font_style_countdown']  = '30px, #ffffff';
						$update_countdown['font_family_countdown'] = 'Poppins';
						$update_countdown['margin_countdown']      = '0,0,15,0';
						$update_countdown['padding_countdown']     = '0,0,15,0';

						$get_id                                   = get_settings_id_coming_soon_booster( 'countdown_settings_data' );
						$update_countdown_serialize               = array();
						$where['id']                              = $get_id;
						$update_countdown_serialize['meta_value'] = maybe_serialize( $update_countdown );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_countdown_serialize, $where );
					}
					break;

				case 'coming_soon_booster_contact_heading_settings_module':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_contact_heading_settings' ) ) {// WPCS: input var ok.
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
						$update_contact_heading_data = array();
						$where                       = array();

						$update_contact_heading_data['contact_heading_settings']    = sanitize_text_field( $form_data['ux_ddl_contact_heading_settings'] );
						$update_contact_heading_data['contact_heading_text']        = esc_html( $form_data['ux_txtarea_contact_heading_content'] );
						$update_contact_heading_data['contact_font_style_heading']  = '25px,#d61c38';
						$update_contact_heading_data['contact_font_family_heading'] = 'Poppins';
						$update_contact_heading_data['contact_margin_heading']      = '0,0,0,0';
						$update_contact_heading_data['contact_padding_heading']     = '0,0,0,0';

						$update_contact_heading_data_serialize               = array();
						$where['meta_key']                                   = 'contact_form_heading_data';// WPCS: slow query ok.
						$update_contact_heading_data_serialize['meta_value'] = maybe_serialize( $update_contact_heading_data );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_contact_heading_data_serialize, $where );
					}
					break;

				case 'coming_soon_booster_contact_description_settings_module':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_contact_description_settings' ) ) {// WPCS: input var ok.
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
						$update_contact_description_settings = array();
						$where                               = array();

						$update_contact_description_settings['contact_description_settings']    = sanitize_text_field( $form_data['ux_ddl_contact_description_settings'] );
						$update_contact_description_settings['contact_description_text']        = esc_html( $form_data['ux_txtarea_contact_description_content'] );
						$update_contact_description_settings['contact_font_style_description']  = '18px,#ffffff';
						$update_contact_description_settings['contact_font_family_description'] = 'Poppins:300';
						$update_contact_description_settings['contact_margin_description']      = '10,0,20,0';
						$update_contact_description_settings['contact_padding_description']     = '10,0,10,0';

						$update_contact_description_value_serialize               = array();
						$where['meta_key']                                        = 'contact_form_description_data';// WPCS: slow query ok.
						$update_contact_description_value_serialize['meta_value'] = maybe_serialize( $update_contact_description_settings );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_contact_description_value_serialize, $where );
					}
					break;

				case 'contact_textbox_settings_coming_soon_booster':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'contact_textbox_settings_coming_soon_booster' ) ) {// WPCS: input var ok.
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
						$update_contact_textbox_settings = array();
						$where                           = array();

						$update_contact_textbox_settings['name_textbox_contact_form']                  = sanitize_text_field( $form_data['ux_txt_name_textbox_plceholder'] );
						$update_contact_textbox_settings['email_textbox_contact_form']                 = sanitize_text_field( $form_data['ux_txt_email_textbox_plceholder'] );
						$update_contact_textbox_settings['subject_textbox_contact_form']               = sanitize_text_field( $form_data['ux_txt_subject_textbox_plceholder'] );
						$update_contact_textbox_settings['message_textbox_contact_form']               = sanitize_text_field( $form_data['ux_txt_message_textbox_plceholder'] );
						$update_contact_textbox_settings['font_style_textbox_contact_form']            = '12px,#282931';
						$update_contact_textbox_settings['font_family_textbox_contact_form']           = 'Poppins:300';
						$update_contact_textbox_settings['textbox_color_contact_form']                 = '#ffffff';
						$update_contact_textbox_settings['placeholder_alignment_textbox_contact_form'] = 'left';
						$update_contact_textbox_settings['margin_textbox_contact_form']                = '5,0,0,0';
						$update_contact_textbox_settings['padding_textbox_contact_form']               = '2,0,0,10';

						$update_contact_textbox_settings_values_serialize = array();
						$where['meta_key']                                = 'contact_form_textbox_settings_data';// WPCS: slow query ok.
						$update_contact_textbox_settings_values_serialize['meta_value'] = maybe_serialize( $update_contact_textbox_settings );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_contact_textbox_settings_values_serialize, $where );
					}
					break;

				case 'coming_soon_booster_button_settings_module':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_button_settings' ) ) {// WPCS: input var ok.
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
						$update_button_settings = array();
						$where                  = array();

						$update_button_settings['button_label_contact_form']       = sanitize_text_field( $form_data['ux_txt_button_label_contact'] );
						$update_button_settings['button_color_contact_form']       = '#d61c38';
						$update_button_settings['border_color_contact_form']       = 'd61c38';
						$update_button_settings['hover_color_contact_form']        = '#ffffff';
						$update_button_settings['text_hover_color_contact_form']   = '#d61c38';
						$update_button_settings['border_hover_color_contact_form'] = '#ffffff';
						$update_button_settings['font_style_button_contact_form']  = '18px,#ffffff';
						$update_button_settings['font_family_button_contact_form'] = 'Poppins:300';
						$update_button_settings['label_alignment_contact_form']    = 'center';
						$update_button_settings['margin_button_contact_form']      = '0,0,0,0';
						$update_button_settings['padding_button_contact_form']     = '18,0,18,0';

						$update_button_settings_values_serialize               = array();
						$where['meta_key']                                     = 'contact_form_button_settings_data';// WPCS: slow query ok.
						$update_button_settings_values_serialize['meta_value'] = maybe_serialize( $update_button_settings );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_button_settings_values_serialize, $where );
					}
					break;

				case 'coming_soon_booster_success_message_settings':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_success_message_settings' ) ) {// WPCS: input var ok.
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
						$update_success_message_settings = array();
						$where                           = array();

						$update_success_message_settings['success_message_settings_contact_form']             = sanitize_text_field( $form_data['ux_ddl_success_settings_contact_form'] );
						$update_success_message_settings['success_message_text_contact_form']                 = esc_html( $form_data['ux_txtarea_success_message'] );
						$update_success_message_settings['font_style_success_message_settings_contact_form']  = '18px,#ffffff';
						$update_success_message_settings['font_family_success_message_settings_contact_form'] = 'Poppins:300';

						$update_success_message_value_serialize               = array();
						$where['meta_key']                                    = 'success_message_settings_data';// WPCS: slow query ok.
						$update_success_message_value_serialize['meta_value'] = maybe_serialize( $update_success_message_settings );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_success_message_value_serialize, $where );
					}
					break;

				case 'coming_soon_booster_email_templates_module':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_templates' ) ) {// WPCS: input var ok.
						$email_template            = isset( $_REQUEST['data'] ) ? sanitize_text_field( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '';// WPCS: input var ok.
						$email_template_data       = $wpdb->get_results(
							$wpdb->prepare(
								'SELECT * FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s', $email_template
							)
						);// WPCS: db call ok; no-cache ok.
						$email_template_data_array = get_coming_soon_booster_unserialize_data( $email_template_data );
						echo wp_json_encode( $email_template_data_array );
					}
					break;
				case 'coming_soon_booster_email_module':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_emails' ) ) {// WPCS: input var ok.
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
						$templates = isset( $_REQUEST['template_name'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['template_name'] ) ) : '';// WPCS: input var ok, slow query ok.

						// admin email template.
						$admin_email = get_coming_soon_booster_meta_value( $templates );

						$update_email_templates                  = array();
						$update_email_templates['email_send_to'] = sanitize_text_field( $form_data['ux_txt_send_to'] );
						$update_email_templates['email_cc']      = $admin_email['email_cc'];
						$update_email_templates['email_bcc']     = $admin_email['email_bcc'];
						$update_email_templates['email_message'] = $admin_email['email_message'];

						$where                               = array();
						$update_data_serialize               = array();
						$where['meta_id']                    = isset( $_REQUEST['meta_id'] ) ? intval( $_REQUEST['meta_id'] ) : 0;// WPCS: input var ok.
						$where['meta_key']                   = $templates;// WPCS: slow query ok.
						$update_data_serialize['meta_value'] = maybe_serialize( $update_email_templates );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_data_serialize, $where );
					}
					break;
				case 'coming_soon_booster_subscription_email_module':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_emails_subscription' ) ) {// WPCS: input var ok.
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
						$templates = isset( $_REQUEST['template_name'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['template_name'] ) ) : '';// WPCS: input var ok, slow query ok.

						// admin email template.
						$admin_email = get_coming_soon_booster_meta_value( $templates );

						$update_email_templates                               = array();
						$update_email_templates['subscription_email_send_to'] = sanitize_text_field( $form_data['ux_txt_send_to'] );
						$update_email_templates['subscription_email_cc']      = $admin_email['subscription_email_cc'];
						$update_email_templates['subscription_email_bcc']     = $admin_email['subscription_email_bcc'];
						$update_email_templates['subscription_email_subject'] = $admin_email['subscription_email_subject'];
						$update_email_templates['subscription_email_message'] = $admin_email['subscription_email_message'];

						$where                               = array();
						$update_data_serialize               = array();
						$where['meta_id']                    = isset( $_REQUEST['meta_id'] ) ? intval( $_REQUEST['meta_id'] ) : 0;// WPCS: input var ok.
						$where['meta_key']                   = $templates; // WPCS: slow query ok.
						$update_data_serialize['meta_value'] = maybe_serialize( $update_email_templates );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_data_serialize, $where );
					}
					break;

				case 'coming_soon_booster_subscription_heading_settings_module':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_heading_settings' ) ) {// WPCS: input var ok.
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
						$update_subscription_heading_settings = array();
						$where                                = array();

						$update_subscription_heading_settings['heading_settings_subscription']    = sanitize_text_field( $form_data['ux_ddl_heading_settings_subscription'] );
						$update_subscription_heading_settings['heading_text_subscription']        = esc_html( $form_data['ux_txtarea_heading_content_subscription'] );
						$update_subscription_heading_settings['font_style_heading_subscription']  = '25px,#d61c38';
						$update_subscription_heading_settings['font_family_heading_subscription'] = 'Poppins';
						$update_subscription_heading_settings['margin_heading_subscription']      = '0,0,0,0';
						$update_subscription_heading_settings['padding_heading_subscription']     = '0,0,0,0';

						$update_subscription_heading_settings_data_serialize = array();
						$where['meta_key']                                   = 'subscription_heading_settings_data';// WPCS: slow query ok.
						$update_subscription_heading_settings_data_serialize['meta_value'] = maybe_serialize( $update_subscription_heading_settings );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_subscription_heading_settings_data_serialize, $where );
					}
					break;

				case 'coming_soon_booster_subscription_description_settings_module':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_subscription_description_settings' ) ) {// WPCS: input var ok.
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
						$update_subscription_description_settings = array();
						$where                                    = array();

						$update_subscription_description_settings['description_settings_subscription']    = sanitize_text_field( $form_data['ux_ddl_description_settings_subscription'] );
						$update_subscription_description_settings['description_text_subscription']        = esc_html( $form_data['ux_txtarea_description_content_subscription'] );
						$update_subscription_description_settings['font_style_description_subscription']  = '18px, #ffffff';
						$update_subscription_description_settings['font_family_description_subscription'] = 'Poppins:300';
						$update_subscription_description_settings['margin_description_subscription']      = '10,0,10,0';
						$update_subscription_description_settings['padding_description_subscription']     = '10,0,10,0';

						$update_subscription_description_settings_data_serialize = array();
						$where['meta_key']                                       = 'subscription_description_settings_data';// WPCS: slow query ok.
						$update_subscription_description_settings_data_serialize['meta_value'] = maybe_serialize( $update_subscription_description_settings );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_subscription_description_settings_data_serialize, $where );
					}
					break;

				case 'coming_soon_booster_subscripton_textbox_settings':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_textbox_settings' ) ) {// WPCS: input var ok.
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
						$update_subscripton_textbox_setting = array();
						$where                              = array();

						$update_subscripton_textbox_setting['textbox_placeholder_subscription']           = sanitize_text_field( $form_data['ux_txt_textbox_plceholder'] );
						$update_subscripton_textbox_setting['textbox_font_style_subscription']            = '15px, #282931';
						$update_subscripton_textbox_setting['textbox_font_family_subscription']           = 'Poppins:300';
						$update_subscripton_textbox_setting['textbox_color_subscription']                 = sanitize_text_field( $form_data['ux_clr_textbox_color'] );
						$update_subscripton_textbox_setting['textbox_placeholder_alignment_subscription'] = 'center';
						$update_subscripton_textbox_setting['textbox_margin_subscription']                = '0,0,0,0';
						$update_subscripton_textbox_setting['textbox_padding_subscription']               = '0,0,0,0';

						$update_subscripton_textbox_setting_serialize = array();
						$where['meta_key']                            = 'subscription_textbox_settings_data';// WPCS: slow query ok.
						$update_subscripton_textbox_setting_serialize['meta_value'] = maybe_serialize( $update_subscripton_textbox_setting );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_subscripton_textbox_setting_serialize, $where );
					}
					break;

				case 'coming_soon_booster_subscripton_button_settings':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_button_settings' ) ) {// WPCS: input var ok.
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
						$update_subscripton_button_setting = array();
						$where                             = array();

						$update_subscripton_button_setting['button_label_subscription']            = sanitize_text_field( $form_data['ux_txt_button_label'] );
						$update_subscripton_button_setting['font_style_button_subscription']       = '20px, #ffffff';
						$update_subscripton_button_setting['font_family_button_subscription']      = 'Poppins';
						$update_subscripton_button_setting['button_color_subscription']            = '#d61c38';
						$update_subscripton_button_setting['border_color_subscription']            = '#d61c38';
						$update_subscripton_button_setting['hover_color_button_subscription']      = '#ffffff';
						$update_subscripton_button_setting['text_hover_color_button_subscription'] = '#d61c38';
						$update_subscripton_button_setting['border_hover_color_subscription']      = '#ffffff';
						$update_subscripton_button_setting['label_alignment_button_subscription']  = 'center';
						$update_subscripton_button_setting['margin_button_subscription']           = '20,0,0,0';
						$update_subscripton_button_setting['padding_button_subscription']          = '0,0,0,0';

						$update_subscripton_button_setting_serialize = array();
						$where['meta_key']                           = 'subscription_button_settings_data';// WPCS: slow query ok.
						$update_subscripton_button_setting_serialize['meta_value'] = maybe_serialize( $update_subscripton_button_setting );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_subscripton_button_setting_serialize, $where );
					}
					break;

				case 'coming_soon_booster_success_settings_module':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'comming_soon_booster_success_settings' ) ) {// WPCS: input var ok.
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
						$update_success_settings = array();
						$where                   = array();

						$update_success_settings['success_settings_subscription']        = sanitize_text_field( $form_data['ux_ddl_success_settings_subscription'] );
						$update_success_settings['success_text_subscription']            = esc_html( $form_data['ux_txtarea_success_content_subscription'] );
						$update_success_settings['font_style_success_subscription']      = '16px,#ffffff';
						$update_success_settings['font_family_success_subscription']     = 'Poppins:300';
						$update_success_settings['backgroud_color_success_subscription'] = '#282931';
						$update_success_settings['color_opacity_success_subscription']   = '100';
						$update_success_settings['margin_success_subscription']          = '0,0,0,0';
						$update_success_settings['padding_success_subscription']         = '0,0,0,0';

						$update_success_settings_data_serialize               = array();
						$where['meta_key']                                    = 'success_settings_data';// WPCS: slow query ok.
						$update_success_settings_data_serialize['meta_value'] = maybe_serialize( $update_success_settings );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_success_settings_data_serialize, $where );
					}
					break;

				case 'coming_soon_booster_subscription_error_settings_module':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_subscription_error_settings' ) ) {// WPCS: input var ok.
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
						$update_sub_error_settings = array();
						$where                     = array();

						$update_subscription_error_settings['error_settings_subscription']        = sanitize_text_field( $form_data['ux_ddl_error_settings_subscription'] );
						$update_subscription_error_settings['error_text_subscription']            = esc_html( $form_data['ux_txtarea_error_content_subscription'] );
						$update_subscription_error_settings['font_style_error_subscription']      = '16px, #ffffff';
						$update_subscription_error_settings['font_family_error_subscription']     = 'Poppins:300';
						$update_subscription_error_settings['backgroud_color_error_subscription'] = '#282931';
						$update_subscription_error_settings['color_opacity_error_subscription']   = '100';
						$update_subscription_error_settings['margin_error_subscription']          = '0,0,0,0';
						$update_subscription_error_settings['padding_error_subscription']         = '0,0,0,0';

						$update_subscription_error_settings_data_serialize = array();
						$where['meta_key']                                 = 'error_settings_data';// WPCS: slow query ok.
						$update_subscription_error_settings_data_serialize['meta_value'] = maybe_serialize( $update_subscription_error_settings );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $update_subscription_error_settings_data_serialize, $where );
					}
					break;

				case 'coming_soon_booster_susbcription_email_templates_module':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_templates_subscription' ) ) {// WPCS: input var ok.
						$email_template            = isset( $_REQUEST['data'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['data'] ) ) : '';// WPCS: input var ok.
						$email_template_data       = $wpdb->get_results(
							$wpdb->prepare(
								'SELECT * FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s', $email_template
							)
						);// WPCS: db call ok, cache ok.
						$email_template_data_array = get_coming_soon_booster_unserialize_data( $email_template_data );
						echo wp_json_encode( $email_template_data_array );
					}
					break;

				case 'coming_soon_booster_delete_data':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_delete' ) ) {// WPCS: input var ok.
						$id                 = isset( $_REQUEST['id'] ) ? intval( $_REQUEST['id'] ) : 0;// WPCS: input var ok.
						$where              = array();
						$where_parent       = array();
						$where['meta_id']   = $id;
						$where_parent['id'] = $id;
						$obj_dbhelper_coming_soon_booster->delete_command( coming_soon_booster_meta(), $where );
						$obj_dbhelper_coming_soon_booster->delete_command( coming_soon_booster(), $where_parent );
					}
					break;

				case 'coming_soon_booster_other_settings':
					if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'csb_other_settings_data' ) ) {// WPCS: input var ok.
						parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $insert_array );// WPCS: input var ok.
						$update_array                               = array();
						$where                                      = array();
						$update_array['remove_tables_at_uninstall'] = sanitize_text_field( $insert_array['ux_ddl_remove_tables'] );
						$update_array['ip_address_fetching_method'] = sanitize_text_field( $insert_array['ux_ddl_ip_address_fetching_method'] );
						$update_array['gdpr_compliance']            = sanitize_text_field( $insert_array['ux_ddl_gdpr_compliance'] );
						$update_array['gdpr_compliance_text']       = esc_attr( $insert_array['ux_txt_gdpr_compliance_text'] );

						$other_settings_value_serialize               = array();
						$where['meta_key']                            = 'other_settings_data';// WPCS: slow query ok.
						$other_settings_value_serialize['meta_value'] = maybe_serialize( $update_array );// WPCS: slow query ok.
						$obj_dbhelper_coming_soon_booster->update_command( coming_soon_booster_meta(), $other_settings_value_serialize, $where );
					}
					break;
			}
			die();
		}
	}
}
