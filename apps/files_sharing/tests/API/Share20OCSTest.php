<?php
/**
 * @author Björn Schießle <bjoern@schiessle.org>
 * @author Michael Jobst <mjobst+github@tecratech.de>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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
namespace OCA\Files_Sharing\Tests\API;

use OC\OCS\Result;
use OCA\Files_Sharing\API\Share20OCS;
use OCA\Files_Sharing\Service\NotificationPublisher;
use OCA\Files_Sharing\SharingBlacklist;
use OCP\Files\IRootFolder;
use OCP\Files\NotFoundException;
use OCP\Files\Storage\IStorage;
use OCP\IConfig;
use OCP\IGroupManager;
use OCP\IL10N;
use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IGroup;
use OCP\IUserManager;
use OCP\Lock\ILockingProvider;
use OCP\Lock\LockedException;
use OCP\Share;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;
use Test\TestCase;
use OCP\Files\Folder;
use OCP\Files\Node;
use OCP\Share\Exceptions\ShareNotFound;
use OCP\Share\IManager;
use OCP\Files\Cache\ICache;
use OCP\Files\File;
use OCA\Files_Sharing\External\Storage;
use OCP\Share\IShare;
use OC\Files\Cache\Cache;

/**
 * Class Share20OCSTest
 *
 * @package OCA\Files_Sharing\Tests\API
 * @group DB
 */
class Share20OCSTest extends TestCase {

	/** @var \OC\Share20\Manager | \PHPUnit_Framework_MockObject_MockObject */
	private $shareManager;

	/** @var IGroupManager | \PHPUnit_Framework_MockObject_MockObject */
	private $groupManager;

	/** @var IUserManager | \PHPUnit_Framework_MockObject_MockObject */
	private $userManager;

	/** @var IRequest | \PHPUnit_Framework_MockObject_MockObject */
	private $request;

	/** @var IRootFolder | \PHPUnit_Framework_MockObject_MockObject */
	private $rootFolder;

	/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject */
	private $config;

	/** @var IURLGenerator */
	private $urlGenerator;

	/** @var IUser */
	private $currentUser;

	/** @var Share20OCS */
	private $ocs;

	/** @var IL10N */
	private $l;

	/** @var NotificationPublisher */
	private $notificationPublisher;

	private $eventDispatcher;
	/** @var SharingBlacklist */
	private $sharingBlacklist;

	protected function setUp() {
		$this->shareManager = $this->getMockBuilder(IManager::class)
			->disableOriginalConstructor()
			->getMock();
		$this->shareManager
			->expects($this->any())
			->method('shareApiEnabled')
			->willReturn(true);
		$this->groupManager = $this->createMock(IGroupManager::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->request = $this->createMock(IRequest::class);
		$this->rootFolder = $this->createMock(IRootFolder::class);
		$this->urlGenerator = $this->createMock(IURLGenerator::class);
		$this->currentUser = $this->createMock(IUser::class);
		$this->currentUser->method('getUID')->willReturn('currentUser');

		$this->userManager->expects($this->any())->method('userExists')->willReturn(true);

		$this->l = $this->createMock(IL10N::class);
		$this->l->method('t')
			->will($this->returnCallback(function ($text, $parameters = []) {
				return \vsprintf($text, $parameters);
			}));

		$this->config = $this->createMock(IConfig::class);
		$this->config->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'shareapi_default_permissions', \OCP\Constants::PERMISSION_ALL, \OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_CREATE],
				['core', 'shareapi_auto_accept_share', 'yes', 'yes'],
			]));

		$this->notificationPublisher = $this->createMock(NotificationPublisher::class);
		$this->eventDispatcher = $this->createMock(EventDispatcher::class);
		$this->sharingBlacklist = $this->createMock(SharingBlacklist::class);

		$this->ocs = new Share20OCS(
			$this->shareManager,
			$this->groupManager,
			$this->userManager,
			$this->request,
			$this->rootFolder,
			$this->urlGenerator,
			$this->currentUser,
			$this->l,
			$this->config,
			$this->notificationPublisher,
			$this->eventDispatcher,
			$this->sharingBlacklist
		);
	}

	public function tearDown() {
		parent::tearDown();
	}

	/**
	 * @return Share20OCS | \PHPUnit_Framework_MockObject_MockObject
	 */
	private function mockFormatShare() {
		return $this->getMockBuilder(Share20OCS::class)
			->setConstructorArgs([
				$this->shareManager,
				$this->groupManager,
				$this->userManager,
				$this->request,
				$this->rootFolder,
				$this->urlGenerator,
				$this->currentUser,
				$this->l,
				$this->config,
				$this->notificationPublisher,
				$this->eventDispatcher,
				$this->sharingBlacklist,
			])->setMethods(['formatShare'])
			->getMock();
	}

	private function newShare() {
		return \OC::$server->getShareManager()->newShare();
	}

	private function getGroupMock(array $attrs) {
		$groupMock = $this->getMockBuilder(IGroup::class)
			->disableOriginalConstructor()
			->getMock();

		if (isset($attrs['guid'])) {
			$groupMock->method('getGID')->willReturn($attrs['guid']);
		}
		if (isset($attrs['displayname'])) {
			$groupMock->method('getDisplayName')->willReturn($attrs['displayname']);
		}
		return $groupMock;
	}

	public function testDeleteShareShareNotFound() {
		$this->shareManager
			->expects($this->exactly(2))
			->method('getShareById')
			->will($this->returnCallback(function ($id) {
				if ($id === 'ocinternal:42' || $id === 'ocFederatedSharing:42') {
					throw new ShareNotFound();
				} else {
					throw new \Exception();
				}
			}));

		$this->shareManager->method('outgoingServer2ServerSharesAllowed')->willReturn(true);

		$expected = new Result(null, 404, 'Wrong share ID, share doesn\'t exist');
		$this->assertEquals($expected, $this->ocs->deleteShare(42));
	}

	public function testDeleteShare() {
		$node = $this->createMock(File::class);

		$share = $this->newShare();
		$share->setSharedBy($this->currentUser->getUID())
			->setNode($node);
		$this->shareManager
			->expects($this->once())
			->method('getShareById')
			->with('ocinternal:42')
			->willReturn($share);
		$this->shareManager
			->expects($this->once())
			->method('deleteShare')
			->with($share);

		$node->expects($this->once())
			->method('lock')
			->with(ILockingProvider::LOCK_SHARED);
		$node->expects($this->once())
			->method('unlock')
			->with(ILockingProvider::LOCK_SHARED);

		$expected = new Result();
		$this->assertEquals($expected, $this->ocs->deleteShare(42));
	}

	public function testDeleteShareLocked() {
		$node = $this->createMock(File::class);

		$share = $this->newShare();
		$share->setSharedBy($this->currentUser->getUID())
			->setNode($node);
		$this->shareManager
			->expects($this->once())
			->method('getShareById')
			->with('ocinternal:42')
			->willReturn($share);
		$this->shareManager
			->expects($this->never())
			->method('deleteShare')
			->with($share);

		$node->expects($this->once())
			->method('lock')
			->with(ILockingProvider::LOCK_SHARED)
			->will($this->throwException(new LockedException('mypath')));
		$node->expects($this->never())
			->method('unlock')
			->with(ILockingProvider::LOCK_SHARED);

		$expected = new Result(null, 404, 'could not delete share');
		$this->assertEquals($expected, $this->ocs->deleteShare(42));
	}

	/*
	 * FIXME: Enable once we have a federated Share Provider

	public function testGetGetShareNotExists() {
		$this->shareManager
			->expects($this->once())
			->method('getShareById')
			->with('ocinternal:42')
			->will($this->throwException(new \OC\Share20\Exception\ShareNotFound()));

		$expected = new \OC\OCS\Result(null, 404, 'wrong share ID, share doesn\'t exist.');
		$this->assertEquals($expected, $this->ocs->getShare(42));
	}
	*/

	public function createShare($id, $shareType, $sharedWith, $sharedBy, $shareOwner, $path, $permissions,
								$shareTime, $expiration, $parent, $target, $mail_send, $token=null,
								$password=null, $name=null) {
		$share = $this->createMock(IShare::class);
		$share->method('getId')->willReturn($id);
		$share->method('getShareType')->willReturn($shareType);
		$share->method('getSharedWith')->willReturn($sharedWith);
		$share->method('getSharedBy')->willReturn($sharedBy);
		$share->method('getShareOwner')->willReturn($shareOwner);
		$share->method('getNode')->willReturn($path);
		$share->method('getPermissions')->willReturn($permissions);
		$time = new \DateTime();
		$time->setTimestamp($shareTime);
		$share->method('getShareTime')->willReturn($time);
		$share->method('getExpirationDate')->willReturn($expiration);
		$share->method('getTarget')->willReturn($target);
		$share->method('getMailSend')->willReturn($mail_send);
		$share->method('getToken')->willReturn($token);
		$share->method('getPassword')->willReturn($password);
		$share->method('getName')->willReturn($name);

		if ($shareType === Share::SHARE_TYPE_USER  ||
			$shareType === Share::SHARE_TYPE_GROUP ||
			$shareType === Share::SHARE_TYPE_LINK) {
			$share->method('getFullId')->willReturn('ocinternal:'.$id);
		}

		return $share;
	}

	public function dataGetShare() {
		$data = [];

		$cache = $this->getMockBuilder(Cache::class)
			->disableOriginalConstructor()
			->getMock();
		$cache->method('getNumericStorageId')->willReturn(101);

		$storage = $this->getMockBuilder(\OC\Files\Storage\Storage::class)
			->disableOriginalConstructor()
			->getMock();
		$storage->method('getId')->willReturn('STORAGE');
		$storage->method('getCache')->willReturn($cache);

		$parentFolder = $this->createMock(Folder::class);
		$parentFolder->method('getId')->willReturn(3);

		$file = $this->createMock(File::class);
		$file->method('getId')->willReturn(1);
		$file->method('getPath')->willReturn('file');
		$file->method('getStorage')->willReturn($storage);
		$file->method('getParent')->willReturn($parentFolder);
		$file->method('getMimeType')->willReturn('myMimeType');

		$folder = $this->createMock(Folder::class);
		$folder->method('getId')->willReturn(2);
		$folder->method('getPath')->willReturn('folder');
		$folder->method('getStorage')->willReturn($storage);
		$folder->method('getParent')->willReturn($parentFolder);
		$folder->method('getMimeType')->willReturn('myFolderMimeType');

		// File shared with user
		$share = $this->createShare(
			100,
			Share::SHARE_TYPE_USER,
			'userId',
			'initiatorId',
			'ownerId',
			$file,
			4,
			5,
			null,
			6,
			'target',
			0
		);
		$expected = [
			'id' => 100,
			'share_type' => Share::SHARE_TYPE_USER,
			'share_with' => 'userId',
			'share_with_displayname' => 'userDisplay',
			'share_with_additional_info' => null,
			'uid_owner' => 'initiatorId',
			'displayname_owner' => 'initiatorDisplay',
			'item_type' => 'file',
			'item_source' => 1,
			'file_source' => 1,
			'file_target' => 'target',
			'file_parent' => 3,
			'token' => null,
			'expiration' => null,
			'permissions' => 4,
			'stime' => 5,
			'parent' => null,
			'storage_id' => 'STORAGE',
			'path' => 'file',
			'storage' => 101,
			'mail_send' => 0,
			'uid_file_owner' => 'ownerId',
			'displayname_file_owner' => 'ownerDisplay',
			'mimetype' => 'myMimeType',
		];
		$data[] = [$share, $expected];

		// Folder shared with group
		$share = $this->createShare(
			101,
			Share::SHARE_TYPE_GROUP,
			'groupId',
			'initiatorId',
			'ownerId',
			$folder,
			4,
			5,
			null,
			6,
			'target',
			0
		);
		$expected = [
			'id' => 101,
			'share_type' => Share::SHARE_TYPE_GROUP,
			'share_with' => 'groupId',
			'share_with_displayname' => 'groupId',
			'uid_owner' => 'initiatorId',
			'displayname_owner' => 'initiatorDisplay',
			'item_type' => 'folder',
			'item_source' => 2,
			'file_source' => 2,
			'file_target' => 'target',
			'file_parent' => 3,
			'token' => null,
			'expiration' => null,
			'permissions' => 4,
			'stime' => 5,
			'parent' => null,
			'storage_id' => 'STORAGE',
			'path' => 'folder',
			'storage' => 101,
			'mail_send' => 0,
			'uid_file_owner' => 'ownerId',
			'displayname_file_owner' => 'ownerDisplay',
			'mimetype' => 'myFolderMimeType',
		];
		$data[] = [$share, $expected];

		// File shared by link with Expire
		$expire = \DateTime::createFromFormat('Y-m-d h:i:s', '2000-01-02 01:02:03');
		$share = $this->createShare(
			101,
			Share::SHARE_TYPE_LINK,
			null,
			'initiatorId',
			'ownerId',
			$folder,
			4,
			5,
			$expire,
			6,
			'target',
			0,
			'token',
			'password',
			'some_name'
		);
		$expected = [
			'id' => 101,
			'share_type' => Share::SHARE_TYPE_LINK,
			'share_with' => 'password',
			'share_with_displayname' => 'password',
			'uid_owner' => 'initiatorId',
			'displayname_owner' => 'initiatorDisplay',
			'item_type' => 'folder',
			'item_source' => 2,
			'file_source' => 2,
			'file_target' => 'target',
			'file_parent' => 3,
			'token' => 'token',
			'expiration' => '2000-01-02 00:00:00',
			'permissions' => 4,
			'stime' => 5,
			'parent' => null,
			'storage_id' => 'STORAGE',
			'path' => 'folder',
			'storage' => 101,
			'mail_send' => 0,
			'url' => 'url',
			'uid_file_owner' => 'ownerId',
			'displayname_file_owner' => 'ownerDisplay',
			'mimetype' => 'myFolderMimeType',
			'name' => 'some_name',
		];
		$data[] = [$share, $expected];

		return $data;
	}

	/**
	 * @dataProvider dataGetShare
	 */
	public function testGetShare(\OCP\Share\IShare $share, array $result) {
		$ocs = $this->getMockBuilder(Share20OCS::class)
				->setConstructorArgs([
					$this->shareManager,
					$this->groupManager,
					$this->userManager,
					$this->request,
					$this->rootFolder,
					$this->urlGenerator,
					$this->currentUser,
					$this->l,
					$this->config,
					$this->notificationPublisher,
					$this->eventDispatcher,
					$this->sharingBlacklist,
				])->setMethods(['canAccessShare'])
				->getMock();

		$ocs->method('canAccessShare')->willReturn(true);

		$this->shareManager
			->expects($this->once())
			->method('getShareById')
			->with($share->getFullId())
			->willReturn($share);

		$userFolder = $this->createMock(Folder::class);
		$userFolder
			->method('getRelativePath')
			->will($this->returnArgument(0));

		$userFolder->method('getById')
			->with($share->getNodeId())
			->willReturn([$share->getNode()]);

		$this->rootFolder->method('getUserFolder')
			->with($this->currentUser->getUID())
			->willReturn($userFolder);

		$this->urlGenerator
			->method('linkToRouteAbsolute')
			->willReturn('url');

		$initiator = $this->createMock(IUser::class);
		$initiator->method('getUID')->willReturn('initiatorId');
		$initiator->method('getDisplayName')->willReturn('initiatorDisplay');

		$owner = $this->createMock(IUser::class);
		$owner->method('getUID')->willReturn('ownerId');
		$owner->method('getDisplayName')->willReturn('ownerDisplay');

		$user = $this->createMock(IUser::class);
		$user->method('getUID')->willReturn('userId');
		$user->method('getDisplayName')->willReturn('userDisplay');

		$group = $this->createMock(IGroup::class);
		$group->method('getGID')->willReturn('groupId');

		$this->userManager->method('get')->will($this->returnValueMap([
			['userId', $user],
			['initiatorId', $initiator],
			['ownerId', $owner],
		]));
		$this->groupManager->method('get')->will($this->returnValueMap([
			['group', $group],
		]));

		$expected = new Result([$result]);
		$this->assertEquals($expected->getData(), $ocs->getShare($share->getId())->getData());
	}

	public function testGetShareInvalidNode() {
		$share = \OC::$server->getShareManager()->newShare();
		$share->setSharedBy('initiator')
			->setSharedWith('recipient')
			->setShareOwner('owner');

		$this->shareManager
			->expects($this->once())
			->method('getShareById')
			->with('ocinternal:42')
			->willReturn($share);

		$expected = new Result(null, 404, 'Wrong share ID, share doesn\'t exist');
		$this->assertEquals($expected->getMeta(), $this->ocs->getShare(42)->getMeta());
	}

	public function testCanAccessShare() {
		$share = $this->createMock(IShare::class);
		$share->method('getShareOwner')->willReturn($this->currentUser->getUID());
		$this->assertTrue($this->invokePrivate($this->ocs, 'canAccessShare', [$share]));

		$share = $this->createMock(IShare::class);
		$share->method('getSharedBy')->willReturn($this->currentUser->getUID());
		$this->assertTrue($this->invokePrivate($this->ocs, 'canAccessShare', [$share]));

		$share = $this->createMock(IShare::class);
		$share->method('getShareType')->willReturn(Share::SHARE_TYPE_USER);
		$share->method('getSharedWith')->willReturn($this->currentUser->getUID());
		$this->assertTrue($this->invokePrivate($this->ocs, 'canAccessShare', [$share]));

		$share = $this->createMock(IShare::class);
		$share->method('getShareType')->willReturn(Share::SHARE_TYPE_USER);
		$share->method('getSharedWith')->willReturn($this->createMock(IUser::class));
		$this->assertFalse($this->invokePrivate($this->ocs, 'canAccessShare', [$share]));

		$share = $this->createMock(IShare::class);
		$share->method('getShareType')->willReturn(Share::SHARE_TYPE_GROUP);
		$share->method('getSharedWith')->willReturn('group');

		$group = $this->createMock(IGroup::class);
		$group->method('inGroup')->with($this->currentUser)->willReturn(true);
		$group2 = $this->createMock(IGroup::class);
		$group2->method('inGroup')->with($this->currentUser)->willReturn(false);

		$this->groupManager->method('get')->will($this->returnValueMap([
			['group', $group],
			['group2', $group2],
			['groupnull', null],
		]));
		$this->assertTrue($this->invokePrivate($this->ocs, 'canAccessShare', [$share]));

		$share = $this->createMock(IShare::class);
		$share->method('getShareType')->willReturn(Share::SHARE_TYPE_GROUP);
		$share->method('getSharedWith')->willReturn('group2');
		$this->assertFalse($this->invokePrivate($this->ocs, 'canAccessShare', [$share]));

		// null group
		$share = $this->createMock(IShare::class);
		$share->method('getShareType')->willReturn(\OCP\Share::SHARE_TYPE_GROUP);
		$share->method('getSharedWith')->willReturn('groupnull');
		$this->assertFalse($this->invokePrivate($this->ocs, 'canAccessShare', [$share]));

		$share = $this->createMock(IShare::class);
		$share->method('getShareType')->willReturn(Share::SHARE_TYPE_LINK);
		$this->assertFalse($this->invokePrivate($this->ocs, 'canAccessShare', [$share]));

		// should not happen ever again, but who knows... let's cover it
		$share = $this->createMock(IShare::class);
		$share->method('getShareType')->willReturn(Share::SHARE_TYPE_USER);
		$share->method('getState')->willReturn(Share::STATE_ACCEPTED);
		$share->method('getPermissions')->willReturn(0);
		$this->assertFalse($this->invokePrivate($this->ocs, 'canAccessShare', [$share]));

		// legacy zero permission entries from group sub-shares, let it pass
		$share = $this->createMock(IShare::class);
		$share->method('getShareType')->willReturn(Share::SHARE_TYPE_GROUP);
		$share->method('getSharedWith')->willReturn('group');
		$share->method('getState')->willReturn(Share::STATE_REJECTED);
		$share->method('getPermissions')->willReturn(0);
		$this->assertTrue($this->invokePrivate($this->ocs, 'canAccessShare', [$share]));
	}

	public function testCreateShareNoPath() {
		$expected = new Result(null, 404, 'Please specify a file or folder path');

		$result = $this->ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareInvalidPath() {
		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'invalid-path'],
			]));

		$userFolder = $this->createMock(Folder::class);
		$this->rootFolder->expects($this->once())
			->method('getUserFolder')
			->with('currentUser')
			->willReturn($userFolder);

		$userFolder->expects($this->once())
			->method('get')
			->with('invalid-path')
			->will($this->throwException(new \OCP\Files\NotFoundException()));

		$expected = new Result(null, 404, 'Wrong path, file/folder doesn\'t exist');

		$result = $this->ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareInvalidPermissions() {
		$share = $this->newShare();
		$this->shareManager->method('newShare')->willReturn($share);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['permissions', null, 32],
			]));

		$userFolder = $this->createMock(Folder::class);
		$this->rootFolder->expects($this->once())
				->method('getUserFolder')
				->with('currentUser')
				->willReturn($userFolder);

		$path = $this->createMock(File::class);
		$userFolder->expects($this->once())
				->method('get')
				->with('valid-path')
				->willReturn($path);

		$path->expects($this->once())
			->method('lock')
			->with(ILockingProvider::LOCK_SHARED);

		$expected = new Result(null, 404, 'invalid permissions');

		$result = $this->ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareZeroPermissions() {
		$share = $this->newShare();
		$this->shareManager->method('newShare')->willReturn($share);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['permissions', null, 0],
			]));

		$userFolder = $this->createMock(Folder::class);
		$this->rootFolder->expects($this->once())
				->method('getUserFolder')
				->with('currentUser')
				->willReturn($userFolder);

		$path = $this->createMock(File::class);
		$userFolder->expects($this->once())
				->method('get')
				->with('valid-path')
				->willReturn($path);

		$path->expects($this->once())
			->method('lock')
			->with(ILockingProvider::LOCK_SHARED);

		$expected = new Result(null, 400, 'Cannot remove all permissions');

		$result = $this->ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareUserNoShareWith() {
		$share = $this->newShare();
		$this->shareManager->method('newShare')->willReturn($share);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['permissions', null, \OCP\Constants::PERMISSION_ALL],
				['shareType', $this->any(), Share::SHARE_TYPE_USER],
			]));

		$userFolder = $this->createMock(Folder::class);
		$this->rootFolder->expects($this->once())
			->method('getUserFolder')
			->with('currentUser')
			->willReturn($userFolder);

		$path = $this->createMock(File::class);
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')
			->with(Storage::class)
			->willReturn(false);
		$path->method('getStorage')->willReturn($storage);
		$userFolder->expects($this->once())
			->method('get')
			->with('valid-path')
			->willReturn($path);

		$path->expects($this->once())
			->method('lock')
			->with(ILockingProvider::LOCK_SHARED);

		$expected = new Result(null, 404, 'Please specify a valid user');

		$result = $this->ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareUserNoValidShareWith() {
		$share = $this->newShare();
		$this->shareManager->method('newShare')->willReturn($share);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['permissions', null, \OCP\Constants::PERMISSION_ALL],
				['shareType', $this->any(), Share::SHARE_TYPE_USER],
				['shareWith', $this->any(), 'invalidUser'],
			]));

		$userFolder = $this->createMock(Folder::class);
		$this->rootFolder->expects($this->once())
			->method('getUserFolder')
			->with('currentUser')
			->willReturn($userFolder);

		$path = $this->createMock(File::class);
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')
			->with(Storage::class)
			->willReturn(false);
		$path->method('getStorage')->willReturn($storage);
		$userFolder->expects($this->once())
			->method('get')
			->with('valid-path')
			->willReturn($path);

		$expected = new Result(null, 404, 'Please specify a valid user');

		$path->expects($this->once())
			->method('lock')
			->with(ILockingProvider::LOCK_SHARED);

		$result = $this->ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareUser() {
		$share = $this->newShare();
		$this->shareManager->method('newShare')->willReturn($share);

		$share->setShareOwner('shareOwner');

		$ocs = $this->mockFormatShare();

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['permissions', null, \OCP\Constants::PERMISSION_ALL],
				['shareType', $this->any(), Share::SHARE_TYPE_USER],
				['shareWith', null, 'validUser'],
			]));

		$userFolder = $this->createMock(Folder::class);
		$this->rootFolder->expects($this->once())
				->method('getUserFolder')
				->with('currentUser')
				->willReturn($userFolder);

		$path = $this->createMock(File::class);
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')
			->with(Storage::class)
			->willReturn(false);
		$path->method('getStorage')->willReturn($storage);
		$userFolder->expects($this->once())
				->method('get')
				->with('valid-path')
				->willReturn($path);

		$this->userManager->method('userExists')->with('validUser')->willReturn(true);

		$path->expects($this->once())
			->method('lock')
			->with(ILockingProvider::LOCK_SHARED);
		$path->expects($this->once())
			->method('unlock')
			->with(ILockingProvider::LOCK_SHARED);

		$this->shareManager->method('createShare')
			->with($this->callback(function (\OCP\Share\IShare $share) use ($path) {
				return $share->getNode() === $path &&
					$share->getPermissions() === (
						\OCP\Constants::PERMISSION_ALL &
						~\OCP\Constants::PERMISSION_DELETE &
						~\OCP\Constants::PERMISSION_CREATE
					) &&
					$share->getShareType() === Share::SHARE_TYPE_USER &&
					$share->getSharedWith() === 'validUser' &&
					$share->getSharedBy() === 'currentUser';
			}))
			->will($this->returnArgument(0));

		$expected = new Result();
		$result = $ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareGroupNoValidShareWith() {
		$share = $this->newShare();
		$this->shareManager->method('newShare')->willReturn($share);
		$this->shareManager->method('createShare')->will($this->returnArgument(0));

		$this->request
				->method('getParam')
				->will($this->returnValueMap([
						['path', null, 'valid-path'],
						['permissions', null, \OCP\Constants::PERMISSION_ALL],
						['shareType', $this->any(), Share::SHARE_TYPE_GROUP],
						['shareWith', $this->any(), 'invalidGroup'],
				]));

		$userFolder = $this->createMock(Folder::class);
		$this->rootFolder->expects($this->once())
				->method('getUserFolder')
				->with('currentUser')
				->willReturn($userFolder);

		$path = $this->createMock(File::class);
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')
			->with(Storage::class)
			->willReturn(false);
		$path->method('getStorage')->willReturn($storage);
		$userFolder->expects($this->once())
				->method('get')
				->with('valid-path')
				->willReturn($path);

		$expected = new Result(null, 404, 'Please specify a valid user');

		$path->expects($this->once())
			->method('lock')
			->with(ILockingProvider::LOCK_SHARED);

		$result = $this->ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareGroupBlacklisted() {
		$share = $this->newShare();
		$this->shareManager->method('newShare')->willReturn($share);

		$this->request->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['permissions', null, \OCP\Constants::PERMISSION_ALL],
				['shareType', '-1', Share::SHARE_TYPE_GROUP],
				['shareWith', null, 'validGroup'],
			]));

		$userFolder = $this->createMock(Folder::class);
		$this->rootFolder->expects($this->once())
			->method('getUserFolder')
			->with('currentUser')
			->willReturn($userFolder);

		$path = $this->createMock(Folder::class);
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')
			->with(Storage::class)
			->willReturn(false);
		$path->method('getStorage')->willReturn($storage);
		$userFolder->expects($this->once())
			->method('get')
			->with('valid-path')
			->willReturn($path);

		$this->groupManager->method('groupExists')->with('validGroup')->willReturn(true);
		$this->groupManager->method('get')
			->with('validGroup')
			->willReturn($this->getGroupMock(['guid' => 'gegege1', 'displayname' => 'validGroup']));

		$this->shareManager->expects($this->once())
			->method('allowGroupSharing')
			->willReturn(true);

		$this->sharingBlacklist->method('isGroupBlacklisted')->willReturn(true);

		$expected = new Result(null, 403, 'The group is blacklisted for sharing');

		$result = $this->ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareGroup() {
		$share = $this->newShare();
		$this->shareManager->method('newShare')->willReturn($share);

		$ocs = $this->mockFormatShare();

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['permissions', null, \OCP\Constants::PERMISSION_ALL],
				['shareType', '-1', Share::SHARE_TYPE_GROUP],
				['shareWith', null, 'validGroup'],
			]));

		$userFolder = $this->createMock(Folder::class);
		$this->rootFolder->expects($this->once())
				->method('getUserFolder')
				->with('currentUser')
				->willReturn($userFolder);

		$path = $this->createMock(Folder::class);
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')
			->with(Storage::class)
			->willReturn(false);
		$path->method('getStorage')->willReturn($storage);
		$userFolder->expects($this->once())
				->method('get')
				->with('valid-path')
				->willReturn($path);

		$this->groupManager->method('groupExists')->with('validGroup')->willReturn(true);
		$this->groupManager->method('get')
			->with('validGroup')
			->willReturn($this->getGroupMock(['guid' => 'gegege1', 'displayname' => 'validGroup']));

		$this->shareManager->expects($this->once())
			->method('allowGroupSharing')
			->willReturn(true);

		$path->expects($this->once())
			->method('lock')
			->with(ILockingProvider::LOCK_SHARED);
		$path->expects($this->once())
			->method('unlock')
			->with(ILockingProvider::LOCK_SHARED);

		$this->shareManager->method('createShare')
			->with($this->callback(function (\OCP\Share\IShare $share) use ($path) {
				return $share->getNode() === $path &&
					$share->getPermissions() === \OCP\Constants::PERMISSION_ALL &&
					$share->getShareType() === Share::SHARE_TYPE_GROUP &&
					$share->getSharedWith() === 'validGroup' &&
					$share->getSharedBy() === 'currentUser';
			}))
			->will($this->returnArgument(0));

		$this->sharingBlacklist->method('isGroupBlacklisted')->willReturn(false);

		$expected = new Result();
		$result = $ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareGroupNotAllowed() {
		$share = $this->newShare();
		$this->shareManager->method('newShare')->willReturn($share);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['permissions', null, \OCP\Constants::PERMISSION_ALL],
				['shareType', '-1', Share::SHARE_TYPE_GROUP],
				['shareWith', null, 'validGroup'],
			]));

		$userFolder = $this->createMock(Folder::class);
		$this->rootFolder->expects($this->once())
			->method('getUserFolder')
			->with('currentUser')
			->willReturn($userFolder);

		$path = $this->createMock(Folder::class);
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')
			->with(Storage::class)
			->willReturn(false);
		$path->method('getStorage')->willReturn($storage);
		$userFolder->expects($this->once())
			->method('get')
			->with('valid-path')
			->willReturn($path);

		$this->groupManager->method('groupExists')->with('validGroup')->willReturn(true);

		$this->shareManager->expects($this->once())
			->method('allowGroupSharing')
			->willReturn(false);

		$expected = new Result(null, 404, 'Group sharing is disabled by the administrator');

		$result = $this->ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareLinkNoLinksAllowed() {
		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['shareType', '-1', Share::SHARE_TYPE_LINK],
			]));

		$path = $this->createMock(Folder::class);
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')
			->with(Storage::class)
			->willReturn(false);
		$path->method('getStorage')->willReturn($storage);
		$this->rootFolder->method('getUserFolder')->with($this->currentUser->getUID())->will($this->returnSelf());
		$this->rootFolder->method('get')->with('valid-path')->willReturn($path);

		$this->shareManager->method('newShare')->willReturn(\OC::$server->getShareManager()->newShare());

		$expected = new Result(null, 404, 'Public link sharing is disabled by the administrator');
		$result = $this->ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareLinkNoPublicUpload() {
		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['shareType', '-1', Share::SHARE_TYPE_LINK],
				['publicUpload', null, 'true'],
			]));

		$path = $this->createMock(Folder::class);
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')
			->with(Storage::class)
			->willReturn(false);
		$path->method('getStorage')->willReturn($storage);
		$this->rootFolder->method('getUserFolder')->with($this->currentUser->getUID())->will($this->returnSelf());
		$this->rootFolder->method('get')->with('valid-path')->willReturn($path);

		$this->shareManager->method('newShare')->willReturn(\OC::$server->getShareManager()->newShare());
		$this->shareManager->method('shareApiAllowLinks')->willReturn(true);

		$expected = new Result(null, 403, 'Public upload disabled by the administrator');
		$result = $this->ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareLinkPublicUploadFile() {
		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['shareType', '-1', Share::SHARE_TYPE_LINK],
				['publicUpload', null, 'true'],
			]));

		$path = $this->createMock(File::class);
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')
			->with(Storage::class)
			->willReturn(false);
		$path->method('getStorage')->willReturn($storage);
		$this->rootFolder->method('getUserFolder')->with($this->currentUser->getUID())->will($this->returnSelf());
		$this->rootFolder->method('get')->with('valid-path')->willReturn($path);

		$this->shareManager->method('newShare')->willReturn(\OC::$server->getShareManager()->newShare());
		$this->shareManager->method('shareApiAllowLinks')->willReturn(true);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(true);

		$expected = new Result(null, 404, 'Public upload is only possible for publicly shared folders');
		$result = $this->ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareLinkPublicUploadFolder() {
		$ocs = $this->mockFormatShare();

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['shareType', '-1', Share::SHARE_TYPE_LINK],
				['publicUpload', null, 'true'],
				['expireDate', '', ''],
				['password', '', ''],
			]));

		$path = $this->createMock(Folder::class);
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')
			->with(Storage::class)
			->willReturn(false);
		$path->method('getStorage')->willReturn($storage);
		$this->rootFolder->method('getUserFolder')->with($this->currentUser->getUID())->will($this->returnSelf());
		$this->rootFolder->method('get')->with('valid-path')->willReturn($path);

		$this->shareManager->method('newShare')->willReturn(\OC::$server->getShareManager()->newShare());
		$this->shareManager->method('shareApiAllowLinks')->willReturn(true);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(true);

		$this->shareManager->expects($this->once())->method('createShare')->with(
			$this->callback(function (\OCP\Share\IShare $share) use ($path) {
				return $share->getNode() === $path &&
					$share->getShareType() === Share::SHARE_TYPE_LINK &&
					$share->getPermissions() === (\OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_CREATE | \OCP\Constants::PERMISSION_UPDATE | \OCP\Constants::PERMISSION_DELETE) &&
					$share->getSharedBy() === 'currentUser' &&
					$share->getPassword() === null &&
					$share->getExpirationDate() === null;
			})
		)->will($this->returnArgument(0));

		$expected = new Result(null);
		$result = $ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareLinkReadWritePermissions() {
		$ocs = $this->mockFormatShare();

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['shareType', '-1', Share::SHARE_TYPE_LINK],
				['permissions', null, '15'],
				['expireDate', '', ''],
				['password', '', ''],
			]));

		$path = $this->createMock(Folder::class);
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')
			->with(Storage::class)
			->willReturn(false);
		$path->method('getStorage')->willReturn($storage);
		$this->rootFolder->method('getUserFolder')->with($this->currentUser->getUID())->will($this->returnSelf());
		$this->rootFolder->method('get')->with('valid-path')->willReturn($path);

		$this->shareManager->method('newShare')->willReturn(\OC::$server->getShareManager()->newShare());
		$this->shareManager->method('shareApiAllowLinks')->willReturn(true);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(true);

		$this->shareManager->expects($this->once())->method('createShare')->with(
			$this->callback(function (\OCP\Share\IShare $share) use ($path) {
				return $share->getNode() === $path &&
					$share->getShareType() === Share::SHARE_TYPE_LINK &&
					$share->getPermissions() === (\OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_CREATE | \OCP\Constants::PERMISSION_UPDATE | \OCP\Constants::PERMISSION_DELETE) &&
					$share->getSharedBy() === 'currentUser' &&
					$share->getPassword() === null &&
					$share->getExpirationDate() === null;
			})
		)->will($this->returnArgument(0));

		$expected = new Result(null);
		$result = $ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareLinkCreateOnlyFolder() {
		$ocs = $this->mockFormatShare();

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['shareType', '-1', Share::SHARE_TYPE_LINK],
				['permissions', null, '4'],
				['expireDate', '', ''],
				['password', '', ''],
			]));

		$path = $this->createMock(Folder::class);
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')
			->with(Storage::class)
			->willReturn(false);
		$path->method('getStorage')->willReturn($storage);
		$this->rootFolder->method('getUserFolder')->with($this->currentUser->getUID())->will($this->returnSelf());
		$this->rootFolder->method('get')->with('valid-path')->willReturn($path);

		$this->shareManager->method('newShare')->willReturn(\OC::$server->getShareManager()->newShare());
		$this->shareManager->method('shareApiAllowLinks')->willReturn(true);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(true);

		$this->shareManager->expects($this->once())->method('createShare')->with(
			$this->callback(function (\OCP\Share\IShare $share) use ($path) {
				return $share->getNode() === $path &&
					$share->getShareType() === Share::SHARE_TYPE_LINK &&
					$share->getPermissions() === (\OCP\Constants::PERMISSION_CREATE) &&
					$share->getSharedBy() === 'currentUser' &&
					$share->getPassword() === null &&
					$share->getExpirationDate() === null;
			})
		)->will($this->returnArgument(0));

		$expected = new Result(null);
		$result = $ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareLinkCreateOnlyFolderPublicUploadDisabled() {
		$ocs = $this->mockFormatShare();

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['shareType', '-1', Share::SHARE_TYPE_LINK],
				['permissions', null, '4'],
				['expireDate', '', ''],
				['password', '', ''],
			]));

		$path = $this->createMock(Folder::class);
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')
			->with(Storage::class)
			->willReturn(false);
		$path->method('getStorage')->willReturn($storage);
		$this->rootFolder->method('getUserFolder')->with($this->currentUser->getUID())->will($this->returnSelf());
		$this->rootFolder->method('get')->with('valid-path')->willReturn($path);

		$this->shareManager->method('newShare')->willReturn(\OC::$server->getShareManager()->newShare());
		$this->shareManager->method('shareApiAllowLinks')->willReturn(true);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(false);

		$expected = new Result(null, 403, 'Public upload disabled by the administrator');
		$result = $ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareLinkDefaultPerms() {
		$ocs = $this->mockFormatShare();

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['shareType', '-1', Share::SHARE_TYPE_LINK],
				['expireDate', '', ''],
				['password', '', ''],
			]));

		$path = $this->createMock(Folder::class);
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')
			->with(Storage::class)
			->willReturn(false);
		$path->method('getStorage')->willReturn($storage);
		$this->rootFolder->method('getUserFolder')->with($this->currentUser->getUID())->will($this->returnSelf());
		$this->rootFolder->method('get')->with('valid-path')->willReturn($path);

		$this->shareManager->method('newShare')->willReturn(\OC::$server->getShareManager()->newShare());
		$this->shareManager->method('shareApiAllowLinks')->willReturn(true);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(false);

		$this->shareManager->expects($this->once())->method('createShare')->with(
			$this->callback(function (\OCP\Share\IShare $share) use ($path) {
				return $share->getNode() === $path &&
					$share->getShareType() === Share::SHARE_TYPE_LINK &&
					$share->getPermissions() === (\OCP\Constants::PERMISSION_READ) &&
					$share->getSharedBy() === 'currentUser' &&
					$share->getPassword() === null &&
					$share->getExpirationDate() === null;
			})
		)->will($this->returnArgument(0));

		$expected = new Result(null);
		$result = $ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareLinkPassword() {
		$ocs = $this->mockFormatShare();

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['shareType', '-1', Share::SHARE_TYPE_LINK],
				['publicUpload', null, 'false'],
				['expireDate', '', ''],
				['password', '', 'password'],
			]));

		$path = $this->createMock(Folder::class);
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')
			->with(Storage::class)
			->willReturn(false);
		$path->method('getStorage')->willReturn($storage);
		$this->rootFolder->method('getUserFolder')->with($this->currentUser->getUID())->will($this->returnSelf());
		$this->rootFolder->method('get')->with('valid-path')->willReturn($path);

		$this->shareManager->method('newShare')->willReturn(\OC::$server->getShareManager()->newShare());
		$this->shareManager->method('shareApiAllowLinks')->willReturn(true);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(true);

		$this->shareManager->expects($this->once())->method('createShare')->with(
			$this->callback(function (\OCP\Share\IShare $share) use ($path) {
				return $share->getNode() === $path &&
				$share->getShareType() === Share::SHARE_TYPE_LINK &&
				$share->getPermissions() === \OCP\Constants::PERMISSION_READ &&
				$share->getSharedBy() === 'currentUser' &&
				$share->getPassword() === 'password' &&
				$share->getExpirationDate() === null;
			})
		)->will($this->returnArgument(0));

		$expected = new Result(null);
		$result = $ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareValidExpireDate() {
		$ocs = $this->mockFormatShare();

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['shareType', '-1', Share::SHARE_TYPE_LINK],
				['publicUpload', null, 'false'],
				['expireDate', '', '2000-01-01'],
				['password', '', ''],
			]));

		$path = $this->createMock(Folder::class);
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')
			->with(Storage::class)
			->willReturn(false);
		$path->method('getStorage')->willReturn($storage);
		$this->rootFolder->method('getUserFolder')->with($this->currentUser->getUID())->will($this->returnSelf());
		$this->rootFolder->method('get')->with('valid-path')->willReturn($path);

		$this->shareManager->method('newShare')->willReturn(\OC::$server->getShareManager()->newShare());
		$this->shareManager->method('shareApiAllowLinks')->willReturn(true);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(true);

		$this->shareManager->expects($this->once())->method('createShare')->with(
			$this->callback(function (\OCP\Share\IShare $share) use ($path) {
				$date = new \DateTime('2000-01-01');
				$date->setTime(0, 0, 0);

				return $share->getNode() === $path &&
				$share->getShareType() === Share::SHARE_TYPE_LINK &&
				$share->getPermissions() === \OCP\Constants::PERMISSION_READ &&
				$share->getSharedBy() === 'currentUser' &&
				$share->getPassword() === null &&
				$share->getExpirationDate() == $date;
			})
		)->will($this->returnArgument(0));

		$expected = new Result(null);
		$result = $ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testCreateShareInvalidExpireDate() {
		$ocs = $this->mockFormatShare();

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['shareType', '-1', Share::SHARE_TYPE_LINK],
				['publicUpload', null, 'false'],
				['expireDate', '', 'a1b2d3'],
				['password', '', ''],
			]));

		$path = $this->createMock(Folder::class);
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')
			->with(Storage::class)
			->willReturn(false);
		$path->method('getStorage')->willReturn($storage);
		$this->rootFolder->method('getUserFolder')->with($this->currentUser->getUID())->will($this->returnSelf());
		$this->rootFolder->method('get')->with('valid-path')->willReturn($path);

		$this->shareManager->method('newShare')->willReturn(\OC::$server->getShareManager()->newShare());
		$this->shareManager->method('shareApiAllowLinks')->willReturn(true);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(true);

		$expected = new Result(null, 404, 'Invalid date, date format must be YYYY-MM-DD');
		$result = $ocs->createShare();

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	/**
	 * Test for https://github.com/owncloud/core/issues/22587
	 * TODO: Remove once proper solution is in place
	 */
	public function testCreateReshareOfFederatedMountNoDeletePermissions() {
		$share = \OC::$server->getShareManager()->newShare();
		$this->shareManager->method('newShare')->willReturn($share);

		$ocs = $this->mockFormatShare();

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, 'valid-path'],
				['permissions', null, \OCP\Constants::PERMISSION_ALL],
				['shareType', $this->any(), Share::SHARE_TYPE_USER],
				['shareWith', null, 'validUser'],
			]));

		$userFolder = $this->createMock(Folder::class);
		$this->rootFolder->expects($this->once())
			->method('getUserFolder')
			->with('currentUser')
			->willReturn($userFolder);

		$path = $this->createMock(Folder::class);
		$storage = $this->createMock(IStorage::class);
		$storage->method('instanceOfStorage')
			->with(Storage::class)
			->willReturn(true);
		$path->method('getStorage')->willReturn($storage);
		$path->method('getPermissions')->willReturn(\OCP\Constants::PERMISSION_READ);
		$userFolder->expects($this->once())
			->method('get')
			->with('valid-path')
			->willReturn($path);

		$this->userManager->method('userExists')->with('validUser')->willReturn(true);

		$this->shareManager
			->expects($this->once())
			->method('createShare')
			->with($this->callback(function (\OCP\Share\IShare $share) {
				return $share->getPermissions() === \OCP\Constants::PERMISSION_READ;
			}))
			->will($this->returnArgument(0));

		$ocs->createShare();
	}

	public function testUpdateShareCantAccess() {
		$node = $this->createMock(Folder::class);
		$share = $this->newShare();
		$share->setNode($node);

		$node->expects($this->once())
			->method('lock')
			->with(ILockingProvider::LOCK_SHARED);

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);

		$expected = new Result(null, 404, 'Wrong share ID, share doesn\'t exist');
		$result = $this->ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testUpdateNoParametersLink() {
		$node = $this->createMock(Folder::class);
		$share = $this->newShare();
		$share->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setSharedBy($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_LINK)
			->setNode($node);

		$node->expects($this->once())
			->method('lock')
			->with(ILockingProvider::LOCK_SHARED);

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);

		$expected = new Result(null, 400, 'Wrong or no update parameter given');
		$result = $this->ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testUpdateNoParametersOther() {
		$node = $this->createMock(Folder::class);
		$share = $this->newShare();
		$share->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setSharedBy($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_GROUP)
			->setNode($node);

		$node->expects($this->once())
			->method('lock')
			->with(ILockingProvider::LOCK_SHARED);

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);

		$expected = new Result(null, 400, 'Wrong or no update parameter given');
		$result = $this->ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testUpdateLinkShareClear() {
		$ocs = $this->mockFormatShare();

		$node = $this->createMock(Folder::class);
		$share = $this->newShare();
		$share->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setSharedBy($this->currentUser->getUID())
			->setShareOwner($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPassword('password')
			->setExpirationDate(new \DateTime())
			->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setNode($node);

		$node->expects($this->once())
			->method('lock')
			->with(ILockingProvider::LOCK_SHARED);
		$node->expects($this->once())
			->method('unlock')
			->with(ILockingProvider::LOCK_SHARED);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['publicUpload', null, 'false'],
				['expireDate', null, ''],
				['password', null, ''],
			]));

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);

		$this->shareManager->expects($this->once())->method('updateShare')->with(
			$this->callback(function (\OCP\Share\IShare $share) {
				return $share->getPermissions() === \OCP\Constants::PERMISSION_READ &&
				$share->getPassword() === null &&
				$share->getExpirationDate() === null;
			})
		)->will($this->returnArgument(0));

		$expected = new Result(null);
		$result = $ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testUpdateLinkShareSet() {
		$ocs = $this->mockFormatShare();

		$folder = $this->createMock(Folder::class);

		$share = \OC::$server->getShareManager()->newShare();
		$share->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setSharedBy($this->currentUser->getUID())
			->setShareOwner($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_LINK)
			->setNode($folder);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['publicUpload', null, 'true'],
				['expireDate', null, '2000-01-01'],
				['password', null, 'password'],
			]));

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(true);

		$this->shareManager->expects($this->once())->method('updateShare')->with(
			$this->callback(function (\OCP\Share\IShare $share) {
				$date = new \DateTime('2000-01-01');
				$date->setTime(0, 0, 0);

				return $share->getPermissions() === (\OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_CREATE | \OCP\Constants::PERMISSION_UPDATE | \OCP\Constants::PERMISSION_DELETE) &&
				$share->getPassword() === 'password' &&
				$share->getExpirationDate() == $date;
			})
		)->will($this->returnArgument(0));

		$expected = new Result(null);
		$result = $ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	/**
	 * @dataProvider publicUploadParamsProvider
	 */
	public function testUpdateLinkShareEnablePublicUpload($params) {
		$ocs = $this->mockFormatShare();

		$folder = $this->createMock(Folder::class);

		$share = \OC::$server->getShareManager()->newShare();
		$share->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setSharedBy($this->currentUser->getUID())
			->setShareOwner($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPassword('password')
			->setNode($folder);

		$this->request
			->method('getParam')
			->will($this->returnValueMap($params));

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(true);
		$this->shareManager->method('getSharedWith')->willReturn([]);

		$this->shareManager->expects($this->once())->method('updateShare')->with(
			$this->callback(function (\OCP\Share\IShare $share) {
				return $share->getPermissions() === (\OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_CREATE | \OCP\Constants::PERMISSION_UPDATE | \OCP\Constants::PERMISSION_DELETE) &&
				$share->getPassword() === 'password' &&
				$share->getExpirationDate() === null;
			})
		)->will($this->returnArgument(0));

		$expected = new Result(null);
		$result = $ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testUpdateLinkShareInvalidDate() {
		$ocs = $this->mockFormatShare();

		$folder = $this->createMock(Folder::class);

		$share = \OC::$server->getShareManager()->newShare();
		$share->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setSharedBy($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_LINK)
			->setNode($folder);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['publicUpload', null, 'true'],
				['expireDate', null, '2000-01-a'],
				['password', null, 'password'],
			]));

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(true);

		$expected = new Result(null, 400, 'Invalid date. Format must be YYYY-MM-DD');
		$result = $ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function publicUploadParamsProvider() {
		return [
			[[
				['publicUpload', null, 'true'],
				['expireDate', '', null],
				['password', '', 'password'],
			]], [[
				// legacy had no delete
				['permissions', null, \OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_CREATE | \OCP\Constants::PERMISSION_UPDATE],
				['expireDate', '', null],
				['password', '', 'password'],
			]], [[
				// correct
				['permissions', null, \OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_CREATE | \OCP\Constants::PERMISSION_UPDATE | \OCP\Constants::PERMISSION_DELETE],
				['expireDate', '', null],
				['password', '', 'password'],
			]],
		];
	}

	/**
	 * @dataProvider publicUploadParamsProvider
	 */
	public function testUpdateLinkSharePublicUploadNotAllowed($params) {
		$ocs = $this->mockFormatShare();

		$folder = $this->createMock(Folder::class);

		$share = \OC::$server->getShareManager()->newShare();
		$share->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setSharedBy($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_LINK)
			->setNode($folder);

		$this->request
			->method('getParam')
			->will($this->returnValueMap($params));

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(false);

		$expected = new Result(null, 403, 'Public upload disabled by the administrator');
		$result = $ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testUpdateLinkSharePublicUploadOnFile() {
		$ocs = $this->mockFormatShare();

		$file = $this->createMock(File::class);

		$share = \OC::$server->getShareManager()->newShare();
		$share->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setSharedBy($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_LINK)
			->setNode($file);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['publicUpload', null, 'true'],
				['expireDate', '', ''],
				['password', '', 'password'],
			]));

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(true);

		$expected = new Result(null, 400, 'Public upload is only possible for publicly shared folders');
		$result = $ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testUpdateLinkSharePasswordDoesNotChangeOther() {
		$ocs = $this->mockFormatShare();

		$date = new \DateTime('2000-01-01');
		$date->setTime(0, 0, 0);

		$node = $this->createMock(File::class);
		$share = $this->newShare();
		$share->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setSharedBy($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPassword('password')
			->setExpirationDate($date)
			->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setNode($node);

		$node->expects($this->once())
			->method('lock')
			->with(ILockingProvider::LOCK_SHARED);
		$node->expects($this->once())
			->method('unlock')
			->with(ILockingProvider::LOCK_SHARED);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['password', null, 'newpassword'],
			]));

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);

		$this->shareManager->expects($this->once())->method('updateShare')->with(
			$this->callback(function (\OCP\Share\IShare $share) use ($date) {
				return $share->getPermissions() === \OCP\Constants::PERMISSION_ALL &&
				$share->getPassword() === 'newpassword' &&
				$share->getExpirationDate() === $date;
			})
		)->will($this->returnArgument(0));

		$expected = new Result(null);
		$result = $ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testUpdateLinkShareExpireDateDoesNotChangeOther() {
		$ocs = $this->mockFormatShare();

		$node = $this->createMock(File::class);
		$share = $this->newShare();
		$share->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setSharedBy($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPassword('password')
			->setExpirationDate(new \DateTime())
			->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setNode($node);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['expireDate', null, '2010-12-23'],
			]));

		$node->expects($this->once())
			->method('lock')
			->with(ILockingProvider::LOCK_SHARED);
		$node->expects($this->once())
			->method('unlock')
			->with(ILockingProvider::LOCK_SHARED);

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);

		$this->shareManager->expects($this->once())->method('updateShare')->with(
			$this->callback(function (\OCP\Share\IShare $share) {
				$date = new \DateTime('2010-12-23');
				$date->setTime(0, 0, 0);

				return $share->getPermissions() === \OCP\Constants::PERMISSION_ALL &&
				$share->getPassword() === 'password' &&
				$share->getExpirationDate() == $date;
			})
		)->will($this->returnArgument(0));

		$expected = new Result(null);
		$result = $ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testUpdateLinkSharePublicUploadDoesNotChangeOther() {
		$ocs = $this->mockFormatShare();

		$date = new \DateTime('2000-01-01');

		$folder = $this->createMock(Folder::class);

		$share = \OC::$server->getShareManager()->newShare();
		$share->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setSharedBy($this->currentUser->getUID())
			->setShareOwner($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPassword('password')
			->setExpirationDate($date)
			->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setNode($folder);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['publicUpload', null, 'true'],
			]));

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(true);

		$this->shareManager->expects($this->once())->method('updateShare')->with(
			$this->callback(function (\OCP\Share\IShare $share) use ($date) {
				return $share->getPermissions() === (\OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_CREATE | \OCP\Constants::PERMISSION_UPDATE | \OCP\Constants::PERMISSION_DELETE) &&
				$share->getPassword() === 'password' &&
				$share->getExpirationDate() === $date;
			})
		)->will($this->returnArgument(0));

		$expected = new Result(null);
		$result = $ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testUpdateLinkSharePermissions() {
		$ocs = $this->mockFormatShare();

		$date = new \DateTime('2000-01-01');

		$folder = $this->createMock(Folder::class);

		$share = \OC::$server->getShareManager()->newShare();
		$share->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setSharedBy($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPassword('password')
			->setExpirationDate($date)
			->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setNode($folder);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['permissions', null, '7'],
			]));

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(true);

		$this->shareManager->expects($this->once())->method('updateShare')->with(
			$this->callback(function (\OCP\Share\IShare $share) use ($date) {
				return $share->getPermissions() === (\OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_CREATE | \OCP\Constants::PERMISSION_UPDATE | \OCP\Constants::PERMISSION_DELETE) &&
				$share->getPassword() === 'password' &&
				$share->getExpirationDate() === $date;
			})
		)->will($this->returnArgument(0));

		$this->shareManager->method('getSharedWith')->willReturn([]);

		$expected = new Result(null);
		$result = $ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testUpdateLinkShareCreateOnly() {
		$ocs = $this->mockFormatShare();

		$folder = $this->createMock(Folder::class);

		$share = \OC::$server->getShareManager()->newShare();
		$share->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setSharedBy($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPermissions(\OCP\Constants::PERMISSION_READ)
			->setNode($folder);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['permissions', null, '4'],
			]));

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(true);

		$this->shareManager->expects($this->once())->method('updateShare')->with(
			$this->callback(function (\OCP\Share\IShare $share) {
				return $share->getPermissions() === \OCP\Constants::PERMISSION_CREATE;
			})
		)->will($this->returnArgument(0));

		$this->shareManager->method('getSharedWith')->willReturn([]);

		$expected = new Result(null);
		$result = $ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testUpdateLinkShareInvalidPermissions() {
		$ocs = $this->mockFormatShare();

		$date = new \DateTime('2000-01-01');

		$folder = $this->createMock(Folder::class);

		$share = \OC::$server->getShareManager()->newShare();
		$share->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setSharedBy($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_LINK)
			->setPassword('password')
			->setExpirationDate($date)
			->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setNode($folder);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['permissions', null, '31'],
			]));

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(true);

		$expected = new Result(null, 400, 'Can\'t change permissions for public share links');
		$result = $ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testUpdateShareZeroPermissions() {
		$ocs = $this->mockFormatShare();

		$folder = $this->createMock(Folder::class);

		$share = \OC::$server->getShareManager()->newShare();
		$share->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setSharedBy($this->currentUser->getUID())
			->setShareOwner($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_USER)
			->setSharedWith('anotheruser')
			->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setNode($folder);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['permissions', null, '0'],
			]));

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);

		$expected = new Result(null, 400, 'Cannot remove all permissions');
		$result = $ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testUpdateOtherPermissions() {
		$ocs = $this->mockFormatShare();

		$file = $this->createMock(File::class);

		$share = \OC::$server->getShareManager()->newShare();
		$share->setPermissions(\OCP\Constants::PERMISSION_ALL)
			->setSharedBy($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_USER)
			->setNode($file);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['permissions', null, '31'],
			]));

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(true);

		$this->shareManager->expects($this->once())->method('updateShare')->with(
			$this->callback(function (\OCP\Share\IShare $share) {
				return $share->getPermissions() === \OCP\Constants::PERMISSION_ALL;
			})
		)->will($this->returnArgument(0));

		$this->shareManager->method('getSharedWith')->willReturn([]);

		$expected = new Result(null);
		$result = $ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testUpdateShareCannotIncreasePermissions() {
		$ocs = $this->mockFormatShare();

		$date = new \DateTime('2000-01-01');

		$folder = $this->createMock(Folder::class);

		$share = \OC::$server->getShareManager()->newShare();
		$share
			->setId(42)
			->setSharedBy($this->currentUser->getUID())
			->setShareOwner('anotheruser')
			->setShareType(Share::SHARE_TYPE_GROUP)
			->setSharedWith('group1')
			->setPermissions(\OCP\Constants::PERMISSION_READ)
			->setNode($folder);

		// note: updateShare will modify the received instance but getSharedWith will reread from the database,
		// so their values will be different
		$incomingShare = \OC::$server->getShareManager()->newShare();
		$incomingShare
			->setId(42)
			->setSharedBy($this->currentUser->getUID())
			->setShareOwner('anotheruser')
			->setShareType(Share::SHARE_TYPE_GROUP)
			->setSharedWith('group1')
			->setPermissions(\OCP\Constants::PERMISSION_READ)
			->setNode($folder);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['permissions', null, '31'],
			]));

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);

		$this->shareManager->expects($this->any())
			->method('getSharedWith')
			->will($this->returnValueMap([
				['currentUser', Share::SHARE_TYPE_USER, $share->getNode(), -1, 0, []],
				['currentUser', Share::SHARE_TYPE_GROUP, $share->getNode(), -1, 0, [$incomingShare]]
			]));

		$this->shareManager->expects($this->never())->method('updateShare');

		$expected = new Result(null, 404, 'Cannot increase permissions');
		$result = $ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	/**
	 * @dataProvider publicUploadParamsProvider
	 */
	public function testUpdateShareCannotIncreasePermissionsPublicLink($params) {
		$ocs = $this->mockFormatShare();

		$date = new \DateTime('2000-01-01');

		$folder = $this->createMock(Folder::class);

		$share = \OC::$server->getShareManager()->newShare();
		$share
			->setId(42)
			->setSharedBy('anotheruser')
			->setShareOwner('anotheruser')
			->setShareType(Share::SHARE_TYPE_USER)
			->setSharedWith($this->currentUser->getUID())
			->setPermissions(\OCP\Constants::PERMISSION_READ)
			->setNode($folder);

		$linkShare = \OC::$server->getShareManager()->newShare();
		$linkShare
			->setId(43)
			->setSharedBy($this->currentUser->getUID())
			->setShareOwner('anotheruser')
			->setShareType(Share::SHARE_TYPE_LINK)
			->setToken('dummy')
			->setPermissions(\OCP\Constants::PERMISSION_READ)
			->setNode($folder);

		$this->request
			->method('getParam')
			->will($this->returnValueMap($params));

		$this->shareManager->method('getShareById')->with('ocinternal:43')->willReturn($linkShare);
		$this->shareManager->method('shareApiLinkAllowPublicUpload')->willReturn(true);

		$this->shareManager->expects($this->any())
			->method('getSharedWith')
			->will($this->returnValueMap([
				[$this->currentUser->getUID(), Share::SHARE_TYPE_USER, $share->getNode(), -1, 0, [$share]],
				[$this->currentUser->getUID(), Share::SHARE_TYPE_GROUP, $share->getNode(), -1, 0, []],
			]));

		$this->shareManager->expects($this->never())->method('updateShare');

		$expected = new Result(null, 404, 'Cannot increase permissions');
		$result = $ocs->updateShare(43);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testUpdateShareCanIncreasePermissionsIfOwner() {
		$ocs = $this->mockFormatShare();

		$date = new \DateTime('2000-01-01');

		$folder = $this->createMock(Folder::class);

		$share = \OC::$server->getShareManager()->newShare();
		$share
			->setId(42)
			->setSharedBy($this->currentUser->getUID())
			->setShareOwner($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_GROUP)
			->setSharedWith('group1')
			->setPermissions(\OCP\Constants::PERMISSION_READ)
			->setNode($folder);

		// note: updateShare will modify the received instance but getSharedWith will reread from the database,
		// so their values will be different
		$incomingShare = \OC::$server->getShareManager()->newShare();
		$incomingShare
			->setId(42)
			->setSharedBy($this->currentUser->getUID())
			->setShareOwner($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_GROUP)
			->setSharedWith('group1')
			->setPermissions(\OCP\Constants::PERMISSION_READ)
			->setNode($folder);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['permissions', null, '31'],
			]));

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);

		$this->shareManager->expects($this->any())
			->method('getSharedWith')
			->will($this->returnValueMap([
				['currentUser', Share::SHARE_TYPE_USER, $share->getNode(), -1, 0, []],
				['currentUser', Share::SHARE_TYPE_GROUP, $share->getNode(), -1, 0, [$incomingShare]]
			]));

		$this->shareManager->expects($this->once())
			->method('updateShare')
			->with($share)
			->willReturn($share);

		$expected = new Result();
		$result = $ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testUpdateLinkShareNameAlone() {
		$ocs = $this->mockFormatShare();

		$date = new \DateTime('2000-01-01');

		$folder = $this->createMock(Folder::class);

		$share = \OC::$server->getShareManager()->newShare();
		$share->setPermissions(\OCP\Constants::PERMISSION_READ)
			->setSharedBy($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_LINK)
			->setName('somename')
			->setNode($folder);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['name', null, 'another'],
			]));

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);

		$this->shareManager->expects($this->once())->method('updateShare')->with(
			$this->callback(function (\OCP\Share\IShare $share) use ($date) {
				return $share->getName() === 'another';
			})
		)->will($this->returnArgument(0));

		$this->shareManager->method('getSharedWith')->willReturn([]);

		$expected = new Result(null);
		$result = $ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	public function testUpdateLinkShareKeepNameWhenNotSpecified() {
		$ocs = $this->mockFormatShare();

		$date = new \DateTime('2000-01-01');

		$folder = $this->createMock(Folder::class);

		$share = \OC::$server->getShareManager()->newShare();
		$share->setPermissions(\OCP\Constants::PERMISSION_READ)
			->setSharedBy($this->currentUser->getUID())
			->setShareType(Share::SHARE_TYPE_LINK)
			->setName('somename')
			->setNode($folder);

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['password', null, 'test'],
			]));

		$this->shareManager->method('getShareById')->with('ocinternal:42')->willReturn($share);

		$this->shareManager->expects($this->once())->method('updateShare')->with(
			$this->callback(function (\OCP\Share\IShare $share) use ($date) {
				return $share->getPermissions() === (\OCP\Constants::PERMISSION_READ) &&
				$share->getPassword() === 'test' &&
				$share->getName() === 'somename';
			})
		)->will($this->returnArgument(0));

		$this->shareManager->method('getSharedWith')->willReturn([]);

		$expected = new Result(null);
		$result = $ocs->updateShare(42);

		$this->assertEquals($expected->getMeta(), $result->getMeta());
		$this->assertEquals($expected->getData(), $result->getData());
	}

	private function getMockFileFolder() {
		$file = $this->createMock(File::class);
		$folder = $this->createMock(Folder::class);
		$parent = $this->createMock(Folder::class);

		$file->method('getMimeType')->willReturn('myMimeType');
		$folder->method('getMimeType')->willReturn('myFolderMimeType');

		$file->method('getPath')->willReturn('file');
		$folder->method('getPath')->willReturn('folder');

		$parent->method('getId')->willReturn(1);
		$folder->method('getId')->willReturn(2);
		$file->method('getId')->willReturn(3);

		$file->method('getParent')->willReturn($parent);
		$folder->method('getParent')->willReturn($parent);

		$cache = $this->createMock(ICache::class);
		$cache->method('getNumericStorageId')->willReturn(100);
		$storage = $this->createMock(IStorage::class);
		$storage->method('getId')->willReturn('storageId');
		$storage->method('getCache')->willReturn($cache);

		$file->method('getStorage')->willReturn($storage);
		$folder->method('getStorage')->willReturn($storage);

		return [$file, $folder];
	}

	public function dataFormatShare() {
		list($file, $folder) = $this->getMockFileFolder();
		$owner = $this->createMock(IUser::class);
		$owner->method('getDisplayName')->willReturn('ownerDN');
		$initiator = $this->createMock(IUser::class);
		$initiator->method('getDisplayName')->willReturn('initiatorDN');
		$recipient = $this->createMock(IUser::class);
		$recipient->method('getDisplayName')->willReturn('recipientDN');

		$result = [];

		$share = \OC::$server->getShareManager()->newShare();
		$share->setShareType(Share::SHARE_TYPE_USER)
			->setSharedWith('recipient')
			->setSharedBy('initiator')
			->setShareOwner('owner')
			->setPermissions(\OCP\Constants::PERMISSION_READ)
			->setNode($file)
			->setShareTime(new \DateTime('2000-01-01T00:01:02'))
			->setTarget('myTarget')
			->setId(42);

		/* User backend down */
		$result[] = [
			[
				'id' => 42,
				'share_type' => Share::SHARE_TYPE_USER,
				'uid_owner' => 'initiator',
				'displayname_owner' => 'initiator',
				'permissions' => 1,
				'stime' => 946684862,
				'parent' => null,
				'expiration' => null,
				'token' => null,
				'uid_file_owner' => 'owner',
				'displayname_file_owner' => 'owner',
				'path' => 'file',
				'item_type' => 'file',
				'storage_id' => 'storageId',
				'storage' => 100,
				'item_source' => 3,
				'file_source' => 3,
				'file_parent' => 1,
				'file_target' => 'myTarget',
				'share_with' => 'recipient',
				'share_with_displayname' => 'recipient',
				'mail_send' => 0,
				'mimetype' => 'myMimeType',
			], $share, [], false
		];

		/* User backend up */
		$result[] = [
			[
				'id' => 42,
				'share_type' => Share::SHARE_TYPE_USER,
				'uid_owner' => 'initiator',
				'displayname_owner' => 'initiatorDN',
				'permissions' => 1,
				'stime' => 946684862,
				'parent' => null,
				'expiration' => null,
				'token' => null,
				'uid_file_owner' => 'owner',
				'displayname_file_owner' => 'ownerDN',
				'path' => 'file',
				'item_type' => 'file',
				'storage_id' => 'storageId',
				'storage' => 100,
				'item_source' => 3,
				'file_source' => 3,
				'file_parent' => 1,
				'file_target' => 'myTarget',
				'share_with' => 'recipient',
				'share_with_displayname' => 'recipientDN',
				'share_with_additional_info' => null,
				'mail_send' => 0,
				'mimetype' => 'myMimeType',
			], $share, [
				['owner', $owner],
				['initiator', $initiator],
				['recipient', $recipient],
			], false
		];

		$share = \OC::$server->getShareManager()->newShare();
		$share->setShareType(Share::SHARE_TYPE_USER)
			->setSharedWith('recipient')
			->setSharedBy('initiator')
			->setShareOwner('owner')
			->setPermissions(\OCP\Constants::PERMISSION_READ)
			->setNode($file)
			->setShareTime(new \DateTime('2000-01-01T00:01:02'))
			->setTarget('myTarget')
			->setId(42);

		/* User backend down */
		$result[] = [
			[
				'id' => 42,
				'share_type' => Share::SHARE_TYPE_USER,
				'uid_owner' => 'initiator',
				'displayname_owner' => 'initiator',
				'permissions' => 1,
				'stime' => 946684862,
				'parent' => null,
				'expiration' => null,
				'token' => null,
				'uid_file_owner' => 'owner',
				'displayname_file_owner' => 'owner',
				'path' => 'file',
				'item_type' => 'file',
				'storage_id' => 'storageId',
				'storage' => 100,
				'item_source' => 3,
				'file_source' => 3,
				'file_parent' => 1,
				'file_target' => 'myTarget',
				'share_with' => 'recipient',
				'share_with_displayname' => 'recipient',
				'mail_send' => 0,
				'mimetype' => 'myMimeType',
			], $share, [], false
		];

		// with existing group
		$share = \OC::$server->getShareManager()->newShare();
		$share->setShareType(Share::SHARE_TYPE_GROUP)
			->setSharedWith('recipientGroup')
			->setSharedBy('initiator')
			->setShareOwner('owner')
			->setPermissions(\OCP\Constants::PERMISSION_READ)
			->setNode($file)
			->setShareTime(new \DateTime('2000-01-01T00:01:02'))
			->setTarget('myTarget')
			->setId(42);

		$result[] = [
			[
				'id' => 42,
				'share_type' => Share::SHARE_TYPE_GROUP,
				'uid_owner' => 'initiator',
				'displayname_owner' => 'initiator',
				'permissions' => 1,
				'stime' => 946684862,
				'parent' => null,
				'expiration' => null,
				'token' => null,
				'uid_file_owner' => 'owner',
				'displayname_file_owner' => 'owner',
				'path' => 'file',
				'item_type' => 'file',
				'storage_id' => 'storageId',
				'storage' => 100,
				'item_source' => 3,
				'file_source' => 3,
				'file_parent' => 1,
				'file_target' => 'myTarget',
				'share_with' => 'recipientGroup',
				'share_with_displayname' => 'recipientGroupDisplayName',
				'mail_send' => 0,
				'mimetype' => 'myMimeType',
			], $share, [], false
		];

		// with unknown group / no group backend
		$share = \OC::$server->getShareManager()->newShare();
		$share->setShareType(Share::SHARE_TYPE_GROUP)
			->setSharedWith('recipientGroup2')
			->setSharedBy('initiator')
			->setShareOwner('owner')
			->setPermissions(\OCP\Constants::PERMISSION_READ)
			->setNode($file)
			->setShareTime(new \DateTime('2000-01-01T00:01:02'))
			->setTarget('myTarget')
			->setId(42);
		$result[] = [
			[
				'id' => 42,
				'share_type' => Share::SHARE_TYPE_GROUP,
				'uid_owner' => 'initiator',
				'displayname_owner' => 'initiator',
				'permissions' => 1,
				'stime' => 946684862,
				'parent' => null,
				'expiration' => null,
				'token' => null,
				'uid_file_owner' => 'owner',
				'displayname_file_owner' => 'owner',
				'path' => 'file',
				'item_type' => 'file',
				'storage_id' => 'storageId',
				'storage' => 100,
				'item_source' => 3,
				'file_source' => 3,
				'file_parent' => 1,
				'file_target' => 'myTarget',
				'share_with' => 'recipientGroup2',
				'share_with_displayname' => 'recipientGroup2',
				'mail_send' => 0,
				'mimetype' => 'myMimeType',
			], $share, [], false
		];

		$share = \OC::$server->getShareManager()->newShare();
		$share->setShareType(Share::SHARE_TYPE_LINK)
			->setSharedBy('initiator')
			->setShareOwner('owner')
			->setPermissions(\OCP\Constants::PERMISSION_READ)
			->setNode($file)
			->setShareTime(new \DateTime('2000-01-01T00:01:02'))
			->setTarget('myTarget')
			->setPassword('mypassword')
			->setExpirationDate(new \DateTime('2001-01-02T00:00:00'))
			->setToken('myToken')
			->setName('some_name')
			->setId(42);

		$result[] = [
			[
				'id' => 42,
				'share_type' => Share::SHARE_TYPE_LINK,
				'uid_owner' => 'initiator',
				'displayname_owner' => 'initiator',
				'permissions' => 1,
				'stime' => 946684862,
				'parent' => null,
				'expiration' => '2001-01-02 00:00:00',
				'token' => 'myToken',
				'uid_file_owner' => 'owner',
				'displayname_file_owner' => 'owner',
				'path' => 'file',
				'item_type' => 'file',
				'storage_id' => 'storageId',
				'storage' => 100,
				'item_source' => 3,
				'file_source' => 3,
				'file_parent' => 1,
				'file_target' => 'myTarget',
				'share_with' => 'mypassword',
				'share_with_displayname' => 'mypassword',
				'mail_send' => 0,
				'url' => 'myLink',
				'mimetype' => 'myMimeType',
				'name' => 'some_name',
			], $share, [], false
		];

		$share = \OC::$server->getShareManager()->newShare();
		$share->setShareType(Share::SHARE_TYPE_REMOTE)
			->setSharedBy('initiator')
			->setSharedWith('user@server.com')
			->setShareOwner('owner')
			->setPermissions(\OCP\Constants::PERMISSION_READ)
			->setNode($folder)
			->setShareTime(new \DateTime('2000-01-01T00:01:02'))
			->setTarget('myTarget')
			->setId(42);

		$result[] = [
			[
				'id' => 42,
				'share_type' => Share::SHARE_TYPE_REMOTE,
				'uid_owner' => 'initiator',
				'displayname_owner' => 'initiator',
				'permissions' => 1,
				'stime' => 946684862,
				'parent' => null,
				'expiration' => null,
				'token' => null,
				'uid_file_owner' => 'owner',
				'displayname_file_owner' => 'owner',
				'path' => 'folder',
				'item_type' => 'folder',
				'storage_id' => 'storageId',
				'storage' => 100,
				'item_source' => 2,
				'file_source' => 2,
				'file_parent' => 1,
				'file_target' => 'myTarget',
				'share_with' => 'user@server.com',
				'share_with_displayname' => 'user@server.com',
				'mail_send' => 0,
				'mimetype' => 'myFolderMimeType',
			], $share, [], false
		];

		$share = \OC::$server->getShareManager()->newShare();
		$share->setShareType(Share::SHARE_TYPE_USER)
			->setSharedBy('initiator')
			->setSharedWith('recipient')
			->setShareOwner('owner')
			->setPermissions(\OCP\Constants::PERMISSION_READ)
			->setShareTime(new \DateTime('2000-01-01T00:01:02'))
			->setTarget('myTarget')
			->setId(42);

		$result[] = [
			[], $share, [], true
		];

		return $result;
	}

	/**
	 * @dataProvider dataFormatShare
	 *
	 * @param array $expects
	 * @param \OCP\Share\IShare $share
	 * @param array $users
	 * @param $exception
	 * @throws NotFoundException
	 */
	public function testFormatShare(array $expects, \OCP\Share\IShare $share, array $users, $exception) {
		$this->userManager->method('get')->will($this->returnValueMap($users));

		$recipientGroup = $this->createMock(IGroup::class);
		$recipientGroup->method('getDisplayName')->willReturn('recipientGroupDisplayName');
		$this->groupManager->method('get')->will($this->returnValueMap([
			 ['recipientGroup', $recipientGroup],
		]));

		$this->urlGenerator->method('linkToRouteAbsolute')
			->with('files_sharing.sharecontroller.showShare', ['token' => 'myToken'])
			->willReturn('myLink');

		$this->rootFolder->method('getUserFolder')
			->with($this->currentUser->getUID())
			->will($this->returnSelf());

		if (!$exception) {
			$this->rootFolder->method('getById')
				->with($share->getNodeId())
				->willReturn([$share->getNode()]);

			$this->rootFolder->method('getRelativePath')
				->with($share->getNode()->getPath())
				->will($this->returnArgument(0));
		}

		try {
			$result = $this->invokePrivate($this->ocs, 'formatShare', [$share]);
			$this->assertFalse($exception);
			$this->assertEquals($expects, $result);
		} catch (NotFoundException $e) {
			$this->assertTrue($exception);
		}
	}

	/**
	 * @return Share20OCS
	 */
	public function getOcsDisabledAPI() {
		$shareManager = $this->getMockBuilder(IManager::class)
			->disableOriginalConstructor()
			->getMock();
		$shareManager
			->expects($this->any())
			->method('shareApiEnabled')
			->willReturn(false);

		return new Share20OCS(
			$shareManager,
			$this->groupManager,
			$this->userManager,
			$this->request,
			$this->rootFolder,
			$this->urlGenerator,
			$this->currentUser,
			$this->l,
			$this->config,
			$this->notificationPublisher,
			$this->eventDispatcher,
			$this->sharingBlacklist
		);
	}

	public function testGetShareApiDisabled() {
		$ocs = $this->getOcsDisabledAPI();

		$expected = new Result(null, 404, 'Share API is disabled');
		$result = $ocs->getShare('my:id');

		$this->assertEquals($expected, $result);
	}

	public function testDeleteShareApiDisabled() {
		$ocs = $this->getOcsDisabledAPI();

		$expected = new Result(null, 404, 'Share API is disabled');
		$result = $ocs->deleteShare('my:id');

		$this->assertEquals($expected, $result);
	}

	public function testCreateShareApiDisabled() {
		$ocs = $this->getOcsDisabledAPI();

		$expected = new Result(null, 404, 'Share API is disabled');
		$result = $ocs->createShare();

		$this->assertEquals($expected, $result);
	}

	public function testGetSharesApiDisabled() {
		$ocs = $this->getOcsDisabledAPI();

		$expected = new Result();
		$result = $ocs->getShares();

		$this->assertEquals($expected, $result);
	}

	public function testUpdateShareApiDisabled() {
		$ocs = $this->getOcsDisabledAPI();

		$expected = new Result(null, 404, 'Share API is disabled');
		$result = $ocs->updateShare('my:id');

		$this->assertEquals($expected, $result);
	}

	public function additionalInfoDataProvider() {
		return [
			['', null],
			['unsupported', null],
			['email', 'email@example.com'],
			['id', 'recipient_id'],
		];
	}

	/**
	 * @dataProvider additionalInfoDataProvider
	 */
	public function testGetShareAdditionalInfo($configValue, $expectedInfo) {
		$config = $this->createMock(IConfig::class);
		$config->method('getAppValue')
			->will($this->returnValueMap([
				['core', 'shareapi_default_permissions', \OCP\Constants::PERMISSION_ALL, \OCP\Constants::PERMISSION_READ | \OCP\Constants::PERMISSION_CREATE],
				['core', 'user_additional_info_field', '', $configValue],
			]));

		$initiator = $this->createMock(IUser::class);
		$recipient = $this->createMock(IUser::class);
		$owner = $this->createMock(IUser::class);
		$this->userManager->method('get')->will($this->returnValueMap([
			['initiator', $initiator],
			['recipient', $recipient],
			['owner', $owner],
		]));

		$recipient->method('getUID')->willReturn('recipient_id');
		$recipient->method('getEMailAddress')->willReturn('email@example.com');

		$ocs = new Share20OCS(
			$this->shareManager,
			$this->groupManager,
			$this->userManager,
			$this->request,
			$this->rootFolder,
			$this->urlGenerator,
			$this->currentUser,
			$this->l,
			$config,
			$this->notificationPublisher,
			$this->eventDispatcher,
			$this->sharingBlacklist
		);

		list($file, ) = $this->getMockFileFolder();

		$share = \OC::$server->getShareManager()->newShare();
		$share->setShareType(Share::SHARE_TYPE_USER)
			->setSharedWith('recipient')
			->setSharedBy('initiator')
			->setShareOwner('owner')
			->setPermissions(\OCP\Constants::PERMISSION_READ)
			->setNode($file)
			->setShareTime(new \DateTime('2000-01-01T00:01:02'))
			->setTarget('myTarget')
			->setId(42);

		$this->rootFolder->method('getUserFolder')
			->with($this->currentUser->getUID())
			->will($this->returnSelf());

		$this->rootFolder->method('getById')
			->with($share->getNodeId())
			->willReturn([$share->getNode()]);

		$this->rootFolder->method('getRelativePath')
			->with($share->getNode()->getPath())
			->will($this->returnArgument(0));

		$result = $this->invokePrivate($ocs, 'formatShare', [$share]);

		$this->assertEquals($expectedInfo, $result['share_with_additional_info']);
	}

	public function providesGetSharesAll() {
		return [
			[
				null,
				false,
			],
			[
				'/requested/path',
				true,
			],
			[
				'/requested/path',
				false,
			],
			[
				'/requested/path',
				true,
				true
			],
		];
	}

	/**
	 * @dataProvider providesGetSharesAll
	 */
	public function testGetSharesAll($requestedPath, $requestedReshares, $fedAllowed = false) {
		$userShare = $this->newShare();
		$groupShare = $this->newShare();
		$linkShare = $this->newShare();
		$federatedShare = $this->newShare();

		$node = null;
		if ($requestedPath !== null) {
			$node = $this->createMock(Node::class);
			$node->expects($this->at(0))
				->method('lock');
			$node->expects($this->at(1))
				->method('unlock');

			$userFolder = $this->createMock(Folder::class);
			$userFolder->expects($this->once())
				->method('get')
				->with($requestedPath)
				->willReturn($node);
			$this->rootFolder->expects($this->once())
				->method('getUserFolder')
				->with('currentUser')
				->willReturn($userFolder);
		} else {
			$this->rootFolder->expects($this->never())->method('getUserFolder');
		}

		$this->shareManager->method('getSharesBy')
			->will($this->returnValueMap([
				['currentUser', \OCP\Share::SHARE_TYPE_USER, $node, $requestedReshares, -1, 0, [$userShare]],
				['currentUser', \OCP\Share::SHARE_TYPE_GROUP, $node, $requestedReshares, -1, 0, [$groupShare]],
				['currentUser', \OCP\Share::SHARE_TYPE_LINK, $node, $requestedReshares, -1, 0, [$linkShare]],
				['currentUser', \OCP\Share::SHARE_TYPE_REMOTE, $node, $requestedReshares, -1, 0, [$federatedShare]],
			]));

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, $requestedPath],
				['reshares', null, $requestedReshares ? 'true' : 'false'],
		]));

		$this->shareManager->method('outgoingServer2ServerSharesAllowed')->willReturn($fedAllowed);

		$ocs = $this->mockFormatShare();
		$ocs->method('formatShare')->will($this->returnArgument(0));
		$result = $ocs->getShares();

		if ($fedAllowed) {
			$this->assertCount(4, $result->getData());
			$this->assertContains($federatedShare, $result->getData(), 'result contains federated share');
		} else {
			$this->assertCount(3, $result->getData());
		}

		$this->assertContains($userShare, $result->getData(), 'result contains user share');
		$this->assertContains($groupShare, $result->getData(), 'result contains group share');
		$this->assertContains($linkShare, $result->getData(), 'result contains link share');
	}

	public function providesGetSharesSharedWithMe() {
		return [
			[
				null,
				'all',
			],
			[
				'/requested/path',
				'all',
			],
			[
				'/requested/path',
				\OCP\Share::STATE_PENDING,
			],
			[
				'/requested/path',
				\OCP\Share::STATE_ACCEPTED,
			],
			[
				'/requested/path',
				'',
			],
		];
	}

	/**
	 * @dataProvider providesGetSharesSharedWithMe
	 */
	public function testGetSharesSharedWithMe($requestedPath, $stateFilter) {
		$testStateFilter = $stateFilter;
		if ($testStateFilter === '' || $testStateFilter === 'all') {
			$testStateFilter = \OCP\Share::STATE_ACCEPTED;
		}
		$userShare = $this->newShare();
		$userShare->setShareOwner('shareOwner');
		$userShare->setSharedWith('currentUser');
		$userShare->setShareType(\OCP\Share::SHARE_TYPE_USER);
		$userShare->setState($testStateFilter);
		$userShare->setPermissions(\OCP\Constants::PERMISSION_ALL);
		$userShareNoAccess = $this->newShare();
		$userShareNoAccess->setShareOwner('shareOwner');
		$userShareNoAccess->setSharedWith('currentUser');
		$userShareNoAccess->setShareType(\OCP\Share::SHARE_TYPE_USER);
		$userShareNoAccess->setState($testStateFilter);
		$userShareNoAccess->setPermissions(0);
		$userShareDifferentState = $this->newShare();
		$userShareDifferentState->setShareOwner('shareOwner');
		$userShareDifferentState->setSharedWith('currentUser');
		$userShareDifferentState->setShareType(\OCP\Share::SHARE_TYPE_USER);
		$userShareDifferentState->setState($testStateFilter + 1);
		$userShareDifferentState->setPermissions(\OCP\Constants::PERMISSION_ALL);
		$groupShare = $this->newShare();
		$groupShare->setShareOwner('shareOwner');
		$groupShare->setSharedWith('group1');
		$groupShare->setState($testStateFilter);
		$groupShare->setPermissions(\OCP\Constants::PERMISSION_ALL);
		$groupShare->setShareType(\OCP\Share::SHARE_TYPE_GROUP);
		$groupShareNonOwner = $this->newShare();
		$groupShareNonOwner->setShareOwner('currentUser');
		$groupShareNonOwner->setSharedWith('group1');
		$groupShareNonOwner->setState($testStateFilter);
		$groupShareNonOwner->setShareType(\OCP\Share::SHARE_TYPE_GROUP);
		$groupShareNonOwner->setPermissions(\OCP\Constants::PERMISSION_ALL);

		$group = $this->createMock(IGroup::class);
		$group->method('inGroup')->with($this->currentUser)->willReturn(true);

		$this->groupManager->method('get')->with('group1')->willReturn($group);

		$node = null;
		if ($requestedPath !== null) {
			$node = $this->createMock(Node::class);
			$node->expects($this->at(0))
				->method('lock');
			$node->expects($this->at(1))
				->method('unlock');

			$userFolder = $this->createMock(Folder::class);
			$userFolder->expects($this->once())
				->method('get')
				->with($requestedPath)
				->willReturn($node);
			$this->rootFolder->expects($this->once())
				->method('getUserFolder')
				->with('currentUser')
				->willReturn($userFolder);
		} else {
			$this->rootFolder->expects($this->never())->method('getUserFolder');
		}

		$this->shareManager->method('getSharedWith')
			->will($this->returnValueMap([
				['currentUser', \OCP\Share::SHARE_TYPE_USER, $node, -1, 0, [$userShare, $userShareDifferentState, $userShareNoAccess]],
				['currentUser', \OCP\Share::SHARE_TYPE_GROUP, $node, -1, 0, [$groupShare, $groupShareNonOwner]],
			]));

		$this->request
			->method('getParam')
			->will($this->returnValueMap([
				['path', null, $requestedPath],
				['state', \OCP\Share::STATE_ACCEPTED, $stateFilter],
				['shared_with_me', null, 'true'],
		]));

		$ocs = $this->mockFormatShare();
		$ocs->method('formatShare')->will($this->returnArgument(0));
		$result = $ocs->getShares();

		$this->assertContains($userShare, $result->getData(), 'result contains user share');
		$this->assertContains($groupShare, $result->getData(), 'result contains group share');
		$this->assertNotContains($groupShareNonOwner, $result->getData(), 'result does not contain share from same owner');
		$this->assertNotContains($userShareNoAccess, $result->getData(), 'result does not contain inaccessible share');
		if ($stateFilter === 'all') {
			$this->assertCount(3, $result->getData());
			$this->assertContains($userShareDifferentState, $result->getData(), 'result contains shares from all states');
		} else {
			$this->assertCount(2, $result->getData());
			$this->assertNotContains($userShareDifferentState, $result->getData(), 'result contains only share from requested state');
		}
	}

	public function providesAcceptRejectShare() {
		return [
			['acceptShare', '/target', true, \OCP\Share::STATE_ACCEPTED],
			['acceptShare', '/sfoo/target', true, \OCP\Share::STATE_ACCEPTED],
			['acceptShare', '/target', false, \OCP\Share::STATE_ACCEPTED],
			['acceptShare', '/sfoo/target', false, \OCP\Share::STATE_ACCEPTED],
			['declineShare', '/target', true, \OCP\Share::STATE_REJECTED],
			['declineShare', '/sfoo/target', true, \OCP\Share::STATE_REJECTED],
		];
	}

	/**
	 * @dataProvider providesAcceptRejectShare
	 */
	public function testAcceptRejectShare($method, $target, $targetExists, $expectedState) {
		$userShare = $this->makeReceivedUserShareForOperation($target);

		$this->shareManager->expects($this->exactly(1))
			->method('getShareById')
			->with('ocinternal:123', 'currentUser')
			->willReturn($userShare);

		$this->shareManager->expects($this->exactly(2))
			->method('getSharedWith')
			->will($this->returnValueMap([
				['currentUser', Share::SHARE_TYPE_USER, $userShare->getNode(), -1, 0, [$userShare]],
				['currentUser', Share::SHARE_TYPE_GROUP, $userShare->getNode(), -1, 0, []]
			]));

		$this->shareManager->expects($this->once())
			->method('updateShareForRecipient')
			->with($userShare, 'currentUser');

		$userFolder = $this->createMock(Folder::class);
		if ($method === 'acceptShare') {
			// deduplicate
			$userFolder->expects($this->at(0))
				->method('nodeExists')
				->with(\dirname($target))
				->willReturn(true);

			if ($targetExists) {
				$userFolder->expects($this->at(1))
					->method('nodeExists')
					->with($target)
					->willReturn(true);

				$userFolder->expects($this->at(2))
					->method('nodeExists')
					->with("$target (2)")
					->willReturn(false);
			} else {
				$userFolder->expects($this->at(1))
					->method('nodeExists')
					->with($target)
					->willReturn(false);
			}
			$this->eventDispatcher->expects($this->exactly(2))
				->method('dispatch')
				->withConsecutive(
					[$this->equalTo('share.beforeaccept'), $this->equalTo(new GenericEvent(null, ['share' => $userShare]))],
					[$this->equalTo('share.afteraccept'), $this->equalTo(new GenericEvent(null, ['share' => $userShare]))]
				);
		} else {
			$userFolder->expects($this->never())
				->method('nodeExists');
			$this->eventDispatcher->expects($this->exactly(2))
				->method('dispatch')
				->withConsecutive(
					[$this->equalTo('share.beforereject'), $this->equalTo(new GenericEvent(null, ['share' => $userShare]))],
					[$this->equalTo('share.afterreject'), $this->equalTo(new GenericEvent(null, ['share' => $userShare]))]
				);
		}

		$this->rootFolder->method('getUserFolder')
			->with($this->currentUser->getUID())
			->willReturn($userFolder);

		$ocs = $this->mockFormatShare();
		$ocs->method('formatShare')->will($this->returnArgument(0));
		$result = $ocs->$method(123);

		$this->assertEquals(100, $result->getStatusCode());
		$this->assertEquals($userShare, $result->getData()[0], 'result contains updated user share');
		if ($method === 'acceptShare' && $targetExists) {
			$this->assertEquals("$target (2)", $userShare->getTarget());
		} else {
			$this->assertEquals("$target", $userShare->getTarget());
		}
		$this->assertSame($expectedState, $userShare->getState());
	}

	public function providesAcceptRejectShareSameState() {
		return [
			['acceptShare', '/target', true, \OCP\Share::STATE_ACCEPTED],
			['declineShare', '/sfoo/target', true, \OCP\Share::STATE_REJECTED],
		];
	}

	/**
	 * @dataProvider providesAcceptRejectShareSameState
	 */
	public function testAcceptRejectShareSameState($method, $target) {
		$node = $this->createMock(Node::class);

		$userShare = $this->newShare();
		$userShare->setId(123);
		$userShare->setNode($node);

		$this->shareManager->expects($this->exactly(1))
			->method('getShareById')
			->with('ocinternal:123', 'currentUser')
			->willReturn($userShare);

		if ($method === 'acceptShare') {
			$userShare->setState(\OCP\Share::STATE_ACCEPTED);
			$this->eventDispatcher->expects($this->exactly(2))
				->method('dispatch')
				->withConsecutive(
					[$this->equalTo('share.beforeaccept'), $this->equalTo(new GenericEvent(null, ['share' => $userShare]))],
					[$this->equalTo('share.afteraccept'), $this->equalTo(new GenericEvent(null, ['share' => $userShare]))]
				);
		} else {
			$userShare->setState(\OCP\Share::STATE_REJECTED);
			$this->eventDispatcher->expects($this->exactly(2))
				->method('dispatch')
				->withConsecutive(
					[$this->equalTo('share.beforereject'), $this->equalTo(new GenericEvent(null, ['share' => $userShare]))],
					[$this->equalTo('share.afterreject'), $this->equalTo(new GenericEvent(null, ['share' => $userShare]))]
				);
		}

		$ocs = $this->mockFormatShare();
		$result = $ocs->$method(123);
		$this->assertInstanceOf(Result::class, $result);
		$this->assertNull($result->getData()[0]);
		$this->assertEquals(100, $result->getStatusCode());
	}

	/**
	 * @dataProvider providesAcceptRejectShare
	 */
	public function testAcceptRejectShareMultiple($method, $target, $targetExists, $expectedState) {
		$userShare = $this->makeReceivedUserShareForOperation($target);
		$groupShare = $this->newShare();
		$groupShare->setId(234);
		$groupShare->setShareType(Share::SHARE_TYPE_GROUP);
		$groupShare->setSharedWith('group1');
		$groupShare->setNode($userShare->getNode());
		$groupShare->setTarget($target);

		$this->shareManager->expects($this->exactly(1))
			->method('getShareById')
			->with('ocinternal:123', 'currentUser')
			->willReturn($userShare);

		$this->shareManager->expects($this->exactly(2))
			->method('getSharedWith')
			->will($this->returnValueMap([
				['currentUser', Share::SHARE_TYPE_USER, $userShare->getNode(), -1, 0, [$userShare]],
				['currentUser', Share::SHARE_TYPE_GROUP, $userShare->getNode(), -1, 0, [$groupShare]]
			]));

		$this->shareManager->expects($this->exactly(2))
			->method('updateShareForRecipient')
			->withConsecutive($userShare, $groupShare);

		$userFolder = $this->createMock(Folder::class);
		if ($method === 'acceptShare') {
			// deduplicate
			$userFolder->expects($this->at(0))
				->method('nodeExists')
				->with(\dirname($target))
				->willReturn(true);

			if ($targetExists) {
				$userFolder->expects($this->at(1))
					->method('nodeExists')
					->with($target)
					->willReturn(true);

				$userFolder->expects($this->at(2))
					->method('nodeExists')
					->with("$target (2)")
					->willReturn(false);
			} else {
				$userFolder->expects($this->at(1))
					->method('nodeExists')
					->with($target)
					->willReturn(false);
			}
			$this->eventDispatcher->expects($this->exactly(2))
				->method('dispatch')
				->withConsecutive(
					[$this->equalTo('share.beforeaccept'), $this->equalTo(new GenericEvent(null, ['share' => $userShare]))],
					[$this->equalTo('share.afteraccept'), $this->equalTo(new GenericEvent(null, ['share' => $userShare]))]
				);
		} else {
			$userFolder->expects($this->never())
				->method('nodeExists');
			$this->eventDispatcher->expects($this->exactly(2))
				->method('dispatch')
				->withConsecutive(
					[$this->equalTo('share.beforereject'), $this->equalTo(new GenericEvent(null, ['share' => $userShare]))],
					[$this->equalTo('share.afterreject'), $this->equalTo(new GenericEvent(null, ['share' => $userShare]))]
				);
		}

		$this->rootFolder->method('getUserFolder')
			->with($this->currentUser->getUID())
			->willReturn($userFolder);

		$ocs = $this->mockFormatShare();
		$ocs->method('formatShare')->will($this->returnArgument(0));
		$result = $ocs->$method(123);

		$this->assertEquals(100, $result->getStatusCode());
		$this->assertEquals($userShare, $result->getData()[0], 'result contains updated user share');
		if ($method === 'acceptShare' && $targetExists) {
			$this->assertEquals("$target (2)", $userShare->getTarget());
		} else {
			$this->assertEquals("$target", $userShare->getTarget());
		}
		$this->assertSame($expectedState, $userShare->getState());
	}

	/**
	 * @dataProvider providesAcceptRejectShare
	 */
	public function testAcceptRejectShareApiDisabled($method, $target, $targetExists, $expectedState) {
		$ocs = $this->getOcsDisabledAPI();

		$expected = new Result(null, 404, 'Share API is disabled');
		$result = $ocs->$method(123);

		$this->assertEquals($expected, $result);
	}

	private function makeReceivedUserShareForOperation($target) {
		$node = $this->createMock(Node::class);
		$node->expects($this->at(0))
			->method('lock');
		$node->expects($this->at(1))
			->method('unlock');

		$userShare = $this->newShare();
		$userShare->setId(123);
		$userShare->setShareOwner('shareOwner');
		$userShare->setSharedWith('currentUser');
		$userShare->setShareType(\OCP\Share::SHARE_TYPE_USER);
		$userShare->setState(\OCP\Share::STATE_PENDING);
		$userShare->setPermissions(\OCP\Constants::PERMISSION_ALL);
		$userShare->setTarget($target);
		$userShare->setNode($node);

		return $userShare;
	}

	/**
	 * @dataProvider providesAcceptRejectShare
	 */
	public function testAcceptRejectShareInvalidId($method, $target, $targetExists, $expectedState) {
		$this->shareManager->expects($this->any())
			->method('getShareById')
			->with('ocinternal:123')
			->will($this->throwException(new ShareNotFound()));

		$this->shareManager->expects($this->never())
			->method('updateShareForRecipient');

		$expected = new Result(null, 404, 'Wrong share ID, share doesn\'t exist');
		$result = $this->ocs->$method(123);

		$this->assertEquals($expected, $result);
	}

	/**
	 * @dataProvider providesAcceptRejectShare
	 */
	public function testAcceptRejectShareAccessDenied($method, $target, $targetExists, $expectedState) {
		$userShare = $this->makeReceivedUserShareForOperation($target);
		$userShare->setPermissions(0);

		$this->shareManager->expects($this->once())
			->method('getShareById')
			->with('ocinternal:123', 'currentUser')
			->willReturn($userShare);

		$this->shareManager->expects($this->never())
			->method('updateShareForRecipient');

		$expected = new Result(null, 404, 'Wrong share ID, share doesn\'t exist');
		$result = $this->ocs->$method(123);

		$this->assertEquals($expected, $result);
	}

	/**
	 * @dataProvider providesAcceptRejectShare
	 */
	public function testAcceptRejectShareAccessNotRecipient($method, $target, $targetExists, $expectedState) {
		$userShare = $this->makeReceivedUserShareForOperation($target);

		$this->shareManager->expects($this->any())
			->method('getShareById')
			->with('ocinternal:123', 'currentUser')
			->willReturn($userShare);

		$this->shareManager->expects($this->never())
			->method('updateShareForRecipient');

		$userShare->setShareOwner('currentUser');

		$expected = new Result(null, 403, 'Only recipient can change accepted state');
		$result = $this->ocs->$method(123);

		$this->assertEquals($expected, $result);

		$userShare->setShareOwner('anotherUser');
		$userShare->setSharedBy('currentUser');

		$result = $this->ocs->$method(123);

		$this->assertEquals($expected, $result);
	}

	/**
	 * @dataProvider providesAcceptRejectShare
	 */
	public function testAcceptRejectShareOperationError($method, $target, $targetExists, $expectedState) {
		$userShare = $this->makeReceivedUserShareForOperation($target);

		$this->shareManager->expects($this->once())
			->method('getShareById')
			->with('ocinternal:123', 'currentUser')
			->willReturn($userShare);

		$this->shareManager->expects($this->once())
			->method('updateShareForRecipient')
			->will($this->throwException(new \Exception('operation error')));

		$this->shareManager->expects($this->exactly(2))
			->method('getSharedWith')
			->will($this->returnValueMap([
				['currentUser', Share::SHARE_TYPE_USER, $userShare->getNode(), -1, 0, [$userShare]],
				['currentUser', Share::SHARE_TYPE_GROUP, $userShare->getNode(), -1, 0, []]
			]));

		$userFolder = $this->createMock(Folder::class);
		if ($method === 'acceptShare') {
			$userFolder->expects($this->at(0))
				->method('nodeExists')
				->with(\dirname($target))
				->willReturn(true);

			$userFolder->expects($this->at(1))
				->method('nodeExists')
				->with($target)
				->willReturn(false);
		} else {
			$userFolder->expects($this->never())
				->method('nodeExists');
		}

		$this->rootFolder->method('getUserFolder')
			->with($this->currentUser->getUID())
			->willReturn($userFolder);

		$expected = new Result(null, 400, 'operation error');
		$result = $this->ocs->$method(123);

		$this->assertEquals($expected, $result);
	}
}
