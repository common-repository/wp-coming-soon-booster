<?php // @codingStandardsIgnoreLine
/**
 * Plugin Name: WordPress Coming Soon Page, Maintenance Mode & Landing Page
 * Plugin URI: https://tech-banker.com/coming-soon-booster/
 * Description: Coming Soon Booster is a responsive plugin that provides attractive coming soon page with modern design layouts.
 * Author: Tech Banker
 * Author URI: https://tech-banker.com/coming-soon-booster/
 * Version: 3.0.33
 * License: GPLv3
 * Text Domain: wp-coming-soon-booster
 * Domain Path: /languages
 *
 * @package wp-coming-soon-booster-edition
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
/* Constant Declaration */
if ( ! defined( 'COMING_SOON_BOOSTER_FILE' ) ) {
	define( 'COMING_SOON_BOOSTER_FILE', plugin_basename( __FILE__ ) );
}
if ( ! defined( 'COMING_SOON_BOOSTER_DIR_PATH' ) ) {
	define( 'COMING_SOON_BOOSTER_DIR_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'COMING_SOON_BOOSTER_PLUGIN_DIRNAME' ) ) {
	define( 'COMING_SOON_BOOSTER_PLUGIN_DIRNAME', plugin_basename( dirname( __FILE__ ) ) );
}
if ( ! defined( 'COMING_SOON_BOOSTER_LOCAL_TIME' ) ) {
	define( 'COMING_SOON_BOOSTER_LOCAL_TIME', strtotime( date_i18n( 'Y-m-d H:i:s' ) ) );
}

if ( ! defined( 'TECH_BANKER_URL' ) ) {
	define( 'TECH_BANKER_URL', 'https://tech-banker.com' );
}
if ( ! defined( 'COMING_SOON_BOOSTER_URL' ) ) {
	define( 'COMING_SOON_BOOSTER_URL', 'https://tech-banker.com/coming-soon-booster' );
}

if ( ! defined( 'TECH_BANKER_SERVICES_URL' ) ) {
	define( 'TECH_BANKER_SERVICES_URL', 'https://tech-banker.com' );
}
if ( ! defined( 'TECH_BANKER_STATS_URL' ) ) {
	define( 'TECH_BANKER_STATS_URL', 'http://stats.tech-banker-services.org' );
}
if ( ! defined( 'COMING_SOON_BOOSTER_VERSION_NUMBER' ) ) {
	define( 'COMING_SOON_BOOSTER_VERSION_NUMBER', '3.0.33' );
}
ini_set( 'allow_url_fopen', '1' ); // @codingStandardsIgnoreLine

$memory_limit_coming_soon_booster = intval( ini_get( 'memory_limit' ) );
if ( ! extension_loaded( 'suhosin' ) && $memory_limit_coming_soon_booster < 512 ) {
	@ini_set( 'memory_limit', '512M' ); // @codingStandardsIgnoreLine
}

@ini_set( 'max_execution_time', 6000 ); // @codingStandardsIgnoreLine
@ini_set( 'max_input_vars', 10000 ); // @codingStandardsIgnoreLine

if ( ! function_exists( 'install_script_for_coming_soon_booster' ) ) {
	/**
	 * This function is used to create Tables in Database.
	 */
	function install_script_for_coming_soon_booster() {
		global $wpdb;
		if ( is_multisite() ) {
			$blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" ); // WPCS: db call ok, no-cache ok.
			foreach ( $blog_ids as $blog_id ) {
				switch_to_blog( $blog_id ); // @codingStandardsIgnoreLine
				$version = get_option( 'coming_soon_booster_versions_number' );
				if ( $version < '3.0.4' ) {
					if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'lib/class-dbhelper-install-script-coming-soon-booster.php' ) ) {
						include COMING_SOON_BOOSTER_DIR_PATH . 'lib/class-dbhelper-install-script-coming-soon-booster.php';
					}
				}
				restore_current_blog();
			}
		} else {
			$version = get_option( 'coming_soon_booster_versions_number' );
			if ( $version < '3.0.4' ) {
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'lib/class-dbhelper-install-script-coming-soon-booster.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'lib/class-dbhelper-install-script-coming-soon-booster.php';
				}
			}
		}
	}
}

if ( ! function_exists( 'coming_soon_booster' ) ) {
	/**
	 * This function is used to return Parent Table name with prefix.
	 */
	function coming_soon_booster() {
		global $wpdb;
		return $wpdb->prefix . 'coming_soon_booster';
	}
}

if ( ! function_exists( 'coming_soon_booster_meta' ) ) {
	/**
	 * This function is used to return Meta Table name with prefix.
	 */
	function coming_soon_booster_meta() {
		global $wpdb;
		return $wpdb->prefix . 'coming_soon_booster_meta';
	}
}

if ( ! function_exists( 'coming_soon_booster_ip_locations' ) ) {
	/**
	 * This function is used to return ip locations Table name with prefix.
	 */
	function coming_soon_booster_ip_locations() {
		global $wpdb;
		return $wpdb->prefix . 'coming_soon_booster_ip_locations';
	}
}

if ( ! function_exists( 'check_user_roles_for_coming_soon_booster' ) ) {
	/**
	 * This function is used for checking roles of different users.
	 */
	function check_user_roles_for_coming_soon_booster() {
		global $current_user;
		$user = $current_user ? new WP_User( $current_user ) : wp_get_current_user();
		return $user->roles ? $user->roles[0] : false;
	}
}

if ( ! function_exists( 'get_others_capabilities_coming_soon_booster' ) ) {
	/**
	 * This function is used to get all the roles available in WordPress
	 */
	function get_others_capabilities_coming_soon_booster() {
		$user_capabilities = array();
		if ( function_exists( 'get_editable_roles' ) ) {
			foreach ( get_editable_roles() as $role_name => $role_info ) {
				foreach ( $role_info['capabilities'] as $capability => $values ) {
					if ( ! in_array( $capability, $user_capabilities, true ) ) {
						array_push( $user_capabilities, $capability );
					}
				}
			}
		} else {
			$user_capabilities = array(
				'manage_options',
				'edit_plugins',
				'edit_posts',
				'publish_posts',
				'publish_pages',
				'edit_pages',
				'read',
			);
		}
		return $user_capabilities;
	}
}

$version = get_option( 'coming_soon_booster_versions_number' );
if ( $version >= '3.0.4' ) {

	if ( is_admin() ) {
		if ( ! function_exists( 'backend_js_css_for_coming_soon_booster' ) ) {
			/**
			 * This function is used for including backend js and css
			 */
			function backend_js_css_for_coming_soon_booster() {
				$pages_coming_soon_booster = array(
					'csb_wizard_coming_soon_booster',
					'csb_coming_soon_booster',
					'csb_background_settings',
					'csb_loader_settings',
					'csb_logo_settings',
					'csb_seo_settings',
					'csb_favicon_settings',
					'csb_heading_settings',
					'csb_description_settings',
					'csb_layout_button_settings',
					'csb_layout_custom_css',
					'csb_countdown',
					'csb_social_settings',
					'csb_contact_background_settings',
					'csb_contact_heading_settings',
					'csb_contact_description_settings',
					'csb_label_settings',
					'csb_contact_textbox_settings',
					'csb_button_settings',
					'csb_layout_button_settings',
					'csb_message_settings',
					'csb_footer_settings',
					'csb_email_templates',
					'csb_subscription_background_settings',
					'csb_subscription_heading_settings',
					'csb_subscription_description_settings',
					'csb_subscription_textbox_settings',
					'csb_subscription_button_settings',
					'csb_subscription_success_settings',
					'csb_subscription_error_settings',
					'csb_subscription_email_templates',
					'csb_subscribers',
					'csb_contact_form_data',
					'csb_other_settings',
					'csb_roles_and_capabilities',
					'csb_system_information',
				);
				if ( in_array( isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '', $pages_coming_soon_booster, true ) ) { // WPCS: Input var ok, CSRF ok.
					wp_enqueue_script( 'jquery' );
					wp_enqueue_script( 'jquery-ui-datepicker' );
					wp_enqueue_script( 'coming-soon-bootstrap.js', plugins_url( 'assets/global/plugins/custom/js/custom.js', __FILE__ ) );
					wp_enqueue_script( 'coming-soon-jquery.validate.js', plugins_url( 'assets/global/plugins/validation/jquery.validate.js', __FILE__ ) );
					wp_enqueue_script( 'coming-soon-jquery.datatables.js', plugins_url( 'assets/global/plugins/datatables/media/js/jquery.datatables.js', __FILE__ ) );
					wp_enqueue_script( 'coming-soon-colpick.js', plugins_url( 'assets/global/plugins/colorpicker/colpick.js', __FILE__ ) );
					wp_enqueue_script( 'coming-soon-jquery.fngetfilterednodes.js', plugins_url( 'assets/global/plugins/datatables/media/js/fngetfilterednodes.js', __FILE__ ) );
					wp_enqueue_script( 'coming-soon-toastr.js', plugins_url( 'assets/global/plugins/toastr/toastr.js', __FILE__ ) );
					wp_enqueue_script( 'coming-soon-buttons.html5.js', plugins_url( 'assets/global/plugins/datatables/media/js/buttons.html5.js', __FILE__ ) );
					wp_enqueue_script( 'coming-soon-datatables.buttons.js', plugins_url( 'assets/global/plugins/datatables/media/js/datatables.buttons.js', __FILE__ ) );
					wp_enqueue_script( 'coming-soon-jszip.min.js', plugins_url( 'assets/global/plugins/datatables/media/js/jszip.min.js', __FILE__ ) );

					wp_enqueue_style( 'coming-soon-simple-line-icons.css', plugins_url( 'assets/global/plugins/icons/icons.css', __FILE__ ) );
					wp_enqueue_style( 'coming-soon-components.css', plugins_url( 'assets/global/css/components.css', __FILE__ ) );
					if ( is_rtl() ) {
						wp_enqueue_style( 'coming-soon-bootstrap.css', plugins_url( 'assets/global/plugins/custom/css/custom-rtl.css', __FILE__ ) );
						wp_enqueue_style( 'coming-soon-layout.css', plugins_url( 'assets/admin/layout/css/layout-rtl.css', __FILE__ ) );
						wp_enqueue_style( 'coming-soon-custom.css', plugins_url( 'assets/admin/layout/css/tech-banker-custom-rtl.css', __FILE__ ) );
					} else {
						wp_enqueue_style( 'coming-soon-bootstrap.css', plugins_url( 'assets/global/plugins/custom/css/custom.css', __FILE__ ) );
						wp_enqueue_style( 'coming-soon-layout.css', plugins_url( 'assets/admin/layout/css/layout.css', __FILE__ ) );
						wp_enqueue_style( 'coming-soon-custom.css', plugins_url( 'assets/admin/layout/css/tech-banker-custom.css', __FILE__ ) );
					}
					wp_enqueue_style( 'coming-soon.css', plugins_url( 'assets/admin/layout/css/coming-soon-booster.css', __FILE__ ) );
					wp_enqueue_style( 'coming-soon-default.css', plugins_url( 'assets/admin/layout/css/themes/default.css', __FILE__ ) );
					wp_enqueue_style( 'coming-soon-toastr.min.css', plugins_url( 'assets/global/plugins/toastr/toastr.css', __FILE__ ) );
					wp_enqueue_style( 'coming-soon-jquery-ui.css', plugins_url( 'assets/global/plugins/datepicker/jquery-ui.css', __FILE__ ), false, '2.0', false );
					wp_enqueue_style( 'coming-soon-datatables.foundation.css', plugins_url( 'assets/global/plugins/datatables/media/css/datatables.foundation.css', __FILE__ ) );
					wp_enqueue_style( 'coming-soon-colpick.css', plugins_url( 'assets/global/plugins/colorpicker/colpick.css', __FILE__ ) );
				}
			}
		}
		add_action( 'admin_enqueue_scripts', 'backend_js_css_for_coming_soon_booster' );
	}

	if ( ! function_exists( 'get_users_capabilities_for_coming_soon_booster' ) ) {
		/**
		 * This function is used to get users capabilities.
		 */
		function get_users_capabilities_for_coming_soon_booster() {
			global $wpdb;
			$capabilities              = $wpdb->get_var(
				$wpdb->prepare(
					'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s', 'roles_and_capabilities'
				)
			);// WPCS: db call ok, no-cache ok.
			$core_roles                = array(
				'manage_options',
				'edit_plugins',
				'edit_posts',
				'publish_posts',
				'publish_pages',
				'edit_pages',
				'read',
			);
			$unserialized_capabilities = maybe_unserialize( $capabilities );
			return isset( $unserialized_capabilities['capabilities'] ) ? $unserialized_capabilities['capabilities'] : $core_roles;
		}
	}
	if ( ! function_exists( 'coming_soon_booster_settings_action_links' ) ) {
		/**
		 * This function is used to add Settings link.
		 *
		 * @param array $action .
		 */
		function coming_soon_booster_settings_action_links( $action ) {
			global $wpdb;
			$user_role_permission = get_users_capabilities_for_coming_soon_booster();
			$settings_link        = '<a href = "' . admin_url( 'admin.php?page=csb_coming_soon_booster' ) . '"> Settings </a>';
			array_unshift( $action, $settings_link );
			return $action;
		}
	}
	if ( ! function_exists( 'side_bar_menu_for_coming_soon_booster' ) ) {
		/**
		 * This function is used to create Admin sidebar menus.
		 */
		function side_bar_menu_for_coming_soon_booster() {
			global $wpdb, $current_user;
			$user_role_permission = get_users_capabilities_for_coming_soon_booster();
			if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'lib/sidebar-menu.php' ) ) {
				include_once COMING_SOON_BOOSTER_DIR_PATH . 'lib/sidebar-menu.php';
			}
		}
	}

	if ( ! function_exists( 'frontend_mode_for_coming_soon_booster' ) ) {
		/**
		 * This function is used for enabling/disabling frontend.
		 */
		function frontend_mode_for_coming_soon_booster() {
			global $wpdb;
			$plugin_mode_data = $wpdb->get_var(
				$wpdb->prepare(
					'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s', 'plugin_mode_setting_data'
				)
			);// WPCS: db call ok, no-cache ok.

			$plugin_mode_data_unserialize = maybe_unserialize( $plugin_mode_data );

			if ( 'coming_soon_mode' === $plugin_mode_data_unserialize['default_mode'] || 'maintenance_mode' === $plugin_mode_data_unserialize['default_mode'] ) {
				if ( ! is_user_logged_in() ) {
					if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'theme/includes/queries.php' ) ) {
						include_once COMING_SOON_BOOSTER_DIR_PATH . 'theme/includes/queries.php';
					}
					if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'theme/index.php' ) ) {
						include_once COMING_SOON_BOOSTER_DIR_PATH . 'theme/index.php';
					}
				}
			}
		}
	}

	if ( ! function_exists( 'frontend_preview_for_coming_soon_booster' ) ) {
		/**
		 * This function is used for viewing preview.
		 */
		function frontend_preview_for_coming_soon_booster() {
			global $wpdb;
			if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'theme/includes/queries.php' ) ) {
				include_once COMING_SOON_BOOSTER_DIR_PATH . 'theme/includes/queries.php';
			}
			if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'theme/index.php' ) ) {
				include_once COMING_SOON_BOOSTER_DIR_PATH . 'theme/index.php';
			}
		}
	}

	if ( ! function_exists( 'helper_class_for_coming_soon_booster' ) ) {
		/**
		 * This function is used to create Class and Function to perform operations.
		 */
		function helper_class_for_coming_soon_booster() {
			global $wpdb, $current_user;
			$user_role_permission = get_users_capabilities_for_coming_soon_booster();
			if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'lib/class-dbhelper-coming-soon-booster.php' ) ) {
				include_once COMING_SOON_BOOSTER_DIR_PATH . 'lib/class-dbhelper-coming-soon-booster.php';
			}
		}
	}

	if ( ! function_exists( 'ajax_library_for_coming_soon_booster_backend' ) ) {
		/**
		 * This function is used to Register Ajax for backend.
		 */
		function ajax_library_for_coming_soon_booster_backend() {
			global $wpdb, $current_user;
			$user_role_permission = get_users_capabilities_for_coming_soon_booster();
			if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
				include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
			}
			if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'lib/action-library.php' ) ) {
				include_once COMING_SOON_BOOSTER_DIR_PATH . 'lib/action-library.php';
			}
		}
	}

	if ( ! function_exists( 'ajax_library_for_coming_soon_booster_frontend' ) ) {
		/**
		 * This function is used to Register Ajax for frontend.
		 */
		function ajax_library_for_coming_soon_booster_frontend() {
			global $wpdb;
			if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'theme/lib/class-dbhelper-coming-soon-mode.php' ) ) {
				include_once COMING_SOON_BOOSTER_DIR_PATH . 'theme/lib/class-dbhelper-coming-soon-mode.php';
			}
		}
	}

	if ( ! function_exists( 'admin_bar_menu_for_coming_soon_booster' ) ) {
		/**
		 * This function is used for creating admin bar menu.
		 */
		function admin_bar_menu_for_coming_soon_booster() {
			global $wpdb, $current_user, $wp_admin_bar;
			$role_capabilities = $wpdb->get_var(
				$wpdb->prepare(
					'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s', 'roles_and_capabilities_data'
				)
			); // WPCS: db call ok, no-cache ok.

			$role_capabilities_top_bar_menu_unserialize = maybe_unserialize( $role_capabilities );

			if ( 'enable' === $role_capabilities_top_bar_menu_unserialize['show_coming_soon_booster_top_bar_menu'] ) {
				$user_role_permission = get_users_capabilities_for_coming_soon_booster();
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php' ) ) {
					include COMING_SOON_BOOSTER_DIR_PATH . 'includes/translations.php';
				}
				if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'lib/admin-bar-menu.php' ) ) {
					include_once COMING_SOON_BOOSTER_DIR_PATH . 'lib/admin-bar-menu.php';
				}
			}
			$plugin_mode_data = $wpdb->get_var(
				$wpdb->prepare(
					'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s', 'plugin_mode_setting_data'
				)
			); // WPCS: db call ok, no-cache ok.

			$admin_bar_menu = maybe_unserialize( $plugin_mode_data );

			if ( 'coming_soon_mode' === $admin_bar_menu['default_mode'] ) {
				$wp_admin_bar->add_menu(
					array(
						'id'     => 'coming_soon_booster_mode',
						'href'   => admin_url() . '/admin.php?page=csb_coming_soon_booster',
						'parent' => 'top-secondary',
						'title'  => __( 'Coming Soon Mode Active', 'wp-coming-soon-booster' ),
						'meta'   => array( 'class' => 'coming-soon-mode-active' ),
					)
				);
			} elseif ( 'maintenance_mode' === $admin_bar_menu['default_mode'] ) {
				$wp_admin_bar->add_menu(
					array(
						'id'     => 'coming_soon_booster_mode',
						'href'   => admin_url() . '/admin.php?page=csb_coming_soon_booster',
						'parent' => 'top-secondary',
						'title'  => __( 'Maintenance Mode Active', 'wp-coming-soon-booster' ),
						'meta'   => array( 'class' => 'maintenance-mode-active' ),
					)
				);
			}
		}
	}

	if ( ! function_exists( 'plugin_load_textdomain_coming_soon_booster' ) ) {
		/**
		 * This function is used to load the plugin's translated strings.
		 */
		function plugin_load_textdomain_coming_soon_booster() {
			if ( function_exists( 'load_plugin_textdomain' ) ) {
				load_plugin_textdomain( 'wp-coming-soon-booster', false, COMING_SOON_BOOSTER_PLUGIN_DIRNAME . '/languages' );
			}
		}
	}

	if ( ! function_exists( 'admin_function_coming_soon_booster' ) ) {
		/**
		 * This function is used for calling admin_init functions.
		 */
		function admin_function_coming_soon_booster() {
			install_script_for_coming_soon_booster();
			helper_class_for_coming_soon_booster();
		}
	}

	if ( ! function_exists( 'deactivation_function_for_coming_soon_booster' ) ) {
		/**
		 * This function is used for executing the code on deactivation.
		 */
		function deactivation_function_for_coming_soon_booster() {
			delete_option( 'coming-soon-booster-welcome-page' );
		}
	}


	/* Hook */
	/**
	 * This hook contains all admin_init functions.
	 */

	add_action( 'admin_init', 'admin_function_coming_soon_booster' );

	/**
	 * This hook is used to calling the function of ajax register for backend.
	 */

	add_action( 'wp_ajax_coming_soon_booster_backend', 'ajax_library_for_coming_soon_booster_backend' );

	/**
	 * This hook is used to calling the function of ajax register for frontend.
	 */

	add_action( 'wp_ajax_coming_soon_booster_frontend', 'ajax_library_for_coming_soon_booster_frontend' );
	add_action( 'wp_ajax_nopriv_coming_soon_booster_frontend', 'ajax_library_for_coming_soon_booster_frontend' );

	/**
	 * This hook is used for calling the function of sidebar menu in multisite case.
	 */
	add_action( 'network_admin_menu', 'side_bar_menu_for_coming_soon_booster' );

	/**
	 * This hook is used for calling the function of sidebar menus.
	 */

	add_action( 'admin_menu', 'side_bar_menu_for_coming_soon_booster' );

	/**
	 * This hook is used for calling the function of top bar menu.
	 */

	add_action( 'admin_bar_menu', 'admin_bar_menu_for_coming_soon_booster', 100 );

	/**
	 * This hook is used to calling the function of show frontend in Coming soon Booster.
	 */

	add_action( 'template_redirect', 'frontend_mode_for_coming_soon_booster' );

	/**
	 * This is used to calling the function for showing live preview.
	 */

	if ( isset( $_REQUEST['live_preview_page'] ) ) { // WPCS: CSRF ok, Input var ok.
		frontend_preview_for_coming_soon_booster();
	}

	/**
	 * This hook is used for calling the function of languages.
	 */

	add_action( 'plugins_loaded', 'plugin_load_textdomain_coming_soon_booster' );

	/**
	 * This hook is used to sets the deactivation hook for a plugin.
	 */

	register_deactivation_hook( __FILE__, 'deactivation_function_for_coming_soon_booster' );
	/**
	 * This hook is used for create link for Plugin Settings.
	 */

	add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'coming_soon_booster_settings_action_links' );
}

/**
 * This hook is used for calling the function of install script.
 */

register_activation_hook( __FILE__, 'install_script_for_coming_soon_booster' );

/**
 * This hook used for calling the function of install script.
 */

add_action( 'admin_init', 'install_script_for_coming_soon_booster' );

if ( ! function_exists( 'plugin_activate_coming_soon_booster' ) ) {
	/**
	 * This function is used to add option on plugin activation.
	 */
	function plugin_activate_coming_soon_booster() {
		add_option( 'coming_soon_booster_do_activation_redirect', true );
	}
}

if ( ! function_exists( 'coming_soon_booster_redirect' ) ) {
	/**
	 * This function is used to redirect to email setup.
	 */
	function coming_soon_booster_redirect() {
		if ( get_option( 'coming_soon_booster_do_activation_redirect', false ) ) {
			delete_option( 'coming_soon_booster_do_activation_redirect' );
			wp_safe_redirect( admin_url( 'admin.php?page=csb_coming_soon_booster' ) );
			exit;
		}
	}
}
register_activation_hook( __FILE__, 'plugin_activate_coming_soon_booster' );
add_action( 'admin_init', 'coming_soon_booster_redirect' );

/**
 * This function is used to create the object of admin notices.
 */
function coming_soon_booster_admin_notice_class() {
	global $wpdb;
	/**
	 * This class is used to create admin notices.
	 */
	class Coming_Soon_Booster_Admin_Notices {
		/**
		 * The version of this plugin.
		 *
		 * @access   public
		 * @var      string    $config  .
		 */
		public $config;
		/**
		 * The version of this plugin.
		 *
		 * @access   public
		 * @var      integer    $notice_spam  .
		 */
		public $notice_spam = 0;
		/**
		 * The maximum notice spam.
		 *
		 * @access   public
		 * @var      integer    $notice_spam_max  .
		 */
		public $notice_spam_max = 2;

		/**
		 * Public Constructor
		 *
		 * @param array $config .
		 */
		public function __construct( $config = array() ) {
			// Runs the admin notice ignore function incase a dismiss button has been clicked.
			add_action( 'admin_init', array( $this, 'csb_admin_notice_ignore' ) );
			// Runs the admin notice temp ignore function incase a temp dismiss link has been clicked.
			add_action( 'admin_init', array( $this, 'csb_admin_notice_temp_ignore' ) );
			add_action( 'admin_notices', array( $this, 'csb_display_admin_notices' ) );
		}

		/**
		 * Checks to ensure notices aren't disabled and the user has the correct permissions.
		 */
		public function csb_admin_notices() {
			$settings = get_option( 'csb_admin_notice' );
			if ( ! isset( $settings['disable_admin_notices'] ) || ( isset( $settings['disable_admin_notices'] ) && 0 === $settings['disable_admin_notices'] ) ) {
				if ( current_user_can( 'manage_options' ) ) {
					return true;
				}
			}
			return false;
		}

		/**
		 * Primary notice function that can be called from an outside function sending necessary variables.
		 *
		 * @param string $admin_notices .
		 */
		public function change_admin_notice_coming_soon_booster( $admin_notices ) {
			// Check options.
			if ( ! $this->csb_admin_notices() ) {
				return false;
			}
			foreach ( $admin_notices as $slug => $admin_notice ) {
				// Call for spam protection.
				if ( $this->csb_anti_notice_spam() ) {
					return false;
				}

				// Check for proper page to display on.
				if ( isset( $admin_notices[ $slug ]['pages'] ) && is_array( $admin_notices[ $slug ]['pages'] ) ) {
					if ( ! $this->csb_admin_notice_pages( $admin_notices[ $slug ]['pages'] ) ) {
						return false;
					}
				}

				// Check for required fields.
				if ( ! $this->csb_required_fields( $admin_notices[ $slug ] ) ) {

					// Get the current date then set start date to either passed value or current date value and add interval.
					$current_date = current_time( 'm/d/Y' );
					$start        = ( isset( $admin_notices[ $slug ]['start'] ) ? $admin_notices[ $slug ]['start'] : $current_date );
					$start        = date( 'm/d/Y' );
					$interval     = ( isset( $admin_notices[ $slug ]['int'] ) ? $admin_notices[ $slug ]['int'] : 0 );
					$date         = strtotime( '+' . $interval . ' days', strtotime( $start ) );
					$start        = date( 'm/d/Y', $date );
					// This is the main notices storage option.
					$admin_notices_option = get_option( 'csb_admin_notice', array() );
					// Check if the message is already stored and if so just grab the key otherwise store the message and its associated date information.
					if ( ! array_key_exists( $slug, $admin_notices_option ) ) {
						$admin_notices_option[ $slug ]['start'] = date( 'm/d/Y' );
						$admin_notices_option[ $slug ]['int']   = $interval;
						update_option( 'csb_admin_notice', $admin_notices_option );
					}

					// Sanity check to ensure we have accurate information.
					// New date information will not overwrite old date information.
					$admin_display_check    = ( isset( $admin_notices_option[ $slug ]['dismissed'] ) ? $admin_notices_option[ $slug ]['dismissed'] : 0 );
					$admin_display_start    = ( isset( $admin_notices_option[ $slug ]['start'] ) ? $admin_notices_option[ $slug ]['start'] : $start );
					$admin_display_interval = ( isset( $admin_notices_option[ $slug ]['int'] ) ? $admin_notices_option[ $slug ]['int'] : $interval );
					$admin_display_msg      = ( isset( $admin_notices[ $slug ]['msg'] ) ? $admin_notices[ $slug ]['msg'] : '' );
					$admin_display_title    = ( isset( $admin_notices[ $slug ]['title'] ) ? $admin_notices[ $slug ]['title'] : '' );
					$admin_display_link     = ( isset( $admin_notices[ $slug ]['link'] ) ? $admin_notices[ $slug ]['link'] : '' );
					$output_css             = false;

					// Ensure the notice hasn't been hidden and that the current date is after the start date.
					if ( 0 === $admin_display_check && strtotime( $admin_display_start ) <= strtotime( $current_date ) ) {

						// Get remaining query string.
						$query_str = ( isset( $admin_notices[ $slug ]['later_link'] ) ? $admin_notices[ $slug ]['later_link'] : esc_url( add_query_arg( 'csb_admin_notice_ignore', $slug ) ) );
						if ( strpos( $slug, 'promo' ) === false ) {
							// Admin notice display output.
							echo '<div class="update-nag csb-admin-notice" style="width:95%!important;">
										<div></div>
										<strong><p>' . $admin_display_title . '</p></strong>
										<strong><p style="font-size:14px !important">' . $admin_display_msg . '</p></strong>
										<strong><ul>' . $admin_display_link . '</ul></strong>
										</div>';// WPCS: XSS ok.
						} else {
							echo '<div class="admin-notice-promo">';
							echo $admin_display_msg;// WPCS: XSS ok.
							echo '<ul class="notice-body-promo blue">
										' . $admin_display_link . '
										</ul>';// WPCS: XSS ok.
							echo '</div>';
						}
						$this->notice_spam += 1;
						$output_css         = true;
					}
				}
			}
		}

		/**
		 * Spam protection check
		 */
		public function csb_anti_notice_spam() {
			if ( $this->notice_spam >= $this->notice_spam_max ) {
				return true;
			}
			return false;
		}

		/**
		 * Ignore function that gets ran at admin init to ensure any messages that were dismissed get marked
		 */
		public function csb_admin_notice_ignore() {
			// If user clicks to ignore the notice, update the option to not show it again.
			if ( isset( $_GET['csb_admin_notice_ignore'] ) ) { // WPCS: CSRF ok, input var ok.
				$admin_notices_option = get_option( 'csb_admin_notice', array() );
				$admin_notices_option[ $_GET['csb_admin_notice_ignore'] ]['dismissed'] = 1; // WPCS: CSRF ok, input var ok, sanitization ok.
				update_option( 'csb_admin_notice', $admin_notices_option );
				$query_str = remove_query_arg( 'csb_admin_notice_ignore' );
				wp_safe_redirect( $query_str );
				exit;
			}
		}

		/**
		 * Temp Ignore function that gets ran at admin init to ensure any messages that were temp dismissed get their start date changed.
		 */
		public function csb_admin_notice_temp_ignore() {
			// If user clicks to temp ignore the notice, update the option to change the start date - default interval of 7 days.
			if ( isset( $_GET['csb_admin_notice_temp_ignore'] ) ) { // WPCS: Input var ok, CSRF ok.
				$admin_notices_option = get_option( 'csb_admin_notice', array() );
				$current_date         = current_time( 'm/d/Y' );
				$date_array           = explode( '/', $current_date );
				$interval             = ( isset( $_GET['int'] ) ? wp_unslash( intval( $_GET['int'] ) ) : 7 ); // WPCS: CSRF ok, input var ok.
				$date                 = strtotime( '+' . $interval . ' days', strtotime( $current_date ) );
				$new_start            = date( 'm/d/Y', $date );
				$admin_notices_option[ $_GET['csb_admin_notice_temp_ignore'] ]['start']     = $new_start; // WPCS: CSRF ok, input var ok, sanitization ok.
				$admin_notices_option[ $_GET['csb_admin_notice_temp_ignore'] ]['dismissed'] = 0; // WPCS: CSRF ok, input var ok, sanitization ok.
				update_option( 'csb_admin_notice', $admin_notices_option );
				$query_str = remove_query_arg( array( 'csb_admin_notice_temp_ignore', 'int' ) );
				wp_safe_redirect( $query_str );
				exit;
			}
		}

		/**
		 * Display admin notice on pages.
		 *
		 * @param array $pages .
		 */
		public function csb_admin_notice_pages( $pages ) {
			foreach ( $pages as $key => $page ) {
				if ( is_array( $page ) ) {
					if ( isset( $_GET['page'] ) && $_GET['page'] === $page[0] && isset( $_GET['tab'] ) && $_GET['tab'] === $page[1] ) { // WPCS: CSRF ok, input var ok.
						return true;
					}
				} else {
					if ( 'all' === $page ) {
						return true;
					}
					if ( get_current_screen()->id === $page ) {
						return true;
					}
					if ( isset( $_GET['page'] ) && $_GET['page'] === $page ) { // WPCS: CSRF ok, input var ok.
						return true;
					}
				}
				return false;
			}
		}

		/**
		 * Required fields check.
		 *
		 * @param array $fields .
		 */
		public function csb_required_fields( $fields ) {
			if ( ! isset( $fields['msg'] ) || ( isset( $fields['msg'] ) && empty( $fields['msg'] ) ) ) {
				return true;
			}
			if ( ! isset( $fields['title'] ) || ( isset( $fields['title'] ) && empty( $fields['title'] ) ) ) {
				return true;
			}
			return false;
		}
		/**
		 * Display Content in admin notice.
		 */
		public function csb_display_admin_notices() {
			$two_week_review_ignore = add_query_arg( array( 'csb_admin_notice_ignore' => 'two_week_review' ) );
			$two_week_review_temp   = add_query_arg(
				array(
					'csb_admin_notice_temp_ignore' => 'two_week_review',
					'int'                          => 7,
				)
			);

			$notices['two_week_review'] = array(
				'title'      => __( 'Leave A Coming Soon Booster Review?', 'wp-coming-soon-booster' ),
				'msg'        => __( 'We love and care about you. Coming Soon Booster Team is putting our maximum efforts to provide you the best functionalities.<br> We would really appreciate if you could spend a couple of seconds to give a Nice Review to the plugin for motivating us!', 'wp-coming-soon-booster' ),
				'link'       => '<span class="dashicons dashicons-external coming-soon-booster-admin-notice"></span><span class="coming-soon-booster-admin-notice"><a href="https://wordpress.org/support/plugin/wp-coming-soon-booster/reviews/?filter=5" target="_blank" class="coming-soon-booster-admin-notice-link">' . __( 'Sure! I\'d love to!', 'wp-coming-soon-booster' ) . '</a></span>
												<span class="dashicons dashicons-smiley coming-soon-booster-admin-notice"></span><span class="coming-soon-booster-admin-notice"><a href="' . $two_week_review_ignore . '" class="coming-soon-booster-admin-notice-link"> ' . __( 'I\'ve already left a review', 'wp-coming-soon-booster' ) . '</a></span>
												<span class="dashicons dashicons-calendar-alt coming-soon-booster-admin-notice"></span><span class="coming-soon-booster-admin-notice"><a href="' . $two_week_review_temp . '" class="coming-soon-booster-admin-notice-link">' . __( 'Maybe Later', 'wp-coming-soon-booster' ) . '</a></span>',
				'later_link' => $two_week_review_temp,
				'int'        => 7,
			);

			$this->change_admin_notice_coming_soon_booster( $notices );
		}

	}

	$plugin_info_coming_soon_booster = new Coming_Soon_Booster_Admin_Notices();
}

add_action( 'init', 'coming_soon_booster_admin_notice_class' );
/**
 * This function is used to add Popup on deactivation.
 */
function add_popup_on_deactivation_coming_soon_booster() {
	global $wpdb;
	/**
	 * This class is used to add Pop on deactivation.
	 */
	class Coming_Soon_Booster_Deactivation_Form { // @codingStandardsIgnoreLine

		/**
		 * Public Constructor
		 */
		function __construct() {
			add_action( 'wp_ajax_post_user_feedback_coming_soon_booster', array( $this, 'post_user_feedback_coming_soon_booster' ) );
			global $pagenow;
			if ( 'plugins.php' === $pagenow ) {
					add_action( 'admin_enqueue_scripts', array( $this, 'feedback_form_js_coming_soon_booster' ) );
					add_action( 'admin_head', array( $this, 'add_form_layout_coming_soon_booster' ) );
					add_action( 'admin_footer', array( $this, 'add_deactivation_dialog_form_coming_soon_booster' ) );
			}
		}
		/**
		 * Add css and js files.
		 */
		function feedback_form_js_coming_soon_booster() {
			wp_enqueue_style( 'wp-jquery-ui-dialog' );
			wp_register_script( 'wp-coming-soon-booster-post-feedback', plugins_url( 'assets/global/plugins/deactivation/deactivate-popup.js', __FILE__ ), array( 'jquery', 'jquery-ui-core', 'jquery-ui-dialog' ), false, true );
			wp_localize_script( 'wp-coming-soon-booster-post-feedback', 'post_feedback', array( 'admin_ajax' => admin_url( 'admin-ajax.php' ) ) );
			wp_enqueue_script( 'wp-coming-soon-booster-post-feedback' );
		}
		/**
		 * Add css and js files.
		 */
		function post_user_feedback_coming_soon_booster() {
			$coming_soon_booster_deactivation_reason = isset( $_POST['reason'] ) ? sanitize_text_field( wp_unslash( $_POST['reason'] ) ) : ''; // WPCS: Input var ok, CSRF ok.
			$plugin_info_coming_soon_booster         = new Plugin_Info_Coming_Soon_Booster();
			global $wp_version, $wpdb;
			$url              = TECH_BANKER_STATS_URL . '/wp-admin/admin-ajax.php';
			$type             = get_option( 'coming-soon-booster-welcome-page' );
			$user_admin_email = get_option( 'coming-soon-booster-admin_email' );
			$theme_details    = array();
			if ( $wp_version >= 3.4 ) {
				$active_theme                   = wp_get_theme();
				$theme_details['theme_name']    = strip_tags( $active_theme->name );
				$theme_details['theme_version'] = strip_tags( $active_theme->version );
				$theme_details['author_url']    = strip_tags( $active_theme->{'Author URI'} );
			}
			$plugin_stat_data                     = array();
			$plugin_stat_data['plugin_slug']      = 'wp-coming-soon-booster';
			$plugin_stat_data['reason']           = $coming_soon_booster_deactivation_reason;
			$plugin_stat_data['type']             = 'standard_edition';
			$plugin_stat_data['version_number']   = COMING_SOON_BOOSTER_VERSION_NUMBER;
			$plugin_stat_data['status']           = $type;
			$plugin_stat_data['event']            = 'de-activate';
			$plugin_stat_data['domain_url']       = site_url();
			$plugin_stat_data['wp_language']      = defined( 'WPLANG' ) && WPLANG ? WPLANG : get_locale();
			$plugin_stat_data['email']            = false !== $user_admin_email ? $user_admin_email : get_option( 'admin_email' );
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
				die( 'success' );
		}
		/**
		 * Add form layout of deactivation form.
		 */
		function add_form_layout_coming_soon_booster() {
			?>
			<style type="text/css">
					.coming-soon-booster-feedback-form .ui-dialog-buttonset {
						float: none !important;
					}
					#coming-soon-booster-feedback-dialog-continue,#coming-soon-booster-feedback-dialog-skip {
						float: right;
					}
					#coming-soon-booster-feedback-cancel{
						float: left;
					}
					#coming-soon-booster-feedback-content p {
						font-size: 1.1em;
					}
					.coming-soon-booster-feedback-form .ui-icon {
						display: none;
					}
					#coming-soon-booster-feedback-dialog-continue.coming-soon-booster-ajax-progress .ui-icon {
						text-indent: inherit;
						display: inline-block !important;
						vertical-align: middle;
						animation: rotate 2s infinite linear;
					}
					#coming-soon-booster-feedback-dialog-continue.coming-soon-booster-ajax-progress .ui-button-text {
						vertical-align: middle;
					}
					@keyframes rotate {
						0%    { transform: rotate(0deg); }
						100%  { transform: rotate(360deg); }
					}
			</style>
			<?php
		}
		/**
		 * Add deactivation dialog form.
		 */
		function add_deactivation_dialog_form_coming_soon_booster() {
			?>
			<div id="coming-soon-booster-feedback-content" style="display: none;">
			<p style="margin-top:-5px"><?php echo esc_attr( __( 'We feel guilty when anyone stop using Coming Soon Booster.', 'wp-coming-soon-booster' ) ); ?></p>
						<p><?php echo esc_attr( __( 'If Coming Soon Booster isn\'t working for you, others also may not.', 'wp-coming-soon-booster' ) ); ?></p>
						<p><?php echo esc_attr( __( 'We would love to hear your feedback about what went wrong.', 'wp-coming-soon-booster' ) ); ?></p>
						<p><?php echo esc_attr( __( 'We would like to help you in fixing the issue.', 'wp-coming-soon-booster' ) ); ?></p>
						<p><?php echo esc_attr( __( 'If you click Continue, some data would be sent to our servers for Compatiblity Testing Purposes.', 'wp-coming-soon-booster' ) ); ?></p>
						<p><?php echo esc_attr( __( 'If you Skip, no data would be shared with our servers.', 'wp-coming-soon-booster' ) ); ?></p>
			<form>
				<?php wp_nonce_field(); ?>
				<ul id="coming-soon-booster-deactivate-reasons">
					<li class="coming-soon-booster-reason coming-soon-booster-custom-input">
						<label>
							<span><input value="0" type="radio" name="reason"/></span>
							<span><?php echo esc_attr( __( 'The Plugin didn\'t work', 'wp-coming-soon-booster' ) ); ?></span>
						</label>
					</li>
					<li class="coming-soon-booster-reason coming-soon-booster-custom-input">
						<label>
							<span><input value="1" type="radio" name="reason" /></span>
							<span><?php echo esc_attr( __( 'I found a better Plugin', 'wp-coming-soon-booster' ) ); ?></span>
						</label>
					</li>
					<li class="coming-soon-booster-reason">
						<label>
							<span><input value="2" type="radio" name="reason" checked /></span>
							<span><?php echo esc_attr( __( 'It\'s a temporary deactivation. I\'m just debugging an issue.', 'wp-coming-soon-booster' ) ); ?></span>
						</label>
					</li>
					<li class="coming-soon-booster-reason coming-soon-booster-custom-input">
						<label>
							<span><input value="3" type="radio" name="reason" /></span>
									<span><a href="https://wordpress.org/support/plugin/wp-coming-soon-booster" target="_blank"><?php echo esc_attr( __( 'Open a Support Ticket for me.', 'wp-coming-soon-booster' ) ); ?></a></span>
						</label>
					</li>
				</ul>
			</form>
		</div>
			<?php
		}
	}
	$plugin_deactivation_details = new Coming_Soon_Booster_Deactivation_Form();
}
/**
 * This function is used to create link for Pro Editions.
 *
 * @param array $plugin_link .
 */
function coming_soon_booster_action_links( $plugin_link ) {
	$plugin_link[] = '<a href="https://tech-banker.com/coming-soon-booster/pricing/" style="color: red; font-weight: bold;" target="_blank">Go Pro!</a>';
	return $plugin_link;
}
add_action( 'plugins_loaded', 'add_popup_on_deactivation_coming_soon_booster' );
/**
 * This function is used to add link on deactivation.
 *
 * @param array $links .
 */
function insert_deactivate_link_id_coming_soon_booster( $links ) {
	if ( ! is_multisite() ) {
		$links['deactivate'] = str_replace( '<a', '<a id="coming-soon-booster-plugin-disable-link"', $links['deactivate'] );
	}
	return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'insert_deactivate_link_id_coming_soon_booster', 10, 2 );
/**
 * This hook is used for create link for premium Editions.
 */
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'coming_soon_booster_action_links' );
