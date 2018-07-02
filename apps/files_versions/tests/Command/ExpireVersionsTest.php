<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
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

namespace OCA\Files_Versions\Tests\Command;

use OCA\Files_Versions\Command\ExpireVersions;
use OCA\Files_Versions\Expiration;
use OCP\IUserManager;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class ExpireVersionsTest
 *
 * @group DB
 *
 * @package OCA\Files_Versions\Tests\Command
 */
class ExpireVersionsTest extends TestCase {

	/** @var CommandTester */
	private $commandTester;

	private $userManager;

	private $expiration;

	public function setUp() {
		parent::setUp();

		$this->userManager = $this->createMock(IUserManager::class);
		$this->expiration = $this->createMock(Expiration::class);
		$command = new ExpireVersions($this->userManager, $this->expiration);
		$this->commandTester = new CommandTester($command);
	}

	public function testExpireNoMaxRetention() {
		$this->expiration->expects($this->any())->method('getMaxAgeAsTimestamp')
			->willReturn(false);
		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$this->assertContains('Auto expiration is configured', $output);
	}
}
