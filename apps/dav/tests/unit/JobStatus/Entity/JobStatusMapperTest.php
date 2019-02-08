<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV\Tests\Unit\JobStatus\Entity;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use OCA\DAV\JobStatus\Entity\JobStatus;
use OCA\DAV\JobStatus\Entity\JobStatusMapper;
use OCP\IDBConnection;
use Sabre\DAV\UUIDUtil;
use Test\TestCase;

/**
 * Class JobStatusMapperTest
 *
 * @package OCA\DAV\Tests\Unit\JobStatus\Entity
 * @group DB
 */
class JobStatusMapperTest extends TestCase {
	/** @var JobStatusMapper */
	private $mapper;
	/** @var IDBConnection */
	private $database;
	/** @var JobStatus */
	private $testJobStatus;

	public function setUp() {
		parent::setUp();
		$this->database = \OC::$server->getDatabaseConnection();
		$this->mapper = new JobStatusMapper($this->database);

		// test entity
		$this->testJobStatus = new JobStatus();
		$this->testJobStatus->setUserId('xxx');
		$this->testJobStatus->setUuid(UUIDUtil::getUUID());
		$this->testJobStatus->setStatusInfo(\json_encode([]));
	}

	public function tearDown() {
		parent::tearDown();
		if ($this->mapper !== null && $this->testJobStatus !== null) {
			$this->mapper->delete($this->testJobStatus);
		}
	}

	/**
	 * @expectedException \Doctrine\DBAL\Exception\UniqueConstraintViolationException
	 */
	public function testInsert() {
		$this->mapper->insert($this->testJobStatus);
		$this->assertNotNull($this->testJobStatus->getId());
		// below throws exception due to unique constraint violation
		$this->mapper->insert($this->testJobStatus);
	}

	/**
	 * @depends testInsert
	 */
	public function testQuery() {
		$this->mapper->insert($this->testJobStatus);
		$entity = $this->mapper->findByUserIdAndJobId($this->testJobStatus->getUserId(),
			$this->testJobStatus->getUuid());
		$this->assertInstanceOf(JobStatus::class, $entity);
		$this->assertEquals($this->testJobStatus->getId(), $entity->getId());
		$this->assertEquals($this->testJobStatus->getUserId(), $entity->getUserId());
		$this->assertEquals($this->testJobStatus->getUuid(), $entity->getUuid());
		$this->assertEquals($this->testJobStatus->getStatusInfo(), $entity->getStatusInfo());
	}
}
