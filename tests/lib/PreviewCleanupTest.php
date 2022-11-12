<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2022, ownCloud GmbH
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
use OC\Files\Node\File;
use OC\PreviewCleanup;
use OCP\Files\Folder;
use OCP\Share;
use Test\Traits\UserTrait;

/**
 * Class PreviewCleanupTest
 *
 * @group DB
 *
 * @package Test
 */
class PreviewCleanupTest extends TestCase {
	use UserTrait;

	public const TEST_PREVIEW_USER1 = "test-preview-cleanup-user1";
	public const TEST_PREVIEW_USER2 = "test-preview-cleanup-user2";
	private $trashWasEnabled;

	protected function setUp(): void {
		parent::setUp();

		# disable trashbin
		$this->trashWasEnabled = \OC::$server->getAppManager()->isEnabledForUser('files_trashbin');
		if ($this->trashWasEnabled) {
			\OC::$server->getAppManager()->disableApp('files_trashbin');
		}

		# create test user 2
		$this->createUser(self::TEST_PREVIEW_USER2, self::TEST_PREVIEW_USER2);

		# create test user 1
		$this->createUser(self::TEST_PREVIEW_USER1, self::TEST_PREVIEW_USER1);
	}

	protected function tearDown(): void {
		parent::tearDown();

		if ($this->trashWasEnabled) {
			$this->trashWasEnabled = \OC::$server->getAppManager()->enableApp('files_trashbin');
		}
	}

	public function test(): void {
		# user 1
		$this->login(self::TEST_PREVIEW_USER1);

		$rootFolder = \OC::$server->getUserFolder(self::TEST_PREVIEW_USER1);

		# create test file
		/** @var File $textFile */
		$textFile = $rootFolder->newFile('welcome.txt');
		$textFile->putContent('1234567890');
		$textFileId = (string)$textFile->getId();
		$thumbnailFolderUser1 = $this->createPreview($textFile, $rootFolder, $textFileId);

		# file is shared with another user
		$share = \OC::$server->getShareManager()->newShare();
		$share->setNode($textFile);
		$share->setSharedWith(self::TEST_PREVIEW_USER2);
		$share->setShareType(Share::SHARE_TYPE_USER);
		$share->setSharedBy(self::TEST_PREVIEW_USER1);
		$share->setPermissions(\OCP\Constants::PERMISSION_ALL);
		$share = \OC::$server->getShareManager()->createShare($share);

		# login as user 2
		$this->login(self::TEST_PREVIEW_USER2);
		$rootFolder = \OC::$server->getUserFolder(self::TEST_PREVIEW_USER1);
		/** @var File $sharedTextFile */
		$sharedTextFile = $rootFolder->get('welcome.txt');
		$sharedTextFileId = (string)$sharedTextFile->getId();
		# create preview
		$thumbnailFolderUser2 = $this->createPreview($sharedTextFile, $rootFolder, $sharedTextFileId);

		# delete file
		$textFile->delete();

		# assert thumbnail still exists - no hooks are triggered
		self::assertTrue($thumbnailFolderUser1->nodeExists($textFileId));
		self::assertTrue($thumbnailFolderUser2->nodeExists($sharedTextFileId));

		# run cleanup command
		$cmd = new PreviewCleanup(\OC::$server->getDatabaseConnection());
		$cmd->process();

		# assert thumbnail NO LONGER exists
		self::assertFalse($thumbnailFolderUser1->nodeExists($textFileId));
		self::assertFalse($thumbnailFolderUser2->nodeExists($sharedTextFileId));
	}

	/**
	 * @throws \OC\User\NoUserException
	 */
	private function login(string $user): void {
		self::logout();
		self::loginAsUser($user);

		# properly initialize the file system
		Filesystem::clearMounts();
		Filesystem::initMountPoints($user);
	}

	/**
	 * @throws \OCP\Files\NotFoundException
	 */
	private function createPreview(File $textFile, ?Folder $rootFolder, string $textFileId): Folder {
		$textFile->getThumbnail([]);

		# assert thumbnail exists
		/** @var Folder $thumbnailFolder */
		$thumbnailFolder = $rootFolder->getParent()->get('thumbnails');
		self::assertTrue($thumbnailFolder->nodeExists($textFileId));
		return $thumbnailFolder;
	}
}
