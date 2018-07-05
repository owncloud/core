<?php
/**
 * @author Tom Needham <tom@owncloud.com>
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

namespace Test\Command\Maintenance;

use OC\Core\Command\Maintenance\Repair;
use OCP\App\IAppManager;
use OCP\IConfig;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Test\TestCase;

/**
 * Class RepairTest
 *
 * @package Test\Command\Maintenance
 * @group DB
 */
class RepairTest extends TestCase {

	/** @var \OC\Repair */
	protected $repair;
	/** @var Repair */
	protected $command;
	/** @var IConfig */
	protected $config;
	/** @var EventDispatcherInterface */
	protected $dispatcher;
	/** @var IAppManager */
	protected $appManager;

	public function setUp() {
		parent::setUp();
		$this->repair = $this->createMock(\OC\Repair::class);
		$this->config = $this->createMock(IConfig::class);
		$this->dispatcher = $this->createMock(EventDispatcherInterface::class);
		$this->appManager = $this->createMock(IAppManager::class);
		$this->command = new Repair($this->repair, $this->config, $this->dispatcher, $this->appManager);
	}

	/**
	 * @dataProvider buildStepsData
	 * @param $expensiveSteps
	 * @param $runtimeSteps
	 * @param $expensive
	 * @param $runtimeMode
	 * @param $expected
	 */
	public function testBuildSteps($expensiveSteps, $runtimeSteps, $expensive, $runtimeMode, $expectedCount) {
		$this->appManager->method('getInstalledApps')->willReturn([]);
		$this->repair->expects($this->exactly($expectedCount))->method('addStep');
		$this->command->buildRepairList($expensive, $runtimeMode, $this->repair);
		//$this->assertSame($expected, $this->command->buildRepairList($expected, $runtimeMode, $this->repair));
		//$this->assertAttributeEquals($expected, '$repairSteps', )
	}

	public function buildStepsData() {
		return [
			[[], [], false, false, []]
		];
	}

}
