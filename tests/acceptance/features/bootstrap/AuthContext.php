<?php declare(strict_types=1);
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

use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use TestHelpers\HttpRequestHelper;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Context\Context;
use TestHelpers\SetupHelper;

/**
 * Authentication functions
 */
class AuthContext implements Context {
	private string $clientToken;
	private string $appToken;
	private array $appTokens;
	private bool $tokenAuthHasBeenSet = false;
	private FeatureContext $featureContext;

	/**
	 * 'true' or 'false' or ''
	 */
	private string $tokenAuthHasBeenSetTo = '';

	/**
	 * @return string
	 */
	public function getTokenAuthHasBeenSetTo():string {
		return $this->tokenAuthHasBeenSetTo;
	}

	/**
	 * get the client token that was last generated
	 * app acceptance tests that have their own step code may need to use this
	 *
	 * @return string client token
	 */
	public function getClientToken():string {
		return $this->clientToken;
	}

	/**
	 * get the app token that was last generated
	 * app acceptance tests that have their own step code may need to use this
	 *
	 * @return string app token
	 */
	public function getAppToken():string {
		return $this->appToken;
	}

	/**
	 * get the app token that was last generated
	 * app acceptance tests that have their own step code may need to use this
	 *
	 * @return array app tokens
	 */
	public function getAppTokens():array {
		return $this->appTokens;
	}

	/**
	 * @BeforeScenario
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function setUpScenario(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');

		// Reset ResponseXml
		$this->featureContext->setResponseXml([]);

		// Initialize SetupHelper class
		SetupHelper::init(
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getOcPath()
		);
	}

	/**
	 * @When a user requests :url with :method and no authentication
	 *
	 * @param string $url
	 * @param string $method
	 *
	 * @return void
	 */
	public function userRequestsURLWith(string $url, string $method):void {
		$this->sendRequest($url, $method);
	}

	/**
	 * @When user :user requests :url with :method and no authentication
	 *
	 * @param string $user
	 * @param string $url
	 * @param string $method
	 *
	 * @return void
	 * @throws JsonException
	 */
	public function userRequestsURLWithNoAuth(string $user, string $url, string $method):void {
		$userRenamed = $this->featureContext->getActualUsername($user);
		$url = $this->featureContext->substituteInLineCodes($url, $userRenamed);
		$this->sendRequest($url, $method);
	}

	/**
	 * @Given a user has requested :url with :method and no authentication
	 *
	 * @param string $url
	 * @param string $method
	 *
	 * @return void
	 */
	public function userHasRequestedURLWith(string $url, string $method):void {
		$this->sendRequest($url, $method);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * Verifies status code
	 *
	 * @param string $ocsCode
	 * @param string $httpCode
	 * @param string $endPoint
	 *
	 * @return void
	 * @throws Exception
	 */
	public function verifyStatusCode(string $ocsCode, string $httpCode, string $endPoint):void {
		if ($ocsCode !== null) {
			$this->featureContext->ocsContext->theOCSStatusCodeShouldBe(
				$ocsCode,
				"Got unexpected OCS code while sending request to endpoint " . $endPoint
			);
		}
		$this->featureContext->theHTTPStatusCodeShouldBe(
			$httpCode,
			"Got unexpected HTTP code while sending request to endpoint " . $endPoint
		);
	}

	/**
	 * @When a user requests these endpoints with :method with body :body and no authentication about user :user
	 *
	 * @param string $method
	 * @param ?string $body
	 * @param string $ofUser
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userRequestsEndpointsWithBodyAndNoAuthThenStatusCodeAboutUser(string $method, ?string $body, ?string $ofUser, TableNode $table):void {
		$ofUser = \strtolower($this->featureContext->getActualUsername($ofUser));
		$this->featureContext->verifyTableNodeColumns($table, ['endpoint']);
		$this->featureContext->emptyLastOCSStatusCodesArray();
		$this->featureContext->emptyLastHTTPStatusCodesArray();
		foreach ($table->getHash() as $row) {
			$row['endpoint'] = $this->featureContext->substituteInLineCodes(
				$row['endpoint'],
				$ofUser
			);
			$this->sendRequest($row['endpoint'], $method, null, false, $body);
			$this->featureContext->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @When a user requests these endpoints with :method with no authentication about user :user
	 *
	 * @param string $method
	 * @param string $ofUser
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userRequestsEndpointsWithoutBodyAndNoAuth(string $method, string $ofUser, TableNode $table):void {
		$this->userRequestsEndpointsWithBodyAndNoAuthThenStatusCodeAboutUser(
			$method,
			null,
			$ofUser,
			$table
		);
	}

	/**
	 * @When a user requests these endpoints with :method and no authentication
	 *
	 * @param string $method
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userRequestsEndpointsWithNoAuthentication(string $method, TableNode $table):void {
		$this->featureContext->verifyTableNodeColumns($table, ['endpoint']);
		$this->featureContext->emptyLastOCSStatusCodesArray();
		$this->featureContext->emptyLastHTTPStatusCodesArray();
		foreach ($table->getHash() as $row) {
			$this->sendRequest($row['endpoint'], $method);
			$this->featureContext->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @When the user :user requests these endpoints with :method with basic auth
	 *
	 * @param string $user
	 * @param string $method
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userRequestsEndpointsWithBasicAuth(string $user, string $method, TableNode $table):void {
		$user = $this->featureContext->getActualUsername($user);
		$this->userRequestsEndpointsWithPassword($user, $method, null, $table);
	}

	/**
	 * @When the user :user requests these endpoints with :method using basic auth and generated app password about user :ofUser
	 *
	 * @param string $user
	 * @param string $method
	 * @param string $ofUser
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userRequestsEndpointsWithBasicAuthAndGeneratedPassword(string $user, string $method, string $ofUser, TableNode $table):void {
		$this->requestEndpointsWithBasicAuthAndGeneratedPassword($user, $method, $ofUser, $table);
	}

	/**
	 * @When /^the user "([^"]*)" requests these endpoints with "([^"]*)" to (?:get|set) property "([^"]*)" using basic auth and generated app password about user "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $method
	 * @param string $property
	 * @param string $ofUser
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userRequestsEndpointsWithBasicAuthAndGeneratedPasswordWithProperty(
		string $user,
		string $method,
		string $property,
		string $ofUser,
		TableNode $table
	):void {
		$this->requestEndpointsWithBasicAuthAndGeneratedPassword(
			$user,
			$method,
			$ofUser,
			$table,
			null,
			$property
		);
	}

	/**
	 * @When /^the user "([^"]*)" requests these endpoints with "([^"]*)" to (?:get|set) property "([^"]*)" with password "([^"]*)" about user "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $method
	 * @param string $property
	 * @param string $ofUser
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userRequestsEndpointsWithPasswordWithProperty(
		string $user,
		string $method,
		string $property,
		string $ofUser,
		TableNode $table
	):void {
		$this->userRequestsEndpointsWithPassword(
			$user,
			$method,
			$ofUser,
			$table,
			$property
		);
	}

	/**
	 * @When the user :user requests these endpoints with :method with body :body using basic auth and generated app password about user :ofUser
	 *
	 * @param string $user
	 * @param string $method
	 * @param string $body
	 * @param string $ofUser
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userRequestsEndpointsWithBasicAuthAndGeneratedPasswordWithBody(
		string $user,
		string $method,
		string $body,
		string $ofUser,
		TableNode $table
	):void {
		$header = [];
		if ($method === 'MOVE' || $method === 'COPY') {
			$header['Destination'] = '/path/to/destination';
		}

		$this->requestEndpointsWithBasicAuthAndGeneratedPassword(
			$user,
			$method,
			$ofUser,
			$table,
			$body,
			null,
			$header,
		);
	}

	/**
	 * @param string $user requesting user
	 * @param string $method http method
	 * @param string $ofUser resource owner
	 * @param TableNode $table endpoints table
	 * @param string|null $body body for request
	 * @param string|null $property property to get
	 * @param Array|null $header request header
	 *
	 * @return void
	 * @throws Exception
	 */
	public function requestEndpointsWithBasicAuthAndGeneratedPassword(
		string $user,
		string $method,
		string $ofUser,
		TableNode $table,
		?string $body = null,
		?string $property = null,
		?array $header = null
	):void {
		$user = $this->featureContext->getActualUsername($user);
		$ofUser = \strtolower($this->featureContext->getActualUsername($ofUser));
		$this->featureContext->verifyTableNodeColumns($table, ['endpoint']);
		$this->featureContext->emptyLastOCSStatusCodesArray();
		$this->featureContext->emptyLastHTTPStatusCodesArray();
		$this->featureContext->emptyLastHTTPStatusCodesArray();
		if ($body === null && $property !== null) {
			$body = $this->featureContext->getBodyForOCSRequest($method, $property);
		}

		$this->featureContext->verifyTableNodeColumns($table, ['endpoint']);
		foreach ($table->getHash() as $row) {
			$row['endpoint'] = $this->featureContext->substituteInLineCodes(
				$row['endpoint'],
				$ofUser
			);
			$this->userRequestsURLWithUsingBasicAuth($user, $row['endpoint'], $method, $this->appToken, $body, $header);
			$this->featureContext->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @When user :user requests these endpoints with :method using password :password
	 *
	 * @param string $user
	 * @param string $method
	 * @param string|null $password
	 * @param TableNode $table
	 * @param string|null $property
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userRequestsEndpointsWithPassword(
		string $user,
		string $method,
		?string $password,
		TableNode $table,
		?string $property = null
	):void {
		$user = $this->featureContext->getActualUsername($user);
		$this->featureContext->emptyLastOCSStatusCodesArray();
		$this->featureContext->emptyLastHTTPStatusCodesArray();
		$this->featureContext->verifyTableNodeColumns($table, ['endpoint']);
		foreach ($table->getHash() as $row) {
			$body = null;
			if ($property !== null) {
				$body = $this->featureContext->getBodyForOCSRequest($method, $property);
			}
			$this->userRequestsURLWithUsingBasicAuth($user, $row['endpoint'], $method, $password, $body);
			$this->featureContext->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @When the administrator requests these endpoint with :method
	 *
	 * @param string $method
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminRequestsEndpoint(string $method, TableNode $table):void {
		$this->adminRequestsEndpointsWithBodyWithPassword($method, null, null, null, $table);
	}

	/**
	 * @When the administrator requests these endpoints with :method with body :body using password :password about user :ofUser
	 *
	 * @param string|null $method
	 * @param string|null $body
	 * @param string|null $password
	 * @param string|null $ofUser
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminRequestsEndpointsWithBodyWithPassword(
		?string $method,
		?string $body,
		?string $password,
		?string $ofUser,
		TableNode $table
	):void {
		$ofUser = $this->featureContext->getActualUsername($ofUser);
		$this->featureContext->verifyTableNodeColumns($table, ['endpoint']);
		$this->featureContext->emptyLastHTTPStatusCodesArray();
		$this->featureContext->emptyLastOCSStatusCodesArray();
		foreach ($table->getHash() as $row) {
			$row['endpoint'] = $this->featureContext->substituteInLineCodes(
				$row['endpoint'],
				$ofUser
			);
			$this->userRequestsURLWithUsingBasicAuth(
				$this->featureContext->getAdminUsername(),
				$row['endpoint'],
				$method,
				$password,
				$body
			);
			$this->featureContext->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @When the administrator requests these endpoints with :method using password :password about user :ofUser
	 *
	 * @param string $method
	 * @param string $password
	 * @param string $ofUser
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function adminRequestsEndpointsWithPassword(
		string $method,
		string $password,
		string $ofUser,
		TableNode $table
	):void {
		$this->adminRequestsEndpointsWithBodyWithPassword($method, null, $password, $ofUser, $table);
	}

	/**
	 * @When user :user requests these endpoints with :method using basic token auth
	 *
	 * @param string $user
	 * @param string $method
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function whenUserWithNewClientTokenRequestsForEndpointUsingBasicTokenAuth(string $user, string $method, TableNode $table):void {
		$user = $this->featureContext->getActualUsername($user);
		$this->featureContext->verifyTableNodeColumns($table, ['endpoint']);
		$this->featureContext->emptyLastHTTPStatusCodesArray();
		$this->featureContext->emptyLastOCSStatusCodesArray();
		foreach ($table->getHash() as $row) {
			$this->userRequestsURLWithUsingBasicTokenAuth($user, $row['endpoint'], $method);
			$this->featureContext->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @When the user requests these endpoints with :method using a new browser session
	 *
	 * @param string $method
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userRequestsTheseEndpointsUsingNewBrowserSession(string $method, TableNode $table):void {
		$this->featureContext->verifyTableNodeColumns($table, ['endpoint']);
		$this->featureContext->emptyLastHTTPStatusCodesArray();
		$this->featureContext->emptyLastOCSStatusCodesArray();
		foreach ($table->getHash() as $row) {
			$this->userRequestsURLWithBrowserSession($row['endpoint'], $method);
			$this->featureContext->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @When the user requests these endpoints with :method using the generated app password about user :user
	 *
	 * @param string $method
	 * @param string $user
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userRequestsEndpointsUsingTheGeneratedAppPasswordThenStatusCodeAboutUser(string $method, string $user, TableNode $table):void {
		$user = \strtolower($this->featureContext->getActualUsername($user));
		$this->featureContext->verifyTableNodeColumns($table, ['endpoint']);
		$this->featureContext->emptyLastHTTPStatusCodesArray();
		$this->featureContext->emptyLastOCSStatusCodesArray();
		foreach ($table->getHash() as $row) {
			$row['endpoint'] = $this->featureContext->substituteInLineCodes(
				$row['endpoint'],
				$user
			);
			$this->userRequestsURLWithUsingAppPassword($row['endpoint'], $method);
			$this->featureContext->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @When the user requests these endpoints with :method using the generated app password
	 *
	 * @param string $method
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userRequestsEndpointsUsingTheGeneratedAppPassword(string $method, TableNode $table):void {
		$this->featureContext->verifyTableNodeColumns($table, ['endpoint']);
		$this->featureContext->emptyLastHTTPStatusCodesArray();
		$this->featureContext->emptyLastOCSStatusCodesArray();
		foreach ($table->getHash() as $row) {
			$this->userRequestsURLWithUsingAppPassword($row['endpoint'], $method);
			$this->featureContext->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @param string $url
	 * @param string $method
	 * @param string|null $authHeader
	 * @param bool $useCookies
	 * @param string|null $body
	 * @param array|null $headers
	 *
	 * @return void
	 */
	public function sendRequest(
		string $url,
		string $method,
		?string $authHeader = null,
		bool $useCookies = false,
		?string $body = null,
		?array $headers = []
	):void {
		// reset responseXml
		$this->featureContext->setResponseXml([]);

		$fullUrl = $this->featureContext->getBaseUrl() . $url;

		$cookies = null;
		if ($useCookies) {
			$cookies = $this->featureContext->getCookieJar();
		}

		if ($authHeader) {
			$headers['Authorization'] = $authHeader;
		}
		$headers['OCS-APIREQUEST'] = 'true';
		if (isset($this->requestToken)) {
			$headers['requesttoken'] = $this->featureContext->getRequestToken();
		}
		$this->featureContext->setResponse(
			HttpRequestHelper::sendRequest(
				$fullUrl,
				$this->featureContext->getStepLineRef(),
				$method,
				null,
				null,
				$headers,
				$body,
				null,
				$cookies
			)
		);
	}

	/**
	 * Use the private API to generate an app password
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function userGeneratesNewAppPasswordNamed(string $name):void {
		$url = $this->featureContext->getBaseUrl() . '/index.php/settings/personal/authtokens';
		$body = ['name' => $name];
		$headers = [
			'Content-Type' => 'application/x-www-form-urlencoded',
			'OCS-APIREQUEST' => 'true',
			'requesttoken' => $this->featureContext->getRequestToken(),
			'X-Requested-With' => 'XMLHttpRequest'
		];
		$this->featureContext->setResponse(
			HttpRequestHelper::post(
				$url,
				$this->featureContext->getStepLineRef(),
				null,
				null,
				$headers,
				$body,
				null,
				$this->featureContext->getCookieJar()
			)
		);
		$token = \json_decode($this->featureContext->getResponse()->getBody()->getContents());
		$this->appToken = $token->token;
		$this->appTokens[$token->deviceToken->name]
			= ["id" => $token->deviceToken->id, "token" => $token->token];
	}

	/**
	 * Use the private API to generate an app password
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function userDeletesAppPasswordNamed(string $name):void {
		$url = $this->featureContext->getBaseUrl() . '/index.php/settings/personal/authtokens/' . $this->appTokens[$name]["id"];
		$headers = [
			'Content-Type' => 'application/x-www-form-urlencoded',
			'OCS-APIREQUEST' => 'true',
			'requesttoken' => $this->featureContext->getRequestToken(),
			'X-Requested-With' => 'XMLHttpRequest'
		];
		$this->featureContext->setResponse(
			HttpRequestHelper::delete(
				$url,
				$this->featureContext->getStepLineRef(),
				null,
				null,
				$headers,
				null,
				null,
				$this->featureContext->getCookieJar()
			)
		);
	}

	/**
	 * @Given the user has generated a new app password named :name
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function aNewAppPasswordHasBeenGenerated(string $name):void {
		$this->userGeneratesNewAppPasswordNamed($name);
		$this->featureContext->theHTTPStatusCodeShouldBe(200);
	}

	/**
	 * @Given the user has deleted the app password named :name
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function aNewAppPasswordHasBeenDeleted(string $name):void {
		$this->userDeletesAppPasswordNamed($name);
		$this->featureContext->theHTTPStatusCodeShouldBe(200);
	}

	/**
	 * @When user :user generates a new client token using the token API
	 * @Given a new client token for :user has been generated
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function aNewClientTokenHasBeenGenerated(string $user):void {
		$user = $this->featureContext->getActualUsername($user);
		$body = \json_encode(
			[
				'user' => $this->featureContext->getActualUsername($user),
				'password' => $this->featureContext->getPasswordForUser($user),
			]
		);
		$headers = ['Content-Type' => 'application/json'];
		$url = $this->featureContext->getBaseUrl() . '/token/generate';
		$this->featureContext->setResponse(
			HttpRequestHelper::post(
				$url,
				$this->featureContext->getStepLineRef(),
				null,
				null,
				$headers,
				$body
			)
		);
		$this->featureContext->theHTTPStatusCodeShouldBe("200");
		$this->clientToken
			= \json_decode($this->featureContext->getResponse()->getBody()->getContents())->token;
	}

	/**
	 * @When the administrator generates a new client token using the token API
	 * @Given a new client token for the administrator has been generated
	 *
	 * @return void
	 */
	public function aNewClientTokenForTheAdministratorHasBeenGenerated():void {
		$admin = $this->featureContext->getAdminUsername();
		$this->aNewClientTokenHasBeenGenerated($admin);
	}

	/**
	 * @When user :user requests :url with :method using basic auth
	 *
	 * @param string $user
	 * @param string $url
	 * @param string $method
	 * @param string|null $password
	 * @param string|null $body
	 * @param array|null $header
	 *
	 * @return void
	 */
	public function userRequestsURLWithUsingBasicAuth(
		string $user,
		string $url,
		string $method,
		?string $password = null,
		?string $body = null,
		?array $header = null
	):void {
		$userRenamed = $this->featureContext->getActualUsername($user);
		$url = $this->featureContext->substituteInLineCodes(
			$url,
			$userRenamed
		);
		if ($password === null) {
			$authString = "$userRenamed:" . $this->featureContext->getPasswordForUser($user);
		} else {
			$authString = $userRenamed . ":" . $this->featureContext->getActualPassword($password);
		}
		$this->sendRequest(
			$url,
			$method,
			'basic ' . \base64_encode($authString),
			false,
			$body,
			$header
		);
	}

	/**
	 * @When user :user requests :url with :method using basic auth and with headers
	 *
	 * @param string $user
	 * @param string $url
	 * @param string $method
	 * @param TableNode $headersTable
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userRequestsURLWithUsingBasicAuthAndDepthHeader(string $user, string $url, string $method, TableNode $headersTable):void {
		$user = $this->featureContext->getActualUsername($user);
		$authString = "$user:" . $this->featureContext->getPasswordForUser($user);
		$url = $this->featureContext->substituteInLineCodes(
			$url,
			$user
		);
		$this->featureContext->verifyTableNodeColumns(
			$headersTable,
			['header', 'value']
		);
		$headers = [];
		foreach ($headersTable as $row) {
			$headers[$row['header']] = $row ['value'];
		}
		$this->sendRequest(
			$url,
			$method,
			'basic ' . \base64_encode($authString),
			false,
			null,
			$headers
		);
	}

	/**
	 * @Given user :user has requested :url with :method using basic auth
	 *
	 * @param string $user
	 * @param string $url
	 * @param string $method
	 * @param string|null $password
	 * @param string|null $body
	 *
	 * @return void
	 */
	public function userHasRequestedURLWithUsingBasicAuth(
		string $user,
		string $url,
		string $method,
		?string $password = null,
		?string $body = null
	):void {
		$this->userRequestsURLWithUsingBasicAuth(
			$user,
			$url,
			$method,
			$password,
			$body
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @When the administrator requests :url with :method using basic auth
	 *
	 * @param string $url
	 * @param string $method
	 * @param string|null $password
	 *
	 * @return void
	 */
	public function administratorRequestsURLWithUsingBasicAuth(string $url, string $method, ?string $password = null):void {
		$this->userRequestsURLWithUsingBasicAuth(
			$this->featureContext->getAdminUsername(),
			$url,
			$method,
			$password
		);
	}

	/**
	 * @When user :user requests :url with :method using basic token auth
	 *
	 * @param string $user
	 * @param string $url
	 * @param string $method
	 *
	 * @return void
	 */
	public function userRequestsURLWithUsingBasicTokenAuth(string $user, string $url, string $method):void {
		$user = $this->featureContext->getActualUsername($user);
		$this->sendRequest(
			$url,
			$method,
			'basic ' . \base64_encode("$user:" . $this->clientToken)
		);
	}

	/**
	 * @Given user :user has requested :url with :method using basic token auth
	 *
	 * @param string $user
	 * @param string $url
	 * @param string $method
	 *
	 * @return void
	 */
	public function userHasRequestedURLWithUsingBasicTokenAuth(string $user, string $url, string $method):void {
		$this->userRequestsURLWithUsingBasicTokenAuth($user, $url, $method);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @When the user requests :url with :method using the generated client token
	 *
	 * @param string $url
	 * @param string $method
	 *
	 * @return void
	 */
	public function userRequestsURLWithUsingAClientToken(string $url, string $method):void {
		$this->sendRequest($url, $method, 'token ' . $this->clientToken);
	}

	/**
	 * @Given the user has requested :url with :method using the generated client token
	 *
	 * @param string $url
	 * @param string $method
	 *
	 * @return void
	 */
	public function userHasRequestedURLWithUsingAClientToken(string $url, string $method):void {
		$this->userRequestsURLWithUsingAClientToken($url, $method);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @When the user requests :url with :method using the generated app password
	 *
	 * @param string $url
	 * @param string $method
	 *
	 * @return void
	 */
	public function userRequestsURLWithUsingAppPassword(string $url, string $method):void {
		$this->sendRequest($url, $method, 'token ' . $this->appToken);
	}

	/**
	 * @When the user requests :url with :method using app password named :tokenName
	 *
	 * @param string $url
	 * @param string $method
	 * @param string $tokenName
	 *
	 * @return void
	 */
	public function theUserRequestsWithUsingAppPasswordNamed(string $url, string $method, string $tokenName):void {
		$this->sendRequest($url, $method, 'token ' . $this->appTokens[$tokenName]['token']);
	}

	/**
	 * @Given the user has requested :url with :method using the generated app password
	 *
	 * @param string $url
	 * @param string $method
	 *
	 * @return void
	 */
	public function userHasRequestedURLWithUsingAppPassword(string $url, string $method):void {
		$this->userRequestsURLWithUsingAppPassword($url, $method);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @When the user requests :url with :method using the browser session
	 *
	 * @param string $url
	 * @param string $method
	 *
	 * @return void
	 */
	public function userRequestsURLWithBrowserSession(string $url, string $method):void {
		$this->sendRequest($url, $method, null, true);
	}

	/**
	 * @Given the user has requested :url with :method using the browser session
	 *
	 * @param string $url
	 * @param string $method
	 *
	 * @return void
	 */
	public function userHasRequestedURLWithBrowserSession(string $url, string $method):void {
		$this->userRequestsURLWithBrowserSession($url, $method);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @Given a new browser session for :user has been started
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function aNewBrowserSessionForHasBeenStarted(string $user):void {
		$user = $this->featureContext->getActualUsername($user);
		$loginUrl = $this->featureContext->getBaseUrl() . '/index.php/login';
		// Request a new session and extract CSRF token
		$this->featureContext->setResponse(
			HttpRequestHelper::get(
				$loginUrl,
				$this->featureContext->getStepLineRef(),
				null,
				null,
				null,
				null,
				null,
				$this->featureContext->getCookieJar()
			)
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
		$this->featureContext->extractRequestTokenFromResponse($this->featureContext->getResponse());

		// Login and extract new token
		$body = [
			'user' => $this->featureContext->getActualUsername($user),
			'password' => $this->featureContext->getPasswordForUser($user),
			'requesttoken' => $this->featureContext->getRequestToken()
		];
		$this->featureContext->setResponse(
			HttpRequestHelper::post(
				$loginUrl,
				$this->featureContext->getStepLineRef(),
				null,
				null,
				null,
				$body,
				null,
				$this->featureContext->getCookieJar()
			)
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
		$this->featureContext->extractRequestTokenFromResponse($this->featureContext->getResponse());
	}

	/**
	 * @Given a new browser session for the administrator has been started
	 *
	 * @return void
	 */
	public function aNewBrowserSessionForTheAdministratorHasBeenStarted():void {
		$admin = $this->featureContext->getAdminUsername();
		$this->aNewBrowserSessionForHasBeenStarted($admin);
	}

	/**
	 * @When /^the administrator (enforces|does not enforce)\s?token auth$/
	 * @Given /^token auth has (not|)\s?been enforced$/
	 *
	 * @param string $hasOrNot
	 *
	 * @return void
	 * @throws Exception
	 */
	public function tokenAuthHasBeenEnforced(string $hasOrNot):void {
		$enforce = (($hasOrNot !== "not") && ($hasOrNot !== "does not enforce"));
		if ($enforce) {
			$value = 'true';
		} else {
			$value = 'false';
		}
		$occStatus = SetupHelper::setSystemConfig(
			'token_auth_enforced',
			$value,
			$this->featureContext->getStepLineRef(),
			'boolean'
		);
		if ($occStatus['code'] !== "0") {
			throw new \Exception("setSystemConfig token_auth_enforced returned error code " . $occStatus['code']);
		}

		// Remember that we set this value, so it can be removed after the scenario
		$this->tokenAuthHasBeenSet = true;
		$this->tokenAuthHasBeenSetTo = $value;
	}

	/**
	 *
	 * @return string
	 */
	public function generateAuthTokenForAdmin():string {
		$this->aNewBrowserSessionForHasBeenStarted($this->featureContext->getAdminUsername());
		$this->userGeneratesNewAppPasswordNamed('acceptance-test ' . \microtime());
		return $this->appToken;
	}

	/**
	 * delete token_auth_enforced if it was set in the scenario
	 *
	 * @AfterScenario
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteTokenAuthEnforcedAfterScenario():void {
		if ($this->tokenAuthHasBeenSet) {
			if ($this->tokenAuthHasBeenSetTo === 'true') {
				// Because token auth is enforced, we have to use a token
				// (app password) as the password to send to the testing app
				// so it will authenticate us.
				$appTokenForOccCommand = $this->generateAuthTokenForAdmin();
			} else {
				$appTokenForOccCommand = null;
			}
			SetupHelper::deleteSystemConfig(
				'token_auth_enforced',
				$this->featureContext->getStepLineRef(),
				null,
				$appTokenForOccCommand
			);
			$this->tokenAuthHasBeenSet = false;
			$this->tokenAuthHasBeenSetTo = '';
		}
	}
}
