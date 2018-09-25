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

namespace Test\User\Service;

use OC\AppFramework\Http;
use OC\Mail\Message;
use OC\User\Service\SigninWithEmail;
use OC\User\User;
use OCP\App\IAppManager;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IAvatarManager;
use OCP\IConfig;
use OCP\IGroupManager;
use OCP\IL10N;
use OCP\ILogger;
use OCP\ISubAdminManager;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IUserManager;
use OCP\IUserSession;
use OCP\Mail\IMailer;
use OCP\Security\ISecureRandom;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Test\TestCase;

class SigninWithEmailTest extends TestCase {
	/** @var IUserSession | \PHPUnit_Framework_MockObject_MockObject */
	private $userSession;
	/** @var IGroupManager | PHPUnit_Framework_MockObject_MockObject */
	private $groupManager;
	/** @var IURLGenerator | PHPUnit_Framework_MockObject_MockObject */
	private $urlGenerator;
	/** @var IUserManager | PHPUnit_Framework_MockObject_MockObject */
	private $userManager;
	/** @var ISecureRandom | PHPUnit_Framework_MockObject_MockObject */
	private $secureRandom;
	/** @var \OC_Defaults | PHPUnit_Framework_MockObject_MockObject */
	private $defaults;
	/** @var ITimeFactory | PHPUnit_Framework_MockObject_MockObject */
	private $timeFactory;
	/** @var IMailer | PHPUnit_Framework_MockObject_MockObject */
	private $mailer;
	/** @var IL10N | PHPUnit_Framework_MockObject_MockObject */
	private $l10n;
	/** @var ILogger | PHPUnit_Framework_MockObject_MockObject */
	private $log;
	/** @var IConfig | PHPUnit_Framework_MockObject_MockObject */
	private $config;
	/** @var IAppManager | PHPUnit_Framework_MockObject_MockObject */
	private $appManager;
	/** @var IAvatarManager | PHPUnit_Framework_MockObject_MockObject */
	private $avatarManager;
	/** @var EventDispatcherInterface | PHPUnit_Framework_MockObject_MockObject */
	private $eventDispatcher;
	/** @var SigninWithEmail */
	private $signinWithEmail;

	protected function setUp() {
		parent::setUp();

		$this->userSession = $this->createMock(IUserSession::class);
		$this->groupManager = $this->createMock(IGroupManager::class);
		$this->urlGenerator = $this->createMock(IURLGenerator::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->secureRandom = $this->createMock(ISecureRandom::class);
		$this->defaults = $this->createMock(\OC_Defaults::class);
		$this->timeFactory = $this->createMock(ITimeFactory::class);
		$this->mailer = $this->createMock(IMailer::class);
		$this->l10n = $this->createMock(IL10N::class);
		$this->log = $this->createMock(ILogger::class);
		$this->config = $this->createMock(IConfig::class);
		$this->appManager = $this->createMock(IAppManager::class);
		$this->avatarManager = $this->createMock(IAvatarManager::class);
		$this->eventDispatcher = $this->createMock(EventDispatcherInterface::class);
		$this->signinWithEmail = new SigninWithEmail($this->userSession, $this->groupManager,
			$this->urlGenerator, $this->userManager, $this->secureRandom, $this->defaults,
			$this->timeFactory, $this->mailer, $this->l10n, $this->log, $this->config,
			$this->appManager, $this->avatarManager, $this->eventDispatcher);
	}

	public function testCreateUserWithoutGroupsAndNotAdmin() {
		$user = $this->createMock(IUser::class);
		$user->expects($this->any())
			->method('getUID')
			->willReturn('user1');
		$newUser = $this->createMock(User::class);
		$newUser->expects($this->any())
			->method('getUID')
			->willReturn('foo');
		$newUser->expects($this->any())
			->method('isEnabled')
			->willReturn(true);
		$newUser->expects($this->any())
			->method('getHome')
			->willReturn("/home/foo");
		$newUser->expects($this->any())
			->method('getLastLogin')
			->willReturn(0);
		$newUser->expects($this->any())
			->method('getBackendClassName')
			->willReturn('OC_User_Database');

		$this->userSession->expects($this->any())
			->method('getUser')
			->willReturn($user);

		$this->userManager->expects($this->any())
			->method('userExists')
			->with('foo')
			->willReturn(false);
		$this->userManager->expects($this->any())
			->method('createUser')
			->willReturn($newUser);

		$subAdminManager = $this->createMock(ISubAdminManager::class);
		$subAdminManager->expects($this->any())
			->method('getSubAdminsGroups')
			->willReturn([]);

		$this->groupManager->expects($this->any())
			->method('isAdmin')
			->willReturn(false);
		$this->groupManager->expects($this->any())
			->method('getSubAdmin')
			->willReturn($subAdminManager);
		$this->groupManager->expects($this->any())
			->method('getUserGroupIds')
			->with($newUser)
			->willReturn([]);

		$expectedResponse = new DataResponse(
			[
				'name' => 'foo',
				'displayname' => null,
				'groups' => [],
				'subadmin' => [],
				'isEnabled' => true,
				'quota' => null,
				'storageLocation' => "/home/foo",
				'lastLogin' => 0,
				'backend' => 'OC_User_Database',
				'email' => null,
				'isRestoreDisabled' => false,
				'isAvatarAvailable' => false,
			], Http::STATUS_CREATED
		);

		$response = $this->signinWithEmail->create('foo', '123');
		$this->assertEquals($response, $expectedResponse);
	}

	public function testCreateUserWithoutGroupsAndAdmin() {
		$user = $this->createMock(IUser::class);
		$user->expects($this->any())
			->method('getUID')
			->willReturn('user1');
		$newUser = $this->createMock(User::class);
		$newUser->expects($this->any())
			->method('getUID')
			->willReturn('foo');
		$newUser->expects($this->any())
			->method('isEnabled')
			->willReturn(true);
		$newUser->expects($this->any())
			->method('getHome')
			->willReturn("/home/foo");
		$newUser->expects($this->any())
			->method('getLastLogin')
			->willReturn(0);
		$newUser->expects($this->any())
			->method('getBackendClassName')
			->willReturn('OC_User_Database');

		$this->userSession->expects($this->any())
			->method('getUser')
			->willReturn($user);

		$this->userManager->expects($this->any())
			->method('userExists')
			->with('foo')
			->willReturn(false);
		$this->userManager->expects($this->any())
			->method('createUser')
			->willReturn($newUser);

		$subAdminManager = $this->createMock(ISubAdminManager::class);
		$subAdminManager->expects($this->any())
			->method('getSubAdminsGroups')
			->willReturn([]);

		$this->groupManager->expects($this->any())
			->method('isAdmin')
			->willReturn(true);
		$this->groupManager->expects($this->any())
			->method('getSubAdmin')
			->willReturn($subAdminManager);
		$this->groupManager->expects($this->any())
			->method('getUserGroupIds')
			->with($newUser)
			->willReturn([]);

		$expectedResponse = new DataResponse(
			[
				'name' => 'foo',
				'displayname' => null,
				'groups' => [],
				'subadmin' => [],
				'isEnabled' => true,
				'quota' => null,
				'storageLocation' => "/home/foo",
				'lastLogin' => 0,
				'backend' => 'OC_User_Database',
				'email' => null,
				'isRestoreDisabled' => false,
				'isAvatarAvailable' => false,
			], Http::STATUS_CREATED
		);

		$response = $this->signinWithEmail->create('foo', '123');
		$this->assertEquals($response, $expectedResponse);
	}

	public function testCreateUserWithUserNameAndEmail() {
		$user = $this->createMock(IUser::class);
		$user->expects($this->any())
			->method('getUID')
			->willReturn('user1');
		$newUser = $this->createMock(User::class);
		$newUser->expects($this->any())
			->method('getUID')
			->willReturn('foo');
		$newUser->expects($this->any())
			->method('isEnabled')
			->willReturn(true);
		$newUser->expects($this->any())
			->method('getHome')
			->willReturn("/home/foo");
		$newUser->expects($this->any())
			->method('getLastLogin')
			->willReturn(0);
		$newUser->expects($this->any())
			->method('getBackendClassName')
			->willReturn('OC_User_Database');

		$this->userSession->expects($this->any())
			->method('getUser')
			->willReturn($user);

		$this->userManager->expects($this->any())
			->method('userExists')
			->with('foo')
			->willReturn(false);
		$this->userManager->expects($this->any())
			->method('createUser')
			->willReturn($newUser);

		$subAdminManager = $this->createMock(ISubAdminManager::class);
		$subAdminManager->expects($this->any())
			->method('getSubAdminsGroups')
			->willReturn([]);

		$this->groupManager->expects($this->any())
			->method('isAdmin')
			->willReturn(false);
		$this->groupManager->expects($this->any())
			->method('getSubAdmin')
			->willReturn($subAdminManager);
		$this->groupManager->expects($this->any())
			->method('getUserGroupIds')
			->with($newUser)
			->willReturn([]);

		$this->eventDispatcher->expects($this->any())
			->method('dispatch')
			->with('OCP\User::createPassword', new GenericEvent());

		$this->secureRandom->expects($this->any())
			->method('generate')
			->willReturn('1FooBar234');

		$this->urlGenerator->expects($this->any())
			->method('linkToRouteAbsolute')
			->willReturn('http://localhost/foo/setpassword');

		$message = $this->createMock(Message::class);
		$this->mailer->expects($this->any())
			->method('createMessage')
			->willReturn($message);
		$this->mailer->expects($this->any())
			->method('validateMailAddress')
			->willReturn(true);

		$expectedResponse = new DataResponse(
			[
				'name' => 'foo',
				'displayname' => null,
				'groups' => [],
				'subadmin' => [],
				'isEnabled' => true,
				'quota' => null,
				'storageLocation' => "/home/foo",
				'lastLogin' => 0,
				'backend' => 'OC_User_Database',
				'email' => null,
				'isRestoreDisabled' => false,
				'isAvatarAvailable' => false,
			], Http::STATUS_CREATED
		);

		$response = $this->signinWithEmail->create('foo', '', [], 'foo@bar.com');
		$this->assertEquals($response, $expectedResponse);
	}

	public function testInvalidEmailAddress() {
		$this->mailer->expects($this->once())
			->method('validateMailAddress')
			->willReturn(false);

		$this->l10n->expects($this->any())
			->method('t')
			->willReturn('Invalid mail address');

		$expectedResponse = new DataResponse([
			'message' => 'Invalid mail address'
		], Http::STATUS_UNPROCESSABLE_ENTITY);

		$response = $this->signinWithEmail->create('foo', '', [], 'foo@bar.com');
		$this->assertEquals($response, $expectedResponse);
	}

	public function testUserAlreadyExists() {
		$this->l10n->expects($this->any())
			->method('t')
			->willReturn('A user with that name already exists.');

		$this->groupManager->expects($this->any())
			->method('isAdmin')
			->willReturn(true);

		$this->userManager->expects($this->any())
			->method('userExists')
			->willReturn(true);

		$expectedResponse = new DataResponse([
			'message' => 'A user with that name already exists.'
		], Http::STATUS_CONFLICT);

		$response = $this->signinWithEmail->create('foo', '123');
		$this->assertEquals($response, $expectedResponse);
	}

	public function testUnableToCreateUser() {
		$this->l10n->expects($this->any())
			->method('t')
			->willReturn('Unable to create user.');

		$this->groupManager->expects($this->any())
			->method('isAdmin')
			->willReturn(true);

		$this->userManager->expects($this->any())
			->method('userExists')
			->willReturn(false);

		$this->userManager->expects($this->any())
			->method('createUser')
			->willThrowException(new \Exception('Unable to create user.'));

		$expectedResponse = new DataResponse([
			'message' => 'Unable to create user.'
		], Http::STATUS_FORBIDDEN);

		$response = $this->signinWithEmail->create('foo', '123');
		$this->assertEquals($response, $expectedResponse);
	}
}
