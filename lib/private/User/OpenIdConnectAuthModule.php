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

namespace OC\User;

use OC\Authentication\Exceptions\InvalidTokenException;
use OC\Authentication\Exceptions\PasswordlessTokenException;
use OC\Authentication\Token\IProvider;
use OC\Authentication\Token\IToken;
use OCP\Authentication\IAuthModule;
use OCP\IRequest;
use OCP\ISession;
use OCP\IUser;
use OCP\IUserManager;
use OCP\Session\Exceptions\SessionNotAvailableException;

class TokenAuthModule implements IAuthModule {

	/** @var ISession */
	private $session;

	/** @var IProvider */
	private $tokenProvider;

	/** @var IUserManager */
	private $manager;

	/** @var string */
	private $password = '';

	public function __construct(ISession $session, IProvider $tokenProvider, IUserManager $manager) {
		$this->session = $session;
		$this->tokenProvider = $tokenProvider;
		$this->manager = $manager;
	}

	/**
	 * @inheritdoc
	 */
	public function auth(IRequest $request) {
		$dbToken = $this->getTokenForAppPassword($request, $token);
		if ($dbToken === null) {
			$dbToken = $this->getToken($request, $token);
		}
		if ($dbToken === null) {
			return null;
		}

		// When logging in with token, the password must be decrypted first before passing to login hook
		try {
			$this->password = $this->tokenProvider->getPassword($dbToken, $token);
		} catch (PasswordlessTokenException $ex) {
			// Ignore and use empty string instead
		}

		$uid = $dbToken->getUID();
		return $this->manager->get($uid);
	}

	/**
	 * @inheritdoc
	 */
	public function getUserPassword(IRequest $request) {
		return $this->password;
	}

	/**
	 * @param IRequest $request
	 * @return null|IToken
	 */
	private function getTokenForAppPassword(IRequest $request, &$token) {
		if (!isset($request->server['PHP_AUTH_USER'], $request->server['PHP_AUTH_PW'])) {
			return null;
		}

		try {
			$token = $request->server['PHP_AUTH_PW'];
			$dbToken = $this->tokenProvider->getToken($token);
			if ($dbToken->getUID() !== $request->server['PHP_AUTH_USER']) {
				throw new \Exception('Invalid credentials');
			}

			return $dbToken;
		} catch (InvalidTokenException $ex) {
			// invalid app passwords do NOT throw an exception because basic
			// auth headers can be evaluated properly in the basic auth module
			$token = null;
			return null;
		}
	}

	/**
	 * @param IRequest $request
	 * @return null|IToken
	 * @throws \Exception
	 */
	private function getToken(IRequest $request, &$token) {
		$authHeader = $request->getHeader('Authorization');
		if ($authHeader === null || \strpos($authHeader, 'token ') === false) {
			// No auth header, let's try session id
			try {
				$token = $this->session->getId();
			} catch (SessionNotAvailableException $ex) {
				return null;
			}
		} else {
			$token = \substr($authHeader, 6);
		}

		try {
			return $this->tokenProvider->getToken($token);
		} catch (InvalidTokenException $ex) {
			$token = null;
			return null;
		}
	}
}
