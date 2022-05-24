<?php
/**
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
use OC\Authentication\AccountModule\Manager;
use OC\Core\Controller\LoginController;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\AppFramework\Middleware;
use OCP\AppFramework\Utility\IControllerMethodReflector;
use OCP\Authentication\Exceptions\AccountCheckException;
use OCP\Authentication\IAccountModuleController;
use OCP\ILogger;
use OCP\IUserSession;
use OC\Core\Controller\TwoFactorChallengeController;

/**
 * Class AccountModuleMiddleware
 *
 * Apps can register IAccountModules in their info.xml. These IAccountModules
 * will be checked on every request. So the check() call should be cheap.
 *
 * @package OC\Core\Middleware
 */
class AccountModuleMiddleware extends Middleware {

	/** @var ILogger */
	private $logger;

	/** @var Manager */
	private $manager;

	/** @var IUserSession */
	private $session;

	/** @var IControllerMethodReflector */
	private $reflector;

	/**
	 * @param ILogger $logger
	 * @param Manager $manager
	 * @param IUserSession $session
	 * @param IControllerMethodReflector $reflector
	 */
	public function __construct(
		ILogger $logger,
		Manager $manager,
		IUserSession $session,
		IControllerMethodReflector $reflector
	) {
		$this->logger = $logger;
		$this->manager = $manager;
		$this->session = $session;
		$this->reflector = $reflector;
	}

	/**
	 * @param Controller $controller
	 * @param string $methodName
	 * @throws AccountCheckException
	 */
	public function beforeController($controller, $methodName) {
		if ($this->reflector->hasAnnotation('PublicPage')) {
			// Don't block public pages
			return;
		}

		if ($controller instanceof LoginController && $methodName === 'logout') {
			// Don't block the logout page
			return;
		}

		if ($controller instanceof IAccountModuleController) {
			// Don't block any IAccountModuleController controllers
			return;
		}

		if ($controller instanceof TwoFactorChallengeController) {
			// Don't block two factor challenge
			return;
		}

		if ($this->session->isLoggedIn()) {
			$user = $this->session->getUser();
			if ($user === null) {
				throw new \UnexpectedValueException('User isLoggedIn but session does not contain user');
			}
			$this->manager->check($user);
		}
	}

	/**
	 * @param Controller $controller
	 * @param string $methodName
	 * @param Exception $exception
	 * @return Http\Response
	 * @throws Exception
	 */
	public function afterException($controller, $methodName, Exception $exception) {
		if ($exception instanceof AccountCheckException) {
			$this->logger->debug('IAccountModule check failed: {message}, {code}', [
				'app'=>__METHOD__,
				'message' => $exception->getMessage(),
				'code' => $exception->getCode()
			]);
			return $exception->getRedirectResponse();
		}
		throw $exception;
	}
}
