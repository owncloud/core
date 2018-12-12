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
 *  * everything between the ` *\/` and the next `/**` will be treated as the
 *    config option
 *  * use RST syntax
 */

$CONFIG = array(

/**
 * App: Activity
 * 
 * Possible values: `activity_expire_days` days
 */
 
/**
 * Retention for activities of the activity app
 */

'activity_expire_days' => 365,

/**
 * App: LDAP
 * 
 * Possible values: `ldapIgnoreNamingRules` 'doSet' or false
 * 
 * Possible values: `user_ldap.enable_medial_search` true or false
 */
 
/**
 * Configuring the LDAP app
 */

'ldapIgnoreNamingRules' => false,
'user_ldap.enable_medial_search' => false,

/**
 * App: Market
 * 
 * Possible values: `appstoreurl` URL
 */

/**
 * Configuring the download URL for apps
 */

'appstoreurl' => 'https://marketplace.owncloud.com',

/**
 * App: Firstrunwizard
 * 
 * Possible values: `customclient_desktop` URL
 * 
 * Possible values: `customclient_android` URL
 * 
 * Possible values: `customclient_ios` URL
 */

/**
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
 * Possible values: `collabora_group` string
 */

/**
 * Configuring the group name for users allowed to use collabora
 */

'collabora_group' => '',


);
