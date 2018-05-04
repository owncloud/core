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

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Platforms\MySqlPlatform;
use Doctrine\DBAL\Platforms\SqlitePlatform;
use OCA\DAV\Connector\Sabre\File;
use OCA\DAV\DAV\FileCustomPropertiesBackend;
use OCA\DAV\DAV\FileCustomPropertiesPlugin;
use OCA\DAV\Tree;
use Sabre\DAV\PropFind;
use Sabre\DAV\SimpleCollection;

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
	
	/** @var int */
	private $maxId;

	public function setUp() {
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

		$this->backend = new FileCustomPropertiesBackend(
			$this->tree,
			\OC::$server->getDatabaseConnection(),
			$this->user
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

	public function tearDown() {
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
		$this->tree->expects($this->at(0))
			->method('getNodeForPath')
			->with('/dummypath')
			->will($this->throwException(new \Sabre\DAV\Exception\NotFound()));

		$this->tree->expects($this->at(1))
			->method('getNodeForPath')
			->with('/dummypath')
			->will($this->throwException(new \Sabre\DAV\Exception\ServiceUnavailable()));

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

		$this->tree->expects($this->at(0))
			->method('getNodeForPath')
			->with('/dummypath')
			->will($this->returnValue($rootNode));

		$this->tree->expects($this->at(1))
			->method('getNodeForPath')
			->with('/dummypath/test.txt')
			->will($this->returnValue($nodeSub));

		$this->tree->expects($this->at(2))
			->method('getNodeForPath')
			->with('/dummypath')
			->will($this->returnValue($rootNode));

		$this->tree->expects($this->at(3))
			->method('getNodeForPath')
			->with('/dummypath/test.txt')
			->will($this->returnValue($nodeSub));

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

	public function slicesProvider() {
		$emptyFileIds = [];
		$fiveFileIds = [1, 2, 3, 4, 5];
		$thousandFileIds = [];
		for ($i=0;$i<1000;$i++) {
			$thousandFileIds[] = $i;
		}

		$sqlitePlatform = new SqlitePlatform();
		$mysqlPlatform = new MySqlPlatform();

		return [
			[$emptyFileIds, 0, $sqlitePlatform, []],
			[$emptyFileIds, 5, $sqlitePlatform, []],
			[$fiveFileIds, 0, $sqlitePlatform, [ 0 => $fiveFileIds]],
			[$fiveFileIds, 5, $sqlitePlatform, [ 0 => $fiveFileIds]],
			[$fiveFileIds, 994, $sqlitePlatform, [ 0 => $fiveFileIds]],
			[$fiveFileIds, 995, $sqlitePlatform, [ 0 => [1,2,3,4] , 1 => [5]]],
			[$thousandFileIds, 0, $sqlitePlatform, \array_chunk($thousandFileIds, 999)],
			[$thousandFileIds, 5, $sqlitePlatform, \array_chunk($thousandFileIds, 994)],

			[$emptyFileIds, 0, $mysqlPlatform, []],
			[$emptyFileIds, 5, $mysqlPlatform, []],
			[$fiveFileIds, 0, $mysqlPlatform, [ 0 => $fiveFileIds]],
			[$fiveFileIds, 5, $mysqlPlatform, [ 0 => $fiveFileIds]],
			[$fiveFileIds, 994, $mysqlPlatform, [ 0 => $fiveFileIds]],
			[$fiveFileIds, 995, $mysqlPlatform, [0 => $fiveFileIds]],
			[$thousandFileIds, 0, $mysqlPlatform, [0 => $thousandFileIds]],
			[$thousandFileIds, 5, $mysqlPlatform, [0 => $thousandFileIds]],
		];
	}

	/**
	 * @dataProvider slicesProvider
	 * @param $toSlice
	 * @param $otherPlaceholdersCount
	 * @param AbstractPlatform $platform
	 * @param $expected
	 */
	public function testGetChunks($toSlice, $otherPlaceholdersCount, AbstractPlatform $platform, $expected) {
		$dbConnectionMock = $this->getMockBuilder(\OCP\IDBConnection::class)
			->disableOriginalConstructor()
			->getMock();

		$dbConnectionMock->expects($this->any())
			->method('getDatabasePlatform')
			->will($this->returnValue($platform));

		$this->backend = new FileCustomPropertiesBackend(
			$this->tree,
			$dbConnectionMock,
			$this->user
		);

		$actual = $this->invokePrivate(
			$this->backend,
			'getChunks',
			[$toSlice, $otherPlaceholdersCount]
		);
		$this->assertEquals($expected, $actual);
	}
}
