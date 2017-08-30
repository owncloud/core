<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCA\DAV\Tests\unit;


use OC\Files\FileInfo;
use OC\Files\Filesystem;
use OC\Files\Storage\Temporary;
use OC\Files\View;
use OCA\DAV\Connector\Sabre\Directory;
use OCA\DAV\Connector\Sabre\ObjectTree;
use Test\TestCase;

/**
 * Class TreeTest
 *
 * @group DB
 *
 * @package OCA\DAV\Tests\Unit
 */
class TreeTest extends TestCase {

	/**
	 * @dataProvider nodeForPathProvider
	 */
	public function testGetNodeForPath(
		$inputFileName,
		$fileInfoQueryPath,
		$outputFileName,
		$type
	) {
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
	}

	function nodeForPathProvider() {
		return [
			// regular file
			[
				'regularfile.txt',
				'regularfile.txt',
				'regularfile.txt',
				'file',
			],
			// regular directory
			[
				'regulardir',
				'regulardir',
				'regulardir',
				'dir',
			],
			// regular file in subdir
			[
				'subdir/regularfile.txt',
				'subdir/regularfile.txt',
				'regularfile.txt',
				'file',
			],
			// regular directory in subdir
			[
				'subdir/regulardir',
				'subdir/regulardir',
				'regulardir',
				'dir',
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

}
