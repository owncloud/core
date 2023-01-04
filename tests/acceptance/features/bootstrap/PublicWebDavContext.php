<?php declare(strict_types=1);
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
use TestHelpers\OcisHelper;
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
	 * @When /^the public downloads the last public link shared file with range "([^"]*)" using the (old|new) public WebDAV API$/
	 *
	 * @param string $range ignore if empty
	 * @param string $publicWebDAVAPIVersion
	 * @param string|null $password
	 *
	 * @return void
	 */
	public function downloadPublicFileWithRange(string $range, string $publicWebDAVAPIVersion, ?string $password = ""):void {
		if ($publicWebDAVAPIVersion === "new") {
			// In this case a single file has been shared as a public link.
			// Even if that file is somewhere down inside a folder(s), when
			// accessing it as a public link using the "new" public webDAV API
			// the client needs to provide the public link share token followed
			// by just the name of the file - not the full path.
			$fullPath = $this->featureContext->getLastPublicSharePath();
			$fullPathParts = \explode("/", $fullPath);
			$path = \end($fullPathParts);
		} else {
			$path = "";
		}
		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
			$path,
			$password,
			$range,
			$publicWebDAVAPIVersion
		);
	}

	/**
	 * @When /^the public downloads the last public link shared file with range "([^"]*)" and password "([^"]*)" using the (old|new) public WebDAV API$/
	 *
	 * @param string $range ignore if empty
	 * @param string $password
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function downloadPublicFileWithRangeAndPassword(string $range, string $password, string $publicWebDAVAPIVersion):void {
		if ($publicWebDAVAPIVersion === "new") {
			$path = $this->featureContext->getLastPublicShareData()->data->file_target;
		} else {
			$path = "";
		}
		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
			$path,
			$password,
			$range,
			$publicWebDAVAPIVersion
		);
	}

	/**
	 * @When /^the public downloads the last public link shared file using the (old|new) public WebDAV API$/
	 *
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function downloadPublicFile(string $publicWebDAVAPIVersion):void {
		$this->downloadPublicFileWithRange("", $publicWebDAVAPIVersion);
	}

	/**
	 * @When /^the public downloads the last public link shared file with password "([^"]*)" using the (old|new) public WebDAV API$/
	 *
	 * @param string $password
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function downloadPublicFileWithPassword(string $password, string $publicWebDAVAPIVersion):void {
		$this->downloadPublicFileWithRange("", $publicWebDAVAPIVersion, $password);
	}

	/**
	 * @When /^the public deletes (?:file|folder|entry) "([^"]*)" from the last public link share using the (old|new) public WebDAV API$/
	 *
	 * @param string $fileName
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 *
	 * @return void
	 */
	public function deleteFileFromPublicShare(string $fileName, string $publicWebDAVAPIVersion, string $password = ""):void {
		if (OcisHelper::isTestingOnOcisOrReva() && $publicWebDAVAPIVersion === "old") {
			return;
		}
		$token = $this->featureContext->getLastPublicShareToken();
		$davPath = WebDavHelper::getDavPath(
			$token,
			0,
			"public-files-$publicWebDAVAPIVersion"
		);
		$fullUrl = $this->featureContext->getBaseUrl() . "/$davPath$fileName";
		$userName = $this->getUsernameForPublicWebdavApi(
			$token,
			$password,
			$publicWebDAVAPIVersion
		);
		$headers = [
			'X-Requested-With' => 'XMLHttpRequest'
		];
		$this->featureContext->setResponse(
			HttpRequestHelper::delete(
				$fullUrl,
				$this->featureContext->getStepLineRef(),
				$userName,
				$password,
				$headers
			)
		);
		$this->featureContext->pushToLastStatusCodesArrays();
	}

	/**
	 * @When /^the public deletes file "([^"]*)" from the last public link share using the password "([^"]*)" and (old|new) public WebDAV API$/
	 *
	 * @param string $file
	 * @param string $password
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function thePublicDeletesFileFromTheLastPublicShareUsingThePasswordPasswordAndOldPublicWebdavApi(string $file, string $password, string $publicWebDAVAPIVersion):void {
		$this->deleteFileFromPublicShare($file, $publicWebDAVAPIVersion, $password);
	}

	/**
	 * @When /^the public renames (?:file|folder|entry) "([^"]*)" to "([^"]*)" from the last public link share using the (old|new) public WebDAV API$/
	 *
	 * @param string $fileName
	 * @param string $toFileName
	 * @param string $publicWebDAVAPIVersion
	 * @param string|null $password
	 *
	 * @return void
	 */
	public function renameFileFromPublicShare(string $fileName, string $toFileName, string $publicWebDAVAPIVersion, ?string $password = ""):void {
		if (OcisHelper::isTestingOnOcisOrReva() && $publicWebDAVAPIVersion === "old") {
			return;
		}
		$token = $this->featureContext->getLastPublicShareToken();
		$davPath = WebDavHelper::getDavPath(
			$token,
			0,
			"public-files-$publicWebDAVAPIVersion"
		);
		$fullUrl = $this->featureContext->getBaseUrl() . "/$davPath$fileName";
		$destination = $this->featureContext->getBaseUrl() . "/$davPath$toFileName";
		$userName = $this->getUsernameForPublicWebdavApi(
			$token,
			$password,
			$publicWebDAVAPIVersion
		);
		$headers = [
			'X-Requested-With' => 'XMLHttpRequest',
			'Destination' => $destination
		];
		$this->featureContext->setResponse(
			HttpRequestHelper::sendRequest(
				$fullUrl,
				$this->featureContext->getStepLineRef(),
				"MOVE",
				$userName,
				$password,
				$headers
			)
		);
	}

	/**
	 * @When /^the public renames file "([^"]*)" to "([^"]*)" from the last public link share using the password "([^"]*)" and (old|new) public WebDAV API$/
	 *
	 * @param string $fileName
	 * @param string $toName
	 * @param string $password
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function thePublicRenamesFileFromTheLastPublicShareUsingThePasswordPasswordAndOldPublicWebdavApi(string $fileName, string $toName, string $password, string $publicWebDAVAPIVersion):void {
		$this->renameFileFromPublicShare($fileName, $toName, $publicWebDAVAPIVersion, $password);
	}

	/**
	 * @When /^the public downloads file "([^"]*)" from inside the last public link shared folder using the (old|new) public WebDAV API$/
	 *
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function downloadPublicFileInsideAFolder(string $path, string $publicWebDAVAPIVersion = "old"):void {
		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
			$path,
			"",
			"",
			$publicWebDAVAPIVersion
		);
	}

	/**
	 * @When /^the public downloads file "([^"]*)" from inside the last public link shared folder with password "([^"]*)" using the (old|new) public WebDAV API$/
	 *
	 * @param string $path
	 * @param string|null $password
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function publicDownloadsTheFileInsideThePublicSharedFolderWithPassword(
		string $path,
		?string $password = "",
		string $publicWebDAVAPIVersion = "old"
	):void {
		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
			$path,
			$password,
			"",
			$publicWebDAVAPIVersion
		);
	}

	/**
	 * @When /^the public downloads file "([^"]*)" from inside the last public link shared folder with range "([^"]*)" using the (old|new) public WebDAV API$/
	 *
	 * @param string $path
	 * @param string $range
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function downloadPublicFileInsideAFolderWithRange(string $path, string $range, string  $publicWebDAVAPIVersion):void {
		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
			$path,
			"",
			$range,
			$publicWebDAVAPIVersion
		);
	}

	/**
	 * @When /^the public downloads file "([^"]*)" from inside the last public link shared folder with password "([^"]*)" with range "([^"]*)" using the (old|new) public WebDAV API$/
	 *
	 * @param string $path
	 * @param string $password
	 * @param string $range ignored when empty
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
		string $path,
		string $password,
		string $range,
		string $publicWebDAVAPIVersion = "old"
	):void {
		$path = \ltrim($path, "/");
		$password = $this->featureContext->getActualPassword($password);
		$token = $this->featureContext->getLastPublicShareToken();
		$davPath = WebDavHelper::getDavPath(
			$token,
			0,
			"public-files-$publicWebDAVAPIVersion"
		);
		$fullUrl = $this->featureContext->getBaseUrl() . "/$davPath$path";
		$userName = $this->getUsernameForPublicWebdavApi(
			$token,
			$password,
			$publicWebDAVAPIVersion
		);

		$headers = [
			'X-Requested-With' => 'XMLHttpRequest'
		];
		if ($range !== "") {
			$headers['Range'] = $range;
		}
		$response = HttpRequestHelper::get(
			$fullUrl,
			$this->featureContext->getStepLineRef(),
			$userName,
			$password,
			$headers
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @param string $source target file name
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function publiclyUploadingFile(string $source, string $publicWebDAVAPIVersion):void {
		$this->publicUploadContent(
			\basename($source),
			'',
			\file_get_contents($source),
			false,
			[],
			$publicWebDAVAPIVersion
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
	public function thePublicUploadsFileUsingTheWebDAVApi(string $source, string $publicWebDAVAPIVersion):void {
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
		string $baseUrl,
		string $source,
		string $destination
	):void {
		$fullSourceUrl = $baseUrl . $source;
		$fullDestUrl = WebDavHelper::sanitizeUrl(
			$baseUrl . $destination
		);

		$headers["Destination"] = $fullDestUrl;
		$response = HttpRequestHelper::sendRequest(
			$fullSourceUrl,
			$this->featureContext->getStepLineRef(),
			"COPY",
			null,
			null,
			$headers,
			null,
			null,
			null,
			false,
			0,
			null
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
	public function thePublicCopiesFileUsingTheWebDAVApi(string $source, string $destination, string $publicWebDAVAPIVersion):void {
		$token = $this->featureContext->getLastPublicShareToken();
		$davPath = WebDavHelper::getDavPath(
			$token,
			0,
			"public-files-$publicWebDAVAPIVersion"
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
	public function thePublicHasUploadedFileUsingTheWebDAVApi(string $source, string $publicWebDAVAPIVersion):void {
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
	public function publiclyUploadingContentAutoRename(string $filename, string $body = 'test'):void {
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
	public function thePublicUploadsFileWithContentWithAutoRenameMode(string $filename, string $body = 'test'):void {
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
	public function thePublicHasUploadedFileWithContentWithAutoRenameMode(string $filename, string $body = 'test'):void {
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
		string $filename,
		string $password = '',
		string $body = 'test',
		string $publicWebDAVAPIVersion = "old"
	):void {
		$this->publicUploadContent(
			$filename,
			$password,
			$body,
			false,
			[],
			$publicWebDAVAPIVersion
		);
	}

	/**
	 * @When /^the public uploads file "([^"]*)" with password "([^"]*)" and content "([^"]*)" using the (old|new) public WebDAV API$/
	 *
	 * @param string $filename target file name
	 * @param string|null $password
	 * @param string $body content to upload
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function thePublicUploadsFileWithPasswordAndContentUsingPublicWebDAVApi(
		string $filename,
		?string $password = '',
		string $body = 'test',
		string $publicWebDAVAPIVersion = "old"
	):void {
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
	 * @param string|null $password
	 * @param string $body content to upload
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function thePublicHasUploadedFileWithPasswordAndContentUsingPublicWebDAVApi(
		string $filename,
		?string $password = '',
		string $body = 'test',
		string $publicWebDAVAPIVersion = "old"
	):void {
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
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function publiclyOverwritingContent(string $filename, string $body = 'test', string $publicWebDAVAPIVersion = 'old'):void {
		$this->publicUploadContent($filename, '', $body, false, [], $publicWebDAVAPIVersion);
	}

	/**
	 * @When the public overwrites file :filename with content :body using the :type WebDAV API
	 *
	 * @param string $filename target file name
	 * @param string $body content to upload
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function thePublicOverwritesFileWithContentUsingWebDavApi(string $filename, string $body = 'test', string $publicWebDAVAPIVersion = 'old'):void {
		$this->publiclyOverwritingContent(
			$filename,
			$body,
			$publicWebDAVAPIVersion
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
	public function thePublicHasOverwrittenFileWithContentUsingOldWebDavApi(string $filename, string $body = 'test'):void {
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
		string $filename,
		string $body = 'test',
		string $publicWebDAVAPIVersion = "old"
	):void {
		$this->publicUploadContent(
			$filename,
			'',
			$body,
			false,
			[],
			$publicWebDAVAPIVersion
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
		string $filename,
		string $body = 'test',
		string $publicWebDAVAPIVersion = "old"
	):void {
		$this->publiclyUploadingContent(
			$filename,
			$body,
			$publicWebDAVAPIVersion
		);
		$this->featureContext->pushToLastStatusCodesArrays();
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
		string $filename,
		string $body = 'test',
		string $publicWebDAVAPIVersion = "old"
	):void {
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
	 * @throws Exception
	 */
	public function checkLastPublicSharedFileDownload(
		string $publicWebDAVAPIVersion,
		string $expectedContent
	):void {
		$this->checkLastPublicSharedFileWithPasswordDownload(
			$publicWebDAVAPIVersion,
			"",
			$expectedContent
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @Then /^the public should be able to download the last publicly shared file using the (old|new) public WebDAV API without a password and the content should be "([^"]*)" plus end-of-line$/
	 *
	 * @param string $publicWebDAVAPIVersion
	 * @param string $expectedContent
	 *
	 * @return void
	 * @throws Exception
	 */
	public function checkLastPublicSharedFileDownloadPlusEndOfLine(
		string $publicWebDAVAPIVersion,
		string $expectedContent
	):void {
		$this->checkLastPublicSharedFileWithPasswordDownload(
			$publicWebDAVAPIVersion,
			"",
			"$expectedContent\n"
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
	 * @throws Exception
	 */
	public function checkLastPublicSharedFileWithPasswordDownload(
		string $publicWebDAVAPIVersion,
		string $password,
		string $expectedContent
	):void {
		if (OcisHelper::isTestingOnOcisOrReva() && $publicWebDAVAPIVersion === "old") {
			return;
		} elseif ($publicWebDAVAPIVersion === "new") {
			$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();
		} else {
			$techPreviewHadToBeEnabled = false;
		}

		$this->downloadPublicFileWithRange(
			"",
			$publicWebDAVAPIVersion,
			$password
		);

		$this->featureContext->checkDownloadedContentMatches(
			$expectedContent,
			"Checking the content of the last public shared file after downloading with the $publicWebDAVAPIVersion public WebDAV API"
		);

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
		string $publicWebDAVAPIVersion,
		string $password,
		string $expectedHttpCode
	):void {
		$this->downloadPublicFileWithRange(
			"",
			$publicWebDAVAPIVersion,
			$password
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
		string $publicWebDAVAPIVersion,
		string $expectedHttpCode
	):void {
		$this->theLastPublicSharedFileShouldNotBeAbleToBeDownloadedWithPassword(
			$publicWebDAVAPIVersion,
			"",
			$expectedHttpCode
		);
	}

	/**
	 * @Then /^the public should be able to download file "([^"]*)" from inside the last public link shared folder using the (old|new) public WebDAV API$/
	 *
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function shouldBeAbleToDownloadFileInsidePublicSharedFolder(
		string $path,
		string $publicWebDAVAPIVersion
	):void {
		$this->shouldBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
			"",
			$path,
			$publicWebDAVAPIVersion,
			""
		);
	}

	/**
	 * @Then /^the public should not be able to download file "([^"]*)" from inside the last public link shared folder using the (old|new) public WebDAV API without a password$/
	 * @Then /^the public download of file "([^"]*)" from inside the last public link shared folder using the (old|new) public WebDAV API should fail with HTTP status code "([^"]*)"$/
	 *
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 * @param string $expectedHttpCode
	 *
	 * @return void
	 */
	public function shouldNotBeAbleToDownloadFileInsidePublicSharedFolder(
		string $path,
		string $publicWebDAVAPIVersion,
		string $expectedHttpCode = "401"
	):void {
		$this->shouldNotBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
			"",
			$path,
			$publicWebDAVAPIVersion,
			"",
			$expectedHttpCode
		);
	}

	/**
	 * @Then /^the public should be able to download file "([^"]*)" from inside the last public link shared folder using the (old|new) public WebDAV API with password "([^"]*)"$/
	 *
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 *
	 * @return void
	 */
	public function shouldBeAbleToDownloadFileInsidePublicSharedFolderWithPassword(
		string $path,
		string $publicWebDAVAPIVersion,
		string $password
	):void {
		$this->shouldBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
			"",
			$path,
			$publicWebDAVAPIVersion,
			$password
		);
	}

	/**
	 * @Then /^the public should be able to download file "([^"]*)" from inside the last public link shared folder using the (old|new) public WebDAV API with password "([^"]*)" and the content should be "([^"]*)" plus end-of-line$/
	 *
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 * @param string $content
	 *
	 * @return void
	 * @throws Exception
	 */
	public function shouldBeAbleToDownloadFileInsidePublicSharedFolderWithPasswordAndEOL(
		string $path,
		string $publicWebDAVAPIVersion,
		string $password,
		string $content
	):void {
		if (OcisHelper::isTestingOnOcisOrReva() && $publicWebDAVAPIVersion === "old") {
			return;
		} elseif ($publicWebDAVAPIVersion === "new") {
			$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();
		} else {
			$techPreviewHadToBeEnabled = false;
		}

		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPassword(
			$path,
			$password,
			$publicWebDAVAPIVersion
		);

		$this->featureContext->downloadedContentShouldBePlusEndOfLine($content);

		if ($techPreviewHadToBeEnabled) {
			$this->occContext->disableDAVTechPreview();
		}
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @Then /^the public should be able to download file "([^"]*)" from inside the last public link shared folder using the (old|new) public WebDAV API with password "([^"]*)" and the content should be "([^"]*)"$/
	 *
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 * @param string $content
	 *
	 * @return void
	 * @throws Exception
	 */
	public function shouldBeAbleToDownloadFileInsidePublicSharedFolderWithPasswordAndContentShouldBe(
		string $path,
		string $publicWebDAVAPIVersion,
		string $password,
		string $content
	):void {
		if (OcisHelper::isTestingOnOcisOrReva() && $publicWebDAVAPIVersion === "old") {
			return;
		} elseif ($publicWebDAVAPIVersion === "new") {
			$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();
		} else {
			$techPreviewHadToBeEnabled = false;
		}

		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPassword(
			$path,
			$password,
			$publicWebDAVAPIVersion
		);

		$this->featureContext->downloadedContentShouldBe($content);

		if ($techPreviewHadToBeEnabled) {
			$this->occContext->disableDAVTechPreview();
		}
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @Then /^the public should be able to download file "([^"]*)" from inside the last public link shared folder using the (old|new) public WebDAV API without password and the content should be "([^"]*)"$/
	 *
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 * @param string $content
	 *
	 * @return void
	 * @throws Exception
	 */
	public function shouldBeAbleToDownloadFileInsidePublicSharedFolderWithoutPassword(
		string $path,
		string $publicWebDAVAPIVersion,
		string $content
	):void {
		$this->shouldBeAbleToDownloadFileInsidePublicSharedFolderWithPasswordAndContentShouldBe($path, $publicWebDAVAPIVersion, "", $content);
	}

	/**
	 * @Then /^the public should not be able to download file "([^"]*)" from inside the last public link shared folder using the (old|new) public WebDAV API with password "([^"]*)"$/
	 * @Then /^the public download of file "([^"]*)" from inside the last public link shared folder using the (old|new) public WebDAV API with password "([^"]*)" should fail with HTTP status code "([^"]*)"$/
	 *
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 * @param string $expectedHttpCode
	 *
	 * @return void
	 */
	public function shouldNotBeAbleToDownloadFileInsidePublicSharedFolderWithPassword(
		string $path,
		string $publicWebDAVAPIVersion,
		string $password,
		string $expectedHttpCode = "401"
	):void {
		$this->shouldNotBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
			"",
			$path,
			$publicWebDAVAPIVersion,
			$password,
			$expectedHttpCode
		);
	}

	/**
	 * @Then /^the public should be able to download the range "([^"]*)" of file "([^"]*)" from inside the last public link shared folder using the (old|new) public WebDAV API with password "([^"]*)""$/
	 *
	 * @param string $range
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function shouldBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
		string $range,
		string $path,
		string $publicWebDAVAPIVersion,
		string $password
	):void {
		if (OcisHelper::isTestingOnOcisOrReva() && $publicWebDAVAPIVersion === "old") {
			return;
		} elseif ($publicWebDAVAPIVersion === "new") {
			$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();
		} else {
			$techPreviewHadToBeEnabled = false;
		}

		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
			$path,
			$password,
			$range,
			$publicWebDAVAPIVersion
		);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @Then /^the public should not be able to download the range "([^"]*)" of file "([^"]*)" from inside the last public link shared folder using the (old|new) public WebDAV API with password "([^"]*)"$/
	 *
	 * @param string $range
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 * @param string $expectedHttpCode
	 *
	 * @return void
	 * @throws Exception
	 */
	public function shouldNotBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
		string $range,
		string $path,
		string $publicWebDAVAPIVersion,
		string $password,
		string $expectedHttpCode = "401"
	):void {
		if (OcisHelper::isTestingOnOcisOrReva() && $publicWebDAVAPIVersion === "old") {
			return;
		} elseif ($publicWebDAVAPIVersion === "new") {
			$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();
		} else {
			$techPreviewHadToBeEnabled = false;
		}

		$this->publicDownloadsTheFileInsideThePublicSharedFolderWithPasswordAndRange(
			$path,
			$password,
			$range,
			$publicWebDAVAPIVersion
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
	 * @Then /^the public should be able to download the range "([^"]*)" of file "([^"]*)" from inside the last public link shared folder using the (old|new) public WebDAV API and the content should be "([^"]*)"$/
	 *
	 * @param string $range
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 * @param string $content
	 *
	 * @return void
	 * @throws Exception
	 */
	public function shouldBeAbleToDownloadRangeOfFileInsidePublicSharedFolder(
		string $range,
		string $path,
		string $publicWebDAVAPIVersion,
		string $content
	):void {
		$this->shouldBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
			$range,
			$path,
			$publicWebDAVAPIVersion,
			"",
			$content
		);
	}

	/**
	 * @Then /^the public should not be able to download the range "([^"]*)" of file "([^"]*)" from inside the last public link shared folder using the (old|new) public WebDAV API without a password$/
	 *
	 * @param string $range
	 * @param string $path
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 * @throws Exception
	 */
	public function shouldNotBeAbleToDownloadRangeOfFileInsidePublicSharedFolder(
		string $range,
		string $path,
		string $publicWebDAVAPIVersion
	):void {
		$this->shouldNotBeAbleToDownloadRangeOfFileInsidePublicSharedFolderWithPassword(
			$range,
			$path,
			$publicWebDAVAPIVersion,
			""
		);
	}

	/**
	 * @Then /^the public upload to the last publicly shared file using the (old|new) public WebDAV API should (?:fail|pass) with HTTP status code "([^"]*)"$/
	 *
	 * @param string $publicWebDAVAPIVersion
	 * @param string $expectedHttpCode
	 *
	 * @return void
	 * @throws Exception
	 */
	public function publiclyUploadingShouldToSharedFileShouldFail(
		string $publicWebDAVAPIVersion,
		string $expectedHttpCode
	):void {
		$filename = "";
		if (OcisHelper::isTestingOnOcisOrReva() && $publicWebDAVAPIVersion === "old") {
			return;
		} elseif ($publicWebDAVAPIVersion === "new") {
			$filename = (string)$this->featureContext->getLastPublicShareData()->data[0]->file_target;
			$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();
		} else {
			$techPreviewHadToBeEnabled = false;
		}

		$this->publicUploadContent(
			$filename,
			'',
			'test',
			false,
			[],
			$publicWebDAVAPIVersion
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
	 * @throws Exception
	 */
	public function publiclyUploadingShouldNotWork(
		string $publicWebDAVAPIVersion,
		string $expectedHttpCode = null
	):void {
		if (OcisHelper::isTestingOnOcisOrReva() && $publicWebDAVAPIVersion === "old") {
			return;
		} elseif ($publicWebDAVAPIVersion === "new") {
			$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();
		} else {
			$techPreviewHadToBeEnabled = false;
		}

		$this->publicUploadContent(
			'whateverfilefortesting.txt',
			'',
			'test',
			false,
			[],
			$publicWebDAVAPIVersion
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
	 * @Then /^the public should be able to upload file "([^"]*)" into the last public link shared folder using the (old|new) public WebDAV API with password "([^"]*)"$/
	 *
	 * @param string $filename
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 *
	 * @return void
	 */
	public function publiclyUploadingIntoFolderWithPasswordShouldWork(
		string $filename,
		string $publicWebDAVAPIVersion,
		string $password
	):void {
		$this->publicUploadContent(
			$filename,
			$password,
			'test',
			false,
			[],
			$publicWebDAVAPIVersion
		);

		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @Then /^the public upload of file "([^"]*)" into the last public link shared folder using the (old|new) public WebDAV API with password "([^"]*)" should fail with HTTP status code "([^"]*)"$/
	 *
	 * @param string $filename
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 * @param string $expectedHttpCode
	 *
	 * @return void
	 */
	public function publiclyUploadingIntoFolderWithPasswordShouldFail(
		string $filename,
		string $publicWebDAVAPIVersion,
		string $password,
		string $expectedHttpCode
	):void {
		$this->publicUploadContent(
			$filename,
			$password,
			'test',
			false,
			[],
			$publicWebDAVAPIVersion
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
	 * @throws Exception
	 */
	public function publiclyUploadingShouldWork(string $publicWebDAVAPIVersion):void {
		$path = "whateverfilefortesting-$publicWebDAVAPIVersion-publicWebDAVAPI.txt";
		$content = "test $publicWebDAVAPIVersion";

		if (OcisHelper::isTestingOnOcisOrReva() && $publicWebDAVAPIVersion === "old") {
			return;
		} elseif ($publicWebDAVAPIVersion === "new") {
			$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();
		} else {
			$techPreviewHadToBeEnabled = false;
		}

		$this->publicUploadContent(
			$path,
			'',
			$content,
			false,
			[],
			$publicWebDAVAPIVersion
		);
		$response = $this->featureContext->getResponse();
		Assert::assertTrue(
			($response->getStatusCode() == 201),
			"upload should have passed but failed with code " .
			$response->getStatusCode()
		);
		$this->shouldBeAbleToDownloadFileInsidePublicSharedFolder(
			$path,
			$publicWebDAVAPIVersion
		);
		$this->featureContext->checkDownloadedContentMatches($content);

		if ($techPreviewHadToBeEnabled) {
			$this->occContext->disableDAVTechPreview();
		}
	}

	/**
	 * @Then /^uploading content to a public link shared file should (not|)\s?work using the (old|new) public WebDAV API$/
	 *
	 * @param string $shouldOrNot (not|)
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 * @throws Exception
	 */
	public function publiclyUploadingToPublicLinkSharedFileShouldWork(
		string $shouldOrNot,
		string $publicWebDAVAPIVersion
	):void {
		$content = "test $publicWebDAVAPIVersion";
		$should = ($shouldOrNot !== "not");
		if (OcisHelper::isTestingOnOcisOrReva() && $publicWebDAVAPIVersion === "old") {
			return;
		} elseif ($publicWebDAVAPIVersion === "new") {
			$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();
			$path = $this->featureContext->getLastPublicSharePath();
		} else {
			$techPreviewHadToBeEnabled = false;
			$path = "";
		}

		$this->publicUploadContent(
			$path,
			'',
			$content,
			false,
			[],
			$publicWebDAVAPIVersion
		);
		$response = $this->featureContext->getResponse();
		if ($should) {
			Assert::assertTrue(
				($response->getStatusCode() == 204),
				"upload should have passed but failed with code " .
				$response->getStatusCode()
			);

			$this->downloadPublicFileWithRange(
				"",
				$publicWebDAVAPIVersion,
				""
			);

			$this->featureContext->checkDownloadedContentMatches(
				$content,
				"Checking the content of the last public shared file after downloading with the $publicWebDAVAPIVersion public WebDAV API"
			);
		} else {
			$expectedCode = 403;
			Assert::assertTrue(
				($response->getStatusCode() == $expectedCode),
				"upload should have failed with HTTP status $expectedCode but passed with code " .
				$response->getStatusCode()
			);
		}

		if ($techPreviewHadToBeEnabled) {
			$this->occContext->disableDAVTechPreview();
		}
	}

	/**
	 * @When the public uploads file :fileName to the last public link shared folder with mtime :mtime using the :davVersion public WebDAV API
	 *
	 * @param String $fileName
	 * @param String $mtime
	 * @param String $davVersion
	 *
	 * @return void
	 * @throws Exception
	 */
	public function thePublicUploadsFileToLastSharedFolderWithMtimeUsingTheWebdavApi(
		string $fileName,
		string $mtime,
		string $davVersion = "old"
	):void {
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
		string $destination,
		string $password
	):void {
		$token = $this->featureContext->getLastPublicShareToken();
		$davPath = WebDavHelper::getDavPath(
			$token,
			0,
			"public-files-new"
		);
		$url = $this->featureContext->getBaseUrl() . "/$davPath";
		$password = $this->featureContext->getActualPassword($password);
		$userName = $this->getUsernameForPublicWebdavApi(
			$token,
			$password,
			"new"
		);
		$foldername = \implode(
			'/',
			\array_map('rawurlencode', \explode('/', $destination))
		);
		$url .= \ltrim($foldername, '/');

		$this->featureContext->setResponse(
			HttpRequestHelper::sendRequest(
				$url,
				$this->featureContext->getStepLineRef(),
				'MKCOL',
				$userName,
				$password
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
	public function publicCreatesFolder(string $destination):void {
		$this->publicCreatesFolderUsingPassword($destination, '');
	}

	/**
	 * @Then /^the public should be able to create folder "([^"]*)" in the last public link shared folder using the new public WebDAV API with password "([^"]*)"$/
	 *
	 * @param string $foldername
	 * @param string $password
	 *
	 * @return void
	 */
	public function publicShouldBeAbleToCreateFolderWithPassword(
		string $foldername,
		string $password
	):void {
		$this->publicCreatesFolderUsingPassword($foldername, $password);
		$this->featureContext->theHTTPStatusCodeShouldBeSuccess();
	}

	/**
	 * @Then /^the public creation of folder "([^"]*)" in the last public link shared folder using the new public WebDAV API with password "([^"]*)" should fail with HTTP status code "([^"]*)"$/
	 *
	 * @param string $foldername
	 * @param string $password
	 * @param string $expectedHttpCode
	 *
	 * @return void
	 */
	public function publicCreationOfFolderWithPasswordShouldFail(
		string $foldername,
		string $password,
		string $expectedHttpCode
	):void {
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
		string $fileName,
		string $mtime
	):void {
		$token = $this->featureContext->getLastPublicShareToken();
		$baseUrl = $this->featureContext->getBaseUrl();
		if (\TestHelpers\OcisHelper::isTestingOnOcisOrReva()) {
			$mtime = \explode(" ", $mtime);
			\array_pop($mtime);
			$mtime = \implode(" ", $mtime);
			Assert::assertStringContainsString(
				$mtime,
				WebDavHelper::getMtimeOfFileinPublicLinkShare(
					$baseUrl,
					$fileName,
					$token,
					$this->featureContext->getStepLineRef()
				)
			);
		} else {
			Assert::assertEquals(
				$mtime,
				WebDavHelper::getMtimeOfFileinPublicLinkShare(
					$baseUrl,
					$fileName,
					$token,
					$this->featureContext->getStepLineRef()
				)
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
		string $fileName,
		string $mtime
	):void {
		$token = $this->featureContext->getLastPublicShareToken();
		$baseUrl = $this->featureContext->getBaseUrl();
		Assert::assertNotEquals(
			$mtime,
			WebDavHelper::getMtimeOfFileinPublicLinkShare(
				$baseUrl,
				$fileName,
				$token,
				$this->featureContext->getStepLineRef()
			)
		);
	}

	/**
	 * Uploads a file through the public WebDAV API and sets the response in FeatureContext
	 *
	 * @param string $filename
	 * @param string|null $password
	 * @param string $body
	 * @param bool $autoRename
	 * @param array $additionalHeaders
	 * @param string $publicWebDAVAPIVersion
	 *
	 * @return void
	 */
	public function publicUploadContent(
		string $filename,
		?string $password = '',
		string $body = 'test',
		bool $autoRename = false,
		array $additionalHeaders = [],
		string $publicWebDAVAPIVersion = "old"
	):void {
		if (OcisHelper::isTestingOnOcisOrReva() && $publicWebDAVAPIVersion === "old") {
			return;
		}
		$password = $this->featureContext->getActualPassword($password);
		$token = $this->featureContext->getLastPublicShareToken();
		$davPath = WebDavHelper::getDavPath(
			$token,
			0,
			"public-files-$publicWebDAVAPIVersion"
		);
		$url = $this->featureContext->getBaseUrl() . "/$davPath";
		$userName = $this->getUsernameForPublicWebdavApi(
			$token,
			$password,
			$publicWebDAVAPIVersion
		);

		$filename = \implode(
			'/',
			\array_map('rawurlencode', \explode('/', $filename))
		);
		$url .= \ltrim($filename, '/');
		// Trim any "/" from the end. For example, if we are putting content to a
		// single file that has been shared with a link, then the URL should end
		// with the link token and no "/" at the end.
		$url = \rtrim($url, "/");
		$headers = ['X-Requested-With' => 'XMLHttpRequest'];

		if ($autoRename) {
			$headers['OC-Autorename'] = 1;
		}
		$headers = \array_merge($headers, $additionalHeaders);
		$response = HttpRequestHelper::put(
			$url,
			$this->featureContext->getStepLineRef(),
			$userName,
			$password,
			$headers,
			$body
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
		string $token,
		string $password,
		string $publicWebDAVAPIVersion
	):?string {
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
	public function setUpScenario(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
		$this->occContext = $environment->getContext('OccContext');
	}

	/**
	 * @When /^the public sends "([^"]*)" request to the last public link share using the (old|new) public WebDAV API(?: with password "([^"]*)")?$/
	 *
	 * @param string $method
	 * @param string $publicWebDAVAPIVersion
	 * @param string $password
	 *
	 * @return void
	 * @throws GuzzleException
	 */
	public function publicSendsRequestToLastPublicShare(string $method, string $publicWebDAVAPIVersion, ?string $password = ''):void {
		if (OcisHelper::isTestingOnOcisOrReva() && $publicWebDAVAPIVersion === "old") {
			return;
		}
		if ($method === "PROPFIND") {
			$body = '<?xml version="1.0"?>
			<d:propfind xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns">
				<d:prop>
					<d:resourcetype/>
					<oc:public-link-item-type/>
					<oc:public-link-permission/>
					<oc:public-link-expiration/>
					<oc:public-link-share-datetime/>
					<oc:public-link-share-owner/>
				</d:prop>
			</d:propfind>';
		}
		$token = $this->featureContext->getLastPublicShareToken();
		$davPath = WebDavHelper::getDavPath(
			null,
			null,
			"public-files-$publicWebDAVAPIVersion"
		);
		$username = $this->getUsernameForPublicWebdavApi(
			$token,
			$password,
			$publicWebDAVAPIVersion
		);
		$fullUrl = $this->featureContext->getBaseUrl() . "/$davPath$token";
		$response = HttpRequestHelper::sendRequest(
			$fullUrl,
			$this->featureContext->getStepLineRef(),
			$method,
			$username,
			$password,
			null,
			$body
		);
		$this->featureContext->setResponse($response);
	}
}
