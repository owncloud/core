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

namespace OCP\Files\External;

use OCP\Files\External\Backend\Backend;
use OCP\Files\External\Auth\AuthMechanism;

/**
 * External storage configuration
 *
 * @since 10.0
 */
interface IStorageConfig extends \JsonSerializable {
	const MOUNT_TYPE_ADMIN = 1;
	const MOUNT_TYPE_PERSONAl = 2;

	const MOUNT_TYPE_GLOBAL = 'global';
	const MOUNT_TYPE_GROUP = 'group';
	const MOUNT_TYPE_USER = 'user';
	const MOUNT_TYPE_PERSONAL = 'personal';

	/**
	 * Returns the configuration id
	 *
	 * @return int
	 * @since 10.0
	 */
	public function getId();

	/**
	 * Sets the configuration id
	 *
	 * @param int $id configuration id
	 * @since 10.0
	 */
	public function setId($id);

	/**
	 * Returns mount point path relative to the user's
	 * "files" folder.
	 *
	 * @return string path
	 * @since 10.0
	 */
	public function getMountPoint();

	/**
	 * Sets mount point path relative to the user's
	 * "files" folder.
	 * The path will be normalized.
	 *
	 * @param string $mountPoint path
	 * @since 10.0
	 */
	public function setMountPoint($mountPoint);

	/**
	 * @return Backend
	 * @since 10.0
	 */
	public function getBackend();

	/**
	 * @param Backend $backend
	 * @since 10.0
	 */
	public function setBackend(Backend $backend);

	/**
	 * @return AuthMechanism
	 * @since 10.0
	 */
	public function getAuthMechanism();

	/**
	 * @param AuthMechanism $authMechanism
	 * @since 10.0
	 */
	public function setAuthMechanism(AuthMechanism $authMechanism);

	/**
	 * Returns the external storage backend-specific options
	 *
	 * @return array backend options
	 * @since 10.0
	 */
	public function getBackendOptions();

	/**
	 * Sets the external storage backend-specific options
	 *
	 * @param array $backendOptions backend options
	 * @since 10.0
	 */
	public function setBackendOptions($backendOptions);

	/**
	 * @param string $key
	 * @return mixed
	 * @since 10.0
	 */
	public function getBackendOption($key);

	/**
	 * @param string $key
	 * @param mixed $value
	 * @since 10.0
	 */
	public function setBackendOption($key, $value);

	/**
	 * Returns the mount priority
	 *
	 * @return int priority
	 * @since 10.0
	 */
	public function getPriority();

	/**
	 * Sets the mount priotity
	 *
	 * @param int $priority priority
	 * @since 10.0
	 */
	public function setPriority($priority);

	/**
	 * Returns the users for which to mount this storage
	 *
	 * @return array applicable users
	 * @since 10.0
	 */
	public function getApplicableUsers();

	/**
	 * Sets the users for which to mount this storage
	 *
	 * @param array|null $applicableUsers applicable users
	 * @since 10.0
	 */
	public function setApplicableUsers($applicableUsers);

	/**
	 * Returns the groups for which to mount this storage
	 *
	 * @return array applicable groups
	 * @since 10.0
	 */
	public function getApplicableGroups();

	/**
	 * Sets the groups for which to mount this storage
	 *
	 * @param array|null $applicableGroups applicable groups
	 * @since 10.0
	 */
	public function setApplicableGroups($applicableGroups);

	/**
	 * Returns the mount-specific options
	 *
	 * @return array mount specific options
	 * @since 10.0
	 */
	public function getMountOptions();

	/**
	 * Sets the mount-specific options
	 *
	 * @param array $mountOptions applicable groups
	 * @since 10.0
	 */
	public function setMountOptions($mountOptions);

	/**
	 * @param string $key
	 * @return mixed
	 * @since 10.0
	 */
	public function getMountOption($key);

	/**
	 * @param string $key
	 * @param mixed $value
	 * @since 10.0
	 */
	public function setMountOption($key, $value);

	/**
	 * Gets the storage status, whether the config worked last time
	 *
	 * @return int $status status
	 * @since 10.0
	 */
	public function getStatus();

	/**
	 * Gets the message describing the storage status
	 *
	 * @return string|null
	 * @since 10.0
	 */
	public function getStatusMessage();

	/**
	 * Sets the storage status, whether the config worked last time
	 *
	 * @param int $status status
	 * @param string|null $message optional message
	 * @since 10.0
	 */
	public function setStatus($status, $message = null);

	/**
	 * @return int self::MOUNT_TYPE_ADMIN or self::MOUNT_TYPE_PERSONAl
	 * @since 10.0
	 */
	public function getType();

	/**
	 * @param int $type self::MOUNT_TYPE_ADMIN or self::MOUNT_TYPE_PERSONAl
	 * @since 10.0
	 */
	public function setType($type);

	/**
	 * Serialize config to JSON
	 *
	 * @return array
	 * @since 10.0
	 */
	public function jsonSerialize();
}
