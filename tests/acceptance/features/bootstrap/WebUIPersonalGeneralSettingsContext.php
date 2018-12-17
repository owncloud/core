<?php
/**
 * ownCloud
 *
 * @author Artur Neumann <artur@jankaritech.com>
 * @copyright Copyright (c) 2017 Artur Neumann artur@jankaritech.com
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
use Page\PersonalGeneralSettingsPage;
use TestHelpers\EmailHelper;

require_once 'bootstrap.php';

/**
 * WebUI PersonalGeneralSettings context.
 */
class WebUIPersonalGeneralSettingsContext extends RawMinkContext implements Context {
	private $personalGeneralSettingsPage;

	/**
	 *
	 * @var FeatureContext
	 */
	private $featureContext;

	/**
	 *
	 * @var WebUIGeneralContext
	 */
	private $webUIGeneralContext;

	/**
	 * WebUIPersonalGeneralSettingsContext constructor.
	 *
	 * @param PersonalGeneralSettingsPage $personalGeneralSettingsPage
	 */
	public function __construct(
		PersonalGeneralSettingsPage$personalGeneralSettingsPage
	) {
		$this->personalGeneralSettingsPage = $personalGeneralSettingsPage;
	}

	/**
	 * @When the user browses to the personal general settings page
	 * @Given the user has browsed to the personal general settings page
	 *
	 * @return void
	 */
	public function theUserBrowsesToThePersonalGeneralSettingsPage() {
		$this->personalGeneralSettingsPage->open();
		$this->personalGeneralSettingsPage->waitTillPageIsLoaded(
			$this->getSession()
		);
		$this->webUIGeneralContext->setCurrentPageObject(
			$this->personalGeneralSettingsPage
		);
	}

	/**
	 * Browse to the personal general settings page, but do not test or fail
	 * if the expected page is not actually reached.
	 *
	 * @When /^the user attempts to browse to the personal general settings page$/
	 * @Given /^the user has attempted to browse to the personal general settings page$/
	 *
	 * @return void
	 */
	public function theUserAttemptsToBrowseToThePersonalGeneralSettingsPage() {
		$this->visitPath($this->personalGeneralSettingsPage->getPagePath());

		$this->personalGeneralSettingsPage->waitForOutstandingAjaxCalls(
			$this->getSession()
		);
	}

	/**
	 * @When the user changes the language to :language using the webUI
	 * @Given the user has changed the language to :language using the webUI
	 *
	 * @param string $language
	 *
	 * @return void
	 */
	public function theUserChangesTheLanguageToUsingTheWebUI($language) {
		$this->personalGeneralSettingsPage->changeLanguage($language);
		$this->personalGeneralSettingsPage->waitForOutstandingAjaxCalls(
			$this->getSession()
		);
	}

	/**
	 * @When the user changes the password to :newPassword using the webUI
	 * @Given the user has changed the password to :newPassword using the webUI
	 *
	 * @param string $newPassword
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserChangesThePasswordToUsingTheWebUI($newPassword) {
		$username = $this->featureContext->getCurrentUser();
		$oldPassword = \trim($this->featureContext->getUserPassword($username));
		$newPassword = $this->featureContext->getActualPassword($newPassword);
		$this->personalGeneralSettingsPage->changePassword(
			$oldPassword, $newPassword, $this->getSession()
		);
	}
	
	/**
	 * @When the user changes the password to :newPassword entering the wrong current password :wrongPassword using the webUI
	 * @Given the user has changed the password to :newPassword entering the wrong current password :wrongPassword using the webUI
	 *
	 * @param string $newPassword
	 * @param string $wrongPassword
	 *
	 * @return void
	 */
	public function theUserChangesThePasswordWrongCurrentPasswordUsingTheWebUI(
		$newPassword, $wrongPassword
	) {
		$newPassword = $this->featureContext->getActualPassword($newPassword);
		$wrongPassword = $this->featureContext->getActualPassword($wrongPassword);
		$this->personalGeneralSettingsPage->changePassword(
			$wrongPassword, $newPassword, $this->getSession()
		);
	}

	/**
	 * @When the user changes the full name to :newFullname using the webUI
	 * @Given the user has changed the full name to :newFullname using the webUI
	 *
	 * @param string $newFullname
	 *
	 * @return void
	 */
	public function theUserChangesTheFullnameToUsingTheWebUI($newFullname) {
		$this->personalGeneralSettingsPage->changeFullname(
			$newFullname, $this->getSession()
		);
	}

	/**
	 * @When the user changes the email address to :emailAddress using the webUI
	 * @Given the user has changed the email address to :emailAddress using the webUI
	 *
	 * @param string $emailAddress
	 *
	 * @return void
	 */
	public function theUserChangesTheEmailAddressToUsingTheWebUI($emailAddress) {
		$this->personalGeneralSettingsPage->changeEmailAddress(
			$emailAddress, $this->getSession()
		);
	}

	/**
	 * @Then the owncloud version should be displayed on the personal general settings page in the webUI
	 *
	 * @return void
	 */
	public function theOwncloudVersionShouldBeDisplayedOnThePersonalGeneralSettingsPageInTheWebui() {
		PHPUnit_Framework_Assert::assertTrue($this->personalGeneralSettingsPage->isVersionDisplayed());
	}

	/**
	 * @Then the federated cloud id for user :user should be displayed on the personal general settings page in the webUI
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function theFederatedCloudIdForUserShouldBeDisplayedOnThePersonalGeneralSettingsPageInTheWebui($user) {
		$userFederatedCloudId = $user . "@" . $this->featureContext->getLocalBaseUrlWithoutScheme();
		PHPUnit_Framework_Assert::assertEquals($this->personalGeneralSettingsPage->getFederatedCloudID(), $userFederatedCloudId);
	}

	/**
	 * @Then group :groupName should be displayed on the personal general settings page in the webUI
	 *
	 * @param string $groupName
	 *
	 * @return void
	 */
	public function groupShouldBeDisplayedOnThePersonalGeneralSettingsPageInTheWebui($groupName) {
		PHPUnit_Framework_Assert::assertTrue($this->personalGeneralSettingsPage->isGroupNameDisplayed($groupName));
	}

	/**
	 * @When the user follows the email change confirmation link received by :emailAddress using the webUI
	 * @Given the user has followed the email change confirmation link received by :emailAddress using the webUI
	 *
	 * @param string $emailAddress
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function theUserFollowsTheEmailChangeConfirmationLinkEmail($emailAddress) {
		$content = EmailHelper::getBodyOfLastEmail(
			EmailHelper::getLocalMailhogUrl(), $emailAddress
		);
		$matches = [];
		\preg_match(
			'/Use the following link to confirm your changes to the email address: (http.*)/',
			$content, $matches
		);
		PHPUnit_Framework_Assert::assertArrayHasKey(
			1, $matches,
			"Couldn't find confirmation link in the email"
		);
		$this->visitPath($matches[1]);
	}

	/**
	 * @Then a password error message should be displayed on the webUI with the text :wrongPasswordmessageText
	 *
	 * @param string $wrongPasswordmessageText
	 *
	 * @return void
	 */
	public function aPasswordErrorMessageShouldBeDisplayedOnTheWebUIWithTheText(
		$wrongPasswordmessageText
	) {
		PHPUnit_Framework_Assert::assertEquals(
			$wrongPasswordmessageText,
			$this->personalGeneralSettingsPage->getWrongPasswordMessageText()
		);
	}

	/**
	 * @When the user sets profile picture to :filename from their cloud files using the webUI
	 *
	 * @param string $filename
	 *
	 * @return void
	 */
	public function theUserSetsProfilePictureToFromTheirCloudFiles($filename) {
		$this->personalGeneralSettingsPage->setProfilePicture($filename, $this->getSession());
	}

	/**
	 * @Given the user has set profile picture to :filename from their cloud files
	 *
	 * @param string $filename
	 *
	 * @return void
	 */
	public function theUserHasSetProfilePictureToFromTheirCloudFiles($filename) {
		$this->theUserSetsProfilePictureToFromTheirCloudFiles($filename);
		$this->thePreviewOfTheProfilePictureShouldBeShownInTheWebui("");
	}

	/**
	 * @Then /^the preview of the profile picture should (not|)\s?be shown in the webUI$/
	 *
	 * @param string $shouldOrNot
	 *
	 * @return void
	 */
	public function thePreviewOfTheProfilePictureShouldBeShownInTheWebui($shouldOrNot) {
		if ($shouldOrNot !== "not") {
			PHPUnit_Framework_Assert::assertTrue(
				$this->personalGeneralSettingsPage->isProfilePicturePreviewDisplayed()
			);
		} else {
			PHPUnit_Framework_Assert::assertFalse(
				$this->personalGeneralSettingsPage->isProfilePicturePreviewDisplayed()
			);
		}
	}

	/**
	 * @When the user deletes the existing profile picture
	 *
	 * @return void
	 */
	public function theUserDeletesTheExistingProfilePicture() {
		if ($this->personalGeneralSettingsPage->isProfilePicturePreviewDisplayed()) {
			$this->personalGeneralSettingsPage->deleteProfilePicture($this->getSession());
		}
	}

	/**
	 * @Given the user has deleted any existing profile picture
	 *
	 * @return void
	 */
	public function theUserHasDeletedAnyExistingProfilePicture() {
		$this->theUserDeletesTheExistingProfilePicture();
		PHPUnit_Framework_Assert::assertFalse(
			$this->personalGeneralSettingsPage->isProfilePicturePreviewDisplayed()
		);
	}

	/**
	 * @When the user uploads :fileName as a new profile picture using the webUI
	 *
	 * @param string $fileName
	 *
	 * @return void
	 */
	public function theUserUploadsAsANewProfilePicture($fileName) {
		$this->personalGeneralSettingsPage->uploadProfilePicture($this->getSession(), $fileName);
	}

	/**
	 * @When the user selects :fileName for uploading as a profile picture using the WebUI
	 *
	 * @param string $fileName
	 *
	 * @return void
	 */
	public function theUserSelectsForUploadingAsAProfilePicture($fileName) {
		$this->personalGeneralSettingsPage->selectFileForUploadAsProfilePicture($this->getSession(), $fileName);
	}

	/**
	 * @Then /^the user should (not|)\s?be able to upload the selected file as the profile picture$/
	 *
	 * @param string $shouldOrNot
	 *
	 * @return void
	 */
	public function theUserShouldBeAbleToUploadTheFileAsTheProfilePicture($shouldOrNot) {
		if ($shouldOrNot !== "not") {
			PHPUnit_Framework_Assert::assertFalse(
				$this->personalGeneralSettingsPage->isFileUploadErrorMsgVisible()
			);
		} else {
			PHPUnit_Framework_Assert::assertTrue(
				$this->personalGeneralSettingsPage->isFileUploadErrorMsgVisible()
			);
		}
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
		$this->featureContext = $environment->getContext('FeatureContext');
		$this->webUIGeneralContext = $environment->getContext('WebUIGeneralContext');
	}
}
