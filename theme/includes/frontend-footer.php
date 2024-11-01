<?php
/**
 * This file contains javascript code for frontend.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/theme/includes
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly.
?>
<script src="<?php echo esc_attr( site_url() ) . '/' . WPINC . '/js/jquery/jquery.js';// @codingStandardsIgnoreLine. ?>"></script>
<script src="<?php echo esc_attr( plugins_url( 'js/custom.js', dirname( __FILE__ ) ) );// @codingStandardsIgnoreLine. ?>"></script>
<script src="<?php echo esc_attr( plugins_url( 'js/velocity.min.js', dirname( __FILE__ ) ) );// @codingStandardsIgnoreLine. ?>"></script>
<script src="<?php echo esc_attr( plugins_url( 'js/jquery.mcustomscrollbar.js', dirname( __FILE__ ) ) );// @codingStandardsIgnoreLine. ?>"></script>
<script src="<?php echo esc_attr( plugins_url( 'js/dialogfx.js', dirname( __FILE__ ) ) );// @codingStandardsIgnoreLine. ?>"></script>
<script src="<?php echo esc_attr( plugins_url( 'js/main.js', dirname( __FILE__ ) ) );// @codingStandardsIgnoreLine. ?>"></script>
<script type="text/javascript">
	Hex2RGB = function (hex)
	{
		if (hex.lastIndexOf('#') > -1)
		{
			hex = hex.replace(/#/, '0x');
		} else
		{
			hex = '0x' + hex;
		}
		var r = hex >> 16;
		var g = (hex & 0x00FF00) >> 8;
		var b = hex & 0x0000FF;
		return [r, g, b];
	};
	if (typeof (base64_encode) !== "function")
	{
		function base64_encode(data)
		{
			var b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
			var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
			ac = 0,
			enc = '',
			tmp_arr = [];
			if (!data)
			{
				return data;
			}
			do
			{
				o1 = data.charCodeAt(i++);
				o2 = data.charCodeAt(i++);
				o3 = data.charCodeAt(i++);
				bits = o1 << 16 | o2 << 8 | o3;
				h1 = bits >> 18 & 0x3f;
				h2 = bits >> 12 & 0x3f;
				h3 = bits >> 6 & 0x3f;
				h4 = bits & 0x3f;
				tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
			} while (i < data.length);
			enc = tmp_arr.join('');
			var r = data.length % 3;
			return (r ? enc.slice(0, r - 3) : enc) + '==='.slice(r || 3);
		}
	}
	var rbg_contact = Hex2RGB("<?php echo esc_attr( $meta_unserialized_data['contact_background_color'] ); ?>");
	var contact_opacity = "rgba(" + rbg_contact + "," + "<?php echo ( esc_attr( $meta_unserialized_data['contact_background_color_opacity'] ) ) / 100; ?>" + ")";
	jQuery("#right-side").css('background-color', contact_opacity);
</script>
<?php
if ( 'show' === $meta_data_array['countdown_timer'] ) {
	?>
	<script src="<?php echo esc_attr( plugins_url( 'js/jquery.countdown.js', dirname( __FILE__ ) ) );// @codingStandardsIgnoreLine. ?>"></script>
	<script>
		<?php
		$current_offset = get_option( 'gmt_offset' ) * 60 * 60;
		?>
		var timezone = "<?php echo intval( $current_offset ); ?>";
		var db_timestamp = "<?php echo intval( $time_stamp ); ?>";
		var now_timestamp = "<?php echo esc_attr( COMING_SOON_BOOSTER_LOCAL_TIME ); ?>";
		var db_timestamp_timezone = parseInt(db_timestamp) - parseInt(timezone);
		var difftimezone = db_timestamp_timezone + "000" - now_timestamp;
		var diff = parseInt(now_timestamp) + parseInt(difftimezone);
		var months = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"];
		var currentdate = new Date(diff);
		var datetime = currentdate.getFullYear() + "/" + months[currentdate.getMonth()] + "/" + currentdate.getDate() + " " + currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();
		var endDate = datetime;
		jQuery("#getting-started")
			.countdown(endDate, function (event)
			{
				jQuery(this).text(
				event.strftime('%D Days %Hh %Mm %Ss')
			);
		});
	</script>
	<?php
}
switch ( $meta_data_array['background_type'] ) {
	case 'color':
		if ( 'enable' === $meta_data_array['animation'] ) {
			?>
			<script>
				var background_color = "<?php echo esc_attr( $meta_data_array['background_color'] ); ?>";
			</script>
			<?php
			switch ( esc_attr( $meta_data_array['animation_type_background'] ) ) {
				case 'bubbles':
					?>
					<script src="<?php echo plugins_url( 'js/bubble.js', dirname( __FILE__ ) );// @codingStandardsIgnoreLine. ?>"></script>
					<?php
					break;
				case 'constellation':
					?>
					<script src="<?php echo plugins_url( 'js/constellation.js', dirname( __FILE__ ) );// @codingStandardsIgnoreLine. ?>"></script>
					<?php
					break;
				case 'particles':
					?>
					<script src="<?php echo plugins_url( 'js/particles.js', dirname( __FILE__ ) );// @codingStandardsIgnoreLine. ?>"></script>
					<?php
					break;
				case 'winter':
					?>
					<script src="<?php echo plugins_url( 'js/winter.js', dirname( __FILE__ ) );// @codingStandardsIgnoreLine. ?>"></script>
					<?php
					break;
				case 'fss':
					?>
					<script>
						var ambient_value = '#FF1D4D'; // ambient color
						var diffuse_value = '#2B2D35'; // diffuse color
					</script>
					<script src="<?php echo plugins_url( 'js/fss.js', dirname( __FILE__ ) );// @codingStandardsIgnoreLine ?>"></script>
					<script src="<?php echo plugins_url( 'js/custom-fss.js', dirname( __FILE__ ) );// @codingStandardsIgnoreLine ?>"></script>
					<style>
					canvas
					{
						position: fixed;
						top: 0;
						left: 0;
					}
					</style>
					<?php
					break;
			}
		}
		break;
}
?>
<script src="<?php echo plugins_url( 'assets/global/plugins/validation/jquery.validate.js', dirname( dirname( __FILE__ ) ) );// @codingStandardsIgnoreLine. ?>"></script>
<?php
if ( ! function_exists( 'validate_ip_coming_soon_booster' ) ) {
	/**
	 * This function is used for validating ip address.
	 *
	 * @param string $ip_original .
	 */
	function validate_ip_coming_soon_booster( $ip_original ) {
		if ( strtolower( $ip_original ) === 'unknown' ) {
			return false;
		}
		$ip = ip2long( $ip_original );

		if ( false !== $ip && -1 !== $ip ) {
			$ip = sprintf( '%u', $ip );

			if ( $ip >= 0 && $ip <= 50331647 ) {
				return false;
			}
			if ( $ip >= 167772160 && $ip <= 184549375 ) {
				return false;
			}
			if ( $ip >= 2130706432 && $ip <= 2147483647 ) {
				return false;
			}
			if ( $ip >= 2851995648 && $ip <= 2852061183 ) {
				return false;
			}
			if ( $ip >= 2886729728 && $ip <= 2887778303 ) {
				return false;
			}
			if ( $ip >= 3221225984 && $ip <= 3221226239 ) {
				return false;
			}
			if ( $ip >= 3232235520 && $ip <= 3232301055 ) {
				return false;
			}
			if ( $ip >= 4294967040 ) {
				return false;
			}
		}
		return true;
	}
}
/**
 * This function is used for getIpAddress.
 */
function get_ip_address_coming_soon_booster() {
	static $ip = null;
	if ( isset( $ip ) ) {
		return $ip;
	}
	global $wpdb;
	$data                = $wpdb->get_var(
		$wpdb->prepare(
			'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key=%s', 'other_settings_data'
		)
	);// WPCS: db call ok; no-cache ok.
	$other_settings_data = maybe_unserialize( $data );

	switch ( $other_settings_data['ip_address_fetching_method'] ) {
		case 'REMOTE_ADDR':
			if ( isset( $_SERVER['REMOTE_ADDR'] ) ) {// @codingStandardsIgnoreLine.
				if ( ! empty( $_SERVER['REMOTE_ADDR'] ) && validate_ip_coming_soon_booster( $_SERVER['REMOTE_ADDR'] ) ) {// @codingStandardsIgnoreLine.
					$ip = $_SERVER['REMOTE_ADDR'];// @codingStandardsIgnoreLine.
					return $ip;
				}
			}
			break;

		case 'HTTP_X_FORWARDED_FOR':
			if ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) && ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {// @codingStandardsIgnoreLine.
				if ( strpos( $_SERVER['HTTP_X_FORWARDED_FOR'], ',' ) !== false ) {// @codingStandardsIgnoreLine.
					$iplist = explode( ',', $_SERVER['HTTP_X_FORWARDED_FOR'] );// @codingStandardsIgnoreLine.
					foreach ( $iplist as $ip_address ) {
						if ( validate_ip_coming_soon_booster( $ip_address ) ) {
							$ip = $ip_address;
							return $ip;
						}
					}
				} else {
					if ( validate_ip_coming_soon_booster( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {// @codingStandardsIgnoreLine.
						$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];// @codingStandardsIgnoreLine.
						return $ip;
					}
				}
			}
			break;
		case 'HTTP_X_REAL_IP':
			if ( isset( $_SERVER['HTTP_X_REAL_IP'] ) ) {// @codingStandardsIgnoreLine.
				if ( ! empty( $_SERVER['HTTP_X_REAL_IP'] ) && validate_ip_coming_soon_booster( $_SERVER['HTTP_X_REAL_IP'] ) ) {// @codingStandardsIgnoreLine.
					$ip = $_SERVER['HTTP_X_REAL_IP'];// @codingStandardsIgnoreLine.
					return $ip;
				}
			}
			break;

		case 'HTTP_CF_CONNECTING_IP':
			if ( isset( $_SERVER['HTTP_CF_CONNECTING_IP'] ) ) {// @codingStandardsIgnoreLine.
				if ( ! empty( $_SERVER['HTTP_CF_CONNECTING_IP'] ) && validate_ip_coming_soon_booster( $_SERVER['HTTP_CF_CONNECTING_IP'] ) ) {// @codingStandardsIgnoreLine.
					$ip = $_SERVER['HTTP_CF_CONNECTING_IP'];// @codingStandardsIgnoreLine.
					return $ip;
				}
			}
			break;

		default:
			if ( isset( $_SERVER['HTTP_CLIENT_IP'] ) ) {// @codingStandardsIgnoreLine.
				if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) && validate_ip_coming_soon_booster( $_SERVER['HTTP_CLIENT_IP'] ) ) {// @codingStandardsIgnoreLine.
					$ip = $_SERVER['HTTP_CLIENT_IP'];// @codingStandardsIgnoreLine.
					return $ip;
				}
			}
			if ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) && ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {// @codingStandardsIgnoreLine.
				if ( strpos( $_SERVER['HTTP_X_FORWARDED_FOR'], ',' ) !== false ) {// @codingStandardsIgnoreLine.
					$iplist = explode( ',', $_SERVER['HTTP_X_FORWARDED_FOR'] );// @codingStandardsIgnoreLine.
					foreach ( $iplist as $ip_address ) {
						if ( validate_ip_coming_soon_booster( $ip_address ) ) {
							$ip = $ip_address;
							return $ip;
						}
					}
				} else {
					if ( validate_ip_coming_soon_booster( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {// @codingStandardsIgnoreLine.
						$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];// @codingStandardsIgnoreLine.
						return $ip;
					}
				}
			}
			if ( isset( $_SERVER['HTTP_X_FORWARDED'] ) ) {// @codingStandardsIgnoreLine.
				if ( ! empty( $_SERVER['HTTP_X_FORWARDED'] ) && validate_ip_coming_soon_booster( $_SERVER['HTTP_X_FORWARDED'] ) ) {// @codingStandardsIgnoreLine.
					$ip = $_SERVER['HTTP_X_FORWARDED'];// @codingStandardsIgnoreLine.
					return $ip;
				}
			}
			if ( isset( $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'] ) ) {// @codingStandardsIgnoreLine.
				if ( ! empty( $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'] ) && validate_ip_coming_soon_booster( $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'] ) ) {// @codingStandardsIgnoreLine.
					$ip = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];// @codingStandardsIgnoreLine.
					return $ip;
				}
			}
			if ( isset( $_SERVER['HTTP_FORWARDED_FOR'] ) ) {// @codingStandardsIgnoreLine.
				if ( ! empty( $_SERVER['HTTP_FORWARDED_FOR'] ) && validate_ip_coming_soon_booster( $_SERVER['HTTP_FORWARDED_FOR'] ) ) {// @codingStandardsIgnoreLine.
					$ip = $_SERVER['HTTP_FORWARDED_FOR'];// @codingStandardsIgnoreLine.
					return $ip;
				}
			}
			if ( isset( $_SERVER['HTTP_FORWARDED'] ) ) {// @codingStandardsIgnoreLine.
				if ( ! empty( $_SERVER['HTTP_FORWARDED'] ) && validate_ip_coming_soon_booster( $_SERVER['HTTP_FORWARDED'] ) ) {// @codingStandardsIgnoreLine.
					$ip = $_SERVER['HTTP_FORWARDED'];// @codingStandardsIgnoreLine.
					return $ip;
				}
			}
			if ( isset( $_SERVER['REMOTE_ADDR'] ) ) {// @codingStandardsIgnoreLine.
				if ( ! empty( $_SERVER['REMOTE_ADDR'] ) && validate_ip_coming_soon_booster( $_SERVER['REMOTE_ADDR'] ) ) {// @codingStandardsIgnoreLine.
					$ip = $_SERVER['REMOTE_ADDR'];// @codingStandardsIgnoreLine.
					return $ip;
				}
			}
			break;
	}
	return '0.0.0.0';
}
/**
 * This function is used to get ip location.
 *
 * @param string $ip_address .
 */
 function get_ip_location_coming_soon_booster( $ip_address ) {
 	global $wpdb;
 	$core_data = '{"ip":"0.0.0.0","country_code":"","country_name":"","region_code":"","region_name":"","city":"","latitude":0,"longitude":0}';
 	$ip_location_meta_value         = $wpdb->get_row(
 		$wpdb->prepare(
 			'SELECT * FROM ' . $wpdb->prefix . 'coming_soon_booster_ip_locations WHERE ip=%s', $ip_address
 		)
 	);// WPCS: db call ok, no-cache ok.
 	if ( '' != $ip_location_meta_value ) {
 		return $ip_location_meta_value;
 	} else {
 		$api_call  = esc_attr( TECH_BANKER_SERVICES_URL ) . '/api-server/getipaddress.php?ip_address=' . $ip_address;
 		if ( ! function_exists( 'curl_init' ) ) {
 			$json_data = @file_get_contents( $api_call );// @codingStandardsIgnoreLine.
 		} else {
 			$ch = curl_init();// @codingStandardsIgnoreLine.
 			curl_setopt( $ch, CURLOPT_URL, $api_call );// @codingStandardsIgnoreLine.
 			curl_setopt( $ch, CURLOPT_HTTPHEADER, array( 'Accept: application/json' ) );// @codingStandardsIgnoreLine.
 			curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 5 );// @codingStandardsIgnoreLine.
 			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );// @codingStandardsIgnoreLine.
 			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );// @codingStandardsIgnoreLine.
 			$json_data = curl_exec( $ch );// @codingStandardsIgnoreLine.
 		}
 		$ip_location_array = json_decode( $json_data ) == false ? json_decode( $core_data ) : json_decode( $json_data );// WPCS: loose comparison ok.
		if ( '' != $ip_location_array ) {
	 		$ip_location_array_data                 = array();
	 		$ip_location_array_data['ip']           = $ip_location_array->ip;
	 		$ip_location_array_data['country_code'] = $ip_location_array->country_code;
	 		$ip_location_array_data['country_name'] = $ip_location_array->country_name;
	 		$ip_location_array_data['region_code']  = $ip_location_array->region_code;
	 		$ip_location_array_data['region_name']  = $ip_location_array->region_name;
	 		$ip_location_array_data['city']         = $ip_location_array->city;
	 		$ip_location_array_data['latitude']     = $ip_location_array->latitude;
	 		$ip_location_array_data['longitude']    = $ip_location_array->longitude;

	 		$wpdb->insert( coming_soon_booster_ip_locations(), $ip_location_array_data );
		}
 		return json_decode( $json_data ) == false ? json_decode( $core_data ) : json_decode( $json_data );// WPCS: loose comparison ok.
 	}
 }
$ip_address = get_ip_address_coming_soon_booster();
$ip         = '::1' === $ip_address ? '0.0.0.0' : $ip_address;
$location   = get_ip_location_coming_soon_booster( $ip );
$place      = '' == $location->country_name && '' == $location->city ? '' : '' == $location->country_name ? '' : '' == $location->city ? $location->country_name : $location->city . ', ' . $location->country_name; // WPCS: loose comparison ok.
?>
<script type="text/javascript">

	function valid_email_address(object)
	{
		var atpos = object.value.indexOf("@");
		var dotpos = object.value.lastIndexOf(".");
		if (atpos > 0 && dotpos > atpos + 1 && dotpos + 2 < object.value.length)
		{
			jQuery(".block-message").removeClass("show-block-error");
		}
	}
	jQuery("#ux_li_notifyme").click(function ()
	{
		jQuery(".block-message").css("display", "none");
	});
	var ajaxurl = "<?php echo esc_attr( admin_url( 'admin-ajax.php' ) ); ?>";
	jQuery("#ux_frm_coming_soon_mode_subscription").validate
	({
		rules:
		{
			ux_txt_email_address:
			{
				required: true,
				email: true
			}
		},
	errorPlacement: function (error)
		{
			jQuery("#ux_txt_email_address_success").css("display", "none");
			jQuery(".block-message").css("display", "block");
			jQuery("#ux_txt_email_address_error").css("display", "block");
			if (error.text() === "This field is required.")
			{
				if (jQuery("#ux_txt_email_address_error").is(":visible"))
				{
					jQuery("#ux_txt_email_address_error").html("<p>This field is required</p>");
					jQuery(".block-message").css('background-color', "");
					var rbg_error = Hex2RGB("<?php echo esc_attr( $meta_unserialized_data['backgroud_color_error_subscription'] ); ?>");
					var error_opacity = "rgba(" + rbg_error + "," + "<?php echo ( esc_attr( $meta_unserialized_data['color_opacity_error_subscription'] ) ) / 100; ?>" + ")";
					jQuery(".block-message").css('background-color', error_opacity);
				}
				jQuery(".block-message").addClass("show-block-error").removeClass("show-block-valid");
			} else
			{
				if (jQuery("#ux_txt_email_address_error").is(":visible"))
				{
					jQuery(".block-message").css('background-color', "");
					var rbg_error = Hex2RGB("<?php echo esc_attr( $meta_unserialized_data['backgroud_color_error_subscription'] ); ?>");
					var error_opacity = "rgba(" + rbg_error + "," + "<?php echo ( esc_attr( $meta_unserialized_data['color_opacity_error_subscription'] ) ) / 100; ?>" + ")";
					jQuery(".block-message").css('background-color', error_opacity);
				}
				jQuery(".block-message").addClass("show-block-error").removeClass("show-block-valid");
			}
		},
		submitHandler: function ()
		{
			jQuery("#ux_txt_email_address_error").css("display", "none");
			var gdpr_compliance_data = "<?php echo isset( $other_settings_unserialized_data['gdpr_compliance'] ) ? esc_attr( $other_settings_unserialized_data['gdpr_compliance'] ) : 'enable'; ?>";
			if(jQuery("#ux_chk_gdpr_compliance_subscribe_form").prop("checked") === false && gdpr_compliance_data === 'enable')
			{
				jQuery("#ux_chk_validation_gdpr_subscribe_form_coming_soon_booster").css({"display":'','color':'red'});
				jQuery("#gdpr_agree_text_subscribe_form_coming_soon_booster").css('color','red');
			}
			else {
				jQuery("#ux_chk_validation_gdpr_subscribe_form_coming_soon_booster").css('display','none');
				jQuery("#gdpr_agree_text_subscribe_form_coming_soon_booster").css('color','#ddd').addClass('subscription-label-coming-soon-booster');
				jQuery(".block-message").css("display", "block");
				jQuery("#ux_txt_email_address_success").css("display", "block");
				if (jQuery("#ux_txt_email_address_success").is(":visible"))
				{
					jQuery(".block-message").css('background-color', "");
					var rbg_show = Hex2RGB("<?php echo esc_attr( $meta_unserialized_data['backgroud_color_success_subscription'] ); ?>");
					var show_opacity = "rgba(" + rbg_show + "," + "<?php echo ( esc_attr( $meta_unserialized_data['color_opacity_success_subscription'] ) ) / 100; ?>" + ")";
					jQuery(".block-message").css('background-color', show_opacity);
				}
				jQuery(".block-message").addClass("show-block-valid").removeClass("show-block-error");
				jQuery.post(ajaxurl,
				{
					ip_address: "<?php echo $ip;// WPCS: XSS ok. ?>",
					location: "<?php echo $place;// WPCS: XSS ok. ?>",
					data: base64_encode(jQuery("#ux_frm_coming_soon_mode_subscription").serialize()),
					param: "coming_soon_booster_coming_soon_mode_subscription",
					action: "coming_soon_booster_frontend",
					_wp_nonce: "<?php echo isset( $csb_subscription ) ? esc_attr( $csb_subscription ) : ''; ?>"
				},
				function ()
				{
					jQuery("#ux_txt_email_address_success").css("display", "block");
					setTimeout(function ()
					{
						window.location.href = "<?php echo isset( $_REQUEST['live_preview_page'] ) ? esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ) : esc_attr( site_url() );// WPCS: CSRF ok, input var ok. ?>";
						jQuery("body").append("<div id=\"loading-coming-soon-booster\"><div id=\"preloader\"><span></span><span></span></div></div>");
					}, 3000);
				});
			}
		}
	});
	jQuery("#contact-form").validate
	({
		rules:
		{
			ux_txt_name_contact_form:
			{
				required: true
			},
			ux_txt_email_contact_form:
			{
				required: true,
				email: true
			},
			ux_txt_message_contact_form:
			{
				required: true,
				minlength: 20
			}
		},
		submitHandler: function ()
		{
			var gdpr_compliance_data = "<?php echo isset( $other_settings_unserialized_data['gdpr_compliance'] ) ? esc_attr( $other_settings_unserialized_data['gdpr_compliance'] ) : 'enable'; ?>";
			if(jQuery("#ux_chk_gdpr_compliance_contact_form").prop("checked") === false && gdpr_compliance_data === 'enable')
			{
				jQuery("#ux_chk_validation_gdpr_contact_form_coming_soon_booster").css({"display":'','color':'red'});
				jQuery("#gdpr_agree_text_contact_form_coming_soon_booster").css('color','red');
			}
			else {
				jQuery("#ux_chk_validation_gdpr_contact_form_coming_soon_booster").css('display','none');
				jQuery("#gdpr_agree_text_contact_form_coming_soon_booster").css('color','#ddd').addClass('contact-label-coming-soon-booster');
				jQuery.post(ajaxurl,
				{
					ip_address: "<?php echo $ip;// WPCS: XSS ok. ?>",
					location: "<?php echo $place;// WPCS: XSS ok. ?>",
					data: base64_encode(jQuery("#contact-form").serialize()),
					param: "coming_soon_booster_coming_soon_mode_contact_form",
					action: "coming_soon_booster_frontend",
					_wp_nonce: "<?php echo isset( $csb_contact_data ) ? esc_attr( $csb_contact_data ) : ''; ?>"
				},
				function ()
				{
					jQuery("#ux_txt_contact_success_message").css("display", "block");
					setTimeout(function ()
					{
						window.location.href = "<?php echo isset( $_REQUEST['live_preview_page'] ) ? esc_attr( admin_url( 'admin.php?live_preview_page=true' ) ) : esc_attr( site_url() );// WPCS: CSRF ok, input var ok. ?>";
						jQuery("body").append("<div id=\"loading-coming-soon-booster\"><div id=\"preloader\"><span></span><span></span></div></div>");
					}, 3000);
				});
			}
		}
	});
</script>
<?php echo $meta_unserialized_data['tracking_code'];// WPCS: XSS ok. ?>
