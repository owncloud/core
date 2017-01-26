<?php
/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH.
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

namespace Tests\Lib\Updater;

use OC\Updater\PreUpdate;
use OCP\App\IAppManager;
use Test\TestCase;

class PreUpdateTest extends TestCase {

	/** @var \PHPUnit_Framework_MockObject_MockObject */
	protected $appManager;

	/** @var  PreUpdate */
	protected $instance;

	protected function setUp() {
		parent::setUp();
		$this->appManager = $this->getMockBuilder(IAppManager::class)
			->disableOriginalConstructor()
			->getMock();

		$this->instance = new PreUpdate($this->appManager);
	}

	public function testGetMissingAppsData(){
		return [
			[
				['firstapp', 'secondapp', 'thirdapp'],
				[
					['firstapp', [ 'id' => 'firstapp' ]],
					['secondapp', [ 'id' => 'secondapp' ]],
					['thirdapp', [ 'id' => 'thirdapp' ]],
				],
				[]
			],

			[
				['firstapp', 'secondapp', 'thirdapp'],
				[
					['firstapp', [ 'id' => 'firstapp' ]],
					['secondapp', [] ],
					['thirdapp', [ 'id' => 'thirdapp' ]],
				],
				['secondapp']
			],

		];
	}

	/** @dataProvider testGetMissingAppsData
	 * @param string[] $installedApps
	 * @param [] $appMap
	 * @param [] $expected
	 */
	public function testGetMissingApps($installedApps, $appMap, $expected) {
		$this->appManager->expects($this->any())
			->method('getInstalledApps')
			->willReturn($installedApps);

		$this->appManager->expects($this->any())
			->method('getAppInfo')
			->willReturnMap($appMap);

		$actual = $this->instance->getMissingApps();
		$this->assertEquals($expected, $actual);
	}
}
