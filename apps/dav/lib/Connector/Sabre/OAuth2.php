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

use Sabre\DAV\Auth\Backend\AbstractBearer;
use OCA\OAuth2\Db\AccessToken;
use OCA\OAuth2\Db\AccessTokenMapper;
use OCP\AppFramework\App;
use OCP\AppFramework\Db\DoesNotExistException;

/**
 * OAuth 2.0 authentication backend class.
 */
class OAuth2 extends AbstractBearer {

	/**
	 * This is the prefix that will be used to generate principal urls.
	 *
	 * @var string
	 */
	protected $principalPrefix;

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
	 * Validates a Bearer token
	 *
	 * This method should return the full principal url, or false if the
	 * token was incorrect.
	 *
	 * @param string $bearerToken
	 * @return string|false
	 */
	protected function validateBearerToken($bearerToken) {
		if (!is_string($bearerToken)) {
			return false;
		}

		$app = new App('oauth2');
		/** @var AccessTokenMapper $accessTokenMapper */
		$accessTokenMapper = $app->getContainer()->query('OCA\OAuth2\Db\AccessTokenMapper');

		try {
			/** @var AccessToken $accessToken */
			$accessToken = $accessTokenMapper->findByToken($bearerToken);

			if ($accessToken->hasExpired()) {
				return false;
			}

			$userId = $accessToken->getUserId();

			\OC_Util::setupFS($userId);

			return $this->principalPrefix . $userId;
		} catch (DoesNotExistException $exception) {
			return false;
		}
	}

}
