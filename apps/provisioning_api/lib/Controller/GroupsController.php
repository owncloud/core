<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

namespace OCA\Provisioning_API\Controller;

use OC\OCS\Result;
use OCP\API;
use OCP\AppFramework\OCSController;
use OCP\IGroup;
use OCP\IRequest;
use OCP\IUser;

class GroupsController extends OCSController {

	/** @var \OCP\IGroupManager */
	private $groupManager;

	/** @var \OCP\IUserSession */
	private $userSession;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param \OCP\IGroupManager $groupManager
	 * @param \OCP\IUserSession $userSession
	 */
	public function __construct($appName,
								IRequest $request,
								\OCP\IGroupManager $groupManager,
								\OCP\IUserSession $userSession
								) {
		parent::__construct($appName, $request);
		$this->groupManager = $groupManager;
		$this->userSession = $userSession;
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 * returns a list of groups
	 *
	 * @return Result
	 */
	public function getGroups() {
		$user = $this->userSession->getUser();
		if ($this->isSubAdmin($user) === false) {
			return new Result(null, API::RESPOND_UNAUTHORISED);
		}
		$search = $this->request->getParam('search', '');
		$limit = $this->request->getParam('limit');
		$offset = $this->request->getParam('offset');

		if ($limit !== null) {
			$limit = (int)$limit;
		}
		if ($offset !== null) {
			$offset = (int)$offset;
		}

		$groups = $this->groupManager->search($search, $limit, $offset, 'management');
		$groups = \array_map(function ($group) {
			/** @var IGroup $group */
			return $group->getGID();
		}, $groups);

		return new Result(['groups' => $groups]);
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 * returns an array of users in the group specified
	 *
	 * @param string $groupId
	 * @return Result
	 */
	public function getGroup($groupId = '') {
		$user = $this->userSession->getUser();
		if ($this->isSubAdmin($user) === false) {
			return new Result(null, API::RESPOND_UNAUTHORISED);
		}

		// Check the group exists
		if (!$this->groupManager->groupExists($groupId)) {
			return new Result(null, API::RESPOND_NOT_FOUND, 'The requested group could not be found');
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
			return new Result(['users' => $users]);
		}
		return new Result(null, API::RESPOND_UNAUTHORISED, 'User does not have access to specified group');
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 * creates a new group
	 *
	 * @return Result
	 */
	public function addGroup() {
		// Validate name
		$groupId = $this->request->getParam('groupid', '');
		if (($groupId === '') || $groupId === null || ($groupId === false)) {
			\OCP\Util::writeLog('provisioning_api', 'Group name not supplied', \OCP\Util::ERROR);
			return new Result(null, 101, 'Invalid group name');
		}
		// Check if it exists
		if ($this->groupManager->groupExists($groupId)) {
			return new Result(null, 102);
		}
		$user = $this->userSession->getUser();
		if ($this->isSubAdmin($user) === false) {
			return new Result(null, 102);
		}
		// Only admin has got privilege to create group
		if ($this->groupManager->isAdmin($user->getUID())) {
			$this->groupManager->createGroup($groupId);
			return new Result(null, 100);
		}

		return new Result(null, 997);
	}

	/**
	 * @NoCSRFRequired
	 *
	 * @param string $groupId
	 * @return Result
	 */
	public function deleteGroup($groupId = '') {
		// Check it exists
		if (!$this->groupManager->groupExists($groupId)) {
			return new Result(null, 101);
		}
		if ($groupId === 'admin' || !$this->groupManager->get($groupId)->delete()) {
			// Cannot delete admin group
			return new Result(null, 102);
		}
		return new Result(null, 100);
	}

	/**
	 * @NoCSRFRequired
	 *
	 * @param string $groupId
	 * @return Result
	 */
	public function getSubAdminsOfGroup($groupId) {
		// Check group exists
		$targetGroup = $this->groupManager->get($groupId);
		if ($targetGroup === null) {
			return new Result(null, 101, 'Group does not exist');
		}

		'@phan-var \OC\Group\Manager $this->groupManager';
		$subadmins = $this->groupManager->getSubAdmin()->getGroupsSubAdmins($targetGroup);
		// New class returns IUser[] so convert back
		$uids = [];
		foreach ($subadmins as $user) {
			$uids[] = $user->getUID();
		}

		return new Result($uids);
	}

	/**
	 * @param IUser $user
	 * @return bool
	 */
	private function isSubAdmin(IUser $user) {
		if ($user === null) {
			return false;
		}
		$uid = $user->getUID();
		'@phan-var \OC\Group\Manager $this->groupManager';
		if (
			$this->groupManager->isAdmin($uid)
			|| $this->groupManager->getSubAdmin()->isSubAdmin($user)
		) {
			return true;
		}

		return false;
	}
}
