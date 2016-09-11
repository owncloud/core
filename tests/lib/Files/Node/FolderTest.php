<?php
/**
 * Copyright (c) 2013 Robin Appelman <icewind@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Files\Node;

use OC\Files\Cache\Cache;
use OC\Files\FileInfo;
use OC\Files\Mount\MountPoint;
use OC\Files\Node\Folder;
use OC\Files\Node\Node;
use OCP\Constants;
use OCP\Files\NotFoundException;
use Test\TestCase;

/**
 * Class FolderTest
 *
 * @group DB
 *
 * @package Test\Files\Node
 */
class FolderTest extends TestCase {
	private $user;

	protected function setUp() {
		parent::setUp();
		$this->user = new \OC\User\User('', new \Test\Util\User\Dummy);
	}

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
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));
		$root->expects($this->exactly(2))
			->method('emit')
			->will($this->returnValue(true));

		$view->expects($this->any())
			->method('getFileInfo')
			->will($this->returnValue($this->getFileInfo(array('permissions' => Constants::PERMISSION_ALL))));

		$view->expects($this->once())
			->method('rmdir')
			->with('/bar/foo')
			->will($this->returnValue(true));

		$node = new Folder($root, $view, '/bar/foo');
		$node->delete();
	}

	public function testDeleteHooks() {
		$test = $this;
		$hooksRun = 0;
		/**
		 * @param \OC\Files\Node\File $node
		 */
		$preListener = function ($node) use (&$test, &$hooksRun) {
			$test->assertInstanceOf('\OC\Files\Node\Folder', $node);
			$test->assertEquals('foo', $node->getInternalPath());
			$test->assertEquals('/bar/foo', $node->getPath());
			$hooksRun++;
		};

		/**
		 * @param \OC\Files\Node\File $node
		 */
		$postListener = function ($node) use (&$test, &$hooksRun) {
			$test->assertInstanceOf('\OC\Files\Node\NonExistingFolder', $node);
			$test->assertEquals('foo', $node->getInternalPath());
			$test->assertEquals('/bar/foo', $node->getPath());
			$test->assertEquals(1, $node->getId());
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
			->will($this->returnValue($this->getFileInfo(array('permissions' => Constants::PERMISSION_ALL, 'fileid' => 1))));

		$view->expects($this->once())
			->method('rmdir')
			->with('/bar/foo')
			->will($this->returnValue(true));

		$view->expects($this->any())
			->method('resolvePath')
			->with('/bar/foo')
			->will($this->returnValue(array(null, 'foo')));

		$node = new Folder($root, $view, '/bar/foo');
		$node->delete();
		$this->assertEquals(2, $hooksRun);
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testDeleteNotPermitted() {
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(array('permissions' => Constants::PERMISSION_READ))));

		$node = new Folder($root, $view, '/bar/foo');
		$node->delete();
	}

	public function testGetDirectoryContent() {
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$view->expects($this->any())
			->method('getDirectoryContent')
			->with('/bar/foo')
			->will($this->returnValue(array(
				new FileInfo('/bar/foo/asd', null, 'foo/asd', ['fileid' => 2, 'path' => '/bar/foo/asd', 'name' => 'asd', 'size' => 100, 'mtime' => 50, 'mimetype' => 'text/plain'], null),
				new FileInfo('/bar/foo/qwerty', null, 'foo/qwerty', ['fileid' => 3, 'path' => '/bar/foo/qwerty', 'name' => 'qwerty', 'size' => 200, 'mtime' => 55, 'mimetype' => 'httpd/unix-directory'], null)
			)));

		$node = new Folder($root, $view, '/bar/foo');
		$children = $node->getDirectoryListing();
		$this->assertEquals(2, count($children));
		$this->assertInstanceOf('\OC\Files\Node\File', $children[0]);
		$this->assertInstanceOf('\OC\Files\Node\Folder', $children[1]);
		$this->assertEquals('asd', $children[0]->getName());
		$this->assertEquals('qwerty', $children[1]->getName());
		$this->assertEquals(2, $children[0]->getId());
		$this->assertEquals(3, $children[1]->getId());
	}

	public function testGet() {
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$root->expects($this->once())
			->method('get')
			->with('/bar/foo/asd');

		$node = new Folder($root, $view, '/bar/foo');
		$node->get('asd');
	}

	public function testNodeExists() {
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$child = new Folder($root, $view, '/bar/foo/asd');

		$root->expects($this->once())
			->method('get')
			->with('/bar/foo/asd')
			->will($this->returnValue($child));

		$node = new Folder($root, $view, '/bar/foo');
		$this->assertTrue($node->nodeExists('asd'));
	}

	public function testNodeExistsNotExists() {
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$root->expects($this->once())
			->method('get')
			->with('/bar/foo/asd')
			->will($this->throwException(new NotFoundException()));

		$node = new Folder($root, $view, '/bar/foo');
		$this->assertFalse($node->nodeExists('asd'));
	}

	public function testNewFolder() {
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(array('permissions' => Constants::PERMISSION_ALL))));

		$view->expects($this->once())
			->method('mkdir')
			->with('/bar/foo/asd')
			->will($this->returnValue(true));

		$node = new Folder($root, $view, '/bar/foo');
		$child = new Folder($root, $view, '/bar/foo/asd');
		$result = $node->newFolder('asd');
		$this->assertEquals($child, $result);
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testNewFolderNotPermitted() {
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(array('permissions' => Constants::PERMISSION_READ))));

		$node = new Folder($root, $view, '/bar/foo');
		$node->newFolder('asd');
	}

	public function testNewFile() {
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(array('permissions' => Constants::PERMISSION_ALL))));

		$view->expects($this->once())
			->method('touch')
			->with('/bar/foo/asd')
			->will($this->returnValue(true));

		$node = new Folder($root, $view, '/bar/foo');
		$child = new \OC\Files\Node\File($root, $view, '/bar/foo/asd');
		$result = $node->newFile('asd');
		$this->assertEquals($child, $result);
	}

	/**
	 * @expectedException \OCP\Files\NotPermittedException
	 */
	public function testNewFileNotPermitted() {
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$view->expects($this->once())
			->method('getFileInfo')
			->with('/bar/foo')
			->will($this->returnValue($this->getFileInfo(array('permissions' => Constants::PERMISSION_READ))));

		$node = new Folder($root, $view, '/bar/foo');
		$node->newFile('asd');
	}

	public function testGetFreeSpace() {
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));

		$view->expects($this->once())
			->method('free_space')
			->with('/bar/foo')
			->will($this->returnValue(100));

		$node = new Folder($root, $view, '/bar/foo');
		$this->assertEquals(100, $node->getFreeSpace());
	}

	public function testSearch() {
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));
		$storage = $this->createMock('\OC\Files\Storage\Storage');
		$cache = $this->getMockBuilder('\OC\Files\Cache\Cache')
			->setConstructorArgs([''])
			->getMock();

		$storage->expects($this->once())
			->method('getCache')
			->will($this->returnValue($cache));

		$mount = $this->createMock('\OCP\Files\Mount\IMountPoint');
		$mount->expects($this->once())
			->method('getStorage')
			->will($this->returnValue($storage));
		$mount->expects($this->once())
			->method('getInternalPath')
			->will($this->returnValue('foo'));

		$cache->expects($this->once())
			->method('search')
			->with('%qw%')
			->will($this->returnValue(array(
				array('fileid' => 3, 'path' => 'foo/qwerty', 'name' => 'qwerty', 'size' => 200, 'mtime' => 55, 'mimetype' => 'text/plain')
			)));

		$root->expects($this->once())
			->method('getMountsIn')
			->with('/bar/foo')
			->will($this->returnValue(array()));

		$root->expects($this->once())
			->method('getMount')
			->with('/bar/foo')
			->will($this->returnValue($mount));

		$node = new Folder($root, $view, '/bar/foo');
		$result = $node->search('qw');
		$this->assertEquals(1, count($result));
		$this->assertEquals('/bar/foo/qwerty', $result[0]->getPath());
	}

	public function testSearchInRoot() {
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setMethods(['getUser', 'getMountsIn', 'getMount'])
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();

		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));
		$storage = $this->createMock('\OC\Files\Storage\Storage');
		$cache = $this->getMockBuilder('\OC\Files\Cache\Cache')
			->setConstructorArgs([''])
			->getMock();

		$mount = $this->createMock('\OCP\Files\Mount\IMountPoint');
		$mount->expects($this->once())
			->method('getStorage')
			->will($this->returnValue($storage));
		$mount->expects($this->once())
			->method('getInternalPath')
			->will($this->returnValue('files'));

		$storage->expects($this->once())
			->method('getCache')
			->will($this->returnValue($cache));

		$cache->expects($this->once())
			->method('search')
			->with('%qw%')
			->will($this->returnValue(array(
				array('fileid' => 3, 'path' => 'files/foo', 'name' => 'qwerty', 'size' => 200, 'mtime' => 55, 'mimetype' => 'text/plain'),
				array('fileid' => 3, 'path' => 'files_trashbin/foo2.d12345', 'name' => 'foo2.d12345', 'size' => 200, 'mtime' => 55, 'mimetype' => 'text/plain'),
			)));

		$root->expects($this->once())
			->method('getMountsIn')
			->with('')
			->will($this->returnValue(array()));

		$root->expects($this->once())
			->method('getMount')
			->with('')
			->will($this->returnValue($mount));

		$result = $root->search('qw');
		$this->assertEquals(1, count($result));
		$this->assertEquals('/foo', $result[0]->getPath());
	}

	public function testSearchInStorageRoot() {
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));
		$storage = $this->createMock('\OC\Files\Storage\Storage');
		$cache = $this->createMock(Cache::class);

		$mount = $this->createMock('\OCP\Files\Mount\IMountPoint');
		$mount->expects($this->once())
			->method('getStorage')
			->will($this->returnValue($storage));
		$mount->expects($this->once())
			->method('getInternalPath')
			->will($this->returnValue(''));

		$storage->expects($this->once())
			->method('getCache')
			->will($this->returnValue($cache));

		$cache->expects($this->once())
			->method('search')
			->with('%qw%')
			->will($this->returnValue(array(
				array('fileid' => 3, 'path' => 'foo/qwerty', 'name' => 'qwerty', 'size' => 200, 'mtime' => 55, 'mimetype' => 'text/plain')
			)));

		$root->expects($this->once())
			->method('getMountsIn')
			->with('/bar')
			->will($this->returnValue(array()));

		$root->expects($this->once())
			->method('getMount')
			->with('/bar')
			->will($this->returnValue($mount));

		$node = new Folder($root, $view, '/bar');
		$result = $node->search('qw');
		$this->assertEquals(1, count($result));
		$this->assertEquals('/bar/foo/qwerty', $result[0]->getPath());
	}

	public function testSearchByTag() {
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setMethods(['getUser', 'getMountsIn', 'getMount'])
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));
		$storage = $this->createMock('\OC\Files\Storage\Storage');
		$cache = $this->createMock(Cache::class);

		$mount = $this->createMock('\OCP\Files\Mount\IMountPoint');
		$mount->expects($this->once())
			->method('getStorage')
			->will($this->returnValue($storage));
		$mount->expects($this->once())
			->method('getInternalPath')
			->will($this->returnValue('foo'));

		$storage->expects($this->once())
			->method('getCache')
			->will($this->returnValue($cache));

		$cache->expects($this->once())
			->method('searchByTag')
			->with('tag1', 'user1')
			->will($this->returnValue(array(
				array('fileid' => 3, 'path' => 'foo/qwerty', 'name' => 'qwerty', 'size' => 200, 'mtime' => 55, 'mimetype' => 'text/plain')
			)));

		$root->expects($this->once())
			->method('getMountsIn')
			->with('/bar/foo')
			->will($this->returnValue(array()));

		$root->expects($this->once())
			->method('getMount')
			->with('/bar/foo')
			->will($this->returnValue($mount));

		$node = new Folder($root, $view, '/bar/foo');
		$result = $node->searchByTag('tag1', 'user1');
		$this->assertEquals(1, count($result));
		$this->assertEquals('/bar/foo/qwerty', $result[0]->getPath());
	}

	public function testSearchSubStorages() {
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setMethods(['getUser', 'getMountsIn', 'getMount'])
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));
		$storage = $this->createMock('\OC\Files\Storage\Storage');
		$cache = $this->createMock(Cache::class);
		$subCache = $this->createMock(Cache::class);
		$subStorage = $this->createMock('\OC\Files\Storage\Storage');
		$subMount = $this->createMock('\OC\Files\Mount\MountPoint', array(), array(null, ''));

		$mount = $this->createMock('\OCP\Files\Mount\IMountPoint');
		$mount->expects($this->once())
			->method('getStorage')
			->will($this->returnValue($storage));
		$mount->expects($this->once())
			->method('getInternalPath')
			->will($this->returnValue('foo'));

		$subMount->expects($this->once())
			->method('getStorage')
			->will($this->returnValue($subStorage));

		$subMount->expects($this->once())
			->method('getMountPoint')
			->will($this->returnValue('/bar/foo/bar/'));

		$storage->expects($this->once())
			->method('getCache')
			->will($this->returnValue($cache));

		$subStorage->expects($this->once())
			->method('getCache')
			->will($this->returnValue($subCache));

		$cache->expects($this->once())
			->method('search')
			->with('%qw%')
			->will($this->returnValue(array(
				array('fileid' => 3, 'path' => 'foo/qwerty', 'name' => 'qwerty', 'size' => 200, 'mtime' => 55, 'mimetype' => 'text/plain')
			)));

		$subCache->expects($this->once())
			->method('search')
			->with('%qw%')
			->will($this->returnValue(array(
				array('fileid' => 4, 'path' => 'asd/qweasd', 'name' => 'qweasd', 'size' => 200, 'mtime' => 55, 'mimetype' => 'text/plain')
			)));

		$root->expects($this->once())
			->method('getMountsIn')
			->with('/bar/foo')
			->will($this->returnValue(array($subMount)));

		$root->expects($this->once())
			->method('getMount')
			->with('/bar/foo')
			->will($this->returnValue($mount));


		$node = new Folder($root, $view, '/bar/foo');
		$result = $node->search('qw');
		$this->assertEquals(2, count($result));
	}

	public function testIsSubNode() {
		$file = new Node(null, null, '/foo/bar');
		$folder = new Folder(null, null, '/foo');
		$this->assertTrue($folder->isSubNode($file));
		$this->assertFalse($folder->isSubNode($folder));

		$file = new Node(null, null, '/foobar');
		$this->assertFalse($folder->isSubNode($file));
	}

	public function testGetById() {
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setMethods(['getUser', 'getMountsIn', 'getMount'])
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();

		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));
		$storage = $this->createMock('\OC\Files\Storage\Storage');
		$mount = new MountPoint($storage, '/bar');
		$cache = $this->createMock(Cache::class);

		$view->expects($this->once())
			->method('getFileInfo')
			->will($this->returnValue(new FileInfo('/bar/foo/qwerty', null, 'qwerty', ['mimetype' => 'text/plain'], null)));

		$storage->expects($this->once())
			->method('getCache')
			->will($this->returnValue($cache));

		$cache->expects($this->once())
			->method('getPathById')
			->with('1')
			->will($this->returnValue('foo/qwerty'));

		$root->expects($this->once())
			->method('getMountsIn')
			->with('/bar/foo')
			->will($this->returnValue(array()));

		$root->expects($this->once())
			->method('getMount')
			->with('/bar/foo')
			->will($this->returnValue($mount));

		$node = new Folder($root, $view, '/bar/foo');
		$result = $node->getById(1);
		$this->assertEquals(1, count($result));
		$this->assertEquals('/bar/foo/qwerty', $result[0]->getPath());
	}

	public function testGetByIdOutsideFolder() {
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setMethods(['getUser', 'getMountsIn', 'getMount'])
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));
		$storage = $this->createMock('\OC\Files\Storage\Storage');
		$mount = new MountPoint($storage, '/bar');
		$cache = $this->createMock(Cache::class);

		$storage->expects($this->once())
			->method('getCache')
			->will($this->returnValue($cache));

		$cache->expects($this->once())
			->method('getPathById')
			->with('1')
			->will($this->returnValue('foobar'));

		$root->expects($this->once())
			->method('getMountsIn')
			->with('/bar/foo')
			->will($this->returnValue(array()));

		$root->expects($this->once())
			->method('getMount')
			->with('/bar/foo')
			->will($this->returnValue($mount));

		$node = new Folder($root, $view, '/bar/foo');
		$result = $node->getById(1);
		$this->assertCount(0, $result);
	}

	public function testGetByIdMultipleStorages() {
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setMethods(['getUser', 'getMountsIn', 'getMount'])
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();
		$root->expects($this->any())
			->method('getUser')
			->will($this->returnValue($this->user));
		$storage = $this->createMock('\OC\Files\Storage\Storage');
		$mount1 = new MountPoint($storage, '/bar');
		$mount2 = new MountPoint($storage, '/bar/foo/asd');
		$cache = $this->createMock(Cache::class);

		$view->expects($this->any())
			->method('getFileInfo')
			->will($this->returnValue(new FileInfo('/bar/foo/qwerty', null, 'qwerty', ['mimetype' => 'plain'], null)));

		$storage->expects($this->any())
			->method('getCache')
			->will($this->returnValue($cache));

		$cache->expects($this->any())
			->method('getPathById')
			->with('1')
			->will($this->returnValue('foo/qwerty'));

		$root->expects($this->any())
			->method('getMountsIn')
			->with('/bar/foo')
			->will($this->returnValue(array($mount2)));

		$root->expects($this->once())
			->method('getMount')
			->with('/bar/foo')
			->will($this->returnValue($mount1));

		$node = new Folder($root, $view, '/bar/foo');
		$result = $node->getById(1);
		$this->assertEquals(2, count($result));
		$this->assertEquals('/bar/foo/qwerty', $result[0]->getPath());
		$this->assertEquals('/bar/foo/asd/foo/qwerty', $result[1]->getPath());
	}

	public function uniqueNameProvider() {
		return [
			// input, existing, expected
			['foo', []					, 'foo'],
			['foo', ['foo']				, 'foo (2)'],
			['foo', ['foo', 'foo (2)']	, 'foo (3)']
		];
	}

	/**
	 * @dataProvider uniqueNameProvider
	 */
	public function testGetUniqueName($name, $existingFiles, $expected) {
		$manager = $this->createMock('\OC\Files\Mount\Manager');
		$folderPath = '/bar/foo';
		/**
		 * @var \OC\Files\View | \PHPUnit_Framework_MockObject_MockObject $view
		 */
		$view = $this->createMock('\OC\Files\View');
		$root = $this->getMockBuilder('\OC\Files\Node\Root')
			->setMethods(['getUser', 'getMountsIn', 'getMount'])
			->setConstructorArgs([$manager, $view, $this->user])
			->getMock();

		$view->expects($this->any())
			->method('file_exists')
			->will($this->returnCallback(function ($path) use ($existingFiles, $folderPath) {
				foreach ($existingFiles as $existing) {
					if ($folderPath . '/' . $existing === $path){
						return true;
					}
				}
				return false;
			}));

		$node = new Folder($root, $view, $folderPath);
		$this->assertEquals($expected, $node->getNonExistingName($name));
	}
}
