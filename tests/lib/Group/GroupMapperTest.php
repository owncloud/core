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

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
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
 * @package Test\Group
 */
class GroupMapperTest extends TestCase {

	/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject */
	protected $config;

	/** @var IDBConnection */
	protected $connection;

	/** @var GroupMapper */
	protected $mapper;

	public function setUp() {
		parent::setUp();

		$this->config = $this->createMock(IConfig::class);

		$this->connection = \OC::$server->getDatabaseConnection();

		$this->mapper = new GroupMapper(
			$this->connection
		);
		// create test groups
		for ($i = 1; $i <= 4; $i++) {
			try {
				$backendGroup = $this->mapper->getGroup("testgroup$i");
				$this->mapper->delete($backendGroup);
			} catch (DoesNotExistException $ex) {
				$backendGroup = new BackendGroup();
				$backendGroup->setGroupId("testgroup$i");
				$backendGroup->setDisplayName("TestGroup$i");
				$backendGroup->setBackend(self::class);

				$this->mapper->insert($backendGroup);
			}
		}
	}

	public function tearDown() {
		parent::tearDown();
		$connection = \OC::$server->getDatabaseConnection();
		$mapper = new GroupMapper(
			$connection
		);
		for ($i = 0; $i <= 5; $i++) {
			try {
				$backendGroup = $mapper->getGroup("testgroup$i");
				$mapper->delete($backendGroup);
			} catch (DoesNotExistException $ex) {
			}
		}
	}

	/**
	 * find one record without lowercase
	 */
	public function testGet() {
		$result = $this->mapper->getGroup("testgroup1");
		$this->assertInstanceOf(BackendGroup::class, $result);
	}

	/**
	 * find one record without lowercase
	 */
	public function testInsert() {
		$backendGroup = new BackendGroup();
		$backendGroup->setGroupId("testgroup5");
		$backendGroup->setDisplayName("TestGroup5");
		$backendGroup->setBackend(self::class);

		$this->mapper->insert($backendGroup);
		$result = $this->mapper->getGroup("testgroup5");
		$this->assertInstanceOf(BackendGroup::class, $result);

		// Cleanup
		$this->mapper->delete($backendGroup);
	}

	/**
	 * Insert twice the same element should cause exception
	 */
	public function testDoubleInsertInValid() {
		$backendGroup = new BackendGroup();
		$backendGroup->setGroupId("testgroup5");
		$backendGroup->setDisplayName("TestGroup5");
		$backendGroup->setBackend(self::class);

		$this->mapper->insert($backendGroup);
		$result = $this->mapper->getGroup("testgroup5");
		$this->assertInstanceOf(BackendGroup::class, $result);

		$exceptionRaised = false;
		try {
			$this->mapper->insert($backendGroup);
		} catch (UniqueConstraintViolationException $exception) {
			$exceptionRaised = true;
		}

		$this->assertTrue($exceptionRaised);

		// Cleanup
		$this->mapper->delete($backendGroup);
	}

	/**
	 * find nothing because of upper case
	 */
	public function testGetNone() {
		$exceptionRaised = false;
		try {
			$this->mapper->getGroup("TestGroup1");
		} catch (DoesNotExistException $exception) {
			$exceptionRaised = true;
		}

		$this->assertTrue($exceptionRaised);
	}

	/**
	 * find all, use lower case
	 */
	public function testFindAll() {
		$result = $this->mapper->search("testgroup", null, null);
		$this->assertEquals(4, count($result));
	}

	/**
	 * find by userid, use lower case
	 */
	public function testFindByGroupId() {
		$result = $this->mapper->search("testgroup1", null, null);
		$this->assertEquals(1, count($result));
		$group = array_shift($result);
		$this->assertEquals("testgroup1", $group->getGroupId());
		$this->assertEquals("TestGroup1", $group->getDisplayName());
	}

	/**
	 * find with limit and offset, use lower case
	 */
	public function testFindLimitAndOffset() {
		$result = $this->mapper->search('TestGroup', 2, 2);
		$this->assertEquals(2, count($result));
		$this->assertEquals("TestGroup3", array_shift($result)->getDisplayName());
		$this->assertEquals("TestGroup4", array_shift($result)->getDisplayName());
	}
}