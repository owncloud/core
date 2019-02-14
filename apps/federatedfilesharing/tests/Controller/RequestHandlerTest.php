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

use OCA\FederatedFileSharing\Address;
use OCA\FederatedFileSharing\AddressHandler;
use OCA\FederatedFileSharing\FederatedShareProvider;
use OCA\FederatedFileSharing\FedShareManager;
use OCA\FederatedFileSharing\Controller\RequestHandlerController;
use OCA\FederatedFileSharing\Middleware\OcmMiddleware;
use OCA\FederatedFileSharing\Ocm\Exception\BadRequestException;
use OCA\FederatedFileSharing\Ocm\Exception\ForbiddenException;
use OCA\FederatedFileSharing\Ocm\Exception\NotImplementedException;
use OCA\FederatedFileSharing\Tests\TestCase;
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
	 * @var IRequest | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $request;

	/**
	 * @var OcmMiddleware
	 */
	private $ocmMiddleware;

	/**
	 * @var IUserManager | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $userManager;

	/**
	 * @var AddressHandler | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $addressHandler;

	/**
	 * @var FedShareManager | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $fedShareManager;

	/**
	 * @var RequestHandlerController
	 */
	private $requestHandlerController;

	protected function setUp(): void {
		parent::setUp();

		$this->request = $this->createMock(IRequest::class);
		$this->ocmMiddleware = $this->createMock(OcmMiddleware::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->addressHandler = $this->createMock(AddressHandler::class);
		$this->fedShareManager = $this->createMock(FedShareManager::class);
		$this->requestHandlerController = new RequestHandlerController(
			'federatedfilesharing',
			$this->request,
			$this->ocmMiddleware,
			$this->userManager,
			$this->addressHandler,
			$this->fedShareManager
		);
	}

	public function testShareIsNotCreatedWhenSharingIsDisabled() {
		$this->ocmMiddleware->method('assertIncomingSharingEnabled')
			->willThrowException(new NotImplementedException());
		$this->fedShareManager->expects($this->never())
			->method('createShare');
		$response = $this->requestHandlerController->createShare();
		$this->assertEquals(
			Http::STATUS_NOT_IMPLEMENTED,
			$response->getStatusCode()
		);
	}

	public function testShareIsNotCreatedWithEmptyParams() {
		$response = $this->requestHandlerController->createShare();
		$this->assertEquals(
			Http::STATUS_BAD_REQUEST,
			$response->getStatusCode()
		);
	}

	public function testShareIsNotCreatedForNonExistingUser() {
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
		$this->ocmMiddleware->method('assertNotNull')
			->willThrowException(new BadRequestException());
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
		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
			->willThrowException(new Share\Exceptions\ShareNotFound());
		$response = $this->requestHandlerController->reShare('a99');
		$this->assertEquals(
			Http::STATUS_BAD_REQUEST,
			$response->getStatusCode()
		);
	}

	public function testReshareFailedForSharingBackToOwner() {
		$this->request->expects($this->any())
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);
		$share = $this->getValidShareMock(self::DEFAULT_TOKEN);
		$this->addressHandler->method('getLocalUserFederatedAddress')
			->willReturn(new Address('user@host'));
		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
			->willReturn($share);
		$this->ocmMiddleware->expects($this->any())
			->method('assertNotSameUser')
			->willThrowException(new ForbiddenException());
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
		$this->addressHandler->method('getLocalUserFederatedAddress')
			->willReturn(new Address('user@host'));
		$share = $this->getValidShareMock(self::DEFAULT_TOKEN);
		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
			->willReturn($share);
		$this->ocmMiddleware->expects($this->once())
			->method('assertSharingPermissionSet')
			->willThrowException(new BadRequestException());
		$response = $this->requestHandlerController->reShare('a99');
		$this->assertEquals(
			Http::STATUS_BAD_REQUEST,
			$response->getStatusCode()
		);
	}

	public function testReshareFailedForTokenMismatch() {
		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
			->willThrowException(new ForbiddenException());

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
		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
			->willReturn($share);
		$this->addressHandler->method('getLocalUserFederatedAddress')
			->willReturn(new Address('user@host'));

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
		$this->ocmMiddleware->method('assertOutgoingSharingEnabled')
			->willThrowException(new NotImplementedException());
		$this->fedShareManager->expects($this->never())
			->method('acceptShare');
		$response = $this->requestHandlerController->acceptShare(2);
		$this->assertEquals(
			Http::STATUS_SERVICE_UNAVAILABLE,
			$response->getStatusCode()
		);
	}

	public function testAcceptSuccess() {
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

		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
			->willReturn($share);

		$this->fedShareManager->expects($this->once())
			->method('acceptShare');

		$response = $this->requestHandlerController->acceptShare(2);
		$this->assertEquals(
			Http::STATUS_CONTINUE,
			$response->getStatusCode()
		);
	}

	public function testAcceptFailedWhenInvalidShareId() {
		$this->request->expects($this->any())
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);

		$this->ocmMiddleware->method('getValidShare')
			->willThrowException(new BadRequestException());

		$this->fedShareManager->expects($this->never())
			->method('acceptShare');

		$response = $this->requestHandlerController->acceptShare(2);
		$this->assertEquals(
			Http::STATUS_GONE,
			$response->getStatusCode()
		);
	}

	public function testAcceptFailedWhenShareIdHasInvalidSecret() {
		$this->request->expects($this->any())
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);

		$this->ocmMiddleware->method('getValidShare')
			->willThrowException(new ForbiddenException());

		$this->fedShareManager->expects($this->never())
			->method('acceptShare');

		$response = $this->requestHandlerController->acceptShare(2);
		$this->assertEquals(
			Http::STATUS_FORBIDDEN,
			$response->getStatusCode()
		);
	}

	public function testDeclineFailedWhenSharingIsDisabled() {
		$this->ocmMiddleware->method('assertOutgoingSharingEnabled')
			->willThrowException(new NotImplementedException());
		$this->fedShareManager->expects($this->never())
			->method('declineShare');
		$response = $this->requestHandlerController->acceptShare(2);
		$this->assertEquals(
			Http::STATUS_SERVICE_UNAVAILABLE,
			$response->getStatusCode()
		);
	}

	public function testDeclineSuccess() {
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

		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
			->willReturn($share);

		$this->fedShareManager->expects($this->once())
			->method('declineShare');

		$response = $this->requestHandlerController->declineShare(2);
		$this->assertEquals(
			Http::STATUS_CONTINUE,
			$response->getStatusCode()
		);
	}

	public function testDeclineFailedWhenInvalidShareId() {
		$this->request->expects($this->any())
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);

		$this->ocmMiddleware->method('getValidShare')
			->willThrowException(new BadRequestException());

		$this->fedShareManager->expects($this->never())
			->method('declineShare');

		$response = $this->requestHandlerController->declineShare(2);
		$this->assertEquals(
			Http::STATUS_GONE,
			$response->getStatusCode()
		);
	}

	public function testDeclineFailedWhenShareIdHasInvalidSecret() {
		$this->request->expects($this->any())
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);

		$this->ocmMiddleware->method('getValidShare')
			->willThrowException(new ForbiddenException());

		$this->fedShareManager->expects($this->never())
			->method('declineShare');

		$response = $this->requestHandlerController->declineShare(2);
		$this->assertEquals(
			Http::STATUS_FORBIDDEN,
			$response->getStatusCode()
		);
	}

	public function testUnshareFailedWhenSharingIsDisabled() {
		$this->ocmMiddleware->method('assertOutgoingSharingEnabled')
			->willThrowException(new NotImplementedException());
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
		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
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
}
