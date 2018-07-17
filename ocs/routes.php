<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Tom Needham <tom@owncloud.com>
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

use OCP\API;

// Config
API::register(
	'get',
	'/config',
	['OC_OCS_Config', 'apiConfig'],
	'core',
	API::GUEST_AUTH
	);
// Person
API::register(
	'post',
	'/person/check',
	['OC_OCS_Person', 'check'],
	'core',
	API::GUEST_AUTH
	);
// Privatedata
API::register(
	'get',
	'/privatedata/getattribute',
	['OC_OCS_Privatedata', 'get'],
	'core',
	API::USER_AUTH,
	['app' => '', 'key' => '']
	);
API::register(
	'get',
	'/privatedata/getattribute/{app}',
	['OC_OCS_Privatedata', 'get'],
	'core',
	API::USER_AUTH,
	['key' => '']
	);
API::register(
	'get',
	'/privatedata/getattribute/{app}/{key}',
	['OC_OCS_Privatedata', 'get'],
	'core',
	API::USER_AUTH
	);
API::register(
	'post',
	'/privatedata/setattribute/{app}/{key}',
	['OC_OCS_Privatedata', 'set'],
	'core',
	API::USER_AUTH
	);
API::register(
	'post',
	'/privatedata/deleteattribute/{app}/{key}',
	['OC_OCS_Privatedata', 'delete'],
	'core',
	API::USER_AUTH
	);

// Server-to-Server Sharing
if (\OC::$server->getAppManager()->isEnabledForUser('files_sharing')) {
	$federatedSharingApp = new \OCA\FederatedFileSharing\AppInfo\Application();
	$s2s = $federatedSharingApp->getContainer()->query('FederatedShareController');
	API::register(
		'post',
		'/cloud/shares',
		[$s2s, 'createShare'],
		'files_sharing',
		API::GUEST_AUTH
	);

	API::register(
		'post',
		'/cloud/shares/{id}/reshare',
		function ($param) use ($s2s) {
			return $s2s->reShare($param['id']);
		},
		'files_sharing',
		API::GUEST_AUTH
	);

	API::register(
		'post',
		'/cloud/shares/{id}/permissions',
		function ($param) use ($s2s) {
			return $s2s->updatePermissions($param['id']);
		},
		'files_sharing',
		API::GUEST_AUTH
	);

	API::register(
		'post',
		'/cloud/shares/{id}/accept',
		function ($param) use ($s2s) {
			return $s2s->acceptShare($param['id']);
		},
		'files_sharing',
		API::GUEST_AUTH
	);

	API::register(
		'post',
		'/cloud/shares/{id}/decline',
		function ($param) use ($s2s) {
			return $s2s->declineShare($param['id']);
		},
		'files_sharing',
		API::GUEST_AUTH
	);

	API::register(
		'post',
		'/cloud/shares/{id}/unshare',
		function ($param) use ($s2s) {
			return $s2s->unshare($param['id']);
		},
		'files_sharing',
		API::GUEST_AUTH
	);

	API::register(
		'post',
		'/cloud/shares/{id}/revoke',
		function ($param) use ($s2s) {
			return $s2s->revoke($param['id']);
		},
		'files_sharing',
		API::GUEST_AUTH
	);
}
