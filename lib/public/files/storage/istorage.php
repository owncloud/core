<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

interface IStorage {
	/**
	 * @param string $path
	 * @param string $content
	 */
	public function write($path, $content);

	/**
	 * @param string $path
	 * @return string
	 */
	public function read($path);

	/**
	 * @param string $path
	 * @param resource $stream
	 */
	public function writeStream($path, $stream);

	/**
	 * @param string $path
	 * @return resource
	 */
	public function readStream($path);

	/**
	 * @param string $path
	 * @return bool
	 */
	public function has($path);

	/**
	 * @param string $source
	 * @param string $target
	 */
	public function rename($source, $target);

	/**
	 * @param string $source
	 * @param string $target
	 */
	public function copy($source, $target);

	/**
	 * @param string $path
	 * @return string
	 */
	public function getMimeType($path);

	/**
	 * @param string $path
	 * @return int
	 */
	public function getSize($path);

	/**
	 * @param string $path
	 * @return int modified date as unix timestamp
	 */
	public function getMTime($path);

	/**
	 * @param string $path
	 */

	public function delete($path);

	/**
	 * @param string $path
	 */
	public function createDirectory($path);

	/**
	 * @param string $path
	 */
	public function deleteDirectory($path);

	/**
	 * @param string $path
	 * @param string[] $includeMeta a combination of IDirectoryEntry::META_ constants that define which meta data is included in the result
	 * @return IDirectoryEntry[]
	 */
	public function listDirectory($path, $includeMeta = []);
}
