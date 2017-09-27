<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace Test\Group;

use OC\Group\BackendGroup;
use OC\Group\GroupMapper;
use OCP\IConfig;
use OCP\IDBConnection;
use Test\TestCase;
use OCP\AppFramework\Db\DoesNotExistException;

/**
 * Class GroupMapperTest
 *
 * @group DB
 *
 * @package Test\User
 */
class GroupMapperTest extends TestCase {

	/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject */
	protected $config;

	/** @var IDBConnection */
	protected $connection;

	/** @var GroupMapper */
	protected $mapper;

	public static function setUpBeforeClass() {
		parent::setUpBeforeClass();
		$mapper = \OC::$server->getGroupMapper();

		// create test users
		for ($i = 1; $i <= 4; $i++) {
			try {
				$backendGroup = $mapper->getGroup("TestFind$i");
				$mapper->delete($backendGroup);
			} catch (DoesNotExistException $ex) {
			}

			$backendGroup = new BackendGroup();
			$backendGroup->setGroupId("TestFind$i");
			$backendGroup->setDisplayName("TestFind$i");
			$backendGroup->setBackend(self::class);

			$mapper->insert($backendGroup);
		}
	}

	public function setUp() {
		parent::setUp();

		$this->config = $this->createMock(IConfig::class);

		$this->connection = \OC::$server->getDatabaseConnection();

		$this->mapper = new GroupMapper(
			$this->connection
		);
	}

	public static function tearDownAfterClass () {
		\OC::$server->getDatabaseConnection()->executeQuery('DELETE FROM `*PREFIX*backend_groups`');
		parent::tearDownAfterClass();
	}

	/**
	 * find one record without lowercase
	 */
	public function testGet() {
		$result = $this->mapper->getGroup("TestFind1");
		$this->assertInstanceOf(BackendGroup::class, $result);
	}

	/**
	 * find one record without lowercase
	 */
	public function testInsert() {
		$backendGroup = new BackendGroup();
		$backendGroup->setGroupId("TestFind5");
		$backendGroup->setDisplayName("TestFind5");
		$backendGroup->setBackend(self::class);

		$this->mapper->insert($backendGroup);
		$result = $this->mapper->getGroup("TestFind5");
		$this->assertInstanceOf(BackendGroup::class, $result);
	}

	/**
	 * find nothing because of lower case
	 *
	 * @expectedException \OCP\AppFramework\Db\DoesNotExistException
	 */
	public function testGetNone() {
		$this->mapper->getGroup("testfind1");
	}


	/**
	 * find all, use lower case
	 */
	public function testFindAll() {
		$result = $this->mapper->search('group_id',"testfind", null, null);
		$this->assertEquals(5, count($result));
	}


	/**
	 * find by userid, use lower case
	 */
	public function testFindByGroupId() {
		$result = $this->mapper->search('group_id',"testfind1", null, null);
		$this->assertEquals(1, count($result));
		$this->assertEquals("TestFind1", array_shift($result)->getGroupId());
	}

	/**
	 * find with limit and offset, use lower case
	 */
	public function testFindLimitAndOffset() {
		$result = $this->mapper->search('group_id','Test', 2, 2);
		$this->assertEquals(2, count($result));
		$this->assertEquals("TestFind3", array_shift($result)->getGroupId());
		$this->assertEquals("TestFind4", array_shift($result)->getGroupId());
	}
}