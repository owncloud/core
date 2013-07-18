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

namespace OC\Share;

use OC\Share\Share;
use OC\Share\ShareBackend;
use OC\Share\CollectionShareBackend;
use OC\Share\Exception\InvalidShareException;
use OC\Share\Exception\ShareDoesNotExistException;
use OC\Share\Exception\ShareBackendDoesNotExistException;
use OC\Share\Exception\ShareTypeDoesNotExistException;
use OC\Share\Exception\InvalidPermissionsException;
use OC\Share\Exception\InvalidExpirationTimeException;
use OC\Share\Exception\MultipleSharesReturnedException;
use OC\Hooks\ForwardingEmitter;

/**
 * This is the gateway for sharing content between users in ownCloud, aka Share API
 * Apps must create a share backend class that extends OC\Share\ShareBackend and register it here
 *
 * The ShareManager's primary purpose is to ensure consistency between shares and their reshares
 *
 *  Hooks available in scope \OC\Share:
 *  - preShare(Share $share)
 *  - postShare(Share $share)
 *  - preUnshare(Share $share)
 *  - postUnshare(Share $share)
 *  - preUpdate(Share $share)
 *  - postUpdate(Share $share)
 *
 * @version 2.0.0 BETA
 */
class ShareManager extends ForwardingEmitter {

	protected $shareBackends;

	/**
	 * Register a share backend
	 * @param ShareBackend $shareBackend
	 */
	public function registerShareBackend(ShareBackend $shareBackend) {
		$this->shareBackends[$shareBackend->getItemType()] = $shareBackend;
		$this->forward($shareBackend);
	}

	/**
	 * Get all registered share backends
	 * @return ShareBackend[]
	 */
	public function getShareBackends() {
		return $this->shareBackends;
	}

	/**
	 * Get a share backend by item type
	 * @param string $itemType
	 * @throws ShareBackendDoesNotExistException
	 * @return ShareBackend
	 */
	public function getShareBackend($itemType) {
		if (isset($this->shareBackends[$itemType])) {
			return $this->shareBackends[$itemType];
		} else {
			throw new ShareBackendDoesNotExistException(
				'A share backend does not exist for the item type'
			);
		}
	}

	/**
	 * Share a share in the share backend
	 * @param Share $share
	 * @throws InvalidItemException
  	 * @throws InvalidShareException
  	 * @throws InvalidPermissionsException
  	 * @throws InvalidExpirationTimeException
	 * @return bool
	 */
	public function share(Share $share) {
		$shareBackend = $this->getShareBackend($share->getItemType());
		$parents = $this->searchForParents($share);
		// See if the share is a reshare
		if (!empty($parents)) {
			$resharing = \OC_Appconfig::getValue('core', 'shareapi_allow_resharing', 'yes');
			if ($resharing !== 'yes') {
				throw new InvalidShareException('The admin has disabled resharing');
			}
			foreach ($parents as $parent) {
				if ($parent->getShareTypeId() === $share->getShareTypeId()) {
					if ($parent->getShareOwner() === $share->getShareWith()) {
						throw new InvalidShareException(
							'The share can\'t reshare back to the share owner'
						);
					}
					if ($parent->getShareWith() === $share->getShareWith()) {
						throw new InvalidShareException(
							'The parent share has the same share with'
						);
					}
				}
				if ($parent->isSharable()) {
					$share->addParentId($parent->getId());
				}
			}
			$parentIds = $share->getParentIds();
			if (empty($parentIds)) {
				throw new InvalidShareException(
					'The parent shares don\'t allow resharing'
				);
			}
			$share->setItemOwner(reset($parents)->getItemOwner());
			$this->areValidPermissionsForParents($share);
			$this->isValidExpirationTimeForParents($share);
		} else {
			$share->setItemOwner($share->getShareOwner());
		}
		$share = $shareBackend->share($share);
		if ($share !== false && $share->isSharable()) {
			$id = $share->getId();
			// Add this share to existing reshares' parent ids
			$reshares = $this->searchForReshares($share);
			foreach ($reshares as $reshare) {
				$reshare->addParentId($id);
				$this->update($reshare);
			}
		}
		return $share;
	}

	/**
	 * Unshare a share in the share backend
	 * @param Share $share
	 */
	public function unshare(Share $share) {
		$shareBackend = $this->getShareBackend($share->getItemType());
		if ($share->isSharable()) {
			// Fake removing all permissions so reshares will be unshared or updated correctly
			$fakeShare = clone $share;
			$fakeShare->setPermissions(0);
			$this->updateReshares($fakeShare, $share);
		}
		$shareBackend->unshare($share);
	}

	/**
	 * Update a share's properties in the share backend
	 * @param Share $share
	 * @throws ShareDoesNotExistException
	 * @throws InvalidPermissionsException
	 * @throws InvalidExpirationTimeException
	 *
	 * Updating permissions or expiration time will trigger an update of the respective property
	 * for all reshares to ensure consistency with the parent shares
	 * 
	 */
	public function update(Share $share) {
		$itemType = $share->getItemType();
		$properties = $share->getUpdatedProperties();
		if (isset($properties['permissions'])) {
			$this->areValidPermissionsForParents($share);
		}
		if (isset($properties['expirationTime'])) {
			$this->isValidExpirationTimeForParents($share);
		}
		// Find the share in the backend to compare old/new properties for reshares' updates
		$oldShare = $this->getShareById($share->getId(), $itemType, $share->getShareTypeId());
		$shareBackend = $this->getShareBackend($itemType);
		$shareBackend->update($share);
		if (isset($properties['permissions']) || isset($properties['expirationTime'])) {
			$this->updateReshares($share, $oldShare);
		}
	}

	/**
	 * Get the shares with the specified parameters in the share backend
	 * @param string $itemType
	 * @param array $filter (optional) A key => value array of share properties
	 * @param int $limit (optional)
	 * @param int $offset (optional)
	 * @return Share[]
	 */
	public function getShares($itemType, $filter = array(), $limit = null, $offset = null) {
		$shares = array();
		$shareBackend = $this->getShareBackend($itemType);
		$results = $shareBackend->getShares($filter, $limit, $offset);
		$expired = 0;
		foreach ($results as $share) {
			if ($shareBackend->isExpired($share)) {
				$this->unshare($share);
				$expired++;
			} else {
				$shares[] = $share;
			}
		}
		// If shares expired and a limit was requested, attempt to replace the shares
		// Don't try if the number of results didn't match the limit since there are no more shares
		if ($expired > 0 && isset($limit) && count($results) === $limit) {
			if (isset($offset)) {
				$offset += $limit - $expired;
			} else {
				$offset = $limit - $expired;
			}
			$expiredReplacements = $this->getShares($itemType, $filter, $expired, $offset);
			$shares = array_merge($shares, $expiredReplacements);
		}
		return $shares;
	}

	/**
	 * Get a share by id
	 * @param int $id
	 * @param string $itemType (optional)
	 * @param string $shareTypeId (optional)
	 * @throws ShareDoesNotExistException
	 * @return Share
	 */
	public function getShareById($id, $itemType = null, $shareTypeId = null) {
		$share = array();
		$filter = array('id' => $id);
		if (isset($shareTypeId)) {
			$filter['shareTypeId'] = $shareTypeId;
		}
		if (isset($itemType)) {
			$share = $this->getShares($itemType, $filter, 1);
		} else {
			foreach ($this->shareBackends as $shareBackend) {
				try {
					$share = $this->getShares($shareBackend->getItemType(), $filter, 1);
					if (!empty($share)) {
						break;
					}
				} catch (ShareTypeDoesNotExistException $exception) {
					// Do nothing
				}
			}
		}
		if (empty($share)) {
			throw new ShareDoesNotExistException('A share could not be found with that id');
		} else if (count($share) > 1) {
			throw new MultipleSharesReturnedException(
				'Multiple shares were returned with that id'
			);
		} else {
			return reset($share);
		}
	}

	/**
	 * Search for potential people to share with based on the given pattern in the share backend
	 * @param string $itemType
	 * @param string $pattern
	 * @param int $limit (optional)
	 * @param int $offset (optional)
	 * @return array
	 */
	public function searchForPotentialShareWiths($itemType, $pattern, $limit = null,
		$offset = null
	) {
		$shareBackend = $this->getShareBackend($itemType);
		return $shareBackend->searchForPotentialShareWiths($pattern, $limit, $offset);
	}

	/**
	 * Unshare all shares of an item
	 * @param string $itemType
	 * @param any $itemSource
	 * 
	 * Call this if an item is deleted by the item owner. However, this should not be called if
	 * the item owner is deleted because this is handled by the UserWatcher.
	 * 
	 */
	public function unshareItem($itemType, $itemSource) {
		$filter = array(
			'itemSource' => $itemSource,
		);
		$shares = $this->getShares($itemType, $filter);
		foreach ($shares as $share) {
			$this->unshare($share);
		}
	}

	/**
	 * Get all reshares of a share
	 * @param Share $share
	 * @return Share[]
	 *
	 * It is possible for the reshares to be of a different item type if the share's item type
	 * is a collection
	 * 
	 */
	public function getReshares(Share $share) {
		$itemType = $share->getItemType();
		$filter = array(
			'parentId' => $share->getId(),
		);
		$reshares = $this->getShares($itemType, $filter);
		$shareBackend = $this->getShareBackend($itemType);
		if ($shareBackend instanceof CollectionShareBackend) {
			// Find reshares in children item types 
			foreach ($shareBackend->getChildrenItemTypes() as $childItemType) {
				$childReshares = $this->getShares($childItemType, $filter);
				$reshares = array_merge($reshares, $childReshares);
			}
		}
		return $reshares;
	}

	/**
	 * Get all parents of a share
	 * @param Share $share
  	 * @throws ShareDoesNotExistException
	 * @return Share[]
	 *
	 * It is possible for the parents to be of a different item type if the shares's item type
	 * is a child item type in a collection
	 * 
	 */
	public function getParents(Share $share) {
		$parents = array();
		$parentIds = $share->getParentIds();
		if (!empty($parentIds)) {
			$itemType = $share->getItemType();
			$parentItemTypes = array($itemType);
			foreach ($this->shareBackends as $shareBackend) {
				if ($shareBackend instanceof CollectionShareBackend
					&& in_array($itemType, $shareBackend->getChildrenItemTypes())
					&& !in_array($shareBackend->getItemType(), $parentItemTypes)
				) {
					$parentItemTypes[] = $shareBackend->getItemType();
				}
			}
			foreach ($parentIds as $parentId) {
				foreach ($parentItemTypes as $parentItemType) {
					try {
						$parents[] = $this->getShareById($parentId, $parentItemType);
						break;
					} catch (ShareDoesNotExistException $exception) {
						if ($parentItemType === end($parentItemTypes)) {
							throw $exception;
						}
					}
				}
			}
		}
		return $parents;
	}

	/**
	 * Search for reshares of a share
	 * @param Share $share
	 * @return Share[]
	 *
	 * Call this to determine if the share has existing reshares because there is a duplicate share
	 *
	 * Use getReshares() for all other cases
	 * 
	 */
	protected function searchForReshares(Share $share) {
		$reshares = array();
		$id = $share->getId();
		$filter = array(
			'shareOwner' => $share->getShareOwner(),
			'itemSource' => $share->getItemSource(),
		);
		$potentialDuplicates = $this->getShares($share->getItemType(), $filter);
		foreach ($potentialDuplicates as $potentialDuplicate) {
			if ($potentialDuplicate->getId() !== $id) {
				$potentialReshares = $this->getReshares($potentialDuplicate);
				foreach ($potentialReshares as $potentialReshare) {
					$parents = $this->searchForParents($potentialReshare);
					foreach ($parents as $parent) {
						if ($parent->getId() === $id) {
							$reshares[] = $potentialReshare;
							break;
						}
					}
				}
			}
		}
		return $reshares;
	}

	/**
	 * Search for parent shares of a share
	 * @param Share $share
	 * @return Share[]
	 *
	 * Call this to determine if the share is a reshare and needs to set the parent ids property
	 *
	 * Use getParents() for all other cases
	 * 
	 */
	protected function searchForParents(Share $share) {
		$itemType = $share->getItemType();
		$shareOwner = $share->getShareOwner();
		$itemSource = $share->getItemSource();
		$filter = array(
			'shareWith' => $shareOwner,
			'itemSource' => $itemSource,
		);
		$parents = $this->getShares($itemType, $filter);
		// Search in collections for parents in case children were reshared
		foreach ($this->shareBackends as $shareBackend) {
			if ($shareBackend instanceof CollectionShareBackend
				&& in_array($itemType, $shareBackend->getChildrenItemTypes())
			) {
				$collectionParents = $shareBackend->searchForChildren($shareOwner, $itemSource);
				$parents = array_merge($parents, $collectionParents);
			}
		}
		return $parents;
	}

	/**
	 * Get the total permissions of an array of shares
	 * @param Share[] $shares
	 * @return int
	 */
	protected function getTotalPermissions(array $shares) {
		$totalPermissions = 0;
		foreach ($shares as $share) {
			$totalPermissions |= $share->getPermissions();
		}
		return $totalPermissions;
	}

	/**
	 * Get the latest expiration time of an array of shares
	 * @param Share[] $shares
	 * @return int|null
	 */
	protected function getLatestExpirationTime(array $shares) {
		$latestTime = null;
		foreach ($shares as $share) {
			$time = $share->getExpirationTime();
			if (!isset($time)) {
				return null;
			} else if (!isset($latestTime) || $time > $latestTime) {
				$latestTime = $time;
			}
		}
		return $latestTime;
	}

	/**
	 * Check if a share's permissions are valid with respect to the parent shares
	 * @param Share $share
	 * @throws InvalidPermissionsException
	 * @return bool
	 */
	protected function areValidPermissionsForParents(Share $share) {
		$parents = $this->getParents($share);
		if (!empty($parents)) {
			// Combine parent share's permissions to see if the share exceeds those permissions
			$permissions = $share->getPermissions();
			$parentPermissions = $this->getTotalPermissions($parents);
			if ($permissions & ~$parentPermissions) {
				throw new InvalidPermissionsException(
					'The permissions exceeds the parent shares\' permissions'.$share->getId()
				);
			}
		}
		return true;
	}

	/**
	 * Check if a share's expiration time is valid with respect to the parent shares
	 * @param Share $share
	 * @throws InvalidExpirationTimeException
	 * @return bool
	 */
	protected function isValidExpirationTimeForParents(Share $share) {
		$parents = $this->getParents($share);
		if (!empty($parents)) {
			// Check if time is later than the latest parent share expiration time
			$time = $share->getExpirationTime();
			$latestParentTime = $this->getLatestExpirationTime($parents);
			if (isset($latestParentTime) && (!isset($time) || $time > $latestParentTime)) {
				throw new InvalidExpirationTimeException(
					'The expiration time exceeds the parent shares\' expiration times'
				);
			}
		}
		return true;
	}

	/**
	 * Update the reshares of a share to ensure consistency of permissions and expiration time
	 * @param Share $share
	 * @param Share $oldShare
	 *
	 * The share has to be updated in the share backend before this is called
	 * 
	 */
	protected function updateReshares(Share $share, Share $oldShare) {
		$id = $share->getId();
		// Add this share to reshares' parent ids if share permission is added
		if ($share->isSharable() && !$oldShare->isSharable()) {
			$reshares = $this->searchForReshares($share);
			foreach ($reshares as $reshare) {
				$reshare->addParentId($id);
				$this->update($reshare);
			}
			// There is no need to continue the update process if share permission was just added,
			// because the reshares (if any) must have a different parent share that already
			// dictated the possible permissions and expiration time
		} else if ($oldShare->isSharable()) {
			$reshares = $this->getReshares($share);
			foreach ($reshares as $reshare) {
				$parentIds = $reshare->getParentIds();
				if (count($parentIds) === 1) {
					if (!$share->isSharable()) {
						// If the reshare has no other parents, it has to be unshared
						$this->unshare($reshare);
						continue;
					}
					$parents = array($share);
				} else {
					if (!$share->isSharable()) {
						$reshare->removeParentId($id);
					}
					$parents = $this->getParents($reshare);
				}
				// Adjust permissions and expiration time as necessary for them to be valid
				$parentPermissions = $this->getTotalPermissions($parents);
				$latestParentTime = $this->getLatestExpirationTime($parents);
				$resharePermissions = $reshare->getPermissions();
				if (~$parentPermissions & $resharePermissions) {
					$resharePermissions &= $parentPermissions;
					$reshare->setPermissions($resharePermissions);
				}
				$reshareTime = $reshare->getExpirationTime();
				if (isset($latestParentTime) 
					&& (!isset($reshareTime) || $latestParentTime < $reshareTime)
				) {
					$reshare->setExpirationTime($latestParentTime);
				}
				$properties = $reshare->getUpdatedProperties();
				if (!empty($properties)) {
					$this->update($reshare);
				}
			}
		}
	}

}