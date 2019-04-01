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
use OCA\DAV\JobStatus\Home;
use OCA\DAV\JobStatus\JobStatus;
use OCP\AppFramework\Db\DoesNotExistException;
use Test\TestCase;

/**
 * Class HomeTest
 *
 * @package OCA\DAV\Tests\Unit\JobStatus
 */
class HomeTest extends TestCase {
	public function testGetName() {
		/** @var JobStatusMapper | \PHPUnit\Framework\MockObject\MockObject $mapper */
		$mapper = $this->createMock(JobStatusMapper::class);
		$home = new Home(['uri' => 'principals/users/user1'], $mapper);
		$this->assertEquals('user1', $home->getName());
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\MethodNotAllowed
	 */
	public function testGetChildren() {
		/** @var JobStatusMapper | \PHPUnit\Framework\MockObject\MockObject $mapper */
		$mapper = $this->createMock(JobStatusMapper::class);
		$home = new Home(['uri' => 'principals/users/user1'], $mapper);
		$home->getChildren();
	}

	public function testGetChild() {
		/** @var JobStatusMapper | \PHPUnit\Framework\MockObject\MockObject $mapper */
		$mapper = $this->createMock(JobStatusMapper::class);

		$jobStatusEntity = new JobStatusEntity();
		$mapper->method('findByUserIdAndJobId')->willReturn($jobStatusEntity);
		$home = new Home(['uri' => 'principals/users/user1'], $mapper);
		$child = $home->getChild('1234567890');
		$this->assertInstanceOf(JobStatus::class, $child);
		$this->assertEquals('1234567890', $child->getName());
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\NotFound
	 */
	public function testGetChildNotFound() {
		/** @var JobStatusMapper | \PHPUnit\Framework\MockObject\MockObject $mapper */
		$mapper = $this->createMock(JobStatusMapper::class);

		$ex = new DoesNotExistException('');
		$mapper->method('findByUserIdAndJobId')->willThrowException($ex);
		$home = new Home(['uri' => 'principals/users/user1'], $mapper);
		$home->getChild('1234567890');
	}
}
