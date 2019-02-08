<?php
/**
 * @author Christoph Wurst <christoph@owncloud.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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

namespace OC\Core\Middleware;

use Exception;
use OC\Authentication\Exceptions\TwoFactorAuthRequiredException;
use OC\Authentication\Exceptions\UserAlreadyLoggedInException;
use OC\Authentication\TwoFactorAuth\Manager;
use OC\Core\Controller\LoginController;
use OC\Core\Controller\TwoFactorChallengeController;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\AppFramework\Middleware;
use OCP\AppFramework\Utility\IControllerMethodReflector;
use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\IUserSession;

class TwoFactorMiddleware extends Middleware {

	/** @var Manager */
	private $twoFactorManager;

	/** @var IUserSession */
	private $session;

	/** @var IURLGenerator */
	private $urlGenerator;

	/** @var IControllerMethodReflector */
	private $reflector;

	/** @var IRequest */
	private $request;

	/**
	 * @param Manager $twoFactorManager
	 * @param IUserSession $session
	 * @param IURLGenerator $urlGenerator
	 * @param IControllerMethodReflector $reflector
	 * @param IRequest $request
	 */
	public function __construct(
		Manager $twoFactorManager,
		IUserSession $session,
		IURLGenerator $urlGenerator,
		IControllerMethodReflector $reflector,
		IRequest $request
	) {
		$this->twoFactorManager = $twoFactorManager;
		$this->session = $session;
		$this->urlGenerator = $urlGenerator;
		$this->reflector = $reflector;
		$this->request = $request;
	}

	/**
	 * @param Controller $controller
	 * @param string $methodName
	 * @throws \UnexpectedValueException
	 * @throws TwoFactorAuthRequiredException
	 * @throws UserAlreadyLoggedInException
	 */
	public function beforeController($controller, $methodName) {
		if ($this->reflector->hasAnnotation('PublicPage')) {
			// Don't block public pages
			return;
		}

		if ($controller instanceof LoginController && $methodName === 'logout') {
			// Don't block the logout page, to allow canceling the 2FA
			return;
		}

		if ($this->session->isLoggedIn()) {
			$user = $this->session->getUser();
			if ($user === null) {
				throw new \UnexpectedValueException('User isLoggedIn but session does not contain user');
			}
			if ($this->twoFactorManager->isTwoFactorAuthenticated($user)) {
				$this->checkTwoFactor($controller, $methodName);
			} elseif ($controller instanceof TwoFactorChallengeController) {
				// two-factor authentication is in progress.
				throw new UserAlreadyLoggedInException('Grant access to the two-factor controllers');
			}
		}
		// TODO: dont check/enforce 2FA if a auth token is used
	}

	/**
	 * @param $controller
	 * @param $methodName
	 * @throws TwoFactorAuthRequiredException
	 * @throws UserAlreadyLoggedInException
	 */
	private function checkTwoFactor($controller, $methodName) {
		// If two-factor auth is in progress disallow access to any controllers
		// defined within "LoginController".
		$needsSecondFactor = $this->twoFactorManager->needsSecondFactor();
		$twoFactor = $controller instanceof TwoFactorChallengeController;

		// Disallow access to any controller if 2FA needs to be checked
		if ($needsSecondFactor && !$twoFactor) {
			throw new TwoFactorAuthRequiredException('Additional factor required');
		}

		// Allow access to the two-factor controllers only if two-factor authentication
		// is in progress.
		if (!$needsSecondFactor && $twoFactor) {
			throw new UserAlreadyLoggedInException('Grant access to the two-factor controllers');
		}
	}

	/**
	 * @param Controller $controller
	 * @param string $methodName
	 * @param Exception $exception
	 * @return RedirectResponse
	 * @throws Exception
	 */
	public function afterException($controller, $methodName, Exception $exception) {
		if ($exception instanceof TwoFactorAuthRequiredException) {
			return new RedirectResponse($this->urlGenerator->linkToRoute('core.TwoFactorChallenge.selectChallenge', [
					'redirect_url' => \urlencode($this->request->server['REQUEST_URI']),
			]));
		}
		if ($exception instanceof UserAlreadyLoggedInException) {
			return new RedirectResponse($this->urlGenerator->getAbsoluteUrl(''));
		}
		throw $exception;
	}
}
