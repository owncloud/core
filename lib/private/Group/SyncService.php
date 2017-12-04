<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
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

namespace OC\Group;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use OC\MembershipManager;
use OC\User\Account;
use OC\User\AccountMapper;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\Entity;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;
use OCP\GroupInterface;
use OCP\IConfig;
use OCP\ILogger;


/**
 * Class SyncService
 *
 * All groups in a group backend and their group members are synced into the backend group table
 * and membership table.
 *
 * @package OC\Group
 */
class SyncService {

	/** @var GroupInterface */
	private $backend;
	/** @var GroupMapper */
	private $groupMapper;
	/** @var AccountMapper */
	private $accountMapper;
	/** @var MembershipManager */
	private $membershipManager;
	/** @var IConfig */
	private $config;
	/** @var ILogger */
	private $logger;
	/** @var string */
	private $backendClass;
	/** @var boolean */
	private $prefetched;
	/** @var string[] */
	private $prefetchedGroupIds;

	/**
	 * SyncService constructor.
	 *
	 * @param GroupMapper $groupMapper
	 * @param AccountMapper $accountMapper
	 * @param MembershipManager $membershipManager
	 * @param GroupInterface $backend
	 * @param IConfig $config
	 * @param ILogger $logger
	 */
	public function __construct(GroupMapper $groupMapper,
								AccountMapper $accountMapper,
								MembershipManager $membershipManager,
								GroupInterface $backend,
								IConfig $config,
								ILogger $logger) {
		$this->groupMapper = $groupMapper;
		$this->accountMapper = $accountMapper;
		$this->membershipManager = $membershipManager;
		$this->backend = $backend;
		$this->backendClass = get_class($backend);
		$this->config = $config;
		$this->logger = $logger;
		$this->prefetched = false;
		$this->prefetchedGroupIds = [];
	}

	/**
	 * Run group sync service.
	 *
	 * This function will prefetch groups in case groups were not prefetched before-hands,
	 * however callback for prefetch call will not be displayed
	 *
	 * @param \Closure $callback is called for every user to progress display
	 * @throws UniqueConstraintViolationException
	 * @throws MultipleObjectsReturnedException
	 */
	public function run(\Closure $callback) {
		$this->fetch();

		// update existing and insert new users
		foreach ($this->prefetchedGroupIds as $gid) {
			if ($backendGroup = $this->groupUpdate($gid)) {
				// Fetch remote group users, which have existing accounts in the system
				$remoteAccounts = $this->getRemoteGroupUsers($backendGroup->getGroupId());

				// Fetch local group users, which were synced to the group using SYNC mechanism
				$localSyncAccounts = $this->getSyncLocalGroupUsers($backendGroup->getId());

				// Fetch local group users, which were added to the group MANUALY, thus should not be affected by sync
				$localManualAccounts = $this->getManualLocalGroupUsers($backendGroup->getId());

				// Check which memberships need to removed and added for this backend class
				$membershipsToRemove = array_diff(array_keys($localSyncAccounts), array_keys($remoteAccounts));
				$membershipsToAdd = array_diff(array_keys($remoteAccounts), array_keys($localSyncAccounts));

				foreach ($membershipsToRemove as $accountId) {
					// Do not affect local group users added manually
					if (!isset($localManualAccounts[$accountId])) {
						// Remove membership of maintenance type MAINTENANCE_TYPE_SYNC (diff was with localSyncAccounts)
						$this->membershipManager->removeMembership($accountId, $backendGroup->getId(),
							MembershipManager::MEMBERSHIP_TYPE_GROUP_USER);
					}
				}

				foreach ($membershipsToAdd as $accountId) {
					// Do not affect local group users added manually
					if (!isset($localManualAccounts[$accountId])) {
						// Add membership of maintenance type MAINTENANCE_TYPE_SYNC
						$this->membershipManager->addMembership($accountId, $backendGroup->getId(),
							MembershipManager::MEMBERSHIP_TYPE_GROUP_USER,
							MembershipManager::MAINTENANCE_TYPE_SYNC);
					}
				}

				// call the callback
				$callback($gid);
			}
		}
	}

	/**.
	 * Call callback function for each no longer existing group.
	 *
	 * This function will prefetch groups in case groups were not prefetched before-hands,
	 * however callback for prefetch call will not be displayed
	 *
	 * @param \Closure $callback is called for every group to allow progress display
	 * @return array
	 */
	public function getNoLongerExistingGroup(\Closure $callback) {
		$this->fetch();

		// detect no longer existing group
		$toBeDeleted = [];
		$this->groupMapper->callForAllGroups(function (BackendGroup $b) use (&$toBeDeleted, $callback) {
			if ($b->getBackend() == $this->backendClass) {
				$gid = $b->getGroupId();
				if (!in_array($gid, $this->prefetchedGroupIds)) {
					$toBeDeleted[] = $b->getGroupId();
				}
			}
			$callback($b);
		}, '');

		return $toBeDeleted;
	}

	/**.
	 * Count groups in external backend
	 *
	 * This function will prefetch groups in case groups were not prefetched before-hands,
	 * however callback for prefetch call will not be displayed
	 *
	 * @param \Closure $callback is called for every group to allow progress display
	 * @return array
	 */
	public function count(\Closure $callback) {
		$this->fetch($callback);

		return count($this->prefetchedGroupIds);
	}

	/**.
	 * Returns remote users for updated backend group, which have already synced
	 * accounts in the system
	 *
	 * @param string $gid
	 * @return Account[] - account id -> account map
	 * @throws MultipleObjectsReturnedException
	 */
	private function getRemoteGroupUsers($gid) {
		$limit = 500;
		$offset = 0;
		$uids = [];
		do {
			$users = $this->backend->usersInGroup($gid,'', $limit, $offset);
			$uids = array_merge($uids, $users);
			$offset += $limit;
		} while(count($users) >= $limit);

		// Validate if user exists in the account table
		$accounts = [];
		foreach($uids as $uid) {
			try {
				// TODO: Discuss if this should only pass for enabled users
				$account = $this->accountMapper->getByUid($uid);
				$accounts[$account->getId()] = $account;
			} catch(DoesNotExistException $ex) {
				// This user does not exist in the system
				continue;
			}
		}

		return $accounts;
	}

	/**.
	 * Fetch group members which are group users and their memberships were
	 * added using sync command (memberships were added using group backend)
	 *
	 * @param int $backendGroupId
	 * @return Account[] - account id -> account map
	 */
	private function getSyncLocalGroupUsers($backendGroupId) {
		// Fetch only group members which are group users and their memberships were
		// added using sync command (memberships were added using group backend)
		$syncMembers = $this->membershipManager->getGroupMembershipsByType($backendGroupId,
			MembershipManager::MEMBERSHIP_TYPE_GROUP_USER,
			MembershipManager::MAINTENANCE_TYPE_SYNC);

		// TODO: Discuss if users should be enabled or not
		$accounts = [];
		foreach($syncMembers as $memberAccount) {
			$accounts[$memberAccount->getId()] = $memberAccount;
		}

		return $accounts;
	}

	/**.
	 * Fetch group members which are group users and their memberships were
	 * added manualy (e.g. by admin using user interface)
	 *
	 * @param int $backendGroupId
	 * @return Account[] - account id -> account map
	 */
	private function getManualLocalGroupUsers($backendGroupId) {
		// Fetch only group members which are group users and their memberships were
		// added using sync command (memberships were added using group backend)
		$manualMembers = $this->membershipManager->getGroupMembershipsByType($backendGroupId,
			MembershipManager::MEMBERSHIP_TYPE_GROUP_USER,
			MembershipManager::MAINTENANCE_TYPE_MANUAL);

		// TODO: Discuss if users should be enabled or not
		$accounts = [];
		foreach($manualMembers as $memberAccount) {
			$accounts[$memberAccount->getId()] = $memberAccount;
		}

		return $accounts;
	}

	/**
	 * @param string $gid
	 * @return BackendGroup | null
	 * @throws UniqueConstraintViolationException
	 */
	private function groupUpdate($gid) {
		try {
			$group = $this->groupMapper->getGroup($gid);
			if ($group->getBackend() !== $this->backendClass) {
				$this->logger->warning(
					"Group <$gid> already provided by another backend({$group->getBackend()} != {$this->backendClass}), skipping.",
					['app' => self::class]
				);
				return null;
			}
			$b = $this->setupBackendGroup($group, $gid);
			return $this->groupMapper->update($b);
		} catch(DoesNotExistException $ex) {
			$b = $this->createNewBackendGroup($gid);
			$this->setupBackendGroup($b, $gid);
			return $this->groupMapper->insert($b);
		}
	}

	/**
	 * Use callback function for each of the groups (group ids), if callback has been specified.
	 *
	 * @param string[] $gids
	 * @param \Closure $callback is called for every group to allow progress display
	 */
	private function callbackForEachGroup($gids, \Closure $callback = null) {
		if (!is_null($callback)) {
			foreach ($gids as $gid) {
				$callback($gid);
			}
		}
	}

	/**
	 * Fetch backend service groups and
	 * use callback function for each of the groups, if callback has been specified.
	 *
	 * @param \Closure $callback is called for every group to allow progress display
	 */
	private function fetch(\Closure $callback = null) {
		if ($this->prefetched) {
			$this->callbackForEachGroup($this->prefetchedGroupIds, $callback);
		} else {
			$limit = 500;
			$offset = 0;
			$this->prefetchedGroupIds = [];
			do {
				$groups = $this->backend->getGroups('', $limit, $offset);
				$this->prefetchedGroupIds = array_merge($this->prefetchedGroupIds, $groups);
				$offset += $limit;

				$this->callbackForEachGroup($groups, $callback);
			} while(count($groups) >= $limit);

			$this->prefetched = true;
		}
	}

	/**
	 * @param BackendGroup $b
	 * @param string $gid
	 * @return BackendGroup
	 */
	private function setupBackendGroup(BackendGroup $b, $gid) {
		$displayName = $gid;

		if ($this->backend->implementsActions(\OC\Group\Backend::GROUP_DETAILS)) {
			$groupData = $this->backend->getGroupDetails($gid);
			if (is_array($groupData) && isset($groupData['displayName'])) {
				// take the display name from the backend
				$displayName = $groupData['displayName'];
			}
		}
		$b->setDisplayName($displayName);
		return $b;
	}

	private function createNewBackendGroup($gid) {
		$b = new BackendGroup();
		$b->setGroupId($gid);
		$b->setBackend(get_class($this->backend));
		return $b;
	}

}
