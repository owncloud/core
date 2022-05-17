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
 * This file is also used to generate the configuration documentation using `config-to-docs`.
 * Any changes to this file must follow the rules documented in the readme of the `config-to-docs` repository.
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
  ],
],

/**
 * Filter the groups that messages are logged for
 */
'admin_audit.groups' => ['group1', 'group2'],

/**
 * App: Files Antivirus
 *
 * Possible keys: `files_antivirus.av_path` STRING
 *
 * Possible keys: `files_antivirus.av_cmd_options` STRING
 */

/**
 * Default path to the _clamscan_ command line anti-virus scanner.
 * This setting only applies when the operating mode of the `files_antivirus` app is set to executable mode.
 * See the documentation for more details.
 */
'files_antivirus.av_path' => '/usr/bin/clamscan',

/**
 * Command line options for the _clamscan_ command line anti-virus scanner.
 * This setting only applies when the operating mode of the `files_antivirus` app is set to executable mode.
 * See the documentation for more details.
 */
'files_antivirus.av_cmd_options' => '',

/**
 * App: Files Versions
 *
 * Possible keys: `versions_retention_obligation` STRING
 *
 * Use following values to configure the retention behaviour. Replace `D` with the number of days.
 *
 * auto::
 * Default value if nothing is set
 * D, auto::
 * Keep versions at least for D days, apply expiration rules to all versions that are older than D days
 * auto, D::
 * Delete all versions that are older than D days automatically, delete other versions according to expiration rules
 * D1, D2::
 * Keep versions for at least D1 days and delete when they exceed D2 days
 * disabled::
 * Disable Versions; no files will be deleted.
 */

/**
 * Pattern to define the expiration date for each backup version created.
 */
'versions_retention_obligation' => 'auto',

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
	'https://owncloud.com/desktop-app/',
'customclient_android' =>
	'https://play.google.com/store/apps/details?id=com.owncloud.android',
'customclient_ios' =>
	'https://apps.apple.com/app/id1359583808',

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
 * App: Metrics
 *
 * Note: This app is for Enterprise customers only.
 *
 * Possible keys: `metrics_shared_secret` STRING
 */

/**
 * Secret to use the Metrics dashboard
 * You have to set a Metrics secret to use the dashboard. You cannot use the dashboard
 * without defining a secret. You can use any secret you like. In case you want to generate
 * a random secret, use the following example command:
 * `echo $(tr -dc 'a-z0-9' < /dev/urandom | head -c 20)`
 * It is also possible to set this secret via an occ command which writes key and data to the
 * config.php file. Please see the occ command documentation for more information.
 */
'metrics_shared_secret' => 'replace-with-your-own-random-string',

/**
 * App: Microsoft Office Online (WOPI)
 *
 * Note: This app is for Enterprise customers only.
 *
 * Possible keys: `wopi.token.key` STRING
 *
 * Possible keys: `wopi.office-online.server` URL
 *
 * Possible keys: `wopi_group` STRING
 *
 * Possible keys: `wopi.proxy.url` URL
 *
 * Possible keys: `wopi.business-flow.enabled` STRING
 */

/**
 * Random key created by the ownCloud admin
 * This is a random key created by the ownCloud admin. This key is used by ownCloud
 * to create encrypted JWT tokens for the communication with your Microsoft Office Online instance.
 * You can use the following example command to generate a random key:
 * `echo $(tr -dc 'a-z0-9' < /dev/urandom | head -c 20)`
 */
'wopi.token.key' => 'replace-with-your-own-random-string',

/**
 * Microsoft Office Online instance URL
 * This is the URL of the Microsoft Office Online instance ownCloud communicates with. Keep
 * in mind that you need to grant communication access at your Microsoft Office
 * Online instance with this ownCloud instance. For further information, read the
 * ownCloud documentation.
 */
'wopi.office-online.server' => 'https://your.office.online.server.tld',

/**
 * Define the group name for users allowed to use Microsoft Office Online
 * Restrict access to Microsoft Office Online to a defined group. Please note, only one group can be defined. Default = empty = no restriction.
 */
'wopi_group' => '',

/**
 * Define the Proxy URL
 * This global option defines the proxy URL if you are a Microsoft Business user.
 * Note that you will get a working URL from ownCloud Support after you provide a written
 * declaration that your company has an eligible Microsoft Business contract.
 */
'wopi.proxy.url' => 'https://o365.example.com',

/**
 * Define if Business Flow Is Enabled
 * This global option defines if Office users are business users.
 * In that case, Office Online will check if the user logged in has an Office 365 business account.
 * If not, the user must sign in and Office Online will check if the subscription is valid.
 * Use yes to enable it and no to disable it or remove the key completely.
 * To use this option, you need at least ownCloud’s Microsoft Office Online app version 1.6.0.
 */
'wopi.business-flow.enabled' => 'no',

/**
 * App: Microsoft Teams Bridge
 *
 * Possible keys: `msteamsbridge` ARRAY
 *
 * Sub key: `loginButtonName` STRING
 */

/**
 * Login Button Label
 * This key is necessary for security reasons. Users will be asked to click a login
 * button each time when accessing the ownCloud app after a fresh start of their
 * Microsoft Teams app or after idle time. This behavior is by design. The button
 * name can be freely set based on your requirements.
 */
'msteamsbridge' => [
   "loginButtonName" => "Login to ownCloud with Azure AD",
],

/**
 * App: OpenID Connect (OIDC)
 *
 * Possible keys: `openid-connect` ARRAY
 *
 *
 * **Configure OpenID Connect - all possible sub-keys**
 *
 * _You have to use the main key together with sub keys listed below, see code samples._
 *
 * allowed-user-backends::
 * Limit the users which are allowed to login to a specific user backend - e.g. LDAP
 * (`'allowed-user-backends' ⇒ ['LDAP']`)
 *
 * auth-params::
 * Additional parameters which are sent to the IdP during the auth requests
 *
 * autoRedirectOnLoginPage::
 * If `true`, the ownCloud login page will redirect directly to the Identity Provider
 * login without requiring the user to click a button. The default is `false`.
 *
 * auto-provision::
 * If auto-provision is setup, an ownCloud user will be created if not exists, after successful
 * login using openid connect. The config parameters `mode` and `search-attribute` will be used
 * to create a unique user so that the lookup mechanism can find the user again. This is where
 * an LDAP setup is usually required.
 * If auto-provision is not setup or required, it is expected that the user exists and you
 * MUST declare this with `['enabled' => false]` like shown in the Easy Setup example.
 * `auto-provision` holds several sub keys, see the example setup with the explanations below.
 *
 * insecure::
 * Boolean value (`true`/`false`), no SSL verification will take place when talking to the
 * IdP - **DO NOT use in production!**
 *
 * loginButtonName::
 * The name as displayed on the login screen which is used to redirect to the IdP.
 * By default, the OpenID Connect App will add a button on the login page that will
 * redirect the user to the Identity Provider and allow authentication via OIDC.
 * This parameter allows the button text to be modified.
 *
 * mode::
 * This is the attribute in the owncloud accounts table to search for users.
 * The default value is `email`. The alternative value is: `userid`.
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
 * For the `provider-url`, the URL where the IdP is living.
 * In some cases (KeyCloak, Azure AD) this holds more than just a domain but also a path.
 *
 * redirect-url::
 * The full URL under which the ownCloud OpenId Connect redirect URL is reachable - only
 * needed in special setups.
 *
 * scopes::
 * Enter the list of required scopes depending on the IdP setup.
 *
 * search-attribute::
 * The attribute which is taken from the access token JWT or user info endpoint to identify
 * the user. This is the claim from the OpenID Connect user information which shall be
 * used for searching in the accounts table. The default value is `email`. For
 * more information about the claim, see
 * https://openid.net/specs/openid-connect-core-1_0.html#Claims.
 *
 * token-introspection-endpoint-client-id::
 * Client ID to be used with the token introspection endpoint.
 *
 * token-introspection-endpoint-client-secret::
 * Client secret to be used with the token introspection endpoint.
 *
 * use-access-token-payload-for-user-info::
 * If set to `true` any user information will be read from the access token.
 * If set to `false` the userinfo endpoint is used (starting app version 1.1.0).
 *
 * use-token-introspection-endpoint::
 * If set to `true`, the token introspection endpoint is used to verify a given access
 * token - only needed if the access token is not a JWT. If set to `false`, the userinfo
 * endpoint is used (requires version >= 1.1.0)
 * Tokens which are not JSON WebToken (JWT) may not have information like the
 * expiry. In these cases, the OpenID Connect Provider needs to call on the token
 * introspection endpoint to get this information. The default value is `false`. See
 * https://datatracker.ietf.org/doc/html/rfc7662 for more information on token introspection.
 */

/**
 * Easy setup
 */
'openid-connect' => [
	  // it is expected that the user already exists in ownCloud
	'auto-provision' => ['enabled' => false],
	'provider-url' => 'https://idp.example.net',
	'client-id' => 'fc9b5c78-ec73-47bf-befc-59d4fe780f6f',
	'client-secret' => 'e3e5b04a-3c3c-4f4d-b16c-2a6e9fdd3cd1',
	'loginButtonName' => 'OpenId Connect'
],

/**
 * Setup auto provisioning mode
 */
'openid-connect' => [
	  // explicit enable the auto provisioning mode,
	  // if not exists, the user will be created in ownCloud
	'auto-provision' => [
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
		  // sets a claim which is defined at the IDP. the IDP will return a single value or an array like:
		  // "allowed_applications": ["erp", "owncloud"],
		'provisioning-claim' => 'allowed_applications',
		  // defines the matching case for the provisioning. the attribute can only be a single value
		  // in case no match is found against the IDP response, no provisioning will be made,
		  // "User not found" will be returned
		'provisioning-attribute' => 'owncloud'
	],
	  // `mode` and `search-attribute` will be used to create a unique user in ownCloud
	'mode' => 'email',
	'search-attribute' => 'email',
],

/**
 * Manual setup
 */
'openid-connect' => [
	  // it is expected that the user already exists in ownCloud
	'auto-provision' => ['enabled' => false],
	'autoRedirectOnLoginPage' => false,
	'client-id' => 'fc9b5c78-ec73-47bf-befc-59d4fe780f6f',
	'client-secret' => 'e3e5b04a-3c3c-4f4d-b16c-2a6e9fdd3cd1',
	'loginButtonName' => 'OpenId Connect',
	'mode' => 'userid',
	'search-attribute' => 'sub',
	  // only required if the OpenID Connect Provider does not support service discovery
	  // replace the dots with your values
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
	'use-token-introspection-endpoint' => true
],

/**
 * Test setup
 */
'openid-connect' => [
	  // it is expected that the user already exists in ownCloud
	'auto-provision' => ['enabled' => false],
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
 * App: Richdocuments
 *
 * Possible keys: `collabora_group` STRING
 */

/**
 * Define the group name for users allowed to use Collabora
 * Please note, only one group can be defined. Default = empty = no restriction.
 */
'collabora_group' => '',

/**
 * App: Windows Network Drive (WND)
 *
 * Note: This app is for Enterprise customers only.
 *
 * Possible keys: `wnd.listen.reconnectAfterTime` INTEGER
 *
 * Possible keys: `wnd.logging.enable` BOOL
 *
 * Possible keys: `wnd.fileInfo.parseAttrs.mode` STRING
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
 *
 * Possible keys: `wnd.groupmembership.checkUserFirst` BOOL
 *
 * Possible keys: `wnd.connector.opts.timeout` INTEGER
 *
 * *Note* With WND 2.1.0, key `wnd.storage.testForHiddenMount` is obsolete and has been removed completely.
 */

/**
 * Mandatory Listener Reconnect to the Database
 * The listener will reconnect to the DB after given seconds. This will
 * prevent the listener to crash if the connection to the DB is closed after
 * being idle for a long time.
 */
'wnd.listen.reconnectAfterTime' => 28800,

/**
 * Enable Additional Debug Logging for the WND App
 */
'wnd.logging.enable' => false,

/**
 * The Way File Attributes for Folders and Files will be Handled
 * There are 3 possible values: "none", "stat" and "getxattr":
 *
 * - "stat". This is the default if the option is missing or has an invalid value.
 *   This means that the file attributes will be evaluated only for files, NOT for folders.
 *   Folders will be shown even if the "hidden" file attribute is set.
 *
 * - "none". This means that the file attributes won't be evaluated in any case. Both
 *   hidden files and folders will be shown, and you can write on read-only files
 *   (the action is available in ownCloud, but it will fail in the SMB server).
 *
 * - "getxattr". This means that file attributes will always be evaluated. However, due to
 *   problems in recent libsmbclient versions (4.11+, it might be earlier) it will cause
 *   malfunctions in ownCloud; permissions are wrongly evaluated. So far, this mode works
 *   with libsmbclient 4.7 but not with 4.11+ (not tested with any version in between).
 *
 * Note that the ACLs (if active) will be evaluated and applied on top of this mechanism.
 */
'wnd.fileInfo.parseAttrs.mode' => 'stat',

/**
 * Enable or Disable the WND In-Memory Notifier for Password Changes
 * Having this feature enabled implies that whenever a WND process detects a
 * wrong password in the storage - maybe the password has changed in the
 * backend - all WND storages that are in-memory will be notified in order to reset
 * their passwords if applicable and not to requery again.
 * The intention is to prevent a potential password lockout for the user in the backend.
 * As with PHP lower than 7.4, this feature can take a lot of memory resources.
 * This is because WND keeps the storage access and its caches in-memory.
 * With PHP 7.4 or above, the memory usage has been reduced significantly.
 * Alternatively, you can disable this feature completely.
 */
'wnd.in_memory_notifier.enable' => true,

/**
 * Maximum Number of Items for the Cache Used by the WND Permission Managers
 * A higher number implies that more items are allowed, increasing the memory usage.
 * Real memory usage per item varies because it depends on the path being cached.
 * Note that this is an in-memory cache used per request.
 * Multiple mounts using the same permission manager will share the same
 * cache, limiting the maximum memory that will be used.
 */
'wnd.permissionmanager.cache.size' => 512,

/**
 * TTL for the WND2 Caching Wrapper
 * Time to Live (TTL) in seconds to be used to cache information for the WND2 (collaborative)
 * cache wrapper implementation. The value will be used by all WND2 storages. Although the
 * cache isn't exactly per user but per storage id, consider the cache to be per user, because
 * it will be like that for common use cases. Data will remain in the cache and won't
 * be removed by ownCloud. Aim for a low TTL value in order to not fill the memcache
 * completely. In order to properly disable caching, use -1 or any negative value. 0 (zero)
 * isn't considered a valid TTL value and will also disable caching.
 */
'wnd2.cachewrapper.ttl' => 1800,  // 30 minutes

/**
 * Enable to Push WND Events to the Activity App
 * Register WND as extension into the Activity app in order to send information about what
 * the `wnd:process-queue` command is doing. The activity sent will be based on what
 * the `wnd:process-queue` detects, and the activity will be sent to each affected user. There
 * won't be any activity being sent outside of the `wnd:process-queue` command. `wnd:listen` +
 * `wnd:process-queue` + `activity app` are required for this to work properly. See `wnd.activity.sendToSharees`
 * below for information on how to send activities for shared resources. Please consider
 * that this can have a performance impact when changes are sent to many users.
 */
'wnd.activity.registerExtension' => false,

/**
 * Enable to Send WND Activity Notifications to Sharees
 * The `wnd:process-queue` command will also send activity notifications to the sharees
 * if a WND file or folder is shared (or accessible via a share). It's REQUIRED that the
 * `wnd.activity.registerExtension` flag is set to true (see above), otherwise this flag will
 * be ignored. This flag depends on the `wnd.activity.registerExtension` and has the same restrictions.
 */
'wnd.activity.sendToSharees' => false,

/**
 * Make the Group Membership Component Assume that the ACL Contains a User
 * The WND app doesn't know about the users or groups associated with ACLs. This
 * means that an ACL containing "admin" might refer to a user called "admin" or a
 * group called "admin". By default, the group membership component considers the ACLs to
 * target groups, and as such, it will try to get the information for such a group. This
 * works fine if the majority of the ACLs target groups. If the majority of the ACLs
 * contain users, this might be problematic. The cost of getting information on a
 * group is usually higher than getting information on a user. This option
 * makes the group membership component assume the ACL contains a user and checks whether
 * there is a user in ownCloud with such a name first. If the name doesn't refer to a user,
 * it will get the group information. Note that this will have performance implications
 * if the group membership component can't discard users in a large number of cases. It is
 * recommended to enable this option only if there are a high number of ACLs targeting users.
 */
'wnd.groupmembership.checkUserFirst' => false,

/**
 * The timeout (in ms) for all the operations against the backend.
 * The same timeout will be applied for all the connections.
 *
 * Increase it if requests to the server sometimes time out. This can happen when SMB3
 * encryption is selected and smbclient is overwhelming the server with requests.
 */
'wnd.connector.opts.timeout' => 20000,  // 20 seconds

/**
 * App: Workflow / Tagging
 *
 * Note: This app is for Enterprise customers only.
 *
 * Possible keys: `workflow.retention_engine` STRING
 */

/**
 * Provide Advanced Management of File Tagging
 * Enables admins to specify rules and conditions (file size, file mimetype, group membership and more)
 * to automatically assign tags to uploaded files. Values: `tagbased` (default) or `userbased`.
 */

'workflow.retention_engine' => 'tagbased',

];
