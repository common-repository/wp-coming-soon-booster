<?php
/**
 * Template for layout seo settings.
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
		$csb_seo_settings = wp_create_nonce( 'coming_soon_booster_seo_settings' );
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
					<?php echo esc_attr( $csb_layout_seo_settings_label ); ?>
				</span>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-custom-magnifier"></i>
						<?php echo esc_attr( $csb_layout_seo_settings_label ); ?>
				</div>
				<p class="premium-editions">
					<?php echo esc_attr( $csb_upgrade_need_help ); ?><a href="https://tech-banker.com/coming-soon-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_documentation ); ?></a><?php echo esc_attr( $csb_read_and_check ); ?><a href="https://tech-banker.com/coming-soon-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_demos_section ); ?></a>
				</p>
			</div>
			<div class="portlet-body form">
				<form id="ux_frm_seo_settings">
					<div class="form-body">
						<div class="form-actions">
							<div class="pull-right">
								<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
								<input type="submit" class="btn vivid-green" id="ux_btn_save_seo_settings" name="ux_btn_save_seo_settings" value="<?php echo esc_attr( $csb_save_changes ); ?>">
							</div>
						</div>
						<div class="line-separator"></div>
							<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_seo_settings_title ); ?> :
								</label>
								<input type="text" class="form-control" name="ux_txt_seo_title" id="ux_txt_seo_title" value="<?php echo isset( $seo_data_unserialize['seo_title'] ) ? esc_attr( $seo_data_unserialize['seo_title'] ) : ''; ?>" placeholder="<?php echo esc_attr( $csb_seo_settings_placeholder ); ?>">
								<i class="controls-description"><?php echo esc_attr( $csb_seo_settings_tooltip ); ?></i>
							</div>
							<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_seo_settings_meta_title ); ?> :
								</label>
								<textarea class="form-control" name="ux_txtarea_meta_description" id="ux_txtarea_meta_description" placeholder="<?php echo esc_attr( $csb_seo_settings_meta_placeholder ); ?>"><?php echo isset( $seo_data_unserialize['meta_description'] ) ? esc_attr( $seo_data_unserialize['meta_description'] ) : ''; ?></textarea>
								<i class="controls-description"><?php echo esc_attr( $csb_seo_settings_meta_tooltip ); ?></i>
							</div>
							<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_seo_settings_keywords_title ); ?> :
								</label>
								<textarea class="form-control" name="ux_txtarea_meta_keywords" id="ux_txtarea_meta_keywords" placeholder="<?php echo esc_attr( $csb_seo_settings_keywords_placeholder ); ?>"><?php echo isset( $seo_data_unserialize['meta_keyword'] ) ? esc_attr( $seo_data_unserialize['meta_keyword'] ) : ''; ?></textarea>
								<i class="controls-description"><?php echo esc_attr( $csb_seo_settings_keywords_tooltip ); ?></i>
							</div>
							<div class="form-group">
								<label class="control-label">
										<?php echo esc_attr( $csb_seo_settings_follow_title ); ?> :
										<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<select class="form-control" name="ux_ddl_meta_robot_follow" id="ux_ddl_meta_robot_follow">
									<option value="follow"><?php echo esc_attr( $csb_seo_settings_follow ); ?></option>
									<option value="nofollow" disabled ><?php echo esc_attr( $csb_seo_settings_no_follow ); ?></option>
								</select>
								<i class="controls-description"><?php echo esc_attr( $csb_seo_settings_follow_tooltip ); ?></i>
							</div>
							<div class="form-group">
								<label class="control-label">
										<?php echo esc_attr( $csb_seo_settings_canonical_title ); ?> :
									<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="form-control" readonly name="ux_txt_canonical_url" id="ux_txt_canonical_url" value="<?php echo esc_attr( site_url() ); ?>">
								<i class="controls-description"><?php echo esc_attr( $csb_seo_settings_canonical_tooltip ); ?></i>
							</div>
							<div class="form-group">
								<label class="control-label">
										<?php echo esc_attr( $csb_seo_settings_tracking_title ); ?> :
										<span style="color:red">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<textarea rows="10" class="form-control" readonly name="ux_txtarea_tracking_code" id="ux_txtarea_tracking_code" placeholder="<?php echo esc_attr( $csb_seo_settings_tracking_placeholder ); ?>"></textarea>
								<i class="controls-description"><?php echo esc_attr( $csb_seo_settings_tracking_tooltip ); ?></i>
							</div>
							<div class="line-separator"></div>
								<div class="form-actions">
									<div class="pull-right">
										<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
										<input type="submit" class="btn vivid-green" id="ux_btn_save_seo_settings" name="ux_btn_save_seo_settings" value="<?php echo esc_attr( $csb_save_changes ); ?>">
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
					<?php echo esc_attr( $csb_layout_seo_settings_label ); ?>
				</span>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-custom-magnifier"></i>
						<?php echo esc_attr( $csb_layout_seo_settings_label ); ?>
					</div>
				</div>
			<div class="portlet-body form">
				<form id="ux_frm_seo_settings">
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
