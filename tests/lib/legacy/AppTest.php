<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
 */

namespace Test\legacy;

use OC\NavigationManager;
use Test\TestCase;

class AppTest extends TestCase {

	/**
	 * @dataProvider providesNavigation
	 * @param array $expected
	 * @param array $unorderedNavigation
	 */
	public function testNavigation($expected, $unorderedNavigation) {
		$navigationManager = $this->createMock(NavigationManager::class);
		$navigationManager->method('getAll')->willReturn($unorderedNavigation);
		$this->overwriteService('NavigationManager', $navigationManager);
		$navigation = \OC_App::getNavigation();
		$this->assertEquals($expected, $navigation);
	}

	public function providesNavigation() {
		return [
			'one entry' => [[[
				'id' => 'files',
				'order' => 0,
				'active' => false
			]], [[
				'id' => 'files',
				'order' => 0
			]]],
			'two entries' => [[[
				'id' => 'files',
				'order' => 0,
				'active' => false
			],[
			'id' => 'mail',
				'order' => 1,
				'active' => false
			]], [[
				'id' => 'mail',
				'order' => 1
			], [
				'id' => 'files',
				'order' => 0
			]]]
		];
	}

	protected function tearDown() {
		$this->restoreService('NavigationManager');
		parent::tearDown();
	}
}
