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

	private $userManager;
	private $user1;
	private $user2;
	private $user3;

	protected function setUp() {
		$this->userManager = $this->getMockBuilder('\OC\User\Manager')
			->disableOriginalConstructor()
			->getMock();
		$this->instance = new TestUser('test', new ShareFactory(), $this->userManager);
	}

	protected function getTestShare() {
		$share = new Share();
		$share->setShareTypeId($this->instance->getId());
		$share->setShareOwner('MTGap');
		$share->setShareWith('karlitschek');
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
		$this->share1 = $this->getTestShare();
		$this->share1->setShareOwner($this->user1);
		$this->share1->setShareWith($this->user2);
		$this->share1 = $this->instance->share($this->share1);

		$this->share2 = $this->getTestShare();
		$this->share2->setShareOwner($this->user1);
		$this->share2->setShareWith($this->user3);
		$this->share2 = $this->instance->share($this->share2);

		$this->share3 = $this->getTestShare();
		$this->share3->setShareOwner($this->user3);
		$this->share3->setShareWith($this->user2);
		$this->share3 = $this->instance->share($this->share3);

		$this->share4 = $this->getTestShare();
		$this->share4->setShareOwner($this->user2);
		$this->share4->setShareWith($this->user1);
		$this->share4->addParentId($this->share3->getId());
		$this->share4 = $this->instance->share($this->share4);
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

	public function testIsValidShareWithGroupOnlyPolicy() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		\OC_Appconfig::setValue('core', 'shareapi_share_policy', 'groups_only');

		$jancborchardt = 'jancborchardt';
		$raydiation = 'Raydiation';
		$devs = 'devs';
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
		\OC_Group::clearBackends();
		\OC_Group::useBackend(new \OC_Group_Dummy);
		\OC_Group::createGroup($devs);
		\OC_Group::addToGroup($jancborchardt, $devs);
		\OC_Group::addToGroup($raydiation, $devs);
		$this->assertTrue($this->instance->isValidShare($share));

		\OC_Appconfig::setValue('core', 'shareapi_share_policy', $sharingPolicy);
	}

	public function testIsValidShareWithShareOwnerNotInShareWithGroupsAndGroupsOnlyPolicy() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		\OC_Appconfig::setValue('core', 'shareapi_share_policy', 'groups_only');

		$jancborchardt = 'jancborchardt';
		$raydiation = 'Raydiation';
		$devs = 'devs';
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
		\OC_Group::clearBackends();
		\OC_Group::useBackend(new \OC_Group_Dummy);
		\OC_Group::createGroup($devs);
		\OC_Group::addToGroup($raydiation, $devs);
		$this->setExpectedException('\OC\Share\Exception\InvalidShareException',
			'The share owner is not in any groups of the user shared with as required by the'
			.' groups only sharing policy set by the admin'
		);
		$this->instance->isValidShare($share);

		\OC_Appconfig::setValue('core', 'shareapi_share_policy', $sharingPolicy);
	}

	public function testGetSharesWithFilter() {
		$this->setupTestShares();
		$filter = array(
			'shareWith' => $this->user2,
		);
		$shares = $this->instance->getShares($filter, null, null);
		$this->assertCount(2, $shares);
		$this->assertContains($this->share1, $shares, '', false, false);
		$this->assertContains($this->share3, $shares, '', false, false);
	}

	public function testSearchForPotentialShareWiths() {
		$map = array(
			array('foo', null, null, array('foouser1', 'foouser2', 'foouser3')),
		);
		$this->userManager->expects($this->once())
			->method('searchDisplayName')
			->will($this->returnValueMap($map));
		$shareWiths = $this->instance->searchForPotentialShareWiths('foo', null, null);
		$this->assertCount(3, $shareWiths);
		$this->assertContains('foouser1', $shareWiths);
		$this->assertContains('foouser2', $shareWiths);
		$this->assertContains('foouser3', $shareWiths);
	}

	public function testSearchForPotentialShareWithsWithLimitOffset() {
		$map = array(
			array('foo', 3, 1, array('foouser2', 'foouser3')),
		);
		$this->userManager->expects($this->once())
			->method('searchDisplayName')
			->will($this->returnValueMap($map));
		$shareWiths = $this->instance->searchForPotentialShareWiths('foo', 3, 1);
		$this->assertCount(2, $shareWiths);
		$this->assertContains('foouser2', $shareWiths);
		$this->assertContains('foouser3', $shareWiths);
	}

}