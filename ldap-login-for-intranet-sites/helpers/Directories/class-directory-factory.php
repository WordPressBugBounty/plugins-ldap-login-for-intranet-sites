<?php
/**
 * This file returns the current directory object.
 *
 * @package miniOrange_LDAP_AD_Integration
 * @subpackage helpers
 */

namespace MO_LDAP\Helpers\Directories;

require_once 'class-microsoft-active-directory.php';
require_once 'class-freeipa.php';
require_once 'class-openldap.php';

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Directory Factory class.
 */
class Directory_Factory {

	/**
	 * Current directory object.
	 *
	 * @var object
	 */
	protected $current_directory;

	/**
	 * Function mofi_ldap_redirect_home_page : function to redirect to home page after form submission
	 *
	 * @param string $directory_type : string.
	 * @return object
	 */
	public function select_directory_system( $directory_type ) {
		if ( 'freeipa' === $directory_type ) {
			$this->current_directory = new FreeIPA();
		} elseif ( 'openldap' === $directory_type ) {
			$this->current_directory = new OpenLDAP();
		} else {
			$this->current_directory = new Microsoft_Active_Directory();
		}

		return $this->current_directory;
	}
}
