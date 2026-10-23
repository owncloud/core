<?php
/**
 * Copyright (c) 2014 Georg Ehrke <georg@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test;

use OC\Installer;

class InstallerTest extends TestCase {
	private static $appid = 'testapp';

	protected function setUp(): void {
		parent::setUp();

		Installer::removeApp(self::$appid);
		\OC::$server->getConfig()->deleteAppValues(self::$appid);
	}

	protected function tearDown(): void {
		Installer::removeApp(self::$appid);
		\OC::$server->getConfig()->deleteAppValues(self::$appid);
		parent::tearDown();
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
	 * Tests that updating with an archive whose top-level directory is not
	 * named after the app id fails with a clear error message and, crucially,
	 * does not destroy the already-installed app.
	 */
	public function testUpdateWithInvalidArchiveKeepsInstalledApp() {
		// Install the valid app first
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
		Installer::installApp($oldData);
		$this->assertTrue(Installer::isInstalled(self::$appid));
		$appPath = \OC_App::getAppPath(self::$appid);
		$this->assertNotFalse($appPath);
		$this->assertTrue(\is_dir($appPath));

		// Attempt to update with an invalid archive: its top-level directory is
		// "wrongname" although info.xml declares the id "testapp".
		$pathOfInvalidTestApp = __DIR__ . '/../data/testapp_invalid.zip';
		$invalidTmp = \OC::$server->getTempManager()->getTemporaryFile('.zip');
		\OC_Helper::copyr($pathOfInvalidTestApp, $invalidTmp);
		$invalidData = [
			'path' => $invalidTmp,
			'source' => 'path',
			'appdata' => [
				'id' => 'testapp',
				'level' => 100,
			]
		];

		$thrown = false;
		try {
			Installer::updateApp($invalidData);
		} catch (\Exception $e) {
			$thrown = true;
			$this->assertStringStartsWith('Archive does not contain a directory named', $e->getMessage());
		}
		$this->assertTrue($thrown, 'updateApp() should throw for an invalid archive');

		// The previously installed app must still be present and untouched.
		$this->assertTrue(\is_dir($appPath), 'The installed app directory must not be deleted on invalid update');
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
}
