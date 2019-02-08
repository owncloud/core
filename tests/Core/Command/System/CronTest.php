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

namespace Tests\Core\Command\System;

use OC\Core\Command\System\Cron;
use OCP\BackgroundJob\IJob;
use OCP\BackgroundJob\IJobList;
use OCP\IConfig;
use OCP\ILogger;
use OCP\ITempManager;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;
use Test\Traits\UserTrait;

/**
 * Class CronTest
 *
 * @group DB
 */
class CronTest extends TestCase {
	use UserTrait;

	/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject */
	private $config;
	/** @var ILogger | \PHPUnit_Framework_MockObject_MockObject */
	private $logger;
	/** @var IJobList | \PHPUnit_Framework_MockObject_MockObject */
	private $jobList;
	/** @var ITempManager | \PHPUnit_Framework_MockObject_MockObject */
	private $tempManager;

	/** @var CommandTester */
	private $commandTester;

	protected function setUp() {
		parent::setUp();

		$this->config = $this->createMock(IConfig::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->jobList = $this->createMock(IJobList::class);
		$this->tempManager = $this->createMock(ITempManager::class);

		$command = new Cron($this->jobList, $this->config, $this->logger, $this->tempManager);
		$this->commandTester = new CommandTester($command);
	}

	public function testMaintenanceMode(): void {
		$this->config->method('getSystemValue')->with('maintenance', false)->willReturn(true);

		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$this->assertContains('We are in maintenance mode, skipping cron', $output);
	}

	public function testSingleuser(): void {
		$this->config->method('getSystemValue')
			->willReturnMap([
				['maintenance', false, false],
				['singleuser', false, true]
			]);

		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$this->assertContains('We are in admin only mode, skipping cron', $output);
	}

	public function testCronDisabled(): void {
		$this->config->method('getSystemValue')
			->willReturnMap([
				['maintenance', false, false],
				['singleuser', false, false]
			]);
		$this->config->method('getAppValue')->with('core', 'backgroundjobs_mode', 'ajax')->willReturn('none');

		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$this->assertContains('Background Jobs are disabled!', $output);
	}

	public function testCronRun(): void {
		$this->config->method('getSystemValue')
			->willReturnMap([
				['maintenance', false, false],
				['singleuser', false, false]
			]);
		$this->config->method('getAppValue')->with('core', 'backgroundjobs_mode', 'ajax')->willReturn('ajax');
		// assert that the mode is set to cron
		$this->config->expects(self::once())->method('setAppValue')->with('core', 'backgroundjobs_mode', 'cron');

		$job = $this->createMock(IJob::class);
		$job->expects(self::once())->method('execute')->with($this->jobList, $this->logger);
		$this->jobList->method('getNext')->willReturnOnConsecutiveCalls($job, null);
		$this->jobList->expects(self::once())->method('setLastJob')->with($job);

		$this->commandTester->execute([]);
		$output = $this->commandTester->getDisplay();
		$this->assertContains('1 [->--------------------------]', $output);
	}
}
