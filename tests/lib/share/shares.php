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
use OC\Share\TimeMachine;

class TestShares extends \OC\Share\Shares {

	private $isValidItem;

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

	protected function generateItemTarget(Share $share) {
		return 'Item Target';
	}

	public function setIsValidItem($isValidItem) {
		$this->isValidItem = $isValidItem;
	}

	public function pGetShareType($shareTypeId) {
		return parent::getShareType($shareTypeId);
	}

	public function pAreValidPermissions(Share $share) {
		return parent::areValidPermissions($share);
	}

	public function pIsValidExpirationTime(Share $share) {
		return parent::isValidExpirationTime($share);
	}

}

class Shares extends \PHPUnit_Framework_TestCase {

	protected $timeMachine;
	protected $user;
	protected $group;
	protected $link;
	protected $shares;

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
		$this->shares = new TestShares($this->timeMachine,
			array($this->user, $this->group, $this->link)
		);
		$this->shares->setIsValidItem(true);
	}

	public function testShare() {
		$this->shares->setIsValidItem(true);

		$mtgap = 'MTGap';
		$icewind = 'Icewind';
		$item = 1;
		$share = new Share();
		$share->setShareTypeId('user');
		$share->setShareOwner($mtgap);
		$share->setShareWith($icewind);
		$share->setItemSource($item);
		$share->setPermissions(31);
		$share->resetUpdatedProperties();
		$sharedShare = clone $share;
		$sharedShare->setShareTime(1370797580);
		$sharedShare->setItemTarget('Item Target');
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
		$share = $this->shares->share($share);
		$this->assertEquals($sharedShare, $share);
	}

	public function testShareWithInvalidItem() {
		$this->shares->setIsValidItem(false);

		$share = new Share();
		$this->setExpectedException('\OC\Share\Exception\InvalidItemException',
			'The item does not exist'
		);
		$this->shares->share($share);
	}

	public function testShareAgain() {
		$this->shares->setIsValidItem(true);

		$butonic = 'butonic';
		$bartv = 'bartv';
		$item = 2;
		$share = new Share();
		$share->setShareTypeId('user');
		$share->setShareOwner($butonic);
		$share->setShareWith($bartv);
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
		$this->shares->share($share);
	}

	public function testShareWithInvalidShare() {
		$this->shares->setIsValidItem(true);

		$mtgap = 'MTGap';
		$icewind = 'Icewind';
		$item = 1;
		$share = new Share();
		$share->setShareTypeId('user');
		$share->setShareOwner($mtgap);
		$share->setShareWith($icewind);
		$share->setItemSource($item);
		$share->setPermissions(31);
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
		$this->assertFalse($this->shares->share($share));
	}

	public function testUnshare() {
		$share = new Share();
		$share->setId(1);
		$share->setShareTypeId('user');
		$this->user->expects($this->once())
			->method('unshare')
			->with($this->equalTo($share));
		$this->shares->unshare($share);
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
		$this->shares->update($share);
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
		$this->shares->update($share);
	}

	public function testUpdateWithNoChanges() {
		$share = new Share();
		$share->setId(1);
		$share->setShareTypeId('link');
		$share->resetUpdatedProperties();
		$this->link->expects($this->never())
			->method('update');
		$this->shares->update($share);
	}

	public function testUpdateWithInvalidPermissions() {
		$share = new Share();
		$share->setShareTypeId('link');
		$share->resetUpdatedProperties();
		$share->setPermissions(0);
		$this->setExpectedException('\OC\Share\Exception\InvalidPermissionsException',
			'The permissions are not in the range of 1 to '.\OCP\PERMISSION_ALL
		);
		$this->shares->update($share);
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
		$this->shares->update($share);
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
		$shares = $this->shares->getShares();
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
		$shares = $this->shares->getShares(array('itemSource' => $item));
		$this->assertCount(2, $shares);
		$this->assertContains($share1, $shares);
		$this->assertContains($share2, $shares);

		$share = $this->shares->getShares(array('id' => 2));
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
		$shares = $this->shares->getShares(array('shareTypeId' => 'link'));
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
		$shares = $this->shares->getShares(array(), 3, 1);
		$this->assertCount(3, $shares);
		$this->assertContains($share2, $shares);
		$this->assertContains($share3, $shares);
		$this->assertContains($share4, $shares);
	}

	public function testSearchForPotentialShareWiths() {
		$userMap = array(
			array('foo', null, null, array('foouser1', 'foouser2', 'foouser3')),
		);
		$this->user->expects($this->once())
			->method('searchForPotentialShareWiths')
			->will($this->returnValueMap($userMap));
		$groupMap = array(
			array('foo', null, null, array('foogroup1', 'foogroup2')),
		);
		$this->group->expects($this->once())
			->method('searchForPotentialShareWiths')
			->will($this->returnValueMap($groupMap));
		$linkMap = array(
			array('foo', null, null, array()),
		);
		$this->link->expects($this->once())
			->method('searchForPotentialShareWiths')
			->will($this->returnValueMap($linkMap));
		$shareWiths = $this->shares->searchForPotentialShareWiths('foo');
		$this->assertCount(5, $shareWiths);
		$this->assertContains('foouser1', $shareWiths);
		$this->assertContains('foouser2', $shareWiths);
		$this->assertContains('foouser3', $shareWiths);
		$this->assertContains('foogroup1', $shareWiths);
		$this->assertContains('foogroup2', $shareWiths);
	}

	public function testSearchForPotentialShareWithsWithLimitOffset() {
		$userMap = array(
			array('foo', 3, 1, array('foouser2', 'foouser3')),
		);
		$this->user->expects($this->once())
			->method('searchForPotentialShareWiths')
			->will($this->returnValueMap($userMap));
		$groupMap = array(
			array('foo', 1, 0, array('foogroup1')),
		);
		$this->group->expects($this->once())
			->method('searchForPotentialShareWiths')
			->will($this->returnValueMap($groupMap));
		$this->link->expects($this->never())
			->method('searchForPotentialShareWiths');
		$shareWiths = $this->shares->searchForPotentialShareWiths('foo', 3, 1);
		$this->assertCount(3, $shareWiths);
		$this->assertContains('foouser2', $shareWiths);
		$this->assertContains('foouser3', $shareWiths);
		$this->assertContains('foogroup1', $shareWiths);
	}

	public function testGetShareType() {
		$this->assertEquals($this->group, $this->shares->pGetShareType('group'));
	}

	public function testGetShareTypeDoesNotExist() {
		$this->setExpectedException('\OC\Share\Exception\ShareTypeDoesNotExistException',
			'No share type found matching id'
		);
		$this->shares->pGetShareType('foo');
	}

	public function testIsExpired() {
		// No expiration time
		$share = new Share();
		$this->assertFalse($this->shares->isExpired($share));

		// 1 second in the past
		$share->setExpirationTime(1370797579);
		$this->assertTrue($this->shares->isExpired($share));

		// 1 second in the future
		$share->setExpirationTime(1370797581);
		$this->assertFalse($this->shares->isExpired($share));

		// Default expiration time set for 2 hours from share time
		$share->setExpirationTime(null);
		$defaultTime = \OC_Appconfig::getValue('core', 'shareapi_expiration_time', 0);
		\OC_Appconfig::setValue('core', 'shareapi_expiration_time', 7200);
		// 1 hour 59 minutes 59 seconds in the past
		$share->setShareTime(1370790381);
		$this->assertFalse($this->shares->isExpired($share));

		// 2 hours 1 second in the past
		$share->setShareTime(1370790379);
		$this->assertTrue($this->shares->isExpired($share));
		\OC_Appconfig::setValue('core', 'shareapi_expiration_time', $defaultTime);
	}

	public function testAreValidPermissions() {
		$share = new Share();
		$share->setPermissions(31);
		$this->assertTrue($this->shares->pAreValidPermissions($share));
	}

	public function testAreValidPermissionsWithString() {
		$share = new Share();
		$share->setPermissions('31');
		$this->setExpectedException('\OC\Share\Exception\InvalidPermissionsException',
			'The permissions are not an integer'
		);
		$this->shares->pAreValidPermissions($share);
	}

	public function testAreValidPermissionsWithZero() {
		$share = new Share();
		$share->setPermissions(0);
		$this->setExpectedException('\OC\Share\Exception\InvalidPermissionsException',
			'The permissions are not in the range of 1 to '.\OCP\PERMISSION_ALL
		);
		$this->shares->pAreValidPermissions($share);
	}

	public function testAreValidPermissionsWithOneMoreThanAll() {
		$share = new Share();
		$share->setPermissions(\OCP\PERMISSION_ALL + 1);
		$this->setExpectedException('\OC\Share\Exception\InvalidPermissionsException',
			'The permissions are not in the range of 1 to '.\OCP\PERMISSION_ALL
		);
		$this->shares->pAreValidPermissions($share);
	}

	public function testIsValidExpirationTime() {
		// No expiration time
		$share = new Share();
		$this->assertTrue($this->shares->pIsValidExpirationTime($share));

		// 1 hour in the future
		$share->setExpirationTime(1370801180);
		$this->assertTrue($this->shares->pIsValidExpirationTime($share));
	}

	public function testIsValidExpirationTimeWithString() {
		$share = new Share();
		$share->setExpirationTime('1370797580');
		$this->setExpectedException('\OC\Share\Exception\InvalidExpirationTimeException',
			'The expiration time is not an integer'
		);
		$this->shares->pIsValidExpirationTime($share);
	}

	public function testIsValidExpirationTimeNot1HourInTheFuture() {
		$share = new Share();
		// 59 minutes 59 seconds in the future
		$share->setExpirationTime(1370801179);
		$this->setExpectedException('\OC\Share\Exception\InvalidExpirationTimeException',
			'The expiration time is not at least 1 hour in the future'
		);
		$this->shares->pIsValidExpirationTime($share);
	}

}