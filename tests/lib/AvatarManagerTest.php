<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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

namespace Test;

use OC\Avatar;
use OC\AvatarManager;
use OC\Files\Storage\Folder;
use OC\User\User;
use OCP\Files\IRootFolder;
use OCP\Files\NotFoundException;
use OCP\Files\Storage\IStorage;
use OCP\IAvatar;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IUserManager;
use Test\Traits\MountProviderTrait;

/**
 * Class AvatarManagerTest
 */
class AvatarManagerTest extends TestCase {
	use MountProviderTrait;

	/** @var AvatarManager | \PHPUnit_Framework_MockObject_MockObject */
	private $avatarManager;

	/** @var \OC\Files\Storage\Temporary */
	private $storage;

	/** @var IUserManager | \PHPUnit_Framework_MockObject_MockObject */
	private $userManager;

	/** @var Folder */
	private $folder;

	/** @var IRootFolder | \PHPUnit_Framework_MockObject_MockObject */
	private $rootFolder;

	/** @var IL10N | \PHPUnit_Framework_MockObject_MockObject */
	private $l10n;

	/** @var ILogger | \PHPUnit_Framework_MockObject_MockObject */
	private $logger;

	public function setUp() {
		parent::setUp();

		$this->userManager = $this->createMock(IUserManager::class);
		$this->rootFolder = $this->createMock(IRootFolder::class);
		$this->l10n = $this->createMock(IL10N::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->storage = $this->createMock(IStorage::class);
		$this->folder = new Folder($this->storage, '/');

		$this->avatarManager = new AvatarManager(
			$this->userManager,
			$this->rootFolder,
			$this->l10n,
			$this->logger
		);
	}

	/**
	 * @expectedException \Exception
	 * @expectedExceptionMessage user does not exist
	 */
	public function testGetAvatarInvalidUser() {
		$this->rootFolder = $this->createMock(IRootFolder::class);
		$this->rootFolder->expects(self::never())
			->method('get');

		$this->userManager->expects($this->once())
			->method('get')
			->with('invalidUser')
			->willReturn(null);

		$this->avatarManager->getAvatar('invalidUser');
	}

	public function testGetAvatarValidUser() {
		$user = $this->createMock(User::class);
		$this->userManager->expects($this->once())
			->method('get')
			->with('valid-user')
			->willReturn($user);

		$this->rootFolder->expects(self::once())
			->method('get')
			->with('avatars')
			->willReturn($this->folder);

		$avatar = $this->avatarManager->getAvatar('valid-user');

		$this->assertInstanceOf(IAvatar::class, $avatar);
	}

	public function testGetAvatarStorage() {
		$this->rootFolder->expects(self::once())
			->method('get')
			->with('avatars')
			->willReturn($this->folder);

		self::assertSame(
			$this->storage,
			self::invokePrivate($this->avatarManager, 'getAvatarStorage')
		);
	}

	public function testGetAvatarStorageCreate() {
		$this->rootFolder->expects(self::once())
			->method('get')
			->with('avatars')
			->willThrowException(new NotFoundException());

		$this->rootFolder->expects(self::once())
			->method('newFolder')
			->with('avatars')
			->willReturn($this->folder);

		self::assertSame(
			$this->storage,
			self::invokePrivate($this->avatarManager, 'getAvatarStorage')
		);
	}
}
