<?php
/**
 * Template for subscription heading settings.
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
		$csb_heading_settings = wp_create_nonce( 'coming_soon_booster_heading_settings' );
		?>
		</script>
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
						<?php echo esc_attr( $csb_form_title ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-pencil"></i>
							<?php echo esc_attr( $csb_form_title ); ?>
						</div>
						<p class="premium-editions">
							<?php echo esc_attr( $csb_upgrade_need_help ); ?><a href="https://tech-banker.com/coming-soon-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_documentation ); ?></a><?php echo esc_attr( $csb_read_and_check ); ?><a href="https://tech-banker.com/coming-soon-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_demos_section ); ?></a>
						</p>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_subscription_heading_settings">
							<div class="form-body">
								<div class="form-actions">
									<div class="pull-right">
										<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
										<input type="submit" class="btn vivid-green" id="btn_save_heading" name="btn_save_heading" value="<?php echo esc_attr( $csb_save_changes ); ?>">
									</div>
								</div>
								<div class="line-separator"></div>
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $csb_form_title ); ?> :
										<span class="required" aria-required="true">*</span>
									</label>
									<select class="form-control" name="ux_ddl_heading_settings_subscription" id="ux_ddl_heading_settings_subscription" onchange="change_settings_coming_soon_booster('#ux_ddl_heading_settings_subscription', '#ux_div_heading_text_subscription');">
										<option value="show"><?php echo esc_attr( $csb_show ); ?></option>
										<option value="hide"><?php echo esc_attr( $csb_hide ); ?></option>
									</select>
									<i class="controls-description"><?php echo esc_attr( $csb_form_heading_settings_tooltip ); ?></i>
								</div>
								<div id="ux_div_heading_text_subscription" style="display:none">
									<div class="form-group">
										<label class="control-label">
											<?php echo esc_attr( $csb_heading_settings_text_title ); ?> :
											<span class="required" aria-required="true">*</span>
										</label>
										<?php
										$heading_settings_subscription_editor = isset( $heading_settings_subscription_data_unserialize['heading_text_subscription'] ) ? htmlspecialchars_decode( $heading_settings_subscription_data_unserialize['heading_text_subscription'] ) : '';
										wp_editor( $heading_settings_subscription_editor, 'ux_heading_content_subscription', array(
											'media_buttons' => false,
											'textarea_rows' => 8,
											'tabindex' => 4,
										) );
										?>
									<textarea style="display:none;" id="ux_txtarea_heading_content_subscription" name="ux_txtarea_heading_content_subscription"><?php echo esc_attr( $heading_settings_subscription_editor ); ?></textarea>
									<i class="controls-description"><?php echo esc_attr( $csb_heading_settings_text_tooltip ); ?></i>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_font_style ); ?> :
												<span class="required" aria-required="true">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<div class="input-icon right">
												<select class="form-control custom-input-medium" name="ux_ddl_font_style_heading_subscription[]" id="ux_ddl_font_style_heading_subscription">
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
												<input type="text" name="ux_ddl_font_style_countdown[]" id="ux_txt_clr_countdown" class="form-control input-inline custom-input-medium" disabled="disabled" value="#ffffff">
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
													<select class="form-control" name="ux_ddl_font_family_heading_subscription" id="ux_ddl_font_family_heading_subscription">
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
													<span class="required" aria-required="true">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
												</label>
												<div class="input-icon right">
													<input type="text" class="form-control custom-input-xsmall input-inline" readonly name="ux_txt_heading_margin_text[]" id="ux_txt_margin_top_text"  value="0">
													<input type="text" class="form-control custom-input-xsmall input-inline" readonly name="ux_txt_heading_margin_text[]" id="ux_txt_margin_right_text"  value="0">
													<input type="text" class="form-control custom-input-xsmall input-inline" readonly name="ux_txt_heading_margin_text[]" id="ux_txt_margin_bottom_text"  value="0">
													<input type="text" class="form-control custom-input-xsmall input-inline" readonly name="ux_txt_heading_margin_text[]" id="ux_txt_margin_left_text"  value="0">
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
													<input type="text" class="form-control custom-input-xsmall input-inline" readonly  name="ux_txt_heading_padding_text[]" id="ux_txt_padding_top_text" value="0">
													<input type="text" class="form-control custom-input-xsmall input-inline" readonly  name="ux_txt_heading_padding_text[]" id="ux_txt_padding_right_text" value="0">
													<input type="text" class="form-control custom-input-xsmall input-inline" readonly  name="ux_txt_heading_padding_text[]" id="ux_txt_padding_bottom_text" value="0">
													<input type="text" class="form-control custom-input-xsmall input-inline" readonly name="ux_txt_heading_padding_text[]" id="ux_txt_padding_left_text" value="0">
												</div>
												<i class="controls-description"><?php echo esc_attr( $csb_heading_settings_padding_tooltip ); ?></i>
											</div>
										</div>
									</div>
									<div class="line-separator"></div>
									<div class="form-actions">
										<div class="pull-right">
											<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
											<input type="submit" class="btn vivid-green" id="btn_save_heading" name="btn_save_heading" value="<?php echo esc_attr( $csb_save_changes ); ?>">
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
				<a href="admin.php?page=csb_subscription_background_settings">
					<?php echo esc_attr( $csb_subscription_label ); ?>
				</a>
				<span>></span>
			</li>
			<li>
				<span>
					<?php echo esc_attr( $csb_form_title ); ?>
				</span>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-custom-pencil"></i>
							<?php echo esc_attr( $csb_form_title ); ?>
					</div>
				</div>
				<div class="portlet-body form">
					<form id="ux_frm_subscriptions_heading_settings">
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
