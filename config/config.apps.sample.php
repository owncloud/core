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
 *  * All comments need to start with `/**` and end with ` *\/` - each on its own line
 *  * Add a `@see CONFIG_INDEX` to copy a previously described config option also to this line
 *  * Everything between the `*\/` and the next `/**` will be treated as the config option
 *  * Use RST syntax
 * If you have multiple possible keys in the comment section, separate them with a
 * blank line, which is necessary for the documentation generation process.
 * See examples below.
 */

$CONFIG = [

/**
 * App: Activity
 *
 * Possible keys: `activity_expire_days` DAYS
 */

/**
 * Define the retention for activities of the activity app
 */

'activity_expire_days' => 365,

/**
 * App: Admin Audit
 *
 * Possible keys: `log.conditions` ARRAY
 *
 * Possible keys: `admin_audit.groups` ARRAY
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
 * Possible keys: `ldapIgnoreNamingRules` `doSet` or `false`
 *
 * Possible keys: `user_ldap.enable_medial_search` BOOL
 */

/**
 * Define parameters for the LDAP app
 */

'ldapIgnoreNamingRules' => false,
'user_ldap.enable_medial_search' => false,

/**
 * App: Market
 *
 * Possible keys: `appstoreurl` URL
 */

/**
 * Define the download URL for apps
 */

'appstoreurl' => 'https://marketplace.owncloud.com',

/**
 * App: Firstrunwizard
 *
 * Possible keys: `customclient_desktop` URL
 *
 * Possible keys: `customclient_android` URL
 *
 * Possible keys: `customclient_ios` URL
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
	'https://apps.apple.com/app/id1359583808',

/**
 * App: Richdocuments
 *
 * Possible keys: `collabora_group` STRING
 */

/**
 * Define the group name for users allowed to use Collabora
 */

'collabora_group' => '',

/**
 * App: OpenID Connect(OIDC)
 *
 * Possible keys: `openid-connect` ARRAY
 */

/**
 * Configure OpenID Connect - all possible keys
 *
 * allowed-user-backends::
 * Limit the users which are allowed to login to a specific user backend - e.g. LDAP
 *
 * auth-params::
 * Additional parameters which are sent to the IdP during the auth requests
 *
 * autoRedirectOnLoginPage::
 * If true, the login page will automatically be redirected to the OpenID
 * Connect Provider, as when the button is pressed. The default is `false`.
 *
 * insecure::
 * Boolean value (true/false), no SSL verification will take place when talking to the
 * IdP - DON'T use in production!
 *
 * loginButtonName::
 * The name as displayed on the login screen which is used to redirect to the IdP.
 *
 * mode::
 * This is the attribute in the owncloud accounts table to search for users.
 * The default value is `email`. An alternative value: `userid`.
 *
 * post_logout_redirect_uri::
 * A given URL where the IdP should redirect to after logout.
 *
 * provider-params::
 * Additional config array depending on the IdP to be entered here - usually only necessary if
 * the IdP does not support service discovery.
 *
 * provider-url, client-id and client-secret::
 * Variables are to be taken from the OpenID Connect Provider's setup.
 * For the provider-url, the URL where the IdP is living.
 * In some cases (KeyCloak, Azure AD) this holds more than just a domain but also a path.
 *
 * redirect-url::
 * The full url under which the ownCloud OpenId Connect redirect url is reachable - only
 * needed in special setups.
 *
 * scopes::
 * Depending on the IdP setup, needs the list of required scopes to be entered here.
 *
 * search-attribute::
 * The attribute which is taken from the access token JWT or user info endpoint to identify the user
 * This is the claim from the OpenID Connect user information which shall be
 * used for searching in the accounts table. The default value is `email`. For
 * more information about the claim, see
 * https://openid.net/specs/openid-connect-core-1_0.html#Claims.
 *
 * token-introspection-endpoint-client-id & token-introspection-endpoint-client-secret::
 * Client ID and secret to be used with the token introspection endpoint.
 *
 * use-access-token-payload-for-user-info::
 * If set to true any user information will be read from the access token.
 * If set to false the userinfo endpoint is used (starting app version 1.1.0).
 *
 * use-token-introspection-endpoint::
 * If set to true, the token introspection endpoint is used to verify a given access
 * token - only needed if the access token is not a JWT.
 * Tokens which are not JSON WebToken(JWT) may not have information like the
 * expiry. In these cases, the OpenID Connect Provider needs to call on the token
 * introspection endpoint to get this information. The default value is `false`. See
 * https://tools.ietf.org/html/rfc7662 for more information on token introspection.
 *
 */

/**
 * Easy setup
 */
'openid-connect' => [
	'provider-url' => 'https://idp.example.net',
	'client-id' => 'fc9b5c78-ec73-47bf-befc-59d4fe780f6f',
	'client-secret' => 'e3e5b04a-3c3c-4f4d-b16c-2a6e9fdd3cd1',
	'loginButtonName' => 'OpenId Connect'
],

/**
 * Setup auto provisioning mode
 */
'openid-connect' => [
	  'auto-provision' => [
		  // explicit enable the auto provisioning mode
		'enabled' => true,
		  // documentation about standard claims:
		  // https://openid.net/specs/openid-connect-core-1_0.html#StandardClaims
		  // only relevant in userid mode, defines the claim which holds the email of the user
		'email-claim' => 'email',
		  // defines the claim which holds the display name of the user
		'display-name-claim' => 'given_name',
		  // defines the claim which holds the picture of the user - must be a URL
		'picture-claim' => 'picture',
		  // defines a list of groups to which the newly created user will be added automatically
		'groups' => ['admin', 'guests', 'employees'],
	  ],
],

/**
 * Manual setup
 */
'openid-connect' => [
	'autoRedirectOnLoginPage' => false,
	'client-id' => 'fc9b5c78-ec73-47bf-befc-59d4fe780f6f',
	'client-secret' => 'e3e5b04a-3c3c-4f4d-b16c-2a6e9fdd3cd1',
	'loginButtonName' => 'OpenId Connect',
	'mode' => 'userid',
	  // Only required if the OpenID Connect Provider does not support service discovery
	'provider-params' => [
		'authorization_endpoint' => '...',
		'end_session_endpoint' => '...',
		'jwks_uri' => '...',
		'registration_endpoint' => '...',
		'token_endpoint' => '',
		'token_endpoint_auth_methods_supported' => '...',
		'userinfo_endpoint' => '...'
	],
	'provider-url' => '...',
	'search-attribute' => 'sub',
	'use-token-introspection-endpoint' => true,
  ],

/**
 * Test setup
 */
'openid-connect' => [
	  'provider-url' => 'http://localhost:3000',
	  'client-id' => 'ownCloud',
	  'client-secret' => 'ownCloud',
	  'loginButtonName' => 'node-oidc-provider',
	  'mode' => 'userid',
	  'search-attribute' => 'sub',
	  'use-token-introspection-endpoint' => true,
		// do not verify tls host or peer
	  'insecure' => true
],
  
/**
 * App: Windows Network Drive (WND)
 *
 * Note: This app is for Enterprise Customers only
 *
 * Possible keys: `wnd.listen.reconnectAfterTime` INTEGER
 *
 * Possible keys: `wnd.logging.enable` BOOL
 *
 * Possible keys: `wnd.storage.testForHiddenMount` BOOL
 *
 * Possible keys: `wnd.in_memory_notifier.enable` BOOL
 *
 * Possible keys: `wnd.permissionmanager.cache.size` INTEGER
 *
 * Possible keys: `wnd2.cachewrapper.ttl` INTEGER
 *
 * Possible keys: `wnd.activity.registerExtension` BOOL
 *
 * Possible keys: `wnd.activity.sendToSharees` BOOL
 */

/**
 * Mandatory listener reconnect to the database
 * The listener will reconnect to the DB after given seconds. This will
 * prevent the listener to crash, if the connection to the DB is closed after
 * being idle for a long time.
 */
'wnd.listen.reconnectAfterTime' => 28800,

/**
 * Enable additional debug logging for the WND app
 */
'wnd.logging.enable' => false,

/**
 * Check for visible target mount folders when connecting.
 * Ensure, that the connectivity check verifies the mount point is visible.
 * This means the target folder is NOT hidden.
 * Setting this option to false can speed up the connectivity check by skipping
 * this step. It will be the admin's responsibility to ensure the mount
 * point is visible. This setting will affect all the WND mount points.
 */
'wnd.storage.testForHiddenMount' => true,

/**
 * Enable or disable the WND in-memory notifier for password changes.
 * Having this feature enabled implies, that whenever a WND process detects a
 * wrong password in the storage - maybe the password has changed in the
 * backend - all WND storages that are in-memory will be notified in order to reset
 * their passwords if applicable and not to requery again.
 * The intention is, to prevent a potential password lockout for the user in the backend.
 * As with PHP lower than 7.4, this feature can take a lot of memory resources.
 * This is because WND keeps the storage access and it's caches in-memory.
 * When using PHP 7.4 and above, needed memory ressources have been improved a lot.
 * Alternatively, you can disable this feature completely.
 */
'wnd.in_memory_notifier.enable' => true,

/**
 * Maximum number of items for the cache used by the WND permission managers.
 * A higher number implies that more items are allowed, increasing the memory usage.
 * Real memory usage per item varies because it depends on the path being cached.
 * Note that this is an in-memory cache used per request.
 * Multiple mounts using the same permission manager will share the same
 * cache, limiting the maximum memory that will be used.
 */
'wnd.permissionmanager.cache.size' => 512,

/**
 * TTL for the WND2 caching wrapper
 * TTL in seconds to be used to cache information for the WND2 (collaborative) cache wrapper
 * implementation. The value will be used by all WND2 storages. Although the cache isn't
 * exactly per user but per storage id, consider the cache to be per user, because
 * it will be like that for common use cases. Data will remain in the cache and won't
 * be removed by ownCloud. Aim for a low TTL value in order to not fill the memcache
 * completely. In order to properly disable caching, use -1 or any negative value. 0 (zero)
 * isn't considered a valid TTL value and will also disable caching.
 */
'wnd2.cachewrapper.ttl' => 1800,  // 30 minutes

/**
 * Enable to push WND events to the activity app
 * Register WND as extension into the Activity app in order to send information about what
 * the `wnd:process-queue` command is doing. The activity sent will be based on what
 * the `wnd:process-queue` detects, and the activity will be sent to each affected user. There
 * won't be any activity being sent outside of the `wnd:process-queue` command.
 * `wnd:listen` + `wnd:process-queue` + `activity app` are required for this to work properly.
 * Please see `wnd.activity.sendToSharees` below, to send activities for shared resources.
, * Please consider that this can have a performance impact when changes are sent to many users.
 */
'wnd.activity.registerExtension' => false,

/**
 * Enable to send WND activity notifications to sharees
 * The `wnd:process-queue` command will also send activity notifications to the sharees
 * if a WND file or folder is shared (or accessible via a share).
 * It's REQUIRED that the `wnd.activity.registerExtension` flag is set to true
 * (see above), otherwise this flag will be ignored. This flag depends on the
 * `wnd.activity.registerExtension` and has the same restrictions.
 */
'wnd.activity.sendToSharees' => false,

];
