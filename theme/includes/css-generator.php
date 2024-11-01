<?php
/**
 * This file is used to css for frontend.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/theme/includes
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly.
/**
 * This function is used for font-family.
 *
 * @param string $font_families .
 */
function font_families_gallery_bank( $font_families ) {
	foreach ( $font_families as $font_family ) {
		if ( 'inherit' !== $font_family ) {
			if ( strpos( $font_family, ':' ) !== false ) {
				$position           = strpos( $font_family, ':' );
				$font_style         = ( substr( $font_family, $position + 4, 6 ) === 'italic' ) ? "\r\n\tfont-style: italic !important;" : '';
				$font_family_name[] = "'" . substr( $font_family, 0, $position ) . "' !important;\r\n\tfont-weight: " . substr( $font_family, $position + 1, 3 ) . ' !important;' . $font_style;
			} else {
				$font_family_name[] = ( strpos( $font_family, '&' ) !== false ) ? "'" . strstr( $font_family, '&', 1 ) . "' !important;" : "'" . $font_family . "' !important;";
			}
		} else {
			$font_family_name[] = 'inherit';
		}
	}
	return $font_family_name;
}
/**
 * This function is used for font-family.
 *
 * @param string $unique_font_families .
 */
function unique_font_families_gallery_bank( $unique_font_families ) {
	$import_font_family = '';
	foreach ( $unique_font_families as $font_family ) {
		if ( 'inherit' !== $font_family ) {
			$font_family = urlencode( $font_family );// @codingStandardsIgnoreLine.
			if ( is_ssl() ) {
				$import_font_family .= "@import url('https://fonts.googleapis.com/css?family=" . $font_family . "');\r\n";
			} else {
				$import_font_family .= "@import url('http://fonts.googleapis.com/css?family=" . $font_family . "');\r\n";
			}
		}
	}
	return $import_font_family;
}
$unique_font_families    = array_unique( $fonts_family_array );
$import_font_family      = unique_font_families_gallery_bank( $unique_font_families );
$font_family_name_layout = font_families_gallery_bank( $fonts_family_array );

$image_position = explode( ',', esc_attr( $meta_data_array['image_position_background'] ) );
$logo_margin    = explode( ',', esc_attr( $meta_data_array['margin_layout'] ) );
$logo_padding   = explode( ',', esc_attr( $meta_data_array['padding_layout'] ) );

$heading_font    = explode( ',', esc_attr( $meta_data_array['font_style_heading'] ) );
$heading_margin  = explode( ',', esc_attr( $meta_data_array['margin_heading'] ) );
$heading_padding = explode( ',', esc_attr( $meta_data_array['padding_heading'] ) );

$description_font    = explode( ',', esc_attr( $meta_data_array['font_style_description'] ) );
$description_margin  = explode( ',', esc_attr( $meta_data_array['margin_description'] ) );
$description_padding = explode( ',', esc_attr( $meta_data_array['padding_description'] ) );



$countdown_font    = explode( ',', esc_attr( $meta_data_array['font_style_countdown'] ) );
$countdown_margin  = explode( ',', esc_attr( $meta_data_array['margin_countdown'] ) );
$countdown_padding = explode( ',', esc_attr( $meta_data_array['padding_countdown'] ) );


$font_style_button_layout_contact = explode( ',', esc_attr( $meta_data_array['layout_contact_font_style_button'] ) );
$margin_button_layout_contact     = explode( ',', esc_attr( $meta_data_array['layout_contact_margin_button'] ) );
$padding_button_layout_contact    = explode( ',', esc_attr( $meta_data_array['layout_contact_padding_button'] ) );


$font_style_button_layout_subscriber = explode( ',', esc_attr( $meta_data_array['layout_subscriber_font_style_button'] ) );
$margin_button_layout_subscriber     = explode( ',', esc_attr( $meta_data_array['layout_subscriber_margin_button'] ) );
$padding_button_layout_subscriber    = explode( ',', esc_attr( $meta_data_array['layout_subscriber_padding_button'] ) );


$contact_heading_font_style = explode( ',', esc_attr( $meta_unserialized_data['contact_font_style_heading'] ) );
$contact_heading_margin     = explode( ',', esc_attr( $meta_unserialized_data['contact_margin_heading'] ) );
$contact_heading_padding    = explode( ',', esc_attr( $meta_unserialized_data['contact_padding_heading'] ) );


$contact_description_setting_font_style = explode( ',', esc_attr( $meta_unserialized_data['contact_font_style_description'] ) );
$contact_description_setting_margin     = explode( ',', esc_attr( $meta_unserialized_data['contact_margin_description'] ) );
$contact_description_setting_padding    = explode( ',', esc_attr( $meta_unserialized_data['contact_padding_description'] ) );

$contact_label_font = explode( ',', esc_attr( $meta_unserialized_data['font_style_label'] ) );

$button_label_font      = explode( ',', esc_attr( $meta_unserialized_data['font_style_button_contact_form'] ) );
$contact_button_margin  = explode( ',', esc_attr( $meta_unserialized_data['margin_button_contact_form'] ) );
$contact_button_padding = explode( ',', esc_attr( $meta_unserialized_data['padding_button_contact_form'] ) );

$contact_success_message_font = explode( ',', esc_attr( $meta_unserialized_data['font_style_success_message_settings_contact_form'] ) );

$footer_font    = explode( ',', esc_attr( $meta_unserialized_data['font_style_footer'] ) );
$footer_margin  = explode( ',', esc_attr( $meta_unserialized_data['margin_footer'] ) );
$footer_padding = explode( ',', esc_attr( $meta_unserialized_data['padding_footer'] ) );

$contact_textbox_font    = explode( ',', esc_attr( $meta_unserialized_data['font_style_textbox_contact_form'] ) );
$contact_textbox_margin  = explode( ',', esc_attr( $meta_unserialized_data['margin_textbox_contact_form'] ) );
$contact_textbox_padding = explode( ',', esc_attr( $meta_unserialized_data['padding_textbox_contact_form'] ) );

$heading_setting_font_style = explode( ',', esc_attr( $meta_unserialized_data['font_style_heading_subscription'] ) );
$heading_setting_margin     = explode( ',', esc_attr( $meta_unserialized_data['margin_heading_subscription'] ) );
$heading_setting_padding    = explode( ',', esc_attr( $meta_unserialized_data['padding_heading_subscription'] ) );

$description_setting_font_style = explode( ',', esc_attr( $meta_unserialized_data['font_style_description_subscription'] ) );
$description_setting_margin     = explode( ',', esc_attr( $meta_unserialized_data['margin_description_subscription'] ) );
$description_setting_padding    = explode( ',', esc_attr( $meta_unserialized_data['padding_description_subscription'] ) );

$textbox_font    = explode( ',', esc_attr( $meta_unserialized_data['textbox_font_style_subscription'] ) );
$texbox_margin   = explode( ',', esc_attr( $meta_unserialized_data['textbox_margin_subscription'] ) );
$textbox_padding = explode( ',', esc_attr( $meta_unserialized_data['textbox_padding_subscription'] ) );

$font_style_button_subscription = explode( ',', esc_attr( $meta_unserialized_data['font_style_button_subscription'] ) );
$margin_button_subscription     = explode( ',', esc_attr( $meta_unserialized_data['margin_button_subscription'] ) );
$padding_button_subscription    = explode( ',', esc_attr( $meta_unserialized_data['padding_button_subscription'] ) );

$success_settings_font    = explode( ',', esc_attr( $meta_unserialized_data['font_style_success_subscription'] ) );
$success_settings_margin  = explode( ',', esc_attr( $meta_unserialized_data['margin_success_subscription'] ) );
$success_settings_padding = explode( ',', esc_attr( $meta_unserialized_data['padding_success_subscription'] ) );

$error_settings_font    = explode( ',', esc_attr( $meta_unserialized_data['font_style_error_subscription'] ) );
$error_settings_margin  = explode( ',', esc_attr( $meta_unserialized_data['margin_error_subscription'] ) );
$error_settings_padding = explode( ',', esc_attr( $meta_unserialized_data['padding_error_subscription'] ) );
?>
<style type="text/css">
	<?php echo $import_font_family;// WPCS: XSS ok. ?>
		.text-loader-font
		{
			font-family: <?php echo $font_family_name_layout[0];// WPCS: XSS ok. ?>
		}
		.text-logo-settings-coming-soon-booster a
		{
			font-family: <?php echo $font_family_name_layout[1];// WPCS: XSS ok. ?>
		}
		.layout-heading-coming-soon-booster
		{
			font-family: <?php echo $font_family_name_layout[2];// WPCS: XSS ok. ?>
		}
		.layout-description-coming-soon-booster
		{
			font-family: <?php echo $font_family_name_layout[3];// WPCS: XSS ok. ?>
		}
		.custom-countdown-coming-soon-booster
		{
			font-family: <?php echo $font_family_name_layout[4];// WPCS: XSS ok. ?>
		}
		.light-btn
		{
			font-family: <?php echo $font_family_name_layout[5];// WPCS: XSS ok. ?>
		}
		.action-btn
		{
			font-family: <?php echo $font_family_name_layout[6];// WPCS: XSS ok. ?>
		}
		.contact-heading-coming-soon-booster *
		{
			font-family: <?php echo $font_family_name_layout[7];// WPCS: XSS ok. ?>
		}
		.contact-description-coming-soon-booster *
		{
			font-family: <?php echo $font_family_name_layout[8];// WPCS: XSS ok. ?>
		}
		.contact-label-coming-soon-booster
		{
			font-family: <?php echo $font_family_name_layout[9];// WPCS: XSS ok. ?>
		}
		.btn
		{
			font-family: <?php echo $font_family_name_layout[10];// WPCS: XSS ok. ?>
		}
		.success-message *
		{
			font-family: <?php echo $font_family_name_layout[11];// WPCS: XSS ok. ?>
		}
		.layout-footer-coming-soon-booster
		{
			font-family: <?php echo $font_family_name_layout[12];// WPCS: XSS ok. ?>
		}
		.contact-placeholder-font-family
		{
			font-family: <?php echo $font_family_name_layout[13];// WPCS: XSS ok. ?>
		}
		.subscription-heading-coming-soon-booster *
		{
			font-family: <?php echo $font_family_name_layout[14];// WPCS: XSS ok. ?>
		}
		.subscription-description-coming-soon-booster *
		{
			font-family: <?php echo $font_family_name_layout[15];// WPCS: XSS ok. ?>
		}
		.subscription-label-coming-soon-booster
		{
			font-family: <?php echo $font_family_name_layout[16];// WPCS: XSS ok. ?>
		}
		.subscription-placeholder-font
		{
			font-family: <?php echo $font_family_name_layout[16];// WPCS: XSS ok. ?>
		}
		.submit
		{
			font-family: <?php echo $font_family_name_layout[17];// WPCS: XSS ok. ?>
		}
		.subscription-success-coming-soon-booster *
		{
			font-family: <?php echo $font_family_name_layout[18];// WPCS: XSS ok. ?>
		}
		.subscription-error-coming-soon-booster *
		{
			font-family: <?php echo $font_family_name_layout[19];// WPCS: XSS ok. ?>
		}
		<?php
		/* * **** custom css ****** */
		echo htmlspecialchars_decode( $custom_css_settings_serialize_data['custom_css'] );// WPCS: XSS ok.
		?>
		.layout-heading-coming-soon-booster *
		{
			font-size: <?php echo $heading_font[0];// WPCS: XSS ok. ?> !important;
			color: <?php echo esc_attr( $heading_font[1] ); ?> !important;
			margin:
			<?php
				echo 'auto' !== $heading_margin[0] ? intval( $heading_margin[0] ) . 'px ' : 'auto ';
				echo 'auto' !== $heading_margin[1] ? intval( $heading_margin[1] ) . 'px ' : 'auto ';
				echo 'auto' !== $heading_margin[2] ? intval( $heading_margin[2] ) . 'px ' : 'auto ';
				echo 'auto' !== $heading_margin[3] ? intval( $heading_margin[3] ) . 'px ' : 'auto ';
			?>
			!important;
			padding: <?php echo intval( $heading_padding[0] ) . 'px ' . intval( $heading_padding[1] ) . 'px ' . intval( $heading_padding[2] ) . 'px ' . intval( $heading_padding[3] ) . 'px '; ?> !important;
		}
		.layout-description-coming-soon-booster *
		{
			font-size: <?php echo $description_font[0];// WPCS: XSS ok. ?> !important;
			color: <?php echo esc_attr( $description_font[1] ); ?> !important;
			margin:
			<?php
				echo 'auto' !== $description_margin[0] ? intval( $description_margin[0] ) . 'px ' : 'auto ';
				echo 'auto' !== $description_margin[1] ? intval( $description_margin[1] ) . 'px ' : 'auto ';
				echo 'auto' !== $description_margin[2] ? intval( $description_margin[2] ) . 'px ' : 'auto ';
				echo 'auto' !== $description_margin[3] ? intval( $description_margin[3] ) . 'px ' : 'auto ';
			?>
			!important;
			padding: <?php echo intval( $description_padding[0] ) . 'px ' . intval( $description_padding[1] ) . 'px ' . intval( $description_padding[2] ) . 'px ' . intval( $description_padding[3] ) . 'px '; ?> !important;
		}
		.custom-countdown-coming-soon-booster
		{
			font-size: <?php echo $countdown_font[0];// WPCS: XSS ok. ?> !important;
			color: <?php echo esc_attr( $countdown_font[1] ); ?> !important;
			margin:
			<?php
				echo 'auto' !== $countdown_margin[0] ? intval( $countdown_margin[0] ) . 'px ' : 'auto ';
				echo 'auto' !== $countdown_margin[1] ? intval( $countdown_margin[1] ) . 'px ' : 'auto ';
				echo 'auto' !== $countdown_margin[2] ? intval( $countdown_margin[2] ) . 'px ' : 'auto ';
				echo 'auto' !== $countdown_margin[3] ? intval( $countdown_margin[3] ) . 'px ' : 'auto ';
			?>
			!important;
			padding: <?php echo intval( $countdown_padding[0] ) . 'px ' . intval( $countdown_padding[1] ) . 'px ' . intval( $countdown_padding[2] ) . 'px ' . intval( $countdown_padding[3] ) . 'px '; ?>;
		}
		.background-image
		{
			background-image: url(<?php echo esc_attr( plugins_url( 'coming-soon-images/images/coming-soon-image-2.jpg', dirname( dirname( __FILE__ ) ) ) ); ?>)!important;
			background-repeat: <?php echo esc_attr( $image_position[0] ); ?> !important;
			background-position: <?php echo "$image_position[1]	$image_position[2]";// WPCS: XSS ok. ?> !important;
		}
		.contact-heading-coming-soon-booster *
		{
			font-size: <?php echo $contact_heading_font_style[0];// WPCS: XSS ok. ?>;
			color: <?php echo esc_attr( $contact_heading_font_style[1] ); ?>;
			margin:
			<?php
			echo 'auto' !== $contact_heading_margin[0] ? intval( $contact_heading_margin[0] ) . 'px ' : 'auto ';
			echo 'auto' !== $contact_heading_margin[1] ? intval( $contact_heading_margin[1] ) . 'px ' : 'auto ';
			echo 'auto' !== $contact_heading_margin[2] ? intval( $contact_heading_margin[2] ) . 'px ' : 'auto ';
			echo 'auto' !== $contact_heading_margin[3] ? intval( $contact_heading_margin[3] ) . 'px ' : 'auto ';
			?>
			!important;
			padding: <?php echo intval( $contact_heading_padding[0] ) . 'px ' . intval( $contact_heading_padding[1] ) . 'px ' . intval( $contact_heading_padding[2] ) . 'px ' . intval( $contact_heading_padding[3] ) . 'px '; ?> !important;
		}
		.contact-description-coming-soon-booster *
		{
			font-size: <?php echo $contact_description_setting_font_style[0];// WPCS: XSS ok. ?> !important;
			color: <?php echo esc_attr( $contact_description_setting_font_style[1] ); ?> !important;
			margin:
			<?php
			echo 'auto' !== $contact_description_setting_margin[0] ? intval( $contact_description_setting_margin[0] ) . 'px ' : 'auto ';
			echo 'auto' !== $heading_margin[1] ? intval( $contact_description_setting_margin[1] ) . 'px ' : 'auto ';
			echo 'auto' !== $contact_description_setting_margin[2] ? intval( $contact_description_setting_margin[2] ) . 'px ' : 'auto ';
			echo 'auto' !== $contact_description_setting_margin[3] ? intval( $contact_description_setting_margin[3] ) . 'px ' : 'auto ';
			?>
			!important;
			padding: <?php echo intval( $contact_description_setting_padding[0] ) . 'px ' . intval( $contact_description_setting_padding[1] ) . 'px ' . intval( $contact_description_setting_padding[2] ) . 'px ' . intval( $contact_description_setting_padding[3] ) . 'px '; ?> !important;
		}
		.contact-label-coming-soon-booster
		{
			font-size: <?php echo $contact_label_font[0];// WPCS: XSS ok. ?>;
			color: <?php echo esc_attr( $contact_label_font[1] ); ?>;
		}
		.btn
		{
			display: inline-block;
			padding: 6px 12px;
			margin-bottom: 0;
			font-size: 14px;
			line-height: 1.42857143;
			text-align: <?php echo esc_attr( $meta_unserialized_data['label_alignment_contact_form'] ); ?> !important;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-image: none;
			border: 1px solid transparent;
			border-radius: 4px;
		}
		.layout-footer-coming-soon-booster *
		{
			font-size: <?php echo $footer_font[0];// WPCS: XSS ok. ?> !important;
			color: <?php echo esc_attr( $footer_font[1] ); ?> !important;
			margin:
			<?php
			echo 'auto' !== $footer_margin[0] ? intval( $footer_margin[0] ) . 'px ' : 'auto ';
			echo 'auto' !== $footer_margin[1] ? intval( $footer_margin[1] ) . 'px ' : 'auto ';
			echo 'auto' !== $footer_margin[2] ? intval( $footer_margin[2] ) . 'px ' : 'auto ';
			echo 'auto' !== $footer_margin[3] ? intval( $footer_margin[3] ) . 'px ' : 'auto ';
			?>
			!important;
			padding: <?php echo intval( $footer_padding[0] ) . 'px ' . intval( $footer_padding[1] ) . 'px ' . intval( $footer_padding[2] ) . 'px ' . intval( $footer_padding[3] ) . 'px '; ?>!important;
			text-align: center;
			letter-spacing: 2px;
		}
		html, body, div, span,h1, h2, h3, h4, h5, h6, p,a,u, i,ol, ul, li,form, label, legend,
		table, tbody, thead, tr, th, td,canvas,footer,nav,video
		{
			margin: 0;
			padding: 0;
			border: 0;
			vertical-align: baseline;
		}
		footer,nav, section
		{
			display: block;
		}
		body
		{
			line-height: 1;
		}
		ol, ul
		{
			list-style: none;
		}
		#loading
		{
			width: 100vw;
			height: 100vh;
			background-color: <?php echo esc_attr( $meta_data_array['loader_background_color'] ); ?> !important;
			position: fixed;
			z-index: 999;
			top:0;
		}
		#loading #preloader
		{
			position: relative;
			width: 100%;
			height: 80px;
			top: calc(50% - 50px);
			text-align: center;
			margin: 0 auto;
		}
		#loading #preloader:after
		{
			content: "<?php echo 'show' === $meta_data_array['loader_text'] ? esc_attr( $meta_data_array['loader_text_title'] ) : ''; ?>";
			position: absolute;
			font-size: <?php echo $meta_data_array['loader_text_font_size'];// WPCS: XSS ok. ?> !important;
			color: <?php echo esc_attr( $meta_data_array['loader_text_font_color'] ); ?> !important;
			letter-spacing: 1px;
			top: 90px;
			width: 100%;
			left: 0;
			right: 0;
			height: 1px;
			text-align: center;
		}
		#loading #preloader span
		{
			position: absolute;
			color:<?php echo esc_attr( $meta_data_array['loader_color'] ); ?> !important;
			border: 8px solid;
			border-top: 8px solid transparent;
			border-radius: 999px;
		}
		#loading #preloader span:nth-child(1)
		{
			width: 80px;
			height: 80px;
			left: calc(50% - 40px);
			-webkit-animation: spin-1 1s infinite ease;
			-moz-animation: spin-1 1s infinite ease;
			animation: spin-1 1s infinite ease;
		}
		#loading #preloader span:nth-child(2)
		{
			top: 20px;
			left: calc(50% - 20px);
			width: 40px;
			height: 40px;
			-webkit-animation: spin-2 1s infinite ease;
			-moz-animation: spin-2 1s infinite ease;
			animation: spin-2 1s infinite ease;
		}
		#ux_li_moreinformation{
			display:<?php echo 'show' === $meta_data_array['layout_contact_button_visibility'] ? 'block' : 'none'; ?>;
		}
		#ux_li_notifyme{
			display:<?php echo 'show' === $meta_data_array['layout_subscriber_button_visibility'] ? 'block' : 'none'; ?>;
		}
		@-webkit-keyframes spin-1
		{
			0%
			{
				-webkit-transform: rotate(360deg);
				opacity: 1;
			}
			50%
			{
				-webkit-transform: rotate(180deg);
				opacity: 0.5;
			}
			100%
			{
				-webkit-transform: rotate(0deg);
				opacity: 1;
			}
		}
		@-moz-keyframes spin-1
		{
			0%
			{
				-moz-transform: rotate(360deg);
				opacity: 1;
			}
			50%
			{
				-moz-transform: rotate(180deg);
				opacity: 0.5;
			}
			100%
			{
				-moz-transform: rotate(0deg);
				opacity: 1;
			}
		}
		@keyframes spin-1
		{
			0%
			{
				-webkit-transform: rotate(360deg);
				-moz-transform: rotate(360deg);
				-ms-transform: rotate(360deg);
				-o-transform: rotate(360deg);
				transform: rotate(360deg);
				opacity: 1;
			}
			50%
			{
				-webkit-transform: rotate(180deg);
				-moz-transform: rotate(180deg);
				-ms-transform: rotate(180deg);
				-o-transform: rotate(180deg);
				transform: rotate(180deg);
				opacity: 0.5;
			}
			100%
			{
				-webkit-transform: rotate(0deg);
				-moz-transform: rotate(0deg);
				-ms-transform: rotate(0deg);
				-o-transform: rotate(0deg);
				transform: rotate(0deg);
				opacity: 1;
			}
		}
		@-webkit-keyframes spin-2
		{
			0%
			{
				-webkit-transform: rotate(0deg);
				opacity: 0.5;
			}
			50%
			{
				-webkit-transform: rotate(180deg);
				opacity: 1;
			}
			100%
			{
				-webkit-transform: rotate(360deg);
				opacity: 0.5;
			}
		}
		@-moz-keyframes spin-2
		{
			0%
			{
				-moz-transform: rotate(0deg);
				opacity: 0.5;
			}
			50% {
				-moz-transform: rotate(180deg);
				opacity: 1;
			}
			100% {
				-moz-transform: rotate(360deg);
				opacity: 0.5;
			}
		}
		@keyframes spin-2
		{
			0%
			{
				-webkit-transform: rotate(0deg);
				-moz-transform: rotate(0deg);
				-ms-transform: rotate(0deg);
				-o-transform: rotate(0deg);
				transform: rotate(0deg);
				opacity: 0.5;
			}
			50%
			{
				-webkit-transform: rotate(180deg);
				-moz-transform: rotate(180deg);
				-ms-transform: rotate(180deg);
				-o-transform: rotate(180deg);
				transform: rotate(180deg);
				opacity: 1;
			}
			100%
			{
				-webkit-transform: rotate(360deg);
				-moz-transform: rotate(360deg);
				-ms-transform: rotate(360deg);
				-o-transform: rotate(360deg);
				transform: rotate(360deg);
				opacity: 0.5;
			}
		}
		body
		{
			background-color: <?php echo 'color' === $meta_data_array['background_type'] ? esc_attr( $meta_data_array['background_color'] ) : '#20232D'; ?>;
			color: #FFFFFF;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			font-weight: 400;
			font-size: 100%;
			line-height: 1.5em;
			position: absolute;
			height: 100%;
			overflow: hidden;
		}
		.scroll-touch
		{
			overflow-y: auto;
			-webkit-overflow-scrolling: touch;
		}
		body, html
		{
			margin: 0;
			padding: 0;
			-webkit-tap-highlight-color: transparent;
			width: 100%;
		}
		body, input, select, textarea
		{
			-webkit-transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
			-moz-transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
			-ms-transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
			-o-transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
			transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
		}
		a
		{
			-webkit-transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
			-moz-transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
			-ms-transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
			-o-transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
			transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
			cursor: pointer;
			text-decoration: none;
		}
		a:hover
		{
			text-decoration: none !important;
			outline: none !important;
		}
		a:active, a:focus
		{
			outline: none !important;
			text-decoration: none !important;
		}
		button
		{
			-webkit-transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
			-moz-transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
			-ms-transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
			-o-transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
			transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
			cursor: pointer;
		}
		button:hover, button:active, button:focus
		{
			outline: none !important;
			text-decoration: none !important;
		}
		p
		{
			margin: 0;
			line-height: 1.6em;
		}
		h1, h2, h3, h4, h5, h6
		{
			line-height: 1.6em;
		}
		h1 a, h2 a, h3 a, h4 a, h5 a, h6 a
		{
			color: inherit;
			text-decoration: none;
		}
		.clear
		{
			clear: both;
		}
		.display-none
		{
			display: none !important;
		}
		.opacity-0
		{
			opacity: 0 !important;
			visibility: hidden !important;
		}
		.light-btn
		{
			background: <?php echo esc_attr( $meta_data_array['layout_contact_button_color'] ); ?>;
			color: <?php echo esc_attr( $font_style_button_layout_contact[1] ); ?>;
			border: 2px solid <?php echo esc_attr( $meta_data_array['layout_contact_border_color'] ); ?>;
			display: block;
			float: left;
			text-align: <?php echo esc_attr( $meta_data_array['layout_contact_label_alignment'] ); ?> !important;
			font-size: <?php echo $font_style_button_layout_contact[0];// WPCS: XSS ok. ?> !important;
			margin:
			<?php
			echo 'auto' !== $margin_button_layout_contact[0] ? intval( $margin_button_layout_contact[0] ) . 'px ' : 'auto ';
			echo 'auto' !== $margin_button_layout_contact[1] ? intval( $margin_button_layout_contact[1] ) . 'px ' : 'auto ';
			echo 'auto' !== $margin_button_layout_contact[2] ? intval( $margin_button_layout_contact[2] ) . 'px ' : 'auto ';
			echo 'auto' !== $margin_button_layout_contact[3] ? intval( $margin_button_layout_contact[3] ) . 'px ' : 'auto ';
			?>
			!important;
			padding: <?php echo intval( $padding_button_layout_contact[0] ) . 'px ' . intval( $padding_button_layout_contact[1] ) . 'px ' . intval( $padding_button_layout_contact[2] ) . 'px ' . intval( $padding_button_layout_contact[3] ) . 'px '; ?> !important;
		}
		.light-btn:hover
		{
			background: <?php echo esc_attr( $meta_data_array['layout_contact_hover_color'] ); ?> !important;
			color: <?php echo esc_attr( $meta_data_array['layout_contact_text_hover_color'] ); ?> !important;
			border-color: <?php echo esc_attr( $meta_data_array['layout_contact_border_hover_color'] ); ?> !important;
		}
		.action-btn
		{
			background: <?php echo esc_attr( $meta_data_array['layout_subscriber_button_color'] ); ?>;
			border-radius: 0;
			color: <?php echo esc_attr( $font_style_button_layout_subscriber[1] ); ?> !important;
			display: block;
			float: left;
			text-align: <?php echo esc_attr( $meta_data_array['layout_subscriber_label_alignment'] ); ?> !important;
			border: 2px solid <?php echo esc_attr( $meta_data_array['layout_subscriber_border_color'] ); ?>;
			font-size: <?php echo $font_style_button_layout_subscriber[0];// WPCS: XSS ok. ?> !important;
			margin:
			<?php
			echo 'auto' !== $margin_button_layout_subscriber[0] ? intval( $margin_button_layout_subscriber[0] ) . 'px ' : 'auto ';
			echo 'auto' !== $margin_button_layout_subscriber[1] ? intval( $margin_button_layout_subscriber[1] ) . 'px ' : 'auto ';
			echo 'auto' !== $margin_button_layout_subscriber[2] ? intval( $margin_button_layout_subscriber[2] ) . 'px ' : 'auto ';
			echo 'auto' !== $margin_button_layout_subscriber[3] ? intval( $margin_button_layout_subscriber[3] ) . 'px ' : 'auto ';
			?>
			!important;
			padding: <?php echo intval( $padding_button_layout_subscriber[0] ) . 'px ' . intval( $padding_button_layout_subscriber[1] ) . 'px ' . intval( $padding_button_layout_subscriber[2] ) . 'px ' . intval( $padding_button_layout_subscriber[3] ) . 'px '; ?> !important;
		}
		.action-btn:hover
		{
			background: <?php echo esc_attr( $meta_data_array['layout_subscriber_hover_color'] ); ?> !important;
			border-color: <?php echo esc_attr( $meta_data_array['layout_subscriber_border_hover_color'] ); ?>;
			color: <?php echo esc_attr( $meta_data_array['layout_subscriber_text_hover_color'] ); ?> !important;
		}
		.global-overlay
		{
			position: fixed;
			top: 0;
			left: -100vw;
			height: 100%;
			overflow: visible;
			width: 100%;
			opacity: 0;
		}
		.overlay
		{
			position: fixed;
			overflow: hidden;
			top: 0;
			left: -50%;
			background-color: <?php echo esc_attr( $meta_data_array['overlay_color'] ); ?> !important;
			opacity: <?php echo intval( $meta_data_array['overlay_color_opacity'] ) / 100; ?> !important;
			width: 100%;
			height: 100%;
			-webkit-transition: all 0.5s cubic-bezier(0.7, 0, 0.3, 1);
			-moz-transition: all 0.5s cubic-bezier(0.7, 0, 0.3, 1);
			-ms-transition: all 0.5s cubic-bezier(0.7, 0, 0.3, 1);
			-o-transition: all 0.5s cubic-bezier(0.7, 0, 0.3, 1);
			transition: all 0.5s cubic-bezier(0.7, 0, 0.3, 1);
			border-right: 1px solid <?php echo esc_attr( $meta_data_array['overlay_color'] ); ?> !important;
		}
		.overlay.skew-part
		{
			-webkit-transform: skew(-25deg, 0deg);
			-moz-transform: skew(-25deg, 0deg);
			-ms-transform: skew(-25deg, 0deg);
			-o-transform: skew(-25deg, 0deg);
			transform: skew(-25deg, 0deg);
		}
		#stars
		{
			width: 1px;
			height: 1px;
			margin-left: 25%;
			background: transparent;
			box-shadow: 911px 1526px #FFF , 151px 1484px #FFF , 620px 2457px #FFF , 633px 1741px #FFF , 1744px 1190px #FFF , 2295px 1746px #FFF , 499px 2140px #FFF , 381px 1974px #FFF , 2108px 332px #FFF , 1132px 147px #FFF , 50px 915px #FFF , 1407px 374px #FFF , 1677px 2478px #FFF , 460px 443px #FFF , 2269px 1727px #FFF , 2399px 1655px #FFF , 109px 660px #FFF , 331px 854px #FFF , 162px 1648px #FFF , 8px 1329px #FFF , 344px 1124px #FFF , 805px 1534px #FFF , 438px 402px #FFF , 1037px 726px #FFF , 924px 1634px #FFF , 1416px 450px #FFF , 130px 1966px #FFF , 1065px 1126px #FFF , 1502px 2341px #FFF , 1275px 329px #FFF , 2053px 208px #FFF , 222px 1365px #FFF , 2364px 1379px #FFF , 1193px 1977px #FFF , 750px 460px #FFF , 1339px 2490px #FFF , 2314px 16px #FFF , 1553px 2297px #FFF , 2371px 55px #FFF , 735px 1286px #FFF , 930px 1320px #FFF , 1062px 2318px #FFF , 1175px 581px #FFF , 1974px 1157px #FFF , 1188px 1716px #FFF , 559px 1780px #FFF , 2240px 719px #FFF , 1743px 2127px #FFF , 1639px 1281px #FFF , 1301px 1158px #FFF , 762px 872px #FFF , 1743px 674px #FFF , 8px 1580px #FFF , 2045px 1877px #FFF , 1428px 520px #FFF , 1693px 1179px #FFF , 170px 2468px #FFF , 689px 836px #FFF , 2004px 96px #FFF , 1805px 126px #FFF , 900px 518px #FFF , 2462px 1245px #FFF , 361px 1979px #FFF , 2048px 1436px #FFF , 643px 2484px #FFF , 696px 837px #FFF , 2392px 155px #FFF , 1258px 1474px #FFF , 994px 2111px #FFF , 438px 887px #FFF , 708px 1091px #FFF , 1389px 1720px #FFF , 1811px 589px #FFF , 1730px 2316px #FFF , 2431px 2425px #FFF , 1251px 1073px #FFF , 212px 1513px #FFF , 355px 1443px #FFF , 2197px 844px #FFF , 511px 113px #FFF , 1674px 2449px #FFF , 880px 1297px #FFF , 1478px 757px #FFF , 559px 2421px #FFF , 976px 807px #FFF , 27px 2105px #FFF , 2165px 1896px #FFF , 2470px 628px #FFF , 2097px 965px #FFF , 1313px 1480px #FFF , 639px 1669px #FFF , 1781px 2050px #FFF , 2216px 1781px #FFF , 708px 1386px #FFF , 97px 2374px #FFF , 2487px 1108px #FFF , 2327px 369px #FFF , 500px 773px #FFF , 1277px 2091px #FFF , 1951px 1318px #FFF , 1218px 747px #FFF , 1025px 235px #FFF , 782px 1814px #FFF , 1820px 1534px #FFF , 1553px 1480px #FFF , 1126px 1398px #FFF , 649px 1026px #FFF , 1845px 1414px #FFF , 1212px 2302px #FFF , 245px 416px #FFF , 2357px 2453px #FFF , 1189px 1015px #FFF , 1214px 1124px #FFF , 828px 1872px #FFF , 2248px 1073px #FFF , 1395px 1998px #FFF , 277px 1916px #FFF , 2492px 2298px #FFF , 2451px 2307px #FFF , 1963px 805px #FFF , 1516px 1048px #FFF , 1955px 1908px #FFF , 737px 396px #FFF , 1365px 2405px #FFF , 2241px 2135px #FFF , 235px 1317px #FFF , 264px 885px #FFF , 869px 816px #FFF , 144px 195px #FFF , 1848px 858px #FFF , 283px 1011px #FFF , 2230px 213px #FFF , 325px 2361px #FFF , 1880px 2422px #FFF , 924px 486px #FFF , 74px 310px #FFF , 1521px 1621px #FFF , 2453px 1805px #FFF , 578px 2453px #FFF , 1746px 1606px #FFF , 1314px 2384px #FFF , 545px 1399px #FFF , 1103px 1373px #FFF , 1919px 1196px #FFF , 443px 738px #FFF , 199px 2421px #FFF , 391px 654px #FFF , 1528px 692px #FFF , 256px 984px #FFF , 553px 1079px #FFF , 205px 2351px #FFF , 1774px 2009px #FFF , 485px 569px #FFF , 222px 56px #FFF , 1921px 1558px #FFF , 1111px 892px #FFF , 1856px 693px #FFF , 2016px 1977px #FFF , 1672px 2097px #FFF , 1777px 1183px #FFF , 126px 53px #FFF , 597px 1395px #FFF , 903px 2388px #FFF , 327px 86px #FFF , 1993px 1178px #FFF , 1763px 170px #FFF , 1580px 1426px #FFF , 467px 2180px #FFF , 802px 118px #FFF , 83px 595px #FFF , 809px 2281px #FFF , 465px 386px #FFF , 389px 1862px #FFF , 2390px 2156px #FFF , 1234px 397px #FFF , 596px 1103px #FFF , 1628px 1445px #FFF , 567px 193px #FFF , 779px 230px #FFF , 1358px 320px #FFF , 901px 1984px #FFF , 1788px 1262px #FFF , 1439px 825px #FFF , 16px 2130px #FFF , 935px 1758px #FFF , 1632px 583px #FFF , 1483px 726px #FFF , 787px 835px #FFF , 2220px 1917px #FFF , 1167px 1127px #FFF , 1495px 1985px #FFF , 365px 1885px #FFF , 1581px 1329px #FFF , 500px 724px #FFF , 1330px 1519px #FFF , 1430px 808px #FFF , 1840px 1959px #FFF , 213px 2359px #FFF , 710px 2435px #FFF , 761px 2352px #FFF , 1407px 582px #FFF , 889px 427px #FFF , 1781px 883px #FFF , 1980px 2136px #FFF , 2146px 837px #FFF , 1538px 576px #FFF , 1256px 1149px #FFF , 627px 1931px #FFF , 1651px 843px #FFF , 549px 2368px #FFF , 1419px 1696px #FFF , 81px 2459px #FFF , 2068px 2051px #FFF , 542px 326px #FFF , 331px 2191px #FFF , 1426px 2394px #FFF , 1190px 1502px #FFF , 279px 2248px #FFF , 764px 2188px #FFF , 84px 270px #FFF , 220px 1405px #FFF , 1342px 1076px #FFF , 972px 1121px #FFF , 1056px 427px #FFF , 1584px 1034px #FFF , 1080px 4px #FFF , 2477px 1142px #FFF , 147px 1589px #FFF , 113px 315px #FFF , 1222px 2379px #FFF , 2469px 957px #FFF , 1645px 97px #FFF , 315px 2144px #FFF , 315px 349px #FFF , 158px 682px #FFF , 127px 1174px #FFF , 626px 182px #FFF , 1328px 1001px #FFF , 1971px 183px #FFF , 1839px 1975px #FFF , 164px 139px #FFF , 1406px 2313px #FFF , 448px 1618px #FFF , 1163px 1915px #FFF , 1037px 679px #FFF , 2113px 2420px #FFF , 2216px 1657px #FFF , 196px 1274px #FFF , 1457px 484px #FFF , 2209px 1367px #FFF , 1213px 2260px #FFF , 750px 945px #FFF , 2242px 1545px #FFF , 2400px 802px #FFF , 1452px 153px #FFF , 341px 1994px #FFF , 1419px 1867px #FFF , 2287px 94px #FFF , 772px 1752px #FFF , 2202px 298px #FFF , 1702px 1665px #FFF , 115px 2106px #FFF , 1494px 1324px #FFF , 418px 1186px #FFF , 1266px 1593px #FFF , 605px 2016px #FFF , 2110px 2058px #FFF , 969px 1508px #FFF , 2313px 1309px #FFF , 2343px 674px #FFF , 626px 1142px #FFF , 1890px 1216px #FFF , 1794px 1520px #FFF , 1826px 1334px #FFF , 2298px 1036px #FFF , 221px 1729px #FFF , 1665px 1648px #FFF , 948px 2475px #FFF , 1795px 1058px #FFF , 1163px 572px #FFF , 1654px 2370px #FFF , 1232px 2151px #FFF , 379px 1504px #FFF , 1033px 1487px #FFF , 1524px 519px #FFF , 1997px 510px #FFF , 1048px 2042px #FFF , 1800px 559px #FFF , 1280px 1368px #FFF , 336px 2264px #FFF , 2064px 1849px #FFF , 2312px 1808px #FFF , 2030px 484px #FFF , 2439px 997px #FFF , 1815px 2197px #FFF , 1845px 1924px #FFF , 397px 250px #FFF , 1100px 1445px #FFF , 2367px 1100px #FFF , 498px 2014px #FFF , 1380px 1151px #FFF , 648px 1530px #FFF , 699px 506px #FFF , 2061px 1137px #FFF , 1685px 468px #FFF , 2003px 2473px #FFF , 192px 338px #FFF , 1014px 1235px #FFF , 485px 659px #FFF , 841px 1145px #FFF , 302px 2373px #FFF , 846px 1281px #FFF , 2219px 1122px #FFF , 1368px 1225px #FFF , 846px 533px #FFF , 1696px 2368px #FFF , 572px 244px #FFF , 1727px 1099px #FFF , 808px 1667px #FFF , 2427px 414px #FFF , 1312px 1945px #FFF , 2392px 1328px #FFF , 2436px 1489px #FFF , 1556px 583px #FFF , 1410px 1615px #FFF , 1204px 83px #FFF , 98px 1816px #FFF , 937px 36px #FFF , 1270px 1563px #FFF , 2064px 2403px #FFF , 770px 2049px #FFF , 44px 1271px #FFF , 742px 131px #FFF , 1326px 227px #FFF , 1024px 2166px #FFF , 1639px 1676px #FFF , 730px 1126px #FFF , 1670px 437px #FFF , 1391px 590px #FFF , 67px 2488px #FFF , 2338px 892px #FFF , 1871px 811px #FFF , 1959px 325px #FFF , 890px 24px #FFF , 2470px 1476px #FFF , 26px 1101px #FFF , 1858px 1735px #FFF , 353px 1090px #FFF , 2448px 1714px #FFF , 2009px 1152px #FFF , 810px 2086px #FFF , 986px 336px #FFF , 1866px 1824px #FFF , 1497px 570px #FFF , 564px 1674px #FFF , 1763px 2312px #FFF , 1078px 1799px #FFF , 2225px 2089px #FFF , 2335px 640px #FFF , 184px 1579px #FFF , 1286px 639px #FFF , 995px 1523px #FFF , 1312px 660px #FFF , 697px 1751px #FFF , 872px 1800px #FFF , 2370px 1710px #FFF , 1817px 1159px #FFF , 1679px 891px #FFF , 1424px 955px #FFF , 1893px 2089px #FFF , 2350px 1791px #FFF , 28px 1303px #FFF , 578px 207px #FFF , 978px 2481px #FFF , 2060px 1148px #FFF , 760px 63px #FFF , 1407px 2083px #FFF , 825px 176px #FFF , 1617px 1970px #FFF , 214px 1999px #FFF , 1318px 2292px #FFF , 1251px 143px #FFF , 1538px 2224px #FFF , 1221px 761px #FFF , 933px 2211px #FFF , 1184px 1158px #FFF , 235px 1602px #FFF , 2120px 559px #FFF , 609px 462px #FFF , 871px 1446px #FFF , 2315px 2029px #FFF , 2484px 2466px #FFF , 2226px 976px #FFF , 2048px 467px #FFF , 2208px 724px #FFF , 413px 935px #FFF , 1219px 2398px #FFF , 618px 1723px #FFF , 565px 1631px #FFF , 1212px 2183px #FFF , 396px 2451px #FFF , 2057px 1196px #FFF , 896px 24px #FFF , 2388px 1186px #FFF , 473px 662px #FFF , 2102px 502px #FFF , 367px 274px #FFF , 1166px 247px #FFF , 932px 680px #FFF , 1829px 1330px #FFF , 831px 265px #FFF , 279px 1912px #FFF , 523px 955px #FFF , 112px 29px #FFF , 295px 360px #FFF , 2251px 1615px #FFF , 360px 363px #FFF , 1896px 2241px #FFF , 1371px 54px #FFF , 2352px 2034px #FFF , 2328px 407px #FFF , 284px 1113px #FFF , 507px 2321px #FFF , 2160px 1374px #FFF , 1754px 727px #FFF , 1146px 2392px #FFF , 1987px 849px #FFF , 2100px 1681px #FFF , 2186px 1321px #FFF , 2216px 1695px #FFF , 1445px 1483px #FFF , 2484px 539px #FFF , 1763px 1093px #FFF , 1043px 1248px #FFF , 435px 1409px #FFF , 1393px 2229px #FFF , 2299px 157px #FFF , 983px 2360px #FFF , 2248px 1141px #FFF , 473px 2390px #FFF , 2249px 978px #FFF , 964px 876px #FFF , 1516px 1936px #FFF , 1985px 2488px #FFF , 988px 835px #FFF , 50px 1191px #FFF , 1463px 294px #FFF , 276px 129px #FFF , 1205px 2318px #FFF , 824px 1444px #FFF , 788px 2266px #FFF , 279px 2206px #FFF , 523px 2076px #FFF , 152px 158px #FFF , 612px 97px #FFF , 611px 2429px #FFF , 502px 1873px #FFF , 837px 1855px #FFF , 590px 808px #FFF , 1490px 2325px #FFF , 1096px 520px #FFF , 241px 1841px #FFF , 1170px 2033px #FFF , 2024px 1229px #FFF , 234px 2170px #FFF , 2128px 915px #FFF , 1070px 840px #FFF , 2087px 235px #FFF , 389px 269px #FFF , 474px 1761px #FFF , 1454px 1311px #FFF , 959px 2428px #FFF , 1038px 1443px #FFF , 965px 1252px #FFF , 306px 722px #FFF , 2339px 476px #FFF , 573px 666px #FFF , 1579px 1620px #FFF , 2474px 1611px #FFF , 2275px 730px #FFF , 621px 325px #FFF , 1353px 439px #FFF , 1026px 2485px #FFF , 1639px 51px #FFF , 1989px 1123px #FFF , 925px 1992px #FFF , 987px 1633px #FFF , 1950px 1676px #FFF , 30px 1212px #FFF , 1306px 1214px #FFF , 905px 2438px #FFF , 1099px 2153px #FFF , 1988px 973px #FFF , 598px 178px #FFF , 1758px 2424px #FFF , 222px 1602px #FFF , 1117px 602px #FFF , 2257px 1928px #FFF , 2397px 2469px #FFF , 2330px 758px #FFF , 434px 1619px #FFF , 1852px 1420px #FFF , 1386px 1336px #FFF , 2189px 48px #FFF , 2319px 202px #FFF , 44px 763px #FFF , 75px 2119px #FFF , 2477px 688px #FFF , 2462px 1793px #FFF , 1299px 2252px #FFF , 1089px 561px #FFF , 1364px 2128px #FFF , 797px 730px #FFF , 29px 1081px #FFF , 225px 1531px #FFF , 807px 1940px #FFF , 1414px 1868px #FFF , 1714px 1161px #FFF , 435px 823px #FFF , 2317px 1820px #FFF , 2216px 969px #FFF , 821px 1843px #FFF , 1026px 440px #FFF , 887px 2308px #FFF , 2320px 1001px #FFF , 655px 1495px #FFF , 1702px 60px #FFF , 1727px 781px #FFF , 874px 1770px #FFF , 2352px 1861px #FFF , 976px 372px #FFF , 851px 422px #FFF , 692px 47px #FFF , 2200px 1883px #FFF , 675px 2259px #FFF , 1477px 9px #FFF , 1241px 800px #FFF , 1326px 540px #FFF , 2244px 2451px #FFF , 757px 239px #FFF , 2259px 2401px #FFF , 353px 484px #FFF , 2186px 364px #FFF , 1762px 2373px #FFF , 485px 1328px #FFF , 640px 279px #FFF , 34px 882px #FFF , 1896px 1046px #FFF , 730px 1087px #FFF , 2446px 2193px #FFF , 1510px 2065px #FFF , 728px 1103px #FFF , 967px 1801px #FFF , 2140px 1118px #FFF , 1694px 2044px #FFF , 422px 1239px #FFF , 2059px 1308px #FFF , 1256px 504px #FFF , 1416px 2140px #FFF , 2146px 1138px #FFF , 2174px 1357px #FFF , 2274px 1180px #FFF , 1042px 1104px #FFF , 2182px 2388px #FFF , 860px 592px #FFF , 1242px 1850px #FFF , 1989px 651px #FFF , 2441px 1437px #FFF , 2364px 837px #FFF , 326px 895px #FFF , 1909px 811px #FFF , 1074px 715px #FFF , 1059px 2428px #FFF , 288px 1031px #FFF , 2365px 1853px #FFF , 192px 419px #FFF , 2110px 724px #FFF , 722px 677px #FFF , 2151px 574px #FFF , 2288px 2355px #FFF , 1685px 131px #FFF , 2141px 931px #FFF , 1690px 2005px #FFF , 1008px 462px #FFF , 2240px 1222px #FFF , 1160px 2041px #FFF , 887px 351px #FFF , 903px 2022px #FFF , 822px 265px #FFF , 1080px 1315px #FFF , 282px 1892px #FFF , 487px 2235px #FFF , 1952px 2432px #FFF , 858px 15px #FFF , 797px 302px #FFF , 973px 191px #FFF , 2357px 1386px #FFF , 1367px 1818px #FFF , 2226px 1856px #FFF , 1909px 2243px #FFF , 1307px 1605px #FFF , 1991px 1939px #FFF , 2311px 379px #FFF , 287px 1800px #FFF , 937px 2384px #FFF , 231px 22px #FFF , 1128px 568px #FFF , 510px 79px #FFF , 2032px 1799px #FFF , 873px 1994px #FFF , 2494px 216px #FFF , 1296px 1851px #FFF , 1318px 1021px #FFF , 769px 1940px #FFF , 1509px 205px #FFF , 2285px 740px #FFF , 613px 1236px #FFF , 1247px 2234px #FFF , 1812px 2061px #FFF , 2387px 703px #FFF , 748px 336px #FFF , 999px 109px #FFF , 1150px 1806px #FFF , 1396px 1373px #FFF , 169px 230px #FFF , 45px 1289px #FFF , 1500px 1224px #FFF , 444px 1633px #FFF , 1047px 535px #FFF , 906px 1909px #FFF , 252px 393px #FFF , 1971px 1241px #FFF , 179px 2243px #FFF , 2371px 1037px #FFF , 1775px 1938px #FFF , 440px 2072px #FFF , 617px 1577px #FFF , 633px 844px #FFF , 2274px 1720px #FFF , 758px 424px #FFF , 1873px 2049px #FFF , 918px 986px #FFF , 445px 1276px #FFF , 2311px 713px #FFF , 2020px 2486px #FFF , 1181px 1390px #FFF , 815px 19px #FFF , 172px 1901px #FFF , 417px 1123px #FFF , 1634px 2242px #FFF , 565px 1112px #FFF , 1283px 2328px #FFF , 405px 578px #FFF , 1881px 1179px #FFF , 48px 1987px #FFF , 711px 2130px #FFF , 455px 1422px #FFF , 1132px 2118px #FFF , 268px 2266px #FFF , 2436px 49px #FFF , 1559px 2318px #FFF , 1424px 306px #FFF , 462px 974px #FFF , 2114px 1883px #FFF , 1184px 207px #FFF , 713px 860px #FFF , 738px 312px #FFF , 542px 1528px #FFF , 826px 1897px #FFF , 371px 127px #FFF , 1598px 1033px #FFF , 950px 2250px #FFF , 1639px 2243px #FFF , 647px 1057px #FFF , 1851px 594px #FFF , 1047px 2114px #FFF , 566px 166px #FFF , 408px 290px #FFF , 206px 2176px #FFF , 1972px 1650px #FFF , 951px 181px #FFF , 842px 326px #FFF , 1155px 298px #FFF , 2267px 1235px #FFF , 998px 1974px #FFF , 768px 1016px #FFF , 717px 1168px #FFF , 154px 2354px #FFF , 1039px 1560px #FFF , 580px 1308px #FFF , 1093px 2398px #FFF , 238px 85px #FFF , 1932px 29px #FFF , 524px 1813px #FFF , 2084px 1415px #FFF , 2263px 900px #FFF , 168px 2256px #FFF , 2333px 1221px #FFF , 1098px 1049px #FFF , 600px 2393px #FFF;
			-webkit-animation: animStar 50s infinite linear;
			-moz-animation: animStar 50s infinite linear;
			animation: animStar 50s infinite linear;
		}
		#stars:after
		{
			content: " ";
			position: absolute;
			top: 2000px;
			width: 1px;
			height: 1px;
			background: transparent;
			box-shadow: 911px 1526px #FFF , 151px 1484px #FFF , 620px 2457px #FFF , 633px 1741px #FFF , 1744px 1190px #FFF , 2295px 1746px #FFF , 499px 2140px #FFF , 381px 1974px #FFF , 2108px 332px #FFF , 1132px 147px #FFF , 50px 915px #FFF , 1407px 374px #FFF , 1677px 2478px #FFF , 460px 443px #FFF , 2269px 1727px #FFF , 2399px 1655px #FFF , 109px 660px #FFF , 331px 854px #FFF , 162px 1648px #FFF , 8px 1329px #FFF , 344px 1124px #FFF , 805px 1534px #FFF , 438px 402px #FFF , 1037px 726px #FFF , 924px 1634px #FFF , 1416px 450px #FFF , 130px 1966px #FFF , 1065px 1126px #FFF , 1502px 2341px #FFF , 1275px 329px #FFF , 2053px 208px #FFF , 222px 1365px #FFF , 2364px 1379px #FFF , 1193px 1977px #FFF , 750px 460px #FFF , 1339px 2490px #FFF , 2314px 16px #FFF , 1553px 2297px #FFF , 2371px 55px #FFF , 735px 1286px #FFF , 930px 1320px #FFF , 1062px 2318px #FFF , 1175px 581px #FFF , 1974px 1157px #FFF , 1188px 1716px #FFF , 559px 1780px #FFF , 2240px 719px #FFF , 1743px 2127px #FFF , 1639px 1281px #FFF , 1301px 1158px #FFF , 762px 872px #FFF , 1743px 674px #FFF , 8px 1580px #FFF , 2045px 1877px #FFF , 1428px 520px #FFF , 1693px 1179px #FFF , 170px 2468px #FFF , 689px 836px #FFF , 2004px 96px #FFF , 1805px 126px #FFF , 900px 518px #FFF , 2462px 1245px #FFF , 361px 1979px #FFF , 2048px 1436px #FFF , 643px 2484px #FFF , 696px 837px #FFF , 2392px 155px #FFF , 1258px 1474px #FFF , 994px 2111px #FFF , 438px 887px #FFF , 708px 1091px #FFF , 1389px 1720px #FFF , 1811px 589px #FFF , 1730px 2316px #FFF , 2431px 2425px #FFF , 1251px 1073px #FFF , 212px 1513px #FFF , 355px 1443px #FFF , 2197px 844px #FFF , 511px 113px #FFF , 1674px 2449px #FFF , 880px 1297px #FFF , 1478px 757px #FFF , 559px 2421px #FFF , 976px 807px #FFF , 27px 2105px #FFF , 2165px 1896px #FFF , 2470px 628px #FFF , 2097px 965px #FFF , 1313px 1480px #FFF , 639px 1669px #FFF , 1781px 2050px #FFF , 2216px 1781px #FFF , 708px 1386px #FFF , 97px 2374px #FFF , 2487px 1108px #FFF , 2327px 369px #FFF , 500px 773px #FFF , 1277px 2091px #FFF , 1951px 1318px #FFF , 1218px 747px #FFF , 1025px 235px #FFF , 782px 1814px #FFF , 1820px 1534px #FFF , 1553px 1480px #FFF , 1126px 1398px #FFF , 649px 1026px #FFF , 1845px 1414px #FFF , 1212px 2302px #FFF , 245px 416px #FFF , 2357px 2453px #FFF , 1189px 1015px #FFF , 1214px 1124px #FFF , 828px 1872px #FFF , 2248px 1073px #FFF , 1395px 1998px #FFF , 277px 1916px #FFF , 2492px 2298px #FFF , 2451px 2307px #FFF , 1963px 805px #FFF , 1516px 1048px #FFF , 1955px 1908px #FFF , 737px 396px #FFF , 1365px 2405px #FFF , 2241px 2135px #FFF , 235px 1317px #FFF , 264px 885px #FFF , 869px 816px #FFF , 144px 195px #FFF , 1848px 858px #FFF , 283px 1011px #FFF , 2230px 213px #FFF , 325px 2361px #FFF , 1880px 2422px #FFF , 924px 486px #FFF , 74px 310px #FFF , 1521px 1621px #FFF , 2453px 1805px #FFF , 578px 2453px #FFF , 1746px 1606px #FFF , 1314px 2384px #FFF , 545px 1399px #FFF , 1103px 1373px #FFF , 1919px 1196px #FFF , 443px 738px #FFF , 199px 2421px #FFF , 391px 654px #FFF , 1528px 692px #FFF , 256px 984px #FFF , 553px 1079px #FFF , 205px 2351px #FFF , 1774px 2009px #FFF , 485px 569px #FFF , 222px 56px #FFF , 1921px 1558px #FFF , 1111px 892px #FFF , 1856px 693px #FFF , 2016px 1977px #FFF , 1672px 2097px #FFF , 1777px 1183px #FFF , 126px 53px #FFF , 597px 1395px #FFF , 903px 2388px #FFF , 327px 86px #FFF , 1993px 1178px #FFF , 1763px 170px #FFF , 1580px 1426px #FFF , 467px 2180px #FFF , 802px 118px #FFF , 83px 595px #FFF , 809px 2281px #FFF , 465px 386px #FFF , 389px 1862px #FFF , 2390px 2156px #FFF , 1234px 397px #FFF , 596px 1103px #FFF , 1628px 1445px #FFF , 567px 193px #FFF , 779px 230px #FFF , 1358px 320px #FFF , 901px 1984px #FFF , 1788px 1262px #FFF , 1439px 825px #FFF , 16px 2130px #FFF , 935px 1758px #FFF , 1632px 583px #FFF , 1483px 726px #FFF , 787px 835px #FFF , 2220px 1917px #FFF , 1167px 1127px #FFF , 1495px 1985px #FFF , 365px 1885px #FFF , 1581px 1329px #FFF , 500px 724px #FFF , 1330px 1519px #FFF , 1430px 808px #FFF , 1840px 1959px #FFF , 213px 2359px #FFF , 710px 2435px #FFF , 761px 2352px #FFF , 1407px 582px #FFF , 889px 427px #FFF , 1781px 883px #FFF , 1980px 2136px #FFF , 2146px 837px #FFF , 1538px 576px #FFF , 1256px 1149px #FFF , 627px 1931px #FFF , 1651px 843px #FFF , 549px 2368px #FFF , 1419px 1696px #FFF , 81px 2459px #FFF , 2068px 2051px #FFF , 542px 326px #FFF , 331px 2191px #FFF , 1426px 2394px #FFF , 1190px 1502px #FFF , 279px 2248px #FFF , 764px 2188px #FFF , 84px 270px #FFF , 220px 1405px #FFF , 1342px 1076px #FFF , 972px 1121px #FFF , 1056px 427px #FFF , 1584px 1034px #FFF , 1080px 4px #FFF , 2477px 1142px #FFF , 147px 1589px #FFF , 113px 315px #FFF , 1222px 2379px #FFF , 2469px 957px #FFF , 1645px 97px #FFF , 315px 2144px #FFF , 315px 349px #FFF , 158px 682px #FFF , 127px 1174px #FFF , 626px 182px #FFF , 1328px 1001px #FFF , 1971px 183px #FFF , 1839px 1975px #FFF , 164px 139px #FFF , 1406px 2313px #FFF , 448px 1618px #FFF , 1163px 1915px #FFF , 1037px 679px #FFF , 2113px 2420px #FFF , 2216px 1657px #FFF , 196px 1274px #FFF , 1457px 484px #FFF , 2209px 1367px #FFF , 1213px 2260px #FFF , 750px 945px #FFF , 2242px 1545px #FFF , 2400px 802px #FFF , 1452px 153px #FFF , 341px 1994px #FFF , 1419px 1867px #FFF , 2287px 94px #FFF , 772px 1752px #FFF , 2202px 298px #FFF , 1702px 1665px #FFF , 115px 2106px #FFF , 1494px 1324px #FFF , 418px 1186px #FFF , 1266px 1593px #FFF , 605px 2016px #FFF , 2110px 2058px #FFF , 969px 1508px #FFF , 2313px 1309px #FFF , 2343px 674px #FFF , 626px 1142px #FFF , 1890px 1216px #FFF , 1794px 1520px #FFF , 1826px 1334px #FFF , 2298px 1036px #FFF , 221px 1729px #FFF , 1665px 1648px #FFF , 948px 2475px #FFF , 1795px 1058px #FFF , 1163px 572px #FFF , 1654px 2370px #FFF , 1232px 2151px #FFF , 379px 1504px #FFF , 1033px 1487px #FFF , 1524px 519px #FFF , 1997px 510px #FFF , 1048px 2042px #FFF , 1800px 559px #FFF , 1280px 1368px #FFF , 336px 2264px #FFF , 2064px 1849px #FFF , 2312px 1808px #FFF , 2030px 484px #FFF , 2439px 997px #FFF , 1815px 2197px #FFF , 1845px 1924px #FFF , 397px 250px #FFF , 1100px 1445px #FFF , 2367px 1100px #FFF , 498px 2014px #FFF , 1380px 1151px #FFF , 648px 1530px #FFF , 699px 506px #FFF , 2061px 1137px #FFF , 1685px 468px #FFF , 2003px 2473px #FFF , 192px 338px #FFF , 1014px 1235px #FFF , 485px 659px #FFF , 841px 1145px #FFF , 302px 2373px #FFF , 846px 1281px #FFF , 2219px 1122px #FFF , 1368px 1225px #FFF , 846px 533px #FFF , 1696px 2368px #FFF , 572px 244px #FFF , 1727px 1099px #FFF , 808px 1667px #FFF , 2427px 414px #FFF , 1312px 1945px #FFF , 2392px 1328px #FFF , 2436px 1489px #FFF , 1556px 583px #FFF , 1410px 1615px #FFF , 1204px 83px #FFF , 98px 1816px #FFF , 937px 36px #FFF , 1270px 1563px #FFF , 2064px 2403px #FFF , 770px 2049px #FFF , 44px 1271px #FFF , 742px 131px #FFF , 1326px 227px #FFF , 1024px 2166px #FFF , 1639px 1676px #FFF , 730px 1126px #FFF , 1670px 437px #FFF , 1391px 590px #FFF , 67px 2488px #FFF , 2338px 892px #FFF , 1871px 811px #FFF , 1959px 325px #FFF , 890px 24px #FFF , 2470px 1476px #FFF , 26px 1101px #FFF , 1858px 1735px #FFF , 353px 1090px #FFF , 2448px 1714px #FFF , 2009px 1152px #FFF , 810px 2086px #FFF , 986px 336px #FFF , 1866px 1824px #FFF , 1497px 570px #FFF , 564px 1674px #FFF , 1763px 2312px #FFF , 1078px 1799px #FFF , 2225px 2089px #FFF , 2335px 640px #FFF , 184px 1579px #FFF , 1286px 639px #FFF , 995px 1523px #FFF , 1312px 660px #FFF , 697px 1751px #FFF , 872px 1800px #FFF , 2370px 1710px #FFF , 1817px 1159px #FFF , 1679px 891px #FFF , 1424px 955px #FFF , 1893px 2089px #FFF , 2350px 1791px #FFF , 28px 1303px #FFF , 578px 207px #FFF , 978px 2481px #FFF , 2060px 1148px #FFF , 760px 63px #FFF , 1407px 2083px #FFF , 825px 176px #FFF , 1617px 1970px #FFF , 214px 1999px #FFF , 1318px 2292px #FFF , 1251px 143px #FFF , 1538px 2224px #FFF , 1221px 761px #FFF , 933px 2211px #FFF , 1184px 1158px #FFF , 235px 1602px #FFF , 2120px 559px #FFF , 609px 462px #FFF , 871px 1446px #FFF , 2315px 2029px #FFF , 2484px 2466px #FFF , 2226px 976px #FFF , 2048px 467px #FFF , 2208px 724px #FFF , 413px 935px #FFF , 1219px 2398px #FFF , 618px 1723px #FFF , 565px 1631px #FFF , 1212px 2183px #FFF , 396px 2451px #FFF , 2057px 1196px #FFF , 896px 24px #FFF , 2388px 1186px #FFF , 473px 662px #FFF , 2102px 502px #FFF , 367px 274px #FFF , 1166px 247px #FFF , 932px 680px #FFF , 1829px 1330px #FFF , 831px 265px #FFF , 279px 1912px #FFF , 523px 955px #FFF , 112px 29px #FFF , 295px 360px #FFF , 2251px 1615px #FFF , 360px 363px #FFF , 1896px 2241px #FFF , 1371px 54px #FFF , 2352px 2034px #FFF , 2328px 407px #FFF , 284px 1113px #FFF , 507px 2321px #FFF , 2160px 1374px #FFF , 1754px 727px #FFF , 1146px 2392px #FFF , 1987px 849px #FFF , 2100px 1681px #FFF , 2186px 1321px #FFF , 2216px 1695px #FFF , 1445px 1483px #FFF , 2484px 539px #FFF , 1763px 1093px #FFF , 1043px 1248px #FFF , 435px 1409px #FFF , 1393px 2229px #FFF , 2299px 157px #FFF , 983px 2360px #FFF , 2248px 1141px #FFF , 473px 2390px #FFF , 2249px 978px #FFF , 964px 876px #FFF , 1516px 1936px #FFF , 1985px 2488px #FFF , 988px 835px #FFF , 50px 1191px #FFF , 1463px 294px #FFF , 276px 129px #FFF , 1205px 2318px #FFF , 824px 1444px #FFF , 788px 2266px #FFF , 279px 2206px #FFF , 523px 2076px #FFF , 152px 158px #FFF , 612px 97px #FFF , 611px 2429px #FFF , 502px 1873px #FFF , 837px 1855px #FFF , 590px 808px #FFF , 1490px 2325px #FFF , 1096px 520px #FFF , 241px 1841px #FFF , 1170px 2033px #FFF , 2024px 1229px #FFF , 234px 2170px #FFF , 2128px 915px #FFF , 1070px 840px #FFF , 2087px 235px #FFF , 389px 269px #FFF , 474px 1761px #FFF , 1454px 1311px #FFF , 959px 2428px #FFF , 1038px 1443px #FFF , 965px 1252px #FFF , 306px 722px #FFF , 2339px 476px #FFF , 573px 666px #FFF , 1579px 1620px #FFF , 2474px 1611px #FFF , 2275px 730px #FFF , 621px 325px #FFF , 1353px 439px #FFF , 1026px 2485px #FFF , 1639px 51px #FFF , 1989px 1123px #FFF , 925px 1992px #FFF , 987px 1633px #FFF , 1950px 1676px #FFF , 30px 1212px #FFF , 1306px 1214px #FFF , 905px 2438px #FFF , 1099px 2153px #FFF , 1988px 973px #FFF , 598px 178px #FFF , 1758px 2424px #FFF , 222px 1602px #FFF , 1117px 602px #FFF , 2257px 1928px #FFF , 2397px 2469px #FFF , 2330px 758px #FFF , 434px 1619px #FFF , 1852px 1420px #FFF , 1386px 1336px #FFF , 2189px 48px #FFF , 2319px 202px #FFF , 44px 763px #FFF , 75px 2119px #FFF , 2477px 688px #FFF , 2462px 1793px #FFF , 1299px 2252px #FFF , 1089px 561px #FFF , 1364px 2128px #FFF , 797px 730px #FFF , 29px 1081px #FFF , 225px 1531px #FFF , 807px 1940px #FFF , 1414px 1868px #FFF , 1714px 1161px #FFF , 435px 823px #FFF , 2317px 1820px #FFF , 2216px 969px #FFF , 821px 1843px #FFF , 1026px 440px #FFF , 887px 2308px #FFF , 2320px 1001px #FFF , 655px 1495px #FFF , 1702px 60px #FFF , 1727px 781px #FFF , 874px 1770px #FFF , 2352px 1861px #FFF , 976px 372px #FFF , 851px 422px #FFF , 692px 47px #FFF , 2200px 1883px #FFF , 675px 2259px #FFF , 1477px 9px #FFF , 1241px 800px #FFF , 1326px 540px #FFF , 2244px 2451px #FFF , 757px 239px #FFF , 2259px 2401px #FFF , 353px 484px #FFF , 2186px 364px #FFF , 1762px 2373px #FFF , 485px 1328px #FFF , 640px 279px #FFF , 34px 882px #FFF , 1896px 1046px #FFF , 730px 1087px #FFF , 2446px 2193px #FFF , 1510px 2065px #FFF , 728px 1103px #FFF , 967px 1801px #FFF , 2140px 1118px #FFF , 1694px 2044px #FFF , 422px 1239px #FFF , 2059px 1308px #FFF , 1256px 504px #FFF , 1416px 2140px #FFF , 2146px 1138px #FFF , 2174px 1357px #FFF , 2274px 1180px #FFF , 1042px 1104px #FFF , 2182px 2388px #FFF , 860px 592px #FFF , 1242px 1850px #FFF , 1989px 651px #FFF , 2441px 1437px #FFF , 2364px 837px #FFF , 326px 895px #FFF , 1909px 811px #FFF , 1074px 715px #FFF , 1059px 2428px #FFF , 288px 1031px #FFF , 2365px 1853px #FFF , 192px 419px #FFF , 2110px 724px #FFF , 722px 677px #FFF , 2151px 574px #FFF , 2288px 2355px #FFF , 1685px 131px #FFF , 2141px 931px #FFF , 1690px 2005px #FFF , 1008px 462px #FFF , 2240px 1222px #FFF , 1160px 2041px #FFF , 887px 351px #FFF , 903px 2022px #FFF , 822px 265px #FFF , 1080px 1315px #FFF , 282px 1892px #FFF , 487px 2235px #FFF , 1952px 2432px #FFF , 858px 15px #FFF , 797px 302px #FFF , 973px 191px #FFF , 2357px 1386px #FFF , 1367px 1818px #FFF , 2226px 1856px #FFF , 1909px 2243px #FFF , 1307px 1605px #FFF , 1991px 1939px #FFF , 2311px 379px #FFF , 287px 1800px #FFF , 937px 2384px #FFF , 231px 22px #FFF , 1128px 568px #FFF , 510px 79px #FFF , 2032px 1799px #FFF , 873px 1994px #FFF , 2494px 216px #FFF , 1296px 1851px #FFF , 1318px 1021px #FFF , 769px 1940px #FFF , 1509px 205px #FFF , 2285px 740px #FFF , 613px 1236px #FFF , 1247px 2234px #FFF , 1812px 2061px #FFF , 2387px 703px #FFF , 748px 336px #FFF , 999px 109px #FFF , 1150px 1806px #FFF , 1396px 1373px #FFF , 169px 230px #FFF , 45px 1289px #FFF , 1500px 1224px #FFF , 444px 1633px #FFF , 1047px 535px #FFF , 906px 1909px #FFF , 252px 393px #FFF , 1971px 1241px #FFF , 179px 2243px #FFF , 2371px 1037px #FFF , 1775px 1938px #FFF , 440px 2072px #FFF , 617px 1577px #FFF , 633px 844px #FFF , 2274px 1720px #FFF , 758px 424px #FFF , 1873px 2049px #FFF , 918px 986px #FFF , 445px 1276px #FFF , 2311px 713px #FFF , 2020px 2486px #FFF , 1181px 1390px #FFF , 815px 19px #FFF , 172px 1901px #FFF , 417px 1123px #FFF , 1634px 2242px #FFF , 565px 1112px #FFF , 1283px 2328px #FFF , 405px 578px #FFF , 1881px 1179px #FFF , 48px 1987px #FFF , 711px 2130px #FFF , 455px 1422px #FFF , 1132px 2118px #FFF , 268px 2266px #FFF , 2436px 49px #FFF , 1559px 2318px #FFF , 1424px 306px #FFF , 462px 974px #FFF , 2114px 1883px #FFF , 1184px 207px #FFF , 713px 860px #FFF , 738px 312px #FFF , 542px 1528px #FFF , 826px 1897px #FFF , 371px 127px #FFF , 1598px 1033px #FFF , 950px 2250px #FFF , 1639px 2243px #FFF , 647px 1057px #FFF , 1851px 594px #FFF , 1047px 2114px #FFF , 566px 166px #FFF , 408px 290px #FFF , 206px 2176px #FFF , 1972px 1650px #FFF , 951px 181px #FFF , 842px 326px #FFF , 1155px 298px #FFF , 2267px 1235px #FFF , 998px 1974px #FFF , 768px 1016px #FFF , 717px 1168px #FFF , 154px 2354px #FFF , 1039px 1560px #FFF , 580px 1308px #FFF , 1093px 2398px #FFF , 238px 85px #FFF , 1932px 29px #FFF , 524px 1813px #FFF , 2084px 1415px #FFF , 2263px 900px #FFF , 168px 2256px #FFF , 2333px 1221px #FFF , 1098px 1049px #FFF , 600px 2393px #FFF;
		}
		#stars2
		{
			width: 2px;
			height: 2px;
			margin-left: 25%;
			background: transparent;
			box-shadow: 1452px 1266px #FFF , 581px 1903px #FFF , 2118px 774px #FFF , 1373px 2235px #FFF , 102px 547px #FFF , 1571px 1744px #FFF , 2169px 1163px #FFF , 91px 2453px #FFF , 321px 672px #FFF , 1648px 984px #FFF , 156px 2154px #FFF , 295px 2490px #FFF , 89px 1647px #FFF , 1816px 481px #FFF , 280px 1670px #FFF , 2384px 751px #FFF , 427px 949px #FFF , 2084px 799px #FFF , 856px 1889px #FFF , 137px 576px #FFF , 1309px 1777px #FFF , 2280px 1124px #FFF , 622px 1517px #FFF , 2447px 1583px #FFF , 1436px 1392px #FFF , 1591px 2032px #FFF , 2455px 980px #FFF , 1718px 1361px #FFF , 1723px 159px #FFF , 2141px 1483px #FFF , 1390px 1464px #FFF , 139px 297px #FFF , 253px 1176px #FFF , 558px 2307px #FFF , 710px 1931px #FFF , 2289px 1143px #FFF , 2005px 1697px #FFF , 2338px 1859px #FFF , 1933px 833px #FFF , 1038px 35px #FFF , 416px 1477px #FFF , 1849px 639px #FFF , 1971px 2199px #FFF , 2387px 591px #FFF , 426px 1636px #FFF , 411px 617px #FFF , 2279px 2471px #FFF , 179px 721px #FFF , 1060px 2476px #FFF , 1602px 1568px #FFF , 1718px 310px #FFF , 2104px 897px #FFF , 951px 1881px #FFF , 1254px 815px #FFF , 1637px 119px #FFF , 326px 662px #FFF , 2065px 608px #FFF , 808px 837px #FFF , 1749px 1422px #FFF , 1963px 1736px #FFF , 1140px 1272px #FFF , 1451px 1371px #FFF , 752px 1689px #FFF , 660px 512px #FFF , 2086px 1519px #FFF , 1033px 1134px #FFF , 1120px 22px #FFF , 266px 1611px #FFF , 834px 597px #FFF , 49px 795px #FFF , 569px 1458px #FFF , 431px 1810px #FFF , 107px 268px #FFF , 1761px 1081px #FFF , 1286px 157px #FFF , 1734px 134px #FFF , 569px 960px #FFF , 1662px 534px #FFF , 1183px 1954px #FFF , 507px 628px #FFF , 1840px 1351px #FFF , 1509px 1585px #FFF , 1659px 269px #FFF , 1713px 1564px #FFF , 1425px 2380px #FFF , 1302px 143px #FFF , 776px 1188px #FFF , 97px 817px #FFF , 576px 2208px #FFF , 1883px 2277px #FFF , 968px 859px #FFF , 483px 2454px #FFF , 1208px 2412px #FFF , 415px 456px #FFF , 1029px 2312px #FFF , 1152px 1306px #FFF , 1627px 2486px #FFF , 484px 514px #FFF , 1750px 1075px #FFF , 2487px 677px #FFF , 2321px 327px #FFF , 1279px 373px #FFF , 2189px 93px #FFF , 1808px 1838px #FFF , 1615px 1708px #FFF , 2077px 472px #FFF , 810px 2156px #FFF , 1661px 2451px #FFF , 1598px 2235px #FFF , 1988px 2034px #FFF , 1943px 846px #FFF , 2470px 287px #FFF , 810px 894px #FFF , 1644px 120px #FFF , 1537px 2191px #FFF , 608px 965px #FFF , 452px 430px #FFF , 1353px 576px #FFF , 2328px 2026px #FFF , 893px 503px #FFF , 1045px 1840px #FFF , 2473px 375px #FFF , 2345px 1326px #FFF , 79px 289px #FFF , 1393px 494px #FFF , 2479px 490px #FFF , 1132px 1090px #FFF , 1958px 286px #FFF , 589px 553px #FFF , 898px 1914px #FFF , 1062px 2005px #FFF , 61px 1818px #FFF , 1219px 1727px #FFF , 1328px 1163px #FFF , 1638px 2236px #FFF , 1387px 5px #FFF , 2500px 739px #FFF , 1299px 2398px #FFF , 1081px 1444px #FFF , 1407px 655px #FFF , 658px 1788px #FFF , 529px 1898px #FFF , 1922px 2417px #FFF , 51px 2225px #FFF , 1260px 695px #FFF , 238px 362px #FFF , 224px 1988px #FFF , 404px 1283px #FFF , 1248px 1991px #FFF , 759px 1818px #FFF , 937px 1912px #FFF , 1808px 1260px #FFF , 1084px 2092px #FFF , 25px 2220px #FFF , 1427px 1697px #FFF , 829px 1170px #FFF , 1677px 1346px #FFF , 2419px 1062px #FFF , 1898px 553px #FFF , 204px 42px #FFF , 625px 2116px #FFF , 1870px 906px #FFF , 2486px 970px #FFF , 2407px 1145px #FFF , 2163px 382px #FFF , 1872px 960px #FFF , 2321px 2216px #FFF , 1420px 1509px #FFF , 2164px 1273px #FFF , 1090px 701px #FFF , 1667px 343px #FFF , 312px 1539px #FFF , 1213px 1431px #FFF , 955px 1412px #FFF , 1154px 962px #FFF , 1268px 522px #FFF , 739px 1000px #FFF , 852px 2169px #FFF , 543px 2194px #FFF , 1419px 1913px #FFF , 1273px 1061px #FFF , 1997px 1220px #FFF , 1824px 1666px #FFF , 528px 1598px #FFF , 1300px 978px #FFF , 734px 521px #FFF , 686px 1732px #FFF , 1856px 1079px #FFF , 1831px 1461px #FFF , 1590px 1704px #FFF , 1724px 1410px #FFF , 287px 1261px #FFF , 43px 1672px #FFF , 559px 435px #FFF , 334px 1922px #FFF , 1417px 2470px #FFF , 924px 1990px #FFF , 2164px 2252px #FFF , 2069px 313px #FFF , 1918px 900px #FFF;
			-webkit-animation: animStar 100s infinite linear;
			-moz-animation: animStar 100s infinite linear;
			animation: animStar 100s infinite linear;
		}
		#stars2:after
		{
			content: " ";
			position: absolute;
			top: 2000px;
			width: 2px;
			height: 2px;
			background: transparent;
			box-shadow: 1452px 1266px #FFF , 581px 1903px #FFF , 2118px 774px #FFF , 1373px 2235px #FFF , 102px 547px #FFF , 1571px 1744px #FFF , 2169px 1163px #FFF , 91px 2453px #FFF , 321px 672px #FFF , 1648px 984px #FFF , 156px 2154px #FFF , 295px 2490px #FFF , 89px 1647px #FFF , 1816px 481px #FFF , 280px 1670px #FFF , 2384px 751px #FFF , 427px 949px #FFF , 2084px 799px #FFF , 856px 1889px #FFF , 137px 576px #FFF , 1309px 1777px #FFF , 2280px 1124px #FFF , 622px 1517px #FFF , 2447px 1583px #FFF , 1436px 1392px #FFF , 1591px 2032px #FFF , 2455px 980px #FFF , 1718px 1361px #FFF , 1723px 159px #FFF , 2141px 1483px #FFF , 1390px 1464px #FFF , 139px 297px #FFF , 253px 1176px #FFF , 558px 2307px #FFF , 710px 1931px #FFF , 2289px 1143px #FFF , 2005px 1697px #FFF , 2338px 1859px #FFF , 1933px 833px #FFF , 1038px 35px #FFF , 416px 1477px #FFF , 1849px 639px #FFF , 1971px 2199px #FFF , 2387px 591px #FFF , 426px 1636px #FFF , 411px 617px #FFF , 2279px 2471px #FFF , 179px 721px #FFF , 1060px 2476px #FFF , 1602px 1568px #FFF , 1718px 310px #FFF , 2104px 897px #FFF , 951px 1881px #FFF , 1254px 815px #FFF , 1637px 119px #FFF , 326px 662px #FFF , 2065px 608px #FFF , 808px 837px #FFF , 1749px 1422px #FFF , 1963px 1736px #FFF , 1140px 1272px #FFF , 1451px 1371px #FFF , 752px 1689px #FFF , 660px 512px #FFF , 2086px 1519px #FFF , 1033px 1134px #FFF , 1120px 22px #FFF , 266px 1611px #FFF , 834px 597px #FFF , 49px 795px #FFF , 569px 1458px #FFF , 431px 1810px #FFF , 107px 268px #FFF , 1761px 1081px #FFF , 1286px 157px #FFF , 1734px 134px #FFF , 569px 960px #FFF , 1662px 534px #FFF , 1183px 1954px #FFF , 507px 628px #FFF , 1840px 1351px #FFF , 1509px 1585px #FFF , 1659px 269px #FFF , 1713px 1564px #FFF , 1425px 2380px #FFF , 1302px 143px #FFF , 776px 1188px #FFF , 97px 817px #FFF , 576px 2208px #FFF , 1883px 2277px #FFF , 968px 859px #FFF , 483px 2454px #FFF , 1208px 2412px #FFF , 415px 456px #FFF , 1029px 2312px #FFF , 1152px 1306px #FFF , 1627px 2486px #FFF , 484px 514px #FFF , 1750px 1075px #FFF , 2487px 677px #FFF , 2321px 327px #FFF , 1279px 373px #FFF , 2189px 93px #FFF , 1808px 1838px #FFF , 1615px 1708px #FFF , 2077px 472px #FFF , 810px 2156px #FFF , 1661px 2451px #FFF , 1598px 2235px #FFF , 1988px 2034px #FFF , 1943px 846px #FFF , 2470px 287px #FFF , 810px 894px #FFF , 1644px 120px #FFF , 1537px 2191px #FFF , 608px 965px #FFF , 452px 430px #FFF , 1353px 576px #FFF , 2328px 2026px #FFF , 893px 503px #FFF , 1045px 1840px #FFF , 2473px 375px #FFF , 2345px 1326px #FFF , 79px 289px #FFF , 1393px 494px #FFF , 2479px 490px #FFF , 1132px 1090px #FFF , 1958px 286px #FFF , 589px 553px #FFF , 898px 1914px #FFF , 1062px 2005px #FFF , 61px 1818px #FFF , 1219px 1727px #FFF , 1328px 1163px #FFF , 1638px 2236px #FFF , 1387px 5px #FFF , 2500px 739px #FFF , 1299px 2398px #FFF , 1081px 1444px #FFF , 1407px 655px #FFF , 658px 1788px #FFF , 529px 1898px #FFF , 1922px 2417px #FFF , 51px 2225px #FFF , 1260px 695px #FFF , 238px 362px #FFF , 224px 1988px #FFF , 404px 1283px #FFF , 1248px 1991px #FFF , 759px 1818px #FFF , 937px 1912px #FFF , 1808px 1260px #FFF , 1084px 2092px #FFF , 25px 2220px #FFF , 1427px 1697px #FFF , 829px 1170px #FFF , 1677px 1346px #FFF , 2419px 1062px #FFF , 1898px 553px #FFF , 204px 42px #FFF , 625px 2116px #FFF , 1870px 906px #FFF , 2486px 970px #FFF , 2407px 1145px #FFF , 2163px 382px #FFF , 1872px 960px #FFF , 2321px 2216px #FFF , 1420px 1509px #FFF , 2164px 1273px #FFF , 1090px 701px #FFF , 1667px 343px #FFF , 312px 1539px #FFF , 1213px 1431px #FFF , 955px 1412px #FFF , 1154px 962px #FFF , 1268px 522px #FFF , 739px 1000px #FFF , 852px 2169px #FFF , 543px 2194px #FFF , 1419px 1913px #FFF , 1273px 1061px #FFF , 1997px 1220px #FFF , 1824px 1666px #FFF , 528px 1598px #FFF , 1300px 978px #FFF , 734px 521px #FFF , 686px 1732px #FFF , 1856px 1079px #FFF , 1831px 1461px #FFF , 1590px 1704px #FFF , 1724px 1410px #FFF , 287px 1261px #FFF , 43px 1672px #FFF , 559px 435px #FFF , 334px 1922px #FFF , 1417px 2470px #FFF , 924px 1990px #FFF , 2164px 2252px #FFF , 2069px 313px #FFF , 1918px 900px #FFF;
		}
		#stars3
		{
			width: 3px;
			height: 3px;
			margin-left: 25%;
			background: transparent;
			box-shadow: 1808px 569px #FFF , 1449px 334px #FFF , 547px 2486px #FFF , 2035px 167px #FFF , 2353px 269px #FFF , 480px 2248px #FFF , 539px 2275px #FFF , 2143px 1838px #FFF , 828px 1103px #FFF , 661px 723px #FFF , 204px 1044px #FFF , 908px 1418px #FFF , 2380px 1939px #FFF , 2267px 1433px #FFF , 405px 1759px #FFF , 1586px 1731px #FFF , 419px 2168px #FFF , 239px 1253px #FFF , 1728px 846px #FFF , 2341px 258px #FFF , 605px 1891px #FFF , 248px 1403px #FFF , 1269px 1125px #FFF , 2180px 2361px #FFF , 1309px 832px #FFF , 2084px 647px #FFF , 848px 636px #FFF , 2104px 17px #FFF , 603px 1381px #FFF , 1925px 151px #FFF , 639px 263px #FFF , 298px 1632px #FFF , 360px 91px #FFF , 969px 397px #FFF , 1671px 1768px #FFF , 694px 895px #FFF , 374px 1277px #FFF , 2060px 1648px #FFF , 22px 1172px #FFF , 2116px 2494px #FFF , 400px 1348px #FFF , 200px 264px #FFF , 726px 1317px #FFF , 702px 23px #FFF , 135px 798px #FFF , 1183px 450px #FFF , 2403px 844px #FFF , 352px 933px #FFF , 1279px 549px #FFF , 2424px 1443px #FFF , 1077px 1889px #FFF , 2350px 2373px #FFF , 216px 2120px #FFF , 1243px 591px #FFF , 1770px 1498px #FFF , 1186px 1636px #FFF , 1755px 1113px #FFF , 827px 661px #FFF , 1631px 1039px #FFF , 1259px 457px #FFF , 872px 1775px #FFF , 1932px 1730px #FFF , 488px 578px #FFF , 2141px 120px #FFF , 935px 4px #FFF , 2015px 1909px #FFF , 299px 1746px #FFF , 1334px 1872px #FFF , 1529px 97px #FFF , 1088px 106px #FFF , 1390px 2225px #FFF , 2079px 218px #FFF , 2463px 1px #FFF , 2347px 1058px #FFF , 2162px 1101px #FFF , 2474px 1423px #FFF , 1938px 872px #FFF , 1113px 1112px #FFF , 232px 892px #FFF , 183px 84px #FFF , 1926px 1419px #FFF , 1028px 1335px #FFF , 1520px 2337px #FFF , 1423px 1918px #FFF , 847px 2359px #FFF , 517px 405px #FFF , 809px 222px #FFF , 1073px 2381px #FFF , 213px 1140px #FFF , 58px 1190px #FFF , 1620px 696px #FFF , 43px 451px #FFF , 572px 1384px #FFF , 1319px 1480px #FFF , 1919px 1282px #FFF , 2238px 51px #FFF , 1732px 2046px #FFF , 1196px 2320px #FFF , 2438px 1948px #FFF , 2240px 1179px #FFF;
			-webkit-animation: animStar 150s infinite linear;
			-moz-animation: animStar 150s infinite linear;
			animation: animStar 150s infinite linear;
		}
		#stars3:after
		{
			content: " ";
			position: absolute;
			top: 2000px;
			width: 3px;
			height: 3px;
			background: transparent;
			box-shadow: 1808px 569px #FFF , 1449px 334px #FFF , 547px 2486px #FFF , 2035px 167px #FFF , 2353px 269px #FFF , 480px 2248px #FFF , 539px 2275px #FFF , 2143px 1838px #FFF , 828px 1103px #FFF , 661px 723px #FFF , 204px 1044px #FFF , 908px 1418px #FFF , 2380px 1939px #FFF , 2267px 1433px #FFF , 405px 1759px #FFF , 1586px 1731px #FFF , 419px 2168px #FFF , 239px 1253px #FFF , 1728px 846px #FFF , 2341px 258px #FFF , 605px 1891px #FFF , 248px 1403px #FFF , 1269px 1125px #FFF , 2180px 2361px #FFF , 1309px 832px #FFF , 2084px 647px #FFF , 848px 636px #FFF , 2104px 17px #FFF , 603px 1381px #FFF , 1925px 151px #FFF , 639px 263px #FFF , 298px 1632px #FFF , 360px 91px #FFF , 969px 397px #FFF , 1671px 1768px #FFF , 694px 895px #FFF , 374px 1277px #FFF , 2060px 1648px #FFF , 22px 1172px #FFF , 2116px 2494px #FFF , 400px 1348px #FFF , 200px 264px #FFF , 726px 1317px #FFF , 702px 23px #FFF , 135px 798px #FFF , 1183px 450px #FFF , 2403px 844px #FFF , 352px 933px #FFF , 1279px 549px #FFF , 2424px 1443px #FFF , 1077px 1889px #FFF , 2350px 2373px #FFF , 216px 2120px #FFF , 1243px 591px #FFF , 1770px 1498px #FFF , 1186px 1636px #FFF , 1755px 1113px #FFF , 827px 661px #FFF , 1631px 1039px #FFF , 1259px 457px #FFF , 872px 1775px #FFF , 1932px 1730px #FFF , 488px 578px #FFF , 2141px 120px #FFF , 935px 4px #FFF , 2015px 1909px #FFF , 299px 1746px #FFF , 1334px 1872px #FFF , 1529px 97px #FFF , 1088px 106px #FFF , 1390px 2225px #FFF , 2079px 218px #FFF , 2463px 1px #FFF , 2347px 1058px #FFF , 2162px 1101px #FFF , 2474px 1423px #FFF , 1938px 872px #FFF , 1113px 1112px #FFF , 232px 892px #FFF , 183px 84px #FFF , 1926px 1419px #FFF , 1028px 1335px #FFF , 1520px 2337px #FFF , 1423px 1918px #FFF , 847px 2359px #FFF , 517px 405px #FFF , 809px 222px #FFF , 1073px 2381px #FFF , 213px 1140px #FFF , 58px 1190px #FFF , 1620px 696px #FFF , 43px 451px #FFF , 572px 1384px #FFF , 1319px 1480px #FFF , 1919px 1282px #FFF , 2238px 51px #FFF , 1732px 2046px #FFF , 1196px 2320px #FFF , 2438px 1948px #FFF , 2240px 1179px #FFF;
		}
		@-webkit-keyframes animStar
		{
			from
			{
				-webkit-transform: translateY(0px);
			}
			to
			{
				-webkit-transform: translateY(-2000px);
			}
		}
		@-moz-keyframes animStar
		{
			from
			{
				-moz-transform: translateY(0px);
			}
			to
			{
				-moz-transform: translateY(-2000px);
			}
		}
		@keyframes animStar
		{
			from
			{
				-webkit-transform: translateY(0px);
				-moz-transform: translateY(0px);
				-ms-transform: translateY(0px);
				-o-transform: translateY(0px);
				transform: translateY(0px);
			}
			to
			{
				-webkit-transform: translateY(-2000px);
				-moz-transform: translateY(-2000px);
				-ms-transform: translateY(-2000px);
				-o-transform: translateY(-2000px);
				transform: translateY(-2000px);
			}
		}
		.text-logo-settings-coming-soon-booster
		{
			color: <?php echo esc_attr( $meta_data_array['font_color_layout'] ); ?> !important;
			font-size: <?php echo $meta_data_array['font_style_layout'];// WPCS: XSS ok. ?> !important;
		}
		.custom-logo-img-size-coming-soon-booster
		{
			max-width: <?php echo intval( $meta_data_array['max_width'] ) . 'px'; ?> !important;
			max-height: <?php echo intval( $meta_data_array['max_height'] ) . 'px'; ?> !important;
		}
		.logo-overlay-style-coming-soon-booster
		{
			position: absolute;
			margin:
			<?php
			echo 'auto' !== $logo_margin[0] ? intval( $logo_margin[0] ) . 'px ' : 'auto ';
			echo 'auto' !== $logo_margin[1] ? intval( $logo_margin[1] ) . 'px ' : 'auto ';
			echo 'auto' !== $logo_margin[2] ? intval( $logo_margin[2] ) . 'px ' : 'auto ';
			echo 'auto' !== $logo_margin[3] ? intval( $logo_margin[3] ) . 'px ' : 'auto ';
			?>
			!important;
			padding: <?php echo intval( $logo_padding[0] ) . 'px ' . intval( $logo_padding[1] ) . 'px ' . intval( $logo_padding[2] ) . 'px ' . intval( $logo_padding[3] ) . 'px '; ?> !important;
		}
		#left-side
		{
			position: fixed;
			left: 0;
			top: 0;
			width: 50%;
			height: 100%;
			opacity: 0;
			-webkit-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-moz-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			/*-ms-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);*/
			-o-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			/*transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);*/
		}
		#left-side .content
		{
			position: absolute;
			z-index: 0;
			left: 0;
			padding: 0;
			top: 50vh;
			width: 100%;
			padding: 0 10%;
			-webkit-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-moz-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-ms-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-o-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-webkit-transform: translateY(-50%);
			-moz-transform: translateY(-50%);
			-ms-transform: translateY(-50%);
			-o-transform: translateY(-50%);
			transform: translateY(-50%);
			text-align: left;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			opacity: 1;
			visibility: visible;
		}
		#right-side
		{
			position: relative;
			-webkit-transform: translate3d(100%, 0, 0);
			-moz-transform: translate3d(100%, 0, 0);
			-o-transform: translate3d(100%, 0, 0);
			-ms-transform: translate3d(100%, 0, 0);
			transform: translate3d(100%, 0, 0);
			top: 0;
			width: 50%;
			z-index: 1;
			-webkit-transition: all 0.5s cubic-bezier(0.7, 0, 0.3, 1);
			-moz-transition: all 0.5s cubic-bezier(0.7, 0, 0.3, 1);
			-ms-transition: all 0.5s cubic-bezier(0.7, 0, 0.3, 1);
			-o-transition: all 0.5s cubic-bezier(0.7, 0, 0.3, 1);
			transition: all 0.5s cubic-bezier(0.7, 0, 0.3, 1);
		}
		#right-side.hide-right
		{
			-webkit-transform: translate3d(200%, 0, 0);
			-moz-transform: translate3d(200%, 0, 0);
			-o-transform: translate3d(200%, 0, 0);
			-ms-transform: translate3d(200%, 0, 0);
			transform: translate3d(200%, 0, 0);
		}
		#right-side .content
		{
			width: 100%;
			padding: 8% 10% 0;
			text-align: left;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			opacity: 1;
			visibility: visible;
		}
		#close-more-info
		{
			position: fixed;
			top: 15px;
			right: 15px;
			background: transparent;
			border: none;
			font-size: 2em;
			z-index: 2;
		}
		#close-more-info:hover
		{
			-webkit-transform: scale(1.2);
			-moz-transform: scale(1.2);
			-ms-transform: scale(1.2);
			-o-transform: scale(1.2);
			transform: scale(1.2);
		}
		#close-more-info.hide-close
		{
			right: -50px;
		}
		.mCSB_scrollTools
		{
			position: absolute;
			width: 5px;
			height: auto;
			left: auto;
			top: 0;
			right: -5px;
			bottom: 0;
			z-index: 1;
			-webkit-transition: all 0.5s cubic-bezier(0.7, 0, 0.3, 1);
			-moz-transition: all 0.5s cubic-bezier(0.7, 0, 0.3, 1);
			-ms-transition: all 0.5s cubic-bezier(0.7, 0, 0.3, 1);
			-o-transition: all 0.5s cubic-bezier(0.7, 0, 0.3, 1);
			transition: all 0.5s cubic-bezier(0.7, 0, 0.3, 1);
		}
		.mCSB_scrollTools .mCSB_draggerRail
		{
			width: 5px;
			height: 100%;
			margin: 0;
			-webkit-border-radius: 0;
			-moz-border-radius: 0;
			-ms-border-radius: 0;
			border-radius: 0;
			background-color: #757a86 !important;
			filter: "alpha(opacity=40)";
			-ms-filter: "alpha(opacity=40)";
		}
		.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			position: relative;
			width: 5px;
			height: 100%;
			margin: 0 auto;
			-webkit-border-radius: 0;
			-moz-border-radius: 0;
			-ms-border-radius: 0;
			border-radius: 0;
			text-align: center;
		}
		.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			background-color: <?php echo esc_attr( $meta_unserialized_data['contact_background_scrollbar_color'] ); ?> !important;
		}
		.mCSB_scrollTools-left
		{
			right: 50% !important;
		}
		.dialog,
		.dialog__overlay
		{
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
		}
		.dialog
		{
			position: fixed;
			z-index: 999;
			display: -webkit-box;
			display: -moz-box;
			display: box;
			display: -webkit-flex;
			display: -moz-flex;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-pack: center;
			-moz-box-pack: center;
			box-pack: center;
			-webkit-justify-content: center;
			-moz-justify-content: center;
			-ms-justify-content: center;
			-o-justify-content: center;
			justify-content: center;
			-ms-flex-pack: center;
			-webkit-box-align: center;
			-moz-box-align: center;
			box-align: center;
			-webkit-align-items: center;
			-moz-align-items: center;
			-ms-align-items: center;
			-o-align-items: center;
			align-items: center;
			-ms-flex-align: center;
			pointer-events: none;
		}
		.dialog__overlay
		{
			position: absolute;
			z-index: 1;
			background: rgba(31, 34, 46, 0.9);
			opacity: 0;
			transition: opacity 0.3s;
		}
		.dialog--open .dialog__overlay
		{
			opacity: 1;
			pointer-events: auto;
		}
		.dialog__content
		{
			width: 50%;
			max-width: 500px;
			min-width: 290px;
			background: transparent;
			padding: 0;
			text-align: center;
			position: relative;
			z-index: 5;
			opacity: 0;
			overflow: hidden;
			background-size: cover;
			border: <?php echo esc_attr( $meta_unserialized_data['background_font_size_subscription'] ); ?> solid <?php echo esc_attr( $meta_unserialized_data['background_border_color_subscription'] ); ?>;
		}
		.dialog__content::before
		{
			content: " ";
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: -1;
			background: <?php echo esc_attr( $meta_unserialized_data['background_color_subscription'] ); ?> !important;
			opacity: <?php echo intval( $meta_unserialized_data['background_color_opacity_subscription'] ) / 100; ?> !important;
		}
		.dialog--open .dialog__content
		{
			pointer-events: auto;
		}
		.dialog .close-newsletter
		{
			position: absolute;
			top: 0;
			right: 0;
			border: none;
			background: transparent;
			width: 40px;
			height: 40px;
			line-height: 35px;
			font-size: 20px;
			opacity: 1;
		}
		.dialog .close-newsletter:hover
		{
			opacity: 1;
		}
		.dialog .dialog-inner
		{
			padding: 60px 30px;
			overflow: hidden;
		}
		.dialog .dialog-inner::before
		{
			content: " ";
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: -1;
		}
		.subscription-heading-coming-soon-booster *
		{
			line-height: 1.3em !important;
			font-size: <?php echo $heading_setting_font_style[0];// WPCS: XSS ok. ?> !important;
			color: <?php echo esc_attr( $heading_setting_font_style[1] ); ?> !important;
			margin:
			<?php
			echo 'auto' !== $heading_setting_margin[0] ? intval( $heading_setting_margin[0] ) . 'px ' : 'auto ';
			echo 'auto' !== $heading_setting_margin[1] ? intval( $heading_setting_margin[1] ) . 'px ' : 'auto ';
			echo 'auto' !== $heading_setting_margin[2] ? intval( $heading_setting_margin[2] ) . 'px ' : 'auto ';
			echo 'auto' !== $heading_setting_margin[3] ? intval( $heading_setting_margin[3] ) . 'px ' : 'auto ';
			?>
			!important;
			padding: <?php echo intval( $heading_setting_padding[0] ) . 'px ' . intval( $heading_setting_padding[1] ) . 'px ' . intval( $heading_setting_padding[2] ) . 'px ' . intval( $heading_setting_padding[3] ) . 'px '; ?> !important;
		}
		.subscription-description-coming-soon-booster *
		{
			line-height: 1.6em !important;
			font-size: <?php echo $description_setting_font_style[0];// WPCS: XSS ok. ?> !important;
			color: <?php echo esc_attr( $description_setting_font_style[1] ); ?> !important;
			margin:
			<?php
			echo 'auto' !== $description_setting_margin[0] ? intval( $description_setting_margin[0] ) . 'px ' : 'auto ';
			echo 'auto' !== $description_setting_margin[1] ? intval( $description_setting_margin[1] ) . 'px ' : 'auto ';
			echo 'auto' !== $description_setting_margin[2] ? intval( $description_setting_margin[2] ) . 'px ' : 'auto ';
			echo 'auto' !== $description_setting_margin[3] ? intval( $description_setting_margin[3] ) . 'px ' : 'auto ';
			?>
			!important;
			padding:	<?php echo intval( $description_setting_padding[0] ) . 'px ' . intval( $description_setting_padding[1] ) . 'px ' . intval( $description_setting_padding[2] ) . 'px ' . intval( $description_setting_padding[3] ) . 'px '; ?> !important;
		}
		.subscription-label-coming-soon-booster
		{
			line-height: 1.6em !important;
			font-size: <?php echo $textbox_font[0];// WPCS: XSS ok. ?> !important;
			color: <?php echo esc_attr( $description_setting_font_style[1] ); ?>;
		}
		#subscribe #ux_frm_coming_soon_mode_subscription
		{
			max-width: 450px;
			margin: auto;
		}
		#subscribe #ux_frm_coming_soon_mode_subscription .form-group .form-control
		{
			text-align: <?php echo esc_attr( $meta_unserialized_data['textbox_placeholder_alignment_subscription'] ); ?> !important;
			background: <?php echo esc_attr( $meta_unserialized_data['textbox_color_subscription'] ); ?> !important;
			border: none;
			-webkit-border-radius: 0;
			-moz-border-radius: 0;
			-ms-border-radius: 0;
			border-radius: 0;
			box-shadow: none;
			height: 50px;
			outline: medium none;
			margin:
			<?php
			echo 'auto' !== $texbox_margin[0] ? intval( $texbox_margin[0] ) . 'px ' : 'auto ';
			echo 'auto' !== $texbox_margin[1] ? intval( $texbox_margin[1] ) . 'px ' : 'auto ';
			echo 'auto' !== $texbox_margin[2] ? intval( $texbox_margin[2] ) . 'px ' : 'auto ';
			echo 'auto' !== $texbox_margin[3] ? intval( $texbox_margin[3] ) . 'px ' : 'auto ';
			?>
			!important;
			padding: <?php echo intval( $textbox_padding[0] ) . 'px ' . intval( $textbox_padding[1] ) . 'px ' . intval( $textbox_padding[2] ) . 'px ' . intval( $textbox_padding[3] ) . 'px '; ?> !important;
			width: 100%;
			font-size: <?php echo $textbox_font[0];// WPCS: XSS ok. ?> !important;
			-webkit-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-moz-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-ms-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-o-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
		}
		#subscribe #ux_frm_coming_soon_mode_subscription .form-group .form-control:hover, #subscribe #ux_frm_coming_soon_mode_subscription .form-group .form-control:focus
		{
			box-shadow: none;
		}
		#subscribe #ux_frm_coming_soon_mode_subscription .form-group .form-control::-webkit-input-placeholder
		{
			color: <?php echo esc_attr( $textbox_font[1] ); ?> !important;
		}
		#subscribe #ux_frm_coming_soon_mode_subscription .form-group .form-control::-moz-placeholder
		{
			color: <?php echo esc_attr( $textbox_font[1] ); ?> !important;
		}
		#subscribe #ux_frm_coming_soon_mode_subscription .form-group .form-control:-moz-placeholder
		{
			color: <?php echo esc_attr( $textbox_font[1] ); ?> !important;
		}
		#subscribe #ux_frm_coming_soon_mode_subscription .form-group .form-control:-ms-input-placeholder
		{
			color: <?php echo esc_attr( $textbox_font[1] ); ?> !important;
		}
		#subscribe #ux_frm_coming_soon_mode_subscription .form-group button.submit
		{
			text-align: <?php echo esc_attr( $meta_unserialized_data['label_alignment_button_subscription'] ); ?> !important;
			border: 2px solid <?php echo esc_attr( $meta_unserialized_data['border_color_subscription'] ); ?> !important;
			-webkit-border-radius: 0;
			-moz-border-radius: 0;
			-ms-border-radius: 0;
			border-radius: 0;
			background: <?php echo esc_attr( $meta_unserialized_data['button_color_subscription'] ); ?> !important;
			color: <?php echo esc_attr( $font_style_button_subscription[1] ); ?> !important;
			height: 50px;
			padding:	<?php echo intval( $padding_button_subscription[0] ) . 'px ' . intval( $padding_button_subscription[1] ) . 'px ' . intval( $padding_button_subscription[2] ) . 'px ' . intval( $padding_button_subscription[3] ) . 'px '; ?> !important;
			font-size: <?php echo $font_style_button_subscription[0];// WPCS: XSS ok. ?> !important;
			letter-spacing: 1px;
			line-height: 1;
			width: 70%;
			margin:	<?php echo intval( $margin_button_subscription[0] ) . 'px ' . intval( $margin_button_subscription[1] ) . 'px ' . intval( $margin_button_subscription[2] ) . 'px ' . intval( $margin_button_subscription[3] ) . 'px '; ?>	!important;
			-webkit-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-moz-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-ms-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-o-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
		}
		#subscribe #ux_frm_coming_soon_mode_subscription .form-group button.submit:hover
		{
			background: <?php echo esc_attr( $meta_unserialized_data['hover_color_button_subscription'] ); ?> !important;
			color: <?php echo esc_attr( $meta_unserialized_data['text_hover_color_button_subscription'] ); ?> !important;
			border-color: <?php echo esc_attr( $meta_unserialized_data['border_hover_color_subscription'] ); ?> !important;
		}
		#subscribe .block-message
		{
			min-height: 30px;
			position: absolute;
			bottom: -100px;
			width: 100%;
			left: 0;
			padding: 15px;
			background: transparent;
			-webkit-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-moz-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-ms-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-o-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
		}
		#subscribe .block-message.show-block-error
		{
			bottom: 0;
		}
		#subscribe .block-message.show-block-valid
		{
			bottom: 0;
		}
		.subscription-success-coming-soon-booster *
		{
			color: <?php echo esc_attr( $success_settings_font[1] ); ?>;
			font-size: <?php echo $success_settings_font[0];// WPCS: XSS ok. ?>;
			letter-spacing: 0;
			margin:
			<?php
			echo 'auto' !== $success_settings_margin[0] ? intval( $success_settings_margin[0] ) . 'px ' : 'auto ';
			echo 'auto' !== $success_settings_margin[1] ? intval( $success_settings_margin[1] ) . 'px ' : 'auto ';
			echo 'auto' !== $success_settings_margin[2] ? intval( $success_settings_margin[2] ) . 'px ' : 'auto ';
			echo 'auto' !== $success_settings_margin[3] ? intval( $success_settings_margin[3] ) . 'px ' : 'auto ';
			?>
			!important;
			padding: <?php echo intval( $success_settings_padding[0] ) . 'px ' . intval( $success_settings_padding[1] ) . 'px ' . intval( $success_settings_padding[2] ) . 'px ' . intval( $success_settings_padding[3] ) . 'px '; ?>;
		}
		.subscription-error-coming-soon-booster *
		{
			color: <?php echo esc_attr( $error_settings_font[1] ); ?>;
			font-size: <?php echo $error_settings_font[0];// WPCS: XSS ok. ?>;
			letter-spacing: 0;
			margin:
			<?php
			echo 'auto' !== $error_settings_margin[0] ? intval( $error_settings_margin[0] ) . 'px ' : 'auto ';
			echo 'auto' !== $error_settings_margin[1] ? intval( $error_settings_margin[1] ) . 'px ' : 'auto ';
			echo 'auto' !== $error_settings_margin[2] ? intval( $error_settings_margin[2] ) . 'px ' : 'auto ';
			echo 'auto' !== $error_settings_margin[3] ? intval( $error_settings_margin[3] ) . 'px ' : 'auto ';
			?>
			!important;
			padding: <?php echo esc_attr( $error_settings_padding[0] ) . 'px ' . esc_attr( $error_settings_padding[1] ) . 'px ' . esc_attr( $error_settings_padding[2] ) . 'px ' . esc_attr( $error_settings_padding[3] ) . 'px '; ?>;
		}
		.dialog__overlay
		{
			-webkit-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-moz-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-ms-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-o-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
		}
		.dialog.dialog--open .dialog__content,
		.dialog.dialog--close .dialog__content
		{
			-webkit-animation-duration: 0.4s;
			-moz-animation-duration: 0.4s;
			animation-duration: 0.4s;
			-webkit-animation-fill-mode: forwards;
			-moz-animation-fill-mode: forwards;
			animation-fill-mode: forwards;
		}
		.dialog.dialog--open .dialog__content
		{
			-webkit-animation-name: anim-open;
			-moz-animation-name: anim-open;
			animation-name: anim-open;
			margin: 0px 10px !important;
		}
		.dialog.dialog--close .dialog__content
		{
			-webkit-animation-name: anim-close;
			-moz-animation-name: anim-close;
			animation-name: anim-close;
		}
		@-webkit-keyframes anim-open
		{
			0% {
				opacity: 0;
				-webkit-transform: translate3d(0, 50px, 0);
				-moz-transform: translate3d(0, 50px, 0);
				-o-transform: translate3d(0, 50px, 0);
				-ms-transform: translate3d(0, 50px, 0);
				transform: translate3d(0, 50px, 0);
			}
			100%
			{
				opacity: 1;
				-webkit-transform: translate3d(0, 0, 0);
				-moz-transform: translate3d(0, 0, 0);
				-o-transform: translate3d(0, 0, 0);
				-ms-transform: translate3d(0, 0, 0);
				transform: translate3d(0, 0, 0);
			}
		}
		@-moz-keyframes anim-open
		{
			0%
			{
				opacity: 0;
				-webkit-transform: translate3d(0, 50px, 0);
				-moz-transform: translate3d(0, 50px, 0);
				-o-transform: translate3d(0, 50px, 0);
				-ms-transform: translate3d(0, 50px, 0);
				transform: translate3d(0, 50px, 0);
			}
			100%
			{
				opacity: 1;
				-webkit-transform: translate3d(0, 0, 0);
				-moz-transform: translate3d(0, 0, 0);
				-o-transform: translate3d(0, 0, 0);
				-ms-transform: translate3d(0, 0, 0);
				transform: translate3d(0, 0, 0);
			}
		}
		@keyframes anim-open
		{
			0%
			{
				opacity: 0;
				-webkit-transform: translate3d(0, 50px, 0);
				-moz-transform: translate3d(0, 50px, 0);
				-o-transform: translate3d(0, 50px, 0);
				-ms-transform: translate3d(0, 50px, 0);
				transform: translate3d(0, 50px, 0);
			}
			100%
			{
				opacity: 1;
				-webkit-transform: translate3d(0, 0, 0);
				-moz-transform: translate3d(0, 0, 0);
				-o-transform: translate3d(0, 0, 0);
				-ms-transform: translate3d(0, 0, 0);
				transform: translate3d(0, 0, 0);
			}
		}
		@-webkit-keyframes anim-close
		{
			0%
			{
				opacity: 1;
				-webkit-transform: translate3d(0, 0, 0);
				-moz-transform: translate3d(0, 0, 0);
				-o-transform: translate3d(0, 0, 0);
				-ms-transform: translate3d(0, 0, 0);
				transform: translate3d(0, 0, 0);
			}
			100%
			{
				opacity: 0;
				-webkit-transform: translate3d(0, 50px, 0);
				-moz-transform: translate3d(0, 50px, 0);
				-o-transform: translate3d(0, 50px, 0);
				-ms-transform: translate3d(0, 50px, 0);
				transform: translate3d(0, 50px, 0);
			}
		}
		@-moz-keyframes anim-close
		{
			0%
			{
				opacity: 1;
				-webkit-transform: translate3d(0, 0, 0);
				-moz-transform: translate3d(0, 0, 0);
				-o-transform: translate3d(0, 0, 0);
				-ms-transform: translate3d(0, 0, 0);
				transform: translate3d(0, 0, 0);
			}
			100%
			{
				opacity: 0;
				-webkit-transform: translate3d(0, 50px, 0);
				-moz-transform: translate3d(0, 50px, 0);
				-o-transform: translate3d(0, 50px, 0);
				-ms-transform: translate3d(0, 50px, 0);
				transform: translate3d(0, 50px, 0);
			}
		}
		@keyframes anim-close
		{
			0%
			{
				opacity: 1;
				-webkit-transform: translate3d(0, 0, 0);
				-moz-transform: translate3d(0, 0, 0);
				-o-transform: translate3d(0, 0, 0);
				-ms-transform: translate3d(0, 0, 0);
				transform: translate3d(0, 0, 0);
			}
			100%
			{
				opacity: 0;
				-webkit-transform: translate3d(0, 50px, 0);
				-moz-transform: translate3d(0, 50px, 0);
				-o-transform: translate3d(0, 50px, 0);
				-ms-transform: translate3d(0, 50px, 0);
				transform: translate3d(0, 50px, 0);
			}
		}
		.icon-custom-close
		{
			color: <?php echo esc_attr( $meta_unserialized_data['contact_cross_icon_color'] ); ?>;
		}
		.subscription-cross-icon
		{
			color: <?php echo esc_attr( $meta_unserialized_data['background_cross_icon_color_subscription'] ); ?> !important;
		}
		#contact-form
		{
			margin-top: 40px;
		}
		#contact-form .form-control
		{
			color: <?php echo esc_attr( $contact_textbox_font[1] ); ?> !important;
			background: <?php echo esc_attr( $meta_unserialized_data['textbox_color_contact_form'] ); ?> !important;
			border: 1px solid rgba(0, 0, 0, 0.1);
			-webkit-border-radius: 0;
			-moz-border-radius: 0;
			-ms-border-radius: 0;
			box-shadow: none;
			outline: medium none;
			height: 40px;
			width: 100%;
			font-size: <?php echo $contact_textbox_font[0];// WPCS: XSS ok. ?> !important;
			-webkit-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-moz-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-ms-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-o-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			text-align: <?php echo esc_attr( $meta_unserialized_data['placeholder_alignment_textbox_contact_form'] ); ?> !important;
			margin:
			<?php
			echo 'auto' !== $contact_textbox_margin[0] ? intval( $contact_textbox_margin[0] ) . 'px ' : 'auto ';
			echo 'auto' !== $contact_textbox_margin[1] ? intval( $contact_textbox_margin[1] ) . 'px ' : 'auto ';
			echo 'auto' !== $contact_textbox_margin[2] ? intval( $contact_textbox_margin[2] ) . 'px ' : 'auto ';
			echo 'auto' !== $contact_textbox_margin[3] ? intval( $contact_textbox_margin[3] ) . 'px ' : 'auto ';
			?>
			!important;
			padding: <?php echo intval( $contact_textbox_padding[0] ) . 'px ' . intval( $contact_textbox_padding[1] ) . 'px ' . intval( $contact_textbox_padding[2] ) . 'px ' . intval( $contact_textbox_padding[3] ) . 'px '; ?> !important;
		}
		#contact-form .form-control:hover, #contact-form .form-control:focus
		{
			box-shadow: none;
		}
		#contact-form .form-control::-webkit-input-placeholder
		{
			color: <?php echo esc_attr( $contact_textbox_font[1] ); ?> !important;
		}
		#contact-form .form-control::-moz-placeholder
		{
			color: <?php echo esc_attr( $contact_textbox_font[1] ); ?> !important;
		}
		#contact-form .form-control:-moz-placeholder
		{
			color: <?php echo esc_attr( $contact_textbox_font[1] ); ?> !important;
		}
		#contact-form .form-control:-ms-input-placeholder
		{
			color: <?php echo esc_attr( $contact_textbox_font[1] ); ?> !important;
		}
		#contact-form textarea.form-control
		{
			min-height: 150px;
		}
		label.error
		{
			color: #a94442;
			font-size: 13px;
		}
		#contact-form button#valid-form
		{
			font-size: <?php echo $button_label_font[0];// WPCS: XSS ok. ?> !important;
			display: block;
			margin:
			<?php
			echo 'auto' !== $contact_button_margin[0] ? intval( $contact_button_margin[0] ) . 'px ' : 'auto ';
			echo 'auto' !== $contact_button_margin[1] ? intval( $contact_button_margin[1] ) . 'px ' : 'auto ';
			echo 'auto' !== $contact_button_margin[2] ? intval( $contact_button_margin[2] ) . 'px ' : 'auto ';
			echo 'auto' !== $contact_button_margin[3] ? intval( $contact_button_margin[3] ) . 'px ' : 'auto ';
			?>
			!important;
			padding: <?php echo intval( $contact_button_padding[0] ) . 'px ' . intval( $contact_button_padding[1] ) . 'px ' . intval( $contact_button_padding[2] ) . 'px ' . intval( $contact_button_padding[3] ) . 'px '; ?> !important;
			background: <?php echo esc_attr( $meta_unserialized_data['button_color_contact_form'] ); ?> !important;
			border: 2px solid <?php echo esc_attr( $meta_unserialized_data['border_color_contact_form'] ); ?> !important;
			color: <?php echo esc_attr( $button_label_font[1] ); ?> !important;
			-webkit-border-radius: 0;
			-moz-border-radius: 0;
			-ms-border-radius: 0;
			border-radius: 0;
			width: 100%;
			line-height: 10px;
		}
		#contact-form button#valid-form:hover
		{
			background-color: <?php echo esc_attr( $meta_unserialized_data['hover_color_contact_form'] ); ?> !important;
			color: <?php echo esc_attr( $meta_unserialized_data['text_hover_color_contact_form'] ); ?> !important;
			border-color: <?php echo esc_attr( $meta_unserialized_data['border_hover_color_contact_form'] ); ?> !important;
		}
		#block-answer
		{
			min-height: 60px;
			margin-top: 1em;
			text-align: center;
		}
		.success-message *
		{
			text-align: center;
			font-size: <?php echo $contact_success_message_font[0];// WPCS: XSS ok. ?> !important;
			color: <?php echo esc_attr( $contact_success_message_font[1] ); ?> !important;
			margin: 4% !important;
		}
		.social-icons
		{
			position: absolute;
			left: 8%;
			bottom: 5%;
			display: block;
			z-index: 9;
			width: auto;
			overflow: hidden;
			white-space: nowrap;
			-webkit-transition: all 0.7s cubic-bezier(0.42, 0, 0.58, 1);
			-moz-transition: all 0.7s cubic-bezier(0.42, 0, 0.58, 1);
			-ms-transition: all 0.7s cubic-bezier(0.42, 0, 0.58, 1);
			-o-transition: all 0.7s cubic-bezier(0.42, 0, 0.58, 1);
			transition: all 0.7s cubic-bezier(0.42, 0, 0.58, 1);
		}
		.social-icons i
		{
			-webkit-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-moz-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-ms-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-o-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
		}
		.social-icons a
		{
			width: 45px;
			line-height: 80px;
			letter-spacing: 0;
			font-size: 1em;
			height: 50px;
			display: inline-block;
			text-align: center;
			float: left;
			margin-right: 1px;
			border: none;
			-webkit-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-moz-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-ms-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			-o-transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
			transition: all 0.3s cubic-bezier(0, 0, 0.58, 1);
		}
		.img-social-media
		{
			height: 18px;
			width: 18px;
		}
		.social-icons a:hover
		{
			-webkit-transform: scale(1.2);
			-moz-transform: scale(1.2);
			-ms-transform: scale(1.2);
			-o-transform: scale(1.2);
			transform: scale(1.2);
		}
		footer
		{
			padding: 10px 0;
		}
		#cloud-animation
		{
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			z-index: -1;
			position: fixed;
		}
		#cloud-animation img
		{
			width: 100%;
			left: 0;
			top: 0;
			position: absolute;
		}
		@-webkit-keyframes animCloud
		{
			from
			{
				-webkit-transform: translateX(100%);
			}
			to
			{
				-webkit-transform: translateX(-100%);
			}
		}
		@-moz-keyframes animCloud
		{
			from
			{
				-moz-transform: translateX(100%);
			}
			to {
				-moz-transform: translateX(-100%);
			}
		}
		@keyframes animCloud
		{
			from {
				-webkit-transform: translateX(-100%);
				-moz-transform: translateX(-100%);
				-ms-transform: translateX(-100%);
				-o-transform: translateX(-100%);
				transform: translateX(-100%);
			}
			to {
				-webkit-transform: translateX(100%);
				-moz-transform: translateX(100%);
				-ms-transform: translateX(100%);
				-o-transform: translateX(100%);
				transform: translateX(100%);
			}
		}
		#cloud1
		{
			-webkit-animation: animCloud 25s infinite reverse;
			-moz-animation: animCloud 25s infinite reverse;
			animation: animCloud 25s infinite reverse;
		}
		#cloud2
		{
			-webkit-animation: animCloud 35s infinite reverse;
			-moz-animation: animCloud 35s infinite reverse;
			animation: animCloud 35s infinite reverse;
		}
		#cloud3
		{
			-webkit-animation: animCloud 45s infinite reverse;
			-moz-animation: animCloud 45s infinite reverse;
			animation: animCloud 45s infinite reverse;
		}
		#cloud4
		{
			-webkit-animation: animCloud 55s infinite reverse;
			-moz-animation: animCloud 55s infinite reverse;
			animation: animCloud 55s infinite reverse;
		}
		.mbYTP_wrapper
		{
			width: 100vw !important;
			min-width: 0 !important;
			left: 0 !important;
		}
		#player-nav
		{
			position: fixed;
			right: 20px;
			bottom: 20px;
			text-align: center;
		}
		@media (max-width:1024px)
		{
			#player-nav
			{
				position: relative;
			}
		}
		#player-nav li
		{
			display: inline-block;
			background: <?php echo esc_attr( $meta_data_array['player_control_color'] ); ?> !important;
			height: 40px;
			width: 40px;
			line-height: 40px;
			-webkit-border-radius: 0;
			-moz-border-radius: 0;
			-ms-border-radius: 0;
			border-radius: 0;
			-webkit-transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
			-moz-transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
			-ms-transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
			-o-transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
			transition: all 0.2s cubic-bezier(0.42, 0, 0.58, 1);
		}
		#player-nav li:hover
		{
			background: <?php echo esc_attr( $meta_data_array['player_control_hover_color'] ); ?> !important;
		}
		#player-nav li:hover a
		{
			color: #ffffff;
		}
		#player-nav li a
		{
			display: block;
			width: 100%;
			height: 100%;
			font-size: 15px;
			color: rgba(255, 255, 255, 0.5);
		}
		#gradient
		{
			width: 100%;
			height: 100%;
			opacity: 0.8;
			padding: 0px;
			margin: 0px;
		}
		#constellationel
		{
			left: 0;
			top: 0;
			position: fixed;
		}
		#container
		{
			height: 100%;
			position: absolute;
			width: 70%;
			left: 30%;
		}
		#dotty
		{
			position: fixed;
			top: 0;
			left: 0;
		}
		#xmas
		{
			width: 100%;
			height: 100%;
			position: fixed;
			top: 0;
			left: 0;
		}
		#rainy
		{
			height: 100%;
			position: fixed;
			width: 100%;
			top: 0;
			left: 0;
		}
		#starfield
		{
			position: fixed !important;
			top:0;
		}
		#bubble
		{
			background-repeat: repeat;
			position: fixed;
			top: 0;
			left: 0;
			overflow: hidden;
		}
		#fireworks
		{
			background: transparent;
			position: fixed;
			top: 0;
			left: 50%;
			overflow: hidden;
		}
		#wavybg-wrapper
		{
			width: 100%;
			height: 100%;
			position: fixed;
			top: 0;
			left: 0;
		}
		#wavybg-wrapper canvas
		{
			width: 100%;
			height: 100%;
		}
		#particles-js
		{
			position: fixed;
			top: 0;
			left: 30%;
			width: 70%;
			height: 100%;
		}
		#square-canvas
		{
			display: block;
			position: fixed;
			top: 0;
			right: 0;
			-webkit-transform: rotate(-90deg);
			-moz-transform: rotate(-90deg);
			-ms-transform: rotate(-90deg);
			-o-transform: rotate(-90deg);
			transform: rotate(-90deg);
		}
		@media only screen and (max-width: 1024px)
		{
		.overlay
		{
		left: 0;
		width: 100%;
		height: 100%;
		}
		.overlay.skew-part
		{
		-webkit-transform: skew(0deg, 0deg);
		-moz-transform: skew(0deg, 0deg);
		-ms-transform: skew(0deg, 0deg);
		-o-transform: skew(0deg, 0deg);
		transform: skew(0deg, 0deg);
		}
		#container
		{
		height: 100%;
		position: absolute;
		width: 100%;
		left: 0;
		}
		#stars, #stars2, #stars3
		{
		margin-left: 0 !important;
		}
		.logo-overlay-style-coming-soon-booster
		{
		position: relative;
		text-align: center !important;
		margin: 0px 0px 30px 0px !important;
		padding: 0px !important;
		left:50%;
		-webkit-transform: translateX(-50%);
		-moz-transform: translateX(-50%);
		-ms-transform: translateX(-50%);
		-o-transform: translateX(-50%);
		transform: translateX(-50%);
		margin: 25px 0;
		}
		.layout-heading-coming-soon-booster *
		{
		margin: 0px !important;
		padding:0px !important;
		text-align: center;
		}
		.layout-description-coming-soon-booster *
		{
		text-align: center;
		margin: 20px !important;
		padding:5px !important;
		}
		.custom-countdown-coming-soon-booster
		{
		margin: 0px !important;
		padding: 0px !important;
		margin-bottom: 30px !important;
		}
		.light-btn
		{
		padding: 0.7em 0 !important;
		margin-right: 0 !important;
		float: none !important;
		margin: 0 auto !important;
		margin-bottom: 15px !important;
		max-width: 50% !important;
		}
		.action-btn
		{
		padding: 0.7em 0 !important;
		float: none !important;
		margin: 0 auto !important;
		max-width: 50% !important;
		}
		#left-side
		{
		position: relative;
		width: 100%;
		height: auto;
		padding: 100px 0 150px;
		}
		#left-side .content
		{
		position: relative;
		left: 50%;
		-webkit-transform: translateX(-50%);
		-moz-transform: translateX(-50%);
		-ms-transform: translateX(-50%);
		-o-transform: translateX(-50%);
		transform: translateX(-50%);
		top: auto;
		text-align: center;
		}
		.social-icons
		{
		left: 3%;
		bottom: 3%;
		}
		#right-side
		{
		position: relative;
		-webkit-transform: translate3d(0, 0, 0);
		-moz-transform: translate3d(0, 0, 0);
		-o-transform: translate3d(0, 0, 0);
		-ms-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
		top: 0;
		width: 100%;
		}
		#right-side.hide-right
		{
		-webkit-transform: translate3d(0, 0, 0);
		-moz-transform: translate3d(0, 0, 0);
		-o-transform: translate3d(0, 0, 0);
		-ms-transform: translate3d(0, 0, 0);
		transform: translate3d(0, 0, 0);
		}
		#close-more-info
		{
		display: none;
		}
		.mCSB_scrollTools
		{
		right: 0;
		}
		.mCSB_scrollTools-left
		{
		right: 0 !important;
		}
		}
		/* Small Devices, Tablets */
		@media only screen and (max-width: 768px)
		{
		.light-btn
		{
		max-width: 70% !important;
		min-width: 60% !important;
		}
		.action-btn
		{
		max-width: 70% !important;
		min-width: 60% !important;
		}
		.dialog__content
		{
		width: 80%;
		max-width: 80%;
		min-width: 75%;
		}
		.dialog .dialog-inner
		{
		padding: 40px 20px 90px;
		overflow: hidden;
		}
		#subscribe #ux_frm_coming_soon_mode_subscription .form-group .gdpr-checkbox
		{
			margin: 4px 2px 0px 0px !important;
			float: left;
		}
		}
		/* Extra Small Devices, Phones */
		@media only screen and (max-width: 480px)
		{
			#left-side
			{
				padding: 50px 0 100px;
			}
			#left-side .content
			{
				padding: 0 3%;
			}
			#left-side.minimal-phone
			{
				height: 100vh;
			}
			.light-btn
			{
				max-width: 80% !important;
				min-width: 70% !important;
			}
			.action-btn
			{
				max-width: 80% !important;
				min-width: 70% !important;
			}
			.dialog__content
			{
				width: 95%;
				max-width: 95%;
				min-width: 75%;
			}
		.dialog .close-newsletter
			{
				top: 2px;
				right: 5px;
			}
			.dialog .dialog-inner
			{
				padding: 40px 20px 50px;
			}
			.subscription-heading-coming-soon-booster *
			{
				font-size: 25px !important;
				margin-bottom: 20px !important;
			}
			.subscription-description-coming-soon-booster *
			{
				font-size: 16px !important;
				margin-bottom: 15px !important;
			}
			.subscription-label-coming-soon-booster
			{
				font-size: 14px !important;
			}
			#subscribe .block-message
			{
				padding: 5px 2px;
			}
			.subscription-success-coming-soon-booster *
			{
				font-size: 12px;
			}
			.subscription-error-coming-soon-booster *
			{
				font-size: 12px;
			}
		}
		/* Only for tablet in landscape mode */
		/* Only for phone in landscape mode */
			@media screen and (max-device-width: 667px) and (orientation: landscape) {
			.social-icons
			{
				left: 0;
				margin: 9% 0 -14% 1%;
				position: relative !important;
			}
			#left-side
			{
				padding: 50px 0 100px;
			}
			.dialog__content
			{
				width: 100%;
				max-width: 100%;
				min-width: 75%;
			}
			.dialog .close-newsletter
			{
				top: 2px;
				right: 5px;
			}
			.dialog .dialog-inner
			{
				padding: 40px 20px 50px;
			}
			.subscription-heading-coming-soon-booster *
			{
				font-size: 25px !important;
				margin-bottom: 5px !important;
			}
			#subscribe #ux_frm_coming_soon_mode_subscription
			{
				margin-top: 10px;
			}
			#subscribe #ux_frm_coming_soon_mode_subscription .form-group .form-control
			{
				width: 62%;
				margin: 0;
				float: left;
			}
			#subscribe #ux_frm_coming_soon_mode_subscription .form-group button.submit
			{
				width: auto !important;
				margin: 0 !important;
				float: left !important;
				padding: 10px !important;
			}
			#subscribe .block-message
			{
				padding: 5px 2px;
			}
			.subscription-success-coming-soon-booster *
			{
				font-size: 12px;
			}
			.subscription-error-coming-soon-booster *
			{
				font-size: 12px;
			}
		}
		/***************************Bootstrap.min.css***********************/
		* {
		-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}
		:after,
		:before
		{
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}
		button,input,select,textarea
		{
			font-family: inherit;
			font-size: inherit;
			line-height: inherit;
		}
		.row
		{
			margin-right: -15px;
			margin-left: -15px;
		}
		.col-lg-12,.col-lg-4,.col-lg-6,.col-sm-12,.col-sm-4,.col-sm-6,.col-xs-12
		{
			position: relative;
			min-height: 1px;
			padding-right: 15px;
			padding-left: 15px
		}
		.col-xs-12
		{
			float: left;
		}
		.col-xs-12
		{
			width: 100%;
		}
		@media (min-width:768px)
		{
			.col-sm-12,.col-sm-4,.col-sm-6
			{
				float: left;
			}
			.col-sm-12
			{
				width: 100%;
			}
			.col-sm-6
			{
				width: 50%;
			}
			.col-sm-4
			{
				width: 33.33333333%;
			}
		}
		@media (min-width:1200px)
		{
			.col-lg-12,.col-lg-4,.col-lg-6
			{
				float: left;
			}
			.col-lg-12
			{
				width: 100%;
			}
			.col-lg-6
			{
				width: 50%;
			}
			.col-lg-4
			{
				width: 33.33333333%;
			}
		}
		.form-control
		{
			display: block;
			width: 100%;
			height: 34px;
			padding: 6px 12px;
			font-size: 14px;
			line-height: 1.42857143;
			background-image: none;
			border: 1px solid #ccc;
			border-radius: 4px;
			-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
			-webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
			-o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
			transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
		}
		.form-control:focus
		{
			outline: 0;
			-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
		}
		.form-control::-moz-placeholder
		{
			color: #999;
			opacity: 1;
		}
		.form-control:-ms-input-placeholder
		{
			color: #999;
		}
		.form-control::-webkit-input-placeholder
		{
			color: #999;
		}
		.form-group
		{
			margin-bottom: 15px;
		}
		.btn-group-lg>.btn,
		.btn-lg
		{
			padding: 10px 16px;
			font-size: 18px;
			line-height: 1.3333333;
			border-radius: 6px;
		}
		.nav
		{
			padding-left: 0;
			margin-bottom: 0;
			list-style: none;
		}
		.nav>li
		{
			position: relative;
			display: block;
		}
		.nav>li>a
		{
			position: relative;
			display: block;
			padding: 10px 15px;
		}
		.nav>li>a:focus,
		.nav>li>a:hover
		{
			text-decoration: none;
			background-color: #eee;
		}
		.tooltip
		{
			position: absolute;
			z-index: 1070;
			display: block;
			font-size: 12px;
			font-weight: 400;
			line-height: 1.4;
			filter: alpha(opacity=0);
			opacity: 0;
		}
		.tooltip.in
		{
			filter: alpha(opacity=90);
			opacity: .9;
		}
		.tooltip.top
		{
			padding: 5px 0;
			margin-top: -3px;
		}
		/**************************Vegas.css******************************/
		.vegas-wrapper,
		.vegas-overlay,
		.vegas-timer,
		.vegas-slide,
		.vegas-slide-inner
		{
			position: absolute;
			top: 0;
			left: 0;
			bottom: 0;
			right: 0;
			overflow: hidden;
			border: none;
			padding: 0;
			margin: 0;
		}
		.vegas-timer
		{
			top: auto;
			bottom: 0;
			height: 2px;
		}
		.vegas-timer-progress
		{
			width: 0%;
			height: 100%;
			background: white;
			-webkit-transition: width ease-out;
			transition: width ease-out;
		}
		.vegas-timer-running .vegas-timer-progress
		{
			width: 100%;
		}
		.vegas-slide,
		.vegas-slide-inner
		{
			margin: 0;
			padding: 0;
		<?php
		if ( 'image' === $meta_data_array['background_type'] ) {
			?>
			background: transparent <?php echo esc_attr( $image_position[1] ); ?> <?php echo esc_attr( $image_position[2] ); ?>	<?php echo esc_attr( $image_position[0] ); ?>;
			<?php
		} else {
			?>
			background-size: cover;
			<?php
		}
		?>
			-webkit-transform: translateZ(0);
			transform: translateZ(0);
		<?php
		if ( 'no-repeat' === $image_position[0] ) {
			?>
			background-size: cover;
			<?php
		}
		?>
		}
		body .vegas-container
		{
			overflow: hidden !important;
			position: relative;
		}
		body.vegas-container
		{
			z-index: -2;
		}
		body.vegas-container > .vegas-timer,
		body.vegas-container > .vegas-overlay,
		body.vegas-container > .vegas-slide
		{
			position: fixed;
			z-index: -1;
		}
		/* fade */
		.vegas-transition-fade,
		.vegas-transition-fade2
		{
			opacity: 0;
		}
		.vegas-transition-fade-in,
		.vegas-transition-fade2-in
		{
			opacity: 1;
		}
		.vegas-transition-fade2-out
		{
			opacity: 0;
		}
		/* slideLeft */
		.vegas-transition-slideLeft,
		.vegas-transition-slideLeft2
		{
			-webkit-transform: translateX(100%);
			-ms-transform: translateX(100%);
			transform: translateX(100%);
		}
		.vegas-transition-slideLeft-in,
		.vegas-transition-slideLeft2-in
		{
			-webkit-transform: translateX(0%);
			-ms-transform: translateX(0%);
			transform: translateX(0%);
		}
		.vegas-transition-slideLeft2-out
		{
			-webkit-transform: translateX(-100%);
			-ms-transform: translateX(-100%);
			transform: translateX(-100%);
		}
		/* slideRight */
		.vegas-transition-slideRight,
		.vegas-transition-slideRight2
		{
			-webkit-transform: translateX(-100%);
			-ms-transform: translateX(-100%);
			transform: translateX(-100%);
		}
		.vegas-transition-slideRight-in,
		.vegas-transition-slideRight2-in
		{
			-webkit-transform: translateX(0%);
			-ms-transform: translateX(0%);
			transform: translateX(0%);
		}
		.vegas-transition-slideRight2-out
		{
			-webkit-transform: translateX(100%);
			-ms-transform: translateX(100%);
			transform: translateX(100%);
		}
		/* zoomIn */
		.vegas-transition-zoomIn,
		.vegas-transition-zoomIn2
		{
			-webkit-transform: scale(0);
			-ms-transform: scale(0);
			transform: scale(0);
			opacity: 0;
		}
		.vegas-transition-zoomIn-in,
		.vegas-transition-zoomIn2-in
		{
			-webkit-transform: scale(1);
			-ms-transform: scale(1);
			transform: scale(1);
			opacity: 1;
		}
		.vegas-transition-zoomIn2-out
		{
			-webkit-transform: scale(2);
			-ms-transform: scale(2);
			transform: scale(2);
			opacity: 0;
		}
		/* zoomOut */
		.vegas-transition-zoomOut,
		.vegas-transition-zoomOut2
		{
			-webkit-transform: scale(2);
			-ms-transform: scale(2);
			transform: scale(2);
			opacity: 0;
		}
		.vegas-transition-zoomOut-in,
		.vegas-transition-zoomOut2-in
		{
			-webkit-transform: scale(1);
			-ms-transform: scale(1);
			transform: scale(1);
			opacity: 1;
		}
		.vegas-transition-zoomOut2-out
		{
			-webkit-transform: scale(0);
			-ms-transform: scale(0);
			transform: scale(0);
			opacity: 0;
		}
		/* swirlLeft */
		.vegas-transition-swirlLeft,
		.vegas-transition-swirlLeft2
		{
			-webkit-transform: scale(2) rotate(35deg);
			-ms-transform: scale(2) rotate(35deg);
			transform: scale(2) rotate(35deg);
			opacity: 0;
		}
		.vegas-transition-swirlLeft-in,
		.vegas-transition-swirlLeft2-in
		{
			-webkit-transform: scale(1) rotate(0deg);
			-ms-transform: scale(1) rotate(0deg);
			transform: scale(1) rotate(0deg);
			opacity: 1;
		}
		.vegas-transition-swirlLeft2-out
		{
			-webkit-transform: scale(2) rotate(-35deg);
			-ms-transform: scale(2) rotate(-35deg);
			transform: scale(2) rotate(-35deg);
			opacity: 0;
		}
		/* swirlRight */
		.vegas-transition-swirlRight,
		.vegas-transition-swirlRight2
		{
			-webkit-transform: scale(2) rotate(-35deg);
			-ms-transform: scale(2) rotate(-35deg);
			transform: scale(2) rotate(-35deg);
			opacity: 0;
		}
		.vegas-transition-swirlRight-in,
		.vegas-transition-swirlRight2-in
		{
			-webkit-transform: scale(1) rotate(0deg);
			-ms-transform: scale(1) rotate(0deg);
			transform: scale(1) rotate(0deg);
			opacity: 1;
		}
		.vegas-transition-swirlRight2-out
		{
			-webkit-transform: scale(2) rotate(35deg);
			-ms-transform: scale(2) rotate(35deg);
			transform: scale(2) rotate(35deg);
			opacity: 0;
		}
		/* flash */
		.vegas-transition-flash,
		.vegas-transition-flash2
		{
			opacity: 0;
			-webkit-filter: brightness(25);
			filter: brightness(25);
		}
		.vegas-transition-flash-in,
		.vegas-transition-flash2-in
		{
			opacity: 1;
			-webkit-filter: brightness(1);
			filter: brightness(1);
		}
		.vegas-transition-flash2-out
		{
			opacity: 0;
			-webkit-filter: brightness(25);
			filter: brightness(25);
		}
		/**************************Animate.css******************************/
		.animated-middle
		{
			-webkit-animation-duration: 1.2s;
			animation-duration: 1.2s;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
		}
		@-webkit-keyframes fadeInUp
		{
		from
			{
				opacity: 0;
				-webkit-transform: translate3d(0, 100%, 0);
				transform: translate3d(0, 100%, 0);
			}
			100%
			{
				opacity: 1;
				-webkit-transform: none;
				transform: none;
			}
		}
		@keyframes fadeInUp
		{
			from
			{
				opacity: 0;
				-webkit-transform: translate3d(0, 100%, 0);
				transform: translate3d(0, 100%, 0);
			}
			100%
			{
				opacity: 1;
				-webkit-transform: none;
				transform: none;
			}
		}
		.fadeInUp
		{
			-webkit-animation-name: fadeInUp;
			animation-name: fadeInUp;
		}
		@-webkit-keyframes fadeInUpBig
		{
			from
			{
				opacity: 0;
				-webkit-transform: translate3d(0, 2000px, 0);
				transform: translate3d(0, 2000px, 0);
			}
			100%
			{
				opacity: 1;
				-webkit-transform: none;
				transform: none;
			}
		}
		@keyframes fadeInUpBig
		{
			from
			{
				opacity: 0;
				-webkit-transform: translate3d(0, 2000px, 0);
				transform: translate3d(0, 2000px, 0);
			}
			100%
			{
				opacity: 1;
				-webkit-transform: none;
				transform: none;
			}
		}
		.fadeInUpBig
		{
			-webkit-animation-name: fadeInUpBig;
			animation-name: fadeInUpBig;
		}
		.fadeInRight
		{
			-webkit-animation-name: fadeInRight;
			animation-name: fadeInRight;
		}
		@keyframes fadeInRight
		{
			from
			{
				opacity: 0;
				-webkit-transform: translate3d(100%, 0, 0);
				transform: translate3d(100%, 0, 0);
			}
			100%
			{
				opacity: 1;
				-webkit-transform: none;
				transform: none;
			}
		}
		/*************************jquery.mCustomScrollbar***************************/

		.mCustomScrollbar
		{
			-ms-touch-action: none;
			touch-action: none
		}
		.mCustomScrollbar.mCS_no_scrollbar,
		.mCustomScrollbar.mCS_touch_action
		{
			-ms-touch-action: auto;
			touch-action: auto
		}
		.mCustomScrollBox
		{
			position: relative;
			overflow: hidden;
			height: 100%;
			max-width: 100%;
			outline: 0;
			direction: ltr
		}
		.mCSB_container
		{
			overflow: hidden;
			width: auto;
			height: auto
		}
		.mCS-dir-rtl>.mCSB_inside>.mCSB_container,
		.mCSB_container.mCS_no_scrollbar_y.mCS_y_hidden
		{
			margin-right: 0
		}
		.mCS-dir-rtl>.mCSB_inside>.mCSB_container.mCS_no_scrollbar_y.mCS_y_hidden
		{
			margin-left: 0
		}
		.mCSB_outside+.mCSB_scrollTools
		{
			right: -26px
		}
		.mCS-dir-rtl>.mCSB_inside>.mCSB_scrollTools,
		.mCS-dir-rtl>.mCSB_outside+.mCSB_scrollTools
		{
			right: auto;
			left: 0
		}
		.mCS-dir-rtl>.mCSB_outside+.mCSB_scrollTools
		{
			left: -26px
		}
		.mCSB_scrollTools .mCSB_draggerContainer
		{
			position: absolute;
			top: 0;
			left: 0;
			bottom: 0;
			right: 0;
			height: auto
		}
		.mCSB_scrollTools a+.mCSB_draggerContainer
		{
			margin: 20px 0
		}
		.mCSB_scrollTools .mCSB_dragger
		{
			cursor: pointer;
			width: 100%;
			height: 30px;
			z-index: 1
		}
		.mCSB_scrollTools_vertical.mCSB_scrollTools_onDrag_expand .mCSB_dragger.mCSB_dragger_onDrag_expanded .mCSB_dragger_bar,
		.mCSB_scrollTools_vertical.mCSB_scrollTools_onDrag_expand .mCSB_draggerContainer:hover .mCSB_dragger .mCSB_dragger_bar
		{
			width: 12px
		}
		.mCSB_scrollTools_vertical.mCSB_scrollTools_onDrag_expand .mCSB_dragger.mCSB_dragger_onDrag_expanded+.mCSB_draggerRail,
		.mCSB_scrollTools_vertical.mCSB_scrollTools_onDrag_expand .mCSB_draggerContainer:hover .mCSB_draggerRail
		{
			width: 8px
		}
		.mCSB_scrollTools .mCSB_buttonDown,
		.mCSB_scrollTools .mCSB_buttonUp
		{
			display: block;
			position: absolute;
			height: 20px;
			width: 100%;
			overflow: hidden;
			margin: 0 auto;
			cursor: pointer
		}
		.mCSB_scrollTools .mCSB_buttonDown
		{
			bottom: 0
		}
		.mCSB_horizontal.mCSB_inside>.mCSB_container
		{
			margin-right: 0;
			margin-bottom: 30px
		}
		.mCSB_horizontal.mCSB_outside>.mCSB_container
		{
			min-height: 100%
		}
		.mCSB_horizontal>.mCSB_container.mCS_no_scrollbar_x.mCS_x_hidden
		{
			margin-bottom: 0
		}
		.mCSB_scrollTools.mCSB_scrollTools_horizontal
		{
			width: auto;
			height: 16px;
			top: auto;
			right: 0;
			bottom: 0;
			left: 0
		}
		.mCustomScrollBox+.mCSB_scrollTools+.mCSB_scrollTools.mCSB_scrollTools_horizontal,
		.mCustomScrollBox+.mCSB_scrollTools.mCSB_scrollTools_horizontal
		{
			bottom: -26px
		}
		.mCSB_scrollTools.mCSB_scrollTools_horizontal a+.mCSB_draggerContainer
		{
			margin: 0 20px
		}
		.mCSB_scrollTools.mCSB_scrollTools_horizontal .mCSB_draggerRail
		{
			width: 100%;
			height: 2px;
			margin: 7px 0
		}
		.mCSB_scrollTools.mCSB_scrollTools_horizontal .mCSB_dragger
		{
			width: 30px;
			height: 100%;
			left: 0
		}
		.mCSB_scrollTools.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar
		{
			width: 100%;
			height: 4px;
			margin: 6px auto
		}
		.mCSB_scrollTools_horizontal.mCSB_scrollTools_onDrag_expand .mCSB_dragger.mCSB_dragger_onDrag_expanded .mCSB_dragger_bar,
		.mCSB_scrollTools_horizontal.mCSB_scrollTools_onDrag_expand .mCSB_draggerContainer:hover .mCSB_dragger .mCSB_dragger_bar
		{
			height: 12px;
			margin: 2px auto
		}
		.mCSB_scrollTools_horizontal.mCSB_scrollTools_onDrag_expand .mCSB_dragger.mCSB_dragger_onDrag_expanded+.mCSB_draggerRail,
		.mCSB_scrollTools_horizontal.mCSB_scrollTools_onDrag_expand .mCSB_draggerContainer:hover .mCSB_draggerRail
		{
			height: 8px;
			margin: 4px 0
		}
		.mCSB_scrollTools.mCSB_scrollTools_horizontal .mCSB_buttonLeft,
		.mCSB_scrollTools.mCSB_scrollTools_horizontal .mCSB_buttonRight
		{
			display: block;
			position: absolute;
			width: 20px;
			height: 100%;
			overflow: hidden;
			margin: 0 auto;
			cursor: pointer
		}
		.mCSB_scrollTools.mCSB_scrollTools_horizontal .mCSB_buttonLeft
		{
			left: 0
		}
		.mCSB_scrollTools.mCSB_scrollTools_horizontal .mCSB_buttonRight
		{
			right: 0
		}
		.mCSB_container_wrapper
		{
			position: absolute;
			height: auto;
			width: auto;
			overflow: hidden;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			margin-right: 30px;
			margin-bottom: 30px
		}
		.mCSB_container_wrapper>.mCSB_container
		{
			padding-right: 30px;
			padding-bottom: 30px
		}
		.mCSB_vertical_horizontal>.mCSB_scrollTools.mCSB_scrollTools_vertical
		{
			bottom: 20px
		}
		.mCSB_vertical_horizontal>.mCSB_scrollTools.mCSB_scrollTools_horizontal
		{
			right: 20px
		}
		.mCSB_container_wrapper.mCS_no_scrollbar_x.mCS_x_hidden+.mCSB_scrollTools.mCSB_scrollTools_vertical
		{
			bottom: 0
		}
		.mCS-dir-rtl>.mCustomScrollBox.mCSB_vertical_horizontal.mCSB_inside>.mCSB_scrollTools.mCSB_scrollTools_horizontal,
		.mCSB_container_wrapper.mCS_no_scrollbar_y.mCS_y_hidden+.mCSB_scrollTools~.mCSB_scrollTools.mCSB_scrollTools_horizontal
		{
			right: 0
		}
		.mCS-dir-rtl>.mCustomScrollBox.mCSB_vertical_horizontal.mCSB_inside>.mCSB_scrollTools.mCSB_scrollTools_horizontal
		{
			left: 20px
		}
		.mCS-dir-rtl>.mCustomScrollBox.mCSB_vertical_horizontal.mCSB_inside>.mCSB_container_wrapper.mCS_no_scrollbar_y.mCS_y_hidden+.mCSB_scrollTools~.mCSB_scrollTools.mCSB_scrollTools_horizontal
		{
			left: 0
		}
		.mCS-dir-rtl>.mCSB_inside>.mCSB_container_wrapper
		{
			margin-right: 0;
			margin-left: 30px
		}
		.mCSB_container_wrapper.mCS_no_scrollbar_y.mCS_y_hidden>.mCSB_container
		{
			padding-right: 0;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box
		}
		.mCSB_container_wrapper.mCS_no_scrollbar_x.mCS_x_hidden>.mCSB_container
		{
			padding-bottom: 0;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box
		}
		.mCustomScrollBox.mCSB_vertical_horizontal.mCSB_inside>.mCSB_container_wrapper.mCS_no_scrollbar_y.mCS_y_hidden
		{
			margin-right: 0;
			margin-left: 0
		}
		.mCustomScrollBox.mCSB_vertical_horizontal.mCSB_inside>.mCSB_container_wrapper.mCS_no_scrollbar_x.mCS_x_hidden
		{
			margin-bottom: 0
		}
		.mCSB_scrollTools .mCSB_buttonDown,
		.mCSB_scrollTools .mCSB_buttonLeft,
		.mCSB_scrollTools .mCSB_buttonRight,
		.mCSB_scrollTools .mCSB_buttonUp,
		.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			-webkit-transition: opacity .2s ease-in-out, background-color .2s ease-in-out;
			-moz-transition: opacity .2s ease-in-out, background-color .2s ease-in-out;
			-o-transition: opacity .2s ease-in-out, background-color .2s ease-in-out;
			transition: opacity .2s ease-in-out, background-color .2s ease-in-out
		}
		.mCSB_scrollTools_horizontal.mCSB_scrollTools_onDrag_expand .mCSB_draggerRail,
		.mCSB_scrollTools_horizontal.mCSB_scrollTools_onDrag_expand .mCSB_dragger_bar,
		.mCSB_scrollTools_vertical.mCSB_scrollTools_onDrag_expand .mCSB_draggerRail,
		.mCSB_scrollTools_vertical.mCSB_scrollTools_onDrag_expand .mCSB_dragger_bar
		{
			-webkit-transition: width .2s ease-out .2s, height .2s ease-out .2s, margin-left .2s ease-out .2s, margin-right .2s ease-out .2s, margin-top .2s ease-out .2s, margin-bottom .2s ease-out .2s, opacity .2s ease-in-out, background-color .2s ease-in-out;
			-moz-transition: width .2s ease-out .2s, height .2s ease-out .2s, margin-left .2s ease-out .2s, margin-right .2s ease-out .2s, margin-top .2s ease-out .2s, margin-bottom .2s ease-out .2s, opacity .2s ease-in-out, background-color .2s ease-in-out;
			-o-transition: width .2s ease-out .2s, height .2s ease-out .2s, margin-left .2s ease-out .2s, margin-right .2s ease-out .2s, margin-top .2s ease-out .2s, margin-bottom .2s ease-out .2s, opacity .2s ease-in-out, background-color .2s ease-in-out;
			transition: width .2s ease-out .2s, height .2s ease-out .2s, margin-left .2s ease-out .2s, margin-right .2s ease-out .2s, margin-top .2s ease-out .2s, margin-bottom .2s ease-out .2s, opacity .2s ease-in-out, background-color .2s ease-in-out
		}
		.mCS-autoHide>.mCustomScrollBox>.mCSB_scrollTools,
		.mCS-autoHide>.mCustomScrollBox~.mCSB_scrollTools
		{
			opacity: 0;
			filter: "alpha(opacity=0)";
			-ms-filter: "alpha(opacity=0)"
		}
		.mCSB_scrollTools .mCSB_draggerRail
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .4);
			filter: "alpha(opacity=40)";
			-ms-filter: "alpha(opacity=40)"
		}
		.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar
		{
			background-color: #fff;
			background-color: rgba(255, 255, 255, .85);
			filter: "alpha(opacity=85)";
			-ms-filter: "alpha(opacity=85)"
		}
		.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar
		{
			background-color: #fff;
			background-color: rgba(255, 255, 255, .9);
			filter: "alpha(opacity=90)";
			-ms-filter: "alpha(opacity=90)"
		}
		.mCSB_scrollTools .mCSB_buttonDown,
		.mCSB_scrollTools .mCSB_buttonLeft,
		.mCSB_scrollTools .mCSB_buttonRight,
		.mCSB_scrollTools .mCSB_buttonUp
		{
			background-image: url(mCSB_buttons.png);
			background-repeat: no-repeat;
			opacity: .4;
			filter: "alpha(opacity=40)";
			-ms-filter: "alpha(opacity=40)"
		}
		.mCSB_scrollTools .mCSB_buttonUp
		{
			background-position: 0 0
		}
		.mCSB_scrollTools .mCSB_buttonDown
		{
			background-position: 0 -20px
		}
		.mCSB_scrollTools .mCSB_buttonLeft
		{
			background-position: 0 -40px
		}
		.mCSB_scrollTools .mCSB_buttonRight
		{
			background-position: 0 -56px
		}
		.mCSB_scrollTools .mCSB_buttonDown:hover,
		.mCSB_scrollTools .mCSB_buttonLeft:hover,
		.mCSB_scrollTools .mCSB_buttonRight:hover,
		.mCSB_scrollTools .mCSB_buttonUp:hover
		{
			opacity: .75;
			filter: "alpha(opacity=75)";
			-ms-filter: "alpha(opacity=75)"
		}
		.mCSB_scrollTools .mCSB_buttonDown:active,
		.mCSB_scrollTools .mCSB_buttonLeft:active,
		.mCSB_scrollTools .mCSB_buttonRight:active,
		.mCSB_scrollTools .mCSB_buttonUp:active
		{
			opacity: .9;
			filter: "alpha(opacity=90)";
			-ms-filter: "alpha(opacity=90)"
		}
		.mCS-dark.mCSB_scrollTools .mCSB_draggerRail
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .15)
		}
		.mCS-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .75)
		}
		.mCS-dark.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar
		{
			background-color: rgba(0, 0, 0, .85)
		}
		.mCS-dark.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-dark.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar
		{
			background-color: rgba(0, 0, 0, .9)
		}
		.mCS-dark.mCSB_scrollTools .mCSB_buttonUp
		{
			background-position: -80px 0
		}
		.mCS-dark.mCSB_scrollTools .mCSB_buttonDown
		{
			background-position: -80px -20px
		}
		.mCS-dark.mCSB_scrollTools .mCSB_buttonLeft
		{
			background-position: -80px -40px
		}
		.mCS-dark.mCSB_scrollTools .mCSB_buttonRight
		{
			background-position: -80px -56px
		}
		.mCS-dark-2.mCSB_scrollTools .mCSB_draggerRail,
		.mCS-light-2.mCSB_scrollTools .mCSB_draggerRail
		{
			width: 4px;
			background-color: #fff;
			background-color: rgba(255, 255, 255, .1);
			-webkit-border-radius: 1px;
			-moz-border-radius: 1px;
			border-radius: 1px
		}
		.mCS-dark-2.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-light-2.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			width: 4px;
			background-color: #fff;
			background-color: rgba(255, 255, 255, .75);
			-webkit-border-radius: 1px;
			-moz-border-radius: 1px;
			border-radius: 1px
		}
		.mCS-dark-2.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
		.mCS-dark-2.mCSB_scrollTools_horizontal .mCSB_draggerRail,
		.mCS-light-2.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
		.mCS-light-2.mCSB_scrollTools_horizontal .mCSB_draggerRail
		{
			width: 100%;
			height: 4px;
			margin: 6px auto
		}
		.mCS-light-2.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar
		{
			background-color: #fff;
			background-color: rgba(255, 255, 255, .85)
		}
		.mCS-light-2.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-light-2.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar
		{
			background-color: #fff;
			background-color: rgba(255, 255, 255, .9)
		}
		.mCS-light-2.mCSB_scrollTools .mCSB_buttonUp
		{
			background-position: -32px 0
		}
		.mCS-light-2.mCSB_scrollTools .mCSB_buttonDown
		{
			background-position: -32px -20px
		}
		.mCS-light-2.mCSB_scrollTools .mCSB_buttonLeft
		{
			background-position: -40px -40px
		}
		.mCS-light-2.mCSB_scrollTools .mCSB_buttonRight
		{
			background-position: -40px -56px
		}
		.mCS-dark-2.mCSB_scrollTools .mCSB_draggerRail
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .1);
			-webkit-border-radius: 1px;
			-moz-border-radius: 1px;
			border-radius: 1px
		}
		.mCS-dark-2.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .75);
			-webkit-border-radius: 1px;
			-moz-border-radius: 1px;
			border-radius: 1px
		}
		.mCS-dark-2.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .85)
		}
		.mCS-dark-2.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-dark-2.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .9)
		}
		.mCS-dark-2.mCSB_scrollTools .mCSB_buttonUp
		{
			background-position: -112px 0
		}
		.mCS-dark-2.mCSB_scrollTools .mCSB_buttonDown
		{
			background-position: -112px -20px
		}
		.mCS-dark-2.mCSB_scrollTools .mCSB_buttonLeft
		{
			background-position: -120px -40px
		}
		.mCS-dark-2.mCSB_scrollTools .mCSB_buttonRight
		{
			background-position: -120px -56px
		}
		.mCS-dark-thick.mCSB_scrollTools .mCSB_draggerRail,
		.mCS-light-thick.mCSB_scrollTools .mCSB_draggerRail
		{
			width: 4px;
			background-color: #fff;
			background-color: rgba(255, 255, 255, .1);
			-webkit-border-radius: 2px;
			-moz-border-radius: 2px;
			border-radius: 2px
		}
		.mCS-dark-thick.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-light-thick.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			width: 6px;
			background-color: #fff;
			background-color: rgba(255, 255, 255, .75);
			-webkit-border-radius: 2px;
			-moz-border-radius: 2px;
			border-radius: 2px
		}
		.mCS-dark-thick.mCSB_scrollTools_horizontal .mCSB_draggerRail,
		.mCS-light-thick.mCSB_scrollTools_horizontal .mCSB_draggerRail
		{
			width: 100%;
			height: 4px;
			margin: 6px 0
		}
		.mCS-dark-thick.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
		.mCS-light-thick.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar
		{
			width: 100%;
			height: 6px;
			margin: 5px auto
		}
		.mCS-light-thick.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar
		{
			background-color: #fff;
			background-color: rgba(255, 255, 255, .85)
		}
		.mCS-light-thick.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-light-thick.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar
		{
			background-color: #fff;
			background-color: rgba(255, 255, 255, .9)
		}
		.mCS-light-thick.mCSB_scrollTools .mCSB_buttonUp
		{
			background-position: -16px 0
		}
		.mCS-light-thick.mCSB_scrollTools .mCSB_buttonDown
		{
			background-position: -16px -20px
		}
		.mCS-light-thick.mCSB_scrollTools .mCSB_buttonLeft
		{
			background-position: -20px -40px
		}
		.mCS-light-thick.mCSB_scrollTools .mCSB_buttonRight
		{
			background-position: -20px -56px
		}
		.mCS-dark-thick.mCSB_scrollTools .mCSB_draggerRail
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .1);
			-webkit-border-radius: 2px;
			-moz-border-radius: 2px;
			border-radius: 2px
		}
		.mCS-dark-thick.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .75);
			-webkit-border-radius: 2px;
			-moz-border-radius: 2px;
			border-radius: 2px
		}
		.mCS-dark-thick.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .85)
		}
		.mCS-dark-thick.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-dark-thick.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .9)
		}
		.mCS-dark-thick.mCSB_scrollTools .mCSB_buttonUp
		{
			background-position: -96px 0
		}
		.mCS-dark-thick.mCSB_scrollTools .mCSB_buttonDown
		{
			background-position: -96px -20px
		}
		.mCS-dark-thick.mCSB_scrollTools .mCSB_buttonLeft
		{
			background-position: -100px -40px
		}
		.mCS-dark-thick.mCSB_scrollTools .mCSB_buttonRight
		{
			background-position: -100px -56px
		}
		.mCS-light-thin.mCSB_scrollTools .mCSB_draggerRail
		{
			background-color: #fff;
			background-color: rgba(255, 255, 255, .1)
		}
		.mCS-dark-thin.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-light-thin.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			width: 2px
		}
		.mCS-dark-thin.mCSB_scrollTools_horizontal .mCSB_draggerRail,
		.mCS-light-thin.mCSB_scrollTools_horizontal .mCSB_draggerRail
		{
			width: 100%
		}
		.mCS-dark-thin.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
		.mCS-light-thin.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar
		{
			width: 100%;
			height: 2px;
			margin: 7px auto
		}
		.mCS-dark-thin.mCSB_scrollTools .mCSB_draggerRail
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .15)
		}
		.mCS-dark-thin.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .75)
		}
		.mCS-dark-thin.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .85)
		}
		.mCS-dark-thin.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-dark-thin.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .9)
		}
		.mCS-dark-thin.mCSB_scrollTools .mCSB_buttonUp
		{
			background-position: -80px 0
		}
		.mCS-dark-thin.mCSB_scrollTools .mCSB_buttonDown
		{
			background-position: -80px -20px
		}
		.mCS-dark-thin.mCSB_scrollTools .mCSB_buttonLeft
		{
			background-position: -80px -40px
		}
		.mCS-dark-thin.mCSB_scrollTools .mCSB_buttonRight
		{
			background-position: -80px -56px
		}
		.mCS-rounded.mCSB_scrollTools .mCSB_draggerRail
		{
			background-color: #fff;
			background-color: rgba(255, 255, 255, .15)
		}
		.mCS-rounded-dark.mCSB_scrollTools .mCSB_dragger,
		.mCS-rounded-dots-dark.mCSB_scrollTools .mCSB_dragger,
		.mCS-rounded-dots.mCSB_scrollTools .mCSB_dragger,
		.mCS-rounded.mCSB_scrollTools .mCSB_dragger
		{
			height: 14px
		}
		.mCS-rounded-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-rounded-dots-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-rounded-dots.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-rounded.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			width: 14px;
			margin: 0 1px
		}
		.mCS-rounded-dark.mCSB_scrollTools_horizontal .mCSB_dragger,
		.mCS-rounded-dots-dark.mCSB_scrollTools_horizontal .mCSB_dragger,
		.mCS-rounded-dots.mCSB_scrollTools_horizontal .mCSB_dragger,
		.mCS-rounded.mCSB_scrollTools_horizontal .mCSB_dragger
		{
			width: 14px
		}
		.mCS-rounded-dark.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
		.mCS-rounded-dots-dark.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
		.mCS-rounded-dots.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
		.mCS-rounded.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar
		{
			height: 14px;
			margin: 1px 0
		}
		.mCS-rounded-dark.mCSB_scrollTools_vertical.mCSB_scrollTools_onDrag_expand .mCSB_dragger.mCSB_dragger_onDrag_expanded .mCSB_dragger_bar,
		.mCS-rounded-dark.mCSB_scrollTools_vertical.mCSB_scrollTools_onDrag_expand .mCSB_draggerContainer:hover .mCSB_dragger .mCSB_dragger_bar,
		.mCS-rounded.mCSB_scrollTools_vertical.mCSB_scrollTools_onDrag_expand .mCSB_dragger.mCSB_dragger_onDrag_expanded .mCSB_dragger_bar,
		.mCS-rounded.mCSB_scrollTools_vertical.mCSB_scrollTools_onDrag_expand .mCSB_draggerContainer:hover .mCSB_dragger .mCSB_dragger_bar
		{
			width: 16px;
			height: 16px;
			margin: -1px 0
		}
		.mCS-rounded-dark.mCSB_scrollTools_vertical.mCSB_scrollTools_onDrag_expand .mCSB_dragger.mCSB_dragger_onDrag_expanded+.mCSB_draggerRail,
		.mCS-rounded-dark.mCSB_scrollTools_vertical.mCSB_scrollTools_onDrag_expand .mCSB_draggerContainer:hover .mCSB_draggerRail,
		.mCS-rounded.mCSB_scrollTools_vertical.mCSB_scrollTools_onDrag_expand .mCSB_dragger.mCSB_dragger_onDrag_expanded+.mCSB_draggerRail,
		.mCS-rounded.mCSB_scrollTools_vertical.mCSB_scrollTools_onDrag_expand .mCSB_draggerContainer:hover .mCSB_draggerRail
		{
			width: 4px
		}
		.mCS-rounded-dark.mCSB_scrollTools_horizontal.mCSB_scrollTools_onDrag_expand .mCSB_dragger.mCSB_dragger_onDrag_expanded .mCSB_dragger_bar,
		.mCS-rounded-dark.mCSB_scrollTools_horizontal.mCSB_scrollTools_onDrag_expand .mCSB_draggerContainer:hover .mCSB_dragger .mCSB_dragger_bar,
		.mCS-rounded.mCSB_scrollTools_horizontal.mCSB_scrollTools_onDrag_expand .mCSB_dragger.mCSB_dragger_onDrag_expanded .mCSB_dragger_bar,
		.mCS-rounded.mCSB_scrollTools_horizontal.mCSB_scrollTools_onDrag_expand .mCSB_draggerContainer:hover .mCSB_dragger .mCSB_dragger_bar
		{
			height: 16px;
			width: 16px;
			margin: 0 -1px
		}
		.mCS-rounded-dark.mCSB_scrollTools_horizontal.mCSB_scrollTools_onDrag_expand .mCSB_dragger.mCSB_dragger_onDrag_expanded+.mCSB_draggerRail,
		.mCS-rounded-dark.mCSB_scrollTools_horizontal.mCSB_scrollTools_onDrag_expand .mCSB_draggerContainer:hover .mCSB_draggerRail,
		.mCS-rounded.mCSB_scrollTools_horizontal.mCSB_scrollTools_onDrag_expand .mCSB_dragger.mCSB_dragger_onDrag_expanded+.mCSB_draggerRail,
		.mCS-rounded.mCSB_scrollTools_horizontal.mCSB_scrollTools_onDrag_expand .mCSB_draggerContainer:hover .mCSB_draggerRail
		{
			height: 4px;
			margin: 6px 0
		}
		.mCS-rounded.mCSB_scrollTools .mCSB_buttonUp
		{
			background-position: 0 -72px
		}
		.mCS-rounded.mCSB_scrollTools .mCSB_buttonDown
		{
			background-position: 0 -92px
		}
		.mCS-rounded.mCSB_scrollTools .mCSB_buttonLeft
		{
			background-position: 0 -112px
		}
		.mCS-rounded.mCSB_scrollTools .mCSB_buttonRight
		{
			background-position: 0 -128px
		}
		.mCS-rounded-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-rounded-dots-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .75)
		}
		.mCS-rounded-dark.mCSB_scrollTools .mCSB_draggerRail
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .15)
		}
		.mCS-rounded-dark.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
		.mCS-rounded-dots-dark.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .85)
		}
		.mCS-rounded-dark.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-rounded-dark.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
		.mCS-rounded-dots-dark.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-rounded-dots-dark.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .9)
		}
		.mCS-rounded-dark.mCSB_scrollTools .mCSB_buttonUp
		{
			background-position: -80px -72px
		}
		.mCS-rounded-dark.mCSB_scrollTools .mCSB_buttonDown
		{
			background-position: -80px -92px
		}
		.mCS-rounded-dark.mCSB_scrollTools .mCSB_buttonLeft
		{
			background-position: -80px -112px
		}
		.mCS-rounded-dark.mCSB_scrollTools .mCSB_buttonRight
		{
			background-position: -80px -128px
		}
		.mCS-rounded-dots-dark.mCSB_scrollTools_vertical .mCSB_draggerRail,
		.mCS-rounded-dots.mCSB_scrollTools_vertical .mCSB_draggerRail
		{
			width: 4px
		}
		.mCS-rounded-dots-dark.mCSB_scrollTools .mCSB_draggerRail,
		.mCS-rounded-dots-dark.mCSB_scrollTools_horizontal .mCSB_draggerRail,
		.mCS-rounded-dots.mCSB_scrollTools .mCSB_draggerRail,
		.mCS-rounded-dots.mCSB_scrollTools_horizontal .mCSB_draggerRail
		{
			background-color: transparent;
			background-position: center
		}
		.mCS-rounded-dots-dark.mCSB_scrollTools .mCSB_draggerRail,
		.mCS-rounded-dots.mCSB_scrollTools .mCSB_draggerRail
		{
			background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAANElEQVQYV2NkIAAYiVbw//9/Y6DiM1ANJoyMjGdBbLgJQAX/kU0DKgDLkaQAvxW4HEvQFwCRcxIJK1XznAAAAABJRU5ErkJggg==);
			background-repeat: repeat-y;
			opacity: .3;
			filter: "alpha(opacity=30)";
			-ms-filter: "alpha(opacity=30)"
		}
		.mCS-rounded-dots-dark.mCSB_scrollTools_horizontal .mCSB_draggerRail,
		.mCS-rounded-dots.mCSB_scrollTools_horizontal .mCSB_draggerRail
		{
			height: 4px;
			margin: 6px 0;
			background-repeat: repeat-x
		}
		.mCS-rounded-dots.mCSB_scrollTools .mCSB_buttonUp
		{
			background-position: -16px -72px
		}
		.mCS-rounded-dots.mCSB_scrollTools .mCSB_buttonDown
		{
			background-position: -16px -92px
		}
		.mCS-rounded-dots.mCSB_scrollTools .mCSB_buttonLeft
		{
			background-position: -20px -112px
		}
		.mCS-rounded-dots.mCSB_scrollTools .mCSB_buttonRight
		{
			background-position: -20px -128px
		}
		.mCS-rounded-dots-dark.mCSB_scrollTools .mCSB_draggerRail
		{
			background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAALElEQVQYV2NkIAAYSVFgDFR8BqrBBEifBbGRTfiPZhpYjiQFBK3A6l6CvgAAE9kGCd1mvgEAAAAASUVORK5CYII=)
		}
		.mCS-rounded-dots-dark.mCSB_scrollTools .mCSB_buttonUp
		{
			background-position: -96px -72px
		}
		.mCS-rounded-dots-dark.mCSB_scrollTools .mCSB_buttonDown
		{
			background-position: -96px -92px
		}
		.mCS-rounded-dots-dark.mCSB_scrollTools .mCSB_buttonLeft
		{
			background-position: -100px -112px
		}
		.mCS-rounded-dots-dark.mCSB_scrollTools .mCSB_buttonRight
		{
			background-position: -100px -128px
		}
		.mCS-3d-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-3d-thick-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-3d-thick.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-3d.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			background-repeat: repeat-y;
			background-image: -moz-linear-gradient(left, rgba(255, 255, 255, .5) 0, rgba(255, 255, 255, 0) 100%);
			background-image: -webkit-gradient(linear, left top, right top, color-stop(0, rgba(255, 255, 255, .5)), color-stop(100%, rgba(255, 255, 255, 0)));
			background-image: -webkit-linear-gradient(left, rgba(255, 255, 255, .5) 0, rgba(255, 255, 255, 0) 100%);
			background-image: -o-linear-gradient(left, rgba(255, 255, 255, .5) 0, rgba(255, 255, 255, 0) 100%);
			background-image: -ms-linear-gradient(left, rgba(255, 255, 255, .5) 0, rgba(255, 255, 255, 0) 100%);
			background-image: linear-gradient(to right, rgba(255, 255, 255, .5) 0, rgba(255, 255, 255, 0) 100%)
		}
		.mCS-3d-dark.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
		.mCS-3d-thick-dark.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
		.mCS-3d-thick.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
		.mCS-3d.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar
		{
			background-repeat: repeat-x;
			background-image: -moz-linear-gradient(top, rgba(255, 255, 255, .5) 0, rgba(255, 255, 255, 0) 100%);
			background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgba(255, 255, 255, .5)), color-stop(100%, rgba(255, 255, 255, 0)));
			background-image: -webkit-linear-gradient(top, rgba(255, 255, 255, .5) 0, rgba(255, 255, 255, 0) 100%);
			background-image: -o-linear-gradient(top, rgba(255, 255, 255, .5) 0, rgba(255, 255, 255, 0) 100%);
			background-image: -ms-linear-gradient(top, rgba(255, 255, 255, .5) 0, rgba(255, 255, 255, 0) 100%);
			background-image: linear-gradient(to bottom, rgba(255, 255, 255, .5) 0, rgba(255, 255, 255, 0) 100%)
		}
		.mCS-3d-dark.mCSB_scrollTools_vertical .mCSB_dragger,
		.mCS-3d.mCSB_scrollTools_vertical .mCSB_dragger
		{
			height: 70px
		}
		.mCS-3d-dark.mCSB_scrollTools_horizontal .mCSB_dragger,
		.mCS-3d.mCSB_scrollTools_horizontal .mCSB_dragger
		{
			width: 70px
		}
		.mCS-3d-dark.mCSB_scrollTools,
		.mCS-3d.mCSB_scrollTools
		{
			opacity: 1;
			filter: "alpha(opacity=30)";
			-ms-filter: "alpha(opacity=30)"
		}
		.mCS-3d-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-3d-dark.mCSB_scrollTools .mCSB_draggerRail,
		.mCS-3d.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-3d.mCSB_scrollTools .mCSB_draggerRail
		{
			-webkit-border-radius: 16px;
			-moz-border-radius: 16px;
			border-radius: 16px
		}
		.mCS-3d-dark.mCSB_scrollTools .mCSB_draggerRail,
		.mCS-3d.mCSB_scrollTools .mCSB_draggerRail
		{
			width: 8px;
			background-color: #000;
			background-color: rgba(0, 0, 0, .2);
			box-shadow: inset 1px 0 1px rgba(0, 0, 0, .5), inset -1px 0 1px rgba(255, 255, 255, .2)
		}
		.mCS-3d-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-3d-dark.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-3d-dark.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
		.mCS-3d-dark.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
		.mCS-3d.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-3d.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-3d.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
		.mCS-3d.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar
		{
			background-color: #555
		}
		.mCS-3d-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-3d.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			width: 8px
		}
		.mCS-3d-dark.mCSB_scrollTools_horizontal .mCSB_draggerRail,
		.mCS-3d.mCSB_scrollTools_horizontal .mCSB_draggerRail
		{
			width: 100%;
			height: 8px;
			margin: 4px 0;
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .5), inset 0 -1px 1px rgba(255, 255, 255, .2)
		}
		.mCS-3d-dark.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
		.mCS-3d.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar
		{
			width: 100%;
			height: 8px;
			margin: 4px auto
		}
		.mCS-3d.mCSB_scrollTools .mCSB_buttonUp
		{
			background-position: -32px -72px
		}
		.mCS-3d.mCSB_scrollTools .mCSB_buttonDown
		{
			background-position: -32px -92px
		}
		.mCS-3d.mCSB_scrollTools .mCSB_buttonLeft
		{
			background-position: -40px -112px
		}
		.mCS-3d.mCSB_scrollTools .mCSB_buttonRight
		{
			background-position: -40px -128px
		}
		.mCS-3d-dark.mCSB_scrollTools .mCSB_draggerRail
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .1);
			box-shadow: inset 1px 0 1px rgba(0, 0, 0, .1)
		}
		.mCS-3d-dark.mCSB_scrollTools_horizontal .mCSB_draggerRail
		{
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .1)
		}
		.mCS-3d-dark.mCSB_scrollTools .mCSB_buttonUp
		{
			background-position: -112px -72px
		}
		.mCS-3d-dark.mCSB_scrollTools .mCSB_buttonDown
		{
			background-position: -112px -92px
		}
		.mCS-3d-dark.mCSB_scrollTools .mCSB_buttonLeft
		{
			background-position: -120px -112px
		}
		.mCS-3d-dark.mCSB_scrollTools .mCSB_buttonRight
		{
			background-position: -120px -128px
		}
		.mCS-3d-thick-dark.mCSB_scrollTools,
		.mCS-3d-thick.mCSB_scrollTools
		{
			opacity: 1;
			filter: "alpha(opacity=30)";
			-ms-filter: "alpha(opacity=30)"
		}
		.mCS-3d-thick-dark.mCSB_scrollTools,
		.mCS-3d-thick-dark.mCSB_scrollTools .mCSB_draggerContainer,
		.mCS-3d-thick.mCSB_scrollTools,
		.mCS-3d-thick.mCSB_scrollTools .mCSB_draggerContainer
		{
			-webkit-border-radius: 7px;
			-moz-border-radius: 7px;
			border-radius: 7px
		}
		.mCSB_inside+.mCS-3d-thick-dark.mCSB_scrollTools_vertical,
		.mCSB_inside+.mCS-3d-thick.mCSB_scrollTools_vertical
		{
			right: 1px
		}
		.mCS-3d-thick-dark.mCSB_scrollTools_vertical,
		.mCS-3d-thick.mCSB_scrollTools_vertical
		{
			box-shadow: inset 1px 0 1px rgba(0, 0, 0, .1), inset 0 0 14px rgba(0, 0, 0, .5)
		}
		.mCS-3d-thick-dark.mCSB_scrollTools_horizontal,
		.mCS-3d-thick.mCSB_scrollTools_horizontal
		{
			bottom: 1px;
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .1), inset 0 0 14px rgba(0, 0, 0, .5)
		}
		.mCS-3d-thick-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-3d-thick.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
			box-shadow: inset 1px 0 0 rgba(255, 255, 255, .4);
			width: 12px;
			margin: 2px;
			position: absolute;
			height: auto;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0
		}
		.mCS-3d-thick-dark.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
		.mCS-3d-thick.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar
		{
			box-shadow: inset 0 1px 0 rgba(255, 255, 255, .4);
			height: 12px;
			width: auto
		}
		.mCS-3d-thick.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-3d-thick.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-3d-thick.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
		.mCS-3d-thick.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar
		{
			background-color: #555
		}
		.mCS-3d-thick.mCSB_scrollTools .mCSB_draggerContainer
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .05);
			box-shadow: inset 1px 1px 16px rgba(0, 0, 0, .1)
		}
		.mCS-3d-thick.mCSB_scrollTools .mCSB_draggerRail
		{
			background-color: transparent
		}
		.mCS-3d-thick.mCSB_scrollTools .mCSB_buttonUp
		{
			background-position: -32px -72px
		}
		.mCS-3d-thick.mCSB_scrollTools .mCSB_buttonDown
		{
			background-position: -32px -92px
		}
		.mCS-3d-thick.mCSB_scrollTools .mCSB_buttonLeft
		{
			background-position: -40px -112px
		}
		.mCS-3d-thick.mCSB_scrollTools .mCSB_buttonRight
		{
			background-position: -40px -128px
		}
		.mCS-3d-thick-dark.mCSB_scrollTools
		{
			box-shadow: inset 0 0 14px rgba(0, 0, 0, .2)
		}
		.mCS-3d-thick-dark.mCSB_scrollTools_horizontal
		{
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .1), inset 0 0 14px rgba(0, 0, 0, .2)
		}
		.mCS-3d-thick-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			box-shadow: inset 1px 0 0 rgba(255, 255, 255, .4), inset -1px 0 0 rgba(0, 0, 0, .2)
		}
		.mCS-3d-thick-dark.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar
		{
			box-shadow: inset 0 1px 0 rgba(255, 255, 255, .4), inset 0 -1px 0 rgba(0, 0, 0, .2)
		}
		.mCS-3d-thick-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-3d-thick-dark.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-3d-thick-dark.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
		.mCS-3d-thick-dark.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar
		{
			background-color: #777
		}
		.mCS-3d-thick-dark.mCSB_scrollTools .mCSB_draggerContainer
		{
			background-color: #fff;
			background-color: rgba(0, 0, 0, .05);
			box-shadow: inset 1px 1px 16px rgba(0, 0, 0, .1)
		}
		.mCS-3d-thick-dark.mCSB_scrollTools .mCSB_draggerRail,
		.mCS-minimal-dark.mCSB_scrollTools .mCSB_draggerRail,
		.mCS-minimal.mCSB_scrollTools .mCSB_draggerRail
		{
			background-color: transparent
		}
		.mCS-3d-thick-dark.mCSB_scrollTools .mCSB_buttonUp
		{
			background-position: -112px -72px
		}
		.mCS-3d-thick-dark.mCSB_scrollTools .mCSB_buttonDown
		{
			background-position: -112px -92px
		}
		.mCS-3d-thick-dark.mCSB_scrollTools .mCSB_buttonLeft
		{
			background-position: -120px -112px
		}
		.mCS-3d-thick-dark.mCSB_scrollTools .mCSB_buttonRight
		{
			background-position: -120px -128px
		}
		.mCSB_outside+.mCS-minimal-dark.mCSB_scrollTools_vertical,
		.mCSB_outside+.mCS-minimal.mCSB_scrollTools_vertical
		{
			right: 0;
			margin: 12px 0
		}
		.mCustomScrollBox.mCS-minimal+.mCSB_scrollTools+.mCSB_scrollTools.mCSB_scrollTools_horizontal,
		.mCustomScrollBox.mCS-minimal+.mCSB_scrollTools.mCSB_scrollTools_horizontal,
		.mCustomScrollBox.mCS-minimal-dark+.mCSB_scrollTools+.mCSB_scrollTools.mCSB_scrollTools_horizontal,
		.mCustomScrollBox.mCS-minimal-dark+.mCSB_scrollTools.mCSB_scrollTools_horizontal
		{
			bottom: 0;
			margin: 0 12px
		}
		.mCS-dir-rtl>.mCSB_outside+.mCS-minimal-dark.mCSB_scrollTools_vertical,
		.mCS-dir-rtl>.mCSB_outside+.mCS-minimal.mCSB_scrollTools_vertical
		{
			left: 0;
			right: auto
		}
		.mCS-minimal-dark.mCSB_scrollTools_vertical .mCSB_dragger,
		.mCS-minimal.mCSB_scrollTools_vertical .mCSB_dragger
		{
			height: 50px
		}
		.mCS-minimal-dark.mCSB_scrollTools_horizontal .mCSB_dragger,
		.mCS-minimal.mCSB_scrollTools_horizontal .mCSB_dragger
		{
			width: 50px
		}
		.mCS-minimal.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			background-color: #fff;
			background-color: rgba(255, 255, 255, .2);
			filter: "alpha(opacity=20)";
			-ms-filter: "alpha(opacity=20)"
		}
		.mCS-minimal.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-minimal.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar
		{
			background-color: #fff;
			background-color: rgba(255, 255, 255, .5);
			filter: "alpha(opacity=50)";
			-ms-filter: "alpha(opacity=50)"
		}
		.mCS-minimal-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .2);
			filter: "alpha(opacity=20)";
			-ms-filter: "alpha(opacity=20)"
		}
		.mCS-minimal-dark.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-minimal-dark.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .5);
			filter: "alpha(opacity=50)";
			-ms-filter: "alpha(opacity=50)"
		}
		.mCS-dark-3.mCSB_scrollTools .mCSB_draggerRail,
		.mCS-light-3.mCSB_scrollTools .mCSB_draggerRail
		{
			width: 6px;
			background-color: #000;
			background-color: rgba(0, 0, 0, .2)
		}
		.mCS-dark-3.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-light-3.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			width: 6px
		}
		.mCS-dark-3.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
		.mCS-dark-3.mCSB_scrollTools_horizontal .mCSB_draggerRail,
		.mCS-light-3.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
		.mCS-light-3.mCSB_scrollTools_horizontal .mCSB_draggerRail
		{
			width: 100%;
			height: 6px;
			margin: 5px 0
		}
		.mCS-dark-3.mCSB_scrollTools_vertical.mCSB_scrollTools_onDrag_expand .mCSB_dragger.mCSB_dragger_onDrag_expanded+.mCSB_draggerRail,
		.mCS-dark-3.mCSB_scrollTools_vertical.mCSB_scrollTools_onDrag_expand .mCSB_draggerContainer:hover .mCSB_draggerRail,
		.mCS-light-3.mCSB_scrollTools_vertical.mCSB_scrollTools_onDrag_expand .mCSB_dragger.mCSB_dragger_onDrag_expanded+.mCSB_draggerRail,
		.mCS-light-3.mCSB_scrollTools_vertical.mCSB_scrollTools_onDrag_expand .mCSB_draggerContainer:hover .mCSB_draggerRail
		{
			width: 12px
		}
		.mCS-dark-3.mCSB_scrollTools_horizontal.mCSB_scrollTools_onDrag_expand .mCSB_dragger.mCSB_dragger_onDrag_expanded+.mCSB_draggerRail,
		.mCS-dark-3.mCSB_scrollTools_horizontal.mCSB_scrollTools_onDrag_expand .mCSB_draggerContainer:hover .mCSB_draggerRail,
		.mCS-light-3.mCSB_scrollTools_horizontal.mCSB_scrollTools_onDrag_expand .mCSB_dragger.mCSB_dragger_onDrag_expanded+.mCSB_draggerRail,
		.mCS-light-3.mCSB_scrollTools_horizontal.mCSB_scrollTools_onDrag_expand .mCSB_draggerContainer:hover .mCSB_draggerRail
		{
			height: 12px;
			margin: 2px 0
		}
		.mCS-light-3.mCSB_scrollTools .mCSB_buttonUp
		{
			background-position: -32px -72px
		}
		.mCS-light-3.mCSB_scrollTools .mCSB_buttonDown
		{
			background-position: -32px -92px
		}
		.mCS-light-3.mCSB_scrollTools .mCSB_buttonLeft
		{
			background-position: -40px -112px
		}
		.mCS-light-3.mCSB_scrollTools .mCSB_buttonRight
		{
			background-position: -40px -128px
		}
		.mCS-dark-3.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .75)
		}
		.mCS-dark-3.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .85)
		}
		.mCS-dark-3.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-dark-3.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .9)
		}
		.mCS-dark-3.mCSB_scrollTools .mCSB_draggerRail
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .1)
		}
		.mCS-dark-3.mCSB_scrollTools .mCSB_buttonUp
		{
			background-position: -112px -72px
		}
		.mCS-dark-3.mCSB_scrollTools .mCSB_buttonDown
		{
			background-position: -112px -92px
		}
		.mCS-dark-3.mCSB_scrollTools .mCSB_buttonLeft
		{
			background-position: -120px -112px
		}
		.mCS-dark-3.mCSB_scrollTools .mCSB_buttonRight
		{
			background-position: -120px -128px
		}
		.mCS-inset-2-dark.mCSB_scrollTools .mCSB_draggerRail,
		.mCS-inset-2.mCSB_scrollTools .mCSB_draggerRail,
		.mCS-inset-3-dark.mCSB_scrollTools .mCSB_draggerRail,
		.mCS-inset-3.mCSB_scrollTools .mCSB_draggerRail,
		.mCS-inset-dark.mCSB_scrollTools .mCSB_draggerRail,
		.mCS-inset.mCSB_scrollTools .mCSB_draggerRail
		{
			width: 12px;
			background-color: #000;
			background-color: rgba(0, 0, 0, .2)
		}
		.mCS-inset-2-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-inset-2.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-inset-3-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-inset-3.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-inset-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-inset.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			width: 6px;
			margin: 3px 5px;
			position: absolute;
			height: auto;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0
		}
		.mCS-inset-2-dark.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
		.mCS-inset-2.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
		.mCS-inset-3-dark.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
		.mCS-inset-3.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
		.mCS-inset-dark.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
		.mCS-inset.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar
		{
			height: 6px;
			margin: 5px 3px;
			position: absolute;
			width: auto;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0
		}
		.mCS-inset-2-dark.mCSB_scrollTools_horizontal .mCSB_draggerRail,
		.mCS-inset-2.mCSB_scrollTools_horizontal .mCSB_draggerRail,
		.mCS-inset-3-dark.mCSB_scrollTools_horizontal .mCSB_draggerRail,
		.mCS-inset-3.mCSB_scrollTools_horizontal .mCSB_draggerRail,
		.mCS-inset-dark.mCSB_scrollTools_horizontal .mCSB_draggerRail,
		.mCS-inset.mCSB_scrollTools_horizontal .mCSB_draggerRail
		{
			width: 100%;
			height: 12px;
			margin: 2px 0
		}
		.mCS-inset-2.mCSB_scrollTools .mCSB_buttonUp,
		.mCS-inset-3.mCSB_scrollTools .mCSB_buttonUp,
		.mCS-inset.mCSB_scrollTools .mCSB_buttonUp
		{
			background-position: -32px -72px
		}
		.mCS-inset-2.mCSB_scrollTools .mCSB_buttonDown,
		.mCS-inset-3.mCSB_scrollTools .mCSB_buttonDown,
		.mCS-inset.mCSB_scrollTools .mCSB_buttonDown
		{
			background-position: -32px -92px
		}
		.mCS-inset-2.mCSB_scrollTools .mCSB_buttonLeft,
		.mCS-inset-3.mCSB_scrollTools .mCSB_buttonLeft,
		.mCS-inset.mCSB_scrollTools .mCSB_buttonLeft
		{
			background-position: -40px -112px
		}
		.mCS-inset-2.mCSB_scrollTools .mCSB_buttonRight,
		.mCS-inset-3.mCSB_scrollTools .mCSB_buttonRight,
		.mCS-inset.mCSB_scrollTools .mCSB_buttonRight
		{
			background-position: -40px -128px
		}
		.mCS-inset-2-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-inset-3-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
		.mCS-inset-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .75)
		}
		.mCS-inset-2-dark.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
		.mCS-inset-3-dark.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
		.mCS-inset-dark.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .85)
		}
		.mCS-inset-2-dark.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-inset-2-dark.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
		.mCS-inset-3-dark.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-inset-3-dark.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
		.mCS-inset-dark.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-inset-dark.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .9)
		}
		.mCS-inset-2-dark.mCSB_scrollTools .mCSB_draggerRail,
		.mCS-inset-3-dark.mCSB_scrollTools .mCSB_draggerRail,
		.mCS-inset-dark.mCSB_scrollTools .mCSB_draggerRail
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .1)
		}
		.mCS-inset-2-dark.mCSB_scrollTools .mCSB_buttonUp,
		.mCS-inset-3-dark.mCSB_scrollTools .mCSB_buttonUp,
		.mCS-inset-dark.mCSB_scrollTools .mCSB_buttonUp
		{
			background-position: -112px -72px
		}
		.mCS-inset-2-dark.mCSB_scrollTools .mCSB_buttonDown,
		.mCS-inset-3-dark.mCSB_scrollTools .mCSB_buttonDown,
		.mCS-inset-dark.mCSB_scrollTools .mCSB_buttonDown
		{
			background-position: -112px -92px
		}
		.mCS-inset-2-dark.mCSB_scrollTools .mCSB_buttonLeft,
		.mCS-inset-3-dark.mCSB_scrollTools .mCSB_buttonLeft,
		.mCS-inset-dark.mCSB_scrollTools .mCSB_buttonLeft
		{
			background-position: -120px -112px
		}
		.mCS-inset-2-dark.mCSB_scrollTools .mCSB_buttonRight,
		.mCS-inset-3-dark.mCSB_scrollTools .mCSB_buttonRight,
		.mCS-inset-dark.mCSB_scrollTools .mCSB_buttonRight
		{
			background-position: -120px -128px
		}
		.mCS-inset-2-dark.mCSB_scrollTools .mCSB_draggerRail,
		.mCS-inset-2.mCSB_scrollTools .mCSB_draggerRail
		{
			background-color: transparent;
			border-width: 1px;
			border-style: solid;
			border-color: #fff;
			border-color: rgba(255, 255, 255, .2);
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box
		}
		.mCS-inset-2-dark.mCSB_scrollTools .mCSB_draggerRail
		{
			border-color: #000;
			border-color: rgba(0, 0, 0, .2)
		}
		.mCS-inset-3.mCSB_scrollTools .mCSB_draggerRail
		{
			background-color: #fff;
			background-color: rgba(255, 255, 255, .6)
		}
		.mCS-inset-3-dark.mCSB_scrollTools .mCSB_draggerRail
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .6)
		}
		.mCS-inset-3.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .75)
		}
		.mCS-inset-3.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .85)
		}
		.mCS-inset-3.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-inset-3.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar
		{
			background-color: #000;
			background-color: rgba(0, 0, 0, .9)
		}
		.mCS-inset-3-dark.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar
		{
			background-color: #fff;
			background-color: rgba(255, 255, 255, .75)
		}
		.mCS-inset-3-dark.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar
		{
			background-color: #fff;
			background-color: rgba(255, 255, 255, .85)
		}
		.mCS-inset-3-dark.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar,
		.mCS-inset-3-dark.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar
		{
			background-color: #fff;
			background-color: rgba(255, 255, 255, .9)
		}
</style>
