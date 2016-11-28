<?php

namespace OCA\DAV\Connector\Sabre;

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
		// TODO: Check tokens in database

		if ($token === "2YotnFZFEjr1zCsicMWpAA") {
			\OC_Util::setupFS("admin");
			return "admin";
		} else {
			return null;
		}
	}

}
