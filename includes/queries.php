<?php
/**
 * This file is used to queries for backend.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/includes
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly.
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
		if ( ! function_exists( 'get_coming_soon_date_time' ) ) {
			/**
			 * This function is used to get date and time.
			 *
			 * @param string $data .
			 * @param string $start_date .
			 * @param string $current_date .
			 */
			function get_coming_soon_date_time( $data, $start_date, $current_date ) {
				$array_get_details = array();
				if ( count( $data ) > 0 ) {
					foreach ( $data as $key ) {
						if ( $key['date_time'] >= $start_date && $key['date_time'] <= $current_date ) {
							array_push( $array_get_details, $key );
						}
					}
				}
				return $array_get_details;
			}
		}

		if ( ! function_exists( 'get_coming_soon_booster_unserialize_data' ) ) {
			/**
			 * This function is used to get unserialized data.
			 *
			 * @param string $meta_key .
			 */
			function get_coming_soon_booster_unserialize_data( $meta_key ) {
				global $wpdb;
				$coming_soon_details       = $wpdb->get_results(
					$wpdb->prepare(
						'SELECT * FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s ORDER BY meta_id DESC', $meta_key
					)
				);// WPCS: db call ok; no-cache ok.
				$unserialize_complete_data = array();

				if ( count( $coming_soon_details ) > 0 ) {
					foreach ( $coming_soon_details as $value ) {
						$unserialize_data            = maybe_unserialize( $value->meta_value );
						$unserialize_data['meta_id'] = $value->meta_id;
						array_push( $unserialize_complete_data, $unserialize_data );
					}
				}
				return $unserialize_complete_data;
			}
		}
		if ( ! function_exists( 'get_coming_soon_booster_meta_value' ) ) {
			/**
			 * This function is used to get meta value.
			 *
			 * @param string $meta_key .
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
		}

		if ( ! function_exists( 'coming_soon_booster_theme_meta_value' ) ) {
			/**
			 * This function is used to get theme meta value.
			 *
			 * @param string $meta_key .
			 */
			function coming_soon_booster_theme_meta_value( $meta_key ) {
				global $wpdb;
				$theme_unserialized_data            = get_coming_soon_booster_meta_value( 'theme' );
				$theme_type                         = $theme_unserialized_data['theme_type'];
				$get_theme_id                       = $wpdb->get_var(
					$wpdb->prepare(
						'SELECT id FROM ' . $wpdb->prefix . 'coming_soon_booster WHERE type=%s', $theme_type
					)
				);// WPCS: db call ok; no-cache ok.
				$get_coming_soon_booster_meta_value = $wpdb->get_var(
					$wpdb->prepare(
						'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s and meta_id = %d', $meta_key, $get_theme_id
					)
				);// WPCS: db call ok; no-cache ok.
				return maybe_unserialize( $get_coming_soon_booster_meta_value );
			}
		}
		global $wpdb;
		$check_coming_soon_booster_wizard = get_option( 'coming-soon-booster-welcome-page' );
		if ( isset( $_REQUEST['page'] ) ) { // WPCS: CSRF ok.
			$page = sanitize_text_field( wp_unslash( $_REQUEST['page'] ) );// WPCS:Input var okay, CSRF ok.
		}
		$page_url = false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : $page;
		if ( isset( $_GET['page'] ) ) {// WPCS: Input var okay, CSRF ok.
			switch ( $page_url ) {
				case 'csb_coming_soon_booster':
					$plugin_mode_data_unserialize = get_coming_soon_booster_meta_value( 'plugin_mode_setting_data' );
					$themes_data                  = get_coming_soon_booster_meta_value( 'theme' );
					break;

				case 'csb_background_settings':
					$background_settings_data_unserialize = coming_soon_booster_theme_meta_value( 'background_settings_data' );
					break;

				case 'csb_loader_settings':
					$loader_data_unserialize = coming_soon_booster_theme_meta_value( 'loader_settings_data' );
					break;

				case 'csb_logo_settings':
					$logo_data_unserialize = coming_soon_booster_theme_meta_value( 'logo_settings_data' );
					break;

				case 'csb_seo_settings':
					$seo_data_unserialize = get_coming_soon_booster_meta_value( 'seo_settings_data' );
					break;

				case 'csb_favicon_settings':
					$favicon_data_unserialize = get_coming_soon_booster_meta_value( 'favicon_settings_data' );
					break;

				case 'csb_heading_settings':
					$layout_heading_data_unserialize = coming_soon_booster_theme_meta_value( 'heading_settings_data' );
					break;

				case 'csb_description_settings':
					$layout_description_data_unserialize = coming_soon_booster_theme_meta_value( 'description_settings_data' );
					break;

				case 'csb_layout_button_settings':
					$layout_button_settings_data_unserialize = coming_soon_booster_theme_meta_value( 'layout_button_settings_data' );
					break;

				case 'csb_layout_custom_css':
					$custom_css_settings_data_unserialize = coming_soon_booster_theme_meta_value( 'custom_css_settings' );
					break;

				case 'csb_countdown':
					$countdown_data_unserialize = coming_soon_booster_theme_meta_value( 'countdown_settings_data' );
					break;

				case 'csb_social_settings':
					$social_media_settings_data_unserialize = get_coming_soon_booster_meta_value( 'social_media_settings_data' );
					break;

				case 'csb_contact_background_settings':
					$contact_background_settings_data_unserialize = get_coming_soon_booster_meta_value( 'contact_form_background_settings_data' );
					break;

				case 'csb_contact_heading_settings':
					$contact_heading_settings_data_unserialize = get_coming_soon_booster_meta_value( 'contact_form_heading_data' );

					break;

				case 'csb_contact_description_settings':
					$contact_description_settings_data_unserialize = get_coming_soon_booster_meta_value( 'contact_form_description_data' );
					break;

				case 'csb_label_settings':
					$label_settings_data_unserialize = get_coming_soon_booster_meta_value( 'contact_form_label_settings_data' );
					break;

				case 'csb_contact_textbox_settings':
					$textbox_settings_data_unserialize = get_coming_soon_booster_meta_value( 'contact_form_textbox_settings_data' );
					break;

				case 'csb_button_settings':
					$button_settings_data_unserialize = get_coming_soon_booster_meta_value( 'contact_form_button_settings_data' );
					break;

				case 'csb_message_settings':
					$success_message_settings_data_unserialize = get_coming_soon_booster_meta_value( 'success_message_settings_data' );
					break;

				case 'csb_footer_settings':
					$footer_data_unserialize = get_coming_soon_booster_meta_value( 'footer_settings_data' );
					break;

				case 'csb_subscription_background_settings':
					$background_settings_subscription_data_unserialize = get_coming_soon_booster_meta_value( 'subscription_background_settings_data' );
					break;

				case 'csb_subscription_heading_settings':
					$heading_settings_subscription_data_unserialize = get_coming_soon_booster_meta_value( 'subscription_heading_settings_data' );
					break;

				case 'csb_subscription_description_settings':
					$description_settings_subscription_data_unserialize = get_coming_soon_booster_meta_value( 'subscription_description_settings_data' );
					break;

				case 'csb_subscription_textbox_settings':
					$textbox_settings_subscription_data_unserialize = get_coming_soon_booster_meta_value( 'subscription_textbox_settings_data' );
					break;

				case 'csb_subscription_button_settings':
					$button_settings_subscription_data_unserialize = get_coming_soon_booster_meta_value( 'subscription_button_settings_data' );
					break;

				case 'csb_subscription_success_settings':
					$success_settings_data_unserialize = get_coming_soon_booster_meta_value( 'success_settings_data' );
					break;

				case 'csb_subscription_error_settings':
					$error_settings_data_unserialize = get_coming_soon_booster_meta_value( 'error_settings_data' );
					break;

				case 'csb_subscribers':
					$end_date                  = COMING_SOON_BOOSTER_LOCAL_TIME;
					$timestamp                 = $end_date + 86400;
					$timestamp1                = $timestamp - 2678340;
					$start_date                = date( 'm/d/Y', $timestamp1 );
					$details                   = get_coming_soon_booster_unserialize_data( 'subscriber_data' );
					$array_coming_soon_details = get_coming_soon_date_time( $details, $timestamp1, $timestamp );
					break;

				case 'csb_contact_form_data':
					$end_date                   = COMING_SOON_BOOSTER_LOCAL_TIME;
					$timestamp                  = $end_date + 86400;
					$timestamp1                 = $timestamp - 2678340;
					$start_date                 = date( 'm/d/Y', $timestamp1 );
					$contact_form_details_array = get_coming_soon_booster_unserialize_data( 'contact_form_data_values' );
					$array_coming_soon_details  = get_coming_soon_date_time( $contact_form_details_array, $timestamp1, $timestamp );
					break;

				case 'csb_other_settings':
					$other_settings_module_unserialize = get_coming_soon_booster_meta_value( 'other_settings_data' );
					break;

				case 'csb_roles_and_capabilities':
					$details_roles_capabilities = get_coming_soon_booster_meta_value( 'roles_and_capabilities_data' );
					$other_roles_access_array   = array(
						'manage_options',
						'edit_plugins',
						'edit_posts',
						'publish_posts',
						'publish_pages',
						'edit_pages',
						'read',
					);
					$other_roles_array          = isset( $details_roles_capabilities['capabilities'] ) && '' !== $details_roles_capabilities['capabilities'] ? $details_roles_capabilities['capabilities'] : $other_roles_access_array;
					break;
			}
		}
	}
}
