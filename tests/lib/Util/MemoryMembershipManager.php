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

namespace Test\Util;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use OC\Group\BackendGroup;
use OC\User\Account;
use OC\MembershipManager;

class MemoryMembershipManager extends MembershipManager {

	private static $groupUsers = [];
	private static $groupAdmins = [];

	public $testCaseName = '';

	/**
	 * @param string $userId
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 *
	 * @return BackendGroup[]
	 * @throws \Exception
	 */
	public function getMemberBackendGroups($userId, $membershipType) {
		if ($membershipType === MembershipManager::MEMBERSHIP_TYPE_GROUP_ADMIN) {
			throw new \Exception('Not implemented - MEMBERSHIP_TYPE_GROUP_ADMIN');
		}

		if ($user = \OC::$server->getUserManager()->get($userId)) {
			$internalUserId = \OC::$server->getUserManager()->getAccountObject($user)->getId();
			$backendGroups = [];
			foreach (self::$groupUsers as $key => $value) {
				if (isset(self::$groupUsers[$key][$internalUserId])) {
					$backendGroups[] = $this->getBackendGroupByInternalId($key);
				}
			}

			return $backendGroups;
		}
		return [];
	}

	/**
	 * @param int $accountId
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 *
	 * @return BackendGroup[]
	 * @throws \Exception
	 */
	public function getMemberBackendGroupsById($accountId, $membershipType) {
		if ($membershipType === MembershipManager::MEMBERSHIP_TYPE_GROUP_ADMIN) {
			throw new \Exception('Not implemented - MEMBERSHIP_TYPE_GROUP_ADMIN');
		}

		$backendGroups = [];
		foreach (self::$groupUsers as $key => $value) {
			if (isset(self::$groupUsers[$key][$accountId])) {
				$backendGroups[] = $this->getBackendGroupByInternalId($key);
			}
		}

		return $backendGroups;
	}

	/**
	 * @param string|null $gid
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 *
	 * @return Account[]
	 * @throws \Exception
	 */
	public function getGroupMemberAccounts($gid, $membershipType) {
		throw new \Exception('Not implemented - getGroupMemberAccounts');
	}

	/**
	 * @param int $backendGroupId
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 *
	 * @return Account[]
	 * @throws \Exception
	 */
	public function getGroupMemberAccountsById($backendGroupId, $membershipType) {
		if ($membershipType === MembershipManager::MEMBERSHIP_TYPE_GROUP_ADMIN) {
			throw new \Exception('Not implemented - MEMBERSHIP_TYPE_GROUP_ADMIN');
		}

		if (!isset(self::$groupUsers[$backendGroupId])) {
			return [];
		}
		$accounts = [];
		$accountIds = self::$groupUsers[$backendGroupId];
		foreach($accountIds as $accountId => $value) {
			$accounts[] = $this->getAccountByInternalId($accountId);
		}

		return $accounts;
	}

	/**
	 * @param int $backendGroupId
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 * @param int $maintenanceType - defines how membership is maintained (0 - MANUAL, 1 - SYNC)
	 *
	 * @return Account[]
	 * @throws \Exception
	 */
	public function getGroupMembershipsByType($backendGroupId, $membershipType, $maintenanceType) {
		if ($membershipType === MembershipManager::MEMBERSHIP_TYPE_GROUP_USER) {
			if (!isset(self::$groupUsers[$backendGroupId])) {
				return [];
			}

			$accounts = [];
			$accountIds = self::$groupUsers[$backendGroupId];
			foreach($accountIds as $accountId => $value) {
				if ($value === $maintenanceType) {
					$accounts[] = $this->getAccountByInternalId($accountId);
				}
			}

			return $accounts;
		} else {
			throw new \Exception('Not implemented - MEMBERSHIP_TYPE_GROUP_ADMIN');
		}
	}

	/**
	 * @param string $userId
	 * @param string|null $gid
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 *
	 * @return boolean
	 * @throws \Exception
	 */
	public function isGroupMember($userId, $gid, $membershipType) {
		throw new \Exception('Not implemented - isGroupMember');
	}

	/**
	 * @param int $accountId
	 * @param int $backendGroupId
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 *
	 * @return boolean
	 * @throws \Exception
	 */
	public function isGroupMemberById($accountId, $backendGroupId, $membershipType) {
		if ($membershipType === MembershipManager::MEMBERSHIP_TYPE_GROUP_ADMIN) {
			throw new \Exception('Not implemented - MEMBERSHIP_TYPE_GROUP_ADMIN');
		}

		foreach (self::$groupUsers as $key => $value) {
			if ($key === $backendGroupId && isset(self::$groupUsers[$key][$accountId])) {
				return true;
			}
		}
		return false;
	}

	/**
	 * @param string $gid
	 * @param string $pattern
	 * @param integer $limit
	 * @param integer $offset
	 * @return Account[]
	 */
	public function find($gid, $pattern, $limit = null, $offset = null) {
		$accounts = [];
		if ($group = \OC::$server->getGroupManager()->get($gid)) {
			$backendGroupId = \OC::$server->getGroupManager()->getBackendGroupObject($group->getGID())->getId();

			if (isset(self::$groupUsers[$backendGroupId])) {
				foreach (self::$groupUsers[$backendGroupId] as $key => $value) {
					$accounts[] = $this->getAccountByInternalId($key);
				}
			}
		}
		return $accounts;
	}

	/**
	 * @param int $backendGroupId
	 * @param string $pattern
	 * @param integer $limit
	 * @param integer $offset
	 * @return Account[]
	 * @throws \Exception
	 */
	public function findById($backendGroupId, $pattern, $limit = null, $offset = null) {
		throw new \Exception('Not implemented - findById');
	}

	/**
	 * @param string $gid
	 * @param string $pattern
	 *
	 * @return int
	 * @throws \Exception
	 */
	public function count($gid, $pattern) {
		throw new \Exception('Not implemented - count');
	}

	/**
	 * @param int $accountId - internal id of an account
	 * @param int $backendGroupId - internal id of backend group
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 * @param int $maintenanceType - defines how membership is maintained (0 - MANUAL, 1 - SYNC)
	 *
	 * @return bool
	 * @throws UniqueConstraintViolationException
	 */
	public function addMembership($accountId, $backendGroupId, $membershipType, $maintenanceType) {
		if ($membershipType === MembershipManager::MEMBERSHIP_TYPE_GROUP_USER) {
			if (!isset(self::$groupUsers[$backendGroupId])) {
				self::$groupUsers[$backendGroupId] = [];
			}

			if (isset(self::$groupUsers[$backendGroupId]) && isset(self::$groupUsers[$backendGroupId][$accountId])) {
				throw new \Exception('UniqueConstraintViolationException');
			}

			self::$groupUsers[$backendGroupId][$accountId] = $maintenanceType;

			return true;
		} else {
			if (!isset(self::$groupAdmins[$backendGroupId])) {
				self::$groupAdmins[$backendGroupId] = [];
			}

			if (isset(self::$groupAdmins[$backendGroupId]) && isset(self::$groupAdmins[$backendGroupId][$accountId])) {
				throw new \Exception('UniqueConstraintViolationException');
			}

			self::$groupAdmins[$backendGroupId][$accountId] = $maintenanceType;

			return true;
		}
	}

	/**
	 * @param int $accountId - internal id of an account
	 * @param int $backendGroupId - internal id of backend group
	 * @param int $membershipType - type of membership in the group (0 - MEMBERSHIP_TYPE_GROUP_USER, 1 - MEMBERSHIP_TYPE_GROUP_ADMIN)
	 * @return bool
	 */
	public function removeMembership($accountId, $backendGroupId, $membershipType) {
		if ($membershipType === MembershipManager::MEMBERSHIP_TYPE_GROUP_USER) {
			unset(self::$groupUsers[$backendGroupId][$accountId]);
			return true;
		} else {
			unset(self::$groupAdmins[$backendGroupId][$accountId]);
			return true;
		}
	}

	/**
	 * @param int $accountId - internal id of an account
	 * @return bool
	 */
	public function removeMemberships($accountId) {
		foreach (self::$groupAdmins as $key => $value) {
			unset(self::$groupAdmins[$key][$accountId]);
		}
		foreach (self::$groupUsers as $key => $value) {
			unset(self::$groupUsers[$key][$accountId]);
		}
		return true;
	}

	/**
	 * @param int $backendGroupId - internal id of backend group
	 * @return bool
	 */
	public function removeGroupMembers($backendGroupId) {
		unset(self::$groupAdmins[$backendGroupId]);
		unset(self::$groupUsers[$backendGroupId]);
		return true;
	}

	private function getBackendGroupByInternalId($id) {
		$allGroups = \OC::$server->getGroupManager()->search('');

		foreach ($allGroups as $group) {
			$backendGroupId = \OC::$server->getGroupManager()->getBackendGroupObject($group->getGID())->getId();

			if ($backendGroupId === $id) {
				$backendGroup = new BackendGroup();
				$backendGroup->setId($backendGroupId);
				$backendGroup->setGroupId($group->getGID());
				$backendGroup->setDisplayName($group->getDisplayName());
				$backendGroup->setBackend(get_class($group->getBackend()));
				return $backendGroup;
			}
		}

		return null;
	}

	private function getAccountByInternalId($id) {
		$allUsers = \OC::$server->getUserManager()->search('');

		foreach ($allUsers as $user) {
			$internalUserId = \OC::$server->getUserManager()->getAccountObject($user)->getId();

			if ($internalUserId === $id) {
				$account = new Account();
				$account->setId($internalUserId);
				$account->setUserId($user->getUID());
				$account->setBackend($user->getBackendClassName());
				if ($user->isEnabled()){
					$account->setState($account::STATE_ENABLED);
				} else {
					$account->setState($account::STATE_DISABLED);
				}
				$account->setLastLogin($user->getLastLogin());
				$account->setDisplayName($user->getDisplayName());
				$account->setEmail($user->getEMailAddress());
				$account->setQuota($user->getQuota());
				$account->setSearchTerms($user->getSearchTerms());
				$account->setHome($user->getHome());
				return $account;
			}
		}

		return null;
	}

	public function clear() {
		self::$groupAdmins = [];
		self::$groupUsers = [];
	}
}