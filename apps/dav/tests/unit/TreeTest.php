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

use OCA\DAV\Tree;
use Sabre\DAV\ICollection;
use Sabre\DAV\IFile;
use Test\TestCase;

class TreeTest1 extends TestCase {

	/** @var ICollection | \PHPUnit\Framework\MockObject\MockObject */
	private $rootNode;
	/** @var Tree | \PHPUnit\Framework\MockObject\MockObject */
	private $tree;

	public function providesPaths() {
		return [
			['calendar/user1/calendar1/event1.ics'],
		];
	}

	protected function setUp(): void {
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
}
