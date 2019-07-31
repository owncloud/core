<?php
/**
 * Copyright (c) 2014-2015 Lukas Reschke <lukas@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Mail;

use OC\Mail\Mailer;
use OC_Defaults;
use OCP\IConfig;
use OCP\ILogger;
use Test\TestCase;
use OC\Mail\Message;

class MailerTest extends TestCase {
	/** @var IConfig | \PHPUnit\Framework\MockObject\MockObject */
	private $config;
	/** @var OC_Defaults */
	private $defaults;
	/** @var ILogger | \PHPUnit\Framework\MockObject\MockObject */
	private $logger;
	/** @var Mailer */
	private $mailer;

	public function setUp() {
		parent::setUp();

		$this->config = $this->getMockBuilder(IConfig::class)
			->disableOriginalConstructor()->getMock();
		$this->defaults = $this->getMockBuilder(OC_Defaults::class)
			->disableOriginalConstructor()->getMock();
		$this->logger = $this->getMockBuilder(ILogger::class)
			->disableOriginalConstructor()->getMock();
		$this->mailer = new Mailer($this->config, $this->logger, $this->defaults);
	}

	public function testGetSendMailInstanceSendMail(): void {
		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->with('mail_smtpmode', 'sendmail')
			->will($this->returnValue('sendmail'));

		$mailer = self::invokePrivate($this->mailer, 'getSendMailInstance');
		$this->assertInstanceOf(\Swift_SendmailTransport::class, $mailer);
		$this->assertEquals('/usr/sbin/sendmail -bs', $mailer->getCommand());
	}

	public function testGetSendMailInstanceSendMailQmail(): void {
		$this->config
			->expects($this->once())
			->method('getSystemValue')
			->with('mail_smtpmode', 'sendmail')
			->will($this->returnValue('qmail'));
		$mailer = self::invokePrivate($this->mailer, 'getSendMailInstance');
		$this->assertInstanceOf(\Swift_SendmailTransport::class, $mailer);
		$this->assertEquals('/var/qmail/bin/sendmail -bs', $mailer->getCommand());
	}

	public function testGetInstanceDefault(): void {
		$this->assertInstanceOf(\Swift_Mailer::class, self::invokePrivate($this->mailer, 'getInstance'));
	}

	public function testGetInstanceSendmail(): void {
		$this->config
			->method('getSystemValue')
			->will($this->returnValue('sendmail'));

		$this->assertInstanceOf(\Swift_Mailer::class, self::invokePrivate($this->mailer, 'getInstance'));
	}

	public function testCreateMessage(): void {
		$this->assertInstanceOf(Message::class, $this->mailer->createMessage());
	}

	/**
	 * @expectedException \Exception
	 */
	public function testSendInvalidMailException(): void {
		/** @var Message | \PHPUnit\Framework\MockObject\MockObject $message */
		$message = $this->getMockBuilder(Message::class)
			->disableOriginalConstructor()->getMock();
		$message->expects($this->once())
			->method('getSwiftMessage')
			->will($this->returnValue(new \Swift_Message()));

		$this->mailer->send($message);
	}

	/**
	 * @return array
	 */
	public function mailAddressProvider(): array {
		return [
			['lukas@owncloud.com', true],
			['lukas@localhost', true],
			['lukas@192.168.1.1', true],
			['lukas@éxämplè.com', true],
			['españa@domain.com', true],
			['asdf', false],
			['lukas@owncloud.org@owncloud.com', false]
		];
	}

	/**
	 * @dataProvider mailAddressProvider
	 */
	public function testValidateMailAddress($email, $expected): void {
		$this->assertSame($expected, $this->mailer->validateMailAddress($email));
	}

	public function testLogEntry(): void {
		$this->mailer = $this->getMockBuilder(Mailer::class)
			->setConstructorArgs([$this->config, $this->logger, $this->defaults])
			->setMethods(['getInstance'])
			->getMock();

		$this->mailer->method('getInstance')->willReturn($this->createMock(\Swift_SendmailTransport::class));

		/** @var Message | \PHPUnit\Framework\MockObject\MockObject $message */
		$message = $this->getMockBuilder(Message::class)
			->disableOriginalConstructor()->getMock();
		$message->expects($this->once())
			->method('getSwiftMessage')
			->will($this->returnValue(new \Swift_Message()));

		$from = ['from@example.org' => 'From Address'];
		$to = ['to1@example.org' => 'To Address 1', 'to2@example.org' => 'To Address 2'];
		$cc = ['cc1@example.org' => 'CC Address 1', 'cc2@example.org' => 'CC Address 2'];
		$bcc = ['bcc1@example.org' => 'BCC Address 1', 'bcc2@example.org' => 'BCC Address 2'];

		$message->method('getFrom')->willReturn($from);
		$message->method('getTo')->willReturn($to);
		$message->method('getCc')->willReturn($cc);
		$message->method('getBcc')->willReturn($bcc);
		$message->method('getSubject')->willReturn('Email subject');

		$this->logger->expects($this->once())
			->method('debug')
			->with('Sent mail from "{from}" to "{recipients}" with subject "{subject}"', [
				'app' => 'core',
				'from' => \json_encode($from),
				'recipients' => \json_encode(\array_merge($to, $cc, $bcc)),
				'subject' => 'Email subject'
			]);

		$this->mailer->send($message);
	}
}
