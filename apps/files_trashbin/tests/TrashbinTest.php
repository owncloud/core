<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Clark Tomlinson <fallen013@gmail.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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

namespace OCA\Files_Trashbin\Tests;

use OC\Files\Cache\Watcher;
use OC\Files\Filesystem;
use OC\Files\Storage\Local;
use OC\Files\View;
use OCA\Files_Sharing\AppInfo\Application;
use OCA\Files_Trashbin\Expiration;
use OCA\Files_Trashbin\Helper;
use OCA\Files_Trashbin\Storage;
use OCA\Files_Trashbin\Trashbin;
use OCP\Constants;
use OCP\Files\File;
use OCP\Files\FileInfo;
use Test\TestCase;
use OCP\IURLGenerator;
use OCP\Files\IRootFolder;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class Test_Encryption
 *
 * @group DB
 */
class TrashbinTest extends TestCase {
	const TEST_TRASHBIN_USER1 = "test-trashbin-user1";
	const TEST_TRASHBIN_USER2 = "test-trashbin-user2";

	private $trashRoot1;
	private $trashRoot2;

	private static $rememberRetentionObligation;

	/**
	 * @var bool
	 */
	private static $trashBinStatus;

	/**
	 * @var View
	 */
	private $rootView;

	public static function setUpBeforeClass() {
		parent::setUpBeforeClass();

		$appManager = \OC::$server->getAppManager();
		self::$trashBinStatus = $appManager->isEnabledForUser('files_trashbin');

		// clear share hooks
		\OC_Hook::clear('OCP\\Share');
		\OC::registerShareHooks();
		$application = new Application();
		$application->registerMountProviders();

		//disable encryption
		\OC_App::disable('encryption');

		$config = \OC::$server->getConfig();
		//configure trashbin
		self::$rememberRetentionObligation = $config->getSystemValue('trashbin_retention_obligation', Expiration::DEFAULT_RETENTION_OBLIGATION);
		$config->setSystemValue('trashbin_retention_obligation', 'auto, 2');

		// register hooks
		Trashbin::registerHooks();

		// create test user
		self::loginHelper(self::TEST_TRASHBIN_USER2, true);
		self::loginHelper(self::TEST_TRASHBIN_USER1, true);
	}

	public static function tearDownAfterClass() {
		// cleanup test user
		$user = \OC::$server->getUserManager()->get(self::TEST_TRASHBIN_USER1);
		if ($user !== null) {
			$user->delete();
		}
		$user = \OC::$server->getUserManager()->get(self::TEST_TRASHBIN_USER2);
		if ($user !== null) {
			$user->delete();
		}

		\OC::$server->getConfig()->setSystemValue('trashbin_retention_obligation', self::$rememberRetentionObligation);

		\OC_Hook::clear();

		Filesystem::getLoader()->removeStorageWrapper('oc_trashbin');

		if (self::$trashBinStatus) {
			\OC::$server->getAppManager()->enableApp('files_trashbin');
		}

		parent::tearDownAfterClass();
	}

	protected function setUp() {
		parent::setUp();

		\OC::$server->getAppManager()->enableApp('files_trashbin');
		$config = \OC::$server->getConfig();
		$mockConfig = $this->createMock('\OCP\IConfig');
		$mockConfig->expects($this->any())
			->method('getSystemValue')
			->will($this->returnCallback(function ($key, $default) use ($config) {
				if ($key === 'filesystem_check_changes') {
					return Watcher::CHECK_ONCE;
				} else {
					return $config->getSystemValue($key, $default);
				}
			}));
		$this->overwriteService('AllConfig', $mockConfig);

		$this->trashRoot1 = '/' . self::TEST_TRASHBIN_USER1 . '/files_trashbin';
		$this->trashRoot2 = '/' . self::TEST_TRASHBIN_USER2 . '/files_trashbin';
		$this->rootView = new View();
		self::loginHelper(self::TEST_TRASHBIN_USER1);
	}

	protected function tearDown() {
		$this->restoreService('AllConfig');
		// disable trashbin to be able to properly clean up
		\OC::$server->getAppManager()->disableApp('files_trashbin');

		$this->rootView->deleteAll('/' . self::TEST_TRASHBIN_USER1 . '/files');
		$this->rootView->deleteAll('/' . self::TEST_TRASHBIN_USER2 . '/files');
		$this->rootView->deleteAll($this->trashRoot1);
		$this->rootView->deleteAll($this->trashRoot2);

		// clear trash table
		$connection = \OC::$server->getDatabaseConnection();
		$connection->executeUpdate('DELETE FROM `*PREFIX*files_trash`');

		parent::tearDown();
	}

	/**
	 * test expiration of files older then the max storage time defined for the trash
	 * in this test we delete a shared file and check if both trash bins, the one from
	 * the owner of the file and the one from the user who deleted the file get expired
	 * correctly
	 */
	public function testExpireOldFilesShared() {
		$currentTime = \time();
		$folder = "trashTest-" . $currentTime . '/';
		$expiredDate = $currentTime - 3 * 24 * 60 * 60;

		// create some files
		Filesystem::mkdir($folder);
		Filesystem::file_put_contents($folder . 'user1-1.txt', 'file1');
		Filesystem::file_put_contents($folder . 'user1-2.txt', 'file2');
		Filesystem::file_put_contents($folder . 'user1-3.txt', 'file3');
		Filesystem::file_put_contents($folder . 'user1-4.txt', 'file4');

		//share user1-4.txt with user2
		$node = \OC::$server->getUserFolder(self::TEST_TRASHBIN_USER1)->get($folder);
		$share = \OC::$server->getShareManager()->newShare();
		$share->setShareType(\OCP\Share::SHARE_TYPE_USER)
			->setNode($node)
			->setSharedBy(self::TEST_TRASHBIN_USER1)
			->setSharedWith(self::TEST_TRASHBIN_USER2)
			->setPermissions(Constants::PERMISSION_ALL);
		\OC::$server->getShareManager()->createShare($share);

		// delete them so that they end up in the trash bin
		Filesystem::unlink($folder . 'user1-1.txt');
		Filesystem::unlink($folder . 'user1-2.txt');
		Filesystem::unlink($folder . 'user1-3.txt');

		$filesInTrash = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER1, 'name');
		$this->assertCount(3, $filesInTrash);

		// every second file will get a date in the past so that it will get expired
		$this->manipulateDeleteTime($filesInTrash, $this->trashRoot1, $expiredDate);

		// login as user2
		self::loginHelper(self::TEST_TRASHBIN_USER2);

		$this->assertTrue(Filesystem::file_exists($folder . "user1-4.txt"));

		// create some files
		Filesystem::file_put_contents('user2-1.txt', 'file1');
		Filesystem::file_put_contents('user2-2.txt', 'file2');

		// delete them so that they end up in the trash bin
		Filesystem::unlink('user2-1.txt');
		Filesystem::unlink('user2-2.txt');

		$filesInTrashUser2 = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER2, 'name');
		$this->assertCount(2, $filesInTrashUser2);

		// every second file will get a date in the past so that it will get expired
		$this->manipulateDeleteTime($filesInTrashUser2, $this->trashRoot2, $expiredDate);

		Filesystem::unlink($folder . 'user1-4.txt');

		$this->runCommands();

		$filesInTrashUser2AfterDelete = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER2);

		// user2-1.txt should have been expired
		$this->verifyArray($filesInTrashUser2AfterDelete, ['user2-2.txt', 'user1-4.txt']);

		self::loginHelper(self::TEST_TRASHBIN_USER1);

		// user1-1.txt and user1-3.txt should have been expired
		$filesInTrashUser1AfterDelete = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER1);

		$this->verifyArray($filesInTrashUser1AfterDelete, ['user1-2.txt', 'user1-4.txt']);
	}

	/**
	 * test expiration of files older then the max storage time defined for the trash
	 */
	public function testExpireOldFiles() {
		$currentTime = \time();
		$expiredDate = $currentTime - 3 * 24 * 60 * 60;

		// create some files
		\OC\Files\Filesystem::file_put_contents('file1.txt', 'file1');
		\OC\Files\Filesystem::file_put_contents('file2.txt', 'file2');
		\OC\Files\Filesystem::file_put_contents('file3.txt', 'file3');

		// delete them so that they end up in the trash bin
		\OC\Files\Filesystem::unlink('file1.txt');
		\OC\Files\Filesystem::unlink('file2.txt');
		\OC\Files\Filesystem::unlink('file3.txt');

		//make sure that files are in the trash bin
		$filesInTrash = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER1, 'name');
		$this->assertCount(3, $filesInTrash);

		// every second file will get a date in the past so that it will get expired
		$manipulatedList = $this->manipulateDeleteTime($filesInTrash, $this->trashRoot1, $expiredDate);

		list($sizeOfDeletedFiles, $count) = Trashbin::deleteExpiredFiles($manipulatedList, self::TEST_TRASHBIN_USER1);

		$this->assertSame(10, $sizeOfDeletedFiles);
		$this->assertSame(2, $count);

		// only file2.txt should be left
		$remainingFiles = \array_slice($manipulatedList, $count);
		$this->assertCount(1, $remainingFiles);
		$remainingFile = \reset($remainingFiles);
		$this->assertSame('file2.txt', $remainingFile['name']);

		// check that file1.txt and file3.txt was really deleted
		$newTrashContent = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER1);
		$this->assertCount(1, $newTrashContent);
		$element = \reset($newTrashContent);
		$this->assertSame('file2.txt', $element['name']);
	}

	/**
	 * verify that the array contains the expected results
	 *
	 * @param FileInfo[] $result
	 * @param string[] $expected
	 */
	private function verifyArray($result, $expected) {
		$this->assertCount(\count($expected), $result);
		foreach ($expected as $expectedFile) {
			$found = false;
			foreach ($result as $fileInTrash) {
				if ($expectedFile === $fileInTrash['name']) {
					$found = true;
					break;
				}
			}
			if (!$found) {
				// if we didn't found the expected file, something went wrong
				$this->assertTrue(false, "can't find expected file '" . $expectedFile . "' in trash bin");
			}
		}
	}

	/**
	 * @param FileInfo[] $files
	 * @param string $trashRoot
	 * @param integer $expireDate
	 * @return FileInfo[]
	 */
	private function manipulateDeleteTime($files, $trashRoot, $expireDate) {
		$counter = 0;
		foreach ($files as &$file) {
			// modify every second file
			$counter = ($counter + 1) % 2;
			if ($counter === 1) {
				$source = $trashRoot . '/files/' . $file['name'] . '.d' . $file['mtime'];
				$target = Filesystem::normalizePath($trashRoot . '/files/' . $file['name'] . '.d' . $expireDate);
				$this->rootView->rename($source, $target);
				$file['mtime'] = $expireDate;
			}
		}
		return \OCA\Files\Helper::sortFiles($files, 'mtime');
	}

	/**
	 * test expiration of old files in the trash bin until the max size
	 * of the trash bin is met again
	 */
	public function testExpireOldFilesUtilLimitsAreMet() {

		// create some files
		Filesystem::file_put_contents('file1.txt', 'file1');
		Filesystem::file_put_contents('file2.txt', 'file2');
		Filesystem::file_put_contents('file3.txt', 'file3');

		// delete them so that they end up in the trash bin
		Filesystem::unlink('file3.txt');
		\sleep(1); // make sure that every file has a unique mtime
		Filesystem::unlink('file2.txt');
		\sleep(1); // make sure that every file has a unique mtime
		Filesystem::unlink('file1.txt');

		//make sure that files are in the trash bin
		$filesInTrash = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER1, 'mtime');
		$this->assertCount(3, $filesInTrash);

		$sizeOfDeletedFiles = $this->invokePrivate(Trashbin::class, 'deleteFiles', [$filesInTrash, self::TEST_TRASHBIN_USER1, -8]);

		// the two oldest files (file3.txt and file2.txt) should be deleted
		$this->assertSame(10, $sizeOfDeletedFiles);

		$newTrashContent = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER1);
		$this->assertCount(1, $newTrashContent);
		$element = \reset($newTrashContent);
		$this->assertSame('file1.txt', $element['name']);
	}

	/**
	 * Test restoring a file
	 */
	public function testRestoreFileInRoot() {
		$userFolder = \OC::$server->getUserFolder();
		$file = $userFolder->newFile('file1.txt');
		$file->putContent('foo');

		$this->assertTrue($userFolder->nodeExists('file1.txt'));

		$file->delete();

		$this->assertFalse($userFolder->nodeExists('file1.txt'));

		$filesInTrash = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER1, 'mtime');
		$this->assertCount(1, $filesInTrash);

		/** @var FileInfo */
		$trashedFile = $filesInTrash[0];

		$this->assertTrue(
			Trashbin::restore(
				'file1.txt.d' . $trashedFile->getMtime(),
				$trashedFile->getName(),
				$trashedFile->getMtime()
			)
		);

		/** @var File $file */
		$file = $userFolder->get('file1.txt');
		$this->assertEquals('foo', $file->getContent());
	}

	/**
	 * Test restoring a file in subfolder
	 */
	public function testRestoreFileInSubfolder() {
		$userFolder = \OC::$server->getUserFolder();
		$folder = $userFolder->newFolder('folder');
		$file = $folder->newFile('file1.txt');
		$file->putContent('foo');

		$this->assertTrue($userFolder->nodeExists('folder/file1.txt'));

		$file->delete();

		$this->assertFalse($userFolder->nodeExists('folder/file1.txt'));

		$filesInTrash = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER1, 'mtime');
		$this->assertCount(1, $filesInTrash);

		/** @var FileInfo */
		$trashedFile = $filesInTrash[0];

		$this->assertTrue(
			Trashbin::restore(
				'file1.txt.d' . $trashedFile->getMtime(),
				$trashedFile->getName(),
				$trashedFile->getMtime()
			)
		);

		/** @var File $file */
		$file = $userFolder->get('folder/file1.txt');
		$this->assertEquals('foo', $file->getContent());
	}

	/**
	 * Test restoring a folder
	 */
	public function testRestoreFolder() {
		$userFolder = \OC::$server->getUserFolder();
		$folder = $userFolder->newFolder('folder');
		$file = $folder->newFile('file1.txt');
		$file->putContent('foo');

		$this->assertTrue($userFolder->nodeExists('folder'));

		$folder->delete();

		$this->assertFalse($userFolder->nodeExists('folder'));

		$filesInTrash = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER1, 'mtime');
		$this->assertCount(1, $filesInTrash);

		/** @var FileInfo */
		$trashedFolder = $filesInTrash[0];

		$this->assertTrue(
			Trashbin::restore(
				'folder.d' . $trashedFolder->getMtime(),
				$trashedFolder->getName(),
				$trashedFolder->getMtime()
			)
		);

		/** @var File $file */
		$file = $userFolder->get('folder/file1.txt');
		$this->assertEquals('foo', $file->getContent());
	}

	/**
	 * Test restoring a file from inside a trashed folder
	 */
	public function testRestoreFileFromTrashedSubfolder() {
		$userFolder = \OC::$server->getUserFolder();
		$folder = $userFolder->newFolder('folder');
		$file = $folder->newFile('file1.txt');
		$file->putContent('foo');

		$this->assertTrue($userFolder->nodeExists('folder'));

		$folder->delete();

		$this->assertFalse($userFolder->nodeExists('folder'));

		$filesInTrash = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER1, 'mtime');
		$this->assertCount(1, $filesInTrash);

		/** @var FileInfo */
		$trashedFile = $filesInTrash[0];

		$this->assertTrue(
			Trashbin::restore(
				'folder.d' . $trashedFile->getMtime() . '/file1.txt',
				'file1.txt',
				$trashedFile->getMtime()
			)
		);

		/** @var File $file */
		$file = $userFolder->get('file1.txt');
		$this->assertEquals('foo', $file->getContent());
	}

	/**
	 * Test restoring a file whenever the source folder was removed.
	 * The file should then land in the root.
	 */
	public function testRestoreFileWithMissingSourceFolder() {
		$userFolder = \OC::$server->getUserFolder();
		$folder = $userFolder->newFolder('folder');
		$file = $folder->newFile('file1.txt');
		$file->putContent('foo');

		$this->assertTrue($userFolder->nodeExists('folder/file1.txt'));

		$file->delete();

		$this->assertFalse($userFolder->nodeExists('folder/file1.txt'));

		$filesInTrash = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER1, 'mtime');
		$this->assertCount(1, $filesInTrash);

		/** @var FileInfo */
		$trashedFile = $filesInTrash[0];

		// delete source folder
		$folder->delete();

		$this->assertTrue(
			Trashbin::restore(
				'file1.txt.d' . $trashedFile->getMtime(),
				$trashedFile->getName(),
				$trashedFile->getMtime()
			)
		);

		/** @var File $file */
		$file = $userFolder->get('file1.txt');
		$this->assertEquals('foo', $file->getContent());
	}

	/**
	 * Test restoring a file in the root folder whenever there is another file
	 * with the same name in the root folder
	 */
	public function testRestoreFileDoesNotOverwriteExistingInRoot() {
		$userFolder = \OC::$server->getUserFolder();
		$file = $userFolder->newFile('file1.txt');
		$file->putContent('foo');

		$this->assertTrue($userFolder->nodeExists('file1.txt'));

		$file->delete();

		$this->assertFalse($userFolder->nodeExists('file1.txt'));

		$filesInTrash = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER1, 'mtime');
		$this->assertCount(1, $filesInTrash);

		/** @var FileInfo */
		$trashedFile = $filesInTrash[0];

		// create another file
		$file = $userFolder->newFile('file1.txt');
		$file->putContent('bar');

		$this->assertTrue(
			Trashbin::restore(
				'file1.txt.d' . $trashedFile->getMtime(),
				$trashedFile->getName(),
				$trashedFile->getMtime()
			)
		);

		/** @var File $anotherFile */
		$anotherFile = $userFolder->get('file1.txt');
		$this->assertEquals('bar', $anotherFile->getContent());

		/** @var File $restoredFile */
		$restoredFile = $userFolder->get('file1 (restored).txt');
		$this->assertEquals('foo', $restoredFile->getContent());
	}

	/**
	 * Test restoring a file whenever there is another file
	 * with the same name in the source folder
	 */
	public function testRestoreFileDoesNotOverwriteExistingInSubfolder() {
		$userFolder = \OC::$server->getUserFolder();
		$folder = $userFolder->newFolder('folder');
		$file = $folder->newFile('file1.txt');
		$file->putContent('foo');

		$this->assertTrue($userFolder->nodeExists('folder/file1.txt'));

		$file->delete();

		$this->assertFalse($userFolder->nodeExists('folder/file1.txt'));

		$filesInTrash = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER1, 'mtime');
		$this->assertCount(1, $filesInTrash);

		/** @var FileInfo */
		$trashedFile = $filesInTrash[0];

		// create another file
		$file = $folder->newFile('file1.txt');
		$file->putContent('bar');

		$this->assertTrue(
			Trashbin::restore(
				'file1.txt.d' . $trashedFile->getMtime(),
				$trashedFile->getName(),
				$trashedFile->getMtime()
			)
		);

		/** @var File $anotherFile */
		$anotherFile = $userFolder->get('folder/file1.txt');
		$this->assertEquals('bar', $anotherFile->getContent());

		/** @var File $restoredFile */
		$restoredFile = $userFolder->get('folder/file1 (restored).txt');
		$this->assertEquals('foo', $restoredFile->getContent());
	}

	/**
	 * Test restoring a non-existing file from trashbin, returns false
	 */
	public function testRestoreUnexistingFile() {
		$this->assertFalse(
			Trashbin::restore(
				'unexist.txt.d123456',
				'unexist.txt',
				'123456'
			)
		);
	}

	/**
	 * Test restoring a file into a read-only folder, will restore
	 * the file to root instead
	 */
	public function testRestoreFileIntoReadOnlySourceFolder() {
		$userFolder = \OC::$server->getUserFolder();
		$folder = $userFolder->newFolder('folder');
		$file = $folder->newFile('file1.txt');
		$file->putContent('foo');

		$this->assertTrue($userFolder->nodeExists('folder/file1.txt'));

		$file->delete();

		$this->assertFalse($userFolder->nodeExists('folder/file1.txt'));

		$filesInTrash = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER1, 'mtime');
		$this->assertCount(1, $filesInTrash);

		/** @var FileInfo */
		$trashedFile = $filesInTrash[0];

		// delete source folder
		list($storage, $internalPath) = $this->rootView->resolvePath('/' . self::TEST_TRASHBIN_USER1 . '/files/folder');
		if ($storage instanceof Local) {
			$folderAbsPath = $storage->getSourcePath($internalPath);
			// make folder read-only
			\chmod($folderAbsPath, 0555);

			$this->assertTrue(
				Trashbin::restore(
					'file1.txt.d' . $trashedFile->getMtime(),
					$trashedFile->getName(),
					$trashedFile->getMtime()
				)
			);

			/** @var File $file */
			$file = $userFolder->get('file1.txt');
			$this->assertEquals('foo', $file->getContent());

			\chmod($folderAbsPath, 0755);
		}
	}

	public function testPrivateLink() {
		$urlGenerator = $this->createMock(IURLGenerator::class);
		$rootFolder = $this->createMock(IRootFolder::class);

		$trashbin = new Trashbin(
			$rootFolder,
			$urlGenerator,
			\OC::$server->getEventDispatcher()
		);
		$trashbin->registerListeners();

		$rootFolder->expects($this->once())
			->method('nodeExists')
			->will($this->returnValue(true));

		$parentNode = $this->createMock('\OCP\Files\Folder');
		$parentNode->expects($this->once())
			->method('getPath')
			->will($this->returnValue('test@#?%test/files_trashbin/files/test.d1462861890/sub'));

		$baseFolderTrash = $this->createMock('\OCP\Files\Folder');

		$rootFolder->expects($this->once())
			->method('get')
			->with('test@#?%test/files_trashbin/files/')
			->will($this->returnValue($baseFolderTrash));

		$node = $this->createMock('\OCP\Files\File');
		$node->expects($this->once())
			->method('getParent')
			->will($this->returnValue($parentNode));
		$node->expects($this->once())
			->method('getName')
			->will($this->returnValue('somefile.txt'));

		$baseFolderTrash->expects($this->at(0))
			->method('getById')
			->with(123)
			->will($this->returnValue([$node]));
		$baseFolderTrash->expects($this->at(1))
			->method('getRelativePath')
			->with('test@#?%test/files_trashbin/files/test.d1462861890/sub')
			->will($this->returnValue('/test.d1462861890/sub'));

		$urlGenerator
			->expects($this->once())
			->method('linkToRoute')
			->with('files.view.index', ['view' => 'trashbin', 'dir' => '/test.d1462861890/sub', 'scrollto' => 'somefile.txt'])
			->will($this->returnValue('/owncloud/index.php/apps/files/?view=trashbin&dir=/test.d1462861890/sub&scrollto=somefile.txt'));

		$event = new GenericEvent(null, [
			'fileid' => 123,
			'uid' => 'test@#?%test',
			'resolvedWebLink' => null,
			'resolvedDavLink' => null,
		]);
		\OC::$server->getEventDispatcher()->dispatch('files.resolvePrivateLink', $event);

		$this->assertEquals('/owncloud/index.php/apps/files/?view=trashbin&dir=/test.d1462861890/sub&scrollto=somefile.txt', $event->getArgument('resolvedWebLink'));
		$this->assertNull($event->getArgument('resolvedDavLink'));
	}

	public function testDeleteKeys() {
		$sourceStorage = $this->getMockBuilder(Storage::class)
			->setConstructorArgs([['mountPoint' => 'test', 'storage' => 'Encryption']])
			->setMethods(['retainKeys', 'deleteAllFileKeys'])->getMock();

		$sourceStorage->expects($this->once())
			->method('retainKeys')
			->willReturn(true);
		$sourceStorage->expects($this->once())
			->method('deleteAllFileKeys')
			->with('//files/file1.txt');
		$this->invokePrivate(Trashbin::class, 'retainVersions', ['file1.txt', 'test-trashbin-user1', 'file1.txt', 1529567106, $sourceStorage]);
	}

	/**
	 * @param string $user
	 * @param bool $create
	 */
	public static function loginHelper($user, $create = false) {
		if ($create) {
			try {
				\OC::$server->getUserManager()->createUser($user, $user);
			} catch (\Exception $e) { // catch username is already being used from previous aborted runs
			}
		}

		\OC_Util::tearDownFS();
		\OC_User::setUserId('');
		Filesystem::tearDown();
		\OC_User::setUserId($user);
		\OC_Util::setupFS($user);
		\OC::$server->getUserFolder($user);
	}
}
