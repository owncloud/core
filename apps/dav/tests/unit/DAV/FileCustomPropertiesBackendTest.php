<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
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

namespace OCA\DAV\Tests\unit\DAV;

use OCA\DAV\Connector\Sabre\File;
use OCA\DAV\DAV\FileCustomPropertiesBackend;
use OCA\DAV\DAV\FileCustomPropertiesPlugin;
use OCA\DAV\Tree;
use OCA\Files_Trashbin\Storage as TrashbinStorage;
use OC\Files\Storage\Storage as FileStorage;
use OCP\Files\IRootFolder;
use OCP\Files\Node;
use Sabre\DAV\PropFind;
use Sabre\DAV\SimpleCollection;
use Sabre\DAV\Xml\Property\Complex;

/**
 * Class FileCustomPropertiesBackendTest
 *
 * @group DB
 *
 * @package OCA\DAV\Tests\unit\DAV
 */
class FileCustomPropertiesBackendTest extends \Test\TestCase {
	/**
	 * @var \Sabre\DAV\Server
	 */
	private $server;

	/**
	 * @var Tree
	 */
	private $tree;

	/**
	 * @var FileCustomPropertiesBackend
	 */
	private $backend;

	/**
	 * @var FileCustomPropertiesPlugin
	 */
	private $plugin;

	/**
	 * @var \OCP\IUser
	 */
	private $user;

	/**
	 * @var IRootFolder | \PHPUnit_Framework_MockObject_MockObject Obj$rootFolder
	 */
	private $rootFolder;

	/** @var int */
	private $maxId;

	public function setUp(): void {
		parent::setUp();
		$this->server = new \Sabre\DAV\Server();
		$this->tree = $this->getMockBuilder(Tree::class)
			->disableOriginalConstructor()
			->getMock();

		$userId = $this->getUniqueID('testcustompropertiesuser');

		$this->user = $this->createMock('\OCP\IUser');
		$this->user->expects($this->any())
			->method('getUID')
			->will($this->returnValue($userId));

		$this->rootFolder = $this->createMock(IRootFolder::class);
		$this->backend = new FileCustomPropertiesBackend(
			$this->tree,
			\OC::$server->getDatabaseConnection(),
			$this->user,
			$this->rootFolder
		);
		$this->plugin = new FileCustomPropertiesPlugin($this->backend);

		$connection = \OC::$server->getDatabaseConnection();
		$qb = $connection->getQueryBuilder();
		$maxFunction = $qb->createFunction(
			"MAX(`id`)"
		);
		$this->maxId = (int) $qb->select($maxFunction)
			->from('properties')
			->execute()->fetchColumn();
	}

	public function tearDown(): void {
		$connection = \OC::$server->getDatabaseConnection();
		$deleteStatement = $connection->prepare(
			'DELETE FROM `*PREFIX*properties`' .
			' WHERE `id` > ?'
		);
		$deleteStatement->execute(
			[
				$this->maxId,
			]
		);
		$deleteStatement->closeCursor();
	}

	private function createTestNode($class) {
		$node = $this->getMockBuilder($class)
			->disableOriginalConstructor()
			->getMock();
		$node->expects($this->any())
			->method('getId')
			->will($this->returnValue(123));

		$node->expects($this->any())
			->method('getPath')
			->will($this->returnValue('/dummypath'));

		return $node;
	}

	private function applyDefaultProps($path = '/dummypath') {
		// properties to set
		$propPatch = new \Sabre\DAV\PropPatch([
			'customprop' => 'value1',
			'customprop2' => 'value2',
			'customprop3' => new Complex('<foo xmlns="http://bar"/>')
		]);

		$this->backend->propPatch(
			$path,
			$propPatch
		);

		$propPatch->commit();

		$this->assertEmpty($propPatch->getRemainingMutations());

		$result = $propPatch->getResult();
		$this->assertEquals(200, $result['customprop']);
		$this->assertEquals(200, $result['customprop2']);
	}

	/**
	 * Test getting properties when node has no fileId
	 * Should fail gracefully with no error
	 */
	public function testGetPropertiesForCollection() {
		$node = $this->getMockBuilder(SimpleCollection::class)
			->disableOriginalConstructor()
			->getMock();

		$node->expects($this->any())
			->method('getName')
			->will($this->returnValue('dummypath'));

		$this->tree->expects($this->any())
			->method('getNodeForPath')
			->with('/dummypath')
			->will($this->returnValue($node));

		$propFind = new PropFind(
			'/dummypath',
			[
				'customprop',
				'customprop2',
				'unsetprop',
			],
			0
		);

		$this->backend->propFind(
			'/dummypath',
			$propFind
		);

		$this->assertNull($propFind->get('customprop'));
	}

	/**
	 * Test that propFind on a missing file soft fails
	 */
	public function testPropFindMissingFileSoftFail() {
		$this->tree
			->expects($this->exactly(2))
			->method('getNodeForPath')
			->withConsecutive(
				['/dummypath'],
				['/dummypath'],
			)
			->willReturnOnConsecutiveCalls(
				$this->throwException(new \Sabre\DAV\Exception\NotFound()),
				$this->throwException(new \Sabre\DAV\Exception\ServiceUnavailable()),
			);

		$propFind = new PropFind(
			'/dummypath',
			[
				'customprop',
				'customprop2',
				'unsetprop',
			],
			0
		);

		$this->backend->propFind(
			'/dummypath',
			$propFind
		);

		$this->backend->propFind(
			'/dummypath',
			$propFind
		);

		// no exception, soft fail
		$this->assertTrue(true);
	}

	/**
	 * Test setting/getting properties
	 */
	public function testSetGetPropertiesForFile() {
		$node = $this->createTestNode('\OCA\DAV\Connector\Sabre\File');
		$this->tree->expects($this->any())
			->method('getNodeForPath')
			->with('/dummypath')
			->will($this->returnValue($node));

		$this->applyDefaultProps();

		$propFind = new PropFind(
			'/dummypath',
			[
				'customprop',
				'customprop2',
				'customprop3',
				'unsetprop',
			],
			0
		);

		$this->backend->propFind(
			'/dummypath',
			$propFind
		);

		$this->assertEquals('value1', $propFind->get('customprop'));
		$this->assertEquals('value2', $propFind->get('customprop2'));
		/** @var Complex $complexProp */
		$complexProp = $propFind->get('customprop3');
		$this->assertInstanceOf(Complex::class, $complexProp);
		$this->assertEquals('<foo xmlns="http://bar"/>', $complexProp->getXml());
		$this->assertEquals(['unsetprop'], $propFind->get404Properties());
	}

	/**
	 * Test getting properties from directory
	 */
	public function testGetPropertiesForDirectory() {
		$rootNode = $this->createTestNode('\OCA\DAV\Connector\Sabre\Directory');

		$nodeSub = $this->getMockBuilder('\OCA\DAV\Connector\Sabre\File')
			->disableOriginalConstructor()
			->getMock();
		$nodeSub->expects($this->any())
			->method('getId')
			->will($this->returnValue(456));

		$nodeSub->expects($this->any())
			->method('getPath')
			->will($this->returnValue('/dummypath/test.txt'));

		$rootNode->expects($this->once())
			->method('getChildren')
			->will($this->returnValue([$nodeSub]));

		$this->tree
			->expects($this->exactly(4))
			->method('getNodeForPath')
			->withConsecutive(
				['/dummypath'],
				['/dummypath/test.txt'],
				['/dummypath'],
				['/dummypath/test.txt'],
			)
			->willReturnOnConsecutiveCalls(
				$rootNode,
				$nodeSub,
				$rootNode,
				$nodeSub,
			);

		$this->applyDefaultProps('/dummypath');
		$this->applyDefaultProps('/dummypath/test.txt');

		$propNames = [
			'customprop',
			'customprop2',
			'unsetprop',
		];

		$propFindRoot = new PropFind(
			'/dummypath',
			$propNames,
			1
		);

		$propFindSub = new PropFind(
			'/dummypath/test.txt',
			$propNames,
			0
		);

		$this->backend->propFind(
			'/dummypath',
			$propFindRoot
		);

		$this->backend->propFind(
			'/dummypath/test.txt',
			$propFindSub
		);

		// TODO: find a way to assert that no additional SQL queries were
		// run while doing the second propFind

		$this->assertEquals('value1', $propFindRoot->get('customprop'));
		$this->assertEquals('value2', $propFindRoot->get('customprop2'));
		$this->assertEquals(['unsetprop'], $propFindRoot->get404Properties());

		$this->assertEquals('value1', $propFindSub->get('customprop'));
		$this->assertEquals('value2', $propFindSub->get('customprop2'));
		$this->assertEquals(['unsetprop'], $propFindSub->get404Properties());
	}

	/**
	 * Test delete property
	 */
	public function testDeleteProperty() {
		$path = '/dummypath';
		$node = $this->createTestNode(File::class);
		$nodeAfterDelete = $this->createTestNode(Node::class);
		$storage = $this->createMock(FileStorage::class);
		$storage->method('instanceOfStorage')
			->with(TrashbinStorage::class)
			->willReturn(false);
		$nodeAfterDelete->method('getStorage')
			->willReturn($storage);
		$this->rootFolder
			->method('getById')
			->with($node->getId())
			->willReturn([$nodeAfterDelete]);

		$this->tree->expects($this->any())
			->method('getNodeForPath')
			->with($path)
			->will($this->returnValue($node));

		$this->applyDefaultProps();

		$propPatch = new \Sabre\DAV\PropPatch([
			'customprop' => 'propvalue',
		]);
		$this->backend->propPatch($path, $propPatch);
		$propPatch->commit();
		$this->assertEmpty($propPatch->getRemainingMutations());

		$result = $propPatch->getResult();
		$this->assertEquals(200, $result['customprop']);

		$propFindBefore = new PropFind(
			$path,
			[ 'customprop' ],
			0
		);
		$this->backend->propFind($path, $propFindBefore);
		$this->assertEquals('propvalue', $propFindBefore->get('customprop'));

		$this->plugin->beforeUnbind($path);
		$this->backend->delete($path);

		$propFindAfter = new PropFind(
			$path,
			[ 'customprop' ],
			0
		);
		$this->backend->propFind($path, $propFindAfter);
		$this->assertNull($propFindAfter->get('customprop'));
	}

	/**
	 * Test don't delete property if file moved to trashbin
	 */
	public function testDontDeletePropertyIfTrashbin() {
		$path = '/dummypath';
		$node = $this->createTestNode(File::class);
		$nodeAfterDelete = $this->createTestNode(Node::class);
		$storage = $this->createMock(TrashbinStorage::class);
		$storage->method('instanceOfStorage')
			->with(TrashbinStorage::class)
			->willReturn(true);
		$nodeAfterDelete->method('getStorage')
			->willReturn($storage);

		$this->rootFolder
			->method('getById')
			->with($node->getId())
			->willReturn([$nodeAfterDelete]);

		$this->tree->expects($this->any())
			->method('getNodeForPath')
			->with($path)
			->will($this->returnValue($node));

		$this->applyDefaultProps();

		$propPatch = new \Sabre\DAV\PropPatch([
			'customprop' => 'propvalue',
		]);
		$this->backend->propPatch($path, $propPatch);
		$propPatch->commit();
		$this->assertEmpty($propPatch->getRemainingMutations());

		$result = $propPatch->getResult();
		$this->assertEquals(200, $result['customprop']);

		$propFindBefore = new PropFind(
			$path,
			[ 'customprop' ],
			0
		);
		$this->backend->propFind($path, $propFindBefore);
		$this->assertEquals('propvalue', $propFindBefore->get('customprop'));

		$this->plugin->beforeUnbind($path);
		$this->backend->delete($path);

		$propFindAfter = new PropFind(
			$path,
			[ 'customprop' ],
			0
		);
		$this->backend->propFind($path, $propFindAfter);
		$this->assertEquals('propvalue', $propFindAfter->get('customprop'));
	}

	public function slicesProvider() {
		$emptyFileIds = [];
		$fiveFileIds = [1, 2, 3, 4, 5];
		$thousandFileIds = [];
		for ($i=0;$i<1000;$i++) {
			$thousandFileIds[] = $i;
		}

		return [
			[$emptyFileIds, 0, []],
			[$emptyFileIds, 5, []],
			[$fiveFileIds, 0, [ 0 => $fiveFileIds]],
			[$fiveFileIds, 5, [ 0 => $fiveFileIds]],
			[$fiveFileIds, 994, [ 0 => $fiveFileIds]],
			[$fiveFileIds, 995, [ 0 => [1,2,3,4] , 1 => [5]]],
			[$thousandFileIds, 0, \array_chunk($thousandFileIds, 999)],
			[$thousandFileIds, 5, \array_chunk($thousandFileIds, 994)],
		];
	}

	/**
	 * @dataProvider slicesProvider
	 * @param $toSlice
	 * @param $otherPlaceholdersCount
	 * @param $expected
	 */
	public function testGetChunks($toSlice, $otherPlaceholdersCount, $expected) {
		$dbConnectionMock = $this->getMockBuilder(\OCP\IDBConnection::class)
			->disableOriginalConstructor()
			->getMock();

		$this->backend = new FileCustomPropertiesBackend(
			$this->tree,
			$dbConnectionMock,
			$this->user,
			\OC::$server->getRootFolder()
		);

		$actual = self::invokePrivate(
			$this->backend,
			'getChunks',
			[$toSlice, $otherPlaceholdersCount]
		);
		$this->assertEquals($expected, $actual);
	}
}
