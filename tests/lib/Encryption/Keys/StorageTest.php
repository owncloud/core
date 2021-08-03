<?php

/**
 * ownCloud
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 *
 * @author Bjoern Schiessle <schiessle@owncloud.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Test\Encryption\Keys;

use OC\Encryption\Keys\Storage;
use OC\Encryption\Util;
use OC\Files\Filesystem;
use OC\Files\View;
use OCP\Files\Mount\IMountManager;
use OCP\Files\Mount\IMountPoint;
use OCP\IUser;
use OCP\IUserSession;
use PHPUnit\Framework\MockObject\MockObject;
use Test\TestCase;
use Test\Traits\UserTrait;
use OCP\IConfig;

/**
 * Class StorageTest
 *
 * @group DB
 *
 * @package Test\Encryption\Keys
 */
class StorageTest extends TestCase {
	use UserTrait;

	/** @var Storage */
	protected $storage;

	/** @var MockObject | Util */
	protected $util;

	/** @var MockObject | View */
	protected $view;

	/** @var MockObject */
	protected $config;
	/**
	 * @var string[]
	 */
	private $mkdirStack;
	/**
	 * @var IMountManager|MockObject
	 */
	private $mountManager;

	public function setUp(): void {
		parent::setUp();

		$this->util = $this->getMockBuilder(Util::class)
			->disableOriginalConstructor()
			->getMock();

		$this->util->method('getKeyStorageRoot')->willReturn('');

		$this->view = $this->getMockBuilder(View::class)
			->disableOriginalConstructor()
			->getMock();

		$this->config = $this->getMockBuilder(IConfig::class)
			->disableOriginalConstructor()
			->getMock();

		$this->mountManager = $this->createMock(IMountManager::class);

		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('user1');
		/** @var IUserSession | MockObject $userSession */
		$userSession = $this->createMock(IUserSession::class);
		$userSession->method('getUser')->willReturn($user);

		$this->createUser('user1', '123456');
		$this->createUser('user2', '123456');
		$this->storage = new Storage($this->view, $this->util, $userSession, $this->mountManager);
	}

	public function tearDown(): void {
		Filesystem::tearDown();
		parent::tearDown();
	}

	public function testSetFileKey(): void {
		$this->util
			->method('getUidAndFilename')
			->willReturn(['user1', '/files/foo.txt']);
		$this->util
			->method('stripPartialFileExtension')
			->willReturnArgument(0);
		$this->util
			->method('isSystemWideMountPoint')
			->willReturn(false);
		$this->view->expects($this->once())
			->method('file_put_contents')
			->with(
				$this->equalTo('/user1/files_encryption/keys/files/foo.txt/encModule/fileKey'),
				$this->equalTo('key')
			)
			->willReturn(\strlen('key'));

		$this->assertTrue(
			$this->storage->setFileKey('user1/files/foo.txt', 'fileKey', 'key', 'encModule')
		);
	}

	public function dataTestGetFileKey(): array {
		return [
			['/files/foo.txt', '/files/foo.txt', true, 'key'],
			['/files/foo.txt.ocTransferId2111130212.part', '/files/foo.txt', true, 'key'],
			['/files/foo.txt.ocTransferId2111130212.part', '/files/foo.txt', false, 'key2'],
		];
	}

	/**
	 * @dataProvider dataTestGetFileKey
	 *
	 * @param string $path
	 * @param string $strippedPartialName
	 * @param bool $originalKeyExists
	 * @param string $expectedKeyContent
	 */
	public function testGetFileKey($path, $strippedPartialName, $originalKeyExists, $expectedKeyContent): void {
		$this->util
			->method('getUidAndFilename')
			->willReturnMap([
				['user1/files/foo.txt', ['user1', '/files/foo.txt']],
				['user1/files/foo.txt.ocTransferId2111130212.part', ['user1', '/files/foo.txt.ocTransferId2111130212.part']],
			]);
		// we need to strip away the part file extension in order to reuse a
		// existing key if it exists, otherwise versions will break
		$this->util->expects($this->once())
			->method('stripPartialFileExtension')
			->willReturn('user1' . $strippedPartialName);
		$this->util
			->method('isSystemWideMountPoint')
			->willReturn(false);

		if (!$originalKeyExists) {
			$this->view
				->expects($this->exactly(2))
				->method('file_exists')
				->withConsecutive(
					[$this->equalTo('/user1/files_encryption/keys' . $strippedPartialName . '/encModule/fileKey')],
					[$this->equalTo('/user1/files_encryption/keys' . $path . '/encModule/fileKey')]
				)
				->willReturnOnConsecutiveCalls(
					$originalKeyExists,
					true,
				);

			$this->view->expects($this->once())
				->method('file_get_contents')
				->with($this->equalTo('/user1/files_encryption/keys' . $path . '/encModule/fileKey'))
				->willReturn('key2');
		} else {
			$this->view->expects($this->once())
				->method('file_exists')
				->with($this->equalTo('/user1/files_encryption/keys' . $strippedPartialName . '/encModule/fileKey'))
				->willReturn($originalKeyExists);

			$this->view->expects($this->once())
				->method('file_get_contents')
				->with($this->equalTo('/user1/files_encryption/keys' . $strippedPartialName . '/encModule/fileKey'))
				->willReturn('key');
		}

		$this->assertSame(
			$expectedKeyContent,
			$this->storage->getFileKey('user1' . $path, 'fileKey', 'encModule')
		);
	}

	public function testSetFileKeySystemWide(): void {
		$this->util
			->method('getUidAndFilename')
			->willReturn(['user1', '/files/foo.txt']);
		$this->util
			->method('isSystemWideMountPoint')
			->willReturn(true);
		$this->util
			->method('stripPartialFileExtension')
			->willReturnArgument(0);
		$this->view->expects($this->once())
			->method('file_put_contents')
			->with(
				$this->equalTo('/files_encryption/keys/files/foo.txt/encModule/fileKey'),
				$this->equalTo('key')
			)
			->willReturn(\strlen('key'));

		$this->assertTrue(
			$this->storage->setFileKey('user1/files/foo.txt', 'fileKey', 'key', 'encModule')
		);
	}

	public function testGetFileKeySystemWide(): void {
		$this->util
			->method('getUidAndFilename')
			->willReturn(['user1', '/files/foo.txt']);
		$this->util
			->method('stripPartialFileExtension')
			->willReturnArgument(0);
		$this->util
			->method('isSystemWideMountPoint')
			->willReturn(true);
		$this->view->expects($this->once())
			->method('file_get_contents')
			->with($this->equalTo('/files_encryption/keys/files/foo.txt/encModule/fileKey'))
			->willReturn('key');
		$this->view->expects($this->once())
			->method('file_exists')
			->with($this->equalTo('/files_encryption/keys/files/foo.txt/encModule/fileKey'))
			->willReturn(true);

		$this->assertSame(
			'key',
			$this->storage->getFileKey('user1/files/foo.txt', 'fileKey', 'encModule')
		);
	}

	public function testSetSystemUserKey(): void {
		$this->view->expects($this->once())
			->method('file_put_contents')
			->with(
				$this->equalTo('/files_encryption/encModule/shareKey_56884'),
				$this->equalTo('key')
			)
			->willReturn(\strlen('key'));

		$this->assertTrue(
			$this->storage->setSystemUserKey('shareKey_56884', 'key', 'encModule')
		);
	}

	public function testSetUserKey(): void {
		$this->view->expects($this->once())
			->method('file_put_contents')
			->with(
				$this->equalTo('/user1/files_encryption/encModule/user1.publicKey'),
				$this->equalTo('key')
			)
			->willReturn(\strlen('key'));

		$this->assertTrue(
			$this->storage->setUserKey('user1', 'publicKey', 'key', 'encModule')
		);
	}

	public function testGetSystemUserKey(): void {
		$this->view->expects($this->once())
			->method('file_get_contents')
			->with($this->equalTo('/files_encryption/encModule/shareKey_56884'))
			->willReturn('key');
		$this->view->expects($this->once())
			->method('file_exists')
			->with($this->equalTo('/files_encryption/encModule/shareKey_56884'))
			->willReturn(true);

		$this->assertSame(
			'key',
			$this->storage->getSystemUserKey('shareKey_56884', 'encModule')
		);
	}

	public function testGetUserKey(): void {
		$this->view->expects($this->once())
			->method('file_get_contents')
			->with($this->equalTo('/user1/files_encryption/encModule/user1.publicKey'))
			->willReturn('key');
		$this->view->expects($this->once())
			->method('file_exists')
			->with($this->equalTo('/user1/files_encryption/encModule/user1.publicKey'))
			->willReturn(true);

		$this->assertSame(
			'key',
			$this->storage->getUserKey('user1', 'publicKey', 'encModule')
		);
	}

	public function testGetUserKeyShared(): void {
		$this->view->expects($this->once())
			->method('file_get_contents')
			->with($this->equalTo('/user2/files_encryption/encModule/user2.publicKey'))
			->willReturn('key');
		$this->view->expects($this->once())
			->method('file_exists')
			->with($this->equalTo('/user2/files_encryption/encModule/user2.publicKey'))
			->willReturn(true);

		$this->assertFalse($this->isUserHomeMounted('user2'));

		$this->assertSame(
			'key',
			$this->storage->getUserKey('user2', 'publicKey', 'encModule')
		);

		$this->assertTrue($this->isUserHomeMounted('user2'));
	}

	public function testGetUserKeyWhenKeyStorageIsOutsideHome(): void {
		$this->view->expects($this->once())
			->method('file_get_contents')
			->with($this->equalTo('/enckeys/user2/files_encryption/encModule/user2.publicKey'))
			->willReturn('key');
		$this->view->expects($this->once())
			->method('file_exists')
			->with($this->equalTo('/enckeys/user2/files_encryption/encModule/user2.publicKey'))
			->willReturn(true);

		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('user1');
		$userSession = $this->createMock(IUserSession::class);
		$userSession->method('getUser')->willReturn($user);
		$util = $this->createMock(Util::class);
		$util->method('getKeyStorageRoot')->willReturn('enckeys');
		$storage = new Storage($this->view, $util, $userSession, $this->mountManager);

		$this->assertFalse($this->isUserHomeMounted('user2'));

		$this->assertSame(
			'key',
			$storage->getUserKey('user2', 'publicKey', 'encModule')
		);

		$this->assertFalse($this->isUserHomeMounted('user2'), 'mounting was not necessary');
	}

	/**
	 * Returns whether the home of the given user was mounted
	 *
	 * @param string $userId
	 * @return boolean true if mounted, false otherwise
	 */
	private function isUserHomeMounted($userId): bool {
		// verify that user2's FS got mounted when retrieving the key
		$mountManager = \OC::$server->getMountManager();
		$mounts = $mountManager->getAll();
		$mounts = \array_filter($mounts, function ($mount) use ($userId) {
			return ($mount->getMountPoint() === "/$userId/");
		});

		return !empty($mounts);
	}

	public function testDeleteUserKey(): void {
		$this->view->expects($this->once())
			->method('file_exists')
			->with($this->equalTo('/user1/files_encryption/encModule/user1.publicKey'))
			->willReturn(true);
		$this->view->expects($this->once())
			->method('unlink')
			->with($this->equalTo('/user1/files_encryption/encModule/user1.publicKey'))
			->willReturn(true);

		$this->assertTrue(
			$this->storage->deleteUserKey('user1', 'publicKey', 'encModule')
		);
	}

	public function testDeleteSystemUserKey(): void {
		$this->view->expects($this->once())
			->method('file_exists')
			->with($this->equalTo('/files_encryption/encModule/shareKey_56884'))
			->willReturn(true);
		$this->view->expects($this->once())
			->method('unlink')
			->with($this->equalTo('/files_encryption/encModule/shareKey_56884'))
			->willReturn(true);

		$this->assertTrue(
			$this->storage->deleteSystemUserKey('shareKey_56884', 'encModule')
		);
	}

	public function testDeleteFileKeySystemWide(): void {
		$this->util
			->method('getUidAndFilename')
			->willReturn(['user1', '/files/foo.txt']);
		$this->util
			->method('stripPartialFileExtension')
			->willReturnArgument(0);
		$this->util
			->method('isSystemWideMountPoint')
			->willReturn(true);
		$this->view->expects($this->once())
			->method('file_exists')
			->with($this->equalTo('/files_encryption/keys/files/foo.txt/encModule/fileKey'))
			->willReturn(true);
		$this->view->expects($this->once())
			->method('unlink')
			->with($this->equalTo('/files_encryption/keys/files/foo.txt/encModule/fileKey'))
			->willReturn(true);

		$this->assertTrue(
			$this->storage->deleteFileKey('user1/files/foo.txt', 'fileKey', 'encModule')
		);
	}

	public function testDeleteFileKey(): void {
		$this->util
			->method('getUidAndFilename')
			->willReturn(['user1', '/files/foo.txt']);
		$this->util
			->method('stripPartialFileExtension')
			->willReturnArgument(0);
		$this->util
			->method('isSystemWideMountPoint')
			->willReturn(false);
		$this->view->expects($this->once())
			->method('file_exists')
			->with($this->equalTo('/user1/files_encryption/keys/files/foo.txt/encModule/fileKey'))
			->willReturn(true);
		$this->view->expects($this->once())
			->method('unlink')
			->with($this->equalTo('/user1/files_encryption/keys/files/foo.txt/encModule/fileKey'))
			->willReturn(true);

		$this->assertTrue(
			$this->storage->deleteFileKey('user1/files/foo.txt', 'fileKey', 'encModule')
		);
	}

	/**
	 * @dataProvider dataProviderCopyRename
	 */
	public function testRenameKeys($source, $target, $systemWideMountSource, $systemWideMountTarget, $expectedSource, $expectedTarget): void {
		$this->view
			->method('file_exists')
			->willReturn(true);
		$this->view
			->method('is_dir')
			->willReturn(true);
		$this->view->expects($this->once())
			->method('rename')
			->with(
				$this->equalTo($expectedSource),
				$this->equalTo($expectedTarget)
			)
			->willReturn(true);
		$this->util
			->method('getUidAndFilename')
			->willReturnCallback([$this, 'getUidAndFilenameCallback']);
		$this->util
			->method('isSystemWideMountPoint')
			->willReturnCallback(function ($path) use ($systemWideMountSource, $systemWideMountTarget) {
				if (\strpos($path, 'source.txt') !== false) {
					return $systemWideMountSource;
				}
				return $systemWideMountTarget;
			});

		$this->storage->renameKeys($source, $target);
	}

	/**
	 * @dataProvider dataProviderCopyRename
	 */
	public function testCopyKeys($source, $target, $systemWideMountSource, $systemWideMountTarget, $expectedSource, $expectedTarget): void {
		$this->view
			->method('file_exists')
			->willReturn(true);
		$this->view
			->method('is_dir')
			->willReturn(true);
		$this->view->expects($this->once())
			->method('copy')
			->with(
				$this->equalTo($expectedSource),
				$this->equalTo($expectedTarget)
			)
			->willReturn(true);
		$this->util
			->method('getUidAndFilename')
			->willReturnCallback([$this, 'getUidAndFilenameCallback']);
		$this->util
			->method('isSystemWideMountPoint')
			->willReturnCallback(function ($path) use ($systemWideMountSource, $systemWideMountTarget) {
				if (\strpos($path, 'source.txt') !== false) {
					return $systemWideMountSource;
				}
				return $systemWideMountTarget;
			});

		$this->storage->copyKeys($source, $target);
	}

	public function getUidAndFilenameCallback(): array {
		$args = \func_get_args();

		$path = $args[0];
		$parts = \explode('/', $path);

		return [$parts[1], '/' . \implode('/', \array_slice($parts, 2))];
	}

	public function dataProviderCopyRename(): array {
		return [
			['/user1/files/source.txt', '/user1/files/target.txt', false, false,
				'/user1/files_encryption/keys/files/source.txt/', '/user1/files_encryption/keys/files/target.txt/'],
			['/user1/files/foo/source.txt', '/user1/files/target.txt', false, false,
				'/user1/files_encryption/keys/files/foo/source.txt/', '/user1/files_encryption/keys/files/target.txt/'],
			['/user1/files/source.txt', '/user1/files/foo/target.txt', false, false,
				'/user1/files_encryption/keys/files/source.txt/', '/user1/files_encryption/keys/files/foo/target.txt/'],
			['/user1/files/source.txt', '/user1/files/foo/target.txt', true, true,
				'/files_encryption/keys/files/source.txt/', '/files_encryption/keys/files/foo/target.txt/'],
			['/user1/files/source.txt', '/user1/files/target.txt', false, true,
				'/user1/files_encryption/keys/files/source.txt/', '/files_encryption/keys/files/target.txt/'],
			['/user1/files/source.txt', '/user1/files/target.txt', true, false,
				'/files_encryption/keys/files/source.txt/', '/user1/files_encryption/keys/files/target.txt/'],

			['/user2/files/source.txt', '/user1/files/target.txt', false, false,
				'/user2/files_encryption/keys/files/source.txt/', '/user1/files_encryption/keys/files/target.txt/'],
			['/user2/files/foo/source.txt', '/user1/files/target.txt', false, false,
				'/user2/files_encryption/keys/files/foo/source.txt/', '/user1/files_encryption/keys/files/target.txt/'],
			['/user2/files/source.txt', '/user1/files/foo/target.txt', false, false,
				'/user2/files_encryption/keys/files/source.txt/', '/user1/files_encryption/keys/files/foo/target.txt/'],
			['/user2/files/source.txt', '/user1/files/foo/target.txt', true, true,
				'/files_encryption/keys/files/source.txt/', '/files_encryption/keys/files/foo/target.txt/'],
			['/user2/files/source.txt', '/user1/files/target.txt', false, true,
				'/user2/files_encryption/keys/files/source.txt/', '/files_encryption/keys/files/target.txt/'],
			['/user2/files/source.txt', '/user1/files/target.txt', true, false,
				'/files_encryption/keys/files/source.txt/', '/user1/files_encryption/keys/files/target.txt/'],
		];
	}

	/**
	 * @dataProvider dataTestGetPathToKeys
	 *
	 * @param string $path
	 * @param boolean $systemWideMountPoint
	 * @param string $storageRoot
	 * @param string $expected
	 */
	public function testGetPathToKeys($path, $systemWideMountPoint, $storageRoot, $expected): void {
		self::invokePrivate($this->storage, 'root_dir', [$storageRoot]);

		$this->util
			->method('getUidAndFilename')
			->willReturnCallback([$this, 'getUidAndFilenameCallback']);
		$this->util
			->method('isSystemWideMountPoint')
			->willReturn($systemWideMountPoint);

		$this->assertSame(
			$expected,
			self::invokePrivate($this->storage, 'getPathToKeys', [$path])
		);
	}

	public function dataTestGetPathToKeys(): array {
		return [
			['/user1/files/source.txt', false, '', '/user1/files_encryption/keys/files/source.txt/'],
			['/user1/files/source.txt', true, '', '/files_encryption/keys/files/source.txt/'],
			['/user1/files/source.txt', false, 'storageRoot', '/storageRoot/user1/files_encryption/keys/files/source.txt/'],
			['/user1/files/source.txt', true, 'storageRoot', '/storageRoot/files_encryption/keys/files/source.txt/'],
		];
	}

	public function testKeySetPreparation(): void {
		$this->view
			->method('file_exists')
			->willReturn(false);
		$this->view
			->method('is_dir')
			->willReturn(false);
		$this->view
			->method('mkdir')
			->willReturnCallback([$this, 'mkdirCallback']);

		$this->mkdirStack = [
			'/user1/files_encryption/keys/foo',
			'/user1/files_encryption/keys',
			'/user1/files_encryption',
			'/user1'];

		self::invokePrivate($this->storage, 'keySetPreparation', ['/user1/files_encryption/keys/foo']);
	}

	public function mkdirCallback(): void {
		$args = \func_get_args();
		$expected = \array_pop($this->mkdirStack);
		$this->assertSame($expected, $args[0]);
	}

	/**
	 * @dataProvider dataTestGetFileKeyDir
	 */
	public function testGetFileKeyDir($isSystemWideMountPoint, $storageRoot, $expected, $hasMountPoint = false, $storagePath = null, $expectDefaultImpl = true): void {
		$path = '/user1/files/foo/bar.txt';
		$owner = 'user1';
		$relativePath = '/foo/bar.txt';

		if ($hasMountPoint) {
			$storage = $this->createMock(\OC\Files\Storage\Storage::class);
			$storage->method('getEncryptionFileKeyDirectory')
				->with('OC_DEFAULT_MODULE', $relativePath)
				->willReturn($storagePath);
			$mount = $this->createMock(IMountPoint::class);
			$mount->method('getStorage')->willReturn($storage);
			$mount->method('getInternalPath')->willReturn($relativePath);
			$this->mountManager->method('find')->willReturn($mount);
		}

		self::invokePrivate($this->storage, 'root_dir', [$storageRoot]);

		$this->util->expects($expectDefaultImpl ? $this->once(): $this->never())->method('isSystemWideMountPoint')
			->willReturn($isSystemWideMountPoint);
		$this->util->expects($expectDefaultImpl ? $this->once(): $this->never())->method('getUidAndFilename')
			->with($path)->willReturn([$owner, $relativePath]);

		$this->assertSame(
			$expected,
			self::invokePrivate($this->storage, 'getFileKeyDir', ['OC_DEFAULT_MODULE', $path])
		);
	}

	public function dataTestGetFileKeyDir(): array {
		return [
			[false, '', '/user1/files_encryption/keys/foo/bar.txt/OC_DEFAULT_MODULE/'],
			[true, '', '/files_encryption/keys/foo/bar.txt/OC_DEFAULT_MODULE/'],
			[false, 'newStorageRoot', '/newStorageRoot/user1/files_encryption/keys/foo/bar.txt/OC_DEFAULT_MODULE/'],
			[true, 'newStorageRoot', '/newStorageRoot/files_encryption/keys/foo/bar.txt/OC_DEFAULT_MODULE/'],
			[false, '', '/user1/files_encryption/keys/foo/bar.txt/OC_DEFAULT_MODULE/', true, null],
			[false, '', '/foo/bar/keys/foo/bar.txt/OC_DEFAULT_MODULE/', true, '/foo/bar/keys/foo/bar.txt/OC_DEFAULT_MODULE/', false],
		];
	}
}
