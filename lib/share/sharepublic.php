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

abstract class ShareAPI {

	/**
	 * Check if an item is valid for the user specified by uidOwner
	 * @param Share $share
	 * @return bool
	 *
	 * Needs to check if the user owns this item or has access to it through a share
	 * 
	 */
	abstract public function isValidItem(Share $share);

	/**
	 * Get the ShareFactory object for this item type
	 * @return ShareFactory
	 */
	abstract public function getShareFactory();

	/**
	 * Check if a unique target per user is required for this item type
	 * @return bool
	 */
	abstract public function isUniqueTargetRequired();

	/**
	 * Get a unique 
	 * @return string
	 */
	abstract public function generateUniqueTarget(Share $share);

	// TODO I guess we should merge duplicate shares somewhere out here
	public function getShares($shareWith = null, $uidOwner = null, $isShareWithUser = true,
		$extraFilter = null
	) {
		$shareTypes = Utility::getSupportedShareTypes($this);
		$shares = array();
		foreach ($shareTypes as $shareType) {
			$result = $shareType->getShares($shareWith, $uidOwner, $isShareWithUser, $extraFilter);
			foreach ($result as $share) {
				if (!$this->isExpired($share)) {
					$shares[] = $share;
				} else {
					$this->unshare($share);
				}
			}
		}
		return $shares;
	}

	/**
	 * Get the shares with the specified item target and additional parameters
	 * @param string $itemTarget
	 * @param string $shareWith (optional)
	 * @param string $uidOwner (optional)
	 * @param bool $isShareWithUser (optional, default = true)
	 * @return array
	 */
	public function getSharesByTarget($itemTarget, $shareWith = null, $uidOwner = null,
		$isShareWithUser = true
	) {
		$extraFilter = array('`item_target` = ?', array($itemTarget));
		return $shareType->getShares($itemSource, $shareWith, $uidOwner, $extraFilter);
	}

	/**
	 * Get the shares with the specified item source and additional parameters
	 * @param string $itemSource
	 * @param string $shareWith (optional)
	 * @param string $uidOwner (optional)
	 * @param bool $isShareWithUser (optional, default = true)
	 * @return array
	 */
	public function getSharesBySource($itemSource, $shareWith = null, $uidOwner = null,
		$isShareWithUser = true
	) {
		$extraFilter = array('`item_source` = ?', array($itemSource));
		return $shareType->getShares($itemSource, $shareWith, $uidOwner, $extraFilter);
	}

	/**
	 * Get the reshares of a share
	 * @param Share $share
	 * @return array
	 */
	public function getReshares(Share $share) {
		$extraFilter = array('`parent_id` = ?', array($share->getId()));
		return $this->getShares(null, null, true, $extraFilter);
	}

	/**
	 * Get the duplicates of a share
	 * @param Share $share
	 * @return array
	 *
	 * These are shares to the same person of the same item from different owners
	 * 
	 */
	public function getDuplicates(Share $share) {
		$where = '`item_source` = ? AND `id != ?';
		$params = array($share->getItemSource(), $share->getId());
		$extraFilter = array($where, $params);
		return $this->getShares($share->getUidOwner(), null, true, $extraFilter);
	}

	/**
	 * Get the parent share of a share
	 * @param Share $share
	 * @param bool $find (optional, default = false)
	 * @return Share
	 */
	public function getParent(Share $share, $find = false) {
		// TODO need to know about collections here - find parent item types
		if ($find === false) {
			$parents = $this->getShares(null, null, true, array('`id` = ?', $id));
			if (!empty($parents)) {
				if (count($parents) > 1) {
					throw new \Exception();
				} else {
					return current($parents);
				}
			} else {
				return false;
			}
		} else {
			$extraFilter = array('`item_source` = ?', $share->getItemSource());
			$parents = $this->getShares($share->getUidOwner(), null, true, $extraFilter);
			if (!empty($parents)) {
				foreach ($parents as $parent) {
					if ($parent->getPermissions() & OCP\PERMISSION_SHARE) {
						return $parent;
					}
				}
				// Resharing not allowed
				throw new \Exception()
			} else {
				return false;
			}
		}
	}

	public function searchForShares($pattern) {
		// TODO
	}

	/**
	 * Share a share
	 * @param Share $share
	 * @return bool
	 */
	public function share(Share $share) {
		if ($this->isValidItem($share)) {
			$shareType = Utility::getSupportedShareType($this, $share->getShareTypeId());
			if ($shareType) {
				$parent = $this->getParent($share, true);
				if ($parent) {
					$share->setParentId($parent->getId());
				}
				if ($shareType->isValidShare($share)
					&& $this->areValidPermissions($share)
					&& $this->isValidExpirationTime($share)
				) {
					return $shareType->share($share);
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	/**
	 * Unshare a share
	 * @param Share $share
	 */
	public function unshare(Share $share) {
		$shareType = Utility::getSupportedShareType($this, $share->getShareTypeId());
		if ($shareType) {
			$reshares = $this->getReshares($share);
			if (!empty($reshares)) {
				// Try to find a duplicate share, to switch parent ids of reshares
				$parentId = null;
				$duplicates = $this->getDuplicates($share);
				foreach ($duplicates as $duplicate) {
					if ($duplicate->getPermissions() & OCP\PERMISSION_SHARE) {
						$parentId = $duplicate->getId();
						break;
					}
				}
				foreach ($reshares as $reshare) {
					if (isset($parentId)) {
						$reshare->setParentId($parentId);
						$this->update($reshare);
					} else {
						$this->unshare($reshare);
					}
				}
			}
			$shareType->unshare($share);
		}
	}

	/**
	 * Update a share in the database
	 * @param Share $share
	 */
	public function update(Share $share) {
		// TODO Fix 
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
				if ($setter === 'setPermissions') {

				} else if ($setter === 'setExpirationTime') {

				}
			}
		} else {
			throw new \Exception();
		}
	}

	/**
	 * Unshare all shares of an item 
	 * @param any $itemSource
	 * 
	 * Call this if an item is deleted by the item owner
	 * 
	 */
	public function deleteItem($itemSource) {
		$shares = $this->getSharesBySource($itemSource);
		foreach ($shares as $share) {
			$this->unshare($share);
		}
	}

	/**
	 * Get potential people to share with based on the given pattern
	 * @param string $pattern
	 * @return array
	 */
	public function searchForShareWiths($pattern) {
		$shareTypes = Utility::getSupportedShareTypes($this);
		$shareWiths = array();
		foreach ($shareTypes as $shareType) {
			$shareWiths += $shareType->searchForShareWiths($pattern);
		}
		return $shareWiths;
	}

	/**
	 * Check if a share is expired
	 * @param Share $share
	 * @return bool
	 */
	protected function isExpired(Share $share) {
		$time = $share->getExpirationTime();
		if (isset($time)) {
			if ($time - time() > 0) {
				return true;
			} else {
				return false;
			}
		} else {
			$defaultTime = $this->getDefaultTime();
			if ($defaultTime > 0 && ($defaultTime + $share->getShareTime()) - time() > 0)) {
				return true;
			} else {
				return false;
			}
		}
	}

	/**
	 * Check if a share's permissions are valid
	 * @param Share $share
	 * @return bool
	 */
	protected function areValidPermissions($share) {
		$permissions = $share->getPermissions();
		if (!is_int($permissions) || $permisisons < 0 || $permissions > OCP\PERMISSION_All) {
			throw new \Exception();
		}
		$parent = $this->getParent($share)
		if ($parent) {
			if (!Utility::isResharingAllowed()) {
				throw new \Exception();
			}
			// Check if permissions exceed the parent share permissions
			if ($permissions & ~$parent->getPermissions()) {
				throw new \Exception($message);
			}
			// Check if share permission is granted
			if (~$parentPermissions & OCP\PERMISSION_SHARE) {
				throw new \Exception();
			}
		}
		// TODO Check if permission allowed for item
		return true;
	}

	/**
	 * Update permissions of all reshares of a share
	 * @param Share $share
	 */
	protected function updateResharesPermissions(Share $share, $oldPermissions) {
		$permissions = $share->getPermissions();
		// Check if permissions were removed
		if (~$permissions & $oldPermissions) {
			// Update permissions of all reshares
			$reshares = $this->getReshares($share);
			if (!empty($reshares)) {
				// Try to find a duplicate share, to switch parent ids of reshares
				if (~$permissions & OCP\PERMISSION_SHARE) {
					$parentId = null;
					$duplicates = $this->getDuplicates($share);
					foreach ($duplicates as $duplicate) {
						if ($duplicate->getPermissions() & OCP\PERMISSION_SHARE) {
							$parentId = $duplicate->getId();
							break;
						}
					}
				}
				foreach ($reshares as $reshare) {
					$resharePermissions = $reshare->getPermissions();
					// Check if reshare's permissions were removed				
					if (~$permissions & resharePermissions) {
						$resharePermissions &= $permissions;
						$reshare->setPermissions($resharePermissions);
						// If share permission is removed, unshare all reshares
						if (~$permissions & OCP\PERMISSION_SHARE) {
							if (isset($parentId)) {
								$reshare->setParentId($parentId);
								$this->update($reshare);
							} else {
								$this->unshare($reshare);
							}
						} else {
							$this->update($reshare);
						}
					}
				}
			}
		}
	}

	/**
	 * Check if a share's expiration time is valid
	 * @param Share $share
	 * @return bool
	 */
	protected function isValidExpirationTime(Share $share) {
		$time = $share->getExpirationTime();
		if (isset($time) && !is_int($time)) {
			throw new \Exception($message);
		}
		// Time must be at least 1 hour in the future
		if (isset($time) && $time < time() + 3600) {
			throw new \Exception($message);
		}
		$parent = $this->getParent($share)
		if ($parent) {
			// Check if time is later than the parent expiration time
			$parentTime = $parent->getExpirationTime();
			if (isset($parentTime)) {
				if ((!isset($time) || $time > $parentTime) {
					throw new \Exception($message);
				}
			}
		}
		return true;
	}

	/**
	 * Update expiration time of all reshares of a share
	 * @param Share $share
	 */
	protected function updateResharesExpirationTime(Share $share, $oldTime) {
		$time = $share->getExpirationTime();
		// Check if time was decreased
		if (isset($time)) {
			if (!isset($oldTime) || $time < $oldTime) {
				// Truncate time of all reshares
				$reshares = $this->getReshares($share);
				foreach ($reshares as $reshare) {
					$reshareTime = $reshare->getExpirationTime();
					if (!isset($reshareTime) || $time < $reshareTime) {
						$reshare->setExpirationTime($time);
						$this->update($reshare);
					}
				}
			}
		}
	}

}