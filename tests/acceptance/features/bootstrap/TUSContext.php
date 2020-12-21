<?php
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
use TestHelpers\HttpRequestHelper;
use TestHelpers\WebDavHelper;
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
	 * @param string    $user
	 * @param TableNode $headers
	 * @param string $content
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function createNewTUSresourceWithHeaders(string $user, TableNode $headers, string $content = '') {
		$this->featureContext->verifyTableNodeColumnsCount($headers, 2);
		$user = $this->featureContext->getActualUsername($user);
		$password = $this->featureContext->getUserPassword($user);
		$this->resourceLocation = null;
		$this->featureContext->setResponse(
			HttpRequestHelper::post(
				$this->featureContext->getBaseUrl() . "/" .
				WebDavHelper::getDavPath(
					$user, $this->featureContext->getDavPathVersion()
				),
				$user,
				$password,
				$headers->getRowsHash(),
				$content
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
	 * @param string    $user
	 * @param TableNode $headers Tus-Resumable: 1.0.0 header is added automatically
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function createNewTUSresource(string $user, TableNode $headers) {
		$rows = $headers->getRows();
		$rows[] = ['Tus-Resumable', '1.0.0'];
		$this->createNewTUSresourceWithHeaders($user, new TableNode($rows));
		$this->featureContext->theHTTPStatusCodeShouldBe(201);
	}

	/**
	 * @When /^user "([^"]*)" sends a chunk to the last created TUS Location with offset "([^"]*)" and data "([^"]*)" using the WebDAV API$/
	 *
	 * @param string $user
	 * @param string $offset
	 * @param string $data
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function sendsAChunkToTUSLocationWithOffsetAndData(string $user, string $offset, string $data) {
		$user = $this->featureContext->getActualUsername($user);
		$password = $this->featureContext->getUserPassword($user);
		$this->featureContext->setResponse(
			HttpRequestHelper::sendRequest(
				$this->resourceLocation, 'PATCH',
				$user, $password,
				[
					'Content-Type' => 'application/offset+octet-stream',
					'Tus-Resumable' => '1.0.0',
					'Upload-Offset' => $offset
				],
				$data
			)
		);
	}

	/**
	 * @When user :user uploads file :source to :destination using the TUS protocol on the WebDAV API
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $destination
	 * @param array  $uploadMetadata array of metadata to be placed in the
	 *                               `Upload-Metadata` header.
	 *                               see https://tus.io/protocols/resumable-upload.html#upload-metadata
	 *                               Don't Base64 encode the value.
	 * @param int    $noOfChunks
	 * @param int $bytes
	 *
	 * @return void
	 * @throws ConnectionException
	 * @throws ReflectionException
	 * @throws TusException
	 */
	public function userUploadsUsingTusAFileTo(
		string $user,
		string $source,
		string $destination,
		array $uploadMetadata = [],
		int $noOfChunks = 1,
		int $bytes = null
	) {
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
		$client = new Client(
			$this->featureContext->getBaseUrl(),
			['verify' => false,
				'headers' => $headers
			]
		);
		$client->setApiPath(
			WebDavHelper::getDavPath($user, $this->featureContext->getDavPathVersion())
		);
		$client->setMetadata($uploadMetadata);
		$sourceFile = $this->featureContext->acceptanceTestsDirLocation() . $source;
		$client->setKey(\rand())->file($sourceFile, $destination);
		$this->featureContext->pauseUploadDelete();

		if ($bytes !== null) {
			$client->file($sourceFile, $destination)->createWithUpload($client->getKey(), $bytes);
		} elseif ($noOfChunks === 1 && $bytes === null) {
			$client->file($sourceFile, $destination)->upload();
		} else {
			$bytesPerChunk = \ceil(\filesize($sourceFile) / $noOfChunks);
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
	 * @return string
	 */
	public function userUploadsAFileWithContentToUsingTus(
		string $user, string $content, string $destination
	) {
		$tmpfname = $this->writeDataToTempFile($content);
		try {
			$this->userUploadsUsingTusAFileTo(
				$user, \basename($tmpfname), $destination
			);
		} catch (Exception $e) {
			Assert::assertStringContainsString('TusPhp\Exception\FileException: Unable to create resource', $e);
		}
		\unlink($tmpfname);
	}

	/**
	 * @When user :user uploads file with content :content in :noOfChunks chunks to :destination using the TUS protocol on the WebDAV API
	 *
	 * @param string $user
	 * @param string $content
	 * @param int    $noOfChunks
	 * @param string $destination
	 *
	 * @return void
	 * @throws ConnectionException
	 * @throws ReflectionException
	 * @throws TusException
	 */
	public function userUploadsAFileWithContentInChunksUsingTus(
		string $user,
		string $content,
		int $noOfChunks,
		string $destination
	) {
		$tmpfname = $this->writeDataToTempFile($content);
		$this->userUploadsUsingTusAFileTo(
			$user, \basename($tmpfname), $destination, [], $noOfChunks
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
	 */
	public function userUploadsFileWithContentToWithMtimeUsingTUS(
		string $user, string $source, string $destination, string $mtime
	) {
		$mtime = new DateTime($mtime);
		$mtime = $mtime->format('U');
		$user = $this->featureContext->getActualUsername($user);
		$this->userUploadsUsingTusAFileTo(
			$user, $source, $destination, ['mtime' => $mtime]
		);
	}

	/**
	 * @param string $content
	 *
	 * @return string the file name
	 * @throws Exception
	 */
	private function writeDataToTempFile(string $content) {
		$tmpfname = \tempnam(
			$this->featureContext->acceptanceTestsDirLocation(), "tus-upload-test-"
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
	public function setUpScenario(BeforeScenarioScope $scope) {
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
	 */
	public function userCreatesWithUpload(
		string $user, string $content, TableNode $headers
	) {
		$this->createNewTUSresourceWithHeaders($user, $headers, $content);
	}

	/**
	 * @When user :user creates file :source and uploads content :content in the same request using the TUS protocol on the WebDAV API
	 *
	 * @param string $user
	 * @param string $source
	 * @param string $content
	 *
	 * @return void
	 */
	public function userUploadsWithCreatesWithUpload(
		string$user,
		string $source,
		string $content
	) {
		$tmpfname = $this->writeDataToTempFile($content);
		$this->userUploadsUsingTusAFileTo(
			$user, \basename($tmpfname), $source, [], 1, -1
		);
		\unlink($tmpfname);
	}
}
