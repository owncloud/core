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
namespace OCA\DAV\Tests\unit\Upload;

use OC\Files\FileInfo;
use OC\Files\View;
use OCA\DAV\Connector\Sabre\File;
use OCP\Lock\ILockingProvider;
use Sabre\DAV\Exception\BadRequest;
use Test\TestCase;
use Test\Traits\UserTrait;

/**
 * @group DB
 */
class FailedUploadTest extends TestCase {
	use UserTrait;

	public function test(): void {
		# init
		$user = $this->createUser('user');
		$folder = \OC::$server->getUserFolder($user->getUID());

		# fake request
		$_SERVER['CONTENT_LENGTH'] = 12;
		$_SERVER['REQUEST_METHOD'] = 'PUT';
		unset($_SERVER['HTTP_OC_CHUNKED']);

		# perform the request
		$path = '/test.txt';
		$info = new FileInfo("user/files/$path", null, null, [], null);
		$view = new View();
		$file = new File($view, $info);
		$file->acquireLock(ILockingProvider::LOCK_SHARED);
		$stream = fopen('data://text/plain,' . '123456', 'rb');
		try {
			$file->put($stream);
		} catch (BadRequest $e) {
			self::assertEquals('expected filesize 12 got 6', $e->getMessage());
		}

		# assert file does not exist
		self::assertFalse($folder->nodeExists($path));
		# ensure folder can ge listed
		$children = $folder->getDirectoryListing();
		self::assertCount(0, $children);

		# assert there is no file on disk
		$internalPath = $folder->getInternalPath();
		self::assertFalse($folder->getStorage()->file_exists($internalPath.'/test.txt'));

		# assert file is not in cache
		self::assertFalse($folder->getStorage()->getCache()->inCache($internalPath.'/test.txt'));
	}
}
