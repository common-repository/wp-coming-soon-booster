<?php
/**
 * This file is used to queries for frontend.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/theme/includes
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly.
if ( ! function_exists( 'get_coming_soon_booster_unserialize_data' ) ) {
	/**
	 * This function is used to get data.
	 *
	 * @param string $manage_data .
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
if ( ! function_exists( 'get_coming_soon_booster_key_value_data' ) ) {
	/**
	 * This function is used to get key value.
	 *
	 * @param string $manage_data .
	 */
	function get_coming_soon_booster_key_value_data( $manage_data ) {
		$get_data       = get_coming_soon_booster_unserialize_data( $manage_data );
		$get_data_array = array();

		if ( count( $get_data ) > 0 ) {
			foreach ( $get_data as $value ) {
				foreach ( $value as $key => $row ) {
					$get_data_array[ $key ] = $row;
				}
			}
		}
		return $get_data_array;
	}
}

$other_settings_data_array        = $wpdb->get_var(
	$wpdb->prepare(
		'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key=%s', 'other_settings_data'
	)
);// WPCS: db call ok; no-cache ok.
$other_settings_unserialized_data = maybe_unserialize( $other_settings_data_array );

$theme_data                         = $wpdb->get_var(
	$wpdb->prepare(
		'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s', 'theme'
	)
);// WPCS: db call ok; no-cache ok.
$theme_unserialized_data            = maybe_unserialize( $theme_data );
$theme_type                         = $theme_unserialized_data['theme_type'];
$get_theme_id                       = $wpdb->get_var(
	$wpdb->prepare(
		'SELECT id FROM ' . $wpdb->prefix . 'coming_soon_booster WHERE type=%s', $theme_type
	)
);// WPCS: db call ok; no-cache ok.
$plugin_mode_data                   = $wpdb->get_var(
	$wpdb->prepare(
		'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s', 'plugin_mode_setting_data'
	)
);// WPCS: db call ok; no-cache ok.
$plugin_mode_data_unserialize       = maybe_unserialize( $plugin_mode_data );
$custom_css_settings_data           = $wpdb->get_var(
	$wpdb->prepare(
		'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s and meta_id = %d', 'custom_css_settings', $get_theme_id
	)
);// WPCS: db call ok; no-cache ok.
$custom_css_settings_serialize_data = maybe_unserialize( $custom_css_settings_data );

$meta_data               = $wpdb->get_results(
	$wpdb->prepare(
		'SELECT * FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key in (%s,%s,%s,%s,%s,%s,%s) and meta_id = %d', 'background_settings_data', 'countdown_settings_data', 'loader_settings_data', 'logo_settings_data', 'heading_settings_data', 'description_settings_data', 'layout_button_settings_data', $get_theme_id
	)
);// WPCS: db call ok; no-cache ok.
$social_seo_favicon_data = $wpdb->get_results(
	$wpdb->prepare(
		'SELECT * FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key in (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)', 'seo_settings_data', 'favicon_settings_data', 'social_media_settings_data', 'footer_settings_data', 'subscription_heading_settings_data', 'subscription_description_settings_data', 'subscription_background_settings_data', 'subscription_textbox_settings_data', 'subscription_button_settings_data', 'success_settings_data', 'error_settings_data', 'contact_form_background_settings_data', 'contact_form_label_settings_data', 'contact_form_textbox_settings_data', 'contact_form_heading_data', 'contact_form_description_data', 'contact_form_button_settings_data', 'success_message_settings_data'
	)
);// WPCS: db call ok; no-cache ok.
$meta_unserialized_data  = get_coming_soon_booster_key_value_data( $social_seo_favicon_data );
$meta_data_array         = get_coming_soon_booster_key_value_data( $meta_data );
$fonts_family_array      = array(
	esc_attr( $meta_data_array['font_family_layout'] ),
	esc_attr( $meta_data_array['font_family_heading'] ),
	esc_attr( $meta_data_array['font_family_description'] ),
	esc_attr( $meta_data_array['layout_subscriber_font_family_button'] ),
	esc_attr( $meta_data_array['layout_contact_font_family_button'] ),
	esc_attr( $meta_unserialized_data['font_family_footer'] ),
	esc_attr( $meta_data_array['loader_text_font_family'] ),
	esc_attr( $meta_data_array['font_family_countdown'] ),
	esc_attr( $meta_unserialized_data['font_family_heading_subscription'] ),
	esc_attr( $meta_unserialized_data['font_family_description_subscription'] ),
	esc_attr( $meta_unserialized_data['font_family_button_subscription'] ),
	esc_attr( $meta_unserialized_data['font_family_success_subscription'] ),
	esc_attr( $meta_unserialized_data['font_family_error_subscription'] ),
	esc_attr( $meta_unserialized_data['font_family_label'] ),
	esc_attr( $meta_unserialized_data['contact_font_family_heading'] ),
	esc_attr( $meta_unserialized_data['contact_font_family_description'] ),
	esc_attr( $meta_unserialized_data['font_family_button_contact_form'] ),
	esc_attr( $meta_unserialized_data['font_family_success_message_settings_contact_form'] ),
	esc_attr( $meta_unserialized_data['font_family_success_subscription'] ),
	esc_attr( $meta_unserialized_data['font_family_error_subscription'] ),
);
$font_array              = array_unique( $fonts_family_array );
