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

namespace Tests\Acceptance\Page;

use Behat\Mink\Session;
use Exception;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use TestHelpers\SetupHelper;
use TestHelpers\UploadHelper;

/**
 * Personal General Settings page.
 */
class PersonalGeneralSettingsPage extends OwncloudPage {
	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/settings/personal?sectionid=general';
	protected $languageSelectId = "languageinput";
	protected $personalProfilePanelXpath = "//div[@id='OC\\Settings\\Panels\\Personal\\Profile']";
	protected $oldPasswordInputID = "pass1";
	protected $newPasswordInputID = "pass2";
	protected $fullNameInputID = "displayName";
	protected $emailAddressInputID = "email";
	protected $changeEmailButtonID = "emailbutton";
	protected $changePasswordButtonID = "passwordbutton";
	protected $passwordErrorMessageID = "password-error";

	protected $versionSectionXpath = "//div[@id='OC\\Settings\\Panels\\Personal\\Version']";
	protected $federatedCloudIDXpath = "//*[@id='fileSharingSettings']/p/strong";
	protected $usernameXpath = "//div[@id='OC\\Settings\\Panels\\Personal\\Profile']/div[@id='username']";
	protected $legalImprintXpath = "//div[@id='OC\\Settings\\Panels\\Personal\\Profile']/div/p/a[@id='legal_imprint']";
	protected $legalPrivacyPolicyXpath = "//div[@id='OC\\Settings\\Panels\\Personal\\Profile']/div/p/a[@id='legal_privacy_policy']";
	protected $groupListXpath = "//div[@id='OC\\Settings\\Panels\\Personal\\Profile']/div[@id='groups']";

	protected $setProfilePicFromFilesBtnXpath = "//*[@id='selectavatar']";
	protected $setProfilePicFileListXpath = "//*[@id='oc-dialog-filepicker-content']//ul[@class='filelist']";
	protected $fileListElementMatchXpath = "//li[@data-entryname='%s']";
	protected $setProfilePicChooseFileBtnXpath = "//*[@class='oc-dialog-buttonrow onebutton']//button";
	protected $setProfilePicBtnXpath = "//*[@id='sendcropperbutton']";
	protected $profilePicPreviewXpath = "//*[@id='displayavatar']/div[@class='avatardiv']/img";
	protected $profilePicDeleteBtnXpath = "//*[@id='removeavatar']";
	protected $profilePicUploadInputId = "uploadavatar";
	protected $profilePicUploadedXpath = "//div[@class='jcrop-holder']";
	protected $invalidImageErrorMsgXpath = "//*[@id='displayavatar']/div[@class='warning hidden' and contains(.,'Invalid image')]";

	/**
	 * @param string $language
	 *
	 * @return void
	 * @throws \Behat\Mink\Exception\ElementNotFoundException
	 */
	public function changeLanguage(string $language): void {
		$this->selectFieldOption($this->languageSelectId, $language);
	}

	/**
	 * there is no reliable loading indicator on the personal general settings page,
	 * so just wait for the personal profile panel to be there.
	 *
	 * @param Session $session
	 * @param int $timeout_msec
	 *
	 * @return void
	 * @throws Exception
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		int $timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	):void {
		$this->waitTillXpathIsVisible(
			$this->personalProfilePanelXpath,
			$timeout_msec
		);
		$this->waitForOutstandingAjaxCalls($session);
	}

	/**
	 *
	 * @param string $oldPassword
	 * @param string $newPassword
	 * @param Session $session
	 *
	 * @return void
	 * @throws \Behat\Mink\Exception\ElementNotFoundException
	 */
	public function changePassword(string $oldPassword, string $newPassword, Session $session): void {
		$this->fillField($this->newPasswordInputID, $newPassword);
		$this->fillField($this->oldPasswordInputID, $oldPassword);
		$changePasswordButton = $this->findById($this->changePasswordButtonID);
		$this->assertElementNotNull(
			$changePasswordButton,
			__METHOD__ .
			" could not find element with id $this->changePasswordButtonID"
		);
		$changePasswordButton->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 *
	 * @param string $newFullname
	 * @param Session $session
	 *
	 * @return void
	 * @throws \Behat\Mink\Exception\ElementNotFoundException
	 */
	public function changeFullname(string $newFullname, Session $session): void {
		$this->fillField($this->fullNameInputID, $newFullname);
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 *
	 * @param string $newEmailAddress
	 * @param Session $session
	 *
	 * @return void
	 */
	public function changeEmailAddress(string $newEmailAddress, Session $session): void {
		$emailField = $this->findById($this->emailAddressInputID);
		if ($emailField === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" could not find email field with id $this->emailAddressInputID"
			);
		}
		$emailField->setValue($newEmailAddress);
		$changeEmailButton = $this->findById($this->changeEmailButtonID);
		$this->assertElementNotNull(
			$changeEmailButton,
			__METHOD__ .
			" could not find element with id $this->changePasswordButtonID"
		);
		$changeEmailButton->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 *
	 * @return string
	 * @throws ElementNotFoundException|Exception
	 *
	 */
	public function getWrongPasswordMessageText(): string {
		$errorMessage = $this->findById($this->passwordErrorMessageID);

		$this->assertElementNotNull(
			$errorMessage,
			__METHOD__ .
			" could not find element with id $this->passwordErrorMessageID"
		);

		return $this->getTrimmedText($errorMessage);
	}

	/**
	 * check if the version number displayed in the UI is correct
	 *
	 * @return bool
	 * @throws Exception
	 */
	public function isVersionDisplayed(): bool {
		$this->waitTillElementIsNotNull($this->versionSectionXpath);
		$versionSection = $this->find("xpath", $this->versionSectionXpath);
		$currentVersion = \trim(SetupHelper::runOcc(['-V'])['stdOut']);

		if (\strpos($versionSection->getText(), $currentVersion) !== false) {
			return true;
		}
		return false;
	}

	/**
	 * give federated cloud ID displayed in the UI
	 *
	 * @return string
	 */
	public function getFederatedCloudID(): string {
		$this->waitTillElementIsNotNull($this->federatedCloudIDXpath);
		return $this->find("xpath", $this->federatedCloudIDXpath)->getText();
	}

	/**
	 * get username displayed in the UI
	 *
	 * @return string
	 */
	public function getUsername(): string {
		$this->waitTillElementIsNotNull($this->usernameXpath);
		// The text is like "Username Alice"
		$text = $this->find("xpath", $this->usernameXpath)->getText();
		return \substr($text, \strlen("Username "));
	}

	/**
	 * get the legal imprint link displayed in the UI
	 *
	 * @return string
	 */
	public function getLegalImprint(): string {
		$this->waitTillElementIsNotNull($this->legalImprintXpath);
		$text = $this->find("xpath", $this->legalImprintXpath)->getText();
		return $text;
	}

	/**
	 * get the legal privacy policy link displayed in the UI
	 *
	 * @return string
	 */
	public function getLegalPrivacyPolicy(): string {
		$this->waitTillElementIsNotNull($this->legalPrivacyPolicyXpath);
		$text = $this->find("xpath", $this->legalPrivacyPolicyXpath)->getText();
		return $text;
	}

	/**
	 * check if a group with given name is displayed in the UI
	 *
	 * @param string $groupName
	 *
	 * @return bool
	 */
	public function isGroupNameDisplayed(string $groupName): bool {
		$this->waitTillElementIsNotNull($this->groupListXpath);
		$groupList = $this->find("xpath", $this->groupListXpath)->getText();

		if (\strpos($groupList, $groupName) !== false) {
			return true;
		}
		return false;
	}

	/**
	 * Set profile Pic from uploaded images using the webUI
	 *
	 * @param string $fileName
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 */
	public function setProfilePicture(string $fileName, Session $session): void {
		$this->waitTillElementIsNotNull($this->setProfilePicFromFilesBtnXpath);
		$profilePicBtn = $this->find('xpath', $this->setProfilePicFromFilesBtnXpath);
		$this->assertElementNotNull(
			$profilePicBtn,
			__METHOD__ . " Profile Picture Button not found"
		);
		$profilePicBtn->focus();
		$profilePicBtn->click();
		$this->waitForAjaxCallsToStartAndFinish($session);

		$this->waitTillElementIsNotNull(
			$this->setProfilePicFileListXpath .
			\sprintf(
				$this->fileListElementMatchXpath,
				$fileName
			)
		);
		$file = $this->find(
			'xpath',
			$this->setProfilePicFileListXpath .
			\sprintf($this->fileListElementMatchXpath, $fileName)
		);
		$this->assertElementNotNull(
			$file,
			__METHOD__ . " the file with name $fileName not found"
		);
		$file->click();
		$this->waitForAjaxCallsToStartAndFinish($session);

		$chooseBtn = $this->find('xpath', $this->setProfilePicChooseFileBtnXpath);
		$this->assertElementNotNull(
			$chooseBtn,
			__METHOD__ . " The button to choose profile picture was not found"
		);
		$chooseBtn->focus();
		$chooseBtn->click();
		$this->waitForAjaxCallsToStartAndFinish($session);

		$this->selectDefaultCropForProfilePicture($session);
	}

	/**
	 * Check if the preview of the profile pic is shown on the webui
	 *
	 * @return boolean
	 */
	public function isProfilePicturePreviewDisplayed(): bool {
		$profilePicPreview = $this->find('xpath', $this->profilePicPreviewXpath);
		if ($profilePicPreview === null) {
			return false;
		}
		return true;
	}

	/**
	 * Delete the current profile pic
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function deleteProfilePicture(Session $session): void {
		$deleteBtn = $this->find('xpath', $this->profilePicDeleteBtnXpath);
		$this->assertElementNotNull(
			$deleteBtn,
			__METHOD__ . " Profile Picture delete Button not found"
		);
		$deleteBtn->focus();
		$deleteBtn->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * Select default crop for selected profile picture
	 *
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 */
	public function selectDefaultCropForProfilePicture(Session $session): void {
		$setBtn = $this->find('xpath', $this->setProfilePicBtnXpath);
		$this->waitTillXpathIsVisible(
			$this->profilePicUploadedXpath
		);
		$this->assertElementNotNull(
			$setBtn,
			__METHOD__ . " The button to set profile picture was not found"
		);
		$setBtn->focus();
		$setBtn->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * Select File for upload as profile picture
	 *
	 * @param Session $session
	 * @param string $name
	 *
	 * @return void
	 */
	public function selectFileForUploadAsProfilePicture(Session $session, string $name): void {
		$uploadField = $this->findById($this->profilePicUploadInputId);
		$this->assertElementNotNull(
			$uploadField,
			__METHOD__ .
			" id $this->profilePicUploadInputId " .
			"could not find file upload input field"
		);
		$uploadField->attachFile(UploadHelper::getUploadFilesDir($name));
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * Upload a profile picture
	 *
	 * @param Session $session
	 * @param string $name
	 *
	 * @return void
	 * @throws Exception
	 */
	public function uploadProfilePicture(Session $session, string $name): void {
		$this->selectFileForUploadAsProfilePicture($session, $name);
		$this->selectDefaultCropForProfilePicture($session);
	}

	/**
	 * return if the "invalid image" message is visible
	 *
	 * @return boolean
	 */
	public function isFileUploadErrorMsgVisible(): bool {
		$errorMsg = $this->waitTillElementIsNotNull($this->invalidImageErrorMsgXpath);
		return $errorMsg !== null;
	}
}
