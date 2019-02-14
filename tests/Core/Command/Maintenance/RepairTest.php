<?php
/**
 * @author Semih Serhat Karakaya <karakayasemi@itu.edu.tr>
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

namespace Tests\Core\Command\User;

use OC\Core\Command\Maintenance\Repair;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class RepairTest
 *
 * @group DB
 */
class RepairTest extends TestCase {

	/** @var CommandTester */
	private $commandTester;

	protected function setUp(): void {
		parent::setUp();

		$application = new Application(
			\OC::$server->getConfig(),
			\OC::$server->getEventDispatcher(),
			\OC::$server->getRequest()
		);
		$command = new Repair(
			new \OC\Repair(\OC\Repair::getRepairSteps(), \OC::$server->getEventDispatcher()),
			\OC::$server->getConfig(),
			\OC::$server->getEventDispatcher(),
			\OC::$server->getAppManager()
		);
		$command->setApplication($application);
		$this->commandTester = new CommandTester($command);
	}

	protected function tearDown(): void {
		parent::tearDown();
		\OC::$server->getConfig()->setSystemValue('maintenance', false);
	}

	/**
	 * @dataProvider inputProvider
	 * @param array $input
	 * @param boolean $maintenanceMode
	 * @param integer $returnValue
	 * @param string $expectedOutput
	 */
	public function testCommandInput($input, $maintenanceMode, $returnValue, $expectedOutput) {
		\OC::$server->getConfig()->setSystemValue('maintenance', $maintenanceMode);
		$result = $this->commandTester->execute($input);
		$this->assertEquals($result, $returnValue);
		$output = $this->commandTester->getDisplay();
		$this->assertContains($expectedOutput, $output);
	}

	public function inputProvider() {
		return [
			[['--list' => true], true, 0, 'Found'],
			[[], false, 0, 'Turn on maintenance mode to use this command'],
			[['--single' => '\OC\UnexistingClass'], true, 1, 'Repair step not found'],
			[['--single' => 'OC\Repair\RepairMimeTypes'], true, 0, 'Repair mime types'],
			[[], true, 0, '100%'],
			[['--include-expensive' => true], true, 0, 'Remove shares of old group memberships']
		];
	}
}
