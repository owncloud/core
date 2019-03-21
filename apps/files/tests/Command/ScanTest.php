<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCA\Files\Tests\Command;

use OCA\Files\Command\Scan;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;
use Test\Traits\UserTrait;
use OCP\IUserManager;
use OCP\IConfig;
use OCP\Files\IMimeTypeLoader;
use OCP\Lock\ILockingProvider;
use OCP\IUser;
use OCP\IDBConnection;
use OCP\IGroupManager;
use OCP\ILogger;

/**
 * Class ScanTest
 *
 * @group DB
 * @package OCA\Files\Tests\Command
 */
class ScanTest extends TestCase {
	use UserTrait;

	/**
	 * @var string
	 */
	//private $dataDir;

	/**
	 * @var IDBConnection
	 */
	private $connection;

	/**
	 * @var IUserManager
	 */
	private $userManager;

	/**
	 * @var IGroupManager
	 */
	private $groupManager;

	/**
	 * @var ILogger | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $logger;

	/**
	 * @var ILockingProvider | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $lockingProvider;

	/**
	 * @var IMimeTypeLoader | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $mimeTypeLoader;

	/**
	 * @var IConfig | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $config;

	/**
	 * @var IUser
	 */
	//private $scanUser1;

	/**
	 * @var IUser
	 */
	//private $scanUser2;

	/**
	 * @var CommandTester
	 */
	private $commandTester;

	/**
	 * @var string[]
	 */
	private $groupsCreated = [];

	protected function setUp() {
		if ($this->runsWithPrimaryObjectstorage()) {
			$this->markTestSkipped('not testing scanner as it does not make sense for primary object store');
		}
		parent::setUp();

		$this->connection = \OC::$server->getDatabaseConnection();
		$this->userManager = \OC::$server->getUserManager();
		$this->groupManager = \OC::$server->getGroupManager();
		$this->lockingProvider = $this->createMock(ILockingProvider::class);
		$this->mimeTypeLoader = $this->createMock(IMimeTypeLoader::class);
		$this->config = $this->createMock(IConfig::class);
		$this->logger = $this->createMock(ILogger::class);

		$command = new Scan(
			$this->userManager,
			$this->groupManager,
			$this->lockingProvider,
			$this->mimeTypeLoader,
			$this->logger,
			$this->config
		);
		$this->commandTester = new CommandTester($command);

		//$this->scanUser1 = $this->createUser('scanuser1' . \uniqid());
		//$this->scanUser2 = $this->createUser('scanuser2' . \uniqid());

		$user1 = $this->createUser('user1');
		$this->createUser('user2');
		$this->groupManager->createGroup('group1');
		$this->groupManager->get('group1')->addUser($user1);
		$this->groupsCreated[] = 'group1';

		//$this->dataDir = \OC::$server->getConfig()->getSystemValue('datadirectory', \OC::$SERVERROOT . '/data-autotest');

		// \mkdir($this->dataDir . '/' . $this->scanUser1->getUID() . '/files/toscan', 0777, true);
	}

	protected function tearDown() {
		foreach ($this->groupsCreated as $group) {
			$this->groupManager->get($group)->delete();
		}
		parent::tearDown();
	}

	public function dataInput() {
		return [
			[['user_id' => ['user1']]]
		];
	}

	/**
	 * @dataProvider dataInput
	 */
	public function testCommandInput($input) {
		$exitCode = $this->commandTester->execute($input);
		//$output = $this->commandTester->getDisplay();
		//$this->assertContains($expectedOutput, $output);
		$this->assertEquals(0, $exitCode, "got exit code $exitCode");
	}
}
