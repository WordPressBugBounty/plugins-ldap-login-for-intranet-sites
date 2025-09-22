<?php
/**
 * This file implements the directory functions for MSAD.
 *
 * @package miniOrange_LDAP_AD_Integration
 * @subpackage helpers
 */

namespace MO_LDAP\Helpers\Directories;

require_once 'directory-base.php';

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Microsoft Active Directory Class
 *
 * Implements the DirectoryBase interface for MSAD.
 */
class Microsoft_Active_Directory implements DirectoryBase {

	/**
	 * User data array.
	 *
	 * @var array
	 */
	protected $user_data = array();
	/**
	 * Object class string.
	 *
	 * @var string
	 */
	protected $object_class_string = '';
	/**
	 * User RDN string.
	 *
	 * @var string
	 */
	protected $user_rdn = '';

	/**
	 * User search filter.
	 *
	 * @var string
	 */
	protected $user_search_filter = '';
	/**
	 * Attribute set array.
	 *
	 * @var array
	 */
	protected $attribute_set = array(
		'mail',
		'telephoneNumber',
		'givenName',
		'sn',
		'displayName',
		'cn',
		'title',
		'memberof',
		'distinguishedname',
		'department',
		'userPrincipalName',
		'sAMAccountName',
		'streetAddress',
		'postOfficeBox',
	);

	/**
	 * Get the RDN attribute.
	 *
	 * @param string $user_info User information.
	 * @return string
	 */
	public function get_rdn_attribute( $user_info ) {
		if ( empty( $user_info->first_name ) && empty( $user_info->last_name ) ) {
			$this->user_rdn = 'CN=' . $user_info->user_login;
		} else {
			$this->user_rdn = trim( 'CN=' . $user_info->first_name . ' ' . $user_info->last_name );
		}

		return $this->user_rdn;
	}

	/**
	 * Get the password attribute.
	 *
	 * @return string
	 */
	public function get_password_attribute() {
		return 'unicodepwd';
	}

	/**
	 * Get the object class string.
	 *
	 * @return string
	 */
	public function get_object_class_string() {
		$this->object_class_string = 'top;person;user;organizationalPerson';

		return $this->object_class_string;
	}

	/**
	 * Get the user search filter.
	 *
	 * @param object $user_info User information.
	 * @return string
	 */
	public function get_user_search_filter( $user_info ) {
		$this->user_search_filter = '(&(objectClass=*)(samaccountname=' . $user_info->user_login . '))';

		return $this->user_search_filter;
	}

	/**
	 * Set native attributes for the user.
	 *
	 * @param object $user_info User information.
	 * @return array
	 */
	public function set_native_attributes( $user_info ) {
		if ( empty( $user_info->first_name ) && empty( $user_info->last_name ) ) {
			$this->user_data['cn'] = $user_info->user_login;
		} else {
			$this->user_data['cn'] = $user_info->first_name . ' ' . $user_info->last_name;
		}

		$this->user_data['useraccountcontrol'] = '512';
		$this->user_data['samaccountname']     = $user_info->user_login;

		return $this->user_data;
	}

	/**
	 * Get the attribute set.
	 *
	 * @return array
	 */
	public function get_attribute_set() {
		return $this->attribute_set;
	}
}
