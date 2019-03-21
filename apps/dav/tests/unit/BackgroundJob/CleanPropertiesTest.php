<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

namespace OCA\DAV\Tests\Unit\BackgroundJob;

use OCA\DAV\BackgroundJob\CleanProperties;
use OCP\IDBConnection;
use OCP\ILogger;
use Test\TestCase;
use Test\Traits\UserTrait;

/**
 * Class CleanPropertiesTest
 *
 * @group DB
 * @package OCA\DAV\Tests\Unit\BackgroundJob
 */
class CleanPropertiesTest extends TestCase {
	use UserTrait;
	/** @var IDBConnection | \PHPUnit\Framework\MockObject\MockObject */
	private $connection;
	/** @var ILogger | \PHPUnit\Framework\MockObject\MockObject */
	private $logger;
	/** @var CleanProperties */
	private $cleanProperties;
	/** @var string */
	private $username;

	public function setUp() {
		parent::setUp();

		$this->connection = \OC::$server->getDatabaseConnection();
		$this->logger = \OC::$server->getLogger();
		$this->cleanProperties = new CleanProperties($this->connection, $this->logger);
		$this->username = $this->getUniqueID('usercleanprop_');
		$this->createUser($this->username);
		$this->loginAsUser($this->username);
	}

	public function testDeleteOrphanEntries() {
		$userFolder = \OC::$server->getUserFolder($this->username);
		$userFolder->newFile('a.txt');
		$userFolder->newFile('b.txt');
		$userFolder->newFile('c.txt');

		$fileIds[] = $userFolder->get('a.txt')->getId();
		$fileIds[] = $userFolder->get('b.txt')->getId();
		$fileIds[] = $userFolder->get('c.txt')->getId();

		foreach ($fileIds as $fileId) {
			$qb = $this->connection->getQueryBuilder();
			$qb->insert('properties')
				->values([
					'propertyname' => $qb->createNamedParameter('foo'),
					'propertyvalue' => $qb->createNamedParameter('bar'),
					'fileid' => $qb->createNamedParameter($fileId)
				]);
			$qb->execute();
		}

		$userFolder->get('a.txt')->delete();
		$userFolder->get('c.txt')->delete();

		$this->invokePrivate($this->cleanProperties, 'run', ['']);
		$qb = $this->connection->getQueryBuilder();
		$qb->select('fileid')
			->from('properties');
		$result = $qb->execute()->fetchAll();

		/**
		 * Only one result should be there.
		 * And the fileid should match with the file which is not deleted.
		 */
		$this->assertCount(1, $result);
		$this->assertEquals($fileIds[1], $result[0]['fileid']);
	}

	public function providesDeleteLargeOrphans() {
		return [
			[450, 100, 350],
			[650, 220, 430],
			[890, 300, 590],
		];
	}
	/**
	 * Delete large orphans lets say 300 entries out of 310 entries
	 *
	 * @dataProvider providesDeleteLargeOrphans
	 */
	public function testDeleteLargeOrphans($totalFiles, $deletedFiles, $expectedResult) {
		$userFolder = \OC::$server->getUserFolder($this->username);

		for ($i = 1; $i <= $totalFiles; $i++) {
			$fileName = 'a' . (string) $i . '.txt';
			$userFolder->newFile($fileName);
			$fileIds[] = (string) $userFolder->get($fileName)->getId();
		}

		foreach ($fileIds as $fileId) {
			$qb = $this->connection->getQueryBuilder();
			$qb->insert('properties')
				->values([
					'propertyname' => $qb->createNamedParameter('foo'),
					'propertyvalue' => $qb->createNamedParameter('bar'),
					'fileid' => $qb->createNamedParameter($fileId)
				]);
			$qb->execute();
		}

		for ($i = 1; $i <= $deletedFiles; $i++) {
			$fileName = 'a' . (string) $i . '.txt';
			$userFolder->get($fileName)->delete();
			unset($fileIds[$i-1]);
		}

		$this->invokePrivate($this->cleanProperties, 'run', ['']);
		$qb = $this->connection->getQueryBuilder();
		$qb->select('fileid')
			->from('properties');
		$results = $qb->execute()->fetchAll();

		/**
		 * 10 result should be there.
		 * And the fileid should match with the file which is not deleted.
		 */
		$this->assertCount($expectedResult, $results);

		foreach ($results as $result) {
			$this->assertEquals(true, \in_array((string)$result['fileid'], $fileIds, true));
		}
	}
}
