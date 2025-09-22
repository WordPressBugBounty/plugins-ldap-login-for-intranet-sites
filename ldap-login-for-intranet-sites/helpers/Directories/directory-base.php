<?php
/**
 * DirectoryBase Interface
 *
 * Defines the structure for interacting with directory systems.
 *
 * @package miniOrange_LDAP_AD_Integration
 * @subpackage Helper
 */

namespace MO_LDAP\Helpers\Directories;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * DirectoryBase Interface
 *
 * Defines the structure for directory operations.
 */
interface DirectoryBase {
	/**
	 * Get the RDN Attribute.
	 *
	 * @param array $user_info User information.
	 * @return string
	 */
	public function get_rdn_attribute( $user_info );

	/**
	 * Get the password attribute.
	 *
	 * @return string
	 */
	public function get_password_attribute();

	/**
	 * Get the object class string.
	 *
	 * @return string
	 */
	public function get_object_class_string();

	/**
	 * Get the user search filter.
	 *
	 * @param array $user_info User information.
	 * @return string
	 */
	public function get_user_search_filter( $user_info );

	/**
	 * Set native attributes.
	 *
	 * @param array $user_info User information.
	 * @return void
	 */
	public function set_native_attributes( $user_info );

	/**
	 * Get the attribute set.
	 *
	 * @return array
	 */
	public function get_attribute_set();

}
