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
use OCA\FederatedFileSharing\DiscoveryManager;
use OCA\FederatedFileSharing\FederatedShareProvider;
use OCA\FederatedFileSharing\FedShareManager;
use OCA\FederatedFileSharing\Controller\RequestHandlerController;
use  OCA\FederatedFileSharing\Tests\TestCase;
use OCP\Share\IShare;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class RequestHandlerControllerTest
 *
 * @package OCA\FederatedFileSharing\Tests
 * @group DB
 */
class RequestHandlerTest extends TestCase {
	const TEST_FOLDER_NAME = '/folder_share_api_test';

	/**
	 * @var \OCP\IDBConnection
	 */
	private $connection;

	/**
	 * @var RequestHandlerController
	 */
	private $s2s;

	/** @var  \OCA\FederatedFileSharing\FederatedShareProvider | PHPUnit_Framework_MockObject_MockObject */
	private $federatedShareProvider;

	/** @var  \OCA\FederatedFileSharing\Notifications | PHPUnit_Framework_MockObject_MockObject */
	private $notifications;

	/** @var  \OCA\FederatedFileSharing\AddressHandler | PHPUnit_Framework_MockObject_MockObject */
	private $addressHandler;

	/** @var  FedShareManager | \PHPUnit_Framework_MockObject_MockObject */
	private $fedShareManager;

	/** @var  IShare | \PHPUnit_Framework_MockObject_MockObject */
	private $share;

	/** @var HTTPHelper */
	private $oldHttpHelper;

	protected function setUp() {
		parent::setUp();

		self::loginHelper(self::TEST_FILES_SHARING_API_USER1);
		\OCP\Share::registerBackend('test', 'Test\Share\Backend');

		$config = $this->getMockBuilder('\OCP\IConfig')
				->disableOriginalConstructor()->getMock();
		$clientService = $this->createMock('\OCP\Http\Client\IClientService');
		$httpHelperMock = $this->getMockBuilder('\OC\HTTPHelper')
				->setConstructorArgs([$config, $clientService])
				->getMock();
		$httpHelperMock->expects($this->any())->method('post')->with($this->anything())->will($this->returnValue(true));
		$this->share = $this->createMock('\OCP\Share\IShare');
		$this->federatedShareProvider = $this->getMockBuilder('OCA\FederatedFileSharing\FederatedShareProvider')
			->disableOriginalConstructor()->getMock();
		$this->federatedShareProvider->expects($this->any())
			->method('isOutgoingServer2serverShareEnabled')->willReturn(true);
		$this->federatedShareProvider->expects($this->any())
			->method('isIncomingServer2serverShareEnabled')->willReturn(true);
		$this->federatedShareProvider->expects($this->any())->method('getShareById')
			->willReturn($this->share);

		$this->notifications = $this->getMockBuilder('OCA\FederatedFileSharing\Notifications')
			->disableOriginalConstructor()->getMock();
		$this->addressHandler = $this->getMockBuilder('OCA\FederatedFileSharing\AddressHandler')
			->disableOriginalConstructor()->getMock();
		$this->fedShareManager = $this->createMock(FedShareManager::class);

		$this->registerHttpHelper($httpHelperMock);

		$this->s2s = new RequestHandlerController(
			'federatedfilesharing',
			\OC::$server->getRequest(),
			$this->federatedShareProvider,
			\OC::$server->getDatabaseConnection(),
			$this->notifications,
			$this->addressHandler,
			$this->fedShareManager,
			\OC::$server->getEventDispatcher()
		);

		$this->connection = \OC::$server->getDatabaseConnection();
	}

	protected function tearDown() {
		$query = \OCP\DB::prepare('DELETE FROM `*PREFIX*share_external`');
		$query->execute();

		$query = \OCP\DB::prepare('DELETE FROM `*PREFIX*share`');
		$query->execute();

		$this->restoreHttpHelper();

		parent::tearDown();
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
	 * @medium
	 */
	public function testCreateShare() {
		// simulate a post request
		$_POST['remote'] = 'localhost';
		$_POST['token'] = 'token';
		$_POST['name'] = 'name';
		$_POST['owner'] = 'owner';
		$_POST['shareWith'] = self::TEST_FILES_SHARING_API_USER2;
		$_POST['remoteId'] = 1;

		$called = [];
		\OC::$server->getEventDispatcher()->addListener('\OCA\FederatedFileSharing::remote_shareReceived', function ($event) use (&$called) {
			$called[] = '\OCA\FederatedFileSharing::remote_shareReceived';
			\array_push($called, $event);
		});

		$result = $this->s2s->createShare();

		$this->assertInstanceOf(GenericEvent::class, $called[1]);

		$this->assertTrue($result->succeeded());

		$query = \OCP\DB::prepare('SELECT * FROM `*PREFIX*share_external` WHERE `remote_id` = ?');
		$result = $query->execute(['1']);
		$data = $result->fetchRow();

		$this->assertSame('localhost', $data['remote']);
		$this->assertSame('token', $data['share_token']);
		$this->assertSame('/name', $data['name']);
		$this->assertSame('owner', $data['owner']);
		$this->assertSame(self::TEST_FILES_SHARING_API_USER2, $data['user']);
		$this->assertSame(1, (int)$data['remote_id']);
		$this->assertSame(0, (int)$data['accepted']);
	}

	public function testDeclineShare() {
		$this->s2s = $this->getMockBuilder(RequestHandlerController::class)
			->setConstructorArgs(
				[
					'federatedfilesharing',
					\OC::$server->getRequest(),
					$this->federatedShareProvider,
					\OC::$server->getDatabaseConnection(),
					$this->notifications,
					$this->addressHandler,
					$this->fedShareManager,
					\OC::$server->getEventDispatcher()
				]
			)->setMethods(['executeDeclineShare', 'verifyShare'])->getMock();

		$this->fedShareManager->expects($this->once())->method('declineShare');

		$this->s2s->expects($this->any())->method('verifyShare')->willReturn(true);

		$_POST['token'] = 'token';

		$this->s2s->declineShare(42);
	}

	public function XtestDeclineShareMultiple() {
		$this->share->expects($this->any())->method('verifyShare')->willReturn(true);

		$dummy = \OCP\DB::prepare('
			INSERT INTO `*PREFIX*share`
			(`share_type`, `uid_owner`, `item_type`, `item_source`, `item_target`, `file_source`, `file_target`, `permissions`, `stime`, `token`, `share_with`)
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
			');
		$dummy->execute([\OCP\Share::SHARE_TYPE_REMOTE, self::TEST_FILES_SHARING_API_USER1, 'test', '1', '/1', '1', '/test.txt', '1', \time(), 'token1', 'foo@bar']);
		$dummy->execute([\OCP\Share::SHARE_TYPE_REMOTE, self::TEST_FILES_SHARING_API_USER1, 'test', '1', '/1', '1', '/test.txt', '1', \time(), 'token2', 'bar@bar']);

		$verify = \OCP\DB::prepare('SELECT * FROM `*PREFIX*share`');
		$result = $verify->execute();
		$data = $result->fetchAll();
		$this->assertCount(2, $data);

		$_POST['token'] = 'token1';
		$this->s2s->declineShare($data[0]['id']);

		$verify = \OCP\DB::prepare('SELECT * FROM `*PREFIX*share`');
		$result = $verify->execute();
		$data = $result->fetchAll();
		$this->assertCount(1, $data);
		$this->assertEquals('bar@bar', $data[0]['share_with']);

		$_POST['token'] = 'token2';
		$this->s2s->declineShare($data[0]['id']);

		$verify = \OCP\DB::prepare('SELECT * FROM `*PREFIX*share`');
		$result = $verify->execute();
		$data = $result->fetchAll();
		$this->assertEmpty($data);
	}

	/**
	 * @dataProvider dataTestDeleteUser
	 */
	public function testDeleteUser($toDelete, $expected, $remainingUsers) {
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
}
