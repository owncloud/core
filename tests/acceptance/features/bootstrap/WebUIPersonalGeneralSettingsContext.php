<?php declare(strict_types=1);
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
use PHPUnit\Framework\Assert;
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
		PersonalGeneralSettingsPage $personalGeneralSettingsPage
	) {
		$this->personalGeneralSettingsPage = $personalGeneralSettingsPage;
	}

	/**
	 * @When the user browses to the personal general settings page
	 * @Given the user has browsed to the personal general settings page
	 *
	 * @return void
	 */
	public function theUserBrowsesToThePersonalGeneralSettingsPage():void {
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
	public function theUserAttemptsToBrowseToThePersonalGeneralSettingsPage():void {
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
	public function theUserChangesTheLanguageToUsingTheWebUI(string $language):void {
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
	 * @throws Exception
	 */
	public function theUserChangesThePasswordToUsingTheWebUI(string $newPassword):void {
		$username = $this->featureContext->getCurrentUser();
		$oldPassword = \trim($this->featureContext->getUserPassword($username));
		$newPassword = $this->featureContext->getActualPassword($newPassword);
		$this->personalGeneralSettingsPage->changePassword(
			$oldPassword,
			$newPassword,
			$this->getSession()
		);
	}

	/**
	 * @When the user changes the password to the current password using the webUI
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserChangesThePasswordToCurrentPasswordUsingTheWebUI():void {
		$username = $this->featureContext->getCurrentUser();
		$currentPassword = \trim($this->featureContext->getUserPassword($username));
		$this->personalGeneralSettingsPage->changePassword(
			$currentPassword,
			$currentPassword,
			$this->getSession()
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
		string $newPassword,
		string $wrongPassword
	):void {
		$newPassword = $this->featureContext->getActualPassword($newPassword);
		$wrongPassword = $this->featureContext->getActualPassword($wrongPassword);
		$this->personalGeneralSettingsPage->changePassword(
			$wrongPassword,
			$newPassword,
			$this->getSession()
		);
	}

	/**
	 * @When the user changes the full name to :newFullName using the webUI
	 * @Given the user has changed the full name to :newFullName using the webUI
	 *
	 * @param string $newFullName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserChangesTheFullNameToUsingTheWebUI(string $newFullName):void {
		$this->personalGeneralSettingsPage->changeFullname(
			$newFullName,
			$this->getSession()
		);
		$this->featureContext->rememberUserDisplayName(
			$this->featureContext->getCurrentUser(),
			$newFullName
		);
	}

	/**
	 * @Then the user should not be able to change the full name using the webUI
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserShouldNotBeAbleToChangeTheFullNameUsingTheWebui():void {
		try {
			$this->personalGeneralSettingsPage->changeFullname(
				"anything",
				$this->getSession()
			);
			Assert::fail("changing the full name was possible, but should not");
		} catch (Behat\Mink\Exception\ElementNotFoundException $e) {
		}
	}

	/**
	 * @When the user changes the email address to :emailAddress using the webUI
	 * @Given the user has changed the email address to :emailAddress using the webUI
	 *
	 * @param string $emailAddress
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserChangesTheEmailAddressToUsingTheWebUI(string $emailAddress):void {
		$this->personalGeneralSettingsPage->changeEmailAddress(
			$emailAddress,
			$this->getSession()
		);
		$this->featureContext->rememberUserEmailAddress(
			$this->featureContext->getCurrentUser(),
			$emailAddress
		);
	}

	/**
	 * @Then the user should not be able to change the email address using the webUI
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserShouldNotBeAbleToChangeTheEmailAddressUsingTheWebui():void {
		try {
			$this->personalGeneralSettingsPage->changeEmailAddress(
				"somebody@example.com",
				$this->getSession()
			);
			Assert::fail("changing the email address was possible, but should not be");
		} catch (SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException $e) {
		}
	}

	/**
	 * @Then the owncloud version should be displayed on the personal general settings page on the webUI
	 *
	 * @return void
	 */
	public function theOwncloudVersionShouldBeDisplayedOnThePersonalGeneralSettingsPageOnTheWebui():void {
		Assert::assertTrue(
			$this->personalGeneralSettingsPage->isVersionDisplayed(),
			__METHOD__
			. " The owncloud version is not displayed on the personal general settings page on the webUI"
		);
	}

	/**
	 * @Then the federated cloud id for user :user should be displayed on the personal general settings page on the webUI
	 *
	 * @param string $user
	 *
	 * @return void
	 */
	public function theFederatedCloudIdForUserShouldBeDisplayedOnThePersonalGeneralSettingsPageOnTheWebui(string $user):void {
		$user = $this->featureContext->getActualUsername($user);
		$userFederatedCloudId = $user . "@" . $this->featureContext->getLocalBaseUrlWithoutScheme();
		Assert::assertEquals(
			$userFederatedCloudId,
			$this->personalGeneralSettingsPage->getFederatedCloudID(),
			__METHOD__
			. " The expected federated cloud id to be displayed on the personal general settings page for '$user' was '$userFederatedCloudId', but got '"
			. $this->personalGeneralSettingsPage->getFederatedCloudID()
			. "' instead"
		);
	}

	/**
	 * @Then group :groupName should be displayed on the personal general settings page on the webUI
	 *
	 * @param string $groupName
	 *
	 * @return void
	 */
	public function groupShouldBeDisplayedOnThePersonalGeneralSettingsPageOnTheWebui(string $groupName):void {
		Assert::assertTrue(
			$this->personalGeneralSettingsPage->isGroupNameDisplayed($groupName),
			__METHOD__
			. " Group '$groupName' is not displayed on the personal general settings page on the webUI."
		);
	}

	/**
	 * @When the user follows the email change confirmation link received by :emailAddress using the webUI
	 * @Given the user has followed the email change confirmation link received by :emailAddress using the webUI
	 *
	 * @param string $emailAddress
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserFollowsTheEmailChangeConfirmationLinkEmail(string $emailAddress):void {
		$this->featureContext->pushEmailRecipientAsMailBox($emailAddress);
		$content = EmailHelper::getBodyOfLastEmail(
			$emailAddress,
			$this->featureContext->getStepLineRef(),
		);
		$matches = [];
		\preg_match(
			'/Use the following link to confirm your changes to the email address: (http.*)/',
			$content,
			$matches
		);
		Assert::assertArrayHasKey(
			1,
			$matches,
			"Couldn't find confirmation link in the email"
		);
		$this->visitPath($matches[1]);
	}

	/**
	 * @Then a password error message should be displayed on the webUI with the text :wrongPasswordMessageText
	 *
	 * @param string $wrongPasswordMessageText
	 *
	 * @return void
	 */
	public function aPasswordErrorMessageShouldBeDisplayedOnTheWebUIWithTheText(
		string $wrongPasswordMessageText
	):void {
		Assert::assertEquals(
			$wrongPasswordMessageText,
			$this->personalGeneralSettingsPage->getWrongPasswordMessageText(),
			" A password error message '$wrongPasswordMessageText' was expected to be displayed on the webUI, but got '"
			. $this->personalGeneralSettingsPage->getWrongPasswordMessageText()
			. "' instead."
		);
	}

	/**
	 * @When the user sets profile picture to :filename from their cloud files using the webUI
	 *
	 * @param string $filename
	 *
	 * @return void
	 */
	public function theUserSetsProfilePictureToFromTheirCloudFiles(string $filename):void {
		$this->personalGeneralSettingsPage->setProfilePicture($filename, $this->getSession());
	}

	/**
	 * @Given the user has set profile picture to :filename from their cloud files
	 *
	 * @param string $filename
	 *
	 * @return void
	 */
	public function theUserHasSetProfilePictureToFromTheirCloudFiles(string $filename):void {
		$this->theUserSetsProfilePictureToFromTheirCloudFiles($filename);
		$this->thePreviewOfTheProfilePictureShouldBeShownOnTheWebui("");
	}

	/**
	 * @Then /^the preview of the profile picture should (not|)\s?be shown on the webUI$/
	 *
	 * @param string $shouldOrNot
	 *
	 * @return void
	 */
	public function thePreviewOfTheProfilePictureShouldBeShownOnTheWebui(string $shouldOrNot):void {
		if ($shouldOrNot !== "not") {
			Assert::assertTrue(
				$this->personalGeneralSettingsPage->isProfilePicturePreviewDisplayed(),
				__METHOD__
				. " The preview of the profile picture is not shown on the webUI."
			);
		} else {
			Assert::assertFalse(
				$this->personalGeneralSettingsPage->isProfilePicturePreviewDisplayed(),
				__METHOD__
				. " The preview of the profile picture is shown on the webUI."
			);
		}
	}

	/**
	 * @When the user deletes the existing profile picture
	 *
	 * @return void
	 */
	public function theUserDeletesTheExistingProfilePicture():void {
		if ($this->personalGeneralSettingsPage->isProfilePicturePreviewDisplayed()) {
			$this->personalGeneralSettingsPage->deleteProfilePicture($this->getSession());
		}
	}

	/**
	 * @Given the user has deleted any existing profile picture
	 *
	 * @return void
	 * @throws Exception
	 */
	public function theUserHasDeletedAnyExistingProfilePicture():void {
		$this->theUserDeletesTheExistingProfilePicture();
		if ($this->personalGeneralSettingsPage->isProfilePicturePreviewDisplayed()) {
			throw new Exception(" The profile picture preview is displayed unexpectedly.");
		}
	}

	/**
	 * @When the user uploads :fileName as a new profile picture using the webUI
	 *
	 * @param string $fileName
	 *
	 * @return void
	 */
	public function theUserUploadsAsANewProfilePicture(string $fileName):void {
		$this->personalGeneralSettingsPage->uploadProfilePicture($this->getSession(), $fileName);
	}

	/**
	 * @When the user selects :fileName for uploading as a profile picture using the WebUI
	 *
	 * @param string $fileName
	 *
	 * @return void
	 */
	public function theUserSelectsForUploadingAsAProfilePicture(string $fileName):void {
		$this->personalGeneralSettingsPage->selectFileForUploadAsProfilePicture($this->getSession(), $fileName);
	}

	/**
	 * @Then /^the user should (not|)\s?be able to upload the selected file as the profile picture$/
	 *
	 * @param string $shouldOrNot
	 *
	 * @return void
	 */
	public function theUserShouldBeAbleToUploadTheFileAsTheProfilePicture(string $shouldOrNot):void {
		if ($shouldOrNot !== "not") {
			Assert::assertFalse(
				$this->personalGeneralSettingsPage->isFileUploadErrorMsgVisible(),
				__METHOD__
				. " The user is not able to upload the selected file as the profile picture. File upload error message is shown."
			);
		} else {
			Assert::assertTrue(
				$this->personalGeneralSettingsPage->isFileUploadErrorMsgVisible(),
				__METHOD__
				. " The user is able to upload the selected file as the profile picture. File upload error message is not shown."
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
	public function before(BeforeScenarioScope $scope):void {
		// Get the environment
		$environment = $scope->getEnvironment();
		// Get all the contexts you need in this context
		$this->featureContext = $environment->getContext('FeatureContext');
		$this->webUIGeneralContext = $environment->getContext('WebUIGeneralContext');
	}
}
