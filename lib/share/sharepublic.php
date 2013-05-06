<?php
/**
* ownCloud
*
* @author Michael Gapczynski
* @copyright 2012-2013 Michael Gapczynski mtgap@owncloud.com
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
namespace OCP;

/**
* This class provides the ability for apps to share their content between users.
* Apps must create a backend class that implements OCP\Share_Backend and register it with this class.
*
* It provides the following hooks:
*  - post_shared
*/
class ShareAPI {

	private $itemType;
	private $cache;


	public function __construct(OC\Share\ItemType $itemType) {
		$this->itemType = $itemType;
		$this->cache = new \OC\Share\Cache($this->itemType);
	}

	public function getShare() {

	}

	public function getShares() {

	}

	public function share(Share $share) {
		$shareTypeId = $share->getShareType();
		$shareType = $this->getShareTypeObject($shareTypeId);
		if ($shareType) {
			return $shareType->share($share);
		} else {
			return false;
		}
	}

	public function unshare(Share $share) {
		if ($share->getShareOwner() !== \OC_User::getUser()) {
			return false;
		}
		$shareTypeId = $share->getShareType();
		$shareType = $this->getShareTypeObject($shareTypeId);
		if ($shareType) {
			return $shareType->unshare($share);
		} else {
			return false;
		}
	}

	public function unshareFromSelf(Share $share) {
		// TODO better validation
		if ($share->getShareOwner() === \OC_User::getUser()) {
			return false;
		}
		$shareTypeId = $share->getShareType();
		$shareType = $this->getShareTypeObject($shareTypeId);
		if ($shareType) {
			return $shareType->unshareFromSelf($share);
		} else {
			return false;
		}
	}

	/**
	 * Update a Share in the cache
	 * @param Share $share
	 */
	public function update(Share $share) {
		if ($share->getShareOwner() !== \OC_User::getUser()) {
			return false;
		}
		$shareTypeId = $share->getShareType();
		$shareType = $this->getShareTypeObject($shareTypeId);
		if ($shareType) {
			$updatedFields = $share->getUpdatedFields();
			foreach ($updatedFields as $updatedField) {
				$setter = 'set'.ucfirst($updatedField);
				if (method_exists($shareType, $setter)) {
					$shareType->$setter($share);
				} else {
					throw new \Exception();
				}
			}
		} else {
			throw new \Exception();
		}
	}

	public function getShareTypeObject($shareTypeId) {
		if (!isset(self::$shareTypes[$shareTypeId])) {
			// Check if item type supports this share type
		}
		return self::$shareTypes[$shareTypeId];
	}

}