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

use OC;
use OC\Avatar;
use OC\User\User;
use OC_Image;
use OCP\Files\NotFoundException;
use OCP\Files\Storage\IStorage;
use OCP\Files\StorageNotAvailableException;
use OCP\IL10N;
use OCP\ILogger;
use PHPUnit\Framework\MockObject\MockObject;

class AvatarTest extends TestCase {
	/** @var IStorage | MockObject */
	private $storage;

	/** @var User | MockObject $user */
	private $user;

	public function setUp(): void {
		parent::setUp();

		$this->storage = $this->createMock(IStorage::class);
		$this->user = $this->getMockBuilder(User::class)->disableOriginalConstructor()->getMock();
	}

	/**
	 * @dataProvider providesUserIds
	 * @param $expectedPath
	 * @param $userId
	 */
	public function testPathBuilding($expectedPath, $userId): void {
		$this->user->method('getUID')->willReturn($userId);
		$avatar = $this->mockAvatar();
		$path = static::invokePrivate($avatar, 'buildAvatarPath');
		$this->assertEquals($expectedPath, $path);
	}

	public function providesUserIds(): array {
		return [
			['avatars/21/23/2f297a57a5a743894a0e4a801fc3', 'admin'],
			['avatars/c4/ca/4238a0b923820dcc509a6f75849b', '1'],
			['avatars/f9/5b/70fdc3088560732a5ac135644506', '{'],
			['avatars/d4/1d/8cd98f00b204e9800998ecf8427e', ''],
		];
	}

	public function testGetNoAvatar(): void {
		$this->user->method('getUID')->willReturn('user1');
		$avatar = $this->mockAvatar();
		$this->assertFalse($avatar->get());
	}

	public function testGetAvatarSizeMatch(): void {
		$this->storage->method('file_exists')
			->willReturnMap([
				['avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.jpg', true],
				['avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.128.jpg', true],
			]);

		$expected = new OC_Image(OC::$SERVERROOT . '/tests/data/testavatar.png');

		$this->storage->method('file_get_contents')->with('avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.128.jpg')->willReturn($expected->data());

		$this->user->method('getUID')->willReturn('');
		$avatar = $this->mockAvatar();
		$this->assertEquals($expected->data(), $avatar->get(128)->data());
	}

	public function testGetAvatarSizeMinusOne(): void {
		$this->storage->method('file_exists')
			->willReturnMap([
				['avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.jpg', true],
			]);

		$expected = new OC_Image(OC::$SERVERROOT . '/tests/data/testavatar.png');

		$this->storage->method('file_get_contents')->with('avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.jpg')->willReturn($expected->data());

		$this->user->method('getUID')->willReturn('');
		$avatar = $this->mockAvatar();
		$this->assertEquals($expected->data(), $avatar->get(-1)->data());
	}

	public function testGetAvatarNoSizeMatch(): void {
		$this->storage->method('file_exists')
			->willReturnMap([
				['avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.png', true],
				['avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.32.png', false],
			]);

		$expected = new OC_Image(OC::$SERVERROOT . '/tests/data/testavatar.png');
		$expected2 = new OC_Image(OC::$SERVERROOT . '/tests/data/testavatar.png');
		$expected2->resize(32);

		$this->storage->method('file_get_contents')
			->willReturnCallback(function ($path) use ($expected, $expected2) {
				if ($path === 'avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.png') {
					return $expected->data();
				}
				if ($path === 'avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.32.png') {
					return $expected2->data();
				}
				throw new NotFoundException();
			});

		$this->storage->expects($this->once())
			->method('file_put_contents')
			->with('avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.32.png', $expected2->data());

		$this->user->method('getUID')->willReturn('');
		$avatar = $this->mockAvatar();
		$this->assertEquals($expected2->data(), $avatar->get(32)->data());
	}

	public function testExistsNo(): void {
		$this->user->method('getUID')->willReturn('');
		$avatar = $this->mockAvatar();
		$this->assertFalse($avatar->exists());
	}

	public function testExistsJPG(): void {
		$this->storage->method('file_exists')
			->willReturnMap([
				['avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.jpg', true],
				['avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.png', false],
			]);
		$this->user->method('getUID')->willReturn('');
		$avatar = $this->mockAvatar();
		$this->assertTrue($avatar->exists());
	}

	public function testExistsPNG(): void {
		$this->storage->method('file_exists')
			->willReturnMap([
				['avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.jpg', false],
				['avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.png', true],
			]);
		$this->user->method('getUID')->willReturn('');
		$avatar = $this->mockAvatar();
		$this->assertTrue($avatar->exists());
	}

	public function testExistsStorageNotAvailable(): void {
		$this->storage->method('file_exists')
			->willThrowException(new StorageNotAvailableException());
		$this->user->method('getUID')->willReturn('');
		$avatar = $this->mockAvatar();
		$this->assertFalse($avatar->exists());
	}

	public function testSetAvatar(): void {
		$this->storage->expects($this->once())->method('rmdir')
			->with('avatars/d4/1d/8cd98f00b204e9800998ecf8427e');

		$image = new OC_Image(OC::$SERVERROOT . '/tests/data/testavatar.png');
		$this->storage->method('file_put_contents')
			->with('avatars/d4/1d/8cd98f00b204e9800998ecf8427e/avatar.png', $image->data());

		// One on remove and once on setting the new avatar
		$this->user->expects($this->exactly(2))->method('triggerChange');

		$this->user->method('getUID')->willReturn('');
		$avatar = $this->mockAvatar();
		$avatar->set($image->data());
	}

	private function mockAvatar(): Avatar {
		/** @var IL10N | MockObject $l */
		$l = $this->createMock(IL10N::class);
		$l->method('t')->will($this->returnArgument(0));
		return new Avatar($this->storage, $l, $this->user, $this->createMock(ILogger::class));
	}
}
