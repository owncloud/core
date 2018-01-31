<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

require __DIR__ . '/../../../../lib/composer/autoload.php';

trait Auth {

	private $clientToken;

	/** @BeforeScenario */
	public function setUpScenario() {
		$this->client = new Client();
		$this->responseXml = '';
	}

	/**
	 * @When requesting :url with :method
	 * @param string $url
	 * @param string $method
	 */
	public function requestingWith($url, $method) {
		$this->sendRequest($url, $method);
	}

	/**
	 * @param string $url
	 * @param string $method
	 * @param string|null $authHeader
	 * @param bool $useCookies
	 */
	private function sendRequest($url, $method, $authHeader = null, $useCookies = false) {
		$fullUrl = substr($this->baseUrl, 0, -5) . $url;
		try {
			if ($useCookies) {
				$request = $this->client->createRequest($method, $fullUrl, [
				    'cookies' => $this->cookieJar,
				]);
			} else {
				$request = $this->client->createRequest($method, $fullUrl);
			}
			if ($authHeader) {
				$request->setHeader('Authorization', $authHeader);
			}
			$request->setHeader('OCS_APIREQUEST', 'true');
			$request->setHeader('requesttoken', $this->requestToken);
			$this->response = $this->client->send($request);
		} catch (BadResponseException $ex) {
			$this->response = $ex->getResponse();
		}
	}

	/**
	 * @Given a new client token is used for user :user
	 * @param string $user
	 */
	public function aNewClientTokenIsUsed($user) {
		$client = new Client();
		$resp = $client->post(substr($this->baseUrl, 0, -5) . '/token/generate', [
			'json' => [
				'user' => $user,
				'password' => $this->getPasswordForUser($user),
			]
		]);
		$this->clientToken = json_decode($resp->getBody()->getContents())->token;
	}

	/**
	 * @When requesting :url with :method using basic auth for user :user
	 * @param string $url
	 * @param string $method
	 */
	public function requestingWithBasicAuth($url, $method, $user) {
		$authString = $user . ':' . $this->getPasswordForUser($user);
		$this->sendRequest($url, $method, 'basic ' . base64_encode($authString));
	}

	/**
	 * @When requesting :url with :method using basic token auth
	 * @param string $url
	 * @param string $method
	 */
	public function requestingWithBasicTokenAuth($url, $method) {
		$this->sendRequest($url, $method, 'basic ' . base64_encode('user0:' . $this->clientToken));
	}

	/**
	 * @When requesting :url with :method using a client token
	 * @param string $url
	 * @param string $method
	 */
	public function requestingWithUsingAClientToken($url, $method) {
		$this->sendRequest($url, $method, 'token ' . $this->clientToken);
	}

	/**
	 * @When requesting :url with :method using browser session
	 * @param string $url
	 * @param string $method
	 */
	public function requestingWithBrowserSession($url, $method) {
		$this->sendRequest($url, $method, null, true);
	}

	/**
	 * @Given a new browser session is started for user :user
	 * @param string $user
	 */
	public function aNewBrowserSessionIsStarted($user) {
		$loginUrl = substr($this->baseUrl, 0, -5) . '/login';
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
