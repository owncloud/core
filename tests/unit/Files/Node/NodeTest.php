<?php
/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Files\Node;

use OC\Files\FileInfo;
use OCP\Constants;
use OCP\Files\NotFoundException;
use OCP\IUser;
use Test\TestCase;

/**
 * Class NodeTest
 *
 * @package Test\Files\Node
 */
abstract class NodeTest extends TestCase {
	protected $viewDeleteMethod = 'unlink';
	protected $user;

	protected function setUp() {
		parent::setUp();
		$this->user = $this->createMock(IUser::class);
	}

	protected abstract function createTestNode($root, $view, $path);

	protected function getMockStorage() {
		$storage = $this->createMock('\OCP\Files\Storage');
		$storage->expects($this->any())
			->method('getId')
			->will($this->returnValue('home::someuser'));
		return $storage;
	}

	protected function getFileInfo($data) {
		return new FileInfo('', $this->getMockStorage(), '', $data, null);
	}

	public function testDelete() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');

		$root = $this->createMock('\OC\Files\Node\Root');
		$root->expects($this->exactly(2))
			->method('emit')
			->will($this->returnValue(true));
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_ALL])));

		$view->expects($this->once())
			->method($this->viewDeleteMethod)
			->with('/bar/foo')
			->will($this->returnValue(true));

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$node->delete();
	}

	public function testDeleteHooks() {
		$test = $this;
		$hooksRun = 0;
		/**
		 * @param \OC\Files\Node\File $node
		 */
		$preListener = function ($node) use (&$test, &$hooksRun) {
			$test->assertInstanceOf($this->nodeClass, $node);
			$test->assertEquals('foo', $node->getInternalPath());
			$test->assertEquals('/bar/foo', $node->getPath());
			$test->assertEquals(1, $node->getId());
			$hooksRun++;
		};

		/**
		 * @param \OC\Files\Node\File $node
		 */
		$postListener = function ($node) use (&$test, &$hooksRun) {
			$test->assertInstanceOf($this->nonExistingNodeClass, $node);
			$test->assertEquals('foo', $node->getInternalPath());
			$test->assertEquals('/bar/foo', $node->getPath());
			$test->assertEquals(1, $node->getId());
			$test->assertEquals('text/plain', $node->getMimeType());
			$hooksRun++;
		};

		/**
		 * @var \OC\Files\Mount\Manager $manager
		 */
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = new \OC\Files\Node\Root($manager, $view, $this->user);
		$root->listen('\OC\Files', 'preDelete', $preListener);
		$root->listen('\OC\Files', 'postDelete', $postListener);

		$view->expects($this->any())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_ALL, 'fileid' => 1, 'mimetype' => 'text/plain'])));

		$view->expects($this->once())
			->method($this->viewDeleteMethod)
			->with('/bar/foo')
			->will($this->returnValue(true));

		$view->expects($this->any())
			->method('resolvePath')
			->with('/bar/foo')
			->will($this->returnValue([null, 'foo']));

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$node->delete();
		$this->assertEquals(2, $hooksRun);
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testDeleteNotPermitted() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');

		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_READ])));

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$node->delete();
	}


	public function testStat() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$stat = [
			'fileid' => 1,
			'size' => 100,
			'etag' => 'qwerty',
			'mtime' => 50,
			'permissions' => 0
		];

		$view->expects($this->once())
			->method('stat')
			->with('/bar/foo')
			->will($this->returnValue($stat));

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$this->assertEquals($stat, $node->stat());
	}

	public function testGetId() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$stat = $this->getFileInfo([
			'fileid' => 1,
			'size' => 100,
			'etag' => 'qwerty',
			'mtime' => 50
		]);

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($stat));

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$this->assertEquals(1, $node->getId());
	}

	public function testGetSize() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));


		$stat = $this->getFileInfo([
			'fileid' => 1,
			'size' => 100,
			'etag' => 'qwerty',
			'mtime' => 50
		]);

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($stat));

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$this->assertEquals(100, $node->getSize());
	}

	public function testGetEtag() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$stat = $this->getFileInfo([
			'fileid' => 1,
			'size' => 100,
			'etag' => 'qwerty',
			'mtime' => 50
		]);

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($stat));

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$this->assertEquals('qwerty', $node->getEtag());
	}

	public function testGetMTime() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$stat = $this->getFileInfo([
			'fileid' => 1,
			'size' => 100,
			'etag' => 'qwerty',
			'mtime' => 50
		]);

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($stat));

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$this->assertEquals(50, $node->getMTime());
	}

	public function testGetStorage() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));
		/**
		 * @var \OC\Files\Storage\Storage | \PHPUnit_Framework_MockObject_MockObject $storage
		 */
		$storage = $this->createMock('\OC\Files\Storage\Storage');

		$view->expects($this->once())
			->method('resolvePath')
			->with('/bar/foo')
			->will($this->returnValue([$storage, 'foo']));


		$node = $this->createTestNode($root, $view, '/bar/foo');
		$this->assertEquals($storage, $node->getStorage());
	}

	public function testGetPath() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$this->assertEquals('/bar/foo', $node->getPath());
	}

	public function testGetInternalPath() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));
		/**
		 * @var \OC\Files\Storage\Storage | \PHPUnit_Framework_MockObject_MockObject $storage
		 */
		$storage = $this->createMock('\OC\Files\Storage\Storage');

		$view->expects($this->once())
			->method('resolvePath')
			->with('/bar/foo')
			->will($this->returnValue([$storage, 'foo']));


		$node = $this->createTestNode($root, $view, '/bar/foo');
		$this->assertEquals('foo', $node->getInternalPath());
	}

	public function testGetName() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$this->assertEquals('foo', $node->getName());
	}

	public function testTouchSetMTime() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$view->expects($this->once())
			->method('touch')
			->with('/bar/foo', 100)
			->will($this->returnValue(true));

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_ALL])));

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$node->touch(100);
		$this->assertEquals(100, $node->getMTime());
	}

	public function testTouchHooks() {
		$test = $this;
		$hooksRun = 0;
		/**
		 * @param \OC\Files\Node\File $node
		 */
		$preListener = function ($node) use (&$test, &$hooksRun) {
			$test->assertEquals('foo', $node->getInternalPath());
			$test->assertEquals('/bar/foo', $node->getPath());
			$hooksRun++;
		};

		/**
		 * @param \OC\Files\Node\File $node
		 */
		$postListener = function ($node) use (&$test, &$hooksRun) {
			$test->assertEquals('foo', $node->getInternalPath());
			$test->assertEquals('/bar/foo', $node->getPath());
			$hooksRun++;
		};

		/**
		 * @var \OC\Files\Mount\Manager $manager
		 */
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = new \OC\Files\Node\Root($manager, $view, $this->user);
		$root->listen('\OC\Files', 'preTouch', $preListener);
		$root->listen('\OC\Files', 'postTouch', $postListener);

		$view->expects($this->once())
			->method('touch')
			->with('/bar/foo', 100)
			->will($this->returnValue(true));

		$view->expects($this->any())
			->method('resolvePath')
			->with('/bar/foo')
			->will($this->returnValue([null, 'foo']));

		$view->expects($this->any())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_ALL])));

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$node->touch(100);
		$this->assertEquals(2, $hooksRun);
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testTouchNotPermitted() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$view->expects($this->any())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_READ])));

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$node->touch(100);
	}

	/**
	 * @expectedException \OCP\Files\InvalidPathException
	 */
	public function testInvalidPath() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');

		$node = $this->createTestNode($root, $view, '/../foo');
		$node->getFileInfo();
	}

	public function testCopySameStorage() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');

		$view->expects($this->any())
			->method('copy')
			->with('/bar/foo', '/bar/asd')
			->will($this->returnValue(true));

		$view->expects($this->any())
			->method('getFileInfo')
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_ALL, 'fileid' => 3])));

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$parentNode = new \OC\Files\Node\Folder($root, $view, '/bar');
		$newNode = $this->createTestNode($root, $view, '/bar/asd');

		$root->expects($this->exactly(2))
			->method('get')
			->will($this->returnValueMap([
				['/bar/asd', $newNode],
				['/bar', $parentNode]
			]));

		$target = $node->copy('/bar/asd');
		$this->assertInstanceOf($this->nodeClass, $target);
		$this->assertEquals(3, $target->getId());
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testCopyNotPermitted() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');
		/**
		 * @var \OC\Files\Storage\Storage | \PHPUnit_Framework_MockObject_MockObject $storage
		 */
		$storage = $this->createMock('\OC\Files\Storage\Storage');

		$root->expects($this->never())
			->method('getMount');

		$storage->expects($this->never())
			->method('copy');

		$view->expects($this->any())
			->method('getFileInfo')
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_READ, 'fileid' => 3])));

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$parentNode = new \OC\Files\Node\Folder($root, $view, '/bar');

		$root->expects($this->once())
			->method('get')
			->will($this->returnValueMap([
				['/bar', $parentNode]
			]));

		$node->copy('/bar/asd');
	}

	/**
	 * @expectedException \OCP\Files\NotFoundException
	 */
	public function testCopyNoParent() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');

		$view->expects($this->never())
			->method('copy');

		$node = $this->createTestNode($root, $view, '/bar/foo');

		$root->expects($this->once())
			->method('get')
			->with('/bar/asd')
			->will($this->throwException(new NotFoundException()));

		$node->copy('/bar/asd/foo');
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testCopyParentIsFile() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');

		$view->expects($this->never())
			->method('copy');

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$parentNode = new \OC\Files\Node\File($root, $view, '/bar');

		$root->expects($this->once())
			->method('get')
			->will($this->returnValueMap([
				['/bar', $parentNode]
			]));

		$node->copy('/bar/asd');
	}

	public function testMoveSameStorage() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');

		$view->expects($this->any())
			->method('rename')
			->with('/bar/foo', '/bar/asd')
			->will($this->returnValue(true));

		$view->expects($this->any())
			->method('getFileInfo')
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_ALL, 'fileid' => 1])));

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$parentNode = new \OC\Files\Node\Folder($root, $view, '/bar');

		$targetTestNode = $this->createTestNode($root, $view, '/bar/asd');

		$root->expects($this->any())
			->method('get')
			->will($this->returnValueMap([['/bar', $parentNode], ['/bar/asd', $targetTestNode]]));

		$target = $node->move('/bar/asd');
		$this->assertInstanceOf($this->nodeClass, $target);
		$this->assertEquals(1, $target->getId());
		$this->assertEquals('/bar/asd', $node->getPath());
	}

	public function moveOrCopyProvider() {
		return [
			['move', 'rename', 'preRename', 'postRename'],
			['copy', 'copy', 'preCopy', 'postCopy'],
		];
	}

	/**
	 * @dataProvider moveOrCopyProvider
	 */
	public function testMoveCopyHooks($operationMethod, $viewMethod, $preHookName, $postHookName) {
		/**
		 * @var \OC\Files\Mount\Manager $manager
		 */
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setConstructorArgs([$manager, $view, $this->user])
			->setMethods(['get'])
			->getMock();

		$view->expects($this->any())
			->method($viewMethod)
			->with('/bar/foo', '/bar/asd')
			->will($this->returnValue(true));

		$view->expects($this->any())
			->method('getFileInfo')
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_ALL, 'fileid' => 1])));

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$parentNode = new \OC\Files\Node\Folder($root, $view, '/bar');
		$targetTestNode = $this->createTestNode($root, $view, '/bar/asd');

		$root->expects($this->any())
			->method('get')
			->will($this->returnValueMap([['/bar', $parentNode], ['/bar/asd', $targetTestNode]]));

		$hooksRun = 0;
		/**
		 * @param \OC\Files\Node\File $node
		 */
		$preListener = function ($sourceNode, $targetNode) use (&$hooksRun, $node) {
			$this->assertSame($node, $sourceNode);
			$this->assertInstanceOf($this->nodeClass, $sourceNode);
			$this->assertInstanceOf($this->nonExistingNodeClass, $targetNode);
			$this->assertEquals('/bar/asd', $targetNode->getPath());
			$hooksRun++;
		};

		/**
		 * @param \OC\Files\Node\File $node
		 */
		$postListener = function ($sourceNode, $targetNode) use (&$hooksRun, $node, $targetTestNode) {
			$this->assertSame($node, $sourceNode);
			$this->assertNotSame($node, $targetNode);
			$this->assertSame($targetTestNode, $targetNode);
			$this->assertInstanceOf($this->nodeClass, $sourceNode);
			$this->assertInstanceOf($this->nodeClass, $targetNode);
			$hooksRun++;
		};

		/**
		 * @param \OC\Files\Node\File $node
		 */
		$preWriteListener = function ($targetNode) use (&$hooksRun) {
			$this->assertInstanceOf($this->nonExistingNodeClass, $targetNode);
			$this->assertEquals('/bar/asd', $targetNode->getPath());
			$hooksRun++;
		};

		/**
		 * @param \OC\Files\Node\File $node
		 */
		$postWriteListener = function ($targetNode) use (&$hooksRun, $targetTestNode) {
			$this->assertSame($targetTestNode, $targetNode);
			$hooksRun++;
		};

		$root->listen('\OC\Files', $preHookName, $preListener);
		$root->listen('\OC\Files', 'preWrite', $preWriteListener);
		$root->listen('\OC\Files', $postHookName, $postListener);
		$root->listen('\OC\Files', 'postWrite', $postWriteListener);

		$target = $node->$operationMethod('/bar/asd');

		$this->assertEquals(4, $hooksRun);
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testMoveNotPermitted() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');

		$view->expects($this->any())
			->method('getFileInfo')
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_READ])));

		$view->expects($this->never())
			->method('rename');

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$parentNode = new \OC\Files\Node\Folder($root, $view, '/bar');

		$root->expects($this->once())
			->method('get')
			->with('/bar')
			->will($this->returnValue($parentNode));

		$node->move('/bar/asd');
	}

	/**
	 * @expectedException \OCP\Files\NotFoundException
	 */
	public function testMoveNoParent() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');
		/**
		 * @var \OC\Files\Storage\Storage | \PHPUnit_Framework_MockObject_MockObject $storage
		 */
		$storage = $this->createMock('\OC\Files\Storage\Storage');

		$storage->expects($this->never())
			->method('rename');

		$node = $this->createTestNode($root, $view, '/bar/foo');

		$root->expects($this->once())
			->method('get')
			->with('/bar')
			->will($this->throwException(new NotFoundException()));

		$node->move('/bar/asd');
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testMoveParentIsFile() {
		/**
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');

		$view->expects($this->never())
			->method('rename');

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$parentNode = new \OC\Files\Node\File($root, $view, '/bar');

		$root->expects($this->once())
			->method('get')
			->with('/bar')
			->will($this->returnValue($parentNode));

		$node->move('/bar/asd');
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testMoveFailed() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');

		$view->expects($this->any())
			->method('rename')
			->with('/bar/foo', '/bar/asd')
			->will($this->returnValue(false));

		$view->expects($this->any())
			->method('getFileInfo')
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_ALL, 'fileid' => 1])));

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$parentNode = new \OC\Files\Node\Folder($root, $view, '/bar');

		$root->expects($this->any())
			->method('get')
			->will($this->returnValueMap([['/bar', $parentNode], ['/bar/asd', $node]]));

		$node->move('/bar/asd');
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testCopyFailed() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');

		$view->expects($this->any())
			->method('copy')
			->with('/bar/foo', '/bar/asd')
			->will($this->returnValue(false));

		$view->expects($this->any())
			->method('getFileInfo')
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_ALL, 'fileid' => 1])));

		$node = $this->createTestNode($root, $view, '/bar/foo');
		$parentNode = new \OC\Files\Node\Folder($root, $view, '/bar');

		$root->expects($this->any())
			->method('get')
			->will($this->returnValueMap([['/bar', $parentNode], ['/bar/asd', $node]]));

		$node->copy('/bar/asd');
	}
}
