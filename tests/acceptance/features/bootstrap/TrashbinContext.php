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
	 * @When user :user empties the trashbin using the trashbin API
	 * @Given user :user has emptied the trashbin
	 *
	 * @param string $user user
	 *
	 * @return void
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

		PHPUnit\Framework\Assert::assertEquals(
			204, $response->getStatusCode()
		);
	}

	/**
	 * List trashbin folder
	 *
	 * @param string $user user
	 * @param string $path path
	 *
	 * @return array response
	 */
	public function listTrashbinFolder($user, $path) {
		$path = $path ?? '/';
		$responseXml = WebDavHelper::listFolder(
			$this->featureContext->getBaseUrl(),
			$user,
			$this->featureContext->getPasswordForUser($user),
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
	 * @Then /^as "([^"]*)" (?:file|folder|entry) "([^"]*)" should exist in trash$/
	 *
	 * @param string $user
	 * @param string $path
	 *
	 * @return void
	 */
	public function asFileOrFolderExistsInTrash($user, $path) {
		$path = \trim($path, '/');
		$sections = \explode('/', $path, 2);

		$firstEntry = $this->findFirstTrashedEntry($user, \trim($sections[0], '/'));

		PHPUnit\Framework\Assert::assertNotNull($firstEntry);

		// query was on the main element ?
		if (\count($sections) === 1) {
			// already found, return
			return;
		}

		// TODO: handle deeper structures
		$listing = $this->listTrashbinFolder($user, \basename(\rtrim($firstEntry['href'], '/')));
		$checkedName = \basename($path);

		$found = false;
		foreach ($listing as $entry) {
			if ($entry['name'] === $checkedName) {
				$found = true;
				break;
			}
		}

		PHPUnit\Framework\Assert::assertTrue($found);
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
		$listing = $this->listTrashbinFolder($user, null);
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
	 * @param string $originalLocation
	 *
	 * @return void
	 */
	private function sendUndeleteRequest($user, $trashItemHRef, $originalLocation) {
		$destinationValue = $this->featureContext->getBaseUrl() . "/remote.php/dav/files/$user/$originalLocation";

		$trashItemHRef = \substr($trashItemHRef, 15);
		$headers['Destination'] = $destinationValue;
		$response = $this->featureContext->makeDavRequest(
			$user, 'MOVE', $trashItemHRef, $headers, null, 'trash-bin', null, 2
		);
		PHPUnit\Framework\Assert::assertEquals(
			201, $response->getStatusCode()
		);
	}

	/**
	 * @param string $user
	 * @param string $originalPath
	 *
	 * @return void
	 */
	private function restoreElement($user, $originalPath) {
		$listing = $this->listTrashbinFolder($user, null);
		$originalPath = \trim($originalPath, '/');

		foreach ($listing as $entry) {
			if ($entry['original-location'] === $originalPath) {
				$this->sendUndeleteRequest(
					$user,
					$entry['href'],
					$entry['original-location']
				);
				break;
			}
		}
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
		PHPUnit\Framework\Assert::assertFalse(
			$this->isInTrash($user, $originalPath),
			"File previously located at $originalPath is still in the trashbin"
		);
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
		PHPUnit\Framework\Assert::assertTrue(
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
		PHPUnit\Framework\Assert::assertFalse(
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
	}
}
