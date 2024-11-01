<?php
/**
 * Template for layout loader settings.
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
		$csb_loader_settings = wp_create_nonce( 'coming_soon_booster_loader_settings' );
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
						<?php echo esc_attr( $csb_loader_settings_label ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-reload"></i>
							<?php echo esc_attr( $csb_loader_settings_label ); ?>
						</div>
						<p class="premium-editions">
							<?php echo esc_attr( $csb_upgrade_need_help ); ?><a href="https://tech-banker.com/coming-soon-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_documentation ); ?></a><?php echo esc_attr( $csb_read_and_check ); ?><a href="https://tech-banker.com/coming-soon-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_demos_section ); ?></a>
						</p>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_loader_settings">
							<div class="form-body">
								<div class="form-actions">
									<div class="pull-right">
										<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
										<input type="submit" class="btn vivid-green" id="ux_btn_save_settings_loader" name="ux_btn_save_settings_loader" value="<?php echo esc_attr( $csb_save_changes ); ?>">
									</div>
								</div>
								<div class="line-separator"></div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_background_color_label ); ?> :
												<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<input type="text" class="form-control" name="ux_txt_loader_background_color" disabled id="ux_txt_loader_background_color" value="#282931">
											<i class="controls-description"><?php echo esc_attr( $csb_background_color_tooltip ); ?></i>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_loader_color_label ); ?> :
												<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<input type="text" class="form-control" name="ux_txt_loader_color" disabled id="ux_txt_loader_color" value="#d61c38" >
											<i class="controls-description"><?php echo esc_attr( $csb_loader_settings_color_tooltip ); ?></i>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $csb_loader_settings_loader_text ); ?> :
										<span class="required" aria-required="true">*</span>
									</label>
									<select class="form-control" name="ux_ddl_loader_text" id="ux_ddl_loader_text" onchange="change_settings_coming_soon_booster('#ux_ddl_loader_text', '#ux_div_loader_text');">
										<option value="show"><?php echo esc_attr( $csb_show ); ?></option>
										<option value="hide"><?php echo esc_attr( $csb_hide ); ?></option>
									</select>
									<i class="controls-description"><?php echo esc_attr( $csb_loader_settings_loader_text_tooltip ); ?></i>
								</div>
								<div id="ux_div_loader_text" style="display:none;">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $csb_loader_settings_loader_text ); ?> :
													<span class="required" aria-required="true">*</span>
												</label>
												<input type="text" class="form-control" name="ux_txt_loader_text_title" id="ux_txt_loader_text_title" value="<?php echo isset( $loader_data_unserialize['loader_text_title'] ) ? esc_attr( $loader_data_unserialize['loader_text_title'] ) : ''; ?>" placeholder="<?php echo esc_attr( $csb_loader_settings_text_placeholder ); ?>">
												<i class="controls-description"><?php echo esc_attr( $csb_loader_settings_text_tooltip ); ?></i>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">
													<?php echo esc_attr( $csb_font_size ); ?> :
													<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
												</label>
												<select class="form-control" name="ux_ddl_font_size" id="ux_ddl_font_size">
													<?php
													for ( $flag = 1; $flag <= 200; $flag++ ) {
														if ( $flag < 10 ) {
															?>
															<option disabled="disabled" value="<?php echo intval( $flag ); ?>px">0<?php echo intval( $flag ); ?> Px</option>
															<?php
														} else {
															$disable = 12 === $flag ? '' : 'disabled=disabled';
															?>
															<option <?php echo esc_attr( $disable ); ?> value="<?php echo intval( $flag ); ?>px"><?php echo intval( $flag ); ?> Px</option>
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
													<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
												</label>
												<div class="input-icon right">
													<select class="form-control" name="ux_ddl_font_family_loader" id="ux_ddl_font_family_loader">
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
													<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
												</label>
												<input type="text" class="form-control" name="ux_txt_font_color" disabled id="ux_txt_font_color" value="#ffffff" >
												<i class="controls-description"><?php echo esc_attr( $csb_logo_settings_color_tooltip ); ?></i>
											</div>
										</div>
									</div>
								</div>
								<div class="line-separator"></div>
								<div class="form-actions">
									<div class="pull-right">
										<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
										<input type="submit" class="btn vivid-green" id="ux_btn_save_settings_loader" name="ux_btn_save_settings_loader" value="<?php echo esc_attr( $csb_save_changes ); ?>">
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
						<?php echo esc_attr( $csb_loader_settings_label ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-reload"></i>
							<?php echo esc_attr( $csb_loader_settings_label ); ?>
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
