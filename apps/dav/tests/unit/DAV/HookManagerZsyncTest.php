<?php
/*
 * Copyright (C) by Ahmed Ammar <ahmed.a.ammar@gmail.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
 * Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
 * WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
 * OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 */
namespace OCA\DAV\Tests\unit\DAV;

use Test\TestCase;
use OCP\Files\NotFoundException;
use OC\L10N\L10N;
use OCA\DAV\CalDAV\BirthdayService;
use OCA\DAV\CalDAV\CalDavBackend;
use OCA\DAV\CardDAV\CardDavBackend;
use OCA\DAV\CardDAV\SyncService;
use OCA\DAV\HookManager;
use OCP\IUser;
use OCP\IUserManager;

/**
 * Class Test_Files_zsynchooks
 * this class provide basic files zsync hooks test
 *
 * @group DB
 */
class HookManagerZsyncTest extends TestCase {
	const TEST_ZSYNC_HOOKS_USER = 'test-files-user';
	const USERS_ZSYNC_ROOT = '/test-files-user/files_zsync';

	/**
	 * @var \OC\Files\View
	 */
	private $rootView;

	public static function setUpBeforeClass() {
		parent::setUpBeforeClass();

		$application = new \OCA\Files_Sharing\AppInfo\Application();
		$application->registerMountProviders();

		// create test user
		self::loginHelper(self::TEST_ZSYNC_HOOKS_USER, true);
	}

	public static function tearDownAfterClass(): void {
		// cleanup test user
		$user = \OC::$server->getUserManager()->get(self::TEST_ZSYNC_HOOKS_USER);
		if ($user !== null) {
			$user->delete();
		}

		parent::tearDownAfterClass();
	}

	protected function setUp(): void {
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

		$l10n = $this->getMockBuilder('OC\L10N\L10N')
			->disableOriginalConstructor()->getMock();

		$user = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()
			->getMock();

		/** @var IUserManager | \PHPUnit\Framework\MockObject\MockObject $userManager */
		$userManager = $this->getMockBuilder(IUserManager::class)
			->disableOriginalConstructor()
			->getMock();

		/** @var SyncService | \PHPUnit\Framework\MockObject\MockObject $syncService */
		$syncService = $this->getMockBuilder(SyncService::class)
			->disableOriginalConstructor()
			->getMock();

		/** @var CalDavBackend | \PHPUnit\Framework\MockObject\MockObject $cal */
		$cal = $this->getMockBuilder(CalDavBackend::class)
			->disableOriginalConstructor()
			->getMock();

		/** @var CardDavBackend | \PHPUnit\Framework\MockObject\MockObject $card */
		$card = $this->getMockBuilder(CardDavBackend::class)
			->disableOriginalConstructor()
			->getMock();

		$hm = new HookManager($userManager, $syncService, $cal, $card, $l10n);
		$hm->setup();

		self::loginHelper(self::TEST_ZSYNC_HOOKS_USER);
		$this->rootView = new \OC\Files\View();
		if (!$this->rootView->file_exists(self::USERS_ZSYNC_ROOT)) {
			$this->rootView->mkdir(self::USERS_ZSYNC_ROOT);
		}
	}

	protected function tearDown(): void {
		$this->restoreService('AllConfig');

		if ($this->rootView) {
			$this->rootView->deleteAll(self::TEST_ZSYNC_HOOKS_USER . '/files/');
			$this->rootView->deleteAll(self::TEST_ZSYNC_HOOKS_USER . '/files_zsync/');
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

		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test.txt');
		$z1 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();

		$this->rootView->file_put_contents($z1, 'zsync');

		\OC\Files\Filesystem::rename("test.txt", "test.txt.renamed");

		$this->assertTrue($this->rootView->file_exists($z1));
	}

	public function testDeleteFile() {
		\OC\Files\Filesystem::file_put_contents("test.txt", "test file");

		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test.txt');
		$z1 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();

		$this->rootView->file_put_contents($z1, 'zsync');

		\OC\Files\Filesystem::unlink("test.txt");

		$this->assertFalse($this->rootView->file_exists($z1));
	}

	public function testCopyFile() {
		\OC\Files\Filesystem::file_put_contents("test.txt", "test file");

		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test.txt');
		$z1 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();

		$this->rootView->file_put_contents($z1, 'zsync');

		\OC\Files\Filesystem::copy("test.txt", "test.txt.copied");

		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test.txt.copied');
		$z1Copied = self::USERS_ZSYNC_ROOT . '/' . $info->getId();

		$this->assertTrue($this->rootView->file_exists($z1));
		$this->assertTrue($this->rootView->file_exists($z1Copied));
	}

	public function testRenameFolder() {
		\OC\Files\Filesystem::mkdir("test/sub/sub");
		\OC\Files\Filesystem::file_put_contents("test/test.txt", "test file1");
		\OC\Files\Filesystem::file_put_contents("test/sub/test.txt", "test file2");
		\OC\Files\Filesystem::file_put_contents("test/sub/sub/test.txt", "test file3");

		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test/test.txt');
		$z1 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();
		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test/sub/test.txt');
		$z2 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();
		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test/sub/sub/test.txt');
		$z3 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();

		$this->rootView->file_put_contents($z1, 'zsync');
		$this->rootView->file_put_contents($z2, 'zsync');
		$this->rootView->file_put_contents($z3, 'zsync');

		\OC\Files\Filesystem::rename("test", "test.renamed");

		$this->assertTrue($this->rootView->file_exists($z1));
		$this->assertTrue($this->rootView->file_exists($z2));
		$this->assertTrue($this->rootView->file_exists($z3));
	}

	public function testDeleteFolder() {
		\OC\Files\Filesystem::mkdir("test/sub/sub");
		\OC\Files\Filesystem::file_put_contents("test/test.txt", "test file1");
		\OC\Files\Filesystem::file_put_contents("test/sub/test.txt", "test file2");
		\OC\Files\Filesystem::file_put_contents("test/sub/sub/test.txt", "test file3");

		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test/test.txt');
		$z1 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();
		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test/sub/test.txt');
		$z2 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();
		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test/sub/sub/test.txt');
		$z3 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();

		$this->rootView->file_put_contents($z1, 'zsync');
		$this->rootView->file_put_contents($z2, 'zsync');
		$this->rootView->file_put_contents($z3, 'zsync');

		\OC\Files\Filesystem::rmdir("test");

		$this->assertFalse($this->rootView->file_exists($z1));
		$this->assertFalse($this->rootView->file_exists($z2));
		$this->assertFalse($this->rootView->file_exists($z3));
	}

	public function testCopyFolder() {
		\OC\Files\Filesystem::mkdir("test/sub/sub");
		\OC\Files\Filesystem::file_put_contents("test/test.txt", "test file1");
		\OC\Files\Filesystem::file_put_contents("test/sub/test.txt", "test file2");
		\OC\Files\Filesystem::file_put_contents("test/sub/sub/test.txt", "test file3");

		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test/test.txt');
		$z1 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();
		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test/sub/test.txt');
		$z2 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();
		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test/sub/sub/test.txt');
		$z3 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();

		$this->rootView->file_put_contents($z1, 'zsync');
		$this->rootView->file_put_contents($z2, 'zsync');
		$this->rootView->file_put_contents($z3, 'zsync');

		\OC\Files\Filesystem::copy("test", "test.copied");

		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test.copied/test.txt');
		$z1 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();
		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test.copied/sub/test.txt');
		$z2 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();
		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test.copied/sub/sub/test.txt');
		$z3 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();

		$this->assertTrue($this->rootView->file_exists($z1));
		$this->assertTrue($this->rootView->file_exists($z2));
		$this->assertTrue($this->rootView->file_exists($z3));
	}

	public function testCopyFileNotExist() {
		\OCP\Util::writeLog('testCopyFileNotExist', '', \OCP\Util::ERROR);

		\OC\Files\Filesystem::mkdir("test/sub/sub");
		\OC\Files\Filesystem::file_put_contents("test/test.txt", "test file1");
		\OC\Files\Filesystem::file_put_contents("test/sub/test.txt", "test file2");
		\OC\Files\Filesystem::file_put_contents("test/sub/sub/test.txt", "test file3");

		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test/test.txt');
		$z1 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();
		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test/sub/test.txt');
		$z2 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();
		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test/sub/sub/test.txt');
		$z3 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();

		$this->rootView->file_put_contents($z1, 'zsync');
		$this->rootView->file_put_contents($z3, 'zsync');

		\OC\Files\Filesystem::copy("test", "test.copied");

		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test.copied/test.txt');
		$z1 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();
		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test.copied/sub/test.txt');
		$z2 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();
		$info = $this->rootView->getFileInfo(self::TEST_ZSYNC_HOOKS_USER.'/files/test.copied/sub/sub/test.txt');
		$z3 = self::USERS_ZSYNC_ROOT . '/' . $info->getId();

		$this->assertTrue($this->rootView->file_exists($z1));
		$this->assertFalse($this->rootView->file_exists($z2));
		$this->assertTrue($this->rootView->file_exists($z3));
	}
}
