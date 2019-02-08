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

use OCA\DAV\DAV\MiscCustomPropertiesBackend;
use OCP\IUser;
use Sabre\CalDAV\Calendar;

/**
 * Class FileCustomPropertiesBackendTest
 *
 * @group DB
 *
 * @package OCA\DAV\Tests\unit\DAV
 */
class MiscCustomPropertiesBackendTest extends \Test\TestCase {

	/**
	 * @var \Sabre\DAV\Server
	 */
	private $server;

	/**
	 * @var \Sabre\DAV\Tree
	 */
	private $tree;

	/**
	 * @var MiscCustomPropertiesBackend
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
		$this->tree = $this->getMockBuilder('\Sabre\DAV\Tree')
			->disableOriginalConstructor()
			->getMock();

		$userId = $this->getUniqueID('testcustompropertiesuser');

		$this->user = $this->createMock(IUser::class);
		$this->user->expects($this->any())
			->method('getUID')
			->will($this->returnValue($userId));

		$this->plugin = new MiscCustomPropertiesBackend(
			$this->tree,
			\OC::$server->getDatabaseConnection(),
			$this->user
		);
		
		$connection = \OC::$server->getDatabaseConnection();
		$qb = $connection->getQueryBuilder();
		$maxFunction = $qb->createFunction(
				"MAX(`id`)"
			);
		$this->maxId = (int) $qb->select($maxFunction)
			->from('dav_properties')
			->execute()->fetchColumn();
	}

	public function tearDown() {
		$connection = \OC::$server->getDatabaseConnection();
		$deleteStatement = $connection->prepare(
			'DELETE FROM `*PREFIX*dav_properties`' .
			' WHERE `id` > ?'
		);
		$deleteStatement->execute(
			[
				$this->maxId,
			]
		);
		$deleteStatement->closeCursor();
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

		$propFind = new \Sabre\DAV\PropFind(
			'/dummypath',
			[
				'customprop',
				'customprop2',
				'unsetprop',
			],
			0
		);

		$this->plugin->propFind(
			'/dummypath',
			$propFind
		);

		$this->plugin->propFind(
			'/dummypath',
			$propFind
		);

		// no exception, soft fail
		$this->assertTrue(true);
	}

	/**
	 * Test setting/getting properties
	 */
	public function testSetGetPropertiesForCalendar() {
		$testPath = "calendars/{$this->user->getUID()}/personal";
		$node = $this->createTestNode(Calendar::class);
		$this->tree->expects($this->any())
			->method('getNodeForPath')
			->with($testPath)
			->will($this->returnValue($node));

		$this->applyDefaultProps($testPath);

		$propFind = new \Sabre\DAV\PropFind(
			$testPath,
			[
				'customprop',
				'customprop2',
				'unsetprop',
			],
			0
		);

		$this->plugin->propFind(
			$testPath,
			$propFind
		);

		$this->assertEquals('value1', $propFind->get('customprop'));
		$this->assertEquals('value2', $propFind->get('customprop2'));
		$this->assertEquals(['unsetprop'], $propFind->get404Properties());
	}

	/**
	 * Test delete property
	 */
	public function testDeleteProperty() {
		$testPath = "calendars/{$this->user->getUID()}/personal";
		$node = $this->createTestNode(Calendar::class);
		$this->tree->expects($this->any())
			->method('getNodeForPath')
			->with($testPath)
			->will($this->returnValue($node));

		$this->applyDefaultProps($testPath);

		$propPatch = new \Sabre\DAV\PropPatch([
			'customprop' => null,
		]);

		$this->plugin->propPatch(
			$testPath,
			$propPatch
		);

		$propPatch->commit();

		$this->assertEmpty($propPatch->getRemainingMutations());

		$result = $propPatch->getResult();
		$this->assertEquals(204, $result['customprop']);
	}

	private function createTestNode($class) {
		$node = $this->getMockBuilder($class)
			->disableOriginalConstructor()
			->getMock();

		$node->expects($this->any())
			->method('getName')
			->will($this->returnValue('dummycal'));

		return $node;
	}

	private function applyDefaultProps($path = '/dummypath') {
		// properties to set
		$propPatch = new \Sabre\DAV\PropPatch([
			'customprop' => 'value1',
			'customprop2' => 'value2',
		]);

		$this->plugin->propPatch(
			$path,
			$propPatch
		);

		$propPatch->commit();

		$this->assertEmpty($propPatch->getRemainingMutations());

		$result = $propPatch->getResult();
		$this->assertEquals(200, $result['customprop']);
		$this->assertEquals(200, $result['customprop2']);
	}
}
