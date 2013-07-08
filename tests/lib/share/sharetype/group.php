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

	private $userManager;
	private $user1;
	private $user2;
	private $user3;
	private $group1;
	private $group2;

	protected function setUp() {
		$this->userManager = $this->getMockBuilder('\OC\User\Manager')
			->disableOriginalConstructor()
			->getMock();
		$this->instance = new TestGroup('test', new ShareFactory(), $this->userManager);
	}

	protected function getTestShare() {
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

	protected function setupTestShares() {
		$this->user1 = 'MTGap';
		$this->user2 = 'karlitschek';
		$this->user3 = 'Icewind';
		$this->group1 = 'designers';
		$this->group2 = 'friends';
		\OC_Group::clearBackends();
		\OC_Group::useBackend(new \OC_Group_Dummy);
		\OC_Group::createGroup($this->group1);
		\OC_Group::createGroup($this->group2);
		\OC_Group::addToGroup($this->user1, $this->group1);
		\OC_Group::addToGroup($this->user1, $this->group2);
		\OC_Group::addToGroup($this->user2, $this->group1);
		\OC_Group::addToGroup($this->user2, $this->group2);
		\OC_Group::addToGroup($this->user3, $this->group1);
		
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
		\OC_Group::clearBackends();
		\OC_Group::useBackend(new \OC_Group_Dummy);
		\OC_Group::createGroup($designers);
		\OC_Group::addToGroup($jancborchardt, $designers);
		$this->assertTrue($this->instance->isValidShare($share));
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
		\OC_Group::clearBackends();
		\OC_Group::useBackend(new \OC_Group_Dummy);
		\OC_Group::createGroup($designers);
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
		\OC_Group::clearBackends();
		\OC_Group::useBackend(new \OC_Group_Dummy);
		$this->setExpectedException('\OC\Share\Exception\InvalidShareException',
			'The group shared with does not exist'
		);
		$this->instance->isValidShare($share);
	}

	public function testIsValidShareWithShareOwnerNotInGroup() {
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
		\OC_Group::clearBackends();
		\OC_Group::useBackend(new \OC_Group_Dummy);
		\OC_Group::createGroup($designers);
		$this->setExpectedException('\OC\Share\Exception\InvalidShareException',
			'The share owner is not in the group shared with as'
			.' required by the groups only sharing policy set by the admin'
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

	public function testGetSharesWithFilter() {
		$this->setupTestShares();
		$filter = array(
			'shareWith' => $this->user3,
		);
		$shares = $this->instance->getShares($filter, null, null);
		$this->assertCount(1, $shares);
		$this->assertContains($this->share1, $shares, '', false, false);
	}

	public function testSearchForPotentialShareWiths() {
		\OC_Group::clearBackends();
		\OC_Group::useBackend(new \OC_Group_Dummy);
		\OC_Group::createGroup('foogroup1');
		\OC_Group::createGroup('foogroup2');
		\OC_Group::createGroup('foogroup3');
		$shareWiths = $this->instance->searchForPotentialShareWiths('foo', null, null);
		$this->assertCount(3, $shareWiths);
		$this->assertContains('foogroup1', $shareWiths);
		$this->assertContains('foogroup2', $shareWiths);
		$this->assertContains('foogroup3', $shareWiths);
	}

	public function testSearchForPotentialShareWithsWithLimitOffset() {
		\OC_Group::clearBackends();
		\OC_Group::useBackend(new \OC_Group_Dummy);
		\OC_Group::createGroup('foogroup1');
		\OC_Group::createGroup('foogroup2');
		\OC_Group::createGroup('foogroup3');
		$shareWiths = $this->instance->searchForPotentialShareWiths('foo', 3, 1);
		$this->assertCount(2, $shareWiths);
		$this->assertContains('foogroup2', $shareWiths);
		$this->assertContains('foogroup3', $shareWiths);
	}

}