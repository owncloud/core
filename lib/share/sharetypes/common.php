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

namespace OC\Share\ShareType;

abstract class ShareType implements IShareType {

	protected itemType;
	protected cache;

	public function __construct(ItemType $itemType, ShareMapper $cache) {
		$this->itemType = $itemType;
		$this->cache = $cache;
	}

	public function isValidShare($share) {
		if ($share instanceof OC\Share\FileDependent) {
			if (!OCP\Share->isFileSharingEnabled()) {
				throw new \InvalidShareException('files_sharing app not enabled');
			}
		}
		if (!$this->itemType->isValidItem($share)) {
			return false;
		}
		// Check if this is a reshare
		$parentId = $this->cache->getId();
		$parent = $this->cache->getShare($parentId);
		if ($parent) {
			$share->setParentId($parentId);
		}
		$permissionChecker = new PermissionChecker($this->cache);
		if (!$permissionChecker->isValidPermission($share)) {
			return false;
		}
		$timeChecker = new ExpirationChecker($this->cache);
		if (!$timeChecker->isValidTime($share)) {
			return false;
		}
		return true;
	}

	/**
	 * Verify sharing conditions and put share into cache
	 * @param OC/Share/Share $share
	 * @return 
	 */
	public function share($share) {
		if ($this->isValidShare($share)) {
			if ($share instanceof OC\Share\FileDependent) {
			// TODO get file id from file path

				$data['file_target'] = $this->generateFileTarget($share);
			}
			$data['item_target'] = $this->generateItemTarget($share);
			$id = $this->cache->put($share);
			$share->setId($id);
			return $share;
		}
	}

	public function generateItemTarget($share) {
		if ($this->itemType->isUniqueTargetRequired()) {
				$suggestedTarget = $this->itemType->suggestTarget($share);
				$this->cache->getShare()
		} else {
			return $this->itemType->suggestTarget($share);
		}
	}

	public function generateFileTarget($share) {
		if ($share instanceof OC\Share\FileDependent) {

			$suggestedTarget = OCP\Share::get('file')->suggestTarget($share);

		} else {
			return false;
		}
	}

	public function unshare($share) {
		$reshares = $this->cache->getReshares($share->getId());
		// Unshare all reshares
		foreach ($reshares as $reshare) {
			$shareAPI = new OCP\ShareAPI($reshare->getItemType());
			$shareAPI->unshare($reshare);
		}
		$this->cache->delete($share->getId());
	}

	public function unshareFromSelf($share) {
		$duplicates = $this->cache->getDuplicateShares($share);
		// Unshare duplicates from self
		foreach ($duplicates as $duplicate) {
			$reshares = $this->cache->getReshares($duplicate->getId());
			// Unshare all reshares of duplicates
			foreach ($reshares as $reshare) {
				// We don't care about duplicates of reshares
				$shareAPI = new OCP\ShareAPI($reshare->getItemType());
				$shareAPI->unshare($reshare);
			}
			$shareAPI = new OCP\ShareAPI($duplicate->getItemType());
			$shareAPI->unshare($duplicate);
		}
		$this->unshare($share);
	}

	public function setPermissions($share) {
		$permissions = $share->getPermissions();
		$oldPermissions = $this->cache->getShare($share->getId())->getPermissions();
		// Check if permissions were removed
		if (~$permissions & $oldPermissions) {
			// Update permissions of all reshares
			$reshares = $this->cache->getReshares($share->getId());
			foreach ($reshares as $reshare) {
				$resharePermissions = $reshare->getPermissions();
				// Check if reshare's permissions were removed				
				if (~$permissions & resharePermissions) {
					// If share permission is removed, delete all reshares
					if (($oldPermissions & PERMISSION_SHARE) && (~$permissions & PERMISSION_SHARE) {
						// TODO Check if share permission came from this parent share
						$reshare->unshare();
					} else {
						$resharePermissions &= $permissions;
						$reshare->setPermissions($resharePermissions);
						$shareAPI = new OCP\ShareAPI($reshare->getItemType());
						$shareAPI->update($reshare);
					}
				}
			}
		}
		$this->cache->update($share->getId(), array('permissions' => $permissions));
	}

	public function setExpirationTime($share) {
		$time = $share->getExpirationTime();
		// Check if time was decreased
		if (isset($time)) {
			$oldTime = $this->cache->getShare($share->getId())->getExpirationTime();
			if (!isset($oldTime) || $time < $oldTime) {
				// Truncate time of all reshares
				$reshares = $cache->getReshares($share->getId());
				foreach ($reshares as $reshare) {
					$reshareTime = $reshare->getExpirationTime();
					if (!isset($reshareTime) || $time < $reshareTime) {
						$reshare->setExpirationTime($time);
						$shareAPI = new OCP\ShareAPI($reshare->getItemType());
						$shareAPI->update($reshare);
					}
				}
			}
		}
		$this->cache->update($share->getId(), array('expiration' => $time));
	}

}