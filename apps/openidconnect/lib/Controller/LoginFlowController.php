<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Miroslav Bauer <Miroslav.Bauer@cesnet.cz>
 *
 * @copyright Copyright (c) 2022, ownCloud GmbH
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
namespace OCA\OpenIdConnect\Controller;

use Jumbojett\OpenIDConnectClientException;
use OC\HintException;
use OC\User\LoginException;
use OC\User\Session;
use OCA\OpenIdConnect\Client;
use OCA\OpenIdConnect\Logger;
use OCA\OpenIdConnect\OpenIdConnectAuthModule;
use OCA\OpenIdConnect\Service\AutoProvisioningService;
use OCA\OpenIdConnect\Service\UserLookupService;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\AppFramework\Http\Response;
use OCP\ICacheFactory;
use OCP\ILogger;
use OCP\IRequest;
use OCP\ISession;
use OCP\IUserSession;
use OCP\Util;

class LoginFlowController extends Controller {

	/**
	 * @var ISession
	 */
	private $session;
	/**
	 * @var UserLookupService
	 */
	private $userLookup;
	/**
	 * @var Session
	 */
	private $userSession;
	/**
	 * @var Client
	 */
	private $client;
	/**
	 * @var ILogger
	 */
	private $logger;
	/**
	 * @var ICacheFactory
	 */
	private $memCacheFactory;
	/**
	 * @var AutoProvisioningService
	 */
	private $autoProvisioningService;

	public function __construct(
		string $appName,
		IRequest $request,
		UserLookupService $userLookup,
		IUserSession $userSession,
		ISession $session,
		ILogger $logger,
		Client $client,
		ICacheFactory $memCacheFactory,
		AutoProvisioningService $autoProvisioningService
	) {
		parent::__construct($appName, $request);
		if (!$userSession instanceof Session) {
			throw new \Exception('We rely on internal implementation!');
		}

		$this->session = $session;
		$this->userLookup = $userLookup;
		$this->userSession = $userSession;
		$this->client = $client;
		$this->logger = new Logger($logger);
		$this->memCacheFactory = $memCacheFactory;
		$this->autoProvisioningService = $autoProvisioningService;
	}

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 * @PublicPage
	 * @CORS
	 */
	public function config(): JSONResponse {
		$openid = $this->getOpenIdConnectClient();
		if (!$openid) {
			return new JSONResponse([]);
		}
		$wellKnownData = $openid->getWellKnownConfig();
		return new JSONResponse($wellKnownData);
	}

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 * @PublicPage
	 * @UseSession
	 *
	 * @throws HintException
	 * @throws LoginException
	 */
	public function login(): RedirectResponse {
		$this->logger->debug('Entering LoginFlowController::login');
		$openid = $this->getOpenIdConnectClient();
		if (!$openid) {
			throw new HintException('Configuration issue in openidconnect app');
		}
		try {
			$this->logger->debug('Before openid->authenticate');
			$openid->storeRedirectUrl($this->request->getParam('redirect_url'));
			$openid->authenticate();
		} catch (OpenIDConnectClientException $ex) {
			$this->logger->logException($ex);
			throw new HintException('Error in OpenIdConnect:' . $ex->getMessage());
		}
		$debugInfo = \json_encode([
			'access_token' => $openid->getAccessToken(),
			'refresh_token' => $openid->getRefreshToken(),
			'id_token' => $openid->getIdToken(),
			'access_token_payload' => $openid->getAccessTokenPayload(),
		], JSON_PRETTY_PRINT);
		$this->logger->debug('LoginFlowController::login : Token info: ' . $debugInfo);

		$userInfo = $openid->getUserInfo();
		$this->logger->debug('User info: ' . \json_encode($userInfo));
		if (!$userInfo) {
			throw new LoginException('No user information available.');
		}
		$user = $this->userLookup->lookupUser($userInfo);

		if ($this->autoProvisioningService->autoUpdateEnabled()) {
			$this->autoProvisioningService->updateAccountInfo($user, $userInfo);
		}

		// trigger login process
		if ($this->userSession->createSessionToken($this->request, $user->getUID(), $user->getUID()) &&
			// @phpstan-ignore-next-line because loginUser does not have the third argument in older versions
			$this->userSession->loginUser($user, null, OpenIdConnectAuthModule::class)) {
			$this->session->set('oca.openid-connect.id-token', $openid->getIdToken());
			$this->session->set('oca.openid-connect.access-token', $openid->getAccessToken());
			$this->session->set('oca.openid-connect.refresh-token', $openid->getRefreshToken());

			/* @phan-suppress-next-line PhanTypeExpectedObjectPropAccess */
			if (isset($openid->getIdTokenPayload()->sid)) {
				/* @phan-suppress-next-line PhanTypeExpectedObjectPropAccess */
				$sid = $openid->getIdTokenPayload()->sid;
				$this->session->set('oca.openid-connect.session-id', $sid);
				$this->memCacheFactory
					->create('oca.openid-connect.sessions')
					->set($sid, true);
			} else {
				$this->logger->debug('Id token holds no sid: ' . \json_encode($openid->getIdTokenPayload()));
			}
			$response = new RedirectResponse($this->getDefaultUrl());
			$openIdConfig = $openid->getOpenIdConfig();
			$cookieName = $openIdConfig['ocis-routing-policy-cookie'] ?? 'owncloud-selector';
			$cookieDirectives = $openIdConfig['ocis-routing-policy-cookie-directives'] ?? 'path=/;';
			$attribute = $openIdConfig['ocis-routing-poclicy-claim'] ?? 'ocis.routing.policy';
			if (\property_exists($userInfo, $attribute)) {
				$response->addHeader('Set-Cookie', "$cookieName={$userInfo->$attribute};$cookieDirectives");
			}
			return $response;
		}
		$this->logger->error("Unable to login {$user->getUID()}");
		return new RedirectResponse('/');
	}

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 * @PublicPage
	 * @UseSession
	 * @param string|null $iss
	 * @param string|null $sid
	 * @return Response
	 */
	public function logout($iss = null, $sid = null): Response {
		// fail fast if not configured
		$openIdConfig = $this->client->getOpenIdConfig();
		if ($openIdConfig === null) {
			$this->logger->warning('OpenID::logout: OpenID is not properly configured');
			return new Response();
		}
		// there is an active session -> logout
		if ($this->userSession->isLoggedIn()) {
			$user = $this->userSession->getUser() ? $this->userSession->getUser()->getUID() : '-unknown-user-';
			$this->logger->debug("OpenID::logout: There is an active session -> performing logout for $user");
			// complete logout
			$this->userSession->logout();
		} else {
			if ($iss === null || $sid === null) {
				$this->logger->warning("OpenID::logout: missing parameters: iss={$iss} and sid={$sid} and no active session");
			}
		}
		if ($iss === null || $sid === null) {
			return new Response();
		}
		if (isset($openIdConfig['provider-url'])) {
			if (!Util::isSameDomain($openIdConfig['provider-url'], $iss)) {
				$this->logger->warning("OpenID::logout: iss {$iss} !== provider-url {$openIdConfig['provider-url']}");
				return new Response();
			}
		}

		$this->memCacheFactory
			->create('oca.openid-connect.sessions')
			->remove($sid);

		$this->logger->warning("OpenID::logout: session terminated: iss={$iss} and sid={$sid}");

		$resp = new Response();
		$resp->setHeaders([
			'Cache-Control' =>  'no-cache, no-store',
			'Pragma' => 'no-cache'
		]);
		return $resp;
	}

	/**
	 * @return string
	 */
	protected function getDefaultUrl(): string {
		$openid = $this->getOpenIdConnectClient();
		if ($openid) {
			$redirectUrl = $openid->readRedirectUrl();
			if ($redirectUrl) {
				$_REQUEST['redirect_url'] = $redirectUrl;
			}
		}

		return \OC_Util::getDefaultPageUrl();
	}

	/**
	 * @return Client|null
	 */
	private function getOpenIdConnectClient() {
		if ($this->client->getOpenIdConfig() === null) {
			return null;
		}
		return $this->client;
	}
}
