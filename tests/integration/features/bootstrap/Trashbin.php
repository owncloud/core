<?php
/**
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH.
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

require __DIR__ . '/../../../../lib/composer/autoload.php';

/**
 * Trashbin functions
 */
trait Trashbin {

	/**
	 * @When user :user empties the trashbin
	 * @param string $user user
	 */
	public function emptyTrashbin($user) {
		$this->asAn($user);
		$body = new \Behat\Gherkin\Node\TableNode([['allfiles', 'true'], ['dir', '%2F']]);
		$this->sendingToWithDirectUrl('POST', "/index.php/apps/files_trashbin/ajax/delete.php", $body);
		$this->theHTTPStatusCodeShouldBe('200');
	}

	/**
	 * List trashbin folder
	 *
	 * @param string $user user
	 * @param string $path path
	 * @return array response
	 */
	public function listTrashbinFolder($user, $path) {
		$this->asAn($user);
		$params = '?dir=' . rawurlencode('/' . trim($path, '/'));
		$this->sendingToWithDirectUrl('GET', '/index.php/apps/files_trashbin/ajax/list.php' . $params, null);
		$this->theHTTPStatusCodeShouldBe('200');


		$decodedResponse = json_decode($this->response->getBody(), true);

		return $decodedResponse['data']['files'];
	}

	/**
	 * @Then /^as "([^"]*)" the (file|folder|entry) "([^"]*)" exists in trash$/
	 * @param string $user
	 * @param string $entryText
	 * @param string $path
	 */
	public function asTheFileOrFolderExistsInTrash($user, $entryText, $path) {
		$path = trim($path, '/');
		$sections = explode('/', $path, 2);

		$firstEntry = $this->findFirstTrashedEntry($user, trim($sections[0], '/'));

		PHPUnit_Framework_Assert::assertNotNull($firstEntry);

		// query was on the main element ?
		if (count($sections) === 1) {
			// already found, return
			return;
		}

		$subdir = trim(dirname($sections[1]), '/');
		if ($subdir !== '' && $subdir !== '.') {
			$subdir = $firstEntry . '/' . $subdir;
		} else {
			$subdir = $firstEntry;
		}

		$listing = $this->listTrashbinFolder($user, $subdir);
		$checkedName = basename($path);

		$found = false;
		foreach ($listing as $entry) {
			if ($entry['name'] === $checkedName) {
				$found = true;
				break;
			}
		}

		PHPUnit_Framework_Assert::assertTrue($found);
	}

	/*Function to check if an element is in trashbin*/
	private function isInTrash($user, $originalPath) {
		$listing = $this->listTrashbinFolder($user, null);
		$originalPath = trim($originalPath, '/');

		$found = false;
		foreach ($listing as $entry) {
			if ( substr($entry['extraData'], 0, 2) === "./" ) {
				$entry['extraData'] = substr($entry['extraData'], 2);
			}
			if ($entry['extraData'] === $originalPath) {
				$found = true;
				break;
			}
		}
		return $found;
	}

	private function sendUndeleteRequest($user, $elementTrashID) {
		$this->asAn($user);
		$body = new \Behat\Gherkin\Node\TableNode([['files',  "[\"$elementTrashID\"]"], ['dir', '/']]);
		$this->sendingToWithDirectUrl('POST', "/index.php/apps/files_trashbin/ajax/undelete.php", $body);
		$this->theHTTPStatusCodeShouldBe('200');
	}

	private function restoreElement($user, $originalPath) {
		$listing = $this->listTrashbinFolder($user, null);
		$originalPath = trim($originalPath, '/');

		foreach ($listing as $entry) {
			if ( substr($entry['extraData'], 0, 2) === "./" ) {
				$entry['extraData'] = substr($entry['extraData'], 2);
			}
			if ($entry['extraData'] === $originalPath) {
				$this->sendUndeleteRequest($user, $entry['name'] . '.d' . floor((integer)$entry['mtime']/1000));
				break;
			}
		}
	}

	/**
	 * @Given /^as "([^"]*)" the (file|folder|entry) with original path "([^"]*)" is restored$/
	 * @param string $user
	 * @param string $entryText
	 * @param string $originalPath
	 */
	public function elementInTrashIsRestored($user, $entryText, $originalPath) {
		$this->restoreElement($user, $originalPath);
		PHPUnit_Framework_Assert::assertFalse($this->isInTrash($user, $originalPath),
											"File previously located at $originalPath is still in the trashbin");
	}

	/**
	 * @Then /^as "([^"]*)" the (file|folder|entry) with original path "([^"]*)" exists in trash$/
	 * @param string $user
	 * @param string $entryText
	 * @param string $originalPath
	 */
	public function elementIsInTrashCheckingOriginalPath($user, $entryText, $originalPath) {
		PHPUnit_Framework_Assert::assertTrue($this->isInTrash($user, $originalPath),
											"File previously located at $originalPath wasn't found in the trashbin");
	}

	/**
	 * @Then /^as "([^"]*)" the (file|folder|entry) with original path "([^"]*)" does not exist in trash$/
	 * @param string $user
	 * @param string $entryText
	 * @param string $originalPath
	 */
	public function elementIsNotInTrashCheckingOriginalPath($user, $entryText, $originalPath) {
		PHPUnit_Framework_Assert::assertFalse($this->isInTrash($user, $entryText, $originalPath), 
											"File previously located at $originalPath was found in the trashbin");
	}

	/**
	 * Finds the first trashed entry matching the given name
	 *
	 * @param string $name
	 * @return string|null real entry name with timestamp suffix or null if not found
	 */
	private function findFirstTrashedEntry($user, $name) {
		$listing = $this->listTrashbinFolder($user, '/');

		foreach ($listing as $entry) {
			if ($entry['name'] === $name) {
				return $entry['name'] . '.d' . ((int)$entry['mtime'] / 1000);
			}
		}

		return null;
	}
}

