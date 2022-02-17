<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Tom Needham <tom@owncloud.com>
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

namespace OCA\Provisioning_API;

use OC_OCS_Result;
use OCP\IGroup;
use OCP\IUser;
use OCP\IConfig;

class Groups {

	/** @var \OCP\IGroupManager */
	private $groupManager;

	/** @var \OCP\IUserSession */
	private $userSession;

	/** @var IConfig */
	private $config;
	/** @var \OCP\IRequest */
	private $request;

	/**
	 * @param \OCP\IGroupManager $groupManager
	 * @param \OCP\IUserSession $userSession
	 * @param IConfig $config
	 * @param \OCP\IRequest $request
	 */
	public function __construct(
		\OCP\IGroupManager $groupManager,
		\OCP\IUserSession $userSession,
		IConfig $config,
		\OCP\IRequest $request
	) {
		$this->groupManager = $groupManager;
		$this->userSession = $userSession;
		$this->config = $config;
		$this->request = $request;
	}

	/**
	 * returns a list of groups
	 *
	 * @param array $parameters
	 * @return OC_OCS_Result
	 */
	public function getGroups($parameters) {
		$search = $this->request->getParam('search', '');
		$limit = $this->request->getParam('limit');
		$offset = $this->request->getParam('offset');

		if ($limit !== null) {
			$limit = (int)$limit;
		}
		if ($offset !== null) {
			$offset = (int)$offset;
		}

		$user = $this->userSession->getUser();
		$userid = $user->getUID();

		$groups = [];
		if ($this->groupManager->isAdmin($userid)) {
			// admins have access to all the groups
			$groups = $this->groupManager->search($search, $limit, $offset, 'management');
		} else {
			// check if it's a subAdmin
			$subAdmin = $this->groupManager->getSubAdmin();
			if ($subAdmin->isSubAdmin($user)) {
				// subAdmins have access to the groups they control
				$unfilteredGroups = $subAdmin->getSubAdminsGroups($user);

				if ($search !== '') {
					// filter the groups
					$currentIndex = 0;
					foreach ($unfilteredGroups as $group) {
						if (($limit !== null) && ($currentIndex >= $offset + $limit)) {
							// no need to check further groups
							break;
						}
						$guid = $group->getGID();
						$allowMedialSearches = $this->config->getSystemValue("groups.enable_medial_search", true);
						$initialPos = \mb_stripos($guid, $search); // case insensitive search
						if (
							($allowMedialSearches && $initialPos !== false) ||
							(!$allowMedialSearches && $initialPos === 0)
						) {
							$groups[] = $group;
							$currentIndex++;
						}
					}
				} else {
					$groups = $unfilteredGroups;
				}

				// slice the groups according to params
				$groups = \array_slice($groups, $offset, $limit);
			}
			// regular users shouldn't be able to reach this point
		}

		$groups = \array_map(function ($group) {
			/** @var IGroup $group */
			return $group->getGID();
		}, $groups);

		return new OC_OCS_Result(['groups' => $groups]);
	}

	/**
	 * returns an array of users in the group specified
	 *
	 * @param array $parameters
	 * @return OC_OCS_Result
	 */
	public function getGroup($parameters) {
		// Check if user is logged in
		$user = $this->userSession->getUser();
		if ($user === null) {
			return new OC_OCS_Result(null, \OCP\API::RESPOND_UNAUTHORISED);
		}

		$groupId = $parameters['groupid'];

		// Check the group exists
		if (!$this->groupManager->groupExists($groupId)) {
			return new OC_OCS_Result(null, \OCP\API::RESPOND_NOT_FOUND, 'The requested group could not be found');
		}

		$isSubadminOfGroup = false;
		$group = $this->groupManager->get($groupId);
		if ($group !== null) {
			'@phan-var \OC\Group\Manager $this->groupManager';
			$isSubadminOfGroup =$this->groupManager->getSubAdmin()->isSubAdminofGroup($user, $group);
		}

		// Check subadmin has access to this group
		if ($this->groupManager->isAdmin($user->getUID())
		   || $isSubadminOfGroup) {
			$users = $this->groupManager->get($groupId)->getUsers();
			$users =  \array_map(function ($user) {
				/** @var IUser $user */
				return $user->getUID();
			}, $users);
			$users = \array_values($users);
			return new OC_OCS_Result(['users' => $users]);
		}
		return new OC_OCS_Result(null, \OCP\API::RESPOND_UNAUTHORISED, 'User does not have access to specified group');
	}

	/**
	 * creates a new group
	 *
	 * @param array $parameters
	 * @return OC_OCS_Result
	 */
	public function addGroup($parameters) {
		// Validate name
		$groupId = $this->request->getParam('groupid', '');
		if (($groupId === '') || $groupId === null || ($groupId === false)) {
			\OCP\Util::writeLog('provisioning_api', 'Group name not supplied', \OCP\Util::ERROR);
			return new OC_OCS_Result(null, 101, 'Invalid group name');
		}
		if (\trim($groupId) !== $groupId) {
			\OCP\Util::writeLog('provisioning_api', 'Group name must not start or end with white space', \OCP\Util::ERROR);
			return new OC_OCS_Result(null, 101, 'Invalid group name');
		}
		// Check if it exists
		if ($this->groupManager->groupExists($groupId)) {
			return new OC_OCS_Result(null, 102);
		}
		$user = $this->userSession->getUser();
		if ($user === null) {
			return new OC_OCS_Result(null, 102);
		}
		// Only admin has got privilege to create group
		if ($this->groupManager->isAdmin($user->getUID())) {
			$this->groupManager->createGroup($groupId);
			return new OC_OCS_Result(null, 100);
		}

		return new OC_OCS_Result(null, 997);
	}

	/**
	 * @param array $parameters
	 * @return OC_OCS_Result
	 */
	public function deleteGroup($parameters) {
		// Check it exists
		if (!$this->groupManager->groupExists($parameters['groupid'])) {
			return new OC_OCS_Result(null, 101);
		}
		if ($parameters['groupid'] === 'admin' || !$this->groupManager->get($parameters['groupid'])->delete()) {
			// Cannot delete admin group
			return new OC_OCS_Result(null, 102);
		}
		return new OC_OCS_Result(null, 100);
	}

	/**
	 * @param array $parameters
	 * @return OC_OCS_Result
	 */
	public function getSubAdminsOfGroup($parameters) {
		$group = $parameters['groupid'];
		// Check group exists
		$targetGroup = $this->groupManager->get($group);
		if ($targetGroup === null) {
			return new OC_OCS_Result(null, 101, 'Group does not exist');
		}

		$currentUser = $this->userSession->getUser();
		$subAdminManager = $this->groupManager->getSubAdmin();
		$uids = [];
		if (
			$this->groupManager->isAdmin($currentUser->getUID()) ||
			$subAdminManager->isSubAdminofGroup($currentUser, $targetGroup)
		) {
			'@phan-var \OC\Group\Manager $this->groupManager';
			$subadmins = $subAdminManager->getGroupsSubAdmins($targetGroup);
			// New class returns IUser[] so convert back
			foreach ($subadmins as $user) {
				$uids[] = $user->getUID();
			}
		}

		return new OC_OCS_Result($uids);
	}
}
