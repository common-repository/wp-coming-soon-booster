<?php
/**
 * Template for layout logo settings.
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
		$csb_logo_settings = wp_create_nonce( 'coming_soon_booster_logo_settings' );
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
					<?php echo esc_attr( $csb_layout_logo_settings_label ); ?>
				</span>
			</li>
		</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-settings"></i>
							<?php echo esc_attr( $csb_layout_logo_settings_label ); ?>
						</div>
						<p class="premium-editions">
							<?php echo esc_attr( $csb_upgrade_need_help ); ?><a href="https://tech-banker.com/coming-soon-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_documentation ); ?></a><?php echo esc_attr( $csb_read_and_check ); ?><a href="https://tech-banker.com/coming-soon-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_demos_section ); ?></a>
						</p>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_logo_settings">
							<div class="form-body">
								<div class="form-actions">
									<div class="pull-right">
										<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
										<input type="submit" class="btn vivid-green" id="ux_btn_save_logo_settings" name="ux_btn_save_logo_settings" value="<?php echo esc_attr( $csb_save_changes ); ?>">
									</div>
								</div>
								<div class="line-separator"></div>
									<div class="form-group">
										<label class="control-label">
											<?php echo esc_attr( $csb_layout_logo_settings_label ); ?> :
											<span class="required" aria-required="true">*</span>
										</label>
										<select class="form-control" name="ux_ddl_font_logo" id="ux_ddl_font_logo" onchange="change_settings_coming_soon_booster('#ux_ddl_font_logo', '#ux_div_logo');">
											<option value="show"><?php echo esc_attr( $csb_show ); ?></option>
											<option value="hide"><?php echo esc_attr( $csb_hide ); ?></option>
										</select>
										<i class="controls-description"><?php echo esc_attr( $csb_logo_settings_tooltip ); ?></i>
									</div>
									<div id="ux_div_logo" style="display:none;">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label">
														<?php echo esc_attr( $csb_logo_settings_type_title ); ?> :
														<span class="required" aria-required="true">*</span>
													</label>
													<select class="form-control" name="ux_rdl_font_logo_type" id="ux_rdl_font_logo_type" onchange="change_type_coming_soon_booster()">>
														<option value="image"><?php echo esc_attr( $csb_logo_settings_title ); ?></option>
														<option value="text"><?php echo esc_attr( $csb_logo_settings_text ); ?></option>
													</select>
													<i class="controls-description"><?php echo esc_attr( $csb_logo_settings_type_tooltip ); ?></i>
												</div>
											</div>
										</div>
										<div id="ux_div_logo_text" style="display:none;">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php echo esc_attr( $csb_logo_settings_text_title ); ?> :
															<span style="color:red"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
														</label>
														<input type="text" class="form-control" name="ux_txt_logo_type" id="ux_txt_logo_type" value="Coming Soon Booster">
														<i class="controls-description"><?php echo esc_attr( $csb_logo_settings_text_tooltip ); ?></i>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php echo esc_attr( $csb_font_size ); ?> :
															<span style="color:red"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
														</label>
														<select class="form-control" name="ux_ddl_font_style" id="ux_ddl_font_style">
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
														<i class="controls-description"><?php echo esc_attr( $csb_font_size_settings_tooltip ); ?></i>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php echo esc_attr( $csb_font_family ); ?> :
															<span style="color:red"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
														</label>
														<div class="input-icon right">
															<select class="form-control" name="ux_ddl_font_family" id="ux_ddl_font_family">
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
															<?php echo esc_attr( $csb_font_color ); ?> :
															<span style="color:red"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
														</label>
														<input type="text" class="form-control" name="ux_txt_font_color" id="ux_txt_font_color" value="#ffffff" onfocus="pick_color_coming_soon_booster('#ux_txt_font_color', '<?php echo '#ffffff'; ?>');" >
														<i class="controls-description"><?php echo esc_attr( $csb_logo_settings_color_tooltip ); ?></i>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php echo esc_attr( $csb_logo_html_property_label ); ?> :
															<span style="color:red"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
														</label>
														<select class="form-control" name="ux_ddl_html_tag_property" id="ux_ddl_html_tag_property" onchange="change_type_coming_soon_booster();">
															<option value="h1">H1</option>
															<option value="h2">H2</option>
															<option value="h3">H3</option>
															<option value="h4">H4</option>
															<option value="h5">H5</option>
															<option value="h6">H6</option>
															<option value="p"><?php echo esc_attr( $csb_logo_html_property_p ); ?></option>
														</select>
														<i class="controls-description"><?php echo esc_attr( $csb_logo_html_property_tooltip ); ?></i>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php echo esc_attr( $csb_logo_settings_link_title ); ?> :
															<span style="color:red"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
														</label>
														<select class="form-control" name="ux_ddl_text_logo_link" id="ux_ddl_text_logo_link" onchange="change_settings_coming_soon_booster('#ux_ddl_text_logo_link', '#ux_div_logo_text_link');">
															<option value="show"><?php echo esc_attr( $csb_show ); ?></option>
															<option value="hide"><?php echo esc_attr( $csb_hide ); ?></option>
														</select>
														<i class="controls-description"><?php echo esc_attr( $csb_logo_settings_link_tooltip ); ?></i>
													</div>
												</div>
											</div>
											<div id="ux_div_logo_text_link" style="display:none;">
												<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php echo esc_attr( $csb_logo_settings_link_title_path ); ?> :
															<span style="color:red"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
														</label>
														<input type="text" class="form-control" name="ux_txt_text_logo_link" id="ux_txt_text_logo_link" value="<?php echo isset( $logo_data_unserialize['text_logo_link_path'] ) ? esc_attr( $logo_data_unserialize['text_logo_link_path'] ) : ''; ?>" placeholder="<?php echo esc_attr( $csb_logo_settings_link_placeholder ); ?>">
														<i class="controls-description"><?php echo esc_attr( $csb_logo_settings_valid_link_tooltip ); ?></i>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php echo esc_attr( $csb_logo_settings_target ); ?> :
															<span style="color:red"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
														</label>
														<select class="form-control" name="ux_ddl_text_logo_link_target" id="ux_ddl_text_logo_link_target">
															<option value="_self"><?php echo esc_attr( $csb_logo_settings_target_self ); ?></option>
															<option value="_blank"><?php echo esc_attr( $csb_logo_settings_target_blank ); ?></option>
														</select>
														<i class="controls-description"><?php echo esc_attr( $csb_logo_settings_target_tooltip ); ?></i>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div id="ux_div_logo_img" style="display: none;">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php echo esc_attr( $csb_logo_settings_image_title ); ?> :
														<span class="required" aria-required="true">*</span>
													</label>
													<div class="input-icon right">
														<input type="text" class="form-control input-inline custom-input-img" readonly="readonly" name="ux_txt_logo_text" id="ux_txt_logo_text" value="<?php echo isset( $logo_data_unserialize['logo_image'] ) ? esc_attr( $logo_data_unserialize['logo_image'] ) : ''; ?>" placeholder="<?php echo esc_attr( $csb_logo_settings_image_placeholder ); ?>">
														<a class="btn vivid-green custom-btn-lg" id="wp_media_upload_button"><?php echo esc_attr( $csb_upload ); ?></a>
														<p id="wp_media_upload_error_message" class="wp-media-error-message"><?php echo esc_attr( $csb_media_error_settings_message ); ?></p>
													</div>
													<i class="controls-description"><?php echo esc_attr( $csb_logo_settings_image_tooltip ); ?></i>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php echo esc_attr( $csb_logo_settings_link_title ); ?> :
														<span class="required" aria-required="true">*</span>
													</label>
													<select class="form-control" name="ux_ddl_logo_link" id="ux_ddl_logo_link" onchange="change_settings_coming_soon_booster('#ux_ddl_logo_link', '#ux_div_logo_link');">
														<option value="show"><?php echo esc_attr( $csb_show ); ?></option>
														<option value="hide"><?php echo esc_attr( $csb_hide ); ?></option>
													</select>
													<i class="controls-description"><?php echo esc_attr( $csb_logo_settings_link_tooltip ); ?></i>
												</div>
											</div>
										</div>
										<div id="ux_div_logo_link" style="display:none;">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php echo esc_attr( $csb_logo_settings_link_title_path ); ?> :
															<span class="required" aria-required="true">*</span>
														</label>
														<input type="text" class="form-control" name="ux_txt_logo_link" id="ux_txt_logo_link" value="<?php echo isset( $logo_data_unserialize['logo_link_text'] ) ? esc_attr( $logo_data_unserialize['logo_link_text'] ) : ''; ?>" placeholder="<?php echo esc_attr( $csb_logo_settings_link_placeholder ); ?>">
														<i class="controls-description"><?php echo esc_attr( $csb_logo_settings_valid_link_tooltip ); ?></i>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php echo esc_attr( $csb_logo_settings_target ); ?> :
															<span class="required" aria-required="true">*</span>
														</label>
														<select class="form-control" name="ux_ddl_img_logo_link_target" id="ux_ddl_img_logo_link_target">
															<option value="_self"><?php echo esc_attr( $csb_logo_settings_target_self ); ?></option>
															<option value="_blank"><?php echo esc_attr( $csb_logo_settings_target_blank ); ?></option>
														</select>
														<i class="controls-description"><?php echo esc_attr( $csb_logo_settings_target_tooltip ); ?></i>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_logo_settings_size_title ); ?> :
												<span class="required" aria-required="true">*</span>
											</label>
											<select class="form-control" name="ux_ddl_logo_size" id="ux_ddl_logo_size" onchange="change_size_coming_soon_booster();">
												<option value="custom"><?php echo esc_attr( $csb_logo_settings_custom ); ?></option>
												<option value="default"><?php echo esc_attr( $csb_logo_settings_default ); ?></option>
											</select>
											<i class="controls-description"><?php echo esc_attr( $csb_logo_settings_size_tooltip ); ?></i>
										</div>
										<div id="ux_div_width" style="display:none;">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label">
															<?php echo esc_attr( $csb_logo_settings_width_title ); ?> :
															<span class="required" aria-required="true">*</span>
														</label>
														<input type="text" class="form-control" name="ux_txt_width" id="ux_txt_width" maxlength="4" onkeypress="validate_digits_coming_soon_booster(event)" onblur="change_value_settings_coming_soon_booster('#ux_txt_width', '300')" value="<?php echo isset( $logo_data_unserialize['max_width'] ) ? intval( $logo_data_unserialize['max_width'] ) : ''; ?>" placeholder="<?php echo esc_attr( $csb_logo_settings_width_placeholder ); ?>" onfocus="prevent_paste_coming_soon_booster(this.id);">
														<i class="controls-description"><?php echo esc_attr( $csb_logo_settings_width_tooltip ); ?></i>
													</div>
												</div>
												<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														<?php echo esc_attr( $csb_logo_settings_height_title ); ?> :
														<span class="required" aria-required="true">*</span>
													</label>
													<input type="text" class="form-control" name="ux_txt_height" id="ux_txt_height" maxlength="4" onkeypress="validate_digits_coming_soon_booster(event);" onblur="change_value_settings_coming_soon_booster('#ux_txt_height', '150');" value="<?php echo isset( $logo_data_unserialize['max_height'] ) ? intval( $logo_data_unserialize['max_height'] ) : ''; ?>" placeholder="<?php echo esc_attr( $csb_logo_settings_height_placeholder ); ?>" onfocus="prevent_paste_coming_soon_booster(this.id);">
													<i class="controls-description"><?php echo esc_attr( $csb_logo_settings_height_tooltip ); ?></i>
												</div>
											</div>
										</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											<?php echo esc_attr( $csb_margin_px ); ?> :
											<span style="color:red"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
										</label>
										<div class="input-icon right">
											<input type="text" disabled class="form-control custom-input-xsmall input-inline" name="ux_txt_logo_margin_text[]" id="ux_txt_logo_margin_top_text" value="20">
											<input type="text" disabled class="form-control custom-input-xsmall input-inline" name="ux_txt_logo_margin_text[]" id="ux_txt_logo_margin_right_text" value="10">
											<input type="text" disabled class="form-control custom-input-xsmall input-inline" name="ux_txt_logo_margin_text[]" id="ux_txt_logo_margin_bottom_text" value="0">
											<input type="text" disabled class="form-control custom-input-xsmall input-inline" name="ux_txt_logo_margin_text[]" id="ux_txt_logo_margin_left_text" value="35">
										</div>
										<i class="controls-description"><?php echo esc_attr( $csb_heading_settings_margin_tooltip ); ?></i>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											<?php echo esc_attr( $csb_padding_px ); ?> :
											<span style="color:red"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
										</label>
										<div class="input-icon right">
											<input type="text" disabled class="form-control custom-input-xsmall input-inline" name="ux_txt_logo_padding_text[]" id="ux_txt_logo_padding_top_text" value="15">
											<input type="text" disabled class="form-control custom-input-xsmall input-inline" name="ux_txt_logo_padding_text[]" id="ux_txt_logo_padding_right_text" value="10">
											<input type="text" disabled class="form-control custom-input-xsmall input-inline" name="ux_txt_logo_padding_text[]" id="ux_txt_logo_padding_bottom_text" value="0">
											<input type="text" disabled class="form-control custom-input-xsmall input-inline" name="ux_txt_logo_padding_text[]" id="ux_txt_logo_padding_left_text" value="35">
										</div>
										<i class="controls-description"><?php echo esc_attr( $csb_heading_settings_padding_tooltip ); ?></i>
									</div>
								</div>
							</div>
							<div class="line-separator"></div>
								<div class="form-actions">
									<div class="pull-right">
										<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
										<input type="submit" class="btn vivid-green" id="ux_btn_save_logo_settings" name="ux_btn_save_logo_settings" value="<?php echo esc_attr( $csb_save_changes ); ?>">
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
				<a href="admin.php?page=csb_loader_settings">
					<?php echo esc_attr( $csb_layout_settings_label ); ?>
				</a>
				<span>></span>
			</li>
			<li>
				<span>
					<?php echo esc_attr( $csb_layout_logo_settings_label ); ?>
				</span>
			</li>
		</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-settings"></i>
							<?php echo esc_attr( $csb_layout_logo_settings_label ); ?>
						</div>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_logo_settings">
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
