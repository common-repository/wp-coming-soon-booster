<?php
/**
 * This file is used to create sidebar menu.
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
		$flag                        = 0;
		$roles_and_capabilities_data = $wpdb->get_var(
			$wpdb->prepare(
				'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s', 'roles_and_capabilities_data'
			)
		);// WPCS: db call ok, cache ok.
		$roles_and_capabilities      = maybe_unserialize( $roles_and_capabilities_data );
		$capabilities                = explode( ',', $roles_and_capabilities['roles_and_capabilities'] );
		if ( is_super_admin() ) {
			$csb_role = 'administrator';
		} else {
			$csb_role = check_user_roles_for_coming_soon_booster();
		}
		switch ( $csb_role ) {
			case 'administrator':
				$privileges = 'administrator_privileges';
				$flag       = $capabilities[0];
				break;

			case 'author':
				$privileges = 'author_privileges';
				$flag       = $capabilities[1];
				break;

			case 'editor':
				$privileges = 'editor_privileges';
				$flag       = $capabilities[2];
				break;

			case 'contributor':
				$privileges = 'contributor_privileges';
				$flag       = $capabilities[3];
				break;

			case 'subscriber':
				$privileges = 'subscriber_privileges';
				$flag       = $capabilities[4];
				break;

			default:
				$privileges = 'other_privileges';
				$flag       = $capabilities[5];
				break;
		}
		$privileges_role = '';

		if ( isset( $roles_and_capabilities ) && count( $roles_and_capabilities ) > 0 ) {
			foreach ( $roles_and_capabilities as $key => $value ) {
				if ( $privileges === $key ) {
					$privileges_role = $value;
					break;
				}
			}
		}
		$full_control = explode( ',', $privileges_role );
		if ( ! defined( 'FULL_CONTROL' ) ) {
			define( 'FULL_CONTROL', "$full_control[0]" );
		}
		if ( ! defined( 'PLUGIN_MODE_COMING_SOON_BOOSTER' ) ) {
			define( 'PLUGIN_MODE_COMING_SOON_BOOSTER', "$full_control[1]" );
		}
		if ( ! defined( 'THEMES_COMING_SOON_BOOSTER' ) ) {
			define( 'THEMES_COMING_SOON_BOOSTER', "$full_control[2]" );
		}
		if ( ! defined( 'BACKGROUND_SETTINGS_COMING_SOON_BOOSTER' ) ) {
			define( 'BACKGROUND_SETTINGS_COMING_SOON_BOOSTER', "$full_control[3]" );
		}
		if ( ! defined( 'LAYOUT_SETTINGS_COMING_SOON_BOOSTER' ) ) {
			define( 'LAYOUT_SETTINGS_COMING_SOON_BOOSTER', "$full_control[4]" );
		}
		if ( ! defined( 'COUNTDOWN_COMING_SOON_BOOSTER' ) ) {
			define( 'COUNTDOWN_COMING_SOON_BOOSTER', "$full_control[5]" );
		}
		if ( ! defined( 'SOCIAL_MEDIA_SETTINGS_COMING_SOON_BOOSTER' ) ) {
			define( 'SOCIAL_MEDIA_SETTINGS_COMING_SOON_BOOSTER', "$full_control[6]" );
		}
		if ( ! defined( 'CONTACT_FORM_COMING_SOON_BOOSTER' ) ) {
			define( 'CONTACT_FORM_COMING_SOON_BOOSTER', "$full_control[7]" );
		}
		if ( ! defined( 'SUBSCRIPTION_COMING_SOON_BOOSTER' ) ) {
			define( 'SUBSCRIPTION_COMING_SOON_BOOSTER', "$full_control[8]" );
		}
		if ( ! defined( 'SUBSCRIBERS_COMING_SOON_BOOSTER' ) ) {
			define( 'SUBSCRIBERS_COMING_SOON_BOOSTER', "$full_control[9]" );
		}
		if ( ! defined( 'CONTACT_FORM_DATA_COMING_SOON_BOOSTER' ) ) {
			define( 'CONTACT_FORM_DATA_COMING_SOON_BOOSTER', "$full_control[10]" );
		}
		if ( ! defined( 'OTHER_SETTINGS_COMING_SOON_BOOSTER' ) ) {
			define( 'OTHER_SETTINGS_COMING_SOON_BOOSTER', "$full_control[11]" );
		}
		if ( ! defined( 'ROLES_AND_CAPABILITIES_COMING_SOON_BOOSTER' ) ) {
			define( 'ROLES_AND_CAPABILITIES_COMING_SOON_BOOSTER', "$full_control[12]" );
		}
		if ( ! defined( 'SYSTEM_INFORMATION_COMING_SOON_BOOSTER' ) ) {
			define( 'SYSTEM_INFORMATION_COMING_SOON_BOOSTER', "$full_control[13]" );
		}
		$check_coming_soon_booster_wizard = get_option( 'coming-soon-booster-welcome-page' );
		if ( '1' === $flag ) {
			if ( $check_coming_soon_booster_wizard ) {
				add_menu_page( $csb_coming_soon_booster, $csb_coming_soon_booster, 'read', 'csb_coming_soon_booster', '', plugins_url( 'assets/global/img/icon.png', dirname( __FILE__ ) ) );
			} else {
				add_menu_page( $csb_coming_soon_booster, $csb_coming_soon_booster, 'read', 'csb_wizard_coming_soon_booster', '', plugins_url( 'assets/global/img/icon.png', dirname( __FILE__ ) ) );
				add_submenu_page( $csb_plugin_mode_label, $csb_plugin_mode_label, '', 'read', 'csb_wizard_coming_soon_booster', 'csb_wizard_coming_soon_booster' );
			}
			add_submenu_page( 'csb_coming_soon_booster', $csb_plugin_mode_label, $csb_plugin_mode_label, 'read', 'csb_coming_soon_booster', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_coming_soon_booster' );

			add_submenu_page( 'csb_coming_soon_booster', $csb_loader_settings_label, $csb_layout_settings_label, 'read', 'csb_loader_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_loader_settings' );
			add_submenu_page( $csb_layout_settings_label, $csb_background_settings_label, '', 'read', 'csb_background_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_background_settings' );
			add_submenu_page( $csb_layout_settings_label, $csb_layout_logo_settings_label, '', 'read', 'csb_logo_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_logo_settings' );
			add_submenu_page( $csb_layout_settings_label, $csb_layout_seo_settings_label, '', 'read', 'csb_seo_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_seo_settings' );
			add_submenu_page( $csb_layout_settings_label, $csb_layout_favicon_settings_label, '', 'read', 'csb_favicon_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_favicon_settings' );
			add_submenu_page( $csb_layout_settings_label, $csb_heading_settings_label, '', 'read', 'csb_heading_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_heading_settings' );
			add_submenu_page( $csb_layout_settings_label, $csb_description_settings_label, '', 'read', 'csb_description_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_description_settings' );
			add_submenu_page( $csb_layout_settings_label, $csb_layout_settings_button_settings_label, '', 'read', 'csb_layout_button_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_layout_button_settings' );
			add_submenu_page( $csb_layout_settings_label, $csb_custom_css_label, '', 'read', 'csb_layout_custom_css', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_layout_custom_css' );

			add_submenu_page( 'csb_coming_soon_booster', $csb_countdown_label, $csb_countdown_label, 'read', 'csb_countdown', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_countdown' );
			add_submenu_page( 'csb_coming_soon_booster', $csb_social_media_settings_label, $csb_social_media_settings_label, 'read', 'csb_social_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_social_settings' );

			add_submenu_page( 'csb_coming_soon_booster', $csb_contact_form_background_settings_label, $csb_contact_form_label, 'read', 'csb_contact_background_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_contact_background_settings' );
			add_submenu_page( $csb_contact_form_label, $csb_form_title, '', 'read', 'csb_contact_heading_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_contact_heading_settings' );
			add_submenu_page( $csb_contact_form_label, $csb_form_description, '', 'read', 'csb_contact_description_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_contact_description_settings' );
			add_submenu_page( $csb_contact_form_label, $csb_contact_form_label_settings_label, '', 'read', 'csb_label_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_label_settings' );
			add_submenu_page( $csb_contact_form_label, $csb_textbox_settings_label, '', 'read', 'csb_contact_textbox_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_contact_textbox_settings' );
			add_submenu_page( $csb_contact_form_label, $csb_button_settings_label, '', 'read', 'csb_button_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_button_settings' );
			add_submenu_page( $csb_contact_form_label, $csb_success_settings_label, '', 'read', 'csb_message_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_message_settings' );
			add_submenu_page( $csb_contact_form_label, $csb_footer_settings_label, '', 'read', 'csb_footer_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_footer_settings' );
			add_submenu_page( $csb_contact_form_label, $csb_email_templates_label, '', 'read', 'csb_email_templates', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_email_templates' );

			add_submenu_page( 'csb_coming_soon_booster', $csb_contact_form_background_settings_label, $csb_subscription_label, 'read', 'csb_subscription_background_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_subscription_background_settings' );
			add_submenu_page( $csb_subscription_label, $csb_form_title, '', 'read', 'csb_subscription_heading_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_subscription_heading_settings' );
			add_submenu_page( $csb_subscription_label, $csb_form_description, '', 'read', 'csb_subscription_description_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_subscription_description_settings' );
			add_submenu_page( $csb_subscription_label, $csb_textbox_settings_label, '', 'read', 'csb_subscription_textbox_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_subscription_textbox_settings' );
			add_submenu_page( $csb_subscription_label, $csb_button_settings_label, '', 'read', 'csb_subscription_button_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_subscription_button_settings' );
			add_submenu_page( $csb_subscription_label, $csb_success_settings_label, '', 'read', 'csb_subscription_success_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_subscription_success_settings' );
			add_submenu_page( $csb_subscription_label, $csb_subscription_error_settings_label, '', 'read', 'csb_subscription_error_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_subscription_error_settings' );
			add_submenu_page( $csb_subscription_label, $csb_email_templates_label, '', 'read', 'csb_subscription_email_templates', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_subscription_email_templates' );

			add_submenu_page( 'csb_coming_soon_booster', $csb_subscribers_label, $csb_subscribers_label, 'read', 'csb_subscribers', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_subscribers' );
			add_submenu_page( 'csb_coming_soon_booster', $csb_contact_form_data_label, $csb_contact_form_data_label, 'read', 'csb_contact_form_data', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_contact_form_data' );
			add_submenu_page( 'csb_coming_soon_booster', $csb_other_settings_label, $csb_other_settings_label, 'read', 'csb_other_settings', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_other_settings' );
			add_submenu_page( 'csb_coming_soon_booster', $csb_roles_capabilities_label, $csb_roles_capabilities_label, 'read', 'csb_roles_and_capabilities', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_roles_and_capabilities' );
			add_submenu_page( 'csb_coming_soon_booster', $csb_feature_requests_label, $csb_feature_requests_label, 'read', 'https://wordpress.org/support/plugin/wp-coming-soon-booster', '' );

			add_submenu_page( 'csb_coming_soon_booster', $csb_system_information_label, $csb_system_information_label, 'read', 'csb_system_information', false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : 'csb_system_information' );
			add_submenu_page( 'csb_coming_soon_booster', $csb_premium_edition_label, $csb_premium_edition_label, 'read', 'https://tech-banker.com/coming-soon-booster/pricing/', '' );
		}
		if ( ! function_exists( 'csb_wizard_coming_soon_booster' ) ) {
			/**
			 * Function Name: csb_wizard_coming_soon_booster
			 * Parameters: No
			 * Description: This function is used for creating csb_wizard_coming_soon_booster menu.
			 * Created On: 12-04-2017 16:46
			 * Created By: Tech Banker Team
			 */
			function csb_wizard_coming_soon_booster() {
				global $wpdb;
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/wizard/wizard.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/wizard/wizard.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_coming_soon_booster' ) ) {
			/**
			 * Function Name: csb_coming_soon_booster
			 * Parameter: No
			 * Description: This Function is used for Plugin Mode.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_coming_soon_booster() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/plugin-mode/plugin-mode.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/plugin-mode/plugin-mode.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_background_settings' ) ) {
			/**
			 * Function Name: csb_background_settings
			 * Parameter: No
			 * Description: This function is used for Background settings.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_background_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/layout-settings/background-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/layout-settings/background-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_loader_settings' ) ) {
			/**
			 * Function Name: csb_loader_settings
			 * Parameter: No
			 * Description: This function is used for Loader settings.
			 * Created On: 2016-02-09 2:50
			 * Created By: Tech Banker Team
			 */
			function csb_loader_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/layout-settings/loader-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/layout-settings/loader-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_logo_settings' ) ) {
			/**
			 * Function Name: csb_logo_settings
			 * Parameter: No
			 * Description: This function is used for logo settings.
			 * Created On: 2015-06-30 2:50
			 * Created By: Tech Banker Team
			 */
			function csb_logo_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/layout-settings/logo-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/layout-settings/logo-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_seo_settings' ) ) {
			/**
			 * Function Name: csb_seo_settings
			 * Parameter: No
			 * Description: This function is used for SEO settings.
			 * Created On: 2015-06-30 2:50
			 * Created By: Tech Banker Team
			 */
			function csb_seo_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/layout-settings/seo-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/layout-settings/seo-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_favicon_settings' ) ) {
			/**
			 * Function Name: csb_favicon_settings
			 * Parameter: No
			 * Description: This function is used for Favicon settings.
			 * Created On: 2015-06-30 2:50
			 * Created By: Tech Banker Team
			 */
			function csb_favicon_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/layout-settings/favicon-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/layout-settings/favicon-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_heading_settings' ) ) {
			/**
			 * Function Name: csb_heading_settings
			 * Parameter: No
			 * Description: This function is used for heading settings.
			 * Created On: 2015-06-30 2:50
			 * Created By: Tech Banker Team
			 */
			function csb_heading_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/layout-settings/heading-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/layout-settings/heading-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_description_settings' ) ) {
			/**
			 * Function Name: csb_description_settings
			 * Parameter: No
			 * Description: This function is used for Description settings.
			 * Created On: 2015-06-30 2:50
			 * Created By: Tech Banker Team
			 */
			function csb_description_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/layout-settings/description-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/layout-settings/description-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_layout_button_settings' ) ) {
			/**
			 * Function Name: csb_layout_button_settings
			 * Parameter: No
			 * Description: This function is used for Layout Button settings.
			 * Created On: 2016-04-18 9:50
			 * Created By: Tech Banker Team
			 */
			function csb_layout_button_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/layout-settings/button-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/layout-settings/button-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_layout_custom_css' ) ) {
			/**
			 * Function Name: csb_layout_custom_css
			 * Parameter: No
			 * Description: This function is used for Custom Css settings.
			 * Created On: 2016-04-18 9:50
			 * Created By: Tech Banker Team
			 */
			function csb_layout_custom_css() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/layout-settings/custom-css.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/layout-settings/custom-css.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_countdown' ) ) {
			/**
			 * Function Name: csb_countdown
			 * Parameter: No
			 * Description: This function is used for Countdown settings.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_countdown() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/countdown/countdown.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/countdown/countdown.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_social_settings' ) ) {
			/**
			 * Function Name: csb_social_settings
			 * Parameter: No
			 * Description: This function is used for Social Media settings.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_social_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/social-media-settings/social-media-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/social-media-settings/social-media-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_contact_background_settings' ) ) {
			/**
			 * Function Name: csb_contact_background_settings
			 * Parameter: No
			 * Description: This function is used for Contact Form Background Settings.
			 * Created On: 2016-04-11 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_contact_background_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form/background-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form/background-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_contact_heading_settings' ) ) {
			/**
			 * Function Name: csb_contact_heading_settings
			 * Parameter: No
			 * Description: This function is used for Contact Form heading settings.
			 * Created On: 2016-04-20 10:53
			 * Created By: Tech Banker Team
			 */
			function csb_contact_heading_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form/heading-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form/heading-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_contact_description_settings' ) ) {
			/**
			 * Function Name: csb_contact_description_settings
			 * Parameter: No
			 * Description: This function is used for contact form Description Settings.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_contact_description_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form/description-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form/description-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_label_settings' ) ) {
			/**
			 * Function Name: csb_label_settings
			 * Parameter: No
			 * Description: This function is used for contact form Label Settings.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_label_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form/label-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form/label-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_contact_textbox_settings' ) ) {
			/**
			 * Function Name: csb_contact_textbox_settings
			 * Parameter: No
			 * Description: This function is used for contact form Textbox Settings.
			 * Created On: 2016-05-05 11:57
			 * Created By: Tech Banker Team
			 */
			function csb_contact_textbox_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form/textbox-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form/textbox-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_button_settings' ) ) {
			/**
			 * Function Name: csb_button_settings
			 * Parameter: No
			 * Description: This function is used for contact form button settings.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_button_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form/button-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form/button-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_message_settings' ) ) {
			/**
			 * Function Name: csb_message_settings
			 * Parameter: No
			 * Description: This function is used for contact form Message Settings.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_message_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form/success-message-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form/success-message-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_footer_settings' ) ) {
			/**
			 * Function Name: csb_footer_settings
			 * Parameter: No
			 * Description: This function is used for contact Form footer Settings.
			 * Created On: 2016-06-19 10:35
			 * Created By: Tech Banker Team
			 */
			function csb_footer_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form/footer-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form/footer-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_email_templates' ) ) {
			/**
			 * Function Name: csb_email_templates
			 * Parameter: No
			 * Description: This Function is used for contact form email Templates.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_email_templates() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form/email-templates.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form/email-templates.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_subscription_background_settings' ) ) {
			/**
			 * Function Name: csb_subscription_background_settings
			 * Parameter: No
			 * Description: This Function is used for subscription Background Settings.
			 * Created On: 2016-04-11 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_subscription_background_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/subscription/background-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/subscription/background-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_subscription_heading_settings' ) ) {
			/**
			 * Function Name: csb_subscription_heading_settings
			 * Parameter: No
			 * Description: This Function is used for subscription Heading Settings.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_subscription_heading_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/subscription/heading-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/subscription/heading-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_subscription_description_settings' ) ) {
			/**
			 * Function Name: csb_subscription_description_settings
			 * Parameter: No
			 * Description: This Function is used for subscription Description Settings.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_subscription_description_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/subscription/description-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/subscription/description-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_subscription_textbox_settings' ) ) {
			/**
			 * Function Name: csb_subscription_textbox_settings
			 * Parameter: No
			 * Description: This Function is used for Subscription Textbox Settings.
			 * Created On: 2016-04-21 10:35
			 * Created By: Tech Banker Team
			 */
			function csb_subscription_textbox_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/subscription/textbox-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/subscription/textbox-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_subscription_button_settings' ) ) {
			/**
			 * Function Name: csb_subscription_button_settings
			 * Parameter: No
			 * Description: This Function is used for subscription Button Settings.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_subscription_button_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/subscription/button-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/subscription/button-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_subscription_success_settings' ) ) {
			/**
			 * Function Name: csb_subscription_success_settings
			 * Parameter: No
			 * Description: This Function is used for subscription Success Settings.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_subscription_success_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/subscription/success-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/subscription/success-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_subscription_error_settings' ) ) {
			/**
			 * Function Name: csb_subscription_error_settings
			 * Parameter: No
			 * Description: This Function is used for subscription Error Seetings.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_subscription_error_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/subscription/error-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/subscription/error-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_subscription_email_templates' ) ) {
			/**
			 * Function Name: csb_subscription_email_templates
			 * Parameter: No
			 * Description: This Function is used for Subscription Email Templates.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_subscription_email_templates() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/subscription/email-templates.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/subscription/email-templates.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_subscribers' ) ) {
			/**
			 * Function Name: csb_subscribers
			 * Parameter: No
			 * Description: This Function is used for subscribers.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_subscribers() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/subscribers/subscribers.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/subscribers/subscribers.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_contact_form_data' ) ) {
			/**
			 * Function Name: csb_contact_form_data
			 * Parameter: No
			 * Description: This Function is used for Contact Form Data.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_contact_form_data() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form-data/contact-form-data.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/contact-form-data/contact-form-data.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_other_settings' ) ) {
			/**
			 * Function Name: csb_other_settings
			 * Parameter: No
			 * Description: This Function is used for Other Settings.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_other_settings() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/other-settings/other-settings.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/other-settings/other-settings.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_roles_and_capabilities' ) ) {
			/**
			 * Function Name: csb_roles_and_capabilities
			 * Parameter: No
			 * Description: This Function is used to set roles and capabilities.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_roles_and_capabilities() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/queries.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/roles-and-capabilities/roles-and-capabilities.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/roles-and-capabilities/roles-and-capabilities.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
		if ( ! function_exists( 'csb_system_information' ) ) {
			/**
			 * Function Name: csb_system_information
			 * Parameter: No
			 * Description: This Function is used for System Information.
			 * Created On: 2015-06-24 11:30
			 * Created By: Tech Banker Team
			 */
			function csb_system_information() {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/header.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/sidebar.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'views/system-information/system-information.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'views/system-information/system-information.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'includes/footer.php';
				}
			}
		}
	}
}
