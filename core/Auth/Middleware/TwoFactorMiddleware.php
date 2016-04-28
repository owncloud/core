<?php

/**
 * @author Christoph Wurst <christoph@owncloud.com>
 * @author Lukas Reschke <lukas@owncloud.com>
 *
 * @copyright Copyright (c) 2016, ownCloud, Inc.
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

namespace OC\Core\Auth\Middleware;

use OC\Core\Auth\Controller\LoginController;
use OC\Core\Auth\Controller\TwoFactorChallengeController;
use OC\Core\Auth\Exceptions\LoginRequiredException;
use OC\Core\Auth\Exceptions\TwoFactorAuthRequiredException;
use OC\Core\Auth\Exceptions\UserAlreadyLoggedInException;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\AppFramework\Middleware;
use OCP\ISession;
use OCP\IURLGenerator;
use OCP\IUserSession;

class TwoFactorMiddleware extends Middleware {

	/**
	 * @param ISession $session
	 * @param IURLGenerator $urlGenerator
	 * @param IUserSession $userSession
	 */
	public function __construct(ISession $session, IURLGenerator $urlGenerator, IUserSession $userSession) {
		$this->session = $session;
		$this->urlGenerator = $urlGenerator;
		$this->userSession = $userSession;
	}

	/**
	 * @param Controller $controller
	 * @param string $methodName
	 * @throws LoginRequiredException
	 * @throws TwoFactorAuthRequiredException|LoginRequiredException|UserAlreadyLoggedInException
	 */
	public function beforeController($controller, $methodName) {
		// If two-factor auth is in progress disallow access to any controllers
		// defined within "LoginController".
		if ($controller instanceof LoginController && $this->session->exists('two_factor_auth_uid')) {
			throw new TwoFactorAuthRequiredException();
		}

		// Allow access to the two-factor controllers only if two-factor authentication
		// is in progress.
		if ($controller instanceof TwoFactorChallengeController && !$this->session->exists('two_factor_auth_uid')) {
			throw new LoginRequiredException();
		}

		// Disallow access to the login controller if the user is already logged-in
		// except for the logout method
		if ($controller instanceof LoginController && $this->userSession->isLoggedIn() &&
			$methodName !== 'logout') {
			throw new UserAlreadyLoggedInException();
		}
	}

	/**
	 * @param Controller $controller
	 * @param string $methodName
	 * @param \Exception $exception
	 * @return RedirectResponse
	 * @throws \Exception
	 */
	public function afterException($controller, $methodName, \Exception $exception) {
		switch (get_class($exception)) {
			case 'OC\Core\Auth\Exceptions\LoginRequiredException':
				$routeName = 'core.login.showLoginForm';
				break;
			case 'OC\Core\Auth\Exceptions\TwoFactorAuthRequiredException':
				$routeName = 'core.TwoFactorChallenge.selectChallenge';
				break;
			case 'OC\Core\Auth\Exceptions\UserAlreadyLoggedInException':
				// FIXME: Link to default app
				$routeName = 'files_index';
				break;
			default:
				throw $exception;
		}

		return new RedirectResponse($this->urlGenerator->linkToRouteAbsolute($routeName));
	}

}
