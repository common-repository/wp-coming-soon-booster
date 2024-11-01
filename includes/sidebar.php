<?php
/**
 * This file is used for display sidebar menu.
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
		?>
		<div class="page-sidebar-wrapper-tech-banker">
			<div class="page-sidebar-tech-banker navbar-collapse collapse">
				<div class="sidebar-menu-tech-banker">
					<ul class="page-sidebar-menu-tech-banker" data-slide-speed="200">
						<div class="sidebar-search-wrapper" style="padding:20px;text-align:center">
							<a class="plugin-logo" href="<?php echo esc_attr( COMING_SOON_BOOSTER_URL ); ?>" target="_blank">
								<img src="<?php echo esc_attr( plugins_url( 'assets/global/img/logo.png', dirname( __FILE__ ) ) ); ?>" alt ="Coming Soon Booster">
							</a>
						</div>
						<li id="ux_li_plugin_mode">
							<a href="admin.php?page=csb_coming_soon_booster">
								<i class="icon-custom-puzzle"></i>
								<span>
									<?php echo esc_attr( $csb_plugin_mode_label ); ?>
								</span>
							</a>
						</li>
						<li id="ux_li_layout_settings">
						<a href="javascript:;">
							<i class="icon-custom-screen-tablet"></i>
							<span>
								<?php echo esc_attr( $csb_layout_settings_label ); ?>
							</span>
						</a>
						<ul class="sub-menu">
							<li id="ux_li_loader_settings">
								<a href="admin.php?page=csb_loader_settings">
									<i class="icon-custom-reload"></i>
									<span>
										<?php echo esc_attr( $csb_loader_settings_label ); ?>
									</span>
								</a>
							</li>
							<li id="ux_li_background_settings">
								<a href="admin.php?page=csb_background_settings">
									<i class="icon-custom-picture"></i>
									<span>
										<?php echo esc_attr( $csb_background_settings_label ); ?>
									</span>
								</a>
							</li>
							<li id="ux_li_logo_settings">
								<a href="admin.php?page=csb_logo_settings">
									<i class="icon-custom-settings"></i>
									<span>
										<?php echo esc_attr( $csb_layout_logo_settings_label ); ?>
									</span>
								</a>
							</li>
							<li id="ux_li_heading_settings">
								<a href="admin.php?page=csb_heading_settings">
									<i class="icon-custom-pencil"></i>
									<span>
										<?php echo esc_attr( $csb_heading_settings_label ); ?>
									</span>
								</a>
							</li>
							<li id="ux_li_description_settings">
								<a href="admin.php?page=csb_description_settings">
									<i class="icon-custom-note"></i>
									<span>
										<?php echo esc_attr( $csb_description_settings_label ); ?>
									</span>
								</a>
							</li>
							<li id="ux_li_button_settings">
								<a href="admin.php?page=csb_layout_button_settings">
									<i class="icon-custom-cursor-move"></i>
									<span>
										<?php echo esc_attr( $csb_layout_settings_button_settings_label ); ?>
									</span>
								</a>
							</li>
							<li id="ux_li_favicon_settings">
								<a href="admin.php?page=csb_favicon_settings">
									<i class="icon-custom-picture"></i>
									<span>
										<?php echo esc_attr( $csb_layout_favicon_settings_label ); ?>
									</span>
									<span class='badge'>Pro</span>
								</a>
							</li>
							<li id="ux_li_seo_settings">
								<a href="admin.php?page=csb_seo_settings">
									<i class="icon-custom-magnifier"></i>
									<span>
										<?php echo esc_attr( $csb_layout_seo_settings_label ); ?>
									</span>
								</a>
							</li>
							<li id="ux_li_custom_css">
								<a href="admin.php?page=csb_layout_custom_css">
									<i class="icon-custom-note"></i>
									<span>
										<?php echo esc_attr( $csb_custom_css_label ); ?>
									</span>
									<span class='badge'>Pro</span>
								</a>
							</li>
						</ul>
					</li>
					<li id="ux_li_countdown">
						<a href="admin.php?page=csb_countdown">
							<i class="icon-custom-hourglass"></i>
							<span>
								<?php echo esc_attr( $csb_countdown_label ); ?>
							</span>
						</a>
					</li>
					<li id="ux_li_social_settings">
						<a href="admin.php?page=csb_social_settings">
							<i class="icon-custom-social-twitter"></i>
							<span>
								<?php echo esc_attr( $csb_social_media_settings_label ); ?>
							</span>
							<span class='badge'>Pro</span>
						</a>
					</li>
					<li id="ux_li_contact_form">
						<a href="javascript:;">
							<i class="icon-custom-note"></i>
							<span>
								<?php echo esc_attr( $csb_contact_form_label ); ?>
							</span>
						</a>
						<ul class="sub-menu">
							<li id="ux_li_contact_background_settings">
								<a href="admin.php?page=csb_contact_background_settings">
									<i class="icon-custom-picture"></i>
									<span>
										<?php echo esc_attr( $csb_contact_form_background_settings_label ); ?>
									</span>
									<span class='badge'>Pro</span>
								</a>
							</li>
							<li id="ux_li_contact_heading_settings">
								<a href="admin.php?page=csb_contact_heading_settings">
									<i class="icon-custom-pencil"></i>
									<span>
										<?php echo esc_attr( $csb_form_title ); ?>
									</span>
								</a>
							</li>
							<li id="ux_li_contact_description_settings">
								<a href="admin.php?page=csb_contact_description_settings">
									<i class="icon-custom-note"></i>
									<span>
										<?php echo esc_attr( $csb_form_description ); ?>
									</span>
								</a>
							</li>
							<li id="ux_li_label_settings">
								<a href="admin.php?page=csb_label_settings">
									<i class="icon-custom-compass"></i>
									<span>
										<?php echo esc_attr( $csb_contact_form_label_settings_label ); ?>
									</span>
									<span class='badge'>Pro</span>
								</a>
							</li>
							<li id="ux_li_contact_textbox_settings">
								<a href="admin.php?page=csb_contact_textbox_settings">
									<i class="icon-custom-frame"></i>
									<span>
										<?php echo esc_attr( $csb_textbox_settings_label ); ?>
									</span>
								</a>
							</li>
							<li id="ux_li_contact_button_settings">
								<a href="admin.php?page=csb_button_settings">
									<i class="icon-custom-cursor-move"></i>
									<span>
										<?php echo esc_attr( $csb_button_settings_label ); ?>
									</span>
								</a>
							</li>
							<li id="ux_li_success_message_settings">
								<a href="admin.php?page=csb_message_settings">
									<i class="icon-custom-envelope"></i>
									<span>
										<?php echo esc_attr( $csb_success_settings_label ); ?>
									</span>
								</a>
							</li>
							<li id="ux_li_footer_settings">
								<a href="admin.php?page=csb_footer_settings">
									<i class="icon-custom-layers"></i>
									<span>
										<?php echo esc_attr( $csb_footer_settings_label ); ?>
									</span>
									<span class='badge'>Pro</span>
								</a>
							</li>
							<li id="ux_li_email_templates">
								<a href="admin.php?page=csb_email_templates">
									<i class="icon-custom-link"></i>
									<span>
										<?php echo esc_attr( $csb_email_templates_label ); ?>
									</span>
									<span class='badge'>Pro</span>
								</a>
							</li>
						</ul>
					</li>
					<li id="ux_li_subscription">
						<a href="javascript:;">
							<i class="icon-custom-feed"></i>
							<span>
								<?php echo esc_attr( $csb_subscription_label ); ?>
							</span>
						</a>
						<ul class="sub-menu">
							<li id="ux_li_subscription_background_settings">
								<a href="admin.php?page=csb_subscription_background_settings">
									<i class="icon-custom-picture"></i>
									<span>
										<?php echo esc_attr( $csb_contact_form_background_settings_label ); ?>
									</span>
									<span class='badge'>Pro</span>
								</a>
							</li>
							<li id="ux_li_subscription_heading_settings">
								<a href="admin.php?page=csb_subscription_heading_settings">
									<i class="icon-custom-pencil"></i>
									<span>
										<?php echo esc_attr( $csb_form_title ); ?>
									</span>
								</a>
							</li>
							<li id="ux_li_subscription_description_settings">
								<a href="admin.php?page=csb_subscription_description_settings">
									<i class="icon-custom-note"></i>
									<span>
										<?php echo esc_attr( $csb_form_description ); ?>
									</span>
								</a>
							</li>
							<li id="ux_li_subscription_textbox_settings">
								<a href="admin.php?page=csb_subscription_textbox_settings">
									<i class="icon-custom-frame"></i>
									<span>
										<?php echo esc_attr( $csb_textbox_settings_label ); ?>
									</span>
								</a>
							</li>
							<li id="ux_li_subscription_button_settings">
								<a href="admin.php?page=csb_subscription_button_settings">
									<i class="icon-custom-cursor-move"></i>
									<span>
										<?php echo esc_attr( $csb_button_settings_label ); ?>
									</span>
								</a>
							</li>
							<li id="ux_li_subscription_success_settings">
								<a href="admin.php?page=csb_subscription_success_settings">
									<i class="icon-custom-graph"></i>
									<span>
										<?php echo esc_attr( $csb_success_settings_label ); ?>
									</span>
								</a>
							</li>
							<li id="ux_li_subscription_error_settings">
								<a href="admin.php?page=csb_subscription_error_settings">
									<i class="icon-custom-ban"></i>
									<span>
										<?php echo esc_attr( $csb_subscription_error_settings_label ); ?>
									</span>
								</a>
							</li>
							<li id="ux_li_subscription_email_templates">
								<a href="admin.php?page=csb_subscription_email_templates">
									<i class="icon-custom-link"></i>
									<span>
										<?php echo esc_attr( $csb_email_templates_label ); ?>
									</span>
									<span class='badge'>Pro</span>
								</a>
							</li>
						</ul>
					</li>
					<li id="ux_li_subscribers">
						<a href="admin.php?page=csb_subscribers">
							<i class="icon-custom-user-follow"></i>
							<span>
								<?php echo esc_attr( $csb_subscribers_label ); ?>
							</span>
							<span class='badge'>Pro</span>
						</a>
					</li>
					<li id="ux_li_contact_form_data">
						<a href="admin.php?page=csb_contact_form_data">
							<i class="icon-custom-pencil"></i>
							<span>
								<?php echo esc_attr( $csb_contact_form_data_label ); ?>
							</span>
							<span class='badge'>Pro</span>
						</a>
					</li>
					<li id="ux_li_other_settings">
						<a href="admin.php?page=csb_other_settings">
							<i class="icon-custom-wrench"></i>
							<span>
								<?php echo esc_attr( $csb_other_settings_label ); ?>
							</span>
						</a>
					</li>
					<li id="ux_li_roles_capabilities">
						<a href="admin.php?page=csb_roles_and_capabilities">
							<i class="icon-custom-users"></i>
							<span>
								<?php echo esc_attr( $csb_roles_capabilities_label ); ?>
							</span>
							<span class='badge'>Pro</span>
						</a>
					</li>
					<li id="ux_li_feature_requests">
						<a href="https://wordpress.org/support/plugin/wp-coming-soon-booster" target="_blank">
							<i class="icon-custom-call-out"></i>
							<span>
								<?php echo esc_attr( $csb_feature_requests_label ); ?>
							</span>
						</a>
					</li>
					<li id="ux_li_system_information">
						<a href="admin.php?page=csb_system_information">
							<i class="icon-custom-screen-desktop"></i>
							<span>
								<?php echo esc_attr( $csb_system_information_label ); ?>
							</span>
						</a>
					</li>
					<li id="ux_li_upgrade">
						<a href="https://tech-banker.com/coming-soon-booster/pricing/" target="_blank">
								<i class="icon-custom-briefcase"></i>
								<span style="color:yellow;">
									<strong><?php echo esc_attr( $csb_premium_edition_label ); ?></strong>
								</span>
						</a>
					</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="page-content-wrapper">
		<div class="page-content">
		<?php
	}
}
