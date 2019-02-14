<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\DAV\Tests\Unit\TrashBin;

use OCA\DAV\TrashBin\TrashBinFolder;
use OCA\DAV\TrashBin\TrashBinManager;
use OCP\Files\FileInfo;
use Sabre\DAV\Exception\NotFound;
use Test\TestCase;

class TrashBinFolderTest extends TestCase {
	/**
	 * @var TrashBinFolder
	 */
	private $trashBinFolder;
	/**
	 * @var TrashBinManager | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $trashBinManager;
	/**
	 * @var FileInfo | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $fileInfo;

	protected function setUp(): void {
		parent::setUp();
		$this->fileInfo = $this->createMock(FileInfo::class);
		$this->trashBinManager = $this->createMock(TrashBinManager::class);
		$this->trashBinFolder = new TrashBinFolder('alice', $this->fileInfo, $this->trashBinManager);

		$this->fileInfo->method('getId')->willReturn(666);
		$this->fileInfo->method('getMimeType')->willReturn('foo');
		$this->fileInfo->method('getEtag')->willReturn('abcdefgh');
		$this->fileInfo->method('getMtime')->willReturn(789123456);
		$this->fileInfo->method('getSize')->willReturn(12345678);
		$this->fileInfo->method('getPath')->willReturn('/alice/files_trashbin/files/folder.d1561467869/foo');

		$this->trashBinManager->method('getLocation')->willReturn('.');
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 * @expectedExceptionMessage Permission denied to create a file
	 */
	public function testCreateFile() {
		$this->trashBinFolder->createFile('');
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 * @expectedExceptionMessage Permission denied to create a folder
	 */
	public function testCreateFolder() {
		$this->trashBinFolder->createDirectory('');
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 * @expectedExceptionMessage Permission denied to rename this resource
	 */
	public function testSetName() {
		$this->trashBinFolder->setName('');
	}

	public function testGetChildren() {
		$this->trashBinManager->method('getChildren')
			->with('alice', '666')->willReturn([
				'dummy string'
			]);
		$children = $this->trashBinFolder->getChildren();
		self::assertEquals(['dummy string'], $children);
	}

	public function testGetChild() {
		$this->trashBinManager->method('getChild')
			->with('alice', '777')->willReturn('dummy string');
		$child = $this->trashBinFolder->getChild(777);
		self::assertEquals('dummy string', $child);
	}

	public function testChildExists() {
		$this->trashBinManager->method('getChild')
			->with('alice', '777')->willReturn('dummy string');
		$exists = $this->trashBinFolder->childExists(777);
		self::assertTrue($exists);
	}

	public function testChildDoesNotExists() {
		$this->trashBinManager->method('getChild')
			->with('alice', '777')->willThrowException(new NotFound());
		$exists = $this->trashBinFolder->childExists(777);
		self::assertFalse($exists);
	}

	/**
	 * @dataProvider providesMethods
	 */
	public function testGetter($expectedValue, $method) {
		self::assertEquals($expectedValue, $this->trashBinFolder->$method());
	}

	public function providesMethods() {
		return [
			['666', 'getName'],
			['foo', 'getContentType'],
			['abcdefgh', 'getEtag'],
			[789123456, 'getLastModified'],
			[12345678, 'getSize'],
			['foo', 'getOriginalFileName'],
			['folder/foo', 'getOriginalLocation'],
			[1561467869, 'getDeleteTimestamp'],
		];
	}
}
