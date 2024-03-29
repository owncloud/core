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
 * Class DownloadTest
 *
 * @group DB
 *
 * @package OCA\DAV\Tests\unit\Connector\Sabre\RequestTest
 */
class DownloadTest extends RequestTest {
	public function testDownload() {
		$user = self::getUniqueID();
		$view = $this->setupUser($user, 'pass');

		$view->file_put_contents('foo.txt', 'bar');

		$response = $this->request($view, $user, 'pass', 'GET', '/foo.txt');
		$this->assertEquals(Http::STATUS_OK, $response->getStatus());
		$this->assertEquals(\stream_get_contents($response->getBody()), 'bar');
	}

	/**
	 */
	public function testDownloadWriteLocked() {
		$this->expectException(\OCA\DAV\Connector\Sabre\Exception\FileLocked::class);

		$user = self::getUniqueID();
		$view = $this->setupUser($user, 'pass');

		$view->file_put_contents('foo.txt', 'bar');

		$view->lockFile('/foo.txt', ILockingProvider::LOCK_EXCLUSIVE);

		$this->request($view, $user, 'pass', 'GET', '/foo.txt', 'asd');
	}

	public function testDownloadReadLocked() {
		$user = self::getUniqueID();
		$view = $this->setupUser($user, 'pass');

		$view->file_put_contents('foo.txt', 'bar');

		$view->lockFile('/foo.txt', ILockingProvider::LOCK_SHARED);

		$response = $this->request($view, $user, 'pass', 'GET', '/foo.txt', 'asd');
		$this->assertEquals(Http::STATUS_OK, $response->getStatus());
		$this->assertEquals(\stream_get_contents($response->getBody()), 'bar');
	}
}
