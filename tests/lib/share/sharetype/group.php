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

	private $groupManager;
	private $userManager;
	private $user1;
	private $user2;
	private $user3;
	private $group1;
	private $group2;

	protected function setUp() {
		$this->groupManager = $this->getMockBuilder('\OC\Group\Manager')
			->disableOriginalConstructor()
			->getMock();
		$this->userManager = $this->getMockBuilder('\OC\User\Manager')
			->disableOriginalConstructor()
			->getMock();
		$this->instance = new TestGroup('test', new ShareFactory(), $this->groupManager,
			$this->userManager
		);
	}

	protected function getTestShare() {
		$mtgap = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$mtgap->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue('Michael Gapczynski'));
		$karlitschek = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$karlitschek->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue('Frank Karlitschek'));
		$icewind = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$icewind->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue('Robin Appelman'));
		$map = array(
			array('MTGap', $mtgap),
			array('karlitschek', $karlitschek),
			array('Icewind', $icewind),
		);
		$this->userManager->expects($this->atLeastOnce())
			->method('get')
			->will($this->returnValueMap($map));
		$share = new Share();
		$share->setShareTypeId($this->instance->getId());
		$share->setShareOwner('MTGap');
		$share->setShareWith('friends');
		$share->setItemType('test');
		$share->setItemOwner('MTGap');
		$share->setItemSource('23');
		$share->setItemTarget('secrets');
		$share->setPermissions(31);
		$share->setShareTime(1370797580);
		return $share;
	}

	protected function getSharedTestShare() {
		$share = new Share();
		$share->setShareTypeId($this->instance->getId());
		$share->setShareOwner('MTGap');
		$share->setShareOwnerDisplayName('Michael Gapczynski');
		$share->setShareWith('friends');
		$share->setShareWithDisplayName('friends (group)');
		$share->setItemType('test');
		$share->setItemOwner('MTGap');
		$share->setItemSource('23');
		$share->setItemTarget('secrets');
		$share->setPermissions(31);
		$share->setShareTime(1370797580);
		return $share;
	}

	protected function setupTestShares() {
		$this->user1 = 'MTGap';
		$this->user2 = 'karlitschek';
		$this->user3 = 'Icewind';
		$this->group1 = 'devs';
		$this->group2 = 'friends';
		
		$this->share1 = $this->getTestShare();
		$this->share1->setShareOwner($this->user1);
		$this->share1->setShareWith($this->group1);
		$this->share1 = $this->instance->share($this->share1);

		$this->share2 = $this->getTestShare();
		$this->share2->setShareOwner($this->user1);
		$this->share2->setShareWith($this->group2);
		$this->share2 = $this->instance->share($this->share2);

		$this->share3 = $this->getTestShare();
		$this->share3->setShareOwner($this->user3);
		$this->share3->setShareWith($this->group1);
		$this->share3 = $this->instance->share($this->share3);

		$this->share4 = $this->getTestShare();
		$this->share4->setShareOwner($this->user2);
		$this->share4->setShareWith($this->group2);
		$this->share4->addParentId($this->share3->getId());
		$this->share4 = $this->instance->share($this->share4);
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

	public function testShareWithItemTargets() {
		$itemTargets = array(
			'Group Item Target',
			'users' => array(
				'tpn' => 'tpn\'s Target',
				'bartv' => 'bartv\'s Target',
			),
		);
		$share = $this->getTestShare();
		$share->setItemTarget($itemTargets);
		$result = $this->instance->share($share);
		$this->assertNotNull($result->getId());
		$this->assertEquals(array(), $result->getUpdatedProperties());
		$share->setId($result->getId());
		$share->resetUpdatedProperties();
		$this->assertEquals($share, $this->getShareById($share->getId()));
	}

	public function testSetItemTarget() {
		$share = $this->getTestShare();
		$share->setItemTarget('Group Item Target');
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
			'shareWith' => $this->user3,
		);
		$shares = $this->instance->getShares($filter, null, null);
		$this->assertCount(1, $shares);
		$this->assertContains($this->share1, $shares, '', false, false);
	}

	public function testGetSharesWithShareWithFilterAndNoGroups() {
		$this->setupTestShares();-
		$this->groupManager->expects($this->once())
			->method('getUserGroups')
			->will($this->returnValue(array()));
		$filter = array(
			'shareWith' => $this->user1,
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

}