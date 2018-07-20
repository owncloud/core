<?php
/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Files\Node;
use OC\Files\Mount\Manager;
use OC\Files\Node\File;
use OC\Files\Node\NonExistingFile;
use OC\Files\Node\Root;
use OC\Files\View;
use OCP\Constants;
use OCP\IImage;

/**
 * Class FileTest
 *
 * @group DB
 *
 * @package Test\Files\Node
 */
class FileTest extends NodeTest {
	public $viewDeleteMethod = 'unlink';
	public $nodeClass = File::class;
	public $nonExistingNodeClass = NonExistingFile::class;

	protected function createTestNode($root, $view, $path) {
		return new File($root, $view, $path);
	}

	public function testGetContent() {
		/** @var Manager $manager */
		$manager = $this->createMock(Manager::class);
		/**
		 * @var View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock(View::class);
		$root = new Root($manager, $view, $this->user);

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
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_READ])));

		$node = new File($root, $view, '/bar/foo');
		$this->assertEquals('bar', $node->getContent());
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testGetContentNotPermitted() {
		/** @var View | \PHPUnit_Framework_MockObject_MockObject $view */
		$view = $this->createMock(View::class);
		/** @var Root | \PHPUnit_Framework_MockObject_MockObject $root */
		$root = $this->createMock(Root::class);

		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['permissions' => 0])));

		$node = new File($root, $view, '/bar/foo');
		$node->getContent();
	}

	public function testPutContent() {
		/** @var View | \PHPUnit_Framework_MockObject_MockObject $view */
		$view = $this->createMock(View::class);
		/** @var Root | \PHPUnit_Framework_MockObject_MockObject $root */
		$root = $this->createMock(Root::class);

		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_ALL])));

		$view->expects($this->once())
			->method('file_put_contents')
			->with('/bar/foo', 'bar')
			->will($this->returnValue(true));

		$node = new File($root, $view, '/bar/foo');
		$node->putContent('bar');
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testPutContentNotPermitted() {
		/** @var View | \PHPUnit_Framework_MockObject_MockObject $view */
		$view = $this->createMock(View::class);
		/** @var Root | \PHPUnit_Framework_MockObject_MockObject $root */
		$root = $this->createMock(Root::class);

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_READ])));

		$node = new File($root, $view, '/bar/foo');
		$node->putContent('bar');
	}

	public function testGetMimeType() {
		/** @var View | \PHPUnit_Framework_MockObject_MockObject $view */
		$view = $this->createMock(View::class);
		/** @var Root | \PHPUnit_Framework_MockObject_MockObject $root */
		$root = $this->createMock(Root::class);

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['mimetype' => 'text/plain'])));

		$node = new File($root, $view, '/bar/foo');
		$this->assertEquals('text/plain', $node->getMimeType());
	}

	public function testFOpenRead() {
		$stream = \fopen('php://memory', 'w+');
		\fwrite($stream, 'bar');
		\rewind($stream);

		/**
		 * @var Manager $manager
		 */
		$manager = $this->createMock(Manager::class);
		/**
		 * @var View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock(View::class);
		$root = new Root($manager, $view, $this->user);

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
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_ALL])));

		$node = new File($root, $view, '/bar/foo');
		$fh = $node->fopen('r');
		$this->assertEquals($stream, $fh);
		$this->assertEquals('bar', \fread($fh, 3));
	}

	public function testFOpenWrite() {
		$stream = \fopen('php://memory', 'w+');

		/**
		 * @var Manager $manager
		 */
		$manager = $this->createMock(Manager::class);
		/**
		 * @var View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock(View::class);
		$root = new Root($manager, new $view, $this->user);

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
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_ALL])));

		$node = new File($root, $view, '/bar/foo');
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
		 * @var Manager $manager
		 */
		$manager = $this->createMock(Manager::class);
		/**
		 * @var View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock(View::class);
		$root = new Root($manager, $view, $this->user);

		$hook = function ($file) {
			throw new \Exception('Hooks are not supposed to be called');
		};

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['permissions' => 0])));

		$node = new File($root, $view, '/bar/foo');
		$node->fopen('r');
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testFOpenReadWriteNoReadPermissions() {
		/**
		 * @var Manager $manager
		 */
		$manager = $this->createMock(Manager::class);
		/**
		 * @var View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock(View::class);
		$root = new Root($manager, $view, $this->user);

		$hook = function () {
			throw new \Exception('Hooks are not supposed to be called');
		};

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_UPDATE])));

		$node = new File($root, $view, '/bar/foo');
		$node->fopen('w');
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testFOpenReadWriteNoWritePermissions() {
		/**
		 * @var Manager $manager
		 */
		$manager = $this->createMock(Manager::class);
		/**
		 * @var View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock(View::class);
		$root = new Root($manager, new $view, $this->user);

		$hook = function () {
			throw new \Exception('Hooks are not supposed to be called');
		};

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(['permissions' => Constants::PERMISSION_READ])));

		$node = new File($root, $view, '/bar/foo');
		$node->fopen('w');
	}

	public function testThumbnail() {
		/** @var Manager $manager */
		$manager = $this->createMock(Manager::class);
		/**
		 * @var View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock(View::class);
		$root = new Root($manager, $view, $this->user);

		$hook = function ($file) {
			throw new \Exception('Hooks are not supposed to be called');
		};

		$root->listen('\OC\Files', 'preWrite', $hook);
		$root->listen('\OC\Files', 'postWrite', $hook);

		$content = $stream = \fopen('data://text/plain,hello world!', 'r');
		;
		$view->expects($this->once())
			->method('fopen')
			->with('/bar/foo')
			->will($this->returnValue($content));

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo([
				'permissions' => Constants::PERMISSION_READ,
				'mimetype' => 'text/plain',
				'fileid' => 666
			])));

		$node = new File($root, $view, '/bar/foo');
		$image = $node->getThumbnail([]);
		$this->assertInstanceOf(IImage::class, $image);
		$this->assertEquals(32, $image->height());
		$this->assertEquals(32, $image->width());
	}
}
