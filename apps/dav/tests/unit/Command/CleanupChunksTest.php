<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV\Tests\Unit\Command;

use OC\Files\View;
use OCA\DAV\Command\CleanupChunks;
use OCP\IUser;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;
use Test\Traits\UserTrait;

/**
 * Class CleanupChunksTest
 *
 * @package OCA\DAV\Tests\Unit\Command
 * @group DB
 */
class CleanupChunksTest extends TestCase {
	use UserTrait;

	/** @var CommandTester */
	private $commandTester;
	/** @var IUser */
	private $user;

	public function setUp(): void {
		parent::setUp();

		$command = new CleanupChunks(\OC::$server->getUserManager());
		$this->commandTester = new CommandTester($command);
	}

	/**
	 * @dataProvider providesDays
	 * @param $inputDays
	 * @param $expectedDays
	 */
	public function testCommandInput($inputDays, $expectedDays) {
		$this->commandTester->execute([
			'age-in-days' => $inputDays
		]);
		$output = $this->commandTester->getDisplay();
		$this->assertContains("Cleaning chunks older than $expectedDays days", $output);
	}

	public function testCommand() {
		$userId = 'dav-clean-chunks-user';
		$uploadId = $this->getUniqueID('upload');
		// create one user for testing
		$this->user = $this->createUser($userId);
		$this->loginAsUser($this->user->getUID());

		// generate old chunks
		$view = new View("/$userId/uploads");
		$view->mkdir($uploadId);
		$this->assertTrue($view->file_exists($uploadId));
		$view->touch($uploadId, 0);

		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$this->assertContains("Cleaning chunks older than 2 days", $output);
		$this->assertContains("Cleaning chunks for $userId", $output);

		$this->assertFalse($view->file_exists($uploadId));
	}

	public function providesDays() {
		return [
			[0, 2],
			[55, 55],
			[200, 100],
		];
	}
}
