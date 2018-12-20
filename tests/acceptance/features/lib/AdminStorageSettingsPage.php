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
namespace Page;

use Behat\Mink\Session;

/**
 * Admin Storage Settings page.
 */
class AdminStorageSettingsPage extends OwncloudPage {

	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/settings/admin?sectionid=storage';

	protected $filesExternalFormXpath = "//form[@id='files_external']";
	protected $externalStorageCheckboxId = "enableExternalStorageCheckbox";
	protected $externalStorageCheckboxXpath = "//label[@for='enableExternalStorageCheckbox']";
	protected $externalStorageFormId = "externalStorage";

	protected $lastCreatedMountListXpath = "//tr[@id='addMountPoint']/preceding-sibling::tr";
	protected $newFolderNameXpath = "//tr[@id='addMountPoint']//input[@placeholder='Folder name']";
	protected $newBackendTypeXpath = "//tr[@id='addMountPoint']//select[@id='selectBackend']";
	protected $newLocationXpath = "//tr[@id='addMountPoint']/preceding-sibling::tr[1]//input[@placeholder='Location']";
	protected $statusSymbolXpath = "//tr[@id='addMountPoint']/preceding-sibling::tr[1]//td[@class='status']/span";

	protected $lastMountApplicableXpath = "//tr[@id='addMountPoint']/preceding-sibling::tr[1]//td[@class='applicable']//li/input";
	protected $userOrGroupListXpath = "//div[@id='select2-drop']//li[contains(@class, 'select2-result')]";
	protected $userOrGroupNameXpath = "//div[@id='select2-drop']//li[contains(@class, 'select2-result')][%s]//span/span";
	protected $usersOrGroupListLoadingXpath = "//li[@class='select2-searching']";

	protected $applicableUsersListXpath = "//tr[@id='addMountPoint']/preceding-sibling::tr[1]//li[@class='select2-search-choice']";
	protected $applicableUserXpath = "//tr[@id='addMountPoint']/preceding-sibling::tr[1]//li[@class='select2-search-choice'][%s]//span";
	protected $applicableUserDeleteXpath = "//tr[@id='addMountPoint']/preceding-sibling::tr[1]//li[@class='select2-search-choice'][%s]//a";
	protected $lastCreatedMountDeleteButtonXpath = "//tr[@id='addMountPoint']/preceding-sibling::tr[1]/td[@class='remove']";
	protected $mountPointNameXpath = "//tr[@class='local'][%s]//input[@placeholder='Folder name']";

	/**
	 * enable external storage
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function enableExternalStorage(Session $session) {
		$this->toggleCheckbox(
			$session,
			"enables",
			$this->externalStorageCheckboxXpath,
			$this->externalStorageCheckboxId
		);
	}

	/**
	 * disable external storage
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function disableExternalStorage(Session $session) {
		$this->toggleCheckbox(
			$session,
			"disables",
			$this->externalStorageCheckboxXpath,
			$this->externalStorageCheckboxId
		);
		$ocDialogs = $this->getOcDialogs();
		$ocDialog = \end($ocDialogs);
		$ocDialog->clickButton($session, "Yes");
	}

	/**
	 * external storage form is visible
	 *
	 * @return boolean
	 */
	public function externalStorageFormVisible() {
		return $this->findById($this->externalStorageFormId)->isVisible();
	}

	/**
	 * Add local storage mount
	 *
	 * @param Session $session
	 * @param string $mount
	 * @param string $dirLocation
	 *
	 * @return void
	 */
	public function addLocalStorageMount($session, $mount, $dirLocation) {
		$newFolderNameXpath = $this->find("xpath", $this->newFolderNameXpath);
		$this->assertElementNotNull(
			$newFolderNameXpath,
			__METHOD__ .
			" xpath $this->newFolderNameXpath " .
			"could not find input field for folder name"
		);
		$newFolderNameXpath->setValue($mount);
		$newBackendType = $this->find("xpath", $this->newBackendTypeXpath);
		$this->assertElementNotNull(
			$newBackendType,
			__METHOD__ .
			" xpath $this->newBackendTypeXpath " .
			"could not find select field for backend type"
		);
		$newBackendType->selectOption("Local");
		$newLocation = $this->find("xpath", $this->newLocationXpath);
		$this->assertElementNotNull(
			$newLocation,
			__METHOD__ .
			" xpath $this->newLocationXpath " .
			"could not find input field for local storage mount location"
		);
		$newLocation->setValue($dirLocation);
		$newLocation->blur();
		$this->waitUntilSuccessOrFailureSymbolAppears();
	}

	/**
	 * add applicable user/group to last created mount
	 *
	 * @param Session $session
	 * @param string $user
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function addApplicableToLastMount($session, $user) {
		$lastMountApplicable = $this->find("xpath", $this->lastMountApplicableXpath);
		$this->assertElementNotNull(
			$lastMountApplicable,
			__METHOD__ .
			" xpath $this->lastMountApplicableXpath " .
			"could not find input field for applicable user/group"
		);
		$lastMountApplicable->click();
		$this->waitTillElementIsNull($this->usersOrGroupListLoadingXpath);
		$this->waitTillElementIsNotNull($this->userOrGroupListXpath);
		$userOrGroupList = $this->findAll("xpath", $this->userOrGroupListXpath);
		$i = 1;
		foreach ($userOrGroupList as $groupOrUser) {
			$userOrGroupName = $this->find("xpath", \sprintf($this->userOrGroupNameXpath, $i));
			if ($this->getTrimmedText($userOrGroupName) === $user) {
				$groupOrUser->click();
				$lastMountApplicable->blur();
				$this->waitUntilSuccessOrFailureSymbolAppears();
				return;
			}
			$i++;
		}
		throw new \Exception(
			__METHOD__ . " could not find $user to add on applicable list"
		);
	}

	/**
	 * remove applicable from last share
	 *
	 * @param Session $session
	 * @param string $user
	 *
	 * @return void
	 * @throws \Exception
	 */
	public function removeApplicableFromLastMount($session, $user) {
		$applicableUsersList = $this->findAll("xpath", $this->applicableUsersListXpath);
		for ($i = 1; $i <= \count($applicableUsersList); $i++) {
			$applicableUser = $this->find(
				"xpath", \sprintf($this->applicableUserXpath, $i)
			);
			if ($this->getTrimmedText($applicableUser) === \strtolower($user)) {
				$applicableUserDelete = $this->find(
					"xpath", \sprintf($this->applicableUserDeleteXpath, $i)
				);
				$applicableUserDelete->click();
				$this->waitUntilSuccessOrFailureSymbolAppears();
				return;
			}
		}
		throw new \Exception(
			__METHOD__ . " could not find $user to remove from applicable list"
		);
	}

	/**
	 * delete last created local storage mount
	 *
	 * @param Session $session
	 *
	 * @return void
	 */
	public function deleteLastCreatedLocalMount($session) {
		$lastCreatedMountDeleteButton = $this->find(
			"xpath", $this->lastCreatedMountDeleteButtonXpath
		);
		$this->assertElementNotNull(
			$lastCreatedMountDeleteButton,
			__METHOD__ .
			" xpath $this->lastCreatedMountDeleteButtonXpath " .
			"could not find delete button for last created mount"
		);
		$lastCreatedMountDeleteButton->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * check if last created mount is present
	 *
	 * @param string $lastCreatedMountName
	 *
	 * @return boolean
	 */
	public function checkIfLastCreatedMountIsPresent($lastCreatedMountName) {
		$lastCreatedMountList = $this->findAll(
			"xpath", $this->lastCreatedMountListXpath
		);
		$i = 1;
		foreach ($lastCreatedMountList as $mount) {
			$mountPointName = $this->find(
				"xpath", \sprintf($this->mountPointNameXpath, $i)
			);
			if ($mountPointName->getValue() === $lastCreatedMountName) {
				return true;
			}
			$i++;
		}
		return false;
	}

	/**
	 * Wait until success or failure symbol to appear
	 *
	 * @param integer $timeout time in ms
	 *
	 * @return void
	 */
	public function waitUntilSuccessOrFailureSymbolAppears(
		$timeout = STANDARD_UI_WAIT_TIMEOUT_MILLISEC
	) {
		$statusSymbol = $this->find("xpath", $this->statusSymbolXpath);
		$this->assertElementNotNull(
			$statusSymbol,
			__METHOD__ .
			" xpath $this->statusSymbolXpath " .
			"could not find status symbol"
		);
		$start = \time();
		while (true) {
			if ($statusSymbol->getAttribute("class") === "error"
				|| $statusSymbol->getAttribute("class") === "success"
			) {
				break;
			}
			$now = \time();
			if (($now - $start) * 1000 >= $timeout) {
				break;
			}
		}
	}

	/**
	 * toggle checkbox
	 *
	 * @param Session $session
	 * @param string $action "enables|disables"
	 * @param string $checkboxXpath
	 * @param string $checkboxId
	 *
	 * @return void
	 */
	public function toggleCheckbox(Session $session, $action, $checkboxXpath, $checkboxId) {
		$checkbox = $this->find("xpath", $checkboxXpath);
		$checkCheckbox = $this->findById($checkboxId);
		$this->assertElementNotNull(
			$checkbox,
			__METHOD__ .
			" xpath $checkboxXpath " .
			"could not find label for checkbox"
		);
		$this->assertElementNotNull(
			$checkCheckbox,
			__METHOD__ .
			" id $checkboxId " .
			"could not find checkbox"
		);
		if ($action === "disables") {
			if ($checkCheckbox->isChecked()) {
				$checkbox->click();
			}
		} elseif ($action === "enables") {
			if ((!($checkCheckbox->isChecked()))) {
				$checkbox->click();
			}
		} else {
			throw new \Exception(
				__METHOD__ . " invalid action: $action"
			);
		}
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * waits for the page to appear completely
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
		$this->waitForAjaxCallsToStartAndFinish($session);
		$this->waitTillXpathIsVisible(
			$this->filesExternalFormXpath, $timeout_msec
		);
	}
}
