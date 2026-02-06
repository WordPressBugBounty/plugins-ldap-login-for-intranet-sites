<?php
/**
 * Display FAQs Page.
 *
 * @package miniOrange_LDAP_AD_Integration
 * @subpackage views
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="mo_ldap_local_page_box">
	<div style="padding-left: 30px;">
		<a style="width: fit-content;" href="<?php echo esc_url( add_query_arg( array( 'tab' => 'default' ), $mo_ldap_local_filtered_current_page_url ) ); ?>" class="mo_ldap_back_btn mo_ldap_local_plugin_config_back_btn mo_ldap_local_unset_link_affect"><span><img src="<?php echo esc_url( MO_LDAP_LOCAL_IMAGES . 'back.svg' ); ?>" height="10px" width="15px"></span> Plugin Config</a>
	</div>
	<div class="mo_ldap_local_central_header">
		FAQs
	</div>
	<div class="mo_ldap_local_faqs_container mo_ldap_local_column_flex_container" >
		<?php
		$mo_ldap_local_index = 1;
		foreach ( $mo_ldap_local_faqs as $mo_ldap_local_question => $mo_ldap_local_answer ) {
			?>
			<div class="mo_ldap_local_faq_box" data-faq-id="<?php echo esc_attr( $mo_ldap_local_index ); ?>">
				<div class="mo_ldap_local_horizontal_flex_container" style="justify-content: space-between;width: 100%;">
					<div onclick="showFAQbox(this)"><?php echo wp_kses( $mo_ldap_local_question, $mo_ldap_local_faqs_allowed_tags ); ?></div>
					<div class="mo_ldap_local_plus_icon" onclick="showFAQbox(this)">+</div>
				</div>
				<div class="mo_ldap_answer_section">
					<div>
						<?php echo wp_kses( $mo_ldap_local_answer, $mo_ldap_local_faqs_allowed_tags ); ?>
					</div>
				</div>
			</div>
			<?php
			$mo_ldap_local_index++;
		}
		?>
	</div>
</div>
