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

namespace Test;

use OC\Files\Filesystem;
use OC\Files\Storage\Temporary;
use OC\Files\View;
use OC\PreviewManager;
use OCP\Files\FileInfo;
use OCP\IConfig;
use OCP\IImage;
use OCP\IUser;
use OCP\IUserSession;
use Test\Traits\MountProviderTrait;
use Test\Traits\UserTrait;
use OCP\IPreview;
use OCP\Files\Mount\IMountPoint;

/**
 * Class PreviewManagerTest
 *
 * @group DB
 *
 * @package Test
 */
class PreviewManagerTest extends TestCase {
	use UserTrait;
	use MountProviderTrait;

	public const TEST_PREVIEW_USER1 = 'test-preview-user1';

	/** @var IUser */
	private $user;
	/** @var View */
	private $rootView;
	/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject */
	private $config;
	/** @var IPreview */
	private $previewManager;

	protected function setUp() {
		parent::setUp();

		$this->user = $this->createUser(self::TEST_PREVIEW_USER1, self::TEST_PREVIEW_USER1);
		static::loginAsUser(self::TEST_PREVIEW_USER1);

		$storage = new Temporary([]);
		Filesystem::mount($storage, [], '/' . self::TEST_PREVIEW_USER1 . '/');

		$this->rootView = new View('');
		$this->rootView->mkdir('/' . self::TEST_PREVIEW_USER1);
		$this->rootView->mkdir('/' . self::TEST_PREVIEW_USER1 . '/files');

		$imgData = \file_get_contents(\OC::$SERVERROOT . '/tests/data/testimage.jpg');
		$imgPath = '/' . self::TEST_PREVIEW_USER1 . '/files/testimage.jpg';
		$this->rootView->file_put_contents($imgPath, $imgData);
		$this->config = $this->createMock(IConfig::class);

		/** @var IUserSession | \PHPUnit_Framework_MockObject_MockObject $userSession */
		$userSession = $this->createMock(IUserSession::class);
		$userSession->method('getUser')->willReturn($this->user);

		$rootFolder = \OC::$server->getLazyRootFolder();

		$this->previewManager = new PreviewManager($this->config, $rootFolder, $userSession);
	}

	public function testCreatePreview() {
		$image = $this->previewManager->createPreview('files/testimage.jpg');
		$this->assertInstanceOf(IImage::class, $image);
		$this->assertTrue($image->valid());
	}

	public function testIsAvailable() {
		// return defaults
		$this->config->method('getSystemValue')->will($this->returnArgument(1));

		/** @var FileInfo | \PHPUnit_Framework_MockObject_MockObject $file */
		$file = $this->createMock(FileInfo::class);
		$file->expects($this->atLeastOnce())
			->method('getMimetype')
			->willReturn('image/jpeg');

		$this->assertTrue($this->previewManager->isAvailable($file));
	}

	public function testIsAvailableGloballyDisabled() {
		// return defaults
		$this->config->method('getSystemValue')->with('enable_previews', true)->willReturn(false);

		/** @var FileInfo | \PHPUnit_Framework_MockObject_MockObject $file */
		$file = $this->createMock(FileInfo::class);
		$file->expects($this->never())->method('getMimetype');

		$this->assertFalse($this->previewManager->isAvailable($file));
	}

	public function testIsAvailableDisabledOnMountPoint() {
		// return defaults
		$this->config->method('getSystemValue')->will($this->returnArgument(1));

		/** @var FileInfo | \PHPUnit_Framework_MockObject_MockObject $file */
		$file = $this->createMock(FileInfo::class);
		$file->expects($this->atLeastOnce())
			->method('getMimetype')
			->willReturn('image/jpeg');

		$mountPoint = $this->createMock(IMountPoint::class);
		$mountPoint->expects($this->once())
			->method('getOption')
			->with('previews', true)
			->willReturn(false);

		$file->expects($this->once())
			->method('getMountPoint')
			->willReturn($mountPoint);

		$this->assertFalse($this->previewManager->isAvailable($file));
	}
}
