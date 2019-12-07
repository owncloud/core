<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Robin Appelman <icewind@owncloud.com>
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

namespace OCA\DAV\Tests\unit\Connector\Sabre\RequestTest;

use OCP\AppFramework\Http;
use OCP\Lock\ILockingProvider;

/**
 * Class UploadTest
 *
 * @group DB
 *
 * @package OCA\DAV\Tests\unit\Connector\Sabre\RequestTest
 */
class UploadTest extends RequestTest {
	public function testBasicUpload() {
		$user = $this->getUniqueID();
		$view = $this->setupUser($user, 'pass');

		$this->assertFalse($view->file_exists('foo.txt'));
		$response = $this->request($view, $user, 'pass', 'PUT', '/foo.txt', 'asd');

		$this->assertEquals(Http::STATUS_CREATED, $response->getStatus());
		$this->assertTrue($view->file_exists('foo.txt'));
		$this->assertEquals('asd', $view->file_get_contents('foo.txt'));

		$info = $view->getFileInfo('foo.txt');
		$this->assertInstanceOf('\OC\Files\FileInfo', $info);
		$this->assertEquals(3, $info->getSize());
	}

	public function testUploadOverWrite() {
		$user = $this->getUniqueID();
		$view = $this->setupUser($user, 'pass');

		$view->file_put_contents('foo.txt', 'foobar');

		$response = $this->request($view, $user, 'pass', 'PUT', '/foo.txt', 'asd');

		$this->assertEquals(Http::STATUS_NO_CONTENT, $response->getStatus());
		$this->assertEquals('asd', $view->file_get_contents('foo.txt'));

		$info = $view->getFileInfo('foo.txt');
		$this->assertInstanceOf('\OC\Files\FileInfo', $info);
		$this->assertEquals(3, $info->getSize());
	}

	/**
	 */
	public function testUploadOverWriteReadLocked() {
		$this->expectException(\OCA\DAV\Connector\Sabre\Exception\FileLocked::class);

		$user = $this->getUniqueID();
		$view = $this->setupUser($user, 'pass');

		$view->file_put_contents('foo.txt', 'bar');

		$view->lockFile('/foo.txt', ILockingProvider::LOCK_SHARED);

		$this->request($view, $user, 'pass', 'PUT', '/foo.txt', 'asd');
	}

	/**
	 */
	public function testUploadOverWriteWriteLocked() {
		$this->expectException(\OCA\DAV\Connector\Sabre\Exception\FileLocked::class);

		$user = $this->getUniqueID();
		$view = $this->setupUser($user, 'pass');
		$this->loginAsUser($user);

		$view->file_put_contents('foo.txt', 'bar');

		$view->lockFile('/foo.txt', ILockingProvider::LOCK_EXCLUSIVE);

		$this->request($view, $user, 'pass', 'PUT', '/foo.txt', 'asd');
	}

	public function testChunkedUpload() {
		$user = $this->getUniqueID();
		$view = $this->setupUser($user, 'pass');

		$this->assertFalse($view->file_exists('foo.txt'));
		$response = $this->request($view, $user, 'pass', 'PUT', '/foo.txt-chunking-123-2-0', 'asd', ['OC-Chunked' => '1']);

		$this->assertEquals(201, $response->getStatus());
		$this->assertFalse($view->file_exists('foo.txt'));

		$response = $this->request($view, $user, 'pass', 'PUT', '/foo.txt-chunking-123-2-1', 'bar', ['OC-Chunked' => '1']);

		$this->assertEquals(Http::STATUS_CREATED, $response->getStatus());
		$this->assertTrue($view->file_exists('foo.txt'));

		$this->assertEquals('asdbar', $view->file_get_contents('foo.txt'));

		$info = $view->getFileInfo('foo.txt');
		$this->assertInstanceOf('\OC\Files\FileInfo', $info);
		$this->assertEquals(6, $info->getSize());
	}

	public function testChunkedUploadOverWrite() {
		$user = $this->getUniqueID();
		$view = $this->setupUser($user, 'pass');

		$view->file_put_contents('foo.txt', 'bar');
		$response = $this->request($view, $user, 'pass', 'PUT', '/foo.txt-chunking-123-2-0', 'asd', ['OC-Chunked' => '1']);

		$this->assertEquals(Http::STATUS_CREATED, $response->getStatus());
		$this->assertEquals('bar', $view->file_get_contents('foo.txt'));

		$response = $this->request($view, $user, 'pass', 'PUT', '/foo.txt-chunking-123-2-1', 'bar', ['OC-Chunked' => '1']);

		$this->assertEquals(Http::STATUS_CREATED, $response->getStatus());

		$this->assertEquals('asdbar', $view->file_get_contents('foo.txt'));

		$info = $view->getFileInfo('foo.txt');
		$this->assertInstanceOf('\OC\Files\FileInfo', $info);
		$this->assertEquals(6, $info->getSize());
	}

	public function testChunkedUploadOutOfOrder() {
		$user = $this->getUniqueID();
		$view = $this->setupUser($user, 'pass');

		$this->assertFalse($view->file_exists('foo.txt'));
		$response = $this->request($view, $user, 'pass', 'PUT', '/foo.txt-chunking-123-2-1', 'bar', ['OC-Chunked' => '1']);

		$this->assertEquals(Http::STATUS_CREATED, $response->getStatus());
		$this->assertFalse($view->file_exists('foo.txt'));

		$response = $this->request($view, $user, 'pass', 'PUT', '/foo.txt-chunking-123-2-0', 'asd', ['OC-Chunked' => '1']);

		$this->assertEquals(201, $response->getStatus());
		$this->assertTrue($view->file_exists('foo.txt'));

		$this->assertEquals('asdbar', $view->file_get_contents('foo.txt'));

		$info = $view->getFileInfo('foo.txt');
		$this->assertInstanceOf('\OC\Files\FileInfo', $info);
		$this->assertEquals(6, $info->getSize());
	}

	/**
	 */
	public function testChunkedUploadOutOfOrderReadLocked() {
		$this->expectException(\OCA\DAV\Connector\Sabre\Exception\FileLocked::class);

		$user = $this->getUniqueID();
		$view = $this->setupUser($user, 'pass');

		$this->assertFalse($view->file_exists('foo.txt'));

		$view->lockFile('/foo.txt', ILockingProvider::LOCK_SHARED);

		try {
			$response = $this->request($view, $user, 'pass', 'PUT', '/foo.txt-chunking-123-2-1', 'bar', ['OC-Chunked' => '1']);
		} catch (\OCA\DAV\Connector\Sabre\Exception\FileLocked $e) {
			$this->fail('Didn\'t expect locked error for the first chunk on read lock');
			return;
		}

		$this->assertEquals(Http::STATUS_CREATED, $response->getStatus());
		$this->assertFalse($view->file_exists('foo.txt'));

		// last chunk should trigger the locked error since it tries to assemble
		$this->request($view, $user, 'pass', 'PUT', '/foo.txt-chunking-123-2-0', 'asd', ['OC-Chunked' => '1']);
	}

	/**
	 */
	public function testChunkedUploadOutOfOrderWriteLocked() {
		$this->expectException(\OCA\DAV\Connector\Sabre\Exception\FileLocked::class);

		$user = $this->getUniqueID();
		$view = $this->setupUser($user, 'pass');

		$this->assertFalse($view->file_exists('foo.txt'));

		$view->lockFile('/foo.txt', ILockingProvider::LOCK_EXCLUSIVE);

		try {
			$response = $this->request($view, $user, 'pass', 'PUT', '/foo.txt-chunking-123-2-1', 'bar', ['OC-Chunked' => '1']);
		} catch (\OCA\DAV\Connector\Sabre\Exception\FileLocked $e) {
			$this->fail('Didn\'t expect locked error for the first chunk on write lock'); // maybe forbid this in the future for write locks only?
			return;
		}

		$this->assertEquals(Http::STATUS_CREATED, $response->getStatus());
		$this->assertFalse($view->file_exists('foo.txt'));

		// last chunk should trigger the locked error since it tries to assemble
		$this->request($view, $user, 'pass', 'PUT', '/foo.txt-chunking-123-2-0', 'asd', ['OC-Chunked' => '1']);
	}
}
