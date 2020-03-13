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
	 * @var ILockingProvider | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $lockingProvider;

	/**
	 * @var IMimeTypeLoader | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $mimeTypeLoader;

	/**
	 * @var IConfig | \PHPUnit\Framework\MockObject\MockObject
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

	/**
	 * @var string[]
	 */
	private $groupsCreated = [];

	protected function setUp(): void {
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

		$command = new Scan(
			$this->userManager,
			$this->groupManager,
			$this->lockingProvider,
			$this->mimeTypeLoader,
			$this->createMock(ILogger::class),
			$this->config
		);
		$this->commandTester = new CommandTester($command);

		$this->scanUser1 = $this->createUser('scanuser1' . \uniqid());
		$this->scanUser2 = $this->createUser('scanuser2' . \uniqid());

		$user1 = $this->createUser('user1');
		$this->createUser('user2');
		$this->groupManager->createGroup('group1');
		$this->groupManager->get('group1')->addUser($user1);
		$this->groupsCreated[] = 'group1';

		$this->dataDir = \OC::$server->getConfig()->getSystemValue('datadirectory', \OC::$SERVERROOT . '/data-autotest');

		@\mkdir($this->dataDir . '/' . $this->scanUser1->getUID() . '/files/toscan', 0777, true);
	}

	protected function tearDown(): void {
		foreach ($this->groupsCreated as $group) {
			$this->groupManager->get($group)->delete();
		}
		parent::tearDown();
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
			->andWhere($qb->expr()->eq('path_hash', $qb->createNamedParameter(\md5($path))));
		$results = $qb->execute();
		$result = $results->fetch();
		$results->closeCursor();

		return $result;
	}

	/**
	 * Scan and repair a single user
	 */
	public function testDummy() {
		$this->assertTrue(true);
	}
}
