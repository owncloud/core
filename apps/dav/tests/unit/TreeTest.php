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

namespace OCA\DAV\Tests\unit;

use OC\Files\Filesystem;
use OCA\DAV\Connector\Sabre\File;
use OCA\DAV\Tree;
use OCP\Util;
use Sabre\DAV\ICollection;
use Sabre\DAV\IFile;
use Test\TestCase;

class TreeTest1 extends TestCase {

	/** @var ICollection | \PHPUnit\Framework\MockObject\MockObject */
	private $rootNode;
	/** @var Tree | \PHPUnit\Framework\MockObject\MockObject */
	private $tree;

	private $copyHookParams;
	private $postCopyHookParams;

	public function providesPaths() {
		return [
			['calendar/user1/calendar1/event1.ics'],
		];
	}

	protected function setUp() {
		parent::setUp();

		$this->rootNode = $this->createMock(ICollection::class);
		$this->tree = new Tree($this->rootNode);
	}

	/**
	 * @throws \Sabre\DAV\Exception\NotFound
	 */
	public function testInFilesWithTree() {
		$path = 'files/user1/welcome.txt';

		$filesTree = $this->createMock(\Sabre\DAV\Tree::class);
		$filesTree->expects($this->once())->method('getNodeForPath')->willReturn(5);

		$this->rootNode->expects($this->once())->method('getChild')->willReturnMap([
			['files', $filesTree]
		]);
		$node = $this->tree->getNodeForPath($path);
		$this->assertEquals(5, $node);
	}

	/**
	 * @throws \Sabre\DAV\Exception\NotFound
	 */
	public function testInFilesWithoutTree() {
		$path = 'files/user1';

		$file = $this->createMock(IFile::class);
		$folder = $this->createMock(ICollection::class);
		$folder->expects($this->once())->method('getChild')->willReturn($file);

		$this->rootNode->expects($this->once())->method('getChild')->willReturnMap([
			['files', $folder]
		]);
		$node = $this->tree->getNodeForPath($path);
		$this->assertEquals($file, $node);

		// second call uses the caches nodes
		$node = $this->tree->getNodeForPath($path);
		$this->assertEquals($file, $node);
	}

	public function testCopyHook() {
		$this->copyHookParams = null;
		$this->postCopyHookParams = null;
		Util::connectHook(Filesystem::CLASSNAME, Filesystem::signal_copy, $this, 'copyHook');
		$source = 'files/user1/welcome.txt';
		$destination = 'files/user1/welcome2.txt';

		$fileMock = $this->createMock(File::class);

		$filesTree = $this->createMock(\Sabre\DAV\Tree::class);
		$filesTree->method('getNodeForPath')->willReturn($fileMock);

		$this->rootNode->method('getChild')->willReturnMap([
			['files', $filesTree]
		]);
		$this->tree->copy($source, $destination);
		$this->assertNotNull($this->copyHookParams);
		$this->assertEquals('welcome.txt', $this->copyHookParams[Filesystem::signal_param_oldpath]);
		$this->assertEquals('welcome2.txt', $this->copyHookParams[Filesystem::signal_param_newpath]);
	}

	public function copyHook($params) {
		$this->copyHookParams = $params;
		$params[Filesystem::signal_param_run] = false;
	}
}
