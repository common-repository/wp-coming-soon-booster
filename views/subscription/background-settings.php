<?php
/**
 * Template for subscription background settings.
 *
 * @author  Tech Banker
 * @package wp-coming-soon/views/subscription
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
					<?php echo esc_attr( $csb_contact_form_background_settings_label ); ?>
				</span>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-custom-picture"></i>
						<?php echo esc_attr( $csb_contact_form_background_settings_label ); ?>
					</div>
					<p class="premium-editions">
						<?php echo esc_attr( $csb_upgrade_need_help ); ?><a href="https://tech-banker.com/coming-soon-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_documentation ); ?></a><?php echo esc_attr( $csb_read_and_check ); ?><a href="https://tech-banker.com/coming-soon-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_demos_section ); ?></a>
					</p>
				</div>
				<div class="portlet-body form">
					<form id="ux_frm_subscription_background_settings">
						<div class="form-body">
							<div class="form-actions">
								<div class="pull-right">
									<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
										<input type="submit" class="btn vivid-green" id="ux_btn_save_settings_background" name="ux_btn_save_settings_background" value="<?php echo esc_attr( $csb_save_changes ); ?>">
								</div>
							</div>
							<div class="line-separator"></div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_background_color_label ); ?> :
												<span class="required" aria-required="true">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<input type="text" class="form-control" name="ux_txt_subscription_background_color" id="ux_txt_subscription_background_color" value="<?php echo isset( $background_settings_subscription_data_unserialize['background_color_subscription'] ) ? esc_attr( $background_settings_subscription_data_unserialize['background_color_subscription'] ) : '#282931'; ?>" placeholder="<?php echo esc_attr( $csb_background_color_placeholder ); ?>" onfocus="pick_color_coming_soon_booster('#ux_txt_subscription_background_color', '<?php echo esc_attr( $background_settings_subscription_data_unserialize['background_color_subscription'] ); ?>');" onblur="change_value_settings_coming_soon_booster('#ux_txt_subscription_background_color', '#282931')">
											<i class="controls-description"><?php echo esc_attr( $csb_background_color_tooltip ); ?></i>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_background_color_opacity_label ); ?> (%) :
												<span class="required" aria-required="true">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<input type="text" class="form-control" name="ux_txt_background_color_opacity" id="ux_txt_background_color_opacity" maxlength="3" onkeypress="validate_digits_coming_soon_booster(event)"	onblur="Opacityblur_coming_soon_booster(this, 75);"  placeholder="<?php echo esc_attr( $csb_background_color_opacity_placeholder ); ?>" value="<?php echo isset( $background_settings_subscription_data_unserialize['background_color_opacity_subscription'] ) ? esc_attr( $background_settings_subscription_data_unserialize['background_color_opacity_subscription'] ) : ''; ?>" onfocus="prevent_paste_coming_soon_booster(this.id);">
											<i class="controls-description"><?php echo esc_attr( $csb_background_color_opacity_tooltip ); ?></i>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_background_border_size_label ); ?> :
												<span class="required" aria-required="true">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<select class="form-control" name="ux_ddl_subscription_font_size" id="ux_ddl_subscription_font_size">
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
											<i class="controls-description"><?php echo esc_attr( $csb_background_border_size_tooltip ); ?></i>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_background_border_color_label ); ?> :
												<span class="required" aria-required="true">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<input type="text" class="form-control" name="ux_txt_background_border_color" id="ux_txt_background_border_color" placeholder="<?php echo esc_attr( $csb_button_settings_border_color_placeholder ); ?>" value="<?php echo isset( $background_settings_subscription_data_unserialize['background_border_color_subscription'] ) ? esc_attr( $background_settings_subscription_data_unserialize['background_border_color_subscription'] ) : '#d61c38'; ?>" onfocus="pick_color_coming_soon_booster('#ux_txt_background_border_color', '<?php echo esc_attr( $background_settings_subscription_data_unserialize['background_border_color_subscription'] ); ?>');" onblur="change_value_settings_coming_soon_booster('#ux_txt_background_border_color', '#d61c38')">
											<i class="controls-description"><?php echo esc_attr( $csb_background_border_color_tooltip ); ?></i>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $csb_contact_cross_icon_color_label ); ?> :
										<span class="required" aria-required="true">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
									</label>
									<input type="text" class="form-control" name="ux_txt_subscription_cross_icon_color" id="ux_txt_subscription_cross_icon_color" placeholder="<?php echo esc_attr( $csb_contact_cross_icon_placeholder ); ?>" value="<?php echo isset( $background_settings_subscription_data_unserialize['background_cross_icon_color_subscription'] ) ? esc_attr( $background_settings_subscription_data_unserialize['background_cross_icon_color_subscription'] ) : ''; ?>" onfocus="pick_color_coming_soon_booster('#ux_txt_subscription_cross_icon_color', '<?php echo esc_attr( $background_settings_subscription_data_unserialize['background_cross_icon_color_subscription'] ); ?>');" onblur="change_value_settings_coming_soon_booster('#ux_txt_subscription_cross_icon_color', '#ffffff')">
									<i class="controls-description"><?php echo esc_attr( $csb_contact_cross_icon_tooltip ); ?></i>
								</div>
								<div class="line-separator"></div>
									<div class="form-actions">
										<div class="pull-right">
											<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
											<input type="submit" class="btn vivid-green" id="ux_btn_save_settings_background" name="ux_btn_save_settings_background" value="<?php echo esc_attr( $csb_save_changes ); ?>">
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
						<?php echo esc_attr( $csb_contact_form_background_settings_label ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-picture"></i>
							<?php echo esc_attr( $csb_contact_form_background_settings_label ); ?>
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
