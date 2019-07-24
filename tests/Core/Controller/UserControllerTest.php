<?php
/**
 * @author Sujith Haridasan <sharidasan@owncloud.com>
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

use OC\AppFramework\Http;
use OC\Core\Controller\UserController;
use OC\User\Service\UserSendMailService;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IUserManager;
use OCP\User\Exceptions\EmailSendFailedException;
use OCP\User\Exceptions\InvalidUserTokenException;
use OCP\User\Exceptions\UserTokenException;
use OCP\User\Exceptions\UserTokenExpiredException;
use Test\TestCase;

/**
 * Class UserControllerTest
 *
 * @group DB
 * @package Tests\Core\Controller
 */
class UserControllerTest extends TestCase {
	/** @var IRequest | \PHPUnit_Framework_MockObject_MockObject */
	private $request;
	/** @var IUserManager | \PHPUnit_Framework_MockObject_MockObject */
	private $userManager;
	/** @var \OC_Defaults | \PHPUnit_Framework_MockObject_MockObject */
	private $defaults;
	/** @var UserSendMailService | \PHPUnit_Framework_MockObject_MockObject */
	private $userSendMailService;
	/** @var IURLGenerator | \PHPUnit_Framework_MockObject_MockObject */
	private $urlGenerator;
	/** @var ILogger | \PHPUnit_Framework_MockObject_MockObject */
	private $logger;
	/** @var IL10N | \PHPUnit_Framework_MockObject_MockObject */
	private $l10n;
	/** @var UserController */
	private $userController;

	public function setUp() {
		parent::setUp();

		$this->request = $this->createMock(IRequest::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->defaults = $this->createMock(\OC_Defaults::class);
		$this->userSendMailService = $this->createMock(UserSendMailService::class);
		$this->urlGenerator = $this->createMock(IURLGenerator::class);
		$this->logger = $this->createMock(ILogger::class);
		$this->l10n = $this->createMock(IL10N::class);
		$this->userController = new UserController('core', $this->request,
			$this->userManager, $this->defaults, $this->userSendMailService,
			$this->urlGenerator, $this->logger, $this->l10n);
	}

	public function testSetPasswordForm() {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')
			->willReturn('foo');

		$this->userManager->method('get')
			->with('foo')
			->willReturn($user);

		$this->urlGenerator->method('linkToRouteAbsolute')
			->willReturn('http://localhost/setpassword/1234/foo');

		$expectedResult = new TemplateResponse(
			'core', 'new_user/setpassword',
			['link' => 'http://localhost/setpassword/1234/foo'],
			'guest'
		);
		$result = $this->userController->setPasswordForm('abc111foo', 'foo');
		$this->assertEquals($expectedResult, $result);
	}

	public function providesExpception() {
		return [
			['UserTokenExpiredException'],
			['InvalidUserTokenException'],
			['UserTokenMismatchException']
		];
	}

	/**
	 * @dataProvider providesExpception
	 */
	public function testSetPasswordFormUserTokenExpiredException($exception) {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')
			->willReturn('foo');

		$this->userManager->method('get')
			->with('foo')
			->willReturn($user);

		if ($exception === 'UserTokenExpiredException') {
			$this->userSendMailService->method('checkPasswordSetToken')
				->willThrowException(new UserTokenExpiredException());
			$this->urlGenerator->method('linkToRouteAbsolute')
				->willReturn('http://localhost/resendToken/1234/foo');

			$expectedResult = new TemplateResponse(
				'core', 'new_user/resendtokenbymail',
				['link' => 'http://localhost/resendToken/1234/foo'],
				'guest'
			);
		} elseif (($exception === 'InvalidUserTokenException') || ($exception === 'UserTokenMismatchException')) {
			$this->userSendMailService->method('checkPasswordSetToken')
				->willThrowException(new InvalidUserTokenException('The token provided is invalid.'));
			$this->l10n->method('t')
				->willReturn('The token provided is invalid.');
			$expectedResult = new TemplateResponse(
				'core', 'error',
				["errors" => [["error" => 'The token provided is invalid.']]],
				'guest'
			);
		}

		$result = $this->userController->setPasswordForm('abc111foo', 'foo');
		$this->assertEquals($expectedResult, $result);
	}

	public function testResendToken() {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')
			->willReturn('foo');
		$user->method('getEMailAddress')
			->willReturn('foo@bar.com');

		$this->userManager->method('get')
			->with('foo')
			->willReturn($user);

		$expectedResult = new TemplateResponse(
			'core', 'new_user/tokensendnotify', [], 'guest'
		);
		$result = $this->userController->resendToken('foo');
		$this->assertEquals($expectedResult, $result);
	}

	public function providesFailureForResendToken() {
		return [
			['user'],
			['email'],
			['sendmail']
		];
	}

	/**
	 * @dataProvider providesFailureForResendToken
	 */
	public function testResendTokenFail($data) {
		$user = $this->createMock(IUser::class);
		if ($data === 'user') {
			$this->userManager->method('get')
				->with('foo')
				->willReturn(null);
		} elseif ($data === 'email') {
			$this->userManager->method('get')
				->with('foo')
				->willReturn($user);
		} elseif ($data === 'sendmail') {
			$user->method('getEMailAddress')
				->willReturn('foo@bar.com');
			$this->userManager->method('get')
				->with('foo')
				->willReturn($user);
			$this->userSendMailService->method('generateTokenAndSendMail')
				->willThrowException(new \Exception());
		}

		if (($data === 'user') || ($data === 'email')) {
			$this->l10n->method('t')
				->willReturn('Failed to create activation link. Please contact your administrator.');
			$expectedResult = new TemplateResponse(
				'core', 'error',
				[
					"errors" => [["error" => 'Failed to create activation link. Please contact your administrator.']]
				],
				'guest'
			);
		} else {
			$this->l10n->method('t')
				->willReturn('Can\'t send email to the user. Contact your administrator.');
			$expectedResult = new TemplateResponse(
				'core', 'error',
				[
					"errors" => [["error" => 'Can\'t send email to the user. Contact your administrator.']]
				], 'guest'
			);
		}

		$result = $this->userController->resendToken('foo');
		$this->assertEquals($expectedResult, $result);
	}

	public function testSetPassword() {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')
			->willReturn('foo');
		$user->method('setPassword')
			->willReturn(true);

		$this->userManager->method('get')
			->with('foo')
			->willReturn($user);

		$expectedResult = new JSONResponse(['status' => 'success']);
		$result = $this->userController->setPassword('abc123foo', 'foo', 'foopass');
		$this->assertEquals($expectedResult, $result);
	}

	public function testSetPasswordFailureOnNullUser() {
		$this->l10n->method('t')
			->willReturn('Failed to set password. Please contact the administrator.');
		$expectedResult = new JSONResponse(
			[
				'status' => 'error',
				'message' => 'Failed to set password. Please contact the administrator.',
				'type' => 'usererror'
			], Http::STATUS_NOT_FOUND
		);
		$result = $this->userController->setPassword('abc123foo', 'foo', 'foopass');
		$this->assertEquals($expectedResult, $result);
	}

	public function providesSetPasswordException() {
		return [
			['tokenException'],
			['sendMail']
		];
	}

	/**
	 * @dataProvider providesSetPasswordException
	 */
	public function testSetPasswordForException($causeOfException) {
		$user = $this->createMock(IUser::class);
		$user->method('getUID')
			->willReturn('foo');
		$user->method('setPassword')
			->willReturn(true);

		$this->userManager->method('get')
			->willReturn($user);

		if ($causeOfException === 'tokenException') {
			$this->userSendMailService->method('checkPasswordSetToken')
				->willThrowException(new UserTokenException('', 0));
			$expectedResult = new JSONResponse(
				[
					'status' => 'error',
					'message' => '',
					'type' => 'tokenfailure'
				], Http::STATUS_UNAUTHORIZED
			);
		} elseif ($causeOfException === 'sendMail') {
			$this->userSendMailService->method('sendNotificationMail')
				->willThrowException(new EmailSendFailedException());
			$this->l10n->method('t')
				->willReturn('Failed to send email. Please contact your administrator.');
			$expectedResult = new JSONResponse(
				[
					'status' => 'error',
					'message' => 'Failed to send email. Please contact your administrator.',
					'type' => 'emailsendfailed'
				], Http::STATUS_INTERNAL_SERVER_ERROR
			);
		}

		$result = $this->userController->setPassword('abc123Foo', 'foo', 'fooPass');
		$this->assertEquals($expectedResult, $result);
	}
}
