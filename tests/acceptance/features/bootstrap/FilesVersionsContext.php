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
use Behat\Gherkin\Node\TableNode;
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
		Assert::assertNotNull($fileId, __METHOD__ . " fileid of file $file user $fileOwner not found (the file may not exist)");
		$response = $this->featureContext->makeDavRequest(
			$user,
			"PROPFIND",
			$this->getVersionsPathForFileId($fileId),
			null,
			null,
			null,
			'2'
		);
		$this->featureContext->setResponse($response, $user);
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
		Assert::assertNotNull($fileId, __METHOD__ . " fileid of file $file user $user not found (the file may not exist)");
		$response = $this->featureContext->makeDavRequest(
			$user,
			"PROPFIND",
			$this->getVersionsPathForFileId($fileId),
			null,
			null,
			null,
			'2'
		);
		$this->featureContext->setResponse($response, $user);
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
		Assert::assertNotNull($fileId, __METHOD__ . " fileid of file $file user $user not found (the file may not exist)");
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
		$this->featureContext->setResponse($response, $user);
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
		Assert::assertNotNull($fileId, __METHOD__ . " fileid of file $path user $user not found (the file may not exist)");
		$responseXml = $this->listVersionFolder($user, $fileId, 1);
		$xmlPart = $responseXml->xpath("//d:response/d:href");
		//restoring the version only works with DAV path v2
		$destinationUrl = $this->featureContext->getBaseUrl() . "/" .
			WebDavHelper::getDavPath($user, 2) . \trim($path, "/");
		$fullUrl = $this->featureContext->getBaseUrlWithoutPath() .
			$xmlPart[$versionIndex];
		$response = HttpRequestHelper::sendRequest(
			$fullUrl,
			$this->featureContext->getStepLineRef(),
			'COPY',
			$user,
			$this->featureContext->getPasswordForUser($user),
			['Destination' => $destinationUrl]
		);
		$this->featureContext->setResponse($response, $user);
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
		Assert::assertNotNull($fileId, __METHOD__ . " file $path user $user not found (the file may not exist)");
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
		Assert::assertNotNull($fileId, __METHOD__ . " fileid of file $path user $user not found (the file may not exist)");
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
	 * @Then /^as (?:users|user) "([^"]*)" the authors of the versions of file "([^"]*)" should be:$/
	 *
	 * @param string $users comma-separated list of usernames
	 * @param string $filename
	 * @param TableNode $table
	 *
	 * @return void
	 * @throws Exception
	 */
	public function asUsersAuthorsOfVersionsOfFileShouldBe(
		string $users,
		string $filename,
		TableNode $table
	): void {
		$this->featureContext->verifyTableNodeColumns(
			$table,
			['index', 'author']
		);
		$requiredVersionMetadata = $table->getHash();
		$usersArray = \explode(",", $users);
		foreach ($usersArray as $username) {
			$actualUsername = $this->featureContext->getActualUsername($username);
			$this->userGetsVersionMetadataOfFile($actualUsername, $filename);
			foreach ($requiredVersionMetadata as $versionMetadata) {
				$this->featureContext->theAuthorOfEditedVersionFile(
					$versionMetadata['index'],
					$versionMetadata['author']
				);
			}
		}
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
		Assert::assertNotNull($fileId, __METHOD__ . " fileid of file $path user $user not found (the file may not exist)");
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
		$this->featureContext->setResponse($response, $user);
	}

	/**
	 * @Then /^the content of version index "([^"]*)" of file "([^"]*)" for user "([^"]*)" should be "([^"]*)"$/
	 *
	 * @param string $index
	 * @param string $path
	 * @param string $user
	 * @param string $content
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theContentOfVersionIndexOfFileForUserShouldBe(
		string $index,
		string $path,
		string $user,
		string $content
	): void {
		$this->downloadVersion($user, $path, $index);
		$this->featureContext->theHTTPStatusCodeShouldBe("200");
		$this->featureContext->downloadedContentShouldBe($content);
	}

	/**
	 * @When /^user "([^"]*)" retrieves the meta information of (file|fileId) "([^"]*)" using the meta API$/
	 *
	 * @param string $user
	 * @param string $fileOrFileId
	 * @param string $path
	 *
	 * @return void
	 */
	public function userGetMetaInfo(string $user, string $fileOrFileId, string $path):void {
		$user = $this->featureContext->getActualUsername($user);
		$baseUrl = $this->featureContext->getBaseUrl();
		$password = $this->featureContext->getPasswordForUser($user);

		if ($fileOrFileId === "file") {
			$fileId = $this->featureContext->getFileIdForPath($user, $path);
			$metaPath = "/meta/$fileId/";
		} else {
			$metaPath = "/meta/$path/";
		}

		$body = '<?xml version="1.0" encoding="utf-8"?>
			<a:propfind xmlns:a="DAV:" xmlns:oc="http://owncloud.org/ns">
		    	<a:prop>
		    		<oc:meta-path-for-user />
		    	</a:prop>
			</a:propfind>';

		$response = WebDavHelper::makeDavRequest(
			$baseUrl,
			$user,
			$password,
			"PROPFIND",
			$metaPath,
			['Content-Type' => 'text/xml','Depth' => '0'],
			$this->featureContext->getStepLineRef(),
			$body,
			$this->featureContext->getDavPathVersion(),
			null
		);
		$this->featureContext->setResponse($response);
		$responseXml = HttpRequestHelper::getResponseXml(
			$response,
			__METHOD__
		);
		$this->featureContext->setResponseXmlObject($responseXml);
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
