<?php
/**
 * @author Morris Jobke <hey@morrisjobke.de>
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

namespace Test\App\CodeChecker;

use OCP\App\AppNotFoundException;
use OCP\App\IAppManager;
use OC\App\CodeChecker\InfoChecker;
use OC\App\InfoParser;
use Test\TestCase;

class InfoCheckerTest extends TestCase {

	/** @var IAppManager | \PHPUnit\Framework\MockObject\MockObject */
	protected $appManager;

	protected function setUp(): void {
		parent::setUp();

		$this->appManager = $this->getMockBuilder(IAppManager::class)
			->disableOriginalConstructor()
			->getMock();

		$this->appManager->expects($this->any())
			->method('getAppPath')
			->will(
				$this->returnCallback(
					function ($appId) {
						return \OC::$SERVERROOT . '/tests/apps/' . $appId;
					}
				)
			);
	}

	public function appInfoData() {
		return [
			['testapp-infoxml', []],
			['testapp-version', [['type' => 'mandatoryFieldMissing', 'field' => 'version']]],
			['testapp-infoxml-version', []],
			['testapp-infoxml-version-different', [['type' => 'differentVersions', 'message' => 'appinfo/version: 1.2.4 - appinfo/info.xml: 1.2.3']]],
			['testapp-version-missing', [['type' => 'mandatoryFieldMissing', 'field' => 'version']]],
			['testapp-name-missing', [['type' => 'mandatoryFieldMissing', 'field' => 'name']]],
			['testapp-nomin', [['type' => 'missingRequirement', 'message' => 'No minimum ownCloud version is defined in appinfo/info.xml']]],
			['testapp-nomax', [['type' => 'missingRequirement', 'message' => 'No maximum ownCloud version is defined in appinfo/info.xml']]],
		];
	}

	/**
	 * @dataProvider appInfoData
	 *
	 * @param $appId
	 * @param $expectedErrors
	 */
	public function testApps($appId, $expectedErrors) {
		$infoChecker = $this->getInfoChecker(new InfoParser());
		$errors = $infoChecker->analyse($appId);

		$this->assertEquals($expectedErrors, $errors);
	}

	public function testInvalidAppInfo() {
		$infoParser = $this->getMockBuilder(InfoParser::class)
			->getMock();
		$infoParser->expects($this->any())
			->method('parse')
			->will($this->throwException(new AppNotFoundException()));

		$infoChecker = $this->getInfoChecker($infoParser);
		$errors = $infoChecker->analyse('testapp-infoxml');

		$this->assertArrayHasKey('type', $errors[0]);
		$this->assertEquals('invalidAppInfo', $errors[0]['type']);
	}

	private function getInfoChecker($infoParser) {
		return new InfoChecker($infoParser, $this->appManager);
	}
}
