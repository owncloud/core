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
use Test\Traits\GroupTrait;
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
	use GroupTrait;

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
	private $scanUser1;

	/**
	 * @var IUser
	 */
	private $scanUser2;

	/**
	 * @var CommandTester
	 */
	private $commandTester;

	protected function setUp() {
		if (getenv('RUN_OBJECTSTORE_TESTS')) {
			$this->markTestSkipped('not testing scanner as it does not make sense for primary object store');
		}
		parent::setUp();

		$this->connection = \OC::$server->getDatabaseConnection();
		$this->userManager = \OC::$server->getUserManager();
		$this->groupManager = \OC::$server->getGroupManager();
		$this->lockingProvider = $this->createMock(ILockingProvider::class);
		$this->mimeTypeLoader = $this->createMock(IMimeTypeLoader::class);
		$this->config = $this->createMock(IConfig::class);

		$command = new Scan(
			$this->userManager,
			$this->groupManager,
			$this->lockingProvider,
			$this->mimeTypeLoader,
			$this->createMock(ILogger::class),
			$this->config
		);
		$this->commandTester = new CommandTester($command);

		$this->scanUser1 = $this->createUser('scanuser1' . uniqid());
		$this->scanUser2 = $this->createUser('scanuser2' . uniqid());

		$user1 = $this->createUser('user1');
		$this->createUser('user2');
		$this->createGroup('group1');
		$this->groupManager->get('group1')->addUser($user1);

		$this->dataDir = \OC::$server->getConfig()->getSystemValue('datadirectory', \OC::$SERVERROOT . '/data-autotest');

		@mkdir($this->dataDir . '/' . $this->scanUser1->getUID() . '/files/toscan', 0777, true);
	}

	public function dataInput() {
		return [
			[['--groups' => 'haystack'], 'Group name haystack doesn\'t exist'],
			[['--groups' => 'group1'], 'Starting scan for user 1 out of 1 (user1)'],
			[['user_id' => ['user1']], 'Starting scan for user 1 out of 1 (user1)'],
			[['user_id' => ['user2']], 'Starting scan for user 1 out of 1 (user2)']
		];
	}

	/**
	 * @dataProvider dataInput
	 */
	public function testCommandInput($input, $expectedOutput) {
		$this->commandTester->execute($input);
		$output = $this->commandTester->getDisplay();
		$this->assertContains($expectedOutput, $output);
	}

	public function userInputData() {
		return [
			[['--groups' => 'group1'], 'Starting scan for user 1 out of 200']
		];
	}

	/**
	 * @dataProvider userInputData
	 * @param $input
	 * @param $expectedOutput
	 */
	public function testGroupPaginationForUsers($input, $expectedOutput) {
		//First we populate the users
		$user = 'user';
		$numberOfUsersInGroup = 210;
		for($i = 2; $i <= 210; $i++) {
			$userObj = $this->createUser($user.$i);
			$this->groupManager->get('group1')->addUser($userObj);
		}

		$this->commandTester->execute($input);
		$output = $this->commandTester->getDisplay();
		$this->assertContains($expectedOutput, $output);
		//If pagination works then below assert shouldn't fail
		$this->assertNotContains('Starting scan for user 1 out of 210', $output);
	}

	public function multipleGroupTest() {
		return [
			[['--groups' => 'group1,group2'], ''],
			[['--groups' => 'group1,group2,group3'], '']
		];
	}

	/**
	 * @dataProvider multipleGroupTest
	 * @param $input
	 */
	public  function testMultipleGroups($input) {
		//Create 10 users in each group
		$groups = explode(',', $input['--groups']);
		$user = "user";
		$userObj = [];
		for ($i = 1; $i <= (10 * count($groups)); $i++ ) {
			$userObj[] = $this->createUser($user.$i);
		}

		$userCount = 1;
		foreach ($groups as $group) {
			$this->createGroup($group);
			for ($i = $userCount; $i <= ($userCount + 9); $i++) {
				$j = $i - 1;
				$this->groupManager->get($group)->addUser($userObj[$j]);
			}
			$userCount = $i;
		}

		$this->commandTester->execute($input);
		$output = $this->commandTester->getDisplay();
		if (count($groups) === 2) {
			$this->assertContains('Starting scan for user 1 out of 10 (user1)', $output);
			$this->assertContains('Starting scan for user 1 out of 10 (user11)', $output);
		}
		if (count($groups) === 3) {
			$this->assertContains('Starting scan for user 1 out of 10 (user1)', $output);
			$this->assertContains('Starting scan for user 1 out of 10 (user11)', $output);
			$this->assertContains('Starting scan for user 1 out of 10 (user21)', $output);
			$this->assertContains('Starting scan for user 10 out of 10 (user30)', $output);
		}
	}

	public function testScanAll() {
		@mkdir($this->dataDir . '/' . $this->scanUser2->getUID() . '/files/toscan2', 0777, true);

		$input = [
			'--all' => true,
		];

		$result = $this->commandTester->execute($input);
		$this->assertEquals(0, $result);

		// new entry was found for both users
		$storageId = $this->getStorageId('home::' . $this->scanUser1->getUID());
		$entry = $this->getFileCacheEntry($storageId, 'files/toscan');
		$this->assertEquals('files/toscan', $entry['path']);

		$storageId2 = $this->getStorageId('home::' . $this->scanUser2->getUID());
		$entry2 = $this->getFileCacheEntry($storageId2, 'files/toscan2');
		$this->assertEquals('files/toscan2', $entry2['path']);

	}

	public function testScanOne() {
		@mkdir($this->dataDir . '/' . $this->scanUser2->getUID() . '/files/toscan2', 0777, true);

		$input = [
			'user_id' => [$this->scanUser2->getUID()],
		];

		$result = $this->commandTester->execute($input);
		$this->assertEquals(0, $result);

		// new entry was found only for user2
		$storageId = $this->getStorageId('home::' . $this->scanUser1->getUID());
		$this->assertFalse($this->getFileCacheEntry($storageId, 'files/toscan'));

		$storageId2 = $this->getStorageId('home::' . $this->scanUser2->getUID());
		$entry2 = $this->getFileCacheEntry($storageId2, 'files/toscan2');
		$this->assertEquals('files/toscan2', $entry2['path']);
	}

	public function maintenanceConfigsProvider() {
		return [
			[
				[
					['singleuser', false, true],
					['maintenance', false, false],
				],
			],
			[
				[
					['singleuser', false, false],
					['maintenance', false, true],
				],
			],
		];
	}

	/**
	 * Test running repair all
	 *
	 * @dataProvider maintenanceConfigsProvider
	 */
	public function testScanRepairAllInMaintenanceMode($config) {
		$this->config->method('getSystemValue')
			->will($this->returnValueMap($config));

		$input = [
			'--all' => true,
			'--repair' => true,
		];

		$result = $this->commandTester->execute($input);

		// TODO: find a way to test that repair code has run

		// new entry was found
		$storageId = $this->getStorageId('home::' . $this->scanUser1->getUID());
		$entry = $this->getFileCacheEntry($storageId, 'files/toscan');
		$this->assertEquals('files/toscan', $entry['path']);

		$this->assertEquals(0, $result);
	}

	/**
	 * Returns storage numeric id for the given string id
	 *
	 * @param string $storageStringId
	 * @return int|null numeric id
	 */
	private function getStorageId($storageStringId) {
		$qb = $this->connection->getQueryBuilder();
		$qb->select('numeric_id')
			->from('storages')
			->where($qb->expr()->eq('id', $qb->createNamedParameter($storageStringId)));
		$results = $qb->execute();
		$result = $results->fetch();
		$results->closeCursor();

		if ($result) {
			return (int)$result['numeric_id'];
		}

		return null;
	}

	/**
	 * Returns file cache DB entry for given path
	 *
	 * @param int $storageId storage numeric id
	 * @param string $path path
	 * @return array file cache DB entry
	 */
	private function getFileCacheEntry($storageId, $path) {
		$qb = $this->connection->getQueryBuilder();
		$qb->select('*')
			->from('filecache')
			->where($qb->expr()->eq('storage', $qb->createNamedParameter($storageId)))
			->andWhere($qb->expr()->eq('path_hash', $qb->createNamedParameter(md5($path))));
		$results = $qb->execute();
		$result = $results->fetch();
		$results->closeCursor();

		return $result;
	}

	/**
	 * Test repair all error message when not in maintenance mode
	 *
	 */
	public function testScanRepairAllNoSingleUserMode() {
		$this->config->method('getSystemValue')
			->will($this->returnValueMap([
				['singleuser', false, false],
				['maintenance', false, false],
			]));

		$input = [
			'--all' => true,
			'--repair' => true,
		];

		$result = $this->commandTester->execute($input);

		$this->assertEquals(1, $result);

		$output = $this->commandTester->getDisplay();

		$this->assertContains('Please switch to single user mode', $output);
		$this->assertContains('specify a user to repair', $output);

		$storageId = $this->getStorageId('home::' . $this->scanUser1->getUID());
		$this->assertFalse($this->getFileCacheEntry($storageId, 'files/toscan'));
	}
}

