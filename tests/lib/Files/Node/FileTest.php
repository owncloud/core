<?php
/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Files\Node;

/**
 * Class FileTest
 *
 * @group DB
 *
 * @package Test\Files\Node
 */
class FileTest extends NodeTest {
	public $viewDeleteMethod = 'unlink';
	public $nodeClass = '\OC\Files\Node\File';
	public $nonExistingNodeClass = '\OC\Files\Node\NonExistingFile';

	protected function createTestNode($root, $view, $path) {
		return new \OC\Files\Node\File($root, $view, $path);
	}

	public function testGetContent() {
		/**
		 * @var \OC\Files\Mount\Manager $manager
		 */
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = new \OC\Files\Node\Root($manager, $view, $this->user);

		$hook = function ($file) {
			throw new \Exception('Hooks are not supposed to be called');
		};

		$root->listen('\OC\Files', 'preWrite', $hook);
		$root->listen('\OC\Files', 'postWrite', $hook);

		$view->expects($this->once())
			->method('file_get_contents')
			->with('/bar/foo')
			->will($this->returnValue('bar'));

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['permissions' => \OCP\Constants::PERMISSION_READ])));

		$node = new \OC\Files\Node\File($root, $view, '/bar/foo');
		$this->assertEquals('bar', $node->getContent());
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testGetContentNotPermitted() {
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
			->will($this->returnValue($this->getFileInfo(['permissions' => 0])));

		$node = new \OC\Files\Node\File($root, $view, '/bar/foo');
		$node->getContent();
	}

	public function testPutContent() {
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
			->will($this->returnValue($this->getFileInfo(['permissions' => \OCP\Constants::PERMISSION_ALL])));

		$view->expects($this->once())
			->method('file_put_contents')
			->with('/bar/foo', 'bar')
			->will($this->returnValue(true));

		$node = new \OC\Files\Node\File($root, $view, '/bar/foo');
		$node->putContent('bar');
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testPutContentNotPermitted() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['permissions' => \OCP\Constants::PERMISSION_READ])));

		$node = new \OC\Files\Node\File($root, $view, '/bar/foo');
		$node->putContent('bar');
	}

	public function testGetMimeType() {
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->createMock('\OC\Files\Node\Root');

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['mimetype' => 'text/plain'])));

		$node = new \OC\Files\Node\File($root, $view, '/bar/foo');
		$this->assertEquals('text/plain', $node->getMimeType());
	}

	public function testFOpenRead() {
		$stream = \fopen('php://memory', 'w+');
		\fwrite($stream, 'bar');
		\rewind($stream);

		/**
		 * @var \OC\Files\Mount\Manager $manager
		 */
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = new \OC\Files\Node\Root($manager, $view, $this->user);

		$hook = function ($file) {
			throw new \Exception('Hooks are not supposed to be called');
		};

		$root->listen('\OC\Files', 'preWrite', $hook);
		$root->listen('\OC\Files', 'postWrite', $hook);

		$view->expects($this->once())
			->method('fopen')
			->with('/bar/foo', 'r')
			->will($this->returnValue($stream));

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['permissions' => \OCP\Constants::PERMISSION_ALL])));

		$node = new \OC\Files\Node\File($root, $view, '/bar/foo');
		$fh = $node->fopen('r');
		$this->assertEquals($stream, $fh);
		$this->assertEquals('bar', \fread($fh, 3));
	}

	public function testFOpenWrite() {
		$stream = \fopen('php://memory', 'w+');

		/**
		 * @var \OC\Files\Mount\Manager $manager
		 */
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = new \OC\Files\Node\Root($manager, new $view, $this->user);

		$hooksCalled = 0;
		$hook = function ($file) use (&$hooksCalled) {
			$hooksCalled++;
		};

		$root->listen('\OC\Files', 'preWrite', $hook);
		$root->listen('\OC\Files', 'postWrite', $hook);

		$view->expects($this->once())
			->method('fopen')
			->with('/bar/foo', 'w')
			->will($this->returnValue($stream));

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['permissions' => \OCP\Constants::PERMISSION_ALL])));

		$node = new \OC\Files\Node\File($root, $view, '/bar/foo');
		$fh = $node->fopen('w');
		$this->assertEquals($stream, $fh);
		\fwrite($fh, 'bar');
		\rewind($fh);
		$this->assertEquals('bar', \fread($stream, 3));
		$this->assertEquals(2, $hooksCalled);
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testFOpenReadNotPermitted() {
		/**
		 * @var \OC\Files\Mount\Manager $manager
		 */
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = new \OC\Files\Node\Root($manager, $view, $this->user);

		$hook = function ($file) {
			throw new \Exception('Hooks are not supposed to be called');
		};

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['permissions' => 0])));

		$node = new \OC\Files\Node\File($root, $view, '/bar/foo');
		$node->fopen('r');
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testFOpenReadWriteNoReadPermissions() {
		/**
		 * @var \OC\Files\Mount\Manager $manager
		 */
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = new \OC\Files\Node\Root($manager, $view, $this->user);

		$hook = function () {
			throw new \Exception('Hooks are not supposed to be called');
		};

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['permissions' => \OCP\Constants::PERMISSION_UPDATE])));

		$node = new \OC\Files\Node\File($root, $view, '/bar/foo');
		$node->fopen('w');
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testFOpenReadWriteNoWritePermissions() {
		/**
		 * @var \OC\Files\Mount\Manager $manager
		 */
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = new \OC\Files\Node\Root($manager, new $view, $this->user);

		$hook = function () {
			throw new \Exception('Hooks are not supposed to be called');
		};

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['permissions' => \OCP\Constants::PERMISSION_READ])));

		$node = new \OC\Files\Node\File($root, $view, '/bar/foo');
		$node->fopen('w');
	}
}
