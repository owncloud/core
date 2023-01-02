<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

/**
 * Interface IVersionedStorage - storage layer to access version of a file
 *
 * @package OCP\Files\Storage
 * @since 10.0.9
 */
interface IVersionedStorage {
	/**
	 * Get metadata for current version of the file (versions root)
	 *
	 * @param string $internalPath
	 * @return array metadata or null if not supported
	 * @since 10.12.0
	 */
	public function getCurrentVersion($internalPath);

	/**
	 * List metadata of all noncurrent versions for the given file
	 *
	 * @param string $internalPath
	 * @return array list of versions metadata or empty array if not supported
	 * @since 10.0.9
	 */
	public function getVersions($internalPath);

	/**
	 * Get metadata of one explicit noncurrent version for the given file.
	 *
	 * @param string $internalPath
	 * @param string $versionId
	 * @return array metadata or null if not supported
	 * @since 10.0.9
	 */
	public function getVersion($internalPath, $versionId);

	/**
	 * Get the content of a given noncurrent version of a given file as stream resource
	 *
	 * @param string $internalPath
	 * @param string $versionId
	 * @return resource
	 * @since 10.0.9
	 */
	public function getContentOfVersion($internalPath, $versionId);

	/**
	 * Restore the given noncurrent version of a given file to current version
	 *
	 * @param string $internalPath
	 * @param string $versionId
	 * @return boolean
	 * @since 10.0.9
	 */
	public function restoreVersion($internalPath, $versionId);

	/**
	 * Tells the storage to explicitly create a new noncurrent version of a file
	 *
	 * @param string $internalPath
	 * @return bool
	 * @since 10.0.9
	 */
	public function saveVersion($internalPath);
}
