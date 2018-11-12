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

use OC\Repair\RepairOrphanedSubshare;
use OCP\IDBConnection;
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;
use Test\TestCase;
use Test\Traits\UserTrait;

/**
 * Class RepairOrphanedSubshareTest
 *
 * @group  DB
 * @see RepairOrphanedSubshare
 * @package Test\Repair
 */
class RepairOrphanedSubshareTest extends TestCase {
	use UserTrait;

	/** @var  IDBConnection */
	private $connection;

	/** @var  IRepairStep */
	private $repair;

	protected function setUp() {
		parent::setUp();
		$this->connection = \OC::$server->getDatabaseConnection();
		$this->repair = new RepairOrphanedSubshare($this->connection);
		$this->createUser('admin');
	}

	protected function tearDown() {
		$this->deleteAllShares();
		$this->tearDownUserTrait();
		parent::tearDown();
	}

	public function deleteAllShares() {
		$qb = $this->connection->getQueryBuilder();
		$qb->delete('share')->execute();
	}

	/**
	 * A very basic test.
	 * This test would populate the DB with data, later would remove a few
	 * rows which are the parents of other reshares. Finally would call
	 * the repair step to see if its working properly
	 */
	public function testPopulateDBAndRemoveOrphanShares() {
		$qb = $this->connection->getQueryBuilder();
		//Create 3 users. admin, user1 and user2
		$user1 = 'user1';
		$user2 = 'user2';
		$this->createUser($user1);
		$this->createUser($user2);

		$grabIds = null;
		//Lets create 10 entries in oc_share to share
		$parentReshareCount = 1;
		for ($i=1; $i <= 10; $i++) {
			$time = 1522762088 + $i * 60;
			if ($i <= 5) {
				$shareWithUser = $user1;
				$uidOwner = 'admin';
				$itemSource = $i;
				$qb->insert('share')
					->values([
						'id' => $qb->expr()->literal((string)$i),
						'share_type' => $qb->expr()->literal('0'),
						'share_with' => $qb->expr()->literal($shareWithUser),
						'uid_owner' => $qb->expr()->literal($uidOwner),
						'item_type' => $qb->expr()->literal('folder'),
						'item_source' => $qb->expr()->literal($itemSource),
						'file_source' => $qb->expr()->literal($itemSource),
						'file_target' => $qb->expr()->literal('/' . $itemSource),
						'permissions' => $qb->expr()->literal(31),
						'stime' => $qb->expr()->literal($time),
					])
					->execute();
			} else {
				if ($i === 6) {
					$getId = $this->connection->getQueryBuilder();
					$grabIds = $getId->select('id')
						->from('share')
						->execute()->fetchAll();
					$parentReshareCount = $grabIds[0]['id'];
				}
				$shareWithUser = $user2;
				$uidOwner = $user1;
				$parent = $parentReshareCount;
				$itemSource = $parentReshareCount;
				$parentReshareCount++;
				$qb->insert('share')
					->values([
						'id' => $qb->expr()->literal((string)$i),
						'share_type' => $qb->expr()->literal('0'),
						'share_with' => $qb->expr()->literal($shareWithUser),
						'uid_owner' => $qb->expr()->literal($uidOwner),
						'parent' => $qb->expr()->literal($parent),
						'item_type' => $qb->expr()->literal('folder'),
						'item_source' => $qb->expr()->literal($itemSource),
						'file_source' => $qb->expr()->literal($itemSource),
						'file_target' => $qb->expr()->literal('/' . $itemSource),
						'permissions' => $qb->expr()->literal(31),
						'stime' => $qb->expr()->literal($time),
					])
					->execute();
			}
		}

		//Now lets tamper the rows by deleting some of the parents
		//Lets delete rows: 1, 3 and 5
		//For oracle needs some adjustment. The reason being the id's not
		//necessarily starts with 1. Observed in drone that they do start with
		//21.
		$initial_id = $grabIds[0]['id'];
		foreach ([1,3,5] as $id) {
			$id = $initial_id + ($id - 1);
			$qb = $this->connection->getQueryBuilder();
			$qb->delete('share')
				->where($qb->expr()->eq('id', $qb->createNamedParameter($id)))->execute();
		}

		$outputMock = $this->createMock(IOutput::class);
		$this->repair->run($outputMock);

		$qb = $this->connection->getQueryBuilder();
		$results = $qb->select('parent')
			->from('share')
			->groupBy('parent')->orderBy('parent')->setMaxResults(1000)->setFirstResult(1)
			->execute()->fetchAll();
		//Total 10 rows where there, we deleted 3 and the repair deleted another
		//3 rows. So total 6 rows were deleted and 4 rows were remaining
		//Hence 2 is the expected result.
		$expectedCount = 2;
		$this->assertCount($expectedCount, $results);
	}

	/**
	 * This test comprises of large rows i.e, 3000 rows.
	 * This test will have more orphan shares and will check if the repair
	 * test is working properly.
	 */
	public function testLargeSharesWithOrphans() {
		$qb = $this->connection->getQueryBuilder();
		$totalUsers[] = 'admin';
		//Create 29 users. admin, user1, user2 ... user29
		$user = 'user';
		for ($i=1; $i <= 30; $i++) {
			$this->createUser($user.$i);
			$totalUsers[] = $user.$i;
		}

		//Lets create 3000 entries in oc_share to share
		//The idea here is 100 folders of admin are shared with
		//30 other users. So each folders are getting re-shared with others
		$totalParents = 1;
		$parentReshareCount = 1;
		$pareReshareCountRest = 0;
		$rowCount = 1;
		$firstIdSet = false;
		foreach ($totalUsers as $user) {
			for ($i=1; $i <= 100; $i++) {
				$time = 1522762088 + $i * 60;
				$userIndex = \array_search($user, $totalUsers, true);
				if (($userIndex+1) === \count($totalUsers)) {
					break;
				}
				$shareWithUser = $totalUsers[$userIndex+1];
				$uidOwner = $user;
				$itemSource = $i;
				if ($userIndex === 0) {
					$totalParents++;
					$qb->insert('share')
						->values([
							'id' => $qb->expr()->literal((string)$rowCount),
							'share_type' => $qb->expr()->literal('0'),
							'share_with' => $qb->expr()->literal($shareWithUser),
							'uid_owner' => $qb->expr()->literal($uidOwner),
							'item_type' => $qb->expr()->literal('folder'),
							'item_source' => $qb->expr()->literal($itemSource),
							'file_source' => $qb->expr()->literal($itemSource),
							'file_target' => $qb->expr()->literal('/' . $itemSource),
							'permissions' => $qb->expr()->literal(31),
							'stime' => $qb->expr()->literal($time),
						])
						->execute();
				} else {
					if (($firstIdSet === false) && ($i === 1)) {
						$getId = $this->connection->getQueryBuilder();
						$grabIds = $getId->select('id')
							->from('share')
							->execute()->fetchAll();
						$parentReshareCount = $grabIds[0]['id'];
						$pareReshareCountRest = $parentReshareCount;
						$firstIdSet = true;
					}

					$parent = $parentReshareCount;
					$itemSource = $parentReshareCount;
					$parentReshareCount++;
					$qb->insert('share')
						->values([
							'id' => $qb->expr()->literal((string)$rowCount),
							'share_type' => $qb->expr()->literal('0'),
							'share_with' => $qb->expr()->literal($shareWithUser),
							'uid_owner' => $qb->expr()->literal($uidOwner),
							'parent' => $qb->expr()->literal($parent),
							'item_type' => $qb->expr()->literal('folder'),
							'item_source' => $qb->expr()->literal($itemSource),
							'file_source' => $qb->expr()->literal($itemSource),
							'file_target' => $qb->expr()->literal('/' . $itemSource),
							'permissions' => $qb->expr()->literal(31),
							'stime' => $qb->expr()->literal($time),
						])
						->execute();
					if (($parentReshareCount - $pareReshareCountRest) >= 100) {
						//Reset the parent count
						$parentReshareCount = $pareReshareCountRest;
					}
				}
				$rowCount++;
			}
		}

		//We would remove 20 id's from oc_share
		$rowIds = [2, 4, 9, 11, 12,
			22, 33, 44, 29, 46,
			60, 71, 81, 88, 51,
			91, 90, 65, 75, 95];
		foreach ($rowIds as $rowId) {
			$qb = $this->connection->getQueryBuilder();
			//Check if the row is there before deleting
			$result = $qb->select('id')
				->from('share')
				->where($qb->expr()->eq('id', $qb->createNamedParameter($rowId+ $pareReshareCountRest)))
				->execute()->fetchAll();
			if (\count($result) === 0) {
				continue;
			}
			$qb->delete('share')
				->where($qb->expr()->eq('id', $qb->createNamedParameter($rowId+ $pareReshareCountRest)))
				->execute();
		}

		//Now run the repair step and verify there are no more
		// orpahan shares are no more
		$outputMock = $this->createMock(IOutput::class);
		$this->repair->run($outputMock);

		$qb = $this->connection->getQueryBuilder();
		$pageLimit = 1000;
		$offset = 0;
		$result = 0;
		do {
			$statement = $qb->select('parent')
				->from('share')
				->groupBy('parent')->orderBy('parent')->setMaxResults($pageLimit)->setFirstResult($offset)->execute();
			$results = $statement->fetchAll();
			$offset += $pageLimit;
			$result += \count($results);
		} while (\count($results) > 0);
		$this->assertEquals($totalParents - 20, $result);
	}

	/**
	 * This is a test to verify if there are lets say 3000 parents which got reshared
	 * to subsequent users. And lets say 2500 parent entries got deleted, then
	 * users who had these parents shared would become orphans. And this test
	 * is a proof that all the 2500 orphaned shares in the users will be removed.
	 * And hence no further issues would be caused in the UI.
	 */
	public function testLargeOrphanSharesDistributedAmongUsers() {
		$qb = $this->connection->getQueryBuilder();
		$totalUsers[] = 'admin';
		//Create 4 users. admin, user1, user2, user3
		$user = 'user';
		for ($i = 1; $i <= 3; $i++) {
			$this->createUser($user . $i);
			$totalUsers[] = $user . $i;
		}

		//Lets create 12000 entries in oc_share to share
		//The idea here is 3000 folders of admin are shared with
		//2 other users. So each folders are getting re-shared with others
		$getAllIdsPerUser = [];
		$totalParents = 1;
		foreach ($totalUsers as $user) {
			$userIndex = \array_search($user, $totalUsers, true);
			for ($i=1; $i <= 2000; $i++) {
				if (($userIndex+1) === \count($totalUsers)) {
					break;
				}
				$time = 1522762088 + $userIndex + 1 +  $i * 60;

				$shareWithUser = $totalUsers[$userIndex+1];
				$uidOwner = $user;
				if ($userIndex === 0) {
					$qb->insert('share')
						->values([
							'share_type' => $qb->expr()->literal('0'),
							'share_with' => $qb->expr()->literal($shareWithUser),
							'uid_owner' => $qb->expr()->literal($uidOwner),
							'item_type' => $qb->expr()->literal('folder'),
							'item_source' => $qb->expr()->literal($i),
							'file_source' => $qb->expr()->literal($i),
							'file_target' => $qb->expr()->literal('/' . $i),
							'permissions' => $qb->expr()->literal(31),
							'stime' => $qb->expr()->literal($time),
						])
						->execute();
					$getAllIdsPerUser[$user][$i] = $this->getLastSharedId();
					$totalParents++;
				} else {
					$qb->insert('share')
						->values([
							'share_type' => $qb->expr()->literal('0'),
							'share_with' => $qb->expr()->literal($shareWithUser),
							'uid_owner' => $qb->expr()->literal($uidOwner),
							'parent' => $qb->expr()->literal($getAllIdsPerUser['admin'][$i]),
							'item_type' => $qb->expr()->literal('folder'),
							'item_source' => $qb->expr()->literal($getAllIdsPerUser['admin'][$i]),
							'file_source' => $qb->expr()->literal($getAllIdsPerUser['admin'][$i]),
							'file_target' => $qb->expr()->literal('/' . $getAllIdsPerUser['admin'][$i]),
							'permissions' => $qb->expr()->literal(31),
							'stime' => $qb->expr()->literal($time),
						])
						->execute();
					$totalParents++;
					$getAllIdsPerUser[$user][] = $this->getLastSharedId();
				}
			}
		}

		//Now lets delete 1500 rows from admin user who had reshared to other users.
		$delRows = 1500;
		$indexIdToDelete = 10;
		while ($delRows > 0) {
			//Lets try to grab even indexes from $getAllIdsPerUser['admin']
			// and delete them.
			$qb->delete('share')
				->where($qb->expr()->eq('id', $qb->createNamedParameter($getAllIdsPerUser['admin'][$indexIdToDelete])))
				->execute();
			$delRows--;
			$indexIdToDelete++;
		}

		$outputMock = $this->createMock(IOutput::class);
		$this->repair->run($outputMock);

		//Query to check the deleted parents
		$checkQuery = $this->connection->getQueryBuilder();
		//From 10 to 1509 are the entries missing. So lets validate that.
		//Lets take some snippets
		$missingEntries[] = \range(10, 20);
		$missingEntries[] = \range(190, 200);
		$missingEntries[] = \range(400, 410);
		$missingEntries[] = \range(1000, 1010);
		$missingEntries[] = \range(1300, 1310);
		$missingEntries[] = \range(1499, 1509);
		foreach ($missingEntries as $missingEntry) {
			foreach ($missingEntry as $adminIndex) {
				$row = $checkQuery->select('parent')
					->from('share')->where($checkQuery->expr()->eq('id', $checkQuery->createNamedParameter($getAllIdsPerUser['admin'][$adminIndex])))
					->execute()->fetchAll();
				$this->assertCount(0, $row);
			}
		}

		//Lets check range of 1800 to 1810 and 1 to 9
		$checkRandomAvailableEntries[] = \range(1800, 1810);
		$checkRandomAvailableEntries[] = \range(1, 9);
		foreach ($checkRandomAvailableEntries as $checkRandomAvailableEntry) {
			foreach ($checkRandomAvailableEntry as $adminIndex) {
				$row = $checkQuery->select('parent')
					->from('share')->where($checkQuery->expr()->eq('id', $checkQuery->createNamedParameter($getAllIdsPerUser['admin'][$adminIndex])))
					->execute()->fetchAll();
				$this->assertCount(1, $row);
			}
		}
	}

	/**
	 * @return int
	 */
	protected function getLastSharedId() {
		return $this->connection->lastInsertId('*PREFIX*share');
	}
}
