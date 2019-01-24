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

use Behat\Mink\Element\NodeElement;
use Behat\Mink\Session;
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
	protected $storageLocationColumnXpath = "//td[@class='storageLocation']";
	protected $lastLoginXpath = "//td[@class='lastLogin']";

	protected $manualQuotaInputXpath = "//input[contains(@data-original-title,'Please enter storage quota')]";
	protected $settingsBtnXpath = ".//*[@id='app-settings-header']/button";
	protected $settingContentId = "app-settings-content";
	protected $labelMailOnUserCreateXpath = ".//label[@for='CheckboxMailOnUserCreate']";
	protected $settingByTextXpath = ".//*[@id='userlistoptions']//label[normalize-space()='%s']";
	protected $newUserUsernameFieldId = "newusername";
	protected $newUserPasswordFieldId = "newuserpassword";
	protected $newUserEmailFieldId = "newemail";
	protected $createUserBtnXpath = ".//*[@id='newuser']/input[@type='submit']";
	protected $newUserGroupsDropDownXpath = ".//*[@id='newuser']//div[@class='groupsListContainer multiselect button']";
	protected $newUserGroupsDropDownListTag = "li";
	protected $newUserGroupsSelectedClass = "selected";
	protected $newUserGroupsListXpath = ".//*[@id='newuser']//ul[@class='multiselectoptions down']";
	protected $newUserGroupXpath = ".//*[@id='newuser']//ul[@class='multiselectoptions down']//label[@title='%s']/..";
	protected $newUserAddGroupBtnXpath = ".//*[@id='newuser']//ul[@class='multiselectoptions down']//li[@title='add group']";
	protected $createGroupWithNewUserInputXpath = ".//*[@id='newuser']//ul[@class='multiselectoptions down']//input[@type='text']";
	protected $groupListId = "usergrouplist";
	protected $disableUserCheckboxXpath = "//input[@type='checkbox']";
	protected $deleteUserBtnXpath = ".//td[@class='remove']/a[@class='action delete']";
	protected $deleteConfirmBtnXpath
		= ".//div[contains(@class, 'oc-dialog-buttonrow twobuttons') and not(ancestor::div[contains(@style,'display: none')])]//button[text()='Yes']";
	protected $deleteNotConfirmBtnXpath
		= ".//div[contains(@class, 'oc-dialog-buttonrow twobuttons') and not(ancestor::div[contains(@style,'display: none')])]//button[text()='No']";

	protected $editUserDisplayNameBtnXpath = ".//td[@class='displayName']/img";
	protected $editUserDisplayNameFieldXpath = "/td[@class='displayName']/input";

	protected $editPasswordBtnXpath = ".//td[@class='password']/img";
	protected $editPasswordInputXpath = "/td[@class='password']/input";

	protected $groupsFieldXpath = ".//td[@class='groups']";
	protected $userGroupsInputXpath = "./div[@class='groupsListContainer multiselect button']";
	protected $groupLabelInInputXpath = ".//ul[@class='multiselectoptions down']/li/label[@title='%s']";
	protected $groupInputXpath = ".//ul[@class='multiselectoptions down']/li/input[@id='%s']";

	/**
	 * @param string $username
	 *
	 * @return NodeElement for the requested user in the table
	 * @throws \Exception
	 */
	public function findUserInTable($username) {
		$userTrs = $this->findAll('xpath', $this->userTrXpath);

		foreach ($userTrs as $userTr) {
			$user = $userTr->find("css", ".name");
			if ($this->getTrimmedText($user) === $username) {
				return $userTr;
			}
		}
		throw new \Exception("Could not find user '$username'");
	}

	/**
	 * @param string $username
	 *
	 * @throws ElementNotFoundException
	 * @return string text describing the quota
	 */
	public function getQuotaOfUser($username) {
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
	 * @throws ElementNotFoundException
	 * @return string email of user
	 */
	public function getEmailOfUser($username) {
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
	 * @param string $username
	 *
	 * @throws ElementNotFoundException
	 * @return string storage location of user
	 */
	public function getStorageLocationOfUser($username) {
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
	 * @throws ElementNotFoundException
	 * @return string last login of a user
	 */
	public function getLastLoginOfUser($username) {
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
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function openSettingsMenu() {
		$settingsBtn = $this->find("xpath", $this->settingsBtnXpath);
		if ($settingsBtn === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->settingsBtnXpath " .
				"could not find settings button"
			);
		}
		$settingsBtn->click();
	}

	/**
	 * sets a setting in the settings menu
	 *
	 * @param string $setting the human readable setting string
	 * @param boolean $value
	 *
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function setSetting($setting, $value = true) {
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
			$this->openSettingsMenu();
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
	 * @param string $password
	 * @param string $email
	 * @param string[] $groups
	 *
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function createUser(
		Session $session, $username, $password, $email = null, $groups = null
	) {
		$this->setSetting("Set password for new users", $password !== null);
		$this->fillField($this->newUserUsernameFieldId, $username);
		if ($password !== null) {
			$this->fillField($this->newUserPasswordFieldId, $password);
		}
		if ($email !== null) {
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
			"xpath", $this->newUserGroupsDropDownXpath
		);
		if ($newUserGroupsDropDown === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->newUserGroupsDropDownXpath " .
				"could not find groups dropdown for new user"
			);
		}
		$newUserGroupsDropDown->click();
		$groupDropDownList = $this->find("xpath", $this->newUserGroupsListXpath);
		if ($groupDropDownList === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->newUserGroupsListXpath " .
				"could not find groups dropdown list"
			);
		}
		$groupsInDropDown = $groupDropDownList->findAll(
			"xpath", $this->newUserGroupsDropDownListTag
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
					"xpath", \sprintf($this->newUserGroupXpath, $group)
				);
				if ($groupItem !== null) {
					$groupItem->click();
				} else {
					$newUserAddGroupBtn = $this->find(
						"xpath", $this->newUserAddGroupBtnXpath
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
						"xpath", $this->createGroupWithNewUserInputXpath
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
						// Actually all that we need does happen, so we just don't do anything
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
	 *
	 * @throws ElementNotFoundException
	 * @return void
	 */
	public function setQuotaOfUserTo($username, $quota, Session $session) {
		$userTr = $this->findUserInTable($username);
		$selectField = $userTr->find('xpath', $this->quotaSelectXpath);

		if ($selectField === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->quotaSelectXpath " .
				"could not find quota select element"
			);
		}

		$selectOption = $selectField->find(
			'xpath', \sprintf($this->quotaOptionXpath, $quota)
		);
		if ($selectOption === null) {
			$xpathLocator = \sprintf($this->quotaOptionXpath, "Other");
			$selectOption = $selectField->find('xpath', $xpathLocator);

			if ($selectOption === null) {
				throw new ElementNotFoundException(
					__METHOD__ .
					" xpath $xpathLocator " .
					"could not find quota option element"
				);
			}

			$selectOption->click();
			$manualQuotaInputElement = $this->find('xpath', $this->manualQuotaInputXpath);

			if ($manualQuotaInputElement === null) {
				throw new ElementNotFoundException(
					__METHOD__ .
					" xpath $this->manualQuotaInputXpath " .
					"could not find manual quota input element"
				);
			}

			$manualQuotaInputElement->setValue($quota);
		} else {
			$selectOption->click();
		}
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 *
	 * @throws ElementNotFoundException
	 * @return GroupList
	 */
	private function getGroupListElement() {
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
	public function getAllGroups() {
		$groupList = $this->getGroupListElement();
		return $groupList->namesToArray();
	}

	/**
	 * @param string $name
	 * @param Session $session
	 * @param bool $confirm  , true is to delete and false is not to delete
	 *
	 * @return void
	 */
	public function deleteGroup($name, Session $session, $confirm = false) {
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
	public function addGroup($groupName, Session $session) {
		$groupList = $this->getGroupListElement();
		$groupList->addGroup($groupName);
		$this->waitForAjaxCallsToStartAndFinish($session);
	}

	/**
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function disableUser($username) {
		$userTr = $this->findUserInTable($username);
		$userTr->find("xpath", $this->disableUserCheckboxXpath)->click();
	}

	/**
	 *
	 * @param string $username
	 * @param bool $confirm
	 *
	 * @return void
	 */
	public function deleteUser($username, $confirm) {
		$userTr = $this->findUserInTable($username);
		$deleteBtn = $userTr->find("xpath", $this->deleteUserBtnXpath);
		if ($deleteBtn === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->deleteUserBtnXpath " .
				"could not find delete user field "
			);
		}
		$deleteBtn->click();

		if ($confirm) {
			$confirmBtn = $this->find('xpath', $this->deleteConfirmBtnXpath);
		} else {
			$confirmBtn = $this->find('xpath', $this->deleteNotConfirmBtnXpath);
		}

		if ($confirmBtn === null) {
			$xpathSelector = ($confirm) ? $this->deleteConfirmBtnXpath : $this->deleteNotConfirmBtnXpath;
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $xpathSelector " .
				"could not find delete confirm button"
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
	 */
	public function setDisplayNameofUserTo(Session $session, $username, $displayName) {
		$userTr = $this->findUserInTable($username);
		$editDisplayNameBtn = $userTr->find("xpath", $this->editUserDisplayNameBtnXpath);
		if ($editDisplayNameBtn === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->editDisplayNameBtn " .
				"could not find edit button "
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
				"could not find display name field "
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
	 */
	public function changeUserPassword(Session $session, $user, $password) {
		$userTr = $this->findUserInTable($user);
		$editPasswordBtn = $userTr->find("xpath", $this->editPasswordBtnXpath);
		if ($editPasswordBtn === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->editPasswordBtnXpath " .
				"could not find edit button "
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
				"could not find password field "
			);
		}
		try {
			$editPasswordInput->focus();
			$editPasswordInput->setValue($password . "\n");
			$this->waitForAjaxCallsToStartAndFinish($session);
		} catch (StaleElementReference $e) {
		}
	}

	/**
	 * @param Session $session
	 * @param string $user
	 * @param string $group
	 * @param boolean $add Boolean value to specify wether to add or remove user from the group
	 *
	 * @return void
	 */
	public function addOrRemoveUserToGroup(Session $session, $user, $group, $add=true) {
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
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->groupLabelInInputXpath " .
				"could not find groups input"
			);
		}
		$groupInput = $groupsField->find(
			'xpath',
			\sprintf($this->groupInputXpath, $groupLabel->getAttribute('for'))
		);
		if ($groupInput === null) {
			throw new ElementNotFoundException(
				__METHOD__ .
				" xpath $this->groupInputXpath " .
				"could not find input for group $group"
			);
		}
		$status = $groupInput->getValue() === "on";
		// while adding to group only click if the checkbox is not already selected
		// while removing from group only click if the checkbox is already selected
		if ($status xor $add) {
			$groupLabel->focus();
			$groupLabel->click();
			$this->waitForAjaxCallsToStartAndFinish($session);
		}
	}
}
