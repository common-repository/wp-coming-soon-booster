<?php
/**
 * This file is used for sending emails from frontend.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/theme/lib
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly.
if ( ! class_exists( 'Dbhelper_Coming_Soon_Mode' ) ) {
	/**
	 * This class is used to perform operations.
	 *
	 * @package    wp-coming-soon-booster
	 * @subpackage theme/lib
	 *
	 * @author  Tech Banker
	 */
	class Dbhelper_Coming_Soon_Mode {
		/**
		 * This Function is used for Insert data in database.
		 *
		 * @param string $table_name passes parameter as tablename.
		 * @param string $data passes parameter as data.
		 */
		public function insert_command( $table_name, $data ) {
			global $wpdb;
			$wpdb->insert( $table_name, $data );// WPCS: db call ok.
			return $wpdb->insert_id;
		}
	}
}
if ( isset( $_REQUEST['param'] ) ) {// WPCS: input var ok.
	$obj_dbhelper_coming_soon_mode = new Dbhelper_Coming_Soon_Mode();
	switch ( sanitize_text_field( wp_unslash( $_REQUEST['param'] ) ) ) {// WPCS: input var ok, CSRF ok.
		case 'coming_soon_booster_coming_soon_mode_subscription':
			if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_subscription' ) ) {// WPCS: input var ok.
				parse_str( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '', $form_data );// WPCS: input var ok.
				$date_time = date_i18n( 'd M Y h:i A' );
				$timestamp = strtotime( $date_time );

				$insert_array              = array();
				$insert_array['parent_id'] = 0;
				$insert_array['type']      = 'subscriber';
				$last_id                   = $obj_dbhelper_coming_soon_mode->insert_command( coming_soon_booster(), $insert_array );

				$insert_subscription_data_array                  = array();
				$insert_subscription_data_array['email_address'] = sanitize_text_field( $form_data['ux_txt_email_address'] );
				$insert_subscription_data_array['date_time']     = $timestamp;
				$insert_subscription_data_array['ip_address']    = isset( $_REQUEST['ip_address'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['ip_address'] ) ) : '';// WPCS: input var ok.
				$insert_subscription_data_array['location']      = isset( $_REQUEST['location'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['location'] ) ) : '';// WPCS: input var ok.

				$insert_serialize               = array();
				$insert_serialize['meta_id']    = $last_id;
				$insert_serialize['meta_key']   = 'subscriber_data';// WPCS: slow query ok.
				$insert_serialize['meta_value'] = maybe_serialize( $insert_subscription_data_array );// WPCS: slow query ok.
				$obj_dbhelper_coming_soon_mode->insert_command( coming_soon_booster_meta(), $insert_serialize );

				$array_email = array( 'template_for_admin_notification_subscription', 'template_for_client_notification_subscription' );
				if ( isset( $array_email ) && count( $array_email ) > 0 ) {
					foreach ( $array_email as $email_template_key ) {
						$email_template = $wpdb->get_var(
							$wpdb->prepare(
								'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s', $email_template_key
							)
						);// WPCS: db call ok, cache ok.

						$email_template_data = maybe_unserialize( $email_template );
						$ip                  = $insert_subscription_data_array['ip_address'];
						$country             = $insert_subscription_data_array['location'];
						if ( '' === $country ) {
							$country = 'N/A';
						}
						$useremail = $insert_subscription_data_array['email_address'];
						if ( 'template_for_admin_notification_subscription' === $email_template_key ) {
							$to = $email_template_data['subscription_email_send_to'];
						} else {
							$to = sanitize_text_field( $form_data['ux_txt_email_address'] );
						}
						$subject            = $email_template_data['subscription_email_subject'];
						$message            = '<div style="font-family: Calibri;">';
						$message           .= $email_template_data['subscription_email_message'];
						$message           .= '</div>';
						$replace_url        = str_replace( '[website_url]', site_url(), $message );
						$replace_date_time  = str_replace( '[date_time]', $date_time, $replace_url );
						$replace_ip_address = str_replace( '[ip_address]', $ip, $replace_date_time );
						$replace_resource   = str_replace( '[resource]', isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( filter_input( INPUT_SERVER, 'REQUEST_URI' ) ) : '', $replace_ip_address );// WPCS: input var ok.
						$replace_useremail  = str_replace( '[useremail]', $useremail, $replace_resource );
						$replace_site_url   = str_replace( '[site_url]', site_url(), $replace_useremail );
						$replace_country    = str_replace( '[country]', $country, $replace_site_url );
						$email_cc           = $email_template_data['subscription_email_cc'];
						$email_bcc          = $email_template_data['subscription_email_bcc'];
						$headers            = '';
						$headers           .= 'Content-Type: text/html; charset= utf-8' . "\r\n";
						if ( '' !== $email_cc ) {
							$headers .= 'Cc: ' . $email_cc . "\r\n";
						}
						if ( '' !== $email_bcc ) {
							$headers .= 'Bcc: ' . $email_bcc . "\r\n";
						}
						wp_mail( $to, $subject, $replace_country, $headers );
					}
				}
			}
			break;

		case 'coming_soon_booster_coming_soon_mode_contact_form':
			if ( wp_verify_nonce( isset( $_REQUEST['_wp_nonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wp_nonce'] ) ) : '', 'coming_soon_booster_contact_data' ) ) {// WPCS: input var ok.
				parse_str( ( isset( $_REQUEST['data'] ) ? base64_decode( wp_unslash( filter_input( INPUT_POST, 'data' ) ) ) : '' ), $contact_insert_data );// WPCS: input var ok.
				$date_time = date_i18n( 'd M Y h:i A' );
				$timestamp = strtotime( $date_time );

				$insert_data_array              = array();
				$insert_data_array['parent_id'] = 0;
				$insert_data_array['type']      = 'contact_form_data';
				$last_id                        = $obj_dbhelper_coming_soon_mode->insert_command( coming_soon_booster(), $insert_data_array );

				$insert_contact_form_data_array                  = array();
				$insert_contact_form_data_array['name']          = sanitize_text_field( $contact_insert_data['ux_txt_name_contact_form'] );
				$insert_contact_form_data_array['email_address'] = sanitize_text_field( $contact_insert_data['ux_txt_email_contact_form'] );
				$insert_contact_form_data_array['email_subject'] = sanitize_text_field( $contact_insert_data['ux_txt_subject_contact_form'] );
				$insert_contact_form_data_array['message']       = sanitize_text_field( $contact_insert_data['ux_txt_message_contact_form'] );
				$insert_contact_form_data_array['date_time']     = $timestamp;
				$insert_contact_form_data_array['ip_address']    = isset( $_REQUEST['ip_address'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['ip_address'] ) ) : '';// WPCS: input var ok.
				$insert_contact_form_data_array['location']      = isset( $_REQUEST['location'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['location'] ) ) : '';// WPCS: input var ok.

				$insert_form_array_serialize               = array();
				$insert_form_array_serialize['meta_id']    = $last_id;
				$insert_form_array_serialize['meta_key']   = 'contact_form_data_values';// WPCS: slow query ok.
				$insert_form_array_serialize['meta_value'] = maybe_serialize( $insert_contact_form_data_array );// WPCS: slow query ok.
				$obj_dbhelper_coming_soon_mode->insert_command( coming_soon_booster_meta(), $insert_form_array_serialize );

				$array_email = array( 'template_for_admin_notification', 'template_for_client_notification' );
				if ( isset( $array_email ) && count( $array_email ) > 0 ) {
					foreach ( $array_email as $email_template_key ) {
						$email_template      = $wpdb->get_var(
							$wpdb->prepare(
								'SELECT meta_value FROM ' . $wpdb->prefix . 'coming_soon_booster_meta WHERE meta_key = %s', $email_template_key
							)
						);// WPCS: db call ok, cache ok.
						$email_template_data = maybe_unserialize( $email_template );

						$ip       = $insert_contact_form_data_array['ip_address'];
						$email    = $insert_contact_form_data_array['email_address'];
						$username = $insert_contact_form_data_array['name'];
						$country  = $insert_contact_form_data_array['location'];
						if ( '' === $country ) {
							$country = 'N/A';
						}
						if ( 'template_for_admin_notification' === $email_template_key ) {
							$to      = $email_template_data['email_send_to'];
							$subject = htmlspecialchars_decode( sanitize_text_field( $contact_insert_data['ux_txt_subject_contact_form'] ) );
						} else {
							$to      = sanitize_text_field( $contact_insert_data['ux_txt_email_contact_form'] );
							$subject = htmlspecialchars_decode( sanitize_text_field( $email_template_data['email_subject'] ) );
						}

						$message  = '<div style="font-family: Calibri;">';
						$message .= $email_template_data['email_message'];
						$message .= '</div>';

						$comments           = $insert_contact_form_data_array['message'];
						$replace_url        = str_replace( '[website_url]', site_url(), $message );
						$replace_date_time  = str_replace( '[date_time]', $date_time, $replace_url );
						$replace_ip_address = str_replace( '[ip_address]', $ip, $replace_date_time );
						$replace_resource   = str_replace( '[resource]', isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( filter_input( INPUT_SERVER, 'REQUEST_URI' ) ) : '', $replace_ip_address );// WPCS: input var ok.
						$replace_comments   = str_replace( '[comments]', $comments, $replace_resource );
						$replace_username   = str_replace( '[username]', $username, $replace_comments );
						$replace_user_email = str_replace( '[email]', $email, $replace_username );
						$replace_site_url   = str_replace( '[site_url]', site_url(), $replace_user_email );
						$replace_country    = str_replace( '[country]', $country, $replace_site_url );
						$email_cc           = $email_template_data['email_cc'];
						$email_bcc          = $email_template_data['email_bcc'];
						$headers            = '';
						$headers           .= 'Content-Type: text/html; charset= utf-8' . "\r\n";
						if ( '' !== $email_cc ) {
							$headers .= 'Cc: ' . $email_cc . "\r\n";
						}
						if ( '' !== $email_bcc ) {
							$headers .= 'Bcc: ' . $email_bcc . "\r\n";
						}
						wp_mail( $to, $subject, $replace_country, $headers );
					}
				}
			}
			break;
	}
	die();
}
