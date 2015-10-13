<?php
/**
 * @author Lukas Reschke <lukas@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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
namespace OC\Core\Auth\Controller;

use OC\AppFramework\Http;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\IRequest;
use OCP\ISession;
use OCP\IURLGenerator;
use OCP\IUser;
use OCP\IUserSession;
use OCP\IUserManager;

class LoginController extends Controller {

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param IUserManager $userManager
	 * @param IUserSession $userSession
	 * @param ISession $session
	 * @param IURLGenerator $urlGenerator
	 */
	public function __construct($appName,
								IRequest $request,
								IUserManager $userManager,
								IUserSession $userSession,
								ISession $session,
								IURLGenerator $urlGenerator) {
		parent::__construct($appName, $request);
		$this->appName = $appName;
		$this->request = $request;
		$this->userSession = $userSession;
		$this->urlGenerator = $urlGenerator;
		$this->userManager = $userManager;
		$this->session = $session;
	}

	/**
	 * @NoCSRFRequired
	 * @PublicPage
	 *
	 * @param string $user
	 * @param string $redirect_url
	 *
	 * @return TemplateResponse
	 */
	public function showLoginPage($user = '',
								  $redirect_url = '') {
		$params = [];

		// TODO: Don't use _ in variable names
		if ($user !== '') {
			$params['username'] = $user;
			$params['user_autofocus'] = false;
		} else {
			$params['username'] = '';
			$params['user_autofocus'] = true;
		}
		if ($redirect_url !== '') {
			$parameters['redirect_url'] = $redirect_url;
		}

		return new TemplateResponse('core/auth', 'login', $params, 'guest');
	}

	/**
	 * @NoCSRFRequired
	 * @PublicPage
	 * @UseSession
	 *
	 * @param $user
	 * @param $password
	 * @return RedirectResponse
	 */
	public function tryLogin($user,
							 $password) {
		// TODO: Add all the insane error handling
		$user = $this->userManager->checkPassword($user, $password);
		if($user instanceof IUser) {
			if($user->isTwoFactorEnforced()) {
				// TODO: Do two-factor auth by writing user ID in
				// TODO: Check in middleware if two factor is set and allow only then
				// 		 access to the TwoFactorChallengeController. Also do not allow
				//		 the login view then
				$this->session->set('two_factor_auth_uid', $user->getUID());

				$redirectResponse = new RedirectResponse($this->urlGenerator->linkToRouteAbsolute('core.TwoFactorChallenge.selectChallenge'));
				$redirectResponse->setStatus(Http::STATUS_FOUND);
				return $redirectResponse;
			} else {
				$this->userSession->setUser($user);
				return new RedirectResponse($this->urlGenerator->linkTo('files', 'index.php'));
			}
		}

		// TODO: Show invalid login warning
	}

	/**
	 * @UseSession
	 */
	public function logout() {
		// TODO: Verify if cookie is reset
		$this->userSession->logout();
		return new RedirectResponse($this->urlGenerator->linkToRouteAbsolute('core.login.showLoginPage'));
	}
}