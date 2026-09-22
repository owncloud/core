<?php
/**
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

OC_Util::checkAdminUser();
OCP\JSON::callCheck();

$action=isset($_POST['action'])?$_POST['action']:$_GET['action'];

if (isset($_POST['app']) || isset($_GET['app'])) {
	$app=OC_App::cleanAppId(isset($_POST['app'])? (string)$_POST['app']: (string)$_GET['app']);
}

// Refuse any app id which is not a canonical one, so that a spelling the database
// could fold back onto an existing row - blank padding, an accent-insensitive
// collation, an invalid byte sequence, or a value long enough to be truncated into
// the varchar(32) appid column - can never reach a write. Case is still accepted;
// the normalized comparison below covers a case-insensitive collation. This is the
// same charset as AppConfigController::isCanonicalAppId(), though applied to the
// already cleanAppId'd value rather than the raw one, so this endpoint is slightly
// more permissive (e.g. it accepts "core/", which cleans to "core" - still safe,
// because the core key guard below runs on the cleaned value too).
// \z, not $: PCRE's $ also matches before a single trailing newline, which would
// let "<32 chars>\n" through to be truncated onto an existing row.
$isMutatingAction = \in_array($action, ['setValue', 'deleteKey', 'deleteApp'], true);
if ($isMutatingAction && (!isset($app) || \preg_match('/^[a-zA-Z0-9_.-]{1,32}\z/', (string)$app) !== 1)) {
	OC_JSON::error(['data' => ['message' => 'Unexpected error!']]);
	return;
}

// An admin should not be able to add remote and public services
// on its own. This should only be possible programmatically.
// This change is due the fact that an admin may not be expected
// to execute arbitrary code in every environment.
// The app id is normalized (cleanAppId does not strip whitespace/case) so that
// mangled spellings which the database folds back to the "core" row
// (e.g. "core " with a trailing space) cannot slip past the guard. The key prefix
// is matched case-insensitively for the same reason - under a case-insensitive
// collation "PUBLIC_webdav" folds onto the stored "public_webdav" row - and a key
// that is not canonical is refused outright on core, because an
// accent-insensitive collation folds "públic_webdav" onto it too.
// The key is deliberately not cast here: casting an array would raise an
// "Array to string conversion" warning in this guard on every request that posts
// key[]=…, including for apps the guard does not apply to. (The casts further
// down still do that for non-core apps - pre-existing, and harmless because only
// the core row is ever read as a service handler.) A non-string key on core is
// refused outright, matching AppConfigController::isCanonicalConfigKey().
$normalizedApp = isset($app) ? \strtolower(\trim((string)$app)) : null;
$postedKey = isset($_POST['key']) ? $_POST['key'] : null;
if ($normalizedApp === 'core' && $postedKey !== null
	&& (!\is_string($postedKey)
		|| \preg_match('/^(?:remote|public)_/i', $postedKey) === 1
		|| \preg_match('/^[a-zA-Z0-9_.-]{1,64}\z/', $postedKey) !== 1)
) {
	OC_JSON::error(['data' => ['message' => 'Unexpected error!']]);
	return;
}

// Deleting the whole "core" appconfig would drop the programmatically managed
// remote_/public_ service handlers (and all other core config). The guard above
// only fires for a request that carries a key, so deleteApp needs its own.
if ($normalizedApp === 'core' && $action === 'deleteApp') {
	OC_JSON::error(['data' => ['message' => 'Unexpected error!']]);
	return;
}

$result=false;
$appConfig = \OC::$server->getAppConfig();
switch ($action) {
	case 'getValue':
		$result=$appConfig->getValue($app, (string)$_GET['key'], (string)$_GET['defaultValue']);
		break;
	case 'setValue':
		$result=$appConfig->setValue($app, (string)$_POST['key'], (string)$_POST['value']);
		break;
	case 'getApps':
		$result=$appConfig->getApps();
		break;
	case 'getKeys':
		$result=$appConfig->getKeys($app);
		break;
	case 'hasKey':
		$result=$appConfig->hasKey($app, (string)$_GET['key']);
		break;
	case 'deleteKey':
		$result=$appConfig->deleteKey($app, (string)$_POST['key']);
		break;
	case 'deleteApp':
		$result=$appConfig->deleteApp($app);
		break;
}
OC_JSON::success(['data'=>$result]);
