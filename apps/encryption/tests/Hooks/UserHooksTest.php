<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Clark Tomlinson <fallen013@gmail.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
 * @author Sujith Haridasan <sharidasan@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\Encryption\Tests\Hooks;

use OC\User\Manager;
use OCA\Encryption\Crypto\Crypt;
use OCA\Encryption\Hooks\UserHooks;
use OCA\Encryption\KeyManager;
use OCA\Encryption\Recovery;
use OCA\Encryption\Session;
use OCA\Encryption\Users\Setup;
use OCA\Encryption\Util;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IUserSession;
use Test\TestCase;

/**
 * Class UserHooksTest
 *
 * @group DB
 * @package OCA\Encryption\Tests\Hooks
 */
class UserHooksTest extends TestCase {
	/**
	 * @var \PHPUnit\Framework\MockObject\MockObject
	 */
	private $utilMock;
	/**
	 * @var \PHPUnit\Framework\MockObject\MockObject
	 */
	private $recoveryMock;
	/**
	 * @var \PHPUnit\Framework\MockObject\MockObject
	 */
	private $sessionMock;
	/**
	 * @var \PHPUnit\Framework\MockObject\MockObject
	 */
	private $keyManagerMock;
	/**
	 * @var \PHPUnit\Framework\MockObject\MockObject
	 */
	private $userManagerMock;

	/**
	 * @var \PHPUnit\Framework\MockObject\MockObject
	 */
	private $userSetupMock;
	/**
	 * @var \PHPUnit\Framework\MockObject\MockObject
	 */
	private $userSessionMock;
	/**
	 * @var \PHPUnit\Framework\MockObject\MockObject
	 */
	private $cryptMock;
	/**
	 * @var \PHPUnit\Framework\MockObject\MockObject
	 */
	private $loggerMock;
	private $config;
	/**
	 * @var UserHooks
	 */
	private $instance;

	private $params = ['uid' => 'testUser', 'password' => 'password'];

	public function testLogin() {
		$this->userSetupMock->expects($this->once())
			->method('setupUser')
			->willReturnOnConsecutiveCalls(true, false);

		$this->keyManagerMock->expects($this->once())
			->method('init')
			->with('testUser', 'password');

		$this->config->expects($this->once())
			->method('getAppValue')
			->willReturnMap([
				['encryption', 'userSpecificKey', '', ''],
			]);

		$this->assertNull($this->instance->login($this->params));
	}

	public function testLogout() {
		$this->sessionMock->expects($this->once())
			->method('clear');
		$this->instance->logout();
		$this->assertTrue(true);
	}

	public function testPostCreateUser() {
		$this->userSetupMock->expects($this->once())
			->method('setupUser');

		$this->instance->postCreateUser($this->params);
		$this->assertTrue(true);
	}

	public function testPostDeleteUser() {
		$this->keyManagerMock->expects($this->once())
			->method('deletePublicKey')
			->with('testUser');

		$this->instance->postDeleteUser($this->params);
		$this->assertTrue(true);
	}

	/**
	 * @dataProvider dataTestPreSetPassphrase
	 */
	public function testPreSetPassphrase($canChange) {

		/** @var UserHooks | \PHPUnit\Framework\MockObject\MockObject  $instance */
		$instance = $this->getMockBuilder('OCA\Encryption\Hooks\UserHooks')
			->setConstructorArgs(
				[
					$this->keyManagerMock,
					$this->userManagerMock,
					$this->loggerMock,
					$this->userSetupMock,
					$this->userSessionMock,
					$this->utilMock,
					$this->sessionMock,
					$this->cryptMock,
					$this->recoveryMock,
					$this->config
				]
			)
			->setMethods(['setPassphrase'])
			->getMock();

		$userMock = $this->createMock('OCP\IUser');

		$this->userManagerMock->expects($this->once())
			->method('get')
			->with($this->params['uid'])
			->willReturn($userMock);
		$userMock->expects($this->once())
			->method('canChangePassword')
			->willReturn($canChange);

		if ($canChange) {
			// in this case the password will be changed in the post hook
			$instance->expects($this->never())->method('setPassphrase');
		} else {
			// if user can't change the password we update the encryption
			// key password already in the pre hook
			$instance->expects($this->once())
				->method('setPassphrase')
				->with($this->params);
		}

		$instance->preSetPassphrase($this->params);
	}

	public function dataTestPreSetPassphrase() {
		return [
			[true],
			[false]
		];
	}

	public function testSetPassphrase() {
		$this->sessionMock->expects($this->exactly(4))
			->method('getPrivateKey')
			->willReturnOnConsecutiveCalls(true, false);

		$this->cryptMock->expects($this->exactly(4))
			->method('encryptPrivateKey')
			->willReturn(true);

		$this->cryptMock->expects($this->any())
			->method('generateHeader')
			->willReturn(Crypt::HEADER_START . ':Cipher:test:' . Crypt::HEADER_END);

		$this->keyManagerMock->expects($this->exactly(4))
			->method('setPrivateKey')
			->willReturnCallback(function ($user, $key) {
				$header = \substr($key, 0, \strlen(Crypt::HEADER_START));
				$this->assertSame(
					Crypt::HEADER_START,
					$header, 'every encrypted file should start with a header');
			});

		$this->assertNull($this->instance->setPassphrase($this->params));
		$this->params['recoveryPassword'] = 'password';

		$this->recoveryMock->expects($this->exactly(3))
			->method('isRecoveryEnabledForUser')
			->with('testUser')
			->willReturnOnConsecutiveCalls(true, false);

		$this->instance = $this->getMockBuilder('OCA\Encryption\Hooks\UserHooks')
			->setConstructorArgs(
				[
					$this->keyManagerMock,
					$this->userManagerMock,
					$this->loggerMock,
					$this->userSetupMock,
					$this->userSessionMock,
					$this->utilMock,
					$this->sessionMock,
					$this->cryptMock,
					$this->recoveryMock,
					$this->config
				]
			)->setMethods(['initMountPoints'])->getMock();

		$this->instance->expects($this->exactly(3))->method('initMountPoints');

		// Test first if statement
		$this->assertNull($this->instance->setPassphrase($this->params));

		// Test Second if conditional
		$this->keyManagerMock->expects($this->exactly(2))
			->method('userHasKeys')
			->with('testUser')
			->willReturn(true);

		$this->assertNull($this->instance->setPassphrase($this->params));

		// Test third and final if condition
		$this->utilMock->expects($this->once())
			->method('userHasFiles')
			->with('testUser')
			->willReturn(false);

		$this->cryptMock->expects($this->once())
			->method('createKeyPair');

		$this->keyManagerMock->expects($this->once())
			->method('setPrivateKey');

		$this->recoveryMock->expects($this->once())
			->method('recoverUsersFiles')
			->with('password', 'testUser');

		$this->assertNull($this->instance->setPassphrase($this->params));
	}

	/**
	 * Test setPassphrase without session and no logger error should appear
	 */
	public function testSetPassphraseWithoutSession() {
		$keyManager = $this->createMock(KeyManager::class);
		$userManager = $this->createMock(Manager::class);
		$logger = $this->createMock(ILogger::class);
		$setUp = $this->createMock(Setup::class);
		$userSession = $this->createMock(IUserSession::class);
		$encryptionUtil = $this->createMock(Util::class);
		$encryptionSession = $this->createMock(Session::class);
		$recovery = $this->createMock(Recovery::class);
		$crypt = $this->createMock(Crypt::class);
		$config = $this->createMock(IConfig::class);

		//$userHooks = new UserHooks($keyManager, $userManager, $logger, $setUp, $userSession, $encryptionUtil, $encryptionSession, $crypt, $recovery, $config);
		$userHooks = $this->getMockBuilder(UserHooks::class)
			->setConstructorArgs([
				$keyManager, $userManager, $logger,
				$setUp, $userSession, $encryptionUtil,
				$encryptionSession, $crypt, $recovery, $config
			])->setMethods(['initMountPoints'])->getMock();

		$userSession->expects($this->any())
			->method('getUser')
			->willReturn(null);

		$crypt->expects($this->any())
			->method('encryptPrivateKey')
			->willReturn(true);

		$keyManager->expects($this->any())
			->method('setPrivateKey')
			->willReturn(true);

		//No logger error should appear
		$logger->expects($this->never())
			->method('error');

		$userHooks->setPassphrase($this->params);
	}

	public function testSetPassphraseWithoutSessionLoggerError() {
		$keyManager = $this->createMock(KeyManager::class);
		$userManager = $this->createMock(Manager::class);
		$logger = $this->createMock(ILogger::class);
		$setUp = $this->createMock(Setup::class);
		$userSession = $this->createMock(IUserSession::class);
		$encryptionUtil = $this->createMock(Util::class);
		$encryptionSession = $this->createMock(Session::class);
		$recovery = $this->createMock(Recovery::class);
		$crypt = $this->createMock(Crypt::class);
		$config = $this->createMock(IConfig::class);

		//$userHooks = new UserHooks($keyManager, $userManager, $logger, $setUp, $userSession, $encryptionUtil, $encryptionSession, $crypt, $recovery, $config);
		$userHooks = $this->getMockBuilder(UserHooks::class)
			->setConstructorArgs([
				$keyManager, $userManager, $logger,
				$setUp, $userSession, $encryptionUtil,
				$encryptionSession, $crypt, $recovery, $config
			])->setMethods(['initMountPoints'])->getMock();

		$userSession->expects($this->any())
			->method('getUser')
			->willReturn(null);

		$crypt->expects($this->any())
			->method('encryptPrivateKey')
			->willReturn(false);

		//No logger error should appear
		$logger->expects($this->any())
			->method('error')
			->with('Encryption Could not update users encryption password');

		$this->assertNull($userHooks->setPassphrase($this->params));
	}

	public function testSetPasswordNoUser() {
		$this->sessionMock->expects($this->any())
			->method('getPrivateKey')
			->willReturn(true);

		$userSessionMock = $this->getMockBuilder('OCP\IUserSession')
			->disableOriginalConstructor()
			->getMock();

		$userSessionMock->expects($this->any())->method('getUser')->will($this->returnValue(null));

		$this->recoveryMock->expects($this->once())
			->method('isRecoveryEnabledForUser')
			->with('testUser')
			->willReturn(false);

		$userHooks = $this->getMockBuilder('OCA\Encryption\Hooks\UserHooks')
			->setConstructorArgs(
				[
					$this->keyManagerMock,
					$this->userManagerMock,
					$this->loggerMock,
					$this->userSetupMock,
					$userSessionMock,
					$this->utilMock,
					$this->sessionMock,
					$this->cryptMock,
					$this->recoveryMock,
					$this->config
				]
			)->setMethods(['initMountPoints'])->getMock();

		/** @var \OCA\Encryption\Hooks\UserHooks $userHooks */
		$this->assertNull($userHooks->setPassphrase($this->params));
	}

	public function testPostPasswordReset() {
		$this->keyManagerMock->expects($this->once())
			->method('deleteUserKeys')
			->with('testUser');

		$this->userSetupMock->expects($this->once())
			->method('setupUser')
			->with('testUser', 'password');

		$this->instance->postPasswordReset($this->params);
		$this->assertTrue(true);
	}

	protected function setUp() {
		parent::setUp();
		$this->loggerMock = $this->createMock('OCP\ILogger');
		$this->keyManagerMock = $this->getMockBuilder('OCA\Encryption\KeyManager')
			->disableOriginalConstructor()
			->getMock();
		$this->userManagerMock = $this->getMockBuilder('OCP\IUserManager')
			->disableOriginalConstructor()
			->getMock();
		$this->userSetupMock = $this->getMockBuilder('OCA\Encryption\Users\Setup')
			->disableOriginalConstructor()
			->getMock();

		$this->userSessionMock = $this->getMockBuilder('OCP\IUserSession')
			->disableOriginalConstructor()
			->setMethods([
				'isLoggedIn',
				'getUID',
				'login',
				'logout',
				'setUser',
				'getUser',
				'canChangePassword'
			])
			->getMock();

		$this->userSessionMock->expects($this->any())->method('getUID')->will($this->returnValue('testUser'));

		$this->userSessionMock->expects($this->any())
			->method($this->anything())
			->will($this->returnSelf());

		/*$utilMock = $this->getMockBuilder('OCA\Encryption\Util')
			->disableOriginalConstructor()
			->getMock();*/

		$sessionMock = $this->getMockBuilder('OCA\Encryption\Session')
			->disableOriginalConstructor()
			->getMock();

		$this->cryptMock = $this->getMockBuilder('OCA\Encryption\Crypto\Crypt')
			->disableOriginalConstructor()
			->getMock();
		$recoveryMock = $this->getMockBuilder('OCA\Encryption\Recovery')
			->disableOriginalConstructor()
			->getMock();
		$this->config = $this->createMock(IConfig::class);

		$this->sessionMock = $sessionMock;
		$this->recoveryMock = $recoveryMock;
		$this->utilMock = $this->createMock(Util::class);
		$this->utilMock->expects($this->any())->method('isMasterKeyEnabled')->willReturn(false);

		$this->instance = $this->getMockBuilder('OCA\Encryption\Hooks\UserHooks')
			->setConstructorArgs(
				[
					$this->keyManagerMock,
					$this->userManagerMock,
					$this->loggerMock,
					$this->userSetupMock,
					$this->userSessionMock,
					$this->utilMock,
					$this->sessionMock,
					$this->cryptMock,
					$this->recoveryMock,
					$this->config
				]
			)->setMethods(['setupFS'])->getMock();
	}
}
