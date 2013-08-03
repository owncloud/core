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

	private $itemTargetMachine;
	private $userManager;
	private $tokenMachine;
	private $counter;
	private $hasher;
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
		$this->tokenMachine = $this->getMockBuilder('\OC\Share\ShareType\TokenMachine')
			->disableOriginalConstructor()
			->getMock();
		$this->counter = 0;
		$this->hasher = $this->getMockBuilder('\PasswordHash')
			->disableOriginalConstructor()
			->getMock();
		$this->instance = new TestLink('test', new ShareFactory(), $this->itemTargetMachine,
			$this->userManager, $this->tokenMachine, $this->hasher
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
		$counter = $this->counter;
		switch ($version) {
			case 1:
				$share->setShareOwner($this->mtgap);
				$share->setItemOwner($this->mtgap);
				$this->tokenMachine->expects($this->at($counter))
					->method('getToken')
					->will($this->returnValue('2kla32ljadsfoj23kjab'));
				break;
			case 2:
				$share->setShareOwner($this->mtgap);
				$share->setItemOwner($this->mtgap);
				$this->tokenMachine->expects($this->at($counter))
					->method('getToken')
					->will($this->returnValue('auoiu23k2jiapi2kjads'));
				break;
			case 3:
				$share->setShareOwner($this->icewind);
				$share->setItemOwner($this->icewind);
				$this->tokenMachine->expects($this->at($counter))
					->method('getToken')
					->will($this->returnValue('82093jkadp2kjasdf212'));
				break;
			case 4:
				$share->setShareOwner($this->karlitschek);
				$share->setItemOwner($this->karlitschek);
				$this->tokenMachine->expects($this->at($counter))
					->method('getToken')
					->will($this->returnValue('po2jad2ijajk32i0sads'));
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
				$share->setToken('2kla32ljadsfoj23kjab');
				break;
			case 2:
				$share->setShareOwner($this->mtgap);
				$share->setItemOwner($this->mtgap);
				$share->setShareOwnerDisplayName($this->mtgapDisplay);
				$share->setToken('auoiu23k2jiapi2kjads');
				break;
			case 3:
				$share->setShareOwner($this->icewind);
				$share->setItemOwner($this->icewind);
				$share->setShareOwnerDisplayName($this->icewindDisplay);
				$share->setToken('82093jkadp2kjasdf212');
				break;
			case 4:
				$share->setShareOwner($this->karlitschek);
				$share->setItemOwner($this->karlitschek);
				$share->setShareOwnerDisplayName($this->karlitschekDisplay);
				$share->setToken('po2jad2ijajk32i0sads');
				break;
		}	
		return $share;
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
		$share = $this->getTestShare(1);
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
		$share = $this->getTestShare(2);
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
			'shareOwner' => $this->mtgap,
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