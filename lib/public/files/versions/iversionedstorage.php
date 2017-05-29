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

namespace OCP\Files\Versions;

interface IVersionedStorage {
	/**
	 * Lists a versions stored for a file
	 *
	 * @param string $path
	 * @return IVersion[]
	 */
	public function listVersions($path);

	/**
	 * Open a readable stream for a specific version
	 *
	 * @param IVersion $version
	 * @return resource
	 */
	public function readVersionStream($version);

	/**
	 * Restore a file to a specific version
	 *
	 * @param IVersion $version
	 */
	public function restore($version);
}
