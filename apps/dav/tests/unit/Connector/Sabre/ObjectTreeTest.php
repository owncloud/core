<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCA\DAV\Tests\unit\Connector\Sabre;


use OC\Files\FileInfo;
use OC\Files\Filesystem;
use OC\Files\Storage\Temporary;
use OC\Files\View;
use OCA\DAV\Connector\Sabre\Directory;
use OCA\DAV\Connector\Sabre\ObjectTree;
use Test\TestCase;

class TestDoubleFileView extends \OC\Files\View {

	private $updatables;
	private $deletables;
	private $canRename;

	public function __construct($updatables, $deletables, $canRename = true) {
		$this->updatables = $updatables;
		$this->deletables = $deletables;
		$this->canRename = $canRename;
	}

	public function isUpdatable($path) {
		return $this->updatables[$path];
	}

	public function isCreatable($path) {
		return $this->updatables[$path];
	}

	public function isDeletable($path) {
		return $this->deletables[$path];
	}

	public function rename($path1, $path2) {
		return $this->canRename;
	}

	public function getRelativePath($path) {
		return $path;
	}
}

/**
 * Class ObjectTreeTest
 *
 * @group DB
 *
 * @package OCA\DAV\Tests\Unit\Connector\Sabre
 */
class ObjectTreeTest extends TestCase {

	/**
	 * @dataProvider moveFailedProvider
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 */
	public function testMoveFailed($source, $destination, $updatables, $deletables) {
		$this->moveTest($source, $destination, $updatables, $deletables);
	}

	/**
	 * @dataProvider moveSuccessProvider
	 */
	public function testMoveSuccess($source, $destination, $updatables, $deletables) {
		$this->moveTest($source, $destination, $updatables, $deletables);
		$this->assertTrue(true);
	}

	/**
	 * @dataProvider moveFailedInvalidCharsProvider
	 * @expectedException \OCA\DAV\Connector\Sabre\Exception\InvalidPath
	 */
	public function testMoveFailedInvalidChars($source, $destination, $updatables, $deletables) {
		$this->moveTest($source, $destination, $updatables, $deletables);
	}

	function moveFailedInvalidCharsProvider() {
		return [
			['a/b', 'a/*', ['a' => true, 'a/b' => true, 'a/c*' => false], []],
		];
	}

	function moveFailedProvider() {
		return [
			['a/b', 'a/c', ['a' => false, 'a/b' => false, 'a/c' => false], []],
			['a/b', 'b/b', ['a' => false, 'a/b' => false, 'b' => false, 'b/b' => false], []],
			['a/b', 'b/b', ['a' => false, 'a/b' => true, 'b' => false, 'b/b' => false], []],
			['a/b', 'b/b', ['a' => true, 'a/b' => true, 'b' => false, 'b/b' => false], []],
			['a/b', 'b/b', ['a' => true, 'a/b' => true, 'b' => true, 'b/b' => false], ['a/b' => false]],
			['a/b', 'a/c', ['a' => false, 'a/b' => true, 'a/c' => false], []],
		];
	}

	function moveSuccessProvider() {
		return [
			['a/b', 'b/b', ['a' => true, 'a/b' => true, 'b' => true, 'b/b' => false], ['a/b' => true]],
			// older files with special chars can still be renamed to valid names
			['a/b*', 'b/b', ['a' => true, 'a/b*' => true, 'b' => true, 'b/b' => false], ['a/b*' => true]],
		];
	}

	/**
	 * @param $source
	 * @param $destination
	 * @param $updatables
	 */
	private function moveTest($source, $destination, $updatables, $deletables) {
		$view = new TestDoubleFileView($updatables, $deletables);

		$info = new FileInfo('', null, null, [], null);

		$rootDir = new Directory($view, $info);
		$objectTree = $this->getMockBuilder(ObjectTree::class)
			->setMethods(['nodeExists', 'getNodeForPath'])
			->setConstructorArgs([$rootDir, $view])
			->getMock();

		$objectTree->expects($this->once())
			->method('getNodeForPath')
			->with($this->identicalTo($source))
			->will($this->returnValue(false));

		/** @var $objectTree \OCA\DAV\Connector\Sabre\ObjectTree */
		$mountManager = Filesystem::getMountManager();
		$objectTree->init($rootDir, $view, $mountManager);
		$objectTree->move($source, $destination);
	}

	public function copyDataProvider() {
		return [
			// copy into same dir
			['a', 'b', ''],
			// copy into same dir
			['a/a', 'a/b', 'a'],
			// copy into another dir
			['a', 'sub/a', 'sub'],
		];
	}

	/**
	 * @dataProvider copyDataProvider
	 */
	public function testCopy($sourcePath, $targetPath, $targetParent) {
		$view = $this->createMock(View::class);
		$view->expects($this->once())
			->method('verifyPath')
			->with($targetParent)
			->will($this->returnValue(true));
		$view->expects($this->once())
			->method('isCreatable')
			->with($targetParent)
			->will($this->returnValue(true));
		$view->expects($this->once())
			->method('copy')
			->with($sourcePath, $targetPath)
			->will($this->returnValue(true));

		$info = new FileInfo('', null, null, [], null);

		$rootDir = new Directory($view, $info);
		$objectTree = $this->getMockBuilder(ObjectTree::class)
			->setMethods(['nodeExists', 'getNodeForPath'])
			->setConstructorArgs([$rootDir, $view])
			->getMock();

		$objectTree->expects($this->once())
			->method('getNodeForPath')
			->with($this->identicalTo($sourcePath))
			->will($this->returnValue(false));

		/** @var $objectTree \OCA\DAV\Connector\Sabre\ObjectTree */
		$mountManager = Filesystem::getMountManager();
		$objectTree->init($rootDir, $view, $mountManager);
		$objectTree->copy($sourcePath, $targetPath);
	}

	/**
	 * @dataProvider copyDataProvider
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 */
	public function testCopyFailNotCreatable($sourcePath, $targetPath, $targetParent) {
		$view = $this->createMock(View::class);
		$view->expects($this->once())
			->method('verifyPath')
			->with($targetParent)
			->will($this->returnValue(true));
		$view->expects($this->once())
			->method('isCreatable')
			->with($targetParent)
			->will($this->returnValue(false));
		$view->expects($this->never())
			->method('copy');

		$info = new FileInfo('', null, null, [], null);

		$rootDir = new Directory($view, $info);
		$objectTree = $this->getMockBuilder(ObjectTree::class)
			->setMethods(['nodeExists', 'getNodeForPath'])
			->setConstructorArgs([$rootDir, $view])
			->getMock();

		$objectTree->expects($this->once())
			->method('getNodeForPath')
			->with($this->identicalTo($sourcePath))
			->will($this->returnValue(false));

		/** @var $objectTree \OCA\DAV\Connector\Sabre\ObjectTree */
		$mountManager = Filesystem::getMountManager();
		$objectTree->init($rootDir, $view, $mountManager);
		$objectTree->copy($sourcePath, $targetPath);
	}

	/**
	 * @dataProvider nodeForPathProvider
	 */
	public function testGetNodeForPath(
		$inputFileName,
		$fileInfoQueryPath,
		$outputFileName,
		$type,
		$enableChunkingHeader
	) {

		if ($enableChunkingHeader) {
			$_SERVER['HTTP_OC_CHUNKED'] = true;
		}

		$rootNode = $this->getMockBuilder('\OCA\DAV\Connector\Sabre\Directory')
			->disableOriginalConstructor()
			->getMock();
		$mountManager = $this->createMock('\OC\Files\Mount\Manager');
		$view = $this->createMock('\OC\Files\View');
		$fileInfo = $this->createMock('\OCP\Files\FileInfo');
		$fileInfo->expects($this->once())
			->method('getType')
			->will($this->returnValue($type));
		$fileInfo->expects($this->once())
			->method('getName')
			->will($this->returnValue($outputFileName));

		$view->expects($this->once())
			->method('getFileInfo')
			->with($fileInfoQueryPath)
			->will($this->returnValue($fileInfo));

		$tree = new \OCA\DAV\Connector\Sabre\ObjectTree();
		$tree->init($rootNode, $view, $mountManager);

		$node = $tree->getNodeForPath($inputFileName);

		$this->assertNotNull($node);
		$this->assertEquals($outputFileName, $node->getName());

		if ($type === 'file') {
			$this->assertTrue($node instanceof \OCA\DAV\Connector\Sabre\File);
		} else {
			$this->assertTrue($node instanceof Directory);
		}

		unset($_SERVER['HTTP_OC_CHUNKED']);
	}

	function nodeForPathProvider() {
		return [
			// regular file
			[
				'regularfile.txt',
				'regularfile.txt',
				'regularfile.txt',
				'file',
				false
			],
			// regular directory
			[
				'regulardir',
				'regulardir',
				'regulardir',
				'dir',
				false
			],
			// regular file with chunking
			[
				'regularfile.txt',
				'regularfile.txt',
				'regularfile.txt',
				'file',
				true
			],
			// regular directory with chunking
			[
				'regulardir',
				'regulardir',
				'regulardir',
				'dir',
				true
			],
			// file with chunky file name
			[
				'regularfile.txt-chunking-123566789-10-1',
				'regularfile.txt',
				'regularfile.txt',
				'file',
				true
			],
			// regular file in subdir
			[
				'subdir/regularfile.txt',
				'subdir/regularfile.txt',
				'regularfile.txt',
				'file',
				false
			],
			// regular directory in subdir
			[
				'subdir/regulardir',
				'subdir/regulardir',
				'regulardir',
				'dir',
				false
			],
			// file with chunky file name in subdir
			[
				'subdir/regularfile.txt-chunking-123566789-10-1',
				'subdir/regularfile.txt',
				'regularfile.txt',
				'file',
				true
			],
		];
	}

	/**
	 * @expectedException \OCA\DAV\Connector\Sabre\Exception\InvalidPath
	 */
	public function testGetNodeForPathInvalidPath() {
		$path = '/foo\bar';


		$storage = new Temporary([]);

		$view = $this->getMockBuilder(View::class)
			->setMethods(['resolvePath'])
			->getMock();
		$view->expects($this->once())
			->method('resolvePath')
			->will($this->returnCallback(function($path) use ($storage){
			return [$storage, ltrim($path, '/')];
		}));

		$rootNode = $this->getMockBuilder(Directory::class)
			->disableOriginalConstructor()
			->getMock();
		$mountManager = $this->createMock('\OC\Files\Mount\Manager');

		$tree = new ObjectTree();
		$tree->init($rootNode, $view, $mountManager);

		$tree->getNodeForPath($path);
	}

	public function testGetNodeForPathRoot() {
		$path = '/';


		$storage = new Temporary([]);

		$view = $this->createMock('\OC\Files\View', ['resolvePath']);
		$view->expects($this->any())
			->method('resolvePath')
			->will($this->returnCallback(function ($path) use ($storage) {
				return [$storage, ltrim($path, '/')];
			}));

		$rootNode = $this->getMockBuilder('\OCA\DAV\Connector\Sabre\Directory')
			->disableOriginalConstructor()
			->getMock();
		$mountManager = $this->createMock('\OC\Files\Mount\Manager');

		$tree = new \OCA\DAV\Connector\Sabre\ObjectTree();
		$tree->init($rootNode, $view, $mountManager);

		$this->assertInstanceOf('\Sabre\DAV\INode', $tree->getNodeForPath($path));
	}

	/**
	 * @expectedException \Sabre\DAV\Exception\Forbidden
	 * @expectedExceptionMessage Could not copy directory nameOfSourceNode, target exists
	 */
	public function testFailingMove() {
		$source = 'a/b';
		$destination = 'b/b';
		$updatables = ['a' => true, 'a/b' => true, 'b' => true, 'b/b' => false];
		$deletables = ['a/b' => true];

		$view = new TestDoubleFileView($updatables, $deletables);

		$info = new FileInfo('', null, null, [], null);

		$rootDir = new Directory($view, $info);
		$objectTree = $this->getMockBuilder(ObjectTree::class)
			->setMethods(['nodeExists', 'getNodeForPath'])
			->setConstructorArgs([$rootDir, $view])
			->getMock();

		$sourceNode = $this->getMockBuilder('\Sabre\DAV\ICollection')
			->disableOriginalConstructor()
			->getMock();
		$sourceNode->expects($this->once())
			->method('getName')
			->will($this->returnValue('nameOfSourceNode'));

		$objectTree->expects($this->once())
			->method('nodeExists')
			->with($this->identicalTo($destination))
			->will($this->returnValue(true));
		$objectTree->expects($this->once())
			->method('getNodeForPath')
			->with($this->identicalTo($source))
			->will($this->returnValue($sourceNode));

		/** @var $objectTree \OCA\DAV\Connector\Sabre\ObjectTree */
		$mountManager = Filesystem::getMountManager();
		$objectTree->init($rootDir, $view, $mountManager);
		$objectTree->move($source, $destination);
	}
}
