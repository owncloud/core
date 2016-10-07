<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

use OC\AvatarManager;
use OCP\Files\Folder;
use OCP\Files\IRootFolder;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IUser;
use OCP\IUserManager;

/**
 * Class AvatarManagerTest
 */
class AvatarManagerTest extends TestCase {

	/** @var AvatarManager | \PHPUnit_Framework_MockObject_MockObject */
	private $avatarManager;

	/** @var IUserManager | \PHPUnit_Framework_MockObject_MockObject */
	private $userManager;

	/** @var IRootFolder | \PHPUnit_Framework_MockObject_MockObject */
	private $rootFolder;

	public function setUp() {
		parent::setUp();

		$this->userManager = $this->createMock(IUserManager::class);
		$this->rootFolder = $this->createMock(IRootFolder::class);
		$l = $this->createMock(IL10N::class);
		$logger = $this->createMock(ILogger::class);


		$this->avatarManager = $this->getMockBuilder(AvatarManager::class)
			->setMethods(['getAvatarFolder'])
			->setConstructorArgs([$this->userManager,
				$this->rootFolder,
				$l,
				$logger])
			->getMock();
	}

	/**
	 * @expectedException \Exception
	 * @expectedExceptionMessage user does not exist
	 */
	public function testGetAvatarInvalidUser() {
		$this->avatarManager->getAvatar('invalidUser');
	}

	public function testGetAvatarValidUser() {
		$user = $this->createMock(IUser::class);
		$this->userManager->expects($this->once())->method('get')->willReturn($user);

		$folder = $this->createMock(Folder::class);
		$this->avatarManager->expects($this->once())->method('getAvatarFolder')->willReturn($folder);

		$avatar = $this->avatarManager->getAvatar('valid-user');

		$this->assertInstanceOf('\OCP\IAvatar', $avatar);
	}

	/**
	 * @dataProvider providesUserIds
	 */
	public function testPathBuilding($expectedPath, $userId) {
		$path = $this->invokePrivate($this->avatarManager, 'buildAvatarPath', [$userId]);
		$this->assertEquals($expectedPath, implode('/', $path));
	}

	public function providesUserIds() {
		return [
			['21/23/2f297a57a5a743894a0e4a801fc3', 'admin'],
			['c4/ca/4238a0b923820dcc509a6f75849b', '1'],
			['f9/5b/70fdc3088560732a5ac135644506', '{'],
			['d4/1d/8cd98f00b204e9800998ecf8427e', ''],
		];
	}
}
