<?php
/**
 * This file contains javascript code.
 *
 * @author  Tech Banker
 * @package wp-coming-soon-booster/includes
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly.
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
	} else {
		?>
		</div>
		</div>
		</div>
		<script type="text/javascript">
		jQuery("li > a").parents("li").each(function ()
		{
			if (jQuery(this).parent("ul.page-sidebar-menu-tech-banker").size() === 1)
			{
				jQuery(this).find("> a").append("<span class=\"selected\"></span>");
			}
		});
		jQuery(".page-sidebar-tech-banker").on("click", "li > a", function (e)
		{
			var hasSubMenu = jQuery(this).next().hasClass("sub-menu");
			var parent = jQuery(this).parent().parent();
			var sidebar_menu = jQuery(".page-sidebar-menu-tech-banker");
			var sub = jQuery(this).next();
			var slideSpeed = parseInt(sidebar_menu.data("slide-speed"));
			parent.children("li.open").children(".sub-menu:not(.always-open)").slideUp(slideSpeed);
			parent.children("li.open").removeClass("open");
			if (sub.is(":visible"))
			{
				jQuery(this).parent().removeClass("open");
				sub.slideUp(slideSpeed);
			} else if (hasSubMenu)
			{
				jQuery(this).parent().addClass("open");
				sub.slideDown(slideSpeed);
			}
		});
		if (typeof (base64_encode) !== "function")
		{
			function base64_encode(data)
			{
				var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
				var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
						ac = 0,
						enc = "",
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
				enc = tmp_arr.join("");
				var r = data.length % 3;
				return (r ? enc.slice(0, r - 3) : enc) + "===".slice(r || 3);
			}
		}
		if (typeof (load_sidebar_content_coming_soon_booster) !== "function")
		{
			function load_sidebar_content_coming_soon_booster()
		{
				var menus_height = jQuery(".page-sidebar-menu-tech-banker").height();
				var content_height = jQuery(".page-content").height() + 30;
				if (parseInt(menus_height) > parseInt(content_height))
				{
					jQuery(".page-content").attr("style", "min-height:" + menus_height + "px");
				} else
				{
					jQuery(".page-sidebar-menu-tech-banker").attr("style", "min-height:" + content_height + "px");
				}
			}
		}
		var sidebar_load_interval = setInterval(load_sidebar_content_coming_soon_booster, 1000);
		if (typeof (overlay_loading_coming_soon_booster) !== "function")
		{
			function overlay_loading_coming_soon_booster(control_id)
			{
				var overlay_opacity = jQuery("<div class=\"opacity_overlay\"></div>");
				jQuery("body").append(overlay_opacity);
				var overlay = jQuery("<div class=\"loader_opacity\"><div class=\"processing_overlay\"></div></div>");
				jQuery("body").append(overlay);
				if (control_id !== undefined)
				{
					var message = control_id;
					var success = <?php echo wp_json_encode( $csb_success ); ?>;
					var issuccessmessage = jQuery("#toast-container").exists();
					if (issuccessmessage !== true)
					{
						var shortCutFunction = jQuery("#manage_messages input:checked").val();
						toastr[shortCutFunction](message, success);
					}
				}
			}
		}
		if (typeof (gdpr_compliance_coming_soon_booster) !== "function")
		{
			function gdpr_compliance_coming_soon_booster()
			{
				var type = jQuery("#ux_ddl_gdpr_compliance").val();
				switch(type)
				{
					case 'disable':
						jQuery("#ux_div_gdpr_compliance_text").hide();
						break;

					default:
						jQuery("#ux_div_gdpr_compliance_text").show();
						break;
				}
			}
		}
		if (typeof (remove_overlay_coming_soon_booster) !== "function")
		{
			function remove_overlay_coming_soon_booster()
			{
				jQuery(".loader_opacity").remove();
				jQuery(".opacity_overlay").remove();
			}
		}
		if (typeof (change_value_settings_coming_soon_booster) !== "function")
		{
			function change_value_settings_coming_soon_booster(id, value)
			{
				jQuery(id).val() === "" ? jQuery(id).val(value) : jQuery(id).val();
			}
		}
		if (typeof (pick_color_coming_soon_booster) !== "function")
		{
			function pick_color_coming_soon_booster(id, color)
			{
				jQuery(id).colpick
				({
					layout: "hex",
					colorScheme: "dark",
					color: color,
					onChange: function (hsb, hex, rgb, el, bySetColor)
					{
					if (!bySetColor)
						jQuery(el).val("#" + hex);
					}
				}).keyup(function ()
				{
					jQuery(this).colpickSetColor(this.value);
				});
			}
		}
		if (typeof (change_settings_coming_soon_booster) !== "function")
		{
			function change_settings_coming_soon_booster(SelectId, DivId)
			{
				var heading_type = jQuery(SelectId).val();
				switch (heading_type)
				{
					case "enable":
					case "show":
						jQuery(DivId).css("display", "block");
						break;
					case "disable":
					case "hide":
						jQuery(DivId).css("display", "none");
						break;
				}
			}
		}
		function premium_edition_notification_coming_soon_booster()
		{
			var premium_edition = <?php echo wp_json_encode( $csb_message_premium_edition ); ?>;
			var shortCutFunction = jQuery("#toastTypeGroup_error input:checked").val();
			toastr[shortCutFunction](premium_edition);
		}
		if (typeof (validate_digits_coming_soon_booster) !== "function")
		{
			function validate_digits_coming_soon_booster(event)
			{
				if (event.which !== 8 && event.which !== 0 && (event.which < 48 || event.which > 57))
				{
					event.preventDefault();
				}
			}
		}
		jQuery(document).ready(function ()
		{
			jQuery("#ux_txt_start_date").datepicker
			({
				dateFormat: "mm/dd/yy",
				numberOfMonths: 1,
				changeMonth: true,
				changeYear: true,
				yearRange: "1970:2039",
				onSelect: function (selected)
				{
					jQuery("#ux_txt_end_date").datepicker("option", "minDate", selected);
				}
			});
			jQuery("#ux_txt_end_date").datepicker
			({
				dateFormat: "mm/dd/yy",
				numberOfMonths: 1,
				changeMonth: true,
				changeYear: true,
				yearRange: "1970:2039",
				onSelect: function (selected)
				{
					jQuery("#ux_txt_start_date").datepicker("option", "maxDate", selected);
				}
			});
		});
		if (typeof (prevent_paste_coming_soon_booster) !== "function")
		{
			function prevent_paste_coming_soon_booster(control_id)
			{
				jQuery("#" + control_id).on("paste", function (e)
				{
					e.preventDefault();
				});
			}
		}
		if (typeof (prevent_datepicker) !== "function")
		{
			function prevent_datepicker(id)
			{
				jQuery(id).keypress(function (event)
				{
					event.preventDefault();
				});
			}
		}
		if (typeof (Opacityblur_coming_soon_booster) !== "function")
		{
			function Opacityblur_coming_soon_booster(input, val)
			{
				if (input.value === "")
					input.value = val;
				if (input.value < 0)
					input.value = 0;
				if (input.value > 100)
					input.value = 100;
			}
		}
		if (typeof (delete_data_coming_soon_booster) !== "function")
		{
			function delete_data_coming_soon_booster(meta_id, overlay_message, page_url)
			{
				var delete_data = confirm(<?php echo wp_json_encode( $csb_confirm_message ); ?>);
				if (delete_data === true)
				{
					jQuery.post(ajaxurl,
					{
						id: meta_id,
						param: "coming_soon_booster_delete_data",
						action: "coming_soon_booster_backend",
						_wp_nonce: "<?php echo isset( $csb_single_delete_data ) ? esc_attr( $csb_single_delete_data ) : ''; ?>"
					},
					function ()
					{
						overlay_loading_coming_soon_booster(overlay_message);
						setTimeout(function ()
						{
							remove_overlay_coming_soon_booster();
							window.location.href = page_url;
						}, 3000);
					});
				}
			}
		}
		<?php
		$check_coming_soon_booster_wizard = get_option( 'coming-soon-booster-welcome-page' );
		if ( isset( $_REQUEST['page'] ) ) { // WPCS: CSRF ok.
			$page = sanitize_text_field( wp_unslash( $_REQUEST['page'] ) );// WPCS:Input var okay, CSRF ok.
		}
		$page_url = false === $check_coming_soon_booster_wizard ? 'csb_wizard_coming_soon_booster' : $page;
		if ( isset( $_GET['page'] ) ) {// WPCS: Input var okay, CSRF ok.
			switch ( $page_url ) {
				case 'csb_wizard_coming_soon_booster':
					?>
					if (typeof (show_hide_details_coming_soon_booster) !== "function")
					{
						function show_hide_details_coming_soon_booster()
						{
							if (jQuery("#ux_div_wizard_set_up").hasClass("wizard-set-up"))
							{
								jQuery("#ux_div_wizard_set_up").css("display", "none");
								jQuery("#ux_div_wizard_set_up").removeClass("wizard-set-up");
							} else
							{
								jQuery("#ux_div_wizard_set_up").css("display", "block");
								jQuery("#ux_div_wizard_set_up").addClass("wizard-set-up");
							}
						}
					}
					if (typeof (plugin_stats_coming_soon_booster) !== "function")
					{
						function plugin_stats_coming_soon_booster(type)
						{
							var email_pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
							if( (jQuery("#ux_txt_email_address_notifications").val() ===  "" || false == email_pattern.test(jQuery("#ux_txt_email_address_notifications").val())) && type !== "skip")
							{
								if( jQuery("#ux_txt_email_address_notifications").val() ===  "" || false == email_pattern.test(jQuery("#ux_txt_email_address_notifications").val()) )
								{
									jQuery("#ux_txt_validation_gdpr_coming_soon_booster").css({"display":'','color':'red'});
									jQuery("#ux_txt_email_address_notifications").css("border-color","red");
								}
								else {
									jQuery("#ux_txt_validation_gdpr_coming_soon_booster").css( 'display','none' );
									jQuery("#ux_txt_email_address_notifications").css("border-color","#ddd");
								}
							}
							else
							{
								jQuery("#ux_txt_validation_gdpr_coming_soon_booster").css( 'display','none' );
								jQuery("#ux_txt_email_address_notifications").css("border-color","#ddd");
								overlay_loading_coming_soon_booster();
								jQuery.post(ajaxurl,
								{
									id: jQuery("#ux_txt_email_address_notifications").val(),
									type: type,
									param: "wizard_coming_soon_booster",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $coming_soon_booster_check_status ); ?>"
								},
								function ()
								{
									remove_overlay_coming_soon_booster();
									window.location.href = "admin.php?page=csb_coming_soon_booster";
								});
							}
						}
					}
					<?php
					break;
				case 'csb_coming_soon_booster':
					?>
					jQuery("#ux_li_plugin_mode").addClass("active");
					<?php
					if ( PLUGIN_MODE_COMING_SOON_BOOSTER === '1' ) {
					?>
					jQuery(document).ready(function ()
					{
						jQuery("#ux_ddl_plugin_mode").val("<?php echo isset( $plugin_mode_data_unserialize['default_mode'] ) ? esc_attr( $plugin_mode_data_unserialize['default_mode'] ) : 'coming_soon_mode'; ?>");
					});
					function reset_factory_settings_data()
					{
						premium_edition_notification_coming_soon_booster();
					}
					jQuery("#ux_frm_plugin_mode").validate
					({
						submitHandler: function ()
						{
							jQuery.post(ajaxurl,
							{
								data: base64_encode(jQuery("#ux_frm_plugin_mode").serialize()),
								param: "coming_soon_booster_plugin_mode",
								action: "coming_soon_booster_backend",
								_wp_nonce: "<?php echo esc_attr( $csb_plugin_mode ); ?>"
							},
							function ()
							{
								overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
								setTimeout(function ()
								{
									remove_overlay_coming_soon_booster();
									window.location.href = "admin.php?page=csb_coming_soon_booster";
								}, 3000);
							});
						}
					});
					jQuery( '#ux_div_<?php echo esc_attr( $themes_data['theme_type'] ); ?>').css('opacity', '1' );
					load_sidebar_content_coming_soon_booster();
					<?php
					}
					break;
				case 'csb_background_settings':
					?>
					jQuery("#ux_li_layout_settings").addClass("active");
					jQuery("#ux_li_background_settings").addClass("active");
					<?php
					if ( '1' === BACKGROUND_SETTINGS_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							jQuery("#ux_ddl_animation").val("<?php echo isset( $background_settings_data_unserialize['animation'] ) ? esc_attr( $background_settings_data_unserialize['animation'] ) : ''; ?>");
							jQuery("#ux_ddl_animation_type").val("<?php echo isset( $background_settings_data_unserialize['animation_type_background'] ) ? esc_attr( $background_settings_data_unserialize['animation_type_background'] ) : ''; ?>");
							jQuery("#ux_ddl_overlay").val("<?php echo isset( $background_settings_data_unserialize['overlay'] ) ? esc_attr( $background_settings_data_unserialize['overlay'] ) : 'show'; ?>");
							change_settings_coming_soon_booster("#ux_ddl_animation", "#ux_div_animation");
							change_settings_coming_soon_booster("#ux_ddl_overlay", "#ux_div_overlay");
						});
						jQuery("#ux_div_background_<?php echo isset( $background_settings_data_unserialize['choose_background'] ) ? intval( $background_settings_data_unserialize['choose_background'] ) : ''; ?>").addClass("details selected");
						jQuery("#ux_frm_background_settings").validate
						({
							rules:
							{
								ux_txt_background_color:
								{
									required: true
								}
							},
							highlight: function (element)
							{
								jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
							},
							success: function (label, element)
							{
								jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							},
							submitHandler: function ()
							{
								jQuery.post(ajaxurl,
								{
									data: base64_encode(jQuery("#ux_frm_background_settings").serialize()),
									param: "coming_soon_booster_background_settings_module",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $csb_background_settings ); ?>"
								},
								function ()
								{
									overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
									setTimeout(function ()
									{
										remove_overlay_coming_soon_booster();
										window.location.href = "admin.php?page=csb_background_settings";
									}, 3000);
								});
							}
						});
						<?php
					}
					break;
				case 'csb_loader_settings':
					?>
					jQuery("#ux_li_layout_settings").addClass("active");
					jQuery("#ux_li_loader_settings").addClass("active");
					<?php
					if ( '1' === LAYOUT_SETTINGS_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							jQuery("#ux_ddl_loader_text").val("<?php echo isset( $loader_data_unserialize['loader_text'] ) ? esc_attr( $loader_data_unserialize['loader_text'] ) : 'show'; ?>");
							jQuery("#ux_ddl_font_size").val("12px");
							jQuery("#ux_ddl_font_family_loader").val("Poppins");
							change_settings_coming_soon_booster("#ux_ddl_loader_text", "#ux_div_loader_text");
						});
						jQuery("#ux_frm_loader_settings").validate
						({
							rules:
							{
								ux_txt_loader_text_title:
								{
									required: true
								}
							},
							errorPlacement: function ()
							{
							},
							highlight: function (element)
							{
								jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
							},
							success: function (label, element)
							{
								jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							},
							submitHandler: function ()
							{
								jQuery.post(ajaxurl,
								{
									data: base64_encode(jQuery("#ux_frm_loader_settings").serialize()),
									param: "coming_soon_booster_loader_settings_module",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $csb_loader_settings ); ?>"
								},
								function ()
								{
									overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
									setTimeout(function ()
									{
										remove_overlay_coming_soon_booster();
										window.location.href = "admin.php?page=csb_loader_settings";
									}, 3000);
								});
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_logo_settings':
						?>
							jQuery("#ux_li_layout_settings").addClass("active");
							jQuery("#ux_li_logo_settings").addClass("active");
						<?php
						if ( '1' === LAYOUT_SETTINGS_COMING_SOON_BOOSTER ) {
							?>
							function change_type_coming_soon_booster(type)
							{
								var type = jQuery("#ux_rdl_font_logo_type").val();
								switch (type)
								{
									case "text" :
										jQuery("#ux_div_logo_text").css("display", "block");
										jQuery("#ux_div_logo_img").css("display", "none");
									break;
									case "image" :
										jQuery("#ux_div_logo_text").css("display", "none");
										jQuery("#ux_div_logo_img").css("display", "block");
									break;
								}
							}
							function change_size_coming_soon_booster()
							{
									var logo = jQuery("#ux_ddl_logo_size").val();
									switch (logo)
									{
										case "custom" :
												jQuery("#ux_div_width").css("display", "block");
												break;
										case "default" :
												jQuery("#ux_div_width").css("display", "none");
												break;
									}
							}
							jQuery(document).ready(function ()
							{
								<?php
								global $wp_version;
								if ( $wp_version >= 3.5 ) {
									wp_enqueue_media();
								} else {
								?>
									jQuery("#wp_media_upload_error_message").css("display", "block");
									jQuery("#wp_media_upload_button").css("display", "none");
								<?php
								}
								?>
									jQuery("#ux_ddl_img_logo_link_target").val("<?php echo isset( $logo_data_unserialize['img_logo_link_target'] ) ? esc_attr( $logo_data_unserialize['img_logo_link_target'] ) : ''; ?>");
									jQuery("#ux_ddl_text_logo_link_target").val("<?php echo isset( $logo_data_unserialize['text_logo_link_target'] ) ? esc_attr( $logo_data_unserialize['text_logo_link_target'] ) : ''; ?>");
									jQuery("#ux_ddl_font_logo").val("<?php echo isset( $logo_data_unserialize['logo'] ) ? esc_attr( $logo_data_unserialize['logo'] ) : ''; ?>");
									jQuery("#ux_ddl_font_style").val("<?php echo isset( $logo_data_unserialize['font_style_layout'] ) ? esc_attr( $logo_data_unserialize['font_style_layout'] ) : '40px'; ?>");
									jQuery("#ux_ddl_font_family").val("<?php echo isset( $logo_data_unserialize['font_family_layout'] ) ? stripslashes( htmlspecialchars_decode( urldecode( $logo_data_unserialize['font_family_layout'] ) ) ) : 'Poppins'; // WPCS: XSS ok. ?>");
									jQuery("#ux_ddl_logo_link").val("<?php echo isset( $logo_data_unserialize['logo_link'] ) ? esc_attr( $logo_data_unserialize['logo_link'] ) : 'show'; ?>");
									jQuery("#ux_ddl_logo_size").val("<?php echo isset( $logo_data_unserialize['logo_size'] ) ? esc_attr( $logo_data_unserialize['logo_size'] ) : 'custom'; ?>");
									jQuery("#ux_ddl_html_tag_property").val("<?php echo isset( $logo_data_unserialize['html_tag_property'] ) ? esc_attr( $logo_data_unserialize['html_tag_property'] ) : 'h1'; ?>");
									jQuery("#ux_ddl_text_logo_link").val("<?php echo isset( $logo_data_unserialize['text_logo_link'] ) ? esc_attr( $logo_data_unserialize['text_logo_link'] ) : 'show'; ?>");
									change_settings_coming_soon_booster("#ux_ddl_font_logo", "#ux_div_logo");
									change_settings_coming_soon_booster("#ux_ddl_logo_link", "#ux_div_logo_link");
									change_settings_coming_soon_booster("#ux_ddl_text_logo_link", "#ux_div_logo_text_link");
									change_size_coming_soon_booster();
									change_type_coming_soon_booster("<?php echo isset( $logo_data_unserialize['logo_type'] ) ? esc_attr( $logo_data_unserialize['logo_type'] ) : 'text'; ?>");
								});
								var vid_thumb_file_frame;
								jQuery("#wp_media_upload_button").on("click", function (event)
								{
									event.preventDefault();
									vid_thumb_file_frame = wp.media.frames.vid_thumb_file_frame = wp.media
									({
										button:
										{
											text: jQuery(this).data("uploader_button_text")
										},
										multiple: false
									});
									vid_thumb_file_frame.on("select", function ()
									{
										var selection = vid_thumb_file_frame.state().get("selection");
										selection.map(function (attachment)
										{
											attachment = attachment.toJSON();
											if (attachment.type === "image")
											{
												jQuery("#ux_txt_logo_text").val(attachment.url);
											}
										});
									});
									vid_thumb_file_frame.open();
								});
								jQuery("#ux_frm_logo_settings").validate
								({
									rules:
									{
										ux_txt_width:
										{
											required: true
										},
										ux_txt_height:
										{
											required: true
										},
										ux_txt_logo_link:
										{
											required: true,
											url: true
										},
										ux_txt_logo_text:
										{
											required: true
										}
									},
									errorPlacement: function ()
									{
									},
									highlight: function (element)
									{
										jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
									},
									success: function (label, element)
									{
										jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
									},
									submitHandler: function ()
									{
										var type = jQuery("#ux_rdl_font_logo_type").val();
										if (type === "text")
										{
											premium_edition_notification_coming_soon_booster();
										} else
										{
											jQuery.post(ajaxurl,
											{
												data: base64_encode(jQuery("#ux_frm_logo_settings").serialize()),
												param: "coming_soon_booster_logo_settings_module",
												action: "coming_soon_booster_backend",
												_wp_nonce: "<?php echo esc_attr( $csb_logo_settings ); ?>"
											},
											function ()
											{
												overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
												setTimeout(function ()
												{
													remove_overlay_coming_soon_booster();
													window.location.href = "admin.php?page=csb_logo_settings";
												}, 3000);
										});
										}
									}
								});
								load_sidebar_content_coming_soon_booster();
								<?php
						}
					break;
				case 'csb_seo_settings':
					?>
					jQuery("#ux_li_layout_settings").addClass("active");
					jQuery("#ux_li_seo_settings").addClass("active");
					<?php
					if ( '1' === LAYOUT_SETTINGS_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							jQuery("#ux_ddl_meta_robot_follow").val("<?php echo isset( $seo_data_unserialize['meta_robot_follow'] ) ? esc_attr( $seo_data_unserialize['meta_robot_follow'] ) : 'follow'; ?>");
						});
						jQuery("#ux_frm_seo_settings").validate
						({
							submitHandler: function ()
							{
								jQuery.post(ajaxurl,
								{
									data: base64_encode(jQuery("#ux_frm_seo_settings").serialize()),
									param: "coming_soon_booster_seo_settings_module",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $csb_seo_settings ); ?>"
								},
								function ()
								{
									overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
									setTimeout(function ()
									{
										remove_overlay_coming_soon_booster();
										window.location.href = "admin.php?page=csb_seo_settings";
									}, 3000);
								});
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_favicon_settings':
					?>
					jQuery("#ux_li_layout_settings").addClass("active");
					jQuery("#ux_li_favicon_settings").addClass("active");
					<?php
					if ( '1' === LAYOUT_SETTINGS_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							jQuery("#ux_ddl_favicon_settings").val("<?php echo isset( $favicon_data_unserialize['favicon_settings'] ) ? esc_attr( $favicon_data_unserialize['favicon_settings'] ) : ''; ?>");
							<?php
							global $wp_version;
							if ( $wp_version >= 3.5 ) {
								wp_enqueue_media();
							} else {
								?>
								jQuery("#wp_media_favicon_upload_error").css("display", "block");
								jQuery("#wp_upload_button").css("display", "none");
								<?php
							}
							?>
							change_settings_coming_soon_booster("#ux_ddl_favicon_settings", "#ux_div_favicon");
						});
						jQuery("#ux_frm_favicon_settings").validate
						({
							submitHandler: function ()
							{
								premium_edition_notification_coming_soon_booster();
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_heading_settings':
					?>
					jQuery("#ux_li_layout_settings").addClass("active");
					jQuery("#ux_li_heading_settings").addClass("active");
					<?php
					if ( '1' === LAYOUT_SETTINGS_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
						if (window.CKEDITOR)
						{
							CKEDITOR.replace("ux_heading_content");
						}
						jQuery("#ux_ddl_heading_settings").val("<?php echo isset( $layout_heading_data_unserialize['heading_settings'] ) ? esc_attr( $layout_heading_data_unserialize['heading_settings'] ) : 'show'; ?>");
						jQuery("#ux_ddl_font_style_heading").val("34px");
						jQuery("#ux_ddl_font_family_heading").val("Poppins");
						change_settings_coming_soon_booster("#ux_ddl_heading_settings", "#ux_div_heading_text");
						});
						jQuery("#ux_frm_heading_settings").validate
						({
							rules:
							{
								ux_heading_content:
								{
									required: true
								}
							},
							highlight: function (element)
							{
								jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
							},
							success: function (label, element)
							{
								jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							},
							submitHandler: function ()
							{
								if (window.CKEDITOR)
								{
									jQuery("#ux_txtarea_heading_content").val(CKEDITOR.instances["ux_heading_content"].getData());
								} else if (jQuery("#wp-ux_heading_content-wrap").hasClass("tmce-active"))
								{
									jQuery("#ux_txtarea_heading_content").val(tinyMCE.get("ux_heading_content").getContent());
								} else
								{
									jQuery("#ux_txtarea_heading_content").val(jQuery("#ux_heading_content").val());
								}
								jQuery.post(ajaxurl,
								{
									data: base64_encode(jQuery("#ux_frm_heading_settings").serialize()),
									param: "coming_soon_booster_heading_settings_module",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $csb_heading_settings ); ?>"
								},
								function ()
								{
									overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
									setTimeout(function ()
									{
										remove_overlay_coming_soon_booster();
										window.location.href = "admin.php?page=csb_heading_settings";
									}, 3000);
								});
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_description_settings':
					?>
					jQuery("#ux_li_layout_settings").addClass("active");
					jQuery("#ux_li_description_settings").addClass("active");
					<?php
					if ( '1' === LAYOUT_SETTINGS_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
						if (window.CKEDITOR)
						{
							CKEDITOR.replace("ux_description_content");
						}
						jQuery("#ux_ddl_description_settings").val("<?php echo isset( $layout_description_data_unserialize['description_settings'] ) ? esc_attr( $layout_description_data_unserialize['description_settings'] ) : 'show'; ?>");
						jQuery("#ux_ddl_font_style_description").val("18px");
						jQuery("#ux_ddl_font_family_description").val("Poppins:300");
						change_settings_coming_soon_booster("#ux_ddl_description_settings", "#ux_div_description_text");
						});
						jQuery("#ux_frm_description_settings").validate
						({
							rules:
							{
								ux_description_content:
								{
									required: true
								}
							},
						highlight: function (element)
						{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
						},
						success: function (label, element)
						{
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
						},
						submitHandler: function ()
						{
							if (window.CKEDITOR)
							{
								jQuery("#ux_txtarea_description_content").val(CKEDITOR.instances["ux_description_content"].getData());
							} else if (jQuery("#wp-ux_description_content-wrap").hasClass("tmce-active"))
							{
								jQuery("#ux_txtarea_description_content").val(tinyMCE.get("ux_description_content").getContent());
							} else
							{
								jQuery("#ux_txtarea_description_content").val(jQuery("#ux_description_content").val());
							}
							jQuery.post(ajaxurl,
							{
								data: base64_encode(jQuery("#ux_frm_description_settings").serialize()),
								param: "coming_soon_booster_description_settings_module",
								action: "coming_soon_booster_backend",
								_wp_nonce: "<?php echo esc_attr( $csb_description_settings ); ?>"
							},
							function ()
							{
								overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
								setTimeout(function ()
								{
									remove_overlay_coming_soon_booster();
									window.location.href = "admin.php?page=csb_description_settings";
								}, 3000);
							});
						}
					});
					load_sidebar_content_coming_soon_booster();
					<?php
					}
					break;
				case 'csb_layout_button_settings':
					?>
					jQuery("#ux_li_layout_settings").addClass("active");
					jQuery("#ux_li_button_settings").addClass("active");
					<?php
					if ( '1' === LAYOUT_SETTINGS_COMING_SOON_BOOSTER ) {
						?>
						if (typeof (change_button_coming_soon_booster) !== "function")
						{
							function change_button_coming_soon_booster()
							{
								var type = jQuery("#ux_ddl_layout_button_type").val();
								switch (type)
								{
									case "subscriber_button" :
										jQuery("#ux_contact_button").css("display", "none");
										jQuery("#ux_ddl_layout_button_contact_visibility_type").css("display", "none");
										jQuery("#ux_ddl_layout_button_subscriber_visibility_type").css("display", "block");
										var visibility_type = jQuery("#ux_ddl_layout_button_subscriber_visibility_type").val();
										visibility_type == "show" ? jQuery("#ux_subscriber_button").css("display", "block") : jQuery("#ux_subscriber_button").css("display", "none");
										break;
									case "contact_button" :
										jQuery("#ux_subscriber_button").css("display", "none");
										jQuery("#ux_ddl_layout_button_subscriber_visibility_type").css("display", "none");
										jQuery("#ux_ddl_layout_button_contact_visibility_type").css("display", "block");
										var visibility_type = jQuery("#ux_ddl_layout_button_contact_visibility_type").val();
										visibility_type == "show" ? jQuery("#ux_contact_button").css("display", "block") : jQuery("#ux_contact_button").css("display", "none");
										break;
								}
							}
						}
						jQuery(document).ready(function ()
						{
							jQuery("#ux_ddl_layout_button_type").val("<?php echo isset( $layout_button_settings_data_unserialize['layout_subscriber_button_label'] ) ? esc_attr( $layout_button_settings_data_unserialize['layout_subscriber_button_label'] ) : 'subscriber_button'; ?>");
							jQuery("#ux_ddl_font_style_layout_subscriber_button").val("18px");
							jQuery("#ux_ddl_subscriber_label_alignment").val("center");
							jQuery("#ux_ddl_font_family_button_subscriber").val("Poppins");
							jQuery("#ux_ddl_font_style_layout_contact_button").val("18px");
							jQuery("#ux_ddl_layout_contact_label_alignment").val("center");
							jQuery("#ux_ddl_layout_contact_font_family_button").val("Poppins");
							jQuery("#ux_ddl_layout_button_subscriber_visibility_type").val("<?php echo isset( $layout_button_settings_data_unserialize['layout_subscriber_button_visibility'] ) ? esc_attr( $layout_button_settings_data_unserialize['layout_subscriber_button_visibility'] ) : 'show'; ?>");
							jQuery("#ux_ddl_layout_button_contact_visibility_type").val("<?php echo isset( $layout_button_settings_data_unserialize['layout_contact_button_visibility'] ) ? htmlspecialchars_decode( $layout_button_settings_data_unserialize['layout_contact_button_visibility'] ) : 'show';// WPCS: XSS ok. ?>");
							change_button_coming_soon_booster();
						});
						jQuery("#ux_frm_layout_button_settings").validate
						({
							rules:
							{
								ux_txt_sub_button_label:
								{
									required: true
								},
								ux_txt_contact_button_label:
								{
									required: true
								}
							},
							errorPlacement: function ()
							{
							},
							highlight: function (element)
							{
								jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
							},
							success: function (label, element)
							{
								jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							},
							submitHandler: function ()
							{
								jQuery.post(ajaxurl,
								{
									data: base64_encode(jQuery("#ux_frm_layout_button_settings").serialize()),
									param: "coming_soon_booster_layout_button_settings_module",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $csb_layout_button_settings ); ?>"
								},
								function ()
								{
									overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
									setTimeout(function ()
									{
										remove_overlay_coming_soon_booster();
										window.location.href = "admin.php?page=csb_layout_button_settings";
									}, 3000);
								});
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_layout_custom_css':
					?>
					jQuery("#ux_li_layout_settings").addClass("active");
					jQuery("#ux_li_custom_css").addClass("active");
					<?php
					if ( '1' === LAYOUT_SETTINGS_COMING_SOON_BOOSTER ) {
						?>
						jQuery("#ux_frm_layout_custom_css").validate
						({
							submitHandler: function ()
							{
								premium_edition_notification_coming_soon_booster();
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_countdown':
					?>
					jQuery("#ux_li_countdown").addClass("active");
					<?php
					if ( '1' === COUNTDOWN_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							jQuery("#ux_ddl_countdown_timer").val("<?php echo isset( $countdown_data_unserialize['countdown_timer'] ) ? esc_attr( $countdown_data_unserialize['countdown_timer'] ) : 'show'; ?>");
							jQuery("#ux_ddl_hours").val("<?php echo isset( $launch_time[0] ) ? intval( $launch_time[0] ) : '0'; ?>");
							jQuery("#ux_ddl_minutes").val("<?php echo isset( $launch_time[1] ) ? intval( $launch_time[1] ) : '0'; ?>");
							jQuery("#ux_ddl_seconds").val("<?php echo isset( $launch_time[2] ) ? intval( $launch_time[2] ) : ' 0'; ?>");
							change_settings_coming_soon_booster("#ux_ddl_countdown_timer", "#ux_div_countdown_timer");
						});
						jQuery("#ux_frm_countdown").validate
						({
						submitHandler: function ()
							{
								jQuery.post(ajaxurl,
								{
									data: base64_encode(jQuery("#ux_frm_countdown").serialize()),
									param: "coming_soon_booster_countdown_module",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $csb_countdown ); ?>"
								},
								function ()
								{
									overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
									setTimeout(function ()
									{
										remove_overlay_coming_soon_booster();
										window.location.href = "admin.php?page=csb_countdown";
									}, 3000);
								});
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_social_settings':
					?>
					jQuery("#ux_li_social_settings").addClass("active");
					<?php
					if ( '1' === SOCIAL_MEDIA_SETTINGS_COMING_SOON_BOOSTER ) {
						?>
						jQuery(".comingsoon-social-media").blur(function ()
						{
							if (jQuery(this).val())
							{
								if (jQuery(this).val().length !== 0 && jQuery(this).val().indexOf("https") === -1 && jQuery(this).val().indexOf("http") === -1)
								{
									var insert = "https://";
									var string = jQuery(this).val();
									var result = [string.slice(0, 0), insert + "", string.slice(0)].join("");
									jQuery(this).val(result);
								}
								if (jQuery(this).val().length !== 0 && jQuery(this).val().indexOf("com") === -1 && jQuery(this).val().lastIndexOf(".") === -1)
								{
									var string = jQuery(this).val();
									var com = ".com";
									jQuery(this).val(string + com);
								}
							}
						});
						jQuery("#ux_frm_social_settings").validate
						({
							submitHandler: function ()
							{
								premium_edition_notification_coming_soon_booster();
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_contact_background_settings':
					?>
					jQuery("#ux_li_contact_form").addClass("active");
					jQuery("#ux_li_contact_background_settings").addClass("active");
					<?php
					if ( '1' === CONTACT_FORM_COMING_SOON_BOOSTER ) {
						?>
						jQuery("#ux_frm_contact_background_settings").validate
						({
							submitHandler: function ()
							{
								premium_edition_notification_coming_soon_booster();
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_contact_heading_settings':
					?>
					jQuery("#ux_li_contact_form").addClass("active");
					jQuery("#ux_li_contact_heading_settings").addClass("active");
					<?php
					if ( '1' === CONTACT_FORM_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							if (window.CKEDITOR)
							{
								CKEDITOR.replace("ux_heading_content");
							}
							jQuery("#ux_ddl_contact_heading_settings").val("<?php echo isset( $contact_heading_settings_data_unserialize['contact_heading_settings'] ) ? esc_attr( $contact_heading_settings_data_unserialize['contact_heading_settings'] ) : 'show'; ?>");
							jQuery("#ux_ddl_font_style_contact_heading").val("25px");
							jQuery("#ux_ddl_font_family_contact_heading").val("Poppins");
							change_settings_coming_soon_booster("#ux_ddl_contact_heading_settings", "#ux_div_contact_heading_text");
						});
						jQuery("#ux_frm_contact_heading_settings").validate
						({
							rules:
							{
								ux_heading_content:
								{
									required: true
								}
							},
							highlight: function (element)
							{
								jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
							},
							success: function (label, element)
							{
								jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							},
							submitHandler: function ()
							{
								if (window.CKEDITOR)
								{
									jQuery("#ux_txtarea_contact_heading_content").val(CKEDITOR.instances["ux_heading_content"].getData());
								} else if (jQuery("#wp-ux_heading_content-wrap").hasClass("tmce-active"))
								{
									jQuery("#ux_txtarea_contact_heading_content").val(tinyMCE.get("ux_heading_content").getContent());
								} else
								{
									jQuery("#ux_txtarea_contact_heading_content").val(jQuery("#ux_heading_content").val());
								}
								jQuery.post(ajaxurl,
								{
									data: base64_encode(jQuery("#ux_frm_contact_heading_settings").serialize()),
									param: "coming_soon_booster_contact_heading_settings_module",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $csb_contact_heading_settings ); ?>"
								},
								function ()
								{
									overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
									setTimeout(function ()
									{
										remove_overlay_coming_soon_booster();
										window.location.href = "admin.php?page=csb_contact_heading_settings";
									}, 3000);
								});
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_contact_description_settings':
					?>
					jQuery("#ux_li_contact_form").addClass("active");
					jQuery("#ux_li_contact_description_settings").addClass("active");
					<?php
					if ( '1' === CONTACT_FORM_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							if (window.CKEDITOR)
							{
								CKEDITOR.replace("ux_description_content");
							}
							jQuery("#ux_ddl_contact_description_settings").val("<?php echo isset( $contact_description_settings_data_unserialize['contact_description_settings'] ) ? esc_attr( $contact_description_settings_data_unserialize['contact_description_settings'] ) : 'show'; ?>");
							jQuery("#ux_ddl_font_style_contact_description").val("18px");
							jQuery("#ux_ddl_font_family_contact_description").val("Poppins:300");
							change_settings_coming_soon_booster("#ux_ddl_contact_description_settings", "#ux_div_contact_description_text");
						});
						jQuery("#ux_frm_description_settings").validate
						({
							rules:
							{
								ux_description_content:
								{
									required: true
								}
							},
							highlight: function (element)
							{
								jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
							},
							success: function (label, element)
							{
								jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							},
							submitHandler: function ()
							{
								if (window.CKEDITOR)
								{
									jQuery("#ux_txtarea_contact_description_content").val(CKEDITOR.instances["ux_description_content"].getData());
								} else if (jQuery("#wp-ux_description_content-wrap").hasClass("tmce-active"))
								{
									jQuery("#ux_txtarea_contact_description_content").val(tinyMCE.get("ux_description_content").getContent());
								} else
								{
									jQuery("#ux_txtarea_contact_description_content").val(jQuery("#ux_description_content").val());
								}
								jQuery.post(ajaxurl,
								{
									data: base64_encode(jQuery("#ux_frm_description_settings").serialize()),
									param: "coming_soon_booster_contact_description_settings_module",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $csb_contact_description_settings ); ?>"
								},
								function ()
								{
									overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
									setTimeout(function ()
									{
										remove_overlay_coming_soon_booster();
										window.location.href = "admin.php?page=csb_contact_description_settings";
									}, 3000);
								});
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_label_settings':
					?>
					jQuery("#ux_li_contact_form").addClass("active");
					jQuery("#ux_li_label_settings").addClass("active");
					<?php
					if ( '1' === CONTACT_FORM_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							jQuery("#ux_ddl_name_field").val("<?php echo isset( $label_settings_data_unserialize['label_settings_contact'] ) ? esc_attr( $label_settings_data_unserialize['label_settings_contact'] ) : 'show'; ?>");
							jQuery("#ux_ddl_font_style_size").val("14px");
							jQuery("#ux_ddl_font_family_label").val("Poppins:300");
							change_settings_coming_soon_booster("#ux_ddl_name_field", "#ux_div_name_field");
						});
						jQuery("#ux_frm_label_settings").validate
						({
							submitHandler: function ()
							{
								premium_edition_notification_coming_soon_booster();
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_contact_textbox_settings':
					?>
					jQuery("#ux_li_contact_form").addClass("active");
					jQuery("#ux_li_contact_textbox_settings").addClass("active");
					<?php
					if ( '1' === CONTACT_FORM_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							jQuery("#ux_ddl_font_style_contact").val("12px");
							jQuery("#ux_ddl_font_family_textbox_contact").val("Poppins:300");
							jQuery("#ux_ddl_contact_placeholder_alignment").val("left");
						});
						jQuery("#ux_frm_contact_textbox_settings").validate
						({
							rules:
							{
								ux_txt_name_textbox_plceholder:
								{
									required: true
								},
								ux_txt_email_textbox_plceholder:
								{
									required: true
								},
								ux_txt_subject_textbox_plceholder:
								{
									required: true
								},
								ux_txt_message_textbox_plceholder:
								{
									required: true
								}
							},
							errorPlacement: function ()
							{
							},
							highlight: function (element)
							{
								jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
							},
							success: function (label, element)
							{
								jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							},
							submitHandler: function ()
							{
								jQuery.post(ajaxurl,
								{
									data: base64_encode(jQuery("#ux_frm_contact_textbox_settings").serialize()),
									param: "contact_textbox_settings_coming_soon_booster",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $csb_contact_textbox_settings ); ?>"
								},
								function ()
								{
									overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
									setTimeout(function ()
									{
										remove_overlay_coming_soon_booster();
										window.location.href = "admin.php?page=csb_contact_textbox_settings";
									}, 3000);
								});
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_button_settings':
					?>
					jQuery("#ux_li_contact_form").addClass("active");
					jQuery("#ux_li_contact_button_settings").addClass("active");
					<?php
					if ( '1' === CONTACT_FORM_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							jQuery("#ux_ddl_font_style_button_contact").val("18px");
							jQuery("#ux_ddl_font_family_button_contact").val("Poppins:300");
							jQuery("#ux_ddl_label_alignment_contact").val("center");
						});
						jQuery("#ux_frm_button_settings").validate
						({
							rules:
							{
								ux_txt_button_label_contact:
								{
									required: true
								}
							},
							errorPlacement: function ()
							{
							},
							highlight: function (element)
							{
							jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
							},
							success: function (label, element)
							{
							jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							},
							submitHandler: function ()
							{
								jQuery.post(ajaxurl,
								{
									data: base64_encode(jQuery("#ux_frm_button_settings").serialize()),
									param: "coming_soon_booster_button_settings_module",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $csb_button_settings ); ?>"
								},
								function ()
								{
									overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
									setTimeout(function ()
									{
										remove_overlay_coming_soon_booster();
										window.location.href = "admin.php?page=csb_button_settings";
									}, 3000);
								});
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_message_settings':
					?>
					jQuery("#ux_li_contact_form").addClass("active");
					jQuery("#ux_li_success_message_settings").addClass("active");
					<?php
					if ( '1' === CONTACT_FORM_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							if (window.CKEDITOR)
							{
								CKEDITOR.replace("ux_success_content_contact_form");
							}
							jQuery("#ux_ddl_success_settings_contact_form").val("<?php echo isset( $success_message_settings_data_unserialize['success_message_settings_contact_form'] ) ? esc_attr( $success_message_settings_data_unserialize['success_message_settings_contact_form'] ) : ''; ?>");
							jQuery("#ux_ddl_font_style_success_contact_form").val("18px");
							jQuery("#ux_ddl_font_family_success_contact_form").val("Poppins:300");
							change_settings_coming_soon_booster("#ux_ddl_success_settings_contact_form", "#ux_div_success_message_settings");
						});
						jQuery("#ux_frm_success_message_settings").validate
						({
							submitHandler: function ()
							{
								if (window.CKEDITOR)
								{
									jQuery("#ux_txtarea_success_message").val(CKEDITOR.instances["ux_success_content_contact_form"].getData());
								} else if (jQuery("#wp-ux_success_content_contact_form-wrap").hasClass("tmce-active"))
								{
									jQuery("#ux_txtarea_success_message").val(tinyMCE.get("ux_success_content_contact_form").getContent());
								} else
								{
									jQuery("#ux_txtarea_success_message").val(jQuery("#ux_success_content_contact_form").val());
								}
								jQuery.post(ajaxurl,
								{
									data: base64_encode(jQuery("#ux_frm_success_message_settings").serialize()),
									param: "coming_soon_booster_success_message_settings",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $csb_message_settings ); ?>"
								},
								function ()
								{
									overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
									setTimeout(function ()
									{
										remove_overlay_coming_soon_booster();
										window.location.href = "admin.php?page=csb_message_settings";
									}, 3000);
								});
							}
						});
						load_sidebar_content_coming_soon_booster();
					<?php
					}
					break;
				case 'csb_footer_settings':
					?>
					jQuery("#ux_li_contact_form").addClass("active");
					jQuery("#ux_li_footer_settings").addClass("active");
					<?php
					if ( '1' === CONTACT_FORM_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							if (window.CKEDITOR)
							{
								CKEDITOR.replace("ux_footer_content");
							}
							jQuery("#ux_ddl_footer_settings").val("<?php echo isset( $footer_data_unserialize['footer_settings'] ) ? esc_attr( $footer_data_unserialize['footer_settings'] ) : 'show'; ?>");
							jQuery("#ux_ddl_font_style_footer").val("10px");
							jQuery("#ux_ddl_font_family_footer").val("Poppins:300");
							change_settings_coming_soon_booster("#ux_ddl_footer_settings", "#ux_div_footer_text");
						});
						jQuery("#ux_frm_footer_settings").validate
						({
							submitHandler: function ()
							{
								premium_edition_notification_coming_soon_booster();
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_email_templates':
					?>
					jQuery("#ux_li_email_templates").addClass("active");
					jQuery("#ux_li_contact_form").addClass("active");
					<?php
					if ( '1' === CONTACT_FORM_COMING_SOON_BOOSTER ) {
						?>
						if (typeof (coming_soon_booster_email_template_type) !== "function")
						{
							function coming_soon_booster_email_template_type()
							{
								var email_template_data = jQuery("#ux_ddl_user_success").val();
								jQuery.post(ajaxurl,
								{
									data: email_template_data,
									param: "coming_soon_booster_email_templates_module",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $coming_soon_type_templates ); ?>"
								},
								function (data)
								{
									jQuery("#ux_email_template_meta_id").val(jQuery.parseJSON(data)[0]["meta_id"]);
									jQuery("#ux_txt_send_to").val(jQuery.parseJSON(data)[0]["email_send_to"]);
									jQuery("#ux_txt_cc").val(jQuery.parseJSON(data)[0]["email_cc"]);
									jQuery("#ux_txt_bcc").val(jQuery.parseJSON(data)[0]["email_bcc"]);
									if (email_template_data === "template_for_admin_notification")
									{
										jQuery("#ux_email_subject").css("display", "none");
									} else
									{
										jQuery("#ux_email_subject").css("display", "block");
										jQuery("#ux_txt_subject").val(jQuery.parseJSON(data)[0]["email_subject"]);
									}
									if (window.CKEDITOR)
									{
										CKEDITOR.instances["ux_heading_content"].setData(jQuery.parseJSON(data)[0]["email_message"]);
									} else if (jQuery("#wp-ux_heading_content-wrap").hasClass("tmce-active"))
									{
										tinyMCE.get("ux_heading_content").setContent(jQuery.parseJSON(data)[0]["email_message"]);
									} else
									{
										jQuery("#ux_heading_content").val(jQuery.parseJSON(data)[0]["email_message"]);
									}
								});
							}
						}
						jQuery(document).ready(function ()
						{
							if (window.CKEDITOR)
							{
								CKEDITOR.replace("ux_heading_content");
							}
							setTimeout(function ()
							{
								coming_soon_booster_email_template_type();
							}, 500);
						});
						jQuery("#ux_frm_email_templates").validate
						({
							rules:
							{
								ux_txt_send_to:
								{
									required: true,
									email: true
								}
							},
							errorPlacement: function ()
							{
							},
							highlight: function (element)
							{
								jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
							},
							success: function (label, element)
							{
								jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							},
							submitHandler: function ()
							{
								var template_name = jQuery("#ux_ddl_user_success").val();
								jQuery.post(ajaxurl,
								{
									template_name: template_name,
									data: base64_encode(jQuery("#ux_frm_email_templates").serialize()),
									meta_id: jQuery("#ux_email_template_meta_id").val(),
									param: "coming_soon_booster_email_module",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $coming_soon_type_emails ); ?>"
								},
								function ( data )
								{
									overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
									setTimeout(function ()
									{
										remove_overlay_coming_soon_booster();
										window.location.href = "admin.php?page=csb_email_templates";
									}, 3000);
								});
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_subscription_background_settings':
					?>
					jQuery("#ux_li_subscription").addClass("active");
					jQuery("#ux_li_subscription_background_settings").addClass("active");
					<?php
					if ( '1' === SUBSCRIPTION_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							jQuery("#ux_ddl_subscription_font_size").val("10px");
						});
						jQuery("#ux_frm_subscription_background_settings").validate
						({
							submitHandler: function ()
							{
								premium_edition_notification_coming_soon_booster();
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_subscription_heading_settings':
					?>
					jQuery("#ux_li_subscription").addClass("active");
					jQuery("#ux_li_subscription_heading_settings").addClass("active");
					<?php
					if ( '1' === SUBSCRIPTION_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							if (window.CKEDITOR)
							{
								CKEDITOR.replace("ux_heading_content_subscription");
							}
							jQuery("#ux_ddl_font_family_heading_subscription").val("Poppins");
							jQuery("#ux_ddl_heading_settings_subscription").val("<?php echo isset( $heading_settings_subscription_data_unserialize['heading_settings_subscription'] ) ? esc_attr( $heading_settings_subscription_data_unserialize['heading_settings_subscription'] ) : 'show'; ?>");
							change_settings_coming_soon_booster("#ux_ddl_heading_settings_subscription", "#ux_div_heading_text_subscription");
						});
						jQuery("#ux_frm_subscription_heading_settings").validate
						({
							submitHandler: function ()
							{
								if (window.CKEDITOR)
								{
									jQuery("#ux_txtarea_heading_content_subscription").val(CKEDITOR.instances["ux_heading_content_subscription"].getData());
								} else if (jQuery("#wp-ux_heading_content_subscription-wrap").hasClass("tmce-active"))
								{
									jQuery("#ux_txtarea_heading_content_subscription").val(tinyMCE.get("ux_heading_content_subscription").getContent());
								} else
								{
									jQuery("#ux_txtarea_heading_content_subscription").val(jQuery("#ux_heading_content_subscription").val());
								}
								jQuery.post(ajaxurl,
								{
									data: base64_encode(jQuery("#ux_frm_subscription_heading_settings").serialize()),
									param: "coming_soon_booster_subscription_heading_settings_module",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $csb_heading_settings ); ?>"
								},
								function ()
								{
									overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
									setTimeout(function ()
									{
										remove_overlay_coming_soon_booster();
										window.location.href = "admin.php?page=csb_subscription_heading_settings";
									}, 3000);
								});
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_subscription_description_settings':
					?>
					jQuery("#ux_li_subscription").addClass("active");
					jQuery("#ux_li_subscription_description_settings").addClass("active");
					<?php
					if ( '1' === SUBSCRIPTION_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							if (window.CKEDITOR)
							{
								CKEDITOR.replace("ux_description_content_subscription");
							}
							jQuery("#ux_ddl_description_settings_subscription").val("<?php echo isset( $description_settings_subscription_data_unserialize['description_settings_subscription'] ) ? esc_attr( $description_settings_subscription_data_unserialize['description_settings_subscription'] ) : 'show'; ?>");
							jQuery("#ux_ddl_font_style_description_subscription").val("18px");
							jQuery("#ux_ddl_font_family_description_subscription").val("Poppins:300");
							change_settings_coming_soon_booster("#ux_ddl_description_settings_subscription", "#ux_div_description_text_subscription");
						});
						jQuery("#ux_frm_subscription_description_settings").validate
						({
							submitHandler: function ()
							{
								if (window.CKEDITOR)
								{
									jQuery("#ux_txtarea_description_content_subscription").val(CKEDITOR.instances["ux_description_content_subscription"].getData());
								} else if (jQuery("#wp-ux_description_content_subscription-wrap").hasClass("tmce-active"))
								{
									jQuery("#ux_txtarea_description_content_subscription").val(tinyMCE.get("ux_description_content_subscription").getContent());
								} else
								{
									jQuery("#ux_txtarea_description_content_subscription").val(jQuery("#ux_description_content_subscription").val());
								}
								jQuery.post(ajaxurl,
								{
									data: base64_encode(jQuery("#ux_frm_subscription_description_settings").serialize()),
									param: "coming_soon_booster_subscription_description_settings_module",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $csb_subscription_description_settings ); ?>"
								},
								function ()
								{
									overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
									setTimeout(function ()
									{
										remove_overlay_coming_soon_booster();
										window.location.href = "admin.php?page=csb_subscription_description_settings";
									}, 3000);
								});
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_subscription_textbox_settings':
					?>
					jQuery("#ux_li_subscription").addClass("active");
					jQuery("#ux_li_subscription_textbox_settings").addClass("active");
					<?php
					if ( '1' === SUBSCRIPTION_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							jQuery("#ux_ddl_font_style_subscription").val("20px");
							jQuery("#ux_ddl_font_family_textbox_subscription").val("Poppins:300");
							jQuery("#ux_ddl_placeholder_alignment").val("center");
						});
						jQuery("#ux_frm_textbox_settings").validate
						({
							rules:
							{
								ux_txt_textbox_plceholder:
								{
									required: true
								},
								ux_clr_textbox_color:
								{
									required: true
								}
							},
							errorPlacement: function ()
							{
							},
							highlight: function (element)
							{
								jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
							},
							success: function (label, element)
							{
								jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							},
							submitHandler: function ()
							{
								jQuery.post(ajaxurl,
								{
									data: base64_encode(jQuery("#ux_frm_textbox_settings").serialize()),
									param: "coming_soon_booster_subscripton_textbox_settings",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $csb_textbox_settings ); ?>"
								},
								function ()
								{
									overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
									setTimeout(function ()
									{
										remove_overlay_coming_soon_booster();
										window.location.href = "admin.php?page=csb_subscription_textbox_settings";
									}, 3000);
								});
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_subscription_button_settings':
					?>
					jQuery("#ux_li_subscription").addClass("active");
					jQuery("#ux_li_subscription_button_settings").addClass("active");
					<?php
					if ( '1' === SUBSCRIPTION_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							jQuery("#ux_ddl_font_style_subscription").val("20px");
							jQuery("#ux_ddl_font_family_button_subscription").val("Poppins");
							jQuery("#ux_ddl_label_alignment").val("center");
						});
						jQuery("#ux_frm_button_settings").validate
						({
							rules:
							{
								ux_txt_button_label:
								{
									required: true
								},
							},
							errorPlacement: function ()
							{
							},
							highlight: function (element)
							{
								jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
							},
							success: function (label, element)
							{
								jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							},
							submitHandler: function ()
							{
								jQuery.post(ajaxurl,
								{
									data: base64_encode(jQuery("#ux_frm_button_settings").serialize()),
									param: "coming_soon_booster_subscripton_button_settings",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $csb_button_settings ); ?>"
								},
								function ()
								{
									overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
									setTimeout(function ()
									{
										remove_overlay_coming_soon_booster();
										window.location.href = "admin.php?page=csb_subscription_button_settings";
									}, 3000);
								});
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_subscription_success_settings':
					?>
					jQuery("#ux_li_subscription").addClass("active");
					jQuery("#ux_li_subscription_success_settings").addClass("active");
					<?php
					if ( '1' === SUBSCRIPTION_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							if (window.CKEDITOR)
							{
								CKEDITOR.replace("ux_success_content_subscription");
							}
							jQuery("#ux_ddl_success_settings_subscription").val("<?php echo isset( $success_settings_data_unserialize['success_settings_subscription'] ) ? esc_attr( $success_settings_data_unserialize['success_settings_subscription'] ) : 'show'; ?>");
							jQuery("#ux_ddl_font_style_success_subscription").val("16px");
							jQuery("#ux_ddl_font_family_success_subscription").val("Poppins:300");
							change_settings_coming_soon_booster("#ux_ddl_success_settings_subscription", "#ux_div_success_text_subscription");
						});
						jQuery("#ux_frm_subscription_success_settings").validate
						({
							submitHandler: function ()
							{
								if (window.CKEDITOR)
								{
									jQuery("#ux_txtarea_success_content_subscription").val(CKEDITOR.instances["ux_success_content_subscription"].getData());
								} else if (jQuery("#wp-ux_success_content_subscription-wrap").hasClass("tmce-active"))
								{
									jQuery("#ux_txtarea_success_content_subscription").val(tinyMCE.get("ux_success_content_subscription").getContent());
								} else
								{
									jQuery("#ux_txtarea_success_content_subscription").val(jQuery("#ux_success_content_subscription").val());
								}
								jQuery.post(ajaxurl,
								{
									data: base64_encode(jQuery("#ux_frm_subscription_success_settings").serialize()),
									param: "coming_soon_booster_success_settings_module",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $csb_success_settings ); ?>"
								},
								function ()
								{
									overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
									setTimeout(function ()
									{
										remove_overlay_coming_soon_booster();
										window.location.href = "admin.php?page=csb_subscription_success_settings";
									}, 3000);
								});
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_subscription_error_settings':
					?>
					jQuery("#ux_li_subscription").addClass("active");
					jQuery("#ux_li_subscription_error_settings").addClass("active");
					<?php
					if ( '1' === SUBSCRIPTION_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							if (window.CKEDITOR)
							{
								CKEDITOR.replace("ux_error_content_subscription");
							}
							jQuery("#ux_ddl_error_settings_subscription").val("<?php echo isset( $error_settings_data_unserialize['error_settings_subscription'] ) ? esc_attr( $error_settings_data_unserialize['error_settings_subscription'] ) : 'show'; ?>");
							jQuery("#ux_ddl_font_style_error_subscription").val("16px");
							jQuery("#ux_ddl_font_family_error_subscription").val("Poppins:300");
							change_settings_coming_soon_booster("#ux_ddl_error_settings_subscription", "#ux_div_error_text_subscription");
						});
						jQuery("#ux_frm_subscription_error_settings").validate
						({
							submitHandler: function ()
							{
								if (window.CKEDITOR)
								{
									jQuery("#ux_txtarea_error_content_subscription").val(CKEDITOR.instances["ux_error_content_subscription"].getData());
								} else if (jQuery("#wp-ux_error_content_subscription-wrap").hasClass("tmce-active"))
								{
									jQuery("#ux_txtarea_error_content_subscription").val(tinyMCE.get("ux_error_content_subscription").getContent());
								} else
								{
									jQuery("#ux_txtarea_error_content_subscription").val(jQuery("#ux_error_content_subscription").val());
								}
								jQuery.post(ajaxurl,
								{
									data: base64_encode(jQuery("#ux_frm_subscription_error_settings").serialize()),
									param: "coming_soon_booster_subscription_error_settings_module",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $csb_subscription_error_settings ); ?>"
								},
								function ()
								{
									overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
									setTimeout(function ()
									{
									remove_overlay_coming_soon_booster();
									window.location.href = "admin.php?page=csb_subscription_error_settings";
									}, 3000);
								});
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_subscription_email_templates':
					?>
					jQuery("#ux_li_subscription").addClass("active");
					jQuery("#ux_li_subscription_email_templates").addClass("active");
					<?php
					if ( '1' === SUBSCRIPTION_COMING_SOON_BOOSTER ) {
						?>
						if (typeof (coming_soon_booster_email_template_type) !== "function")
						{
							function coming_soon_booster_email_template_type()
							{
								var email_template_data = jQuery("#ux_ddl_user_success").val();
								jQuery.post(ajaxurl,
								{
									data: email_template_data,
									param: "coming_soon_booster_susbcription_email_templates_module",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $coming_soon_type_templates_subscription ); ?>"
								},
								function (data)
								{
									jQuery("#ux_email_template_meta_id").val(jQuery.parseJSON(data)[0]["meta_id"]);
									jQuery("#ux_txt_send_to").val(jQuery.parseJSON(data)[0]["subscription_email_send_to"]);
									jQuery("#ux_txt_cc").val(jQuery.parseJSON(data)[0]["subscription_email_cc"]);
									jQuery("#ux_txt_bcc").val(jQuery.parseJSON(data)[0]["subscription_email_bcc"]);
									jQuery("#ux_txt_subject").val(jQuery.parseJSON(data)[0]["subscription_email_subject"]);
									if (window.CKEDITOR)
									{
										CKEDITOR.instances["ux_heading_content"].setData(jQuery.parseJSON(data)[0]["subscription_email_message"]);
									} else if (jQuery("#wp-ux_heading_content-wrap").hasClass("tmce-active"))
									{
										tinyMCE.get("ux_heading_content").setContent(jQuery.parseJSON(data)[0]["subscription_email_message"]);
									} else
									{
										jQuery("#ux_heading_content").val(jQuery.parseJSON(data)[0]["subscription_email_message"]);
									}
								});
							}
						}
						jQuery(document).ready(function ()
						{
						if (window.CKEDITOR)
						{
							CKEDITOR.replace("ux_heading_content");
						}
						setTimeout(function ()
						{
							coming_soon_booster_email_template_type();
						}, 500);
						});
						jQuery("#ux_frm_subscription_email_templates").validate
						({
							rules:
							{
								ux_txt_send_to:
								{
									required: true,
									email: true
								}
							},
							errorPlacement: function ()
							{
							},
							highlight: function (element)
							{
								jQuery(element).closest(".form-group").removeClass("has-success").addClass("has-error");
							},
							success: function (label, element)
							{
								jQuery(element).closest(".form-group").removeClass("has-error").addClass("has-success");
							},
							submitHandler: function ()
							{
								var template_name = jQuery("#ux_ddl_user_success").val();
								jQuery.post(ajaxurl,
								{
									template_name: template_name,
									data: base64_encode(jQuery("#ux_frm_subscription_email_templates").serialize()),
									meta_id: jQuery("#ux_email_template_meta_id").val(),
									param: "coming_soon_booster_subscription_email_module",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $coming_soon_type_emails_subscription ); ?>"
								},
								function ( data )
								{
									overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
									setTimeout(function ()
									{
										remove_overlay_coming_soon_booster();
										window.location.href = "admin.php?page=csb_subscription_email_templates";
									}, 3000);
								});
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_subscribers':
					?>
					jQuery("#ux_li_subscribers").addClass("active");
					<?php
					if ( '1' === SUBSCRIBERS_COMING_SOON_BOOSTER ) {
						?>
						var oTable = jQuery("#ux_tbl_subscribers").dataTable
						({
							"pagingType": "full_numbers",
							"language":
							{
								"emptyTable": "No data available in table",
								"info": "Showing _START_ to _END_ of _TOTAL_ entries",
								"infoEmpty": "No entries found",
								"infoFiltered": "(filtered1 from _MAX_ total entries)",
								"lengthMenu": "Show _MENU_ entries",
								"search": "Search:",
								"zeroRecords": "No matching records found"
							},
							"bSort": true,
							"pageLength": 10,
							"aoColumnDefs": [{"bSortable": false, "aTargets": [0]}],
							dom: "lBfrtip",
							buttons: [
							{
								extend: "excelHtml5",
								action: function() {
									this.disable();
								}
							}]
						});
						jQuery(".dt-button").click(function ()
						{
							premium_edition_notification_coming_soon_booster();
						});
						jQuery("#ux_chk_subscribers").click(function ()
						{
							jQuery("input[type=checkbox]", oTable.fnGetFilteredNodes()).attr("checked", this.checked);
						});
						if (typeof (all_Check_subscriber_coming_soon_booster) !== "function")
						{
							function all_Check_subscriber_coming_soon_booster(id)
							{
								if (jQuery("input:checked", oTable.fnGetFilteredNodes()).length === jQuery("input[type=checkbox]", oTable.fnGetFilteredNodes()).length)
								{
									jQuery("#ux_chk_subscribers").attr("checked", "checked");
								} else
								{
									jQuery("#ux_chk_subscribers").removeAttr("checked");
								}
							}
						}
						jQuery("#ux_frm_subscribers").validate
						({
							submitHandler: function ()
							{
								premium_edition_notification_coming_soon_booster();
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_contact_form_data':
					?>
					jQuery("#ux_li_contact_form_data").addClass("active");
					<?php
					if ( '1' === CONTACT_FORM_DATA_COMING_SOON_BOOSTER ) {
						?>
						var oTable = jQuery("#ux_tbl_contact_form_data").dataTable
						({
							"pagingType": "full_numbers",
							"language":
							{
								"emptyTable": "No data available in table",
								"info": "Showing _START_ to _END_ of _TOTAL_ entries",
								"infoEmpty": "No entries found",
								"infoFiltered": "(filtered1 from _MAX_ total entries)",
								"lengthMenu": "Show _MENU_ entries",
								"search": "Search:",
								"zeroRecords": "No matching records found"
							},
							"bSort": true,
							"pageLength": 10,
							dom: "lBfrtip",
							buttons: [{
								extend: "excelHtml5",
								action: function ()
								{
									this.disable(); // disable button
								}
							}]
						});
						jQuery(".dt-button").click(function ()
						{
							premium_edition_notification_coming_soon_booster();
						});
						jQuery("#ux_chk_contact_form_data").click(function ()
						{
							jQuery("input[type=checkbox]", oTable.fnGetFilteredNodes()).attr("checked", this.checked);
						});
						if (typeof (checkAllData_CONTACT_FORM_DATA_COMING_SOON_BOOSTER) !== "function")
						{
							function checkAllData_CONTACT_FORM_DATA_COMING_SOON_BOOSTER()
							{
								if (jQuery("input:checked", oTable.fnGetFilteredNodes()).length === jQuery("input[type=checkbox]", oTable.fnGetFilteredNodes()).length)
								{
									jQuery("#ux_chk_contact_form_data").attr("checked", "checked");
								} else
								{
									jQuery("#ux_chk_contact_form_data").removeAttr("checked");
								}
							}
						}
						jQuery("#ux_frm_contact_form_data").validate
						({
							submitHandler: function ()
							{
								premium_edition_notification_coming_soon_booster();
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_other_settings':
					?>
					jQuery("#ux_li_other_settings").addClass("active");
					<?php
					if ( '1' === OTHER_SETTINGS_COMING_SOON_BOOSTER ) {
						?>
						jQuery(document).ready(function ()
						{
							jQuery("#ux_ddl_remove_tables").val("<?php echo isset( $other_settings_module_unserialize['remove_tables_at_uninstall'] ) ? esc_attr( $other_settings_module_unserialize['remove_tables_at_uninstall'] ) : ''; ?>");
							jQuery("#ux_ddl_ip_address_fetching_method").val("<?php echo isset( $other_settings_module_unserialize['ip_address_fetching_method'] ) ? esc_attr( $other_settings_module_unserialize['ip_address_fetching_method'] ) : ''; ?>");
							jQuery("#ux_ddl_gdpr_compliance").val("<?php echo isset( $other_settings_module_unserialize['gdpr_compliance'] ) ? esc_attr( $other_settings_module_unserialize['gdpr_compliance'] ) : 'enable'; ?>");
							gdpr_compliance_coming_soon_booster();
						});
						jQuery("#ux_frm_other_settings").validate
						({
							submitHandler: function ()
							{
								overlay_loading_coming_soon_booster(<?php echo wp_json_encode( $csb_settings_updated ); ?>);
								jQuery.post(ajaxurl,
								{
									data: base64_encode(jQuery("#ux_frm_other_settings").serialize()),
									param: "coming_soon_booster_other_settings",
									action: "coming_soon_booster_backend",
									_wp_nonce: "<?php echo esc_attr( $csb_other_settings_data ); ?>"
								},
								function ()
								{
									setTimeout(function ()
									{
										remove_overlay_coming_soon_booster();
										window.location.href = "admin.php?page=csb_other_settings";
									}, 3000);
								});
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_roles_and_capabilities':
					?>
					jQuery("#ux_li_roles_capabilities").addClass("active");
					<?php
					if ( '1' === ROLES_AND_CAPABILITIES_COMING_SOON_BOOSTER ) {
						?>
						if (typeof (show_roles_capabilities_coming_soon_booster) !== "function")
						{
							function show_roles_capabilities_coming_soon_booster(id, div_id)
							{
								if (jQuery(id).prop("checked"))
								{
									jQuery("#" + div_id).css("display", "block");
								} else
								{
									jQuery("#" + div_id).css("display", "none");
								}
							}
						}
						if (typeof (full_control_function_coming_soon_booster) !== "function")
						{
							function full_control_function_coming_soon_booster(id, div_id)
							{
								var checkbox_id = jQuery(id).prop("checked");
								jQuery("#" + div_id + " input[type=checkbox]").each(function ()
								{
									if (checkbox_id)
									{
										jQuery(this).attr("checked", "checked");
										if (jQuery(id).attr("id") !== jQuery(this).attr("id"))
										{
											jQuery(this).attr("disabled", "disabled");
										}
									} else
									{
										if (jQuery(id).attr("id") !== jQuery(this).attr("id"))
										{
											jQuery(this).removeAttr("disabled");
											jQuery("#ux_chk_other_capabilities_manage_options").attr("disabled", "disabled");
											jQuery("#ux_chk_other_capabilities_read").attr("disabled", "disabled");
										}
									}
								});
							}
						}
						jQuery(document).ready(function ()
						{
							jQuery("#ux_ddl_top_bar").val("<?php echo isset( $details_roles_capabilities['show_coming_soon_booster_top_bar_menu'] ) ? esc_attr( $details_roles_capabilities['show_coming_soon_booster_top_bar_menu'] ) : 'enable'; ?>");
							show_roles_capabilities_coming_soon_booster("#ux_chk_author", "ux_div_author_roles");
							full_control_function_coming_soon_booster("#ux_chk_full_control_author", "ux_div_author_roles");
							show_roles_capabilities_coming_soon_booster("#ux_chk_editor", "ux_div_editor_roles");
							full_control_function_coming_soon_booster("#ux_chk_full_control_editor", "ux_div_editor_roles");
							show_roles_capabilities_coming_soon_booster("#ux_chk_contributor", "ux_div_contributor_roles");
							full_control_function_coming_soon_booster("#ux_chk_full_control_contributor", "ux_div_contributor_roles");
							show_roles_capabilities_coming_soon_booster("#ux_chk_subscriber", "ux_div_subscriber_roles");
							full_control_function_coming_soon_booster("#ux_chk_full_control_subscriber", "ux_div_subscriber_roles");
							show_roles_capabilities_coming_soon_booster("#ux_chk_other", "ux_div_other_roles");
							full_control_function_coming_soon_booster("#ux_chk_full_control_other", "ux_div_other_roles");
							full_control_function_coming_soon_booster("#ux_chk_full_control_other_roles", "ux_div_other_roles_capabilities");
						});
						var roles = [];
						jQuery("#ux_frm_roles_and_capabilities").validate
						({
							submitHandler: function ()
							{
								premium_edition_notification_coming_soon_booster();
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
				case 'csb_system_information':
					?>
					jQuery("#ux_li_system_information").addClass("active");
					<?php
					if ( '1' === SYSTEM_INFORMATION_COMING_SOON_BOOSTER ) {
						?>
						jQuery.getSystemReport = function (strDefault, stringCount, string, location)
						{
							var o = strDefault.toString();
							if (!string)
							{
								string = "0";
							}
							while (o.length < stringCount)
							{
								if (location === "undefined")
								{
									o = string + o;
								} else
								{
									o = o + string;
								}
							}
							return o;
						};
						jQuery(".system-report").click(function ()
						{
						var report = "";
						jQuery(".custom-form-body").each(function ()
						{
							jQuery("h3.form-section", jQuery(this)).each(function ()
							{
								report = report + "\n### " + jQuery.trim(jQuery(this).text()) + " ###\n\n";
							});
							jQuery("tbody > tr", jQuery(this)).each(function ()
							{
								var the_name = jQuery.getSystemReport(jQuery.trim(jQuery(this).find("strong").text()), 25, " ");
								var the_value = jQuery.trim(jQuery(this).find("span").text());
								var value_array = the_value.split(", ");
								if (value_array.length > 1)
								{
									var temp_line = "";
									jQuery.each(value_array, function (key, line)
									{
										var tab = (key === 0) ? 0 : 25;
										temp_line = temp_line + jQuery.getSystemReport("", tab, " ", "f") + line + "\n";
									});
									the_value = temp_line;
								}
								report = report + "" + the_name + the_value + "\n";
							});
						});
						try
						{
							jQuery("#ux_system_information").slideDown();
							jQuery("#ux_system_information textarea").val(report).focus().select();
							return false;
						} catch (e)
						{
							console.log(e);
						}
						return false;
						});
						jQuery("#ux_btn_system_information").click(function ()
						{
							if (jQuery("#ux_btn_system_information").text() === "Close System Information!")
							{
								jQuery("#ux_system_information").slideUp();
								jQuery("#ux_btn_system_information").html("Get System Information!");
							} else
							{
								jQuery("#ux_btn_system_information").html("Close System Information!");
								jQuery("#ux_btn_system_information").removeClass("system-information");
								jQuery("#ux_btn_system_information").addClass("close-information");
							}
						});
						load_sidebar_content_coming_soon_booster();
						<?php
					}
					break;
			}
		}
		?>
		</script>
		<?php
	}
}
