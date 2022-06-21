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

	public function setUp(): void {
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
				$job->setLastChecked(10);
				$job->setReservedAt(0);
				$job->setExecutionDuration(-1);
				$callBack($job);
			});

		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$expected = <<<EOS
+--------+------------------------------------+---------------+----------+---------------------------+-------------+------------------------+
| Job ID | Job                                | Job Arguments | Last Run | Last Checked              | Reserved At | Execution Duration (s) |
+--------+------------------------------------+---------------+----------+---------------------------+-------------+------------------------+
| 666    | OC\BackgroundJob\Legacy\RegularJob |               | N/A      | 1970-01-01T00:00:10+00:00 | N/A         | N/A                    |
+--------+------------------------------------+---------------+----------+---------------------------+-------------+------------------------+
EOS;

		$this->assertStringContainsString($expected, $output);
	}

	public function testJobWithArray() {
		$this->jobList->expects($this->any())->method('listJobs')
			->willReturnCallback(function (\Closure $callBack) {
				$job = new RegularJob();
				$job->setId(666);
				$job->setArgument(['k'=> 'v','test2']);
				$job->setLastChecked(10);
				$job->setReservedAt(0);
				$job->setExecutionDuration(-1);
				$callBack($job);
			});
		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$expected = <<<EOS
+--------+------------------------------------+-----------------------+----------+---------------------------+-------------+------------------------+
| Job ID | Job                                | Job Arguments         | Last Run | Last Checked              | Reserved At | Execution Duration (s) |
+--------+------------------------------------+-----------------------+----------+---------------------------+-------------+------------------------+
| 666    | OC\BackgroundJob\Legacy\RegularJob | {"k":"v","0":"test2"} | N/A      | 1970-01-01T00:00:10+00:00 | N/A         | N/A                    |
+--------+------------------------------------+-----------------------+----------+---------------------------+-------------+------------------------+
EOS;

		$this->assertStringContainsString($expected, $output);
	}

	public function testJobWithSchedulingInfo() {
		$this->jobList->expects($this->any())->method('listJobs')
			->willReturnCallback(function (\Closure $callBack) {
				$job = new RegularJob();
				$job->setId(666);
				$job->setArgument(['k'=> 'v','test2']);
				$job->setLastRun(10);
				$job->setLastChecked(10);
				$job->setReservedAt(10);
				$job->setExecutionDuration(1);
				$callBack($job);
			});
		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$expected = <<<EOS
+--------+------------------------------------+-----------------------+---------------------------+---------------------------+---------------------------+------------------------+
| Job ID | Job                                | Job Arguments         | Last Run                  | Last Checked              | Reserved At               | Execution Duration (s) |
+--------+------------------------------------+-----------------------+---------------------------+---------------------------+---------------------------+------------------------+
| 666    | OC\BackgroundJob\Legacy\RegularJob | {"k":"v","0":"test2"} | 1970-01-01T00:00:10+00:00 | 1970-01-01T00:00:10+00:00 | 1970-01-01T00:00:10+00:00 | 1                      |
+--------+------------------------------------+-----------------------+---------------------------+---------------------------+---------------------------+------------------------+
EOS;

		$this->assertStringContainsString($expected, $output);
	}
}
