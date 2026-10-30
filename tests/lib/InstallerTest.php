<?php
/**
 * Copyright (c) 2014 Georg Ehrke <georg@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test;

use OC\Installer;
use OC\IntegrityCheck\Checker;
use OC\IntegrityCheck\Helpers\AppLocator;
use OC\IntegrityCheck\Helpers\EnvironmentHelper;
use OC\IntegrityCheck\Helpers\FileAccessHelper;
use OCP\ICache;
use PHPUnit\Framework\MockObject\MockObject;

class InstallerTest extends TestCase {
	private static $appid = 'testapp';

	protected function setUp(): void {
		parent::setUp();

		Installer::removeApp(self::$appid);
		\OC::$server->getConfig()->deleteAppValues(self::$appid);
		// The fixtures are unsigned. Don't let the result depend on whether
		// the build channel enforces signatures.
		$this->mockChecker([]);
	}

	protected function tearDown(): void {
		$this->restoreService('IntegrityCodeChecker');
		Installer::removeApp(self::$appid);
		\OC::$server->getConfig()->deleteAppValues(self::$appid);
		parent::tearDown();
	}

	private function useChecker(Checker $checker): void {
		$this->restoreService('IntegrityCodeChecker');
		$this->overwriteService('IntegrityCodeChecker', $checker);
	}

	/**
	 * @return Checker|MockObject
	 */
	private function mockChecker(array $result) {
		$checker = $this->createMock(Checker::class);
		$checker->method('verifyAppSignature')->willReturn($result);
		$this->useChecker($checker);
		return $checker;
	}

	/**
	 * A real Checker on a channel that enforces signatures.
	 */
	private function useEnforcingChecker(): void {
		$environment = $this->createMock(EnvironmentHelper::class);
		$environment->method('getChannel')->willReturn('stable');
		$this->useChecker(new Checker(
			$environment,
			new FileAccessHelper(),
			new AppLocator(),
			\OC::$server->getConfig(),
			\OC::$server->getMemCacheFactory(),
			\OC::$server->getAppManager(),
			\OC::$server->getTempManager(),
			null,
			\OC::$server->getHTTPClientService(),
			\OC::$server->getLogger()
		));
	}

	public function testInstallApp() {
		$pathOfTestApp  = __DIR__;
		$pathOfTestApp .= '/../data/';
		$pathOfTestApp .= 'testapp.zip';

		$tmp = \OC::$server->getTempManager()->getTemporaryFile('.zip');
		\OC_Helper::copyr($pathOfTestApp, $tmp);

		$data = [
			'path' => $tmp,
			'source' => 'path',
			'appdata' => [
				'id' => 'Bar',
				'level' => 100,
			]
		];

		Installer::installApp($data);
		$isInstalled = Installer::isInstalled(self::$appid);

		$this->assertTrue($isInstalled);
	}

	public function testUpdateApp() {
		$pathOfOldTestApp  = __DIR__;
		$pathOfOldTestApp .= '/../data/';
		$pathOfOldTestApp .= 'testapp.zip';

		$oldTmp = \OC::$server->getTempManager()->getTemporaryFile('.zip');
		\OC_Helper::copyr($pathOfOldTestApp, $oldTmp);

		$oldData = [
			'path' => $oldTmp,
			'source' => 'path',
			'appdata' => [
				'id' => 'Bar',
				'level' => 100,
			]
		];

		$pathOfNewTestApp  = __DIR__;
		$pathOfNewTestApp .= '/../data/';
		$pathOfNewTestApp .= 'testapp2.zip';

		$newTmp = \OC::$server->getTempManager()->getTemporaryFile('.zip');
		\OC_Helper::copyr($pathOfNewTestApp, $newTmp);

		$newData = [
			'path' => $newTmp,
			'source' => 'path',
			'appdata' => [
				'id' => 'Bar',
				'level' => 100,
			]
		];

		Installer::installApp($oldData);
		$oldVersionNumber = \OC_App::getAppVersion(self::$appid);

		Installer::updateApp($newData);
		$newVersionNumber = \OC_App::getAppVersion(self::$appid);

		$this->assertNotEquals($oldVersionNumber, $newVersionNumber);
	}

	/**
	 * Tests that update is installed into writable app dir if the original app dir is not writable
	 */
	public function testUpdateIntoWritableAppDir() {
		$oldAppRoots = \OC::$APPSROOTS;
		$relativePath = "/anotherdir";

		// Install old version
		$pathOfOldTestApp = __DIR__ . '/../data/testapp.zip';
		$oldTmp = \OC::$server->getTempManager()->getTemporaryFile('.zip');
		\OC_Helper::copyr($pathOfOldTestApp, $oldTmp);
		$oldData = [
			'path' => $oldTmp,
			'source' => 'path',
			'appdata' => [
				'id' => 'testapp',
				'level' => 100,
			]
		];
		$installResult = Installer::installApp($oldData);
		$this->assertEquals('testapp', $installResult);
		$oldAppPath = \OC_App::getAppPath(self::$appid);

		// Mark the first app as dir non-writable and create the second as writable
		$firstAppDir = \array_shift(\OC::$APPSROOTS);
		$firstAppDir['writable'] = false;

		$path = \dirname($firstAppDir['path']) . $relativePath;
		\mkdir($path);
		\clearstatcache();
		\OC::$APPSROOTS = [
			$firstAppDir,
			[
			'path' => $path,
			'url'  => $relativePath,
			'writable' => true
			]
		];
		\OC::$server->getAppManager()->clearAppsCache();

		// Update app
		$pathOfNewTestApp  = __DIR__ . '/../data/testapp2.zip';
		$newTmp = \OC::$server->getTempManager()->getTemporaryFile('.zip');
		\OC_Helper::copyr($pathOfNewTestApp, $newTmp);

		$newData = [
			'path' => $newTmp,
			'source' => 'path',
			'appdata' => [
				'id' => 'testapp',
				'level' => 100,
			]
		];
		$updateResult = Installer::updateApp($newData);
		$this->assertTrue($updateResult);
		$newAppPath = \OC_App::getAppPath(self::$appid);

		$this->assertNotEquals($oldAppPath, $newAppPath);
		$this->assertStringStartsWith($path, $newAppPath);

		\OC_Helper::rmdirr($path);
		\OC::$APPSROOTS = $oldAppRoots;
		\OC::$server->getAppManager()->clearAppsCache();
	}

	private function getAppInfoCache(): ICache {
		$appManager = \OC::$server->getAppManager();
		$property = new \ReflectionProperty($appManager, 'appInfo');
		$property->setAccessible(true);
		return $property->getValue($appManager);
	}

	private function getUnsignedTestAppData() {
		// testapp.zip ships no appinfo/signature.json
		$tmp = \OC::$server->getTempManager()->getTemporaryFile('.zip');
		\OC_Helper::copyr(__DIR__ . '/../data/testapp.zip', $tmp);
		return [
			'path' => $tmp,
			'source' => 'path',
		];
	}

	public function testInstallUnsignedAppIsRejectedWhenSignatureCheckFails() {
		$checker = $this->createMock(Checker::class);
		// verified without storing the result ...
		$checker->expects($this->once())
			->method('verifyAppSignature')
			->with(self::$appid, $this->anything(), false, false)
			->willReturn(['EXCEPTION' => ['class' => 'MissingSignatureException', 'message' => 'Signature data not found.']]);
		// ... and a rejected package never stores one
		$checker->expects($this->never())->method('storeAppResult');
		$this->useChecker($checker);

		$appInfoCache = $this->getAppInfoCache();
		$appInfoCache->remove(self::$appid);

		$tmp = $this->createArchive([
			'testapp/appinfo/info.xml' => null,
			'testapp/appinfo/signature.json' => '{}',
		]);
		$exception = null;
		try {
			Installer::installApp(['path' => $tmp, 'source' => 'path']);
		} catch (\Exception $e) {
			$exception = $e;
		}

		$this->assertNotNull($exception, 'Installing an app without a valid signature must fail');
		$this->assertStringContainsString('Signature could not get checked', $exception->getMessage());
		$this->assertFalse(Installer::isInstalled(self::$appid));
		$this->assertDirectoryDoesNotExist(\OC_App::getInstallPath() . '/' . self::$appid);
		$this->assertNull(\OC::$server->getConfig()->getAppValue(self::$appid, 'signed', null));
		// nor does its info.xml reach the app info cache
		$this->assertNull($appInfoCache->get(self::$appid));
	}

	public function testInstallUnsignedAppSucceedsWhenSignatureCheckPasses() {
		// e.g. the app is listed in 'integrity.ignore.missing.app.signature'
		$checker = $this->createMock(Checker::class);
		$checker->expects($this->once())
			->method('verifyAppSignature')
			->with(self::$appid, $this->anything(), false, false)
			->willReturn([]);
		// the result is stored once the app is in place
		$checker->expects($this->once())
			->method('storeAppResult')
			->with(self::$appid, []);
		$this->useChecker($checker);

		Installer::installApp($this->getUnsignedTestAppData());

		$this->assertTrue(Installer::isInstalled(self::$appid));
	}

	public function testUpdateToUnsignedAppClearsSignedFlag() {
		Installer::installApp($this->getUnsignedTestAppData());
		// as left behind by an earlier signed version
		\OC::$server->getConfig()->setAppValue(self::$appid, 'signed', 'true');

		$newTmp = \OC::$server->getTempManager()->getTemporaryFile('.zip');
		\OC_Helper::copyr(__DIR__ . '/../data/testapp2.zip', $newTmp);
		Installer::updateApp(['path' => $newTmp, 'source' => 'path']);

		$this->assertNull(\OC::$server->getConfig()->getAppValue(self::$appid, 'signed', null));
	}

	public function testInstallUnsignedAppIsRejectedOnEnforcedChannel() {
		$this->useEnforcingChecker();

		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Signature could not get checked');

		Installer::installApp($this->getUnsignedTestAppData());
	}

	public function testInstallUnsignedAppSucceedsOnEnforcedChannelWhenIgnored() {
		$config = \OC::$server->getConfig();
		$config->setSystemValue('integrity.ignore.missing.app.signature', [self::$appid]);
		try {
			$this->useEnforcingChecker();
			Installer::installApp($this->getUnsignedTestAppData());
		} finally {
			$config->deleteSystemValue('integrity.ignore.missing.app.signature');
		}

		$this->assertTrue(Installer::isInstalled(self::$appid));
	}

	public function testReadAppPackageRejectsUnsignedAppWithoutStoringAResult() {
		$checker = $this->mockChecker(['EXCEPTION' => ['class' => 'MissingSignatureException', 'message' => 'Signature data not found.']]);
		$checker->expects($this->never())->method('storeAppResult');

		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Signature could not get checked');

		\OC::$server->getAppManager()->readAppPackage($this->getUnsignedTestAppData()['path']);
	}

	public function providesArchivesWithAnUnverifiedAppFolder() {
		$installScript = '<?php throw new \Exception("install.php was run");';
		return [
			// 'otherapp/' carries the info.xml, while 'testapp/', which is what
			// would be copied into place, carries only install.php.
			'app folder named differently' => [
				['otherapp/appinfo/info.xml' => null, 'testapp/appinfo/install.php' => $installScript],
				'Archive does not contain a directory named testapp',
			],
			// the archive root gets verified, 'testapp/' gets copied
			'info.xml at the root' => [
				['appinfo/info.xml' => null, 'testapp/appinfo/install.php' => $installScript],
				'Archive does not contain a directory named testapp',
			],
			// which one would be verified depends on the readdir() order
			'two apps' => [
				['otherapp/appinfo/info.xml' => null, 'testapp/appinfo/info.xml' => null],
				'Archive contains more than one app',
			],
			'info.xml with an empty id' => [
				['testapp/appinfo/info.xml' => \preg_replace('|<id>.*</id>|', '<id></id>', self::getTestAppInfoXml())],
				'App does not provide an id in its info.xml file',
			],
			'id that is not canonical' => [
				['foo..bar/appinfo/info.xml' => \preg_replace('|<id>.*</id>|', '<id>foo..bar</id>', self::getTestAppInfoXml())],
				'App does not provide a valid id in its info.xml file',
			],
			'id longer than 32 characters' => [
				[\str_repeat('a', 33) . '/appinfo/info.xml' => \preg_replace('|<id>.*</id>|', '<id>' . \str_repeat('a', 33) . '</id>', self::getTestAppInfoXml())],
				'App does not provide a valid id in its info.xml file',
			],
			'malformed info.xml' => [
				['testapp/appinfo/info.xml' => '<info>'],
				'App cannot be installed because appinfo file cannot be read.',
			],
		];
	}

	private static function getTestAppInfoXml(): string {
		$source = new \ZipArchive();
		$source->open(__DIR__ . '/../data/testapp.zip');
		$infoXml = $source->getFromName('testapp/appinfo/info.xml');
		$source->close();
		return $infoXml;
	}

	private function createArchive(array $files): string {
		$infoXml = self::getTestAppInfoXml();
		$tmp = \OC::$server->getTempManager()->getTemporaryFile('.zip');
		$zip = new \ZipArchive();
		$zip->open($tmp, \ZipArchive::OVERWRITE);
		foreach ($files as $name => $content) {
			$zip->addFromString($name, $content ?? $infoXml);
		}
		$zip->close();
		return $tmp;
	}

	/**
	 * @dataProvider providesArchivesWithAnUnverifiedAppFolder
	 */
	public function testInstallRejectsAppFolderOtherThanTheVerifiedOne(array $files, string $expectedMessage) {
		$tmp = $this->createArchive($files);

		$exception = null;
		try {
			Installer::installApp(['path' => $tmp, 'source' => 'path']);
		} catch (\Exception $e) {
			$exception = $e;
		}

		$this->assertNotNull($exception, 'Installing a folder other than the verified one must fail');
		$this->assertStringContainsString($expectedMessage, $exception->getMessage());
		$this->assertFalse(Installer::isInstalled(self::$appid));
		$this->assertDirectoryDoesNotExist(\OC_App::getInstallPath() . '/' . self::$appid);
	}

	/**
	 * @dataProvider providesArchivesWithAnUnverifiedAppFolder
	 */
	public function testUpdateRejectsAppFolderOtherThanTheVerifiedOne(array $files, string $expectedMessage) {
		Installer::installApp($this->getUnsignedTestAppData());
		$appPath = \OC_App::getAppPath(self::$appid);
		$version = \OC_App::getAppVersion(self::$appid);

		$exception = null;
		try {
			Installer::updateApp(['path' => $this->createArchive($files), 'source' => 'path']);
		} catch (\Exception $e) {
			$exception = $e;
		}

		$this->assertNotNull($exception, 'Updating from a folder other than the verified one must fail');
		$this->assertStringContainsString($expectedMessage, $exception->getMessage());
		// the installed app is left alone
		$this->assertFileExists("$appPath/appinfo/info.xml");
		$this->assertFileDoesNotExist("$appPath/appinfo/install.php");
		$this->assertSame($version, \OC_App::getAppVersion(self::$appid));
	}
}
