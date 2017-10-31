<?php
/**
 * @author Ahmed Ammar <ahmed.a.ammar@gmail.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace OCA\Files\Tests;

require_once __DIR__ . '/../appinfo/app.php';

use Test\TestCase;
use OCP\Files\NotFoundException;

/**
 * Class Test_Files_zsynchooks
 * this class provide basic files zsync hooks test
 *
 * @group DB
 */
class HooksZsyncTest extends TestCase {

	const TEST_FILES_HOOKS_USER = 'test-files-user';
	const TEST_FILES_HOOKS_USER2 = 'test-files-user2';
	const USERS_FILES_ZSYNC_ROOT = '/test-files-user/files_zsync';

	/**
	 * @var \OC\Files\View
	 */
	private $rootView;

	public static function setUpBeforeClass() {
		parent::setUpBeforeClass();

		$application = new \OCA\Files_Sharing\AppInfo\Application();
		$application->registerMountProviders();

		// create test user
		self::loginHelper(self::TEST_FILES_HOOKS_USER2, true);
		self::loginHelper(self::TEST_FILES_HOOKS_USER, true);
	}

	public static function tearDownAfterClass() {
		// cleanup test user
		$user = \OC::$server->getUserManager()->get(self::TEST_FILES_HOOKS_USER);
		if ($user !== null) { $user->delete(); }
		$user = \OC::$server->getUserManager()->get(self::TEST_FILES_HOOKS_USER2);
		if ($user !== null) { $user->delete(); }

		parent::tearDownAfterClass();
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
		\OCA\Files\Hooks::connectHooks();

		self::loginHelper(self::TEST_FILES_HOOKS_USER);
		$this->rootView = new \OC\Files\View();
		if (!$this->rootView->file_exists(self::USERS_FILES_ZSYNC_ROOT)) {
			$this->rootView->mkdir(self::USERS_FILES_ZSYNC_ROOT);
		}
	}

	protected function tearDown() {
		$this->restoreService('AllConfig');

		if ($this->rootView) {
			$this->rootView->deleteAll(self::TEST_FILES_HOOKS_USER . '/files/');
			$this->rootView->deleteAll(self::TEST_FILES_HOOKS_USER2 . '/files/');
			$this->rootView->deleteAll(self::TEST_FILES_HOOKS_USER . '/files_zsync/');
			$this->rootView->deleteAll(self::TEST_FILES_HOOKS_USER2 . '/files_zsync/');
		}

		\OC_Hook::clear();

		parent::tearDown();
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

	public function testRenameFile() {
		\OC\Files\Filesystem::file_put_contents("test.txt", "test file");

		$z1 = self::USERS_FILES_ZSYNC_ROOT . '/test.txt.zsync';
		$z1Renamed = self::USERS_FILES_ZSYNC_ROOT . '/test.txt.renamed.zsync';

		$this->rootView->file_put_contents($z1, 'zsync');

		\OC\Files\Filesystem::rename("test.txt", "test.txt.renamed");

		$this->assertFalse($this->rootView->file_exists($z1));
		$this->assertTrue($this->rootView->file_exists($z1Renamed));
	}

	public function testDeleteFile() {
		\OC\Files\Filesystem::file_put_contents("test.txt", "test file");

		$z1 = self::USERS_FILES_ZSYNC_ROOT . '/test.txt.zsync';

		$this->rootView->file_put_contents($z1, 'zsync');

		\OC\Files\Filesystem::unlink("test.txt");

		$this->assertFalse($this->rootView->file_exists($z1));
		$this->assertFalse($this->rootView->file_exists(self::USERS_FILES_ZSYNC_ROOT . '/test'));
	}

	public function testCopyFile() {
		\OC\Files\Filesystem::file_put_contents("test.txt", "test file");

		$z1 = self::USERS_FILES_ZSYNC_ROOT . '/test.txt.zsync';
		$z1Copied = self::USERS_FILES_ZSYNC_ROOT . '/test.txt.copied.zsync';

		$this->rootView->file_put_contents($z1, 'zsync');

		\OC\Files\Filesystem::copy("test.txt", "test.txt.copied");

		$this->assertTrue($this->rootView->file_exists($z1));
		$this->assertTrue($this->rootView->file_exists($z1Copied));
	}

	public function testRenameFolder() {
		\OC\Files\Filesystem::mkdir("test");
		\OC\Files\Filesystem::file_put_contents("test/test.txt", "test file");

		$z1 = self::USERS_FILES_ZSYNC_ROOT . '/test/test.txt.zsync';
		$z1Renamed = self::USERS_FILES_ZSYNC_ROOT . '/test.renamed/test.txt.zsync';

		$this->rootView->mkdir(self::USERS_FILES_ZSYNC_ROOT . '/test');
		$this->rootView->file_put_contents($z1, 'zsync');

		\OC\Files\Filesystem::rename("test", "test.renamed");

		$this->assertFalse($this->rootView->file_exists($z1));
		$this->assertTrue($this->rootView->file_exists($z1Renamed));
	}

	public function testDeleteFolder() {
		\OC\Files\Filesystem::mkdir("test");
		\OC\Files\Filesystem::file_put_contents("test/test.txt", "test file");

		$z1 = self::USERS_FILES_ZSYNC_ROOT . '/test/test.txt.zsync';

		$this->rootView->mkdir(self::USERS_FILES_ZSYNC_ROOT . '/test');
		$this->rootView->file_put_contents($z1, 'zsync');

		\OC\Files\Filesystem::rmdir("test");

		$this->assertFalse($this->rootView->file_exists(self::USERS_FILES_ZSYNC_ROOT . '/test'));
	}

	public function testCopyFolder() {
		\OC\Files\Filesystem::mkdir("test");
		\OC\Files\Filesystem::file_put_contents("test/test.txt", "test file");

		$z1 = self::USERS_FILES_ZSYNC_ROOT . '/test/test.txt.zsync';
		$z1Copied = self::USERS_FILES_ZSYNC_ROOT . '/test.copied/test.txt.zsync';

		$this->rootView->mkdir(self::USERS_FILES_ZSYNC_ROOT . '/test');
		$this->rootView->file_put_contents($z1, 'zsync');

		\OC\Files\Filesystem::copy("test", "test.copied");

		$this->assertTrue($this->rootView->file_exists($z1));
		$this->assertTrue($this->rootView->file_exists($z1Copied));
	}

	public function testCopyFileNotExist() {
		\OC\Files\Filesystem::file_put_contents("test.txt", "test file");
		\OC\Files\Filesystem::copy("test.txt", "test.txt.copied");

		$z1 = self::USERS_FILES_ZSYNC_ROOT . '/test.txt.zsync';
		$z1Copied = self::USERS_FILES_ZSYNC_ROOT . '/test.txt.copied.zsync';

		$this->assertFalse($this->rootView->file_exists($z1));
		$this->assertFalse($this->rootView->file_exists($z1Copied));
	}
}
