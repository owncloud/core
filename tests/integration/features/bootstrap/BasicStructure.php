<?php

use Behat\Gherkin\Node\PyStringNode;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Message\ResponseInterface;
use TestHelpers\OcsApiHelper;

require __DIR__ . '/../../../../lib/composer/autoload.php';

trait BasicStructure {

	use AppConfiguration;
	use Auth;
	use Checksums;
	use Comments;
	use MailTool;
	use Provisioning;
	use Sharing;
	use Tags;
	use Trashbin;
	use WebDav;
	use CommandLine;

	/** @var array */
	private $adminUser = [];

	/**
	 * @var string
	 */
	private $regularUserPassword = '';

	/**
	 * @var string
	 * @deprecated this var actually store[s|d] the password - better to use method getPasswordForUser()
	 */
	private $regularUser = '';

	/** @var string */
	private $currentUser = '';

	/** @var string */
	private $currentServer = '';

	/** @var string */
	private $baseUrl = '';

	/** @var int */
	private $apiVersion = 1;

	/** @var ResponseInterface */
	private $response = null;

	/** @var \GuzzleHttp\Cookie\CookieJar */
	private $cookieJar;

	/** @var string */
	private $requestToken;

	public function __construct($baseUrl, $admin, $regular_user_password, $mailhog_url, $oc_path) {

		// Initialize your context here
		$this->baseUrl = $baseUrl;
		$this->adminUser = $admin;
		$this->regularUserPassword = $regular_user_password;
		// Set regularUser for backward-compatibility with old app tests that use BasicStructure
		$this->regularUser = $regular_user_password;
		$this->mailhogUrl = $mailhog_url;
		$this->localBaseUrl = $this->baseUrl;
		$this->remoteBaseUrl = $this->baseUrl;
		$this->currentServer = 'LOCAL';
		$this->cookieJar = new \GuzzleHttp\Cookie\CookieJar();
		$this->ocPath = $oc_path;

		// in case of CI deployment we take the server url from the environment
		$testServerUrl = getenv('TEST_SERVER_URL');
		if ($testServerUrl !== false) {
			$this->baseUrl = $testServerUrl;
			$this->localBaseUrl = $testServerUrl;
		}

		// federated server url from the environment
		$testRemoteServerUrl = getenv('TEST_SERVER_FED_URL');
		if ($testRemoteServerUrl !== false) {
			$this->remoteBaseUrl = $testRemoteServerUrl;
		}
	}

	/**
	 * returns the base URL without the /ocs part
	 */
	private function baseUrlWithoutOCSAppendix() {
		return substr($this->baseUrl, 0, -4);
	}

	/**
	 * @Given /^using (?:api|API) version "([^"]*)"$/
	 * @param string $version
	 */
	public function usingApiVersion($version) {
		$this->apiVersion = $version;
	}

	/**
	 * @Given /^as user "([^"]*)"$/
	 * @param string $user
	 */
	public function asUser($user) {
		$this->currentUser = $user;
	}

	/**
	 * @Given /^as an "([^"]*)"$/
	 * @param string $user
	 * @deprecated This step is not according to the latest standard - core usages have been changed
	 */
	public function asAn($user) {
		$this->currentUser = $user;
	}

	/**
	 * @Given /^using server "(LOCAL|REMOTE)"$/
	 * @param string $server
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
	 * @param string $verb
	 * @param string $url
	 */
	public function sendingTo($verb, $url) {
		$this->sendingToWith($verb, $url, null);
	}

	/**
	 * Parses the xml answer to get ocs response which doesn't match with
	 * http one in v1 of the api.
	 * @param ResponseInterface $response
	 * @return string
	 */
	public function getOCSResponseStatusCode($response) {
		return (string) $response->xml()->meta[0]->statuscode;
	}

	/**
	 * Parses the xml answer to get the requested key and sub-key
	 *
	 * @param ResponseInterface $response
	 * @param string $key1
	 * @param string $key2
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
	 * @return string
	 */
	public function getXMLKey1Key2Key3AttributeValue($response, $key1, $key2, $key3, $attribute) {
		return (string) $response->xml()->$key1->$key2->$key3->attributes()->$attribute;
	}

	/**
	 * This function is needed to use a vertical fashion in the gherkin tables.
	 * @param array $arrayOfArrays
	 * @return array
	 */
	public function simplifyArray($arrayOfArrays) {
		$a = array_map(function($subArray) { return $subArray[0]; }, $arrayOfArrays);
		return $a;
	}

	/**
	 * @When /^the user sends HTTP method "([^"]*)" to API endpoint "([^"]*)" with body$/
	 * @Given /^the user has sent HTTP method "([^"]*)" to API endpoint "([^"]*)" with body$/
	 * @param string $verb
	 * @param string $url
	 * @param \Behat\Gherkin\Node\TableNode $body
	 */
	public function sendingToWith($verb, $url, $body) {
		
		/**
		 * array of the data to be sent in the body.
		 * contains $body data converted to an array 
		 * 
		 * @var array $bodyArray
		 */
		$bodyArray = [];
		if ($body instanceof \Behat\Gherkin\Node\TableNode) {
			$bodyArray = $body->getRowsHash();
		}

		if ($this->currentUser !== 'UNAUTHORIZED_USER') {
			$user = $this->currentUser;
			$password = $this->getPasswordForUser($user);
		} else {
			$user = null;
			$password = null;
		}

		$this->response = OcsApiHelper::sendRequest(
			$this->baseUrlWithoutOCSAppendix(),
			$user, $password, $verb, $url, $bodyArray, $this->apiVersion
		);

	}

	/**
	 * @When /^user "([^"]*)" sends HTTP method "([^"]*)" to URL "([^"]*)"$/
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 */
	public function userSendsHTTPMethodToUrl($user, $verb, $url) {
		$this->sendingToWithDirectUrl($user, $verb, $url, null);
	}

	/**
	 * @param string $user
	 * @param string $verb
	 * @param string $url
	 * @param \Behat\Gherkin\Node\TableNode $body
	 */
	public function sendingToWithDirectUrl($user, $verb, $url, $body) {
		$fullUrl = substr($this->baseUrl, 0, -5) . $url;
		$client = new Client();
		$options = [];
		$options['auth'] = $this->getAuthOptionForUser($user);

		if (!empty($this->cookieJar->toArray())) {
			$options['cookies'] = $this->cookieJar;
		}

		if ($body instanceof \Behat\Gherkin\Node\TableNode) {
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
	 * @param string $possibleUrl
	 * @param string $finalPart
	 * @return bool
	 */
	public function isExpectedUrl($possibleUrl, $finalPart) {
		$baseUrlChopped = $this->baseUrlWithoutOCSAppendix();
		$endCharacter = strlen($baseUrlChopped) + strlen($finalPart);
		return (substr($possibleUrl,0,$endCharacter) == "$baseUrlChopped" . "$finalPart");
	}

	/**
	 * @Then /^the OCS status code should be "([^"]*)"$/
	 * @param int $statusCode
	 */
	public function theOCSStatusCodeShouldBe($statusCode) {
		PHPUnit_Framework_Assert::assertEquals($statusCode, $this->getOCSResponseStatusCode($this->response));
	}

	/**
	 * @Then /^the HTTP status code should be "([^"]*)"$/
	 * @param int $statusCode
	 */
	public function theHTTPStatusCodeShouldBe($statusCode) {
		PHPUnit_Framework_Assert::assertEquals($statusCode, $this->response->getStatusCode());
	}

	/**
	 * @Then /^the XML "([^"]*)" "([^"]*)" value should be "([^"]*)"$/
	 * @param string $key1
	 * @param string $key2
	 * @param string $idText
	 */
	public function theXMLKey1Key2ValueShouldBe($key1, $key2, $idText) {
		PHPUnit_Framework_Assert::assertEquals(
			$idText,
			$this->getXMLKey1Key2Value($this->response, $key1, $key2)
		);
	}

	/**
	 * @Then /^the XML "([^"]*)" "([^"]*)" "([^"]*)" value should be "([^"]*)"$/
	 * @param string $key1
	 * @param string $key2
	 * @param string $key3
	 * @param string $idText
	 */
	public function theXMLKey1Key2Key3ValueShouldBe($key1, $key2, $key3, $idText) {
		PHPUnit_Framework_Assert::assertEquals(
			$idText,
			$this->getXMLKey1Key2Key3Value($this->response, $key1, $key2, $key3)
		);
	}

	/**
	 * @Then /^the XML "([^"]*)" "([^"]*)" "([^"]*)" "([^"]*)" attribute value should be a valid version string$/
	 * @param string $key1
	 * @param string $key2
	 * @param string $key3
	 * @param string $attribute
	 */
	public function theXMLKey1Key2AttributeValueShouldBe($key1, $key2, $key3, $attribute) {
		$value = $this->getXMLKey1Key2Key3AttributeValue($this->response, $key1, $key2, $key3, $attribute);
		PHPUnit_Framework_Assert::assertTrue(
			version_compare($value, '0.0.1') >= 0,
			'attribute ' . $attribute . ' value ' . $value . ' is not a valid version string'
		);
	}

	/**
	 * @param ResponseInterface $response
	 */
	private function extracRequestTokenFromResponse(ResponseInterface $response) {
		$this->requestToken = substr(preg_replace('/(.*)data-requesttoken="(.*)">(.*)/sm', '\2', $response->getBody()->getContents()), 0, 89);
	}

	/**
	 * @When /^user "([^"]*)" logs in to a web-style session using the API$/
	 * @Given /^user "([^"]*)" has logged in to a web-style session using the API$/
	 * @param string $user
	 */
	public function userHasLoggedInToAWebStyleSessionUsingTheAPI($user) {
		$loginUrl = substr($this->baseUrl, 0, -5) . '/login';
		// Request a new session and extract CSRF token
		$client = new Client();
		$response = $client->get(
			$loginUrl,
			[
				'cookies' => $this->cookieJar,
			]
		);
		$this->extracRequestTokenFromResponse($response);

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
		$this->extracRequestTokenFromResponse($response);
	}

	/**
	 * @When sending a :method to :url with requesttoken
	 * @param string $method
	 * @param string $url
	 */
	public function sendingAToWithRequesttoken($method, $url) {
		$baseUrl = substr($this->baseUrl, 0, -5);

		$client = new Client();
		$request = $client->createRequest(
			$method,
			$baseUrl . $url,
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
	 * @When sending a :method to :url without requesttoken
	 * @param string $method
	 * @param string $url
	 */
	public function sendingAToWithoutRequesttoken($method, $url) {
		$baseUrl = substr($this->baseUrl, 0, -5);

		$client = new Client();
		$request = $client->createRequest(
			$method,
			$baseUrl . $url,
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
	 */
	public static function removeFile($path, $filename) {
		if (file_exists("$path" . "$filename")) {
			unlink("$path" . "$filename");
		}
	}

	/**
	 * @Given user :user has modified text of :filename with text :text
	 * @param string $user
	 * @param string $filename
	 * @param string $text
	 */
	public function modifyTextOfFile($user, $filename, $text) {
		self::removeFile($this->getUserHome($user) . "/files", "$filename");
		file_put_contents($this->getUserHome($user) . "/files" . "$filename", "$text");
	}

	/**
	 * @param string $name
	 * @param string $size
	 */
	public function createFileSpecificSize($name, $size) {
		$file = fopen("work/" . "$name", 'w');
		fseek($file, $size - 1 ,SEEK_CUR);
		fwrite($file,'a'); // write a dummy char at SIZE position
		fclose($file);
	}

	/**
	 * @param string $name
	 * @param string $text
	 */
	public function createFileWithText($name, $text) {
		$file = fopen("work/" . "$name", 'w');
		fwrite($file, $text);
		fclose($file);
	}

	/**
	 * @Given file :filename of size :size has been created in local storage
	 * @param string $filename
	 * @param string $size
	 */
	public function fileHasBeenCreatedInLocalStorageWithSize($filename, $size) {
		$this->createFileSpecificSize("local_storage/$filename", $size);
	}

	/**
	 * @Given file :filename with text :text has been created in local storage
	 * @param string $filename
	 * @param string $text
	 */
	public function fileHasBeenCreatedInLocalStorageWithText($filename, $text) {
		$this->createFileWithText("local_storage/$filename", $text);
	}

	/**
	 * @Given file :filename has been deleted in local storage
	 * @param string $filename
	 */
	public function fileHasBeenDeletedInLocalStorage($filename) {
		unlink("work/local_storage/$filename");
	}

	/**
	 * @return string
	 */
	public function getAdminUserName() {
		return (string) $this->adminUser[0];
	}

	/**
	 * @return string
	 */
	public function getAdminPassword() {
		return (string) $this->adminUser[1];
	}

	/**
	 * @param string $userName
	 * @return string
	 */
	public function getPasswordForUser($userName) {
		if ($userName === $this->getAdminUserName()) {
			return (string) $this->getAdminPassword();
		} else {
			return (string) $this->regularUserPassword;
		}
	}

	/**
	 * @param string $userName
	 * @return array
	 */
	public function getAuthOptionForUser($userName) {
		return [$userName, $this->getPasswordForUser($userName)];
	}

	/**
	 * @return array
	 */
	public function getAuthOptionForAdmin() {
		return $this->getAuthOptionForUser($this->getAdminUserName());
	}

	/**
	 * @When the admin requests status.php using the API
	 */
	public function getStatusPhp(){
		$fullUrl = $this->baseUrlWithoutOCSAppendix() . "status.php";
		$client = new Client();
		$options = [];
		$options['auth'] = $this->getAuthOptionForUser('admin');
		try {
			$this->response = $client->send($client->createRequest('GET', $fullUrl, $options));
		} catch (BadResponseException $ex) {
			$this->response = $ex->getResponse();
		}
	}

	/**
	 * @Then the json responded should match with
	 * @param PyStringNode $jsonExpected
	 */
	public function jsonRespondedShouldMatch(PyStringNode $jsonExpected) {
		$jsonExpectedEncoded = json_encode($jsonExpected->getRaw());
		$jsonRespondedEncoded = json_encode((string) $this->response->getBody());
		PHPUnit\Framework\Assert::assertEquals($jsonExpectedEncoded, $jsonRespondedEncoded);
	}

	/**
	 * @Then the status.php response should match with
	 * @param PyStringNode $jsonExpected
	 */
	public function statusPhpRespondedShouldMatch(PyStringNode $jsonExpected) {
		$jsonExpectedDecoded = json_decode($jsonExpected->getRaw(), true);
		$jsonRespondedEncoded = json_encode(json_decode($this->response->getBody(), true));
		if ($this->runOcc(['status']) === 0) {
			$output = explode("- ", $this->lastStdOut);
			$version = explode(": ", $output[2]);
			PHPUnit_Framework_Assert::assertEquals("version", $version[0]);
			$versionString = explode(": ", $output[3]);
			PHPUnit_Framework_Assert::assertEquals("versionstring", $versionString[0]);
			$jsonExpectedDecoded['version'] = trim($version[1]);
			$jsonExpectedDecoded['versionstring'] = trim($versionString[1]);
			$jsonExpectedEncoded = json_encode($jsonExpectedDecoded);
		} else {
			PHPUnit_Framework_Assert::fail('Cannot get version variables from occ');
		}
		PHPUnit\Framework\Assert::assertEquals($jsonExpectedEncoded, $jsonRespondedEncoded);
	}

	/**
	 * @BeforeScenario @local_storage
	 */
	public static function removeFilesFromLocalStorageBefore() {
		$dir = "./work/local_storage/";
		$di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
		$ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);
		foreach ( $ri as $file ) {
			$file->isDir() ?  rmdir($file) : unlink($file);
		}
	}

	/**
	 * @AfterScenario @local_storage
	 */
	public static function removeFilesFromLocalStorageAfter() {
		$dir = "./work/local_storage/";
		$di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
		$ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);
		foreach ( $ri as $file ) {
			$file->isDir() ?  rmdir($file) : unlink($file);
		}
	}

	/**
	 * @BeforeSuite
	 * @param BeforeSuiteScope $scope
	 */
	public static function useBigFileIDs(BeforeSuiteScope $scope) {
		$fullUrl = getenv('TEST_SERVER_URL') . "/v1.php/apps/testing/api/v1/increasefileid";
		$client = new Client();
		$options = [];
		$adminCredentials = $scope->getSuite()->getSettings()['contexts'][0][__CLASS__]['admin'];
		$options['auth'] = $adminCredentials;
		$client->send($client->createRequest('post', $fullUrl, $options));
	}
}

