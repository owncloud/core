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

use OCP\L10N\IFactory;
use OCP\Notification\IManager as INotificationManager;
use OCP\Share\IManager as IShareManager;
use OCP\Share\IShare;
use OCP\Share\Exceptions\ShareNotFound;
use OCA\Files_Sharing\Notifier;
use OCP\Notification\INotification;
use OCP\Notification\IAction;
use OCP\IGroupManager;

class NotifierTest extends \Test\TestCase {

	/**
	 * @var Notifier
	 */
	private $notifier;

	/** @var INotificationManager */
	private $notificationManager;

	/** @var IShareManager */
	private $shareManager;

	/** @var IGroupManager */
	private $groupManager;

	public function setUp() {
		parent::setUp();

		$this->notificationManager = $this->getMockBuilder(INotificationManager::class)
			->disableOriginalConstructor()
			->getMock();
		$this->shareManager = $this->getMockBuilder(IShareManager::class)
			->disableOriginalConstructor()
			->getMock();

		$this->groupManager = $this->getMockBuilder(IGroupManager::class)
			->disableOriginalConstructor()
			->getMock();

		$this->notifier = new Notifier(
			\OC::$server->getL10NFactory(),
			$this->notificationManager,
			$this->shareManager,
			$this->groupManager
		);
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testPrepareInvalidApp() {
		$notification = $this->createMock(INotification::class);
		$notification->method('getApp')->willReturn('another');
		$this->notifier->prepare($notification, 'en_US');
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testPrepareInvalidSubject() {
		$notification = $this->createMock(INotification::class);
		$notification->method('getApp')->willReturn('files_sharing');
		$notification->method('getSubject')->willReturn('invalid_subject');
		$this->notifier->prepare($notification, 'en_US');
	}

	public function providesPrepare() {
		return [
			// without behalf
			[
				'local_share',
				['owner', 'owner', 'folder'],
				'User owner shared "folder" with you',
			],
			// with behalf
			[
				'local_share',
				['owner', 'alf', 'folder'],
				'User owner shared "folder" with you (on behalf of alf)',
			],
			// auto-accepted share
			[
				'local_share_accepted',
				['owner', 'behalf_user', 'folder'],
				'User owner shared "folder" with you (on behalf of behalf_user)',
			],
		];
	}

	/**
	 * @dataProvider providesPrepare
	 */
	public function testPrepare($subject, $subjectParams, $expectedSubject) {
		$share = $this->createMock(IShare::class);
		$share->method('getShareType')->willReturn(\OCP\Share::SHARE_TYPE_USER);

		$this->shareManager->method('getShareById')->willReturn($share);

		$notification = $this->createMock(INotification::class);

		$notification->method('getApp')->willReturn('files_sharing');
		$notification->method('getSubject')->willReturn($subject);
		$notification->method('getSubjectParameters')->willReturn($subjectParams);

		$action1 = $this->createMock(IAction::class);
		$action1->method('getLabel')->willReturn('accept');
		$action1->expects($this->once())
			->method('setParsedLabel')
			->with('Accept')
			->will($this->returnSelf());

		$action2 = $this->createMock(IAction::class);
		$action2->method('getLabel')->willReturn('decline');
		$action2->expects($this->once())
			->method('setParsedLabel')
			->with('Decline')
			->will($this->returnSelf());
		$action2->expects($this->never())
			->method('setPrimary');

		$actions = [$action1, $action2];
		$notification->method('getActions')->willReturn($actions);

		$notification->expects($this->once())
			->method('setParsedSubject')
			->with($expectedSubject);

		$notification->expects($this->any())
			->method('addParsedAction')
			->withConsecutive([$action1], [$action2]);

		$notification = $this->notifier->prepare($notification, 'en_US');
	}

	public function testPrepareWithGroup() {
		$share = $this->createMock(IShare::class);
		$share->method('getShareType')->willReturn(\OCP\Share::SHARE_TYPE_GROUP);
		$share->method('getSharedWith')->willReturn('big group 1');

		$this->shareManager->method('getShareById')->willReturn($share);

		$notification = $this->createMock(INotification::class);

		$notification->method('getApp')->willReturn('files_sharing');
		$notification->method('getSubject')->willReturn('local_share');
		$notification->method('getSubjectParameters')->willReturn(['owner', 'owner', 'folder']);
		$notification->method('getUser')->willReturn('user1');

		$action1 = $this->createMock(IAction::class);
		$action1->method('getLabel')->willReturn('accept');
		$action1->expects($this->once())
			->method('setParsedLabel')
			->with('Accept')
			->will($this->returnSelf());

		$action2 = $this->createMock(IAction::class);
		$action2->method('getLabel')->willReturn('decline');
		$action2->expects($this->once())
			->method('setParsedLabel')
			->with('Decline')
			->will($this->returnSelf());
		$action2->expects($this->never())
			->method('setPrimary');

		$actions = [$action1, $action2];
		$notification->method('getActions')->willReturn($actions);

		$notification->expects($this->once())
			->method('setParsedSubject')
			->with('User owner shared "folder" with you');

		$notification->expects($this->any())
			->method('addParsedAction')
			->withConsecutive([$action1], [$action2]);

		$this->groupManager->expects($this->once())
			->method('isInGroup')
			->with($this->equalTo('user1'), $this->equalTo('big group 1'))
			->willReturn(true);

		$this->notificationManager->expects($this->never())
			->method('markProcessed');

		$notification = $this->notifier->prepare($notification, 'en_US');
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testPrepareShareWithGroupNotMemberAnyLonger() {
		$share = $this->createMock(IShare::class);
		$share->method('getShareType')->willReturn(\OCP\Share::SHARE_TYPE_GROUP);
		$share->method('getSharedWith')->willReturn('big group 1');

		$this->shareManager->method('getShareById')->willReturn($share);

		$notification = $this->createMock(INotification::class);

		$notification->method('getApp')->willReturn('files_sharing');
		$notification->method('getSubject')->willReturn('local_share');
		$notification->method('getSubjectParameters')->willReturn(['owner', 'owner', 'folder']);
		$notification->method('getUser')->willReturn('user1');

		$this->groupManager->expects($this->once())
			->method('isInGroup')
			->with($this->equalTo('user1'), $this->equalTo('big group 1'))
			->willReturn(false);

		$this->notificationManager->expects($this->once())
			->method('markProcessed')
			->with($this->identicalTo($notification));

		$this->notifier->prepare($notification, 'en_US');
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testPrepareMissingShare() {
		$this->shareManager->method('getShareById')
			->will($this->throwException(new ShareNotFound()));

		$notification = $this->createMock(INotification::class);

		$notification->method('getApp')->willReturn('files_sharing');
		$notification->method('getSubject')->willReturn('local_share');
		$notification->method('getSubjectParameters')->willReturn(['owner', 'owner', 'folder']);
		$notification->method('getUser')->willReturn('user1');

		$this->notificationManager->expects($this->once())
			->method('markProcessed')
			->with($this->identicalTo($notification));

		$this->notifier->prepare($notification, 'en_US');
	}
}
