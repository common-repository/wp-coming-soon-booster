<?php
/**
 * Template for contact form footer settings.
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
					<?php echo esc_attr( $csb_footer_settings_label ); ?>
				</span>
			</li>
		</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-layers"></i>
							<?php echo esc_attr( $csb_footer_settings_label ); ?>
						</div>
						<p class="premium-editions">
							<?php echo esc_attr( $csb_upgrade_need_help ); ?><a href="https://tech-banker.com/coming-soon-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_documentation ); ?></a><?php echo esc_attr( $csb_read_and_check ); ?><a href="https://tech-banker.com/coming-soon-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_demos_section ); ?></a>
						</p>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_footer_settings">
							<div class="form-body">
								<div class="form-actions">
									<div class="pull-right">
										<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
										<input type="submit" class="btn vivid-green" id="ux_btn_save_footer_settings" name="ux_btn_save_footer_settings" value="<?php echo esc_attr( $csb_save_changes ); ?>">
									</div>
								</div>
								<div class="line-separator"></div>
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $csb_footer_settings_label ); ?> :
										<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
									</label>
									<select class="form-control" name="ux_ddl_footer_settings" id="ux_ddl_footer_settings" onchange="change_settings_coming_soon_booster('#ux_ddl_footer_settings', '#ux_div_footer_text');" value="show">
										<option value="show"><?php echo esc_attr( $csb_show ); ?></option>
										<option value="hide"><?php echo esc_attr( $csb_hide ); ?></option>
									</select>
									<i class="controls-description"><?php echo esc_attr( $csb_footer_settings_settings_tooltip ); ?></i>
								</div>
								<div id="ux_div_footer_text" style="display:none;">
									<div class="form-group">
										<label class="control-label">
											<?php echo esc_attr( $csb_footer_settings_text_title ); ?> :
										<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
										</label>
										<?php
										$contact_footer_editor = 'Copyright © Tech Banker. All Rights Reserved';
										$id                    = 'ux_footer_content'; // @codingStandardsIgnoreLine
										wp_editor(
											$contact_footer_editor, $id, array(
												'media_buttons' => false,
												'textarea_rows' => 8,
												'tabindex' => 4,
											)
										);
										?>
										<textarea id="ux_txtarea_footer_content" name="ux_txtarea_footer_content" style="display:none;"><?php echo esc_attr( $contact_footer_editor ); ?></textarea>
										<i class="controls-description"><?php echo esc_attr( $csb_footer_settings_text_tooltip ); ?></i>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $csb_font_size ); ?> :
													<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
												</label>
												<div class="input-icon right">
													<select class="form-control custom-input-medium" name="ux_ddl_font_style_footer[]" id="ux_ddl_font_style_footer">
														<?php
														for ( $flag = 1; $flag <= 200; $flag++ ) {
															if ( $flag < 10 ) {
																?>
																<option value="<?php echo intval( $flag ); ?>px">0<?php echo intval( $flag ); ?> Px</option>
																<?php
															} else {
																?>
																<option value="<?php echo intval( $flag ); ?>px"><?php echo intval( $flag ); ?> Px</option>
																<?php
															}
														}
														?>
													</select>
													<input type="text" name="ux_ddl_font_style_footer[]" disabled id="ux_clr_footer_settings" class="form-control input-inline custom-input-medium" value="#ffffff">
												</div>
												<i class="controls-description"><?php echo esc_attr( $csb_button_settings_font_style_tooltip ); ?></i>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $csb_font_family ); ?> :
													<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
												</label>
												<div class="input-icon right">
													<select class="form-control" name="ux_ddl_font_family_footer" id="ux_ddl_font_family_footer">
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
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $csb_margin_px ); ?> :
													<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
												</label>
												<div class="input-icon right">
													<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_footer_margin_text[]" id="ux_txt_footer_margin_top_text" maxlength="4" placeholder="<?php echo esc_attr( $csb_top ); ?>" value="0" onblur="change_value_settings_coming_soon_booster('#ux_txt_footer_margin_top_text', '0')" onfocus="prevent_paste_coming_soon_booster(this.id)">
													<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_footer_margin_text[]" id="ux_txt_footer_margin_right_text" maxlength="4" placeholder="<?php echo esc_attr( $csb_right ); ?>" value="10" onblur="change_value_settings_coming_soon_booster('#ux_txt_footer_margin_right_text', '10')" onfocus="prevent_paste_coming_soon_booster(this.id)">
													<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_footer_margin_text[]" id="ux_txt_footer_margin_bottom_text" maxlength="4" placeholder="<?php echo esc_attr( $csb_bottom ); ?>" value="10" onblur="change_value_settings_coming_soon_booster('#ux_txt_footer_margin_bottom_text', '10')" onfocus="prevent_paste_coming_soon_booster(this.id)">
													<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_footer_margin_text[]" id="ux_txt_footer_margin_left_text"maxlength="4"  placeholder="<?php echo esc_attr( $csb_left ); ?>" value="10" onblur="change_value_settings_coming_soon_booster('#ux_txt_footer_margin_left_text', '10')" onfocus="prevent_paste_coming_soon_booster(this.id)">
												</div>
												<i class="controls-description"><?php echo esc_attr( $csb_heading_settings_margin_tooltip ); ?></i>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $csb_padding_px ); ?> :
													<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
												</label>
												<div class="input-icon right">
													<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_footer_padding_text[]" id="ux_txt_footer_padding_top_text" maxlength="4" placeholder="<?php echo esc_attr( $csb_top ); ?>" value="0" onblur="change_value_settings_coming_soon_booster('#ux_txt_footer_padding_top_text', '0')" onfocus="prevent_paste_coming_soon_booster(this.id)" onkeypress="validate_digits_coming_soon_booster(event)">
													<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_footer_padding_text[]" id="ux_txt_footer_padding_right_text" maxlength="4" placeholder="<?php echo esc_attr( $csb_right ); ?>" value="10" onblur="change_value_settings_coming_soon_booster('#ux_txt_footer_padding_right_text', '10')" onfocus="prevent_paste_coming_soon_booster(this.id)" onkeypress="validate_digits_coming_soon_booster(event)">
													<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_footer_padding_text[]" id="ux_txt_footer_padding_bottom_text" maxlength="4" placeholder="<?php echo esc_attr( $csb_bottom ); ?>" value="10" onblur="change_value_settings_coming_soon_booster('#ux_txt_footer_padding_bottom_text', '10')" onfocus="prevent_paste_coming_soon_booster(this.id)" onkeypress="validate_digits_coming_soon_booster(event)">
													<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_footer_padding_text[]" id="ux_txt_footer_padding_left_text" maxlength="4" placeholder="<?php echo esc_attr( $csb_left ); ?>" value="10" onblur="change_value_settings_coming_soon_booster('#ux_txt_footer_padding_left_text', '10')" onfocus="prevent_paste_coming_soon_booster(this.id)" onkeypress="validate_digits_coming_soon_booster(event)">
												</div>
												<i class="controls-description"><?php echo esc_attr( $csb_heading_settings_padding_tooltip ); ?></i>
											</div>
										</div>
									</div>
									<div class="line-separator"></div>
										<div class="form-actions">
											<div class="pull-right">
												<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
												<input type="submit" class="btn vivid-green" id="ux_btn_save_footer_settings" name="ux_btn_save_footer_settings" value="<?php echo esc_attr( $csb_save_changes ); ?>">
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
						<?php echo esc_attr( $csb_footer_settings_label ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-layers"></i>
							<?php echo esc_attr( $csb_footer_settings_label ); ?>
						</div>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_footer_settings">
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
