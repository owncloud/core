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
use TestHelpers\WebDavHelper;

require_once 'bootstrap.php';

/**
 * Steps that relate to files_versions app
 */
class FilesVersionsContext implements Context {
	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * @param string $fileId
	 *
	 * @return string
	 */
	private function getVersionsPathForFileId(string $fileId):string {
		return "/meta/$fileId/v";
	}

	/**
	 * @When user :user tries to get versions of file :file from :fileOwner
	 *
	 * @param string $user
	 * @param string $file
	 * @param string $fileOwner
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userTriesToGetFileVersions(string $user, string $file, string $fileOwner):void {
		$user = $this->featureContext->getActualUsername($user);
		$fileOwner = $this->featureContext->getActualUsername($fileOwner);
		$fileId = $this->featureContext->getFileIdForPath($fileOwner, $file);
		$response = $this->featureContext->makeDavRequest(
			$user,
			"PROPFIND",
			$this->getVersionsPathForFileId($fileId),
			null,
			null,
			null,
			'2'
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @When user :user gets the number of versions of file :file
	 *
	 * @param string $user
	 * @param string $file
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userGetsFileVersions(string $user, string $file):void {
		$user = $this->featureContext->getActualUsername($user);
		$fileId = $this->featureContext->getFileIdForPath($user, $file);
		$response = $this->featureContext->makeDavRequest(
			$user,
			"PROPFIND",
			$this->getVersionsPathForFileId($fileId),
			null,
			null,
			null,
			'2'
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @When user :user gets the version metadata of file :file
	 *
	 * @param string $user
	 * @param string $file
	 *
	 * @return void
	 * @throws Exception
	 */
	public function userGetsVersionMetadataOfFile(string $user, string $file):void {
		$user = $this->featureContext->getActualUsername($user);
		$fileId = $this->featureContext->getFileIdForPath($user, $file);
		$body = '<?xml version="1.0"?>
<d:propfind  xmlns:d="DAV:" xmlns:oc="http://owncloud.org/ns">
  <d:prop>
    <oc:meta-version-edited-by />
    <oc:meta-version-edited-by-name />
  </d:prop>
</d:propfind>';
		$response = $this->featureContext->makeDavRequest(
			$user,
			"PROPFIND",
			$this->getVersionsPathForFileId($fileId),
			null,
			$body,
			null,
			'2'
		);
		$this->featureContext->setResponse($response);
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
	 * @throws Exception
	 */
	public function userRestoresVersionIndexOfFile(string $user, int $versionIndex, string $path):void {
		$user = $this->featureContext->getActualUsername($user);
		$fileId = $this->featureContext->getFileIdForPath($user, $path);
		$responseXml = $this->listVersionFolder($user, $fileId, 1);
		$xmlPart = $responseXml->xpath("//d:response/d:href");
		//restoring the version only works with DAV path v2
		$destinationUrl = $this->featureContext->getBaseUrl() . "/" .
			WebDavHelper::getDavPath($user, 2) . \trim($path, "/");
		$fullUrl = $this->featureContext->getBaseUrlWithoutPath() .
			$xmlPart[$versionIndex];
		HttpRequestHelper::sendRequest(
			$fullUrl,
			$this->featureContext->getStepLineRef(),
			'COPY',
			$user,
			$this->featureContext->getPasswordForUser($user),
			['Destination' => $destinationUrl]
		);
	}

	/**
	 * @Then the version folder of file :path for user :user should contain :count element(s)
	 *
	 * @param string $path
	 * @param string $user
	 * @param int $count
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theVersionFolderOfFileShouldContainElements(
		string $path,
		string $user,
		int $count
	):void {
		$user = $this->featureContext->getActualUsername($user);
		$fileId = $this->featureContext->getFileIdForPath($user, $path);
		Assert::assertNotNull($fileId, "file $path not found");
		$this->theVersionFolderOfFileIdShouldContainElements($fileId, $user, $count);
	}

	/**
	 * @Then the version folder of fileId :fileId for user :user should contain :count element(s)
	 *
	 * @param string $fileId
	 * @param string $user
	 * @param int $count
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theVersionFolderOfFileIdShouldContainElements(
		string $fileId,
		string $user,
		int $count
	):void {
		$responseXml = $this->listVersionFolder($user, $fileId, 1);
		$xmlPart = $responseXml->xpath("//d:prop/d:getetag");
		Assert::assertEquals(
			$count,
			\count($xmlPart) - 1,
			"could not find $count version element(s) in \n" . $responseXml->asXML()
		);
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
	 * @throws Exception
	 */
	public function theContentLengthOfFileForUserInVersionsFolderIs(
		string $path,
		int $index,
		string $user,
		int $length
	):void {
		$user = $this->featureContext->getActualUsername($user);
		$fileId = $this->featureContext->getFileIdForPath($user, $path);
		$responseXml = $this->listVersionFolder(
			$user,
			$fileId,
			1,
			['getcontentlength']
		);
		$xmlPart = $responseXml->xpath("//d:prop/d:getcontentlength");
		Assert::assertEquals(
			$length,
			(int) $xmlPart[$index],
			"The content length of file {$path} with version {$index} for user {$user} was 
			expected to be {$length} but the actual content length is {$xmlPart[$index]}"
		);
	}

	/**
	 * @When user :user downloads the version of file :path with the index :index
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $index
	 *
	 * @return void
	 * @throws Exception
	 */
	public function downloadVersion(string $user, string $path, string $index):void {
		$user = $this->featureContext->getActualUsername($user);
		$fileId = $this->featureContext->getFileIdForPath($user, $path);
		$index = (int)$index;
		$responseXml = $this->listVersionFolder($user, $fileId, 1);
		$xmlPart = $responseXml->xpath("//d:response/d:href");
		if (!isset($xmlPart[$index])) {
			Assert::fail(
				'could not find version of path "' . $path . '" with index "' . $index . '"'
			);
		}
		// the href already contains the path
		$url = WebDavHelper::sanitizeUrl(
			$this->featureContext->getBaseUrlWithoutPath() . $xmlPart[$index]
		);
		$response = HttpRequestHelper::get(
			$url,
			$this->featureContext->getStepLineRef(),
			$user,
			$this->featureContext->getPasswordForUser($user)
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * returns the result parsed into an SimpleXMLElement
	 * with an registered namespace with 'd' as prefix and 'DAV:' as namespace
	 *
	 * @param string $user
	 * @param string $fileId
	 * @param int $folderDepth
	 * @param string[]|null $properties
	 *
	 * @return SimpleXMLElement
	 * @throws Exception
	 */
	public function listVersionFolder(
		string $user,
		string $fileId,
		int $folderDepth,
		?array $properties = null
	):SimpleXMLElement {
		if (!$properties) {
			$properties = [
				'getetag'
			];
		}
		$user = $this->featureContext->getActualUsername($user);
		$password = $this->featureContext->getPasswordForUser($user);
		$response = WebDavHelper::propfind(
			$this->featureContext->getBaseUrl(),
			$user,
			$password,
			$this->getVersionsPathForFileId($fileId),
			$properties,
			$this->featureContext->getStepLineRef(),
			(string) $folderDepth,
			"versions"
		);
		return HttpRequestHelper::getResponseXml(
			$response,
			__METHOD__
		);
	}

	/**
	 * This will run before EVERY scenario.
	 * It will set the properties for this object.
	 *
	 * @BeforeScenario
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function before(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}
