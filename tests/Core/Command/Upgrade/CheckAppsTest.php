<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
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

namespace Tests\Core\Command\Upgrade;


use OC\Core\Command\Upgrade\CheckApps;
use OC\Updater\PreUpdate;
use OCP\ILogger;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Test\TestCase;

class CheckAppsTest extends TestCase {
	/** @var \PHPUnit_Framework_MockObject_MockObject */
	protected $consoleInput;
	/** @var \PHPUnit_Framework_MockObject_MockObject */
	protected $consoleOutput;

	/** @var Command */
	protected $command;

	/** @var \PHPUnit_Framework_MockObject_MockObject */
	protected $preUpdate;

	/** @var \PHPUnit_Framework_MockObject_MockObject */
	protected $logger;


	protected function setUp() {
		parent::setUp();

		$this->preUpdate = $this->getMockBuilder(PreUpdate::class)
			->disableOriginalConstructor()
			->getMock();
		$this->logger = $this->getMockBuilder(ILogger::class)
			->disableOriginalConstructor()
			->getMock();


		$this->consoleInput = $this->createMock(InputInterface::class);
		$this->consoleOutput = $this->createMock(OutputInterface::class);

		$this->command = new CheckApps($this->preUpdate, $this->logger);
	}

	public function testCheckAppsData(){
		return [
			[
				[], 0,
			],
			[
				['foo_app'], 1,
			],
		];
	}

	/** @dataProvider testCheckAppsData
	 * @param [] $appIds
	 * @param int $expected
	 */
	public function testCheckApps($appIds, $expected) {
		$this->preUpdate->expects($this->any())
			->method('getMissingApps')
			->willReturn($appIds);

		$exitCode = $this->invokePrivate($this->command, 'execute', [$this->consoleInput, $this->consoleOutput]);
		$this->assertEquals($expected, $exitCode);
	}
}
