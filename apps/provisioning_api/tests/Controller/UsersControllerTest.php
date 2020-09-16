<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author michag86 <micha_g@arcor.de>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Tom Needham <tom@owncloud.com>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCA\Provisioning_API\Tests\Controller;

use OC\OCS\Result;
use OCA\Provisioning_API\Controller\UsersController;
use OCP\API;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IUserManager;
use OCP\IUserSession;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;
use OCP\IUser;
use OC\SubAdmin;
use OCP\IGroup;
use OC\Authentication\TwoFactorAuth\Manager;

class UsersControllerTest extends TestCase {
	/** @var IRequest | MockObject */
	protected $request;
	/** @var IUserManager | MockObject */
	protected $userManager;
	/** @var \OC\Group\Manager | MockObject */
	protected $groupManager;
	/** @var IUserSession | MockObject */
	protected $userSession;
	/** @var ILogger | MockObject */
	protected $logger;
	/** @var UsersController | MockObject */
	protected $api;
	/** @var \OC\Authentication\TwoFactorAuth\Manager | MockObject */
	private $twoFactorAuthManager;

	/** @var IUser | MockObject */
	private $loggedInUser;

	protected function setUp(): void {
		parent::setUp();

		$this->request = $this->createMock(IRequest::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->groupManager = $this->getMockBuilder(\OC\Group\Manager::class)
			->disableOriginalConstructor()
			->getMock();
		$this->userSession = $this->createMock(IUserSession::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->twoFactorAuthManager = $this->getMockBuilder(Manager::class)
			->disableOriginalConstructor()
			->setMethods(['isTwoFactorAuthenticated', 'enableTwoFactorAuthentication'])
			->getMock();
		$this->twoFactorAuthManager
			->method('isTwoFactorAuthenticated')
			->willReturn(false);
		$this->api = $this->getMockBuilder(UsersController::class)
			->setConstructorArgs([
				'provisioning_api',
				$this->request,
				$this->userManager,
				$this->groupManager,
				$this->userSession,
				$this->logger,
				$this->twoFactorAuthManager
			])
			->setMethods(['fillStorageInfo'])
			->getMock();
		$this->loggedInUser = $this->createMock(IUser::class);
	}

	public function testGetUsersNotLoggedIn() {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue(null));

		$expected = new Result(null, API::RESPOND_UNAUTHORISED);
		$this->assertEquals($expected, $this->api->getUsers());
	}

	public function testGetUsersAsAdmin() {
		$this->request
			->method('getParam')
			->withConsecutive(['search'], ['limit'], ['offset'])
			->willReturnOnConsecutiveCalls('MyCustomSearch', null, null);

		$this->loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('admin'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->will($this->returnValue(true));
		$this->userManager
			->expects($this->once())
			->method('search')
			->with('MyCustomSearch', null, null)
			->will($this->returnValue(['Admin' => [], 'Foo' => [], 'Bar' => []]));

		$expected = new Result([
			'users' => [
				'Admin',
				'Foo',
				'Bar',
			],
		]);
		$this->assertEquals($expected, $this->api->getUsers());
	}

	public function testGetUsersAsSubAdmin() {
		$this->request
			->method('getParam')
			->withConsecutive(['search'], ['limit'], ['offset'])
			->willReturnOnConsecutiveCalls('MyCustomSearch', null, null);

		$this->loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$firstGroup = $this->createMock(IGroup::class);
		$firstGroup
			->expects($this->once())
			->method('getGID')
			->will($this->returnValue('FirstGroup'));
		$secondGroup = $this->createMock(IGroup::class);
		$secondGroup
			->expects($this->once())
			->method('getGID')
			->will($this->returnValue('SecondGroup'));
		$subAdminManager = $this->asSubAdmin();
		$subAdminManager
			->expects($this->once())
			->method('getSubAdminsGroups')
			->with($this->loggedInUser)
			->will($this->returnValue([$firstGroup, $secondGroup]));
		$this->groupManager
			->method('displayNamesInGroup')
			->will($this->onConsecutiveCalls(['AnotherUserInTheFirstGroup' => []], ['UserInTheSecondGroup' => []]));

		$expected = new Result([
			'users' => [
				'AnotherUserInTheFirstGroup',
				'UserInTheSecondGroup',
			],
		]);
		$this->assertEquals($expected, $this->api->getUsers());
	}

	public function testGetUsersAsRegularUser() {
		$this->request
			->method('getParam')
			->withConsecutive(['search'], ['limit'], ['offset'])
			->willReturnOnConsecutiveCalls('MyCustomSearch', null, null);

		$this->loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('regularUser'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->will($this->returnValue(false));
		$subAdminManager = $this->asSubAdmin(false);
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, API::RESPOND_UNAUTHORISED);
		$this->assertEquals($expected, $this->api->getUsers());
	}

	public function testAddUserAlreadyExisting() {
		$this->request
			->method('getParam')
			->withConsecutive(['userid'], ['password'], ['groups'])
			->willReturnOnConsecutiveCalls('AlreadyExistingUser', null, null);

		$this->userManager
			->expects($this->once())
			->method('userExists')
			->with('AlreadyExistingUser')
			->will($this->returnValue(true));
		$this->logger
			->expects($this->once())
			->method('error')
			->with('Failed addUser attempt: User already exists.', ['app' => 'ocs_api']);

		$this->loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('adminUser'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('adminUser')
			->willReturn(true);

		$expected = new Result(null, 102, 'User already exists');
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserNonExistingGroup() {
		$this->request
			->method('getParam')
			->withConsecutive(['userid'], ['password'], ['groups'])
			->willReturnOnConsecutiveCalls('NewUser', null, ['NonExistingGroup']);

		$this->userManager
			->expects($this->once())
			->method('userExists')
			->with('NewUser')
			->willReturn(false);

		$this->loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('adminUser'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('adminUser')
			->willReturn(true);
		$this->groupManager
			->expects($this->once())
			->method('groupExists')
			->with('NonExistingGroup')
			->willReturn(false);

		$expected = new Result(null, 104, 'group NonExistingGroup does not exist');
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserExistingGroupNonExistingGroup() {
		$this->request
			->method('getParam')
			->withConsecutive(['userid'], ['password'], ['groups'])
			->willReturnOnConsecutiveCalls('NewUser', null, ['ExistingGroup', 'NonExistingGroup']);

		$this->userManager
			->expects($this->once())
			->method('userExists')
			->with('NewUser')
			->willReturn(false);

		$this->loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('adminUser'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('adminUser')
			->willReturn(true);
		$this->groupManager
			->expects($this->exactly(2))
			->method('groupExists')
			->withConsecutive(
				['ExistingGroup'],
				['NonExistingGroup']
			)
			->will($this->returnValueMap([
				['ExistingGroup', true],
				['NonExistingGroup', false]
			]));

		$expected = new Result(null, 104, 'group NonExistingGroup does not exist');
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserSuccessful() {
		$this->request
			->method('getParam')
			->withConsecutive(['userid'], ['password'], ['groups'])
			->willReturnOnConsecutiveCalls('NewUser', 'PasswordOfTheNewUser', null);

		$this->userManager
			->expects($this->once())
			->method('userExists')
			->with('NewUser')
			->will($this->returnValue(false));
		$this->userManager
			->expects($this->once())
			->method('createUser')
			->with('NewUser', 'PasswordOfTheNewUser');
		$this->logger
			->expects($this->once())
			->method('info')
			->with('Successful addUser call with userid: NewUser', ['app' => 'ocs_api']);

		$this->loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('adminUser'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('adminUser')
			->willReturn(true);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserExistingGroup() {
		$this->request
			->method('getParam')
			->withConsecutive(['userid'], ['password'], ['groups'])
			->willReturnOnConsecutiveCalls('NewUser', 'PasswordOfTheNewUser', ['ExistingGroup']);

		$this->userManager
			->expects($this->once())
			->method('userExists')
			->with('NewUser')
			->willReturn(false);

		$this->loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('adminUser'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('adminUser')
			->willReturn(true);
		$this->groupManager
			->expects($this->once())
			->method('groupExists')
			->with('ExistingGroup')
			->willReturn(true);
		$user = $this->createMock(IUser::class);
		$this->userManager
			->expects($this->once())
			->method('createUser')
			->with('NewUser', 'PasswordOfTheNewUser')
			->willReturn($user);
		$group = $this->createMock(IGroup::class);
		$group
			->expects($this->once())
			->method('addUser')
			->with($user);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('ExistingGroup')
			->willReturn($group);
		$this->logger
			->expects($this->exactly(2))
			->method('info')
			->withConsecutive(
				['Successful addUser call with userid: NewUser', ['app' => 'ocs_api']],
				['Added userid NewUser to group ExistingGroup', ['app' => 'ocs_api']]
			);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserUnsuccessful() {
		$this->request
			->method('getParam')
			->withConsecutive(['userid'], ['password'], ['groups'])
			->willReturnOnConsecutiveCalls('NewUser', 'PasswordOfTheNewUser', null);

		$this->userManager
			->expects($this->once())
			->method('userExists')
			->with('NewUser')
			->will($this->returnValue(false));
		$this->userManager
			->expects($this->once())
			->method('createUser')
			->with('NewUser', 'PasswordOfTheNewUser')
			->will($this->throwException(new \Exception('User backend not found.')));
		$this->logger
			->expects($this->once())
			->method('error')
			->with('Failed addUser attempt with exception: User backend not found.', ['app' => 'ocs_api']);

		$this->loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('adminUser'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('adminUser')
			->willReturn(true);

		$expected = new Result(null, 101, 'User backend not found.');
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserAsRegularUser() {
		$this->asSubAdmin(false);
		$this->request
			->method('getParam')
			->withConsecutive(['userid'], ['password'], ['groups'])
			->willReturnOnConsecutiveCalls('NewUser', 'PasswordOfTheNewUser', null);

		$this->loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('regularUser'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('regularUser')
			->willReturn(false);

		$expected = new Result(null, API::RESPOND_UNAUTHORISED);
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserAsSubAdminNoGroup() {
		$this->asSubAdmin();
		$this->request
			->method('getParam')
			->withConsecutive(['userid'], ['password'], ['groups'])
			->willReturnOnConsecutiveCalls('NewUser', 'PasswordOfTheNewUser', null);

		$this->loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('regularUser'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('regularUser')
			->willReturn(false);

		$expected = new Result(null, 106, 'no group specified (required for subadmins)');
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserAsSubAdminValidGroupNotSubAdmin() {
		$this->request
			->method('getParam')
			->withConsecutive(['userid'], ['password'], ['groups'])
			->willReturnOnConsecutiveCalls('NewUser', 'PasswordOfTheNewUser', ['ExistingGroup']);

		$this->loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('regularUser'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('regularUser')
			->willReturn(false);
		$existingGroup = $this->createMock(IGroup::class);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('ExistingGroup')
			->willReturn($existingGroup);
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdmin')
			->with($this->loggedInUser)
			->willReturn(true);
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminOfGroup')
			->with($this->loggedInUser, $existingGroup)
			->willReturn(false);
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->with()
			->willReturn($subAdminManager);
		$this->groupManager
			->expects($this->once())
			->method('groupExists')
			->with('ExistingGroup')
			->willReturn(true);

		$expected = new Result(null, 105, 'insufficient privileges for group ExistingGroup');
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserAsSubAdminExistingGroups() {
		$this->request
			->method('getParam')
			->withConsecutive(['userid'], ['password'], ['groups'])
			->willReturnOnConsecutiveCalls('NewUser', 'PasswordOfTheNewUser', ['ExistingGroup1', 'ExistingGroup2']);

		$this->userManager
			->expects($this->once())
			->method('userExists')
			->with('NewUser')
			->willReturn(false);

		$this->loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('subAdminUser'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('subAdminUser')
			->willReturn(false);
		$this->groupManager
			->expects($this->exactly(2))
			->method('groupExists')
			->withConsecutive(
				['ExistingGroup1'],
				['ExistingGroup2']
			)
			->willReturn(true);
		$user = $this->createMock(IUser::class);
		$this->userManager
			->expects($this->once())
			->method('createUser')
			->with('NewUser', 'PasswordOfTheNewUser')
			->willReturn($user);
		$existingGroup1 = $this->createMock(IGroup::class);
		$existingGroup2 = $this->createMock(IGroup::class);
		$existingGroup1
			->expects($this->once())
			->method('addUser')
			->with($user);
		$existingGroup2
			->expects($this->once())
			->method('addUser')
			->with($user);
		$this->groupManager
			->expects($this->exactly(4))
			->method('get')
			->withConsecutive(
				['ExistingGroup1'],
				['ExistingGroup2'],
				['ExistingGroup1'],
				['ExistingGroup2']
			)
			->will($this->returnValueMap([
				['ExistingGroup1', $existingGroup1],
				['ExistingGroup2', $existingGroup2]
			]));
		$this->logger
			->expects($this->exactly(3))
			->method('info')
			->withConsecutive(
				['Successful addUser call with userid: NewUser', ['app' => 'ocs_api']],
				['Added userid NewUser to group ExistingGroup1', ['app' => 'ocs_api']],
				['Added userid NewUser to group ExistingGroup2', ['app' => 'ocs_api']]
			);
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()->getMock();
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->willReturn($subAdminManager);
		$subAdminManager
			->expects($this->once())
			->method('isSubAdmin')
			->with($this->loggedInUser)
			->willReturn(true);
		$subAdminManager
			->expects($this->exactly(2))
			->method('isSubAdminOfGroup')
			->withConsecutive(
				[$this->loggedInUser, $existingGroup1],
				[$this->loggedInUser, $existingGroup2]
			)
			->willReturn(true);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testGetUserNotLoggedIn() {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue(null));

		$expected = new Result(null, API::RESPOND_UNAUTHORISED);
		$this->assertEquals($expected, $this->api->getUser('UserToGet'));
	}

	public function testGetUserTargetDoesNotExist() {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToGet')
			->will($this->returnValue(null));

		$expected = new Result(null, API::RESPOND_NOT_FOUND, 'The requested user could not be found');
		$this->assertEquals($expected, $this->api->getUser('UserToGet'));
	}

	public function testGetUserAsAdmin() {
		$this->loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('admin'));
		$targetUser = $this->createMock(IUser::class);
		$targetUser->expects($this->once())
			->method('getEMailAddress')
			->willReturn('demo@owncloud.org');
		$targetUser->expects($this->once())
			->method('getHome')
			->willReturn('/var/ocdata/UserToGet');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToGet')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('admin')
			->will($this->returnValue(true));
		$this->api
			->expects($this->once())
			->method('fillStorageInfo')
			->with('UserToGet')
			->will($this->returnValue(['DummyValue']));
		$targetUser
			->expects($this->once())
			->method('getDisplayName')
			->will($this->returnValue('Demo User'));
		$targetUser
			->expects($this->once())
			->method('isEnabled')
			->willReturn('true');

		$expected = new Result(
			[
				'enabled' => 'true',
				'quota' => ['DummyValue', 'definition' => null],
				'email' => 'demo@owncloud.org',
				'displayname' => 'Demo User',
				'home' => '/var/ocdata/UserToGet',
				'two_factor_auth_enabled' => 'false',
			]
		);
		$this->assertEquals($expected, $this->api->getUser('UserToGet'));
	}

	public function testGetUserAsSubAdminAndUserIsAccessible() {
		$this->loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getEMailAddress')
			->willReturn('demo@owncloud.org');
		$targetUser->expects($this->once())
			->method('getHome')
			->willReturn('/var/ocdata/UserToGet');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToGet')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('subadmin')
			->will($this->returnValue(false));
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isUserAccessible')
			->with($this->loggedInUser, $targetUser)
			->will($this->returnValue(true));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));
		$this->api
			->expects($this->once())
			->method('fillStorageInfo')
			->with('UserToGet')
			->will($this->returnValue(['DummyValue']));
		$targetUser
			->expects($this->once())
			->method('getDisplayName')
			->will($this->returnValue('Demo User'));
		$targetUser
			->expects($this->once())
			->method('isEnabled')
			->willReturn('true');

		$expected = new Result(
			[
				'enabled' => 'true',
				'quota' => ['DummyValue', 'definition' => null],
				'email' => 'demo@owncloud.org',
				'home' => '/var/ocdata/UserToGet',
				'displayname' => 'Demo User',
				'two_factor_auth_enabled' => 'false'
			]
		);
		$this->assertEquals($expected, $this->api->getUser('UserToGet'));
	}

	public function testGetUserAsSubAdminAndUserIsNotAccessible() {
		$this->loggedInUser
			->expects($this->exactly(2))
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToGet')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('subadmin')
			->will($this->returnValue(false));
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isUserAccessible')
			->with($this->loggedInUser, $targetUser)
			->will($this->returnValue(false));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, API::RESPOND_UNAUTHORISED);
		$this->assertEquals($expected, $this->api->getUser('UserToGet'));
	}

	public function testGetUserAsSubAdminSelfLookup() {
		$this->loggedInUser
			->expects($this->exactly(2))
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetUser = $this->createMock(IUser::class);
		$targetUser->expects($this->once())
			->method('getHome')
			->willReturn('/var/ocdata/UserToGet');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('subadmin')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('subadmin')
			->will($this->returnValue(false));
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isUserAccessible')
			->with($this->loggedInUser, $targetUser)
			->will($this->returnValue(false));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));
		$this->api
			->expects($this->once())
			->method('fillStorageInfo')
			->with('subadmin')
			->will($this->returnValue(['DummyValue']));
		$targetUser
			->expects($this->once())
			->method('getDisplayName')
			->will($this->returnValue('Subadmin User'));
		$targetUser
			->expects($this->once())
			->method('getEMailAddress')
			->will($this->returnValue('subadmin@owncloud.org'));

		$expected = new Result([
			'quota' => ['DummyValue', 'definition' => null],
			'email' => 'subadmin@owncloud.org',
			'displayname' => 'Subadmin User',
			'home' => '/var/ocdata/UserToGet',
			'two_factor_auth_enabled' => 'false',
		]);
		$this->assertEquals($expected, $this->api->getUser('subadmin'));
	}

	public function testEditUserNotLoggedIn() {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue(null));

		$expected = new Result(null, API::RESPOND_UNAUTHORISED);
		$this->assertEquals($expected, $this->api->editUser('UserToEdit'));
	}

	public function editUserRegularUserSelfEditProvider() {
		return [
			// Changing own display name is allowed
			['display', 'NewDisplayName', 'setDisplayName', 100],
			['displayname', 'NewDisplayName', 'setDisplayName', 100],
			// Changing email is allowed
			['email', 'demo@owncloud.org', 'setEMailAddress', 100],
			// Clearing own email is allowed
			['email', '', 'setEMailAddress', 100],
			// Changing email is blocked when email is invalid
			['email', 'demo.org', '', 102],
			// Changing password is allowed
			['password', 'NewPassword', 'setPassword', 100],
			// Changing quota is NOT allowed
			['quota', 'NewQuota', '', 997],
			// Enabling twofactor is allowed
			['two_factor_auth_enabled', true, 'enableTwoFactorAuthentication', 100],
		];
	}

	/**
	 * @dataProvider editUserRegularUserSelfEditProvider
	 * @param string $attribute
	 * @param string $value
	 * @param string $method
	 * @param int $status
	 */
	public function testEditUserRegularUserSelfEdit($attribute, $value, $method, $status) {
		$uid = 'UserToEdit';
		$this->request
			->method('getParam')
			->withConsecutive(['key'], ['value'])
			->willReturnOnConsecutiveCalls($attribute, $value);

		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue($uid));
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with($uid)
			->will($this->returnValue($targetUser));
		if ($method == 'enableTwoFactorAuthentication') {
			$this->twoFactorAuthManager
				->expects($this->once())
				->method($method);
		} elseif ($status === 100) {
			$targetUser
				->expects($this->once())
				->method($method)
				->with($value);
		}

		$expected = new Result(null, $status);
		$this->assertEquals($expected, $this->api->editUser($uid));
	}

	public function editUserAdminUserSelfEditChangeQuotaProvider() {
		return [
			['3042824', 100],
			['ABC', 103, 'Invalid quota value ABC'],
		];
	}

	/**
	 * @dataProvider editUserAdminUserSelfEditChangeQuotaProvider
	 * @param string $quotaValue
	 * @param int $status
	 * @param string|null $message
	 */
	public function testEditUserAdminUserSelfEditChangeValidQuota($quotaValue, $status, $message = null) {
		$this->request
			->method('getParam')
			->withConsecutive(['key'], ['value'])
			->willReturnOnConsecutiveCalls('quota', $quotaValue);

		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('UserToEdit'));
		$targetUser = $this->createMock(IUser::class);
		if ($status === 100) {
			$targetUser->expects($this->once())
				->method('setQuota')
				->with('2.9 MB');
		}
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('UserToEdit')
			->will($this->returnValue(true));

		$expected = new Result(null, $status, $message);
		$this->assertEquals($expected, $this->api->editUser('UserToEdit'));
	}

	public function providesQuota() {
		return [
			'2.9 MB' => [ '2.9 MB', '3042824'],
			'default' => [ 'default', 'default'],
			'none' => [ 'none', 'none'],
			'0' => [ '0 B', '0'],
		];
	}

	/**
	 * @dataProvider providesQuota
	 * @param $expectedQuotaValueOnSetQuota
	 * @param $valueInRequest
	 */
	public function testEditUserAdminUserEditChangeValidQuota($expectedQuotaValueOnSetQuota, $valueInRequest) {
		$this->request
			->method('getParam')
			->withConsecutive(['key'], ['value'])
			->willReturnOnConsecutiveCalls('quota', $valueInRequest);

		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('admin'));
		$targetUser = $this->createMock(IUser::class);
		$targetUser->expects($this->once())
			->method('setQuota')
			->with($expectedQuotaValueOnSetQuota);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('admin')
			->will($this->returnValue(true));
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->editUser('UserToEdit'));
	}

	public function testEditUserSubadminUserAccessible() {
		$this->request
			->method('getParam')
			->withConsecutive(['key'], ['value'])
			->willReturnOnConsecutiveCalls('quota', '3042824');

		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetUser = $this->createMock(IUser::class);
		$targetUser->expects($this->once())
			->method('setQuota')
			->with('2.9 MB');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->will($this->returnValue($targetUser));
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isUserAccessible')
			->with($this->loggedInUser, $targetUser)
			->will($this->returnValue(true));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->editUser('UserToEdit'));
	}

	public function testEditUserSubadminUserInaccessible() {
		$this->request
			->method('getParam')
			->withConsecutive(['key'], ['value'])
			->willReturnOnConsecutiveCalls('quota', '3042824');

		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->will($this->returnValue($targetUser));
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isUserAccessible')
			->with($this->loggedInUser, $targetUser)
			->will($this->returnValue(false));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->editUser('UserToEdit'));
	}

	public function testDeleteUserNotLoggedIn() {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue(null));

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->deleteUser('UserToDelete'));
	}

	public function testDeleteUserNotExistingUser() {
		$this->asSubAdmin();
		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('UserToEdit'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
			->will($this->returnValue(null));

		$expected = new Result(null, 101);
		$this->assertEquals($expected, $this->api->deleteUser('UserToDelete'));
	}

	public function testDeleteUserSelf() {
		$this->asSubAdmin();
		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('UserToDelete'));
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('UserToDelete'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
			->will($this->returnValue($targetUser));

		$expected = new Result(null, 101);
		$this->assertEquals($expected, $this->api->deleteUser('UserToDelete'));
	}

	public function testDeleteSuccessfulUserAsAdmin() {
		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('admin'));
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('UserToDelete'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->method('isAdmin')
			->with('admin')
			->will($this->returnValue(true));
		$targetUser
			->expects($this->once())
			->method('delete')
			->will($this->returnValue(true));

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->deleteUser('UserToDelete'));
	}

	public function testDeleteUnsuccessfulUserAsAdmin() {
		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('admin'));
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('UserToDelete'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->method('isAdmin')
			->with('admin')
			->will($this->returnValue(true));
		$targetUser
			->expects($this->once())
			->method('delete')
			->will($this->returnValue(false));

		$expected = new Result(null, 101);
		$this->assertEquals($expected, $this->api->deleteUser('UserToDelete'));
	}

	public function testDeleteSuccessfulUserAsSubadmin() {
		$subAdminManager = $this->asSubAdmin();

		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('UserToDelete'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->method('isAdmin')
			->with('subadmin')
			->will($this->returnValue(false));

		$targetUser
			->expects($this->once())
			->method('delete')
			->will($this->returnValue(true));
		$subAdminManager->method('isUserAccessible')
			->with($this->loggedInUser, $targetUser)
			->will($this->returnValue(true));

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->deleteUser('UserToDelete'));
	}

	public function testDeleteUnsuccessfulUserAsSubadmin() {
		$subAdminManager = $this->asSubAdmin();
		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('UserToDelete'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->method('isAdmin')
			->with('subadmin')
			->will($this->returnValue(false));
		$subAdminManager->expects($this->once())
			->method('isUserAccessible')
			->with($this->loggedInUser, $targetUser)
			->will($this->returnValue(true));
		$targetUser
			->expects($this->once())
			->method('delete')
			->will($this->returnValue(false));

		$expected = new Result(null, 101);
		$this->assertEquals($expected, $this->api->deleteUser('UserToDelete'));
	}

	public function testDeleteUserAsSubAdminAndUserIsNotAccessible() {
		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('UserToDelete'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
			->will($this->returnValue($targetUser));
		$subAdminManager = $this->asSubAdmin();
		$subAdminManager
			->expects($this->once())
			->method('isUserAccessible')
			->with($this->loggedInUser, $targetUser)
			->will($this->returnValue(false));

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->deleteUser('UserToDelete'));
	}

	public function testGetUsersGroupsNotLoggedIn() {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue(null));

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->getUsersGroups('UserToLookup'));
	}

	public function testGetUsersGroupsTargetUserNotExisting() {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));

		$expected = new Result(null, 998);
		$this->assertEquals($expected, $this->api->getUsersGroups('UserToLookup'));
	}

	public function testGetUsersGroupsSelfTargetted() {
		$this->loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('UserToLookup'));
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('UserToLookup'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToLookup')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('getUserGroupIds')
			->with($targetUser)
			->will($this->returnValue(['DummyValue']));

		$expected = new Result(['groups' => ['DummyValue']]);
		$this->assertEquals($expected, $this->api->getUsersGroups('UserToLookup'));
	}

	public function testGetUsersGroupsForAdminUser() {
		$this->loggedInUser
			->expects($this->exactly(2))
			->method('getUID')
			->will($this->returnValue('admin'));
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('UserToLookup'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToLookup')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('getUserGroupIds')
			->with($targetUser)
			->will($this->returnValue(['DummyValue']));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('admin')
			->will($this->returnValue(true));

		$expected = new Result(['groups' => ['DummyValue']]);
		$this->assertEquals($expected, $this->api->getUsersGroups('UserToLookup'));
	}

	public function testGetUsersGroupsForSubAdminUserAndUserIsAccessible() {
		$this->loggedInUser
			->expects($this->exactly(2))
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('UserToLookup'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToLookup')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('subadmin')
			->will($this->returnValue(false));
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isUserAccessible')
			->with($this->loggedInUser, $targetUser)
			->will($this->returnValue(true));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));
		$group1 = $this->createMock(IGroup::class);
		$group1
			->method('getGID')
			->will($this->returnValue('Group1'));
		$group2 = $this->createMock(IGroup::class);
		$group2
			->method('getGID')
			->will($this->returnValue('Group2'));
		$subAdminManager
			->expects($this->once())
			->method('getSubAdminsGroups')
			->with($this->loggedInUser)
			->will($this->returnValue([$group1, $group2]));
		$this->groupManager
			->method('getUserGroupIds')
			->with($targetUser)
			->will($this->returnValue(['Group1']));

		$expected = new Result(['groups' => ['Group1']]);
		$this->assertEquals($expected, $this->api->getUsersGroups('UserToLookup'));
	}

	public function testGetUsersGroupsForSubAdminUserAndUserIsInaccessible() {
		$this->loggedInUser
			->expects($this->exactly(2))
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('UserToLookup'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToLookup')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('subadmin')
			->will($this->returnValue(false));
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isUserAccessible')
			->with($this->loggedInUser, $targetUser)
			->will($this->returnValue(false));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));
		$this->groupManager
			->method('getUserGroupIds')
			->with($targetUser)
			->will($this->returnValue(['Group1']));

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->getUsersGroups('UserToLookup'));
	}

	public function testAddToGroupNotLoggedIn() {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue(null));

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->addToGroup([]));
	}

	public function testAddToGroupWithTargetGroupNotExisting() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('GroupToAddTo');

		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$subAdminManager = $this->asSubAdmin();
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('GroupToAddTo')
			->will($this->returnValue(null));

		$expected = new Result(null, 102);
		$this->assertEquals($expected, $this->api->addToGroup('TargetUser'));
	}

	public function testAddToGroupWithNoGroupSpecified() {
		$this->asSubAdmin();
		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('admin'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));

		$expected = new Result(null, 101);
		$this->assertEquals($expected, $this->api->addToGroup('TargetUser'));
	}

	public function testAddToGroupWithTargetUserNotExisting() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('GroupToAddTo');

		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('admin'));
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('GroupToAddTo')
			->will($this->returnValue($targetGroup));
		$this->groupManager
			->method('isAdmin')
			->with('admin')
			->will($this->returnValue(true));

		$expected = new Result(null, 103);
		$this->assertEquals($expected, $this->api->addToGroup('TargetUser'));
	}

	public function testAddToGroupWithoutPermission() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('GroupToAddTo');

		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('unauthorizedUser'));
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->method('get')
			->with('GroupToAddTo')
			->will($this->returnValue($targetGroup));
		$this->groupManager
			->method('getSubAdmin')
			->will($this->returnValue($this->asSubAdmin()));
		$this->groupManager
			->method('isAdmin')
			->with('unauthorizedUser')
			->will($this->returnValue(false));

		$expected = new Result(null, 104);
		$this->assertEquals($expected, $this->api->addToGroup('TargetUser'));
	}

	public function testAddToOutsideGroupAsSubAdminFromSubAdmin() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('outsidegroup');

		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$subadminGroup = $this->createMock(IGroup::class);
		$subadminGroup
			->method('getGID')
			->will($this->returnValue('subadmin'));
		$targetGroup = $this->createMock(IGroup::class);
		$targetGroup
			->method('getGID')
			->will($this->returnValue('outsidegroup'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->method('get')
			->will($this->returnValueMap([
				['subadmin', $subadminGroup],
				['outsidegroup', $targetGroup]
			]));
		$subAdminManager = $this->asSubAdmin();
		$subAdminManager
			->method('isSubAdminofGroup')
			->with($this->loggedInUser, $targetGroup)
			->will($this->returnValue(false));
		$this->groupManager
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));
		$this->groupManager
			->method('isAdmin')
			->with('subadmin')
			->will($this->returnValue(false));

		$expected = new Result(null, 104);
		$this->assertEquals($expected, $this->api->addToGroup('subadmin'));
	}

	public function testAddToGroupSuccessful() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('admin');

		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('admin'));
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('admin')
			->will($this->returnValue($targetGroup));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('AnotherUser')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->method('isAdmin')
			->with('admin')
			->will($this->returnValue(true));
		$targetGroup
			->expects($this->once())
			->method('addUser')
			->with($targetUser);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->addToGroup('AnotherUser'));
	}

	public function testAddToGroupSuccessfulAsSubadmin() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('group1');

		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->method('get')
			->with('group1')
			->will($this->returnValue($targetGroup));
		$this->userManager
			->method('get')
			->with('AnotherUser')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->method('isAdmin')
			->with('subadmin')
			->will($this->returnValue(false));
		$targetGroup
			->method('addUser')
			->with($targetUser);
		$subAdminManager = $this->asSubAdmin();
		$subAdminManager
			->method('isSubAdminOfGroup')
			->with($this->loggedInUser, $targetGroup)
			->will($this->returnValue(true));
		$this->groupManager
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, 104);
		$this->assertEquals($expected, $this->api->addToGroup('AnotherUser'));
	}

	public function testRemoveFromGroupWithoutLogIn() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('TargetGroup');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue(null));

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->removeFromGroup('TargetUser'));
	}

	public function testRemoveFromGroupWithNoTargetGroup() {
		$this->asSubAdmin();

		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$expected = new Result(null, 101);
		$this->assertEquals($expected, $this->api->removeFromGroup('TargetUser'));
	}

	public function testRemoveFromGroupWithNotExistingTargetGroup() {
		$this->asSubAdmin();
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('TargetGroup');

		$this->userSession
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->method('get')
			->with('TargetGroup')
			->will($this->returnValue(null));

		$expected = new Result(null, 102);
		$this->assertEquals($expected, $this->api->removeFromGroup('TargetUser'));
	}

	public function testRemoveFromGroupWithNotExistingTargetUser() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('TargetGroup');

		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('TargetGroup')
			->will($this->returnValue($targetGroup));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('TargetUser')
			->will($this->returnValue(null));
		$this->groupManager
			->method('isAdmin')
			->with('subadmin')
			->will($this->returnValue(false));
		$subAdminManager = $this->asSubAdmin();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminofGroup')
			->with($this->loggedInUser, $targetGroup)
			->will($this->returnValue(true));

		$expected = new Result(null, 103);
		$this->assertEquals($expected, $this->api->removeFromGroup('TargetUser'));
	}

	public function testRemoveFromGroupWithoutPermission() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('TargetGroup');

		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('unauthorizedUser'));
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('TargetGroup')
			->will($this->returnValue($targetGroup));
		$subAdminManager = $this->asSubAdmin();
		$this->groupManager
			->method('isAdmin')
			->with('unauthorizedUser')
			->will($this->returnValue(false));

		$expected = new Result(null, 104);
		$this->assertEquals($expected, $this->api->removeFromGroup('TargetUser'));
	}

	public function testRemoveFromGroupAsAdminFromAdmin() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('admin');

		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('admin'));
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$targetGroup
			->expects($this->once())
			->method('getGID')
			->will($this->returnValue('admin'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('admin')
			->will($this->returnValue($targetGroup));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('admin')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->method('isAdmin')
			->with('admin')
			->will($this->returnValue(true));

		$expected = new Result(null, 105, 'Cannot remove yourself from the admin group');
		$this->assertEquals($expected, $this->api->removeFromGroup('admin'));
	}

	public function testRemoveFromGroupAsSubAdminFromSubAdmin() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('subadmin');

		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$targetGroup
			->method('getGID')
			->will($this->returnValue('subadmin'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('subadmin')
			->will($this->returnValue($targetGroup));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('subadmin')
			->will($this->returnValue($targetUser));
		$subAdminManager = $this->asSubAdmin();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminofGroup')
			->with($this->loggedInUser, $targetGroup)
			->will($this->returnValue(true));
		$subAdminManager
			->expects($this->once())
			->method('getSubAdminsGroups')
			->with($this->loggedInUser)
			->will($this->returnValue([$targetGroup]));
		$this->groupManager
			->method('isAdmin')
			->with('subadmin')
			->will($this->returnValue(false));

		$expected = new Result(null, 105, 'Cannot remove yourself from this group as you are a SubAdmin');
		$this->assertEquals($expected, $this->api->removeFromGroup('subadmin'));
	}

	public function testRemoveFromGroupSuccessful() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('admin');
		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('admin'));
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('admin')
			->will($this->returnValue($targetGroup));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('AnotherUser')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->method('isAdmin')
			->with('admin')
			->will($this->returnValue(true));
		$targetGroup
			->expects($this->once())
			->method('removeUser')
			->with($targetUser);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->removeFromGroup('AnotherUser'));
	}

	public function testRemoveFromGroupSuccessfulAsSubadmin() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('group1');
		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('group1')
			->will($this->returnValue($targetGroup));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('AnotherUser')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->method('isAdmin')
			->with('subadmin')
			->will($this->returnValue(false));
		$targetGroup
			->expects($this->once())
			->method('removeUser')
			->with($targetUser);
		$subAdminManager = $this->asSubAdmin();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminOfGroup')
			->with($this->loggedInUser, $targetGroup)
			->will($this->returnValue(true));

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->removeFromGroup('AnotherUser'));
	}

	public function testAddSubAdminWithNotExistingTargetUser() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('nevermind');
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('NotExistingUser')
			->will($this->returnValue(null));

		$expected = new Result(null, 101, 'User does not exist');
		$this->assertEquals($expected, $this->api->addSubAdmin('NotExistingUser'));
	}

	public function testAddSubAdminWithNotExistingTargetGroup() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('NotExistingGroup');
		$targetUser = $this->createMock(IUser::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ExistingUser')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('NotExistingGroup')
			->will($this->returnValue(null));

		$expected = new Result(null, 102, 'Group:NotExistingGroup does not exist');
		$this->assertEquals($expected, $this->api->addSubAdmin('ExistingUser'));
	}

	public function testAddSubAdminToAdminGroup() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('ADmiN');

		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ExistingUser')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('ADmiN')
			->will($this->returnValue($targetGroup));

		$expected = new Result(null, 103, 'Cannot create subadmins for admin group');
		$this->assertEquals($expected, $this->api->addSubAdmin('ExistingUser'));
	}

	public function testAddSubAdminTwice() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('TargetGroup');

		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ExistingUser')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('TargetGroup')
			->will($this->returnValue($targetGroup));
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminOfGroup')
			->with($targetUser, $targetGroup)
			->will($this->returnValue(true));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->addSubAdmin('ExistingUser'));
	}

	public function testAddSubAdminSuccessful() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('TargetGroup');

		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ExistingUser')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('TargetGroup')
			->will($this->returnValue($targetGroup));
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminOfGroup')
			->with($targetUser, $targetGroup)
			->will($this->returnValue(false));
		$subAdminManager
			->expects($this->once())
			->method('createSubAdmin')
			->with($targetUser, $targetGroup)
			->will($this->returnValue(true));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->addSubAdmin('ExistingUser'));
	}

	public function testAddSubAdminUnsuccessful() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('TargetGroup');

		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ExistingUser')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('TargetGroup')
			->will($this->returnValue($targetGroup));
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminOfGroup')
			->with($targetUser, $targetGroup)
			->will($this->returnValue(false));
		$subAdminManager
			->expects($this->once())
			->method('createSubAdmin')
			->with($targetUser, $targetGroup)
			->will($this->returnValue(false));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, 103, 'Unknown error occurred');
		$this->assertEquals($expected, $this->api->addSubAdmin('ExistingUser'));
	}

	public function testRemoveSubAdminNotExistingTargetUser() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('GroupToDeleteFrom');
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('NotExistingUser')
			->will($this->returnValue(null));

		$expected = new Result(null, 101, 'User does not exist');
		$this->assertEquals($expected, $this->api->removeSubAdmin('NotExistingUser'));
	}

	public function testRemoveSubAdminNotExistingTargetGroup() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('GroupToDeleteFrom');
		$targetUser = $this->createMock(IUser::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ExistingUser')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('GroupToDeleteFrom')
			->will($this->returnValue(null));

		$expected = new Result(null, 101, 'Group does not exist');
		$this->assertEquals($expected, $this->api->removeSubAdmin('ExistingUser'));
	}

	public function testRemoveSubAdminFromNotASubadmin() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('GroupToDeleteFrom');
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ExistingUser')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('GroupToDeleteFrom')
			->will($this->returnValue($targetGroup));
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminOfGroup')
			->with($targetUser, $targetGroup)
			->will($this->returnValue(false));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, 102, 'User is not a subadmin of this group');
		$this->assertEquals($expected, $this->api->removeSubAdmin('ExistingUser'));
	}

	public function testRemoveSubAdminSuccessful() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('GroupToDeleteFrom');
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ExistingUser')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('GroupToDeleteFrom')
			->will($this->returnValue($targetGroup));
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminOfGroup')
			->with($targetUser, $targetGroup)
			->will($this->returnValue(true));
		$subAdminManager
			->expects($this->once())
			->method('deleteSubAdmin')
			->with($targetUser, $targetGroup)
			->will($this->returnValue(true));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->removeSubAdmin('ExistingUser'));
	}

	public function testRemoveSubAdminUnsuccessful() {
		$this->request->method('getParam')
			->with('groupid')
			->willReturn('GroupToDeleteFrom');
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ExistingUser')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('GroupToDeleteFrom')
			->will($this->returnValue($targetGroup));
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminOfGroup')
			->with($targetUser, $targetGroup)
			->will($this->returnValue(true));
		$subAdminManager
			->expects($this->once())
			->method('deleteSubAdmin')
			->with($targetUser, $targetGroup)
			->will($this->returnValue(false));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, 103, 'Unknown error occurred');
		$this->assertEquals($expected, $this->api->removeSubAdmin('ExistingUser'));
	}

	public function testGetUserSubAdminGroupsNotExistingTargetUser() {
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('RequestedUser')
			->will($this->returnValue(null));

		$expected = new Result(null, 101, 'User does not exist');
		$this->assertEquals($expected, $this->api->getUserSubAdminGroups('RequestedUser'));
	}

	public function testGetUserSubAdminGroupsWithGroups() {
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$targetGroup
			->expects($this->once())
			->method('getGID')
			->will($this->returnValue('TargetGroup'));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('RequestedUser')
			->will($this->returnValue($targetUser));
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->expects($this->once())
			->method('getSubAdminsGroups')
			->with($targetUser)
			->will($this->returnValue([$targetGroup]));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(['TargetGroup'], 100);
		$this->assertEquals($expected, $this->api->getUserSubAdminGroups('RequestedUser'));
	}

	public function testGetUserSubAdminGroupsWithoutGroups() {
		$targetUser = $this->createMock(IUser::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('RequestedUser')
			->will($this->returnValue($targetUser));
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->expects($this->once())
			->method('getSubAdminsGroups')
			->with($targetUser)
			->will($this->returnValue([]));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, 102, 'Unknown error occurred');
		$this->assertEquals($expected, $this->api->getUserSubAdminGroups('RequestedUser'));
	}

	public function testEnableUser() {
		$targetUser = $this->createMock(IUser::class);
		$targetUser->expects($this->once())
			->method('setEnabled')
			->with(true);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('RequestedUser')
			->will($this->returnValue($targetUser));

		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('admin'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->method('isAdmin')
			->will($this->returnValue(true));

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->enableUser('RequestedUser'));
	}

	public function testDisableUser() {
		$targetUser = $this->createMock(IUser::class);
		$targetUser->expects($this->once())
			->method('setEnabled')
			->with(false);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('RequestedUser')
			->will($this->returnValue($targetUser));

		$this->loggedInUser
			->method('getUID')
			->will($this->returnValue('admin'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($this->loggedInUser));
		$this->groupManager
			->method('isAdmin')
			->will($this->returnValue(true));

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->disableUser('RequestedUser'));
	}

	private function asSubAdmin($isSubAdmin = true) {
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		$subAdminManager
			->method('isSubAdmin')
			->will($this->returnValue($isSubAdmin));
		$this->groupManager
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		if ($isSubAdmin === true) {
			$this->groupManager
				->method('isAdmin')
				->will($this->returnValue(false));
		}
		return $subAdminManager;
	}
}
