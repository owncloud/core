<?php
/**
 * Copyright (c) 2012 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file. */

namespace Test\Files;

use OC\AllConfig;
use OC\Cache\CappedMemoryCache;
use OC\Files\Cache\Watcher;
use OC\Files\Filesystem;
use OC\Files\Mount\MountPoint;
use OC\Files\Storage\Common;
use OC\Files\Storage\Storage;
use OC\Files\Storage\Temporary;
use OC\Files\View;
use OCP\Files\FileInfo;
use OCP\Lock\ILockingProvider;
use OCP\Util;
use Symfony\Component\EventDispatcher\GenericEvent;
use Test\TestCase;
use Test\TestMoveableMountPoint;
use Test\HookHelper;
use OCP\Files\Config\IMountProvider;

class TemporaryNoTouch extends Temporary {
	public function touch($path, $mtime = null) {
		return false;
	}
}

class TemporaryNoCross extends Temporary {
	public function copyFromStorage(\OCP\Files\Storage $sourceStorage, $sourceInternalPath, $targetInternalPath, $preserveMtime = false) {
		return Common::copyFromStorage($sourceStorage, $sourceInternalPath, $targetInternalPath, $preserveMtime);
	}

	public function moveFromStorage(\OCP\Files\Storage $sourceStorage, $sourceInternalPath, $targetInternalPath) {
		return Common::moveFromStorage($sourceStorage, $sourceInternalPath, $targetInternalPath);
	}
}

class TemporaryNoLocal extends Temporary {
	public function instanceOfStorage($className) {
		if ($className === '\OC\Files\Storage\Local') {
			return false;
		}

		return parent::instanceOfStorage($className);
	}
}

/**
 * Class ViewTest
 *
 * @group DB
 *
 * @package Test\Files
 */
class ViewTest extends TestCase {
	public $shallThrow;
	/**
	 * @var Storage[] $storages
	 */
	private $storages = [];

	/**
	 * @var string
	 */
	private $user;

	/**
	 * @var \OCP\IUser
	 */
	private $userObject;

	/**
	 * @var \OCP\IGroup
	 */
	private $groupObject;

	/** @var Storage */
	private $tempStorage;

	/** @var \OC\AllConfig */
	private $config;

	protected function setUp(): void {
		parent::setUp();
		\OC_Hook::clear();

		//login
		$userManager = \OC::$server->getUserManager();
		$groupManager = \OC::$server->getGroupManager();
		$this->user = 'test';
		if ($userManager->userExists('test')) {
			$this->userObject = $userManager->get('test');
			$this->userObject->delete();
		}
		$this->userObject = $userManager->createUser('test', 'test');

		$this->groupObject = $groupManager->createGroup('group1');
		$this->groupObject->addUser($this->userObject);

		static::loginAsUser($this->user);

		// clear mounts but somehow keep the root storage
		// that was initialized above...
		Filesystem::clearMounts();

		$this->tempStorage = null;

		$this->config = $this->createMock(AllConfig::class);
	}

	protected function tearDown(): void {
		$this->restoreService('AllConfig');
		\OC_User::setUserId($this->user);
		foreach ($this->storages as $storage) {
			$cache = $storage->getCache();
			$cache->getAll();
			$cache->clear();
		}

		if ($this->tempStorage) {
			\system('rm -rf ' . \escapeshellarg($this->tempStorage->getDataDir()));
		}

		static::logout();

		if ($this->userObject !== null) {
			$this->userObject->delete();
		}
		if ($this->groupObject !== null) {
			$this->groupObject->delete();
		}

		$mountProviderCollection = \OC::$server->getMountProviderCollection();
		TestCase::invokePrivate($mountProviderCollection, 'providers', [[]]);

		\OC::$server->getLockingProvider()->releaseAll();
		parent::tearDown();
	}

	/**
	 * @medium
	 */
	public function testCacheAPI() {
		$storage1 = $this->getTestStorage();
		$storage2 = $this->getTestStorage();
		$storage3 = $this->getTestStorage();
		$root = static::getUniqueID('/');
		Filesystem::mount($storage1, [], $root . '/');
		Filesystem::mount($storage2, [], $root . '/substorage');
		Filesystem::mount($storage3, [], $root . '/folder/anotherstorage');
		$textSize = \strlen("dummy file data\n");
		$imageSize = \filesize(\OC::$SERVERROOT . '/core/img/logo.png');
		$storageSize = $textSize * 2 + $imageSize;

		$storageInfo = $storage3->getCache()->get('');
		$this->assertEquals($storageSize, $storageInfo['size']);

		$rootView = new View($root);

		$cachedData = $rootView->getFileInfo('/foo.txt');
		$this->assertEquals($textSize, $cachedData['size']);
		$this->assertEquals('text/plain', $cachedData['mimetype']);
		$this->assertNotEquals(-1, $cachedData['permissions']);

		$cachedData = $rootView->getFileInfo('/');
		$this->assertEquals($storageSize * 3, $cachedData['size']);
		$this->assertEquals('httpd/unix-directory', $cachedData['mimetype']);

		// get cached data excluding mount points
		$cachedData = $rootView->getFileInfo('/', false);
		$this->assertEquals($storageSize, $cachedData['size']);
		$this->assertEquals('httpd/unix-directory', $cachedData['mimetype']);

		$cachedData = $rootView->getFileInfo('/folder');
		$this->assertEquals($storageSize + $textSize, $cachedData['size']);
		$this->assertEquals('httpd/unix-directory', $cachedData['mimetype']);

		$folderData = $rootView->getDirectoryContent('/');
		/**
		 * expected entries:
		 * folder
		 * foo.png
		 * foo.txt
		 * substorage
		 */
		$this->assertCount(4, $folderData);
		$this->assertEquals('folder', $folderData[0]['name']);
		$this->assertEquals('foo.png', $folderData[1]['name']);
		$this->assertEquals('foo.txt', $folderData[2]['name']);
		$this->assertEquals('substorage', $folderData[3]['name']);

		$this->assertEquals($storageSize + $textSize, $folderData[0]['size']);
		$this->assertEquals($imageSize, $folderData[1]['size']);
		$this->assertEquals($textSize, $folderData[2]['size']);
		$this->assertEquals($storageSize, $folderData[3]['size']);

		$folderData = $rootView->getDirectoryContent('/substorage');
		/**
		 * expected entries:
		 * folder
		 * foo.png
		 * foo.txt
		 */
		$this->assertCount(3, $folderData);
		$this->assertEquals('folder', $folderData[0]['name']);
		$this->assertEquals('foo.png', $folderData[1]['name']);
		$this->assertEquals('foo.txt', $folderData[2]['name']);

		$folderView = new View($root . '/folder');
		$this->assertEquals($rootView->getFileInfo('/folder'), $folderView->getFileInfo('/'));

		$cachedData = $rootView->getFileInfo('/foo.txt');
		$this->assertFalse($cachedData['encrypted']);
		$id = $rootView->putFileInfo('/foo.txt', ['encrypted' => true]);
		$cachedData = $rootView->getFileInfo('/foo.txt');
		$this->assertTrue($cachedData['encrypted']);
		$this->assertEquals($cachedData['fileid'], $id);

		$this->assertFalse($rootView->getFileInfo('/non/existing'));
		$this->assertEquals([], $rootView->getDirectoryContent('/non/existing'));
	}

	/**
	 * @medium
	 */
	public function testGetPath() {
		$storage1 = $this->getTestStorage();
		$storage2 = $this->getTestStorage();
		$storage3 = $this->getTestStorage();
		Filesystem::mount($storage1, [], '/');
		Filesystem::mount($storage2, [], '/substorage');
		Filesystem::mount($storage3, [], '/folder/anotherstorage');

		$rootView = new View('');

		$cachedData = $rootView->getFileInfo('/foo.txt');
		/** @var int $id1 */
		$id1 = $cachedData['fileid'];
		$this->assertEquals('/foo.txt', $rootView->getPath($id1));

		$cachedData = $rootView->getFileInfo('/substorage/foo.txt');
		/** @var int $id2 */
		$id2 = $cachedData['fileid'];
		$this->assertEquals('/substorage/foo.txt', $rootView->getPath($id2));

		$folderView = new View('/substorage');
		$this->assertEquals('/foo.txt', $folderView->getPath($id2));
	}

	/**
	 */
	public function testGetPathNotExisting() {
		$this->expectException(\OCP\Files\NotFoundException::class);

		$storage1 = $this->getTestStorage();
		Filesystem::mount($storage1, [], '/');

		$rootView = new View('');
		$cachedData = $rootView->getFileInfo('/foo.txt');
		/** @var int $id1 */
		$id1 = $cachedData['fileid'];
		$folderView = new View('/substorage');
		$this->assertNull($folderView->getPath($id1));
	}

	/**
	 * @medium
	 */
	public function testMountPointOverwrite() {
		$storage1 = $this->getTestStorage(false);
		$storage2 = $this->getTestStorage();
		$storage1->mkdir('substorage');
		Filesystem::mount($storage1, [], '/');
		Filesystem::mount($storage2, [], '/substorage');

		$rootView = new View('');
		$folderContent = $rootView->getDirectoryContent('/');
		$this->assertCount(4, $folderContent);
	}

	public function sharingDisabledPermissionProvider() {
		return [
			['no', '', true],
			['yes', 'group1', false],
		];
	}

	/**
	 * @dataProvider sharingDisabledPermissionProvider
	 */
	public function testRemoveSharePermissionWhenSharingDisabledForUser($excludeGroups, $excludeGroupsList, $expectedShareable) {
		// Reset sharing disabled for users cache
		static::invokePrivate(\OC::$server->getShareManager(), 'sharingDisabledForUsersCache', [new CappedMemoryCache()]);

		$appConfig = \OC::$server->getAppConfig();
		$oldExcludeGroupsFlag = $appConfig->getValue('core', 'shareapi_exclude_groups', 'no');
		$oldExcludeGroupsList = $appConfig->getValue('core', 'shareapi_exclude_groups_list', '');
		$appConfig->setValue('core', 'shareapi_exclude_groups', $excludeGroups);
		$appConfig->setValue('core', 'shareapi_exclude_groups_list', $excludeGroupsList);

		$storage1 = $this->getTestStorage();
		$storage2 = $this->getTestStorage();
		Filesystem::mount($storage1, [], '/');
		Filesystem::mount($storage2, [], '/mount');

		$view = new View('/');

		$folderContent = $view->getDirectoryContent('');
		$this->assertEquals($expectedShareable, $folderContent[0]->isShareable());

		$folderContent = $view->getDirectoryContent('mount');
		$this->assertEquals($expectedShareable, $folderContent[0]->isShareable());

		$appConfig->setValue('core', 'shareapi_exclude_groups', $oldExcludeGroupsFlag);
		$appConfig->setValue('core', 'shareapi_exclude_groups_list', $oldExcludeGroupsList);

		// Reset sharing disabled for users cache
		static::invokePrivate(\OC::$server->getShareManager(), 'sharingDisabledForUsersCache', [new CappedMemoryCache()]);
	}

	public function testCacheIncompleteFolder() {
		$storage1 = $this->getTestStorage(false);
		Filesystem::clearMounts();
		Filesystem::mount($storage1, [], '/incomplete');
		$rootView = new View('/incomplete');

		$entries = $rootView->getDirectoryContent('/');
		$this->assertCount(3, $entries);

		// /folder will already be in the cache but not scanned
		$entries = $rootView->getDirectoryContent('/folder');
		$this->assertCount(1, $entries);
	}

	public function testAutoScan() {
		$storage1 = $this->getTestStorage(false);
		$storage2 = $this->getTestStorage(false);
		Filesystem::mount($storage1, [], '/');
		Filesystem::mount($storage2, [], '/substorage');
		$textSize = \strlen("dummy file data\n");

		$rootView = new View('');

		$cachedData = $rootView->getFileInfo('/');
		$this->assertEquals('httpd/unix-directory', $cachedData['mimetype']);
		// -2 = IScanner::SIZE_SHALLOW_SCANNED
		$this->assertEquals(-2, $cachedData['size']);

		$folderData = $rootView->getDirectoryContent('/substorage/folder');
		$this->assertEquals('text/plain', $folderData[0]['mimetype']);
		$this->assertEquals($textSize, $folderData[0]['size']);
	}

	/**
	 * @medium
	 */
	public function testSearch() {
		$storage1 = $this->getTestStorage();
		$storage2 = $this->getTestStorage();
		$storage3 = $this->getTestStorage();
		Filesystem::mount($storage1, [], '/');
		Filesystem::mount($storage2, [], '/substorage');
		Filesystem::mount($storage3, [], '/folder/anotherstorage');

		$rootView = new View('');

		$results = $rootView->search('foo');
		$this->assertCount(6, $results);
		$paths = [];
		foreach ($results as $result) {
			$this->assertEquals($result['path'], Filesystem::normalizePath($result['path']));
			$paths[] = $result['path'];
		}
		$this->assertContains('/foo.txt', $paths);
		$this->assertContains('/foo.png', $paths);
		$this->assertContains('/substorage/foo.txt', $paths);
		$this->assertContains('/substorage/foo.png', $paths);
		$this->assertContains('/folder/anotherstorage/foo.txt', $paths);
		$this->assertContains('/folder/anotherstorage/foo.png', $paths);

		$folderView = new View('/folder');
		$results = $folderView->search('bar');
		$this->assertCount(2, $results);
		$paths = [];
		foreach ($results as $result) {
			$paths[] = $result['path'];
		}
		$this->assertContains('/anotherstorage/folder/bar.txt', $paths);
		$this->assertContains('/bar.txt', $paths);

		$results = $folderView->search('foo');
		$this->assertCount(2, $results);
		$paths = [];
		foreach ($results as $result) {
			$paths[] = $result['path'];
		}
		$this->assertContains('/anotherstorage/foo.txt', $paths);
		$this->assertContains('/anotherstorage/foo.png', $paths);

		$this->assertCount(6, $rootView->searchByMime('text'));
		$this->assertCount(3, $folderView->searchByMime('text'));
	}

	/**
	 * @medium
	 */
	public function testWatcher() {
		$storage1 = $this->getTestStorage();
		Filesystem::mount($storage1, [], '/');
		$storage1->getWatcher()->setPolicy(Watcher::CHECK_ALWAYS);

		$rootView = new View('');

		$cachedData = $rootView->getFileInfo('foo.txt');
		$this->assertEquals(16, $cachedData['size']);

		$rootView->putFileInfo('foo.txt', ['storage_mtime' => 10]);
		$storage1->file_put_contents('foo.txt', 'foo');
		\clearstatcache();

		$cachedData = $rootView->getFileInfo('foo.txt');
		$this->assertEquals(3, $cachedData['size']);
	}

	/**
	 * @medium
	 */
	public function testCopyBetweenStorageNoCross() {
		$storage1 = $this->getTestStorage(true, TemporaryNoCross::class);
		$storage2 = $this->getTestStorage(true, TemporaryNoCross::class);
		$this->copyBetweenStorages($storage1, $storage2);
	}

	/**
	 * @medium
	 */
	public function testCopyBetweenStorageCross() {
		$storage1 = $this->getTestStorage();
		$storage2 = $this->getTestStorage();
		$this->copyBetweenStorages($storage1, $storage2);
	}

	/**
	 * @medium
	 */
	public function testCopyBetweenStorageCrossNonLocal() {
		$storage1 = $this->getTestStorage(true, TemporaryNoLocal::class);
		$storage2 = $this->getTestStorage(true, TemporaryNoLocal::class);
		$this->copyBetweenStorages($storage1, $storage2);
	}

	public function copyBetweenStorages($storage1, $storage2) {
		Filesystem::mount($storage1, [], '/');
		Filesystem::mount($storage2, [], '/substorage');

		$calledEvent = [];
		\OC::$server->getEventDispatcher()->addListener('file.aftercreate', function ($event) use (&$calledEvent) {
			$calledEvent[] = 'file.aftercreate';
			$calledEvent[] = $event;
		});

		$calledCopyEvent = [];
		\OC::$server->getEventDispatcher()->addListener('file.aftercopy', function (GenericEvent $event) use (&$calledCopyEvent) {
			$calledCopyEvent[] = 'file.aftercopy';
			$calledCopyEvent[] = $event;
		});
		$rootView = new View('');
		$rootView->mkdir('substorage/emptyfolder');
		// paths should not start or end in /
		$rootView->copy('substorage/', '/anotherfolder');
		$this->assertArrayHasKey('path', $calledEvent[1]);
		$this->assertEquals('file.aftercreate', $calledEvent[0]);
		$this->assertArrayHasKey('oldpath', $calledCopyEvent[1]);
		$this->assertArrayHasKey('newpath', $calledCopyEvent[1]);
		// mak sure paths in events have been normalized
		$this->assertEquals('file.aftercopy', $calledCopyEvent[0]);
		$this->assertSame('/substorage', $calledCopyEvent[1]['oldpath']);
		$this->assertSame('/anotherfolder', $calledCopyEvent[1]['newpath']);
		$this->assertTrue($rootView->is_dir('/anotherfolder'));
		$this->assertTrue($rootView->is_dir('/substorage'));
		$this->assertTrue($rootView->is_dir('/anotherfolder/emptyfolder'));
		$this->assertTrue($rootView->is_dir('/substorage/emptyfolder'));
		$this->assertTrue($rootView->file_exists('/anotherfolder/foo.txt'));
		$this->assertTrue($rootView->file_exists('/anotherfolder/foo.png'));
		$this->assertTrue($rootView->file_exists('/anotherfolder/folder/bar.txt'));
		$this->assertTrue($rootView->file_exists('/substorage/foo.txt'));
		$this->assertTrue($rootView->file_exists('/substorage/foo.png'));
		$this->assertTrue($rootView->file_exists('/substorage/folder/bar.txt'));
	}

	/**
	 * @medium
	 */
	public function testMoveBetweenStorageNoCross() {
		$storage1 = $this->getTestStorage(true, TemporaryNoCross::class);
		$storage2 = $this->getTestStorage(true, TemporaryNoCross::class);
		$this->moveBetweenStorages($storage1, $storage2);
	}

	/**
	 * @medium
	 */
	public function testMoveBetweenStorageCross() {
		$storage1 = $this->getTestStorage();
		$storage2 = $this->getTestStorage();
		$this->moveBetweenStorages($storage1, $storage2);
	}

	/**
	 * @medium
	 */
	public function testMoveBetweenStorageCrossNonLocal() {
		$storage1 = $this->getTestStorage(true, TemporaryNoLocal::class);
		$storage2 = $this->getTestStorage(true, TemporaryNoLocal::class);
		$this->moveBetweenStorages($storage1, $storage2);
	}

	public function moveBetweenStorages($storage1, $storage2) {
		Filesystem::mount($storage1, [], '/');
		Filesystem::mount($storage2, [], '/substorage');

		$rootView = new View('');
		$rootView->rename('foo.txt', 'substorage/folder/foo.txt');
		$this->assertFalse($rootView->file_exists('foo.txt'));
		$this->assertTrue($rootView->file_exists('substorage/folder/foo.txt'));
		$rootView->rename('substorage/folder', 'anotherfolder');
		$this->assertFalse($rootView->is_dir('substorage/folder'));
		$this->assertTrue($rootView->file_exists('anotherfolder/foo.txt'));
		$this->assertTrue($rootView->file_exists('anotherfolder/bar.txt'));
	}

	/**
	 * @medium
	 */
	public function testUnlink() {
		$storage1 = $this->getTestStorage();
		$storage2 = $this->getTestStorage();
		Filesystem::mount($storage1, [], '/');
		Filesystem::mount($storage2, [], '/substorage');

		$rootView = new View('');
		$rootView->file_put_contents('/foo.txt', 'asd');
		$rootView->file_put_contents('/substorage/bar.txt', 'asd');

		$this->assertTrue($rootView->file_exists('foo.txt'));
		$this->assertTrue($rootView->file_exists('substorage/bar.txt'));

		$this->assertTrue($rootView->unlink('foo.txt'));
		$this->assertTrue($rootView->unlink('substorage/bar.txt'));

		$this->assertFalse($rootView->file_exists('foo.txt'));
		$this->assertFalse($rootView->file_exists('substorage/bar.txt'));
	}

	public function rmdirOrUnlinkDataProvider() {
		return [['rmdir'], ['unlink']];
	}

	/**
	 * @dataProvider rmdirOrUnlinkDataProvider
	 */
	public function testRmdir($method) {
		$storage1 = $this->getTestStorage();
		$storage2 = $this->getTestStorage();
		Filesystem::mount($storage1, [], '/');

		$calledCreateEvent = [];
		\OC::$server->getEventDispatcher()->addListener('file.aftercreate', function ($event) use (&$calledCreateEvent) {
			$calledCreateEvent[] = 'file.aftercreate';
			$calledCreateEvent[] = $event;
		});

		$rootView = new View('');
		$rootView->mkdir('sub');
		$rootView->mkdir('sub/deep');
		$rootView->file_put_contents('/sub/deep/foo.txt', 'asd');

		$calledBeforeDeleteEvent = [];
		\OC::$server->getEventDispatcher()->addListener('file.beforedelete', function ($event) use (&$calledBeforeDeleteEvent) {
			$calledBeforeDeleteEvent[] = 'file.beforedelete';
			$calledBeforeDeleteEvent[] = $event;
		});
		$calledDeleteEvent = [];
		\OC::$server->getEventDispatcher()->addListener('file.afterdelete', function ($event) use (&$calledDeleteEvent) {
			$calledDeleteEvent[] = 'file.afterdelete';
			$calledDeleteEvent[] = $event;
		});

		$this->assertTrue($rootView->file_exists('sub/deep/foo.txt'));

		$this->assertTrue($rootView->$method('sub'));

		$this->assertInstanceOf(GenericEvent::class, $calledDeleteEvent[1]);
		$this->assertEquals('file.afterdelete', $calledDeleteEvent[0]);
		$this->assertArrayHasKey('path', $calledDeleteEvent[1]);
		$this->assertInstanceOf(GenericEvent::class, $calledBeforeDeleteEvent[1]);
		$this->assertEquals('file.beforedelete', $calledBeforeDeleteEvent[0]);
		$this->assertArrayHasKey('path', $calledBeforeDeleteEvent[1]);
		$this->assertArrayHasKey('path', $calledCreateEvent[1]);
		$this->assertInstanceOf(GenericEvent::class, $calledCreateEvent[1]);
		$this->assertEquals('file.aftercreate', $calledCreateEvent[0]);

		$this->assertFalse($rootView->file_exists('sub'));
	}

	/**
	 * @medium
	 */
	public function testUnlinkRootMustFail() {
		$storage1 = $this->getTestStorage();
		$storage2 = $this->getTestStorage();
		Filesystem::mount($storage1, [], '/');
		Filesystem::mount($storage2, [], '/substorage');

		$rootView = new View('');
		$rootView->file_put_contents('/foo.txt', 'asd');
		$rootView->file_put_contents('/substorage/bar.txt', 'asd');

		$this->assertFalse($rootView->unlink(''));
		$this->assertFalse($rootView->unlink('/'));
		$this->assertFalse($rootView->unlink('substorage'));
		$this->assertFalse($rootView->unlink('/substorage'));
	}

	/**
	 * @medium
	 */
	public function testTouch() {
		$storage = $this->getTestStorage(true, TemporaryNoTouch::class);

		Filesystem::mount($storage, [], '/');

		$rootView = new View('');
		$oldCachedData = $rootView->getFileInfo('foo.txt');

		$rootView->touch('foo.txt', 500);

		$cachedData = $rootView->getFileInfo('foo.txt');
		$this->assertEquals(500, $cachedData['mtime']);
		$this->assertEquals($oldCachedData['storage_mtime'], $cachedData['storage_mtime']);

		$rootView->putFileInfo('foo.txt', ['storage_mtime' => 1000]); //make sure the watcher detects the change
		$rootView->file_put_contents('foo.txt', 'asd');
		$cachedData = $rootView->getFileInfo('foo.txt');
		$this->assertGreaterThanOrEqual($oldCachedData['mtime'], $cachedData['mtime']);
		$this->assertEquals($cachedData['storage_mtime'], $cachedData['mtime']);
	}

	/**
	 * @medium
	 */
	public function testViewHooks() {
		$storage1 = $this->getTestStorage();
		$storage2 = $this->getTestStorage();
		$defaultRoot = Filesystem::getRoot();
		Filesystem::mount($storage1, [], '/');
		Filesystem::mount($storage2, [], $defaultRoot . '/substorage');
		\OC_Hook::connect('OC_Filesystem', 'post_write', $this, 'dummyHook');

		$rootView = new View('');
		$subView = new View($defaultRoot . '/substorage');
		$this->hookPath = null;

		$rootView->file_put_contents('/foo.txt', 'asd');
		$this->assertNull($this->hookPath);

		$subView->file_put_contents('/foo.txt', 'asd');
		$this->assertEquals('/substorage/foo.txt', $this->hookPath);
	}

	private $hookPath;

	public function dummyHook($params) {
		$this->hookPath = $params['path'];
	}

	public function testSearchNotOutsideView() {
		$storage1 = $this->getTestStorage();
		Filesystem::mount($storage1, [], '/');
		$storage1->rename('folder', 'foo');
		$scanner = $storage1->getScanner();
		$scanner->scan('');

		$view = new View('/foo');

		$result = $view->search('.txt');
		$this->assertCount(1, $result);
	}

	/**
	 * @param bool $scan
	 * @param string $class
	 * @return Storage
	 */
	private function getTestStorage($scan = true, $class = Temporary::class) {
		/**
		 * @var Storage $storage
		 */
		$storage = new $class([]);
		$textData = "dummy file data\n";
		$imgData = \file_get_contents(\OC::$SERVERROOT . '/core/img/logo.png');
		$storage->mkdir('folder');
		$storage->file_put_contents('foo.txt', $textData);
		$storage->file_put_contents('foo.png', $imgData);
		$storage->file_put_contents('folder/bar.txt', $textData);

		if ($scan) {
			$scanner = $storage->getScanner();
			$scanner->scan('');
		}
		$this->storages[] = $storage;
		return $storage;
	}

	/**
	 * @medium
	 */
	public function testViewHooksIfRootStartsTheSame() {
		$storage1 = $this->getTestStorage();
		$storage2 = $this->getTestStorage();
		$defaultRoot = Filesystem::getRoot();
		Filesystem::mount($storage1, [], '/');
		Filesystem::mount($storage2, [], $defaultRoot . '_substorage');
		\OC_Hook::connect('OC_Filesystem', 'post_write', $this, 'dummyHook');

		$subView = new View($defaultRoot . '_substorage');
		$this->hookPath = null;

		$subView->file_put_contents('/foo.txt', 'asd');
		$this->assertNull($this->hookPath);
	}

	private $hookWritePath;
	private $hookCreatePath;
	private $hookUpdatePath;

	public function dummyHookWrite($params) {
		$this->hookWritePath = $params['path'];
	}

	public function dummyHookUpdate($params) {
		$this->hookUpdatePath = $params['path'];
	}

	public function dummyHookCreate($params) {
		$this->hookCreatePath = $params['path'];
	}

	public function testEditNoCreateHook() {
		$storage1 = $this->getTestStorage();
		$storage2 = $this->getTestStorage();
		$defaultRoot = Filesystem::getRoot();
		Filesystem::mount($storage1, [], '/');
		Filesystem::mount($storage2, [], $defaultRoot);
		\OC_Hook::connect('OC_Filesystem', 'post_create', $this, 'dummyHookCreate');
		\OC_Hook::connect('OC_Filesystem', 'post_update', $this, 'dummyHookUpdate');
		\OC_Hook::connect('OC_Filesystem', 'post_write', $this, 'dummyHookWrite');

		$view = new View($defaultRoot);
		$this->hookWritePath = $this->hookUpdatePath = $this->hookCreatePath = null;

		$view->file_put_contents('/asd.txt', 'foo');
		$this->assertEquals('/asd.txt', $this->hookCreatePath);
		$this->assertNull($this->hookUpdatePath);
		$this->assertEquals('/asd.txt', $this->hookWritePath);

		$this->hookWritePath = $this->hookUpdatePath = $this->hookCreatePath = null;

		$view->file_put_contents('/asd.txt', 'foo');
		$this->assertNull($this->hookCreatePath);
		$this->assertEquals('/asd.txt', $this->hookUpdatePath);
		$this->assertEquals('/asd.txt', $this->hookWritePath);

		\OC_Hook::clear('OC_Filesystem', 'post_create');
		\OC_Hook::clear('OC_Filesystem', 'post_update');
		\OC_Hook::clear('OC_Filesystem', 'post_write');
	}

	/**
	 * @dataProvider resolvePathTestProvider
	 */
	public function testResolvePath($expected, $pathToTest) {
		$storage1 = $this->getTestStorage();
		Filesystem::mount($storage1, [], '/');

		$view = new View('');

		$result = $view->resolvePath($pathToTest);
		$this->assertEquals($expected, $result[1]);

		$exists = $view->file_exists($pathToTest);
		$this->assertTrue($exists);

		$exists = $view->file_exists($result[1]);
		$this->assertTrue($exists);
	}

	public function resolvePathTestProvider() {
		return [
			['foo.txt', 'foo.txt'],
			['foo.txt', '/foo.txt'],
			['folder', 'folder'],
			['folder', '/folder'],
			['folder', 'folder/'],
			['folder', '/folder/'],
			['folder/bar.txt', 'folder/bar.txt'],
			['folder/bar.txt', '/folder/bar.txt'],
			['', ''],
			['', '/'],
		];
	}

	public function testUTF8Names() {
		$names = ['虚', '和知しゃ和で', 'regular ascii', 'sɨˈrɪlɪk', 'ѨѬ', 'أنا أحب القراءة كثيرا'];

		$storage = new Temporary([]);
		Filesystem::mount($storage, [], '/');

		$rootView = new View('');
		foreach ($names as $name) {
			$rootView->file_put_contents('/' . $name, 'dummy content');
		}

		$list = $rootView->getDirectoryContent('/');

		$this->assertCount(\count($names), $list);
		foreach ($list as $item) {
			$this->assertContains($item['name'], $names);
		}

		$cache = $storage->getCache();
		$scanner = $storage->getScanner();
		$scanner->scan('');

		$list = $cache->getFolderContents('');

		$this->assertCount(\count($names), $list);
		foreach ($list as $item) {
			$this->assertContains($item['name'], $names);
		}
	}

	public function xtestLongPath() {
		$storage = new Temporary([]);
		Filesystem::mount($storage, [], '/');

		$rootView = new View('');

		$longPath = '';
		$ds = DIRECTORY_SEPARATOR;
		/*
		 * 4096 is the maximum path length in file_cache.path in *nix
		 */
		$folderName = 'abcdefghijklmnopqrstuvwxyz012345678901234567890123456789';
		$tmpdirLength = \strlen(\OC::$server->getTempManager()->getTemporaryFolder());
		$depth = ((4000 - $tmpdirLength) / 57);
		foreach (\range(0, $depth - 1) as $i) {
			$longPath .= $ds . $folderName;
			$result = $rootView->mkdir($longPath);
			$this->assertTrue($result, "mkdir failed on $i - path length: " . \strlen($longPath));

			$result = $rootView->file_put_contents($longPath . "{$ds}test.txt", 'lorem');
			$this->assertEquals(5, $result, "file_put_contents failed on $i");

			$this->assertTrue($rootView->file_exists($longPath));
			$this->assertTrue($rootView->file_exists($longPath . "{$ds}test.txt"));
		}

		$cache = $storage->getCache();
		$scanner = $storage->getScanner();
		$scanner->scan('');

		$longPath = $folderName;
		foreach (\range(0, $depth - 1) as $i) {
			$cachedFolder = $cache->get($longPath);
			$this->assertIsArray($cachedFolder, "No cache entry for folder at $i");
			$this->assertEquals($folderName, $cachedFolder['name'], "Wrong cache entry for folder at $i");

			$cachedFile = $cache->get($longPath . '/test.txt');
			$this->assertIsArray($cachedFile, "No cache entry for file at $i");
			$this->assertEquals('test.txt', $cachedFile['name'], "Wrong cache entry for file at $i");

			$longPath .= $ds . $folderName;
		}
	}

	public function testTouchNotSupported() {
		$storage = new TemporaryNoTouch([]);
		$scanner = $storage->getScanner();
		Filesystem::mount($storage, [], '/test/');
		$past = \time() - 100;
		$storage->file_put_contents('test', 'foobar');
		$scanner->scan('');
		$view = new View('');
		$info = $view->getFileInfo('/test/test');

		$view->touch('/test/test', $past);
		$scanner->scanFile('test', \OC\Files\Cache\Scanner::REUSE_ETAG);

		$info2 = $view->getFileInfo('/test/test');
		$this->assertSame($info['etag'], $info2['etag']);
	}

	public function testWatcherEtagCrossStorage() {
		$storage1 = new Temporary([]);
		$storage2 = new Temporary([]);
		$scanner1 = $storage1->getScanner();
		$scanner2 = $storage2->getScanner();
		$storage1->mkdir('sub');
		Filesystem::mount($storage1, [], '/test/');
		Filesystem::mount($storage2, [], '/test/sub/storage');

		$past = \time() - 100;
		$storage2->file_put_contents('test.txt', 'foobar');
		$scanner1->scan('');
		$scanner2->scan('');
		$view = new View('');

		$storage2->getWatcher('')->setPolicy(Watcher::CHECK_ALWAYS);

		$oldFileInfo = $view->getFileInfo('/test/sub/storage/test.txt');
		$oldFolderInfo = $view->getFileInfo('/test');

		$storage2->getCache()->update($oldFileInfo->getId(), [
			'storage_mtime' => $past
		]);

		$view->getFileInfo('/test/sub/storage/test.txt');
		$newFolderInfo = $view->getFileInfo('/test');

		$this->assertNotEquals($newFolderInfo->getEtag(), $oldFolderInfo->getEtag());
	}

	/**
	 * @dataProvider absolutePathProvider
	 */
	public function testGetAbsolutePath($expectedPath, $relativePath) {
		$view = new View('/files');
		$this->assertEquals($expectedPath, $view->getAbsolutePath($relativePath));
	}

	public function testPartFileInfo() {
		$storage = new Temporary([]);
		$scanner = $storage->getScanner();
		Filesystem::mount($storage, [], '/test/');
		$storage->file_put_contents('test.part', 'foobar');
		$scanner->scan('');
		$view = new View('/test');
		$info = $view->getFileInfo('test.part');

		$this->assertInstanceOf(FileInfo::class, $info);
		$this->assertNull($info->getId());
		$this->assertEquals(6, $info->getSize());
	}

	public function absolutePathProvider() {
		return [
			['/files/', ''],
			['/files/0', '0'],
			['/files/false', 'false'],
			['/files/true', 'true'],
			['/files/', '/'],
			['/files/test', 'test'],
			['/files/test', '/test'],
		];
	}

	/**
	 * @dataProvider chrootRelativePathProvider
	 */
	public function testChrootGetRelativePath($root, $absolutePath, $expectedPath) {
		$view = new View('/files');
		$view->chroot($root);
		$this->assertEquals($expectedPath, $view->getRelativePath($absolutePath));
	}

	public function chrootRelativePathProvider() {
		return $this->relativePathProvider('/');
	}

	/**
	 * @dataProvider initRelativePathProvider
	 */
	public function testInitGetRelativePath($root, $absolutePath, $expectedPath) {
		$view = new View($root);
		$this->assertEquals($expectedPath, $view->getRelativePath($absolutePath));
	}

	public function initRelativePathProvider() {
		return $this->relativePathProvider(null);
	}

	public function relativePathProvider($missingRootExpectedPath) {
		return [
			// No root - returns the path
			['', '/files', '/files'],
			['', '/files/', '/files/'],

			// Root equals path - /
			['/files/', '/files/', '/'],
			['/files/', '/files', '/'],
			['/files', '/files/', '/'],
			['/files', '/files', '/'],

			// False negatives: chroot fixes those by adding the leading slash.
			// But setting them up with this root (instead of chroot($root))
			// will fail them, although they should be the same.
			// TODO init should be fixed, so it also adds the leading slash
			['files/', '/files/', $missingRootExpectedPath],
			['files', '/files/', $missingRootExpectedPath],
			['files/', '/files', $missingRootExpectedPath],
			['files', '/files', $missingRootExpectedPath],

			// False negatives: Paths provided to the method should have a leading slash
			// TODO input should be checked to have a leading slash
			['/files/', 'files/', null],
			['/files', 'files/', null],
			['/files/', 'files', null],
			['/files', 'files', null],

			// with trailing slashes
			['/files/', '/files/0', '0'],
			['/files/', '/files/false', 'false'],
			['/files/', '/files/true', 'true'],
			['/files/', '/files/test', 'test'],
			['/files/', '/files/test/foo', 'test/foo'],

			// without trailing slashes
			// TODO false expectation: Should match "with trailing slashes"
			['/files', '/files/0', '/0'],
			['/files', '/files/false', '/false'],
			['/files', '/files/true', '/true'],
			['/files', '/files/test', '/test'],
			['/files', '/files/test/foo', '/test/foo'],

			// leading slashes
			['/files/', '/files_trashbin/', null],
			['/files', '/files_trashbin/', null],
			['/files/', '/files_trashbin', null],
			['/files', '/files_trashbin', null],

			// no leading slashes
			['files/', 'files_trashbin/', null],
			['files', 'files_trashbin/', null],
			['files/', 'files_trashbin', null],
			['files', 'files_trashbin', null],

			// mixed leading slashes
			['files/', '/files_trashbin/', null],
			['/files/', 'files_trashbin/', null],
			['files', '/files_trashbin/', null],
			['/files', 'files_trashbin/', null],
			['files/', '/files_trashbin', null],
			['/files/', 'files_trashbin', null],
			['files', '/files_trashbin', null],
			['/files', 'files_trashbin', null],

			['files', 'files_trashbin/test', null],
			['/files', '/files_trashbin/test', null],
			['/files', 'files_trashbin/test', null],
		];
	}

	public function testFileView() {
		$storage = new Temporary([]);
		$scanner = $storage->getScanner();
		$storage->file_put_contents('foo.txt', 'bar');
		Filesystem::mount($storage, [], '/test/');
		$scanner->scan('');
		$view = new View('/test/foo.txt');

		$this->assertEquals('bar', $view->file_get_contents(''));
		$fh = \tmpfile();
		\fwrite($fh, 'foo');
		\rewind($fh);
		$view->file_put_contents('', $fh);
		$this->assertEquals('foo', $view->file_get_contents(''));
	}

	/**
	 * @dataProvider tooLongPathDataProvider
	 */
	public function testTooLongPath($operation, $param0 = null) {
		$this->expectException(\OCP\Files\InvalidPathException::class);

		$longPath = '';
		// 4000 is the maximum path length in file_cache.path
		$folderName = 'abcdefghijklmnopqrstuvwxyz012345678901234567890123456789';
		$depth = (4000 / 57);
		foreach (\range(0, $depth + 1) as $i) {
			$longPath .= '/' . $folderName;
		}

		$storage = new Temporary([]);
		$this->tempStorage = $storage; // for later hard cleanup
		Filesystem::mount($storage, [], '/');

		$rootView = new View('');

		if ($param0 === '@0') {
			$param0 = $longPath;
		}

		if ($operation === 'hash') {
			$param0 = $longPath;
			$longPath = 'md5';
		}

		$rootView->$operation($longPath, $param0);
	}

	public function tooLongPathDataProvider() {
		return [
			['getAbsolutePath'],
			['getRelativePath'],
			['getMountPoint'],
			['resolvePath'],
			['getLocalFile'],
			['getLocalFolder'],
			['mkdir'],
			['rmdir'],
			['opendir'],
			['is_dir'],
			['is_file'],
			['stat'],
			['filetype'],
			['filesize'],
			['readfile'],
			['isCreatable'],
			['isReadable'],
			['isUpdatable'],
			['isDeletable'],
			['isSharable'],
			['file_exists'],
			['filemtime'],
			['touch'],
			['file_get_contents'],
			['unlink'],
			['deleteAll'],
			['toTmpFile'],
			['getMimeType'],
			['free_space'],
			['getFileInfo'],
			['getDirectoryContent'],
			['getOwner'],
			['getETag'],
			['file_put_contents', 'ipsum'],
			['rename', '@0'],
			['copy', '@0'],
			['fopen', 'r'],
			['fromTmpFile', '@0'],
			['hash'],
			['hasUpdated', 0],
			['putFileInfo', []],
		];
	}

	public function testRenameCrossStoragePreserveMtime() {
		$storage1 = new Temporary([]);
		$storage2 = new Temporary([]);
		$scanner1 = $storage1->getScanner();
		$scanner2 = $storage2->getScanner();
		$storage1->mkdir('sub');
		$storage1->mkdir('foo');
		$storage1->file_put_contents('foo.txt', 'asd');
		$storage1->file_put_contents('foo/bar.txt', 'asd');
		Filesystem::mount($storage1, [], '/test/');
		Filesystem::mount($storage2, [], '/test/sub/storage');

		$view = new View('');
		$time = \time() - 200;
		$view->touch('/test/foo.txt', $time);
		$view->touch('/test/foo', $time);
		$view->touch('/test/foo/bar.txt', $time);

		$calledEvent = [];
		\OC::$server->getEventDispatcher()->addListener('file.afterrename', function ($event) use (&$calledEvent) {
			$calledEvent[] = 'file.afterrename';
			$calledEvent[] = $event;
		});
		$view->rename('/test/foo.txt', '/test/sub/storage/foo.txt');

		$this->assertEquals($time, $view->filemtime('/test/sub/storage/foo.txt'));

		$this->assertEquals('file.afterrename', $calledEvent[0]);
		$this->assertInstanceOf(GenericEvent::class, $calledEvent[1]);
		$this->assertArrayHasKey('oldpath', $calledEvent[1]);
		$this->assertArrayHasKey('newpath', $calledEvent[1]);

		$view->rename('/test/foo', '/test/sub/storage/foo');

		$this->assertEquals($time, $view->filemtime('/test/sub/storage/foo/bar.txt'));
	}

	public function testRenameFailDeleteTargetKeepSource() {
		$this->doTestCopyRenameFail('rename');
	}

	public function testCopyFailDeleteTargetKeepSource() {
		$this->doTestCopyRenameFail('copy');
	}

	private function doTestCopyRenameFail($operation) {
		$storage1 = new Temporary([]);
		/** @var \PHPUnit\Framework\MockObject\MockObject | Temporary $storage2 */
		$storage2 = $this->getMockBuilder(TemporaryNoCross::class)
			->setConstructorArgs([[]])
			->setMethods(['fopen'])
			->getMock();

		$storage2->expects($this->any())
			->method('fopen')
			->will($this->returnCallback(function ($path, $mode) use ($storage2) {
				/** @var \PHPUnit\Framework\MockObject\MockObject | Temporary $storage2 */
				$source = \fopen($storage2->getSourcePath($path), $mode);
				return \OC\Files\Stream\Quota::wrap($source, 9);
			}));

		$storage1->mkdir('sub');
		$storage1->file_put_contents('foo.txt', '0123456789ABCDEFGH');
		$storage1->mkdir('dirtomove');
		$storage1->file_put_contents('dirtomove/indir1.txt', '0123456'); // fits
		$storage1->file_put_contents('dirtomove/indir2.txt', '0123456789ABCDEFGH'); // doesn't fit
		$storage2->file_put_contents('existing.txt', '0123');
		$storage1->getScanner()->scan('');
		$storage2->getScanner()->scan('');
		Filesystem::mount($storage1, [], '/test/');
		Filesystem::mount($storage2, [], '/test/sub/storage');

		// move file
		$view = new View('');
		$this->assertTrue($storage1->file_exists('foo.txt'));
		$this->assertFalse($storage2->file_exists('foo.txt'));
		$this->assertFalse($view->$operation('/test/foo.txt', '/test/sub/storage/foo.txt'));
		$this->assertFalse($storage2->file_exists('foo.txt'));
		$this->assertFalse($storage2->getCache()->get('foo.txt'));
		$this->assertTrue($storage1->file_exists('foo.txt'));

		// if target exists, it will be deleted too
		$this->assertFalse($view->$operation('/test/foo.txt', '/test/sub/storage/existing.txt'));
		$this->assertFalse($storage2->file_exists('existing.txt'));
		$this->assertFalse($storage2->getCache()->get('existing.txt'));
		$this->assertTrue($storage1->file_exists('foo.txt'));

		// move folder
		$this->assertFalse($view->$operation('/test/dirtomove/', '/test/sub/storage/dirtomove/'));
		// since the move failed, the full source tree is kept
		$this->assertTrue($storage1->file_exists('dirtomove/indir1.txt'));
		$this->assertTrue($storage1->file_exists('dirtomove/indir2.txt'));
		// second file not moved/copied
		$this->assertFalse($storage2->file_exists('dirtomove/indir2.txt'));
		$this->assertFalse($storage2->getCache()->get('dirtomove/indir2.txt'));
	}

	public function testDeleteFailKeepCache() {
		/**
		 * @var \PHPUnit\Framework\MockObject\MockObject | Temporary $storage
		 */
		$storage = $this->getMockBuilder(Temporary::class)
			->setConstructorArgs([[]])
			->setMethods(['unlink'])
			->getMock();
		$storage->expects($this->once())
			->method('unlink')
			->will($this->returnValue(false));
		$scanner = $storage->getScanner();
		$cache = $storage->getCache();
		$storage->file_put_contents('foo.txt', 'asd');
		$scanner->scan('');
		Filesystem::mount($storage, [], '/test/');

		$view = new View('/test');

		$this->assertFalse($view->unlink('foo.txt'));
		$this->assertTrue($cache->inCache('foo.txt'));
	}

	public function directoryTraversalProvider() {
		return [
			['../test/'],
			['..\\test\\my/../folder'],
			['/test/my/../foo\\'],
		];
	}

	/**
	 * @dataProvider directoryTraversalProvider
	 * @param string $root
	 */
	public function testConstructDirectoryTraversalException($root) {
		$this->expectException(\Exception::class);

		new View($root);
	}

	public function testRenameOverWrite() {
		$storage = new Temporary([]);
		$scanner = $storage->getScanner();
		$storage->mkdir('sub');
		$storage->mkdir('foo');
		$storage->file_put_contents('foo.txt', 'asd');
		$storage->file_put_contents('foo/bar.txt', 'asd');
		$scanner->scan('');
		Filesystem::mount($storage, [], '/test/');
		$view = new View('');
		\OC::$server->getConfig()->setAppValue('core', 'ignorepartfile', 'true');
		$this->assertTrue($view->rename('/test/foo.txt', '/test/foo/bar.txt'));
		\OC::$server->getConfig()->deleteAppValue('core', 'ignorepartfile');
	}

	public function testSetMountOptionsInStorage() {
		$mount = new MountPoint(Temporary::class, '/asd/', [[]], Filesystem::getLoader(), ['foo' => 'bar']);
		Filesystem::getMountManager()->addMount($mount);
		/** @var \OC\Files\Storage\Common $storage */
		$storage = $mount->getStorage();
		$this->assertEquals($storage->getMountOption('foo'), 'bar');
	}

	public function testSetMountOptionsWatcherPolicy() {
		$mount = new MountPoint(Temporary::class, '/asd/', [[]], Filesystem::getLoader(), ['filesystem_check_changes' => Watcher::CHECK_NEVER]);
		Filesystem::getMountManager()->addMount($mount);
		/** @var \OC\Files\Storage\Common $storage */
		$storage = $mount->getStorage();
		$watcher = $storage->getWatcher();
		$this->assertEquals(Watcher::CHECK_NEVER, $watcher->getPolicy());
	}

	public function testGetAbsolutePathOnNull() {
		$view = new View();
		$this->assertNull($view->getAbsolutePath(null));
	}

	public function testGetRelativePathOnNull() {
		$view = new View();
		$this->assertNull($view->getRelativePath(null));
	}

	/**
	 */
	public function testNullAsRoot() {
		$this->expectException(\InvalidArgumentException::class);

		new View(null);
	}

	/**
	 * e.g. reading from a folder that's being renamed
	 *
	 *
	 * @dataProvider dataLockPaths
	 *
	 * @param string $rootPath
	 * @param string $pathPrefix
	 */
	public function testReadFromWriteLockedPath($rootPath, $pathPrefix) {
		$this->expectException(\OCP\Lock\LockedException::class);

		$rootPath = \str_replace('{folder}', 'files', $rootPath);
		$pathPrefix = \str_replace('{folder}', 'files', $pathPrefix);

		$view = new View($rootPath);
		$storage = new Temporary([]);
		Filesystem::mount($storage, [], '/');
		$this->assertTrue($view->lockFile($pathPrefix . '/foo/bar', ILockingProvider::LOCK_EXCLUSIVE));
		$view->lockFile($pathPrefix . '/foo/bar/asd', ILockingProvider::LOCK_SHARED);
	}

	/**
	 * Reading from a files_encryption folder that's being renamed
	 *
	 * @dataProvider dataLockPaths
	 *
	 * @param string $rootPath
	 * @param string $pathPrefix
	 */
	public function testReadFromWriteUnlockablePath($rootPath, $pathPrefix) {
		$rootPath = \str_replace('{folder}', 'files_encryption', $rootPath);
		$pathPrefix = \str_replace('{folder}', 'files_encryption', $pathPrefix);

		$view = new View($rootPath);
		$storage = new Temporary([]);
		Filesystem::mount($storage, [], '/');
		$this->assertFalse($view->lockFile($pathPrefix . '/foo/bar', ILockingProvider::LOCK_EXCLUSIVE));
		$this->assertFalse($view->lockFile($pathPrefix . '/foo/bar/asd', ILockingProvider::LOCK_SHARED));
	}

	/**
	 * e.g. writing a file that's being downloaded
	 *
	 *
	 * @dataProvider dataLockPaths
	 *
	 * @param string $rootPath
	 * @param string $pathPrefix
	 */
	public function testWriteToReadLockedFile($rootPath, $pathPrefix) {
		$this->expectException(\OCP\Lock\LockedException::class);

		$rootPath = \str_replace('{folder}', 'files', $rootPath);
		$pathPrefix = \str_replace('{folder}', 'files', $pathPrefix);

		$view = new View($rootPath);
		$storage = new Temporary([]);
		Filesystem::mount($storage, [], '/');
		$this->assertTrue($view->lockFile($pathPrefix . '/foo/bar', ILockingProvider::LOCK_SHARED));
		$view->lockFile($pathPrefix . '/foo/bar', ILockingProvider::LOCK_EXCLUSIVE);
	}

	/**
	 * Writing a file that's being downloaded
	 *
	 * @dataProvider dataLockPaths
	 *
	 * @param string $rootPath
	 * @param string $pathPrefix
	 */
	public function testWriteToReadUnlockableFile($rootPath, $pathPrefix) {
		$rootPath = \str_replace('{folder}', 'files_encryption', $rootPath);
		$pathPrefix = \str_replace('{folder}', 'files_encryption', $pathPrefix);

		$view = new View($rootPath);
		$storage = new Temporary([]);
		Filesystem::mount($storage, [], '/');
		$this->assertFalse($view->lockFile($pathPrefix . '/foo/bar', ILockingProvider::LOCK_SHARED));
		$this->assertFalse($view->lockFile($pathPrefix . '/foo/bar', ILockingProvider::LOCK_EXCLUSIVE));
	}

	/**
	 * Test that locks are on mount point paths instead of mount root
	 */
	public function testLockLocalMountPointPathInsteadOfStorageRoot() {
		$lockingProvider = \OC::$server->getLockingProvider();
		$view = new View('/testuser/files/');
		$storage = new Temporary([]);
		Filesystem::mount($storage, [], '/');
		$mountedStorage = new Temporary([]);
		Filesystem::mount($mountedStorage, [], '/testuser/files/mountpoint');

		$this->assertTrue(
			$view->lockFile('/mountpoint', ILockingProvider::LOCK_EXCLUSIVE, true),
			'Can lock mount point'
		);

		// no exception here because storage root was not locked
		$mountedStorage->acquireLock('', ILockingProvider::LOCK_EXCLUSIVE, $lockingProvider);

		$thrown = false;
		try {
			$storage->acquireLock('/testuser/files/mountpoint', ILockingProvider::LOCK_EXCLUSIVE, $lockingProvider);
		} catch (\OCP\Lock\LockedException $e) {
			$thrown = true;
		}
		$this->assertTrue($thrown, 'Mount point path was locked on root storage');

		$lockingProvider->releaseAll();
	}

	/**
	 * Test that locks are on mount point paths and also mount root when requested
	 */
	public function testLockStorageRootButNotLocalMountPoint() {
		$lockingProvider = \OC::$server->getLockingProvider();
		$view = new View('/testuser/files/');
		$storage = new Temporary([]);
		Filesystem::mount($storage, [], '/');
		$mountedStorage = new Temporary([]);
		Filesystem::mount($mountedStorage, [], '/testuser/files/mountpoint');

		$this->assertTrue(
			$view->lockFile('/mountpoint', ILockingProvider::LOCK_EXCLUSIVE, false),
			'Can lock mount point'
		);

		$thrown = false;
		try {
			$mountedStorage->acquireLock('', ILockingProvider::LOCK_EXCLUSIVE, $lockingProvider);
		} catch (\OCP\Lock\LockedException $e) {
			$thrown = true;
		}
		$this->assertTrue($thrown, 'Mount point storage root was locked on original storage');

		// local mount point was not locked
		$storage->acquireLock('/testuser/files/mountpoint', ILockingProvider::LOCK_EXCLUSIVE, $lockingProvider);

		$lockingProvider->releaseAll();
	}

	/**
	 * Test that locks are on mount point paths and also mount root when requested
	 */
	public function testLockMountPointPathFailReleasesBoth() {
		$lockingProvider = \OC::$server->getLockingProvider();
		$view = new View('/testuser/files/');
		$storage = new Temporary([]);
		Filesystem::mount($storage, [], '/');
		$mountedStorage = new Temporary([]);
		Filesystem::mount($mountedStorage, [], '/testuser/files/mountpoint.txt');

		// this would happen if someone is writing on the mount point
		$mountedStorage->acquireLock('', ILockingProvider::LOCK_EXCLUSIVE, $lockingProvider);

		$thrown = false;
		try {
			// this actually acquires two locks, one on the mount point and one on the storage root,
			// but the one on the storage root will fail
			$view->lockFile('/mountpoint.txt', ILockingProvider::LOCK_SHARED);
		} catch (\OCP\Lock\LockedException $e) {
			$thrown = true;
		}
		$this->assertTrue($thrown, 'Cannot acquire shared lock because storage root is already locked');

		// from here we expect that the lock on the local mount point was released properly
		// so acquiring an exclusive lock will succeed
		$storage->acquireLock('/testuser/files/mountpoint.txt', ILockingProvider::LOCK_EXCLUSIVE, $lockingProvider);

		$lockingProvider->releaseAll();
	}

	public function dataLockPaths() {
		return [
			['/testuser/{folder}', ''],
			['/testuser', '/{folder}'],
			['', '/testuser/{folder}'],
		];
	}

	public function pathRelativeToFilesProvider() {
		return [
			['admin/files', ''],
			['admin/files/x', 'x'],
			['/admin/files', ''],
			['/admin/files/sub', 'sub'],
			['/admin/files/sub/', 'sub'],
			['/admin/files/sub/sub2', 'sub/sub2'],
			['//admin//files/sub//sub2', 'sub/sub2'],
		];
	}

	/**
	 * @dataProvider pathRelativeToFilesProvider
	 */
	public function testGetPathRelativeToFiles($path, $expectedPath) {
		$view = new View();
		$this->assertEquals($expectedPath, $view->getPathRelativeToFiles($path));
	}

	public function pathRelativeToFilesProviderExceptionCases() {
		return [
			[''],
			['x'],
			['files'],
			['/files'],
			['/admin/files_versions/abc'],
		];
	}

	/**
	 * @dataProvider pathRelativeToFilesProviderExceptionCases
	 */
	public function testGetPathRelativeToFilesWithInvalidArgument($path) {
		$this->expectException(\InvalidArgumentException::class);

		$view = new View();
		$view->getPathRelativeToFiles($path);
	}

	public function testChangeLock() {
		$view = new View('/testuser/files/');
		$storage = new Temporary([]);
		Filesystem::mount($storage, [], '/');

		$view->lockFile('/test/sub', ILockingProvider::LOCK_SHARED);
		$this->assertTrue($this->isFileLocked($view, '/test//sub', ILockingProvider::LOCK_SHARED));
		$this->assertFalse($this->isFileLocked($view, '/test//sub', ILockingProvider::LOCK_EXCLUSIVE));

		$view->changeLock('//test/sub', ILockingProvider::LOCK_EXCLUSIVE);
		$this->assertTrue($this->isFileLocked($view, '/test//sub', ILockingProvider::LOCK_EXCLUSIVE));

		$view->changeLock('test/sub', ILockingProvider::LOCK_SHARED);
		$this->assertTrue($this->isFileLocked($view, '/test//sub', ILockingProvider::LOCK_SHARED));

		$view->unlockFile('/test/sub/', ILockingProvider::LOCK_SHARED);

		$this->assertFalse($this->isFileLocked($view, '/test//sub', ILockingProvider::LOCK_SHARED));
		$this->assertFalse($this->isFileLocked($view, '/test//sub', ILockingProvider::LOCK_EXCLUSIVE));
	}

	public function hookPathProvider() {
		return [
			['/foo/files', '/foo', true],
			['/foo/files/bar', '/foo', true],
			['/foo', '/foo', false],
			['/foo', '/files/foo', true],
			['/foo', 'filesfoo', false],
			['', '/foo/files', true],
			['', '/foo/files/bar.txt', true]
		];
	}

	/**
	 * @dataProvider hookPathProvider
	 * @param $root
	 * @param $path
	 * @param $shouldEmit
	 */
	public function testHookPaths($root, $path, $shouldEmit) {
		$filesystemReflection = new \ReflectionClass(Filesystem::class);
		$defaultRootValue = $filesystemReflection->getProperty('defaultInstance');
		$defaultRootValue->setAccessible(true);
		$oldRoot = $defaultRootValue->getValue();
		$defaultView = new View('/foo/files');
		$defaultRootValue->setValue($defaultView);
		$view = new View($root);
		$result = static::invokePrivate($view, 'shouldEmitHooks', [$path]);
		$defaultRootValue->setValue($oldRoot);
		$this->assertEquals($shouldEmit, $result);
	}

	/**
	 * Create test movable mount points
	 *
	 * @param array $mountPoints array of mount point locations
	 * @param bool $isTargetAllowed value to return for the isTargetAllowed call
	 * @return array array of MountPoint objects
	 */
	private function createTestMovableMountPoints($mountPoints, $isTargetAllowed = true) {
		$mounts = [];
		foreach ($mountPoints as $mountPoint) {
			$storage = new Temporary();

			$testMount = $this->getMockBuilder(TestMoveableMountPoint::class)
				->setMethods(['moveMount', 'isTargetAllowed'])
				->setConstructorArgs([$storage, $mountPoint])
				->getMock();
			$testMount->expects($this->any())
				->method('isTargetAllowed')
				->will($this->returnValue($isTargetAllowed));
			$mounts[] = $testMount;
		}

		$mountProvider = $this->createMock(IMountProvider::class);
		$mountProvider->expects($this->any())
			->method('getMountsForUser')
			->will($this->returnValue($mounts));

		$mountProviderCollection = \OC::$server->getMountProviderCollection();
		$mountProviderCollection->registerProvider($mountProvider);

		return $mounts;
	}

	/**
	 * Test mount point move
	 */
	public function testMountPointMove() {
		static::loginAsUser($this->user);

		list($mount1, $mount2) = $this->createTestMovableMountPoints([
			$this->user . '/files/mount1',
			$this->user . '/files/mount2',
		]);
		$mount1->expects($this->once())
			->method('moveMount')
			->will($this->returnValue(true));

		$mount2->expects($this->once())
			->method('moveMount')
			->will($this->returnValue(true));

		$view = new View('/' . $this->user . '/files/');
		$view->mkdir('sub');

		$this->assertTrue($view->rename('mount1', 'renamed_mount'), 'Can rename mount point');
		$this->assertTrue($view->rename('mount2', 'sub/moved_mount'), 'Can move a mount point into a subdirectory');
	}

	/**
	 * Test that moving a mount point into another is forbidden
	 */
	public function testMoveMountPointIntoAnother() {
		static::loginAsUser($this->user);

		list($mount1, $mount2) = $this->createTestMovableMountPoints([
			$this->user . '/files/mount1',
			$this->user . '/files/mount2',
		]);

		$mount1->expects($this->never())
			->method('moveMount');

		$mount2->expects($this->never())
			->method('moveMount');

		$view = new View('/' . $this->user . '/files/');

		$this->assertFalse($view->rename('mount1', 'mount2'), 'Cannot overwrite another mount point');
		$this->assertFalse($view->rename('mount1', 'mount2/sub'), 'Cannot move a mount point into another');
	}

	/**
	 * Test that moving a mount point that says it's not allowed will fail
	 */
	public function testMoveMountPointNotAllowed() {
		static::loginAsUser($this->user);

		$userFolder = \OC::$server->getUserFolder($this->user);

		list($mount1) = $this->createTestMovableMountPoints([
			$this->user . '/files/mount1',
		], false);

		$mount1->expects($this->never())
			->method('moveMount');

		$view = new View('/' . $this->user . '/files/');
		$view->mkdir('somedir');

		$fileId = $view->getFileInfo('somedir')->getId();

		$this->assertFalse($view->rename('mount1', 'shareddir'), 'Cannot overwrite shared folder');
	}

	public function basicOperationProviderForLocks() {
		return [
			// --- write hook ----
//			[
//				'touch',
//				['touch-create.txt'],
//				'touch-create.txt',
//				'create',
//				ILockingProvider::LOCK_SHARED,
//				ILockingProvider::LOCK_EXCLUSIVE,
//				ILockingProvider::LOCK_SHARED,
//			],
			[
				'fopen',
				['test-write.txt', 'w'],
				'test-write.txt',
				'write',
				ILockingProvider::LOCK_SHARED,
				ILockingProvider::LOCK_EXCLUSIVE,
				null,
				// exclusive lock stays until fclose
				ILockingProvider::LOCK_EXCLUSIVE,
			],
//			[
//				'mkdir',
//				['newdir'],
//				'newdir',
//				'write',
//				ILockingProvider::LOCK_SHARED,
//				ILockingProvider::LOCK_EXCLUSIVE,
//				ILockingProvider::LOCK_SHARED,
//			],
//			[
//				'file_put_contents',
//				['file_put_contents.txt', 'blah'],
//				'file_put_contents.txt',
//				'write',
//				ILockingProvider::LOCK_SHARED,
//				ILockingProvider::LOCK_EXCLUSIVE,
//				ILockingProvider::LOCK_SHARED,
//			],

			// ---- delete hook ----
			[
				'rmdir',
				['dir'],
				'dir',
				'delete',
				ILockingProvider::LOCK_SHARED,
				ILockingProvider::LOCK_EXCLUSIVE,
				ILockingProvider::LOCK_SHARED,
			],
			[
				'unlink',
				['test.txt'],
				'test.txt',
				'delete',
				ILockingProvider::LOCK_SHARED,
				ILockingProvider::LOCK_EXCLUSIVE,
				ILockingProvider::LOCK_SHARED,
			],

			// ---- read hook (no post hooks) ----
			[
				'file_get_contents',
				['test.txt'],
				'test.txt',
				'read',
				ILockingProvider::LOCK_SHARED,
				ILockingProvider::LOCK_SHARED,
				null,
			],
			[
				'fopen',
				['test.txt', 'r'],
				'test.txt',
				'read',
				ILockingProvider::LOCK_SHARED,
				ILockingProvider::LOCK_SHARED,
				null,
				// shared lock stays until fclose
				ILockingProvider::LOCK_SHARED,
			],
			[
				'opendir',
				['dir'],
				'dir',
				'read',
				ILockingProvider::LOCK_SHARED,
				ILockingProvider::LOCK_SHARED,
				null,
			],

			// ---- no lock, touch hook ---
			['touch', ['test.txt'], 'test.txt', 'touch', null, null, null],

			// ---- no hooks, no locks ---
			['is_dir', ['dir'], 'dir', null],
			['is_file', ['dir'], 'dir', null],
			['stat', ['dir'], 'dir', null],
			['filetype', ['dir'], 'dir', null],
			['filesize', ['dir'], 'dir', null],
			['isCreatable', ['dir'], 'dir', null],
			['isReadable', ['dir'], 'dir', null],
			['isUpdatable', ['dir'], 'dir', null],
			['isDeletable', ['dir'], 'dir', null],
			['isSharable', ['dir'], 'dir', null],
			['file_exists', ['dir'], 'dir', null],
			['file_exists', ['test.txt'], 'test.txt', null],
			['filemtime', ['dir'], 'dir', null],
		];
	}

	/**
	 * Test whether locks are set before and after the operation
	 *
	 * @dataProvider basicOperationProviderForLocks
	 *
	 * @param string $operation operation name on the view
	 * @param array $operationArgs arguments for the operation
	 * @param string $lockedPath path of the locked item to check
	 * @param string $hookType hook type
	 * @param int $expectedLockBefore expected lock during pre hooks
	 * @param int $expectedLockDuring expected lock during operation
	 * @param int $expectedLockAfter expected lock during post hooks
	 * @param int $expectedStrayLock expected lock after returning, should
	 * be null (unlock) for most operations
	 */
	public function testLockBasicOperation(
		$operation,
		$operationArgs,
		$lockedPath,
		$hookType,
		$expectedLockBefore = ILockingProvider::LOCK_SHARED,
		$expectedLockDuring = ILockingProvider::LOCK_SHARED,
		$expectedLockAfter = ILockingProvider::LOCK_SHARED,
		$expectedStrayLock = null
	) {
		$view = new View('/' . $this->user . '/files/');

		/** @var Temporary | \PHPUnit\Framework\MockObject\MockObject $storage */
		$storage = $this->getMockBuilder(Temporary::class)
			->setMethods([$operation])
			->getMock();

		Filesystem::mount($storage, [], $this->user . '/');

		// work directly on disk because mkdir might be mocked
		$realPath = $storage->getSourcePath('');
		\mkdir($realPath . '/files');
		\mkdir($realPath . '/files/dir');
		\file_put_contents($realPath . '/files/test.txt', 'blah');

		$storage->expects($this->atLeastOnce())
			->method($operation)
			->will($this->returnCallback(
				function () use ($view, $lockedPath, &$lockTypeDuring, $operation) {
					$lockTypeDuring = $this->getFileLockType($view, $lockedPath);

					if ($operation === 'fopen') {
						return \fopen('data://text/plain,test', 'rb');
					}
					return true;
				}
			));

		$lp = \get_class(\OC::$server->getLockingProvider());
		$this->assertNull($this->getFileLockType($view, $lockedPath), "File not locked before operation ($lp)");

		$this->connectMockHooks($hookType, $view, $lockedPath, $lockTypePre, $lockTypePost);

		// do operation
		$result = \call_user_func_array([$view, $operation], $operationArgs);

		if ($hookType !== null) {
			$this->assertEquals($expectedLockBefore, $lockTypePre, 'File locked properly during pre-hook');
			$this->assertEquals($expectedLockAfter, $lockTypePost, 'File locked properly during post-hook');
			$this->assertEquals($expectedLockDuring, $lockTypeDuring, 'File locked properly during operation');
		} else {
			$this->assertNull($lockTypeDuring, 'File not locked during operation');
		}

		$this->assertEquals($expectedStrayLock, $this->getFileLockType($view, $lockedPath));

		if (\is_resource($result)) {
			\fclose($result);

			// lock is cleared after fclose
			$this->assertNull($this->getFileLockType($view, $lockedPath));
		}
	}

	public function testPutWithRun() {
		$view = new View('/' . $this->user . '/files/');

		$path = 'test_file_put_contents.txt';
		/** @var Temporary | \PHPUnit\Framework\MockObject\MockObject $storage */
		$storage = $this->getMockBuilder(Temporary::class)
			->setMethods(['fopen'])
			->getMock();

		Filesystem::mount($storage, [], $this->user . '/');
		$storage->mkdir('files');

		$this->connectMockHooks('write', $view, $path, $lockTypePre, $lockTypePost);

		$calledCreateAllowedRun = [];
		\OC::$server->getEventDispatcher()->addListener('file.beforeCreate', function (GenericEvent $event) use (&$calledCreateAllowedRun) {
			$calledCreateAllowedRun[] = 'file.beforeCreate';
			$event->setArgument('run', false);
			$calledCreateAllowedRun[] = $event;
		});

		// do operation
		$view->file_put_contents($path, \fopen('php://temp1', 'r+'));
		$this->assertEquals('file.beforeCreate', $calledCreateAllowedRun[0]);
		$this->assertInstanceOf(GenericEvent::class, $calledCreateAllowedRun[1]);
		$this->assertFalse($calledCreateAllowedRun[1]->getArgument('run'));
	}

	/**
	 * Test locks for file_put_content with stream.
	 * This code path uses $storage->fopen instead
	 */
	public function testLockFilePutContentWithStream() {
		$view = new View('/' . $this->user . '/files/');

		$path = 'test_file_put_contents.txt';
		/** @var Temporary | \PHPUnit\Framework\MockObject\MockObject $storage */
		$storage = $this->getMockBuilder(Temporary::class)
			->setMethods(['fopen'])
			->getMock();

		Filesystem::mount($storage, [], $this->user . '/');
		$storage->mkdir('files');

		$storage->expects($this->once())
			->method('fopen')
			->will($this->returnCallback(
				function () use ($view, $path, &$lockTypeDuring) {
					$lockTypeDuring = $this->getFileLockType($view, $path);

					return \fopen('php://temp', 'r+');
				}
			));

		$this->connectMockHooks('write', $view, $path, $lockTypePre, $lockTypePost);

		$this->assertNull($this->getFileLockType($view, $path), 'File not locked before operation');

		$calledCreateAllowedRun = [];
		$calledWriteAllowedRun = [];
		\OC::$server->getEventDispatcher()->addListener('file.beforeCreate', function (GenericEvent $event) use (&$calledCreateAllowedRun) {
			$calledCreateAllowedRun[] = 'file.beforeCreate';
			$event->setArgument('run', true);
			$calledCreateAllowedRun[] = $event;
		});
		\OC::$server->getEventDispatcher()->addListener('file.beforeWrite', function (GenericEvent $event) use (&$calledWriteAllowedRun) {
			$calledWriteAllowedRun[] = 'file.beforeWrite';
			$event->setArgument('run', true);
			$calledWriteAllowedRun[] = $event;
		});

		// do operation
		$view->file_put_contents($path, \fopen('php://temp', 'r+'));

		$this->assertEquals(ILockingProvider::LOCK_SHARED, $lockTypePre, 'File locked properly during pre-hook');
		$this->assertEquals(ILockingProvider::LOCK_SHARED, $lockTypePost, 'File locked properly during post-hook');
		$this->assertEquals(ILockingProvider::LOCK_EXCLUSIVE, $lockTypeDuring, 'File locked properly during operation');

		$this->assertInstanceOf(GenericEvent::class, $calledCreateAllowedRun[1]);
		$this->assertInstanceOf(GenericEvent::class, $calledWriteAllowedRun[1]);
		$this->assertArrayHasKey('run', $calledCreateAllowedRun[1]);
		$this->assertArrayHasKey('run', $calledWriteAllowedRun[1]);
		$this->assertEquals('file.beforeWrite', $calledWriteAllowedRun[0]);
		$this->assertEquals('file.beforeCreate', $calledCreateAllowedRun[0]);

		$this->assertNull($this->getFileLockType($view, $path));
	}

	/**
	 * Test locks for fopen with fclose at the end
	 */
	public function testLockFopen() {
		$view = new View('/' . $this->user . '/files/');

		$path = 'test_file_put_contents.txt';
		/** @var Temporary | \PHPUnit\Framework\MockObject\MockObject $storage */
		$storage = $this->getMockBuilder(Temporary::class)
			->setMethods(['fopen'])
			->getMock();

		Filesystem::mount($storage, [], $this->user . '/');
		$storage->mkdir('files');

		$storage->expects($this->once())
			->method('fopen')
			->will($this->returnCallback(
				function () use ($view, $path, &$lockTypeDuring) {
					$lockTypeDuring = $this->getFileLockType($view, $path);

					return \fopen('php://temp', 'r+');
				}
			));

		$this->connectMockHooks('write', $view, $path, $lockTypePre, $lockTypePost);

		$this->assertNull($this->getFileLockType($view, $path), 'File not locked before operation');

		// do operation
		$res = $view->fopen($path, 'w');

		$this->assertEquals(ILockingProvider::LOCK_SHARED, $lockTypePre, 'File locked properly during pre-hook');
		$this->assertEquals(ILockingProvider::LOCK_EXCLUSIVE, $lockTypeDuring, 'File locked properly during operation');
		$this->assertNull($lockTypePost, 'No post hook, no lock check possible');

		$this->assertEquals(ILockingProvider::LOCK_EXCLUSIVE, $lockTypeDuring, 'File still locked after fopen');

		\fclose($res);

		$this->assertNull($this->getFileLockType($view, $path), 'File unlocked after fclose');
	}

	/**
	 * Test locks for fopen with fclose at the end
	 *
	 * @dataProvider basicOperationProviderForLocks
	 *
	 * @param string $operation operation name on the view
	 * @param array $operationArgs arguments for the operation
	 * @param string $path path of the locked item to check
	 */
	public function testLockBasicOperationUnlocksAfterException(
		$operation,
		$operationArgs,
		$path
	) {
		$view = new View('/' . $this->user . '/files/');

		/** @var Temporary | \PHPUnit\Framework\MockObject\MockObject $storage */
		$storage = $this->getMockBuilder(Temporary::class)
			->setMethods([$operation, 'getEtag'])
			->getMock();

		Filesystem::mount($storage, [], $this->user . '/');

		// work directly on disk because mkdir might be mocked
		$realPath = $storage->getSourcePath('');
		\mkdir($realPath . '/files');
		\mkdir($realPath . '/files/dir');
		\file_put_contents($realPath . '/files/test.txt', 'blah');

		$this->shallThrow = false;
		$storage->method('getETag')
			->willReturn('abcd');
		$storage
			->method($operation)
			->willReturnCallback(function ($path) {
				if ($this->shallThrow) {
					throw new \Exception('Simulated exception');
				}
				return $path === 'files/test.txt';
			});

		$storage->getScanner()->scan('files');

		$this->shallThrow = true;
		try {
			\call_user_func_array([$view, $operation], $operationArgs);
		} catch (\Exception $e) {
			$thrown = true;
			$this->assertEquals('Simulated exception', $e->getMessage());
		}
		$this->assertTrue($thrown, 'Exception was rethrown');
		$this->assertNull($this->getFileLockType($view, $path), 'File was not unlocked after exception');
	}

	/**
	 * Test locks for fopen with fclose at the end
	 *
	 * @dataProvider basicOperationProviderForLocks
	 *
	 * @param string $operation operation name on the view
	 * @param array $operationArgs arguments for the operation
	 * @param string $path path of the locked item to check
	 * @param string $hookType hook type
	 */
	public function testLockBasicOperationUnlocksAfterCancelledHook(
		$operation,
		$operationArgs,
		$path,
		$hookType
	) {
		$view = new View('/' . $this->user . '/files/');

		/** @var Temporary | \PHPUnit\Framework\MockObject\MockObject $storage */
		$storage = $this->getMockBuilder(Temporary::class)
			->setMethods([$operation])
			->getMock();

		Filesystem::mount($storage, [], $this->user . '/');
		$storage->mkdir('files');

		Util::connectHook(
			Filesystem::CLASSNAME,
			$hookType,
			HookHelper::class,
			'cancellingCallback'
		);

		\call_user_func_array([$view, $operation], $operationArgs);

		$this->assertNull($this->getFileLockType($view, $path), 'File got unlocked after exception');
	}

	public function lockFileRenameOrCopyDataProvider() {
		return [
			['rename', ILockingProvider::LOCK_EXCLUSIVE],
			['copy', ILockingProvider::LOCK_SHARED],
		];
	}

	/**
	 * Test locks for rename or copy operation
	 *
	 * @dataProvider lockFileRenameOrCopyDataProvider
	 *
	 * @param string $operation operation to be done on the view
	 * @param int $expectedLockTypeSourceDuring expected lock type on source file during
	 * the operation
	 */
	public function testLockFileRename($operation, $expectedLockTypeSourceDuring) {
		$view = new View('/' . $this->user . '/files/');

		/** @var Temporary | \PHPUnit\Framework\MockObject\MockObject $storage */
		$storage = $this->getMockBuilder(Temporary::class)
			->setMethods([$operation, 'filemtime'])
			->getMock();

		$storage->expects($this->any())
			->method('filemtime')
			->will($this->returnValue(123456789));

		$sourcePath = 'original.txt';
		$targetPath = 'target.txt';

		Filesystem::mount($storage, [], $this->user . '/');
		$storage->mkdir('files');
		$view->file_put_contents($sourcePath, 'meh');

		$storage->expects($this->once())
			->method($operation)
			->will($this->returnCallback(
				function () use ($view, $sourcePath, $targetPath, &$lockTypeSourceDuring, &$lockTypeTargetDuring) {
					$lockTypeSourceDuring = $this->getFileLockType($view, $sourcePath);
					$lockTypeTargetDuring = $this->getFileLockType($view, $targetPath);

					return true;
				}
			));

		$this->connectMockHooks($operation, $view, $sourcePath, $lockTypeSourcePre, $lockTypeSourcePost);
		$this->connectMockHooks($operation, $view, $targetPath, $lockTypeTargetPre, $lockTypeTargetPost);

		$this->assertNull($this->getFileLockType($view, $sourcePath), 'Source file not locked before operation');
		$this->assertNull($this->getFileLockType($view, $targetPath), 'Target file not locked before operation');

		$view->$operation($sourcePath, $targetPath);

		$this->assertEquals(ILockingProvider::LOCK_SHARED, $lockTypeSourcePre, 'Source file locked properly during pre-hook');
		$this->assertEquals($expectedLockTypeSourceDuring, $lockTypeSourceDuring, 'Source file locked properly during operation');
		$this->assertEquals(ILockingProvider::LOCK_SHARED, $lockTypeSourcePost, 'Source file locked properly during post-hook');

		$this->assertEquals(ILockingProvider::LOCK_SHARED, $lockTypeTargetPre, 'Target file locked properly during pre-hook');
		$this->assertEquals(ILockingProvider::LOCK_EXCLUSIVE, $lockTypeTargetDuring, 'Target file locked properly during operation');
		$this->assertEquals(ILockingProvider::LOCK_SHARED, $lockTypeTargetPost, 'Target file locked properly during post-hook');

		$this->assertNull($this->getFileLockType($view, $sourcePath), 'Source file not locked after operation');
		$this->assertNull($this->getFileLockType($view, $targetPath), 'Target file not locked after operation');
	}

	/**
	 * simulate a failed copy operation.
	 * We expect that we catch the exception, free the lock and re-throw it.
	 *
	 */
	public function testLockFileCopyException() {
		$this->expectException(\Exception::class);

		$view = new View('/' . $this->user . '/files/');

		/** @var Temporary | \PHPUnit\Framework\MockObject\MockObject $storage */
		$storage = $this->getMockBuilder(Temporary::class)
			->setMethods(['copy'])
			->getMock();

		$sourcePath = 'original.txt';
		$targetPath = 'target.txt';

		Filesystem::mount($storage, [], $this->user . '/');
		$storage->mkdir('files');
		$view->file_put_contents($sourcePath, 'meh');

		$storage->expects($this->once())
			->method('copy')
			->will($this->returnCallback(
				function () {
					throw new \Exception();
				}
			));

		$this->connectMockHooks('copy', $view, $sourcePath, $lockTypeSourcePre, $lockTypeSourcePost);
		$this->connectMockHooks('copy', $view, $targetPath, $lockTypeTargetPre, $lockTypeTargetPost);

		$this->assertNull($this->getFileLockType($view, $sourcePath), 'Source file not locked before operation');
		$this->assertNull($this->getFileLockType($view, $targetPath), 'Target file not locked before operation');

		try {
			$view->copy($sourcePath, $targetPath);
		} catch (\Exception $e) {
			$this->assertNull($this->getFileLockType($view, $sourcePath), 'Source file not locked after operation');
			$this->assertNull($this->getFileLockType($view, $targetPath), 'Target file not locked after operation');
			throw $e;
		}
	}

	/**
	 * Test rename operation: unlock first path when second path was locked
	 */
	public function testLockFileRenameUnlockOnException() {
		static::loginAsUser('test');

		$view = new View('/' . $this->user . '/files/');

		$sourcePath = 'original.txt';
		$targetPath = 'target.txt';
		$view->file_put_contents($sourcePath, 'meh');

		// simulate that the target path is already locked
		$view->lockFile($targetPath, ILockingProvider::LOCK_EXCLUSIVE);

		$this->assertNull($this->getFileLockType($view, $sourcePath), 'Source file not locked before operation');
		$this->assertEquals(ILockingProvider::LOCK_EXCLUSIVE, $this->getFileLockType($view, $targetPath), 'Target file is locked before operation');

		$thrown = false;
		try {
			$view->rename($sourcePath, $targetPath);
		} catch (\OCP\Lock\LockedException $e) {
			$thrown = true;
		}

		$this->assertTrue($thrown, 'LockedException thrown');

		$this->assertNull($this->getFileLockType($view, $sourcePath), 'Source file not locked after operation');
		$this->assertEquals(ILockingProvider::LOCK_EXCLUSIVE, $this->getFileLockType($view, $targetPath), 'Target file still locked after operation');

		$view->unlockFile($targetPath, ILockingProvider::LOCK_EXCLUSIVE);
	}

	/**
	 * Test rename operation: unlock first path when second path was locked
	 */
	public function testGetOwner() {
		static::loginAsUser('test');

		$view = new View('/test/files/');

		$path = 'foo.txt';
		$view->file_put_contents($path, 'meh');

		$this->assertEquals('test', $view->getFileInfo($path)->getOwner()->getUID());

		$folderInfo = $view->getDirectoryContent('');
		$folderInfo = \array_values(\array_filter($folderInfo, function (FileInfo $info) {
			return $info->getName() === 'foo.txt';
		}));

		$this->assertEquals('test', $folderInfo[0]->getOwner()->getUID());

		$subStorage = new Temporary();
		Filesystem::mount($subStorage, [], '/test/files/asd');

		$folderInfo = $view->getDirectoryContent('');
		$folderInfo = \array_values(\array_filter($folderInfo, function (FileInfo $info) {
			return $info->getName() === 'asd';
		}));

		$this->assertEquals('test', $folderInfo[0]->getOwner()->getUID());
	}

	public function lockFileRenameOrCopyCrossStorageDataProvider() {
		return [
			['rename', 'moveFromStorage', ILockingProvider::LOCK_EXCLUSIVE],
			['copy', 'copyFromStorage', ILockingProvider::LOCK_SHARED],
		];
	}

	/**
	 * Test locks for rename or copy operation cross-storage
	 *
	 * @dataProvider lockFileRenameOrCopyCrossStorageDataProvider
	 *
	 * @param string $viewOperation operation to be done on the view
	 * @param string $storageOperation operation to be mocked on the storage
	 * @param int $expectedLockTypeSourceDuring expected lock type on source file during
	 * the operation
	 */
	public function testLockFileRenameCrossStorage($viewOperation, $storageOperation, $expectedLockTypeSourceDuring) {
		$view = new View('/' . $this->user . '/files/');

		/** @var Temporary | \PHPUnit\Framework\MockObject\MockObject $storage */
		$storage = $this->getMockBuilder(Temporary::class)
			->setMethods([$storageOperation])
			->getMock();
		/** @var Temporary | \PHPUnit\Framework\MockObject\MockObject $storage2 */
		$storage2 = $this->getMockBuilder(Temporary::class)
			->setMethods([$storageOperation, 'filemtime'])
			->getMock();

		$storage2->expects($this->any())
			->method('filemtime')
			->will($this->returnValue(123456789));

		$sourcePath = 'original.txt';
		$targetPath = 'substorage/target.txt';

		Filesystem::mount($storage, [], $this->user . '/');
		Filesystem::mount($storage2, [], $this->user . '/files/substorage');
		$storage->mkdir('files');
		$view->file_put_contents($sourcePath, 'meh');

		$storage->expects($this->never())
			->method($storageOperation);
		$storage2->expects($this->once())
			->method($storageOperation)
			->will($this->returnCallback(
				function () use ($view, $sourcePath, $targetPath, &$lockTypeSourceDuring, &$lockTypeTargetDuring) {
					$lockTypeSourceDuring = $this->getFileLockType($view, $sourcePath);
					$lockTypeTargetDuring = $this->getFileLockType($view, $targetPath);

					return true;
				}
			));

		$this->connectMockHooks($viewOperation, $view, $sourcePath, $lockTypeSourcePre, $lockTypeSourcePost);
		$this->connectMockHooks($viewOperation, $view, $targetPath, $lockTypeTargetPre, $lockTypeTargetPost);

		$this->assertNull($this->getFileLockType($view, $sourcePath), 'Source file not locked before operation');
		$this->assertNull($this->getFileLockType($view, $targetPath), 'Target file not locked before operation');

		$view->$viewOperation($sourcePath, $targetPath);

		$this->assertEquals(ILockingProvider::LOCK_SHARED, $lockTypeSourcePre, 'Source file locked properly during pre-hook');
		$this->assertEquals($expectedLockTypeSourceDuring, $lockTypeSourceDuring, 'Source file locked properly during operation');
		$this->assertEquals(ILockingProvider::LOCK_SHARED, $lockTypeSourcePost, 'Source file locked properly during post-hook');

		$this->assertEquals(ILockingProvider::LOCK_SHARED, $lockTypeTargetPre, 'Target file locked properly during pre-hook');
		$this->assertEquals(ILockingProvider::LOCK_EXCLUSIVE, $lockTypeTargetDuring, 'Target file locked properly during operation');
		$this->assertEquals(ILockingProvider::LOCK_SHARED, $lockTypeTargetPost, 'Target file locked properly during post-hook');

		$this->assertNull($this->getFileLockType($view, $sourcePath), 'Source file not locked after operation');
		$this->assertNull($this->getFileLockType($view, $targetPath), 'Target file not locked after operation');
	}

	/**
	 * Test locks when moving a mount point
	 */
	public function testLockMoveMountPoint() {
		static::loginAsUser('test');

		list($mount) = $this->createTestMovableMountPoints([
			$this->user . '/files/substorage',
		]);

		$view = new View('/' . $this->user . '/files/');
		$view->mkdir('subdir');

		$sourcePath = 'substorage';
		$targetPath = 'subdir/substorage_moved';

		$mount->expects($this->once())
			->method('moveMount')
			->will($this->returnCallback(
				function ($target) use ($mount, $view, $sourcePath, $targetPath, &$lockTypeSourceDuring, &$lockTypeTargetDuring, &$lockTypeSharedRootDuring) {
					$lockTypeSourceDuring = $this->getFileLockType($view, $sourcePath, true);
					$lockTypeTargetDuring = $this->getFileLockType($view, $targetPath, true);

					$lockTypeSharedRootDuring = $this->getFileLockType($view, $sourcePath, false);

					$mount->setMountPoint($target);

					return true;
				}
			));

		$this->connectMockHooks('rename', $view, $sourcePath, $lockTypeSourcePre, $lockTypeSourcePost, true);
		$this->connectMockHooks('rename', $view, $targetPath, $lockTypeTargetPre, $lockTypeTargetPost, true);
		// in pre-hook, mount point is still on $sourcePath
		$this->connectMockHooks('rename', $view, $sourcePath, $lockTypeSharedRootPre, $dummy, false);
		// in post-hook, mount point is now on $targetPath
		$this->connectMockHooks('rename', $view, $targetPath, $dummy, $lockTypeSharedRootPost, false);

		$this->assertNull($this->getFileLockType($view, $sourcePath, false), 'Shared storage root not locked before operation');
		$this->assertNull($this->getFileLockType($view, $sourcePath, true), 'Source path not locked before operation');
		$this->assertNull($this->getFileLockType($view, $targetPath, true), 'Target path not locked before operation');

		$calledRenameEvent = [];
		\OC::$server->getEventDispatcher()->addListener('file.afterrename', function ($event) use (&$calledRenameEvent) {
			$calledRenameEvent[] = 'file.afterrename';
			$calledRenameEvent[] = $event;
		});

		$view->rename($sourcePath, $targetPath);
		$this->assertArrayHasKey('oldpath', $calledRenameEvent[1]);
		$this->assertArrayHasKey('newpath', $calledRenameEvent[1]);
		$this->assertEquals('file.afterrename', $calledRenameEvent[0]);

		$this->assertEquals(ILockingProvider::LOCK_SHARED, $lockTypeSourcePre, 'Source path locked properly during pre-hook');
		$this->assertEquals(ILockingProvider::LOCK_EXCLUSIVE, $lockTypeSourceDuring, 'Source path locked properly during operation');
		$this->assertEquals(ILockingProvider::LOCK_SHARED, $lockTypeSourcePost, 'Source path locked properly during post-hook');

		$this->assertEquals(ILockingProvider::LOCK_SHARED, $lockTypeTargetPre, 'Target path locked properly during pre-hook');
		$this->assertEquals(ILockingProvider::LOCK_EXCLUSIVE, $lockTypeTargetDuring, 'Target path locked properly during operation');
		$this->assertEquals(ILockingProvider::LOCK_SHARED, $lockTypeTargetPost, 'Target path locked properly during post-hook');

		$this->assertNull($lockTypeSharedRootPre, 'Shared storage root not locked during pre-hook');
		$this->assertNull($lockTypeSharedRootDuring, 'Shared storage root not locked during move');
		$this->assertNull($lockTypeSharedRootPost, 'Shared storage root not locked during post-hook');

		$this->assertNull($this->getFileLockType($view, $sourcePath, false), 'Shared storage root not locked after operation');
		$this->assertNull($this->getFileLockType($view, $sourcePath, true), 'Source path not locked after operation');
		$this->assertNull($this->getFileLockType($view, $targetPath, true), 'Target path not locked after operation');
	}

	/**
	 * Connect hook callbacks for hook type
	 *
	 * @param string $hookType hook type or null for none
	 * @param View $view view to check the lock on
	 * @param string $path path for which to check the lock
	 * @param int $lockTypePre variable to receive lock type that was active in the pre-hook
	 * @param int $lockTypePost variable to receive lock type that was active in the post-hook
	 * @param bool $onMountPoint true to check the mount point instead of the
	 * mounted storage
	 */
	private function connectMockHooks($hookType, $view, $path, &$lockTypePre, &$lockTypePost, $onMountPoint = false) {
		if ($hookType === null) {
			return;
		}

		$eventHandler = $this->getMockBuilder('\stdclass')
			->setMethods(['preCallback', 'postCallback'])
			->getMock();

		$eventHandler->expects($this->any())
			->method('preCallback')
			->will($this->returnCallback(
				function () use ($view, $path, $onMountPoint, &$lockTypePre) {
					$lockTypePre = $this->getFileLockType($view, $path, $onMountPoint);
				}
			));
		$eventHandler->expects($this->any())
			->method('postCallback')
			->will($this->returnCallback(
				function () use ($view, $path, $onMountPoint, &$lockTypePost) {
					$lockTypePost = $this->getFileLockType($view, $path, $onMountPoint);
				}
			));

		if ($hookType !== null) {
			Util::connectHook(
				Filesystem::CLASSNAME,
				$hookType,
				$eventHandler,
				'preCallback'
			);
			Util::connectHook(
				Filesystem::CLASSNAME,
				'post_' . $hookType,
				$eventHandler,
				'postCallback'
			);
		}
	}

	/**
	 * Returns the file lock type
	 *
	 * @param View $view view
	 * @param string $path path
	 * @param bool $onMountPoint true to check the mount point instead of the
	 * mounted storage
	 *
	 * @return int lock type or null if file was not locked
	 */
	private function getFileLockType(View $view, $path, $onMountPoint = false) {
		if ($this->isFileLocked($view, $path, ILockingProvider::LOCK_EXCLUSIVE, $onMountPoint)) {
			return ILockingProvider::LOCK_EXCLUSIVE;
		}

		if ($this->isFileLocked($view, $path, ILockingProvider::LOCK_SHARED, $onMountPoint)) {
			return ILockingProvider::LOCK_SHARED;
		}
		return null;
	}

	public function testRemoveMoveableMountPoint() {
		$mountPoint = '/' . $this->user . '/files/mount/';

		// Mock the mount point
		$mount = $this->getMockBuilder(TestMoveableMountPoint::class)
			->disableOriginalConstructor()
			->getMock();
		$mount->expects($this->once())
			->method('getMountPoint')
			->willReturn($mountPoint);
		$mount->expects($this->once())
			->method('removeMount')
			->willReturn('foo');
		$mount->expects($this->any())
			->method('getInternalPath')
			->willReturn('');

		// Register mount
		Filesystem::getMountManager()->addMount($mount);

		// Listen for events
		$eventHandler = $this->getMockBuilder('\stdclass')
			->setMethods(['umount', 'post_umount'])
			->getMock();
		$eventHandler->expects($this->once())
			->method('umount')
			->with([Filesystem::signal_param_path => '/mount']);
		$eventHandler->expects($this->once())
			->method('post_umount')
			->with([Filesystem::signal_param_path => '/mount']);
		Util::connectHook(
			Filesystem::CLASSNAME,
			'umount',
			$eventHandler,
			'umount'
		);
		Util::connectHook(
			Filesystem::CLASSNAME,
			'post_umount',
			$eventHandler,
			'post_umount'
		);

		//Delete the mountpoint
		$view = new View('/' . $this->user . '/files');
		$this->assertEquals('foo', $view->rmdir('mount'));
	}

	public function mimeFilterProvider() {
		return [
			[null, ['test1.txt', 'test2.txt', 'test3.md', 'test4.png']],
			['text/plain', ['test1.txt', 'test2.txt']],
			['text/markdown', ['test3.md']],
			['text', ['test1.txt', 'test2.txt', 'test3.md']],
		];
	}

	/**
	 * @param string $filter
	 * @param string[] $expected
	 * @dataProvider mimeFilterProvider
	 */
	public function testGetDirectoryContentMimeFilter($filter, $expected) {
		$storage1 = new Temporary();
		$root = static::getUniqueID('/');
		Filesystem::mount($storage1, [], $root . '/');
		$view = new View($root);

		$calledUpdateEvent = [];
		\OC::$server->getEventDispatcher()->addListener('file.afterupdate', function ($event) use (&$calledUpdateEvent) {
			$calledUpdateEvent[] = 'file.afterupdate';
			$calledUpdateEvent[] = $event;
		});
		$view->file_put_contents('test1.txt', 'asd');
		$view->file_put_contents('test2.txt', 'asd');
		$view->file_put_contents('test3.md', 'asd');
		$view->file_put_contents('test4.png', '');

		$this->assertEquals('file.afterupdate', $calledUpdateEvent[0]);
		$this->assertArrayHasKey('path', $calledUpdateEvent[1]);

		$content = $view->getDirectoryContent('', $filter);

		$files = \array_map(function (FileInfo $info) {
			return $info->getName();
		}, $content);
		\sort($files);

		$this->assertEquals($expected, $files);
	}

	public function testDeleteGhostFile() {
		$storage = new Temporary([]);
		$scanner = $storage->getScanner();
		$cache = $storage->getCache();
		$storage->file_put_contents('foo.txt', 'bar');
		Filesystem::mount($storage, [], '/test/');
		$scanner->scan('');

		$storage->unlink('foo.txt');

		$this->assertTrue($cache->inCache('foo.txt'));

		$view = new View('/test');
		$rootInfo = $view->getFileInfo('');
		$this->assertEquals(3, $rootInfo->getSize());
		$view->unlink('foo.txt');
		$newInfo = $view->getFileInfo('');

		$this->assertFalse($cache->inCache('foo.txt'));
		$this->assertNotEquals($rootInfo->getEtag(), $newInfo->getEtag());
		$this->assertEquals(0, $newInfo->getSize());
	}

	public function testDeleteGhostFolder() {
		$storage = new Temporary([]);
		$scanner = $storage->getScanner();
		$cache = $storage->getCache();
		$storage->mkdir('foo');
		$storage->file_put_contents('foo/foo.txt', 'bar');
		Filesystem::mount($storage, [], '/test/');
		$scanner->scan('');

		$storage->rmdir('foo');

		$this->assertTrue($cache->inCache('foo'));
		$this->assertTrue($cache->inCache('foo/foo.txt'));

		$view = new View('/test');
		$rootInfo = $view->getFileInfo('');
		$this->assertEquals(3, $rootInfo->getSize());
		$view->rmdir('foo');
		$newInfo = $view->getFileInfo('');

		$this->assertFalse($cache->inCache('foo'));
		$this->assertFalse($cache->inCache('foo/foo.txt'));
		$this->assertNotEquals($rootInfo->getEtag(), $newInfo->getEtag());
		$this->assertEquals(0, $newInfo->getSize());
	}

	public function testFopenFail() {
		// since stream wrappers influence the streams,
		// this test makes sure that all stream wrappers properly return a failure
		// to the caller instead of wrapping the boolean
		/** @var Temporary | \PHPUnit\Framework\MockObject\MockObject $storage */
		$storage = $this->getMockBuilder(Temporary::class)
			->setMethods(['fopen'])
			->getMock();

		$storage->expects($this->once())
			->method('fopen')
			->willReturn(false);

		Filesystem::mount($storage, [], '/');
		$view = new View('/files');
		$result = $view->fopen('unexist.txt', 'r');
		$this->assertFalse($result);
	}

	public function providesShareFolder() {
		return [
			['/MyTestShareFolder', '/MyTestShareFolder'],
			['MyTestShareFolder', '/MyTestShareFolder'],
			['/MyTestShareFolder/Share/Foo', '/MyTestShareFolder'],
			['MyTestShareFolder/Share/Foo', 'MyTestShareFolder'],
			['/MyTestShareFolder/Share/Foo', '/MyTestShareFolder/Share'],
		];
	}

	/**
	 * @dataProvider providesShareFolder
	 */
	public function testDeleteShareFolder($shareFolder, $deleteFolder) {
		/**
		 * Using overwriteService in this method instead of setUp, because there
		 * are other methods in the test's which might get affected if we use it
		 * in setUp.
		 */
		$this->overwriteService('AllConfig', $this->config);
		$this->config->method('getSystemValue')
			->willReturn($shareFolder);
		$view = new View('/' . $this->user . '/files');
		$view->mkdir($shareFolder);
		$this->assertFalse($view->rmdir($deleteFolder));
	}

	public function providesNonShareFolder() {
		return [
			['/', 'AnotherFolder'],
			['/', 'AnotherFolder/Subfolder'],
			['/MyTestShareFolder', 'AnotherFolder'],
			['/MyTestShareFolder/Share/Foo', '/MyTest'],
			['/MyTestShareFolder/Share/Foo', '/Share'],
			['/MyTestShareFolder/Share/Foo', 'Share'],
			['/MyTestShareFolder/Share/Foo', '/Share/Foo'],
			['/MyTestShareFolder/Share/Foo', '/Fo'],
			['/MyTestShareFolder/Share/Foo', '/Foo'],
			['/MyTestShareFolder/Share/Foo', '/Foo/Share'],
		];
	}

	/**
	 * @dataProvider providesNonShareFolder
	 */
	public function testDeleteNonShareFolder($shareFolder, $deleteFolder) {
		/**
		 * Using overwriteService in this method instead of setUp, because there
		 * are other methods in the test's which might get affected if we use it
		 * in setUp.
		 */
		$this->overwriteService('AllConfig', $this->config);
		$this->config->method('getSystemValue')
			->willReturn($shareFolder);
		$storage1 = $this->getTestStorage();
		Filesystem::mount($storage1, [], '/');
		$view = new View('');
		$view->mkdir($shareFolder);
		$view->mkdir($deleteFolder);
		$this->assertTrue($view->rmdir($deleteFolder));
	}

	public function testCacheSizeUpdatedWhenEmptyingFile(): void {
		$storage1 = $this->getTestStorage();
		Filesystem::mount($storage1, [], '/');

		$rootView = new View('');

		# test with string as $data
		$rootView->file_put_contents('welcome.txt', '1234567890');
		$this->assertEquals(10, $rootView->filesize('welcome.txt'));

		$rootView->file_put_contents('welcome.txt', '');
		$this->assertEquals(0, $rootView->filesize('welcome.txt'));

		# test with resource as $data
		$stream = fopen('data://text/plain,1234567890', 'rb');
		$rootView->file_put_contents('welcome.txt', $stream);
		$this->assertEquals(10, $rootView->filesize('welcome.txt'));

		$stream = fopen('data://text/plain,', 'rb');
		$rootView->file_put_contents('welcome.txt', '');
		$this->assertEquals(0, $rootView->filesize('welcome.txt'));
	}
}
