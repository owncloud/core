<?php declare(strict_types=1);
/**
 * @author Artur Neumann <artur@jankaritech.com>
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use GuzzleHttp\Exception\GuzzleException;
use TestHelpers\HttpRequestHelper;
use TestHelpers\WebDavHelper;
use TusPhp\Exception\ConnectionException;
use TusPhp\Exception\TusException;
use TusPhp\Tus\Client;
use PHPUnit\Framework\Assert;

require_once 'bootstrap.php';

/**
 * TUS related test steps
 */
class TUSContext implements Context {
	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	private $resourceLocation = null;

	/**
	 * @When user :user creates a new TUS resource on the WebDAV API with these headers:
	 *
	 * @param string $user
	 * @param TableNode $headers
	 * @param string $content
	 *
	 * @return void
	 *
	 * @throws Exception
	 * @throws GuzzleException
	 */
	public function createNewTUSResourceWithHeaders(string $user, TableNode $headers, string $content = ''):void {
		$this->featureContext->verifyTableNodeColumnsCount($headers, 2);
		$user = $this->featureContext->getActualUsername($user);
		$password = $this->featureContext->getUserPassword($user);
		$this->resourceLocation = null;

		$this->featureContext->setResponse(
			$this->featureContext->makeDavRequest(
				$user,
				"POST",
				null,
				$headers->getRowsHash(),
				$content,
				"files",
				null,
				false,
				$password
			)
		);
		$locationHeader = $this->featureContext->getResponse()->getHeader('Location');
		if (\sizeof($locationHeader) > 0) {
			$this->resourceLocation = $locationHeader[0];
		}
	}

	/**
	 * @Given user :user has created a new TUS resource on the WebDAV API with these headers:
	 *
	 * @param string $user
	 * @param TableNode $headers Tus-Resumable: 1.0.0 header is added automatically
	 *
	 * @return void
	 *
	 * @throws Exception
	 * @throws GuzzleException
	 */
	public function createNewTUSResource(string $user, TableNode $headers):void {
		$rows = $headers->getRows();
		$rows[] = ['Tus-Resumable', '1.0.0'];
		$this->createNewTUSResourceWithHeaders($user, new TableNode($rows));
		$this->featureContext->theHTTPStatusCodeShouldBe(201);
	}

	/**
	 * @When /^user "([^"]*)" sends a chunk to the last created TUS Location with offset "([^"]*)" and data "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $offset
	 * @param string $data
	 * @param string $checksum
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function sendsAChunkToTUSLocationWithOffsetAndData(string $user, string $offset, string $data, string $checksum = ''):void {
		$user = $this->featureContext->getActualUsername($user);
		$password = $this->featureContext->getUserPassword($user);
		$this->featureContext->setResponse(
			HttpRequestHelper::sendRequest(
				$this->resourceLocation,
				$this->featureContext->getStepLineRef(),
				'PATCH',
				$user,
				$password,
				[
					'Content-Type' => 'application/offset+octet-stream',
					'Tus-Resumable' => '1.0.0',
					'Upload-Checksum' => $checksum,
					'Upload-Offset' => $offset
				],
				$data
			)
		);
		WebDavHelper::$SPACE_ID_FROM_OCIS = '';
	}

	/**
	 * @When user :user uploads file :source to :destination using the TUS protocol on the WebDAV API
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 * @param array $uploadMetadata array of metadata to be placed in the
	 *                              `Upload-Metadata` header.
	 *                              see https://tus.io/protocols/resumable-upload.html#upload-metadata
	 *                              Don't Base64 encode the value.
	 * @param int $noOfChunks
	 * @param int|null $bytes
	 * @param string $checksum
	 *
	 * @return void
	 * @throws ConnectionException
	 * @throws GuzzleException
	 * @throws JsonException
	 * @throws ReflectionException
	 * @throws TusException
	 */
	public function userUploadsUsingTusAFileTo(
		?string $user,
		string $source,
		string $destination,
		array $uploadMetadata = [],
		int $noOfChunks = 1,
		int $bytes = null,
		string $checksum = ''
	):void {
		$user = $this->featureContext->getActualUsername($user);
		$password = $this->featureContext->getUserPassword($user);
		$headers = [
			'Authorization' => 'Basic ' . \base64_encode($user . ':' . $password)
		];
		if ($bytes !==  null) {
			$creationWithUploadHeader = [
				'Content-Type' => 'application/offset+octet-stream',
				'Tus-Resumable' => '1.0.0'
			];
			$headers = \array_merge($headers, $creationWithUploadHeader);
		}
		if ($checksum != '') {
			$checksumHeader = [
				'Upload-Checksum' => $checksum
			];
			$headers = \array_merge($headers, $checksumHeader);
		}

		$client = new Client(
			$this->featureContext->getBaseUrl(),
			['verify' => false,
				'headers' => $headers
			]
		);
		$client->setApiPath(
			WebDavHelper::getDavPath(
				$user,
				$this->featureContext->getDavPathVersion(),
				"files",
				WebDavHelper::$SPACE_ID_FROM_OCIS ? WebDavHelper::$SPACE_ID_FROM_OCIS : $this->featureContext->getPersonalSpaceIdForUser($user)
			)
		);
		WebDavHelper::$SPACE_ID_FROM_OCIS = '';
		$client->setMetadata($uploadMetadata);
		$sourceFile = $this->featureContext->acceptanceTestsDirLocation() . $source;
		$client->setKey((string)rand())->file($sourceFile, $destination);
		$this->featureContext->pauseUploadDelete();

		if ($bytes !== null) {
			$client->file($sourceFile, $destination)->createWithUpload($client->getKey(), $bytes);
		} elseif ($noOfChunks === 1 && $bytes === null) {
			$client->file($sourceFile, $destination)->upload();
		} else {
			$bytesPerChunk = (int)\ceil(\filesize($sourceFile) / $noOfChunks);
			for ($i = 0; $i < $noOfChunks; $i++) {
				$client->upload($bytesPerChunk);
			}
		}
		$this->featureContext->setLastUploadDeleteTime(\time());
	}

	/**
	 * @When user :user uploads file with content :content to :destination using the TUS protocol on the WebDAV API
	 *
	 * @param string $user
	 * @param string $content
	 * @param string $destination
	 *
	 * @return void
	 * @throws GuzzleException
	 */
	public function userUploadsAFileWithContentToUsingTus(
		string $user,
		string $content,
		string $destination
	):void {
		$tmpfname = $this->writeDataToTempFile($content);
		try {
			$this->userUploadsUsingTusAFileTo(
				$user,
				\basename($tmpfname),
				$destination
			);
		} catch (Exception $e) {
			Assert::assertStringContainsString('TusPhp\Exception\FileException: Unable to create resource', (string)$e);
		}
		\unlink($tmpfname);
	}

	/**
	 * @When user :user uploads file with content :content in :noOfChunks chunks to :destination using the TUS protocol on the WebDAV API
	 *
	 * @param string|null $user
	 * @param string $content
	 * @param int|null $noOfChunks
	 * @param string $destination
	 *
	 * @return void
	 * @throws ConnectionException
	 * @throws GuzzleException
	 * @throws JsonException
	 * @throws ReflectionException
	 * @throws TusException
	 * @throws Exception
	 * @throws GuzzleException
	 */
	public function userUploadsAFileWithContentInChunksUsingTus(
		?string $user,
		string $content,
		?int $noOfChunks,
		string $destination
	):void {
		$tmpfname = $this->writeDataToTempFile($content);
		$this->userUploadsUsingTusAFileTo(
			$user,
			\basename($tmpfname),
			$destination,
			[],
			$noOfChunks
		);
		\unlink($tmpfname);
	}

	/**
	 * @When user :user uploads file :source to :destination with mtime :mtime using the TUS protocol on the WebDAV API
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 * @param string $mtime Time in human readable format is taken as input which is converted into milliseconds that is used by API
	 *
	 * @return void
	 * @throws Exception
	 * @throws GuzzleException
	 */
	public function userUploadsFileWithContentToWithMtimeUsingTUS(
		string $user,
		string $source,
		string $destination,
		string $mtime
	):void {
		$mtime = new DateTime($mtime);
		$mtime = $mtime->format('U');
		$user = $this->featureContext->getActualUsername($user);
		$this->userUploadsUsingTusAFileTo(
			$user,
			$source,
			$destination,
			['mtime' => $mtime]
		);
	}

	/**
	 * @param string $content
	 *
	 * @return string the file name
	 * @throws Exception
	 */
	private function writeDataToTempFile(string $content):string {
		$tmpfname = \tempnam(
			$this->featureContext->acceptanceTestsDirLocation(),
			"tus-upload-test-"
		);
		if ($tmpfname === false) {
			throw new \Exception("could not create a temporary filename");
		}
		$tempfile = \fopen($tmpfname, "w");
		if ($tempfile === false) {
			throw new \Exception("could not open " . $tmpfname . " for write");
		}
		\fwrite($tempfile, $content);
		\fclose($tempfile);
		return $tmpfname;
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
	}

	/**
	 * @When user :user creates a new TUS resource with content :content on the WebDAV API with these headers:
	 *
	 * @param string $user
	 * @param string $content
	 * @param TableNode $headers
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userCreatesWithUpload(
		string $user,
		string $content,
		TableNode $headers
	):void {
		$this->createNewTUSResourceWithHeaders($user, $headers, $content);
	}

	/**
	 * @When user :user creates file :source and uploads content :content in the same request using the TUS protocol on the WebDAV API
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $content
	 *
	 * @return void
	 * @throws Exception
	 * @throws GuzzleException
	 */
	public function userUploadsWithCreatesWithUpload(
		string $user,
		string $source,
		string $content
	):void {
		$tmpfname = $this->writeDataToTempFile($content);
		$this->userUploadsUsingTusAFileTo(
			$user,
			\basename($tmpfname),
			$source,
			[],
			1,
			-1
		);
		\unlink($tmpfname);
	}

	/**
	 * @When user :user uploads file with checksum :checksum to the last created TUS Location with offset :offset and content :content using the TUS protocol on the WebDAV API
	 *
	 * @param string $user
	 * @param string $checksum
	 * @param string $offset
	 * @param string $content
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userUploadsFileWithChecksum(
		string $user,
		string $checksum,
		string $offset,
		string $content
	):void {
		$this->sendsAChunkToTUSLocationWithOffsetAndData($user, $offset, $content, $checksum);
	}

	/**
	 * @Given user :user has uploaded file with checksum :checksum to the last created TUS Location with offset :offset and content :content using the TUS protocol on the WebDAV API
	 *
	 * @param string $user
	 * @param string $checksum
	 * @param string $offset
	 * @param string $content
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasUploadedFileWithChecksum(
		string $user,
		string $checksum,
		string $offset,
		string $content
	):void {
		$this->sendsAChunkToTUSLocationWithOffsetAndData($user, $offset, $content, $checksum);
		$this->featureContext->theHTTPStatusCodeShouldBe(204, "");
	}

	/**
	 * @When user :user sends a chunk to the last created TUS Location with offset :offset and data :data with checksum :checksum using the TUS protocol on the WebDAV API
	 *
	 * @param string $user
	 * @param string $offset
	 * @param string $data
	 * @param string $checksum
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userUploadsChunkFileWithChecksum(string $user, string $offset, string $data, string $checksum):void {
		$this->sendsAChunkToTUSLocationWithOffsetAndData($user, $offset, $data, $checksum);
	}

	/**
	 * @Given user :user has uploaded a chunk to the last created TUS Location with offset :offset and data :data with checksum :checksum using the TUS protocol on the WebDAV API
	 *
	 * @param string $user
	 * @param string $offset
	 * @param string $data
	 * @param string $checksum
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userHasUploadedChunkFileWithChecksum(string $user, string $offset, string $data, string $checksum):void {
		$this->sendsAChunkToTUSLocationWithOffsetAndData($user, $offset, $data, $checksum);
		$this->featureContext->theHTTPStatusCodeShouldBe(204, "");
	}

	/**
	 * @When user :user overwrites recently shared file with offset :offset and data :data with checksum :checksum using the TUS protocol on the WebDAV API with these headers:
	 * @When user :user overwrites existing file with offset :offset and data :data with checksum :checksum using the TUS protocol on the WebDAV API with these headers:
	 *
	 * @param string $user
	 * @param string $offset
	 * @param string $data
	 * @param string $checksum
	 * @param TableNode $headers Tus-Resumable: 1.0.0 header is added automatically
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function userOverwritesFileWithChecksum(string $user, string $offset, string $data, string  $checksum, TableNode $headers):void {
		$this->createNewTUSResource($user, $headers);
		$this->userHasUploadedChunkFileWithChecksum($user, $offset, $data, $checksum);
	}
}
