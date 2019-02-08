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

namespace OCA\DAV\Tests\Unit\JobStatus;

use OCA\DAV\JobStatus\Entity\JobStatus as JobStatusEntity;
use OCA\DAV\JobStatus\Entity\JobStatusMapper;
use OCA\DAV\JobStatus\JobStatus;
use Test\TestCase;

/**
 * Class JobStatusTest
 *
 * @package OCA\DAV\Tests\Unit\JobStatus
 */
class JobStatusTest extends TestCase {

	/** @var JobStatus */
	private $jobStatus;
	/** @var JobStatusEntity */
	private $jobStatusEntity;
	/** @var JobStatusMapper | \PHPUnit_Framework_MockObject_MockObject */
	private $mapper;

	protected function setUp() {
		parent::setUp();

		$this->mapper = $this->createMock(JobStatusMapper::class);

		$this->jobStatusEntity = new JobStatusEntity();
		$this->mapper->method('findByUserIdAndJobId')->willReturn($this->jobStatusEntity);

		$this->jobStatus = new JobStatus('user1', '1234567890', $this->mapper, $this->jobStatusEntity);
	}

	public function testGetChild() {
		$this->assertEquals('1234567890', $this->jobStatus->getName());
	}

	public function testGet() {
		$this->jobStatusEntity->setStatusInfo('abc');
		$this->assertEquals('abc', $this->jobStatus->get());
		$this->assertEquals('"a9993e364706816aba3e25717850c26c9cd0d89d"', $this->jobStatus->getETag());
		$this->assertEquals(3, $this->jobStatus->getSize());

		$this->jobStatus->refreshStatus();
		$newJobStatusEntity = new JobStatusEntity();
		$newJobStatusEntity->setStatusInfo('def');
		$this->mapper->method('findByUserIdAndJobId')->willReturn($newJobStatusEntity);
		$this->assertEquals('abc', $this->jobStatus->get());
	}
}
