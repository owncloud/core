<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH.
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

namespace OCA\FederatedCluster\Controller;

use OC\Authentication\TwoFactorAuth\Manager;
use OC\Core\Controller\LoginController;
use OC\User\Session;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;
use OCP\IConfig;
use OCP\IRequest;
use OCP\ISession;
use OCP\IURLGenerator;
use OCP\IUserManager;
use OCP\IUserSession;


class NodeLoginController extends Controller {

	/** @var LoginController */
	private $loginController;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param IUserManager $userManager
	 * @param IConfig $config
	 * @param ISession $session
	 * @param IUserSession $userSession
	 * @param IURLGenerator $urlGenerator
	 * @param Manager $twoFactorManager
	 */
	function __construct($appName, IRequest $request, IUserManager $userManager, IConfig $config, ISession $session,
						 IUserSession $userSession, IURLGenerator $urlGenerator, Manager $twoFactorManager) {
		parent::__construct($appName, $request);
		if ($userSession instanceof Session) {
			$this->loginController = new LoginController($appName, $request, $userManager, $config, $session, $userSession, $urlGenerator, $twoFactorManager);
		} else {
			throw new \InvalidArgumentException('IUserSession must be an instance of OC\User\Session');
		}
	}

	/**
	 * @PublicPage
	 * @NoCSRFRequired
	 * @UseSession
	 *
	 * @param string $login
	 * @param string $password
	 * @return DataResponse
	 */
	public function tryLogin($login, $password) {
		\OC::$server->getLogger()->debug("tryLogin('$login', '$password')", ['app'=>'clusterlogin']);
		$response = $this->loginController->tryLogin($login, $password, null);
		$headers = $response->getHeaders();
		return new DataResponse([
			'session_name' => session_name(),
			'session_id' => session_id(),
			'location' => $headers['Location'],
		]);
	}
}
