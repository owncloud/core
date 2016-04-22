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

namespace OC\Core\Auth\Controller;

use Exception;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataDownloadResponse;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\AppFramework\Http\Response;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\Authentication\TwoFactorAuthentication\IFactory;
use OCP\IRequest;
use OCP\ISession;
use OCP\IURLGenerator;
use OCP\IUserManager;
use OCP\IUserSession;

class TwoFactorChallengeController extends Controller {
	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param ISession $session
	 * @param IUserSession $userSession
	 * @param IFactory $challengeFactory
	 * @param IURLGenerator $urlGenerator
	 * @param IUserManager $userManager
	 */
	public function __construct($appName,
								IRequest $request,
								ISession $session,
								IUserSession $userSession,
								IFactory $challengeFactory,
								IURLGenerator $urlGenerator,
								IUserManager $userManager) {
		parent::__construct($appName, $request);
		$this->session = $session;
		$this->userSession = $userSession;
		$this->challengeFactory = $challengeFactory;
		$this->urlGenerator = $urlGenerator;
		$this->userManager = $userManager;
	}

	/**
	 * @NoCSRFRequired
	 * @PublicPage
	 */
	public function selectChallenge() {
		return new TemplateResponse(
			'core/Auth',
			'two-factor-login',
			[
				'provider' => $this->challengeFactory->getProvider(),
				'user' => $this->userManager->get($this->session->get('two_factor_auth_uid')),
			],
			'guest'
		);
	}

	/**
	 * @NoCSRFRequired
	 * @PublicPage
	 *
	 * @param $challengeProviderId
	 * @return RedirectResponse
	 */
	public function showChallenge($challengeProviderId) {
		$provider = $this->challengeFactory->getProvider();
		if(isset($provider[$challengeProviderId])) {
			$selectedProvider = $provider[$challengeProviderId];

			return new TemplateResponse(
				'core/Auth',
				'two-factor-challenge',
				[
					'provider' => $selectedProvider,
					'challengeProviderId' => $challengeProviderId,
				],
				'guest'
			);
		}

		// Provider does not exist, redirect
		return new RedirectResponse($this->urlGenerator->linkToRouteAbsolute('core.TwoFactorChallenge.selectChallenge'));
	}

	/**
	 * @NoCSRFRequired
	 * @PublicPage
	 *
	 * @param $challengeProviderId
	 * @return Response
	 */
	public function getChallengeJavascript($challengeProviderId) {
		$data = '';
		$provider = $this->challengeFactory->getProvider();
		if(isset($provider[$challengeProviderId])) {
			$data = $provider[$challengeProviderId]->getAuthenticationJavascript();
		}

		$response = new DataDownloadResponse($data, 'challengeProvider.js', 'application/javascript');
		return $response;
	}

	/**
	 * @PublicPage
	 * @UseSession
	 *
	 * @param string $challengeProviderId
	 * @param string $response
	 * @return RedirectResponse
	 * @throws Exception
	 */
	public function solveChallenge($challengeProviderId,
								   $response) {
		$supposedUid = $this->session->get('two_factor_auth_uid');

		// The middleware guarantees that "two_factor_auth_uid" is not empty. If
		// the code path with an empty UID is reached this indicates a serious
		// problem. To prevent potential security bugs throw a fatal exception.
		if($supposedUid === null) {
			throw new Exception('Session did not contain "two_factor_auth_uid" entry.');
		}

		$user = $this->userManager->get($supposedUid);

		// Test providers
		$provider = $this->challengeFactory->getProvider()[$challengeProviderId];
		if($provider->isActiveForUser($user)) {
			if($provider->verifyChallenge($response)) {
				$this->userSession->setUser($user);
				$this->session->remove('two_factor_auth_uid');

				// FIXME: Use proper route
				$redirectResponse = new RedirectResponse($this->urlGenerator->linkToRouteAbsolute('core.login.showLoginForm'));
				$redirectResponse->setStatus(Http::STATUS_FOUND);
				return $redirectResponse;
			}
		}

		// FIXME: Show error page

	}

}
