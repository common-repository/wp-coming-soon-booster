<?php
/**
 * Template for roles and capabilities settings.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/views/roles-and-capabilities
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
	} elseif ( ROLES_AND_CAPABILITIES_COMING_SOON_BOOSTER === '1' ) {
		$roles_and_capabilities = explode( ',', isset( $details_roles_capabilities['roles_and_capabilities'] ) ? $details_roles_capabilities['roles_and_capabilities'] : '' );
		$administrator          = explode( ',', isset( $details_roles_capabilities['administrator_privileges'] ) ? $details_roles_capabilities['administrator_privileges'] : '' );
		$author                 = explode( ',', isset( $details_roles_capabilities['author_privileges'] ) ? $details_roles_capabilities['author_privileges'] : '' );
		$editor                 = explode( ',', isset( $details_roles_capabilities['editor_privileges'] ) ? $details_roles_capabilities['editor_privileges'] : '' );
		$contributor            = explode( ',', isset( $details_roles_capabilities['contributor_privileges'] ) ? $details_roles_capabilities['contributor_privileges'] : '' );
		$subscriber             = explode( ',', isset( $details_roles_capabilities['subscriber_privileges'] ) ? $details_roles_capabilities['subscriber_privileges'] : '' );
		$other                  = explode( ',', isset( $details_roles_capabilities['other_privileges'] ) ? $details_roles_capabilities['other_privileges'] : '' );
		?>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="icon-custom-home"></i>
			<a href="admin.php?page=csb_coming_soon_booster">
					<?php echo esc_attr( $csb_coming_soon_booster_label ); ?>
			</a>
			<span>></span>
		</li>
		<li>
			<span>
				<?php echo esc_attr( $csb_roles_capabilities_label ); ?>
			</span>
		</li>
	</ul>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="portlet box vivid-green">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-custom-users"></i>
					<?php echo esc_attr( $csb_roles_capabilities_label ); ?>
				</div>
				<p class="premium-editions">
					<?php echo esc_attr( $csb_upgrade_need_help ); ?><a href="https://tech-banker.com/coming-soon-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_documentation ); ?></a><?php echo esc_attr( $csb_read_and_check ); ?><a href="https://tech-banker.com/coming-soon-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_demos_section ); ?></a>
				</p>
			</div>
			<div class="portlet-body form">
				<form id="ux_frm_roles_and_capabilities">
					<div class="form-body">
						<div class="form-group">
							<label class="control-label">
								<?php echo esc_attr( $csb_roles_and_capabilities_show_coming_soon_menu_label ); ?> :
								<span class="required" aria-required="true" style="color:red;">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
							</label>
							<table class="table table-striped table-bordered table-margin-top" id="ux_tbl_plugin_settings">
								<thead>
								<tr>
									<th>
									<input type="checkbox" name="ux_chk_administrator" id="ux_chk_administrator" checked="checked" disabled="disabled" value="1" <?php echo '1' === $roles_and_capabilities[0] ? 'checked = checked' : ''; ?>>
										<?php echo esc_attr( $csb_roles_and_capabilities_administrator_label ); ?>
									</th>
									<th>
										<input type="checkbox" name="ux_chk_author" id="ux_chk_author" value="1" onclick="show_roles_capabilities_coming_soon_booster(this, 'ux_div_author_roles');" <?php echo '1' === $roles_and_capabilities[1] ? 'checked = checked' : ''; ?>>
										<?php echo esc_attr( $csb_roles_and_capabilities_author_label ); ?>
									</th>
									<th>
										<input type="checkbox" name="ux_chk_editor" id="ux_chk_editor" value="1" onclick="show_roles_capabilities_coming_soon_booster(this, 'ux_div_editor_roles');" <?php echo '1' === $roles_and_capabilities[2] ? 'checked = checked' : ''; ?>>
										<?php echo esc_attr( $csb_roles_and_capabilities_editor_label ); ?>
									</th>
									<th>
										<input type="checkbox" name="ux_chk_contributor" id="ux_chk_contributor" value="1" onclick="show_roles_capabilities_coming_soon_booster(this, 'ux_div_contributor_roles');" <?php echo '1' === $roles_and_capabilities[3] ? 'checked = checked' : ''; ?>>
										<?php echo esc_attr( $csb_roles_and_capabilities_contributor_label ); ?>
									</th>
									<th>
										<input type="checkbox" name="ux_chk_subscriber" id="ux_chk_subscriber" value="1" onclick="show_roles_capabilities_coming_soon_booster(this, 'ux_div_subscriber_roles');" <?php echo '1' === $roles_and_capabilities[4] ? 'checked = checked' : ''; ?>>
										<?php echo esc_attr( $csb_roles_and_capabilities_subscriber_label ); ?>
									</th>
									<th>
										<input type="checkbox" name="ux_chk_other" id="ux_chk_other" value="1" onclick="show_roles_capabilities_coming_soon_booster(this, 'ux_div_other_roles');" <?php echo '1' === $roles_and_capabilities[5] ? 'checked = checked' : ''; ?>>
										<?php echo esc_attr( $csb_roles_and_capabilities_other_label ); ?>
									</th>
								</tr>
							</thead>
						</table>
						<i class="controls-description"><?php echo esc_attr( $csb_roles_and_capabilities_sidebar_menu_tooltip ); ?></i>
					</div>
					<div class="form-group">
						<label class="control-label">
							<?php echo esc_attr( $csb_roles_and_capabilities_show_coming_soon_top_menu_label ); ?> :
							<span class="required" aria-required="true" style="color:red;">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
						</label>
						<div class="input-icon right">
							<select id="ux_ddl_top_bar" name="ux_ddl_top_bar" class="form-control">
								<option value="enable"><?php echo esc_attr( $csb_enable ); ?></option>
								<option value="disable"><?php echo esc_attr( $csb_disable ); ?></option>
							</select>
						</div>
						<i class="controls-description"><?php echo esc_attr( $csb_roles_and_capabilities_top_bar_menu_tooltip ); ?></i>
					</div>
					<div class="line-separator"></div>
						<div class="form-group">
							<div id="ux_div_administrator_roles">
								<label class="control-label">
									<?php echo esc_attr( $csb_roles_and_capabilities_administrator_role_label ); ?> :
									<span class="required" aria-required="true" style="color:red;">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<div class="table-margin-top">
									<table class="table table-striped table-bordered table-hover" id="ux_tbl_administrator">
										<thead>
											<tr>
												<th style="width: 40% !important;">
													<input type="checkbox" name="ux_chk_full_control_administrator" id="ux_chk_full_control_administrator" checked="checked" disabled="disabled" value="1">
												<?php echo esc_attr( $csb_roles_and_capabilities_full_control_label ); ?>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<input type="checkbox" name="ux_chk_plugin_mode_admin" disabled="disabled" checked="checked" id="ux_chk_plugin_mode_admin" value="1">
													<?php echo esc_attr( $csb_plugin_mode_label ); ?>
												</td>
												<td>
													<input type="checkbox" name="ux_chk_coming_soon_booster_theme_admin" disabled="disabled" checked="checked" id="ux_chk_coming_soon_booster_theme_admin" value="1">
													<?php echo esc_attr( $csb_coming_soon_booster_theme ); ?>
												</td>
												<td>
													<input type="checkbox" name="ux_chk_background_settings_admin" disabled="disabled" checked="checked" id="ux_chk_background_settings_admin" value="1">
													<?php echo esc_attr( $csb_background_settings_label ); ?>
												</td>
											</tr>
											<tr>
												<td>
													<input type="checkbox" name="ux_chk_layout_settings_admin" disabled="disabled" checked="checked" id="ux_chk_layout_settings_admin" value="1">
													<?php echo esc_attr( $csb_layout_settings_label ); ?>
												</td>
												<td>
													<input type="checkbox" name="ux_chk_countdown_admin" disabled="disabled" checked="checked" id="ux_chk_countdown_admin" value="1">
													<?php echo esc_attr( $csb_countdown_label ); ?>
												</td>
												<td>
													<input type="checkbox" name="ux_chk_social_media_settings_admin" disabled="disabled" checked="checked" id="ux_chk_social_media_settings_admin" value="1">
													<?php echo esc_attr( $csb_social_media_settings_label ); ?>
												</td>
										</tr>
										<tr>
											<td>
												<input type="checkbox" name="ux_chk_contact_form_admin" disabled="disabled" checked="checked" id="ux_chk_contact_form_admin" value="1">
												<?php echo esc_attr( $csb_contact_form_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_subscription_admin" disabled="disabled" checked="checked" id="ux_chk_subscription_admin" value="1">
												<?php echo esc_attr( $csb_subscription_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_subscribers_admin" disabled="disabled" checked="checked" id="ux_chk_subscribers_admin" value="1">
												<?php echo esc_attr( $csb_subscribers_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_contact_form_data_admin" disabled="disabled" checked="checked" id="ux_chk_contact_form_data_admin" value="1">
												<?php echo esc_attr( $csb_contact_form_data_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_other_settings_admin" disabled="disabled" checked="checked" id="ux_chk_other_settings_admin" value="1">
												<?php echo esc_attr( $csb_other_settings_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_roles_and_capabilities_admin" disabled="disabled" checked="checked" id="ux_chk_roles_and_capabilities_admin" value="1">
												<?php echo esc_attr( $csb_roles_capabilities_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_system_information_admin" disabled="disabled" checked="checked" id="ux_chk_system_information_admin" value="1">
												<?php echo esc_attr( $csb_system_information_label ); ?>
											</td>
											<td>
											</td>
											<td></td>
										</tr>
									</tbody>
								</table>
								<i class="controls-description"><?php echo esc_attr( $csb_roles_and_capabilities_admin_access_tooltip ); ?></i>
								</div>
								<div class="line-separator"></div>
							</div>
						</div>
						<div class="form-group">
							<div id="ux_div_author_roles">
								<label class="control-label">
									<?php echo esc_attr( $csb_roles_and_capabilities_author_role_label ); ?> :
									<span class="required" aria-required="true" style="color:red;">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<div class="table-margin-top">
								<table class="table table-striped table-bordered table-hover" id="ux_tbl_author">
									<thead>
										<tr>
											<th style="width: 40% !important;">
											<input type="checkbox" name="ux_chk_full_control_author" id="ux_chk_full_control_author" value="1"  onclick="full_control_function_coming_soon_booster(this, 'ux_div_author_roles');"  <?php echo isset( $author ) && '1' === $author[0] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_roles_and_capabilities_full_control_label ); ?>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_plugin_mode_author" id="ux_chk_plugin_mode_author" value="1" <?php echo isset( $author ) && '1' === $author[1] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_plugin_mode_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_coming_soon_booster_theme_author" id="ux_chk_coming_soon_booster_theme_author" value="1" <?php echo isset( $author ) && '1' === $author[2] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_coming_soon_booster_theme ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_background_settings_author" id="ux_chk_background_settings_author" value="1" <?php echo isset( $author ) && '1' === $author[3] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_background_settings_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_layout_settings_author" id="ux_chk_layout_settings_author" value="1" <?php echo isset( $author ) && '1' === $author[4] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_layout_settings_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_countdown_author" id="ux_chk_countdown_author" value="1" <?php echo isset( $author ) && '1' === $author[5] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_countdown_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_social_media_settings_author" id="ux_chk_social_media_settings_author" value="1" <?php echo isset( $author ) && '1' === $author[6] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_social_media_settings_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_contact_form_author" id="ux_chk_contact_form_author" value="1" <?php echo isset( $author ) && '1' === $author[7] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_contact_form_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_subscription_author" id="ux_chk_subscription_author" value="1" <?php echo isset( $author ) && '1' === $author[8] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_subscription_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_subscribers_author" id="ux_chk_subscribers_author" value="1" <?php echo isset( $author ) && '1' === $author[9] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_subscribers_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_contact_form_data_author" id="ux_chk_contact_form_data_author" value="1" <?php echo isset( $author ) && '1' === $author[10] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_contact_form_data_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_other_settings_author" id="ux_chk_other_settings_author" value="1" <?php echo isset( $author ) && '1' === $author[11] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_other_settings_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_roles_and_capabilities_author" id="ux_chk_roles_and_capabilities_author" value="1" <?php echo isset( $author ) && '1' === $author[12] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_roles_capabilities_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_system_information_author" id="ux_chk_system_information_author" value="1" <?php echo isset( $author ) && '1' === $author[13] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_system_information_label ); ?>
											</td>
											<td>
											</td>
											<td>
											</td>
										</tr>
									</tbody>
								</table>
								<i class="controls-description"><?php echo esc_attr( $csb_roles_and_capabilities_author_access_tooltip ); ?></i>
								</div>
								<div class="line-separator"></div>
							</div>
						</div>
						<div class="form-group">
							<div id="ux_div_editor_roles">
								<label class="control-label">
									<?php echo esc_attr( $csb_roles_and_capabilities_editor_role_label ); ?> :
									<span class="required" aria-required="true" style="color:red;">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<div class="table-margin-top">
								<table class="table table-striped table-bordered table-hover" id="ux_tbl_editor">
									<thead>
										<tr>
											<th style="width: 40% !important;">
											<input type="checkbox" name="ux_chk_full_control_editor" id="ux_chk_full_control_editor" value="1" onclick="full_control_function_coming_soon_booster(this, 'ux_div_editor_roles');" <?php echo isset( $editor ) && '1' === $editor[0] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_roles_and_capabilities_full_control_label ); ?>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_plugin_mode_editor" id="ux_chk_plugin_mode_editor" value="1" <?php echo isset( $editor ) && '1' === $editor[1] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_plugin_mode_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_coming_soon_booster_theme_editor" id="ux_chk_coming_soon_booster_theme_editor" value="1" <?php echo isset( $editor ) && '1' === $editor[2] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_coming_soon_booster_theme ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_background_settings_editor" id="ux_chk_background_settings_editor" value="1" <?php echo isset( $editor ) && '1' === $editor[3] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_background_settings_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_layout_settings_editor" id="ux_chk_layout_settings_editor" value="1" <?php echo isset( $editor ) && '1' === $editor[4] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_layout_settings_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_countdown_editor" id="ux_chk_countdown_editor" value="1" <?php echo isset( $editor ) && '1' === $editor[5] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_countdown_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_social_media_settings_editor" id="ux_chk_social_media_settings_editor" value="1" <?php echo isset( $editor ) && '1' === $editor[6] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_social_media_settings_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_contact_form_editor" id="ux_chk_contact_form_editor" value="1" <?php echo isset( $editor ) && '1' === $editor[7] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_contact_form_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_subscription_editor" id="ux_chk_subscription_editor" value="1" <?php echo isset( $editor ) && '1' === $editor[8] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_subscription_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_subscribers_editor" id="ux_chk_subscribers_editor" value="1" <?php echo isset( $editor ) && '1' === $editor[9] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_subscribers_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_contact_form_data_editor" id="ux_chk_contact_form_data_editor" value="1" <?php echo isset( $editor ) && '1' === $editor[10] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_contact_form_data_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_other_settings_editor" id="ux_chk_other_settings_editor" value="1" <?php echo isset( $editor ) && '1' === $editor[11] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_other_settings_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_roles_and_capabilities_editor" id="ux_chk_roles_and_capabilities_editor" value="1" <?php echo isset( $editor ) && '1' === $editor[12] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_roles_capabilities_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_system_information_editor" id="ux_chk_system_information_editor" value="1" <?php echo isset( $editor ) && '1' === $editor[13] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_system_information_label ); ?>
											</td>
											<td>
											</td>
											<td>
											</td>
										</tr>
									</tbody>
								</table>
								<i class="controls-description"><?php echo esc_attr( $csb_roles_and_capabilities_editor_access_tooltip ); ?></i>
								</div>
								<div class="line-separator"></div>
							</div>
						</div>
						<div class="form-group">
							<div id="ux_div_contributor_roles">
								<label class="control-label">
									<?php echo esc_attr( $csb_roles_and_capabilities_contributor_role_label ); ?> :
									<span class="required" aria-required="true" style="color:red;">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<div class="table-margin-top">
								<table class="table table-striped table-bordered table-hover" id="ux_tbl_contributor">
									<thead>
										<tr>
											<th style="width: 40% !important;">
											<input type="checkbox" name="ux_chk_full_control_contributor" id="ux_chk_full_control_contributor" value="1" onclick="full_control_function_coming_soon_booster(this, 'ux_div_contributor_roles');" <?php echo isset( $contributor ) && '1' === $contributor[0] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_roles_and_capabilities_full_control_label ); ?>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_plugin_mode_contributor" id="ux_chk_plugin_mode_contributor" value="1" <?php echo isset( $contributor ) && '1' === $contributor[1] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_plugin_mode_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_coming_soon_booster_theme_contributor" id="ux_chk_coming_soon_booster_theme_contributor" value="1" <?php echo isset( $contributor ) && '1' === $contributor[2] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_coming_soon_booster_theme ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_background_settings_contributor" id="ux_chk_background_settings_contributor" value="1" <?php echo isset( $contributor ) && '1' === $contributor[3] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_background_settings_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_layout_settings_contributor" id="ux_chk_layout_settings_contributor" value="1" <?php echo isset( $contributor ) && '1' === $contributor[4] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_layout_settings_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_countdown_contributor" id="ux_chk_countdown_contributor" value="1" <?php echo isset( $contributor ) && '1' === $contributor[5] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_countdown_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_social_media_settings_contributor" id="ux_chk_social_media_settings_contributor" value="1" <?php echo isset( $contributor ) && '1' === $contributor[6] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_social_media_settings_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_contact_form_contributor" id="ux_chk_contact_form_contributor" value="1" <?php echo isset( $contributor ) && '1' === $contributor[7] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_contact_form_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_subscription_contributor" id="ux_chk_subscription_contributor" value="1" <?php echo isset( $contributor ) && '1' === $contributor[8] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_subscription_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_subscribers_contributor" id="ux_chk_subscribers_contributor" value="1" <?php echo isset( $contributor ) && '1' === $contributor[9] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_subscribers_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_contact_form_data_contributor" id="ux_chk_contact_form_data_contributor" value="1" <?php echo isset( $contributor ) && '1' === $contributor[10] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_contact_form_data_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_other_settings_contributor" id="ux_chk_other_settings_contributor" value="1" <?php echo isset( $contributor ) && '1' === $contributor[11] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_other_settings_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_roles_and_capabilities_contributor" id="ux_chk_roles_and_capabilities_contributor" value="1" <?php echo isset( $contributor ) && '1' === $contributor[12] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_roles_capabilities_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_system_information_contributor" id="ux_chk_system_information_contributor" value="1" <?php echo isset( $contributor ) && '1' === $contributor[13] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_system_information_label ); ?>
											</td>
											<td>
											</td>
											<td>
											</td>
										</tr>
									</tbody>
								</table>
								<i class="controls-description"><?php echo esc_attr( $csb_roles_and_capabilities_contributor_access_tooltip ); ?></i>
								</div>
								<div class="line-separator"></div>
							</div>
						</div>
						<div class="form-group">
							<div id="ux_div_subscriber_roles">
								<label class="control-label">
									<?php echo esc_attr( $csb_roles_and_capabilities_subscriber_role_label ); ?> :
									<span class="required" aria-required="true" style="color:red;">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<div class="table-margin-top">
								<table class="table table-striped table-bordered table-hover" id="ux_tbl_subscriber">
									<thead>
										<tr>
											<th style="width: 40% !important;">
											<input type="checkbox" name="ux_chk_full_control_subscriber" id="ux_chk_full_control_subscriber" value="1" onclick="full_control_function_coming_soon_booster(this, 'ux_div_subscriber_roles');" <?php echo isset( $subscriber ) && '1' === $subscriber[0] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_roles_and_capabilities_full_control_label ); ?>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_plugin_mode_subscriber" id="ux_chk_plugin_mode_subscriber" value="1" <?php echo isset( $subscriber ) && '1' === $subscriber[1] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_plugin_mode_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_coming_soon_booster_theme_subscriber" id="ux_chk_coming_soon_booster_theme_subscriber" value="1" <?php echo isset( $subscriber ) && '1' === $subscriber[2] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_coming_soon_booster_theme ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_background_settings_subscriber" id="ux_chk_background_settings_subscriber" value="1" <?php echo isset( $subscriber ) && '1' === $subscriber[3] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_background_settings_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_layout_settings_subscriber" id="ux_chk_layout_settings_subscriber" value="1" <?php echo isset( $subscriber ) && '1' === $subscriber[4] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_layout_settings_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_countdown_subscriber" id="ux_chk_countdown_subscriber" value="1" <?php echo isset( $subscriber ) && '1' === $subscriber[5] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_countdown_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_social_media_settings_subscriber" id="ux_chk_social_media_settings_subscriber" value="1" <?php echo isset( $subscriber ) && '1' === $subscriber[6] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_social_media_settings_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_contact_form_subscriber" id="ux_chk_contact_form_subscriber" value="1" <?php echo isset( $subscriber ) && '1' === $subscriber[7] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_contact_form_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_subscription_subscriber" id="ux_chk_subscription_subscriber" value="1" <?php echo isset( $subscriber ) && '1' === $subscriber[8] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_subscription_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_subscribers_subscriber" id="ux_chk_subscribers_subscriber" value="1" <?php echo isset( $subscriber ) && '1' === $subscriber[9] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_subscribers_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_contact_form_data_subscriber"  id="ux_chk_contact_form_data_subscriber" value="1" <?php echo isset( $subscriber ) && '1' === $subscriber[10] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_contact_form_data_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_other_settings_subscriber" id="ux_chk_other_settings_subscriber" value="1" <?php echo isset( $subscriber ) && '1' === $subscriber[11] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_other_settings_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_roles_and_capabilities_subscriber"  id="ux_chk_roles_and_capabilities_subscriber" value="1" <?php echo isset( $subscriber ) && '1' === $subscriber[12] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_roles_capabilities_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_system_information_subscriber"  id="ux_chk_system_information_subscriber" value="1" <?php echo isset( $subscriber ) && '1' === $subscriber[13] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_system_information_label ); ?>
											</td>
											<td>
											</td>
											<td>
											</td>
										</tr>
									</tbody>
								</table>
								<i class="controls-description"><?php echo esc_attr( $csb_roles_and_capabilities_subscriber_access_tooltip ); ?></i>
							</div>
							<div class="line-separator"></div>
							</div>
						</div>
						<div class="form-group">
							<div id="ux_div_other_roles">
								<label class="control-label">
									<?php echo esc_attr( $csb_roles_capabilities_other_role ); ?> :
									<span class="required" aria-required="true" style="color:red;">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<div class="table-margin-top">
								<table class="table table-striped table-bordered table-hover" id="ux_tbl_other">
									<thead>
										<tr>
											<th style="width: 40% !important;">
											<input type="checkbox" name="ux_chk_full_control_other" id="ux_chk_full_control_other" value="1" onclick="full_control_function_coming_soon_booster(this, 'ux_div_other_roles');" <?php echo isset( $other ) && '1' === $other[0] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_roles_and_capabilities_full_control_label ); ?>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_plugin_mode_other" id="ux_chk_plugin_mode_other" value="1" <?php echo isset( $other ) && '1' === $other[1] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_plugin_mode_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_coming_soon_booster_theme_other" id="ux_chk_coming_soon_booster_theme_other" value="1" <?php echo isset( $other ) && '1' === $other[2] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_coming_soon_booster_theme ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_background_settings_other" id="ux_chk_background_settings_other" value="1" <?php echo isset( $other ) && '1' === $other[3] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_background_settings_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_layout_settings_other" id="ux_chk_layout_settings_other" value="1" <?php echo isset( $other ) && '1' === $other[4] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_layout_settings_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_countdown_other" id="ux_chk_countdown_other" value="1" <?php echo isset( $other ) && '1' === $other[5] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_countdown_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_social_media_settings_other" id="ux_chk_social_media_settings_other" value="1" <?php echo isset( $other ) && '1' === $other[6] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_social_media_settings_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_contact_form_other" id="ux_chk_contact_form_other" value="1" <?php echo isset( $other ) && '1' === $other[7] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_contact_form_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_subscription_other" id="ux_chk_subscription_other" value="1" <?php echo isset( $other ) && '1' === $other[8] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_subscription_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_subscribers_other" id="ux_chk_subscribers_other" value="1" <?php echo isset( $other ) && '1' === $other[9] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_subscribers_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_contact_form_data_other"  id="ux_chk_contact_form_data_other" value="1" <?php echo isset( $other ) && '1' === $other[10] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_contact_form_data_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_other_settings_other" id="ux_chk_other_settings_other" value="1" <?php echo isset( $other ) && '1' === $other[11] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_other_settings_label ); ?>
											</td>
											<td>
											<input type="checkbox" name="ux_chk_roles_and_capabilities_other"  id="ux_chk_roles_and_capabilities_other" value="1" <?php echo isset( $other ) && '1' === $other[12] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_roles_capabilities_label ); ?>
											</td>
										</tr>
										<tr>
											<td>
											<input type="checkbox" name="ux_chk_system_information_other"  id="ux_chk_system_information_other" value="1" <?php echo isset( $other ) && '1' === $other[13] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_system_information_label ); ?>
											</td>
											<td>
											</td>
											<td>
											</td>
										</tr>
									</tbody>
								</table>
								<i class="controls-description"><?php echo esc_attr( $csb_roles_capabilities_other_role_tooltip ); ?></i>
								</div>
								<div class="line-separator"></div>
							</div>
						</div>
						<div class="form-group">
							<div id="ux_div_other_roles_capabilities">
								<label class="control-label">
									<?php echo esc_attr( $csb_roles_and_capabilities_other_roles_capabilities ); ?> :
									<span class="required" aria-required="true" style="color:red;">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<div class="table-margin-top">
								<table class="table table-striped table-bordered table-hover" id="ux_tbl_other_roles">
									<thead>
										<tr>
											<th style="width: 40% !important;">
											<input type="checkbox" name="ux_chk_full_control_other_roles" id="ux_chk_full_control_other_roles" value="1" onclick="full_control_function_coming_soon_booster(this, 'ux_div_other_roles_capabilities');" <?php echo '1' === $details_roles_capabilities['others_full_control_capability'] ? 'checked = checked' : ''; ?>>
												<?php echo esc_attr( $csb_roles_and_capabilities_full_control_label ); ?>
											</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$flag              = 0;
										$user_capabilities = get_others_capabilities_coming_soon_booster();
										if ( isset( $user_capabilities ) && count( $user_capabilities ) > 0 ) {
											foreach ( $user_capabilities as $key => $value ) {
												$other_roles = in_array( $value, $other_roles_array, true ) ? 'checked=checked' : '';
												$flag++;
												if ( 0 === $key % 3 ) {
													?>
													<tr>
													<?php
												}
												?>
												<td>
													<input type="checkbox" name="ux_chk_other_capabilities_<?php echo esc_attr( $value ); ?>" id="ux_chk_other_capabilities_<?php echo esc_attr( $value ); ?>" value="<?php echo esc_attr( $value ); ?>" <?php echo esc_attr( $other_roles ); ?>>
													<?php echo esc_attr( $value ); ?>
												</td>
												<?php
												if ( count( $user_capabilities ) === $flag && 1 === $flag % 3 ) {
													?>
													<td>
													</td>
													<td>
													</td>
													<?php
												}
												?>
												<?php
												if ( count( $user_capabilities ) === $flag && 2 === $flag % 3 ) {
													?>
													<td>
													</td>
													<?php
												}
												?>
												<?php
												if ( 0 === $flag % 3 ) {
													?>
												</tr>
													<?php
												}
											}
										}
										?>
									</tbody>
									</table>
									<i class="controls-description"><?php echo esc_attr( $csb_roles_and_capabilities_other_roles_capabilities_tooltip ); ?></i>
								</div>
								<div class="line-separator"></div>
							</div>
						</div>
						<div class="form-actions">
							<div class="pull-right">
								<input type="submit" class="btn vivid-green" id="btn_save_roles_capabilities" name="btn_save_roles_capabilities" value="<?php echo esc_attr( $csb_save_changes ); ?>">
							</div>
						</div>
						</div>
					</form>
				</div>
			</div>
			</div>
		</div>
		<?php
	} else {
		?>
		<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<i class="icon-custom-home"></i>
				<a href="admin.php?page=csb_coming_soon_booster">
					<?php echo esc_attr( $csb_coming_soon_booster_label ); ?>
				</a>
				<span>></span>
			</li>
			<li>
				<span>
					<?php echo esc_attr( $csb_roles_capabilities_label ); ?>
				</span>
			</li>
		</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-users"></i>
							<?php echo esc_attr( $csb_roles_capabilities_label ); ?>
						</div>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_roles_capabilities">
							<div class="form-body">
								<strong><?php echo esc_attr( $csb_user_access_message ); ?></strong>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
