<?php
/**
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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

namespace OC\Settings\Middleware;

use OC\AppFramework\Http;
use OC\AppFramework\Middleware\Security\Exceptions\NotAdminException;
use OC\AppFramework\Utility\ControllerMethodReflector;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Middleware;
use OCP\IGroupManager;
use OCP\IUserSession;

/**
 * Verifies whether an user has at least subadmin rights.
 * To bypass use the `@NoSubadminRequired` annotation
 *
 * @package OC\Settings\Middleware
 */
class SubadminMiddleware extends Middleware {
	/** @var IUserSession */
	private $userSession;
	/** @var IGroupManager */
	private $groupManager;
	/** @var ControllerMethodReflector */
	protected $reflector;

	/**
	 * @param ControllerMethodReflector $reflector
	 * @param IGroupManager $groupManager
	 * @param IUserSession $userSession
	 */
	public function __construct(ControllerMethodReflector $reflector,
								IGroupManager $groupManager,
								IUserSession $userSession) {
		$this->reflector = $reflector;
		$this->groupManager = $groupManager;
		$this->userSession = $userSession;
	}

	/**
	 * Check if sharing is enabled before the controllers is executed
	 * @param \OCP\AppFramework\Controller $controller
	 * @param string $methodName
	 * @throws \Exception
	 */
	public function beforeController($controller, $methodName) {
		if(!$this->reflector->hasAnnotation('NoSubadminRequired')) {
			// Check if current user (active and not in incognito mode)
			// can manage users
			$hasUserManagementPrivileges = false;
			$activeUser = $this->userSession->getUser();
			if($activeUser !== null) {
				//Admin and SubAdmins are allowed to access user management
				$hasUserManagementPrivileges = $this->groupManager->isAdmin($activeUser->getUID())
					|| $this->groupManager->getSubAdmin()->isSubAdmin($activeUser);
			}

			if(!$hasUserManagementPrivileges) {
				throw new NotAdminException('Logged in user must be a subadmin');
			}
		}
	}

	/**
	 * Return 403 page in case of an exception
	 * @param \OCP\AppFramework\Controller $controller
	 * @param string $methodName
	 * @param \Exception $exception
	 * @return TemplateResponse
	 * @throws \Exception
	 */
	public function afterException($controller, $methodName, \Exception $exception) {
		if($exception instanceof NotAdminException) {
			$response = new TemplateResponse('core', '403', [], 'guest');
			$response->setStatus(Http::STATUS_FORBIDDEN);
			return $response;
		}

		throw $exception;
	}

}
