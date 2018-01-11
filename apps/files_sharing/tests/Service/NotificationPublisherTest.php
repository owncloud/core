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
namespace OCA\Files_Sharing\Tests\API;

use Test\TestCase;
use OCP\Notification\INotification;
use OCA\Files_Sharing\Service\NotificationPublisher;
use OCP\Share\IShare;
use OCP\Files\Node;
use OCP\IGroup;
use OCP\IUser;

/**
 * Class Share20OCSTest
 *
 * @package OCA\Files_Sharing\Tests\Service
 * @group DB
 */
class NotificationPublisherTest extends TestCase {

	/** @var IGroupManager | \PHPUnit_Framework_MockObject_MockObject */
	private $groupManager;

	/** @var IUserManager | \PHPUnit_Framework_MockObject_MockObject */
	private $userManager;

	/** @var \OCP\Notification\IManager | \PHPUnit_Framework_MockObject_MockObject */
	private $notificationManager;

	/** @var IURLGenerator */
	private $urlGenerator;

	/** @var NotificationPublisher */
	private $publisher;

	protected function setUp() {
		$this->groupManager = $this->createMock('OCP\IGroupManager');
		$this->userManager = $this->createMock('OCP\IUserManager');
		$this->notificationManager = $this->createMock(\OCP\Notification\IManager::class);
		$this->urlGenerator = $this->createMock('OCP\IURLGenerator');

		$this->publisher = new NotificationPublisher(
			$this->notificationManager,
			$this->userManager,
			$this->groupManager,
			$this->urlGenerator
		);

		$this->urlGenerator->expects($this->once())
			->method('linkToRouteAbsolute')
			->with('files.viewcontroller.showFile', ['fileId' => 4000])
			->willReturn('/owncloud/f/4000');

		$this->urlGenerator->expects($this->once())
			->method('linkTo')
			->with('', $this->stringStartsWith('ocs/v1.php/apps/files_sharing/api/v1/shares/pending/'))
			->will($this->returnArgument(1));

		$this->urlGenerator->expects($this->once())
			->method('getAbsoluteUrl')
			->will($this->returnArgument(0));
	}

	public function tearDown() {
		parent::tearDown();
	}

	private function createShare() {
		$node = $this->createMock(Node::class);
		$node->method('getId')->willReturn(4000);
		$node->method('getName')->willReturn('node-name');

		$share = $this->createMock(IShare::class);
		$share->method('getId')->willReturn(12300);
		$share->method('getShareOwner')->willReturn('shareOwner');
		$share->method('getSharedBy')->willReturn('sharedBy');
		$share->method('getNode')->willReturn($node);

		return $share;
	}

	private function createExpectedNotification($messageId, $messageParams, $userId, $shareId, $link) {
		$notification = $this->createMock(INotification::class);
		$notification->expects($this->once())
			->method('setApp')
			->with('files_sharing')
			->will($this->returnSelf());
		$notification->expects($this->once())
			->method('setUser')
			->with($userId)
			->will($this->returnSelf());
		$notification->expects($this->any())
			->method('setLink')
			->with($link)
			->will($this->returnSelf());
		$notification->expects($this->once())
			->method('setDateTime')
			->will($this->returnSelf());
		$notification->expects($this->once())
			->method('setObject')
			->with('local_share', $shareId)
			->will($this->returnSelf());
		$notification->expects($this->once())
			->method('setSubject')
			->with($messageId, $messageParams)
			->will($this->returnSelf());
		$notification->expects($this->never())
			->method('setMessage');

		return $notification;
	}

	public function testNotifySingleUserAutoAccept() {
		$notification = $this->createExpectedNotification(
			'local_share_accepted',
			['shareOwner', 'sharedBy', 'node-name'],
			'shareRecipient',
			12300,
			'/owncloud/f/4000'
		);
		$this->notificationManager->expects($this->once())
			->method('createNotification')
			->willReturn($notification);

		$this->notificationManager->expects($this->once())
			->method('notify')
			->with($notification);

		$share = $this->createShare();
		$share->method('getShareType')->willReturn(\OCP\Share::SHARE_TYPE_USER);
		$share->method('getSharedWith')->willReturn('shareRecipient');
		$share->method('getState')->willReturn(\OCP\Share::STATE_ACCEPTED);

		$this->publisher->sendNotification($share);
	}

	public function testNotifyGroupAutoAccept() {
		$expectedNotifications = [
			$this->createExpectedNotification(
				'local_share_accepted',
				['shareOwner', 'sharedBy', 'node-name'],
				'groupMember1',
				12300,
				'/owncloud/f/4000'
			),
			$this->createExpectedNotification(
				'local_share_accepted',
				['shareOwner', 'sharedBy', 'node-name'],
				'groupMember2',
				12300,
				'/owncloud/f/4000'
			),
		];

		$this->notificationManager->expects($this->at(0))
			->method('createNotification')
			->willReturn($expectedNotifications[0]);
		$this->notificationManager->expects($this->at(1))
			->method('notify')
			->with($expectedNotifications[0]);

		$this->notificationManager->expects($this->at(2))
			->method('createNotification')
			->willReturn($expectedNotifications[1]);

		$this->notificationManager->expects($this->at(3))
			->method('notify')
			->with($expectedNotifications[1]);

		$share = $this->createShare();
		$share->method('getShareType')->willReturn(\OCP\Share::SHARE_TYPE_GROUP);
		$share->method('getSharedWith')->willReturn('group1');
		$share->method('getState')->willReturn(\OCP\Share::STATE_ACCEPTED);

		$groupMember1 = $this->createMock(IUser::class);
		$groupMember1->method('getUID')->willReturn('groupMember1');

		$groupMember2 = $this->createMock(IUser::class);
		$groupMember2->method('getUID')->willReturn('groupMember2');

		$group = $this->createMock(IGroup::class);
		$group->expects($this->once())
			->method('getUsers')
			->willReturn([$groupMember1, $groupMember2]);

		$this->groupManager->expects($this->once())
			->method('get')
			->with('group1')
			->willReturn($group);

		$this->publisher->sendNotification($share);
	}

	public function testNotifySingleUserManualAccept() {
		$notification = $this->createExpectedNotification(
			'local_share',
			['shareOwner', 'sharedBy', 'node-name'],
			'shareRecipient',
			12300,
			'/owncloud/f/4000'
		);
		$this->notificationManager->expects($this->once())
			->method('createNotification')
			->willReturn($notification);

		$this->notificationManager->expects($this->once())
			->method('notify')
			->with($notification);

		$share = $this->createShare();
		$share->method('getShareType')->willReturn(\OCP\Share::SHARE_TYPE_USER);
		$share->method('getSharedWith')->willReturn('shareRecipient');
		$share->method('getState')->willReturn(\OCP\Share::STATE_PENDING);

		$endpointUrl = 'ocs/v1.php/apps/files_sharing/api/v1/shares/pending/12300';

		$action1 = $this->createMock(\OCP\Notification\IAction::class);
		$action1->expects($this->once())
			->method('setLabel')
			->with('accept')
			->will($this->returnSelf());
		$action1->expects($this->once())
			->method('setLink')
			->with($endpointUrl, 'POST')
			->will($this->returnSelf());
		$action2 = $this->createMock(\OCP\Notification\IAction::class);
		$action2->expects($this->once())
			->method('setLabel')
			->with('decline')
			->will($this->returnSelf());
		$action2->expects($this->once())
			->method('setLink')
			->with($endpointUrl, 'DELETE')
			->will($this->returnSelf());

		$notification->method('createAction')
			->will($this->onConsecutiveCalls($action1, $action2));

		$addedActions = [];
		$notification->method('addAction')
			->will($this->returnCallback(function ($action) use (&$addedActions) {
				$addedActions[] = $action;
			}));

		$this->publisher->sendNotification($share);

		$this->assertEquals([$action1, $action2], $addedActions);
	}
}

