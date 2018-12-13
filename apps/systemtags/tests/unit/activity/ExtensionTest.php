<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

namespace OCA\SystemTags\Tests;

use OCA\SystemTags\Activity\Extension;
use OCP\Activity\IManager;
use OCP\L10N\IFactory;
use Test\TestCase;

/**
 * Class ExtensionTest
 *
 * @package OCA\SystemTags\Tests
 * @group DB
 */
class ExtensionTest extends TestCase {
	/** @var IFactory */
	private $languageFactory;

	/** @var IManager */
	private $activityManager;

	/** @var Extension */
	private $extension;

	public function setUp() {
		parent::setUp();

		$this->languageFactory = $this->createMock(IFactory::class);
		$this->activityManager = $this->createMock(IManager::class);

		$this->extension = new Extension($this->languageFactory, $this->activityManager);
	}

	public function providesParameterToTag() {
		return [
			["<parameter>{{{staticTag|||not-editable}}}</parameter>", "<parameter>staticTag (static)</parameter>"],
			["<parameter>{{{visibleTag|||assignable}}}</parameter>", "<parameter>visibleTag</parameter>"],
			["<parameter>{{{restrictTag|||not-assignable}}}</parameter>", "<parameter>restrictTag (restricted)</parameter>"],
			["<parameter>{{{invisibleTag|||invisible}}}</parameter>", "<parameter>invisibleTag (invisible)</parameter>"],
			["<parameter>{{{unknownTag|||unknown}}</parameter>", "<parameter>{{{unknownTag|||unknown}}</parameter>"]
		];
	}

	/**
	 * @dataProvider providesParameterToTag
	 */
	public function testConvertParameterToTag($parameter, $expectedResult) {
		$l10n = \OC::$server->getL10N('systemtag');
		$result = $this->invokePrivate($this->extension, 'convertParameterToTag', [$parameter, $l10n]);
		$this->assertEquals($result, $expectedResult);
	}
}
