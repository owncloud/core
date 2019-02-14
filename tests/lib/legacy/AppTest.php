<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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
use OCP\App\AppNotFoundException;
use function Test\AppFramework\rrmdir;
use Test\TestCase;

class AppTest extends TestCase {
	private $appPath;

	protected function setUp() {
		parent::setUp();

		$this->appPath = __DIR__ . '/../../../apps/appinfotestapp';
		$infoXmlPath = "{$this->appPath}/appinfo/info.xml";
		\mkdir("{$this->appPath}/appinfo", 0777, true);

		$xml = '<?xml version="1.0" encoding="UTF-8"?>' .
		'<info>' .
			'<id>appinfotestapp</id>' .
			'<namespace>AppInfoTestApp</namespace>' .
		'</info>';
		\file_put_contents($infoXmlPath, $xml);
	}

	protected function tearDown() {
		$this->restoreService('NavigationManager');
		\OC::$server->getAppManager()->clearAppsCache();
		if (\is_dir($this->appPath)) {
			rrmdir($this->appPath);
		}
		parent::tearDown();
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

	private function assertEqualsAppInfo($info, array $changed = []) {
		self::assertEquals(\array_replace(
			[
				'id' => 'appinfotestapp',
				'namespace' => 'AppInfoTestApp',
				'info' => [],
				'remote' => [],
				'public' => [],
				'types' => [],
				'repair-steps' => [
					'install' => [],
					'pre-migration' => [],
					'post-migration' => [],
					'live-migration' => [],
					'uninstall' => [],
				],
				'background-jobs' => [],
				'two-factor-providers' => [],
				'commands' => [],
				'_cached' => true,
			], $changed),
			$info
		);
	}

	public function testGetAppInfo() {
		$info = \OC_App::getAppInfo('appinfotestapp');
		// it is already cached because reading an app by appinfo uses getAppInfo by path
		$this->assertEqualsAppInfo($info);

		// now it should be cached
		$info2 = \OC_App::getAppInfo('appinfotestapp');
		$this->assertEqualsAppInfo($info2);
	}

	public function testGetAppInfoByIdFillsCacheForPath() {
		$info = \OC_App::getAppInfo('appinfotestapp');
		$this->assertEqualsAppInfo($info);

		// should be cached, even if fetching by path
		$info2 = \OC_App::getAppInfo("{$this->appPath}/appinfo/info.xml", true);
		$this->assertEqualsAppInfo($info2);
	}

	public function testGetAppInfoByPathFillsCacheForAppId() {
		$info = \OC_App::getAppInfo("{$this->appPath}/appinfo/info.xml", true);
		// should not be cached
		$this->assertEqualsAppInfo($info, ['_cached' => false]);

		// should be cached, even if fetching by appid
		$info2 = \OC_App::getAppInfo('appinfotestapp');
		$this->assertEqualsAppInfo($info2);
	}

	public function testGetAppInfoXMLChange() {
		$info = \OC_App::getAppInfo('appinfotestapp');
		$this->assertEqualsAppInfo($info);

		// change app namespace
		$infoXmlPath = $this->appPath . '/appinfo/info.xml';
		$xml = '<?xml version="1.0" encoding="UTF-8"?>' .
			'<info>' .
			'<id>appinfotestapp</id>' .
			'<namespace>AppInfoTestApp2</namespace>' .
			'</info>';
		\file_put_contents($infoXmlPath, $xml);

		// should return new namespace
		$info2 = \OC_App::getAppInfo('appinfotestapp');
		$this->assertEqualsAppInfo($info2, ['_cached' => false, 'namespace' => 'AppInfoTestApp2']);

		// now it should be cached
		$info3 = \OC_App::getAppInfo('appinfotestapp');
		$this->assertEqualsAppInfo($info3, ['namespace' => 'AppInfoTestApp2']);
	}

	public function testGetAppInfoPathChange() {
		// store info in a different file
		$infoXmlPath = "{$this->appPath}/appinfo/info-old.xml";
		$xml = '<?xml version="1.0" encoding="UTF-8"?>' .
			'<info>' .
			'<id>appinfotestapp</id>' .
			'<namespace>AppInfoTestApp</namespace>' .
			'</info>';
		\file_put_contents($infoXmlPath, $xml);

		// fill cache with 'old' path
		$info = \OC_App::getAppInfo($infoXmlPath, true);
		$this->assertEqualsAppInfo($info, ['_cached' => false]);

		\unlink($infoXmlPath);

		// check info can be found under new path by using the appid
		$info2 = \OC_App::getAppInfo('appinfotestapp');
		$this->assertEqualsAppInfo($info2);

		// now it should be cached
		$info3 = \OC_App::getAppInfo('appinfotestapp');
		$this->assertEqualsAppInfo($info3);
	}

	public function testGetAppInfoNotExisting() {
		self::assertNull(\OC_App::getAppInfo(''));
		self::assertNull(\OC_App::getAppInfo('_notexistingfortest'));
		self::assertNull(\OC_App::getAppInfo("{$this->appPath}/appinfo/info-not-existing.xml"), true);
	}

	public function testGetAppInfoEmpty() {
		$infoXmlPath = $this->appPath . '/appinfo/info.xml';
		\file_put_contents($infoXmlPath, '');
		self::assertNull(\OC_App::getAppInfo('appinfotestapp'));
	}

	/**
	 * @expectedException \OCP\App\AppNotFoundException
	 */
	public function testGetAppInfoDeleted() {
		$info = \OC_App::getAppInfo('appinfotestapp');
		$this->assertEqualsAppInfo($info);

		rrmdir($this->appPath);

		try {
			\OC_App::getAppInfo('appinfotestapp');
		} catch (AppNotFoundException $e) {
			// also try via path in same test to check caching
			\OC_App::getAppInfo("{$this->appPath}/appinfo/info.xml", true);
		}
		self::assertFalse(true, 'expected a AppNotFoundException');
	}
}
