<?php
/**
 * Template for subscription textbox settings.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/views/subscription
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
	} elseif ( SUBSCRIPTION_COMING_SOON_BOOSTER === '1' ) {
		$csb_textbox_settings = wp_create_nonce( 'coming_soon_booster_textbox_settings' );
		$padding              = explode( ',', isset( $textbox_settings_subscription_data_unserialize['textbox_padding_subscription'] ) ? $textbox_settings_subscription_data_unserialize['textbox_padding_subscription'] : '' );
		$margin               = explode( ',', isset( $textbox_settings_subscription_data_unserialize['textbox_margin_subscription'] ) ? $textbox_settings_subscription_data_unserialize['textbox_margin_subscription'] : '' );
		$font_style           = explode( ',', isset( $textbox_settings_subscription_data_unserialize['textbox_font_style_subscription'] ) ? $textbox_settings_subscription_data_unserialize['textbox_font_style_subscription'] : '' );
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
					<a href="admin.php?page=csb_subscription_background_settings">
						<?php echo esc_attr( $csb_subscription_label ); ?>
					</a>
					<span>></span>
				</li>
				<li>
					<span>
						<?php echo esc_attr( $csb_textbox_settings_label ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-frame"></i>
							<?php echo esc_attr( $csb_textbox_settings_label ); ?>
						</div>
						<p class="premium-editions">
							<?php echo esc_attr( $csb_upgrade_need_help ); ?><a href="https://tech-banker.com/coming-soon-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_documentation ); ?></a><?php echo esc_attr( $csb_read_and_check ); ?><a href="https://tech-banker.com/coming-soon-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_demos_section ); ?></a>
						</p>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_textbox_settings">
							<div class="form-body">
								<div class="form-actions">
									<div class="pull-right">
										<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
										<input type="submit" class="btn vivid-green" id="btn_save_textbox_settings" name="btn_save_textbox_settings" value="<?php echo esc_attr( $csb_save_changes ); ?>">
									</div>
								</div>
								<div class="line-separator"></div>
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $csb_textbox_placeholder_label ); ?> :
										<span class="required" aria-required="true">*</span>
									</label>
									<input type="text" class="form-control" name="ux_txt_textbox_plceholder" id="ux_txt_textbox_plceholder" placeholder="<?php echo esc_attr( $csb_textbox_label_placeholder ); ?>" value="<?php echo isset( $textbox_settings_subscription_data_unserialize['textbox_placeholder_subscription'] ) ? esc_attr( $textbox_settings_subscription_data_unserialize['textbox_placeholder_subscription'] ) : 'Valid Email Address'; ?>">
									<i class="controls-description"><?php echo esc_attr( $csb_textbox_name_placeholder_tooltip ); ?></i>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_font_style ); ?> :
												<span class="required" aria-required="true">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<div class="input-icon right">
												<select class="form-control custom-input-medium" name="ux_ddl_font_style_textbox_subscription[]" id="ux_ddl_font_style_subscription">
													<?php
													for ( $flag = 1; $flag <= 200; $flag++ ) {
														$font_style_type = '30' == $flag ? '' : 'disabled = disabled';// WPCS: loose Comparison ok.
														if ( $flag < 10 ) {
															?>
																<option <?php echo esc_attr( $font_style_type ); ?> value="<?php echo intval( $flag ); ?>px">0<?php echo intval( $flag ); ?> Px</option>
																<?php
														} else {
															?>
																<option <?php echo esc_attr( $font_style_type ); ?> value="<?php echo intval( $flag ); ?>px"><?php echo intval( $flag ); ?> Px</option>
																<?php
														}
													}
													?>
												</select>
												<input type="text" name="ux_ddl_font_style_textbox_subscription[]" id="ux_clr_textbox_settings_subscription" disabled = 'disabled' class="form-control input-inline custom-input-medium" value='#282931'>
											</div>
											<i class="controls-description"><?php echo esc_attr( $csb_button_settings_font_style_tooltip ); ?></i>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_font_family ); ?> :
												<span class="required" aria-required="true">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<div class="input-icon right">
												<select class="form-control" name="ux_ddl_font_family_textbox_subscription" id="ux_ddl_font_family_textbox_subscription">
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
												<?php echo esc_attr( $csb_textbox_color_label ); ?> :
												<span class="required" aria-required="true">*</span>
											</label>
											<input type="text" class="form-control" name="ux_clr_textbox_color" id="ux_clr_textbox_color" placeholder="<?php echo esc_attr( $csb_textbox_color_placeholder ); ?>" onfocus="pick_color_coming_soon_booster('#ux_clr_textbox_color', '<?php echo esc_attr( $textbox_settings_subscription_data_unserialize['textbox_color_subscription'] ); ?>');" onblur="change_value_settings_coming_soon_booster('#ux_clr_textbox_color', '#ffffff')" value="<?php echo isset( $textbox_settings_subscription_data_unserialize['textbox_color_subscription'] ) ? esc_attr( $textbox_settings_subscription_data_unserialize['textbox_color_subscription'] ) : ''; ?>">
											<i class="controls-description"><?php echo esc_attr( $csb_background_color_tooltip ); ?></i>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_button_settings_label_alignment ); ?> :
												<span class="required" aria-required="true">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<select class="form-control" name="ux_ddl_placeholder_alignment" id="ux_ddl_placeholder_alignment" value="<?php echo isset( $textbox_settings_subscription_data_unserialize['textbox_placeholder_alignment_subscription'] ) ? esc_attr( $textbox_settings_subscription_data_unserialize['textbox_placeholder_alignment_subscription'] ) : ''; ?>">
												<option disabled="disabled" value="left"><?php echo esc_attr( $csb_left ); ?></option>
												<option disabled="disabled" value="right"><?php echo esc_attr( $csb_right ); ?></option>
												<option disabled="disabled" value="center"><?php echo esc_attr( $csb_center ); ?></option>
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
												<span class="required" aria-required="true">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<div class="input-icon right">
												<input type="text" class="form-control custom-input-xsmall input-inline" disabled="disabled" name="ux_txt_margin_textbox[]" id="ux_txt_margin_top_textbox" value="0">
												<input type="text" class="form-control custom-input-xsmall input-inline" disabled="disabled" name="ux_txt_margin_textbox[]" id="ux_txt_margin_right_textbox" value="0">
												<input type="text" class="form-control custom-input-xsmall input-inline" disabled="disabled" name="ux_txt_margin_textbox[]" id="ux_txt_margin_bottom_textbox" value="0">
												<input type="text" class="form-control custom-input-xsmall input-inline" disabled="disabled" name="ux_txt_margin_textbox[]" id="ux_txt_margin_left_textbox" value="0">
											</div>
											<i class="controls-description"><?php echo esc_attr( $csb_heading_settings_margin_tooltip ); ?></i>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_padding_px ); ?> :
												<span class="required" aria-required="true">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<div class="input-icon right">
												<input type="text" class="form-control custom-input-xsmall input-inline" disabled="disabled" name="ux_txt_padding_textbox[]" id="ux_txt_padding_top_textbox" value="0">
												<input type="text" class="form-control custom-input-xsmall input-inline" disabled="disabled" name="ux_txt_padding_textbox[]" id="ux_txt_padding_right_textbox" value="0">
												<input type="text" class="form-control custom-input-xsmall input-inline" disabled="disabled" name="ux_txt_padding_textbox[]" id="ux_txt_padding_bottom_textbox" value="0">
												<input type="text" class="form-control custom-input-xsmall input-inline" disabled="disabled" name="ux_txt_padding_textbox[]" id="ux_txt_padding_left_textbox" value="0">
											</div>
											<i class="controls-description"><?php echo esc_attr( $csb_heading_settings_padding_tooltip ); ?></i>
										</div>
									</div>
								</div>
								<div class="line-separator"></div>
								<div class="form-actions">
									<div class="pull-right">
										<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
										<input type="submit" class="btn vivid-green" id="btn_save_textbox_settings" name="btn_save_textbox_settings" value="<?php echo esc_attr( $csb_save_changes ); ?>">
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
						<a href="admin.php?page=csb_subscription_background_settings">
							<?php echo esc_attr( $csb_subscription_label ); ?>
						</a>
						<span>></span>
					</li>
			<li>
				<span>
					<?php echo esc_attr( $csb_textbox_settings_label ); ?>
				</span>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-custom-frame"></i>
							<?php echo esc_attr( $csb_textbox_settings_label ); ?>
					</div>
				</div>
				<div class="portlet-body form">
					<form id="ux_frm_subscriptions_textbox_settings">
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
