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

	protected function setUp(): void {
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

	protected function tearDown(): void {
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
		self::assertEquals(
			\array_replace(
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
			],
				$changed
			),
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
	 */
	public function testGetAppInfoDeleted() {
		$this->expectException(\OCP\App\AppNotFoundException::class);

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

	/**
	 * A handler path stored in a core public_/remote_ appconfig key must only ever
	 * resolve to a .php file inside the named app's own directory. Everything else
	 * has to come back as false, because public.php/remote.php require_once the
	 * result.
	 */
	public function testGetServiceHandlerPathAcceptsFileInsideTheApp() {
		\file_put_contents("{$this->appPath}/appinfo/handler.php", '<?php');

		self::assertSame(
			\realpath("{$this->appPath}/appinfo/handler.php"),
			\OC_App::getServiceHandlerPath('appinfotestapp', 'appinfo/handler.php')
		);
	}

	public function testGetServiceHandlerPathAcceptsTraversalStayingInsideTheApp() {
		\file_put_contents("{$this->appPath}/appinfo/handler.php", '<?php');

		self::assertSame(
			\realpath("{$this->appPath}/appinfo/handler.php"),
			\OC_App::getServiceHandlerPath('appinfotestapp', 'appinfo/../appinfo/handler.php')
		);
	}

	public function testGetServiceHandlerPathRejectsTraversalOutOfTheApp() {
		self::assertFalse(
			\OC_App::getServiceHandlerPath('appinfotestapp', '../../public.php')
		);
	}

	/**
	 * getAppPath() returns false for an app id with no directory on disk, and
	 * false . '/' is '/', so concatenating it unchecked yields an *absolute*
	 * include path - which contains no traversal sequence and therefore passes a
	 * plain "../" check. An admin can make isInstalled() true for such an app id
	 * by writing an appconfig `enabled` row for it, so this case has to be
	 * rejected here.
	 */
	public function testGetServiceHandlerPathRejectsAppWithoutADirectory() {
		self::assertFalse(\OC_App::getAppPath('appinfotestapp-not-on-disk'));
		self::assertFalse(
			\OC_App::getServiceHandlerPath('appinfotestapp-not-on-disk', __FILE__)
		);
	}

	/**
	 * The containment check has to compare against the app directory *plus* a
	 * separator, otherwise "…/apps/appinfotestapp" would also accept targets
	 * below the sibling directory "…/apps/appinfotestapp2".
	 */
	public function testGetServiceHandlerPathRejectsSiblingAppDirectory() {
		$siblingPath = "{$this->appPath}2";
		\mkdir($siblingPath, 0777, true);
		\file_put_contents("{$siblingPath}/handler.php", '<?php');

		try {
			self::assertFalse(
				\OC_App::getServiceHandlerPath('appinfotestapp', '../appinfotestapp2/handler.php')
			);
		} finally {
			\unlink("{$siblingPath}/handler.php");
			\rmdir($siblingPath);
		}
	}

	public function testGetServiceHandlerPathRejectsNonPhpFile() {
		self::assertFalse(
			\OC_App::getServiceHandlerPath('appinfotestapp', 'appinfo/info.xml')
		);
	}

	public function testGetServiceHandlerPathRejectsMissingFile() {
		self::assertFalse(
			\OC_App::getServiceHandlerPath('appinfotestapp', 'appinfo/not-there.php')
		);
	}

	public function testGetServiceHandlerPathRejectsDirectoryNamedLikeAPhpFile() {
		// realpath() succeeds for a directory and the suffix test is only a name
		// test, so without an is_file() check this would be require_once'd - an
		// E_COMPILE_ERROR the entry scripts' catch (\Throwable) cannot handle
		// assert the fixture really was created, otherwise realpath() would fail
		// for the wrong reason and this would pass with the is_file() check gone
		self::assertTrue(\mkdir("{$this->appPath}/handler.php", 0777, true));

		self::assertFalse(
			\OC_App::getServiceHandlerPath('appinfotestapp', 'handler.php')
		);
	}

	/**
	 * The values actually shipped in the bundled apps' info.xml must keep
	 * resolving - these are what public.php/remote.php serve in production, and
	 * every hardcoded remote service resolves through the app path as app "dav".
	 */
	public function providesShippedServiceHandlers() {
		return [
			['dav', 'appinfo/v1/webdav.php'],
			['dav', 'appinfo/v1/caldav.php'],
			['dav', 'appinfo/v1/carddav.php'],
			['dav', 'appinfo/v1/publicwebdav.php'],
			['dav', 'appinfo/v2/remote.php'],
			['files_sharing', 'public.php'],
		];
	}

	/**
	 * @dataProvider providesShippedServiceHandlers
	 */
	public function testGetServiceHandlerPathAcceptsShippedHandlers($app, $relativePath) {
		$expected = \realpath(\OC_App::getAppPath($app) . '/' . $relativePath);
		self::assertNotFalse($expected, "fixture missing: {$app}/{$relativePath}");
		self::assertSame($expected, \OC_App::getServiceHandlerPath($app, $relativePath));
	}

	public function providesEmptyServiceHandlerArguments() {
		return [
			'no relative path' => ['appinfotestapp', ''],
			'no app id' => ['', 'appinfo/handler.php'],
			'both empty' => ['', ''],
		];
	}

	/**
	 * @dataProvider providesEmptyServiceHandlerArguments
	 */
	public function testGetServiceHandlerPathRejectsEmptyArguments($app, $relativePath) {
		self::assertFalse(\OC_App::getServiceHandlerPath($app, $relativePath));
	}
}
