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

	public function deleteAllShares()  {
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
		for($i=1; $i <= 10; $i++) {
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
		foreach (array(1,3,5) as $id) {
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
		//Total 10 rows were there, we deleted 3 and the repair deleted another
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
		//Create another 30 users. user1, user2 ... user30
		$user = 'user';
		for($i=1; $i <= 30; $i++) {
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
			for($i=1; $i <= 100; $i++) {
				$time = 1522762088 + $i * 60;
				$userIndex = array_search($user, $totalUsers, true);
				if (($userIndex+1) === count($totalUsers)) {
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

		//Now lets randomly delete 100 folders of admin to create orphan shares
		//We would remove up to 20 id's from oc_share
		$rowId = 20;
		$deletedRows = 0;
		while($rowId > 0) {
			//$randomRow = (string)rand(1,100);
			$randomRow = (string)mt_rand($pareReshareCountRest,$pareReshareCountRest + 100);
			$qb = $this->connection->getQueryBuilder();
			//Check if the row is there before deleting
			$result = $qb->select('id')
				->from('share')
				->where($qb->expr()->eq('id', $qb->createNamedParameter($randomRow)))
				->execute()->fetchAll();
			if (count($result) === 0) {
				continue;
			}
			$qb->delete('share')
				->where($qb->expr()->eq('id', $qb->createNamedParameter($randomRow)))
				->execute();
			$rowId--;
			$deletedRows++;
		}

		// Now run the repair step and verify there are no more
		// orphan shares
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
			$result += count($results);
		} while(count($results) > 0);
		$this->assertEquals($totalParents - $deletedRows, $result);
	}
}
