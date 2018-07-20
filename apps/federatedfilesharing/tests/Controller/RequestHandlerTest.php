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

use OC\Files\Filesystem;
use OC\HTTPHelper;
use OCA\FederatedFileSharing\AddressHandler;
use OCA\FederatedFileSharing\DiscoveryManager;
use OCA\FederatedFileSharing\FederatedShareProvider;
use OCA\FederatedFileSharing\FedShareManager;
use OCA\FederatedFileSharing\Notifications;
use OCA\FederatedFileSharing\Controller\RequestHandlerController;
use OCA\FederatedFileSharing\Tests\TestCase;
use OCP\App\IAppManager;
use OCP\AppFramework\Http;
use OCP\IDBConnection;
use OCP\IRequest;
use OCP\IUserManager;
use OCP\Share\IShare;

/**
 * Class RequestHandlerControllerTest
 *
 * @package OCA\FederatedFileSharing\Tests
 * @group DB
 */
class RequestHandlerTest extends TestCase {
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

	/**
	 * @var IUserManager | \PHPUnit_Framework_MockObject_MockObject
	 */
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
	 * @var RequestHandlerController
	 */
	private $requestHandlerController;

	/**
	 * @var RequestHandlerController
	 */
	private $s2s;

	/** @var  IShare | \PHPUnit_Framework_MockObject_MockObject */
	private $share;

	/** @var HTTPHelper */
	private $oldHttpHelper;

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
		$this->requestHandlerController = new RequestHandlerController(
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

		/* TODO: Kill everything below this line ;) */

		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);
		\OCP\Share::registerBackend('test', 'Test\Share\Backend');

		$config = $this->getMockBuilder('\OCP\IConfig')
				->disableOriginalConstructor()->getMock();
		$clientService = $this->createMock('\OCP\Http\Client\IClientService');
		$httpHelperMock = $this->getMockBuilder('\OC\HTTPHelper')
				->setConstructorArgs([$config, $clientService])
				->getMock();
		$httpHelperMock->expects($this->any())->method('post')->with($this->anything())->will($this->returnValue(true));

		$this->registerHttpHelper($httpHelperMock);
		$this->connection = \OC::$server->getDatabaseConnection();
		$this->s2s = new RequestHandlerController(
			'federatedfilesharing',
			\OC::$server->getRequest(),
			$this->federatedShareProvider,
			\OC::$server->getDatabaseConnection(),
			$this->appManager,
			$this->userManager,
			$this->notifications,
			$this->addressHandler,
			$this->fedShareManager
		);
	}

	protected function tearDown() {
		$query = \OCP\DB::prepare('DELETE FROM `*PREFIX*share_external`');
		$query->execute();

		$query = \OCP\DB::prepare('DELETE FROM `*PREFIX*share`');
		$query->execute();

		$this->restoreHttpHelper();

		parent::tearDown();
	}

	public function testShareIsNotCreatedWhenSharingIsDisabled() {
		$this->expectFileSharingApp('disabled');
		$this->fedShareManager->expects($this->never())
			->method('createShare');
		$response = $this->requestHandlerController->createShare();
		$this->assertEquals(
			Http::STATUS_SERVICE_UNAVAILABLE,
			$response->getStatusCode()
		);
	}

	public function testShareIsNotCreatedWhenIncomingSharingIsDisabled() {
		$this->expectFileSharingApp('enabled');
		$this->expectIncomingSharing('disabled');
		$response = $this->requestHandlerController->createShare();
		$this->assertEquals(
			Http::STATUS_SERVICE_UNAVAILABLE,
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
			->willReturn('abc');
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

	/**
	 * Register an http helper mock for testing purposes.
	 * @param $httpHelper http helper mock
	 */
	private function registerHttpHelper($httpHelper) {
		$this->oldHttpHelper = \OC::$server->query('HTTPHelper');
		\OC::$server->registerService('HTTPHelper', function ($c) use ($httpHelper) {
			return $httpHelper;
		});
	}

	/**
	 * Restore the original http helper
	 */
	private function restoreHttpHelper() {
		$oldHttpHelper = $this->oldHttpHelper;
		\OC::$server->registerService('HTTPHelper', function ($c) use ($oldHttpHelper) {
			return $oldHttpHelper;
		});
	}

	/**
	 * @dataProvider dataTestDeleteUser
	 */
	public function testDeleteUser($toDelete, $expected, $remainingUsers) {
		$this->share = $this->createMock('\OCP\Share\IShare');
		$this->federatedShareProvider->expects($this->any())
			->method('isOutgoingServer2serverShareEnabled')->willReturn(true);
		$this->federatedShareProvider->expects($this->any())
			->method('isIncomingServer2serverShareEnabled')->willReturn(true);
		$this->federatedShareProvider->expects($this->any())->method('getShareById')
			->willReturn($this->share);
		$this->createDummyS2SShares();

		$discoveryManager = new DiscoveryManager(
			\OC::$server->getMemCacheFactory(),
			\OC::$server->getHTTPClientService()
		);
		$manager = new \OCA\Files_Sharing\External\Manager(
			\OC::$server->getDatabaseConnection(),
			Filesystem::getMountManager(),
			Filesystem::getLoader(),
			\OC::$server->getNotificationManager(),
			\OC::$server->getEventDispatcher(),
			$toDelete
		);

		$manager->removeUserShares($toDelete);

		$query = $this->connection->prepare('SELECT `user` FROM `*PREFIX*share_external`');
		$query->execute();
		$result = $query->fetchAll();

		foreach ($result as $r) {
			$remainingShares[$r['user']] = isset($remainingShares[$r['user']]) ? $remainingShares[$r['user']] + 1 : 1;
		}

		$this->assertCount($remainingUsers, $remainingShares);

		foreach ($expected as $key => $value) {
			if ($key === $toDelete) {
				$this->assertArrayNotHasKey($key, $remainingShares);
			} else {
				$this->assertSame($value, $remainingShares[$key]);
			}
		}
	}

	public function dataTestDeleteUser() {
		return [
			['user1', ['user1' => 0, 'user2' => 3, 'user3' => 3], 2],
			['user2', ['user1' => 4, 'user2' => 0, 'user3' => 3], 2],
			['user3', ['user1' => 4, 'user2' => 3, 'user3' => 0], 2],
			['user4', ['user1' => 4, 'user2' => 3, 'user3' => 3], 3],
		];
	}

	private function createDummyS2SShares() {
		$query = $this->connection->prepare('
			INSERT INTO `*PREFIX*share_external`
			(`remote`, `share_token`, `password`, `name`, `owner`, `user`, `mountpoint`, `mountpoint_hash`, `remote_id`, `accepted`)
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
			');

		$users = ['user1', 'user2', 'user3'];

		for ($i = 0; $i < 10; $i++) {
			$user = $users[$i%3];
			$query->execute(['remote', 'token', 'password', 'name', 'owner', $user, 'mount point', $i, $i, 0]);
		}

		$query = $this->connection->prepare('SELECT `id` FROM `*PREFIX*share_external`');
		$query->execute();
		$dummyEntries = $query->fetchAll();

		$this->assertCount(10, $dummyEntries);
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
