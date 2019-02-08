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
use OCP\Files\Storage;
use Test\TestCase;

/**
 * Class Test_Files_versions
 * this class provide basic files versions test
 *
 * @group DB
 */
class VersioningTest extends TestCase {

	/** @var string */
	private $user1;
	/** @var string */
	private $user2;
	/** @var string */
	private $versionsRootOfUser1;

	/**
	 * @var \OC\Files\View
	 */
	private $rootView;

	public static function setUpBeforeClass() {
		parent::setUpBeforeClass();

		$application = new \OCA\Files_Sharing\AppInfo\Application();
		$application->registerMountProviders();
	}

	protected function setUp() {
		parent::setUp();

		$config = \OC::$server->getConfig();
		$mockConfig = $this->createMock('\OCP\IConfig');
		$mockConfig->expects($this->any())
			->method('getSystemValue')
			->will($this->returnCallback(function ($key, $default) use ($config) {
				if ($key === 'filesystem_check_changes') {
					return \OC\Files\Cache\Watcher::CHECK_ONCE;
				} else {
					return $config->getSystemValue($key, $default);
				}
			}));
		$this->overwriteService('AllConfig', $mockConfig);

		// clear hooks
		\OC_Hook::clear();
		\OC::registerShareHooks();
		\OCA\Files_Versions\Hooks::connectHooks();

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
	}

	protected function tearDown() {
		$this->restoreService('AllConfig');

		if ($this->rootView) {
			$this->rootView->deleteAll($this->user1 . '/files/');
			$this->rootView->deleteAll($this->user2 . '/files/');
			$this->rootView->deleteAll($this->user1 . '/files_versions/');
			$this->rootView->deleteAll($this->user2 . '/files_versions/');
		}

		$user = \OC::$server->getUserManager()->get($this->user1);
		if ($user !== null) {
			$user->delete();
		}
		$user = \OC::$server->getUserManager()->get($this->user2);
		if ($user !== null) {
			$user->delete();
		}

		\OC_Hook::clear();

		parent::tearDown();
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
					//next slice (60sec) starts at 4999990 keep one version every 10 secons
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
					// final slice starts at 2408000 keep one version every 604800 secons
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
					// next slice (60sec) starts at 4999990 keep one version every 10 secons
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
					// final slice starts at 2408000 keep one version every 604800 secons
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
					//next slice (60sec) starts at 4999990 keep one version every 10 secons
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
					// final slice starts at 2408000 keep one version every 604800 secons
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

	public function testRename() {
		\OC\Files\Filesystem::file_put_contents("test.txt", "test file");

		$t1 = \time();
		// second version is two weeks older, this way we make sure that no
		// version will be expired
		$t2 = $t1 - 60 * 60 * 24 * 14;

		// create some versions
		$v1 = $this->versionsRootOfUser1 . '/test.txt.v' . $t1;
		$v2 = $this->versionsRootOfUser1 . '/test.txt.v' . $t2;
		$v1Renamed = $this->versionsRootOfUser1 . '/test2.txt.v' . $t1;
		$v2Renamed = $this->versionsRootOfUser1 . '/test2.txt.v' . $t2;

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		// execute rename hook of versions app
		\OC\Files\Filesystem::rename("test.txt", "test2.txt");

		$this->runCommands();

		$this->assertFalse($this->rootView->file_exists($v1));
		$this->assertFalse($this->rootView->file_exists($v2));

		$this->assertTrue($this->rootView->file_exists($v1Renamed));
		$this->assertTrue($this->rootView->file_exists($v2Renamed));
	}

	public function testRenameInSharedFolder() {
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
		$v1Renamed = $this->versionsRootOfUser1 . '/folder1/folder2/test.txt.v' . $t1;
		$v2Renamed = $this->versionsRootOfUser1 . '/folder1/folder2/test.txt.v' . $t2;

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

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

		\OC::$server->getShareManager()->deleteShare($share);
	}

	public function testMoveFolder() {
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

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		// execute rename hook of versions app
		\OC\Files\Filesystem::rename('folder1', 'folder2/folder1');

		$this->runCommands();

		$this->assertFalse($this->rootView->file_exists($v1));
		$this->assertFalse($this->rootView->file_exists($v2));

		$this->assertTrue($this->rootView->file_exists($v1Renamed));
		$this->assertTrue($this->rootView->file_exists($v2Renamed));
	}

	public function testCopy() {
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

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		// execute copy hook of versions app
		\OC\Files\Filesystem::copy("test.txt", "test2.txt");

		$this->runCommands();

		$this->assertTrue($this->rootView->file_exists($v1));
		$this->assertTrue($this->rootView->file_exists($v2));

		$this->assertTrue($this->rootView->file_exists($v1Copied));
		$this->assertTrue($this->rootView->file_exists($v2Copied));
	}

	/**
	 * test if we find all versions and if the versions array contain
	 * the correct 'path' and 'name'
	 */
	public function testGetVersions() {
		$t1 = \time();
		// second version is two weeks older, this way we make sure that no
		// version will be expired
		$t2 = $t1 - 60 * 60 * 24 * 14;

		// create some versions
		$v1 = $this->versionsRootOfUser1 . '/subfolder/test.txt.v' . $t1;
		$v2 = $this->versionsRootOfUser1 . '/subfolder/test.txt.v' . $t2;

		$this->rootView->mkdir($this->versionsRootOfUser1 . '/subfolder/');

		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		// execute copy hook of versions app
		$versions = \OCA\Files_Versions\Storage::getVersions($this->user1, '/subfolder/test.txt');

		$this->assertCount(2, $versions);

		foreach ($versions as $version) {
			$this->assertSame('/subfolder/test.txt', $version['path']);
			$this->assertSame('test.txt', $version['name']);
		}

		//cleanup
		$this->rootView->deleteAll($this->versionsRootOfUser1 . '/subfolder');
	}

	/**
	 * test if we find all versions and if the versions array contain
	 * the correct 'path' and 'name'
	 */
	public function testGetVersionsEmptyFile() {
		// execute copy hook of versions app
		$versions = \OCA\Files_Versions\Storage::getVersions($this->user1, '');
		$this->assertCount(0, $versions);

		$versions = \OCA\Files_Versions\Storage::getVersions($this->user1, null);
		$this->assertCount(0, $versions);
	}

	public function testExpireNonexistingFile() {
		$this->logout();
		// needed to have a FS setup (the background job does this)
		\OC_Util::setupFS($this->user1);

		$this->assertFalse(\OCA\Files_Versions\Storage::expire('/void/unexist.txt', $this->user1));
	}

	/**
	 * @expectedException \OC\User\NoUserException
	 */
	public function testExpireNonexistingUser() {
		$this->logout();
		// needed to have a FS setup (the background job does this)
		\OC_Util::setupFS($this->user1);
		\OC\Files\Filesystem::file_put_contents("test.txt", "test file");

		$this->assertFalse(\OCA\Files_Versions\Storage::expire('test.txt', 'unexist'));
	}

	public function testRestoreSameStorage() {
		\OC\Files\Filesystem::mkdir('sub');
		$this->doTestRestore();
	}

	public function testRestoreCrossStorage() {
		$storage2 = new Temporary([]);
		\OC\Files\Filesystem::mount($storage2, [], $this->user1 . '/files/sub');

		$this->doTestRestore();
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

	private function doTestRestore() {
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

		$this->rootView->mkdir($this->versionsRootOfUser1 . '/sub');
		$this->rootView->file_put_contents($v1, 'version1');
		$this->rootView->file_put_contents($v2, 'version2');

		$oldVersions = \OCA\Files_Versions\Storage::getVersions(
			$this->user1, '/sub/test.txt'
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
			'Restored file has mtime from version'
		);

		$newVersions = \OCA\Files_Versions\Storage::getVersions(
			$this->user1, '/sub/test.txt'
		);

		$this->assertTrue(
			$this->rootView->file_exists($this->versionsRootOfUser1 . '/sub/test.txt.v' . $t0),
			'A version file was created for the file before restoration'
		);
		$this->assertTrue(
			$this->rootView->file_exists($v1),
			'Untouched version file is still there'
		);
		$this->assertFalse(
			$this->rootView->file_exists($v2),
			'Restored version file gone from files_version folder'
		);

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
	 */
	public function testStoreVersionAsOwner() {
		$this->loginAsUser($this->user1);

		$this->createAndCheckVersions(
			\OC\Files\Filesystem::getView(),
			'test.txt'
		);
	}

	/**
	 * Test whether versions are created when overwriting as share recipient
	 */
	public function testStoreVersionAsRecipient() {
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
	 */
	public function testStoreVersionAsAnonymous() {
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
			$this->user1, '/' . $path
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
		list($storage, $internalPath) = $this->rootView->resolvePath($this->versionsRootOfUser1);
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
