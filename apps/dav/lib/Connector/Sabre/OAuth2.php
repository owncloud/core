<?php

namespace OCA\DAV\Connector\Sabre;
use OCA\OAuth2\Db\AccessTokenMapper;
use OCP\AppFramework\App;
use OCP\AppFramework\Db\DoesNotExistException;

/**
 * ownCloud - dav_oauth2
 *
 * OAuth 2.0 authentication backend class
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Jonathan Neugebauer
 * @copyright Jonathan Neugebauer 2016
 */
class OAuth2 extends AbstractBearer {

    /**
     * OAuth2 constructor.
     * @param string $principalPrefix
     */
	public function __construct($principalPrefix = 'principals/users/') {
		$this->principalPrefix = $principalPrefix;

		$defaults = new \OC_Defaults();
		$this->realm = $defaults->getName();
	}

	/**
	 * Determines the username behind a token
	 *
	 * This method should return null or the username depending on if login
	 * succeeded.
	 *
	 * @param string $token
	 * @return null|string
	 */
	protected function determineUsername($token) {
		if (empty($token)) {
			return null;
		}

		$app = new App('oauth2');
		$container = $app->getContainer();
		$accessTokenMapper = new AccessTokenMapper($container->query('ServerContainer')->getDb());

		try {
			$accessToken = $accessTokenMapper->find($token);
			$username = $accessToken->getUserId();

			\OC_Util::setupFS($username);

			return $username;
		} catch (DoesNotExistException $exception) {
			return null;
		}
	}

}
