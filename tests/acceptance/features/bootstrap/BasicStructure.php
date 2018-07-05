<?php
/**
 * @author Sergio Bertolin <sbertolin@owncloud.com>
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

use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Message\ResponseInterface;
use TestHelpers\OcsApiHelper;

require __DIR__ . '/../../../../lib/composer/autoload.php';

/**
 * Basic functions needed by mostly everything
 */
trait BasicStructure {
	use AppConfiguration;
	use Auth;
	use Checksums;
	use Comments;
	use Provisioning;
	use Sharing;
	use Tags;
	use Trashbin;
	use WebDav;
	use CommandLine;

	/**
	 * @var array
	 */
	private $adminUsername = '';

	/**
	 * @var array
	 */
	private $adminPassword = '';

	/**
	 * @var string
	 */
	private $regularUserPassword = '';

	/**
	 * @var string
	 */
	private $ocPath = '';

	/**
	 * @var string
	 */
	private $currentUser = '';

	/**
	 * @var string
	 */
	private $currentServer = '';

	/**
	 * The base URL of the current server under test,
	 * without any terminating slash
	 * e.g. http://localhost:8080
	 *
	 * @var string
	 */
	private $baseUrl = '';

	/**
	 * The base URL of the local server under test,
	 * without any terminating slash
	 * e.g. http://localhost:8080
	 *
	 * @var string
	 */
	private $localBaseUrl = '';

	/**
	 * The base URL of the remote (federated) server under test,
	 * without any terminating slash
	 * e.g. http://localhost:8180
	 *
	 * @var string
	 */
	private $remoteBaseUrl = '';

	/**
	 * @var int
	 */
	private $apiVersion = 1;

	/**
	 * @var ResponseInterface
	 */
	private $response = null;

	/**
	 * @var \GuzzleHttp\Cookie\CookieJar
	 */
	private $cookieJar;

	/**
	 * @var string
	 */
	private $requestToken;

	/**
	 * BasicStructure constructor.
	 *
	 * @param string $baseUrl
	 * @param string $adminUsername
	 * @param string $adminPassword
	 * @param string $regularUserPassword
	 * @param string $ocPath
	 *
	 */
	public function __construct(
		$baseUrl, $adminUsername, $adminPassword, $regularUserPassword, $ocPath
	) {

		// Initialize your context here
		$this->baseUrl = \rtrim($baseUrl, '/');
		$this->adminUsername = $adminUsername;
		$this->adminPassword = $adminPassword;
		$this->regularUserPassword = $regularUserPassword;
		$this->localBaseUrl = $this->baseUrl;
		$this->remoteBaseUrl = $this->baseUrl;
		$this->currentServer = 'LOCAL';
		$this->cookieJar = new \GuzzleHttp\Cookie\CookieJar();
		$this->ocPath = $ocPath;

		// in case of CI deployment we take the server url from the environment
		$testServerUrl = \getenv('TEST_SERVER_URL');
		if ($testServerUrl !== false) {
			$this->baseUrl = \rtrim($testServerUrl, '/');
			$this->localBaseUrl = $this->baseUrl;
		}

		// federated server url from the environment
		$testRemoteServerUrl = \getenv('TEST_SERVER_FED_URL');
		if ($testRemoteServerUrl !== false) {
			$this->remoteBaseUrl = \rtrim($testRemoteServerUrl, '/');
		}

		// get the admin username from the environment (if defined)
		$adminUsernameFromEnvironment = $this->getAdminUsernameFromEnvironment();
		if ($adminUsernameFromEnvironment !== false) {
			$this->adminUsername = $adminUsernameFromEnvironment;
		}

		// get the admin password from the environment (if defined)
		$adminPasswordFromEnvironment = $this->getAdminPasswordFromEnvironment();
		if ($adminPasswordFromEnvironment !== false) {
			$this->adminPassword = $adminPasswordFromEnvironment;
		}
	}

	/**
	 * Get the externally-defined admin username, if any
	 *
	 * @return string|false
	 */
	private static function getAdminUsernameFromEnvironment() {
		return \getenv('ADMIN_USERNAME');
	}

	/**
	 * Get the externally-defined admin password, if any
	 *
	 * @return string|false
	 */
	private static function getAdminPasswordFromEnvironment() {
		return \getenv('ADMIN_PASSWORD');
	}

	/**
	 * removes the scheme "http(s)://" (if any) from the front of a URL
	 * note: only needs to handle http or https
	 *
	 * @param string $url
	 *
	 * @return string
	 */
	public function removeSchemeFromUrl($url) {
		return \preg_replace(
			"(^https?://)", "", $url
		);
	}

	/**
	 * returns the base URL (which is without a slash at the end)
	 *
	 * @return string
	 */
	public function getBaseUrl() {
		return $this->baseUrl;
	}

	/**
	 * returns the base URL but without "http(s)://" in front of it
	 *
	 * @return string
	 */
	public function getBaseUrlWithoutScheme() {
		return $this->removeSchemeFromUrl($this->getBaseUrl());
	}

	/**
	 * returns the local base URL (which is without a slash at the end)
	 *
	 * @return string
	 */
	public function getLocalBaseUrl() {
		return $this->localBaseUrl;
	}

	/**
	 * returns the local base URL but without "http(s)://" in front of it
	 *
	 * @return string
	 */
	public function getLocalBaseUrlWithoutScheme() {
		return $this->removeSchemeFromUrl($this->getLocalBaseUrl());
	}

	/**
	 * returns the remote base URL (which is without a slash at the end)
	 *
	 * @return string
	 */
	public function getRemoteBaseUrl() {
		return $this->remoteBaseUrl;
	}

	/**
	 * returns the remote base URL but without "http(s)://" in front of it
	 *
	 * @return string
	 */
	public function getRemoteBaseUrlWithoutScheme() {
		return $this->removeSchemeFromUrl($this->getRemoteBaseUrl());
	}

	/**
	 * @Given /^using (?:api|API) version "([^"]*)"$/
	 *
	 * @param string $version
	 *
	 * @return void
	 */
	public function usingApiVersion($version) {
		$this->apiVersion = (int) $version;
	}

	/**
	 * @Given /^as user "([^"]*)"$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function asUser($user) {
		$this->currentUser = $user;
	}

	/**
	 * @return string
	 */
	public function getCurrentUser() {
		return $this->currentUser;
	}

	/**
	 * returns $this->response
	 * some steps use that private var to store the response for other steps
	 *
	 * @return ResponseInterface
	 */
	public function getResponse() {
		return $this->response;
	}

	/**
	 * @Given /^using server "(LOCAL|REMOTE)"$/
	 *
	 * @param string $server
	 *
	 * @return string Previous used server
	 */
	public function usingServer($server) {
		$previousServer = $this->currentServer;
		if ($server === 'LOCAL') {
			$this->baseUrl = $this->localBaseUrl;
			$this->currentServer = 'LOCAL';
		} else {
			$this->baseUrl = $this->remoteBaseUrl;
			$this->currentServer = 'REMOTE';
		}
		return $previousServer;
	}

	/**
	 * @When /^the user sends HTTP method "([^"]*)" to API endpoint "([^"]*)"$/
	 * @Given /^the user has sent HTTP method "([^"]*)" to API endpoint "([^"]*)"$/
	 *
	 * @param string $verb
	 * @param string $url
	 *
	 * @return void
	 */
	public function sendingTo($verb, $url) {
		$this->sendingToWith($verb, $url, null);
	}

	/**
	 * @When /^user "([^"]*)" sends HTTP method "([^"]*)" to API endpoint "([^"]*)"$/
	 * @Given /^user "([^"]*)" has sent HTTP method "([^"]*)" to API endpoint "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 *
	 * @return void
	 */
	public function userSendingTo($user, $verb, $url) {
		$this->userSendsHTTPMethodToAPIEndpointWithBody(
			$user,
			$verb,
			$url,
			null
		);
	}

	/**
	 * Parses the xml answer to get ocs response which doesn't match with
	 * http one in v1 of the api.
	 *
	 * @param ResponseInterface $response
	 *
	 * @return string
	 */
	public function getOCSResponseStatusCode($response) {
		return (string) $response->xml()->meta[0]->statuscode;
	}

	/**
	 * Parses the xml answer to get ocs response message which doesn't match with
	 * http one in v1 of the api.
	 *
	 * @param ResponseInterface $response
	 *
	 * @return string
	 */
	public function getOCSResponseStatusMessage($response) {
		return (string) $response->xml()->meta[0]->message;
	}

	/**
	 * Parses the xml answer to get the requested key and sub-key
	 *
	 * @param ResponseInterface $response
	 * @param string $key1
	 * @param string $key2
	 *
	 * @return string
	 */
	public function getXMLKey1Key2Value($response, $key1, $key2) {
		return $response->xml()->$key1->$key2;
	}

	/**
	 * Parses the xml answer to get the requested key sequence
	 *
	 * @param ResponseInterface $response
	 * @param string $key1
	 * @param string $key2
	 * @param string $key3
	 *
	 * @return string
	 */
	public function getXMLKey1Key2Key3Value($response, $key1, $key2, $key3) {
		return $response->xml()->$key1->$key2->$key3;
	}

	/**
	 * Parses the xml answer to get the requested attribute value
	 *
	 * @param ResponseInterface $response
	 * @param string $key1
	 * @param string $key2
	 * @param string $key3
	 * @param string $attribute
	 *
	 * @return string
	 */
	public function getXMLKey1Key2Key3AttributeValue(
		$response, $key1, $key2, $key3, $attribute
	) {
		return (string) $response->xml()->$key1->$key2->$key3->attributes()->$attribute;
	}

	/**
	 * This function is needed to use a vertical fashion in the gherkin tables.
	 *
	 * @param array $arrayOfArrays
	 *
	 * @return array
	 */
	public function simplifyArray($arrayOfArrays) {
		$a = \array_map(
			function ($subArray) {
				return $subArray[0];
			}, $arrayOfArrays
		);
		return $a;
	}

	/**
	 * @When /^the user sends HTTP method "([^"]*)" to API endpoint "([^"]*)" with body$/
	 * @Given /^the user has sent HTTP method "([^"]*)" to API endpoint "([^"]*)" with body$/
	 *
	 * @param string $verb
	 * @param string $url
	 * @param TableNode $body
	 *
	 * @return void
	 */
	public function sendingToWith($verb, $url, $body) {
		$this->userSendsHTTPMethodToAPIEndpointWithBody(
			$this->currentUser,
			$verb,
			$url,
			$body
		);
	}

	/**
	 * @When /^user "([^"]*)" sends HTTP method "([^"]*)" to API endpoint "([^"]*)" with body$/
	 * @Given /^user "([^"]*)" has sent HTTP method "([^"]*)" to API endpoint "([^"]*)" with body$/
	 *
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 * @param TableNode|null $body
	 *
	 * @return void
	 */
	public function userSendsHTTPMethodToAPIEndpointWithBody(
		$user, $verb, $url, $body
	) {

		/**
		 * array of the data to be sent in the body.
		 * contains $body data converted to an array
		 *
		 * @var array $bodyArray
		 */
		$bodyArray = [];
		if ($body instanceof TableNode) {
			$bodyArray = $body->getRowsHash();
		}

		if ($user !== 'UNAUTHORIZED_USER') {
			$password = $this->getPasswordForUser($user);
		} else {
			$user = null;
			$password = null;
		}

		$this->response = OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$user, $password, $verb, $url, $bodyArray, $this->apiVersion
		);
	}

	/**
	 * @When /^user "([^"]*)" sends HTTP method "([^"]*)" to URL "([^"]*)"$/
	 * @Given /^user "([^"]*)" has sent HTTP method "([^"]*)" to URL "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 *
	 * @return void
	 */
	public function userSendsHTTPMethodToUrl($user, $verb, $url) {
		$this->sendingToWithDirectUrl($user, $verb, $url, null);
	}

	/**
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 * @param TableNode $body
	 *
	 * @return void
	 */
	public function sendingToWithDirectUrl($user, $verb, $url, $body) {
		$fullUrl = $this->getBaseUrl() . $url;
		$client = new Client();
		$options = [];
		$options['auth'] = $this->getAuthOptionForUser($user);

		if (!empty($this->cookieJar->toArray())) {
			$options['cookies'] = $this->cookieJar;
		}

		if ($body instanceof TableNode) {
			$fd = $body->getRowsHash();
			$options['body'] = $fd;
		}

		try {
			$request = $client->createRequest($verb, $fullUrl, $options);
			if (isset($this->requestToken)) {
				$request->addHeader('requesttoken', $this->requestToken);
			}
			$this->response = $client->send($request);
		} catch (BadResponseException $ex) {
			$this->response = $ex->getResponse();
		}
	}

	/**
	 * @param string $url
	 *
	 * @return bool
	 */
	public function isAPublicLinkUrl($url) {
		$urlEnding = \substr($url, \strlen($this->getBaseUrl() . '/'));
		return \preg_match("%^(index.php/)?s/([a-zA-Z0-9]{15})$%", $urlEnding);
	}

	/**
	 * @Then /^the OCS status code should be "([^"]*)"$/
	 *
	 * @param int $statusCode
	 * @param string $message
	 *
	 * @return void
	 */
	public function theOCSStatusCodeShouldBe($statusCode, $message = "") {
		PHPUnit_Framework_Assert::assertEquals(
			$statusCode, $this->getOCSResponseStatusCode($this->response),
			$message
		);
	}

	/**
	 * @Then /^the HTTP status code should be "([^"]*)"$/
	 *
	 * @param int $statusCode
	 * @param string $message
	 *
	 * @return void
	 */
	public function theHTTPStatusCodeShouldBe($statusCode, $message = "") {
		PHPUnit_Framework_Assert::assertEquals(
			$statusCode, $this->response->getStatusCode(), $message
		);
	}

	/**
	 * @Then /^the XML "([^"]*)" "([^"]*)" value should be "([^"]*)"$/
	 *
	 * @param string $key1
	 * @param string $key2
	 * @param string $idText
	 *
	 * @return void
	 */
	public function theXMLKey1Key2ValueShouldBe($key1, $key2, $idText) {
		PHPUnit_Framework_Assert::assertEquals(
			$idText,
			$this->getXMLKey1Key2Value($this->response, $key1, $key2)
		);
	}

	/**
	 * @Then /^the XML "([^"]*)" "([^"]*)" "([^"]*)" value should be "([^"]*)"$/
	 *
	 * @param string $key1
	 * @param string $key2
	 * @param string $key3
	 * @param string $idText
	 *
	 * @return void
	 */
	public function theXMLKey1Key2Key3ValueShouldBe(
		$key1, $key2, $key3, $idText
	) {
		PHPUnit_Framework_Assert::assertEquals(
			$idText,
			$this->getXMLKey1Key2Key3Value($this->response, $key1, $key2, $key3)
		);
	}

	/**
	 * @Then /^the XML "([^"]*)" "([^"]*)" "([^"]*)" "([^"]*)" attribute value should be a valid version string$/
	 *
	 * @param string $key1
	 * @param string $key2
	 * @param string $key3
	 * @param string $attribute
	 *
	 * @return void
	 */
	public function theXMLKey1Key2AttributeValueShouldBe(
		$key1, $key2, $key3, $attribute
	) {
		$value = $this->getXMLKey1Key2Key3AttributeValue(
			$this->response, $key1, $key2, $key3, $attribute
		);
		PHPUnit_Framework_Assert::assertTrue(
			\version_compare($value, '0.0.1') >= 0,
			'attribute ' . $attribute . ' value ' . $value . ' is not a valid version string'
		);
	}

	/**
	 * @param ResponseInterface $response
	 *
	 * @return void
	 */
	private function extractRequestTokenFromResponse(ResponseInterface $response) {
		$this->requestToken = \substr(
			\preg_replace(
				'/(.*)data-requesttoken="(.*)">(.*)/sm', '\2',
				$response->getBody()->getContents()
			),
			0,
			89
		);
	}

	/**
	 * @When /^user "([^"]*)" logs in to a web-style session using the API$/
	 * @Given /^user "([^"]*)" has logged in to a web-style session using the API$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userHasLoggedInToAWebStyleSessionUsingTheAPI($user) {
		$loginUrl = $this->getBaseUrl() . '/login';
		// Request a new session and extract CSRF token
		$client = new Client();
		$response = $client->get(
			$loginUrl,
			[
				'cookies' => $this->cookieJar,
			]
		);
		$this->extractRequestTokenFromResponse($response);

		// Login and extract new token
		$password = $this->getPasswordForUser($user);
		$client = new Client();
		$response = $client->post(
			$loginUrl,
			[
				'body' => [
					'user' => $user,
					'password' => $password,
					'requesttoken' => $this->requestToken,
				],
				'cookies' => $this->cookieJar,
			]
		);
		$this->extractRequestTokenFromResponse($response);
	}

	/**
	 * @When the client sends a :method to :url with requesttoken using the API
	 * @Given the client has sent a :method to :url with requesttoken
	 *
	 * @param string $method
	 * @param string $url
	 *
	 * @return void
	 */
	public function sendingAToWithRequesttoken($method, $url) {
		$client = new Client();
		$request = $client->createRequest(
			$method,
			$this->getBaseUrl() . $url,
			[
				'cookies' => $this->cookieJar,
			]
		);
		$request->addHeader('requesttoken', $this->requestToken);
		try {
			$this->response = $client->send($request);
		} catch (BadResponseException $e) {
			$this->response = $e->getResponse();
		}
	}

	/**
	 * @When the client sends a :method to :url without requesttoken using the API
	 * @Given the client has sent a :method to :url without requesttoken
	 *
	 * @param string $method
	 * @param string $url
	 *
	 * @return void
	 */
	public function sendingAToWithoutRequesttoken($method, $url) {
		$client = new Client();
		$request = $client->createRequest(
			$method,
			$this->getBaseUrl() . $url,
			[
				'cookies' => $this->cookieJar,
			]
		);
		try {
			$this->response = $client->send($request);
		} catch (BadResponseException $e) {
			$this->response = $e->getResponse();
		}
	}

	/**
	 * @param string $path
	 * @param string $filename
	 *
	 * @return void
	 */
	public static function removeFile($path, $filename) {
		if (\file_exists("$path" . "$filename")) {
			\unlink("$path" . "$filename");
		}
	}

	/**
	 * @When user :user modifies text of :filename with text :text using the API
	 * @Given user :user has modified text of :filename with text :text
	 *
	 * @param string $user
	 * @param string $filename
	 * @param string $text
	 *
	 * @return void
	 */
	public function modifyTextOfFile($user, $filename, $text) {
		self::removeFile($this->getUserHome($user) . "/files", "$filename");
		\file_put_contents(
			$this->getUserHome($user) . "/files" . "$filename", "$text"
		);
	}

	/**
	 * @param string $name
	 * @param string $size
	 *
	 * @return void
	 */
	public function createFileSpecificSize($name, $size) {
		$file = \fopen("work/" . "$name", 'w');
		\fseek($file, $size - 1, SEEK_CUR);
		\fwrite($file, 'a'); // write a dummy char at SIZE position
		\fclose($file);
	}

	/**
	 * @param string $name
	 * @param string $text
	 *
	 * @return void
	 */
	public function createFileWithText($name, $text) {
		$file = \fopen("work/" . "$name", 'w');
		\fwrite($file, $text);
		\fclose($file);
	}

	/**
	 * @Given file :filename of size :size has been created in local storage
	 *
	 * @param string $filename
	 * @param string $size
	 *
	 * @return void
	 */
	public function fileHasBeenCreatedInLocalStorageWithSize($filename, $size) {
		$this->createFileSpecificSize("local_storage/$filename", $size);
	}

	/**
	 * @Given file :filename with text :text has been created in local storage
	 *
	 * @param string $filename
	 * @param string $text
	 *
	 * @return void
	 */
	public function fileHasBeenCreatedInLocalStorageWithText($filename, $text) {
		$this->createFileWithText("local_storage/$filename", $text);
	}

	/**
	 * @Given file :filename has been deleted in local storage
	 *
	 * @param string $filename
	 *
	 * @return void
	 */
	public function fileHasBeenDeletedInLocalStorage($filename) {
		\unlink("work/local_storage/$filename");
	}

	/**
	 * @return string
	 */
	public function getAdminUsername() {
		return (string) $this->adminUsername;
	}

	/**
	 * @return string
	 */
	public function getAdminPassword() {
		return (string) $this->adminPassword;
	}

	/**
	 * @param string $userName
	 *
	 * @return string
	 */
	public function getPasswordForUser($userName) {
		if ($userName === $this->getAdminUsername()) {
			return (string) $this->getAdminPassword();
		} elseif (\array_key_exists($userName, $this->createdUsers)) {
			return (string) $this->createdUsers[$userName]['password'];
		} elseif (\array_key_exists($userName, $this->createdRemoteUsers)) {
			return (string) $this->createdRemoteUsers[$userName]['password'];
		} else {
			// The user has not been created yet, let the caller have the
			// default password.
			return (string) $this->regularUserPassword;
		}
	}

	/**
	 * @param string $userName
	 *
	 * @return array
	 */
	public function getAuthOptionForUser($userName) {
		return [$userName, $this->getPasswordForUser($userName)];
	}

	/**
	 * @return array
	 */
	public function getAuthOptionForAdmin() {
		return $this->getAuthOptionForUser($this->getAdminUsername());
	}

	/**
	 * @When the admin requests status.php using the API
	 *
	 * @return void
	 */
	public function getStatusPhp() {
		$fullUrl = $this->getBaseUrl() . "/status.php";
		$client = new Client();
		$options = [];
		$options['auth'] = $this->getAuthOptionForUser('admin');
		try {
			$this->response = $client->send(
				$client->createRequest('GET', $fullUrl, $options)
			);
		} catch (BadResponseException $ex) {
			$this->response = $ex->getResponse();
		}
	}

	/**
	 * @Then the json responded should match with
	 *
	 * @param PyStringNode $jsonExpected
	 *
	 * @return void
	 */
	public function jsonRespondedShouldMatch(PyStringNode $jsonExpected) {
		$jsonExpectedEncoded = \json_encode($jsonExpected->getRaw());
		$jsonRespondedEncoded = \json_encode((string) $this->response->getBody());
		PHPUnit\Framework\Assert::assertEquals(
			$jsonExpectedEncoded, $jsonRespondedEncoded
		);
	}

	/**
	 * @Then the status.php response should match with
	 *
	 * @param PyStringNode $jsonExpected
	 *
	 * @return void
	 */
	public function statusPhpRespondedShouldMatch(PyStringNode $jsonExpected) {
		$jsonExpectedDecoded = \json_decode($jsonExpected->getRaw(), true);
		$jsonRespondedEncoded
			= \json_encode(\json_decode($this->response->getBody(), true));
		if ($this->runOcc(['status']) === 0) {
			$output = \explode("- ", $this->lastStdOut);
			$version = \explode(": ", $output[3]);
			PHPUnit_Framework_Assert::assertEquals(
				"version", $version[0]
			);
			$versionString = \explode(": ", $output[4]);
			PHPUnit_Framework_Assert::assertEquals(
				"versionstring", $versionString[0]
			);
			$jsonExpectedDecoded['version'] = \trim($version[1]);
			$jsonExpectedDecoded['versionstring'] = \trim($versionString[1]);
			$jsonExpectedEncoded = \json_encode($jsonExpectedDecoded);
			PHPUnit\Framework\Assert::assertEquals(
				$jsonExpectedEncoded, $jsonRespondedEncoded
			);
		} else {
			PHPUnit_Framework_Assert::fail('Cannot get version variables from occ');
		}
	}

	/**
	 * substitutes codes like %base_url% with the value
	 * if the given value does not have anything to be substituted
	 * then it is returned unmodified
	 *
	 * @param string $value
	 * @param array $functions associative array of functions and parameters to be
	 *                         called on every replacement string before the
	 *                         replacement
	 *                         function name has to be the key and the parameters an
	 *                         own array
	 *                         the replacement itself will be used as first parameter
	 *                         e.g. substituteInLineCodes($value, ['preg_quote' => ['/']])
	 *
	 * @return string
	 */
	public function substituteInLineCodes($value, $functions = []) {
		$substitutions = [
			[
				"code" => "%base_url%",
				"function" => [
					$this,
					"getBaseUrl"
				],
				"parameter" => []
			],
			[
				"code" => "%base_url_without_scheme%",
				"function" => [
					$this,
					"getBaseUrlWithoutScheme"
				],
				"parameter" => []
			],
			[
				"code" => "%remote_server%",
				"function" => [
					$this,
					"getRemoteBaseUrl"
				],
				"parameter" => []
			],
			[
				"code" => "%remote_server_without_scheme%",
				"function" => [
					$this,
					"getRemoteBaseUrlWithoutScheme"
				],
				"parameter" => []
			],
			[
				"code" => "%local_server%",
				"function" => [
					$this,
					"getLocalBaseUrl"
				],
				"parameter" => []
			],
			[
				"code" => "%local_server_without_scheme%",
				"function" => [
					$this,
					"getLocalBaseUrlWithoutScheme"
				],
				"parameter" => []
			]
		];

		foreach ($substitutions as $substitution) {
			$replacement = \call_user_func_array(
				$substitution["function"],
				$substitution["parameter"]
			);
			foreach ($functions as $function => $parameters) {
				$replacement = \call_user_func_array(
					$function,
					\array_merge([$replacement], $parameters)
				);
			}
			$value = \str_replace(
				$substitution["code"],
				$replacement,
				$value
			);
		}
		return $value;
	}

	/**
	 * @BeforeScenario @local_storage
	 *
	 * @return void
	 */
	public static function removeFilesFromLocalStorageBefore() {
		$dir = "./work/local_storage/";
		$di = new RecursiveDirectoryIterator(
			$dir, FilesystemIterator::SKIP_DOTS
		);
		$ri = new RecursiveIteratorIterator(
			$di, RecursiveIteratorIterator::CHILD_FIRST
		);
		foreach ($ri as $file) {
			$file->isDir() ?  \rmdir($file) : \unlink($file);
		}
	}

	/**
	 * @AfterScenario @local_storage
	 *
	 * @return void
	 */
	public static function removeFilesFromLocalStorageAfter() {
		$dir = "./work/local_storage/";
		$di = new RecursiveDirectoryIterator(
			$dir, FilesystemIterator::SKIP_DOTS
		);
		$ri = new RecursiveIteratorIterator(
			$di, RecursiveIteratorIterator::CHILD_FIRST
		);
		foreach ($ri as $file) {
			$file->isDir() ?  \rmdir($file) : \unlink($file);
		}
	}

	/**
	 * @BeforeSuite
	 *
	 * @param BeforeSuiteScope $scope
	 *
	 * @return void
	 * @throws \Exception
	 */
	public static function useBigFileIDs(BeforeSuiteScope $scope) {
		$fullUrl = \getenv('TEST_SERVER_URL');
		if (\substr($fullUrl, -1) !== '/') {
			$fullUrl .= '/';
		}
		$fullUrl .= "ocs/v1.php/apps/testing/api/v1/increasefileid";
		$client = new Client();
		$options = [];
		$suiteSettingsContexts = $scope->getSuite()->getSettings()['contexts'];
		$adminUsername = null;
		$adminPassword = null;
		foreach ($suiteSettingsContexts as $context) {
			if (isset($context[__CLASS__])) {
				$adminUsername = $context[__CLASS__]['adminUsername'];
				$adminPassword = $context[__CLASS__]['adminPassword'];
				break;
			}
		}

		// get the admin username from the environment (if defined)
		$adminUsernameFromEnvironment = self::getAdminUsernameFromEnvironment();
		if ($adminUsernameFromEnvironment !== false) {
			$adminUsername = $adminUsernameFromEnvironment;
		}

		// get the admin password from the environment (if defined)
		$adminPasswordFromEnvironment = self::getAdminPasswordFromEnvironment();
		if ($adminPasswordFromEnvironment !== false) {
			$adminPassword = $adminPasswordFromEnvironment;
		}

		if (($adminUsername === null) || ($adminPassword === null)) {
			throw new \Exception(
				"Could not find adminUsername and/or adminPassword in useBigFileIDs"
			);
		}

		$options['auth'] = [$adminUsername, $adminPassword];
		$client->send($client->createRequest('POST', $fullUrl, $options));
	}
}
