<?php
/**
 * Template for subscribers data settings.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/views/subscribers
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
	} elseif ( SUBSCRIBERS_COMING_SOON_BOOSTER === '1' ) {
		$csb_single_delete_data = wp_create_nonce( 'coming_soon_booster_delete' );
		$timestamp              = COMING_SOON_BOOSTER_LOCAL_TIME;
		$start_date             = $timestamp - 2592000;
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
					<?php echo esc_attr( $csb_subscribers_label ); ?>
				</span>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-custom-user-follow"></i>
						<?php echo esc_attr( $csb_subscribers_label ); ?>
					</div>
					<p class="premium-editions">
						<?php echo esc_attr( $csb_upgrade_need_help ); ?><a href="https://tech-banker.com/coming-soon-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_documentation ); ?></a><?php echo esc_attr( $csb_read_and_check ); ?><a href="https://tech-banker.com/coming-soon-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_demos_section ); ?></a>
					</p>
				</div>
				<div class="portlet-body form">
					<form id="ux_frm_subscribers">
						<div class="form-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											<?php echo esc_attr( $csb_start_date ); ?> :
											<span class="required" aria-required="true">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
										</label>
										<input type="text" class="form-control" onkeypress="prevent_datepicker('#ux_txt_start_date');" name="ux_txt_start_date" id="ux_txt_start_date" value="<?php echo esc_attr( date( 'm/d/Y', $start_date ) ); ?>"placeholder="<?php echo esc_attr( $csb_start_date_placeholder ); ?>">
										<i class="controls-description"><?php echo esc_attr( $csb_subscribers_start_date_tooltip ); ?></i>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											<?php echo esc_attr( $csb_end_date ); ?> :
											<span class="required" aria-required="true">* ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
										</label>
										<input type="text" class="form-control" name="ux_txt_end_date" onkeypress="prevent_datepicker('#ux_txt_end_date');" id="ux_txt_end_date" value="<?php echo esc_attr( date( 'm/d/Y' ) ); ?>" placeholder="<?php echo esc_attr( $csb_end_date_placeholder ); ?>">
										<i class="controls-description"><?php echo esc_attr( $csb_subscribers_end_date_tooltip ); ?></i>
									</div>
								</div>
							</div>
							<div class="form-actions">
								<div class="pull-right">
									<input type="submit" class="btn vivid-green" id="btn_save_start_end_date" name="btn_save_start_end_date" value="<?php echo esc_attr( $csb_submit ); ?>">
								</div>
							</div>
							<div class="line-separator"></div>
							<div class="table-margin-top">
								<select name="ux_ddl_apply" id="ux_ddl_apply" class="custom-bulk-width">
									<option value=""><?php echo esc_attr( $csb_bulk_action ); ?></option>
									<option value="delete" style="color:red";><?php echo esc_attr( $csb_delete ); ?><span> ( Premium Edition )</span></option>
								</select>
								<input type="button" class="btn vivid-green" name="ux_btn_subscribers_Apply" id="ux_btn_subscribers_Apply" value="<?php echo esc_attr( $csb_apply ); ?>" onclick = premium_edition_notification_coming_soon_booster();>
						</div>
						<div class="contact-form-scroll">
							<table class="table table-striped table-bordered table-hover table-margin-top" id="ux_tbl_subscribers">
								<thead>
									<tr>
										<th style="text-align:center;" class="chk-action">
											<input type="checkbox" name="ux_chk_subscribers" id="ux_chk_subscribers">
										</th>
										<th>
											<?php echo esc_attr( $csb_subscribers_email_address ); ?>
										</th>
										<th>
											<?php echo esc_attr( $csb_date_time ); ?>
										</th>
										<th>
											<?php echo esc_attr( $csb_ip_address ); ?>
										</th>
										<th>
											<?php echo esc_attr( $csb_location ); ?>
										</th>
										<th class="chk-action custom-alternative">
											<?php echo esc_attr( $csb_action ); ?>
										</th>
									</tr>
								</thead>
								<tbody id="dynamic_table_filter">
									<?php
									if ( isset( $details ) && count( $details ) > 0 ) {
										foreach ( $details as $keys ) {
											?>
											<tr>
												<td style="text-align:center;">
													<input type="checkbox" id="ux_chk_coming_soon_<?php echo esc_attr( $keys['meta_id'] ); ?>" name="ux_chk_coming_soon_<?php echo esc_attr( $keys['meta_id'] ); ?>" value="<?php echo esc_attr( $keys['meta_id'] ); ?>" onclick="all_Check_subscriber_coming_soon_booster(<?php echo esc_attr( $keys['meta_id'] ); ?>);">
												</td>
												<td>
													<label class="control-label">
														<?php echo esc_attr( $keys['email_address'] ); ?>
													</label>
												</td>
												<td>
													<label class="control-label">
														<?php echo esc_attr( date( 'd M Y h:i A', $keys['date_time'] ) ); ?>
													</label>
												</td>
												<td>
													<label class="control-label">
														<?php echo esc_attr( $keys['ip_address'] ); ?>
													</label>
												</td>
												<td>
													<label class="control-label">
														<?php echo '' === $keys['location'] ? esc_attr( $csb_location_not_available ) : esc_attr( $keys['location'] ); ?>
													</label>
												</td>
												<td class="custom-alternative">
													<a href="javascript:void(0);">
														<a class="btn coming-soon-buttons" onclick="delete_data_coming_soon_booster('<?php echo esc_attr( $keys['meta_id'] ); ?>', '<?php echo esc_attr( $csb_form_entries_delete ); ?>', 'admin.php?page=csb_subscribers');"><?php echo esc_attr( $csb_delete ); ?> </a>
													</a>
												</td>
											</tr>
											<?php
										}
									}
									?>
									</tbody>
								</table>
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
					<?php echo esc_attr( $csb_subscribers_label ); ?>
			</span>
		</li>
	</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-custom-user-follow"></i>
						<?php echo esc_attr( $csb_subscribers_label ); ?>
					</div>
				</div>
				<div class="portlet-body form">
					<form id="ux_frm_subscriber">
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
