<?php
/**
 * @author Matthew Setter <matthew@matthewsetter.com>
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

namespace Tests\Core\Command\Config;

use OC\Core\Command\App\MoveApps;
use OCP\IConfig;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class AppsMoveTest
 *
 * This command can move apps from the core directory to a non-core location.
 * The motivation for this is https://github.com/owncloud/documentation/issues/3621,
 * which shows that errors can be created when moving apps by hand.
 *
 * This app will:
 * - List apps that can be moved
 * - List any non-core app directories
 * - Check that non-core app directories exist
 * - Move one or more apps from the core apps directory to a non-core apps directory
 */
class AppsMoveTest extends TestCase {

	/** @var \PHPUnit_Framework_MockObject_MockObject|IConfig */
	protected $config;

	/** @var CommandTester */
	private $commandTester;

	public function setUp() {
		parent::setUp();

		$this->config = $this->config = $this->getMockBuilder(IConfig::class)
			->disableOriginalConstructor()
			->getMock();

		$command = new MoveApps(\OC::$server->getAppManager(), $this->config);
		$this->commandTester = new CommandTester($command);
	}

	/**
	 * @dataProvider providesAppIds
	 * @param array $input
	 * @param string $expectedOutput
	 */
	public function testCommandInput($input, $expectedOutput) {

		$this->config->expects($this->atLeastOnce())
			->method('getSystemValue')
			->with('apps_paths')
			->willReturn(
				[
					[
						'path' => '/opt/core/apps',
						'url' => '/apps',
						'writable' => true,
					],
					[
						'path' => '/opt/core/apps-external',
						'url' => '/apps-external',
						'writable' => true,
					],
					[
						'path' => '/opt/core/apps-external-2',
						'url' => '/apps-external-2',
						'writable' => true,
					],
					[
						'path' => '/opt/core/apps-external-not-writable',
						'url' => '/apps-external-not-writable',
						'writable' => false,
					],
				]
			);

		$this->commandTester->execute($input);
		$output = $this->commandTester->getDisplay();
		$this->assertEquals($expectedOutput, $output);
	}

	public function providesAppIds() {
		return [
			[
				['--listNonCoreDirectories'],
				'Non-App Directories:
  - /apps-external -> /opt/core/apps-external
  - /apps-external-2 -> /opt/core/apps-external-2
'
			],
		];
	}
}
