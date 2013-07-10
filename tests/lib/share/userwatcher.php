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
use OC\User\User;

class UserWatcher extends \PHPUnit_Framework_TestCase {

	private $shareManager;
	private $user;

	protected function setUp() {
		$this->shareManager = $this->getMockBuilder('\OC\Share\ShareManager')
			->disableOriginalConstructor()
			->getMock();
		$shareBackend1 = $this->getMockBuilder('\OC\Share\ShareBackend')
			->disableOriginalConstructor()
			->setMethods(get_class_methods('\OC\Share\ShareBackend'))
			->getMockForAbstractClass();
		$shareBackend1->expects($this->any())
			->method('getItemType')
			->will($this->returnValue('test1'));
		$shareBackend2 = $this->getMockBuilder('\OC\Share\ShareBackend')
			->disableOriginalConstructor()
			->setMethods(get_class_methods('\OC\Share\ShareBackend'))
			->getMockForAbstractClass();
		$shareBackend2->expects($this->any())
			->method('getItemType')
			->will($this->returnValue('test2'));
		$this->shareManager->expects($this->any())
			->method('getShareBackends')
			->will($this->returnValue(array(
				'test1' => $shareBackend1,
				'test2' => $shareBackend2,
			)));
	}

	public function testOnUserDeleted() {
		$mtgap = 'MTGap';
		$vicdeo = 'VicDeo';
		$share1 = new Share();
		$share1->setShareTypeId('link');
		$share1->setShareOwner($mtgap);
		$share1->setItemType('test1');
		$share2 = new Share();
		$share2->setShareTypeId('user');
		$share2->setShareOwner($mtgap);
		$share2->setShareWith($vicdeo);
		$share2->setItemType('test2');
		$share3 = new Share();
		$share3->setShareTypeId('user');
		$share3->setShareOwner($vicdeo);
		$share3->setShareWith($mtgap);
		$share3->setItemType('test1');
		$share4 = new Share();
		$share4->setShareTypeId('user');
		$share4->setShareOwner($vicdeo);
		$share4->setShareWith($mtgap);
		$share4->setItemType('test2');
		$this->user = $this->getMockBuilder('\OC\User\User')
			->disableOriginalConstructor()
			->getMock();
		$this->user->expects($this->once())
			->method('getUID')
			->will($this->returnValue($mtgap));
		$map = array(
			array('test1', array('shareOwner' => $mtgap), null, null, array($share1)),
			array('test2', array('shareOwner' => $mtgap), null, null, array($share2)),
			array('test1', array('shareTypeId' => 'user', 'shareWith' => $mtgap), null, null,
				array($share3)
			),
			array('test2', array('shareTypeId' => 'user', 'shareWith' => $mtgap), null, null,
				array($share4)
			),
		);
		$this->shareManager->expects($this->exactly(4))
			->method('getShares')
			->will($this->returnValueMap($map));
		$this->shareManager->expects($this->exactly(4))
			->method('unshare');
		$userManager = $this->getMockBuilder('\OC\User\Manager')
			->disableOriginalConstructor()
			->getMock();
		$userManager->expects($this->once())
			->method('listen')
			->will($this->returnCallBack(array($this, 'listenPostDelete')));
		$userWatcher = new \OC\Share\UserWatcher($this->shareManager, $userManager);
	}

	public function listenPostDelete($scope, $method, $callback) {
		// Fake PublicEmitter's emit
		$this->assertEquals('\OC\User', $scope);
		$this->assertEquals('postDelete', $method);
		call_user_func_array($callback, array($this->user));
	}

}