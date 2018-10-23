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
namespace Page;

use Behat\Mink\Session;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use TestHelpers\SetupHelper;

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
	protected $personalProfilePanelId = "OC\Settings\Panels\Personal\Profile";
	protected $oldPasswordInputID = "pass1";
	protected $newPasswordInputID = "pass2";
	protected $fullNameInputID = "displayName";
	protected $emailAddressInputID = "email";
	protected $changeEmailButtonID = "emailbutton";
	protected $changePasswordButtonID = "passwordbutton";
	protected $passwordErrorMessageID = "password-error";

	protected $versionSectionXpath = "//div[@id='OC\\Settings\\Panels\\Personal\\Version']";
	protected $federatedCloudIDXpath = "//*[@id='fileSharingSettings']/p/strong";
	protected $groupListXpath = "//div[@id='OC\\Settings\\Panels\\Personal\\Profile']/div[@id='groups']";

	/**
	 * @param string $language
	 *
	 * @return void
	 */
	public function changeLanguage($language) {
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
	 */
	public function waitTillPageIsLoaded(
		Session $session,
		$timeout_msec = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	) {
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			if ($this->findById($this->personalProfilePanelId) !== null) {
				break;
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			$currentTime = \microtime(true);
		}

		if ($currentTime > $end) {
			throw new \Exception(
				__METHOD__ . " timeout waiting for page to load"
			);
		}

		$this->waitForOutstandingAjaxCalls($session);
	}

	/**
	 *
	 * @param string $oldPassword
	 * @param string $newPassword
	 * @param Session $session
	 *
	 * @return void
	 */
	public function changePassword($oldPassword, $newPassword, Session $session) {
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
	 */
	public function changeFullname($newFullname, Session $session) {
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
	public function changeEmailAddress($newEmailAddress, Session $session) {
		$this->fillField($this->emailAddressInputID, $newEmailAddress);
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
	 * @throws ElementNotFoundException
	 *
	 * @return string
	 */
	public function getWrongPasswordMessageText() {
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
	 */
	public function isVersionDisplayed() {
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
	public function getFederatedCloudID() {
		$this->waitTillElementIsNotNull($this->federatedCloudIDXpath);
		return $this->find("xpath", $this->federatedCloudIDXpath)->getText();
	}

	/**
	 * check if a group with given name is displayed in the UI
	 *
	 * @param string $groupName
	 *
	 * @return string
	 */
	public function isGroupNameDisplayed($groupName) {
		$this->waitTillElementIsNotNull($this->groupListXpath);
		$groupList = $this->find("xpath", $this->groupListXpath)->getText();

		if (\strpos($groupList, $groupName) !== false) {
			return true;
		}
		return false;
	}
}
