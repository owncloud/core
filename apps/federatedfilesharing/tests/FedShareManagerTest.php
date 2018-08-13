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

namespace OCA\FederatedFileSharing\Tests;

use OCA\FederatedFileSharing\Address;
use OCA\FederatedFileSharing\AddressHandler;
use OCA\FederatedFileSharing\FederatedShareProvider;
use OCA\FederatedFileSharing\FedShareManager;
use OCA\FederatedFileSharing\Notifications;
use OCA\Files_Sharing\Activity;
use OCP\Activity\IEvent;
use OCP\Activity\IManager as ActivityManager;
use OCP\IUserManager;
use OCP\Notification\IAction;
use OCP\Notification\IManager as NotificationManager;
use OCP\Notification\INotification;
use OCP\Share\IShare;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class FedShareManagerTest
 *
 * @package OCA\FederatedFileSharing\Tests
 * @group DB
 */
class FedShareManagerTest extends TestCase {
	/** @var FederatedShareProvider | \PHPUnit_Framework_MockObject_MockObject */
	private $federatedShareProvider;

	/** @var Notifications | \PHPUnit_Framework_MockObject_MockObject */
	private $notifications;

	/** @var IUserManager | \PHPUnit_Framework_MockObject_MockObject */
	private $userManager;

	/** @var ActivityManager | \PHPUnit_Framework_MockObject_MockObject */
	private $activityManager;

	/** @var NotificationManager | \PHPUnit_Framework_MockObject_MockObject */
	private $notificationManager;

	/** @var FedShareManager | \PHPUnit_Framework_MockObject_MockObject */
	private $fedShareManager;

	/** @var AddressHandler | \PHPUnit_Framework_MockObject_MockObject */
	private $addressHandler;

	/** @var EventDispatcherInterface | \PHPUnit_Framework_MockObject_MockObject */
	private $eventDispatcher;

	protected function setUp() {
		parent::setUp();

		$this->federatedShareProvider = $this->getMockBuilder(
			FederatedShareProvider::class
		)->disableOriginalConstructor()->getMock();
		$this->notifications = $this->getMockBuilder(Notifications::class)
			->disableOriginalConstructor()->getMock();
		$this->userManager = $this->getMockBuilder(IUserManager::class)
			->getMock();
		$this->activityManager = $this->getMockBuilder(ActivityManager::class)
			->getMock();
		$this->notificationManager = $this->getMockBuilder(NotificationManager::class)
			->getMock();
		$this->addressHandler = $this->getMockBuilder(AddressHandler::class)
			->disableOriginalConstructor()->getMock();

		$this->eventDispatcher = $this->getMockBuilder(EventDispatcherInterface::class)
			->getMock();

		$this->fedShareManager = $this->getMockBuilder(FedShareManager::class)
			->setConstructorArgs(
				[
					$this->federatedShareProvider,
					$this->notifications,
					$this->userManager,
					$this->activityManager,
					$this->notificationManager,
					$this->addressHandler,
					$this->eventDispatcher
				]
			)
			->setMethods(['getFile'])
			->getMock();
	}

	public function testCreateShare() {
		$shareWith = 'Bob';
		$owner = 'Alice';
		$ownerFederatedId = 'server2';
		$sharedByFederatedId = 'server3';
		$sharedBy = 'Steve';
		$ownerAddress = new Address("$owner@$ownerFederatedId");
		$sharedByAddress = new Address("$sharedBy@$sharedByFederatedId");
		$remoteId = 42;
		$name = 'file.ext';
		$token = 'idk';

		$event = $this->getMockBuilder(IEvent::class)->getMock();
		$event->method($this->anything())
			->willReturnSelf();
		$event->expects($this->at(3))
			->method($this->anything())
			->with(Activity::SUBJECT_REMOTE_SHARE_RECEIVED)
			->willReturnSelf();

		$this->activityManager->expects($this->once())
			->method('generateEvent')
			->willReturn($event);

		$action = $this->getMockBuilder(IAction::class)->getMock();
		$action->method($this->anything())->willReturnSelf();
		$notification = $this->getMockBuilder(INotification::class)->getMock();
		$notification->method('createAction')->willReturn($action);
		$notification->method($this->anything())
			->willReturnSelf();

		$this->notificationManager->expects($this->once())
			->method('createNotification')
			->willReturn($notification);

		$this->fedShareManager->createShare(
			$ownerAddress,
			$sharedByAddress,
			$shareWith,
			$remoteId,
			$name,
			$token
		);
	}

	public function testAcceptShare() {
		$this->fedShareManager->expects($this->once())
			->method('getFile')
			->willReturn(['/file','http://file']);

		$node = $this->getMockBuilder(\OCP\Files\File::class)
			->disableOriginalConstructor()->getMock();
		$node->expects($this->once())
			->method('getId')
			->willReturn(42);

		$share = $this->getMockBuilder(IShare::class)->getMock();
		$share->expects($this->once())
			->method('getNode')
			->willReturn($node);

		$event = $this->getMockBuilder(IEvent::class)->getMock();
		$event->method($this->anything())
			->willReturnSelf();
		$event->expects($this->at(3))
			->method($this->anything())
			->with(Activity::SUBJECT_REMOTE_SHARE_ACCEPTED)
			->willReturnSelf();

		$this->activityManager->expects($this->once())
			->method('generateEvent')
			->willReturn($event);

		$this->fedShareManager->acceptShare($share);
	}

	public function testDeclineShare() {
		$this->fedShareManager->expects($this->once())
			->method('getFile')
			->willReturn(['/file','http://file']);

		$node = $this->getMockBuilder(\OCP\Files\File::class)
			->disableOriginalConstructor()->getMock();
		$node->expects($this->once())
			->method('getId')
			->willReturn(42);

		$share = $this->getMockBuilder(IShare::class)->getMock();
		$share->expects($this->once())
			->method('getNode')
			->willReturn($node);
		$share->method('getShareOwner')
			->willReturn('Alice');
		$share->method('getSharedBy')
			->willReturn('Bob');

		$this->notifications->expects($this->once())
			->method('sendDeclineShare');

		$event = $this->getMockBuilder(IEvent::class)->getMock();
		$event->method($this->anything())
			->willReturnSelf();
		$event->expects($this->at(3))
			->method($this->anything())
			->with(Activity::SUBJECT_REMOTE_SHARE_DECLINED)
			->willReturnSelf();

		$this->activityManager->expects($this->once())
			->method('generateEvent')
			->willReturn($event);

		$this->fedShareManager->declineShare($share);
	}

	public function testUnshare() {
		$shareRow = [
			'id' => 42,
			'remote' => 'peer',
			'remote_id' => 142,
			'share_token' => 'abc',
			'password' => '',
			'name' => 'McGee',
			'owner' => 'Alice',
			'user' => 'Bob',
			'mountpoint' => '/mount/',
			'accepted' => 1
		];
		$this->federatedShareProvider
			->method('unshare')
			->willReturn($shareRow);

		$notification = $this->getMockBuilder(INotification::class)->getMock();
		$notification->method($this->anything())
			->willReturnSelf();

		$this->notificationManager->expects($this->once())
			->method('createNotification')
			->willReturn($notification);

		$event = $this->getMockBuilder(IEvent::class)->getMock();
		$event->method($this->anything())
			->willReturnSelf();
		$event->expects($this->at(3))
			->method($this->anything())
			->with(Activity::SUBJECT_REMOTE_SHARE_UNSHARED)
			->willReturnSelf();

		$this->activityManager->expects($this->once())
			->method('generateEvent')
			->willReturn($event);

		$this->fedShareManager->unshare($shareRow['id'], $shareRow['share_token']);
	}

	public function testRevoke() {
		$share = $this->getMockBuilder(IShare::class)
			->disableOriginalConstructor()->getMock();
		$this->federatedShareProvider->expects($this->once())
			->method('removeShareFromTable')
			->with($share);
		$this->fedShareManager->revoke($share);
	}
}
