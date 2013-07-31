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

namespace Test\Share\ShareType;

use OC\Share\Share;
use OC\Share\ShareFactory;

class TestUser extends \OC\Share\ShareType\User {

	public function getId() {
		return 'testuser';
	}

}

class User extends ShareType {

	private $itemTargetMachine;
	private $userManager;
	private $groupManager;
	private $mtgap;
	private $mtgapDisplay;
	private $karlitschek;
	private $karlitschekDisplay;
	private $icewind;
	private $icewindDisplay;

	protected function setUp() {
		$this->mtgap = 'MTGap';
		$this->mtgapDisplay = 'Michael Gapczynski';
		$this->karlitschek = 'karlitschek';
		$this->karlitschekDisplay = 'Frank Karlitschek';
		$this->icewind = 'Icewind';
		$this->icewindDisplay = 'Robin Appelman';
		$this->itemTargetMachine = $this->getMockBuilder('\OC\Share\ItemTargetMachine')
			->disableOriginalConstructor()
			->getMock();
		$this->itemTargetMachine->expects($this->any())
			->method('getItemTarget')
			->will($this->returnValue('Test Target'));
		$this->userManager = $this->getMockBuilder('\OC\User\Manager')
			->disableOriginalConstructor()
			->getMock();
		$this->groupManager = $this->getMockBuilder('\OC\Group\Manager')
			->disableOriginalConstructor()
			->getMock();
		$this->instance = new TestUser('test', new ShareFactory(), $this->itemTargetMachine,
			$this->userManager,	$this->groupManager
		);
	}

	protected function getTestShare($version) {
		$share = new Share();
		$share->setShareTypeId($this->instance->getId());
		$share->setItemType('test');
		$share->setItemSource('23');
		$share->setPermissions(31);
		$share->setShareTime(1370797580);
		$mtgapUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$mtgapUser->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue($this->mtgapDisplay));
		$karlitschekUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$karlitschekUser->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue($this->karlitschekDisplay));
		$icewindUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$icewindUser->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue($this->icewindDisplay));
		$map = array(
			array($this->mtgap, $mtgapUser),
			array($this->karlitschek, $karlitschekUser),
			array($this->icewind, $icewindUser),
		);
		$this->userManager->expects($this->atLeastOnce())
			->method('get')
			->will($this->returnValueMap($map));
		switch ($version) {
			case 1:
				$share->setShareOwner($this->mtgap);
				$share->setItemOwner($this->mtgap);
				$share->setShareWith($this->karlitschek);
				break;
			case 2:
				$share->setShareOwner($this->mtgap);
				$share->setItemOwner($this->mtgap);
				$share->setShareWith($this->icewind);
				break;
			case 3:
				$share->setShareOwner($this->icewind);
				$share->setItemOwner($this->icewind);
				$share->setShareWith($this->karlitschek);
				break;
			case 4:
				$share->setShareOwner($this->karlitschek);
				$share->setItemOwner($this->karlitschek);
				$share->setShareWith($this->mtgap);
				break;
		}	
		return $share;
	}

	protected function getSharedTestShare($version) {
		$share = new Share();
		$share->setShareTypeId($this->instance->getId());
		$share->setItemType('test');
		$share->setItemSource('23');
		$share->setItemTarget('Test Target');
		$share->setPermissions(31);
		$share->setShareTime(1370797580);
		switch ($version) {
			case 1:
				$share->setShareOwner($this->mtgap);
				$share->setItemOwner($this->mtgap);
				$share->setShareOwnerDisplayName($this->mtgapDisplay);
				$share->setShareWith($this->karlitschek);
				$share->setShareWithDisplayName($this->karlitschekDisplay);
				break;
			case 2:
				$share->setShareOwner($this->mtgap);
				$share->setItemOwner($this->mtgap);
				$share->setShareOwnerDisplayName($this->mtgapDisplay);
				$share->setShareWith($this->icewind);
				$share->setShareWithDisplayName($this->icewindDisplay);
				break;
			case 3:
				$share->setShareOwner($this->icewind);
				$share->setItemOwner($this->icewind);
				$share->setShareOwnerDisplayName($this->icewindDisplay);
				$share->setShareWith($this->karlitschek);
				$share->setShareWithDisplayName($this->karlitschekDisplay);
				break;
			case 4:
				$share->setShareOwner($this->karlitschek);
				$share->setItemOwner($this->karlitschek);
				$share->setShareOwnerDisplayName($this->karlitschekDisplay);
				$share->setShareWith($this->mtgap);
				$share->setShareWithDisplayName($this->mtgapDisplay);
				break;
		}	
		return $share;
	}

	public function testIsValidShare() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		\OC_Appconfig::setValue('core', 'shareapi_share_policy', 'global');

		$tanghus = 'tanghus';
		$DeepDiver = 'DeepDiver';
		$share = new Share();
		$share->setShareOwner($tanghus);
		$share->setShareWith($DeepDiver);
		$map = array(
			array($tanghus, true),
			array($DeepDiver, true),
		);
		$this->userManager->expects($this->exactly(2))
			->method('userExists')
			->will($this->returnValueMap($map));
		$this->assertTrue($this->instance->isValidShare($share));

		\OC_Appconfig::setValue('core', 'shareapi_share_policy', $sharingPolicy);
	}

	public function testIsValidShareWithSameUsers() {
		$zimba12 = 'zimba12';
		$share = new Share();
		$share->setShareOwner($zimba12);
		$share->setShareWith($zimba12);
		$this->setExpectedException('\OC\Share\Exception\InvalidShareException',
			'The share owner is the user shared with'
		);
		$this->instance->isValidShare($share);
	}

	public function testIsValidShareWithShareOwnerDoesNotExist() {
		$tpn = 'tpn';
		$bar = 'bar';
		$share = new Share();
		$share->setShareOwner($bar);
		$share->setShareWith($tpn);
		$map = array(
			array($bar, false),
			array($tpn, true),
		);
		$this->userManager->expects($this->atLeastOnce())
			->method('userExists')
			->will($this->returnValueMap($map));
		$this->setExpectedException('\OC\Share\Exception\InvalidShareException',
			'The share owner does not exist'
		);
		$this->instance->isValidShare($share);
	}

	public function testIsValidShareWithShareWithDoesNotExist() {
		$raydiation = 'Raydiation';
		$foo = 'foo';
		$share = new Share();
		$share->setShareOwner($raydiation);
		$share->setShareWith($foo);
		$map = array(
			array($raydiation, true),
			array($foo, false),
		);
		$this->userManager->expects($this->atLeastOnce())
			->method('userExists')
			->will($this->returnValueMap($map));
		$this->setExpectedException('\OC\Share\Exception\InvalidShareException',
			'The user shared with does not exist'
		);
		$this->instance->isValidShare($share);
	}

	public function testIsValidShareWithGroupsOnlyPolicy() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		\OC_Appconfig::setValue('core', 'shareapi_share_policy', 'groups_only');

		$jancborchardt = 'jancborchardt';
		$raydiation = 'Raydiation';
		$share = new Share();
		$share->setShareOwner($jancborchardt);
		$share->setShareWith($raydiation);
		$map = array(
			array($jancborchardt, true),
			array($raydiation, true),
		);
		$this->userManager->expects($this->atLeastOnce())
			->method('userExists')
			->will($this->returnValueMap($map));
		$shareOwnerUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$shareWithUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$usersMap = array(
			array($jancborchardt, $shareOwnerUser),
			array($raydiation, $shareWithUser),
		);
		$this->userManager->expects($this->any())
			->method('get')
			->will($this->returnValueMap($usersMap));
		$group = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$this->groupManager->expects($this->once())
			->method('getUserGroups')
			->with($this->equalTo($shareOwnerUser))
			->will($this->returnValue(array($group)));
		$group->expects($this->atLeastOnce())
			->method('inGroup')
			->with($this->equalTo($shareWithUser))
			->will($this->returnValue(true));
		$this->assertTrue($this->instance->isValidShare($share));

		\OC_Appconfig::setValue('core', 'shareapi_share_policy', $sharingPolicy);
	}

	public function testIsValidShareWithShareOwnerNotInShareWithGroupsAndGroupsOnlyPolicy() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		\OC_Appconfig::setValue('core', 'shareapi_share_policy', 'groups_only');

		$jancborchardt = 'jancborchardt';
		$raydiation = 'Raydiation';
		$share = new Share();
		$share->setShareOwner($jancborchardt);
		$share->setShareWith($raydiation);
		$map = array(
			array($jancborchardt, true),
			array($raydiation, true),
		);
		$this->userManager->expects($this->atLeastOnce())
			->method('userExists')
			->will($this->returnValueMap($map));
		$shareOwnerUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$shareWithUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$usersMap = array(
			array($jancborchardt, $shareOwnerUser),
			array($raydiation, $shareWithUser),
		);
		$this->userManager->expects($this->any())
			->method('get')
			->will($this->returnValueMap($usersMap));
		$group = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$this->groupManager->expects($this->once())
			->method('getUserGroups')
			->with($this->equalTo($shareOwnerUser))
			->will($this->returnValue(array($group)));
		$group->expects($this->atLeastOnce())
			->method('inGroup')
			->with($this->equalTo($shareWithUser))
			->will($this->returnValue(false));
		$this->setExpectedException('\OC\Share\Exception\InvalidShareException',
			'The share owner is not in any groups of the user shared with as required by the '.
			'groups only sharing policy set by the admin'
		);
		$this->instance->isValidShare($share);

		\OC_Appconfig::setValue('core', 'shareapi_share_policy', $sharingPolicy);
	}

	public function testGetSharesWithFilter() {
		$this->setupTestShares();
		$filter = array(
			'shareWith' => $this->karlitschek,
		);
		$shares = $this->instance->getShares($filter, null, null);
		$this->assertCount(2, $shares);
		$this->assertContains($this->share1, $shares, '', false, false);
		$this->assertContains($this->share3, $shares, '', false, false);
	}

	public function testSearchForPotentialShareWiths() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		\OC_Appconfig::setValue('core', 'shareapi_share_policy', 'global');

		$user1 = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$user1->expects($this->any())
			->method('getUID')
			->will($this->returnValue('user1'));
		$user1->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue('foouser1'));
		$user2 = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$user2->expects($this->any())
			->method('getUID')
			->will($this->returnValue('user2'));
		$user2->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue('foouser2'));
		$user3 = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$user3->expects($this->any())
			->method('getUID')
			->will($this->returnValue('user3'));
		$user3->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue('foouser3'));
		$map = array(
			array('foo', null, null, array($user1, $user2, $user3)),
		);
		$this->userManager->expects($this->once())
			->method('searchDisplayName')
			->will($this->returnValueMap($map));
		$shareWiths = $this->instance->searchForPotentialShareWiths('user2', 'foo', null, null);
		$this->assertCount(2, $shareWiths);
		$this->assertContains(array(
			'shareWith' => 'user1',
			'shareWithDisplayName' => 'foouser1'), $shareWiths);
		$this->assertContains(array(
			'shareWith' => 'user3',
			'shareWithDisplayName' => 'foouser3'), $shareWiths);

		\OC_Appconfig::setValue('core', 'shareapi_share_policy', $sharingPolicy);
	}

	public function testSearchForPotentialShareWithsWithLimitOffset() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		\OC_Appconfig::setValue('core', 'shareapi_share_policy', 'global');

		$user1 = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$user1->expects($this->any())
			->method('getUID')
			->will($this->returnValue('user1'));
		$user1->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue('foouser1'));
		$user2 = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$user2->expects($this->any())
			->method('getUID')
			->will($this->returnValue('user2'));
		$user2->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue('foouser2'));
		$user3 = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$user3->expects($this->any())
			->method('getUID')
			->will($this->returnValue('user3'));
		$user3->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue('foouser3'));
		$map = array(
			array('foo', 5, null, array($user1, $user2, $user3)),
		);
		$this->userManager->expects($this->once())
			->method('searchDisplayName')
			->will($this->returnValueMap($map));
		$shareWiths = $this->instance->searchForPotentialShareWiths('user2', 'foo', 3, 1);
		$this->assertCount(1, $shareWiths);
		$this->assertContains(array(
			'shareWith' => 'user3',
			'shareWithDisplayName' => 'foouser3'), $shareWiths);

		\OC_Appconfig::setValue('core', 'shareapi_share_policy', $sharingPolicy);
	}

	public function testSearchForPotentialShareWithsWithGroupsOnlyPolicy() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		\OC_Appconfig::setValue('core', 'shareapi_share_policy', 'groups_only');

		$shareOwnerUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$this->userManager->expects($this->any())
			->method('get')
			->with($this->equalTo('user2'))
			->will($this->returnValue($shareOwnerUser));
		$user1 = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$user1->expects($this->any())
			->method('getUID')
			->will($this->returnValue('user1'));
		$user1->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue('foouser1'));
		$user2 = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$user2->expects($this->any())
			->method('getUID')
			->will($this->returnValue('user2'));
		$user2->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue('foouser2'));
		$user3 = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$user3->expects($this->any())
			->method('getUID')
			->will($this->returnValue('user3'));
		$user3->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue('foouser3'));
		$group1 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group1Map = array(
			array('foo', null, null, array($user1, $user2, $user3)),
		);
		$group1->expects($this->once())
			->method('searchDisplayName')
			->will($this->returnValueMap($group1Map));
		$group2 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group2Map = array(
			array('foo', null, null, array($user1, $user2)),
		);
		$group2->expects($this->once())
			->method('searchDisplayName')
			->will($this->returnValueMap($group2Map));
		$this->groupManager->expects($this->once())
			->method('getUserGroups')
			->with($this->equalTo($shareOwnerUser))
			->will($this->returnValue(array($group1, $group2)));
		$shareWiths = $this->instance->searchForPotentialShareWiths('user2', 'foo', null, null);
		$this->assertCount(2, $shareWiths);
		$this->assertContains(array(
			'shareWith' => 'user1',
			'shareWithDisplayName' => 'foouser1'), $shareWiths);
		$this->assertContains(array(
			'shareWith' => 'user3',
			'shareWithDisplayName' => 'foouser3'), $shareWiths);

		\OC_Appconfig::setValue('core', 'shareapi_share_policy', $sharingPolicy);
	}

	public function testSearchForPotentialShareWithsWithLimitOffsetAndGroupsOnlyPolicy() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		\OC_Appconfig::setValue('core', 'shareapi_share_policy', 'groups_only');

		$shareOwnerUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$this->userManager->expects($this->any())
			->method('get')
			->with($this->equalTo('user2'))
			->will($this->returnValue($shareOwnerUser));
		$user1 = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$user1->expects($this->any())
			->method('getUID')
			->will($this->returnValue('user1'));
		$user1->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue('foouser1'));
		$user2 = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$user2->expects($this->any())
			->method('getUID')
			->will($this->returnValue('user2'));
		$user2->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue('foouser2'));
		$user3 = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$user3->expects($this->any())
			->method('getUID')
			->will($this->returnValue('user3'));
		$user3->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue('foouser3'));
		$group1 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group1Map = array(
			array('foo', 5, null, array($user1, $user2, $user3)),
		);
		$group1->expects($this->once())
			->method('searchDisplayName')
			->will($this->returnValueMap($group1Map));
		$group2 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group2Map = array(
			array('foo', 5, null, array($user1, $user2)),
		);
		$group2->expects($this->once())
			->method('searchDisplayName')
			->will($this->returnValueMap($group2Map));
		$this->groupManager->expects($this->once())
			->method('getUserGroups')
			->with($this->equalTo($shareOwnerUser))
			->will($this->returnValue(array($group1, $group2)));
		$shareWiths = $this->instance->searchForPotentialShareWiths('user2', 'foo', 3, 1);
		$this->assertCount(1, $shareWiths);
		$this->assertContains(array(
			'shareWith' => 'user3',
			'shareWithDisplayName' => 'foouser3'), $shareWiths);

		\OC_Appconfig::setValue('core', 'shareapi_share_policy', $sharingPolicy);
	}
}