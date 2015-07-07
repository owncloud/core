<?php
/**
 * @author Clark Tomlinson <clark@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OC\Settings\Controller;

use OCP\AppFramework\Http\JSONResponse;
use Test\TestCase;

/**
 * Class ChangePasswordControllerTest
 *
 * @package OC\Settings\Controller
 */
class ChangePasswordControllerTest extends TestCase {


	/**
	 * @var \PHPUnit_Framework_MockObject_MockObject
	 */
	private $request;

	/**
	 * @var \PHPUnit_Framework_MockObject_MockObject
	 */
	private $l10n;

	/**
	 * @var \PHPUnit_Framework_MockObject_MockObject
	 */
	private $appManager;

	/**
	 * @var \PHPUnit_Framework_MockObject_MockObject
	 */
	private $userManager;

	/**
	 * @var \PHPUnit_Framework_MockObject_MockObject
	 */
	private $userSession;

	/**
	 * @var \PHPUnit_Framework_MockObject_MockObject
	 */
	private $groupManager;

	/**
	 * @var ChangePasswordController
	 */
	private $changePasswordController;

	public function setUp() {
		parent::setUp();

		$this->request = $this->getMockBuilder('\OCP\IRequest')
			->disableOriginalConstructor()->getMock();

		$this->l10n = $this->getMockBuilder('\OCP\IL10N')
			->disableOriginalConstructor()->getMock();

		$this->l10n->expects($this->any())
			->method('t')
			->will($this->returnArgument(0));

		$this->appManager = $this->getMockBuilder('\OCP\App\IAppManager')
			->disableOriginalConstructor()->getMock();

		$this->userManager = $this->getMockBuilder('\OCP\IUserManager')
			->disableOriginalConstructor()->getMock();
		$this->groupManager = $this->getMockBuilder('\OCP\IGroupManager')
			->disableOriginalConstructor()->getMock();

		$this->userSession = $this->getMockBuilder('OCP\IUserSession')
			->disableOriginalConstructor()
			->setMethods([
				'isLoggedIn',
				'getUID',
				'login',
				'logout',
				'setUser',
				'getUser',
				'canChangePassword',
			])
			->getMock();

		$this->userSession->expects($this->any())
			->method('getUID')
			->willReturn('testUser');

		$this->userSession->expects($this->any())
			->method($this->anything())
			->will($this->returnSelf());

		$this->changePasswordController = new ChangePasswordController(
			'settings',
			$this->request,
			$this->l10n,
			$this->appManager,
			$this->userManager,
			$this->userSession,
			$this->groupManager
		);
	}

	public function testChangePersonalPassword() {
		$this->userSession
			->expects($this->once())
			->method('getUser');

		$this->request
			->expects($this->exactly(2))
			->method('getParam');

		$this->userManager
			->expects($this->once())
			->method('checkPassword');

		$this->assertInstanceOf('OCP\AppFramework\Http\JsonResponse',
			$this->changePasswordController->changePersonalPassword());
	}

	public function testChangeUserPassword() {
		$this->request
			->expects($this->exactly(4))
			->method('getParam')
			->willReturnArgument(0);

		$this->groupManager->expects($this->once())
			->method('isAdmin')
			->willReturn(true);

		$this->appManager->expects($this->once())
			->method('isEnabledForUser')
			->with('encryption')
			->willReturn(false);

		$this->assertInstanceOf('OCP\AppFramework\Http\JsonResponse',
			$this->changePasswordController->changeUserPassword());
	}

	public function testChangeUserPasswordFailsWithoutUsername() {
		$this->request
			->expects($this->once())
			->method('getParam')
			->willReturn(false);

		$this->assertEquals(
			new JSONResponse(['data' => ['message' => $this->l10n->t('No user supplied')], 'status' => 'error']),
			$this->changePasswordController->changeUserPassword()
		);
	}

	public function testChangeUserPasswordFailsIfNoPasswordIsGiven() {
		$this->request
			->expects($this->exactly(4))
			->method('getParam')
			->willReturnArgument(0);

		$this->groupManager->expects($this->once())
			->method('isAdmin')
			->willReturn(true);

		$this->assertEquals(
			new JSONResponse(['data' => ['message' => $this->l10n->t('Unable to change password')], 'status' => 'error']),
			$this->changePasswordController->changeUserPassword()
		);
	}


}
