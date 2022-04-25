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

use OC\Core\Command\Previews\Cleanup;
use OC\Files\Filesystem;
use OC\Files\ObjectStore\ObjectStoreStorage;
use OCP\Files\Folder;
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
	private $trashWasEnabled;

	protected function setUp(): void {
		parent::setUp();

		# disable trashbin
		$this->trashWasEnabled = \OC::$server->getAppManager()->isEnabledForUser('files_trashbin');
		if ($this->trashWasEnabled) {
			\OC::$server->getAppManager()->disableApp('files_trashbin');
		}

		# create test user
		$this->createUser(self::TEST_PREVIEW_USER1, self::TEST_PREVIEW_USER1);
		self::loginAsUser(self::TEST_PREVIEW_USER1);

		# properly initialize the file system
		Filesystem::clearMounts();
		Filesystem::initMountPoints(self::TEST_PREVIEW_USER1);
	}

	protected function tearDown(): void {
		parent::tearDown();

		if ($this->trashWasEnabled) {
			$this->trashWasEnabled = \OC::$server->getAppManager()->enableApp('files_trashbin');
		}
	}

	public function test(): void {
		$rootFolder = \OC::$server->getUserFolder(self::TEST_PREVIEW_USER1);

		# create test file
		/** @var \OC\Files\Node\File $textFile */
		$textFile = $rootFolder->newFile('welcome.txt');
		$textFile->putContent('1234567890');
		$textFileId = (string)$textFile->getId();

		# create preview
		$textFile->getThumbnail([]);

		# assert thumbnail exists
		/** @var Folder $thumbnailFolder */
		$thumbnailFolder = $rootFolder->getParent()->get('thumbnails');
		self::assertTrue($thumbnailFolder->nodeExists($textFileId));

		# delete file
		$textFile->delete();

		# assert thumbnail still exists - no hooks are triggered
		self::assertTrue($thumbnailFolder->nodeExists($textFileId));

		# run cleanup command
		$cmd = new Cleanup(\OC::$server->getDatabaseConnection());
		$cmd->process();

		# assert thumbnail NO LONGER exists
		self::assertFalse($thumbnailFolder->nodeExists($textFileId));
	}
}
