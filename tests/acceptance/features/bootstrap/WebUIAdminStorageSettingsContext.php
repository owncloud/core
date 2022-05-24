<?php declare(strict_types=1);

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
use PHPUnit\Framework\Assert;
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
	 * @throws Exception
	 */
	public function theAdministratorHasBrowsedToTheAdminStorageSettingsPage():void {
		$this->webUIGeneralContext->adminLogsInUsingTheWebUI();
		$this->adminStorageSettingsPage->open();
		$this->adminStorageSettingsPage->waitTillPageIsLoaded($this->getSession());
		$this->webUIGeneralContext->setCurrentPageObject($this->adminStorageSettingsPage);
	}

	/**
	 * @When the administrator enables the external storage using the webUI
	 *
	 * @return void
	 */
	public function theAdministratorEnablesTheExternalStorageUsingTheWebui():void {
		$this->adminStorageSettingsPage->enableExternalStorage(
			$this->getSession()
		);
	}

	/**
	 * @When the administrator disables the external storage using the webUI
	 *
	 * @return void
	 */
	public function theAdministratorDisablesTheExternalStorageUsingTheWebui():void {
		$this->adminStorageSettingsPage->disableExternalStorage(
			$this->getSession()
		);
	}

	/**
	 * @param string $mount
	 *
	 * @return void
	 * @throws Exception
	 */
	public function createLocalStorageMountUsingTheWebui(string $mount):void {
		$serverRoot = SetupHelper::getServerRoot(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->featureContext->getStepLineRef()
		);
		$mountPath = TEMPORARY_STORAGE_DIR_ON_REMOTE_SERVER . "/$mount";
		SetupHelper::mkDirOnServer(
			$mountPath,
			$this->featureContext->getStepLineRef()
		);
		$dirLocation = $serverRoot . '/' . $mountPath;
		$this->adminStorageSettingsPage->addLocalStorageMount(
			$this->getSession(),
			$mount,
			$dirLocation
		);
		$storageIds = $this->featureContext->getStorageIds();
		\end($storageIds);
		$lastMountId = \key($storageIds);
		$this->featureContext->addStorageId($mount, $lastMountId + 1);
	}

	/**
	 * @When the administrator creates the local storage mount :mount using the webUI
	 *
	 * @param string $mount
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorCreatesTheLocalStorageMountUsingTheWebui(string $mount):void {
		$this->createLocalStorageMountUsingTheWebui($mount);
	}

	/**
	 * @Given the administrator has created the local storage mount :mount from the admin storage settings page
	 *
	 * @param string $mount
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theAdministratorHasCreatedTheLocalStorageMountUsingTheWebui(string $mount):void {
		$this->createLocalStorageMountUsingTheWebui($mount);
		$this->featureContext->asFileOrFolderShouldExist($this->featureContext->getAdminUsername(), "folder", $mount);
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
	 * @throws Exception
	 */
	public function theAdministratorAddsUserAsTheApplicableUserForTheLastLocalStorageMountUsingTheWebui(
		string $action,
		string $userOrGroup,
		string $user
	):void {
		$user = $this->featureContext->getActualUsername($user);
		$displayName = $this->featureContext->getUserDisplayName($user);
		if ($action === "adds" || $action === "added") {
			$this->adminStorageSettingsPage->addApplicableToLastMount(
				$this->getSession(),
				$displayName
			);
		} else {
			if ($userOrGroup === "group") {
				$displayName = $displayName . " (group)";
			}
			$this->adminStorageSettingsPage->removeApplicableFromLastMount(
				$this->getSession(),
				$displayName
			);
		}
	}

	/**
	 * @When the administrator deletes the last created local storage mount using the webUI
	 *
	 * @return void
	 */
	public function theAdministratorDeletesTheLastCreatedLocalStorageMountUsingTheWebui():void {
		$this->adminStorageSettingsPage->deleteLastCreatedLocalMount($this->getSession());
	}

	/**
	 * @Given the administrator has enabled read-only for the last created local storage mount using the webUI
	 * @When the administrator enables read-only for the last created local storage mount using the webUI
	 *
	 * @return void
	 */
	public function theAdministratorEnablesReadonlyForTheLastCreatedLocalStorageMountUsingTheWebui():void {
		$this->adminStorageSettingsPage->openMountOptions($this->getSession());
		$this->adminStorageSettingsPage->enableReadonlyMountOption($this->getSession());
		$this->adminStorageSettingsPage->openMountOptions($this->getSession());
	}

	/**
	 * @Given the administrator has enabled sharing for the last created local storage mount using the webUI
	 *
	 * @return void
	 */
	public function theAdministratorHasEnabledSharingForTheLastCreatedLocalStorageMountUsingTheWebui():void {
		$this->adminStorageSettingsPage->openMountOptions($this->getSession());
		$this->adminStorageSettingsPage->enableSharingMountOption($this->getSession());
		$this->adminStorageSettingsPage->openMountOptions($this->getSession());
	}

	/**
	 * @Then /^the last created local storage mount should (not|)\s?be listed on the webUI$/
	 *
	 * @param string $shouldOrNot
	 *
	 * @return void
	 */
	public function theLastCreatedLocalStorageMountShouldOrNotBeListedOnTheWebui(string $shouldOrNot):void {
		$mountNameList = $this->featureContext->getStorageIds();
		$lastCreatedMountName = \end($mountNameList);
		$result = $this->adminStorageSettingsPage->checkIfLastCreatedMountIsPresent(
			$lastCreatedMountName
		);
		$should = ($shouldOrNot !== "not");
		if ($should) {
			Assert::assertTrue(
				$result,
				"Last created mount was expected to be present but was not"
			);
		} else {
			Assert::assertFalse(
				$result,
				"Last created mount was not expected to be present but was"
			);
		}
	}

	/**
	 * @Then the external storage form should be displayed on the storage settings page
	 *
	 * @return void
	 */
	public function theExternalStorageFormShouldBeOnTheStorageSettingsPage():void {
		$isDisplayed = $this->adminStorageSettingsPage->externalStorageFormVisible();
		Assert::assertTrue(
			$isDisplayed,
			"External storage is expected to be visible but is not"
		);
	}

	/**
	 * @Then the external storage form should not be displayed on the storage settings page
	 *
	 * @return void
	 */
	public function theExternalStorageFormShouldNotBeOnTheStorageSettingsPage():void {
		$isDisplayed = $this->adminStorageSettingsPage->externalStorageFormVisible();
		Assert::assertFalse(
			$isDisplayed,
			"External storage is not expected to be visible but is"
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
	public function before(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->webUIGeneralContext = $environment->getContext('WebUIGeneralContext');
		$this->featureContext = $environment->getContext('FeatureContext');
	}
}
