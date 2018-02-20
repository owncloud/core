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
	/** @var string[] backendclass -> gid array map */
	private $prefetchedGroupIds;

	/**
	 * SyncService constructor.
	 *
	 * @param GroupMapper $groupMapper
	 * @param AccountMapper $accountMapper
	 * @param MembershipManager $membershipManager
	 * @param ILogger $logger
	 */
	public function __construct(GroupMapper $groupMapper,
								AccountMapper $accountMapper,
								MembershipManager $membershipManager,
								ILogger $logger) {
		$this->groupMapper = $groupMapper;
		$this->accountMapper = $accountMapper;
		$this->membershipManager = $membershipManager;
		$this->logger = $logger;
		$this->prefetchedGroupIds = [];
	}

	/**
	 * Run group sync service.
	 *
	 * This function will prefetch groups in case groups were not prefetched before-hands,
	 * however callback for prefetch call will not be displayed
	 *
	 * @param GroupInterface $backend
	 * @param \Closure $callback is called for every user to progress display
	 * @throws UniqueConstraintViolationException
	 * @throws MultipleObjectsReturnedException
	 */
	public function run(GroupInterface $backend, \Closure $callback) {
		$this->fetch($backend);

		// update existing and insert new users
		$backendClass = get_class($backend);
		foreach ($this->prefetchedGroupIds[$backendClass] as $gid) {
			if ($backendGroup = $this->createOrSyncGroup($gid, $backend)) {
				// Fetch remote group users, which have existing accounts in the system
				$remoteAccounts = $this->getRemoteGroupUsers($backend, $backendGroup->getGroupId());

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
	 * @param GroupInterface $backend
	 * @param \Closure $callback is called for every group to allow progress display
	 * @return array
	 */
	public function getNoLongerExistingGroup(GroupInterface $backend, \Closure $callback) {
		$this->fetch($backend);

		// detect no longer existing group
		$toBeDeleted = [];
		$backendClass = get_class($backend);
		$this->groupMapper->callForAllGroups(function (BackendGroup $b) use (&$toBeDeleted, $callback, $backendClass) {
			if ($b->getBackend() == $backendClass) {
				$gid = $b->getGroupId();
				if (!in_array($gid, $this->prefetchedGroupIds[$backendClass])) {
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
	 * @param GroupInterface $backend
	 * @param \Closure $callback is called for every group to allow progress display
	 * @return array
	 */
	public function count(GroupInterface $backend, \Closure $callback) {
		$this->fetch($backend, $callback);

		$backendClass = get_class($backend);
		return count($this->prefetchedGroupIds[$backendClass]);
	}

	/**
	 * Creates/Sync group from/with group backend. If already existing in the backend,
	 * returns null
	 *
	 * @param string $gid
	 * @param GroupInterface $backend
	 * @return BackendGroup | null
	 * @throws UniqueConstraintViolationException
	 */
	public function createOrSyncGroup($gid, GroupInterface $backend) {
		$backendClass = get_class($backend);

		try {
			$b = $this->groupMapper->getGroup($gid);
			if ($b->getBackend() !== $backendClass) {
				$this->logger->warning(
					"Group <$gid> already provided by another backend({$b->getBackend()} != {$backendClass}), skipping.",
					['app' => self::class]
				);
				return null;
			}
			$b = $this->syncBackendGroup($b, $backend);
			return $this->groupMapper->update($b);
		} catch(DoesNotExistException $ex) {
			$b = $this->createNewBackendGroup($backend, $gid);
			$b = $this->syncBackendGroup($b, $backend);
			return $this->groupMapper->insert($b);
		}
	}

	/**.
	 * Returns remote users for updated backend group, which have already synced
	 * accounts in the system
	 *
	 * @param GroupInterface $backend
	 * @param string $gid
	 * @return Account[] - account id -> account map
	 * @throws MultipleObjectsReturnedException
	 */
	private function getRemoteGroupUsers(GroupInterface $backend, $gid) {
		$limit = 500;
		$offset = 0;
		$uids = [];
		do {
			$users = $backend->usersInGroup($gid,'', $limit, $offset);
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

	/**
	 * Fetch backend service groups and
	 * use callback function for each of the groups, if callback has been specified.
	 *
	 * @param GroupInterface $backend
	 * @param \Closure $callback is called for every group to allow progress display
	 */
	private function fetch(GroupInterface $backend, \Closure $callback = null) {
		$backendClass = get_class($backend);
		if (isset($this->prefetchedGroupIds[$backendClass])) {
			$this->callbackForEachGroup($this->prefetchedGroupIds[$backendClass], $callback);
		} else {
			$limit = 500;
			$offset = 0;
			$this->prefetchedGroupIds[$backendClass] = [];
			do {
				$groups = $backend->getGroups('', $limit, $offset);
				$this->prefetchedGroupIds[$backendClass] = array_merge($this->prefetchedGroupIds[$backendClass], $groups);
				$offset += $limit;

				$this->callbackForEachGroup($groups, $callback);
			} while(count($groups) >= $limit);
		}
	}

	/**
	 * Use callback function for each of the groups (group ids), if callback has been specified.
	 *
	 * @param string[] $gids
	 * @param \Closure $callback is called for every group to allow progress display
	 */
	private function callbackForEachGroup($gids, \Closure $callback = null) {
		if ($callback !== null) {
			foreach ($gids as $gid) {
				$callback($gid);
			}
		}
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
	 * @param GroupInterface $backend
	 * @param string $gid
	 * @return BackendGroup
	 */
	private function createNewBackendGroup(GroupInterface $backend, $gid) {
		$b = new BackendGroup();
		$b->setGroupId($gid);
		$b->setBackend(get_class($backend));
		return $b;
	}

	/**
	 * @param BackendGroup $b
	 * @param GroupInterface $backend
	 * @return BackendGroup
	 */
	private function syncBackendGroup(BackendGroup $b, GroupInterface $backend) {
		$this->syncDisplayName($b, $backend);
		return $b;
	}


	/**
	 * @param BackendGroup $b
	 * @param GroupInterface $backend
	 * @return BackendGroup
	 */
	private function syncDisplayName(BackendGroup $b, GroupInterface $backend) {
		$gid = $b->getGroupId();

		$displayName = $gid;
		if ($backend->implementsActions(Backend::GROUP_DETAILS)) {
			$groupData = $backend->getGroupDetails($gid);
			if (is_array($groupData) && isset($groupData['displayName'])) {
				// take the display name from the backend
				$displayName = $groupData['displayName'];
			}
		}
		$b->setDisplayName($displayName);
		return $b;
	}

}
