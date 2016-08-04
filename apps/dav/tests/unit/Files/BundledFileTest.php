<?php
/**
 * @author Piotr Mrowczynski <Piotr.Mrowczynski@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

namespace OCA\DAV\Files;

use OC\Files\Storage\Local;
use OCP\Files\ForbiddenException;
use Test\HookHelper;
use OC\Files\Filesystem;
use OCP\Lock\ILockingProvider;

/**
 * Class File
 *
 * @group DB
 *
 * @package OCA\DAV\Tests\unit\Connector\Sabre
 */
class BundledFileTest extends \Test\TestCase {

	/**
	 * @var string
	 */
	private $user;

	public function setUp() {
		parent::setUp();

		\OC_Hook::clear();

		$this->user = $this->getUniqueID('user_');
		$userManager = \OC::$server->getUserManager();
		$userManager->createUser($this->user, 'pass');

		$this->loginAsUser($this->user);
	}

	public function tearDown() {
		$userManager = \OC::$server->getUserManager();
		$userManager->get($this->user)->delete();
		unset($_SERVER['HTTP_OC_CHUNKED']);

		parent::tearDown();
	}

	private function getMockStorage() {
		$storage = $this->getMockBuilder('\OCP\Files\Storage')
			->getMock();
		$storage->expects($this->any())
			->method('getId')
			->will($this->returnValue('home::someuser'));
		return $storage;
	}

	/**
	 * @param string $string
	 */
	private function getStream($string) {
		$stream = fopen('php://temp', 'r+');
		fwrite($stream, $string);
		fseek($stream, 0);
		return $stream;
	}

//	/**
//	 * Simulate putting a file to the given path.
//	 *
//	 * @param string $path path to put the file into
//	 * @param string $viewRoot root to use for the view
//	 *
//	 * @return null|string of the PUT operaiton which is usually the etag
//	 */
//	private function doCreate($path, $fileContents, $viewRoot = null) {
//		$view = \OC\Files\Filesystem::getView();
//		if (!is_null($viewRoot)) {
//			$view = new \OC\Files\View($viewRoot);
//		} else {
//			$viewRoot = '/' . $this->user . '/files';
//		}
//
//		$info = new \OC\Files\FileInfo(
//			$viewRoot . '/' . ltrim($path, '/'),
//			$this->getMockStorage(),
//			null,
//			['permissions' => \OCP\Constants::PERMISSION_ALL],
//			null
//		);
//
//		$file = new BundledFile($view, $info);
//
//		// beforeMethod locks
//		$view->lockFile($path, ILockingProvider::LOCK_SHARED);
//
//		$fileAttributes['content-id'] = 0;
//		$fileAttributes['x-oc-mtime'] = "1471254375";
//		$result = $file->createFile($fileContents, $fileAttributes);
//
//		// afterMethod unlocks
//		$view->unlockFile($path, ILockingProvider::LOCK_SHARED);
//
//		return $result;
//	}

	/**
	 * Simulate putting a file to the given path.
	 *
	 * @param string $path path to put the file into
	 * @param string $viewRoot root to use for the view
	 *
	 * @return null|string of the PUT operaiton which is usually the etag
	 */
	private function doPut($path, $fileContents, $viewRoot = null) {
		$view = \OC\Files\Filesystem::getView();
		if (!is_null($viewRoot)) {
			$view = new \OC\Files\View($viewRoot);
		} else {
			$viewRoot = '/' . $this->user . '/files';
		}

		$info = new \OC\Files\FileInfo(
			$viewRoot . '/' . ltrim($path, '/'),
			$this->getMockStorage(),
			null,
			['permissions' => \OCP\Constants::PERMISSION_ALL],
			null
		);

		$file = new BundledFile($view, $info);

		// beforeMethod locks
		$view->lockFile($path, ILockingProvider::LOCK_SHARED);

		$result = $file->put($fileContents);

		// afterMethod unlocks
		$view->unlockFile($path, ILockingProvider::LOCK_SHARED);

		return $result;
	}

	/**
	 * Test putting a single file
	 * 
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 * @expectedExceptionMessage PUT method not supported for bundling
	 */
	public function testThrowPutSingleFile() {
		$fileContents = $this->getStream('test data');
		$this->doPut('/foo.txt', $fileContents);
	}
}
