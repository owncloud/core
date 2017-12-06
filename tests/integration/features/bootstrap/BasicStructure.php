<?php

use Behat\Gherkin\Node\PyStringNode;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
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
	 * @Given /^using api version "([^"]*)"$/
	 * @param string $version
	 */
	public function usingApiVersion($version) {
		$this->apiVersion = $version;
	}

	/**
	 * @Given /^as an "([^"]*)"$/
	 * @param string $user
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
	 * @When /^sending "([^"]*)" to "([^"]*)"$/
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
	public function getOCSResponse($response) {
		return $this->getResponseXml($response)->meta[0]->statuscode;
	}

	/**
	 * Parses the response as XML
	 *
	 * @param ResponseInterface $response
	 * @return SimpleXMLElement
	 */
	public function getResponseXml($response = null) {
		if ($response === null) {
			$response = $this->response;
		}
		// rewind just to make sure we can re-parse it in case it was parsed already...
		$response->getBody()->rewind();
		return new SimpleXMLElement($response->getBody()->getContents());
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
		return $this->getResponseXml($response)->$key1->$key2;
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
		return $this->getResponseXml($response)->$key1->$key2->$key3;
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
		return (string) $this->getResponseXml($response)->$key1->$key2->$key3->attributes()->$attribute;
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
	 * @When /^sending "([^"]*)" to "([^"]*)" with$/
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
			if ($this->currentUser === 'admin') {
				$password = $this->adminUser[1];
			} else {
				$password = $this->regularUser;
			}
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
	 * @When /^sending "([^"]*)" with exact url to "([^"]*)"$/
	 * @param string $verb
	 * @param string $url
	 */
	public function sendingToDirectUrl($verb, $url) {
		$this->sendingToWithDirectUrl($verb, $url, null);
	}

	public function sendingToWithDirectUrl($verb, $url, $body) {
		$fullUrl = substr($this->baseUrl, 0, -5) . $url;
		$client = new Client();
		$options = [];
		if ($this->currentUser === 'admin') {
			$options['auth'] = $this->adminUser;
		} else {
			$options['auth'] = [$this->currentUser, $this->regularUser];
		}

		if (!empty($this->cookieJar->toArray())) {
			$options['cookies'] = $this->cookieJar;
		}

		if ($body instanceof \Behat\Gherkin\Node\TableNode) {
			$fd = $body->getRowsHash();
			$options['form_params'] = $fd;
		}

		try {
			$headers = [];
			if (isset($this->requestToken)) {
				$headers['requesttoken'] = $this->requestToken;
			}
			$request = new Request($verb, $fullUrl, $headers);
			$this->response = $client->send($request, $options);
		} catch (\GuzzleHttp\Exception\ClientException $ex) {
			$this->response = $ex->getResponse();
		}
	}

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
		PHPUnit_Framework_Assert::assertEquals($statusCode, $this->getOCSResponse($this->response));
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
	 * @param string $idText
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
	 * @Given logging in using web as :user
	 * @param string $user
	 */
	public function loggingInUsingWebAs($user) {
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
		$password = ($user === 'admin') ? 'admin' : '123456';
		$client = new Client();
		$response = $client->post(
			$loginUrl,
			[
				'form_params' => [
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
		$request = new Request(
			$method,
			$baseUrl . $url,
			['requesttoken' => $this->requestToken]
		);
		$options = [
				'cookies' => $this->cookieJar,
		];
		try {
			$this->response = $client->send($request, $options);
		} catch (\GuzzleHttp\Exception\ClientException $e) {
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
		$request = new Request($method, $baseUrl . $url);
		$options = [
			'cookies' => $this->cookieJar,
		];
		try {
			$this->response = $client->send($request, $options);
		} catch (\GuzzleHttp\Exception\ClientException $e) {
			$this->response = $e->getResponse();
		}
	}

	public static function removeFile($path, $filename) {
		if (file_exists("$path" . "$filename")) {
			unlink("$path" . "$filename");
		}
	}

	/**
	 * @Given user :user modifies text of :filename with text :text
	 * @param string $user
	 * @param string $filename
	 * @param string $text
	 */
	public function modifyTextOfFile($user, $filename, $text) {
		self::removeFile($this->getUserHome($user) . "/files", "$filename");
		file_put_contents($this->getUserHome($user) . "/files" . "$filename", "$text");
	}

	public function createFileSpecificSize($name, $size) {
		$file = fopen("work/" . "$name", 'w');
		fseek($file, $size - 1 ,SEEK_CUR);
		fwrite($file,'a'); // write a dummy char at SIZE position
		fclose($file);
	}

	public function createFileWithText($name, $text) {
		$file = fopen("work/" . "$name", 'w');
		fwrite($file, $text);
		fclose($file);
	}

	/**
	 * @Given file :filename of size :size is created in local storage
	 * @param string $filename
	 * @param string $size
	 */
	public function fileIsCreatedInLocalStorageWithSize($filename, $size) {
		$this->createFileSpecificSize("local_storage/$filename", $size);
	}

	/**
	 * @Given file :filename with text :text is created in local storage
	 * @param string $filename
	 * @param string $text
	 */
	public function fileIsCreatedInLocalStorageWithText($filename, $text) {
		$this->createFileWithText("local_storage/$filename", $text);
	}

	/**
	 * @Given file :filename is deleted in local storage
	 * @param string $filename
	 */
	public function fileIsDeletedInLocalStorage($filename) {
		unlink("work/local_storage/$filename");
	}

	/**
	 * @param string $userName
	 * @return string
	 */
	private function getPasswordForUser($userName) {
		if ($userName === 'admin') {
			return (string) $this->adminUser[1];
		} else {
			return (string) $this->regularUser;
		}
	}

	/**
	 * @When requesting status.php
	 */
	public function getStatusPhp(){
		$fullUrl = $this->baseUrlWithoutOCSAppendix() . "status.php";
		$client = new Client();
		$options = [];
		$options['auth'] = $this->adminUser;
		try {
			$this->response = $client->send(new Request('GET', $fullUrl), $options);
		} catch (\GuzzleHttp\Exception\ClientException $ex) {
			$this->response = $ex->getResponse();
		}
	}

	/**
	 * @Then the json responded should match with
	 */
	public function jsonRespondedShouldMatch(PyStringNode $jsonExpected) {
		$jsonExpectedEncoded = json_encode($jsonExpected->getRaw());
		$jsonRespondedEncoded = json_encode((string) $this->response->getBody());
		PHPUnit\Framework\Assert::assertEquals($jsonExpectedEncoded, $jsonRespondedEncoded);
	}

	/**
	 * @Then the status.php with versions fixed responded should match with
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
	 */
	public static function useBigFileIDs(BeforeSuiteScope $scope) {
		$fullUrl = getenv('TEST_SERVER_URL') . "/v1.php/apps/testing/api/v1/increasefileid";
		$client = new Client();
		$options = [];
		$adminCredentials = $scope->getSuite()->getSettings()['contexts'][0][__CLASS__]['admin'];
		$options['auth'] = $adminCredentials;
		$client->send(new Request('POST', $fullUrl), $options);
	}
}

