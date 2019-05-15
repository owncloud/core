<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace Tests\Core\Command\Background\Queue;

use OC\BackgroundJob\Legacy\RegularJob;
use OC\Core\Command\Background\Queue\Status;
use OCP\BackgroundJob\IJobList;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class StatusTest
 *
 * @group DB
 */
class StatusTest extends TestCase {

	/** @var CommandTester */
	private $commandTester;
	/** @var IJobList */
	private $jobList;

	public function setUp() {
		parent::setUp();

		$this->jobList = $this->createMock(IJobList::class);
		$command = new Status($this->jobList);
		$command->setApplication(new Application());
		$this->commandTester = new CommandTester($command);
	}

	public function testCommandInput() {
		$this->jobList->expects($this->any())->method('listJobs')
			->willReturnCallback(function (\Closure $callBack) {
				$job = new RegularJob();
				$job->setId(666);
				$callBack($job);
			});

		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$expected = <<<EOS
+--------+------------------------------------+---------------------------+---------------+
| Job ID | Job                                | Last Run                  | Job Arguments |
+--------+------------------------------------+---------------------------+---------------+
| 666    | OC\BackgroundJob\Legacy\RegularJob | 1970-01-01T00:00:00+00:00 |               |
+--------+------------------------------------+---------------------------+---------------+
EOS;

		$this->assertContains($expected, $output);
	}

	public function testJobWithArray() {
		$this->jobList->expects($this->any())->method('listJobs')
			->willReturnCallback(function (\Closure $callBack) {
				$job = new RegularJob();
				$job->setId(666);
				$job->setArgument(['k'=> 'v','test2']);
				$callBack($job);
			});
		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$expected = <<<EOS
+--------+------------------------------------+---------------------------+-----------------------+
| Job ID | Job                                | Last Run                  | Job Arguments         |
+--------+------------------------------------+---------------------------+-----------------------+
| 666    | OC\BackgroundJob\Legacy\RegularJob | 1970-01-01T00:00:00+00:00 | {"k":"v","0":"test2"} |
+--------+------------------------------------+---------------------------+-----------------------+
EOS;

		$this->assertContains($expected, $output);
	}
}
