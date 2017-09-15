<?php

use GuzzleHttp\Client;
use GuzzleHttp\Message\ResponseInterface;

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

	public function __construct($baseUrl, $admin, $regular_user_password, $mailhog_url) {

		// Initialize your context here
		$this->baseUrl = $baseUrl;
		$this->adminUser = $admin;
		$this->regularUser = $regular_user_password;
		$this->mailhogUrl = $mailhog_url;
		$this->localBaseUrl = $this->baseUrl;
		$this->remoteBaseUrl = $this->baseUrl;
		$this->currentServer = 'LOCAL';
		$this->cookieJar = new \GuzzleHttp\Cookie\CookieJar();

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
		return $response->xml()->meta[0]->statuscode;
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
		$fullUrl = $this->baseUrl . "v{$this->apiVersion}.php" . $url;
		$client = new Client();
		$options = [];
		if ($this->currentUser !== 'UNAUTHORIZED_USER') {
			if ($this->currentUser === 'admin') {
				$options['auth'] = $this->adminUser;
			} else {
				$options['auth'] = [$this->currentUser, $this->regularUser];
			}
		}
		if ($body instanceof \Behat\Gherkin\Node\TableNode) {
			$fd = $body->getRowsHash();
			$options['body'] = $fd;
		}

		try {
			$this->response = $client->send($client->createRequest($verb, $fullUrl, $options));
		} catch (\GuzzleHttp\Exception\ClientException $ex) {
			$this->response = $ex->getResponse();
		}
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
			$options['body'] = $fd;
		}

		try {
			$request = $client->createRequest($verb, $fullUrl, $options);
			if (isset($this->requestToken)) {
				$request->addHeader('requesttoken', $this->requestToken);
			}
			$this->response = $client->send($request);
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
		$request = $client->createRequest(
			$method,
			$baseUrl . $url,
			[
				'cookies' => $this->cookieJar,
			]
		);
		try {
			$this->response = $client->send($request);
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
	public static function useBigFileIDs() {
		$fullUrl = getenv('TEST_SERVER_URL') . "/v1.php/apps/testing/api/v1/increasefileid";
		$client = new Client();
		$options = [];
		$options['auth'] = ['admin','admin'];
		$client->send($client->createRequest('post', $fullUrl, $options));
	}
}

