<?php
/**
 * Template for subscription email settings.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/views/subscription
 * @version 1.1.0
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
		$coming_soon_type_emails_subscription    = wp_create_nonce( 'coming_soon_booster_emails_subscription' );
		$coming_soon_type_templates_subscription = wp_create_nonce( 'coming_soon_booster_templates_subscription' );
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
						<?php echo esc_attr( $csb_email_templates_label ); ?>
					</span>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="portlet box vivid-green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-custom-link"></i>
							<?php echo esc_attr( $csb_email_templates_label ); ?>
						</div>
						<p class="premium-editions">
							<?php echo esc_attr( $csb_upgrade_need_help ); ?><a href="https://tech-banker.com/coming-soon-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_documentation ); ?></a><?php echo esc_attr( $csb_read_and_check ); ?><a href="https://tech-banker.com/coming-soon-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_demos_section ); ?></a>
						</p>
					</div>
					<div class="portlet-body form">
						<form id="ux_frm_subscription_email_templates">
							<div class="form-body">
								<div class="form-actions">
									<div class="pull-right">
										<input type="hidden" id="ux_email_template_meta_id" value=""/>
										<input type="submit" class="btn vivid-green" name="ux_btn_email_change" id="ux_btn_email_change" value="<?php echo esc_attr( $csb_save_changes ); ?>">
									</div>
								</div>
								<div class="line-separator"></div>
								<div class="form-group" >
									<label class="control-label">
										<?php echo esc_attr( $csb_choose_email_template ); ?> :
										<span style="color:red;"> * </span>
									</label>
									<select name="ux_ddl_user_success" id="ux_ddl_user_success" class="form-control" onchange="coming_soon_booster_email_template_type();">
										<option value="template_for_admin_notification_subscription"><?php echo esc_attr( $csb_email_template_for_admin_notification ); ?></option>
										<option value="template_for_client_notification_subscription"><?php echo esc_attr( $csb_email_template_for_client_notification ); ?></option>
									</select>
									<i class="controls-description"><?php echo esc_attr( $csb_choose_email_template_tooltip ); ?></i>
								</div>
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $csb_email_template_send_to ); ?> :
										<span class="required" aria-required="true">* </span>
									</label>
									<input type="text" class="form-control" name="ux_txt_send_to" id="ux_txt_send_to" value="" placeholder="<?php echo esc_attr( $csb_email_template_send_to_placeholder ); ?>">
									<i class="controls-description"><?php echo esc_attr( $csb_email_template_send_to_tooltip ); ?></i>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_email_template_cc ); ?> :
												<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<input type="text" class="form-control" name="ux_txt_cc" id="ux_txt_cc" value="" placeholder="<?php echo esc_attr( $csb_email_template_cc_placeholder ); ?>">
											<i class="controls-description"><?php echo esc_attr( $csb_email_template_cc_tooltip ); ?></i>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">
												<?php echo esc_attr( $csb_email_template_bcc ); ?> :
												<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
											</label>
											<input type="text" class="form-control" name="ux_txt_bcc" id="ux_txt_bcc" value="" placeholder="<?php echo esc_attr( $csb_email_template_bcc_placeholder ); ?>">
											<i class="controls-description"><?php echo esc_attr( $csb_email_template_bcc_tooltip ); ?></i>
										</div>
									</div>
								</div>
								<div class="form-group" id="ux_email_subject">
									<label class="control-label">
										<?php echo esc_attr( $csb_subject ); ?> :
										<span class="required" aria-required="true">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
									</label>
									<input type="text" class="form-control" name="ux_txt_subject" id="ux_txt_subject" value="" placeholder="<?php echo esc_attr( $csb_email_template_subject_placeholder ); ?>">
									<i class="controls-description"><?php echo esc_attr( $csb_email_template_subject_tooltip ); ?></i>
								</div>
								<div class="form-group">
									<label class="control-label">
										<?php echo esc_attr( $csb_message ); ?> :
										<span class="required" aria-required="true">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
									</label>
									<?php
									$email_templates_editor = '';
									wp_editor( $email_templates_editor,
										'ux_heading_content',
										array(
											'media_buttons' => false,
											'textarea_rows' => 8,
											'tabindex' => 4,
										)
									);
									?>
									<textarea style="display:none" id="ux_txtarea_email_templates" name="ux_txtarea_email_templates"><?php echo esc_attr( $email_templates_editor ); ?></textarea>
									<i class="controls-description"><?php echo esc_attr( $csb_email_template_message_tooltip ); ?></i>
								</div>
								<div class="line-separator"></div>
								<div class="form-actions">
									<div class="pull-right">
										<input type="hidden" id="ux_email_template_meta_id" value=""/>
										<input type="submit" class="btn vivid-green" name="ux_btn_email_change" id="ux_btn_email_change" value="<?php echo esc_attr( $csb_save_changes ); ?>">
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
						<?php echo esc_attr( $csb_email_templates_label ); ?>
					</span>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-custom-link"></i>
						<?php echo esc_attr( $csb_email_templates_label ); ?>
					</div>
				</div>
				<div class="portlet-body form">
					<form id="ux_frm_email_template">
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
