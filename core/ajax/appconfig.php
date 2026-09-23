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

$rawApp = isset($_POST['app']) ? $_POST['app'] : (isset($_GET['app']) ? $_GET['app'] : null);

// Refuse a non-string app id before anything casts it: (string)['core'] is "Array",
// which passes every check below and would land a junk row under the app id
// "Array" - plus an "Array to string conversion" warning.
if ($rawApp !== null && !\is_string($rawApp)) {
	OC_JSON::error(['data' => ['message' => 'Unexpected error!']]);
	return;
}
if ($rawApp !== null) {
	$app=OC_App::cleanAppId($rawApp);
}

// Refuse any app id which is not a canonical one, so that a spelling the database
// could fold back onto an existing row - blank padding, an accent-insensitive
// collation, an invalid byte sequence, or a value long enough to be truncated into
// the varchar(32) appid column - can never reach a write.
// Requiring cleanAppId() to be a no-op on top of the charset is what makes this
// agree with AppConfigController::setValue(), which validates and writes the raw
// value: the charset alone permits ".", so "co..re" would pass here and then be
// written as "core", and ".." would be written as the empty app id.
// deleteKey is deliberately absent, mirroring the controller: a row written under a
// non-canonical app id before this guard existed has to stay removable.
$requiresCanonicalAppId = \in_array($action, ['setValue', 'deleteApp'], true);
if ($requiresCanonicalAppId && (!OC_App::isCanonicalAppId($rawApp) || $app !== $rawApp)) {
	OC_JSON::error(['data' => ['message' => 'Unexpected error!']]);
	return;
}

// An admin should not be able to add remote and public services
// on its own. This should only be possible programmatically.
// This change is due the fact that an admin may not be expected
// to execute arbitrary code in every environment. Reading such a key back is
// refused too, so that this endpoint cannot disclose a handler path the
// controller's getValue() withholds.
// Every source the switch below might read the key from has to be checked, not
// just the one this guard would pick: the write actions take $_POST['key'] while
// getValue/hasKey take $_GET['key'], and an attacker controls both independently,
// so picking one source lets a harmless decoy in the other satisfy the guard.
// The key is deliberately not cast here: casting an array would raise an
// "Array to string conversion" warning in this guard on every request, including
// for apps the guard does not apply to. A non-string key on core is refused
// outright by OC_App::isCanonicalConfigKey().
$rawKeys = [];
if (isset($_POST['key'])) {
	$rawKeys[] = $_POST['key'];
}
if (isset($_GET['key'])) {
	$rawKeys[] = $_GET['key'];
}

// A write must not take a non-string key for any app, matching the controller: the
// casts down in the switch turn an array into the string "Array" and store a junk
// row under it. Reads are left alone - they only look up a row that cannot exist.
if (\in_array($action, ['setValue', 'deleteKey'], true)) {
	foreach ($rawKeys as $rawKey) {
		if (!\is_string($rawKey)) {
			OC_JSON::error(['data' => ['message' => 'Unexpected error!']]);
			return;
		}
	}
}
// The third arm is the deleteKey counterpart of the gate above: that action
// deliberately accepts a non-canonical app id, so that a row written under one
// before the gate existed stays removable, but only key by key and only for a
// plainly harmless key. isCoreApp() compares a normalized string and cannot see a
// spelling that only the collation folds onto "core", so deleting
// "córe"/"public_webdav" would otherwise remove core's registered handler.
if (isset($app)) {
	$appIsCanonical = OC_App::isCanonicalAppId($app);
	foreach ($rawKeys as $rawKey) {
		if (OC_App::isProtectedCoreServiceKey($app, $rawKey)
			|| (OC_App::isCoreApp($app) && !OC_App::isCanonicalConfigKey($rawKey))
			|| ($action === 'deleteKey' && !$appIsCanonical
				&& (!OC_App::isCanonicalConfigKey($rawKey) || OC_App::isServiceHandlerKey($rawKey)))
		) {
			OC_JSON::error(['data' => ['message' => 'Unexpected error!']]);
			return;
		}
	}
}

// Deleting the whole "core" appconfig would drop the programmatically managed
// remote_/public_ service handlers (and all other core config). The guard above
// only fires for a request that carries a key, so deleteApp needs its own.
if ($action === 'deleteApp' && isset($app) && OC_App::isCoreApp($app)) {
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
