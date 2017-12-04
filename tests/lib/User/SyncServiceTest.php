<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Tom Needham <tom@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace Test\User;

use OC\User\Account;
use OC\User\AccountMapper;
use OC\User\Database;
use OC\User\SyncService;
use OCP\AppFramework\Db\DoesNotExistException;
use OCP\IConfig;
use OCP\ILogger;
use OCP\User\IProvidesHomeBackend;
use OCP\UserInterface;
use Test\TestCase;

class SyncServiceTest extends TestCase {

	public function testSetupAccount() {
		$mapper = $this->createMock(AccountMapper::class);
		$backend = $this->createMock(UserInterface::class);
		$config = $this->createMock(IConfig::class);
		$logger = $this->createMock(ILogger::class);

		$config->expects($this->any())->method('getUserKeys')->willReturnMap([
			['user1', 'core', []],
			['user1', 'login', []],
			['user1', 'settings', ['email']],
			['user1', 'files', []],
		]);
		$config->expects($this->any())->method('getUserValue')->willReturnMap([
			['user1', 'settings', 'email', '', 'foo@bar.net'],
		]);

		$s = new SyncService($config, $logger, $mapper);
		$a = new Account();
		$a->setUserId('user1');
		$s->syncAccount($a, $backend);

		$this->assertEquals('foo@bar.net', $a->getEmail());
	}

	/**
	 * Pass in a backend that has new users anc check that they accounts are inserted
	 */
	public function testSetupNewAccount() {
		$mapper = $this->createMock(AccountMapper::class);
		$backend = $this->createMock(UserInterface::class);
		$config = $this->createMock(IConfig::class);
		$logger = $this->createMock(ILogger::class);
		$account = $this->createMock(Account::class);

		$backendUids = ['thisuserhasntbeenseenbefore'];
		$backend->expects($this->once())->method('getUsers')->willReturn($backendUids);

		// We expect the mapper to be called to find the uid
		$mapper->expects($this->once())->method('getByUid')->with($backendUids[0])->willThrowException(new DoesNotExistException('entity not found'));

		// Lets provide some config for the user
		$config->expects($this->at(0))->method('getUserKeys')->with($backendUids[0], 'core')->willReturn([]);
		$config->expects($this->at(1))->method('getUserKeys')->with($backendUids[0], 'login')->willReturn([]);
		$config->expects($this->at(2))->method('getUserKeys')->with($backendUids[0], 'settings')->willReturn([]);
		$config->expects($this->at(3))->method('getUserKeys')->with($backendUids[0], 'files')->willReturn([]);

		// Pretend we dont update anything
		$account->expects($this->any())->method('getUpdatedFields')->willReturn([]);

		// Then we should try to setup a new account and insert
		$mapper->expects($this->once())->method('insert')->with($this->callback(function($arg) use ($backendUids) {
			return $arg instanceof Account && $arg->getUserId() === $backendUids[0];
		}));

		// Ignore state flag



		$s = new SyncService($config, $logger, $mapper);
		$s->run($backend, function($uid) {});

		$this->invokePrivate($s, 'syncHome', [$account, $backend]);
	}

	public function testSyncHomeLogsWhenBackendDiffersFromExisting() {
		/** @var AccountMapper | \PHPUnit_Framework_MockObject_MockObject $mapper */
		$mapper = $this->createMock(AccountMapper::class);
		/** @var UserInterface | IProvidesHomeBackend | \PHPUnit_Framework_MockObject_MockObject $backend */
		$backend = $this->createMock([UserInterface::class, IProvidesHomeBackend::class]);
		/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject $config */
		$config = $this->createMock(IConfig::class);
		/** @var ILogger | \PHPUnit_Framework_MockObject_MockObject $logger */
		$logger = $this->createMock(ILogger::class);
		$a = $this->getMockBuilder(Account::class)->setMethods(['getHome'])->getMock();

		// Accoutn returns existing home
		$a->expects($this->exactly(3))->method('getHome')->willReturn('existing');

		// Backend returns a new home
		$backend->expects($this->exactly(3))->method('getHome')->willReturn('newwrongvalue');

		// Should produce an error in the log if backend home different from stored account home
		$logger->expects($this->once())->method('error');

		$s = new SyncService($config, $logger, $mapper);

		$this->invokePrivate($s, 'syncHome', [$a, $backend]);
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testTrySyncExistingUserWithOtherBackend() {
		$uid = 'myTestUser';

		/** @var AccountMapper | \PHPUnit_Framework_MockObject_MockObject $mapper */
		$mapper = $this->createMock(AccountMapper::class);
		$wrongBackend = new Database();
		/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject $config */
		$config = $this->createMock(IConfig::class);
		/** @var ILogger | \PHPUnit_Framework_MockObject_MockObject $logger */
		$logger = $this->createMock(ILogger::class);

		$a = $this->getMockBuilder(Account::class)->setMethods(['getBackend'])->getMock();
		$a->expects($this->exactly(2))->method('getBackend')->willReturn('OriginalBackedClass');

		$mapper->expects($this->once())->method('getByUid')->with($uid)->willReturn($a);

		$s = new SyncService($config, $logger, $mapper);

		$s->createOrSyncAccount($uid, $wrongBackend);
	}
}