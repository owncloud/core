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

use OC\Group\BackendGroup;
use OC\User\Account;
use OC\MembershipManager;

class MemoryMembershipManager extends MembershipManager {

	private static $groupUsers = [];
	private static $groupAdmins = [];

	public $testCaseName = '';

	/**
	 * @param string|null $userId
	 *
	 * @return BackendGroup[]
	 */
	public function getUserBackendGroups($userId) {
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
	 *
	 * @return BackendGroup[]
	 */
	public function getUserBackendGroupsById($accountId) {
		$backendGroups = [];
		foreach (self::$groupUsers as $key => $value) {
			if (isset(self::$groupUsers[$key][$accountId])) {
				$backendGroups[] = $this->getBackendGroupByInternalId($key);
			}
		}

		return $backendGroups;
	}

	/**
	 * @param string $userId
	 *
	 * @return BackendGroup[]
	 * @throws \Exception
	 */
	public function getAdminBackendGroups($userId) {
		throw new \Exception('Not implemented - getAdminBackendGroups');
	}

	/**
	 * @param string|null $gid
	 *
	 * @return Account[]
	 * @throws \Exception
	 */
	public function getGroupUserAccounts($gid = null) {
		throw new \Exception('Not implemented - getGroupUserAccounts');
	}

	/**
	 * @param int $backendGroupId
	 *
	 * @return Account[]
	 */
	public function getGroupUserAccountsById($backendGroupId) {
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
	 * Return admin account entities for given group (identified with gid). If group predicate not specified,
	 * it will return all users which are group admins
	 *
	 * @param string|null $gid
	 *
	 * @return Account[]
	 * @throws \Exception
	 */
	public function getGroupAdminAccounts($gid = null) {
		throw new \Exception('Not implemented - getGroupAdminAccounts');

	}

	/**
	 * @param string $userId
	 * @param string $gid
	 *
	 * @return boolean
	 * @throws \Exception
	 */
	public function isGroupUser($userId, $gid = null) {
		throw new \Exception('Not implemented - isGroupUser');
	}

	/**
	 * @param int $accountId
	 * @param int $backendGroupId
	 *
	 * @return boolean
	 */
	public function isGroupUserById($accountId, $backendGroupId) {
		foreach (self::$groupUsers as $key => $value) {
			if ($key === $backendGroupId && isset(self::$groupUsers[$key][$accountId])) {
				return true;
			}
		}
		return false;
	}

	/**
	 * @param string $userId
	 * @param string $gid
	 *
	 * @return boolean
	 * @throws \Exception
	 */
	public function isGroupAdmin($userId, $gid = null) {
		throw new \Exception('Not implemented - isGroupAdmin');
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
	 *
	 * @return bool
	 */
	public function addGroupUser($accountId, $backendGroupId) {
		if (!isset(self::$groupUsers[$backendGroupId])) {
			self::$groupUsers[$backendGroupId] = [];
		}
		self::$groupUsers[$backendGroupId][$accountId] = true;

		return true;
	}

	/**
	 * @param int $accountId - internal id of an account
	 * @param int $backendGroupId - internal id of backend group
	 *
	 * @return bool
	 */
	public function addGroupAdmin($accountId, $backendGroupId) {
		if (!isset(self::$groupAdmins[$backendGroupId])) {
			self::$groupAdmins[$backendGroupId] = [];
		}
		self::$groupAdmins[$backendGroupId][$accountId] = true;

		return true;
	}

	/**
	 * @param int $accountId - internal id of an account
	 * @param int $backendGroupId - internal id of backend group
	 * @return bool
	 */
	public function removeGroupUser($accountId, $backendGroupId) {
		unset(self::$groupUsers[$backendGroupId][$accountId]);
		return true;
	}

	/**
	 * @param int $accountId - internal id of an account
	 * @param int $backendGroupId - internal id of backend group
	 * @return bool
	 */
	public function removeGroupAdmin($accountId, $backendGroupId) {
		unset(self::$groupAdmins[$backendGroupId][$accountId]);
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
}