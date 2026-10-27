<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2026, ownCloud GmbH
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

namespace Tests\Core\Command\User;

use OC\Authentication\AccountLockout\AccountLockout;
use OC\Core\Command\User\Unlock;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

class UnlockTest extends TestCase {
	/** @var AccountLockout | MockObject */
	private $accountLockout;
	/** @var CommandTester */
	private $commandTester;

	protected function setUp(): void {
		parent::setUp();

		$this->accountLockout = $this->createMock(AccountLockout::class);
		$this->commandTester = new CommandTester(new Unlock($this->accountLockout));
	}

	/**
	 * @dataProvider unlockProvider
	 * @param int $removed
	 * @param string $expectedOutput
	 */
	public function testUnlock($removed, $expectedOutput) {
		$this->accountLockout->expects($this->once())
			->method('unlock')
			->with('alice@example.com')
			->willReturn($removed);

		$this->assertSame(0, $this->commandTester->execute(['login' => 'alice@example.com']));
		$this->assertStringContainsString($expectedOutput, $this->commandTester->getDisplay());
	}

	public function unlockProvider() {
		return [
			[2, 'the login is unlocked'],
			[0, 'There were no failed login attempts to reset'],
		];
	}
}
