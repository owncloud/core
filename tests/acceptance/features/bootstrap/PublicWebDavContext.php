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
	 * @When /^the public downloads file "([^"]*)" from inside the last public shared folder with range "([^"]*)" using the public WebDAV API$/
	 *
	 * @param string $path
	 * @param string $range
	 *
	 * @return void
	 */
	public function downloadPublicFileInsideAFolderWithRange($path, $range) {
		$path = \ltrim($path, "/");
		$fullUrl = $this->featureContext->getBaseUrl() . "/public.php/webdav/$path";
		$headers = [
			'X-Requested-With' => 'XMLHttpRequest',
			'Range' => $range
		];
		$response = HttpRequestHelper::get(
			$fullUrl, $this->featureContext->getLastShareData()->data->token,
			"", $headers
		);
		$this->featureContext->setResponse($response);
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
		$password = $this->featureContext->getActualPassword($password);
		$fullUrl = $this->featureContext->getBaseUrl() . "/public.php/webdav/$path";
		$headers = [
			'X-Requested-With' => 'XMLHttpRequest',
			'Range' => $range
		];
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
		$this->featureContext->downloadedContentShouldBe($content);
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
		PHPUnit_Framework_Assert::assertTrue(
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
		PHPUnit_Framework_Assert::assertTrue(
			($response->getStatusCode() == 201),
			"upload should have passed but failed with code " .
			$response->getStatusCode()
		);
		$this->shouldBeAbleToDownloadFileInsidePublicSharedFolder(
			"bytes=0-3", $path, $content
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
