<?php
/**
 * @author Phil Davis <phil@jankaritech.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

use OC\BackgroundJob\TimedJob;
use OCP\BackgroundJob\IJob;
use OC\Core\Command\Background\Queue\Execute;
use OCP\BackgroundJob\IJobList;
use OCP\AppFramework\Utility\ITimeFactory;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class ExecuteTest
 *
 * @group DB
 */
class ExecuteTest extends TestCase {

	/** @var CommandTester */
	private $commandTester;
	/** @var IJobList */
	private $jobList;
	/** @var ITimeFactory */
	private $timeFactory;
	/** @var IJob[] */
	private $jobById = [];

	public function setUp() {
		parent::setUp();

		$normalJob = $this->createMock(IJob::class);
		$timedJob = $this->createMock(TimedJob::class);
		$this->jobById = [];
		$this->jobById[42] = $timedJob;
		$this->jobById[48] = $normalJob;

		$this->timeFactory = $this->createMock(ITimeFactory::class);

		$this->jobList = $this->createMock(IJobList::class);
		$this->jobList->expects($this->any())->method('getById')
			->willReturnCallback(function ($id) {
				if (isset($this->jobById[$id])) {
					return $this->jobById[$id];
				} else {
					return null;
				}
			});

		$command = new Execute($this->jobList, $this->timeFactory);
		$this->commandTester = new CommandTester($command);
	}

	public function executeJobIdProvider() {
		return [
			[48],
			[42],
		];
	}

	public function testExecuteJobNotFoundWithAcceptWarning() {
		$input = ['Job ID' => '666', '--accept-warning' => null];
		foreach ($this->jobById as $id => $job) {
			$job->expects($this->never())
				->method('execute');
		}

		$this->assertSame(1, $this->commandTester->execute($input));
	}

	public function testExecuteJobNotFoundWithManualConfirmation() {
		$this->commandTester->setInputs(['yes']);
		$input = ['Job ID' => '666'];
		foreach ($this->jobById as $id => $job) {
			$job->expects($this->never())
				->method('execute');
		}

		$this->assertSame(1, $this->commandTester->execute($input));
	}

	/**
	 * @dataProvider executeJobIdProvider
	 */
	public function testExecuteJobWithAcceptWarning($jobId) {
		$input = ['Job ID' => $jobId, '--accept-warning' => null];  // normal job
		foreach ($this->jobById as $id => $job) {
			if ($id === \intval($jobId)) {
				// only the target job should be executed
				$job->expects($this->once())
					->method('execute');
				$this->jobList->expects($this->once())
					->method('setLastJob')
					->with($job);
				$this->jobList->expects($this->once())
					->method('setExecutionTime')
					->with($job, $this->anything());
			} else {
				$job->expects($this->never())
					->method('execute');
			}
		}

		$this->assertSame(0, $this->commandTester->execute($input));
	}

	/**
	 * @dataProvider executeJobIdProvider
	 */
	public function testExecuteJobWithManualConfirmation($jobId) {
		$this->commandTester->setInputs(['yes']);
		$input = ['Job ID' => $jobId];  // normal job
		foreach ($this->jobById as $id => $job) {
			if ($id === \intval($jobId)) {
				// only the target job should be executed
				$job->expects($this->once())
					->method('execute');
				$this->jobList->expects($this->once())
					->method('setLastJob')
					->with($job);
				$this->jobList->expects($this->once())
					->method('setExecutionTime')
					->with($job, $this->anything());
			} else {
				$job->expects($this->never())
					->method('execute');
			}
		}

		$this->assertSame(0, $this->commandTester->execute($input));
	}

	/**
	 * @dataProvider executeJobIdProvider
	 */
	public function testExecuteJobWithManualAbort($jobId) {
		$this->commandTester->setInputs(['no']);
		$input = ['Job ID' => $jobId];
		foreach ($this->jobById as $id => $job) {
			$job->expects($this->never())
				->method('execute');
		}

		$this->assertSame(1, $this->commandTester->execute($input));
	}

	/**
	 * @dataProvider executeJobIdProvider
	 */
	public function testExecuteJobWithForceOption($jobId) {
		$this->commandTester->setInputs(['yes']);
		$input = ['Job ID' => $jobId, '--force' => null];
		foreach ($this->jobById as $id => $job) {
			if ($id === \intval($jobId)) {
				// only the target job should be executed
				$job->expects($this->once())
					->method('execute');
				$this->jobList->expects($this->once())
					->method('setLastJob')
					->with($job);
				$this->jobList->expects($this->once())
					->method('setExecutionTime')
					->with($job, $this->anything());

				if ($job instanceof TimedJob) {
					// if it's a timed job, reset the last run, otherwise just run it normally
					$job->expects($this->once())
						->method('setLastRun')
						->with(0);
				}
			} else {
				$job->expects($this->never())
					->method('execute');
			}
		}

		$this->assertSame(0, $this->commandTester->execute($input));
	}
}
