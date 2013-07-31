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

class TestGroup extends \OC\Share\ShareType\Group {

	public function getId() {
		return 'testgroup';
	}

}

class Group extends ShareType {

	private $itemTargetMachine;
	private $groupManager;
	private $userManager;
	private $mtgap;
	private $mtgapDisplay;
	private $karlitschek;
	private $karlitschekDisplay;
	private $icewind;
	private $icewindDisplay;
	private $group1;
	private $group1Display;
	private $group2;
	private $group2Display;

	protected function setUp() {
		$this->mtgap = 'MTGap';
		$this->mtgapDisplay = 'Michael Gapczynski';
		$this->karlitschek = 'karlitschek';
		$this->karlitschekDisplay = 'Frank Karlitschek';
		$this->icewind = 'Icewind';
		$this->icewindDisplay = 'Robin Appelman';
		$this->group1 = 'group1';
		$this->group2 = 'group2';
		$this->group1Display = 'group1 (group)';
		$this->group2Display = 'group2 (group)';
		$this->itemTargetMachine = $this->getMockBuilder('\OC\Share\ItemTargetMachine')
			->disableOriginalConstructor()
			->getMock();
		$this->groupManager = $this->getMockBuilder('\OC\Group\Manager')
			->disableOriginalConstructor()
			->getMock();
		$this->userManager = $this->getMockBuilder('\OC\User\Manager')
			->disableOriginalConstructor()
			->getMock();
		$this->instance = new TestGroup('test', new ShareFactory(), $this->itemTargetMachine,
			$this->groupManager, $this->userManager
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
			->method('getUID')
			->will($this->returnValue($this->mtgap));
		$mtgapUser->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue($this->mtgapDisplay));
		$karlitschekUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$karlitschekUser->expects($this->any())
			->method('getUID')
			->will($this->returnValue($this->karlitschek));
		$karlitschekUser->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue($this->karlitschekDisplay));
		$icewindUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$icewindUser->expects($this->any())
			->method('getUID')
			->will($this->returnValue($this->icewind));
		$icewindUser->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue($this->icewindDisplay));
		$userMap = array(
			array($this->mtgap, $mtgapUser),
			array($this->karlitschek, $karlitschekUser),
			array($this->icewind, $icewindUser),
		);
		$this->userManager->expects($this->atLeastOnce())
			->method('get')
			->will($this->returnValueMap($userMap));
		$group1Group = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group1Group->expects($this->any())
			->method('getGID')
			->will($this->returnValue($this->group1Display));
		$group1Group->expects($this->any())
			->method('getUsers')
			->will($this->returnValue(array($mtgapUser, $karlitschekUser)));
		$group2Group = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group2Group->expects($this->any())
			->method('getGID')
			->will($this->returnValue($this->group2Display));
		$group2Group->expects($this->any())
			->method('getUsers')
			->will($this->returnValue(array($mtgapUser, $karlitschekUser, $icewindUser)));
		$groupMap = array(
			array($this->group1, $group1Group),
			array($this->group2, $group2Group),
		);
		$this->groupManager->expects($this->any())
			->method('get')
			->will($this->returnValueMap($groupMap));
		switch ($version) {
			case 1:
				$share->setShareOwner($this->mtgap);
				$share->setItemOwner($this->mtgap);
				$share->setShareWith($this->group1);
				$this->itemTargetMachine->expects($this->at(1))
					->method('getItemTarget')
					->with($this->equalTo($share), $this->equalTo($karlitschekUser))
					->will($this->returnValue('Frank\'s Target'));
				break;
			case 2:
				$share->setShareOwner($this->mtgap);
				$share->setItemOwner($this->mtgap);
				$share->setShareWith($this->group2);
				$this->itemTargetMachine->expects($this->at(1))
					->method('getItemTarget')
					->with($this->equalTo($share), $this->equalTo($karlitschekUser))
					->will($this->returnValue('Frank\'s Target'));
				$this->itemTargetMachine->expects($this->at(2))
					->method('getItemTarget')
					->with($this->equalTo($share), $this->equalTo($icewindUser))
					->will($this->returnValue('Robin\'s Target'));
				break;
			case 3:
				$share->setShareOwner($this->icewind);
				$share->setItemOwner($this->icewind);
				$share->setShareWith($this->group1);
				$this->itemTargetMachine->expects($this->at(1))
					->method('getItemTarget')
					->with($this->equalTo($share), $this->equalTo($mtgapUser))
					->will($this->returnValue('Michael\'s Target'));
				$this->itemTargetMachine->expects($this->at(2))
					->method('getItemTarget')
					->with($this->equalTo($share), $this->equalTo($karlitschekUser))
					->will($this->returnValue('Frank\'s Target'));
				break;
			case 4:
				$share->setShareOwner($this->karlitschek);
				$share->setItemOwner($this->karlitschek);
				$share->setShareWith($this->group2);
				$this->itemTargetMachine->expects($this->at(1))
					->method('getItemTarget')
					->with($this->equalTo($share), $this->equalTo($mtgapUser))
					->will($this->returnValue('Michael\'s Target'));
				$this->itemTargetMachine->expects($this->at(2))
					->method('getItemTarget')
					->with($this->equalTo($share), $this->equalTo($icewindUser))
					->will($this->returnValue('Robin\'s Target'));
				break;
		}
		$this->itemTargetMachine->expects($this->at(0))
			->method('getItemTarget')
			->with($this->equalTo($share), $this->equalTo(null))
			->will($this->returnValue('Group Target'));
		return $share;
	}

	protected function getSharedTestShare($version) {
		$share = new Share();
		$share->setShareTypeId($this->instance->getId());
		$share->setItemType('test');
		$share->setItemSource('23');
		$share->setPermissions(31);
		$share->setShareTime(1370797580);
		switch ($version) {
			case 1:
				$share->setShareOwner($this->mtgap);
				$share->setItemOwner($this->mtgap);
				$share->setShareOwnerDisplayName($this->mtgapDisplay);
				$share->setShareWith($this->group1);
				$share->setShareWithDisplayName($this->group1Display);
				$share->setItemTarget(array('Group Target', 'users' => array(
						$this->karlitschek => 'Frank\'s Target'
					)
				));
				break;
			case 2:
				$share->setShareOwner($this->mtgap);
				$share->setItemOwner($this->mtgap);
				$share->setShareOwnerDisplayName($this->mtgapDisplay);
				$share->setShareWith($this->group2);
				$share->setShareWithDisplayName($this->group2Display);
				$share->setItemTarget(array('Group Target', 'users' => array(
						$this->karlitschek => 'Frank\'s Target',
						$this->icewind => 'Robin\'s Target',
					)
				));
				break;
			case 3:
				$share->setShareOwner($this->icewind);
				$share->setItemOwner($this->icewind);
				$share->setShareOwnerDisplayName($this->icewindDisplay);
				$share->setShareWith($this->group1);
				$share->setShareWithDisplayName($this->group1Display);
				$share->setItemTarget(array('Group Target', 'users' => array(
						$this->mtgap => 'Michael\'s Target',
						$this->karlitschek => 'Frank\'s Target',
					)
				));
				break;
			case 4:
				$share->setShareOwner($this->karlitschek);
				$share->setItemOwner($this->karlitschek);
				$share->setShareOwnerDisplayName($this->karlitschekDisplay);
				$share->setShareWith($this->group2);
				$share->setShareWithDisplayName($this->group2Display);
				$share->setItemTarget(array('Group Target', 'users' => array(
						$this->mtgap => 'Michael\'s Target',
						$this->icewind => 'Robin\'s Target',
					)
				));
				break;
		}	
		return $share;
	}

	public function testIsValidShare() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		\OC_Appconfig::setValue('core', 'shareapi_share_policy', 'global');

		$jancborchardt = 'jancborchardt';
		$designers = 'designers';
		$share = new Share();
		$share->setShareOwner($jancborchardt);
		$share->setShareWith($designers);
		$map = array(
			array($jancborchardt, true),
		);
		$this->userManager->expects($this->once())
			->method('userExists')
			->will($this->returnValueMap($map));
		$this->groupManager->expects($this->once())
			->method('groupExists')
			->with($this->equalTo($designers))
			->will($this->returnValue(true));
		$this->assertTrue($this->instance->isValidShare($share));

		\OC_Appconfig::setValue('core', 'shareapi_share_policy', $sharingPolicy);
	}
	
	public function testIsValidShareWithShareOwnerDoesNotExist() {
		$bar = 'bar';
		$designers = 'designers';
		$share = new Share();
		$share->setShareOwner($bar);
		$share->setShareWith($designers);
		$map = array(
			array($bar, false),
		);
		$this->userManager->expects($this->once())
			->method('userExists')
			->will($this->returnValueMap($map));
		$this->groupManager->expects($this->any())
			->method('groupExists')
			->with($this->equalTo($designers))
			->will($this->returnValue(true));
		$this->setExpectedException('\OC\Share\Exception\InvalidShareException',
			'The share owner does not exist'
		);
		$this->instance->isValidShare($share);
	}

	public function testIsValidShareWithShareWithDoesNotExist() {
		$jakobsack = 'jakobsack';
		$share = new Share();
		$share->setShareOwner($jakobsack);
		$share->setShareWith('foo');
		$map = array(
			array($jakobsack, true),
		);
		$this->userManager->expects($this->once())
			->method('userExists')
			->will($this->returnValueMap($map));
		$this->groupManager->expects($this->once())
			->method('groupExists')
			->with($this->equalTo('foo'))
			->will($this->returnValue(false));
		$this->setExpectedException('\OC\Share\Exception\InvalidShareException',
			'The group shared with does not exist'
		);
		$this->instance->isValidShare($share);
	}

	public function testIsValidShareWithGroupsOnlyPolicy() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		\OC_Appconfig::setValue('core', 'shareapi_share_policy', 'groups_only');

		$jancborchardt = 'jancborchardt';
		$designers = 'designers';
		$share = new Share();
		$share->setShareOwner($jancborchardt);
		$share->setShareWith($designers);
		$map = array(
			array($jancborchardt, true),
		);
		$this->userManager->expects($this->once())
			->method('userExists')
			->will($this->returnValueMap($map));
		$this->groupManager->expects($this->once())
			->method('groupExists')
			->with($this->equalTo($designers))
			->will($this->returnValue(true));
		$group = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$this->groupManager->expects($this->once())
			->method('get')
			->with($this->equalTo($designers))
			->will($this->returnValue($group));
		$shareOwnerUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$this->userManager->expects($this->once())
			->method('get')
			->with($jancborchardt)
			->will($this->returnValue($shareOwnerUser));
		$group->expects($this->once())
			->method('inGroup')
			->with($this->equalTo($shareOwnerUser))
			->will($this->returnValue(true));
		$this->assertTrue($this->instance->isValidShare($share));

		\OC_Appconfig::setValue('core', 'shareapi_share_policy', $sharingPolicy);
	}

	public function testIsValidShareWithShareOwnerNotInGroupAndGroupsOnlyPolicy() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		\OC_Appconfig::setValue('core', 'shareapi_share_policy', 'groups_only');

		$jancborchardt = 'jancborchardt';
		$designers = 'designers';
		$share = new Share();
		$share->setShareOwner($jancborchardt);
		$share->setShareWith($designers);
		$map = array(
			array($jancborchardt, true),
		);
		$this->userManager->expects($this->once())
			->method('userExists')
			->will($this->returnValueMap($map));
		$this->groupManager->expects($this->once())
			->method('groupExists')
			->with($this->equalTo($designers))
			->will($this->returnValue(true));
		$group = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$this->groupManager->expects($this->once())
			->method('get')
			->with($this->equalTo($designers))
			->will($this->returnValue($group));
		$shareOwnerUser = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$this->userManager->expects($this->once())
			->method('get')
			->with($jancborchardt)
			->will($this->returnValue($shareOwnerUser));
		$group->expects($this->once())
			->method('inGroup')
			->with($this->equalTo($shareOwnerUser))
			->will($this->returnValue(false));
		$this->setExpectedException('\OC\Share\Exception\InvalidShareException',
			'The share owner is not in the group shared with as required by '.
			'the groups only sharing policy set by the admin'
		);
		$this->instance->isValidShare($share);

		\OC_Appconfig::setValue('core', 'shareapi_share_policy', $sharingPolicy);
	}

	public function testSetItemTarget() {
		$share = $this->getTestShare(3);
		$share = $this->instance->share($share);
		$itemTargets = array(
			'Group Item Target',
			'users' => array(
				'tpn' => 'tpn\'s Target',
				'bartv' => 'bartv\'s Target',
			),
		);
		$share->setItemTarget($itemTargets);
		$this->instance->setItemTarget($share);
		$share->resetUpdatedProperties();
		$this->assertEquals($share, $this->getShareById($share->getId()));

		$itemTargets = array(
			'New Group Item Target',
			'users' => array(
				'tpn' => 'tpn\'s New Target',
			),
		);
		$share->setItemTarget($itemTargets);
		$this->instance->setItemTarget($share);
		$share->resetUpdatedProperties();
		$this->assertEquals($share, $this->getShareById($share->getId()));

		$share->setItemTarget('Group Item Target');
		$this->instance->setItemTarget($share);
		$share->resetUpdatedProperties();
		$this->assertEquals($share, $this->getShareById($share->getId()));
	}

	public function testGetSharesWithShareWithFilter() {
		$this->setupTestShares();
		$group1 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group1->expects($this->any())
			->method('getGID')
			->will($this->returnValue($this->group1));
		$this->groupManager->expects($this->once())
			->method('getUserGroups')
			->will($this->returnValue(array($group1)));
		$filter = array(
			'shareWith' => $this->icewind,
			'isShareWithUser' => true,
		);
		$shares = $this->instance->getShares($filter, null, null);
		$this->assertCount(1, $shares);
		$this->assertContains($this->share1, $shares, '', false, false);
	}

	public function testGetSharesWithShareWithFilterAndNoGroups() {
		$this->setupTestShares();
		$this->groupManager->expects($this->once())
			->method('getUserGroups')
			->will($this->returnValue(array()));
		$filter = array(
			'shareWith' => $this->mtgap,
			'isShareWithUser' => true,
		);
		$this->assertEmpty($this->instance->getShares($filter, null, null));
	}

	public function testSearchForPotentialShareWiths() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		\OC_Appconfig::setValue('core', 'shareapi_share_policy', 'global');

		$group1 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group1->expects($this->any())
			->method('getGID')
			->will($this->returnValue('foogroup1'));
		$group2 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group2->expects($this->any())
			->method('getGID')
			->will($this->returnValue('foogroup2'));
		$group3 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group3->expects($this->any())
			->method('getGID')
			->will($this->returnValue('foogroup3'));
		$map = array(
			array('foo', null, null, array($group1, $group2, $group3)),
		);
		$this->groupManager->expects($this->once())
			->method('search')
			->will($this->returnValueMap($map));
		$shareWiths = $this->instance->searchForPotentialShareWiths('user2', 'foo', null, null);
		$this->assertCount(3, $shareWiths);
		$this->assertContains(array(
			'shareWith' => 'foogroup1',
			'shareWithDisplayName' => 'foogroup1 (group)'), $shareWiths);
		$this->assertContains(array(
			'shareWith' => 'foogroup2',
			'shareWithDisplayName' => 'foogroup2 (group)'), $shareWiths);
		$this->assertContains(array(
			'shareWith' => 'foogroup3',
			'shareWithDisplayName' => 'foogroup3 (group)'), $shareWiths);

		\OC_Appconfig::setValue('core', 'shareapi_share_policy', $sharingPolicy);
	}

	public function testSearchForPotentialShareWithsWithLimitOffset() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		\OC_Appconfig::setValue('core', 'shareapi_share_policy', 'global');

		$group2 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group2->expects($this->any())
			->method('getGID')
			->will($this->returnValue('foogroup2'));
		$group3 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group3->expects($this->any())
			->method('getGID')
			->will($this->returnValue('foogroup3'));
		$map = array(
			array('foo', 3, 1, array($group2, $group3)),
		);
		$this->groupManager->expects($this->once())
			->method('search')
			->will($this->returnValueMap($map));
		$shareWiths = $this->instance->searchForPotentialShareWiths('user2', 'foo', 3, 1);
		$this->assertCount(2, $shareWiths);
		$this->assertContains(array(
			'shareWith' => 'foogroup2',
			'shareWithDisplayName' => 'foogroup2 (group)'), $shareWiths);
		$this->assertContains(array(
			'shareWith' => 'foogroup3',
			'shareWithDisplayName' => 'foogroup3 (group)'), $shareWiths);

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
		$group1 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group1->expects($this->any())
			->method('getGID')
			->will($this->returnValue('foogroup1'));
		$group2 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group2->expects($this->any())
			->method('getGID')
			->will($this->returnValue('foogroup2'));
		$group3 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group3->expects($this->any())
			->method('getGID')
			->will($this->returnValue('bargroup3'));
		$group4 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group4->expects($this->any())
			->method('getGID')
			->will($this->returnValue('foogroup3'));
		$this->groupManager->expects($this->once())
			->method('getUserGroups')
			->with($this->equalTo($shareOwnerUser))
			->will($this->returnValue(array($group1, $group2, $group3, $group4)));
		$shareWiths = $this->instance->searchForPotentialShareWiths('user2', 'foo', null, null);
		$this->assertCount(3, $shareWiths);
		$this->assertContains(array(
			'shareWith' => 'foogroup1',
			'shareWithDisplayName' => 'foogroup1 (group)'), $shareWiths);
		$this->assertContains(array(
			'shareWith' => 'foogroup2',
			'shareWithDisplayName' => 'foogroup2 (group)'), $shareWiths);
		$this->assertContains(array(
			'shareWith' => 'foogroup3',
			'shareWithDisplayName' => 'foogroup3 (group)'), $shareWiths);

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
		$group1 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group1->expects($this->any())
			->method('getGID')
			->will($this->returnValue('foogroup1'));
		$group2 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group2->expects($this->any())
			->method('getGID')
			->will($this->returnValue('foogroup2'));
		$group3 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group3->expects($this->any())
			->method('getGID')
			->will($this->returnValue('bargroup3'));
		$group4 = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$group4->expects($this->any())
			->method('getGID')
			->will($this->returnValue('foogroup3'));
		$this->groupManager->expects($this->once())
			->method('getUserGroups')
			->with($this->equalTo($shareOwnerUser))
			->will($this->returnValue(array($group1, $group2, $group3, $group4)));
		$shareWiths = $this->instance->searchForPotentialShareWiths('user2', 'foo', 3, 1);
		$this->assertCount(2, $shareWiths);
		$this->assertContains(array(
			'shareWith' => 'foogroup2',
			'shareWithDisplayName' => 'foogroup2 (group)'), $shareWiths);
		$this->assertContains(array(
			'shareWith' => 'foogroup3',
			'shareWithDisplayName' => 'foogroup3 (group)'), $shareWiths);

		\OC_Appconfig::setValue('core', 'shareapi_share_policy', $sharingPolicy);
	}

	public function testGetItemTargetMachine() {
		$this->assertEquals($this->itemTargetMachine, $this->instance->getItemTargetMachine());
	}

}