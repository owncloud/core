<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2018, ownCloud GmbH
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License,
 * as published by the Free Software Foundation;
 * either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use TestHelpers\HttpRequestHelper;

require_once 'bootstrap.php';

/**
 * context file for steps that execute actions as "the public".
 */
class PublicWebDavContext implements Context {
	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * @When /^the public downloads the last public shared file with range "([^"]*)" using the public WebDAV API$/
	 *
	 * @param string $range
	 *
	 * @return void
	 */
	public function downloadPublicFileWithRange($range) {
		$token = $this->featureContext->getLastShareData()->data->token;
		$fullUrl = $this->featureContext->getBaseUrl() . "/public.php/webdav";
		$headers = [
			'X-Requested-With' => 'XMLHttpRequest',
			'Range' => $range
		];
		$this->featureContext->setResponse(
			HttpRequestHelper::get($fullUrl, $token, "", $headers)
		);
	}

	/**
	 * @When /^the public downloads the last public shared file using the public WebDAV API$/
	 *
	 * @return void
	 */
	public function downloadPublicFile() {
		$token = $this->featureContext->getLastShareData()->data->token;
		$fullUrl = $this->featureContext->getBaseUrl() . "/public.php/webdav";
		$this->featureContext->setResponse(
			HttpRequestHelper::get($fullUrl, $token)
		);
	}

	/**
	 * @When /^the public deletes file "([^"]*)" from the last public share using the public WebDAV API$/
	 *
	 * @param string $fileName
	 *
	 * @return void
	 */
	public function deleteFileFromPublicShare($fileName) {
		$token = $this->featureContext->getLastShareData()->data->token;
		$fullUrl = $this->featureContext->getBaseUrl() . "/public.php/webdav/" . $fileName;
		$headers = [
			'X-Requested-With' => 'XMLHttpRequest'
		];
		$this->featureContext->setResponse(
			HttpRequestHelper::delete($fullUrl, $token, "", $headers)
		);
	}

	/**
	 * @When /^the public renames file "([^"]*)" to "([^"]*)" from the last public share using the public WebDAV API$/
	 *
	 * @param string $fileName
	 * @param string $toFileName
	 *
	 * @return void
	 */
	public function renameFileFromPublicShare($fileName, $toFileName) {
		$token = $this->featureContext->getLastShareData()->data->token;
		$fullUrl = $this->featureContext->getBaseUrl() . "/public.php/webdav/" . $fileName;
		$headers = [
			'X-Requested-With' => 'XMLHttpRequest',
			'Destination' => $this->featureContext->getBaseUrl() . "/public.php/webdav/" . $toFileName
		];
		$this->featureContext->setResponse(
			HttpRequestHelper::sendRequest($fullUrl, "MOVE", $token, "", $headers)
		);
	}
	
	/**
	 * @When /^the public downloads file "([^"]*)" from inside the last public shared folder using the public WebDAV API$/
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function downloadPublicFileInsideAFolder($path) {
		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
			$path, "", ""
		);
	}

	/**
	 * @When /^the public downloads file "([^"]*)" from inside the last public shared folder with password "([^"]*)" using the public WebDAV API$/
	 *
	 * @param string $path
	 * @param string $password
	 *
	 * @return void
	 */
	public function publicDownloadsTheFileInsideThePublicSharedFolderWithPassword(
		$path, $password = ""
	) {
		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
			$path, $password, ""
		);
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
		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
			$path, "", $range
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
	public function publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
		$path, $password, $range
	) {
		$path = \ltrim($path, "/");
		$password = $this->featureContext->getActualPassword($password);
		$fullUrl = $this->featureContext->getBaseUrl() . "/public.php/webdav/$path";
		$headers = [
			'X-Requested-With' => 'XMLHttpRequest'
		];
		if ($range !== "") {
			$headers['Range'] = $range;
		}
		$response = HttpRequestHelper::get(
			$fullUrl, $this->featureContext->getLastShareData()->data->token,
			$password, $headers
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @When the public uploads file ":filename" using the old WebDAV API
	 * @Given the public has uploaded file ":filename"
	 *
	 * @param string $source target file name
	 *
	 * @return void
	 */
	public function publiclyUploadingFile($source) {
		$file = \GuzzleHttp\Stream\Stream::factory(\fopen($source, 'r'));
		$this->publicUploadContent(\basename($source), '', $file->getContents());
	}

	/**
	 * @When the public uploads file ":filename" with content ":body" with autorename mode using the public WebDAV API
	 * @Given the public has uploaded file ":filename" with content ":body" with autorename mode
	 *
	 * @param string $filename target file name
	 * @param string $body content to upload
	 *
	 * @return void
	 */
	public function publiclyUploadingContentAutorename($filename, $body = 'test') {
		$this->publicUploadContent($filename, '', $body, true);
	}

	/**
	 * @When the public uploads file ":filename" with password ":password" and content ":body" using the public WebDAV API
	 * @Given the public has uploaded file ":filename" with password ":password" and content ":body"
	 *
	 * @param string $filename target file name
	 * @param string $password
	 * @param string $body content to upload
	 *
	 * @return void
	 */
	public function publiclyUploadingContentWithPassword(
		$filename, $password = '', $body = 'test'
	) {
		$this->publicUploadContent($filename, $password, $body);
	}

	/**
	 * @When the public overwrites file ":filename" with content ":body" using the old WebDAV API
	 * @Given the public has overwritten file ":filename" with content ":body"
	 *
	 * @param string $filename target file name
	 * @param string $body content to upload
	 *
	 * @return void
	 */
	public function publiclyOverwritingContent($filename, $body = 'test') {
		$this->publicUploadContent($filename, '', $body, false);
	}

	/**
	 * @When the public uploads file ":filename" with content ":body" using the public WebDAV API
	 * @Given the public has uploaded file ":filename" with content ":body"
	 *
	 * @param string $filename target file name
	 * @param string $body content to upload
	 *
	 * @return void
	 */
	public function publiclyUploadingContent($filename, $body = 'test') {
		$this->publicUploadContent($filename, '', $body);
	}

	/**
	 * @Then /^the public should be able to download file "([^"]*)" from inside the last public shared folder and the content should be "([^"]*)"$/
	 *
	 * @param string $path
	 * @param string $content
	 *
	 * @return void
	 */
	public function shouldBeAbleToDownloadFileInsidePublicSharedFolder(
		$path, $content
	) {
		$this->shouldBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
			"", $path, "", $content
		);
	}

	/**
	 * @Then /^the public should not be able to download file "([^"]*)" from inside the last public shared folder without a password$/
	 *
	 * @param string $path
	 *
	 * @return void
	 */
	public function shouldNotBeAbleToDownloadFileInsidePublicSharedFolder(
		$path
	) {
		$this->shouldNotBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
			"", $path, ""
		);
	}

	/**
	 * @Then /^the public should be able to download file "([^"]*)" from inside the last public shared folder with password "([^"]*)" and the content should be "([^"]*)"$/
	 *
	 * @param string $path
	 * @param string $password
	 * @param string $content
	 *
	 * @return void
	 */
	public function shouldBeAbleToDownloadFileInsidePublicSharedFolderWithPassword(
		$path, $password, $content
	) {
		$this->shouldBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
			"", $path, $password, $content
		);
	}

	/**
	 * @Then /^the public should not be able to download file "([^"]*)" from inside the last public shared folder with password "([^"]*)"$/
	 *
	 * @param string $path
	 * @param string $password
	 *
	 * @return void
	 */
	public function shouldNotBeAbleToDownloadFileInsidePublicSharedFolderWithPassword(
		$path, $password
	) {
		$this->shouldNotBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
			"", $path, $password
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
	public function shouldBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
		$range, $path, $password, $content
	) {
		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
			$path, $password, $range
		);
		$this->featureContext->downloadedContentShouldBe($content);
	}

	/**
	 * @Then /^the public should not be able to download the range "([^"]*)" of file "([^"]*)" from inside the last public shared folder with password "([^"]*)"$/
	 *
	 * @param string $range
	 * @param string $path
	 * @param string $password
	 *
	 * @return void
	 */
	public function shouldNotBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
		$range, $path, $password
	) {
		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
			$path, $password, $range
		);
		$this->featureContext->theHTTPStatusCodeShouldBe(401);
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
	public function shouldBeAbleToDownloadRangeOfFileInsidePublicSharedFolder(
		$range, $path, $content
	) {
		$this->shouldBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
			$range, $path, "", $content
		);
	}

	/**
	 * @Then /^the public should not be able to download the range "([^"]*)" of file "([^"]*)" from inside the last public shared folder without a password$/
	 *
	 * @param string $range
	 * @param string $path
	 *
	 * @return void
	 */
	public function shouldNotBeAbleToDownloadRangeOfFileInsidePublicSharedFolder(
		$range, $path
	) {
		$this->shouldNotBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
			$range, $path, ""
		);
	}

	/**
	 * @Then /^the public should be able to upload file "([^"]*)" with content "([^"]*)" to the last public shared folder$/
	 *
	 * @param string $path
	 * @param string $content
	 *
	 * @return void
	 */
	public function shouldBeAbleToUploadFileWithContentToTheLastPublicSharedFolder(
		$path, $content
	) {
		$this->publiclyUploadingContent($path, $content);
		$this->featureContext->theHTTPStatusCodeShouldBe(
			"201", "Failed to upload file to public share"
		);
		$this->downloadPublicFileInsideAFolder($path);
		$this->featureContext->downloadedContentShouldBe($content);
	}

	/**
	 * @Then publicly uploading a file should not work
	 *
	 * @return void
	 */
	public function publiclyUploadingShouldNotWork() {
		$this->publicUploadContent('whateverfilefortesting.txt', '', 'test');
		$response = $this->featureContext->getResponse();
		PHPUnit\Framework\Assert::assertTrue(
			($response->getStatusCode() == 507)
			|| (
				($response->getStatusCode() >= 400)
				&& ($response->getStatusCode() <= 499)
				),
			"upload should have failed but passed with code " .
			$response->getStatusCode()
		);
	}

	/**
	 * @Then publicly uploading a file should work
	 *
	 * @return void
	 */
	public function publiclyUploadingShouldWork() {
		$path = 'whateverfilefortesting.txt';
		$content = 'test';
		$this->publicUploadContent($path, '', $content);
		$response = $this->featureContext->getResponse();
		PHPUnit\Framework\Assert::assertTrue(
			($response->getStatusCode() == 201),
			"upload should have passed but failed with code " .
			$response->getStatusCode()
		);
		$this->shouldBeAbleToDownloadFileInsidePublicSharedFolder(
			$path, $content
		);
	}

	/**
	 * Uploads a file through the public WebDAV API and sets the response in FeatureContext
	 *
	 * @param string $filename
	 * @param string $password
	 * @param string $body
	 * @param bool $autorename
	 * @param array $additionalHeaders
	 *
	 * @return void
	 */
	public function publicUploadContent(
		$filename,
		$password = '',
		$body = 'test',
		$autorename = false,
		$additionalHeaders = []
	) {
		$password = $this->featureContext->getActualPassword($password);
		$url = $this->featureContext->getBaseUrl() . "/public.php/webdav/";
		$filename = \implode(
			'/', \array_map('rawurlencode', \explode('/', $filename))
		);
		$url .= \ltrim($filename, '/');
		$token = $this->featureContext->getLastShareToken();
		$headers = ['X-Requested-With' => 'XMLHttpRequest'];
		
		if ($autorename) {
			$headers['OC-Autorename'] = 1;
		}
		$headers = \array_merge($headers, $additionalHeaders);
		$response = HttpRequestHelper::put(
			$url, $token, $password, $headers, $body
		);
		$this->featureContext->setResponse($response);
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
}
