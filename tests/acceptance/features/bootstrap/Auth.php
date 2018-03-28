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

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

require __DIR__ . '/../../../../lib/composer/autoload.php';

/**
 * Authentication functions
 */
trait Auth {

	private $clientToken;

	/**
	 * @BeforeScenario
	 *
	 * @return void
	 */
	public function setUpScenario() {
		$this->client = new Client();
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
	 * @param string $url
	 * @param string $method
	 * @param string|null $authHeader
	 * @param bool $useCookies
	 *
	 * @return void
	 */
	private function sendRequest(
		$url, $method, $authHeader = null, $useCookies = false
	) {
		$fullUrl = $this->baseUrlWithoutSlash() . $url;
		try {
			if ($useCookies) {
				$request = $this->client->createRequest(
					$method, $fullUrl, [
					'cookies' => $this->cookieJar,
					]
				);
			} else {
				$request = $this->client->createRequest($method, $fullUrl);
			}
			if ($authHeader) {
				$request->setHeader('Authorization', $authHeader);
			}
			$request->setHeader('OCS-APIREQUEST', 'true');
			$request->setHeader('requesttoken', $this->requestToken);
			$this->response = $this->client->send($request);
		} catch (BadResponseException $ex) {
			$this->response = $ex->getResponse();
		}
	}

	/**
	 * @When user :user generates a new client token using the API
	 * @Given a new client token for :user has been generated
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function aNewClientTokenHasBeenGenerated($user) {
		$client = new Client();
		$resp = $client->post(
			$this->baseUrlWithSlash() . 'token/generate', [
			'json' => [
					'user' => $user,
					'password' => $this->getPasswordForUser($user),
			]
			]
		);
		$this->clientToken = json_decode($resp->getBody()->getContents())->token;
	}

	/**
	 * @When user :user requests :url with :method using basic auth
	 * @Given user :user has requested :url with :method using basic auth
	 *
	 * @param string $user
	 * @param string $url
	 * @param string $method
	 *
	 * @return void
	 */
	public function userRequestsURLWithUsingBasicAuth($user, $url, $method) {
		$authString = $user . ':' . $this->getPasswordForUser($user);
		$this->sendRequest($url, $method, 'basic ' . base64_encode($authString));
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
			'basic ' . base64_encode($user . ':' . $this->clientToken)
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
		$loginUrl = $this->baseUrlWithSlash() . 'login';
		// Request a new session and extract CSRF token
		$client = new Client();
		$response = $client->get(
			$loginUrl, [
			'cookies' => $this->cookieJar,
			]
		);
		$this->extracRequestTokenFromResponse($response);

		// Login and extract new token
		$client = new Client();
		$response = $client->post(
			$loginUrl, [
				'body' => [
					'user' => $user,
					'password' => $this->getPasswordForUser($user),
					'requesttoken' => $this->requestToken,
				],
				'cookies' => $this->cookieJar,
			]
		);
		$this->extracRequestTokenFromResponse($response);
	}

}
