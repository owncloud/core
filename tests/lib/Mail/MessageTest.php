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
use Symfony\Component\Mime\Part\DataPart;
use Test\TestCase;

class MessageTest extends TestCase {
	/** @var Email */
	private $email;
	/** @var Message */
	private $message;

	/**
	 * @return array
	 */
	public function mailAddressProvider() {
		return [
			[['lukas@owncloud.com' => 'Lukas Reschke'], ['lukas@owncloud.com' => 'Lukas Reschke']],
			[['lukas@owncloud.com' => 'Lukas Reschke', 'lukas@öwnclöüd.com', 'lukäs@owncloud.örg' => 'Lükäs Réschke'],
				['lukas@owncloud.com' => 'Lukas Reschke', 'lukas@xn--wncld-iuae2c.com', 'lukäs@owncloud.xn--rg-eka' => 'Lükäs Réschke']],
			[['lukas@öwnclöüd.com'], ['lukas@xn--wncld-iuae2c.com']]
		];
	}

	public function setUp(): void {
		parent::setUp();

		$this->email = $this->getMockBuilder(Email::class)
			->disableOriginalConstructor()->getMock();

		$this->message = new Message($this->email);
	}

	/**
	 * @requires function idn_to_ascii
	 * @dataProvider mailAddressProvider
	 *
	 * @param string $unconverted
	 * @param string $expected
	 */
	public function testConvertAddresses($unconverted, $expected) {
		$this->assertSame($expected, self::invokePrivate($this->message, 'convertAddresses', [$unconverted]));
	}

	public function testSetFrom() {
		$this->email
			->expects($this->once())
			->method('from')
			->with(Address::create('lukas@owncloud.com'));
		$this->message->setFrom(['lukas@owncloud.com']);
	}

	public function testGetFrom() {
		$this->email
			->expects($this->once())
			->method('getFrom')
			->will($this->returnValue(['lukas@owncloud.com']));

		$this->assertSame(['lukas@owncloud.com'], $this->message->getFrom());
	}

	public function testSetReplyTo() {
		$this->email
			->expects($this->once())
			->method('replyTo')
			->with(Address::create('lukas@owncloud.com'));
		$this->message->setReplyTo(['lukas@owncloud.com']);
	}

	public function testGetReplyTo() {
		$this->email
			->expects($this->once())
			->method('getReplyTo')
			->will($this->returnValue(['lukas@owncloud.com']));

		$this->assertSame(['lukas@owncloud.com'], $this->message->getReplyTo());
	}

	public function testSetTo() {
		$this->email
			->expects($this->once())
			->method('to')
			->with(Address::create('lukas@owncloud.com'));
		$this->message->setTo(['lukas@owncloud.com']);
	}

	public function testGetTo() {
		$this->email
			->expects($this->once())
			->method('getTo')
			->will($this->returnValue(['lukas@owncloud.com']));

		$this->assertSame(['lukas@owncloud.com'], $this->message->getTo());
	}

	public function testSetCc() {
		$this->email
			->expects($this->once())
			->method('cc')
			->with(Address::create('lukas@owncloud.com'));
		$this->message->setCc(['lukas@owncloud.com']);
	}

	public function testGetCc() {
		$this->email
			->expects($this->once())
			->method('getCc')
			->will($this->returnValue(['lukas@owncloud.com']));

		$this->assertSame(['lukas@owncloud.com'], $this->message->getCc());
	}

	public function testSetBcc() {
		$this->email
			->expects($this->once())
			->method('bcc')
			->with(Address::create('lukas@owncloud.com'));
		$this->message->setBcc(['lukas@owncloud.com']);
	}

	public function testGetBcc() {
		$this->email
			->expects($this->once())
			->method('getBcc')
			->will($this->returnValue(['lukas@owncloud.com']));

		$this->assertSame(['lukas@owncloud.com'], $this->message->getBcc());
	}

	public function testSetSubject() {
		$this->email
			->expects($this->once())
			->method('subject')
			->with('Fancy Subject');

		$this->message->setSubject('Fancy Subject');
	}

	public function testGetSubject() {
		$this->email
			->expects($this->once())
			->method('getSubject')
			->will($this->returnValue('Fancy Subject'));

		$this->assertSame('Fancy Subject', $this->message->getSubject());
	}

	public function testSetPlainBody() {
		$this->email
			->expects($this->once())
			->method('text')
			->with('Fancy Body');

		$this->message->setPlainBody('Fancy Body');
	}

	public function testGetPlainBody() {
		$content = 'Fancy Body';
		$this->email
			->expects($this->once())
			->method('getBody')
			->will($this->returnValue(new DataPart(body: $content)));

		$this->assertSame($content, $this->message->getPlainBody()->getBody());
	}

	public function testSetHtmlBody() {
		$content = '<blink>Fancy Body</blink>';
		$this->email
			->expects($this->once())
			->method('addPart')
			->with(new DataPart(body: $content, contentType: 'text/html'));

		$this->message->setHtmlBody($content);
	}
}
