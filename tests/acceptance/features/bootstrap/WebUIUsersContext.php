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
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;
use Page\LoginPage;
use Page\UsersPage;

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
	public function theAdministratorSetsTheQuotaOfUserUsingTheWebUI($username, $quota) {
		$this->usersPage->setQuotaOfUserTo($username, $quota, $this->getSession());
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
	 * @param string $password
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
	 * @When the administrator deletes the group named :name using the webUI
	 *
	 * @param string $name
	 *
	 * @return void
	 */
	public function theAdminDeletesTheGroupUsingTheWebUI($name) {
		$this->usersPage->deleteGroup($name, $this->getSession());
		$this->featureContext->rememberThatGroupIsNotExpectedToExist($name);
	}

	/**
	 * @When the administrator deletes these groups using the webUI:
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
	 * @Then the group name :groupName should be listed on the webUI
	 *
	 * @param string $groupName
	 *
	 * @return void
	 */
	public function theGroupNameShouldBeListed($groupName) {
		$groups = $this->usersPage->getAllGroups();
		PHPUnit_Framework_Assert::assertContains(
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
		PHPUnit_Framework_Assert::assertFalse(
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
	public function theseGroupsShouldBeListedOnTheWebUI($shouldOrNot, TableNode $table) {
		$should = ($shouldOrNot !== "not");
		$groups = $this->usersPage->getAllGroups();
		foreach ($table as $row) {
			PHPUnit_Framework_Assert::assertEquals(
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
	 * @When the administrator disables the user :username using the webUI
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function theAdminDisablesTheUserUsingTheWebui($username) {
		$this->usersPage->openSettingsMenu();
		$this->usersPage->setSetting("Show enabled/disabled option");
		$this->usersPage->disableUser($username);
	}

	/**
	 * @When the disabled user :username tries to login using the password :password from the webUI
	 *
	 * @param string $username
	 *
	 * @param string $password
	 *
	 * @return void
	 */
	public function theDisabledUserTriesToLogin($username, $password) {
		$this->webUIGeneralContext->theUserLogsOutOfTheWebUI();
		/**
		 *
		 * @var DisabledUserPage $disabledPage
		 */
		$disabledPage = $this->loginPage->loginAs($username, $password, 'DisabledUserPage');
		$disabledPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @When the administrator deletes the user :username using the webUI
	 *
	 * @param string $username
	 *
	 * @return void
	 */
	public function theAdministratorDeletesTheUser($username) {
		$this->usersPage->deleteUser($username);
		$this->featureContext->rememberThatUserIsNotExpectedToExist($username);
	}

	/**
	 *
	 * @When the deleted user :username tries to login using the password :password using the webUI
	 *
	 * @param string $username
	 *
	 * @param string $password
	 *
	 * @return void
	 */
	public function theDeletedUserTriesToLogin($username, $password) {
		$this->webUIGeneralContext->theUserLogsOutOfTheWebUI();
		$this->loginPage->loginAs($username, $password, 'LoginPage');
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
		PHPUnit_Framework_Assert::assertEquals(
			$quota,
			$setQuota,
			'Users quota is set to "' . $setQuota .
			'" but expected "' . $quota . '"'
		);
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
	}
}
