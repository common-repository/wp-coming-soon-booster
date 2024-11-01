<?php
/**
 * This file is used for frontend.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/theme
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly.
if ( function_exists( 'wp_create_nonce' ) ) {
	$csb_subscription = wp_create_nonce( 'coming_soon_booster_subscription' );
	$csb_contact_data = wp_create_nonce( 'coming_soon_booster_contact_data' );
}
ini_set( 'allow_url_fopen', '1' );// @codingStandardsIgnoreLine
?>
<!DOCTYPE html>
<html lang="en-us" class="no-js">
	<head>
		<meta charset="utf-8">
		<title><?php echo esc_attr( $meta_unserialized_data['seo_title'] ); ?></title>
		<meta name="description" content="<?php echo esc_attr( htmlspecialchars_decode( $meta_unserialized_data['meta_description'] ) ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="Tech-Banker">
		<meta name="keywords" content="<?php echo esc_attr( htmlspecialchars_decode( $meta_unserialized_data['meta_keyword'] ) ); ?>">
		<meta name="robots" content="<?php echo esc_attr( $meta_unserialized_data['meta_robot_follow'] ); ?>">
		<link rel="canonical" href="<?php echo esc_attr( $meta_unserialized_data['canonical_url'] ); ?>" />
		<?php
		if ( esc_attr( $meta_unserialized_data['favicon_settings'] ) === 'show' && ( esc_attr( $plugin_mode_data_unserialize['default_mode'] ) === 'coming_soon_mode' || esc_attr( $plugin_mode_data_unserialize['default_mode'] ) === 'maintenance_mode' || isset( $_REQUEST['live_preview_page'] ) ) ) {// WPCS: input var ok, CSRF ok.
			?>
			<link href="<?php echo esc_attr( $meta_unserialized_data['upload_favicon'] ); ?>" rel="shortcut icon">
			<?php
		}
		if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'theme/includes/css-generator.php' ) ) {
			include_once COMING_SOON_BOOSTER_DIR_PATH . 'theme/includes/css-generator.php';
		}
		?>
		<link rel="stylesheet" href="<?php echo esc_attr( plugins_url( 'assets/global/plugins/icons/icons.css', dirname( __FILE__ ) ) ); // @codingStandardsIgnoreLine?>">
		<script src="<?php echo esc_attr( plugins_url( 'theme/js/modernizr.custom.js', dirname( __FILE__ ) ) ); // @codingStandardsIgnoreLine?>"></script>
	</head>
	<?php
	if ( 'star_wars' === esc_attr( $meta_data_array['animation_type_background'] ) && esc_attr( $meta_data_array['background_type'] ) === 'color' && esc_attr( $meta_data_array['animation'] ) === 'enable' ) {
		?>
		<body onload="start()" onresize="resize()" onorientationchange="resize()">
			<?php
	} else {
		?>
		<body>
			<?php
	}
	?>
		<div id="loading" class="text-loader-font">
		<div id="preloader">
			<span></span>
			<span></span>
		</div>
		</div>
		<?php
		switch ( esc_attr( $meta_data_array['background_type'] ) ) {
			case 'color':
				if ( 'enable' === $meta_data_array['animation'] ) {
					switch ( esc_attr( $meta_data_array['animation_type_background'] ) ) {
						case 'bubbles':
							?>
							<canvas id="bubble"></canvas>
							<?php
							break;

						case 'constellation':
							?>
							<canvas id="constellationel"></canvas>
							<?php
							break;

						case 'particles':
							?>
							<div id="particles-js"></div>
							<?php
							break;

						case 'winter':
							?>
							<canvas id="xmas"></canvas>
							<?php
							break;

						case 'clouds':
							?>
							<div id="cloud-animation">
								<img src="<?php echo esc_attr( plugins_url( 'theme/img/cloud-01.png', dirname( __FILE__ ) ) ); ?>" id="cloud1" height="745" width="1366">
								<img src="<?php echo esc_attr( plugins_url( 'theme/img/cloud-02.png', dirname( __FILE__ ) ) ); ?>" id="cloud2" height="918" width="1366">
								<img src="<?php echo esc_attr( plugins_url( 'theme/img/cloud-03.png', dirname( __FILE__ ) ) ); ?>" id="cloud3" height="808" width="1366">
								<img src="<?php echo esc_attr( plugins_url( 'theme/img/cloud-04.png', dirname( __FILE__ ) ) ); ?>" id="cloud4" height="583" width="1366">
							</div>
							<?php
							break;
					}
				}
				break;
		}
		?>
		<div class="global-overlay">
			<?php
			if ( 'show' === $meta_data_array['overlay'] ) {
				?>
				<div class="overlay skew-part">
					<div id="container">
					<div id="output" class="back-fss"></div>
					</div>
					<div id="stars"></div>
					<div id="stars2"></div>
					<div id="stars3"></div>
				</div>
				<?php
			}
			?>
		</div>
		<section id="left-side">
		<div class="logo-overlay-style-coming-soon-booster">
			<?php
			if ( 'show' === $meta_data_array['logo'] ) {
				switch ( esc_attr( $meta_data_array['logo_type'] ) ) {
					case 'text':
						echo '<' . esc_attr( $meta_data_array['html_tag_property'] ) . " class='text-logo-settings-coming-soon-booster'>"
						?>
						<?php
						if ( 'show' === $meta_data_array['text_logo_link'] ) {
							?>
							<a href="<?php echo esc_attr( $meta_data_array['text_logo_link_path'] ); ?>" target="<?php echo esc_attr( $meta_data_array['text_logo_link_target'] ); ?>">
							<?php
						} else {
							?>
							<a href="#">
								<?php
						}
							echo esc_attr( $meta_data_array['logo_text'] );
						?>
							</a>
							<?php echo '</' . esc_attr( $meta_data_array['html_tag_property'] ) . '>'; ?>
							<?php
						break;

					case 'image':
						if ( 'show' === $meta_data_array['logo_link'] ) {
							?>
							<a href="<?php echo esc_attr( $meta_data_array['logo_link_text'] ); ?>" target="<?php echo esc_attr( $meta_data_array['img_logo_link_target'] ); ?>">
								<?php
						} else {
							?>
							<a href="#">
								<?php
						}
						if ( 'custom' === $meta_data_array['logo_size'] ) {
							?>
							<img class="custom-logo-img-size-coming-soon-booster" src="<?php echo esc_attr( $meta_data_array['logo_image'] ) === '' ? esc_attr( plugins_url( '/img/logo.png', __FILE__ ) ) : esc_attr( $meta_data_array['logo_image'] ); ?>" />
								<?php
						} else {
							?>
							<img src="<?php echo esc_attr( $meta_data_array['logo_image'] ) === '' ? esc_attr( plugins_url( '/img/logo.png', __FILE__ ) ) : esc_attr( $meta_data_array['logo_image'] ); ?>">
									<?php
						}
						?>
							</a>
							<?php
						break;
				}
			}
			?>
					</div>
					<div class="content">
						<?php
						if ( 'show' === $meta_data_array['heading_settings'] ) {
							?>
							<div class="text-intro layout-heading-coming-soon-booster">
								<?php
								if ( htmlspecialchars_decode( $meta_data_array['heading_text'] ) !== strip_tags( htmlspecialchars_decode( $meta_data_array['heading_text'] ) ) ) {
									echo htmlspecialchars_decode( $meta_data_array['heading_text'] );// WPCS: XSS ok.
								} else {
									echo '<p>' . htmlspecialchars_decode( $meta_data_array['heading_text'] ) . '</p>';// WPCS: XSS ok.
								}
								?>
							</div>
							<?php
						}
						if ( 'show' === $meta_data_array['description_settings'] ) {
							?>
							<div class="text-intro layout-description-coming-soon-booster">
								<?php
								if ( htmlspecialchars_decode( $meta_data_array['description_text'] ) !== strip_tags( htmlspecialchars_decode( $meta_data_array['description_text'] ) ) ) {
									echo htmlspecialchars_decode( $meta_data_array['description_text'] );// WPCS: XSS ok.
								} else {
									echo '<p>' . htmlspecialchars_decode( $meta_data_array['description_text'] ) . '</p>';// WPCS: XSS ok.
								}
								?>
							</div>
							<?php
						}
						if ( 'show' === $meta_data_array['countdown_timer'] ) {
							if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'theme/includes/countdown-timezone-country.php' ) ) {
								include COMING_SOON_BOOSTER_DIR_PATH . 'theme/includes/countdown-timezone-country.php';
							}
							?>
							<h1 class="custom-countdown-coming-soon-booster text-intro opacity-0"><?php echo esc_attr( $meta_data_array['countdown_text'] ); ?>
							<div id="getting-started"></div>
						</h1>
							<?php
						}
						?>
					<nav>
						<ul>
							<li id="ux_li_moreinformation">
								<a href="#" id="open-more-info" data-target="right-side" class="light-btn text-intro opacity-0"><?php echo esc_attr( $meta_data_array['layout_contact_button_name'] ); ?></a>
							</li>
							<li id="ux_li_notifyme">
								<a data-dialog="somedialog" class="action-btn trigger text-intro opacity-0"><?php echo esc_attr( $meta_data_array['layout_subscriber_button_name'] ); ?></a>
							</li>
						</ul>
					</nav>
					</div>
					<div class="social-icons">
					</div>
					</section>
					<section id="right-side" class="hide-right">
					<div class="content">
						<div class="contact-heading-coming-soon-booster">
							<?php
							if ( 'show' === $meta_unserialized_data['contact_heading_settings'] ) {
								if ( htmlspecialchars_decode( $meta_unserialized_data['contact_heading_text'] ) !== strip_tags( htmlspecialchars_decode( $meta_unserialized_data['contact_heading_text'] ) ) ) {
									echo htmlspecialchars_decode( $meta_unserialized_data['contact_heading_text'] );// WPCS: XSS ok.
								} else {
									echo '<p>' . htmlspecialchars_decode( $meta_unserialized_data['contact_heading_text'] ) . '</p>';// WPCS: XSS ok.
								}
							}
							?>
						</div>
						<div class="contact-description-coming-soon-booster">
							<?php
							if ( 'show' === $meta_unserialized_data['contact_description_settings'] ) {
								if ( htmlspecialchars_decode( $meta_unserialized_data['contact_description_text'] ) !== strip_tags( htmlspecialchars_decode( $meta_unserialized_data['contact_description_text'] ) ) ) {
									echo htmlspecialchars_decode( $meta_unserialized_data['contact_description_text'] );// WPCS: XSS ok.
								} else {
									echo '<p>' . htmlspecialchars_decode( $meta_unserialized_data['contact_description_text'] ) . '</p>';// WPCS: XSS ok.
								}
							}
							?>
						</div>
						<!-- START - Contact Form -->
						<form id="contact-form">
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-lg-6">
								<div class="form-group">
									<?php
									if ( 'show' === $meta_unserialized_data['label_settings_contact'] ) {
										?>
										<label class="contact-label-coming-soon-booster">
											<?php echo esc_attr( $meta_unserialized_data['name_label'] ); ?>
										</label>
										<?php
									}
									?>
									<input type="text" id="ux_txt_name_contact_form" name="ux_txt_name_contact_form" class="form form-control error contact-placeholder-font-family" placeholder="<?php echo esc_attr( $meta_unserialized_data['name_textbox_contact_form'] ); ?>">
								</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-lg-6">
								<div class="form-group">
									<?php
									if ( 'show' === $meta_unserialized_data['label_settings_contact'] ) {
										?>
										<label class="contact-label-coming-soon-booster">
											<?php echo esc_attr( $meta_unserialized_data['email_label'] ); ?>
										</label>
										<?php
									}
									?>
									<input type="email" id="ux_txt_email_contact_form" name="ux_txt_email_contact_form" class="form form-control contact-placeholder-font-family" placeholder="<?php echo esc_attr( $meta_unserialized_data['email_textbox_contact_form'] ); ?>">
								</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-lg-12">
								<div class="form-group">
									<?php
									if ( 'show' === $meta_unserialized_data['label_settings_contact'] ) {
										?>
										<label class="contact-label-coming-soon-booster">
											<?php echo esc_attr( $meta_unserialized_data['subject_label'] ); ?>
										</label>
										<?php
									}
									?>
									<input type="text" id="ux_txt_subject_contact_form" name="ux_txt_subject_contact_form" class="form form-control contact-placeholder-font-family" placeholder="<?php echo esc_attr( $meta_unserialized_data['subject_textbox_contact_form'] ); ?>">
								</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-lg-12">
								<div class="form-group">
									<?php
									if ( 'show' === $meta_unserialized_data['label_settings_contact'] ) {
										?>
										<label class="contact-label-coming-soon-booster">
											<?php echo esc_attr( $meta_unserialized_data['message_label'] ); ?>
										</label>
										<?php
									}
									?>
									<textarea id="ux_txt_message_contact_form" name="ux_txt_message_contact_form" class="form textarea form-control contact-placeholder-font-family" placeholder="<?php echo esc_attr( $meta_unserialized_data['message_textbox_contact_form'] ); ?>"></textarea>
								</div>
								</div>
								<?php
								if ( 'enable' === $other_settings_unserialized_data['gdpr_compliance'] ) {
									?>
									<div class="col-xs-12 col-sm-12 col-lg-12">
										<div class="form-group">
											<input type="checkbox" name="ux_chk_gdpr_compliance_contact_form" id="ux_chk_gdpr_compliance_contact_form" value="1">
											<label id="gdpr_agree_text_contact_form_coming_soon_booster" class="contact-label-coming-soon-booster"><?php echo isset( $other_settings_unserialized_data['gdpr_compliance_text'] ) ? esc_attr( $other_settings_unserialized_data['gdpr_compliance_text'] ) : 'By using this form you agree with the storage and handling of your data by this website'; ?></label>
											<span id="ux_chk_validation_gdpr_contact_form_coming_soon_booster" style="display:none">*</span>
										</div>
									</div>
									<?php
								}
								?>
							</div>
							<button type="submit" id="valid-form" class="btn"><?php echo esc_attr( $meta_unserialized_data['button_label_contact_form'] ); ?></button>
						</form>
						<?php
						if ( 'show' === $meta_unserialized_data['success_message_settings_contact_form'] ) {
							?>
							<label class="success-message" id ="ux_txt_contact_success_message" style="display:none;">
								<?php
								if ( htmlspecialchars_decode( $meta_unserialized_data['success_message_text_contact_form'] ) !== strip_tags( htmlspecialchars_decode( $meta_unserialized_data['success_message_text_contact_form'] ) ) ) {
									echo htmlspecialchars_decode( $meta_unserialized_data['success_message_text_contact_form'] );// WPCS XSS ok.
								} else {
									echo '<p>' . htmlspecialchars_decode( $meta_unserialized_data['success_message_text_contact_form'] ) . '</p>';// WPCS XSS ok.
								}
								?>
							</label>
							<?php
						}
						?>
						<div id="block-answer"></div>
					</div>
					<footer>
						<?php
						if ( 'show' === $meta_unserialized_data['footer_settings'] ) {
							?>
							<div class="layout-footer-coming-soon-booster">
								<?php
								if ( htmlspecialchars_decode( $meta_unserialized_data['footer_text'] ) !== strip_tags( htmlspecialchars_decode( $meta_unserialized_data['footer_text'] ) ) ) {
									echo htmlspecialchars_decode( $meta_unserialized_data['footer_text'] );// WPCS XSS ok.
								} else {
									echo '<p>' . htmlspecialchars_decode( $meta_unserialized_data['footer_text'] ) . '</p>';// WPCS XSS ok.
								}
								?>
							</div>
							<?php
						}
						?>
					</footer>
					</section>
					<button id="close-more-info" class="hide-close"><i class="icon-custom-close"></i></button>
					<div id="somedialog" class="dialog">
					<div class="dialog__overlay"></div>
					<div class="dialog__content">
						<div class="dialog-inner">
							<?php
							if ( 'show' === $meta_unserialized_data['heading_settings_subscription'] ) {
								?>
								<div class="subscription-heading-coming-soon-booster">
									<?php
									if ( htmlspecialchars_decode( $meta_unserialized_data['heading_text_subscription'] ) !== strip_tags( htmlspecialchars_decode( $meta_unserialized_data['heading_text_subscription'] ) ) ) {
										echo htmlspecialchars_decode( $meta_unserialized_data['heading_text_subscription'] );// WPCS XSS ok.
									} else {
										echo '<p>' . htmlspecialchars_decode( $meta_unserialized_data['heading_text_subscription'] ) . '</p>';// WPCS XSS ok.
									}
									?>
								</div>
								<?php
							}
							?>
							<div class="subscription-description-coming-soon-booster">
								<?php
								if ( 'show' === $meta_unserialized_data['description_settings_subscription'] ) {
									if ( htmlspecialchars_decode( $meta_unserialized_data['description_text_subscription'] ) !== strip_tags( htmlspecialchars_decode( $meta_unserialized_data['description_text_subscription'] ) ) ) {
										echo htmlspecialchars_decode( $meta_unserialized_data['description_text_subscription'] );// WPCS XSS ok.
									} else {
										echo '<p>' . htmlspecialchars_decode( $meta_unserialized_data['description_text_subscription'] ) . '</p>';// WPCS XSS ok.
									}
								}
								?>
							</div>
							<div id="subscribe">
								<form id="ux_frm_coming_soon_mode_subscription">
								<div class="form-group">
									<div class="controls">
										<input type="text" id="ux_txt_email_address" name="ux_txt_email_address" onkeyup="valid_email_address(this)" placeholder="<?php echo esc_attr( $meta_unserialized_data['textbox_placeholder_subscription'] ); ?>" class="form-control subscription-placeholder-font" />
										<?php
										if ( 'enable' === $other_settings_unserialized_data['gdpr_compliance'] ) {
											?>
											<div style="margin-top:2%;text-align:left;">
												<input type="checkbox" class="gdpr-checkbox" name="ux_chk_gdpr_compliance_subscribe_form" id="ux_chk_gdpr_compliance_subscribe_form" value="1">
												<label id="gdpr_agree_text_subscribe_form_coming_soon_booster" class="subscription-label-coming-soon-booster"><?php echo isset( $other_settings_unserialized_data['gdpr_compliance_text'] ) ? esc_attr( $other_settings_unserialized_data['gdpr_compliance_text'] ) : 'By using this form you agree with the storage and handling of your data by this website'; ?></label>
												<span id="ux_chk_validation_gdpr_subscribe_form_coming_soon_booster" style="display:none">*</span>
											</div>
											<?php
										}
										?>
										<button id="ux_btn_subscribe_message" class="btn btn-lg submit"><?php echo esc_attr( $meta_unserialized_data['button_label_subscription'] ); ?></button>
									</div>
								</div>
								<div class="block-message">
									<?php
									if ( 'show' === $meta_unserialized_data['error_settings_subscription'] ) {
										?>
										<label class="subscription-error-coming-soon-booster" id ="ux_txt_email_address_error" style="display:none;">
											<?php
											if ( htmlspecialchars_decode( $meta_unserialized_data['error_text_subscription'] ) !== strip_tags( htmlspecialchars_decode( $meta_unserialized_data['error_text_subscription'] ) ) ) {
												echo htmlspecialchars_decode( $meta_unserialized_data['error_text_subscription'] );// WPCS XSS ok.
											} else {
												echo '<p>' . htmlspecialchars_decode( $meta_unserialized_data['error_text_subscription'] ) . '</p>';// WPCS XSS ok.
											}
											?>
										</label>
										<?php
									}
									if ( 'show' === $meta_unserialized_data['success_settings_subscription'] ) {
										?>
										<label class="subscription-success-coming-soon-booster" id ="ux_txt_email_address_success" style="display:none;">
											<?php
											if ( htmlspecialchars_decode( $meta_unserialized_data['success_text_subscription'] ) !== strip_tags( htmlspecialchars_decode( $meta_unserialized_data['success_text_subscription'] ) ) ) {
												echo htmlspecialchars_decode( $meta_unserialized_data['success_text_subscription'] );// WPCS XSS ok.
											} else {
												echo '<p>' . htmlspecialchars_decode( $meta_unserialized_data['success_text_subscription'] ) . '</p>';// WPCS XSS ok.
											}
											?>
										</label>
										<?php
									}
									?>
								</div>
								</form>
							</div>
						</div>
						<button class="close-newsletter" data-dialog-close><i class="icon-custom-close subscription-cross-icon"></i></button>
					</div>
					</div>
					<?php
					if ( file_exists( COMING_SOON_BOOSTER_DIR_PATH . 'theme/includes/frontend-footer.php' ) ) {
						include COMING_SOON_BOOSTER_DIR_PATH . 'theme/includes/frontend-footer.php';
					}
					?>
					</body>
					</html>
					<?php
					exit();
