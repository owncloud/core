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

class TestLink extends \OC\Share\ShareType\Link {

	public function getId() {
		return 'testlink';
	}

}

class Link extends ShareType {

	private $userManager;
	private $hasher;

	protected function setUp() {
		$this->userManager = $this->getMockBuilder('\OC\User\Manager')
			->disableOriginalConstructor()
			->getMock();
		$this->hasher = $this->getMockBuilder('\PasswordHash')
			->disableOriginalConstructor()
			->getMock();
		$this->instance = new TestLink('test', new ShareFactory(), $this->userManager,
			$this->hasher
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
		$share->setShareWith(null);
		$share->setItemType('test');
		$share->setItemOwner('MTGap');
		$share->setItemSource('23');
		$share->setItemTarget('secrets');
		$share->setPermissions(31);
		$share->setShareTime(1370797580);
		return $share;
	}

	protected function getSharedTestShare() {
		// TODO Fix token
		$share = new Share();
		$share->setShareTypeId($this->instance->getId());
		$share->setShareOwner('MTGap');
		$share->setShareOwnerDisplayName('Michael Gapczynski');
		$share->setShareWith(null);
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
		$this->share1 = $this->instance->share($this->share1);

		$this->share2 = $this->getTestShare();
		$this->share2->setShareOwner($this->user1);
		$this->share2 = $this->instance->share($this->share2);

		$this->share3 = $this->getTestShare();
		$this->share3->setShareOwner($this->user3);
		$this->share3 = $this->instance->share($this->share3);

		$this->share4 = $this->getTestShare();
		$this->share4->setShareOwner($this->user2);
		$this->share4->addParentId($this->share3->getId());
		$this->share4 = $this->instance->share($this->share4);
	}

	public function testIsValidShare() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_allow_links', 'yes');
		\OC_Appconfig::setValue('core', 'shareapi_allow_links', 'yes');

		$zimba12 = 'zimba12';
		$share = new Share();
		$share->setShareOwner($zimba12);
		$map = array(
			array($zimba12, true),
		);
		$this->userManager->expects($this->once())
			->method('userExists')
			->will($this->returnValue(true));
		$this->assertTrue($this->instance->isValidShare($share));

		\OC_Appconfig::setValue('core', 'shareapi_allow_links', $sharingPolicy);
	}

	public function testIsValidShareWithShareOwnerDoesNotExist() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_allow_links', 'yes');
		\OC_Appconfig::setValue('core', 'shareapi_allow_links', 'yes');

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

		\OC_Appconfig::setValue('core', 'shareapi_allow_links', $sharingPolicy);
	}

	public function testIsValidShareWithLinkSharingDisabled() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_allow_links', 'yes');
		\OC_Appconfig::setValue('core', 'shareapi_allow_links', 'no');

		$zimba12 = 'zimba12';
		$share = new Share();
		$share->setShareOwner($zimba12);
		$map = array(
			array($zimba12, true),
		);
		$this->userManager->expects($this->once())
			->method('userExists')
			->will($this->returnValue(true));
		$this->setExpectedException('\OC\Share\Exception\InvalidShareException',
			'The admin has disabled sharing via links'
		);
		$this->instance->isValidShare($share);

		\OC_Appconfig::setValue('core', 'shareapi_allow_links', $sharingPolicy);
	}

	public function testShareWithPassword() {
		$share = $this->getTestShare();
		$share->setPassword('password');
		$this->hasher->expects($this->once())
			->method('HashPassword')
			->will($this->returnValue('password'));
		$result = $this->instance->share($share);
		$this->assertNotNull($result->getId());
		$this->assertEquals(array(), $result->getUpdatedProperties());
		$share->setId($result->getId());
		$share->resetUpdatedProperties();
		$this->assertEquals($share, $this->getShareById($share->getId()));
	}

	public function testSetPassword() {
		$share = $this->getTestShare();
		$share = $this->instance->share($share);
		$this->hasher->expects($this->once())
			->method('HashPassword')
			->will($this->returnValue('1234'));
		$share->setPassword('1234');
		$this->instance->setPassword($share);
		$share->resetUpdatedProperties();
		$this->assertEquals($share, $this->getShareById($share->getId()));
	}

	public function testGetSharesWithFilter() {
		$this->setupTestShares();
		$filter = array(
			'token' => $this->share2->getToken(),
		);
		$shares = $this->instance->getShares($filter, null, null);
		$this->assertCount(1, $shares);
		$this->assertContains($this->share2, $shares, '', false, false);

		$filter = array(
			'shareOwner' => $this->user1,
		);
		$shares = $this->instance->getShares($filter, null, null);
		$this->assertCount(2, $shares);
		$this->assertContains($this->share1, $shares, '', false, false);
		$this->assertContains($this->share2, $shares, '', false, false);

		$filter = array(
			'shareWith' => 'foo',
		);
		$this->assertEmpty($this->instance->getShares($filter, null, null));
	}

	public function testSearchForPotentialShareWiths() {
		$this->assertEmpty($this->instance->searchForPotentialShareWiths('user2', 'foo', 3, 1));
	}

}