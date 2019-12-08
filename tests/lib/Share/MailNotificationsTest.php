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

use OC\Mail\Message;
use OC\Share\MailNotifications;
use OCP\Defaults;
use OCP\Files\Node;
use OCP\IConfig;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\Mail\IMailer;
use OCP\Share\IManager;
use OCP\Share\IShare;
use OCP\Util;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Test\TestCase;

/**
 * Class MailNotificationsTest
 *
 * @group DB
 */
class MailNotificationsTest extends TestCase {
	/** @var IManager | MockObject */
	private $shareManager;
	/** @var IL10N | MockObject */
	private $l10n;
	/** @var IMailer | MockObject */
	private $mailer;
	/** @var ILogger | MockObject */
	private $logger;
	/** @var IConfig | MockObject */
	private $config;
	/** @var Defaults | MockObject */
	private $defaults;
	/** @var IUser | MockObject */
	private $user;
	/** @var IURLGenerator | MockObject */
	private $urlGenerator;
	/** @var EventDispatcherInterface | MockObject */
	private $eventDispatcher;
	/** @var \OCP\Activity\IManager | MockObject */
	private $activityManager;
	/** @var MailNotifications */
	private $mailNotifications;

	public function setUp(): void {
		parent::setUp();

		$this->shareManager = $this->createMock(IManager::class);
		$this->l10n = $this->createMock(IL10N::class);
		$this->mailer = $this->createMock(IMailer::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->config = $this->createMock(IConfig::class);
		$this->defaults = $this->createMock(Defaults::class);
		$this->user = $this->createMock(IUser::class);
		$this->urlGenerator = $this->createMock(IURLGenerator::class);
		$this->activityManager = \OC::$server->getActivityManager();
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
				->method('getEMailAddress')
				->willReturn('sharer@owncloud.com');
		$this->user
				->method('getDisplayName')
				->willReturn('<evil>TestUser</evil>');
		$this->user
			->method('getUID')
			->willReturn('testuser');

		$this->mailNotifications = new MailNotifications(
			$this->shareManager,
			$this->l10n,
			$this->mailer,
			$this->config,
			$this->logger,
			$this->defaults,
			$this->urlGenerator,
			$this->eventDispatcher,
			$this->activityManager
		);
	}

	private function createMockShare($filename, $expiration=null) {
		$expirationDate = null;
		if ($expiration) {
			$expirationDate = $this->createMock(\DateTime::class);
			$expirationDate->method('getTimestamp')->willReturn($expiration);
		}

		$node = $this->createMock(Node::class);
		$node->method('getPath')->willReturn('/testuser/' . $filename);
		$node->method('getName')->willReturn($filename);

		$share = $this->createMock(IShare::class);
		$share->method('getExpirationDate')->willReturn($expirationDate);
		$share->method('getNodeId')->willReturn(1);
		$share->method('getNode')->willReturn($node);
		$share->method('getShareOwner')->willReturn('testuser');
		return $share;
	}

	public function testSendLinkShareMailWithoutReplyTo() {
		$this->config
			->method('getAppValue')
			->withConsecutive(
				['core', 'shareapi_allow_public_notification', 'no'],
				['core', 'shareapi_public_notification_lang', null]
			)
			->willReturnOnConsecutiveCalls('yes', null);
		$message = $this->createMock(Message::class);
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
		$this->shareManager
			->method('getShareByToken')
			->willReturn($this->createMockShare('MyFile', 3600));

		$this->assertSame(
			[],
			$this->mailNotifications->sendLinkShareMail(
				$this->user,
				['lukas@owncloud.com'],
				'https://owncloud.com/file/?foo=bar'
			)
		);
	}

	public function testSendLinkShareMailPersonalNote() {
		$this->config
			->method('getAppValue')
			->withConsecutive(
				['core', 'shareapi_allow_public_notification', 'no'],
				['core', 'shareapi_public_notification_lang', null]
			)
			->willReturnOnConsecutiveCalls('yes', null);
		$message = $this->createMock(Message::class);
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
			->method('setHtmlBody')
			->with($this->stringContains('personal note'));
		$message
			->expects($this->once())
			->method('setPlainBody')
			->with($this->stringContains("personal note"));
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

		$this->shareManager
			->method('getShareByToken')
			->willReturn($this->createMockShare('MyFile', 3600));

		$calledEvent = [];
		$this->eventDispatcher->addListener('share.sendmail', function (GenericEvent $event) use (&$calledEvent) {
			$calledEvent[] = 'share.sendmail';
			$calledEvent[] = $event;
		});

		$this->assertSame(
			[],
			$this->mailNotifications->sendLinkShareMail(
				$this->user,
				['lukas@owncloud.com'],
				'https://owncloud.com/file/?foo=bar',
				"personal note\n"
			)
		);

		$this->assertEquals('share.sendmail', $calledEvent[0]);
		$this->assertInstanceOf(GenericEvent::class, $calledEvent[1]);
		$this->assertArrayHasKey('link', $calledEvent[1]);
		$this->assertEquals('https://owncloud.com/file/?foo=bar', $calledEvent[1]->getArgument('link'));
		$this->assertArrayHasKey('to', $calledEvent[1]);
		$this->assertEquals('lukas@owncloud.com', $calledEvent[1]->getArgument('to'));
	}

	public function testSendLinkShareMailWithReplyTo() {
		$this->config
			->method('getAppValue')
			->withConsecutive(
				['core', 'shareapi_allow_public_notification', 'no'],
				['core', 'shareapi_public_notification_lang', null]
			)
			->willReturnOnConsecutiveCalls('yes', null);
		$message = $this->createMock(Message::class);
		$message
			->expects($this->exactly(2))
			->method('setSubject')
			->with('TestUser shared »MyFile« with you');
		$message
			->expects($this->exactly(2))
			->method('setTo');
		$message
			->expects($this->exactly(2))
			->method('setHtmlBody');
		$message
			->expects($this->exactly(2))
			->method('setPlainBody');
		$message
			->expects($this->exactly(2))
			->method('setFrom')
			->with([Util::getDefaultEmailAddress('sharing-noreply') => 'TestUser via UnitTestCloud']);
		$message
			->expects($this->exactly(2))
			->method('setReplyTo')
			->with(['sharer@owncloud.com']);

		$this->mailer
			->expects($this->exactly(2))
			->method('createMessage')
			->will($this->returnValue($message));
		$this->mailer
			->expects($this->exactly(2))
			->method('send')
			->with($message)
			->will($this->returnValue([]));

		$this->shareManager
			->method('getShareByToken')
			->willReturn($this->createMockShare('MyFile', 3600));

		$this->assertSame(
			[],
			$this->mailNotifications->sendLinkShareMail(
				$this->user,
				['lukas@owncloud.com', 'nickvergessen@owncloud.com'],
				'https://owncloud.com/file/?foo=bar'
			)
		);
	}

	public function dataSendLinkShareMailException() {
		return [
			[['lukas@owncloud.com']],
			[['you@owncloud.com','phil@example.com','jim@example.com.np']]
		];
	}

	/**
	 * @dataProvider dataSendLinkShareMailException
	 * @param array $to
	 */
	public function testSendLinkShareMailException($to) {
		$this->config
			->method('getAppValue')
			->withConsecutive(
				['core', 'shareapi_allow_public_notification', 'no'],
				['core', 'shareapi_public_notification_lang', null]
			)
			->willReturnOnConsecutiveCalls('yes', null);
		$this->setupMailerMock('TestUser shared »MyFile« with you', $to);
		$this->shareManager
			->method('getShareByToken')
			->willReturn($this->createMockShare('MyFile', 3600));

		$this->assertSame(
			$to,
			$this->mailNotifications->sendLinkShareMail(
				$this->user,
				$to,
				'https://owncloud.com/file/?foo=bar'
			)
		);
	}

	public function testSendInternalShareMail() {
		$this->config
			->method('getAppValue')
			->with('core', 'shareapi_allow_mail_notification', 'no')
			->willReturn('yes');
		$this->setupMailerMock('TestUser shared »<welcome>.txt« with you', false);

		$shareMock = $this->getShareMock(
			['file_target' => '/<welcome>.txt', 'item_source' => 123, 'expiration' => '2017-01-01T15:03:01.012345Z']
		);
		$this->shareManager->method('getSharedWith')
			->withAnyParameters()
			->willReturn([$shareMock]);

		$recipient = $this->createMock(IUser::class);
		$recipient->expects($this->once())
			->method('getEMailAddress')
			->willReturn('recipient@owncloud.com');
		$recipient->expects($this->once())
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
		$result = $this->mailNotifications->sendInternalShareMail(
			$this->user,
			'3',
			'file',
			$recipientList
		);
		$this->assertSame([], $result);
	}

	public function testSendInternalShareMailException() {
		$this->config
			->method('getAppValue')
			->with('core', 'shareapi_allow_mail_notification', 'no')
			->willReturn('yes');
		$this->setupMailerMock('TestUser shared »<welcome>.txt« with you', false);

		$share = $this->getShareMock(
			['file_target' => '/<welcome>.txt', 'item_source' => 123, 'expiration' => 'foo']
		);
		$this->shareManager->method('getSharedWith')
			->withAnyParameters()
			->willReturn([$share]);

		$recipient = $this->createMock(IUser::class);
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
		$result = $this->mailNotifications->sendInternalShareMail(
			$this->user,
			'3',
			'file',
			$recipientList
		);
		$this->assertEquals(['Recipient'], $result);
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
		$this->config
			->method('getAppValue')
			->with('core', 'shareapi_allow_mail_notification', 'no')
			->willReturn('yes');
		$recipient = $this->createMock(IUser::class);
		$recipient
				->expects($this->once())
				->method('getEMailAddress')
				->willReturn($emptiness);
		$recipient
				->expects($this->once())
				->method('getDisplayName')
				->willReturn('No mail 1');

		$recipient2 = $this->createMock(IUser::class);
		$recipient2
				->expects($this->once())
				->method('getEMailAddress')
				->willReturn('');
		$recipient2
				->expects($this->once())
				->method('getDisplayName')
				->willReturn('No mail 2');

		$recipientList = [$recipient, $recipient2];
		$result = $this->mailNotifications->sendInternalShareMail(
			$this->user,
			'3',
			'file',
			$recipientList
		);
		$this->assertSame(['No mail 1', 'No mail 2'], $result);
	}

	public function testPublicLinkNotificationIsTranslated() {
		$this->config
			->method('getAppValue')
			->withConsecutive(
				['core', 'shareapi_allow_public_notification', 'no'],
				['core', 'shareapi_public_notification_lang', null]
			)
			->willReturnOnConsecutiveCalls('yes', 'ru');
		$message = $this->createMock(Message::class);
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

		$this->shareManager
			->method('getShareByToken')
			->willReturn($this->createMockShare('MyFile', 3600));

		$this->mailNotifications->sendLinkShareMail(
			$this->user,
			['justin@piper.com'],
			'https://owncloud.com/file/?foo=bar'
		);
	}

	/**
	 * @param string $subject
	 * @param bool $exceptionOnSend
	 */
	protected function setupMailerMock($subject, $exceptionOnSend = true) {
		$message = $this->createMock(Message::class);
		$message
				->expects($this->once())
				->method('setSubject')
				->with($subject);
		$message
				->expects($this->any())
				->method('setTo');
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

	protected function getShareMock(array $shareData) {
		try {
			$expiration = new \DateTime($shareData['expiration']);
		} catch (\Exception $e) {
			$expiration = null;
		}
		$share = $this->createMock(IShare::class);
		$share->method('getTarget')
			->willReturn($shareData['file_target']);
		$share->method('getNodeId')
			->willReturn($shareData['item_source']);
		$share->method('getExpirationDate')
			->willReturn($expiration);
		return $share;
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
		$this->config
			->method('getAppValue')
			->with('core', 'shareapi_allow_mail_notification', 'no')
			->willReturn('yes');
		$this->setupMailerMock('TestUser shared »<welcome>.txt« with you', false);
		$shareMock = $this->getShareMock(
			['file_target' => '/<welcome>.txt', 'item_source' => 123, 'expiration' => '2017-01-01T15:03:01.012345Z']
		);
		$this->shareManager->method('getSharedWith')
			->withAnyParameters()
			->willReturn([$shareMock]);
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
		$result = $this->mailNotifications->sendInternalShareMail(
			$this->user,
			'3',
			'file',
			$recipientList
		);
		$this->assertSame([], $result);
	}

	/**
	 */
	public function testSendLinkShareMailIfObeysConfig() {
		$this->expectException(\OCP\Share\Exceptions\GenericShareException::class);

		$this->config
			->method('getAppValue')
			->with('core', 'shareapi_allow_public_notification', 'no')
			->willReturn('no');
		$this->mailNotifications->sendLinkShareMail(
			$this->user,
			['test@user'],
			''
		);
	}

	/**
	 */
	public function testSendInternalShareMailIfObeysConfig() {
		$this->expectException(\OCP\Share\Exceptions\GenericShareException::class);

		$this->config
			->method('getAppValue')
			->with('core', 'shareapi_allow_mail_notification', 'no')
			->willReturn('no');
		$this->mailNotifications->sendInternalShareMail(
			$this->user,
			'3',
			'file',
			['test@user']
		);
	}
}
