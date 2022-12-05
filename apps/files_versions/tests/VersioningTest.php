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

use OC\Files\ObjectStore\ObjectStoreStorage;
use OC\Files\Storage\Temporary;
use OCA\DAV\Meta\MetaPlugin;
use OCA\Files_Versions\FileHelper;
use OCA\Files_Versions\MetaStorage;
use OCP\Files\Storage;
use OCP\IConfig;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;

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
	 * @var \OC\Files\View
	 */
	private $rootView;

	public static function setUpBeforeClass(): void {
		parent::setUpBeforeClass();

		$application = new \OCA\Files_Sharing\AppInfo\Application();
		$application->registerMountProviders();
	}

	protected function setUp(): void {
		parent::setUp();

		\OC::$server->getEncryptionManager()->setupStorage();
		$this->dataDir = \OC::$server->getConfig()->getSystemValue('datadirectory');

		// Generate random usernames for better isolation
		$testId = \uniqid();
		$this->user1 = "test-versions-user1-$testId";
		$this->user2 = "test-versions-user2-$testId";
		$this->versionsRootOfUser1 = "/$this->user1/files_versions";

		// Create users
		self::loginHelper($this->user1, true);
		self::loginHelper($this->user2, true);

		// Default to user1
		self::loginHelper($this->user1);

		$this->rootView = new \OC\Files\View();
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

		$user = \OC::$server->getUserManager()->get($this->user1);
		if ($user !== null) {
			$this->logout();
			$user->delete();
		}
		$user = \OC::$server->getUserManager()->get($this->user2);
		if ($user !== null) {
			$this->logout();
			$user->delete();
		}

		\OC_Hook::clear();

		parent::tearDown();
	}

	/**
	 * Enables versioning metadata for unit-testing. Each test in this suite
	 * is executed once with and without versioning metadata enabled.
	 */
	private function overwriteConfig($saveVersionAuthor) {
		$config = \OC::$server->getConfig();
		$this->mockConfig = $this->createMock('\OCP\IConfig');
		$this->mockConfig->expects($this->any())
			->method('getSystemValue')
			->will($this->returnCallback(function ($key, $default) use ($config, $saveVersionAuthor) {
				if ($key === 'filesystem_check_changes') {
					return \OC\Files\Cache\Watcher::CHECK_ONCE;
				} elseif ($key === 'file_storage.save_version_author') {
					return $saveVersionAuthor;
				} else {
					return $config->getSystemValue($key, $default);
				}
			}));

		$this->overwriteService('AllConfig', $this->mockConfig);

		// clear hooks
		\OC_Hook::clear();
		\OC::registerShareHooks();

		\OCA\Files_Versions\Storage::enableMetaData(null);
		if ($saveVersionAuthor) {
			\OCA\Files_Versions\Storage::enableMetaData(new MetaStorage($this->dataDir, new FileHelper()));
		}

		\OCA\Files_Versions\Hooks::connectHooks();
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
	public function testMoveFileIntoSharedFolderAsRecipient(bool $metaDataEnabled) {
		$this->overwriteConfig($metaDataEnabled);

		\OC\Files\Filesystem::mkdir('folder1');
		$fileInfo = \OC\Files\Filesystem::getFileInfo('folder1');

		$node = \OC::$server->getUserFolder($this->user1)->get('folder1');
		$share = \OC::$server->getShareManager()->newShare();
		$share->setNode($node)
			->setShareType(\OCP\Share::SHARE_TYPE_USER)
			->setSharedBy($this->user1)
			->setSharedWith($this->user2)
			->setPermissions(\OCP\Constants::PERMISSION_ALL);
		$share = \OC::$server->getShareManager()->createShare($share);

		self::loginHelper($this->user2);
		$versionsFolder2 = '/' . $this->user2 . '/files_versions';
		\OC\Files\Filesystem::file_put_contents('test.txt', 'test file');

		$t1 = \time();
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
			$m1 = $versionsFolder2 . '/test.txt.v' . $t1 . '.json';
			$m2 = $versionsFolder2 . '/test.txt.v' . $t2 . '.json';

			\file_put_contents("$this->dataDir/$m1", \json_encode([MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $this->user2]));
			\file_put_contents("$this->dataDir/$m2", \json_encode([MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $this->user2]));
		}

		// move file into the shared folder as recipient
		\OC\Files\Filesystem::rename('/test.txt', '/folder1/test.txt');

		$this->assertFalse($this->rootView->file_exists($v1));
		$this->assertFalse($this->rootView->file_exists($v2));

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$this->assertFalse(\file_exists("$this->dataDir/$m1"));
			$this->assertFalse(\file_exists("$this->dataDir/$m2"));
		}

		self::loginHelper($this->user1);

		$versionsFolder1 = '/' . $this->user1 . '/files_versions';

		$v1Renamed = $versionsFolder1 . '/folder1/test.txt.v' . $t1;
		$v2Renamed = $versionsFolder1 . '/folder1/test.txt.v' . $t2;

		$this->assertTrue($this->rootView->file_exists($v1Renamed));
		$this->assertTrue($this->rootView->file_exists($v2Renamed));

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$m1Renamed = $versionsFolder1 . '/folder1/test.txt.v' . $t1 . '.json';
			$m2Renamed = $versionsFolder1 . '/folder1/test.txt.v' . $t2 . '.json';

			$this->assertTrue($this->rootView->file_exists($m1Renamed));
			$this->assertTrue($this->rootView->file_exists($m2Renamed));
		}

		\OC::$server->getShareManager()->deleteShare($share);
	}

	/**
	 * @medium
	 * test expire logic
	 * @dataProvider versionsProvider
	 */
	public function testGetExpireList($versions, $sizeOfAllDeletedFiles) {
		// last interval end at 2592000
		$startTime = 5000000;

		$testClass = new VersionStorageToTest();
		list($deleted, $size) = $testClass->callProtectedGetExpireList($startTime, $versions);

		// we should have deleted 16 files each of the size 1
		$this->assertEquals($sizeOfAllDeletedFiles, $size);

		// the deleted array should only contain versions which should be deleted
		foreach ($deleted as $key => $path) {
			unset($versions[$key]);
			$this->assertEquals("delete", \substr($path, 0, \strlen("delete")));
		}

		// the versions array should only contain versions which should be kept
		foreach ($versions as $version) {
			$this->assertEquals("keep", $version['path']);
		}
	}

	public function versionsProvider() {
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
	public function testRename(bool $metaDataEnabled) {
		\OC\Files\Filesystem::file_put_contents("test.txt", "test file");
		$this->overwriteConfig($metaDataEnabled);

		$t1 = \time();
		// second version is two weeks older, this way we make sure that no
		// version will be expired
		$t2 = $t1 - 60 * 60 * 24 * 14;

		// create some versions
		$v1 = $this->versionsRootOfUser1 . '/test.txt.v' . $t1;
		$v2 = $this->versionsRootOfUser1 . '/test.txt.v' . $t2;
		$m1 = $this->versionsRootOfUser1 . '/test.txt.v' . $t1 . '.json';
		$m2 = $this->versionsRootOfUser1 . '/test.txt.v' . $t1 . '.json';

		$v1Renamed = $this->versionsRootOfUser1 . '/test2.txt.v' . $t1;
		$v2Renamed = $this->versionsRootOfUser1 . '/test2.txt.v' . $t2;
		$m1Renamed = $this->versionsRootOfUser1 . '/test2.txt.v' . $t1 . '.json';
		$m2Renamed = $this->versionsRootOfUser1 . '/test2.txt.v' . $t1 . '.json';

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			\file_put_contents("$this->dataDir/$m1", \json_encode([MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $this->user2]));
			\file_put_contents("$this->dataDir/$m2", \json_encode([MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $this->user2]));
		}

		// execute rename hook of versions app
		\OC\Files\Filesystem::rename("test.txt", "test2.txt");

		$this->runCommands();

		$this->assertFalse($this->rootView->file_exists($v1));
		$this->assertFalse($this->rootView->file_exists($v2));

		$this->assertTrue($this->rootView->file_exists($v1Renamed));
		$this->assertTrue($this->rootView->file_exists($v2Renamed));

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$this->assertFalse(\file_exists("$this->dataDir/$m1"));
			$this->assertFalse(\file_exists("$this->dataDir/$m2"));

			$this->assertTrue($this->rootView->file_exists($m1Renamed));
			$this->assertTrue($this->rootView->file_exists($m2Renamed));
		}
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testRenameInSharedFolder(bool $metaDataEnabled) {
		$this->overwriteConfig($metaDataEnabled);

		\OC\Files\Filesystem::mkdir('folder1');
		\OC\Files\Filesystem::mkdir('folder1/folder2');
		\OC\Files\Filesystem::file_put_contents("folder1/test.txt", "test file");

		$t1 = \time();
		// second version is two weeks older, this way we make sure that no
		// version will be expired
		$t2 = $t1 - 60 * 60 * 24 * 14;

		$this->rootView->mkdir($this->versionsRootOfUser1 . '/folder1');
		// create some versions
		$v1 = $this->versionsRootOfUser1 . '/folder1/test.txt.v' . $t1;
		$v2 = $this->versionsRootOfUser1 . '/folder1/test.txt.v' . $t2;
		$m1 = $v1 . '.json';
		$m2 = $v2 . '.json';

		$v1Renamed = $this->versionsRootOfUser1 . '/folder1/folder2/test.txt.v' . $t1;
		$v2Renamed = $this->versionsRootOfUser1 . '/folder1/folder2/test.txt.v' . $t2;
		$m1Renamed = $v1Renamed . '.json';
		$m2Renamed = $v2Renamed . '.json';

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			\file_put_contents("$this->dataDir/$m1", \json_encode([MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $this->user1]));
			\file_put_contents("$this->dataDir/$m2", \json_encode([MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $this->user1]));
		}

		$node = \OC::$server->getUserFolder($this->user1)->get('folder1');
		$share = \OC::$server->getShareManager()->newShare();
		$share->setNode($node)
			->setShareType(\OCP\Share::SHARE_TYPE_USER)
			->setSharedBy($this->user1)
			->setSharedWith($this->user2)
			->setPermissions(\OCP\Constants::PERMISSION_ALL);
		$share = \OC::$server->getShareManager()->createShare($share);

		self::loginHelper($this->user2);

		$this->assertTrue(\OC\Files\Filesystem::file_exists('folder1/test.txt'));

		// execute rename hook of versions app
		\OC\Files\Filesystem::rename('/folder1/test.txt', '/folder1/folder2/test.txt');

		$this->runCommands();

		self::loginHelper($this->user1);

		$this->assertFalse($this->rootView->file_exists($v1));
		$this->assertFalse($this->rootView->file_exists($v2));

		$this->assertTrue($this->rootView->file_exists($v1Renamed));
		$this->assertTrue($this->rootView->file_exists($v2Renamed));

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$this->assertFalse(\file_exists("$this->dataDir/$m1"));
			$this->assertFalse(\file_exists("$this->dataDir/$m2"));

			$this->assertTrue($this->rootView->file_exists($m1Renamed));
			$this->assertTrue($this->rootView->file_exists($m2Renamed));
		}

		\OC::$server->getShareManager()->deleteShare($share);
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testMoveFolder(bool $metaDataEnabled) {
		$this->overwriteConfig($metaDataEnabled);

		\OC\Files\Filesystem::mkdir('folder1');
		\OC\Files\Filesystem::mkdir('folder2');
		\OC\Files\Filesystem::file_put_contents('folder1/test.txt', 'test file');

		$t1 = \time();
		// second version is two weeks older, this way we make sure that no
		// version will be expired
		$t2 = $t1 - 60 * 60 * 24 * 14;

		// create some versions
		$this->rootView->mkdir($this->versionsRootOfUser1 . '/folder1');
		$v1 = $this->versionsRootOfUser1 . '/folder1/test.txt.v' . $t1;
		$v2 = $this->versionsRootOfUser1 . '/folder1/test.txt.v' . $t2;
		$v1Renamed = $this->versionsRootOfUser1 . '/folder2/folder1/test.txt.v' . $t1;
		$v2Renamed = $this->versionsRootOfUser1 . '/folder2/folder1/test.txt.v' . $t2;

		$m1 = $v1 . '.json';
		$m2 = $v2 . '.json';
		$m1Renamed = $v1Renamed . '.json';
		$m2Renamed = $v2Renamed . '.json';

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			\file_put_contents("$this->dataDir/$m1", \json_encode([MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $this->user1]));
			\file_put_contents("$this->dataDir/$m2", \json_encode([MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $this->user1]));
		}

		// execute rename hook of versions app
		\OC\Files\Filesystem::rename('folder1', 'folder2/folder1');

		$this->runCommands();

		$this->assertFalse($this->rootView->file_exists($v1));
		$this->assertFalse($this->rootView->file_exists($v2));

		$this->assertTrue($this->rootView->file_exists($v1Renamed));
		$this->assertTrue($this->rootView->file_exists($v2Renamed));

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$this->assertFalse(\file_exists("$this->dataDir/$m1"));
			$this->assertFalse(\file_exists("$this->dataDir/$m2"));

			$this->assertTrue($this->rootView->file_exists($m1Renamed));
			$this->assertTrue($this->rootView->file_exists($m2Renamed));
		}
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testMoveFolderIntoSharedFolderAsRecipient(bool $metaDataEnabled) {
		$this->overwriteConfig($metaDataEnabled);

		\OC\Files\Filesystem::mkdir('folder1');

		$node = \OC::$server->getUserFolder($this->user1)->get('folder1');
		$share = \OC::$server->getShareManager()->newShare();
		$share->setNode($node)
			->setShareType(\OCP\Share::SHARE_TYPE_USER)
			->setSharedBy($this->user1)
			->setSharedWith($this->user2)
			->setPermissions(\OCP\Constants::PERMISSION_ALL);
		$share = \OC::$server->getShareManager()->createShare($share);

		self::loginHelper($this->user2);
		$versionsFolder2 = '/' . $this->user2. '/files_versions';
		\OC\Files\Filesystem::mkdir('folder2');
		\OC\Files\Filesystem::file_put_contents('folder2/test.txt', 'test file');

		$t1 = \time();
		// second version is two weeks older, this way we make sure that no
		// version will be expired
		$t2 = $t1 - 60 * 60 * 24 * 14;

		$this->rootView->mkdir($versionsFolder2);
		$this->rootView->mkdir($versionsFolder2 . '/folder2');
		// create some versions

		$v1 = $versionsFolder2 . '/folder2/test.txt.v' . $t1;
		$v2 = $versionsFolder2 . '/folder2/test.txt.v' . $t2;

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$m1 = $v1 . '.json';
			$m2 = $v2 . '.json';
			\file_put_contents("$this->dataDir/$m1", \json_encode([MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $this->user2]));
			\file_put_contents("$this->dataDir/$m2", \json_encode([MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $this->user2]));
		}

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		// move file into the shared folder as recipient
		\OC\Files\Filesystem::rename('/folder2', '/folder1/folder2');

		$this->assertFalse($this->rootView->file_exists($v1));
		$this->assertFalse($this->rootView->file_exists($v2));

		self::loginHelper($this->user1);

		$versionsFolder1 = '/' . $this->user1. '/files_versions';

		$v1Renamed = $versionsFolder1 . '/folder1/folder2/test.txt.v' . $t1;
		$v2Renamed = $versionsFolder1 . '/folder1/folder2/test.txt.v' . $t2;
		$m1Renamed = $v1Renamed . '.json';
		$m2Renamed = $v2Renamed . '.json';

		$this->assertTrue($this->rootView->file_exists($v1Renamed));
		$this->assertTrue($this->rootView->file_exists($v2Renamed));

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$this->assertTrue($this->rootView->file_exists($m1Renamed));
			$this->assertTrue($this->rootView->file_exists($m2Renamed));
		}

		\OC::$server->getShareManager()->deleteShare($share);
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testRenameSharedFile(bool $metaDataEnabled) {
		$this->overwriteConfig($metaDataEnabled);

		\OC\Files\Filesystem::file_put_contents("test.txt", "test file");

		$t1 = \time();
		// second version is two weeks older, this way we make sure that no
		// version will be expired
		$t2 = $t1 - 60 * 60 * 24 * 14;

		$this->rootView->mkdir($this->versionsRootOfUser1);
		// create some versions
		$v1 = $this->versionsRootOfUser1 . '/test.txt.v' . $t1;
		$v2 = $this->versionsRootOfUser1 . '/test.txt.v' . $t2;
		$m1 = $v1 . '.json';
		$m2 = $v2 . '.json';
		// the renamed versions should not exist! Because we only moved the mount point!
		$v1Renamed = $this->versionsRootOfUser1 . '/test2.txt.v' . $t1;
		$v2Renamed = $this->versionsRootOfUser1 . '/test2.txt.v' . $t2;
		$m1Renamed = $v1Renamed . '.json';
		$m2Renamed = $v2Renamed . '.json';

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			\file_put_contents("$this->dataDir/$m1", \json_encode([MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $this->user1]));
			\file_put_contents("$this->dataDir/$m2", \json_encode([MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $this->user1]));
		}

		$node = \OC::$server->getUserFolder($this->user1)->get('test.txt');
		$share = \OC::$server->getShareManager()->newShare();
		$share->setNode($node)
			->setShareType(\OCP\Share::SHARE_TYPE_USER)
			->setSharedBy($this->user1)
			->setSharedWith($this->user2)
			->setPermissions(\OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_UPDATE | \OCP\Constants::PERMISSION_SHARE);
		$share = \OC::$server->getShareManager()->createShare($share);

		self::loginHelper($this->user2);

		$this->assertTrue(\OC\Files\Filesystem::file_exists('test.txt'));

		// execute rename hook of versions app
		\OC\Files\Filesystem::rename('test.txt', 'test2.txt');

		self::loginHelper($this->user1);

		$this->runCommands();

		$this->assertTrue($this->rootView->file_exists($v1));
		$this->assertTrue($this->rootView->file_exists($v2));

		$this->assertFalse($this->rootView->file_exists($v1Renamed));
		$this->assertFalse($this->rootView->file_exists($v2Renamed));

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$this->assertTrue(\file_exists("$this->dataDir/$m1"));
			$this->assertTrue(\file_exists("$this->dataDir/$m2"));

			$this->assertFalse($this->rootView->file_exists($m1Renamed));
			$this->assertFalse($this->rootView->file_exists($m2Renamed));
		}

		\OC::$server->getShareManager()->deleteShare($share);
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testCopy(bool $metaDataEnabled) {
		$this->overwriteConfig($metaDataEnabled);
		\OC\Files\Filesystem::file_put_contents("test.txt", "test file");

		$t1 = \time();
		// second version is two weeks older, this way we make sure that no
		// version will be expired
		$t2 = $t1 - 60 * 60 * 24 * 14;

		// create some versions
		$v1 = $this->versionsRootOfUser1 . '/test.txt.v' . $t1;
		$v2 = $this->versionsRootOfUser1 . '/test.txt.v' . $t2;
		$v1Copied = $this->versionsRootOfUser1 . '/test2.txt.v' . $t1;
		$v2Copied = $this->versionsRootOfUser1 . '/test2.txt.v' . $t2;

		$m1 = $v1 . '.json';
		$m2 = $v2 . '.json';
		$m1Copied = $v1Copied . '.json';
		$m2Copied = $v2Copied . '.json';

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			\file_put_contents("$this->dataDir/$m1", \json_encode([MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $this->user1]));
			\file_put_contents("$this->dataDir/$m2", \json_encode([MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $this->user1]));
		}

		// execute copy hook of versions app
		\OC\Files\Filesystem::copy("test.txt", "test2.txt");

		$this->runCommands();

		$this->assertTrue($this->rootView->file_exists($v1));
		$this->assertTrue($this->rootView->file_exists($v2));

		$this->assertTrue($this->rootView->file_exists($v1Copied));
		$this->assertTrue($this->rootView->file_exists($v2Copied));

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$this->assertTrue(\file_exists("$this->dataDir/$m1"));
			$this->assertTrue(\file_exists("$this->dataDir/$m2"));

			$this->assertTrue($this->rootView->file_exists($m1Copied));
			$this->assertTrue($this->rootView->file_exists($m2Copied));
		}
	}

	public function getVersionsProvider() {
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
	public function testGetVersions(string $filepath, bool $enableMetadata) {
		$this->overwriteConfig($enableMetadata);

		$t1 = \time();
		// second version is two weeks older, this way we make sure that no
		// version will be expired
		$t2 = $t1 - 60 * 60 * 24 * 14;

		$fileName = \basename($filepath);
		$parent = \dirname($filepath);

		// create some versions
		$v1 = $this->versionsRootOfUser1 . $filepath . '.v' . $t1;
		$v2 = $this->versionsRootOfUser1 . $filepath . '.v' . $t2;
		$m1 = $v1 . '.json';
		$m2 = $v2 . '.json';

		$this->rootView->mkdir($this->versionsRootOfUser1 . $parent);

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		if ($enableMetadata && !$this->objectStoreEnabled) {
			\file_put_contents("$this->dataDir/$m1", \json_encode([MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $this->user1]));
			\file_put_contents("$this->dataDir/$m2", \json_encode([MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $this->user1]));
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
	public function testGetVersionsEmptyFile(bool $metaDataEnabled) {
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

		$this->logout();
		// needed to have a FS setup (the background job does this)
		\OC_Util::setupFS($this->user1);

		$this->assertFalse(\OCA\Files_Versions\Storage::expire('/void/unexist.txt', $this->user1));
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testExpireNonexistingUser(bool $metaDataEnabled) {
		$this->expectException(\OC\User\NoUserException::class);
		$this->overwriteConfig($metaDataEnabled);

		$this->logout();
		// needed to have a FS setup (the background job does this)
		\OC_Util::setupFS($this->user1);
		\OC\Files\Filesystem::file_put_contents("test.txt", "test file");

		$this->assertFalse(\OCA\Files_Versions\Storage::expire('test.txt', 'unexist'));
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testRestoreSameStorage(bool $metaDataEnabled) {
		$this->overwriteConfig($metaDataEnabled);

		\OC\Files\Filesystem::mkdir('sub');
		$this->doTestRestore($metaDataEnabled);
	}

	/**
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testRestoreCrossStorage(bool $metaDataEnabled) {
		$this->overwriteConfig($metaDataEnabled);

		$storage2 = new Temporary([]);
		\OC\Files\Filesystem::mount($storage2, [], $this->user1 . '/files/sub');

		$this->doTestRestore($metaDataEnabled);
	}

	/**
	 * @param string $hookName name of hook called
	 * @param array $params variable to receive parameters provided by hook
	 */
	private function connectMockHooks($hookName, &$params) {
		if ($hookName === null) {
			return;
		}

		$eventHandler = $this->getMockBuilder('\stdclass')
			->setMethods(['callback'])
			->getMock();

		$eventHandler->expects($this->any())
			->method('callback')
			->will($this->returnCallback(
				function ($p) use (&$params) {
					$params = $p;
				}
			));

		\OCP\Util::connectHook(
			'\OCP\Versions',
			$hookName,
			$eventHandler,
			'callback'
		);
	}

	private function doTestRestore(bool $metaDataEnabled) {
		$filePath = $this->user1 . '/files/sub/test.txt';
		$this->rootView->file_put_contents($filePath, 'test file');

		$t0 = $this->rootView->filemtime($filePath);

		// not exactly the same timestamp as the file
		$t1 = \time() - 60;
		// second version is two weeks older
		$t2 = $t1 - 60 * 60 * 24 * 14;

		// create some versions
		$v1 = $this->versionsRootOfUser1 . '/sub/test.txt.v' . $t1;
		$v2 = $this->versionsRootOfUser1 . '/sub/test.txt.v' . $t2;

		$m1 = $v1 . '.json';
		$m2 = $v2 . '.json';

		$this->rootView->mkdir($this->versionsRootOfUser1 . '/sub');
		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			\file_put_contents("$this->dataDir/$m1", \json_encode([MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $this->user1]));
			\file_put_contents("$this->dataDir/$m2", \json_encode([MetaPlugin::VERSION_EDITED_BY_PROPERTYNAME => $this->user2]));
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
			$info2['etag'],
			$info1['etag'],
			'Etag must change after rolling back version'
		);
		$this->assertEquals(
			$info2['fileid'],
			$info1['fileid'],
			'File id must not change after rolling back version'
		);
		$this->assertEquals(
			$info2['mtime'],
			$t2,
			'Restored file must have mtime from version'
		);

		$newVersions = \OCA\Files_Versions\Storage::getVersions(
			$this->user1,
			'/sub/test.txt'
		);

		$this->assertTrue(
			$this->rootView->file_exists($this->versionsRootOfUser1 . '/sub/test.txt.v' . $t0),
			'A version file must be created for the file before restoration'
		);

		$this->assertTrue(
			$this->rootView->file_exists($v1),
			'Untouched version file is still there'
		);
		$this->assertFalse(
			$this->rootView->file_exists($v2),
			'Restored version file gone from files_version folder'
		);

		if ($metaDataEnabled && !$this->objectStoreEnabled) {
			$this->assertTrue(
				\file_exists("$this->dataDir/$this->versionsRootOfUser1/sub/test.txt.v$t0" . MetaStorage::VERSION_FILE_EXT),
				'A version metadata-file must be created for the file before restoration'
			);

			$this->assertTrue(
				\file_exists("$this->dataDir/$m1"),
				'Untouched metadata-file is still there'
			);

			$this->assertFalse(
				\file_exists("$this->dataDir/$m2"),
				'Restored metadata file must be gone from files_version folder'
			);
		}

		$this->assertCount(2, $newVersions, 'Additional version created');

		$this->assertArrayHasKey(
			$t0 . '#' . 'test.txt',
			$newVersions,
			'A version was created for the file before restoration'
		);
		$this->assertArrayHasKey(
			$t1 . '#' . 'test.txt',
			$newVersions,
			'Untouched version is still there'
		);
		$this->assertArrayNotHasKey(
			$t2 . '#' . 'test.txt',
			$newVersions,
			'Restored version is not in the list any more'
		);
	}

	/**
	 * Test whether versions are created when overwriting as owner
	 *
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testStoreVersionAsOwner(bool $metaDataEnabled) {
		$this->overwriteConfig($metaDataEnabled);
		$this->loginAsUser($this->user1);

		$this->createAndCheckVersions(
			\OC\Files\Filesystem::getView(),
			'test.txt'
		);
	}

	/**
	 * Test whether versions are created when overwriting as share recipient
	 * @dataProvider metaDataEnabledProvider
	 */
	public function testStoreVersionAsRecipient(bool $metaDataEnabled) {
		$this->overwriteConfig($metaDataEnabled);

		$this->loginAsUser($this->user1);

		\OC\Files\Filesystem::mkdir('folder');
		\OC\Files\Filesystem::file_put_contents('folder/test.txt', 'test file');

		$node = \OC::$server->getUserFolder($this->user1)->get('folder');
		$share = \OC::$server->getShareManager()->newShare();
		$share->setNode($node)
			->setShareType(\OCP\Share::SHARE_TYPE_USER)
			->setSharedBy($this->user1)
			->setSharedWith($this->user2)
			->setPermissions(\OCP\Constants::PERMISSION_ALL);
		$share = \OC::$server->getShareManager()->createShare($share);

		$this->loginAsUser($this->user2);

		$this->createAndCheckVersions(
			\OC\Files\Filesystem::getView(),
			'folder/test.txt'
		);

		\OC::$server->getShareManager()->deleteShare($share);
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
	public function testStoreVersionAsAnonymous(bool $metaDataEnabled) {
		$this->overwriteConfig($metaDataEnabled);

		$this->logout();

		// note: public link upload does this,
		// needed to make the hooks fire
		\OC_Util::setupFS($this->user1);

		$userView = new \OC\Files\View('/' . $this->user1 . '/files');
		$this->createAndCheckVersions(
			$userView,
			'test.txt'
		);
	}

	/**
	 * @param \OC\Files\View $view
	 * @param string $path
	 */
	private function createAndCheckVersions(\OC\Files\View $view, $path) {
		$this->markTestSkippedIfStorageHasOwnVersioning();

		$view->file_put_contents($path, 'test file');
		$view->file_put_contents($path, 'version 1');
		$view->file_put_contents($path, 'version 2');

		$this->loginAsUser($this->user1);

		// need to scan for the versions
		list($rootStorage, ) = $this->rootView->resolvePath($this->user1 . '/files_versions');
		$rootStorage->getScanner()->scan('files_versions');

		$versions = \OCA\Files_Versions\Storage::getVersions(
			$this->user1,
			'/' . $path
		);

		// note: we cannot predict how many versions are created due to
		// test run timing
		$this->assertGreaterThan(0, \count($versions));

		return $versions;
	}

	/**
	 * @param string $user
	 * @param bool $create
	 */
	public static function loginHelper($user, $create = false) {
		if ($create) {
			\OC::$server->getUserManager()->createUser($user, $user);
		}

		$storage = new \ReflectionClass('\OCA\Files_Sharing\SharedStorage');
		$isInitialized = $storage->getProperty('initialized');
		$isInitialized->setAccessible(true);
		$isInitialized->setValue($storage, false);
		$isInitialized->setAccessible(false);

		\OC_Util::tearDownFS();
		\OC_User::setUserId('');
		\OC\Files\Filesystem::tearDown();
		\OC_User::setUserId($user);
		\OC_Util::setupFS($user);
		\OC::$server->getUserFolder($user);
	}

	private function markTestSkippedIfStorageHasOwnVersioning() {
		/** @var Storage $storage */
		list($storage, $internalPath) = $this->rootView->resolvePath(self::USERS_VERSIONS_ROOT);
		if ($storage->instanceOfStorage(ObjectStoreStorage::class)) {
			$this->markTestSkipped();
		}
	}
}

// extend the original class to make it possible to test protected methods
class VersionStorageToTest extends \OCA\Files_Versions\Storage {
	/**
	 * @param integer $time
	 */
	public function callProtectedGetExpireList($time, $versions) {
		return self::getExpireList($time, $versions);
	}
}
