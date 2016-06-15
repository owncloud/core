<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
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

use OC\Repair\JobHash;
use OCP\BackgroundJob\IJobList;
use OCP\IDBConnection;
use OCP\Migration\IOutput;

/**
 * @group DB
 *
 * @see \OC\Repair\JobHashTest
 */
class JobHashTest extends \Test\TestCase {

	/** @var JobHash */
	protected $repair;

	/** @var IDBConnection */
	protected $connection;

	/** @var IJobList */
	protected $jobList;

	/** @var IOutput */
	private $outputMock;

	protected function setUp() {
		parent::setUp();

		$this->outputMock = $this->getMockBuilder('\OCP\Migration\IOutput')
			->disableOriginalConstructor()
			->getMock();

		$this->connection = \OC::$server->getDatabaseConnection();
		$this->repair = new JobHash($this->connection);
		$this->jobList = \OC::$server->getJobList();
		$this->cleanUpTables();
	}

	protected function tearDown() {
		$this->cleanUpTables();

		parent::tearDown();
	}

	protected function cleanUpTables() {
		$qb = $this->connection->getQueryBuilder();
		$qb->delete('jobs')->execute();
	}

	public function testData() {
		return [
			['\OC\My\Class', json_encode('my arguments'), 'my arguments'],
			['\OC\My\Class', json_encode(''), ''],
			['\OC\My\Class', json_encode(null), null],
			['\OC\My\Class', null, null],
		];
	}

	/**
	 * @dataProvider testData
	 */
	public function testRun($class, $arguments, $argCall) {
		$qb = $this->connection->getQueryBuilder();
		$qb->insert('jobs')
			->values([
				'class' => $qb->expr()->literal($class),
				'argument' => $qb->expr()->literal($arguments),
			]);
		$qb->execute();

		$this->assertFalse($this->jobList->has($class, $argCall));

		$this->repair->run($this->outputMock);

		$this->assertTrue($this->jobList->has($class, $argCall));
	}

}
