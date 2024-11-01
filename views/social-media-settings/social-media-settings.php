<?php
/**
 * Template for social media settings.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/views/social-media-settings
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
	} elseif ( SOCIAL_MEDIA_SETTINGS_COMING_SOON_BOOSTER === '1' ) {
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
					<?php echo esc_attr( $csb_social_media_settings_label ); ?>
			</span>
			</li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-custom-social-twitter"></i>
						<?php echo esc_attr( $csb_social_media_settings_label ); ?>
					</div>
					<p class="premium-editions">
						<?php echo esc_attr( $csb_upgrade_need_help ); ?><a href="https://tech-banker.com/coming-soon-booster/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_documentation ); ?></a><?php echo esc_attr( $csb_read_and_check ); ?><a href="https://tech-banker.com/coming-soon-booster/backend-demos/" target="_blank" class="premium-editions-documentation"><?php echo esc_attr( $csb_demos_section ); ?></a>
					</p>
				</div>
				<div class="portlet-body form">
					<form id="ux_frm_social_settings">
						<div class="form-body">
							<div class="form-actions">
								<div class="pull-right">
									<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
									<input type="submit" class="btn vivid-green" id="btn_save_social_settings" name="btn_save_social_settings" value= "<?php echo esc_attr( $csb_save_changes ); ?> ">
								</div>
							</div>
							<div class="line-separator"></div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											<?php echo esc_attr( $csb_social_settings_email_label ); ?> :
											<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
										</label>
										<input type="text" class="form-control" name="ux_txt_email" id="ux_txt_email" placeholder="<?php echo esc_attr( $csb_social_settings_email_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['email'] ) ? esc_attr( $social_media_settings_data_unserialize['email'] ) : ''; ?>">
									</div>
								</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_website_url_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="form-control" name="ux_txt_website" id="ux_txt_website" placeholder="<?php echo esc_attr( $csb_social_settings_website_url_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['website_url'] ) ? esc_attr( $social_media_settings_data_unserialize['website_url'] ) : ''; ?>">
							</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_google_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_google" id="ux_txt_google" placeholder="<?php echo esc_attr( $csb_social_settings_google_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['google'] ) ? esc_attr( $social_media_settings_data_unserialize['google'] ) : ''; ?>">
							</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_background_settings_video ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_utube" id="ux_txt_utube" placeholder="<?php echo esc_attr( $csb_social_settings_youtube_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['youtube'] ) ? esc_attr( $social_media_settings_data_unserialize['youtube'] ) : ''; ?>">
							</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_instagram_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_insta" id="ux_txt_insta" placeholder="<?php echo esc_attr( $csb_social_settings_instagram_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['instagram'] ) ? esc_attr( $social_media_settings_data_unserialize['instagram'] ) : ''; ?>">
							</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_pinterest_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_pinterest" id="ux_txt_pinterest" placeholder="<?php echo esc_attr( $csb_social_settings_pinterest_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['pinterest'] ) ? esc_attr( $social_media_settings_data_unserialize['pinterest'] ) : ''; ?>">
							</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_flickr_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_flickr" id="ux_txt_flickr" placeholder="<?php echo esc_attr( $csb_social_settings_flickr_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['flickr'] ) ? esc_attr( $social_media_settings_data_unserialize['flickr'] ) : ''; ?>">
							</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_google_plus_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_googleplus" id="ux_txt_googleplus" placeholder="<?php echo esc_attr( $csb_social_settings_google_plus_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['google_plus'] ) ? esc_attr( $social_media_settings_data_unserialize['google_plus'] ) : ''; ?>">
							</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_vimeo_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_vimeo" id="ux_txt_vimeo" placeholder="<?php echo esc_attr( $csb_social_settings_vimeo_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['vimeo'] ) ? esc_attr( $social_media_settings_data_unserialize['vimeo'] ) : ''; ?>">
							</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_linkedin_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_linkedin" id="ux_txt_linkedin" placeholder="<?php echo esc_attr( $csb_social_settings_linkedin_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['linkedin'] ) ? esc_attr( $social_media_settings_data_unserialize['linkedin'] ) : ''; ?>">
							</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_skype_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_skype" id="ux_txt_skype" placeholder="<?php echo esc_attr( $csb_social_settings_skype_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['skype'] ) ? esc_attr( $social_media_settings_data_unserialize['skype'] ) : ''; ?>">
							</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_tumblr_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_tumblr" id="ux_txt_tumblr" placeholder="<?php echo esc_attr( $csb_social_settings_tumblr_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['tumblr'] ) ? esc_attr( $social_media_settings_data_unserialize['tumblr'] ) : ''; ?>">
							</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_dribbble_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_dribble" id="ux_txt_dribble" placeholder="<?php echo esc_attr( $csb_social_settings_dribbble_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['dribble'] ) ? esc_attr( $social_media_settings_data_unserialize['dribble'] ) : ''; ?>">
							</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_github_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_github" id="ux_txt_github" placeholder="<?php echo esc_attr( $csb_social_settings_github_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['github'] ) ? esc_attr( $social_media_settings_data_unserialize['github'] ) : ''; ?>">
							</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_rss_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_rss" id="ux_txt_rss" placeholder="<?php echo esc_attr( $csb_social_settings_rss_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['rss'] ) ? esc_attr( $social_media_settings_data_unserialize['rss'] ) : ''; ?>">
							</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_facebook_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_fb" id="ux_txt_fb" placeholder="<?php echo esc_attr( $csb_social_settings_facebook_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['facebook'] ) ? esc_attr( $social_media_settings_data_unserialize['facebook'] ) : ''; ?>">
							</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_yahoo_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_yahoo" id="ux_txt_yahoo" placeholder="<?php echo esc_attr( $csb_social_settings_yahoo_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['yahoo'] ) ? esc_attr( $social_media_settings_data_unserialize['yahoo'] ) : ''; ?>">
							</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_blogger_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_blogger" id="ux_txt_blogger" placeholder="<?php echo esc_attr( $csb_social_settings_blogger_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['blogger'] ) ? esc_attr( $social_media_settings_data_unserialize['blogger'] ) : ''; ?>">
							</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_wordpress_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_wordpress" id="ux_txt_wordpress" placeholder="<?php echo esc_attr( $csb_social_settings_wordpress_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['wordpress'] ) ? esc_attr( $social_media_settings_data_unserialize['wordpress'] ) : ''; ?>">
							</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_myspace_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_myspace" id="ux_txt_myspace" placeholder="<?php echo esc_attr( $csb_social_settings_myspace_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['myspace'] ) ? esc_attr( $social_media_settings_data_unserialize['myspace'] ) : ''; ?>">
							</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_foursquare_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_foursquare" id="ux_txt_foursquare" placeholder="<?php echo esc_attr( $csb_social_settings_foursquare_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['foursquare'] ) ? esc_attr( $social_media_settings_data_unserialize['foursquare'] ) : ''; ?>">
							</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_livejournal_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_livejournal" id="ux_txt_livejournal" placeholder="<?php echo esc_attr( $csb_social_settings_livejournal_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['livejournal'] ) ? esc_attr( $social_media_settings_data_unserialize['livejournal'] ) : ''; ?>">
							</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_twitter_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_twitter" id="ux_txt_twitter" placeholder="<?php echo esc_attr( $csb_social_settings_twitter_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['twitter'] ) ? esc_attr( $social_media_settings_data_unserialize['twitter'] ) : ''; ?>">
							</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								<label class="control-label">
									<?php echo esc_attr( $csb_social_settings_deviantart_label ); ?> :
									<span style="color:red;"> ( <?php echo esc_attr( $csb_premium_edition_label ); ?> )</span>
								</label>
								<input type="text" class="comingsoon-social-media form-control" name="ux_txt_deviantart" id="ux_txt_deviantart" placeholder="<?php echo esc_attr( $csb_social_settings_deviantart_placeholder ); ?>" value="<?php echo isset( $social_media_settings_data_unserialize['deviantart'] ) ? esc_attr( $social_media_settings_data_unserialize['deviantart'] ) : ''; ?>">
							</div>
							</div>
						</div>
						<div class="line-separator"></div>
						<div class="form-actions">
							<div class="pull-right">
								<a href="<?php echo esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ); ?>" target="_blank" class="btn vivid-green" id="btn_live_preview_settings" name="btn_live_preview_settings"><?php echo esc_attr( $csb_live_preview ); ?></a>
								<input type="submit" class="btn vivid-green" id="btn_save_social_settings" name="btn_save_social_settings" value= "<?php echo esc_attr( $csb_save_changes ); ?> ">
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
					<?php echo esc_attr( $csb_social_media_settings_label ); ?>
				</span>
			</li>
		</ul>
		</div>
		<div class="row">
		<div class="col-md-12">
			<div class="portlet box vivid-green">
				<div class="portlet-title">
					<div class="caption">
					<i class="icon-custom-social-twitter"></i>
						<?php echo esc_attr( $csb_social_media_settings_label ); ?>
					</div>
				</div>
				<div class="portlet-body form">
					<form id="ux_frm_social_media_settings">
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
