<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

namespace OCA\Provisioning_API\Middleware;

use OC\AppFramework\Middleware\Security\Exceptions\NotAdminException;
use OC\OCS\Result;
use OCA\Provisioning_API\Controller\AppsController;
use OCA\Provisioning_API\Controller\GroupsController;
use OCA\Provisioning_API\Controller\UsersController;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\Response;
use OCP\IGroupManager;
use OCP\AppFramework\Middleware;
use OCP\AppFramework\Utility\IControllerMethodReflector;
use OCP\IRequest;
use OCP\IUserSession;

class ProvisioningMiddleware extends Middleware {
	/** @var string */
	protected $appName;
	/** @var IRequest */
	protected $request;
	/** @var IUserSession */
	protected $userSession;
	/** @var IGroupManager */
	protected $groupManager;
	/** @var IControllerMethodReflector */
	protected $reflector;

	/***
	 * @param string $appName
	 * @param IRequest $request
	 * @param IUserSession $userSession
	 * @param IGroupManager $groupManager
	 * @param IControllerMethodReflector $reflector
	 */
	public function __construct($appName,
								IRequest $request,
								IUserSession $userSession,
								IGroupManager $groupManager,
								IControllerMethodReflector $reflector
	) {
		$this->appName = $appName;
		$this->request = $request;
		$this->userSession = $userSession;
		$this->groupManager = $groupManager;
		$this->reflector = $reflector;
	}

	/**
	 * Custom admin check
	 *
	 * @param Controller $controller
	 * @param string $methodName
	 * @throws NotAdminException
	 */
	public function beforeController($controller, $methodName) {
		if (
		($controller instanceof AppsController
			&& \in_array($methodName, ['getApps', 'enable', 'disable']))
		|| ($controller instanceof UsersController
			&& \in_array($methodName, ['getUserSubAdminGroups', 'removeSubAdmin', 'addSubAdmin']))
		|| ($controller instanceof GroupsController
			&& \in_array($methodName, ['getSubAdminsOfGroup']))
		) {
			$user = $this->userSession->getUser();
			if ($user !== null) {
				if ($this->groupManager->isAdmin($user->getUID()) === false) {
					throw new NotAdminException();
				}
			}
		}
	}

	/**
	 * Return 997 status code
	 *
	 * @param Controller $controller
	 * @param string $methodName
	 * @param \Exception $exception
	 * @return Response|void
	 */
	public function afterException($controller, $methodName, \Exception $exception) {
		if (\is_a($exception, NotAdminException::class)) {
			$format = $this->request->getParam('format');
			// if none is given try the first Accept header
			if ($format === null) {
				$headers = $this->request->getHeader('Accept');
				$format = $controller->getResponderByHTTPHeader($headers);
			}
			return $controller->buildResponse(new Result(null, 997), $format);
		}
	}
}
