<?php
/**
 * Copyright (c) 2015 Vincent Petry <pvince81@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Files\Mount;

use OCP\Files\Storage\IStorage;
use OCP\Files\Storage\IStorageFactory;
use OC\Files\Cache\Cache;

class MountPointTest extends \Test\TestCase {
	public function testGetStorage() {
		$cache = $this->createMock(Cache::class);
		$cache->expects($this->once())
			->method('getId')
			->will($this->returnValue(123));

		$storage = $this->createMock(IStorage::class);
		$storage->expects($this->once())
			->method('getId')
			->will($this->returnValue('home:12345'));
		$storage->expects($this->any())
			->method('getCache')
			->will($this->returnValue($cache));

		$loader = $this->createMock(IStorageFactory::class);
		$loader->expects($this->once())
			->method('getInstance')
			->will($this->returnValue($storage));

		$mountPoint = new \OC\Files\Mount\MountPoint(
			// just use this because a real class is needed
			MountPointTest::class,
			'/mountpoint',
			null,
			$loader
		);

		$this->assertEquals($storage, $mountPoint->getStorage());
		$this->assertEquals('home:12345', $mountPoint->getStorageId());
		$this->assertEquals(123, $mountPoint->getStorageRootId());
		$this->assertEquals('/mountpoint/', $mountPoint->getMountPoint());

		$mountPoint->setMountPoint('another');
		$this->assertEquals('/another/', $mountPoint->getMountPoint());
	}

	public function testInvalidStorage() {
		$loader = $this->createMock(IStorageFactory::class);
		$loader->expects($this->once())
			->method('getInstance')
			->will($this->throwException(new \Exception('Test storage init exception')));

		$called = false;
		$wrapper = function ($mountPoint, $storage) use ($called) {
			$called = true;
		};

		$mountPoint = new \OC\Files\Mount\MountPoint(
			// just use this because a real class is needed
			MountPointTest::class,
			'/mountpoint',
			null,
			$loader
		);

		$this->assertNull($mountPoint->getStorage());
		// call it again to make sure the init code only ran once
		$this->assertNull($mountPoint->getStorage());

		$this->assertNull($mountPoint->getStorageId());

		// wrapping doesn't fail
		$mountPoint->wrapStorage($wrapper);

		$this->assertNull($mountPoint->getStorage());

		$this->assertEquals(-1, $mountPoint->getStorageRootId());

		// storage wrapper never called
		$this->assertFalse($called);
	}

	public function testGetRootIdNullCache() {
		$storage = $this->createMock(IStorage::class);
		$storage->expects($this->any())
			->method('getCache')
			->will($this->returnValue(null));

		$loader = $this->createMock(IStorageFactory::class);
		$loader->expects($this->once())
			->method('getInstance')
			->will($this->returnValue($storage));

		$mountPoint = new \OC\Files\Mount\MountPoint(
			// just use this because a real class is needed
			MountPointTest::class,
			'/mountpoint',
			null,
			$loader
		);

		$this->assertEquals(-1, $mountPoint->getStorageRootId());
	}
}
