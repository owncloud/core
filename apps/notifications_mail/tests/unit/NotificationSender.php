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
use OCA\notifications_mail\NotificationSender;
use OC\Mail\Message;

class NotificationSenderTest extends TestCase {
	private $nsender;
	private $manager;
	private $mailer;
	private $config;
	private $l10nFactory;

	protected function setUp() {
		$this->manager = $this->getMockBuilder('\OCP\Notification\IManager')
			->disableOriginalConstructor()
			->getMock();
		// we have to use an implementation due to the "createMessage" method in the mailer
		$this->mailer = $this->getMockBuilder('\OC\Mail\Mailer')
			->setMethodsExcept(['createMessage'])
			->disableOriginalConstructor()
			->getMock();
		$this->config = $this->getMockBuilder('\OCP\IConfig')
			->disableOriginalConstructor()
			->getMock();
		$this->l10nFactory = $this->getMockBuilder('\OCP\L10N\IFactory')
			->disableOriginalConstructor()
			->getMock();
		$this->nsender = new NotificationSender($this->manager, $this->mailer, $this->config, $this->l10nFactory);
	}

	public function emailProvider() {
		return [
			[['a@test.com', 'b@test.com']],
			[['a@x.invalid.com', 'z@x.invalid.com']],
			[['oöGm41l@test.com', 'huehue@invalid.com']],
			[['@b.test.com']],
			[['', null, 'valid@test.com']],
		];
	}

	/**
	 * @dataProvider emailProvider
	 */
	public function testValidateEmails(array $emails) {
		$pattern = '/^[a-zA-Z0-9][a-zA-Z0-9]*@test\.com$/';

		$this->mailer->method('validateMailAddress')
			->will($this->returnCallback(function($email) use ($pattern){
				return preg_match($pattern, $email) === 1;
		}));

		$expectedValid = [];
		$expectedInvalid = [];
		foreach ($emails as $email) {
			if (preg_match($pattern, $email) === 1) {
				$expectedValid[] = $email;
			} else {
				$expectedInvalid[] = $email;
			}
		}

		$result = $this->nsender->validateEmails($emails);
		$this->assertEquals($expectedValid, $result['valid']);
		$this->assertEquals($expectedInvalid, $result['invalid']);
	}

	public function testSendNotification() {
		$mockedNotification = $this->getMockBuilder('\OCP\Notification\INotification')->disableOriginalConstructor()->getMock();
		$mockedNotification->method('getUser')->willReturn('userTest1');
		$mockedNotification->method('getObjectType')->willReturn('test_obj_type');
		$mockedNotification->method('getObjectId')->willReturn('202');
		$mockedNotification->method('getParsedSubject')->willReturn('This is a parsed subject');
		$mockedNotification->method('getParsedMessage')->willReturn('Parsed message is this');

		$this->manager->method('prepare')->willReturn($mockedNotification);

		$mockedL10N = $this->getMockBuilder('\OCP\IL10N')->disableOriginalConstructor()->getMock();
		$mockedL10N->method('t')
			->will($this->returnCallback(function ($text, $params) {
				return vsprintf($text, $params);
		}));

		$this->l10nFactory->method('get')->willReturn($mockedL10N);
		$this->mailer->expects($this->once())->method('send');

		$sentMessage = $this->nsender->sendNotification($mockedNotification, 'http://test.server/oc', ['test@example.com']);

		$this->assertEquals(['test@example.com' => null], $sentMessage->getTo());
		// check that the subject contains the server url
		$this->assertContains('http://test.server/oc', $sentMessage->getSubject());
		// check the notification id is also present in the subject
		$notifId = $mockedNotification->getObjectType() . "#" . $mockedNotification->getObjectId();
		$this->assertContains($notifId, $sentMessage->getSubject());

		// notification's subject and message must be present in the email body, as well as the server url
file_put_contents('/tmp/fooo', $sentMessage->getPlainBody());
		$this->assertContains($mockedNotification->getParsedSubject(), $sentMessage->getPlainBody());
		$this->assertContains($mockedNotification->getParsedMessage(), $sentMessage->getPlainBody());
		$this->assertContains('http://test.server/oc', $sentMessage->getPlainBody());
	}
}
