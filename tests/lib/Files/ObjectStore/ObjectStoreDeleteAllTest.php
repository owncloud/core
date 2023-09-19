<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2023, ownCloud GmbH
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

namespace Test\Files\ObjectStore;

use OC\Files\ObjectStore\ObjectStoreStorage;
use OC\Files\Storage\Wrapper\Wrapper;
use OCP\Files\File;
use Test\TestCase;
use Test\Traits\UserTrait;

/**
 * Class ObjectStoreDeleteAllTest
 *
 * @group DB
 *
 * @package Test\Files\ObjectStore
 */
class ObjectStoreDeleteAllTest extends TestCase {
	use UserTrait;

	public function test(): void {
		$user = $this->createUser('user1');

		$folder = \OC::$server->getUserFolder($user->getUID());
		$storage = $folder->getStorage();
		while ($storage instanceof Wrapper) {
			$storage = $storage->getWrapperStorage();
		}
		if (!$storage instanceof ObjectStoreStorage) {
			$this->markTestSkipped();
		}

		# add some files and folders
		$folderFoo = $folder->newFolder('foo');
		$file1 = $folder->newFile('foo/lorem.txt');
		$file1->putContent('1234567890');
		$file2 = $folder->newFile('lorem.txt');
		$file2->putContent('1234567890');

		# assert objects on storage
		$this->assertFileOnObjectStore($storage, $file1);
		$this->assertFileOnObjectStore($storage, $file2);

		# perform delete
		$storage->removeAllFilesForUser($user);

		# assert no objects on storage
		$this->assertFileNotOnObjectStore($storage, $file1);
		$this->assertFileNotOnObjectStore($storage, $file2);

		# assert no records in oc_filecache
		self::assertFalse($storage->file_exists($folderFoo->getInternalPath()));
		self::assertFalse($storage->file_exists($file2->getInternalPath()));
		self::assertFalse($storage->file_exists($file2->getInternalPath()));
	}

	private function assertFileOnObjectStore($storage, File $file1): void {
		$stream = $storage->fopen($file1->getInternalPath(), 'r');
		self::assertNotFalse($stream);
		$content = stream_get_contents($stream);
		fclose($stream);
		self::assertEquals('1234567890', $content);
	}

	private function assertFileNotOnObjectStore($storage, File $file1): void {
		$stream = $storage->fopen($file1->getInternalPath(), 'r');
		self::assertFalse($stream);
	}
}
