<?php declare(strict_types=1);
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
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Ring\Exception\ConnectException;
use PHPUnit\Framework\Assert;
use Psr\Http\Message\ResponseInterface;
use TestHelpers\DeleteHelper;
use GuzzleHttp\Stream\StreamInterface;
use TestHelpers\OcsApiHelper;
use TestHelpers\SetupHelper;
use TestHelpers\UploadHelper;
use TestHelpers\WebDavHelper;
use TestHelpers\HttpRequestHelper;
use TestHelpers\Asserts\WebDav as WebDavAssert;

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
	 * @var integer
	 */
	private $storedFileID = null;

	/**
	 * @var int
	 */
	private $lastUploadDeleteTime = null;

	/**
	 * a variable that contains the DAV path without "remote.php/(web)dav"
	 * when setting $this->davPath directly by usingDavPath()
	 *
	 * @var string
	 */
	private $customDavPath = null;

	private $previousAsyncSetting = null;

	private $previousDavSlowdownSetting = null;

	/**
	 * @var int
	 */
	private $currentDavSlowdownSettingSeconds = 0;

	/**
	 * response content parsed from XML to an array
	 *
	 * @var array
	 */
	private $responseXml = [];

	/**
	 * response content parsed into a SimpleXMLElement
	 *
	 * @var SimpleXMLElement
	 */
	private $responseXmlObject;

	private $httpRequestTimeout = 0;

	private $chunkingToUse = null;

	/**
	 * @param int $lastUploadDeleteTime
	 *
	 * @return void
	 */
	public function setLastUploadDeleteTime(int $lastUploadDeleteTime):void {
		$this->lastUploadDeleteTime = $lastUploadDeleteTime;
	}

	/**
	 * @return number
	 */
	public function getLastUploadDeleteTime():int {
		return $this->lastUploadDeleteTime;
	}

	/**
	 * @return SimpleXMLElement|null
	 */
	public function getResponseXmlObject():?SimpleXMLElement {
		return $this->responseXmlObject;
	}

	/**
	 * @param SimpleXMLElement $responseXmlObject
	 *
	 * @return void
	 */
	public function setResponseXmlObject(SimpleXMLElement $responseXmlObject):void {
		$this->responseXmlObject = $responseXmlObject;
	}

	/**
	 *
	 * @return string the etag or an empty string if the getetag property does not exist
	 */
	public function getEtagFromResponseXmlObject():string {
		$xmlObject = $this->getResponseXmlObject();
		$xmlPart = $xmlObject->xpath("//d:prop/d:getetag");
		if (!\is_array($xmlPart) || (\count($xmlPart) === 0)) {
			return '';
		}
		return $xmlPart[0]->__toString();
	}

	/**
	 *
	 * @param string|null $eTag if null then get eTag from response XML object
	 *
	 * @return boolean
	 */
	public function isEtagValid(?string $eTag = null):bool {
		if ($eTag === null) {
			$eTag = $this->getEtagFromResponseXmlObject();
		}
		if (\preg_match("/^\"[a-f0-9:\.]{1,32}\"$/", $eTag)
		) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @param array $responseXml
	 *
	 * @return void
	 */
	public function setResponseXml(array $responseXml):void {
		$this->responseXml = $responseXml;
	}

	/**
	 * @param ResponseInterface[] $uploadResponses
	 *
	 * @return void
	 */
	public function setUploadResponses(array $uploadResponses):void {
		$this->uploadResponses = $uploadResponses;
	}

	/**
	 * @Given /^using DAV path "([^"]*)"$/
	 *
	 * @param string $davPath
	 *
	 * @return void
	 */
	public function usingDavPath(string $davPath):void {
		$this->davPath = $davPath;
		$this->customDavPath = \preg_replace(
			"/remote\.php\/(web)?dav\//",
			"",
			$davPath
		);
	}

	/**
	 * @return string
	 */
	public function getOldDavPath():string {
		return "remote.php/webdav";
	}

	/**
	 * @return string
	 */
	public function getNewDavPath():string {
		return "remote.php/dav";
	}

	/**
	 * @Given /^using (old|new) (?:dav|DAV) path$/
	 *
	 * @param string $oldOrNewDavPath
	 *
	 * @return void
	 */
	public function usingOldOrNewDavPath(string $oldOrNewDavPath):void {
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
	public function usingOldDavPath():void {
		$this->davPath = $this->getOldDavPath();
		$this->usingOldDavPath = true;
		$this->customDavPath = null;
	}

	/**
	 * Select the new DAV path as the default for later scenario steps
	 *
	 * @return void
	 */
	public function usingNewDavPath():void {
		$this->davPath = $this->getNewDavPath();
		$this->usingOldDavPath = false;
		$this->customDavPath = null;
	}

	/**
	 * gives the DAV path of a file including the subfolder of the webserver
	 * e.g. when the server runs in `http://localhost/owncloud/`
	 * this function will return `owncloud/remote.php/webdav/prueba.txt`
	 *
	 * @param string $user
	 *
	 * @return string
	 */
	public function getFullDavFilesPath(string $user):string {
		$path = $this->getBasePath() . "/" .
			WebDavHelper::getDavPath($user, $this->getDavPathVersion());
		$path = WebDavHelper::sanitizeUrl($path);
		return \ltrim($path, "/");
	}

	/**
	 * @param string $token
	 * @param string $type
	 *
	 * @return string
	 */
	public function getPublicLinkDavPath(string $token, string $type):string {
		$path = $this->getBasePath() . "/" .
			WebDavHelper::getDavPath($token, $this->getDavPathVersion(), $type);
		$path = WebDavHelper::sanitizeUrl($path);
		return \ltrim($path, "/");
	}

	/**
	 * Select a suitable DAV path version number.
	 * Some endpoints have only existed since a certain point in time, so for
	 * those make sure to return a DAV path version that works for that endpoint.
	 * Otherwise return the currently selected DAV path version.
	 *
	 * @param string|null $for the category of endpoint that the DAV path will be used for
	 *
	 * @return int DAV path version (1 or 2) selected, or appropriate for the endpoint
	 */
	public function getDavPathVersion(?string $for = null):int {
		if ($for === 'systemtags') {
			// systemtags only exists since DAV v2
			return 2;
		}
		if ($for === 'file_versions') {
			// file_versions only exists since DAV v2
			return 2;
		}
		if ($this->usingOldDavPath === true) {
			return 1;
		} else {
			return 2;
		}
	}

	/**
	 * Select a suitable DAV path.
	 * Some endpoints have only existed since a certain point in time, so for
	 * those make sure to return a DAV path that works for that endpoint.
	 * Otherwise return the currently selected DAV path.
	 *
	 * @param string|null $for the category of endpoint that the DAV path will be used for
	 *
	 * @return string DAV path selected, or appropriate for the endpoint
	 */
	public function getDavPath(?string $for = null):string {
		if ($this->getDavPathVersion($for) === 1) {
			return $this->getOldDavPath();
		}

		return $this->getNewDavPath();
	}

	/**
	 * @param string|null $user
	 * @param string|null $method
	 * @param string|null $path
	 * @param array|null $headers
	 * @param StreamInterface|null $body
	 * @param string|null $type
	 * @param string|null $davPathVersion
	 * @param bool $stream Set to true to stream a response rather
	 *                     than download it all up-front.
	 * @param string|null $password
	 * @param array|null $urlParameter
	 * @param string|null $doDavRequestAsUser
	 *
	 * @return ResponseInterface
	 */
	public function makeDavRequest(
		?string $user,
		?string $method,
		?string $path,
		?array $headers,
		$body = null,
		?string $type = "files",
		?string $davPathVersion = null,
		bool $stream = false,
		?string $password = null,
		?array $urlParameter = [],
		?string $doDavRequestAsUser = null
	):ResponseInterface {
		$user = $this->getActualUsername($user);
		if ($this->customDavPath !== null) {
			$path = $this->customDavPath . $path;
		}

		if ($davPathVersion === null) {
			$davPathVersion = $this->getDavPathVersion();
		}

		if ($password === null) {
			$password = $this->getPasswordForUser($user);
		}
		return WebDavHelper::makeDavRequest(
			$this->getBaseUrl(),
			$user,
			$password,
			$method,
			$path,
			$headers,
			$this->getStepLineRef(),
			$body,
			(int) $davPathVersion,
			$type,
			null,
			"basic",
			$stream,
			$this->httpRequestTimeout,
			null,
			$urlParameter,
			$doDavRequestAsUser
		);
	}

	/**
	 * @param string $user
	 * @param string|null $path
	 * @param string|null $doDavRequestAsUser
	 * @param string|null $width
	 * @param string|null $height
	 *
	 * @return void
	 */
	public function downloadPreviews(string $user, ?string $path, ?string $doDavRequestAsUser, ?string $width, ?string $height):void {
		$user = $this->getActualUsername($user);
		$doDavRequestAsUser = $this->getActualUsername($doDavRequestAsUser);
		$urlParameter = [
			'x' => $width,
			'y' => $height,
			'forceIcon' => '0',
			'preview' => '1'
		];
		$this->response = $this->makeDavRequest(
			$user,
			"GET",
			$path,
			[],
			null,
			"files",
			'2',
			false,
			null,
			$urlParameter,
			$doDavRequestAsUser
		);
	}

	/**
	 * @Then the number of versions should be :arg1
	 *
	 * @param int $number
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theNumberOfVersionsShouldBe(int $number):void {
		$resXml = $this->getResponseXmlObject();
		if ($resXml === null) {
			$resXml = HttpRequestHelper::getResponseXml(
				$this->getResponse(),
				__METHOD__
			);
		}
		$xmlPart = $resXml->xpath("//d:getlastmodified");
		$actualNumber = \count($xmlPart);
		Assert::assertEquals(
			$number,
			$actualNumber,
			"Expected number of versions was '$number', but got '$actualNumber'"
		);
	}

	/**
	 * @Then the number of etag elements in the response should be :number
	 *
	 * @param int $number
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theNumberOfEtagElementInTheResponseShouldBe(int $number):void {
		$resXml = $this->getResponseXmlObject();
		if ($resXml === null) {
			$resXml = HttpRequestHelper::getResponseXml(
				$this->getResponse(),
				__METHOD__
			);
		}
		$xmlPart = $resXml->xpath("//d:getetag");
		$actualNumber = \count($xmlPart);
		Assert::assertEquals(
			$number,
			$actualNumber,
			"Expected number of etag elements was '$number', but got '$actualNumber'"
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
	public function triggerAsyncUpload(string $enabledOrDisabled):void {
		$switch = ($enabledOrDisabled !== "disabled");
		if ($switch) {
			$value = 'true';
		} else {
			$value = 'false';
		}
		if ($this->previousAsyncSetting === null) {
			$previousAsyncSetting = SetupHelper::runOcc(
				['config:system:get', 'dav.enable.async'],
				$this->getStepLineRef()
			)['stdOut'];
			$this->previousAsyncSetting = \trim($previousAsyncSetting);
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
	public function setHttpTimeout(int $timeout):void {
		$this->httpRequestTimeout = (int) $timeout;
	}

	/**
	 * @Given the :method DAV requests are slowed down by :seconds seconds
	 *
	 * @param string $method
	 * @param int $seconds
	 *
	 * @return void
	 * @throws Exception
	 */
	public function slowdownDavRequests(string $method, int $seconds):void {
		if ($this->previousDavSlowdownSetting === null) {
			$previousDavSlowdownSetting = SetupHelper::runOcc(
				['config:system:get', 'dav.slowdown'],
				$this->getStepLineRef()
			)['stdOut'];
			$this->previousDavSlowdownSetting = \trim($previousDavSlowdownSetting);
		}
		OcsApiHelper::sendRequest(
			$this->getBaseUrl(),
			$this->getAdminUsername(),
			$this->getAdminPassword(),
			"PUT",
			"/apps/testing/api/v1/davslowdown/$method/$seconds",
			$this->getStepLineRef()
		);
		$this->currentDavSlowdownSettingSeconds = $seconds;
	}

	/**
	 * Wait for possible slowed-down DAV requests to finish
	 *
	 * @return void
	 */
	public function waitForDavRequestsToFinish():void {
		if ($this->currentDavSlowdownSettingSeconds > 0) {
			// There could be a slowed-down request still happening on the server
			// Wait just-in-case so that we do not accidentally have an effect on
			// the next scenario.
			\sleep($this->currentDavSlowdownSettingSeconds);
		}
	}

	/**
	 * @param string $user
	 * @param string $fileDestination
	 *
	 * @return string
	 */
	public function destinationHeaderValue(string $user, string $fileDestination):string {
		$fullUrl = $this->getBaseUrl() . '/' .
			WebDavHelper::getDavPath($user, $this->getDavPathVersion());
		return \rtrim($fullUrl, '/') . '/' . \ltrim($fileDestination, '/');
	}

	/**
	 * @Given /^user "([^"]*)" has moved (?:file|folder|entry) "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string|null $user
	 * @param string|null $fileSource
	 * @param string|null $fileDestination
	 *
	 * @return void
	 */
	public function userHasMovedFile(
		?string $user,
		?string $fileSource,
		?string $fileDestination
	):void {
		$user = $this->getActualUsername($user);
		$headers['Destination'] = $this->destinationHeaderValue(
			$user,
			$fileDestination
		);
		$this->response = $this->makeDavRequest(
			$user,
			"MOVE",
			$fileSource,
			$headers
		);
		$expectedStatusCode = 201;
		$actualStatusCode = $this->response->getStatusCode();
		Assert::assertEquals(
			$expectedStatusCode,
			$actualStatusCode,
			__METHOD__ . " Failed moving resource '$fileSource' to '$fileDestination'."
			. " Expected status code was '$expectedStatusCode' but got '$actualStatusCode'"
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
	public function theUserHasMovedFile(string $fileSource, string $fileDestination):void {
		$this->userHasMovedFile($this->getCurrentUser(), $fileSource, $fileDestination);
	}

	/**
	 * @When /^user "([^"]*)" moves (file|folder|entry) "([^"]*)"\s?(asynchronously|) to these (?:filenames|foldernames|entries) using the webDAV API then the results should be as listed$/
	 *
	 * @param string $user
	 * @param string $entry
	 * @param string $fileSource
	 * @param string $type "asynchronously" or empty
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userMovesEntriesUsingTheAPI(
		string $user,
		string $entry,
		string $fileSource,
		string $type,
		TableNode $table
	):void {
		$user = $this->getActualUsername($user);
		foreach ($table->getHash() as $row) {
			// Allow the "filename" column to be optionally be called "foldername"
			// to help readability of scenarios that test moving folders
			if (isset($row['foldername'])) {
				$targetName = $row['foldername'];
			} else {
				$targetName = $row['filename'];
			}
			$this->userMovesFileUsingTheAPI(
				$user,
				$fileSource,
				$type,
				$targetName
			);
			$this->theHTTPStatusCodeShouldBe(
				$row['http-code'],
				"HTTP status code is not the expected value while trying to move " . $targetName
			);
			if ($row['exists'] === "yes") {
				$this->asFileOrFolderShouldExist($user, $entry, $targetName);
				// The move was successful.
				// Move the file/folder back so the source file/folder exists for the next move
				$this->userMovesFileUsingTheAPI(
					$user,
					$targetName,
					'',
					$fileSource
				);
			} else {
				$this->asFileOrFolderShouldNotExist($user, $entry, $targetName);
			}
		}
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
		string $user,
		string $fileSource,
		string $type,
		string $fileDestination
	):void {
		$user = $this->getActualUsername($user);
		$headers['Destination'] = $this->destinationHeaderValue(
			$user,
			$fileDestination
		);
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
			$this->emptyLastHTTPStatusCodesArray();
			$this->response = $this->makeDavRequest(
				$user,
				"MOVE",
				$fileSource,
				$headers,
				null,
				"files",
				null,
				$stream
			);
			$this->setResponseXml(
				HttpRequestHelper::parseResponseAsXml($this->response)
			);
			$this->pushToLastStatusCodesArrays();
		} catch (ConnectException $e) {
		}
	}

	/**
	 * @When user :user moves the following file using the WebDAV API
	 *
	 * @param string $user
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userMovesTheFollowingFileUsingTheWebdavApi(string $user, TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["source",  "destination"]);
		$rows = $table->getHash();
		foreach ($rows as $row) {
			$this->userMovesFileUsingTheAPI($user, $row["source"], "", $row["destination"]);
		}
	}

	/**
	 * @When /^user "([^"]*)" moves the following (?:files|folders|entries)\s?(asynchronously|) using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $type "asynchronously" or empty
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userMovesFollowingFileUsingTheAPI(
		string $user,
		string $type,
		TableNode $table
	):void {
		$this->verifyTableNodeColumns($table, ["from", "to"]);
		$paths = $table->getHash();

		foreach ($paths as $file) {
			$this->userMovesFileUsingTheAPI($user, $file['from'], $type, $file['to']);
			$this->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @Then /^user "([^"]*)" should be able to rename (file|folder|entry) "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $entry
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserShouldBeAbleToRenameEntryTo(string $user, string $entry, string $source, string $destination):void {
		$user = $this->getActualUsername($user);
		$this->asFileOrFolderShouldExist($user, $entry, $source);
		$this->userMovesFileUsingTheAPI($user, $source, "", $destination);
		$this->asFileOrFolderShouldNotExist($user, $entry, $source);
		$this->asFileOrFolderShouldExist($user, $entry, $destination);
	}

	/**
	 * @Then /^user "([^"]*)" should not be able to rename (file|folder|entry) "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $entry
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserShouldNotBeAbleToRenameEntryTo(string $user, string $entry, string $source, string $destination):void {
		$this->asFileOrFolderShouldExist($user, $entry, $source);
		$this->userMovesFileUsingTheAPI($user, $source, "", $destination);
		$this->asFileOrFolderShouldExist($user, $entry, $source);
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
		string $user,
		string $server,
		string $fileSource,
		string $fileDestination
	):void {
		$previousServer = $this->usingServer($server);
		$this->userMovesFileUsingTheAPI($user, $fileSource, "", $fileDestination);
		$this->usingServer($previousServer);
	}

	/**
	 * @When /^user "([^"]*)" copies (?:file|folder) "([^"]*)" to "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $fileSource
	 * @param string $fileDestination
	 *
	 * @return void
	 */
	public function userCopiesFileUsingTheAPI(
		string $user,
		string $fileSource,
		string $fileDestination
	):void {
		$user = $this->getActualUsername($user);
		$headers['Destination'] = $this->destinationHeaderValue(
			$user,
			$fileDestination
		);
		$this->response = $this->makeDavRequest(
			$user,
			"COPY",
			$fileSource,
			$headers
		);
		$this->setResponseXml(
			HttpRequestHelper::parseResponseAsXml($this->response)
		);
	}

	/**
	 * @Given /^user "([^"]*)" has copied file "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $fileSource
	 * @param string $fileDestination
	 *
	 * @return void
	 */
	public function userHasCopiedFileUsingTheAPI(
		string $user,
		string $fileSource,
		string $fileDestination
	):void {
		$this->userCopiesFileUsingTheAPI($user, $fileSource, $fileDestination);
		$this->theHTTPStatusCodeShouldBe(
			["201", "204"],
			"HTTP status code was not 201 or 204 while trying to copy file '$fileSource' to '$fileDestination' for user '$user'"
		);
	}

	/**
	 * @When /^the user copies file "([^"]*)" to "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $fileSource
	 * @param string $fileDestination
	 *
	 * @return void
	 */
	public function theUserCopiesFileUsingTheAPI(string $fileSource, string $fileDestination):void {
		$this->userCopiesFileUsingTheAPI($this->getCurrentUser(), $fileSource, $fileDestination);
	}

	/**
	 * @Given /^the user has copied file "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $fileSource
	 * @param string $fileDestination
	 *
	 * @return void
	 */
	public function theUserHasCopiedFileUsingTheAPI(string $fileSource, string $fileDestination):void {
		$this->theUserCopiesFileUsingTheAPI($fileSource, $fileDestination);
		$this->theHTTPStatusCodeShouldBe(
			["201", "204"],
			"HTTP status code was not 201 or 204 while trying to copy file '$fileSource' to '$fileDestination'"
		);
	}

	/**
	 * @When /^the user downloads file "([^"]*)" with range "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $fileSource
	 * @param string $range
	 *
	 * @return void
	 */
	public function downloadFileWithRange(string $fileSource, string $range):void {
		$this->userDownloadsFileWithRange(
			$this->currentUser,
			$fileSource,
			$range
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
	public function userDownloadsFileWithRange(string $user, string $fileSource, string $range):void {
		$user = $this->getActualUsername($user);
		$headers['Range'] = $range;
		$this->response = $this->makeDavRequest(
			$user,
			"GET",
			$fileSource,
			$headers
		);
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
		string $user,
		string $password,
		string $fileName
	):void {
		$user = $this->getActualUsername($user);
		$password = $this->getActualPassword($password);
		$this->downloadFileAsUserUsingPassword($user, $fileName, $password);
		Assert::assertGreaterThanOrEqual(
			400,
			$this->getResponse()->getStatusCode(),
			__METHOD__
			. ' download must fail'
		);
		Assert::assertLessThanOrEqual(
			499,
			$this->getResponse()->getStatusCode(),
			__METHOD__
			. ' 4xx error expected but got status code "'
			. $this->getResponse()->getStatusCode() . '"'
		);
	}

	/**
	 * @Then /^user "([^"]*)" should be able to access a skeleton file$/
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function userShouldBeAbleToAccessASkeletonFile(string $user):void {
		$this->contentOfFileForUserShouldBePlusEndOfLine(
			"textfile0.txt",
			$user,
			"ownCloud test text file 0"
		);
	}

	/**
	 * @Then the size of the downloaded file should be :size bytes
	 *
	 * @param string $size
	 *
	 * @return void
	 */
	public function sizeOfDownloadedFileShouldBe(string $size):void {
		$actualSize = \strlen((string) $this->response->getBody());
		Assert::assertEquals(
			$size,
			$actualSize,
			"Expected size of the downloaded file was '$size' but got '$actualSize'"
		);
	}

	/**
	 * @Then /^the downloaded content should end with "([^"]*)"$/
	 *
	 * @param string $content
	 *
	 * @return void
	 */
	public function downloadedContentShouldEndWith(string $content):void {
		$actualContent = \substr((string) $this->response->getBody(), -\strlen($content));
		Assert::assertEquals(
			$content,
			$actualContent,
			"The downloaded content was expected to end with '$content', but actually ended with '$actualContent'."
		);
	}

	/**
	 * @Then /^the downloaded content should be "([^"]*)"$/
	 *
	 * @param string $content
	 *
	 * @return void
	 */
	public function downloadedContentShouldBe(string $content):void {
		$actualContent = (string) $this->response->getBody();
		// For this test we really care about the content.
		// A separate "Then" step can specifically check the HTTP status.
		// But if the content is wrong (e.g. empty) then it is useful to
		// report the HTTP status to give some clue what might be the problem.
		$actualStatus = $this->response->getStatusCode();
		Assert::assertEquals(
			$content,
			$actualContent,
			"The downloaded content was expected to be '$content', but actually is '$actualContent'. HTTP status was $actualStatus"
		);
	}

	/**
	 * @Then /^if the HTTP status code was "([^"]*)" then the downloaded content for multipart byterange should be:$/
	 *
	 * @param int $statusCode
	 * @param PyStringNode $content
	 *
	 * @return void
	 *
	 */
	public function theDownloadedContentForMultipartByterangeShouldBe(int $statusCode, PyStringNode $content):void {
		$actualStatusCode = $this->response->getStatusCode();
		if ($actualStatusCode === $statusCode) {
			$actualContent = (string) $this->response->getBody();
			$pattern = ["/--\w*/", "/\s*/m"];
			$actualContent = \preg_replace($pattern, "", $actualContent);
			$content = \preg_replace("/\s*/m", '', $content->getRaw());
			Assert::assertEquals(
				$content,
				$actualContent,
				"The downloaded content was expected to be '$content', but actually is '$actualContent'. HTTP status was $actualStatusCode"
			);
		}
	}

	/**
	 * @Then /^if the HTTP status code was "([^"]*)" then the downloaded content should be "([^"]*)"$/
	 *
	 * @param int $statusCode
	 * @param string $content
	 *
	 * @return void
	 */
	public function checkStatusCodeForDownloadedContentShouldBe(int $statusCode, string $content):void {
		$actualStatusCode = $this->response->getStatusCode();
		if ($actualStatusCode === $statusCode) {
			$this->downloadedContentShouldBe($content);
		}
	}

	/**
	 * @Then /^the downloaded content should be "([^"]*)" plus end-of-line$/
	 *
	 * @param string $content
	 *
	 * @return void
	 */
	public function downloadedContentShouldBePlusEndOfLine(string $content):void {
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
	public function contentOfFileShouldBe(string $fileName, string $content):void {
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
		string $fileName,
		PyStringNode $content
	):void {
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
	public function contentOfFileShouldBePlusEndOfLine(string $fileName, string $content):void {
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
	public function contentOfFileForUserShouldBe(string $fileName, string $user, string $content):void {
		$user = $this->getActualUsername($user);
		$this->downloadFileAsUserUsingPassword($user, $fileName);
		$this->downloadedContentShouldBe($content);
	}

	/**
	 * @Then /^the content of the following files for user "([^"]*)" should be "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $content
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function contentOfFollowingFilesShouldBe(string $user, string $content, TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["path"]);
		$paths = $table->getHash();

		foreach ($paths as $file) {
			$this->contentOfFileForUserShouldBe($file["path"], $user, $content);
		}
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
		string $fileName,
		string $user,
		string $server,
		string $content
	):void {
		$previousServer = $this->usingServer($server);
		$this->contentOfFileForUserShouldBe($fileName, $user, $content);
		$this->usingServer($previousServer);
	}

	/**
	 * @Then /^the content of file "([^"]*)" for user "([^"]*)" using password "([^"]*)" should be "([^"]*)"$/
	 *
	 * @param string $fileName
	 * @param string $user
	 * @param string|null $password
	 * @param string $content
	 *
	 * @return void
	 */
	public function contentOfFileForUserUsingPasswordShouldBe(
		string $fileName,
		string $user,
		?string $password,
		string $content
	):void {
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
		string $fileName,
		string $user,
		PyStringNode $content
	):void {
		$this->contentOfFileForUserShouldBe($fileName, $user, $content->getRaw());
	}

	/**
	 * @Then /^the content of file "([^"]*)" for user "([^"]*)" using password "([^"]*)" should be:$/
	 *
	 * @param string $fileName
	 * @param string $user
	 * @param string|null $password
	 * @param PyStringNode $content
	 *
	 * @return void
	 */
	public function contentOfFileForUserUsingPasswordShouldBePyString(
		string $fileName,
		string $user,
		?string $password,
		PyStringNode $content
	):void {
		$this->contentOfFileForUserUsingPasswordShouldBe(
			$fileName,
			$user,
			$password,
			$content->getRaw()
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
	public function contentOfFileForUserShouldBePlusEndOfLine(string $fileName, string $user, string $content):void {
		$this->contentOfFileForUserShouldBe(
			$fileName,
			$user,
			"$content\n"
		);
	}

	/**
	 * @Then the content of the following files for user :user should be the following plus end-of-line
	 *
	 * @param string $user
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theContentOfTheFollowingFilesForUserShouldBeTheFollowingPlusEndOfLine(string $user, TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["filename",  "content"]);
		$rows = $table->getHash();
		foreach ($rows as $row) {
			$this->contentOfFileForUserShouldBePlusEndOfLine($row["filename"], $user, $row["content"]);
		}
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
		string $fileName,
		string $user,
		string $server,
		string $content
	):void {
		$previousServer = $this->usingServer($server);
		$this->contentOfFileForUserShouldBePlusEndOfLine($fileName, $user, $content);
		$this->usingServer($previousServer);
	}

	/**
	 * @Then /^the content of file "([^"]*)" for user "([^"]*)" using password "([^"]*)" should be "([^"]*)" plus end-of-line$/
	 *
	 * @param string $fileName
	 * @param string $user
	 * @param string|null $password
	 * @param string $content
	 *
	 * @return void
	 */
	public function contentOfFileForUserUsingPasswordShouldBePlusEndOfLine(
		string $fileName,
		string $user,
		?string $password,
		string $content
	):void {
		$user = $this->getActualUsername($user);
		$this->contentOfFileForUserUsingPasswordShouldBe(
			$fileName,
			$user,
			$password,
			"$content\n"
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
		string $fileSource,
		string $range,
		string $content
	):void {
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
		string $fileSource,
		string $user,
		string $range,
		string $content
	):void {
		$user = $this->getActualUsername($user);
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
	public function theUserDownloadsTheFileUsingTheAPI(string $fileName):void {
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
		string $user,
		string $fileName
	):void {
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
		string $user,
		?string $password,
		string $fileName
	):void {
		$this->downloadFileAsUserUsingPassword($user, $fileName, $password);
	}

	/**
	 * @param string $user
	 * @param string $fileName
	 * @param string|null $password
	 * @param array|null $headers
	 *
	 * @return void
	 */
	public function downloadFileAsUserUsingPassword(
		string $user,
		string $fileName,
		?string $password = null,
		?array $headers = []
	):void {
		$user = $this->getActualUsername($user);
		$password = $this->getActualPassword($password);
		$this->response = $this->makeDavRequest(
			$user,
			'GET',
			$fileName,
			$headers,
			null,
			"files",
			null,
			false,
			$password
		);
	}

	/**
	 * @When the public gets the size of the last shared public link using the WebDAV API
	 *
	 * @return void
	 * @throws Exception
	 */
	public function publicGetsSizeOfLastSharedPublicLinkUsingTheWebdavApi():void {
		$tokenArray = $this->getLastShareData()->data->token;
		$token = (string)$tokenArray[0];
		$url = $this->getBaseUrl() . "/remote.php/dav/public-files/{$token}";
		$this->response = HttpRequestHelper::sendRequest(
			$url,
			$this->getStepLineRef(),
			"PROPFIND",
			null,
			null,
			null
		);
	}

	/**
	 * @When user :user gets the size of file :resource using the WebDAV API
	 *
	 * @param string $user
	 * @param string $resource
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userGetsSizeOfFileUsingTheWebdavApi(string $user, string $resource):void {
		$user = $this->getActualUsername($user);
		$password = $this->getPasswordForUser($user);
		$this->response = WebDavHelper::propfind(
			$this->getBaseUrl(),
			$user,
			$password,
			$resource,
			[],
			$this->getStepLineRef()
		);
	}

	/**
	 * @Then the size of the file should be :size
	 *
	 * @param string $size
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theSizeOfTheFileShouldBe(string $size):void {
		$responseXml = HttpRequestHelper::getResponseXml(
			$this->response,
			__METHOD__
		);
		$xmlPart = $responseXml->xpath("//d:prop/d:getcontentlength");
		$actualSize = (string) $xmlPart[0];
		Assert::assertEquals(
			$size,
			$actualSize,
			__METHOD__
			. " Expected size of the file was '$size', but got '$actualSize' instead."
		);
	}

	/**
	 * @Then the following headers should be set
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingHeadersShouldBeSet(TableNode $table):void {
		$this->verifyTableNodeColumns(
			$table,
			['header', 'value']
		);
		foreach ($table->getColumnsHash() as $header) {
			$headerName = $header['header'];
			$expectedHeaderValue = $header['value'];
			$returnedHeader = $this->response->getHeader($headerName);
			$expectedHeaderValue = $this->substituteInLineCodes($expectedHeaderValue);

			if (\is_array($returnedHeader)) {
				if (empty($returnedHeader)) {
					throw new Exception(
						\sprintf(
							"Missing expected header '%s'",
							$headerName
						)
					);
				}
				$headerValue = $returnedHeader[0];
			} else {
				$headerValue = $returnedHeader;
			}

			Assert::assertEquals(
				$expectedHeaderValue,
				$headerValue,
				__METHOD__
				. " Expected value for header '$headerName' was '$expectedHeaderValue', but got '$headerValue' instead."
			);
		}
	}

	/**
	 * @Then the downloaded content should start with :start
	 *
	 * @param string $start
	 *
	 * @return void
	 * @throws Exception
	 */
	public function downloadedContentShouldStartWith(string $start):void {
		Assert::assertEquals(
			0,
			\strpos($this->response->getBody()->getContents(), $start),
			__METHOD__
			. " The downloaded content was expected to start with '$start', but actually started with '{$this->response->getBody()->getContents()}'"
		);
	}

	/**
	 * @Then the oc job status values of last request for user :user should match these regular expressions
	 *
	 * @param string $user
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function jobStatusValuesShouldMatchRegEx(string $user, TableNode $table):void {
		$user = $this->getActualUsername($user);
		$this->verifyTableNodeColumnsCount($table, 2);
		$headerArray = $this->response->getHeader("OC-JobStatus-Location");
		$url = $headerArray[0];
		$url = $this->getBaseUrlWithoutPath() . $url;
		$response = HttpRequestHelper::get(
			$url,
			$this->getStepLineRef(),
			$user,
			$this->getPasswordForUser($user)
		);
		$contents = $response->getBody()->getContents();
		$result = \json_decode($contents, true);
		PHPUnit\Framework\Assert::assertNotNull($result, "'$contents' is not valid JSON");
		foreach ($table->getTable() as $row) {
			$expectedKey = $row[0];
			Assert::assertArrayHasKey(
				$expectedKey,
				$result,
				"response does not have expected key '$expectedKey'"
			);
			$expectedValue = $this->substituteInLineCodes(
				$row[1],
				$user,
				['preg_quote' => ['/']]
			);
			Assert::assertNotFalse(
				(bool) \preg_match($expectedValue, (string)$result[$expectedKey]),
				"'$expectedValue' does not match '$result[$expectedKey]'"
			);
		}
	}

	/**
	 * @Then /^as "([^"]*)" (file|folder|entry) "([^"]*)" should not exist$/
	 *
	 * @param string $user
	 * @param string $entry
	 * @param string|null $path
	 * @param string $type
	 *
	 * @return ResponseInterface
	 * @throws Exception
	 */
	public function asFileOrFolderShouldNotExist(
		string $user,
		string $entry = "file",
		?string $path = null,
		string $type = "files"
	):ResponseInterface {
		$user = $this->getActualUsername($user);
		$path = $this->substituteInLineCodes($path);
		$response = $this->listFolder(
			$user,
			$path,
			'0',
			null,
			$type
		);
		$statusCode = $response->getStatusCode();
		if ($statusCode < 401 || $statusCode > 404) {
			try {
				$this->responseXmlObject = HttpRequestHelper::getResponseXml(
					$response,
					__METHOD__
				);
			} catch (Exception $e) {
				Assert::fail(
					"$entry '$path' should not exist. But API returned $statusCode without XML in the body"
				);
			}
			Assert::assertTrue(
				$this->isEtagValid(),
				"$entry '$path' should not exist. But API returned $statusCode without an etag in the body"
			);
			$isCollection = $this->getResponseXmlObject()->xpath("//d:prop/d:resourcetype/d:collection");
			if (\count($isCollection) === 0) {
				$actualResourceType = "file";
			} else {
				$actualResourceType = "folder";
			}
			Assert::fail(
				"$entry '$path' should not exist. But it does exist and is a $actualResourceType"
			);
		}
		return $response;
	}

	/**
	 * @Then /^as "([^"]*)" the following (files|folders) should not exist$/
	 *
	 * @param string $user
	 * @param string $entry
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function followingFilesShouldNotExist(
		string $user,
		string $entry,
		TableNode $table
	):void {
		$this->verifyTableNodeColumns($table, ["path"]);
		$paths = $table->getHash();
		$entry = \rtrim($entry, "s");

		foreach ($paths as $file) {
			$this->asFileOrFolderShouldNotExist($user, $entry, $file["path"]);
		}
	}

	/**
	 * @Then /^as "([^"]*)" (file|folder|entry) "([^"]*)" should exist$/
	 *
	 * @param string $user
	 * @param string $entry
	 * @param string $path
	 * @param string $type
	 *
	 * @return void
	 * @throws Exception
	 */
	public function asFileOrFolderShouldExist(
		string $user,
		string $entry,
		string $path,
		string $type = "files"
	):void {
		$user = $this->getActualUsername($user);
		$path = $this->substituteInLineCodes($path);
		$this->responseXmlObject = $this->listFolderAndReturnResponseXml(
			$user,
			$path,
			'0',
			null,
			$type
		);
		Assert::assertTrue(
			$this->isEtagValid(),
			"$entry '$path' expected to exist for user $user but not found"
		);
		$isCollection = $this->getResponseXmlObject()->xpath("//d:prop/d:resourcetype/d:collection");
		if ($entry === "folder") {
			Assert::assertEquals(\count($isCollection), 1, "Unexpectedly, `$path` is not a folder");
		} elseif ($entry === "file") {
			Assert::assertEquals(\count($isCollection), 0, "Unexpectedly, `$path` is not a file");
		}
	}

	/**
	 * @Then /^as "([^"]*)" the following (files|folders) should exist$/
	 *
	 * @param string $user
	 * @param string $entry
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function followingFilesOrFoldersShouldExist(
		string $user,
		string $entry,
		TableNode $table
	):void {
		$this->verifyTableNodeColumns($table, ["path"]);
		$paths = $table->getHash();
		$entry = \rtrim($entry, "s");

		foreach ($paths as $file) {
			$this->asFileOrFolderShouldExist($user, $entry, $file["path"]);
		}
	}

	/**
	 *
	 * @param string $user
	 * @param string $entry
	 * @param string $path
	 * @param string $type
	 *
	 * @return bool
	 */
	public function fileOrFolderExists(
		string $user,
		string $entry,
		string $path,
		string $type = "files"
	):bool {
		try {
			$this->asFileOrFolderShouldExist($user, $entry, $path, $type);
			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * @Then /^as "([^"]*)" exactly one of these (files|folders|entries) should exist$/
	 *
	 * @param string $user
	 * @param string $entries
	 * @param TableNode $table of file, folder or entry paths
	 *
	 * @return void
	 * @throws Exception
	 */
	public function asExactlyOneOfTheseFilesOrFoldersShouldExist(string $user, string $entries, TableNode $table):void {
		$numEntriesThatExist = 0;
		foreach ($table->getTable() as $row) {
			$path = $this->substituteInLineCodes($row[0]);
			$this->responseXmlObject = $this->listFolderAndReturnResponseXml(
				$user,
				$path,
				'0'
			);
			if ($this->isEtagValid()) {
				$numEntriesThatExist = $numEntriesThatExist + 1;
			}
		}
		Assert::assertEquals(
			1,
			$numEntriesThatExist,
			"exactly one of these $entries should exist but found $numEntriesThatExist $entries"
		);
	}

	/**
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $folderDepth requires 1 to see elements without children
	 * @param array|null $properties
	 * @param string $type
	 *
	 * @return ResponseInterface
	 * @throws Exception
	 */
	public function listFolder(
		string $user,
		string $path,
		string $folderDepth,
		?array $properties = null,
		string $type = "files"
	):ResponseInterface {
		$user = $this->getActualUsername($user);
		if ($this->customDavPath !== null) {
			$path = $this->customDavPath . $path;
		}

		return WebDavHelper::listFolder(
			$this->getBaseUrl(),
			$this->getActualUsername($user),
			$this->getPasswordForUser($user),
			$path,
			$folderDepth,
			$this->getStepLineRef(),
			$properties,
			$type,
			($this->usingOldDavPath) ? 1 : 2
		);
	}

	/**
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $folderDepth requires 1 to see elements without children
	 * @param array|null $properties
	 * @param string $type
	 *
	 * @return SimpleXMLElement
	 * @throws Exception
	 */
	public function listFolderAndReturnResponseXml(
		string $user,
		string $path,
		string $folderDepth,
		?array $properties = null,
		string $type = "files"
	):SimpleXMLElement {
		return HttpRequestHelper::getResponseXml(
			$this->listFolder(
				$user,
				$path,
				$folderDepth,
				$properties,
				$type
			),
			__METHOD__
		);
	}

	/**
	 * @Then /^user "([^"]*)" should (not|)\s?see the following elements$/
	 *
	 * @param string $user
	 * @param string $shouldOrNot
	 * @param TableNode $elements
	 *
	 * @return void
	 * @throws InvalidArgumentException|Exception
	 *
	 */
	public function userShouldSeeTheElements(string $user, string $shouldOrNot, TableNode $elements):void {
		$should = ($shouldOrNot !== "not");
		$this->checkElementList($user, $elements, $should);
	}

	/**
	 * @Then /^user "([^"]*)" should not see the following elements if the upper and lower case username are different/
	 *
	 * @param string $user
	 * @param TableNode $elements
	 *
	 * @return void
	 * @throws InvalidArgumentException|Exception
	 *
	 */
	public function userShouldNotSeeTheElementsIfUpperAndLowerCaseUsernameDifferent(string $user, TableNode $elements):void {
		$effectiveUser = $this->getActualUsername($user);
		if (\strtoupper($effectiveUser) === \strtolower($effectiveUser)) {
			$expectedToBeListed = true;
		} else {
			$expectedToBeListed = false;
		}
		$this->checkElementList($user, $elements, $expectedToBeListed);
	}

	/**
	 * asserts that a the user can or cannot see a list of files/folders by propfind
	 *
	 * @param string $user
	 * @param TableNode $elements
	 * @param boolean $expectedToBeListed
	 *
	 * @return void
	 * @throws InvalidArgumentException
	 * @throws Exception
	 *
	 */
	public function checkElementList(
		string $user,
		TableNode $elements,
		bool $expectedToBeListed = true
	):void {
		$user = $this->getActualUsername($user);
		$this->verifyTableNodeColumnsCount($elements, 1);
		$responseXmlObject = $this->listFolderAndReturnResponseXml(
			$user,
			"/",
			"infinity"
		);
		$elementRows = $elements->getRows();
		$elementsSimplified = $this->simplifyArray($elementRows);
		foreach ($elementsSimplified as $expectedElement) {
			// Allow the table of expected elements to have entries that do
			// not have to specify the "implied" leading slash, or have multiple
			// leading slashes, to make scenario outlines more flexible
			$expectedElement = $this->encodePath($expectedElement);
			$expectedElement = "/" . \ltrim($expectedElement, "/");
			$webdavPath = "/" . $this->getFullDavFilesPath($user) . $expectedElement;
			$element = $responseXmlObject->xpath(
				"//d:response/d:href[text() = \"$webdavPath\"]"
			);
			if ($expectedToBeListed
				&& (!isset($element[0]) || $element[0]->__toString() !== $webdavPath)
			) {
				Assert::fail(
					"$webdavPath is not in propfind answer but should be"
				);
			} elseif (!$expectedToBeListed && isset($element[0])
			) {
				Assert::fail(
					"$webdavPath is in propfind answer but should not be"
				);
			}
		}
	}

	/**
	 * @When user :user uploads file :source to :destination using the WebDAV API
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 */
	public function userUploadsAFileTo(string $user, string $source, string $destination):void {
		$user = $this->getActualUsername($user);
		$file = \fopen($this->acceptanceTestsDirLocation() . $source, 'r');
		$this->pauseUploadDelete();
		$this->response = $this->makeDavRequest(
			$user,
			"PUT",
			$destination,
			[],
			$file
		);
		$this->lastUploadDeleteTime = \time();
		$this->setResponseXml(
			HttpRequestHelper::parseResponseAsXml($this->response)
		);
	}

	/**
	 * @Given user :user has uploaded file :source to :destination
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 */
	public function userHasUploadedAFileTo(string $user, string $source, string $destination):void {
		$this->userUploadsAFileTo($user, $source, $destination);
		$this->theHTTPStatusCodeShouldBe(
			["201", "204"],
			"HTTP status code was not 201 or 204 while trying to upload file '$source' to '$destination' for user '$user'"
		);
	}

	/**
	 * @When the user uploads file :source to :destination using the WebDAV API
	 *
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 */
	public function theUserUploadsAFileTo(string $source, string $destination):void {
		$this->userUploadsAFileTo($this->currentUser, $source, $destination);
	}

	/**
	 * @Given the user has uploaded file :source to :destination
	 *
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 */
	public function theUserHasUploadedFileTo(string $source, string $destination):void {
		$this->theUserUploadsAFileTo($source, $destination);
		$this->theHTTPStatusCodeShouldBe(
			["201", "204"],
			"HTTP status code was not 201 or 204 while trying to upload file '$source' to '$destination'"
		);
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
	public function userOnUploadsAFileTo(string $user, string $server, string $source, string $destination):void {
		$previousServer = $this->usingServer($server);
		$this->userUploadsAFileTo($user, $source, $destination);
		$this->usingServer($previousServer);
	}

	/**
	 * @Given /^user "([^"]*)" on "(LOCAL|REMOTE)" has uploaded file "([^"]*)" to "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $server
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 */
	public function userOnHasUploadedAFileTo(string $user, string $server, string $source, string $destination):void {
		$this->userOnUploadsAFileTo($user, $server, $source, $destination);
		$this->theHTTPStatusCodeShouldBe(
			["201", "204"],
			"HTTP status code was not 201 or 204 while trying to upload file '$source' to '$destination' for user '$user' on server '$server'"
		);
	}

	/**
	 * Upload file as a user with different headers
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 * @param array|null $headers
	 * @param int|null $noOfChunks Only use for chunked upload when $this->chunkingToUse is not null
	 *
	 * @return void
	 * @throws Exception
	 */
	public function uploadFileWithHeaders(
		string $user,
		string $source,
		string $destination,
		?array $headers = [],
		?int $noOfChunks = 0
	):void {
		$chunkingVersion = $this->chunkingToUse;
		if ($noOfChunks <= 0) {
			$chunkingVersion = null;
		}
		try {
			$this->responseXml = [];
			$this->pauseUploadDelete();
			$this->response = UploadHelper::upload(
				$this->getBaseUrl(),
				$this->getActualUsername($user),
				$this->getUserPassword($user),
				$source,
				$destination,
				$this->getStepLineRef(),
				$headers,
				($this->usingOldDavPath) ? 1 : 2,
				$chunkingVersion,
				$noOfChunks
			);
			$this->lastUploadDeleteTime = \time();
		} catch (BadResponseException $e) {
			// 4xx and 5xx responses cause an exception
			$this->response = $e->getResponse();
		}
	}

	/**
	 * @When /^user "([^"]*)" uploads file "([^"]*)" to "([^"]*)" in (\d+) chunks (?:with (new|old|v1|v2) chunking and)?\s?using the WebDAV API$/
	 * @When user :user uploads file :source to :destination with chunks using the WebDAV API
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 * @param int $noOfChunks
	 * @param string|null $chunkingVersion old|v1|new|v2 null for autodetect
	 * @param bool $async use asynchronous move at the end or not
	 * @param array|null $headers
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userUploadsAFileToWithChunks(
		string $user,
		string $source,
		string $destination,
		int $noOfChunks = 2,
		?string $chunkingVersion = null,
		bool $async = false,
		?array $headers = []
	):void {
		$user = $this->getActualUsername($user);
		Assert::assertGreaterThan(
			0,
			$noOfChunks,
			"What does it mean to have $noOfChunks chunks?"
		);
		//use the chunking version that works with the set DAV version
		if ($chunkingVersion === null) {
			if ($this->usingOldDavPath) {
				$chunkingVersion = "v1";
			} else {
				$chunkingVersion = "v2";
			}
		}
		$this->useSpecificChunking($chunkingVersion);
		Assert::assertTrue(
			WebDavHelper::isValidDavChunkingCombination(
				($this->usingOldDavPath) ? 1 : 2,
				$this->chunkingToUse
			),
			"invalid chunking/webdav version combination"
		);

		if ($async === true) {
			$headers['OC-LazyOps'] = 'true';
		}
		$this->uploadFileWithHeaders(
			$user,
			$this->acceptanceTestsDirLocation() . $source,
			$destination,
			$headers,
			$noOfChunks
		);
	}

	/**
	 * @When /^user "([^"]*)" uploads file "([^"]*)" asynchronously to "([^"]*)" in (\d+) chunks (?:with (new|old|v1|v2) chunking and)?\s?using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 * @param int $noOfChunks
	 * @param string|null $chunkingVersion old|v1|new|v2 null for autodetect
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userUploadsAFileAsyncToWithChunks(
		string $user,
		string $source,
		string $destination,
		int $noOfChunks = 2,
		?string $chunkingVersion = null
	):void {
		$user = $this->getActualUsername($user);
		$this->userUploadsAFileToWithChunks(
			$user,
			$source,
			$destination,
			$noOfChunks,
			$chunkingVersion,
			true
		);
	}

	/**
	 * sets the chunking version from human readable format
	 *
	 * @param string $version (no|v1|v2|new|old)
	 *
	 * @return void
	 */
	public function useSpecificChunking(string $version):void {
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
	 * Uploading with old/new DAV and chunked/non-chunked.
	 *
	 * @When user :user uploads file :source to filenames based on :destination with all mechanisms using the WebDAV API
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userUploadsAFileToWithAllMechanisms(
		string $user,
		string $source,
		string $destination
	):void {
		$user = $this->getActualUsername($user);
		$this->uploadResponses = UploadHelper::uploadWithAllMechanisms(
			$this->getBaseUrl(),
			$this->getActualUsername($user),
			$this->getUserPassword($user),
			$this->acceptanceTestsDirLocation() . $source,
			$destination,
			$this->getStepLineRef()
		);
	}

	/**
	 * Uploading with old/new DAV and chunked/non-chunked.
	 * Except do not do the new-DAV-new-chunking combination. That is not being
	 * supported on all implementations.
	 *
	 * @When user :user uploads file :source to filenames based on :destination with all mechanisms except new chunking using the WebDAV API
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userUploadsAFileToWithAllMechanismsExceptNewChunking(
		string $user,
		string $source,
		string $destination
	):void {
		$user = $this->getActualUsername($user);
		$this->uploadResponses = UploadHelper::uploadWithAllMechanisms(
			$this->getBaseUrl(),
			$this->getActualUsername($user),
			$this->getUserPassword($user),
			$this->acceptanceTestsDirLocation() . $source,
			$destination,
			$this->getStepLineRef(),
			false,
			'new'
		);
	}

	/**
	 * Overwriting with old/new DAV and chunked/non-chunked.
	 *
	 * @When user :user overwrites from file :source to file :destination with all mechanisms using the WebDAV API
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userOverwritesAFileToWithAllMechanisms(
		string $user,
		string $source,
		string $destination
	):void {
		$user = $this->getActualUsername($user);
		$this->uploadResponses = UploadHelper::uploadWithAllMechanisms(
			$this->getBaseUrl(),
			$this->getActualUsername($user),
			$this->getUserPassword($user),
			$this->acceptanceTestsDirLocation() . $source,
			$destination,
			$this->getStepLineRef(),
			true
		);
	}

	/**
	 * Overwriting with old/new DAV and chunked/non-chunked.
	 * Except do not do the new-DAV-new-chunking combination. That is not being
	 * supported on all implementations.
	 *
	 * @When user :user overwrites from file :source to file :destination with all mechanisms except new chunking using the WebDAV API
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userOverwritesAFileToWithAllMechanismsExceptNewChunking(
		string $user,
		string $source,
		string $destination
	):void {
		$user = $this->getActualUsername($user);
		$this->uploadResponses = UploadHelper::uploadWithAllMechanisms(
			$this->getBaseUrl(),
			$this->getActualUsername($user),
			$this->getUserPassword($user),
			$this->acceptanceTestsDirLocation() . $source,
			$destination,
			$this->getStepLineRef(),
			true,
			'new'
		);
	}

	/**
	 * @Then /^the HTTP status code of all upload responses should be "([^"]*)"$/
	 *
	 * @param int $statusCode
	 *
	 * @return void
	 */
	public function theHTTPStatusCodeOfAllUploadResponsesShouldBe(int $statusCode):void {
		foreach ($this->uploadResponses as $response) {
			Assert::assertEquals(
				$statusCode,
				$response->getStatusCode(),
				'Response did not return expected status code'
			);
		}
	}

	/**
	 * @Then the HTTP status code of responses on all endpoints should be :statusCode
	 *
	 * @param int $statusCode
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theHTTPStatusCodeOfResponsesOnAllEndpointsShouldBe(int $statusCode):void {
		$duplicateRemovedStatusCodes = \array_unique($this->lastHttpStatusCodesArray);
		if (\count($duplicateRemovedStatusCodes) === 1) {
			Assert::assertSame(
				\intval($statusCode),
				\intval($duplicateRemovedStatusCodes[0]),
				'Responses did not return expected http status code'
			);
		} else {
			throw new Exception(
				'Expected same but found different http status codes of last requested responses.' .
				'Found status codes: ' . \implode(',', $this->lastHttpStatusCodesArray)
			);
		}
	}

	/**
	 * @Then the HTTP status code of responses on all endpoints should be :statusCode1 or :statusCode2
	 *
	 * @param string $statusCode1
	 * @param string $statusCode2
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theHTTPStatusCodeOfResponsesOnAllEndpointsShouldBeOr(string $statusCode1, string $statusCode2):void {
		$duplicateRemovedStatusCodes = \array_unique($this->lastHttpStatusCodesArray);
		foreach ($duplicateRemovedStatusCodes as $status) {
			$status = (string)$status;
			if (($status != $statusCode1) && ($status != $statusCode2)) {
				Assert::fail("Unexpected status code received " . $status);
			}
		}
	}

	/**
	 * @Then the OCS status code of responses on all endpoints should be :statusCode
	 *
	 * @param $statusCode
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theOCSStatusCodeOfResponsesOnAllEndpointsShouldBe(string $statusCode):void {
		$duplicateRemovedStatusCodes = \array_unique($this->lastOCSStatusCodesArray);
		if (\count($duplicateRemovedStatusCodes) === 1) {
			Assert::assertSame(
				\intval($statusCode),
				\intval($duplicateRemovedStatusCodes[0]),
				'Responses did not return expected ocs status code'
			);
		} else {
			throw new Exception(
				'Expected same but found different ocs status codes of last requested responses.' .
				'Found status codes: ' . \implode(',', $this->lastOCSStatusCodesArray)
			);
		}
	}

	/**
	 * @Then /^the HTTP reason phrase of all upload responses should be "([^"]*)"$/
	 *
	 * @param string $reasonPhrase
	 *
	 * @return void
	 */
	public function theHTTPReasonPhraseOfAllUploadResponsesShouldBe(string $reasonPhrase):void {
		foreach ($this->uploadResponses as $response) {
			Assert::assertEquals(
				$reasonPhrase,
				$response->getReasonPhrase(),
				'Response did not return expected reason phrase'
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
	 * @throws Exception
	 */
	public function userShouldBeAbleToUploadFileTo(string $user, string $source, string $destination):void {
		$user = $this->getActualUsername($user);
		$this->userUploadsAFileTo($user, $source, $destination);
		$this->asFileOrFolderShouldExist($user, "file", $destination);
	}

	/**
	 * @Then the following users should be able to upload file :source to :destination
	 *
	 * @param string $source
	 * @param string $destination
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function usersShouldBeAbleToUploadFileTo(
		string $source,
		string $destination,
		TableNode $table
	):void {
		$this->verifyTableNodeColumns($table, ["username"]);
		$usernames = $table->getHash();
		foreach ($usernames as $username) {
			$actualUser = $this->getActualUsername($username["username"]);
			$this->userUploadsAFileTo($actualUser, $source, $destination);
			$this->asFileOrFolderShouldExist($actualUser, "file", $destination);
		}
	}

	/**
	 * @Then user :user should not be able to upload file :source to :destination
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserShouldNotBeAbleToUploadFileTo(string $user, string $source, string $destination):void {
		$fileAlreadyExists = $this->fileOrFolderExists($user, "file", $destination);
		if ($fileAlreadyExists) {
			$this->downloadFileAsUserUsingPassword($user, $destination);
			$initialContent = (string) $this->response->getBody();
		}
		$this->userUploadsAFileTo($user, $source, $destination);
		$this->theHTTPStatusCodeShouldBe(["403", "423"]);
		if ($fileAlreadyExists) {
			$this->downloadFileAsUserUsingPassword($user, $destination);
			$currentContent = (string) $this->response->getBody();
			Assert::assertSame(
				$initialContent,
				$currentContent,
				__METHOD__ . " user $user was unexpectedly able to upload $source to $destination - the content has changed:"
			);
		} else {
			$this->asFileOrFolderShouldNotExist($user, "file", $destination);
		}
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
		int $minStatusCode,
		int $maxStatusCode
	):void {
		foreach ($this->uploadResponses as $response) {
			Assert::assertGreaterThanOrEqual(
				$minStatusCode,
				$response->getStatusCode(),
				'Response did not return expected status code'
			);
			Assert::assertLessThanOrEqual(
				$maxStatusCode,
				$response->getStatusCode(),
				'Response did not return expected status code'
			);
		}
	}

	/**
	 * Check that all the files uploaded with old/new DAV and chunked/non-chunked exist.
	 *
	 * @Then /^as "([^"]*)" the files uploaded to "([^"]*)" with all mechanisms should (not|)\s?exist$/
	 *
	 * @param string $user
	 * @param string $destination
	 * @param string $shouldOrNot
	 * @param string|null $exceptChunkingType empty string or "old" or "new"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function filesUploadedToWithAllMechanismsShouldExist(
		string $user,
		string $destination,
		string $shouldOrNot,
		?string $exceptChunkingType = ''
	):void {
		switch ($exceptChunkingType) {
			case 'old':
				$exceptChunkingSuffix = 'olddav-oldchunking';
				break;
			case 'new':
				$exceptChunkingSuffix = 'newdav-newchunking';
				break;
			default:
				$exceptChunkingSuffix = '';
				break;
		}

		if ($shouldOrNot !== "not") {
			foreach (['old', 'new'] as $davVersion) {
				foreach (["{$davVersion}dav-regular", "{$davVersion}dav-{$davVersion}chunking"] as $suffix) {
					if ($suffix !== $exceptChunkingSuffix) {
						$this->asFileOrFolderShouldExist(
							$user,
							'file',
							"$destination-$suffix"
						);
					}
				}
			}
		} else {
			foreach (['old', 'new'] as $davVersion) {
				foreach (["{$davVersion}dav-regular", "{$davVersion}dav-{$davVersion}chunking"] as $suffix) {
					if ($suffix !== $exceptChunkingSuffix) {
						$this->asFileOrFolderShouldNotExist(
							$user,
							'file',
							"$destination-$suffix"
						);
					}
				}
			}
		}
	}

	/**
	 * Check that all the files uploaded with old/new DAV and chunked/non-chunked exist.
	 * Except do not check the new-DAV-new-chunking combination. That is not being
	 * supported on all implementations.
	 *
	 * @Then /^as "([^"]*)" the files uploaded to "([^"]*)" with all mechanisms except new chunking should (not|)\s?exist$/
	 *
	 * @param string $user
	 * @param string $destination
	 * @param string $shouldOrNot
	 *
	 * @return void
	 * @throws Exception
	 */
	public function filesUploadedToWithAllMechanismsExceptNewChunkingShouldExist(
		string $user,
		string $destination,
		string $shouldOrNot
	):void {
		$this->filesUploadedToWithAllMechanismsShouldExist(
			$user,
			$destination,
			$shouldOrNot,
			'new'
		);
	}

	/**
	 * @Then /^as user "([^"]*)" on server "([^"]*)" the files uploaded to "([^"]*)" with all mechanisms should (not|)\s?exist$/
	 *
	 * @param string $user
	 * @param string $server
	 * @param string $destination
	 * @param string $shouldOrNot
	 *
	 * @return void
	 * @throws Exception
	 */
	public function asUserOnServerTheFilesUploadedToWithAllMechanismsShouldExit(
		string $user,
		string $server,
		string $destination,
		string $shouldOrNot
	):void {
		$previousServer = $this->usingServer($server);
		$this->filesUploadedToWithAllMechanismsShouldExist($user, $destination, $shouldOrNot);
		$this->usingServer($previousServer);
	}

	/**
	 * @Given user :user has uploaded file :destination of size :bytes bytes
	 *
	 * @param string $user
	 * @param string $destination
	 * @param string $bytes
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasUploadedFileToOfSizeBytes(string $user, string $destination, string $bytes):void {
		$user = $this->getActualUsername($user);
		$this->userUploadsAFileToOfSizeBytes($user, $destination, $bytes);
		$expectedElements = new TableNode([["$destination"]]);
		$this->checkElementList($user, $expectedElements);
	}

	/**
	 * @When user :user uploads file :destination of size :bytes bytes
	 *
	 * @param string $user
	 * @param string $destination
	 * @param string $bytes
	 *
	 * @return void
	 */
	public function userUploadsAFileToOfSizeBytes(string $user, string $destination, string $bytes):void {
		$this->userUploadsAFileToEndingWithOfSizeBytes($user, $destination, 'a', $bytes);
	}

	/**
	 * @Given user :user has uploaded file :destination ending with :text of size :bytes bytes
	 *
	 * @param string $user
	 * @param string $destination
	 * @param string $text
	 * @param string $bytes
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasUploadedFileToEndingWithOfSizeBytes(string $user, string $destination, string $text, string $bytes):void {
		$this->userUploadsAFileToEndingWithOfSizeBytes($user, $destination, $text, $bytes);
		$expectedElements = new TableNode([["$destination"]]);
		$this->checkElementList($user, $expectedElements);
	}

	/**
	 * @When user :user uploads file :destination ending with :text of size :bytes bytes
	 *
	 * @param string $user
	 * @param string $destination
	 * @param string $text
	 * @param string $bytes
	 *
	 * @return void
	 */
	public function userUploadsAFileToEndingWithOfSizeBytes(string $user, string $destination, string $text, string $bytes):void {
		$filename = "filespecificSize.txt";
		$this->createLocalFileOfSpecificSize($filename, $bytes, $text);
		Assert::assertFileExists($this->workStorageDirLocation() . $filename);
		$this->userUploadsAFileTo(
			$user,
			$this->temporaryStorageSubfolderName() . "/$filename",
			$destination
		);
		$this->removeFile($this->workStorageDirLocation(), $filename);
	}

	/**
	 * @When user :user uploads to these filenames with content :content using the webDAV API then the results should be as listed
	 *
	 * @param string $user
	 * @param string $content
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userUploadsFilesWithContentTo(
		string $user,
		string $content,
		TableNode $table
	):void {
		$user = $this->getActualUsername($user);
		foreach ($table->getHash() as $row) {
			$this->userUploadsAFileWithContentTo(
				$user,
				$content,
				$row['filename']
			);
			$this->theHTTPStatusCodeShouldBe(
				$row['http-code'],
				"HTTP status code was not the expected value " . $row['http-code'] . " while trying to upload " . $row['filename']
			);
			if ($row['exists'] === "yes") {
				$this->asFileOrFolderShouldExist($user, "file", $row['filename']);
			} else {
				$this->asFileOrFolderShouldNotExist($user, "file", $row['filename']);
			}
		}
	}

	/**
	 * @param string $user
	 * @param string|null $content
	 * @param string $destination
	 *
	 * @return string[]
	 */
	public function uploadFileWithContent(
		string $user,
		?string $content,
		string $destination
	): array {
		$user = $this->getActualUsername($user);
		$this->pauseUploadDelete();
		$this->response = $this->makeDavRequest(
			$user,
			"PUT",
			$destination,
			[],
			$content
		);
		$this->setResponseXml(
			HttpRequestHelper::parseResponseAsXml($this->response)
		);
		$this->lastUploadDeleteTime = \time();
		return $this->response->getHeader('oc-fileid');
	}

	/**
	 * @When the administrator uploads file with content :content to :destination using the WebDAV API
	 *
	 * @param string|null $content
	 * @param string $destination
	 *
	 * @return string[]
	 */
	public function adminUploadsAFileWithContentTo(
		?string $content,
		string $destination
	):array {
		return $this->uploadFileWithContent($this->getAdminUsername(), $content, $destination);
	}

	/**
	 * @Given the administrator has uploaded file with content :content to :destination
	 *
	 * @param string|null $content
	 * @param string $destination
	 *
	 * @return string[]
	 */
	public function adminHasUploadedAFileWithContentTo(
		?string $content,
		string $destination
	):array {
		$fileId = $this->uploadFileWithContent($this->getAdminUsername(), $content, $destination);
		$this->theHTTPStatusCodeShouldBe(
			["201", "204"],
			"HTTP status code was not 201 or 204 while trying to upload file '$destination'"
		);
		return $fileId;
	}

	/**
	 * @When user :user uploads file with content :content to :destination using the WebDAV API
	 *
	 * @param string $user
	 * @param string|null $content
	 * @param string $destination
	 *
	 * @return string[]
	 */
	public function userUploadsAFileWithContentTo(
		string $user,
		?string $content,
		string $destination
	):array {
		return $this->uploadFileWithContent($user, $content, $destination);
	}

	/**
	 * @When /^user "([^"]*)" uploads the following files with content "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string|null $content
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userUploadsFollowingFilesWithContentTo(
		string $user,
		?string $content,
		TableNode $table
	):void {
		$this->verifyTableNodeColumns($table, ["path"]);
		$paths = $table->getHash();

		foreach ($paths as $destination) {
			$this->uploadFileWithContent($user, $content, $destination["path"]);
			$this->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @When user :user uploads file :source to :destination with mtime :mtime using the WebDAV API
	 * @Given user :user has uploaded file :source to :destination with mtime :mtime using the WebDAV API
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 * @param string $mtime Time in human readable format is taken as input which is converted into milliseconds that is used by API
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userUploadsFileToWithMtimeUsingTheWebdavApi(
		string $user,
		string $source,
		string $destination,
		string $mtime
	):void {
		$mtime = new DateTime($mtime);
		$mtime = $mtime->format('U');
		$user = $this->getActualUsername($user);
		$this->response = UploadHelper::upload(
			$this->getBaseUrl(),
			$user,
			$this->getPasswordForUser($user),
			$this->acceptanceTestsDirLocation() . $source,
			$destination,
			$this->getStepLineRef(),
			["X-OC-Mtime" => $mtime]
		);
	}

	/**
	 * @Given user :user has uploaded file :filename with content :content and mtime of :days days ago using the WebDAV API
	 *
	 * @param string $user
	 * @param string $filename
	 * @param string $content
	 * @param string $days In days, e.g. "7"
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userUploadsFileWithContentAndWithMtimeOfDaysAgoUsingWebdavApi(
		string $user,
		string $filename,
		string $content,
		string $days
	): void {
		$today = new DateTime();
		$interval = new DateInterval('P' . $days . 'D');
		$mtime = $today->sub($interval)->format('U');

		$user = $this->getActualUsername($user);

		$this->response = WebDavHelper::makeDavRequest(
			$this->getBaseUrl(),
			$user,
			$this->getPasswordForUser($user),
			"PUT",
			$filename,
			["X-OC-Mtime" => $mtime],
			$this->getStepLineRef(),
			$content
		);
	}

	/**
	 * @Then as :user the mtime of the file :resource should be :mtime
	 *
	 * @param string $user
	 * @param string $resource
	 * @param string $mtime
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theMtimeOfTheFileShouldBe(
		string $user,
		string $resource,
		string $mtime
	):void {
		$user = $this->getActualUsername($user);
		$password = $this->getPasswordForUser($user);
		$baseUrl = $this->getBaseUrl();
		$mtime = new DateTime($mtime);
		$mtime = $mtime->format('U');
		Assert::assertEquals(
			$mtime,
			WebDavHelper::getMtimeOfResource(
				$user,
				$password,
				$baseUrl,
				$resource,
				$this->getStepLineRef()
			)
		);
	}

	/**
	 * @Then as :user the mtime of the file :resource should not be :mtime
	 *
	 * @param string $user
	 * @param string $resource
	 * @param string $mtime
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theMtimeOfTheFileShouldNotBe(
		string $user,
		string $resource,
		string $mtime
	):void {
		$user = $this->getActualUsername($user);
		$password = $this->getPasswordForUser($user);
		$baseUrl = $this->getBaseUrl();
		$mtime = new DateTime($mtime);
		$mtime = $mtime->format('U');
		Assert::assertNotEquals(
			$mtime,
			WebDavHelper::getMtimeOfResource(
				$user,
				$password,
				$baseUrl,
				$resource,
				$this->getStepLineRef()
			)
		);
	}

	/**
	 * @Given user :user has uploaded file with content :content to :destination
	 *
	 * @param string $user
	 * @param string|null $content
	 * @param string $destination
	 *
	 * @return string[]
	 */
	public function userHasUploadedAFileWithContentTo(
		string $user,
		?string $content,
		string $destination
	):array {
		$user = $this->getActualUsername($user);
		$fileId = $this->uploadFileWithContent($user, $content, $destination);
		$this->theHTTPStatusCodeShouldBe(
			["201", "204"],
			"HTTP status code was not 201 or 204 while trying to upload file '$destination' for user '$user'"
		);
		return $fileId;
	}

	/**
	 * @Given /^user "([^"]*)" has uploaded the following files with content "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string|null $content
	 * @param TableNode $table
	 *
	 * @return array
	 * @throws Exception
	 */
	public function userHasUploadedFollowingFiles(
		string $user,
		?string $content,
		TableNode $table
	):array {
		$this->verifyTableNodeColumns($table, ["path"]);
		$files = $table->getHash();

		$fileIds = [];
		foreach ($files as $destination) {
			$fileId = $this->userHasUploadedAFileWithContentTo($user, $content, $destination["path"])[0];
			\array_push($fileIds, $fileId);
		}

		return $fileIds;
	}

	/**
	 * @When user :user uploads a file with content :content and mtime :mtime to :destination using the WebDAV API
	 *
	 * @param string $user
	 * @param string|null $content
	 * @param string $mtime
	 * @param string $destination
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userUploadsAFileWithContentAndMtimeTo(
		string $user,
		?string $content,
		string $mtime,
		string $destination
	):void {
		$user = $this->getActualUsername($user);
		$mtime = new DateTime($mtime);
		$mtime = $mtime->format('U');
		$this->makeDavRequest(
			$user,
			"PUT",
			$destination,
			["X-OC-Mtime" => $mtime],
			$content
		);
		$this->theHTTPStatusCodeShouldBe(
			["201", "204"],
			"HTTP status code was not 201 or 204 while trying to upload file '$destination' with mtime $mtime for user '$user'"
		);
	}

	/**
	 * @When user :user uploads file with checksum :checksum and content :content to :destination using the WebDAV API
	 *
	 * @param string $user
	 * @param string $checksum
	 * @param string|null $content
	 * @param string $destination
	 *
	 * @return void
	 */
	public function userUploadsAFileWithChecksumAndContentTo(
		string $user,
		string $checksum,
		?string $content,
		string $destination
	):void {
		$this->pauseUploadDelete();
		$this->response = $this->makeDavRequest(
			$user,
			"PUT",
			$destination,
			['OC-Checksum' => $checksum],
			$content
		);
		$this->lastUploadDeleteTime = \time();
	}

	/**
	 * @Given user :user has uploaded file with checksum :checksum and content :content to :destination
	 *
	 * @param string $user
	 * @param string $checksum
	 * @param string|null $content
	 * @param string $destination
	 *
	 * @return void
	 */
	public function userHasUploadedAFileWithChecksumAndContentTo(
		string $user,
		string $checksum,
		?string $content,
		string $destination
	):void {
		$this->userUploadsAFileWithChecksumAndContentTo(
			$user,
			$checksum,
			$content,
			$destination
		);
		$this->theHTTPStatusCodeShouldBe(
			["201", "204"],
			"HTTP status code was not 201 or 204 while trying to upload file with checksum '$checksum' to '$destination' for user '$user'"
		);
	}

	/**
	 * @Then /^user "([^"]*)" should be able to delete (file|folder|entry) "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $entry
	 * @param string $source
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userShouldBeAbleToDeleteEntry(string $user, string $entry, string $source):void {
		$user = $this->getActualUsername($user);
		$this->asFileOrFolderShouldExist($user, $entry, $source);
		$this->userDeletesFile($user, $source);
		$this->asFileOrFolderShouldNotExist($user, $entry, $source);
	}

	/**
	 * @Then /^user "([^"]*)" should not be able to delete (file|folder|entry) "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $entry
	 * @param string $source
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserShouldNotBeAbleToDeleteEntry(string $user, string $entry, string $source):void {
		$this->asFileOrFolderShouldExist($user, $entry, $source);
		$this->userDeletesFile($user, $source);
		$this->asFileOrFolderShouldExist($user, $entry, $source);
	}

	/**
	 * @Given file :file has been deleted for user :user
	 *
	 * @param string $file
	 * @param string $user
	 *
	 * @return void
	 */
	public function fileHasBeenDeleted(string $file, string $user):void {
		$this->userHasDeletedFile($user, "deleted", "file", $file);
	}

	/**
	 * @When /^user "([^"]*)" (?:deletes|unshares) (?:file|folder) "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $file
	 *
	 * @return void
	 */
	public function userDeletesFile(string $user, string $file):void {
		$user = $this->getActualUsername($user);
		$this->pauseUploadDelete();
		$this->response = $this->makeDavRequest($user, 'DELETE', $file, []);
		$this->lastUploadDeleteTime = \time();
	}

	/**
	 * @Given /^user "([^"]*)" has (deleted|unshared) (file|folder) "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $deletedOrUnshared
	 * @param string $fileOrFolder
	 * @param string $entry
	 *
	 * @return void
	 */
	public function userHasDeletedFile(string $user, string $deletedOrUnshared, string $fileOrFolder, string $entry):void {
		$user = $this->getActualUsername($user);
		$this->userDeletesFile($user, $entry);
		// If the file or folder was there and got deleted then we get a 204
		// That is good and the expected status
		// If the file or folder was already not there then then we get a 404
		// That is not expected. Scenarios that use "Given user has deleted..."
		// should only be using such steps when it is a file that exists and needs
		// to be deleted.
		if ($deletedOrUnshared === "deleted") {
			$deleteText = "delete";
		} else {
			$deleteText = "unshare";
		}

		$this->theHTTPStatusCodeShouldBe(
			["204"],
			"HTTP status code was not 204 while trying to $deleteText $fileOrFolder '$entry' for user '$user'"
		);
	}

	/**
	 * @Given /^user "([^"]*)" has (deleted|unshared) the following (files|folders|resources)$/
	 *
	 * @param string $user
	 * @param string $deletedOrUnshared
	 * @param string $fileOrFolder
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasDeletedFollowingFiles(string $user, string $deletedOrUnshared, string $fileOrFolder, TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["path"]);
		$paths = $table->getHash();

		foreach ($paths as $file) {
			$this->userHasDeletedFile($user, $deletedOrUnshared, $fileOrFolder, $file["path"]);
		}
	}

	/**
	 * @When /^user "([^"]*)" (?:deletes|unshares) the following (?:files|folders)$/
	 *
	 * @param string $user
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userDeletesFollowingFiles(string $user, TableNode $table):void {
		$user = $this->getActualUsername($user);
		$this->verifyTableNodeColumns($table, ["path"]);
		$paths = $table->getHash();

		foreach ($paths as $file) {
			$this->userDeletesFile($user, $file["path"]);
			$this->pushToLastStatusCodesArrays();
		}
	}

	/**
	 * @When /^the user (?:deletes|unshares) (?:file|folder) "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $file
	 *
	 * @return void
	 */
	public function theUserDeletesFile(string $file):void {
		$this->userDeletesFile($this->getCurrentUser(), $file);
	}

	/**
	 * @Given /^the user has (deleted|unshared) (file|folder) "([^"]*)"$/
	 *
	 * @param string $deletedOrUnshared
	 * @param string $fileOrFolder
	 * @param string $file
	 *
	 * @return void
	 */
	public function theUserHasDeletedFile(string $deletedOrUnshared, string $fileOrFolder, string $file):void {
		$this->userHasDeletedFile($this->getCurrentUser(), $deletedOrUnshared, $fileOrFolder, $file);
	}

	/**
	 * @When /^user "([^"]*)" (?:deletes|unshares) these (?:files|folders|entries) without delays using the WebDAV API$/
	 *
	 * @param string $user
	 * @param TableNode $table of files or folders to delete
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userDeletesFilesFoldersWithoutDelays(string $user, TableNode $table):void {
		$user = $this->getActualUsername($user);
		$this->verifyTableNodeColumnsCount($table, 1);
		foreach ($table->getTable() as $entry) {
			$entryName = $entry[0];
			$this->response = $this->makeDavRequest($user, 'DELETE', $entryName, []);
		}
		$this->lastUploadDeleteTime = \time();
	}

	/**
	 * @When /^the user (?:deletes|unshares) these (?:files|folders|entries) without delays using the WebDAV API$/
	 *
	 * @param TableNode $table of files or folders to delete
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserDeletesFilesFoldersWithoutDelays(TableNode $table):void {
		$this->userDeletesFilesFoldersWithoutDelays($this->getCurrentUser(), $table);
	}

	/**
	 * @When /^user "([^"]*)" on "(LOCAL|REMOTE)" (?:deletes|unshares) (?:file|folder) "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $server
	 * @param string $file
	 *
	 * @return void
	 */
	public function userOnDeletesFile(string $user, string $server, string $file):void {
		$previousServer = $this->usingServer($server);
		$this->userDeletesFile($user, $file);
		$this->usingServer($previousServer);
	}

	/**
	 * @Given /^user "([^"]*)" on "(LOCAL|REMOTE)" has (deleted|unshared) (file|folder) "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $server
	 * @param string $deletedOrUnshared
	 * @param string $fileOrFolder
	 * @param string $entry
	 *
	 * @return void
	 */
	public function userOnHasDeletedFile(string $user, string $server, string $deletedOrUnshared, string $fileOrFolder, string $entry):void {
		$this->userOnDeletesFile($user, $server, $entry);
		// If the file was there and got deleted then we get a 204
		// If the file was already not there then then get a 404
		// Either way, the outcome of the "given" step is OK
		if ($deletedOrUnshared === "deleted") {
			$deleteText = "delete";
		} else {
			$deleteText = "unshare";
		}

		$this->theHTTPStatusCodeShouldBe(
			["204", "404"],
			"HTTP status code was not 204 or 404 while trying to $deleteText $fileOrFolder '$entry' for user '$user' on server '$server'"
		);
	}

	/**
	 * @When user :user creates folder :destination using the WebDAV API
	 *
	 * @param string $user
	 * @param string $destination
	 *
	 * @return void
	 */
	public function userCreatesFolder(string $user, string $destination):void {
		$user = $this->getActualUsername($user);
		$destination = '/' . \ltrim($destination, '/');
		$this->response = $this->makeDavRequest(
			$user,
			"MKCOL",
			$destination,
			[]
		);
		$this->setResponseXml(
			HttpRequestHelper::parseResponseAsXml($this->response)
		);
	}

	/**
	 * @Given user :user has created folder :destination
	 *
	 * @param string $user
	 * @param string $destination
	 *
	 * @return void
	 */
	public function userHasCreatedFolder(string $user, string $destination):void {
		$user = $this->getActualUsername($user);
		$this->userCreatesFolder($user, $destination);
		$this->theHTTPStatusCodeShouldBe(
			["201", "204"],
			"HTTP status code was not 201 or 204 while trying to create folder '$destination' for user '$user'"
		);
	}

	/**
	 * @Given /^user "([^"]*)" has created the following folders$/
	 *
	 * @param string $user
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasCreatedFollowingFolders(string $user, TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["path"]);
		$paths = $table->getHash();

		foreach ($paths as $path) {
			$this->userHasCreatedFolder($user, $path["path"]);
		}
	}

	/**
	 * @When the user creates folder :destination using the WebDAV API
	 *
	 * @param string $destination
	 *
	 * @return void
	 */
	public function theUserCreatesFolder(string $destination):void {
		$this->userCreatesFolder($this->getCurrentUser(), $destination);
	}

	/**
	 * @Given the user has created folder :destination
	 *
	 * @param string $destination
	 *
	 * @return void
	 */
	public function theUserHasCreatedFolder(string $destination):void {
		$this->theUserCreatesFolder($destination);
		$this->theHTTPStatusCodeShouldBe(
			["201", "204"],
			"HTTP status code was not 201 or 204 while trying to create folder '$destination'"
		);
	}

	/**
	 * @Then user :user should be able to create folder :destination
	 *
	 * @param string $user
	 * @param string $destination
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userShouldBeAbleToCreateFolder(string $user, string $destination):void {
		$this->userHasCreatedFolder($user, $destination);
		$this->asFileOrFolderShouldExist(
			$user,
			"folder",
			$destination
		);
	}

	/**
	 * @Then user :user should not be able to create folder :destination
	 *
	 * @param string $user
	 * @param string $destination
	 *
	 * @return void
	 */
	public function userShouldNotBeAbleToCreateFolder(string $user, string $destination):void {
		$user = $this->getActualUsername($user);
		$this->userCreatesFolder($user, $destination);
		$this->theHTTPStatusCodeShouldBeFailure();
	}

	/**
	 * Old style chunking upload
	 *
	 * @When user :user uploads the following :total chunks to :file with old chunking and using the WebDAV API
	 *
	 * @param string $user
	 * @param string $total
	 * @param string $file
	 * @param TableNode $chunkDetails table of 2 columns, chunk number and chunk
	 *                                content with column headings, e.g.
	 *                                | number | content                 |
	 *                                | 1      | first data              |
	 *                                | 2      | followed by second data |
	 *                                Chunks may be numbered out-of-order if desired.
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userUploadsTheFollowingTotalChunksUsingOldChunking(
		string $user,
		string $total,
		string $file,
		TableNode $chunkDetails
	):void {
		$this->verifyTableNodeColumns($chunkDetails, ['number', 'content']);
		foreach ($chunkDetails->getHash() as $chunkDetail) {
			$chunkNumber = (int)$chunkDetail['number'];
			$chunkContent = $chunkDetail['content'];
			$this->userUploadsChunkedFile($user, $chunkNumber, (int) $total, $chunkContent, $file);
		}
	}

	/**
	 * Old style chunking upload
	 *
	 * @Given user :user has uploaded the following :total chunks to :file with old chunking
	 *
	 * @param string $user
	 * @param string $total
	 * @param string $file
	 * @param TableNode $chunkDetails table of 2 columns, chunk number and chunk
	 *                                content with following headings, e.g.
	 *                                | number | content                 |
	 *                                | 1      | first data              |
	 *                                | 2      | followed by second data |
	 *                                Chunks may be numbered out-of-order if desired.
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasUploadedTheFollowingTotalChunksUsingOldChunking(
		string $user,
		string $total,
		string $file,
		TableNode $chunkDetails
	):void {
		$this->verifyTableNodeColumns($chunkDetails, ['number', 'content']);
		foreach ($chunkDetails->getHash() as $chunkDetail) {
			$chunkNumber = (int) $chunkDetail['number'];
			$chunkContent = $chunkDetail['content'];
			$this->userHasUploadedChunkedFile($user, $chunkNumber, (int) $total, $chunkContent, $file);
		}
	}

	/**
	 * Old style chunking upload
	 *
	 * @When user :user uploads the following chunks to :file with old chunking and using the WebDAV API
	 *
	 * @param string $user
	 * @param string $file
	 * @param TableNode $chunkDetails table of 2 columns, chunk number and chunk
	 *                                content with column headings, e.g.
	 *                                | number | content                 |
	 *                                | 1      | first data              |
	 *                                | 2      | followed by second data |
	 *                                Chunks may be numbered out-of-order if desired.
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userUploadsTheFollowingChunksUsingOldChunking(
		string $user,
		string $file,
		TableNode $chunkDetails
	):void {
		$total = \count($chunkDetails->getHash());
		$this->userUploadsTheFollowingTotalChunksUsingOldChunking(
			$user,
			(string) $total,
			$file,
			$chunkDetails
		);
	}

	/**
	 * Old style chunking upload
	 *
	 * @Given user :user has uploaded the following chunks to :file with old chunking
	 *
	 * @param string $user
	 * @param string $file
	 * @param TableNode $chunkDetails table of 2 columns, chunk number and chunk
	 *                                content with headings, e.g.
	 *                                | number | content                 |
	 *                                | 1      | first data              |
	 *                                | 2      | followed by second data |
	 *                                Chunks may be numbered out-of-order if desired.
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasUploadedTheFollowingChunksUsingOldChunking(
		string $user,
		string $file,
		TableNode $chunkDetails
	):void {
		$total = \count($chunkDetails->getRows());
		$this->userHasUploadedTheFollowingTotalChunksUsingOldChunking(
			$user,
			(string) $total,
			$file,
			$chunkDetails
		);
	}

	/**
	 * Old style chunking upload
	 *
	 * @When user :user uploads chunk file :num of :total with :data to :destination using the WebDAV API
	 *
	 * @param string $user
	 * @param int $num
	 * @param int $total
	 * @param string|null $data
	 * @param string $destination
	 *
	 * @return void
	 */
	public function userUploadsChunkedFile(
		string $user,
		int $num,
		int $total,
		?string $data,
		string $destination
	):void {
		$user = $this->getActualUsername($user);
		$num -= 1;
		$file = "$destination-chunking-42-$total-$num";
		$this->pauseUploadDelete();
		$this->response = $this->makeDavRequest(
			$user,
			'PUT',
			$file,
			['OC-Chunked' => '1'],
			$data,
			"uploads"
		);
		$this->lastUploadDeleteTime = \time();
	}

	/**
	 * Old style chunking upload
	 *
	 * @Given user :user has uploaded chunk file :num of :total with :data to :destination
	 *
	 * @param string $user
	 * @param int|null $num
	 * @param int|null $total
	 * @param string|null $data
	 * @param string $destination
	 *
	 * @return void
	 */
	public function userHasUploadedChunkedFile(
		string $user,
		?int $num,
		?int $total,
		?string $data,
		string $destination
	):void {
		$user = $this->getActualUsername($user);
		$this->userUploadsChunkedFile($user, $num, $total, $data, $destination);
		$this->theHTTPStatusCodeShouldBe(
			["201", "204"],
			"HTTP status code was not 201 or 204 while trying to upload chunk $num of $total to file '$destination' for user '$user'"
		);
	}

	/**
	 * New style chunking upload
	 *
	 * @When /^user "([^"]*)" uploads the following chunks\s?(asynchronously|) to "([^"]*)" with new chunking and using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $type "asynchronously" or empty
	 * @param string $file
	 * @param TableNode $chunkDetails table of 2 columns, chunk number and chunk
	 *                                content, with headings e.g.
	 *                                | number | content      |
	 *                                | 1      | first data   |
	 *                                | 2      | second data  |
	 *                                Chunks may be numbered out-of-order if desired.
	 *
	 * @return void
	 */
	public function userUploadsTheFollowingChunksUsingNewChunking(
		string $user,
		string $type,
		string $file,
		TableNode $chunkDetails
	):void {
		$this->uploadTheFollowingChunksUsingNewChunking(
			$user,
			$type,
			$file,
			$chunkDetails
		);
	}

	/**
	 * New style chunking upload
	 *
	 * @Given /^user "([^"]*)" has uploaded the following chunks\s?(asynchronously|) to "([^"]*)" with new chunking$/
	 *
	 * @param string $user
	 * @param string $type "asynchronously" or empty
	 * @param string $file
	 * @param TableNode $chunkDetails table of 2 columns, chunk number and chunk
	 *                                content without column headings, e.g.
	 *                                | number | content                 |
	 *                                | 1      | first data              |
	 *                                | 2      | followed by second data |
	 *                                Chunks may be numbered out-of-order if desired.
	 *
	 * @return void
	 */
	public function userHasUploadedTheFollowingChunksUsingNewChunking(
		string $user,
		string $type,
		string $file,
		TableNode $chunkDetails
	):void {
		$this->uploadTheFollowingChunksUsingNewChunking(
			$user,
			$type,
			$file,
			$chunkDetails,
			true
		);
	}

	/**
	 * New style chunking upload
	 *
	 * @param string $user
	 * @param string $type "asynchronously" or empty
	 * @param string $file
	 * @param TableNode $chunkDetails table of 2 columns, chunk number and chunk
	 *                                content with column headings, e.g.
	 *                                | number | content            |
	 *                                | 1      | first data         |
	 *                                | 2      | second data        |
	 *                                Chunks may be numbered out-of-order if desired.
	 * @param bool $checkActions
	 *
	 * @return void
	 * @throws Exception
	 */
	public function uploadTheFollowingChunksUsingNewChunking(
		string $user,
		string $type,
		string $file,
		TableNode $chunkDetails,
		bool $checkActions = false
	):void {
		$user = $this->getActualUsername($user);
		$async = false;
		if ($type === "asynchronously") {
			$async = true;
		}
		$this->verifyTableNodeColumns($chunkDetails, ["number", "content"]);
		$this->userUploadsChunksUsingNewChunking(
			$user,
			$file,
			'chunking-42',
			$chunkDetails->getHash(),
			$async,
			$checkActions
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
	 *                            [number] the chunk number
	 *                            [content] data content of the chunk
	 *                            Chunks may be numbered out-of-order if desired.
	 * @param bool $async use asynchronous MOVE at the end or not
	 * @param bool $checkActions
	 *
	 * @return void
	 */
	public function userUploadsChunksUsingNewChunking(
		string $user,
		string $file,
		string $chunkingId,
		array $chunkDetails,
		bool $async = false,
		bool $checkActions = false
	):void {
		$this->pauseUploadDelete();
		if ($checkActions) {
			$this->userHasCreatedANewChunkingUploadWithId($user, $chunkingId);
		} else {
			$this->userCreatesANewChunkingUploadWithId($user, $chunkingId);
		}
		foreach ($chunkDetails as $chunkDetail) {
			$chunkNumber = (int)$chunkDetail['number'];
			$chunkContent = $chunkDetail['content'];
			if ($checkActions) {
				$this->userHasUploadedNewChunkFileOfWithToId($user, $chunkNumber, $chunkContent, $chunkingId);
			} else {
				$this->userUploadsNewChunkFileOfWithToId($user, $chunkNumber, $chunkContent, $chunkingId);
			}
		}
		$headers = [];
		if ($async === true) {
			$headers = ['OC-LazyOps' => 'true'];
		}
		$this->moveNewDavChunkToFinalFile($user, $chunkingId, $file, $headers);
		if ($checkActions) {
			$this->theHTTPStatusCodeShouldBeSuccess();
		}
		$this->lastUploadDeleteTime = \time();
	}

	/**
	 * @When user :user creates a new chunking upload with id :id using the WebDAV API
	 *
	 * @param string $user
	 * @param string $id
	 *
	 * @return void
	 */
	public function userCreatesANewChunkingUploadWithId(string $user, string $id):void {
		$user = $this->getActualUsername($user);
		$destination = "/uploads/$user/$id";
		$this->response = $this->makeDavRequest(
			$user,
			'MKCOL',
			$destination,
			[],
			null,
			"uploads"
		);
	}

	/**
	 * @Given user :user has created a new chunking upload with id :id
	 *
	 * @param string $user
	 * @param string $id
	 *
	 * @return void
	 */
	public function userHasCreatedANewChunkingUploadWithId(string $user, string $id):void {
		$this->userCreatesANewChunkingUploadWithId($user, $id);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @When user :user uploads new chunk file :num with :data to id :id using the WebDAV API
	 *
	 * @param string $user
	 * @param int $num
	 * @param string|null $data
	 * @param string $id
	 *
	 * @return void
	 */
	public function userUploadsNewChunkFileOfWithToId(string $user, int $num, ?string $data, string $id):void {
		$user = $this->getActualUsername($user);
		$destination = "/uploads/$user/$id/$num";
		$this->response = $this->makeDavRequest(
			$user,
			'PUT',
			$destination,
			[],
			$data,
			"uploads"
		);
	}

	/**
	 * @Given user :user has uploaded new chunk file :num with :data to id :id
	 *
	 * @param string $user
	 * @param int $num
	 * @param string|null $data
	 * @param string $id
	 *
	 * @return void
	 */
	public function userHasUploadedNewChunkFileOfWithToId(string $user, int $num, ?string $data, string $id):void {
		$this->userUploadsNewChunkFileOfWithToId($user, $num, $data, $id);
		$this->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @When /^user "([^"]*)" moves new chunk file with id "([^"]*)"\s?(asynchronously|) to "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $id
	 * @param string $type "asynchronously" or empty
	 * @param string $dest
	 *
	 * @return void
	 */
	public function userMovesNewChunkFileWithIdToMychunkedfile(
		string $user,
		string $id,
		string $type,
		string $dest
	):void {
		$headers = [];
		if ($type === "asynchronously") {
			$headers = ['OC-LazyOps' => 'true'];
		}
		$this->moveNewDavChunkToFinalFile($user, $id, $dest, $headers);
	}

	/**
	 * @Given /^user "([^"]*)" has moved new chunk file with id "([^"]*)"\s?(asynchronously|) to "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $id
	 * @param string $type "asynchronously" or empty
	 * @param string $dest
	 *
	 * @return void
	 */
	public function userHasMovedNewChunkFileWithIdToMychunkedfile(
		string $user,
		string $id,
		string $type,
		string $dest
	):void {
		$this->userMovesNewChunkFileWithIdToMychunkedfile($user, $id, $type, $dest);
		$this->theHTTPStatusCodeShouldBe("201");
	}

	/**
	 * @When user :user cancels chunking-upload with id :id using the WebDAV API
	 *
	 * @param string $user
	 * @param string $id
	 *
	 * @return void
	 */
	public function userCancelsUploadWithId(
		string $user,
		string $id
	):void {
		$this->deleteUpload($user, $id, []);
	}

	/**
	 * @Given user :user has canceled new chunking-upload with id :id
	 *
	 * @param string $user
	 * @param string $id
	 *
	 * @return void
	 */
	public function userHasCanceledUploadWithId(
		string $user,
		string $id
	):void {
		$this->userCancelsUploadWithId($user, $id);
		$this->theHTTPStatusCodeShouldBe("201");
	}

	/**
	 * @When /^user "([^"]*)" moves new chunk file with id "([^"]*)"\s?(asynchronously|) to "([^"]*)" with size (.*) using the WebDAV API$/
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
		string $user,
		string $id,
		string $type,
		string $dest,
		int $size
	):void {
		$headers = ['OC-Total-Length' => $size];
		if ($type === "asynchronously") {
			$headers['OC-LazyOps'] = 'true';
		}
		$this->moveNewDavChunkToFinalFile(
			$user,
			$id,
			$dest,
			$headers
		);
	}

	/**
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
	public function userHasMovedNewChunkFileWithIdToMychunkedfileWithSize(
		string $user,
		string $id,
		string $type,
		string $dest,
		int $size
	):void {
		$this->userMovesNewChunkFileWithIdToMychunkedfileWithSize(
			$user,
			$id,
			$type,
			$dest,
			$size
		);
		$this->theHTTPStatusCodeShouldBe("201");
	}

	/**
	 * @When /^user "([^"]*)" moves new chunk file with id "([^"]*)"\s?(asynchronously|) to "([^"]*)" with checksum "([^"]*)" using the WebDAV API$/
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
		string $user,
		string $id,
		string $type,
		string $dest,
		string $checksum
	):void {
		$headers = ['OC-Checksum' => $checksum];
		if ($type === "asynchronously") {
			$headers['OC-LazyOps'] = 'true';
		}
		$this->moveNewDavChunkToFinalFile(
			$user,
			$id,
			$dest,
			$headers
		);
	}

	/**
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
	public function userHasMovedNewChunkFileWithIdToMychunkedfileWithChecksum(
		string $user,
		string $id,
		string $type,
		string $dest,
		string $checksum
	):void {
		$this->userMovesNewChunkFileWithIdToMychunkedfileWithChecksum(
			$user,
			$id,
			$type,
			$dest,
			$checksum
		);
		$this->theHTTPStatusCodeShouldBe("201");
	}

	/**
	 * Move chunked new DAV file to final file
	 *
	 * @param string $user user
	 * @param string $id upload id
	 * @param string $destination destination path
	 * @param array $headers extra headers
	 *
	 * @return void
	 */
	private function moveNewDavChunkToFinalFile(string $user, string $id, string $destination, array $headers):void {
		$user = $this->getActualUsername($user);
		$source = "/uploads/$user/$id/.file";
		$headers['Destination'] = $this->destinationHeaderValue(
			$user,
			$destination
		);

		$this->response = $this->makeDavRequest(
			$user,
			'MOVE',
			$source,
			$headers,
			null,
			"uploads"
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
	private function deleteUpload(string $user, string $id, array $headers) {
		$source = "/uploads/$user/$id";
		$this->response = $this->makeDavRequest(
			$user,
			'DELETE',
			$source,
			$headers,
			null,
			"uploads"
		);
	}

	/**
	 * URL encodes the given path but keeps the slashes
	 *
	 * @param string $path to encode
	 *
	 * @return string encoded path
	 */
	public function encodePath(string $path):string {
		// slashes need to stay
		$encodedPath = \str_replace('%2F', '/', \rawurlencode($path));
		// do not encode '(' and ')'
		$encodedPath = \str_replace('%28', '(', $encodedPath);
		$encodedPath = \str_replace('%29', ')', $encodedPath);
		return $encodedPath;
	}

	/**
	 * @When an unauthenticated client connects to the DAV endpoint using the WebDAV API
	 *
	 * @return void
	 */
	public function connectingToDavEndpoint():void {
		$this->response = $this->makeDavRequest(
			null,
			'PROPFIND',
			'',
			[]
		);
	}

	/**
	 * @Given an unauthenticated client has connected to the DAV endpoint
	 *
	 * @return void
	 */
	public function hasConnectedToDavEndpoint():void {
		$this->connectingToDavEndpoint();
		$this->theHTTPStatusCodeShouldBe("401");
	}

	/**
	 * @Then there should be no duplicate headers
	 *
	 * @return void
	 * @throws Exception
	 */
	public function thereAreNoDuplicateHeaders():void {
		$headers = $this->response->getHeaders();
		foreach ($headers as $headerName => $headerValues) {
			// if a header has multiple values, they must be different
			if (\count($headerValues) > 1
				&& \count(\array_unique($headerValues)) < \count($headerValues)
			) {
				throw new Exception("Duplicate header found: $headerName");
			}
		}
	}

	/**
	 * @Then the following headers should not be set
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theFollowingHeadersShouldNotBeSet(TableNode $table):void {
		$this->verifyTableNodeColumns(
			$table,
			['header']
		);
		foreach ($table->getColumnsHash() as $header) {
			$headerName = $header['header'];
			$headerValue = $this->response->getHeader($headerName);
			//Note: getHeader returns an empty array if the named header does not exist
			if (isset($headerValue[0])) {
				$headerValue0 = $headerValue[0];
			} else {
				$headerValue0 = '';
			}
			Assert::assertEmpty(
				$headerValue,
				"header $headerName should not exist " .
				"but does and is set to $headerValue0"
			);
		}
	}

	/**
	 * @Then the following headers should match these regular expressions
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function headersShouldMatchRegularExpressions(TableNode $table):void {
		$this->verifyTableNodeColumnsCount($table, 2);
		foreach ($table->getTable() as $header) {
			$headerName = $header[0];
			$expectedHeaderValue = $header[1];
			$expectedHeaderValue = $this->substituteInLineCodes(
				$expectedHeaderValue,
				null,
				['preg_quote' => ['/']]
			);

			$returnedHeaders = $this->response->getHeader($headerName);
			$returnedHeader = $returnedHeaders[0];
			Assert::assertNotFalse(
				(bool) \preg_match($expectedHeaderValue, $returnedHeader),
				"'$expectedHeaderValue' does not match '$returnedHeader'"
			);
		}
	}

	/**
	 * @Then /^if the HTTP status code was "([^"]*)" then the following headers should match these regular expressions$/
	 *
	 * @param int $statusCode
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function statusCodeShouldMatchTheseRegularExpressions(int $statusCode, TableNode $table):void {
		$actualStatusCode = $this->response->getStatusCode();
		if ($actualStatusCode === $statusCode) {
			$this->headersShouldMatchRegularExpressions($table);
		}
	}

	/**
	 * @Then the following headers should match these regular expressions for user :user
	 *
	 * @param string $user
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function headersShouldMatchRegularExpressionsForUser(string $user, TableNode $table):void {
		$this->verifyTableNodeColumnsCount($table, 2);
		$user = $this->getActualUsername($user);
		foreach ($table->getTable() as $header) {
			$headerName = $header[0];
			$expectedHeaderValue = $header[1];
			$expectedHeaderValue = $this->substituteInLineCodes(
				$expectedHeaderValue,
				$user,
				['preg_quote' => ['/']]
			);

			$returnedHeaders = $this->response->getHeader($headerName);
			$returnedHeader = $returnedHeaders[0];
			Assert::assertNotFalse(
				(bool) \preg_match($expectedHeaderValue, $returnedHeader),
				"'$expectedHeaderValue' does not match '$returnedHeader'"
			);
		}
	}

	/**
	 * @When /^user "([^"]*)" deletes everything from folder "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $folder
	 * @param bool $checkEachDelete
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userDeletesEverythingInFolder(
		string $user,
		string $folder,
		bool $checkEachDelete = false
	):void {
		$user = $this->getActualUsername($user);
		$responseXmlObject = $this->listFolderAndReturnResponseXml(
			$user,
			$folder,
			'1'
		);
		$elementList = $responseXmlObject->xpath("//d:response/d:href");
		if (\is_array($elementList) && \count($elementList)) {
			\array_shift($elementList); //don't delete the folder itself
			$davPrefix = "/" . $this->getFullDavFilesPath($user);
			foreach ($elementList as $element) {
				$element = \substr((string)$element, \strlen($davPrefix));
				if ($checkEachDelete) {
					$this->userHasDeletedFile($user, "deleted", "file", $element);
				} else {
					$this->userDeletesFile($user, $element);
				}
			}
		}
	}

	/**
	 * @Given /^user "([^"]*)" has deleted everything from folder "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $folder
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasDeletedEverythingInFolder(string $user, string $folder):void {
		$this->userDeletesEverythingInFolder($user, $folder, true);
	}

	/**
	 * @When user :user downloads the preview of :path with width :width and height :height using the WebDAV API
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $width
	 * @param string $height
	 *
	 * @return void
	 */
	public function downloadPreviewOfFiles(string $user, string $path, string $width, string $height):void {
		$this->downloadPreviews(
			$user,
			$path,
			null,
			$width,
			$height
		);
	}

	/**
	 * @When user :user1 downloads the preview of :path of :user2 with width :width and height :height using the WebDAV API
	 *
	 * @param string $user1
	 * @param string $path
	 * @param string $doDavRequestAsUser
	 * @param string $width
	 * @param string $height
	 *
	 * @return void
	 */
	public function downloadPreviewOfOtherUser(string $user1, string $path, string $doDavRequestAsUser, string $width, string $height):void {
		$this->downloadPreviews(
			$user1,
			$path,
			$doDavRequestAsUser,
			$width,
			$height
		);
	}

	/**
	 * @Then the downloaded image for user :user should be :width pixels wide and :height pixels high
	 *
	 * @param string $user
	 * @param string $width
	 * @param string $height
	 *
	 * @return void
	 */
	public function imageDimensionsForAUserShouldBe(string $user, string $width, string $height):void {
		if ($this->userResponseBodyContents[$user] === null) {
			$this->userResponseBodyContents[$user] = $this->response->getBody()->getContents();
		}
		$size = \getimagesizefromstring($this->userResponseBodyContents[$user]);
		Assert::assertNotFalse($size, "could not get size of image");
		Assert::assertEquals($width, $size[0], "width not as expected");
		Assert::assertEquals($height, $size[1], "height not as expected");
	}

	/**
	 * @Then the downloaded image should be :width pixels wide and :height pixels high
	 *
	 * @param string $width
	 * @param string $height
	 *
	 * @return void
	 */
	public function imageDimensionsShouldBe(string $width, string $height): void {
		if ($this->responseBodyContent === null) {
			$this->responseBodyContent = $this->response->getBody()->getContents();
		}
		$size = \getimagesizefromstring($this->responseBodyContent);
		Assert::assertNotFalse($size, "could not get size of image");
		Assert::assertEquals($width, $size[0], "width not as expected");
		Assert::assertEquals($height, $size[1], "height not as expected");
	}

	/**
	 * @Then the requested JPEG image should have a quality value of :size
	 *
	 * @param string $value
	 *
	 * @return void
	 */
	public function jpgQualityValueShouldBe(string $value): void {
		$this->responseBodyContent = $this->response->getBody()->getContents();
		// quality value is embedded in the string content for JPEG images
		$qualityString = "quality = $value";
		Assert::assertStringContainsString($qualityString, $this->responseBodyContent);
	}

	/**
	 * @Then the downloaded preview content should match with :preview fixtures preview content
	 *
	 * @param string $filename relative path from fixtures directory
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theDownloadedPreviewContentShouldMatchWithFixturesPreviewContentFor(string $filename):void {
		$expectedPreview = \file_get_contents(__DIR__ . "/../../fixtures/" . $filename);
		Assert::assertEquals($expectedPreview, $this->responseBodyContent);
	}

	/**
	 * @Given user :user has downloaded the preview of :path with width :width and height :height
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $width
	 * @param string $height
	 *
	 * @return void
	 */
	public function userDownloadsThePreviewOfWithWidthAndHeight(string $user, string $path, string $width, string $height):void {
		$this->downloadPreviewOfFiles($user, $path, $width, $height);
		$this->theHTTPStatusCodeShouldBe(200);
		$this->imageDimensionsShouldBe($width, $height);
		// save response to user response dictionary for further comparisons
		$this->userResponseBodyContents[$user] = $this->responseBodyContent;
	}

	/**
	 * @Then as user :user the preview of :path with width :width and height :height should have been changed
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $width
	 * @param string $height
	 *
	 * @return void
	 */
	public function asUserThePreviewOfPathWithHeightAndWidthShouldHaveBeenChanged(string $user, string $path, string $width, string $height):void {
		$this->downloadPreviewOfFiles($user, $path, $width, $height);
		$this->theHTTPStatusCodeShouldBe(200);
		$newResponseBodyContents = $this->response->getBody()->getContents();
		Assert::assertNotEquals(
			$newResponseBodyContents,
			// different users can download files before and after an update is made to a file
			// previous response content is fetched from user response body content array for that user
			$this->userResponseBodyContents[$user],
			__METHOD__ . " previous and current previews content is same but expected to be different",
		);
		// update the saved content for the next comparison
		$this->userResponseBodyContents[$user] = $newResponseBodyContents;
	}

	/**
	 * @param string $user
	 * @param string $path
	 *
	 * @return string|null
	 */
	public function getFileIdForPath(string $user, string $path): ?string {
		$user = $this->getActualUsername($user);
		try {
			return WebDavHelper::getFileIdForPath(
				$this->getBaseUrl(),
				$user,
				$this->getPasswordForUser($user),
				$path,
				$this->getStepLineRef()
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
	public function userStoresFileIdForPath(string $user, string $path):void {
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
	public function userFileShouldHaveStoredId(string $user, string $path):void {
		$user = $this->getActualUsername($user);
		$currentFileID = $this->getFileIdForPath($user, $path);
		Assert::assertEquals(
			$currentFileID,
			$this->storedFileID,
			__METHOD__
			. " User '$user' file '$path' does not have the previously stored id '{$this->storedFileID}', but has '$currentFileID'."
		);
	}

	/**
	 * @Then /^the (?:Cal|Card)?DAV (exception|message|reason) should be "([^"]*)"$/
	 *
	 * @param string $element exception|message|reason
	 * @param string $message
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theDavElementShouldBe(string $element, string $message):void {
		WebDavAssert::assertDavResponseElementIs(
			$element,
			$message,
			$this->responseXml,
			__METHOD__
		);
	}

	/**
	 * @param string $shouldOrNot (not|)
	 * @param TableNode $expectedFiles
	 * @param string|null $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function propfindResultShouldContainEntries(
		string $shouldOrNot,
		TableNode $expectedFiles,
		?string $user = null
	):void {
		$this->verifyTableNodeColumnsCount($expectedFiles, 1);
		$elementRows = $expectedFiles->getRows();
		$should = ($shouldOrNot !== "not");

		foreach ($elementRows as $expectedFile) {
			$fileFound = $this->findEntryFromPropfindResponse(
				$expectedFile[0],
				$user
			);
			if ($should) {
				Assert::assertNotEmpty(
					$fileFound,
					"response does not contain the entry '$expectedFile[0]'"
				);
			} else {
				Assert::assertFalse(
					$fileFound,
					"response does contain the entry '$expectedFile[0]' but should not"
				);
			}
		}
	}

	/**
	 * @Then /^the (?:propfind|search) result of user "([^"]*)" should (not|)\s?contain these (?:files|entries):$/
	 *
	 * @param string $user
	 * @param string $shouldOrNot (not|)
	 * @param TableNode $expectedFiles
	 *
	 * @return void
	 * @throws Exception
	 */
	public function thePropfindResultShouldContainEntries(
		string $user,
		string $shouldOrNot,
		TableNode $expectedFiles
	):void {
		$user = $this->getActualUsername($user);
		$this->propfindResultShouldContainEntries(
			$shouldOrNot,
			$expectedFiles,
			$user
		);
	}

	/**
	 * @Then /^the (?:propfind|search) result of user "([^"]*)" should not contain any (?:files|entries)$/
	 *
	 * @param string $user
	 *
	 * @return void
	 * @throws Exception
	 */
	public function thePropfindResultShouldNotContainAnyEntries(
		string $user
	):void {
		$multistatusResults = $this->getMultistatusResultFromPropfindResult($user);
		Assert::assertEmpty($multistatusResults, 'The propfind response was expected to be empty but was not');
	}

	/**
	 * @Then /^the (?:propfind|search) result of user "([^"]*)" should contain only these (?:files|entries):$/
	 *
	 * @param string $user
	 * @param TableNode $expectedFiles
	 *
	 * @return void
	 * @throws Exception
	 */
	public function thePropfindResultShouldContainOnlyEntries(
		string $user,
		TableNode $expectedFiles
	):void {
		$user = $this->getActualUsername($user);

		Assert::assertEquals(
			\count($expectedFiles->getTable()),
			$this->getNumberOfEntriesInPropfindResponse(
				$user
			),
			"The number of elements in the response doesn't matches with expected number of elements"
		);
		$this->propfindResultShouldContainEntries(
			'',
			$expectedFiles,
			$user
		);
	}

	/**
	 * @Then the propfind/search result should contain :numFiles files/entries
	 *
	 * @param int $numFiles
	 *
	 * @return void
	 */
	public function propfindResultShouldContainNumEntries(int $numFiles):void {
		//if we are using that step the second time in a scenario e.g. 'But ... should not'
		//then don't parse the result again, because the result in a ResponseInterface
		if (empty($this->responseXml)) {
			$this->setResponseXml(
				HttpRequestHelper::parseResponseAsXml($this->response)
			);
		}
		Assert::assertIsArray(
			$this->responseXml,
			__METHOD__ . " responseXml is not an array"
		);
		Assert::assertArrayHasKey(
			"value",
			$this->responseXml,
			__METHOD__ . " responseXml does not have key 'value'"
		);
		$multistatusResults = $this->responseXml["value"];
		if ($multistatusResults === null) {
			$multistatusResults = [];
		}
		Assert::assertEquals(
			(int) $numFiles,
			\count($multistatusResults),
			__METHOD__
			. " Expected result to contain '"
			. (int) $numFiles
			. "' files/entries, but got '"
			. \count($multistatusResults)
			. "' files/entries."
		);
	}

	/**
	 * @Then the propfind/search result should contain any :expectedNumber of these files/entries:
	 *
	 * @param integer $expectedNumber
	 * @param TableNode $expectedFiles
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theSearchResultShouldContainAnyOfTheseEntries(
		int $expectedNumber,
		TableNode $expectedFiles
	):void {
		$this->theSearchResultOfUserShouldContainAnyOfTheseEntries(
			$this->getCurrentUser(),
			$expectedNumber,
			$expectedFiles
		);
	}

	/**
	 * @Then the propfind/search result of user :user should contain any :expectedNumber of these files/entries:
	 *
	 * @param string $user
	 * @param integer $expectedNumber
	 * @param TableNode $expectedFiles
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theSearchResultOfUserShouldContainAnyOfTheseEntries(
		string $user,
		int $expectedNumber,
		TableNode $expectedFiles
	):void {
		$user = $this->getActualUsername($user);
		$this->verifyTableNodeColumnsCount($expectedFiles, 1);
		$this->propfindResultShouldContainNumEntries($expectedNumber);
		$elementRows = $expectedFiles->getColumn(0);
		// Remove any "/" from the front (or back) of the expected values passed
		// into the step. findEntryFromPropfindResponse returns entries without
		// any leading (or trailing) slash
		$expectedEntries = \array_map(
			function ($value) {
				return \trim($value, "/");
			},
			$elementRows
		);
		$resultEntries = $this->findEntryFromPropfindResponse(null, $user);
		foreach ($resultEntries as $resultEntry) {
			Assert::assertContains($resultEntry, $expectedEntries);
		}
	}

	/**
	 * @When user :arg1 lists the resources in :path with depth :depth using the WebDAV API
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $depth
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userListsTheResourcesInPathWithDepthUsingTheWebdavApi(string $user, string $path, string $depth):void {
		$response = $this->listFolder(
			$user,
			$path,
			$depth
		);
		$this->setResponse($response);
		$this->setResponseXml(HttpRequestHelper::parseResponseAsXml($this->response));
	}

	/**
	 * @Then the last DAV response for user :user should contain these nodes/elements
	 *
	 * @param string $user
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theLastDavResponseShouldContainTheseNodes(string $user, TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["name"]);
		foreach ($table->getHash() as $row) {
			$path = $this->substituteInLineCodes($row['name']);
			$res = $this->findEntryFromPropfindResponse($path, $user);
			Assert::assertNotFalse($res, "expected $path to be in DAV response but was not found");
		}
	}

	/**
	 * @Then the last DAV response for user :user should not contain these nodes/elements
	 *
	 * @param string $user
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theLastDavResponseShouldNotContainTheseNodes(string $user, TableNode $table):void {
		$this->verifyTableNodeColumns($table, ["name"]);
		foreach ($table->getHash() as $row) {
			$path = $this->substituteInLineCodes($row['name']);
			$res = $this->findEntryFromPropfindResponse($path, $user);
			Assert::assertFalse($res, "expected $path to not be in DAV response but was found");
		}
	}

	/**
	 * @Then the last public link DAV response should contain these nodes/elements
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theLastPublicDavResponseShouldContainTheseNodes(TableNode $table):void {
		$user = (string) $this->getLastShareData()->data->token;
		$this->verifyTableNodeColumns($table, ["name"]);
		$type = $this->usingOldDavPath ? "public-files" : "public-files-new";
		foreach ($table->getHash() as $row) {
			$path = $this->substituteInLineCodes($row['name']);
			$res = $this->findEntryFromPropfindResponse($path, $user, $type);
			Assert::assertNotFalse($res, "expected $path to be in DAV response but was not found");
		}
	}

	/**
	 * @Then the last public link DAV response should not contain these nodes/elements
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theLastPublicDavResponseShouldNotContainTheseNodes(TableNode $table):void {
		$user = (string) $this->getLastShareData()->data->token;
		$this->verifyTableNodeColumns($table, ["name"]);
		$type = $this->usingOldDavPath ? "public-files" : "public-files-new";
		foreach ($table->getHash() as $row) {
			$path = $this->substituteInLineCodes($row['name']);
			$res = $this->findEntryFromPropfindResponse($path, $user, $type);
			Assert::assertFalse($res, "expected $path to not be in DAV response but was found");
		}
	}

	/**
	 * @When the public lists the resources in the last created public link with depth :depth using the WebDAV API
	 *
	 * @param string $depth
	 *
	 * @return void
	 * @throws Exception
	 */
	public function thePublicListsTheResourcesInTheLastCreatedPublicLinkWithDepthUsingTheWebdavApi(string $depth):void {
		$user = (string) $this->getLastShareData()->data->token;
		$response = $this->listFolder(
			$user,
			'/',
			$depth,
			null,
			$this->usingOldDavPath ? "public-files" : "public-files-new"
		);
		$this->setResponse($response);
		$this->setResponseXml(HttpRequestHelper::parseResponseAsXml($this->response));
	}

	/**
	 * @param string|null $user
	 *
	 * @return array
	 */
	public function findEntryFromReportResponse(?string $user):array {
		$responseXmlObj = $this->getResponseXmlObject();
		$responseResources = [];
		$hrefs = $responseXmlObj->xpath('//d:href');
		foreach ($hrefs as $href) {
			$hrefParts = \explode("/", (string)$href[0]);
			if (\in_array($user, $hrefParts)) {
				$entry = \urldecode(\end($hrefParts));
				\array_push($responseResources, $entry);
			} else {
				throw new Error("Expected user: $hrefParts[5] but found: $user");
			}
		}
		return $responseResources;
	}

	/**
	 * parses a PROPFIND response from $this->response into xml
	 * and returns found search results if found else returns false
	 *
	 * @param string|null $user
	 *
	 * @return int
	 */
	public function getNumberOfEntriesInPropfindResponse(
		?string $user = null
	):int {
		$multistatusResults = $this->getMultistatusResultFromPropfindResult($user);
		return \count($multistatusResults);
	}

	/**
	 * parses a PROPFIND response from $this->response
	 * and returns multistatus data from the response
	 *
	 * @param string|null $user
	 *
	 * @return array
	 */
	public function getMultistatusResultFromPropfindResult(
		?string $user = null
	):array {
		//if we are using that step the second time in a scenario e.g. 'But ... should not'
		//then don't parse the result again, because the result in a ResponseInterface
		if (empty($this->responseXml)) {
			$this->setResponseXml(
				HttpRequestHelper::parseResponseAsXml($this->response)
			);
		}
		Assert::assertNotEmpty($this->responseXml, __METHOD__ . ' Response is empty');
		if ($user === null) {
			$user = $this->getCurrentUser();
		}

		Assert::assertIsArray(
			$this->responseXml,
			__METHOD__ . " responseXml for user $user is not an array"
		);
		Assert::assertArrayHasKey(
			"value",
			$this->responseXml,
			__METHOD__ . " responseXml for user $user does not have key 'value'"
		);
		$multistatus = $this->responseXml["value"];
		if ($multistatus == null) {
			$multistatus = [];
		}
		return $multistatus;
	}

	/**
	 * parses a PROPFIND response from $this->response into xml
	 * and returns found search results if found else returns false
	 *
	 * @param string $entryNameToSearch
	 * @param string|null $user
	 * @param string $type
	 *
	 * @return string|array|boolean
	 * string if $entryNameToSearch is given and is found
	 * array if $entryNameToSearch is not given
	 * boolean false if $entryNameToSearch is given and is not found
	 * @throws Exception
	 */
	public function findEntryFromPropfindResponse(
		?string $entryNameToSearch = null,
		?string $user = null,
		string $type = "files"
	) {
		$trimmedEntryNameToSearch = '';
		// trim any leading "/" passed by the caller, we can just match the "raw" name
		if ($entryNameToSearch != null) {
			$trimmedEntryNameToSearch = \trim($entryNameToSearch, "/");
		}

		// topWebDavPath should be something like /remote.php/webdav/ or
		// /remote.php/dav/files/alice/
		$topWebDavPath = "/" . $this->getFullDavFilesPath($user) . "/";

		switch ($type) {
			case "files":
				break;
			case "public-files":
			case "public-files-old":
			case "public-files-new":
				$topWebDavPath = "/" . $this->getPublicLinkDavPath($user, $type) . "/";
				break;
			default:
				throw new Exception("error");
		}
		$multistatusResults = $this->getMultistatusResultFromPropfindResult($user);
		$results = [];
		if ($multistatusResults !== null) {
			foreach ($multistatusResults as $multistatusResult) {
				$entryPath = $multistatusResult['value'][0]['value'];
				$entryName = \str_replace($topWebDavPath, "", $entryPath);
				$entryName = \rawurldecode($entryName);
				$entryName = \trim($entryName, "/");
				if ($trimmedEntryNameToSearch === $entryName) {
					return $multistatusResult;
				}
				\array_push($results, $entryName);
			}
		}
		if ($entryNameToSearch === null) {
			return $results;
		}
		return false;
	}

	/**
	 * Prevent creating two uploads and/or deletes with the same "stime"
	 * That is based on seconds in some implementations.
	 * This prevents duplication of etags or other problems with
	 * trashbin/versions save/restore.
	 *
	 * Set env var UPLOAD_DELETE_WAIT_TIME to 1 to activate a 1-second pause.
	 * By default, there is no pause. That allows testing of implementations
	 * which should be able to cope with multiple upload/delete actions in the
	 * same second.
	 *
	 * @return void
	 */
	public function pauseUploadDelete():void {
		$time = \time();
		$uploadWaitTime = \getenv("UPLOAD_DELETE_WAIT_TIME");

		$uploadWaitTime = $uploadWaitTime ? (int)$uploadWaitTime : 0;

		if (($this->lastUploadDeleteTime !== null)
			&& ($uploadWaitTime > 0)
			&& (($time - $this->lastUploadDeleteTime) < $uploadWaitTime)
		) {
			\sleep($uploadWaitTime);
		}
	}

	/**
	 * reset settings if they were set in the scenario
	 *
	 * @AfterScenario
	 *
	 * @return void
	 * @throws Exception
	 */
	public function resetPreviousSettingsAfterScenario():void {
		if ($this->previousAsyncSetting === "") {
			SetupHelper::runOcc(
				['config:system:delete', 'dav.enable.async'],
				$this->getStepLineRef()
			);
		} elseif ($this->previousAsyncSetting !== null) {
			SetupHelper::runOcc(
				[
					'config:system:set',
					'dav.enable.async',
					'--type',
					'boolean',
					'--value',
					$this->previousAsyncSetting
				],
				$this->getStepLineRef()
			);
		}
		if ($this->previousDavSlowdownSetting === "") {
			SetupHelper::runOcc(
				['config:system:delete', 'dav.slowdown'],
				$this->getStepLineRef()
			);
		} elseif ($this->previousDavSlowdownSetting !== null) {
			SetupHelper::runOcc(
				[
					'config:system:set',
					'dav.slowdown',
					'--value',
					$this->previousDavSlowdownSetting
				],
				$this->getStepLineRef()
			);
		}
	}
}
