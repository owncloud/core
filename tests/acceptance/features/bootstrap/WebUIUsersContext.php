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
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;
use Page\LoginPage;
use Page\UsersPage;
use TestHelpers\AppConfigHelper;

require_once 'bootstrap.php';

/**
 * WebUI Users context.
 */
class WebUIUsersContext extends RawMinkContext implements Context {
	private $usersPage;

	/**
	 *
	 * @var LoginPage
	 */
	private $loginPage;

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

	private $appParameterValues = null;

	/**
	 * WebUIUsersContext constructor.
	 *
	 * @param UsersPage $usersPage
	 * @param LoginPage $loginPage
	 */
	public function __construct(UsersPage $usersPage, LoginPage $loginPage) {
		$this->usersPage = $usersPage;
		$this->loginPage = $loginPage;
	}

	/**
	 * @When the user/administrator browses to the users page
	 * @Given the user/administrator has browsed to the users page
	 *
	 * @return void
	 */
	public function theUserBrowsesToTheUsersPage() {
		$this->usersPage->open();
		$this->usersPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @When the administrator sets/changes the quota of user :username to :quota using the webUI
	 * @Given the administrator has set/changed the quota of user :username to :quota using the webUI
	 *
	 * @param string $username
	 * @param string $quota
	 *
	 * @return void
	 */
	public function theAdministratorSetsTheQuotaOfUserUsingTheWebUI(
		$username, $quota
	) {
		$this->usersPage->setQuotaOfUserTo($username, $quota, $this->getSession());
	}

	/**
	 * @When the administrator sets/changes the quota of user :username to the invalid string :quota using the webUI
	 *
	 * @param string $username
	 * @param string $quota
	 *
	 * @return void
	 */
	public function theAdministratorSetsInvalidQuotaOfUserUsingTheWebUI(
		$username, $quota
	) {
		$this->usersPage->setQuotaOfUserTo(
			$username, $quota, $this->getSession(), false
		);
	}

	/**
	 * @When /^the administrator (attempts to create|creates) a user with the name "([^"]*)" (?:and )?the password "([^"]*)"(?: and the email "([^"]*)")?(?: that is a member of these groups)? using the webUI$/
	 *
	 * @param string $attemptTo
	 * @param string $username
	 * @param string $password
	 * @param string $email
	 * @param TableNode $groupsTable table of groups with a heading | group |
	 *
	 * @return void
	 */
	public function theAdminCreatesAUserUsingTheWebUI(
		$attemptTo, $username, $password, $email=null, TableNode $groupsTable=null
	) {
		$password = $this->featureContext->getActualPassword($password);
		if ($groupsTable !== null) {
			$groups = $groupsTable->getColumn(0);
			//get rid of the header
			unset($groups[0]);
		} else {
			$groups = null;
		}
		$this->usersPage->createUser(
			$this->getSession(), $username, $password, $email, $groups
		);

		$shouldExist = ($attemptTo === "");

		$this->featureContext->addUserToCreatedUsersList(
			$username, $password, "", $email, $shouldExist
		);
		if (\is_array($groups)) {
			foreach ($groups as $group) {
				$this->featureContext->addGroupToCreatedGroupsList($group);
			}
		}
	}

	/**
	 * @When /^the administrator (attempts to create|creates) a user with the name "([^"]*)" and the email "([^"]*)" without a password(?: that is a member of these groups)? using the webUI$/
	 *
	 * @param string $attemptTo
	 * @param string $username
	 * @param string $email
	 * @param TableNode $groupsTable table of groups with a heading | group |
	 *
	 * @return void
	 */
	public function theAdminCreatesAUserUsingWithoutAPasswordTheWebUI(
		$attemptTo, $username, $email, TableNode $groupsTable=null
	) {
		$this->theAdminCreatesAUserUsingTheWebUI(
			$attemptTo, $username, null, $email, $groupsTable
		);
	}

	/**
	 *
	 * @When the administrator deletes the group named :name using the webUI and confirms the deletion using the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function theAdminDeletesTheGroupUsingTheWebUI($name) {
		$this->usersPage->deleteGroup($name, $this->getSession(), true);
		$this->featureContext->rememberThatGroupIsNotExpectedToExist($name);
	}

	/**
	 * @When the administrator deletes the group named :name using the webUI and cancels the deletion using the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function theAdminDeletesDoesNotDeleteGroupUsingWebUI($name) {
		$this->usersPage->deleteGroup($name, $this->getSession(), false);
		$this->featureContext->rememberThatGroupIsNotExpectedToExist($name);
	}

	/**
	 * @When the administrator deletes these groups and confirms the deletion using the webUI:
	 * expects a table of groups with the heading "groupname"
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function theAdminDeletesTheseGroupsUsingTheWebUI(TableNode $table) {
		foreach ($table as $row) {
			$this->theAdminDeletesTheGroupUsingTheWebUI($row['groupname']);
		}
	}

	/**
	 * @When the administrator deletes these groups and and cancels the deletion using the webUI:
	 * expects a table of groups with the heading "groupname"
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function theAdminDeletesDoesNotTheseGroupsUsingTheWebUI(TableNode $table) {
		foreach ($table as $row) {
			$this->theAdminDeletesDoesNotDeleteGroupUsingWebUI($row['groupname']);
		}
	}

	/**
	 * @Then the group name :groupName should be listed on the webUI
	 *
	 * @param string $groupName
	 *
	 * @return void
	 */
	public function theGroupNameShouldBeListed($groupName) {
		$groups = $this->usersPage->getAllGroups();
		PHPUnit\Framework\Assert::assertContains(
			$groupName, $groups, "Expected '" . $groupName . "' does not exist"
		);
	}

	/**
	 * @Then the group name :name should not be listed on the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function theGroupNamedShouldNotBeListedOnTheWebUI($name) {
		PHPUnit\Framework\Assert::assertFalse(
			\in_array($name, $this->usersPage->getAllGroups(), true),
			"group '" . $name . "' is listed but should not be"
		);
	}

	/**
	 * @Then /^these groups should (not|)\s?be listed on the webUI:$/
	 * expects a table of groups with the heading "groupname"
	 *
	 * @param string $shouldOrNot (not|)
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function theseGroupsShouldBeListedOnTheWebUI(
		$shouldOrNot, TableNode $table
	) {
		$should = ($shouldOrNot !== "not");
		$groups = $this->usersPage->getAllGroups();
		foreach ($table as $row) {
			PHPUnit\Framework\Assert::assertEquals(
				\in_array($row['groupname'], $groups, true),
				$should,
				"group '" . $row['groupname'] .
				"' is" . ($should ? " not" : "") .
				" listed but should" . ($should ? "" : " not") . " be"
			);
		}
	}

	/**
	 * @When the user/administrator reloads the users page
	 * @Given the user/administrator has reloaded the users page
	 *
	 * @return void
	 */
	public function theUserReloadsTheUsersPage() {
		$this->getSession()->reload();
		$this->usersPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @When the administrator/user disables user :username using the webUI
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function theAdminDisablesUserUsingTheWebui($username) {
		$this->usersPage->openAppSettingsMenu();
		$this->usersPage->setSetting("Show enabled/disabled option");
		$this->usersPage->disableUser($username);
	}

	/**
	 * @When the disabled user :username tries to login using the password :password from the webUI
	 *
	 * @param string $username
	 * @param string $password
	 *
	 * @return void
	 */
	public function theDisabledUserTriesToLogin($username, $password) {
		$this->webUIGeneralContext->theUserLogsOutOfTheWebUI();
		$password = $this->featureContext->getActualPassword($password);
		/**
		 *
		 * @var DisabledUserPage $disabledPage
		 */
		$disabledPage = $this->loginPage->loginAs(
			$username, $password, 'DisabledUserPage'
		);
		$disabledPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @When the administrator deletes user :username using the webUI and confirms the deletion using the webUI
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function theAdministratorDeletesTheUser($username) {
		$this->usersPage->deleteUser($username, true);
		$this->featureContext->rememberThatUserIsNotExpectedToExist($username);
	}

	/**
	 * @When the administrator deletes user :username using the webUI and cancels the deletion using the webUI
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function theAdministratorDoesNotDeleteTheUser($username) {
		$this->usersPage->deleteUser($username, false);
		$this->featureContext->rememberThatUserIsNotExpectedToExist($username);
	}

	/**
	 * @When the deleted user :username tries to login using the password :password using the webUI
	 *
	 * @param string $username
	 * @param string $password
	 *
	 * @return void
	 */
	public function theDeletedUserTriesToLogin($username, $password) {
		$this->webUIGeneralContext->theUserLogsOutOfTheWebUI();
		$this->loginPage->loginAs($username, $password, 'LoginPage');
	}

	/**
	 * @When /^the administrator (enables|disables) the setting "([^"]*)" in the User Management page using the webUI$/
	 *
	 * @param string $action
	 * @param string $setting
	 *
	 * @return void
	 */
	public function enableOrDisableSettings($action, $setting) {
		$value = $action === 'enables' ? true : false;
		$this->usersPage->setSetting($setting, $value);
	}

	/**
	 * @Then the quota of user :username should be set to :quota on the webUI
	 *
	 * @param string $username
	 * @param string $quota
	 *
	 * @return void
	 */
	public function quotaOfUserShouldBeSetToOnTheWebUI($username, $quota) {
		$setQuota = $this->usersPage->getQuotaOfUser($username);
		PHPUnit\Framework\Assert::assertEquals(
			$quota,
			$setQuota,
			'Users quota is set to "' . $setQuota .
			'" but expected "' . $quota . '"'
		);
	}

	/**
	 * @Then /^the administrator should be able to see the email of these users in the User Management page:$/
	 *
	 * @param TableNode $table table of usernames and emails with a heading | username | and | email |
	 *
	 * @return void
	 */
	public function theAdministratorShouldBeAbleToSeeEmailOfTheseUsers(TableNode $table) {
		foreach ($table as $row) {
			$userEmail = $this->usersPage->getEmailOfUser($row['username']);
			PHPUnit\Framework\Assert::assertEquals($row['email'], $userEmail);
		}
	}

	/**
	 * @Then /^the administrator should be able to see the quota of these users in the User Management page:$/
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function theAdministratorShouldBeAbleToSeeQuotaOfTheseUsers(TableNode $table) {
		foreach ($table as $row) {
			$visible = $this->usersPage->isQuotaColumnOfUserVisible($row['username']);
			PHPUnit\Framework\Assert::assertEquals(true, $visible);
		}
	}

	/**
	 * @Then /^the administrator should not be able to see the quota of these users in the User Management page:$/
	 *
	 * @param TableNode $table
	 *
	 * @return void
	 */
	public function theAdministratorShouldNotBeAbleToSeeQuotaOfTheseUsers(TableNode $table) {
		foreach ($table as $row) {
			$visible = $this->usersPage->isQuotaColumnOfUserVisible($row['username']);
			PHPUnit\Framework\Assert::assertEquals(false, $visible);
		}
	}

	/**
	 * @Then /^the administrator should be able to see the password of these users in the User Management page:$/
	 *
	 * @param TableNode $table table of usernames column with a heading | username |
	 *
	 * @return void
	 */
	public function theAdministratorShouldBeAbleToSeePasswordColumnOfTheseUsers(TableNode $table) {
		foreach ($table as $row) {
			$visible = $this->usersPage->isPasswordColumnOfUserVisible($row['username']);
			PHPUnit\Framework\Assert::assertEquals(true, $visible);
		}
	}

	/**
	 * @Then /^the administrator should not be able to see the password of these users in the User Management page:$/
	 *
	 * @param TableNode $table table of usernames column with a heading | username |
	 *
	 * @return void
	 */
	public function theAdministratorShouldNotbeAbleToSeePasswordColumnOfTheseUsers(TableNode $table) {
		foreach ($table as $row) {
			$visible = $this->usersPage->isPasswordColumnOfUserVisible($row['username']);
			PHPUnit\Framework\Assert::assertEquals(false, $visible);
		}
	}

	/**
	 * @Then /^the administrator should be able to see the storage location of these users in the User Management page:$/
	 *
	 * @param TableNode $table table of usernames and storage locations with a heading | username | and | storage location |
	 *
	 * @return void
	 */
	public function theAdministratorShouldBeAbleToSeeStorageLocationOfTheseUsers(
		TableNode $table
	) {
		foreach ($table as $row) {
			$userStorageLocation = $this->usersPage->getStorageLocationOfUser($row['username']);
			PHPUnit\Framework\Assert::assertContains($row['storage location'], $userStorageLocation);
		}
	}

	/**
	 * @Then /^the administrator should be able to see the last login of these users in the User Management page:$/
	 *
	 * @param TableNode $table table of usernames and last logins with a heading | username | and | last logins |
	 *
	 * @return void
	 */
	public function theAdministratorShouldBeAbleToSeeLastLoginOfTheseUsers(
		TableNode $table
	) {
		foreach ($table as $row) {
			$userLastLogin = $this->usersPage->getLastLoginOfUser($row['username']);

			PHPUnit\Framework\Assert::assertContains($row['last login'], $userLastLogin);
		}
	}

	/**
	 * This will run before EVERY scenario.
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

		// user_management app configs
		$configs = [
			'umgmt_send_email' => '',
			'umgmt_set_password' => '',
			'umgmt_show_backend' => '',
			'umgmt_show_email' => '',
			'umgmt_show_is_enabled' => '',
			'umgmt_show_last_login' => '',
			'umgmt_show_storage_location' => ''
		];

		if ($this->appParameterValues === null) {
			// Get app config values
			$appConfigs =  AppConfigHelper::getAppConfigs(
				$this->featureContext->getBaseUrl(),
				$this->featureContext->getAdminUsername(),
				$this->featureContext->getAdminPassword(),
				'core'
			);
			$results = [];
			foreach ($appConfigs as $appConfig) {
				if (isset($configs[$appConfig['configkey']])) {
					$results[] = $appConfig;
				}
			}
			// Save the app configs
			$this->appParameterValues = $results;
		}
	}

	/**
	 * After Scenario
	 *
	 * @AfterScenario @webUI
	 *
	 * @param AfterScenarioScope $afterScenarioScope
	 *
	 * @return void
	 */
	public function restoreScenario(AfterScenarioScope $afterScenarioScope) {
		// Restore app config settings
		AppConfigHelper::modifyAppConfigs(
			$this->featureContext->getBaseUrl(),
			$this->featureContext->getAdminUsername(),
			$this->featureContext->getAdminPassword(),
			$this->appParameterValues
		);
	}

	/**
	 * @When the administrator adds group :groupName using the webUI
	 *
	 * @param string $groupName
	 *
	 * @return void
	 */
	public function theAdminAddsGroupUsingTheWebUI($groupName) {
		$this->usersPage->addGroup($groupName, $this->getSession());
		$this->featureContext->addGroupToCreatedGroupsList($groupName);
	}

	/**
	 * @When the administrator changes the display name of user :user to :displayName using the webUI
	 *
	 * @param string $user
	 * @param string $displayName
	 *
	 * @return void
	 */
	public function theAdministratorChangesTheDisplayNameOfUserToUsingTheWebui($user, $displayName) {
		$this->usersPage->setDisplayNameofUserTo($this->getSession(), $user, $displayName);
	}

	/**
	 * @When the administrator changes the password of user :user to :password using the webUI
	 *
	 * @param string $user
	 * @param string $password
	 *
	 * @return void
	 */
	public function theAdministratorChangesThePasswordOfUserToUsingTheWebui($user, $password) {
		$this->usersPage->changeUserPassword($this->getSession(), $user, $password);
	}

	/**
	 * @When the administrator adds user :user to group :group using the webUI
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function addsUserToGroupUsingTheWebui($user, $group) {
		$this->usersPage->addOrRemoveUserToGroup($this->getSession(), $user, $group);
	}

	/**
	 * @When the administrator removes user :user from group :group using the webUI
	 *
	 * @param string $user
	 * @param string $group
	 *
	 * @return void
	 */
	public function theAdministratorRemovesUserFromGroupUsingTheWebui($user, $group) {
		$this->usersPage->addOrRemoveUserToGroup($this->getSession(), $user, $group, false);
	}

	/**
	 * @When the administrator changes the email of user :username to :email using the webUI
	 *
	 * @param string $username
	 * @param string $email
	 *
	 * @return void
	 */
	public function theAdministratorChangesTheEmailOfUserToUsingTheWebui($username, $email) {
		$this->usersPage->openAppSettingsMenu();
		$this->usersPage->setSetting('Show email address');
		$this->usersPage->changeUserEmail($this->getSession(), $username, $email);
	}
}
