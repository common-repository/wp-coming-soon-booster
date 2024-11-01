<?php
/**
 * Template for plugin mode settings.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/views/plugin-mode
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
	} elseif ( PLUGIN_MODE_COMING_SOON_BOOSTER === '1' ) {
		$csb_plugin_mode    = wp_create_nonce( 'coming_soon_booster_plugin_mode' );
		$theme_data         = explode( '_', $themes_data['theme_type'] );
		$selected_theme_img = $theme_data[1];
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
					<?php echo esc_attr( $csb_plugin_mode_label ); ?>
				</span>
			</li>
		</ul>
		</div>
		<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
				<div class="portlet-title">
					<div class="caption">
					<i class="icon-custom-puzzle"></i>
						<?php echo esc_attr( $csb_plugin_mode_label ); ?>
					</div>
					<p class="premium-editions">
						<?php echo esc_attr( $csb_upgrade_need_help ); ?><a href="https://tech-banker.com/coming-soon-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_documentation ); ?></a><?php echo esc_attr( $csb_read_and_check ); ?><a href="https://tech-banker.com/coming-soon-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_demos_section ); ?></a>
					</p>
				</div>
				<div class="portlet-body form">
					<form id="ux_frm_plugin_mode">
					<div class="form-body">
						<div class="form-group">
							<label class="control-label">
								<?php echo esc_attr( $csb_coming_soon_booster_mode ); ?> :
								<span class="required" aria-required="true">*</span>
							</label>
							<select class="form-control" name="ux_ddl_plugin_mode" id="ux_ddl_plugin_mode">
								<option value="coming_soon_mode"><?php echo esc_attr( $csb_coming_soon_booster_coming ); ?></option>
								<option value="maintenance_mode"><?php echo esc_attr( $csb_coming_soon_booster_maintenance_mode ); ?></option>
								<option value="live_website"><?php echo esc_attr( $csb_coming_soon_booster_live ); ?></option>
							</select>
							<i class="controls-description"><?php echo esc_attr( $csb_coming_soon_booster_tooltip ); ?></i>
						</div>
						<div class="line-separator"></div>
						<div class="form-actions">
							<div class="pull-right">
								<input type="button" class="btn vivid-green" id="btn_reset_factory_settings" name="btn_reset_factory_settings" onclick="reset_factory_settings_data();" value="<?php echo esc_attr( $csb_reset_factory_setting ); ?>">
								<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
								<input type="submit" class="btn vivid-green" id="btn_save_heading" name="btn_save_heading" value="<?php echo esc_attr( $csb_save_changes ); ?>">
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
		</div>
		<!–– Themes Menu ––>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-grid"></i>
							<?php echo esc_attr( $csb_coming_soon_booster_theme ); ?>
						</div>
						<p class="premium-editions">
							<?php echo esc_attr( $csb_upgrade_need_help ); ?><a href="https://tech-banker.com/coming-soon-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_documentation ); ?></a><?php echo esc_attr( $csb_read_and_check ); ?><a href="https://tech-banker.com/coming-soon-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_demos_section ); ?></a>
						</p>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_themes_settings">
							<div class="form-body">
								<div class="template">
									<div id="ux_div_theme_<?php echo esc_attr( $theme_data[1] ); ?>" class="template-screenshot">
										<img src="<?php echo esc_attr( plugins_url( "assets/global/img/screenshot-$selected_theme_img.jpg", dirname( dirname( __FILE__ ) ) ) ); ?>" id="template-img" alt="">
									</div>
									<?php
									if ( 7 === $theme_data[1] || 1 === $theme_data[1] ) {
										if ( 7 === $theme_data[1] ) {
											$activated_theme_name = $csb_add_custom_style;
										} else {
											$activated_theme_name = $csb_default_theme;
										}
									} else {
										$activated_theme_name = $csb_theme . ' ' . $theme_data[1];
									}
									?>
									<h3 class="template-name selected-theme"><?php echo esc_attr( $activated_theme_name ); ?></h3>
									<div class="template-activate-actions">
										<a class="button-preview" href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank"><?php echo esc_attr( $csb_live_preview ); ?></a>
									</div>
								</div>
								<?php
								for ( $flag = 1; $flag <= 7; $flag++ ) {
									if ( $theme_data[1] != $flag ) {// WPCS: loose comparison ok.
										?>
										<div class="template">
											<div id="ux_div_theme_<?php echo esc_attr( $flag ); ?>" class="template-screenshot">
												<img src="<?php echo esc_attr( plugins_url( "assets/global/img/screenshot-$flag.jpg", dirname( dirname( __FILE__ ) ) ) ); ?>" id="template-img" alt="">
											</div>
											<?php
											if ( 7 === $flag || 1 === $flag ) {
												if ( 7 === $flag ) {
													$theme_name = $csb_add_custom_style;
												} else {
													$theme_name = $csb_default_theme;
												}
											} else {
												$theme_name = $csb_theme . ' ' . $flag;
											}
											?>
											<h3 class="template-name"><?php echo esc_attr( $theme_name ); ?><span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span></h3>
											<div class="template-actions">
												<a class="active-button" id="ux_activation" value="theme_<?php echo esc_attr( $flag ); ?>" onclick='premium_edition_notification_coming_soon_booster();'><?php echo esc_attr( $csb_coming_soon_booster_theme_activate ); ?></a>
											</div>
										</div>
										<?php
									}
								}
								?>
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
					<?php echo esc_attr( $csb_plugin_mode_label ); ?>
				</span>
			</li>
		</ul>
		</div>
		<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
				<div class="portlet-title">
					<div class="caption">
					<i class="icon-custom-puzzle"></i>
						<?php echo esc_attr( $csb_plugin_mode_label ); ?>
					</div>
				</div>
				<div class="portlet-body form">
					<form id="ux_frm_plugins_mode">
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
