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
use OC\Share\TimeMachine;
use OC\Hooks\BasicEmitter;
use OC\Share\Exception\InvalidShareException;
use OC\Share\Exception\ShareTypeDoesNotExistException;
use OC\Share\Exception\InvalidPermissionsException;
use OC\Share\Exception\InvalidExpirationTimeException;

/**
 * Backend class that apps extend and register with the ShareManager to share content
 *
 * Hooks available in scope \OC\Share:
 *  - preShare(\OC\Share\Share $share)
 *  - postShare(\OC\Share\Share $share)
 *  - preUnshare(\OC\Share\Share $share)
 *  - postUnshare(\OC\Share\Share $share)
 *  - preUpdate(\OC\Share\Share $share)
 *  - postUpdate(\OC\Share\Share $share)
 *
 * @version 2.0.0 BETA
 */
abstract class ShareBackend extends BasicEmitter {

	protected $timeMachine;
	protected $shareTypes;

	/**
	 * The constructor
	 * @param \OC\Share\TimeMachine $timeMachine The time() mock
	 * @param \OC\Share\ShareType\IShareType[] $shareTypes An array of share type objects that
	 * items can be shared through e.g. User, Group, Link
	 */
	public function __construct(TimeMachine $timeMachine, array $shareTypes) {
		$this->timeMachine = $timeMachine;
		foreach ($shareTypes as $shareType) {
			$this->shareTypes[$shareType->getId()] = $shareType;
		}
	}

	/**
	 * Get the identifier for the item type this backend handles
	 * @return string
	 */
	abstract public function getItemType();

	/**
	 * Check if an item is valid for the share owner
	 * @param \OC\Share\Share $share
	 * @throws \OC\Share\Exception\InvalidItemException If the item does not exist or the share
	 * owner does not have access to the item
	 * @return bool
	 */
	abstract protected function isValidItem(Share $share);

	/**
	 * Get all share types
	 * @return \OC\Share\ShareType\IShareType[]
	 */
	public function getShareTypes() {
		return $this->shareTypes;
	}

	/**
	 * Get share type by id
	 * @param string $shareTypeId
	 * @throws \OC\Share\Exception\ShareTypeDoesNotExistException
	 * @return \OC\Share\IShareType
	 */
	public function getShareType($shareTypeId) {
		if (isset($this->shareTypes[$shareTypeId])) {
			return $this->shareTypes[$shareTypeId];
		} else {
			throw new ShareTypeDoesNotExistException($shareTypeId);
		}
	}

	/**
	 * Share a share
	 * @param \OC\Share\Share $share
	 * @throws \OC\Share\Exception\InvalidItemException
	 * @throws \OC\Share\Exception\InvalidShareException
	 * @throws \OC\Share\Exception\InvalidPermissionsException
	 * @throws \OC\Share\Exception\InvalidExpirationTimeException
	 * @return \OC\Share\Share | bool
	 */
	public function share(Share $share) {
		if ($this->isValidItem($share)) {
			// Don't share the same share again
			$filter = array(
				'shareTypeId' => $share->getShareTypeId(),
				'shareOwner' => $share->getShareOwner(),
				'shareWith' => $share->getShareWith(),
				'itemSource' => $share->getItemSource(),
			);
			$exists = $this->getShares($filter, 1);
			if (!empty($exists)) {
				throw new InvalidShareException('The share already exists');
			}
			$shareType = $this->getShareType($share->getShareTypeId());
			if ($shareType->isValidShare($share) && $this->areValidPermissions($share)
				&& $this->isValidExpirationTime($share)
			) {
				$this->emit('\OC\Share', 'preShare', array($share));
				$share->setShareTime($this->timeMachine->getTime());
				$share = $shareType->share($share);
				$this->emit('\OC\Share', 'postShare', array($share));
				return $share;
			}
		}
		return false;
	}

	/**
	 * Unshare a share
	 * @param \OC\Share\Share $share
	 */
	public function unshare(Share $share) {
		$shareType = $this->getShareType($share->getShareTypeId());
		$this->emit('\OC\Share', 'preUnshare', array($share));
		$shareType->unshare($share);
		$this->emit('\OC\Share', 'postUnshare', array($share));
	}

	/**
	 * Update a share's properties in the database
	 * @param \OC\Share\Share $share
	 */
	public function update(Share $share) {
		$properties = $share->getUpdatedProperties();
		if (!empty($properties)) {
			if (isset($properties['permissions'])) {
				$this->areValidPermissions($share);
			}
			if (isset($properties['expirationTime'])) {
				$this->isValidExpirationTime($share);
			}
			$shareType = $this->getShareType($share->getShareTypeId());
			$this->emit('\OC\Share', 'preUpdate', array($share));
			foreach ($properties as $property => $updated) {
				$setter = 'set'.ucfirst($property);
				if (method_exists($shareType, $setter)) {
					$shareType->$setter($share);
					unset($properties[$property]);
				}
			}
			if (!empty($properties)) {
				$shareType->update($share);
			}
			$this->emit('\OC\Share', 'postUpdate', array($share));
		}
	}

	/**
	 * Get the shares with the specified parameters
	 * @param array $filter (optional) A key => value array of share properties
	 * @param int $limit (optional)
	 * @param int $offset (optional)
	 * @return \OC\Share\Share[]
	 */
	public function getShares($filter = array(), $limit = null, $offset = null) {
		if (isset($filter['shareTypeId'])) {
			$shareTypes = array($this->getShareType($filter['shareTypeId']));
			unset($filter['shareTypeId']);
		} else {
			$shareTypes = $this->shareTypes;
		}
		$shares = array();
		foreach ($shareTypes as $shareType) {
			$result = $shareType->getShares($filter, $limit, $offset);
			foreach ($result as $share) {
				$shares[] = $share;
				if (isset($limit)) {
					$limit--;
					if ($limit === 0) {
						return $shares;
					}
				}
				if (isset($offset) && $offset > 0) {
					$offset--;
				}
			}
		}
		return $shares;
	}

	/**
	 * Check if a share is expired
	 * @param \OC\Share\Share $share
	 * @return bool
	 */
	public function isExpired(Share $share) {
		$time = $share->getExpirationTime();
		$now = $this->timeMachine->getTime();
		if (isset($time)) {
			if ($time - $now < 0) {
				return true;
			} else {
				return false;
			}
		} else {
			// Check if the admin has set a default expiration time
			$defaultTime = \OC_Appconfig::getValue('core', 'shareapi_expiration_time', 0);
			if ($defaultTime > 0 && $defaultTime + $share->getShareTime() - $now < 0) {
				return true;
			} else {
				return false;
			}
		}
	}

	/**
	 * Check if a share's permissions are valid
	 * @param \OC\Share\Share $share
	 * @throws \OC\Share\Exception\InvalidPermissionsException If the permissions are not an
	 * integer or are not in the range of 1 to 31
	 * @return bool
	 *
	 * Permissions are defined by the CRUDS system, see lib/public/constants.php
	 * General information: wikipedia.org/wiki/Create,_read,_update_and_delete
	 *
	 * In ownCloud 'S' is defined as share permission
	 *
	 * You can use PHP's bitwise operators to manipulate the permissions
	 * 
	 */
	protected function areValidPermissions($share) {
		$permissions = $share->getPermissions();
		if (!is_int($permissions)) {
			throw new InvalidPermissionsException('The permissions are not an integer');
		}
		if ($permissions < 1 || $permissions > \OCP\PERMISSION_ALL) {
			throw new InvalidPermissionsException(
				'The permissions are not in the range of 1 to '.\OCP\PERMISSION_ALL
			);
		}
		return true;
	}

	/**
	 * Check if a share's expiration time is valid
	 * @param \OC\Share\Share $share
	 * @throws \OC\Share\Exception\InvalidExpirationTimeException If the expiration time is set and is
	 * not an integer or is not at least 1 hour in the future
	 * @return bool
	 *
	 * Expiration time is defined by a unix timestamp
	 * An expiration time of null implies the share will not expire
	 * 
	 */
	protected function isValidExpirationTime(Share $share) {
		$time = $share->getExpirationTime();
		if (isset($time) && !is_int($time)) {
			throw new InvalidExpirationTimeException('The expiration time is not an integer');
		}
		if (isset($time) && $time < $this->timeMachine->getTime() + 3600) {
			throw new InvalidExpirationTimeException(
				'The expiration time is not at least 1 hour in the future'
			);
		}
		return true;
	}

}