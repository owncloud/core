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

use OC\Core\Command\App\Enable;
use Symfony\Component\Console\Tester\CommandTester;
use Test\TestCase;

/**
 * Class AppsEnableTest
 *
 * @group DB
 */
class AppsEnableTest extends TestCase
{

	/** @var CommandTester */
	private $commandTester;

	public function setUp()
	{
		parent::setUp();

		$command = new Enable(\OC::$server->getAppManager());
		$this->commandTester = new CommandTester($command);

	}

	/**
	 * @dataProvider providesAppIds
	 * @param $appId
	 * @param $expectedOutput
	 * @param string|null $group
	 */
	public function testCommandInput($appId, $expectedOutput, $group = null)
	{
		$input = ['app-id' => $appId];
		if ($group !== null) {
			$input['--groups'] = [$group];
		}
		$this->commandTester->execute($input);
		$output = $this->commandTester->getDisplay();

		$this->assertContains($expectedOutput, $output);
	}

	public function providesAppIds()
	{
		return [
			[["comments", "files"], "comments enabled\nfiles enabled"],
			[["comments", "kukki"], "comments enabled\nkukki not found"],
			[["hui-buh"], "hui-buh not found"],
			[['updatenotification'], "updatenotification enabled for groups: admin", "admin"],
			[
				["hui-buh", "hebele-hubele", "updatenotification"],
				"hui-buh not found\nhebele-hubele not found\nupdatenotification enabled",
			],
		];
	}
}
