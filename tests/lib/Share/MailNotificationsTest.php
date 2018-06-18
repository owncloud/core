<?php
/**
 * @author Lukas Reschke <lukas@owncloud.com>
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

namespace Test\Share;

use OC\Share\MailNotifications;
use OCP\Defaults;
use OCP\IConfig;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\Mail\IMailer;
use OCP\Share\IShare;
use OCP\Util;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\GenericEvent;
use Test\TestCase;
use OC\Mail\Message;

/**
 * Class MailNotificationsTest
 *
 * @group DB
 */
class MailNotificationsTest extends TestCase {
	/** @var IL10N */
	private $l10n;
	/** @var IMailer | \PHPUnit_Framework_MockObject_MockObject */
	private $mailer;
	/** @var ILogger */
	private $logger;
	/** @var IConfig */
	private $config;
	/** @var Defaults | \PHPUnit_Framework_MockObject_MockObject */
	private $defaults;
	/** @var IUser | \PHPUnit_Framework_MockObject_MockObject */
	private $user;
	/** @var IURLGenerator | \PHPUnit_Framework_MockObject_MockObject */
	private $urlGenerator;
	private $eventDispatcher;

	public function setUp() {
		parent::setUp();

		$this->l10n = $this->getMockBuilder(IL10N::class)
			->disableOriginalConstructor()->getMock();
		$this->mailer = $this->getMockBuilder(IMailer::class)
			->disableOriginalConstructor()->getMock();
		$this->logger = $this->getMockBuilder(ILogger::class)
			->disableOriginalConstructor()->getMock();
		$this->config = $this->getMockBuilder(IConfig::class)
			->disableOriginalConstructor()->getMock();
		$this->defaults = $this->getMockBuilder(Defaults::class)
				->disableOriginalConstructor()->getMock();
		$this->user = $this->getMockBuilder(IUser::class)
				->disableOriginalConstructor()->getMock();
		$this->urlGenerator = $this->createMock(IURLGenerator::class);
		$this->eventDispatcher = new EventDispatcher();

		$this->l10n->expects($this->any())
			->method('t')
			->will($this->returnCallback(function ($text, $parameters = []) {
				return \vsprintf($text, $parameters);
			}));

		$this->defaults
				->expects($this->any())
				->method('getName')
				->will($this->returnValue('UnitTestCloud'));

		$this->user
				->expects($this->once())
				->method('getEMailAddress')
				->willReturn('sharer@owncloud.com');
		$this->user
				->expects($this->once())
				->method('getDisplayName')
				->willReturn('<evil>TestUser</evil>');
	}

	public function testSendLinkShareMailWithoutReplyTo() {
		$message = $this->getMockBuilder(Message::class)
			->disableOriginalConstructor()->getMock();

		$message
			->expects($this->once())
			->method('setSubject')
			->with('TestUser shared »MyFile« with you');
		$message
			->expects($this->once())
			->method('setTo')
			->with(['lukas@owncloud.com']);
		$message
			->expects($this->once())
			->method('setHtmlBody');
		$message
			->expects($this->once())
			->method('setPlainBody');
		$message
			->expects($this->once())
			->method('setFrom')
			->with([Util::getDefaultEmailAddress('sharing-noreply') => 'TestUser via UnitTestCloud']);

		$this->mailer
			->expects($this->once())
			->method('createMessage')
			->will($this->returnValue($message));
		$this->mailer
			->expects($this->once())
			->method('send')
			->with($message)
			->will($this->returnValue([]));

		$mailNotifications = new MailNotifications(
			$this->user,
			$this->l10n,
			$this->mailer,
			$this->config,
			$this->logger,
			$this->defaults,
			$this->urlGenerator,
			$this->eventDispatcher
		);

		$this->assertSame([], $mailNotifications->sendLinkShareMail('lukas@owncloud.com', 'MyFile', 'https://owncloud.com/file/?foo=bar', 3600));
	}

	public function testSendLinkShareMailWithRecipientAndOptions() {
		$message = $this->getMockBuilder(Message::class)
			->disableOriginalConstructor()->getMock();

		$message
			->expects($this->once())
			->method('setSubject')
			->with('TestUser shared »MyFile« with you');
		$message
			->expects($this->exactly(2))
			->method('setTo')
			->with(['lukas@owncloud.com']);
		$message
			->expects($this->once())
			->method('setHtmlBody')
			->with($this->stringContains('personal note<br />'));
		$message
			->expects($this->once())
			->method('setPlainBody')
			->with($this->stringContains("personal note\n"));

		$message
			->expects($this->once())
			->method('setFrom')
			->with([Util::getDefaultEmailAddress('sharing-noreply') => 'TestUser via UnitTestCloud']);

		$this->mailer
			->expects($this->once())
			->method('createMessage')
			->will($this->returnValue($message));

		$this->mailer
			->expects($this->once())
			->method('send')
			->with($message)
			->will($this->returnValue([]));

		$mailNotifications = new MailNotifications(
			$this->user,
			$this->l10n,
			$this->mailer,
			$this->config,
			$this->logger,
			$this->defaults,
			$this->urlGenerator,
			$this->eventDispatcher
		);

		$calledEvent = [];
		$this->eventDispatcher->addListener('share.sendmail', function (GenericEvent $event) use (&$calledEvent) {
			$calledEvent[] = 'share.sendmail';
			$calledEvent[] = $event;
		});
		$this->assertSame([], $mailNotifications->sendLinkShareMail('lukas@owncloud.com', 'MyFile', 'https://owncloud.com/file/?foo=bar', 3600, "personal note\n", ['to' => 'lukas@owncloud.com', 'bcc' => 'foo@bar.com,fabulous@world.com', 'cc' => 'abc@foo.com,tester@world.com']));

		$this->assertEquals('share.sendmail', $calledEvent[0]);
		$this->assertInstanceOf(GenericEvent::class, $calledEvent[1]);
		$this->assertArrayHasKey('link', $calledEvent[1]);
		$this->assertEquals('https://owncloud.com/file/?foo=bar', $calledEvent[1]->getArgument('link'));
		$this->assertArrayHasKey('to', $calledEvent[1]);
		$this->assertEquals('lukas@owncloud.com', $calledEvent[1]->getArgument('to'));
		$this->assertArrayHasKey('bcc', $calledEvent[1]);
		$this->assertEquals('foo@bar.com,fabulous@world.com', $calledEvent[1]->getArgument('bcc'));
		$this->assertArrayHasKey('cc', $calledEvent[1]);
		$this->assertEquals('abc@foo.com,tester@world.com', $calledEvent[1]->getArgument('cc'));
	}

	public function testSendLinkShareMailPersonalNote() {
		$message = $this->getMockBuilder(Message::class)
			->disableOriginalConstructor()->getMock();

		$message
			->expects($this->once())
			->method('setSubject')
			->with('TestUser shared »MyFile« with you');
		$message
			->expects($this->exactly(2))
			->method('setTo')
			->with(['lukas@owncloud.com']);
		$message
			->expects($this->once())
			->method('setHtmlBody')
			->with($this->stringContains('personal note<br />'));
		$message
			->expects($this->once())
			->method('setPlainBody')
			->with($this->stringContains("personal note\n"));

		$message
			->expects($this->once())
			->method('setFrom')
			->with([Util::getDefaultEmailAddress('sharing-noreply') => 'TestUser via UnitTestCloud']);

		$this->mailer
			->expects($this->once())
			->method('createMessage')
			->will($this->returnValue($message));

		$this->mailer
			->expects($this->once())
			->method('send')
			->with($message)
			->will($this->returnValue([]));

		$mailNotifications = new MailNotifications(
			$this->user,
			$this->l10n,
			$this->mailer,
			$this->config,
			$this->logger,
			$this->defaults,
			$this->urlGenerator,
			$this->eventDispatcher
		);

		$calledEvent = [];
		$this->eventDispatcher->addListener('share.sendmail', function (GenericEvent $event) use (&$calledEvent) {
			$calledEvent[] = 'share.sendmail';
			$calledEvent[] = $event;
		});
		$this->assertSame([], $mailNotifications->sendLinkShareMail('lukas@owncloud.com', 'MyFile', 'https://owncloud.com/file/?foo=bar', 3600, "personal note\n", ['to' => 'lukas@owncloud.com']));

		$this->assertEquals('share.sendmail', $calledEvent[0]);
		$this->assertInstanceOf(GenericEvent::class, $calledEvent[1]);
		$this->assertArrayHasKey('link', $calledEvent[1]);
		$this->assertEquals('https://owncloud.com/file/?foo=bar', $calledEvent[1]->getArgument('link'));
		$this->assertArrayHasKey('to', $calledEvent[1]);
		$this->assertEquals('lukas@owncloud.com', $calledEvent[1]->getArgument('to'));
	}

	public function dataSendLinkShareMailWithReplyTo() {
		return [
			['lukas@owncloud.com', ['lukas@owncloud.com']],
			['lukas@owncloud.com nickvergessen@owncloud.com', ['lukas@owncloud.com', 'nickvergessen@owncloud.com']],
			['lukas@owncloud.com,nickvergessen@owncloud.com', ['lukas@owncloud.com', 'nickvergessen@owncloud.com']],
			['lukas@owncloud.com, nickvergessen@owncloud.com', ['lukas@owncloud.com', 'nickvergessen@owncloud.com']],
			['lukas@owncloud.com;nickvergessen@owncloud.com', ['lukas@owncloud.com', 'nickvergessen@owncloud.com']],
			['lukas@owncloud.com; nickvergessen@owncloud.com', ['lukas@owncloud.com', 'nickvergessen@owncloud.com']],
		];
	}

	/**
	 * @dataProvider dataSendLinkShareMailWithReplyTo
	 * @param string $to
	 * @param array $expectedTo
	 */
	public function testSendLinkShareMailWithReplyTo($to, array $expectedTo) {
		$message = $this->getMockBuilder(Message::class)
			->disableOriginalConstructor()->getMock();

		$message
			->expects($this->once())
			->method('setSubject')
			->with('TestUser shared »MyFile« with you');
		$message
			->expects($this->once())
			->method('setTo')
			->with($expectedTo);
		$message
			->expects($this->once())
			->method('setHtmlBody');
		$message
			->expects($this->once())
			->method('setPlainBody');
		$message
			->expects($this->once())
			->method('setFrom')
			->with([Util::getDefaultEmailAddress('sharing-noreply') => 'TestUser via UnitTestCloud']);
		$message
			->expects($this->once())
			->method('setReplyTo')
			->with(['sharer@owncloud.com']);

		$this->mailer
			->expects($this->once())
			->method('createMessage')
			->will($this->returnValue($message));
		$this->mailer
			->expects($this->once())
			->method('send')
			->with($message)
			->will($this->returnValue([]));

		$mailNotifications = new MailNotifications(
			$this->user,
			$this->l10n,
			$this->mailer,
			$this->config,
			$this->logger,
			$this->defaults,
			$this->urlGenerator,
			$this->eventDispatcher
		);
		$this->assertSame([], $mailNotifications->sendLinkShareMail($to, 'MyFile', 'https://owncloud.com/file/?foo=bar', 3600));
	}

	public function dataSendLinkShareMailException() {
		return [
			['lukas@owncloud.com', '', '', 'abc@foo.com', 'lukas@owncloud.com,abc@foo.com'],
			['you@owncloud.com', 'cc1@example.com,cc2@example.com', '', '', 'you@owncloud.com,cc1@example.com,cc2@example.com'],
			['you@owncloud.com', '', 'phil@example.com,jim@example.com.np', '', 'you@owncloud.com,phil@example.com,jim@example.com.np'],
			['you@owncloud.com', 'cc1@example.com,cc2@example.com', 'phil@example.com,jim@example.com.np', '', 'you@owncloud.com,cc1@example.com,cc2@example.com,phil@example.com,jim@example.com.np'],
			['', 'cc1@example.com,cc2@example.com', '', '', 'cc1@example.com,cc2@example.com'],
			['', '', 'phil@example.com,jim@example.com.np', '', 'phil@example.com,jim@example.com.np'],
			['', 'cc1@example.com,cc2@example.com', 'phil@example.com,jim@example.com.np', '', 'cc1@example.com,cc2@example.com,phil@example.com,jim@example.com.np'],
		];
	}

	/**
	 * @dataProvider dataSendLinkShareMailException
	 * @param string $to
	 * @param string $cc
	 * @param string $bcc
	 * @param string $expectedRecipientErrorList
	 */
	public function testSendLinkShareMailException($to, $cc, $bcc, $toList, $expectedRecipientErrorList) {
		$this->setupMailerMock('TestUser shared »MyFile« with you', [$to]);

		$mailNotifications = new MailNotifications(
			$this->user,
			$this->l10n,
			$this->mailer,
			$this->config,
			$this->logger,
			$this->defaults,
			$this->urlGenerator,
			$this->eventDispatcher
		);

		$options = [];

		if ($toList !== '') {
			$options['to'] = $toList;
		}

		if ($cc !== '') {
			$options['cc'] = $cc;
		}

		if ($bcc !== '') {
			$options['bcc'] = $bcc;
		}

		$this->assertSame(
			[$expectedRecipientErrorList],
			$mailNotifications->sendLinkShareMail($to, 'MyFile', 'https://owncloud.com/file/?foo=bar', 3600, null, $options)
		);
	}

	public function testSendInternalShareMail() {
		$this->setupMailerMock('TestUser shared »<welcome>.txt« with you', ['recipient@owncloud.com' => 'Recipient'], false);

		/** @var MailNotifications | \PHPUnit_Framework_MockObject_MockObject $mailNotifications */
		$mailNotifications = $this->getMockBuilder(MailNotifications::class)
			->setMethods(['getItemSharedWithUser'])
			->setConstructorArgs([
				$this->user,
				$this->l10n,
				$this->mailer,
				$this->config,
				$this->logger,
				$this->defaults,
				$this->urlGenerator,
				$this->eventDispatcher
			])
			->getMock();

		$mailNotifications->method('getItemSharedWithUser')
			->withAnyParameters()
			->willReturn([
				['file_target' => '/<welcome>.txt', 'item_source' => 123, 'expiration' => '2017-01-01T15:03:01.012345Z'],
			]);

		$recipient = $this->getMockBuilder(IUser::class)
				->disableOriginalConstructor()->getMock();
		$recipient
				->expects($this->once())
				->method('getEMailAddress')
				->willReturn('recipient@owncloud.com');
		$recipient
				->expects($this->once())
				->method('getDisplayName')
				->willReturn('Recipient');

		$this->urlGenerator->expects($this->once())
			->method('linkToRouteAbsolute')
			->with(
				$this->equalTo('files.viewcontroller.showFile'),
				$this->equalTo([
					'fileId' => 123,
				])
			);

		$recipientList = [$recipient];
		$result = $mailNotifications->sendInternalShareMail($recipientList, '3', 'file');
		$this->assertSame([], $result);
	}

	public function testSendInternalShareMailException() {
		$this->setupMailerMock('TestUser shared »<welcome>.txt« with you', ['recipient@owncloud.com' => 'Recipient'], false);

		/** @var MailNotifications | \PHPUnit_Framework_MockObject_MockObject $mailNotifications */
		$mailNotifications = $this->getMockBuilder(MailNotifications::class)
			->setMethods(['getItemSharedWithUser'])
			->setConstructorArgs([
				$this->user,
				$this->l10n,
				$this->mailer,
				$this->config,
				$this->logger,
				$this->defaults,
				$this->urlGenerator,
				$this->eventDispatcher
			])
			->getMock();

		$mailNotifications->method('getItemSharedWithUser')
			->withAnyParameters()
			->willReturn([
				['file_target' => '/<welcome>.txt', 'item_source' => 123, 'expiration' => 'foo'],
			]);

		$recipient = $this->getMockBuilder(IUser::class)
			->disableOriginalConstructor()->getMock();
		$recipient
			->expects($this->once())
			->method('getEMailAddress')
			->willReturn('recipient@owncloud.com');
		$recipient
			->expects($this->once())
			->method('getDisplayName')
			->willReturn('Recipient');

		$this->urlGenerator->expects($this->once())
			->method('linkToRouteAbsolute')
			->with(
				$this->equalTo('files.viewcontroller.showFile'),
				$this->equalTo([
					'fileId' => 123,
				])
			);

		$this->mailer->expects($this->once())
			->method('send')
			->willThrowException(new \Exception());

		$recipientList = [$recipient];
		$result = $mailNotifications->sendInternalShareMail($recipientList, '3', 'file');
		$this->assertEquals(['Recipient'], $result);
	}

	public function testGetItemSharedWithUser() {
		$mailNotifications = new MailNotifications(
			$this->user,
			$this->l10n,
			$this->mailer,
			$this->config,
			$this->logger,
			$this->defaults,
			$this->urlGenerator,
			$this->eventDispatcher
		);
		/**
		 * The below piece of code is borrowed from
		 * https://github.com/owncloud/core/blob/master/tests/lib/Share/ShareTest.php#L621-L639
		 */
		$uid1 = $this->getUniqueID('user1_');
		$uid2 = $this->getUniqueID('user2_');
		$user2 = $this->createMock(IUser::class);
		$user2->expects($this->once())
			->method('getUID')
			->willReturn($uid2);

		//add dummy values to the share table
		$query = \OC_DB::prepare('INSERT INTO `*PREFIX*share` ('
			.' `item_type`, `item_source`, `item_target`, `share_type`,'
			.' `share_with`, `uid_owner`) VALUES (?,?,?,?,?,?)');
		$args = ['test', 99, 'target1', \OCP\Share::SHARE_TYPE_USER, $uid2, $uid1];
		$query->execute($args);

		$result = $this->invokePrivate($mailNotifications, 'getItemSharedWithUser', [99, 'test', $user2]);
		$this->assertCount(1, $result);
	}

	public function emptinessProvider() {
		return [
			[null],
			[''],
		];
	}

	/**
	 * @dataProvider emptinessProvider
	 */
	public function testSendInternalShareMailNoMail($emptiness) {
		/** @var MailNotifications | \PHPUnit_Framework_MockObject_MockObject $mailNotifications */
		$mailNotifications = $this->getMockBuilder(MailNotifications::class)
			->setMethods(['getItemSharedWithUser'])
			->setConstructorArgs([
				$this->user,
				$this->l10n,
				$this->mailer,
				$this->config,
				$this->logger,
				$this->defaults,
				$this->urlGenerator,
				$this->eventDispatcher
			])
			->getMock();

		$recipient = $this->getMockBuilder(IUser::class)
				->disableOriginalConstructor()->getMock();
		$recipient
				->expects($this->once())
				->method('getEMailAddress')
				->willReturn($emptiness);
		$recipient
				->expects($this->once())
				->method('getDisplayName')
				->willReturn('No mail 1');
		$recipient2 = $this->getMockBuilder(IUser::class)
				->disableOriginalConstructor()->getMock();
		$recipient2
				->expects($this->once())
				->method('getEMailAddress')
				->willReturn('');
		$recipient2
				->expects($this->once())
				->method('getDisplayName')
				->willReturn('No mail 2');

		$recipientList = [$recipient, $recipient2];
		$result = $mailNotifications->sendInternalShareMail($recipientList, '3', 'file');
		$this->assertSame(['No mail 1', 'No mail 2'], $result);
	}

	public function testPublicLinkNotificationIsTranslated() {
		$mailNotifications = new MailNotifications(
			$this->user,
			$this->l10n,
			$this->mailer,
			$this->config,
			$this->logger,
			$this->defaults,
			$this->urlGenerator,
			$this->eventDispatcher
		);
		$this->config->expects($this->once())
			->method('getAppValue')
			->with('core', 'shareapi_public_notification_lang', null)
			->willReturn('ru');
		$message = $this->getMockBuilder(\OC\Mail\Message::class)
			->disableOriginalConstructor()->getMock();
		$message
			->expects($this->once())
			->method('setFrom')
			->with([Util::getDefaultEmailAddress('sharing-noreply') => 'TestUser через UnitTestCloud']);

		$this->mailer
			->expects($this->once())
			->method('createMessage')
			->will($this->returnValue($message));

		$this->l10n->expects($this->never())
			->method('t');

		$mailNotifications->sendLinkShareMail(
			'justin@piper.com', 'MyFile', 'https://owncloud.com/file/?foo=bar', 3600
		);
	}

	/**
	 * @param string $subject
	 */
	protected function setupMailerMock($subject, $to, $exceptionOnSend = true) {
		$message = $this->getMockBuilder(Message::class)
				->disableOriginalConstructor()->getMock();

		$message
				->expects($this->once())
				->method('setSubject')
				->with($subject);
		$message
				->expects($this->any())
				->method('setTo')
				->with($to);
		$message
				->expects($this->once())
				->method('setHtmlBody');
		$message
				->expects($this->any())
				->method('setPlainBody');
		$message
				->expects($this->any())
				->method('setFrom')
				->with([Util::getDefaultEmailAddress('sharing-noreply') => 'TestUser via UnitTestCloud']);

		$this->mailer
				->expects($this->once())
				->method('createMessage')
				->will($this->returnValue($message));
		if ($exceptionOnSend) {
			$this->mailer
					->expects($this->any())
					->method('send')
					->with($message)
					->will($this->throwException(new \Exception('Some Exception Message')));
		}
	}

	public function providesLanguages() {
		return [
			['es', 'en'],
			['en', 'en']
		];
	}

	/**
	 * @dataProvider providesLanguages
	 * @param string $recipientLanguage
	 * @param string $senderLanguage
	 */
	public function testSendInternalShareWithRecipientLanguageCode($recipientLanguage, $senderLanguage) {
		$this->setupMailerMock('TestUser shared »<welcome>.txt« with you', ['recipient@owncloud.com' => 'Recipient'], false);
		$mailNotifications = $this->getMockBuilder('OC\Share\MailNotifications')
			->setMethods(['getItemSharedWithUser'])
			->setConstructorArgs([
				$this->user,
				$this->l10n,
				$this->mailer,
				$this->config,
				$this->logger,
				$this->defaults,
				$this->urlGenerator,
				$this->eventDispatcher
			])
			->getMock();

		$mailNotifications->method('getItemSharedWithUser')
			->withAnyParameters()
			->willReturn([
				['file_target' => '/<welcome>.txt', 'item_source' => 123, 'expiration' => '2017-01-01T15:03:01.012345Z'],
			]);

		$recipient = $this->createMock(IUser::class);
		$recipient->expects($this->once())
			->method('getEMailAddress')
			->willReturn('recipient@owncloud.com');
		$recipient->expects($this->once())
			->method('getDisplayName')
			->willReturn('Recipient');
		$recipient->method('getUID')
			->willReturn('Recipient');

		$this->config->expects($this->once())
			->method('getUserValue')
			->with('Recipient', 'core', 'lang', 'en')
			->willReturn($recipientLanguage);

		$this->l10n->method('getLanguageCode')
			->willReturn($senderLanguage);

		$this->urlGenerator->expects($this->once())
			->method('linkToRouteAbsolute')
			->with(
				$this->equalTo('files.viewcontroller.showFile'),
				$this->equalTo([
					'fileId' => 123,
				])
			);

		$recipientList = [$recipient];

		$result = $mailNotifications->sendInternalShareMail($recipientList, '3', 'file');
		$this->assertSame([], $result);
	}
}
