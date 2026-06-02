<?php
/**
 * Display Multiple Directory Configuration Page
 *
 * @package miniOrange_LDAP_AD_Integration
 * @subpackage views
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="mo_ldap_local_multiple_directories_outer">
	<div class="mo_ldap_local_outer mo_ldap_local_premium_box mo_ldap_local_premium_box_no_hover">

		<a href="<?php echo esc_url( add_query_arg( array( 'tab' => 'pricing' ), $mo_ldap_local_filtered_current_page_url ) ); ?>" class="mo_ldap_local_unset_link_affect">
			<div class="mo_ldap_local_premium_feature_btn">
				<span><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="20" width="20" alt=""></span> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?>
			</div>
		</a>

		<div class="mo_ldap_local_premium_feature_box">
			<div class="mo_ldap_local_imp_exp_headings">
				<?php echo esc_html__( 'Add new LDAP server', 'ldap-login-for-intranet-sites' ); ?>
			</div>
			<br>

			<div class="mo_ldap_local_premium_control_block mo_ldap_local_multiple_directories_each_div">
				<div>
					<?php echo esc_html__( 'LDAP Server', 'ldap-login-for-intranet-sites' ); ?><span style="color:red;">*</span> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" />
				</div>
				<div class="mo_ldap_local_multidir_field_tooltip_wrap mo_ldap_local_tooltip">
					<input type="text" id="mo_ldap_multidir_server" name="mo_ldap_multidir_server" placeholder="<?php echo esc_attr__( 'Enter LDAP Server', 'ldap-login-for-intranet-sites' ); ?>" class="mo_ldap_local_disabled_input_field mo_ldap_local_disabled_input_field_md" disabled="disabled" aria-disabled="true" />
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</div>
				<small><?php echo esc_html__( 'eg: ldap://myldapserver.domain:389 , ldap://x.x.x.x:389.', 'ldap-login-for-intranet-sites' ); ?></small>
			</div>
			<br>
			<br>

			<div class="mo_ldap_local_premium_control_block mo_ldap_local_multiple_directories_each_div">
				<div>
					<?php echo esc_html__( 'Username', 'ldap-login-for-intranet-sites' ); ?><span style="color:red;">*</span> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" />
				</div>
				<div class="mo_ldap_local_multidir_field_tooltip_wrap mo_ldap_local_tooltip">
					<input type="text" id="mo_ldap_multidir_username" name="mo_ldap_multidir_username" placeholder="<?php echo esc_attr__( 'Enter Username', 'ldap-login-for-intranet-sites' ); ?>" class="mo_ldap_local_disabled_input_field mo_ldap_local_disabled_input_field_md" disabled="disabled" aria-disabled="true" />
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</div>
				&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;<small><?php echo esc_html__( 'e.g. cn=username,cn=group,dc=domain,dc=com', 'ldap-login-for-intranet-sites' ); ?></small>
			</div>
			<br>
			<br>

			<div class="mo_ldap_local_premium_control_block mo_ldap_local_multiple_directories_each_div">
				<div>
					<?php echo esc_html__( 'Password', 'ldap-login-for-intranet-sites' ); ?><span style="color:red;">*</span> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" />
				</div>
				<div class="mo_ldap_local_multidir_field_tooltip_wrap mo_ldap_local_tooltip">
					<input type="password" id="mo_ldap_multidir_password" name="mo_ldap_multidir_password" placeholder="<?php echo esc_attr__( 'Enter Password', 'ldap-login-for-intranet-sites' ); ?>" class="mo_ldap_local_disabled_input_field mo_ldap_local_disabled_input_field_md" disabled="disabled" aria-disabled="true" autocomplete="off" />
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</div>
			</div>
			<br>

			<div class="mo_ldap_local_premium_control_block mo_ldap_local_multiple_directories_each_div">
				<div>
					<?php echo esc_html__( 'Search Base(s)', 'ldap-login-for-intranet-sites' ); ?><span style="color:red;">*</span> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" />
				</div>
				<div class="mo_ldap_local_multidir_field_tooltip_wrap mo_ldap_local_tooltip">
					<input type="text" id="mo_ldap_multidir_search_base" name="mo_ldap_multidir_search_base" placeholder="<?php echo esc_attr__( 'Enter Search Base', 'ldap-login-for-intranet-sites' ); ?>" class="mo_ldap_local_disabled_input_field mo_ldap_local_disabled_input_field_md" disabled="disabled" aria-disabled="true" />
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</div>
				<small><?php echo esc_html__( 'e.g. cn=Users,dc=domain,dc=com', 'ldap-login-for-intranet-sites' ); ?></small>
			</div>
			<br>
			<br>

			<div class="mo_ldap_local_premium_control_block mo_ldap_local_multiple_directories_each_div">
				<div>
					<?php echo esc_html__( 'User Attribute', 'ldap-login-for-intranet-sites' ); ?> <span style="color:red;">*</span> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" />
				</div>
				<div class="mo_ldap_local_multidir_field_tooltip_wrap mo_ldap_local_tooltip">
					<input type="text" id="mo_ldap_multidir_user_attribute" name="mo_ldap_multidir_user_attribute" placeholder="<?php echo esc_attr__( 'Enter User Attribute', 'ldap-login-for-intranet-sites' ); ?>" class="mo_ldap_local_disabled_input_field mo_ldap_local_disabled_input_field_md" disabled="disabled" aria-disabled="true" />
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</div>
				<small><?php echo esc_html__( 'e.g. sAMAccountName, userPrincipalName;mail', 'ldap-login-for-intranet-sites' ); ?></small>
			</div>

			<br>
			<br>
			<br>

			<div class="mo_ldap_local_md_headings ">
				<?php echo esc_html__( 'Search Conditions', 'ldap-login-for-intranet-sites' ); ?>
			</div>
			<br>

			<div class="mo_ldap_local_login_settings_premium_row">
				<input type="checkbox" id="mo_ldap_multidir_custom_search_filter" class="mo_ldap_local_toggle_switch_hide" disabled="disabled" aria-disabled="true" />
				<label for="mo_ldap_multidir_custom_search_filter" class="mo_ldap_local_toggle_switch"></label>
				<span class="mo_ldap_local_login_settings_premium_tooltip mo_ldap_local_tooltip">
					<span class="mo_ldap_local_d_inline mo_ldap_input_label_text"><?php echo esc_html__( 'Enable Custom Search Filter', 'ldap-login-for-intranet-sites' ); ?> <img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="30" width="30" alt="" style="vertical-align: middle; margin-left: 6px;" /></span>
					<span class="mo_ldap_local_tooltiptext"><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'crown.svg' ); ?>" height="15" width="15" alt=""> <?php echo esc_html__( 'Premium Feature', 'ldap-login-for-intranet-sites' ); ?></span>
				</span>
			</div>

			<br>

			<button type="button" class="mo_ldap_local_disabled_button mo_ldap_local_button_disabled" disabled="disabled" aria-disabled="true">
				<?php echo esc_html__( 'Test Connection and Save', 'ldap-login-for-intranet-sites' ); ?>
			</button>
			<button type="button" class="mo_ldap_troubleshooting_btn mo_ldap_local_button_disabled mo_ldap_local_md_disabled_btn" disabled="disabled" aria-disabled="true">
				<?php echo esc_html__( 'Add New Configuration', 'ldap-login-for-intranet-sites' ); ?>
			</button>
		</div>
	</div>
</div>
