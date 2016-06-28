<?php

/**
 * @author Christoph Wurst <christoph@owncloud.com>
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

namespace OC\Core\Controller;

use OC\Authentication\ClientLogin\AccessToken;
use OC\Authentication\ClientLogin\IClientLoginCoordinator;
use OC\Authentication\Exceptions\ClientLoginPendingException;
use OC\Authentication\Exceptions\InvalidAccessTokenException;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\IL10N;
use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\IUserSession;

class AuthController extends Controller {

	/** @var IClientLoginCoordinator */
	private $coordinator;

	/** @var IURLGenerator */
	private $urlGenerator;

	/** @var IUserSession */
	private $userSession;

	/** @var IL10N */
	private $l10n;

	public function __construct($appName, IRequest $request, IClientLoginCoordinator $coordinator, IURLGenerator $urlGenerator, IUserSession $userSession, IL10N $l10n) {
		parent::__construct($appName, $request);
		$this->coordinator = $coordinator;
		$this->urlGenerator = $urlGenerator;
		$this->userSession = $userSession;
		$this->l10n = $l10n;
	}

	/**
	 * @PublicPage
	 * @NoCSRFRequired
	 *
	 * @param string $name client name
	 * @return JSONResponse
	 */
	public function start($name = null) {
		if (is_null($name) || strlen($name) === 0) {
			$name = $this->l10n->t('unknown client');
		}

		$token = $this->coordinator->startClientLogin($name);

		$clientUrl = $this->urlGenerator->linkToRoute('core.auth.check', [
			'accesstoken' => $token
		]);
		$fullClientUrl = $this->urlGenerator->getAbsoluteURL($clientUrl);
		$pollUrl = $this->urlGenerator->linkToRoute('core.auth.status', [
			'accesstoken' => $token
		]);
		$fullPollUrl = $this->urlGenerator->getAbsoluteURL($pollUrl);
		return [
			'clientUrl' => $fullClientUrl,
			'pollUrl' => $fullPollUrl,
		];
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 * @param string $accesstoken
	 * @return TemplateResponse
	 */
	public function check($accesstoken) {
		try {
			$user = $this->userSession->getUser();
			$this->coordinator->finishClientLogin($accesstoken, $user);
		} catch (InvalidAccessTokenException $ex) {
			return new RedirectResponse($this->urlGenerator->linkToRoute('files.view.index'));
		}
		return new TemplateResponse('core', 'authsuccess', [], 'guest');
	}

	/**
	 * @PublicPage
	 * @NoCSRFRequired
	 *
	 * @param string $accesstoken
	 * @return JSONResponse
	 */
	public function status($accesstoken) {
		try {
			$token = $this->coordinator->getClientToken($accesstoken);
		} catch (ClientLoginPendingException $ex) {
			return [
				'status' => AccessToken::STATUS_PENDING,
				'token' => null,
			];
		} catch (InvalidAccessTokenException $ex) {
			$resp = new JSONResponse();
			$resp->setStatus(Http::STATUS_BAD_REQUEST);
			return $resp;
		}

		return [
			'status' => AccessToken::STATUS_FINISHED,
			'token' => $token,
		];
	}

}
