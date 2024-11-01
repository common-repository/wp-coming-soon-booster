<?php
/**
 * Template for contact form success message settings.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/views/contact-form
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
	} elseif ( CONTACT_FORM_COMING_SOON_BOOSTER === '1' ) {
		$csb_message_settings = wp_create_nonce( 'coming_soon_booster_success_message_settings' );
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
					<a href="admin.php?page=csb_contact_background_settings">
						<?php echo esc_attr( $csb_contact_form_label ); ?>
					</a>
					<span>></span>
				</li>
				<li>
					<span>
						<?php echo esc_attr( $csb_success_settings_label ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-envelope"></i>
							<?php echo esc_attr( $csb_success_settings_label ); ?>
						</div>
						<p class="premium-editions">
							<?php echo esc_attr( $csb_upgrade_need_help ); ?><a href="https://tech-banker.com/coming-soon-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_documentation ); ?></a><?php echo esc_attr( $csb_read_and_check ); ?><a href="https://tech-banker.com/coming-soon-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_demos_section ); ?></a>
						</p>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_success_message_settings">
							<div class="form-body">
								<div class="form-actions">
									<div class="pull-right">
										<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
										<input type="submit" class="btn vivid-green" id="btn_save_message_settings" name="btn_save_message_settings" value="<?php echo esc_attr( $csb_save_changes ); ?>">
									</div>
								</div>
								<div class="line-separator"></div>
									<div class="form-group">
										<label class="control-label">
											<?php echo esc_attr( $csb_success_settings_label ); ?> :
											<span class="required" aria-required="true">*</span>
										</label>
										<select class="form-control" name="ux_ddl_success_settings_contact_form" id="ux_ddl_success_settings_contact_form" onchange="change_settings_coming_soon_booster('#ux_ddl_success_settings_contact_form', '#ux_div_success_message_settings');" value="<?php echo isset( $success_message_settings_data_unserialize['success_message_settings_contact_form'] ) ? esc_attr( $success_message_settings_data_unserialize['success_message_settings_contact_form'] ) : ''; ?>">
											<option value="show"><?php echo esc_attr( $csb_show ); ?></option>
											<option value="hide"><?php echo esc_attr( $csb_hide ); ?></option>
										</select>
										<i class="controls-description"><?php echo esc_attr( $csb_success_message_settings_tooltip ); ?></i>
									</div>
									<div id="ux_div_success_message_settings">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_message_settings_success_message_text ); ?> :
												<span class="required" aria-required="true">*</span>
											</label>
											<?php
												$contact_form_success_message = isset( $success_message_settings_data_unserialize['success_message_text_contact_form'] ) ? htmlspecialchars_decode( $success_message_settings_data_unserialize['success_message_text_contact_form'] ) : '';
												$id                           = 'ux_success_content_contact_form'; // @codingStandardsIgnoreLine
												wp_editor(
													$contact_form_success_message, $id, array(
														'media_buttons' => false,
														'textarea_rows' => 8,
														'tabindex'      => 4,
													)
												);
											?>
											<textarea style="display:none" id="ux_txtarea_success_message" name="ux_txtarea_success_message"><?php echo esc_attr( $contact_form_success_message ); ?></textarea>
											<i class="controls-description"><?php echo esc_attr( $csb_message_settings_success_message_text_tooltip ); ?></i>
										</div>
										<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $csb_font_style ); ?> :
													<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
												</label>
												<div class="input-icon right">
													<select class="form-control custom-input-medium" name="ux_ddl_font_style_success_contact_form[]" id="ux_ddl_font_style_success_contact_form">
														<?php
														for ( $flag = 1; $flag <= 200; $flag++ ) {
															if ( $flag < 10 ) {
																?>
																<option disabled="disabled" value="<?php echo intval( $flag ); ?>px">0<?php echo intval( $flag ); ?> Px</option>
																<?php
															} else {
																$disable = 18 === $flag ? '' : 'disabled=disabled';
																?>
																<option <?php echo esc_attr( $disable ); ?> value="<?php echo intval( $flag ); ?>px"><?php echo intval( $flag ); ?> Px</option>
																<?php
															}
														}
														?>
													</select>
													<input type="text" name="ux_ddl_font_style_success_contact_form[]" id="ux_clr_success_settings_contact_form" disabled class="form-control input-inline custom-input-medium" value="#ffffff">
												</div>
											</div>
											<i class="controls-description"><?php echo esc_attr( $csb_button_settings_font_style_tooltip ); ?></i>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $csb_font_family ); ?> :
													<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
												</label>
												<div class="input-icon right">
													<select class="form-control" name="ux_ddl_font_family_success_contact_form" id="ux_ddl_font_family_success_contact_form">
														<?php
														if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'lib/web-fonts.php' ) ) {
															include COMING_SOON_BOOSTER_DIR_PATH . 'lib/web-fonts.php';
														}
														?>
													</select>
												</div>
												<i class="controls-description"><?php echo esc_attr( $csb_font_family_settings_tooltip ); ?></i>
											</div>
										</div>
									</div>
									<div class="line-separator"></div>
										<div class="form-actions">
											<div class="pull-right">
												<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
												<input type="submit" class="btn vivid-green" id="btn_save_message_settings" name="btn_save_message_settings" value="<?php echo esc_attr( $csb_save_changes ); ?>">
											</div>
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
					<a href="admin.php?page=csb_contact_background_settings">
						<?php echo esc_attr( $csb_contact_form_label ); ?>
					</a>
					<span>></span>
				</li>
				<li>
					<span>
						<?php echo esc_attr( $csb_success_settings_label ); ?>
					</span>
				</li>
			</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box vivid-green">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-custom-envelope"></i>
								<?php echo esc_attr( $csb_success_settings_label ); ?>
							</div>
						</div>
						<div class="portlet-body form">
							<form id="ux_frm_success_message_settings">
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
