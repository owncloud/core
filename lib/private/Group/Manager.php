<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Bernhard Posselt <dev@bernhard-posselt.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author macjohnny <estebanmarin@gmx.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Roman Kreisel <mail@romankreisel.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
 * @author voxsim <Simon Vocella>
 * @authod Piotr Mrowczynski <piotr@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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
use OC\Cache\CappedMemoryCache;
use OC\Hooks\PublicEmitter;
use OC\MembershipManager;
use OC\User\Account;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\GroupInterface;
use OCP\IGroupManager;

/**
 * Class Group Manager. This class is responsible for access to the \OC\Group\Group
 * class.
 *
 * Hooks available in scope \OC\Group:
 * - preAddUser(\OC\Group\Group $group, \OC\User\User $user)
 * - postAddUser(\OC\Group\Group $group, \OC\User\User $user)
 * - preRemoveUser(\OC\Group\Group $group, \OC\User\User $user)
 * - postRemoveUser(\OC\Group\Group $group, \OC\User\User $user)
 * - preDelete(\OC\Group\Group $group)
 * - postDelete(\OC\Group\Group $group)
 * - preCreate(string $groupId)
 * - postCreate(\OC\Group\Group $group)
 *
 * @package OC\Group
 */
class Manager extends PublicEmitter implements IGroupManager {
	/** @var GroupInterface[] $backends */
	private $backends = [];

	/** @var \OC\User\Manager $userManager */
	private $userManager;

	/** @var \OC\MembershipManager $membershipManager */
	private $membershipManager;

	/** @var CappedMemoryCache $cachedGroups */
	private $cachedGroups;

	/** @var CappedMemoryCache $cachedUserGroups */
	private $cachedUserGroups;

	/** @var \OC\SubAdmin */
	private $subAdmin = null;

	/** @var \OC\Group\GroupMapper */
	private $groupMapper;

	/** @var \OCP\IDBConnection */
	private $db;

	/**
	 * @param \OC\User\Manager $userManager
	 * @param \OC\MembershipManager $membershipManager
	 * @param \OC\Group\GroupMapper $groupMapper
	 * @param \OCP\IDBConnection $db
	 */
	public function __construct(\OC\User\Manager $userManager, \OC\MembershipManager $membershipManager, \OC\Group\GroupMapper $groupMapper, \OCP\IDBConnection $db) {
		$this->db = $db;
		$this->userManager = $userManager;
		$this->groupMapper = $groupMapper;
		$this->membershipManager = $membershipManager;
		$this->cachedGroups = new CappedMemoryCache();
		$this->cachedUserGroups = new CappedMemoryCache();
		$cachedGroups = & $this->cachedGroups;
		$cachedUserGroups = & $this->cachedUserGroups;
		$this->listen('\OC\Group', 'postDelete', function ($group) use (&$cachedGroups, &$cachedUserGroups) {
			/**
			 * @var \OC\Group\Group $group
			 */
			unset($cachedGroups[$group->getGID()]);
			$cachedUserGroups->clear();
		});
		$this->listen('\OC\Group', 'postAddUser', function ($group) use (&$cachedUserGroups) {
			/**
			 * @var \OC\Group\Group $group
			 */
			$cachedUserGroups->clear();
		});
		$this->listen('\OC\Group', 'postRemoveUser', function ($group) use (&$cachedUserGroups) {
			/**
			 * @var \OC\Group\Group $group
			 */
			$cachedUserGroups->clear();
		});
	}

	/**
	 * Get all active backends
	 *
	 * @return \OCP\GroupInterface[]
	 */
	public function getBackends() {
		return $this->backends;
	}

	/**
	 * @param \OCP\GroupInterface $backend
	 */
	public function addBackend($backend) {
		$this->backends[] = $backend;
		$this->clearCaches();
	}

	public function clearBackends() {
		$this->backends = [];
		$this->clearCaches();
	}

	/**
	 * @param string $gid
	 * @return \OCP\IGroup|null
	 */
	public function get($gid) {
		// Check cache first
		if ($group = $this->getCachedGroupObject($gid)) {
			return $group;
		}

		// Retrieve backend group and create group object
		try {
			$backendGroup = $this->groupMapper->getGroup($gid);
			return $this->getGroupObject($backendGroup);
		} catch (DoesNotExistException $ex) {
			return null;
		}
	}

	/**
	 * @param string $gid
	 * @return bool
	 */
	public function groupExists($gid) {
		return !is_null($this->get($gid));
	}

	/**
	 * Create group using group id $gid. Displayname will be set to $gid.
	 *
	 * @param string $gid
	 * @throws \Exception
	 * @return \OCP\IGroup|null
	 */
	public function createGroup($gid) {
		if (!$this->isValid($gid)) {
			return null;
		} else if ($this->groupExists($gid)) {
			$l = \OC::$server->getL10N('lib');
			throw new \Exception($l->t('The group name is already being used'));
		}

		$this->emit('\OC\Group', 'preCreate', [$gid]);

		if (empty($this->backends)) {
			$this->addBackend(new Database($this->db));
		}

		// Create group in the first added backend service
		foreach ($this->backends as $backend) {
			if ($backend->implementsActions(Backend::CREATE_GROUP)) {
				// Create group in the backend service
				$backend->createGroup($gid);

				// Add group to internal backend-group table
				$group = $this->createGroupFromBackendAndCache($gid, $backend);

				$this->emit('\OC\Group', 'postCreate', [$group]);

				return $group;
			}
		}

		return null;
	}

	/**
	 * Create group from $backend backend service
	 *
	 * @param string $gid
	 * @param GroupInterface $backend
	 * @throws UniqueConstraintViolationException
	 * @return \OCP\IGroup
	 */
	public function createGroupFromBackend($gid, $backend) {
		if (!$this->isValid($gid)) {
			return null;
		}

		// Create group in the internal backend services
		$this->emit('\OC\Group', 'preCreate', [$gid]);

		// Add group to internal backend-group table
		$group = $this->createGroupFromBackendAndCache($gid, $backend);

		// Emit post create
		$this->emit('\OC\Group', 'postCreate', [$group]);

		return $group;
	}

	/**
	 * @param string $search search string
	 * @param int|null $limit limit
	 * @param int|null $offset offset
	 * @param string|null $scope scope string
	 * @return \OCP\IGroup[] groups
	 */
	public function search($search, $limit = null, $offset = null, $scope = null) {
		// Search for backend groups matching pattern and convert to \OCP\IGroup
		$backendGroups = $this->groupMapper->search($search, $limit, $offset);
		$groups =  array_map(function($backendGroup) {
			// Get Group object for each backend group and cache
			return $this->getGroupObject($backendGroup);
		}, $backendGroups);

		// Filter groups for exluded backends in the scope and return group id for each group.
		return $this->filterExcludedBackendsForScope($groups, $scope);
	}

	/**
	 * Get a list of group ids for a user
	 *
	 * @param \OC\User\User|null|false $user
	 * @param string|null $scope string
	 * @return array with group ids
	 */
	public function getUserGroupIds($user, $scope = null) {
		/** @var \OCP\IGroup[] $groupsForUser */
		$groupsForUser = $this->getUserGroups($user, $scope);

		// Filter groups for exluded backends in the scope and return group id for each group.
		return array_map(function($group) {
			/** @var Group $group */
			return $group->getGID();
		}, $groupsForUser);
	}

	/**
	 * @param \OC\User\User|null|false $user user
	 * @param string|null $scope scope string
	 * @return \OCP\IGroup[]
	 */
	public function getUserGroups($user, $scope = null) {
		if (!$user) {
			return [];
		}

		/** @var Group[] $groupsForUser */
		$groupsForUser = $this->getCachedUserGroups($user);

		// Filter groups for exluded backends in the scope and return group id for each group.
		return $this->filterExcludedBackendsForScope($groupsForUser, $scope);
	}

	/**
	 * @param string $uid the user id
	 * @param string|null $scope scope string
	 * @return \OCP\IGroup[]
	 */
	public function getUserIdGroups($uid, $scope = null) {
		if (!$uid) {
			return [];
		}

		/** @var Group[] $groupsForUser */
		$groupsForUser = $this->getCachedUserIdGroups($uid);

		// Filter groups for exluded backends in the scope and return group id for each group.
		return $this->filterExcludedBackendsForScope($groupsForUser, $scope);
	}

	/**
	 * Checks if a userId is in the admin group
	 *
	 * @param string $userId
	 * @return bool if admin
	 */
	public function isAdmin($userId) {
		return $this->membershipManager->isGroupUser($userId, 'admin');
	}

	/**
	 * Checks if a userId is in a group identified by gid
	 *
	 * @param string $userId
	 * @param string $gid
	 * @return bool if in group
	 */
	public function isInGroup($userId, $gid) {
		return $this->membershipManager->isGroupUser($userId, $gid);
	}

	/**
	 * Finds users in a group
	 *
	 * @param string $gid
	 * @param string $search
	 * @param int $limit
	 * @param int $offset
	 * @return \OCP\IUser[]
	 */
	public function findUsersInGroup($gid, $search = '', $limit = -1, $offset = 0) {
		/** @var Account[] $accounts */
		$accounts = $this->membershipManager->find($gid, $search, $limit, $offset);

		$matchingUsers = [];
		foreach($accounts as $account) {
			$matchingUsers[$account->getUserId()] = $this->userManager->getUserObject($account);
		}

		return $matchingUsers;
	}

	/**
	 * Get a list of all display names in a group identified by $gid,
	 * which satisfy search predicate
	 *
	 * @param string $gid
	 * @param string $search
	 * @param int $limit
	 * @param int $offset
	 * @return array an array of display names (value) and user ids (key)
	 */
	public function displayNamesInGroup($gid, $search = '', $limit = -1, $offset = 0) {
		/** @var Account[] $accounts */
		$accounts = $this->membershipManager->find($gid, $search, $limit, $offset);

		$matchingUsers = [];
		foreach($accounts as $account) {
			$matchingUsers[$account->getUserId()] = $account->getDisplayName();
		}
		return $matchingUsers;
	}

	/**
	 * @return \OC\SubAdmin
	 */
	public function getSubAdmin() {
		if (!$this->subAdmin) {
			$this->subAdmin = new \OC\SubAdmin(
				$this->userManager,
				$this,
				$this->membershipManager,
				$this->db
			);
		}

		return $this->subAdmin;
	}

	/**
	 * Get or construct the group object
	 *
	 * NOTE: This function is not defined in the interface and is only
	 * available in the User/Group management scope. Only classes receiving this class instance will
	 * have access to this function.
	 *
	 * @param BackendGroup $backendGroup
	 * @return \OCP\IGroup
	 */
	public function getGroupObject($backendGroup) {
		if ($group = $this->getCachedGroupObject($backendGroup->getGroupId())) {
			return $group;
		}

		// Return new group object, since group is not cached
		return $this->newGroupObject($backendGroup);
	}

	/**
	 * Retrieve the backend-group object
	 *
	 * NOTE: This function is not defined in the interface and is only
	 * available in the User/Group management scope. Only classes receiving this class instance will
	 * have access to this function.
	 *
	 * @param string $gid
	 * @return BackendGroup
	 */
	public function getBackendGroupObject($gid) {
		if ($backendGroup = $this->getCachedBackendGroup($gid)) {
			return $backendGroup;
		}

		// Retrieve backend group from group mapper, since Group is not cached
		try {
			return $this->groupMapper->getGroup($gid);
		} catch (DoesNotExistException $ex) {
			return null;
		}
	}

	/**
	 * @param string $gid
	 * @param GroupInterface $backend
	 * @throws UniqueConstraintViolationException
	 * @return \OCP\IGroup
	 */
	private function createGroupFromBackendAndCache($gid, $backend) {
		// Add group internally
		$backendGroup = $this->newBackendGroup($gid, $backend);

		// If group added successfully internally, ensure that caches are cleared
		$this->clearCachedGroup($gid);

		// Retrieve group object for newly created backend group
		return $this->getGroupObject($backendGroup);
	}

	/**
	 * @param string $gid
	 * @param GroupInterface $backend
	 * @throws UniqueConstraintViolationException
	 * @return BackendGroup|\OCP\AppFramework\Db\Entity
	 */
	private function newBackendGroup($gid, $backend) {
		// Create new backend group, set group id, displayname and backend class
		$backendGroup = new BackendGroup();
		$backendGroup->setGroupId($gid);

		$displayName = $gid;
		if ($backend->implementsActions(\OC\Group\Backend::GROUP_DETAILS)) {
			$groupData = $backend->getGroupDetails($gid);
			if (is_array($groupData) && isset($groupData['displayName'])) {
				// take the display name from the backend
				$displayName = $groupData['displayName'];
			}
		}
		$backendGroup->setDisplayName($displayName);
		$backendGroup->setBackend(get_class($backend));

		// Add group internally
		return $this->groupMapper->insert($backendGroup);
	}

	/**
	 * Create new group object instance from given BackendGroup instance,
	 * and cache Group and BackendGroup classes
	 *
	 * @param BackendGroup $backendGroup
	 *
	 * @return \OC\Group\Group
	 */
	private function newGroupObject($backendGroup) {
		// Create new Group object instance
		$group = new Group($backendGroup, $this->groupMapper, $this, $this->userManager, $this->membershipManager);

		// Let Group Manager have control over both  Group and BackendGroup class instances
		// and pass references to other classes
		$groupCache["backend-group"] = $backendGroup;
		$groupCache["group"] = $group;
		$this->cachedGroups->set($group->getGID(), $groupCache);

		return $group;
	}

	/**
	 * Get a list of group ids for a user. This function provides optimized access
	 * since it uses getUserBackendGroupsById instead of getUserBackendGroups
	 * @param \OC\User\User $user
	 * @return \OCP\IGroup[]
	 */
	private function getCachedUserGroups($user) {
		if (!$this->cachedUserGroups->hasKey($user->getUID())) {
			// Retrieve backend groups for specific user's account internal id
			$account = $this->userManager->getAccountObject($user);

			// Get \OCP\IGroup object for user
			$userGroups = array_map(function($backendGroup) {
				// Get \OCP\IGroup object for \OC\Group\BackendGroup $backendGroup
				return $this->getGroupObject($backendGroup);
			}, $this->membershipManager->getUserBackendGroupsById($account->getId()));

			$this->cachedUserGroups->set($user->getUID(), $userGroups);
		}

		return $this->cachedUserGroups->get($user->getUID());
	}

	/**
	 * Get a list of group ids for a user identified by userId
	 * @param string $userId
	 * @return \OCP\IGroup[]
	 */
	private function getCachedUserIdGroups($userId) {
		if (!$this->cachedUserGroups->hasKey($userId)) {
			// Get \OCP\IGroup object for user identified by userId
			$userGroups = array_map(function($backendGroup) {
				// Get \OCP\IGroup object for each backend group and cache
				return $this->getGroupObject($backendGroup);
			}, $this->membershipManager->getUserBackendGroups($userId));

			$this->cachedUserGroups->set($userId, $userGroups);
		}

		return $this->cachedUserGroups->get($userId);
	}

	/**
	 * Filter groups by backends that opt-out of the given scope
	 *
	 * @param \OCP\IGroup[] $groups groups to filter
	 * @param string|null $scope scope string
	 * @return \OCP\IGroup[] filtered groups
	 */
	private function filterExcludedBackendsForScope($groups, $scope) {
		return array_filter($groups, function($group) use ($scope) {
			/** @var \OCP\IGroup $group */
			if ($backend = $group->getBackend()){
				return $backend->isVisibleForScope($scope);
			}
			return false;
		});
	}

	/**
	 * Get cached group object if cached
	 *
	 * @param string $gid
	 *
	 * @return \OC\Group\Group
	 */
	private function getCachedGroupObject($gid) {
		if ($userCache = $this->cachedGroups->get($gid)) {
			return $userCache["group"];
		}
		return null;
	}

	/**
	 * Get cached backend group if cached
	 * @param string $gid
	 *
	 * @return \OC\Group\BackendGroup
	 */
	private function getCachedBackendGroup($gid) {
		if ($groupCache = $this->cachedGroups->get($gid)) {
			return $groupCache["backend-group"];
		}
		return null;
	}

	/**
	 * Clear cached group
	 * @param string $gid
	 */
	private function clearCachedGroup($gid) {
		$this->cachedGroups->remove($gid);
		$this->cachedUserGroups->remove($gid);
	}

	/**
	 * @param string $gid
	 * @return bool
	 */
	private function isValid($gid) {
		if ($gid === '' || is_null($gid)) {
			return false;
		}
		return true;
	}

	/**
	 * Clear all caches used within this manager
	 */
	private function clearCaches() {
		$this->cachedGroups->clear();
		$this->cachedUserGroups->clear();
	}

	/**
	 * Checks whether a given backend is used
	 *
	 * @param string $backendClass Full classname including complete namespace
	 *
	 * @deprecated 10.0.0 - use getBackends of \OCP\IGroupManager
	 * @return bool
	 */
	public function isBackendUsed($backendClass) {
		$backendClass = strtolower(ltrim($backendClass, '\\'));
		foreach ($this->getBackends() as $backend) {
			if (strtolower(get_class($backend)) === $backendClass) {
				return true;
			}
		}

		return false;
	}

	/**
	 * only used for unit testing
	 *
	 * @param GroupMapper $mapper
	 * @param array $backends
	 * @return array
	 */
	public function reset(GroupMapper $mapper, $backends) {
		$return = [$this->groupMapper, $this->backends];
		$this->groupMapper = $mapper;
		$this->backends = $backends;

		return $return;
	}

	/**
	 * only used for unit testing
	 *
	 * @param MembershipManager $membershipManager
	 * @return MembershipManager
	 */
	public function resetMembershipManager(MembershipManager $membershipManager) {
		$return = $this->membershipManager;
		$this->membershipManager = $membershipManager;

		return $return;
	}
}
