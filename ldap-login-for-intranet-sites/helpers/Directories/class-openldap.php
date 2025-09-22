<?php
/**
 * This file implements the directory functions for OpenLDAP.
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
 * OpenLDAP Class
 *
 * Implements the DirectoryBase interface for OpenLDAP.
 */
class OpenLDAP implements directorybase {

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
		$this->user_rdn = 'uid=' . $user_info->user_login;
		return $this->user_rdn;
	}

	/**
	 * Get the password attribute.
	 *
	 * @return string
	 */
	public function get_password_attribute() {
		return 'userPassword';
	}


	/**
	 * Get the object class string.
	 *
	 * @return string
	 */
	public function get_object_class_string() {
		$this->object_class_string = 'top;posixAccount;organizationalperson;inetorgperson;shadowAccount';

		return $this->object_class_string;
	}

	/**
	 * Get the user search filter.
	 *
	 * @param object $user_info User information.
	 * @return string
	 */
	public function get_user_search_filter( $user_info ) {
		$this->user_search_filter = '(&(objectClass=*)(uid=' . $user_info->user_login . '))';

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

		$this->user_data['uid']         = $user_info->user_login;
		$this->user_data['initials']    = $user_info->last_name;
		$this->user_data['gecos']       = $user_info->first_name . ' ' . $user_info->last_name;
		$this->user_data['displayname'] = $user_info->first_name . ' ' . $user_info->last_name;

		$this->user_data['uidnumber']     = '-1';
		$this->user_data['gidnumber']     = '-1';
		$this->user_data['loginshell']    = '/bin/sh';
		$this->user_data['homedirectory'] = "/home/$user_info->first_name";

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
