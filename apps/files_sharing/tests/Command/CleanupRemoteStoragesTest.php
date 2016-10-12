<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

use OCA\Files_Sharing\Command\CleanupRemoteStorages;
use OCP\DB\QueryBuilder\IQueryBuilder;
use Test\TestCase;

/**
 * Class CleanupRemoteStoragesTest
 *
 * @group DB
 *
 * @package OCA\Files\Tests\Command
 */
class CleanupRemoteStoragesTest extends TestCase {

	/**
	 * @var CleanupRemoteStorages
	 */
	private $command;

	/**
	 * @var \OCP\IDBConnection
	 */
	private $connection;

	private $storages = [
		['id' => 'shared::7b4a322b22f9d0047c38d77d471ce3cf', 'share_token' => 'f2c69dad1dc0649f26976fd210fc62e1', 'remote' => 'https://hostname.tld/owncloud1', 'user' => 'user1'],
		['id' => 'shared::efe3b456112c3780da6155d3a9b9141c', 'share_token' => 'f2c69dad1dc0649f26976fd210fc62e2', 'remote' => 'https://hostname.tld/owncloud2', 'user' => 'user2'],
		['notExistingId' => 'shared::33323d9f4ca416a9e3525b435354bc6f', 'share_token' => 'f2c69dad1dc0649f26976fd210fc62e3', 'remote' => 'https://hostname.tld/owncloud3', 'user' => 'user3'],
		['id' => 'shared::7fe41a07d3f517a923f4b2b599e72cbb'],
		['id' => 'shared::de4aeb2f378d222b6d2c5fd8f4e42f8e', 'share_token' => 'f2c69dad1dc0649f26976fd210fc62e5', 'remote' => 'https://hostname.tld/owncloud5', 'user' => 'user5'],
		['id' => 'shared::af712293ab5eb9e6a1745a13818b99fe'],
		['notExistingId' => 'shared::c34568c143cdac7d2f06e0800b5280f9', 'share_token' => 'f2c69dad1dc0649f26976fd210fc62e7', 'remote' => 'https://hostname.tld/owncloud7', 'user' => 'user7'],
	];

	protected function setup() {
		parent::setUp();

		$this->connection = \OC::$server->getDatabaseConnection();

		$storageQuery = \OC::$server->getDatabaseConnection()->getQueryBuilder();
		$storageQuery->insert('storages')
			->setValue('id', '?');

		$shareExternalQuery = \OC::$server->getDatabaseConnection()->getQueryBuilder();
		$shareExternalQuery->insert('share_external')
			->setValue('share_token', '?')
			->setValue('remote', '?')
			->setValue('name', '?')->setParameter(2, 'irrelevant')
			->setValue('owner', '?')->setParameter(3, 'irrelevant')
			->setValue('user', '?')
			->setValue('mountpoint', '?')->setParameter(5, 'irrelevant')
			->setValue('mountpoint_hash', '?')->setParameter(6, 'irrelevant');

		foreach ($this->storages as $storage) {
			if (isset($storage['id'])) {
				$storageQuery->setParameter(0, $storage['id']);
				$storageQuery->execute();
			}

			if (isset($storage['share_token'])) {
				$shareExternalQuery
					->setParameter(0, $storage['share_token'])
					->setParameter(1, $storage['remote'])
					->setParameter(4, $storage['user']);
				$shareExternalQuery->execute();
			}
		}

		$this->command = new CleanupRemoteStorages($this->connection);
	}

	public function tearDown() {
		$storageQuery = \OC::$server->getDatabaseConnection()->getQueryBuilder();
		$storageQuery->delete('storages')
			->where($storageQuery->expr()->eq('id', $storageQuery->createParameter('id')));

		$shareExternalQuery = \OC::$server->getDatabaseConnection()->getQueryBuilder();
		$shareExternalQuery->delete('share_external')
			->where($shareExternalQuery->expr()->eq('share_token', $shareExternalQuery->createParameter('share_token')))
			->andWhere($shareExternalQuery->expr()->eq('remote', $shareExternalQuery->createParameter('remote')));

		foreach ($this->storages as $storage) {
			if (isset($storage['id'])) {
				$storageQuery->setParameter('id', $storage['id']);
				$storageQuery->execute();
			}

			if (isset($storage['share_token'])) {
				$shareExternalQuery->setParameter('share_token', $storage['share_token']);
				$shareExternalQuery->setParameter('remote', $storage['remote']);
				$shareExternalQuery->execute();
			}
		}

		return parent::tearDown();
	}

	/**
	 * Test cleanup of orphaned storages
	 */
	public function testCleanup() {
		$input = $this->getMockBuilder('Symfony\Component\Console\Input\InputInterface')
			->disableOriginalConstructor()
			->getMock();
		$output = $this->getMockBuilder('Symfony\Component\Console\Output\OutputInterface')
			->disableOriginalConstructor()
			->getMock();

		//

		// parent folder, `files`, ´test` and `welcome.txt` => 4 elements

		$at = 0;
		$output
			->expects($this->at($at++))
			->method('writeln')
			->with('5 remote storage(s) need(s) to be checked');
		$output
			->expects($this->at($at++))
			->method('writeln')
			->with('5 remote share(s) exist');
		$output
			->expects($this->at($at++))
			->method('writeln')
			->with($this->stringStartsWith("{$this->storages[0]['id']} belongs to remote share"));
		$output
			->expects($this->at($at++))
			->method('writeln')
			->with($this->stringStartsWith("{$this->storages[1]['id']} belongs to remote share"));
		$output
			->expects($this->at($at++))
			->method('writeln')
			->with($this->stringStartsWith("{$this->storages[4]['id']} belongs to remote share"));
		$output
			->expects($this->at($at++))
			->method('writeln')
			->with($this->stringStartsWith("{$this->storages[2]['notExistingId']} for share"));
		$output
			->expects($this->at($at++))
			->method('writeln')
			->with($this->stringStartsWith("{$this->storages[6]['notExistingId']} for share"));
		$output
			->expects($this->at($at++))
			->method('write')
			->with($this->stringStartsWith("deleting {$this->storages[3]['id']}"));
		$output
			->expects($this->at($at++))
			->method('writeln')
			->with('deleted 1');
		$output
			->expects($this->at($at++))
			->method('write')
			->with($this->stringStartsWith("deleting {$this->storages[5]['id']}"));
		$output
			->expects($this->at($at++))
			->method('writeln')
			->with('deleted 1');

		$this->command->execute($input, $output);

	}
}

