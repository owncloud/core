<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OCA\DAV\Tests\Unit\Connector\Sabre;

use OC\Files\FileInfo;
use OC\Files\View;
use OCA\DAV\Connector\Sabre\Directory;
use OCP\Files\Storage\IStorage;
use OCP\Files\FileContentNotAllowedException;
use OCP\Files\ForbiddenException;
use OCP\Constants;
use OCP\Files\StorageNotAvailableException;

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
 * @group DB
 */
class DirectoryTest extends \Test\TestCase {
	/** @var \OC\Files\View | \PHPUnit\Framework\MockObject\MockObject */
	private $view;
	/** @var \OC\Files\FileInfo | \PHPUnit\Framework\MockObject\MockObject */
	private $info;

	protected function setUp(): void {
		parent::setUp();

		$this->view = $this->createMock('OC\Files\View', [], [], '', false);
		$this->info = $this->createMock('OC\Files\FileInfo', [], [], '', false);
		$this->info->expects($this->any())
			->method('isReadable')
			->will($this->returnValue(true));
	}

	private function getDir($path = '/') {
		$this->view->expects($this->once())
			->method('getRelativePath')
			->will($this->returnValue($path));

		$this->info->expects($this->once())
			->method('getPath')
			->will($this->returnValue($path));

		return new Directory($this->view, $this->info);
	}

	public function childExistsProvider() {
		return [
			[true],
			[false],
		];
	}

	/**
	 * @dataProvider childExistsProvider
	 */
	public function testChildExists($exists) {
		$this->view->method('file_exists')
			->willReturn($exists);
		$dir = $this->getDir();
		$this->assertSame($exists, $dir->childExists('/foo'));
	}

	/**
	 */
	public function testChildExistsStorageNotAvailable() {
		$this->expectException(\Sabre\DAV\Exception\ServiceUnavailable::class);

		$this->view->method('file_exists')
			->will($this->throwException(new StorageNotAvailableException()));
		$dir = $this->getDir();
		$dir->childExists('/foo');
	}

	/**
	 */
	public function testDeleteRootFolderFails() {
		$this->expectException(\Sabre\DAV\Exception\Forbidden::class);

		$this->info->expects($this->any())
			->method('isDeletable')
			->will($this->returnValue(true));
		$this->view->expects($this->never())
			->method('rmdir');
		$dir = $this->getDir();
		$dir->delete();
	}

	/**
	 */
	public function testDeleteForbidden() {
		$this->expectException(\OCA\DAV\Connector\Sabre\Exception\Forbidden::class);

		// deletion allowed
		$this->info->expects($this->once())
			->method('isDeletable')
			->will($this->returnValue(true));

		// but fails
		$this->view->expects($this->once())
			->method('rmdir')
			->with('sub')
			->willThrowException(new ForbiddenException('', true));

		$dir = $this->getDir('sub');
		$dir->delete();
	}

	/**
	 *
	 */
	public function testDeleteFolderWhenAllowed() {
		// deletion allowed
		$this->info->expects($this->once())
			->method('isDeletable')
			->will($this->returnValue(true));

		// but fails
		$this->view->expects($this->once())
			->method('rmdir')
			->with('sub')
			->will($this->returnValue(true));

		$dir = $this->getDir('sub');
		$dir->delete();
	}

	/**
	 */
	public function testDeleteFolderFailsWhenNotAllowed() {
		$this->expectException(\Sabre\DAV\Exception\Forbidden::class);

		$this->info->expects($this->once())
			->method('isDeletable')
			->will($this->returnValue(false));

		$dir = $this->getDir('sub');
		$dir->delete();
	}

	/**
	 */
	public function testDeleteFolderThrowsWhenDeletionFailed() {
		$this->expectException(\Sabre\DAV\Exception\Forbidden::class);

		// deletion allowed
		$this->info->expects($this->once())
			->method('isDeletable')
			->will($this->returnValue(true));

		// but fails
		$this->view->expects($this->once())
			->method('rmdir')
			->with('sub')
			->will($this->returnValue(false));

		$dir = $this->getDir('sub');
		$dir->delete();
	}

	/**
	 */
	public function testDeleteFolderThrowsWhenStorageNotAvailable() {
		$this->expectException(\Sabre\DAV\Exception\ServiceUnavailable::class);

		// deletion allowed
		$this->info->expects($this->once())
			->method('isDeletable')
			->will($this->returnValue(true));

		// but fails
		$this->view->expects($this->once())
			->method('rmdir')
			->with('sub')
			->will($this->throwException(new StorageNotAvailableException()));

		$dir = $this->getDir('sub');
		$dir->delete();
	}

	public function testGetChildren() {
		$info1 = $this->getMockBuilder('OC\Files\FileInfo')
			->disableOriginalConstructor()
			->getMock();
		$info2 = $this->getMockBuilder('OC\Files\FileInfo')
			->disableOriginalConstructor()
			->getMock();
		$info1->expects($this->any())
			->method('getName')
			->will($this->returnValue('first'));
		$info1->expects($this->any())
			->method('getEtag')
			->will($this->returnValue('abc'));
		$info2->expects($this->any())
			->method('getName')
			->will($this->returnValue('second'));
		$info2->expects($this->any())
			->method('getEtag')
			->will($this->returnValue('def'));

		$this->view->expects($this->once())
			->method('getDirectoryContent')
			->with('')
			->will($this->returnValue([$info1, $info2]));

		$this->view->expects($this->any())
			->method('getRelativePath')
			->will($this->returnValue(''));

		$dir = new Directory($this->view, $this->info);
		$nodes = $dir->getChildren();

		$this->assertCount(2, $nodes);

		// calling a second time just returns the cached values,
		// does not call getDirectoryContents again
		$dir->getChildren();
	}

	/**
	 */
	public function testGetChildrenNoPermission() {
		$this->expectException(\Sabre\DAV\Exception\Forbidden::class);

		$info = $this->getMockBuilder('OC\Files\FileInfo')
			->disableOriginalConstructor()
			->getMock();
		$info->expects($this->any())
			->method('isReadable')
			->will($this->returnValue(false));

		$dir = new Directory($this->view, $info);
		$dir->getChildren();
	}

	/**
	 */
	public function testGetChildNoPermission() {
		$this->expectException(\Sabre\DAV\Exception\NotFound::class);

		$info = $this->getMockBuilder('OC\Files\FileInfo')
			->disableOriginalConstructor()
			->getMock();
		$info->expects($this->any())
			->method('isReadable')
			->will($this->returnValue(false));

		$dir = new Directory($this->view, $info);
		$dir->getChild('test');
	}

	/**
	 */
	public function testGetChildThrowStorageNotAvailableException() {
		$this->expectException(\Sabre\DAV\Exception\ServiceUnavailable::class);

		$this->view->expects($this->once())
			->method('getFileInfo')
			->willThrowException(new StorageNotAvailableException());

		$dir = new Directory($this->view, $this->info);
		$dir->getChild('.');
	}

	/**
	 */
	public function testGetChildThrowInvalidPath() {
		$this->expectException(\OCA\DAV\Connector\Sabre\Exception\InvalidPath::class);

		$this->view->expects($this->once())
			->method('verifyPath')
			->willThrowException(new \OCP\Files\InvalidPathException());
		$this->view->expects($this->never())
			->method('getFileInfo');

		$dir = new Directory($this->view, $this->info);
		$dir->getChild('.');
	}

	public function testGetQuotaInfoUnlimited() {
		$storage = $this->getMockBuilder('\OC\Files\Storage\Wrapper\Quota')
			->disableOriginalConstructor()
			->getMock();

		$storage->expects($this->any())
			->method('instanceOfStorage')
			->will($this->returnValueMap([
				'\OCA\Files_Sharing\SharedStorage' => false,
				'\OC\Files\Storage\Wrapper\Quota' => false,
			]));

		$storage->expects($this->never())
			->method('getQuota');

		$storage->expects($this->once())
			->method('free_space')
			->will($this->returnValue(800));

		$this->info->expects($this->once())
			->method('getSize')
			->will($this->returnValue(200));

		$this->info->expects($this->once())
			->method('getStorage')
			->will($this->returnValue($storage));

		$dir = new Directory($this->view, $this->info);
		$this->assertEquals([200, -3], $dir->getQuotaInfo()); //200 used, unlimited
	}

	public function testGetQuotaInfoSpecific() {
		$storage = $this->getMockBuilder('\OC\Files\Storage\Wrapper\Quota')
			->disableOriginalConstructor()
			->getMock();

		$storage->expects($this->any())
			->method('instanceOfStorage')
			->will($this->returnValueMap([
				['\OCA\Files_Sharing\SharedStorage', false],
				['\OC\Files\Storage\Wrapper\Quota', true],
			]));

		$storage->expects($this->once())
			->method('getQuota')
			->will($this->returnValue(1000));

		$storage->expects($this->once())
			->method('free_space')
			->will($this->returnValue(800));

		$this->info->expects($this->once())
			->method('getSize')
			->will($this->returnValue(200));

		$this->info->expects($this->once())
			->method('getStorage')
			->will($this->returnValue($storage));

		$dir = new Directory($this->view, $this->info);
		$this->assertEquals([200, 800], $dir->getQuotaInfo()); //200 used, 800 free
	}

	/**
	 * @dataProvider moveFailedProvider
	 */
	public function testMoveFailed($source, $destination, $updatables, $deletables) {
		$this->expectException(\Sabre\DAV\Exception\Forbidden::class);

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
	 */
	public function testMoveFailedInvalidChars($source, $destination, $updatables, $deletables) {
		$this->expectException(\OCA\DAV\Connector\Sabre\Exception\InvalidPath::class);

		$this->moveTest($source, $destination, $updatables, $deletables);
	}

	public function moveFailedInvalidCharsProvider() {
		return [
			['a/b', 'a/*', ['a' => true, 'a/b' => true, 'a/c*' => false], []],
		];
	}

	public function moveFailedProvider() {
		return [
			['a/b', 'a/c', ['a' => false, 'a/b' => false, 'a/c' => false], []],
			['a/b', 'b/b', ['a' => false, 'a/b' => false, 'b' => false, 'b/b' => false], []],
			['a/b', 'b/b', ['a' => false, 'a/b' => true, 'b' => false, 'b/b' => false], []],
			['a/b', 'b/b', ['a' => true, 'a/b' => true, 'b' => false, 'b/b' => false], []],
			['a/b', 'b/b', ['a' => true, 'a/b' => true, 'b' => true, 'b/b' => false], ['a/b' => false]],
			['a/b', 'a/c', ['a' => false, 'a/b' => true, 'a/c' => false], []],
		];
	}

	public function moveSuccessProvider() {
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

		$sourceInfo = new FileInfo($source, null, null, [], null);
		$targetInfo = new FileInfo(\dirname($destination), null, null, [], null);

		$sourceNode = new Directory($view, $sourceInfo);
		$targetNode = $this->getMockBuilder(Directory::class)
			->setMethods(['childExists'])
			->setConstructorArgs([$view, $targetInfo])
			->getMock();
		$targetNode->expects($this->any())->method('childExists')
			->with(\basename($destination))
			->willReturn(false);
		$this->assertTrue($targetNode->moveInto(\basename($destination), $source, $sourceNode));
	}

	/**
	 */
	public function testFailingMove() {
		$this->expectException(\Sabre\DAV\Exception\Forbidden::class);
		$this->expectExceptionMessage('Could not copy directory b, target exists');

		$source = 'a/b';
		$destination = 'c/b';
		$updatables = ['a' => true, 'a/b' => true, 'b' => true, 'c/b' => false];
		$deletables = ['a/b' => true];

		$view = new TestDoubleFileView($updatables, $deletables);

		$sourceInfo = new FileInfo($source, null, null, [], null);
		$targetInfo = new FileInfo(\dirname($destination), null, null, [], null);

		$sourceNode = new Directory($view, $sourceInfo);
		$targetNode = $this->getMockBuilder(Directory::class)
			->setMethods(['childExists'])
			->setConstructorArgs([$view, $targetInfo])
			->getMock();
		$targetNode->expects($this->once())->method('childExists')
			->with(\basename($destination))
			->willReturn(true);

		$targetNode->moveInto(\basename($destination), $source, $sourceNode);
	}

	/**
	 * A test to throw ExcludeForbiddenException
	 *
	 */
	public function testFailCreateFile() {
		$this->expectException(\OCP\Files\FileContentNotAllowedException::class);
		$this->expectExceptionMessage('The message already logged');

		//$this->invokePrivate();
		$previous = new FileContentNotAllowedException('The message already logged', false);
		$this->view->expects($this->any())
			->method('isCreatable')
			->willThrowException(new FileContentNotAllowedException('The message already logged', false, $previous));
		$dir = $this->getDir();
		$dir->createFile('foobar.txt', 'hello foo bar');
	}

	/**
	 */
	public function testCreateFileForbidden() {
		$this->expectException(\Sabre\DAV\Exception\Forbidden::class);

		$this->view->expects($this->any())
			->method('isCreatable')
			->willThrowException(new \Sabre\DAV\Exception\Forbidden());
		$dir = $this->getDir();
		$dir->createFile('foobar.txt', 'hello foo bar');
	}

	/**
	 */
	public function testSetNameRenameOperationFailed() {
		$this->expectException(\OCA\DAV\Connector\Sabre\Exception\Forbidden::class);

		$storage = $this->createMock(IStorage::class);
		$storage->method('getId')->will($this->returnValue('home::someuser'));

		$view = $this->createMock(View::class);
		$view->method('verifyPath')->willReturn(true);
		$view->method('getRelativePath')->will($this->returnArgument(0));
		$view->method('rename')->willReturn(false);

		$info = new FileInfo('/testdir', $storage, null, [
			'permissions' => Constants::PERMISSION_ALL
		], null);
		$file = new Directory($view, $info);
		$file->setName('/new_testdir_renamed');
	}
}
