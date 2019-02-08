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

use OCP\Files\External\IStorageConfig;
use OCP\Files\External\NotFoundException;

/**
 * Service interface to manage external storages
 *
 * @since 10.0
 */
interface IStoragesService {
	/**
	 * Get a storage with status
	 *
	 * @param int $id storage mount numeric id
	 *
	 * @return IStorageConfig
	 * @throws NotFoundException if the storage with the given id was not found
	 *
	 * @since 10.0
	 */
	public function getStorage($id);

	/**
	 * Gets all storages, valid or not
	 *
	 * @return IStorageConfig[] array of storage configs
	 *
	 * @since 10.0
	 */
	public function getAllStorages();

	/**
	 * Gets all valid storages
	 *
	 * @return IStorageConfig[]
	 *
	 * @since 10.0
	 */
	public function getStorages();

	/**
	 * Get the visibility type for this service, used in validation
	 *
	 * @return string IStoragesBackendService::VISIBILITY_* constants
	 *
	 * @since 10.0
	 */
	public function getVisibilityType();

	/**
	 * Creates a new storage configuration
	 *
	 * @return IStorageConfig
	 *
	 * @since 10.0
	 */
	public function createConfig();

	/**
	 * Add new storage to the configuration
	 *
	 * @param IStorageConfig $newStorage storage attributes
	 *
	 * @return IStorageConfig storage config, with added id
	 *
	 * @since 10.0
	 */
	public function addStorage(IStorageConfig $newStorage);

	/**
	 * Create a storage from its parameters
	 *
	 * @param string $mountPoint storage mount point
	 * @param string $backendIdentifier backend identifier
	 * @param string $authMechanismIdentifier authentication mechanism identifier
	 * @param array $backendOptions backend-specific options
	 * @param array|null $mountOptions mount-specific options
	 * @param array|null $applicableUsers users for which to mount the storage
	 * @param array|null $applicableGroups groups for which to mount the storage
	 * @param int|null $priority priority
	 *
	 * @return IStorageConfig
	 *
	 * @since 10.0
	 */
	public function createStorage(
		$mountPoint,
		$backendIdentifier,
		$authMechanismIdentifier,
		$backendOptions,
		$mountOptions = null,
		$applicableUsers = null,
		$applicableGroups = null,
		$priority = null
	);

	/**
	 * Update storage to the configuration
	 *
	 * @param IStorageConfig $updatedStorage storage attributes
	 *
	 * @return IStorageConfig storage config
	 * @throws NotFoundException if the given storage does not exist in the config
	 *
	 * @since 10.0
	 */
	public function updateStorage(IStorageConfig $updatedStorage);

	/**
	 * Delete the storage with the given id.
	 *
	 * @param int $id storage id
	 *
	 * @throws NotFoundException if no storage was found with the given id
	 *
	 * @since 10.0
	 */
	public function removeStorage($id);
}
