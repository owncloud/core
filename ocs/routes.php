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
	['\OC\OCS\Config', 'apiConfig'],
	'core',
	API::GUEST_AUTH
	);
// Person
API::register(
	'post',
	'/person/check',
	['\OC\OCS\Person', 'check'],
	'core',
	API::GUEST_AUTH
	);
// Privatedata
API::register(
	'get',
	'/privatedata/getattribute',
	['\OC\OCS\PrivateData', 'get'],
	'core',
	API::USER_AUTH,
	['app' => '', 'key' => '']
	);
API::register(
	'get',
	'/privatedata/getattribute/{app}',
	['\OC\OCS\PrivateData', 'get'],
	'core',
	API::USER_AUTH,
	['key' => '']
	);
API::register(
	'get',
	'/privatedata/getattribute/{app}/{key}',
	['\OC\OCS\PrivateData', 'get'],
	'core',
	API::USER_AUTH
	);
API::register(
	'post',
	'/privatedata/setattribute/{app}/{key}',
	['\OC\OCS\PrivateData', 'set'],
	'core',
	API::USER_AUTH
	);
API::register(
	'post',
	'/privatedata/deleteattribute/{app}/{key}',
	['\OC\OCS\PrivateData', 'delete'],
	'core',
	API::USER_AUTH
	);
