<?php
/**
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Vincent Petry <pvince81@owncloud.com>
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
namespace Test\Share20;

use OC\Authentication\Token\DefaultTokenMapper;
use OC\Share20\DefaultShareProvider;
use OC\Share20\ShareAttributes;
use OCP\Share\IAttributes as IShareAttributes;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\Files\File;
use OCP\Files\Folder;
use OCP\Files\IRootFolder;
use OCP\IDBConnection;
use OCP\IGroup;
use OCP\IGroupManager;
use OCP\IUser;
use OCP\IUserManager;
use OCP\Share;
use Test\TestCase;
use OCP\Share\IShare;

/**
 * Class DefaultShareProviderTest
 *
 * @package Test\Share20
 * @group DB
 */
class DefaultShareProviderTest extends TestCase {

	/** @var IDBConnection */
	protected $dbConn;

	/** @var IUserManager | \PHPUnit\Framework\MockObject\MockObject */
	protected $userManager;

	/** @var IGroupManager | \PHPUnit\Framework\MockObject\MockObject */
	protected $groupManager;

	/** @var IRootFolder | \PHPUnit\Framework\MockObject\MockObject */
	protected $rootFolder;

	/** @var DefaultShareProvider */
	protected $provider;

	public function setUp() {
		$this->dbConn = \OC::$server->getDatabaseConnection();
		$this->userManager = $this->createMock(IUserManager::class);
		$this->groupManager = $this->createMock(IGroupManager::class);
		$this->rootFolder = $this->createMock(IRootFolder::class);

		$this->userManager->expects($this->any())->method('userExists')->willReturn(true);

		//Empty share table
		$this->dbConn->getQueryBuilder()->delete('share')->execute();

		$this->provider = new DefaultShareProvider(
			$this->dbConn,
			$this->userManager,
			$this->groupManager,
			$this->rootFolder
		);
	}

	public function tearDown() {
		$this->dbConn->getQueryBuilder()->delete('share')->execute();
		$this->dbConn->getQueryBuilder()->delete('filecache')->execute();
		$this->dbConn->getQueryBuilder()->delete('storages')->execute();
	}

	/**
	 * @param int $shareType
	 * @param string $sharedWith
	 * @param string $sharedBy
	 * @param string $shareOwner
	 * @param string $itemType
	 * @param int $fileSource
	 * @param string $fileTarget
	 * @param int $permissions
	 * @param $token
	 * @param $expiration
	 * @return int
	 */
	private function addShareToDB($shareType, $sharedWith, $sharedBy, $shareOwner,
			$itemType, $fileSource, $fileTarget, $permissions, $token, $expiration,
			$parent = null, $name = null, $accepted = 0) {
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share');

		if ($shareType) {
			$qb->setValue('share_type', $qb->expr()->literal($shareType));
		}
		if ($sharedWith) {
			$qb->setValue('share_with', $qb->expr()->literal($sharedWith));
		}
		if ($sharedBy) {
			$qb->setValue('uid_initiator', $qb->expr()->literal($sharedBy));
		}
		if ($shareOwner) {
			$qb->setValue('uid_owner', $qb->expr()->literal($shareOwner));
		}
		if ($itemType) {
			$qb->setValue('item_type', $qb->expr()->literal($itemType));
		}
		if ($fileSource) {
			$qb->setValue('file_source', $qb->expr()->literal($fileSource));
		}
		if ($fileTarget) {
			$qb->setValue('file_target', $qb->expr()->literal($fileTarget));
		}
		if ($permissions) {
			$qb->setValue('permissions', $qb->expr()->literal($permissions));
		}
		if ($token) {
			$qb->setValue('token', $qb->expr()->literal($token));
		}
		if ($expiration) {
			$qb->setValue('expiration', $qb->createNamedParameter($expiration, IQueryBuilder::PARAM_DATE));
		}
		if ($parent) {
			$qb->setValue('parent', $qb->expr()->literal($parent));
		}
		if ($name) {
			$qb->setValue('share_name', $qb->expr()->literal($name));
		}
		if ($accepted) {
			$qb->setValue('accepted', $qb->expr()->literal($accepted));
		}

		$this->assertEquals(1, $qb->execute());
		return$qb->getLastInsertId();
	}

	/**
	 * @expectedException \OCP\Share\Exceptions\ShareNotFound
	 */
	public function testGetShareByIdNotExist() {
		$this->provider->getShareById(1);
	}

	public function testGetShareByIdUserShare() {
		$qb = $this->dbConn->getQueryBuilder();

		$qb->insert('share')
			->values([
				'share_type'  => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with'  => $qb->expr()->literal('sharedWith'),
				'uid_owner'   => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(42),
				'file_target' => $qb->expr()->literal('myTarget'),
				'permissions' => $qb->expr()->literal(13),
			]);
		$qb->execute();

		$id = $qb->getLastInsertId();

		$sharedBy = $this->createMock(IUser::class);
		$sharedBy->method('getUID')->willReturn('sharedBy');
		$shareOwner = $this->createMock(IUser::class);
		$shareOwner->method('getUID')->willReturn('shareOwner');

		$ownerPath = $this->createMock(File::class);
		$shareOwnerFolder = $this->createMock(Folder::class);
		$shareOwnerFolder->method('getById')->with(42)->willReturn([$ownerPath]);

		$this->rootFolder
			->method('getUserFolder')
			->will($this->returnValueMap([
				['shareOwner', $shareOwnerFolder],
			]));

		$share = $this->provider->getShareById($id);

		$this->assertEquals($id, $share->getId());
		$this->assertEquals(Share::SHARE_TYPE_USER, $share->getShareType());
		$this->assertEquals('sharedWith', $share->getSharedWith());
		$this->assertEquals('sharedBy', $share->getSharedBy());
		$this->assertEquals('shareOwner', $share->getShareOwner());
		$this->assertEquals($ownerPath, $share->getNode());
		$this->assertEquals(13, $share->getPermissions());
		$this->assertNull($share->getToken());
		$this->assertNull($share->getExpirationDate());
		$this->assertEquals('myTarget', $share->getTarget());
	}

	public function testGetShareByIdLazy() {
		$qb = $this->dbConn->getQueryBuilder();

		$qb->insert('share')
			->values([
				'share_type'  => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with'  => $qb->expr()->literal('sharedWith'),
				'uid_owner'   => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(42),
				'file_target' => $qb->expr()->literal('myTarget'),
				'permissions' => $qb->expr()->literal(13),
			]);
		$qb->execute();

		$id = $qb->getLastInsertId();

		$this->rootFolder->expects($this->never())->method('getUserFolder');

		$share = $this->provider->getShareById($id);

		// We do not fetch the node so the rootfolder is never called.

		$this->assertEquals($id, $share->getId());
		$this->assertEquals(Share::SHARE_TYPE_USER, $share->getShareType());
		$this->assertEquals('sharedWith', $share->getSharedWith());
		$this->assertEquals('sharedBy', $share->getSharedBy());
		$this->assertEquals('shareOwner', $share->getShareOwner());
		$this->assertEquals(13, $share->getPermissions());
		$this->assertNull($share->getToken());
		$this->assertNull($share->getExpirationDate());
		$this->assertEquals('myTarget', $share->getTarget());
	}

	public function testGetShareByIdLazy2() {
		$qb = $this->dbConn->getQueryBuilder();

		$qb->insert('share')
			->values([
				'share_type'  => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with'  => $qb->expr()->literal('sharedWith'),
				'uid_owner'   => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(42),
				'file_target' => $qb->expr()->literal('myTarget'),
				'permissions' => $qb->expr()->literal(13),
			]);
		$qb->execute();

		$id = $qb->getLastInsertId();

		$ownerPath = $this->createMock(File::class);

		$shareOwnerFolder = $this->createMock(Folder::class);
		$shareOwnerFolder->method('getById')->with(42)->willReturn([$ownerPath]);

		$this->rootFolder
			->method('getUserFolder')
			->with('shareOwner')
			->willReturn($shareOwnerFolder);

		$share = $this->provider->getShareById($id);

		// We fetch the node so the root folder is eventually called

		$this->assertEquals($id, $share->getId());
		$this->assertEquals(Share::SHARE_TYPE_USER, $share->getShareType());
		$this->assertEquals('sharedWith', $share->getSharedWith());
		$this->assertEquals('sharedBy', $share->getSharedBy());
		$this->assertEquals('shareOwner', $share->getShareOwner());
		$this->assertEquals($ownerPath, $share->getNode());
		$this->assertEquals(13, $share->getPermissions());
		$this->assertNull($share->getToken());
		$this->assertNull($share->getExpirationDate());
		$this->assertEquals('myTarget', $share->getTarget());
	}

	public function testGetShareByIdGroupShare() {
		$qb = $this->dbConn->getQueryBuilder();

		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_GROUP),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(42),
				'file_target' => $qb->expr()->literal('myTarget'),
				'permissions' => $qb->expr()->literal(13),
			]);
		$this->assertEquals(1, $qb->execute());

		// Get the id
		$id = $qb->getLastInsertId();

		$ownerPath = $this->createMock(Folder::class);
		$shareOwnerFolder = $this->createMock(Folder::class);
		$shareOwnerFolder->method('getById')->with(42)->willReturn([$ownerPath]);

		$this->rootFolder
				->method('getUserFolder')
				->will($this->returnValueMap([
						['shareOwner', $shareOwnerFolder],
				]));

		$share = $this->provider->getShareById($id);

		$this->assertEquals($id, $share->getId());
		$this->assertEquals(Share::SHARE_TYPE_GROUP, $share->getShareType());
		$this->assertEquals('sharedWith', $share->getSharedWith());
		$this->assertEquals('sharedBy', $share->getSharedBy());
		$this->assertEquals('shareOwner', $share->getShareOwner());
		$this->assertEquals($ownerPath, $share->getNode());
		$this->assertEquals(13, $share->getPermissions());
		$this->assertNull($share->getToken());
		$this->assertNull($share->getExpirationDate());
		$this->assertEquals('myTarget', $share->getTarget());
	}

	public function testGetShareByIdUserGroupShare() {
		$id = $this->addShareToDB(
			Share::SHARE_TYPE_GROUP,
			'group0',
			'user0',
			'user0',
			'file',
			42,
			'myTarget',
			31,
			null,
			null,
			null,
			null,
			Share::STATE_ACCEPTED
		);
		$this->addShareToDB(
			2,
			'user1',
			'user0',
			'user0',
			'file',
			42,
			'userTarget',
			31,
			null,
			null,
			$id,
			null,
			Share::STATE_REJECTED
		);

		$user0 = $this->createMock(IUser::class);
		$user0->method('getUID')->willReturn('user0');
		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');

		$group0 = $this->createMock(IGroup::class);
		$group0->method('inGroup')->with($user1)->willReturn(true);

		$node = $this->createMock(Folder::class);
		$node->method('getId')->willReturn(42);

		$this->rootFolder->method('getUserFolder')->with('user0')->will($this->returnSelf());
		$this->rootFolder->method('getById')->willReturn([$node]);

		$this->userManager->method('get')->will($this->returnValueMap([
			['user0', $user0],
			['user1', $user1],
		]));
		$this->groupManager->method('get')->with('group0')->willReturn($group0);

		$share = $this->provider->getShareById($id, 'user1');

		$this->assertEquals($id, $share->getId());
		$this->assertEquals(Share::SHARE_TYPE_GROUP, $share->getShareType());
		$this->assertSame('group0', $share->getSharedWith());
		$this->assertSame('user0', $share->getSharedBy());
		$this->assertSame('user0', $share->getShareOwner());
		$this->assertSame($node, $share->getNode());
		$this->assertEquals(31, $share->getPermissions());
		$this->assertNull($share->getToken());
		$this->assertNull($share->getExpirationDate());
		$this->assertEquals('userTarget', $share->getTarget());
		$this->assertEquals(Share::STATE_REJECTED, $share->getState());
	}

	public function testGetShareByIdLinkShare() {
		$qb = $this->dbConn->getQueryBuilder();

		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_LINK),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(42),
				'file_target' => $qb->expr()->literal('myTarget'),
				'permissions' => $qb->expr()->literal(13),
				'token' => $qb->expr()->literal('token'),
				'share_name' => $qb->expr()->literal('some_name'),
				'expiration' => $qb->expr()->literal('2000-01-02 00:00:00'),
			]);
		$this->assertEquals(1, $qb->execute());

		$id = $qb->getLastInsertId();

		$ownerPath = $this->createMock(Folder::class);
		$shareOwnerFolder = $this->createMock(Folder::class);
		$shareOwnerFolder->method('getById')->with(42)->willReturn([$ownerPath]);

		$this->rootFolder
				->method('getUserFolder')
				->will($this->returnValueMap([
						['shareOwner', $shareOwnerFolder],
				]));

		$share = $this->provider->getShareById($id);

		$this->assertEquals($id, $share->getId());
		$this->assertEquals(Share::SHARE_TYPE_LINK, $share->getShareType());
		$this->assertEquals('sharedWith', $share->getPassword());
		$this->assertEquals('sharedBy', $share->getSharedBy());
		$this->assertEquals('shareOwner', $share->getShareOwner());
		$this->assertEquals($ownerPath, $share->getNode());
		$this->assertEquals(13, $share->getPermissions());
		$this->assertEquals('token', $share->getToken());
		$this->assertEquals(\DateTime::createFromFormat('Y-m-d H:i:s', '2000-01-02 00:00:00'), $share->getExpirationDate());
		$this->assertEquals('myTarget', $share->getTarget());
		$this->assertEquals('some_name', $share->getName());
	}

	public function testDeleteSingleShare() {
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(42),
				'file_target' => $qb->expr()->literal('myTarget'),
				'permissions' => $qb->expr()->literal(13),
			]);
		$this->assertEquals(1, $qb->execute());

		$id = $qb->getLastInsertId();

		$share = $this->createMock(Share\IShare::class);
		$share->method('getId')->willReturn($id);

		/** @var DefaultShareProvider $provider */
		$provider = $this->getMockBuilder(DefaultShareProvider::class)
			->setConstructorArgs([
				$this->dbConn,
				$this->userManager,
				$this->groupManager,
				$this->rootFolder,
			])
			->setMethods(['getShareById'])
			->getMock();

		$provider->delete($share);

		$qb = $this->dbConn->getQueryBuilder();
		$qb->select('*')
			->from('share');

		$cursor = $qb->execute();
		$result = $cursor->fetchAll();
		$cursor->closeCursor();

		$this->assertEmpty($result);
	}

	public function testDeleteSingleShareLazy() {
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(42),
				'file_target' => $qb->expr()->literal('myTarget'),
				'permissions' => $qb->expr()->literal(13),
			]);
		$this->assertEquals(1, $qb->execute());

		$id = $qb->getLastInsertId();

		$this->rootFolder->expects($this->never())->method($this->anything());

		$share = $this->provider->getShareById($id);
		$this->provider->delete($share);

		$qb = $this->dbConn->getQueryBuilder();
		$qb->select('*')
			->from('share');

		$cursor = $qb->execute();
		$result = $cursor->fetchAll();
		$cursor->closeCursor();

		$this->assertEmpty($result);
	}

	public function testDeleteGroupShareWithUserGroupShares() {
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_GROUP),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(42),
				'file_target' => $qb->expr()->literal('myTarget'),
				'permissions' => $qb->expr()->literal(13),
			]);
		$this->assertEquals(1, $qb->execute());
		$id = $qb->getLastInsertId();

		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(2),
				'share_with' => $qb->expr()->literal('sharedWithUser'),
				'uid_owner' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(42),
				'file_target' => $qb->expr()->literal('myTarget'),
				'permissions' => $qb->expr()->literal(13),
				'parent'      => $qb->expr()->literal($id),
			]);
		$this->assertEquals(1, $qb->execute());

		$share = $this->createMock(Share\IShare::class);
		$share->method('getId')->willReturn($id);
		$share->method('getShareType')->willReturn(Share::SHARE_TYPE_GROUP);

		/** @var DefaultTokenMapper $provider */
		$provider = $this->getMockBuilder(DefaultShareProvider::class)
			->setConstructorArgs([
				$this->dbConn,
				$this->userManager,
				$this->groupManager,
				$this->rootFolder,
			])
			->setMethods(['getShareById'])
			->getMock();

		$provider->delete($share);

		$qb = $this->dbConn->getQueryBuilder();
		$qb->select('*')
			->from('share');

		$cursor = $qb->execute();
		$result = $cursor->fetchAll();
		$cursor->closeCursor();

		$this->assertEmpty($result);
	}

	public function testGetChildren() {
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type'  => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with'  => $qb->expr()->literal('sharedWith'),
				'uid_owner'   => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(42),
				'file_target' => $qb->expr()->literal('myTarget'),
				'permissions' => $qb->expr()->literal(13),
			]);
		$qb->execute();

		// Get the id
		$id = $qb->getLastInsertId();

		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type'  => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with'  => $qb->expr()->literal('user1'),
				'uid_owner'   => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('user2'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(1),
				'file_target' => $qb->expr()->literal('myTarget1'),
				'permissions' => $qb->expr()->literal(2),
				'parent'      => $qb->expr()->literal($id),
			]);
		$qb->execute();

		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type'  => $qb->expr()->literal(Share::SHARE_TYPE_GROUP),
				'share_with'  => $qb->expr()->literal('group1'),
				'uid_owner'   => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('user3'),
				'item_type'   => $qb->expr()->literal('folder'),
				'file_source' => $qb->expr()->literal(3),
				'file_target' => $qb->expr()->literal('myTarget2'),
				'permissions' => $qb->expr()->literal(4),
				'parent'      => $qb->expr()->literal($id),
			]);
		$qb->execute();

		$ownerPath = $this->createMock(Folder::class);
		$ownerFolder = $this->createMock(Folder::class);
		$ownerFolder->method('getById')->willReturn([$ownerPath]);

		$this->rootFolder
			->method('getUserFolder')
			->will($this->returnValueMap([
				['shareOwner', $ownerFolder],
			]));

		$share = $this->createMock(Share\IShare::class);
		$share->method('getId')->willReturn($id);

		$children = $this->provider->getChildren($share);

		$this->assertCount(2, $children);

		//Child1
		$this->assertEquals(Share::SHARE_TYPE_USER, $children[0]->getShareType());
		$this->assertEquals('user1', $children[0]->getSharedWith());
		$this->assertEquals('user2', $children[0]->getSharedBy());
		$this->assertEquals('shareOwner', $children[0]->getShareOwner());
		$this->assertEquals($ownerPath, $children[0]->getNode());
		$this->assertEquals(2, $children[0]->getPermissions());
		$this->assertNull($children[0]->getToken());
		$this->assertNull($children[0]->getExpirationDate());
		$this->assertEquals('myTarget1', $children[0]->getTarget());

		//Child2
		$this->assertEquals(Share::SHARE_TYPE_GROUP, $children[1]->getShareType());
		$this->assertEquals('group1', $children[1]->getSharedWith());
		$this->assertEquals('user3', $children[1]->getSharedBy());
		$this->assertEquals('shareOwner', $children[1]->getShareOwner());
		$this->assertEquals($ownerPath, $children[1]->getNode());
		$this->assertEquals(4, $children[1]->getPermissions());
		$this->assertNull($children[1]->getToken());
		$this->assertNull($children[1]->getExpirationDate());
		$this->assertEquals('myTarget2', $children[1]->getTarget());
	}

	public function testCreateUserShare() {
		$share = new \OC\Share20\Share($this->rootFolder, $this->userManager);

		$shareOwner = $this->createMock(IUser::class);
		$shareOwner->method('getUID')->willReturn('shareOwner');

		$path = $this->createMock(File::class);
		$path->method('getId')->willReturn(100);
		$path->method('getOwner')->willReturn($shareOwner);

		$ownerFolder = $this->createMock(Folder::class);
		$userFolder = $this->createMock(Folder::class);
		$this->rootFolder
			->method('getUserFolder')
			->will($this->returnValueMap([
				['sharedBy', $userFolder],
				['shareOwner', $ownerFolder],
			]));

		$userFolder->method('getById')
			->with(100)
			->willReturn([$path]);
		$ownerFolder->method('getById')
			->with(100)
			->willReturn([$path]);

		$share->setShareType(Share::SHARE_TYPE_USER);
		$share->setSharedWith('sharedWith');
		$share->setSharedBy('sharedBy');
		$share->setShareOwner('shareOwner');
		$share->setNode($path);
		$share->setPermissions(1);

		$attrs = new ShareAttributes();
		$attrs->setAttribute("permissions", "download", true);
		$share->setAttributes($attrs);

		$share->setTarget('/target');

		$share2 = $this->provider->create($share);

		$this->assertNotNull($share2->getId());
		$this->assertSame('ocinternal:'.$share2->getId(), $share2->getFullId());
		$this->assertSame(Share::SHARE_TYPE_USER, $share2->getShareType());
		$this->assertSame('sharedWith', $share2->getSharedWith());
		$this->assertSame('sharedBy', $share2->getSharedBy());
		$this->assertSame('shareOwner', $share2->getShareOwner());
		$this->assertSame(1, $share2->getPermissions());
		$this->assertSame('/target', $share2->getTarget());
		$this->assertLessThanOrEqual(new \DateTime(), $share2->getShareTime());
		$this->assertSame($path, $share2->getNode());
		$this->assertSame(
			[
				[
					"scope" => "permissions",
					"key" => "download",
					"enabled" => true
				]
			],
			$share->getAttributes()->toArray()
		);
	}

	public function testCreateGroupShare() {
		$share = new \OC\Share20\Share($this->rootFolder, $this->userManager);

		$shareOwner = $this->createMock(IUser::class);
		$shareOwner->method('getUID')->willReturn('shareOwner');

		$path = $this->createMock(Folder::class);
		$path->method('getId')->willReturn(100);
		$path->method('getOwner')->willReturn($shareOwner);

		$ownerFolder = $this->createMock(Folder::class);
		$userFolder = $this->createMock(Folder::class);
		$this->rootFolder
			->method('getUserFolder')
			->will($this->returnValueMap([
				['sharedBy', $userFolder],
				['shareOwner', $ownerFolder],
			]));

		$userFolder->method('getById')
			->with(100)
			->willReturn([$path]);
		$ownerFolder->method('getById')
			->with(100)
			->willReturn([$path]);

		$share->setShareType(Share::SHARE_TYPE_GROUP);
		$share->setSharedWith('sharedWith');
		$share->setSharedBy('sharedBy');
		$share->setShareOwner('shareOwner');
		$share->setNode($path);
		$share->setPermissions(1);

		$attrs = new ShareAttributes();
		$attrs->setAttribute("permissions", "download", true);
		$share->setAttributes($attrs);

		$share->setTarget('/target');

		$share2 = $this->provider->create($share);

		$this->assertNotNull($share2->getId());
		$this->assertSame('ocinternal:'.$share2->getId(), $share2->getFullId());
		$this->assertSame(Share::SHARE_TYPE_GROUP, $share2->getShareType());
		$this->assertSame('sharedWith', $share2->getSharedWith());
		$this->assertSame('sharedBy', $share2->getSharedBy());
		$this->assertSame('shareOwner', $share2->getShareOwner());
		$this->assertSame(1, $share2->getPermissions());
		$this->assertSame('/target', $share2->getTarget());
		$this->assertLessThanOrEqual(new \DateTime(), $share2->getShareTime());
		$this->assertSame($path, $share2->getNode());
		$this->assertSame(
			[
				[
					"scope" => "permissions",
					"key" => "download",
					"enabled" => true
				]
			],
			$share->getAttributes()->toArray()
		);
	}

	public function testCreateLinkShare() {
		$share = new \OC\Share20\Share($this->rootFolder, $this->userManager);

		$shareOwner = $this->createMock(IUser::class);
		$shareOwner->method('getUID')->willReturn('shareOwner');

		$path = $this->createMock(Folder::class);
		$path->method('getId')->willReturn(100);
		$path->method('getOwner')->willReturn($shareOwner);

		$ownerFolder = $this->createMock(Folder::class);
		$userFolder = $this->createMock(Folder::class);
		$this->rootFolder
				->method('getUserFolder')
				->will($this->returnValueMap([
						['sharedBy', $userFolder],
						['shareOwner', $ownerFolder],
				]));

		$userFolder->method('getById')
				->with(100)
				->willReturn([$path]);
		$ownerFolder->method('getById')
				->with(100)
				->willReturn([$path]);

		$share->setShareType(Share::SHARE_TYPE_LINK);
		$share->setSharedBy('sharedBy');
		$share->setShareOwner('shareOwner');
		$share->setNode($path);
		$share->setPermissions(1);
		$share->setPassword('password');
		$share->setToken('token');
		$share->setName('some_name');
		$expireDate = new \DateTime();
		$share->setExpirationDate($expireDate);
		$share->setTarget('/target');

		$share2 = $this->provider->create($share);

		$this->assertNotNull($share2->getId());
		$this->assertSame('ocinternal:'.$share2->getId(), $share2->getFullId());
		$this->assertSame(Share::SHARE_TYPE_LINK, $share2->getShareType());
		$this->assertSame('sharedBy', $share2->getSharedBy());
		$this->assertSame('shareOwner', $share2->getShareOwner());
		$this->assertSame(1, $share2->getPermissions());
		$this->assertSame('/target', $share2->getTarget());
		$this->assertLessThanOrEqual(new \DateTime(), $share2->getShareTime());
		$this->assertSame($path, $share2->getNode());
		$this->assertSame('password', $share2->getPassword());
		$this->assertSame('token', $share2->getToken());
		$this->assertSame('some_name', $share2->getName());
		$this->assertEquals($expireDate->format(\DateTime::ISO8601), $share2->getExpirationDate()->format(\DateTime::ISO8601));

		$share->setName(null);
		$share2 = $this->provider->create($share);
		$this->assertNull($share2->getName());
	}

	public function testGetShareByToken() {
		$qb = $this->dbConn->getQueryBuilder();

		$qb->insert('share')
			->values([
				'share_type'    => $qb->expr()->literal(Share::SHARE_TYPE_LINK),
				'share_with'    => $qb->expr()->literal('password'),
				'uid_owner'     => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type'     => $qb->expr()->literal('file'),
				'file_source'   => $qb->expr()->literal(42),
				'file_target'   => $qb->expr()->literal('myTarget'),
				'permissions'   => $qb->expr()->literal(13),
				'token'         => $qb->expr()->literal('secrettoken'),
				'share_name'          => $qb->expr()->literal('some_name'),
			]);
		$qb->execute();
		$id = $qb->getLastInsertId();

		$file = $this->createMock(File::class);

		$this->rootFolder->method('getUserFolder')->with('shareOwner')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with(42)->willReturn([$file]);

		$share = $this->provider->getShareByToken('secrettoken');
		$this->assertEquals($id, $share->getId());
		$this->assertSame('shareOwner', $share->getShareOwner());
		$this->assertSame('sharedBy', $share->getSharedBy());
		$this->assertSame('secrettoken', $share->getToken());
		$this->assertSame('password', $share->getPassword());
		$this->assertNull($share->getSharedWith());
		$this->assertSame('some_name', $share->getName());
	}

	/**
	 * @expectedException \OCP\Share\Exceptions\ShareNotFound
	 */
	public function testGetShareByTokenNotFound() {
		$this->provider->getShareByToken('invalidtoken');
	}

	private function createTestStorageEntry($storageStringId) {
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('storages')
			->values([
				'id' => $qb->expr()->literal($storageStringId),
			]);
		$this->assertEquals(1, $qb->execute());
		return $qb->getLastInsertId();
	}

	private function createTestFileEntry($path, $storage = 1) {
		$qb = $this->dbConn->getQueryBuilder();
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

	public function storageAndFileNameProvider() {
		return [
			// regular file on regular storage
			['home::shareOwner', 'files/test.txt', 'files/test2.txt'],
			// regular file on external storage
			['smb::whatever', 'files/test.txt', 'files/test2.txt'],
			// regular file on external storage in trashbin-like folder,
			['smb::whatever', 'files_trashbin/files/test.txt', 'files_trashbin/files/test2.txt'],
		];
	}

	/**
	 * @dataProvider storageAndFileNameProvider
	 */
	public function testGetSharedWithUser($storageStringId, $fileName1, $fileName2) {
		$storageId = $this->createTestStorageEntry($storageStringId);
		$fileId = $this->createTestFileEntry($fileName1, $storageId);
		$fileId2 = $this->createTestFileEntry($fileName2, $storageId);
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal($fileId),
				'file_target' => $qb->expr()->literal('myTarget'),
				'permissions' => $qb->expr()->literal(13),
			]);
		$this->assertEquals(1, $qb->execute());
		$id = $qb->getLastInsertId();

		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with' => $qb->expr()->literal('sharedWith2'),
				'uid_owner' => $qb->expr()->literal('shareOwner2'),
				'uid_initiator' => $qb->expr()->literal('sharedBy2'),
				'item_type'   => $qb->expr()->literal('file2'),
				'file_source' => $qb->expr()->literal($fileId2),
				'file_target' => $qb->expr()->literal('myTarget2'),
				'permissions' => $qb->expr()->literal(14),
			]);
		$this->assertEquals(1, $qb->execute());

		$file = $this->createMock(File::class);
		$this->rootFolder->method('getUserFolder')->with('shareOwner')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with($fileId)->willReturn([$file]);

		$share = $this->provider->getSharedWith('sharedWith', Share::SHARE_TYPE_USER, null, 1, 0);
		$this->assertCount(1, $share);

		$share = $share[0];
		$this->assertEquals($id, $share->getId());
		$this->assertEquals('sharedWith', $share->getSharedWith());
		$this->assertEquals('shareOwner', $share->getShareOwner());
		$this->assertEquals('sharedBy', $share->getSharedBy());
		$this->assertEquals(Share::SHARE_TYPE_USER, $share->getShareType());
	}

	/**
	 * @dataProvider storageAndFileNameProvider
	 */
	public function testGetSharedWithGroup($storageStringId, $fileName1, $fileName2) {
		$storageId = $this->createTestStorageEntry($storageStringId);
		$fileId = $this->createTestFileEntry($fileName1, $storageId);
		$fileId2 = $this->createTestFileEntry($fileName2, $storageId);
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_GROUP),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('shareOwner2'),
				'uid_initiator' => $qb->expr()->literal('sharedBy2'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal($fileId2),
				'file_target' => $qb->expr()->literal('myTarget2'),
				'permissions' => $qb->expr()->literal(14),
			]);
		$this->assertEquals(1, $qb->execute());

		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_GROUP),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal($fileId),
				'file_target' => $qb->expr()->literal('myTarget'),
				'permissions' => $qb->expr()->literal(13),
			]);
		$this->assertEquals(1, $qb->execute());
		$id = $qb->getLastInsertId();

		$groups = [];
		foreach (\range(0, 100) as $i) {
			$group = $this->createMock(IGroup::class);
			$group->method('getGID')->willReturn('group'.$i);
			$groups[] = $group;
		}

		$group = $this->createMock(IGroup::class);
		$group->method('getGID')->willReturn('sharedWith');
		$groups[] = $group;

		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('sharedWith');
		$owner = $this->createMock(IUser::class);
		$owner->method('getUID')->willReturn('shareOwner');
		$initiator = $this->createMock(IUser::class);
		$initiator->method('getUID')->willReturn('sharedBy');

		$this->userManager->method('get')->willReturnMap([
			['sharedWith', $user],
			['shareOwner', $owner],
			['sharedBy', $initiator],
		]);
		$this->groupManager->method('getUserGroups')->with($user)->willReturn($groups);
		$this->groupManager->method('get')->with('sharedWith')->willReturn($group);

		$file = $this->createMock(File::class);
		$this->rootFolder->method('getUserFolder')->with('shareOwner')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with($fileId)->willReturn([$file]);

		$share = $this->provider->getSharedWith('sharedWith', Share::SHARE_TYPE_GROUP, null, 20, 1);
		$this->assertCount(1, $share);

		$share = $share[0];
		$this->assertEquals($id, $share->getId());
		$this->assertEquals('sharedWith', $share->getSharedWith());
		$this->assertEquals('shareOwner', $share->getShareOwner());
		$this->assertEquals('sharedBy', $share->getSharedBy());
		$this->assertEquals(Share::SHARE_TYPE_GROUP, $share->getShareType());
	}

	/**
	 * @dataProvider storageAndFileNameProvider
	 */
	public function testGetSharedWithGroupUserModified($storageStringId, $fileName1, $fileName2) {
		$storageId = $this->createTestStorageEntry($storageStringId);
		$fileId = $this->createTestFileEntry($fileName1, $storageId);
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_GROUP),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal($fileId),
				'file_target' => $qb->expr()->literal('myTarget'),
				'permissions' => $qb->expr()->literal(7),
				'accepted' => $qb->expr()->literal(\OCP\Share::STATE_ACCEPTED),
			]);
		$this->assertEquals(1, $qb->execute());
		$id = $qb->getLastInsertId();

		/*
		 * Wrong share. Should not be taken by code.
		 */
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(2),
				'share_with' => $qb->expr()->literal('user2'),
				'uid_owner' => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal($fileId),
				'file_target' => $qb->expr()->literal('wrongTarget'),
				'permissions' => $qb->expr()->literal(31),
				'accepted' => $qb->expr()->literal(\OCP\Share::STATE_ACCEPTED),
				'parent' => $qb->expr()->literal($id),
			]);
		$this->assertEquals(1, $qb->execute());

		/*
		 * Correct share. should be taken by code path.
		 */
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(2),
				'share_with' => $qb->expr()->literal('user'),
				'uid_owner' => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal($fileId),
				'file_target' => $qb->expr()->literal('userTarget'),
				'permissions' => $qb->expr()->literal(31),
				'accepted' => $qb->expr()->literal(\OCP\Share::STATE_REJECTED),
				'parent' => $qb->expr()->literal($id),
			]);
		$this->assertEquals(1, $qb->execute());

		$group = $this->createMock(IGroup::class);
		$group->method('getGID')->willReturn('sharedWith');
		$groups = [$group];

		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('user');
		$owner = $this->createMock(IUser::class);
		$owner->method('getUID')->willReturn('shareOwner');
		$initiator = $this->createMock(IUser::class);
		$initiator->method('getUID')->willReturn('sharedBy');

		$this->userManager->method('get')->willReturnMap([
			['user', $user],
			['shareOwner', $owner],
			['sharedBy', $initiator],
		]);
		$this->groupManager->method('getUserGroups')->with($user)->willReturn($groups);
		$this->groupManager->method('get')->with('sharedWith')->willReturn($group);

		$file = $this->createMock(File::class);
		$this->rootFolder->method('getUserFolder')->with('shareOwner')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with($fileId)->willReturn([$file]);

		$share = $this->provider->getSharedWith('user', Share::SHARE_TYPE_GROUP, null, -1, 0);
		$this->assertCount(1, $share);

		$share = $share[0];
		$this->assertSame((string)$id, $share->getId());
		$this->assertSame('sharedWith', $share->getSharedWith());
		$this->assertSame('shareOwner', $share->getShareOwner());
		$this->assertSame('sharedBy', $share->getSharedBy());
		$this->assertSame(Share::SHARE_TYPE_GROUP, $share->getShareType());
		$this->assertSame(7, $share->getPermissions(), 'resolved group share takes permission of parent');
		$this->assertSame(\OCP\Share::STATE_REJECTED, $share->getState());
		$this->assertSame('userTarget', $share->getTarget());
	}

	/**
	 * @dataProvider storageAndFileNameProvider
	 */
	public function testGetSharedWithUserWithNode($storageStringId, $fileName1, $fileName2) {
		$storageId = $this->createTestStorageEntry($storageStringId);
		$fileId = $this->createTestFileEntry($fileName1, $storageId);
		$fileId2 = $this->createTestFileEntry($fileName2, $storageId);
		$this->addShareToDB(Share::SHARE_TYPE_USER, 'user0', 'user1', 'user1',
			'file', $fileId, 'myTarget', 31, null, null, null);
		$id = $this->addShareToDB(Share::SHARE_TYPE_USER, 'user0', 'user1', 'user1',
			'file', $fileId2, 'myTarget', 31, null, null, null);

		$user0 = $this->createMock(IUser::class);
		$user0->method('getUID')->willReturn('user0');
		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');

		$this->userManager->method('get')->willReturnMap([
			['user0', $user0],
			['user1', $user1],
		]);

		$file = $this->createMock(File::class);
		$file->method('getId')->willReturn($fileId2);
		$this->rootFolder->method('getUserFolder')->with('user1')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with($fileId2)->willReturn([$file]);

		$share = $this->provider->getSharedWith('user0', Share::SHARE_TYPE_USER, $file, -1, 0);
		$this->assertCount(1, $share);

		$share = $share[0];
		$this->assertEquals($id, $share->getId());
		$this->assertSame('user0', $share->getSharedWith());
		$this->assertSame('user1', $share->getShareOwner());
		$this->assertSame('user1', $share->getSharedBy());
		$this->assertSame($file, $share->getNode());
		$this->assertEquals(Share::SHARE_TYPE_USER, $share->getShareType());
	}

	/**
	 * @dataProvider storageAndFileNameProvider
	 */
	public function testGetSharedWithGroupWithNode($storageStringId, $fileName1, $fileName2) {
		$storageId = $this->createTestStorageEntry($storageStringId);
		$fileId = $this->createTestFileEntry($fileName1, $storageId);
		$fileId2 = $this->createTestFileEntry($fileName2, $storageId);
		$this->addShareToDB(Share::SHARE_TYPE_GROUP, 'group0', 'user1', 'user1',
			'file', $fileId, 'myTarget', 31, null, null, null);
		$id = $this->addShareToDB(Share::SHARE_TYPE_GROUP, 'group0', 'user1', 'user1',
			'file', $fileId2, 'myTarget-changed', 31, null, null, null);

		$user0 = $this->createMock(IUser::class);
		$user0->method('getUID')->willReturn('user0');
		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');

		$this->userManager->method('get')->willReturnMap([
			['user0', $user0],
			['user1', $user1],
		]);

		$group0 = $this->createMock(IGroup::class);
		$group0->method('getGID')->willReturn('group0');

		$this->groupManager->method('get')->with('group0')->willReturn($group0);
		$this->groupManager->method('getUserGroups')->with($user0)->willReturn([$group0]);

		$node = $this->createMock(Folder::class);
		$node->method('getId')->willReturn($fileId2);
		$this->rootFolder->method('getUserFolder')->with('user1')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with($fileId2)->willReturn([$node]);

		$share = $this->provider->getSharedWith('user0', Share::SHARE_TYPE_GROUP, $node, -1, 0);
		$this->assertCount(1, $share);

		$share = $share[0];
		$this->assertEquals($id, $share->getId());
		$this->assertSame('group0', $share->getSharedWith());
		$this->assertSame('user1', $share->getShareOwner());
		$this->assertSame('user1', $share->getSharedBy());
		$this->assertSame($node, $share->getNode());
		$this->assertEquals(Share::SHARE_TYPE_GROUP, $share->getShareType());
		$this->assertSame('myTarget-changed', $share->getTarget());
	}

	public function testChunkedGetSharedWithGroupWithNode() {
		$storageStringId = 'home::shareOwner';
		$fileName1 = 'files/test.txt';
		$storageId = $this->createTestStorageEntry($storageStringId);
		$fileId = $this->createTestFileEntry($fileName1, $storageId);

		$user0 = $this->createMock(IUser::class);
		$user0->method('getUID')->willReturn('user0');
		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');

		$this->userManager->method('get')->willReturnMap([
			['user0', $user0],
			['user1', $user1],
		]);

		for ($i = 0; $i < 105; $i++) {
			$group = $this->createMock(IGroup::class);
			$groupId = "group$i";
			$group->method('getGID')->willReturn($groupId);
			$this->groupManager->method('get')->with($groupId)->willReturn($group);
			$groupArray[] = $group;
			$ids[] = $this->addShareToDB(Share::SHARE_TYPE_GROUP, $groupId, 'user1', 'user1',
				'file', $fileId, 'myTarget', 31, null, null, null);
		}
		$this->groupManager->method('getUserGroups')->with($user0)->willReturn($groupArray);

		$node = $this->createMock(File::class);
		$node->method('getId')->willReturn($fileId);
		$this->rootFolder->method('getUserFolder')->with('user1')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with($fileId)->willReturn([$node]);

		$share = $this->provider->getSharedWith('user0', Share::SHARE_TYPE_GROUP, $node, -1, 0);
		$this->assertCount(105, $share);

		$share = $share[0];
		$this->assertEquals($ids[0], $share->getId());
		$this->assertSame('group0', $share->getSharedWith());
		$this->assertSame('user1', $share->getShareOwner());
		$this->assertSame('user1', $share->getSharedBy());
		$this->assertSame($node, $share->getNode());
		$this->assertEquals(Share::SHARE_TYPE_GROUP, $share->getShareType());
	}

	/**
	 * @dataProvider storageAndFileNameProvider
	 */
	public function testGetAllShared($storageStringId, $fileName1, $fileName2) {
		$storageId = $this->createTestStorageEntry($storageStringId);
		$fileId1 = $this->createTestFileEntry($fileName1, $storageId);
		$fileId2 = $this->createTestFileEntry($fileName2, $storageId);
		$id0 = $this->addShareToDB(Share::SHARE_TYPE_USER, 'user0', 'user1', 'user1',
			'file', $fileId1, 'myTarget', 31, null, null, null);
		$id1 = $this->addShareToDB(Share::SHARE_TYPE_GROUP, 'group0', 'user1', 'user1',
			'file', $fileId2, 'myTarget', 31, null, null, null);
		$id2 = $this->addShareToDB(Share::SHARE_TYPE_USER, 'user0', 'user1', 'user1',
			'file', $fileId2, 'myTarget', 31, null, null, null);

		$user0 = $this->createMock(IUser::class);
		$user0->method('getUID')->willReturn('user0');
		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');

		$this->userManager->method('get')->willReturnMap([
			['user0', $user0],
			['user1', $user1],
		]);

		$group0 = $this->createMock(IGroup::class);
		$group0->method('getGID')->willReturn('group0');

		$this->groupManager->method('get')->with('group0')->willReturn($group0);
		$this->groupManager->method('getUserGroups')->with($user0)->willReturn([$group0]);

		$this->rootFolder->method('getUserFolder')->with('user1')->will($this->returnSelf());
		$node1 = $this->createMock(File::class);
		$node1->method('getId')->willReturn($fileId1);
		$node2 = $this->createMock(File::class);
		$node2->method('getId')->willReturn($fileId2);
		$this->rootFolder->method('getById')->willReturnCallback(function ($id) use ($node1, $node2) {
			if ($node1->getId() === $id) {
				return [$node1];
			}
			return [$node2];
		});

		// Check targeting specific node with $node1
		$recShares = $this->provider->getAllSharedWith('user0', $node1);
		$this->assertCount(1, $recShares);
		$share = $recShares[0];
		$this->assertEquals($id0, $share->getId());
		$this->assertSame('user0', $share->getSharedWith());
		$this->assertSame('user1', $share->getShareOwner());
		$this->assertSame('user1', $share->getSharedBy());
		$this->assertEquals(Share::SHARE_TYPE_USER, $share->getShareType());
		$shareNode = $share->getNode();
		$this->assertSame($node1, $shareNode);

		// Check targeting specific node with $node2
		$recShares = $this->provider->getAllSharedWith('user0', $node2);
		$this->assertCount(2, $recShares);
		foreach ($recShares as $share) {
			if ($share->getShareType() === Share::SHARE_TYPE_USER) {
				$this->assertEquals($id2, $share->getId());
				$this->assertSame('user0', $share->getSharedWith());
				$this->assertSame('user1', $share->getShareOwner());
				$this->assertSame('user1', $share->getSharedBy());
				$shareNode = $share->getNode();
				$this->assertSame($node2, $shareNode);
			} else {
				$this->assertEquals($id1, $share->getId());
				$this->assertSame('group0', $share->getSharedWith());
				$this->assertSame('user1', $share->getShareOwner());
				$this->assertSame('user1', $share->getSharedBy());
				$shareNode = $share->getNode();
				$this->assertSame($node2, $shareNode);
			}
		}

		// Check targeting all nodes with null
		$recShares = $this->provider->getAllSharedWith('user0', null);
		$this->assertCount(3, $recShares);
	}

	/**
	 * Check scenario with group and user of the same name
	 *
	 * 1. create two users "user1" and "user2"
	 * 2. create a user "meow" (don't add to any group)
	 * 3. add user "user1" in group "meow"
	 * 4. login as "user2"
	 * 5. create a folder "for_meow_user" and share with the user "meow"
	 * 6. create another folder "for_meow_group" and share with the group "meow"
	 * 7. login as "user1": only "for_meow_group" must appear
	 * 8. login as "meow": only "for_meow_user" must appear
	 *
	 * @dataProvider storageAndFileNameProvider
	 */
	public function testGetAllSharedSameUserGroup($storageStringId, $fileName1, $fileName2) {
		$storageId = $this->createTestStorageEntry($storageStringId);

		// 1. create two users "user1" and "user2"
		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');
		$user2 = $this->createMock(IUser::class);
		$user2->method('getUID')->willReturn('user2');

		// 2. create a user "meow" (don't add to any group)
		$userMeow = $this->createMock(IUser::class);
		$userMeow->method('getUID')->willReturn('meow');

		// 3. add user "user1" in group "meow"
		$groupMeow = $this->createMock(IGroup::class);
		$groupMeow->method('getGID')->willReturn('meow');

		$this->groupManager->method('get')->with('meow')->willReturn($groupMeow);
		$this->groupManager->method('getUserGroups')->willReturnCallback(function ($user) use ($groupMeow) {
			$userUID = $user->getUID();
			if ($userUID === 'user1') {
				return [$groupMeow];
			}
			return [];
		});

		// 4. login as "user2"
		// 5. create a file $fileName1 and share with the user "meow"
		$fileId1 = $this->createTestFileEntry($fileName1, $storageId);
		$id1 = $this->addShareToDB(Share::SHARE_TYPE_USER, 'meow', 'user2', 'user2',
			'file', $fileId1, 'for_meow_user', 31, null, null, null);

		// 6. create another folder "for_meow_group" and share with the group "meow"
		$fileId2 = $this->createTestFileEntry($fileName2, $storageId);
		$id2 = $this->addShareToDB(Share::SHARE_TYPE_GROUP, 'meow', 'user2', 'user2',
			'file', $fileId2, 'for_meow_group', 31, null, null, null);

		// Setup mocking
		$this->userManager->method('get')->willReturnMap([
			['user1', $user1],
			['user2', $user2],
			['meow', $userMeow],
		]);

		$this->rootFolder->method('getUserFolder')->with('user2')->will($this->returnSelf());
		$node1 = $this->createMock(File::class);
		$node1->method('getId')->willReturn($fileId1);
		$node2 = $this->createMock(File::class);
		$node2->method('getId')->willReturn($fileId2);
		$this->rootFolder->method('getById')->willReturnCallback(function ($id) use ($node1, $node2) {
			if ($node1->getId() === $id) {
				return [$node1];
			}
			return [$node2];
		});

		$recShares = $this->provider->getAllSharedWith('meow', null);
		$this->assertCount(1, $recShares);
		$share = $recShares[0];
		$this->assertEquals($id1, $share->getId());
		$this->assertSame('meow', $share->getSharedWith());
		$this->assertSame('user2', $share->getShareOwner());
		$this->assertSame('user2', $share->getSharedBy());
		$this->assertEquals(Share::SHARE_TYPE_USER, $share->getShareType());
		$shareNode = $share->getNode();
		$this->assertSame($node1, $shareNode);

		$recShares = $this->provider->getAllSharedWith('user1', null);
		$this->assertCount(1, $recShares);
		$share = $recShares[0];
		$this->assertEquals($id2, $share->getId());
		$this->assertSame('meow', $share->getSharedWith());
		$this->assertSame('user2', $share->getShareOwner());
		$this->assertSame('user2', $share->getSharedBy());
		$this->assertEquals(Share::SHARE_TYPE_GROUP, $share->getShareType());
		$shareNode = $share->getNode();
		$this->assertSame($node2, $shareNode);

		$recShares = $this->provider->getAllSharedWith('user2', null);
		$this->assertCount(0, $recShares);
	}

	/**
	 * Check scenario with group chunking
	 *
	 * User user1 will share file to user2 and other file to 205 groups, in which user2 is member
	 *
	 * @dataProvider storageAndFileNameProvider
	 */
	public function testGetAllSharedGroupChunking($storageStringId, $fileName1, $fileName2) {
		$storageId = $this->createTestStorageEntry($storageStringId);

		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');
		$user2 = $this->createMock(IUser::class);
		$user2->method('getUID')->willReturn('user2');

		$fileId1 = $this->createTestFileEntry($fileName1, $storageId);
		$idUser = $this->addShareToDB(Share::SHARE_TYPE_USER, 'user2', 'user1', 'user1',
			'file', $fileId1, 'for_meow_user', 31, null, null, null);

		$fileId2 = $this->createTestFileEntry($fileName2, $storageId);
		for ($i = 0; $i < 205; $i++) {
			$groupId = 'group'.$i;
			$group = $this->createMock(IGroup::class);
			$group->method('getGID')->willReturn($groupId);
			$groupArray[] = $group;
			$idGroups[] = $this->addShareToDB(Share::SHARE_TYPE_GROUP, $groupId, 'user1', 'user1',
				'file', $fileId2, 'target'.$groupId, 31, null, null, null);
		}

		$this->groupManager->method('get')->with('group')->willReturn($group);
		$this->groupManager->method('getUserGroups')->willReturnCallback(function ($user) use ($groupArray) {
			$userUID = $user->getUID();
			if ($userUID === 'user2') {
				return $groupArray;
			}
			return [];
		});

		// Setup mocking
		$this->userManager->method('get')->willReturnMap([
			['user1', $user1],
			['user2', $user2],
		]);

		$this->rootFolder->method('getUserFolder')->with('user1')->will($this->returnSelf());
		$node1 = $this->createMock(File::class);
		$node1->method('getId')->willReturn($fileId1);
		$node2 = $this->createMock(File::class);
		$node2->method('getId')->willReturn($fileId2);
		$this->rootFolder->method('getById')->willReturnCallback(function ($id) use ($node1, $node2) {
			if ($node1->getId() === $id) {
				return [$node1];
			}
			return [$node2];
		});

		$recShares = $this->provider->getAllSharedWith('user1', null);
		$this->assertCount(0, $recShares);

		$recShares = $this->provider->getAllSharedWith('user2', null);
		$this->assertCount(206, $recShares);
		foreach ($recShares as $share) {
			if ($share->getShareType() === Share::SHARE_TYPE_USER) {
				$this->assertEquals($idUser, $share->getId());
				$this->assertSame('user2', $share->getSharedWith());
				$this->assertSame('user1', $share->getShareOwner());
				$this->assertSame('user1', $share->getSharedBy());
				$shareNode = $share->getNode();
				$this->assertSame($node1, $shareNode);
			} else {
				$this->assertContains($share->getId(), $idGroups);
				$this->assertStringStartsWith('group', $share->getSharedWith());
				$this->assertSame('user1', $share->getShareOwner());
				$this->assertSame('user1', $share->getSharedBy());
				$shareNode = $share->getNode();
				$this->assertSame($node2, $shareNode);
			}
		}
	}

	public function shareTypesProvider() {
		return [
			[Share::SHARE_TYPE_USER, false],
			[Share::SHARE_TYPE_GROUP, false],
			[Share::SHARE_TYPE_USER, true],
			[Share::SHARE_TYPE_GROUP, true],
		];
	}

	/**
	 * @dataProvider shareTypesProvider
	 */
	public function testGetSharedWithWithDeletedFile($shareType, $trashed) {
		if ($trashed) {
			// exists in database but is in trash
			$storageId = $this->createTestStorageEntry('home::shareOwner');
			$deletedFileId = $this->createTestFileEntry('files_trashbin/files/test.txt.d1465553223', $storageId);
		} else {
			// fileid that doesn't exist in the database
			$deletedFileId = 123;
		}
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal($shareType),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal($deletedFileId),
				'file_target' => $qb->expr()->literal('myTarget'),
				'permissions' => $qb->expr()->literal(13),
			]);
		$this->assertEquals(1, $qb->execute());

		$file = $this->createMock(File::class);
		$this->rootFolder->method('getUserFolder')->with('shareOwner')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with($deletedFileId)->willReturn([$file]);

		$groups = [];
		foreach (\range(0, 100) as $i) {
			$group = $this->createMock(IGroup::class);
			$group->method('getGID')->willReturn('group'.$i);
			$groups[] = $group;
		}

		$group = $this->createMock(IGroup::class);
		$group->method('getGID')->willReturn('sharedWith');
		$groups[] = $group;

		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('sharedWith');
		$owner = $this->createMock(IUser::class);
		$owner->method('getUID')->willReturn('shareOwner');
		$initiator = $this->createMock(IUser::class);
		$initiator->method('getUID')->willReturn('sharedBy');

		$this->userManager->method('get')->willReturnMap([
			['sharedWith', $user],
			['shareOwner', $owner],
			['sharedBy', $initiator],
		]);
		$this->groupManager->method('getUserGroups')->with($user)->willReturn($groups);
		$this->groupManager->method('get')->with('sharedWith')->willReturn($group);

		$share = $this->provider->getSharedWith('sharedWith', $shareType, null, 1, 0);
		$this->assertCount(0, $share);
	}

	public function testGetAllSharesByNodes() {
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(42),
				'file_target' => $qb->expr()->literal('myTarget'),
				'permissions' => $qb->expr()->literal(13),
			]);
		$this->assertEquals(1, $qb->execute());
		$id = $qb->getLastInsertId();

		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(43),
				'file_target' => $qb->expr()->literal('userTarget'),
				'permissions' => $qb->expr()->literal(0),
				'parent' => $qb->expr()->literal($id),
			]);
		$this->assertEquals(1, $qb->execute());

		for ($i = 0; $i < 200; $i++) {
			$receiver = \strval($i)."sharedWith";
			$qb->insert('share')
				->values([
					'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_USER),
					'share_with' => $qb->expr()->literal($receiver),
					'uid_owner' => $qb->expr()->literal('shareOwner'),
					'uid_initiator' => $qb->expr()->literal('sharedBy'),
					'item_type'   => $qb->expr()->literal('file'),
					'file_source' => $qb->expr()->literal(42),
					'file_target' => $qb->expr()->literal('myTarget'),
					'permissions' => $qb->expr()->literal(13),
				]);
			$this->assertEquals(1, $qb->execute());
		}

		$file = $this->createMock(File::class);
		$file->method('getId')->willReturn(42);
		$this->rootFolder->method('getUserFolder')->with('shareOwner')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with(42)->willReturn([$file]);

		$share = $this->provider->getAllSharesBy('sharedBy', [Share::SHARE_TYPE_USER], [$file->getId()], false);
		$this->assertCount(201, $share);

		/** @var Share\IShare $share */
		$share = $share[0];
		$this->assertEquals($id, $share->getId());
		$this->assertEquals('sharedWith', $share->getSharedWith());
		$this->assertEquals('shareOwner', $share->getShareOwner());
		$this->assertEquals('sharedBy', $share->getSharedBy());
		$this->assertEquals(Share::SHARE_TYPE_USER, $share->getShareType());
		$this->assertEquals(13, $share->getPermissions());
		$this->assertEquals('myTarget', $share->getTarget());
	}

	public function testGetAllSharesReshare() {
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('shareOwner'),
				'item_type' => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(42),
				'file_target' => $qb->expr()->literal('myTarget'),
				'permissions' => $qb->expr()->literal(13),
			]);
		$this->assertEquals(1, $qb->execute());
		$id1 = $qb->getLastInsertId();

		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type' => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(42),
				'file_target' => $qb->expr()->literal('userTarget'),
				'permissions' => $qb->expr()->literal(0),
			]);
		$this->assertEquals(1, $qb->execute());
		$id2 = $qb->getLastInsertId();

		$file = $this->createMock(File::class);
		$file->method('getId')->willReturn(42);
		$this->rootFolder->method('getUserFolder')->with('shareOwner')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with(42)->willReturn([$file]);

		$shares = $this->provider->getAllSharesBy('shareOwner', [Share::SHARE_TYPE_USER], [$file->getId()], true);
		$this->assertCount(2, $shares);

		/** @var Share\IShare $share */
		$share = $shares[0];
		$this->assertEquals($id1, $share->getId());
		$this->assertSame('sharedWith', $share->getSharedWith());
		$this->assertSame('shareOwner', $share->getShareOwner());
		$this->assertSame('shareOwner', $share->getSharedBy());
		$this->assertEquals(Share::SHARE_TYPE_USER, $share->getShareType());
		$this->assertEquals(13, $share->getPermissions());
		$this->assertEquals('myTarget', $share->getTarget());

		$share = $shares[1];
		$this->assertEquals($id2, $share->getId());
		$this->assertSame('sharedWith', $share->getSharedWith());
		$this->assertSame('shareOwner', $share->getShareOwner());
		$this->assertSame('sharedBy', $share->getSharedBy());
		$this->assertEquals(Share::SHARE_TYPE_USER, $share->getShareType());
		$this->assertEquals(0, $share->getPermissions());
		$this->assertEquals('userTarget', $share->getTarget());
	}

	public function testGetSharesBy() {
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(42),
				'file_target' => $qb->expr()->literal('myTarget'),
				'permissions' => $qb->expr()->literal(13),
			]);
		$this->assertEquals(1, $qb->execute());
		$id = $qb->getLastInsertId();

		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy2'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(42),
				'file_target' => $qb->expr()->literal('userTarget'),
				'permissions' => $qb->expr()->literal(0),
				'parent' => $qb->expr()->literal($id),
			]);
		$this->assertEquals(1, $qb->execute());

		$file = $this->createMock(File::class);
		$this->rootFolder->method('getUserFolder')->with('shareOwner')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with(42)->willReturn([$file]);

		$share = $this->provider->getSharesBy('sharedBy', Share::SHARE_TYPE_USER, null, false, 1, 0);
		$this->assertCount(1, $share);

		/** @var Share\IShare $share */
		$share = $share[0];
		$this->assertEquals($id, $share->getId());
		$this->assertEquals('sharedWith', $share->getSharedWith());
		$this->assertEquals('shareOwner', $share->getShareOwner());
		$this->assertEquals('sharedBy', $share->getSharedBy());
		$this->assertEquals(Share::SHARE_TYPE_USER, $share->getShareType());
		$this->assertEquals(13, $share->getPermissions());
		$this->assertEquals('myTarget', $share->getTarget());
	}

	public function testGetSharesNode() {
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(42),
				'file_target' => $qb->expr()->literal('myTarget'),
				'permissions' => $qb->expr()->literal(13),
			]);
		$this->assertEquals(1, $qb->execute());
		$id = $qb->getLastInsertId();

		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type'   => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(43),
				'file_target' => $qb->expr()->literal('userTarget'),
				'permissions' => $qb->expr()->literal(0),
				'parent' => $qb->expr()->literal($id),
			]);
		$this->assertEquals(1, $qb->execute());

		$file = $this->createMock(File::class);
		$file->method('getId')->willReturn(42);
		$this->rootFolder->method('getUserFolder')->with('shareOwner')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with(42)->willReturn([$file]);

		$share = $this->provider->getSharesBy('sharedBy', Share::SHARE_TYPE_USER, $file, false, 1, 0);
		$this->assertCount(1, $share);

		/** @var Share\IShare $share */
		$share = $share[0];
		$this->assertEquals($id, $share->getId());
		$this->assertEquals('sharedWith', $share->getSharedWith());
		$this->assertEquals('shareOwner', $share->getShareOwner());
		$this->assertEquals('sharedBy', $share->getSharedBy());
		$this->assertEquals(Share::SHARE_TYPE_USER, $share->getShareType());
		$this->assertEquals(13, $share->getPermissions());
		$this->assertEquals('myTarget', $share->getTarget());
	}

	public function testGetSharesReshare() {
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('shareOwner'),
				'item_type' => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(42),
				'file_target' => $qb->expr()->literal('myTarget'),
				'permissions' => $qb->expr()->literal(13),
			]);
		$this->assertEquals(1, $qb->execute());
		$id1 = $qb->getLastInsertId();

		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with' => $qb->expr()->literal('sharedWith'),
				'uid_owner' => $qb->expr()->literal('shareOwner'),
				'uid_initiator' => $qb->expr()->literal('sharedBy'),
				'item_type' => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(42),
				'file_target' => $qb->expr()->literal('userTarget'),
				'permissions' => $qb->expr()->literal(0),
			]);
		$this->assertEquals(1, $qb->execute());
		$id2 = $qb->getLastInsertId();

		$file = $this->createMock(File::class);
		$file->method('getId')->willReturn(42);
		$this->rootFolder->method('getUserFolder')->with('shareOwner')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with(42)->willReturn([$file]);

		$shares = $this->provider->getSharesBy('shareOwner', Share::SHARE_TYPE_USER, null, true, -1, 0);
		$this->assertCount(2, $shares);

		/** @var Share\IShare $share */
		$share = $shares[0];
		$this->assertEquals($id1, $share->getId());
		$this->assertSame('sharedWith', $share->getSharedWith());
		$this->assertSame('shareOwner', $share->getShareOwner());
		$this->assertSame('shareOwner', $share->getSharedBy());
		$this->assertEquals(Share::SHARE_TYPE_USER, $share->getShareType());
		$this->assertEquals(13, $share->getPermissions());
		$this->assertEquals('myTarget', $share->getTarget());

		$share = $shares[1];
		$this->assertEquals($id2, $share->getId());
		$this->assertSame('sharedWith', $share->getSharedWith());
		$this->assertSame('shareOwner', $share->getShareOwner());
		$this->assertSame('sharedBy', $share->getSharedBy());
		$this->assertEquals(Share::SHARE_TYPE_USER, $share->getShareType());
		$this->assertEquals(0, $share->getPermissions());
		$this->assertEquals('userTarget', $share->getTarget());
	}

	public function testDeleteFromSelfGroupNoCustomShare() {
		$qb = $this->dbConn->getQueryBuilder();
		$stmt = $qb->insert('share')
			->values([
				'share_type'    => $qb->expr()->literal(Share::SHARE_TYPE_GROUP),
				'share_with'    => $qb->expr()->literal('group'),
				'uid_owner'     => $qb->expr()->literal('user1'),
				'uid_initiator' => $qb->expr()->literal('user1'),
				'item_type'     => $qb->expr()->literal('file'),
				'file_source'   => $qb->expr()->literal(1),
				'file_target'   => $qb->expr()->literal('myTarget1'),
				'permissions'   => $qb->expr()->literal(2),
				'accepted'      => $qb->expr()->literal(Share::STATE_ACCEPTED)
			])->execute();
		$this->assertEquals(1, $stmt);
		$id = $qb->getLastInsertId();

		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');
		$user2 = $this->createMock(IUser::class);
		$user2->method('getUID')->willReturn('user2');
		$this->userManager->method('get')->will($this->returnValueMap([
			['user1', $user1],
			['user2', $user2],
		]));

		$group = $this->createMock(IGroup::class);
		$group->method('getGID')->willReturn('group');
		$group->method('inGroup')->with($user2)->willReturn(true);
		$this->groupManager->method('get')->with('group')->willReturn($group);

		$file = $this->createMock(File::class);
		$file->method('getId')->willReturn(1);

		$this->rootFolder->method('getUserFolder')->with('user1')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with(1)->willReturn([$file]);

		$share = $this->provider->getShareById($id);

		$this->provider->deleteFromSelf($share, 'user2');

		$qb = $this->dbConn->getQueryBuilder();
		$stmt = $qb->select('*')
			->from('share')
			->where($qb->expr()->eq('share_type', $qb->createNamedParameter(2)))
			->execute();

		$shares = $stmt->fetchAll();
		$stmt->closeCursor();

		$this->assertCount(1, $shares);
		$share2 = $shares[0];
		$this->assertEquals($id, $share2['parent']);
		$this->assertEquals(2, $share2['permissions']);
		$this->assertEquals('user2', $share2['share_with']);
		$this->assertEquals(Share::STATE_REJECTED, $share2['accepted']);
	}

	public function testDeleteFromSelfGroupAlreadyCustomShare() {
		$qb = $this->dbConn->getQueryBuilder();
		$stmt = $qb->insert('share')
			->values([
				'share_type'    => $qb->expr()->literal(Share::SHARE_TYPE_GROUP),
				'share_with'    => $qb->expr()->literal('group'),
				'uid_owner'     => $qb->expr()->literal('user1'),
				'uid_initiator' => $qb->expr()->literal('user1'),
				'item_type'     => $qb->expr()->literal('file'),
				'file_source'   => $qb->expr()->literal(1),
				'file_target'   => $qb->expr()->literal('myTarget1'),
				'permissions'   => $qb->expr()->literal(2),
				'accepted'      => $qb->expr()->literal(Share::STATE_ACCEPTED)
			])->execute();
		$this->assertEquals(1, $stmt);
		$id = $qb->getLastInsertId();

		$qb = $this->dbConn->getQueryBuilder();
		$stmt = $qb->insert('share')
			->values([
				'share_type'    => $qb->expr()->literal(2),
				'share_with'    => $qb->expr()->literal('user2'),
				'uid_owner'     => $qb->expr()->literal('user1'),
				'uid_initiator' => $qb->expr()->literal('user1'),
				'item_type'     => $qb->expr()->literal('file'),
				'file_source'   => $qb->expr()->literal(1),
				'file_target'   => $qb->expr()->literal('myTarget1'),
				'permissions'   => $qb->expr()->literal(2),
				'parent'        => $qb->expr()->literal($id),
				'accepted'      => $qb->expr()->literal(Share::STATE_ACCEPTED)
			])->execute();
		$this->assertEquals(1, $stmt);

		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');
		$user2 = $this->createMock(IUser::class);
		$user2->method('getUID')->willReturn('user2');
		$this->userManager->method('get')->will($this->returnValueMap([
			['user1', $user1],
			['user2', $user2],
		]));

		$group = $this->createMock(IGroup::class);
		$group->method('getGID')->willReturn('group');
		$group->method('inGroup')->with($user2)->willReturn(true);
		$this->groupManager->method('get')->with('group')->willReturn($group);

		$file = $this->createMock(File::class);
		$file->method('getId')->willReturn(1);

		$this->rootFolder->method('getUserFolder')->with('user1')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with(1)->willReturn([$file]);

		$share = $this->provider->getShareById($id);

		$this->provider->deleteFromSelf($share, 'user2');

		$qb = $this->dbConn->getQueryBuilder();
		$stmt = $qb->select('*')
			->from('share')
			->where($qb->expr()->eq('share_type', $qb->createNamedParameter(2)))
			->execute();

		$shares = $stmt->fetchAll();
		$stmt->closeCursor();

		$this->assertCount(1, $shares);
		$share2 = $shares[0];
		$this->assertEquals($id, $share2['parent']);
		$this->assertEquals(2, $share2['permissions']);
		$this->assertEquals('user2', $share2['share_with']);
		$this->assertEquals(Share::STATE_REJECTED, $share2['accepted']);
	}

	/**
	 * @expectedException \OC\Share20\Exception\ProviderException
	 * @expectedExceptionMessage  Recipient not in receiving group
	 */
	public function testDeleteFromSelfGroupUserNotInGroup() {
		$qb = $this->dbConn->getQueryBuilder();
		$stmt = $qb->insert('share')
			->values([
				'share_type'    => $qb->expr()->literal(Share::SHARE_TYPE_GROUP),
				'share_with'    => $qb->expr()->literal('group'),
				'uid_owner'     => $qb->expr()->literal('user1'),
				'uid_initiator' => $qb->expr()->literal('user1'),
				'item_type'     => $qb->expr()->literal('file'),
				'file_source'   => $qb->expr()->literal(1),
				'file_target'   => $qb->expr()->literal('myTarget1'),
				'permissions'   => $qb->expr()->literal(2)
			])->execute();
		$this->assertEquals(1, $stmt);
		$id = $qb->getLastInsertId();

		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');
		$user2 = $this->createMock(IUser::class);
		$user2->method('getUID')->willReturn('user2');
		$this->userManager->method('get')->will($this->returnValueMap([
			['user1', $user1],
			['user2', $user2],
		]));

		$group = $this->createMock(IGroup::class);
		$group->method('getGID')->willReturn('group');
		$group->method('inGroup')->with($user2)->willReturn(false);
		$this->groupManager->method('get')->with('group')->willReturn($group);

		$file = $this->createMock(File::class);
		$file->method('getId')->willReturn(1);

		$this->rootFolder->method('getUserFolder')->with('user1')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with(1)->willReturn([$file]);

		$share = $this->provider->getShareById($id);

		$this->provider->deleteFromSelf($share, 'user2');
	}

	/**
	 * @expectedException \OC\Share20\Exception\ProviderException
	 * @expectedExceptionMessage Group "group" does not exist
	 */
	public function testDeleteFromSelfGroupDoesNotExist() {
		$qb = $this->dbConn->getQueryBuilder();
		$stmt = $qb->insert('share')
			->values([
				'share_type'    => $qb->expr()->literal(\OCP\Share::SHARE_TYPE_GROUP),
				'share_with'    => $qb->expr()->literal('group'),
				'uid_owner'     => $qb->expr()->literal('user1'),
				'uid_initiator' => $qb->expr()->literal('user1'),
				'item_type'     => $qb->expr()->literal('file'),
				'file_source'   => $qb->expr()->literal(1),
				'file_target'   => $qb->expr()->literal('myTarget1'),
				'permissions'   => $qb->expr()->literal(2)
			])->execute();
		$this->assertEquals(1, $stmt);
		$id = $qb->getLastInsertId();

		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');
		$user2 = $this->createMock(IUser::class);
		$user2->method('getUID')->willReturn('user2');
		$this->userManager->method('get')->will($this->returnValueMap([
			['user1', $user1],
			['user2', $user2],
		]));

		$this->groupManager->method('get')->with('group')->willReturn(null);

		$file = $this->createMock(\OCP\Files\File::class);
		$file->method('getId')->willReturn(1);

		$this->rootFolder->method('getUserFolder')->with('user1')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with(1)->willReturn([$file]);

		$share = $this->provider->getShareById($id);

		$this->provider->deleteFromSelf($share, 'user2');
	}

	public function testDeleteFromSelfUser() {
		$qb = $this->dbConn->getQueryBuilder();
		$stmt = $qb->insert('share')
			->values([
				'share_type'    => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with'    => $qb->expr()->literal('user2'),
				'uid_owner'     => $qb->expr()->literal('user1'),
				'uid_initiator' => $qb->expr()->literal('user1'),
				'item_type'     => $qb->expr()->literal('file'),
				'file_source'   => $qb->expr()->literal(1),
				'file_target'   => $qb->expr()->literal('myTarget1'),
				'permissions'   => $qb->expr()->literal(2)
			])->execute();
		$this->assertEquals(1, $stmt);
		$id = $qb->getLastInsertId();

		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');
		$user2 = $this->createMock(IUser::class);
		$user2->method('getUID')->willReturn('user2');
		$this->userManager->method('get')->will($this->returnValueMap([
			['user1', $user1],
			['user2', $user2],
		]));

		$file = $this->createMock(File::class);
		$file->method('getId')->willReturn(1);

		$this->rootFolder->method('getUserFolder')->with('user1')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with(1)->willReturn([$file]);

		$share = $this->provider->getShareById($id);

		$this->provider->deleteFromSelf($share, 'user2');

		$qb = $this->dbConn->getQueryBuilder();
		$stmt = $qb->select('*')
			->from('share')
			->where($qb->expr()->eq('id', $qb->createNamedParameter($id)))
			->execute();

		$shares = $stmt->fetchAll();
		$stmt->closeCursor();

		$this->assertCount(1, $shares);
		$this->assertEquals($id, $shares[0]['id']);
		$this->assertEquals(Share::STATE_REJECTED, $shares[0]['accepted']);
	}

	/**
	 * @expectedException \OC\Share20\Exception\ProviderException
	 * @expectedExceptionMessage Recipient does not match
	 */
	public function testDeleteFromSelfUserNotRecipient() {
		$qb = $this->dbConn->getQueryBuilder();
		$stmt = $qb->insert('share')
			->values([
				'share_type'    => $qb->expr()->literal(Share::SHARE_TYPE_USER),
				'share_with'    => $qb->expr()->literal('user2'),
				'uid_owner'     => $qb->expr()->literal('user1'),
				'uid_initiator' => $qb->expr()->literal('user1'),
				'item_type'     => $qb->expr()->literal('file'),
				'file_source'   => $qb->expr()->literal(1),
				'file_target'   => $qb->expr()->literal('myTarget1'),
				'permissions'   => $qb->expr()->literal(2)
			])->execute();
		$this->assertEquals(1, $stmt);
		$id = $qb->getLastInsertId();

		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');
		$user2 = $this->createMock(IUser::class);
		$user2->method('getUID')->willReturn('user2');
		$user3 = $this->createMock(IUser::class);
		$this->userManager->method('get')->will($this->returnValueMap([
			['user1', $user1],
			['user2', $user2],
		]));

		$file = $this->createMock(File::class);
		$file->method('getId')->willReturn(1);

		$this->rootFolder->method('getUserFolder')->with('user1')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with(1)->willReturn([$file]);

		$share = $this->provider->getShareById($id);

		$this->provider->deleteFromSelf($share, $user3);
	}

	/**
	 * @expectedException \OC\Share20\Exception\ProviderException
	 * @expectedExceptionMessage Invalid share type 3
	 */
	public function testDeleteFromSelfLink() {
		$qb = $this->dbConn->getQueryBuilder();
		$stmt = $qb->insert('share')
			->values([
				'share_type' => $qb->expr()->literal(Share::SHARE_TYPE_LINK),
				'uid_owner' => $qb->expr()->literal('user1'),
				'uid_initiator' => $qb->expr()->literal('user1'),
				'item_type' => $qb->expr()->literal('file'),
				'file_source' => $qb->expr()->literal(1),
				'file_target' => $qb->expr()->literal('myTarget1'),
				'permissions' => $qb->expr()->literal(2),
				'token' => $qb->expr()->literal('token'),
			])->execute();
		$this->assertEquals(1, $stmt);
		$id = $qb->getLastInsertId();

		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');
		$this->userManager->method('get')->will($this->returnValueMap([
			['user1', $user1],
		]));

		$file = $this->createMock(File::class);
		$file->method('getId')->willReturn(1);

		$this->rootFolder->method('getUserFolder')->with('user1')->will($this->returnSelf());
		$this->rootFolder->method('getById')->with(1)->willReturn([$file]);

		$share = $this->provider->getShareById($id);

		$this->provider->deleteFromSelf($share, $user1);
	}

	/**
	 * @expectedException \OC\Share20\Exception\ProviderException
	 * @expectedExceptionMessage Can't update share of recipient for share type 3
	 */
	public function testUpdateForRecipientWrongType() {
		$share = $this->createMock(IShare::class);
		$share->method('getShareType')->willReturn(\OCP\Share::SHARE_TYPE_LINK);

		$this->provider->updateForRecipient($share, 'recipient1');
	}

	public function testUpdateUser() {
		$id = $this->addShareToDB(Share::SHARE_TYPE_USER, 'user0', 'user1', 'user2',
			'file', 42, 'target', 31, null, null);

		$users = [];
		for ($i = 0; $i < 6; $i++) {
			$user = $this->createMock(IUser::class);
			$user->method('getUID')->willReturn('user'.$i);
			$users['user'.$i] = $user;
		}

		$this->userManager->method('get')->will(
			$this->returnCallback(function ($userId) use ($users) {
				return $users[$userId];
			})
		);

		$file1 = $this->createMock(File::class);
		$file1->method('getId')->willReturn(42);
		$file2 = $this->createMock(File::class);
		$file2->method('getId')->willReturn(43);

		$folder1 = $this->createMock(Folder::class);
		$folder1->method('getById')->with(42)->willReturn([$file1]);
		$folder2 = $this->createMock(Folder::class);
		$folder2->method('getById')->with(43)->willReturn([$file2]);

		$this->rootFolder->method('getUserFolder')->will($this->returnValueMap([
			['user2', $folder1],
			['user5', $folder2],
		]));

		$share = $this->provider->getShareById($id);

		$share->setSharedWith('user3');
		$share->setSharedBy('user4');
		$share->setShareOwner('user5');
		$share->setNode($file2);
		$share->setPermissions(1);

		$share2 = $this->provider->update($share);

		$this->assertEquals($id, $share2->getId());
		$this->assertSame('user3', $share2->getSharedWith());
		$this->assertSame('user4', $share2->getSharedBy());
		$this->assertSame('user5', $share2->getShareOwner());
		$this->assertSame(1, $share2->getPermissions());
	}

	public function testUpdateLink() {
		$id = $this->addShareToDB(Share::SHARE_TYPE_LINK, null, 'user1', 'user2',
			'file', 42, 'target', 31, 'tehtoken', null, null, 'some_name');

		$users = [];
		for ($i = 0; $i < 6; $i++) {
			$user = $this->createMock(IUser::class);
			$user->method('getUID')->willReturn('user'.$i);
			$users['user'.$i] = $user;
		}

		$this->userManager->method('get')->will(
			$this->returnCallback(function ($userId) use ($users) {
				return $users[$userId];
			})
		);

		$file1 = $this->createMock(File::class);
		$file1->method('getId')->willReturn(42);
		$file2 = $this->createMock(File::class);
		$file2->method('getId')->willReturn(43);

		$folder1 = $this->createMock(Folder::class);
		$folder1->method('getById')->with(42)->willReturn([$file1]);
		$folder2 = $this->createMock(Folder::class);
		$folder2->method('getById')->with(43)->willReturn([$file2]);

		$this->rootFolder->method('getUserFolder')->will($this->returnValueMap([
			['user2', $folder1],
			['user5', $folder2],
		]));

		$share = $this->provider->getShareById($id);

		$share->setPassword('password');
		$share->setSharedBy('user4');
		$share->setShareOwner('user5');
		$share->setNode($file2);
		$share->setPermissions(1);
		$share->setToken('anothertoken');
		$share->setName('another_name');

		$share2 = $this->provider->update($share);

		$this->assertEquals($id, $share2->getId());
		$this->assertEquals('password', $share->getPassword());
		$this->assertSame('user4', $share2->getSharedBy());
		$this->assertSame('user5', $share2->getShareOwner());
		$this->assertSame(1, $share2->getPermissions());
		$this->assertSame('anothertoken', $share2->getToken());
		$this->assertSame('another_name', $share2->getName());

		$share->setName(null);

		$share2 = $this->provider->update($share);
		$this->assertNull($share2->getName());
	}

	public function testUpdateLinkRemovePassword() {
		$id = $this->addShareToDB(Share::SHARE_TYPE_LINK, 'foo', 'user1', 'user2',
			'file', 42, 'target', 31, null, null);

		$users = [];
		for ($i = 0; $i < 6; $i++) {
			$user = $this->createMock(IUser::class);
			$user->method('getUID')->willReturn('user'.$i);
			$users['user'.$i] = $user;
		}

		$this->userManager->method('get')->will(
			$this->returnCallback(function ($userId) use ($users) {
				return $users[$userId];
			})
		);

		$file1 = $this->createMock(File::class);
		$file1->method('getId')->willReturn(42);
		$file2 = $this->createMock(File::class);
		$file2->method('getId')->willReturn(43);

		$folder1 = $this->createMock(Folder::class);
		$folder1->method('getById')->with(42)->willReturn([$file1]);
		$folder2 = $this->createMock(Folder::class);
		$folder2->method('getById')->with(43)->willReturn([$file2]);

		$this->rootFolder->method('getUserFolder')->will($this->returnValueMap([
			['user2', $folder1],
			['user5', $folder2],
		]));

		$share = $this->provider->getShareById($id);

		$share->setPassword(null);
		$share->setSharedBy('user4');
		$share->setShareOwner('user5');
		$share->setNode($file2);
		$share->setPermissions(1);

		$share2 = $this->provider->update($share);

		$this->assertEquals($id, $share2->getId());
		$this->assertNull($share->getPassword());
		$this->assertSame('user4', $share2->getSharedBy());
		$this->assertSame('user5', $share2->getShareOwner());
		$this->assertSame(1, $share2->getPermissions());
	}

	public function testUpdateGroupNoSub() {
		$id = $this->addShareToDB(Share::SHARE_TYPE_GROUP, 'group0', 'user1', 'user2',
			'file', 42, 'target', 31, null, null);

		$users = [];
		for ($i = 0; $i < 6; $i++) {
			$user = $this->createMock(IUser::class);
			$user->method('getUID')->willReturn('user'.$i);
			$users['user'.$i] = $user;
		}

		$this->userManager->method('get')->will(
			$this->returnCallback(function ($userId) use ($users) {
				return $users[$userId];
			})
		);

		$groups = [];
		for ($i = 0; $i < 2; $i++) {
			$group = $this->createMock(IGroup::class);
			$group->method('getGID')->willReturn('group'.$i);
			$groups['group'.$i] = $group;
		}

		$this->groupManager->method('get')->will(
			$this->returnCallback(function ($groupId) use ($groups) {
				return $groups[$groupId];
			})
		);

		$file1 = $this->createMock(File::class);
		$file1->method('getId')->willReturn(42);
		$file2 = $this->createMock(File::class);
		$file2->method('getId')->willReturn(43);

		$folder1 = $this->createMock(Folder::class);
		$folder1->method('getById')->with(42)->willReturn([$file1]);
		$folder2 = $this->createMock(Folder::class);
		$folder2->method('getById')->with(43)->willReturn([$file2]);

		$this->rootFolder->method('getUserFolder')->will($this->returnValueMap([
			['user2', $folder1],
			['user5', $folder2],
		]));

		$share = $this->provider->getShareById($id);

		$share->setSharedWith('group0');
		$share->setSharedBy('user4');
		$share->setShareOwner('user5');
		$share->setNode($file2);
		$share->setPermissions(1);

		$share2 = $this->provider->update($share);

		$this->assertEquals($id, $share2->getId());
		// Group shares do not allow updating the recipient
		$this->assertSame('group0', $share2->getSharedWith());
		$this->assertSame('user4', $share2->getSharedBy());
		$this->assertSame('user5', $share2->getShareOwner());
		$this->assertSame(1, $share2->getPermissions());
	}

	public function testUpdateGroupSubShares() {
		$id = $this->addShareToDB(Share::SHARE_TYPE_GROUP, 'group0', 'user1', 'user2',
			'file', 42, 'target', 31, null, null, null, null, \OCP\Share::STATE_PENDING);

		$id2 = $this->addShareToDB(2, 'user0', 'user1', 'user2',
			'file', 42, 'mytarget', 31, null, null, $id, null, \OCP\Share::STATE_ACCEPTED);

		$id3 = $this->addShareToDB(2, 'user3', 'user1', 'user2',
			'file', 42, 'mytarget2', 0, null, null, $id, null, \OCP\Share::STATE_REJECTED);

		$users = [];
		for ($i = 0; $i < 6; $i++) {
			$user = $this->createMock(IUser::class);
			$user->method('getUID')->willReturn('user'.$i);
			$users['user'.$i] = $user;
		}

		$this->userManager->method('get')->will(
			$this->returnCallback(function ($userId) use ($users) {
				return $users[$userId];
			})
		);

		$groups = [];
		for ($i = 0; $i < 2; $i++) {
			$group = $this->createMock(IGroup::class);
			$group->method('getGID')->willReturn('group'.$i);
			$groups['group'.$i] = $group;
		}

		$this->groupManager->method('get')->will(
			$this->returnCallback(function ($groupId) use ($groups) {
				return $groups[$groupId];
			})
		);

		$file1 = $this->createMock(File::class);
		$file1->method('getId')->willReturn(42);
		$file2 = $this->createMock(File::class);
		$file2->method('getId')->willReturn(43);

		$folder1 = $this->createMock(Folder::class);
		$folder1->method('getById')->with(42)->willReturn([$file1]);
		$folder2 = $this->createMock(Folder::class);
		$folder2->method('getById')->with(43)->willReturn([$file2]);

		$this->rootFolder->method('getUserFolder')->will($this->returnValueMap([
			['user2', $folder1],
			['user5', $folder2],
		]));

		$share = $this->provider->getShareById($id);

		$share->setSharedWith('group0');
		$share->setSharedBy('user4');
		$share->setShareOwner('user5');
		$share->setNode($file2);
		$share->setPermissions(1);

		$share2 = $this->provider->update($share);

		$this->assertEquals($id, $share2->getId());
		// Group shares do not allow updating the recipient
		$this->assertSame('group0', $share2->getSharedWith());
		$this->assertSame('user4', $share2->getSharedBy());
		$this->assertSame('user5', $share2->getShareOwner());
		$this->assertSame(1, $share2->getPermissions());

		$qb = $this->dbConn->getQueryBuilder();
		$stmt = $qb->select('*')
			->from('share')
			->where($qb->expr()->eq('parent', $qb->createNamedParameter($id)))
			->orderBy('id')
			->execute();

		$shares = $stmt->fetchAll();

		$this->assertSame('user0', $shares[0]['share_with']);
		$this->assertSame('user4', $shares[0]['uid_initiator']);
		$this->assertSame('user5', $shares[0]['uid_owner']);
		$this->assertSame(1, (int)$shares[0]['permissions']);
		$this->assertSame(\OCP\Share::STATE_ACCEPTED, (int)$shares[0]['accepted']);

		$this->assertSame('user3', $shares[1]['share_with']);
		$this->assertSame('user4', $shares[1]['uid_initiator']);
		$this->assertSame('user5', $shares[1]['uid_owner']);
		$this->assertSame(1, (int)$shares[1]['permissions'], 'permissions adjusted from 0 to updated value from parent');
		$this->assertSame(\OCP\Share::STATE_REJECTED, (int)$shares[1]['accepted']);

		$stmt->closeCursor();
	}

	public function testMoveCallsUpdateForRecipient() {
		$share = $this->createMock(IShare::class);

		$provider = $this->getMockBuilder(DefaultShareProvider::class)
			->disableOriginalConstructor()
			->setMethods(['updateForRecipient'])
			->getMock();

		$provider->expects($this->once())
			->method('updateForRecipient')
			->with($share, 'recipient1')
			->will($this->returnArgument(0));

		$returnedShare = $provider->move($share, 'recipient1');

		$this->assertSame($share, $returnedShare);
	}

	public function testMoveUserShare() {
		$id = $this->addShareToDB(Share::SHARE_TYPE_USER, 'user0', 'user1', 'user1', 'file',
			42, 'mytaret', 31, null, null);

		$user0 = $this->createMock(IUser::class);
		$user0->method('getUID')->willReturn('user0');
		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');

		$this->userManager->method('get')->will($this->returnValueMap([
			['user0', $user0],
			['user1', $user1],
		]));

		$file = $this->createMock(File::class);
		$file->method('getId')->willReturn(42);

		$this->rootFolder->method('getUserFolder')->with('user1')->will($this->returnSelf());
		$this->rootFolder->method('getById')->willReturn([$file]);

		$share = $this->provider->getShareById($id, null);

		$share->setTarget('/newTarget');
		$this->provider->updateForRecipient($share, 'user0');

		$share = $this->provider->getShareById($id, null);
		$this->assertSame('/newTarget', $share->getTarget());
	}

	public function testMoveGroupShare() {
		$id = $this->addShareToDB(Share::SHARE_TYPE_GROUP, 'group0', 'user1', 'user1', 'file',
			42, 'mytaret', 31, null, null);

		$user0 = $this->createMock(IUser::class);
		$user0->method('getUID')->willReturn('user0');
		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');

		$group0 = $this->createMock(IGroup::class);
		$group0->method('getGID')->willReturn('group0');
		$group0->method('inGroup')->with($user0)->willReturn(true);

		$this->groupManager->method('get')->with('group0')->willReturn($group0);

		$this->userManager->method('get')->will($this->returnValueMap([
			['user0', $user0],
			['user1', $user1],
		]));

		$folder = $this->createMock(Folder::class);
		$folder->method('getId')->willReturn(42);

		$this->rootFolder->method('getUserFolder')->with('user1')->will($this->returnSelf());
		$this->rootFolder->method('getById')->willReturn([$folder]);

		$share = $this->provider->getShareById($id, 'user0');

		$share->setTarget('/newTarget');
		$this->provider->updateForRecipient($share, 'user0');

		$share = $this->provider->getShareById($id, 'user0');
		$this->assertSame('/newTarget', $share->getTarget());

		$share->setTarget('/ultraNewTarget');
		$this->provider->updateForRecipient($share, 'user0');

		$share = $this->provider->getShareById($id, 'user0');
		$this->assertSame('/ultraNewTarget', $share->getTarget());
	}

	public function providesShareStateChanges() {
		return [
			[\OCP\Share::STATE_PENDING, \OCP\Share::STATE_ACCEPTED],
			[\OCP\Share::STATE_PENDING, \OCP\Share::STATE_REJECTED],
			[\OCP\Share::STATE_ACCEPTED, \OCP\Share::STATE_REJECTED],
			[\OCP\Share::STATE_REJECTED, \OCP\Share::STATE_ACCEPTED],
		];
	}

	/**
	 * Tests state changes for received shares and ensures that other properties
	 * like the share target stays unchanged during the operation
	 *
	 * @dataProvider providesShareStateChanges
	 */
	public function testUpdateShareState($sourceState, $targetState) {
		$id = $this->addShareToDB(Share::SHARE_TYPE_GROUP, 'group0', 'user1', 'user2',
			'file', 42, 'target', 31, null, null, null, null, \OCP\Share::STATE_PENDING);

		$id2 = $this->addShareToDB(2, 'user0', 'user1', 'user2',
			'file', 42, 'target-subshare', 0, null, null, $id, null, $sourceState);

		$user0 = $this->createMock(IUser::class);
		$user0->method('getUID')->willReturn('user0');
		$user1 = $this->createMock(IUser::class);
		$user1->method('getUID')->willReturn('user1');

		$group0 = $this->createMock(IGroup::class);
		$group0->method('getGID')->willReturn('group0');
		$group0->method('inGroup')->with($user0)->willReturn(true);

		$this->groupManager->method('get')->with('group0')->willReturn($group0);

		$this->userManager->method('get')->will($this->returnValueMap([
			['user0', $user0],
			['user1', $user1],
		]));

		$folder = $this->createMock(Folder::class);
		$folder->method('getId')->willReturn(42);

		$this->rootFolder->method('getUserFolder')->with($this->logicalOr('user1', 'user2'))->will($this->returnSelf());
		$this->rootFolder->method('getById')->willReturn([$folder]);

		$share = $this->provider->getShareById($id, 'user0');

		$this->assertEquals(31, $share->getPermissions());
		$this->assertEquals($sourceState, $share->getState());
		$this->assertEquals('target-subshare', $share->getTarget());

		$share->setState($targetState);
		$this->provider->updateForRecipient($share, 'user0');

		$updatedShare = $this->provider->getShareById($id, 'user0');

		$this->assertEquals(31, $updatedShare->getPermissions(), 'permissions were adjusted');
		$this->assertEquals($targetState, $updatedShare->getState(), 'state was adjusted');
		$this->assertEquals('target-subshare', $updatedShare->getTarget(), 'target stays unchanged');
	}

	public function dataDeleteUser() {
		return [
			[Share::SHARE_TYPE_USER, 'a', 'b', 'c', 'a', true],
			[Share::SHARE_TYPE_USER, 'a', 'b', 'c', 'b', false],
			[Share::SHARE_TYPE_USER, 'a', 'b', 'c', 'c', true],
			[Share::SHARE_TYPE_USER, 'a', 'b', 'c', 'd', false],
			[Share::SHARE_TYPE_GROUP, 'a', 'b', 'c', 'a', true],
			[Share::SHARE_TYPE_GROUP, 'a', 'b', 'c', 'b', false],
			// The group c is still valid but user c is deleted so group share stays
			[Share::SHARE_TYPE_GROUP, 'a', 'b', 'c', 'c', false],
			[Share::SHARE_TYPE_GROUP, 'a', 'b', 'c', 'd', false],
			[Share::SHARE_TYPE_LINK, 'a', 'b', 'c', 'a', true],
			// To avoid invisible link shares delete initiated link shares as well (see #22327)
			[Share::SHARE_TYPE_LINK, 'a', 'b', 'c', 'b', true],
			[Share::SHARE_TYPE_LINK, 'a', 'b', 'c', 'c', false],
			[Share::SHARE_TYPE_LINK, 'a', 'b', 'c', 'd', false],
		];
	}

	/**
	 * @dataProvider dataDeleteUser
	 *
	 * @param int $type The shareType (user/group/link)
	 * @param string $owner The owner of the share (uid)
	 * @param string $initiator The initiator of the share (uid)
	 * @param string $recipient The recipient of the share (uid/gid/pass)
	 * @param string $deletedUser The user that is deleted
	 * @param bool $rowDeleted Is the row deleted in this setup
	 */
	public function testDeleteUser($type, $owner, $initiator, $recipient, $deletedUser, $rowDeleted) {
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->setValue('share_type', $qb->createNamedParameter($type))
			->setValue('uid_owner', $qb->createNamedParameter($owner))
			->setValue('uid_initiator', $qb->createNamedParameter($initiator))
			->setValue('share_with', $qb->createNamedParameter($recipient))
			->setValue('item_type', $qb->createNamedParameter('file'))
			->setValue('item_source', $qb->createNamedParameter(42))
			->setValue('file_source', $qb->createNamedParameter(42))
			->execute();

		$id = $qb->getLastInsertId();

		$this->provider->userDeleted($deletedUser, $type);

		$qb = $this->dbConn->getQueryBuilder();
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

	public function dataDeleteUserGroup() {
		return [
			['a', 'b', 'c', 'a', true, true],
			['a', 'b', 'c', 'b', false, false],
			['a', 'b', 'c', 'c', false, true],
			['a', 'b', 'c', 'd', false, false],
		];
	}

	/**
	 * @dataProvider dataDeleteUserGroup
	 *
	 * @param string $owner The owner of the share (uid)
	 * @param string $initiator The initiator of the share (uid)
	 * @param string $recipient The recipient of the usergroup share (uid)
	 * @param string $deletedUser The user that is deleted
	 * @param bool $groupShareDeleted
	 * @param bool $userGroupShareDeleted
	 */
	public function testDeleteUserGroup($owner, $initiator, $recipient, $deletedUser, $groupShareDeleted, $userGroupShareDeleted) {
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->setValue('share_type', $qb->createNamedParameter(Share::SHARE_TYPE_GROUP))
			->setValue('uid_owner', $qb->createNamedParameter($owner))
			->setValue('uid_initiator', $qb->createNamedParameter($initiator))
			->setValue('share_with', $qb->createNamedParameter('group'))
			->setValue('item_type', $qb->createNamedParameter('file'))
			->setValue('item_source', $qb->createNamedParameter(42))
			->setValue('file_source', $qb->createNamedParameter(42))
			->execute();
		$groupId = $qb->getLastInsertId();

		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->setValue('share_type', $qb->createNamedParameter(2))
			->setValue('uid_owner', $qb->createNamedParameter($owner))
			->setValue('uid_initiator', $qb->createNamedParameter($initiator))
			->setValue('share_with', $qb->createNamedParameter($recipient))
			->setValue('item_type', $qb->createNamedParameter('file'))
			->setValue('item_source', $qb->createNamedParameter(42))
			->setValue('file_source', $qb->createNamedParameter(42))
			->execute();
		$userGroupId = $qb->getLastInsertId();

		$this->provider->userDeleted($deletedUser, Share::SHARE_TYPE_GROUP);

		$qb = $this->dbConn->getQueryBuilder();
		$qb->select('*')
			->from('share')
			->where(
				$qb->expr()->eq('id', $qb->createNamedParameter($userGroupId))
			);
		$cursor = $qb->execute();
		$data = $cursor->fetchAll();
		$cursor->closeCursor();
		$this->assertCount($userGroupShareDeleted ? 0 : 1, $data);

		$qb = $this->dbConn->getQueryBuilder();
		$qb->select('*')
			->from('share')
			->where(
				$qb->expr()->eq('id', $qb->createNamedParameter($groupId))
			);
		$cursor = $qb->execute();
		$data = $cursor->fetchAll();
		$cursor->closeCursor();
		$this->assertCount($groupShareDeleted ? 0 : 1, $data);
	}

	public function dataGroupDeleted() {
		return [
			[
				[
					'type' => Share::SHARE_TYPE_USER,
					'recipient' => 'user',
					'children' => []
				], 'group', false
			],
			[
				[
					'type' => Share::SHARE_TYPE_USER,
					'recipient' => 'user',
					'children' => []
				], 'user', false
			],
			[
				[
					'type' => Share::SHARE_TYPE_LINK,
					'recipient' => 'user',
					'children' => []
				], 'group', false
			],
			[
				[
					'type' => Share::SHARE_TYPE_GROUP,
					'recipient' => 'group1',
					'children' => [
						'foo',
						'bar'
					]
				], 'group2', false
			],
			[
				[
					'type' => Share::SHARE_TYPE_GROUP,
					'recipient' => 'group1',
					'children' => [
						'foo',
						'bar'
					]
				], 'group1', true
			],
		];
	}

	/**
	 * @dataProvider dataGroupDeleted
	 *
	 * @param $shares
	 * @param $groupToDelete
	 * @param $shouldBeDeleted
	 */
	public function testGroupDeleted($shares, $groupToDelete, $shouldBeDeleted) {
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->setValue('share_type', $qb->createNamedParameter($shares['type']))
			->setValue('uid_owner', $qb->createNamedParameter('owner'))
			->setValue('uid_initiator', $qb->createNamedParameter('initiator'))
			->setValue('share_with', $qb->createNamedParameter($shares['recipient']))
			->setValue('item_type', $qb->createNamedParameter('file'))
			->setValue('item_source', $qb->createNamedParameter(42))
			->setValue('file_source', $qb->createNamedParameter(42))
			->execute();
		$ids = [$qb->getLastInsertId()];

		foreach ($shares['children'] as $child) {
			$qb = $this->dbConn->getQueryBuilder();
			$qb->insert('share')
				->setValue('share_type', $qb->createNamedParameter(2))
				->setValue('uid_owner', $qb->createNamedParameter('owner'))
				->setValue('uid_initiator', $qb->createNamedParameter('initiator'))
				->setValue('share_with', $qb->createNamedParameter($child))
				->setValue('item_type', $qb->createNamedParameter('file'))
				->setValue('item_source', $qb->createNamedParameter(42))
				->setValue('file_source', $qb->createNamedParameter(42))
				->setValue('parent', $qb->createNamedParameter($ids[0]))
				->execute();
			$ids[] = $qb->getLastInsertId();
		}

		$this->provider->groupDeleted($groupToDelete);

		$qb = $this->dbConn->getQueryBuilder();
		$cursor = $qb->select('*')
			->from('share')
			->where($qb->expr()->in('id', $qb->createNamedParameter($ids, IQueryBuilder::PARAM_INT_ARRAY)))
			->execute();
		$data = $cursor->fetchAll();
		$cursor->closeCursor();

		$this->assertCount($shouldBeDeleted ? 0 : \count($ids), $data);
	}

	public function dataUserDeletedFromGroup() {
		return [
			['group1', 'user1', true],
			['group1', 'user2', false],
			['group2', 'user1', false],
		];
	}

	/**
	 * Given a group share with 'group1'
	 * And a user specific group share with 'user1'.
	 * User $user is deleted from group $gid.
	 *
	 * @dataProvider dataUserDeletedFromGroup
	 *
	 * @param string $group
	 * @param string $user
	 * @param bool $toDelete
	 */
	public function testUserDeletedFromGroup($group, $user, $toDelete) {
		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->setValue('share_type', $qb->createNamedParameter(Share::SHARE_TYPE_GROUP))
			->setValue('uid_owner', $qb->createNamedParameter('owner'))
			->setValue('uid_initiator', $qb->createNamedParameter('initiator'))
			->setValue('share_with', $qb->createNamedParameter('group1'))
			->setValue('item_type', $qb->createNamedParameter('file'))
			->setValue('item_source', $qb->createNamedParameter(42))
			->setValue('file_source', $qb->createNamedParameter(42));
		$qb->execute();
		$id1 = $qb->getLastInsertId();

		$qb = $this->dbConn->getQueryBuilder();
		$qb->insert('share')
			->setValue('share_type', $qb->createNamedParameter(2))
			->setValue('uid_owner', $qb->createNamedParameter('owner'))
			->setValue('uid_initiator', $qb->createNamedParameter('initiator'))
			->setValue('share_with', $qb->createNamedParameter('user1'))
			->setValue('item_type', $qb->createNamedParameter('file'))
			->setValue('item_source', $qb->createNamedParameter(42))
			->setValue('file_source', $qb->createNamedParameter(42))
			->setValue('parent', $qb->createNamedParameter($id1));
		$qb->execute();
		$id2 = $qb->getLastInsertId();

		$this->provider->userDeletedFromGroup($user, $group);

		$qb = $this->dbConn->getQueryBuilder();
		$qb->select('*')
			->from('share')
			->where($qb->expr()->eq('id', $qb->createNamedParameter($id2)));
		$cursor = $qb->execute();
		$data = $cursor->fetchAll();
		$cursor->closeCursor();

		$this->assertCount($toDelete ? 0 : 1, $data);
	}
}
