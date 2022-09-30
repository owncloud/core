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

namespace Page;

use Behat\Mink\Element\NodeElement;
use Behat\Mink\Session;
use Exception;
use Page\UserPageElement\GroupList;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\ElementNotFoundException;
use WebDriver\Exception\NoSuchElement;
use WebDriver\Exception\ElementNotVisible;
use WebDriver\Exception\StaleElementReference;

/**
 * Users page.
 */
class UsersPage extends OwncloudPage {
	/**
	 *
	 * @var string $path
	 */
	protected $path = '/index.php/settings/users';

	protected $userTrXpath = ".//table[@id='userlist']/tbody/tr";

	protected $quotaSelectXpath = ".//select[@class='quota-user']";

	protected $quotaOptionXpath = "//option[contains(text(), '%s')]";

	protected $emailColumnXpath = "//td[@class='mailAddress']";
	protected $passwordColumnXpath = "//td[@class='password']";
	protected $quotaColumnXpath = "//td[@class='quota']";
	protected $storageLocationColumnXpath = "//td[@class='storageLocation']";
	protected $lastLoginXpath = "//td[@class='lastLogin']";

	protected $manualQuotaInputXpath
		= "//input[contains(@data-original-title,'Please enter storage quota')]";
	protected $settingsBtnXpath = ".//*[@id='app-settings-header']/button";
	protected $settingContentId = "app-settings-content";
	protected $labelMailOnUserCreateXpath
		= ".//label[@for='CheckboxMailOnUserCreate']";
	protected $settingByTextXpath
		= ".//*[@id='userlistoptions']//label[normalize-space()='%s']";
	protected $newUserUsernameFieldId = "newusername";
	protected $newUserPasswordFieldId = "newuserpassword";
	protected $newUserEmailFieldId = "newemail";
	protected $createUserBtnXpath = ".//*[@id='newuser']/input[@type='submit']";
	protected $newUserGroupsDropDownXpath
		= ".//*[@id='newuser']//div[@class='groupsListContainer multiselect button']";
	protected $newUserGroupsDropDownListTag = "li";
	protected $newUserGroupsSelectedClass = "selected";
	protected $newUserGroupsListXpath
		= ".//*[@id='newuser']//ul[@class='multiselectoptions down']";
	protected $newUserGroupXpath
		= ".//*[@id='newuser']//ul[@class='multiselectoptions down']//label[@title='%s']/..";
	protected $newUserAddGroupBtnXpath
		= ".//*[@id='newuser']//ul[@class='multiselectoptions down']//li[@title='add group']";
	protected $createGroupWithNewUserInputXpath
		= ".//*[@id='newuser']//ul[@class='multiselectoptions down']//input[@type='text']";
	protected $groupListId = "usergrouplist";
	protected $disableUserCheckboxXpath = "//input[@type='checkbox']";
	protected $deleteUserBtnXpath
		= ".//td[@class='remove']/a[@class='action delete']";
	protected $resendInvitationEmailBtnXpath
		= ".//td[@class='resendInvitationEmail']/a[@class='action resendInvitationEmail']";
	protected $deleteConfirmBtnXpath
		= ".//div[contains(@class, 'oc-dialog-buttonrow twobuttons') and not(ancestor::div[contains(@style, 'display: none')])]//button[text()='Yes']";
	protected $deleteNotConfirmBtnXpath
		= ".//div[contains(@class, 'oc-dialog-buttonrow twobuttons') and not(ancestor::div[contains(@style, 'display: none')])]//button[text()='No']";

	protected $userNameFieldCss = ".name";

	protected $editUserDisplayNameBtnXpath = ".//td[@class='displayName']/img";
	protected $editUserDisplayNameFieldXpath = "/td[@class='displayName']/input";

	protected $editPasswordBtnXpath = ".//td[@class='password']/img";
	protected $editPasswordInputXpath = "/td[@class='password']/input";

	protected $editEmailBtnXpath = ".//td[@class='mailAddress']/img";
	protected $editEmailInputXpath = "/td[@class='mailAddress']/input";

	protected $groupsFieldXpath = ".//td[@class='groups']";
	protected $userGroupsInputXpath = "./div[@class='groupsListContainer multiselect button']";
	protected $groupLabelInInputXpath = ".//ul[@class='multiselectoptions down']/li/label[@title='%s']";
	protected $groupInputXpath = ".//ul[@class='multiselectoptions down']/li/input[@id='%s']";
	protected $activeDropDownXpath = "//div[@class='multiselect button active down']";
	protected $groupUserCountXpath = "//li[@data-gid='%s']//span[@class='usercount tag']";

	/**
	 * @param string $username
	 *
	 * @return NodeElement for the requested user in the table
	 * @throws Exception
	 */
	public function findUserInTable(string $username): NodeElement {
		$userTrs = $this->findAll('xpath', $this->userTrXpath);

		foreach ($userTrs as $userTr) {
			$user = $userTr->find("css", $this->userNameFieldCss);
			if ($this->getTrimmedText($user) === $username) {
				return $userTr;
			}
		}
		throw new Exception("Could not find user '$username'");
	}

	/**
	 * @param string $username
	 *
	 * @return string text describing the quota
	 * @throws ElementNotFoundException|Exception
	 */
	public function getQuotaOfUser(string $username): string {
		$userTr = $this->findUserInTable($username);
		$selectField = $userTr->find('xpath', $this->quotaSelectXpath);

		if ($selectField === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->quotaSelectXpath " .
				"could not find quota select element"
			);
		}

		$xpathLocator = "//option[@value='" . $selectField->getValue() . "']";
		$selectField = $selectField->find('xpath', $xpathLocator);

		if ($selectField === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $xpathLocator " .
				"could not find quota element"
			);
		}

		return $this->getTrimmedText($selectField);
	}

	/**
	 * @param string $username
	 *
	 * @return string email of user
	 * @throws ElementNotFoundException|ElementNotVisible|Exception
	 */
	public function getEmailOfUser(string $username): string {
		$userTr = $this->findUserInTable($username);
		$userEmail = $userTr->find('xpath', $this->emailColumnXpath);

		if ($userEmail === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->emailColumnXpath " .
				"email of user " . $username . " not found"
			);
		}

		if (!$userEmail->isVisible()) {
			throw new ElementNotVisible(
				__METHOD__ .
				" email of user " . $username . " is not visible"
			);
		};

		return $this->getTrimmedText($userEmail);
	}

	/**
	 * @return bool
	 * @throws Exception
	 */
	public function isPasswordFieldOfNewUserVisible(): bool {
		$newUserPasswordField = $this->findById($this->newUserPasswordFieldId);
		if ($newUserPasswordField === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" $this->newUserPasswordFieldId " .
				"password field of new user not found"
			);
		}

		return $newUserPasswordField->isVisible();
	}

	/**
	 * @return bool
	 * @throws Exception
	 */
	public function isEmailFieldOfNewUserVisible(): bool {
		$newUserEmailField = $this->findById($this->newUserEmailFieldId);
		if ($newUserEmailField === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" $this->newUserEmailFieldId " .
				"email field of new user not found"
			);
		}

		return $newUserEmailField->isVisible();
	}

	/**
	 * @param string $username
	 *
	 * @return bool
	 * @throws Exception
	 */
	public function isPasswordColumnOfUserVisible(string $username): bool {
		$userTr = $this->findUserInTable($username);
		$userPassword = $userTr->find('xpath', $this->passwordColumnXpath);

		if ($userPassword === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->passwordColumnXpath " .
				"password column of user " . $username . " not found"
			);
		}

		if (!$userPassword->isVisible()) {
			return false;
		}

		return true;
	}

	/**
	 * @param string $username
	 *
	 * @return bool
	 * @throws Exception
	 */
	public function isQuotaColumnOfUserVisible(string $username): bool {
		$userTr = $this->findUserInTable($username);
		$userQuota = $userTr->find('xpath', $this->quotaColumnXpath);

		if ($userQuota === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->quotaColumnXpath " .
				"quota column of user " . $username . " not found"
			);
		}

		if (!$userQuota->isVisible()) {
			return false;
		}
		return true;
	}

	/**
	 * @param string $username
	 *
	 * @return string storage location of user
	 * @throws ElementNotFoundException|ElementNotVisible|Exception
	 */
	public function getStorageLocationOfUser(string $username): string {
		$userTr = $this->findUserInTable($username);
		$userStorageLocation = $userTr->find(
			'xpath',
			$this->storageLocationColumnXpath
		);

		if ($userStorageLocation === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->storageLocationColumnXpath " .
				"storage location of user " . $username . " not found"
			);
		}

		if (!$userStorageLocation->isVisible()) {
			throw new ElementNotVisible(
				__METHOD__ .
				" storage location of user " . $username . " is not visible"
			);
		};

		return $this->getTrimmedText($userStorageLocation);
	}

	/**
	 * @param string $username
	 *
	 * @return string last login of a user
	 * @throws ElementNotFoundException|ElementNotVisible|Exception
	 */
	public function getLastLoginOfUser(string $username): string {
		$userTr = $this->findUserInTable($username);
		$userLastLogin = $userTr->find(
			'xpath',
			$this->lastLoginXpath
		);

		if ($userLastLogin === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->lastLoginXpath " .
				"last login of user " . $username . " not found"
			);
		}

		if (!$userLastLogin->isVisible()) {
			throw new ElementNotVisible(
				__METHOD__ .
				" last login of user " . $username . " is not visible"
			);
		};

		return $this->getTrimmedText($userLastLogin);
	}

	/**
	 * Open the settings menu
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function openAppSettingsMenu(): void {
		$settingsBtn = $this->find("xpath", $this->settingsBtnXpath);
		if ($settingsBtn === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->settingsBtnXpath " .
				"could not find settings button"
			);
		}
		$settingsBtn->click();
		// At this point isVisible() on the settings menu returns true
		// But the settings menu animation is happening.
		// If we try to click a setting before the animation is finished
		// then the click is not effective.
		// This results in intermittent test fails, because the expected
		// setting does not happen.
		// Ref: https://github.com/owncloud/core/issues/34689
		\sleep(1);
	}

	/**
	 * sets a setting in the settings menu
	 *
	 * @param string $setting the human readable setting string
	 * @param boolean $value
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function setSetting(string $setting, bool $value = true): void {
		$settingContent = $this->findById($this->settingContentId);
		if ($settingContent === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" id $this->settingContentId " .
				"could not find setting content"
			);
		}

		try {
			$settingContentIsVisible = $settingContent->isVisible();
		} catch (NoSuchElement $e) {
			// Somehow on Edge this can throw NoSuchElement even though
			// we just found the element.
			// TODO: Edge - if it keeps happening then find out why.
			\error_log(
				__METHOD__
				. " NoSuchElement while doing settingContent->isVisible()"
				. "\n-------------------------\n"
				. $e->getMessage()
				. "\n-------------------------\n"
			);
			$settingContentIsVisible = false;
		}

		if (!$settingContentIsVisible) {
			$this->openAppSettingsMenu();
		}

		$xpathLocator = \sprintf($this->settingByTextXpath, $setting);
		$settingLabel = $this->find("xpath", $xpathLocator);
		if ($settingLabel === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $xpathLocator " .
				"could not find setting '" . $setting . "'"
			);
		}
		//the checkbox is not visible, but we need it to find the status
		$checkBoxId = $settingLabel->getAttribute("for");
		$checkBox = $this->findById($checkBoxId);
		if ($checkBox === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" could not find checkbox with the id '" . $checkBoxId . "'"
			);
		}
		if ($checkBox->isChecked() !== $value) {
			$settingLabel->click();
		}
	}

	/**
	 * creates a user and adds it to the required groups
	 * if group does not exist it will be created
	 *
	 * @param Session $session
	 * @param string $username
	 * @param string|null $password
	 * @param string|null $email
	 * @param string[]|null $groups
	 *
	 * @return void
	 * @throws \Behat\Mink\Exception\ElementNotFoundException
	 */
	public function createUser(
		Session $session,
		string  $username,
		?string  $password,
		?string  $email = null,
		?array $groups = null
	): void {
		$this->setSetting("Set password for new users", $password !== null);
		$this->fillField($this->newUserUsernameFieldId, $username);
		if ($password !== null) {
			$this->fillField($this->newUserPasswordFieldId, $password);
		}
		if ($email !== null) {
			$this->setSetting("Show email address", true);
			$this->fillField($this->newUserEmailFieldId, $email);
		}
		$createUserBtn = $this->find("xpath", $this->createUserBtnXpath);
		if ($createUserBtn === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->createUserBtnXpath " .
				"could not find create user button"
			);
		}
		$newUserGroupsDropDown = $this->find(
			"xpath",
			$this->newUserGroupsDropDownXpath
		);
		if ($newUserGroupsDropDown === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->newUserGroupsDropDownXpath " .
				"could not find groups dropdown for new user"
			);
		}
		$newUserGroupsDropDown->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
		$groupDropDownList = $this->find("xpath", $this->newUserGroupsListXpath);
		if ($groupDropDownList === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->newUserGroupsListXpath " .
				"could not find groups dropdown list"
			);
		}
		$groupsInDropDown = $groupDropDownList->findAll(
			"xpath",
			$this->newUserGroupsDropDownListTag
		);

		//uncheck all selected groups
		foreach ($groupsInDropDown as $groupLi) {
			if ($groupLi->getAttribute("class") === $this->newUserGroupsSelectedClass) {
				$groupLi->click();
			}
		}

		//now select all groups that we need to have
		if (\is_array($groups)) {
			foreach ($groups as $group) {
				$groupItem = $this->find(
					"xpath",
					\sprintf($this->newUserGroupXpath, $group)
				);
				if ($groupItem !== null) {
					$groupItem->click();
				} else {
					$newUserAddGroupBtn = $this->find(
						"xpath",
						$this->newUserAddGroupBtnXpath
					);
					if ($newUserAddGroupBtn === null) {
						throw new ElementNotFoundException(
							__METHOD__ .
							" xpath $this->newUserAddGroupBtnXpath " .
							"could not find add-group button while creating a new user"
						);
					}
					$newUserAddGroupBtn->click();
					$createUserInput = $this->find(
						"xpath",
						$this->createGroupWithNewUserInputXpath
					);
					if ($createUserInput === null) {
						throw new ElementNotFoundException(
							__METHOD__ .
							" xpath $this->createGroupWithNewUserInputXpath " .
							"could not find add-group input while creating a new user"
						);
					}
					try {
						$createUserInput->setValue($group . "\n");
					} catch (NoSuchElement $e) {
						// this seems to be a bug in MinkSelenium2Driver.
						// Actually all that we need does happen,
						// so we just don't do anything
					}
				}
			}
		}

		$createUserBtn->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * @param string $username
	 * @param string $quota text form of quota to be input
	 * @param Session $session
	 * @param boolean $valid is the set quota expected to be valid
	 *
	 * @return void
	 * @throws ElementNotFoundException
	 */
	public function setQuotaOfUserTo(
		string  $username,
		string  $quota,
		Session $session,
		bool $valid = true
	): void {
		$userTr = $this->findUserInTable($username);
		$selectField = $userTr->find('xpath', $this->quotaSelectXpath);

		if ($selectField === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->quotaSelectXpath " .
				"could not find quota select element for user $username"
			);
		}
		$selectField->click();
		$selectOption = $selectField->find(
			'xpath',
			\sprintf($this->quotaOptionXpath, $quota)
		);
		if ($selectOption === null) {
			$xpathLocator = \sprintf($this->quotaOptionXpath, "Other");
			$selectOption = $selectField->find('xpath', $xpathLocator);

			if ($selectOption === null) {
				throw new ElementNotFoundException(
					__METHOD__ .
					" xpath $xpathLocator " .
					"could not find quota option element for user $username"
				);
			}

			$selectOption->click();
			$manualQuotaInputElement = $this->find(
				'xpath',
				$this->manualQuotaInputXpath
			);

			if ($manualQuotaInputElement === null) {
				throw new ElementNotFoundException(
					__METHOD__ .
					" xpath $this->manualQuotaInputXpath " .
					"could not find manual quota input element for user $username"
				);
			}

			$manualQuotaInputElement->setValue($quota);
		} else {
			$selectOption->click();
		}
		//a valid quota will be send by AJAX to the server
		//invalid quotas are checked by JS, so we just wait for the notification to appear
		if ($valid === true) {
			$this->waitForAjaxCallsToStartAndFinish($session);
		} else {
			try {
				$this->waitTillXpathIsVisible(
					"//*[@id='$this->notificationId']",
					1000
				);
			} catch (Exception $e) {
				// Sometimes the notification is not "noticed".
				// Later steps are responsible for caring if a notification
				// is actually seen, so just output some information
				$message = __METHOD__ . " INFORMATION: notificationId '" .
					$this->notificationId . "' did not become visible";
				echo $message;
				\error_log($message);
			}
		}
	}

	/**
	 *
	 * @return GroupList
	 * @throws ElementNotFoundException
	 */
	private function getGroupListElement(): GroupList {
		$groupListElement = $this->findById($this->groupListId);
		if ($groupListElement === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" id $this->groupListId " .
				"could not find group list element"
			);
		}

		/**
		 *
		 * @var GroupList $groupList
		 */
		$groupList = $this->getPage("UserPageElement\\GroupList");
		$groupList->setElement($groupListElement);
		return $groupList;
	}

	/**
	 * returns all group names as an array
	 *
	 * @return string[]
	 */
	public function getAllGroups(): array {
		$groupList = $this->getGroupListElement();
		return $groupList->namesToArray();
	}

	/**
	 *
	 * @param string $name
	 * @param Session $session
	 * @param bool $confirm true is to delete and false is not to delete
	 *
	 * @return void
	 */
	public function deleteGroup(string $name, Session $session, bool $confirm): void {
		$groupList = $this->getGroupListElement();
		$groupList->deleteGroup($name, $confirm);
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 *
	 * @param string $groupName
	 * @param Session $session
	 *
	 * @return void
	 */
	public function addGroup(string $groupName, Session $session): void {
		$groupList = $this->getGroupListElement();
		$groupList->addGroup($groupName);
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 *
	 * @param string $username
	 *
	 * @return void
	 * @throws Exception
	 */
	public function disableUser(string $username): void {
		$userTr = $this->findUserInTable($username);
		$userTr->find("xpath", $this->disableUserCheckboxXpath)->click();
	}

	/**
	 *
	 * @param string $username
	 * @param bool $confirm
	 * @param Session $session
	 *
	 * @return void
	 * @throws Exception
	 */
	public function deleteUser(string $username, bool $confirm, Session $session): void {
		$userTr = $this->findUserInTable($username);
		$deleteBtn = $userTr->find("xpath", $this->deleteUserBtnXpath);
		if ($deleteBtn === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->deleteUserBtnXpath " .
				"could not find delete user field for user $username"
			);
		}
		$deleteBtn->click();
		$this->waitForAjaxCallsToStartAndFinish($session);

		if ($confirm) {
			$confirmBtn = $this->waitTillXpathIsVisible($this->deleteConfirmBtnXpath);
		} else {
			$confirmBtn = $this->waitTillXpathIsVisible($this->deleteNotConfirmBtnXpath);
		}

		if ($confirmBtn === null) {
			$xpathSelector = ($confirm) ? $this->deleteConfirmBtnXpath : $this->deleteNotConfirmBtnXpath;
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $xpathSelector " .
				"could not find delete confirm button for user $username"
			);
		}

		$confirmBtn->click();
	}

	/**
	 * @param Session $session
	 * @param string $username
	 * @param string $displayName
	 *
	 * @return void
	 * @throws Exception
	 */
	public function setDisplayNameofUserTo(Session $session, string $username, string $displayName): void {
		$userTr = $this->findUserInTable($username);
		$editDisplayNameBtn = $userTr->find("xpath", $this->editUserDisplayNameBtnXpath);
		if ($editDisplayNameBtn === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->editDisplayNameBtn " .
				"could not find edit button for user $username"
			);
		}
		$editDisplayNameBtn->focus();
		$editDisplayNameBtn->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
		$editDisplayNameInput = $userTr->find("xpath", $this->editUserDisplayNameFieldXpath);
		if ($editDisplayNameInput === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->editDisplayNameInput " .
				"could not find display name field for user $username"
			);
		}
		try {
			$editDisplayNameInput->focus();
			$editDisplayNameInput->setValue($displayName . "\n");
			$this->waitForAjaxCallsToStartAndFinish($session);
		} catch (StaleElementReference $e) {
		}
	}

	/**
	 * @param Session $session
	 * @param string $user
	 * @param string $password
	 *
	 * @return void
	 * @throws Exception
	 */
	public function changeUserPassword(Session $session, string $user, string $password): void {
		$userTr = $this->findUserInTable($user);
		$editPasswordBtn = $userTr->find("xpath", $this->editPasswordBtnXpath);
		if ($editPasswordBtn === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->editPasswordBtnXpath " .
				"could not find edit button for user $user"
			);
		}
		$editPasswordBtn->focus();
		$editPasswordBtn->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
		$editPasswordInput = $userTr->find("xpath", $this->editPasswordInputXpath);
		if ($editPasswordInput === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->editPasswordInputXpath " .
				"could not find password field for user $user"
			);
		}
		try {
			$editPasswordInput->focus();
			$editPasswordInput->setValue($password . "\n");
		} catch (StaleElementReference $e) {
		}
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 * @param Session $session
	 * @param string $user
	 * @param string $email
	 *
	 * @return void
	 * @throws Exception
	 */
	public function changeUserEmail(Session $session, string $user, string $email): void {
		$userTr = $this->findUserInTable($user);
		$editEmailBtn = $userTr->find("xpath", $this->editEmailBtnXpath);
		$this->assertElementNotNull(
			$editEmailBtn,
			__METHOD__ .
			" xpath $this->editEmailBtnXpath " .
			"could not find edit button "
		);
		$editEmailBtn->focus();
		$editEmailBtn->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
		$editEmailInput = $userTr->find("xpath", $this->editEmailInputXpath);
		$this->assertElementNotNull(
			$editEmailInput,
			__METHOD__ .
			" xpath $this->editEmailInputXpath " .
			"could not find email field "
		);
		// editing email throws StaleElementReference
		// Because the input element disappears as soon as the value is set
		try {
			$editEmailInput->focus();
			$editEmailInput->setValue($email . "\n");
			$this->waitForAjaxCallsToStartAndFinish($session);
		} catch (StaleElementReference $e) {
		}
	}

	/**
	 * @param Session $session
	 * @param string $user
	 * @param string $group
	 * @param boolean $add Boolean value to specify whether to add or remove user from the group
	 * @param boolean $failIfElementNotFound If true then fail if an element(s) is not found. Otherwise just return early.
	 *
	 * @return void
	 * @throws ElementNotFoundException|Exception
	 */
	public function addOrRemoveUserToGroup(Session $session, string $user, string $group, bool $add = true, bool $failIfElementNotFound = true): void {
		$this->waitForAjaxCallsToStartAndFinish($session);
		$userTr = $this->findUserInTable($user);
		$groupsField = $userTr->find('xpath', $this->groupsFieldXpath);
		$userGroupsInput = $groupsField->find("xpath", $this->userGroupsInputXpath);
		if ($userGroupsInput !== null) {
			$userGroupsInput->focus();
			$userGroupsInput->click();
		}
		$this->waitForAjaxCallsToStartAndFinish($session);
		$groupLabel = $groupsField->find('xpath', \sprintf($this->groupLabelInInputXpath, $group));
		if ($groupLabel === null) {
			if ($failIfElementNotFound) {
				throw new ElementNotFoundException(
					__METHOD__ .
					" xpath $this->groupLabelInInputXpath " .
					"could not find groups input for user $user"
				);
			} else {
				// The caller just wanted us to try, and not throw an exception.
				return;
			}
		}
		$groupInput = $groupsField->find(
			'xpath',
			\sprintf($this->groupInputXpath, $groupLabel->getAttribute('for'))
		);
		if ($groupInput === null) {
			if ($failIfElementNotFound) {
				throw new ElementNotFoundException(
					__METHOD__ .
					" xpath $this->groupInputXpath " .
					"could not find input for group $group"
				);
			} else {
				// The caller just wanted us to try, and not throw an exception.
				return;
			}
		}
		$status = $groupInput->getValue() === "on";
		// while adding to group only click if the checkbox is not already selected
		// while removing from group only click if the checkbox is already selected
		if ($status xor $add) {
			$groupLabel->focus();
			$groupLabel->click();
			$this->waitForAjaxCallsToStartAndFinish($session);
		}
		$activeDropDown = $this->find('xpath', $this->activeDropDownXpath);
		if ($activeDropDown === null) {
			if ($failIfElementNotFound) {
				throw new ElementNotFoundException(
					__METHOD__ .
					" xpath $this->activeDropDownXpath " .
					"could not find any active drop down"
				);
			} else {
				// The caller just wanted us to try, and not throw an exception.
				return;
			}
		}
		$activeDropDown->click();
	}

	/**
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
	): void {
		// There is always at least the "admin" user in the displayed list of users
		// So wait for the user list to have at least 1 real user in it
		$currentTime = \microtime(true);
		$end = $currentTime + ($timeout_msec / 1000);
		while ($currentTime <= $end) {
			$userTrs = $this->findAll('xpath', $this->userTrXpath);
			foreach ($userTrs as $userTr) {
				$user = $userTr->find("css", $this->userNameFieldCss);
				if ($this->getTrimmedText($user) !== '') {
					// We have found a real user
					// (note that there is a hidden empty "template" row)
					break 2;
				}
			}
			\usleep(STANDARD_SLEEP_TIME_MICROSEC);
			$currentTime = \microtime(true);
		}

		if ($currentTime > $end) {
			throw new Exception(
				__METHOD__ . " timeout waiting for user list to load on users page"
			);
		}
	}

	/**
	 * @param string $group
	 *
	 * @return NodeElement|null
	 */
	public function getGroupUserCountElement(string $group): ?NodeElement {
		$groupUserCountXpath = \sprintf($this->groupUserCountXpath, $group);
		return $this->find('xpath', $groupUserCountXpath);
	}

	/**
	 * @param string $group
	 *
	 * @return bool
	 */
	public function groupUserCountElementExists(string $group): bool {
		if ($this->getGroupUserCountElement($group) === null) {
			return false;
		}
		return true;
	}

	/**
	 * @param string $group
	 *
	 * @return int|null
	 * @throws ElementNotFoundException
	 */
	public function getUserCountOfGroup(string $group): ?int {
		$groupUserCountElement = $this->getGroupUserCountElement($group);
		$this->assertElementNotNull(
			$groupUserCountElement,
			__METHOD__ .
			" xpath $this->groupUserCountXpath " .
			"could not find user count for group $group"
		);
		$groupUserCount = \trim($groupUserCountElement->getText());
		if ($groupUserCount === "") {
			return null;
		}
		return (int) $groupUserCount;
	}

	/**
	 * @param string $username
	 * @param Session $session
	 *
	 * @return void
	 * @throws ElementNotFoundException|Exception
	 */
	public function resendInvitationEmail(string $username, Session $session): void {
		$userTr = $this->findUserInTable($username);
		$resendInvitationEmailBtn = $userTr->find('xpath', $this->resendInvitationEmailBtnXpath);

		$this->assertElementNotNull(
			$resendInvitationEmailBtn,
			__METHOD__ .
			" xpath $this->resendInvitationEmailBtnXpath " .
			"could not find resend invitation email button for user $username"
		);

		$resendInvitationEmailBtn->click();
		$this->waitForAjaxCallsToStartAndFinish($session);
	}
}
