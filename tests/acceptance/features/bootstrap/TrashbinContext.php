<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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
use PHPUnit\Framework\Assert;
use GuzzleHttp\Message\ResponseInterface;
use TestHelpers\WebDavHelper;

require_once 'bootstrap.php';

/**
 * Trashbin context
 */
class TrashbinContext implements Context {

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
	 * @When user :user empties the trashbin using the trashbin API
	 *
	 * @param string $user user
	 *
	 * @return ResponseInterface
	 */
	public function emptyTrashbin($user) {
		$response = WebDavHelper::makeDavRequest(
			$this->featureContext->getBaseUrl(),
			$user,
			$this->featureContext->getPasswordForUser($user),
			'DELETE',
			"/trash-bin/$user/",
			[],
			null,
			null,
			2,
			'trash-bin'
		);

		$this->featureContext->setResponse($response);
		return $response;
	}

	/**
	 * @Given user :user has emptied the trashbin
	 *
	 * @param string $user user
	 *
	 * @return void
	 */
	public function userHasEmptiedTrashbin($user) {
		$response = $this->emptyTrashbin($user);

		Assert::assertEquals(
			204, $response->getStatusCode()
		);
	}

	/**
	 * List trashbin folder
	 *
	 * @param string $user user
	 * @param string $path path
	 * @param string $requestingUser user
	 *
	 * @return array response
	 */
	public function listTrashbinFolder($user, $path, $requestingUser = null) {
		if ($requestingUser === null) {
			$requestingUser = $user;
		}
		$path = $path ?? '/';
		$responseXml = WebDavHelper::listFolder(
			$this->featureContext->getBaseUrl(),
			$requestingUser,
			$this->featureContext->getPasswordForUser($requestingUser),
			"/trash-bin/$user/$path",
			1,
			[
				'oc:trashbin-original-filename',
				'oc:trashbin-original-location',
				'oc:trashbin-delete-timestamp',
				'd:getlastmodified'
			],
			'trash-bin'
		);

		$xmlElements = $responseXml->xpath('//d:response');
		$files = \array_map(
			static function (SimpleXMLElement $element) {
				$href = $element->xpath('./d:href')[0];

				$propStats = $element->xpath('./d:propstat');
				$successPropStat = \array_filter(
					$propStats, static function (SimpleXMLElement $propStat) {
						$status = $propStat->xpath('./d:status');
						return (string)$status[0] === 'HTTP/1.1 200 OK';
					}
				);
				if (isset($successPropStat[0])) {
					$successPropStat = $successPropStat[0];

					$name = $successPropStat->xpath('./d:prop/oc:trashbin-original-filename');
					$mtime = $successPropStat->xpath('./d:prop/oc:trashbin-delete-timestamp');
					$originalLocation = $successPropStat->xpath('./d:prop/oc:trashbin-original-location');
				} else {
					$name = [];
					$mtime = [];
					$originalLocation = [];
				}

				return [
				'href' => (string)$href,
				'name' => isset($name[0]) ? (string)$name[0] : null,
				'mtime' => isset($mtime[0]) ? (string)$mtime[0] : null,
				'original-location' => isset($originalLocation[0]) ? (string)$originalLocation[0] : null
				];
			}, $xmlElements
		);

		// filter root element
		$files = \array_filter(
			$files, static function ($element) use ($user, $path) {
				$path = \ltrim($path, '/');
				if ($path !==  '') {
					$path .= '/';
				}
				return ($element['href'] !== "/remote.php/dav/trash-bin/$user/$path");
			}
		);
		return $files;
	}

	/**
	 * @When :requestingUser requests list of files in trashbin for user :user
	 *
	 * @param string $requestingUser
	 * @param string $user
	 *
	 * @return void
	 */
	public function triesToListFilesInTrashbinForUser($requestingUser, $user) {
		$responseXml = $this->listTrashbinFolder($user, "/", $requestingUser);
		\var_dump($responseXml);
	}

	/**
	 * converts the trashItemHRef from /<base>/remote.php/dav/trash-bin/<user>/<item_id>/ to /trash-bin/<user>/<item_id>
	 *
	 * @param string $href
	 *
	 * @return string
	 */
	private function convertTrashbinHref($href) {
		$trashItemHRef = \trim($href, '/');
		$parts = \explode('/', $trashItemHRef);
		return '/' . \join('/', \array_slice($parts, -3));
	}

	/**
	 * @When /^user "([^"]*)" tries to delete the (?:file|folder|entry) with original path "([^"]*)" from the trashbin using the trashbin API$/
	 *
	 * @param string $user
	 * @param string $originalPath
	 *
	 * @return int the number of items that were matched and requested for delete
	 */
	public function tryToDeleteFileFromTrashbin($user, $originalPath) {
		$listing = $this->listTrashbinFolder($user, null);
		$originalPath = \trim($originalPath, '/');
		$numItemsDeleted = 0;

		foreach ($listing as $entry) {
			if ($entry['original-location'] === $originalPath) {
				$trashItemHRef = $this->convertTrashbinHref($entry['href']);
				$response = $this->featureContext->makeDavRequest(
					$user, 'DELETE', $trashItemHRef, [], null, 'trash-bin', null, 2
				);
				$this->featureContext->setResponse($response);
				$numItemsDeleted++;
			}
		}

		return $numItemsDeleted;
	}

	/**
	 * @When /^user "([^"]*)" deletes the (?:file|folder|entry) with original path "([^"]*)" from the trashbin using the trashbin API$/
	 *
	 * @param string $user
	 * @param string $originalPath
	 *
	 * @return void
	 */
	public function deleteFileFromTrashbin($user, $originalPath) {
		$numItemsDeleted = $this->tryToDeleteFileFromTrashbin($user, $originalPath);

		Assert::assertEquals(
			1,
			$numItemsDeleted,
			"Expected to delete exactly one item from the trashbin but $numItemsDeleted were deleted"
		);
	}

	/**
	 * @Then /^as "([^"]*)" (?:file|folder|entry) "([^"]*)" should exist for user "([^"]*)" in trash$/
	 *
	 * @param string $requestingUser
	 * @param string $path
	 * @param string $user
	 *
	 * @return void
	 */
	public function asEntryExistsAsRequestedByDifferentUser($requestingUser, $path, $user) {
		$this->asFileOrFolderExistsInTrash($user, $path, $requestingUser);
	}

	/**
	 * @Then /^as "([^"]*)" (?:file|folder|entry) "([^"]*)" should exist in trash$/
	 *
	 * @param string $user
	 * @param string $path
	 * @param string $requestingUser
	 *
	 * @return void
	 */
	public function asFileOrFolderExistsInTrash($user, $path, $requestingUser = null) {
		if ($requestingUser === null) {
			$requestingUser = $user;
		}

		$path = \trim($path, '/');
		$sections = \explode('/', $path, 2);

		$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();

		$firstEntry = $this->findFirstTrashedEntry($user, \trim($sections[0], '/'));

		Assert::assertNotNull($firstEntry);

		if (\count($sections) !== 1) {
			// TODO: handle deeper structures
			$listing = $this->listTrashbinFolder($user, \basename(\rtrim($firstEntry['href'], '/'), $requestingUser));
		}

		if ($techPreviewHadToBeEnabled) {
			$this->occContext->disableDAVTechPreview();
		}

		// query was on the main element ?
		if (\count($sections) === 1) {
			// already found, return
			return;
		}

		$checkedName = \basename($path);

		$found = false;
		foreach ($listing as $entry) {
			if ($entry['name'] === $checkedName) {
				$found = true;
				break;
			}
		}

		Assert::assertTrue($found);
	}

	/**
	 * Function to check if an element is in trashbin
	 *
	 * @param string $user
	 * @param string $originalPath
	 *
	 * @return bool
	 */
	private function isInTrash($user, $originalPath) {
		$techPreviewHadToBeEnabled = $this->occContext->enableDAVTechPreview();
		$listing = $this->listTrashbinFolder($user, null);
		if ($techPreviewHadToBeEnabled) {
			$this->occContext->disableDAVTechPreview();
		}
		$originalPath = \trim($originalPath, '/');

		foreach ($listing as $entry) {
			if ($entry['original-location'] === $originalPath) {
				return true;
			}
		}
		return false;
	}

	/**
	 * @param string $user
	 * @param string $trashItemHRef
	 * @param string $destinationPath
	 *
	 * @return void
	 */
	private function sendUndeleteRequest($user, $trashItemHRef, $destinationPath) {
		$destinationPath = \trim($destinationPath, '/');
		$destinationValue = $this->featureContext->getBaseUrl() . "/remote.php/dav/files/$user/$destinationPath";

		$trashItemHRef = $this->convertTrashbinHref($trashItemHRef);
		$headers['Destination'] = $destinationValue;
		$response = $this->featureContext->makeDavRequest(
			$user, 'MOVE', $trashItemHRef, $headers, null, 'trash-bin', null, 2
		);
		$this->featureContext->setResponse($response);
	}

	/**
	 * @param string $user
	 * @param string $originalPath
	 * @param string $destinationPath
	 * @param bool $throwExceptionIfNotFound
	 *
	 * @return void
	 * @throws Exception
	 */
	private function restoreElement($user, $originalPath, $destinationPath = null, $throwExceptionIfNotFound = true) {
		$listing = $this->listTrashbinFolder($user, null);
		$originalPath = \trim($originalPath, '/');
		if ($destinationPath === null) {
			$destinationPath = $originalPath;
		}
		foreach ($listing as $entry) {
			if ($entry['original-location'] === $originalPath) {
				$this->sendUndeleteRequest(
					$user,
					$entry['href'],
					$destinationPath
				);
				return;
			}
		}
		// The requested element to restore was not even in the trashbin.
		// Throw an exception, because there was not any API call, and so there
		// is also no up-to-date response to examine in later test steps.
		if ($throwExceptionIfNotFound) {
			throw new \Exception(
				__METHOD__
				. " cannot restore from trashbin because no element was found for user $user at original path $originalPath"
			);
		}
	}

	/**
	 * @Then /^the content of file "([^"]*)" for user "([^"]*)" if the file is also in the trashbin should be "([^"]*)" otherwise "([^"]*)"$/
	 *
	 * Note: this is a special step for an unusual bug combination.
	 *       Delete it when the bug is fixed and the step is no longer needed.
	 *
	 * @param string $fileName
	 * @param string $user
	 * @param string $content
	 * @param string $alternativeContent
	 *
	 * @return void
	 */
	public function contentOfFileForUserIfAlsoInTrashShouldBeOtherwise(
		$fileName, $user, $content, $alternativeContent
	) {
		$this->featureContext->downloadFileAsUserUsingPassword($user, $fileName);
		if ($this->isInTrash($user, $fileName)) {
			$this->featureContext->downloadedContentShouldBe($content);
		} else {
			$this->featureContext->downloadedContentShouldBe($alternativeContent);
		}
	}

	/**
	 * @When /^user "([^"]*)" tries to restore the (?:file|folder|entry) with original path "([^"]*)" using the trashbin API$/
	 *
	 * @param string $user
	 * @param string $originalPath
	 *
	 * @return void
	 */
	public function userTriesToRestoreElementInTrash($user, $originalPath) {
		$this->restoreElement($user, $originalPath, null, false);
	}

	/**
	 * @When /^user "([^"]*)" restores the (?:file|folder|entry) with original path "([^"]*)" using the trashbin API$/
	 * @Given /^user "([^"]*)" has restored the (?:file|folder|entry) with original path "([^"]*)"$/
	 *
	 * @param string $user
	 * @param string $originalPath
	 *
	 * @return void
	 */
	public function elementInTrashIsRestored($user, $originalPath) {
		$this->restoreElement($user, $originalPath);
		Assert::assertFalse(
			$this->isInTrash($user, $originalPath),
			"File previously located at $originalPath is still in the trashbin"
		);
	}

	/**
	 * @When /^user "([^"]*)" restores the (?:file|folder|entry) with original path "([^"]*)" to "([^"]*)" using the trashbin API$/
	 *
	 * @param string $user
	 * @param string $originalPath
	 * @param string $destinationPath
	 *
	 * @return void
	 */
	public function userRestoresTheFileWithOriginalPathToUsingTheTrashbinApi(
		$user, $originalPath, $destinationPath
	) {
		$this->restoreElement($user, $originalPath, $destinationPath);
	}

	/**
	 * @Then /^as "([^"]*)" the (?:file|folder|entry) with original path "([^"]*)" should exist in trash$/
	 *
	 * @param string $user
	 * @param string $originalPath
	 *
	 * @return void
	 */
	public function elementIsInTrashCheckingOriginalPath(
		$user, $originalPath
	) {
		Assert::assertTrue(
			$this->isInTrash($user, $originalPath),
			"File previously located at $originalPath wasn't found in the trashbin"
		);
	}

	/**
	 * @Then /^as "([^"]*)" the (?:file|folder|entry) with original path "([^"]*)" should not exist in trash$/
	 *
	 * @param string $user
	 * @param string $originalPath
	 *
	 * @return void
	 */
	public function elementIsNotInTrashCheckingOriginalPath(
		$user, $originalPath
	) {
		Assert::assertFalse(
			$this->isInTrash($user, $originalPath),
			"File previously located at $originalPath was found in the trashbin"
		);
	}

	/**
	 * Finds the first trashed entry matching the given name
	 *
	 * @param string $user
	 * @param string $name
	 *
	 * @return string|null real entry name with timestamp suffix or null if not found
	 */
	private function findFirstTrashedEntry($user, $name) {
		$listing = $this->listTrashbinFolder($user, '/');

		foreach ($listing as $entry) {
			if ($entry['name'] === $name) {
				return $entry;
			}
		}

		return null;
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
		$this->occContext = $environment->getContext('OccContext');
	}
}
