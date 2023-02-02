<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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
namespace OCA\FederatedFileSharing\Tests;

use Doctrine\DBAL\Driver\Statement;
use OCA\FederatedFileSharing\Address;
use OCA\FederatedFileSharing\AddressHandler;
use OCA\FederatedFileSharing\FederatedShareProvider;
use OCA\FederatedFileSharing\Notifications;
use OCA\FederatedFileSharing\TokenHandler;
use OCP\DB\QueryBuilder\IExpressionBuilder;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\Files\File;
use OCP\Files\IRootFolder;
use OCP\IConfig;
use OCP\IDBConnection;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IUserManager;
use OCP\Share;
use OCP\Share\IManager;
use OCP\Share\IShare;
use OCP\Files\Folder;
use OCP\IUser;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class FederatedShareProviderTest
 *
 * @package OCA\FederatedFileSharing\Tests
 * @group DB
 */
class FederatedShareProviderTest extends \Test\TestCase {
	protected const OCS_GENERIC_SUCCESS = ['ocs' => ['meta' => [ 'status' => 'success']]];

	/** @var IDBConnection */
	protected $connection;
	/** @var EventDispatcherInterface */
	protected $eventDispatcher;
	/** @var AddressHandler | MockObject */
	protected $addressHandler;
	/** @var Notifications | MockObject */
	protected $notifications;
	/** @var TokenHandler */
	protected $tokenHandler;
	/** @var IL10N */
	protected $l;
	/** @var ILogger */
	protected $logger;
	/** @var IRootFolder | MockObject */
	protected $rootFolder;
	/** @var  IConfig | MockObject */
	protected $config;
	/** @var  IUserManager | MockObject */
	protected $userManager;

	/** @var IManager */
	protected $shareManager;
	/** @var FederatedShareProvider */
	protected $provider;

	/** @var File|MockObject */
	protected $defaultNode;

	public function setUp(): void {
		parent::setUp();

		$this->defaultNode = $this->getFileMock();
		$this->connection = \OC::$server->getDatabaseConnection();
		$this->eventDispatcher = $this->getMockBuilder(EventDispatcherInterface::class)
			->disableOriginalConstructor()
			->getMock();
		$this->notifications = $this->createMock(Notifications::class);
		$this->tokenHandler = $this->createMock(TokenHandler::class);
		$this->l = $this->createMock(IL10N::class);
		$this->l->method('t')
			->will($this->returnCallback(function ($text, $parameters = []) {
				return \vsprintf($text, $parameters);
			}));
		$this->logger = $this->createMock(ILogger::class);
		$this->rootFolder = $this->createMock(IRootFolder::class);
		$this->config = $this->createMock(IConfig::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->addressHandler = $this->createMock(AddressHandler::class);

		$this->provider = new FederatedShareProvider(
			$this->connection,
			$this->eventDispatcher,
			$this->addressHandler,
			$this->notifications,
			$this->tokenHandler,
			$this->l,
			$this->logger,
			$this->rootFolder,
			$this->config,
			$this->userManager
		);

		$this->shareManager = \OC::$server->getShareManager();
	}

	public function tearDown(): void {
		$this->connection->getQueryBuilder()->delete('share')->execute();
		$this->connection->getQueryBuilder()->delete('filecache')->execute();

		parent::tearDown();
	}

	public function getShareByIdNotExistProvider() {
		return [
			[1],
			[0],
			[-1],
			[42.42],
			["text"],
			["123text"],
		];
	}

	/**
	 * @dataProvider getShareByIdNotExistProvider
	 */
	public function testGetShareByIdNotExist($shareId) {
		$this->expectException(\OCP\Share\Exceptions\ShareNotFound::class);

		$this->provider->getShareById($shareId);
	}

	public function testCreate() {
		$share = $this->shareManager->newShare();
		$share->setSharedWith('user@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($this->defaultNode);

		$this->tokenHandler->method('generateToken')->willReturn('token');

		$shareWithAddress = new Address('user@server.com');
		$ownerAddress = new Address('shareOwner@http://localhost/');
		$sharedByAddress = new Address('sharedBy@http://localhost/');
		$this->addressHandler->expects($this->any())->method('getLocalUserFederatedAddress')
			->will($this->onConsecutiveCalls($ownerAddress, $sharedByAddress, $ownerAddress));

		$this->addressHandler->expects($this->any())->method('splitUserRemote')
			->willReturn(['user', 'server.com']);

		$this->notifications->expects($this->once())
			->method('sendRemoteShare')
			->with(
				$this->equalTo($shareWithAddress),
				$this->equalTo($ownerAddress),
				$this->equalTo($sharedByAddress),
				$this->equalTo('token'),
				$this->equalTo('myFile'),
				$this->anything()
			)->willReturn(self::OCS_GENERIC_SUCCESS);

		$this->rootFolder->expects($this->never())->method($this->anything());
		$this->userManager->method('userExists')->willReturn(true);

		$share = $this->provider->create($share);

		$qb = $this->connection->getQueryBuilder();
		$stmt = $qb->select('*')
			->from('share')
			->where($qb->expr()->eq('id', $qb->createNamedParameter($share->getId())))
			->execute();

		$fetchedData = $stmt->fetch();
		$stmt->closeCursor();

		$expectedSubset = [
			'share_type' => Share::SHARE_TYPE_REMOTE,
			'share_with' => 'user@server.com',
			'uid_owner' => 'shareOwner',
			'uid_initiator' => 'sharedBy',
			'item_type' => 'file',
			'item_source' => 42,
			'file_source' => 42,
			'permissions' => 19,
			'accepted' => 0,
			'token' => 'token',
		];
		foreach ($expectedSubset as $key => $value) {
			$this->assertArrayHasKey($key, $fetchedData);
			$this->assertEquals($value, $fetchedData[$key]);
		}

		$this->assertEquals($fetchedData['id'], $share->getId());
		$this->assertEquals(Share::SHARE_TYPE_REMOTE, $share->getShareType());
		$this->assertEquals('user@server.com', $share->getSharedWith());
		$this->assertEquals('sharedBy', $share->getSharedBy());
		$this->assertEquals('shareOwner', $share->getShareOwner());
		$this->assertEquals('file', $share->getNodeType());
		$this->assertEquals(42, $share->getNodeId());
		$this->assertEquals(19, $share->getPermissions());
		$this->assertEquals('token', $share->getToken());
	}

	public function testCreateWithExpiration() {
		$expirationDate = new \DateTime('2222-11-11');

		$share = $this->shareManager->newShare();

		$share->setSharedWith('user@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setExpirationDate($expirationDate)
			->setNode($this->defaultNode);

		$this->tokenHandler->method('generateToken')->willReturn('token');

		$shareWithAddress = new Address('user@server.com');
		$ownerAddress = new Address('shareOwner@http://localhost/');
		$sharedByAddress = new Address('sharedBy@http://localhost/');
		$this->addressHandler->expects($this->any())->method('getLocalUserFederatedAddress')
			->will($this->onConsecutiveCalls($ownerAddress, $sharedByAddress, $ownerAddress));

		$this->addressHandler->expects($this->any())->method('splitUserRemote')
			->willReturn(['user', 'server.com']);

		$this->notifications->expects($this->once())
			->method('sendRemoteShare')
			->with(
				$this->equalTo($shareWithAddress),
				$this->equalTo($ownerAddress),
				$this->equalTo($sharedByAddress),
				$this->equalTo('token'),
				$this->equalTo('myFile'),
				$this->anything()
			)->willReturn(self::OCS_GENERIC_SUCCESS);

		$this->rootFolder->expects($this->never())->method($this->anything());
		$this->userManager->method('userExists')->willReturn(true);

		$share = $this->provider->create($share);

		$qb = $this->connection->getQueryBuilder();
		$stmt = $qb->select('*')
			->from('share')
			->where($qb->expr()->eq('id', $qb->createNamedParameter($share->getId())))
			->execute();

		$fetchedData = $stmt->fetch();
		$stmt->closeCursor();

		$this->assertEquals($fetchedData['id'], $share->getId());
		$this->assertEquals(\OCP\Share::SHARE_TYPE_REMOTE, $share->getShareType());
		$this->assertEquals('user@server.com', $share->getSharedWith());
		$this->assertEquals('sharedBy', $share->getSharedBy());
		$this->assertEquals('shareOwner', $share->getShareOwner());
		$this->assertEquals('file', $share->getNodeType());
		$this->assertEquals(42, $share->getNodeId());
		$this->assertEquals(19, $share->getPermissions());
		$this->assertEquals($expirationDate->getTimestamp(), $share->getExpirationDate()->getTimestamp());
		$this->assertEquals('token', $share->getToken());
	}

	public function testCreateLegacy() {
		$share = $this->shareManager->newShare();
		$share->setSharedWith('user@server.com')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($this->defaultNode);

		$this->tokenHandler->method('generateToken')->willReturn('token');

		$shareWithAddress = new Address('user@server.com');
		$ownerAddress = new Address('shareOwner@http://localhost/');
		$sharedByAddress = new Address('sharedBy@http://localhost/');
		$this->addressHandler->expects($this->any())->method('getLocalUserFederatedAddress')
			->will($this->onConsecutiveCalls($ownerAddress, $sharedByAddress, $ownerAddress));

		$this->addressHandler->expects($this->any())->method('splitUserRemote')
			->willReturn(['user', 'server.com']);

		$this->notifications->expects($this->once())
			->method('sendRemoteShare')
			->with(
				$this->equalTo($shareWithAddress),
				$this->equalTo($ownerAddress),
				$this->equalTo($sharedByAddress),
				$this->equalTo('token'),
				$this->equalTo('myFile'),
				$this->anything()
			)->willReturn(self::OCS_GENERIC_SUCCESS);

		$folderOwner = $this->createMock(IUser::class);
		$folderOwner->method('getUID')->willReturn('folderOwner');
		$this->defaultNode->method('getOwner')->willReturn($folderOwner);

		$userFolder = $this->createMock(Folder::class);
		$userFolder->method('getById')
			->with(42, true)
			->willReturn([$this->defaultNode]);
		$this->rootFolder->expects($this->once())
			->method('getUserFolder')
			->with('shareOwner')
			->willReturn($userFolder);
		$this->userManager->method('userExists')->willReturn(true);

		$share = $this->provider->create($share);

		$qb = $this->connection->getQueryBuilder();
		$stmt = $qb->select('*')
			->from('share')
			->where($qb->expr()->eq('id', $qb->createNamedParameter($share->getId())))
			->execute();

		$fetchedData = $stmt->fetch();
		$stmt->closeCursor();

		$expectedSubset = [
			'share_type' => Share::SHARE_TYPE_REMOTE,
			'share_with' => 'user@server.com',
			'uid_owner' => 'shareOwner',
			'uid_initiator' => null,
			'item_type' => 'file',
			'item_source' => 42,
			'file_source' => 42,
			'permissions' => 19,
			'accepted' => 0,
			'token' => 'token',
		];
		foreach ($expectedSubset as $key => $value) {
			$this->assertArrayHasKey($key, $fetchedData);
			$this->assertEquals($value, $fetchedData[$key]);
		}

		$this->assertEquals($fetchedData['id'], $share->getId());
		$this->assertEquals(Share::SHARE_TYPE_REMOTE, $share->getShareType());
		$this->assertEquals('user@server.com', $share->getSharedWith());
		$this->assertEquals('shareOwner', $share->getSharedBy());
		$this->assertEquals('folderOwner', $share->getShareOwner());
		$this->assertEquals('file', $share->getNodeType());
		$this->assertEquals(42, $share->getNodeId());
		$this->assertEquals(19, $share->getPermissions());
		$this->assertEquals('token', $share->getToken());
	}

	public function testCreateCouldNotFindServer() {
		$share = $this->shareManager->newShare();
		$share->setSharedWith('user@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($this->defaultNode);

		$this->tokenHandler->method('generateToken')->willReturn('token');

		$this->addressHandler->expects($this->any())->method('splitUserRemote')
			->willReturn(['user', 'server.com']);

		$shareWithAddress = new Address('user@server.com');
		$ownerAddress = new Address('shareOwner@http://localhost/');
		$sharedByAddress = new Address('sharedBy@http://localhost/');
		$this->addressHandler->expects($this->any())->method('getLocalUserFederatedAddress')
			->will($this->onConsecutiveCalls($ownerAddress, $sharedByAddress, $ownerAddress));

		$this->notifications->expects($this->once())
			->method('sendRemoteShare')
			->with(
				$this->equalTo($shareWithAddress),
				$this->equalTo($ownerAddress),
				$this->equalTo($sharedByAddress),
				$this->equalTo('token'),
				$this->equalTo('myFile'),
				$this->anything()
			)->willReturn(false);

		$this->rootFolder->method('getById')
			->with('42')
			->willReturn([$this->defaultNode]);
		$this->userManager->method('userExists')->willReturn(true);

		try {
			$share = $this->provider->create($share);
			$this->fail();
		} catch (\Exception $e) {
			$this->assertEquals('Sharing myFile failed, could not find user@server.com, maybe the server is currently unreachable.', $e->getMessage());
		}

		$qb = $this->connection->getQueryBuilder();
		$stmt = $qb->select('*')
			->from('share')
			->where($qb->expr()->eq('id', $qb->createNamedParameter($share->getId())))
			->execute();

		$data = $stmt->fetch();
		$stmt->closeCursor();

		$this->assertFalse($data);
	}

	public function testCreateException() {
		$share = $this->shareManager->newShare();
		$share->setSharedWith('user@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($this->defaultNode);

		$this->tokenHandler->method('generateToken')->willReturn('token');
		$this->addressHandler->expects($this->any())->method('getLocalUserFederatedAddress')
			->willReturn(new Address('user@host'));

		$this->notifications->expects($this->once())
			->method('sendRemoteShare')
			->willThrowException(new \Exception('dummy'));

		$this->rootFolder->method('getById')
			->with('42')
			->willReturn([$this->defaultNode]);

		try {
			$share = $this->provider->create($share);
			$this->fail();
		} catch (\Exception $e) {
			$this->assertEquals('dummy', $e->getMessage());
		}

		$qb = $this->connection->getQueryBuilder();
		$stmt = $qb->select('*')
			->from('share')
			->where($qb->expr()->eq('id', $qb->createNamedParameter($share->getId())))
			->execute();

		$data = $stmt->fetch();
		$stmt->closeCursor();

		$this->assertFalse($data);
	}

	public function testCreateShareWithSelf() {
		$shareWith = 'sharedBy@localhost';
		$share = $this->shareManager->newShare();
		$share->setSharedWith($shareWith)
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($this->defaultNode);
		$this->addressHandler->expects($this->any())->method('getLocalUserFederatedAddress')
			->willReturn(new Address($shareWith));

		$this->rootFolder->expects($this->never())->method($this->anything());

		try {
			$share = $this->provider->create($share);
			$this->fail();
		} catch (\Exception $e) {
			$this->assertEquals('Not allowed to create a federated share with the same user', $e->getMessage());
		}

		$qb = $this->connection->getQueryBuilder();
		$stmt = $qb->select('*')
			->from('share')
			->where($qb->expr()->eq('id', $qb->createNamedParameter($share->getId())))
			->execute();

		$data = $stmt->fetch();
		$stmt->closeCursor();

		$this->assertFalse($data);
	}

	public function testCreateAlreadyShared() {
		$share = $this->shareManager->newShare();
		$share->setSharedWith('user@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($this->defaultNode);
		$this->addressHandler->expects($this->any())->method('splitUserRemote')
			->willReturn(['user', 'server.com']);

		$this->tokenHandler->method('generateToken')->willReturn('token');
		$shareWithAddress = new Address('user@server.com');
		$ownerAddress = new Address('shareOwner@http://localhost/');
		$sharedByAddress = new Address('sharedBy@http://localhost/');
		$this->addressHandler->expects($this->any())->method('getLocalUserFederatedAddress')
			->will($this->onConsecutiveCalls($ownerAddress, $sharedByAddress, $ownerAddress));

		$this->notifications->expects($this->once())
			->method('sendRemoteShare')
			->with(
				$this->equalTo($shareWithAddress),
				$this->equalTo($ownerAddress),
				$this->equalTo($sharedByAddress),
				$this->equalTo('token'),
				$this->equalTo('myFile'),
				$this->anything()
			)->willReturn(self::OCS_GENERIC_SUCCESS);

		$this->rootFolder->expects($this->never())->method($this->anything());
		$this->userManager->method('userExists')->willReturn(true);

		$this->provider->create($share);

		try {
			$this->provider->create($share);
		} catch (\Exception $e) {
			$this->assertEquals('Sharing myFile failed, because this item is already shared with user@server.com', $e->getMessage());
		}
	}

	/**
	 * @dataProvider dataTestUpdate
	 * @param string $owner
	 * @param string $sharedBy
	 * @param bool $isOwnerLocal
	 * @param bool $isSharerLocal
	 * @param bool $shouldUpdate
	 */
	public function testUpdate($owner, $sharedBy, $isOwnerLocal, $isSharerLocal, $shouldUpdate) {
		$this->provider = $this->getMockBuilder(FederatedShareProvider::class)
			->setConstructorArgs(
				[
					$this->connection,
					\OC::$server->getEventDispatcher(),
					$this->addressHandler,
					$this->notifications,
					$this->tokenHandler,
					$this->l,
					$this->logger,
					$this->rootFolder,
					$this->config,
					$this->userManager
				]
			)->setMethods(['sendPermissionUpdate'])->getMock();

		$share = $this->shareManager->newShare();
		$share->setSharedWith('user@server.com')
			->setSharedBy($sharedBy)
			->setShareOwner($owner)
			->setPermissions(19)
			->setNode($this->defaultNode);

		$this->addressHandler->expects($this->any())->method('splitUserRemote')
			->willReturn(['user', 'server.com']);

		$this->tokenHandler->method('generateToken')->willReturn('token');
		$shareWithAddress = new Address('user@server.com');
		$ownerAddress = new Address($owner);
		$sharedByAddress = new Address($sharedBy);

		if ($isSharerLocal) {
			$this->addressHandler->expects($this->any())->method('getLocalUserFederatedAddress')
				->will($this->onConsecutiveCalls($ownerAddress, $sharedByAddress, $ownerAddress));
		} else {
			$this->addressHandler->expects($this->any())->method('getLocalUserFederatedAddress')
				->will($this->onConsecutiveCalls($ownerAddress, $ownerAddress));
		}

		$this->notifications->expects($this->once())
			->method('sendRemoteShare')
			->with(
				$this->equalTo($shareWithAddress),
				$this->equalTo($ownerAddress),
				$this->equalTo($sharedByAddress),
				$this->equalTo('token'),
				$this->equalTo('myFile'),
				$this->anything()
			)->willReturn(self::OCS_GENERIC_SUCCESS);

		if ($shouldUpdate) {
			$this->provider->expects($this->once())->method('sendPermissionUpdate');
		} else {
			$this->provider->expects($this->never())->method('sendPermissionUpdate');
		}

		$this->rootFolder->expects($this->never())->method($this->anything());
		$this->userManager->method('userExists')
			->will(
				$this->returnValueMap(
					[
						[$owner, $isOwnerLocal],
						[$sharedBy, $isSharerLocal],
					]
				)
			);

		$share = $this->provider->create($share);

		$share->setPermissions(1);
		$expirationDate = new \DateTime('2222-11-11');
		$share->setExpirationDate($expirationDate);
		$this->provider->update($share);

		$share = $this->provider->getShareById($share->getId());

		$this->assertEquals(1, $share->getPermissions());
		$this->assertEquals($expirationDate->getTimestamp(), $share->getExpirationDate()->getTimestamp());
	}

	public function dataTestUpdate() {
		return [
			// IRL it is not possible to get both true and false from userManager->userExists for the same uid
			// so these cases are skipped
			['owner', 'owner', true, true, false], // no update: owner is the same with sharer
			['owner', 'sharer', true, true, false],  // no update: both owner and sharer are local
			['owner@remote', 'sharer', false, true, true],  // update: owner differs with sharer and owner is remote
			['owner', 'sharer@remote', true, false, true],  // update: owner differs with sharer and sharer is remote
			['owner@remote', 'sharer@remote', false, false, true],  // update: owner differs with sharer and both are remote
		];
	}

	public function testGetAllSharedWith() {
		$shares = $this->provider->getAllSharedWith('shared', null);
		$this->assertCount(0, $shares);
	}

	public function testGetAllSharesByNodes() {
		$this->tokenHandler->method('generateToken')->willReturn('token');
		$this->notifications
			->method('sendRemoteShare')
			->willReturn(self::OCS_GENERIC_SUCCESS);

		$this->rootFolder->expects($this->never())->method($this->anything());

		$share = $this->shareManager->newShare();
		$share->setSharedWith('user@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($this->defaultNode);
		$this->addressHandler->expects($this->any())->method('getLocalUserFederatedAddress')
			->willReturn(new Address('user@host'));
		$this->provider->create($share);

		$node2 = $this->getFileMock(43, 'myOtherFile');
		$share2 = $this->shareManager->newShare();
		$share2->setSharedWith('user@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($node2);
		$this->provider->create($share2);

		$shares = $this->provider->getAllSharesBy('sharedBy', [Share::SHARE_TYPE_REMOTE], [$node2->getId()], false);

		$this->assertCount(1, $shares);
		$this->assertEquals(43, $shares[0]->getNodeId());
	}

	public function testGetAllSharedByWithReshares() {
		$this->tokenHandler->method('generateToken')->willReturn('token');
		$this->notifications
			->method('sendRemoteShare')
			->willReturn(self::OCS_GENERIC_SUCCESS);

		$this->rootFolder->expects($this->never())->method($this->anything());

		$share = $this->shareManager->newShare();
		$share->setSharedWith('user@server.com')
			->setSharedBy('shareOwner')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($this->defaultNode);
		$this->addressHandler->expects($this->any())->method('getLocalUserFederatedAddress')
			->willReturn(new Address('user@host'));
		$this->provider->create($share);

		$share2 = $this->shareManager->newShare();
		$share2->setSharedWith('user2@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($this->defaultNode);
		$this->provider->create($share2);

		for ($i = 0; $i < 200; $i++) {
			$receiver = \strval($i)."user2@server.com";
			$share2 = $this->shareManager->newShare();
			$share2->setSharedWith(\strval($receiver))
				->setSharedBy('sharedBy')
				->setShareOwner('shareOwner')
				->setPermissions(19)
				->setNode($this->defaultNode);
			$this->provider->create($share2);
		}

		$shares = $this->provider->getAllSharesBy('shareOwner', [Share::SHARE_TYPE_REMOTE], [$this->defaultNode->getId()], true);

		$this->assertCount(202, $shares);
	}

	public function testGetSharedBy() {
		$this->tokenHandler->method('generateToken')->willReturn('token');
		$this->notifications
			->method('sendRemoteShare')
			->willReturn(self::OCS_GENERIC_SUCCESS);

		$this->rootFolder->expects($this->never())->method($this->anything());

		$share = $this->shareManager->newShare();
		$share->setSharedWith('user@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($this->defaultNode);
		$this->addressHandler->expects($this->any())->method('getLocalUserFederatedAddress')
			->willReturn(new Address('user@host'));
		$this->provider->create($share);

		$share2 = $this->shareManager->newShare();
		$share2->setSharedWith('user2@server.com')
			->setSharedBy('sharedBy2')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($this->defaultNode);
		$this->provider->create($share2);

		$shares = $this->provider->getSharesBy('sharedBy', Share::SHARE_TYPE_REMOTE, null, false, -1, 0);

		$this->assertCount(1, $shares);
		$this->assertEquals('user@server.com', $shares[0]->getSharedWith());
		$this->assertEquals('sharedBy', $shares[0]->getSharedBy());
	}

	public function testGetSharedByWithNode() {
		$this->tokenHandler->method('generateToken')->willReturn('token');
		$this->notifications
			->method('sendRemoteShare')
			->willReturn(self::OCS_GENERIC_SUCCESS);

		$this->rootFolder->expects($this->never())->method($this->anything());

		$share = $this->shareManager->newShare();
		$share->setSharedWith('user@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($this->defaultNode);
		$this->addressHandler->expects($this->any())->method('getLocalUserFederatedAddress')
			->willReturn(new Address('user@host'));
		$this->provider->create($share);

		$node2 = $this->getFileMock(43, 'myOtherFile');
		$share2 = $this->shareManager->newShare();
		$share2->setSharedWith('user@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($node2);
		$this->provider->create($share2);

		$shares = $this->provider->getSharesBy('sharedBy', Share::SHARE_TYPE_REMOTE, $node2, false, -1, 0);

		$this->assertCount(1, $shares);
		$this->assertEquals(43, $shares[0]->getNodeId());
	}

	public function testGetSharedByWithReshares() {
		$this->tokenHandler->method('generateToken')->willReturn('token');
		$this->notifications
			->method('sendRemoteShare')
			->willReturn(self::OCS_GENERIC_SUCCESS);

		$this->rootFolder->expects($this->never())->method($this->anything());

		$share = $this->shareManager->newShare();
		$share->setSharedWith('user@server.com')
			->setSharedBy('shareOwner')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($this->defaultNode);
		$this->addressHandler->expects($this->any())->method('getLocalUserFederatedAddress')
			->willReturn(new Address('user@host'));
		$this->provider->create($share);

		$share2 = $this->shareManager->newShare();
		$share2->setSharedWith('user2@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($this->defaultNode);
		$this->provider->create($share2);

		$shares = $this->provider->getSharesBy('shareOwner', Share::SHARE_TYPE_REMOTE, null, true, -1, 0);

		$this->assertCount(2, $shares);
	}

	public function testGetSharedByWithLimit() {
		$this->addressHandler->expects($this->any())->method('splitUserRemote')
			->willReturnCallback(function ($uid) {
				if ($uid === 'user@server.com') {
					return ['user', 'server.com'];
				}
				return ['user2', 'server.com'];
			});

		$this->tokenHandler->method('generateToken')->willReturn('token');
		$this->notifications
			->method('sendRemoteShare')
			->willReturn(self::OCS_GENERIC_SUCCESS);

		$this->rootFolder->expects($this->never())->method($this->anything());

		$this->addressHandler->expects($this->any())->method('getLocalUserFederatedAddress')
			->willReturn(new Address('user@host'));
		$share = $this->shareManager->newShare();
		$share->setSharedWith('user@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($this->defaultNode);
		$this->provider->create($share);

		$share2 = $this->shareManager->newShare();
		$share2->setSharedWith('user2@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($this->defaultNode);
		$this->provider->create($share2);

		$shares = $this->provider->getSharesBy('shareOwner', Share::SHARE_TYPE_REMOTE, null, true, 1, 1);

		$this->assertCount(1, $shares);
		$this->assertEquals('user2@server.com', $shares[0]->getSharedWith());
	}

	public function dataDeleteUser() {
		return [
			['a', 'b', 'c', 'a', true],
			['a', 'b', 'c', 'b', false],
			// The recipient is non-local.
			['a', 'b', 'c', 'c', false],
			['a', 'b', 'c', 'd', false],
		];
	}

	/**
	 * @dataProvider dataDeleteUser
	 *
	 * @param string $owner The owner of the share (uid)
	 * @param string $initiator The initiator of the share (uid)
	 * @param string $recipient The recipient of the share (uid/gid/pass)
	 * @param string $deletedUser The user that is deleted
	 * @param bool $rowDeleted Is the row deleted in this setup
	 */
	public function testDeleteUser($owner, $initiator, $recipient, $deletedUser, $rowDeleted) {
		$qb = $this->connection->getQueryBuilder();
		$qb->insert('share')
			->setValue('share_type', $qb->createNamedParameter(Share::SHARE_TYPE_REMOTE))
			->setValue('uid_owner', $qb->createNamedParameter($owner))
			->setValue('uid_initiator', $qb->createNamedParameter($initiator))
			->setValue('share_with', $qb->createNamedParameter($recipient))
			->setValue('item_type', $qb->createNamedParameter('file'))
			->setValue('item_source', $qb->createNamedParameter(42))
			->setValue('file_source', $qb->createNamedParameter(42))
			->execute();

		$id = $qb->getLastInsertId();

		$this->provider->userDeleted($deletedUser, Share::SHARE_TYPE_REMOTE);

		$qb = $this->connection->getQueryBuilder();
		$qb->select('*')
			->from('share')
			->where(
				$qb->expr()->eq('id', $qb->createNamedParameter($id))
			);
		$cursor = $qb->execute();
		$data = $cursor->fetchAll();
		$cursor->closeCursor();

		$this->assertCount($rowDeleted ? 0 : 1, $data);
	}

	/**
	 * @dataProvider dataTestFederatedSharingSettings
	 *
	 * @param string $isEnabled
	 * @param bool $expected
	 */
	public function testIsCronjobScanExternalEnabled($isEnabled, $expected) {
		$this->config->expects($this->once())->method('getAppValue')
			->with('files_sharing', 'cronjob_scan_external_enabled', 'no')
			->willReturn($isEnabled);

		$this->assertSame(
			$expected,
			$this->provider->isCronjobScanExternalEnabled()
		);
	}

	/**
	 * @dataProvider dataTestFederatedSharingSettings
	 *
	 * @param string $isEnabled
	 * @param bool $expected
	 */
	public function testIsOutgoingServer2serverShareEnabled($isEnabled, $expected) {
		$this->config->expects($this->once())->method('getAppValue')
			->with('files_sharing', 'outgoing_server2server_share_enabled', 'yes')
			->willReturn($isEnabled);

		$this->assertSame(
			$expected,
			$this->provider->isOutgoingServer2serverShareEnabled()
		);
	}

	/**
	 * @dataProvider dataTestFederatedSharingSettings
	 *
	 * @param string $isEnabled
	 * @param bool $expected
	 */
	public function testIsIncomingServer2serverShareEnabled($isEnabled, $expected) {
		$this->config->expects($this->once())->method('getAppValue')
			->with('files_sharing', 'incoming_server2server_share_enabled', 'yes')
			->willReturn($isEnabled);

		$this->assertSame(
			$expected,
			$this->provider->isIncomingServer2serverShareEnabled()
		);
	}

	public function dataTestFederatedSharingSettings() {
		return [
			['yes', true],
			['no', false]
		];
	}

	public function testUpdateForRecipientReturnsShare() {
		$share = $this->createMock(IShare::class);
		$returnedShare = $this->provider->updateForRecipient($share, 'recipient1');

		$this->assertEquals($share, $returnedShare);
	}

	/**
	 * @dataProvider dataTestGetAccepted
	 *
	 */
	public function testGetAccepted($autoAddServers, $globalAutoAccept, $userAutoAccept, $isRemoteTrusted, $expected) {
		$this->config->method('getAppValue')
			->with('federatedfilesharing', 'auto_accept_trusted', 'no')
			->willReturn($globalAutoAccept);
		$this->config->method('getUserValue')
			->with('user@server.com', 'federatedfilesharing', 'auto_accept_share_trusted', $globalAutoAccept)
			->willReturn($userAutoAccept);

		$event = new GenericEvent(
			'',
			[
				'autoAddServers' => $autoAddServers,
				'isRemoteTrusted' => $isRemoteTrusted
			]
		);
		$this->eventDispatcher->method('dispatch')
			->with($this->anything(), 'remoteshare.received')
			->willReturn($event);

		$shouldAutoAccept = $this->provider->getAccepted('remote', 'user@server.com');

		$this->assertEquals($expected, $shouldAutoAccept);
	}

	public function dataTestGetAccepted() {
		return [
			// never autoaccept when auto add to trusted is on
			[true, 'yes', 'yes', true, false],
			[true, 'yes', 'yes', false, false],
			[true, 'no', 'no', true, false],
			[true, 'no', 'no', false, false],
			// never autoaccept when auto autoaccept is off
			[false, 'no', 'no', false, false],
			[false, 'no', 'no', true, false],
			// never autoaccept when remote is not trusted
			[false, 'yes', 'yes', false, false],
			// autoaccept
			[false, 'yes', 'yes', true, true],
			// users can override globalAutoAccept when globalAutoAccept enabled
			[false, 'yes', 'no', true, false],
			[false, 'no', 'yes', true, false],
			[false, 'yes', 'yes', true, true],
		];
	}

	public function testGetRemoteId() {
		$exprBuilder = $this->createMock(IExpressionBuilder::class);
		$statementMock = $this->createMock(Statement::class);
		$statementMock->method('fetch')->willReturn(['remote_id' => 'a0b0c0']);

		$qbMock = $this->createMock(IQueryBuilder::class);
		$qbMock->method('select')->willReturnSelf();
		$qbMock->method('from')->willReturnSelf();
		$qbMock->method('where')->willReturnSelf();
		$qbMock->method('expr')->willReturn($exprBuilder);
		$qbMock->method('execute')->willReturn($statementMock);
		$connectionMock = $this->createMock(IDBConnection::class);
		$connectionMock->method('getQueryBuilder')->willReturn($qbMock);

		$shareMock = $this->createMock(IShare::class);
		$this->provider = new FederatedShareProvider(
			$connectionMock,
			$this->eventDispatcher,
			$this->addressHandler,
			$this->notifications,
			$this->tokenHandler,
			$this->l,
			$this->logger,
			$this->rootFolder,
			$this->config,
			$this->userManager
		);

		$this->assertEquals(
			'a0b0c0',
			$this->provider->getRemoteId($shareMock)
		);
	}

	public function testGetSharesWithInvalidFileidNoLimit() {
		$addressMock = $this->createMock(Address::class);
		$addressMock->method('equalTo')->willReturn(false);

		$this->addressHandler->expects($this->any())
			->method('getLocalUserFederatedAddress')
			->willReturn($addressMock);

		$this->notifications->method('sendRemoteShare')
			->willReturn(self::OCS_GENERIC_SUCCESS);

		$fileid = $this->createTestFileEntry('myOtherFile');
		$node = $this->getFileMock($fileid, 'myOtherFile');
		$share = $this->shareManager->newShare();
		$share->setSharedWith('user@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($node);
		$this->provider->create($share);

		$node2 = $this->getFileMock(48, 'myOtherFile2');
		$share2 = $this->shareManager->newShare();
		$share2->setSharedWith('user2@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner2')
			->setPermissions(19)
			->setNode($node2);
		$this->provider->create($share2);

		$node3 = $this->getFileMock(49, 'myOtherFile3');
		$share3 = $this->shareManager->newShare();
		$share3->setSharedWith('user3@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner3')
			->setPermissions(19)
			->setNode($node3);
		$this->provider->create($share3);

		$shares = $this->provider->getSharesWithInvalidFileid(-1);
		$this->assertSame(2, \count($shares));
		$this->assertSame(48, $shares[0]->getNodeId());
		$this->assertSame(49, $shares[1]->getNodeId());
	}

	public function testGetSharesWithInvalidFileidWithLimit() {
		$addressMock = $this->createMock(Address::class);
		$addressMock->method('equalTo')->willReturn(false);

		$this->addressHandler->expects($this->any())
			->method('getLocalUserFederatedAddress')
			->willReturn($addressMock);

		$this->notifications->method('sendRemoteShare')
			->willReturn(self::OCS_GENERIC_SUCCESS);

		$fileid = $this->createTestFileEntry('myOtherFile');
		$node = $this->getFileMock($fileid, 'myOtherFile');
		$share = $this->shareManager->newShare();
		$share->setSharedWith('user@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner')
			->setPermissions(19)
			->setNode($node);
		$this->provider->create($share);

		$node2 = $this->getFileMock(48, 'myOtherFile2');
		$share2 = $this->shareManager->newShare();
		$share2->setSharedWith('user2@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner2')
			->setPermissions(19)
			->setNode($node2);
		$this->provider->create($share2);

		$node3 = $this->getFileMock(49, 'myOtherFile3');
		$share3 = $this->shareManager->newShare();
		$share3->setSharedWith('user3@server.com')
			->setSharedBy('sharedBy')
			->setShareOwner('shareOwner3')
			->setPermissions(19)
			->setNode($node3);
		$this->provider->create($share3);

		$shares = $this->provider->getSharesWithInvalidFileid(1); // only one result
		$this->assertSame(1, \count($shares));
		$this->assertSame(48, $shares[0]->getNodeId());
	}

	/**
	 * Copied from tests/lib/Share20/DefaultShareProviderTest.php
	 */
	private function createTestFileEntry($path, $storage = 1) {
		$qb = $this->connection->getQueryBuilder();
		$qb->insert('filecache')
			->values([
				'storage' => $qb->expr()->literal($storage),
				'path' => $qb->expr()->literal($path),
				'path_hash' => $qb->expr()->literal(\md5($path)),
				'name' => $qb->expr()->literal(\basename($path)),
			]);
		$this->assertEquals(1, $qb->execute());
		return $qb->getLastInsertId();
	}

	/**
	 * @param int $id
	 * @param string $name
	 * @return File|MockObject
	 */
	protected function getFileMock($id = 42, $name = 'myFile') {
		$node = $this->createMock(File::class);
		$node->method('getId')->willReturn($id);
		$node->method('getName')->willReturn($name);
		return $node;
	}
}
