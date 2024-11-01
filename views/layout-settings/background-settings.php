<?php
/**
 * Template for background settings.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/views/background-settings
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
	} elseif ( BACKGROUND_SETTINGS_COMING_SOON_BOOSTER === '1' ) {
		$csb_background_settings = wp_create_nonce( 'coming_soon_background_settings' );
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
					<?php echo esc_attr( $csb_background_settings_label ); ?>
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
						<?php echo esc_attr( $csb_background_settings_label ); ?>
					</div>
					<p class="premium-editions">
						<?php echo esc_attr( $csb_upgrade_need_help ); ?><a href="https://tech-banker.com/coming-soon-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_documentation ); ?></a><?php echo esc_attr( $csb_read_and_check ); ?><a href="https://tech-banker.com/coming-soon-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_demos_section ); ?></a>
					</p>
				</div>
				<div class="portlet-body form">
					<form id="ux_frm_background_settings">
						<div class="form-body">
							<div class="form-actions">
								<div class="pull-right">
									<a href="<?php echo esc_url( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
									<input type="submit" class="btn vivid-green" id="btn_save_background_settings" name="btn_save_background_settings" value="<?php echo esc_attr( $csb_save_changes ); ?>">
								</div>
							</div>
							<div class="line-separator"></div>
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $csb_background_settings_title ); ?> :
										<span class="required" aria-required="true">*</span>
									</label>
									<select class="form-control" name="ux_rdl_background_type" id="ux_rdl_background_type">
										<option value="color"><?php echo esc_attr( $csb_color_placeholder ); ?></option>
										<option value="local_video" style="color:red;" disabled="disabled"><?php echo esc_attr( $csb_image ); ?><span><?php echo ' ( ' . esc_attr( $csb_premium_edition_label ) . ' ) '; ?></span></option>
										<option value="local_video" style="color:red;" disabled="disabled"><?php echo esc_attr( $csb_background_settings_video ); ?><span><?php echo ' ( ' . esc_attr( $csb_premium_edition_label ) . ' ) '; ?></span></option>
										<option value="local_video" style="color:red;" disabled="disabled"><?php echo esc_attr( $csb_background_settings_local_video ); ?><span><?php echo ' ( ' . esc_attr( $csb_premium_edition_label ) . ' ) '; ?></span></option>
										<option value="delete" style="color:red;" disabled="disabled"><?php echo esc_attr( $csb_background_settings_slideshow ); ?><span><?php echo ' ( ' . esc_attr( $csb_premium_edition_label ) . ' ) '; ?></span></option>
									</select>
									<i class="controls-description"><?php echo esc_attr( $csb_background_settings_tooltip ); ?></i>
								</div>
								<div id="ux_div_color" style="display:block;">
									<div class="form-group">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_background_color_label ); ?> :
												<span style="color:red"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<input type="text" class="form-control" name="ux_txt_background_color" disabled id="ux_txt_background_color" value="#d61c38">
											<i class="controls-description"><?php echo esc_attr( $csb_background_color_tooltip ); ?></i>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label">
											<?php echo esc_attr( $csb_background_settings_animation_title ); ?> :
											<span class="required" aria-required="true">*</span>
										</label>
										<select class="form-control" name="ux_ddl_animation" id="ux_ddl_animation" onchange="change_settings_coming_soon_booster('#ux_ddl_animation', '#ux_div_animation');">
											<option value="enable"><?php echo esc_attr( $csb_enable ); ?></option>
											<option value="disable"><?php echo esc_attr( $csb_disable ); ?></option>
										</select>
										<i class="controls-description"><?php echo esc_attr( $csb_background_settings_animation_tooltip ); ?></i>
									</div>
									<div id="ux_div_animation" >
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_background_settings_custom_css_animation_type_title ); ?> :
												<span class="required" aria-required="true">*</span>
											</label>
											<select class="form-control" name="ux_ddl_animation_type" id="ux_ddl_animation_type" >
												<option value="bubbles"><?php echo esc_attr( $csb_background_settings_bubbles ); ?></option>
												<option value="clouds"><?php echo esc_attr( $csb_background_settings_clouds ); ?></option>
												<option value="constellation"><?php echo esc_attr( $csb_background_settings_constellation ); ?></option>
												<option value="fireworks" disabled="disabled" style="color:red"><?php echo esc_attr( $csb_background_settings_fireworks ) . ' ( ' . esc_attr( $csb_premium_edition_label ) . ' )'; ?></option>
												<option value="fss"><?php echo esc_attr( $csb_background_settings_flat_surface_shader ); ?></option>
												<option value="gravity_points" disabled="disabled" style="color:red" ><?php echo esc_attr( $csb_background_settings_gravity_points ) . ' ( ' . esc_attr( $csb_premium_edition_label ) . ' )'; ?></option>
												<option value="mozaic" disabled="disabled" style="color:red" ><?php echo esc_attr( $csb_background_settings_mozaic ) . ' ( ' . esc_attr( $csb_premium_edition_label ) . ' )'; ?></option>
												<option value="particles"><?php echo esc_attr( $csb_background_settings_particles ); ?></option>
												<option value="rainbow_square" disabled="disabled" style="color:red" ><?php echo esc_attr( $csb_background_settings_rainbow_square ) . ' ( ' . esc_attr( $csb_premium_edition_label ) . ' )'; ?></option>
												<option value="shooting_stars" disabled="disabled" style="color:red" ><?php echo esc_attr( $csb_background_settings_shooting_stars ) . ' ( ' . esc_attr( $csb_premium_edition_label ) . ' )'; ?></option>
												<option value="smooth_bubbles" disabled="disabled" style="color:red" ><?php echo esc_attr( $csb_background_settings_smooth_bubbles ) . ' ( ' . esc_attr( $csb_premium_edition_label ) . ' )'; ?></option>
												<option value="star_wars" disabled="disabled" style="color:red" ><?php echo esc_attr( $csb_background_settings_star_wars ) . ' ( ' . esc_attr( $csb_premium_edition_label ) . ' )'; ?></option>
												<option value="water_pipe" disabled="disabled" style="color:red" ><?php echo esc_attr( $csb_background_settings_waterpipe ) . ' ( ' . esc_attr( $csb_premium_edition_label ) . ' )'; ?></option>
												<option value="winter"><?php echo esc_attr( $csb_background_settings_winter ); ?></option>
											</select>
											<i class="controls-description"><?php echo esc_attr( $csb_background_settings_custom_css_animation_type_tooltip ); ?></i>
										</div>
									</div>
								</div>
							<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_background_settings_overlay_title ); ?> :
									<span class="required" aria-required="true">*</span>
								</label>
								<select class="form-control" name="ux_ddl_overlay" id="ux_ddl_overlay" onchange="change_settings_coming_soon_booster('#ux_ddl_overlay', '#ux_div_overlay');">
									<option value="show"><?php echo esc_attr( $csb_show ); ?></option>
									<option value="hide"><?php echo esc_attr( $csb_hide ); ?></option>
								</select>
								<i class="controls-description"><?php echo esc_attr( $csb_background_settings_overlay_tooltip ); ?></i>
							</div>
							<div id="ux_div_overlay">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_background_settings_overlay_color_title ); ?> :
												<span style="color:red"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<input type="text" class="form-control" name="ux_txt_Overlay_color" disabled id="ux_txt_Overlay_color" value="#282931">
											<i class="controls-description"><?php echo esc_attr( $csb_background_settings_overlay_color_tooltip ); ?></i>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_background_settings_color_opacity_title ); ?> (%) :
												<span style="color:red"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<input type="text" class="form-control" name="ux_txt_Overlay_color_opacity"  disabled id="ux_txt_Overlay_color_opacity" value="100">
											<i class="controls-description"><?php echo esc_attr( $csb_background_color_opacity_tooltip ); ?></i>
										</div>
									</div>
								</div>
							</div>
							<div class="line-separator"></div>
							<div class="form-actions">
								<div class="pull-right">
									<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
									<input type="submit" class="btn vivid-green" id="btn_save_background_settings" name="btn_save_background_settings" value="<?php echo esc_attr( $csb_save_changes ); ?>">
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
						<?php echo esc_attr( $csb_background_settings_label ); ?>
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
							<?php echo esc_attr( $csb_background_settings_label ); ?>
						</div>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_background_setting">
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
