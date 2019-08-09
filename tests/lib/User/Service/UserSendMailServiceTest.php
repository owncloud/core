<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace Test\User\Service;

use OC\Mail\Message;
use OC\User\Service\UserSendMailService;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IConfig;
use OCP\IL10N;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\Mail\IMailer;
use OCP\Security\ISecureRandom;
use Test\TestCase;

class UserSendMailServiceTest extends TestCase {
	/** @var ISecureRandom */
	private $secureRandom;

	/** @var IConfig | \PHPUnit_Framework_MockObject_MockObject */
	private $config;

	/** @var IMailer | \PHPUnit_Framework_MockObject_MockObject */
	private $mailer;

	/** @var IURLGenerator | \PHPUnit_Framework_MockObject_MockObject */
	private $urlGenerator;

	/** @var \OC_Defaults | \PHPUnit_Framework_MockObject_MockObject */
	private $defaults;

	/** @var ITimeFactory | \PHPUnit_Framework_MockObject_MockObject */
	private $timeFactory;

	/** @var IL10N | \PHPUnit_Framework_MockObject_MockObject */
	private $l10n;

	/** @var UserSendMailService */
	private $userSendMailService;

	protected function setUp() {
		parent::setUp();

		$this->secureRandom = $this->createMock(ISecureRandom::class);
		$this->config = $this->createMock(IConfig::class);
		$this->mailer = $this->createMock(IMailer::class);
		$this->urlGenerator = $this->createMock(IURLGenerator::class);
		$this->defaults = $this->createMock(\OC_Defaults::class);
		$this->timeFactory = $this->createMock(ITimeFactory::class);
		$this->l10n = $this->createMock(IL10N::class);
		$this->userSendMailService = new UserSendMailService($this->secureRandom,
			$this->config, $this->mailer, $this->urlGenerator, $this->defaults,
			$this->timeFactory, $this->l10n);
	}

	public function testGenerateTokenAndSendMail() {
		$this->secureRandom->method('generate')
			->willReturn('123456');
		$this->urlGenerator->method('linkToRouteAbsolute')
			->willReturn('http://localhost/setPasswordForm/1234/foo');

		$message = $this->createMock(Message::class);
		$message->expects($this->once())
			->method('setTo');
		$message->expects($this->once())
			->method('setSubject');
		$message->expects($this->once())
			->method('setHtmlBody');
		$message->expects($this->once())
			->method('setPlainBody');
		$message->expects($this->once())
			->method('setFrom');

		$this->mailer->method('createMessage')
			->willReturn($message);
		$this->mailer->expects($this->once())
			->method('send');

		$this->userSendMailService->generateTokenAndSendMail('foo', 'foo@barr.com');
	}

	/**
	 * @expectedException OCP\User\Exceptions\InvalidUserTokenException
	 * @expectedExceptionMessage The token provided is invalid.
	 */
	public function testcheckPasswordSetInvalidToken() {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')
			->willReturn('foo');

		$this->config->method('getUserValue')
			->willReturn('fooBaz1');
		$this->userSendMailService->checkPasswordSetToken('fooBaz1', $user);
	}

	/**
	 * @expectedException  \OCP\User\Exceptions\UserTokenExpiredException
	 * @expectedExceptionMessage The token provided had expired.
	 */
	public function testCheckPasswordSetTokenExpired() {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')
			->willReturn('foo');

		$this->config->method('getUserValue')
			->willReturn('1234:foobaz');

		$this->timeFactory->method('getTime')
			->willReturn('1234567');
		$this->config->method('getAppValue')
			->willReturn('123');

		$this->userSendMailService->checkPasswordSetToken('1234:foobaz', $user);
	}

	/**
	 * @expectedException  \OCP\User\Exceptions\UserTokenMismatchException
	 * @expectedExceptionMessage The token provided is invalid.
	 */
	public function testCheckPasswordSetTokenMismatch() {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')
			->willReturn('foo');

		$this->config->method('getUserValue')
			->willReturn('12345678:foobaz');

		$this->timeFactory->method('getTime')
			->willReturn('12345');
		$this->config->method('getAppValue')
			->willReturn('1234');

		$this->userSendMailService->checkPasswordSetToken('1234:foobaz', $user);
	}

	public function testSendNotificationMailSuccess() {
		$user = $this->createMock(IUser::class);
		$user->method('getEMailAddress')
			->willReturn('foo@barr.com');

		$message = $this->createMock(Message::class);
		$message->expects($this->once())
			->method('setTo');
		$message->expects($this->once())
			->method('setSubject');
		$message->expects($this->once())
			->method('setHtmlBody');
		$message->expects($this->once())
			->method('setPlainBody');
		$message->expects($this->once())
			->method('setFrom');

		$this->mailer->method('createMessage')
			->willReturn($message);
		$this->mailer->expects($this->once())
			->method('send')
			->with($message);

		$this->assertTrue($this->userSendMailService->sendNotificationMail($user));
	}

	public function testSendNotificationMailFail() {
		$user = $this->createMock(IUser::class);
		$user->method('getEMailAddress')
			->willReturn('');

		$this->assertFalse($this->userSendMailService->sendNotificationMail($user));
	}

	/**
	 * @expectedException  \OCP\User\Exceptions\EmailSendFailedException
	 * @expectedExceptionMessage Email could not be sent.
	 */
	public function testSendNotificationMailSendFail() {
		$user = $this->createMock(IUser::class);
		$user->method('getEMailAddress')
			->willReturn('foo@barr.com');

		$message = $this->createMock(Message::class);
		$message->expects($this->once())
			->method('setTo');
		$message->expects($this->once())
			->method('setSubject');
		$message->expects($this->once())
			->method('setHtmlBody');
		$message->expects($this->once())
			->method('setPlainBody');
		$message->expects($this->once())
			->method('setFrom');

		$this->mailer->method('createMessage')
			->willReturn($message);
		$this->mailer->expects($this->once())
			->method('send')
			->will($this->throwException(new \Exception("Failed")));

		$this->assertTrue($this->userSendMailService->sendNotificationMail($user));
	}

	public function providesValidateEmailAddress() {
		return [
			['foo@bar.com', true],
			['foo@bar', false],
		];
	}

	/**
	 * This is a test for a convenience method
	 *
	 * @param string $emailAddress
	 * @param bool $expectedResult
	 *
	 * @dataProvider providesValidateEmailAddress
	 */
	public function testValidateEmailAddress($emailAddress, $expectedResult) {
		$this->mailer->method('validateMailAddress')
			->with($emailAddress)
			->willReturn($expectedResult);

		$this->assertEquals($expectedResult, $this->userSendMailService->validateEmailAddress($emailAddress));
	}
}
