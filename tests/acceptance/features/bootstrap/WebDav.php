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
use GuzzleHttp\Message\ResponseInterface;
use GuzzleHttp\Ring\Exception\ConnectException;
use GuzzleHttp\Stream\StreamInterface;
use Guzzle\Http\Exception\BadResponseException;
use Sabre\DAV\Client as SClient;
use Sabre\DAV\Xml\Property\ResourceType;
use Sabre\Xml\LibXMLException;
use TestHelpers\OcsApiHelper;
use TestHelpers\SetupHelper;
use TestHelpers\UploadHelper;
use TestHelpers\WebDavHelper;
use TestHelpers\HttpRequestHelper;
use Sabre\DAV\Xml\Property\Complex;

require __DIR__ . '/../../../../lib/composer/autoload.php';

/**
 * WebDav functions
 */
trait WebDav {

	/**
	 * @var string
	 */
	private $davPath = "remote.php/webdav";
	/**
	 * @var boolean
	 */
	private $usingOldDavPath = true;
	/**
	 * @var ResponseInterface[]
	 */
	private $uploadResponses;
	/**
	 * @var array map with user as key and another map as value,
	 *            which has path as key and etag as value
	 */
	private $storedETAG = null;
	/**
	 * @var integer
	 */
	private $storedFileID = null;

	/**
	 * @var int
	 */
	private $lastUploadTime = null;

	/**
	 * a variable that contains the dav path without "remote.php/(web)dav"
	 * when setting $this->davPath directly by usingDavPath()
	 *
	 * @var string
	 */
	private $customDavPath = null;

	private $oldAsyncSetting = null;
	
	private $oldDavSlowdownSetting = null;
	
	/**
	 * response content parsed from XML to an array
	 *
	 * @var array
	 */
	private $responseXml = [];

	private $httpRequestTimeout = 0;

	private $chunkingToUse = null;

	/**
	 * @Given /^using dav path "([^"]*)"$/
	 *
	 * @param string $davPath
	 *
	 * @return void
	 */
	public function usingDavPath($davPath) {
		$this->davPath = $davPath;
		$this->customDavPath = \preg_replace(
			"/remote\.php\/(web)?dav\//", "", $davPath
		);
	}

	/**
	 * @return string
	 */
	public function getOldDavPath() {
		return "remote.php/webdav";
	}

	/**
	 * @return string
	 */
	public function getNewDavPath() {
		return "remote.php/dav";
	}

	/**
	 * @Given /^using (old|new) (?:dav|DAV) path$/
	 *
	 * @param string $oldOrNewDavPath
	 *
	 * @return void
	 */
	public function usingOldOrNewDavPath($oldOrNewDavPath) {
		if ($oldOrNewDavPath === 'old') {
			$this->usingOldDavPath();
		} else {
			$this->usingNewDavPath();
		}
	}

	/**
	 * Select the old DAV path as the default for later scenario steps
	 *
	 * @return void
	 */
	public function usingOldDavPath() {
		$this->davPath = $this->getOldDavPath();
		$this->usingOldDavPath = true;
		$this->customDavPath = null;
	}

	/**
	 * Select the new DAV path as the default for later scenario steps
	 *
	 * @return void
	 */
	public function usingNewDavPath() {
		$this->davPath = $this->getNewDavPath();
		$this->usingOldDavPath = false;
		$this->customDavPath = null;
	}

	/**
	 * @param string $user
	 *
	 * @return string
	 */
	public function getDavFilesPath($user) {
		if ($this->usingOldDavPath === true) {
			return $this->davPath;
		} else {
			return "$this->davPath/files/$user";
		}
	}

	/**
	 * gives the dav path of a file including the subfolder of the webserver
	 * e.g. when the server runs in `http://localhost/owncloud/`
	 * this function will return `owncloud/remote.php/webdav/prueba.txt`
	 *
	 * @param string $user
	 *
	 * @return string
	 */
	public function getFullDavFilesPath($user) {
		return \ltrim(
			$this->getBasePath() . "/" . $this->getDavFilesPath($user), "/"
		);
	}

	/**
	 * Select a suitable dav path version number.
	 * Some endpoints have only existed since a certain point in time, so for
	 * those make sure to return a DAV path version that works for that endpoint.
	 * Otherwise return the currently selected DAV path version.
	 *
	 * @param string $for the category of endpoint that the dav path will be used for
	 *
	 * @return int DAV path version (1 or 2) selected, or appropriate for the endpoint
	 */
	public function getDavPathVersion($for = null) {
		if ($for === 'systemtags') {
			// systemtags only exists since dav v2
			return 2;
		}

		if ($this->usingOldDavPath === true) {
			return 1;
		} else {
			return 2;
		}
	}

	/**
	 * Select a suitable dav path.
	 * Some endpoints have only existed since a certain point in time, so for
	 * those make sure to return a DAV path that works for that endpoint.
	 * Otherwise return the currently selected DAV path.
	 *
	 * @param string $for the category of endpoint that the dav path will be used for
	 *
	 * @return string DAV path selected, or appropriate for the endpoint
	 */
	public function getDavPath($for = null) {
		if ($this->getDavPathVersion($for) === 1) {
			return $this->getOldDavPath();
		}

		return $this->getNewDavPath();
	}

	/**
	 * parses the body content of $response and sets $this->responseXml
	 *
	 * @param ResponseInterface|null $response if null $this->response will be used
	 *
	 * @return void
	 */
	public function parseResponseIntoXml($response = null) {
		if ($response === null) {
			$response = $this->response;
		}
		$body = $response->getBody()->getContents();
		if ($body && \substr($body, 0, 1) === '<') {
			try {
				$reader = new Sabre\Xml\Reader();
				$reader->xml($body);
				$this->responseXml = $reader->parse();
			} catch (LibXMLException $e) {
				// Sometimes the body can be a real page of HTML and text.
				// So it may not be a complete ordinary piece of XML.
				// The XML parse might fail with an exception message like:
				// Opening and ending tag mismatch: link line 31 and head.
				$this->responseXml = [];
			}
		}
	}

	/**
	 * @param string $user
	 * @param string $method
	 * @param string $path
	 * @param array $headers
	 * @param StreamInterface $body
	 * @param string $type
	 * @param string|null $requestBody
	 * @param string|null $davPathVersion
	 * @param bool $stream Set to true to stream a response rather
	 *                     than download it all up-front.
	 * @param string|null $password
	 *
	 * @return ResponseInterface
	 */
	public function makeDavRequest(
		$user,
		$method,
		$path,
		$headers,
		$body = null,
		$type = "files",
		$requestBody = null,
		$davPathVersion = null,
		$stream = false,
		$password = null
	) {
		if ($this->customDavPath !== null) {
			$path = $this->customDavPath . $path;
		}

		if ($davPathVersion === null) {
			$davPathVersion = $this->getDavPathVersion();
		}

		if ($password === null) {
			$password  = $this->getPasswordForUser($user);
		}
		return WebDavHelper::makeDavRequest(
			$this->getBaseUrl(),
			$user, $password, $method,
			$path, $headers, $body, $requestBody, $davPathVersion,
			$type, null, "basic", $stream, $this->httpRequestTimeout
		);
	}

	/**
	 * @Given /^the administrator has (enabled|disabled) async operations$/
	 *
	 * @param string $enabledOrDisabled
	 *
	 * @return void
	 * @throws Exception
	 */
	public function triggerAsyncUpload($enabledOrDisabled) {
		$switch = ($enabledOrDisabled !== "disabled");
		if ($switch) {
			$value = 'true';
		} else {
			$value = 'false';
		}
		if ($this->oldAsyncSetting === null) {
			$oldAsyncSetting = SetupHelper::runOcc(
				['config:system:get', 'dav.enable.async']
			)['stdOut'];
			$this->oldAsyncSetting = \trim($oldAsyncSetting);
		}
		$this->runOcc(
			[
				'config:system:set',
				'dav.enable.async',
				'--type',
				'boolean',
				'--value',
				$value
			]
		);
	}

	/**
	 * @Given the HTTP-Request-timeout is set to :seconds seconds
	 *
	 * @param int $timeout
	 *
	 * @return void
	 */
	public function setHttpTimeout($timeout) {
		$this->httpRequestTimeout = (int)$timeout;
	}

	/**
	 * @Given the :method dav requests are slowed down by :seconds seconds
	 *
	 * @param string $method
	 * @param int $seconds
	 *
	 * @throws Exception
	 * @return void
	 */
	public function slowdownDavRequests($method, $seconds) {
		if ($this->oldDavSlowdownSetting === null) {
			$oldDavSlowdownSetting = SetupHelper::runOcc(
				['config:system:get', 'dav.slowdown']
			)['stdOut'];
			$this->oldDavSlowdownSetting = \trim($oldDavSlowdownSetting);
		}
		OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			"PUT",
			"/apps/testing/api/v1/davslowdown/$method/$seconds"
		);
	}

	/**
	 * @param string $user
	 * @param string $fileDestination
	 *
	 * @return string
	 */
	private function destinationHeaderValue($user, $fileDestination) {
		$fullUrl = $this->getBaseUrl() . '/' . $this->getDavFilesPath($user);
		return $fullUrl . '/' . \ltrim($fileDestination, '/');
	}

	/**
	 * @Given /^user "([^"]*)" has moved (?:file|folder|entry) "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $fileSource
	 * @param string $fileDestination
	 *
	 * @return void
	 */
	public function userHasMovedFile(
		$user, $fileSource, $fileDestination
	) {
		$headers['Destination'] = $this->destinationHeaderValue(
			$user, $fileDestination
		);
		$this->response = $this->makeDavRequest(
			$user, "MOVE", $fileSource, $headers
		);
		PHPUnit_Framework_Assert::assertEquals(
			201, $this->response->getStatusCode()
		);
	}

	/**
	 * @Given /^the user has moved (?:file|folder|entry) "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $fileSource
	 * @param string $fileDestination
	 *
	 * @return void
	 */
	public function theUserHasMovedFile($fileSource, $fileDestination) {
		$this->userHasMovedFile($this->getCurrentUser(), $fileSource, $fileDestination);
	}

	/**
	 * @When /^user "([^"]*)" moves (?:file|folder|entry) "([^"]*)"\s?(asynchronously|) to "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $fileSource
	 * @param string $type "asynchronously" or empty
	 * @param string $fileDestination
	 *
	 * @return void
	 */
	public function userMovesFileUsingTheAPI(
		$user, $fileSource, $type, $fileDestination
	) {
		$headers = [
			'Destination' => $this->destinationHeaderValue(
				$user, $fileDestination
			)
		];
		$stream = false;
		if ($type === "asynchronously") {
			$headers['OC-LazyOps'] = 'true';
			if ($this->httpRequestTimeout > 0) {
				//LazyOps is set and a request timeout, so we want to use stream
				//to be able to read data from the request before its times out
				//when doing LazyOps the server does not close the connection
				//before its really finished
				//but we want to read JobStatus-Location before the end of the job
				//to see if it reports the correct values
				$stream = true;
			}
		}
		try {
			$this->response = $this->makeDavRequest(
				$user, "MOVE", $fileSource, $headers, null, "files", null, null, $stream
			);
			$this->parseResponseIntoXml();
		} catch (ConnectException $e) {
		}
	}

	/**
	 * @When /^user "([^"]*)" on "(LOCAL|REMOTE)" moves (?:file|folder|entry) "([^"]*)" to "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $server
	 * @param string $fileSource
	 * @param string $fileDestination
	 *
	 * @return void
	 */
	public function userOnMovesFileUsingTheAPI(
		$user, $server, $fileSource, $fileDestination
	) {
		$previousServer = $this->usingServer($server);
		$this->userMovesFileUsingTheAPI($user, $fileSource, "", $fileDestination);
		$this->usingServer($previousServer);
	}

	/**
	 * @When /^user "([^"]*)" copies file "([^"]*)" to "([^"]*)" using the WebDAV API$/
	 * @Given /^user "([^"]*)" has copied file "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $fileSource
	 * @param string $fileDestination
	 *
	 * @return void
	 */
	public function userCopiesFileUsingTheAPI(
		$user, $fileSource, $fileDestination
	) {
		$headers['Destination'] = $this->destinationHeaderValue(
			$user, $fileDestination
		);
		$this->response = $this->makeDavRequest(
			$user, "COPY", $fileSource, $headers
		);
		$this->parseResponseIntoXml();
	}

	/**
	 * @When /^the user copies file "([^"]*)" to "([^"]*)" using the WebDAV API$/
	 * @Given /^the user has copied file "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $fileSource
	 * @param string $fileDestination
	 *
	 * @return void
	 */
	public function theUserCopiesFileUsingTheAPI($fileSource, $fileDestination) {
		$this->userCopiesFileUsingTheAPI($this->getCurrentUser(), $fileSource, $fileDestination);
	}

	/**
	 * @When /^the user downloads file "([^"]*)" with range "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $fileSource
	 * @param string $range
	 *
	 * @return void
	 */
	public function downloadFileWithRange($fileSource, $range) {
		$this->userDownloadsFileWithRange(
			$this->currentUser, $fileSource, $range
		);
	}

	/**
	 * @When /^user "([^"]*)" downloads file "([^"]*)" with range "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $fileSource
	 * @param string $range
	 *
	 * @return void
	 */
	public function userDownloadsFileWithRange($user, $fileSource, $range) {
		$headers['Range'] = $range;
		$this->response = $this->makeDavRequest(
			$user, "GET", $fileSource, $headers
		);
	}

	/**
	 * @When /^the public downloads the last public shared file with range "([^"]*)" using the public WebDAV API$/
	 *
	 * @param string $range
	 *
	 * @return void
	 */
	public function downloadPublicFileWithRange($range) {
		$token = $this->lastShareData->data->token;
		$fullUrl = $this->getBaseUrl() . "/public.php/webdav";
		$headers = [
			'X-Requested-With' => 'XMLHttpRequest',
			'Range' => $range
		];
		$this->response = HttpRequestHelper::get($fullUrl, $token, "", $headers);
	}

	/**
	 * @When /^the public downloads file "([^"]*)" from inside the last public shared folder with range "([^"]*)" using the public WebDAV API$/
	 *
	 * @param string $path
	 * @param string $range
	 *
	 * @return void
	 */
	public function downloadPublicFileInsideAFolderWithRange($path, $range) {
		$fullUrl = $this->getBaseUrl() . "/public.php/webdav$path";
		$headers = [
			'X-Requested-With' => 'XMLHttpRequest',
			'Range' => $range
		];
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->lastShareData->data->token, "", $headers
		);
	}

	/**
	 * @When /^the public downloads file "([^"]*)" from inside the last public shared folder with password "([^"]*)" with range "([^"]*)" using the public WebDAV API$/
	 *
	 * @param string $path
	 * @param string $password
	 * @param string $range
	 *
	 * @return void
	 */
	public function publicDownloadsTheFileInsideThePublicSharedFolderWithPassword(
		$path, $password, $range
	) {
		$path = \ltrim($path, "/");
		$password = $this->getActualPassword($password);
		$fullUrl = $this->getBaseUrl() . "/public.php/webdav/$path";
		$headers = [
			'X-Requested-With' => 'XMLHttpRequest',
			'Range' => $range
		];
		$this->response = HttpRequestHelper::get(
			$fullUrl, $this->lastShareData->data->token, $password, $headers
		);
	}
	
	/**
	 * @Then /^the public should be able to download the range "([^"]*)" of file "([^"]*)" from inside the last public shared folder with password "([^"]*)" and the content should be "([^"]*)"$/
	 *
	 * @param string $range
	 * @param string $path
	 * @param string $password
	 * @param string $content
	 *
	 * @return void
	 */
	public function shouldBeAbleToDownloadFileInsidePublicSharedFolderWithPassword(
		$range, $path, $password, $content
	) {
		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPassword(
			$path, $password, $range
		);
		$this->downloadedContentShouldBe($content);
	}

	/**
	 * @Then /^the public should be able to download the range "([^"]*)" of file "([^"]*)" from inside the last public shared folder and the content should be "([^"]*)"$/
	 *
	 * @param string $range
	 * @param string $path
	 * @param string $content
	 *
	 * @return void
	 */
	public function shouldBeAbleToDownloadFileInsidePublicSharedFolder(
		$range, $path, $content
	) {
		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPassword(
			$path, null, $range
		);
		$this->downloadedContentShouldBe($content);
	}

	/**
	 * @Then /^user "([^"]*)" using password "([^"]*)" should not be able to download file "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $password
	 * @param string $fileName
	 *
	 * @return void
	 */
	public function userUsingPasswordShouldNotBeAbleToDownloadFile(
		$user, $password, $fileName
	) {
		$user = $this->getActualUsername($user);
		$password = $this->getActualPassword($password);
		$this->downloadFileAsUserUsingPassword($user, $fileName, $password);
		PHPUnit_Framework_Assert::assertGreaterThanOrEqual(
			400, $this->getResponse()->getStatusCode(), 'download must fail'
		);
		PHPUnit_Framework_Assert::assertLessThanOrEqual(
			499, $this->getResponse()->getStatusCode(), '4xx error expected'
		);
	}

	/**
	 * @Then /^user "([^"]*)" should be able to access a skeleton file$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userShouldBeAbleToAccessASkeletonFile($user) {
		$this->contentOfFileForUserShouldBePlusEndOfLine(
			"textfile0.txt", $user, "ownCloud test text file 0"
		);
	}

	/**
	 * @Then /^the downloaded content should be "([^"]*)"$/
	 *
	 * @param string $content
	 *
	 * @return void
	 */
	public function downloadedContentShouldBe($content) {
		PHPUnit_Framework_Assert::assertEquals(
			$content, (string)$this->response->getBody()
		);
	}

	/**
	 * @Then /^the downloaded content should be "([^"]*)" plus end-of-line$/
	 *
	 * @param string $content
	 *
	 * @return void
	 */
	public function downloadedContentShouldBePlusEndOfLine($content) {
		$this->downloadedContentShouldBe("$content\n");
	}

	/**
	 * @Then /^the content of file "([^"]*)" should be "([^"]*)"$/
	 *
	 * @param string $fileName
	 * @param string $content
	 *
	 * @return void
	 */
	public function contentOfFileShouldBe($fileName, $content) {
		$this->theUserDownloadsTheFileUsingTheAPI($fileName);
		$this->downloadedContentShouldBe($content);
	}

	/**
	 * @Then /^the content of file "([^"]*)" should be:$/
	 *
	 * @param string $fileName
	 * @param PyStringNode $content
	 *
	 * @return void
	 */
	public function contentOfFileShouldBePyString(
		$fileName, PyStringNode $content
	) {
		$this->contentOfFileShouldBe($fileName, $content->getRaw());
	}

	/**
	 * @Then /^the content of file "([^"]*)" should be "([^"]*)" plus end-of-line$/
	 *
	 * @param string $fileName
	 * @param string $content
	 *
	 * @return void
	 */
	public function contentOfFileShouldBePlusEndOfLine($fileName, $content) {
		$this->theUserDownloadsTheFileUsingTheAPI($fileName);
		$this->downloadedContentShouldBePlusEndOfLine($content);
	}

	/**
	 * @Then /^the content of file "([^"]*)" for user "([^"]*)" should be "([^"]*)"$/
	 *
	 * @param string $fileName
	 * @param string $user
	 * @param string $content
	 *
	 * @return void
	 */
	public function contentOfFileForUserShouldBe($fileName, $user, $content) {
		$this->downloadFileAsUserUsingPassword($user, $fileName);
		$this->downloadedContentShouldBe($content);
	}

	/**
	 * @Then /^the content of file "([^"]*)" for user "([^"]*)" on server "([^"]*)" should be "([^"]*)"$/
	 *
	 * @param string $fileName
	 * @param string $user
	 * @param string $server
	 * @param string $content
	 *
	 * @return void
	 */
	public function theContentOfFileForUserOnServerShouldBe(
		$fileName, $user, $server, $content
	) {
		$previousServer = $this->usingServer($server);
		$this->contentOfFileForUserShouldBe($fileName, $user, $content);
		$this->usingServer($previousServer);
	}

	/**
	 * @Then /^the content of file "([^"]*)" for user "([^"]*)" using password "([^"]*)" should be "([^"]*)"$/
	 *
	 * @param string $fileName
	 * @param string $user
	 * @param string $password
	 * @param string $content
	 *
	 * @return void
	 */
	public function contentOfFileForUserUsingPasswordShouldBe(
		$fileName, $user, $password, $content
	) {
		$user = $this->getActualUsername($user);
		$password = $this->getActualPassword($password);
		$this->downloadFileAsUserUsingPassword($user, $fileName, $password);
		$this->downloadedContentShouldBe($content);
	}

	/**
	 * @Then /^the content of file "([^"]*)" for user "([^"]*)" should be:$/
	 *
	 * @param string $fileName
	 * @param string $user
	 * @param PyStringNode $content
	 *
	 * @return void
	 */
	public function contentOfFileForUserShouldBePyString(
		$fileName, $user, PyStringNode $content
	) {
		$this->contentOfFileForUserShouldBe($fileName, $user, $content->getRaw());
	}

	/**
	 * @Then /^the content of file "([^"]*)" for user "([^"]*)" using password "([^"]*)" should be:$/
	 *
	 * @param string $fileName
	 * @param string $user
	 * @param string $password
	 * @param PyStringNode $content
	 *
	 * @return void
	 */
	public function contentOfFileForUserUsingPasswordShouldBePyString(
		$fileName, $user, $password, PyStringNode $content
	) {
		$this->contentOfFileForUserUsingPasswordShouldBe(
			$fileName, $user, $password, $content->getRaw()
		);
	}

	/**
	 * @Then /^the content of file "([^"]*)" for user "([^"]*)" should be "([^"]*)" plus end-of-line$/
	 *
	 * @param string $fileName
	 * @param string $user
	 * @param string $content
	 *
	 * @return void
	 */
	public function contentOfFileForUserShouldBePlusEndOfLine($fileName, $user, $content) {
		$this->contentOfFileForUserShouldBe(
			$fileName, $user, "$content\n"
		);
	}

	/**
	 * @Then /^the content of file "([^"]*)" for user "([^"]*)" on server "([^"]*)" should be "([^"]*)" plus end-of-line$/
	 *
	 * @param string $fileName
	 * @param string $user
	 * @param string $server
	 * @param string $content
	 *
	 * @return void
	 */
	public function theContentOfFileForUserOnServerShouldBePlusEndOfLine(
		$fileName, $user, $server, $content
	) {
		$previousServer = $this->usingServer($server);
		$this->contentOfFileForUserShouldBePlusEndOfLine($fileName, $user, $content);
		$this->usingServer($previousServer);
	}

	/**
	 * @Then /^the content of file "([^"]*)" for user "([^"]*)" using password "([^"]*)" should be "([^"]*)" plus end-of-line$/
	 *
	 * @param string $fileName
	 * @param string $user
	 * @param string $password
	 * @param string $content
	 *
	 * @return void
	 */
	public function contentOfFileForUserUsingPasswordShouldBePlusEndOfLine(
		$fileName, $user, $password, $content
	) {
		$this->contentOfFileForUserUsingPasswordShouldBe(
			$fileName, $user, $password, "$content\n"
		);
	}

	/**
	 * @Then /^the downloaded content when downloading file "([^"]*)" with range "([^"]*)" should be "([^"]*)"$/
	 *
	 * @param string $fileSource
	 * @param string $range
	 * @param string $content
	 *
	 * @return void
	 */
	public function downloadedContentWhenDownloadingWithRangeShouldBe(
		$fileSource, $range, $content
	) {
		$this->downloadFileWithRange($fileSource, $range);
		$this->downloadedContentShouldBe($content);
	}

	/**
	 * @Then /^the downloaded content when downloading file "([^"]*)" for user "([^"]*)" with range "([^"]*)" should be "([^"]*)"$/
	 *
	 * @param string $fileSource
	 * @param string $user
	 * @param string $range
	 * @param string $content
	 *
	 * @return void
	 */
	public function downloadedContentWhenDownloadingForUserWithRangeShouldBe(
		$fileSource, $user, $range, $content
	) {
		$this->userDownloadsFileWithRange($user, $fileSource, $range);
		$this->downloadedContentShouldBe($content);
	}

	/**
	 * @When the user downloads the file :fileName using the WebDAV API
	 *
	 * @param string $fileName
	 *
	 * @return void
	 */
	public function theUserDownloadsTheFileUsingTheAPI($fileName) {
		$this->downloadFileAsUserUsingPassword($this->currentUser, $fileName);
	}

	/**
	 * @When user :user downloads file :fileName using the WebDAV API
	 *
	 * @param string $user
	 * @param string $fileName
	 *
	 * @return void
	 */
	public function userDownloadsFileUsingTheAPI(
		$user, $fileName
	) {
		$this->downloadFileAsUserUsingPassword($user, $fileName);
	}

	/**
	 * @When user :user using password :password downloads the file :fileName using the WebDAV API
	 *
	 * @param string $user
	 * @param string|null $password
	 * @param string $fileName
	 *
	 * @return void
	 */
	public function userUsingPasswordDownloadsTheFileUsingTheAPI(
		$user, $password, $fileName
	) {
		$this->downloadFileAsUserUsingPassword($user, $fileName, $password);
	}

	/**
	 * @param string $user
	 * @param string $fileName
	 * @param string|null $password
	 *
	 * @return void
	 */
	public function downloadFileAsUserUsingPassword(
		$user, $fileName, $password = null
	) {
		$password = $this->getActualPassword($password);
		$this->response = $this->makeDavRequest(
			$user,
			'GET',
			$fileName,
			[],
			null,
			"files",
			null,
			null,
			false,
			$password
		);
	}

	/**
	 * @Then the following headers should be set
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theFollowingHeadersShouldBeSet(TableNode $table) {
		foreach ($table->getTable() as $header) {
			$headerName = $header[0];
			$expectedHeaderValue = $header[1];
			$returnedHeader = $this->response->getHeader($headerName);

			if (\strpos($expectedHeaderValue, "%productname%") !== false) {
				$productName = $this->getProductNameFromStatus();
				$expectedHeaderValue = \str_replace("%productname%", $productName, $expectedHeaderValue);
			}

			if ($returnedHeader !== $expectedHeaderValue) {
				throw new \Exception(
					\sprintf(
						"Expected value '%s' for header '%s', got '%s'",
						$expectedHeaderValue,
						$headerName,
						$returnedHeader
					)
				);
			}
		}
	}

	/**
	 * @Then the downloaded content should start with :start
	 *
	 * @param string $start
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function downloadedContentShouldStartWith($start) {
		if (\strpos($this->response->getBody()->getContents(), $start) !== 0) {
			throw new \Exception(
				\sprintf(
					"Expected '%s', got '%s'",
					$start,
					$this->response->getBody()->getContents()
				)
			);
		}
	}

	/**
	 * @Then the oc job status values of last request for user :user should match these regular expressions
	 *
	 * @param string $user
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function jobStatusValuesShouldMatchRegEx($user, $table) {
		$url = $this->response->getHeader("OC-JobStatus-Location");
		$url = $this->getBaseUrlWithoutPath() . $url;
		$response = HttpRequestHelper::get($url, $user, $this->getPasswordForUser($user));
		$result = \json_decode($response->getBody()->getContents(), true);
		PHPUnit_Framework_Assert::assertNotNull($result, "'$response' is not valid JSON");
		foreach ($table->getTable() as $row) {
			$expectedKey = $row[0];
			PHPUnit_Framework_Assert::assertArrayHasKey(
				$expectedKey, $result, "response does not have expected key '$expectedKey'"
			);
			$expectedValue = $this->substituteInLineCodes(
				$row[1], ['preg_quote' => ['/'] ]
			);
			PHPUnit_Framework_Assert::assertNotFalse(
				(bool)\preg_match($expectedValue, $result[$expectedKey]),
				"'$expectedValue' does not match '$result[$expectedKey]'"
			);
		}
	}

	/**
	 * @When /^user "([^"]*)" gets the properties of (?:file|folder|entry) "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 */
	public function userGetsThePropertiesOfFolder(
		$user, $path
	) {
		$this->response = $this->listFolder(
			$user, $path, 0, []
		);
	}

	/**
	 * @When /^user "([^"]*)" gets the following properties of (?:file|folder|entry) "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $path
	 * @param TableNode|null $propertiesTable
	 *
	 * @return void
	 */
	public function userGetsPropertiesOfFolder(
		$user, $path, $propertiesTable
	) {
		$properties = null;
		if ($propertiesTable instanceof TableNode) {
			foreach ($propertiesTable->getRows() as $row) {
				$properties[] = $row[0];
			}
		}
		$this->response = $this->listFolder(
			$user, $path, 0, $properties
		);
	}

	/**
	 * @When /^the user gets the following properties of (?:file|folder|entry) "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $path
	 * @param TableNode|null $propertiesTable
	 *
	 * @return void
	 */
	public function theUserGetsPropertiesOfFolder($path, $propertiesTable) {
		$this->userGetsPropertiesOfFolder($this->getCurrentUser(), $path, $propertiesTable);
	}

	/**
	 * @When user :user gets a custom property :propertyName of file :path
	 *
	 * @param string $user
	 * @param string $propertyName
	 * @param string $path
	 *
	 * @return void
	 */
	public function userGetsPropertiesOfFile($user, $propertyName, $path) {
		$client = $this->getSabreClient($user);
		$properties = [
			   $propertyName
		];
		$this->response = $client->propfind(
			$this->makeSabrePath($user, $path), $properties
		);
	}

	/**
	 * @When /^user "([^"]*)" sets property "([^"]*)" of (?:file|folder|entry) "([^"]*)" to\s?(complex|) "([^"]*)" using the WebDAV API$/
	 * @Given /^user "([^"]*)" has set property "([^"]*)" of (?:file|folder|entry) "([^"]*)" to\s?(complex|) "([^"]*)"$/
	 *
	 * @param string $user user id who sets the property
	 * @param string $propertyName name of property in Clark notation
	 * @param string $path path on which to set properties to
	 * @param string $complex if set to "complex", will parse the property value with the Complex type
	 * @param string $propertyValue property value
	 *
	 * @return void
	 */
	public function userHasSetPropertyOfEntryTo(
		$user, $propertyName, $path, $complex, $propertyValue
	) {
		$client = $this->getSabreClient($user);
		if ($complex === 'complex') {
			$propertyValue = new Complex($propertyValue);
		}
		$properties = [
				$propertyName => $propertyValue
		];
		$client->proppatch($this->makeSabrePath($user, $path), $properties);
	}

	/**
	 * @Then /^the response should contain a custom "([^"]*)" property with "([^"]*)"$/
	 *
	 * @param string $propertyName
	 * @param string $propertyValue
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theResponseShouldContainACustomPropertyWithValue(
		$propertyName, $propertyValue
	) {
		$keys = $this->response;
		if (!\array_key_exists($propertyName, $keys)) {
			throw new \Exception("Cannot find property \"$propertyName\"");
		}
		if ($keys[$propertyName] !== $propertyValue) {
			throw new \Exception(
				"\"$propertyName\" has a value \"${keys[$propertyName]}\" but \"$propertyValue\" expected"
			);
		}
	}

	/**
	 * @Then /^as "([^"]*)" (file|folder|entry) "([^"]*)" should not exist$/
	 *
	 * @param string $user
	 * @param string $entry
	 * @param string $path
	 *
	 * @return array
	 * @throws \Exception
	 */
	public function asFileOrFolderShouldNotExist($user, $entry, $path) {
		$client = $this->getSabreClient($user);
		$response = $client->request(
			'HEAD', $this->makeSabrePath($user, $path)
		);
		if ($response['statusCode'] !== 404) {
			throw new \Exception(
				"$entry '$path' expected to not exist (status code {$response['statusCode']}, expected 404)"
			);
		}

		return $response;
	}

	/**
	 * @Then /^as "([^"]*)" (file|folder|entry) "([^"]*)" should exist$/
	 *
	 * @param string $user
	 * @param string $entry
	 * @param string $path
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function asFileOrFolderShouldExist($user, $entry, $path) {
		$this->response = $this->listFolder($user, $path, 0);
		try {
			$this->thePropertiesResponseShouldContainAnEtag();
		} catch (\Exception $e) {
			throw new \Exception(
				"$entry '$path' expected to exist but not found"
			);
		}
	}

	/**
	 * @Then /^the properties response should contain an etag$/
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function thePropertiesResponseShouldContainAnEtag() {
		if (!\is_array($this->response) || !isset($this->response['{DAV:}getetag'])) {
			throw new \Exception(
				"getetag not found in response"
			);
		}
	}

	/**
	 * @Then the single response should contain a property :key with value :value
	 *
	 * @param string $key
	 * @param string $expectedValue
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theSingleResponseShouldContainAPropertyWithValue(
		$key, $expectedValue
	) {
		$this->theSingleResponseShouldContainAPropertyWithValueAndAlternative(
			$key, $expectedValue, $expectedValue
		);
	}

	/**
	 * @Then the single response should contain a property :key with value :value or with value :altValue
	 *
	 * @param string $key
	 * @param string $expectedValue
	 * @param string $altExpectedValue
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theSingleResponseShouldContainAPropertyWithValueAndAlternative(
		$key, $expectedValue, $altExpectedValue
	) {
		$keys = $this->response;
		if (!\array_key_exists($key, $keys)) {
			throw new \Exception(
				"Cannot find property \"$key\" with \"$expectedValue\""
			);
		}

		$value = $keys[$key];
		if ($value instanceof ResourceType) {
			$value = $value->getValue();
			if (empty($value)) {
				$value = '';
			} else {
				$value = $value[0];
			}
		}

		if ($expectedValue === "a_comment_url") {
			$basePath = \ltrim($this->getBasePath() . "/", "/");
			$expected = "#^/{$basePath}remote.php/dav/comments/files/([0-9]+)$#";
			if (\preg_match($expected, $value)) {
				return;
			} else {
				throw new \Exception(
					"Property \"$key\" found with value \"$value\", expected \"$expectedValue\""
				);
			}
		}

		if ($value != $expectedValue && $value != $altExpectedValue) {
			throw new \Exception(
				"Property \"$key\" found with value \"$value\", expected \"$expectedValue\""
			);
		}
	}

	/**
	 * @Then /^as user "([^"]*)" (?:file|folder|entry) "([^"]*)" should contain a property "([^"]*)" with value "([^"]*)" or with value "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $property
	 * @param string $expectedValue
	 * @param string $altExpectedValue
	 *
	 * @return void
	 */
	public function asUserFolderShouldContainAPropertyWithValueOrWithValue(
		$user, $path, $property, $expectedValue, $altExpectedValue
	) {
		$this->response = $this->listFolder(
			$user, $path, 0, [$property]
		);
		$this->theSingleResponseShouldContainAPropertyWithValueAndAlternative(
			$property, $expectedValue, $altExpectedValue
		);
	}

	/**
	 * @Then /^as user "([^"]*)" (?:file|folder|entry) "([^"]*)" should contain a property "([^"]*)" with value "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $property
	 * @param string $value
	 *
	 * @return void
	 */
	public function asUserFolderShouldContainAPropertyWithValue(
		$user, $path, $property, $value
	) {
		$this->asUserFolderShouldContainAPropertyWithValueOrWithValue(
			$user, $path, $property, $value, $value
		);
	}

	/**
	 * @Then /^as user "([^"]*)" the (?:file|folder|entry) "([^"]*)" should be favorited$/
	 *
	 * @param string $user
	 * @param string $path
	 * @param integer $expectedValue 0|1
	 *
	 * @return void
	 */
	public function asUserTheFileOrFolderShouldBeFavorited($user, $path, $expectedValue = 1) {
		$property = "{http://owncloud.org/ns}favorite";
		$this->asUserFolderShouldContainAPropertyWithValue(
			$user, $path, $property, $expectedValue
		);
	}

	/**
	 * @Then /^as user "([^"]*)" (?:file|folder|entry) "([^"]*)" should not be favorited$/
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 */
	public function asUserFileShouldNotBeFavorited($user, $path) {
		$this->asUserTheFileOrFolderShouldBeFavorited($user, $path, 0);
	}

	/**
	 * @Then /^as the user (?:file|folder|entry) "([^"]*)" should be favorited$/
	 *
	 * @param string $path
	 * @param integer $expectedValue 0|1
	 *
	 * @return void
	 */
	public function asTheUserFileOrFolderShouldBeFavorited($path, $expectedValue = 1) {
		$this->asUserTheFileOrFolderShouldBeFavorited($this->getCurrentUser(), $path, $expectedValue);
	}

	/**
	 * @Then /^as the user (?:file|folder|entry) "([^"]*)" should not be favorited$/
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function asTheUserFileOrFolderShouldNotBeFavorited($path) {
		$this->asTheUserFileOrFolderShouldBeFavorited($path, 0);
	}

	/**
	 * @Then the single response should contain a property :key with value like :regex
	 *
	 * @param string $key
	 * @param string $regex
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theSingleResponseShouldContainAPropertyWithValueLike(
		$key, $regex
	) {
		$keys = $this->response;
		if (!\array_key_exists($key, $keys)) {
			throw new \Exception("Cannot find property \"$key\" with \"$regex\"");
		}

		$value = $keys[$key];
		if ($value instanceof ResourceType) {
			$value = $value->getValue();
			if (empty($value)) {
				$value = '';
			} else {
				$value = $value[0];
			}
		}

		if (!\preg_match($regex, $value)) {
			throw new \Exception(
				"Property \"$key\" found with value \"$value\", expected \"$regex\""
			);
		}
	}

	/**
	 * @Then the response should contain a share-types property with
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theResponseShouldContainAShareTypesPropertyWith($table) {
		$keys = $this->response;
		if (!\array_key_exists('{http://owncloud.org/ns}share-types', $keys)) {
			throw new \Exception(
				"Cannot find property \"{http://owncloud.org/ns}share-types\""
			);
		}

		$foundTypes = [];
		$data = $keys['{http://owncloud.org/ns}share-types'];
		foreach ($data as $item) {
			if ($item['name'] !== '{http://owncloud.org/ns}share-type') {
				throw new \Exception(
					"Invalid property found: '{$item['name']}'"
				);
			}

			$foundTypes[] = $item['value'];
		}

		foreach ($table->getRows() as $row) {
			$key = \array_search($row[0], $foundTypes);
			if ($key === false) {
				throw new \Exception("Expected type {$row[0]} not found");
			}

			unset($foundTypes[$key]);
		}

		if ($foundTypes !== []) {
			throw new \Exception(
				"Found more share types than specified: $foundTypes"
			);
		}
	}

	/**
	 * @Then the response should contain an empty property :property
	 *
	 * @param string $property
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theResponseShouldContainAnEmptyProperty($property) {
		$properties = $this->response;
		if (!\array_key_exists($property, $properties)) {
			throw new \Exception("Cannot find property \"$property\"");
		}

		if ($properties[$property] !== null) {
			throw new \Exception("Property \"$property\" is not empty");
		}
	}

	/**
	 * Returns the elements of a propfind
	 *
	 * @param string $user
	 * @param string $path
	 * @param int $folderDepth requires 1 to see elements without children
	 * @param array|null $properties
	 *
	 * @return array|\Sabre\HTTP\ResponseInterface
	 */
	public function listFolder($user, $path, $folderDepth, $properties = null) {
		$client = $this->getSabreClient($user);
		if (!$properties) {
			$properties = [
				'{DAV:}getetag'
			];
		}

		try {
			$response = $client->propfind(
				$this->makeSabrePath($user, $path), $properties, $folderDepth
			);
		} catch (Sabre\HTTP\ClientHttpException $e) {
			$response = $e->getResponse();
		}
		return $response;
	}

	/**
	 * @param string $user
	 * @param string $path
	 * @param int $folderDepth
	 * @param array|null $properties
	 *
	 * @return array|\Sabre\HTTP\ResponseInterface
	 */
	public function listVersionFolder(
		$user, $path, $folderDepth, $properties = null
	) {
		$client = $this->getSabreClient($user);
		if (!$properties) {
			$properties = [
				'{DAV:}getetag'
			];
		}

		try {
			$response = $client->propfind(
				$this->makeSabrePathNotForFiles($path), $properties, $folderDepth
			);
		} catch (Sabre\HTTP\ClientHttpException $e) {
			$response = $e->getResponse();
		}
		return $response;
	}

	/**
	 * @Then the version folder of file :path for user :user should contain :count element(s)
	 *
	 * @param string $path
	 * @param string $user
	 * @param int $count
	 *
	 * @return void
	 */
	public function theVersionFolderOfFileShouldContainElements(
		$path, $user, $count
	) {
		$fileId = $this->getFileIdForPath($user, $path);
		$elements = $this->listVersionFolder($user, "/meta/$fileId/v", 1);
		PHPUnit_Framework_Assert::assertEquals($count, \count($elements) - 1);
	}

	/**
	 * @Then the version folder of fileId :fileId for user :user should contain :count element(s)
	 *
	 * @param int $fileId
	 * @param string $user
	 * @param int $count
	 *
	 * @return void
	 */
	public function theVersionFolderOfFileIdShouldContainElements(
		$fileId, $user, $count
	) {
		$elements = $this->listVersionFolder($user, "/meta/$fileId/v", 1);
		PHPUnit_Framework_Assert::assertEquals($count, \count($elements) - 1);
	}

	/**
	 * @Then the content length of file :path with version index :index for user :user in versions folder should be :length
	 *
	 * @param string $path
	 * @param int $index
	 * @param string $user
	 * @param int $length
	 *
	 * @return void
	 */
	public function theContentLengthOfFileForUserInVersionsFolderIs(
		$path, $index, $user, $length
	) {
		$fileId = $this->getFileIdForPath($user, $path);
		$elements = $this->listVersionFolder(
			$user, "/meta/$fileId/v", 1, ['{DAV:}getcontentlength']
		);
		$elements = \array_values($elements);
		PHPUnit_Framework_Assert::assertEquals(
			$length, $elements[$index]['{DAV:}getcontentlength']
		);
	}

	/**
	 * Returns the elements of a report command
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $properties properties which needs to be included in the report
	 * @param string $filterRules filter-rules to choose what needs to appear in the report
	 * @param int|null $offset
	 * @param int|null $limit
	 *
	 * @return array
	 */
	public function reportFolder(
		$user, $path, $properties, $filterRules, $offset = null, $limit = null
	) {
		$client = $this->getSabreClient($user);

		$body = '<?xml version="1.0" encoding="utf-8" ?>
					<oc:filter-files xmlns:a="DAV:" xmlns:oc="http://owncloud.org/ns" >
						<a:prop>
							' . $properties . '
						</a:prop>
						<oc:filter-rules>
							' . $filterRules . '
						</oc:filter-rules>';
		if (\is_int($offset) || \is_int($limit)) {
			$body .=	'
						<oc:search>';
			if (\is_int($offset)) {
				$body .= "
							<oc:offset>${offset}</oc:offset>";
			}
			if (\is_int($limit)) {
				$body .= "
							<oc:limit>${limit}</oc:limit>";
			}
			$body .=	'
						</oc:search>';
		}
		$body .= '
					</oc:filter-files>';

		$response = $client->request(
			'REPORT', $this->makeSabrePath($user, $path), $body
		);
		$parsedResponse = $client->parseMultistatus($response['body']);
		return $parsedResponse;
	}

	/**
	 * Returns the elements of a report command special for comments
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $properties properties which needs to be included in the report
	 *
	 * @return array
	 *
	 * @throws Sabre\HTTP\ClientException, - in case a curl error occurred.
	 */
	public function reportElementComments($user, $path, $properties) {
		$client = $this->getSabreClient($user);

		$body = '<?xml version="1.0" encoding="utf-8" ?>
							 <oc:filter-comments xmlns:a="DAV:" xmlns:oc="http://owncloud.org/ns" >
									' . $properties . '
							 </oc:filter-comments>';

		$response = $client->request(
			'REPORT', $this->makeSabrePathNotForFiles($path), $body
		);

		$parsedResponse = $client->parseMultistatus($response['body']);
		return $parsedResponse;
	}

	/**
	 * @param string $user
	 * @param string $path
	 *
	 * @return string
	 */
	public function makeSabrePath($user, $path) {
		return $this->encodePath(
			$this->getDavFilesPath($user) . '/' . \ltrim($path, '/')
		);
	}

	/**
	 * @param string $path
	 *
	 * @return string
	 */
	public function makeSabrePathNotForFiles($path) {
		return $this->encodePath($this->getDavPath() . $path);
	}

	/**
	 * @param string $user
	 *
	 * @return SClient
	 */
	public function getSabreClient($user) {
		return WebDavHelper::getSabreClient(
			$this->getBaseUrl(),
			$user,
			$this->getPasswordForUser($user)
		);
	}

	/**
	 * @Then /^user "([^"]*)" should (not|)\s?see the following elements$/
	 *
	 * @param string $user
	 * @param string $shouldOrNot
	 * @param TableNode $elements
	 *
	 * @throws InvalidArgumentException
	 *
	 * @return void
	 */
	public function userShouldSeeTheElements($user, $shouldOrNot, $elements) {
		$should = ($shouldOrNot !== "not");
		$this->checkElementList($user, $elements, $should);
	}

	/**
	 * asserts that a the user can or cannot see a list of files/folders by propfind
	 *
	 * @param string $user
	 * @param TableNode $elements
	 * @param boolean $expectedToBeListed
	 *
	 * @throws InvalidArgumentException
	 *
	 * @return void
	 */
	public function checkElementList(
		$user, $elements, $expectedToBeListed = true
	) {
		if (!($elements instanceof TableNode)) {
			throw new InvalidArgumentException(
				'$expectedElements has to be an instance of TableNode'
			);
		}
		$elementList = $this->listFolder($user, '/', 3);
		$elementRows = $elements->getRows();
		$elementsSimplified = $this->simplifyArray($elementRows);
		foreach ($elementsSimplified as $expectedElement) {
			$webdavPath = "/" . $this->getFullDavFilesPath($user) . $expectedElement;
			if (!\array_key_exists($webdavPath, $elementList) && $expectedToBeListed) {
				PHPUnit_Framework_Assert::fail(
					"$webdavPath is not in propfind answer but should"
				);
			} elseif (\array_key_exists($webdavPath, $elementList) && !$expectedToBeListed) {
				PHPUnit_Framework_Assert::fail(
					"$webdavPath is in propfind answer but should not be"
				);
			}
		}
	}

	/**
	 * @When user :user uploads file :source to :destination using the WebDAV API
	 * @Given user :user has uploaded file :source to :destination
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 */
	public function userUploadsAFileTo($user, $source, $destination) {
		$file = \GuzzleHttp\Stream\Stream::factory(
			\fopen(
				$this->acceptanceTestsDirLocation() . $source,
				'r'
			)
		);
		$this->response = $this->makeDavRequest(
			$user, "PUT", $destination, [], $file
		);
		$this->parseResponseIntoXml();
	}

	/**
	 * @When the user uploads file :source to :destination using the WebDAV API
	 * @Given the user has uploaded file :source to :destination
	 *
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 */
	public function theUserUploadsAFileTo($source, $destination) {
		$this->userUploadsAFileTo($this->currentUser, $source, $destination);
	}

	/**
	 * @When /^user "([^"]*)" on "(LOCAL|REMOTE)" uploads file "([^"]*)" to "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $server
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 */
	public function userOnUploadsAFileTo($user, $server, $source, $destination) {
		$previousServer = $this->usingServer($server);
		$this->userUploadsAFileTo($user, $source, $destination);
		$this->usingServer($previousServer);
	}

	/**
	 * @When /^user "([^"]*)" uploads file "([^"]*)" to "([^"]*)" in (\d+) chunks (?:with (new|old|v1|v2) chunking and)?\s?using the WebDAV API$/
	 * @When user :user uploads file :source to :destination with chunks using the WebDAV API
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 * @param int $noOfChunks
	 * @param string $chunkingVersion old|v1|new|v2 null for autodetect
	 * @param bool $async use asynchronous move at the end or not
	 *
	 * @return void
	 */
	public function userUploadsAFileToWithChunks(
		$user, $source, $destination, $noOfChunks = 2, $chunkingVersion = null, $async = false
	) {
		PHPUnit_Framework_Assert::assertGreaterThan(
			0, $noOfChunks, "What does it mean to have $noOfChunks chunks?"
		);
		//use the chunking version that works with the set dav version
		if ($chunkingVersion === null) {
			if ($this->usingOldDavPath) {
				$chunkingVersion = "v1";
			} else {
				$chunkingVersion = "v2";
			}
		}
		$this->useSpecificChunking($chunkingVersion);
		PHPUnit_Framework_Assert::assertTrue(
			WebDavHelper::isValidDavChunkingCombination(
				($this->usingOldDavPath) ? 1 : 2,
				$this->chunkingToUse
			),
			"invalid chunking/webdav version combination"
		);

		$headers = [];
		if ($async === true) {
			$headers = ['OC-LazyOps' => 'true'];
		}
		try {
			$this->responseXml = [];
			$this->response = UploadHelper::upload(
				$this->getBaseUrl(),
				$this->getActualUsername($user),
				$this->getUserPassword($user),
				$this->acceptanceTestsDirLocation() . $source,
				$destination,
				$headers,
				($this->usingOldDavPath) ? 1 : 2,
				$this->chunkingToUse,
				$noOfChunks
			);
		} catch (BadResponseException $e) {
			// 4xx and 5xx responses cause an exception
			$this->response = $e->getResponse();
		}
	}

	/**
	 * @When /^user "([^"]*)" uploads file "([^"]*)" asynchronously to "([^"]*)" in (\d+) chunks (?:with (new|old|v1|v2) chunking and)?\s?using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 * @param int  $noOfChunks
	 * @param string $chunkingVersion old|v1|new|v2 null for autodetect
	 *
	 * @return void
	 */
	public function userUploadsAFileAsyncToWithChunks(
		$user, $source, $destination, $noOfChunks = 2, $chunkingVersion = null
	) {
		$this->userUploadsAFileToWithChunks(
			$user, $source, $destination, $noOfChunks, $chunkingVersion, true
		);
	}
	 
	/**
	 * sets the chunking version from human readable format
	 *
	 * @param string $version (no|v1|v2|new|old)
	 *
	 * @return void
	 */
	public function useSpecificChunking($version) {
		if ($version === "v1" || $version === "old") {
			$this->chunkingToUse = 1;
		} elseif ($version === "v2" || $version === "new") {
			$this->chunkingToUse = 2;
		} elseif ($version === "no") {
			$this->chunkingToUse = null;
		} else {
			throw new InvalidArgumentException(
				"cannot set chunking version to $version"
			);
		}
	}

	/**
	 * Uploading with old/new dav and chunked/non-chunked.
	 *
	 * @When user :user uploads file :source to :destination with all mechanisms using the WebDAV API
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 */
	public function userUploadsAFileToWithAllMechanisms(
		$user, $source, $destination
	) {
		$this->uploadResponses = $this->uploadWithAllMechanisms(
			$user, $source, $destination, false
		);
	}

	/**
	 * Overwriting with old/new dav and chunked/non-chunked.
	 *
	 * @When user :user overwrites file :source to :destination with all mechanisms using the WebDAV API
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 */
	public function userOverwritesAFileToWithAllMechanisms(
		$user, $source, $destination
	) {
		$this->uploadResponses = $this->uploadWithAllMechanisms(
			$user, $source, $destination, true
		);
	}

	/**
	 * Upload the same file multiple times with different mechanisms.
	 *
	 * @param string $user user who uploads
	 * @param string $source source file path
	 * @param string $destination destination path on the server
	 * @param bool $overwriteMode when false creates separate files to test uploading brand new files,
	 *                            when true it just overwrites the same file over and over again with the same name
	 *
	 * @return array of ResponseInterface
	 */
	public function uploadWithAllMechanisms(
		$user, $source, $destination, $overwriteMode = false
	) {
		$responses = [];
		foreach (['old', 'new'] as $dav) {
			if ($dav === 'old') {
				$this->usingOldDavPath();
			} else {
				$this->usingNewDavPath();
			}

			$suffix = '';

			// regular upload
			if (!$overwriteMode) {
				$suffix = "-{$dav}dav-regular";
			}
			$this->userUploadsAFileTo(
				$user, $source, $destination . $suffix
			);
			$responses[] = $this->response;

			// old chunking upload
			if ($dav === 'old') {
				if (!$overwriteMode) {
					$suffix = "-{$dav}dav-oldchunking";
				}
				
				$this->userUploadsAFileToWithChunks(
					$user, $source, $destination . $suffix, 2, 'old'
				);
				$responses[] = $this->response;
			}
			if ($dav === 'new') {
				if (!$overwriteMode) {
					$suffix = "-{$dav}dav-newchunking";
				}
				$this->userUploadsAFileToWithChunks(
					$user, $source, $destination . $suffix, 2, 'new'
				);
				$responses[] = $this->response;
			}
		}

		return $responses;
	}

	/**
	 * @Then /^the HTTP status code of all upload responses should be "([^"]*)"$/
	 *
	 * @param int $statusCode
	 *
	 * @return void
	 */
	public function theHTTPStatusCodeOfAllUploadResponsesShouldBe($statusCode) {
		foreach ($this->uploadResponses as $response) {
			PHPUnit_Framework_Assert::assertEquals(
				$statusCode,
				$response->getStatusCode(),
				'Response for ' . $response->getEffectiveUrl() . ' did not return expected status code'
			);
		}
	}

	/**
	 * @Then /^the HTTP reason phrase of all upload responses should be "([^"]*)"$/
	 *
	 * @param string $reasonPhase
	 *
	 * @return void
	 */
	public function theHTTPReasonPhraseOfAllUploadResponsesShouldBe($reasonPhase) {
		foreach ($this->uploadResponses as $response) {
			PHPUnit_Framework_Assert::assertEquals(
				$reasonPhase,
				$response->getReasonPhrase(),
				'Response for ' . $response->getEffectiveUrl() . ' did not return expected reason phrase'
			);
		}
	}

	/**
	 * @Then user :user should be able to upload file :source to :destination
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 */
	public function userShouldBeAbleToUploadFileTo($user, $source, $destination) {
		$this->userUploadsAFileTo($user, $source, $destination);
		$this->asFileOrFolderShouldExist($user, null, $destination);
	}

	/**
	 * @Then user :user should not be able to upload file :source to :destination
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 */
	public function theUserShouldNotBeAbleToUploadFileTo($user, $source, $destination) {
		$this->userUploadsAFileTo($user, $source, $destination);
		$this->asFileOrFolderShouldNotExist($user, null, $destination);
	}

	/**
	 * @Then /^the HTTP status code of all upload responses should be between "(\d+)" and "(\d+)"$/
	 *
	 * @param int $minStatusCode
	 * @param int $maxStatusCode
	 *
	 * @return void
	 */
	public function theHTTPStatusCodeOfAllUploadResponsesShouldBeBetween(
		$minStatusCode, $maxStatusCode
	) {
		foreach ($this->uploadResponses as $response) {
			PHPUnit_Framework_Assert::assertGreaterThanOrEqual(
				$minStatusCode,
				$response->getStatusCode(),
				'Response for ' . $response->getEffectiveUrl() . ' did not return expected status code'
			);
			PHPUnit_Framework_Assert::assertLessThanOrEqual(
				$maxStatusCode,
				$response->getStatusCode(),
				'Response for ' . $response->getEffectiveUrl() . ' did not return expected status code'
			);
		}
	}

	/**
	 * Check that all the files uploaded with old/new dav and chunked/non-chunked exist.
	 *
	 * @Then as :user the files uploaded to :destination with all mechanisms should exist
	 *
	 * @param string $user
	 * @param string $destination
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function filesUploadedToWithAllMechanismsShouldExist(
		$user, $destination
	) {
		foreach (['old', 'new'] as $davVersion) {
			foreach (["{$davVersion}dav-regular", "{$davVersion}dav-{$davVersion}chunking"] as $suffix) {
				$this->asFileOrFolderShouldExist(
					$user, 'file', "$destination-$suffix"
				);
			}
		}
	}

	/**
	 * @Then as user :user on server :server the files uploaded to :destination with all mechanisms should exist
	 *
	 * @param string $user
	 * @param string $server
	 * @param string $destination
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function asUserOnServerTheFilesUploadedToWithAllMechanismsShouldExit(
		$user, $server, $destination
	) {
		$previousServer = $this->usingServer($server);
		$this->filesUploadedToWithAllMechanismsShouldExist($user, $destination);
		$this->usingServer($previousServer);
	}

	/**
	 * @Given user :user has uploaded file :destination of :bytes bytes
	 *
	 * @param string $user
	 * @param string $destination
	 * @param string $bytes
	 *
	 * @return void
	 */
	public function userHasUploadedFileToOfBytes($user, $destination, $bytes) {
		$this->userUploadsAFileToOfBytes($user, $destination, $bytes);
		$expectedElements = new TableNode([["$destination"]]);
		$this->checkElementList($user, $expectedElements);
	}

	/**
	 * @When user :user uploads file :destination of :bytes bytes
	 *
	 * @param string $user
	 * @param string $destination
	 * @param string $bytes
	 *
	 * @return void
	 */
	public function userUploadsAFileToOfBytes($user, $destination, $bytes) {
		$filename = "filespecificSize.txt";
		$this->createLocalFileOfSpecificSize($filename, $bytes);
		PHPUnit_Framework_Assert::assertFileExists($this->workStorageDirLocation() . $filename);
		$this->userUploadsAFileTo(
			$user,
			$this->temporaryStorageSubfolderName() . "/$filename",
			$destination
		);
		$this->removeFile($this->workStorageDirLocation(), $filename);
	}

	/**
	 * @When user :user uploads file with content :content to :destination using the WebDAV API
	 * @Given user :user has uploaded file with content :content to :destination
	 *
	 * @param string $user
	 * @param string $content
	 * @param string $destination
	 *
	 * @return string
	 */
	public function userUploadsAFileWithContentTo(
		$user, $content, $destination
	) {
		$file = \GuzzleHttp\Stream\Stream::factory($content);
		$time = \time();
		if ($this->lastUploadTime !== null && $time - $this->lastUploadTime < 1) {
			// prevent creating two uploads with the same "stime" which is
			// based on seconds, this prevents creation of uploads with same etag
			\sleep(1);
		}
		$this->response = $this->makeDavRequest(
			$user, "PUT", $destination, [], $file
		);
		$this->lastUploadTime = \time();
		return $this->response->getHeader('oc-fileid');
	}

	/**
	 * @When user :user uploads file with checksum :checksum and content :content to :destination using the WebDAV API
	 * @Given user :user has uploaded file with checksum :checksum and content :content to :destination
	 *
	 * @param string $user
	 * @param string $checksum
	 * @param string $content
	 * @param string $destination
	 *
	 * @return void
	 */
	public function userUploadsAFileWithChecksumAndContentTo(
		$user, $checksum, $content, $destination
	) {
		$file = \GuzzleHttp\Stream\Stream::factory($content);
		$this->response = $this->makeDavRequest(
			$user,
			"PUT",
			$destination,
			['OC-Checksum' => $checksum],
			$file
		);
	}

	/**
	 * @Given file :file has been deleted for user :user
	 *
	 * @param string $file
	 * @param string $user
	 *
	 * @return void
	 */
	public function fileHasBeenDeleted($file, $user) {
		$this->userDeletesFile($user, $file);
	}

	/**
	 * Wait for 1 second then delete a file/folder to avoid creating trashbin
	 * entries with the same timestamp. Only use this step to avoid the problem
	 * in core issue 23151 when wanting to demonstrate other correct behavior
	 *
	 * @When /^user "([^"]*)" waits and deletes (?:file|folder) "([^"]*)" using the WebDAV API$/
	 * @Given /^user "([^"]*)" has waited and deleted (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $file
	 *
	 * @return void
	 */
	public function userWaitsAndDeletesFile($user, $file) {
		// prevent creating two files in the trashbin with the same timestamp
		// which is based on seconds. e.g. deleting a/file.txt and b/file.txt
		// might result in a name clash file.txt.d1456657282 in the trashbin
		\sleep(1);
		$this->userDeletesFile($user, $file);
	}

	/**
	 * @When /^user "([^"]*)" (?:deletes|unshares) (?:file|folder) "([^"]*)" using the WebDAV API$/
	 * @Given /^user "([^"]*)" has (?:deleted|unshared) (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $file
	 *
	 * @return void
	 */
	public function userDeletesFile($user, $file) {
		$this->response = $this->makeDavRequest($user, 'DELETE', $file, []);
	}

	/**
	 * @When /^the user (?:deletes|unshares) (?:file|folder) "([^"]*)" using the WebDAV API$/
	 * @Given /^the user has (?:deleted|unshared) (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $file
	 *
	 * @return void
	 */
	public function theUserDeletesFile($file) {
		$this->response = $this->makeDavRequest($this->getCurrentUser(), 'DELETE', $file, []);
	}

	/**
	 * @When /^user "([^"]*)" on "(LOCAL|REMOTE)" (?:deletes|unshares) (?:file|folder) "([^"]*)" using the WebDAV API$/
	 * @Given /^user "([^"]*)" on "(LOCAL|REMOTE)" has (?:deleted|unshared) (?:file|folder) "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $server
	 * @param string $file
	 *
	 * @return void
	 */
	public function userOnDeletesFile($user, $server, $file) {
		$previousServer = $this->usingServer($server);
		$this->userDeletesFile($user, $file);
		$this->usingServer($previousServer);
	}

	/**
	 * @When user :user creates a folder :destination using the WebDAV API
	 * @Given user :user has created a folder :destination
	 *
	 * @param string $user
	 * @param string $destination
	 *
	 * @return void
	 */
	public function userCreatesAFolder($user, $destination) {
		$destination = '/' . \ltrim($destination, '/');
		$this->response = $this->makeDavRequest(
			$user, "MKCOL", $destination, []
		);
		$this->parseResponseIntoXml();
	}

	/**
	 * @When the user creates a folder :destination using the WebDAV API
	 * @Given the user has created a folder :destination
	 *
	 * @param string $destination
	 *
	 * @return void
	 */
	public function theUserCreatesAFolder($destination) {
		$this->userCreatesAFolder($this->getCurrentUser(), $destination);
	}

	/**
	 * Old style chunking upload
	 *
	 * @When user :user uploads the following :total chunks to :file with old chunking and using the WebDAV API
	 * @Given user :user has uploaded the following :total chunks to :file with old chunking
	 *
	 * @param string $user
	 * @param string $total
	 * @param string $file
	 * @param TableNode $chunkDetails table of 2 columns, chunk number and chunk
	 *                                content without column headings, e.g.
	 *                                | 1 | first data              |
	 *                                | 2 | followed by second data |
	 *                                Chunks may be numbered out-of-order if desired.
	 *
	 * @return void
	 */
	public function userUploadsTheFollowingTotalChunksUsingOldChunking(
		$user, $total, $file, TableNode $chunkDetails
	) {
		foreach ($chunkDetails->getTable() as $chunkDetail) {
			$chunkNumber = $chunkDetail[0];
			$chunkContent = $chunkDetail[1];
			$this->userUploadsChunkedFile($user, $chunkNumber, $total, $chunkContent, $file);
		}
	}

	/**
	 * Old style chunking upload
	 *
	 * @When user :user uploads the following chunks to :file with old chunking and using the WebDAV API
	 * @Given user :user has uploaded the following chunks to :file with old chunking
	 *
	 * @param string $user
	 * @param string $file
	 * @param TableNode $chunkDetails table of 2 columns, chunk number and chunk
	 *                                content without column headings, e.g.
	 *                                | 1 | first data              |
	 *                                | 2 | followed by second data |
	 *                                Chunks may be numbered out-of-order if desired.
	 *
	 * @return void
	 */
	public function userUploadsTheFollowingChunksUsingOldChunking(
		$user, $file, TableNode $chunkDetails
	) {
		$total = \count($chunkDetails->getRows());
		$this->userUploadsTheFollowingTotalChunksUsingOldChunking(
			$user, $total, $file, $chunkDetails
		);
	}

	/**
	 * Old style chunking upload
	 *
	 * @When user :user uploads chunk file :num of :total with :data to :destination using the WebDAV API
	 * @Given user :user has uploaded chunk file :num of :total with :data to :destination
	 *
	 * @param string $user
	 * @param int $num
	 * @param int $total
	 * @param string $data
	 * @param string $destination
	 *
	 * @return void
	 */
	public function userUploadsChunkedFile(
		$user, $num, $total, $data, $destination
	) {
		$num -= 1;
		$data = \GuzzleHttp\Stream\Stream::factory($data);
		$file = "$destination-chunking-42-$total-$num";
		$this->response = $this->makeDavRequest(
			$user, 'PUT', $file, ['OC-Chunked' => '1'], $data, "uploads"
		);
	}

	/**
	 * New style chunking upload
	 *
	 * @When /^user "([^"]*)" uploads the following chunks\s?(asynchronously|) to "([^"]*)" with new chunking and using the WebDAV API$/
	 * @Given /^user "([^"]*)" has uploaded the following chunks\s?(asynchronously|) to "([^"]*)" with new chunking$/
	 *
	 * @param string $user
	 * @param string $type "asynchronously" or empty
	 * @param string $file
	 * @param TableNode $chunkDetails table of 2 columns, chunk number and chunk
	 *                                content without column headings, e.g.
	 *                                | 1 | first data              |
	 *                                | 2 | followed by second data |
	 *                                Chunks may be numbered out-of-order if desired.
	 *
	 * @return void
	 */
	public function userUploadsTheFollowingChunksUsingNewChunking(
		$user, $type, $file, TableNode $chunkDetails
	) {
		$async = false;
		if ($type === "asynchronously") {
			$async = true;
		}
		$this->userUploadsChunksUsingNewChunking(
			$user, $file, 'chunking-42', $chunkDetails->getTable(), $async
		);
	}

	/**
	 * New style chunking upload
	 *
	 * @param string $user
	 * @param string $file
	 * @param string $chunkingId
	 * @param array $chunkDetails of chunks of the file. Each array entry is
	 *                            itself an array of 2 items:
	 *                            [0] the chunk number
	 *                            [1] data content of the chunk
	 *                            Chunks may be numbered out-of-order if desired.
	 * @param bool $async use asynchronous MOVE at the end or not
	 *
	 * @return void
	 */
	public function userUploadsChunksUsingNewChunking(
		$user, $file, $chunkingId, $chunkDetails, $async = false
	) {
		$this->userCreatesANewChunkingUploadWithId($user, $chunkingId);
		foreach ($chunkDetails as $chunkDetail) {
			$chunkNumber = $chunkDetail[0];
			$chunkContent = $chunkDetail[1];
			$this->userUploadsNewChunkFileOfWithToId($user, $chunkNumber, $chunkContent, $chunkingId);
		}
		$headers = [];
		if ($async === true) {
			$headers = ['OC-LazyOps' => 'true'];
		}
		$this->moveNewDavChunkToFinalFile($user, $chunkingId, $file, $headers);
	}

	/**
	 * @When user :user creates a new chunking upload with id :id using the WebDAV API
	 * @Given user :user has created a new chunking upload with id :id
	 *
	 * @param string $user
	 * @param string $id
	 *
	 * @return void
	 */
	public function userCreatesANewChunkingUploadWithId($user, $id) {
		$destination = "/uploads/$user/$id";
		$this->response = $this->makeDavRequest(
			$user, 'MKCOL', $destination, [], null, "uploads"
		);
	}

	/**
	 * @When user :user uploads new chunk file :num with :data to id :id using the WebDAV API
	 * @Given user :user has uploaded new chunk file :num with :data to id :id
	 *
	 * @param string $user
	 * @param int $num
	 * @param string $data
	 * @param string $id
	 *
	 * @return void
	 */
	public function userUploadsNewChunkFileOfWithToId($user, $num, $data, $id) {
		$data = \GuzzleHttp\Stream\Stream::factory($data);
		$destination = "/uploads/$user/$id/$num";
		$this->response = $this->makeDavRequest(
			$user, 'PUT', $destination, [], $data, "uploads"
		);
	}

	/**
	 * @When /^user "([^"]*)" moves new chunk file with id "([^"]*)"\s?(asynchronously|) to "([^"]*)" using the WebDAV API$/
	 * @Given /^user "([^"]*)" has moved new chunk file with id "([^"]*)"\s?(asynchronously|) to "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $id
	 * @param string $type "asynchronously" or empty
	 * @param string $dest
	 *
	 * @return void
	 */
	public function userMovesNewChunkFileWithIdToMychunkedfile(
		$user, $id, $type, $dest
	) {
		$headers = [];
		if ($type === "asynchronously") {
			$headers = ['OC-LazyOps' => 'true'];
		}
		$this->moveNewDavChunkToFinalFile($user, $id, $dest, $headers);
	}

	/**
	 * @When user :user cancels chunking-upload with id :id using the WebDAV API
	 * @Given user :user has canceled new chunking-upload with id :id
	 *
	 * @param string $user
	 * @param string $id
	 *
	 * @return void
	 */
	public function userCancelsUploadWithId(
		$user, $id
	) {
		$this->deleteUpload($user, $id, []);
	}

	/**
	 * @When /^user "([^"]*)" moves new chunk file with id "([^"]*)"\s?(asynchronously|) to "([^"]*)" with size (.*) using the WebDAV API$/
	 * @Given /^user "([^"]*)" has moved new chunk file with id "([^"]*)"\s?(asynchronously|) to "([^"]*)" with size (.*)$/
	 *
	 * @param string $user
	 * @param string $id
	 * @param string $type "asynchronously" or empty
	 * @param string $dest
	 * @param int $size
	 *
	 * @return void
	 */
	public function userMovesNewChunkFileWithIdToMychunkedfileWithSize(
		$user, $id, $type, $dest, $size
	) {
		$headers = ['OC-Total-Length' => $size];
		if ($type === "asynchronously") {
			$headers['OC-LazyOps'] = 'true';
		}
		$this->moveNewDavChunkToFinalFile(
			$user, $id, $dest, $headers
		);
	}

	/**
	 * @When /^user "([^"]*)" moves new chunk file with id "([^"]*)"\s?(asynchronously|) to "([^"]*)" with checksum "([^"]*)" using the WebDAV API$/
	 * @Given /^user "([^"]*)" has moved new chunk file with id "([^"]*)"\s?(asynchronously|) to "([^"]*)" with checksum "([^"]*)"
	 *
	 * @param string $user
	 * @param string $id
	 * @param string $type "asynchronously" or empty
	 * @param string $dest
	 * @param string $checksum
	 *
	 * @return void
	 */
	public function userMovesNewChunkFileWithIdToMychunkedfileWithChecksum(
		$user, $id, $type, $dest, $checksum
	) {
		$headers = ['OC-Checksum' => $checksum];
		if ($type === "asynchronously") {
			$headers['OC-LazyOps'] = 'true';
		}
		$this->moveNewDavChunkToFinalFile(
			$user, $id, $dest, $headers
		);
	}

	/**
	 * Move chunked new dav file to final file
	 *
	 * @param string $user user
	 * @param string $id upload id
	 * @param string $destination destination path
	 * @param array $headers extra headers
	 *
	 * @return void
	 */
	private function moveNewDavChunkToFinalFile($user, $id, $destination, $headers) {
		$source = "/uploads/$user/$id/.file";
		$headers['Destination'] = $this->destinationHeaderValue(
			$user, $destination
		);

		$this->response = $this->makeDavRequest(
			$user, 'MOVE', $source, $headers, null, "uploads"
		);
	}

	/**
	 * Delete chunked-upload directory
	 *
	 * @param string $user user
	 * @param string $id upload id
	 * @param array $headers extra headers
	 *
	 * @return void
	 */
	private function deleteUpload($user, $id, $headers) {
		$source = "/uploads/$user/$id";
		$this->response = $this->makeDavRequest(
			$user, 'DELETE', $source, $headers, null, "uploads"
		);
	}

	/**
	 * URL encodes the given path but keeps the slashes
	 *
	 * @param string $path to encode
	 *
	 * @return string encoded path
	 */
	public function encodePath($path) {
		// slashes need to stay
		return \str_replace('%2F', '/', \rawurlencode($path));
	}

	/**
	 * @When user :user favorites element :path using the WebDAV API
	 * @Given user :user has favorited element :path
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 * @throws \Sabre\HTTP\ClientException
	 * @throws \Sabre\HTTP\ClientHttpException
	 */
	public function userFavoritesElement($user, $path) {
		$this->response = $this->changeFavStateOfAnElement(
			$user, $path, 1
		);
	}

	/**
	 * @When the user favorites element :path using the WebDAV API
	 * @Given the user has favorited element :path
	 *
	 * @param string $path
	 *
	 * @return void
	 * @throws \Sabre\HTTP\ClientException
	 * @throws \Sabre\HTTP\ClientHttpException
	 */
	public function theUserFavoritesElement($path) {
		$this->response = $this->changeFavStateOfAnElement(
			$this->getCurrentUser(), $path, 1
		);
	}

	/**
	 * @When user :user unfavorites element :path using the WebDAV API
	 * @Given user :user has unfavorited element :path
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 * @throws \Sabre\HTTP\ClientException
	 * @throws \Sabre\HTTP\ClientHttpException
	 */
	public function userUnfavoritesElement($user, $path) {
		$this->response = $this->changeFavStateOfAnElement(
			$user, $path, 0
		);
	}

	/**
	 * @When the user unfavorites element :path using the WebDAV API
	 * @Given the user has unfavorited element :path
	 *
	 * @param string $path
	 *
	 * @return void
	 * @throws \Sabre\HTTP\ClientException
	 * @throws \Sabre\HTTP\ClientHttpException
	 */
	public function theUserUnfavoritesElement($path) {
		$this->response = $this->changeFavStateOfAnElement(
			$this->getCurrentUser(), $path, 0
		);
	}

	/**
	 * Set the elements of a proppatch
	 *
	 * @param string $user
	 * @param string $path
	 * @param int $favOrUnfav 1 = favorite, 0 = unfavorite
	 *
	 * @return bool
	 */
	public function changeFavStateOfAnElement(
		$user, $path, $favOrUnfav
	) {
		$client = $this->getSabreClient($user);
		$properties = [
			'{http://owncloud.org/ns}favorite' => $favOrUnfav
		];

		$response = $client->proppatch(
			$this->getDavFilesPath($user) . $path, $properties
		);
		return $response;
	}

	/**
	 * @When user :user stores etag of element :path using the WebDAV API
	 * @Given user :user has stored etag of element :path
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 */
	public function userStoresEtagOfElement($user, $path) {
		$propertiesTable = new TableNode([['{DAV:}getetag']]);
		$this->userGetsPropertiesOfFolder(
			$user, $path, $propertiesTable
		);
		$pathETAG[$path] = $this->response['{DAV:}getetag'];
		$this->storedETAG[$user] = $pathETAG;
	}

	/**
	 * @Then the etag of element :path of user :user should not have changed
	 *
	 * @param string $path
	 * @param string $user
	 *
	 * @return void
	 */
	public function etagOfElementOfUserShouldNotHaveChanged($path, $user) {
		$propertiesTable = new TableNode([['{DAV:}getetag']]);
		$this->userGetsPropertiesOfFolder(
			$user, $path, $propertiesTable
		);
		PHPUnit_Framework_Assert::assertEquals(
			$this->response['{DAV:}getetag'], $this->storedETAG[$user][$path]
		);
	}

	/**
	 * @Then the etag of element :path of user :user should have changed
	 *
	 * @param string $path
	 * @param string $user
	 *
	 * @return void
	 */
	public function etagOfElementOfUserShouldHaveChanged($path, $user) {
		$propertiesTable = new TableNode([['{DAV:}getetag']]);
		$this->userGetsPropertiesOfFolder(
			$user, $path, $propertiesTable
		);
		PHPUnit_Framework_Assert::assertNotEquals(
			$this->response['{DAV:}getetag'], $this->storedETAG[$user][$path]
		);
	}

	/**
	 * @Then the etag of element :path of user :user on server :server should have changed
	 *
	 * @param string $path
	 * @param string $user
	 * @param string $server
	 *
	 * @return void
	 */
	public function theEtagOfElementOfUserOnServerShouldHaveChanged(
		$path, $user, $server
	) {
		$previousServer = $this->usingServer($server);
		$this->etagOfElementOfUserShouldHaveChanged($path, $user);
		$this->usingServer($previousServer);
	}

	/**
	 * @When an unauthenticated client connects to the dav endpoint using the WebDAV API
	 * @Given an unauthenticated client has connected to the dav endpoint
	 *
	 * @return void
	 */
	public function connectingToDavEndpoint() {
		$this->response = $this->makeDavRequest(
			null, 'PROPFIND', '', []
		);
	}

	/**
	 * @Then there should be no duplicate headers
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function thereAreNoDuplicateHeaders() {
		$headers = $this->response->getHeaders();
		foreach ($headers as $headerName => $headerValues) {
			// if a header has multiple values, they must be different
			if (\count($headerValues) > 1
				&& \count(\array_unique($headerValues)) < \count($headerValues)
			) {
				throw new \Exception("Duplicate header found: $headerName");
			}
		}
	}

	/**
	 * @Then the following headers should not be set
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theFollowingHeadersShouldNotBeSet(TableNode $table) {
		foreach ($table->getTable() as $header) {
			$headerName = $header[0];
			$headerValue = $this->response->getHeader($headerName);
			//Note: according to the documentation of getHeader it must return null
			//if the header does not exist, but its returning an empty string
			PHPUnit_Framework_Assert::assertEmpty(
				$headerValue,
				"header $headerName should not exist " .
				"but does and is set to $headerValue"
			);
		}
	}

	/**
	 * @Then the following headers should match these regular expressions
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function headersShouldMatchRegularExpressions(TableNode $table) {
		foreach ($table->getTable() as $header) {
			$headerName = $header[0];
			$expectedHeaderValue = $header[1];
			$expectedHeaderValue = $this->substituteInLineCodes(
				$expectedHeaderValue, ['preg_quote' => ['/'] ]
			);
			
			$returnedHeader = $this->response->getHeader($headerName);
			PHPUnit_Framework_Assert::assertNotFalse(
				(bool)\preg_match($expectedHeaderValue, $returnedHeader),
				"'$expectedHeaderValue' does not match '$returnedHeader'"
			);
		}
	}

	/**
	 * @Then /^user "([^"]*)" in folder "([^"]*)" should have favorited the following elements$/
	 *
	 * @param string $user
	 * @param string $folder
	 * @param TableNode|null $expectedElements
	 *
	 * @return void
	 */
	public function checkFavoritedElements($user, $folder, $expectedElements) {
		$this->checkFavoritedElementsPaginated(
			$user, $folder, $expectedElements, null, null
		);
	}

	/**
	 * @Then /^the user in folder "([^"]*)" should have favorited the following elements$/
	 *
	 * @param string $folder
	 * @param TableNode|null $expectedElements
	 *
	 * @return void
	 */
	public function checkFavoritedElementsForCurrentUser($folder, $expectedElements) {
		$this->checkFavoritedElementsPaginated(
			$this->getCurrentUser(), $folder, $expectedElements, null, null
		);
	}

	/**
	 * @Then /^user "([^"]*)" in folder "([^"]*)" should have favorited the following elements from offset ([\d*]) and limit ([\d*])$/
	 *
	 * @param string $user
	 * @param string $folder
	 * @param TableNode|null $expectedElements
	 * @param int $offset unused
	 * @param int $limit unused
	 *
	 * @return void
	 */
	public function checkFavoritedElementsPaginated(
		$user, $folder, $expectedElements, $offset, $limit
	) {
		$elementList = $this->reportFolder(
			$user,
			$folder,
			'<oc:favorite/>',
			'<oc:favorite>1</oc:favorite>'
		);
		if ($expectedElements instanceof TableNode) {
			$elementRows = $expectedElements->getRows();
			$elementsSimplified = $this->simplifyArray($elementRows);
			foreach ($elementsSimplified as $expectedElement) {
				$webdavPath = "/" . $this->getFullDavFilesPath($user) . $expectedElement;
				if (!\array_key_exists($webdavPath, $elementList)) {
					PHPUnit_Framework_Assert::fail(
						"$webdavPath is not in report answer"
					);
				}
			}
		}
	}

	/**
	 * @Then /^the user in folder "([^"]*)" should have favorited the following elements from offset ([\d*]) and limit ([\d*])$/
	 *
	 * @param string $folder
	 * @param TableNode|null $expectedElements
	 * @param int $offset unused
	 * @param int $limit unused
	 *
	 * @return void
	 */
	public function checkFavoritedElementsPaginatedForCurrentUser(
		$folder, $expectedElements, $offset, $limit
	) {
		$this->checkFavoritedElementsPaginated(
			$this->getCurrentUser(), $folder, $expectedElements, $offset, $limit
		);
	}

	/**
	 * @When /^user "([^"]*)" deletes everything from folder "([^"]*)" using the WebDAV API$/
	 * @Given /^user "([^"]*)" has deleted everything from folder "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $folder
	 *
	 * @return void
	 */
	public function userDeletesEverythingInFolder($user, $folder) {
		$elementList = $this->listFolder($user, $folder, 1);
		if (\is_array($elementList) && \count($elementList)) {
			$elementListKeys = \array_keys($elementList);
			\array_shift($elementListKeys);
			$davPrefix = "/" . $this->getFullDavFilesPath($user);
			foreach ($elementListKeys as $element) {
				if (\substr($element, 0, \strlen($davPrefix)) == $davPrefix) {
					$element = \substr($element, \strlen($davPrefix));
				}
				$this->userDeletesFile($user, $element);
			}
		}
	}

	/**
	 * @param string $user
	 * @param string $path
	 *
	 * @return int
	 */
	public function getFileIdForPath($user, $path) {
		try {
			return WebDavHelper::getFileIdForPath(
				$this->getBaseUrl(),
				$user,
				$this->getPasswordForUser($user),
				$path
			);
		} catch (Exception $e) {
			return null;
		}
	}

	/**
	 * @Given /^user "([^"]*)" has stored id of file "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 */
	public function userStoresFileIdForPath($user, $path) {
		$this->storedFileID = $this->getFileIdForPath($user, $path);
	}

	/**
	 * @Then /^user "([^"]*)" file "([^"]*)" should have the previously stored id$/
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 */
	public function userFileShouldHaveStoredId($user, $path) {
		$currentFileID = $this->getFileIdForPath($user, $path);
		PHPUnit_Framework_Assert::assertEquals(
			$currentFileID, $this->storedFileID
		);
	}

	/**
	 * @Then the DAV exception should be :message
	 *
	 * @param string $message
	 * @param array|null $responseXml
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theDavExceptionShouldBe($message, $responseXml = null) {
		$this->theDavResponseElementShouldBe("exception", $message, $responseXml);
	}

	/**
	 * @Then the DAV message should be :message
	 *
	 * @param string $message
	 * @param array|null $responseXml
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theDavErrorMessageShouldBe($message, $responseXml = null) {
		$this->theDavResponseElementShouldBe("message", $message, $responseXml);
	}

	/**
	 * @Then the DAV reason should be :message
	 *
	 * @param string $message
	 * @param array|null $responseXml
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theDavReasonShouldBe($message, $responseXml = null) {
		$this->theDavResponseElementShouldBe("reason", $message, $responseXml);
	}

	/**
	 *
	 * @param string $element exception|message|reason
	 * @param string $expectedValue
	 * @param array|null $responseXml
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theDavResponseElementShouldBe($element, $expectedValue, $responseXml = null) {
		if ($responseXml == null) {
			$responseXml = $this->responseXml;
		}
		
		if ($element === "exception") {
			$result = $responseXml['value'][0]['value'];
		} elseif ($element === "message") {
			$result = $responseXml['value'][1]['value'];
		} elseif ($element === "reason") {
			$result = $responseXml['value'][3]['value'];
		}
		
		if ($expectedValue !== $result) {
			throw new \Exception(
				\sprintf(
					'Expected %s got %s',
					$expectedValue,
					$result
				)
			);
		}
	}

	/**
	 * @When user :user restores version index :versionIndex of file :path using the WebDAV API
	 * @Given user :user has restored version index :versionIndex of file :path
	 *
	 * @param string $user
	 * @param int $versionIndex
	 * @param string $path
	 *
	 * @return void
	 */
	public function userRestoresVersionIndexOfFile($user, $versionIndex, $path) {
		$fileId = $this->getFileIdForPath($user, $path);
		$client = $this->getSabreClient($user);
		$versions = \array_keys(
			$this->listVersionFolder($user, "/meta/$fileId/v", 1)
		);
		$client->request(
			'COPY',
			$versions[$versionIndex],
			null,
			['Destination' => $this->makeSabrePath($user, $path)]
		);
	}

	/**
	 * @Then /^the (?:propfind|search) result of "([^"]*)" should (not|)\s?contain these (?:files|entries):$/
	 *
	 * @param string $user
	 * @param string $shouldOrNot (not|)
	 * @param TableNode $expectedFiles
	 *
	 * @return void
	 */
	public function propfindResultShouldContainEntries(
		$user, $shouldOrNot, TableNode $expectedFiles
	) {
		$elementRows = $expectedFiles->getRows();
		$should = ($shouldOrNot !== "not");
		
		foreach ($elementRows as $expectedFile) {
			$fileFound = $this->findEntryFromPropfindResponse(
				$user, $expectedFile[0]
			);
			if ($should) {
				PHPUnit_Framework_Assert::assertNotEmpty(
					$fileFound,
					"response does not contain the entry '$expectedFile[0]'"
				);
			} else {
				PHPUnit_Framework_Assert::assertFalse(
					$fileFound,
					"response does contain the entry '$expectedFile[0]' but should not"
				);
			}
		}
	}

	/**
	 * @Then the propfind/search result of :user should contain :numFiles files/entries
	 *
	 * @param string $user
	 * @param int $numFiles
	 *
	 * @return void
	 */
	public function propfindResultShouldContainNumEntries($user, $numFiles) {
		//if we are using that step the second time in a scenario e.g. 'But ... should not'
		//then don't parse the result again, because the result in a ResponseInterface
		if (empty($this->responseXml)) {
			$this->parseResponseIntoXml();
		}
		$multistatusResults = $this->responseXml["value"];
		PHPUnit_Framework_Assert::assertEquals((int)$numFiles, \count($multistatusResults));
	}

	/**
	 * @Then the propfind/search result of :user shoud contain any :expectedNumber of these files/entries:
	 *
	 * @param string $user
	 * @param integer $expectedNumber
	 * @param TableNode $expectedFiles
	 *
	 * @return void
	 */
	public function theSearchResultOfShoudContainAnyOfTheseEntries(
		$user, $expectedNumber, TableNode $expectedFiles
	) {
		$this->propfindResultShouldContainNumEntries($user, $expectedNumber);
		$elementRows = $expectedFiles->getRowsHash();
		$resultEntrys = $this->findEntryFromPropfindResponse($user);
		foreach ($resultEntrys as $resultEntry) {
			PHPUnit_Framework_Assert::arrayHasKey($resultEntry, $elementRows);
		}
	}

	/**
	 * parses a PROPFIND response from $this->response into xml
	 * and returns found search results if found else returns false
	 *
	 * @param string $user
	 * @param string $entryNameToSearch
	 *
	 * @return string if $entryNameToSearch is given and is found
	 * array if $entryNameToSearch is not given
	 * boolean false if $entryNameToSearch is given and is not found
	 */
	public function findEntryFromPropfindResponse($user, $entryNameToSearch = null) {
		//if we are using that step the second time in a scenario e.g. 'But ... should not'
		//then don't parse the result again, because the result in a ResponseInterface
		if (empty($this->responseXml)) {
			$this->parseResponseIntoXml();
		}
		$multistatusResults = $this->responseXml["value"];
		$results = [];
		if ($multistatusResults !== null) {
			foreach ($multistatusResults as $multistatusResult) {
				$entryPath = $multistatusResult['value'][0]['value'];
				$fullWebDavPath = \ltrim(
					$this->getBasePath() . "/" . $this->getDavFilesPath($user) . "/",
					"/"
				);
				$entryName = \str_replace($fullWebDavPath, "", $entryPath);
				$entryName = \rawurldecode($entryName);
				if ($entryNameToSearch === $entryName) {
					return $multistatusResult;
				}
				\array_push($results, $entryName);
			}
			if ($entryNameToSearch === null) {
				return $results;
			}
		}
		return false;
	}

	/**
	 * reset settings if they were set in the scenario
	 *
	 * @AfterScenario
	 *
	 * @return void
	 */
	public function resetOldSettingsAfterScenario() {
		if ($this->oldAsyncSetting === "") {
			SetupHelper::runOcc(['config:system:delete', 'dav.enable.async']);
		} elseif ($this->oldAsyncSetting !== null) {
			SetupHelper::runOcc(
				[
					'config:system:set',
					'dav.enable.async',
					'--type',
					'boolean',
					'--value',
					$this->oldAsyncSetting
				]
			);
		}
		if ($this->oldDavSlowdownSetting === "") {
			SetupHelper::runOcc(['config:system:delete', 'dav.slowdown']);
		} elseif ($this->oldDavSlowdownSetting !== null) {
			SetupHelper::runOcc(
				[
					'config:system:set',
					'dav.slowdown',
					'--value',
					$this->oldDavSlowdownSetting
				]
			);
		}
	}
}
