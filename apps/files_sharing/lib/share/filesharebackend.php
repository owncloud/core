<?php
/**
 * ownCloud
 *
 * @author Michael Gapczynski
 * @copyright 2013 Michael Gapczynski mtgap@owncloud.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OCA\Files\Share;

use OC\Share\Share;
use OC\Share\ShareBackend;
use OC\Share\Exception\InvalidItemException;
use OC\Share\Exception\InvalidPermissionsException;
use OC\Files\Filesystem;

class FileShareBackend extends ShareBackend {

	/**
	 * Get the identifier for the item type this backend handles, should be a singular noun
	 * @return string
	 */
	public function getItemType() {
		return 'file';
	}

	/**
	 * Get the plural form of getItemType, used for the RESTful API
	 * @return string
	 */
	public function getItemTypePlural() {
		return 'files';
	}

	/**
	 * Check if an item is valid for the share owner
	 * @param \OC\Share\Share $share
	 * @throws \OC\Share\Exception\InvalidItemException If the file does not exist or the share
	 * owner does not have access to the file
	 * @return bool
	 */
	protected function isValidItem(Share $share) {
		Filesystem::init($share->getShareOwner(), '/'.$share->getShareOwner().'/files');
		$path = Filesystem::getPath((int)$share->getItemSource());
		if (!isset($path)) {
			throw new InvalidItemException('The file does not exist in the filesystem');
		}
		return true;
	}

	/**
	 * Check if a share's permissions are valid
	 * @param \OC\Share\Share $share
	 * @throws \OC\Share\Exception\InvalidPermissionsException If the permissions are not an
	 * integer or are not in the range of 1 to 31 or exceed the filesystem permissions
	 * @return bool
	 */
	protected function areValidPermissions(Share $share) {
		parent::areValidPermissions($share);
		Filesystem::init($share->getShareOwner(), '/'.$share->getShareOwner().'/files');
		$path = Filesystem::getPath((int)$share->getItemSource());
		if ($share->getPermissions() & ~Filesystem::getPermissions($path)) {
			throw new InvalidPermissionsException('The permissions are not valid for the file');
		}
		return true;
	}

}