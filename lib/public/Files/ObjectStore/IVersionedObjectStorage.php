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

namespace OCP\Files\ObjectStore;

/**
 * Interface IVersionedObjectStorage - storage layer to access version of an
 * object living in an object store
 *
 * @package OCP\Files\ObjectStore
 * @since 10.0.9
 */
interface IVersionedObjectStorage {

	/**
	 * List all versions for the given file
	 *
	 * @param string $urn the unified resource name used to identify the object
	 * @return array
	 * @since 10.0.9
	 */
	public function getVersions($urn);

	/**
	 * Get one explicit version for the given file
	 *
	 * @param string $urn the unified resource name used to identify the object
	 * @param string $versionId
	 * @return array
	 * @since 10.0.9
	 */
	public function getVersion($urn, $versionId);

	/**
	 * Get the content of a given version of a given file as stream resource
	 *
	 * @param string $urn the unified resource name used to identify the object
	 * @param string $versionId
	 * @return resource
	 * @since 10.0.9
	 */
	public function getContentOfVersion($urn, $versionId);

	/**
	 * Restore the given version of a given file
	 *
	 * @param string $urn the unified resource name used to identify the object
	 * @param string $versionId
	 * @return boolean
	 * @since 10.0.9
	 */
	public function restoreVersion($urn, $versionId);

	/**
	 * Tells the storage to explicitly create a version of a given file
	 * @return boolean
	 * @since 10.0.9
	 */
	public function saveVersion($internalPath);
}
