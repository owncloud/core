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

namespace Tests\Core\Controller;

use OC\Core\Controller\CronController;
use OCP\AppFramework\Http;
use OCP\BackgroundJob\IJob;
use OCP\BackgroundJob\IJobList;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IRequest;
use Test\TestCase;

/**
 * Class CronControllerTest
 *
 * @package OC\Core\Controller
 */
class CronControllerTest extends TestCase {

	/** @var CronController */
	private $controller;
	/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject */
	private $config;
	/** @var ILogger | \PHPUnit_Framework_MockObject_MockObject */
	private $logger;
	/** @var IJobList | \PHPUnit_Framework_MockObject_MockObject */
	private $jobList;
	/** @var IRequest | \PHPUnit_Framework_MockObject_MockObject */
	private $request;

	protected function setUp() {
		$this->request = $this->createMock(IRequest::class);
		$this->config = $this->createMock(IConfig::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->jobList = $this->createMock(IJobList::class);

		$this->controller = new CronController('core', $this->request,
			$this->config, $this->logger, $this->jobList);
	}

	public function testCronDisabled(): void {
		$this->config->method('getAppValue')->with('core', 'backgroundjobs_mode', 'ajax')->willReturn('none');
		$response = $this->controller->run();
		$this->assertEquals(new Http\JSONResponse(['data' => ['message' => 'Background jobs disabled!']]), $response);
	}

	public function testCronReal(): void {
		$this->config->method('getAppValue')->with('core', 'backgroundjobs_mode', 'ajax')->willReturn('cron');
		$response = $this->controller->run();
		$this->assertEquals(new Http\JSONResponse(['data' => ['message' => 'Background jobs are using system cron!']]), $response);
	}

	public function testCronRun(): void {
		$this->config->method('getAppValue')->with('core', 'backgroundjobs_mode', 'ajax')->willReturn('ajax');
		$job = $this->createMock(IJob::class);
		$job->expects(self::once())->method('execute')->with($this->jobList, $this->logger);
		$this->jobList->expects(self::once())->method('getNext')->willReturn($job);
		$this->jobList->expects(self::once())->method('setLastJob')->with($job);
		$response = $this->controller->run();
		$this->assertEquals(new Http\JSONResponse(), $response);
	}
}
