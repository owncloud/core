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
use OC\User\Service\CreateUserService;
use OC\User\Service\PasswordGeneratorService;
use OC\User\Service\UserSendMailService;
use OC\User\User;
use OCA\Provisioning_API\Users;
use OCP\API;
use OCP\App\IAppManager;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IAvatarManager;
use OCP\IConfig;
use OCP\IL10N;
use OCP\ILogger;
use OCP\ISubAdminManager;
use OCP\IURLGenerator;
use OCP\IUserManager;
use OCP\IUserSession;
use OCP\Mail\IMailer;
use OCP\Security\ISecureRandom;
use PHPUnit_Framework_MockObject_MockObject;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Test\TestCase as OriginalTest;
use OCP\IUser;
use OC\SubAdmin;
use OCP\IGroup;
use OC\Authentication\TwoFactorAuth\Manager;

class UsersTest extends OriginalTest {
	
	/** @var IUserManager | PHPUnit_Framework_MockObject_MockObject */
	protected $userManager;
	/** @var \OC\Group\Manager | PHPUnit_Framework_MockObject_MockObject */
	protected $groupManager;
	/** @var IUserSession | PHPUnit_Framework_MockObject_MockObject */
	protected $userSession;
	/** @var CreateUserService | \PHPUnit_Framework_MockObject_MockObject */
	private $createUserService;
	/** @var ILogger | PHPUnit_Framework_MockObject_MockObject */
	protected $logger;
	/** @var Users | PHPUnit_Framework_MockObject_MockObject */
	protected $api;
	/** @var \OC\Authentication\TwoFactorAuth\Manager | PHPUnit_Framework_MockObject_MockObject */
	private $twoFactorAuthManager;
	private $urlGenerator;
	private $secureRandom;
	private $defaults;
	private $timeFactory;
	private $mailer;
	private $l10n;
	private $config;
	private $appManager;
	private $avatarManager;
	private $eventDispatcher;
	/** @var UserSendMailService | \PHPUnit_Framework_MockObject_MockObject */
	private $userSendMailService;
	/** @var PasswordGeneratorService | \PHPUnit_Framework_MockObject_MockObject */
	private $passwordGeneratorService;

	protected function tearDown() {
		$_GET = null;
		$_POST = null;
		parent::tearDown();
	}

	protected function setUp() {
		parent::setUp();

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
		$this->twoFactorAuthManager->expects($this->any())
			->method('isTwoFactorAuthenticated')
			->willReturn(false);
		$this->urlGenerator = $this->createMock(IURLGenerator::class);
		$this->secureRandom = $this->createMock(ISecureRandom::class);
		$this->defaults = $this->createMock(\OC_Defaults::class);
		$this->timeFactory = $this->createMock(ITimeFactory::class);
		$this->mailer = $this->createMock(IMailer::class);
		$this->l10n = $this->createMock(IL10N::class);
		$this->config = $this->createMock(IConfig::class);
		$this->appManager = $this->createMock(IAppManager::class);
		$this->avatarManager = $this->createMock(IAvatarManager::class);
		$this->eventDispatcher = $this->createMock(EventDispatcherInterface::class);
		$this->userSendMailService = $this->createMock(UserSendMailService::class);
		$this->passwordGeneratorService = $this->createMock(PasswordGeneratorService::class);
		$this->createUserService = $this->createMock(CreateUserService::class);
		$this->api = $this->getMockBuilder(Users::class)
			->setConstructorArgs([
				$this->userManager,
				$this->groupManager,
				$this->userSession,
				$this->createUserService,
				$this->logger,
				$this->twoFactorAuthManager
			])
			->setMethods(['fillStorageInfo'])
			->getMock();
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
		$_GET['search'] = 'MyCustomSearch';

		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('admin'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
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
		$_GET['search'] = 'MyCustomSearch';

		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->will($this->returnValue(false));
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
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdmin')
			->with($loggedInUser)
			->will($this->returnValue(true));
		$subAdminManager
			->expects($this->once())
			->method('getSubAdminsGroups')
			->with($loggedInUser)
			->will($this->returnValue([$firstGroup, $secondGroup]));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));
		$this->groupManager
			->expects($this->any())
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
		$_GET['search'] = 'MyCustomSearch';

		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('regularUser'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->will($this->returnValue(false));
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdmin')
			->with($loggedInUser)
			->will($this->returnValue(false));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, API::RESPOND_UNAUTHORISED);
		$this->assertEquals($expected, $this->api->getUsers());
	}

	public function testAddUserAlreadyExisting() {
		$_POST['userid'] = 'AlreadyExistingUser';
		$this->userManager
			->expects($this->once())
			->method('userExists')
			->with('AlreadyExistingUser')
			->will($this->returnValue(true));
		$this->logger
			->expects($this->once())
			->method('error')
			->with('Failed addUser attempt: User already exists.', ['app' => 'ocs_api']);
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('adminUser'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('adminUser')
			->willReturn(true);

		$expected = new Result(null, 102, 'User already exists');
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserNonExistingGroup() {
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
			->will($this->returnValue('adminUser'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
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
			->will($this->returnValue('adminUser'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
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
		$_POST['userid'] = 'NewUser';
		$_POST['password'] = 'PasswordOfTheNewUser';
		$newUser = $this->createMock(User::class);
		$newUser->expects($this->any())
			->method('getUID')
			->willReturn('NewUser');
		$this->userManager
			->expects($this->any())
			->method('userExists')
			->with('NewUser')
			->will($this->returnValue(false));
		$this->createUserService
			->expects($this->once())
			->method('createUser')
			->with('NewUser', 'PasswordOfTheNewUser')
			->willReturn($newUser);
		$this->userManager
			->expects($this->any())
			->method('get')
			->willReturn($newUser);
		$this->logger
			->expects($this->once())
			->method('info')
			->with('Successful addUser call with userid: NewUser', ['app' => 'ocs_api']);
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('adminUser'));
		$this->userSession
			->expects($this->any())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->groupManager
			->expects($this->any())
			->method('isAdmin')
			->with('adminUser')
			->willReturn(true);
		$this->createUserService->method('addUserToGroups')
			->willReturn([]);
		$subadminManager = $this->createMock(ISubAdminManager::class);
		$subadminManager->expects($this->any())
			->method('getSubAdminsGroups')
			->willReturn([]);
		$this->groupManager->expects($this->any())
			->method('getSubAdmin')
			->willReturn($subadminManager);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserExistingGroup() {
		$_POST['userid'] = 'NewUser';
		$_POST['password'] = 'PasswordOfTheNewUser';
		$_POST['groups'] = ['ExistingGroup'];
		$this->userManager
			->expects($this->any())
			->method('userExists')
			->with('NewUser')
			->willReturn(false);
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('adminUser'));
		$this->userSession
			->expects($this->any())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->groupManager
			->expects($this->any())
			->method('isAdmin')
			->with('adminUser')
			->willReturn(true);
		$this->groupManager
			->expects($this->once())
			->method('groupExists')
			->with('ExistingGroup')
			->willReturn(true);
		$newUser = $this->createMock(User::class);
		$newUser->expects($this->any())
			->method('getUID')
			->willReturn('NewUser');
		$this->userManager
			->expects($this->any())
			->method('get')
			->willReturn($newUser);
		$this->createUserService
			->expects($this->once())
			->method('createUser')
			->with('NewUser', 'PasswordOfTheNewUser')
			->willReturn($newUser);
		$group = $this->createMock(IGroup::class);
		$group
			->expects($this->any())
			->method('addUser')
			->with($newUser);
		$group->expects($this->any())
			->method('getGID')
			->willReturn('ExistingGroup');
		$this->groupManager
			->expects($this->any())
			->method('get')
			->with('ExistingGroup')
			->willReturn($group);

		$subadminManager = $this->createMock(ISubAdminManager::class);
		$subadminManager->expects($this->any())
			->method('getSubAdminsGroups')
			->willReturn([]);
		$this->groupManager->expects($this->any())
			->method('getSubAdmin')
			->willReturn($subadminManager);
		$this->createUserService->method('addUserToGroups')
			->willReturn([]);

		$this->logger
			->expects($this->any())
			->method('info')
			->withConsecutive(
				['Successful addUser call with userid: NewUser', ['app' => 'ocs_api']],
				['Added userid NewUser to group ExistingGroup']
			);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserUnsuccessful() {
		$_POST['userid'] = 'NewUser';
		$_POST['password'] = 'PasswordOfTheNewUser';
		$this->userManager
			->expects($this->any())
			->method('userExists')
			->with('NewUser')
			->will($this->returnValue(false));
		$this->createUserService
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
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('adminUser'));
		$this->userSession
			->expects($this->any())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->groupManager
			->expects($this->any())
			->method('isAdmin')
			->with('adminUser')
			->willReturn(true);

		$expected = new Result(null, 101, 'User backend not found.');
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserAsRegularUser() {
		$_POST['userid'] = 'NewUser';
		$_POST['password'] = 'PasswordOfTheNewUser';
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('regularUser'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('regularUser')
			->willReturn(false);
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdmin')
			->with($loggedInUser)
			->willReturn(false);
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->with()
			->willReturn($subAdminManager);

		$expected = new Result(null, API::RESPOND_UNAUTHORISED);
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserAsSubAdminNoGroup() {
		$_POST['userid'] = 'NewUser';
		$_POST['password'] = 'PasswordOfTheNewUser';
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('regularUser'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('regularUser')
			->willReturn(false);
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdmin')
			->with($loggedInUser)
			->willReturn(true);
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->with()
			->willReturn($subAdminManager);

		$expected = new Result(null, 106, 'no group specified (required for subadmins)');
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testAddUserAsSubAdminValidGroupNotSubAdmin() {
		$_POST['userid'] = 'NewUser';
		$_POST['password'] = 'PasswordOfTheNewUser';
		$_POST['groups'] = ['ExistingGroup'];
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('regularUser'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
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
			->with($loggedInUser)
			->willReturn(true);
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminOfGroup')
			->with($loggedInUser, $existingGroup)
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
		$_POST['userid'] = 'NewUser';
		$_POST['password'] = 'PasswordOfTheNewUser';
		$_POST['groups'] = ['ExistingGroup1', 'ExistingGroup2'];
		$newUser = $this->createMock(User::class);
		$newUser->expects($this->any())
			->method('getUID')
			->willReturn('NewUser');
		$this->userManager
			->expects($this->any())
			->method('get')
			->willReturn($newUser);
		$this->userManager
			->expects($this->any())
			->method('userExists')
			->with('NewUser')
			->willReturn(false);
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('subAdminUser'));
		$this->userSession
			->expects($this->any())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->groupManager
			->expects($this->any())
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
		$this->createUserService
			->expects($this->once())
			->method('createUser')
			->with('NewUser', 'PasswordOfTheNewUser')
			->willReturn($newUser);
		$existingGroup1 = $this->createMock(IGroup::class);
		$existingGroup2 = $this->createMock(IGroup::class);
		$existingGroup1->expects($this->any())
			->method('getGID')
			->willReturn('ExistingGroup1');
		$existingGroup2->expects($this->any())
			->method('getGID')
			->willReturn('ExistingGroup2');
		$this->groupManager
			->expects($this->any())
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
			->expects($this->once())
			->method('info')
			->with(
				'Successful addUser call with userid: NewUser', ['app' => 'ocs_api']
			);
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()->getMock();
		$this->groupManager
			->expects($this->any())
			->method('getSubAdmin')
			->willReturn($subAdminManager);
		$subAdminManager->expects($this->any())
			->method('getSubAdminsGroups')
			->willReturn([]);
		$subAdminManager
			->expects($this->once())
			->method('isSubAdmin')
			->with($loggedInUser)
			->willReturn(true);
		$subAdminManager
			->expects($this->any())
			->method('isSubAdminOfGroup')
			->withConsecutive(
				[$loggedInUser, $existingGroup1],
				[$loggedInUser, $existingGroup2]
			)
			->willReturn(true);
		$this->groupManager
			->expects($this->any())
			->method('isInGroup')
			->willReturnMap([
				['NewUser', 'ExistingGroup1', true],
				['NewUser', 'ExistingGroup2', true]
			]);
		$this->createUserService->method('addUserToGroups')
			->willReturn([]);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->addUser());
	}

	public function testGetUserNotLoggedIn() {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue(null));

		$expected = new Result(null, API::RESPOND_UNAUTHORISED);
		$this->assertEquals($expected, $this->api->getUser(['userid' => 'UserToGet']));
	}

	public function testGetUserTargetDoesNotExist() {
		$loggedInUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToGet')
			->will($this->returnValue(null));

		$expected = new Result(null, API::RESPOND_NOT_FOUND, 'The requested user could not be found');
		$this->assertEquals($expected, $this->api->getUser(['userid' => 'UserToGet']));
	}

	public function testGetUserAsAdmin() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
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
			->will($this->returnValue($loggedInUser));
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
		$this->assertEquals($expected, $this->api->getUser(['userid' => 'UserToGet']));
	}

	public function testGetUserAsSubAdminAndUserIsAccessible() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
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
			->will($this->returnValue($loggedInUser));
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
			->with($loggedInUser, $targetUser)
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
		$this->assertEquals($expected, $this->api->getUser(['userid' => 'UserToGet']));
	}

	public function testGetUserAsSubAdminAndUserIsNotAccessible() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->exactly(2))
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
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
			->with($loggedInUser, $targetUser)
			->will($this->returnValue(false));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, API::RESPOND_UNAUTHORISED);
		$this->assertEquals($expected, $this->api->getUser(['userid' => 'UserToGet']));
	}

	public function testGetUserAsSubAdminSelfLookup() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
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
			->will($this->returnValue($loggedInUser));
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
			->with($loggedInUser, $targetUser)
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
		$this->assertEquals($expected, $this->api->getUser(['userid' => 'subadmin']));
	}

	public function testEditUserNotLoggedIn() {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue(null));

		$expected = new Result(null, API::RESPOND_UNAUTHORISED);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit']));
	}

	public function testEditUserRegularUserSelfEditChangeDisplay() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('UserToEdit'));
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->will($this->returnValue($targetUser));
		$targetUser
			->expects($this->once())
			->method('setDisplayName')
			->with('NewDisplayName');

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'display', 'value' => 'NewDisplayName']]));
	}

	public function testEditUserRegularUserSelfEditChangeDisplayName() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('UserToEdit'));
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->will($this->returnValue($targetUser));
		$targetUser
			->expects($this->once())
			->method('setDisplayName')
			->with('NewDisplayName');

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'displayname', 'value' => 'NewDisplayName']]));
	}

	public function testEditUserRegularUserSelfEditChangeEmailValid() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('UserToEdit'));
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->will($this->returnValue($targetUser));
		$targetUser
			->expects($this->once())
			->method('setEMailAddress')
			->with('demo@owncloud.org');

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'email', 'value' => 'demo@owncloud.org']]));
	}

	public function testEditUserRegularUserSelfEditChangeEmailInvalid() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('UserToEdit'));
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->will($this->returnValue($targetUser));

		$expected = new Result(null, 102);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'email', 'value' => 'demo.org']]));
	}

	public function testEditUserRegularUserSelfEditChangePassword() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('UserToEdit'));
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->will($this->returnValue($targetUser));
		$targetUser
			->expects($this->once())
			->method('setPassword')
			->with('NewPassword');

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'password', 'value' => 'NewPassword']]));
	}

	public function testEditUserRegularUserSelfEditChangeQuota() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('UserToEdit'));
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->will($this->returnValue($targetUser));

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'quota', 'value' => 'NewQuota']]));
	}

	public function testEditTwoFactor() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('UserToEdit'));
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToEdit')
			->will($this->returnValue($targetUser));
		$this->twoFactorAuthManager
			->expects($this->once())
			->method('enableTwoFactorAuthentication');

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'two_factor_auth_enabled', 'value' => true]]));
	}

	public function testEditUserAdminUserSelfEditChangeValidQuota() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('UserToEdit'));
		$targetUser = $this->createMock(IUser::class);
		$targetUser->expects($this->once())
			->method('setQuota')
			->with('2.9 MB');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
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

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'quota', 'value' => '3042824']]));
	}

	public function testEditUserAdminUserSelfEditChangeInvalidQuota() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('UserToEdit'));
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
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

		$expected = new Result(null, 103, 'Invalid quota value ABC');
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'quota', 'value' => 'ABC']]));
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
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('admin'));
		$targetUser = $this->createMock(IUser::class);
		$targetUser->expects($this->once())
			->method('setQuota')
			->with($expectedQuotaValueOnSetQuota);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
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
		$this->assertEquals($expected, $this->api->editUser(
			['userid' => 'UserToEdit', '_put' =>
				['key' => 'quota', 'value' => $valueInRequest]]));
	}

	public function testEditUserSubadminUserAccessible() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetUser = $this->createMock(IUser::class);
		$targetUser->expects($this->once())
			->method('setQuota')
			->with('2.9 MB');
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
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
			->with($loggedInUser, $targetUser)
			->will($this->returnValue(true));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'quota', 'value' => '3042824']]));
	}

	public function testEditUserSubadminUserInaccessible() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
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
			->with($loggedInUser, $targetUser)
			->will($this->returnValue(false));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->editUser(['userid' => 'UserToEdit', '_put' => ['key' => 'quota', 'value' => '3042824']]));
	}

	public function testDeleteUserNotLoggedIn() {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue(null));

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->deleteUser(['userid' => 'UserToDelete']));
	}

	public function testDeleteUserNotExistingUser() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('UserToEdit'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
			->will($this->returnValue(null));

		$expected = new Result(null, 101);
		$this->assertEquals($expected, $this->api->deleteUser(['userid' => 'UserToDelete']));
	}

	public function testDeleteUserSelf() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
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
			->will($this->returnValue($loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
			->will($this->returnValue($targetUser));

		$expected = new Result(null, 101);
		$this->assertEquals($expected, $this->api->deleteUser(['userid' => 'UserToDelete']));
	}

	public function testDeleteSuccessfulUserAsAdmin() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
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
			->will($this->returnValue($loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('admin')
			->will($this->returnValue(true));
		$targetUser
			->expects($this->once())
			->method('delete')
			->will($this->returnValue(true));

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->deleteUser(['userid' => 'UserToDelete']));
	}

	public function testDeleteUnsuccessfulUserAsAdmin() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
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
			->will($this->returnValue($loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('admin')
			->will($this->returnValue(true));
		$targetUser
			->expects($this->once())
			->method('delete')
			->will($this->returnValue(false));

		$expected = new Result(null, 101);
		$this->assertEquals($expected, $this->api->deleteUser(['userid' => 'UserToDelete']));
	}

	public function testDeleteSuccessfulUserAsSubadmin() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
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
			->will($this->returnValue($loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
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
			->with($loggedInUser, $targetUser)
			->will($this->returnValue(true));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));
		$targetUser
			->expects($this->once())
			->method('delete')
			->will($this->returnValue(true));

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->deleteUser(['userid' => 'UserToDelete']));
	}

	public function testDeleteUnsuccessfulUserAsSubadmin() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
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
			->will($this->returnValue($loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
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
			->with($loggedInUser, $targetUser)
			->will($this->returnValue(true));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));
		$targetUser
			->expects($this->once())
			->method('delete')
			->will($this->returnValue(false));

		$expected = new Result(null, 101);
		$this->assertEquals($expected, $this->api->deleteUser(['userid' => 'UserToDelete']));
	}

	public function testDeleteUserAsSubAdminAndUserIsNotAccessible() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
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
			->will($this->returnValue($loggedInUser));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('UserToDelete')
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
			->with($loggedInUser, $targetUser)
			->will($this->returnValue(false));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->deleteUser(['userid' => 'UserToDelete']));
	}

	public function testGetUsersGroupsNotLoggedIn() {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue(null));

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->getUsersGroups(['userid' => 'UserToLookup']));
	}

	public function testGetUsersGroupsTargetUserNotExisting() {
		$loggedInUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));

		$expected = new Result(null, 998);
		$this->assertEquals($expected, $this->api->getUsersGroups(['userid' => 'UserToLookup']));
	}

	public function testGetUsersGroupsSelfTargetted() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
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
			->will($this->returnValue($loggedInUser));
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
		$this->assertEquals($expected, $this->api->getUsersGroups(['userid' => 'UserToLookup']));
	}

	public function testGetUsersGroupsForAdminUser() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
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
			->will($this->returnValue($loggedInUser));
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
		$this->assertEquals($expected, $this->api->getUsersGroups(['userid' => 'UserToLookup']));
	}

	public function testGetUsersGroupsForSubAdminUserAndUserIsAccessible() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
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
			->will($this->returnValue($loggedInUser));
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
			->with($loggedInUser, $targetUser)
			->will($this->returnValue(true));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));
		$group1 = $this->createMock(IGroup::class);
		$group1
			->expects($this->any())
			->method('getGID')
			->will($this->returnValue('Group1'));
		$group2 = $this->createMock(IGroup::class);
		$group2
			->expects($this->any())
			->method('getGID')
			->will($this->returnValue('Group2'));
		$subAdminManager
			->expects($this->once())
			->method('getSubAdminsGroups')
			->with($loggedInUser)
			->will($this->returnValue([$group1, $group2]));
		$this->groupManager
			->expects($this->any())
			->method('getUserGroupIds')
			->with($targetUser)
			->will($this->returnValue(['Group1']));

		$expected = new Result(['groups' => ['Group1']]);
		$this->assertEquals($expected, $this->api->getUsersGroups(['userid' => 'UserToLookup']));
	}

	public function testGetUsersGroupsForSubAdminUserAndUserIsInaccessible() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
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
			->will($this->returnValue($loggedInUser));
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
			->with($loggedInUser, $targetUser)
			->will($this->returnValue(false));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));
		$this->groupManager
			->expects($this->any())
			->method('getUserGroupIds')
			->with($targetUser)
			->will($this->returnValue(['Group1']));

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->getUsersGroups(['userid' => 'UserToLookup']));
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
		$_POST['groupid'] = 'GroupToAddTo';

		$loggedInUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('GroupToAddTo')
			->will($this->returnValue(null));

		$expected = new Result(null, 102);
		$this->assertEquals($expected, $this->api->addToGroup(['userid' => 'TargetUser']));
	}

	public function testAddToGroupWithNoGroupSpecified() {
		$loggedInUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));

		$expected = new Result(null, 101);
		$this->assertEquals($expected, $this->api->addToGroup(['userid' => 'TargetUser']));
	}

	public function testAddToGroupWithTargetUserNotExisting() {
		$_POST['groupid'] = 'GroupToAddTo';

		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->will($this->returnValue('admin'));
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('GroupToAddTo')
			->will($this->returnValue($targetGroup));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('admin')
			->will($this->returnValue(true));

		$expected = new Result(null, 103);
		$this->assertEquals($expected, $this->api->addToGroup(['userid' => 'TargetUser']));
	}

	public function testAddToGroupWithoutPermission() {
		$_POST['groupid'] = 'GroupToAddTo';

		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->method('getUID')
			->will($this->returnValue('unauthorizedUser'));
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->groupManager
			->method('get')
			->with('GroupToAddTo')
			->will($this->returnValue($targetGroup));
		$subAdminManager = $this->getMockBuilder('\OC\Subadmin')
			->disableOriginalConstructor()->getMock();
		$this->groupManager
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));
		$this->groupManager
			->method('isAdmin')
			->with('unauthorizedUser')
			->will($this->returnValue(false));

		$expected = new Result(null, 104);
		$this->assertEquals($expected, $this->api->addToGroup(['userid' => 'TargetUser']));
	}

	public function testAddToOutsideGroupAsSubAdminFromSubAdmin() {
		$_POST['groupid'] = 'outsidegroup';

		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$subadminGroup = $this->createMock(IGroup::class);
		$subadminGroup
			->expects($this->any())
			->method('getGID')
			->will($this->returnValue('subadmin'));
		$targetGroup = $this->createMock(IGroup::class);
		$targetGroup
			->expects($this->any())
			->method('getGID')
			->will($this->returnValue('outsidegroup'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->groupManager
			->expects($this->any())
			->method('get')
			->will($this->returnValueMap([
				['subadmin', $subadminGroup],
				['outsidegroup', $targetGroup]
			]));
		$subAdminManager = $this->getMockBuilder('\OC\Subadmin')
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->method('isSubAdminofGroup')
			->with($loggedInUser, $targetGroup)
			->will($this->returnValue(false));
		$this->groupManager
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));
		$this->groupManager
			->expects($this->any())
			->method('isAdmin')
			->with('subadmin')
			->will($this->returnValue(false));

		$expected = new Result(null, 104);
		$this->assertEquals($expected, $this->api->addToGroup(['userid' => 'subadmin']));
	}

	public function testAddToGroupSuccessful() {
		$_POST['groupid'] = 'admin';
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('admin'));
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
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
			->expects($this->any())
			->method('isAdmin')
			->with('admin')
			->will($this->returnValue(true));
		$targetGroup
			->expects($this->once())
			->method('addUser')
			->with($targetUser);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->addToGroup(['userid' => 'AnotherUser']));
	}

	public function testAddToGroupSuccessfulAsSubadmin() {
		$_POST['groupid'] = 'group1';
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->groupManager
			->method('get')
			->with('group1')
			->will($this->returnValue($targetGroup));
		$this->userManager
			->method('get')
			->with('AnotherUser')
			->will($this->returnValue($targetUser));
		$this->groupManager
			->expects($this->any())
			->method('isAdmin')
			->with('subadmin')
			->will($this->returnValue(false));
		$targetGroup
			->method('addUser')
			->with($targetUser);
		$subAdminManager = $this->getMockBuilder('\OC\Subadmin')
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->method('isSubAdminOfGroup')
			->with($loggedInUser, $targetGroup)
			->will($this->returnValue(true));
		$this->groupManager
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, 104);
		$this->assertEquals($expected, $this->api->addToGroup(['userid' => 'AnotherUser']));
	}
	public function testRemoveFromGroupWithoutLogIn() {
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue(null));

		$expected = new Result(null, 997);
		$this->assertEquals($expected, $this->api->removeFromGroup(['userid' => 'TargetUser', '_delete' => ['groupid' => 'TargetGroup']]));
	}

	public function testRemoveFromGroupWithNoTargetGroup() {
		$loggedInUser = $this->createMock(IUser::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$expected = new Result(null, 101);
		$this->assertEquals($expected, $this->api->removeFromGroup(['userid' => 'TargetUser', '_delete' => []]));
	}

	public function testRemoveFromGroupWithNotExistingTargetGroup() {
		$loggedInUser = $this->createMock(IUser::class);
		$this->userSession
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->groupManager
			->method('get')
			->with('TargetGroup')
			->will($this->returnValue(null));

		$expected = new Result(null, 102);
		$this->assertEquals($expected, $this->api->removeFromGroup(['userid' => 'TargetUser', '_delete' => ['groupid' => 'TargetGroup']]));
	}

	public function testRemoveFromGroupWithNotExistingTargetUser() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
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
			->expects($this->once())
			->method('isAdmin')
			->with('subadmin')
			->will($this->returnValue(false));
		$subAdminManager = $this->getMockBuilder('\OC\Subadmin')
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminofGroup')
			->with($loggedInUser, $targetGroup)
			->will($this->returnValue(true));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, 103);
		$this->assertEquals($expected, $this->api->removeFromGroup(['userid' => 'TargetUser', '_delete' => ['groupid' => 'TargetGroup']]));
	}

	public function testRemoveFromGroupWithoutPermission() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->once())
			->method('getUID')
			->will($this->returnValue('unauthorizedUser'));
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('get')
			->with('TargetGroup')
			->will($this->returnValue($targetGroup));
		$subAdminManager = $this->getMockBuilder('\OC\Subadmin')
			->disableOriginalConstructor()->getMock();
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->with('unauthorizedUser')
			->will($this->returnValue(false));

		$expected = new Result(null, 104);
		$this->assertEquals($expected, $this->api->removeFromGroup(['userid' => 'TargetUser', '_delete' => ['groupid' => 'TargetGroup']]));
	}

	public function testRemoveFromGroupAsAdminFromAdmin() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
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
			->will($this->returnValue($loggedInUser));
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
			->expects($this->any())
			->method('isAdmin')
			->with('admin')
			->will($this->returnValue(true));

		$expected = new Result(null, 105, 'Cannot remove yourself from the admin group');
		$this->assertEquals($expected, $this->api->removeFromGroup(['userid' => 'admin', '_delete' => ['groupid' => 'admin']]));
	}

	public function testRemoveFromGroupAsSubAdminFromSubAdmin() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$targetGroup
			->expects($this->any())
			->method('getGID')
			->will($this->returnValue('subadmin'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
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
		$subAdminManager = $this->getMockBuilder(SubAdmin::class)
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminofGroup')
			->with($loggedInUser, $targetGroup)
			->will($this->returnValue(true));
		$subAdminManager
			->expects($this->once())
			->method('getSubAdminsGroups')
			->with($loggedInUser)
			->will($this->returnValue([$targetGroup]));
		$this->groupManager
			->expects($this->any())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));
		$this->groupManager
			->expects($this->any())
			->method('isAdmin')
			->with('subadmin')
			->will($this->returnValue(false));

		$expected = new Result(null, 105, 'Cannot remove yourself from this group as you are a SubAdmin');
		$this->assertEquals($expected, $this->api->removeFromGroup(['userid' => 'subadmin', '_delete' => ['groupid' => 'subadmin']]));
	}

	public function testRemoveFromGroupSuccessful() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('admin'));
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
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
			->expects($this->any())
			->method('isAdmin')
			->with('admin')
			->will($this->returnValue(true));
		$targetGroup
			->expects($this->once())
			->method('removeUser')
			->with($targetUser);

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->removeFromGroup(['userid' => 'AnotherUser', '_delete' => ['groupid' => 'admin']]));
	}

	public function testRemoveFromGroupSuccessfulAsSubadmin() {
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->any())
			->method('getUID')
			->will($this->returnValue('subadmin'));
		$targetUser = $this->createMock(IUser::class);
		$targetGroup = $this->createMock(IGroup::class);
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
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
			->expects($this->any())
			->method('isAdmin')
			->with('subadmin')
			->will($this->returnValue(false));
		$targetGroup
			->expects($this->once())
			->method('removeUser')
			->with($targetUser);
		$subAdminManager = $this->getMockBuilder('\OC\Subadmin')
			->disableOriginalConstructor()->getMock();
		$subAdminManager
			->expects($this->once())
			->method('isSubAdminOfGroup')
			->with($loggedInUser, $targetGroup)
			->will($this->returnValue(true));
		$this->groupManager
			->expects($this->once())
			->method('getSubAdmin')
			->will($this->returnValue($subAdminManager));

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->removeFromGroup(['userid' => 'AnotherUser', '_delete' => ['groupid' => 'group1']]));
	}

	public function testAddSubAdminWithNotExistingTargetUser() {
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('NotExistingUser')
			->will($this->returnValue(null));

		$expected = new Result(null, 101, 'User does not exist');
		$this->assertEquals($expected, $this->api->addSubAdmin(['userid' => 'NotExistingUser']));
	}

	public function testAddSubAdminWithNotExistingTargetGroup() {
		$_POST['groupid'] = 'NotExistingGroup';

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
		$this->assertEquals($expected, $this->api->addSubAdmin(['userid' => 'ExistingUser']));
	}

	public function testAddSubAdminToAdminGroup() {
		$_POST['groupid'] = 'ADmiN';

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
		$this->assertEquals($expected, $this->api->addSubAdmin(['userid' => 'ExistingUser']));
	}

	public function testAddSubAdminTwice() {
		$_POST['groupid'] = 'TargetGroup';

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
		$this->assertEquals($expected, $this->api->addSubAdmin(['userid' => 'ExistingUser']));
	}

	public function testAddSubAdminSuccessful() {
		$_POST['groupid'] = 'TargetGroup';

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
		$this->assertEquals($expected, $this->api->addSubAdmin(['userid' => 'ExistingUser']));
	}

	public function testAddSubAdminUnsuccessful() {
		$_POST['groupid'] = 'TargetGroup';

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
		$this->assertEquals($expected, $this->api->addSubAdmin(['userid' => 'ExistingUser']));
	}

	public function testRemoveSubAdminNotExistingTargetUser() {
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('NotExistingUser')
			->will($this->returnValue(null));

		$expected = new Result(null, 101, 'User does not exist');
		$this->assertEquals($expected, $this->api->removeSubAdmin(['userid' => 'NotExistingUser', '_delete' => ['groupid' => 'GroupToDeleteFrom']]));
	}

	public function testRemoveSubAdminNotExistingTargetGroup() {
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
		$this->assertEquals($expected, $this->api->removeSubAdmin(['userid' => 'ExistingUser', '_delete' => ['groupid' => 'GroupToDeleteFrom']]));
	}

	public function testRemoveSubAdminFromNotASubadmin() {
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
		$this->assertEquals($expected, $this->api->removeSubAdmin(['userid' => 'ExistingUser', '_delete' => ['groupid' => 'GroupToDeleteFrom']]));
	}

	public function testRemoveSubAdminSuccessful() {
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
		$this->assertEquals($expected, $this->api->removeSubAdmin(['userid' => 'ExistingUser', '_delete' => ['groupid' => 'GroupToDeleteFrom']]));
	}

	public function testRemoveSubAdminUnsuccessful() {
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
		$this->assertEquals($expected, $this->api->removeSubAdmin(['userid' => 'ExistingUser', '_delete' => ['groupid' => 'GroupToDeleteFrom']]));
	}

	public function testGetUserSubAdminGroupsNotExistingTargetUser() {
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('RequestedUser')
			->will($this->returnValue(null));

		$expected = new Result(null, 101, 'User does not exist');
		$this->assertEquals($expected, $this->api->getUserSubAdminGroups(['userid' => 'RequestedUser']));
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
		$this->assertEquals($expected, $this->api->getUserSubAdminGroups(['userid' => 'RequestedUser']));
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
		$this->assertEquals($expected, $this->api->getUserSubAdminGroups(['userid' => 'RequestedUser']));
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
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->exactly(2))
			->method('getUID')
			->will($this->returnValue('admin'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->will($this->returnValue(true));

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->enableUser(['userid' => 'RequestedUser']));
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
		$loggedInUser = $this->createMock(IUser::class);
		$loggedInUser
			->expects($this->exactly(2))
			->method('getUID')
			->will($this->returnValue('admin'));
		$this->userSession
			->expects($this->once())
			->method('getUser')
			->will($this->returnValue($loggedInUser));
		$this->groupManager
			->expects($this->once())
			->method('isAdmin')
			->will($this->returnValue(true));

		$expected = new Result(null, 100);
		$this->assertEquals($expected, $this->api->disableUser(['userid' => 'RequestedUser']));
	}
}
