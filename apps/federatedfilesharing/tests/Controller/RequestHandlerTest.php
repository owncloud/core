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
use PHPUnit\Framework\MockObject\MockObject;

/**
 * Class RequestHandlerControllerTest
 *
 * @package OCA\FederatedFileSharing\Tests
 * @group DB
 */
class RequestHandlerTest extends TestCase {
	public const DEFAULT_TOKEN = 'abc';

	/**
	 * @var IRequest | MockObject
	 */
	private $request;

	/**
	 * @var OcmMiddleware
	 */
	private $ocmMiddleware;

	/**
	 * @var IUserManager | MockObject
	 */
	private $userManager;

	/**
	 * @var AddressHandler | MockObject
	 */
	private $addressHandler;

	/**
	 * @var FedShareManager | MockObject
	 */
	private $fedShareManager;

	private RequestHandlerController $requestHandlerController;

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

	public function testShareIsNotCreatedWhenSharingIsDisabled(): void {
		$this->ocmMiddleware->method('assertIncomingSharingEnabled')
			->willThrowException(new NotImplementedException());
		$this->fedShareManager->expects($this->never())
			->method('createShare');
		$response = $this->requestHandlerController->createShare();
		self::assertEquals(
			Http::STATUS_NOT_IMPLEMENTED,
			$response->getStatusCode()
		);
	}

	public function testShareIsNotCreatedWithEmptyParams(): void {
		$response = $this->requestHandlerController->createShare();
		self::assertEquals(
			Http::STATUS_BAD_REQUEST,
			$response->getStatusCode()
		);
	}

	public function testShareIsNotCreatedForNonExistingUser(): void {
		$this->request
			->method('getParam')
			->willReturn('a');
		$this->userManager->expects($this->once())
			->method('userExists')
			->willReturn(false);
		$response = $this->requestHandlerController->createShare();
		self::assertEquals(
			Http::STATUS_BAD_REQUEST,
			$response->getStatusCode()
		);
	}

	public function testShareIsNotCreatedForEmptyPath(): void {
		$this->request
			->method('getParam')
			->willReturn('');
		$response = $this->requestHandlerController->createShare();
		self::assertEquals(
			Http::STATUS_BAD_REQUEST,
			$response->getStatusCode()
		);
	}

	public function testShareIsNotCreatedForTooLongPath(): void {
		$this->request
			->method('getParam')
			->willReturn('LoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsumLoremIpsum');
		$response = $this->requestHandlerController->createShare();
		self::assertEquals(
			Http::STATUS_BAD_REQUEST,
			$response->getStatusCode()
		);
	}

	public function testShareIsCreated(): void {
		$this->request
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);
		$this->userManager->expects($this->once())
			->method('userExists')
			->willReturn(true);
		$this->fedShareManager->expects($this->once())
			->method('createShare');
		$response = $this->requestHandlerController->createShare();
		self::assertEquals(
			Http::STATUS_CONTINUE,
			$response->getStatusCode()
		);
	}

	public function testReShareFailedForEmptyParams(): void {
		$this->ocmMiddleware->method('assertNotNull')
			->willThrowException(new BadRequestException());
		$response = $this->requestHandlerController->ReShare(2);
		self::assertEquals(
			Http::STATUS_BAD_REQUEST,
			$response->getStatusCode()
		);
	}

	public function testReShareFailedForWrongShareId(): void {
		$this->request
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);
		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
			->willThrowException(new Share\Exceptions\ShareNotFound());
		$response = $this->requestHandlerController->ReShare('a99');
		self::assertEquals(
			Http::STATUS_BAD_REQUEST,
			$response->getStatusCode()
		);
	}

	public function testReShareFailedForSharingBackToOwner(): void {
		$this->request
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);
		$share = $this->getValidShareMock(self::DEFAULT_TOKEN);
		$this->addressHandler->method('getLocalUserFederatedAddress')
			->willReturn(new Address('user@host'));
		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
			->willReturn($share);
		$this->ocmMiddleware
			->method('assertNotSameUser')
			->willThrowException(new ForbiddenException());
		$response = $this->requestHandlerController->ReShare('a99');
		self::assertEquals(
			Http::STATUS_FORBIDDEN,
			$response->getStatusCode()
		);
	}

	public function testReShareFailedForWrongPermissions(): void {
		$this->request
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
		$response = $this->requestHandlerController->ReShare('a99');
		self::assertEquals(
			Http::STATUS_BAD_REQUEST,
			$response->getStatusCode()
		);
	}

	public function testReShareFailedForTokenMismatch(): void {
		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
			->willThrowException(new ForbiddenException());

		$response = $this->requestHandlerController->ReShare('a99');
		self::assertEquals(
			Http::STATUS_FORBIDDEN,
			$response->getStatusCode()
		);
	}

	public function testReShareSuccess(): void {
		$this->request
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);
		$share = $this->getValidShareMock(self::DEFAULT_TOKEN);
		$share
			->method('getPermissions')
			->willReturn(Constants::PERMISSION_SHARE);
		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
			->willReturn($share);
		$this->addressHandler->method('getLocalUserFederatedAddress')
			->willReturn(new Address('user@host'));

		$resultShare = $this->getMockBuilder(IShare::class)
			->disableOriginalConstructor()->getMock();
		$resultShare
			->method('getToken')
			->willReturn('token');
		$resultShare
			->method('getId')
			->willReturn(55);

		$this->fedShareManager->expects($this->once())
			->method('ReShare')
			->willReturn($resultShare);
		$response = $this->requestHandlerController->ReShare(123);
		self::assertEquals(
			Http::STATUS_CONTINUE,
			$response->getStatusCode()
		);
	}

	public function testAcceptFailedWhenSharingIsDisabled(): void {
		$this->ocmMiddleware->method('assertOutgoingSharingEnabled')
			->willThrowException(new NotImplementedException());
		$this->fedShareManager->expects($this->never())
			->method('acceptShare');
		$response = $this->requestHandlerController->acceptShare(2);
		self::assertEquals(
			Http::STATUS_SERVICE_UNAVAILABLE,
			$response->getStatusCode()
		);
	}

	public function testAcceptSuccess(): void {
		$this->request
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);
		$share = $this->getValidShareMock(self::DEFAULT_TOKEN);
		$share
			->method('getShareOwner')
			->willReturn('Alice');
		$share
			->method('getSharedBy')
			->willReturn('Bob');

		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
			->willReturn($share);

		$this->fedShareManager->expects($this->once())
			->method('acceptShare');

		$response = $this->requestHandlerController->acceptShare(2);
		self::assertEquals(
			Http::STATUS_CONTINUE,
			$response->getStatusCode()
		);
	}

	public function testAcceptFailedWhenInvalidShareId(): void {
		$this->request
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);

		$this->ocmMiddleware->method('getValidShare')
			->willThrowException(new BadRequestException());

		$this->fedShareManager->expects($this->never())
			->method('acceptShare');

		$response = $this->requestHandlerController->acceptShare(2);
		self::assertEquals(
			Http::STATUS_GONE,
			$response->getStatusCode()
		);
	}

	public function testAcceptFailedWhenShareIdHasInvalidSecret(): void {
		$this->request
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);

		$this->ocmMiddleware->method('getValidShare')
			->willThrowException(new ForbiddenException());

		$this->fedShareManager->expects($this->never())
			->method('acceptShare');

		$response = $this->requestHandlerController->acceptShare(2);
		self::assertEquals(
			Http::STATUS_FORBIDDEN,
			$response->getStatusCode()
		);
	}

	public function testDeclineFailedWhenSharingIsDisabled(): void {
		$this->ocmMiddleware->method('assertOutgoingSharingEnabled')
			->willThrowException(new NotImplementedException());
		$this->fedShareManager->expects($this->never())
			->method('declineShare');
		$response = $this->requestHandlerController->acceptShare(2);
		self::assertEquals(
			Http::STATUS_SERVICE_UNAVAILABLE,
			$response->getStatusCode()
		);
	}

	public function testDeclineSuccess(): void {
		$this->request
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);
		$share = $this->getValidShareMock(self::DEFAULT_TOKEN);
		$share
			->method('getShareOwner')
			->willReturn('Alice');
		$share
			->method('getSharedBy')
			->willReturn('Bob');

		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
			->willReturn($share);

		$this->fedShareManager->expects($this->once())
			->method('declineShare');

		$response = $this->requestHandlerController->declineShare(2);
		self::assertEquals(
			Http::STATUS_CONTINUE,
			$response->getStatusCode()
		);
	}

	public function testDeclineFailedWhenInvalidShareId(): void {
		$this->request
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);

		$this->ocmMiddleware->method('getValidShare')
			->willThrowException(new BadRequestException());

		$this->fedShareManager->expects($this->never())
			->method('declineShare');

		$response = $this->requestHandlerController->declineShare(2);
		self::assertEquals(
			Http::STATUS_GONE,
			$response->getStatusCode()
		);
	}

	public function testDeclineFailedWhenShareIdHasInvalidSecret(): void {
		$this->request
			->method('getParam')
			->willReturn(self::DEFAULT_TOKEN);

		$this->ocmMiddleware->method('getValidShare')
			->willThrowException(new ForbiddenException());

		$this->fedShareManager->expects($this->never())
			->method('declineShare');

		$response = $this->requestHandlerController->declineShare(2);
		self::assertEquals(
			Http::STATUS_FORBIDDEN,
			$response->getStatusCode()
		);
	}

	public function testUnshareFailedWhenSharingIsDisabled(): void {
		$this->ocmMiddleware->method('assertOutgoingSharingEnabled')
			->willThrowException(new NotImplementedException());
		$this->fedShareManager->expects($this->never())
			->method('unshare');
		$response = $this->requestHandlerController->unshare(2);
		self::assertEquals(
			Http::STATUS_SERVICE_UNAVAILABLE,
			$response->getStatusCode()
		);
	}

	public function testUpdatePermissions(): void {
		$requestMap = [
			['token', null, self::DEFAULT_TOKEN],
			['permissions', null, Constants::PERMISSION_READ | Constants::PERMISSION_UPDATE]
		];
		$this->request
			->method('getParam')
			->willReturnMap(
				$requestMap
			);
		$share = $this->getValidShareMock(self::DEFAULT_TOKEN);
		$share
			->method('getPermissions')
			->willReturn(Constants::PERMISSION_SHARE);
		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
			->willReturn($share);
		$this->fedShareManager->expects($this->once())
			->method('isFederatedReShare')
			->willReturn(true);
		$this->requestHandlerController->updatePermissions(5);
	}

	protected function getValidShareMock($token) {
		$share = $this->getMockBuilder(IShare::class)
			->disableOriginalConstructor()->getMock();
		$share
			->method('getToken')
			->willReturn($token);
		$share
			->method('getShareType')
			->willReturn(FederatedShareProvider::SHARE_TYPE_REMOTE);
		return $share;
	}
}
