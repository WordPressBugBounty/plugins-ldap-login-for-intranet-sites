<?php
/**
 * Display Login Settings Page.
 *
 * @package miniOrange_LDAP_AD_Integration
 * @subpackage views
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="mo_ldap_outer_box">
	<div class="mo_ldap_login_settings_outer">
		<div>
		<div class="mo_ldap_heading_container">
			<div class="mo_ldap_local_footer_btns_container mo_ldap_local_btns_upr_space_remove">
				<a 
					<?php
					echo 'href="' . esc_url(
						add_query_arg(
							array(
								'subtab' => 'attribute-mapping',
								'tab'    => 'default',
							),
							$mo_ldap_local_filtered_current_page_url
						)
					)
					. '"';
					?>
					class="mo_ldap_local_unset_link_affect">
					<button type="button" class="mo_ldap_back_btn">Back</button>
				</a>
				<a href="<?php echo esc_url( admin_url( 'admin.php?page=mo_ldap_local_login&tab=advance-sync' ) ); ?>" class="mo_ldap_local_unset_link_affect">
					<button type="button" class="mo_ldap_configure_btn">Configure Sync</button>
				</a>
			</div>
		</div>
		<br>
		<form name="enable_login_form" id="enable_login_form" method="post" action="">
			<?php wp_nonce_field( 'mo_ldap_local_enable' ); ?>
			<input type="hidden" name="option" value="mo_ldap_local_enable" />
			<div>
				<input type="checkbox" id="enable_ldap_login" class="mo_ldap_local_toggle_switch_hide" name="enable_ldap_login" value="1" <?php checked( esc_attr( strcasecmp( get_option( 'mo_ldap_local_enable_login' ), '1' ) === 0 ) ); ?> />
				<label for="enable_ldap_login" class="mo_ldap_local_toggle_switch"></label>
				<label for="enable_ldap_login" class="mo_ldap_local_d_inline mo_ldap_input_label_text">
					Enable Login Using LDAP
				</label>	
			</div>
			<div class="mo_ldap_test_authentication_heading mo_ldap_local_enable_ldap_login_notice">
				This will enable users to login to this WordPress site using their LDAP/Active Directory credentials.<br><br>
				<b>Please check this only after you have successfully tested your configuration as the default WordPress login will stop working.</b>
			</div>
		</form>
		<br>
		<form name="enable_admin_wp_login" id="enable_admin_wp_login" method="post" action="">
			<?php wp_nonce_field( 'mo_ldap_local_enable_admin_wp_login' ); ?>
			<input type="hidden" name="option" value="mo_ldap_local_enable_admin_wp_login" />
			<div>
			<?php
			$mo_ldap_local_enable_ldap_login = get_option( 'mo_ldap_local_enable_login' );
			?>
				<input type="checkbox" id="mo_ldap_local_enable_admin_wp_login" class="mo_ldap_local_toggle_switch_hide" name="mo_ldap_local_enable_admin_wp_login" value="1" <?php checked( esc_attr( strcasecmp( get_option( 'mo_ldap_local_enable_admin_wp_login' ), '1' ) === 0 ) ); ?>/>
				<label for="mo_ldap_local_enable_admin_wp_login" class="mo_ldap_local_toggle_switch"></label>
				<label for="mo_ldap_local_enable_admin_wp_login" class="mo_ldap_local_d_inline mo_ldap_input_label_text">
					Authenticate Administrators from both LDAP and WordPress
				</label>
			</div>
		</form>
		<br>
		<form name="enable_register_user_form" id="enable_register_user_form" method="post" action="">
			<?php wp_nonce_field( 'mo_ldap_local_register_user' ); ?>
			<input type="hidden" name="option" value="mo_ldap_local_register_user" />
			<div>
				<input type="checkbox" id="mo_ldap_local_register_user" class="mo_ldap_local_toggle_switch_hide" name="mo_ldap_local_register_user" value="1" <?php checked( esc_attr( strcasecmp( get_option( 'mo_ldap_local_register_user' ), '1' ) === 0 ) ); ?>/>
				<label for="mo_ldap_local_register_user" class="mo_ldap_local_toggle_switch"></label>
				<label for="mo_ldap_local_register_user" class="mo_ldap_local_d_inline mo_ldap_input_label_text">
					Enable Auto Registering users if they do not exist in WordPress
				</label>
			</div>
		</form>
		<br>
		</div>
	</div>

	<div class="mo_ldap_local_outer mo_ldap_local_premium_box mo_ldap_local_premium_box_no_hover">
		<div class="mo_ldap_local_premium_role_mapping_banner mo_ldap_d_none mo_ldap_local_login_settings_premium">
		</div>
		<div class="mo_ldap_local_premium_feature_box">
			<div class="mo_ldap_local_login_settings_premium_row">
				<input type="checkbox" id="mo_ldap_local_toggle_switch_3" class="mo_ldap_local_toggle_switch_hide" disabled="disabled" aria-disabled="true" />
				<label for="mo_ldap_local_toggle_switch_3" class="mo_ldap_local_toggle_switch"></label>
				<span class="mo_ldap_local_login_settings_premium_tooltip mo_ldap_local_tooltip">
					<span class="mo_ldap_local_d_inline mo_ldap_input_label_text"><?php echo esc_html__( 'Authenticate WP Users from both LDAP and WordPress', 'ldap-login-for-intranet-sites' ); ?> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" /></span>
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</span>
			</div>
			<br>
			<div class="mo_ldap_local_login_settings_premium_row">
				<input type="checkbox" id="mo_ldap_local_toggle_switch_4" class="mo_ldap_local_toggle_switch_hide" disabled="disabled" aria-disabled="true" />
				<label for="mo_ldap_local_toggle_switch_4" class="mo_ldap_local_toggle_switch"></label>
				<span class="mo_ldap_local_login_settings_premium_tooltip mo_ldap_local_tooltip">
					<span class="mo_ldap_local_d_inline mo_ldap_input_label_text"><?php echo esc_html__( 'Enable Kerberos/NTLM Auto-Login', 'ldap-login-for-intranet-sites' ); ?> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" /></span>
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</span>
			</div>
			<br>
			<div class="mo_ldap_local_login_settings_premium_row">
				<input type="checkbox" id="mo_ldap_local_toggle_switch_5" class="mo_ldap_local_toggle_switch_hide" disabled="disabled" aria-disabled="true" />
				<label for="mo_ldap_local_toggle_switch_5" class="mo_ldap_local_toggle_switch"></label>
				<span class="mo_ldap_local_login_settings_premium_tooltip mo_ldap_local_tooltip">
					<span class="mo_ldap_local_d_inline mo_ldap_input_label_text"><?php echo esc_html__( 'Protect all website content by login', 'ldap-login-for-intranet-sites' ); ?> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" /></span>
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</span>
			</div>
			<br>
			<h3>Restrict User login by Role</h3>
			<br>
			<div class="mo_ldap_local_login_settings_premium_row">
				<input type="checkbox" style="background:#E1E1E1;" disabled="disabled" aria-disabled="true" />
				<span class="mo_ldap_local_login_settings_premium_tooltip mo_ldap_local_tooltip">
					<span class="mo_ldap_input_label_text"><?php echo esc_html__( 'Enable Restrict User login by Role', 'ldap-login-for-intranet-sites' ); ?> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" /></span>
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</span>
			</div>

			<div class="mo_ldap_test_authentication_heading">
				Note: User with the Administrator role will not be restricted while login.
			</div>

			<br>
			<div class="mo_ldap_local_select_roles">Select Role(s) <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" /></div>
			<select id="mo-ldap-directory-server" name="directory-server" class="mo_ldap_local_standerd_input mo_ldap_select_directory_server" disabled>
				<option class="mo_ldap_select_option" value="">Select Role(s)</option>
			<?php
			$mo_ldap_local_default_role = get_option( 'default_role' );
			wp_dropdown_roles( $mo_ldap_local_default_role );
			?>
			</select>

			<div class="mo_ldap_local_input_container mo_ldap_local_horizontal_flex_container mo_ldap_local_content_start mo_ldap_local_flex_gap">
				<input type="button" class="button1 mo_ldap_local_disabled_button" value="Save Configuration" disabled />
			</div>
		</div>
	</div>

</div>
