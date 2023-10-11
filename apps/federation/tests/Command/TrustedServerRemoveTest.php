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

use OCA\Federation\Command\TrustedServerRemove;
use OCA\Federation\TrustedServers;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * @group DB
 */
class TrustedServerRemoveTest extends TestCase {
	/** @var TrustedServers */
	private \PHPUnit\Framework\MockObject\MockObject $trustedServers;

	/** @var TrustedServerRemove */
	private \Symfony\Component\Console\Tester\CommandTester $command;

	protected function setUp(): void {
		$this->trustedServers = $this->createMock(TrustedServers::class);

		$this->command = new CommandTester(new TrustedServerRemove($this->trustedServers));
	}

	public function testExecute() {
		$this->trustedServers->expects($this->once())
			->method('removeServer')
			->with(12);

		$this->command->execute(['id' => 12]);
		$this->assertSame(0, $this->command->getStatusCode());
	}
}
