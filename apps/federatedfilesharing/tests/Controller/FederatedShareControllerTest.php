<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

namespace OCA\FederatedFileSharing\Tests;

use OCA\FederatedFileSharing\AddressHandler;
use OCA\FederatedFileSharing\FederatedShareProvider;
use OCA\FederatedFileSharing\FedShareManager;
use OCA\FederatedFileSharing\Notifications;
use OCA\FederatedFileSharing\Controller\FederatedShareController;
use OCP\AppFramework\Http;
use OCP\App\IAppManager;
use OCP\Constants;
use OCP\IDBConnection;
use OCP\IRequest;
use OCP\IUserManager;
use OCP\Share;
use OCP\Share\IShare;

/**
 * Class FederatedShareControllerTest
 *
 * @group DB
 * @package OCA\FederatedFileSharing\Tests
 */
class FederatedShareControllerTest extends TestCase {
	/**
	 * @var FederatedShareProvider | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $federatedShareProvider;

	/**
	 * @var IDBConnection | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $connection;

	/**
	 * @var IAppManager | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $appManager;

	/** @var IUserManager | \PHPUnit_Framework_MockObject_MockObject */
	private $userManager;

	/**
	 * @var IRequest | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $request;

	/**
	 * @var Notifications | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $notifications;

	/**
	 * @var AddressHandler | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $addressHandler;

	/**
	 * @var FedShareManager | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $fedShareManager;

	/**
	 * @var FederatedShareController
	 */
	private $federatedShareController;

	protected function setUp() {
		parent::setUp();

		$this->federatedShareProvider = $this->getMockBuilder(
			FederatedShareProvider::class
			)
			->disableOriginalConstructor()->getMock();

		$this->connection = $this->getMockBuilder(IDBConnection::class)
			->disableOriginalConstructor()->getMock();

		$this->appManager = $this->getMockBuilder(IAppManager::class)
			->disableOriginalConstructor()->getMock();

		$this->userManager = $this->getMockBuilder(IUserManager::class)
			->disableOriginalConstructor()->getMock();

		$this->request = $this->getMockBuilder(IRequest::class)
			->disableOriginalConstructor()->getMock();

		$this->notifications = $this->getMockBuilder(Notifications::class)
			->disableOriginalConstructor()->getMock();

		$this->addressHandler = $this->getMockBuilder(AddressHandler::class)
			->disableOriginalConstructor()->getMock();

		$this->fedShareManager = $this->getMockBuilder(FedShareManager::class)
			->disableOriginalConstructor()->getMock();

		$this->federatedShareController = new FederatedShareController(
			'federatedfilesharing',
			$this->request,
			$this->federatedShareProvider,
			$this->connection,
			$this->appManager,
			$this->userManager,
			$this->notifications,
			$this->addressHandler,
			$this->fedShareManager
		);
	}

	public function testShareIsNotCreatedWhenSharingIsDisabled() {
		$this->expectFileSharingApp('disabled');
		$this->fedShareManager->expects($this->never())
			->method('createShare');
		$response = $this->federatedShareController->createShare();
		$this->assertEquals(
			Http::STATUS_SERVICE_UNAVAILABLE,
			$response->getStatusCode()
		);
	}

	public function testShareIsNotCreatedWhenIncomingSharingIsDisabled() {
		$this->expectFileSharingApp('enabled');
		$this->expectIncomingSharing('disabled');
		$response = $this->federatedShareController->createShare();
		$this->assertEquals(
			Http::STATUS_SERVICE_UNAVAILABLE,
			$response->getStatusCode()
		);
	}

	public function testShareIsNotCreatedWithEmptyParams() {
		$this->expectFileSharingApp('enabled');
		$this->expectIncomingSharing('enabled');
		$response = $this->federatedShareController->createShare();
		$this->assertEquals(
			Http::STATUS_BAD_REQUEST,
			$response->getStatusCode()
		);
	}

	public function testShareIsNotCreatedForNonExistingUser() {
		$this->expectFileSharingApp('enabled');
		$this->expectIncomingSharing('enabled');
		$this->request->expects($this->any())
			->method('getParam')
			->willReturn('a');
		$this->userManager->expects($this->once())
			->method('userExists')
			->willReturn(false);

		$response = $this->federatedShareController->createShare();
		$this->assertEquals(
			Http::STATUS_BAD_REQUEST,
			$response->getStatusCode()
		);
	}

	public function testShareIsNotCreatedForEmptyPath() {
		$this->expectFileSharingApp('enabled');
		$this->expectIncomingSharing('enabled');
		$this->request->expects($this->any())
			->method('getParam')
			->willReturn('');

		$response = $this->federatedShareController->createShare();
		$this->assertEquals(
			Http::STATUS_BAD_REQUEST,
			$response->getStatusCode()
		);
	}

	public function testShareIsCreated() {
		$this->expectFileSharingApp('enabled');
		$this->expectIncomingSharing('enabled');
		$this->request->expects($this->any())
			->method('getParam')
			->willReturn('abc');
		$this->userManager->expects($this->once())
			->method('userExists')
			->willReturn(true);

		$this->fedShareManager->expects($this->once())
			->method('createShare');

		$response = $this->federatedShareController->createShare();
		$this->assertEquals(
			Http::STATUS_CONTINUE,
			$response->getStatusCode()
		);
	}

	public function testReshareFailedForEmptyParams() {
		$response = $this->federatedShareController->reShare(2);
		$this->assertEquals(
			Http::STATUS_BAD_REQUEST,
			$response->getStatusCode()
		);
	}

	public function testReshareFailedForWrongShareId() {
		$this->request->expects($this->any())
			->method('getParam')
			->willReturn('abc');
		$this->federatedShareProvider->expects($this->once())
			->method('getShareById')
			->willThrowException(new Share\Exceptions\ShareNotFound());
		$response = $this->federatedShareController->reShare('a99');
		$this->assertEquals(
			Http::STATUS_NOT_FOUND,
			$response->getStatusCode()
		);
	}

	public function testReshareFailedForSharingBackToOwner() {
		$this->request->expects($this->any())
			->method('getParam')
			->willReturn('abc');
		$share = $this->getValidShareMock('abc');
		$this->federatedShareProvider->expects($this->once())
			->method('getShareById')
			->willReturn($share);
		$this->addressHandler->expects($this->any())
			->method('compareAddresses')
			->willReturn(true);
		$response = $this->federatedShareController->reShare('a99');
		$this->assertEquals(
			Http::STATUS_FORBIDDEN,
			$response->getStatusCode()
		);
	}

	public function testReshareFailedForWrongPermissions() {
		$this->request->expects($this->any())
			->method('getParam')
			->willReturn('abc');
		$share = $this->getValidShareMock('abc');
		$this->federatedShareProvider->expects($this->once())
			->method('getShareById')
			->willReturn($share);
		$response = $this->federatedShareController->reShare('a99');
		$this->assertEquals(
			Http::STATUS_BAD_REQUEST,
			$response->getStatusCode()
		);
	}

	public function testReshareFailedForTokenMismatch() {
		$this->request->expects($this->any())
			->method('getParam')
			->willReturn('abc');
		$share = $this->getValidShareMock('cba');
		$share->expects($this->any())
			->method('getPermissions')
			->willReturn(Constants::PERMISSION_SHARE);
		$this->federatedShareProvider->expects($this->once())
			->method('getShareById')
			->willReturn($share);

		$response = $this->federatedShareController->reShare('a99');
		$this->assertEquals(
			Http::STATUS_FORBIDDEN,
			$response->getStatusCode()
		);
	}

	public function testReshareSuccess() {
		$this->request->expects($this->any())
			->method('getParam')
			->willReturn('abc');
		$share = $this->getValidShareMock('abc');
		$share->expects($this->any())
			->method('getPermissions')
			->willReturn(Constants::PERMISSION_SHARE);
		$this->federatedShareProvider->expects($this->once())
			->method('getShareById')
			->willReturn($share);

		$resultShare = $this->getMockBuilder(IShare::class)
			->disableOriginalConstructor()->getMock();
		$resultShare->expects($this->any())
			->method('getToken')
			->willReturn('token');
		$resultShare->expects($this->any())
			->method('getId')
			->willReturn(55);

		$this->fedShareManager->expects($this->once())
			->method('reShare')
			->willReturn($resultShare);
		$response = $this->federatedShareController->reShare(123);
		$this->assertEquals(
			Http::STATUS_CONTINUE,
			$response->getStatusCode()
		);
	}

	public function testAcceptFailedWhenSharingIsDisabled() {
		$this->expectFileSharingApp('disabled');
		$this->fedShareManager->expects($this->never())
			->method('acceptShare');
		$response = $this->federatedShareController->acceptShare(2);
		$this->assertEquals(
			Http::STATUS_SERVICE_UNAVAILABLE,
			$response->getStatusCode()
		);
	}

	public function testAcceptSuccess() {
		$this->expectFileSharingApp('enabled');
		$this->expectOutgoingSharing('enabled');

		$this->request->expects($this->any())
			->method('getParam')
			->willReturn('abc');
		$share = $this->getValidShareMock('abc');
		$share->expects($this->any())
			->method('getShareOwner')
			->willReturn('Alice');
		$share->expects($this->any())
			->method('getSharedBy')
			->willReturn('Bob');

		$this->federatedShareProvider->expects($this->once())
			->method('getShareById')
			->willReturn($share);

		$this->fedShareManager->expects($this->once())
			->method('acceptShare');

		$this->notifications->expects($this->once())
			->method('sendAcceptShare');

		$response = $this->federatedShareController->acceptShare(2);
		$this->assertEquals(
			Http::STATUS_CONTINUE,
			$response->getStatusCode()
		);
	}

	public function testDeclineFailedWhenSharingIsDisabled() {
		$this->expectFileSharingApp('disabled');
		$this->fedShareManager->expects($this->never())
			->method('declineShare');
		$response = $this->federatedShareController->acceptShare(2);
		$this->assertEquals(
			Http::STATUS_SERVICE_UNAVAILABLE,
			$response->getStatusCode()
		);
	}

	public function testDeclineSuccess() {
		$this->expectFileSharingApp('enabled');
		$this->expectOutgoingSharing('enabled');

		$this->request->expects($this->any())
			->method('getParam')
			->willReturn('abc');
		$share = $this->getValidShareMock('abc');
		$share->expects($this->any())
			->method('getShareOwner')
			->willReturn('Alice');
		$share->expects($this->any())
			->method('getSharedBy')
			->willReturn('Bob');

		$this->federatedShareProvider->expects($this->once())
			->method('getShareById')
			->willReturn($share);

		$this->fedShareManager->expects($this->once())
			->method('declineShare');

		$this->notifications->expects($this->once())
			->method('sendDeclineShare');

		$response = $this->federatedShareController->declineShare(2);
		$this->assertEquals(
			Http::STATUS_CONTINUE,
			$response->getStatusCode()
		);
	}

	public function testUnshareFailedWhenSharingIsDisabled() {
		$this->expectFileSharingApp('disabled');
		$this->fedShareManager->expects($this->never())
			->method('unshare');
		$response = $this->federatedShareController->unshare(2);
		$this->assertEquals(
			Http::STATUS_SERVICE_UNAVAILABLE,
			$response->getStatusCode()
		);
	}

	protected function getValidShareMock($token) {
		$share = $this->getMockBuilder(IShare::class)
			->disableOriginalConstructor()->getMock();
		$share->expects($this->any())
			->method('getToken')
			->willReturn($token);
		$share->expects($this->any())
			->method('getShareType')
			->willReturn(FederatedShareProvider::SHARE_TYPE_REMOTE);
		return $share;
	}

	protected function expectIncomingSharing($state) {
		$this->federatedShareProvider->expects($this->once())
			->method('isIncomingServer2serverShareEnabled')
			->willReturn($state === 'enabled');
	}

	protected function expectOutgoingSharing($state) {
		$this->federatedShareProvider->expects($this->once())
			->method('isOutgoingServer2serverShareEnabled')
			->willReturn($state === 'enabled');
	}

	protected function expectFileSharingApp($state) {
		$this->appManager->expects($this->once())
			->method('isEnabledForUser')
			->with('files_sharing')
			->willReturn($state === 'enabled');
	}
}
