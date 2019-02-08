<?php
/**
 * @author Ilja Neumann <ineumann@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace Test\Files\Storage\Wrapper;

use OC\Files\Storage\Temporary;
use OC\Files\Storage\Wrapper\DirMask;
use OCP\Constants;
use PHPUnit\Framework\TestCase;

class DirMaskTest extends TestCase {

	/** @var  Temporary */
	private $sourceStorage;

	/**
	 * @param $mask
	 * @return DirMask
	 */
	private function getStorage($mask) {
		$this->sourceStorage->mkdir('masked');
		$this->sourceStorage->mkdir('masked/dir');
		$this->sourceStorage->file_put_contents('masked/test.txt', 'something');

		return new DirMask(
			[
				'storage' => $this->sourceStorage,
				'path' => 'masked',
				'mask' => $mask
			]
		);
	}

	public function setUp() {
		parent::setUp();
		$this->sourceStorage = new Temporary([]);
	}

	public function testIsUpdatable() {
		$readOnlyStorage = $this->getStorage(Constants::PERMISSION_READ);
		$this->assertFalse(
			$readOnlyStorage->isUpdatable('masked/test.txt')
		);

		$writableStorage = $this->getStorage(Constants::PERMISSION_ALL);
		$this->assertTrue(
			$writableStorage->isUpdatable('masked/test.txt')
		);
	}

	public function testIsDeletable() {
		$readOnlyStorage = $this->getStorage(Constants::PERMISSION_READ);
		$this->assertFalse(
			$readOnlyStorage->isDeletable('masked/test.txt')
		);

		$writeOnlyStorage = $this->getStorage(Constants::PERMISSION_ALL);
		$this->assertTrue(
			$writeOnlyStorage->isDeletable('masked/test.txt')
		);
	}

	public function testIsSharable() {
		$readOnlyStorage = $this->getStorage(Constants::PERMISSION_READ);
		$this->assertFalse(
			$readOnlyStorage->isSharable('masked/test.txt')
		);

		$sharableStorage = $this->getStorage(Constants::PERMISSION_SHARE);
		$this->assertTrue(
			$sharableStorage->isSharable('masked/test.txt')
		);
	}

	public function testMkdir() {
		$storage = $this->getStorage(Constants::PERMISSION_CREATE);
		$this->assertTrue($storage->mkdir('masked/dir2'));

		$storage = $this->getStorage(Constants::PERMISSION_READ);
		$this->assertFalse($storage->mkdir('masked/dir2'));
	}

	public function testRmdir() {
		$storage = $this->getStorage(Constants::PERMISSION_ALL);
		$this->assertTrue($storage->rmdir('masked/dir'));

		$this->sourceStorage->mkdir('masked/dir2');
		$storage = $this->getStorage(Constants::PERMISSION_READ);
		$this->assertFalse($storage->rmdir('masked/dir2'));
	}

	public function testUnlink() {
		$storage = $this->getStorage(Constants::PERMISSION_ALL);
		$this->assertTrue($storage->unlink('masked/test.txt'));
		$this->assertFalse($this->sourceStorage->file_exists('masked/test.txt'));

		$storage = $this->getStorage(Constants::PERMISSION_READ);
		$this->assertFalse($storage->unlink('masked/test.txt'));
		$this->assertTrue($this->sourceStorage->file_exists('masked/test.txt'));
	}

	public function testFilePutContents() {
		$storage = $this->getStorage(Constants::PERMISSION_ALL);
		$this->assertTrue($storage->file_put_contents(
			'masked/barbaz.txt', 'something'
		));

		$content = $this->sourceStorage->file_get_contents('masked/barbaz.txt');
		$this->assertEquals('something', $content);

		$storage = $this->getStorage(Constants::PERMISSION_READ);
		$this->assertFalse($storage->file_put_contents(
			'masked/barbaz.txt', 'something'
		));
	}

	public function testFopen() {
		$storage = $this->getStorage(Constants::PERMISSION_ALL);
		$this->assertInternalType(
			'resource', $storage->fopen('masked/test.txt', 'r+')
		);

		$storage = $this->getStorage(Constants::PERMISSION_READ);
		$this->assertInternalType(
			'resource', $storage->fopen('masked/test.txt', 'r')
		);

		$storage = $this->getStorage(Constants::PERMISSION_READ);
		$this->assertFalse(
			$storage->fopen('masked/test.txt', 'r+')
		);
	}
}
