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

namespace Test;

use OC\AppFramework\Http;
use OC\Settings\Controller\GroupsController;
use OCP\AppFramework\Http\DataResponse;
use OCP\IGroup;
use OCP\IGroupManager;
use OCP\IRequest;
use OCP\ISubAdminManager;
use OCP\IUser;
use OCP\IUserSession;
use Test\Traits\UserTrait;

/**
 * Class GroupsControllerTest
 *
 * @group DB
 * @package Test
 */
class GroupsControllerTest extends TestCase {
	use UserTrait;
	/** @var string */
	private $appName;

	/** @var IRequest | \PHPUnit\Framework\MockObject\MockObject */
	private $request;

	/** @var IGroupManager | \PHPUnit\Framework\MockObject\MockObject */
	private $groupManager;

	/** @var IUserSession | \PHPUnit\Framework\MockObject\MockObject */
	private $userSession;

	/** @var GroupsController */
	private $groupsController;

	public function setUp() {
		parent::setUp();
		$this->appName = 'settings';
		$this->request = $this->createMock(IRequest::class);
		$this->groupManager = $this->createMock(IGroupManager::class);
		$this->userSession = $this->createMock(IUserSession::class);
		$this->groupsController = new GroupsController($this->appName, $this->request, $this->groupManager, $this->userSession);
	}

	public function provideAdminGroups() {
		return [
			[['admin', 'group1', 'group2']]
		];
	}

	/**
	 * @dataProvider provideAdminGroups
	 * @param $groups
	 */
	public function testGetGroupsForAdmin($groups) {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')
			->willReturn('admin');

		$this->userSession->method('getUser')
			->willReturn($user);
		$this->groupManager->method('isAdmin')
			->willReturn(true);

		$groupsForAdmin = [];
		foreach ($groups as $group) {
			$groupObject = $this->createMock(IGroup::class);
			$groupObject->method('getGID')
				->willReturn($group);
			$groupObject->method('getDisplayName')
				->willReturn($group);
			$groupObject->method('count')
				->willReturn(1);
			$groupsForAdmin[] = $groupObject;
		}

		$this->groupManager->method('search')
			->willReturn($groupsForAdmin);

		$expectedResult = new DataResponse(
			[
				'data' => [
					'adminGroups' => [['id' => 'admin', 'name' => 'admin', 'userCount' => 1]],
					'groups' => [
						['id' => 'group1', 'name' => 'group1', 'userCount' => 1],
						['id' => 'group2', 'name' => 'group2', 'userCount' => 1]
					]
				]

			]
		);
		$result = $this->groupsController->getGroupsForUser();
		$this->assertEquals($expectedResult, $result);
	}

	public function testGetGroupsForSubadmin() {
		$groups = [
			['groupName' => 'group1','userCount' => 3],
			['groupName' => 'group2', 'userCount' => 2],
			['groupName' => 'group3', 'userCount' => 1]
		];
		$user = $this->createMock(IUser::class);
		$user->method('getUID')
			->willReturn('admin');

		$this->userSession->method('getUser')
			->willReturn($user);
		$this->groupManager->method('isAdmin')
			->willReturn(false);

		$groupsForSubAdmin = [];
		foreach ($groups as $group) {
			$groupObject = $this->createMock(IGroup::class);
			$groupObject->method('getGID')
				->willReturn($group['groupName']);
			$groupObject->method('getDisplayName')
				->willReturn($group['groupName']);
			$groupObject->method('count')
				->willReturn($group['userCount']);
			$groupsForSubAdmin[] = $groupObject;
		}

		$subAdminManager = $this->createMock(ISubAdminManager::class);
		$subAdminManager->method('getSubAdminsGroups')
			->with($user)
			->willReturn($groupsForSubAdmin);
		$this->groupManager->method('getSubAdmin')
			->willReturn($subAdminManager);

		$expectedResult = new DataResponse(
			[
				'data' => [
					'adminGroups' => [],
					'groups' => [
						['id' => 'group1', 'name' => 'group1', 'userCount' => 3],
						['id' => 'group2', 'name' => 'group2', 'userCount' => 2],
						['id' => 'group3', 'name' => 'group3', 'userCount' => 1]
					]
				]

			]
		);
		$result = $this->groupsController->getGroupsForUser();
		$this->assertEquals($expectedResult, $result);
	}

	/**
	 * A test which adds users to regular groups and admin group
	 */
	public function testMultipleUsersInGroup() {
		$user1 = $this->createUser('user1');
		$user2 = $this->createUser('user2');
		$user3 = $this->createUser('user3');
		$user4 = $this->createUser('user4');
		$user5 = $this->createUser('user5');
		$user6 = $this->createUser('user6');
		$user7 = $this->createUser('user7');

		$groupManager = \OC::$server->getGroupManager();
		$group1 = $groupManager->createGroup('testGroup1');
		$group2 = $groupManager->createGroup('testGroup2');
		$adminGroup = $groupManager->get('admin');

		$group1->addUser($user1);
		$group1->addUser($user2);
		$group1->addUser($user3);
		$group2->addUser($user4);
		$group2->addUser($user5);

		if ($adminGroup !== null) {
			$this->loginAsUser('user6');
			$adminGroup->addUser($user6);
			$adminGroup->addUser($user7);
			$adminUserCount = $adminGroup->count('');
		} else {
			$this->loginAsUser('user1');
			$groupManager->getSubAdmin()->createSubAdmin($user1, $group1);
			$groupManager->getSubAdmin()->createSubAdmin($user1, $group2);
		}

		$group1Count = $group1->count('');
		$group2Count = $group2->count('');

		$groupController = new GroupsController('settings', \OC::$server->getRequest(), $groupManager, \OC::$server->getUserSession());

		if ($adminGroup !== null) {
			$adminGroupsExpect = [['id' => 'admin', 'name' => 'admin', 'userCount' => $adminUserCount]];
		} else {
			$adminGroupsExpect = [];
		}
		$expectedResult = new DataResponse(
			[
				'data' => [
					'adminGroups' => $adminGroupsExpect,
					'groups' => [
						['id' => 'testGroup1', 'name' => 'testGroup1', 'userCount' => $group1Count],
						['id' => 'testGroup2', 'name' => 'testGroup2', 'userCount' => $group2Count]
					]
				]
			]
		);

		$result = $groupController->getGroupsForUser();
		$this->assertEquals($expectedResult, $result);
	}

	public function testGetGroupForNullUser() {
		$this->userSession->method('getUser')
			->willReturn(null);

		$expectedResult = new DataResponse(
			[
				'status' => 'error',
				'data' => [
					'message' => 'User not logged in'
				]
			], Http::STATUS_NOT_FOUND
		);
		$result = $this->groupsController->getGroupsForUser();
		$this->assertEquals($expectedResult, $result);
	}
}
