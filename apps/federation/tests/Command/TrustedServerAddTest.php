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

namespace OCA\Federation\Tests\Command;

use OCA\Federation\Command\TrustedServerAdd;
use OCA\Federation\TrustedServers;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * @group DB
 */
class TrustedServerAddTest extends TestCase {
	/** @var TrustedServers */
	private \PHPUnit\Framework\MockObject\MockObject $trustedServers;

	/** @var TrustedServerAdd */
	private \Symfony\Component\Console\Tester\CommandTester $command;

	protected function setUp(): void {
		$this->trustedServers = $this->createMock(TrustedServers::class);

		$this->command = new CommandTester(new TrustedServerAdd($this->trustedServers));
	}

	public function testExecuteAlreadyTrusted() {
		$this->trustedServers->method('isTrustedServer')->willReturn(true);

		$this->command->execute(['url' => 'https://some.server/path/owncloud']);
		$this->assertSame(TrustedServerAdd::ERROR_ALREADY_TRUSTED, $this->command->getStatusCode());
	}

	public function testExecuteNotFound() {
		$this->trustedServers->method('isTrustedServer')->willReturn(false);
		$this->trustedServers->method('isOwnCloudServer')->willReturn(false);

		$this->command->execute(['url' => 'https://some.server/path/owncloud']);
		$this->assertSame(TrustedServerAdd::ERROR_NO_OWNCLOUD_FOUND, $this->command->getStatusCode());
	}

	public function testExecute() {
		$server = 'https://some.server/path/owncloud';

		$this->trustedServers->method('isTrustedServer')->willReturn(false);
		$this->trustedServers->method('isOwnCloudServer')->willReturn(true);
		$this->trustedServers->expects($this->once())
			->method('addServer')
			->with($server)
			->willReturn(33);

		$this->command->execute(['url' => $server]);
		$this->assertSame(0, $this->command->getStatusCode());
	}
}
