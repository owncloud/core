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

namespace OCP\Files\Storage;

use OCP\Files\StorageNotAvailableException;

/**
 * Storage adapter implementing most of the common methods from IStorage.
 *
 * @since 10.0
 */
abstract class StorageAdapter extends \OC\Files\Storage\Common {

	/**
	 * Get the identifier for the storage,
	 * the returned id should be the same for every storage object that is created with the same parameters
	 * and two storage objects with the same id should refer to two storages that display the same files.
	 *
	 * @return string storage id
	 * @since 10.0
	 */
	abstract public function getId();

	/**
	 * see http://php.net/manual/en/function.mkdir.php
	 * implementations need to implement a recursive mkdir
	 *
	 * @param string $path
	 * @return bool true on success, false otherwise
	 * @throws StorageNotAvailableException if the storage is temporarily not available
	 * @since 10.0
	 */
	abstract public function mkdir($path);

	/**
	 * see http://php.net/manual/en/function.rmdir.php
	 *
	 * @param string $path
	 * @return bool true on success, false otherwise
	 * @throws StorageNotAvailableException if the storage is temporarily not available
	 * @since 10.0
	 */
	abstract public function rmdir($path);

	/**
	 * see http://php.net/manual/en/function.opendir.php
	 *
	 * @param string $path
	 * @return resource|false
	 * @throws StorageNotAvailableException if the storage is temporarily not available
	 * @since 10.0
	 */
	abstract public function opendir($path);

	/**
	 * see http://php.net/manual/en/function.stat.php
	 * only the following keys are required in the result: size and mtime
	 *
	 * @param string $path
	 * @return array|false
	 * @throws StorageNotAvailableException if the storage is temporarily not available
	 * @since 10.0
	 */
	abstract public function stat($path);

	/**
	 * see http://php.net/manual/en/function.filetype.php
	 *
	 * @param string $path
	 * @return string|false
	 * @throws StorageNotAvailableException if the storage is temporarily not available
	 * @since 10.0
	 */
	abstract public function filetype($path);

	/**
	 * see http://php.net/manual/en/function.file_exists.php
	 *
	 * @param string $path
	 * @return bool
	 * @throws StorageNotAvailableException if the storage is temporarily not available
	 * @since 10.0
	 */
	abstract public function file_exists($path);

	/**
	 * see http://php.net/manual/en/function.unlink.php
	 *
	 * @param string $path
	 * @return bool true on success, false otherwise
	 * @throws StorageNotAvailableException if the storage is temporarily not available
	 * @since 10.0
	 */
	abstract public function unlink($path);

	/**
	 * see http://php.net/manual/en/function.fopen.php
	 *
	 * @param string $path
	 * @param string $mode
	 * @return resource|false
	 * @throws StorageNotAvailableException if the storage is temporarily not available
	 * @since 10.0
	 */
	abstract public function fopen($path, $mode);

	/**
	 * see http://php.net/manual/en/function.touch.php
	 * If the backend does not support the operation, false should be returned
	 *
	 * @param string $path
	 * @param int $mtime
	 * @return bool true on success, false otherwise
	 * @throws StorageNotAvailableException if the storage is temporarily not available
	 * @since 10.0
	 */
	abstract public function touch($path, $mtime = null);
}
