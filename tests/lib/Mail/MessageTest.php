<?php
/**
 * Copyright (c) 2014 Lukas Reschke <lukas@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Mail;

use OC\Mail\Message;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Test\TestCase;

class MessageTest extends TestCase {
	private Email $symfonyMail;
	private Message $message;

	public function setUp(): void {
		parent::setUp();

		$this->symfonyMail = new Email();
		$this->message = new Message($this->symfonyMail);
	}

	public function testFrom(): void {
		$this->message->setFrom(['lukas@owncloud.com']);
		$this->assertSame(['lukas@owncloud.com'], $this->message->getFrom());
		$this->assertEquals([new Address('lukas@owncloud.com')], $this->symfonyMail->getFrom());
	}

	public function testTo(): void {
		$this->message->setTo(['lukas@owncloud.com']);
		$this->assertSame(['lukas@owncloud.com'], $this->message->getTo());
		$this->assertEquals([new Address('lukas@owncloud.com')], $this->symfonyMail->getTo());
	}

	public function testReplyTo(): void {
		$this->message->setReplyTo(['lukas@owncloud.com']);
		$this->assertSame(['lukas@owncloud.com'], $this->message->getReplyTo());
		$this->assertEquals([new Address('lukas@owncloud.com')], $this->symfonyMail->getReplyTo());
	}

	public function testCC(): void {
		$this->message->setCc(['lukas@owncloud.com']);
		$this->assertSame(['lukas@owncloud.com'], $this->message->getCc());
		$this->assertEquals([new Address('lukas@owncloud.com')], $this->symfonyMail->getCc());
	}

	public function testBCC(): void {
		$this->message->setBcc(['lukas@owncloud.com']);
		$this->assertSame(['lukas@owncloud.com'], $this->message->getBcc());
		$this->assertEquals([new Address('lukas@owncloud.com')], $this->symfonyMail->getBcc());
	}
	public function testSubject(): void {
		$this->message->setSubject('Fancy Subject');
		$this->assertSame('Fancy Subject', $this->message->getSubject());
		$this->assertEquals('Fancy Subject', $this->symfonyMail->getSubject());
	}

	public function testSetPlainBody(): void {
		$this->message->setPlainBody('Fancy Body');
		self::assertEquals('Fancy Body', $this->symfonyMail->getTextBody());
	}

	public function testGetPlainBody(): void {
		$this->symfonyMail->text('Fancy Body');
		$this->assertSame('Fancy Body', $this->message->getPlainBody());
	}

	public function testSetHtmlBody(): void {
		$this->message->setHtmlBody('<blink>Fancy Body</blink>');
		self::assertEquals('<blink>Fancy Body</blink>', $this->symfonyMail->getHtmlBody());
	}
}
