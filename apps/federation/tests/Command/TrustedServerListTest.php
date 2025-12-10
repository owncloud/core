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

use OCA\Federation\Command\TrustedServerList;
use OCA\Federation\TrustedServers;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * @group DB
 */
class TrustedServerListTest extends TestCase {
	/** @var TrustedServers */
	private $trustedServers;

	/** @var TrustedServerList */
	private $command;

	protected function setUp(): void {
		$this->trustedServers = $this->createMock(TrustedServers::class);

		$this->command = new CommandTester(new TrustedServerList($this->trustedServers));
	}

	public function testExecute() {
		$this->trustedServers->method('getServers')
			->willReturn([
				['id' => 45, 'url' => 'https://my.server1', 'status' => 2],
				['id' => 55, 'url' => 'https://my.server22', 'status' => 1],
			]);

		$this->command->execute([]);
		$output = $this->command->getDisplay();
		// expect the information of each server in the same row, no special formatting
		$this->assertMatchesRegularExpression('/^.*45.*my\.server1.*Pending.*$/m', $output);
		$this->assertMatchesRegularExpression('/^.*55.*my\.server22.*OK.*$/m', $output);
	}
}
