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
use PHPUnit\Framework\Assert;
use TestHelpers\HttpRequestHelper;
use TestHelpers\WebDavHelper;

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
	 *
	 * @var OccContext
	 */
	private $occContext;

	/**
	 * @When /^the public downloads the last public shared file with range "([^"]*)" using the (old|new) public WebDAV API$/
	 *
	 * @param string $range ignore if empty
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 *
	 * @return void
	 */
	public function downloadPublicFileWithRange($range, $publicWebDAVAPIVersion, $password = "") {
		if ($publicWebDAVAPIVersion === "new") {
			$path = $this->featureContext->getLastShareData()->data->file_target;
		} else {
			$path = "";
		}
		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
			$path, $password, $range, $publicWebDAVAPIVersion
		);
	}

	/**
	 * @When /^the public downloads the last public shared file with range "([^"]*)" and password "([^"]*)" using the (old|new) public WebDAV API$/
	 *
	 * @param string $range ignore if empty
	 * @param string $password
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function downloadPublicFileWithRangeAndPassword($range, $password, $publicWebDAVAPIVersion) {
		if ($publicWebDAVAPIVersion === "new") {
			$path = $this->featureContext->getLastShareData()->data->file_target;
		} else {
			$path = "";
		}
		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
			$path, $password, $range, $publicWebDAVAPIVersion
		);
	}

	/**
	 * @When /^the public downloads the last public shared file using the (old|new) public WebDAV API$/
	 *
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function downloadPublicFile($publicWebDAVAPIVersion) {
		$this->downloadPublicFileWithRange("", $publicWebDAVAPIVersion);
	}

	/**
	 * @When /^the public downloads the last public shared file with password "([^"]*)" using the (old|new) public WebDAV API$/
	 *
	 * @param string $password
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function downloadPublicFileWithPassword($password, $publicWebDAVAPIVersion) {
		$this->downloadPublicFileWithRange("", $publicWebDAVAPIVersion, $password);
	}

	/**
	 * @When /^the public deletes (?:file|folder|entry) "([^"]*)" from the last public share using the (old|new) public WebDAV API$/
	 *
	 * @param string $fileName
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 *
	 * @return void
	 */
	public function deleteFileFromPublicShare($fileName, $publicWebDAVAPIVersion, $password = "") {
		$token = (string) $this->featureContext->getLastShareData()->data->token;
		$davPath = WebDavHelper::getDavPath(
			$token, 0, "public-files-$publicWebDAVAPIVersion"
		);
		$fullUrl = $this->featureContext->getBaseUrl() . "/$davPath$fileName";
		$userName = $this->getUsernameForPublicWebdavApi(
			$token, $password, $publicWebDAVAPIVersion
		);
		$headers = [
			'X-Requested-With' => 'XMLHttpRequest'
		];
		$this->featureContext->setResponse(
			HttpRequestHelper::delete($fullUrl, $userName, $password, $headers)
		);
	}

	/**
	 * @When /^the public deletes file "([^"]*)" from the last public share using the password "([^"]*)" and (old|new) public WebDAV API$/
	 *
	 * @param string $file
	 * @param string $password
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function thePublicDeletesFileFromTheLastPublicShareUsingThePasswordPasswordAndOldPublicWebdavApi($file, $password, $publicWebDAVAPIVersion) {
		$this->deleteFileFromPublicShare($file, $publicWebDAVAPIVersion, $password);
	}

	/**
	 * @When /^the public renames (?:file|folder|entry) "([^"]*)" to "([^"]*)" from the last public share using the (old|new) public WebDAV API$/
	 *
	 * @param string $fileName
	 * @param string $toFileName
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 *
	 * @return void
	 */
	public function renameFileFromPublicShare($fileName, $toFileName, $publicWebDAVAPIVersion, $password = "") {
		$token = $this->featureContext->getLastShareData()->data->token;
		$davPath = WebDavHelper::getDavPath(
			$token, 0, "public-files-$publicWebDAVAPIVersion"
		);
		$fullUrl = $this->featureContext->getBaseUrl() . "/$davPath$fileName";
		$destination = $this->featureContext->getBaseUrl() . "/$davPath$toFileName";
		$userName = $this->getUsernameForPublicWebdavApi(
			$token, $password, $publicWebDAVAPIVersion
		);
		$headers = [
			'X-Requested-With' => 'XMLHttpRequest',
			'Destination' => $destination
		];
		$this->featureContext->setResponse(
			HttpRequestHelper::sendRequest($fullUrl, "MOVE", $userName, $password, $headers)
		);
	}

	/**
	 * @When /^the public renames file "([^"]*)" to "([^"]*)" from the last public share using the password "([^"]*)" and (old|new) public WebDAV API$/
	 *
	 * @param string $fileName
	 * @param string $toName
	 * @param string $password
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function thePublicRenamesFileFromTheLastPublicShareUsingThePasswordPasswordAndOldPublicWebdavApi($fileName, $toName, $password, $publicWebDAVAPIVersion) {
		$this->renameFileFromPublicShare($fileName, $toName, $publicWebDAVAPIVersion, $password);
	}

	/**
	 * @When /^the public downloads file "([^"]*)" from inside the last public shared folder using the (old|new) public WebDAV API$/
	 *
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function downloadPublicFileInsideAFolder($path, $publicWebDAVAPIVersion = "old") {
		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
			$path, "", "", $publicWebDAVAPIVersion
		);
	}

	/**
	 * @When /^the public downloads file "([^"]*)" from inside the last public shared folder with password "([^"]*)" using the (old|new) public WebDAV API$/
	 *
	 * @param string $path
	 * @param string $password
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function publicDownloadsTheFileInsideThePublicSharedFolderWithPassword(
		$path, $password = "", $publicWebDAVAPIVersion = "old"
	) {
		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
			$path, $password, "", $publicWebDAVAPIVersion
		);
	}

	/**
	 * @When /^the public downloads file "([^"]*)" from inside the last public shared folder with range "([^"]*)" using the (old|new) public WebDAV API$/
	 *
	 * @param string $path
	 * @param string $range
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function downloadPublicFileInsideAFolderWithRange($path, $range, $publicWebDAVAPIVersion) {
		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
			$path, "", $range, $publicWebDAVAPIVersion
		);
	}

	/**
	 * @When /^the public downloads file "([^"]*)" from inside the last public shared folder with password "([^"]*)" with range "([^"]*)" using the (old|new) public WebDAV API$/
	 *
	 * @param string $path
	 * @param string $password
	 * @param string $range ignored when empty
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
		$path, $password, $range, $publicWebDAVAPIVersion = "old"
	) {
		$path = \ltrim($path, "/");
		$password = $this->featureContext->getActualPassword($password);
		$token = $this->featureContext->getLastShareData()->data->token;
		$davPath = WebDavHelper::getDavPath(
			$token, 0, "public-files-$publicWebDAVAPIVersion"
		);
		$fullUrl = $this->featureContext->getBaseUrl() . "/$davPath$path";
		$userName = $this->getUsernameForPublicWebdavApi(
			$token, $password, $publicWebDAVAPIVersion
		);

		$headers = [
			'X-Requested-With' => 'XMLHttpRequest'
		];
		if ($range !== "") {
			$headers['Range'] = $range;
		}
		$response = HttpRequestHelper::get(
			$fullUrl, $userName, $password, $headers
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @param string $source target file name
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function publiclyUploadingFile($source, $publicWebDAVAPIVersion) {
		$file = \GuzzleHttp\Psr7\stream_for(\fopen($source, 'r'));
		$this->publicUploadContent(
			\basename($source), '', $file->getContents(),
			false, [], $publicWebDAVAPIVersion
		);
	}

	/**
	 * @When the public uploads file :filename using the :publicWebDAVAPIVersion WebDAV API
	 *
	 * @param string $source target file name
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function thePublicUploadsFileUsingTheWebDAVApi($source, $publicWebDAVAPIVersion) {
		$this->publiclyUploadingFile(
			$source,
			$publicWebDAVAPIVersion
		);
	}

	/**
	 *
	 * @param string $baseUrl URL of owncloud
	 *                        e.g. http://localhost:8080
	 *                        should include the subfolder
	 *                        if owncloud runs in a subfolder
	 *                        e.g. http://localhost:8080/owncloud-core
	 * @param string $source
	 * @param string $destination
	 *
	 * @return void
	 */
	public function publiclyCopyingFile(
		$baseUrl,
		$source,
		$destination
	) {
		$fullSourceUrl = $baseUrl . $source;
		$fullDestUrl = WebDavHelper::sanitizeUrl(
			$baseUrl . $destination
		);

		$headers["Destination"] = $fullDestUrl;
		$response = HttpRequestHelper::sendRequest(
			$fullSourceUrl, "COPY", null, null, $headers, null, null, null,
			false, 0, null
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @When /^the public copies (?:file|folder) "([^"]*)" to "([^"]*)" using the (old|new) public WebDAV API$/
	 *
	 * @param string $source
	 * @param string $destination
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function thePublicCopiesFileUsingTheWebDAVApi($source, $destination, $publicWebDAVAPIVersion) {
		$token = $this->featureContext->getLastShareData()->data->token;
		$davPath = WebDavHelper::getDavPath(
			$token, 0, "public-files-$publicWebDAVAPIVersion"
		);
		$baseUrl = $this->featureContext->getLocalBaseUrl() . '/' . $davPath;

		$this->publiclyCopyingFile(
			$baseUrl,
			$source,
			$destination
		);
	}

	/**
	 * @Given the public has uploaded file :filename
	 *
	 * @param string $source target file name
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function thePublicHasUploadedFileUsingTheWebDAVApi($source, $publicWebDAVAPIVersion) {
		$this->publiclyUploadingFile(
			$source,
			$publicWebDAVAPIVersion
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * This only works with the old API, auto-rename is not supported in the new API
	 * auto renaming is handled on files drop folders implicitly
	 *
	 * @param string $filename target file name
	 * @param string $body content to upload
	 *
	 * @return void
	 */
	public function publiclyUploadingContentAutoRename($filename, $body = 'test') {
		$this->publicUploadContent($filename, '', $body, true);
	}

	/**
	 * @When the public uploads file :filename with content :body with auto-rename mode using the old public WebDAV API
	 *
	 * @param string $filename target file name
	 * @param string $body content to upload
	 *
	 * @return void
	 */
	public function thePublicUploadsFileWithContentWithAutoRenameMode($filename, $body = 'test') {
		$this->publiclyUploadingContentAutoRename($filename, $body);
	}

	/**
	 * @Given the public has uploaded file :filename with content :body with auto-rename mode
	 *
	 * @param string $filename target file name
	 * @param string $body content to upload
	 *
	 * @return void
	 */
	public function thePublicHasUploadedFileWithContentWithAutoRenameMode($filename, $body = 'test') {
		$this->publiclyUploadingContentAutoRename($filename, $body);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $filename target file name
	 * @param string $password
	 * @param string $body content to upload
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function publiclyUploadingContentWithPassword(
		$filename, $password = '', $body = 'test', $publicWebDAVAPIVersion = "old"
	) {
		$this->publicUploadContent(
			$filename, $password, $body, false, [], $publicWebDAVAPIVersion
		);
	}

	/**
	 * @When /^the public uploads file "([^"]*)" with password "([^"]*)" and content "([^"]*)" using the (old|new) public WebDAV API$/
	 *
	 * @param string $filename target file name
	 * @param string $password
	 * @param string $body content to upload
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function thePublicUploadsFileWithPasswordAndContentUsingPublicWebDAVApi(
		$filename, $password = '', $body = 'test', $publicWebDAVAPIVersion = "old"
	) {
		$this->publiclyUploadingContentWithPassword(
			$filename,
			$password,
			$body,
			$publicWebDAVAPIVersion
		);
	}

	/**
	 * @Given the public has uploaded file :filename" with password :password and content :body
	 *
	 * @param string $filename target file name
	 * @param string $password
	 * @param string $body content to upload
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function thePublicHasUploadedFileWithPasswordAndContentUsingPublicWebDAVApi(
		$filename, $password = '', $body = 'test', $publicWebDAVAPIVersion = "old"
	) {
		$this->publiclyUploadingContentWithPassword(
			$filename,
			$password,
			$body,
			$publicWebDAVAPIVersion
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $filename target file name
	 * @param string $body content to upload
	 *
	 * @return void
	 */
	public function publiclyOverwritingContent($filename, $body = 'test') {
		$this->publicUploadContent($filename, '', $body, false);
	}

	/**
	 * @When the public overwrites file :filename with content :body using the old WebDAV API
	 *
	 * @param string $filename target file name
	 * @param string $body content to upload
	 *
	 * @return void
	 */
	public function thePublicOverwritesFileWithContentUsingOldWebDavApi($filename, $body = 'test') {
		$this->publiclyOverwritingContent(
			$filename,
			$body
		);
	}

	/**
	 * @Given the public has overwritten file :filename with content :body
	 *
	 * @param string $filename target file name
	 * @param string $body content to upload
	 *
	 * @return void
	 */
	public function thePublicHasOverwrittenFileWithContentUsingOldWebDavApi($filename, $body = 'test') {
		$this->publiclyOverwritingContent(
			$filename,
			$body
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @param string $filename target file name
	 * @param string $body content to upload
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function publiclyUploadingContent(
		$filename, $body = 'test', $publicWebDAVAPIVersion = "old"
	) {
		$this->publicUploadContent(
			$filename, '', $body, false, [], $publicWebDAVAPIVersion
		);
	}

	/**
	 * @When /^the public uploads file "([^"]*)" with content "([^"]*)" using the (old|new) public WebDAV API$/
	 *
	 * @param string $filename target file name
	 * @param string $body content to upload
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function thePublicUploadsFileWithContentUsingThePublicWebDavApi(
		$filename, $body = 'test', $publicWebDAVAPIVersion = "old"
	) {
		$this->publiclyUploadingContent(
			$filename,
			$body,
			$publicWebDAVAPIVersion
		);
	}

	/**
	 * @Given the public has uploaded file :filename with content :body
	 *
	 * @param string $filename target file name
	 * @param string $body content to upload
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function thePublicHasUploadedFileWithContentUsingThePublicWebDavApi(
		$filename, $body = 'test', $publicWebDAVAPIVersion = "old"
	) {
		$this->publiclyUploadingContent(
			$filename,
			$body,
			$publicWebDAVAPIVersion
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @Then /^the public should be able to download the last publicly shared file using the (old|new) public WebDAV API without a password and the content should be "([^"]*)"$/
	 *
	 * @param string $publicWebDAVAPIVersion
	 * @param string $expectedContent
	 *
	 * @return void
	 */
	public function checkLastPublicSharedFileDownload(
		$publicWebDAVAPIVersion, $expectedContent
	) {
		$this->checkLastPublicSharedFileWithPasswordDownload(
			$publicWebDAVAPIVersion, "", $expectedContent
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @Then /^the public should be able to download the last publicly shared file using the (old|new) public WebDAV API with password "([^"]*)" and the content should be "([^"]*)"$/
	 *
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 * @param string $expectedContent
	 *
	 * @return void
	 */
	public function checkLastPublicSharedFileWithPasswordDownload(
		$publicWebDAVAPIVersion, $password, $expectedContent
	) {
		if ($publicWebDAVAPIVersion === "new") {
			$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();
		} else {
			$techPreviewHadToBeEnabled = false;
		}

		$this->downloadPublicFileWithRange(
			"", $publicWebDAVAPIVersion, $password
		);

		$this->featureContext->downloadedContentShouldBe($expectedContent);

		if ($techPreviewHadToBeEnabled) {
			$this->occContext->disableDAVTechPreview();
		}

		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @Then /^the public download of the last publicly shared file using the (old|new) public WebDAV API with password "([^"]*)" should fail with HTTP status code "([^"]*)"$/
	 *
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 * @param string $expectedHttpCode
	 *
	 * @return void
	 */
	public function theLastPublicSharedFileShouldNotBeAbleToBeDownloadedWithPassword(
		$publicWebDAVAPIVersion,
		$password,
		$expectedHttpCode
	) {
		$this->downloadPublicFileWithRange(
			"", $publicWebDAVAPIVersion, $password
		);
		$responseContent = $this->featureContext->getResponse()->getBody()->getContents();
		\libxml_use_internal_errors(true);
		Assert::assertNotFalse(
			\simplexml_load_string($responseContent),
			"response body is not valid XML, maybe download did work\n" .
			"response body: \n$responseContent\n"
		);
		$this->featureContext->theHTTPStatusCodeShouldBe($expectedHttpCode);
	}

	/**
	 * @Then /^the public download of the last publicly shared file using the (old|new) public WebDAV API without a password should fail with HTTP status code "([^"]*)"$/
	 *
	 * @param string $publicWebDAVAPIVersion
	 * @param string $expectedHttpCode
	 *
	 * @return void
	 */
	public function theLastPublicSharedFileShouldNotBeAbleToBeDownloadedWithoutAPassword(
		$publicWebDAVAPIVersion,
		$expectedHttpCode
	) {
		$this->theLastPublicSharedFileShouldNotBeAbleToBeDownloadedWithPassword(
			$publicWebDAVAPIVersion, "", $expectedHttpCode
		);
	}

	/**
	 * @Then /^the public should be able to download file "([^"]*)" from inside the last public shared folder using the (old|new) public WebDAV API$/
	 *
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function shouldBeAbleToDownloadFileInsidePublicSharedFolder(
		$path, $publicWebDAVAPIVersion
	) {
		$this->shouldBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
			"", $path, $publicWebDAVAPIVersion, ""
		);
	}

	/**
	 * @Then /^the public should not be able to download file "([^"]*)" from inside the last public shared folder using the (old|new) public WebDAV API without a password$/
	 * @Then /^the public download of file "([^"]*)" from inside the last public shared folder using the (old|new) public WebDAV API should fail with HTTP status code "([^"]*)"$/
	 *
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 * @param string $expectedHttpCode
	 *
	 * @return void
	 */
	public function shouldNotBeAbleToDownloadFileInsidePublicSharedFolder(
		$path, $publicWebDAVAPIVersion, $expectedHttpCode = "401"
	) {
		$this->shouldNotBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
			"", $path, $publicWebDAVAPIVersion, "", $expectedHttpCode
		);
	}

	/**
	 * @Then /^the public should be able to download file "([^"]*)" from inside the last public shared folder using the (old|new) public WebDAV API with password "([^"]*)"$/
	 *
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 *
	 * @return void
	 */
	public function shouldBeAbleToDownloadFileInsidePublicSharedFolderWithPassword(
		$path, $publicWebDAVAPIVersion, $password
	) {
		$this->shouldBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
			"", $path, $publicWebDAVAPIVersion, $password
		);
	}

	/**
	 * @Then /^the public should be able to download file "([^"]*)" from inside the last public shared folder using the (old|new) public WebDAV API with password "([^"]*)" and the content should be "([^"]*)" plus end-of-line$/
	 *
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 * @param string $content
	 *
	 * @return void
	 */
	public function shouldBeAbleToDownloadFileInsidePublicSharedFolderWithPasswordAndEOL(
		$path, $publicWebDAVAPIVersion, $password, $content
	) {
		if ($publicWebDAVAPIVersion === "new") {
			$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();
		} else {
			$techPreviewHadToBeEnabled = false;
		}

		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPassword(
			$path, $password, $publicWebDAVAPIVersion
		);

		$this->featureContext->downloadedContentShouldBePlusEndOfLine($content);

		if ($techPreviewHadToBeEnabled) {
			$this->occContext->disableDAVTechPreview();
		}
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @Then /^the public should not be able to download file "([^"]*)" from inside the last public shared folder using the (old|new) public WebDAV API with password "([^"]*)"$/
	 * @Then /^the public download of file "([^"]*)" from inside the last public shared folder using the (old|new) public WebDAV API with password "([^"]*)" should fail with HTTP status code "([^"]*)"$/
	 *
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 * @param string $expectedHttpCode
	 *
	 * @return void
	 */
	public function shouldNotBeAbleToDownloadFileInsidePublicSharedFolderWithPassword(
		$path, $publicWebDAVAPIVersion, $password, $expectedHttpCode = "401"
	) {
		$this->shouldNotBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
			"", $path, $publicWebDAVAPIVersion, $password, $expectedHttpCode
		);
	}

	/**
	 * @Then /^the public should be able to download the range "([^"]*)" of file "([^"]*)" from inside the last public shared folder using the (old|new) public WebDAV API with password "([^"]*)""$/
	 *
	 * @param string $range
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 *
	 * @return void
	 */
	public function shouldBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
		$range, $path, $publicWebDAVAPIVersion, $password
	) {
		if ($publicWebDAVAPIVersion === "new") {
			$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();
		} else {
			$techPreviewHadToBeEnabled = false;
		}

		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
			$path, $password, $range, $publicWebDAVAPIVersion
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @Then /^the public should not be able to download the range "([^"]*)" of file "([^"]*)" from inside the last public shared folder using the (old|new) public WebDAV API with password "([^"]*)"$/
	 *
	 * @param string $range
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 * @param string $expectedHttpCode
	 *
	 * @return void
	 */
	public function shouldNotBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
		$range, $path, $publicWebDAVAPIVersion, $password, $expectedHttpCode = "401"
	) {
		if ($publicWebDAVAPIVersion === "new") {
			$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();
		} else {
			$techPreviewHadToBeEnabled = false;
		}

		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
			$path, $password, $range, $publicWebDAVAPIVersion
		);

		$responseContent = $this->featureContext->getResponse()->getBody()->getContents();
		\libxml_use_internal_errors(true);
		Assert::assertNotFalse(
			\simplexml_load_string($responseContent),
			"response body is not valid XML, maybe download did work\n" .
			"response body: \n$responseContent\n"
		);
		$this->featureContext->theHTTPStatusCodeShouldBe($expectedHttpCode);

		if ($techPreviewHadToBeEnabled) {
			$this->occContext->disableDAVTechPreview();
		}
	}

	/**
	 * @Then /^the public should be able to download the range "([^"]*)" of file "([^"]*)" from inside the last public shared folder using the (old|new) public WebDAV API and the content should be "([^"]*)"$/
	 *
	 * @param string $range
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 * @param string $content
	 *
	 * @return void
	 */
	public function shouldBeAbleToDownloadRangeOfFileInsidePublicSharedFolder(
		$range, $path, $publicWebDAVAPIVersion, $content
	) {
		$this->shouldBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
			$range, $path, $publicWebDAVAPIVersion, "", $content
		);
	}

	/**
	 * @Then /^the public should not be able to download the range "([^"]*)" of file "([^"]*)" from inside the last public shared folder using the (old|new) public WebDAV API without a password$/
	 *
	 * @param string $range
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function shouldNotBeAbleToDownloadRangeOfFileInsidePublicSharedFolder(
		$range, $path, $publicWebDAVAPIVersion
	) {
		$this->shouldNotBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
			$range, $path, $publicWebDAVAPIVersion, ""
		);
	}

	/**
	 * @Then /^the public upload to the last publicly shared file using the (old|new) public WebDAV API should fail with HTTP status code "([^"]*)"$/
	 *
	 * @param string $publicWebDAVAPIVersion
	 * @param string $expectedHttpCode
	 *
	 * @return void
	 */
	public function publiclyUploadingShouldToSharedFileShouldFail(
		$publicWebDAVAPIVersion, $expectedHttpCode
	) {
		$filename = "";

		if ($publicWebDAVAPIVersion === "new") {
			$filename = $this->featureContext->getLastShareData()->data[0]->file_target;
			$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();
		} else {
			$techPreviewHadToBeEnabled = false;
		}

		$this->publicUploadContent(
			$filename, '', 'test', false,
			[], $publicWebDAVAPIVersion
		);

		$this->featureContext->theHTTPStatusCodeShouldBe($expectedHttpCode);

		if ($techPreviewHadToBeEnabled) {
			$this->occContext->disableDAVTechPreview();
		}
	}

	/**
	 * @Then /^uploading a file should not work using the (old|new) public WebDAV API$/
	 * @Then /^the public upload to the last publicly shared folder using the (old|new) public WebDAV API should fail with HTTP status code "([^"]*)"$/
	 *
	 * @param string $publicWebDAVAPIVersion
	 * @param string $expectedHttpCode
	 *
	 * @return void
	 */
	public function publiclyUploadingShouldNotWork(
		$publicWebDAVAPIVersion, $expectedHttpCode = null
	) {
		if ($publicWebDAVAPIVersion === "new") {
			$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();
		} else {
			$techPreviewHadToBeEnabled = false;
		}

		$this->publicUploadContent(
			'whateverfilefortesting.txt', '', 'test', false,
			[], $publicWebDAVAPIVersion
		);

		if ($techPreviewHadToBeEnabled) {
			$this->occContext->disableDAVTechPreview();
		}

		$response = $this->featureContext->getResponse();
		if ($expectedHttpCode === null) {
			$expectedHttpCode = [507, 400, 401, 403, 404, 423];
		}
		$this->featureContext->theHTTPStatusCodeShouldBe(
			$expectedHttpCode,
			"upload should have failed but passed with code " .
			$response->getStatusCode()
		);
	}

	/**
	 * @Then /^the public should be able to upload file "([^"]*)" into the last public shared folder using the (old|new) public WebDAV API with password "([^"]*)"$/
	 *
	 * @param string $filename
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 *
	 * @return void
	 */
	public function publiclyUploadingIntoFolderWithPasswordShouldWork(
		string $filename, string $publicWebDAVAPIVersion, string $password
	) {
		$this->publicUploadContent(
			$filename, $password, 'test', false, [], $publicWebDAVAPIVersion
		);

		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @Then /^the public upload of file "([^"]*)" into the last public shared folder using the (old|new) public WebDAV API with password "([^"]*)" should fail with HTTP status code "([^"]*)"$/
	 *
	 * @param string $filename
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 * @param string $expectedHttpCode
	 *
	 * @return void
	 */
	public function publiclyUploadingIntoFolderWithPasswordShouldFail(
		string $filename, string $publicWebDAVAPIVersion, string $password, $expectedHttpCode
	) {
		$this->publicUploadContent(
			$filename, $password, 'test', false, [], $publicWebDAVAPIVersion
		);

		$response = $this->featureContext->getResponse();
		$this->featureContext->theHTTPStatusCodeShouldBe(
			$expectedHttpCode,
			"upload of $filename into the last publicly shared folder should have failed with code " .
			$expectedHttpCode . " but the code was " . $response->getStatusCode()
		);
	}

	/**
	 * @Then /^uploading a file should work using the (old|new) public WebDAV API$/
	 *
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function publiclyUploadingShouldWork($publicWebDAVAPIVersion) {
		$path = "whateverfilefortesting-$publicWebDAVAPIVersion-publicWebDAVAPI.txt";
		$content = "test $publicWebDAVAPIVersion";

		if ($publicWebDAVAPIVersion === "new") {
			$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();
		} else {
			$techPreviewHadToBeEnabled = false;
		}

		$this->publicUploadContent(
			$path, '', $content, false, [], $publicWebDAVAPIVersion
		);
		$response = $this->featureContext->getResponse();
		Assert::assertTrue(
			($response->getStatusCode() == 201),
			"upload should have passed but failed with code " .
			$response->getStatusCode()
		);
		$this->shouldBeAbleToDownloadFileInsidePublicSharedFolder(
			$path, $publicWebDAVAPIVersion, $content
		);

		if ($techPreviewHadToBeEnabled) {
			$this->occContext->disableDAVTechPreview();
		}
	}

	/**
	 * @When the public uploads file :fileName to the last shared folder with mtime :mtime using the :davVersion public WebDAV API
	 *
	 * @param String $fileName
	 * @param String $mtime
	 * @param String $davVersion
	 *
	 * @return void
	 */
	public function thePublicUploadsFileToLastSharedFolderWithMtimeUsingTheWebdavApi(
		$fileName,
		$mtime,
		$davVersion="old"
	) {
		$mtime = new DateTime($mtime);
		$mtime = $mtime->format('U');

		$this->publicUploadContent(
			$fileName,
			'',
			'test',
			false,
			["X-OC-Mtime" => $mtime],
			$davVersion
		);
	}

	/**
	 * @param string $destination
	 * @param string $password
	 *
	 * @return void
	 */
	public function publicCreatesFolderUsingPassword(
		$destination, $password
	) {
		$token = $this->featureContext->getLastShareToken();
		$davPath = WebDavHelper::getDavPath(
			$token, 0, "public-files-new"
		);
		$url = $this->featureContext->getBaseUrl() . "/$davPath";
		$password = $this->featureContext->getActualPassword($password);
		$userName = $this->getUsernameForPublicWebdavApi(
			$token, $password, "new"
		);
		$foldername = \implode(
			'/', \array_map('rawurlencode', \explode('/', $destination))
		);
		$url .= \ltrim($foldername, '/');

		$this->featureContext->setResponse(
			HttpRequestHelper::sendRequest(
				$url, 'MKCOL', $userName, $password
			)
		);
	}

	/**
	 * @When the public creates folder :destination using the new public WebDAV API
	 *
	 * @param String $destination
	 *
	 * @return void
	 */
	public function publicCreatesFolder($destination) {
		$this->publicCreatesFolderUsingPassword($destination, '');
	}

	/**
	 * @Then /^the public should be able to create folder "([^"]*)" in the last public shared folder using the new public WebDAV API with password "([^"]*)"$/
	 *
	 * @param string $foldername
	 * @param string $password
	 *
	 * @return void
	 */
	public function publicShouldBeAbleToCreateFolderWithPassword(
		string $foldername, string $password
	) {
		$this->publicCreatesFolderUsingPassword($foldername, $password);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @Then /^the public creation of folder "([^"]*)" in the last public shared folder using the new public WebDAV API with password "([^"]*)" should fail with HTTP status code "([^"]*)"$/
	 *
	 * @param string $foldername
	 * @param string $password
	 * @param string $expectedHttpCode
	 *
	 * @return void
	 */
	public function publicCreationOfFolderWithPasswordShouldFail(
		string $foldername, string $password, $expectedHttpCode
	) {
		$this->publicCreatesFolderUsingPassword($foldername, $password);
		$this->featureContext->theHTTPStatusCodeShouldBe(
			$expectedHttpCode,
			"creation of $foldername in the last publicly shared folder should have failed with code " .
			$expectedHttpCode
		);
	}

	/**
	 * @Then the mtime of file :fileName in the last shared public link using the WebDAV API should be :mtime
	 *
	 * @param string $fileName
	 * @param string $mtime
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theMtimeOfFileInTheLastSharedPublicLinkUsingTheWebdavApiShouldBe(
		$fileName,
		$mtime
	) {
		$tokenArray = $this->featureContext->getLastShareData()->data->token;
		$token = (string)$tokenArray[0];
		$baseUrl = $this->featureContext->getBaseUrl();
		if (\TestHelpers\OcisHelper::isTestingOnOcisOrReva()) {
			$mtime = \explode(" ", $mtime);
			\array_pop($mtime);
			$mtime = \implode(" ", $mtime);
			Assert::assertStringContainsString(
				$mtime,
				\TestHelpers\WebDavHelper::getMtimeOfFileinPublicLinkShare($baseUrl, $fileName, $token)
			);
		} else {
			Assert::assertEquals(
				$mtime,
				\TestHelpers\WebDavHelper::getMtimeOfFileinPublicLinkShare($baseUrl, $fileName, $token)
			);
		}
	}

	/**
	 * @Then the mtime of file :fileName in the last shared public link using the WebDAV API should not be :mtime
	 *
	 * @param string $fileName
	 * @param string $mtime
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theMtimeOfFileInTheLastSharedPublicLinkUsingTheWebdavApiShouldNotBe(
		$fileName,
		$mtime
	) {
		$tokenArray = $this->featureContext->getLastShareData()->data->token;
		$token = (string)$tokenArray[0];
		$baseUrl = $this->featureContext->getBaseUrl();
		Assert::assertNotEquals(
			$mtime,
			\TestHelpers\WebDavHelper::getMtimeOfFileinPublicLinkShare($baseUrl, $fileName, $token)
		);
	}

	/**
	 * Uploads a file through the public WebDAV API and sets the response in FeatureContext
	 *
	 * @param string $filename
	 * @param string $password
	 * @param string $body
	 * @param bool $autoRename
	 * @param array $additionalHeaders
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function publicUploadContent(
		$filename,
		$password = '',
		$body = 'test',
		$autoRename = false,
		$additionalHeaders = [],
		$publicWebDAVAPIVersion = "old"
	) {
		$password = $this->featureContext->getActualPassword($password);
		$token = $this->featureContext->getLastShareToken();
		$davPath = WebDavHelper::getDavPath(
			$token, 0, "public-files-$publicWebDAVAPIVersion"
		);
		$url = $this->featureContext->getBaseUrl() . "/$davPath";
		$userName = $this->getUsernameForPublicWebdavApi(
			$token, $password, $publicWebDAVAPIVersion
		);

		$filename = \implode(
			'/', \array_map('rawurlencode', \explode('/', $filename))
		);
		$url .= \ltrim($filename, '/');
		$headers = ['X-Requested-With' => 'XMLHttpRequest'];

		if ($autoRename) {
			$headers['OC-Autorename'] = 1;
		}
		$headers = \array_merge($headers, $additionalHeaders);
		$response = HttpRequestHelper::put(
			$url, $userName, $password, $headers, $body
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @param string $token
	 * @param string $password
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return string|null
	 */
	private function getUsernameForPublicWebdavApi(
		$token, $password, $publicWebDAVAPIVersion
	) {
		if ($publicWebDAVAPIVersion === "old") {
			$userName = $token;
		} else {
			if ($password !== '') {
				$userName = 'public';
			} else {
				$userName = null;
			}
		}
		return $userName;
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
		$this->occContext = $environment->getContext('OccContext');
	}
}
