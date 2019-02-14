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

use OC\Core\Command\App\GetPath;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class AppsGetPathTest
 *
 * @group DB
 */
class AppsGetPathTest extends TestCase {

	/** @var CommandTester */
	private $commandTester;

	public function setUp(): void {
		parent::setUp();

		$command = new GetPath();
		$this->commandTester = new CommandTester($command);
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
			[['app' => 'dav'], \realpath(__DIR__ . '/../../../../apps/dav')],
		];
	}
}
