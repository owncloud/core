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

use OC\Files\Filesystem;
use OC\Files\Storage\Local;
use OCA\Files_Trashbin\Helper;
use OCA\Files_Trashbin\Storage;
use OCA\Files_Trashbin\Trashbin;
use OCP\Constants;
use OCP\Files\File;
use OCP\Files\FileInfo;
use OCP\IURLGenerator;
use OCP\Files\IRootFolder;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class TrashbinTest
 *
 * Extend TrashbinTestCase as we need to use Trashbin class that
 * has static functions that cannot be mocked
 *
 * @group DB
 */
class TrashbinTest extends TestCase {
	/**
	 * Login USER1 for each test case
	 */
	protected function setUp(): void {
		parent::setUp();
		self::loginHelper(self::TEST_TRASHBIN_USER1);
	}

	/**
	 * test that adding to trashbin schedules an expiry for both
	 * share receiver and sender, in this test we delete a shared file and
	 * check if both trash bins, the one from  the owner of the file and
	 * the one from the user who deleted the file get expired correctly (with
	 * expiration of files older then the max storage time defined for the trash)
	 */
	public function testScheduleExpireOldFilesShared() {
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

		// force running Expire command scheduled with scheduleExpire
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
	 * test that adding to trashbin schedules an expiry for the user,
	 * in this test we delete a file and check if file get expired correctly (with
	 * expiration of files older then the max storage time defined for the trash)
	 */
	public function testScheduleExpireOldFiles() {
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
		$this->manipulateDeleteTime($filesInTrash, $this->trashRoot1, $expiredDate);

		// force running Expire command scheduled with scheduleExpire
		$this->runCommands();

		$remainingFiles = Helper::getTrashFiles('/', self::TEST_TRASHBIN_USER1);

		$this->assertCount(1, $remainingFiles);
		$remainingFile = \reset($remainingFiles);
		$this->assertSame('file2.txt', $remainingFile['name']);
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
			}
		}
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
				'file1.txt.d' . $trashedFile->getMtime()
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
				'file1.txt.d' . $trashedFile->getMtime()
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
				'folder.d' . $trashedFolder->getMtime()
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
				'folder.d' . $trashedFile->getMtime() . '/file1.txt'
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
				'file1.txt.d' . $trashedFile->getMtime()
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
				'file1.txt.d' . $trashedFile->getMtime()
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
				'file1.txt.d' . $trashedFile->getMtime()
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
	 * Test restoring a nonexistent file from trashbin, returns false
	 */
	public function testRestoreUnexistingFile() {
		$this->assertFalse(
			Trashbin::restore(
				'unexist.txt.d123456'
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
					'file1.txt.d' . $trashedFile->getMtime()
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

		$baseFolderTrash->expects($this->once())
			->method('getById')
			->with(123)
			->will($this->returnValue([$node]));
		$baseFolderTrash->expects($this->once())
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
}
