<?php

/**
 * This configuration file is only provided to document the different
 * configuration options and their usage for apps maintained by ownCloud.
 *
 * DO NOT COMPLETELY BASE YOUR CONFIGURATION FILE ON THESE SAMPLES. THIS MAY BREAK
 * YOUR INSTANCE. Instead, manually copy configuration switches that you
 * consider important for your instance to your working `config.php`, and
 * apply configuration options that are pertinent for your instance.
 *
 * All keys are only valid if the corresponding app is installed and enabled.
 * You MUST copy the keys needed to the active config.php file.
 *
 * This file is used to generate the configuration documentation.
 * Please consider following requirements of the current parser:
 *  * all comments need to start with `/**` and end with ` *\/` - each on their
 *    own line
 *  * add a `@see CONFIG_INDEX` to copy a previously described config option
 *    also to this line
 *  * everything between the `*\/` and the next `/**` will be treated as the
 *    config option
 *  * use RST syntax
 * If you have multiple possible values in the comment section, separate them with a
 * blank line, which is necessary for the documentation generation process.
 * See examples below.
 */

$CONFIG = [

/**
 * App: Activity
 *
 * Possible values: `activity_expire_days` days.
 */

/**
 * Define the retention for activities of the activity app
 */

'activity_expire_days' => 365,

/**
 * App: Admin Audit
 *
 * Possible values: `log.conditions` ARRAY.
 *
 * Possible values: `admin_audit.groups` ARRAY.
 */

/**
 * Configure the path to the log file
 */
'log.conditions' => [
  [
	'apps' => ['admin_audit'],
	// Adjust the path below, to match your setup
	'logfile' => '/var/www/owncloud/data/admin_audit.log'
  ]
],

/**
 * Filter the groups that messages are logged for.
 */
'admin_audit.groups' => [
  'group1',
  'group2'
],

/**
 * App: LDAP
 *
 * Possible values: `ldapIgnoreNamingRules` `doSet` or `false`.
 *
 * Possible values: `user_ldap.enable_medial_search` `true` or `false`.
 */

/**
 * Define parameters for the LDAP app
 */

'ldapIgnoreNamingRules' => false,
'user_ldap.enable_medial_search' => false,

/**
 * App: Market
 *
 * Possible values: `appstoreurl` URL.
 */

/**
 * Define the download URL for apps
 */

'appstoreurl' => 'https://marketplace.owncloud.com',

/**
 * App: Firstrunwizard
 *
 * Possible values: `customclient_desktop` URL.
 *
 * Possible values: `customclient_android` URL.
 *
 * Possible values: `customclient_ios` URL.
 */

/**
 * Define the download links for ownCloud clients
 * Configuring the download links for ownCloud clients,
 * as seen in the first-run wizard and on Personal pages
 */

'customclient_desktop' =>
	'https://owncloud.org/install/#install-clients',
'customclient_android' =>
	'https://play.google.com/store/apps/details?id=com.owncloud.android',
'customclient_ios' =>
	'https://itunes.apple.com/us/app/owncloud/id543672169?mt=8',

/**
 * App: Richdocuments
 *
 * Possible values: `collabora_group` string.
 */

/**
 * Define the group name for users allowed to use Collabora
 */

'collabora_group' => '',

/**
 * OpenID Connect(OIDC) Configuration
 *
 * App: openidconnect
 */

/**
 * Configure OpenID Connect
 *
 * The `provider-url`, `client-id` and `client-secret` variables are to be
 * taken from the OpenID Connect Provider's setup. The `loginButtonName`
 * variable can be freely chosen, depending on the installation.
 *
 * NOTE: The provider-params configuration array only needs to be used if the
 * OpenID Connect Provider does NOT support service discovery.
 *
 * autoRedirectOnLoginPage::
 * If true, the login page will automatically be redirected to the OpenID
 * Connect Provider, as when the button is pressed. The default is `false`.
 *
 * mode::
 * This is the attribute in the owncloud accounts table to search for users.
 * The default value is `email`. An alternative value: `userid`.
 *
 * search-attribute::
 * This is the claim from the OpenID Connect user information which shall be
 * used for searching in the accounts table. The default value is `email`. For
 * more information about the claim, see
 * https://openid.net/specs/openid-connect-core-1_0.html#Claims.
 *
 * use-token-introspection-endpoint::
 * There are tokens which are not JSON WebToken(JWT) and information like the
 * expiry cannot be read from the token itself. In these cases, the OpenID
 * Connect Provider needs to call on the token introspection endpoint to get
 * this information. The default value is `false`. See
 * https://tools.ietf.org/html/rfc7662 for more information on token
 * introspection.
 */
'openid-connect' => [
	'autoRedirectOnLoginPage' => false,
	'client-id' => '',
	'client-secret' => '',
	'loginButtonName' => 'OpenId Connect',
	'mode' => 'userid',
	// Only required if the OpenID Connect Provider does not support service discovery
	'provider-params' => [
		'authorization_endpoint' => '',
		'end_session_endpoint' => '',
		'jwks_uri' => '',
		'registration_endpoint' => '',
		'token_endpoint' => '',
		'token_endpoint_auth_methods_supported' => '',
		'userinfo_endpoint' => ''
	],
	'provider-url' => '',
	'search-attribute' => 'sub',
	'use-token-introspection-endpoint' => true,
  ],

];
