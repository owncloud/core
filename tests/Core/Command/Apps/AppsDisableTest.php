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

use OC\Core\Command\App\Disable;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class AppsDisableTest
 *
 * @group DB
 */
class AppsDisableTest extends TestCase {

	/** @var CommandTester */
	private $commandTester;

	public function setUp() {
		parent::setUp();

		$command = new Disable(\OC::$server->getAppManager());
		$this->commandTester = new CommandTester($command);

		\OC_App::enable('testing');
	}

	/**
	 * @dataProvider providesAppIds
	 * @param $appId
	 * @param $expectedOutput
	 */
	public function testCommandInput($appId, $expectedOutput) {
		$input = ['app-id' => $appId];
		$this->commandTester->execute($input);
		$output = $this->commandTester->getDisplay();
		$this->assertContains($expectedOutput, $output);
	}

	public function providesAppIds() {
		return [
			['testing', 'testing disabled'],
			['hui-buh', 'No such app enabled: hui-buh'],
			['files', 'files can\'t be disabled.'],
		];
	}
}
