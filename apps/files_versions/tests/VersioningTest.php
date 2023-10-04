<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Georg Ehrke <georg@owncloud.com>
 * @author Ilja Neumann <ineumann@owncloud.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Stefan Weil <sw@weilnetz.de>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCA\Files_Versions\Tests;

require_once __DIR__ . '/../appinfo/app.php';

use OC;
use OC\Files\Filesystem;
use OC\Files\ObjectStore\ObjectStoreStorage;
use OC\Files\Storage\Temporary;
use OC\Files\View;
use OC\User\NoUserException;
use OC_Hook;
use OC_User;
use OC_Util;
use OCA\Files_Sharing\AppInfo\Application;
use OCA\Files_Versions\FileHelper;
use OCA\Files_Versions\Hooks;
use OCA\Files_Versions\MetaStorage;
use OCP\Constants;
use OCA\Files_Versions\Expiration;
use OCP\Files\Cache\IWatcher;
use OCP\Files\Storage;
use OCP\IConfig;
use OCP\Util;
use PHPUnit\Framework\MockObject\MockObject;
use ReflectionClass;
use Test\TestCase;
use function basename;
use function file_exists;
use function file_put_contents;
use function json_encode;
use function sleep;
use function substr;
use function time;
use function uniqid;

/**
 * Class Test_Files_versions
 * this class provide basic files versions test
 *
 * @group DB
 */
class VersioningTest extends TestCase {
	public const USERS_VERSIONS_ROOT = '/test-versions-user/files_versions';

	/** @var string */
	private $user1;
	/** @var string */
	private $user2;
	/** @var string */
	private $versionsRootOfUser1;
	/** @var IConfig|MockObject */
	private $mockConfig;
	/** @var string */
	private $dataDir;
	/** @var bool */
	private $objectStoreEnabled;

	/**
	 * @var View
	 */
	private $rootView;

	public static function setUpBeforeClass(): void {
		parent::setUpBeforeClass();

		$application = new Application();
		$application->registerMountProviders();
	}

	protected function setUp(): void {
		parent::setUp();

		OC::$server->getEncryptionManager()->setupStorage();
		$this->dataDir = OC::$server->getConfig()->getSystemValue('datadirectory');

		// Generate random usernames for better isolation
		$testId = \uniqid('', true);
		$this->user1 = "test-versions-user1-$testId";
		$this->user2 = "test-versions-user2-$testId";
		$this->versionsRootOfUser1 = "/$this->user1/files_versions";

		// Create users
		self::loginHelper($this->user1, true);
		self::loginHelper($this->user2, true);

		// Default to user1
		self::loginHelper($this->user1);

		$this->rootView = new View();
		if (!$this->rootView->file_exists($this->versionsRootOfUser1)) {
			$this->rootView->mkdir($this->versionsRootOfUser1);
		}

		$this->objectStoreEnabled = $this->rootView
			->getFileInfo($this->versionsRootOfUser1)
			->getStorage()
			->instanceOfStorage(ObjectStoreStorage::class);
	}

	protected function tearDown(): void {
		$this->restoreService('AllConfig');

		if ($this->rootView) {
			$this->rootView->deleteAll($this->user1 . '/files/');
			$this->rootView->deleteAll($this->user2 . '/files/');
			$this->rootView->deleteAll($this->user1 . '/files_versions/');
			$this->rootView->deleteAll($this->user2 . '/files_versions/');
		}

		$user = OC::$server->getUserManager()->get($this->user1);
		if ($user !== null) {
			self::logout();
			$user->delete();
		}
		$user = OC::$server->getUserManager()->get($this->user2);
		if ($user !== null) {
			self::logout();
			$user->delete();
		}

		OC_Hook::clear();

		parent::tearDown();
	}

	/**
	 * Enables customizing system config for unit-testing.
	 */
	private function overwriteConfig($saveVersionMetadata=false, $versionsRetentionObligation='auto'): void {
		$config = OC::$server->getConfig();
		$this->mockConfig = $this->createMock(IConfig::class);
		$this->mockConfig
			->method('getSystemValue')
			->willReturnCallback(function ($key, $default) use ($config, $saveVersionMetadata, $versionsRetentionObligation) {
				if ($key === 'filesystem_check_changes') {
					return IWatcher::CHECK_ONCE;
				}

				if ($key === 'file_storage.save_version_metadata') {
					return $saveVersionMetadata;
				}

				if ($key === 'versions_retention_obligation') {
					return $versionsRetentionObligation;
				}

				return $config->getSystemValue($key, $default);
			});

		$this->mockConfig->method('getAppValue')->willReturnArgument(2);

		$this->overwriteService('AllConfig', $this->mockConfig);

		// clear hooks
		OC_Hook::clear();
		OC::registerShareHooks();

		\OCA\Files_Versions\Storage::enableMetaData(null);
		if ($saveVersionMetadata) {
			\OCA\Files_Versions\Storage::enableMetaData(new MetaStorage($this->dataDir, new FileHelper()));
		}

		Hooks::connectHooks();
	}

	public function metaDataEnabledProvider(): array {
		return [
			'metaDisabled' => [false],
			'metaEnabled' => [true],
			];
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testMoveFileIntoSharedFolderAsRecipient(bool $metaDataEnabled): void {
		$this->overwriteConfig($metaDataEnabled);

		Filesystem::mkdir('folder1');
		$fileInfo = Filesystem::getFileInfo('folder1');

		$node = OC::$server->getUserFolder($this->user1)->get('folder1');
		$share = OC::$server->getShareManager()->newShare();
		$share->setNode($node)
			->setShareType(OC\Share\Constants::SHARE_TYPE_USER)
			->setSharedBy($this->user1)
			->setSharedWith($this->user2)
			->setPermissions(Constants::PERMISSION_ALL);
		$share = OC::$server->getShareManager()->createShare($share);

		self::loginHelper($this->user2);
		$versionsFolder2 = '/' . $this->user2 . '/files_versions';
		Filesystem::file_put_contents('test.txt', 'test file');

		$t1 = time();
		// second version is two weeks older, this way we make sure that no
		// version will be expired
		$t2 = $t1 - 60 * 60 * 24 * 14;

		$this->rootView->mkdir($versionsFolder2);
		// create some versions
		$v1 = $versionsFolder2 . '/test.txt.v' . $t1;
		$v2 = $versionsFolder2 . '/test.txt.v' . $t2;
		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			// one metadata file for each version
			$m0 = $versionsFolder2 . '/test.txt' . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT;
			$m1 = $versionsFolder2 . '/test.txt.v' . $t1 . MetaStorage::VERSION_FILE_EXT;
			$m2 = $versionsFolder2 . '/test.txt.v' . $t2 . MetaStorage::VERSION_FILE_EXT;

			file_put_contents("$this->dataDir/$m0", json_encode(['edited_by' => $this->user2]));
			file_put_contents("$this->dataDir/$m1", json_encode(['edited_by' => $this->user2]));
			file_put_contents("$this->dataDir/$m2", json_encode(['edited_by' => $this->user2]));
		}

		// move file into the shared folder as recipient
		Filesystem::rename('/test.txt', '/folder1/test.txt');

		$this->assertFalse($this->rootView->file_exists($v1));
		$this->assertFalse($this->rootView->file_exists($v2));

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$this->assertFileDoesNotExist("$this->dataDir/$m0");
			$this->assertFileDoesNotExist("$this->dataDir/$m1");
			$this->assertFileDoesNotExist("$this->dataDir/$m2");
		}

		self::loginHelper($this->user1);

		$versionsFolder1 = '/' . $this->user1 . '/files_versions';

		$v1Renamed = $versionsFolder1 . '/folder1/test.txt.v' . $t1;
		$v2Renamed = $versionsFolder1 . '/folder1/test.txt.v' . $t2;

		$this->assertTrue($this->rootView->file_exists($v1Renamed));
		$this->assertTrue($this->rootView->file_exists($v2Renamed));

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$m0Renamed = $versionsFolder1 . '/folder1/test.txt' . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT;
			$m1Renamed = $versionsFolder1 . '/folder1/test.txt.v' . $t1 . MetaStorage::VERSION_FILE_EXT;
			$m2Renamed = $versionsFolder1 . '/folder1/test.txt.v' . $t2 . MetaStorage::VERSION_FILE_EXT;

			$this->assertTrue($this->rootView->file_exists($m0Renamed));
			$this->assertTrue($this->rootView->file_exists($m1Renamed));
			$this->assertTrue($this->rootView->file_exists($m2Renamed));
		}

		OC::$server->getShareManager()->deleteShare($share);
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testPublishCurrentVersion(bool $metaDataEnabled): void {
		$this->overwriteConfig($metaDataEnabled);

		Filesystem::mkdir('folder1');
		Filesystem::mkdir('folder2');
		Filesystem::file_put_contents('folder1/test.txt', 'test file');

		// create some versions
		$this->rootView->mkdir($this->versionsRootOfUser1 . '/folder1');

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$m0 = $this->versionsRootOfUser1 . '/folder1/test.txt' . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT;
			file_put_contents("$this->dataDir/$m0", json_encode(['edited_by' => $this->user1, 'version_tag' => '1.1']));
		}

		$current0 = \OCA\Files_Versions\Storage::getCurrentVersion($this->user1, '/folder1/test.txt');

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$this->assertEquals('1.1', $current0['version_tag']);
		} else {
			$this->assertEmpty($current0);
		}

		\OCA\Files_Versions\Storage::publishCurrentVersion('/folder1/test.txt');

		$current1 = \OCA\Files_Versions\Storage::getCurrentVersion($this->user1, '/folder1/test.txt');

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$this->assertEquals('2.0', $current1['version_tag']);
		} else {
			$this->assertEmpty($current1);
		}
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 * @throws NoUserException
	 */
	public function testExpire(bool $metaDataEnabled): void {
		$this->overwriteConfig($metaDataEnabled);

		Filesystem::file_put_contents('test.txt', 'test file');

		// create some versions
		$this->rootView->mkdir($this->versionsRootOfUser1);

		// create some versions
		$t1 = time();
		$t2 = $t1 - 1; // could be retained due to 1s rule
		$t3 = $t1 - 2;
		$t4 = $t1 - 4;
		$t5 = $t1 - 5; // could be retained due to 1s rule

		$v1 = $this->versionsRootOfUser1 . '/test.txt.v' . $t1;
		$v2 = $this->versionsRootOfUser1 . '/test.txt.v' . $t2;
		$v3 = $this->versionsRootOfUser1 . '/test.txt.v' . $t3;
		$v4 = $this->versionsRootOfUser1 . '/test.txt.v' . $t4;
		$v5 = $this->versionsRootOfUser1 . '/test.txt.v' . $t5;
		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');
		$this->rootView->file_put_contents($v3, 'version3');
		$this->rootView->file_put_contents($v4, 'version4');
		$this->rootView->file_put_contents($v5, 'version5');

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			// one metadata file for each version
			$m0 = $this->versionsRootOfUser1 . '/test.txt' . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT;
			$m1 = $this->versionsRootOfUser1 . '/test.txt.v' . $t1 . MetaStorage::VERSION_FILE_EXT;
			$m2 = $this->versionsRootOfUser1 . '/test.txt.v' . $t2 . MetaStorage::VERSION_FILE_EXT;
			$m3 = $this->versionsRootOfUser1 . '/test.txt.v' . $t3 . MetaStorage::VERSION_FILE_EXT;
			$m4 = $this->versionsRootOfUser1 . '/test.txt.v' . $t4 . MetaStorage::VERSION_FILE_EXT;
			$m5 = $this->versionsRootOfUser1 . '/test.txt.v' . $t5 . MetaStorage::VERSION_FILE_EXT;
			file_put_contents("$this->dataDir/$m0", json_encode(['edited_by' => $this->user1, 'version_tag' => '1.2']));
			file_put_contents("$this->dataDir/$m1", json_encode(['edited_by' => $this->user1, 'version_tag' => '1.1']));
			file_put_contents("$this->dataDir/$m2", json_encode(['edited_by' => $this->user1, 'version_tag' => '1.0'])); // published
			file_put_contents("$this->dataDir/$m3", json_encode(['edited_by' => $this->user1, 'version_tag' => '0.3']));
			file_put_contents("$this->dataDir/$m4", json_encode(['edited_by' => $this->user1, 'version_tag' => '0.2']));
			file_put_contents("$this->dataDir/$m5", json_encode(['edited_by' => $this->user1, 'version_tag' => '0.1']));
		}

		$versions = \OCA\Files_Versions\Storage::getVersions($this->user1, '/test.txt');
		$this->assertCount(5, $versions);

		\OCA\Files_Versions\Storage::expire('/test.txt', $this->user1);

		$versions = \OCA\Files_Versions\Storage::getVersions($this->user1, '/test.txt');

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			// one expires due to retention and being minor,
			// and another one does not expire due to retention due to publishing
			$this->assertCount(4, $versions);
		} else {
			$this->assertCount(3, $versions);
		}

		$this->assertTrue($this->rootView->file_exists($v1));
		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			// due to being published
			$this->assertTrue($this->rootView->file_exists($v2));
		} else {
			$this->assertFalse($this->rootView->file_exists($v2));
		}
		$this->assertTrue($this->rootView->file_exists($v3));
		$this->assertTrue($this->rootView->file_exists($v4));
		$this->assertFalse($this->rootView->file_exists($v5));
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testIsPublishedVersion(bool $metaDataEnabled): void {
		$this->overwriteConfig($metaDataEnabled);

		Filesystem::mkdir('folder1');
		Filesystem::mkdir('folder2');
		Filesystem::file_put_contents('folder1/test.txt', 'test file');

		$t1 = time();
		// second version is 3 weeks old
		$t2 = $t1 - 60 * 60 * 24 * 21;

		// create some versions
		$this->rootView->mkdir($this->versionsRootOfUser1 . '/folder1');
		$v1 = $this->versionsRootOfUser1 . '/folder1/test.txt.v' . $t1;
		$v2 = $this->versionsRootOfUser1 . '/folder1/test.txt.v' . $t2;

		$m0 = $this->versionsRootOfUser1 . '/folder1/test.txt' . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT;
		$m1 = $v1 . MetaStorage::VERSION_FILE_EXT;
		$m2 = $v2 . MetaStorage::VERSION_FILE_EXT;

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			file_put_contents("$this->dataDir/$m0", json_encode(['edited_by' => $this->user1, 'version_tag' => '1.1']));
			file_put_contents("$this->dataDir/$m1", json_encode(['edited_by' => $this->user1, 'version_tag' => '1.0']));
			file_put_contents("$this->dataDir/$m2", json_encode(['edited_by' => $this->user1, 'version_tag' => '0.1']));
		}

		self::loginAsUser($this->user1);

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$this->assertTrue(VersionStorageToTest::callProtectedIsPublishedVersion($this->rootView, $this->versionsRootOfUser1 . '/folder1/test.txt.v' . $t1));
			$this->assertFalse(VersionStorageToTest::callProtectedIsPublishedVersion($this->rootView, $this->versionsRootOfUser1 . '/folder1/test.txt.v' . $t2));
		} else {
			$this->assertFalse(VersionStorageToTest::callProtectedIsPublishedVersion($this->rootView, $this->versionsRootOfUser1 . '/folder1/test.txt.v' . $t1));
			$this->assertFalse(VersionStorageToTest::callProtectedIsPublishedVersion($this->rootView, $this->versionsRootOfUser1 . '/folder1/test.txt.v' . $t2));
		}
	}

	/**
	 * @medium
	 * test expire logic
	 * @dataProvider versionsProvider
	 */
	public function testGetExpireList($versions, $sizeOfAllDeletedFiles): void {
		$this->overwriteConfig();

		// last interval end at 2592000
		$startTime = 5000000;

		[$deleted, $size] = VersionStorageToTest::callProtectedGetExpireList($startTime, $versions);

		// we should have deleted 16 files each of the size 1
		$this->assertEquals($sizeOfAllDeletedFiles, $size);

		// the deleted array should only contain versions which should be deleted
		foreach ($deleted as $key => $path) {
			unset($versions[$key]);
			$this->assertEquals("delete", substr($path, 0, \strlen("delete")));
		}

		// the versions array should only contain versions which should be kept
		foreach ($versions as $version) {
			$this->assertEquals("keep", $version['path']);
		}
	}

	public function versionsProvider(): array {
		return [
			// first set of versions uniformly distributed versions
			[
				[
					// first slice (10sec) keep one version every 2 seconds
					["version" => 4999999, "path" => "keep", "size" => 1],
					["version" => 4999998, "path" => "delete", "size" => 1],
					["version" => 4999997, "path" => "keep", "size" => 1],
					["version" => 4999995, "path" => "keep", "size" => 1],
					["version" => 4999994, "path" => "delete", "size" => 1],
					//next slice (60sec) starts at 4999990 keep one version every 10 seconds
					["version" => 4999988, "path" => "keep", "size" => 1],
					["version" => 4999978, "path" => "keep", "size" => 1],
					["version" => 4999975, "path" => "delete", "size" => 1],
					["version" => 4999972, "path" => "delete", "size" => 1],
					["version" => 4999967, "path" => "keep", "size" => 1],
					["version" => 4999958, "path" => "delete", "size" => 1],
					["version" => 4999957, "path" => "keep", "size" => 1],
					//next slice (3600sec) start at 4999940 keep one version every 60 seconds
					["version" => 4999900, "path" => "keep", "size" => 1],
					["version" => 4999841, "path" => "delete", "size" => 1],
					["version" => 4999840, "path" => "keep", "size" => 1],
					["version" => 4999780, "path" => "keep", "size" => 1],
					["version" => 4996401, "path" => "keep", "size" => 1],
					// next slice (86400sec) start at 4996400 keep one version every 3600 seconds
					["version" => 4996350, "path" => "delete", "size" => 1],
					["version" => 4992800, "path" => "keep", "size" => 1],
					["version" => 4989800, "path" => "delete", "size" => 1],
					["version" => 4989700, "path" => "delete", "size" => 1],
					["version" => 4989200, "path" => "keep", "size" => 1],
					// next slice (2592000sec) start at 4913600 keep one version every 86400 seconds
					["version" => 4913600, "path" => "keep", "size" => 1],
					["version" => 4852800, "path" => "delete", "size" => 1],
					["version" => 4827201, "path" => "delete", "size" => 1],
					["version" => 4827200, "path" => "keep", "size" => 1],
					["version" => 4777201, "path" => "delete", "size" => 1],
					["version" => 4777501, "path" => "delete", "size" => 1],
					["version" => 4740000, "path" => "keep", "size" => 1],
					// final slice starts at 2408000 keep one version every 604800 seconds
					["version" => 2408000, "path" => "keep", "size" => 1],
					["version" => 1803201, "path" => "delete", "size" => 1],
					["version" => 1803200, "path" => "keep", "size" => 1],
					["version" => 1800199, "path" => "delete", "size" => 1],
					["version" => 1800100, "path" => "delete", "size" => 1],
					["version" => 1198300, "path" => "keep", "size" => 1],
				],
				16 // size of all deleted files (every file has the size 1)
			],
			// second set of versions, here we have only really old versions
			[
				[
					// first slice (10sec) keep one version every 2 seconds
					// next slice (60sec) starts at 4999990 keep one version every 10 seconds
					// next slice (3600sec) start at 4999940 keep one version every 60 seconds
					// next slice (86400sec) start at 4996400 keep one version every 3600 seconds
					["version" => 4996400, "path" => "keep", "size" => 1],
					["version" => 4996350, "path" => "delete", "size" => 1],
					["version" => 4996350, "path" => "delete", "size" => 1],
					["version" => 4992800, "path" => "keep", "size" => 1],
					["version" => 4989800, "path" => "delete", "size" => 1],
					["version" => 4989700, "path" => "delete", "size" => 1],
					["version" => 4989200, "path" => "keep", "size" => 1],
					// next slice (2592000sec) start at 4913600 keep one version every 86400 seconds
					["version" => 4913600, "path" => "keep", "size" => 1],
					["version" => 4852800, "path" => "delete", "size" => 1],
					["version" => 4827201, "path" => "delete", "size" => 1],
					["version" => 4827200, "path" => "keep", "size" => 1],
					["version" => 4777201, "path" => "delete", "size" => 1],
					["version" => 4777501, "path" => "delete", "size" => 1],
					["version" => 4740000, "path" => "keep", "size" => 1],
					// final slice starts at 2408000 keep one version every 604800 seconds
					["version" => 2408000, "path" => "keep", "size" => 1],
					["version" => 1803201, "path" => "delete", "size" => 1],
					["version" => 1803200, "path" => "keep", "size" => 1],
					["version" => 1800199, "path" => "delete", "size" => 1],
					["version" => 1800100, "path" => "delete", "size" => 1],
					["version" => 1198300, "path" => "keep", "size" => 1],
				],
				11 // size of all deleted files (every file has the size 1)
			],
			// third set of versions, with some gaps between
			[
				[
					// first slice (10sec) keep one version every 2 seconds
					["version" => 4999999, "path" => "keep", "size" => 1],
					["version" => 4999998, "path" => "delete", "size" => 1],
					["version" => 4999997, "path" => "keep", "size" => 1],
					["version" => 4999995, "path" => "keep", "size" => 1],
					["version" => 4999994, "path" => "delete", "size" => 1],
					//next slice (60sec) starts at 4999990 keep one version every 10 seconds
					["version" => 4999988, "path" => "keep", "size" => 1],
					["version" => 4999978, "path" => "keep", "size" => 1],
					//next slice (3600sec) start at 4999940 keep one version every 60 seconds
					// next slice (86400sec) start at 4996400 keep one version every 3600 seconds
					["version" => 4989200, "path" => "keep", "size" => 1],
					// next slice (2592000sec) start at 4913600 keep one version every 86400 seconds
					["version" => 4913600, "path" => "keep", "size" => 1],
					["version" => 4852800, "path" => "delete", "size" => 1],
					["version" => 4827201, "path" => "delete", "size" => 1],
					["version" => 4827200, "path" => "keep", "size" => 1],
					["version" => 4777201, "path" => "delete", "size" => 1],
					["version" => 4777501, "path" => "delete", "size" => 1],
					["version" => 4740000, "path" => "keep", "size" => 1],
					// final slice starts at 2408000 keep one version every 604800 seconds
					["version" => 2408000, "path" => "keep", "size" => 1],
					["version" => 1803201, "path" => "delete", "size" => 1],
					["version" => 1803200, "path" => "keep", "size" => 1],
					["version" => 1800199, "path" => "delete", "size" => 1],
					["version" => 1800100, "path" => "delete", "size" => 1],
					["version" => 1198300, "path" => "keep", "size" => 1],
				],
				9 // size of all deleted files (every file has the size 1)
			],

		];
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testRename(bool $metaDataEnabled): void {
		Filesystem::file_put_contents("test.txt", "test file");
		$this->overwriteConfig($metaDataEnabled);

		$t1 = time();
		// second version is two weeks older, this way we make sure that no
		// version will be expired
		$t2 = $t1 - 60 * 60 * 24 * 14;

		// create some versions
		$v1 = $this->versionsRootOfUser1 . '/test.txt.v' . $t1;
		$v2 = $this->versionsRootOfUser1 . '/test.txt.v' . $t2;
		$m0 = $this->versionsRootOfUser1 . '/test.txt' . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT;
		$m1 = $this->versionsRootOfUser1 . '/test.txt.v' . $t1 . MetaStorage::VERSION_FILE_EXT;
		$m2 = $this->versionsRootOfUser1 . '/test.txt.v' . $t1 . MetaStorage::VERSION_FILE_EXT;

		$v1Renamed = $this->versionsRootOfUser1 . '/test2.txt.v' . $t1;
		$v2Renamed = $this->versionsRootOfUser1 . '/test2.txt.v' . $t2;
		$m0Renamed = $this->versionsRootOfUser1 . '/test2.txt' . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT;
		$m1Renamed = $this->versionsRootOfUser1 . '/test2.txt.v' . $t1 . MetaStorage::VERSION_FILE_EXT;
		$m2Renamed = $this->versionsRootOfUser1 . '/test2.txt.v' . $t1 . MetaStorage::VERSION_FILE_EXT;

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			file_put_contents("$this->dataDir/$m0", json_encode(['edited_by' => $this->user2]));
			file_put_contents("$this->dataDir/$m1", json_encode(['edited_by' => $this->user2]));
			file_put_contents("$this->dataDir/$m2", json_encode(['edited_by' => $this->user2]));
		}

		// execute rename hook of versions app
		Filesystem::rename("test.txt", "test2.txt");

		$this->runCommands();

		$this->assertFalse($this->rootView->file_exists($v1));
		$this->assertFalse($this->rootView->file_exists($v2));

		$this->assertTrue($this->rootView->file_exists($v1Renamed));
		$this->assertTrue($this->rootView->file_exists($v2Renamed));

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$this->assertFileDoesNotExist("$this->dataDir/$m0");
			$this->assertFileDoesNotExist("$this->dataDir/$m1");
			$this->assertFileDoesNotExist("$this->dataDir/$m2");

			$this->assertTrue($this->rootView->file_exists($m0Renamed));
			$this->assertTrue($this->rootView->file_exists($m1Renamed));
			$this->assertTrue($this->rootView->file_exists($m2Renamed));
		}
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testRenameInSharedFolder(bool $metaDataEnabled): void {
		$this->overwriteConfig($metaDataEnabled);

		Filesystem::mkdir('folder1');
		Filesystem::mkdir('folder1/folder2');
		Filesystem::file_put_contents("folder1/test.txt", "test file");

		$t1 = time();
		// second version is two weeks older, this way we make sure that no
		// version will be expired
		$t2 = $t1 - 60 * 60 * 24 * 14;

		$this->rootView->mkdir($this->versionsRootOfUser1 . '/folder1');
		// create some versions
		$v1 = $this->versionsRootOfUser1 . '/folder1/test.txt.v' . $t1;
		$v2 = $this->versionsRootOfUser1 . '/folder1/test.txt.v' . $t2;
		$m0 = $this->versionsRootOfUser1 . '/folder1/test.txt' . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT;
		$m1 = $v1 . MetaStorage::VERSION_FILE_EXT;
		$m2 = $v2 . MetaStorage::VERSION_FILE_EXT;

		$v1Renamed = $this->versionsRootOfUser1 . '/folder1/folder2/test.txt.v' . $t1;
		$v2Renamed = $this->versionsRootOfUser1 . '/folder1/folder2/test.txt.v' . $t2;
		$m0Renamed = $this->versionsRootOfUser1 . '/folder1/folder2/test.txt' . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT;
		$m1Renamed = $v1Renamed . MetaStorage::VERSION_FILE_EXT;
		$m2Renamed = $v2Renamed . MetaStorage::VERSION_FILE_EXT;

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			file_put_contents("$this->dataDir/$m0", json_encode(['edited_by' => $this->user1]));
			file_put_contents("$this->dataDir/$m1", json_encode(['edited_by' => $this->user1]));
			file_put_contents("$this->dataDir/$m2", json_encode(['edited_by' => $this->user1]));
		}

		$node = OC::$server->getUserFolder($this->user1)->get('folder1');
		$share = OC::$server->getShareManager()->newShare();
		$share->setNode($node)
			->setShareType(OC\Share\Constants::SHARE_TYPE_USER)
			->setSharedBy($this->user1)
			->setSharedWith($this->user2)
			->setPermissions(Constants::PERMISSION_ALL);
		$share = OC::$server->getShareManager()->createShare($share);

		self::loginHelper($this->user2);

		$this->assertTrue(Filesystem::file_exists('folder1/test.txt'));

		// execute rename hook of versions app
		Filesystem::rename('/folder1/test.txt', '/folder1/folder2/test.txt');

		$this->runCommands();

		self::loginHelper($this->user1);

		$this->assertFalse($this->rootView->file_exists($v1));
		$this->assertFalse($this->rootView->file_exists($v2));

		$this->assertTrue($this->rootView->file_exists($v1Renamed));
		$this->assertTrue($this->rootView->file_exists($v2Renamed));

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$this->assertFileDoesNotExist("$this->dataDir/$m0");
			$this->assertFileDoesNotExist("$this->dataDir/$m1");
			$this->assertFileDoesNotExist("$this->dataDir/$m2");

			$this->assertTrue($this->rootView->file_exists($m0Renamed));
			$this->assertTrue($this->rootView->file_exists($m1Renamed));
			$this->assertTrue($this->rootView->file_exists($m2Renamed));
		}

		OC::$server->getShareManager()->deleteShare($share);
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testMoveFolder(bool $metaDataEnabled): void {
		$this->overwriteConfig($metaDataEnabled);

		Filesystem::mkdir('folder1');
		Filesystem::mkdir('folder2');
		Filesystem::file_put_contents('folder1/test.txt', 'test file');

		$t1 = time();
		// second version is two weeks older, this way we make sure that no
		// version will be expired
		$t2 = $t1 - 60 * 60 * 24 * 14;

		// create some versions
		$this->rootView->mkdir($this->versionsRootOfUser1 . '/folder1');
		$v1 = $this->versionsRootOfUser1 . '/folder1/test.txt.v' . $t1;
		$v2 = $this->versionsRootOfUser1 . '/folder1/test.txt.v' . $t2;
		$v1Renamed = $this->versionsRootOfUser1 . '/folder2/folder1/test.txt.v' . $t1;
		$v2Renamed = $this->versionsRootOfUser1 . '/folder2/folder1/test.txt.v' . $t2;

		$m0 = $this->versionsRootOfUser1 . '/folder1/test.txt' . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT;
		$m1 = $v1 . MetaStorage::VERSION_FILE_EXT;
		$m2 = $v2 . MetaStorage::VERSION_FILE_EXT;
		$m0Renamed = $this->versionsRootOfUser1 . '/folder2/folder1/test.txt' . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT;
		$m1Renamed = $v1Renamed . MetaStorage::VERSION_FILE_EXT;
		$m2Renamed = $v2Renamed . MetaStorage::VERSION_FILE_EXT;

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			file_put_contents("$this->dataDir/$m0", json_encode(['edited_by' => $this->user1]));
			file_put_contents("$this->dataDir/$m1", json_encode(['edited_by' => $this->user1]));
			file_put_contents("$this->dataDir/$m2", json_encode(['edited_by' => $this->user1]));
		}

		// execute rename hook of versions app
		Filesystem::rename('folder1', 'folder2/folder1');

		$this->runCommands();

		$this->assertFalse($this->rootView->file_exists($v1));
		$this->assertFalse($this->rootView->file_exists($v2));

		$this->assertTrue($this->rootView->file_exists($v1Renamed));
		$this->assertTrue($this->rootView->file_exists($v2Renamed));

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$this->assertFileDoesNotExist("$this->dataDir/$m0");
			$this->assertFileDoesNotExist("$this->dataDir/$m1");
			$this->assertFileDoesNotExist("$this->dataDir/$m2");

			$this->assertTrue($this->rootView->file_exists($m0Renamed));
			$this->assertTrue($this->rootView->file_exists($m1Renamed));
			$this->assertTrue($this->rootView->file_exists($m2Renamed));
		}
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testMoveFolderIntoSharedFolderAsRecipient(bool $metaDataEnabled): void {
		$this->overwriteConfig($metaDataEnabled);

		Filesystem::mkdir('folder1');

		$node = OC::$server->getUserFolder($this->user1)->get('folder1');
		$share = OC::$server->getShareManager()->newShare();
		$share->setNode($node)
			->setShareType(OC\Share\Constants::SHARE_TYPE_USER)
			->setSharedBy($this->user1)
			->setSharedWith($this->user2)
			->setPermissions(Constants::PERMISSION_ALL);
		$share = OC::$server->getShareManager()->createShare($share);

		self::loginHelper($this->user2);
		$versionsFolder2 = '/' . $this->user2. '/files_versions';
		Filesystem::mkdir('folder2');
		Filesystem::file_put_contents('folder2/test.txt', 'test file');

		$t1 = time();
		// second version is two weeks older, this way we make sure that no
		// version will be expired
		$t2 = $t1 - 60 * 60 * 24 * 14;

		$this->rootView->mkdir($versionsFolder2);
		$this->rootView->mkdir($versionsFolder2 . '/folder2');
		// create some versions

		$v1 = $versionsFolder2 . '/folder2/test.txt.v' . $t1;
		$v2 = $versionsFolder2 . '/folder2/test.txt.v' . $t2;

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$m0 = $versionsFolder2 . '/folder2/test.txt' . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT;
			$m1 = $v1 . MetaStorage::VERSION_FILE_EXT;
			$m2 = $v2 . MetaStorage::VERSION_FILE_EXT;
			file_put_contents("$this->dataDir/$m0", json_encode(['edited_by' => $this->user2]));
			file_put_contents("$this->dataDir/$m1", json_encode(['edited_by' => $this->user2]));
			file_put_contents("$this->dataDir/$m2", json_encode(['edited_by' => $this->user2]));
		}

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		// move file into the shared folder as recipient
		Filesystem::rename('/folder2', '/folder1/folder2');

		$this->assertFalse($this->rootView->file_exists($v1));
		$this->assertFalse($this->rootView->file_exists($v2));

		self::loginHelper($this->user1);

		$versionsFolder1 = '/' . $this->user1. '/files_versions';

		$v1Renamed = $versionsFolder1 . '/folder1/folder2/test.txt.v' . $t1;
		$v2Renamed = $versionsFolder1 . '/folder1/folder2/test.txt.v' . $t2;
		$m0Renamed = $versionsFolder1 . '/folder1/folder2/test.txt' . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT;
		$m1Renamed = $v1Renamed . MetaStorage::VERSION_FILE_EXT;
		$m2Renamed = $v2Renamed . MetaStorage::VERSION_FILE_EXT;

		$this->assertTrue($this->rootView->file_exists($v1Renamed));
		$this->assertTrue($this->rootView->file_exists($v2Renamed));

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$this->assertTrue($this->rootView->file_exists($m0Renamed));
			$this->assertTrue($this->rootView->file_exists($m1Renamed));
			$this->assertTrue($this->rootView->file_exists($m2Renamed));
		}

		OC::$server->getShareManager()->deleteShare($share);
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testRenameSharedFile(bool $metaDataEnabled): void {
		$this->overwriteConfig($metaDataEnabled);

		Filesystem::file_put_contents("test.txt", "test file");

		$t1 = time();
		// second version is two weeks older, this way we make sure that no
		// version will be expired
		$t2 = $t1 - 60 * 60 * 24 * 14;

		$this->rootView->mkdir($this->versionsRootOfUser1);
		// create some versions
		$v1 = $this->versionsRootOfUser1 . '/test.txt.v' . $t1;
		$v2 = $this->versionsRootOfUser1 . '/test.txt.v' . $t2;
		
		$m0 = $this->versionsRootOfUser1 . '/test.txt' . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT;
		$m1 = $v1 . MetaStorage::VERSION_FILE_EXT;
		$m2 = $v2 . MetaStorage::VERSION_FILE_EXT;
		// the renamed versions should not exist! Because we only moved the mount point!
		$v1Renamed = $this->versionsRootOfUser1 . '/test2.txt.v' . $t1;
		$v2Renamed = $this->versionsRootOfUser1 . '/test2.txt.v' . $t2;
		$m0Renamed  = $this->versionsRootOfUser1 . '/test2.txt' . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT;
		$m1Renamed = $v1Renamed . MetaStorage::VERSION_FILE_EXT;
		$m2Renamed = $v2Renamed . MetaStorage::VERSION_FILE_EXT;

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			file_put_contents("$this->dataDir/$m0", json_encode(['edited_by' => $this->user1]));
			file_put_contents("$this->dataDir/$m1", json_encode(['edited_by' => $this->user1]));
			file_put_contents("$this->dataDir/$m2", json_encode(['edited_by' => $this->user1]));
		}

		$node = OC::$server->getUserFolder($this->user1)->get('test.txt');
		$share = OC::$server->getShareManager()->newShare();
		$share->setNode($node)
			->setShareType(OC\Share\Constants::SHARE_TYPE_USER)
			->setSharedBy($this->user1)
			->setSharedWith($this->user2)
			->setPermissions(Constants::PERMISSION_READ | Constants::PERMISSION_UPDATE | Constants::PERMISSION_SHARE);
		$share = OC::$server->getShareManager()->createShare($share);

		self::loginHelper($this->user2);

		$this->assertTrue(Filesystem::file_exists('test.txt'));

		// execute rename hook of versions app
		Filesystem::rename('test.txt', 'test2.txt');

		self::loginHelper($this->user1);

		$this->runCommands();

		$this->assertTrue($this->rootView->file_exists($v1));
		$this->assertTrue($this->rootView->file_exists($v2));

		$this->assertFalse($this->rootView->file_exists($v1Renamed));
		$this->assertFalse($this->rootView->file_exists($v2Renamed));

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$this->assertFileExists("$this->dataDir/$m0");
			$this->assertFileExists("$this->dataDir/$m1");
			$this->assertFileExists("$this->dataDir/$m2");

			$this->assertFalse($this->rootView->file_exists($m0Renamed));
			$this->assertFalse($this->rootView->file_exists($m1Renamed));
			$this->assertFalse($this->rootView->file_exists($m2Renamed));
		}

		OC::$server->getShareManager()->deleteShare($share);
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testCopy(bool $metaDataEnabled): void {
		$this->overwriteConfig($metaDataEnabled);
		Filesystem::file_put_contents("test.txt", "test file");

		$t1 = time();
		// second version is two weeks older, this way we make sure that no
		// version will be expired
		$t2 = $t1 - 60 * 60 * 24 * 14;

		// create some versions
		$v1 = $this->versionsRootOfUser1 . '/test.txt.v' . $t1;
		$v2 = $this->versionsRootOfUser1 . '/test.txt.v' . $t2;
		$v1Copied = $this->versionsRootOfUser1 . '/test2.txt.v' . $t1;
		$v2Copied = $this->versionsRootOfUser1 . '/test2.txt.v' . $t2;

		$m0 = $this->versionsRootOfUser1 . '/test.txt' . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT;
		$m1 = $v1 . MetaStorage::VERSION_FILE_EXT;
		$m2 = $v2 . MetaStorage::VERSION_FILE_EXT;
		$m0Copied = $this->versionsRootOfUser1 . '/test2.txt' . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT;
		$m1Copied = $v1Copied . MetaStorage::VERSION_FILE_EXT;
		$m2Copied = $v2Copied . MetaStorage::VERSION_FILE_EXT;

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			file_put_contents("$this->dataDir/$m0", json_encode(['edited_by' => $this->user1]));
			file_put_contents("$this->dataDir/$m1", json_encode(['edited_by' => $this->user1]));
			file_put_contents("$this->dataDir/$m2", json_encode(['edited_by' => $this->user1]));
		}

		// execute copy hook of versions app
		Filesystem::copy("test.txt", "test2.txt");

		$this->runCommands();

		$this->assertTrue($this->rootView->file_exists($v1));
		$this->assertTrue($this->rootView->file_exists($v2));

		$this->assertTrue($this->rootView->file_exists($v1Copied));
		$this->assertTrue($this->rootView->file_exists($v2Copied));

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$this->assertFileExists("$this->dataDir/$m0");
			$this->assertFileExists("$this->dataDir/$m1");
			$this->assertFileExists("$this->dataDir/$m2");

			$this->assertTrue($this->rootView->file_exists($m0Copied));
			$this->assertTrue($this->rootView->file_exists($m1Copied));
			$this->assertTrue($this->rootView->file_exists($m2Copied));
		}
	}

	public function getVersionsProvider(): array {
		return [
			['/test.txt', false],
			['/subfolder/test.txt', false],
			['/subfolder/0', false],
			['/0', false],

			['/test.txt', true],
			['/subfolder/test.txt',true],
			['/subfolder/0', true],
			['/0', true],
		];
	}

	/**
	 * test if we find all versions and if the versions array contain
	 * the correct 'path' and 'name'
	 *
	 * @dataProvider getVersionsProvider
	 * @param string $filepath
	 */
	public function testGetVersions(string $filepath, bool $enableMetadata): void {
		$this->overwriteConfig($enableMetadata);

		$t1 = time();
		// second version is two weeks older, this way we make sure that no
		// version will be expired
		$t2 = $t1 - 60 * 60 * 24 * 14;

		$fileName = basename($filepath);
		$parent = \dirname($filepath);

		// create some versions
		$v1 = $this->versionsRootOfUser1 . $filepath . '.v' . $t1;
		$v2 = $this->versionsRootOfUser1 . $filepath . '.v' . $t2;
		
		$m1 = $v1 . MetaStorage::VERSION_FILE_EXT;
		$m2 = $v2 . MetaStorage::VERSION_FILE_EXT;

		$this->rootView->mkdir($this->versionsRootOfUser1 . $parent);

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		if ($enableMetadata && !$this->objectStoreEnabled) {
			file_put_contents("$this->dataDir/$m1", json_encode(['edited_by' => $this->user1]));
			file_put_contents("$this->dataDir/$m2", json_encode(['edited_by' => $this->user1]));
		}

		// execute copy hook of versions app
		$versions = \OCA\Files_Versions\Storage::getVersions($this->user1, $filepath);

		$this->assertCount(2, $versions);

		foreach ($versions as $version) {
			$this->assertSame($filepath, $version['path']);
			$this->assertSame($fileName, $version['name']);
		}

		if ($enableMetadata && !$this->objectStoreEnabled) {
			$this->assertArrayHasKey('edited_by', array_shift($versions));
			$this->assertArrayHasKey('edited_by', array_shift($versions));
		}

		//cleanup
		$this->rootView->deleteAll($this->versionsRootOfUser1 . $parent);
	}

	/**
	 * test if we find all versions and if the versions array contain
	 * the correct 'path' and 'name'
	 *
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testGetVersionsEmptyFile(bool $metaDataEnabled): void {
		$this->overwriteConfig($metaDataEnabled);

		// execute copy hook of versions app
		$versions = \OCA\Files_Versions\Storage::getVersions($this->user1, '');
		$this->assertCount(0, $versions);

		$versions = \OCA\Files_Versions\Storage::getVersions($this->user1, null);
		$this->assertCount(0, $versions);
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testExpireNonexistingFile(bool $metaDataEnabled) {
		$this->overwriteConfig($metaDataEnabled);

		self::logout();
		// needed to have a FS setup (the background job does this)
		OC_Util::setupFS($this->user1);

		$this->assertFalse(\OCA\Files_Versions\Storage::expire('/void/unexist.txt', $this->user1));
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testExpireNonexistingUser(bool $metaDataEnabled): void {
		$this->expectException(NoUserException::class);
		$this->overwriteConfig($metaDataEnabled);

		self::logout();
		// needed to have a FS setup (the background job does this)
		OC_Util::setupFS($this->user1);
		Filesystem::file_put_contents("test.txt", "test file");

		$this->assertFalse(\OCA\Files_Versions\Storage::expire('test.txt', 'unexist'));
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testRestoreSameStorage(bool $metaDataEnabled): void {
		$this->overwriteConfig($metaDataEnabled);

		Filesystem::mkdir('sub');
		$this->doTestRestore($metaDataEnabled);
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testRestoreCrossStorage(bool $metaDataEnabled): void {
		$this->overwriteConfig($metaDataEnabled);

		$storage2 = new Temporary([]);
		Filesystem::mount($storage2, [], $this->user1 . '/files/sub');

		$this->doTestRestore($metaDataEnabled);
	}

	/**
	 * @param string $hookName name of hook called
	 * @param array $params variable to receive parameters provided by hook
	 */
	private function connectMockHooks($hookName, &$params): void {
		if ($hookName === null) {
			return;
		}

		$eventHandler = $this->getMockBuilder('\stdclass')
			->setMethods(['callback'])
			->getMock();

		$eventHandler
			->method('callback')
			->willReturnCallback(function ($p) use (&$params) {
				$params = $p;
			});

		Util::connectHook(
			'\OCP\Versions',
			$hookName,
			$eventHandler,
			'callback'
		);
	}

	private function doTestRestore(bool $metaDataEnabled): void {
		$filePath = $this->user1 . '/files/sub/test.txt';
		$this->rootView->file_put_contents($filePath, 'test file');
		
		$t0 = $this->rootView->filemtime($filePath);

		// not exactly the same timestamp as the file
		$t1 = time() - 60;
		// second version is two weeks older
		$t2 = $t1 - 60 * 60 * 24 * 14;

		// create some versions
		$v1 = $this->versionsRootOfUser1 . '/sub/test.txt.v' . $t1;
		$v2 = $this->versionsRootOfUser1 . '/sub/test.txt.v' . $t2;

		$m0 = $this->versionsRootOfUser1 . '/sub/test.txt' . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT;
		$m1 = $v1 . MetaStorage::VERSION_FILE_EXT;
		$m2 = $v2 . MetaStorage::VERSION_FILE_EXT;

		$this->rootView->mkdir($this->versionsRootOfUser1 . '/sub');
		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			file_put_contents("$this->dataDir/$m0", json_encode([
				'edited_by' => $this->user1,
				'version_tag' => '0.3'
			]));
			file_put_contents("$this->dataDir/$m1", json_encode([
				'edited_by' => $this->user1,
				'version_tag' => '0.2'
			]));
			file_put_contents("$this->dataDir/$m2", json_encode([
				'edited_by' => $this->user2,
				'version_tag' => '0.1'
			]));
		}

		$oldVersions = \OCA\Files_Versions\Storage::getVersions(
			$this->user1,
			'/sub/test.txt'
		);

		$this->assertCount(2, $oldVersions);

		$this->assertEquals('test file', $this->rootView->file_get_contents($filePath));
		$info1 = $this->rootView->getFileInfo($filePath);

		$params = [];
		$this->connectMockHooks('rollback', $params);

		$v = $oldVersions["$t2#test.txt"];

		// make sure mtime could increase before attempt to restore from past version to new file as we test for it
		sleep(1);

		$this->assertTrue(\OCA\Files_Versions\Storage::restoreVersion($this->user1, $v['path'], $v['storage_location'], $t2));
		$expectedParams = [
			'path' => '/sub/test.txt',
			'user' => $this->user1,
			'revision' => $t2
		];

		$this->assertEquals($expectedParams, $params);

		$this->assertEquals('version2', $this->rootView->file_get_contents($filePath));
		$info2 = $this->rootView->getFileInfo($filePath);

		$this->assertNotEquals(
			$info1['etag'],
			$info2['etag'],
			'Etag must change after rolling back version'
		);
		$this->assertEquals(
			$info2['fileid'],
			$info1['fileid'],
			'File id must not change after rolling back version'
		);
		$this->assertNotEquals(
			$info2['mtime'],
			$t2,
			'New version restored from past version must receive new mtime'
		);

		$newVersions = \OCA\Files_Versions\Storage::getVersions(
			$this->user1,
			'/sub/test.txt'
		);

		$this->assertTrue(
			$this->rootView->file_exists($this->versionsRootOfUser1 . '/sub/test.txt.v' . $t0),
			'A version file must be created for the current file before restoration'
		);

		$this->assertTrue(
			$this->rootView->file_exists($v1),
			'Untouched version file must be present in files_version folder'
		);
		$this->assertTrue(
			$this->rootView->file_exists($v2),
			'Version file from which restore has been done must be present in files_version folder'
		);

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$this->assertFileExists(
				"$this->dataDir/$this->versionsRootOfUser1/sub/test.txt" . MetaStorage::CURRENT_FILE_PREFIX . MetaStorage::VERSION_FILE_EXT,
				'A current version metadata-file must be present for the file'
			);
			$this->assertFileExists(
				"$this->dataDir/$this->versionsRootOfUser1/sub/test.txt.v$t0" . MetaStorage::VERSION_FILE_EXT,
				'A noncurrent version metadata-file must be created for the file before restoration'
			);

			$this->assertFileExists(
				"$this->dataDir/$m1",
				'Untouched metadata-file is still there'
			);

			$this->assertTrue(
				file_exists("$this->dataDir/$m2"),
				'Version metadata file from which restore has been done must be present in files_version folder'
			);
		}

		$this->assertCount(3, $newVersions, 'Additional new version created for restoration from point in time');

		$this->assertArrayHasKey(
			$t0 . '#' . 'test.txt',
			$newVersions,
			'A version was created for the file before restoration'
		);
		$this->assertArrayHasKey(
			$t1 . '#' . 'test.txt',
			$newVersions,
			'Untouched version metadata file must be present in files_version folder'
		);
		$this->assertArrayHasKey(
			$t2 . '#' . 'test.txt',
			$newVersions,
			'Version metadata file from which restore has been done must be present in files_version folder'
		);

		$currentVersion = \OCA\Files_Versions\Storage::getCurrentVersion(
			$this->user1,
			'/sub/test.txt'
		);

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			// make sure versions tags are incremented correctly
			// make sure restored version tags is preserved
			$this->assertEquals($this->user1, $currentVersion['edited_by']);
			$this->assertEquals('0.4', $currentVersion['version_tag']);

			$this->assertEquals($this->user1, $newVersions[$t0 . '#' . 'test.txt']['edited_by']);
			$this->assertEquals('0.3', $newVersions[$t0 . '#' . 'test.txt']['version_tag']);

			$this->assertEquals($this->user1, $newVersions[$t1 . '#' . 'test.txt']['edited_by']);
			$this->assertEquals('0.2', $newVersions[$t1 . '#' . 'test.txt']['version_tag']);

			$this->assertEquals($this->user2, $newVersions[$t2 . '#' . 'test.txt']['edited_by']);
			$this->assertEquals('0.1', $newVersions[$t2 . '#' . 'test.txt']['version_tag']);
		}
	}

	/**
	 * Test whether versions are created when overwriting as owner
	 *
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testStoreVersionAsOwner(bool $metaDataEnabled) {
		$this->overwriteConfig($metaDataEnabled);
		self::loginAsUser($this->user1);

		$this->createAndCheckVersions(
			Filesystem::getView(),
			'test.txt'
		);
	}

	/**
	 * Test whether versions are created when overwriting as share recipient
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testStoreVersionAsRecipient(bool $metaDataEnabled) {
		$this->overwriteConfig($metaDataEnabled);

		self::loginAsUser($this->user1);

		Filesystem::mkdir('folder');
		Filesystem::file_put_contents('folder/test.txt', 'test file');

		$node = OC::$server->getUserFolder($this->user1)->get('folder');
		$share = OC::$server->getShareManager()->newShare();
		$share->setNode($node)
			->setShareType(OC\Share\Constants::SHARE_TYPE_USER)
			->setSharedBy($this->user1)
			->setSharedWith($this->user2)
			->setPermissions(Constants::PERMISSION_ALL);
		$share = OC::$server->getShareManager()->createShare($share);

		self::loginAsUser($this->user2);

		$this->createAndCheckVersions(
			Filesystem::getView(),
			'folder/test.txt'
		);

		OC::$server->getShareManager()->deleteShare($share);
	}

	/**
	 * Test whether versions are created when overwriting anonymously.
	 *
	 * When uploading through a public link or publicwebdav, no user
	 * is logged in. File modification must still be able to find
	 * the owner and create versions.
	 *
	 *  @dataProvider metaDataEnabledProvider
	 */
	public function testStoreVersionAsAnonymous(bool $metaDataEnabled): void {
		$this->overwriteConfig($metaDataEnabled);

		self::logout();

		// note: public link upload does this,
		// needed to make the hooks fire
		OC_Util::setupFS($this->user1);

		$userView = new View('/' . $this->user1 . '/files');
		$this->createAndCheckVersions(
			$userView,
			'test.txt'
		);
	}

	/**
	 * @param View $view
	 * @param string $path
	 * @throws \Exception
	 */
	private function createAndCheckVersions(View $view, $path): void {
		$this->markTestSkippedIfStorageHasOwnVersioning();

		$view->file_put_contents($path, 'test file');
		$view->file_put_contents($path, 'version 1');
		$view->file_put_contents($path, 'version 2');

		self::loginAsUser($this->user1);

		// need to scan for the versions
		[$rootStorage,] = $this->rootView->resolvePath($this->user1 . '/files_versions');
		$rootStorage->getScanner()->scan('files_versions');

		$versions = \OCA\Files_Versions\Storage::getVersions(
			$this->user1,
			'/' . $path
		);

		// note: we cannot predict how many versions are created due to
		// test run timing
		$this->assertGreaterThan(0, \count($versions));
	}

	/**
	 * @param string $user
	 * @param bool $create
	 */
	public static function loginHelper(string $user, bool $create = false): void {
		if ($create) {
			OC::$server->getUserManager()->createUser($user, $user);
		}

		OC_Util::tearDownFS();
		OC_User::setUserId('');
		Filesystem::tearDown();
		OC_User::setUserId($user);
		OC_Util::setupFS($user);
		OC::$server->getUserFolder($user);
	}

	private function markTestSkippedIfStorageHasOwnVersioning(): void {
		/** @var Storage $storage */
		[$storage, $internalPath] = $this->rootView->resolvePath(self::USERS_VERSIONS_ROOT);
		if ($storage->instanceOfStorage(ObjectStoreStorage::class)) {
			$this->markTestSkipped();
		}
	}
}

// extend the original class to make it possible to test protected methods
class VersionStorageToTest extends \OCA\Files_Versions\Storage {
	/*
	 * FIXME: this is workaround as it is impossible without refactor to mock config for Storage::getExpiration
	 * and test expiry methods as these are static
	 */
	public static function callProtectedGetExpireList($time, $versions): array {
		return self::getExpireList($time, $versions);
	}
	
	/*
	 * FIXME: this is workaround as it is impossible without refactor to mock config for Storage::getExpiration
	 * and test expiry methods as these are static
	 */
	public static function callProtectedIsPublishedVersion($view, $path): bool {
		return self::isPublishedVersion($view, $path);
	}
}
