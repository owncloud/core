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
use OC\Share\Exception\InvalidShareException;
use OC\User\User;

class GroupWatcher extends \PHPUnit_Framework_TestCase {

	private $shareManager;
	private $shareBackend1;
	private $shareBackend2;
	private $user1;
	private $user2;
	private $group;
	
	protected function setUp() {
		$this->shareManager = $this->getMockBuilder('\OC\Share\ShareManager')
			->disableOriginalConstructor()
			->getMock();
		$this->shareBackend1 = $this->getMockBuilder('\OC\Share\ShareBackend')
			->disableOriginalConstructor()
			->setMethods(get_class_methods('\OC\Share\ShareBackend'))
			->getMockForAbstractClass();
		$this->shareBackend1->expects($this->any())
			->method('getItemType')
			->will($this->returnValue('test1'));
		$this->shareBackend2 = $this->getMockBuilder('\OC\Share\ShareBackend')
			->disableOriginalConstructor()
			->setMethods(get_class_methods('\OC\Share\ShareBackend'))
			->getMockForAbstractClass();
		$this->shareBackend2->expects($this->any())
			->method('getItemType')
			->will($this->returnValue('test2'));
		$this->shareManager->expects($this->any())
			->method('getShareBackends')
			->will($this->returnValue(array(
				'test1' => $this->shareBackend1,
				'test2' => $this->shareBackend2,
			)));
		$this->shareManager->expects($this->any())
			->method('getShareBackend')
			->will($this->returnValueMap(array(
				array('test1', $this->shareBackend1),
				array('test2', $this->shareBackend2),
			)));
		$this->user1 = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$this->user1->expects($this->any())
			->method('getUID')
			->will($this->returnValue('MTGap'));
		$this->user2 = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$this->user2->expects($this->any())
			->method('getUID')
			->will($this->returnValue('bantu'));
		$this->group = $this->getMockBuilder('\OC\Group\Group')
			->disableOriginalConstructor()
			->getMock();
		$this->group->expects($this->any())
			->method('getGID')
			->will($this->returnValue('friends'));
		$this->group->expects($this->any())
			->method('getUsers')
			->will($this->returnValue(array($this->user1, $this->user2)));
	}

	public function testOnGroupDeleted() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		\OC_Appconfig::setValue('core', 'shareapi_share_policy', 'global');

		$mtgap = 'MTGap';
		$group = 'friends';
		$share1 = new Share();
		$share1->setShareTypeId('group');
		$share1->setShareOwner($mtgap);
		$share1->setShareWith($group);
		$share1->setItemType('test1');
		$share2 = new Share();
		$share2->setShareTypeId('group');
		$share2->setShareOwner($mtgap);
		$share2->setShareWith($group);
		$share2->setItemType('test2');
		$map = array(
			array('test1', array('shareTypeId' => 'group', 'shareWith' => $group), null, null,
				array($share1)
			),
			array('test2', array('shareTypeId' => 'group', 'shareWith' => $group), null, null,
				array($share2)
			),
		);
		$this->shareManager->expects($this->exactly(2))
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareManager->expects($this->exactly(2))
			->method('unshare');
		$groupManager = $this->getMockBuilder('\OC\Group\Manager')
			->disableOriginalConstructor()
			->getMock();
		$groupManager->expects($this->atLeastOnce())
			->method('listen')
			->will($this->returnCallBack(array($this, 'listenPostDelete')));
		$groupWatcher = new \OC\Share\ShareType\GroupWatcher($this->shareManager, $groupManager);

		\OC_Appconfig::setValue('core', 'shareapi_share_policy', $sharingPolicy);
	}

	public function testOnGroupDeletedWithGroupsOnlyPolicy() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		\OC_Appconfig::setValue('core', 'shareapi_share_policy', 'groups_only');

		$mtgap = 'MTGap';
		$bantu = 'bantu';
		$group = 'friends';
		$share1 = new Share();
		$share1->setShareTypeId('group');
		$share1->setShareOwner($mtgap);
		$share1->setShareWith($group);
		$share1->setItemType('test1');
		$share2 = new Share();
		$share2->setShareTypeId('group');
		$share2->setShareOwner($mtgap);
		$share2->setShareWith($group);
		$share2->setItemType('test2');
		$share3 = new Share();
		$share3->setShareTypeId('user');
		$share3->setShareOwner($bantu);
		$share3->setShareWith($mtgap);
		$share3->setItemType('test2');
		$map = array(
			array('test1', array('shareTypeId' => 'group', 'shareWith' => $group), null, null,
				array($share1)
			),
			array('test2', array('shareTypeId' => 'group', 'shareWith' => $group), null, null,
				array($share2)
			),
			array('test1', array('shareTypeId' => 'user', 'shareOwner' => $mtgap), null, null,
				array()
			),
			array('test2', array('shareTypeId' => 'user', 'shareOwner' => $mtgap), null, null,
				array()
			),
			array('test1', array('shareTypeId' => 'user', 'shareOwner' => $bantu), null, null,
				array()
			),
			array('test2', array('shareTypeId' => 'user', 'shareOwner' => $bantu), null, null,
				array($share3)
			),
		);
		$this->shareManager->expects($this->exactly(6))
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareManager->expects($this->exactly(3))
			->method('unshare');
		$shareType = $this->getMockBuilder('\OC\Share\ShareType\User')
			->disableOriginalConstructor()
			->getMock();
		$shareType->expects($this->once())
			->method('isValidShare')
			->with($this->equalTo($share3))
			->will($this->throwException(new InvalidShareException(
				'The share owner is not in any groups of the user shared with as required by '.
				'the groups only sharing policy set by the admin'
			)));
		$this->shareBackend1->expects($this->any())
			->method('getShareType')
			->with($this->equalTo('user'))
			->will($this->returnValue($shareType));
		$this->shareBackend2->expects($this->any())
			->method('getShareType')
			->with($this->equalTo('user'))
			->will($this->returnValue($shareType));
		$groupManager = $this->getMockBuilder('\OC\Group\Manager')
			->disableOriginalConstructor()
			->getMock();
		$groupManager->expects($this->atLeastOnce())
			->method('listen')
			->will($this->returnCallBack(array($this, 'listenPostDelete')));
		$groupWatcher = new \OC\Share\ShareType\GroupWatcher($this->shareManager, $groupManager);

		\OC_Appconfig::setValue('core', 'shareapi_share_policy', $sharingPolicy);
	}

	public function listenPostDelete($scope, $method, $callback) {
		if ($method === 'postDelete') {
			$this->assertEquals('\OC\Group', $scope);
			// Fake PublicEmitter's emit
			call_user_func_array($callback, array($this->group));
		}
	}

	public function testOnUserAddedToGroup() {
		$mtgap = 'MTGap';
		$bantu = 'bantu';
		$group = 'friends';
		$share1 = new Share();
		$share1->setShareTypeId('group');
		$share1->setShareOwner($mtgap);
		$share1->setShareWith($group);
		$share1->setItemType('test1');
		$share1->setItemTarget(array('Group Target'));
		$share2 = new Share();
		$share2->setShareTypeId('group');
		$share2->setShareOwner($mtgap);
		$share2->setShareWith($group);
		$share2->setItemType('test2');
		$share2->setItemTarget(array('Group Target'));
		$map = array(
			array('test1', array('shareTypeId' => 'group', 'shareWith' => $group), null, null,
				array($share1)
			),
			array('test2', array('shareTypeId' => 'group', 'shareWith' => $group), null, null,
				array($share2)
			),
		);
		$this->shareManager->expects($this->exactly(2))
			->method('getShares')
			->will($this->returnValueMap($map));
		$itemTargetMachine = $this->getMockBuilder('\OC\Share\ItemTargetMachine')
			->disableOriginalConstructor()
			->getMock();
		$itemTargetMachine->expects($this->at(0))
			->method('getItemTarget')
			->with($this->equalTo($share1), $this->equalTo($this->user2))
			->will($this->returnValue('Andreas\' Target 1'));
		$itemTargetMachine->expects($this->at(1))
			->method('getItemTarget')
			->with($this->equalTo($share2), $this->equalTo($this->user2))
			->will($this->returnValue('Andreas\' Target 2'));
		$shareType = $this->getMockBuilder('\OC\Share\ShareType\Group')
			->disableOriginalConstructor()
			->getMock();
		$shareType->expects($this->any())
			->method('getItemTargetMachine')
			->will($this->returnValue($itemTargetMachine));
		$this->shareBackend1->expects($this->any())
			->method('getShareType')
			->with($this->equalTo('group'))
			->will($this->returnValue($shareType));
		$this->shareBackend2->expects($this->any())
			->method('getShareType')
			->with($this->equalTo('group'))
			->will($this->returnValue($shareType));
		$updatedShare1 = clone $share1;
		$updatedShare1->setItemTarget(array('Group Target', 'users' => array(
				$bantu => 'Andreas\' Target 1'
			)
		));
		$updatedShare2 = clone $share2;
		$updatedShare2->setItemTarget(array('Group Target', 'users' => array(
				$bantu => 'Andreas\' Target 2'
			)
		));
		// I had to manually counted the indices... this could break easily
		$this->shareManager->expects($this->at(4))
			->method('update')
			->with($this->equalTo($updatedShare1));
		$this->shareManager->expects($this->at(6))
			->method('update')
			->with($this->equalTo($updatedShare2));
		$groupManager = $this->getMockBuilder('\OC\Group\Manager')
			->disableOriginalConstructor()
			->getMock();
		$groupManager->expects($this->atLeastOnce())
			->method('listen')
			->will($this->returnCallBack(array($this, 'listenPostAddUser')));
		$groupWatcher = new \OC\Share\ShareType\GroupWatcher($this->shareManager, $groupManager);
	}

	public function listenPostAddUser($scope, $method, $callback) {
		if ($method === 'postAddUser') {
			$this->assertEquals('\OC\Group', $scope);
			// Fake PublicEmitter's emit
			call_user_func_array($callback, array($this->group, $this->user2));
		}
	}

	public function testOnUserRemovedFromGroup() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		\OC_Appconfig::setValue('core', 'shareapi_share_policy', 'global');

		$mtgap = 'MTGap';
		$bantu = 'bantu';
		$group = 'friends';
		$share1 = new Share();
		$share1->setId(1);
		$share1->setShareTypeId('group');
		$share1->setShareOwner($mtgap);
		$share1->setShareWith($group);
		$share1->setItemType('test1');
		$share2 = new Share();
		$share2->setId(2);
		$share2->addParentId(1);
		$share2->setShareTypeId('link');
		$share2->setShareOwner($bantu);
		$share2->setItemType('test1');
		$map = array(
			array('test1', array('shareTypeId' => 'group', 'shareWith' => $group), null, null,
				array($share1)
			),
			array('test2', array('shareTypeId' => 'group', 'shareWith' => $group), null, null,
				array()
			),
		);
		$this->shareManager->expects($this->exactly(2))
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareManager->expects($this->once())
			->method('getReshares')
			->with($this->equalTo($share1))
			->will($this->returnValue(array($share2)));
		$this->shareManager->expects($this->once())
			->method('unshare');
		$groupManager = $this->getMockBuilder('\OC\Group\Manager')
			->disableOriginalConstructor()
			->getMock();
		$groupManager->expects($this->atLeastOnce())
			->method('listen')
			->will($this->returnCallBack(array($this, 'listenPostRemoveUser')));
		$groupWatcher = new \OC\Share\ShareType\GroupWatcher($this->shareManager, $groupManager);

		\OC_Appconfig::setValue('core', 'shareapi_share_policy', $sharingPolicy);
	}

	public function testOnUserRemovedFromGroupWithGroupsOnlyPolicy() {
		$sharingPolicy = \OC_Appconfig::getValue('core', 'shareapi_share_policy', 'global');
		\OC_Appconfig::setValue('core', 'shareapi_share_policy', 'groups_only');

		$mtgap = 'MTGap';
		$bantu = 'bantu';
		$group = 'friends';
		$share1 = new Share();
		$share1->setId(1);
		$share1->setShareTypeId('group');
		$share1->setShareOwner($mtgap);
		$share1->setShareWith($group);
		$share1->setItemType('test1');
		$share2 = new Share();
		$share2->setId(2);
		$share2->addParentId(1);
		$share2->setShareTypeId('link');
		$share2->setShareOwner($bantu);
		$share2->setItemType('test1');
		$share3 = new Share();
		$share3->setShareTypeId('user');
		$share3->setShareOwner($bantu);
		$share3->setShareWith($mtgap);
		$share3->setItemType('test2');
		$map = array(
			array('test1', array('shareTypeId' => 'group', 'shareWith' => $group), null, null,
				array($share1)
			),
			array('test2', array('shareTypeId' => 'group', 'shareWith' => $group), null, null,
				array()
			),
			array('test1', array('shareTypeId' => 'user', 'shareOwner' => $bantu), null, null,
				array()
			),
			array('test2', array('shareTypeId' => 'user', 'shareOwner' => $bantu), null, null,
				array($share3)
			),
		);
		$this->shareManager->expects($this->exactly(4))
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareManager->expects($this->once())
			->method('getReshares')
			->with($this->equalTo($share1))
			->will($this->returnValue(array($share2)));
		$this->shareManager->expects($this->exactly(2))
			->method('unshare');
		$shareType = $this->getMockBuilder('\OC\Share\ShareType\User')
			->disableOriginalConstructor()
			->getMock();
		$shareType->expects($this->once())
			->method('isValidShare')
			->with($this->equalTo($share3))
			->will($this->throwException(new InvalidShareException(
				'The share owner is not in any groups of the user shared with as required by '.
				'the groups only sharing policy set by the admin'
			)));
		$this->shareBackend1->expects($this->any())
			->method('getShareType')
			->with($this->equalTo('user'))
			->will($this->returnValue($shareType));
		$this->shareBackend2->expects($this->any())
			->method('getShareType')
			->with($this->equalTo('user'))
			->will($this->returnValue($shareType));
		$groupManager = $this->getMockBuilder('\OC\Group\Manager')
			->disableOriginalConstructor()
			->getMock();
		$groupManager->expects($this->atLeastOnce())
			->method('listen')
			->will($this->returnCallBack(array($this, 'listenPostRemoveUser')));
		$groupWatcher = new \OC\Share\ShareType\GroupWatcher($this->shareManager, $groupManager);

		\OC_Appconfig::setValue('core', 'shareapi_share_policy', $sharingPolicy);
	}

	public function listenPostRemoveUser($scope, $method, $callback) {
		if ($method === 'postRemoveUser') {
			$this->assertEquals('\OC\Group', $scope);
			// Fake PublicEmitter's emit
			call_user_func_array($callback, array($this->group, $this->user2));
		}
	}

}