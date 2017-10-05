<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;

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
	 */
	public function requestingWith($url, $method) {
		$this->sendRequest($url, $method);
	}

	private function sendRequest($url, $method, $authHeader = null, $useCookies = false) {
		$fullUrl = substr($this->baseUrl, 0, -5) . $url;
		$options = [];
		try {
			$headers = [
				'OCS_APIREQUEST' => 'true',
				'requesttoken' => $this->requestToken
			];
			if ($authHeader) {
				$headers['Authorization'] = $authHeader;
			}
			if ($useCookies) {
				$options = [
				    'cookies' => $this->cookieJar,
				];
			}
			if ($authHeader) {
				$headers['Authorization'] = $authHeader;
			}
			$headers['OCS_APIREQUEST'] = 'true';
			$headers['requesttoken'] = $this->requestToken;
			$request = new Request($method, $fullUrl, $headers);
			$this->response = $this->client->send($request, $options);
		} catch (ClientException $ex) {
			$this->response = $ex->getResponse();
		}
	}

	/**
	 * @Given a new client token is used
	 */
	public function aNewClientTokenIsUsed() {
		$client = new Client();
		$resp = $client->post(substr($this->baseUrl, 0, -5) . '/token/generate', [
		    'json' => [
			'user' => 'user0',
			'password' => '123456',
		    ]
		]);
		$this->clientToken = json_decode($resp->getBody()->getContents())->token;
	}

	/**
	 * @When requesting :url with :method using basic auth
	 */
	public function requestingWithBasicAuth($url, $method) {
		$this->sendRequest($url, $method, 'basic ' . base64_encode('user0:123456'));
	}

	/**
	 * @When requesting :url with :method using basic token auth
	 */
	public function requestingWithBasicTokenAuth($url, $method) {
		$this->sendRequest($url, $method, 'basic ' . base64_encode('user0:' . $this->clientToken));
	}

	/**
	 * @When requesting :url with :method using a client token
	 */
	public function requestingWithUsingAClientToken($url, $method) {
		$this->sendRequest($url, $method, 'token ' . $this->clientToken);
	}

	/**
	 * @When requesting :url with :method using browser session
	 */
	public function requestingWithBrowserSession($url, $method) {
		$this->sendRequest($url, $method, null, true);
	}

	/**
	 * @Given a new browser session is started
	 */
	public function aNewBrowserSessionIsStarted() {
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
				'form_params' => [
					'user' => 'user0',
					'password' => '123456',
					'requesttoken' => $this->requestToken,
				],
				'cookies' => $this->cookieJar,
			]
		);
		$this->extracRequestTokenFromResponse($response);
	}

}
