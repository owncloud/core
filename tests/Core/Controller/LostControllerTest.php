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

namespace Tests\Core\Controller;

use OC\Core\Controller\LostController;
use OC\User\Session;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\IConfig;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IUserManager;
use OCP\Mail\IMailer;
use OCP\Security\ISecureRandom;
use PHPUnit_Framework_MockObject_MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class LostControllerTest
 *
 * @package OC\Core\Controller
 */
class LostControllerTest extends TestCase {

	/** @var LostController */
	private $lostController;
	/** @var IUser */
	private $existingUser;
	/** @var IURLGenerator | PHPUnit_Framework_MockObject_MockObject */
	private $urlGenerator;
	/** @var IL10N */
	private $l10n;
	/** @var IUserManager | PHPUnit_Framework_MockObject_MockObject */
	private $userManager;
	/** @var \OC_Defaults */
	private $defaults;
	/** @var IConfig | PHPUnit_Framework_MockObject_MockObject */
	private $config;
	/** @var IMailer | PHPUnit_Framework_MockObject_MockObject */
	private $mailer;
	/** @var ISecureRandom | PHPUnit_Framework_MockObject_MockObject */
	private $secureRandom;
	/** @var ITimeFactory | PHPUnit_Framework_MockObject_MockObject */
	private $timeFactory;
	/** @var IRequest | PHPUnit_Framework_MockObject_MockObject */
	private $request;
	/** @var ILogger | PHPUnit_Framework_MockObject_MockObject*/
	private $logger;
	/** @var Session */
	private $userSession;

	protected function setUp() {
		$this->existingUser = $this->getMockBuilder('OCP\IUser')
				->disableOriginalConstructor()->getMock();

		$this->existingUser
			->expects($this->any())
			->method('getEMailAddress')
			->willReturn('test@example.com');

		$this->existingUser
			->expects($this->any())
			->method('getDisplayName')
			->willReturn('Existing User Name');

		$this->config = $this->getMockBuilder('\OCP\IConfig')
			->disableOriginalConstructor()->getMock();
		$this->l10n = $this->getMockBuilder('\OCP\IL10N')
			->disableOriginalConstructor()->getMock();
		$this->l10n
			->expects($this->any())
			->method('t')
			->will($this->returnCallback(function ($text, $parameters = []) {
				return \vsprintf($text, $parameters);
			}));
		$this->defaults = $this->getMockBuilder('\OC_Defaults')
			->disableOriginalConstructor()->getMock();
		$this->userManager = $this->getMockBuilder('\OCP\IUserManager')
			->disableOriginalConstructor()->getMock();
		$this->urlGenerator = $this->getMockBuilder('\OCP\IURLGenerator')
			->disableOriginalConstructor()->getMock();
		$this->mailer = $this->getMockBuilder('\OCP\Mail\IMailer')
			->disableOriginalConstructor()->getMock();
		$this->secureRandom = $this->getMockBuilder('\OCP\Security\ISecureRandom')
			->disableOriginalConstructor()->getMock();
		$this->timeFactory = $this->getMockBuilder('\OCP\AppFramework\Utility\ITimeFactory')
			->disableOriginalConstructor()->getMock();
		$this->request = $this->getMockBuilder('OCP\IRequest')
			->disableOriginalConstructor()->getMock();
		$this->logger = $this->getMockBuilder('OCP\ILogger')
			->disableOriginalConstructor()->getMock();
		$this->userSession = $this->getMockBuilder('OC\User\Session')
			->disableOriginalConstructor()->getMock();
		$this->lostController = new LostController(
			'Core',
			$this->request,
			$this->urlGenerator,
			$this->userManager,
			$this->defaults,
			$this->l10n,
			$this->config,
			$this->secureRandom,
			'lostpassword-noreply@localhost',
			true,
			$this->mailer,
			$this->timeFactory,
			$this->logger,
			$this->userSession
		);
	}

	public function testResetFormInvalidToken() {
		$userId = 'admin';
		$token = 'MySecretToken';
		$response = $this->lostController->resetform($token, $userId);
		$expectedResponse = new TemplateResponse('core',
			'error',
			[
				'errors' => [
					['error' => 'Could not reset password because the token is invalid'],
				]
			],
			'guest');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testResetFormInvalidTokenMatch() {
		$this->config
			->expects($this->once())
			->method('getUserValue')
			->with('ValidTokenUser', 'owncloud', 'lostpassword', null)
			->will($this->returnValue('12345:TheOnlyAndOnlyOneTokenToResetThePassword'));
		$user = $this->getMockBuilder('\OCP\IUser')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getLastLogin')
			->will($this->returnValue(12344));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ValidTokenUser')
			->will($this->returnValue($user));
		$userId = 'ValidTokenUser';
		$token = '12345:MySecretToken';
		$response = $this->lostController->resetform($token, $userId);
		$expectedResponse = new TemplateResponse('core',
			'error',
			[
				'errors' => [
					['error' => 'Could not reset password because the token does not match'],
				]
			],
			'guest');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testResetFormExpiredToken() {
		$user = $this->getMockBuilder('\OCP\IUser')
			->disableOriginalConstructor()->getMock();
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ValidTokenUser')
			->will($this->returnValue($user));
		$this->timeFactory
			->expects($this->once())
			->method('getTime')
			->will($this->returnValue(12345*60*60*12));
		$userId = 'ValidTokenUser';
		$token = 'TheOnlyAndOnlyOneTokenToResetThePassword';
		$this->config
			->expects($this->once())
			->method('getUserValue')
			->with('ValidTokenUser', 'owncloud', 'lostpassword', null)
			->will($this->returnValue('12345:TheOnlyAndOnlyOneTokenToResetThePassword'));
		$response = $this->lostController->resetform($token, $userId);
		$expectedResponse = new TemplateResponse('core',
			'error',
			[
				'errors' => [
					['error' => 'Could not reset password because the token expired'],
				]
			],
			'guest');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testResetFormValidToken() {
		$user = $this->getMockBuilder('\OCP\IUser')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getLastLogin')
			->will($this->returnValue(12344));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ValidTokenUser')
			->will($this->returnValue($user));
		$this->timeFactory
			->expects($this->once())
			->method('getTime')
			->will($this->returnValue(12348));
		$userId = 'ValidTokenUser';
		$token = 'TheOnlyAndOnlyOneTokenToResetThePassword';
		$this->config
			->expects($this->once())
			->method('getUserValue')
			->with('ValidTokenUser', 'owncloud', 'lostpassword', null)
			->will($this->returnValue('12345:TheOnlyAndOnlyOneTokenToResetThePassword'));
		$this->urlGenerator
			->expects($this->once())
			->method('linkToRouteAbsolute')
			->with('core.lost.setPassword', ['userId' => 'ValidTokenUser', 'token' => 'TheOnlyAndOnlyOneTokenToResetThePassword'])
			->will($this->returnValue('https://ownCloud.com/index.php/lostpassword/'));

		$response = $this->lostController->resetform($token, $userId);
		$expectedResponse = new TemplateResponse('core',
			'lostpassword/resetpassword',
			[
				'link' => 'https://ownCloud.com/index.php/lostpassword/',
			],
			'guest');
		$this->assertEquals($expectedResponse, $response);
	}

	public function testEmailUnsuccessful() {
		$existingUser = 'ExistingUser1';
		$nonExistingUser = 'NonExistingUser';
		$this->userManager
			->expects($this->any())
			->method('userExists')
			->will($this->returnValueMap([
				[true, $existingUser],
				[false, $nonExistingUser]
			]));
		$this->userManager->expects($this->any())
			->method('getByEmail')
			->willReturn([]);

		// With a non existing user
		$response = $this->lostController->email($nonExistingUser);
		$expectedResponse = [
			'status' => 'success'
		];
		$this->logger->expects($this->any())
			->method('error')
			->with('Could not send reset email because User does not exist. User: {user}');
		$this->assertSame($expectedResponse, $response);

		// With no mail address
		$this->config
			->expects($this->any())
			->method('getUserValue')
			->with($existingUser, 'settings', 'email')
			->will($this->returnValue(''));
		$response = $this->lostController->email($existingUser);
		$this->logger->expects($this->any())
			->method('error')
			->with('Could not send reset email because there is no email address for this username. User: {user}');
		$expectedResponse = [
			'status' => 'success'
		];
		$this->assertSame($expectedResponse, $response);
	}

	public function testSpamEmail() {
		$user = 'ExistingUser';
		$this->userManager
			->expects($this->once())
			->method('userExists')
			->with($user)
			->will($this->returnValue(true));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with($user)
			->will($this->returnValue($this->existingUser));
		$this->config
			->expects($this->once())
			->method('getUserValue')
			->with('ExistingUser', 'owncloud', 'lostpassword')
			->will($this->returnValue('12000:AVerySecretToken'));
		$this->timeFactory
			->expects($this->any())
			->method('getTime')
			->willReturnOnConsecutiveCalls(12001, 12348);

		$this->logger
			->expects($this->any())
			->method('alert')
			->with('The email is not sent because a password reset email was sent recently.');
		$expectedResponse = [
			'status' => 'success'
		];
		$response = $this->lostController->email($user);
		$this->assertSame($expectedResponse, $response);
	}

	public function testEmailSuccessful() {
		$this->config
			->expects($this->once())
			->method('getUserValue')
			->with('ExistingUser', 'owncloud', 'lostpassword')
			->will($this->returnValue('12000:AVerySecretToken'));
		$this->timeFactory
			->expects($this->any())
			->method('getTime')
			->willReturnOnConsecutiveCalls(12301, 12348);
		$this->secureRandom
			->expects($this->once())
			->method('generate')
			->with('21')
			->will($this->returnValue('ThisIsMaybeANotSoSecretToken!'));
		$this->userManager
				->expects($this->once())
				->method('userExists')
				->with('ExistingUser')
				->will($this->returnValue(true));
		$this->userManager
				->expects($this->any())
				->method('get')
				->with('ExistingUser')
				->willReturn($this->existingUser);

		$this->config
			->expects($this->once())
			->method('setUserValue')
			->with('ExistingUser', 'owncloud', 'lostpassword', '12348:ThisIsMaybeANotSoSecretToken!');
		$this->urlGenerator
			->expects($this->once())
			->method('linkToRouteAbsolute')
			->with('core.lost.resetform', ['userId' => 'ExistingUser', 'token' => 'ThisIsMaybeANotSoSecretToken!'])
			->will($this->returnValue('https://ownCloud.com/index.php/lostpassword/'));
		$message = $this->getMockBuilder('\OC\Mail\Message')
			->disableOriginalConstructor()->getMock();
		$message
			->expects($this->at(0))
			->method('setTo')
			->with(['test@example.com' => 'Existing User Name']);
		$message
			->expects($this->at(1))
			->method('setSubject')
			->with(' password reset');
		$message
			->expects($this->at(2))
			->method('setPlainBody')
			->with($this->stringContains('Use the following link to reset your password: https://ownCloud.com/index.php/lostpassword/'));
		$message
			->expects($this->at(3))
			->method('setHtmlBody')
			->with($this->stringContains('Use the following link to reset your password: <a href="https://ownCloud.com/index.php/lostpassword/">https://ownCloud.com/index.php/lostpassword/</a>'));
		$message
			->expects($this->at(4))
			->method('setFrom')
			->with(['lostpassword-noreply@localhost' => null]);
		$this->mailer
			->expects($this->at(0))
			->method('createMessage')
			->will($this->returnValue($message));
		$this->mailer
			->expects($this->at(1))
			->method('send')
			->with($message);

		$response = $this->lostController->email('ExistingUser');
		$expectedResponse = ['status' => 'success'];
		$this->assertSame($expectedResponse, $response);
	}

	public function testEmailCantSendException() {
		$this->secureRandom
			->expects($this->once())
			->method('generate')
			->with('21')
			->will($this->returnValue('ThisIsMaybeANotSoSecretToken!'));
		$this->userManager
			->expects($this->once())
			->method('userExists')
			->with('ExistingUser')
			->will($this->returnValue(true));
		$this->userManager
				->expects($this->any())
				->method('get')
				->with('ExistingUser')
				->willReturn($this->existingUser);
		$this->config
			->expects($this->once())
			->method('setUserValue')
			->with('ExistingUser', 'owncloud', 'lostpassword', '12348:ThisIsMaybeANotSoSecretToken!');
		$this->timeFactory
			->expects($this->once())
			->method('getTime')
			->will($this->returnValue(12348));
		$this->urlGenerator
			->expects($this->once())
			->method('linkToRouteAbsolute')
			->with('core.lost.resetform', ['userId' => 'ExistingUser', 'token' => 'ThisIsMaybeANotSoSecretToken!'])
			->will($this->returnValue('https://ownCloud.com/index.php/lostpassword/'));
		$message = $this->getMockBuilder('\OC\Mail\Message')
			->disableOriginalConstructor()->getMock();
		$message
			->expects($this->at(0))
			->method('setTo')
			->with(['test@example.com' => 'Existing User Name']);
		$message
			->expects($this->at(1))
			->method('setSubject')
			->with(' password reset');
		$message
			->expects($this->at(2))
			->method('setPlainBody')
			->with($this->stringContains('Use the following link to reset your password: https://ownCloud.com/index.php/lostpassword/'));
		$message
			->expects($this->at(3))
			->method('setHtmlBody')
			->with($this->stringContains('Use the following link to reset your password: <a href="https://ownCloud.com/index.php/lostpassword/">https://ownCloud.com/index.php/lostpassword/</a>'));
		$message
			->expects($this->at(4))
			->method('setFrom')
			->with(['lostpassword-noreply@localhost' => null]);
		$this->mailer
			->expects($this->at(0))
			->method('createMessage')
			->will($this->returnValue($message));
		$this->mailer
			->expects($this->at(1))
			->method('send')
			->with($message)
			->will($this->throwException(new \Exception()));

		$response = $this->lostController->email('ExistingUser');
		$expectedResponse = ['status' => 'error', 'msg' => 'Couldn\'t send reset email. Please contact your administrator.'];
		$this->assertSame($expectedResponse, $response);
	}

	public function testSetPasswordUnsuccessful() {
		$this->config
			->expects($this->once())
			->method('getUserValue')
			->with('InvalidTokenUser', 'owncloud', 'lostpassword', null)
			->will($this->returnValue('TheOnlyAndOnlyOneTokenToResetThePassword'));

		// With an invalid token
		$userName = 'InvalidTokenUser';
		$response = $this->lostController->setPassword('wrongToken', $userName, 'NewPassword', true);
		$expectedResponse = [
			'status' => 'error',
			'msg' => 'Could not reset password because the token is invalid'
		];
		$this->assertSame($expectedResponse, $response);

		// With a valid token and no proceed
		$response = $this->lostController->setPassword('TheOnlyAndOnlyOneTokenToResetThePassword!', $userName, 'NewPassword', false);
		$expectedResponse = ['status' => 'error', 'msg' => '', 'encryption' => true];
		$this->assertSame($expectedResponse, $response);
	}

	public function testSetPasswordSuccessful() {
		$this->config
			->expects($this->once())
			->method('getUserValue')
			->with('ValidTokenUser', 'owncloud', 'lostpassword', null)
			->will($this->returnValue('12345:TheOnlyAndOnlyOneTokenToResetThePassword'));
		$user = $this->getMockBuilder('\OCP\IUser')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getLastLogin')
			->will($this->returnValue(12344));
		$user->expects($this->once())
			->method('setPassword')
			->with('NewPassword')
			->will($this->returnValue(true));
		$this->userManager
			->expects($this->exactly(3))
			->method('get')
			->with('ValidTokenUser')
			->will($this->returnValue($user));
		$this->timeFactory
			->expects($this->once())
			->method('getTime')
			->will($this->returnValue(12348));
		$user
			->expects($this->once())
			->method('getEMailAddress')
			->will($this->returnValue('test@example.com'));
		$user
			->method('getDisplayName')
			->will($this->returnValue('ValidTokenUser'));

		$message = $this->getMockBuilder('\OC\Mail\Message')
			->disableOriginalConstructor()->getMock();
		$message
			->expects($this->at(0))
			->method('setTo')
			->with(['test@example.com' => 'ValidTokenUser']);
		$message
			->expects($this->at(1))
			->method('setSubject')
			->with(' password changed successfully');
		$message
			->expects($this->at(2))
			->method('setPlainBody')
			->with('Password changed successfully');
		$message
			->expects($this->at(3))
			->method('setFrom')
			->with(['lostpassword-noreply@localhost' => null]);
		$this->mailer
			->expects($this->at(0))
			->method('createMessage')
			->will($this->returnValue($message));
		$this->mailer
			->expects($this->at(1))
			->method('send')
			->with($message);

		$response = $this->lostController->setPassword('TheOnlyAndOnlyOneTokenToResetThePassword', 'ValidTokenUser', 'NewPassword', true);
		$expectedResponse = ['status' => 'success'];
		$this->assertSame($expectedResponse, $response);
	}

	public function testSetPasswordExpiredToken() {
		$this->config
			->expects($this->once())
			->method('getUserValue')
			->with('ValidTokenUser', 'owncloud', 'lostpassword', null)
			->will($this->returnValue('12345:TheOnlyAndOnlyOneTokenToResetThePassword'));
		$user = $this->getMockBuilder('\OCP\IUser')
			->disableOriginalConstructor()->getMock();
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ValidTokenUser')
			->will($this->returnValue($user));
		$this->timeFactory
			->expects($this->once())
			->method('getTime')
			->will($this->returnValue(55546));

		$response = $this->lostController->setPassword('TheOnlyAndOnlyOneTokenToResetThePassword', 'ValidTokenUser', 'NewPassword', true);
		$expectedResponse = [
			'status' => 'error',
			'msg' => 'Could not reset password because the token expired',
		];
		$this->assertSame($expectedResponse, $response);
	}

	public function testSetPasswordInvalidDataInDb() {
		$this->config
			->expects($this->once())
			->method('getUserValue')
			->with('ValidTokenUser', 'owncloud', 'lostpassword', null)
			->will($this->returnValue('TheOnlyAndOnlyOneTokenToResetThePassword'));
		$user = $this->getMockBuilder('\OCP\IUser')
			->disableOriginalConstructor()->getMock();
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ValidTokenUser')
			->will($this->returnValue($user));

		$response = $this->lostController->setPassword('TheOnlyAndOnlyOneTokenToResetThePassword', 'ValidTokenUser', 'NewPassword', true);
		$expectedResponse = [
			'status' => 'error',
			'msg' => 'Could not reset password because the token is invalid',
		];
		$this->assertSame($expectedResponse, $response);
	}

	public function testSetPasswordExpiredTokenDueToLogin() {
		$this->config
			->expects($this->once())
			->method('getUserValue')
			->with('ValidTokenUser', 'owncloud', 'lostpassword', null)
			->will($this->returnValue('12345:TheOnlyAndOnlyOneTokenToResetThePassword'));
		$user = $this->getMockBuilder('\OCP\IUser')
			->disableOriginalConstructor()->getMock();
		$user
			->expects($this->once())
			->method('getLastLogin')
			->will($this->returnValue(12346));
		$this->userManager
			->expects($this->once())
			->method('get')
			->with('ValidTokenUser')
			->will($this->returnValue($user));
		$this->timeFactory
			->expects($this->once())
			->method('getTime')
			->will($this->returnValue(12345));

		$response = $this->lostController->setPassword('TheOnlyAndOnlyOneTokenToResetThePassword', 'ValidTokenUser', 'NewPassword', true);
		$expectedResponse = [
			'status' => 'error',
			'msg' => 'Could not reset password because the token expired',
		];
		$this->assertSame($expectedResponse, $response);
	}

	public function testIsSetPasswordWithoutTokenFailing() {
		$this->config
			->expects($this->once())
			->method('getUserValue')
			->with('ValidTokenUser', 'owncloud', 'lostpassword', null)
			->will($this->returnValue(null));

		$response = $this->lostController->setPassword('', 'ValidTokenUser', 'NewPassword', true);
		$expectedResponse = [
			'status' => 'error',
			'msg' => 'Could not reset password because the token is invalid'
			];
		$this->assertSame($expectedResponse, $response);
	}
}
