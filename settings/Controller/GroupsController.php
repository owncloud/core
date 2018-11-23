<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

namespace OC\Settings\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\IGroup;
use OCP\IGroupManager;
use OCP\IRequest;
use OCP\IUser;
use OCP\IUserSession;

/**
 * Class GroupsController
 *
 * @package OC\Settings\Controller
 */
class GroupsController extends Controller {
	/** @var IGroupManager */
	private $groupManager;

	/** @var IUserSession */
	private $userSession;

	/**
	 * GroupsController constructor.
	 *
	 * @param string $appName
	 * @param IRequest $request
	 * @param IGroupManager $groupManager
	 * @param IUserSession $userSession
	 */
	public function __construct(string $appName,
								IRequest $request,
								IGroupManager $groupManager,
								IUserSession $userSession) {
		parent::__construct($appName, $request);
		$this->groupManager = $groupManager;
		$this->userSession = $userSession;
	}

	/**
	 * Get the groups for the user
	 *
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 * @return DataResponse
	 */
	public function getGroupsForUser() {
		$user = $this->userSession->getUser();

		if ($user === null) {
			return new DataResponse(
				[
					'status' => 'error',
					'data' => [
						'message' => 'User not logged in'
					]
				],
				Http::STATUS_NOT_FOUND
			);
		}

		$adminGroups = [];
		$userGroups = [];
		$isAdmin = $this->groupManager->isAdmin($user->getUID());
		$groups = $this->getGroups($isAdmin, $user, '');
		foreach ($groups as $group) {
			if ($group->getGID() === 'admin') {
				$adminGroup['id'] = $group->getGID();
				$adminGroup['name'] = $group->getDisplayName();
				$adminGroup['userCount'] = $group->count('');
				$adminGroups[] = $adminGroup;
			} else {
				$userGroup['id'] = $group->getGID();
				$userGroup['name'] = $group->getDisplayName();
				$userGroup['userCount'] = $group->count('');
				$userGroups[] = $userGroup;
			}
		}
		return new DataResponse(
			[
				'data' => ['adminGroups' => $adminGroups, 'groups' => $userGroups]
			], Http::STATUS_OK);
	}

	/**
	 * @param $isAdmin
	 * @param IUser $user
	 * @param string $search
	 * @return IGroup[]
	 */
	private function getGroups($isAdmin, IUser $user, $search = '') {
		if ($isAdmin === true) {
			return $this->groupManager->search($search, null, null, 'management');
		}

		if ($user !== null) {
			return $this->groupManager->getSubAdmin()->getSubAdminsGroups($user);
		}
		return [];
	}
}
