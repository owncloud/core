<?php
/**
 * Copyright (c) 2014 Lukas Reschke <lukas@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Mail;

use OC\Mail\Message;
use Symfony\Component\Mime\Email;
use Test\TestCase;

class MessageTest extends TestCase {
	/** @var Email */
	private $symfonyMail;
	private Message $message;

	public function mailAddressProvider(): array {
		return [
			[['lukas@owncloud.com' => 'Lukas Reschke'], ['lukas@owncloud.com' => 'Lukas Reschke']],
			[['lukas@owncloud.com' => 'Lukas Reschke', 'lukas@öwnclöüd.com', 'lukäs@owncloud.örg' => 'Lükäs Réschke'],
				['lukas@owncloud.com' => 'Lukas Reschke', 'lukas@xn--wncld-iuae2c.com', 'lukäs@owncloud.xn--rg-eka' => 'Lükäs Réschke']],
			[['lukas@öwnclöüd.com'], ['lukas@xn--wncld-iuae2c.com']]
		];
	}

	public function setUp(): void {
		parent::setUp();

		$this->symfonyMail = $this->getMockBuilder(Email::class)
			->disableOriginalConstructor()->getMock();

		$this->message = new Message($this->symfonyMail);
	}

	/**
	 * @requires function idn_to_ascii
	 * @dataProvider mailAddressProvider
	 */
	public function testConvertAddresses(array $unconverted, array $expected): void {
		$this->assertSame($expected, self::invokePrivate($this->message, 'convertAddresses', [$unconverted]));
	}

	public function testSetFrom(): void {
		$this->symfonyMail
			->expects($this->once())
			->method('from')
			->with('lukas@owncloud.com');
		$this->message->setFrom(['lukas@owncloud.com']);
	}

	public function testGetFrom(): void {
		$this->symfonyMail
			->expects($this->once())
			->method('getFrom')
			->willReturn(['lukas@owncloud.com']);

		$this->assertSame(['lukas@owncloud.com'], $this->message->getFrom());
	}

	public function testSetReplyTo(): void {
		$this->symfonyMail
			->expects($this->once())
			->method('replyTo')
			->with('lukas@owncloud.com');
		$this->message->setReplyTo(['lukas@owncloud.com']);
	}

	public function testGetReplyTo(): void {
		$this->symfonyMail
			->expects($this->once())
			->method('getReplyTo')
			->willReturn(['lukas@owncloud.com']);

		$this->assertSame(['lukas@owncloud.com'], $this->message->getReplyTo());
	}

	public function testSetTo(): void {
		$this->symfonyMail
			->expects($this->once())
			->method('to')
			->with('lukas@owncloud.com');
		$this->message->setTo(['lukas@owncloud.com']);
	}

	public function testGetTo(): void {
		$this->symfonyMail
			->expects($this->once())
			->method('getTo')
			->willReturn(['lukas@owncloud.com']);

		$this->assertSame(['lukas@owncloud.com'], $this->message->getTo());
	}

	public function testSetCc(): void {
		$this->symfonyMail
			->expects($this->once())
			->method('cc')
			->with('lukas@owncloud.com');
		$this->message->setCc(['lukas@owncloud.com']);
	}

	public function testGetCc(): void {
		$this->symfonyMail
			->expects($this->once())
			->method('getCc')
			->willReturn(['lukas@owncloud.com']);

		$this->assertSame(['lukas@owncloud.com'], $this->message->getCc());
	}

	public function testSetBcc(): void {
		$this->symfonyMail
			->expects($this->once())
			->method('bcc')
			->with('lukas@owncloud.com');
		$this->message->setBcc(['lukas@owncloud.com']);
	}

	public function testGetBcc(): void {
		$this->symfonyMail
			->expects($this->once())
			->method('getBcc')
			->willReturn(['lukas@owncloud.com']);

		$this->assertSame(['lukas@owncloud.com'], $this->message->getBcc());
	}

	public function testSetSubject(): void {
		$this->symfonyMail
			->expects($this->once())
			->method('subject')
			->with('Fancy Subject');

		$this->message->setSubject('Fancy Subject');
	}

	public function testGetSubject(): void {
		$this->symfonyMail
			->expects($this->once())
			->method('getSubject')
			->willReturn('Fancy Subject');

		$this->assertSame('Fancy Subject', $this->message->getSubject());
	}

	public function testSetPlainBody(): void {
		$this->symfonyMail
			->expects($this->once())
			->method('text')
			->with('Fancy Body');

		$this->message->setPlainBody('Fancy Body');
	}

	public function testGetPlainBody(): void {
		$this->symfonyMail
			->expects($this->once())
			->method('getTextBody')
			->willReturn('Fancy Body');

		$this->assertSame('Fancy Body', $this->message->getPlainBody());
	}

	public function testSetHtmlBody(): void {
		$this->symfonyMail
			->expects($this->once())
			->method('html')
			->with('<blink>Fancy Body</blink>', 'utf-8');

		$this->message->setHtmlBody('<blink>Fancy Body</blink>');
	}
}
