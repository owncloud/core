<?php
/**
 * @author Lukas Biermann
 * @author Nina Herrmann
 * @author Wladislaw Iwanzow
 * @author Dennis Meis
 * @author Jonathan Neugebauer
 *
 * @copyright Copyright (c) 2016, Project Seminar "PSSL16" at the University of Muenster.
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
 */

namespace OCA\DAV\Connector\Sabre;

use OCA\OAuth2\Db\AccessToken;
use OCA\OAuth2\Db\AccessTokenMapper;
use OCP\AppFramework\App;
use OCP\AppFramework\Db\DoesNotExistException;

/**
 * OAuth 2.0 authentication backend class.
 */
class OAuth2 extends AbstractBearer {

	/**
	 * OAuth2 constructor.
	 *
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
		if (!is_string($token)) {
			return null;
		}

		$app = new App('oauth2');
		$container = $app->getContainer();
		/** @var AccessTokenMapper $accessTokenMapper */
		$accessTokenMapper = $container->query('OCA\OAuth2\Db\AccessTokenMapper');

		try {
			/** @var AccessToken $accessToken */
			$accessToken = $accessTokenMapper->findByToken($token);
			$username = $accessToken->getUserId();

			\OC_Util::setupFS($username);

			return $username;
		} catch (DoesNotExistException $exception) {
			return null;
		}
	}

}
