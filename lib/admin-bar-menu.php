<?php
/**
 * This file is used to create admin bar menu.
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
		if ( is_super_admin() ) {
			$csb_role = 'administrator';
		} else {
			$csb_role = check_user_roles_for_coming_soon_booster();
		}
		$flag                        = 0;
		$roles_and_capabilities_data = $wpdb->get_var(
			$wpdb->prepare(
				'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta  WHERE meta_key = %s', 'roles_and_capabilities_data'
			)
		); // WPCS: db call ok, cache ok.
		$roles_and_capabilities      = maybe_unserialize( $roles_and_capabilities_data );
		$capabilities                = explode( ',', $roles_and_capabilities['roles_and_capabilities'] );

		switch ( $csb_role ) {
			case 'administrator':
				$flag = $capabilities[0];
				break;

			case 'author':
				$flag = $capabilities[1];
				break;

			case 'editor':
				$flag = $capabilities[2];
				break;

			case 'contributor':
				$flag = $capabilities[3];
				break;

			case 'subscriber':
				$flag = $capabilities[4];
				break;

			default:
				$flag = $capabilities[5];
				break;
		}

		if ( '1' === $flag ) {
			$wp_admin_bar->add_menu(
				array(
					'id'    => 'coming_soon_booster',
					'title' => '<img src = "' . plugins_url( 'assets/global/img/icon.png', dirname( __FILE__ ) ) .
					"\" width=\"25\" height=\"25\" style=\"vertical-align:text-top; margin-top:2px; margin-right:5px; display:inline-block;\"./>$csb_coming_soon_booster",
					'href'  => admin_url( 'admin.php?page=csb_coming_soon_booster' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'coming_soon_booster',
					'id'     => 'csb_plugin_mode',
					'title'  => $csb_plugin_mode_label,
					'href'   => admin_url( 'admin.php?page=csb_coming_soon_booster' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'coming_soon_booster',
					'id'     => 'csb_layout_settings',
					'title'  => $csb_layout_settings_label,
					'href'   => admin_url( 'admin.php?page=csb_loader_settings' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'coming_soon_booster',
					'id'     => 'csb_countdown',
					'title'  => $csb_countdown_label,
					'href'   => admin_url( 'admin.php?page=csb_countdown' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'coming_soon_booster',
					'id'     => 'csb_social_media_settings',
					'title'  => $csb_social_media_settings_label,
					'href'   => admin_url( 'admin.php?page=csb_social_settings' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'coming_soon_booster',
					'id'     => 'csb_contact_form',
					'title'  => $csb_contact_form_label,
					'href'   => admin_url( 'admin.php?page=csb_contact_background_settings' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'coming_soon_booster',
					'id'     => 'csb_subscription',
					'title'  => $csb_subscription_label,
					'href'   => admin_url( 'admin.php?page=csb_subscription_background_settings' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'coming_soon_booster',
					'id'     => 'csb_subscribers',
					'title'  => $csb_subscribers_label,
					'href'   => admin_url( 'admin.php?page=csb_subscribers' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'coming_soon_booster',
					'id'     => 'csb_contact_form_data',
					'title'  => $csb_contact_form_data_label,
					'href'   => admin_url( 'admin.php?page=csb_contact_form_data' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'coming_soon_booster',
					'id'     => 'csb_other_settings',
					'title'  => $csb_other_settings_label,
					'href'   => admin_url( 'admin.php?page=csb_other_settings' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'coming_soon_booster',
					'id'     => 'csb_Roles_and_Capabilities',
					'title'  => $csb_roles_capabilities_label,
					'href'   => admin_url( 'admin.php?page=csb_roles_and_capabilities' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'coming_soon_booster',
					'id'     => 'csb_feature_requests',
					'title'  => $csb_feature_requests_label,
					'href'   => 'https://wordpress.org/support/plugin/wp-coming-soon-booster',
					'meta'   => array( 'target' => '_blank' ),
				)
			);

			$wp_admin_bar->add_menu(
				array(
					'parent' => 'coming_soon_booster',
					'id'     => 'csb_system_information',
					'title'  => $csb_system_information_label,
					'href'   => admin_url( 'admin.php?page=csb_system_information' ),
				)
			);
			$wp_admin_bar->add_menu(
				array(
					'parent' => 'coming_soon_booster',
					'id'     => 'csb_upgrade',
					'title'  => $csb_premium_edition_label,
					'href'   => 'https://tech-banker.com/coming-soon-booster/pricing/',
					'meta'   => array( 'target' => '_blank' ),
				)
			);
		}
	}
}
