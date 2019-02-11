<?php
/**
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

namespace Test\Files;

use Test\TestCase;
use OCP\Files\Node;
use OC\Files\Meta\MetaVersionCollection;
use OCP\Files\IRootFolder;
use OCP\Files\Storage\IStorage;
use OCA\Files_Sharing\External\Storage;
use OCP\Files\Storage\IVersionedStorage;
use OC\Files\Meta\MetaFileVersionNode;

/**
 * Class MetaFilesTest
 *
 * @package Test\Files
 */
class MetaVersionCollectionTest extends TestCase {

	/**
	 * @var Node
	 */
	private $node;

	/**
	 * @var IRootFolder
	 */
	private $rootFolder;

	/**
	 * @var MetaVersionCollection
	 */
	private $collection;

	/**
	 * @var IStorage|IVersionedStorage
	 */
	private $storage;

	protected function setUp() {
		parent::setUp();

		$this->rootFolder = $this->createMock(IRootFolder::class);
		$this->node = $this->createMock(Node::class);
		$this->storage = $this->createMock([IStorage::class, IVersionedStorage::class]);
		$this->node->method('getStorage')->willReturn($this->storage);
		$this->collection = new MetaVersionCollection($this->rootFolder, $this->node);
	}

	protected function tearDown() {
		parent::tearDown();
	}

	public function testGetDirectoryListing() {
		$this->node->method('getInternalPath')->willReturn('/abc');
		$this->node->method('getMimetype')->willReturn('application/json');

		$this->storage->method('instanceOfStorage')
			->with(IVersionedStorage::class)
			->willReturn(true);

		$this->storage->expects($this->once())
			->method('getVersions')
			->with('/abc')
			->willReturn([
				['version' => '1014', 'timestamp' => 12345678],
				['version' => '1015', 'mimetype' => 'text/plain', 'timestamp' => 12345679],
			]);

		$children = $this->collection->getDirectoryListing();

		$this->assertCount(2, $children);
		$this->assertInstanceOf(MetaFileVersionNode::class, $children[0]);
		$this->assertEquals('1014', $children[0]->getName());
		$this->assertEquals('application/json', $children[0]->getMimetype());
		$this->assertEquals(12345678, $children[0]->getMtime());
		$this->assertInstanceOf(MetaFileVersionNode::class, $children[1]);
		$this->assertEquals('1015', $children[1]->getName());
		$this->assertEquals('text/plain', $children[1]->getMimetype());
		$this->assertEquals(12345679, $children[1]->getMtime());
	}

	public function testGetDirectoryListingNonVersionedStorage() {
		$this->node->method('getInternalPath')->willReturn('/abc');
		$this->node->method('getMimetype')->willReturn('application/json');

		$this->storage->method('instanceOfStorage')
			->with(IVersionedStorage::class)
			->willReturn(false);

		$this->storage->expects($this->never())
			->method('getVersions');

		$children = $this->collection->getDirectoryListing();

		$this->assertCount(0, $children);
	}

	public function testGet() {
		$this->node->method('getInternalPath')->willReturn('/abc');
		$this->node->method('getMimetype')->willReturn('application/json');

		$this->storage->method('instanceOfStorage')
			->with(IVersionedStorage::class)
			->willReturn(true);

		$this->storage->expects($this->once())
			->method('getVersion')
			->with('/abc', '1014')
			->willReturn(['version' => '1014', 'timestamp' => 12345678]);

		$result = $this->collection->get('1014');

		$this->assertInstanceOf(MetaFileVersionNode::class, $result);
		$this->assertEquals('1014', $result->getName());
		$this->assertEquals('application/json', $result->getMimetype());
		$this->assertEquals(12345678, $result->getMtime());
	}

	/**
	 * @expectedException OCP\Files\NotFoundException
	 */
	public function testGetNonVersionedStorageFails() {
		$this->node->method('getInternalPath')->willReturn('/abc');
		$this->node->method('getMimetype')->willReturn('application/json');

		$this->storage->method('instanceOfStorage')
			->with(IVersionedStorage::class)
			->willReturn(false);

		$this->storage->expects($this->never())
			->method('getVersion');

		$this->collection->get('1014');
	}

	/**
	 * @expectedException OCP\Files\NotFoundException
	 */
	public function testGetSubEntryFails() {
		$this->storage->expects($this->never())
			->method('instanceOfStorage');

		$this->collection->get('1014/1');
	}
}
