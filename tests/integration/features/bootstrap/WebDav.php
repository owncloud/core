<?php

use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Client as GClient;
use GuzzleHttp\Message\ResponseInterface;
use Sabre\DAV\Client as SClient;
use Sabre\DAV\Xml\Property\ResourceType;
use TestHelpers\WebDavHelper;

require __DIR__ . '/../../../../lib/composer/autoload.php';

trait WebDav {

	/** @var string*/
	private $davPath = "remote.php/webdav";
	/** @var boolean*/
	private $usingOldDavPath = true;
	/** @var ResponseInterface[] */
	private $uploadResponses;
	/** @var array map with user as key and another map as value, which has path as key and etag as value */
	private $storedETAG = NULL;
	/** @var integer */
	private $storedFileID = NULL;

	/**
	 * a variable that contains the dav path without "remote.php/(web)dav"
	 * when setting $this->davPath directly by usingDavPath()
	 * @var string
	 */
	private $customDavPath = null;

	/**
	 * @Given /^using dav path "([^"]*)"$/
	 * @param string $davPath
	 */
	public function usingDavPath($davPath) {
		$this->davPath = $davPath;
		$this->customDavPath = preg_replace("/remote\.php\/(web)?dav\//", "", $davPath);
	}

	/**
	 * @Given /^using old dav path$/
	 */
	public function usingOldDavPath() {
		$this->davPath = "remote.php/webdav";
		$this->usingOldDavPath = true;
		$this->customDavPath = null;
	}

	/**
	 * @Given /^using new dav path$/
	 */
	public function usingNewDavPath() {
		$this->davPath = "remote.php/dav";
		$this->usingOldDavPath = false;
		$this->customDavPath = null;
	}

	/**
	 * @param string $user
	 * @return string
	 */
	public function getDavFilesPath($user) {
		if ($this->usingOldDavPath === true) {
			return $this->davPath;
		} else {
			return $this->davPath . '/files/' . $user;
		}
	}

	private function getDavPathVersion ()
	{
		if ($this->usingOldDavPath === true) {
			return 1;
		} else {
			return 2;
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
	 * @return \GuzzleHttp\Message\FutureResponse|ResponseInterface|NULL
	 */
	public function makeDavRequest($user,
								   $method,
								   $path,
								   $headers,
								   $body = null,
								   $type = "files",
								   $requestBody = null)
	{

		if ($this->customDavPath !== null) {
			$path = $this->customDavPath . $path;
		}

		return WebDavHelper::makeDavRequest(
			$this->baseUrlWithoutOCSAppendix(),
			$user, $this->getPasswordForUser($user), $method,
			$path, $headers, $body, $requestBody, $this->getDavPathVersion(),
			$type
		);
	}

	/**
	 * @Given /^user "([^"]*)" has moved (file|folder|entry) "([^"]*)" to "([^"]*)"$/
	 * @param string $user
	 * @param string $entry unused
	 * @param string $fileSource
	 * @param string $fileDestination
	 */
	public function userHasMovedFile($user, $entry, $fileSource, $fileDestination) {
		$fullUrl = $this->baseUrlWithoutOCSAppendix() . $this->getDavFilesPath($user);
		$headers['Destination'] = $fullUrl . $fileDestination;
		$this->response = $this->makeDavRequest($user, "MOVE", $fileSource, $headers);
		PHPUnit_Framework_Assert::assertEquals(201, $this->response->getStatusCode());
	}

	/**
	 * @When /^user "([^"]*)" moves (file|folder|entry) "([^"]*)" to "([^"]*)" using the API$/
	 * @param string $user
	 * @param string $entry unused
	 * @param string $fileSource
	 * @param string $fileDestination
	 */
	public function userMovesFileUsingTheAPI($user, $entry, $fileSource, $fileDestination) {
		$fullUrl = $this->baseUrlWithoutOCSAppendix() . $this->getDavFilesPath($user);
		$headers['Destination'] = $fullUrl . $fileDestination;
		try {
			$this->response = $this->makeDavRequest($user, "MOVE", $fileSource, $headers);
		} catch (BadResponseException $e) {
			$this->response = $e->getResponse();
		}
	}

	/**
	 * @When /^user "([^"]*)" copies file "([^"]*)" to "([^"]*)" using the API$/
	 * @Given /^user "([^"]*)" has copied file "([^"]*)" to "([^"]*)"$/
	 * @param string $user
	 * @param string $fileSource
	 * @param string $fileDestination
	 */
	public function userCopiesFileUsingTheAPI($user, $fileSource, $fileDestination) {
		$fullUrl = $this->baseUrlWithoutOCSAppendix() . $this->getDavFilesPath($user);
		$headers['Destination'] = $fullUrl . $fileDestination;
		try {
			$this->response = $this->makeDavRequest($user, "COPY", $fileSource, $headers);
		} catch (BadResponseException $e) {
			$this->response = $e->getResponse();
		}
	}

	/**
	 * @When /^the user downloads file "([^"]*)" with range "([^"]*)" using the API$/
	 * @param string $fileSource
	 * @param string $range
	 */
	public function downloadFileWithRange($fileSource, $range) {
		$headers['Range'] = $range;
		$this->response = $this->makeDavRequest($this->currentUser, "GET", $fileSource, $headers);
	}

	/**
	 * @When /^downloading last public shared file with range "([^"]*)"$/
	 * @param string $range
	 */
	public function downloadPublicFileWithRange($range) {
		$token = $this->lastShareData->data->token;
		$fullUrl = $this->baseUrlWithoutOCSAppendix() . "public.php/webdav";

		$client = new GClient();
		$options = [];
		$options['auth'] = [$token, ""];

		$request = $client->createRequest("GET", $fullUrl, $options);
		$request->addHeader('Range', $range);

		$this->response = $client->send($request);
	}

	/**
	 * @When /^downloading last public shared file inside a folder "([^"]*)" with range "([^"]*)"$/
	 * @param string $path
	 * @param string $range
	 */
	public function downloadPublicFileInsideAFolderWithRange($path, $range) {
		$token = $this->lastShareData->data->token;
		$fullUrl = $this->baseUrlWithoutOCSAppendix() . "public.php/webdav" . "$path";

		$client = new GClient();
		$options = [];
		$options['auth'] = [$token, ""];

		$request = $client->createRequest("GET", $fullUrl, $options);
		$request->addHeader('Range', $range);

		$this->response = $client->send($request);
	}

	/**
	 * @Then /^the downloaded content should be "([^"]*)"$/
	 * @param string $content
	 */
	public function downloadedContentShouldBe($content) {
		PHPUnit_Framework_Assert::assertEquals($content, (string)$this->response->getBody());
	}

	/**
	 * @Then /^downloaded content when downloading file "([^"]*)" with range "([^"]*)" should be "([^"]*)"$/
	 * @param string $fileSource
	 * @param string $range
	 * @param string $content
	 */
	public function downloadedContentWhenDownloadingShouldBe($fileSource, $range, $content) {
		$this->downloadFileWithRange($fileSource, $range);
		$this->downloadedContentShouldBe($content);
	}

	/**
	 * @When the user downloads the file :fileName using the API
	 * @param string $fileName
	 */
	public function theUserDownloadsTheFileUsingTheAPI($fileName) {
		$this->userDownloadsTheFileUsingTheAPI($this->currentUser, $fileName);
	}

	/**
	 * @When user :user downloads the file :fileName using the API
	 * @param string $fileName
	 * @param string $user
	 */
	public function userDownloadsTheFileUsingTheAPI($user, $fileName) {
		try {
			$this->response = $this->makeDavRequest($user, 'GET', $fileName, []);
		} catch (BadResponseException $ex) {
			$this->response = $ex->getResponse();
		}
	}

	/**
	 * @Then the following headers should be set
	 * @param \Behat\Gherkin\Node\TableNode $table
	 * @throws \Exception
	 */
	public function theFollowingHeadersShouldBeSet(\Behat\Gherkin\Node\TableNode $table) {
		foreach ($table->getTable() as $header) {
			$headerName = $header[0];
			$expectedHeaderValue = $header[1];
			$returnedHeader = $this->response->getHeader($headerName);
			if ($returnedHeader !== $expectedHeaderValue) {
				throw new \Exception(
					sprintf(
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
	 * @Then downloaded content should start with :start
	 * @param string $start
	 * @throws \Exception
	 */
	public function downloadedContentShouldStartWith($start) {
		if (strpos($this->response->getBody()->getContents(), $start) !== 0) {
			throw new \Exception(
				sprintf(
					"Expected '%s', got '%s'",
					$start,
					$this->response->getBody()->getContents()
				)
			);
		}
	}

	/**
	 * @When /^user "([^"]*)" gets the following properties of (file|folder|entry) "([^"]*)" using the API$/
	 * @param string $user
	 * @param string $elementType unused
	 * @param string $path
	 * @param \Behat\Gherkin\Node\TableNode|null $propertiesTable
	 */
	public function userGetsPropertiesOfFolder($user, $elementType, $path, $propertiesTable) {
		$properties = null;
		if ($propertiesTable instanceof \Behat\Gherkin\Node\TableNode) {
			foreach ($propertiesTable->getRows() as $row) {
				$properties[] = $row[0];
			}
		}
		$this->response = $this->listFolder($user, $path, 0, $properties);
	}

	/**
	 * @When user :user gets a custom property :propertyName of file :path
	 * @param string $user
	 * @param string $propertyName
	 * @param string $path
	 */
	 public function userGetsPropertiesOfFile($user, $propertyName, $path) {
		$client = $this->getSabreClient($user);
		 $properties = [
				$propertyName
		 ];
		$response = $client->propfind($this->makeSabrePath($user, $path), $properties);
		$this->response = $response;
	 }

	/**
	 * @Given /^"([^"]*)" has set property "([^"]*)" of (file|folder|entry) "([^"]*)" to "([^"]*)"$/
	 * @param string $user
	 * @param string $propertyName
	 * @param string $elementType unused
	 * @param string $path
	 * @param string $propertyValue
	 */
	public function userHasSetPropertyOfEntryTo($user, $propertyName, $elementType, $path, $propertyValue) {
		$client = $this->getSabreClient($user);
		$properties = [
				$propertyName => $propertyValue
		];
		$client->proppatch($this->makeSabrePath($user, $path), $properties);
	}

	/**
	 * @Then /^the response should contain a custom "([^"]*)" property with "([^"]*)"$/
	 * @param string $propertyName
	 * @param string $propertyValue
	 * @param null $table unused
	 * @throws Exception
	 */
	public function theResponseShouldContainACustomPropertyWithValue($propertyName, $propertyValue, $table=null)
	{
		$keys = $this->response;
		if (!array_key_exists($propertyName, $keys)) {
			throw new \Exception("Cannot find property \"$propertyName\"");
		}
		if ($keys[$propertyName] !== $propertyValue) {
			throw new \Exception("\"$propertyName\" has a value \"${keys[$propertyName]}\" but \"$propertyValue\" expected");
		}
	}

	/**
	 * @Then /^as "([^"]*)" the (file|folder|entry) "([^"]*)" should not exist$/
	 * @param string $user
	 * @param string $entry
	 * @param string $path
	 * @return array
	 * @throws Exception
	 */
	public function asTheFileOrFolderShouldNotExist($user, $entry, $path) {
		$client = $this->getSabreClient($user);
		$response = $client->request('HEAD', $this->makeSabrePath($user, '/' . ltrim($path, '/')));
		if ($response['statusCode'] !== 404) {
			throw new \Exception($entry . ' "' . $path . '" expected to not exist (status code ' . $response['statusCode'] . ', expected 404)');
		}

		return $response;
	}

	/**
	 * @Then /^as "([^"]*)" the (file|folder|entry) "([^"]*)" should exist$/
	 * @param string $user
	 * @param string $entry
	 * @param string $path
	 * @throws Exception
	 */
	public function asTheFileOrFolderShouldExist($user, $entry, $path) {
		$this->response = $this->listFolder($user, $path, 0);
		if (!is_array($this->response) || !isset($this->response['{DAV:}getetag'])) {
			throw new \Exception($entry . ' "' . $path . '" expected to exist but not found');
		}
	}

	/**
	 * @Then the single response should contain a property :key with value :value
	 * @param string $key
	 * @param string $expectedValue
	 * @throws \Exception
	 */
	public function theSingleResponseShouldContainAPropertyWithValue($key, $expectedValue) {
		$keys = $this->response;
		if (!array_key_exists($key, $keys)) {
			throw new \Exception("Cannot find property \"$key\" with \"$expectedValue\"");
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
			if (preg_match("#^/remote.php/dav/comments/files/([0-9]+)$#", $value)) {
				return 0;
			} else {
				throw new \Exception("Property \"$key\" found with value \"$value\", expected \"$expectedValue\"");
			}
		}

		if ($value != $expectedValue) {
			throw new \Exception("Property \"$key\" found with value \"$value\", expected \"$expectedValue\"");
		}
	}

	/**
	 * @Then the single response should contain a property :key with value like :regex
	 * @param string $key
	 * @param string $regex
	 * @throws \Exception
	 */
	public function theSingleResponseShouldContainAPropertyWithValueLike($key, $regex) {
		$keys = $this->response;
		if (!array_key_exists($key, $keys)) {
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

		if (preg_match($regex, $value)) {
			return 0;
		} else {
			throw new \Exception("Property \"$key\" found with value \"$value\", expected \"$regex\"");
		}
	}


	/**
	 * @Then the response should contain a share-types property with
	 * @param \Behat\Gherkin\Node\TableNode $table
	 * @throws Exception
	 */
	public function theResponseShouldContainAShareTypesPropertyWith($table)
	{
		$keys = $this->response;
		if (!array_key_exists('{http://owncloud.org/ns}share-types', $keys)) {
			throw new \Exception("Cannot find property \"{http://owncloud.org/ns}share-types\"");
		}

		$foundTypes = [];
		$data = $keys['{http://owncloud.org/ns}share-types'];
		foreach ($data as $item) {
			if ($item['name'] !== '{http://owncloud.org/ns}share-type') {
				throw new \Exception('Invalid property found: "' . $item['name'] . '"');
			}

			$foundTypes[] = $item['value'];
		}

		foreach ($table->getRows() as $row) {
			$key = array_search($row[0], $foundTypes);
			if ($key === false) {
				throw new \Exception('Expected type ' . $row[0] . ' not found');
			}

			unset($foundTypes[$key]);
		}

		if ($foundTypes !== []) {
			throw new \Exception('Found more share types then specified: ' . $foundTypes);
		}
	}

	/**
	 * @Then the response should contain an empty property :property
	 * @param string $property
	 * @throws \Exception
	 */
	public function theResponseShouldContainAnEmptyProperty($property) {
		$properties = $this->response;
		if (!array_key_exists($property, $properties)) {
			throw new \Exception("Cannot find property \"$property\"");
		}

		if ($properties[$property] !== null) {
			throw new \Exception("Property \"$property\" is not empty");
		}
	}

	/**
	 * Returns the elements of a propfind
	 * @param string $user
	 * @param string $path
	 * @param int $folderDepth requires 1 to see elements without children
	 * @param array|null $properties
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
			$response = $client->propfind($this->makeSabrePath($user, $path), $properties, $folderDepth);
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
	 * @return array|\Sabre\HTTP\ResponseInterface
	 */
	public function listVersionFolder($user, $path, $folderDepth, $properties = null) {
		$client = $this->getSabreClient($user);
		if (!$properties) {
			$properties = [
				'{DAV:}getetag'
			];
		}

		try {
			$response = $client->propfind($this->makeSabrePathNotForFiles($path), $properties, $folderDepth);
		} catch (Sabre\HTTP\ClientHttpException $e) {
			$response = $e->getResponse();
		}
		return $response;
	}

	/**
	 * @Then the version folder of file :path for user :user contains :count elements
	 * @param string $path
	 * @param string $user
	 * @param int $count
	 */
	public function theVersionFolderOfFileContainsElements($path, $user, $count) {
		$fileId = $this->getFileIdForPath($user, $path);
		$elements = $this->listVersionFolder($user, '/meta/'.$fileId.'/v', 1);
		PHPUnit_Framework_Assert::assertEquals($count, count($elements)-1);
	}

	/**
	 * @Then the version folder of fileId :fileId contains :count elements
	 * @param int $fileId
	 * @param int $count
	 */
	public function theVersionFolderOfFileIdContainsElements($fileId, $count) {
		$elements = $this->listVersionFolder($this->currentUser, '/meta/'.$fileId.'/v', 1);
		PHPUnit_Framework_Assert::assertEquals($count, count($elements)-1);
	}

	/**
	 * @Then the content length of file :path with version index :index for user :user in versions folder is :length
	 * @param string $path
	 * @param int $index
	 * @param string $user
	 * @param int $length
	 */
	public function theContentLengthOfFileForUserInVersionsFolderIs($path, $index, $user, $length) {
		$fileId = $this->getFileIdForPath($user, $path);
		$elements = $this->listVersionFolder($user, '/meta/'.$fileId.'/v', 1, ['{DAV:}getcontentlength']);
		$elements = array_values($elements);
		PHPUnit_Framework_Assert::assertEquals($length, $elements[$index]['{DAV:}getcontentlength']);
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
	 * @return array
	 */
	public function reportFolder($user, $path, $properties, $filterRules, $offset = null, $limit = null) {
		$client = $this->getSabreClient($user);

		$body = '<?xml version="1.0" encoding="utf-8" ?>
					<oc:filter-files xmlns:a="DAV:" xmlns:oc="http://owncloud.org/ns" >
						<a:prop>
							' . $properties . '
						</a:prop>
						<oc:filter-rules>
							' . $filterRules . '
						</oc:filter-rules>';
		if (is_int($offset) || is_int($limit)) {
			$body .=	'
						<oc:search>';
			if (is_int($offset)) {
				$body .= "
							<oc:offset>${offset}</oc:offset>";
			}
			if (is_int($limit)) {
				$body .= "
							<oc:limit>${limit}</oc:limit>";
			}
			$body .=	'
						</oc:search>';
		}
		$body .= '
					</oc:filter-files>';

		$response = $client->request('REPORT', $this->makeSabrePath($user, $path), $body);
		$parsedResponse = $client->parseMultistatus($response['body']);
		return $parsedResponse;
	}

	/* Returns the elements of a report command special for comments
	 * @param string $user
	 * @param string $path
	 * @param string $properties properties which needs to be included in the report
	 */
	public function reportElementComments($user, $path, $properties) {
		$client = $this->getSabreClient($user);

		$body = '<?xml version="1.0" encoding="utf-8" ?>
							 <oc:filter-comments xmlns:a="DAV:" xmlns:oc="http://owncloud.org/ns" >
									' . $properties . '
							 </oc:filter-comments>';


		$response = $client->request('REPORT', $this->makeSabrePathNotForFiles($path), $body);

		$parsedResponse = $client->parseMultistatus($response['body']);
		return $parsedResponse;
	}

	/**
	 * @param string $user
	 * @param string $path
	 * @return string
	 */
	public function makeSabrePath($user, $path) {
		return $this->encodePath($this->getDavFilesPath($user) . $path);
	}

	/**
	 * @param string $path
	 * @return string
	 */
	public function makeSabrePathNotForFiles($path) {
		return $this->encodePath($this->davPath . $path);
	}

	/**
	 * @param string $user
	 * @return SClient
	 */
	public function getSabreClient($user) {
		return WebDavHelper::getSabreClient(
			$this->baseUrlWithoutOCSAppendix(),
			$user,
			$this->getPasswordForUser($user));
	}

	/**
	 * @Then /^user "([^"]*)" should see following elements$/
	 * @param string $user
	 * @param \Behat\Gherkin\Node\TableNode|null $expectedElements
	 */
	public function checkElementList($user, $expectedElements) {
		$elementList = $this->listFolder($user, '/', 3);
		if ($expectedElements instanceof \Behat\Gherkin\Node\TableNode) {
			$elementRows = $expectedElements->getRows();
			$elementsSimplified = $this->simplifyArray($elementRows);
			foreach ($elementsSimplified as $expectedElement) {
				$webdavPath = "/" . $this->getDavFilesPath($user) . $expectedElement;
				if (!array_key_exists($webdavPath,$elementList)) {
					PHPUnit_Framework_Assert::fail("$webdavPath" . " is not in propfind answer");
				}
			}
		}
	}

	/**
	 * @When user :user uploads file :source to :destination using the API
	 * @Given user :user has uploaded file :source to :destination
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 */
	public function userUploadsAFileTo($user, $source, $destination) {
		$file = \GuzzleHttp\Stream\Stream::factory(fopen($source, 'r'));
		try {
			$this->response = $this->makeDavRequest($user, "PUT", $destination, [], $file);
		} catch (BadResponseException $e) {
			// 4xx and 5xx responses cause an exception
			$this->response = $e->getResponse();
		}
	}

	/**
	 * @When user :user uploads file :source to :destination with chunks using the API
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 * @param string $chunkingVersion null for autodetect, "old" with old style, "new" for new style
	 */
	public function userUploadsAFileToWithChunks($user, $source, $destination, $chunkingVersion = null) {
		$size = filesize($source);
		$contents = file_get_contents($source);

		// use two chunks for the sake of testing
		$chunks = [];
		$chunks[] = substr($contents, 0, $size / 2);
		$chunks[] = substr($contents, $size / 2);

		$this->uploadChunks($user, $chunks, $destination, $chunkingVersion);
	}

	/**
	 * @param string $user
	 * @param array $chunks
	 * @param string $destination
	 * @param string|null $chunkingVersion null for autodetect, "old" with old style, "new" for new style
	 */
	public function uploadChunks($user, $chunks, $destination, $chunkingVersion = null) {
		if ($chunkingVersion === null) {
			if ($this->usingOldDavPath) {
				$chunkingVersion = 'old';
			} else {
				$chunkingVersion = 'new';
			}
		}
		if ($chunkingVersion === 'old') {
			foreach ($chunks as $index => $chunk) {
				$this->userUploadsChunkedFile($user, $index + 1, count($chunks), $chunk, $destination);
			}
		} else {
			$id = 'chunking-43';
			$this->userCreatesANewChunkingUploadWithId($user, $id);
			foreach ($chunks as $index => $chunk) {
				$this->userUploadsNewChunkFileOfWithToId($user, $index + 1, $chunk, $id);
			}
			$this->userMovesNewChunkFileWithIdToMychunkedfile($user, $id, $destination);
		}
	}

	/**
	 * Uploading with old/new dav and chunked/non-chunked.
	 *
	 * @When user :user uploads file :source to :destination with all mechanisms using the API
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 */
	public function userUploadsAFileToWithAllMechanisms($user, $source, $destination) {
		$this->uploadResponses = $this->uploadWithAllMechanisms($user, $source, $destination, false);
	}

	/**
	 * Overwriting with old/new dav and chunked/non-chunked.
	 *
	 * @When user :user overwrites file :source to :destination with all mechanisms using the API
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 */
	public function userOverwritesAFileToWithAllMechanisms($user, $source, $destination) {
		$this->uploadResponses = $this->uploadWithAllMechanisms($user, $source, $destination, true);
	}

	/**
	 * Upload the same file multiple times with different mechanisms.
	 *
	 * @param string $user user who uploads
	 * @param string $source source file path
	 * @param string $destination destination path on the server
	 * @param bool $overwriteMode when false creates separate files to test uploading brand new files,
	 * when true it just overwrites the same file over and over again with the same name
	 */
	public function uploadWithAllMechanisms($user, $source, $destination, $overwriteMode = false) {
		$responses = [];
		foreach (['old', 'new'] as $dav) {
			if ($dav === 'old') {
				$this->usingOldDavPath();
			} else {
				$this->usingNewDavPath();
			}

			$suffix = '';

			// regular upload
			try {
				if (!$overwriteMode) {
					$suffix = '-' . $dav . 'dav-regular';
				}
				$this->userUploadsAFileTo($user, $source, $destination . $suffix);
				$responses[] = $this->response;
			} catch (BadResponseException $e) {
				$responses[] = $e->getResponse();
			}

			// old chunking upload
			if ($dav === 'old') {
				if (!$overwriteMode) {
					$suffix = '-' . $dav . 'dav-oldchunking';
				}
				try {
					$this->userUploadsAFileToWithChunks($user, $source, $destination . $suffix, 'old');
					$responses[] = $this->response;
				} catch (BadResponseException $e) {
					$responses[] = $e->getResponse();
				}
			}
			if ($dav === 'new') {
				if (!$overwriteMode) {
					$suffix = '-' . $dav . 'dav-newchunking';
				}
				try {
					$this->userUploadsAFileToWithChunks($user, $source, $destination . $suffix, 'new');
					$responses[] = $this->response;
				} catch (BadResponseException $e) {
					$responses[] = $e->getResponse();
				}
			}
		}

		return $responses;
	}

	/**
	 * @Then /^the HTTP status code of all upload responses should be "([^"]*)"$/
	 * @param int $statusCode
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
	 * Check that all the files uploaded with old/new dav and chunked/non-chunked exist.
	 *
	 * @Then as :user the files uploaded to :destination with all mechanisms should exist
	 * @param string $user
	 * @param string $destination
	 */
	public function filesUploadedToWithAllMechanismsShouldExist($user, $destination) {
		foreach (['old', 'new'] as $davVersion) {
			foreach ([$davVersion . 'dav-regular', $davVersion . 'dav-' . $davVersion . 'chunking'] as $suffix) {
				$this->asTheFileOrFolderShouldExist($user, 'file', $destination . '-' . $suffix);
			}
		}
	}

	/**
	 * @Given user :user has added file :destination of :bytes bytes
	 * @param string $user
	 * @param string $bytes
	 * @param string $destination
	 */
	public function userAddsAFileTo($user, $destination, $bytes) {
		$filename = "filespecificSize.txt";
		$this->createFileSpecificSize($filename, $bytes);
		PHPUnit_Framework_Assert::assertFileExists("work/$filename");
		$this->userUploadsAFileTo($user, "work/$filename", $destination);
		$this->removeFile("work/", $filename);
		$expectedElements = new \Behat\Gherkin\Node\TableNode([["$destination"]]);
		$this->checkElementList($user, $expectedElements);
	}

	/**
	 * @Given user :user has uploaded file with content :content to :destination
	 * @param string $user
	 * @param string $content
	 * @param string $destination
	 * @return string
	 */
	public function userUploadsAFileWithContentTo($user, $content, $destination)
	{
		$file = \GuzzleHttp\Stream\Stream::factory($content);
		try {
			$this->response = $this->makeDavRequest($user, "PUT", $destination, [], $file);
			return $this->response->getHeader('oc-fileid');
		} catch (BadResponseException $e) {
			// 4xx and 5xx responses cause an exception
			$this->response = $e->getResponse();
		}
	}


	/**
	 * @When user :user uploads file with checksum :checksum and content :content to :destination using the API
	 * @Given user :user has uploaded file with checksum :checksum and content :content to :destination
	 * @param string $user
	 * @param string $checksum
	 * @param string $content
	 * @param string $destination
	 */
	public function userUploadsAFileWithChecksumAndContentTo($user, $checksum, $content, $destination)
	{
		$file = \GuzzleHttp\Stream\Stream::factory($content);
		try {
			$this->response = $this->makeDavRequest(
				$user,
				"PUT",
				$destination,
				['OC-Checksum' => $checksum],
				$file
			);
		} catch (BadResponseException $e) {
			// 4xx and 5xx responses cause an exception
			$this->response = $e->getResponse();
		}
	}


	/**
	 * @Given file :file has been deleted for user :user
	 * @param string $file
	 * @param string $user
	 */
	public function fileHasBeenDeleted($file, $user) {
		try {
			$this->response = $this->makeDavRequest($user, 'DELETE', $file, []);
		} catch (BadResponseException $e) {
			// 4xx and 5xx responses cause an exception
			$this->response = $e->getResponse();
		}
	}

	/**
	 * @When /^user "([^"]*)" deletes (file|folder) "([^"]*)" using the API$/
	 * @Given /^user "([^"]*)" has deleted (file|folder) "([^"]*)"$/
	 * @param string $user
	 * @param string $type unused
	 * @param string $file
	 */
	public function userDeletesFile($user, $type, $file) {
		try {
			$this->response = $this->makeDavRequest($user, 'DELETE', $file, []);
		} catch (BadResponseException $e) {
			// 4xx and 5xx responses cause an exception
			$this->response = $e->getResponse();
		}
	}

	/**
	 * @When user :user creates a folder :destination using the API
	 * @Given user :user has created a folder :destination
	 * @param string $user
	 * @param string $destination
	 */
	public function userCreatesAFolder($user, $destination) {
		try {
			$destination = '/' . ltrim($destination, '/');
			$this->response = $this->makeDavRequest($user, "MKCOL", $destination, []);
		} catch (BadResponseException $e) {
			// 4xx and 5xx responses cause an exception
			$this->response = $e->getResponse();
		}
	}

	/**
	 * Old style chunking upload
	 *
	 * @When user :user uploads chunk file :num of :total with :data to :destination using the API
	 * @Given user :user has uploaded chunk file :num of :total with :data to :destination
	 * @param string $user
	 * @param int $num
	 * @param int $total
	 * @param string $data
	 * @param string $destination
	 */
	public function userUploadsChunkedFile($user, $num, $total, $data, $destination)
	{
		try {
			$num -= 1;
			$data = \GuzzleHttp\Stream\Stream::factory($data);
			$file = $destination . '-chunking-42-' . $total . '-' . $num;
			$this->makeDavRequest($user, 'PUT', $file, ['OC-Chunked' => '1'], $data,  "uploads");
		} catch (\GuzzleHttp\Exception\RequestException $ex) {
			$this->response = $ex->getResponse();
		}
	}

	/**
	 * @When user :user creates a new chunking upload with id :id using the API
	 * @Given user :user has created a new chunking upload with id :id
	 * @param string $user
	 * @param string $id
	 */
	public function userCreatesANewChunkingUploadWithId($user, $id)
	{
		try {
			$destination = '/uploads/'.$user.'/'.$id;
			$this->makeDavRequest($user, 'MKCOL', $destination, [], null, "uploads");
		} catch (\GuzzleHttp\Exception\RequestException $ex) {
			$this->response = $ex->getResponse();
		}
	}

	/**
	 * @When user :user uploads new chunk file :num with :data to id :id using the API
	 * @Given user :user has uploaded new chunk file :num with :data to id :id
	 * @param string $user
	 * @param int $num
	 * @param string $data
	 * @param string $id
	 */
	public function userUploadsNewChunkFileOfWithToId($user, $num, $data, $id)
	{
		try {
			$data = \GuzzleHttp\Stream\Stream::factory($data);
			$destination = '/uploads/'. $user .'/'. $id .'/' . $num;
			$this->makeDavRequest($user, 'PUT', $destination, [], $data, "uploads");
		} catch (\GuzzleHttp\Exception\RequestException $ex) {
			$this->response = $ex->getResponse();
		}
	}

	/**
	 * @When user :user moves new chunk file with id :id to :dest using the API
	 * @Given user :user has moved new chunk file with id :id to :dest
	 * @param string $user
	 * @param string $id
	 * @param string $dest
	 */
	public function userMovesNewChunkFileWithIdToMychunkedfile($user, $id, $dest) {
		$this->moveNewDavChunkToFinalFile($user, $id, $dest, []);
	}

	/**
	 * @When user :user moves new chunk file with id :id to :dest with size :size using the API
	 * @param string $user
	 * @param string $id
	 * @param string $dest
	 * @param int $size
	 */
	public function userMovesNewChunkFileWithIdToMychunkedfileWithSize($user, $id, $dest, $size) {
		$this->moveNewDavChunkToFinalFile($user, $id, $dest, ['OC-Total-Length' => $size]);
	}

	/**
	 * @When user :user moves new chunk file with id :id to :dest with checksum :checksum using the API
	 * @param string $user
	 * @param string $id
	 * @param string $dest
	 * @param string $checksum
	 */
	public function userMovesNewChunkFileWithIdToMychunkedfileWithChecksum($user, $id, $dest, $checksum) {
		$this->moveNewDavChunkToFinalFile($user, $id, $dest, ['OC-Checksum' => $checksum]);
	}

	/**
	 * Move chunked new dav file to final file
	 *
	 * @param string $user user
	 * @param string $id upload id
	 * @param string $dest destination path
	 * @param array $headers extra headers
	 */
	private function moveNewDavChunkToFinalFile($user, $id, $dest, $headers) {
		$source = '/uploads/' . $user . '/' . $id . '/.file';
		$destination = $this->baseUrlWithoutOCSAppendix() . $this->getDavFilesPath($user) . $dest;

		$headers['Destination'] = $destination;

		try {
			$this->response = $this->makeDavRequest($user, 'MOVE', $source, $headers, null, "uploads");
		} catch (BadResponseException $ex) {
			$this->response = $ex->getResponse();
		}
	}

	/**
	 * URL encodes the given path but keeps the slashes
	 *
	 * @param string $path to encode
	 * @return string encoded path
	 */
	private function encodePath($path) {
		// slashes need to stay
		return str_replace('%2F', '/', rawurlencode($path));
	}

	/**
	 * @When user :user favorites element :path using the API
	 * @Given user :user has favorited element :path
	 * @param string $user
	 * @param string $path
	 */
	public function userFavoritesElement($user, $path) {
		$this->response = $this->changeFavStateOfAnElement($user, $path, 1, 0, null);
	}

	/**
	 * @When user :user unfavorites element :path using the API
	 * @Given user :user has unfavorited element :path
	 * @param string $user
	 * @param string $path
	 */
	public function userUnfavoritesElement($user, $path) {
		$this->response = $this->changeFavStateOfAnElement($user, $path, 0, 0, null);
	}

	/**
	 * Set the elements of a proppatch
	 * @param string $user
	 * @param string $path
	 * @param int $favOrUnfav 1 = favorite, 0 = unfavorite
	 * @param int $folderDepth requires 1 to see elements without children
	 * @param array|null $properties
	 * @return bool
	 */
	public function changeFavStateOfAnElement($user, $path, $favOrUnfav, $folderDepth, $properties = null) {
		$settings = [
			'baseUri' => $this->baseUrlWithoutOCSAppendix(),
			'userName' => $user,
			'password' => $this->getPasswordForUser($user),
			'authType' => SClient::AUTH_BASIC
		];
		$client = new SClient($settings);
		if (!$properties) {
			$properties = [
				'{http://owncloud.org/ns}favorite' => $favOrUnfav
			];
		}

		$response = $client->proppatch($this->getDavFilesPath($user) . $path, $properties, $folderDepth);
		return $response;
	}

	/**
	 * @When user :user stores etag of element :path using the API
	 * @Given user :user has stored etag of element :path
	 * @param string $user
	 * @param string $path
	 */
	public function userStoresEtagOfElement($user, $path) {
		$propertiesTable = new \Behat\Gherkin\Node\TableNode([['{DAV:}getetag']]);
		$this->asGetsPropertiesOfFolderWith($user, NULL, $path, $propertiesTable);
		$pathETAG[$path] = $this->response['{DAV:}getetag'];
		$this->storedETAG[$user] = $pathETAG;
	}

	/**
	 * @Then the etag of element :path of user :user should not have changed
	 * @param string $path
	 * @param string $user
	 */
	public function etagOfElementOfUserShouldNotHaveChanged($path, $user) {
		$propertiesTable = new \Behat\Gherkin\Node\TableNode([['{DAV:}getetag']]);
		$this->asGetsPropertiesOfFolderWith($user, NULL, $path, $propertiesTable);
		PHPUnit_Framework_Assert::assertEquals($this->response['{DAV:}getetag'], $this->storedETAG[$user][$path]);
	}

	/**
	 * @Then the etag of element :path of user :user should have changed
	 * @param string $path
	 * @param string $user
	 */
	public function etagOfElementOfUserShouldHaveChanged($path, $user) {
		$propertiesTable = new \Behat\Gherkin\Node\TableNode([['{DAV:}getetag']]);
		$this->asGetsPropertiesOfFolderWith($user, NULL, $path, $propertiesTable);
		PHPUnit_Framework_Assert::assertNotEquals($this->response['{DAV:}getetag'], $this->storedETAG[$user][$path]);
	}

	/**
	 * @When an unauthenticated client connects to the dav endpoint using the API
	 */
	public function connectingToDavEndpoint() {
		try {
			$this->response = $this->makeDavRequest(null, 'PROPFIND', '', []);
		} catch (BadResponseException $e) {
			$this->response = $e->getResponse();
		}
	}

	/**
	 * @Then there should be no duplicate headers
	 */
	public function thereAreNoDuplicateHeaders() {
		$headers = $this->response->getHeaders();
		foreach ($headers as $headerName => $headerValues) {
			// if a header has multiple values, they must be different
			if (count($headerValues) > 1 && count(array_unique($headerValues)) < count($headerValues)) {
				throw new \Exception('Duplicate header found: ' . $headerName);
			}
		}
    }

    /**
	 * @Then /^user "([^"]*)" in folder "([^"]*)" should have favorited the following elements$/
	 * @param string $user
	 * @param string $folder
	 * @param \Behat\Gherkin\Node\TableNode|null $expectedElements
	 */
	public function checkFavoritedElements($user, $folder, $expectedElements) {
		$this->checkFavoritedElementsPaginated($user, $folder, $expectedElements, null, null);
	}

    /**
	 * @Then /^user "([^"]*)" in folder "([^"]*)" should have favorited the following elements from offset ([\d*]) and limit ([\d*])$/
	 * @param string $user
	 * @param string $folder
	 * @param \Behat\Gherkin\Node\TableNode|null $expectedElements
	 * @param int $offset unused
	 * @param int $limit unused
	 */
	public function checkFavoritedElementsPaginated($user, $folder, $expectedElements, $offset, $limit) {
		$elementList = $this->reportFolder($user,
											$folder,
											'<oc:favorite/>',
											'<oc:favorite>1</oc:favorite>');
		if ($expectedElements instanceof \Behat\Gherkin\Node\TableNode) {
			$elementRows = $expectedElements->getRows();
			$elementsSimplified = $this->simplifyArray($elementRows);
			foreach ($elementsSimplified as $expectedElement) {
				$webdavPath = "/" . $this->getDavFilesPath($user) . $expectedElement;
				if (!array_key_exists($webdavPath,$elementList)) {
					PHPUnit_Framework_Assert::fail("$webdavPath" . " is not in report answer");
				}
			}
		}
	}

	/**
	 * @When /^user "([^"]*)" deletes everything from folder "([^"]*)" using the API$/
	 * @param string $user
	 * @param string $folder
	 */
	public function userDeletesEverythingInFolder($user, $folder) {
		$elementList = $this->listFolder($user, $folder, 1);
		if (is_array($elementList) && count($elementList)) {
			$elementListKeys = array_keys($elementList);
			array_shift($elementListKeys);
			$davPrefix = "/" . $this->getDavFilesPath($user);
			foreach ($elementListKeys as $element) {
				if (substr($element, 0, strlen($davPrefix)) == $davPrefix) {
					$element = substr($element, strlen($davPrefix));
				}
				$this->userDeletesFile($user, "element", $element);
			}
		}
	}

	/**
	 * @param string $user
	 * @param string $path
	 * @return int
	 */
	private function getFileIdForPath($user, $path) {
		try {
			return WebDavHelper::getFileIdForPath(
				$this->baseUrlWithoutOCSAppendix(), $user,
				$this->getPasswordForUser($user), $path);
		} catch ( Exception $e ) {
			return null;
		}
	}

	/**
	 * @Given /^user "([^"]*)" has stored id of file "([^"]*)"$/
	 * @param string $user
	 * @param string $path
	 * @return void
	 */
	public function userStoresFileIdForPath($user, $path) {
		$this->storedFileID = $this->getFileIdForPath($user, $path);
	}

	/**
	 * @Given /^user "([^"]*)" file "([^"]*)" should have the previously stored id$/
	 * @param string $user
	 * @param string $path
	 * @return void
	 */
	public function userFileShouldHaveStoredId($user, $path) {
		$currentFileID = $this->getFileIdForPath($user, $path);
		PHPUnit_Framework_Assert::assertEquals($currentFileID, $this->storedFileID);
	}

	/**
	 * @When user :user restores version index :versionIndex of file :path using the API
	 * @param string $user
	 * @param int $versionIndex
	 * @param string $path
	 */
	public function userRestoresVersionIndexOfFile($user, $versionIndex, $path) {
		$fileId = $this->getFileIdForPath($user, $path);
		$client = $this->getSabreClient($user);
		$versions = array_keys($this->listVersionFolder($user, '/meta/'.$fileId.'/v', 1));
		$client->request('COPY', $versions[$versionIndex], null, ['Destination' => $this->makeSabrePath($user, $path)]);
	}

}
