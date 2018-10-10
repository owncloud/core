<?php
/**
* ownCloud
*
* @author Michael Gapczynski
* @copyright Copyright (c) 2012 Michael Gapczynski mtgap@owncloud.com
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

use OCP\IConfig;
use Test\Traits\UserTrait;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class Test_Share
 *
 * @group DB
 */
class ShareTest extends \Test\TestCase {
	use UserTrait;

	protected $itemType;
	protected $userBackend;
	protected $user1;
	protected $user2;
	protected $user3;
	protected $user4;
	protected $user5;
	protected $user6;
	protected $groupAndUser;
	protected $groupBackend;
	protected $group1;
	protected $group2;
	protected $resharing;
	protected $dateInFuture;
	protected $dateInPast;

	protected function setUp() {
		parent::setUp();

		$this->user1 = $this->getUniqueID('user1_');
		$this->user2 = $this->getUniqueID('user2_');
		$this->user3 = $this->getUniqueID('user3_');
		$this->user4 = $this->getUniqueID('user4_');
		$this->user5 = $this->getUniqueID('user5_');
		$this->user6 = $this->getUniqueID('user6_');
		$this->groupAndUser = $this->getUniqueID('groupAndUser_');
		$u1 = $this->createUser($this->user1, 'pass');
		$u2 = $this->createUser($this->user2, 'pass');
		$u3 = $this->createUser($this->user3, 'pass');
		$u4 = $this->createUser($this->user4, 'pass');
		$u5 = $this->createUser($this->user5, 'pass');
		$u6 = $this->createUser($this->user6, 'pass'); // no group
		$uug = $this->createUser($this->groupAndUser, 'pass');
		\OC_User::setUserId($this->user1);
		\OC::$server->getGroupManager()->clearBackends();
		\OC::$server->getGroupManager()->addBackend(new \Test\Util\Group\Dummy());
		$this->group1 = $this->getUniqueID('group1_');
		$this->group2 = $this->getUniqueID('group2_');
		$g1 = \OC::$server->getGroupManager()->createGroup($this->group1);
		$g2 = \OC::$server->getGroupManager()->createGroup($this->group2);
		$gAU = \OC::$server->getGroupManager()->createGroup($this->groupAndUser);
		$g1->addUser($u1);
		$g1->addUser($u2);
		$g1->addUser($u3);
		$g2->addUser($u2);
		$g2->addUser($u4);
		$gAU->addUser($u2);
		$gAU->addUser($u3);
		\OC_Hook::clear('OCP\\Share');
		\OC::registerShareHooks();
		$this->resharing = \OC::$server->getAppConfig()->getValue('core', 'shareapi_allow_resharing', 'yes');
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_allow_resharing', 'yes');

		$this->overwriteService('EventDispatcher', new EventDispatcher());

		// 20 Minutes in the past, 20 minutes in the future.
		$now = \time();
		$dateFormat = 'Y-m-d H:i:s';
		$this->dateInPast = \date($dateFormat, $now - 20 * 60);
		$this->dateInFuture = \date($dateFormat, $now + 20 * 60);
	}

	protected function tearDown() {
		$query = \OC_DB::prepare('DELETE FROM `*PREFIX*share` WHERE `item_type` = ?');
		$query->execute(['test']);
		\OC::$server->getAppConfig()->setValue('core', 'shareapi_allow_resharing', $this->resharing);

		$user = \OC::$server->getUserManager()->get($this->user1);
		if ($user !== null) {
			$user->delete();
		}
		$user = \OC::$server->getUserManager()->get($this->user2);
		if ($user !== null) {
			$user->delete();
		}
		$user = \OC::$server->getUserManager()->get($this->user3);
		if ($user !== null) {
			$user->delete();
		}
		$user = \OC::$server->getUserManager()->get($this->user4);
		if ($user !== null) {
			$user->delete();
		}
		$user = \OC::$server->getUserManager()->get($this->user5);
		if ($user !== null) {
			$user->delete();
		}
		$user = \OC::$server->getUserManager()->get($this->user6);
		if ($user !== null) {
			$user->delete();
		}
		$user = \OC::$server->getUserManager()->get($this->groupAndUser);
		if ($user !== null) {
			$user->delete();
		}

		$g = \OC::$server->getGroupManager()->get($this->group1);
		if ($g !== null) {
			$g->delete();
		}
		$g = \OC::$server->getGroupManager()->get($this->group2);
		if ($g !== null) {
			$g->delete();
		}
		$g = \OC::$server->getGroupManager()->get($this->groupAndUser);
		if ($g !== null) {
			$g->delete();
		}

		$this->logout();
		parent::tearDown();
	}

	/**
	 * @dataProvider checkPasswordProtectedShareDataProvider
	 * @param $expected
	 * @param $item
	 */
	public function testCheckPasswordProtectedShare($expected, $item) {
		\OC::$server->getSession()->set('public_link_authenticated', '100');
		$result = \OCP\Share::checkPasswordProtectedShare($item);
		$this->assertEquals($expected, $result);
	}

	public function checkPasswordProtectedShareDataProvider() {
		return [
			[true, []],
			[true, ['share_with' => null]],
			[true, ['share_with' => '']],
			[true, ['share_with' => '1234567890', 'share_type' => '1']],
			[true, ['share_with' => '1234567890', 'share_type' => 1]],
			[true, ['share_with' => '1234567890', 'share_type' => '3', 'id' => '100']],
			[true, ['share_with' => '1234567890', 'share_type' => 3, 'id' => '100']],
			[true, ['share_with' => '1234567890', 'share_type' => '3', 'id' => 100]],
			[true, ['share_with' => '1234567890', 'share_type' => 3, 'id' => 100]],
			[false, ['share_with' => '1234567890', 'share_type' => '3', 'id' => '101']],
			[false, ['share_with' => '1234567890', 'share_type' => 3, 'id' => '101']],
			[false, ['share_with' => '1234567890', 'share_type' => '3', 'id' => 101]],
			[false, ['share_with' => '1234567890', 'share_type' => 3, 'id' => 101]],
		];
	}

	/**
	 * @dataProvider urls
	 */
	public function testRemoveProtocolFromUrl($url, $expectedResult) {
		$share = new \OC\Share\Share();
		$result = self::invokePrivate($share, 'removeProtocolFromUrl', [$url]);
		$this->assertSame($expectedResult, $result);
	}

	public function urls() {
		return [
			['http://owncloud.org', 'owncloud.org'],
			['https://owncloud.org', 'owncloud.org'],
			['owncloud.org', 'owncloud.org'],
		];
	}
}

