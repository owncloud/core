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

use OC\BackgroundJob\Legacy\RegularJob;
use OC\BackgroundJob\TimedJob;
use OC\Core\Command\Background\Queue\Execute;
use OCP\BackgroundJob\IJobList;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

class TimedJobForExecuteTest extends TimedJob {
	public function __construct() {
		$this->setInterval(10);
	}

	public function run($argument) {
	}
}

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
	/** @var string */
	private $confirmPromptMessage = 'If you still want to use this command please confirm the usage by entering: yes';

	public function setUp() {
		parent::setUp();

		$this->jobList = $this->createMock(IJobList::class);
		$this->jobList->expects($this->any())->method('getById')
			->willReturnCallback(function ($id) {
				if ($id === '666') {
					return null;
				}
				if ($id === '42') {
					$job = new TimedJobForExecuteTest();
				} else {
					$job = new RegularJob();
				}
				$job->setId($id);
				return $job;
			});

		$command = new Execute($this->jobList);
		$this->commandTester = new CommandTester($command);
	}

	/**
	 * @dataProvider providesJobIds
	 * @param $jobId
	 * @param $expectedOutputs
	 */
	public function testCommandWithAcceptWarningOption($jobId, $expectedOutputs) {
		$input = ['Job ID' => $jobId, '--accept-warning' => null];
		$this->commandTester->execute($input);
		$output = $this->commandTester->getDisplay();
		$this->assertNotContains($this->confirmPromptMessage, $output);
		foreach ($expectedOutputs as $expectedOutput) {
			$this->assertContains($expectedOutput, $output);
		}
	}

	/**
	 * @dataProvider providesJobIds
	 * @param $jobId
	 * @param $expectedOutputs
	 */
	public function testCommandWithManualConfirmation($jobId, $expectedOutputs) {
		$this->commandTester->setInputs(['yes']);
		$input = ['Job ID' => $jobId];
		$this->commandTester->execute($input);
		$output = $this->commandTester->getDisplay();
		$this->assertContains($this->confirmPromptMessage, $output);
		foreach ($expectedOutputs as $expectedOutput) {
			$this->assertContains($expectedOutput, $output);
		}
	}

	public function providesJobIds() {
		return [
			['666', ['Job not found']],
			['1', ['Found job: OC\BackgroundJob\Legacy\RegularJob with ID 1', 'Running job...', 'Finished in', 'seconds']],
		];
	}

	public function testCommandWithManualAbort() {
		$this->commandTester->setInputs(['no']);
		$input = ['Job ID' => 1];
		$this->commandTester->execute($input);
		$output = $this->commandTester->getDisplay();
		$this->assertContains($this->confirmPromptMessage, $output);
		$this->assertNotContains('Running job', $output);
	}

	/**
	 * @dataProvider providesJobIdsForForceOption
	 * @param $jobId
	 * @param $expectedOutputs
	 */
	public function testCommandWithForceOption($jobId, $expectedOutputs) {
		$this->commandTester->setInputs(['yes']);
		$input = ['Job ID' => $jobId, '--force' => null];
		$this->commandTester->execute($input);
		$output = $this->commandTester->getDisplay();
		$this->assertContains($this->confirmPromptMessage, $output);
		foreach ($expectedOutputs as $expectedOutput) {
			$this->assertContains($expectedOutput, $output);
		}
	}

	public function providesJobIdsForForceOption() {
		return [
			['666', ['Job not found']],
			['42', ['Found job: Tests\Core\Command\Background\Queue\TimedJobForExecuteTest with ID 42', 'Forcing run, resetting last run value to 0', 'Running job...', 'Finished in', 'seconds']],
		];
	}
}
