<?php
/**
 * User handler.
 *
 * @package    miniOrange_LDAP_AD_Integration
 * @subpackage handlers
 */

namespace MO_LDAP\Handlers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use MO_LDAP\Utils\Mo_Ldap_Local_Utils;
use MO_LDAP\Helpers\Directories\Directory_Factory;

if ( ! class_exists( 'Mo_Ldap_Local_User_Handler' ) ) {
	/**
	 * Mo_Ldap_Local_User_Handler
	 */
	class Mo_Ldap_Local_User_Handler {

		/**
		 * Utility object.
		 *
		 * @var [object]
		 */
		private $utils;

		/**
		 * Constructor.
		 */
		public function __construct() {
			$this->utils = new Mo_Ldap_Local_Utils();
			add_action( 'user_register', array( $this, 'mo_ldap_create_user_action' ), 10, 1 );
		}

		/**
		 * Function add_user : add user to ldap when registered in wp
		 *
		 * @param  mixed $user_info : User info.
		 * @return null|void
		 */
		public function add_user( $user_info ) {

			if ( ! $this->utils::is_extension_installed( 'openssl' ) || ! $this->utils::is_extension_installed( 'ldap' ) ) {
				return null;
			}
			$server_name = get_option( 'mo_ldap_local_server_url' ) ? $this->utils::decrypt( get_option( 'mo_ldap_local_server_url' ) ) : '';
			if ( version_compare( PHP_VERSION, '5.3.0' ) >= 0 ) {
				ldap_set_option( null, LDAP_OPT_NETWORK_TIMEOUT, 5 );
			}
			$ldapconn               = ldap_connect( $server_name );
			$directory_server_value = get_option( 'mo_ldap_directory_server_value' );

			$current_directory = new Directory_Factory();
			$current_directory = $current_directory->select_directory_system( $directory_server_value );

			if ( $ldapconn ) {
				$rdn_attribute = $current_directory->get_rdn_attribute( $user_info );
				$user_base = $this->utils::decrypt( get_option( 'mo_ldap_local_wp_to_ldap_search_base', '' ) );
				if ( empty( $user_base ) ) {
					return;
				}

				$user_dn = $rdn_attribute . ',' . $user_base;

				$email_attribute = get_option( 'mo_ldap_local_email_attribute' );

				$user_data = array_map( 'trim', $current_directory->set_native_attributes( $user_info ) );

				if ( $email_attribute ) {
					$user_data[ strtolower( $email_attribute ) ] = $user_info->user_email;
				}

				$object_class_string  = $current_directory->get_object_class_string();
				$object_classes       = explode( ';', $object_class_string );
				$object_classes_count = count( $object_classes );
				for ( $i = 0; $i < $object_classes_count; $i++ ) {
					$user_data['objectclass'][ $i ] = $object_classes[ $i ];
				}

				$password_attribute = $current_directory->get_password_attribute();
				if ( isset( $_POST['pass1'] ) || isset( $_POST['password'] ) ) {// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.MissingUnslash -- Password fields should not be sanitized or unslashed to preserve special characters. Legacy form, nonce verification not present.
					$pass                             = isset( $_POST['pass1'] ) ? $_POST['pass1'] : $_POST['password'];// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.Security.NonceVerification.Missing, WordPress.Security.ValidatedSanitizedInput.MissingUnslash -- Password fields should not be sanitized or unslashed to preserve special characters. Legacy form, nonce verification not present.
					$user_data[ $password_attribute ] = $this->utils::get_hashed_password( $pass, 'plaintext' );
				} else {
					$user_data[ $password_attribute ] = $this->utils::get_hashed_password( wp_generate_password(), 'plaintext' );
				}

				foreach ( $user_data as $key => $value ) {
					if ( empty( $value ) ) {
						unset( $user_data[ $key ] );
					}
				}

				ldap_set_option( $ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3 );
				ldap_set_option( $ldapconn, LDAP_OPT_REFERRALS, 0 );

				$ldap_bind_dn       = get_option( 'mo_ldap_local_server_dn' ) ? $this->utils::decrypt( get_option( 'mo_ldap_local_server_dn' ) ) : '';
				$ldap_bind_password = get_option( 'mo_ldap_local_server_password' ) ? $this->utils::decrypt( get_option( 'mo_ldap_local_server_password' ) ) : '';
				if ( get_option( 'mo_ldap_local_use_tls' ) ) {
					ldap_start_tls( $ldapconn );
				}
				$ldapbind = @ldap_bind( $ldapconn, $ldap_bind_dn, $ldap_bind_password );//phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
				if ( $ldapbind ) {
					global $wpdb;
					$res = ldap_add( $ldapconn, $user_dn, $user_data );
					if ( ! $res ) {
						$report_res = $wpdb->insert(//phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.SchemaChange,  - Fetching data from a custom table.
							"{$wpdb->base_prefix}wptoldap_sync_reports",
							array(
								'user_id'         => $user_info->ID,
								'username'        => $user_info->user_login,
								'sync_status'     => 'ERROR',
								'additional_info' => ldap_error( $ldapconn ),
							),
							array( '%d', '%s', '%s', '%s' )
						);
					} else {
						update_user_meta( $user_info->ID, 'mo_ldap_user_dn', $user_dn, false );
						$report_res = $wpdb->insert(//phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.SchemaChange,  - Fetching data from a custom table.
							"{$wpdb->base_prefix}wptoldap_sync_reports",
							array(
								'user_id'         => $user_info->ID,
								'username'        => $user_info->user_login,
								'sync_status'     => 'SUCCESS',
								'additional_info' => 'Success: User account successfully created in LDAP',
							),
							array( '%d', '%s', '%s', '%s' )
						);
					}
				}
				ldap_close( $ldapconn );
			} else {
				exit();
			}
		}

		/**
		 * Function mo_ldap_create_user_action : add user when registered in wp
		 *
		 * @param  string $user_id : User id.
		 * @return void
		 */
	public function mo_ldap_create_user_action( $user_id ) {
		if ( strcasecmp( get_option( 'mo_ldap_local_enable_ldap_add' ), '1' ) !== 0 ) {
			return;
		}

		$user         = get_userdata( $user_id );
		$ldap_user_dn = get_user_meta( $user_id, 'mo_ldap_user_dn', true );

		if ( ! empty( $ldap_user_dn ) ) {
			return;
		}

		$mo_ldap_config = new Mo_Ldap_Local_User_Handler();
		$mo_ldap_config->add_user( $user );
	}
	}
}
