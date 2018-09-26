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

namespace OCA\FederatedFileSharing\Tests\Controller;

use OCA\FederatedFileSharing\AddressHandler;
use OCA\FederatedFileSharing\FederatedShareProvider;
use OCA\FederatedFileSharing\FedShareManager;
use OCA\FederatedFileSharing\Controller\OcmController;
use OCA\FederatedFileSharing\Middleware\OcmMiddleware;
use OCA\FederatedFileSharing\Ocm\Exception\BadRequestException;
use OCA\FederatedFileSharing\Ocm\Exception\ForbiddenException;
use OCA\FederatedFileSharing\Ocm\Exception\NotImplementedException;
use OCA\FederatedFileSharing\Ocm\Notification\FileNotification;
use OCA\FederatedFileSharing\Tests\TestCase;
use OCP\App\IAppManager;
use OCP\AppFramework\Http;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\IUserManager;
use OCP\Share\IShare;

/**
 * Class OcmControllerTest
 *
 * @package OCA\FederatedFileSharing\Tests
 * @group DB
 */
class OcmControllerTest extends TestCase {
	/**
	 * @var IRequest | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $request;

	/**
	 * @var OcmMiddleware | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $ocmMiddleware;

	/**
	 * @var IURLGenerator | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $urlGenerator;

	/**
	 * @var IAppManager | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $appManager;

	/**
	 * @var IUserManager | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $userManager;

	/**
	 * @var AddressHandler | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $addressHandler;

	/**
	 * @var FedShareManager | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $fedShareManager;

	/**
	 * @var ILogger | \PHPUnit_Framework_MockObject_MockObject
	 */
	private $logger;

	/**
	 * @var OcmController
	 */
	private $ocmController;

	/**
	 * @var string
	 */
	private $shareToken = 'abc';

	protected function setUp() {
		parent::setUp();

		$this->request = $this->createMock(IRequest::class);
		$this->ocmMiddleware = $this->createMock(OcmMiddleware::class);
		$this->urlGenerator = $this->createMock(IURLGenerator::class);
		$this->appManager = $this->createMock(IAppManager::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->addressHandler = $this->createMock(AddressHandler::class);
		$this->fedShareManager = $this->createMock(FedShareManager::class);
		$this->logger = $this->createMock(ILogger::class);

		$this->ocmController = new OcmController(
			'federatedfilesharing',
			$this->request,
			$this->ocmMiddleware,
			$this->urlGenerator,
			$this->userManager,
			$this->addressHandler,
			$this->fedShareManager,
			$this->logger
		);
	}

	public function testDiscovery() {
		$response = $this->ocmController->discovery();
		$this->assertArrayHasKey('apiVersion', $response);
		$this->assertEquals(OcmController::API_VERSION, $response['apiVersion']);
	}

	public function testShareIsNotCreatedWhenSharingIsDisabled() {
		$this->ocmMiddleware->method('assertIncomingSharingEnabled')
			->willThrowException(new NotImplementedException());
		$response = $this->ocmController->createShare(
			'bob@localhost',
			'example.txt',
			'just a file',
			'70',
			null,
			'incognito',
			'sender@remote',
			'some sender',
			'user',
			FileNotification::RESOURCE_TYPE_FILE,
			[
				'options' => [
					'sharedSecret' => ''
				]
			]
		);
		$this->assertEquals(Http::STATUS_NOT_IMPLEMENTED, $response->getStatus());
	}

	public function testCreateShareWithMissingParam() {
		$response = $this->ocmController->createShare(
			'bob@localhost',
			'example.txt',
			'just a file',
			'70',
			null,
			'incognito',
			'sender@remote',
			'some sender',
			'user',
			FileNotification::RESOURCE_TYPE_FILE,
			[
				'options' => [
					'sharedSecret' => ''
				]
			]
		);
		$this->assertEquals(Http::STATUS_BAD_REQUEST, $response->getStatus());
	}

	public function testCreateShareForNotExistingUser() {
		$this->userManager->expects($this->once())
			->method('userExists')
			->with('bob')
			->willReturn(false);
		$response = $this->ocmController->createShare(
			'bob@localhost',
			'example.txt',
			'just a file',
			'70',
			'steve@another',
			'incognito',
			'sender@remote',
			'some sender',
			'user',
			FileNotification::RESOURCE_TYPE_FILE,
			[
				'name' => 'webdav',
				'options' => [
					'sharedSecret' => ''
				]
			]
		);
		$this->assertEquals(Http::STATUS_BAD_REQUEST, $response->getStatus());
	}

	public function testCreateShareException() {
		$this->userManager->expects($this->once())
			->method('userExists')
			->with('bob')
			->willReturn(true);

		$this->fedShareManager->expects($this->once())
			->method('createShare')
			->willThrowException(new \Exception('blocked by test'));

		$response = $this->ocmController->createShare(
			'bob@localhost',
			'example.txt',
			'just a file',
			'70',
			'steve@another',
			'incognito',
			'sender@remote',
			'some sender',
			'user',
			FileNotification::RESOURCE_TYPE_FILE,
			[
				'name' => 'webdav',
				'options' => [
					'sharedSecret' => ''
				]
			]
		);
		$this->assertEquals(
			Http::STATUS_INTERNAL_SERVER_ERROR,
			$response->getStatus()
		);
	}

	public function testCreateShareSuccess() {
		$this->userManager->expects($this->once())
			->method('userExists')
			->with('bob')
			->willReturn(true);

		$this->fedShareManager->expects($this->once())
			->method('createShare')
			->willReturn(null);

		$response = $this->ocmController->createShare(
			'bob@localhost',
			'example.txt',
			'just a file',
			'70',
			'steve@another',
			'incognito',
			'sender@remote',
			'some sender',
			'user',
			FileNotification::RESOURCE_TYPE_FILE,
			[
				'name' => 'webdav',
				'options' => [
					'sharedSecret' => ''
				]
			]
		);
		$this->assertEquals(
			Http::STATUS_CREATED,
			$response->getStatus()
		);
	}

	public function testProcessNotificationWithMissingParam() {
		$this->ocmMiddleware->expects($this->once())
			->method('assertNotNull')
			->willThrowException(new BadRequestException());
		$response = $this->ocmController->processNotification(
			FileNotification::NOTIFICATION_TYPE_SHARE_ACCEPTED,
			FileNotification::RESOURCE_TYPE_FILE,
			null,
			[]
		);
		$this->assertEquals(Http::STATUS_BAD_REQUEST, $response->getStatus());
	}

	public function testProcessUnknownFileNotificationType() {
		$response = $this->ocmController->processNotification(
			'something strange',
			FileNotification::RESOURCE_TYPE_FILE,
			'90',
			[
				'sharedSecret' => $this->shareToken
			]
		);
		$this->assertEquals(Http::STATUS_NOT_IMPLEMENTED, $response->getStatus());
	}

	public function testProcessAcceptShareNotificationForInvalidShare() {
		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
			->willThrowException(new ForbiddenException());

		$response = $this->ocmController->processNotification(
			FileNotification::NOTIFICATION_TYPE_SHARE_ACCEPTED,
			FileNotification::RESOURCE_TYPE_FILE,
			'90',
			[
				'sharedSecret' => "broken{$this->shareToken}"
			]
		);
		$this->assertEquals(Http::STATUS_FORBIDDEN, $response->getStatus());
	}

	public function testProcessAcceptShareSuccess() {
		$shareMock = $this->getValidShareMock($this->shareToken);
		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
			->willReturn($shareMock);

		$response = $this->ocmController->processNotification(
			FileNotification::NOTIFICATION_TYPE_SHARE_ACCEPTED,
			FileNotification::RESOURCE_TYPE_FILE,
			'90',
			[
				'sharedSecret' => $this->shareToken
			]
		);
		$this->assertEquals(Http::STATUS_CREATED, $response->getStatus());
	}

	public function testProcessDeclineShareNotificationForInvalidShare() {
		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
			->willThrowException(new ForbiddenException());

		$response = $this->ocmController->processNotification(
			FileNotification::NOTIFICATION_TYPE_SHARE_DECLINED,
			FileNotification::RESOURCE_TYPE_FILE,
			'90',
			[
				'sharedSecret' => "broken{$this->shareToken}"
			]
		);
		$this->assertEquals(Http::STATUS_FORBIDDEN, $response->getStatus());
	}

	public function testProcessDeclineShareSuccess() {
		$shareMock = $this->getValidShareMock($this->shareToken);
		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
			->willReturn($shareMock);

		$response = $this->ocmController->processNotification(
			FileNotification::NOTIFICATION_TYPE_SHARE_DECLINED,
			FileNotification::RESOURCE_TYPE_FILE,
			'90',
			[
				'sharedSecret' => $this->shareToken
			]
		);
		$this->assertEquals(Http::STATUS_CREATED, $response->getStatus());
	}

	public function testReShareUndoSuccess() {
		$shareMock = $this->getValidShareMock($this->shareToken);
		$this->ocmMiddleware->expects($this->once())
			->method('getValidShare')
			->willReturn($shareMock);

		$response = $this->ocmController->processNotification(
			FileNotification::NOTIFICATION_TYPE_RESHARE_UNDO,
			FileNotification::RESOURCE_TYPE_FILE,
			'90',
			[
				'sharedSecret' => $this->shareToken
			]
		);
		$this->assertEquals(Http::STATUS_CREATED, $response->getStatus());
	}

	protected function getValidShareMock($token) {
		$share = $this->createMock(IShare::class);
		$share->expects($this->any())
			->method('getToken')
			->willReturn($token);
		$share->expects($this->any())
			->method('getShareType')
			->willReturn(FederatedShareProvider::SHARE_TYPE_REMOTE);
		return $share;
	}
}
