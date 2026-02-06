=== Active Directory Integration / LDAP Integration ===
Contributors: miniOrange
Donate link: https://miniorange.com
Tags: active directory, active directory integration, ldap, ldap authentication, authentication
Requires at least: 5.0
Tested up to: 6.9
Requires PHP: 5.6.0
Stable tag: 5.4.0
License: Expat
License URI: https://plugins.miniorange.com/mit-license

Active Directory Integration/LDAP Integration enables login & sync in WordPress with Active Directory/LDAP Directory credentials, 24/7 ACTIVE SUPPORT

== Description ==

[Features](https://plugins.miniorange.com/wordpress-ldap-login-intranet-sites?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration#Features) | [Setup Guide](https://plugins.miniorange.com/step-by-step-guide-for-wordpress-ldap-login-plugin?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration) | [Documentation](https://plugins.miniorange.com/wordpress-ldap-setup-guides?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration) | [Integrations](https://plugins.miniorange.com/wordpress-ldap-login-intranet-sites?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration#Add-Ons) | [Contact Us](https://www.miniorange.com/contact?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)

[Active Directory Integration / LDAP Integration Login for Intranet Sites plugin](https://plugins.miniorange.com/wordpress-ldap-login-intranet-sites?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)   lets users sign in to WordPress using their LDAP or Active Directory credentials. It maps LDAP and Active Directory attributes to WordPress user fields, syncs profiles on login, and assigns roles based on directory groups or OUs.

This plugin supports:

* Microsoft Active Directory
* Azure Active Directory
* Sun Active Directory
* OpenLDAP Directory
* JumpCloud
* FreeIPA Directory
* Synology
* OpenDS and other LDAP directories.

* You can fetch LDAP OUs, map LDAP attributes, test LDAP and Active Directory authentication, and review LDAP authentication reports for failed login attempts.
* This plugin brings centralized LDAP and Active Directory-based authentication, improves access control, and keeps your WordPress user information consistent with your directory source.

**How the Plugin Works:**

When a user enters their details on the WordPress login page, the plugin sends an LDAP or Active Directory authentication request to your directory server. If the LDAP or AD credentials match, the user is logged in, and a WordPress account is created or updated.

During LDAP or Active Directory login, the plugin can:

* Read LDAP and AD attributes
* Map LDAP attributes to WordPress profile fields
* Assign WordPress roles based on LDAP or Active Directory groups and OUs
* Sync LDAP or AD user data on every login

You can enable LDAP secure connection (LDAPS) or Kerberos / NTLM for passwordless AD login on domain-joined machines. LDAP filters, multiple LDAP search bases, and backup LDAP servers can be configured when needed. LDAP authentication failures are logged for security review.

This ensures WordPress uses your LDAP or Active Directory server as the main source of truth for identity and login.

Plugin
[LDAP/Active Directory Login for Intranet Sites Plugin](https://plugins.miniorange.com/step-by-step-guide-for-wordpress-ldap-login-plugin?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)
[LDAP/Active Directory login for Intranet Sites Premium Plugin](https://plugins.miniorange.com/guide-to-configure-miniorange-ldap-login-premium-plugin-for-wordpress?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)
[LDAP/Active Directory login for Intranet Sites Premium Plugin for Multisite](https://plugins.miniorange.com/guide-to-setup-multisite-ldap-ad-plugin?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)
[LDAP/Active Directory login for Cloud/Shared Hosting Plugin](https://plugins.miniorange.com/step-by-step-guide-for-wordpress-ldap-login-cloud?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)

Add Ons
[Kerberos Single Sign On (SSO)](https://plugins.miniorange.com/guide-to-setup-kerberos-single-sign-sso?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)
[Sync User LDAP Directory](https://plugins.miniorange.com/guide-to-configure-miniorange-directory-sync-add-on-for-wordpress?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)
[Profile Picture Sync for WordPress and BuddyPress](https://plugins.miniorange.com/configure-miniorange-profile-picture-map-add-on-for-wordpress?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)
[Search Staff/Employee from LDAP Active Directory](https://plugins.miniorange.com/setup-active-directory-ldap-users-search-plugin?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)
[Password Sync with LDAP Server](https://plugins.miniorange.com/guide-to-setup-password-sync-with-ldap-add-on?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)

= Minimum Requirements =
* Compatible with WordPress version 5.0 or higher
* Compatible with PHP version 5.6.0 or higher
* [PHP LDAP extension Enabled](https://faq.miniorange.com/knowledgebase/how-to-enable-php-ldap-extension/?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)

**Get a quick overview of our product**

https://www.youtube.com/watch?v=VdAIDLCN-cQ

**Features of the AD Integration/ LDAP Integration Login for Intranet Sites Plugin**

The LDAP/Active Directory Login for Intranet sites plugin includes user management features as well, such as adding users from Active Directory or another LDAP Directory who are not registered in WordPress, WordPress role mapping, LDAP/Active Directory to WordPress attribute mapping, and more. We also provide additional add-ons that enhance the functionality of the basic plugin such as enabling [Kerberos/NTLM SSO Authentication](https://plugins.miniorange.com/kerberos-authentication-support?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration), importing users from Active Directory/LDAP Server to WordPress, creating users in Active Directory/LDAP server when created/registered in the WordPress site, sync users between the Active Directory/LDAP server and WordPress site, sync LDAP/Active Directory Profile Picture thumbnail attribute to WordPress user profile picture, AD integration with third-party plugins and more.

**What is Kerberos/NTLM Single Sign On (SSO)**

Effortlessly enable Single Sign-On (SSO) within your Active Directory-secured intranet using [Kerberos/NTLM authentication](https://plugins.miniorange.com/ntlm-kerberos-authentication-mechanism). Enjoy passwordless login for domain-joined machines and enhanced security through restricted external access. With cross-platform compatibility, [Kerberos authentication across Windows](https://plugins.miniorange.com/steps-setup-kerberos-windows-authentication) is also ensured. [Kerberos authentication can also be done access Ubuntu, CentOS, and RHEL](https://plugins.miniorange.com/steps-to-setup-kerberos-on-ubuntu-rhel-centos), protecting against unauthorized access and impersonation threats. You can also configure [Kerberos/NTLM SSO with Apache on Windows](https://plugins.miniorange.com/steps-to-setup-ntlm-sso-with-apache-on-windows).

**Benefits of Kerberos Authentication Protocol**

<strong>Secure Authentication</strong>: Strong cryptography ensures safe access to systems and resources.
<strong>Mutual Authentication</strong>: Verifies both client and server identities to prevent impersonation.
<strong>Cross-Platform Compatibility</strong>: Supports diverse operating systems and applications for broad SSO adoption.

= Free Version Features:- =

* <strong>LDAP / Active Directory Login:</strong> Authenticate users by verifying their LDAP or Active Directory credentials instead of storing separate credentials in WordPress. This gives your intranet a centralized login system.
* <strong>LDAP User Auto Creation:</strong> When a directory user logs in for the first time, the plugin creates a matching WordPress account automatically. No manual user creation required.
* <strong>LDAP Profile Sync:</strong> Update a user's WordPress profile on every login by pulling details such as name, email, and username from your directory server.
* <strong>Default Role Mapping:</strong> Assign a default WordPress role to all authenticated directory users to maintain consistent permissions across your intranet.
* <strong>LDAP Attribute Mapping:</strong> Map directory attributes like mail, sAMAccountName, UID, or CN to WordPress user fields. This keeps user information aligned between systems.
* <strong>[LDAPS Support](https://www.miniorange.com/guide-to-setup-ldaps-on-windows-server?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration):</strong> Encrypt all authentication traffic between WordPress and your directory server using LDAPS. This protects credentials from being intercepted.
* <strong>LDAP Authentication Reports:</strong> Record all failed LDAP or Active Directory login attempts. Admins can export these logs to review potential security issues or misconfigurations.
* <strong>Add WordPress Users to LDAP:</strong> When a new user registers on WordPress, the plugin can automatically create or update the corresponding account in your directory (when supported).
* <strong>LDAP OU Fetching:</strong> Automatically pull Organization Units (OUs) from your directory to help you set up the correct search base during configuration.
* <strong>LDAP Connection Test:</strong> Test your directory hostname, port, bind details, and search base before enabling login to ensure everything works as expected.
* <strong>Demo LDAP Server:</strong> Use the built-in demo directory to try the plugin without connecting your production LDAP or Active Directory environment.
* <strong>Hybrid LDAP Support:</strong> Support configurations where part of your environment runs on-prem Active Directory and part uses cloud directory services.
* <strong>WordPress Compatibility:</strong> Fully compatible with the latest WordPress and PHP versions. Includes documentation, setup videos, and easy configuration screens.


**You can find out how to configure the (AD Integration) Active Directory Integration / LDAP Integration plugin through the video below**

https://www.youtube.com/watch?v=5DUGgP-Hf-k

This LDAP/Active Directory Login (AD Login) plugin is free to use under the Expat license. If you wish to use enhanced features, you may purchase our [Premium version](https://plugins.miniorange.com/wordpress-ldap-login-intranet-sites?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration). We also provide additional [add-ons](https://plugins.miniorange.com/wordpress-ldap-login-intranet-sites?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration#Add-Ons) that enhance the functionality of the basic WordPress LDAP/AD Login plugin. This will help support further development of our LDAP plugin, and in turn, serve our customers better.

**[Premium Version Features](https://plugins.miniorange.com/wordpress-ldap-login-intranet-sites?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)**

* Our premium plugin includes additional features, as well as the aforementioned free plugin features. 
* <strong>Login with Any LDAP Attribute:</strong> Authenticate users using attributes like sAMAccountName, UPN, mail, UID, or any custom field defined in your directory schema.
* <strong>Advanced LDAP / AD Role Mapping:</strong> Assign roles dynamically based on a user's group membership or OU. You can create multiple mapping rules for different user segments.
* <strong>LDAP Group Fetching:</strong> Automatically fetch directory security groups to simplify role-mapping setup inside WordPress.
* <strong>Extended LDAP Attribute Mapping:</strong> Map extended directory attributes such as givenName, sn, telephoneNumber, and custom schema fields to WordPress user meta.
* <strong>Custom LDAP Attribute Support:</strong> Create custom WordPress profile fields and link them to any attribute available in your directory server.
* <strong>Custom LDAP / AD Search Filters:</strong> Restrict login using rules based on group membership, userAccountControl flags, or any advanced LDAP filter.
* <strong>Multiple LDAP Search Bases:</strong> Authenticate users across multiple OUs or directory paths without duplicating configuration.
* <strong>Multi-Directory Login:</strong> Connect WordPress to multiple LDAP or Active Directory domains. The plugin can try each directory in sequence or route users based on domain rules.
* <strong>WordPress to Directory Sync:</strong> Push WordPress profile updates back to your directory server to maintain consistency in both directions.
* <strong>Dual Authentication Mode:</strong> Allow both directory users and native WordPress users to log in. Useful for mixed environments or admin-only local access.
* <strong>Post Login Redirects:</strong> Send users to a custom URL, homepage, or profile page after successful login.
* <strong>Detailed LDAP Authentication Logs:</strong> Collect detailed logs for each failed authentication attempt, including reason codes, timestamps, and directory responses.
* <strong>Import / Export Plugin Configuration:</strong> Export your plugin setup from staging and import it into production to avoid repetitive configuration work.
* <strong>[Multisite LDAP / AD Support](https://plugins.miniorange.com/guide-to-setup-multisite-ldap-ad-plugin?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration):</strong> Configure your directory connection at the network level and apply it to selected subsites in a WordPress multisite network.
* <strong>Role-Based Login Restrictions:</strong> Restrict login based on assigned WordPress roles when running mixed login environments.
* Provides seamless AD integration with [third-party plugins](https://plugins.miniorange.com/wordpress-ldap-login-intranet-sites?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration#Add-Ons) such as BuddyBoss, BuddyPress, Ultimate Member, Gravity Forms, Groups, and eMember.

**You can find out Active Directory Integration / LDAP Integration Premium Version Features through the video below**

https://www.youtube.com/watch?v=r0pnB2d0QP8

**[Add-ons List](https://plugins.miniorange.com/wordpress-ldap-login-intranet-sites?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration#Add-Ons)**

* <strong>[Active Directory Single Sign-On (SSO) using Kerberos/NTLM](https://plugins.miniorange.com/guide-to-setup-kerberos-single-sign-sso?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration):</strong> Enable passwordless SSO for domain-joined machines using Kerberos or NTLM. Works with Apache, IIS, Windows with Apache, and GSSAPI-based authentication.
* <strong>[Sync Users LDAP Directory](https://plugins.miniorange.com/guide-to-configure-miniorange-directory-sync-add-on-for-wordpress?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration):</strong> Import directory users into WordPress and schedule ongoing synchronizations. Supports bidirectional sync when enabled.
* <strong>[Sync BuddyPress Extended Profiles](https://plugins.miniorange.com/guide-to-setup-miniorange-ldap-buddypress-integration-add-on?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration):</strong> Pull directory attributes into BuddyPress extended profile fields during login.
* <strong>[Password Sync with Active Directory/LDAP Directory](https://plugins.miniorange.com/guide-to-setup-password-sync-with-ldap-add-on?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration):</strong> Sync password changes made in WordPress back to your directory server, keeping credentials aligned.
* <strong>[Profile Picture Sync for WordPress and BuddyPress](https://plugins.miniorange.com/configure-miniorange-profile-picture-map-add-on-for-wordpress?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration):</strong> Sync thumbnail photos from your directory into WordPress or BuddyPress profile pictures.
* <strong>[Ultimate Member Login and Profile Integration](https://plugins.miniorange.com/guide-to-setup-ultimate-member-login-integration-with-ldap-credentials?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration):</strong> Enable directory login in Ultimate Member forms and map directory fields to Ultimate Member profile fields.
* <strong>Page/Post Restriction:</strong> Control access to specific pages or posts using LDAP groups or WordPress roles.
* <strong>[Search Staff From Active Directory/other LDAP Directory](https://plugins.miniorange.com/guide-to-setup-miniorange-ldap-search-widget-add-on?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration):</strong> Display directory users on a WordPress page using a searchable shortcode or widget.
* <strong>[Third-Party Plugin User Profile Integration](https://plugins.miniorange.com/guide-to-setup-third-party-user-profile-integration-with-ldap-add-on?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration):</strong> Sync directory attributes to user profiles created by other plugins.
* <strong>Gravity Forms Integration:</strong> Populate form fields with directory data and verify user identity during form submission.
* <strong>[Sync BuddyPress Groups](https://plugins.miniorange.com/guide-to-setup-miniorange-ldap-buddypress-integration-add-on?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration):</strong> Assign BuddyPress groups to users based on their directory group membership.
* <strong>MemberPress Plugin Integration:</strong> Allow access to MemberPress-protected content using LDAP or Active Directory accounts.
* <strong>eMember Plugin Integration:</strong> Enable directory login for eMember accounts.
* <strong>WP Groups Plugin Integration:</strong> Map directory groups to the Groups plugin user groups for permission-based workflows.


= Use Cases = 

<strong>[Enable SSO for Multiple Active Directory Users on Domain-Joined Machines with Kerberos/NTLM](https://plugins.miniorange.com/sso-multiple-ldap-ad-using-kerberos-ntlm-protocol?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)</strong>

Enable seamless login for employees who use domain-joined computers. When a user is already signed into their workstation with their LDAP or Active Directory account, the plugin (with the Kerberos / NTLM addon) can authenticate them automatically on WordPress without asking for a password. This gives your intranet a smooth, secure, and passwordless login flow.

<strong>[Enable MFA for External Access After LDAP Kerberos SSO](https://plugins.miniorange.com/kerberos-ntlm-sso-for-wordpress-sites?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)</strong>

Inside the intranet, users can rely on SSO through LDAP or Active Directory. But when someone logs in from outside the network or over VPN, you can require Multi-Factor Authentication (MFA). This protects sensitive content by verifying identity through both directory credentials and a second factor.

<strong>[Map LDAP/AD Groups and Attributes to WordPress User Profiles](https://plugins.miniorange.com/ldap-active-directory-group-based-authorization-in-wordpress?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)</strong>

Use directory groups and user attributes to assign WordPress roles automatically. For example, members of an "HR" group can be mapped to an editor role, while others receive subscriber or custom roles. This reduces manual user management and ensures permissions stay aligned with your organizational structure.

<strong>[Automate LDAP/Active Directory Sync with WordPress for Seamless User Management](https://plugins.miniorange.com/user-directory-sync-between-active-directory-and-wordpress?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)</strong>

Keep WordPress user accounts up to date by syncing them with LDAP or Active Directory schedules. This includes importing new users, updating profile details, syncing profile photos, and optionally enabling self-service password updates. This is useful for large teams where user details change often.

<strong>[Enable Multiple LDAP Directories Support for WordPress Authentication and Synchronization](https://plugins.miniorange.com/wordpress-user-authentication-from-ldap-active-directory?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)</strong>

If your setup includes multiple directory domains or different LDAP servers, the plugin can authenticate users across all of them. It can try servers in sequence or route users based on their domain. This helps organizations with multi-forest, multi-tenant, or hybrid identity environments.

<strong>[LDAP/Active Directory Integration for WordPress Multisite Environments](https://plugins.miniorange.com/guide-to-setup-multisite-ldap-ad-plugin?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)</strong>

Manage LDAP or Active Directory authentication across an entire WordPress multisite network. Configure the directory connection once at the network level and apply it to selected subsites. Each site can inherit settings or define its own role mappings.

= Other Use-Cases we support:- =
* <strong>[miniOrange Active Directory/LDAP Integration for Cloud & Shared Hosting Platforms Plugin](https://plugins.miniorange.com/wordpress-ldap-login-cloud?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)</strong> supports login to WordPress sites hosted on a shared hosting platform using credentials stored in active directory and LDAP Directory systems in case you are not able to enable <strong>[LDAP Extension](https://faq.miniorange.com/knowledgebase/how-to-enable-php-ldap-extension/?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)</strong> on your site.
* <strong> [Search Staff/Employee present in your Active Directory](https://plugins.miniorange.com/wordpress-ldap-directory-search?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)</strong>: Display employee information pulled directly from LDAP or Active Directory on your WordPress site. Users can search staff by name, email, department, or other attributes. This is useful for intranets, company portals, employee dashboards, and internal contact lists.


Integration with Different CMSs
[LDAP/Active Directory Integration for ExpressionEngine](https://plugins.miniorange.com/setup-ldap-ad-integration-for-expressionengine?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)
[LDAP/Active Directory Integration for OpenCart](https://plugins.miniorange.com/ldap-authentication-for-opencart?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)
[LDAP/Active Directory Integration for Craft CMS](https://plugins.miniorange.com/setup-ldap-ad-integration-for-craft-cms?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration)

= Need support? =
For support or troubleshooting help, please email us at info@xecurify.com or [Contact us](https://www.miniorange.com/contact?utm_source=wordpress%20readme&utm_medium=marketplace&utm_campaign=Active%20Directory%20Integration%20/%20LDAP%20Integration).

== Installation ==

= Prerequisites =
Active Directory Integration/LDAP Integration requires a few prerequisites before you can enable LDAP login for your WordPress sites.

I. Active Directory Integration/LDAP Integration requires a few `PHP Modules` to be enabled. Make sure these are enabled.

1. **PHP LDAP Module**:
Step-1: Open the php.ini file.
Step-2: Search for "extension=php_ldap.dll" in the php.ini file. Uncomment this line, if not present then add this line to the file and save the file.

2. **OPENSSL Module**:
Step-1: Open the php.ini file.
Step-2: Search for "extension=php_openssl.dll" in the php.ini file. Uncomment this line, if not present then add this line to the file and save the file.

II. To install Active Directory Integration/LDAP Integration the minimum requirements are:
1. **WordPress version 5.0**
2. **PHP version 5.6.0**

= From your WordPress dashboard =
1. Visit `Plugins > Add New`.
2. Search for `Active Directory Integration for Intranet Sites`. Find and Install `Active Directory Integration for Intranet Sites`.
3. Activate the plugin from your Plugins page.

= From WordPress.org =
1. Download Active Directory Integration for Intranet Sites.
2. Unzip and upload the `ldap-login-for-intranet-sites` directory to your `/wp-content/plugins/` directory.
3. Activate Active Directory Integration for Intranet Sites from your Plugins page.

= Once Activated =
1. Go to `Settings-> LDAP Login Config`, and follow the instructions.
2. Click on `Save`.

Make sure that if there is a firewall, you `OPEN THE FIREWALL` to allow incoming requests to your LDAP from your WordPress Server IP and open port 389 (636 for SSL or LDAPS).

== Frequently Asked Questions ==

=Does this plugin work with both LDAP and Active Directory?=
Yes. The plugin works with standard LDAP servers as well as Active Directory, including on-prem and hybrid environments.

=Do I need the PHP LDAP extension?=
Yes, if your hosting supports it. If the LDAP extension cannot be enabled, you can use the cloud connector addon.

=Can I keep WordPress logins enabled?=
Yes. You can allow directory users and WordPress users to log in at the same time.

=Does the plugin support LDAPS?=
Yes. You can enable LDAPS to encrypt the connection between WordPress and your directory server.

=Can I auto-create WordPress users?=
Yes. When a valid directory user logs in, their WordPress account is created automatically.

=Can I assign roles based on groups or OUs?=
Yes, this is supported in the premium version. You can map groups or OUs to specific WordPress roles.

=Does it support multiple search bases?=
Yes. You can authenticate users across several OUs or directory paths.

=Can I authenticate users from more than one directory?=
Yes. The plugin supports multiple directory servers and can route login requests accordingly.

=Does the plugin support Kerberos or NTLM SSO?=
Yes. Kerberos and NTLM are available through the SSO addon for domain-joined machines.

=Can I sync profile data from the directory to WordPress?=
Yes. Profile details are updated on login, and advanced sync options are available through add-ons.

=Is multisite supported?=
Yes. You can configure directory login at the network level and apply it to selected subsites.

=Can I map custom attributes?=
Yes. You can create custom user meta fields and map them to any attribute from your directory.

=Does it log failed login attempts?=
Yes. The plugin keeps a record of failed authentication requests for review.

=Will this plugin affect my existing users?=
No. Your current WordPress users can continue logging in unless you restrict access manually.

=Is support available?=
Yes. Free users receive basic support. Premium plans include priority support and regular updates.


== Screenshots ==

1. LDAP Connection Configuration
2. LDAP User Mapping Configuration
3. LDAP Test Authentication
4. LDAP Role Mapping
5. LDAP Attribute Mapping
6. LDAP Login Setting
7. WordPress to LDAP Sync
8. LDAP to WordPress Sync
9. AD Self-Service Password Reset
10. LDAP Profile Picture Sync
11. Import Export Configuration
12. Authentication Report
13. WP to LDAP Sync Report
14. Add New LDAP Server

== Changelog ==

= 5.4.0 =
* Security fixes - PCP, PHPCS, Vulnerability fixes

= 5.3.2 =
* Readme changes

= 5.3.1 =
* Feature to select LDAP/AD Search Base for WordPress to LDAP/AD sync

= 5.3.0 =
* Added support for automatic LDAP/AD user creation when new users register on WordPress
* Security fixes in Import configuration
* PHPCS fixes

= 5.2.5 =
* Minor Bug Fix
* Compatibility with WordPress 6.8

= 5.2.4 =
* Object class compatibility for FreeIPA

= 5.2.3 =
* Usability Improvements

= 5.2.2 =
* Security Fix

= 5.2.1 =
* Minor Security Fixes

= 5.2.0 =
* Minor Bug Fix for Active Directory Search Base Selection
* Option to Import the Plugin Configuration for site migration

= 5.1.8 =
* Minor Bug Fix
* UI Improvements
* Compatibility with WordPress 6.7 

= 5.1.7 =
* UI Improvements

= 5.1.6 =
* Usability Improvements
* Readme changes

= 5.1.5 =
* UI Improvements
* Readme changes

= 5.1.4 =
* Active Directory Integration :
 * Usability Improvements

= 5.1.3 =
* Active Directory Integration :
 * Usability Improvements
 * Readme changes

= 5.1.2 =
* Active Directory Integration :
 * UI Improvements
 * Compatibility with WordPress 6.6

= 5.1.1 =
* Active Directory Integration :
 * UI Improvements.

= 5.1.0 =
* Active Directory Integration :
 * Enhanced the Plugin's User Interface.
 * Usability Improvements.

= 5.0.6 =
* Active Directory Integration :
 * UI Improvements

= 5.0.5 =
* Active Directory Integration :
 * UI Improvements
 * Compatibility with WordPress 6.5

= 5.0.4 =
* Active Directory Integration :
 * UI Changes in Login Settings
 * Code Optimization

= 5.0.3 =
* Active Directory Integration :
 * UI Improvements and usability fixes.

= 5.0.2 =
* Active Directory Integration :
 * Usability fixes
 
= 5.0.1 =
* Active Directory Integration :
 * Code Improvement
 * Readme changes

= 5.0.0 =
* Active Directory Integration :
 * Code Restructuring and Optimization.
 * Revamped the User Interface to provide a user-friendly experience.
 * Added step-by-step approach to simplify LDAP configuration.
 * Enhanced User Reports for better usability.
 

= 4.2.2 =
* Active Directory Integration :
 * Compatibility with WordPress 6.4

= 4.2.1 =
* Active Directory Integration :
 * UI Improvements.

= 4.2 =
* Active Directory Integration :
 * Enhanced security measures to prevent LDAP Passback Vulnerability.

= 4.1.11 =
* Active Directory Integration :
 * Usability Improvements.

= 4.1.10 =
* Active Directory Integration :
 * Security Fixes.

= 4.1.9 =
* Active Directory Integration :
 * UI Improvements.

= 4.1.8 =
* Active Directory Integration :
 * Improvements in Error Messages.
 * Compatibility with WordPress version 6.3.

= 4.1.7 =
* Active Directory Integration :
 * UI Improvements.

= 4.1.6 =
* Active Directory Integration :
 * Vulnerability Fixes.

= 4.1.5 =
* Active Directory Integration :
 * Security Fixes.
 * Code Optimization.

= 4.1.4 =
* Active Directory Integration :
 * Removed Plugin Tour.

= 4.1.3 =
* Active Directory Integration :
 * Compatibility with WordPress version 6.2.

= 4.1.2 =
* Active Directory Integration :
 * Usability Improvements.
 * UI Enhancement.

= 4.1.1 =
* Active Directory Integration :
 * Vulnerability Fixes.
 * Readme update.

= 4.1.0 =
* Active Directory Integration :
 * WP Guideline & Security Fixes.
 * Code Optimization.

= 4.0.8 =
* Active Directory Integration :
 * Advertisement of Christmas Offers.
 * Usability Improvements.

= 4.0.7 =
* Active Directory Integration :
 * Updated Licensing Plans.
 * Compatibility with PHP 8.1.

= 4.0.6 =
* Active Directory Integration :
 * Compatibility with WordPress 6.1.
 * Minor UI fixes.

= 4.0.5 =
* Active Directory Integration :
 * Compatibility fixes.

= 4.0.4 =
* Active Directory Integration :
 * UI Improvement.
 * Updated setup video and guide for configuration of the Plugin.
 * Improved Account Registration form.
 
= 4.0.3 =
* Active Directory Integration :
 * UI Improvements.
 * Added new FAQ's.

= 4.0.2 =
* Active Directory Integration :
 * Usability Improvements.
 * UI Improvements.

= 4.0.1 =
* Active Directory Integration :
 * UI Improvements.
 * Usability Improvements

= 4.0 =
* Active Directory Integration :
 * UI Improvements.
 * Improved visibility of Error and Success messages.

= 3.7.7 =
* Active Directory Integration :
 * UI Enhancement.
 * Vulnerabilities Fixes & Security Improvements.

= 3.7.6 =
* Active Directory Integration :
 * Introduced new licensing plans.
 * Usability Improvements.

= 3.7.5 =
* Active Directory Integration :
 * Compatibility with WordPress 6.0.
 * Authentication report bug fixes.
 * Usability Improvements.

= 3.7.4 =
* Active Directory Integration :
 * Compatibility with WordPress 5.9.3.
 * Added a new FAQ.
 * Added a new feature to set multiple roles and persist existing roles for the user.

= 3.7.3 =
* Active Directory Integration :
 * Compatibility with WordPress 5.9.2.
 * Added Export User Authentication Reports to the CSV file feature.
 * Custom email domain feature for Users email.

= 3.7.2 =
* Active Directory Integration :
 * Bug fixes for empty email field in username attribute
 * Code optimization
 * Usability Improvements

= 3.7.1 =
* Active Directory Integration :
 * Compatibility with WordPress 5.9.
 * Usability Improvements.
 
= 3.7 =
* Active Directory Integration :
 * Usability Improvements.

= 3.6.99 =
* Active Directory Integration :
 * New Year Offers.
 * Bug fix in default email domain mapping.

= 3.6.98 =
* Active Directory Integration :
 * Christmas Offers & Usability Improvements.

= 3.6.97 =
* Active Directory Integration :
 * Usability & Security Improvements.

= 3.6.96 =
* Active Directory Integration :
 * Vulnerabilities Fixes & Security Improvements.

= 3.6.95 =
* Active Directory Integration :
 * Bug Fixes - Sanitization of input fields.

= 3.6.94 =
* Active Directory Integration :
 * Usability Improvements.
 * Added option to set user's email to username@email_domain in WordPress, if the "mail" attribute is not set in LDAP directory.

= 3.6.93 =
* Active Directory Integration :
 * Usability Improvements.

= 3.6.92 =
* Active Directory Integration :
 * Usability Improvements.

= 3.6.91 =
* Active Directory Integration :
 * Usability Improvements.

= 3.6.9 =
* Active Directory Integration :
 * Compatible with WordPress 5.8.
 * Usability Improvements.

= 3.6.8 =
* Active Directory Integration :
 * Integrated a support form for scheduling a call for assistance.

= 3.6.7 =
* Active Directory Integration :
 * Bug Fix for auto registration of LDAP user.

= 3.6.6 =
* Active Directory Integration :
 * Added new add-ons to integrate with third party plugins.
 * Usability Improvements.

= 3.6.5 =
* Active Directory Integration :
 * Usability Improvements.
 * Default Role Mapping feature.
  * Assign default WordPress role for all users after login.

= 3.6.4 =
* Active Directory Integration :
 * Usability Improvements.

= 3.6.3 =
* Active Directory Integration :
 * Tested for WordPress 5.7.
 * Compatibility Fixes for PHP 8.0.
 * Usability Improvements.
 
= 3.6.2 =
* Active Directory Integration :
 * Usability Improvements.

= 3.6.1 =
* Active Directory Integration :
 * Usability Improvements.

= 3.6 =
* Active Directory Integration :
 * Added setup guides and videos for premium add-ons.
 * Compatible with WordPress 5.6

= 3.5.93 =
* Active Directory Integration :
 * Added dropdown to select Directory Server Type.
 * Improvements in "Premium Plugin Trial Request" feature.
 * Usability Improvemnts in Licensing Page.

= 3.5.92 =
* Active Directory Integration :
 * Improvements for possible Base DNs from Active Directory.
 * Plugin tour fixes and usability improvements.
 * Added "Premium Plugin Trial Request" feature.

= 3.5.91 =
* Active Directory Integration :
 * Compatibility with WordPress 5.5.
 * Usability improvements and fixes
 * fetch users DN from Active Directory.

= 3.5.9 =
* Active Directory Integration : Usability improvements for Active Directory Integration

= 3.5.85 =
* Active Directory Integration : Usability improvement to fetch list of possible Base DNs from Active Directory

= 3.5.8 =
* Active Directory Integration : Usability improvements.

= 3.5.7 =
* Active Directory Integration : Usability improvements and bug fixes.

= 3.5.6 =
* Active Directory Integration : Compatibility with 5.4.2, Usability improvements for search attribute.

= 3.5.5 =
* Active Directory Integration : Usability changes and fix for fetching email address at login time.

= 3.5.4 =
* Active Directory Integration : PHP 7.4 and WordPress 5.4 compatibility

= 3.5.3 =
* Active Directory Integration : Compatibility fixes

= 3.5.2 =
* Active Directory Integration : Fixes
 * Compatibility Fixes
 * UI fixes

= 3.5.1 =
* Active Directory Integration : Usability Improvements.

= 3.5 =
* Active Directory Integration : 
 * Compatibility to WordPress 5.3
 * Bug Fixes and Improvements.

= 3.0.13 =
* Active Directory Integration : UI fix.

= 3.0.12 =
* Active Directory Integration : UI fix.

= 3.0.11 =
* Active Directory Integration : Bug fix for anonymous bind and uploading/editing images in wordpress.

= 3.0.10 =
* Active Directory Integration : Change in Contact Us email.

= 3.0.9 =
* Active Directory Integration : Improvements
 * Audit logs for authentication
 * Compatibility to WordPress 5.2
 * Bug Fixes and Improvements.

= 3.0.8 =
* Active Directory Integration : Bug Fixes and Improvements.

= 3.0.7 =
* Active Directory Integration : Bug Fixes and Improvements.

= 3.0.6 =
* Active Directory Integration : Multisite upgrade links added.

= 3.0.5 =
* Active Directory Integration : Bug Fixes and Improvement.

= 3.0.4 =
* Active Directory Integration : Bug Fixes and Improvement.

= 3.0.3 =
* Active Directory Integration : Bug Fixes and Improvement.

= 3.0.2 =
* Active Directory Integration : Improvements
 * Improved Visual Tour
 * Added tab for making feature requests
 * Made registration optional
 * Listed add-ons in licensing plans.

= 3.0.1 =
* Active Directory Integration : Compatibility Fix
 * Support for PHP version > 5.3
 * Wordpress 5.0.1 Compatibility

= 3.0 =
* Active Directory Integration : Added Visual Tour

= 2.92 =
* Active Directory : Role Mapping bug fixes

= 2.91 =
* Active Directory : Improvements
 * Usability fixes
 * Bug fixes
 * Licensing page revamp

= 2.9 =
* Active Directory : Usability fixes

= 2.8.3 =
* Active Directory : Added Feedback Form

= 2.8 =
* Active Directory : Removed MCrypt dependency. Bug fixes

= 2.7.7 =
* Active Directory : Phone number visible in profile

= 2.7.6 =
* Active Directory : Compatible with WordPress 4.9.4 and removed external links

= 2.7.43 =
* Active Directory : On-premise IdP information

= 2.7.42 =
* Active Directory : WordPress 4.9 Compatibility

= 2.7.4 =
* Active Directory : Fix for login with user name/email

= 2.7.3 =
* Active Directory : Additional feature links.

= 2.7.2 =
* Active Directory : Licensing fixes.

= 2.7.1 =
* Active Directory : Activation warning fix. Basic registration fields required for upgrade.

= 2.7 =
* Active Directory : Registration removal, role mapping fixes and user name attribute configurable.

= 2.6.6 =
* Active Directory : Updating Plugin Title

= 2.6.5 =
* Active Directory : Licensing fix

= 2.6.4 =
Name fixes

= 2.6.2 =
Name changed

= 2.6.1 =
Added TLS support

= 2.5.8 =
Increased priority for authentication hook

= 2.5.7 =
Licensing fixes

= 2.5.6 =
WordPress 4.6 Compatibility

= 2.5.5 =
Added option to authenticate Administrators from both LDAP and WordPress

= 2.5.4 =
More page fixes

= 2.5.3 =
Page fixes

= 2.5.2 =
Registration fixes

= 2.5.1 =
*	UI improvement and fix for WP 4.5

= 2.5 =
Added more descriptive error messages and licensing plans updated.

= 2.3 =
Support for Integrated Windows Authentication - contact info@xecurify.com if interested

= 2.2 =
+Added alternate verification method for user activation.

= 2.1 =
+Minor Bug fixes.

= 2.0 =
Attribute Mapping and Role Mapping Bug fixes and Enhancement.

= 1.9 =
Attribute Mapping bug fixes

= 1.8 =
Role Mapping Bug fixes

= 1.7 =
Fallback to local password in case LDAP server is unreacheable.

= 1.6 =
Added attribute mapping and custom profile fields from LDAP.

= 1.5 =
Added mutiple role support in WP users to LDAP Group Role Mapping.

= 1.4 =
Improved encryption to support special characters.

= 1.3 =
Enhanced Usability and UI for the plugin.

= 1.2 =
Added LDAP groups to WordPress Users Role Mapping

= 1.1 =
Enhanced Troubleshooting

= 1.0 =
* this is the first release.

== Upgrade Notice ==

= 5.4.0 =
* Security fixes - PCP, PHPCS, Vulnerability fixes

= 5.3.2 =
* Readme changes

= 5.3.1 =
* Feature to select LDAP/AD Search Base for WordPress to LDAP/AD sync

= 5.3.0 =
* Added support for automatic LDAP/AD user creation when new users register on WordPress
* Security fixes in Import configuration 
* PHPCS fixes

= 5.2.5 =
* Minor Bug Fix
* Compatibility with WordPress 6.8

= 5.2.4 =
* Object class compatibility for FreeIPA

= 5.2.3 =
* Usability Improvements

= 5.2.2 =
* Security Fix

= 5.2.1 =
* Minor Security Fixes

= 5.2.0 =
* Minor Bug Fix for Active Directory Search Base Selection
* Option to Import the Plugin Configuration for site migration

= 5.1.8 =
* Minor Bug Fix
* UI Improvements
* Compatibility with WordPress 6.7 

= 5.1.7 =
* UI Improvements

= 5.1.6 =
* Usability Improvements
* Readme changes

= 5.1.5 =
* UI Improvements
* Readme changes

= 5.1.4 =
* Active Directory Integration :
 * Usability Improvements

= 5.1.3 =
* Active Directory Integration :
 * Usability Improvements
 * Readme changes

= 5.1.2 =
* Active Directory Integration :
 * UI Improvements
 * Compatibility with WordPress 6.6

= 5.1.1 =
* Active Directory Integration :
 * UI Improvements.

= 5.1.0 =
* Active Directory Integration :
 * Enhanced the Plugin's User Interface.
 * Usability Improvements.

= 5.0.6 =
* Active Directory Integration :
 * UI Improvements

= 5.0.5 =
* Active Directory Integration :
 * UI Improvements
 * Compatibility with WordPress 6.5

= 5.0.4 =
* Active Directory Integration :
 * UI Changes in Login Settings
 * Code Optimization

= 5.0.3 =
* Active Directory Integration :
 * UI Improvements and usability fixes.

= 5.0.2 =
* Active Directory Integration :
 * Usability fixes

= 5.0.1 =
* Active Directory Integration :
 * Code Improvement
 * Readme changes

= 5.0.0 =
* Active Directory Integration :
 * Code Restructuring and Optimization.
 * Revamped the User Interface to provide a user-friendly experience.
 * Added step-by-step approach to simplify LDAP configuration.
 * Enhanced User Reports for better usability.

= 4.2.2 =
* Active Directory Integration :
 * Compatibility with WordPress 6.4

= 4.2.1 =
* Active Directory Integration :
 * UI Improvements.

= 4.2 =
* Active Directory Integration :
 * Enhanced security measures to prevent LDAP Passback Vulnerability.

= 4.1.11 =
* Active Directory Integration :
 * Usability Improvements.

= 4.1.10 =
* Active Directory Integration :
 * Security Fixes.

= 4.1.9 =
* Active Directory Integration :
 * UI Improvements.

= 4.1.8 =
* Active Directory Integration :
 * Improvements in Error Messages.
 * Compatibility with WordPress version 6.3.

= 4.1.7 =
* Active Directory Integration :
 * UI Improvements.

= 4.1.6 =
* Active Directory Integration :
 * Vulnerability Fixes.

= 4.1.5 =
* Active Directory Integration :
 * Security Fixes.
 * Code Optimization.

= 4.1.4 =
* Active Directory Integration :
 * Removed Plugin Tour.

= 4.1.3 =
* Active Directory Integration :
 * Compatibility with WordPress version 6.2.

= 4.1.2 =
* Active Directory Integration :
 * Usability Improvements.
 * UI Enhancement.

= 4.1.1 =
* Active Directory Integration :
 * Vulnerability Fixes.
 * Readme update.

= 4.1.0 =
* Active Directory Integration :
 * WP Guideline & Security Fixes.
 * Code Optimization.

= 4.0.8 =
* Active Directory Integration :
 * Advertisement of Christmas Offers.
 * Usability Improvements.

= 4.0.7 =
* Active Directory Integration :
 * Updated Licensing Plans.
 * Compatibility with PHP 8.1.

= 4.0.6 =
* Active Directory Integration :
 * Compatibility with WordPress 6.1.
 * Minor UI fixes.

= 4.0.5 =
* Active Directory Integration :
 * Compatibility fixes.

= 4.0.4 =
* Active Directory Integration :
 * UI Improvement.
 * Updated setup video and guide for configuration of the Plugin.
 * Improved Account Registration form.
 
= 4.0.3 =
* Active Directory Integration :
 * UI Improvements.
 * Added new FAQ's.

= 4.0.2 =
* Active Directory Integration :
 * Usability Improvements.
 * UI Improvements.

= 4.0.1 =
* Active Directory Integration :
 * UI Improvements.
 * Usability Improvements

= 4.0 =
* Active Directory Integration :
 * UI Improvements.
 * Improved visibility of Error and Success messages.

= 3.7.7 =
* Active Directory Integration :
 * UI Enhancement.
 * Vulnerabilities Fixes & Security Improvements.

= 3.7.6 =
* Active Directory Integration :
 * Introduced new licensing plans.
 * Usability Improvements.

= 3.7.5 =
* Active Directory Integration :
 * Compatibility with WordPress 6.0.
 * Authentication report bug fixes.
 * Usability Improvements.

= 3.7.4 =
* Active Directory Integration :
 * Compatibility with WordPress 5.9.3.
 * Added a new FAQ.
 * Added a new feature to set multiple roles and persist existing roles for the user.

= 3.7.3 =
* Active Directory Integration :
 * Compatibility with WordPress 5.9.2.
 * Added Export User Authentication Reports to the CSV file feature.
 * Custom email domain feature for Users email.

= 3.7.2 =
* Active Directory Integration :
 * Bug fixes for empty email field in username attribute
 * Code optimization
 * Usability Improvements

= 3.7.1 =
* Active Directory Integration :
 * Compatibility with WordPress 5.9.
 * Usability Improvements.

= 3.7 =
* Active Directory Integration :
 * Usability Improvements.

= 3.6.99 =
* Active Directory Integration :
 * New Year Offers.
 * Bug fix in default email domain mapping.


= 3.6.98 =
* Active Directory Integration :
 * Christmas Offers & Usability Improvements.

= 3.6.97 =
* Active Directory Integration :
 * Usability & Security Improvements.

= 3.6.96 =
* Active Directory Integration :
 * Vulnerabilities Fixes & Security Improvements.

= 3.6.95 =
* Active Directory Integration :
 * Bug Fixes - Sanitization of input fields.

= 3.6.94 =
* Active Directory Integration :
 * Usability Improvements.
 * Added option to set user's email to username@email_domain in WordPress, if the "mail" attribute is not set in LDAP directory.

= 3.6.93 =
* Active Directory Integration :
 * Usability Improvements.

= 3.6.92 =
* Active Directory Integration :
 * Usability Improvements.

= 3.6.91 =
* Active Directory Integration :
 * Usability Improvements.
 
= 3.6.9 =
* Active Directory Integration :
 * Compatible with WordPress 5.8.
 * Usability Improvements.

= 3.6.8 =
* Active Directory Integration :
 * Integrated a support form for scheduling a call for assistance.

= 3.6.7 =
* Active Directory Integration :
 * Bug Fix for auto registration of LDAP user.
 
= 3.6.6 =
* Active Directory Integration :
 * Added new add-ons to integrate with third party plugins.
 * Usability Improvements.

= 3.6.5 =
* Active Directory Integration :
 * Usability Improvements.
 * Default Role Mapping feature.
   * Assign default WordPress role for all users after login.

= 3.6.4 =
* Active Directory Integration :
 * Usability Improvements.
 
= 3.6.3 =
* Active Directory Integration :
 * Tested for WordPress 5.7.
 * Compatibility Fixes for PHP 8.0.
 * Usability Improvements.

= 3.6.2 =
* Active Directory Integration :
 * Usability Improvements.

= 3.6.1 =
* Active Directory Integration :
 * Usability Improvements.

= 3.6 =
* Active Directory Integration :
 * Added setup guides and videos for premium add-ons.
 * Compatible with WordPress 5.6

= 3.5.93 =
* Active Directory Integration :
 * Added dropdown to select Directory Server Type.
 * Improvements in "Premium Plugin Trial Request" feature.
 * Usability Improvements in Licensing Page.

= 3.5.92 =
* Active Directory Integration :
 * Improvements for possible Base DNs from Active Directory.
 * Plugin tour fixes and usability improvements.
 * Added "Premium Plugin Trial Request" feature.

= 3.5.91 =
* Active Directory Integration :
 * Compatibility with WordPress 5.5.
 * Usability improvements and fixes
 * fetch users DN from Active Directory.

= 3.5.9 =
* Active Directory Integration : Usability improvements for Active Directory Integration

= 3.5.85 =
* Active Directory Integration : Usability improvement to fetch list of possible Base DNs from Active Directory

= 3.5.8 =
* Active Directory Integration : Usability improvements.

= 3.5.7 =
* Active Directory Integration : Usability improvements and bug fixes.

= 3.5.6 =
* Active Directory Integration : Compatibility with 5.4.2, Usability improvements for search attribute.

= 3.5.5 =
* Active Directory Integration : Usability changes and fix for fetching email address at login time.

= 3.5.4 =
* Active Directory Integration : PHP 7.4 and WordPress 5.4 compatibility

= 3.5.3 =
* Active Directory Integration : Compatibility fixes

= 3.5.2 =
* Active Directory Integration : Fixes
 * Compatibility Fixes
 * UI fixes

= 3.5.1 =
* Active Directory Integration : Usability Improvements.

= 3.5 =
* Active Directory Integration : 
 * Compatibility to WordPress 5.3
 * Bug Fixes and Improvements.

= 3.0.13 =
* Active Directory Integration : UI fix.

= 3.0.12 =
* Active Directory Integration : UI fix.

= 3.0.11 =
* Active Directory Integration : Bug fix for anonymous bind and uploading/editing images in wordpress.

= 3.0.10 =
* Active Directory Integration : Change in Contact Us email.

= 3.0.9 =
* Active Directory Integration : Improvements
 * Audit logs for authentication
 * Compatibility to WordPress 5.2
 * Bug Fixes and Improvements.

= 3.0.8 =
* Active Directory Integration : Bug Fixes and Improvements.

= 3.0.7 =
* Active Directory Integration : Bug Fixes and Improvements.

= 3.0.6 =
* Active Directory Integration : Multisite upgrade links added.

= 3.0.5 =
* Active Directory Integration : Bug Fixes and Improvement.

= 3.0.4 =
* Active Directory Integration : Bug Fixes and Improvement.

= 3.0.3 =
* Active Directory Integration : Bug Fixes and Improvement.

= 3.0.2 =
* Active Directory Integration : Improvements
 * Improved Visual Tour
 * Added tab for making feature requests
 * Made registration optional
 * Listed add-ons in licensing plans.

= 3.0.1 =
* Active Directory Integration : Compatibility Fix
 * Support for PHP version > 5.3
 * Wordpress 5.0.1 Compatibility

= 3.0 =
* Active Directory Integration : Added Visual Tour

= 2.92 =
* Active Directory : Role Mapping bug fixes

= 2.91 =
* Active Directory : Improvements
 * Usability fixes
 * Bug fixes
 * Licensing page revamp

= 2.9 =
* Active Directory : Usability fixes

= 2.8.3 =
* Active Directory : Added Feedback Form

= 2.8 =
* Active Directory : Removed MCrypt dependency. Bug fixes

= 2.7.7 =
* Active Directory : Phone number visible in profile

= 2.7.6 =
* Active Directory : Compatible with WordPress 4.9.4 and removed external links

= 2.7.43 =
* Active Directory : On-premise IdP information

= 2.7.42 =
* Active Directory : WordPress 4.9 Compatibility

= 2.7.4 =
* Active Directory : Fix for login with username/email

= 2.7.3 =
* Active Directory : Additional feature links.

= 2.7.2 =
* Active Directory : Licensing fixes.

= 2.7.1 =
* Active Directory : Activation warning fix. Basic registration fields required for upgrade.

= 2.7 =
* Active Directory : Registration removal, role mapping fixes and username attribute configurable.

= 2.6.6 =
* Active Directory : Updating Plugin Title

= 2.6.5 =
* Active Directory : Licensing fix

= 2.6.4 =
Name fixes

= 2.6.2 =
Name changed

= 2.6.1 =
Added TLS support

= 2.5.8 =
Increased priority for authentication hook

= 2.5.7 =
Licensing fixes

= 2.5.6 =
WordPress 4.6 Compatibility

= 2.5.5 =
Added option to authenticate Administrators from both LDAP and WordPress

= 2.5.4 =
More page fixes

= 2.5.3 =
Page fixes

= 2.5.2 =
Registration fixes

= 2.5.1 =
*	UI improvement and fix for WP 4.5

= 2.5 =
Added more descriptive error messages and licensing plans updated.

= 2.3 =
Support for Integrated Windows Authentication - contact info@xecurify.com if interested

= 2.2 =
+Added alternate verification method for user activation.

= 2.1 =
+Minor Bug fixes.

= 2.0 =
Attribute Mapping and Role Mapping Bug fixes and Enhancement.

= 1.9 =
Attribute Mapping bug fixes

= 1.8 =
Role Mapping Bug fixes

= 1.7 =
Fallback to local password in case LDAP server is unreacheable.

= 1.6 =
Added attribute mapping and custom profile fields from LDAP .

= 1.5 =
Added mutiple role support in WP users to LDAP Group Role Mapping .

= 1.4 =
Improved encryption to support special characters.

= 1.3 =
Enhanced Usability and UI for the plugin.

= 1.2 =
Added LDAP groups to WordPress Users Role Mapping

= 1.1 =
Enhanced Troubleshooting

= 1.0 =
First version of plugin.