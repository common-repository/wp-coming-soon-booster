<?php
/**
 * This file contains code of remove tables and options at uninstall plugin.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/lib
 * @version 1.0.0
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}
if ( ! current_user_can( 'manage_options' ) ) {
	return;
} else {
	global $wpdb;
	if ( is_multisite() ) {
		$blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );// WPCS: db call ok; no-cache ok.
		foreach ( $blog_ids as $blog_id ) {
			switch_to_blog( $blog_id );// @codingStandardsIgnoreLine.
			$version = get_option( 'coming_soon_booster_versions_number' );
			if ( false !== $version ) {
				$other_settings_remove_tables             = $wpdb->get_var(
					$wpdb->prepare(
						'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s', 'other_settings_data'
					)
				);// WPCS: db call ok; no-cache ok.
				$other_settings_remove_tables_unserialize = maybe_unserialize( $other_settings_remove_tables );
				if ( 'enable' === esc_attr( $other_settings_remove_tables_unserialize['remove_tables_at_uninstall'] ) ) {
					$wpdb->query( 'DROP TABLE IF EXISTS ' . $wpdb->prefix . 'coming_soon_booster' );// @codingStandardsIgnoreLine.
					$wpdb->query( 'DROP TABLE IF EXISTS ' . $wpdb->prefix . 'coming_soon_booster_meta' );// @codingStandardsIgnoreLine.
					$wpdb->query( 'DROP TABLE IF EXISTS ' . $wpdb->prefix . 'coming_soon_booster_ip_locations' );// @codingStandardsIgnoreLine.

					delete_option( 'coming_soon_booster_versions_number' );
					delete_option( 'csb_admin_notice' );
				}
			}
			restore_current_blog();
		}
	} else {
		$coming_soon_booster_version_number = get_option( 'coming_soon_booster_versions_number' );
		if ( false !== $coming_soon_booster_version_number ) {
			global $wp_version, $wpdb;

			$other_settings_remove_tables             = $wpdb->get_var(
				$wpdb->prepare(
					'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s', 'other_settings_data'
				)
			);// WPCS: db call ok; no-cache ok.
			$other_settings_remove_tables_unserialize = maybe_unserialize( $other_settings_remove_tables );
			if ( 'enable' === esc_attr( $other_settings_remove_tables_unserialize['remove_tables_at_uninstall'] ) ) {
				$wpdb->query( 'DROP TABLE IF EXISTS ' . $wpdb->prefix . 'coming_soon_booster' );// @codingStandardsIgnoreLine.
				$wpdb->query( 'DROP TABLE IF EXISTS ' . $wpdb->prefix . 'coming_soon_booster_meta' );// @codingStandardsIgnoreLine.
				$wpdb->query( 'DROP TABLE IF EXISTS ' . $wpdb->prefix . 'coming_soon_booster_ip_locations' );// @codingStandardsIgnoreLine.

				delete_option( 'coming_soon_booster_versions_number' );
				delete_option( 'csb_admin_notice' );
			}
		}
	}
}
