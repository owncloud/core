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

use OC\Share\ShareManager;
use OC\Share\Exception\InvalidShareException;
use OC\Share\Exception\ShareTypeDoesNotExistException;
use OC\Group\Manager;

/**
 * Listen to group events that require updating shares
 */
class GroupWatcher {

	private $shareManager;

	public function __construct(ShareManager $shareManager, Manager $groupManager) {
		$this->shareManager = $shareManager;
		$groupManager->listen('\OC\Group', 'postDelete', array($this, 'onGroupDeleted'));
		$groupManager->listen('\OC\Group', 'postAddUser', array($this, 'onUserAddedToGroup'));
		$groupManager->listen('\OC\Group', 'postRemoveUser',
			array($this, 'onUserRemovedFromGroup')
		);
	}

	/**
	 * Unshare all shares to the deleted group
	 * @param \OC\Group\Group $group
	 */
	public function onGroupDeleted(\OC\Group\Group $group) {
		$shares = $this->getGroupShares($group);
		foreach ($shares as $share) {
			$this->shareManager->unshare($share);
		}
		foreach ($group->getUsers() as $user) {
			$this->revalidateShares($user);
		}
	}

	/**
	 * Check if the added user requires unique item targets for the group shares
	 * @param \OC\Group\Group $group
	 * @param \OC\User\User $user
	 */
	public function onUserAddedToGroup(\OC\Group\Group $group, \OC\User\User $user) {
		$shares = $this->getGroupShares($group);
		foreach ($shares as $share) {
			$shareBackend = $this->shareManager->getShareBackend($share->getItemType());
			$shareType = $shareBackend->getShareType($share->getShareTypeId());
			$itemTargetMachine = $shareType->getItemTargetMachine();
			$itemTargets = $share->getItemTarget();
			$groupItemTarget = reset($itemTargets);
			$userItemTarget = $itemTargetMachine->getItemTarget($share, $user);
			if ($userItemTarget !== $groupItemTarget) {
				$itemTargets['users'][$user->getUID()] = $userItemTarget;
				$share->setItemTarget($itemTargets);
				$this->shareManager->update($share);
			}
		}
	}

	/**
	 * Unshare all reshares of the group share that were reshared by the removed user
	 * @param \OC\Group\Group $group
	 * @param \OC\User\User $user
	 */
	public function onUserRemovedFromGroup(\OC\Group\Group $group, \OC\User\User $user) {
		$uid = $user->getUID();
		$shares = $this->getGroupShares($group);
		foreach ($shares as $share) {
			$reshares = $this->shareManager->getReshares($share);
			foreach ($reshares as $reshare) {
				if ($reshare->getShareOwner() === $uid) {
					$this->shareManager->unshare($reshare);
				}
			}
			$itemTargets = $share->getItemTarget();
			// Remove unique item target if set for removed user
			if (isset($itemTargets['user'][$uid])) {
				unset($itemTargets['user'][$uid]);
				$share->setItemTarget($itemTargets);
				$this->shareManager->update($share);
			}
		}
		$this->revalidateShares($user);
	}

	/**
	 * Get all group shares
	 * @param \OC\Group\Group $group
	 * @return \OC\Share\Share[]
	 */
	protected function getGroupShares(\OC\Group\Group $group) {
		$gid = $group->getGID();
		$shares = array();
		$filter = array(
			'shareTypeId' => 'group',
			'shareWith' => $gid,
		);
		$shareBackends = $this->shareManager->getShareBackends();
		foreach ($shareBackends as $shareBackend) {
			try {
				$itemType = $shareBackend->getItemType();
				$shares = array_merge($shares, $this->shareManager->getShares($itemType, $filter));
			} catch (ShareTypeDoesNotExistException $exception) {
				// Do nothing
			}
		}
		return $shares;
	}

	/**
	 * Revalidate the sharing conditions for a user's shares if the groups only policy is set
	 * @param \OC\User\User $user
	 */
	protected function revalidateShares(\OC\User\User $user) {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		if ($sharingPolicy === 'groups_only') {
			$uid = $user->getUID();
			$filter = array(
				'shareTypeId' => 'user',
				'shareOwner' => $uid,
			);
			$shareBackends = $this->shareManager->getShareBackends();
			foreach ($shareBackends as $shareBackend) {
				try {
					$shareType = $shareBackend->getShareType('user');
					$itemType = $shareBackend->getItemType();
					$shares = $this->shareManager->getShares($itemType, $filter);
					foreach ($shares as $share) {
						try {
							$shareType->isValidShare($share);
						} catch (InvalidShareException $exception) {
							$this->shareManager->unshare($share);
						}
					}
				} catch (ShareTypeDoesNotExistException $exception) {
					// Do nothing
				}
			}
		}
	}

}