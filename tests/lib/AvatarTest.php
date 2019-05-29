<?php
/**
 * @author Christopher Schäpers <christopher@schaepers.it>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 *
 * Copyright (c) 2013 Christopher Schäpers <christopher@schaepers.it>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test;

use OC\User\User;
use OCP\Files\Storage\IStorage;
use OCP\Files\StorageNotAvailableException;
use OCP\IL10N;
use OCP\ILogger;

class AvatarTest extends \Test\TestCase {
	/** @var IStorage | \PHPUnit\Framework\MockObject\MockObject */
	private $storage;

	/** @var \OC\Avatar */
	private $avatar;

	/** @var \OC\User\User | \PHPUnit\Framework\MockObject\MockObject $user */
	private $user;

	public function setUp() {
		parent::setUp();

		$this->storage = $this->createMock(IStorage::class);
		/** @var \OCP\IL10N | \PHPUnit\Framework\MockObject\MockObject $l */
		$l = $this->createMock(IL10N::class);
		$l->method('t')->will($this->returnArgument(0));
		$this->user = $this->getMockBuilder(User::class)->disableOriginalConstructor()->getMock();
		$this->avatar = new \OC\Avatar($this->storage, $l, $this->user, $this->createMock(ILogger::class));
	}

	/**
	 * @dataProvider providesUserIds
	 * @param $expectedPath
	 * @param $userId
	 */
	public function testPathBuilding($expectedPath, $userId) {
		$this->user->method('getUID')->willReturn($userId);
		$l = $this->createMock(IL10N::class);
		$l->method('t')->will($this->returnArgument(0));
		$this->avatar = new \OC\Avatar($this->storage, $l, $this->user, $this->createMock(ILogger::class));
		$path = static::invokePrivate($this->avatar, 'buildAvatarPath');
		$this->assertEquals($expectedPath, $path);
	}

	public function providesUserIds() {
		return [
			['avatars/21/23/2f297a57a5a743894a0e4a801fc3', 'admin'],
			['avatars/c4/ca/4238a0b923820dcc509a6f75849b', '1'],
			['avatars/f9/5b/70fdc3088560732a5ac135644506', '{'],
			['avatars/d4/1d/8cd98f00b204e9800998ecf8427e', ''],
		];
	}

	public function testGetNoAvatar() {
		$this->assertFalse($this->avatar->get());
	}

	public function testGetAvatarSizeMatch() {
		$this->storage->method('file_exists')
			->will($this->returnValueMap([
				['avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.jpg', true],
				['avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.128.jpg', true],
			]));

		$expected = new \OC_Image(\OC::$SERVERROOT . '/tests/data/testavatar.png');

		$this->storage->method('file_get_contents')->with('avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.128.jpg')->willReturn($expected->data());

		$this->assertEquals($expected->data(), $this->avatar->get(128)->data());
	}

	public function testGetAvatarSizeMinusOne() {
		$this->storage->method('file_exists')
			->will($this->returnValueMap([
				['avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.jpg', true],
			]));

		$expected = new \OC_Image(\OC::$SERVERROOT . '/tests/data/testavatar.png');

		$this->storage->method('file_get_contents')->with('avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.jpg')->willReturn($expected->data());

		$this->assertEquals($expected->data(), $this->avatar->get(-1)->data());
	}

	public function testGetAvatarNoSizeMatch() {
		$this->storage->method('file_exists')
			->will($this->returnValueMap([
				['avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.png', true],
				['avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.32.png', false],
			]));

		$expected = new \OC_Image(\OC::$SERVERROOT . '/tests/data/testavatar.png');
		$expected2 = new \OC_Image(\OC::$SERVERROOT . '/tests/data/testavatar.png');
		$expected2->resize(32);

		$this->storage->method('file_get_contents')
			->will($this->returnCallback(
				function ($path) use ($expected, $expected2) {
					if ($path === 'avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.png') {
						return $expected->data();
					}
					if ($path === 'avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.32.png') {
						return $expected2->data();
					}
					throw new \OCP\Files\NotFoundException();
				}
			));

		$this->storage->expects($this->once())
			->method('file_put_contents')
			->with('avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.32.png', $expected2->data());

		$this->assertEquals($expected2->data(), $this->avatar->get(32)->data());
	}

	public function testExistsNo() {
		$this->assertFalse($this->avatar->exists());
	}

	public function testExiststJPG() {
		$this->storage->method('file_exists')
			->will($this->returnValueMap([
				['avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.jpg', true],
				['avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.png', false],
			]));
		$this->assertTrue($this->avatar->exists());
	}

	public function testExistsPNG() {
		$this->storage->method('file_exists')
			->will($this->returnValueMap([
				['avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.jpg', false],
				['avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.png', true],
			]));
		$this->assertTrue($this->avatar->exists());
	}

	public function testExistsStorageNotAvailable() {
		$this->storage->method('file_exists')
			->willThrowException(new StorageNotAvailableException());
		$this->assertFalse($this->avatar->exists());
	}

	public function testSetAvatar() {
		$this->storage->expects($this->once())->method('rmdir')
			->with('avatars/d4/1d/8cd98f00b204e9800998ecf8427e');

		$image = new \OC_Image(\OC::$SERVERROOT . '/tests/data/testavatar.png');
		$this->storage->method('file_put_contents')
			->with('avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.png', $image->data());

		// One on remove and once on setting the new avatar
		$this->user->expects($this->exactly(2))->method('triggerChange');

		$this->avatar->set($image->data());
	}
}
