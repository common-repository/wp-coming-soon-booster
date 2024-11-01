<?php
/**
 * Template for plugin update settings.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/views/other-settings
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
	} elseif ( OTHER_SETTINGS_COMING_SOON_BOOSTER === '1' ) {
		$csb_other_settings_data = wp_create_nonce( 'csb_other_settings_data' );
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
						<?php echo esc_attr( $csb_other_settings_label ); ?>
				</span>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-custom-wrench"></i>
					<?php echo esc_attr( $csb_other_settings_label ); ?>
				</div>
				<p class="premium-editions">
					<?php echo esc_attr( $csb_upgrade_need_help ); ?><a href="https://tech-banker.com/coming-soon-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_documentation ); ?></a><?php echo esc_attr( $csb_read_and_check ); ?><a href="https://tech-banker.com/coming-soon-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_demos_section ); ?></a>
				</p>
			</div>
			<div class="portlet-body form">
				<form id="ux_frm_other_settings">
					<div class="form-body">
							<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_other_settings_remove_tables_uninstall ); ?> :
									<span class="required" aria-required="true">*</span>
								</label>
								<select name="ux_ddl_remove_tables" id="ux_ddl_remove_tables" class="form-control">
									<option value="enable"><?php echo esc_attr( $csb_enable ); ?></option>
									<option value="disable"><?php echo esc_attr( $csb_disable ); ?></option>
								</select>
								<i class="controls-description"><?php echo esc_attr( $csb_other_settings_remove_tables_uninstall_tooltip ); ?></i>
							</div>
							<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_other_settings_ip_address_fetching_method ); ?> :
									<span class="required" aria-required="true">*</span>
								</label>
								<select name="ux_ddl_ip_address_fetching_method" id="ux_ddl_ip_address_fetching_method" class="form-control">
									<option value=""><?php echo esc_attr( $csb_other_settings_ip_address_fetching_option1 ); ?></option>
									<option value="REMOTE_ADDR"><?php echo esc_attr( $csb_other_settings_ip_address_fetching_option2 ); ?></option>
									<option value="HTTP_X_FORWARDED_FOR"><?php echo esc_attr( $csb_other_settings_ip_address_fetching_option3 ); ?></option>
									<option value="HTTP_X_REAL_IP"><?php echo esc_attr( $csb_other_settings_ip_address_fetching_option4 ); ?></option>
									<option value="HTTP_CF_CONNECTING_IP"><?php echo esc_attr( $csb_other_settings_ip_address_fetching_option5 ); ?></option>
								</select>
								<i class="controls-description"><?php echo esc_attr( $csb_other_settings_ip_address_tooltips ); ?></i>
							</div>
							<div class="form-group">
									<label class="control-label">
											<?php echo esc_attr( $csb_gdpr_compliance ); ?> :
											<span class="required" aria-required="true">*</span>
									</label>
									<select id="ux_ddl_gdpr_compliance" name="ux_ddl_gdpr_compliance" class="form-control" onchange="gdpr_compliance_coming_soon_booster();">
											<option value="enable"><?php echo esc_attr( $csb_enable ); ?></option>
											<option value="disable"><?php echo esc_attr( $csb_disable ); ?></option>
									</select>
									<i class="controls-description"><?php echo esc_attr( $csb_gdpr_compliance_tooltip ); ?></i>
							</div>
							<div class="form-group" id="ux_div_gdpr_compliance_text">
									<label class="control-label">
											<?php echo esc_attr( $csb_gdpr_compliance_text ); ?> :
											<span class="required" aria-required="true">*</span>
									</label>
									<textarea name="ux_txt_gdpr_compliance_text" id="ux_txt_gdpr_compliance_text" class="form-control" placeholder="<?php echo esc_attr( $csb_gdpr_compliance_text_placeholder ); ?>"><?php echo isset( $other_settings_module_unserialize['gdpr_compliance_text'] ) ? esc_attr( $other_settings_module_unserialize['gdpr_compliance_text'] ) : 'By using this form you agree with the storage and handling of your data by this website'; ?></textarea>
									<i class="controls-description"><?php echo esc_attr( $csb_gdpr_compliance_text_tooltip ); ?></i>
							</div>
							<div class="line-separator"></div>
							<div class="form-actions">
								<div class="pull-right">
									<input type="submit" class="btn vivid-green" name="ux_btn_save_changes" id="ux_btn_save_changes" value="<?php echo esc_attr( $csb_save_changes ); ?>">
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
						<?php echo esc_attr( $csb_other_settings_label ); ?>
				</span>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-custom-wrench"></i>
						<?php echo esc_attr( $csb_other_settings_label ); ?>
					</div>
				</div>
				<div class="portlet-body form">
					<div class="form-body">
						<strong><?php echo esc_attr( $csb_user_access_message ); ?></strong>
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php
	}
}
