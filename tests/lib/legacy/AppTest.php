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
			\Test\AppFramework\AppTest::rrmdir($this->appPath);
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

		\Test\AppFramework\AppTest::rrmdir($this->appPath);

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

	/**
	 * The helper contains, it does not ban "..": a traversal that resolves back
	 * inside the app directory is accepted, which is what its docblock promises and
	 * what makes realpath() containment the authoritative check rather than a
	 * second spelling filter. Neither entry point can currently reach this - both
	 * reject any "../" substring in the stored value first - so this pins the
	 * helper's own contract, and a later change to reject ".." outright would have
	 * to change this test too rather than pass silently.
	 */
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

	/**
	 * A NUL byte has to be refused before realpath() sees it: realpath() does not
	 * return false for it but raises a warning on PHP 7 and throws a ValueError on
	 * PHP 8, so the documented "false means refuse the request" contract would not
	 * hold and the callers' catch (\Throwable) would turn it into a logged 500.
	 */
	public function testGetServiceHandlerPathRejectsNulByteInRelativePath() {
		\file_put_contents("{$this->appPath}/appinfo/handler.php", '<?php');

		self::assertFalse(
			\OC_App::getServiceHandlerPath('appinfotestapp', "appinfo/handler.php\0.jpg")
		);
	}

	/**
	 * The app id has to be tested before getAppPath() is called, not only before
	 * realpath(): a NUL byte reaches is_dir() in there, which fails the same way.
	 */
	public function testGetServiceHandlerPathRejectsNulByteInAppId() {
		\file_put_contents("{$this->appPath}/appinfo/handler.php", '<?php');

		self::assertFalse(
			\OC_App::getServiceHandlerPath("appinfotestapp\0", 'appinfo/handler.php')
		);
	}

	public function providesCoreAppIds() {
		return [
			'core' => [true, 'core'],
			'trailing space' => [true, 'core '],
			'leading space' => [true, ' core'],
			'upper case' => [true, 'CORE'],
			'mixed case' => [true, 'Core'],
			'trailing slash, stripped by cleanAppId' => [true, 'core/'],
			'trailing dots, stripped by cleanAppId' => [true, 'core..'],
			'another app' => [false, 'files'],
			'app id merely containing core' => [false, 'encore'],
			// a spelling only the database folds onto "core" cannot be recognised
			// here - isCanonicalAppId() is what closes that class
			'accented' => [false, 'córe'],
			'non-string' => [false, ['core']],
			'null' => [false, null],
		];
	}

	/**
	 * @dataProvider providesCoreAppIds
	 */
	public function testIsCoreApp($expected, $app) {
		self::assertSame($expected, \OC_App::isCoreApp($app));
	}

	public function providesCanonicalAppIds() {
		return [
			'plain' => [true, 'core'],
			'with separators' => [true, 'files_sharing'],
			'with a dot and a dash' => [true, 'my.app-1'],
			'exactly the column width' => [true, \str_repeat('a', 32)],
			'trailing space' => [false, 'core '],
			'leading space' => [false, ' core'],
			'blank padded into a varchar(32) truncation' => [false, 'core' . \str_repeat(' ', 28) . 'X'],
			'trailing invalid byte' => [false, "core\x81"],
			'accented' => [false, 'córe'],
			'illegal character' => [false, 'app!'],
			'slash' => [false, 'core/'],
			'longer than the appid column' => [false, \str_repeat('a', 33)],
			// \z, not $: PCRE's $ also matches before a single trailing newline,
			// which would let these be truncated onto an existing row
			'trailing newline' => [false, "core\n"],
			'over-length with trailing newline' => [false, \str_repeat('a', 32) . "\n"],
			'empty' => [false, ''],
			'non-string' => [false, ['core']],
			'null' => [false, null],
		];
	}

	/**
	 * @dataProvider providesCanonicalAppIds
	 */
	public function testIsCanonicalAppId($expected, $app) {
		self::assertSame($expected, \OC_App::isCanonicalAppId($app));
	}

	public function providesCanonicalConfigKeys() {
		return [
			'plain' => [true, 'public_webdav'],
			'with a dot' => [true, 'oc.integritycheck.disabled'],
			'exactly the column width' => [true, \str_repeat('a', 64)],
			'longer than the key column' => [false, \str_repeat('a', 65)],
			'accented' => [false, 'públic_webdav'],
			'trailing space' => [false, 'public_webdav '],
			'trailing newline' => [false, "public_webdav\n"],
			'empty' => [false, ''],
			'non-string' => [false, ['public_webdav']],
			'null' => [false, null],
		];
	}

	/**
	 * @dataProvider providesCanonicalConfigKeys
	 */
	public function testIsCanonicalConfigKey($expected, $key) {
		self::assertSame($expected, \OC_App::isCanonicalConfigKey($key));
	}

	public function providesServiceHandlerKeys() {
		return [
			'public handler' => [true, 'public_webdav'],
			'remote handler' => [true, 'remote_dav'],
			// a case-insensitive collation folds these onto the stored row
			'upper case' => [true, 'PUBLIC_webdav'],
			'mixed case' => [true, 'Remote_dav'],
			'prefix only' => [true, 'public_'],
			'no underscore' => [false, 'publicwebdav'],
			'not at the start' => [false, 'x_public_webdav'],
			// this one no prefix test can catch; isCanonicalConfigKey() closes it
			'accented' => [false, 'públic_webdav'],
			'unrelated' => [false, 'lastupdatedat'],
			'non-string' => [false, ['public_webdav']],
			'null' => [false, null],
		];
	}

	/**
	 * @dataProvider providesServiceHandlerKeys
	 */
	public function testIsServiceHandlerKey($expected, $key) {
		self::assertSame($expected, \OC_App::isServiceHandlerKey($key));
	}

	public function providesProtectedCoreServiceKeys() {
		return [
			'public handler on core' => [true, 'core', 'public_webdav'],
			'remote handler on core' => [true, 'core', 'remote_dav'],
			// a case-insensitive collation folds these onto the stored row, so a
			// case-sensitive prefix test would let them overwrite it
			'upper case key on core' => [true, 'core', 'PUBLIC_webdav'],
			'mixed case key on core' => [true, 'core', 'Remote_dav'],
			'mangled core spelling' => [true, 'core ', 'public_webdav'],
			// the guard is keyed on the app, not on the key prefix alone:
			// files_sharing legitimately owns public_share_* keys
			'handler-looking key on another app' => [false, 'files_sharing', 'public_share_sharers_groups_allowlist'],
			'non-handler key on core' => [false, 'core', 'lastupdatedat'],
			// no prefix test can catch this one; isCanonicalConfigKey() is what
			// closes it, so this predicate must not claim to
			'accented key on core' => [false, 'core', 'públic_webdav'],
			'non-string key on core' => [false, 'core', ['public_webdav']],
			'non-string app' => [false, ['core'], 'public_webdav'],
		];
	}

	/**
	 * @dataProvider providesProtectedCoreServiceKeys
	 */
	public function testIsProtectedCoreServiceKey($expected, $app, $key) {
		self::assertSame($expected, \OC_App::isProtectedCoreServiceKey($app, $key));
	}
}
