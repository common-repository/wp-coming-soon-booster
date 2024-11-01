<?php
/**
 * Template for layout button settings.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/views/layout-settings
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
	} elseif ( LAYOUT_SETTINGS_COMING_SOON_BOOSTER === '1' ) {
		$csb_layout_button_settings = wp_create_nonce( 'coming_soon_booster_layout_button_settings' );
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
				<a href="admin.php?page=csb_loader_settings">
					<?php echo esc_attr( $csb_layout_settings_label ); ?>
				</a>
				<span>></span>
			</li>
			<li>
				<span>
					<?php echo esc_attr( $csb_layout_settings_button_settings_label ); ?>
				</span>
			</li>
		</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-cursor-move"></i>
							<?php echo esc_attr( $csb_layout_settings_button_settings_label ); ?>
						</div>
						<p class="premium-editions">
							<?php echo esc_attr( $csb_upgrade_need_help ); ?><a href="https://tech-banker.com/coming-soon-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_documentation ); ?></a><?php echo esc_attr( $csb_read_and_check ); ?><a href="https://tech-banker.com/coming-soon-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_demos_section ); ?></a>
						</p>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_layout_button_settings">
							<div class="form-body">
								<div class="form-actions">
									<div class="pull-right">
										<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
										<input type="submit" class="btn vivid-green" id="btn_save_button_settings" name="btn_save_button_settings" value="<?php echo esc_attr( $csb_save_changes ); ?>">
									</div>
								</div>
								<div class="line-separator"></div>
									<div id="ux_div_button">
										<div class="row">
											<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $csb_button_settings_button_label ); ?> :
													<span class="required" aria-required="true">*</span>
												</label>
												<select class="form-control" name="ux_ddl_layout_button_type" id="ux_ddl_layout_button_type" onchange="change_button_coming_soon_booster();">
													<option value="subscriber_button"><?php echo esc_attr( $csb_layout_subscriber_button_label ); ?></option>
													<option value="contact_button"><?php echo esc_attr( $csb_layout_contact_button_label ); ?></option>
												</select>
												<i class="controls-description"><?php echo esc_attr( $csb_layout_button_label_tooltip ); ?></i>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $csb_button_settings_button_visibility ); ?> :
													<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
												</label>
												<select class="form-control" name="ux_ddl_layout_button_subscriber_visibility_type" id="ux_ddl_layout_button_subscriber_visibility_type" style="display:block;" onchange="change_button_coming_soon_booster();">
													<option value="show"><?php echo esc_attr( $csb_show ); ?></option>
													<option value="hide"><?php echo esc_attr( $csb_hide ); ?></option>
												</select>
												<select class="form-control" name="ux_ddl_layout_button_contact_visibility_type" id="ux_ddl_layout_button_contact_visibility_type" style="display:none;" onchange="change_button_coming_soon_booster();">
													<option value="show"><?php echo esc_attr( $csb_show ); ?></option>
													<option value="hide"><?php echo esc_attr( $csb_hide ); ?></option>
												</select>
												<i class="controls-description"><?php echo esc_attr( $csb_layout_button_visibility_label_tooltip ); ?></i>
											</div>
										</div>
									</div>
									<div id="ux_subscriber_button">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_button_settings_subscriber_button_label ); ?> :
												<span class="required" aria-required="true">*</span>
											</label>
											<input type="text" class="form-control" name="ux_txt_sub_button_label" id="ux_txt_sub_button_label" placeholder="<?php echo esc_attr( $csb_button_settings_subscriber_button_label_placeholder ); ?>" value="<?php echo isset( $layout_button_settings_data_unserialize['layout_subscriber_button_name'] ) ? esc_attr( $layout_button_settings_data_unserialize['layout_subscriber_button_name'] ) : 'Notify Me!'; ?>">
											<i class="controls-description"><?php echo esc_attr( $csb_button_label_tooltip ); ?></i>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php echo esc_attr( $csb_button_settings_button_color ); ?> :
														<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
													</label>
													<input type="text" class="form-control" name="ux_subscriber_button_color" disabled id="ux_subscriber_button_color" value="#d61c38">
													<i class="controls-description"><?php echo esc_attr( $csb_button_setting_button_color_tooltip ); ?></i>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php echo esc_attr( $csb_font_style ); ?> :
														<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
													</label>
													<div class="input-icon right">
														<select class="form-control custom-input-medium" name="ux_ddl_font_style_layout_subscriber_button[]" id="ux_ddl_font_style_layout_subscriber_button">
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
														<input type="text" name="ux_ddl_font_style_layout_subscriber_button[]" disabled id="ux_ddl_subscriber_font_style" class="form-control input-inline custom-input-medium" value="#ffffff">
													</div>
													<i class="controls-description"><?php echo esc_attr( $csb_button_settings_font_style_tooltip ); ?></i>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php echo esc_attr( $csb_hover_color ); ?> :
														<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
													</label>
													<input type="text" class="form-control" name="ux_subscriber_hover_color" id="ux_subscriber_hover_color" disabled value="#ffffff">
													<i class="controls-description"><?php echo esc_attr( $csb_button_settings_hover_color_tooltip ); ?></i>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php echo esc_attr( $csb_button_settings_text_hover_color ); ?> :
														<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
													</label>
													<input type="text" class="form-control" name="ux_subscriber_text_hover_color" id="ux_subscriber_text_hover_color" disabled value="#d61c38">
													<i class="controls-description"><?php echo esc_attr( $csb_button_settings_text_hover_color_tooltip ); ?></i>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php echo esc_attr( $csb_background_border_color_label ); ?> :
														<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
													</label>
													<input type="text" class="form-control" name="ux_subscriber_border_color" id="ux_subscriber_border_color" disabled value="#d61c38">
													<i class="controls-description"><?php echo esc_attr( $csb_background_border_color_tooltip ); ?></i>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php echo esc_attr( $csb_button_settings_hover_border_color ); ?> :
														<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
													</label>
													<input type="text" class="form-control" name="ux_subscriber_border_hover_color" disabled id="ux_subscriber_border_hover_color" value="#ffffff">
													<i class="controls-description"><?php echo esc_attr( $csb_button_settings_hover_border_tooltip ); ?></i>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php echo esc_attr( $csb_font_family ); ?> :
														<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
													</label>
													<div class="input-icon right">
														<select class="form-control" name="ux_ddl_font_family_button_subscriber" id="ux_ddl_font_family_button_subscriber">
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
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php echo esc_attr( $csb_button_settings_label_alignment ); ?> :
														<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
													</label>
													<select class="form-control" name="ux_ddl_subscriber_label_alignment" id="ux_ddl_subscriber_label_alignment" value="center">
														<option value="left" disabled ><?php echo esc_attr( $csb_left ); ?></option>
														<option value="right" disabled ><?php echo esc_attr( $csb_right ); ?></option>
														<option value="center"><?php echo esc_attr( $csb_center ); ?></option>
													</select>
													<i class="controls-description"><?php echo esc_attr( $csb_button_settings_label_alignment_tooltip ); ?></i>
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
														<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_sub_margin_button[]" disabled id="ux_txt_sub_margin_top_button" value="10">
														<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_sub_margin_button[]" disabled id="ux_txt_sub_margin_right_button" value="10">
														<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_sub_margin_button[]" disabled id="ux_txt_sub_margin_bottom_button" value="0">
														<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_sub_margin_button[]" disabled id="ux_txt_sub_margin_left_button" value="10">
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
														<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_sub_padding_button[]" disabled id="ux_txt_sub_padding_top_button" value="12" >
														<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_sub_padding_button[]" disabled id="ux_txt_sub_padding_right_button" value="30" >
														<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_sub_padding_button[]" disabled id="ux_txt_sub_padding_bottom_button" value="11" >
														<input type="text" class="form-control custom-input-xsmall input-inline" name="ux_txt_sub_padding_button[]" disabled id="ux_txt_sub_padding_left_button" value="30" >
													</div>
													<i class="controls-description"><?php echo esc_attr( $csb_heading_settings_padding_tooltip ); ?></i>
												</div>
											</div>
										</div>
									</div>
								<div id="ux_contact_button">
									<div class="form-group">
										<label class="control-label">
											<?php echo esc_attr( $csb_button_settings_contact_button_name ); ?> :
											<span class="required" aria-required="true">*</span>
										</label>
										<input type="text" class="form-control" name="ux_txt_contact_button_label" id="ux_txt_contact_button_label" placeholder="<?php echo esc_attr( $csb_button_settings_contact_button_name_placeholder ); ?>" value="<?php echo isset( $layout_button_settings_data_unserialize['layout_contact_button_name'] ) ? esc_attr( $layout_button_settings_data_unserialize['layout_contact_button_name'] ) : 'More Information'; ?>">
										<i class="controls-description"><?php echo esc_attr( $csb_button_label_tooltip ); ?></i>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $csb_button_settings_button_color ); ?> :
													<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
												</label>
												<input type="text" class="form-control" name="ux_layout_contact_button_color" disabled id="ux_layout_contact_button_color" value="#ffffff">
												<i class="controls-description"><?php echo esc_attr( $csb_button_setting_button_color_tooltip ); ?></i>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $csb_font_style ); ?> :
													<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
												</label>
												<div class="input-icon right">
													<select class="form-control custom-input-medium" name="ux_ddl_font_style_layout_contact_button[]" id="ux_ddl_font_style_layout_contact_button">
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
													<input type="text" name="ux_ddl_font_style_layout_contact_button[]" disabled id="ux_ddl_contact_font_style" class="form-control input-inline custom-input-medium" value="#d61c38">
												</div>
												<i class="controls-description"><?php echo esc_attr( $csb_button_settings_font_style_tooltip ); ?></i>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $csb_hover_color ); ?> :
													<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
												</label>
												<input type="text" class="form-control" name="ux_layout_contact_hover_color" disabled id="ux_layout_contact_hover_color" value="#d61c38">
												<i class="controls-description"><?php echo esc_attr( $csb_button_settings_hover_color_tooltip ); ?></i>
											</div>
										</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_button_settings_text_hover_color ); ?> :
												<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<input type="text" class="form-control" name="ux_layout_contact_text_hover_color" disabled id="ux_layout_contact_text_hover_color" value="#ffffff">
											<i class="controls-description"><?php echo esc_attr( $csb_button_settings_text_hover_color_tooltip ); ?></i>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_background_border_color_label ); ?> :
												<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<input type="text" class="form-control" name="ux_layout_contact_border_color" disabled id="ux_layout_contact_border_color" value="#ffffff">
											<i class="controls-description"><?php echo esc_attr( $csb_background_border_color_tooltip ); ?></i>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_button_settings_hover_border_color ); ?> :
												<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<input type="text" class="form-control" name="ux_layout_contact_border_hover_color" disabled id="ux_layout_contact_border_hover_color" value="#d61c38">
											<i class="controls-description"><?php echo esc_attr( $csb_button_settings_hover_border_tooltip ); ?></i>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_font_family ); ?> :
												<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<div class="input-icon right">
												<select class="form-control" name="ux_ddl_layout_contact_font_family_button" id="ux_ddl_layout_contact_font_family_button">
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
								<div class="col-md-6">
									<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_button_settings_label_alignment ); ?> :
												<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<select class="form-control" name="ux_ddl_layout_contact_label_alignment" id="ux_ddl_layout_contact_label_alignment" value="center">
												<option value="left" disabled ><?php echo esc_attr( $csb_left ); ?></option>
												<option value="right" disabled ><?php echo esc_attr( $csb_right ); ?></option>
												<option value="center"><?php echo esc_attr( $csb_center ); ?></option>
											</select>
											<i class="controls-description"><?php echo esc_attr( $csb_button_settings_label_alignment_tooltip ); ?></i>
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
												<input type="text" class="form-control custom-input-xsmall input-inline" disabled name="ux_txt_margin_button[]" id="ux_txt_margin_top_button" value="10"  onblur="change_value_settings_coming_soon_booster('#ux_txt_margin_top_button', '10')" onfocus="prevent_paste_coming_soon_booster(this.id)">
												<input type="text" class="form-control custom-input-xsmall input-inline" disabled name="ux_txt_margin_button[]" id="ux_txt_margin_right_button" value="10"  onblur="change_value_settings_coming_soon_booster('#ux_txt_margin_right_button', '10')" onfocus="prevent_paste_coming_soon_booster(this.id)">
												<input type="text" class="form-control custom-input-xsmall input-inline" disabled name="ux_txt_margin_button[]" id="ux_txt_margin_bottom_button" value="0" onblur="change_value_settings_coming_soon_booster('#ux_txt_margin_bottom_button', '0')" onfocus="prevent_paste_coming_soon_booster(this.id)">
												<input type="text" class="form-control custom-input-xsmall input-inline" disabled name="ux_txt_margin_button[]" id="ux_txt_margin_left_button" value="0" onblur="change_value_settings_coming_soon_booster('#ux_txt_margin_left_button', '0')" onfocus="prevent_paste_coming_soon_booster(this.id)">
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
												<input type="text" class="form-control custom-input-xsmall input-inline" disabled name="ux_txt_padding_button[]" id="ux_txt_padding_top_button" value="12" >
												<input type="text" class="form-control custom-input-xsmall input-inline" disabled name="ux_txt_padding_button[]" id="ux_txt_padding_right_button" value="40" >
												<input type="text" class="form-control custom-input-xsmall input-inline" disabled name="ux_txt_padding_button[]" id="ux_txt_padding_bottom_button" value="12" >
												<input type="text" class="form-control custom-input-xsmall input-inline" disabled name="ux_txt_padding_button[]" id="ux_txt_padding_left_button" value="40">
											</div>
											<i class="controls-description"><?php echo esc_attr( $csb_heading_settings_padding_tooltip ); ?></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="line-separator"></div>
						<div class="form-actions">
							<div class="pull-right">
								<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
								<input type="submit" class="btn vivid-green" id="btn_save_button_settings" name="btn_save_button_settings" value="<?php echo esc_attr( $csb_save_changes ); ?>">
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
				<a href="admin.php?page=csb_loader_settings">
					<?php echo esc_attr( $csb_layout_settings_label ); ?>
				</a>
				<span>></span>
			</li>
			<li>
				<span>
					<?php echo esc_attr( $csb_layout_settings_button_settings_label ); ?>
				</span>
			</li>
		</ul>
		</div>
		<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-custom-cursor-move"></i>
						<?php echo esc_attr( $csb_layout_settings_button_settings_label ); ?>
					</div>
				</div>
				<div class="portlet-body form">
					<form id="ux_frm_layout_button_settings">
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
