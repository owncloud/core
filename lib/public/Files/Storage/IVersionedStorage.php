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
 * @since 10.1.0
 */
interface IVersionedStorage {

	/**
	 * List all versions for the given file
	 *
	 * @param string $internalPath
	 * @return array
	 * @since 10.1.0
	 */
	public function getVersions($internalPath);

	/**
	 * Get one explicit version for the given file
	 *
	 * @param string $internalPath
	 * @param string $versionId
	 * @return array
	 * @since 10.1.0
	 */
	public function getVersion($internalPath, $versionId);

	/**
	 * Get the content of a given version of a given file as string
	 *
	 * @param string $internalPath
	 * @param string $versionId
	 * @return string
	 * @since 10.1.0
	 */
	public function getContentOfVersion($internalPath, $versionId);

	/**
	 * @param string $internalPath
	 * @param string $versionId
	 * @return resource
	 * @since 10.1.0
	 */
	public function getContentOfVersionAsStream($internalPath, $versionId);

	/**
	 * Restore the given version of a given file
	 *
	 * @param string $internalPath
	 * @param string $versionId
	 * @return void
	 * @since 10.1.0
	 */
	public function restoreVersion($internalPath, $versionId);

}
