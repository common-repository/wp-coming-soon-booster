<?php
/**
 * Template for layout favicon settings.
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
						<?php echo esc_attr( $csb_layout_favicon_settings_label ); ?>
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
						<?php echo esc_attr( $csb_layout_favicon_settings_label ); ?>
					</div>
					<p class="premium-editions">
						<?php echo esc_attr( $csb_upgrade_need_help ); ?><a href="https://tech-banker.com/coming-soon-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_documentation ); ?></a><?php echo esc_attr( $csb_read_and_check ); ?><a href="https://tech-banker.com/coming-soon-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_demos_section ); ?></a>
					</p>
				</div>
				<div class="portlet-body form">
					<form id="ux_frm_favicon_settings">
						<div class="form-body">
							<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_layout_favicon_settings_label ); ?> :
									<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<select class="form-control" name="ux_ddl_favicon_settings" id="ux_ddl_favicon_settings" onchange="change_settings_coming_soon_booster('#ux_ddl_favicon_settings', '#ux_div_favicon');" value ="<?php echo isset( $favicon_data_unserialize['favicon_settings'] ) ? esc_attr( $favicon_data_unserialize['favicon_settings'] ) : ''; ?>">
									<option value="show"><?php echo esc_attr( $csb_show ); ?></option>
									<option value="hide"><?php echo esc_attr( $csb_hide ); ?></option>
								</select>
								<i class="controls-description"><?php echo esc_attr( $csb_favicon_settings_favicon_tooltip ); ?></i>
							</div>
							<div id="ux_div_favicon" style="display: none">
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $csb_favicon_settings_upload_title ); ?> :
										<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
									</label>
									<div class="input-icon right">
										<input type="text" class="form-control custom-input-large input-inline" readonly="readonly" name="ux_txt_upload" id="ux_txt_upload" value="<?php echo isset( $favicon_data_unserialize['upload_favicon'] ) ? esc_attr( $favicon_data_unserialize['upload_favicon'] ) : ''; ?>">
										<p id="wp_media_favicon_upload_error" class="wp-media-error-message"><?php echo esc_attr( $csb_media_error_settings_message ); ?></p>
										<input type="button" id="wp_upload_button" class="btn vivid-green custom-top-favicon" value="<?php echo esc_attr( $csb_upload ); ?>" onclick="premium_edition_notification_coming_soon_booster();">
									</div>
								</div>
							</div>
							<div class="line-separator"></div>
								<div class="form-actions">
									<div class="pull-right">
										<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
										<input type="submit" class="btn vivid-green" id="btn_save_favicon_settings" name="btn_save_favicon_settings" value="<?php echo esc_attr( $csb_save_changes ); ?>">
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
						<?php echo esc_attr( $csb_layout_favicon_settings_label ); ?>
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
						<?php echo esc_attr( $csb_layout_favicon_settings_label ); ?>
					</div>
				</div>
				<div class="portlet-body form">
					<form id="ux_frm_favicon_settings">
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
