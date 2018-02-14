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


use OCP\Authentication\IAuthModule;
use OCP\IRequest;
use OCP\IUser;
use OCP\IUserManager;

class BasicAuthModule implements IAuthModule {

	/** @var IUserManager */
	private $manager;

	public function __construct(IUserManager $manager) {
		$this->manager = $manager;
	}

	/**
	 * @inheritdoc
	 */
	public function auth(IRequest $request) {
		if (!isset($request->server['PHP_AUTH_USER'], $request->server['PHP_AUTH_PW'])) {
			return null;
		}
		$authUser = $request->server['PHP_AUTH_USER'];
		$authPass = $request->server['PHP_AUTH_PW'];
		if ($authUser === '' || $authPass === '') {
			return null;
		}

		// check uid and password
		$user = $this->manager->checkPassword($authUser, $authPass);
		if ($user instanceof IUser) {
			return $user;
		}
		// check email and password
		$users = $this->manager->getByEmail($authUser);
		if (count($users) === 1) {
			$user = $this->manager->checkPassword($users[0]->getUID(), $authPass);
		}
		if ($user instanceof IUser) {
			return $user;
		}
		throw new \Exception('Invalid credentials');
	}

	/**
	 * @inheritdoc
	 */
	public function getUserPassword(IRequest $request) {
		if (empty($request->server['PHP_AUTH_USER']) || empty($request->server['PHP_AUTH_PW'])) {
			return '';
		}

		return $request->server['PHP_AUTH_PW'];
	}
}
