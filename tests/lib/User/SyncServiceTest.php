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
use OC\User\SyncService;
use OCP\IConfig;
use OCP\ILogger;
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

	public function testSyncHomeLogsWhenBackendDiffersFromExisting() {
		$mapper = $this->createMock(AccountMapper::class);
		$backend = $this->createMock(UserInterface::class);
		$config = $this->createMock(IConfig::class);
		$logger = $this->createMock(ILogger::class);
		$a = $this->createMock(Account::class);

		// Accoutn returns existing home
		$a->expects($this->once())->method('getHome')->willReturn('existing');

		// Backend returns a new home
		$backend->expects($this->exactly(2))->method('getHome')->willReturn('newwrongvalue');

		// Should produce an error in the log if backend home different from stored account home
		$logger->expects($this->once())->method('error');

		$s = new SyncService($config, $logger, $mapper);

		$this->invokePrivate($s, 'syncHome', [$a, $backend]);
	}
}