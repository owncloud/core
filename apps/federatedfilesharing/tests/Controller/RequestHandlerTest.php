<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\FederatedFileSharing\Tests\Controller;

use OCA\FederatedFileSharing\AddressHandler;
use OCA\FederatedFileSharing\FederatedShareProvider;
use OCA\FederatedFileSharing\FedShareManager;
use OCA\FederatedFileSharing\Controller\RequestHandlerController;
use OCA\FederatedFileSharing\Tests\TestCase;
use OCP\App\IAppManager;
use OCP\AppFramework\Http;
use OCP\Constants;
use OCP\IRequest;
use OCP\IUserManager;
use OCP\Share;
use OCP\Share\IShare;

/**
 * Class RequestHandlerControllerTest
 *
 * @package OCA\FederatedFileSharing\Tests
 * @group DB
 */
class RequestHandlerTest extends TestCase {
	const DEFAULT_TOKEN = 'abc';
	/**
	 * @var FederatedShareProvider | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $federatedShareProvider;

	/**
	 * @var IAppManager | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $appManager;

	/**
	 * @var IUserManager | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $userManager;

	/**
	 * @var IRequest | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $request;

	/**
	 * @var AddressHandler | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $addressHandler;

	/**
	 * @var FedShareManager | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $fedShareManager;

	/**
	 * @var RequestHandlerController
	 */
	private $requestHandlerController;

	protected function setUp() {
		parent::setUp();

		$this->federatedShareProvider = $this->getMockBuilder(
			FederatedShareProvider::class
		)
			->disableOriginalConstructor()->getMock();
		$this->appManager = $this->getMockBuilder(IAppManager::class)
			->disableOriginalConstructor()->getMock();
		$this->userManager = $this->getMockBuilder(IUserManager::class)
			->disableOriginalConstructor()->getMock();
		$this->request = $this->getMockBuilder(IRequest::class)
			->disableOriginalConstructor()->getMock();
		$this->addressHandler = $this->getMockBuilder(AddressHandler::class)
			->disableOriginalConstructor()->getMock();
		$this->fedShareManager = $this->getMockBuilder(FedShareManager::class)
			->disableOriginalConstructor()->getMock();
		$this->requestHandlerController = new RequestHandlerController(
			'federatedfilesharing',
			$this->request,
			$this->federatedShareProvider,
			$this->appManager,
			$this->userManager,
			$this->addressHandler,
			$this->fedShareManager
		);
	}

	public function testShareIsNotCreatedWhenSharingIsDisabled() {
		$this->expectFileSharingApp('disabled');
		$this->fedShareManager->expects($this->never())
			->method('createShare');
		$response = $this->requestHandlerController->createShare();
		$this->assertEquals(
			Http::STATUS_NOT_IMPLEMENTED,
			$response->getStatusCode()
		);
	}

	public function testShareIsNotCreatedWhenIncomingSharingIsDisabled() {
		$this->expectFileSharingApp('enabled');
		$this->expectIncomingSharing('disabled');
		$response = $this->requestHandlerController->createShare();
		$this->assertEquals(
			Http::STATUS_NOT_IMPLEMENTED,
			$response->getStatusCode()
		);
	}

	public function testShareIsNotCreatedWithEmptyParams() {
		$this->expectFileSharingApp('enabled');
		$this->expectIncomingSharing('enabled');
		$response = $this->requestHandlerController->createShare();
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
		$response = $this->requestHandlerController->createShare();
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
		$response = $this->requestHandlerController->createShare();
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
			->willReturn(self::DEFAULT_TOKEN);
		$this->userManager->expects($this->once())
			->method('userExists')
			->willReturn(true);
		$this->fedShareManager->expects($this->once())
			->method('createShare');
		$response = $this->requestHandlerController->createShare();
		$this->assertEquals(
			Http::STATUS_CONTINUE,
			$response->getStatusCode()
		);
	}

	public function testReshareFailedForEmptyParams() {
		$response = $this->requestHandlerController->reShare(2);
		$this->assertEquals(
			Http::STATUS_BAD_REQUEST,
			$response->getStatusCode()
		);
	}

	public function testReshareFailedForWrongShareId() {
		$this->request->expects($this->any())
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);
		$this->federatedShareProvider->expects($this->once())
			->method('getShareById')
			->willThrowException(new Share\Exceptions\ShareNotFound());
		$response = $this->requestHandlerController->reShare('a99');
		$this->assertEquals(
			Http::STATUS_NOT_FOUND,
			$response->getStatusCode()
		);
	}

	public function testReshareFailedForSharingBackToOwner() {
		$this->request->expects($this->any())
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);
		$share = $this->getValidShareMock(self::DEFAULT_TOKEN);
		$this->federatedShareProvider->expects($this->once())
			->method('getShareById')
			->willReturn($share);
		$this->addressHandler->expects($this->any())
			->method('compareAddresses')
			->willReturn(true);
		$response = $this->requestHandlerController->reShare('a99');
		$this->assertEquals(
			Http::STATUS_FORBIDDEN,
			$response->getStatusCode()
		);
	}

	public function testReshareFailedForWrongPermissions() {
		$this->request->expects($this->any())
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);
		$share = $this->getValidShareMock(self::DEFAULT_TOKEN);
		$this->federatedShareProvider->expects($this->once())
			->method('getShareById')
			->willReturn($share);
		$response = $this->requestHandlerController->reShare('a99');
		$this->assertEquals(
			Http::STATUS_BAD_REQUEST,
			$response->getStatusCode()
		);
	}

	public function testReshareFailedForTokenMismatch() {
		$this->request->expects($this->any())
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);
		$share = $this->getValidShareMock('cba');
		$share->expects($this->any())
			->method('getPermissions')
			->willReturn(Constants::PERMISSION_SHARE);
		$this->federatedShareProvider->expects($this->once())
			->method('getShareById')
			->willReturn($share);

		$response = $this->requestHandlerController->reShare('a99');
		$this->assertEquals(
			Http::STATUS_FORBIDDEN,
			$response->getStatusCode()
		);
	}

	public function testReshareSuccess() {
		$this->request->expects($this->any())
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);
		$share = $this->getValidShareMock(self::DEFAULT_TOKEN);
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
		$response = $this->requestHandlerController->reShare(123);
		$this->assertEquals(
			Http::STATUS_CONTINUE,
			$response->getStatusCode()
		);
	}

	public function testAcceptFailedWhenSharingIsDisabled() {
		$this->expectFileSharingApp('disabled');
		$this->fedShareManager->expects($this->never())
			->method('acceptShare');
		$response = $this->requestHandlerController->acceptShare(2);
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
			->willReturn(self::DEFAULT_TOKEN);
		$share = $this->getValidShareMock(self::DEFAULT_TOKEN);
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

		$response = $this->requestHandlerController->acceptShare(2);
		$this->assertEquals(
			Http::STATUS_CONTINUE,
			$response->getStatusCode()
		);
	}

	public function testDeclineFailedWhenSharingIsDisabled() {
		$this->expectFileSharingApp('disabled');
		$this->fedShareManager->expects($this->never())
			->method('declineShare');
		$response = $this->requestHandlerController->acceptShare(2);
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
			->willReturn(self::DEFAULT_TOKEN);
		$share = $this->getValidShareMock(self::DEFAULT_TOKEN);
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

		$response = $this->requestHandlerController->declineShare(2);
		$this->assertEquals(
			Http::STATUS_CONTINUE,
			$response->getStatusCode()
		);
	}

	public function testUnshareFailedWhenSharingIsDisabled() {
		$this->expectFileSharingApp('disabled');
		$this->fedShareManager->expects($this->never())
			->method('unshare');
		$response = $this->requestHandlerController->unshare(2);
		$this->assertEquals(
			Http::STATUS_SERVICE_UNAVAILABLE,
			$response->getStatusCode()
		);
	}

	public function testUpdatePermissions() {
		$requestMap = [
			['token', null, self::DEFAULT_TOKEN],
			['permissions', null, Constants::PERMISSION_READ | Constants::PERMISSION_UPDATE]
		];
		$this->request->expects($this->any())
			->method('getParam')
			->will(
				$this->returnValueMap($requestMap)
			);
		$share = $this->getValidShareMock(self::DEFAULT_TOKEN);
		$share->expects($this->any())
			->method('getPermissions')
			->willReturn(Constants::PERMISSION_SHARE);
		$this->federatedShareProvider->expects($this->once())
			->method('getShareById')
			->willReturn($share);
		$this->requestHandlerController->updatePermissions(5);
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
