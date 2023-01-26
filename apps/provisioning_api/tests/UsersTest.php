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

namespace OCA\Provisioning_API\Tests;

use OC\OCS\Result;
use OCA\Provisioning_API\Users;
use OCP\API;
use OCP\ILogger;
use OCP\IUserManager;
use OCP\IUserSession;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase as OriginalTest;
use OCP\IUser;
use OC\SubAdmin;
use OCP\IGroup;
use OC\Authentication\TwoFactorAuth\Manager;
use OCP\IConfig;

class UsersTest extends OriginalTest {
	/** @var IUserManager | MockObject */
	protected $userManager;
	/** @var \OC\Group\Manager | MockObject */
	protected $groupManager;
	/** @var IUserSession | MockObject */
	protected $userSession;
	/** @var ILogger | MockObject */
	protected $logger;
	/** @var IConfig | MockObject */
	protected $config;
	/** @var Users | MockObject */
	protected $api;
	/** @var \OC\Authentication\TwoFactorAuth\Manager | MockObject */
	private $twoFactorAuthManager;

	protected function tearDown(): void {
		$_GET = null;
		$_POST = null;
		parent::tearDown();
	}

	protected function setUp(): void {
		parent::setUp();

		$this->userManager = $this->createMock(IUserManager::class);
		$this->groupManager = $this->getMockBuilder(\OC\Group\Manager::class)
			->disableOriginalConstructor()
			->getMock();
		$this->userSession = $this->createMock(IUserSession::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->config = $this->createMock(IConfig::class);
		$this->twoFactorAuthManager = $this->getMockBuilder(Manager::class)
			->disableOriginalConstructor()
			->setMethods(['isTwoFactorAuthenticated', 'enableTwoFactorAuthentication'])
			->getMock();
		$this->twoFactorAuthManager
			->method('isTwoFactorAuthenticated')
			->willReturn(false);
		$this->api = $this->getMockBuilder(Users::class)
			->setConstructorArgs([
				$this->userManager,
				$this->groupManager,
				$this->userSession,
				$this->logger,
				$this->config,
				$this->twoFactorAuthManager
			])
			->setMethods(['fillStorageInfo'])
			->getMock();
	}

	private function setupBasicSubadminMock($onceOnly = true) {
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()
			->getMock();
		if ($onceOnly) {
			$numberOfCalls = $this->once();
		} else {
			$numberOfCalls = $this->any();
		}
		$this->groupManager
			->expects($numberOfCalls)
			->method('getSubAdmin')
			->willReturn($subAdminManager);
		return $subAdminManager;
	}

	private function setupIsUserAccessibleMock($loggedInUser, $targetUser, $isUserAccessible) {
		$subAdminManager = $this->setupBasicSubadminMock();
		$subAdminManager
			->expects($this->once())
			->method('isUserAccessible')
			->with($loggedInUser, $targetUser)
			->willReturn($isUserAccessible);
		return $subAdminManager;
	}

	private function setupIsSubadminMock($loggedInUser, $isUserASubadmin = true) {
		$subAdminManager = $this->setupBasicSubadminMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdmin')
			->with($loggedInUser)
			->willReturn($isUserASubadmin);
		return $subAdminManager;
	}

	public function testGetUsersNotLoggedIn(): void {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn(null);

		$expected = new Result(null, API::RESPOND_UNAUTHORISED);
		$this->assertEquals($expected, $this->api->getUsers());
	}

	public function testGetUsersAsAdmin(): void {
		$_GET['search'] = 'MyCustomSearch';

		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->willReturn('admin');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->willReturn(true);
		$this->userManager
			->expects($this->once())
			->method('search')
			->with('MyCustomSearch', null, null)
			->willReturn(['Admin' => [], 'Foo' => [], 'Bar' => []]);

		$expected = new Result([
			'users' => [
				'Admin',
				'Foo',
				'Bar',
			],
		]);
		$this->assertEquals($expected, $this->api->getUsers());
	}

	public function testGetUsersAsSubAdmin(): void {
		$_GET['search'] = 'MyCustomSearch';

		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->willReturn('subadmin');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->willReturn(false);
		$firstGroup = $this->createMock(IGroup::class);
		$firstGroup
			->expects($this->once())
			->method('getGID')
			->willReturn('FirstGroup');
		$secondGroup = $this->createMock(IGroup::class);
		$secondGroup
			->expects($this->once())
			->method('getGID')
			->willReturn('SecondGroup');
		$subAdminManager = $this->setupIsSubadminMock($loggedInUser);
		$subAdminManager
			->expects($this->once())
			->method('getSubAdminsGroups')
			->with($loggedInUser)
			->willReturn([$firstGroup, $secondGroup]);
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

	public function testGetUsersAsRegularUser(): void {
		$_GET['search'] = 'MyCustomSearch';

		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->willReturn('regularUser');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->willReturn(false);
		$this->setupIsSubadminMock($loggedInUser, false);

		$expected = new Result(null, API::RESPOND_UNAUTHORISED);
		$this->assertEquals($expected, $this->api->getUsers());
	}

	public function testAddUserAlreadyExisting(): void {
		$_POST['userid'] = 'AlreadyExistingUser';
		$this->userManager
			->expects($this->once())
			->method('userExists')
			->with('AlreadyExistingUser')
			->willReturn(true);
		$this->logger
			->expects($this->once())
			->method('error')
			->with('Failed addUser attempt: User already exists.', ['app' => 'ocs_api']);
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->willReturn('adminUser');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('adminUser')
			->willReturn(true);

		$expected = new Result(null, 102, 'User already exists');
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserNonExistingGroup(): void {
		$_POST['userid'] = 'NewUser';
		$_POST['groups'] = ['NonExistingGroup'];
		$this->userManager
			->expects($this->once())
			->method('userExists')
			->with('NewUser')
			->willReturn(false);
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->willReturn('adminUser');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
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

	public function testAddUserExistingGroupNonExistingGroup(): void {
		$_POST['userid'] = 'NewUser';
		$_POST['groups'] = ['ExistingGroup', 'NonExistingGroup'];
		$this->userManager
			->expects($this->once())
			->method('userExists')
			->with('NewUser')
			->willReturn(false);
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->willReturn('adminUser');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
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
			->willReturnMap([
				['ExistingGroup', true],
				['NonExistingGroup', false]
			]);

		$expected = new Result(null, 104, 'group NonExistingGroup does not exist');
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserSuccessful(): void {
		$_POST['userid'] = 'NewUser';
		$_POST['password'] = 'PasswordOfTheNewUser';
		$this->userManager
			->expects($this->once())
			->method('userExists')
			->with('NewUser')
			->willReturn(false);
		$this->userManager
			->expects($this->once())
			->method('createUser')
			->with('NewUser', 'PasswordOfTheNewUser');
		$this->logger
			->expects($this->once())
			->method('info')
			->with('Successful addUser call with userid: NewUser', ['app' => 'ocs_api']);
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->willReturn('adminUser');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('adminUser')
			->willReturn(true);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserExistingGroup(): void {
		$_POST['userid'] = 'NewUser';
		$_POST['password'] = 'PasswordOfTheNewUser';
		$_POST['groups'] = ['ExistingGroup'];
		$this->userManager
			->expects($this->once())
			->method('userExists')
			->with('NewUser')
			->willReturn(false);
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->willReturn('adminUser');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
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

	public function testAddUserUnsuccessful(): void {
		$_POST['userid'] = 'NewUser';
		$_POST['password'] = 'PasswordOfTheNewUser';
		$this->userManager
			->expects($this->once())
			->method('userExists')
			->with('NewUser')
			->willReturn(false);
		$this->userManager
			->expects($this->once())
			->method('createUser')
			->with('NewUser', 'PasswordOfTheNewUser')
			->will($this->throwException(new \Exception('User backend not found.')));
		$this->logger
			->expects($this->once())
			->method('error')
			->with('Failed addUser attempt with exception: User backend not found.', ['app' => 'ocs_api']);
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->willReturn('adminUser');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('adminUser')
			->willReturn(true);

		$expected = new Result(null, 101, 'User backend not found.');
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserAsRegularUser(): void {
		$_POST['userid'] = 'NewUser';
		$_POST['password'] = 'PasswordOfTheNewUser';
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->willReturn('regularUser');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('regularUser')
			->willReturn(false);
		$this->setupIsSubadminMock($loggedInUser, false);

		$expected = new Result(null, API::RESPOND_UNAUTHORISED);
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserAsSubAdminNoGroup(): void {
		$_POST['userid'] = 'NewUser';
		$_POST['password'] = 'PasswordOfTheNewUser';
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->willReturn('regularUser');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('regularUser')
			->willReturn(false);
		$this->setupIsSubadminMock($loggedInUser);

		$expected = new Result(null, 106, 'no group specified (required for subadmins)');
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserAsSubAdminValidGroupNotSubAdmin(): void {
		$_POST['userid'] = 'NewUser';
		$_POST['password'] = 'PasswordOfTheNewUser';
		$_POST['groups'] = ['ExistingGroup'];
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->willReturn('regularUser');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
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
		$subAdminManager = $this->setupIsSubadminMock($loggedInUser);
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminOfGroup')
			->with($loggedInUser, $existingGroup)
			->willReturn(false);
		$this->groupManager
			->expects($this->once())
			->method('groupExists')
			->with('ExistingGroup')
			->willReturn(true);

		$expected = new Result(null, 105, 'insufficient privileges for group ExistingGroup');
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserAsSubAdminExistingGroups(): void {
		$_POST['userid'] = 'NewUser';
		$_POST['password'] = 'PasswordOfTheNewUser';
		$_POST['groups'] = ['ExistingGroup1', 'ExistingGroup2'];
		$this->userManager
			->expects($this->once())
			->method('userExists')
			->with('NewUser')
			->willReturn(false);
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->willReturn('subAdminUser');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
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
			->willReturnMap([
				['ExistingGroup1', $existingGroup1],
				['ExistingGroup2', $existingGroup2]
			]);
		$this->logger
			->expects($this->exactly(3))
			->method('info')
			->withConsecutive(
				['Successful addUser call with userid: NewUser', ['app' => 'ocs_api']],
				['Added userid NewUser to group ExistingGroup1', ['app' => 'ocs_api']],
				['Added userid NewUser to group ExistingGroup2', ['app' => 'ocs_api']]
			);
		$subAdminManager = $this->setupIsSubadminMock($loggedInUser);
		$subAdminManager
			->expects($this->exactly(2))
			->method('isSubAdminOfGroup')
			->withConsecutive(
				[$loggedInUser, $existingGroup1],
				[$loggedInUser, $existingGroup2]
			)
			->willReturn(true);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testGetUserNotLoggedIn(): void {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn(null);

		$expected = new Result(null, API::RESPOND_UNAUTHORISED);
		$this->assertEquals($expected, $this->api->getUser(['userid' => 'UserToGet']));
	}

	public function testGetUserTargetDoesNotExist(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToGet')
			->willReturn(null);

		$expected = new Result(null, API::RESPOND_NOT_FOUND, 'The requested user could not be found');
		$this->assertEquals($expected, $this->api->getUser(['userid' => 'UserToGet']));
	}

	public function testGetUserAsAdmin(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->willReturn('admin');
		$targetUser = $this->createMock(IUser::class);
		$targetUser->expects($this->once())
			->method('getEMailAddress')
			->willReturn('demo@owncloud.com');
		$targetUser->expects($this->once())
			->method('getHome')
			->willReturn('/var/ocdata/UserToGet');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToGet')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('admin')
			->willReturn(true);
		$this->api
			->expects($this->once())
			->method('fillStorageInfo')
			->with('UserToGet')
			->willReturn(['DummyValue']);
		$targetUser
			->method('getUID')
			->willReturn('UserToGet');
		$targetUser
			->expects($this->once())
			->method('getDisplayName')
			->willReturn('Demo User');
		$targetUser
			->expects($this->once())
			->method('isEnabled')
			->willReturn('true');
		$targetUser
			->expects($this->once())
			->method('getLastLogin')
			->willReturn('1618230656');
		$targetUser
			->expects($this->once())
			->method('getCreationTime')
			->willReturn('1674507398');
		$this->config
			->expects($this->once())
			->method('getUserValue')
			->with($targetUser->getUID(), 'core', 'lang')
			->willReturn('de');

		$expected = new Result(
			[
				'enabled' => 'true',
				'quota' => ['DummyValue', 'definition' => null],
				'email' => 'demo@owncloud.com',
				'displayname' => 'Demo User',
				'home' => '/var/ocdata/UserToGet',
				'two_factor_auth_enabled' => 'false',
				'last_login' => '1618230656',
				'creation_time' => '1674507398',
				'language' => 'de'
			]
		);
		$this->assertEquals($expected, $this->api->getUser(['userid' => 'UserToGet']));
	}

	public function testGetUserAsSubAdminAndUserIsAccessible(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->willReturn('subadmin');
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getEMailAddress')
			->willReturn('demo@owncloud.com');
		$targetUser->expects($this->once())
			->method('getHome')
			->willReturn('/var/ocdata/UserToGet');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToGet')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('subadmin')
			->willReturn(false);
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, true);
		$this->api
			->expects($this->once())
			->method('fillStorageInfo')
			->with('UserToGet')
			->willReturn(['DummyValue']);
		$targetUser
			->expects($this->once())
			->method('getDisplayName')
			->willReturn('Demo User');
		$targetUser
			->method('getUID')
			->willReturn('UserToGet');
		$targetUser
			->expects($this->once())
			->method('isEnabled')
			->willReturn('true');
		$targetUser
			->expects($this->once())
			->method('getLastLogin')
			->willReturn('1618230656');
		$targetUser
			->expects($this->once())
			->method('getCreationTime')
			->willReturn('1674507398');
		$this->config
			->expects($this->once())
			->method('getUserValue')
			->with($targetUser->getUID(), 'core', 'lang')
			->willReturn('de');

		$expected = new Result(
			[
				'enabled' => 'true',
				'quota' => ['DummyValue', 'definition' => null],
				'email' => 'demo@owncloud.com',
				'home' => '/var/ocdata/UserToGet',
				'displayname' => 'Demo User',
				'two_factor_auth_enabled' => 'false',
				'last_login' => '1618230656',
				'creation_time' => '1674507398',
				'language' => 'de'
			]
		);
		$this->assertEquals($expected, $this->api->getUser(['userid' => 'UserToGet']));
	}

	public function testGetUserAsSubAdminAndUserIsNotAccessible(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->exactly(2))
			->method('getUID')
			->willReturn('subadmin');
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToGet')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('subadmin')
			->willReturn(false);
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, false);

		$expected = new Result(null, API::RESPOND_UNAUTHORISED);
		$this->assertEquals($expected, $this->api->getUser(['userid' => 'UserToGet']));
	}

	public function testGetUserAsSubAdminSelfLookup(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->exactly(2))
			->method('getUID')
			->willReturn('subadmin');
		$targetUser = $this->createMock(IUser::class);
		$targetUser->expects($this->once())
			->method('getHome')
			->willReturn('/var/ocdata/UserToGet');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('subadmin')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('subadmin')
			->willReturn(false);
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, false);
		$this->api
			->expects($this->once())
			->method('fillStorageInfo')
			->with('subadmin')
			->willReturn(['DummyValue']);
		$targetUser
			->expects($this->once())
			->method('getDisplayName')
			->willReturn('Subadmin User');
		$targetUser
			->method('getUID')
			->willReturn('subadmin');
		$targetUser
			->expects($this->once())
			->method('getEMailAddress')
			->willReturn('subadmin@owncloud.com');
		$targetUser
			->expects($this->once())
			->method('getLastLogin')
			->willReturn('1618230656');
		$targetUser
			->expects($this->once())
			->method('getCreationTime')
			->willReturn('1674507398');
		$this->config
			->expects($this->once())
			->method('getUserValue')
			->with($targetUser->getUID(), 'core', 'lang')
			->willReturn('de');

		$expected = new Result([
			'quota' => ['DummyValue', 'definition' => null],
			'email' => 'subadmin@owncloud.com',
			'displayname' => 'Subadmin User',
			'home' => '/var/ocdata/UserToGet',
			'two_factor_auth_enabled' => 'false',
			'last_login' => '1618230656',
			'creation_time' => '1674507398',
			'language' => 'de'
		]);
		$this->assertEquals($expected, $this->api->getUser(['userid' => 'subadmin']));
	}

	public function testEditUserNotLoggedIn(): void {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn(null);

		$expected = new Result(null, API::RESPOND_UNAUTHORISED);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit']));
	}

	public function testEditUserRegularUserSelfEditChangeDisplay(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('UserToEdit');
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->willReturn($targetUser);
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, false);
		$targetUser
			->expects($this->once())
			->method('setDisplayName')
			->with('NewDisplayName');

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'display', 'value' => 'NewDisplayName']]));
	}

	public function testEditUserRegularUserSelfEditChangeDisplayName(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('UserToEdit');
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->willReturn($targetUser);
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, false);
		$targetUser
			->expects($this->once())
			->method('setDisplayName')
			->with('NewDisplayName');

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'displayname', 'value' => 'NewDisplayName']]));
	}

	public function testEditUserRegularUserSelfEditChangeDisplaynameProhibited(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('UserToEdit');
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->method('get')
			->with('UserToEdit')
			->willReturn($targetUser);
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, false);
		$this->config
			->method('getSystemValue')
			->withConsecutive(
				['allow_user_to_change_mail_address'],
				['allow_user_to_change_display_name'],
			)
			->willReturn(true, false);

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'displayname', 'value' => 'NewDisplayName']]));
	}

	public function testEditUserRegularUserSelfEditChangeEmailValid(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('UserToEdit');
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->willReturn($targetUser);
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, false);
		$targetUser
			->expects($this->once())
			->method('setEMailAddress')
			->with('demo@owncloud.com');

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'email', 'value' => 'demo@owncloud.com']]));
	}

	public function testEditUserRegularUserSelfEditChangeEmailProhibited(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('UserToEdit');
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->method('get')
			->with('UserToEdit')
			->willReturn($targetUser);
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, false);
		$this->config
			->method('getSystemValue')
			->withConsecutive(
				['allow_user_to_change_mail_address'],
				['allow_user_to_change_display_name'],
			)
			->willReturn(false, true);

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'email', 'value' => 'demo@owncloud.com']]));
	}

	public function testEditUserRegularUserSelfEditClearEmail(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('UserToEdit');
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->willReturn($targetUser);
		$targetUser
			->expects($this->once())
			->method('setEMailAddress')
			->with('');
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, false);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'email', 'value' => '']]));
	}

	public function testEditUserRegularUserSelfEditChangeEmailInvalid(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('UserToEdit');
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->willReturn($targetUser);
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, false);

		$expected = new Result(null, 102);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'email', 'value' => 'demo.org']]));
	}

	public function testEditUserRegularUserSelfEditChangePassword(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('UserToEdit');
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->willReturn($targetUser);
		$targetUser
			->expects($this->once())
			->method('setPassword')
			->with('NewPassword');
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, false);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'password', 'value' => 'NewPassword']]));
	}

	public function testEditUserRegularUserSelfEditChangeQuota(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('UserToEdit');
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->willReturn($targetUser);
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, false);

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'quota', 'value' => 'NewQuota']]));
	}

	public function testEditTwoFactor(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('UserToEdit');
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->willReturn($targetUser);
		$this->twoFactorAuthManager
			->expects($this->once())
			->method('enableTwoFactorAuthentication');
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, false);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'two_factor_auth_enabled', 'value' => true]]));
	}

	public function testEditUserAdminUserSelfEditChangeValidQuota(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('UserToEdit');
		$targetUser = $this->createMock(IUser::class);
		$targetUser->expects($this->once())
			->method('setQuota')
			->with('2.9 MB');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('UserToEdit')
			->willReturn(true);
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, false);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'quota', 'value' => '3042824']]));
	}

	public function testEditUserAdminUserSelfEditChangeInvalidQuota(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('UserToEdit');
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('UserToEdit')
			->willReturn(true);
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, false);

		$expected = new Result(null, 103, 'Invalid quota value ABC');
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'quota', 'value' => 'ABC']]));
	}

	public function providesQuota(): array {
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
	public function testEditUserAdminUserEditChangeValidQuota($expectedQuotaValueOnSetQuota, $valueInRequest): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('admin');
		$targetUser = $this->createMock(IUser::class);
		$targetUser->expects($this->once())
			->method('setQuota')
			->with($expectedQuotaValueOnSetQuota);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('admin')
			->willReturn(true);
		$this->setupBasicSubadminMock();

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->editUser(
			['userid' => 'UserToEdit', '_put' =>
				['key' => 'quota', 'value' => $valueInRequest]]
		));
	}

	public function testEditUserSubadminUserAccessible(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('subadmin');
		$targetUser = $this->createMock(IUser::class);
		$targetUser->expects($this->once())
			->method('setQuota')
			->with('2.9 MB');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->willReturn($targetUser);
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, true);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'quota', 'value' => '3042824']]));
	}

	public function testEditUserSubadminUserInaccessible(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('subadmin');
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->willReturn($targetUser);
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, false);

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'quota', 'value' => '3042824']]));
	}

	public function testDeleteUserNotLoggedIn(): void {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn(null);

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->deleteUser(['userid' => 'UserToDelete']));
	}

	public function testDeleteUserNotExistingUser(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('UserToEdit');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
			->willReturn(null);

		$expected = new Result(null, 101);
		$this->assertEquals($expected, $this->api->deleteUser(['userid' => 'UserToDelete']));
	}

	public function testDeleteUserSelf(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('UserToDelete');
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->willReturn('UserToDelete');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
			->willReturn($targetUser);

		$expected = new Result(null, 101);
		$this->assertEquals($expected, $this->api->deleteUser(['userid' => 'UserToDelete']));
	}

	public function testDeleteSuccessfulUserAsAdmin(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('admin');
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->willReturn('UserToDelete');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('admin')
			->willReturn(true);
		$targetUser
			->expects($this->once())
			->method('delete')
			->willReturn(true);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->deleteUser(['userid' => 'UserToDelete']));
	}

	public function testDeleteUnsuccessfulUserAsAdmin(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('admin');
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->willReturn('UserToDelete');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('admin')
			->willReturn(true);
		$targetUser
			->expects($this->once())
			->method('delete')
			->willReturn(false);

		$expected = new Result(null, 101);
		$this->assertEquals($expected, $this->api->deleteUser(['userid' => 'UserToDelete']));
	}

	public function testDeleteSuccessfulUserAsSubadmin(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('subadmin');
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->willReturn('UserToDelete');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('subadmin')
			->willReturn(false);
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, true);
		$targetUser
			->expects($this->once())
			->method('delete')
			->willReturn(true);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->deleteUser(['userid' => 'UserToDelete']));
	}

	public function testDeleteUnsuccessfulUserAsSubadmin(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('subadmin');
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->willReturn('UserToDelete');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('subadmin')
			->willReturn(false);
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, true);
		$targetUser
			->expects($this->once())
			->method('delete')
			->willReturn(false);

		$expected = new Result(null, 101);
		$this->assertEquals($expected, $this->api->deleteUser(['userid' => 'UserToDelete']));
	}

	public function testDeleteUserAsSubAdminAndUserIsNotAccessible(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('subadmin');
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->willReturn('UserToDelete');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('subadmin')
			->willReturn(false);
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, false);

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->deleteUser(['userid' => 'UserToDelete']));
	}

	public function testGetUsersGroupsNotLoggedIn(): void {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn(null);

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->getUsersGroups(['userid' => 'UserToLookup']));
	}

	public function testGetUsersGroupsTargetUserNotExisting(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);

		$expected = new Result(null, 998);
		$this->assertEquals($expected, $this->api->getUsersGroups(['userid' => 'UserToLookup']));
	}

	public function testGetUsersGroupsSelfTargeted(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->willReturn('UserToLookup');
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->willReturn('UserToLookup');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToLookup')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('getUserGroupIds')
			->with($targetUser)
			->willReturn(['DummyValue']);

		$expected = new Result(['groups' => ['DummyValue']]);
		$this->assertEquals($expected, $this->api->getUsersGroups(['userid' => 'UserToLookup']));
	}

	public function testGetUsersGroupsForAdminUser(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->exactly(2))
			->method('getUID')
			->willReturn('admin');
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->willReturn('UserToLookup');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToLookup')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('getUserGroupIds')
			->with($targetUser)
			->willReturn(['DummyValue']);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('admin')
			->willReturn(true);

		$expected = new Result(['groups' => ['DummyValue']]);
		$this->assertEquals($expected, $this->api->getUsersGroups(['userid' => 'UserToLookup']));
	}

	public function testGetUsersGroupsForSubAdminUserAndUserIsAccessible(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->exactly(2))
			->method('getUID')
			->willReturn('subadmin');
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->willReturn('UserToLookup');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToLookup')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('subadmin')
			->willReturn(false);
		$subAdminManager = $this->setupIsUserAccessibleMock($loggedInUser, $targetUser, true);
		$group1 = $this->createMock(IGroup::class);
		$group1
			->method('getGID')
			->willReturn('Group1');
		$group2 = $this->createMock(IGroup::class);
		$group2
			->method('getGID')
			->willReturn('Group2');
		$subAdminManager
			->expects($this->once())
			->method('getSubAdminsGroups')
			->with($loggedInUser)
			->willReturn([$group1, $group2]);
		$this->groupManager
			->method('getUserGroupIds')
			->with($targetUser)
			->willReturn(['Group1']);

		$expected = new Result(['groups' => ['Group1']]);
		$this->assertEquals($expected, $this->api->getUsersGroups(['userid' => 'UserToLookup']));
	}

	public function testGetUsersGroupsForSubAdminUserAndUserIsInaccessible(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->exactly(2))
			->method('getUID')
			->willReturn('subadmin');
		$targetUser = $this->createMock(IUser::class);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->willReturn('UserToLookup');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToLookup')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('subadmin')
			->willReturn(false);
		$this->setupIsUserAccessibleMock($loggedInUser, $targetUser, false);
		$this->groupManager
			->method('getUserGroupIds')
			->with($targetUser)
			->willReturn(['Group1']);

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->getUsersGroups(['userid' => 'UserToLookup']));
	}

	public function testAddToGroupUnsuccessfulNotLoggedIn(): void {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn(null);

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->addToGroup([]));
	}

	public function testAddToGroupUnsuccessfulWithTargetGroupNotExisting(): void {
		$_POST['groupid'] = 'GroupToAddTo';

		$loggedInUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('GroupToAddTo')
			->willReturn(null);

		$expected = new Result(null, 102);
		$this->assertEquals($expected, $this->api->addToGroup(['userid' => 'TargetUser']));
	}

	public function testAddToGroupUnsuccessfulWithNoGroupSpecified(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);

		$expected = new Result(null, 101);
		$this->assertEquals($expected, $this->api->addToGroup(['userid' => 'TargetUser']));
	}

	public function testAddToGroupUnsuccessfulWithTargetUserNotExisting(): void {
		$_POST['groupid'] = 'GroupToAddTo';

		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('admin');
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('GroupToAddTo')
			->willReturn($targetGroup);

		$expected = new Result(null, 103);
		$this->assertEquals($expected, $this->api->addToGroup(['userid' => 'TargetUser']));
	}

	public function testAddToGroupUnsuccessfulWithoutAnyPermission(): void {
		$_POST['groupid'] = 'GroupToAddTo';

		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('unauthorizedUser');
		$targetUser = $this->createMock(IUser::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('TargetUser')
			->willReturn($targetUser);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->method('get')
			->with('GroupToAddTo')
			->willReturn($targetGroup);
		$this->setupBasicSubadminMock();
		$this->groupManager
			->method('isAdmin')
			->with('unauthorizedUser')
			->willReturn(false);

		$expected = new Result(null, 104);
		$this->assertEquals($expected, $this->api->addToGroup(['userid' => 'TargetUser']));
	}

	public function testAddToGroupUnsuccessfulAsSubadminAndUserIsNotAccessible(): void {
		$_POST['groupid'] = 'GroupToAddTo';

		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('subadmin');
		$targetUser = $this->createMock(IUser::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('TargetUser')
			->willReturn($targetUser);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->method('get')
			->with('GroupToAddTo')
			->willReturn($targetGroup);
		$subAdminManager = $this->setupBasicSubadminMock();
		$this->groupManager
			->method('isAdmin')
			->with('subadmin')
			->willReturn(false);
		$subAdminManager
			->method('isSubAdminOfGroup')
			->with($loggedInUser, $targetGroup)
			->willReturn(false);

		$expected = new Result(null, 104);
		$this->assertEquals($expected, $this->api->addToGroup(['userid' => 'TargetUser']));
	}

	public function testAddToGroupUnsuccessfulAsSubAdminFromSubAdminWithOutsideGroup(): void {
		$_POST['groupid'] = 'outsidegroup';

		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('subadmin');
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('subadmin')
			->willReturn($loggedInUser);
		$subadminGroup = $this->createMock(IGroup::class);
		$subadminGroup
			->method('getGID')
			->willReturn('subadmin');
		$targetGroup = $this->createMock(IGroup::class);
		$targetGroup
			->method('getGID')
			->willReturn('outsidegroup');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->method('get')
			->willReturnMap([
				['subadmin', $subadminGroup],
				['outsidegroup', $targetGroup]
			]);
		$subAdminManager = $this->setupBasicSubadminMock();
		$subAdminManager
			->method('isSubAdminofGroup')
			->with($loggedInUser, $targetGroup)
			->willReturn(false);
		$this->groupManager
			->method('isAdmin')
			->with('subadmin')
			->willReturn(false);

		$expected = new Result(null, 104);
		$this->assertEquals($expected, $this->api->addToGroup(['userid' => 'subadmin']));
	}

	public function testAddToGroupSuccessfulAsAdmin(): void {
		$_POST['groupid'] = 'admin';
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('admin');
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('admin')
			->willReturn($targetGroup);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('AnotherUser')
			->willReturn($targetUser);
		$this->groupManager
			->method('isAdmin')
			->with('admin')
			->willReturn(true);
		$targetGroup
			->expects($this->once())
			->method('addUser')
			->with($targetUser);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->addToGroup(['userid' => 'AnotherUser']));
	}

	public function testAddToGroupSuccessfulAsSubadminWithAccessibleUser(): void {
		$_POST['groupid'] = 'group1';
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('subadmin');
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->method('get')
			->with('group1')
			->willReturn($targetGroup);
		$this->userManager
			->method('get')
			->with('AnotherUser')
			->willReturn($targetUser);
		$this->groupManager
			->method('isAdmin')
			->with('subadmin')
			->willReturn(false);
		$targetGroup
			->method('addUser')
			->with($targetUser);
		$subAdminManager = $this->setupBasicSubadminMock();
		$subAdminManager
			->method('isSubAdminOfGroup')
			->with($loggedInUser, $targetGroup)
			->willReturn(true);

		$expected = new Result(null, 104);
		$this->assertEquals($expected, $this->api->addToGroup(['userid' => 'AnotherUser']));
	}
	public function testRemoveFromGroupUnsuccessfulNotLoggedIn(): void {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn(null);

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->removeFromGroup(['userid' => 'TargetUser', '_delete' => ['groupid' => 'TargetGroup']]));
	}

	public function testRemoveFromGroupUnsuccessfulWithNoGroupSpecified(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$expected = new Result(null, 101);
		$this->assertEquals($expected, $this->api->removeFromGroup(['userid' => 'TargetUser', '_delete' => []]));
	}

	public function testRemoveFromGroupWithWithTargetGroupNotExisting(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$this->userSession
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->method('get')
			->with('TargetGroup')
			->willReturn(null);

		$expected = new Result(null, 102);
		$this->assertEquals($expected, $this->api->removeFromGroup(['userid' => 'TargetUser', '_delete' => ['groupid' => 'TargetGroup']]));
	}

	public function testRemoveFromGroupUnsuccessfulWithTargetUserNotExisting(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->willReturn('subadmin');
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('TargetGroup')
			->willReturn($targetGroup);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('TargetUser')
			->willReturn(null);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('subadmin')
			->willReturn(false);
		$subAdminManager = $this->setupBasicSubadminMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminofGroup')
			->with($loggedInUser, $targetGroup)
			->willReturn(true);

		$expected = new Result(null, 103);
		$this->assertEquals($expected, $this->api->removeFromGroup(['userid' => 'TargetUser', '_delete' => ['groupid' => 'TargetGroup']]));
	}

	public function testRemoveFromGroupUnsuccessfulWithoutAnyPermission(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->willReturn('unauthorizedUser');
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('TargetGroup')
			->willReturn($targetGroup);
		$this->setupBasicSubadminMock();
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('unauthorizedUser')
			->willReturn(false);

		$expected = new Result(null, 104);
		$this->assertEquals($expected, $this->api->removeFromGroup(['userid' => 'TargetUser', '_delete' => ['groupid' => 'TargetGroup']]));
	}
	
	public function testRemoveFromGroupUnsuccessfulAsAdminFromAdmin(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('admin');
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$targetGroup
			->expects($this->once())
			->method('getGID')
			->willReturn('admin');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('admin')
			->willReturn($targetGroup);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('admin')
			->willReturn($targetUser);
		$this->groupManager
			->method('isAdmin')
			->with('admin')
			->willReturn(true);

		$expected = new Result(null, 105, 'Cannot remove yourself from the admin group');
		$this->assertEquals($expected, $this->api->removeFromGroup(['userid' => 'admin', '_delete' => ['groupid' => 'admin']]));
	}

	public function testRemoveFromGroupUnsuccessfulAsSubAdminFromSubAdmin(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('subadmin');
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$targetGroup
			->method('getGID')
			->willReturn('subadmin');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('subadmin')
			->willReturn($targetGroup);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('subadmin')
			->willReturn($targetUser);
		$subAdminManager = $this->setupBasicSubadminMock(false);
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminofGroup')
			->with($loggedInUser, $targetGroup)
			->willReturn(true);
		$subAdminManager
			->expects($this->once())
			->method('getSubAdminsGroups')
			->with($loggedInUser)
			->willReturn([$targetGroup]);
		$this->groupManager
			->method('isAdmin')
			->with('subadmin')
			->willReturn(false);

		$expected = new Result(null, 105, 'Cannot remove yourself from this group as you are a SubAdmin');
		$this->assertEquals($expected, $this->api->removeFromGroup(['userid' => 'subadmin', '_delete' => ['groupid' => 'subadmin']]));
	}

	public function testRemoveFromGroupSuccessfulAsAdmin(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('admin');
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('admin')
			->willReturn($targetGroup);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('AnotherUser')
			->willReturn($targetUser);
		$this->groupManager
			->method('isAdmin')
			->with('admin')
			->willReturn(true);
		$targetGroup
			->expects($this->once())
			->method('removeUser')
			->with($targetUser);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->removeFromGroup(['userid' => 'AnotherUser', '_delete' => ['groupid' => 'admin']]));
	}

	public function testRemoveFromGroupSuccessfulAsSubadmin(): void {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->willReturn('subadmin');
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('group1')
			->willReturn($targetGroup);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('AnotherUser')
			->willReturn($targetUser);
		$this->groupManager
			->method('isAdmin')
			->with('subadmin')
			->willReturn(false);
		$targetGroup
			->expects($this->once())
			->method('removeUser')
			->with($targetUser);
		$subAdminManager = $this->setupBasicSubadminMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminOfGroup')
			->with($loggedInUser, $targetGroup)
			->willReturn(true);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->removeFromGroup(['userid' => 'AnotherUser', '_delete' => ['groupid' => 'group1']]));
	}

	public function testAddSubAdminWithNotExistingTargetUser(): void {
		$_POST['groupid'] = 'nevermind';
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('NotExistingUser')
			->willReturn(null);

		$expected = new Result(null, 101, 'User does not exist');
		$this->assertEquals($expected, $this->api->addSubAdmin(['userid' => 'NotExistingUser']));
	}

	public function testAddSubAdminWithNotExistingTargetGroup(): void {
		$_POST['groupid'] = 'NotExistingGroup';

		$targetUser = $this->createMock(IUser::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ExistingUser')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('NotExistingGroup')
			->willReturn(null);

		$expected = new Result(null, 102, 'Group:NotExistingGroup does not exist');
		$this->assertEquals($expected, $this->api->addSubAdmin(['userid' => 'ExistingUser']));
	}

	public function testAddSubAdminToAdminGroup(): void {
		$_POST['groupid'] = 'ADmiN';

		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ExistingUser')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('ADmiN')
			->willReturn($targetGroup);

		$expected = new Result(null, 103, 'Cannot create subadmins for admin group');
		$this->assertEquals($expected, $this->api->addSubAdmin(['userid' => 'ExistingUser']));
	}

	public function testAddSubAdminTwice(): void {
		$_POST['groupid'] = 'TargetGroup';

		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ExistingUser')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('TargetGroup')
			->willReturn($targetGroup);
		$subAdminManager = $this->setupBasicSubadminMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminOfGroup')
			->with($targetUser, $targetGroup)
			->willReturn(true);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->addSubAdmin(['userid' => 'ExistingUser']));
	}

	public function testAddSubAdminSuccessful(): void {
		$_POST['groupid'] = 'TargetGroup';

		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ExistingUser')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('TargetGroup')
			->willReturn($targetGroup);
		$subAdminManager = $this->setupBasicSubadminMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminOfGroup')
			->with($targetUser, $targetGroup)
			->willReturn(false);
		$subAdminManager
			->expects($this->once())
			->method('createSubAdmin')
			->with($targetUser, $targetGroup)
			->willReturn(true);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->addSubAdmin(['userid' => 'ExistingUser']));
	}

	public function testAddSubAdminUnsuccessful(): void {
		$_POST['groupid'] = 'TargetGroup';

		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ExistingUser')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('TargetGroup')
			->willReturn($targetGroup);
		$subAdminManager = $this->setupBasicSubadminMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminOfGroup')
			->with($targetUser, $targetGroup)
			->willReturn(false);
		$subAdminManager
			->expects($this->once())
			->method('createSubAdmin')
			->with($targetUser, $targetGroup)
			->willReturn(false);

		$expected = new Result(null, 103, 'Unknown error occurred');
		$this->assertEquals($expected, $this->api->addSubAdmin(['userid' => 'ExistingUser']));
	}

	public function testRemoveSubAdminNotExistingTargetUser(): void {
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('NotExistingUser')
			->willReturn(null);

		$expected = new Result(null, 101, 'User does not exist');
		$this->assertEquals($expected, $this->api->removeSubAdmin(['userid' => 'NotExistingUser', '_delete' => ['groupid' => 'GroupToDeleteFrom']]));
	}

	public function testRemoveSubAdminNotExistingTargetGroup(): void {
		$targetUser = $this->createMock(IUser::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ExistingUser')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('GroupToDeleteFrom')
			->willReturn(null);

		$expected = new Result(null, 101, 'Group does not exist');
		$this->assertEquals($expected, $this->api->removeSubAdmin(['userid' => 'ExistingUser', '_delete' => ['groupid' => 'GroupToDeleteFrom']]));
	}

	public function testRemoveSubAdminFromNotASubadmin(): void {
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ExistingUser')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('GroupToDeleteFrom')
			->willReturn($targetGroup);
		$subAdminManager = $this->setupBasicSubadminMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminOfGroup')
			->with($targetUser, $targetGroup)
			->willReturn(false);

		$expected = new Result(null, 102, 'User is not a subadmin of this group');
		$this->assertEquals($expected, $this->api->removeSubAdmin(['userid' => 'ExistingUser', '_delete' => ['groupid' => 'GroupToDeleteFrom']]));
	}

	public function testRemoveSubAdminSuccessful(): void {
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ExistingUser')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('GroupToDeleteFrom')
			->willReturn($targetGroup);
		$subAdminManager = $this->setupBasicSubadminMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminOfGroup')
			->with($targetUser, $targetGroup)
			->willReturn(true);
		$subAdminManager
			->expects($this->once())
			->method('deleteSubAdmin')
			->with($targetUser, $targetGroup)
			->willReturn(true);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->removeSubAdmin(['userid' => 'ExistingUser', '_delete' => ['groupid' => 'GroupToDeleteFrom']]));
	}

	public function testRemoveSubAdminUnsuccessful(): void {
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ExistingUser')
			->willReturn($targetUser);
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('GroupToDeleteFrom')
			->willReturn($targetGroup);
		$subAdminManager = $this->setupBasicSubadminMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminOfGroup')
			->with($targetUser, $targetGroup)
			->willReturn(true);
		$subAdminManager
			->expects($this->once())
			->method('deleteSubAdmin')
			->with($targetUser, $targetGroup)
			->willReturn(false);

		$expected = new Result(null, 103, 'Unknown error occurred');
		$this->assertEquals($expected, $this->api->removeSubAdmin(['userid' => 'ExistingUser', '_delete' => ['groupid' => 'GroupToDeleteFrom']]));
	}

	public function testGetUserSubAdminGroupsNoCurrentUserInSession(): void {
		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->getUserSubAdminGroups(['userid' => 'RequestedUser']));
	}

	public function testGetUserSubAdminGroupsNotExistingTargetUser(): void {
		$currentUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($currentUser);
		$currentUser
			->expects($this->once())
			->method('getUID')
			->willReturn('RequestedUser');
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('RequestedUser')
			->willReturn(null);

		$expected = new Result(null, 998, 'The requested user could not be found');
		$this->assertEquals($expected, $this->api->getUserSubAdminGroups(['userid' => 'RequestedUser']));
	}

	public function testGetUserSubAdminGroupsWithGroupsAsSameUser(): void {
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($targetUser);
		$targetUser
			->expects($this->once())
			->method('getUID')
			->willReturn('RequestedUser');
		$targetGroup
			->expects($this->once())
			->method('getGID')
			->willReturn('TargetGroup');
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('RequestedUser')
			->willReturn($targetUser);
		$subAdminManager = $this->setupBasicSubadminMock();
		$subAdminManager
			->expects($this->once())
			->method('getSubAdminsGroups')
			->with($targetUser)
			->willReturn([$targetGroup]);

		$expected = new Result(['TargetGroup'], 100);
		$this->assertEquals($expected, $this->api->getUserSubAdminGroups(['userid' => 'RequestedUser']));
	}

	public function testGetUserSubAdminGroupsAsSubadmin(): void {
		$currentUser = $this->createMock(IUser::class);
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($currentUser);
		$targetGroup
			->expects($this->once())
			->method('getGID')
			->willReturn('TargetGroup');
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('RequestedUser')
			->willReturn($targetUser);
		$subAdminManager = $this->setupBasicSubadminMock();
		$subAdminManager
			->expects($this->once())
			->method('getSubAdminsGroups')
			->with($targetUser)
			->willReturn([$targetGroup]);
		$subAdminManager
			->expects($this->once())
			->method('isUserAccessible')
			->with($currentUser, $targetUser)
			->willReturn(true);

		$expected = new Result(['TargetGroup'], 100);
		$this->assertEquals($expected, $this->api->getUserSubAdminGroups(['userid' => 'RequestedUser']));
	}

	public function testGetUserSubAdminGroupsAsSubadminUserNotAccessible(): void {
		$currentUser = $this->createMock(IUser::class);
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($currentUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('RequestedUser')
			->willReturn($targetUser);
		$this->setupIsUserAccessibleMock($currentUser, $targetUser, false);

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->getUserSubAdminGroups(['userid' => 'RequestedUser']));
	}

	public function testGetUserSubAdminGroupsWithGroupsAsAdmin(): void {
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($targetUser);
		$targetGroup
			->expects($this->once())
			->method('getGID')
			->willReturn('TargetGroup');
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('RequestedUser')
			->willReturn($targetUser);
		$subAdminManager = $this->setupBasicSubadminMock();
		$subAdminManager
			->expects($this->once())
			->method('getSubAdminsGroups')
			->with($targetUser)
			->willReturn([$targetGroup]);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->willReturn(true);

		$expected = new Result(['TargetGroup'], 100);
		$this->assertEquals($expected, $this->api->getUserSubAdminGroups(['userid' => 'RequestedUser']));
	}

	public function testGetUserSubAdminGroupsWithoutAnyGroups(): void {
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($targetUser);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('RequestedUser')
			->willReturn($targetUser);
		$subAdminManager = $this->setupBasicSubadminMock();
		$subAdminManager
			->expects($this->once())
			->method('getSubAdminsGroups')
			->with($targetUser)
			->willReturn([]);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->willReturn(true);

		$expected = new Result([], 100);
		$this->assertEquals($expected, $this->api->getUserSubAdminGroups(['userid' => 'RequestedUser']));
	}

	public function testEnableUser(): void {
		$targetUser = $this->createMock(IUser::class);
		$targetUser->expects($this->once())
			->method('setEnabled')
			->with(true);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('RequestedUser')
			->willReturn($targetUser);
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->exactly(2))
			->method('getUID')
			->willReturn('admin');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->willReturn(true);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->enableUser(['userid' => 'RequestedUser']));
	}

	public function testDisableUser(): void {
		$targetUser = $this->createMock(IUser::class);
		$targetUser->expects($this->once())
			->method('setEnabled')
			->with(false);
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('RequestedUser')
			->willReturn($targetUser);
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->exactly(2))
			->method('getUID')
			->willReturn('admin');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->willReturn($loggedInUser);
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->willReturn(true);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->disableUser(['userid' => 'RequestedUser']));
	}
}
