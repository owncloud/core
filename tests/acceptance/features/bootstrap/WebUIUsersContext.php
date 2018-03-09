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
use Behat\Mink\Exception\ExpectationException;
use Behat\MinkExtension\Context\RawMinkContext;
use Page\UsersPage;
use TestHelpers\OcsApiHelper;

require_once 'bootstrap.php';

/**
 * WebUI Users context.
 */
class WebUIUsersContext extends RawMinkContext implements Context {


	private $usersPage;
	/**
	 *
	 * @var WebUIGeneralContext
	 */
	private $webUIGeneralContext;

	/**
	 * WebUIUsersContext constructor.
	 *
	 * @param UsersPage $usersPage
	 */
	public function __construct(UsersPage $usersPage) {
		$this->usersPage = $usersPage;
	}

	/**
	 * @Given I am on the users page
	 *
	 * @return void
	 */
	public function iAmOnTheUsersPage() {
		$this->usersPage->open();
		$this->usersPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * substitute codes like "%regularuser%" with the actual name of the user
	 *
	 * @param string $username
	 * 
	 * @return string
	 * @Transform :username
	 */
	public function checkUsername($username) {
		return $this->webUIGeneralContext->substituteInLineCodes($username);
	}

	/**
	 * @Given quota of user :username is set/changed to :quota
	 *
	 * @param string $username
	 * @param string $quota
	 * 
	 * @return void
	 */
	public function quotaOfUserIsSetTo($username, $quota) {
		$this->usersPage->setQuotaOfUserTo($username, $quota, $this->getSession());
	}

	/**
	 * Taken from acceptance Provisioning.php and modified to suit current
	 * UI test environment. This function should be removed when merging UI
	 * and API acceptance tests, and the one from Provisioning.php used everywhere.
	 *
	 * @Given the quota of user :user has been set to :quota
	 *
	 * @param string $user
	 * @param string $quota
	 *
	 * @return void
	 */
	public function theQuotaOfUserHasBeenSetTo($user, $quota) {
		$body
			= [
				'key' => 'quota',
				'value' => $quota,
			];

		$this->response = OcsApiHelper::sendRequest(
			$this->getMinkParameter('base_url'),
			"admin",
			$this->webUIGeneralContext->getUserPassword("admin"),
			"PUT",
			"/cloud/users/" . $user,
			$body,
			2
		);

		PHPUnit_Framework_Assert::assertEquals(
			200, $this->response->getStatusCode()
		);
	}

	/**
	 * @When /^I (attempt to |)create a user with the name "([^"]*)" (?:and )?the password "([^"]*)"(?: and the email "([^"]*)")?(?: that is a member of these groups)?$/
	 *
	 * @param string $attemptTo
	 * @param string $username
	 * @param string $password
	 * @param string $email
	 * @param TableNode $groupsTable table of groups with a heading | group |
	 * 
	 * @return void
	 */
	public function iCreateAUserInTheGUI(
		$attemptTo, $username, $password, $email=null, TableNode $groupsTable=null
	) {
		if (!is_null($groupsTable)) {
			$groups = $groupsTable->getColumn(0);
			//get rid of the header
			unset($groups[0]);
		} else {
			$groups = null;
		}
		$this->usersPage->createUser(
			$this->getSession(), $username, $password, $email, $groups
		);

		$shouldHaveBeenCreated = ($attemptTo === "");

		$this->webUIGeneralContext->addUserToCreatedUsersList(
			$username, $password, "", $email, $shouldHaveBeenCreated
		);
		if (is_array($groups)) {
			foreach ($groups as $group) {
				$this->webUIGeneralContext->addGroupToCreatedGroupsList($group);
			}
		}
	}

	/**
	 * 
	 * @When I delete the group named :name
	 *
	 * @param string $name
	 * 
	 * @return void
	 */
	public function iDeleteTheGroupNamed($name) {
		$this->usersPage->deleteGroup($name, $this->getSession());
		$this->webUIGeneralContext->deleteGroupFromCreatedGroupsList($name);
	}

	/**
	 * @When I delete these groups:
	 * expects a table of groups with the heading "groupname"
	 *
	 * @param TableNode $table
	 * 
	 * @return void
	 */
	public function iDeleteTheseGroups(TableNode $table) {
		foreach ($table as $row) {
			$this->iDeleteTheGroupNamed($row['groupname']);
		}
	}

	
	/**
	 * @Then The group name :groupName should be listed
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
	 * @Then the group named :name should not be listed
	 *
	 * @param string $name
	 * 
	 * @return void
	 * @throws Exception
	 */
	public function theGroupNamedShouldNotBeListed($name) {
		if (in_array($name, $this->usersPage->getAllGroups(), true)) {
			throw new Exception("group '" . $name . "' is listed but should not");
		}
	}

	/**
	 * @Then /^these groups should (not|)\s?be listed:$/
	 * expects a table of groups with the heading "groupname"
	 *
	 * @param string $shouldOrNot (not|)
	 * @param TableNode $table
	 * 
	 * @return void
	 * @throws Exception
	 */
	public function theseGroupsShouldBeListed($shouldOrNot, TableNode $table) {
		$should = ($shouldOrNot !== "not");
		$groups = $this->usersPage->getAllGroups();
		foreach ($table as $row) {
			if (in_array($row['groupname'], $groups, true) !== $should) {
				throw new Exception(
					"group '" . $row['groupname'] .
					"' is" . ($should ? " not" : "") .
					" listed but should" . ($should ? "" : " not") . " be"
				);
			}
		}
	}

	/**
	 * @When the users page is reloaded
	 *
	 * @return void
	 */
	public function theUsersPageIsReloaded() {
		$this->getSession()->reload();
		$this->usersPage->waitTillPageIsLoaded($this->getSession());
	}

	/**
	 * @Then quota of user :username should be set to :quota
	 *
	 * @param string $username
	 * @param string $quota
	 * 
	 * @return void
	 * @throws ExpectationException
	 */
	public function quotaOfUserShouldBeSetTo($username, $quota) {
		$setQuota = $this->usersPage->getQuotaOfUser($username);
		if ($setQuota !== $quota) {
			throw new ExpectationException(
				'Users quota is set to "' . $setQuota . '" expected "' .
				$quota . '"', $this->getSession()
			);
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
		$this->webUIGeneralContext = $environment->getContext('WebUIGeneralContext');
	}

	/**
	 * @Given I add a group with the name :groupName
	 * 
	 * @param string $groupName
	 * 
	 * @return void
	 */
	public function iAddAGroupWithTheName($groupName) {
		$this->usersPage->addGroup($groupName, $this->getSession());
	}
}
