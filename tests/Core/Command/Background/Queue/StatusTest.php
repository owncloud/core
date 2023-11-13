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

use OC\Authentication\Token\DefaultTokenCleanupJob;
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
		$this->jobList->method('listJobs')
			->willReturnCallback(function (\Closure $callBack) {
				$job = new DefaultTokenCleanupJob();
				$job->setId(666);
				$job->setLastChecked(10);
				$job->setReservedAt(0);
				$job->setExecutionDuration(-1);
				$callBack($job);
			});

		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$expected = <<<EOS
+--------+------------------------------------------------+---------------+----------+---------------------------+-------------+------------------------+
| Job ID | Job                                            | Job Arguments | Last Run | Last Checked              | Reserved At | Execution Duration (s) |
+--------+------------------------------------------------+---------------+----------+---------------------------+-------------+------------------------+
| 666    | OC\Authentication\Token\DefaultTokenCleanupJob |               | N/A      | 1970-01-01T00:00:10+00:00 | N/A         | N/A                    |
+--------+------------------------------------------------+---------------+----------+---------------------------+-------------+------------------------+
EOS;

		$this->assertStringContainsString($expected, $output);
	}

	public function testJobWithArray() {
		$this->jobList->expects($this->any())->method('listJobs')
			->willReturnCallback(function (\Closure $callBack) {
				$job = new DefaultTokenCleanupJob();
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
+--------+------------------------------------------------+-----------------------+----------+---------------------------+-------------+------------------------+
| Job ID | Job                                            | Job Arguments         | Last Run | Last Checked              | Reserved At | Execution Duration (s) |
+--------+------------------------------------------------+-----------------------+----------+---------------------------+-------------+------------------------+
| 666    | OC\Authentication\Token\DefaultTokenCleanupJob | {"k":"v","0":"test2"} | N/A      | 1970-01-01T00:00:10+00:00 | N/A         | N/A                    |
+--------+------------------------------------------------+-----------------------+----------+---------------------------+-------------+------------------------+
EOS;

		$this->assertStringContainsString($expected, $output);
	}

	public function testJobWithSchedulingInfo(): void {
		$this->jobList->method('listJobs')
			->willReturnCallback(function (\Closure $callBack) {
				$job = new DefaultTokenCleanupJob();
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
+--------+------------------------------------------------+-----------------------+---------------------------+---------------------------+---------------------------+------------------------+
| Job ID | Job                                            | Job Arguments         | Last Run                  | Last Checked              | Reserved At               | Execution Duration (s) |
+--------+------------------------------------------------+-----------------------+---------------------------+---------------------------+---------------------------+------------------------+
| 666    | OC\Authentication\Token\DefaultTokenCleanupJob | {"k":"v","0":"test2"} | 1970-01-01T00:00:10+00:00 | 1970-01-01T00:00:10+00:00 | 1970-01-01T00:00:10+00:00 | 1                      |
+--------+------------------------------------------------+-----------------------+---------------------------+---------------------------+---------------------------+------------------------+
EOS;

		$this->assertStringContainsString($expected, $output);
	}

	public function testListingInvalidJob(): void {
		$this->jobList->method('listJobsIncludingInvalid')
			->willReturnCallback(
				function (\Closure $validJobCallback, \Closure $invalidJobCallback) {
					$job = new DefaultTokenCleanupJob();
					$job->setId(42);
					$job->setArgument(['k'=> 'v']);
					$job->setLastRun(10);
					$job->setLastChecked(10);
					$job->setReservedAt(10);
					$job->setExecutionDuration(7);
					$validJobCallback($job);
					$row = [
						'id' => 98,
						'class' => 'SomeUnknownClass',
						'argument' => '',
						'last_run' => 60,
						'last_checked' => 120,
						'reserved_at' => 180,
						'execution_duration' => 14];
					$invalidJobCallback($row);
				}
			);
		$this->commandTester->execute(
			['--display-invalid-jobs' => null]
		);
		$output = $this->commandTester->getDisplay();
		$expected = <<<EOS
+--------+------------------------------------------------+---------------+---------------------------+---------------------------+---------------------------+------------------------+---------+
| Job ID | Job                                            | Job Arguments | Last Run                  | Last Checked              | Reserved At               | Execution Duration (s) | Status  |
+--------+------------------------------------------------+---------------+---------------------------+---------------------------+---------------------------+------------------------+---------+
| 42     | OC\Authentication\Token\DefaultTokenCleanupJob | {"k":"v"}     | 1970-01-01T00:00:10+00:00 | 1970-01-01T00:00:10+00:00 | 1970-01-01T00:00:10+00:00 | 7                      |         |
| 98     | SomeUnknownClass                               |               | 1970-01-01T00:01:00+00:00 | 1970-01-01T00:02:00+00:00 | 1970-01-01T00:03:00+00:00 | 14                     | invalid |
+--------+------------------------------------------------+---------------+---------------------------+---------------------------+---------------------------+------------------------+---------+
EOS;

		$this->assertStringContainsString($expected, $output);
	}
}
