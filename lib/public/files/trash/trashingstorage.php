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

namespace OCP\Files\Trash;

interface TrashingStorage {
	/**
	 * @param string $trashPath
	 * @param string[] $includeMeta a combination of IDirectoryEntry::META_ constants that define which meta data is included in the result
	 * @return \OCP\Files\Storage\IDirectoryEntry[]
	 */
	public function listTrashDirectory($trashPath, $includeMeta = []);

	/**
	 * @param string $trashPath
	 * @param string $targetPath
	 */
	public function restore($trashPath, $targetPath);
}
