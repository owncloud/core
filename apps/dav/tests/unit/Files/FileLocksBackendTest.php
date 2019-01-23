<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV\Tests\Unit\Files;

use OC\Lock\Persistent\Lock;
use OCA\DAV\Connector\Sabre\File;
use OCA\DAV\Files\FileLocksBackend;
use OCP\Files\FileInfo;
use OCP\Files\Storage\IPersistentLockingStorage;
use OCP\Files\Storage\IStorage;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\Lock\Persistent\ILock;
use Sabre\DAV\Exception\NotFound;
use Sabre\DAV\IFile;
use Sabre\DAV\Locks\LockInfo;
use Sabre\DAV\Tree;
use Test\TestCase;
use OCA\DAV\Connector\Sabre\Directory;
use OCA\DAV\Connector\Sabre\ObjectTree;
use OC\Files\View;

class FileLocksBackendTest extends TestCase {
	const CREATION_TIME = 164419200;
	const CURRENT_TIME = 164419800;

	/** @var FileLocksBackend */
	private $plugin;
	/** @var Tree | \PHPUnit_Framework_MockObject_MockObject */
	private $tree;
	/** @var IPersistentLockingStorage | IStorage | \PHPUnit_Framework_MockObject_MockObject */
	private $storageOfFileToBeLocked;

	public function setUp() {
		parent::setUp();

		$this->storageOfFileToBeLocked = $this->createMock([IPersistentLockingStorage::class, IStorage::class]);

		$timeFactory = $this->createMock(ITimeFactory::class);
		$timeFactory->method('getTime')->willReturn(self::CURRENT_TIME);

		$this->tree = $this->createMock(Tree::class);
		$this->tree->method('getNodeForPath')->willReturnCallback(function ($uri) {
			// root node
			if ($uri === '') {
				$storage = $this->createMock([IPersistentLockingStorage::class, IStorage::class]);
				$storage->method('instanceOfStorage')->willReturn(true);
				$storage->method('getLocks')->willReturn([]);
				$fileInfo = $this->createMock(FileInfo::class);
				$fileInfo->method('getStorage')->willReturn($storage);
				$file = $this->createMock(Directory::class);
				$file->method('getFileInfo')->willReturn($fileInfo);
				return $file;
			}
			if ($uri === 'unknown-file.txt') {
				throw new NotFound();
			}
			if ($uri === 'not-a-owncloud-file.txt') {
				return $this->createMock(IFile::class);
			}
			if ($uri === 'not-on-locking-storage.txt') {
				$storage = $this->createMock(IStorage::class);
				$storage->method('instanceOfStorage')->willReturn(false);
				$fileInfo = $this->createMock(FileInfo::class);
				$fileInfo->method('getStorage')->willReturn($storage);
				$file = $this->createMock(File::class);
				$file->method('getFileInfo')->willReturn($fileInfo);
				return $file;
			}
			if ($uri === 'locked-file.txt') {
				$storage = $this->createMock([IPersistentLockingStorage::class, IStorage::class]);
				$storage->method('instanceOfStorage')->willReturn(true);
				$storage->method('getLocks')->willReturnCallback(function () {
					$lock = new Lock();
					$lock->setToken('123-456-7890');
					$lock->setScope(ILock::LOCK_SCOPE_EXCLUSIVE);
					$lock->setDepth(0);
					$lock->setAbsoluteDavPath('locked-file.txt');
					$lock->setDavUserId('alice');
					$lock->setOwner('Alice Wonder');
					$lock->setTimeout(1000);
					$lock->setCreatedAt(self::CREATION_TIME);
					return [
						$lock
					];
				});
				$fileInfo = $this->createMock(FileInfo::class);
				$fileInfo->method('getStorage')->willReturn($storage);
				$fileInfo->method('getInternalPath')->willReturn('locked-file.txt');
				$file = $this->createMock(File::class);
				$file->method('getFileInfo')->willReturn($fileInfo);
				return $file;
			}
			if ($uri === 'file-to-be-locked.txt') {
				$this->storageOfFileToBeLocked->method('instanceOfStorage')->willReturn(true);
				$this->storageOfFileToBeLocked->method('getLocks')->willReturn([]);
				$fileInfo = $this->createMock(FileInfo::class);
				$fileInfo->method('getStorage')->willReturn($this->storageOfFileToBeLocked);
				$fileInfo->method('getInternalPath')->willReturn('locked-file.txt');
				$file = $this->createMock(File::class);
				$file->method('getFileInfo')->willReturn($fileInfo);
				return $file;
			}

			if ($uri === 'locked-collection-infinite') {
				$storage = $this->createMock([IPersistentLockingStorage::class, IStorage::class]);
				$storage->method('instanceOfStorage')->willReturn(true);
				$storage->method('getLocks')->willReturnCallback(function () {
					$lock = new Lock();
					$lock->setToken('123-456-789A');
					$lock->setScope(ILock::LOCK_SCOPE_EXCLUSIVE);
					$lock->setDepth(-1);
					$lock->setAbsoluteDavPath('locked-collection-infinite');
					$lock->setDavUserId('alice');
					$lock->setOwner('Alice Wonder');
					$lock->setTimeout(1000);
					$lock->setCreatedAt(self::CREATION_TIME);
					return [
						$lock
					];
				});
				$fileInfo = $this->createMock(FileInfo::class);
				$fileInfo->method('getStorage')->willReturn($storage);
				$fileInfo->method('getInternalPath')->willReturn('locked-collection-infinite');
				$file = $this->createMock(File::class);
				$file->method('getFileInfo')->willReturn($fileInfo);
				return $file;
			}
			if ($uri === 'locked-collection-infinite/new-file.txt') {
				throw new NotFound();
			}
			return $this->createMock(File::class);
		});

		$this->plugin = new FileLocksBackend($this->tree, false, $timeFactory);
	}

	public function testGetLocks() {
		$locks = $this->plugin->getLocks('unknown-file.txt', true);
		$this->assertEmpty($locks);
		$locks = $this->plugin->getLocks('not-a-owncloud-file.txt', true);
		$this->assertEmpty($locks);
		$locks = $this->plugin->getLocks('not-on-locking-storage.txt', true);
		$this->assertEmpty($locks);
		$locks = $this->plugin->getLocks('locked-file.txt', true);
		$lockInfo = new LockInfo();
		$lockInfo->token = '123-456-7890';
		$lockInfo->scope = LockInfo::EXCLUSIVE;
		$lockInfo->uri = 'files/alice/locked-file.txt';
		$lockInfo->owner = 'Alice Wonder';
		$lockInfo->timeout = 400;
		$lockInfo->created = self::CREATION_TIME;
		$this->assertEquals([
			$lockInfo
		], $locks);
	}

	public function providesGetLocksPublic() {
		// note: the link share is "/public/share"
		return [
			// "public" is locked and is a parent of the link share path
			// so the lock path "/alice/files/public" has no matching path
			// relative to the link share "/alice/files/public/share", which
			// results in a null path, which is converted to the response lock root ""
			['public', 'public/share/sub', '/sub', '/alice/files/public', null, ''],

			// "public/share" is locked and is the link share itself
			// so the lock path "/alice/files/public" matches the
			// link share root and resolves to ""
			['public', 'public/share/sub', '/sub', '/alice/files/public', '/', ''],

			// "public/share/sub" is locked and is the link share itself
			// so the lock path "/alice/files/public/sub" is inside the link
			// share so its relative path resolves to "/sub"
			// the link share root is then "/sub"
			['public', 'public/share/sub', '/sub', '/alice/files/public', '/sub', 'sub'],
		];
	}

	/**
	 * For this test we cover the case where Webdav path "public.php/webdav/sub" is inside
	 * a public link share on the internal VFS "/alice/files/public/share/sub".
	 * The public link is "/alice/files/public/share".
	 *
	 * When querying the node, it's on Webdav level, so the path is relative to "public.php/webdav/sub".
	 * The node resolves itself to the original storage path, so the path becomes "/alice/files/public/share/sub"
	 * on which the internal locks will be queried.
	 *
	 * @dataProvider providesGetLocksPublic
	 *
	 * @param $storageLockPath locked path relative to storage
	 * @param $storageGetLocksPath path on which the locks is queried on storage level
	 * @param $lockPluginGetLockPath public webdav path used in the DAV lock plugin
	 * @param $pathInView public webdav path converted to view path
	 * @param $pathRelativeToView resolved $pathInView relative to view root "/alice/files/public/share", or null if no match
	 * @param $responseLockRoot lock root path in the response
	 */
	public function testGetLocksPublic($storageLockPath, $storageGetLocksPath, $lockPluginGetLockPath, $pathInView, $pathRelativeToView, $responseLockRoot) {
		$lock = new Lock();
		$lock->setToken('123-456-7890');
		$lock->setScope(ILock::LOCK_SCOPE_EXCLUSIVE);
		$lock->setDepth(-1);
		$lock->setAbsoluteDavPath($storageLockPath);
		$lock->setDavUserId('alice');
		$lock->setOwner('Alice Wonder');
		$lock->setTimeout(1000);
		$lock->setCreatedAt(self::CREATION_TIME);

		$storage = $this->createMock([IPersistentLockingStorage::class, IStorage::class]);
		$storage->method('instanceOfStorage')->willReturn(true);
		$storage->method('getLocks')
			->with($storageGetLocksPath)
			->willReturn([$lock]);

		$fileInfo = $this->createMock(FileInfo::class);
		$fileInfo->method('getStorage')->willReturn($storage);
		$fileInfo->method('getInternalPath')->willReturn($storageGetLocksPath);
		$file = $this->createMock(File::class);
		$file->method('getFileInfo')->willReturn($fileInfo);

		$this->tree = $this->createMock(ObjectTree::class);
		$this->tree->method('getNodeForPath')
			->with($lockPluginGetLockPath)
			->willReturn($file);

		$view = $this->createMock(View::class);
		$view->expects($this->once())
			->method('getRelativePath')
			// this is the public link share root
			->with($pathInView)
			->willReturn($pathRelativeToView);

		$this->tree->method('getView')->willReturn($view);

		$timeFactory = $this->createMock(ITimeFactory::class);
		$timeFactory->method('getTime')->willReturn(self::CURRENT_TIME);

		$this->plugin = new FileLocksBackend($this->tree, true, $timeFactory);

		// "/public/share" is a public share
		// "/public" has the locks
		// we query "public.php/webdav/sub" inside that share
		$locks = $this->plugin->getLocks($lockPluginGetLockPath, true);
		$lockInfo = new LockInfo();
		$lockInfo->token = '123-456-7890';
		$lockInfo->scope = LockInfo::EXCLUSIVE;
		$lockInfo->uri = $responseLockRoot;
		$lockInfo->owner = 'Alice Wonder';
		$lockInfo->timeout = 400;
		$lockInfo->depth = -1;
		$lockInfo->created = self::CREATION_TIME;
		$this->assertEquals([
			$lockInfo
		], $locks);
	}

	public function testGetLocksCollectionInfinite() {
		$lockInfo = new LockInfo();
		$lockInfo->token = '123-456-789A';
		$lockInfo->scope = LockInfo::EXCLUSIVE;
		$lockInfo->uri = 'files/alice/locked-collection-infinite';
		$lockInfo->owner = 'Alice Wonder';
		$lockInfo->timeout = 400;
		$lockInfo->created = self::CREATION_TIME;
		$lockInfo->depth = -1;
		$locks = $this->plugin->getLocks('locked-collection-infinite', false);
		$this->assertEquals([$lockInfo], $locks);

		$locks = $this->plugin->getLocks('locked-collection-infinite/new-file.txt', false);
		$this->assertEquals([$lockInfo], $locks);
	}

	public function testLock() {
		$lockInfo = new LockInfo();
		$lockInfo->token = '123-456-7890';
		$lockInfo->scope = LockInfo::SHARED;
		$lockInfo->owner = 'Alice Wonder';
		$lockInfo->timeout = 800;
		$lockInfo->created = self::CREATION_TIME;

		$this->assertFalse($this->plugin->lock('unknown-file.txt', $lockInfo));
		$this->assertFalse($this->plugin->lock('not-a-owncloud-file.txt', $lockInfo));
		$this->assertFalse($this->plugin->lock('not-on-locking-storage.txt', $lockInfo));

		$this->storageOfFileToBeLocked
			->expects($this->once())
			->method('lockNodePersistent')
			->with('locked-file.txt', [
				'token' => '123-456-7890',
				'scope' => ILock::LOCK_SCOPE_SHARED,
				'depth' => 0,
				'owner' => 'Alice Wonder',
				'timeout' => 800,
			])
			->willReturn($this->createMock(ILock::class));
		$this->assertTrue($this->plugin->lock('file-to-be-locked.txt', $lockInfo));
	}

	public function testUnlock() {
		$lockInfo = new LockInfo();
		$lockInfo->token = '123-456-7890';
		$lockInfo->scope = LockInfo::SHARED;
		$lockInfo->owner = 'Alice Wonder';
		$lockInfo->timeout = 400;
		$lockInfo->created = self::CREATION_TIME;

		$this->assertFalse($this->plugin->unlock('unknown-file.txt', $lockInfo));
		$this->assertFalse($this->plugin->unlock('not-a-owncloud-file.txt', $lockInfo));
		$this->assertFalse($this->plugin->unlock('not-on-locking-storage.txt', $lockInfo));

		$this->storageOfFileToBeLocked
			->expects($this->once())
			->method('unlockNodePersistent')
			->with('locked-file.txt', [
				'token' => '123-456-7890'
			])
			->willReturn(true);
		$this->assertTrue($this->plugin->unlock('file-to-be-locked.txt', $lockInfo));
	}
}
