<?php
/**
 * @author Christoph Wurst <christoph@owncloud.com>
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

use TestHelpers\HttpRequestHelper;
use Behat\Gherkin\Node\TableNode;

require __DIR__ . '/../../../../lib/composer/autoload.php';

/**
 * Authentication functions
 */
trait Auth {
	/**
	 * @var string
	 */
	private $clientToken;

	/**
	 * @var string
	 */
	private $appToken;

	/**
	 * @var boolean
	 */
	private $tokenAuthHasBeenSet = false;

	/**
	 * @var string 'true' or 'false' or ''
	 */
	private $tokenAuthHasBeenSetTo = '';

	/**
	 * @return string
	 */
	public function getTokenAuthHasBeenSetTo() {
		return $this->tokenAuthHasBeenSetTo;
	}

	/**
	 * get the client token that was last generated
	 * app acceptance tests that have their own step code may need to use this
	 *
	 * @return string client token
	 */
	public function getClientToken() {
		return $this->clientToken;
	}

	/**
	 * get the app token that was last generated
	 * app acceptance tests that have their own step code may need to use this
	 *
	 * @return string app token
	 */
	public function getAppToken() {
		return $this->appToken;
	}

	/**
	 * @BeforeScenario
	 *
	 * @return void
	 */
	public function setUpScenario() {
		$this->responseXml = '';
	}

	/**
	 * @When a user requests :url with :method and no authentication
	 * @Given a user has requested :url with :method and no authentication
	 *
	 * @param string $url
	 * @param string $method
	 *
	 * @return void
	 */
	public function userRequestsURLWith($url, $method) {
		$this->sendRequest($url, $method);
	}

	/**
	 * Verifies status code
	 *
	 * @param string $ocsCode
	 * @param string $httpCode
	 * @param string $endPoint
	 *
	 * @return void
	 */
	public function verifyStatusCode($ocsCode, $httpCode, $endPoint) {
		$this->ocsContext->theOCSStatusCodeShouldBe(
			$ocsCode,
			$message = "Got unexpected OCS code while sending request to endpoint " . $endPoint
		);
		$this->theHTTPStatusCodeShouldBe(
			$httpCode,
			$message = "Got unexpected HTTP code while sending request to endpoint " . $endPoint
		);
	}

	/**
	 * @When a user requests these endpoints with :method and no authentication then the status codes should be as listed
	 *
	 * @param string $method
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function userRequestsEndpointsWithNoAuthentication($method, TableNode $table) {
		foreach ($table->getHash() as $row) {
			$this->sendRequest($row['endpoint'], $method);
			$this->verifyStatusCode($row['ocs-code'], $row['http-code'], $row['endpoint']);
		}
	}

	/**
	 * @When the user :user requests these endpoints with :method with basic auth then the status codes should be as listed
	 *
	 * @param string $user
	 * @param string $method
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function userRequestsEndpointsWithBasicAuth($user, $method, TableNode $table) {
		$this->userRequestsEndpointsWithPassword($user, $method, null, $table);
	}

	/**
	 * @When user :user requests these endpoints with :method using password :password then the status codes should be as listed
	 *
	 * @param string $user
	 * @param string $method
	 * @param string $password
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function userRequestsEndpointsWithPassword($user, $method, $password, TableNode $table) {
		foreach ($table->getHash() as $row) {
			$this->userRequestsURLWithUsingBasicAuth($user, $row['endpoint'], $method, $password);
			$this->verifyStatusCode($row['ocs-code'], $row['http-code'], $row['endpoint']);
		}
	}

	/**
	 * @When the administrator requests these endpoint with :method then the status codes should be as listed
	 *
	 * @param string $method
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function adminRequestsEndpoint($method, TableNode $table) {
		$this->adminRequestsEndpointsWithPassword($method, null, $table);
	}

	/**
	 * @When the administrator requests these endpoints with :method using password :password then the status codes should be as listed
	 *
	 * @param string $method
	 * @param string $password
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function adminRequestsEndpointsWithPassword($method, $password, TableNode $table) {
		foreach ($table->getHash() as $row) {
			$this->administratorRequestsURLWithUsingBasicAuth($row['endpoint'], $method, $password);
			$this->verifyStatusCode($row['ocs-code'], $row['http-code'], $row['endpoint']);
		}
	}

	/**
	 * @When user :user requests these endpoints with :method using basic token auth then the status codes should be as listed
	 *
	 * @param string $user
	 * @param string $method
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function whenUserWithNewClientTokenRequestsForEndpointUsingBasicTokenAuth($user, $method, TableNode $table) {
		foreach ($table->getHash() as $row) {
			$this->userRequestsURLWithUsingBasicTokenAuth($user, $row['endpoint'], $method);
			$this->verifyStatusCode($row['ocs-code'], $row['http-code'], $row['endpoint']);
		}
	}

	/**
	 * @When the user requests these endpoints with :method using a new browser session then the status codes should be as listed
	 *
	 * @param string $method
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function userRequestsTheseEndpointsUsingNewBrowserSession($method, TableNode $table) {
		foreach ($table->getHash() as $row) {
			$this->userRequestsURLWithBrowserSession($row['endpoint'], $method);
			$this->verifyStatusCode($row['ocs-code'], $row['http-code'], $row['endpoint']);
		}
	}

	/**
	 * @When the user requests these endpoints with :method using the generated app password then the status codes should be as listed
	 *
	 * @param string $method
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function userRequestsEndpointsUsingTheGeneratedAppPassword($method, TableNode $table) {
		foreach ($table->getHash() as $row) {
			$this->userRequestsURLWithUsingAppPassword($row['endpoint'], $method);
			$this->verifyStatusCode($row['ocs-code'], $row['http-code'], $row['endpoint']);
		}
	}

	/**
	 * @param string $url
	 * @param string $method
	 * @param string|null $authHeader
	 * @param bool $useCookies
	 *
	 * @return void
	 */
	public function sendRequest(
		$url, $method, $authHeader = null, $useCookies = false
	) {
		// reset responseXml
		$this->responseXml = '';

		$fullUrl = $this->getBaseUrl() . $url;

		$cookies = null;
		if ($useCookies) {
			$cookies = $this->cookieJar;
		}

		$headers = [];
		if ($authHeader) {
			$headers['Authorization'] = $authHeader;
		}
		$headers['OCS-APIREQUEST'] = 'true';
		if (isset($this->requestToken)) {
			$headers['requesttoken'] = $this->requestToken;
		}
		$this->response = HttpRequestHelper::sendRequest(
			$fullUrl, $method, null, null, $headers, null, null, $cookies
		);
	}

	/**
	 * Use the private API to generate an app password
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function userGeneratesNewAppPasswordNamed($name) {
		$url = $this->getBaseUrl() . '/index.php/settings/personal/authtokens';
		$body = ['name' => $name];
		$headers = [
			'Content-Type' => 'application/x-www-form-urlencoded',
			'OCS-APIREQUEST' => 'true',
			'requesttoken' => $this->requestToken,
			'X-Requested-With' => 'XMLHttpRequest'
		];
		$this->response = HttpRequestHelper::post(
			$url, null, null, $headers, $body, null, $this->cookieJar
		);
		$this->appToken
			= \json_decode($this->response->getBody()->getContents())->token;
	}

	/**
	 * @Given the user has generated a new app password named :name
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function aNewAppPasswordHasBeenGenerated($name) {
		$this->userGeneratesNewAppPasswordNamed($name);
		$this->theHTTPStatusCodeShouldBe(200);
	}

	/**
	 * @When user :user generates a new client token using the token API
	 * @Given a new client token for :user has been generated
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function aNewClientTokenHasBeenGenerated($user) {
		$body = \json_encode(
			[
				'user' => $this->getActualUsername($user),
				'password' => $this->getPasswordForUser($user),
			]
		);
		$headers = ['Content-Type' => 'application/json'];
		$url = $this->getBaseUrl() . '/token/generate';
		$resp = HttpRequestHelper::post($url, null, null, $headers, $body);
		$this->clientToken
			= \json_decode($resp->getBody()->getContents())->token;
	}

	/**
	 * @When the administrator generates a new client token using the token API
	 * @Given a new client token for the administrator has been generated
	 *
	 * @return void
	 */
	public function aNewClientTokenForTheAdministratorHasBeenGenerated() {
		$admin = $this->getAdminUsername();
		$this->aNewClientTokenHasBeenGenerated($admin);
	}

	/**
	 * @When user :user requests :url with :method using basic auth
	 * @Given user :user has requested :url with :method using basic auth
	 *
	 * @param string $user
	 * @param string $url
	 * @param string $method
	 * @param string $password
	 *
	 * @return void
	 */
	public function userRequestsURLWithUsingBasicAuth($user, $url, $method, $password=null) {
		if ($password === null) {
			$authString = "$user:" . $this->getPasswordForUser($user);
		} else {
			$authString = $password;
		}
		$this->sendRequest(
			$url, $method, 'basic ' . \base64_encode($authString)
		);
	}

	/**
	 * @When the administrator requests :url with :method using basic auth
	 *
	 * @param string $url
	 * @param string $method
	 * @param string $password
	 *
	 * @return void
	 */
	public function administratorRequestsURLWithUsingBasicAuth($url, $method, $password=null) {
		$this->userRequestsURLWithUsingBasicAuth(
			$this->getAdminUsername(), $url, $method, $password
		);
	}

	/**
	 * @When user :user requests :url with :method using basic token auth
	 * @Given user :user has requested :url with :method using basic token auth
	 *
	 * @param string $user
	 * @param string $url
	 * @param string $method
	 *
	 * @return void
	 */
	public function userRequestsURLWithUsingBasicTokenAuth($user, $url, $method) {
		$this->sendRequest(
			$url,
			$method,
			'basic ' . \base64_encode("$user:" . $this->clientToken)
		);
	}

	/**
	 * @When the user requests :url with :method using the generated client token
	 * @Given the user has requested :url with :method using the generated client token
	 *
	 * @param string $url
	 * @param string $method
	 *
	 * @return void
	 */
	public function userRequestsURLWithUsingAClientToken($url, $method) {
		$this->sendRequest($url, $method, 'token ' . $this->clientToken);
	}

	/**
	 * @When the user requests :url with :method using the generated app password
	 * @Given the user has requested :url with :method using the generated app password
	 *
	 * @param string $url
	 * @param string $method
	 *
	 * @return void
	 */
	public function userRequestsURLWithUsingAppPassword($url, $method) {
		$this->sendRequest($url, $method, 'token ' . $this->appToken);
	}

	/**
	 * @When the user requests :url with :method using the browser session
	 * @Given the user has requested :url with :method using the browser session
	 *
	 * @param string $url
	 * @param string $method
	 *
	 * @return void
	 */
	public function userRequestsURLWithBrowserSession($url, $method) {
		$this->sendRequest($url, $method, null, true);
	}

	/**
	 * @Given a new browser session for :user has been started
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function aNewBrowserSessionForHasBeenStarted($user) {
		$loginUrl = $this->getBaseUrl() . '/index.php/login';
		// Request a new session and extract CSRF token
		$response = HttpRequestHelper::get(
			$loginUrl, null, null, null, null, null, $this->cookieJar
		);
		$this->extractRequestTokenFromResponse($response);

		// Login and extract new token
		$body = [
			'user' => $this->getActualUsername($user),
			'password' => $this->getPasswordForUser($user),
			'requesttoken' => $this->requestToken
		];
		$response = HttpRequestHelper::post(
			$loginUrl, null, null, null, $body, null, $this->cookieJar
		);
		$this->extractRequestTokenFromResponse($response);
	}

	/**
	 * @Given a new browser session for the administrator has been started
	 *
	 * @return void
	 */
	public function aNewBrowserSessionForTheAdministratorHasBeenStarted() {
		$admin = $this->getAdminUsername();
		$this->aNewBrowserSessionForHasBeenStarted($admin);
	}

	/**
	 * @When /^the administrator (enforces|does not enforce)\s?token auth$/
	 * @Given /^token auth has (not|)\s?been enforced$/
	 *
	 * @param string $hasOrNot
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function tokenAuthHasBeenEnforced($hasOrNot) {
		$enforce = (($hasOrNot !== "not") && ($hasOrNot !== "does not enforce"));
		if ($enforce) {
			$value = 'true';
		} else {
			$value = 'false';
		}
		$this->setSystemConfig(
			'token_auth_enforced',
			$value,
			'boolean'
		);

		// Remember that we set this value, so it can be removed after the scenario
		$this->tokenAuthHasBeenSet = true;
		$this->tokenAuthHasBeenSetTo = $value;
	}

	/**
	 *
	 * @return string
	 */
	public function generateAuthTokenForAdmin() {
		$this->aNewBrowserSessionForHasBeenStarted($this->getAdminUsername());
		$this->userGeneratesNewAppPasswordNamed('acceptance-test ' . \microtime());
		return $this->appToken;
	}

	/**
	 * delete token_auth_enforced if it was set in the scenario
	 *
	 * @AfterScenario
	 *
	 * @return void
	 */
	public function deleteTokenAuthEnforcedAfterScenario() {
		if ($this->tokenAuthHasBeenSet) {
			if ($this->tokenAuthHasBeenSetTo === 'true') {
				// Because token auth is enforced, we have to use a token
				// (app password) as the password to send to the testing app
				// so it will authenticate us.
				$appTokenForOccCommand = $this->generateAuthTokenForAdmin();
			} else {
				$appTokenForOccCommand = null;
			}
			$this->deleteSystemConfig(
				'token_auth_enforced',
				null,
				$appTokenForOccCommand,
				null,
				null
			);
			$this->tokenAuthHasBeenSet = false;
			$this->tokenAuthHasBeenSetTo = '';
		}
	}
}
