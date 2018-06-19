<?php
/**
 * @author Christoph Wurst <christoph@owncloud.com>
 * @author Cornelius Kölbel <cornelius.koelbel@netknights.it>
 * @author elie195 <elie195@gmail.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OC\Core\Controller;

use OC\Authentication\TwoFactorAuth\Manager;
use OCP\Authentication\TwoFactorAuth\TwoFactorException;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\Authentication\TwoFactorAuth\IProvider2;
use OCP\IRequest;
use OCP\ISession;
use OCP\IURLGenerator;
use OCP\IUserSession;

class TwoFactorChallengeController extends Controller {

	/** @var Manager */
	private $twoFactorManager;

	/** @var IUserSession */
	private $userSession;

	/** @var ISession */
	private $session;

	/** @var IURLGenerator */
	private $urlGenerator;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param Manager $twoFactorManager
	 * @param IUserSession $userSession
	 * @param ISession $session
	 * @param IURLGenerator $urlGenerator
	 */
	public function __construct($appName, IRequest $request, Manager $twoFactorManager, IUserSession $userSession,
		ISession $session, IURLGenerator $urlGenerator) {
		parent::__construct($appName, $request);
		$this->twoFactorManager = $twoFactorManager;
		$this->userSession = $userSession;
		$this->session = $session;
		$this->urlGenerator = $urlGenerator;
	}

	/**
	 * @return string
	 */
	protected function getLogoutAttribute() {
		return \OC_User::getLogoutAttribute();
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 * @param string $redirect_url
	 * @return TemplateResponse
	 */
	public function selectChallenge($redirect_url) {
		$user = $this->userSession->getUser();
		$providers = $this->twoFactorManager->getProviders($user);
		if (\count($providers) === 1) {
			// redirect to the challenge page
			$provider = \current($providers);
			return new RedirectResponse(
				$this->urlGenerator->linkToRoute(
					'core.TwoFactorChallenge.showChallenge',
					[
						'challengeProviderId' => $provider->getId(),
						'redirect_url' => $redirect_url,
					]
				)
			);
		}

		$data = [
			'providers' => $providers,
			'redirect_url' => $redirect_url,
			'logout_attribute' => $this->getLogoutAttribute(),
		];
		return new TemplateResponse($this->appName, 'twofactorselectchallenge', $data, 'guest');
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 * @UseSession
	 *
	 * @param string $challengeProviderId
	 * @param string $redirect_url
	 * @return RedirectResponse|TemplateResponse
	 */
	public function showChallenge($challengeProviderId, $redirect_url) {
		$user = $this->userSession->getUser();
		$provider = $this->twoFactorManager->getProvider($user, $challengeProviderId);
		if ($provider === null) {
			return new RedirectResponse($this->urlGenerator->linkToRoute('core.TwoFactorChallenge.selectChallenge'));
		}

		$error_message = "";
		if ($this->session->exists('two_factor_auth_error')) {
			$this->session->remove('two_factor_auth_error');
			$error = true;
			$error_message = $this->session->get("two_factor_auth_error_message");
			$this->session->remove('two_factor_auth_error_message');
		} else {
			$error = false;
		}
		$tmpl = $provider->getTemplate($user);
		$tmpl->assign('redirect_url', $redirect_url);
		$data = [
			'error' => $error,
			'error_message' => $error_message,
			'provider' => $provider,
			'logout_attribute' => $this->getLogoutAttribute(),
			'template' => $tmpl->fetchPage(),
		];
		//Generate the response and add the custom CSP (if defined)
		$response = new TemplateResponse($this->appName, 'twofactorshowchallenge', $data, 'guest');

		//Attempt to get custom ContentSecurityPolicy(CSP) from 2FA provider
		if ($provider instanceof IProvider2) {
			$response->setContentSecurityPolicy($provider->getCSP());
		}
		return $response;
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 * @UseSession
	 *
	 * @param string $challengeProviderId
	 * @param string $challenge
	 * @param string $redirect_url
	 * @return RedirectResponse
	 */
	public function solveChallenge($challengeProviderId, $challenge, $redirect_url = null) {
		$user = $this->userSession->getUser();
		$provider = $this->twoFactorManager->getProvider($user, $challengeProviderId);
		if ($provider === null) {
			return new RedirectResponse($this->urlGenerator->linkToRoute('core.TwoFactorChallenge.selectChallenge'));
		}

		try {
			if ($this->twoFactorManager->verifyChallenge($challengeProviderId, $user, $challenge)) {
				if ($redirect_url !== null) {
					return new RedirectResponse($this->urlGenerator->getAbsoluteURL(\urldecode($redirect_url)));
				}
				return new RedirectResponse($this->urlGenerator->linkToRoute('files.view.index'));
			}
		} catch (TwoFactorException $e) {
			/*
			 * The 2FA App threw an TwoFactorException. Now we display more
			 * information to the user. The exception text is stored in the
			 * session to be used in showChallenge()
			 */
			$this->session->set('two_factor_auth_error_message',
				$e->getMessage());
		}

		$this->session->set('two_factor_auth_error', true);
		return new RedirectResponse($this->urlGenerator->linkToRoute('core.TwoFactorChallenge.showChallenge', [
			'challengeProviderId' => $provider->getId(),
			'redirect_url' => $redirect_url,
		]));
	}
}
