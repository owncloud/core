<?php
/**
 * ownCloud
 *
 * @author Michael Gapczynski
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
 */

namespace Test\Share;

use OC\Share\Share;

class TestShareBackend extends \OC\Share\ShareBackend {

	private $isValidItem;
	private $events;

	public function getItemType() {
		return 'test';
	}

	protected function isValidItem(Share $share) {
		if ($this->isValidItem === false) {
			throw new \OC\Share\Exception\InvalidItemException(
				'The item does not exist'
			);
		} else {
			return true;
		}
	}

	public function setIsValidItem($isValidItem) {
		$this->isValidItem = $isValidItem;
	}

	public function pAreValidPermissions(Share $share) {
		return parent::areValidPermissions($share);
	}

	public function pIsValidExpirationTime(Share $share) {
		return parent::isValidExpirationTime($share);
	}

	protected function emit($scope, $method, $arguments = array()) {
		// Store the emitted events so they can be retrieved later for assertions
		$this->events[] = array($scope, $method, $arguments);
	}

	public function getEvents() {
		return $this->events;
	}

}

class ShareBackend extends \PHPUnit_Framework_TestCase {

	protected $timeMachine;
	protected $user;
	protected $group;
	protected $link;
	protected $shareBackend;

	protected function setUp() {
		$this->timeMachine = $this->getMockBuilder('\OC\Share\TimeMachine')
			->disableOriginalConstructor()
			->getMock();
		$this->timeMachine->expects($this->any())
			->method('getTime')
			->will($this->returnValue(1370797580));
		$this->user = $this->getMockBuilder('\OC\Share\ShareType\User')
			->disableOriginalConstructor()
			->getMock();
		$this->user->expects($this->any())
			->method('getId')
			->will($this->returnValue('user'));
		$this->group = $this->getMockBuilder('\OC\Share\ShareType\Group')
			->disableOriginalConstructor()
			->getMock();
		$this->group->expects($this->any())
			->method('getId')
			->will($this->returnValue('group'));
		$this->link = $this->getMockBuilder('\OC\Share\ShareType\Link')
			->disableOriginalConstructor()
			->getMock();
		$this->link->expects($this->any())
			->method('getId')
			->will($this->returnValue('link'));
		$this->shareBackend = new TestShareBackend($this->timeMachine,
			array($this->user, $this->group, $this->link)
		);
	}

	/**
	 * Get a fake valid item source for testing isValidItem
	 * @param Share $share
	 * @return any
	 */
	protected function getValidItemSource(Share $share) {
		$this->shareBackend->setIsValidItem(true);
		return 1;
	}

	protected function getExpectedItemTarget(Share $share) {}

	public function testGetShareTypes() {
		$shareTypes = $this->shareBackend->getShareTypes();
		$this->assertCount(3, $shareTypes);
		$this->assertArrayHasKey('user', $shareTypes);
		$this->assertEquals($this->user, $shareTypes['user']);
		$this->assertArrayHasKey('group', $shareTypes);
		$this->assertEquals($this->group, $shareTypes['group']);
		$this->assertArrayHasKey('link', $shareTypes);
		$this->assertEquals($this->link, $shareTypes['link']);
	}

	public function testGetShareType() {
		$this->assertEquals($this->group, $this->shareBackend->getShareType('group'));
	}

	public function testGetShareTypeDoesNotExist() {
		$this->setExpectedException('\OC\Share\Exception\ShareTypeDoesNotExistException',
			'A share type does not exist with the id foo'
		);
		$this->shareBackend->getShareType('foo');
	}

	public function testShare() {
		$mtgap = 'MTGap';
		$icewind = 'Icewind';
		$share = new Share();
		$share->setShareTypeId('user');
		$share->setShareOwner($mtgap);
		$share->setShareWith($icewind);
		$share->setItemOwner($mtgap);
		$share->setPermissions(31);
		$item = $this->getValidItemSource($share);
		$share->setItemSource($item);
		$share->resetUpdatedProperties();
		$sharedShare = clone $share;
		$sharedShare->setShareTime(1370797580);
		$userMap = array(
			array(array('shareOwner' => $mtgap, 'shareWith' => $icewind, 'itemSource' => $item),
				1, null, array()
			)
		);
		$this->user->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($userMap));
		$this->group->expects($this->never())
			->method('getShares');
		$this->link->expects($this->never())
			->method('getShares');
		$this->user->expects($this->once())
			->method('isValidShare')
			->with($this->equalTo($share))
			->will($this->returnValue(true));
		$this->user->expects($this->once())
			->method('share')
			->with($this->equalTo($share))
			->will($this->returnValue($share));
		$this->user->expects($this->never())
			->method('update');
		$this->user->expects($this->never())
			->method('setParentIds');
		$this->group->expects($this->never())
			->method('update');
		$this->group->expects($this->never())
			->method('setParentIds');
		$this->link->expects($this->never())
			->method('update');
		$this->link->expects($this->never())
			->method('setParentIds');
		$share = $this->shareBackend->share($share);
		$this->assertEquals($sharedShare, $share);
		$events = $this->shareBackend->getEvents();
		$this->assertContains(array('\OC\Share', 'preShare', array($share)), $events);
		$this->assertContains(array('\OC\Share', 'postShare', array($sharedShare)), $events);
	}

	public function testShareWithInvalidItem() {
		$this->shareBackend->setIsValidItem(false);

		$share = new Share();
		$this->setExpectedException('\OC\Share\Exception\InvalidItemException',
			'The item does not exist'
		);
		$this->shareBackend->share($share);
	}

	public function testShareAgain() {
		$butonic = 'butonic';
		$bartv = 'bartv';
		$share = new Share();
		$share->setShareTypeId('user');
		$share->setShareOwner($butonic);
		$share->setShareWith($bartv);
		$share->setItemOwner($butonic);
		$item = $this->getValidItemSource($share);
		$share->setItemSource($item);
		$map = array(
			array(array('shareOwner' => $butonic, 'shareWith' => $bartv, 'itemSource' => $item),
				1, null, array($share)
			)
		);
		$this->user->expects($this->any())
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->setExpectedException('\OC\Share\Exception\InvalidShareException',
			'The share already exists'
		);
		$this->shareBackend->share($share);
	}

	public function testShareWithInvalidShare() {
		$mtgap = 'MTGap';
		$icewind = 'Icewind';
		$item = 1;
		$share = new Share();
		$share->setShareTypeId('user');
		$share->setShareOwner($mtgap);
		$share->setShareWith($icewind);
		$share->setItemOwner($mtgap);
		$share->setPermissions(31);
		$item = $this->getValidItemSource($share);
		$share->setItemSource($item);
		$userMap = array(
			array(array('shareOwner' => $mtgap, 'shareWith' => $icewind, 'itemSource' => $item),
				1, null, array()
			),
		);
		$this->user->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($userMap));
		$this->group->expects($this->never())
			->method('getShares');
		$this->link->expects($this->never())
			->method('getShares');
		$this->user->expects($this->once())
			->method('isValidShare')
			->with($this->equalTo($share))
			->will($this->returnValue(false));
		$this->assertFalse($this->shareBackend->share($share));
	}

	public function testUnshare() {
		$share = new Share();
		$share->setId(1);
		$share->setShareTypeId('user');
		$this->user->expects($this->once())
			->method('unshare')
			->with($this->equalTo($share));
		$this->shareBackend->unshare($share);
		$events = $this->shareBackend->getEvents();
		$this->assertContains(array('\OC\Share', 'preUnshare', array($share)), $events);
		$this->assertContains(array('\OC\Share', 'postUnshare', array($share)), $events);
	}

	public function testUpdate() {
		$share = new Share();
		$share->setId(1);
		$share->setShareTypeId('user');
		$share->resetUpdatedProperties();
		$share->setItemTarget('New Test Item');
		$this->user->expects($this->once())
			->method('update')
			->with($this->equalTo($share));
		$this->shareBackend->update($share);
		$events = $this->shareBackend->getEvents();
		$this->assertContains(array('\OC\Share', 'preUpdate', array($share)), $events);
		$this->assertContains(array('\OC\Share', 'postUpdate', array($share)), $events);
	}

	public function testUpdateWithCustomUpdateMethod() {
		$share = new Share();
		$share->setId(3);
		$share->setShareTypeId('user');
		$share->resetUpdatedProperties();
		$share->setParentIds(array(1, 2));
		$this->user->expects($this->never())
			->method('update');
		$this->user->expects($this->once())
			->method('setParentIds')
			->with($this->equalTo($share));
		$this->shareBackend->update($share);
		$events = $this->shareBackend->getEvents();
		$this->assertContains(array('\OC\Share', 'preUpdate', array($share)), $events);
		$this->assertContains(array('\OC\Share', 'postUpdate', array($share)), $events);
	}

	public function testUpdateWithNoChanges() {
		$share = new Share();
		$share->setId(1);
		$share->setShareTypeId('link');
		$share->resetUpdatedProperties();
		$this->link->expects($this->never())
			->method('update');
		$this->shareBackend->update($share);
		$events = $this->shareBackend->getEvents();
		$this->assertEmpty($events);
	}

	public function testUpdateWithValidPermissionsAndExpirationTime() {
		$share = new Share();
		$share->setShareTypeId('user');
		$share->resetUpdatedProperties();
		$share->setPermissions(1);
		$share->setExpirationTime(1370801180);
		$this->user->expects($this->once())
			->method('update');
		$this->shareBackend->update($share);
		$events = $this->shareBackend->getEvents();
		$this->assertContains(array('\OC\Share', 'preUpdate', array($share)), $events);
		$this->assertContains(array('\OC\Share', 'postUpdate', array($share)), $events);
	}

	public function testUpdateWithInvalidPermissions() {
		$share = new Share();
		$share->setShareTypeId('link');
		$share->resetUpdatedProperties();
		$share->setPermissions(0);
		$this->setExpectedException('\OC\Share\Exception\InvalidPermissionsException',
			'The permissions are not in the range of 1 to '.\OCP\PERMISSION_ALL
		);
		$this->shareBackend->update($share);
		$events = $this->shareBackend->getEvents();
		$this->assertEmpty($events);
	}

	public function testUpdateWithInvalidExpirationTime() {
		$share = new Share();
		$share->setShareTypeId('link');
		$share->resetUpdatedProperties();
		// 59 minutes 59 seconds in the future
		$share->setExpirationTime(1370801179);
		$this->setExpectedException('\OC\Share\Exception\InvalidExpirationTimeException',
			'The expiration time is not at least 1 hour in the future'
		);
		$this->shareBackend->update($share);
		$events = $this->shareBackend->getEvents();
		$this->assertEmpty($events);
	}

	public function testGetShares() {
		$share1 = new Share();
		$share1->setId(1);
		$share1->setShareTypeId('user');
		$share2 = new Share();
		$share2->setId(2);
		$share2->setShareTypeId('group');
		$userMap = array(
			array(array(), null, null, array($share1))
		);
		$this->user->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($userMap));
		$groupMap = array(
			array(array(), null, null, array($share2))
		);
		$this->group->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($groupMap));
		$linkMap  = array(
			array(array(), null, null, array())
		);
		$this->link->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($linkMap));
		$shares = $this->shareBackend->getShares();
		$this->assertCount(2, $shares);
		$this->assertContains($share1, $shares);
		$this->assertContains($share2, $shares);
	}

	public function testGetSharesWithFilter() {
		$item = 1;
		$share1 = new Share();
		$share1->setId(1);
		$share1->setShareTypeId('user');
		$share1->setItemSource($item);
		$share2 = new Share();
		$share2->setId(2);
		$share2->setShareTypeId('group');
		$share2->setItemSource($item);
		$userMap = array(
			array(array('itemSource' => $item), null, null, array($share1)),
			array(array('id' => 2), null, null, array())
		);
		$this->user->expects($this->exactly(2))
			->method('getShares')
			->will($this->returnValueMap($userMap));
		$groupMap = array(
			array(array('itemSource' => $item), null, null, array($share2)),
			array(array('id' => 2), null, null, array($share2))
		);
		$this->group->expects($this->exactly(2))
			->method('getShares')
			->will($this->returnValueMap($groupMap));
		$linkMap  = array(
			array(array('itemSource' => $item), null, null, array()),
			array(array('id' => 2), null, null, array())
		);
		$this->link->expects($this->exactly(2))
			->method('getShares')
			->will($this->returnValueMap($linkMap));
		$shares = $this->shareBackend->getShares(array('itemSource' => $item));
		$this->assertCount(2, $shares);
		$this->assertContains($share1, $shares);
		$this->assertContains($share2, $shares);

		$share = $this->shareBackend->getShares(array('id' => 2));
		$this->assertCount(1, $share);
		$this->assertContains($share2, $share);
	}

	public function testGetSharesWithShareTypeId() {
		$share = new Share();
		$share->setId(1);
		$share->setShareTypeId('link');
		$linkMap = array(
			array(array(), null, null, array($share))
		);
		$this->user->expects($this->never())
			->method('getShares');
		$this->group->expects($this->never())
			->method('getShares');
		$this->link->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($linkMap));
		$shares = $this->shareBackend->getShares(array('shareTypeId' => 'link'));
		$this->assertCount(1, $shares);
		$this->assertContains($share, $shares);
	}

	public function testGetSharesWithLimitOffset() {
		$share2 = new Share();
		$share2->setId(2);
		$share2->setShareTypeId('user');
		$share3 = new Share();
		$share3->setId(3);
		$share3->setShareTypeId('user');
		$share4 = new Share();
		$share4->setId(4);
		$share4->setShareTypeId('group');
		$userMap = array(
			array(array(), 3, 1, array($share2, $share3)),
		);
		$this->user->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($userMap));
		$groupMap = array(
			array(array(), 1, 0, array($share4)),
		);
		$this->group->expects($this->once())
			->method('getShares')
			->will($this->returnValueMap($groupMap));
		$this->link->expects($this->never())
			->method('getShares');
		$shares = $this->shareBackend->getShares(array(), 3, 1);
		$this->assertCount(3, $shares);
		$this->assertContains($share2, $shares);
		$this->assertContains($share3, $shares);
		$this->assertContains($share4, $shares);
	}

	public function testIsExpired() {
		// No expiration time
		$share = new Share();
		$this->assertFalse($this->shareBackend->isExpired($share));

		// 1 second in the past
		$share->setExpirationTime(1370797579);
		$this->assertTrue($this->shareBackend->isExpired($share));

		// 1 second in the future
		$share->setExpirationTime(1370797581);
		$this->assertFalse($this->shareBackend->isExpired($share));

		// Default expiration time set for 2 hours from share time
		$share->setExpirationTime(null);
		$defaultTime = \OC_Appconfig::getValue('core', 'shareapi_expiration_time', 0);
		\OC_Appconfig::setValue('core', 'shareapi_expiration_time', 7200);
		// 1 hour 59 minutes 59 seconds in the past
		$share->setShareTime(1370790381);
		$this->assertFalse($this->shareBackend->isExpired($share));

		// 2 hours 1 second in the past
		$share->setShareTime(1370790379);
		$this->assertTrue($this->shareBackend->isExpired($share));
		\OC_Appconfig::setValue('core', 'shareapi_expiration_time', $defaultTime);
	}

	public function testAreValidPermissions() {
		$share = new Share();
		$share->setPermissions(31);
		$this->assertTrue($this->shareBackend->pAreValidPermissions($share));
	}

	public function testAreValidPermissionsWithString() {
		$share = new Share();
		$share->setPermissions('31');
		$this->setExpectedException('\OC\Share\Exception\InvalidPermissionsException',
			'The permissions are not an integer'
		);
		$this->shareBackend->pAreValidPermissions($share);
	}

	public function testAreValidPermissionsWithZero() {
		$share = new Share();
		$share->setPermissions(0);
		$this->setExpectedException('\OC\Share\Exception\InvalidPermissionsException',
			'The permissions are not in the range of 1 to '.\OCP\PERMISSION_ALL
		);
		$this->shareBackend->pAreValidPermissions($share);
	}

	public function testAreValidPermissionsWithOneMoreThanAll() {
		$share = new Share();
		$share->setPermissions(\OCP\PERMISSION_ALL + 1);
		$this->setExpectedException('\OC\Share\Exception\InvalidPermissionsException',
			'The permissions are not in the range of 1 to '.\OCP\PERMISSION_ALL
		);
		$this->shareBackend->pAreValidPermissions($share);
	}

	public function testIsValidExpirationTime() {
		// No expiration time
		$share = new Share();
		$this->assertTrue($this->shareBackend->pIsValidExpirationTime($share));

		// 1 hour in the future
		$share->setExpirationTime(1370801180);
		$this->assertTrue($this->shareBackend->pIsValidExpirationTime($share));
	}

	public function testIsValidExpirationTimeWithString() {
		$share = new Share();
		$share->setExpirationTime('1370797580');
		$this->setExpectedException('\OC\Share\Exception\InvalidExpirationTimeException',
			'The expiration time is not an integer'
		);
		$this->shareBackend->pIsValidExpirationTime($share);
	}

	public function testIsValidExpirationTimeNot1HourInTheFuture() {
		$share = new Share();
		// 59 minutes 59 seconds in the future
		$share->setExpirationTime(1370801179);
		$this->setExpectedException('\OC\Share\Exception\InvalidExpirationTimeException',
			'The expiration time is not at least 1 hour in the future'
		);
		$this->shareBackend->pIsValidExpirationTime($share);
	}

}