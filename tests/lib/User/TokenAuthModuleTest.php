<?php
/**
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

namespace Test\User;

use OC\Authentication\Exceptions\InvalidTokenException;
use OC\Authentication\Token\IProvider;
use OC\Authentication\Token\IToken;
use OC\User\TokenAuthModule;
use OCP\IRequest;
use OCP\ISession;
use OCP\IUser;
use OCP\IUserManager;
use OCP\Session\Exceptions\SessionNotAvailableException;
use Test\TestCase;

class TokenAuthModuleTest extends TestCase {

	/** @var IUserManager | \PHPUnit\Framework\MockObject\MockObject */
	private $manager;
	/** @var IRequest | \PHPUnit\Framework\MockObject\MockObject */
	private $request;
	/** @var IUser | \PHPUnit\Framework\MockObject\MockObject */
	private $user;
	/** @var ISession | \PHPUnit\Framework\MockObject\MockObject */
	private $session;
	/** @var IProvider | \PHPUnit\Framework\MockObject\MockObject */
	private $tokenProvider;

	public function setUp() {
		parent::setUp();
		$this->manager = $this->createMock(IUserManager::class);
		$this->session = $this->createMock(ISession::class);
		$this->tokenProvider = $this->createMock(IProvider::class);
		$this->request = $this->createMock(IRequest::class);
		$this->user = $this->createMock(IUser::class);

		$this->session->expects($this->any())->method('getId')->willThrowException(new SessionNotAvailableException());
		$this->user->expects($this->any())->method('getUID')->willReturn('user1');

		$this->tokenProvider->expects($this->any())->method('getToken')
			->willReturnCallback(function ($token) {
				if ($token === 'valid-token' || $token === 'valid-token-with-password') {
					$token = $this->createMock(IToken::class);
					$token->expects($this->any())->method('getUID')->willReturn('user1');
					return $token;
				}
				throw new InvalidTokenException();
			});

		$this->tokenProvider->expects($this->any())->method('getPassword')
			->willReturnCallback(function ($ignore, $token) {
				if ($token === 'valid-token-with-password') {
					return 'supersecret';
				}
				return '';
			});

		$this->manager->expects($this->any())->method('get')
			->willReturnMap([
				['user1', $this->user],
			]);
	}

	/**
	 * @dataProvider providesCredentials
	 * @param mixed $expectedResult
	 * @param string $authHeader
	 * @param string $password
	 */
	public function testModule($expectedResult, $authHeader, $password = '') {
		$module = new TokenAuthModule($this->session, $this->tokenProvider, $this->manager);
		if ($authHeader === 'basic') {
			$this->request->server = [
				'PHP_AUTH_USER' => 'user1',
				'PHP_AUTH_PW' => 'valid-token',
			];
		} else {
			$this->request->server = [
				'PHP_AUTH_USER' => '',
				'PHP_AUTH_PW' => '',
			];
			$this->request->expects($this->any())->method('getHeader')->willReturn($authHeader);
		}

		if ($expectedResult instanceof \Exception) {
			$this->expectException(\get_class($expectedResult));
			$this->expectExceptionMessage($expectedResult->getMessage());
			$module->auth($this->request);
		} else {
			$this->assertEquals($expectedResult ? $this->user : null, $module->auth($this->request));
			$this->assertEquals($password, $module->getUserPassword($this->request));
		}
	}

	public function providesCredentials() {
		return [
			'no auth header' => [false, ''],
			'not valid token' => [false, 'token whateverbutnothingvalid'],
			'valid token' => [true, 'token valid-token'],
			'valid token with password' => [true, 'token valid-token-with-password', 'supersecret'],
			'valid app password' => [true, 'basic'],
		];
	}
}
