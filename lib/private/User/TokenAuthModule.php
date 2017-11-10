<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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
		$authHeader = $request->getHeader('Authorization');
		if ($authHeader === null || strpos($authHeader, 'token ') === false) {
			// No auth header, let's try session id
			try {
				$token = $this->session->getId();
			} catch (SessionNotAvailableException $ex) {
				return null;
			}
		} else {
			$token = substr($authHeader, 6);
		}

		try {
			$dbToken = $this->tokenProvider->getToken($token);
		} catch (InvalidTokenException $ex) {
			return null;
		}
		$uid = $dbToken->getUID();

		// When logging in with token, the password must be decrypted first before passing to login hook
		try {
			$this->password = $this->tokenProvider->getPassword($dbToken, $token);
		} catch (PasswordlessTokenException $ex) {
			// Ignore and use empty string instead
		}

		return $this->manager->get($uid);
	}

	/**
	 * @inheritdoc
	 */
	public function getUserPassword(IRequest $request) {
		return $this->password;
	}
}
