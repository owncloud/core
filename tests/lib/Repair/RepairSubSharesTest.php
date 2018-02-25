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

namespace Test\Repair;

use OC\Repair\RepairSubShares;
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;
use Test\TestCase;
use Test\Traits\GroupTrait;
use Test\Traits\UserTrait;

/**
 * Test for repairing invalid sub shares
 *
 * @group  DB
 *
 * @see \OC\Repair\RepairSubShares
 * @package Test\Repair
 */
class RepairSubSharesTest extends TestCase {
	use UserTrait;
	use GroupTrait;

	/** @var  \OCP\IDBConnection */
	private $connection;

	/** @var  IRepairStep */
	private $repair;
	protected function setUp() {
		parent::setUp();

		$this->connection = \OC::$server->getDatabaseConnection();
		$this->repair = new RepairSubShares($this->connection);
		$this->createUser('admin');
	}

	protected function tearDown() {
		$this->deleteAllShares();
		parent::tearDown();
	}

	public function deleteAllShares() {
		$qb = $this->connection->getQueryBuilder();
		$qb->delete('share')->execute();
	}

	/**
	 * This is a very basic test
	 * This test would populate DB with data
	 * and later, remove the duplicates to test
	 * if the step is working properly
	 */
	public function testPopulateDBAndRemoveDuplicates() {

		$qb = $this->connection->getQueryBuilder();
		//Create 10 users and 3 groups.
		//add 3 users to each group
		$userName = "user";
		$groupName = "group";
		$folderName = "/test";
		$time = time();
		$groupCount = 1;
		$totalGroups = 3;
		$parent = 1;
		$multipleOf = 2;
		for($userCount = 1; $userCount <= 10; $userCount++) {
			$user = $this->createUser($userName.$userCount);
			$group = $this->createGroup($groupName.$groupCount);
			$group->addUser($user);

			//Create a group share
			$qb->insert('share')
				->values([
					'share_type' => $qb->expr()->literal('2'),
					'share_with' => $qb->expr()->literal($userName.$groupCount),
					'uid_owner' => $qb->expr()->literal('admin'),
					'uid_initiator' => $qb->expr()->literal('admin'),
					'parent' => $qb->expr()->literal($parent),
					'item_type' => $qb->expr()->literal('folder'),
					'item_source' => $qb->expr()->literal(24),
					'file_source' => $qb->expr()->literal(24),
					'file_target' => $qb->expr()->literal($folderName.$groupCount),
					'permissions' => $qb->expr()->literal(31),
					'stime' => $qb->expr()->literal($time),
				])
				->execute();

			/**
			 * Group count incremented once value of userCount reaches multiple of 3
			 */
			if (($userCount % $totalGroups) === 0) {
				$groupCount++;
				$time = time();
			}

			/**
			 * Increment parent
			 */
			if (($userCount % $multipleOf) === 0) {
				$parent++;
			}
		}

		$outputMock = $this->createMock(IOutput::class);
		$this->repair->run($outputMock);

		$qb = $this->connection->getQueryBuilder();
		$qb->select('id', 'parent', $qb->createFunction('count(*)'))
			->from('share')
			->where($qb->expr()->eq('share_type', $qb->createNamedParameter(2)))
			->groupBy('parent')
			->addGroupBy('id')
			->addGroupBy('share_with')
			->having('count(*) > 1')->setMaxResults(1000);

		$results = $qb->execute()->fetchAll();
		$this->assertCount(0, $results);
	}

	/**
	 * This is to test large rows i.e, greater than 2000
	 * with duplicates
	 */
	public function testLargeDuplicateShareRows() {
		$qb = $this->connection->getQueryBuilder();
		$userName = "user";
		$time = time();
		$groupCount = 0;
		$folderName = "/test";
		$maxUsersPerGroup = 1000;
		$parent = $groupCount + 1;
		for ($userCount = 0; $userCount < 5500; $userCount++) {
			/**
			 * groupCount is incremented once userCount reaches
			 * multiple of maxUsersPerGroup.
			 */
			if (($userCount % $maxUsersPerGroup) === 0) {
				$groupCount++;
				$parent = $groupCount;
			}
			$qb->insert('share')
				->values([
					'share_type' => $qb->expr()->literal('2'),
					'share_with' => $qb->expr()->literal($userName.$groupCount),
					'uid_owner' => $qb->expr()->literal('admin'),
					'uid_initiator' => $qb->expr()->literal('admin'),
					'parent' => $qb->expr()->literal($parent),
					'item_type' => $qb->expr()->literal('folder'),
					'item_source' => $qb->expr()->literal(24),
					'file_source' => $qb->expr()->literal(24),
					'file_target' => $qb->expr()->literal($folderName.$groupCount),
					'permissions' => $qb->expr()->literal(31),
					'stime' => $qb->expr()->literal($time),
				])
				->execute();
		}

		$outputMock = $this->createMock(IOutput::class);
		$this->repair->run($outputMock);

		$qb = $this->connection->getQueryBuilder();
		$qb->select('id', 'parent', $qb->createFunction('count(*)'))
			->from('share')
			->where($qb->expr()->eq('share_type', $qb->createNamedParameter(2)))
			->groupBy('parent')
			->addGroupBy('id')
			->addGroupBy('share_with')
			->having('count(*) > 1')->setMaxResults(1000);

		$results = $qb->execute()->fetchAll();
		$this->assertCount(0, $results);
	}
}
