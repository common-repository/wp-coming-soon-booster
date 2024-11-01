<?php
/**
 * Template for countdown settings.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/views/countdown
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
	} elseif ( COUNTDOWN_COMING_SOON_BOOSTER === '1' ) {
		$csb_countdown = wp_create_nonce( 'coming_soon_booster_countdown' );
		$padding       = explode( ',', isset( $countdown_data_unserialize['padding_countdown'] ) ? $countdown_data_unserialize['padding_countdown'] : '' );
		$margin        = explode( ',', isset( $countdown_data_unserialize['margin_countdown'] ) ? $countdown_data_unserialize['margin_countdown'] : '' );
		$font_style    = explode( ',', isset( $countdown_data_unserialize['font_style_countdown'] ) ? $countdown_data_unserialize['font_style_countdown'] : '' );
		$launch_time   = explode( ',', isset( $countdown_data_unserialize['launch_time'] ) ? $countdown_data_unserialize['launch_time'] : '' );
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
						<?php echo esc_attr( $csb_countdown_label ); ?>
				</span>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-custom-hourglass"></i>
						<?php echo esc_attr( $csb_countdown_label ); ?>
				</div>
				<p class="premium-editions">
					<?php echo esc_attr( $csb_upgrade_need_help ); ?><a href="https://tech-banker.com/coming-soon-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_documentation ); ?></a><?php echo esc_attr( $csb_read_and_check ); ?><a href="https://tech-banker.com/coming-soon-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_demos_section ); ?></a>
				</p>
			</div>
			<div class="portlet-body form">
				<form id="ux_frm_countdown">
					<div class="form-body">
						<div class="form-actions">
							<div class="pull-right">
								<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
								<input type="submit" class="btn vivid-green" id="btn_save_settings_countdown" name="btn_save_settings_countdown" value="<?php echo esc_attr( $csb_save_changes ); ?>">
							</div>
						</div>
						<div class="line-separator"></div>
							<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_countdown_label ); ?> :
									<span class="required" aria-required="true">*</span>
								</label>
								<select class="form-control" name="ux_ddl_countdown_timer" id="ux_ddl_countdown_timer" onchange="change_settings_coming_soon_booster('#ux_ddl_countdown_timer', '#ux_div_countdown_timer');">
									<option value="show"><?php echo esc_attr( $csb_show ); ?></option>
									<option value="hide"><?php echo esc_attr( $csb_hide ); ?></option>
								</select>
								<i class="controls-description"><?php echo esc_attr( $csb_countdown_timer_tooltip ); ?></i>
							</div>
							<div id="ux_div_countdown_timer">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_countdown_launch_date_label ); ?> :
												<span class="required" aria-required="true">*</span>
											</label>
											<input type="text" class="form-control" onfocus="prevent_datepicker('#ux_txt_start_date');" name="ux_txt_start_date" id="ux_txt_start_date" placeholder="<?php echo esc_attr( $csb_countdown_launch_date_placeholder ); ?>" value="<?php echo isset( $countdown_data_unserialize['launch_date'] ) ? esc_attr( $countdown_data_unserialize['launch_date'] ) : ''; ?>">
											<i class="controls-description"><?php echo esc_attr( $csb_countdown_launch_date_tooltip ); ?></i>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_countdown_launch_time_label ); ?> :
												<span class="required" aria-required="true">*</span>
											</label>
											<div class="input-icon right">
												<select class="form-control custom-input-width-time input-inline" name="ux_ddl_hr_min_sec[]" id="ux_ddl_hours">
													<?php
													for ( $hours = 0; $hours <= 23; $hours++ ) {
														if ( $hours < 10 ) {
															?>
															<option value="<?php echo esc_attr( $hours ); ?>"><?php echo '0' . esc_attr( $hours . $csb_countdown_launch_hrs_label ); ?></option>
																<?php
														} else {
															?>
															<option value="<?php echo esc_attr( $hours ); ?>"><?php echo esc_attr( $hours . $csb_countdown_launch_hrs_label ); ?></option>
																<?php
														}
													}
													?>
												</select>
												<select class="form-control custom-input-width-time input-inline" name="ux_ddl_hr_min_sec[]" id="ux_ddl_minutes">
													<?php
													for ( $minutes = 0; $minutes <= 59; $minutes++ ) {
														if ( $minutes < 10 ) {
															?>
														<option value="<?php echo esc_attr( $minutes ); ?>"><?php echo '0' . esc_attr( $minutes . $csb_countdown_launch_min_label ); ?></option>
															<?php
														} else {
															?>
														<option value="<?php echo esc_attr( $minutes ); ?>"><?php echo esc_attr( $minutes . $csb_countdown_launch_min_label ); ?></option>
															<?php
														}
													}
													?>
											</select>
											<select class="form-control custom-input-width-time input-inline" name="ux_ddl_hr_min_sec[]" id="ux_ddl_seconds">
												<?php
												for ( $sec = 0; $sec <= 59; $sec++ ) {
													if ( $sec < 10 ) {
														?>
													<option value="<?php echo esc_attr( $sec ); ?>"><?php echo '0' . esc_attr( $sec . $csb_countdown_launch_sec_label ); ?></option>
														<?php
													} else {
														?>
													<option value="<?php echo esc_attr( $sec ); ?>"><?php echo esc_attr( $sec . $csb_countdown_launch_sec_label ); ?></option>
														<?php
													}
												}
												?>
											</select>
										</div>
										<i class="controls-description"><?php echo esc_attr( $csb_countdown_launch_time_tooltip ); ?></i>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_countdown_text_label ); ?> :
									<span class="required" aria-required="true">*</span>
								</label>
								<input type="text" class="form-control" name="ux_txt_countdown_text" id="ux_txt_countdown_text" placeholder="<?php echo esc_attr( $csb_countdown_text_placeholder ); ?>" value="<?php echo isset( $countdown_data_unserialize['countdown_text'] ) ? esc_attr( trim( htmlspecialchars( htmlspecialchars_decode( $countdown_data_unserialize['countdown_text'] ) ) ) ) : ''; ?>">
								<i class="controls-description"><?php echo esc_attr( $csb_countdown_text_tooltip ); ?></i>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											<?php echo esc_attr( $csb_font_style ); ?> :
											<span class="required" aria-required="true">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
										</label>
										<div class="input-icon right">
											<select class="form-control custom-input-medium" name="ux_ddl_font_style_countdown[]" id="ux_ddl_font_style_countdown">
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
											<select class="form-control" name="ux_ddl_font_family_countdown" id="ux_ddl_font_family_countdown">
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
											<input type="text" class="form-control custom-input-xsmall input-inline" readonly name="ux_txt_margin_countdown[]" id="ux_txt_margin_top_countdown"  value="0">
											<input type="text" class="form-control custom-input-xsmall input-inline" readonly name="ux_txt_margin_countdown[]" id="ux_txt_margin_right_countdown"  value="0">
											<input type="text" class="form-control custom-input-xsmall input-inline" readonly name="ux_txt_margin_countdown[]" id="ux_txt_margin_bottom_countdown"  value="15">
											<input type="text" class="form-control custom-input-xsmall input-inline" readonly name="ux_txt_margin_countdown[]" id="ux_txt_margin_left_countdown"  value="0">
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
											<input type="text" class="form-control custom-input-xsmall input-inline" readonly  name="ux_txt_padding_countdown[]" id="ux_txt_padding_top_countdown" value="0">
											<input type="text" class="form-control custom-input-xsmall input-inline" readonly  name="ux_txt_padding_countdown[]" id="ux_txt_padding_right_countdown" value="0">
											<input type="text" class="form-control custom-input-xsmall input-inline" readonly  name="ux_txt_padding_countdown[]" id="ux_txt_padding_bottom_countdown" value="15">
											<input type="text" class="form-control custom-input-xsmall input-inline" readonly name="ux_txt_padding_countdown[]" id="ux_txt_padding_left_countdown" value="0">
										</div>
										<i class="controls-description"><?php echo esc_attr( $csb_heading_settings_padding_tooltip ); ?></i>
									</div>
								</div>
							</div>
							<div class="line-separator"></div>
								<div class="form-actions">
									<div class="pull-right">
										<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
										<input type="submit" class="btn vivid-green" id="btn_save_settings_countdown" name="btn_save_settings_countdown" value="<?php echo esc_attr( $csb_save_changes ); ?>">
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
				<span>
						<?php echo esc_attr( $csb_countdown_label ); ?>
				</span>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-custom-hourglass"></i>
						<?php echo esc_attr( $csb_countdown_label ); ?>
					</div>
				</div>
				<div class="portlet-body form">
					<form id="ux_frm_countdown">
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
