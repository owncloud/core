<?php

/**
 * ownCloud - News
 *
 * @author Alessandro Copyright
 * @author Bernhard Posselt
 * @author Michael Gapczynski
 * @copyright 2012 Alessandro Cosentino cosenal@gmail.com
 * @copyright 2012 Bernhard Posselt nukeawhale@gmail.com
 * @copyright 2013 Michael Gapczynski mtgap@owncloud.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
*/

namespace Test\Share;

use OC\Share\Share;

class ShareTest extends \PHPUnit_Framework_TestCase {

	public function testIsCreatable() {
		$share = new Share();
		$share->setPermissions(\OCP\PERMISSION_CREATE);
		$this->assertTrue($share->isCreatable());

		$share->setPermissions(\OCP\PERMISSION_READ);
		$this->assertFalse($share->isCreatable());
	}

	public function testIsReadable() {
		$share = new Share();
		$share->setPermissions(\OCP\PERMISSION_READ);
		$this->assertTrue($share->isReadable());

		$share->setPermissions(0);
		$this->assertFalse($share->isReadable());
	}

	public function testIsUpdatable() {
		$share = new Share();
		$share->setPermissions(\OCP\PERMISSION_UPDATE);
		$this->assertTrue($share->isUpdatable());

		$share->setPermissions(\OCP\PERMISSION_READ);
		$this->assertFalse($share->isUpdatable());
	}

	public function testIsDeletable() {
		$share = new Share();
		$share->setPermissions(\OCP\PERMISSION_DELETE);
		$this->assertTrue($share->isDeletable());

		$share->setPermissions(\OCP\PERMISSION_READ);
		$this->assertFalse($share->isDeletable());
	}

	public function testIsSharable() {
		$share = new Share();
		$share->setPermissions(\OCP\PERMISSION_SHARE);
		$this->assertTrue($share->isSharable());

		$share->setPermissions(\OCP\PERMISSION_READ);
		$this->assertFalse($share->isSharable());
	}

	public function testAddParentId() {
		$share = new Share();
		$share->addParentId(1);
		$this->assertEquals(array(1), $share->getParentIds());
		$this->assertContains('parentIds', $share->getUpdatedProperties());
		$share->addParentId(3);
		$this->assertEquals(array(1, 3), $share->getParentIds());
		$this->assertContains('parentIds', $share->getUpdatedProperties());
	}

	public function testRemoveParentId() {
		$share = new Share();
		$share->setParentIds(array(1, 3));
		$share->removeParentId(3);
		$this->assertEquals(array(1), $share->getParentIds());
		$this->assertContains('parentIds', $share->getUpdatedProperties());
	}

	public function testFromParams() {
		$params = array(
			'shareTypeId' => 'group',
			'shareOwner' => 'MTGap',
			'shareWith' => 'friends',
			'itemType' => 'test',
			'itemSource' => 23,
		);
		$share = Share::fromParams($params);
		$this->assertEquals($params['shareTypeId'], $share->getShareTypeId());
		$this->assertEquals($params['shareOwner'], $share->getShareOwner());
		$this->assertEquals($params['shareWith'], $share->getShareWith());
		$this->assertEquals($params['itemType'], $share->getItemType());
		$this->assertEquals($params['itemSource'], $share->getItemSource());
		$this->assertTrue($share instanceof Share);
	}

	public function testFromRow() {
		$row = array(
			'id' => '1',
			'shareTypeId' => 'group',
			'shareOwner' => 'MTGap',
			'shareWith' => 'friends',
			'itemType' => 'test',
			'itemSource' => '23',
		);
		$share = Share::fromRow($row);
		$this->assertEquals(1, $share->getId());
		$this->assertEquals($row['shareTypeId'], $share->getShareTypeId());
		$this->assertEquals($row['shareOwner'], $share->getShareOwner());
		$this->assertEquals($row['shareWith'], $share->getShareWith());
		$this->assertEquals($row['itemType'], $share->getItemType());
		$this->assertEquals($row['itemSource'], $share->getItemSource());
		$this->assertTrue($share instanceof Share);
	}

	public function testGetSetId() {
		$id = 3;
		$share = new Share();
		$share->setId($id);
		$this->assertEquals($id, $share->getId());
	}

	public function testCallShouldOnlyWorkForGetterSetter() {
		$this->setExpectedException('\BadFunctionCallException');
		$share = new Share();
		$share->something();
	}

	public function testGetterShouldFailIfPropertyNotDefined() {
		$this->setExpectedException('\BadFunctionCallException');
		$share = new Share();
		$share->getTest();
	}

	public function testSetterShouldFailIfPropertyNotDefined() {
		$this->setExpectedException('\BadFunctionCallException');
		$share = new Share();
		$share->setTest();
	}

	public function testSetterMarksPropertyUpdated() {
		$share = new Share();
		$share->setId(3);
		$this->assertContains('id', $share->getUpdatedProperties());
	}

	public function testResetUpdatedProperties() {
		$share = new Share();
		$share->setId(3);
		$share->resetUpdatedProperties();
		$this->assertEmpty($share->getUpdatedProperties());
	}

	public function testColumnToPropertyNoReplacement() {
		$column = 'my';
		$this->assertEquals('my', Share::columnToProperty($column));
	}

	public function testColumnToProperty() {
		$column = 'my_property';
		$this->assertEquals('myProperty', Share::columnToProperty($column));
	}

	public function testPropertyToColumnNoReplacement() {
		$property = 'my';
		$this->assertEquals('`my`', Share::propertyToColumn($property));
	}

	public function testPropertyToColumn() {
		$property = 'myProperty';
		$this->assertEquals('`my_property`', Share::propertyToColumn($property));
	}

}