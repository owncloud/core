<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
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

namespace OCA\Files_Sharing\Tests;

use OCA\Files_Sharing\Activity;

/**
 * Class ActivityTest
 *
 * @group DB
 *
 * @package OCA\Files_Sharing\Tests
 */
class ActivityTest extends TestCase {

	/**
	 * @var Activity
	 */
	private $activity;

	protected function setUp() {
		parent::setUp();
		$this->activity = new Activity(
			$this->getMockBuilder('OCP\L10N\IFactory')
				->disableOriginalConstructor()
				->getMock(),
			$this->getMockBuilder('OCP\IURLGenerator')
				->disableOriginalConstructor()
				->getMock(),
			$this->getMockBuilder('OCP\Activity\IManager')
				->disableOriginalConstructor()
				->getMock()
		);
	}

	/**
	 * @dataProvider dataTestGetDefaultType
	 */
	public function testGetDefaultTypes($method, $expectedResult) {
		$result = $this->activity->getDefaultTypes($method);

		if (\is_array($expectedResult)) {
			$this->assertCount(\count($expectedResult), $result);
			foreach ($expectedResult as $key => $expected) {
				$this->assertSame($expected, $result[$key]);
			}
		} else {
			$this->assertSame($expectedResult, $result);
		}
	}

	public function dataTestGetDefaultType() {
		return [
			['email', [Activity::TYPE_SHARED, Activity::TYPE_REMOTE_SHARE]],
			['stream', [Activity::TYPE_SHARED, Activity::TYPE_REMOTE_SHARE, Activity::TYPE_PUBLIC_LINKS]],
		];
	}

	/**
	 * @dataProvider dataGetTypeIcon
	 *
	 * @param string $type
	 * @param string$expectedResult
	 */
	public function testGetTypeIcon($type, $expectedResult) {
		$this->assertSame($expectedResult, $this->activity->getTypeIcon($type));
	}

	public function dataGetTypeIcon() {
		return [
			[Activity::TYPE_SHARED, 'icon-shared'],
			[Activity::TYPE_PUBLIC_LINKS, 'icon-download'],
		];
	}
}
