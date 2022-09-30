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

namespace Tests\Core\Command\Config;

use OC\Core\Command\App\ListApps;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class AppsDisableTest
 *
 * @group DB
 */
class AppsListTest extends TestCase {
	/** @var CommandTester */
	private $commandTester;

	public function setUp(): void {
		parent::setUp();

		$command = new ListApps(\OC::$server->getAppManager());
		$this->commandTester = new CommandTester($command);

		\OC_App::enable('comments');
	}

	/**
	 * @dataProvider providesAppIds
	 * @param array $input
	 * @param string $expectedOutput
	 */
	public function testCommandInput($input, $expectedOutput) {
		$this->commandTester->execute($input);
		$output = $this->commandTester->getDisplay();
		$this->assertStringContainsString($expectedOutput, $output);
	}

	public function providesAppIds() {
		return [
			[[], "- files:\n    - Version: 1.5"],
			[[], "- dav:\n    - Version: 0.7.0\n    - Path: ".\realpath(__DIR__ . '/../../../../apps/dav')],
			[['--shipped' => 'true'],  "- dav:\n    - Version: 0.7.0"],
			[['--shipped' => 'false'], '- comments:'],
			[['search-pattern' => 'dav'], "- dav:\n    - Version: 0.7.0"]
		];
	}
}
