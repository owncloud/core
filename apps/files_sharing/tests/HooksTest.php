<?php
/**
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

namespace OCA\Files_Sharing\Tests;

use OCA\Files_Sharing\Hooks;
use OCA\Files_Sharing\SharedStorage;
use OCP\Files\File;
use OCP\Files\Folder;
use OCP\Files\NotFoundException;
use OCP\Files\Storage\IStorage;
use OCP\IUser;
use OCP\IUserSession;
use OCP\Share\IAttributes;
use Symfony\Component\EventDispatcher\GenericEvent;
use OCP\Share\IShare;
use OCP\IURLGenerator;
use OCP\Files\IRootFolder;
use Symfony\Component\EventDispatcher\EventDispatcher;
use OCA\Files_Sharing\Service\NotificationPublisher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * @group DB
 */
class HooksTest extends \Test\TestCase {

	/**
	 * @var EventDispatcherInterface | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $eventDispatcher;

	/**
	 * @var IURLGenerator | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $urlGenerator;

	/**
	 * @var IUserSession | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $userSession;

	/**
	 * @var IRootFolder | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $rootFolder;

	/**
	 * @var \OCP\Share\IManager | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $shareManager;

	/**
	 * @var NotificationPublisher | \PHPUnit\Framework\MockObject\MockObject
	 */
	private $notificationPublisher;

	/**
	 * @var Hooks
	 */
	private $hooks;

	public function setUp() {
		$this->eventDispatcher = new EventDispatcher();
		$this->urlGenerator = $this->createMock(IURLGenerator::class);
		$this->rootFolder = $this->createMock(IRootFolder::class);
		$this->shareManager = $this->createMock(\OCP\Share\IManager::class);
		$this->notificationPublisher = $this->createMock(NotificationPublisher::class);
		$this->userSession = $this->createMock(IUserSession::class);

		$this->hooks = new Hooks(
			$this->rootFolder,
			$this->urlGenerator,
			$this->eventDispatcher,
			$this->shareManager,
			$this->notificationPublisher,
			$this->userSession
		);
		$this->hooks->registerListeners();
	}

	public function testPrivateLink() {
		$this->urlGenerator
			->expects($this->once())
			->method('linkToRoute')
			->with('files.view.index', ['view' => 'sharingin', 'scrollto' => '123'])
			->will($this->returnValue('/owncloud/index.php/apps/files/?view=sharingin&scrollto=123'));

		$share = $this->createMock(IShare::class);
		$share->expects($this->once())
			->method('getNodeId')
			->willReturn(123);

		$otherShare = $this->createMock(IShare::class);
		$otherShare->expects($this->once())
			->method('getNodeId')
			->willReturn(999);

		$this->shareManager->expects($this->exactly(2))
			->method('getSharedWith')
			->withConsecutive(
				['currentuser', \OCP\Share::SHARE_TYPE_USER],
				['currentuser', \OCP\Share::SHARE_TYPE_GROUP]
			)
			->will($this->onConsecutiveCalls(
				[$otherShare],
				[$share]
			));

		$event = new GenericEvent(null, [
			'fileid' => 123,
			'uid' => 'currentuser',
			'resolvedWebLink' => null,
			'resolvedDavLink' => null,
		]);
		$this->eventDispatcher->dispatch('files.resolvePrivateLink', $event);

		$this->assertEquals('/owncloud/index.php/apps/files/?view=sharingin&scrollto=123', $event->getArgument('resolvedWebLink'));
		$this->assertNull($event->getArgument('resolvedDavLink'));
	}

	public function testPrivateLinkNoMatch() {
		$this->urlGenerator
			->expects($this->never())
			->method('linkToRoute');

		$this->shareManager->expects($this->exactly(2))
			->method('getSharedWith')
			->willReturn([]);

		$event = new GenericEvent(null, [
			'fileid' => 123,
			'uid' => 'currentuser',
			'resolvedWebLink' => null,
			'resolvedDavLink' => null,
		]);
		$this->eventDispatcher->dispatch('files.resolvePrivateLink', $event);

		$this->assertNull($event->getArgument('resolvedWebLink'));
		$this->assertNull($event->getArgument('resolvedDavLink'));
	}

	public function testPublishShareNotification() {
		$share = $this->createMock(IShare::class);

		$this->notificationPublisher->expects($this->once())
			->method('sendNotification')
			->with($share);

		$event = new GenericEvent(null, [
			'share' => ['id' => '123'],
			'shareObject' => $share,
		]);
		$this->eventDispatcher->dispatch('share.afterCreate', $event);
	}

	public function testDiscardShareNotification() {
		$share = $this->createMock(IShare::class);

		$this->notificationPublisher->expects($this->once())
			->method('discardNotification')
			->with($share);

		$event = new GenericEvent(null, [
			'share' => ['id' => '123'],
			'shareObject' => $share,
		]);
		$this->eventDispatcher->dispatch('share.afterDelete', $event);
	}

	public function providesDataForCanGet() {
		// normal file (sender) - can download directly
		$senderFileStorage = $this->createMock(IStorage::class);
		$senderFileStorage->method('instanceOfStorage')->with(SharedStorage::class)->willReturn(false);
		$senderFile = $this->createMock(File::class);
		$senderFile->method('getStorage')->willReturn($senderFileStorage);
		$senderUserFolder = $this->createMock(Folder::class);
		$senderUserFolder->method('get')->willReturn($senderFile);

		$result[] = [ '/bar.txt', $senderUserFolder, true ];

		// shared file (receiver) with attribute secure-view-enabled set false -
		// can download directly
		$receiverFileShareAttributes = $this->createMock(IAttributes::class);
		$receiverFileShareAttributes->method('getAttribute')->with('permissions', 'download')->willReturn(true);
		$receiverFileShare = $this->createMock(IShare::class);
		$receiverFileShare->method('getAttributes')->willReturn($receiverFileShareAttributes);
		$receiverFileStorage = $this->createMock(SharedStorage::class);
		$receiverFileStorage->method('instanceOfStorage')->with(SharedStorage::class)->willReturn(true);
		$receiverFileStorage->method('getShare')->willReturn($receiverFileShare);
		$receiverFile = $this->createMock(File::class);
		$receiverFile->method('getStorage')->willReturn($receiverFileStorage);
		$receiverUserFolder = $this->createMock(Folder::class);
		$receiverUserFolder->method('get')->willReturn($receiverFile);

		$result[] = [ '/share-bar.txt', $receiverUserFolder, true ];

		// shared file (receiver) with attribute secure-view-enabled set true -
		// cannot download directly
		$secureReceiverFileShareAttributes = $this->createMock(IAttributes::class);
		$secureReceiverFileShareAttributes->method('getAttribute')->with('permissions', 'download')->willReturn(false);
		$secureReceiverFileShare = $this->createMock(IShare::class);
		$secureReceiverFileShare->method('getAttributes')->willReturn($secureReceiverFileShareAttributes);
		$secureReceiverFileStorage = $this->createMock(SharedStorage::class);
		$secureReceiverFileStorage->method('instanceOfStorage')->with(SharedStorage::class)->willReturn(true);
		$secureReceiverFileStorage->method('getShare')->willReturn($secureReceiverFileShare);
		$secureReceiverFile = $this->createMock(File::class);
		$secureReceiverFile->method('getStorage')->willReturn($secureReceiverFileStorage);
		$secureReceiverUserFolder = $this->createMock(Folder::class);
		$secureReceiverUserFolder->method('get')->willReturn($secureReceiverFile);

		$result[] = [ '/secure-share-bar.txt', $secureReceiverUserFolder, false ];

		return $result;
	}

	/**
	 * @dataProvider providesDataForCanGet
	 */
	public function testCheckDirectCanBeDownloaded($path, $userFolder, $run) {
		$user = $this->createMock(IUser::class);
		$user->method("getUID")->willReturn("test");
		$this->userSession->method("getUser")->willReturn($user);
		$this->userSession->method("isLoggedIn")->willReturn(true);
		$this->rootFolder->method('getUserFolder')->willReturn($userFolder);

		// Simulate direct download of file
		$event = new GenericEvent(null, [ 'path' => $path ]);
		$this->eventDispatcher->dispatch('file.beforeGetDirect', $event);

		$this->assertEquals($run, !$event->hasArgument('errorMessage'));
	}

	public function providesDataForCanZip() {
		// Mock: Normal file/folder storage
		$nonSharedStorage = $this->createMock(IStorage::class);
		$nonSharedStorage->method('instanceOfStorage')->with(SharedStorage::class)->willReturn(false);

		// Mock: Secure-view file/folder shared storage
		$secureReceiverFileShareAttributes = $this->createMock(IAttributes::class);
		$secureReceiverFileShareAttributes->method('getAttribute')->with('permissions', 'download')->willReturn(false);
		$secureReceiverFileShare = $this->createMock(IShare::class);
		$secureReceiverFileShare->method('getAttributes')->willReturn($secureReceiverFileShareAttributes);
		$secureSharedStorage = $this->createMock(SharedStorage::class);
		$secureSharedStorage->method('instanceOfStorage')->with(SharedStorage::class)->willReturn(true);
		$secureSharedStorage->method('getShare')->willReturn($secureReceiverFileShare);

		// 1. can download zipped 2 non-shared files inside non-shared folder
		// 2. can download zipped non-shared folder
		$sender1File = $this->createMock(File::class);
		$sender1File->method('getStorage')->willReturn($nonSharedStorage);
		$sender1Folder = $this->createMock(Folder::class);
		$sender1Folder->method('getStorage')->willReturn($nonSharedStorage);
		$sender1Folder->method('getDirectoryListing')->willReturn([$sender1File, $sender1File]);
		$sender1RootFolder = $this->createMock(Folder::class);
		$sender1RootFolder->method('getStorage')->willReturn($nonSharedStorage);
		$sender1RootFolder->method('getDirectoryListing')->willReturn([$sender1Folder]);
		$sender1UserFolder = $this->createMock(Folder::class);
		$sender1UserFolder->method('get')->willReturn($sender1RootFolder);

		$return[] = [ '/folder', ['bar1.txt', 'bar2.txt'], $sender1UserFolder, true ];
		$return[] = [ '/', 'folder', $sender1UserFolder, true ];

		// 3. cannot download zipped 1 non-shared file and 1 secure-shared inside non-shared folder
		$receiver1File = $this->createMock(File::class);
		$receiver1File->method('getStorage')->willReturn($nonSharedStorage);
		$receiver1SecureFile = $this->createMock(File::class);
		$receiver1SecureFile->method('getStorage')->willReturn($secureSharedStorage);
		$receiver1Folder = $this->createMock(Folder::class);
		$receiver1Folder->method('getStorage')->willReturn($nonSharedStorage);
		$receiver1Folder->method('getDirectoryListing')->willReturn([$receiver1File, $receiver1SecureFile]);
		$receiver1RootFolder = $this->createMock(Folder::class);
		$receiver1RootFolder->method('getStorage')->willReturn($nonSharedStorage);
		$receiver1RootFolder->method('getDirectoryListing')->willReturn([$receiver1Folder]);
		$receiver1UserFolder = $this->createMock(Folder::class);
		$receiver1UserFolder->method('get')->willReturn($receiver1RootFolder);

		$return[] = [ '/folder', ['secured-bar1.txt', 'bar2.txt'], $receiver1UserFolder, false ];

		// 4. cannot download zipped secure-shared folder
		$receiver2Folder = $this->createMock(Folder::class);
		$receiver2Folder->method('getStorage')->willReturn($secureSharedStorage);
		$receiver2RootFolder = $this->createMock(Folder::class);
		$receiver2RootFolder->method('getStorage')->willReturn($nonSharedStorage);
		$receiver2RootFolder->method('getDirectoryListing')->willReturn([$receiver2Folder]);
		$receiver2UserFolder = $this->createMock(Folder::class);
		$receiver2UserFolder->method('get')->willReturn($receiver2RootFolder);

		$return[] = [ '/', 'secured-folder', $receiver2UserFolder, false ];

		return $return;
	}

	/**
	 * @dataProvider providesDataForCanZip
	 */
	public function testCheckZipCanBeDownloaded($dir, $files, $userFolder, $run) {
		$user = $this->createMock(IUser::class);
		$user->method("getUID")->willReturn("test");
		$this->userSession->method("getUser")->willReturn($user);
		$this->userSession->method("isLoggedIn")->willReturn(true);

		$this->rootFolder->method('getUserFolder')->with("test")->willReturn($userFolder);

		// Simulate zip download of folder folder
		$event = new GenericEvent(null, ['dir' => $dir, 'files' => $files, 'run' => true]);
		$this->eventDispatcher->dispatch('file.beforeCreateZip', $event);

		$this->assertEquals($run, $event->getArgument('run'));
		$this->assertEquals($run, !$event->hasArgument('errorMessage'));
	}

	public function testCheckFileUserNotFound() {
		$this->userSession->method("isLoggedIn")->willReturn(false);

		// Simulate zip download of folder folder
		$event = new GenericEvent(null, ['dir' => '/test', 'files' => ['test.txt'], 'run' => true]);
		$this->eventDispatcher->dispatch('file.beforeCreateZip', $event);

		// It should run as this would restrict e.g. share links otherwise
		$this->assertTrue($event->getArgument('run'));
		$this->assertFalse($event->hasArgument('errorMessage'));
	}
}
