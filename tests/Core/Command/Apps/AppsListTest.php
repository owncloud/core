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

	public function setUp() {
		parent::setUp();

		$command = new ListApps(\OC::$server->getAppManager());
		$this->commandTester = new CommandTester($command);

		\OC_App::enable('testing');
	}

	/**
	 * @dataProvider providesAppIds
	 * @param array $input
	 * @param string $expectedOutput
	 */
	public function testCommandInput($input, $expectedOutput) {
		$this->commandTester->execute($input);
		$output = $this->commandTester->getDisplay();
		$this->assertContains($expectedOutput, $output);
	}

	public function providesAppIds() {
		return [
			[[], '- files: 1.5.2'],
			[['--shipped' => 'true'], '- dav: 0.4.0'],
			[['--shipped' => 'false'], '- testing:'],
			[['search-pattern' => 'dav'], '- dav: 0.4.0']
		];
	}
}
