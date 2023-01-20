<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV\Tests\unit\CalDAV\Schedule;

use Exception;
use OC\Mail\Mailer;
use OCA\DAV\CalDAV\Schedule\IMipPlugin;
use OCP\ILogger;
use OCP\IRequest;
use PHPUnit\Framework\MockObject\MockObject;
use Sabre\VObject\Component\VCalendar;
use Sabre\VObject\ITip\Message;
use Symfony\Component\Mime\Email;
use Test\TestCase;
use OC\Log;

class IMipPluginTest extends TestCase {
	private \OC\Mail\Message $mailMessage;
	/**
	 * @var Mailer|MockObject
	 */
	private $mailer;
	private IMipPlugin $plugin;
	/** @var ILogger|MockObject */
	private $logger;

	protected function setUp(): void {
		parent::setUp();

		$this->mailMessage = new \OC\Mail\Message(new Email());
		$this->mailer = $this->createMock(Mailer::class);
		$this->mailer->method('createMessage')->willReturn($this->mailMessage);

		$this->logger = $this->createMock(Log::class);
		/** @var IRequest| MockObject $request */
		$request = $this->createMock(IRequest::class);

		$this->plugin = new IMipPlugin($this->mailer, $this->logger, $request);
	}

	public function testDelivery(): void {
		$this->mailer->expects($this->once())->method('send');

		$message = $this->buildIMIPMessage('REQUEST');

		$this->plugin->schedule($message);
		$this->assertEquals('1.1', $message->getScheduleStatus());
		$this->assertEquals('Fellowship meeting', $this->mailMessage->getSubject());
		$this->assertEquals(['frodo@hobb.it' => null], $this->mailMessage->getTo());
		$this->assertEquals(['gandalf@wiz.ard' => null], $this->mailMessage->getReplyTo());
		$this->assertStringContainsString('text/calendar; charset=UTF-8; method=REQUEST', $this->mailMessage->getMessage()->getBody()->bodyToString());
	}

	public function testFailedDeliveryWithException(): void {
		$ex = new Exception();
		$this->mailer->method('send')->willThrowException($ex);
		$this->logger->expects(self::once())->method('logException')->with($ex, ['app' => 'dav']);

		$message = $this->buildIMIPMessage('REQUEST');

		$this->plugin->schedule($message);
		$this->assertIMipState($message, '5.0', 'REQUEST', 'Fellowship meeting');
	}

	public function testDeliveryOfCancel(): void {
		$this->mailer->expects($this->once())->method('send');

		$message = $this->buildIMIPMessage('CANCEL');

		$this->plugin->schedule($message);
		$this->assertIMipState($message, '1.1', 'CANCEL', 'Cancelled: Fellowship meeting');
	}

	private function buildIMIPMessage(string $method): Message {
		$message = new Message();
		$message->method = $method;
		$message->message = new VCalendar();
		$message->message->add('VEVENT', [
			'UID' => $message->uid,
			'SEQUENCE' => $message->sequence,
			'SUMMARY' => 'Fellowship meeting',
		]);
		$message->sender = 'mailto:gandalf@wiz.ard';
		$message->recipient = 'mailto:frodo@hobb.it';
		return $message;
	}

	private function assertIMipState(Message $message, string $scheduleStatus, string $method, string $mailSubject): void {
		$this->assertEquals($scheduleStatus, $message->getScheduleStatus());
		$this->assertEquals($mailSubject, $this->mailMessage->getSubject());
		$this->assertEquals(['frodo@hobb.it' => null], $this->mailMessage->getTo());
		$this->assertEquals(['gandalf@wiz.ard' => null], $this->mailMessage->getReplyTo());
		$this->assertStringContainsString("text/calendar; charset=UTF-8; method=$method", $this->mailMessage->getMessage()->getBody()->bodyToString());
	}
}
