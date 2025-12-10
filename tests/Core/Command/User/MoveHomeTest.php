<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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

use OC\Core\Command\User\MoveHome;
use OC\Files\ObjectStore\ObjectStoreStorage;
use OCP\IUser;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class MoveHomeTest
 *
 * @group DB
 * @package Tests\Core\Command\User
 */
class MoveHomeTest extends TestCase {
	/**
	 * @var CommandTester
	 */
	private $commandTester;
	/**
	 * @var string
	 */
	private $newLocation;
	/**
	 * @var bool|IUser
	 */
	private $user;

	protected function setUp(): void {
		parent::setUp();

		$command = new MoveHome(\OC::$server->getUserManager());
		$this->commandTester = new CommandTester($command);

		# create a new location in the data folder
		$newLocation = \OC::$server->getSystemConfig()->getValue('datadirectory');
		$this->newLocation = uniqid($newLocation . '/');
		mkdir($this->newLocation);

		# test user
		$this->user = \OC::$server->getUserManager()->createUser('test-user', 'test-user');
	}

	protected function tearDown(): void {
		$this->user->delete();
		parent::tearDown();

		rmdir($this->newLocation);
	}

	public function test(): void {
		\OC::$server->getUserSession()->login('test-user', 'test-user');
		$file = \OC::$server->getUserFolder($this->user->getUID())->newFile('hello.txt');
		$file->putContent('1234567890');

		$exitCode = $this->commandTester->execute([
			'user_id' => 'test-user',
			'new_location' => $this->newLocation
		]);

		if ($file->getStorage()->instanceOfStorage(ObjectStoreStorage::class)) {
			self::assertEquals(1, $exitCode, $this->commandTester->getDisplay());
			return;
		}

		# assert command output
		self::assertEquals(0, $exitCode, $this->commandTester->getDisplay());

		# assert that the new location holds the file
		self::assertFileExists("{$this->newLocation}/test-user/files/hello.txt");

		# assert the user has a new home set
		self::assertEquals("{$this->newLocation}/test-user", $this->user->getHome());
	}
}
