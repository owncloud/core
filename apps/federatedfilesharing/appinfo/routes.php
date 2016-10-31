<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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
		['name' => 'fedSharing#createShare', 'url' => '/cloud/shares', 'verb' => 'POST'],
		['name' => 'fedSharing#reShare', 'url' => '/cloud/shares/{id}/reshare', 'verb' => 'POST'],
		['name' => 'fedSharing#updatePermissions', 'url' => '/cloud/shares/{id}/permissions', 'verb' => 'POST'],
		['name' => 'fedSharing#acceptShare', 'url' => '/cloud/shares/{id}/accept', 'verb' => 'POST'],
		['name' => 'fedSharing#declineShare', 'url' => '/cloud/shares/{id}/decline', 'verb' => 'POST'],
		['name' => 'fedSharing#unshare', 'url' => '/cloud/shares/{id}/unshare', 'verb' => 'POST'],
		['name' => 'fedSharing#revoke', 'url' => '/cloud/shares/{id}/revoke', 'verb' => 'POST'],
	]
];