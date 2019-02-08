<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

return [
	'ocs' => [
		// ocm 0.3
		['root' => '/cloud', 'name' => 'RequestHandler#createShare', 'url' => '/shares', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'RequestHandler#reShare', 'url' => '/shares/{id}/reshare', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'RequestHandler#updatePermissions', 'url' => '/shares/{id}/permissions', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'RequestHandler#acceptShare', 'url' => '', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'RequestHandler#acceptShare', 'url' => '/shares/{id}/accept', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'RequestHandler#declineShare', 'url' => '/shares/{id}/decline', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'RequestHandler#unshare', 'url' => '/shares/{id}/unshare', 'verb' => 'POST'],
		['root' => '/cloud', 'name' => 'RequestHandler#revoke', 'url' => '/shares/{id}/revoke', 'verb' => 'POST'],

		// ocm 1.0-proposal1
		['root' => '/', 'name' => 'OcmController#discovery', 'url' => '/ocm-provider', 'verb' => 'GET'],
	],

	'routes' => [
		// ocm 1.0-proposal1
		['name' => 'ocm#index', 'url' => '/', 'verb' => 'GET'],
		['name' => 'ocm#createShare', 'url' => '/shares', 'verb' => 'POST'],
		['name' => 'ocm#processNotification', 'url' => '/notifications', 'verb' => 'POST'],
	]
];
