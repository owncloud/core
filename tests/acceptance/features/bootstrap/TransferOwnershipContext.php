<?php declare(strict_types=1);
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

	/**
	 *
	 * @var OccContext
	 */
	private $occContext;

	private $lastTransferPath;

	/**
	 * @return string
	 */
	public function getLastTransferPath():string {
		return $this->lastTransferPath;
	}

	/**
	 * @param string $lastTransferPath
	 *
	 * @return void
	 */
	public function setLastTransferPath(string $lastTransferPath):void {
		$this->lastTransferPath = $lastTransferPath;
	}

	/**
	 * @param string $user1
	 * @param string $user2
	 *
	 * @return void
	 * @throws Exception
	 */
	public function transferringOwnership(string $user1, string $user2):void {
		$occStatusCode = $this->featureContext->runOcc(['files:transfer-ownership', $user1, $user2]);
		$this->featureContext->setOccLastCode($occStatusCode);
		if ($occStatusCode === 0) {
			$this->lastTransferPath
				= $this->featureContext->findLastTransferFolderForUser($user1, $user2);
		} else {
			// failure
			$this->lastTransferPath = null;
		}
	}

	/**
	 * @param string $type
	 *
	 * @return void
	 * @throws Exception
	 */
	public function troubleshootingTransferOwnership(string $type):void {
		$this->featureContext->setOccLastCode(
			$this->featureContext->runOcc(['files:troubleshoot-transfer-ownership', $type, '--fix'])
		);
	}

	/**
	 * @When /^the administrator transfers ownership from "([^"]+)" to "([^"]+)" using the occ command$/
	 *
	 * @param string $user1
	 * @param string $user2
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorTransfersOwnershipFromToUsingTheOccCommand(string $user1, string $user2):void {
		$user1 = $this->featureContext->getActualUsername($user1);
		$user2 = $this->featureContext->getActualUsername($user2);
		$this->transferringOwnership($user1, $user2);
	}

	/**
	 * @When /^the administrator troubleshoots transfer of ownerships for "([^"]+)" using the occ command$/
	 *
	 * @param string $type
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorTroubleshootsTransferOwnershipUsingTheOccCommand(string $type):void {
		$this->troubleshootingTransferOwnership($type);
		$this->occContext->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @Given /^the administrator has transferred ownership from "([^"]+)" to "([^"]+)"$/
	 *
	 * @param string $user1
	 * @param string $user2
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasTransferredOwnershipFromToUsingTheOccCommand(string $user1, string $user2):void {
		$this->transferringOwnership($user1, $user2);
		$this->occContext->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @param string $path
	 * @param string $user1
	 * @param string $user2
	 *
	 * @return void
	 * @throws Exception
	 */
	public function transferringOwnershipPath(string $path, string $user1, string $user2):void {
		$user1 = $this->featureContext->getActualUsername($user1);
		$user2 = $this->featureContext->getActualUsername($user2);
		$path = "--path=$path";
		$occStatusCode = $this->featureContext->runOcc(['files:transfer-ownership', $path, $user1, $user2]);
		$this->featureContext->setOccLastCode($occStatusCode);
		if ($occStatusCode === 0) {
			$this->lastTransferPath
				= $this->featureContext->findLastTransferFolderForUser($user1, $user2);
		} else {
			// failure
			$this->lastTransferPath = null;
		}
	}

	/**
	 * @When /^the administrator transfers ownership of path "([^"]+)" from "([^"]+)" to "([^"]+)" using the occ command$/
	 *
	 * @param string $path
	 * @param string $user1
	 * @param string $user2
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorTransfersOwnershipOfPathFromToUsingTheOccCommand(string $path, string $user1, string $user2):void {
		$this->transferringOwnershipPath(
			$path,
			$user1,
			$user2
		);
	}

	/**
	 * @Given /^the administrator has transferred ownership of path "([^"]+)" from "([^"]+)" to "([^"]+)"$/
	 *
	 * @param string $path
	 * @param string $user1
	 * @param string $user2
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasTransferredOwnershipOfPathFromToUsingTheOccCommand(string $path, string $user1, string $user2):void {
		$this->transferringOwnershipPath(
			$path,
			$user1,
			$user2
		);
		$this->occContext->theCommandShouldHaveBeenSuccessful();
	}

	/**
	 * @Then /^the downloaded content when downloading file "([^"]*)" for user "([^"]*)" from the last received transfer folder should be "([^"]*)"$/
	 *
	 * @param string $fileSource
	 * @param string $user
	 * @param string $content
	 *
	 * @return void
	 */
	public function downloadedContentWhenDownloadingForUserShouldBe(
		string $fileSource,
		string $user,
		string $content
	):void {
		$fileSource = $this->getLastTransferPath() . $fileSource;
		$this->featureContext->downloadedContentWhenDownloadingForUserWithRangeShouldBe(
			$fileSource,
			$user,
			"",
			$content
		);
	}

	/**
	 * @Then /^as "([^"]*)" (file|folder|entry) "([^"]*)" should not exist in the last received transfer folder$/
	 *
	 * @param string $user
	 * @param string $entry
	 * @param string $path
	 *
	 * @return void
	 * @throws Exception
	 */
	public function asFileOrFolderShouldNotExist(string $user, string $entry, string $path):void {
		$user = $this->featureContext->getActualUsername($user);
		//the entry in the folder should not exist
		//but the last received transfer folder itself should exist
		//that would help against snakeoil tests if testing a nonexistent folder
		$this->featureContext->asFileOrFolderShouldExist(
			$user,
			$entry,
			$this->getLastTransferPath()
		);
		$path = $this->getLastTransferPath() . $path;
		$this->featureContext->asFileOrFolderShouldNotExist(
			$user,
			$entry,
			$path
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
	 * @throws Exception
	 */
	public function asFileOrFolderShouldExist(string $user, string $entry, string $path):void {
		$path = $this->getLastTransferPath() . $path;
		$this->featureContext->asFileOrFolderShouldExist(
			$user,
			$entry,
			$path
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
		$this->occContext = $environment->getContext('OccContext');
	}
}
