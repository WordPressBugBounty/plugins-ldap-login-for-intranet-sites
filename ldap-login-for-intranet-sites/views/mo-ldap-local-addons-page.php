<?php
/**
 * Display Add-ons Page.
 *
 * @package miniOrange_LDAP_AD_Integration
 * @subpackage views
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$mo_ldap_local_addon_array_recommended = maybe_unserialize( MO_LDAP_RECOMMENDED_ADDONS );
$mo_ldap_local_addon_array_third_party = maybe_unserialize( MO_LDAP_THIRD_PARTY_INTEGRATION_ADDONS );
?>
<div class="mo_ldap_outer mo_ldap_outer_box">
	<div class="mo_ldap_local_addons_header">

		<div class="mo_ldap_local_addons_heading">
			<div style="color:#0076E1; display:inline;">PREMIUM</div> ADD-ONS
		</div>
		<div id="mo_ldap_local_addons_navbar" class="mo_ldap_local_addons_buttons">
			<div data-id="mo_ldap_local_premium_add_ons" class="mo_ldap_troubleshooting_btn mo-ldap-upgrade-now-btn mo_ldap_local_btn2_tem">
				Premium Add-ons
			</div>
			<div data-id="mo_ldap_local_premium_thirdparty_add_ons" class="mo_ldap_troubleshooting_btn mo_ldap_local_btn2_tem">
				Premium Add-ons for Third-Party Plugins 
			</div>
		</div>
		<div>
			<div id="mo_ldap_local_premium_add_ons" class="mo_ldap_local_all_addons">
				<?php foreach ( $mo_ldap_local_addon_array_recommended as $mo_ldap_local_addon ) { ?>
					<div class="mo_ldap_local_each_addon">
						<div class="mo_ldap_local_addon_box_head">
							<div class="mo_ldap_local_all_addons_heading">
								<?php echo esc_html( $mo_ldap_local_addon['addonName'] ); ?>
							</div>	
							<?php
							if ( '' !== $mo_ldap_local_addon['addonFeatures'] ) {
								?>
								<ul class="mo_ldap_local_addon_feature_list">
									<?php foreach ( $mo_ldap_local_addon['addonFeatures'] as $mo_ldap_local_feature ) { ?>
										<li><b><?php echo esc_html( $mo_ldap_local_feature ); ?></b></li>
									<?php } ?>
								</ul>
								<?php
							}
							?>
						</div>
						<div class="mo_ldap_local_all_addons_link">
							<?php
							if ( '' !== $mo_ldap_local_addon['addonGuide'] ) {
								?>
							<div class="mo_ldap_local_all_addons_each_link">
								<a rel="noopener" target="_blank" href="<?php echo esc_url( $mo_ldap_local_addon['addonGuide'] ); ?>" class="mo_ldap_local_unset_link_affect mo_ldap_local_horizontal_flex_container"><span><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'setup.svg' ); ?>" height="15px" width="15px"></span>Setup Guide</a>
							</div>
								<?php
							}

							if ( '' !== $mo_ldap_local_addon['addonPage'] ) {
								?>
							<div class="mo_ldap_local_all_addons_each_link">
								<a rel="noopener" target="_blank" href="<?php echo esc_url( $mo_ldap_local_addon['addonPage'] ); ?>" class="mo_ldap_local_unset_link_affect mo_ldap_local_horizontal_flex_container"><span><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'setup.svg' ); ?>" height="15px" width="15px"></span>Visit Our Page</a>
							</div>
								<?php
							}
							if ( '' !== $mo_ldap_local_addon['addonVideo'] ) {
								?>
							<div class="mo_ldap_local_all_addons_each_link">
								<a rel="noopener" target="_blank" href="<?php echo esc_url( $mo_ldap_local_addon['addonVideo'] ); ?>" class="mo_ldap_local_unset_link_affect mo_ldap_local_horizontal_flex_container"><span><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'videolink.svg' ); ?>" height="15px" width="15px"></span>Setup Video</a>
							</div>
							<?php } ?>

						</div>

						<button class="mo_ldap_troubleshooting_btn mo_ldap_addon_contact_us_btn" data-id="mo_ldap_local_contact_us_box" onclick="mo_ldap_local_popup_card_clicked(this, 'I am interested in <?php echo esc_js( $mo_ldap_local_addon['addonName'] ); ?> Add-on and want to know more about it.')">
							Contact Us
						</button>
					</div>
				<?php } ?>
			</div>

			<div id="mo_ldap_local_premium_thirdparty_add_ons" class="mo_ldap_local_all_addons mo_ldap_d_none">
				<?php foreach ( $mo_ldap_local_addon_array_third_party as $mo_ldap_local_addon ) { ?>
					<div class="mo_ldap_local_each_addon">
						<div class="mo_ldap_local_addon_box_head" style="min-height: 200px;">
							<div class="mo_ldap_local_all_addons_heading">
								<?php echo esc_html( $mo_ldap_local_addon['addonName'] ); ?>
							</div>
							<?php
							if ( '' !== $mo_ldap_local_addon['addonFeatures'] ) {
								?>
								<ul class="mo_ldap_local_addon_feature_list">
									<?php foreach ( $mo_ldap_local_addon['addonFeatures'] as $mo_ldap_local_feature ) { ?>
										<li><b><?php echo esc_html( $mo_ldap_local_feature ); ?></b></li>
									<?php } ?>
								</ul>
								<?php
							}
							?>
						</div>
						<div class="mo_ldap_local_all_addons_link">
							<?php
							if ( '' !== $mo_ldap_local_addon['addonGuide'] ) {
								?>
							<div class="mo_ldap_local_all_addons_each_link">
								<a rel="noopener" target="_blank" href="<?php echo esc_url( $mo_ldap_local_addon['addonGuide'] ); ?>" class="mo_ldap_local_unset_link_affect mo_ldap_local_horizontal_flex_container"><span><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'setup.svg' ); ?>" height="15px" width="15px"></span>Setup Guide</a>
							</div>
								<?php
							}
							if ( '' !== $mo_ldap_local_addon['addonVideo'] ) {
								?>
							<div class="mo_ldap_local_all_addons_each_link">
								<a rel="noopener" target="_blank" href="<?php echo esc_url( $mo_ldap_local_addon['addonVideo'] ); ?>" class="mo_ldap_local_unset_link_affect mo_ldap_local_horizontal_flex_container"><span><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'videolink.svg' ); ?>" height="15px" width="15px"></span>Setup Video</a>
							</div>
							<?php } ?>
						</div>

						<button class="mo_ldap_troubleshooting_btn mo_ldap_addon_contact_us_btn" data-id="mo_ldap_local_contact_us_box" onclick="mo_ldap_local_popup_card_clicked(this, 'I am interested in <?php echo esc_js( $mo_ldap_local_addon['addonName'] ); ?> Add-on and want to know more about it.')">
							Contact Us
						</button>
					</div>
				<?php } ?>
			</div>
		</div>

	</div>
</div>
