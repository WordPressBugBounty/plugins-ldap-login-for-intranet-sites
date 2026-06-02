<?php
/**
 * Display advance sync page.
 *
 * @package miniOrange_LDAP_AD_Integration
 * @subpackage views
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mo_ldap_local_current_subtab = isset( $_GET['subtab'] ) ? sanitize_key( wp_unslash( $_GET['subtab'] ) ) : 'wp-to-ldap-directory_sync'; //phpcs:ignore WordPress.Security.NonceVerification.Recommended, - Reading GET parameter from the URL for checking the sub-tab name, doesn't require nonce verification.
?>

<div class="mo_ldap_local_horizontal_flex_container mo_ldap_local_subtab_container">
	<div class="<?php echo strcmp( $mo_ldap_local_current_subtab, 'wp-to-ldap-directory_sync' ) === 0 ? 'mo_ldap_local_active_subtab' : ''; ?>">
		<a href="
		<?php
		echo esc_url(
			add_query_arg(
				array(
					'tab'    => 'advance-sync',
					'subtab' => 'wp-to-ldap-directory_sync',
				),
				$mo_ldap_local_filtered_current_page_url
			)
		);
		?>
		" class="mo_ldap_local_unset_link_affect">WordPress to LDAP Sync</a>
	</div>
	<div class="<?php echo strcmp( $mo_ldap_local_current_subtab, 'ldap-to-wp-directory_sync' ) === 0 ? 'mo_ldap_local_active_subtab' : ''; ?>">
		<a href="
		<?php
		echo esc_url(
			add_query_arg(
				array(
					'tab'    => 'advance-sync',
					'subtab' => 'ldap-to-wp-directory_sync',
				),
				$mo_ldap_local_filtered_current_page_url
			)
		);
		?>
		" class="mo_ldap_local_unset_link_affect">LDAP to WordPress Sync</a>
	</div>
	<div class="<?php echo strcmp( $mo_ldap_local_current_subtab, 'password_sync' ) === 0 ? 'mo_ldap_local_active_subtab' : ''; ?>">
		<a href="
		<?php
		echo esc_url(
			add_query_arg(
				array(
					'tab'    => 'advance-sync',
					'subtab' => 'password_sync',
				),
				$mo_ldap_local_filtered_current_page_url
			)
		);
		?>
		" class="mo_ldap_local_unset_link_affect">AD Self-Service Password Reset</a>
	</div>
	<div class="<?php echo strcmp( $mo_ldap_local_current_subtab, 'profile_picture_sync' ) === 0 ? 'mo_ldap_local_active_subtab' : ''; ?>">
		<a href="
		<?php
		echo esc_url(
			add_query_arg(
				array(
					'tab'    => 'advance-sync',
					'subtab' => 'profile_picture_sync',
				),
				$mo_ldap_local_filtered_current_page_url
			)
		);
		?>
		" class="mo_ldap_local_unset_link_affect">Profile Picture Sync</a>
	</div>
</div>
<hr class="mo_ldap_hr">

<?php
if ( strcasecmp( $mo_ldap_local_current_subtab, 'wp-to-ldap-directory_sync' ) === 0 ) {
	?>
	<div class="mo_ldap_local_advance_sync_container">
		<br>
		<form name="enable_sync_toggle_form" id="enable_sync_toggle_form" method="post" action="" style="display: inline;">
			<?php wp_nonce_field( 'mo_ldap_local_toggle_sync' ); ?>
			<input type="hidden" name="option" value="mo_ldap_local_toggle_sync" />
			<div style="margin-left: 4%;">
				<?php
				$mo_ldap_local_wp_to_ldap_search_base = $utils::decrypt( get_option( 'mo_ldap_local_wp_to_ldap_search_base' ) );
				$mo_ldap_local_has_search_base        = ! empty( $mo_ldap_local_wp_to_ldap_search_base );
				$mo_ldap_local_is_disabled            = $mo_ldap_local_has_search_base ? '' : 'disabled';
				if ( ! $mo_ldap_local_has_search_base ) {
					update_option( 'mo_ldap_local_enable_ldap_add', '0' );
				}
				$mo_ldap_local_is_currently_enabled = $mo_ldap_local_has_search_base && ( strcasecmp( get_option( 'mo_ldap_local_enable_ldap_add' ), '1' ) === 0 );
				$mo_ldap_local_is_checked           = $mo_ldap_local_is_currently_enabled ? 'checked' : '';
				$mo_ldap_cursor                     = $mo_ldap_local_has_search_base ? '' : 'mo_ldap_cursor_not_allowed';
				?>
				<input type="checkbox"
					id="mo_ldap_local_enable_ldap_add"
					class="mo_ldap_local_toggle_switch_hide"
					name="mo_ldap_local_enable_ldap_add"
					value="1"
					<?php echo esc_attr( $mo_ldap_local_is_checked ); ?>
					<?php echo esc_attr( $mo_ldap_local_is_disabled ); ?> />
				<?php if ( ! $mo_ldap_local_has_search_base ) : ?>
					<p class="mo_ldap_local_ldaps_note" style="width: 90%; color: red !important; font-size: 14px;"><b>NOTE: Please configure the WordPress to LDAP Sync Search Base below to enable this feature.</b></p>
				<?php endif; ?>
				<label for="mo_ldap_local_enable_ldap_add"
					class="
					<?php
					echo $mo_ldap_local_has_search_base ? 'mo_ldap_local_toggle_switch ' : '';
					echo esc_attr( $mo_ldap_cursor );
					?>
				">
				</label>
				<label for="mo_ldap_local_enable_ldap_add" class="mo_ldap_local_d_inline mo_ldap_input_label_text">
					Add new user in LDAP when registered in WordPress
				</label>
			</div>
		</form>

		<form name="sync_search_base_form" id="sync_search_base_form" method="post" action="">
			<?php wp_nonce_field( 'mo_ldap_local_save_sync_configuration' ); ?>
			<input type="hidden" name="option" value="mo_ldap_local_save_sync_configuration" />			
			<div class="mo_ldap_user_mapping_search_base" style="margin-top: 20px;">
				<div class="mo_ldap_local_input_field_container mo_ldap_local_searh_base_container">
					<div class="mo_ldap_input_label_text mo_ldap_local_config_label" style="display: flex; margin-left: 4%;">User Base:<span style="color:red;">*</span></div>
					<div class="mo_ldap_search_base_details">
						<div class="mo_ldap_search_base_details_inner">
							<?php $mo_ldap_local_wp_to_ldap_search_base = $utils::decrypt( get_option( 'mo_ldap_local_wp_to_ldap_search_base' ) ); ?>
							<input type="text" id="wp_to_ldap_search_base" name="wp_to_ldap_search_base" placeholder="dc=domain,dc=com" class="mo_ldap_local_standerd_input mo_ldap_local_input_field1" style="width:58%;" value="<?php echo esc_attr( $mo_ldap_local_wp_to_ldap_search_base ); ?>" />
							<div id="wp_to_ldap_searchbases" class="mo_ldap_select_search_base mo_ldap_search_base mo_ldap_user_mapping_tem" style="font-weight: 500;">
								Select Search Base   
								<svg style="margin-left: 10px" fill="#0076E1" height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 490.4 490.4" xml:space="preserve" stroke="#0076E1"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M484.1,454.796l-110.5-110.6c29.8-36.3,47.6-82.8,47.6-133.4c0-116.3-94.3-210.6-210.6-210.6S0,94.496,0,210.796 s94.3,210.6,210.6,210.6c50.8,0,97.4-18,133.8-48l110.5,110.5c12.9,11.8,25,4.2,29.2,0C492.5,475.596,492.5,463.096,484.1,454.796z M41.1,210.796c0-93.6,75.9-169.5,169.5-169.5s169.6,75.9,169.6,169.5s-75.9,169.5-169.5,169.5S41.1,304.396,41.1,210.796z"></path> </g> </g></svg>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Note above Save Configuration button -->
			<div class="mo_ldap_local_input_paragraph_div" style="margin-top: 15px;">
				<p style = "margin-top: -15px; margin-left: 15px;">
					<strong>Note:</strong> Select the search tree/base under which the users will be created.
				</p>
			</div>

			<div style="margin-left: 33.4%; margin-top: 10px;">
				<button type="submit" name="mo_ldap_sync_settings_submit" value="1" class="mo_ldap_troubleshooting_btn" style="background: #0076E1; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: normal; font-size: 14px; padding: 12px 24px;">
					Save Configuration
				</button>
			</div>
		</form>
	</div>
	<div class="mo_ldap_local_outer mo_ldap_local_premium_box mo_ldap_local_premium_box_no_hover">
		<div class="mo_ldap_local_premium_feature_box">
			<div class="mo_ldap_local_imp_exp_headings">
				<?php echo esc_html__( 'WordPress to LDAP Sync', 'ldap-login-for-intranet-sites' ); ?>
			</div>
			<div class="mo_ldap_local_login_settings_premium_row">
				<input type="checkbox" id="mo_ldap_adv_sync_wp_delete_ldap" class="mo_ldap_local_toggle_switch_hide" disabled="disabled" aria-disabled="true" />
				<label for="mo_ldap_adv_sync_wp_delete_ldap" class="mo_ldap_local_toggle_switch"></label>
				<span class="mo_ldap_local_login_settings_premium_tooltip mo_ldap_local_tooltip">
					<span class="mo_ldap_local_d_inline mo_ldap_input_label_text"><?php echo esc_html__( 'Delete user in LDAP when deleted in WordPress', 'ldap-login-for-intranet-sites' ); ?> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" /></span>
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</span>
			</div>
			<br>

			<div class="mo_ldap_local_login_settings_premium_row">
				<input type="checkbox" id="mo_ldap_adv_sync_wp_update_profile" class="mo_ldap_local_toggle_switch_hide" disabled="disabled" aria-disabled="true" />
				<label for="mo_ldap_adv_sync_wp_update_profile" class="mo_ldap_local_toggle_switch"></label>
				<span class="mo_ldap_local_login_settings_premium_tooltip mo_ldap_local_tooltip">
					<span class="mo_ldap_local_d_inline mo_ldap_input_label_text"><?php echo esc_html__( 'Update user profile in LDAP when updated in WordPress', 'ldap-login-for-intranet-sites' ); ?> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" /></span>
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</span>
			</div>
			<br>

			<div class="mo_ldap_local_login_settings_premium_row">
				<input type="checkbox" id="mo_ldap_adv_sync_wp_groups" class="mo_ldap_local_toggle_switch_hide" disabled="disabled" aria-disabled="true" />
				<label for="mo_ldap_adv_sync_wp_groups" class="mo_ldap_local_toggle_switch"></label>
				<span class="mo_ldap_local_login_settings_premium_tooltip mo_ldap_local_tooltip">
					<span class="mo_ldap_local_d_inline mo_ldap_input_label_text"><?php echo esc_html__( 'Add/Remove user to/from groups in LDAP server when respective user role changed in WordPress', 'ldap-login-for-intranet-sites' ); ?> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" /></span>
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</span>
			</div>
			<br>

			<button type="button" class="mo_ldap_local_disabled_button" disabled="disabled" aria-disabled="true">
				<?php echo esc_html__( 'Sync WordPress Users', 'ldap-login-for-intranet-sites' ); ?>
			</button>
		</div>
	</div>
	<?php
} elseif ( strcasecmp( $mo_ldap_local_current_subtab, 'ldap-to-wp-directory_sync' ) === 0 ) {
	?>
	<div class="mo_ldap_local_outer mo_ldap_local_premium_box mo_ldap_local_premium_box_no_hover">
		<div class="mo_ldap_local_premium_feature_box">
			<div class="mo_ldap_local_imp_exp_headings">
				<?php echo esc_html__( 'LDAP to WordPress Sync', 'ldap-login-for-intranet-sites' ); ?>
			</div>
			<br>
			<div class="mo_ldap_local_login_settings_premium_row">
				<input type="checkbox" id="mo_ldap_adv_sync_ldap_wp_search_base" class="mo_ldap_local_toggle_switch_hide" disabled="disabled" aria-disabled="true" />
				<label for="mo_ldap_adv_sync_ldap_wp_search_base" class="mo_ldap_local_toggle_switch"></label>
				<span class="mo_ldap_local_login_settings_premium_tooltip mo_ldap_local_tooltip">
					<span class="mo_ldap_local_d_inline mo_ldap_input_label_text"><?php echo esc_html__( 'Specify Search base and Search filter', 'ldap-login-for-intranet-sites' ); ?> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" /></span>
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</span>
			</div>
			<br>
			<div class="mo_ldap_local_premium_control_block mo_ldap_local_input_field_container">
				<div class="mo_ldap_local_login_settings_premium_tooltip mo_ldap_local_tooltip">
					<div>
						<?php echo esc_html__( 'LDAP to WP Sync Frequency', 'ldap-login-for-intranet-sites' ); ?> <span style="color:red;">*</span> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" />
					</div>
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</div>
				<select class="mo_ldap_local_standerd_input mo_ldap_select_directory_server" style="background: #f5f5f5;" disabled="disabled" aria-disabled="true">
					<option class="mo_ldap_select_option" value=""><?php echo esc_html__( 'Daily', 'ldap-login-for-intranet-sites' ); ?></option>
				</select>
			</div>
			<br>
			<div class="mo_ldap_local_premium_control_block mo_ldap_local_input_field_container">
				<div class="mo_ldap_local_login_settings_premium_tooltip mo_ldap_local_tooltip">
					<div>
						<?php echo esc_html__( 'Select Timezone', 'ldap-login-for-intranet-sites' ); ?> <span style="color:red;">*</span> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" />
					</div>
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</div>
				<select class="mo_ldap_local_standerd_input mo_ldap_select_directory_server" style="background: #f5f5f5;" disabled="disabled" aria-disabled="true">
					<option class="mo_ldap_select_option" value=""><?php echo esc_html__( 'Abidjan', 'ldap-login-for-intranet-sites' ); ?></option>
				</select>
			</div>

			<br>

			<div class="mo_ldap_local_login_settings_premium_row">
				<input type="checkbox" id="mo_ldap_adv_sync_ldap_wp_unsync" class="mo_ldap_local_toggle_switch_hide" disabled="disabled" aria-disabled="true" />
				<label for="mo_ldap_adv_sync_ldap_wp_unsync" class="mo_ldap_local_toggle_switch"></label>
				<span class="mo_ldap_local_login_settings_premium_tooltip mo_ldap_local_tooltip">
					<span class="mo_ldap_local_d_inline mo_ldap_input_label_text"><?php echo esc_html__( 'Unsync WordPress Users not present in LDAP', 'ldap-login-for-intranet-sites' ); ?> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" /></span>
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</span>
			</div>
			<br>
			<div class="mo_ldap_local_login_settings_premium_row">
				<input type="checkbox" id="mo_ldap_adv_sync_ldap_wp_schedule" class="mo_ldap_local_toggle_switch_hide" disabled="disabled" aria-disabled="true" />
				<label for="mo_ldap_adv_sync_ldap_wp_schedule" class="mo_ldap_local_toggle_switch"></label>
				<span class="mo_ldap_local_login_settings_premium_tooltip mo_ldap_local_tooltip">
					<span class="mo_ldap_local_d_inline mo_ldap_input_label_text"><?php echo esc_html__( 'Enable Schedule Sync', 'ldap-login-for-intranet-sites' ); ?> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" /></span>
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</span>
			</div>

			<br>

			<button type="button" class="mo_ldap_local_disabled_button" disabled="disabled" aria-disabled="true">
				<?php echo esc_html__( 'Save Configuration', 'ldap-login-for-intranet-sites' ); ?>
			</button>

			<button type="button" class="mo_ldap_troubleshooting_btn mo_ldap_local_md_disabled_btn" disabled="disabled" aria-disabled="true">
				<?php echo esc_html__( 'Sync Users Now', 'ldap-login-for-intranet-sites' ); ?>
			</button>
		</div>
	</div>
	<?php
} elseif ( strcasecmp( $mo_ldap_local_current_subtab, 'password_sync' ) === 0 ) {
	?>
	<div class="mo_ldap_local_outer mo_ldap_local_premium_box mo_ldap_local_premium_box_no_hover">
		<div class="mo_ldap_local_premium_feature_box">
			<div class="mo_ldap_local_imp_exp_headings">
				<?php echo esc_html__( 'LDAP Password Sync Configuration', 'ldap-login-for-intranet-sites' ); ?>
			</div>
			<br>
			<div class="mo_ldap_local_login_settings_premium_row">
				<input type="checkbox" id="mo_ldap_adv_sync_password_ldap_reset" class="mo_ldap_local_toggle_switch_hide" disabled="disabled" aria-disabled="true" />
				<label for="mo_ldap_adv_sync_password_ldap_reset" class="mo_ldap_local_toggle_switch"></label>
				<span class="mo_ldap_local_login_settings_premium_tooltip mo_ldap_local_tooltip">
					<span class="mo_ldap_local_d_inline mo_ldap_input_label_text"><?php echo esc_html__( 'Update user password in LDAP when reset in WordPress', 'ldap-login-for-intranet-sites' ); ?> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" /></span>
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</span>
			</div>
			<p><?php echo esc_html__( 'Enable the above option after successfully saving the LDAP Connection Information and User Mapping Configuration.', 'ldap-login-for-intranet-sites' ); ?></p>
			<br>

			<button type="button" class="mo_ldap_local_disabled_button" disabled="disabled" aria-disabled="true">
				<?php echo esc_html__( 'Password Sync', 'ldap-login-for-intranet-sites' ); ?>
			</button>
		</div>
	</div>
	<?php
} elseif ( strcasecmp( $mo_ldap_local_current_subtab, 'profile_picture_sync' ) === 0 ) {
	?>
	<div class="mo_ldap_local_outer mo_ldap_local_premium_box mo_ldap_local_premium_box_no_hover">
		<div class="mo_ldap_local_premium_feature_box">
			<div class="mo_ldap_local_imp_exp_headings">
				<?php echo esc_html__( 'LDAP Profile Picture Sync', 'ldap-login-for-intranet-sites' ); ?>
			</div>
			<br>
			<div class="mo_ldap_local_login_settings_premium_row">
				<input type="checkbox" id="mo_ldap_adv_sync_profile_ad_mapping" class="mo_ldap_local_toggle_switch_hide" disabled="disabled" aria-disabled="true" />
				<label for="mo_ldap_adv_sync_profile_ad_mapping" class="mo_ldap_local_toggle_switch"></label>
				<span class="mo_ldap_local_login_settings_premium_tooltip mo_ldap_local_tooltip">
					<span class="mo_ldap_local_d_inline mo_ldap_input_label_text"><?php echo esc_html__( 'Enable AD Profile Picture Mapping', 'ldap-login-for-intranet-sites' ); ?> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" /></span>
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</span>
			</div>
			<br>
			<div class="mo_ldap_local_login_settings_premium_row">
				<input type="checkbox" id="mo_ldap_adv_sync_profile_buddypress_mapping" class="mo_ldap_local_toggle_switch_hide" disabled="disabled" aria-disabled="true" />
				<label for="mo_ldap_adv_sync_profile_buddypress_mapping" class="mo_ldap_local_toggle_switch"></label>
				<span class="mo_ldap_local_login_settings_premium_tooltip mo_ldap_local_tooltip">
					<span class="mo_ldap_local_d_inline mo_ldap_input_label_text"><?php echo esc_html__( 'Enable BuddyPress Profile Picture Mapping', 'ldap-login-for-intranet-sites' ); ?> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" /></span>
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</span>
			</div>
			<br>

			<div class="mo_ldap_local_premium_control_block mo_ldap_local_input_field_container">
				<div class="mo_ldap_local_login_settings_premium_tooltip mo_ldap_local_tooltip">
					<div>
						<?php echo esc_html__( 'Profile Photo Attribute', 'ldap-login-for-intranet-sites' ); ?> <span style="color:red;">*</span> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" />
					</div>
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</div>
				<input type="text" class="mo_ldap_local_disabled_input_field mo_ldap_local_disabled_input_field_md" placeholder="<?php echo esc_attr__( 'Enter Profile Picture Attribute', 'ldap-login-for-intranet-sites' ); ?>" disabled="disabled" aria-disabled="true" />
			</div>

			<button type="button" class="mo_ldap_local_disabled_button" disabled="disabled" aria-disabled="true">
				<?php echo esc_html__( 'Sync Profile Picture', 'ldap-login-for-intranet-sites' ); ?>
			</button>
		</div>
	</div> 
	<?php
}
?>

<script>
jQuery(document).ready(function() {
	jQuery("#wp_to_ldap_searchbases").click(function() {
		showWpToLdapSearchBaseList();
	});

	jQuery("#mo_ldap_local_enable_ldap_add").change(function() {
		<?php if ( $mo_ldap_local_has_search_base ) : ?>
			jQuery("#enable_sync_toggle_form").submit();
		<?php endif; ?>
	});
	jQuery("#sync_search_base_form").submit(function(e) {
		var searchBase = jQuery("#wp_to_ldap_search_base").val().trim();
		if (searchBase === '') {
			e.preventDefault();
			jQuery("#wp_to_ldap_search_base").prop('required', true);
			jQuery("#wp_to_ldap_search_base")[0].reportValidity();
			return false;
		} else {
			jQuery("#wp_to_ldap_search_base").prop('required', false);
		}

		return true;
	});

	function showWpToLdapSearchBaseList() {
		var nonce = "<?php echo esc_js( wp_create_nonce( 'wp_to_ldap_searchbaselist_nonce' ) ); ?>";
		var myWindow = window.open('<?php echo esc_js( site_url() ); ?>' + '/?option=wp_to_ldap_searchbaselist' + '&_wpnonce=' + nonce, "WordPress to LDAP Search Base Lists", "width=600, height=600");
	}
});
</script>

