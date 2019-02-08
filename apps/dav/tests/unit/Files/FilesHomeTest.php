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

namespace OCA\DAV\Tests\Unit\Files;

use OC\Files\FileInfo;
use OC\Files\View;
use OCA\DAV\Connector\Sabre\Directory;
use OCA\DAV\Files\FilesHome;
use OCP\Files\Mount\IMountManager;
use Test\TestCase;

class FilesHomeTest extends TestCase {

	/** @var FilesHome */
	private $filesHome;
	/** @var Directory | \PHPUnit_Framework_MockObject_MockObject */
	private $rootNode;
	/** @var View | \PHPUnit_Framework_MockObject_MockObject */
	private $view;

	protected function setUp() {
		$this->view = $this->createMock(View::class);
		$this->filesHome = new FilesHome([
			'uri' => 'principals/users/user01'
		]);

		$this->rootNode = $this->createMock(Directory::class);
		/** @var IMountManager | \PHPUnit_Framework_MockObject_MockObject $mountManager */
		$mountManager = $this->createMock(IMountManager::class);

		$this->filesHome->init($this->rootNode, $this->view, $mountManager);
	}

	public function testGetName() {
		$this->assertEquals('user01', $this->filesHome->getName());
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 * @expectedExceptionMessage Permission denied to rename this folder
	 * @throws \Sabre\DAV\Exception\Forbidden
	 */
	public function testSetName() {
		$this->filesHome->setName('alice');
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 * @expectedExceptionMessage Permission denied to delete home folder
	 * @throws \Sabre\DAV\Exception\Forbidden
	 */
	public function testDelete() {
		$this->filesHome->delete();
	}

	public function testGetLastModified() {
		$this->rootNode->expects($this->once())->method('getLastModified')->willReturn('12345678');
		$this->assertEquals('12345678', $this->filesHome->getLastModified());
	}

	public function testChildExists() {
		$this->rootNode->expects($this->once())->method('childExists')->willReturn(true);
		$this->assertTrue($this->filesHome->childExists('welcome.txt'));
	}

	public function testGetChildren() {
		$this->rootNode->expects($this->once())->method('getChildren')->willReturn([]);
		$this->assertEquals([], $this->filesHome->getChildren());
	}

	public function testGetChild() {
		$this->rootNode->expects($this->once())->method('getChild')->willReturn([]);
		$this->assertEquals([], $this->filesHome->getChild('xxx'));
	}

	public function testCreateDirectory() {
		$this->rootNode->expects($this->once())->method('createDirectory')->willReturn([]);
		$this->filesHome->createDirectory('abc');
	}

	public function testCreateFile() {
		$this->rootNode->expects($this->once())->method('createFile')->willReturn([]);
		$this->filesHome->createFile('abc');
	}

	/**
	 * @throws \Sabre\DAV\Exception\Forbidden
	 */
	public function testDeleteWithPath() {
		$fileInfo = $this->createMock(FileInfo::class);
		$fileInfo->expects($this->once())->method('isDeletable')->willReturn(true);
		$this->view->expects($this->once())->method('getFileInfo')->willReturnMap([
			['foo/bar.txt', true, $fileInfo],
		]);
		$this->view->expects($this->once())->method('unlink')->willReturn(true);

		$this->filesHome->delete('foo/bar.txt');
	}

	public function testGetChildrenWithPath() {
		$fileInfo = $this->createMock(FileInfo::class);
		$fileInfo->expects($this->once())->method('getType')->willReturn('dir');
		$fileInfo->expects($this->once())->method('isReadable')->willReturn(true);

		$this->view->expects($this->once())->method('getFileInfo')->willReturnMap([
			['foo', true, $fileInfo],
		]);
		$this->view->expects($this->once())->method('getDirectoryContent')->willReturn([]);
		$this->assertEquals([], \iterator_to_array($this->filesHome->getChildren('foo')));
	}
}
