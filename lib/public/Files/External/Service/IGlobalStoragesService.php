<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCP\Files\External\Service;

/**
 * Service class to manage global external storages
 *
 * @since 10.0
 */
interface IGlobalStoragesService extends IStoragesService {
	/**
	 * Get all configured admin and personal mounts
	 *
	 * @return array map of storage id to storage config
	 *
	 * @since 10.0
	 */
	public function getStorageForAllUsers();

	/**
	 * Deletes the external storages mounted to the user
	 * @param \OCP\IUser $user
	 * @return bool
	 * @since 10.0.10
	 */
	public function deleteAllForUser($user);
}
