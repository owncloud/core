<?php
/**
 * @copyright Copyright (c) 2023, ownCloud GmbH
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

namespace OCA\Files_External\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\JSONResponse;
use OCP\IRequest;
use OCP\IUserManager;
use OCP\IGroupManager;

class ApplicableController extends Controller {
	/** @var IUserManager */
	private $userManager;
	/** @var IGroupManager */
	private $groupManager;

	public function __construct($appName, IRequest $request, IUserManager $userManager, IGroupManager $groupManager) {
		parent::__construct($appName, $request);
		$this->userManager = $userManager;
		$this->groupManager = $groupManager;
	}

	/**
	 * @param string $pattern
	 * @param int $limit
	 * @param int $offset
	 * @return JSONResponse
	 */
	public function patternSearch($pattern = '', $limit = null, $offset = null) {
		$groups = [];
		foreach ($this->groupManager->search($pattern, $limit, $offset) as $group) {
			$groups[$group->getGID()] = $group->getDisplayName();
		}

		$users = [];
		foreach ($this->userManager->searchDisplayName($pattern, $limit, $offset) as $user) {
			$users[$user->getUID()] = $user->getDisplayName();
		}

		return new JSONResponse([
			'groups' => $groups,
			'users' => $users,
			'status' => 'success',
		]);
	}

	/**
	 * @NoAdminRequired
	 * @param array $users
	 * @return JSONResponse
	 */
	public function userDisplayNames($users) {
		$result = [];

		foreach ($users as $user) {
			$userObject = $this->userManager->get($user);
			if ($userObject !== null) {
				$result[$user] = $userObject->getDisplayName();
			}
		}

		$json = [
			'users' => $result,
			'status' => 'success'
		];

		return new JSONResponse($json);
	}

	/**
	 * @NoAdminRequired
	 * @param array $groups
	 * @return JSONResponse
	 */
	public function groupDisplayNames($groups) {
		$result = [];

		foreach ($groups as $group) {
			$groupObject = $this->groupManager->get($group);
			if ($groupObject !== null) {
				$result[$group] = $groupObject->getDisplayName();
			}
		}

		$json = [
			'groups' => $result,
			'status' => 'success'
		];

		return new JSONResponse($json);
	}
}
