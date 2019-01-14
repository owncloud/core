<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

require_once 'bootstrap.php';

/**
 * Steps that relate to transferring ownership
 */
class TransferOwnershipContext implements Context {
	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	private $lastTransferPath;

	/**
	 * @return string
	 */
	public function getLastTransferPath() {
		return $this->lastTransferPath;
	}

	/**
	 * @param string $lastTransferPath
	 *
	 * @return void
	 */
	public function setLastTransferPath($lastTransferPath) {
		$this->lastTransferPath = $lastTransferPath;
	}

	/**
	 * @When /^the administrator transfers ownership from "([^"]+)" to "([^"]+)" using the occ command$/
	 * @Given /^the administrator has transferred ownership from "([^"]+)" to "([^"]+)"$/
	 *
	 * @param string $user1
	 * @param string $user2
	 *
	 * @return void
	 */
	public function transferringOwnership($user1, $user2) {
		if ($this->featureContext->runOcc(['files:transfer-ownership', $user1, $user2]) === 0) {
			$this->lastTransferPath
				= $this->featureContext->findLastTransferFolderForUser($user1, $user2);
		} else {
			// failure
			$this->lastTransferPath = null;
		}
	}

	/**
	 * @When /^the administrator transfers ownership of path "([^"]+)" from "([^"]+)" to "([^"]+)" using the occ command$/
	 * @Given /^the administrator has transferred ownership of path "([^"]+)" from "([^"]+)" to "([^"]+)"$/
	 *
	 * @param string $path
	 * @param string $user1
	 * @param string $user2
	 *
	 * @return void
	 */
	public function transferringOwnershipPath($path, $user1, $user2) {
		$path = "--path=$path";
		if ($this->featureContext->runOcc(['files:transfer-ownership', $path, $user1, $user2]) === 0) {
			$this->lastTransferPath
				= $this->featureContext->findLastTransferFolderForUser($user1, $user2);
		} else {
			// failure
			$this->lastTransferPath = null;
		}
	}

	/**
	 * @Then /^the downloaded content when downloading file "([^"]*)" for user "([^"]*)" with range "([^"]*)" from the last received transfer folder should be "([^"]*)"$/
	 *
	 * @param string $fileSource
	 * @param string $user
	 * @param string $range
	 * @param string $content
	 *
	 * @return void
	 */
	public function downloadedContentWhenDownloadingForUserWithRangeShouldBe(
		$fileSource, $user, $range, $content
	) {
		$fileSource = $this->getLastTransferPath() . $fileSource;
		$this->featureContext->downloadedContentWhenDownloadingForUserWithRangeShouldBe(
			$fileSource, $user, $range, $content
		);
	}

	/**
	 * @Then /^as "([^"]*)" (file|folder|entry) "([^"]*)" should not exist in the last received transfer folder$/
	 *
	 * @param string $user
	 * @param string $entry
	 * @param string $path
	 *
	 * @return array
	 * @throws \Exception
	 */
	public function asFileOrFolderShouldNotExist($user, $entry, $path) {
		//the entry in the folder should not exist
		//but the last received transfer folder itself should exist
		//that would help against snakeoil tests if testing a non-existing folder
		$this->featureContext->asFileOrFolderShouldExist(
			$user, $entry, $this->getLastTransferPath()
		);
		$path = $this->getLastTransferPath() . $path;
		return $this->featureContext->asFileOrFolderShouldNotExist(
			$user, $entry, $path
		);
	}

	/**
	 * @Then /^as "([^"]*)" (file|folder|entry) "([^"]*)" should exist in the last received transfer folder$/
	 *
	 * @param string $user
	 * @param string $entry
	 * @param string $path
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function asFileOrFolderShouldExist($user, $entry, $path) {
		$path = $this->getLastTransferPath() . $path;
		$this->featureContext->asFileOrFolderShouldExist(
			$user, $entry, $path
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
	public function before(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}
