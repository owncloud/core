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

	/** @var  \OCP\IDBConnection */
	private $connection;

	/** @var  IRepairStep */
	private $repair;
	protected function setUp(): void {
		parent::setUp();

		$this->connection = \OC::$server->getDatabaseConnection();
		$this->repair = new RepairSubShares($this->connection);
		$this->createUser('admin');
	}

	protected function tearDown(): void {
		$this->deleteAllUsersAndGroups();
		$this->deleteAllShares();
		parent::tearDown();
	}

	public function deleteAllUsersAndGroups() {
		$this->tearDownUserTrait();
		$qb = $this->connection->getQueryBuilder();
		$qb->delete('groups')->execute();
		$qb->delete('group_user')->execute();
	}

	public function deleteAllShares() {
		$qb = $this->connection->getQueryBuilder();
		$qb->delete('share')->execute();
	}

	/**
	 * A test case to verify steps repair does address the simple step mentioned
	 * at https://github.com/owncloud/core/issues/27990#issuecomment-357899190
	 */

	public function testRemoveDuplicateSubShare() {
		$qb = $this->connection->getQueryBuilder();
		/*
		 * Create 3 users: user1, user2 and user3.
		 */
		$userName = "user";
		$groupName = "group1";
		$time = 1523892;
		//This array holds the id, share_with and parent per user
		$getAllIdsPerUser = [];
		\OC::$server->getGroupManager()->createGroup($groupName);
		for ($userCount = 1; $userCount <= 3; $userCount++) {
			$user = $this->createUser($userName.$userCount);
			\OC::$server->getGroupManager()->get($groupName)->addUser($user);
		}

		$usersinsharetable = ['admin', 'user1', 'user2', 'user2'];
		foreach ($usersinsharetable as $user) {
			//start with a simple insert query and alter later based on users.
			$inserValues = [
				'uid_owner' => $qb->expr()->literal('admin'),
				'uid_initiator' => $qb->expr()->literal('admin'),
				'item_type' => $qb->expr()->literal('folder'),
				'item_source' => $qb->expr()->literal(23),
				'file_source' => $qb->expr()->literal(23),
				'file_target' => $qb->expr()->literal('/test'),
				'permissions' => $qb->expr()->literal(31),
				'stime' => $qb->expr()->literal($time),
				'mail_send' => $qb->expr()->literal('0'),
				'accepted' => $qb->expr()->literal('0')
			];

			$userIndex = \array_search($user, $usersinsharetable, true);
			if ($userIndex === 0) {
				$inserValues['share_type'] = $qb->expr()->literal(1);
				$inserValues['share_with'] = $qb->expr()->literal($groupName);
				$user = $groupName;
			} else {
				$inserValues['share_type'] = $qb->expr()->literal(2);
				$inserValues['share_with'] = $qb->expr()->literal($user);
				$inserValues['parent'] = $qb->expr()->literal(1);
			}

			$qb->insert('share')
				->values($inserValues)
				->execute();
			$getAllIdsPerUser[$user][] = ['id' => $this->getLastSharedId(), 'share_with' => $user];
		}

		$outputMock = $this->createMock(IOutput::class);
		$this->repair->run($outputMock);

		$qb = $this->invokePrivate($this->repair, 'getSelectQueryToDetectDuplicatesBuilder', []);
		$results = $qb->execute()->fetchAll();
		$this->assertCount(0, $results);

		//There should be only one entry for share_with as 'user2'
		$qb = $this->connection->getQueryBuilder();
		$qb->select($qb->createFunction('count(*)'))
			->from('share')
			->where($qb->expr()->eq('share_with', $qb->createNamedParameter('user2')));
		$results = $qb->execute()->fetchAll();
		$this->assertCount(1, $results);

		$qb = $this->connection->getQueryBuilder();
		$qb->select('id', 'share_with')
			->from('share');
		$results = $qb->execute()->fetchAll();
		//Only 3 entries should be there
		$this->assertCount(3, $results);

		foreach ($results as $id) {
			$this->assertContains($id, $getAllIdsPerUser[$id['share_with']]);
		}
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
		$time = 1523892;
		$groupCount = 1;
		$totalGroups = 3;
		$parent = 1;
		//This array holds the id, share_with and parent per user
		$getAllIdsPerUser = [];
		$multipleOf = 2;
		for ($userCount = 1; $userCount <= 10; $userCount++) {
			$user = $this->createUser($userName.$userCount);
			if (\OC::$server->getGroupManager()->groupExists($groupName.$groupCount) === false) {
				\OC::$server->getGroupManager()->createGroup($groupName.$groupCount);
			}
			\OC::$server->getGroupManager()->get($groupName.$groupCount)->addUser($user);

			//Create a group share
			$qb->insert('share')
				->values([
					'share_type' => $qb->expr()->literal(2),
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
			$getAllIdsPerUser['ids'][] = ['id' => $this->getLastSharedId()];

			/**
			 * Group count incremented once value of userCount reaches multiple of 3
			 */
			if (($userCount % $totalGroups) === 0) {
				$groupCount++;
				$time += 1;
			}

			/**
			 * Increment parent
			 */
			if (($userCount % $multipleOf) === 0) {
				$parent++;
			}
		}

		$qb = $this->invokePrivate($this->repair, 'getSelectQueryToDetectDuplicatesBuilder', []);
		$idsNotPresent = $qb->execute()->fetchAll();

		$outputMock = $this->createMock(IOutput::class);
		$this->repair->run($outputMock);

		$results = $qb->execute()->fetchAll();
		$this->assertCount(0, $results);

		$qb = $this->connection->getQueryBuilder();
		$qb->select('id')
			->from('share');
		$results = $qb->execute()->fetchAll();
		//Only 7 entries should be there
		$this->assertCount(7, $results);

		foreach ($results as $id) {
			$this->assertContains($id, $getAllIdsPerUser['ids']);
		}

		//Verify that these ids are not there
		foreach ($results as $id) {
			$this->assertNotContains($id['id'], $idsNotPresent);
		}
	}

	/**
	 * This is to test large rows i.e, greater than 2000
	 * with duplicates
	 */
	public function testLargeDuplicateShareRows() {
		$qb = $this->connection->getQueryBuilder();
		$userName = "user";
		$time = 15238923;
		$groupCount = 0;
		$folderName = "/test";
		$maxUsersPerGroup = 1000;
		$parent = $groupCount + 1;
		//This array holds the id, share_with and parent per user
		$getAllIdsPerUser = [];
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
					'share_type' => $qb->expr()->literal(2),
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
			$getAllIdsPerUser['ids'][] = [
				'id' => $this->getLastSharedId()];
		}

		$outputMock = $this->createMock(IOutput::class);
		$this->repair->run($outputMock);

		$qb = $this->invokePrivate($this->repair, 'getSelectQueryToDetectDuplicatesBuilder', []);

		$results = $qb->execute()->fetchAll();
		$this->assertCount(0, $results);

		$qb = $this->connection->getQueryBuilder();
		$qb->select('id')
			->from('share');
		$results = $qb->execute()->fetchAll();

		$this->assertCount(6, $results);

		foreach ($results as $id) {
			$this->assertContains($id, $getAllIdsPerUser['ids']);
			if (\array_search($id, $results, true) === 5) {
				for ($i = $id['id'] + 1; $i < $id['id'] + 486; $i++) {
					$this->assertNotContains(['id' => $i], $results);
				}
			} else {
				//The next 1000 ids will not be there.
				for ($i = $id['id'] + 1; $i < $id['id'] + 999; $i++) {
					$this->assertNotContains(['id' => $i], $results);
				}
			}
		}
	}

	public function testName() {
		$this->assertEquals('Repair sub shares', $this->repair->getName());
	}

	/**
	 * Returns last inserted id to the oc_share table
	 * @return int
	 */
	protected function getLastSharedId() {
		return $this->connection->lastInsertId('*PREFIX*share');
	}
}
