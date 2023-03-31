<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
 * @license GPL-2.0
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
namespace OCA\OpenIdConnect;

use OC_App;
use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\IUserSession;

class LoginPageBehaviour {
	/** @var Logger */
	private $logger;
	/** @var IUserSession */
	private $userSession;
	/** @var IURLGenerator */
	private $urlGenerator;
	/** @var IRequest */
	private $request;

	public function __construct(
		Logger $logger,
		IUserSession $userSession,
		IURLGenerator $urlGenerator,
		IRequest $request
	) {
		$this->logger = $logger;
		$this->userSession = $userSession;
		$this->urlGenerator = $urlGenerator;
		$this->request = $request;
	}

	public function handleLoginPageBehaviour(array $openIdConfig): void {
		// logged in? nothing to do
		if ($this->userSession->isLoggedIn()) {
			return;
		}
		# only GET requests are of interest
		if ($this->request->getMethod() !== 'GET') {
			return;
		}
		# only requests on the login page are of interest
		$components = \parse_url($this->request->getRequestUri());
		/** @phan-suppress-next-line PhanTypePossiblyInvalidDimOffset */
		$uri = $components['path'];
		if (\substr($uri, -6) !== '/login') {
			return;
		}

		// register alternative login
		$loginName = $openIdConfig['loginButtonName'] ?? 'OpenID Connect';
		$this->registerAlternativeLogin($loginName);

		// if configured perform redirect right away if not logged in ....
		$autoRedirectOnLoginPage = $openIdConfig['autoRedirectOnLoginPage'] ?? false;
		if (!$autoRedirectOnLoginPage) {
			return;
		}

		$req = $this->request->getRequestUri();
		$this->logger->debug("Redirecting to IdP - request url: $req");
		$loginUrl = $this->urlGenerator->linkToRoute('openidconnect.loginFlow.login', $this->request->getParams());
		$this->redirect($loginUrl);
	}

	/**
	 * @param string $loginUrl
	 * @codeCoverageIgnore
	 */
	public function redirect(string $loginUrl): void {
		\header('Location: ' . $loginUrl);
		exit;
	}

	/**
	 * @param string $loginName
	 * @codeCoverageIgnore
	 */
	public function registerAlternativeLogin(string $loginName): void {
		OC_App::registerLogIn([
			'name' => $loginName,
			'href' => $this->urlGenerator->linkToRoute('openidconnect.loginFlow.login', $this->request->getParams()),
		]);
	}
}
