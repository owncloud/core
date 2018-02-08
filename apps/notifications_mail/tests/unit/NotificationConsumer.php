<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgear.es>
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

namespace OCA\notifications_mail\Tests;

use Test\TestCase;
use OCA\notifications_mail\NotificationConsumer;

class NotificationConsumerTest extends TestCase {
	private $sender;
	private $userManager;
	private $logger;
	private $urlGenerator;
	private $consumer;

	protected function setUp() {
		$this->sender = $this->getMockBuilder('\OCA\notifications_mail\NotificationSender')
			->disableOriginalConstructor()
			->getMock();
		$this->userManager = $this->getMockBuilder('\OCP\IUserManager')
			->disableOriginalConstructor()
			->getMock();
		$this->logger = $this->getMockBuilder('\OCP\ILogger')
			->disableOriginalConstructor()
			->getMock();
		$this->urlGenerator = $this->getMockBuilder('\OCP\IURLGenerator')
			->disableOriginalConstructor()
			->getMock();

		$this->consumer = new NotificationConsumer($this->sender, $this->userManager, $this->logger, $this->urlGenerator);
	}

	public function testNotifyNoActions() {
		$mockedNotification = $this->getMockBuilder('\OCP\Notification\INotification')
			->disableOriginalConstructor()
			->getMock();

		$mockedNotification->method('getActions')->willReturn([]);
		$mockedNotification->method('getObjectType')->willReturn('testobject');
		$mockedNotification->method('getObjectId')->willReturn('467');

		$this->logger->expects($this->once())
			->method('debug')
			->with($this->stringContains('testobject#467 ignored'));

		$this->sender->expects($this->never())
			->method('sendNotification');

		$this->consumer->notify($mockedNotification);
	}

	public function testNotifyMissingUser() {
		$mockedAction = $this->getMockBuilder('\OCP\Notification\IAction')
			->disableOriginalConstructor()
			->getMock();

		$mockedNotification = $this->getMockBuilder('\OCP\Notification\INotification')
			->disableOriginalConstructor()
			->getMock();

		$mockedNotification->method('getActions')->willReturn([$mockedAction]);
		$mockedNotification->method('getObjectType')->willReturn('testobject');
		$mockedNotification->method('getObjectId')->willReturn('467');
		$mockedNotification->method('getUser')->willReturn('missingUser');

		$this->userManager->method('get')
			->with('missingUser')
			->willReturn(null);

		$this->logger->expects($this->once())
			->method('warning')
			->with($this->stringContains('testobject#467 can\'t be sent'));

		$this->sender->expects($this->never())
			->method('sendNotification');

		$this->consumer->notify($mockedNotification);
	}

	public function testNotifyMissingEmail() {
		$mockedUser = $this->getMockBuilder('\OCP\IUser')
			->disableOriginalConstructor()
			->getMock();
		$mockedUser->method('getEMailAddress')
			->willReturn(null);

		$mockedAction = $this->getMockBuilder('\OCP\Notification\IAction')
			->disableOriginalConstructor()
			->getMock();

		$mockedNotification = $this->getMockBuilder('\OCP\Notification\INotification')
			->disableOriginalConstructor()
			->getMock();

		$mockedNotification->method('getActions')->willReturn([$mockedAction]);
		$mockedNotification->method('getObjectType')->willReturn('testobject');
		$mockedNotification->method('getObjectId')->willReturn('467');
		$mockedNotification->method('getUser')->willReturn('validUser');

		$this->userManager->method('get')
			->with('validUser')
			->willReturn($mockedUser);

		$this->logger->expects($this->once())
			->method('warning')
			->with($this->stringContains('testobject#467 can\'t be sent'));

		$this->sender->expects($this->never())
			->method('sendNotification');

		$this->consumer->notify($mockedNotification);
	}

	public function testNotifyInvalidEmail() {
		$mockedUser = $this->getMockBuilder('\OCP\IUser')
			->disableOriginalConstructor()
			->getMock();
		$mockedUser->method('getEMailAddress')
			->willReturn('wiiiiii');

		$mockedAction = $this->getMockBuilder('\OCP\Notification\IAction')
			->disableOriginalConstructor()
			->getMock();

		$mockedNotification = $this->getMockBuilder('\OCP\Notification\INotification')
			->disableOriginalConstructor()
			->getMock();

		$mockedNotification->method('getActions')->willReturn([$mockedAction]);
		$mockedNotification->method('getObjectType')->willReturn('testobject');
		$mockedNotification->method('getObjectId')->willReturn('467');
		$mockedNotification->method('getUser')->willReturn('validUser');

		$this->userManager->method('get')
			->with('validUser')
			->willReturn($mockedUser);

		$this->logger->expects($this->once())
			->method('warning')
			->with($this->stringContains('testobject#467 can\'t be sent'));

		$this->sender->method('validateEmails')
			->willReturn(['valid' => [], 'invalid' => ['wiiiiii']]);
		$this->sender->expects($this->never())
			->method('sendNotification');

		$this->consumer->notify($mockedNotification);
	}

	public function testNotify() {
		$mockedUser = $this->getMockBuilder('\OCP\IUser')
			->disableOriginalConstructor()
			->getMock();
		$mockedUser->method('getEMailAddress')
			->willReturn('we@we.we');

		$mockedAction = $this->getMockBuilder('\OCP\Notification\IAction')
			->disableOriginalConstructor()
			->getMock();

		$mockedNotification = $this->getMockBuilder('\OCP\Notification\INotification')
			->disableOriginalConstructor()
			->getMock();

		$mockedNotification->method('getActions')->willReturn([$mockedAction]);
		$mockedNotification->method('getObjectType')->willReturn('testobject');
		$mockedNotification->method('getObjectId')->willReturn('467');
		$mockedNotification->method('getUser')->willReturn('validUser');

		$this->userManager->method('get')
			->with('validUser')
			->willReturn($mockedUser);

		$this->urlGenerator->method('getAbsoluteURL')
			->with('')
			->willReturn('http://what.ever/oc');

		$this->logger->expects($this->never())
			->method('warning');
		$this->logger->expects($this->never())
			->method('error');
		$this->logger->expects($this->never())
			->method('critical');

		$this->sender->method('validateEmails')
			->willReturn(['valid' => ['we@we.we'], 'invalid' => []]);
		$this->sender->expects($this->once())
			->method('sendNotification')
			->with($mockedNotification, 'http://what.ever/oc', ['we@we.we']);

		$this->consumer->notify($mockedNotification);
	}
}
