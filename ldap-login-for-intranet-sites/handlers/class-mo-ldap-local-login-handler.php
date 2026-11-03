<?php
/**
 * Customer Login handler.
 *
 * @package miniOrange_LDAP_AD_Integration
 * @subpackage handlers
 */

namespace MO_LDAP\Handlers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once 'class-mo-ldap-local-role-mapping-handler.php';

use WP_Error;
use MO_LDAP\Utils\Mo_Ldap_Local_Utils;
use Mo_Ldap_Local_Role_Mapping_Handler;

if ( ! class_exists( 'Mo_Ldap_Local_Login_Handler' ) ) {
	/**
	 * Mo_Ldap_Local_Login_Handler
	 */
	class Mo_Ldap_Local_Login_Handler {

		/**
		 * Utility object.
		 *
		 * @var [object]
		 */
		private $utils;

		/**
		 * __construct
		 *
		 * @return void
		 */
		public function __construct() {
			$this->utils = new Mo_Ldap_Local_Utils();

			$mo_ldap_local_login_priority = 7;

			if ( in_array( 'next-active-directory-integration/index.php', (array) get_option( 'active_plugins', array() ), true ) ) {
				$mo_ldap_local_login_priority = 20;
			}

			remove_filter( 'authenticate', 'wp_authenticate_username_password', 20, 3 );
			remove_filter( 'authenticate', 'wp_authenticate_email_password', 20, 3 );

			add_filter( 'authenticate', array( $this, 'mo_ldap_local_ldap_login' ), $mo_ldap_local_login_priority, 3 );
		}

		/**
		 * Function mo_ldap_local_ldap_login : LDAP Login hook
		 *
		 * @param  mixed  $wpuser : WordPress user object.
		 * @param  string $username : LDAP username.
		 * @param  string $password : LDAP password.
		 * @return mixed
		 */
		public function mo_ldap_local_ldap_login( $wpuser, $username, $password ) {
			if ( empty( $username ) || empty( $password ) ) {
				$error = new WP_Error();

				if ( empty( $username ) ) {
					$error->add( 'empty_username', __( '<strong>ERROR</strong>: Email field is empty.', 'ldap-login-for-intranet-sites' ) );
				}

				if ( empty( $password ) ) {
					$error->add( 'empty_password', __( '<strong>ERROR</strong>: Password field is empty.', 'ldap-login-for-intranet-sites' ) );
				}
				return $error;
			}

			$enable_wp_admin_login = get_option( 'mo_ldap_local_enable_admin_wp_login' );
			if ( strcmp( $enable_wp_admin_login, '1' ) === 0 && username_exists( $username ) ) {
					$user = get_user_by( 'login', $username );
				if ( $user && $this->utils->is_administrator_user( $user ) && wp_check_password( $password, $user->data->user_pass, $user->ID ) ) {
						return $user;
				}
			}

			$mo_ldap_local_ldap_email_domain       = get_option( 'mo_ldap_local_email_domain' );
			$mo_ldap_local_ldap_username_attribute = strtolower( get_option( 'mo_ldap_local_username_attribute' ) );
			$custom_ldap_username_attribute        = strtolower( get_option( 'custom_ldap_username_attribute' ) );
			$username_list_array                   = array( 'samaccountname', 'uid' );

			$mo_ldap_config = new Mo_Ldap_Local_Configuration_Handler();
			$auth_response  = $mo_ldap_config->mo_ldap_local_authenticate( $username, $password );

			if ( strcasecmp( $auth_response->status_message, 'LDAP_USER_BIND_SUCCESS' ) === 0 ) {

				$unique_id_login    = strcmp( (string) get_option( 'mo_ldap_local_enable_unique_id_login' ), '1' ) === 0;
				$ldap_unique_id     = isset( $auth_response->unique_id ) ? $auth_response->unique_id : '';
				$profile_attributes = $auth_response->profile_attributes_list;

				$user = null;
				if ( $unique_id_login && ! empty( $ldap_unique_id ) ) {
					$matched_users = get_users(
						array(
							'meta_key'   => 'mo_ldap_user_unique_id',
							'meta_value' => $ldap_unique_id,
							'number'     => 6,
						)
					);

					if ( count( $matched_users ) === 1 ) {
						$user = $matched_users[0];
					} elseif ( count( $matched_users ) > 1 ) {
						$linked_logins = wp_list_pluck( $matched_users, 'user_login' );
						$shown_logins  = implode( ', ', array_map( 'esc_html', array_slice( $linked_logins, 0, 5 ) ) );
						if ( count( $linked_logins ) > 5 ) {
							$shown_logins .= ' and more';
						}
						$this->utils->mo_ldap_report_update( $username, 'ERROR', '<strong>Login Error:</strong> Multiple WordPress accounts are linked to the same LDAP user: ' . $shown_logins );
						$error = new WP_Error();
						$error->add( 'ambiguous_identity_error', __( '<strong>ERROR</strong>: Ambiguous account: multiple accounts are linked to your directory identity. Please contact your administrator.', 'ldap-login-for-intranet-sites' ) );
						return $error;
					}
				}
				if ( empty( $user ) && ( username_exists( $username ) || email_exists( $username ) ) ) {
					$existing_user = get_user_by( 'login', $username );
					if ( empty( $existing_user ) ) {
						$existing_user = get_user_by( 'email', $username );
					}

					if ( empty( $existing_user ) ) {
						$this->utils->mo_ldap_report_update( $username, 'ERROR', '<strong>Login Error:</strong> Invalid Username/Password combination' );
						$error = new WP_Error();
						$error->add( 'error_fetching_user', __( '<strong>ERROR</strong>: Invalid Username/Password combination.', 'ldap-login-for-intranet-sites' ) );
						return $error;
					}

					if ( $unique_id_login ) {
						$ldap_mail        = ! empty( $profile_attributes['mail'] ) ? $profile_attributes['mail'] : '';
						$stored_unique_id = get_user_meta( $existing_user->ID, 'mo_ldap_user_unique_id', true );

						if ( empty( $ldap_unique_id ) ) {
							return $this->mo_ldap_local_identity_error( $username, 'unique_id_missing_error', 'Unique identifier (objectGUID / entryUUID / ipaUniqueID) was not received from LDAP.' );
						}
						if ( ! empty( $stored_unique_id ) && $stored_unique_id !== $ldap_unique_id ) {
							return $this->mo_ldap_local_identity_error( $username, 'identity_already_linked_error', 'This WordPress account is already linked to a different LDAP user.' );
						}
						if ( empty( $ldap_mail ) ) {
							return $this->mo_ldap_local_identity_error( $username, 'ldap_mail_missing_error', 'Mail attribute is empty in the LDAP entry.' );
						}
						if ( strcasecmp( $ldap_mail, $existing_user->user_email ) !== 0 ) {
							return $this->mo_ldap_local_identity_error( $username, 'email_mismatch_error', 'LDAP mail (' . esc_html( $ldap_mail ) . ') does not match WordPress email (' . esc_html( $existing_user->user_email ) . ').' );
						}

						update_user_meta( $existing_user->ID, 'mo_ldap_user_unique_id', $ldap_unique_id );
					}
					$user = $existing_user;
				}

				/**
				 * Existing account resolved (by identity, verified backfill, or legacy username match) - finalize login.
				 */
				if ( ! empty( $user ) ) {
					if ( get_option( 'mo_ldap_local_enable_role_mapping' ) ) {
						$new_registered_user  = false;
						$mo_ldap_role_mapping = new Mo_Ldap_Local_Role_Mapping_Handler();
						$mo_ldap_role_mapping->mo_ldap_local_update_role_mapping( $user->ID, $new_registered_user );
					}

					update_user_meta( $user->ID, 'mo_ldap_user_dn', $auth_response->user_dn, false );

					$user_data['ID'] = $user->ID;
					if ( ! empty( $profile_attributes['mail'] ) ) {
						$user_data['user_email'] = $profile_attributes['mail'];
					}

					if ( empty( $profile_attributes['mail'] ) && ! empty( $mo_ldap_local_ldap_email_domain ) ) {
						if ( in_array( $mo_ldap_local_ldap_username_attribute, $username_list_array, true ) || in_array( $custom_ldap_username_attribute, $username_list_array, true ) ) {
							$user_data['user_email'] = $username . '@' . $mo_ldap_local_ldap_email_domain;
						}
					}

					wp_update_user( $user_data );
					return $user;
				}
				if ( ! get_option( 'mo_ldap_local_register_user' ) ) {

						$this->utils->mo_ldap_report_update( $username, 'ERROR', '<strong>Login Error:</strong> Your Administrator has not enabled Auto Registration. Please contact your Administrator.' );
						$error = new WP_Error();
						$error->add( 'registration_disabled_error', __( '<strong>ERROR</strong>: Your Administrator has not enabled Auto Registration. Please contact your Administrator.', 'ldap-login-for-intranet-sites' ) );
						return $error;
				} else {
					if ( $unique_id_login && empty( $ldap_unique_id ) ) {
						return $this->mo_ldap_local_identity_error( $username, 'unique_id_missing_error', 'Unique identifier (objectGUID / entryUUID / ipaUniqueID) was not received from LDAP. User was not created.' );
					}

					$user_password = wp_generate_password( 10, false );

					$email = ! empty( $profile_attributes['mail'] ) ? $profile_attributes['mail'] : '';
					if ( empty( $profile_attributes['mail'] ) && ! empty( $mo_ldap_local_ldap_email_domain ) ) {
						if ( in_array( $mo_ldap_local_ldap_username_attribute, $username_list_array, true ) || in_array( $custom_ldap_username_attribute, $username_list_array, true ) ) {
							$email = $username . '@' . $mo_ldap_local_ldap_email_domain;
						}
					}

					$meta_input = array( 'mo_ldap_user_dn' => $auth_response->user_dn );
					if ( $unique_id_login ) {
						$meta_input['mo_ldap_user_unique_id'] = $ldap_unique_id;
					}

					$userdata = array(
						'user_login' => $username,
						'user_email' => $email,
						'user_pass'  => $user_password,
						'meta_input' => $meta_input,
					);

					$user_id = wp_insert_user( $userdata );

					if ( ! is_wp_error( $user_id ) ) {
						$user = get_user_by( 'login', $username );

						if ( get_option( 'mo_ldap_local_enable_role_mapping' ) ) {
							$new_registered_user  = true;
							$mo_ldap_role_mapping = new Mo_Ldap_Local_Role_Mapping_Handler();
							$mo_ldap_role_mapping->mo_ldap_local_update_role_mapping( $user->ID, $new_registered_user );
						}

						return $user;
					} else {
						$error_string       = $user_id->get_error_message();
						$email_exists_error = 'Sorry, that email address is already used!';
						if ( email_exists( $email ) && strcasecmp( $error_string, $email_exists_error ) === 0 ) {
							$error = new WP_Error();
							$this->utils->mo_ldap_report_update( $username, $auth_response->status_message, '<strong>Login Error:</strong> There was an error registering your account. The email is already registered, please choose another one and try again.' );
							$error->add( 'registration_error', __( '<strong>ERROR</strong>: There was an error registering your account. The email is already registered, please choose another one and try again.', 'ldap-login-for-intranet-sites' ) );
							return $error;
						} else {
							$error = new WP_Error();
							$this->utils->mo_ldap_report_update( $username, $auth_response->status_message, '<strong>Login Error:</strong> There was an error registering your account. Please try again.' );
							$error->add( 'registration_error', __( '<strong>ERROR</strong>: There was an error registering your account. Please try again.', 'ldap-login-for-intranet-sites' ) );
							return $error;
						}
					}
				}
			} elseif ( strcasecmp( $auth_response->status_message, 'LDAP_USER_BIND_ERROR' ) === 0 || strcasecmp( $auth_response->status_message, 'LDAP_USER_NOT_EXIST' ) === 0 ) {
				$this->utils->mo_ldap_report_update( $username, $auth_response->status_message, '<strong>Login Error:</strong> Invalid username or password entered.' );
				$error = new WP_Error();
				$error->add( 'LDAP_USER_BIND_ERROR', __( '<strong>ERROR</strong>: Invalid username or password entered.', 'ldap-login-for-intranet-sites' ) );
				return $error;
			} elseif ( strcasecmp( $auth_response->status_message, 'LDAP_ERROR' ) === 0 ) {
				$this->utils->mo_ldap_report_update( $username, $auth_response->status_message, '<strong>Login Error:</strong> <a target="_blank" rel="noopener" href="http://php.net/manual/en/ldap.installation.php">PHP LDAP extension</a> is not installed or disabled. Please enable it.' );
				$error = new WP_Error();
				$error->add( 'LDAP_ERROR', __( '<strong>ERROR</strong>: <a target="_blank" rel="noopener" href="http://php.net/manual/en/ldap.installation.php">PHP LDAP extension</a> is not installed or disabled. Please enable it.', 'ldap-login-for-intranet-sites' ) );
				return $error;
			} elseif ( strcasecmp( $auth_response->status_message, 'OPENSSL_ERROR' ) === 0 ) {
				$this->utils->mo_ldap_report_update( $username, $auth_response->status_message, '<strong>Login Error:</strong> <a target="_blank" rel="noopener" href="http://php.net/manual/en/openssl.installation.php">PHP OpenSSL extension</a> is not installed or disabled.' );
				$error = new WP_Error();
				$error->add( 'OPENSSL_ERROR', __( '<strong>ERROR</strong>: <a target="_blank" rel="noopener" href="http://php.net/manual/en/openssl.installation.php">PHP OpenSSL extension</a> is not installed or disabled.', 'ldap-login-for-intranet-sites' ) );
				return $error;
			} elseif ( strcasecmp( $auth_response->status_message, 'LDAP_PING_ERROR' ) === 0 ) {
				$this->utils->mo_ldap_report_update( $username, $auth_response->status_message, '<strong>Login Error: </strong> LDAP server is not responding ' );
				$error = new WP_Error();
				$error->add( 'LDAP_PING_ERROR', __( '<strong>ERROR</strong>:LDAP server is not reachable. Fallback to local WordPress authentication is not supported.', 'ldap-login-for-intranet-sites' ) );
			} else {
				$error = new WP_Error();
				$this->utils->mo_ldap_report_update( $username, $auth_response->status_message, '<strong>Login Error:</strong> Unknown error occurred during authentication. Please contact your administrator.' );
				$error->add( 'UNKNOWN_ERROR', __( '<strong>ERROR</strong>: Unknown error occurred during authentication. Please contact your administrator.', 'ldap-login-for-intranet-sites' ) );
				return $error;
			}
		}

		/**
		 * Function mo_ldap_local_identity_error : Log why the LDAP identity could not be verified and return a generic login error.
		 *
		 * @param  string $username : LDAP username.
		 * @param  string $code : WP_Error code.
		 * @param  string $report_message : Detailed reason shown only in the admin user report.
		 * @return WP_Error
		 */
		private function mo_ldap_local_identity_error( $username, $code, $report_message ) {
			$this->utils->mo_ldap_report_update( $username, 'ERROR', '<strong>Login Error:</strong> ' . $report_message );
			$error = new WP_Error();
			$error->add( $code, __( '<strong>ERROR</strong>: Your details were not found on the server. Please contact your administrator.', 'ldap-login-for-intranet-sites' ) );
			return $error;
		}
	}
}
