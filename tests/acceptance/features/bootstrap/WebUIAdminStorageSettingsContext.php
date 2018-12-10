<?php

/**
 * ownCloud
 *
 * @author Paurakh Sharma Humagain <paurakh@jankaritech.com>
 * @copyright Copyright (c) 2018 Paurakh Sharma Humagain paurakh@jankaritech.com
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
use Behat\MinkExtension\Context\RawMinkContext;
use Page\AdminStorageSettingsPage;
use TestHelpers\SetupHelper;

require_once 'bootstrap.php';

/**
 * WebUI AdminStorageSettings context.
 */
class WebUIAdminStorageSettingsContext extends RawMinkContext implements Context {
	private $adminStorageSettingsPage;
	
	/**
	 *
	 * @var WebUIGeneralContext
	 */
	private $webUIGeneralContext;

	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 * WebUIAdminStorageSettingsContext constructor.
	 *
	 * @param AdminStorageSettingsPage $adminStorageSettingsPage
	 */
	public function __construct(
		AdminStorageSettingsPage $adminStorageSettingsPage
	) {
		$this->adminStorageSettingsPage = $adminStorageSettingsPage;
	}

	/**
	 * @Given the administrator has browsed to the admin storage settings page
	 * @When the administrator browses to the admin storage settings page
	 *
	 * @return void
	 */
	public function theAdministratorHasBrowsedToTheAdminStorageSettingsPage() {
		$this->webUIGeneralContext->adminLogsInUsingTheWebUI();
		$this->adminStorageSettingsPage->open();
		$this->adminStorageSettingsPage->waitTillPageIsLoaded($this->getSession());
		$this->webUIGeneralContext->setCurrentPageObject($this->adminStorageSettingsPage);
	}

	/**
	 * @When the administrator enables the external storage using the webUI
	 * @Given the administrator has enabled the external storage
	 *
	 * @return void
	 */
	public function theAdministratorEnablesTheExternalStorageUsingTheWebui() {
		$this->adminStorageSettingsPage->enableExternalStorage(
			$this->getSession()
		);
	}

	/**
	 * @When the administrator disables the external storage using the webUI
	 *
	 * @return void
	 */
	public function theAdministratorDisablesTheExternalStorageUsingTheWebui() {
		$this->adminStorageSettingsPage->disableExternalStorage(
			$this->getSession()
		);
	}

	/**
	 * @When the administrator creates the local storage mount :mount using the webUI
	 * @Given the administrator has created the local storage mount :mount from the admin storage settings page
	 *
	 * @param string $mount
	 *
	 * @return void
	 */
	public function theAdministratorCreatesTheLocalStorageMountUsingTheWebui($mount) {
		$serverRoot = SetupHelper::getServerRoot(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword()
		);
		$mountPath = TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER . "/$mount";
		SetupHelper::mkDirOnServer($mountPath);
		$dirLocation = $serverRoot . '/' . $mountPath;
		$this->adminStorageSettingsPage->addLocalStorageMount(
			$this->getSession(),
			$mount,
			$dirLocation
		);
		$storageIds = $this->featureContext->getStorageIds();
		$lastMount = \end($storageIds);
		$this->featureContext->addStorageId($mount, $lastMount + 1);
	}

	/**
	 * @When /^the administrator (adds|removes) (user|group) "([^"]*)" (?:as|from) the applicable (?:user|group) for the last local storage mount using the webUI$/
	 * @Given /^the administrator has (added|removed) (user|group) "([^"]*)" (?:as|from) the applicable (?:user|group) for the last local storage mount from the admin storage settings page$/
	 *
	 * @param string $action
	 * @param string $userOrGroup
	 * @param string $user
	 *
	 * @return void
	 */
	public function theAdministratorAddsUserAsTheApplicableUserForTheLastLocalStorageMountUsingTheUsingTheWebui(
		$action, $userOrGroup, $user
	) {
		$user = $this->featureContext->getUserDisplayName($user);
		if ($action === "adds" || $action === "added") {
			$this->adminStorageSettingsPage->addApplicableToLastMount(
				$this->getSession(),
				$user
			);
		} else {
			if ($userOrGroup === "group") {
				$user = $user . " (group)";
			}
			$this->adminStorageSettingsPage->removeApplicableFromLastMount(
				$this->getSession(),
				$user
			);
		}
	}

	/**
	 * @When the administrator deletes the last created local storage mount using the webUI
	 *
	 * @return void
	 */
	public function theAdministratorDeletesTheLastCreatedLocalStorageMountUsingTheWebui() {
		$this->adminStorageSettingsPage->deleteLastCreatedLocalMount($this->getSession());
	}

	/**
	 * @Then /^the last created local storage mount should (not|)\s?be listed on the webUI$/
	 *
	 * @param string $shouldOrNot
	 *
	 * @return void
	 */
	public function theLastCreatedLocalStorageMountShouldOrNotBeListedOnTheWebui($shouldOrNot) {
		$mountNameList = \array_keys($this->featureContext->getStorageIds());
		$lastCreatedMountName = \end($mountNameList);
		$result = $this->adminStorageSettingsPage->checkIfLastCreatedMountIsPresent(
			$lastCreatedMountName
		);
		$should = ($shouldOrNot !== "not");
		if ($should) {
			PHPUnit_Framework_Assert::assertTrue(
				$result, "Last created mount was expected to be present but was not"
			);
		} else {
			PHPUnit_Framework_Assert::assertFalse(
				$result, "Last created mount was not expected to be present but was"
			);
		}
	}

	/**
	 * @Then the external storage form should be displayed on the storage settings page
	 *
	 * @return void
	 */
	public function theExternalStorageFormShouldBeOnTheStorageSettingsPage() {
		$isDisplayed = $this->adminStorageSettingsPage->externalStorageFormVisible();
		PHPUnit_Framework_Assert::assertTrue(
			$isDisplayed, "External storage is expected to be visible but is not"
		);
	}

	/**
	 * @Then the external storage form should not be displayed on the storage settings page
	 *
	 * @return void
	 */
	public function theExternalStorageFormShouldNotBeOnTheStorageSettingsPage() {
		$isDisplayed = $this->adminStorageSettingsPage->externalStorageFormVisible();
		PHPUnit_Framework_Assert::assertFalse(
			$isDisplayed, "External storage is not expected to be visible but is"
		);
	}

	/**
	 * This will run before EVERY scenario.
	 * It will set the properties for this object.
	 *
	 * @BeforeScenario @webUI
	 *
	 * @param BeforeScenarioScope $scope
	 *
	 * @return void
	 */
	public function before(BeforeScenarioScope $scope) {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->webUIGeneralContext = $environment->getContext('WebUIGeneralContext');
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}
