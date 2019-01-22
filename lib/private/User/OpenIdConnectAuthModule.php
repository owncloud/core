<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OC\User;

use Jumbojett\OpenIDConnectClientException;
use OCP\Authentication\IAuthModule;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IUserManager;

class OpenIdConnectAuthModule implements IAuthModule {

	/** @var IUserManager */
	private $manager;

	/** @var IConfig */
	private $config;
	/** @var ILogger */
	private $logger;

	public function __construct(IUserManager $manager, IConfig $config, ILogger $logger) {
		$this->manager = $manager;
		$this->config = $config;
		$this->logger = $logger;
	}

	/**
	 * @inheritdoc
	 */
	public function auth(IRequest $request) {
		$authHeader = $request->getHeader('Authorization');
		if (\strpos($authHeader, 'Bearer ') === false) {
			return null;
		}
		$bearerToken = \substr($authHeader, 7);
		$openIdConfig = $this->config->getSystemValue('openid-connect', null);
		if ($openIdConfig === null) {
			return null;
		}
		try {
			// openid connect route
			$openId = new \Jumbojett\OpenIDConnectClient(
				$openIdConfig['provider-url'],
				$openIdConfig['client-id'],
				$openIdConfig['client-secret']
			);
			if ($this->config->getSystemValue('debug', false)) {
				$openId->setVerifyHost(false);
				$openId->setVerifyPeer(false);
			}
			// TODO: find a way to cache jwks_uri and not over an over again download the keys
			$openId->verifyJWTsignature($bearerToken);
			$openId->setAccessToken($bearerToken);
			$payload = $openId->getAccessTokenPayload();

			// kopano special integration
			if ($payload->{'kc.identity'}->{'kc.i.un'}) {
				return $this->manager->get($payload->{'kc.identity'}->{'kc.i.un'});
			}

			// TODO: cache token->userInfo
			$userInfo = $openId->requestUserInfo();
			if ($userInfo === null) {
				return null;
			}

			// for now use 'preferred_username'
			return $this->manager->get('preferred_username');
		} catch (OpenIDConnectClientException $ex) {
			$this->logger->logException($ex, ['app' => __CLASS__]);
			return null;
		}
	}

	/**
	 * @inheritdoc
	 */
	public function getUserPassword(IRequest $request) {
		return '';
	}
}
