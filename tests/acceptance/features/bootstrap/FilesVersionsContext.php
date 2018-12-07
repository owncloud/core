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
use TestHelpers\WebDavHelper;
use Sabre\HTTP\ResponseInterface;
use Sabre\HTTP\ClientHttpException;

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
	 * @When user :user restores version index :versionIndex of file :path using the WebDAV API
	 * @Given user :user has restored version index :versionIndex of file :path
	 *
	 * @param string $user
	 * @param int $versionIndex
	 * @param string $path
	 *
	 * @return void
	 */
	public function userRestoresVersionIndexOfFile($user, $versionIndex, $path) {
		$fileId = $this->featureContext->getFileIdForPath($user, $path);
		$versions = \array_keys(
			$this->listVersionFolder($user, "/meta/$fileId/v", 1)
		);
		//restoring the version only works with dav path v2
		$destinationUrl = $this->featureContext->getBaseUrl() . "/" .
			WebDavHelper::getDavPath($user, 2) . \trim($path, "/");
		$fullUrl = $this->featureContext->getBaseUrlWithoutPath() .
			$versions[$versionIndex];
		HttpRequestHelper::sendRequest(
			$fullUrl,
			'COPY', $user, $this->featureContext->getPasswordForUser($user),
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
	 */
	public function theVersionFolderOfFileShouldContainElements(
		$path, $user, $count
	) {
		$fileId = $this->featureContext->getFileIdForPath($user, $path);
		PHPUnit_Framework_Assert::assertNotNull($fileId, "file $path not found");
		$elements = $this->listVersionFolder($user, "/meta/$fileId/v", 1);
		var_dump($elements);
		PHPUnit_Framework_Assert::assertEquals($count, \count($elements) - 1);
	}

	/**
	 * @Then the version folder of fileId :fileId for user :user should contain :count element(s)
	 *
	 * @param int $fileId
	 * @param string $user
	 * @param int $count
	 *
	 * @return void
	 */
	public function theVersionFolderOfFileIdShouldContainElements(
		$fileId, $user, $count
	) {
		$elements = $this->listVersionFolder($user, "/meta/$fileId/v", 1);
		PHPUnit_Framework_Assert::assertEquals($count, \count($elements) - 1);
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
	 */
	public function theContentLengthOfFileForUserInVersionsFolderIs(
		$path, $index, $user, $length
	) {
		$fileId = $this->featureContext->getFileIdForPath($user, $path);
		$elements = $this->listVersionFolder(
			$user, "/meta/$fileId/v", 1, ['{DAV:}getcontentlength']
		);
		$elements = \array_values($elements);
		PHPUnit_Framework_Assert::assertEquals(
			$length, $elements[$index]['{DAV:}getcontentlength']
		);
	}

	/**
	 * @param string $user
	 * @param string $path
	 * @param int $folderDepth
	 * @param array|null $properties
	 *
	 * @return array|ResponseInterface
	 */
	public function listVersionFolder(
		$user, $path, $folderDepth, $properties = null
	) {
		$client = $this->featureContext->getSabreClient($user);
		if (!$properties) {
			$properties = [
				'{DAV:}getetag'
			];
		}
		try {
			$response = $client->propfind(
				$this->featureContext->makeSabrePathNotForFiles(
					$path, 'file_versions'
				),
				$properties, $folderDepth
			);
		} catch (ClientHttpException $e) {
			$response = $e->getResponse();
		}
		return $response;
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
	public function before(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}
